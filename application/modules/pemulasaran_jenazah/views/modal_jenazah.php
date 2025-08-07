<!-- Modal Entri Jenazah -->
<div id="modal-jenazah" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-jenazah-label" aria-hidden="true">
	<!-- <div class="modal-dialog" style="max-width: 650px"> -->
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-jenazah-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_jenazah role=form class="form-horizontal form-custom"') ?>
				<!-- Input Hidden Form -->
				<input type="hidden" name="id_jenazah" id="id_jenazah">
				<input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
				<input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran">
				<input type="hidden" name="id_pemulasaran_jenazah" id="id_pemulasaran_jenazah">
				<input type="hidden" name="id_penanggung_jawab" id="id_penanggung_jawab">

				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard-form-jenazah">
								<!-- Tab bwizard -->
								<ol>
									<li>Data Pasien</li>
									<li>Serah Terima Jenazah</li>
									<li>Bukti Pelayanan Jenazah</li>
									<li>Kesediaan Tindakan Jenazah</li>
									<li>Surat Jalan Mobil Jenazah</li>
								</ol>

								<!-- Data Pasien -->
								<div class="form-info-pasien">
									<div class="row">
										<div class="col-lg-6">
											<table class="table table-sm table-detail table-striped">
												<tr>
													<td width="30%"><b>No</b></td>
													<td><span id="pemulasaran-no-detail"></span></td>
												</tr>
												<tr>
													<td width="30%"><b>Nama</b></td>
													<td><span id="pemulasaran-nama-detail"></span></td>
												</tr>
												<tr>
													<td><b>No. RM</b></td>
													<td><span id="pemulasaran-no-rm-detail"></span></td>
												</tr>
												<tr>
													<td><b>No. Register</b></td>
													<td><span id="pemulasaran-no-register-detail"></span></td>
												</tr>
												<tr>
													<td><b>Jenis Kelamin</b></td>
													<td><span id="pemulasaran-kelamin-detail"></span></td>
												</tr>
												<tr>
													<td><b>Umur/Tgl. Lahir</b></td>
													<td><span id="pemulasaran-umur-detail"></span></td>
												</tr>
												<tr>
													<td><b>Alamat</b></td>
													<td><span id="pemulasaran-alamat-detail"></span></td>
												</tr>
												<tr>
													<td><b>Agama</b></td>
													<td><span id="pemulasaran-agama-detail"></span></td>
												</tr>
											</table>
										</div>
										<div class="col-lg-6">
											<table class="table table-sm table-detail table-striped">
												<tr>
													<td width="30%"><b>Tanggal</b></td>
													<td><span id="pemulasaran_tanggal_detail"></span></td>
												</tr>
												<tr>
													<td width="40%"><b>Asal Ruangan</b></td>
													<td><span id="pemulasaran_asalruangan_detail"></span></td>
												</tr>
												<tr>
													<td><b>Dokter</b></td>
													<td><span id="pemulasaran_dokter_detail"></span></td>
												</tr>
												<tr>
													<td><b>Diagnosis</b></td>
													<td><span id="pemulasaran_diagnosa_dokter_detail"></span></td>
												</tr>
												<tr>
													<td><b>Petugas IPJ</b></td>
													<td><span id="pemulasaran_petugas_ipj_detail_input"></span></td>
													</td>
												</tr>
												<tr>
													<td><b>Sopir Mobil Jenazah</b></td>
													<td>
														<input type="text" autocomplete="off" name="select_petugas_ipj" id="pemulasaran_sopir_jenazah_input" class="select2c-input ipj-sopir-ambulance">
													</td>
												</tr>
											</table>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-6">
											<h5><b>Waktu</b></h5>
											<input type="hidden" name="id_dokter_detail" id="id-dokter-detail">
											<table class="table table-striped table-sm table-detail">
												<tr>
													<td><b>Waktu Meninggal</b></td>
													<td>
														<input type="text" name="waktu-meninggal" class="custom-form col-lg clear-input timepicker form-edit" id="pemulasaran_waktu_meninggal">
													</td>
												</tr>
												<tr>
													<td width="30%"><b>Waktu Panggilan</b></td>
													<td>

														<input type="text" name="waktu-panggilan" class="custom-form col-lg clear-input timepicker form-edit" id="pemulasaran_waktu_panggilan">
													</td>
												</tr>
												<tr>
													<td><b>Waktu Masuk R.Jenazah</b></td>
													<td>
														<input type="text" name="waktu-masuk-ruangan" class="custom-form col-lg clear-input timepicker form-edit" id="pemulasaran_waktu_masuk_ruangan">
													</td>
												</tr>
												<tr>
													<td><b>Waktu Pengantaran</b></td>
													<td>
														<input type="text" name="waktu-pengantaran" class="custom-form col-lg clear-input timepicker form-edit pemulasaran_waktu_pengantaran" id="pemulasaran_waktu_pengantaran">
													</td>
												</tr>
											</table>
										</div>
										<div class="col-lg-6">
											<h5><b>Cetak Formulir</b></h5>
											<input type="hidden" name="id_pendaftaran_pasien" id="id-pendaftaran-pasien">
											<table class="table table-striped table-hover table-sm table-detail">
												<tr>
													<td width="85%">Formulir Intansi Pemulasaran Jenazah</td>
													<td class="right">
														<button type="button" class="btn btn-secondary btn-xs" onclick="cetakFormIPJ()"><i class="fas fa-print m-r-5"></i>Print</button>
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<!-- Serah Terima Jenazah -->
								<div class="form-info-pasien">
									<h5><b>Form Serah Terima Jenazah</b></h5>
									<div class="row">
										<div class="col-lg-6 form-data-penyerahan-jenazah">
											<table class="table table-sm table-striped">
												<tr>
													<td colspan="3" class="td-dark"><b>Data Jenazah</b></td>
												</tr>
												<tr>
													<td widht="30%">Nama Jenazah</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="no_tkk" class="custom-form col-lg clear-input" id="penyerahan_nama_jenazah" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">No Surat Kematian</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="no_surat_kematian" class="custom-form col-lg clear-input " id="no_surat_kematian">
													</td>
												</tr>
												<tr>
													<td widht="30%">No Registrasi (RM)</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="no_tkk" class="custom-form col-lg clear-input" id="penyerahan_no_rm" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Usia Jenazah</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="no_tkk" class="custom-form col-lg clear-input" id="penyerahan_usia_jenazah" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Jenis Kelamin</td>
													<td widht="1%">:</td>
													<td width="69%">
														<div class="form-check form-check-inline">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" id="jenazahJKLaki" name="genderjenazah" value="L" disabled>
																<label class="form-check-label">Laki-laki</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" id="jenazahJKPerempuan" name="genderjenazah" value="P" disabled>
																<label class="form-check-label">Perempuan</label>
															</div>
													</td>
												</tr>
												<tr>
													<td>Penyerahan Jenazah Kepada</td>
													<td>:</td>
													<td>
														<div class="form-check form-check-inline">
															<input class="form-check-input penyerahan-jenazah" type="radio" id="check-keluarga" name="penyerahan_kepada" value="Keluarga">
															<label for="check-keluarga" class="form-check-label">Keluarga</label>
														</div>

														<div class="form-check form-check-inline">
															<input class="form-check-input penyerahan-jenazah" type="radio" id="check-kepolisian" name="penyerahan_kepada" value="Kepolisian">
															<label for="check-kepolisian" class="form-check-label">Kepolisian</label>
														</div>

														<div class="form-check form-check-inline">
															<input class="form-check-input penyerahan-jenazah" type="radio" id="check-dinas-sosial" name="penyerahan_kepada" value="Dinas Sosial">
															<label for="check-dinas-sosial" class="form-check-label">Dinas Sosial</label>
														</div>
													</td>
												</tr>
												<tr>
													<td widht="30%">No. KTP / SIM</td>
													<td widht="1%">:</td>
													<td width="69%">
														<input type="text" autocomplete="off" name="text_ktp" id="ktp_penanggung_jawab_serah_terima" class="custom-form col-lg clear-input form-penanggung-jawab">
													</td>
												</tr>
												<tr>
													<td widht="30%">Nama</td>
													<td widht="1%">:</td>
													<td width="69%">
														<input type="text" autocomplete="off" name="nama" class="custom-form col-lg clear-input form-penanggung-jawab" id="nama_penerima_jenazah">
													</td>
												</tr>
												<tr>
													<td widht="30%">Jenis Kelamin</td>
													<td widht="1%">:</td>
													<td width="69%">
														<input type="text" autocomplete="off" name="jk_penanggung_jawab" class="custom-form col-lg clear-input form-penanggung-jawab" id="jk_penanggung_jawab">
													</td>
												</tr>
												<tr>
													<td widht="30%">No Telepon / HP</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="number" autocomplete="off" name="no_tlp" class="custom-form col-lg clear-input form-penanggung-jawab" id="telp_penerima_jenazah">
													</td>
												</tr>
												<tr>
													<td widht="30%">Alamat</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="alamat" class="custom-form col-lg clear-input form-penanggung-jawab" id="alamat_penerima_jenazah">
													</td>
												</tr>
												<tr>
													<td widht="30%">Jam Penyerahan</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="jam_penyerahan" class="custom-form col-lg clear-input" id="jam_penyerahan_jenazah" disabled>
													</td>
												</tr>
											</table>
										</div>

										<div class="col-lg-6 form-data-staf-ipj">
											<table class="table table-sm table-striped">
												<tr>
													<td colspan="3" class="td-dark"><b>Staf IPJ RSUD Kota Tangerang</b>
													</td>
												</tr>
												<tr>
													<td widht="30%">Nama Lengkap</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="nama_lengkap" class="custom-form col-lg clear-input form-staff-ipj" id="ipj_nama" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">NR. TKK</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="number" autocomplete="off" name="no_tkk" class="custom-form col-lg clear-input form-staff-ipj" id="ipj_no_tkk" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Jam Tugas</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" name="jam_tugas" class="custom-form col-lg clear-input timepicker" id="ipj_jam_tugas" disabled>
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<!-- End Data Pasien -->

								<!-- Form bukti pelayanan -->
								<div class="form-bukti-pelayanan">
									<div class="row">
										<div class="col-md-12">
											<h5><b>Bukti Pelayanan Jenazah</b></h5>
											<table class="table table-sm table-striped">
												<tr class="bg-dark text-white">
													<th class="center"><b>Checklist</b></th>
													<th class="center"><b>Bentuk Layanan IPJ</b></th>
													<th class="center"><b>Petugas IPJ</b></th>
												</tr>
												<tr>
													<td class="center">
														<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan" id="kendaraan_jenazah_perkm" value="1965">
													</td>
													<td class="center">
														<label class="form-check-label" for="defaultCheck1">Kendaraan
															Jenazah (per km)</label>
													</td>
													<td>
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-petugas-ipj-tindakan" id="petugas-ipj-tindakan-kendaraan-jenazah" disabled>
													</td>
												</tr>
												<tr>
													<td class="center">
														<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan" id="pemulasaran_jenazah-lk" value="1713">
													</td>
													<td class="center">
														<label class="form-check-label" for="defaultCheck1">Pemulasaran
															Jenazah Laki-laki</label>
													</td>
													<td>
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-petugas-ipj-tindakan" id="petugas-ipj-tindakan-pemulasaran-jenazah-lakilaki" disabled>
													</td>
												</tr>
												<tr>
													<td class="center">
														<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan" id="pemulasaran_jenazah_pr" value="1714">
													</td>
													<td class="center">
														<label class="form-check-label" for="defaultCheck1">Pemulasaran
															Jenazah Perempuan</label>
													</td>
													<td>
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-petugas-ipj-tindakan" id="petugas-ipj-tindakan-pemulasaran-jenazah-perempuan" disabled>
													</td>
												</tr>
												<!-- <tr>
													<td class="center">
														<input class="form-check-input form-bukti-pelayanan"
															type="checkbox" name="tindakan-pelayanan"
															id="perawatan_jenazah" value="1714">
													</td>
													<td class="center">
														<label class="form-check-label" for="defaultCheck1">Perawatan
															Jenazah (Kamar Jenazah)</label>
													</td>
													<td>
														<input type="text" autocomplete="off"
															class="custom-form col-lg clear-input form-petugas-ipj-tindakan"
															id="petugas-ipj-tindakan-perawatan-jenazah" disabled>
													</td>
												</tr> -->
												<tr>
													<td class="center">
														<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan" id="otopsi" value="1717">
													</td>
													<td class="center">
														<label class="form-check-label" for="defaultCheck1">Otopsi</label>
													</td>
													<td>
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-petugas-ipj-tindakan" id="petugas-ipj-tindakan-pemulasaran-otopsi" disabled>
													</td>
												</tr>
												<tr>
													<td class="center">
														<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan" id="lemari_pendingin_perhari" value="1718">
													</td>
													<td class="center">
														<label class="form-check-label" for="defaultCheck1">Lemari
															Pendingin Perhari</label>
													</td>
													<td>
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-petugas-ipj-tindakan" id="petugas-ipj-tindakan-pemulasaran-lemari-pendingin" disabled>
													</td>
												</tr>
												<tr>
													<td class="center">
														<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan" id="peti_jenazah_jumblo" value="1966">
													</td>
													<td class="center">
														<label class="form-check-label" for="defaultCheck1">Peti Jenazah
															Jumbo</label>
													</td>
													<td>
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-petugas-ipj-tindakan" id="petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-jumbo" disabled>
													</td>
												</tr>
												<tr>
													<td class="center">
														<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan" id="peti_jenazah_standar" value="1967">
													</td>
													<td class="center">
														<label class="form-check-label" for="defaultCheck1">Peti Jenazah
															Standar</label>
													</td>
													<td>
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-petugas-ipj-tindakan" id="petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-standar" disabled>
													</td>
												</tr>
												<tr>
													<td class="center">
														<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan" id="petu_jenazah_superior" value="1968">
													</td>
													<td class="center">
														<label class="form-check-label" for="defaultCheck1">Peti Jenazah
															Superior</label>
													</td>
													<td>
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-petugas-ipj-tindakan" id="petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-superior" disabled>
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<!-- End form bukti pelayanan -->

								<!-- Form Kesediaan -->
								<div class="form-kesediaan">
									<h5><b>Formulir Kesediaan Tindakan Terhadap Jenazah</b></h5>
									<div class="row">
										<div class="col-md-6">
											<table class="table table-sm table-striped">
												<tr>
													<td colspan="3" class="td-dark"><b>Data Penanggung Jawab Jenazah</b>
													</td>
												</tr>
												<tr>
													<td widht="30%">Nama Lengkap</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-penanggung-jawab" id="kesediaan_nama_penanggung_jawab" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Tempat Lahir</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="tempatlahir" class="custom-form col-lg clear-input form-penanggung-jawab" id="kesediaan_penanggungjawab_tempatlahir">
													</td>
												</tr>
												<tr>
													<td widht="30%">Agama</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-penanggung-jawab" id="kesediaan_penanggungjawab_agama">
													</td>
												</tr>
												<tr>
													<td widht="30%">Umur / Tanggal Lahir</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="umur" class="custom-form col-lg clear-input form-penanggung-jawab" id="kesediaan_penanggungjawab_umur">
													</td>
												</tr>
												<tr>
													<td widht="30%">Alamat</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="alamat" class="custom-form col-lg clear-input form-penanggung-jawab" id="kesediaan_penanggungjawab_alamat" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Hubungan Keluarga</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="hubungan_keluarga" class="custom-form col-lg clear-input form-penanggung-jawab" id="kesediaan_penanggungjawab_hubungankeluarga">
													</td>
												</tr>
												<tr>
													<td widht="30%">No Telepon</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="no_tlp" class="custom-form col-lg clear-input form-penanggung-jawab" id="kesediaan_penanggungjawab_telp" disabled>
													</td>
												</tr>
											</table>
											<tr>
												<label class="col-lg-10 label-custom-form">Kesediaan (Bersedia) Melakukan Tindakan Jenazah</label>
											</tr>
											<div class="form-check">
												<input class="form-check-input form-kesediaan" name="pmj" type="checkbox" value="1" id="kesediaan_pemulasaran_jenazah">
												<label class="form-check-label" for="defaultCheck1">Pemulasaran Jenazah
													( Pemandian & Pengkafanan )</label>
											</div>
											<div class="form-check">
												<input class="form-check-input form-kesediaan" name="pnj" type="checkbox" value="1" id="kesediaan_pengantaran">
												<label class="form-check-label" for="defaultCheck1">Pengantaran
													Jenazah</label>
											</div>
											<div class="form-check">
												<input class="form-check-input form-kesediaan" name="pngj" type="checkbox" value="1" id="kesediaan_pengawetan">
												<label class="form-check-label" for="defaultCheck1">Pengawetan
													Jenazah</label>
											</div>
											<div class="form-check">
												<input class="form-check-input form-kesediaan" type="checkbox" value="1" name="lainnyaCheck" id="kesediaan_lainnya">
												<label class="form-check-label" for="defaultCheck1">Lainnya</label>
												<input type="text" autocomplete="off" class="custom-form clear-input d-inline-block col-lg-4 disabled" id="keterangan_lain" placeholder="sebutkan">
											</div>
										</div>
										<div class="col-md-6">
											<table class="table table-sm table-striped">
												<tr>
													<td colspan="3" class="td-dark"><b>Data Penanggung Biaya Tindakan
															Kepada Jenazah : </b></td>
												</tr>
												<tr>
													<td widht="30%">Nama Lengkap</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-kesediaan" id="kesediaan_nama_jenazah" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Tempat Lahir</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input form-kesediaan" id="kesediaan_penanggungbiaya_tempatlahir" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Umur & Tanggal Lahir</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="umur" class="custom-form col-lg clear-input" id="kesediaan_penanggungbiaya_umur" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Agama</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="agama" class="custom-form col-lg clear-input form-kesediaan" id="kesediaan_penanggungbiaya_agama" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Alamat</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" autocomplete="off" name="alamat" class="custom-form col-lg clear-input" id="kesediaan_penanggungbiaya_alamat" disabled>
													</td>
												</tr>
											</table>
											<tr>
												<label class="col-lg-10 label-custom-form">Kesediaan (Tidak Bersedia) Melakukan Tindakan Jenazah</label>
												<div class="col-lg-12">
													<textarea name="keterangan_tb" id="keterangan_tidak_bersedia" rows="4" class="form-control clear-input" placeholder="Sebutkan alasan tidak bersedia"></textarea>
												</div>
											</tr>
										</div>
									</div>
								</div>
								<!-- End form kesediaan -->

								<!-- Surat Jalan Ambulance -->
								<div class="form-ambulan">
									<h5><b>Surat Jalan Mobil Jenazah</b></h5>
									<div class="row">
										<div class="col-md-6">
											<table class="table table-sm table-detail table-striped">
												<tr>
													<td colspan="3" class="td-dark"><b>Keterangan Surat </b></td>
												</tr>
												<tr>
													<td widht="30%">Tanggal</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" class="custom-form col-lg form-penanggung-jawab datepickerpemulasaran" id="tanggal_jalan" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">No. Mobil</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" class="custom-form col-lg form-penanggung-jawab" id="no_mobil_ambulance">
													</td>
												</tr>
												<tr>
													<td widht="30%">Nama Penanggung Jawab</td>
													<td widht="1%">:</td>
													<td width="69%" class="right">
														<input type="text" class="custom-form col-lg form-penanggung-jawab" id="penanggung_jawab_ambulance" disabled>
													</td>
												</tr>
											</table>
										</div>
										<div class="col-md-6">
											<table class="table table-sm table-striped">
												<tr>
													<td colspan="3" class="td-dark"><b>Identitas Jenazah</b></td>
												</tr>
												<tr>
													<td widht="30%">Nama Jenazah</td>
													<td widht="1%">:</td>
													<td width="69%">
														<input type="text" autocomplete="off" class="custom-form col-lg" id="sja_nama_jenazah" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">No Surat Kematian</td>
													<td widht="1%">:</td>
													<td width="69%">
														<input type="text" autocomplete="off" class="custom-form col-lg clear-input no_surat_kematian_ambulance" id="sja_no_surat_kematian" disabled>
													</td>
												</tr>
												<tr>
													<td widht="30%">Alamat Penghantaran</td>
													<td widht="1%">:</td>
													<td width="69%">
														<input type="text" autocomplete="off" class="custom-form col-lg" id="sja_alamat_jenazah" disabled>
													</td>
												</tr>
											</table>
											<br>
											<div class="ttd float-right">
												<div>
													<input class="form-check-input mr-3 form-ambulance ttd_sopir" type="checkbox" name="ttd_sopir" id="ttd_sopir" value="1">
													<label class="form-check-label" for="defaultCheck1">TTD Sopir
														Ambulan</label>
												</div>
												<div>
													<input class="form-check-input form-ambulance ttd_kerabat" type="checkbox" name="ttd_kerabat" id="ttd_kerabat" value="1">
													<label class="form-check-label" for="defaultCheck1">TTD Kerabat
														Almarhum/Almarhumah</label>
												</div>
												<div>
													<input class="form-check-input form-ambulance ttd_dokterjaga" type="checkbox" name="ttd_dokterjaga" id="ttd_dokterjaga" value="1">
													<label class="form-check-label" for="defaultCheck1">TTD KA.
														Instalasi
														Pemulasaran Jenazah Dokter Jaga IGD/Ruangan </label>
												</div>
											</div>
											<br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?= form_close() ?>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanForm()"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- end header -->
</div>