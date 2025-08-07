<!-- Modal Search Sudah Integrasi Pasien -->
<div id="modal-search-medication-dispense" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label-medication-dispense"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search-medication-dispense role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal Daftar</label>
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal-layanan" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-awal-layanan" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>  
                <div class="form-group row tight">
                    <label for="no_kode_booking" class="col-3 col-form-label">No RM</label>
                    <div class="col">
                        <input type="text" name="id" id="id" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="poli" class="col-3 col-form-label">Poli</label>
                    <div class="col">
                        <input type="text" name="poli" id="poli" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataMedicationDispense()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Sudah Integrasi Pasien -->

<!-- Modal Search Kirim Integrasi Pasien -->
<div id="modal-search-integrasi-medication-dispense" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-integrasi-label-medication-dispense"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-kirim-medication-dispense role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal Daftar</label>
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>  
                <div class="form-group row tight">
                    <label for="no_kode_booking" class="col-3 col-form-label">No RM</label>
                    <div class="col">
                        <input type="text" name="id" id="id" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="poli" class="col-3 col-form-label">Poli</label>
                    <div class="col">
                        <input type="text" name="poli" id="poli" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariIntegrasiMedicationDispense()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Kirim Integrasi Pasien -->
