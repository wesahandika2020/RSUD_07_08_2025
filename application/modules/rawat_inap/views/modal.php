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
				<div class="form-group row">
					<label class="col col-form-label">Dokter</label>
					<div class="col-9">
						<input type="text" name="dokter" id="dokter-search-ranap" class="select2-input" placeholder="Pilih Dokter...">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col col-form-label">Status Keluar</label>
					<div class="col-9">
						<?= form_dropdown('status_keluar', $status_keluar, array(), 'id=status-keluar-search class=form-control') ?>
					</div>
				</div>

				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListPemeriksaan(1)"><i class="fas fa-search mr-1"></i>Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pemeriksaan -->
<div id="modal-pemeriksaan" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="modal-pemeriksaan-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 100%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-pemeriksaan-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-pemeriksaan role=form class="form-horizontal form-custom"') ?>
				<!-- Input Hidden Form -->
				<input type="hidden" name="id_pasien" id="id-pasien">
				<input type="hidden" name="id_layanan" id="id-layanan">
				<input type="hidden" name="jenis_layanan" value="Rawat Inap" id="jenis-layanan">
				<input type="hidden" id="nama-pasien">
				<input type="hidden" id="tgl-lahir">
				<input type="hidden" id="tindaklanjut">

				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard-form">
								<!-- Tab bwizard -->
								<ol>
									<li>Data Pasien</li>
									<li>Pemeriksaan</li>
									<li>SOAP</li>
									<li>Diagnosis</li>
									<li>Tindakan</li>
									<li>BHP</li>
									<li>Laboratorium</li>
									<li>Radiologi</li>
									<li>Hemodialisis</li>
									<li>Makanan - Gizi</li>
									<li>Operasi</li>
									<li>VK</li>
									<li>Bank Darah</li>
									<li>BimRoh</li>
									<li>Bimbingan Talqin</li>
									<li>PKRT</li>
								</ol>

								<!-- Data bwizard -->
								<!-- Data Pasien -->
								<div class="form-info-pasien">
									<div class="row">
										<div class="col-lg-6">
											<table class="table table-sm table-hover table-detail table-striped">
												<tr>
													<td width="30%"><b>Nama</b></td>
													<td><span id="nama-detail"></span></td>
												</tr>
												<tr>
													<td><b>No. RM</b></td>
													<td><span id="no-rm-detail"></span></td>
												</tr>
												<tr>
													<td><b>No. Register</b></td>
													<td><span id="no-register-detail"></span></td>
												</tr>
												<tr>
													<td><b>Kelamin</b></td>
													<td><span id="kelamin-detail"></span></td>
												</tr>
												<tr>
													<td><b>Umur/Tgl. Lahir</b></td>
													<td><span id="umur-detail"></span></td>
												</tr>
												<tr>
													<td><b>Agama</b></td>
													<td><span id="agama-detail"></span></td>
												</tr>
												<tr>
													<td><b>No. Telepon</b></td>
													<td><span id="telp-detail"></span></td>
												</tr>
												<tr>
													<td><b>Alamat</b></td>
													<td><span id="alamat-detail"></span></td>
												</tr>
                                                <tr>
                                                    <td><b>Riwayat Rekam Medis <i>(Baru)</i></b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button>
                                                    </td>
                                                </tr>
												<tr>
													<td><b>Riwayat Rekam Medis</b></td>
													<td>
														<button type="button" title="Klik untuk melihat riwayat rekam medis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien
														</button>
													</td>
												</tr>
												<tr>
													<td><b>Riwayat Pasien SIMRS Lama</b></td>
													<td>
														<button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatPasienSimrsLama()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Pasien
															SIMRS Lama
														</button>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>&nbsp;</td>
												</tr>
												<tr id="bayi-sehat-area">
													<td><b>Ibu Bayi Sehat</b></td>
													<td>
														<span id="ibu-bayi-label"></span>
														<button type="button" title="Klik untuk mengubah akomodasi bayi menjadi sama dengan akomodasi ibunya" class="btn btn-secondary btn-xxs" onclick="editIbuBayi()"><i class="fas fa-edit m-r-5"></i>Edit Ibu Bayi
														</button>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>&nbsp;</td>
												</tr>
												<tr>
													<td><b>Alergi</b></td>
													<td><span id="alergi-detail"></span></td>
												</tr>
												<tr id="subspesialis-row">
													<td><b>Sub Spesialis</b></td>
													<td><?= form_dropdown('subspesialis', array(), array(), 'id=subspesialis class="custom-form validasi-input col-lg-6"') ?></td>
												</tr>
											</table>
										</div>
										<div class="col-lg-6">
											<table class="table table-sm table-hover table-detail table-striped">
												<tr>
													<td width="40%"><b>Instansi Perujuk</b></td>
													<td><span id="instansi-detail"></span></td>
												</tr>
												<tr>
													<td><b>Tenaga Medis Perujuk</b></td>
													<td><span id="nadis-detail"></span></td>
												</tr>
												<tr>
													<td></td>
													<td>&nbsp;</td>
												</tr>
												<tr>
													<td><b>Nama P. Jawab</b></td>
													<td><span id="nama-pjwb-detail"></span></td>
												</tr>
												<tr>
													<td><b>Alamat P. Jawab</b></td>
													<td><span id="alamat-pjwb-detail"></span></td>
												</tr>
												<tr>
													<td><b>Telp P. Jawab</b></td>
													<td><span id="telp-pjwb-detail"></span></td>
												</tr>
												<tr>
													<td></td>
													<td>&nbsp;</td>
												</tr>
												<tr>
													<td><b>Nama P. Jawab Keuangan</b></td>
													<td><span id="nama-pjwb-keuangan-detail"></span></td>
												</tr>
												<tr>
													<td><b>Alamat P. Jawab Keuangan</b></td>
													<td><span id="alamat-pjwb-keuangan-detail"></span></td>
												</tr>
												<tr>
													<td><b>Telp P. Jawab Keuangan</b></td>
													<td><span id="telp-pjwb-keuangan-detail"></span></td>
												</tr>
											</table>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-6">
											<h5><b>Data Layanan Pendaftaran</b></h5>
											<input type="hidden" name="id_dokter_detail" id="id-dokter-detail">
											<table class="table table-striped table-hover table-sm table-detail">
												<tr>
													<td width="20%"><b>Bangsal</b></td>
													<td><span id="layanan-detail"></span> (Rawat Inap)</td>
												</tr>
												<?php if ($this->session->userdata('account_group') === 'Admin' || $this->session->userdata('account_group') === 'Admin Rawat Inap' || $this->session->userdata('account_group') === 'Rawat Inap' ||  $this->session->userdata('account_group') === 'Kepala Instalasi Rawat Inap') : ?>
													<tr>
														<td><b></b></td>
														<!-- <td>
															<button type="button" class="btn btn-secondary btn-xs"
																	title="Tombol edit bed digunakan bila petugas salah memilih bed saat konfirmasi order rawat inap pasien" onclick="formEditBed()"><i
																		class="fas fa-edit mr-1"></i>Edit Bed
															</button>
														</td> -->
														<td id="btn-edit-bed"></td>
													</tr>
												<?php endif ?>
												<tr>
													<td><b>Waktu Rawat</b></td>
													<td><span id="waktu-rawat-detail"></span></td>
												</tr>
												<?php if ($this->session->userdata('account_group') === 'Admin') : ?>
													<tr class="tombol-waktu-rawap">
														<td><b></b></td>
														<td>
															<button type="button" class="btn btn-secondary btn-xs" title="Tombol edit waktu rawat digunakan untuk mengubah waktu masuk dan waktu keluar pasien di rawat inap. Tombol ini berfungsi jika pasien masi dirawat / belum pulang" onclick="formWaktuRanap()"><i class="fa fa-edit mr-1"></i>Edit Waktu Rawat
															</button>
														</td>
													</tr>
												<?php endif ?>
												<tr>
													<td><b>Dokter</b></td>
													<td><span id="dokter-detail"></span></td>
												</tr>
												<tr>
													<td><b>Cara Bayar</b></td>
													<td><span id="cara-bayar-detail"></span></td>
												</tr>
												<tr>
													<td><b>No. Polish</b></td>
													<td><span id="no-polish-detail"></span></td>
												</tr>
												<tr>
													<td><b>No. SEP</b></td>
													<td><span id="no-sep-detail"></span></td>
												</tr>
												<tr>
													<td><b>Kelas Rawat (BPJS)</b></td>
													<td><span id="kelas-rawat-pasien"></span></td>
												</tr>
												<tr>
													<td><b>Hak Kelas Pasien</b></td>
													<td><span id="hak-kelas-pasien"></span></td>
												</tr>
											</table>
										</div>
										<div class="col-lg-6">
											<div class="row mb-3">
												<div class="col-lg-2 logo-pasien-alergi">
													<!-- logo pasien alergi -->
													<img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="logo-pasien-alergi" class="img-thumbnail rounded">
												</div>
												<div class="col-lg-2 logo-pasien-meninggal">
													<!-- logo pasien meninggal -->
													<img src="<?= resource_url() ?>images/diagnosa/died.jpg" alt="logo-pasien-meninggal" class="img-thumbnail rounded">
												</div>
												<div class="col-lg-2 logo-pasien-hiv-aids">
													<!-- logo pasien hiv-aids -->
													<img src="<?= resource_url() ?>images/diagnosa/hiv-aids.jpg" alt="logo-pasien-hiv-aids" class="img-thumbnail rounded">
												</div>
												<div class="col-lg-2 logo-pasien-gonorrhea">
													<!-- logo pasien gonorrhea -->
													<img src="<?= resource_url() ?>images/diagnosa/gonorrhea.jpg" alt="logo-pasien-gonorrhea" class="img-thumbnail rounded">
												</div>
												<div class="col-lg-2 logo-pasien-hepatitis">
													<!-- logo pasien hepatitis -->
													<img src="<?= resource_url() ?>images/diagnosa/hepatitis.jpg" alt="logo-pasien-hepatitis" class="img-thumbnail rounded">
												</div>
												<div class="col-lg-2 logo-pasien-kusta-lepra">
													<!-- logo pasien kusta-lepra -->
													<img src="<?= resource_url() ?>images/diagnosa/kusta-lepra.jpg" alt="logo-pasien-kusta-lepra" class="img-thumbnail rounded">
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-lg-2 logo-pasien-tbc-kp">
													<!-- logo pasien tbc-kp -->
													<img src="<?= resource_url() ?>images/diagnosa/tbc-kp.jpg" alt="logo-pasien-tbc-kp" class="img-thumbnail rounded">
												</div>
												<div class="col-lg-2 logo-pasien-pejabat">
													<!-- logo pasien-pejabat -->
													<img src="<?= resource_url() ?>images/diagnosa/pasien-pejabat.jpg" alt="logo-pasien-pejabat" class="img-thumbnail rounded">
												</div>
												<div class="col-lg-2 logo-pasien-pemilik-rs">
													<!-- logo pasien-pemilik-rs -->
													<img src="<?= resource_url() ?>images/diagnosa/pasien-pemilik-rs.jpg" alt="logo-pasien-pemilik-rs" class="img-thumbnail rounded">
												</div>
												<div class="col-lg-2 logo-pasien-potensi-komplain">
													<!-- logo pasien-potensi-komplain -->
													<img src="<?= resource_url() ?>images/diagnosa/pasien-potensi-komplain.jpg" alt="logo-pasien-potensi-komplain" class="img-thumbnail rounded">
												</div>
											</div>
											<h5><b>Cetak Dokumen</b></h5>
											<input type="hidden" name="id_pendaftaran_pasien" id="id-pendaftaran-pasien">
											<table class="table table-striped table-hover table-sm table-detail">
												<tr>
													<td width="85%">Formulir Tata Tertib Rawat Inap</td>
													<td class="right">
														<button type="button" class="btn btn-secondary btn-xs" onclick="formTataTertibRawatInap()"><i class="fas fa-print m-r-5"></i>Print</button>
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<!-- End Data Pasien -->

								<!-- Form Anamnesa  -->
								<div class="form-anamnesa">
									<div class="row">
										<div class="col-lg-12">
											<table class="table table-sm table-detail table-striped" width="100%">
												<tr>
													<td width="150px"><b>Pasien</b></td>
													<td width="1px">:</td>
													<td><span id="identitas-pasien-anamnesa"></span></td>
												</tr>
												<tr>
													<td>Dokter</td>
													<td>:</td>
													<td><input type="text" name="dokter" id="dokter" class="select2c-input"></td>
												</tr>
												<tr>
													<td>Dokter Pengganti</td>
													<td>:</td>
													<td><input type="text" name="dokter_pengganti" id="dokter-pengganti" class="select2c-input"></td>
												</tr>
											</table>
											<br>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<div class="form-group tight">
																<label>Tensi Sistolik</label>
																<div class="input-group tensi-s">
																	<input type="text" name="tensi_sistolik" id="tensi-sistolik" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
																	<div class="input-group-append">
																		<span class="input-group-custom">mmHg</span>
																	</div>
																</div>
															</div>
															<div class="form-group tight">
																<label>Tensi Diastolik</label>
																<div class="input-group tensi-d">
																	<input type="text" name="tensi_diastolik" id="tensi-diastolik" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
																	<div class="input-group-append">
																		<span class="input-group-custom">mmHg</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="form-group tight">
																<label>Suhu</label>
																<div class="input-group suhu">
																	<input type="text" name="suhu" id="suhu" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
																	<div class="input-group-append">
																		<span class="input-group-custom">&#8451;</span>
																	</div>
																</div>
															</div>
															<div class="form-group tight">
																<label>Nadi</label>
																<div class="input-group nadi">
																	<input type="text" name="nadi" id="nadi" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
																	<div class="input-group-append">
																		<span class="input-group-custom">/Mnt</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="form-group tight">
																<label>Respirasi</label>
																<div class="input-group respirasi">
																	<input type="text" name="rr" id="rr" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
																	<div class="input-group-append">
																		<span class="input-group-custom">/Mnt</span>
																	</div>
																</div>
															</div>
															<div class="form-group tight">
																<label>Saturasi Oksigen</label>
																<div class="input-group nafas">
																	<input type="text" name="nps" id="nps" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
																	<div class="input-group-append">
																		<span class="input-group-custom">/Mnt</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group tight">
														<label>Keluhan Utama</label>
														<textarea name="keluhan_utama" id="keluhan-utama" class="form-control visitasi-input" rows="4"></textarea>
													</div>
													<button type="button" class="btn btn-info" onclick="addVisitasi()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Pemeriksaan</button>
													<button type="button" class="btn btn-success" onclick="showVitalSign()"><i class="fas fa-chart-bar mr-1"></i>Tampilkan Grafik Tanda Vital</button>
													<button type="button" class="btn btn-warning" onclick="printVitalSign()" ><i class="fas fa-fw fa-print mr-1"></i>Print</button>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<div class="form-group tight">
																<label>Tinggi Badan</label>
																<div class="input-group">
																	<input type="text" name="tinggi_badan" id="tinggi-badan" class="custom-form visitasi-input">
																	<div class="input-group-append">
																		<span class="input-group-custom">cm</span>
																	</div>
																</div>
															</div>
															<div class="form-group tight">
																<label>Berat Badan</label>
																<div class="input-group">
																	<input type="text" name="berat_badan" id="berat-badan" class="custom-form visitasi-input">
																	<div class="input-group-append">
																		<span class="input-group-custom">Kg</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="form-group tight">
																<label>Urine</label>
																<div class="input-group">
																	<input type="text" name="urine" id="urine" class="custom-form visitasi-input">
																	<div class="input-group-append">
																		<span class="input-group-custom">CC</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group tight">
														<label>Alergi</label>
														<textarea type="text" name="alergi" id="alergi" class="form-control visitasi-input" rows="4"></textarea>
													</div>
												</div>
											</div>
											<div class="row mt-3">
												<div class="col-lg-12">
													<table class="table table-hover table-striped table-sm color-table info-table" style="margin-bottom: 0;">
														<thead class="thead-theme">
															<tr>
																<th width="5%" class="center">No.</th>
																<th width="10%" class="center">Waktu</th>
																<th width="10%" class="center">Tensi</th>
																<th width="7%" class="center">Nadi</th>
																<th width="7%" class="center">Suhu</th>
																<th width="7%" class="center">Nafas</th>
																<th width="7%" class="center">Repirasi</th>
																<th width="8%" class="center">Urine</th>
																<th width="17%" class="left">Keluhan Utama</th>
																<th width="17%" class="left">Alergi</th>
																<th width="5%"></th>
															</tr>
														</thead>
													</table>
													<div id="visitasi-scroll" style="max-height: 200px; overflow-y: auto;">
														<table width="100%" class="table table-striped table-hover table-sm" cellpadding="0" cellspacing="0" id="table-visitasi">
															<tbody></tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Form Anamnesa -->

								<!-- Form SOAP -->
								<div class="form-soap">
									<div class="row">
										<div class="col-lg-12">
											<h5 class="center"><b>S.O.A.P</b></h5>
											<hr>
											<div class="row">
												<div class="col-lg-12">
													<table class="table table-sm table-detail table-striped" width="100%">
														<tr>
															<td width="150px"><b>Pasien</b></td>
															<td width="1px">:</td>
															<td><span id="identitas-pasien-soap"></span></td>
														</tr>
													</table>
													<div class="form-group row tight">
														<label class="col-lg-2 col-form-label-custom right"><b>SUBJECTIVE</b>
															<br><small class="text-muted"><i>Statement about relevant patient behavior or status</i></small></label>
														<div class="col-lg-9">
															<textarea id="s-soap" class="custom-textarea soap-input" rows="4"></textarea>
														</div>
													</div>
													<div class="form-group row tight">
														<label class="col-lg-2 col-form-label-custom right"><b>OBJECTIVE</b>
															<br><small class="text-muted"><i>Measurable, quantifiable, and observable data</i></small></label>
														<div class="col-lg-9">
															<textarea id="o-soap" class="custom-textarea soap-input" rows="4"></textarea>
														</div>
													</div>
													<div class="form-group row tight">
														<label class="col-lg-2 col-form-label-custom right"><b>ASSESSMENT</b>
															<br><small class="text-muted"><i>Interpret the meaning of "S" and "O"</i></small></label>
														<div class="col-lg-9">
															<textarea id="a-soap" class="custom-textarea soap-input" rows="4"></textarea>
														</div>
													</div>
													<div class="form-group row tight">
														<label class="col-lg-2 col-form-label-custom right"><b>PLAN</b>
															<br><small class="text-muted"><i>Anticipated frequency and duration, course of the treatment for next session, recommendations and any
																	changes</i></small></label>
														<div class="col-lg-9">
															<textarea id="p-soap" class="custom-textarea soap-input" rows="4"></textarea>
														</div>
													</div>
													<div class="form-group row tight">
														<label class="col-lg-2 col-form-label-custom right"><b></b></label>
														<div class="col-lg-9">
															<button type="button" title="tambah soap" class="btn btn-info" onclick="addSOAP()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah S.O.A.P</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-lg-12">
											<table class="table table-hover table-striped table-sm color-table info-table" style="margin-bottom: 0;">
												<thead class="thead-theme">
													<tr>
														<th width="5%" class="center">No.</th>
														<th width="10%">Waktu</th>
														<th width="10%">Dokter</th>
														<th width="12%">Subjective</th>
														<th width="12%">Objective</th>
														<th width="12%">Assessment</th>
														<th width="12%">Plan</th>
														<th width="5%"></th>
													</tr>
												</thead>
											</table>
											<div id="soap-scroll" style="max-height: 200px; overflow-y: auto;">
												<table width="100%" class="table table-striped table-hover table-sm" cellpadding="0" cellspacing="0" id="table-soap">
													<tbody></tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- End Form SOAP -->

								<!-- Form Diagnosa -->
								<div class="form-diagnosa">
									<div class="row">
										<div class="col-lg-12">
											<div class="col-lg-6">
												<table class="table table-sm table-detail table-striped" width="100%">
													<tr>
														<td width="150px"><b>Pasien</b></td>
														<td width="1px">:</td>
														<td><span id="identitas-pasien-diagnosa"></span></td>
													</tr>
												</table>
												<div class="form-group row tight">
													<label for="dokter-diagnosa" class="col-lg-4 col-form-label">Dokter</label>
													<div class="col-lg-8">
														<input type="text" name="dokter_diagnosa" class="select2c-input" id="dokter-diagnosa">
													</div>
												</div>
												<div class="form-group row tight">
													<label for="diagnosa-manual" class="col-lg-4 col-form-label"></label>
													<div class="col-lg-8">
														<div class="form-check">
															<input type="checkbox" name="diagnosa_manual" class="form-check-input" id="diagnosa-manual">
															<label class="form-check-label" for="diagnosa-manual">Diagnosis Manual</label>
														</div>
														<!--    <div class="custom-control custom-checkbox m-t-5">
																<input type="checkbox" name="diagnosa_manual" class="custom-control-input" id="diagnosa-manual">
																<label class="custom-control-label" for="diagnosa-manual">Diagnosa Manual</label>
															</div> -->
													</div>
												</div>
												<div class="form-group row tight golongan-sebab-sakit">
													<label for="golongan-sebab-sakit" class="col-lg-4 col-form-label-custom">Diagnosis</label>
													<div class="col-lg-8">
														<input type="text" name="golongan_sebab_sakit" id="golongan-sebab-sakit" class="select2c-input">
													</div>
												</div>
												<div class="form-group row tight golongan-sebab-sakit-lain">
													<label for="golongan-sebab-sakit-lain" class="col-lg-4 col-form-label-custom">Diagnosis</label>
													<div class="col-lg-8">
														<input type="text" name="golongan_sebab_sakit_lain" id="golongan-sebab-sakit-lain" class="custom-form validasi-input">
													</div>
												</div>
												<!-- <div class="form-group row tight">
													<label for="diagnosa-klinik" class="col-lg-4 col-form-label-custom">Diagnosis Klinis</label>
													<div class="col-lg-8">
														<div class="form-check">
															<input type="checkbox" name="diagnosa_klinik" class="form-check-input" id="diagnosa-klinik">
															<label class="form-check-label" for="diagnosa-klinik">Ya</label>
														</div>
														<div class="custom-control custom-checkbox">
															<input type="checkbox" name="diagnosa_klinik" class="custom-control-input" id="diagnosa-klinik">
															<label class="custom-control-label" for="diagnosa-klinik">Ya</label>
														</div>
													</div>
												</div> -->
												<!-- <div class="form-group row tight">
                                                    <label for="prioritas" class="col-lg-4 col-form-label-custom">Prioritas</label>
                                                    <div class="col-lg-4">
                                                        <?= form_dropdown('prioritas', array('Utama' => 'Utama', 'Sekunder' => 'Sekunder'), array(), 'id=prioritas class=custom-form') ?>
                                                    </div>
                                                </div> -->
												<div class="form-group row tight">
													<label for="jenis_kasus" class="col-lg-4 col-form-label-custom">Jenis Kasus</label>
													<div class="col-lg-4">
														<?= form_dropdown('jenis_kasus', array('' => 'Pilih', '1' => 'Baru', '0' => 'Lama'), array(), 'id=jenis_kasus class=custom-form') ?>
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 col-form-label-custom"></label>
													<div class="col-lg-8">
														<a href="#" class="copy btn btn-primary btn-xxs" id="btn-tambah-diagnosa-banding" rel=".diagnosa-banding"><i class="fas fa-plus-circle mr-2"></i>Tambah Diagnosis Banding</a>
													</div>
												</div>
												<div class="form-group row tight diagnosa-banding">
													<label for="diagnosa-banding" class="col-lg-4 col-form-label-custom">Diagnosis Banding</label>
													<div class="col-lg-7">
														<input type="text" name="diagnosa_banding[]" id="diagnosa-banding" class="custom-form validasi-input">
													</div>
												</div>
												<div class="form-group row tight">
													<label for="diagnosa-akhir" class="col-lg-4 col-form-label-custom">Diagnosis Akhir</label>
													<div class="col-lg-8">
														<div class="form-check">
															<input type="checkbox" name="diagnosa_akhir" class="form-check-input" id="diagnosa-akhir">
															<label class="form-check-label" for="diagnosa-akhir">Ya</label>
														</div>
														<!-- <div class="custom-control custom-checkbox">
															<input type="checkbox" name="diagnosa_akhir" class="custom-control-input" id="diagnosa-akhir">
															<label class="custom-control-label" for="diagnosa-akhir">Ya</label>
														</div> -->
													</div>
												</div>
												<div class="form-group row tight">
													<label for="penyebab-kemation" class="col-lg-4 col-form-label-custom">Penyebab Kematian</label>
													<div class="col-lg-8">
														<div class="form-check">
															<input type="checkbox" name="penyebab_kematian" class="form-check-input" id="penyebab-kematian">
															<label class="form-check-label" for="penyebab-kematian">Ya</label>
														</div>
														<!-- <div class="custom-control custom-checkbox">
															<input type="checkbox" name="penyebab_kematian" class="custom-control-input" id="penyebab-kematian">
															<label class="custom-control-label" for="penyebab-kematian">Ya</label>
														</div> -->
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 col-form-label-custom"></label>
													<div class="col-lg-8">
														<button type="button" title="tambah diagnosa" onclick="addDiagnosaRanap()" class="btn btn-info"><i class="fas fa-arrow-circle-down mr-2"></i>Tambah Diagnosis</button>
													</div>
												</div>
											</div>
											<table class="table table-hover table-striped table-sm color-table info-table" id="table-diagnosa">
												<thead class="thead-theme">
													<tr>
														<th class="center">No</th>
														<th>Waktu</th>
														<th>Dokter</th>
														<!-- <th>Manual</th> -->
														<th>Diagnosis</th>
														<th>Klinik</th>
														<th class="center">Prioritas</th>
														<th class="center">Jenis Kasus</th>
														<th>Diagnosis Banding</th>
														<th>Diagnosis Akhir</th>
														<th>Penyabab Kematian</th>
														<th></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<!-- Diagnosa Ruang Lain -->
											<div id="diagnosa-ruang-lain">
												<br>
												<strong><i>Diagnosa Ruang Lain</i></strong>
												<table class="table table-hover table-striped table-sm color-table" id="table-diagnosa-ruang-lain">
													<thead class="thead-theme" style="background-color: grey">
														<tr>
															<th class="center"><i>No</i></th>
															<th><i>Waktu</i></th>
															<th><i>Dokter</i></th>
															<!-- <th>Manual</th> -->
															<th><i>Diagnosis</i></th>
															<th><i>Klinik</i></th>
															<th class="center"><i>Prioritas</i></th>
															<th class="center"><i>Jenis Kasus</i></th>
															<th><i>Diagnosis Banding</i></th>
															<th><i>Diagnosis Akhir</i></th>
															<th><i>Penyabab Kematian</i></th>
															<th></th>
														</tr>
													</thead>
													<tbody></tbody>
												</table>
											</div>
											<!-- End dignosa ruang lain -->
										</div>
									</div>
								</div>
								<!-- End Form Diagnosa -->

								<!-- Form Tindakan -->
								<div class="form-tindakan">
									<input type="hidden" name="tarif_tindakan" id="tarif-tindakan">
									<input type="hidden" name="id_penjamin" id="id-penjamin-tindakan">
									<div class="row">
										<div class="col-lg-6">
											<table class="table table-sm table-detail table-striped" width="100%">
												<tr>
													<td width="150px"><b>Pasien</b></td>
													<td width="1px">:</td>
													<td><span id="identitas-pasien-tindakan"></span></td>
												</tr>
											</table>
											<div class="form-group row tight">
												<label for="profesi" class="col-lg-4 col-form-label-custom">Profesi</label>
												<div class="col-lg-4">
													<?= form_dropdown('profesi', $profesi, array(), 'id=profesi class=custom-form') ?>
												</div>
											</div>
											<div class="form-group row tight">
												<label for="operator" class="col-lg-4 col-form-label-custom">Operator</label>
												<div class="col-lg-4">
													<input type="text" name="operator" class="select2c-input" id="operator">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="tindakan" class="col-lg-4 col-form-label-custom">Tindakan</label>
												<div class="col-lg-4">
													<input type="text" name="tindakan" class="select2c-input" id="tindakan">
												</div>
											</div>
                                            <div class="form-group row tight">
                                                <label for="tindakan-icd9" class="col-lg-4 col-form-label-custom">ICD-9 CM</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="tindakan_icd9" class="select2c-input" id="tindakan-icd9">
                                                </div>
                                            </div>
											<div class="form-group row tight">
												<label for="jumlah-tindakan" class="col-lg-4 col-form-label-custom">Jumlah</label>
												<div class="col-lg-1">
													<input type="text" name="jumlah_tindakan" class="custom-form" style="text-align: center" value="1" onkeypress="return hanyaAngka(this)" id="jumlah-tindakan">
												</div>
											</div>
											<div class="form-group row tight">
												<label class="col-lg-4 col-form-label-custom"></label>
												<div class="col-lg-8">
													<button type="button" title="Tambah Tindakan" class="btn btn-info" onclick="addTindakan()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah
														Tindakan
													</button>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<input type="hidden" name="jenis_rawat" id="jenis-rawat">
											<input type="hidden" name="id_unit" id="unit">
											<input type="hidden" name="kelas" id="kelas-tindakan">
											<!-- <div class="form-group row tight">
                                                <label class="col-lg-4 col-form-label-custom">Jenis Rawat</label>
                                                <div class="col-lg-4">
                                                   <?= form_dropdown('jenis_rawat', $jenis_rawat, array(), 'class="custom-form " id=jenis-rawat') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="unit" class="col-lg-4 col-form-label-custom">Instalasi</label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="id_unit" class="select2c-input" id="unit">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="kelas-tindakan" class="col-lg-4 col-form-label-custom">Kelas</label>
                                                <div class="col-lg-4">
                                                    <?= form_dropdown('kelas', $kelas, array(), 'id=kelas-tindakan class=custom-form') ?>
                                                </div>
                                            </div> -->
										</div>
										<table class="table table-hover table-striped table-sm color-table info-table" id="table-tindakan">
											<thead class="thead-theme">
												<tr>
													<th class="center">No</th>
													<th class="center">Waktu</th>
													<th>Nama Operator</th>
													<th>Tindakan</th>
                                                    <th>ICD-9 CM</th>
													<th class="center">Jumlah</th>
													<th>Tarif</th>
													<th>Petugas</th>
													<th></th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
									</div>
								</div>
								<!-- End Tindakan -->

								<!-- Form BHP -->
								<div class="form-bhp">
									<input type="hidden" name="harga_jual" id="harga-jual-bhp">
									<input type="hidden" id="nama-kemasan-bhp">
									<input type="hidden" id="sisa-bhp">
									<input type="hidden" name="id_penjamin_bhp" id="id-penjamin-bhp">
									<div class="row">
										<div class="col-lg-6">
											<table class="table table-sm table-detail table-striped" width="100%">
												<tr>
													<td width="150px"><b>Pasien</b></td>
													<td width="1px">:</td>
													<td><span id="identitas-pasien-bhp"></span></td>
												</tr>
											</table>
											<div class="form-group row tight">
												<label for="barang-bhp" class="col-lg-2 col-form-label-custom">Barang</label>
												<div class="col-lg-6">
													<input type="text" name="barang" class="select2c-input" id="barang-bhp">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="kemasan-bhp" class="col-lg-2 col-form-label-custom">Kemasan</label>
												<div class="col-lg-5">
													<?= form_dropdown('kemasan', array('' => 'Pilih'), array(''), 'id=kemasan-bhp class=custom-form') ?>
												</div>
											</div>
											<div class="form-group row tight">
												<label for="jumlah-bhp" class="col-lg-2 col-form-label-custom">Jumlah</label>
												<div class="col-lg-1">
													<input type="text" name="jumlah_bhp" class="custom-form" style="text-align: center" value="1" onkeypress="return hanyaAngka(this)" id="jumlah-bhp">
												</div>
											</div>
											<div class="form-group row tight">
												<label class="col-lg-2 col-form-label-custom"></label>
												<div class="col-lg-6">
													<button type="button" title="tambah bhp" class="btn btn-info" onclick="addBHP(); return false;"><span class="fas fa-arrow-circle-down mr-1"></span>Tambah BHP</button>
												</div>
											</div>
										</div>
										<input type="hidden" name="total_bhp" id="bhp">
										<table class="table table-hover table-striped table-sm color-table info-table" id="table-bhp">
											<thead class="thead-theme">
												<tr>
													<th width="5%">No.</th>
													<th width="40%" class="left">Nama Barang</th>
													<th width="10%" class="left">Unit Kemasan</th>
													<th width="15%" class="right">Harga Jual</th>
													<th width="10%" class="center">Jumlah</th>
													<!--<th width="10%" class="center">Sisa</th>-->
													<th width="15%" class="right">Total</th>
													<th width="5%"></th>
												</tr>
											</thead>
											<tbody></tbody>
											<tfoot>
												<tr>
													<td class="right" colspan="5">TOTAL</td>
													<td class="right" id="bhp-label"></td>
													<td></td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<!-- End Form BHP -->

								<!-- Laboratorium -->
								<div class="form-laboratorium">
									<button type="button" title="order pemeriksaan lab" class="btn btn-info waves-effect" onclick="request_lab()"><i class="fa fa-plus"></i> Order Pemeriksaan Laboratorium</button>
									<br /><br />
									<div class="row" id="req_lab"></div>
								</div>
								<!-- Laboratorium -->

								<!-- Radiologi -->
								<div class="form-radiologi">
									<button type="button" title="order pemeriksaan rad" class="btn btn-info waves-effect" onclick="request_rad()"><i class="fa fa-plus"></i> Order Pemeriksaan Radiologi</button>
									<br /><br />
									<div class="row" id="req_rad"></div>
								</div>
								<!-- Radiologi -->

								<!-- Hemodialisis -->
								<div class="form-hemodial-ranap">
									<div class="row">
										<div class="col-lg-12">
											<input type="hidden" name="id_dftr_hemodialisis" id="id-dftr-hemodialisis">
											<input type="hidden" name="hemodialisis_dokter" id="dokter-hemodialisis">
											<input type="hidden" name="cara_bayar_hemodialisis" id="cara-bayar-hemodialisis">
											<input type="hidden" name="id_penjamin_hemodialisis" id="id-penjamin-hemodialisis">
											<input type="hidden" name="no_polish_hemodialisis" id="no-polish-hemodialisis">
											<input type="hidden" name="no_sep_hemodialisis" id="no-sep-hemodialisis">
											<button type="button" title="tambah order hd" class="btn btn-info waves-effect" onclick="addHemodialisisRanap()"><i class="fas fa-plus-circle mr-1"></i>Tambah Order Hemodialisis
											</button>
											<table class="table table-hover table-striped table-sm color-table info-table mt-1" id="table-order-hemodialisis">
												<thead>
													<tr>
														<th width="1%" class="center">No.</th>
														<th width="5%" class="left">Waktu Order</th>
														<th width="5%" class="center">Order</th>
														<th width="5%" class="center">Status</th>
														<th width="5%" class="center"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- End Hemodialisis -->

								<!-- DPMP -->
								<div class="form-dpmp-ranap">
									<div class="row">
										<div class="col-lg-12">
											<input type="hidden" name="id_dftr_dpmp" id="id-dftr-dpmp">
											<button type="button" class="btn btn-info waves-effect" onclick="addDPMPRanap()"><i class="fas fa-plus-circle mr-1"></i>Tambah Order DPMP</button>
											<table class="table table-hover table-striped table-sm color-table info-table mt-1" id="table-order-dpmp">
												<thead>
													<tr>
														<th width="1%" class="center">No.</th>
														<th width="5%" class="left">Waktu Order</th>
														<th width="5%" class="center">Order</th>
														<th width="5%" class="center">Status</th>
														<th width="5%" class="center"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- End DPMP -->

								<!-- Operasi -->
								<div class="form-operasi">
									<input type="hidden" name="id_jadwal_kamar_operasi" id="id-jadwal-kamar-operasi">
									<input type="hidden" name="tarif_operasi" id="tarif-operasi">
									<table class="table table-sm table-detail table-striped" width="100%">
										<tr>
											<td width="150px"><b>Pasien</b></td>
											<td width="1px">:</td>
											<td><span id="identitas-pasien-bhp"></span></td>
										</tr>
									</table>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row tight">
												<label for="tindakan-operasi" class="col-md-3 col-form-label-custom right">Nama Operasi</label>
												<div class="col-md-9">
													<input type="text" name="tindakan_operasi" class="select2c-input" id="tindakan-operasi" placeholder="Pilih Tindakan Operasi">
												</div>
											</div>
											<div class="form-group row tight">
                                                <label for="tindakan-icd9-ok" class="col-lg-3 col-form-label-custom right">ICD-9 CM</label>
                                                <div class="col-lg-5">
                                                    <input type="text" name="tindakan_icd9_ok" class="select2c-input" id="tindakan-icd9-ok">
                                                </div>
                                            </div>
											<div class="form-group row tight">
												<label for="timing-operasi" class="col-md-3 col-form-label-custom right">Timing Operasi</label>
												<div class="col-md-5">
													<?= form_dropdown('timing_operasi', ['Terjadwal' => 'Terjadwal', 'Emergency' => 'Cito'], 'Terjadwal', 'id=timing-operasi class=custom-form') ?>
												</div>
											</div>
											<div class="form-group row tight">
												<label for="" class="col-md-3 col-form-label-custom right"></label>
												<div class="col-md-9">
													<button type="button" title="order operasi" class="btn btn-info" onclick="addOrderOperasi()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Tindakan Operasi</button>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<table class="table table-hover table-striped table-sm color-table info-table" id="table-order-operasi">
												<thead>
													<tr>
														<th width="5%" class="center">No.</th>
														<th width="30%" class="left">Tindakan Operasi</th>
														<th width="30%" class="left">ICD-9 CM</th>
														<th width="7%" class="left">Bobot</th>
														<th width="7%" class="left">Timing</th>
														<th width="7%" class="right">Tarif</th>
														<th width="7%" class="center">Status</th>
														<th width="7%"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Operasi -->

								<!-- VK (Verlos Kamer) -->
								<div class="form-vk">
									<div class="row">
										<div class="col-md-12">
											<button type="button" title="order vk" class="btn btn-info waves-effect" onclick="addOrderVK()"><i class="fas fa-plus-circle mr-1"></i>Tambah Order VK</button>
											<table class="table table-hover table-striped table-sm color-table info-table mt-1" id="table-order-vk">
												<thead>
													<tr>
														<th width="5%" class="center">No.</th>
														<th width="15%" class="left">Waktu Order</th>
														<th width="55%" class="left">Ruangan</th>
														<th width="20%" class="center">Status</th>
														<th width="5%"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- End VK (Verlos Kamer) -->

								<!-- Bank Darah -->
								<div class="form-bank-darah">
									<div class="row">
										<div class="col-md-12">
											<input type="hidden" name="harga_jual" id="harga-jual-darah">
											<input type="hidden" id="nama-kemasan-darah">
											<input type="hidden" id="sisa-darah">
											<input type="hidden" name="id_penjamin_darah" id="id-penjamin-darah">
											<div class="row">
												<div class="col-lg-6">
													<table class="table table-sm table-detail table-striped" width="100%">
														<tr>
															<td width="150px"><b>Pasien</b></td>
															<td width="1px">:</td>
															<td><span id="identitas-pasien-darah"></span></td>
														</tr>
													</table>
													<div class="form-group row tight">
														<label for="barang-darah" class="col-lg-2 col-form-label-custom">Barang</label>
														<div class="col-lg-6">
															<input type="text" name="barang" class="select2c-input" id="barang-darah">
														</div>
													</div>
													<div class="form-group row tight">
														<label for="kemasan-darah" class="col-lg-2 col-form-label-custom">Kemasan</label>
														<div class="col-lg-5">
															<?= form_dropdown('kemasan', array('' => 'Pilih'), array(''), 'id=kemasan-darah class=custom-form') ?>
														</div>
													</div>
													<div class="form-group row tight">
														<label for="jumlah-darah" class="col-lg-2 col-form-label-custom">Jumlah</label>
														<div class="col-lg-1">
															<input type="text" name="jumlah_darah" class="custom-form" style="text-align: center" value="1" onkeypress="return hanyaAngka(this)" id="jumlah-darah">
														</div>
													</div>
													<div class="form-group row tight">
														<label class="col-lg-2 col-form-label-custom"></label>
														<div class="col-lg-6">
															<button type="button" title="permintaan darah" class="btn btn-info" onclick="addDarah(); return false;"><span class="fas fa-arrow-circle-down mr-1"></span>Tambah
																Permintaan Darah
															</button>
														</div>
													</div>
												</div>
											</div>
											<input type="hidden" name="total_darah" id="darah">
											<table class="table table-hover table-striped table-sm color-table info-table" id="table-darah">
												<thead class="thead-theme">
													<tr>
														<th width="5%">No.</th>
														<th width="30%" class="left">Nama Barang</th>
														<th width="10%" class="left">Unit Kemasan</th>
														<th width="15%" class="right">Harga Jual</th>
														<th width="10%" class="center">Jumlah</th>
														<!--<th width="10%" class="center">Sisa</th>-->
														<th width="15%" class="right">Total</th>
														<th width="15%" class="center">Status</th>
														<th width="5%"></th>
													</tr>
												</thead>
												<tbody></tbody>
												<tfoot>
													<tr>
														<td class="right" colspan="5"><b>TOTAL</b></td>
														<td class="right" id="darah-label"></td>
														<td></td>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
								<!-- End Bank Darah -->
								<!-- Bimbingan Rohani -->
								<div class="form-bimroh">
									<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
									<table class="table table-sm table-detail table-striped" width="100%">
										<tr>
											<td width="150px"><b>Pasien</b></td>
											<td width="1px">:</td>
											<td><span id="identitas-pasien-bhp"></span></td>
										</tr>
									</table>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group row tight">
												<label for="perawat-order" class="col-lg-4 col-form-label-custom">Perawat Order</label>
												<div class="col-lg-7">
													<input type="text" name="perawat_order_bimroh" class="select2c-input" id="perawat-order-bimroh" placeholder="Pilih Perawat Order">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="kondisi-pasien" class="col-lg-4 col-form-label-custom">Tanggal Order</label>
												<div class="col-lg-7">
													<input type="text" class="custom-form clear-input d-inline-block col-lg-6" name="tanggal_order" id="waktu-order" placeholder="DD/MM/YYYY HH:mm">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="jenis-bimroh" class="col-lg-4 col-form-label-custom">Jenis Bimbingan Rohani</label>
												<div class="col-lg-7">
													<?= form_dropdown('jenis_order', [
														'Bimbingan Spiritual Pasien Baru'   => 'Bimbingan Spiritual Pasien Baru',
														'Bimbingan Spiritual Pasien Khusus' => 'Bimbingan Spiritual Pasien Khusus'
													], 'Jenis', 'id=jenis-order-bimroh class=custom-form') ?>
												</div>
											</div>
											<div class="form-group row tight">
												<label for="kondisi-pasien" class="col-lg-4 col-form-label-custom">Kondisi Pasien</label>
												<div class="col-lg-7">
													<input type="text" name="kondisi_pasien" id="kondisi-pasien" class="custom-form validasi-input">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="diagnosa-spiritual" class="col-lg-4 col-form-label-custom">Diagnosa Spiritual</label>
												<div class="col-lg-7">
													<input type="text" name="diagnosa_spiritual" id="diagnosa-spiritual" class="custom-form validasi-input">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="terapi-tindak" class="col-lg-4 col-form-label-custom">Terapi/Tindak Lanjut</label>
												<div class="col-lg-7">
													<input type="text" name="terapi_tindak_lanjut" id="terapi-tindak-lanjut" class="custom-form validasi-input">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="" class="col-lg-4 col-form-label-custom"></label>
												<div class="col-lg-7">
													<button type="button" class="btn btn-info" onclick="addOrderBimroh()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Order Bimroh</button>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<table class="table table-hover table-striped table-sm color-table info-table" id="table-order-bimroh">
												<thead>
													<tr>
														<th width="5%" class="center">No.</th>
														<th width="10%" class="left">Waktu Order</th>
														<th width="10%" class="left">Perawat Order</th>
														<th width="10%" class="left">Jenis Bimbingan Rohani</th>
														<th width="10%" class="left">Kondisi Pasien</th>
														<th width="10%" class="left">Diagnosa Spiritual</th>
														<th width="10%" class="left">Terapi/Tindak Lanjut</th>
														<th width="5%" class="left">Status</th>
														<th width="5%"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- End Bimbingan Rohani -->

								<!-- Bimbingan Talqin -->
								<div class="form-talqin">
									<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
									<table class="table table-sm table-detail table-striped" width="100%">
										<tr>
											<td width="150px"><b>Pasien</b></td>
											<td width="1px">:</td>
											<td><span id="identitas-pasien-bhp"></span></td>
										</tr>
									</table>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group row tight">
												<label for="perawat-order-talqin" class="col-lg-4 col-form-label-custom">Perawat Order</label>
												<div class="col-lg-7">
													<input type="text" name="perawat_order_talqin" class="select2c-input" id="perawat-order-talqin" placeholder="Pilih Perawat Order">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="kondisi-pasien" class="col-lg-4 col-form-label-custom">Tanggal Order</label>
												<div class="col-lg-7">
													<input type="text" class="custom-form clear-input d-inline-block col-lg-6" name="tanggal_order_talqin" id="waktu-order-talqin" placeholder="DD/MM/YYYY HH:mm">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="kondisi-pasien" class="col-lg-4 col-form-label-custom">Kondisi Pasien</label>
												<div class="col-lg-7">
													<input type="text" name="kondisi_pasien_talqin" id="kondisi-pasien-talqin" class="custom-form validasi-input">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="terapi-tindak" class="col-lg-4 col-form-label-custom">Terapi/Advice</label>
												<div class="col-lg-7">
													<input type="text" name="terapi_advice_talqin" id="terapi-advice-talqin" class="custom-form validasi-input">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="" class="col-lg-4 col-form-label-custom"></label>
												<div class="col-lg-7">
													<button type="button" class="btn btn-info" onclick="addOrderTalqin()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Order Talqin</button>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<table class="table table-hover table-striped table-sm color-table info-table" id="table-order-talqin">
												<thead>
													<tr>
														<th width="5%" class="center">No.</th>
														<th width="10%" class="left">Waktu Order</th>
														<th width="10%" class="left">Perawat Order</th>
														<th width="10%" class="left">Kondisi Pasien</th>
														<th width="10%" class="left">Terapi/Advice</th>
														<th width="5%" class="left">Status</th>
														<th width="5%"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- End Bimbingan Talqin -->

								<!-- Form PKRT -->
								<div class="form-pkrt">
									<input type="hidden" name="harga_jual_pkrt" id="harga-jual-pkrt">
									<input type="hidden" id="nama-pkrt">
									<div class="row">

										<div class="col-lg-6">
											<div class="form-group row tight">
												<label for="barang-pkrt" class="col-lg-2 col-form-label-custom">Pasien</label>
												<div class="col-lg">
													: <b><span id="identitas-pasien-pkrt"></span></b>
												</div>
											</div>
											<div class="form-group row tight">
												<label for="barang-pkrt" class="col-lg-2 col-form-label-custom">Barang</label>
												<div class="col-lg-6">
													<input type="text" name="barang_pkrt" class="select2c-input" id="barang-pkrt">
												</div>
											</div>
											<div class="form-group row tight">
												<label for="jumlah-pkrt" class="col-lg-2 col-form-label-custom">Jumlah</label>
												<div class="col-lg-1">
													<input type="text" name="jumlah_pkrt" class="custom-form" style="text-align: center" value="1" onkeypress="return hanyaAngka(this)" id="jumlah-pkrt">
												</div>
											</div>
											<div class="form-group row tight">
												<label class="col-lg-2 col-form-label-custom"></label>
												<div class="col-lg-6">
													<button type="button" title="tambah pkrt" class="btn btn-info" onclick="addPKRT(); return false;"><span class="fas fa-plus-circle mr-1"></span>Tambah</button>
												</div>
											</div>
										</div>
										<input type="hidden" name="total_pkrt" id="pkrt">
										<table class="table table-hover table-striped table-sm color-table info-table" id="table-pkrt">
											<thead class="thead-theme">
												<tr>
													<th width="7%" class="center">No.</th>
													<th width="42%" class="left">Nama Barang</th>
													<th width="17%" class="right">Harga Jual</th>
													<th width="12%" class="center">Jumlah</th>
													<!--<th width="10%" class="center">Sisa</th>-->
													<th width="17%" class="right">Total</th>
													<th width="7%"></th>
												</tr>
											</thead>
											<tbody></tbody>
											<tfoot>
												<tr>
													<td class="right" colspan="4">TOTAL</td>
													<td class="right"><span id="pkrt-label"></span></td>
													<td></td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<!-- End Form PKRT -->
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanPemeriksaan()"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Pemeriksaan -->


