<script> 
	// PPDRAD

	$(function() {

		$('#pukul-ppd')
		.on('click', function() {
			$(this).timepicker({
				format: 'HH:mm',
				showInputs: false,
				showMeridian: false
			});
		})

		$('#tanggal-ppd').datetimepicker({
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
			resetModalPermintaanPemeriksaanDiagnostik();
		});

		// NAMA DOKTER
		$('#dokter-pengirim-ppd').select2c({
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


		// GABUNGAN NAMA DOKTER, PERAWAT, BIDAN JANGAN DI HAPUS
		// $('#dokter-pengirim-ppd').select2c({
        //     ajax: {
        //         url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
        //         dataType: 'json',
        //         quietMillis: 100,
        //         data: function(term, page) { // page is the one-based page number tracked by Select2
        //             return {
        //                 q: term, //search term
        //                 page: page, // page number
        //                 jenis: $('#c_profesi').val(),
        //             };
        //         },
        //         results: function(data, page) {
        //             var more = (page * 20) < data
        //                 .total; // whether or not there are more results available

        //             // notice we return the value of more so Select2 knows if more results can be loaded
        //             return {
        //                 results: data.data,
        //                 more: more
        //             };
        //         }
        //     },
        //     formatResult: function(data) {
        //         var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
        //         return markup;
        //     },
        //     formatSelection: function(data) {
        //         return data.nama;
        //     }
        // });

	})


	function simpanPermintaanPemeriksaanDiagnostik() {
		if ($('#dokter-pengirim-ppd').val() === '') {
            syams_validation('#dokter-pengirim-ppd', 'Dokter harus diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-pengirim-ppd');
        }

		if ($('#tanggal-ppd').val() === '') {
            syams_validation('#tanggal-ppd', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-ppd');
        }


		var id_pendaftaran = $('#id-pendaftaran-ppd').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-ppd').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("radiologi_log/api/radiologi_log/simpan_permintaan_pemeriksaan_diagnostik") ?>',
			data: $('#permintaan-pemeriksaan-diagnostik').serialize(),
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

					tableListPermintaanPemeriksaanDiagnostik(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-ppd').val(), $('#id-layanan-pendaftaran-ppd').val(), $('#id-pasien-ppd').val());
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


<div class="modal fade" id="modal_permintaan_pemeriksaan_diagnostik" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-permintaan-pemeriksaan-diagnostik-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=permintaan-pemeriksaan-diagnostik class="form-horizontal"') ?>
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-ppd">
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-ppd">
				<input type="hidden" name="id_pasien" id="id-pasien-ppd">
				<input type="hidden" name="id_ppd" id="id-ppd">
				<input type="hidden" name="action" id="action-ppd">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Lengkap</td>
                                    <td wdith="80%">: <span id="nama-pasien-ppd"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. Rekam Medik</td>
                                    <td>: <span id="no-rm-pasien-ppd"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-pasien-ppd"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-pasien-ppd"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="permintaan-pemeriksaan-diagnostik">
									<br>
									<table class="table table-sm table-striped" style="margin-top: -15px">
										<tr>
											<td width="2%"></td>
											<td width="15%"><b>No. Formulir</b></td>
											<td width="1%" class="bold">:</td>
											<td>
												<div class="input-group">
													<input type="text" name="no_formulir_ppd" id="no-formulir-ppd" class="custom-form clear-input d-inline-block col-lg-3">
												</div>
											</td>
										</tr>
										<tr>
											<td width="2%"></td>
											<td width="15%"><b>Kode Dokter Pengirim</b></td>
											<td width="1%" class="bold">:</td>
											<td>
												<div class="input-group">
													<input type="text" name="kode_pengirim_ppd" id="kode-pengirim-ppd" class="custom-form clear-input d-inline-block col-lg-3">
												</div>
											</td>
										</tr>
										<tr>
											<td width="2%"></td>
											<td width="15%" class="bold">Kode Konsultan</td>
											<td width="1%" class="bold">:</td>
											<td>
												<div class="input-group">
													<input type="text" name="kode_konsultan_ppd" id="kode-konsultan-ppd" class="custom-form clear-input d-inline-block col-lg-3">
												</div>
											</td>
										</tr>

										<tr>
											<td width="2%"></td>
											<td width="20%"><b>Permohonan yang diminta, harap dicoret</b></td>
											<td width="1%" class="bold">:</td>
											<td>
												<input type="checkbox" name="cito_ppd" id="cito-ppd" value="1" class="mr-1">Cito
												<input type="checkbox" name="biasa_ppd" id="biasa-ppd" value="1" class="mr-1 ml-4">Biasa
												<input type="checkbox" name="hasil_ppd" id="hasil-ppd" value="1" class="mr-1 ml-4">Hasil yang diserahkan ke Dokter
												<input type="checkbox" name="hasil_yg_ppd" id="hasil-yg-ppd" value="1" class="mr-1 ml-4">Hasil yang diserahkan ke Pasien
											</td>
										</tr>
										<tr>
											<td width="2%"></td>
											<td width="20%"><b>Diagnose / Keterangan klinik</b></td>
											<td width="1%" class="bold">:</td>
											<td>
												<textarea name="diagnose_ppd" id="diagnose-ppd" rows="5" class="form-control clear-input" placeholder="diagnose / keterangan klinik"></textarea>
											</td>
										</tr>
									</table>

									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td colspan="3" class="td-dark" style="background-color: Lavender; color: black;">
												<b>ENDOSKOPI</b>
											</td>
										</tr>
										<tr>
											<td width="33%"><input type="checkbox" name="gasturoduodenoskopi_ppd" id="gasturoduodenoskopi-ppd" class="mr-1" value="1">Gasturoduodenoskopi</td>
											<td width="33%"><input type="checkbox" name="endosonografi_ppd" id="endosonografi-ppd" class="mr-1" value="1">Endosonografi</td>
											<td width="33%"><input type="checkbox" name="ercp_ppd" id="ercp-ppd" class="mr-1" value="1">ERCP + Papilotomi</td>
										</tr>
										<tr>
											<td><input type="checkbox" name="kolonoskopi_ppd" id="kolonoskopi-ppd" class="mr-1" value="1">Kolonoskopi</td>
											<td><input type="checkbox" name="polipektomi_ppd" id="polipektomi-ppd" class="mr-1" value="1">Polipektomi</td>
											<td><input type="checkbox" name="ligasi_ppd" id="ligasi-ppd" class="mr-1" value="1">Ligasi hemorrhoid</td>
										</tr>
										<tr>
											<td><input type="checkbox" name="rektosigmoidoskopi_ppd" id="rektosigmoidoskopi-ppd" class="mr-1" value="1">Rektosigmoidoskopi</td>
											<td><input type="checkbox" name="sklero_ppd" id="sklero-ppd" class="mr-1" value="1">Sklero - Terapi</td>
											<td></td>
										</tr>
									</table>

									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="25%" class="td-dark" style="background-color: Lavender; color: black;"><b>USG</td>
											<td width="25%" class="td-dark" style="background-color: Lavender; color: black;"><b>USG</td>
											<td width="25%" class="td-dark" style="background-color: Lavender; color: black;"><b>USG</td>
											<td width="25%" class="td-dark" style="background-color: Lavender; color: black;"></td>
										</tr>
										<tr>
											<td width="25%"><input type="checkbox" name="kepela_ppd" id="kepela-ppd" class="mr-1" value="1">Kepala</td>
											<td width="25%"><input type="checkbox" name="muskuloskeletel_ppd" id="muskuloskeletel-ppd" class="mr-1" value="1">Muskuloskeletel ( anak )</td>
											<td width="25%"><input type="checkbox" name="wrist_ppd" id="wrist-ppd" class="mr-1" value="1">Wrist Joint ka/ki</td>
											<td width="25%"><input type="checkbox" name="guilding_ppd" id="guilding-ppd" class="mr-1" value="1">Guilding</td>
										</tr>
										<tr>
											<td><input type="checkbox" name="thyroid_ppd" id="thyroid-ppd" class="mr-1" value="1">Thyroid</td>
											<td><input type="checkbox" name="abdomen_ppd" id="abdomen-ppd" class="mr-1" value="1">Abdomen Bawah</td>
											<td><input type="checkbox" name="knee_ppd" id="knee-ppd" class="mr-1" value="1">Knee Joint ka/ki</td>
											<td></td>
										</tr>
										<tr>
											<td><input type="checkbox" name="mammaei_ppd" id="mammaei-ppd" class="mr-1" value="1">Mammae</td>
											<td><input type="checkbox" name="jantungg_ppd" id="jantungg-ppd" class="mr-1" value="1">Jantung</td>
											<td><input type="checkbox" name="calcaneus_ppd" id="calcaneus-ppd" class="mr-1" value="1">Calcaneus ka/ki</td>
											<td></td>
										</tr>
										<tr>
											<td><input type="checkbox" name="whole_ppd" id="whole-ppd" class="mr-1" value="1">Whole Abdomen</td>
											<td><input type="checkbox" name="ginekologii_ppd" id="ginekologii-ppd" class="mr-1" value="1">Ginekologi-Obstetri/Genitalia</td>
											<td><input type="checkbox" name="kepalai_ppd" id="kepalai-ppd" class="mr-1" value="1">Kepala (bayi)</td>
											<td></td>
										</tr>
										<tr>
											<td><input type="checkbox" name="appendix_ppd" id="appendix-ppd" class="mr-1" value="1">Whole Abdomen Appendix</td>
											<td><input type="checkbox" name="extremitass_ppd" id="extremitass-ppd" class="mr-1" value="1">Extremitas</td>
											<td><input type="checkbox" name="abdomenr_ppd" id="abdomenr-ppd" class="mr-1" value="1">Abdomen (bayi)</td>
											<td></td>
										</tr>
										<tr>
											<td><input type="checkbox" name="abdomen_atas_ppd" id="abdomen-atas-ppd" class="mr-1" value="1">Abdomen Atas</td>
											<td><input type="checkbox" name="shoulder_ppd" id="shoulder-ppd" class="mr-1" value="1">Shoulder Joint ka/ki</td>
											<td><input type="checkbox" name="hip_ppd" id="hip-ppd" class="mr-1" value="1">Hip joint (bayi)</td>
											<td></td>
										</tr>
									</table>

									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td colspan="4" class="td-dark" style="background-color: Lavender; color: black;">
												<b>USG DOPPLER</b>
											</td>
										</tr>
										<tr>
											<td width="25%"><input type="checkbox" name="vertebralis_ppd" id="vertebralis-ppd" class="mr-1" value="1">Carolis-Vertebralis (leher)</td>
											<td width="25%"><input type="checkbox" name="mammaeo_ppd" id="mammaeo-ppd" class="mr-1" value="1">Mammae</td>
											<td width="25%"><input type="checkbox" name="kgb_ppd" id="kgb-ppd" class="mr-1" value="1">KGB</td>
											<td width="25%"><input type="checkbox" name="tcd_ppd" id="tcd-ppd" class="mr-1" value="1">TCD</td>
										</tr>
										<tr>
											<td><input type="checkbox" name="heper_ppd" id="heper-ppd" class="mr-1" value="1">Heper</td>
											<td><input type="checkbox" name="exxtremitas_ppd" id="exxtremitas-ppd" class="mr-1" value="1">1. Extremitas (arteri)</td>
											<td><input type="checkbox" name="sofft_ppd" id="sofft-ppd" class="mr-1" value="1">Soft Tissue</td>
											<td></td>
										</tr>
										<tr>
											<td><input type="checkbox" name="ginjal_ppd" id="ginjal-ppd" class="mr-1" value="1">Ginjal</td>
											<td><input type="checkbox" name="venaa_ppd" id="venaa-ppd" class="mr-1" value="1">2. Extremitas (vena)</td>
											<td><input type="checkbox" name="scrotum_ppd" id="scrotum-ppd" class="mr-1" value="1">Scrotum</td>
											<td></td>
										</tr>
									</table>

									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td colspan="4" class="td-dark" style="background-color: Lavender; color: black;">
												<b>USG 3D - 40</b>
											</td>
										</tr>
										<tr>
											<td>
												<textarea name="usg3d_ppd" id="usg3d-ppd" rows="5" class="form-control clear-input" placeholder="USG 3D - 40"></textarea>
											</td>
										</tr>
									</table>

									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td colspan="4" class="td-dark" style="background-color: Lavender; color: black;">
												<b>PULMONOLOGI</b>
											</td>
										</tr>
										<tr>
											<td width="25%"><input type="checkbox" name="faal_ppd" id="faal-ppd" class="mr-1" value="1">Faal Paru Rutin</td>
											<td width="25%"><input type="checkbox" name="bronkoskopi_ppd" id="bronkoskopi-ppd" class="mr-1" value="1">Bronkoskopi + Biopsi</td>
											<td width="25%"><input type="checkbox" name="bunksi_ppd" id="bunksi-ppd" class="mr-1" value="1">punksi Pleura</td>
											<td width="25%"><input type="checkbox" name="testt_ppd" id="testt-ppd" class="mr-1" value="1">Test Alergi</td>
										</tr>
										<tr>
											<td><input type="checkbox" name="fallparu_ppd" id="fallparu-ppd" class="mr-1" value="1">Faal Paru lengkap</td>
											<td><input type="checkbox" name="bronkoskeopi_ppd" id="bronkoskeopi-ppd" class="mr-1" value="1">Bronkoskopi + Biopsi +</td>
											<td><input type="checkbox" name="pleura_ppd" id="pleura-ppd" class="mr-1" value="1">Biopsi Pleura</td>
											<td></td>
										</tr>
										<tr>
											<td><input type="checkbox" name="bronkoskmopi_ppd" id="bronkoskmopi-ppd" class="mr-1" value="1">Bronkoskopi</td>
											<td><input type="checkbox" name="gguidance_ppd" id="gguidance-ppd" class="mr-1" value="1">TV Guidance</td>
											<td><input type="checkbox" name="transthorakal_ppd" id="transthorakal-ppd" class="mr-1" value="1">Biopsi Aspirasi Transthorakal</td>
											<td></td>
										</tr>
									</table>

									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="25%" class="td-dark" style="background-color: Lavender; color: black;"><b>NEUROLOGI</td>
											<td width="25%" class="td-dark" style="background-color: Lavender; color: black;"><b>T.H.T</td>
											<td width="25%" class="td-dark" style="background-color: Lavender; color: black;"><b>KARDIOLOGI</td>
											<td width="25%" class="td-dark" style="background-color: Lavender; color: black;"></td>
										</tr>

										<tr>
											<td width="25%"><input type="checkbox" name="eeg_ppd" id="eeg-ppd" class="mr-1" value="1">E.E.G</td>
											<td width="25%"><input type="checkbox" name="audiometri_ppd" id="audiometri-ppd" class="mr-1" value="1">Audiometri</td>
											<td width="25%"><input type="checkbox" name="treadmili_ppd" id="treadmili-ppd" class="mr-1" value="1">Treadmili test</td>
											<td width="25%"><input type="checkbox" name="erchokardiografi_ppd" id="erchokardiografi-ppd" class="mr-1" value="1">Echokardiografi  + Doppler (berwarna)</td>
										</tr>
										<tr>
											<td><input type="checkbox" name="emg_ppd" id="emg-ppd" class="mr-1" value="1">E.M.G</td>
											<td><input type="checkbox" name="eng_ppd" id="eng-ppd" class="mr-1" value="1">ENG</td>
											<td><input type="checkbox" name="ekg_ppd" id="ekg-ppd" class="mr-1" value="1">E.K.G</td>
											<td><input type="checkbox" name="ekchokardiografi_ppd" id="ekchokardiografi-ppd" class="mr-1" value="1">Echokardiografi  + Doppler</td>
										</tr>
										<tr>
											<td></td>
											<td><input type="checkbox" name="impedans_ppd" id="impedans-ppd" class="mr-1" value="1">Impedans</td>
											<td><input type="checkbox" name="hotelekg_ppd" id="hotelekg-ppd" class="mr-1" value="1">Hotel EKG</td>
											<td><input type="checkbox" name="eecp_ppd" id="eecp-ppd" class="mr-1" value="1">EECP</td>
										</tr>
										<!-- <tr>
											<td></td>
											<td></td>
											<td><input type="checkbox" name="hotelekig_ppd" id="hotelekig-ppd" class="mr-1" value="1">Hotel EKG</td>
											<td></td>
										</tr> -->
										<tr>
											<td></td>
											<td></td>
											<td><input type="checkbox" name="kathererisasi_ppd" id="kathererisasi-ppd" class="mr-1" value="1">Kathererisasi Jantung</td>
											<td></td>
										</tr>
									</table>

									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="33%" class="center" class="td-dark" style="background-color: Lavender; color: black;"><b>Tanggal</td>
											<td width="33%" class="center" class="td-dark" style="background-color: Lavender; color: black;"><b>Pukul</td>
											<td width="33%" class="center" class="td-dark" style="background-color: Lavender; color: black;"><b>Dokter Pengirim</td>
										</tr>
										<tr>
											<td class="center">
												<input type="text" name="tanggal_ppd" id="tanggal-ppd" class="custom-form clear-input d-inline-block col-lg-3">
											</td>
											<td class="center">
												<input type="text" name="pukul_ppd" id="pukul-ppd" class="custom-form clear-input d-inline-block col-lg-2">
											</td>
											<td class="center">
												<input type="text" name="dokter_pengirim_ppd" id="dokter-pengirim-ppd" class="select2c-input ml-2">
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				
				<?= form_close() ?>
				<div class="row">
					<table width="100%">
						<tr>
							<td width="79%">
								<div class="col-lg-8">
									<button type="button" class="btn btn-primary hide mr-1" onclick="simpanPermintaanPemeriksaanDiagnostik()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Permintaan Pemeriksaan Diagnostik</button>
									<button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									<button type="button" class="btn btn-success hide" onclick="simpanPermintaanPemeriksaanDiagnostik()" id="btn_update_ppd"> <i class="fas fa-edit mr-1"></i>Update Permintaan Pemeriksaan Diagnostik</button>
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
							<table class="table table-sm table-striped table-bordered" id="table-list-ppd">
								<thead style="background-color: #B0C4DE;">
									<tr>
										<th width="3%" class="center">No</th>
										<th width="12%" class="center">Tanggal</th>
										<th width="18%" class="center">Dokter Pengirim</th>
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