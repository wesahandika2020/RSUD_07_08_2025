<!-- <style type="text/css"> tr, td { border-color: black; border: solid 1px; }</style> -->
<script>
	$(function() {
		$("#wizard-gizi").bwizard();
		$("#wizard-form").bwizard();
		$("#fgr-wizard-form-cppt").bwizard();

		$('#kgr-petugas').select2c({
			ajax: {
				url: "<?= base_url('pelayanan/api/pelayanan/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: 22,
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
				return data.nama;
			}
		});
		$('#kgr-tgl-petugas').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        });
	});

	function entriGiziRajal(id_pendaftaran, id_layanan_pendaftaran, bed) {
		// console.log(id_pendaftaran, id_layanan_pendaftaran);
		$('#wizard-gizi').bwizard('show', '0');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// console.log(id_layanan_pendaftaran);
				$('#fgr-id-layanan-pendaftaran, #gdr-id-layanan-pendaftaran, #kgr-id-layanan-pendaftaran').val(id_layanan_pendaftaran);
				$('#fgr-id-pendaftaran, #gdr-id-pendaftaran, #kgr-id-pendaftaran').val(id_pendaftaran);
				$('#fgr-rwyt-bed, #gdr-rwyt-bed, #kgr-rwyt-bed').val(bed);
				$('#fgr-pasien, #gdr-pasien, #kgr-pasien').val(data.pasien.no_rm);
				if (data.pasien !== null) {
					$('#fgr-pasien-nama, #nama-pasien').text(data.pasien.nama);
					$('#fgr-pasien-no-rm').text(data.pasien.no_rm);
					$('#fgr-pasien-tanggal-lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
					$('#fgr-pasien-jenis-kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
					$('#fgr-dpjp').text(data.layanan.dokter);


					if(data.layanan.tindak_lanjut !== null){
						if(data.layanan.tindak_lanjut === 'Rawat Inap'){
							$.ajax({
								type: 'GET',
								url: '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_ranap") ?>/id_layanan/' + id_layanan_pendaftaran,
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {

									if(data.bangsal_ri !== null){

										let bed_ri = data.bangsal_ri;
										bangsal_bed = bed_ri + ' kelas ' + data.kelas_ri + ' ruang ' + data.ruang_ri + ' No. Bed ' + data.bed_ri;
										$('#fgr-status-ruang-pasien').val(bangsal_bed);

									} else {

										$('#fgr-status-ruang-pasien').val('Ruangan dan Bed Masih dalam status request');
									}
								},
								complete: function() {
									hideLoader();
								},
								error: function(e) {
									accessFailed(e.status);
								}
							})
						} else if(data.layanan.tindak_lanjut === 'Intensive Care'){
							$.ajax({
							type: 'GET',
							url: '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_icare") ?>/id_layanan/' + id_layanan_pendaftaran,
							cache: false,
							dataType: 'JSON',
							beforeSend: function() {
								showLoader();
							},
							success: function(data) {

								if(data.bangsal_ic !== null){

									let bed_ic = data.bangsal_ic;
									bangsal_bed = bed_ic + ' kelas ' + data.kelas_ic + ' ruang ' + data.ruang_ic + ' No. Bed ' + data.bed_ic;
									$('#fgr-status-ruang-pasien').val(bangsal_bed);

								} else {

									$('#fgr-status-ruang-pasien').val('Ruangan dan Bed Masih dalam status request');
								}

							},
							complete: function() {
								hideLoader();
							},
							error: function(e) {
								accessFailed(e.status);
							}
						})

						} else {

							$('#fgr-status-ruang-pasien').val('Masih Di tempat');
						}

					} else {
						$('#fgr-status-ruang-pasien').val('Masih Di tempat');
					}
				}

				$('#fgr-bed').text(bed);

				resetKonsultasiGiziRajal();
				showKonsultasiGiziRajal(id_layanan_pendaftaran);

				$('#modal-gizi-rajal').modal('show');
				// alert('coba')
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})

	}
	// kosultasi gizi
	function simpanKonsultasiGiziRajal() {
		
		if ($('#kgr-tgl-petugas').val() === '') {
			syams_validation('#kgr-tgl-petugas', 'Tanggal dan jam harus diisi.');
			return false;
		} else {
			syams_validation_remove('#kgr-tgl-petugas');
		}
		if ($('#kgr-petugas').val() === '') {
			syams_validation('#kgr-petugas', 'Dietisien / Nutrisionist harus diisi.');
			// $('#kgr-petugas').focus();
			return false;
		} else {
			syams_validation_remove('#kgr-petugas');
		}
		$.ajax({
			type: 'POST',
			url: '<?= base_url("gizi/api/gizi/simpan_konsultasi_gizi") ?>',
			data: $('#form-konsultasi-gizi-rajal').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal-gizi-rajal').modal('hide');
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			},
		});
	}

	function showKonsultasiGiziRajal(id_layanan_pendaftaran) {
		$.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_konsultasi_gizi") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
				// console.log(data);
                // Set values
				if(data.konsul != null){
					$('#kgr-id').val(data.konsul.id_kg);
					$('#kgr-bb').val(data.konsul.kg_bb);
					$('#kgr-lla').val(data.konsul.kg_lla);
					$('#kgr-pbb').val(data.konsul.kg_pbb);
					$('#kgr-tb').val(data.konsul.kg_tb);
					$('#kgr-imt').val(data.konsul.kg_imt);
					$('#kgr-biokimia').val(data.konsul.kg_biokimia);
					$('#kgr-klinis').val(data.konsul.kg_klinis);
					$('#kgr-gizi').val(data.konsul.kg_gizi);
					$('#kgr-personal').val(data.konsul.kg_personal);
					$('#kgr-diagnosis').val(data.konsul.kg_diagnosis);
					$('#kgr-tujuan').val(data.konsul.kg_tujuan);
					$('#kgr-intervensi').val(data.konsul.kg_intervensi);
					$('#kgr-konseling').val(data.konsul.kg_konseling);
					$('#kgr-evaluasi').val(data.konsul.kg_evaluasi);


					// petugas
					$('#kgr-tgl-petugas').val(datetimefmysql(data.konsul.kg_tgl_petugas));
					$('#kgr-petugas').val(data.konsul.kg_petugas);
					$('#s2id_kgr-petugas a .select2c-chosen').html(data.konsul.petugas);
					if (data.konsul.kg_ttd === '1') {
						document.getElementById("kgr-ttd").checked = true;
					}
					let html = '';
					html = /* html */ `
						<button type="button" class="btn btn-info mr-2" onclick="printKonsultasiGiziRajal()"><span><i class="fas fa-fw fa-print mr-1"></i>Print</span></button>
					`;
					$('#kgr-tombol').append(html);
				}
                
			},
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
	}

	function resetKonsultasiGiziRajal() {
        $('#form-konsultasi-gizi-rajal')[0].reset()
		$('#kgr-id').val('');
        $('.checked').prop('checked', false)
        $('#kgr-tombol').empty()
        $('#s2id_kgr-petugas a .select2c-chosen').html('')
	}

	function printKonsultasiGiziRajal() {
		let id = $('#kgr-id-layanan-pendaftaran').val();
		var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;
		window.open(
		'<?= base_url("gizi/cetak_konsultasi_gizi/") ?>' + id, 'Cetak Konsultasi Gizi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}


</script>

<!-- Modal -->
<input type="hidden" name="page_now" id="d-page-now">
<div class="modal fade" id="modal-gizi-rajal">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:95%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-form-gizi">Form Gizi</h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<!-- header -->
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<input type="hidden" name="id_layanan_pendaftaran" id="fgr-id-layanan-pendaftaran">
								<input type="hidden" name="id_pendaftaran" id="fgr-id-pendaftaran">
								<input type="hidden" name="riwayat_bed" id="fgr-rwyt-bed">
								<input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
								<input type="hidden" name="id_pasien" id="fgr-pasien">
								<tr>
									<td width="15%" class="bold">Nama Pasien</td>
									<td wdith="85%">: <span id="fgr-pasien-nama"></span></td>
								</tr>
								<tr>
									<td class="bold">No. RM</td>
									<td>: <span id="fgr-pasien-no-rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Tanggal Lahir</td>
									<td>: <span id="fgr-pasien-tanggal-lahir"></span></td>
								</tr>
								<tr>
									<td class="bold">Jenis Kelamin</td>
									<td>: <span id="fgr-pasien-jenis-kelamin"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="widget-body">
							<!-- form dpmp -->
							<div id="wizard-gizi">
								<!-- Tab bwizard -->
								<ol>
									<li>Formulir Konsultasi Gizi</li>
								</ol>

								<!-- Data bwizard -->
								<!-- kosultasi gizi -->
								<div>
									<?= form_open('', 'id=form-konsultasi-gizi-rajal class=form-horizontal') ?>
									<div class="form-konsultasi-gizi-rajal">
										<input type="hidden" name="id_layanan_pendaftaran" id="kgr-id-layanan-pendaftaran">
										<input type="hidden" name="id_pendaftaran" id="kgr-id-pendaftaran">
										<input type="hidden" name="riwayat_bed" id="kgr-rwyt-bed">
										<input type="hidden" name="id_kg" id="kgr-id">
										<input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
										<input type="hidden" name="id_pasien" id="kgr-pasien">
										<div class="row">
											<div class="col-lg-12">
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<th colspan="9"><b>Pengkajian Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">a. Antropometri</td>
														</tr>
														<tr>
															<td width="5%" class="pl-3">BB</td>
															<td width="1%">:</td>
															<td><input type="text" id="kgr-bb" name="kg_bb" class="custom-form clear-input d-inline-block col-lg-3"> kg</td>
															<td width="5%" class="pl-3">LLA</td>
															<td width="1%">:</td>
															<td><input type="text" id="kgr-lla" name="kg_lla" class="custom-form clear-input d-inline-block col-lg-3"> cm</td>
															<td width="10%" class="pl-3">Perubahan BB</td>
															<td width="1%">:</td>
															<td><input type="text" id="kgr-pbb" name="kg_pbb" class="custom-form clear-input d-inline-block col-lg-10"></td>
														</tr>
														<tr>
															<td class="pl-3">TB</td>
															<td>:</td>
															<td><input type="text" id="kgr-tb" name="kg_tb" class="custom-form clear-input d-inline-block col-lg-3"> cm</td>
															<td class="pl-3">IMT</td>
															<td>:</td>
															<td><input type="text" id="kgr-imt" name="kg_imt" class="custom-form clear-input d-inline-block col-lg-3"> kg/m²</td>
															<td colspan="3"></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">b. Biokimia</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_biokimia" id="kgr-biokimia" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">c. Fisik / Klinik</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_klinis" id="kgr-klinis" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">d. Riwayat Gizi</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_gizi" id="kgr-gizi" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">e. Riwayat Personal</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_personal" id="kgr-personal" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<th colspan="9"><b>Diagnosis Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_diagnosis" id="kgr-diagnosis" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<th colspan="9"><b>Intervensi Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">a. Tujuan</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_tujuan" id="kgr-tujuan" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">b. Intervensi</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_intervensi" id="kgr-intervensi" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">c. Konseling Giz / Edukasi</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_konseling" id="kgr-konseling" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<th colspan="9"><b>Rencana Monitoring dan Evaluasi Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_evaluasi" id="kgr-evaluasi" class="custom-textarea" rows="5"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="33%" class="center">
																Tanggal & Jam <input type="text" name="kg_tgl_petugas" id="kgr-tgl-petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
															</td>
															<td width="33%">
															</td>
															<td width="33%" class="center"></td>
														</tr>
														<tr>
															<td class="center">Dietisien / Nutrisionist</td>
															<td></td>
															<td class="center">Pasien</td>
														</tr>
														<tr>
															<td class="center"><input type="text" name="kg_petugas" id="kgr-petugas" class="select2c-input ml-2"></td>
															<td></td>
															<td class="center"><span id="nama-pasien"></span></td>

														</tr>
														<tr>
															<td class="center">Tanda Tangan</td>
															<td class="center"></td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center">
																<input type="checkbox" name="kg_ttd" id="kgr-ttd" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
															</td>
															<td class="center">
															</td>
														</tr>
													</tbody>
												</table>
												<div class="d-flex justify-content-end">
													<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
													<span id="kgr-tombol"></span>
													<button type="button" class="btn btn-info" onclick="simpanKonsultasiGiziRajal()"><span><i class="fas fa-fw fa-save mr-1"></i>Simpan</span></button>
												</div>
											</div>
										</div>
									</div>
									<?= form_close() ?>
								</div>
								<!-- akhir kosultasi gizi -->

							</div>
						</div>
					</div>
				</div>
				<!-- end header -->
				
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>