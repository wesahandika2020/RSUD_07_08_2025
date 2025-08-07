<script>
	//  CPPRI WH
	$('input[type=radio][name=is_paasien]').change(function(){ 
		// Conditions
		if (this.value == 1) {			
			// Set field to empty string
			$('#nama-keluarga-cpri').val('');
			
			// Disabled fields			
			$( "#nama-keluarga-cpri" ).prop( "disabled", true );			
		} else if (this.value == 0) {
			// Undisabled fields			
			$( "#nama-keluarga-cpri" ).prop( "disabled", false );								
		}
	});

	function simpanChecklistPenerimaanPasienRawatInap() {
		var id = $('#id-layanan-pendaftaran-cpri').val();
		// console.log(simpanChecklistPenerimaanPasienRawatInap);
		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_checklist_penerimaan_pasien_rawat_inap") ?>',
			data: $('#form_checklist_penerimaan_pasien_rawat_inap').serialize(),
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

					$('#modal_checklist_penerimaan_pasien_rawat_inap').modal('hide');

					window.open('<?= base_url('rawat_inap/cetak_checklist_penerimaan_pasien_rawat_inap/') ?>' + id, 'Cetak Checklist Penerimaan Pasien Rawat Inap', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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
<div class="modal fade" id="modal_checklist_penerimaan_pasien_rawat_inap" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-checklist-penerimaan-pasien-rawat-inap-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form_checklist_penerimaan_pasien_rawat_inap class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-cpri">

					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-checklist-penerimaan-pasien-rawat-inap">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td class="bold" colspan="2">Apakah form ditandatangani oleh pasien sendiri?</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="is_paasien" id="is-pasien-cpri-ya" value="1" class="mr-1">Ya
													<input type="radio" name="is_paasien" id="is-pasien-cpri-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="2">Nama kelurga / wali</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="nama_keluarga" class="custom-form" id="nama-keluarga-cpri">
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%">1.</td>
												<td class="bold" width="50%">Informasi tentang perawat yang merawat hari ini</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="informasi_tentang_perawat_yang_merawat_hari_ini" id="informasi-tentang-perawat-yang-merawat-hari-ini-ya" value="1" class="mr-1">Ya
													<input type="radio" name="informasi_tentang_perawat_yang_merawat_hari_ini" id="informasi-tentang-perawat-yang-merawat-hari-ini-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%">2.</td>
												<td class="bold" width="50%">Informasi tentang dokter yang merawat</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="informasi_tentang_dokter_yang_merawat" id="informasi-tentang-dokter-yang-merawat-ya" value="1" class="mr-1">Ya
													<input type="radio" name="informasi_tentang_dokter_yang_merawat" id="informasi-tentang-dokter-yang-merawat-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%" rowspan="12">3.</td>
												<td class="bold" colspan="3">Perawat yang melakukan orientasi ruangan kepada pasien dan anggota keluarganya, seperti :</td>												
											</tr>
											<tr>
												<td class="bold" width="50%">Nurse station</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="nurse_station" id="nurse-station-ya" value="1" class="mr-1">Ya
													<input type="radio" name="nurse_station" id="nurse-station-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Kamar mandi pasien</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="kamar_mandi_pasien" id="kamar-mandi-pasien-ya" value="1" class="mr-1">Ya
													<input type="radio" name="kamar_mandi_pasien" id="kamar-mandi-pasien-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Bel pasien, bel keadaan darurat di kamar mandi</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="bel_di_kamar_mandi" id="bel-di-kamar-mandi-ya" value="1" class="mr-1">Ya
													<input type="radio" name="bel_di_kamar_mandi" id="bel-di-kamar-mandi-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Tempat tidur pasien</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="tempat_tidur_pasien" id="tempat-tidur-pasien-ya" value="1" class="mr-1">Ya
													<input type="radio" name="tempat_tidur_pasien" id="tempat-tidur-pasien-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Remote TV, AC</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="remote_tv_ac" id="remote-tv-ac-ya" value="1" class="mr-1">Ya
													<input type="radio" name="remote_tv_ac" id="remote-tv-ac-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Tempat ibadah</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="tempat_ibadah" id="tempat-ibadah-ya" value="1" class="mr-1">Ya
													<input type="radio" name="tempat_ibadah" id="tempat-ibadah-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Tempat sampah infeksi dan non infeksi</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="tempat_sampah_infeksi_dan_non_infeksi" id="tempat-sampah-infeksi-dan-non-infeksi-ya" value="1" class="mr-1">Ya
													<input type="radio" name="tempat_sampah_infeksi_dan_non_infeksi" id="tempat-sampah-infeksi-dan-non-infeksi-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Jadwal pembagian makan dari rumah sakit</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="jadwal_pembagian_makan_dari_rumah_sakit" id="jadwal-pembagian-makan-dari-rumah-sakit-ya" value="1" class="mr-1">Ya
													<input type="radio" name="jadwal_pembagian_makan_dari_rumah_sakit" id="jadwal-pembagian-makan-dari-rumah-sakit-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Jadwal visit dokter</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="jadwal_visit_dokter" id="jadwal-visit-dokter-ya" value="1" class="mr-1">Ya
													<input type="radio" name="jadwal_visit_dokter" id="jadwal-visit-dokter-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Jadwal jam berkunjung</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="jadwal_jam_berkunjung" id="jadwal-jam-berkunjung-ya" value="1" class="mr-1">Ya
													<input type="radio" name="jadwal_jam_berkunjung" id="jadwal-jam-berkunjung-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Jadwal ganti linen</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="jadwal_ganti_linen" id="jadwal-ganti-linen-ya" value="1" class="mr-1">Ya
													<input type="radio" name="jadwal_ganti_linen" id="jadwal-ganti-linen-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%">4.</td>
												<td class="bold" width="50%">Perawat menjelaskan kepada keluarga untuk membawa barang sesuai keperluan saja</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan" id="perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-ya" value="1" class="mr-1">Ya
													<input type="radio" name="perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan" id="perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%">5.</td>
												<td class="bold" width="50%">Perawat menghimbau kepada anggota keluarga untuk mematuhi peraturan yang sudah tertempel di ruangan</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan" id="perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-ya" value="1" class="mr-1">Ya
													<input type="radio" name="perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan" id="perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%">6.</td>
												<td class="bold" width="50%">Menghimbau keluarga / penunggu pasien tidak duduk ditempat tidur pasien</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="menghimbau_tidak_duduk_ditempat_tidur" id="menghimbau-tidak-duduk-ditempat-tidur-ya" value="1" class="mr-1">Ya
													<input type="radio" name="menghimbau_tidak_duduk_ditempat_tidur" id="menghimbau-tidak-duduk-ditempat-tidur-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%">7.</td>
												<td class="bold" width="50%">Tidak diperkenankan menyimpan barang berharga, alat elektronik, tikar, kasur, bantal, dll (resiko kehilangan ditanggung oleh pasien / keluarga)</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="tidak_diperkenankan_menyimpan_barang_berharga" id="tidak-diperkenankan-menyimpan-barang-berharga-ya" value="1" class="mr-1">Ya
													<input type="radio" name="tidak_diperkenankan_menyimpan_barang_berharga" id="tidak-diperkenankan-menyimpan-barang-berharga-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%">8.</td>
												<td class="bold" width="50%">Setiap pasien mendapat kartu penunggu (1 orang), khususnya di ruangan bayi dan perinalogi tidak diperkenankan menunggu di ruangan</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="mendapat_kartu_penunggu" id="mendapat-kartu-penunggu-ya" value="1" class="mr-1">Ya
													<input type="radio" name="mendapat_kartu_penunggu" id="mendapat-kartu-penunggu-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%">9.</td>
												<td class="bold" width="50%">Perawat menghimbau kepada anggota keluarga untuk selalu menghargai privasi pasien</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="untuk_selalu_menghargai_privasi_pasien" id="untuk-selalu-menghargai-privasi-pasien-ya" value="1" class="mr-1">Ya
													<input type="radio" name="untuk_selalu_menghargai_privasi_pasien" id="untuk-selalu-menghargai-privasi-pasien-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="1%" rowspan="3">10.</td>
												<td class="bold" colspan="3">Perawat menjelaskan tentang :</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Pemasangan dan fungsi gelang</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="pemasangan_dan_fungsi_gelang" id="pemasangan-dan-fungsi-gelang-ya" value="1" class="mr-1">Ya
													<input type="radio" name="pemasangan_dan_fungsi_gelang" id="pemasangan-dan-fungsi-gelang-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="50%">Cara cuci tangan</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="cara_cuci_tangan" id="cara-cuci-tangan-ya" value="1" class="mr-1">Ya
													<input type="radio" name="cara_cuci_tangan" id="cara-cuci-tangan-tidak" value="0" class="mr-1 ml-2">Tidak
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
				<button type="button" class="btn btn-info" onclick="simpanChecklistPenerimaanPasienRawatInap()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal WH-->
