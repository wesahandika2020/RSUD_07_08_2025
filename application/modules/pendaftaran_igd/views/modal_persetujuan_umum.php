<script>
	$(function () {
		$('#tanggal-lahir-mpu').datetimepicker({
			format: 'DD/MM/YYYY',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function (i) {
				if ($(i).attr('readonly')) {
					return false;
				}
			}
		});

		// Wilayah
		$('#provinsi-mpu').change(function () {
			let no_prop = $('#provinsi-mpu').val();
			let nama_prop = $('#provinsi-mpu option:selected').text();
			if (no_prop) {
				$('#nama_provinsi-mpu').val(nama_prop);
				getKabupatenMpu(no_prop);
			} else {
				$('#kabupaten-mpu').empty();
				$('#kecamatan-mpu').empty();
				$('#kelurahan-mpu').empty();
			}
			// $('#kabupaten').prop('readonly', false);
		});

		$('#kabupaten-mpu').change(function () {
			let no_prop = $('#provinsi-mpu').val();
			let no_kab = $('#kabupaten-mpu').val();
			let nama_kab = $('#kabupaten-mpu option:selected').text();
			if (no_kab) {
				$('#nama_kabupaten-mpu').val(nama_kab);
				getKecamatanMpu(no_prop, no_kab);
			} else {
				$('#kecamatan-mpu').empty();
				$('#kelurahan-mpu').empty();
			}
			// $('#kecamatan').prop('readonly', false);
		});

		$('#kecamatan-mpu').change(function () {
			let no_prop = $('#provinsi-mpu').val();
			let no_kab = $('#kabupaten-mpu').val();
			let no_kec = $('#kecamatan-mpu').val();
			let nama_kec = $('#kecamatan-mpu option:selected').text();
			if (no_kab) {
				$('#nama_kecamatan-mpu').val(nama_kec);
				getKelurahanMpu(no_prop, no_kab, no_kec);
			} else {
				$('#kelurahan-mpu').empty();
			}
			// $('#kelurahan').prop('readonly', false);
		});

		$('#kelurahan-mpu').change(function () {
			let nama_kel = $('#kelurahan-mpu option:selected').text();
			$('#nama_kelurahan-mpu').val(nama_kel);
		})
	})

	// On change for radio button is pasien
	$('input[type=radio][name=is_pasien]').change(function () {
		// Conditions
		if (this.value === 'ya') {
			// Set fields to empty string
			$('#nama-keluarga-mpu').val('');
			$('#tanggal-lahir-mpu').val('');
			document.getElementById("laki-laki-mpu").checked = false;
			document.getElementById("perempuan-mpu").checked = false;
			$('#alamat-form-rekam-medis-mpu').val('');
			$('#hubungan-keluarga-mpu').val('');
			$('#no-rt-mpu').val('');
			$('#no-rw-mpu').val('');
			$('#provinsi-mpu').val('');
			$('#kabupaten-mpu').val('');
			$('#kecamatan-mpu').val('');
			$('#kelurahan-mpu').val('');
			$('#no-ktp-mpu').val('');
			$('#no-hp-mpu').val('');

			// Disabled fields
			$("#nama-keluarga-mpu").prop("disabled", true);
			$("#tanggal-lahir-mpu").prop("disabled", true);
			$("#laki-laki-mpu").prop("disabled", true);
			$("#perempuan-mpu").prop("disabled", true);
			$("#alamat-form-rekam-medis-mpu").prop("disabled", true);
			$("#hubungan-keluarga-mpu").prop("disabled", true);
			$('#no-rt-mpu').prop("disabled", true);
			$('#no-rw-mpu').prop("disabled", true);
			$('#provinsi-mpu').prop("disabled", true);
			$('#kabupaten-mpu').prop("disabled", true);
			$('#kecamatan-mpu').prop("disabled", true);
			$('#kelurahan-mpu').prop("disabled", true);
			$('#no-ktp-mpu').prop("disabled", true);
			$('#no-hp-mpu').prop("disabled", true);
		} else if (this.value === 'tidak') {
			// Undisabled fields
			$("#nama-keluarga-mpu").prop("disabled", false);
			$("#tanggal-lahir-mpu").prop("disabled", false);
			$("#laki-laki-mpu").prop("disabled", false);
			$("#perempuan-mpu").prop("disabled", false);
			$("#alamat-form-rekam-medis-mpu").prop("disabled", false);
			$("#hubungan-keluarga-mpu").prop("disabled", false);
			$('#no-rt-mpu').prop("disabled", false);
			$('#no-rw-mpu').prop("disabled", false);
			$('#provinsi-mpu').prop("disabled", false);
			$('#kabupaten-mpu').prop("disabled", false);
			$('#kecamatan-mpu').prop("disabled", false);
			$('#kelurahan-mpu').prop("disabled", false);
			$('#no-ktp-mpu').prop("disabled", false);
			$('#no-hp-mpu').prop("disabled", false);
			getProvinsiMpu();
		}
	});

	function simpanPersetujuanUmum() {
		var id = $('#id-layanan-pendaftaran-form-mpu').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url( "pendaftaran_igd/api/pendaftaran_igd/simpan_persetujuan_umum" ) ?>',
			data: $('#form-persetujuan-umum').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader();
			},
			success: function (data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					$('#modal-persetujuan-tindakan-operasi').modal('hide');

					window.open('<?= base_url( 'pendaftaran_igd/cetak_persetujuan_umum/' ) ?>' + id, 'Cetak Persetujuan Umum', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function (data) {
				hideLoader();
			},
			error: function (e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			}
		});
	}

	// All Provinsi
	function getProvinsiMpu(no_prop = null, nama_prop = null) {
		$.ajax({
			url: '<?= base_url( 'opendata/api/opendata/get_provinsi' ) ?>',
			type: 'GET',
			cache: false,
			dataType: 'JSON',
			success: function (data) {
				let html = '';
				html += '<option value="">Pilih Provinsi</option>';
				$.each(data.data, function (i, v) {
					html += '<option value="' + v.NO_PROP + '">' + v.NAMA_PROP + '</option>';
				});

				$('#provinsi-mpu').html(html);

				if (no_prop) {
					$('#provinsi-mpu').val(no_prop);
				}

				if (nama_prop) {
					$('#nama_provinsi-mpu').val(nama_prop);
				}
			},
			error: function (e) {
				accessFailed(e.status);
			}
		});
	}

	getProvinsiMpu()

	// All Kabupaten
	function getKabupatenMpu(no_prop, no_kab = null, nama_kab = null) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url( 'opendata/api/opendata/get_list_kabupaten' ) ?>/no_prop/' + no_prop,
			cache: false,
			dataType: 'JSON',
			success: function (data) {
				let html = '';
				html += '<option value="">Pilih Kabupaten</option>';
				$.each(data.data, function (i, v) {
					html += '<option value="' + v.NO_KAB + '">' + v.NAMA_KAB + '</option>';
				});

				$('#kabupaten-mpu').html(html);

				if (no_kab) {
					$('#kabupaten-mpu').val(no_kab);
				}

				if (nama_kab) {
					$('#nama_kabupaten-mpu').val(nama_kab);
				}
			},
			error: function (e) {
				accessFailed(e.status);
			}
		});
	}

	// All Kecamatan
	function getKecamatanMpu(no_prop, no_kab, no_kec = null, nama_kec = null) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url( 'opendata/api/opendata/get_list_kecamatan' ) ?>/no_prop/' + no_prop + '/no_kab/' + no_kab,
			cache: false,
			dataType: 'JSON',
			success: function (data) {
				let html = '';
				html += '<option value="">Pilih Kecamatan</option>';
				$.each(data.data, function (i, v) {
					html += '<option value="' + v.NO_KEC + '">' + v.NAMA_KEC + '</option>';
				});

				$('#kecamatan-mpu').html(html);

				if (no_kec) {
					$('#kecamatan-mpu').val(no_kec);
				}

				if (nama_kec) {
					$('#nama_kecamatan-mpu').val(nama_kec);
				}
			},
			error: function (e) {
				accessFailed(e.status);
			}
		});
	}

	// All Kelurahan
	function getKelurahanMpu(no_prop, no_kab, no_kec, no_kel = null, nama_kel = null) {
		$.ajax({
			url: '<?= base_url( 'opendata/api/opendata/get_list_kelurahan' ) ?>/no_prop/' + no_prop + '/no_kab/' + no_kab + '/no_kec/' + no_kec,
			type: 'GET',
			cache: false,
			dataType: 'JSON',
			success: function (data) {
				let html = '';
				html += '<option value="">Pilih Kelurahan</option>';
				$.each(data.data, function (i, v) {
					html += '<option value="' + v.NO_KEL + '">' + v.NAMA_KEL + '</option>';
				});

				$('#kelurahan-mpu').html(html);

				if (no_kel) {
					$('#kelurahan-mpu').val(no_kel);
				}

				if (nama_kel) {
					$('#nama_kelurahan-mpu').val(nama_kel);
				}
			},
			error: function (e) {
				accessFailed(e.status);
			}
		});
	}
