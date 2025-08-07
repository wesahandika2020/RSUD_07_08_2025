<!-- Modal Search -->
<div id="modal-filter-jadwal" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-jadwal-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-jadwal-search role=form class=form-horizontal') ?>
                
                    <div class="form-group row tight">
                        <label for="awal" class="col-3 col-form-label">Tanggal<span class="text-red">*</span></label>
                        <div class="col-4">
                            <input type="text" name="tanggal_jadwal" id="tanggal-jadwal" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="layanan_auto" class="col-md-3 col-form-label">Klinik <span class="text-red">*</span></label>
                        <div class="col-md-9">
                            <input type="text" name="layanan" id="layanan-auto" class="select2-input" placeholder="Tempat Layanan">
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" id="button-cari" class="btn btn-info waves-effect" onclick="getJadwalDokterHFIS()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pengajuan Jadwal -->
<div id="modal-jadwal-dokter" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-jadwal-dokter-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-edit-dokter role=form class=form-horizontal') ?>
                <input type="hidden" name="kode_poli" id="hfis-kode-poli">
                <input type="hidden" name="kode_sub" id="hfis-kode-sub">
                <input type="hidden" name="kode_bpjs_dokter" id="hfis-bpjs-dokter">
                
                    <div class="form-group row tight">
                        <label for="jadwal_hari" class="col-3 col-form-label">Hari<span class="text-red">*</span></label>
                        <div class="col-4">
                            <?= form_dropdown('jadwal_hari', $jadwal_hari, array(), 'class=form-control id=jadwal-hari') ?>
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="jam_buka" class="col-md-3 col-form-label">Jam Buka <span class="text-red">*</span></label>
                        <div class="col-4">
                            <input type="text" name="jam_buka" id="jam-hfis-buka" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="jam_buka" class="col-md-3 col-form-label">Jam Tutup <span class="text-red">*</span></label>
                        <div class="col-4">
                            <input type="text" name="jam_tutup" id="jam-hfis-tutup" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <div class="col-4">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="button_ubah" class="col-md-3 col-form-label"></label>
                        <div class="col-4">
                            <button type="button" title="Tambah Perubahan Jadwal" class="btn btn-info" onclick="tambahPerubahanJadwal()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Perubahan Jadwal</button>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="table-perubahan-jadwal-hfis" class="table table-sm table-bordered table-striped table-hover color-table info-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Hari</th>
                                        <th>Jam Buka</th>
                                        <th>Jam Tutup</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="editJadwalHFISDokter()"><i class="fas fa-search"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pengajuan Jadwal -->


<!-- Modal Detail Pengajuan Jadwal Dokter HFIS -->
<div id="modal-detail-pengajuan" class="modal fade" role="dialog" aria-labelledby="modal_detail_pengajuan_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 87%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_detail_pengajuan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="table-detail-pengajuan" class="table table-sm table-bordered table-striped table-hover color-table info-table">
                                <thead>
                                    <tr>
                                        <th class="center">No</th>
                                        <th class="center">Response</th>
                                        <th class="left">Keterangan Response</th>
                                        <th class="center">Kode Poli</th>
                                        <th class="center">Kode Subspesialis</th>
                                        <th class="center">Kode BPJS</th>
                                        <th class="center">Waktu Pengajuan</th>
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
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Detail Pengajuan Jadwal Dokter HFIS -->

<!-- Modal Detail Jadwal Dokter HFIS -->
<div id="modal-detail-jadwal" class="modal fade" role="dialog" aria-labelledby="modal_detail_jadwal_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 87%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_detail_jadwal_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="table-detail-jadwal" class="table table-sm table-bordered table-striped table-hover color-table info-table">
                                <thead>
                                    <tr>
                                        <th class="center">No</th>
                                        <th class="center">Hari</th>
                                        <th class="center">Jam Buka</th>
                                        <th class="center">Jam Tutup</th>
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
<!-- End Modal Detail Jadwal Dokter HFIS -->

