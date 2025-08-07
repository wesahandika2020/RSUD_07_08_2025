<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id-layanan-search" />
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal</label>
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
                <div class="form-group row tight">
                    <label for="tanggal_lahir_search" class="col-3 col-form-label">Tanggal lahir</label>
                    <div class="col">
                        <input type="text" name="tanggal_lahir" id="tanggal-lahir-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="alamat_search" class="col-3 col-form-label">Alamat</label>
                    <div class="col">
                        <textarea name="alamat" id="alamat-search" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="user_search_lab" class="col-3 col-form-label">Petugas</label>
                    <div class="col">
                        <input type="text" name="user" id="user_search_lab" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="penjamin-search" class="col-3 col-form-label">Penjamin</label>
                    <div class="col">
                        <input type="text" name="penjamin_search" id="penjamin-search" class="select2-input">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataPendaftaran()"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pendaftaran-->
<div id="modal-pendaftaran" class="modal fade" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pendaftaran-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body bg-default">
                <?= form_open('', 'id=form-pendaftaran role=form class=form-horizontal') ?>
                <!-- ID Hidden -->
                <input type="hidden" name="no_antrian" id="no-antrian">
                <input type="hidden" name="jenis_pendaftaran" id="jenis-pendaftaran" value="Laboratorium">
                <!-- End ID Hidden -->

                <!-- Data Pasien -->
                <div class="row">
                    <div class="col-12">
                        <ul class="list-group m-b-10">
                            <li class="list-group-item bg-theme text-white">
                                <i class="far fa-id-card m-r-5"></i>
                                <b>Data Pasien</b>
                            </li>
                            <li class="list-group-item border-theme">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row tight">
                                            <label for="domisili" class="col-3 col-form-label">Domisili <span class="text-red">*</span></label>
                                            <div class="col-6">
                                                <?= form_dropdown('domisili', $domisili, array(), 'class="custom-select" id=domisili') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight autoshow">
                                            <label for="no-identitas" class="col-3 col-form-label">NIK <span class="text-red">*</span></label>
                                            <div class="col">
                                                <input type="text" name="no_identitas" maxlength="16" class="form-control reset-field" id="no-identitas" onkeypress="return hanyaAngka(event)" placeholder="NIK">
                                            </div>
                                        </div>
                                        <div class="form-group row tight autoshow" id="bt_search_nik">
                                            <label for="" class="col-3 col-form-label"></label>
                                            <div class="col">
                                                <button class="btn btn-info btn-xs" type="button" id="btn-cek-nik"><i class="fas fa-search"></i>&nbsp;Cari Data Pasien Berdasarkan NIK</button>
                                            </div>
                                        </div>
                                        <div class="form-group row tight" style="display:none">
                                            <label for="no-rm-lama" class="col-3 col-form-label">Pasien Lama</label>
                                            <div class="col">
                                                <input type="text" name="no_rm_lama" id="no-rm-lama" class="select2-input" placeholder="No RM Pasien Lama">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="no_rm" class="col-md-3 col-form-label">No RM</label>
                                            <div class="col-md-8">
                                                <input type="text" name="no_rm" id="no-rm" class="select2-input" placeholder="No RM Pasien">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" title="Klik untuk pencarian data pasien tingkat lanjut." onclick="pencarianAdvancedPasien()" style="padding:0.55rem 1rem;" class="btn btn-info"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="nama" class="col-3 col-form-label">Nama Pasien <span class="text-red">*</span></label>
                                            <div class="col">
                                                <input type="text" name="nama" class="form-control reset-field" id="nama" placeholder="Nama Pasien">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="statuspasien" class="col-3 col-form-label">Status Pasien</label>
                                            <div class="col">
                                                <?= form_dropdown('statuspasien', $statuspasien, array(), 'class="custom-select reset-select" id=statuspasien') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="kelamin" class="col-3 col-form-label">Jenis Kelamin <span class="text-red">*</span></label>
                                            <div class="col">
                                                <?= form_dropdown('kelamin', $kelamin, array(), 'class="custom-select reset-select" id=kelamin') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="tempat-lahir" class="col-3 col-form-label">Tempat Lahir</label>
                                            <div class="col">
                                                <input type="text" name="tempat_lahir" id="tempat-lahir" class="form-control reset-field" placeholder="Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="tanggal-lahir" class="col-3 col-form-label">Tanggal Lahir <span class="text-red">*</span></label>
                                            <div class="col-4">
                                                <input type="date" name="tanggal_lahir" id="tanggal-lahir" class="form-control reset-field" placeholder="Tanggal lahir">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="umur-label" class="col-3 col-form-label">Umur</label>
                                            <div class="col">
                                                <h4 class="m-t-10">
                                                    <div class="label label-primary" id="umur-label"></div>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="alamat" class="col-3 col-form-label">Alamat <span class="text-red">*</span></label>
                                            <div class="col">
                                                <textarea name="alamat" id="alamat" class="form-control reset-field" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="no_rw" class="col-3 col-form-label">No. RT / RW / Rumah / Kode POS</label>
                                            <div class="col-2">
                                                <input type="text" name="no_rt" id="no_rt" class="form-control reset-field" placeholder="No. RT">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" name="no_rw" id="no_rw" class="form-control reset-field" placeholder="No. RW">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" name="no_rumah" id="no_rumah" class="form-control reset-field" placeholder="No. Rumah">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" name="kode_pos" id="kode_pos" class="form-control reset-field" placeholder="Kode POS">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="provinsi" class="col-3 col-form-label">Provinsi <span class="text-red">*</span></label>
                                            <div class="col">
                                                <select name="provinsi" class="custom-select reset-select" id="provinsi">
                                                    <option value="">Pilih Provinsi</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="nama_provinsi" id="nama-provinsi" class="reset-field">
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="kabupaten" class="col-3 col-form-label">Kabupaten/Kota <span class="text-red">*</span></label>
                                            <div class="col">
                                                <select name="kabupaten" class="custom-select reset-select" id="kabupaten">
                                                    <option value="">Pilih Kabupaten</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="nama_kabupaten" id="nama-kabupaten" class="reset-field">
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="kecamatan" class="col-3 col-form-label">Kecamatan <span class="text-red">*</span></label>
                                            <div class="col">
                                                <select name="kecamatan" class="custom-select reset-select" id="kecamatan">
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="nama_kecamatan" id="nama-kecamatan" class="reset-field">
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="kelurahan" class="col-3 col-form-label">Kelurahan <span class="text-red">*</span></label>
                                            <div class="col">
                                                <select name="kelurahan" class="custom-select reset-select" id="kelurahan">
                                                    <option value="">Pilih Kelurahan</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="nama_kelurahan" id="nama-kelurahan" class="reset-field">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row tight">
                                            <label for="agama" class="col-3 col-form-label">Agama <span class="text-red">*</span></label>
                                            <div class="col">
                                                <?= form_dropdown('agama', $agama, array(), 'class="custom-select reset-select" id=agama') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="goldarah" class="col-3 col-form-label">Gol. Darah</label>
                                            <div class="col">
                                                <?= form_dropdown('goldarah', $goldarah, array(), 'class="custom-select reset-select" id=goldarah') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="pendidikan" class="col-3 col-form-label">Pendidikan <span class="text-red">*</span></label>
                                            <div class="col">
                                                <?= form_dropdown('pendidikan', $pendidikan, array(), 'class="custom-select reset-select" id=pendidikan') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="pekerjaan" class="col-3 col-form-label">Pekerjaan</label>
                                            <div class="col">
                                                <?= form_dropdown('pekerjaan', $pekerjaan, array(), 'class="custom-select reset-select" id=pekerjaan') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="pernikahan" class="col-3 col-form-label">Status Kawin</label>
                                            <div class="col">
                                                <?= form_dropdown('pernikahan', $pernikahan, array(), 'class="custom-select reset-select" id=pernikahan') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="ayah" class="col-3 col-form-label">Nama Ayah</label>
                                            <div class="col">
                                                <input type="text" name="ayah" class="form-control reset-field" id="ayah" placeholder="Nama Ayah">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="ibu" class="col-3 col-form-label">Nama Ibu</label>
                                            <div class="col">
                                                <input type="text" name="ibu" class="form-control reset-field" id="ibu" placeholder="Nama Ibu">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="telp" class="col-3 col-form-label">No. Telp <span class="text-red">*</span></label>
                                            <div class="col">
                                                <input type="text" name="telp" pattern="^\d{10}$" maxlength="15" class="form-control reset-field" id="telp" onkeypress="return hanyaAngka(event)" placeholder="No. Telp/HP">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="etnis" class="col-3 col-form-label">Etnis <span class="text-red">*</span></label>
                                            <div class="col">
                                                <?= form_dropdown('etnis', $etnis, array(), 'class="custom-select reset-select" id=etnis') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight etnis-lainnya">
                                            <label for="etnis-lainnya" class="col-3 col-form-label">Etnis Lainnya</label>
                                            <div class="col">
                                                <input type="text" name="etnis_lainnya" id="etnis-lainnya" class="form-control reset-field">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="disabilitas" class="col-3 col-form-label">Disabilitas</label>
                                            <div class="col">
                                                <div class="custom-control custom-checkbox m-t-5">
                                                    <input type="checkbox" name="disabilitas" class="custom-control-input" id="disabilitas">
                                                    <label class="custom-control-label" for="disabilitas"><i>Centang jika pasien disabilitas</i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row tight hamkom">
                                            <label for="hamkom" class="col-3 col-form-label">Hambatan</label>
                                            <div class="col">
                                                <?= form_dropdown('hamkom', $hamkom, array(), 'class="custom-select reset-select" id=hamkom') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight hamkom-lainnya">
                                            <label for="hamkom-lainnya" class="col-3 col-form-label">Hambatan Lainnya</label>
                                            <div class="col">
                                                <input type="text" name="hamkom_lainnya" id="hamkom-lainnya" class="form-control reset-field">
                                            </div>
                                        </div>

                                        <!-- untuk logo profil pasien -->
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
                                        <!-- end logo profil pasien -->
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Data Pasien -->
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- Kunjungan Pasien -->
                            <div class="col-6">
                                <ul class="list-group m-b-10">
                                    <li class="list-group-item bg-theme text-white"><i class="fas fa-stethoscope m-r-5"></i><b>Kunjungan Pasien</b></li>
                                    <li class="list-group-item border-theme">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row tight">
                                                    <label for="dokter" class="col-3 col-form-label">Dokter <span class="text-red">*</span></label>
                                                    <div class="col hehe">
                                                        <input type="text" name="dokter" id="dokter" class="select2-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="penjamin" class="col-3 col-form-label">D.O.A</label>
                                                    <div class="col-8">
                                                        <table class="table table-sm" style="border: 0;">
                                                            <tr>
                                                                <td width="18%">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="radio-no" name="doa" checked="checked" value="0" class="custom-control-input pointer">
                                                                        <label class="custom-control-label pointer" for="radio-no">Tidak</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="radio-yes" name="doa" value="1" class="custom-control-input pointer">
                                                                        <label class="custom-control-label pointer" for="radio-yes">Iya</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="cara-bayar" class="col-3 col-form-label">Cara Bayar</label>
                                                    <div class="col-9">
                                                        <?= form_dropdown('cara_bayar', $cara_bayar, array(), 'class="custom-select" id=cara-bayar') ?>
                                                    </div>
                                                </div>
												<div class="form-group row tight penjamin-group">
                                                    <label for="penjamin" class="col-3 col-form-label">Penjamin</label>
                                                    <div class="col-9">
                                                        <input type="text" name="penjamin" id="penjamin" class="select2-input" placeholder="Penjamin">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight asuransi-field">
                                                    <label for="no-polish" class="col-3 col-form-label">No. Polish</label>
                                                    <div class="col">
                                                        <input type="text" name="no_polish" class="form-control reset-field" id="no-polish" onkeypress="return hanyaAngka(event)" placeholder="No. Kartu Polish">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight asuransi-field">
                                                    <label for="no-rujukan" class="col-3 col-form-label">No. Rujukan</label>
                                                    <div class="col">
                                                        <input type="text" name="no_rujukan" class="form-control reset-field" id="no-rujukan" onkeypress="return hanyaAngka(event)" placeholder="No. Kartu Rujukan">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight asuransi-field">
                                                    <label for="buat-sep" class="col-3 col-form-label"></label>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-success btn-xs" id="btn-buat-sep" title="Klik untuk membuat sep bagi pasien peserta BPJS"><i class="fas fa-fax"></i> From Pembuatan SEP</button>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight asuransi-field">
                                                    <label for="no-sep" class="col-3 col-form-label">No. SEP</label>
                                                    <div class="col">
                                                        <input type="text" name="no_sep" class="form-control reset-field" id="no-sep" placeholder="No. SEP">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Kunjungan Pasien -->
                            <!-- Rujukan -->
                            <div class="col-6 mb-2">
                                <ul class="list-group">
                                    <li class="list-group-item bg-theme text-white">
                                        <i class="fas fa-retweet m-r-5"></i><b>Rujukan</b>
                                    </li>
                                    <li class="list-group-item border-theme">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row tight">
                                                    <label for="asal-masuk" class="col-3 col-form-label">Asal Masuk</label>
                                                    <div class="col-9">
                                                        <?= form_dropdown('asal_masuk', $asal_masuk, array(), 'class="custom-select reset-select" id=asal-masuk') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="instansi-rujukan" class="col-3 col-form-label">Nama Instansi Perujuk</label>
                                                    <div class="col">
                                                        <input type="text" name="instansi_rujukan" id="instansi-rujukan" class="select2-input" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="nadis-perujuk" class="col-3 col-form-label">Nama Tenaga Perujuk</label>
                                                    <div class="col">
                                                        <input type="text" name="nadis_perujuk" id="nadis-perujuk" class="form-control reset-field" placeholder="Nama Tenaga Kesehatan Perujuk">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="keterangan-asal-masuk" class="col-3 col-form-label">Keterangan</label>
                                                    <div class="col">
                                                        <textarea type="text" name="keterangan_asal_masuk" id="keterangan-asal-masuk" rows="2" class="form-control reset-field" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Rujukan -->
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- Kunjungan Pasien -->
                            <div class="col-6">
                                <ul class="list-group">
                                    <li class="list-group-item bg-theme text-white"><i class="fas fa-hands-helping m-r-5"></i><b>Penanggung Jawab</b></li>
                                    <li class="list-group-item border-theme">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row tight">
                                                    <label for="nik-pjwb" class="col-3 col-form-label">NIK</label>
                                                    <div class="col">
                                                        <input type="text" name="nik_pjwb" maxlength="16" class="form-control reset-field" id="nik-pjwb" onkeypress="return hanyaAngka(event)" placeholder="NIK Penanggung Jawab">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="nama-pjwb" class="col-3 col-form-label">Nama</label>
                                                    <div class="col">
                                                        <input type="text" name="nama_pjwb" class="form-control reset-field" id="nama-pjwb" placeholder="Nama Penanggung Jawab">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="kelamin-pjwb" class="col-3 col-form-label">Kelamin</label>
                                                    <div class="col">
                                                        <?= form_dropdown('kelamin_pjwb', $kelamin, array(), 'class="custom-select reset-select" id=kelamin-pjwb') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="telp-pjwb" class="col-3 col-form-label">Telp.</label>
                                                    <div class="col">
                                                        <input type="text" name="telp_pjwb" pattern="^\d{10}$" maxlength="15" class="form-control reset-field" id="telp-pjwb" onkeypress="return hanyaAngka(event)" placeholder="No. Telp Penanggung Jawab">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="alamat-pjwb" class="col-3 col-form-label">Alamat</label>
                                                    <div class="col">
                                                        <textarea name="alamat_pjwb" class="form-control reset-field" id="alamat-pjwb" placeholder="Alamat Penanggung Jawab"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="btn-salin" class="col-3 col-form-label"></label>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-info btn-xs" onclick="salinPenanggungJawab()"><i class="fas fa-angle-double-right m-r-5"></i>Salin Data Penanggung Jawab</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Kunjungan Pasien -->
                            <!-- Rujukan -->
                            <div class="col-6">
                                <ul class="list-group">
                                    <li class="list-group-item bg-theme text-white">
                                        <i class="fas fa-handshake m-r-5"></i><b>Penanggung Jawab Finansial</b>
                                    </li>
                                    <li class="list-group-item border-theme">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row tight">
                                                    <label for="nama-pjwb-finansial" class="col-3 col-form-label">NIK</label>
                                                    <div class="col">
                                                        <input type="text" name="nik_pjwb_finansial" maxlength="16" class="form-control reset-field" id="nik-pjwb-finansial" onkeypress="return hanyaAngka(event)" placeholder="NIK Penanggung Jawab Finansial">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="nama-pjwb-finansial" class="col-3 col-form-label">Nama</label>
                                                    <div class="col">
                                                        <input type="text" name="nama_pjwb_finansial" class="form-control reset-field" id="nama-pjwb-finansial" placeholder="Nama Penanggung Jawab Finansial">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="kelamin-pjwb-finansial" class="col-3 col-form-label">Kelamin</label>
                                                    <div class="col">
                                                        <?= form_dropdown('kelamin_pjwb', $kelamin, array(), 'class="custom-select reset-select" id=kelamin-pjwb-finansial') ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="telp-pjwb-finansial" class="col-3 col-form-label">Telp.</label>
                                                    <div class="col">
                                                        <input type="text" name="telp_pjwb_finansial" pattern="^\d{10}$" maxlength="15" class="form-control reset-field" id="telp-pjwb-finansial" onkeypress="return hanyaAngka(event)" placeholder="No. Telp Penanggung Jawab Finansial">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="alamat-pjwb-finansial" class="col-3 col-form-label">Alamat</label>
                                                    <div class="col">
                                                        <textarea name="alamat_pjwb_finansial" class="form-control reset-field" id="alamat-pjwb-finansial" placeholder="Alamat Penanggung Jawab Finansial"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Rujukan -->
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanDataPendaftaran()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pendaftaran-->

