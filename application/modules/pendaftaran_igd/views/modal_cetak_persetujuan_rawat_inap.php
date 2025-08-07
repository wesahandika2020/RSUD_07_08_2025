<script>
	function cetakSuratPersetujuanRawatInap(id, id_layanan_pendaftaran) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/get_persetujuan_rawat_inap') ?>/id/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(response) {
				$('#saksi-search').select2c({
					ajax: {
						url: "<?= base_url('form_rekam_medis/api/form_rekam_medis/saksi_auto') ?>",
						dataType: 'json',
						quietMillis: 100,
						data: function(term, page) { // page is the one-based page number tracked by Select2
							return {
								q: term, //search term
								page: page, // page number
								// jenis: 15,
							};
						},
						results: function(data, page) {
							var more = (page * 20) < data
								.total; // whether or not there are more results available

							// notice we return the value of more so Select2 knows if more results can be loaded
							return {
								results: data.data,
								more: more
							};
						}
					},
					formatResult: function(data) {
						// var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
						var markup = data.nama;
						return markup;
					},
					formatSelection: function(data) {
						return data.nama;
					}
				});

				$('#modal-cetak-persetujuan-rawat-inap-rm').modal('show');

				const data = response.data
				const pasien = response.pendaftaran.pasien
				const penanggung_jawab = response.penanggung_jawab
				resetPersetujuanUmumRawatInap();

				$('#id-pasien-form-spri-rm').val(pasien.id);
				$('#id-layanan-pendaftaran-form-cpri').val(id_layanan_pendaftaran);
				$('#id-pendaftaran-form-spri-rm').val(id);

				if (data === null) {
					$('#tr_is_pasien').show();

					$("#is-pasien-ya-spri-rm").on('click', function() {
						$('#tr-hubungan-keluarga').hide()
						$('#nama-spri-poli-rm').val(pasien.nama).prop('readOnly', true);
						$('#tanggal-lahir-spri-rm').val(pasien.tanggal_lahir).prop('readOnly', true);
						$('#jenis-kelamin-spri-rm').val(pasien.kelamin).attr('readonly', true);
						$('#alamat-spri-rm').html(pasien.alamat).prop('readOnly', true);
						$('#identitas-spri-rm').val(pasien.no_identitas).prop('readOnly', true);
						$('#dirawat-di-rm').val(data?.dirawat_di);
						$('#saksi-search').val(data?.id_saksi);
						$('#s2id_saksi-search a .select2c-chosen').html(data?.nama_saksi);
					});

					$("#is-pasien-tidak-spri-rm").on('click', function() {
						$('#tr-hubungan-keluarga').show()
						$('#nama-spri-poli-rm').val(data?.nama ?? penanggung_jawab?.nama_pjwb).prop('readOnly', false);
						$('#tanggal-lahir-spri-rm').val(data?.tanggal_lahir ?? penanggung_jawab?.tgl_lahir_pjwb).prop('readOnly', false);
						$('#jenis-kelamin-spri-rm').val(data?.jenis_kelamin ?? penanggung_jawab?.kelamin_pjwb).attr('readonly', false);
						$('#alamat-spri-rm').html(data?.alamat ?? penanggung_jawab?.alamat_pjwb).prop('readOnly', false);
						$('#identitas-spri-rm').val(data?.identitas ?? penanggung_jawab?.nik_pjwb).prop('readOnly', false);
						$('#hubungan-keluarga-spri-rm').val(data?.hubungan_keluarga ?? penanggung_jawab?.hubungan_pjwb);
						$('#dirawat-di-rm').val(data?.dirawat_di);
						$('#saksi-search').val(data?.id_saksi);
						$('#s2id_saksi-search a .select2c-chosen').html(data?.nama_saksi);
					});

					$('#is-pasien-tidak-spri-rm').click()

				} else {
					$('#tr_is_pasien').hide();

					$('#nama-spri-poli-rm').val(data?.nama ?? penanggung_jawab?.nama_pjwb).prop('readonly', false);
					$('#tanggal-lahir-spri-rm').val(data?.tanggal_lahir ?? penanggung_jawab?.tgl_lahir_pjwb).prop('readonly', false);
					$('#jenis-kelamin-spri-rm').val(data?.jenis_kelamin ?? penanggung_jawab?.kelamin_pjwb).prop('readonly', false);
					$('#alamat-spri-rm').html(data?.alamat ?? penanggung_jawab?.alamat_pjwb).prop('readonly', false);
					$('#identitas-spri-rm').val(data?.identitas ?? penanggung_jawab?.nik_pjwb).prop('readonly', false);
					$('#hubungan-keluarga-spri-rm').val(data?.hubungan_keluarga ?? penanggung_jawab?.hubungan_pjwb).prop('readonly', false);
					$('#dirawat-di-rm').val(data?.dirawat_di).prop('readonly', false);
					$('#saksi-search').val(data?.id_saksi);
					$('#s2id_saksi-search a .select2c-chosen').html(data?.nama_saksi);
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function cetakManualSuratPersetujuanRawatInap() {
		const id = $('#id-layanan-pendaftaran-form-cpri').val();

		$.ajax({
			type: 'post',
			url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/cetak_manual_surat_persetujuan_rawat_inap') ?>',
			data: $('#form-persetujuan-rawat-inap-rm').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					window.open('<?= base_url('pendaftaran_igd/cetak_persetujuan_rawat_inap/') ?>' + id, 'Cetak Persetujuan Rawat Inap', 'width=' + dWidth + ', height=' +
						dHeight + ', left=' + x + ', top=' + y);
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function resetPersetujuanUmumRawatInap() {
		$('#nama-spri-igd').val('');
		$('#tanggal-lahir-spri').val('');
		$('#jenis-kelamin-spri').val('');
		$('#alamat-spri').html('');
		$('#identitas-spri').val('');
		$('#hubungan-keluarga-spri').val('');
		$('#saksi-search').val('');
		$('#s2id_saksi-search a .select2c-chosen').html('Pilih saksi');
	}
</script>

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
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-form-cpri">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-form-spri-rm">
				<input type="hidden" name="id_pasien" id="id-pasien-form-spri-rm">

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
												<input type="text" name="nama" class="custom-form" id="nama-spri-poli-rm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Tanggal lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tanggal_lahir" class="custom-form clear-input col-lg-3" id="tanggal-lahir-spri-rm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Jenis kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="jenis_kelamin" class="custom-form clear-input col-lg-3" id="jenis-kelamin-spri-rm">
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="alamat" cols="30" rows="5" class="form-control clear-input custom-textarea" id="alamat-spri-rm"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Bukti diri / No.KTP / No.SIM</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" maxlength="16" name="identitas" class="custom-form clear-input col-lg-3" id="identitas-spri-rm">
											</td>
										</tr>
										<tr id="tr-hubungan-keluarga">
											<td class="bold" width="25%">Hubungan Keluarga</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" maxlength="16" name="hubungan_keluarga" class="custom-form clear-input col-lg-3" id="hubungan-keluarga-spri-rm">
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
												<input type="text" name="saksi" id="saksi-search" class="select2c-input" placeholder="Pilih Saksi...">
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
				<button type="button" class="btn btn-info" onclick="cetakManualSuratPersetujuanRawatInap()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->