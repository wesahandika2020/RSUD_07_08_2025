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
				<div class="row">
					<div class="col-md-12">
						<div class="form-group row">
							<label for="range" class="col-form-label col-md-3">Range Tanggal</label>
							<div class="col-md-4">
								<input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?php echo date('01/m/Y') ?>">
							</div>
							<div class="col-md-5">
								<input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?php echo date('d/m/Y') ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="barang-search" class="col-form-label col-md-3">Jenis Barang</label>
							<div class="col-md-9">
								<select name="kategori_barang" id="kategori-barang-search" class="form-control">
									<option value="">Semua ...</option>
									<?php foreach ($kategori_barang as $data) { ?>
										<optgroup label="<?= $data->jenis ?>">
											<?php foreach ($data->kategori as $detail) { ?>
												<option value="<?= $detail->id ?>"> <?= $detail->nama ?></option>
											<?php } ?>
										</optgroup>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="barang-search" class="col-form-label col-md-3">Barang</label>
							<div class="col-md-9">
								<input type="text" name="barang" id="barang-search" class="select2-chosen" placeholder="Pilih Barang...">
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListStokOpname(1)"><i class="fas fa-filter mr-1"></i>Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Stok Opname -->
<div id="modal-stok-opname" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width:70%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-stok-opname-label">Form Stok Opname</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-stok-opname role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-form-label col-lg-3 right">Kategori Barang</label>
							<div class="col-lg-9">
								<select name="kategori_barang" id="kategori-barang" class="form-control">
									<option value="">Semua ...</option>
									<?php foreach ($kategori_barang as $data) { ?>
										<optgroup label="<?= $data->jenis ?>">
											<?php foreach ($data->kategori as $detail) { ?>
												<option value="<?= $detail->id ?>"> <?= $detail->nama ?></option>
											<?php } ?>
										</optgroup>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3 right">Barang</label>
							<div class="col-lg-9">
								<input type="text" name="barang" id="barang-auto" class="select2-input" placeholder="Pilih Barang...">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3 right">Kemasan</label>
							<div class="col-lg-9">
								<select name="kemasan" id="kemasan" class="form-control">
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3 right">Jumlah</label>
							<div class="col-lg-9">
								<input type="text" name="jumlah" id="jumlah" min="1" class="form-control" placeholder="Jumlah..." onkeypress="return hanyaAngka(event)">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-form-label col-lg-4 right">No. Batch</label>
							<div class="col-lg-8">
								<input type="text" name="no_batch" id="no-batch" min="1" class="form-control" placeholder="No. Batch...">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-4 right">Expired Date</label>
							<div class="col-lg-8">
								<input type="text" name="ed" id="ed" min="1" class="form-control" placeholder="Expired Date...">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-4 right">Alasan</label>
							<div class="col-lg-8">
								<input type="text" name="alasan" id="alasan" class="form-control" placeholder="Alasan...">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-4 right"></label>
							<div class="col-lg-8">
								<button type="button" class="btn btn-info" id="tambahkan"><i class="fas fa-arrow-circle-down mr-1"></i>Tambahkan</button>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="table-list" class="table table-hover table-striped table-sm color-table info-table">
								<thead>
									<tr>
										<th width="3%" class="center">No.</th>
										<th width="24%" class="left">Nama Barang</th>
										<th width="10%" class="center">Unit Kemasan</th>
										<th width="10%" class="center">No Batch</th>
										<th width="10%" class="center">Expired</th>
										<th width="5%" class="center">Jumlah</th>
										<th width="10%" class="left">Alasan</th>
										<th width="3%"></th>
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
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanStokOpname('add')"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Stok Opname -->

<!-- Modal Stok Opname Edit -->
<div id="modal-stok-opname-edit" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width:40%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-stok-opname-edit-label">Form Stok Opname Edit</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-stok-opname-edit role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="id" id="id">
						<div class="form-group row">
							<label class="col-form-label col-md-3">Barang</label>
							<div class="col-md-9">
								<div id="nama-barang" class="mt-1"></div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">Jumlah</label>
							<div class="col-md-9">
								<input type="text" name="jumlah" id="jumlah-edit" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Jumlah...">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">No. Batch</label>
							<div class="col-md-9">
								<input type="text" name="no_batch" id="no-batch-edit" class="form-control" placeholder="No. Batch...">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">Expired Date</label>
							<div class="col-md-9">
								<input type="text" name="ed" id="ed-edit" class="form-control" placeholder="Expired Date...">
							</div>
						</div>

					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanStokOpname('edit')"><i class="fas fa-save mr-1"></i>Update</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Stok Opname Edit -->