<!--modal tambah produksi-->
<div id="modal-produksi-obat" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width:90%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-produksi-obat-label">Form Produksi Obat</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-produksi') ?>
				<input type="hidden" id="id-stok-bahan-produksi">
				<input type="hidden" id="id-stok-hasil-produksi">
				<input type="hidden" id="sisa-stok-bahan-produksi">
				<div class="row">
					<div class="col col-sm-6">
						<h3 class="text-center"><b>Daftar Bahan Produksi Obat</b></h3>
						<div style="display: grid; grid-template-columns: 8rem .1rem auto; gap: 1rem">
							<span>Nama Obat</span>
							:
							<div><input type="text" id="bahan-produksi"></div>

							<span>Quantity</span>
							:
							<div><input type="number" id="qty-bahan-produksi" class="custom-form col-2" min="0"></div>
						</div>
						<?= form_button('', '<i class="fas fa-plus-circle mr-1"></i>Tambah', 'id=tambah-bahan-produksi class="btn btn-info waves-effect mt-3"') ?>
						<table id="table-bahan-produksi" class="table table-hover table-striped table-sm color-table info-table mt-3">
							<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Nama Obat Asal</th>
								<th class="text-center">Qty</th>
								<th class="text-center">Aksi</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
					<div class="col col-sm-6">
						<h3 class="text-center"><b>Daftar Hasil Produksi Obat</b></h3>
						<div style="display: grid; grid-template-columns: 8rem .1rem auto; gap: 1rem">
							<span>Nama Obat</span>
							:
							<div><input type="text" id="hasil-produksi"></div>

							<span>Quantity</span>
							:
							<div><input type="number" id="qty-hasil-produksi" class="custom-form col-2" min="0"></div>
						</div>
						<?= form_button('', '<i class="fas fa-plus-circle mr-1"></i>Tambah', 'id=tambah-hasil-produksi class="btn btn-info waves-effect mt-3"') ?>
						<table id="table-hasil-produksi" class="table table-hover table-striped table-sm color-table info-table mt-3">
							<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Nama Obat Produksi</th>
								<th class="text-center">Qty</th>
								<th class="text-center">Aksi</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="modal-no-bahan" value="0">
				<input type="hidden" id="modal-no-hasil" value="0">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-simpan-produksi"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!--end modal tambah produksi-->

<!--modal detail produksi-->
<div id="modal-detail-produksi-obat" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width:90%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-produksi-obat-label">Produksi OBAT / BHP</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id-stok-bahan-produksi">
				<input type="hidden" id="id-stok-hasil-produksi">
				<input type="hidden" id="sisa-stok-bahan-produksi">
				<div class="row">
					<div class="col col-sm-6">
						<h3 class="text-center"><b>Daftar Bahan Produksi Obat</b></h3>
						<table id="table-detail-bahan-produksi" class="table table-hover table-striped table-sm color-table info-table mt-3">
							<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Bahan Produksi</th>
								<th class="text-center">Satuan</th>
								<th class="text-center">Qty</th>
								<th class="text-right">Harga Satuan</th>
								<th class="text-right">Sub Total</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
					<div class="col col-sm-6">
						<h3 class="text-center"><b>Daftar Hasil Produksi Obat</b></h3>
						<table id="table-detail-hasil-produksi" class="table table-hover table-striped table-sm color-table info-table mt-3">
							<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Hasil Produksi</th>
								<th class="text-center">Satuan</th>
								<th class="text-center">Qty</th>
								<th class="text-right">Harga Satuan</th>
								<th class="text-right">Sub Total</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="modal-no-bahan" value="0">
				<input type="hidden" id="modal-no-hasil" value="0">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-cetak-detail-produksi"><i class="fas fa-save mr-1"></i>cetak</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!--end modal detail produksi-->

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
				<input type="hidden" name="id" id="id">
				<div class="form-group row tight">
					<label for="periode-laporan" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan name=periode_laporan class=form-control') ?>
					</div>
				</div>
				<div class="bulanan form-group row tight">
					<label for="bulan" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, date('m'), 'id=bulan class=form-control') ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun" class="form-control">
							<?php $tg_awal = date('Y') - 5;
							$tgl_akhir = date('Y') + 5;
							for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
								echo "<option value='$i'";
								if (date('Y') == $i) {
									echo "selected";
								}
								echo ">$i</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="rentang-waktu form-group row tight">
					<label for="tanggal-awal" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian form-group row tight">
					<label for="tanggal-harian" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="noprod-search" class="col-md-3 col-form-label">No Produksi</label>
					<div class="col-md-9">
						<input type="text" name="no_produksi" id="noprod-search" class="form-control" placeholder="No Produksi...">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListProduksi(1)"><i class="fas fa-search mr-1"></i>Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->
