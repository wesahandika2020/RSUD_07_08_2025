<!-- Modal Search -->
<div id="modal-search-notif-dpjp" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-notif-dpjp-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-notif-dpjp-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-notif-dpjp role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-notif-dpjp" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-notif-dpjp class=form-control') ?>
					</div>
				</div>
				<!-- param bulanan -->
				<div class="bulanan-notif-dpjp form-group row tight">
					<label for="bulan-notif-dpjp" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown(
							'bulan',
							$bulan,
							date('n'),
							'id="bulan-notif-dpjp" class="form-control"'
						) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-notif-dpjp" class="form-control">
							<?php
							$tg_awal = date('Y') - 5;
							$tgl_akhir = date('Y') + 5;
							for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
								echo "<option value='$i'";
								if (date('Y') == $i) {
									echo " selected";
								}
								echo ">$i</option>";
							}
							?>
						</select>
					</div>
				</div>
				<!-- param rentang waktu -->
				<div class="rentang-waktu-notif-dpjp form-group row tight">
					<label for="tanggal-awal-notif-dpjp" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-notif-dpjp" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-notif-dpjp" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<!-- param harian -->
				<div class="harian-notif-dpjp form-group row tight">
					<label for="tanggal-harian-notif-dpjp" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-notif-dpjp" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="dokter-notif-dpjp" class="col-md-3 col-form-label">Dokter</label>
					<div class="col-md-9">
						<input type="text" name="id_dokter" id="dokter-notif-dpjp" class="select2-input" placeholder="Semua Dokter / Petugas">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getDataNotif(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->