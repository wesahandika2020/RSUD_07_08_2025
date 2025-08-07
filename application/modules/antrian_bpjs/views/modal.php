<!-- Modal Tambah Antrean -->
<div id="modal-tambah-antrean" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-tambah-antrean-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-tambah-antrean role=form class=form-horizontal') ?>
                <input type="hidden" name="kode_poli_bpjs" id="kode-poli-bpjs">
                <input type="hidden" name="tanggal_dokter" id="tanggal-dokter">
                <input type="hidden" name="id_poli" id="id-poli">
                <input type="hidden" name="nama_dokter_bpjs" id="nama-dokter-bpjs">
                <input type="hidden" name="id_dokter_bpjs" id="id-dokter-bpjs">
                <input type="hidden" name="id_jadwal_dokter" id="id-jadwal-dokter">
                <input type="hidden" name="estimasi" id="estimasi-antrian">
                <input type="hidden" name="kode_booking" id="kode-booking">
                <input type="hidden" name="angka_antrean" id="angka-antrian">
                <input type="hidden" name="nomor_antrean" id="nomor-antrian">
                <input type="hidden" name="huruf_antrean" id="huruf-antrian">
                <input type="hidden" name="usia" id="usia-pasien">
                <input type="hidden" id="jenis-identitas" name="jenis_identitas">
                <input type="hidden" id="no-rujukan-antrian" name="no_rujukan_antrian">
                <input type="hidden" id="tgl-lahir-antrian" name="tgl_lahir_antrian">

                <div class="form-group row tight">
                    <label for="jenis-pasien" class="col-3 col-form-label">Jenis Pasien<span class="text-red">*</span></label>
                    <div class="col-9">
                        <?= form_dropdown('jenis_pasien', $jenis_pasien, array(), 'class="custom-select" id=jenis-pasien') ?>
                    </div>
                </div>
                <div class="form-group row tight pasien-baru">
                    <label for="pasien-baru" class="col-3 col-form-label">Pasien Baru<span class="text-red">*</span></label>
                    <div class="col-9">
                        <?= form_dropdown('pasien_baru', $pasien_baru, array(), 'class="custom-select" id=pasien-baru') ?>
                    </div>
                </div>
                <div class="form-group row tight identitas">
                    <label for="disabilitas" class="col-3 col-form-label">&nbsp;</label>
                    <div class="col-9 mt-3">
                        <span class="text-red" style="font-size: 12px"><i>*) Pilih terlebih dahulu pilihan di bawah ini, untuk input identitas</i></span>
                        <div class="custom-control custom-switch m-t-9">
                            <div class="row">
                                <div class="col-3">
                                    <input type="checkbox" name="chckbx_identitas" class="custom-control-input checkbox-identitas" id="no-rm">
                                    <label class="custom-control-label" for="no-rm"><i>No Rm</i></label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="chckbx_identitas" class="custom-control-input checkbox-identitas" id="nik">
                                    <label class="custom-control-label" for="nik"><i>NIK</i></label>
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" name="chckbx_identitas" class="custom-control-input checkbox-identitas" id="no-bpjs">
                                    <label class="custom-control-label" for="no-bpjs"><i>No. Kartu BPJS</i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row tight identitas">
                    <label for="no-identitas-cek" class="col-3 col-form-label">No Identitas<span class="text-red">*</span></label>
                    <div class="col-9">
                        <input type="text" name="no_identitas" id="no-identitas-cek" class="form-control" placeholder="No Identitas" disabled>
                    </div>
                </div>
                <div class="data-antrian">
                    <div class="form-group row tight">
                        <label for="nama-pasien-antrian" class="col-3 col-form-label">Nama Pasien<span class="text-red">*</span></label>
                        <div class="col-9">
                            <input type="text" name="nama_pasien_antrian" id="nama-pasien-antrian" class="form-control" placeholder="Nama Pasien">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="no-rm-antrian" class="col-3 col-form-label">No. RM<span class="text-red">*</span></label>
                        <div class="col-9">
                            <input type="text" name="no_rm_antrian" id="no-rm-antrian" class="form-control" placeholder="No RM">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="no-ktp-antrian" class="col-3 col-form-label">NIK<span class="text-red">*</span></label>
                        <div class="col-9">
                            <input type="text" name="no_ktp_antrian" id="no-ktp-antrian" class="form-control" placeholder="No NIK">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="no-bpjs-antrian" class="col-3 col-form-label">No. Kartu BPJS<span class="text-red">*</span></label>
                        <div class="col-9">
                            <input type="text" name="no_bpjs_antrian" id="no-bpjs-antrian" class="form-control" placeholder="No Kartu BPJS">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="no-hp-antrian" class="col-3 col-form-label">No. Handphone<span class="text-red">*</span></label>
                        <div class="col-9">
                            <input type="text" name="no_hp_antrian" id="no-hp-antrian" class="form-control" placeholder="No Handphone">
                        </div>
                    </div>
                </div>
                <div class="data-pasien-baru">
                    <div class="form-group row tight">
                        <label for="agama-antrian" class="col-md-3 col-form-label">Agama <span class="text-red">*</span></label>
                        <div class="col-md-9">
                            <?= form_dropdown('agama_antrian', $agama, array(), 'class="custom-select reset-select" id=agama-antrian') ?>
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="pendidikan-antrian" class="col-md-3 col-form-label">Pendidikan <span class="text-red">*</span></label>
                        <div class="col-md-9">
                            <?= form_dropdown('pendidikan_antrian', $pendidikan, array(), 'class="custom-select reset-select" id=pendidikan-antrian') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row tight rujukan">
                    <label for="select-rujukan" class="col-3 col-form-label">No. Rujukan<span class="text-red">*</span></label>
                    <div class="col-9">
                        <select class="custom-select" id="select-rujukan">
                            <!-- <option value="" disabled selected>Loading...</option> -->
                        </select>
                    </div>
                </div>

                <div class="form-group row tight jenis-loket">
                    <label for="jenis-loket" class="col-3 col-form-label">Kode Antrian<span class="text-red">*</span></label>
                    <div class="col-9">
                        <?= form_dropdown('jenis_loket', $jenis_loket, array(), 'class="custom-select" id=jenis-loket') ?>
                    </div>
                </div>
                <div class="form-group row tight kode-poli">
                    <label for="kode-poli" class="col-md-3 col-form-label">Kode Poli <span class="text-red">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="kode_poli" id="kode-poli" class="select2-input" placeholder="Tempat Layanan">
                    </div>
                </div>
                <div class="form-group row tight bpjs">
                    <label for="nama-poli" class="col-md-3 col-form-label">Nama Poli <span class="text-red">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="nama_poli" id="nama-poli" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row tight bpjs">
                    <label for="kode-bpjs-dokter" class="col-md-3 col-form-label">Kode BPJS Dokter<span class="text-red">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="kode_bpjs_dokter" id="kode-bpjs-dokter" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row tight dokter">
                    <label for="dokter-antrian" class="col-md-3 col-form-label">Dokter <span class="text-red">*</span></label>
                    <div class="col-md-9">
                        <select name="dokter" class="custom-select reset-select" id="dokter-antrian">
                            <option value="">Pilih Dokter</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row tight kebutuhan-khusus">
                    <label for="kebutuhan-khusus" class="col-3 col-form-label">Berkebutuhan Khusus<span class="text-red">*</span></label>
                    <div class="col-9">
                        <?= form_dropdown('kebutuhan_khusus', $kebutuhan_khusus, array(), 'class="custom-select" id=kebutuhan-khusus') ?>
                    </div>
                </div>
                <div class="form-group row tight tanggal_periksa">
                    <label for="tanggal_periksa" class="col-3 col-form-label">Tanggal Periksa<span class="text-red">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="tanggal_periksa" id="tanggal_periksa" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight jenis">
                    <label for="jenis-kunjungan" class="col-3 col-form-label">Jenis Kunjungan<span class="text-red">*</span></label>
                    <div class="col-9">
                        <?= form_dropdown('jenis_kunjungan', $jenis_kunjungan, '3', 'class="custom-select" id=jenis-kunjungan') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" id="btn-tambah-antrean" onclick="validasiAntrianBPJS()"><i class="fas fa-plus-circle"></i> Tambah Antrean</button>
                <button class="btn btn-info waves-effect" type="button" id="btn-cek-data"><i class="fas fa-search mr-1"></i>Check identitas</button>
                <button class="btn btn-info waves-effect" type="button" id="btn-process"><i class="fas fa-arrow-right mr-1"></i>Process</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Antrean -->