<!-- Modal Edit Operator -->
<div id="modal-edit-operator" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-edit-operator-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-edit-operator-label">Edit Operator</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-edit-operator role=form class="form-horizontal form-custom"') ?>
				<!-- Input Hidden Form -->
				<input type="hidden" name="id_tarif_tindakan" id="id-tarif-tindakan-eo">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group tight">
							<label>Tindakan</label>
							<h5 id="tindakan-label-eo"></h5>
						</div>
						<div class="form-group tight">
							<label>Profesi</label>
							<?= form_dropdown('profesi', $profesi, array(), 'class=form-control id=profesi-eo') ?>
						</div>
						<div class="form-group tight">
							<label>Operator</label>
							<input type="text" name="operator" class="select2-input" id="operator-eo">
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="simpanEditOperator()"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- End Modal Edit Operator -->

<!-- Dialog Form Tata Tertib Rawat Inap -->
<div id="modal-tata-tertib-ranap" class="modal fade">
	<div class="modal-dialog" style="max-width: 50%; max-height: 100%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Cetak Form Tata Tertib Rawat Inap</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				Disetujui oleh Penjamin / Agreed by guarantor :
				<div class="form-group row tight">
					<label class="col-lg-4 col-form-label right">Saya / <i>I, Myself</i> :</label>
					<div class="col-lg-6">
						<input type="text" name="nama_penjamin" class="form-control" id="nama-penjamin">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col-lg-4 col-form-label right">No. Identitas / <i>Id No</i> :</label>
					<div class="col-lg-6">
						<input type="text" name="no_identitas_penjamin" class="form-control" id="no-identitas-penjamin">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col-lg-4 col-form-label right">Beralamat di / <i>Of</i> :</label>
					<div class="col-lg-6">
						<textarea type="text" name="alamat_penjamin" class="form-control" id="alamat-penjamin" rows="4"></textarea>
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col-lg-4 col-form-label right">No Telp / <i>Phone Number</i> :</label>
					<div class="col-lg-6">
						<input type="text" name="telp_penjamin" class="form-control" id="telp-penjamin">
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="printTataTertibRawatInap()"><i class="fas fa-print mr-1"></i>Cetak Form Tata Tertib Rawat Inap</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->