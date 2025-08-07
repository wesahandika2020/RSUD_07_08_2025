<!-- Modal Search Pendaftaran Poliklinik -->
<div id="modal-search" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_search role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal_awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_kode_booking" class="col-3 col-form-label">Kode Booking</label>
                    <div class="col">
                        <input type="text" name="no_kode_booking" id="no-kode-booking" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">Nomor Antrean</label>
                    <div class="col">
                        <input type="text" name="no_antrean" id="no-antrean" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nm_poli" class="col-md-3 col-form-label">Nama Poli</label>
                    <div class="col-md-9">
                        <input type="text" name="nm_poli" id="nm-poli" class="select2-input" placeholder="Tempat Layanan">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nm_dokter" class="col-md-3 col-form-label">Dokter</label>
                    <div class="col-md-9">
                        <select name="nm_dokter" class="custom-select reset-select" id="nm-dokter">
                            <option value="">Pilih Dokter</option>
                        </select>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataAntrian()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Pendaftaran Poliklinik -->