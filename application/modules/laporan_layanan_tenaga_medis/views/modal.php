<!-- Modal Search -->
<div id="kasir-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="kasir-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="kasir-search-label">Form Pencarian Lap. Kasir</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-layanan-tenaga-medis role=form class=form-horizontal') ?>
				<div class="bulanan form-group row tight">
					<label for="bulan" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, date('m'), 'id=bulan class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun" class="form-control">
							<?php $tg_awal = date('Y') - 5;
							$tgl_akhir = date('Y') + 5;
							for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
								echo "<option value='$i'";
								if (date('Y') == $i) {
									echo "selected";
								}
								echo ">$i</option>";
							}
							?>
						</select>
					</div>
				</div>
				<br>

				<div class="form-group row tight">
					<label for="tenaga-medis" class="col-md-3 col-form-label">Tenaga Medis</label>
					<div class="col-md-9">
						<input type="text" name="tenaga_medis" id="tenaga-medis" class="select2-input">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="jenis-layanan-search" class="col-md-3 col-form-label">Jenis Rawat</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_rawat', $jenis_rawat, array(), 'id=jenis-rawat-search class=form-control') ?>
					</div>
				</div>
				<div class="rajal form-group row tight hide">
					<label for="tempat-layanan-1" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan_1', $tempat_layanan_1, array(), 'id=tempat-layanan-1 class=form-control') ?>
					</div>
				</div>
				<div class="ranap form-group row tight hide">
					<label for="tempat-layanan-2" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan_2', $tempat_layanan_2, array(), 'id=tempat-layanan-2 class=form-control') ?>
					</div>
				</div>
				<div class="penunjang form-group row tight hide">
					<label for="tempat-layanan-2" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan_3', $tempat_layanan_3, array(), 'id=tempat-layanan-2 class=form-control') ?>
					</div>
				</div>
				<div class="penjamin form-group row tight">
					<label for="penjamin" class="col-md-3 col-form-label">Penjamin</label>
					<div class="col-md-9">
						<?= form_dropdown('penjamin', $penjamin, array(), 'id=penjamin class=form-control') ?>
					</div>
				</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanLayananTenagaMedis(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->
