<!-- <script>	
	
	$('input[type=radio][name=is_pasien]').change(function(){ 
		
		if (this.value === 'ya') {
			
			$('#nama-keluarga-spiritual').val('');
			$('#hubungan-keluarga-spiritual').val('');			
			
		
			$( "#nama-keluarga-spiritual" ).prop( "disabled", true );
			$( "#hubungan-keluarga-spiritual" ).prop( "disabled", true );			
		} else if (this.value === 'tidak') {
		
			$( "#nama-keluarga-spiritual" ).prop( "disabled", false );
			$( "#hubungan-keluarga-spiritual" ).prop( "disabled", false );			
		}
	});
              
		
	function simpanPengkajianSpiritualPasienPulang() {
		var id = $('#id-pendaftaran-spiritual').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_pengkajian_spiritual_pasien") ?>',
			data: $('#pengkajian-spiritual-pasien-pulang').serialize(),
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

					$('#modal_pengkajian_spiritual_pasien_pulang').modal('hide');

					window.open('<?= base_url('rawat_inap/cetak_surat_pengkajian_pasien_muslim/') ?>' + id, 'Cetak Pengkajian Spiritual Pasien Muslim (Pulang)', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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


<div class="modal fade" id="modal_pengkajian_spiritual_pasien_pulang" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-pengkajian-spiritual-pasien-pulang-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=pengkajian-spiritual-pasien-pulang class="form-horizontal"') ?>
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-spiritual">

				
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="pengkajian-spiritual-pasien-pulang">
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="50%">Apakah form ditandatangani oleh pasien sendiri?
											</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="radio" name="is_pasien" id="is-pasien-ya-spiritual" value="ya"
													class="mr-1">Ya
												<input type="radio" name="is_pasien" id="is-pasien-tidak-spiritual" value="tidak"
													class="mr-1 ml-2">Tidak
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Nama keluarga / wali</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_keluarga" class="custom-form"
													id="nama-keluarga-spiritual">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Hubungan keluarga</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="hubungan_keluarga" class="custom-form"
													id="hubungan-keluarga-spiritual">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Kondisi Ibadah Pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<div class="input-group">
													<input type="radio" name="kondisi_ibadah_pasien"
														id="kondisi-pasien-disiplin-spiritual" value="Disiplin"
														class="mr-1">Disiplin
													<input type="radio" name="kondisi_ibadah_pasien"
														id="kondisi-pasien-kadang-spiritual" value="Kadang-kadang"
														class="mr-1 ml-2">Kadang-Kadang
													<input type="radio" name="kondisi_ibadah_pasien"
														id="kondisi-pasien-tidak-spiritual" value="Tidak" class="mr-1 ml-2">Tidak
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Kondisi Psiko Spiritual</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<div class="input-group">
													<input type="radio" name="kondisi_psiko_spiritual"
														id="kondisi-psiko-menerima-spiritual" value="Menerima"
														class="mr-1">Menerima
													<input type="radio" name="kondisi_psiko_spiritual"
														id="kondisi-psiko-mengeluh-spiritual" value="Mengeluh"
														class="mr-1 ml-2">Mengeluh
													<input type="radio" name="kondisi_psiko_spiritual"
														id="kondisi-psiko-menolak-spiritual" value="Menolak"
														class="mr-1 ml-2">Menolak
												</div>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Saran/Rencana Tindak Selanjutnya</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="saran_rencana_tindak_selanjutnya"
													id="saran-rencana-tindak-selanjutnya-spiritual" rows="3"
													class="form-control clear-input"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Edukasi Islam</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<div class="input-group">
													<input type="radio" name="edukasi_islam" id="edukasi-islam-bimroh-spiritual"
														value="Bimbingan Rohani" class="mr-1">Bimbingan Rohani
													<input type="radio" name="eduaksi_islam"
														id="edukasi-islam-bimwas-spiritual" value="Bimbingan Wanita Muslimah"
														class="mr-1 ml-2">Bimbingan Wanita Muslimah
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
						class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanPengkajianSpiritualPasienPulang()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
 -->
