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
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran">
                <input type="hidden" name="id_pasien" id="id-pasien">
                <input type="hidden" name="id_layanan" id="id-layanan">
                <input type="hidden" name="jenis_rawat" id="jenis-rawat">
                <input type="hidden" name="jenis_layanan" value="" id="jenis-layanan">
                <input type="hidden" id="tindaklanjut">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Data Pasien</li>
                                    <li>SOAP & SBAR</li>
                                    <li>Diagnosis</li>
                                    <li>Tindakan</li>
                                    <li>BHP</li>
                                    <li>Laboratorium</li>
                                    <li>Radiologi</li>
                                    <li>ODC</li>
                                    <li>Bank Darah</li>
                                    <li>PKRT</li>

                                    <!-- <li>Rehab. Medik</li> -->
                                </ol>

                                <!-- Data bwizard -->
                                <!-- Data Pasien -->
                                <div class="form-info-pasien">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <table class="table table-sm table-detail table-striped">
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
                                                    <td><b>Uploaod File Rekam Medis</b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-xxs" id="btn-upload-file-igd"><i class="fas fa-upload m-r-5"></i>Upload File Rekam Medis</button>
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
                                                    <td width="30%"><b>Poliklinik</b></td>
                                                    <td><span id="layanan-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Antrian Poliklinik</b></td>
                                                    <td><span id="no-antrian-detail"></span></td>
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
                                                    <td><b>Kelas Rawat (BPJS)</b></td>
                                                    <td><span id="kelas-rawat-pasien"></span></td>
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
                                            <!-- <h5><b></b></h5>
                                            <input type="hidden" name="id_pendaftaran_pasien" id="id-pendaftaran-pasien"> -->


                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Pasien -->

                                <!-- Form Anamnesa  -->
                                <div class="form-anamnesa">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="center"><b>SOAP & SBAR</b></h5>
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
                                            <button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#anamnesa" aria-expanded="false" aria-controls="anamnesa">
                                                <i class="fas fa-expand m-r-5"></i>Open Input SOAP & SBAR
                                            </button>
                                            <div class="collapse" id="anamnesa">
                                                <span>
                                                    <h3 class="center">S.O.A.P</h3>
                                                </span>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group tight">
                                                            <label>SUBJECTIVE</label>
                                                            <textarea name="s_soap" id="s_soap" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                        <div class="form-group tight">
                                                            <label>OBJECTIVE</label>
                                                            <textarea name="o_soap" id="o_soap" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                        <div class="form-group tight">
                                                            <label>Anjuran/Usul Tindakan Lanjut (Follow Up)</label>
                                                            <textarea name="usul_tindak_lanjut" id="usul_tindak_lanjut" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group tight">
                                                            <label>ASSESSMENT</label>
                                                            <textarea name="a_soap" id="a_soap" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                        <div class="form-group tight">
                                                            <label>PLAN</label>
                                                            <textarea name="p_soap" id="p_soap" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <span>
                                                    <h3 class="center">S.B.A.R</h3>
                                                </span>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group tight">
                                                            <label>SITUATION</label>
                                                            <textarea name="s_sbar" id="s_sbar" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                        <div class="form-group tight">
                                                            <label>BACKGROUND</label>
                                                            <textarea name="b_sbar" id="b_sbar" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group tight">
                                                            <label>ASSESSMENT</label>
                                                            <textarea name="a_sbar" id="a_sbar" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                        <div class="form-group tight">
                                                            <label>RECOMMENDATION</label>
                                                            <textarea name="r_sbar" id="r_sbar" class="custom-textarea" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
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
                                                <div class="form-group row tight">
                                                    <label for="diagnosa-manual" class="col-lg-4 col-form-label"></label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="diagnosa_manual" class="form-check-input" id="diagnosa-manual">
                                                            <label class="form-check-label" for="diagnosa-manual">Diagnosa Manual</label>
                                                        </div>
                                                        <!-- <div class="custom-control custom-checkbox m-t-5">
                                                            <input type="checkbox" name="diagnosa_manual" class="custom-control-input" id="diagnosa-manual">
                                                            <label class="custom-control-label" for="diagnosa-manual">Diagnosa Manual</label>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row tight golongan-sebab-sakit">
                                                    <label for="golongan-sebab-sakit" class="col-lg-4 col-form-label-custom">Dignosa</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="golongan_sebab_sakit" id="golongan-sebab-sakit" class="select2c-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight golongan-sebab-sakit-lain">
                                                    <label for="golongan-sebab-sakit-lain" class="col-lg-4 col-form-label-custom">Dignosa</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="golongan_sebab_sakit_lain" id="golongan-sebab-sakit-lain" class="custom-form validasi-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="diagnosa-klinik" class="col-lg-4 col-form-label-custom">Diagnosa Klinis</label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="diagnosa_klinik" class="form-check-input" id="diagnosa-klinik">
                                                            <label class="form-check-label" for="diagnosa-klinik">Ya</label>
                                                        </div>
                                                        <!-- <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="diagnosa_klinik" class="custom-control-input" id="diagnosa-klinik">
                                                            <label class="custom-control-label" for="diagnosa-klinik">Ya</label>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="jenis_kasus" class="col-lg-4 col-form-label-custom">Jenis Kasus</label>
                                                    <div class="col-lg-4">
                                                        <?= form_dropdown('jenis_kasus', array('' => 'Pilih', '1' => 'Baru', '0' => 'Lama'), array(), 'id=jenis_kasus class=custom-form') ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group row tight">
                                                    <label class="col-lg-4 col-form-label-custom"></label>
                                                    <div class="col-lg-8">
                                                        <a href="#" class="copy btn btn-primary btn-xxs" id="btn-tambah-diagnosa-banding" rel=".diagnosa-banding"><i class="fas fa-plus-circle mr-2"></i>Tambah Diagnosa Banding</a>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight diagnosa-banding">
                                                    <label for="diagnosa-banding" class="col-lg-4 col-form-label-custom">Dignosa Banding</label>
                                                    <div class="col-lg-7">
                                                        <input type="text" name="diagnosa_banding[]" id="diagnosa-banding" class="custom-form validasi-input">
                                                    </div>
                                                </div> -->
                                                <div class="form-group row tight">
                                                    <label for="diagnosa-akhir" class="col-lg-4 col-form-label-custom">Diagnosa Akhir</label>
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
                                                        <button type="button" title="tambah diagnosa" onclick="addDiagnosa()" class="btn btn-info"><i class="fas fa-arrow-circle-down mr-2"></i>Tambah Diagnosa</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="table-diagnosa">
                                                <thead class="thead-theme">
                                                    <tr>
                                                        <th class="center">No</th>
                                                        <th>Waktu</th>
                                                        <th>Dokter</th>
                                                        <th>Diagnosa</th>
                                                        <th>Klinik</th>
                                                        <th class="center">Prioritas</th>
                                                        <th class="center">Jenis Kasus</th>
                                                        <th>Diagnosa Banding</th>
                                                        <th>Diagnosa Akhir</th>
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
                                                <label for="operator" class="col-lg-4 col-form-label-custom">Dokter</label>
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
                                        <div class="col-lg-6">
                                            <input type="hidden" name="id_unit" id="unit">
                                            <input type="hidden" name="kelas" id="kelas-tindakan">
                                            <!-- <div class="form-group row tight">
                                                <label for="unit" class="col-lg-4 col-form-label-custom">Instalasi</label>
                                                <div class="col-lg-4">
                                                    <input type="hidden" name="id_unit" class="select2c-input" id="unit" readonly>
                                                </div>
                                            </div> -->
                                            <!-- <div class="form-group row tight">
                                                <label for="kelas-tindakan" class="col-lg-4 col-form-label-custom">Kelas</label>
                                                <div class="col-lg-4">
                                                    <?= form_dropdown('kelas', $kelas, array(), 'id=kelas-tindakan class=custom-form readonly') ?>
                                                </div>
                                            </div> -->
                                            <!-- <div class="form-group row tight">
                                                <label for="keterangan-tindakan" class="col-lg-4 col-form-label-custom">Keterangan</label>
                                                <div class="col-lg-4">
                                                    <textarea name="keterangan_tindakan" id="keterangan-tindakan" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div> -->
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
                                    <br /><br />
                                    <div class="row" id="req_lab"></div>
                                </div>
                                <!-- Laboratorium -->

                                <!-- Radiologi -->
                                <div class="form-radiologi">
                                    <button type="button" title="order pemeriksaan rad" class="btn btn-info waves-effect" onclick="request_rad()"><i class="fa fa-plus"></i> Order Pemeriksaan Radiologi</button>
                                    <br /><br />
                                    <div class="row" id="req_rad"></div>
                                </div>
                                <!-- Radiologi -->

                                <!-- Operasi -->
                                <div class="form-operasi">
                                    <input type="hidden" name="id_jadwal_kamar_operasi" id="id-jadwal-kamar-operasi">
                                    <input type="hidden" name="tarif_operasi" id="tarif-operasi">
                                    <table class="table table-sm table-detail table-striped" width="100%">
                                        <tr>
                                            <td width="150px"><b>Pasien</b></td>
                                            <td width="1px">:</td>
                                            <td><span id="identitas-pasien-bhp"></span></td>
                                        </tr>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row tight">
                                                <label for="tindakan-operasi" class="col-md-3 col-form-label-custom right">Nama Operasi</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="tindakan_operasi" class="select2c-input" id="tindakan-operasi" placeholder="Pilih Tindakan Operasi">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="tindakan-icd9-ok" class="col-lg-3 col-form-label-custom right">ICD-9 CM</label>
                                                <div class="col-lg-5">
                                                    <input type="text" name="tindakan_icd9_ok" class="select2c-input" id="tindakan-icd9-ok">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="timing-operasi" class="col-md-3 col-form-label-custom right">Timing Operasi</label>
                                                <div class="col-md-5">
                                                    <?= form_dropdown('timing_operasi', ['Terjadwal' => 'Terjadwal', 'Emergency' => 'Cito'], 'Terjadwal', 'id=timing-operasi class=custom-form') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="" class="col-md-3 col-form-label-custom right"></label>
                                                <div class="col-md-9">
                                                    <button type="button" title="order operasi" class="btn btn-info" onclick="addOrderOperasi()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Tindakan Operasi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="table-order-operasi">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="center">No.</th>
                                                        <th width="30%" class="left">Tindakan Operasi</th>
                                                        <th width="30%" class="left">ICD-9 CM</th>
                                                        <th width="7%" class="left">Bobot</th>
                                                        <th width="7%" class="left">Timing</th>
                                                        <th width="7%" class="right">Tarif</th>
                                                        <th width="7%" class="center">Status</th>
                                                        <th width="7%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Operasi -->

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

                                <!-- Form PKRT -->
                                <div class="form-pkrt">
                                    <input type="hidden" name="harga_jual_pkrt" id="harga-jual-pkrt">
                                    <input type="hidden" id="nama-pkrt">
                                    <!-- <input type="hidden" id="sisa-bhp"> -->
                                    <!-- <input type="hidden" name="id_penjamin_bhp" id="id-penjamin-pkrt"> -->
                                    <div class="row">
                                        <!-- <table class="table table-sm table-detail table-striped" width="100%">
                                            <tr>
                                                <td width="150px"><b>Pasien</b></td>
                                                <td width="1px">:</td>
                                                <td><span id="identitas-pasien-pkrt"></span></td>
                                            </tr>
                                        </table> -->

                                        <div class="col-lg-6">
                                            <div class="form-group row tight">
                                                <label for="barang-pkrt" class="col-lg-2 col-form-label-custom">Pasien</label>
                                                <div class="col-lg">
                                                    : <b><span id="identitas-pasien-pkrt"></span></b>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="barang-pkrt" class="col-lg-2 col-form-label-custom">Barang</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="barang_pkrt" class="select2c-input" id="barang-pkrt">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="jumlah-pkrt" class="col-lg-2 col-form-label-custom">Jumlah</label>
                                                <div class="col-lg-1">
                                                    <input type="text" name="jumlah_pkrt" class="custom-form" style="text-align: center" value="1" onkeypress="return hanyaAngka(this)" id="jumlah-pkrt">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label class="col-lg-2 col-form-label-custom"></label>
                                                <div class="col-lg-6">
                                                    <button type="button" title="tambah pkrt" class="btn btn-info" onclick="addPKRT(); return false;"><span class="fas fa-plus-circle mr-1"></span>Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="total_pkrt" id="pkrt">
                                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-pkrt">
                                            <thead class="thead-theme">
                                                <tr>
                                                    <th width="7%" class="center">No.</th>
                                                    <th width="42%" class="left">Nama Barang</th>
                                                    <th width="17%" class="right">Harga Jual</th>
                                                    <th width="12%" class="center">Jumlah</th>
                                                    <!--<th width="10%" class="center">Sisa</th>-->
                                                    <th width="17%" class="right">Total</th>
                                                    <th width="7%"></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="right" colspan="4">TOTAL</td>
                                                    <td class="right"><span id="pkrt-label"></span></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Form PKRT -->

                                <!-- Fisioterapi -->
                                <!-- <div class="form-fisioterapi">
                                    <button type="button" class="btn btn-info waves-effect" onclick="requestFisioterapi()"><i class="fa fa-plus"></i> Order Pemeriksaan Fisioterapi</button>
                                    <br/><br/>
                                    <div class="row" id="request-fisio"></div>
                                </div> -->
                                <!-- Fisioterapi -->
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