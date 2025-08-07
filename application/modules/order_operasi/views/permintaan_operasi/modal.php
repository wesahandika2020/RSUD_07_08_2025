<!-- Modal Search -->
<div id="modal-search1" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:600px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search1 role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="tanggal-awal" class="col-md-3 col-form-label right">Range Tanggal:</label>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="" data-format="dd/MM/yyyy hh:mm:ss">
                    </div>
                    <div class="col-md-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>" data-format="dd/MM/yyyy hh:mm:ss">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="pasien-search" class="col-md-3 col-form-label right">Pasien:</label>
                    <div class="col-md-9">
                        <input type="text" name="pasien" id="pasien-search" class="select2-input" placeholder="Pilih Pasien">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="operator-search" class="col-md-3 col-form-label right">Tenaga Medis:</label>
                    <div class="col-md-9">
                        <input type="text" name="operator" id="operator-search" class="select2-input" placeholder="Pilih Tenaga Medis">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="tindakan-search" class="col-md-3 col-form-label right">Nama Operasi:</label>
                    <div class="col-md-9">
                        <input type="text" name="tindakan" id="tindakan-search" class="select2-input" placeholder="Pilih Nama Operasi">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="ruang-operasi-search" class="col-md-3 col-form-label right">Ruang Operasi:</label>
                    <div class="col-md-9">
                        <input type="text" name="ruang_operasi" id="ruang-operasi-search" class="select2-input" placeholder="Pilih Ruang Operasi">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="bobot-search" class="col-md-3 col-form-label right">Bobot:</label>
                    <div class="col-md-9">
                        <?= form_dropdown('bobot', ['' => 'Semua Bobot ...', 'Minor' => 'Kecil', 'Standard' => 'Sedang', 'Mayor' => 'Besar', 'Khusus' => 'Khusus'], '', 'id=bobot-search class=form-control') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="timing-search" class="col-md-3 col-form-label right">Timing:</label>
                    <div class="col-md-9">
                        <?= form_dropdown('timing', ['' => 'Semua Timing ...', 'Terjadwal' => 'Terjadwal', 'Emergency' => 'Cito'], '', 'id=timing-search class=form-control') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status-search" class="col-md-3 col-form-label right">Status:</label>
                    <div class="col-md-9">
                        <?= form_dropdown('status', ['' => 'Semua Status ...', 'Request' => 'Request', 'Confirmed' => 'Disetujui', 'Canceled' => 'Dibatalkan'], '', 'id=status-search class=form-control') ?>
                    </div>
                </div>
               
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListJadwalOperasi(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Tindak Lanjut -->
<div id="modal-konfirm-operasi1" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Konfirmasi Jadwal Operasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-konfirm-operasi1 role=form class=form-horizontal') ?>
                <input type="hidden" name="id_jadwal_operasi" id="id-jadwal-operasi1">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-no-border table-striped table-hover table-sm color-table info-table">
                            <thead>
                                <tr>
                                    <th colspan="5" class="center"><i class="fas fa-user mr-1"></i>Data Pasien</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="30%"><strong>No. RM</strong></td>
                                    <td width="1%">:</td>
                                    <td width="69%"><span id="no-rm-ops-detail"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td>:</td>
                                    <td><span id="nama-ops-detail"></span></td>
                                </tr> <tr>
                                    <td><strong>Agama</strong></td>
                                    <td>:</td>
                                    <td><span id="agama-ops-detail"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelamin</strong></td>
                                    <td>:</td>
                                    <td><span id="kelamin-ops-detail"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Umur / Tgl Lahir</strong></td>
                                    <td>:</td>
                                    <td><span id="umur-ops-detail"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>No. Telepon</strong></td>
                                    <td>:</td>
                                    <td><span id="telp-ops-detail"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Operasi</strong></td>
                                    <td>:</td>
                                    <td><span id="nama-operasi-ops-detail"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Klasifikasi / Timing</strong></td>
                                    <td>:</td>
                                    <td><span id="klasifikasi-operasi-ops-detail"></span> / <span id="timing-operasi-ops-detail"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Cara Bayar</strong></td>
                                    <td>:</td>
                                    <td><span id="cara-bayar-ops-detail"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row tight">
                            <label for="status-permintaan" class="col-md-3 col-form-label right">Status Permintaan:</label>
                            <div class="col-md-9">
                                <?= form_dropdown('status_permintaan', ['' => 'Pilih ...', 'Confirmed' => 'Dikonfirmasi / Disetujui', 'Canceled' => 'Dibatalkan'], '', 'id=status-permintaan class=form-control') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="ruang-operasi" class="col-md-3 col-form-label right">Ruang Operasi:</label>
                            <div class="col-md-9">
                                <input type="text" name="ruang_operasi" id="ruang-operasi" class="select2-input" placeholder="Pilih Ruang Operasi">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="tanggal-awal" class="col-md-3 col-form-label right">Range Tanggal:</label>
                            <div class="col-md-4">
                                <input type="text" name="tanggal_awal" id="date-awal" autocomplete="off" class="form-control" value="" data-format="dd/MM/yyyy hh:mm:ss">
                            </div>
                            <div class="col-md-1 mt-2">
                                <span style="font-size:12px;font-family:'Lucida Grande';">s/d</span>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="tanggal_akhir" id="date-akhir" autocomplete="off" class="form-control" data-format="dd/MM/yyyy hh:mm:ss">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="bobot-operasi" class="col-md-3 col-form-label right">Bobot:</label>
                            <div class="col-md-9">
                                <?= form_dropdown('bobot', ['' => 'Pilih Bobot ...', 'Minor' => 'Kecil', 'Standard' => 'Sedang', 'Mayor' => 'Besar', 'Khusus' => 'Khusus'], '', 'id=bobot-operasi class=form-control') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="jenis-anastesi" class="col-md-3 col-form-label right">Jenis Anastesi:</label>
                            <div class="col-md-9">
                                <?= form_dropdown('jenis_anastesi', ['General' => 'General Anastesi', 'Regional' => 'Regional Anastesi', 'Lokal' => 'Lokal Anastesi'], '', 'id=jenis-anastesi class=form-control') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="alasan-dibatalkan-operasi" class="col-md-3 col-form-label right">Alasan Dibatalkan:</label>
                            <div class="col-md-9">
                                <textarea name="alasan" id="alasan-dibatalkan-operasi" rows="3" class="form-control" placeholder="Alasan Dibatalkan Operasi"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
               
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiJadwalOperasi()"><i class="fas fa-save mr-1"></i>Confirm</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tindak Lanjut -->

