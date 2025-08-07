<script>
	// RH
	$(function() {
		$('#tanggal-rehabilitas').datetimepicker({
			format: 'DD/MM/YYYY',
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
			resetModalRehabilitasMedik();
		});

		$('#dokter-rehabilitas').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function(data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					};
				}
			},
			formatResult: function(data) {
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				// $('#dokter-informasi').val(data.id);
				return data.nama;
			}
		});

	})

	function simpanRehabilitasMedik() {
		if ($('#dokter-rehabilitas').val() === '') {
            syams_validation('#dokter-rehabilitas', 'Dokter harus diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-rehabilitas');
        }

		if ($('#tanggal-rehabilitas').val() === '') {
            syams_validation('#tanggal-rehabilitas', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-rehabilitas');
        }

		var id_pendaftaran = $('#id-pendaftaran-rehabilitas').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-rehabilitas').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_operasi/api/order_operasi/simpan_rehabilitas_medik") ?>',
			data: $('#rehabilitas-medik').serialize(),
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

					tableListRehabilitasMedik(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-rehabilitas').val(), $('#id-layanan-pendaftaran-rehabilitas').val(), $('#id-pasien-rehabilitas').val());
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


<div class="modal fade" id="modal_rehabilitas_medik" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-rehabilitas-medik-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=rehabilitas-medik class="form-horizontal"') ?>
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-rehabilitas">
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-rehabilitas">
				<input type="hidden" name="id_pasien" id="id-pasien-rehabilitas">
				<input type="hidden" name="id_rehabilitas" id="id-rehabilitas">
				<input type="hidden" name="action" id="action-rehabilitas">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="rehabilitas-medik">
									<table class="table table-no-border table-sm table-striped">

										<tr>
											<td class="bold" width="15%">Nama Pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
                                                <input type="text" name="nama_pasien_rehabilitas" id="nama-pasien-rehabilitas"class="custom-form clear-input d-inline-block col-lg-2"disabled>
											</td>
										</tr>
										<tr>
                                            <td class="bold" width="15%">Tanggal Lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
                                                <input type="text" name="tgl_lahir_pasien_rehabilitas" id="tgl-lahir-pasien-rehabilitas"class="custom-form clear-input d-inline-block col-lg-2"disabled>
											</td>
										</tr>
										<tr>
                                            <td class="bold" width="15%">No Rm</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
                                                <input type="text" name="no_rm_pasien_rehabilitas" id="no-rm-pasien-rehabilitas"class="custom-form clear-input d-inline-block col-lg-2"disabled>
											</td>
										</tr>
										<tr>
                                            <td class="bold" width="15%">No Registrasi</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
                                                <input type="text" name="register_rehabilitas" id="register-rehabilitas"class="custom-form clear-input d-inline-block col-lg-2"disabled>
											</td>
										</tr>
                                        
                                        <tr>
                                            <td class="bold" width="15%">Tanggal Pelayanan</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
                                                <input type="text" name="tgl_pelayanan_rehabilitas" id="tgl-pelayanan-rehabilitas"class="custom-form clear-input d-inline-block col-lg-2"disabled>
											</td>
										</tr>

                                        <tr>
											<td class="bold" width="15%">Anamnesa</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<!-- <textarea name="anamnesa_rehabilitas" id="anamnesa-rehabilitas" class="custom-textarea" rows="3"></textarea> -->
												<!-- <textarea name="anamnesa_rehabilitas" cols="30" rows="3" class="form-control clear-input custom-textarea" id="anamnesa-rehabilitas" disabled></textarea> -->
												<label id="anamnesa-rehabilitas"></label>

											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Pemeriksaan Fisik dan Uji Fungsi</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<textarea name="pemeriksaan_rehabilitas" id="pemeriksaan-rehabilitas" class="custom-textarea" rows="3"></textarea>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Diagnosis Medis (ICD-10)</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<!-- <span id="diagnosis-medis-rehabilitas"></span> -->
												<label id="diagnosis-medis-rehabilitas"></label>
												<!-- <textarea name="diagnosis_medis_rehabilitas" id="diagnosis-medis-rehabilitas" class="custom-textarea" rows="3"></textarea> -->
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Diagnosis Fungsi (ICD-10)</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<label id="diagnosis-fungsi-rehabilitas"></label>
												<!-- <textarea name="diagnosis_fungsi_rehabilitas" id="diagnosis-fungsi-rehabilitas" class="custom-textarea" rows="3"></textarea> -->
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Pemeriksaan Penunjang</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<!-- <textarea name="pmeriksaan_penunjang_rehabilitas" id="pmeriksaan-penunjang-rehabilitas" class="custom-textarea" rows="3"></textarea> -->
												<!-- <textarea name="pmeriksaan_penunjang_rehabilitas" cols="30" rows="3" class="form-control clear-input custom-textarea" id="pmeriksaan-penunjang-rehabilitas" disabled></textarea> -->
												<label id="pmeriksaan-penunjang-rehabilitas"></label>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Tata Laksana KFR (ICD 9 CM)</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<!-- <textarea name="tata_laksana_rehabilitas" id="tata-laksana-rehabilitas" class="custom-textarea" rows="3"></textarea> -->
												<!-- <textarea name="tata_laksana_rehabilitas" cols="30" rows="3" class="form-control clear-input custom-textarea" id="tata-laksana-rehabilitas" disabled></textarea> -->
												<label id="tata-laksana-rehabilitas"></label>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Rekomendasi</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<textarea name="rekomendasi_rehabilitas" id="rekomendasi-rehabilitas" class="custom-textarea" rows="3"></textarea>
											</td>
										</tr>
                                       
                                        <tr>
											<td class="bold" width="15%">Evaluasi</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<textarea name="evaluasi_disabilitas" id="evaluasi-disabilitas" class="custom-textarea" rows="3"></textarea>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Suspek Penyakit Akibat Kerja</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<div class="input-group">
													<input type="radio" name="suspek_rehabilitas" id="suspek-rehabilitas-ya" value="Ya" class="mr-1">Ya
													<input type="radio" name="suspek_rehabilitas" id="suspek-rehabilitas-tidak" value="Tidak" class="mr-1 ml-2">Tidak
												</div>
											</td>
										</tr>
                                     
										<tr>
											<td class="bold" width="15%">Tanggal</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<input type="text" name="tanggal_rehabilitas" class="custom-form col-lg-2" id="tanggal-rehabilitas">
											</td>
										</tr>

										<tr>
											<td class="bold" width="15%">Dokter KFR</td>
											<td class="bold" width="1%">:</td>
											<td width="79%">
												<input type="text" name="dokter_rehabilitas" id="dokter-rehabilitas" class="select2c-input">
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
				<div class="row">
					<table width="100%">
						<tr>
							<td class="bold" width="15%"></td>
							<td class="bold" width="1%"></td>
							<td width="79%">
								<div class="col-lg-8">
									<button type="button" class="btn btn-primary mr-1" onclick="simpanRehabilitasMedik()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Formulir</button>
									<button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									<button type="button" class="btn btn-success hide" onclick="simpanRehabilitasMedik()" id="btn_update_rh"> <i class="fas fa-edit mr-1"></i>Update Formulir</button>
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
							<table class="table table-sm table-striped table-bordered" id="table-list-rehabilitas">
								<thead style="background-color: #B0C4DE;">
									<tr>
										<th width="3%" class="center">No</th>
										<th width="12%" class="center">Tanggal</th>
										<th width="18%" class="center">Dokter KFR</th>
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
		</div>
	</div>
</div>


