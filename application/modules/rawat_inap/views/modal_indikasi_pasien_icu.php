<script>	           
		
	function simpanIndikasiPasienICU() {
		var id = $('#id-pendaftaran-indikasi-pasien-masuk-icu').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_indikasi_pasien_masuk_icu") ?>',
			data: $('#indikasi-pasien-masuk-icu').serialize(),
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

					$('#modal_indiaksi_pasien_icu').modal('hide');

					window.open('<?= base_url('rawat_inap/cetak_indikasi_pasien_masuk_icu/') ?>' + id + '/' + id_layanan, 'Cetak Indikasi Pasien Masuk ICU', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);

				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			}
		});
	}
</script>

<!-- Modal -->
<div class="modal fade" id="modal_indikasi_pasien_masuk_icu" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-indikasi-pasien-masuk-icu-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=indikasi-pasien-masuk-icu class="form-horizontal"') ?>
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-indikasi-pasien-masuk-icu">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="indikasi-pasien-masuk-icu">
									<table class="table table-no-border table-sm table-striped">							
										<tr>
											<td class="bold" width="20%">Diagnosa Pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<textarea name="diagnosa_pasien"
													id="diagnosa-pasien-indikasi-icu" rows="3"
													class="form-control clear-input" placeholder="Tuliskan diagnosa pasien"></textarea>
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
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
						class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanIndikasiPasienICU()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
