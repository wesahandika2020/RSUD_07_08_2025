<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="tanggal-awal" class="col-md-3 col-form-label">Tanggal Layanan</label>
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
					<label for="no-register-search" class="col-md-3 col-form-label">No. Register</label>
					<div class="col-md-9">
						<input type="text" name="no_register" id="no-register-search" class="form-control" placeholder="No. Register">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no-rm-search" class="col-md-3 col-form-label">No. RM</label>
					<div class="col-md-9">
						<input type="text" name="no_rm" id="no-rm-search" class="form-control" placeholder="No. Rekam Medik">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="nik-search" class="col-md-3 col-form-label">NIK</label>
					<div class="col-md-9">
						<input type="text" name="nik" id="nik-search" class="form-control" placeholder="Nomor Induk Kependudukan">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="nama-search" class="col-md-3 col-form-label">Nama</label>
					<div class="col-md-9">
						<input type="text" name="nama" id="nama-search" class="form-control" placeholder="Nama Pasien">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="dokter-search" class="col-md-3 col-form-label">Dokter DPJP</label>
					<div class="col-md-9">
						<input type="text" name="dokter" id="dokter-search" class="select2-input" placeholder="Pilih Dokter DPJP">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="cara-bayar-search" class="col-md-3 col-form-label">Cara Bayar</label>
					<div class="col-md-9">
						<?= form_dropdown('cara_bayar', $cara_bayar, array(), 'id=cara-bayar-search class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight penjamin-group-search">
					<label for="penjamin-search" class="col-md-3 col-form-label">Penjamin</label>
					<div class="col-md-9">
						<input type="text" name="penjamin" id="penjamin-search" class="selecr2-input" placeholder="Pilih Penjamin">
					</div>
				</div>
                <div class="form-group row tight">
					<label for="tempat-layanan-search" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<input type="text" name="tempat_layanan" id="tempat-layanan-search" class="select2-input" placeholder="Pilih Tempat Layanan">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListPemeriksaan(1)"><i class="fas fa-search mr-1"></i>Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->