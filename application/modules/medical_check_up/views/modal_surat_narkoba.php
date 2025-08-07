<script>
    $(function() {
		$('#tanggal-pemeriksaan-sbn').datetimepicker({
			format: 'DD/MM/YYYY',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#dokter-surat-narkoba').select2c({
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

    function simpanSBN() {
		var id = $('#id-layanan-pendaftaran-sbn').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_sbn") ?>',
			data: $('#surat-narkoba').serialize(),
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

					$('#modal_surat_narkoba').modal('hide');

					window.open('<?= base_url('medical_check_up/cetak_surat_narkoba/') ?>' + id, 'Cetak Surat Keterangan Bebas Narkoba', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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
<div class="modal fade" id="modal_surat_narkoba" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-surat-narkoba-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=surat-narkoba class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sbn">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sbn">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="surat-narkoba">
									<table class="table table-no-border table-sm table-striped">	
                                    <tr>
											<td class="bold" width="5%">No. Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_surat_sbn" class="custom-form col-lg-4"
													id="no-surat-sbn" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="5%">Tahun Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tahun_surat_sbn" class="custom-form col-lg-4"
													id="tahun-surat-sbn" >
											</td>
										</tr>										
                                        <tr>
											<td class="bold" width="10%">Nama</td>
											<td class="bold" width="1%">:</td>
											<td width="50%">
												<input type="text" name="nama_pasien_sbn" class="custom-form col-lg-6"
													id="nama-pasien-surat-narkoba" disabled>
											</td>
										</tr>										
										<tr>
											<td class="bold" width="10%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="50%">
												<input type="text" name="jenis_kelamin_sbn" class="custom-form col-lg-6"
													id="jenis-kelamin-surat-narkoba" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="10%">Tanggal Lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="50%">
												<input type="text" name="tanggal_lahir_sbn" class="custom-form col-lg-6"
													id="tanggal-lahir-sbn" disabled>
											</td>
										</tr>				                                        
                                        <tr>
											<td class="bold" width="10%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="50%">
												<input type="text" name="alamat_sbn" class="custom-form col-lg-6"
													id="alamat-surat-narkoba" disabled>
											</td>
										</tr> 
										<tr>
											<td class="bold" width="10%">Pekerjaan</td>
											<td class="bold" width="1%">:</td>
											<td width="50%">
												<input type="text" name="pekerjaan_sbn" class="custom-form col-lg-6"
													id="pekerjaan-pasien-sbn" disabled>
											</td>
										</tr>   
										<tr>
											<td class="bold" width="10%">Tanggal Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="50%">
												<input type="text" name="tanggal_surat_sbn" class="custom-form col-lg-6"
													id="tanggal-pemeriksaan-sbn">
											</td>
										</tr>
										<tr>
                                            <td class="bold" width="10%">Dokter Medical Check Up</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="50%">
                                                <input type="text" name="dokter_sbn" id="dokter-surat-narkoba" class="select2c-input">
                                            </td>
                                        </tr> 
                                        <tr>
										<td class="bold" width="5%">NIP/SIP</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="50%">
												<div class="input-group">
													<input type="radio" name="nip_sip" id="nik-sbn" value="NIP" class="mr-1" checked>NIP
													<input type="radio" name="nip_sip" id="sip-sbn" value="SIP" class="mr-1 ml-2" >SIP
												</div>
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
				<button type="button" class="btn btn-info" onclick="simpanSBN()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Form SKPK MCU -->