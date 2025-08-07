<script>
	$(function() {
		$('#tanggal-lahir-mpta').datetimepicker({
			format: 'DD/MM/YYYY',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#saksi-1-mpta').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function(data){
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data){
				$('#id-saksi-1-mpta').val(data.id);
				return data.nama;
			}
		});

		$('#saksi-2-mpta').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function(data){
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data){
				$('#id-saksi-2-mpta').val(data.id);
				return data.nama;
			}
		});		
	})

	// On change for radio button is pasien
	$('input[type=radio][name=is_pasien_mpta]').change(function(){ 
		// Conditions
		if (this.value === 'ya') {
			// Set fields to empty string
			$('#nama-keluarga-mpta').val('');
			$('#tanggal-lahir-mpta').val('');
			document.getElementById("laki-laki-mpta").checked = false;
			document.getElementById("perempuan-mpta").checked = false;
			$('#alamat-form-rekam-medis-mpta').val('');
			$('#hubungan-keluarga-mpta').val('');			
			
			// Disabled fields
			$( "#nama-keluarga-mpta" ).prop( "disabled", true );
			$( "#tanggal-lahir-mpta" ).prop( "disabled", true );
			$( "#laki-laki-mpta" ).prop( "disabled", true );
			$( "#perempuan-mpta" ).prop( "disabled", true );
			$( "#alamat-form-rekam-medis-mpta" ).prop( "disabled", true );
			$( "#hubungan-keluarga-mpta" ).prop( "disabled", true );			
		} else if (this.value === 'tidak') {
			// Undisabled fields
			$( "#nama-keluarga-mpta" ).prop( "disabled", false );
			$( "#tanggal-lahir-mpta" ).prop( "disabled", false );
			$( "#laki-laki-mpta" ).prop( "disabled", false );
			$( "#perempuan-mpta" ).prop( "disabled", false );
			$( "#alamat-form-rekam-medis-mpta" ).prop( "disabled", false );
			$( "#hubungan-keluarga-mpta" ).prop( "disabled", false );			
		}
	});
		
	function simpanPersetujuanTindakanAnestesi() {
		var id = $('#id-layanan-pendaftaran-form-mpta').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_persetujuan_tindakan_anestesi") ?>',
			data: $('#form_persetujuan_tindakan_anestesi').serialize(),
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

					$('#modal_persetujuan_tindakan_anestesi').modal('hide');

					window.open('<?= base_url('pemeriksaan_poli/cetak_persetujuan_tindakan_anestesi/') ?>' + id, 'Cetak Persetujuan Tindakan Anestesi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
					showListForm($('#id-pendaftaran-form-mpta').val(),$('#id-layanan-pendaftaran-form-mpta').val(), $('#id-pasien-form-mpta').val());  
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
<div class="modal fade" id="modal_persetujuan_tindakan_anestesi" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-persetujuan-tindakan-anestesi-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form_persetujuan_tindakan_anestesi class="form-horizontal"') ?>
					<input type="hidden" name="id_pasien" id="id-pasien-form-mpta">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-form-mpta">
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-form-mpta">
					<input type="hidden" name="id_saksi_1_mpta" id="id-saksi-1-mpta">
					<input type="hidden" name="id_saksi_2_mpta" id="id-saksi-2-mpta">

					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-persetujuan-tindakan-anestesi">
										<table class="table table-no-border table-sm table-striped">
											<tr>												
												<td class="bold" width="50%">Apakah form ditandatangani oleh pasien sendiri?</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="is_pasien_mpta" id="is-pasien-ya-mpta" value="ya" class="mr-1">Ya
													<input type="radio" name="is_pasien_mpta" id="is-pasien-tidak-mpta" value="tidak" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Nama keluarga / wali</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="nama_keluarga_mpta" class="custom-form" id="nama-keluarga-mpta">
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Tanggal lahir</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="tanggal_lahir_mpta" id="tanggal-lahir-mpta" class="custom-form clear-input col-lg-2">
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Jenis kelamin</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="jenis_kelamin_mpta" id="laki-laki-mpta" value="Laki-laki" class="mr-1">Laki-laki
													<input type="radio" name="jenis_kelamin_mpta" id="perempuan-mpta" value="Perempuan" class="mr-1 ml-2">Perempuan
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Alamat</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<textarea name="alamat_form_rekam_medis_mpta" id="alamat-form-rekam-medis-mpta" rows="3" class="form-control clear-input"></textarea>
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Hubungan keluarga</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="hubungan_keluarga_mpta" class="custom-form" id="hubungan-keluarga-mpta">
												</td>
											</tr>
											<tr>												
												<td class="bold" width="50%">Tindakan</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<textarea name="tindakan_mpta" id="tindakan-mpta" rows="3" class="form-control clear-input"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Saksi 1</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="saksi_1_mpta" id="saksi-1-mpta" class="select2c-input">
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Saksi 2</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="saksi_2_mpta" id="saksi-2-mpta" class="select2c-input">
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
				<button type="button" class="btn btn-info" onclick="simpanPersetujuanTindakanAnestesi()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
