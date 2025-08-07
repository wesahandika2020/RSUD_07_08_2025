<div class="modal fade" id="modal-persetujuan-umum-rm" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-persetujuan-umum-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open( '', 'id=form-persetujuan-umum-rm class="form-horizontal"' ) ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-form-mpu-rm">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-persetujuan-umum">
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="50%">Apakah form ditandatangani oleh pasien sendiri?</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="radio" name="is_pasien" id="is-pasien-ya-mpu-rm" value="ya" class="mr-1">Ya
												<input type="radio" name="is_pasien" id="is-pasien-tidak-mpu-rm" value="tidak" class="mr-1 ml-2">Tidak
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Nama keluarga / wali</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_keluarga" class="custom-form" id="nama-keluarga-mpu-rm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Tanggal lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_lahir" id="tanggal-lahir-mpu-rm" class="custom-form clear-input col-lg-2">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Jenis kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="radio" name="jenis_kelamin" id="laki-laki-mpu-rm" value="L" class="mr-1">Laki-laki
												<input type="radio" name="jenis_kelamin" id="perempuan-mpu-rm" value="P" class="mr-1 ml-2">Perempuan
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="alamat_form_rekam_medis" id="alamat-form-rekam-medis-mpu-rm" rows="3" class="form-control clear-input"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">No RT</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="number" name="no_rt" id="no-rt-mpu-rm" class="custom-form clear-input col-lg-2">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">No RW</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="number" name="no_rw" id="no-rw-mpu-rm" class="custom-form clear-input col-lg-2">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Provinsi</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="provinsi" class="custom-select reset-select" id="provinsi-mpu-rm">
													<option value="">Pilih Provinsi</option>
												</select>
											</td>
											<input type="hidden" name="nama_provinsi" id="nama_provinsi-mpu-rm" class="reset-field">
										</tr>
										<tr>
											<td class="bold" width="50%">Kabupaten/Kota</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="kabupaten" class="custom-select reset-select" id="kabupaten-mpu-rm">
													<option value="">Pilih Kabupaten</option>
												</select>
											</td>
											<input type="hidden" name="nama_kabupaten" id="nama_kabupaten-mpu-rm" class="reset-field">
										</tr>
										<tr>
											<td class="bold" width="50%">Kecamatan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="kecamatan" class="custom-select reset-select" id="kecamatan-mpu-rm">
													<option value="">Pilih Kecamatan</option>
												</select>
											</td>
											<input type="hidden" name="nama_kecamatan" id="nama_kecamatan-mpu-rm" class="reset-field">
										</tr>
										<tr>
											<td class="bold" width="50%">Kelurahan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="kelurahan" class="custom-select reset-select" id="kelurahan-mpu-rm">
													<option value="">Pilih Kelurahan</option>
												</select>
											</td>
											<input type="hidden" name="nama_kelurahan" id="nama_kelurahan-mpu-rm" class="reset-field">
										</tr>
										<tr>
											<td class="bold" width="50%">Nomor KTP/SIM</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_identitas" class="custom-form" id="no-ktp-mpu-rm" maxlength="16">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Nomor Telp/HP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_hp" class="custom-form" id="no-hp-mpu-rm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Hubungan keluarga</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="hubungan_keluarga" class="custom-form" id="hubungan-keluarga-mpu-rm">
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end content -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button id="btn-simpan" type="button" class="btn btn-info" onclick="simpanPersetujuanUmum()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->