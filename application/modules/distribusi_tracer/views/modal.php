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
						<input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="no-register-search" class="col-md-3 col-form-label">No. Register</label>
					<div class="col-md-9">
						<input type="text" name="no_register" id="no-register-search" class="form-control" placeholder="No. Register...">
					</div>
				</div>
				<div class="form-group row">
					<label for="no-rm-search" class="col-md-3 col-form-label">No. RM</label>
					<div class="col-md-9">
						<input type="text" name="no_rm" id="no-rm-search" class="form-control" placeholder="No. Rekam Medik...">
					</div>
				</div>
				<div class="form-group row">
					<label for="pasien-search" class="col-md-3 col-form-label">Pasien</label>
					<div class="col-md-9">
						<input type="text" name="pasien" id="pasien-search" class="form-control" placeholder="Nama Pasien...">
					</div>
				</div>
				<div class="form-group row">
					<label for="ranap-search" class="col-md-3 col-form-label">Rawat Inap</label>
					<div class="col-md-9">
						<select name="ranap" id="ranap-search" class="form-control">
							<option value="">Semua...</option>
							<option value="yes">Ya</option>
							<option value="no">Tidak</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="unit-search" class="col-md-3 col-form-label">Unit</label>
					<div class="col-md-9">
						<select name="unit" id="unit-search" class="form-control">
							<option value="">Semua...</option>
							<option value="1">Rawat Jalan</option>
							<option value="2">IGD</option>
							<option value="3">Penunjang</option>
						</select>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListDataDistribusiTracer(1)"><i class="fas fa-search mr-1"></i>Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Distribusi Tracer -->
<div id="modal-distribusi-tracer" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width:70%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-distribusi-tracer-label">Form Distribusi Tracer</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<?= form_open('', 'id=form-distribusi-tracer role=form class=form-horizontal') ?>
						<div class="form-group row">
							<label for="no-rm-search" class="col-md-3 col-form-label right">No. RM</label>
							<div class="col-md-9">
								<input type="text" name="no_rm" id="no-rm" class="form-control" placeholder="No. Rekam Medik...">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-md-3 col-form-label"></label>
							<div class="col-md-9">
								<button type="button" class="btn btn-info waves-effect" id="btn-change"><i class="fas fa-exchange-alt mr-1"></i>Update Status Berkas</button>
							</div>
						</div>
						<?= form_close() ?>
					</div>
					<div class="col-md-6">
						<?= form_open('', 'id=form-detail role=form class=form-horizontal') ?>
						<div class="row">
							<div class="col-lg-12">
								<dl class="dl-horizontal">
									<dt>
										<h4><b>No. RM</b></h4>
									</dt>
									<dd>
										<h4><b id="no_rm_label">NO. RM</b></h4>
									</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>&nbsp;</dt>
									<dd>&nbsp;</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>
										<h5><b>No. Register</b></h5>
									</dt>
									<dd>
										<h5 id="reg_label">No. Register</h5>
									</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>
										<h5><b>Pasien</b></h5>
									</dt>
									<dd>
										<h5 id="pasien_label">Pasien</h5>
									</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>
										<h5><b>Waktu Order</b></h5>
									</dt>
									<dd>
										<h5 id="waktu_order_label">Waktu Order</h5>
									</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>
										<h5><b>Tujuan</b></h5>
									</dt>
									<dd>
										<h5 id="tujuan_label">Tujuan</h5>
									</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>
										<h5><b>Posisi Terakhir</b></h5>
									</dt>
									<dd>
										<h5 id="posisi_label">Posisi Terakhir</h5>
									</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>
										<h5><b>Cara Bayar</b></h5>
									</dt>
									<dd>
										<h5 id="cara_bayar_label">Cara Bayar</h5>
									</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>
										<h5><b>Status</b></h5>
									</dt>
									<dd>
										<h5 id="status_label">Status</h5>
									</dd>
								</dl>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
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
<!-- End Modal Distribusi Tracer -->
