<!-- Modal Search Sudah Integrasi Pasien -->
<div id="modal-search-encounter" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label-encounter"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search-encounter role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal</label>
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
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataEncounter()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Sudah Integrasi Pasien -->

<!-- Modal Search Kirim Integrasi Pasien -->
<div id="modal-search-integrasi-encounter" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-integrasi-label-encounter"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-kirim-encounter role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggalawal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggalakhir" class="form-control" value="<?= date('d/m/Y') ?>">
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
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataIntegrasiEncounter()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Kirim Integrasi Pasien -->

<!-- Modal List Encounter Pasien -->
<div id="modal-list-encounter-pasien" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-list-encounter-pasien-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-list-encounter-pasien role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="no_rm" class="col-3 col-form-label">No RM</label>
                    <div class="col">
                        <input type="text" name="no_rm" id="no-rm" class="select2-input" placeholder="No RM Pasien">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="listEncounterPasien()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal List Encounter Pasien -->

<!-- Modal List Encounter Pasien -->
<div id="modal-list-condition-pasien" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-list-condition-pasien-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-list-condition-pasien role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="no_rm" class="col-3 col-form-label">No RM</label>
                    <div class="col">
                        <input type="text" name="no_rm" id="no-rm-condition" class="select2-input" placeholder="No RM Pasien">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="listConditionPasien()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal List Encounter Pasien -->
