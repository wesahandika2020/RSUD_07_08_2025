<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_search role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id_layanan_search" />
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal Layanan</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_register_search" class="col-3 col-form-label">No. Register</label>
                    <div class="col">
                        <input type="text" name="no_register" id="no-register-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_rm_search" class="col-3 col-form-label">No. RM</label>
                    <div class="col">
                        <input type="text" name="no_rm" id="no-rm-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nik_search" class="col-3 col-form-label">NIK</label>
                    <div class="col">
                        <input type="text" name="nik" id="nik-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama_search" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama-search" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListPemeriksaan(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pemeriksaan -->
<div id="modal-pemeriksaan" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-pemeriksaan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pemeriksaan-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pemeriksaan role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
                <input type="hidden" name="id_pasien" id="id-pasien">
                <input type="hidden" name="id_layanan" id="id-layanan">
                <input type="hidden" name="jenis_rawat" id="jenis-rawat">
                <input type="hidden" name="jenis_layanan" value="Hemodialisa" id="jenis-layanan">
                <input type="hidden" id="tindaklanjut">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Data Pasien</li>
                                    <li>Anamnesis</li>
                                    <li>Diagnosis</li>
                                    <li>Tindakan</li>
                                    <li>BHP</li>
                                    <li>Laboratorium</li>
                                    <li>Radiologi</li>
                                    <li>Bank Darah</li>
                                    <li>Makanan - Gizi</li>
                                <!--    <li>Rehab. Medik</li> -->
                                </ol>

                                <!-- Data bwizard -->
                                <!-- Data Pasien -->
                                <div class="form-info-pasien">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <table class="table table-sm table-detail table-striped">
                                                <tr>
                                                    <td width="30%"><b>NIK</b></td>
                                                    <td><span id="nik-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%"><b>Nama</b></td>
                                                    <td><span id="nama-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. RM</b></td>
                                                    <td><span id="no-rm-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Register</b></td>
                                                    <td><span id="no-register-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Kelamin</b></td>
                                                    <td><span id="kelamin-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Umur/Tgl. Lahir</b></td>
                                                    <td><span id="umur-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Agama</b></td>
                                                    <td><span id="agama-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Telepon</b></td>
                                                    <td><span id="telp-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat</b></td>
                                                    <td><span id="alamat-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Riwayat Rekam Medis <i>(Baru)</i></b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Riwayat Rekam Medis</b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alergi</b></td>
                                                    <td><span id="alergi-detail"></span></td>
                                                </tr>
                                                <tr id="subspesialis-row">
                                                    <td><b>Sub Spesialis</b></td>
                                                    <td><?= form_dropdown('subspesialis', array(), array(), 'id=subspesialis class="custom-form validasi-input col-lg-6"') ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <table class="table table-sm table-detail table-striped">
                                                <tr>
                                                    <td width="40%"><b>Instansi Perujuk</b></td>
                                                    <td><span id="instansi-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tenaga Medis Perujuk</b></td>
                                                    <td><span id="nadis-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama P. Jawab</b></td>
                                                    <td><span id="nama-pjwb-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat P. Jawab</b></td>
                                                    <td><span id="alamat-pjwb-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Telp P. Jawab</b></td>
                                                    <td><span id="telp-pjwb-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama P. Jawab Keuangan</b></td>
                                                    <td><span id="nama-pjwb-keuangan-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat P. Jawab Keuangan</b></td>
                                                    <td><span id="alamat-pjwb-keuangan-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Telp P. Jawab Keuangan</b></td>
                                                    <td><span id="telp-pjwb-keuangan-detail"></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5><b>Data Layanan Pendaftaran</b></h5>
                                            <input type="hidden" name="id_dokter_detail" id="id-dokter-detail">
                                            <table class="table table-striped table-sm table-detail">
                                                <tr>
                                                    <td width="30%"><b>Klinik</b></td>
                                                    <td><span id="layanan-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Dokter</b></td>
                                                    <td><span id="dokter-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Cara Bayar</b></td>
                                                    <td><span id="cara-bayar-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Polish</b></td>
                                                    <td><span id="no-polish-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. SEP</b></td>
                                                    <td><span id="no-sep-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Hak Kelas Pasien</b></td>
                                                    <td><span id="hak-kelas-pasien"></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <div class="col-lg-2 logo-pasien-alergi">
                                                    <!-- logo pasien alergi -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="logo-pasien-alergi" class="img-thumbnail rounded">
                                                </div>
                                                <div class="col-lg-2 logo-pasien-meninggal">
                                                    <!-- logo pasien meninggal -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/died.jpg" alt="logo-pasien-meninggal" class="img-thumbnail rounded">
                                                </div>
                                                <div class="col-lg-2 logo-pasien-hiv-aids">
                                                    <!-- logo pasien hiv-aids -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/hiv-aids.jpg" alt="logo-pasien-hiv-aids" class="img-thumbnail rounded">
                                                </div>
                                                <div class="col-lg-2 logo-pasien-gonorrhea">
                                                    <!-- logo pasien gonorrhea -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/gonorrhea.jpg" alt="logo-pasien-gonorrhea" class="img-thumbnail rounded">
                                                </div>
                                                <div class="col-lg-2 logo-pasien-hepatitis">
                                                    <!-- logo pasien hepatitis -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/hepatitis.jpg" alt="logo-pasien-hepatitis" class="img-thumbnail rounded">
                                                </div>
                                                <div class="col-lg-2 logo-pasien-kusta-lepra">
                                                    <!-- logo pasien kusta-lepra -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/kusta-lepra.jpg" alt="logo-pasien-kusta-lepra" class="img-thumbnail rounded">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 logo-pasien-tbc-kp">
                                                    <!-- logo pasien tbc-kp -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/tbc-kp.jpg" alt="logo-pasien-tbc-kp" class="img-thumbnail rounded">
                                                </div>
                                                <div class="col-lg-2 logo-pasien-pejabat">
                                                    <!-- logo pasien-pejabat -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/pasien-pejabat.jpg" alt="logo-pasien-pejabat" class="img-thumbnail rounded">
                                                </div>
                                                <div class="col-lg-2 logo-pasien-pemilik-rs">
                                                    <!-- logo pasien-pemilik-rs -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/pasien-pemilik-rs.jpg" alt="logo-pasien-pemilik-rs" class="img-thumbnail rounded">
                                                </div>
                                                <div class="col-lg-2 logo-pasien-potensi-komplain">
                                                    <!-- logo pasien-potensi-komplain -->
                                                    <img src="<?= resource_url() ?>images/diagnosa/pasien-potensi-komplain.jpg" alt="logo-pasien-potensi-komplain" class="img-thumbnail rounded">
                                                </div>
                                            </div>
                                            <!-- <h5><b>Cetak Dokumen</b></h5>
                                            <input type="hidden" name="id_pendaftaran_pasien" id="id-pendaftaran-pasien">
                                            <table class="table table-striped table-sm table-detail">
                                                <tr>
                                                    <td width="85%"></td>
                                                    <td class="right"><button type="button" class="btn btn-secondary btn-xxs"><i class="fas fa-print m-r-5"></i>Cetak</button></td>
                                                </tr>
                                            </table> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Pasien -->

                                <!-- Form Anamnesa  -->
                                <div class="form-anamnesa">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="center"><b>ANAMNESA & PEMERIKSAAN FISIK</b></h5>
                                            <hr>
                                            <table class="table table-sm table-detail table-striped" width="100%">
                                                <tr>
                                                    <td width="150px"><b>Pasien</b></td>
                                                    <td width="1px">:</td>
                                                    <td><span id="identitas-pasien-anamnesa">Coba</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Dokter</td>
                                                    <td>:</td>
                                                    <td><input type="text" name="dokter" id="dokter" class="select2c-input"></td>
                                                </tr>
                                                <tr>
                                                    <td>Dokter Pengganti</td>
                                                    <td>:</td>
                                                    <td><input type="text" name="dokter_pengganti" id="dokter-pengganti" class="select2c-input"></td>
                                                </tr>
                                            </table><br>

                                            <h6><b>I. ANAMNESA</b></h6>
                                            <button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#anamnesa" aria-expanded="false" aria-controls="anamnesa">
                                                <i class="fas fa-expand m-r-5"></i>Open Input Anamnesa
                                            </button>
                                            <div class="collapse" id="anamnesa">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group tight">
                                                            <label>Keluhan Utama</label>
                                                            <textarea name="keluhan_utama" id="keluhan-utama" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                        <div class="form-group tight">
                                                            <label>Riwayat Penyakit Keluarga</label>
                                                            <textarea name="riwayat_penyakit_keluarga" id="riwayat-penyakit-keluarga" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group tight">
                                                            <label>Riwayat Penyakit Sekarang</label>
                                                            <textarea name="riwayat_penyakit_sekarang" id="riwayat-penyakit-sekarang" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                        <div class="form-group tight">
                                                            <label>Anamnesa Sosial</label>
                                                            <textarea name="anamnesa_sosial" id="anamnesa-sosial" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group tight">
                                                            <label>Riwayat Penyakit Dahulu</label>
                                                            <textarea name="riwayat_penyakit_dahulu" id="riwayat-penyakit-dahulu" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <h6><b>II. PEMERIKSAAN FISIK</b></h6>
                                            <button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#pemeriksaanFisik" aria-expanded="false" aria-controls="pemeriksaanFisik">
                                                <i class="fas fa-expand m-r-5"></i>Open Input Pemeriksaan Fisik
                                            </button>
                                            <div class="collapse" id="pemeriksaanFisik">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="form-group tight">
                                                            <label>Keadaan Umum</label>
                                                            <input type="text" name="keadaan_umum" id="keadaan-umum" class="custom-form">
                                                        </div>
                                                        <div class="form-group tight">
                                                            <label>Kesadaran</label>
                                                            <input type="text" name="kesadaran" id="kesadaran" class="custom-form">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group tight">
                                                            <label>GCS</label>
                                                            <input type="text" name="gcs" id="gcs" class="custom-form">
                                                        </div>
                                                        <div class="form-group tight">
                                                            <label>Alergi</label>
                                                            <input type="text" name="alergi" id="alergi" class="custom-form">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="form-group tight">
                                                                    <label>Tensi Sistolik</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="tensi_sistolik" id="tensi-sistolik" class="custom-form">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-custom">mmHg</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group tight">
                                                                    <label>Tensi Diastolik</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="tensi_diastolik" id="tensi-diastolik" class="custom-form">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-custom">mmHg</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group tight">
                                                                    <label>Suhu</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="suhu" id="suhu" class="custom-form">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-custom">&#8451;</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group tight">
                                                                    <label>Nadi</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="nadi" id="nadi" class="custom-form">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-custom">/Mnt</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group tight">
                                                                    <label>Tinggi Badan</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="tinggi_badan" id="tinggi-badan" class="custom-form">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-custom">cm</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group tight">
                                                                    <label>Berat Badan</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="berat_badan" id="berat-badan" class="custom-form">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-custom">Kg</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group tight">
                                                                    <label>Respirasi</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="rr" id="rr" class="custom-form">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-custom">/Mnt</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group tight">
                                                                    <label>Nafas</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="nps" id="nps" class="custom-form">
                                                                        <div class="input-group-append">
                                                                            <!-- <span class="input-group-custom"></span> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Kepala</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="kepala" id="kepala" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Thorax</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="thorax" id="thorax" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Cor</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="cor" id="cor" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Genitalia</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="genitalia" id="genitalia" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Pemeriksaan Penunjang</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="pemeriksaan_penunjang" id="pemeriksaan-penunjang" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Status Mentalis</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="status_mentalis" id="status-mentalis" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Status Gizi</label>
                                                            <div class="col-lg-4">
                                                                <?= form_dropdown('status_gizi', $status_gizi, array(), 'id=status-gizi class=custom-form') ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Hidung <span class="text-red">*</span></label>
                                                            <div class="col-lg-8">
                                                                <textarea name="hidung" id="hidung" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Mata <span class="text-red">*</span></label>
                                                            <div class="col-lg-8">
                                                                <textarea name="mata" id="mata" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Usul Tindak Lanjut <span class="text-red">*</span></label>
                                                            <div class="col-lg-8">
                                                                <textarea name="usul_tindak_lanjut" id="usul-tindak-lanjut" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Leher</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="leher" id="leher" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Pulmo</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="pulmo" id="pulmo" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Abdomen</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="abdomen" id="abdomen" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Ekstrimitas</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="ekstrimitas" id="ekstrimitas" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Prognosis</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="prognosis" id="prognosis" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Lingkar Kepala <span class="text-red">*</span></label>
                                                            <div class="col-lg-8">
                                                                <textarea name="lingkar_kepala" id="lingkar-kepala" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Telinga <span class="text-red">*</span></label>
                                                            <div class="col-lg-8">
                                                                <textarea name="telinga" id="telinga" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Tenggorok <span class="text-red">*</span></label>
                                                            <div class="col-lg-8">
                                                                <textarea name="tenggorok" id="tenggorok" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Kulit Kelamin <span class="text-red">*</span></label>
                                                            <div class="col-lg-8">
                                                                <textarea name="kulit_kelamin" id="kulit-kelamin" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <h6><b>III. PEMERIKSAAN NEUROLOGI</b></h6>
                                            <button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#pemeriksaanNeurologi" aria-expanded="false" aria-controls="pemeriksaanNeurologi">
                                                <i class="fas fa-expand m-r-5"></i>Open Input Pemeriksaan Neurologi
                                            </button>
                                            <div class="collapse" id="pemeriksaanNeurologi">
                                                <div class="row mt-2">
                                                    <div class="col-lg-6">
                                                        <div class="form-group row tight mb-2">
                                                            <label class="col-lg-4 col-form-label-custom">Pupil</label>
                                                            <div class="col-lg-8">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="pupil-dbn" name="pupil_dbn" value="dbn" checked="checked" class="custom-control-input">
                                                                    <label class="custom-control-label" for="pupil-dbn">Dbn</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="pupil-other" name="pupil_dbn" class="custom-control-input">
                                                                    <label class="custom-control-label" for="pupil-other">Bentuk </label>
                                                                    <input type="text" name="pupil_bentuk" id="pupil-bentuk" class="custom-form" disabled="disabled">
                                                                    <label>Ukuran</label>
                                                                    <input type="text" name="pupil_ukuran" id="pupil-ukuran" class="custom-form" disabled="disabled">
                                                                    <label>Reflek Cahaya</label>
                                                                    <input type="text" name="pupil_reflek_cahaya" id="pupil-reflek-cahaya" class="custom-form" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight mb-2">
                                                            <label class="col-lg-4 col-form-label-custom">Nervi Cranialis</label>
                                                            <div class="col-lg-8">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="nervi-cranialis-dbn" name="nervi_cranialis_dbn" value="dbn" checked="checked" class="custom-control-input">
                                                                    <label class="custom-control-label" for="nervi-cranialis-dbn">Dbn</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="nervi-cranialis-other" name="nervi_cranialis_dbn" class="custom-control-input">
                                                                    <label class="custom-control-label" for="nervi-cranialis-other">Paresis </label>
                                                                    <input type="text" name="nervi_cranialis_paresis" id="nervi-cranialis-paresis" class="custom-form" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Reflek Fisiologi</label>
                                                            <div class="col-lg-8">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <input type="text" name="rf_kiri_atas" id="rf-kiri-atas" class="custom-form mb-2" placeholder="Kiri Atas">
                                                                        <input type="text" name="rf_kiri_bawah" id="rf-kiri-bawah" class="custom-form mb-2" placeholder="Kiri Bawah">
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" name="rf_kanan_atas" id="rf-kanan-atas" class="custom-form mb-2" placeholder="Kanan Atas">
                                                                        <input type="text" name="rf_kanan_bawah" id="rf-kanan-bawah" class="custom-form mb-2" placeholder="Kanan Bawah">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight mb-2">
                                                            <label class="col-lg-4 col-form-label-custom">Sensorik</label>
                                                            <div class="col-lg-8">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="sensorik-dbn" name="sensorik_dbn" value="dbn" checked="checked" class="custom-control-input">
                                                                    <label class="custom-control-label" for="sensorik-dbn">Dbn</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="sensorik-other" name="sensorik_dbn" class="custom-control-input">
                                                                    <label class="custom-control-label" for="sensorik-other">Lain - lain </label>
                                                                    <input type="text" name="sensorik_lain" id="sensorik-lain" class="custom-form" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Pemeriksaan Khusus</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="pemeriksaan_khusus" id="pemeriksaan-khusus" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group row tight mb-2">
                                                            <label class="col-lg-4 col-form-label-custom">Tanda Rangsang Meningeal</label>
                                                            <div class="col-lg-8">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="trm-dbn" name="trm_dbn" value="dbn" checked="checked" class="custom-control-input">
                                                                    <label class="custom-control-label" for="trm-dbn">Dbn</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="trm-other-one" name="trm_dbn" class="custom-control-input">
                                                                    <label class="custom-control-label" for="trm-other-one">Kaku Kuduk </label>
                                                                    <input type="text" name="trm_kaku_kuduk" id="trm-kaku-kuduk" class="custom-form" disabled="disabled">
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="trm-other-two" name="trm_dbn" class="custom-control-input">
                                                                    <label class="custom-control-label" for="trm-other-two">Laseque </label>
                                                                    <input type="text" name="trm_laseque" id="trm-laseque" class="custom-form" disabled="disabled">
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="trm-other-three" name="trm_dbn" class="custom-control-input">
                                                                    <label class="custom-control-label" for="trm-other-three">Kerning </label>
                                                                    <input type="text" name="trm_kerning" id="trm-kerning" class="custom-form" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Motorik</label>
                                                            <div class="col-lg-8">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <input type="text" name="motorik_kiri_atas" id="motorik-kiri-atas" class="custom-form mb-2" placeholder="Kiri Atas">
                                                                        <input type="text" name="motorik_kiri_bawah" id="motorik-kiri-bawah" class="custom-form mb-2" placeholder="Kiri Bawah">
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" name="motorik_kanan_atas" id="motorik-kanan-atas" class="custom-form mb-2" placeholder="Kanan Atas">
                                                                        <input type="text" name="motorik_kanan_bawah" id="motorik-kanan-bawah" class="custom-form mb-2" placeholder="Kanan Bawah">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Reflek Patologis</span></label>
                                                            <div class="col-lg-8">
                                                                <textarea name="reflek_patologis" id="reflek-patologis" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Otonom</span></label>
                                                            <div class="col-lg-8">
                                                                <textarea name="otonom" id="otonom" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <h6><b>IV. PEMERIKSAAN ANAK</b></h6>
                                            <button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#pemeriksaanAnak" aria-expanded="false" aria-controls="pemeriksaanAnak">
                                                <i class="fas fa-expand m-r-5"></i>Open Input Pemeriksaan Anak
                                            </button>
                                            <div class="collapse" id="pemeriksaanAnak">
                                                <div class="row mt-2">
                                                    <div class="col-lg-6">
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Riwayat Kelahiran</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="riwayat_kelahiran" id="riwayat-kelahiran" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Riwayat Nutrisi</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="riwayat_nutrisi" id="riwayat-nutrisi" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Riwayat Imunisasi</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="riwayat_imunisasi" id="riwayat-imunisasi" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Riwayat Tumbuh Kembang</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="riwayat_tumbuh_kembang" id="riwayat-tumbuh-kembang" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Anamnesa -->

                                <!-- Form Diagnosa -->
                                <div class="form-diagnosa">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <table class="table table-sm table-detail table-striped" width="100%">
                                                    <tr>
                                                        <td width="150px"><b>Pasien</b></td>
                                                        <td width="1px">:</td>
                                                        <td><span id="identitas-pasien-diagnosa"></span></td>
                                                    </tr>
                                                </table>
                                                <!-- <div class="form-group row tight">
                                                    <label for="diagnosa-manual" class="col-lg-4 col-form-label"></label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="diagnosa_manual" class="form-check-input" id="diagnosa-manual">
                                                            <label class="form-check-label" for="diagnosa-manual">Diagnosa Manual</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox m-t-5">
                                                            <input type="checkbox" name="diagnosa_manual" class="custom-control-input" id="diagnosa-manual">
                                                            <label class="custom-control-label" for="diagnosa-manual">Diagnosa Manual</label>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="form-group row tight golongan-sebab-sakit">
                                                    <label for="golongan-sebab-sakit" class="col-lg-4 col-form-label-custom">Diagnosis</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="golongan_sebab_sakit" id="golongan-sebab-sakit" class="select2c-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight golongan-sebab-sakit-lain">
                                                    <label for="golongan-sebab-sakit-lain" class="col-lg-4 col-form-label-custom">Diagnosis</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="golongan_sebab_sakit_lain" id="golongan-sebab-sakit-lain" class="custom-form validasi-input">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group row tight">
                                                    <label for="diagnosa-klinik" class="col-lg-4 col-form-label-custom">Diagnosis Klinis</label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="diagnosa_klinik" class="form-check-input" id="diagnosa-klinik">
                                                            <label class="form-check-label" for="diagnosa-klinik">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="diagnosa_klinik" class="custom-control-input" id="diagnosa-klinik">
                                                            <label class="custom-control-label" for="diagnosa-klinik">Ya</label>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="form-group row tight">
                                                    <label for="prioritas" class="col-lg-4 col-form-label-custom">Prioritas</label>
                                                    <div class="col-lg-4">
                                                        <?= form_dropdown('prioritas', array('Utama' => 'Utama', 'Sekunder' => 'Sekunder'), array(), 'id=prioritas class=custom-form') ?>
                                                    </div>
                                                </div> -->
                                                <div class="form-group row tight">
                                                    <label for="jenis_kasus" class="col-lg-4 col-form-label-custom">Jenis Kasus</label>
                                                    <div class="col-lg-4">
                                                        <?= form_dropdown('jenis_kasus', array('' => 'Pilih', '1' => 'Baru', '0' => 'Lama'), array(), 'id=jenis_kasus class=custom-form') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row tight">
                                                    <label class="col-lg-4 col-form-label-custom"></label>
                                                    <div class="col-lg-8">
                                                        <a href="#" class="copy btn btn-primary btn-xxs" id="btn-tambah-diagnosa-banding" rel=".diagnosa-banding"><i class="fas fa-plus-circle mr-2"></i>Tambah Diagnosis Banding</a>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight diagnosa-banding">
                                                    <label for="diagnosa-banding" class="col-lg-4 col-form-label-custom">Diagnosis Banding</label>
                                                    <div class="col-lg-7">
                                                        <input type="text" name="diagnosa_banding[]" id="diagnosa-banding" class="custom-form validasi-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="diagnosa-akhir" class="col-lg-4 col-form-label-custom">Diagnosis Akhir</label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="diagnosa_akhir" class="form-check-input" id="diagnosa-akhir">
                                                            <label class="form-check-label" for="diagnosa-akhir">Ya</label>
                                                        </div>
                                                        <!-- <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="diagnosa_akhir" class="custom-control-input" id="diagnosa-akhir">
                                                            <label class="custom-control-label" for="diagnosa-akhir">Ya</label>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="penyebab-kemation" class="col-lg-4 col-form-label-custom">Penyebab Kematian</label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="penyebab_kematian" class="form-check-input" id="penyebab-kematian">
                                                            <label class="form-check-label" for="penyebab-kematian">Ya</label>
                                                        </div>
                                                        <!-- <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="penyebab_kematian" class="custom-control-input" id="penyebab-kematian">
                                                            <label class="custom-control-label" for="penyebab-kematian">Ya</label>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label class="col-lg-4 col-form-label-custom"></label>
                                                    <div class="col-lg-8">
                                                        <button type="button" onclick="addDiagnosa()" class="btn btn-info"><i class="fas fa-arrow-circle-down mr-2"></i>Tambah Diagnosis</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="table-diagnosa">
                                                <thead class="thead-theme">
                                                    <tr>
                                                        <th class="center">No</th>
														<th>Waktu</th>
                                                        <th>Dokter</th>
                                                        <!-- <th>Manual</th> -->
                                                        <th>Diagnosis</th>
                                                        <th>Klinik</th>
                                                        <th class="center">Prioritas</th>
                                                        <th class="center">Jenis Kasus</th>
                                                        <th>Diagnosis Banding</th>
                                                        <th>Diagnosis Akhir</th>
                                                        <th>Penyabab Kematian</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
											<!-- Diagnosa Ruang Lain -->
											<div id="diagnosa-ruang-lain">
												<br>
												<strong><i>Diagnosa Ruang Lain</i></strong>
												<table class="table table-hover table-striped table-sm color-table" id="table-diagnosa-ruang-lain">
													<thead class="thead-theme" style="background-color: grey">
														<tr>
															<th class="center"><i>No</i></th>
															<th><i>Waktu</i></th>
															<th><i>Dokter</i></th>
															<!-- <th>Manual</th> -->
															<th><i>Diagnosis</i></th>
															<th><i>Klinik</i></th>
															<th class="center"><i>Prioritas</i></th>
															<th class="center"><i>Jenis Kasus</i></th>
															<th><i>Diagnosis Banding</i></th>
															<th><i>Diagnosis Akhir</i></th>
															<th><i>Penyabab Kematian</i></th>
															<th></th>
														</tr>
													</thead>
													<tbody></tbody>
												</table>
											</div>
											<!-- End dignosa ruang lain -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Diagnosa -->

                                <!-- Form Tindakan -->
                                <div class="form-tindakan">
                                    <input type="hidden" name="tarif_tindakan" id="tarif-tindakan">
                                    <input type="hidden" name="id_penjamin" id="id-penjamin-tindakan">
                                    <div class="row">
                                        <table class="table table-sm table-detail table-striped" width="100%">
                                            <tr>
                                                <td width="150px"><b>Pasien</b></td>
                                                <td width="1px">:</td>
                                                <td><span id="identitas-pasien-tindakan"></span></td>
                                            </tr>
                                        </table>
                                        <div class="col-lg-6">
                                            <div class="form-group row tight">
                                                <label for="profesi" class="col-lg-4 col-form-label-custom">Profesi</label>
                                                <div class="col-lg-4">
                                                    <?= form_dropdown('profesi', $profesi, array(), 'id=profesi class=custom-form') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="operator" class="col-lg-4 col-form-label-custom">Operator</label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="operator" class="select2c-input" id="operator">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="tindakan" class="col-lg-4 col-form-label-custom">Tindakan</label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="tindakan" class="select2c-input" id="tindakan">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="tindakan-icd9" class="col-lg-4 col-form-label-custom">ICD-9 CM</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="tindakan_icd9" class="select2c-input" id="tindakan-icd9">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="jumlah-tindakan" class="col-lg-4 col-form-label-custom">Jumlah</label>
                                                <div class="col-lg-1">
                                                    <input type="text" name="jumlah_tindakan" class="custom-form" style="text-align: center" value="1" onkeypress="return hanyaAngka(this)" id="jumlah-tindakan">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label class="col-lg-4 col-form-label-custom"></label>
                                                <div class="col-lg-8">
                                                    <button type="button" title="Tambah Tindakan" class="btn btn-info" onclick="addTindakan()"><i class="fas fa-plus-circle mr-2"></i>Tambah Tindakan</button>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-tindakan">
                                            <thead class="thead-theme">
                                                <tr>
                                                    <th class="center">No</th>
                                                    <th class="center">Waktu</th>
                                                    <th>Nama Operator</th>
                                                    <th>Tindakan</th>
                                                    <th>ICD-9 CM</th>
                                                    <th class="center">Jumlah</th>
                                                    <th>Tarif</th>
                                                    <th>Petugas</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Tindakan -->

                                <!-- Form BHP -->
                                <div class="form-bhp">
                                    <input type="hidden" name="harga_jual" id="harga-jual-bhp">
                                    <input type="hidden" id="nama-kemasan-bhp">
                                    <input type="hidden" id="sisa-bhp">
                                    <input type="hidden" name="id_penjamin_bhp" id="id-penjamin-bhp">
                                    <div class="row">
                                        <table class="table table-sm table-detail table-striped" width="100%">
                                            <tr>
                                                <td width="150px"><b>Pasien</b></td>
                                                <td width="1px">:</td>
                                                <td><span id="identitas-pasien-bhp"></span></td>
                                            </tr>
                                        </table>
                                        <div class="col-lg-6">
                                            <div class="form-group row tight">
                                                <label for="barang-bhp" class="col-lg-2 col-form-label-custom">Barang</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="barang" class="select2c-input" id="barang-bhp">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="kemasan-bhp" class="col-lg-2 col-form-label-custom">Kemasan</label>
                                                <div class="col-lg-5">
                                                    <?= form_dropdown('kemasan', array('' => 'Pilih'), array(''), 'id=kemasan-bhp class=custom-form') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="jumlah-bhp" class="col-lg-2 col-form-label-custom">Jumlah</label>
                                                <div class="col-lg-1">
                                                    <input type="text" name="jumlah_bhp" class="custom-form" style="text-align: center" value="1" onkeypress="return hanyaAngka(this)" id="jumlah-bhp">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label class="col-lg-2 col-form-label-custom"></label>
                                                <div class="col-lg-6">
                                                    <button type="button" title="tambah bhp" class="btn btn-info" onclick="addBHP(); return false;"><span class="fas fa-plus-circle mr-1"></span>Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="total_bhp" id="bhp">
                                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-bhp">
                                            <thead class="thead-theme">
                                                <tr>
                                                    <th width="5%">No.</th>
                                                    <th width="40%" class="left">Nama Barang</th>
                                                    <th width="10%" class="left">Unit Kemasan</th>
                                                    <th width="15%" class="right">Harga Jual</th>
                                                    <th width="10%" class="center">Jumlah</th>
                                                    <!--<th width="10%" class="center">Sisa</th>-->
                                                    <th width="15%" class="right">Total</th>
                                                    <th width="5%"></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="right" colspan="5">TOTAL</td>
                                                    <td class="right" id="bhp-label"></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Form BHP -->
                                
                                <!-- Laboratorium -->
                                <div class="form-laboratorium">
                                    <button type="button" title="order pemeriksaan lab" class="btn btn-info waves-effect" onclick="request_lab()"><i class="fa fa-plus"></i> Order Pemeriksaan Laboratorium</button>
                                    <br/><br/>
                                    <div class="row" id="req_lab"></div>
                                </div>
                                <!-- Laboratorium -->
                        
                                <!-- Radiologi -->
                                <div class="form-radiologi">
                                    <button type="button" title="order pemeriksaan rad" class="btn btn-info waves-effect" onclick="request_rad()"><i class="fa fa-plus"></i> Order Pemeriksaan Radiologi</button>
                                    <br/><br/>
                                    <div class="row" id="req_rad"></div>
                                </div>
                                <!-- Radiologi -->

                                <!-- Bank Darah -->
                                <div class="form-bank-darah">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="harga_jual" id="harga-jual-darah">
                                            <input type="hidden" id="nama-kemasan-darah">
                                            <input type="hidden" id="sisa-darah">
                                            <input type="hidden" name="id_penjamin_darah" id="id-penjamin-darah">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-sm table-detail table-striped" width="100%">
                                                        <tr>
                                                            <td width="150px"><b>Pasien</b></td>
                                                            <td width="1px">:</td>
                                                            <td><span id="identitas-pasien-darah"></span></td>
                                                        </tr>
                                                    </table>
                                                    <div class="form-group row tight">
                                                        <label for="barang-darah" class="col-lg-2 col-form-label-custom">Barang</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="barang" class="select2c-input" id="barang-darah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row tight">
                                                        <label for="kemasan-darah" class="col-lg-2 col-form-label-custom">Kemasan</label>
                                                        <div class="col-lg-5">
                                                            <?= form_dropdown('kemasan', array('' => 'Pilih'), array(''), 'id=kemasan-darah class=custom-form') ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row tight">
                                                        <label for="jumlah-darah" class="col-lg-2 col-form-label-custom">Jumlah</label>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="jumlah_darah" class="custom-form" style="text-align: center" value="1" onkeypress="return hanyaAngka(this)" id="jumlah-darah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row tight">
                                                        <label class="col-lg-2 col-form-label-custom"></label>
                                                        <div class="col-lg-6">
                                                            <button type="button" title="permintaan darah" class="btn btn-info" onclick="addDarah(); return false;"><span class="fas fa-arrow-circle-down mr-1"></span>Tambah Permintaan Darah</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="total_darah" id="darah">
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="table-darah">
                                                <thead class="thead-theme">
                                                    <tr>
                                                        <th width="5%">No.</th>
                                                        <th width="30%" class="left">Nama Barang</th>
                                                        <th width="10%" class="left">Unit Kemasan</th>
                                                        <th width="15%" class="right">Harga Jual</th>
                                                        <th width="10%" class="center">Jumlah</th>
                                                        <!--<th width="10%" class="center">Sisa</th>-->
                                                        <th width="15%" class="right">Total</th>
                                                        <th width="15%" class="center">Status</th>
                                                        <th width="5%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="right" colspan="5"><b>TOTAL</b></td>
                                                        <td class="right" id="darah-label"></td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Bank Darah -->

								<!-- DPMP -->
								<div class="form-dpmp-hemo">
									<div class="row">
										<div class="col-lg-12">
											<input type="hidden" name="id_dftr_dpmp" id="id-dftr-dpmp">
											<button type="button" title="dpmp"class="btn btn-info waves-effect" onclick="addDPMPHemo()"><i class="fas fa-plus-circle mr-1"></i>Tambah Order DPMP</button>
											<table class="table table-hover table-striped table-sm color-table info-table mt-1" id="table-order-dpmp-hemo">
												<thead>
													<tr>
														<th width="1%" class="center">No.</th>
														<th width="5%" class="left">Waktu Order</th>
														<th width="5%" class="center">Order</th>
														<th width="5%" class="center">Status</th>
														<th width="5%" class="center"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- End DPMP -->
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pemeriksaan -->



<!-- Modal Edit Operator -->
<div id="modal-edit-operator" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-edit-operator-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-edit-operator-label">Edit Operator</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-edit-operator role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
                <input type="hidden" name="id_tarif_tindakan" id="id-tarif-tindakan-eo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group tight">
                            <label>Tindakan</label>
                            <h5 id="tindakan-label-eo"></h5>
                        </div>
                        <div class="form-group tight">
                            <label>Profesi</label>
                            <?= form_dropdown('profesi', $profesi, array(), 'class=form-control id=profesi-eo') ?>
                        </div>
                        <div class="form-group tight">
                            <label>Operator</label>
                            <input type="text" name="operator" class="select2-input" id="operator-eo">
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanEditOperator()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- End Modal Edit Operator -->