<!-- Modal Search -->
<div id="modal-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search role=form class=form-horizontal') ?>

				<div class="periode-tahunan form-group row tight" hidden>
					<label for="periode-tahunan" class="col-md-3 col-form-label">Periode Tahun</label>
					<div class="col-md-9">
						<select name="tahun_periode" id="tahun-periode" class="form-control">
							<?php $tg_awal = date('Y') - 5;
							$tgl_akhir     = date('Y') + 5;
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

				<div class="form-group row tight">
					<label for="periode-laporan" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan name=periode_laporan class=form-control') ?>
					</div>
				</div>
				<div class="harian form-group row tight">
					<label for="tanggal-harian" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
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
							$tgl_akhir     = date('Y') + 5;
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
				<div class="form-group row tight">
					<label for="jenis-layanan-search" class="col-md-3 col-form-label">Jenis Rawat</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_rawat', $jenis_rawat, array(), 'id=jenis-rawat-search class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="asal-kunjungan-search" class="col-md-3 col-form-label">Asal Kunjungan</label>
					<div class="col-md-9">
						<?= form_dropdown('asal_kunjungan', $asal_kunjungan, array(), 'id=asal-kunjungan-search class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="asal-kunjungan-11-search" class="col-md-3 col-form-label">Asal Kunjungan</label>
					<div class="col-md-9">
						<?= form_dropdown('asal_kunjungan_11', $asal_kunjungan_11, array(), 'id=asal-kunjungan-11-search class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kelas-rawat" class="col-md-3 col-form-label">Kelas Rawat</label>
					<div class="col-md-9">
						<?= form_dropdown('kelas_rawat', $kelas_rawat, array(), 'id=kelas-rawat class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="asal-kunjungan-poli-search" class="col-md-3 col-form-label">Asal Poliklinik</label>
					<div class="col-md-9">
						<?= form_dropdown('asal_poli', $asal_poli, array(), 'id=asal-kunjungan-poli-search class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="status_keluar" class="col-md-3 col-form-label">Status Keluar</label>
					<div class="col-md-9">
						<?= form_dropdown('status_keluar', $status_keluar, array(), 'id=status_keluar class=form-control') ?>
					</div>
				</div>
				<div class="rajal form-group row tight">
					<label for="tempat-layanan-1" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan_1', $tempat_layanan_1, array(), 'id=tempat-layanan-1 class=form-control') ?>
					</div>
				</div>
				<div class="ranap form-group row tight">
					<label for="tempat-layanan-2" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan_2', $tempat_layanan_2, array(), 'id=tempat-layanan-2 class=form-control') ?>
					</div>
				</div>
				<div class="penunjang form-group row tight">
					<label for="tempat-layanan-3" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan_3', $tempat_layanan_3, array(), 'id=tempat-layanan-3 class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="penjamin-search" class="col-md-3 col-form-label">Penjamin</label>
					<div class="col-md-9">
						<?= form_dropdown('penjamin', $penjamin, array(), 'id=penjamin-search class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kunjungan-search" class="col-md-3 col-form-label">Status Kunjungan</label>
					<div class="col-md-9">
						<?= form_dropdown('kunjungan', $kunjungan, array(), 'id=kunjungan-search class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kunjungan-search" class="col-md-3 col-form-label">Jenis Penunjang</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_penunjang', [
							1 => 'Radiologi',
							2 => 'Farmasi',
							3 => 'Laboratorium',
							4 => 'Rehabilitasi Medik',
						], array(), 'id=jenis-penunjang class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kunjungan-search" class="col-md-3 col-form-label">Jenis Kasus</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_kasus', [
							1 => 'Baru',
							0 => 'Lama',
						], array(), 'id=jenis-kasus class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight" id="dokter-search" style="display: none">
					<label for="dokter-search" class="col-md-3 col-form-label">Dokter</label>
					<div class="col-md-9">
						<?= form_input('dokter_search', '', 'id=dokter-search-select class=select2c-input') ?>
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
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanRM(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<div id="modal-detail-rekap-billing" class="modal fade">
	<div class="modal-dialog" style="max-width:98%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-fw fa-th-list mr-1"></i>Data Detail Billing Pasien</h4>
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
									<td width="75%">
										<button type="button" class="btn btn-warning btn-xs" onclick="ubahCaraBayar()"><i class="fas fa-fw fa-exchange-alt mr-1"></i>Ubah Cara Bayar Pasien</button>
										<button type="button" class="btn btn-success btn-xs" onclick="cetakRincianBilling('', '')"><i class="fas fa-fw fa-print mr-1"></i>Cetak Rincian Billing</button>
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

<!-- Modal Histori Pembayaran -->
<div id="modal-history-pembayaran" class="modal fade">
	<div class="modal-dialog" style="max-width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-fw fa-info mr-1"></i>Data History Pembayaran</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body" style="min-height:200px">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<div id="history-pembayaran-content"></div>
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
<!-- End Modal Histori Pembayaran -->

<div id="modal-detail-pemeriksaan" class="modal fade">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Data Riwayat Pasien</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-detail-pemeriksaan role=form class=form-horizontal') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
				<input type="hidden" name="id_pasien" id="id-pasien">

				<div class="accordion" id="accordionExample">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h2 class="mb-0">
								<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<i class="fas fa-user mr-1"></i>Data Pasien
								</button>
							</h2>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
										<table class="table table-sm table-striped">
											<tbody>
												<tr>
													<td>No. RM</td>
													<td>:</td>
													<td><b><span id="no-rm"></span></b></td>
												</tr>
												<tr>
													<td>No. Register</td>
													<td>:</td>
													<td><b><span id="no-register"></span></b></td>
												</tr>
												<tr>
													<td>Nama</td>
													<td>:</td>
													<td><b><span id="nama"></span></b></td>
												</tr>
												<tr>
													<td>Alamat</td>
													<td>:</td>
													<td><b><span id="alamat"></span></b></td>
												</tr>
												<tr>
													<td>Kelamin</td>
													<td>:</td>
													<td><b><span id="kelamin"></span></b></td>
												</tr>
												<tr>
													<td>Umur / Tgl. Lahir</td>
													<td>:</td>
													<td><b><span id="umur"></span></b></td>
												</tr>
												<tr>
													<td>Layanan</td>
													<td>:</td>
													<td><b><span id="asal-layanan" name="asal_layanan"></span></b></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-lg-6">
										<table class="table table-sm table-striped">
											<tbody>
												<tr>
													<td><b>Riwayat Rekam Medis</b></td>
													<td>:</td>
													<td>
														<button type="button" title="Klik untuk melihat riwayat rekam medis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien
														</button> <!-- tambahan lina -->
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="card">
						<div class="card-header" id="headingTwo">
							<h2 class="mb-0">
								<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<i class="fas fa-list mr-1"></i>Entri Hasil Radiologi
								</button>
							</h2>
						</div>
						<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="box-well">
											<input type="hidden" name="id_radiologi" id="id-radiologi">
											<button type="button" onclick="tambahRequestRadiologi()" id="btn-tambah-item" class="btn btn-info"><i class="fas fa-plus-circle mr-1"></i>Tambah Item Pemeriksan</button>
											<button type="button" class="btn btn-success" id="btn-print-hasil" onclick="cetakHasilRadiologi()"><i class="fas fa-print mr-1"></i>Print Hasil Radiologi</button>

											<div id="hasil-pemeriksaan-radiologi"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<?= form_close() ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Pemeriksaan -->