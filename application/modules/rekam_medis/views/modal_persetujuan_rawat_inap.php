<script>
	$(function() {
		$('#tanggal-lahir-pri').datetimepicker({
			format: 'DD/MM/YYYY',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});				
	})

	// On change for radio button is pasien
	$('input[type=radio][name=is_pasien]').change(function(){ 
		// Conditions
		if (this.value === 'ya') {
			// Set fields to empty string
			$('#nama-keluarga-pri').val('');
			$('#tanggal-lahir-pri').val('');
			document.getElementById("laki-laki-pri").checked = false;
			document.getElementById("perempuan-pri").checked = false;
			$('#alamat-form-rekam-medis-pri').val('');
			$('#hubungan-keluarga-pri').val('');
			$('#bukti-diri-pri').val('');			
			
			// Disabled fields
			$( "#nama-keluarga-pri" ).prop( "disabled", true );
			$( "#tanggal-lahir-pri" ).prop( "disabled", true );
			$( "#laki-laki-pri" ).prop( "disabled", true );
			$( "#perempuan-pri" ).prop( "disabled", true );
			$( "#alamat-form-rekam-medis-pri" ).prop( "disabled", true );
			$( "#hubungan-keluarga-pri" ).prop( "disabled", true );
			$( "#bukti-diri-pri" ).prop( "disabled", true );			
		} else if (this.value === 'tidak') {
			// Undisabled fields
			$( "#nama-keluarga-pri" ).prop( "disabled", false );
			$( "#tanggal-lahir-pri" ).prop( "disabled", false );
			$( "#laki-laki-pri" ).prop( "disabled", false );
			$( "#perempuan-pri" ).prop( "disabled", false );
			$( "#alamat-form-rekam-medis-pri" ).prop( "disabled", false );
			$( "#hubungan-keluarga-pri" ).prop( "disabled", false );
			$( "#bukti-diri-pri" ).prop( "disabled", false );			
		}
	});
		
	function simpanPersetujuanRawatInap() {
		var id = $('#id-layanan-pendaftaran-pri').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_persetujuan_rawat_inap") ?>',
			data: $('#form-persetujuan-rawat-inap').serialize(),
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

					$('#modal-persetujuan-rawat-inap').modal('hide');

					window.open('<?= base_url('pendaftaran_poli/cetak_persetujuan_rawat_inap/') ?>' + id, 'Cetak Persetujuan Rawat Inap', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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
<div class="modal fade" id="modal-persetujuan-rawat-inap" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-persetujuan-rawat-inap-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-persetujuan-rawat-inap class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pri">					

					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-persetujuan-rawat-inap">
										<table class="table table-no-border table-sm table-striped">
											<tr>												
												<td class="bold" width="50%">Apakah form ditandatangani oleh pasien sendiri?</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="is_pasien" id="is-pasien-ya-pri" value="ya" class="mr-1">Ya
													<input type="radio" name="is_pasien" id="is-pasien-tidak-pri" value="tidak" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Nama keluarga / wali</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="nama_keluarga" class="custom-form" id="nama-keluarga-pri">
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Tanggal lahir</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="tanggal_lahir" id="tanggal-lahir-pri" class="custom-form clear-input col-lg-2">
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Jenis kelamin</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="jenis_kelamin" id="laki-laki-pri" value="Laki-laki" class="mr-1">Laki-laki
													<input type="radio" name="jenis_kelamin" id="perempuan-pri" value="Perempuan" class="mr-1 ml-2">Perempuan
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Alamat</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<textarea name="alamat_form_rekam_medis" id="alamat-form-rekam-medis-pri" rows="3" class="form-control clear-input"></textarea>
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Hubungan Keluarga</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="hubungan_keluarga" class="custom-form" id="hubungan-keluarga-pri">
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Bukti diri / KTP</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="bukti_diri" class="custom-form" id="bukti-diri-pri">
												</td>
											</tr>																				
											<tr>
												<td class="bold" width="50%">Saksi 2</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="saksi_2" class="custom-form" id="saksi-2-pri">
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
				<button type="button" class="btn btn-info" onclick="simpanPersetujuanRawatInap()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
