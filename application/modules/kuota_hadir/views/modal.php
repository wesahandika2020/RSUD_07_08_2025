<!-- Modal Search -->
<div id="modal-filter-kuota" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-jadwal-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-kuota-search role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal<span class="text-red">*</span></label>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-md-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="layanan_auto" class="col-md-3 col-form-label">Klinik <span class="text-red">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="poliklinik" id="layanan-auto" class="select2-input" placeholder="Tempat Layanan">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getKuotaHadir(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->


<!-- Modal Detail Kuota -->
<div id="modal-detail-kuota" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 1080px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-detail-kuota-label">Detail Keterangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6" style="border-right: black; border-style: solid; border-left: 0; border-top: 0; border-bottom: 0;">
                        <table id="table-detail-antrian" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h5 class="modal-title float-right"><b id="total-kuota-antrian"></b></h5>
                            <h5 class="modal-title left"><b>TOTAL ANTRIAN</b></h5>
                            <thead>
                                <tr>
                                    <th rowspan="2" class="center">Asal Poli</th>
                                    <th rowspan="2" class="center">Perubahan Poli</th>
                                    <th rowspan="2" class="center">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div>
                    <div class="col-md-6">
                        <table id="table-detail-layanan" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h5 class="modal-title float-right"><b id="total-kuota-layanan"></b> </h5>
                            <h5 class="modal-title left"><b>TOTAL LAYANAN</b></h5>
                            <thead>
                                <tr>
                                    <th rowspan="2" class="center">Asal Poli</th>
                                    <th rowspan="2" class="center">Perubahan Poli</th>
                                    <th rowspan="2" class="center">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Detail Kuota -->