</script>

<!-- Modal -->
<div class="modal fade" id="modal-persetujuan-umum" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-persetujuan-umum-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open( '', 'id=form-persetujuan-umum class="form-horizontal"' ) ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-form-mpu">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-persetujuan-umum">
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="50%">Apakah form ditandatangani oleh pasien sendiri?</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="radio" name="is_pasien" id="is-pasien-ya-mpu" value="ya" class="mr-1">Ya
												<input type="radio" name="is_pasien" id="is-pasien-tidak-mpu" value="tidak" class="mr-1 ml-2">Tidak
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Nama keluarga / wali</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_keluarga" class="custom-form" id="nama-keluarga-mpu">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Tanggal lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_lahir" id="tanggal-lahir-mpu" class="custom-form clear-input col-lg-2">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Jenis kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="radio" name="jenis_kelamin" id="laki-laki-mpu" value="L" class="mr-1">Laki-laki
												<input type="radio" name="jenis_kelamin" id="perempuan-mpu" value="P" class="mr-1 ml-2">Perempuan
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="alamat_form_rekam_medis" id="alamat-form-rekam-medis-mpu" rows="3" class="form-control clear-input"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">No RT</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="number" name="no_rt" id="no-rt-mpu" class="custom-form clear-input col-lg-2">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">No RW</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="number" name="no_rw" id="no-rw-mpu" class="custom-form clear-input col-lg-2">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Provinsi</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="provinsi" class="custom-select reset-select" id="provinsi-mpu">
													<option value="">Pilih Provinsi</option>
												</select>
											</td>
											<input type="hidden" name="nama_provinsi" id="nama_provinsi-mpu" class="reset-field">
										</tr>
										<tr>
											<td class="bold" width="50%">Kabupaten/Kota</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="kabupaten" class="custom-select reset-select" id="kabupaten-mpu">
													<option value="">Pilih Kabupaten</option>
												</select>
											</td>
											<input type="hidden" name="nama_kabupaten" id="nama_kabupaten-mpu" class="reset-field">
										</tr>
										<tr>
											<td class="bold" width="50%">Kecamatan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="kecamatan" class="custom-select reset-select" id="kecamatan-mpu">
													<option value="">Pilih Kecamatan</option>
												</select>
											</td>
											<input type="hidden" name="nama_kecamatan" id="nama_kecamatan-mpu" class="reset-field">
										</tr>
										<tr>
											<td class="bold" width="50%">Kelurahan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<select name="kelurahan" class="custom-select reset-select" id="kelurahan-mpu">
													<option value="">Pilih Kelurahan</option>
												</select>
											</td>
											<input type="hidden" name="nama_kelurahan" id="nama_kelurahan-mpu" class="reset-field">
										</tr>
										<tr>
											<td class="bold" width="50%">Nomor KTP/SIM</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_identitas" class="custom-form" id="no-ktp-mpu" maxlength="16">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Nomor Telp/HP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_hp" class="custom-form" id="no-hp-mpu">
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Hubungan keluarga</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="hubungan_keluarga" class="custom-form" id="hubungan-keluarga-mpu">
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
				<button type="button" class="btn btn-info" onclick="simpanPersetujuanUmum()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
