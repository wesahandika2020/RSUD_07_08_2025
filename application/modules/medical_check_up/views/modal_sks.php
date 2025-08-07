<script>
    $(function() {
		$('#tanggal-periksa-sks').datetimepicker({
			format: 'DD/MM/YYYY',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#dokter-sks ').select2c({
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
				// $('#dokter-informasi').val(data.id);
				return data.nama;
			}
		});

	})	
	// On change for radio button is pasien      

	function simpanFormSKSehat() {
		var id = $('#id-layanan-pendaftaran-sks').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_sks") ?>',
			data: $('#form-sks').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				let hasil_mcu_sks = $('#hp_mcu').val();
				let hasil_mcu_skss = $('#hp_mcuu').val();


				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					$('#modal_sks').modal('hide');

					window.open('<?= base_url('medical_check_up/cetak_form_sks/') ?>' + id, 'Cetak Surat Keterangan Sehat', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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

<!-- Modal FormModal Form SKSehat -->
<div class="modal fade" id="modal_sks" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-sks-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-sks class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sks">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sks">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-sks">
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="5%">No. Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_surat_sks" class="custom-form col-lg-4"
													id="no-surat-sks" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="5%">Tahun Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tahun_surat_sks" class="custom-form col-lg-4"
													id="tahun-surat-sks" >
											</td>
										</tr>	
                                   		<tr>
											<td class="bold" width="5%">Nama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_pasien_sks" class="custom-form col-lg-4"
													id="nama-pasien-sks" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="5%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="jenis_kelamin_sks" class="custom-form col-lg-4" id="jenis-kelamin-sks" disabled >
											</td>
										</tr> 
										<tr>
											<td class="bold" width="5%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="alamat_sks" class="custom-form col-lg-4"
													id="alamat-sks" disabled>
											</td>
										</tr> 							
                                        <tr>
											<td class="bold" width="5%">Pekerjaan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="pekerjaan_sks" class="custom-form col-lg-4"
													id="pekerjaan-sks" disabled>
											</td>
										</tr>
										
                                        <tr>
											<td class="bold" width="5%">Tanggal Lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_lahir_sks" class="custom-form col-lg-4"
													id="tanggal-lahir-sks" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="5%">Tinggi Badan</td>
											<td class="bold" width="1%">:</td>
											<td width="20%">
											<div class="input-group">
												<input type="text" name="tinggi_badan_sks" 		id="tinggi-badan-sks" class="custom-form col-lg-1">
												<div class="input-group-append">
													<span class="input-group-custom">CM</span>
												</div>
											</div>	
											</td>
										</tr>                                       
										<tr>
											<td class="bold" width="5%">Berat Badan</td>
											<td class="bold" width="1%">:</td>
											<td width="20%">
												<div class="input-group">
													<input type="text" name="berat_badan_sks" 		id="berat-badan-sks" class="custom-form col-lg-1">
													<div class="input-group-append">
														<span class="input-group-custom">KG</span>
													</div>
												</div>				
											</td>											
										</tr>  										
										<tr>
											<td class="bold" width="5%">Tekanan Darah</td>
											<td class="bold" width="1%">:</td>
											<td width="20%">
											<div class="input-group">
												<input type="text" name="tensi_sistolik_sks" 		id="tensi-sistolik-sks" class="custom-form col-lg-1">
												<div class="input-group-append">
													<span class="input-group-custom">mmHg</span>
												</div>
											</div>													
											<div class="input-group">
												<input type="text" name="tensi_diastolik_sks" id="tensi-diastolik-sks" class="custom-form col-lg-1">
												<div class="input-group-append">
													<span class="input-group-custom">mmHg</span>
												</div>
											</div>
											</td>
										</tr>
										<tr>
											<td class="bold" width="5%">Nadi</td>
											<td class="bold" width="1%">:</td>
											<td width="20%">
											<div class="input-group">
												<input type="text" name="nadi_sks" id="nadi-sks" class="custom-form col-lg-1">
												<div class="input-group-append">
													<span class="input-group-custom">/Mnt</span>
												</div>
											</div>	
											</td>
										</tr>
										<tr>
											<td class="bold" width="5%">Pernafasan</td>
											<td class="bold" width="1%">:</td>
											<td width="20%">
											<div class="input-group">
												<input type="text" name="pernafasan_sks" id="pernafasan-sks" class="custom-form col-lg-1">
												<div class="input-group-append">
													<span class="input-group-custom">/Mnt</span>
												</div>
											</div>	
											</td>
										</tr>
										<tr>
											<td class="bold" width="5%">Hasil Pemeriksaan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<div class="input-group col-lg-4">
												<?= form_dropdown('hasil_pemeriksaan_mcu', ['SEHAT JASMANI' => 'SEHAT JASMANI', 'TIDAK SEHAT JASMANI' => 'TIDAK SEHAT JASMANI', 'SEHAT DENGAN CATATAN MEDIS' => 'SEHAT DENGAN CATATAN MEDIS', 'TIDAK LAYAK BEKERJA SEMENTARA' => 'TIDAK LAYAK BEKERJA SEMENTARA'], 'Jenis','id=hp_mcu class=custom-form ') ?>
												</div>	
											</td>
										</tr>  
										<tr>
											<td class="bold" width="5%">Keterangan Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="keterangan_surat_sks" class="custom-form col-lg-4"
													id="keterangan-surat-sks">
											</td>
										</tr>  
										<tr>
											<td class="bold" width="5%">Keterangan Surat (English)</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="keterangan_surat_english" class="custom-form col-lg-4"
													id="keterangan-surat-english">
											</td>
										</tr>  
										<tr>
											<td class="bold" width="5%">Catatan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">												
												<div class="col-lg-4">
													<textarea name="catatan_sks" id="catatan-sks" class="custom-textarea" rows="4"></textarea>
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" width="5%">Catatan (English)</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="textarea" name="notes_sks" class="custom-form col-lg-4"
													id="notes-sks">
											</td>
										</tr>
										<tr>
											<td class="bold" width="5%">Tanggal Pemeriksaan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_periksa_sks" class="custom-form col-lg-4"
													id="tanggal-periksa-sks">
											</td>
										</tr>       
										<tr>
                                            <td class="bold" width="5%">Dokter</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="48%">
                                                <input type="text" name="dokter_sks" id="dokter-sks" class="select2c-input">
                                            </td>
                                        </tr>  
										<tr>
										<td class="bold" width="5%">NIP/SIP</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="48%">
												<div class="input-group">
													<input type="radio" name="nip_sip" id="nik-mcu" value="NIP" class="mr-1" checked>NIP
													<input type="radio" name="nip_sip" id="sip-mcu" value="SIP" class="mr-1 ml-2" >SIP
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
				<button type="button" class="btn btn-info" onclick="simpanFormSKSehat()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Form SKSehat -->