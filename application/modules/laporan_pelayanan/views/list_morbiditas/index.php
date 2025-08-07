<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<?php echo form_open('', 'id=form-morbiditas class=form-horizontal') ?>
							<div class="form-group row">
								<label class="col-form-label col-md-3 right">Range Tanggal</label>
								<div class="col-md-4">
									<input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" placeholder="Tanggal Awal...">
								</div>
								<div class="col-md-4">
									<input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" placeholder="Tanggal Akhir...">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-md-3 right">Jenis Pelayanan</label>
								<div class="col-md-9">
									<?php echo form_dropdown('jenis_pelayanan', $jenis_pelayanan, array(), 'id=jenis-pelayanan class=form-control') ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-md-3 right"></label>
								<div class="col-md-9">
									<button type="button" class="btn btn-info waves-effect" id="btn-search"><i class="fas fa-eye mr-1"></i>Tampilkan Laporan</button>
									<button type="button" class="btn btn-secondary waves-effect" id="btn-reset"><i class="fas fa-sync-alt mr-1"></i>Reset Data</button>
								</div>
							</div>
						<?php echo form_close() ?>
					</div>
					<div class="col-md-12">
						<div id="chart-content"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('js') ?>