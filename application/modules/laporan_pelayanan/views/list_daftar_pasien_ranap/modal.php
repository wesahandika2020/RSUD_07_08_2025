<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 70%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="bangsal">Bangsal</label>
							<input type="text" name="bangsal" id="bangsal" class="select2-input" placeholder="Pilih Bangsal...">
						</div>
						<div class="form-group">
							<label for="kelas">Kelas</label>
							<?php echo form_dropdown('kelas', $kelas, array(), 'id=kelas class=form-control') ?>
						</div>
						<div class="form-group">
							<label for="status">Status</label>
							<?php echo form_dropdown('status', $status, array(), 'id=status class=form-control') ?>
						</div>
						<div class="form-group">
							<label for="no-ruang">No. Ruang</label>
							<input type="text" name="no_ruang" id="no-ruang" class="form-control" placeholder="No. Ruang...">
						</div>
						<div class="form-group">
							<label for="no-bed">No. Bed</label>
							<input type="text" name="no_bed" id="no-bed" class="form-control" placeholder="No. Bed...">
						</div>
						<div class="form-group">
							<label for="lama-rawat">Lama Rawat</label>
							<input type="text" name="lama_rawat" id="lama-rawat" class="form-control" placeholder="Lama Rawat...">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="no-rm">No. RM</label>
							<input type="text" name="no_rm" id="no-rm" class="form-control" placeholder="No. RM...">
						</div>
						<div class="form-group">
							<label for="nama">Nama Pasien</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pasien...">
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea name="alamat" id="alamat" rows="4" class="form-control" placeholder="Alamat..."></textarea>
						</div>
						<div class="form-group">
							<label for="cara-bayar">Cara Bayar</label>
							<?php echo form_dropdown('cara_bayar', $cara_bayar, array(), 'id=cara-bayar class=form-control') ?>
						</div>
						<div class="form-group penjamin-group">
							<label for="penjamin">Penjamin</label>
							<input type="text" name="penjamin" id="penjamin" class="select2-input" placeholder="Pilih Penjamin...">
						</div>
					</div>
				</div>
				
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListDaftarPasienRawatInap(1)"><i class="fas fa-filter mr-1"></i>Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->