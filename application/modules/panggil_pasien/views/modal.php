<div id="modal-call-antrean" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-call-antrean-label">Call Antrean</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-call-antrean role=form class=form-horizontal') ?>
                <input type="hidden" name="page_call" id="page-call">
                <input type="hidden" name="tanggal_panggil" id="tanggal-panggil">
                <input type="hidden" name="kode_pangggil_dokter" id="kode-pangggil-dokter">
                <input type="hidden" name="kode_pangggil_poli" id="kode-pangggil-poli">
                <input type="hidden" name="id_antrean" id="id-antrean">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Nomor Antrean:</label>
                            <div class="col">
                                <input type="text" name="nomor_antrean" class="form-control" id="nomor-antrean" readonly>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Call:</label>
                            <div class="col">
                               <input type="text" name="call_antrean" class="form-control" id="call-antrean" readonly>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Loket:</label>
                            <div class="col">
                               <?= form_dropdown('loket_antrean', $loket_antrean, array(), 'class="custom-select" id=loket-antrean') ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="tipe-panggil">

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

<!-- Modal Batal Antrean -->
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
<!-- End Modal Batal Antrean -->