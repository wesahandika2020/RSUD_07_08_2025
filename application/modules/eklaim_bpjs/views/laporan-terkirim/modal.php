<!-- Modal Search -->
<div id="modal-filter-laporan" class="modal fade" role="dialog" aria-labelledby="modal-filter-laporan-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:45%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-filter-laporan-label">FILTER LAPORAN KLAIM INDIVIDUAL</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-filter-laporan role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="jenis_rawat_lap" class="col-md-3 col-form-label">Jenis Rawat</label>
					<div class="col-md-9">
						<select class="form-control" name="jenis_rawat_lap" id="jenis_rawat_lap">
							<option value="">Semua</option>
							<option value="2">Rawat Inap</option>
							<option value="1">Rawat Jalan</option>s
						</select>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="periode_lap" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<select class="form-control" name="periode_lap" id="periode_lap">
							<option value="tgl_pulang">Waktu Pulang</option>
							<option value="tgl_masuk">Waktu Masuk</option>
						</select>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="tanggal_awal_lap" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal_lap" id="tanggal_awal_lap" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir_lap" id="tanggal_akhir_lap" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="metode_bayar_lap" class="col-md-3 col-form-label">Metode Pembayaran</label>
					<div class="col-md-9">
						<?= form_dropdown('metode_bayar_lap', ['' => "Semua"] + $metode_bayar, array(), 'id=metode_bayar_lap class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kelas_rawat_lap" class="col-md-3 col-form-label">Kelas Rawat</label>
					<div class="col-md-9">
						<select class="form-control" name="kelas_rawat_lap" id="kelas_rawat_lap">
							<option value="">Semua Kelas</option>
							<option value="1">Kelas 1</option>
							<option value="2">Kelas 2</option>
							<option value="3">Kelas 3</option>
						</select>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="cara_pulang_lap" class="col-md-3 col-form-label">Cara Pulang</label>
					<div class="col-md-9">
						<?= form_dropdown('cara_pulang_lap', ['' => "Semua"] + $cara_pulang, array(), 'id=cara_pulang_lap class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="jenis_tarif_lap" class="col-md-3 col-form-label">Jenis Tarif</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_tarif_lap', $kode_tarif, array(), 'id=jenis_tarif_lap class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="cob_lap" class="col-md-3 col-form-label">COB</label>
					<div class="col-md-9">
						<?= form_dropdown('cob_lap', ['' => "Semua"] + $cob, array(), 'id=cob_lap class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="tanggal_awal_grouper" class="col-md-3 col-form-label">Waktu Grouping</label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal_grouper" id="tanggal_awal_grouper" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir_grouper" id="tanggal_akhir_grouper" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="petugas_klaim" class="col-md-3 col-form-label">Petugas</label>
					<div class="col-md-9">
						<input type="text" name="petugas_klaim" id="petugas_klaim" class="select2-input" placeholder="Semua">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="order_by" class="col-md-3 col-form-label">Kelas Rawat</label>
					<div class="col-md-9">
						<select class="form-control" name="order_by" id="order_by">
							<option value="default">Tanggal Pulang - Waktu Grouping</option>
							<option value="grouping">Waktu Grouping</option>
							<option value="waktu-pulang">Waktu Pulang</option>
							<option value="waktu-masuk">Waktu Masuk</option>
							<option value="no_sep">Nomor SEP</option>
						</select>
					</div>
				</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-primary waves-effect" id="btn-tampilkan-data-lap"><i class="fas fa-eye mr-1"></i>Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->