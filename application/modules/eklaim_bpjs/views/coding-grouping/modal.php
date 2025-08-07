<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:600px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label">Pencarian klaim dengan kriteria:</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="jenis-rawat-ekb" class="col-md-3 col-form-label">Jenis Rawat</label>
					<div class="col-md-9">
						<select class="form-control" name="jenis_rawat" id="jenis-rawat-ekb">
							<option value="">Semua</option>
							<option value="Inap">Rawat Inap</option>
							<option value="Jalan">Rawat Jalan</option>s
						</select>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="periode-ekb" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<select class="form-control" name="periode" id="periode-ekb">
							<option value="tgl_pulang">Tanggal Pulang</option>
							<option value="tgl_masuk">Tanggal Masuk</option>
							<option value="tgl_grouping">Tanggal Grouping</option>
						</select>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="tanggal-awal" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="metode-bayar-ekb" class="col-md-3 col-form-label">Metode Pembayaran</label>
					<div class="col-md-9">
						<?= form_dropdown('metode_bayar', $metode_bayar, array(), 'id=metode-bayar-ekb class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kelas-rawat-ekb" class="col-md-3 col-form-label">Kelas Rawat</label>
					<div class="col-md-9">
						<select class="form-control" name="kelas_rawat" id="kelas-rawat-ekb">
							<option value="">Semua Kelas</option>
							<option value="1">Kelas 1</option>
							<option value="2">Kelas 2</option>
							<option value="3">Kelas 3</option>
						</select>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="status-klaim-ekb" class="col-md-3 col-form-label">Status Klaim</label>
					<div class="col-md-9">
						<select class="form-control" name="status_klaim" id="status-klaim-ekb">
							<option value="">Semua</option>
							<option value="normal">Normal</option>
							<option value="final">Final</option>
							<option value="terkirim">Terkirim</option>
							<option value="error">Error</option>
						</select>
					</div>
				</div>
				
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-primary waves-effect" id="btn-cari-data"><i class="fas fa-search mr-1"></i>Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->
