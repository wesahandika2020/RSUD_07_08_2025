<!-- Start New Modal -->
<div class="modal fade" id="modal-cetak-persetujuan-rawat-inap-rm" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-cetak-persetujuan-rawat-inap-rm-title"><b>FORM PERSETUJUAN RAWAT INAP</b></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-persetujuan-rawat-inap-rm class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-form-cpri-rm">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-form-cpri-rm">
				<input type="hidden" name="id_pasien" id="id-pasien-form-cpri-rm">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-persetujuan-umum">
									<table class="table table-no-border table-sm table-striped">
										<tr id="tr_is_pasien">
											<td class="bold" width="25%">Apakah form ditandatangani oleh pasien sendiri?</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="radio" name="is_pasien" id="is-pasien-ya-spri-rm" value="ya" class="mr-1">Ya
												<input type="radio" name="is_pasien" id="is-pasien-tidak-spri-rm" value="tidak" class="mr-1 ml-2">Tidak
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Nama keluarga / wali</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama" class="custom-form" id="nama-fpri-poli-rm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Tanggal lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tanggal_lahir" class="custom-form clear-input col-lg-3" id="tanggal-lahir-fpri-rm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Jenis kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="jenis_kelamin" class="custom-form clear-input col-lg-3" id="jenis-kelamin-fpri-rm">
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="alamat" cols="30" rows="5" class="form-control clear-input custom-textarea" id="alamat-fpri-rm"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Bukti diri / No.KTP / No.SIM</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" maxlength="16" name="identitas" class="custom-form clear-input col-lg-3" id="identitas-fpri-rm">
											</td>
										</tr>
										<tr id="tr-hubungan-keluarga">
											<td class="bold" width="25%">Hubungan Keluarga</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" maxlength="16" name="hubungan_keluarga" class="custom-form clear-input col-lg-3" id="hubungan-keluarga-fpri-rm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Dirawat Di</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" maxlength="16" name="dirawat_id" class="custom-form clear-input col-lg-3" id="dirawat-di-rm">
											</td>
										</tr>
										
										<tr>
											<td class="bold" width="25%">Saksi</td>
											<td class="bold" width="1%">:</td>
											<td>
												<input type="text" name="saksi" id="saksi-search" class="select2c-input"  placeholder="Pilih Saksi...">
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
				<button type="button" class="btn btn-info" onclick="cetakManualSuratPersetujuanRawatInapRm()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->