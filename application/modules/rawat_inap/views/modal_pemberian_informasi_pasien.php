<script>
    $(function() {
		$('#tanggal-waktu-pemberian-informasi').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#dokter-informasi').select2c({
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
				$('#dokter-informasi').val(data.id);
				return data.nama;
			}
		});

	})	
	// On change for radio button is pasien
	           
		
	function simpanPemberianInformasiPasien() {
		var id = $('#id-layanan-pendaftaran-informasi').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_pemberian_informasi_pasien") ?>',
			data: $('#pemberian-informasi-pasien').serialize(),
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

					$('#modal_pemberian_informasi_pasien').modal('hide');

					window.open('<?= base_url('rawat_inap/cetak_form_pemberian_informasi_pasien/') ?>' + id, 'Cetak Formulir Pemberian Informasi Pasien dan Keluarga', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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
<div class="modal fade" id="modal_pemberian_informasi_pasien" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-pemberian-informasi-pasien-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=pemberian-informasi-pasien class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-informasi">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="pemberian-informasi-pasien">
									<table class="table table-no-border table-sm table-striped">										
                                        <tr>
											<td class="bold" width="50%">Unit Kerja</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="unit_kerja" class="custom-form col-lg-6"
													id="unit-kerja-pemberian-informasi" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Nama keluarga / wali</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_keluarga" class="custom-form col-lg-6"
													id="nama-keluarga-informasi">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Hubungan keluarga</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="hubungan_keluarga" class="custom-form col-lg-6"
													id="hubungan-keluarga-informasi">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="50%">Tanggal & Waktu</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_waktu" class="custom-form col-lg-6"
													id="tanggal-waktu-pemberian-informasi">
											</td>
										</tr>
										
                                        <tr>
											<td class="bold" width="50%">Materi Edukasi</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="materi_edukasi" class="custom-form col-lg-6"
													id="materi-edukasi-pemberian-informasi">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="50%">Daftar Pertanyaan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="daftar_pertanyaan" class="custom-form col-lg-6"
													id="daftar-pertanyaan-pemberian-informasi">
											</td>
										</tr>
                                        <tr>
                                            <td class="bold" width="50%">Dokter</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="48%">
                                                <input type="text" name="dokter" id="dokter-informasi" class="select2c-input">
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
				<button type="button" class="btn btn-info" onclick="simpanPemberianInformasiPasien()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
