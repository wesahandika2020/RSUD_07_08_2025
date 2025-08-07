<script>		

</script>

<!-- Modal -->
<div class="modal fade" id="modal-resume-medis" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-resume-medis-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-surat_pengantar-rawat class="form-horizontal"') ?>
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-spr">					

					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-modal-resume-medis">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="25%">Tanggal Masuk</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="tanggal-masuk-rm" disabled>
												</td>
											</tr>
											<tr>
												<td width="25%">Tanggal Keluar / Meninggal</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="tanggal-keluar-rm" disabled>
												</td>
											</tr>
											<tr>
												<td width="25%">Ruang Rawat Terakhir</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="ruang-rawat-terakhir-rm" disabled>
												</td>
											</tr>
											<tr>
												<td width="25%">Tanggung Jawab Pembayaran</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="tanggung-jawab-pembayaran-rm" disabled>
												</td>
											</tr>
											<tr>
												<td width="25%">Diagnosis / Masalah Waktu Masuk</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="diagnosis-rm" disabled>
												</td>
											</tr>											
											<tr>
												<td width="25%">Ringkasan Riwayat Penyakit</td>
												<td width="1%">:</td>
												<td>
													<textarea id="ringkasan-riwayat-penyakit-rm" rows="2" class="form-control clear-input" disabled></textarea>
												</td>
											</tr>															<tr>
												<td width="25%">Pemeriksaan Fisik</td>
												<td width="1%">:</td>
												<td>
													<textarea id="pemeriksaan-fisik-rm" rows="2" class="form-control clear-input"></textarea>
												</td>
											</tr>
											<tr>
												<td width="25%">Pemeriksaan Penunjang / Diagnostik Terpenting</td>
												<td width="1%">:</td>
												<td>
													<textarea id="pemeriksaan-penunjang-rm" rows="2" class="form-control clear-input"></textarea>
												</td>
											</tr>
											<tr>
												<td width="25%">Terapi / Pengobatan Selama di Rumah Sakit</td>
												<td width="1%">:</td>
												<td>
													<textarea id="terapi-rm" rows="2" class="form-control clear-input"></textarea>
												</td>
											</tr>
											<tr>
												<td width="25%">Hasil Konsultasi</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="hasil-konsultasi-rm">
												</td>
											</tr>											
											<tr>
												<td width="25%">Diagnosis Utama</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="diagnosis-utama-rm">
												</td>
											</tr>
											<tr>
												<td width="25%">Diagnosis Sekunder</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="diagnosis-sekunder-rm">
												</td>
											</tr>
											<tr>
												<td width="25%">Tindakan / Prosedur</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="tindakan-rm">
												</td>
											</tr>
											<tr>
												<td width="25%">Alergi (Reaksi Obat)</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="alergi-rm">
												</td>
											</tr>
											<tr>
												<td width="25%">Hasil Laboratorium Belum Selesai (Pending)</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="hasil-laboratoraium-rm">
												</td>
											</tr>
											<tr>
												<td width="25%">Diet</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="diet-rm">
												</td>
											</tr>
											<tr>
												<td width="25%">Instruksi / Anjuran dan Edukasi (Follow Up)</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="instruksi-rm">
												</td>
											</tr>
											<tr>
												<td width="25%">Kondisi Waktu Keluar</td>
												<td width="1%">:</td>
												<td>
													<input type="radio" name="kondisi_waktu_keluar" id="sembuh-rm" value="Sembuh" class="mr-1">Sembuh
													<input type="radio" name="kondisi_waktu_keluar" id="pindah-rs-lain-rm" value="Pindah RS Lain" class="mr-1 ml-2">Pindah RS Lain
													<input type="radio" name="kondisi_waktu_keluar" id="pulang-atas-permintaan-sendiri-rm" value="Pulang Atas Permintaan Sendiri" class="mr-1 ml-2">Pulang Atas Permintaan Sendiri
													<input type="radio" name="kondisi_waktu_keluar" id="meninggal-rm" value="Meninggal" class="mr-1 ml-2">Meninggal
												</td>
											</tr>
											<tr>
												<td width="25%">Pengobatan Dilanjutkan</td>
												<td width="1%">:</td>
												<td>
													<input type="radio" name="pengobatan_dilanjutkan" id="poliklinik-rm" value="Poliklinik" class="mr-1">Poliklinik
													<input type="radio" name="pengobatan_dilanjutkan" id="rs-lain-rm" value="RS Lain" class="mr-1 ml-2">RS Lain
													<input type="radio" name="pengobatan_dilanjutkan" id="puskesmas-rm" value="Puskesmas" class="mr-1 ml-2">Puskesmas
													<input type="radio" name="pengobatan_dilanjutkan" id="dokter-luar-rm" value="Dokter Luar" class="mr-1 ml-2">Dokter Luar
												</td>
											</tr>
											<tr>
												<td width="25%">Tanggal Kontrol Poliklinik</td>
												<td width="1%">:</td>
												<td>
													<input type="text" class="custom-form" id="tanggal-kontrol-rm">
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
				<button type="button" class="btn btn-info" onclick="simpanSuratPengantarRawat()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