<div id="modal-batal-antrean" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-batal-antrean-label">Status Batal Antrean</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-batal-antrean role=form class=form-horizontal') ?>
                <input type="hidden" name="page_batal" id="page-batal">
                <input type="hidden" name="id_batal" id="id-batal">
                <input type="hidden" name="tanggal_kunjungan_batal" id="tanggal-kunjungan-batal">
                <input type="hidden" name="kode_batal_dokter" id="kode-batal-dokter">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Kode Booking:</label>
                            <div class="col">
                                <input type="text" name="kode_batal_booking" class="form-control" id="kode-batal-booking" readonly>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Keterangan Batal:</label>
                            <div class="col">
                                <textarea name="keterangan_batal" id="keterangan-batal" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>


                <?= form_close() ?>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanBatalAntrean()"><i class="fas fa-plus-circle"></i> Simpan</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Detail Panggilan Antrean -->
<div id="modal-detail-panggilan" class="modal fade" role="dialog" aria-labelledby="modal_detail_panggilan_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 87%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_detail_panggilan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm table-striped table-hover table-detail">
                            <tr>
                                <td width="30%"><b>Kode Booking</b></td>
                                <td width="90%"><span id="kode-booking-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>No.Antrean</b></td>
                                <td><span id="no-antrean-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Dokter Tujuan</b></td>
                                <td><span id="dokter-tujuan-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Nama Poli</b></td>
                                <td><span id="poli-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Status Antrean</b></td>
                                <td><span id="status-antrean-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Loket Terakhir</b></td>
                                <td><span id="loket-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Waktu Panggil Terakhir</b></td>
                                <td><span id="waktu-panggil-detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Status Panggilan</b></td>
                                <td><span id="status-panggilan-detail"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="table-panggilan-detail" class="table table-sm table-bordered table-striped table-hover color-table info-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Jenis Panggilan</th>
                                        <th>Loket</th>
                                        <th>Waktu Panggil</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
