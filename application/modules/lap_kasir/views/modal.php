<!-- Modal Search -->
<div id="kasir-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="kasir-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="kasir-search-label">Form Pencarian Lap. Kasir</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-kasir role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan form-group row tight">
					<label for="bulan" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
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
				<div class="rentang-waktu form-group row tight">
					<label for="tanggal-awal" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian form-group row tight">
					<label for="tanggal-harian" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>

				<div class="form-group row tight">
					<label for="jenis-pasien" class="col-md-3 col-form-label">Jenis Pasien</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_pasien', $jenis_pasien, array(), 'id=jenis-pasien class=form-control') ?>
					</div>
				</div>				
				<div class="form-group row tight">
					<label for="shift-poli" class="col-md-3 col-form-label">Shift Poli</label>
					<div class="col-md-9">
						<?= form_dropdown('shift_poli', [
							'' => 'Semua',
							'Pagi' => 'Pagi',
							'Sore' => 'Sore',
						], array(), 'id=shift-poli class=form-control') ?>
					</div>
				</div>
				<div class="ruangan_rajal form-group row tight">
					<label for="ruangan_rajal" class="col-md-3 col-form-label">Ruangan</label>
					<div class="col-md-9">
						<input type="text" name="ruangan_rajal" id="ruangan_rajal" class="select2-input" placeholder="Semua Ruangan">
					</div>
				</div>
				<div class="ruangan_ranap form-group row tight">
					<label for="ruangan_ranap" class="col-md-3 col-form-label">Ruangan</label>
					<div class="col-md-9">
						<input type="text" name="ruangan_ranap" id="ruangan_ranap" class="select2-input" placeholder="Semua Ruangan">
					</div>
				</div>

				<div class="form-group row tight">
					<label for="nama_pasien" class="col-md-3 col-form-label">Pasien</label>
					<div class="col-md-9">
						<input type="text" name="nama_pasien" id="nama_pasien" class="select2-input" placeholder="Semua Pasien">
					</div>
				</div>

				<!-- <div class="form-group row tight">
					<label for="dokter-search" class="col-md-3 col-form-label">Dokter</label>
					<div class="col-md-9">
						<input type="text" name="id_dokter" id="dokter-search" class="select2-input" placeholder="Semua Dokter / Petugas">
					</div>
				</div> -->

				<div class="form-group row tight">
					<label for="cara-bayar-search" class="col-md-3 col-form-label">Cara Bayar</label>
					<div class="col-md-9">
						<?= form_dropdown('cara_bayar', $cara_bayar, array(), 'id=cara-bayar-search class=form-control') ?>
					</div>
				</div>
				
				<div class="form-group row tight metode-bayar">
					<label for="jenis-tunai" class="col-md-3 col-form-label">Metode Bayar</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_tunai', $jenis_tunai, array(), 'id=jenis-tunai class=form-control') ?>
					</div>
				</div>

				<div class="form-group row tight penjamin-group-search">
					<label for="penjamin-search-kasir" class="col-md-3 col-form-label">Penjamin</label>
					<div class="col-md-9">
						<input type="text" name="penjamin" id="penjamin-search-kasir" class="selecr2-input" placeholder="Pilih Penjamin">
					</div>
				</div>

				<div class="form-group row tight bangsal-search">
					<label for="bangsal-search" class="col-md-3 col-form-label">Bangsal/Ruangan</label>
					<div class="col-md-9">
						<?= form_dropdown('bangsal_search', $bangsal_filter, array(), 'id=bangsal-search class=form-control') ?>
					</div>
				</div>

				<div class="form-group row tight kelas-rawat">
					<label for="kelas-rawat" class="col-md-3 col-form-label">Kelas Rawat</label>
					<div class="col-md-9">
						<?= form_dropdown('kelas_rawat', $kelas, array(), 'id=kelas-rawat class=form-control') ?>
					</div>
				</div>

				<div class="form-group row tight diagnosa_awal">
					<label for="diagnosa-awal" class="col-md-3 col-form-label">Diagnosa Awal</label>
					<div class="col-md-9">
						<input type="text" name="diagnosa_awal" id="diagnosa-awal" class="select2-input" placeholder="Pilih Diagnosa Awal">
					</div>
				</div>

				<div class="form-group row tight diagnosa_akhir">
					<label for="diagnosa-akhir" class="col-md-3 col-form-label">Diagnosa Akhir</label>
					<div class="col-md-9">
						<input type="text" name="diagnosa_akhir" id="diagnosa-akhir" class="select2-input" placeholder="Pilih Diagnosa Akhir">
					</div>
				</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanKasir(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<div id="modal-detail-laporan-kasir" class="modal fade">
	<div class="modal-dialog" style="max-width:98%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-fw fa-th-list mr-1"></i>Data Detail Laporan Kasir</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran">
				<div class="row">
					<div class="col-md-3">
						<div class="identitas-area" style="height:500px;overflow-y:auto;">
							<table class="table table-no-border table-striped table-hover table-sm color-table info-table">
								<thead>
									<tr>
										<th colspan="5" class="center"><i class="fas fa-user mr-1"></i>Data Pasien</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="30%"><strong>No. RM</strong></td>
										<td width="1%">:</td>
										<td width="69%"><span id="no-rm-detail"></span></td>
									</tr>
									<tr>
										<td><strong>No. Register</strong></td>
										<td>:</td>
										<td><span id="no-register-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Nama</strong></td>
										<td>:</td>
										<td><span id="nama-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Alamat</strong></td>
										<td>:</td>
										<td><span id="alamat-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Kelamin</strong></td>
										<td>:</td>
										<td><span id="kelamin-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Umur / Tgl Lahir</strong></td>
										<td>:</td>
										<td><span id="umur-detail"></span></td>
									</tr>
								</tbody>
							</table>
							<br>
							<table class="table table-no-border table-striped table-hover table-sm color-table info-table">
								<thead>
									<tr>
										<th colspan="5" class="center"><i class="fas fa-home mr-1"></i>Data Layanan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="30%"><strong>Tanggal Masuk</strong></td>
										<td width="1%">:</td>
										<td width="69%"><span id="tanggal-daftar-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Tanggal Pulang</strong></td>
										<td>:</td>
										<td><span id="tanggal-pulang-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Nama Pen. Jawab Finansial</strong></td>
										<td>:</td>
										<td><span id="nama-pjwb-finansial-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Alamat Pen. Jawab Finansial</strong></td>
										<td>:</td>
										<td><span id="alamat-pjwb-finansial-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Telp Pen. Jawab Finansial</strong></td>
										<td>:</td>
										<td><span id="telp-pjwb-finansial-detail"></span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-9">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="25%" class="right">
										<button type="button" class="btn btn-info btn-xs" id="btn-expand-all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
									</td>
								</tr>
							</table>
						</div>
						<div class="billing-area" style="height:600px;overflow-y:auto;"></div>
						<div class="list-group">
							<div class="list-group-item bg-light" style="border:0">
								<span class="d-flex justify-content-end text-red" style="font-size:20px;font-weight:600;font-style:italic;">Grand Total : <span id="total-billing" class="ml-1"></span></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
			</div>
		</div>
	</div>
</div>