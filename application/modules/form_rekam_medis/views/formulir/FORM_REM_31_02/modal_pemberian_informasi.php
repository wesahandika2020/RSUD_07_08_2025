<!-- // PWHI -->
<script>
	$(function() {		
		$('#dokter-pelaksana-tindakan-pi').select2c({
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
				$('#id-dokter-pelaksana-tindakan-pi').val(data.id);
				return data.nama;
			}
		});	
		

		$('#tanggal-jam-pi')
            .datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) {
				if ($(i).attr('readonly')) {
					return false;
				}
			}
		});

		$('#btn_reset').on('click', function() {
			resetModalPemberianInformasi();
		});

	})
	
	// On change for radio button is pasien
	$('input[type=radio][name=is_pasien]').change(function(){ 
		// Conditions
		if (this.value == 1) {
			// Set fields to empty string
			$('#nama-keluarga-pi').val('');					
			$('#pemberi-informasi-pi').val('');					
			$('#penerima-informasi-pi').val('');					
			
			// Disabled fields
			$( "#nama-keluarga-pi" ).prop( "disabled", true );					
			$( "#pemberi-informasi-pi" ).prop( "disabled", true );					
			$( "#penerima-informasi-pi" ).prop( "disabled", true );					
		} else if (this.value == 0) {
			// Undisabled fields
			$( "#nama-keluarga-pi" ).prop( "disabled", false );					
			$( "#pemberi-informasi-pi" ).prop( "disabled", false );					
			$( "#penerima-informasi-pi" ).prop( "disabled", false );					
		}
	});

	      


	// function simpanPemberianInformasi() {
	// 	var id = $('#id-layanan-pendaftaran-pi').val();
		
	// 	if ($(this).is(":checked")) {
    //         $('#status-prjogd-13').prop('disabled', false);
    //     } else {
    //         $('#status-prjogd-13').val('');
    //         $('#status-prjogd-13').prop('disabled', true);
    //     }
		
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_pemberian_informasi") ?>',
	// 		data: $('#form-pemberian-informasi').serialize(),
	// 		cache: false,
	// 		dataType: 'JSON',
	// 		beforeSend: function() {
	// 			showLoader();
	// 		},
	// 		success: function(data) {
	// 			if (data.status) {
	// 				messageCustom(data.message, 'Success');

	// 				var dWidth = $(window).width();
	// 				var dHeight = $(window).height();
	// 				var x = screen.width / 2 - dWidth / 2;
	// 				var y = screen.height / 2 - dHeight / 2;

	// 				$('#modal-pemberian-informasi').modal('hide');

	// 				window.open('<?= base_url('pemeriksaan_poli/cetak_pemberian_informasi/') ?>' + id, 'Cetak Pemberian Informasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	// 				showListForm($('#id-pendaftaran-pi').val(), $('#id-layanan-pendaftaran-pi').val(), $('#id-pasien-pi').val());   
	// 			} else {
	// 				messageCustom(data.message, 'Error');
	// 			}
	// 		},
	// 		complete: function(data) {
	// 			hideLoader();
	// 		},
	// 		error: function(e) {
	// 			messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
	// 		}
	// 	});
	// }


	function simpanPemberianInformasi() {
		if ($('#dokter-pelaksana-tindakan-pi').val() === '') {
            syams_validation('#dokter-pelaksana-tindakan-pi', 'Dokter harus diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-pelaksana-tindakan-pi');
        }

		if ($('#tanggal-jam-pi').val() === '') {
            syams_validation('#tanggal-jam-pi', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-jam-pi');
        }

		if ($(this).is(":checked")) {
            $('#status-prjogd-13').prop('disabled', false);
        } else {
            $('#status-prjogd-13').val('');
            $('#status-prjogd-13').prop('disabled', true);
        }

		var id_pendaftaran = $('#id-pendaftaran-pi').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-pi').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_pemberian_informasi") ?>',
			data: $('#form-pemberian-informasi').serialize(),
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

					tableListPermintaanPemberianInformasi(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-pi').val(), $('#id-layanan-pendaftaran-pi').val(), $('#id-pasien-pi').val());
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				// messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
				messageCustom('Terjadi Kesalahan : '+ e.statusText +' ('+e.status+')', 'Error');
			}
		});
	}

