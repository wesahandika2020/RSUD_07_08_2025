	<?php $this->load->view('pemeriksaan_hemo/laporan_hemodialisa/js') ?>
<!-- Modal -->
<div class="modal fade" id="modal-laporan-hemodialisa" data-backdrop="static">
	<div class="modal-dialog" style="max-width: 85%">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Laporan Hemodialisa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-laporan-hd class=form-horizontal') ?>
					<input type="hidden" name="id_laporan_hd" id="id-laporan-hd">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-laporan-hd">
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-laporan-hd">
					<input type="hidden" name="id_rawat_inap" id="id-rawat-inap-laporan-hd">
					<div class="row">
						<div class="col-lg-6">
							<table class="table table-striped table-hover table-sm">
								<tbody>
									<tr>
										<td width="30%">No. RM</td>
										<td width="1%">:</td>
										<td width="69%"><b><span id="pasien-laporan-no-rm"></span></b></td>
									</tr>
									<tr>
										<td>Nama Pasien</td>
										<td>:</td>
										<td><b><span id="pasien-laporan-nama"></span></b></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-6">
							<table class="table table-striped table-hover table-sm">
								<tbody>
									<tr>
										<td width="30%">Tanggal Lahir</td>
										<td width="1%">:</td>
										<td width="69%"><b><span id="pasien-laporan-tanggal-lahir"></span></b></td>
									</tr>
									<tr>
										<td>Kelamin</td>
										<td>:</td>
										<td><b><span id="pasien-laporan-kelamin"></span></b></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="box-well" style="height: 400px; overflow-y: auto;">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">Dokter Jaga</label>
											<div class="col-lg-7">
												<input type="text" name="dokter_jaga" id="dokter-jaga" class="select2c-input">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">Perawat HD</label>
											<div class="col-lg-7">
												<input type="text" name="perawat_hd" id="perawat-hd" class="select2c-input">
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Perawat Ruangan</label>
											<div class="col-lg-8">
												<input type="text" name="perawat_ruangan" id="perawat-ruangan" class="select2c-input">
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Hari / Tanggal</label>
											<div class="col-lg-8">
												<input type="text" name="waktu" id="waktu-laporan" class="custom-form col-lg-8 clear-input" value="<?= date('d/m/Y H:i:s') ?>"> 											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Ruang rawat</label>
											<div class="col-lg-8">
											<input type="text" name="ranap_asal_hd" id="ranap-asal-hd" class="custom-form clear-input">
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">Waktu HD</label>
											<div class="col-lg-9">
												<span>Pkl </span><input type="text" name="waktu_awal" id="waktu-awal" class="custom-form col-lg-4 d-inline-block clear-input" placeholder="hh:mm">
												<span> s/d </span>
												<span>Pkl </span><input type="text" name="waktu_akhir" id="waktu-akhir" class="custom-form col-lg-4 d-inline-block clear-input" placeholder="hh:mm">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">Cara Bayar</label>
											<div class="col-lg-9">
												<span id="cara-bayar"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row tight">
									<label class="col-lg-2 label-custom-form">Dilakukan program</label>
									<div class="col-lg-10">
										<input type="checkbox" name="program_hd" id="dilakukan-program-hd" class="mr-1" value="1">HD
										<input type="checkbox" name="program_sleed" id="dilakukan-program-sleed" class="mr-1 ml-2" value="1">SLEED
										<input type="checkbox" name="program_hfr" id="dilakukan-program-hfr" class="mr-1 ml-2" value="1">HFR
										<input type="checkbox" name="program_hdf" id="dilakukan-program-hdf" class="mr-1 ml-2" value="1">HDF
										<input type="checkbox" name="program_lain" id="dilakukan-program-lain" class="mr-1 ml-2" value="1">Lain-lain
										<input type="text" name="program_lain_input" id="dilakukan-program-lain-input" class="custom-form col-lg-4 d-inline-block clear-input" placeholder="Lain-lain">
									</div>
								</div>
								<div class="form-group row tight">
									<label class="col-lg-2 label-custom-form"></label>
									<div class="col-lg-10">
										<span>Dengan : </span><input type="text" name="dengan" id="dengan" class="custom-form col-lg-4 d-inline-block clear-input" placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Time Dialisis</label>
											<div class="col-lg-8">
												<div class="input-group-append">
													<input type="text" name="waktu_dialisis" id="waktu-dialisis" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">Jam</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Quick Blood</label>
											<div class="col-lg-8">
												<div class="input-group-append">
													<input type="text" name="quick_blood" id="quick-blood" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml/mnt</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Profilling</label>
											<div class="col-lg-8">
												 <span class="bold" style="font-size: 12px">UF :</span> <input type="text" name="profilling_uf" id="profilling-uf" class="custom-form col-lg-9 d-inline-block clear-input">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form"></label>
											<div class="col-lg-8">
												 <span class="bold" style="font-size: 12px">Na :</span> <input type="text" name="profilling_na" id="profilling-na" class="custom-form col-lg-9 d-inline-block clear-input">
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">UF Goal</label>
											<div class="col-lg-9">
												<div class="input-group-append">
													<input type="text" name="uf_goal" id="uf-goal" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">Quick Dialysat</label>
											<div class="col-lg-9">
												<div class="input-group-append">
													<input type="text" name="quick_dialysat" id="quick-dialysat" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml/mnt</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">Lainnya</label>
											<div class="col-lg-9">
												 <input type="text" name="profilling_lain" id="profilling-lain" class="custom-form clear-input">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row tight">
									<label class="col-lg-2 label-custom-form">Akses Sirkulasi</label>
									<div class="col-lg-10">
										<input type="checkbox" name="akses_sirkulasi_cimino" id="akses-sirkulasi-cimino" class="mr-1" value="1"><span class="bold"><em>Cimino</em></span>
										<input type="checkbox" name="akses_sirkulasi_femoral" id="akses-sirkulasi-femoral" class="mr-1 ml-2" value="1"><span class="bold"><em>Femoral</em></span>
										<input type="checkbox" name="akses_sirkulasi_catheter" id="akses-sirkulasi-catheter" class="mr-1 ml-2" value="1"><span class="bold"><em>Double Lumen Catheter	</em></span>
										<input type="text" name="akses_sirkulasi_catheter_input" id="akses-sirkulasi-catheter-input" class="custom-form col-lg-4 d-inline-block clear-input" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<hr>
						<h5 class="bold">Pre HD</h5>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group row tight">
									<label class="col-lg-4 label-custom-form">Keluhan Utama</label>
									<div class="col-lg-8">
										<input type="text" name="keluhan_utama" id="keluhan-utama-laporan" class="custom-form clear-input" placeholder="Keluhan utama">
									</div>
								</div>
								<div class="form-group row tight">
									<label class="col-lg-4 label-custom-form">Keadaan Umum</label>
									<div class="col-lg-8">
										<input type="text" name="keadaan_umum" id="keadaan-umum-laporan" class="custom-form clear-input" placeholder="Keadaan umum">
									</div>
								</div>
								<div class="form-group row tight">
									<label class="col-lg-4 label-custom-form">Kesadaran</label>
									<div class="col-lg-8">
										<input type="text" name="kesadaran" id="kesadaran-laporan" class="custom-form clear-input" placeholder="Kesadaran">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group row tight">
									<label class="col-lg-4 label-custom-form">GCS</label>
									<div class="col-lg-8">
										<span class="bold" style="font-size: 12px">E</span> <input type="text" name="gcs_e" id="gcs-e" class="custom-form d-inline-block col-lg-2 clear-input">
										<span class="bold" style="font-size: 12px">M</span> <input type="text" name="gcs_m" id="gcs-m" class="custom-form d-inline-block col-lg-2 clear-input">
										<span class="bold" style="font-size: 12px">V</span> <input type="text" name="gcs_v" id="gcs-v" class="custom-form d-inline-block col-lg-2 clear-input">
									</div>
								</div>
								<div class="form-group row tight">
									<label class="col-lg-4 label-custom-form">Tensi</label>
									<div class="col-lg-8">
										<div class="input-group-append">
											<input type="text" name="tensi_s" id="tensi-s-laporan" class="custom-form d-inline-block clear-input">
											<span> / </span>
											<input type="text" name="tensi_d" id="tensi-d-laporan" class="custom-form d-inline-block clear-input">
											<span class="input-group-custom">mmHg</span>
										</div>
									</div>
								</div>
								<div class="form-group row tight">
									<label class="col-lg-4 label-custom-form">Suhu</label>
									<div class="col-lg-8">
										<div class="input-group-append">
											<input type="text" name="suhu" id="suhu-laporan" class="custom-form d-inline-block clear-input">
											<span class="input-group-custom">&#8451;</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group row tight">
									<label class="col-lg-3 label-custom-form"></label>
									<div class="col-lg-9">&nbsp;</div>
								</div>
								<div class="form-group row tight">
									<label class="col-lg-3 label-custom-form">Nadi</label>
									<div class="col-lg-9">
										<div class="input-group-append">
											<input type="text" name="nadi" id="nadi-laporan" class="custom-form d-inline-block clear-input">
											<span class="input-group-custom">x/mnt</span>
										</div>
									</div>
								</div>
								<div class="form-group row tight">
									<label class="col-lg-3 label-custom-form">Respirasi</label>
									<div class="col-lg-9">
										<div class="input-group-append">
											<input type="text" name="respirasi" id="respirasi-laporan" class="custom-form col-lg-5 d-inline-block clear-input">
											<span class="input-group-custom">x/mnt</span>
											<input type="checkbox" name="ventilator" id="ventilator" value="1" class="mr-1 ml-2 mt-1">On Ventilator
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group row tight">
									<label class="col-lg-2 label-custom-form">On HD</label>
									<div class="col-lg-10">
										<textarea name="on_hd" id="on-hd" rows="4" class="form-control clear-input"></textarea>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<h5 class="bold">Post HD</h5>
						<h6 class="text-muted"><em>Hasil Akhir HD</em></h6>
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Time Dialisis</label>
											<div class="col-lg-8">
												<div class="input-group-append">
													<input type="text" name="waktu_dialisis_post_hd" id="waktu-dialisis-post-hd" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">Jam</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Transfusi</label>
											<div class="col-lg-8">
												<div class="input-group-append">
													<input type="text" name="transfusi" id="transfusi" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Terapi Cairan</label>
											<div class="col-lg-8">
												<div class="input-group-append">
													<input type="text" name="terapi_cairan" id="terapi-cairan" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-6 label-custom-form">Asupan Cairan (Oran/NGT)</label>
											<div class="col-lg-6">
												<div class="input-group-append">
													<input type="text" name="asupan_cairan" id="asupan-cairan" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Lain - lain</label>
											<div class="col-lg-8">
												<div class="input-group-append">
													<input type="text" name="hasil_lain" id="hasil-lain" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">UF Goal</label>
											<div class="col-lg-9">
												<div class="input-group-append">
													<input type="text" name="uf_goal_post_hd" id="uf-goal-post-hd" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">Lain - lain</label>
											<div class="col-lg-9">
												<div class="input-group-append">
													<input type="text" name="uf_goal_lain" id="uf-goal-lain" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Jumlah</label>
											<div class="col-lg-8">
												<div class="input-group-append">
													<input type="text" name="jumlah" id="jumlah-hasil" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Balance</label>
											<div class="col-lg-8">
												<div class="input-group-append">
													<input type="text" name="balance" id="balance-hasil" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form">Jumlah</label>
											<div class="col-lg-9">
												<div class="input-group-append">
													<input type="text" name="uf_goal_jumlah" id="uf-goal-jumlah" class="custom-form d-inline-block clear-input">
													<span class="input-group-custom">ml</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group row tight">
									<label class="col-lg-2 label-custom-form">Keterangan Lain</label>
									<div class="col-lg-10">
										<textarea name="keterangan_lain" id="keterangan-lain-laporan" rows="4" class="form-control clear-input"></textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group row tight">
									<label class="col-lg-4 label-custom-form">Darah untuk pemeriksaan laboratorium</label>
									<div class="col-lg-8">
										<input type="radio" name="darah_lab" id="darah-lab-diambil" class="mr-1" value="1">Diambil
										<input type="radio" name="darah_lab" id="darah-lab-tidak-diambil" class="mr-1 ml-2" value="0">Tidak Diambil
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<table class="table table-sm table-striped table-hover color-table info-table" id="table-laporan-hd">
								<thead>
									<tr>
										<th width="15%" class="center">Waktu</th>
										<th width="30%">Keluhan Utama</th>
										<th width="15%" class="center">Tensi</th>
										<th width="10%" class="center">Suhu</th>
										<th width="10%" class="center">Nadi</th>
										<th width="10%" class="center">Respirasi</th>
										<th width="10%" class="center">Ventilator</th>
										<th width="5%"></th>
									</tr>
								</thead>
								<tbody style="height: 300px; overflow-y: auto;"></tbody>
							</table>
						</div>
					</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpanLaporanHD()"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
	</div>
</div>