<!-- Modal Detail Pendaftaran -->
<div id="modal-detail-pendaftaran" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 87%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-detail-pendaftaran-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran" />
                <input type="hidden" name="id_layanan" id="id-layanan" />

                <div class="row">
                    <div class="col-6">
                        <table class="table table-sm table-striped table-hover table-detail">
                            <tr>
                                <td width="30%"><b>Nama</b></td>
                                <td width="90%"><span id="nama-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>No.RM</b></td>
                                <td><span id="no-rm-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>No. RM Lama</b></td>
                                <td><span id="no-rm-lama-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td><span id="alamat-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Kelamin</b></td>
                                <td><span id="kelamin-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Tgl Lahir/Umur</b></td>
                                <td><span id="tgl-lahir-umur-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Telp.</b></td>
                                <td><span id="telp_detail"></span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><b>Instansi Perujuk</b></td>
                                <td><span id="instansi-perujuk-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Nadis Perujuk</b></td>
                                <td><span id="nadis-perujuk-detail"></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table table-sm table-striped table-hover table-detail">
                            <tr>
                                <td width="45%"><b>Cara Bayar</b></td>
                                <td width="75%"><span id="cara-bayar-detail"></span></td>
							</tr>
                            <tr>
                                <td><b>Jenis Layanan</b></td>
                                <td><span id="jenis-layanan-detail"></span></td>
							</tr>
							<tr>
                                <td></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><b>Nama Penanggung Jawab</b></td>
                                <td><span id="nama-pjwb-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Alamat Penanggung Jawab</b></td>
                                <td><span id="alamat-pjwb-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Telp Penanggung Jawab</b></td>
                                <td><span id="telp-pjwb-detail"></span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><b>Nama Penanggung Jawab Keuangan</b></td>
                                <td><span id="nama-pjwb-detail-finansial"></span></td>
                            </tr>
                            <tr>
                                <td><b>Alamat Penanggung Jawab Keuangan</b></td>
                                <td><span id="alamat-pjwb-detail-finansial"></span></td>
                            </tr>
                            <tr>
                                <td><b>Telp Penanggung Jawab Keuangan</b></td>
                                <td><span id="telp-pjwb-detail-finansial"></span></td>
                            </tr>
                        </table>
                        <table class="table-no-border">
                            <tr>
                                <td><button type="button" class="btn btn-info" onclick="orderLAB()"><i class="fa fa-paper-plane mr-1"></i>Order Laboratorium</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="req_lab"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Detail Pendaftaran -->
