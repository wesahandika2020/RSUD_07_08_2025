<!-- Modal Bed -->
<div id="modal-bed" class="modal fade" role="dialog" aria-labelledby="modal-bed-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-bed-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-bed'); ?>
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="id_bangsal" id="id-bangsal">
                <div class="form-group row tight">
                    <label for="kamar" class="col col-form-label">Kamar</label>
                    <div class="col-9">
                        <input class="select2-input" type="text" name="kamar" id="kamar" placeholder="Pilih Kamar">
                    </div>
                </div>
                <div class="form-group row tight no-bed">
                    <label for="no-bed" class="col col-form-label">No. Bed</label>
                    <div class="col-9">
                        <input class="form-control" type="number" name="no_bed" id="no-bed" placeholder="No. Bed">
                    </div>
                </div>
                <div class="form-group row tight jml-bed">
                    <label for="jumlah-bed" class="col col-form-label">Jumlah Bed</label>
                    <div class="col-9">
                        <input class="form-control" type="number" name="jumlah_bed" id="jumlah-bed" placeholder="Jumlah Bed">
                    </div>
                </div>
                <div class="form-group row tight status-bed">
                    <label for="status-bed" class="col col-form-label">Status</label>
                    <div class="col-9">
                        <?= form_dropdown('status_bed', $status_bed, array(), 'class=form-control id=status-bed') ?>
                    </div>
                </div>
                <div class="form-group row tight penghuni-area">
                    <label for="penghunni" class="col col-form-label">Dipakai</label>
                    <div class="col-9">
                        <?= form_dropdown('penghuni', $penghuni, array(), 'class=form-control id=penghunni') ?>
                    </div>
                </div>
                <div class="form-group row tight status-bed">
                    <label for="out-of-service" class="col col-form-label">Perbaikan/Rusak</label>
                    <div class="col-9">
                        <?= form_dropdown('out_of_service', array('Tidak' => 'Tidak', 'Ya' => 'Ya'), 'Tidak', 'class=form-control id=out-of-service') ?>
                    </div>
                </div>
                <div class="form-group row tight status-bed">
                    <label for="out-of-capacity" class="col col-form-label">Melebihi Kapasitas</label>
                    <div class="col-9">
                        <?= form_dropdown('out_of_capacity', array('Tidak' => 'Tidak', 'Ya' => 'Ya'), 'Tidak', 'class=form-control id=out-of-capacity') ?>
                    </div>
                </div>
                <div class="form-group row tight status-bed">
                    <label for="icu-bedah" class="col col-form-label">ICU Bedah</label>
                    <div class="col-9">
                        <?= form_dropdown('icu_bedah', array('0' => 'Tidak', '1' => 'Ya'), '0', 'class=form-control id=icu-bedah') ?>
                    </div>
                </div>

                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataBed()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Bed -->


<!-- Modal Summary Bed -->
<input name="page_sum" type="hidden" id="page-now-sum">
<!-- <input name="page_now_sum" type="hidden" id="page-now-sum"> -->
<div id="modal-summary-bed" class="modal fade" role="dialog" aria-labelledby="modal-summary-bed-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-summary-bed-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="table-summary-bed" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th rowspan="2" class="center" width="5%">No.</th>
                                <th rowspan="2" class="left" width="20%">Nama Ruang</th>
                                <th rowspan="2" class="center" width="15%">Kelas</th>
                                <th rowspan="2" class="center" width="8%">Kapasitas</th>
                                <th rowspan="2" class="center" width="8%">Total Tersedia</th>
                                <th colspan="3" class="center">Tersedia</th>
                                <!-- <th rowspan="2" class="center" width="8%%">Tersedia Pria & Wanita</th> -->
                                <th rowspan="2" class="center" width="20%">Update Terakhir</th>
                                <th rowspan="2" class="center" width=""></th>
                            </tr>
                            <tr>
                                <th class="center" width="8%">Pria</th>
                                <th class="center" width="8%">Wanita</th>
                                <th class="center" width="8%">Pria & Wanita</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="pagination-sum" class="float-left"></div>
                        <div id="summary-sum" class="float-right text-sm"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn-batal" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiUpdateBed()"><i class="fas fa-save mr-1"></i>Kirim Data</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Summary Bed -->