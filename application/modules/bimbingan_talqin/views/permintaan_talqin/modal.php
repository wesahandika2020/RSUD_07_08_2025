<!-- Modal Tindak Lanjut -->
<div id="modal-konfirm-talqin" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Konfirmasi Permohonan Pendamping Pasien Sakaratul Maut</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-konfirm-talqin role=form class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-talqin">
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
                                    <td width="30%"><strong>Tanggal</strong></td>
                                    <td width="1%">:</td>
                                    <td width="69%"><span id="tanggal-talqin"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%"><strong>No. RM</strong></td>
                                    <td width="1%">:</td>
                                    <td width="69%"><span id="no-rm-talqin"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td>:</td>
                                    <td><span id="nama-talqin"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelamin</strong></td>
                                    <td>:</td>
                                    <td><span id="kelamin-talqin"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Umur / Tgl Lahir</strong></td>
                                    <td>:</td>
                                    <td><span id="umur-talqin"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Asal Kamar</strong></td>
                                    <td>:</td>
                                    <td><span id="kamar-talqin"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kondisi Pasien</strong></td>
                                    <td>:</td>
                                    <td><span id="kondisi-pasien-talqin"></span></td>
                                </tr>                             
                                <tr>
                                    <td><strong>Terapi/Advice</strong></td>
                                    <td>:</td>
                                    <td><span id="terapi-advice-talqin"></span></td>
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
                            <label for="alasan-dibatalkan-talqin" class="col-md-3 col-form-label right">Alasan Dibatalkan Bimbingan Talqin:</label>
                            <div class="col-md-9">
                                <textarea name="alasan_pembatalan_talqin" id="alasan-dibatalkan-talqin" rows="3" class="form-control" placeholder="Alasan Dibatalkan Bimbingan Rohani"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
               
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiPermintaanTalqin()"><i class="fas fa-save mr-1"></i>Confirm</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tindak Lanjut -->

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
                    <label for="no_rm_search" class="col-3 col-form-label">No. RM</label>
                    <div class="col">
                        <input type="text" name="no_rm" id="no-rm-search-talqin" class="form-control">
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
                <button type="button" class="btn btn-info waves-effect" onclick="getListPermintaanTalqin(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->



