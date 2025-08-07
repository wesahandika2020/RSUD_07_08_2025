<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 45%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Parameter Pencarian</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-search'); ?>
				<div class="form-group row tight">
					<label class="col-3 col-form-label">Tanggal</label>
					<div class="col-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="">
					</div>
					<div class="col-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col col-form-label">No. RM</label>
					<div class="col-9">
						<input class="form-control" type="text" name="no_rm" onkeypress="return hanyaAngka(event)" id="no-rm-search" placeholder="No. RM">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col col-form-label">No. Register</label>
					<div class="col-9">
						<input class="form-control" type="text" name="no_register" onkeypress="return hanyaAngka(event)" id="no-register-search" placeholder="No. Register">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col col-form-label">Nama</label>
					<div class="col-9">
						<input name="nama" id="nama-search" class="form-control" placeholder="Nama Pasien">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col col-form-label">Jenis Layanan</label>
					<div class="col-9">
						<?= form_dropdown('jenis_layanan', $jenis_layanan, array(), 'id=jenis-layanan-search class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col col-form-label">Dokter Radiologi</label>
					<div class="col-9">
						<?= form_dropdown('dokter_radiologi', $dokter_radiologi, array(), 'id=dokter-radiologi class=form-control') ?>
					</div>
				</div>

				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListDataHasilRadiologi(1)"><i class="fas fa-search mr-1"></i>Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pemeriksaan -->
<div id="modal-detail-pemeriksaan" class="modal fade">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Hasil Pemeriksaan Radiologi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-detail-pemeriksaan role=form class=form-horizontal') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
				<input type="hidden" name="id_pasien" id="id-pasien">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran">

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
												<td width="30%">No. Radiologi</td>
												<td width="1%">:</td>
												<td width="69%"><b><span id="no-radiologi-detail"></span></b></td>
											</tr>
											<tr>
												<td>No. RM / No. Register</td>
												<td>:</td>
												<td><b><span id="no-rm-detail"></span></b></td>
											</tr>
											<tr>
												<td>Nama</td>
												<td>:</td>
												<td><b><span id="nama-detail"></span></b></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>:</td>
												<td><b><span id="alamat-detail"></span></b></td>
											</tr>
											<tr>
												<td>Kelamin</td>
												<td>:</td>
												<td><b><span id="kelamin-detail"></span></b></td>
											</tr>
											<tr>
												<td>No. Handphone</td>
												<td>:</td>
												<td><b><span id="no-telp-detail"></span></b></td>
											</tr>
											<tr>
												<td>Umur / Tgl. Lahir</td>
												<td>:</td>
												<td><b><span id="umur-detail"></span></b></td>
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
												<td width="30%">Nama P. Jawab</td>
												<td width="1%">:</td>
												<td width="69%"><b><span id="nama-pjwb-detail"></span></b></td>
											</tr>
											<tr>
												<td>Alamat P. Jawab</td>
												<td>:</td>
												<td><b><span id="alaamt-pjwb-detail"></span></b></td>
											</tr>
											<tr>
												<td>Telp. P. Jawab</td>
												<td>:</td>
												<td><b><span id="telp-pjwb-detail"></span></b></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Instansi Perujuk</td>
												<td>:</td>
												<td><b><span id="instansi-perujuk-detail"></span></b></td>
											</tr>
											<tr>
												<td>Tenaga Medis Perujuk</td>
												<td>:</td>
												<td><b><span id="tenaga-medis-perujuk-detail"></span></b></td>
											</tr>
											<tr>
												<td>Diagnosis Pasien</td>
												<td>:</td>
												<td><span><button type="button" title="Klik untuk melihat diagnosis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatDiagnosisRad()"><i
																	class="fas fa-eye m-r-5"></i>Lihat Diagnosis Pasien</button></span></td>
											</tr>
											<tr>
												<td>Riwayat Rekam Medis <i>(Baru)</i></td>
												<td>:</td>
												<td>
													<button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button>
												</td>
											</tr>
											<tr>
												<td>Riwayat Rekam Medis</td>
												<td>:</td>
												<td>
													<button type="button" title="Klik untuk melihat riwayat rekam medis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasien()"><i
																class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien
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
					<div class="card">
						<div class="card-header" id="headingTwo">
							<h2 class="mb-0">
								<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
										aria-controls="collapseTwo">
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
											<button type="button" onclick="tambahRequestRadiologi()" id="btn-tambah-item" class="btn btn-info"><i class="fas fa-plus-circle mr-1"></i>Tambah Item
												Pemeriksan
											</button>
											<button type="button" class="btn btn-success" id="btn-print-hasil" onclick="cetakHasilRadiologi()"><i class="fas fa-print mr-1"></i>Print Hasil Radiologi
											</button>

											<div id="hasil-pemeriksaan-radiologi"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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

<!-- Modal Hasil Radiologi -->
<div id="modal-hasil-radiologi" class="modal fade">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:70%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Hasil Pemeriksaan Radiologi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-hasil-radiologi role=form class=form-horizontal') ?>
				<input type="hidden" name="id_detail_radiologi" id="id-detail-radiologi">
				<input type="hidden" name="id_layanan" id="id-layanan-radiologi">

				<h5 class="center">Layanan : <b><span id="layanan-edit"></span></b></h5>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label">Dokter</label>
							<div class="col-lg-5">
								<input type="text" name="dokter" id="dokter-auto" class="select2-input">
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label">Radiografer</label>
							<div class="col-lg-5">
								<input type="text" name="radiografer" id="radiografer-auto" class="select2-input">
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label">Expertise</label>
							<div class="col-lg-10">
								<button type="button" class="btn btn-secondary btn-xs" id="btn-expertise-template" onclick="showExpertiseTemplate()"><i class="fas fa-bookmark mr-1"></i>Tempate
									Expertise
								</button>
								<button type="button" class="btn btn-secondary btn-xs" id="btn-simpan-expertise" onclick="konfirmasiSimpanExpertise()"><i class="fas fa-save mr-1"></i>Simpan Expertise
								</button>
								<div id="hasil-field"></div>
							</div>
						</div>
						<!-- <div class="form-group row tight">
							<label class="col-lg-2 col-form-label">Kesan</label>
							<div class="col-lg-10">
								<div id="kesan-field"></div>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label">Anjuran</label>
							<div class="col-lg-10">
								<div id="anjuran-field"></div>
							</div>
						</div> -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label">Expertise RIS</label>
							<div class="col-lg-10">
								<div class="box-well">
									<div id="bridging-expertise"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpanHasil()"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Hasil Radiologi -->

<!-- Modal Diagnosis PA Pasien-->
<div id="modal-pa-diagnosis" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="modal-pa-diagnosis-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-pa-diagnosis-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard-form-rad">
								<!-- Tab bwizard -->
								<ol>
									<li>Diagnosis</li>
								</ol>

								<!-- Data bwizard -->

								<!-- Form diagnosis -->
								<div class="form-pa-diagnosis">
									<div class="row">
										<div class="col-lg-12">
											<div class="col-lg-6">
												<table class="table table-sm table-detail table-striped" width="100%">
													<tr>
														<td width="150px"><b>Pasien</b></td>
														<td width="1px">:</td>
														<td><span id="identitas-pasien-diagnosis-rad"></span></td>
													</tr>
												</table>
											</div>
											<table class="table table-hover table-striped table-sm color-table info-table" id="table-pa-diagnosis">
												<thead class="thead-theme">
												<tr>
													<th>No</th>
													<th>Dokter</th>
													<th>Diagnosis</th>
													<th>Klinik</th>
													<th>Prioritas</th>
													<th>Diagnosis Banding</th>
													<th>Diagnosis Akhir</th>
													<th>Penyabab Kematian</th>
												</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- End Form diagnosis -->

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Diagnosis PA Pasien -->


<div id="modal-acc-number" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-acc-number-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
                    <div class="col-lg-12">
						<div class="form-group row tight">
							<h6 class="col-8" style="color: red; font-size:0.8vw;">* Harap Gunakan Fitur ini dengan Bijak dan hati - hati</h6>
						</div>
		            </div>
                </div>
				<?= form_open('', 'role=form class=form-horizontal id=form-acc-number'); ?>
				<input type="hidden" id="id-detail" name="id_detail">
				<input type="hidden" id="id-radio" name="id_radio">
				<div class="row">
                    <div class="col-lg-12">
						<div class="form-group row tight">
		                    <label for="id_ae" class="col-3 col-form-label">Accession Number</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="acc_number" id="acc-number" placeholder="Accession Number...">
		                    </div>
		                </div>
		            </div>
                </div>
				<?= form_close(); ?>
			</div>

			<div class="modal-footer">

                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanAccNumber()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