<!-- End Modal Detail Panggilan Antrean -->

<input type="hidden" name="rm_page" id="rm-page">
<div id="modal-cari-rm" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-cari-rm-label">Cari RM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-cari-rm role=form class=form-horizontal') ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">NIK:</label>
                            <div class="col">
                                <input type="text" name="cari_nik_rm" onkeyup="getCariRM(1)" class="form-control" id="cari-nik-rm">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="tanggal_lahir_rm" class="col-3 col-form-label">Tanggal Lahir<span class="text-red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="tanggal_lahir_rm" onkeyup="getCariRM(1)" id="tanggal-lahir-rm" class="form-control" value="<?= date('d/m/Y') ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="table-cari-rm" class="table table-sm table-bordered table-striped table-hover color-table info-table">
                                <thead>
                                    <tr>
                                        <th>No RM</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>NIK</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <div id="rm-pagination" class="float-left"></div>
                            <div id="rm-summary" class="float-right text-sm"></div>
                        </div>
                    </div>
                </div>


                <?= form_close() ?>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="modal-checkin-pasien" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-checkin-pasien-label" aria-hidden="true">
    <input type="hidden" name="page_checkin_pasien" id="page-checkin">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-checkin-pasien-label">List Booking Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-checkin-pasien role=form class=form-horizontal') ?>
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group row tight">
                            <label class="col-2 col-form-label">Input Kode Booking:</label>
                            <div class="col-4">
                                <input type="text" name="input_kode" class="form-control" id="input-kode" value="<?= date('Ymd') ?>">&nbsp;
                            </div>
                            <div class="col-4">
                                <button style="padding: 0.55rem 0.75rem 0.55rem 0.75rem;" type="button" class="btn btn-info waves-effect" onclick="getKodeBookingPasien()"><i class="fas fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
                <div class="row">
                    <div class="col-12">

                        <label style="font-size: 13px;" class="col-12 col-form-label" id="label-data-pasien"></label>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="table-checkin-pasien" class="table table-hover table-striped table-sm color-table info-table">
                                <thead>
                                    <tr>
                                        <th>Kode Booking</th>
                                        <th>Nama Pasien</th>
                                        <th>Poli</th>
                                        <th>Nama Dokter</th>
                                        <th>Surat Kontrol</th>
                                        <th>SEP</th>
                                        <th>Status Daftar</th>
                                        <th>Tanggal Booking</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal-footer">

                <div class="float-left col-11" style="color: red; font-size:1vw;" id="pasien-text"></div>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>