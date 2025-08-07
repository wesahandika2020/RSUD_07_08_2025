<script>
	// On change for radio button is pasien
	$('input[type=radio][name=is_pasien]').change(function(){ 
		// Conditions
		if (this.value == 1) {			
			// Set field to empty string
			$('#nama-keluarga-ttb').val('');
			$('#no-telp-ttb').val('');
			
			// Disabled fields			
			$( "#nama-keluarga-ttb" ).prop( "disabled", true );			
			$( "#no-telp-ttb" ).prop( "disabled", true );			
		} else if (this.value == 0) {
			// Undisabled fields			
			$( "#nama-keluarga-ttb" ).prop( "disabled", false );								
			$( "#no-telp-ttb" ).prop( "disabled", false );								
		}
	});

	function simpanTataTertib() {
		var id = $('#id-layanan-pendaftaran-ttb').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_tata_tertib") ?>',
			data: $('#form_tata_tertib').serialize(),
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

					$('#modal_tata_tertib').modal('hide');

					window.open('<?= base_url('pemeriksaan_poli/cetak_tata_tertib_pasien/') ?>' + id, 'Cetak Tata Tertib', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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
<div class="modal fade" id="modal_tata_tertib" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-tata-tertib-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form_tata_tertib class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-ttb">

					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-tata-tertib">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td class="bold" colspan="2">Apakah form ditandatangani oleh pasien sendiri?</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="is_pasien" id="is-pasien-ttb-ya" value="1" class="mr-0">
                          <label for="is-pasien-ttb-ya">Ya</label>
													<input type="radio" name="is_pasien" id="is-pasien-ttb-tidak" value="0" class="mr-0 ml-2">
                          <label for="is-pasien-ttb-tidak">Tidak</label>
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="2">Nama kelurga / wali</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="nama_keluarga" class="custom-form" id="nama-keluarga-ttb">
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="2">No. Hanphone</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="no_telp" class="custom-form" id="no-telp-ttb">
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
				<button type="button" class="btn btn-info" onclick="simpanTataTertib()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
