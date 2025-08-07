<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <div class="form-group row">
                    <label for="awal" class="col-md-3 col-form-label">Tanggal</label>
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
                    <label for="no-faktur-search" class="col-md-3 col-form-label">No. Faktur</label>
                    <div class="col-md-9">
                        <input type="text" name="no_faktur" id="no-faktur-search" class="form-control" placeholder="No. Faktur...">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="supplier-search" class="col-md-3 col-form-label">Supplier</label>
                    <div class="col-md-9">
                        <input type="text" name="supplier" id="supplier-search" class="select2-input" placeholder="Pilih Supplier...">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="barang-search" class="col-md-3 col-form-label">Barang</label>
                    <div class="col-md-9">
                        <input type="text" name="barang" id="barang-search" class="select2-input" placeholder="Pilih Barang...">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListReturPenerimaan(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal Search -->

<!-- Modal Retur Penerimaan -->
<div id="modal-retur-penerimaan" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-retur-penerimaan-label">Form Retur Penerimaan Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-retur-penerimaan role=form class=form-horizontal') ?>
				<input type="hidden" name="id" id="id">
				<input type="hidden" name="id_supplier" id="id-supplier">
				<input type="hidden" name="id_penerimaan" id="id-penerimaan">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-sm table-striped table-hover">
							<tr>
								<td width="15%">Tanggal Retur</td>
								<td width="1%">:</td>
								<td width="84%"><input type="text" name="tanggal_retur" id="tanggal-retur" class="custom-form" value="<?= date('d/m/Y') ?>" style="width:145px"></td>
							</tr>
							<tr>
								<td>No. Faktur</td>
								<td>:</td>
								<td><input type="text" name="no_faktur" id="no-faktur-auto" class="select2c-input" placeholder="Pilih No. Faktur..." style="width:300px"></td>
							</tr>
							<tr>
								<td>Supplier</td>
								<td>:</td>
								<td><input type="text" name="supplier" id="supplier" class="custom-form" placeholder="Nama Supplier..." readonly style="width:300px"></td>
							</tr>
						</table>
						<table id="table-list" class="table table-hover table-striped table-sm color-table info-table">
							<thead>
								<tr>
									<th width="3%" class="center">No.</th>
									<th width="25%" class="left">Nama Barang</th>
									<th width="10%" class="center">Satuan</th>
									<th width="8%" class="center">No. Batch</th>
									<th width="8%" class="center">Expired</th>
									<th width="5%" class="center">Jml</th>
									<th width="5%" class="center">Jml Retur</th>
									<th width="10%" class="center">HPP</th>
									<th width="5%" class="center">Disc %</th>
									<th width="10%" class="center">Disc Rp.</th>
									<th width="15%" class="center">Keterangan</th>
									<th width="3%" class="center"></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanReturPenerimaan()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Retur Penerimaan -->