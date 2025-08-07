<div id="modal-cetak-ringkasan-riwayat-masuk-dan-keluar-rm" class="modal fade" role="dialog"
	 aria-labelledby="modal-cetak-ringkasan-riwayat-masuk-dan-keluar_label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-cetak-ringkasan-riwayat-masuk-dan-keluar-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-cetak-ringkasan-eiwaayt-masuk-dan-keluar-rm class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-form-mrrmdk-rm">

				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-cetak-ringkasan-eiwaayt-masuk-dan-keluar">

									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold">Indikasi masuk Rawat Inap</td>
											<td>
												<input type="text" name="indikasi" class="custom-form" id="indikasi">
											</td>
										</tr>
										<tr>
											<td class="bold">Keterangan Khusus (Bila ada)</td>
											<td>
												<textarea name="keterangan_khusus" id="keterangan-khusus-rm" class="form-control reset-field" placeholder="Keterangan"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold">DPJP Utama</td>
											<td class="bold">DPJP Tambahan</td>
										</tr>
										<tr>
											<td>
												<div id="dpjp-utama"></div>
												<div id="dpjp-utama-hide" style="display:none"></div>
												<button type="button" class="btn btn-info btn-xs" onclick="tambahDPJPUtamaRm()"><i class="fas fa-plus-circle mr-1"></i>Tambah DPJP Utama</button>
											</td>
											<td>
												<div id="dpjp-tambahan"></div>
												<div id="dpjp-tambahan-hide" style="display:none"></div>
												<button type="button" class="btn btn-info btn-xs" onclick="tambahDPJPTambahanRm()"><i class="fas fa-plus-circle mr-1"></i>Tambah DPJP Tambahan</button>
											</td>
										</tr>
										<tr>
											<td class="bold">Tanggal Alih Rawat</td>
											<td></td>
										</tr>
										<tr>
											<td>
												<div id="tgl-alih-rawat"></div>
												<div id="tgl-alih-rawat-hide" style="display:none"></div>
												<button type="button" class="btn btn-info btn-xs" onclick="tambahTglAlihRawatRm()"><i class="fas fa-plus-circle mr-1"></i>Tambah Tanggal Alih Rawat
												</button>
											</td>
											<td></td>
										</tr>
									</table>

								</div>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
							class="fas fa-window-close"></i> Keluar
				</button>
				<button id="btn-simpan" type="button" class="btn btn-info" onclick="simpanRingkasanRiwayatMasukDanKeluarRm()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>