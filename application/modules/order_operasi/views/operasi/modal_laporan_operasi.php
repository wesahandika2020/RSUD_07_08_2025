<script>

	$(function() {
		$('#laporan-tanggal-operasi').datetimepicker({
			format: 'DD/MM/YYYY',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#laporan-jam-mulai-operasi, #laporan-jam-selesai-operasi').timepicker({
			format: 'HH:mm',
			showInputs: true,
			showMeridian: false
		});

		$('#laporan-dokter-bedah-operasi ').select2c({
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

		$('#asisten-operasi').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: '18',
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
				var markup = '<b>'+data.nama+'</b> <br/>'+data.spesialisasi;
				return markup;
			}, 
			formatSelection: function(data){
				return data.nama;
			}
		});

		$('#insumentator-operasi').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: '18',
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
				var markup = '<b>'+data.nama+'</b> <br/>'+data.spesialisasi;
				return markup;
			}, 
			formatSelection: function(data){
				return data.nama;
			}
		});

		$('#sirkuler-operasi').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: '18',
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
				var markup = '<b>'+data.nama+'</b> <br/>'+data.spesialisasi;
				return markup;
			}, 
			formatSelection: function(data){
				return data.nama;
			}
		});
	})

	function simpanLaporanOperasi() {
		var id = $('#id-layanan-pendaftaran-lap-operasi').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_operasi/api/order_operasi/simpan_laporan_operasi") ?>',
			data: $('#laporan-operasi').serialize(),
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

					$('#modal_laporan_operasi').modal('hide');

					window.open('<?= base_url('order_operasi/laporan_operasi/') ?>' + id, 'Cetak Laporan Operasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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


<div class="modal fade" id="modal_laporan_operasi" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-laporan-operasi-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=laporan-operasi class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-lap-operasi">

				<!-- content -->
				<div class="row">
						<div class="col-lg-8">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="laporan-operasi">
										<table class="table table-no-border table-sm table-striped">
											
											<tr>
												<td class="bold" colspan="25%">Diagnosa Pra Bedah</td>
												<td class="bold" width="1%">:</td>
												<td colspan="50%">
													<input type="text" name="diagnosa_pra_bedah" class="custom-form col-lg-8" id="diagnosa-pra-bedah">
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="25%">Diagnosa Pasca Bedah</td>
												<td class="bold" width="1%">:</td>
												<td colspan="50%">
													<input type="text" name="diagnosa_pasca_bedah" class="custom-form col-lg-8" id="diagnosa-pasca-bedah">
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="25%">Prosedur Operasi</td>
												<td class="bold" width="1%">:</td>
												<td colspan="50%">
													<input type="text" name="prosedur_operasi" class="custom-form col-lg-8" id="prosedur-operasi">
												</td>
											</tr>
											<tr>
											<td class="bold"colspan="25%">Pemeriksaan Specimen</td>
											<td class="bold" width="1%">:</td>
											<td  colspan="50%">
												<div class="input-group">
													<input type="radio" name="pemeriksaan_specimen_operasi"
														id="tidak-operasi" value="Tidak"
														class="mr-1">Tidak
													<input type="radio" name="pemeriksaan_specimen_operasi"
														id="pa-operasi" value="PA"
														class="mr-1 ml-2"> PA
													<input type="radio" name="pemeriksaan_specimen_operasi"
														id="kultur-operasi" value="Kultur" class="mr-1 ml-2">Kultur
													<input type="radio" name="pemeriksaan_specimen_operasi"
														id="sitologi-operasi" value="Sitologi" class="mr-1 ml-2">Sitologi
													<input type="radio" name="pemeriksaan_specimen_operasi" id="specimen-lainnya"
														value="Lainnya" class="mr-1 ml-2"> Lainnya
													<input type="text" name="pemeriksaan_specimen_operasi_lainnya" id="lainnya-operasi"
														class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Jelaskan...">
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Golongan Operasi</td>
											<td class="bold" width="1%">:</td>
											<td  colspan="50%">
												<div class="input-group">
													<input type="radio" name="golongan_operasi"
														id="golongan-operasi-kecil" value="Kecil"
														class="mr-1">Kecil
													<input type="radio" name="golongan_operasi"
														id="golongan-operasi-khusus" value="Khusus"
														class="mr-1 ml-2"> Khusus
													<input type="radio" name="golongan_operasi"
														id="golongan-operasi-sedang" value="Sedang" class="mr-1 ml-2">Sedang
													<input type="radio" name="golongan_operasi"
														id="golongan-operasi-besar" value="Besar" class="mr-1 ml-2">Besar													
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Kategori Operasi</td>
											<td class="bold" width="1%">:</td>
											<td  colspan="50%">
												<div class="input-group">
													<input type="radio" name="kategpri_operasi"
														id="kategori-operasi-cito" value="Cito"
														class="mr-1">Cito
													<input type="radio" name="kategpri_operasi"
														id="kategori-operasi-elektif" value="Elektif"
														class="mr-1 ml-2"> Elektif																									
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Komplikasi</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
												<input type="text" name="komplikasi_operasi" class="custom-form col-lg-8" id="komplikasi-operasi">
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Jumlah darah yang hilang</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
											<input type="text" name="jumlah_darah_hilang_operasi" id="jumlah-darah-operasi" class="custom-form clear-input d-inline-block col-lg-4  disabled"> ml
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Transfusi</td>
											<td class="bold" width="1%">:</td>
											<td  colspan="50%">
												<div class="input-group">
												<input type="radio" name="tranfusi_operasi" id="tranfusi-operasi-ya" value="Ya" class="mr-1">Ya
												<input type="radio" name="tranfusi_operasi" id="tranfusi-operasi-tidak" value="Tidak" class="mr-1 ml-2">Tidak												
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Pemasangan Implan</td>
											<td class="bold" width="1%">:</td>
											<td  colspan="50%">
												<div class="input-group">
												<input type="radio" name="pemasangan_implan_operasi" id="pemasangan-implan-operasi-ya" value="Ya" class="mr-1">Ya
												<input type="radio" name="pemasangan_implan_operasi" id="pemasangan-implan-operasi-tidak" value="Tidak" class="mr-1 ml-2">Tidak												
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Jenis/Jumlah</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
											<input type="text" name="jenis_jumlah_operasi" id="jenis-jumlah-operasi" class="custom-form clear-input d-inline-block col-lg-4 disabled"> ml
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Jenis Anestesi</td>
											<td class="bold" width="1%">:</td>
											<td  colspan="50%">
												<div class="input-group">
													<input type="radio" name="jenis_anestesi_operasi"
														id="regional-operasi" value="Regional"
														class="mr-1">Regional
													<input type="radio" name="jenis_anestesi_operasi"
														id="general-operasi" value="General"
														class="mr-1 ml-2">General
													<input type="radio" name="jenis_anestesi_operasi"
														id="lokal-operasi" value="Lokal" class="mr-1 ml-2">Lokal										
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Jenis Operasi</td>
											<td class="bold" width="1%">:</td>
											<td  colspan="50%">
												<div class="input-group">
													<input type="radio" name="laporan_jenis_oeprasi"
														id="bersih-operasi" value="Bersih"
														class="mr-1">Bersih
													<input type="radio" name="laporan_jenis_oeprasi"
														id="bersih-kontra-operasi" value="Bersih Terkontaminasi"
														class="mr-1 ml-2"> Bersih Terkontaminasi
													<input type="radio" name="laporan_jenis_oeprasi"
														id="kotor-operasi" value="Kotor" class="mr-1 ml-2">Kotor										
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Jaringan yang di eksisi/insisi</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
												<input type="text" name="jaringan_eksisi_oprasi" class="custom-form col-lg-8" id="jaringan-eksisi-operasi">
											</td>
										</tr>	
										<tr>
											<td class="bold" colspan="25%">Tanggal Operasi</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
											<input type="text" name="laporan_tanggal_operasi" class="custom-form col-lg-8" id="laporan-tanggal-operasi">
											</td>
										</tr>	
										<tr>
											<td class="bold" colspan="25%">Jam Operasi Dimulai</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
											<input type="text" name="laporan_jam_mulai_operasi" id="laporan-jam-mulai-operasi" class="custom-form clear-input d-inline-block col-lg-5 mr-1">
											</td>
										</tr>	
										<tr>
											<td class="bold" colspan="25%">Jam Operasi Selesai</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
											<input type="text" name="laporan_jam_selesai_operasi" id="laporan-jam-selesai-operasi" class="custom-form clear-input d-inline-block col-lg-5 mr-1">
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Durasi Operasi</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
												<input type="text" name="laporan_durasi_operasi" class="custom-form col-lg-8" id="laporan-durasi-operasi">
											</td>
										</tr>	
										<tr>
											<td class="bold" colspan="25%">Dokter Bedah</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
											<input type="text" name="laporan_dokter_bedah_operasi" id="laporan-dokter-bedah-operasi" class="select2c-input">
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Asisten</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
											<input type="text" name="asisten_operasi" id="asisten-operasi" class="select2c-input">
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Insumentator</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
											<input type="text" name="insumentator_operasi" id="insumentator-operasi" class="select2c-input">
											</td>
										</tr>
										<tr>
											<td class="bold" colspan="25%">Sirkuler</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">
											<input type="text" name="sirkuler_operasi" id="sirkuler-operasi" class="select2c-input">
											</td>
										</tr>	
										<tr>
											<td class="bold" colspan="25%">Catatan Operasi</td>
											<td class="bold" width="1%">:</td>
											<td colspan="50%">												
												<div class="col-lg-8">
													<textarea name="laporan_catatan_operasi" id="laporan-catatan-operasi" class="custom-textarea" rows="4"></textarea>
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
				<button type="button" class="btn btn-info" onclick="simpanLaporanOperasi()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
