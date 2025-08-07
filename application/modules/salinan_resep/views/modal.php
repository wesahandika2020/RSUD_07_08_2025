<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <div class="form-group row">
                    <label for="awal" class="col-md-3 col-form-label right">Tanggal</label>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('01/m/Y') ?>">
                    </div>
                    <div class="col-md-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no-resep-search" class="col-md-3 col-form-label right">No. Resep</label>
                    <div class="col-md-9">
                        <input type="text" name="no_resep" id="no-resep-search" class="form-control" placeholder="No. Resep...">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="dokter-search" class="col-md-3 col-form-label right">Dokter</label>
                    <div class="col-md-9">
                        <input type="text" name="dokter" id="dokter-search" class="select2-input" placeholder="Pilih Dokter...">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="pasien-search" class="col-md-3 col-form-label right">Pasien</label>
                    <div class="col-md-9">
                        <input type="text" name="pasien" id="pasien-search" class="select2-input" placeholder="Pilih Pasien...">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="layanan-search" class="col-md-3 col-form-label right">Jenis Pelayanan</label>
                    <div class="col-md-9">
						<?= form_dropdown('jenis_pelayanan', $jenis_pelayanan, array(), 'id=jenis-pelayanan class=custom-select') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListSalinanResep(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Detail Resep Tebus -->
<div id="modal-detail-resep-tebus" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-detail-resep-tebus-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <input type="hidden" name="id_pasien" id="id-pasien">

                <div class="row" id="load-data-resep-tebus">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Detail Resep Tebus -->

