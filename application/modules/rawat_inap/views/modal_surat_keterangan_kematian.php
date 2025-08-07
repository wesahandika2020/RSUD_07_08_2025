<script>
	$(function() {		
		$('#dokter-pemeriksa-skk').select2c({
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
				$('#id-pemeriksa-skk').val(data.id);
				return data.nama;
			}
		});		

		$('#waktu-pemeriksaan-skk').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});
	})	

	function simpanSuratKeteranganKematian() {
		var id = $('#id-layanan-pendaftaran-skk').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_surat_keterangan_kematian") ?>',
			data: $('#form-surat-keterangan-kematian').serialize(),
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

					$('#modal-surat-keterangan-kematian').modal('hide');

					window.open('<?= base_url('pendaftaran_poli/cetak_surat_keterangan_kematian/') ?>' + id, 'Cetak Surat Keterangan kematian', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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
<div class="modal fade" id="modal-surat-keterangan-kematian" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-surat-keterangan-kematian-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-surat-keterangan-kematian class="form-horizontal"') ?>
					<input type="hidden" name="id_pendaftaran" id="id-layanan-pendaftaran-skk">
					<input type="hidden" name="id_dokter_pemeriksa" id="id-pemeriksa-skk">

					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-modal-surat-keterangan-kematian">
										<table class="table table-no-border table-sm table-striped">											
											<tr>
												<td width="25%">Nomor Surat Kematian</td>
												<td width="1%">:</td>
												<td>
													<input type="text" name="nomor_surat_kematian" class="custom-form" id="nomor-surat-kematian-skk">
												</td>
											</tr>
											<tr>
												<td width="25%">Nomor Urut Kematian</td>
												<td width="1%">:</td>
												<td>
													<input type="text" name="nomor_urut_kematian" class="custom-form" id="nomor-urut-kematian-skk">
												</td>
											</tr>
											<tr>
												<td width="25%">Nomor Kartu Keluarga (KK)</td>
												<td width="1%">:</td>
												<td>
													<input type="text" name="nomor_kk" class="custom-form" id="nomor-kk-skk">
												</td>
											</tr>
											<tr>
												<td width="25%">Tempat Meninggal</td>
												<td width="1%">:</td>
												<td>
													<input type="radio" name="tempat_meninggal" id="rs-skk" value="Rumah Sakit" class="mr-1">Rumah Sakit
													<input type="radio" name="tempat_meninggal" id="rb-skk" value="Rumah Bersalin" class="mr-1 ml-2">Rumah Bersalin
													<input type="radio" name="tempat_meninggal" id="puskesmas-skk" value="Puskesmas" class="mr-1 ml-2">Puskesmas
													<input type="radio" name="tempat_meninggal" id="rumah-skk" value="Rumah" class="mr-1 ml-2">Rumah
													<input type="radio" name="tempat_meninggal" id="lain-lain-skk" value="Lain-lain" class="mr-1 ml-2">Lain-lain
												</td>
											</tr>
											<tr>
												<td width="25%">Alamat Tempat Meninggal</td>
												<td width="1%">:</td>
												<td>
													<input type="text" name="alamat_meninggal" class="custom-form" id="alamat-meninggal-skk">
												</td>
											</tr>
											<tr>
												<td width="25%">Waktu Pemeriksaan</td>
												<td width="1%">:</td>
												<td>
													<input type="text" name="waktu_pemeriksaan" class="custom-form col-lg-2" id="waktu-pemeriksaan-skk" value="<?= date('d/m/Y H:i') ?>">
												</td>
											</tr>
											<tr>
												<td width="25%">Jenis Pemeriksaan</td>
												<td width="1%">:</td>
												<td>
													<input type="radio" name="jenis_pemeriksaan" id="visum-skk" value="Visum" class="mr-1">Visum
													<input type="radio" name="jenis_pemeriksaan" id="otopsi-skk" value="Otopsi" class="mr-1 ml-2">Otopsi
													<input type="radio" name="jenis_pemeriksaan" id="tidak-divisum-skk" value="Tidak divisum" class="mr-1 ml-2">Tidak divisum
												</td>
											</tr>
											<tr>
												<td width="25%">Sebab Kematian (Menurut Dokter/Polisi)</td>
												<td width="1%">:</td>
												<td>
													<input type="radio" name="sebab_kematian" id="sakit-skk" value="Sakit" class="mr-1">Sakit
													<input type="radio" name="sebab_kematian" id="bersalin-skk" value="Bersalin" class="mr-1 ml-2">Bersalin
													<input type="radio" name="sebab_kematian" id="lahir-mati-skk" value="Lahir Mati" class="mr-1 ml-2">Lahir Mati
													<input type="radio" name="sebab_kematian" id="kecelakaan-lalin-skk" value="Kecelakaan Lalu Lintas" class="mr-1 ml-2">Kecelakaan Lalu Lintas
													<input type="radio" name="sebab_kematian" id="kecelakaan-industri-skk" value="Kecelakaan Industri" class="mr-1 ml-2">Kecelakaan Industri
													<input type="radio" name="sebab_kematian" id="bunuh-diri-skk" value="Bunuh Diri" class="mr-1 ml-2">Bunuh Diri <br>												
													<input type="radio" name="sebab_kematian" id="pembunuhan-skk" value="Pembunuhan/Penganiayaan" class="mr-1">Pembunuhan/Penganiayaan
													<input type="radio" name="sebab_kematian" id="lain-lain-sebab-kematian-skk" value="Lain-lain" class="mr-1 ml-2">Lain-lain
													<input type="radio" name="sebab_kematian" id="tidak-dapat-ditentukan-skk" value="Tidak Dapat Ditentukan" class="mr-1 ml-2">Tidak Dapat Ditentukan
												</td>
											</tr>
											<tr>
												<td width="25%">Kode Kematian (ICD X)</td>
												<td width="1%">:</td>
												<td>
													<input type="text" name="kode_kematian" class="custom-form" id="kode-kematian-skk">
												</td>
											</tr>
											<tr>
												<td width="25%">Akan dikubur/dikremasi</td>
												<td width="1%">:</td>
												<td>
													<input type="radio" name="dikubur" id="tangerang-skk" value="Tangerang" class="mr-1">Tangerang
													<input type="radio" name="dikubur" id="luar-tangerang-skk" value="Luar Tangerang" class="mr-1 ml-2">Luar Tangerang													
												</td>
											</tr>
											<tr>
												<td width="25%">Jenazah di (*)</td>
												<td width="1%">:</td>
												<td>
													<input type="radio" name="diawetkan" id="diawetkan-skk" value="1" class="mr-1">Diawetkan
													<input type="radio" name="diawetkan" id="tidak-diawetkan-skk" value="0" class="mr-1 ml-2">Tidak Diawetkan													
												</td>
											</tr>
											<tr>
												<td width="25%">Yang Memberi Keterangan/Melapor</td>
												<td width="1%">:</td>
												<td>
													<input type="text" name="yang_melapor" class="custom-form" id="yang-melapor-skk">
												</td>
											</tr>
											<tr>
												<td width="25%">KTP/SIM Yang Memberi Keterangan/Melapor</td>
												<td width="1%">:</td>
												<td>
													<input type="text" name="ktp" class="custom-form" id="ktp-skk" maxlength="16">
												</td>
											</tr>
											<tr>
												<td width="25%">Yang Memeriksa</td>
												<td width="1%">:</td>
												<td>
													<input type="text" name="dokter_pemeriksa" id="dokter-pemeriksa-skk" class="select2c-input">
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
				<button type="button" class="btn btn-info" onclick="simpanSuratKeteranganKematian()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
