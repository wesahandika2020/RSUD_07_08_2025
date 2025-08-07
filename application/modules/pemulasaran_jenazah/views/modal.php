<!-- Modal Search -->
<div id="modal_search" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
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
                    <label for="awal" class="col-3 col-form-label">Tanggal</label>
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
                <!-- <div class="form-group row tight">
                    <label for="nik_search" class="col-3 col-form-label">NIK</label>
                    <div class="col">
                        <input type="text" name="nik" id="nik-search" class="form-control">
                    </div>
                </div> -->
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
                <input type="hidden" name="jenis_layanan" value="Poliklinik" id="jenis-layanan">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Data Pasien</li>
                                    <li>Tindakan</li>
                                    <li>BHP</li>
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
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alergi</b></td>
                                                    <td><span id="alergi-detail"></span></td>
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
                                                <!-- <tr>
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
                                                </tr> -->
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
                                                    <td><b>Unit</b></td>
                                                    <td><span id="unit-detail">Pemulasaran Jenazah</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Cara Bayar</b></td>
                                                    <td><span id="cara-bayar-detail"></span></td>
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
                                            <!-- <div class="form-group row tight">
                                                <label for="profesi" class="col-lg-4 col-form-label-custom">Profesi</label>
                                                <div class="col-lg-4"> -->
                                                    <!-- </?= //form_dropdown('profesi', $profesi, array(), 'id=profesi class=custom-form') ?> -->
                                                <!-- </div>
                                            </div> -->
                                            <div class="form-group row tight">
                                                <label for="operator" class="col-lg-4 col-form-label-custom">Nama</label>
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
                                                    <input type="text" name="id_unit" class="select2c-input" id="unit" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="kelas-tindakan" class="col-lg-4 col-form-label-custom">Kelas</label>
                                                <div class="col-lg-4">
                                                    <?= form_dropdown('kelas', $kelas, array(), 'id=kelas-tindakan class=custom-form') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
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
                                                        <!-- <th class="center">Waktu</th> -->
                                                        <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                                                            <th class="center">Waktu</th>
                                                        <?php endif ?>
                                                    <th>Nama</th>
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
                                                    <button type="button" class="btn btn-info" onclick="addBHP(); return false;"><span class="fas fa-plus-circle mr-1"></span>Tambah</button>
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

<!-- Modal Cetak Form Rekam Medis -->
<div id="modal_cetak_form_instalasi_pj" class="modal fade" role="dialog"
    aria-labelledby="modal_cetak_form_instalasi_pj_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 350px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_cetak_form_instalasi_pj_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-info btn-block" id="btn_surat_keterangan_kematian"><i
                                class="fas fa-print m-r-5"></i>Surat Keterangan Kematian</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
                        class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Cetak Form Rekam Medis -->