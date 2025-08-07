<script>
    $(function() {
		$('#tanggal-waktu-sk-dinkes').datetimepicker({
			format: 'DD/MM/YYYY',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#dokter-sk-dinkes').select2c({
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

	function simpanFormSKDinkes() {
		var id = $('#id-pendaftaran-sk-dinkes').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_sk_dinkes") ?>',
			data: $('#sk-dinkes').serialize(),
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

					$('#modal_sk_dinkes').modal('hide');

					window.open('<?= base_url('medical_check_up/cetak_sk_dinkes/') ?>' + id, 'Cetak Surat Keterangan Pengujian Kesehatan(KEMENKES)', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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

<!-- Modal FormModal Form SKPK MCU -->
<div class="modal fade" id="modal_sk_dinkes" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-sk-dinkes-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=sk-dinkes class="form-horizontal"') ?>
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sk-dinkes">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="sk-dinkes">
									<table class="table table-no-border table-sm table-striped">										
                                        <tr>
											<td class="bold" width="50%">Nama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_pasien_sk" class="custom-form col-lg-6"
													id="nama-pasien-sk-dinkes" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Nama Kecil</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_kecil_sk" class="custom-form col-lg-6"
													id="nama-kecil-sk-dinkes" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">NIP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nip_sk" class="custom-form col-lg-6"
													id="nip-sk-dinkes" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="jenis_kelamin_sk" class="custom-form col-lg-6"
													id="jenis-kelamin-sk-dinkes" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="50%">Pekerjaan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="pekerjaan_sk" class="custom-form col-lg-6"
													id="pekerjaan-sk-dinkes" disabled>
											</td>
										</tr>
										
                                        <tr>
											<td class="bold" width="50%">Gol.Ruang</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="gol_ruang_sk" class="custom-form col-lg-6"
													id="gol-ruang-sk-dinkes" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Karpeg</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="karpeg_sk" class="custom-form col-lg-6"
													id="karpeg-sk-dinkes" >
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="50%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="alamat_sk" class="custom-form col-lg-6"
													id="alamat-sk-dinkes" disabled>
											</td>
										</tr> 
										<tr>
											<td class="bold" width="50%">Salinan Hasil 1</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="salin_hasil_satu" class="custom-form col-lg-6"
													id="salin-hasil-satu" >
											</td>
										</tr>     
										<tr>
											<td class="bold" width="50%">Salinan Hasil 2</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="salin_hasil_dua" class="custom-form col-lg-6"
													id="salin-hasil-dua" >
											</td>
										</tr> 
										<tr>
											<td class="bold" width="50%">Salinan Hasil 3</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="salin_hasil_tiga" class="custom-form col-lg-6"
													id="salin-hasil-tiga" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Tanggal Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_surat_sk" class="custom-form col-lg-6"
													id="tanggal-waktu-sk-dinkes">
											</td>
										</tr>
										<tr>
                                            <td class="bold" width="50%">Dokter Penguji Kesehatan</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="48%">
                                                <input type="text" name="dokter_sk_dinkes" id="dokter-sk-dinkes" class="select2c-input">
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
				<button type="button" class="btn btn-info" onclick="simpanFormSKDinkes()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Form SKPK MCU -->