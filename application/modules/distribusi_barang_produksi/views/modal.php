<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
				<div class="form-group row">
					<label for="awal" class="col-md-3 col-form-label">Tanggal Permintaan</label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal_minta" id="tanggal-awal-minta" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir_minta" id="tanggal-akhir-minta" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="awal" class="col-md-3 col-form-label">Tanggal Dikirim</label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal_kirim" id="tanggal-awal-kirim" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir_kirim" id="tanggal-akhir-kirim" class="form-control" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="no-distribusi-search" class="col-md-3 col-form-label">No. Distirbusi</label>
					<div class="col-md-9">
						<input type="text" name="no_distribusi" id="no-distribusi-search" class="form-control" placeholder="No. Distribusi...">
					</div>
				</div>
				<div class="form-group row">
					<label for="kategori-barang-search" class="col-md-3 col-form-label">Kategori Barang</label>
					<div class="col-md-9">
						<select name="kategori_barang" id="kategori-barang-search" class="form-control">
							<option value="">Pilih Kategori Barang...</option>
							<?php foreach ($kategori_barang as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="barang-search" class="col-md-3 col-form-label">Status</label>
					<div class="col-md-9">
						<select name="status" id="status-search" class="form-control">
							<option value="">Pilih Status...</option>
							<option value="Belum">Belum Dikirim</option>
							<option value="Sudah">Sudah Dikirim</option>
						</select>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListDistribusi(1)"><i class="fas fa-search mr-1"></i>Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Distribusi -->
<div id="modal-distribusi" class="modal fade" style="padding: 0 10px">
	<div class="modal-dialog" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-distribusi-label">Form Persetujuan Distribusi Ke Unit</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-distribusi role=form class=form-horizontal') ?>
				<input type="hidden" name="id" id="id">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-striped table-sm">
							<tr>
								<td width="15%">No. Permintaan</td>
								<td width="1%">:</td>
								<td width="75%"><b><span id="kode-detail"></span></b></td>
							</tr>
							<tr>
								<td>Tanggal Permintaan</td>
								<td>:</td>
								<td><b><span id="tanggal-permintaan-detail"></span></b></td>
							</tr>
							<tr>
								<td>Unit Asal Permintaan</td>
								<td>:</td>
								<td><b><span id="unit-asal"></span></b></td>
							</tr>
							<tr><td colspan="3"></td></tr>
						</table>
						<div class="table-responsive">
							<table id="table-distribusi" class="table table-hover table-striped table-sm color-table info-table">
								<thead>
								<tr>
									<th width="3%">No.</th>
									<th width="35%" class="left">Nama Barang</th>
									<th width="15%" class="right">Sisa Stok <br/> <span style="font-size:9px;font-style:italic;" id="unit-asal2"></span></th>
									<th width="10%" class="right">Jml Permintaan</th>
									<th width="15%" class="left">Satuan</th>
									<th width="10%" class="right">Sisa Stok</th>
									<th width="10%" class="center">Jml Disetujui</th>
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
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-simpan" onclick="konfirmasiSimpanDistribusi()"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Distribusi -->