</script>

<div class="modal fade" id="modal-pemberian-informasi" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-pemberian-informasi-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-pemberian-informasi class="form-horizontal"') ?>
					<!-- <input type="hidden" name="id_pasien" id="id-pasien-pi">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pi">
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pi">
					<input type="hidden" name="id_dokter_pelaksana_tindakan" id="id-dokter-pelaksana-tindakan-pi"> -->

					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pi">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pi">
					<input type="hidden" name="id_dokter_pelaksana_tindakan" id="id-dokter-pelaksana-tindakan-pi">
					<input type="hidden" name="id_pasien" id="id-pasien-pi">
					<input type="hidden" name="id_pi" id="id-pi">
					<input type="hidden" name="action" id="action-pi">

					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-modal-pemberian-informasi">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td colspan="2">Apakah form ditandatangani oleh pasien sendiri?<span class="text-red">*</span></td>
												<td width="1%">:</td>
												<td colspan="2">
													<input type="radio" name="is_pasien" id="is-pasien-pi-ya" value="1" class="mr-1" checked>Ya
													<input type="radio" name="is_pasien" id="is-pasien-pi-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td colspan="2">Nama Keluarga</td>
												<td width="1%">:</td>
												<td colspan="2">
													<input type="text" name="nama_keluarga" class="custom-form" id="nama-keluarga-pi">
												</td>
											</tr>
											<tr>
												<td colspan="2">Dokter Pelaksana Tindakan</td>
												<td width="1%">:</td>
												<td colspan="2">
													<input type="text" name="dokter_pelaksana_tindakan" id="dokter-pelaksana-tindakan-pi" class="select2c-input">
												</td>
											</tr>	
											<tr>
												<td colspan="2">Tanggal/Jam</td>
												<td width="1%">:</td>
												<td colspan="2">
													<input type="text" name="tanggal_jam_pi" id="tanggal-jam-pi" class="custom-form clear-input d-inline-block col-lg-2">
												</td>
											</tr>	
											<tr>
												<td colspan="2">Pemberi informasi</td>
												<td width="1%">:</td>
												<td colspan="2">
													<input type="text" name="pemberi_informasi" class="custom-form" id="pemberi-informasi-pi">
												</td>
											</tr>
											<tr>
												<td colspan="2">Penerima informasi</td>
												<td width="1%">:</td>
												<td colspan="2">
													<input type="text" name="penerima_informasi" class="custom-form" id="penerima-informasi-pi">
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="2" align="center">Jenis informasi</td>
												<td class="bold" colspan="2" align="center">Isi informasi</td>
												<td class="bold" width="10%" align="center">Tanda (V)</td>
											</tr>
											<tr>
												<td width="1%">1.</td>
												<td width="20%">Diagnosis kerja & diagnosis banding</td>
												<td colspan="2">
													<input type="text" name="diagnosis_kerja" class="custom-form" id="diagnosis-kerja-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="diagnosis_kerja_check" id="diagnosis-kerja-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">2.</td>
												<td width="20%">Dasar diagnosis</td>
												<td colspan="2">
													<input type="text" name="dasar_diagnosis" class="custom-form" id="dasar-diagnosis-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="dasar_diagnosis_check" id="dasar-diagnosis-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">3.</td>
												<td width="20%">Tindakan kedokteran</td>
												<td colspan="2">
													<input type="text" name="tindakan_kedokteran" class="custom-form" id="tindakan-kedokteran-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="tindakan_kedokteran_check" id="tindakan-kedokteran-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">4.</td>
												<td width="20%">Indikasi tindakan</td>
												<td colspan="2">
													<input type="text" name="indikasi_tindakan" class="custom-form" id="indikasi-tindakan-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="indikasi_tindakan_check" id="indikasi-tindakan-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">5.</td>
												<td width="20%">Tata cara</td>
												<td colspan="2">
													<input type="text" name="tata_cara" class="custom-form" id="tata-cara-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="tata_cara_check" id="tata-cara-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">6.</td>
												<td width="20%">Tujuan</td>
												<td colspan="2">
													<input type="text" name="tujuan" class="custom-form" id="tujuan-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="tujuan_check" id="tujuan-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">7.</td>
												<td width="20%">Risiko dan komplikasi</td>
												<td colspan="2">
													<input type="text" name="risiko_komplikasi" class="custom-form" id="risiko-komplikasi-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="risiko_komplikasi_check" id="risiko-komplikasi-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">8.</td>
												<td width="20%">
													Prognosis <br>
													<i>Prognosis vital, prognosis fungsi dan prognosis kesembuhan</i>
												</td>
												<td colspan="2">
													<input type="text" name="prognosis" class="custom-form" id="prognosis-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="prognosis_check" id="prognosis-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">9.</td>
												<td width="20%">
													Alternatif & resiko <br>
													<i>Pilihan pengobatan / pelaksanaan</i>
												</td>
												<td colspan="2">
													<input type="text" name="alternatif_resiko" class="custom-form" id="alternatif-resiko-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="alternatif_resiko_check" id="alternatif-resiko-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">10.</td>
												<td width="20%">
													Hal lain yan akan dilakukan untuk <br>
													<i>Menyelamatkan pasien</i> <br>
													<i>Perluasan tindakan</i> <br>
													<i>Konsultasi selama tindakan</i> <br>
													<i>Resuisitasi</i> <br>
												</td>
												<td colspan="2">
													<input type="text" name="menyelamatkan_pasien" class="custom-form" id="menyelamatkan-pasien-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="menyelamatkan_pasien_check" id="menyelamatkan-pasien-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">11.</td>
												<td width="20%">Kebutuhan, risiko, manfaat dan alternatif penggunaan darah dan produk darah</td>
												<td colspan="2">
													<input type="text" name="penggunaan_darah" class="custom-form" id="penggunaan-darah-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="penggunaan_darah_check" id="penggunaan-darah-check-pi">
												</td>
											</tr>
											<tr>
												<td width="1%">12.</td>
												<td width="20%">Pemberian analgesia pasca tindakan</td>
												<td colspan="2">
													<input type="text" name="analgesia" class="custom-form" id="analgesia-pi">
												</td>
												<td width="10%" align="center">
													<input type="checkbox" value="1" name="analgesia_check" id="analgesia-check-pi">
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?= form_close() ?>

				<div class="row">
					<table width="100%">
						<tr>
							<td width="79%">
								<div class="col-lg-8">
									<button type="button" class="btn btn-primary mr-1" onclick="simpanPemberianInformasi()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Pemberian Informasi</button>
									<button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									<button type="button" class="btn btn-success hide" onclick="simpanPemberianInformasi()" id="btn_update_ip"> <i class="fas fa-edit mr-1"></i>Update Pemberian Informasi</button>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
					</table>
				</div>
				<div class="widget-body mt-4">
					<div class="row">
						<div class="table-responsive">
							<table class="table table-sm table-striped table-bordered" id="table-list-pi">
								<thead style="background-color: #B0C4DE;">
									<tr>
										<th width="3%" class="center">No</th>
										<th width="12%" class="center">Tanggal/Jam</th>
										<th width="18%" class="center">Dokter Pelaksana Tindakan</th>
										<th width="18%" class="center">Petugas</th>
										<th width="17%" class="center">Alat</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
			</div>

			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanPemberianInformasi()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div> -->

		</div>
	</div>
</div>
