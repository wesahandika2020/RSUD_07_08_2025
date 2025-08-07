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
				<button type="button" class="btn btn-success waves-effect" onclick="cetakExcelKoreksiStokDarah()"><i class="fas fa-file-excel mr-1"></i>Export Excel</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListKoreksiStokDarah(1)"><i class="fas fa-filter mr-1"></i>Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Koreksi Stok -->
<div id="modal-koreksi-stok-darah" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width:70%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-koreksi-stok-darah-label">Form Koreksi Stok</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-koreksi-stok-darah role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-form-label col-lg-3 right">Kategori Barang</label>
							<div class="col-lg-9">
								<select name="kategori_barang" id="kategori-barang" class="form-control" disabled>
									<?php foreach ($kategori_barang as $data) : echo '<option value="7">'.$data->nama.'</option>'; endforeach ?>
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
							<label class="col-form-label col-lg-3 right">Expired Date</label>
							<div class="col-lg-9">
								<select name="ed" id="ed" class="form-control">
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3 right">Sisa di Sistem</label>
							<div class="col-lg-9">
								<input readonly type="text" name="sisa" id="sisa" min="1" class="form-control" placeholder="Sisa..." onkeypress="return hanyaAngka(event)">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-form-label col-lg-4 right">Kenyataan</label>
							<div class="col-lg-8">
								<input type="text" name="kenyataan" id="kenyataan" min="1" class="form-control" placeholder="Kenyataan..." onkeypress="return hanyaAngka(event)" onkeyup="hitungPenyesuaian()">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-4 right">Penyesuaian</label>
							<div class="col-lg-8">
								<input readonly type="text" name="penyesuaian" id="penyesuaian" min="1" class="form-control" placeholder="Penyesuaian..." onkeypress="return hanyaAngka(event)">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-4 right">Alasan di Koreksi</label>
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
							<table id="table-list" class="table table-hover table-striped table-bordered table-sm color-table info-table">
								<thead>
									<tr>
										<th width="3%">No.</th>
										<th width="24%">Nama Barang</th>
										<th width="10%">ED</th>
										<th width="10%">Sisa</th>
										<th width="10%">Kenyataan</th>
										<th width="5%">Penyesuaian</th>
										<th width="30%">Alasan</th>
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
				<button type="button" class="btn btn-info waves-effect" onclick="simpanKoreksiStokDarah()"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Koreksi Stok -->

<!-- Modal Print -->
<div id="modal-print" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-print-label">Pilih Kategori Barang yang Akan di Cetak</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-cetak role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Kategori Barang</label>
							<select name="jenis_barang" id="jenis-barang" class="form-control">
								<option value="">Semua...</option>
								<?php foreach ($kategori_barang as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-success waves-effect" onclick="cetakKoreksiStokDarah()"><i class="fas fa-print mr-1"></i>Cetak</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Print -->