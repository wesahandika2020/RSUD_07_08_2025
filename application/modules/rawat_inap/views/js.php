<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script type="text/javascript">
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	var JENIS_LAYANAN = '<?= $jenis ?>';
	var GROUP = '<?= $group ?>'

	$(function() {
		$('#jenis-rawat').val('Rawat Inap');
		$("#wizard-form").bwizard();

		unitAccount = "<?= $this->session->userdata('unit') ?>";
		if (unitAccount === 'Ulin 1') {
			$('#bangsal-search').val('16');
		} else if (unitAccount === 'Ulin 2') {
			$('#bangsal-search').val('17');
		}
		
		getListPemeriksaan(1);

		$('#dokter-search-ranap').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'JSON',
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
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show');
		});

		$('#bangsal-search').change(function() {
			getListPemeriksaan(1);
		});

		$('#btn-reload').click(function() {
			resetAllData();
			getListPemeriksaan(1);
		});

		$('#btn-export').click(function() {
			location.href = '<?= base_url('rawat_inap/export_data_rawat_inap?') ?>' + $('#form-search')
				.serialize() + '&bangsal=' + $('#bangsal-search').val();
		});

		// datepicker search tanggal
		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		// remove validasi keyup
		$('.validasi-input, .custom-textarea').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		$('#status_pasien_ranap').change(function() {
			getListPemeriksaan(1);
		})

		$('.tensi-s, .tensi-d, .suhu, .nadi, .respirasi, .nafas').keyup(function() {
			syams_validation_remove(this);
		})

		// remove validasi change
		$('.validasi-input, .select2-input, .select2c-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		// select2 dokter
		$('#dokter').select2c({
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
					var more = (page * 20) < data
						.total; // whether or not there are more results available

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
				$('#s2id_dokter_diagnosa a .select2c-chosen, #s2id_operator a .select2c-chosen, #dokter-detail, #s2id_dokter_rujuk a .select2-chosen, #s2id_dokter_rujuk_rad a .select2-chosen, #s2id_dokter-ranap a .select2-chosen, #s2id_dokter-diagnosa a .select2-chosen')
					.html(data.nama);
				$('#operator, #id-dokter-detail, #dokter_rujuk, #dokter_rujuk_rad, #dokter-ranap, #dokter-diagnosa').val(
					data.id);
				return data.nama;
			}
		});

		$('#dokter-diagnosa').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: $('#profesi').val(),
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
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#dokter-pengganti').select2c({
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
					var more = (page * 20) < data
						.total; // whether or not there are more results available

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
				$('#s2id_dokter_diagnosa a .select2c-chosen, #s2id_operator a .select2c-chosen, #dokter-detail, #s2id_dokter_rujuk a .select2-chosen, #s2id_dokter_rujuk_rad a .select2-chosen, #s2id_dokter-ranap a .select2-chosen, #s2id_dokter-diagnosa a .select2-chosen')
					.html(data.nama);
				$('#operator, #id-dokter-detail, #dokter_rujuk, #dokter_rujuk_rad, #dokter-ranap, #dokter-diagnosa').val(
					data.id);
				return data.nama;
			}
		});

		$('#dokter_rujuk').select2({
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
					var more = (page * 20) < data
						.total; // whether or not there are more results available

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

		$('#dokter_rujuk_rad').select2({
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
					var more = (page * 20) < data
						.total; // whether or not there are more results available

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

		// Change Pupil Input
		$('#pupil-other').change(function() {
			if ($(this).val() == 'on') {
				$('#pupil-bentuk').attr('disabled', false);
				$('#pupil-ukuran').attr('disabled', false);
				$('#pupil-reflek-cahaya').attr('disabled', false);
			}
		});

		$('#pupil-dbn').change(function() {
			if ($(this).val() == 'dbn') {
				$('#pupil-bentuk').attr('disabled', true);
				$('#pupil-ukuran').attr('disabled', true);
				$('#pupil-reflek-cahaya').attr('disabled', true);
			}
		});
		// End Change Pupil Input

		// Change Nervi Cranialis Input
		$('#nervi-cranialis-other').change(function() {
			if ($(this).val() == 'on') {
				$('#nervi-cranialis-paresis').attr('disabled', false);
			}
		});

		$('#nervi-cranialis-dbn').change(function() {
			if ($(this).val() == 'dbn') {
				$('#nervi-cranialis-paresis').attr('disabled', true);
			}
		});
		// End Change Nervi Cranialis Input

		// Change Sensorik Input
		$('#sensorik-other').change(function() {
			if ($(this).val() == 'on') {
				$('#sensorik-lain').attr('disabled', false);
			}
		});

		$('#sensorik-dbn').change(function() {
			if ($(this).val() == 'dbn') {
				$('#sensorik-lain').attr('disabled', true);
			}
		});
		// End Change Sensorik Input

		// Change Tanda Rangsang Meningeal Input
		$('#trm-other-one').change(function() {
			if ($(this).val() == 'on') {
				$('#trm-kaku-kuduk').attr('disabled', false);
				$('#trm-laseque').attr('disabled', true);
				$('#trm-kerning').attr('disabled', true);
			}
		});

		$('#trm-other-two').change(function() {
			if ($(this).val() == 'on') {
				$('#trm-kaku-kuduk').attr('disabled', true);
				$('#trm-laseque').attr('disabled', false);
				$('#trm-kerning').attr('disabled', true);
			}
		});

		$('#trm-other-three').change(function() {
			if ($(this).val() == 'on') {
				$('#trm-kaku-kuduk').attr('disabled', true);
				$('#trm-laseque').attr('disabled', true);
				$('#trm-kerning').attr('disabled', false);
			}
		});

		$('#trm-dbn').change(function() {
			if ($(this).val() == 'dbn') {
				$('#trm-kaku-kuduk').attr('disabled', true);
				$('#trm-laseque').attr('disabled', true);
				$('#trm-kerning').attr('disabled', true);
			}
		});
		// End Change Tanda Rangsang Meningeal Input

		// Show Diagnosa Manual
		$('.golongan-sebab-sakit-lain').hide();
		$('#diagnosa-manual').change(function() {
			$('#diagnosa-manual').each(function() {
				let val = this.type == "checkbox" ? +this.checked : this.value;
				$('#diagnosa-manual').val(val);
			});

			if ($('#diagnosa-manual').val() > 0) {
				$('.golongan-sebab-sakit-lain').show();
				$('.golongan-sebab-sakit').hide();
			} else {
				$('.golongan-sebab-sakit-lain').hide();
				$('.golongan-sebab-sakit-lain').val('');
				$('.golongan-sebab-sakit').show();
			}
		});

		// diagnosa klinik
		$('#diagnosa-klinik').change(function() {
			$('#diagnosa-klinik').each(function() {
				let val = this.type == "checkbox" ? +this.checked : this.value;
				$('#diagnosa-klinik').val(val);
			});
		});

		// diagnosa akhir
		$('#diagnosa-akhir').change(function() {
			$('#diagnosa-akhir').each(function() {
				let val = this.type == "checkbox" ? +this.checked : this.value;
				$('#diagnosa-akhir').val(val);
			});
		});

		// penyebab kematian
		$('#penyebab-kematian').change(function() {
			$('#penyebab-kematian').each(function() {
				let val = this.type == "checkbox" ? +this.checked : this.value;
				$('#penyebab-kematian').val(val);
			});
		});

		$('#dokterhide').select2c({
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
					var more = (page * 20) < data
						.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					};
				}
			},
			formatResult: function(data) {
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});
	});

	function resetAllData() {
		let filterBangsal = $('#bangsal-search').val();
		$('#tanggal-awal, #tanggal-akhir').val('');
		$('#bangsal-search').val(filterBangsal);
		syams_validation_remove('.form-control');
		syams_validation_remove('.select2-input');
		syams_validation_remove('.select2c-input');
		$('#jenis-rawat').val('Rawat Inap');
	}

	function getListPemeriksaan(page) {
		$('#page_now').val(page);
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		let idAccountGroup = "<?= $this->session->userdata('id_account_group') ?>";
		$.ajax({
			type: 'GET',
			url: '<?= base_url("rawat_inap/api/rawat_inap/get_list_rawat_inap") ?>/page/' + page,
			data: $('#form-search').serialize() + '&bangsal=' + $('#bangsal-search').val() +
				'&status_pasien_ranap=' + $('#status_pasien_ranap').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPemeriksaan(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();


				$.each(data.data, function(i, v) {
					let disabled = '';
					let disabledCancel = '';
					let disabledDischarge = '';
					let status_resep = '';
					let status = '';
					let resep_resep = '';
					let disable_cco_smtr = '';
					let disable_cco_smtr_it = '';
					let disable_cco_smtr_btl = '';
					let disable_viewonly = '';
					let bed = v.bangsal + ' kelas ' + v.kelas + ' ruang ' + v.no_ruang + ' No. Bed ' + v.no_bed;
					let statusResep = '';
					if (parseFloat(v.jml_resep) === 0) {
						statusResep = '-';
					} else {
						statusResep = '<span class="fas fa-fw fa-check-square"></span>'
					}

					if (v.waktu_keluar === null) {
						disabled = '';
						disabled_resep = '';
						disabledDischarge = 'disabled';
						disabledCancel = 'disabled';
					} else {
						if (v.checkout == 1) {
							disabledDischarge = 'disabled';
						} else {
							disabledDischarge = '';
						}

						disabled_resep = v.waktu_keluar !== null && v.tindak_lanjut === 'cco sementara it' ? '' : 'disabled';
						disabledCancel = '';

						if (v.tindak_lanjut === 'cco sementara') {
							disabled = '';
						} else {
							disabled = 'disabled';
						}
					}

					let groupAction = '';
					let btnKonfirmasi = '';
					let noWrap = '';
					if (v.konfirmasi_ranap != 'Ya') {
						btnKonfirmasi =
							'<button type="button" title="Konfirmasi pasien masuk ruangan" class="btn btn-secondary btn-xs mr-1" onclick="konfirmasiRawatInap(' +
							v.id_rawat_inap + ',' + v.id_bangsal + ')" ' + (v.status_terlayani ==
								'Batal' ? 'disabled' : '') +
							'><i class="fas fa-fw fa-check-circle mr-1"></i>Konfirmasi</button>';
						if (idAccountGroup == '1') {
							btnKonfirmasi +=
								'<button type="button" title="Pembatalan Rawat Inap" class="btn btn-danger btn-xs" onclick="pembatalanRawatInap(' +
								v.id + ')" ' + (v.status_terlayani == 'Batal' ? 'disabled' : '') +
								'><i class="fas fa-fw fa-trash-alt mr-1"></i>Batal</button>';
						}

						noWrap = 'nowrap';
						groupAction = 'display:none';
					} else {
						groupAction = 'display:flex;justify-content:flex-end';
					}

					let activeStyle = '';
					if (v.tindak_lanjut === 'Batal') {
						disabled = 'disabled';
						disabledDischarge = 'disabled';
						disabledCancel = 'disabled';
						activeStyle = 'active-status';
						disable_cco_smtr = 'disabled';
						disable_cco_smtr_it = 'disabled';
						disable_cco_smtr_btl = 'disabled';
					} else {
						if (v.tindak_lanjut === null) {
							disabled = '';
							disable_cco_smtr = 'disabled';
							disable_cco_smtr_it = 'disabled';
							disable_cco_smtr_btl = 'disabled';
						} else {
							if (v.tindak_lanjut === 'cco sementara') {
								disabled = '';
								disable_cco_smtr = 'disabled';
								if (v.tindak_lanjut_sementara !== '') {
									disable_cco_smtr_btl = '';
								} else {
									disable_cco_smtr_btl = 'disabled';
								}
							} else if (v.tindak_lanjut === 'cco sementara it') {
								disabled = '';
								disable_cco_smtr_it = 'disabled';
								disable_cco_smtr = 'disabled';

								if (v.tindak_lanjut_sementara !== '') {
									disable_cco_smtr_btl = '';
								} else {
									disable_cco_smtr_btl = 'disabled';
								}
							} else {
								disable_cco_smtr = '';
								disable_cco_smtr_it = '';
								disable_cco_smtr_btl = 'disabled';
								disabled = 'disabled';
								disable_cco_smtr = '';
							}
						}
					}

					if (accountGroup === 'Admin Radiologi' || accountGroup === 'Admin Farmasi Ranap' ||
						accountGroup === 'Karu Farmasi' || accountGroup === 'Maternal Neotanal') {
						disabled = 'disabled';
					}

					if ((accountGroup === 'Komite Keperawatan') || accountGroup === 'Kasir') { //READ ONLY
						disable_viewonly = 'disabled';
					} else {
						disable_viewonly = '';
					}
					if (v.tindak_lanjut === null && disable_viewonly == '') {
						riwayat_rekammedis = '';
					} else {
						riwayat_rekammedis = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="riwayatPasien(\'' + v.id_pasien + '\')"><i class="fas fa-eye m-r-5"></i> Lihat Riwayat Rekam Medis Pasien</a>';
					}

					let btnEntriFormulirPasien = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showListForm(\'' + v.id_pendaftaran + '\', \'' + v.id + '\', \'' + v.id_pasien + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Formulir</a>';

					let layananBefore = '';
					if (v.before.jenis_layanan !== 'Poliklinik') {
						layananBefore = v.before.jenis_layanan;
					} else {
						layananBefore = 'Poliklinik ' + v.before.spesialisasi;
					}

					let detail = v.id + '#' + v.id_pasien + '#' + v.nama + '#' + v.dokter + '#' + v
						.id_dokter + '#' + hitungUmur(v.tanggal_lahir) + '#' + v.jenis_layanan + '#' + v
						.id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#ranap';
					let no = ((i + 1) + ((data.page - 1) * data.limit));

					let tindakLanjut = v.tindak_lanjut !== null ? v.tindak_lanjut : '-';

					if (tindakLanjut === 'cco sementara it') {
						tindakLanjut = 'cco sementara billing';
					}


					// Untuk Unit Paru
					if (('<?= $this->session->userdata('unit') ?>' === 'Paru')) {

						upload_file_rm = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="uploadFileRM(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.id_pasien + '\')"><i class="fas fa-upload m-r-5"></i> Upload File Rekam Medis</a>';
						entriPemeriksaan = '<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="KonfirmDetailPemeriksaan(' + '0' + ',' + v.id_pendaftaran + ',' + v.id + ',' + v.visit_anestesi + ',\'' + bed + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pemeriksaan</a>';

						let html = /* html */ `
							<tr class="${activeStyle}">
															<td class="center">${no}</td>
								<td class="center">${v.no_register}</td>
								<td class="center">${((v.waktu_konfirmasi_ranap !== null) ? datetimefmysql(v.waktu_konfirmasi_ranap) : '')}</td>
								<td class="center">${((v.waktu_keluar !== null) ? datetimefmysql(v.waktu_keluar) : '')}</td>
								<td class="">${v.id_pasien}</td>
								<td class="nowrap">${v.nama}</td>
								<td class="">${bed}</td>
								<td class="">${(v.dokter)}</td>
								<td class="">${v.cara_bayar} ${(v.cara_bayar !== 'Tunai' ? '<b>( ' + v.penjamin + ' )</b>' : '')}</td>
								<td class="center">${statusResep}</td>
								<td class="center">${((v.tindak_lanjut !== null) ? v.tindak_lanjut : '-')}</td>
								<td class="right ${noWrap}">
									<div style="${groupAction}">
										<div class="dropdown">
											<button class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fas fa-fw fa-cog mr-1"></i>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												${entriPemeriksaan}
												${upload_file_rm}
											</div>
										</div>
									</div>
								</td>
							</tr>
						`;

						$('#table-data tbody').append(html);

					} else {

						let html = /* html */ `
							<tr class="${activeStyle}">
								<td class="center">${no}</td>
								<td class="center">${v.no_register}</td>
								<td class="center">${((v.waktu_konfirmasi_ranap !== null) ? datetimefmysql(v.waktu_konfirmasi_ranap) : '')}</td>
								<td class="center">${((v.waktu_keluar !== null) ? datetimefmysql(v.waktu_keluar) : '')}</td>
								<td class="">${v.id_pasien}</td>
								<td class="nowrap">${v.nama}</td>
								<td class="">${bed}</td>
								<td class="">${(v.dokter)}</td>
								<td class="">${v.cara_bayar} ${(v.cara_bayar !== 'Tunai' ? '<b>( ' + v.penjamin + ' )</b>' : '')}</td>
								<td class="center">${statusResep}</td>
								<td class="center">${tindakLanjut}</td>
								<td class="right ${noWrap}">
									${btnKonfirmasi}
									<div style="${groupAction}">
										<button ${disabled_resep} ${disable_viewonly} type="button" class="btn btn-secondary btn-xs mr-1 nowrap" title="Klik untuk input resep" onclick="inputResep('${detail}')">
											<i class="fas fa-plus-circle mr-1"></i> Resep
										</button>
											<div class="dropdown">
												<button class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fas fa-fw fa-cog mr-1"></i>
												</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												${btnEntriFormulirPasien}
												${riwayat_rekammedis}

												${accountGroup === 'Admin' ?
													'<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="KonfirmDetailPemeriksaan(' + '0' + ',' + v.id_pendaftaran + ',' + v.id + ',' + v.visit_anestesi + ',\'' + bed + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pemeriksaan</a>'
													: '<a class="dropdown-item ' + disabled + ' ' + disable_viewonly + ' btn-xs" href="javascript:void(0)" onclick="KonfirmDetailPemeriksaan(' + '0' + ',' + v.id_pendaftaran + ',' + v.id + ',' + v.visit_anestesi + ',\'' + bed + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pemeriksaan</a>'
												}
												${accountGroup === 'Admin' | accountGroup === 'Admin Rawat Inap' ?
													'<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriCPPT(' + v.id_pendaftaran + ',' + v.id + ',\'' + bed + '\',\'\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri CPPT</a>'
													: '<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriCPPT(' + v.id_pendaftaran + ',' + v.id + ',\'' + bed + '\',\'\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri CPPT</a>'
												}
												${accountGroup === 'Admin' ?
													'<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriEdukasi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Edukasi Pasien</a>'
													: '<a class="dropdown-item ' + disabled + ' btn-xs" href="javascript:void(0)" onclick="entriEdukasi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Edukasi Pasien</a>'
												}
												${accountGroup === 'Admin' ?
													'<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="riwayatGizi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-eye mr-1"></i>Riwayat Gizi</a>'
													: '<a class="dropdown-item ' + disabled + ' btn-xs" href="javascript:void(0)" onclick="riwayatGizi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-eye mr-1"></i>Riwayat Gizi</a>'
												}

												${v.tindak_lanjut === 'Pulang APS' ? '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratAPS(' + v.id_pendaftaran + ',' + v.id + ', ' + v.id_rawat_inap + ')"><i class="fas fa-fw fa-file-medical-alt mr-1"></i>Buat Surat Pulang APS</a>' : ''}
												${'<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratKontrol(' + v.id_pendaftaran + ', ' + v.id + ')"><i class="fas fa-fw fa-file-medical-alt mr-1"></i>Buat Surat Kontrol</a>'}
												${v.tindak_lanjut === 'RS Lain' ? '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratRujukan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-file-medical-alt mr-1"></i>Buat Surat Rujukan</a>' : ''}
												${'<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="settingPerlakuanKhusus(\'' + v.id_pasien + '\')"><i class="fas fa-fw fa-thumbtack mr-1"></i>Set Perlakuan Khusus</a>'}

												${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="uploadFileRM(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.id_pasien + '\')"><i class="fas fa-upload m-r-5"></i> Upload File Rekam Medis</a>'}

												${'<a class="dropdown-item ' + disabled + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cekCheckOut(' + v.id_pendaftaran + ',' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter + '\')"><i class="fas fa-fw fa-arrow-circle-right mr-1"></i>Status Keluar</a>'}
												${'<a class="dropdown-item ' + disabledDischarge + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="dischargeBed(' + v.id_rawat_inap + ')"><i class="fas fa-fw fa-unlink mr-1"></i>Kosongkan Bed</a>'}
												${'<a class="dropdown-item waves-effect waves-light btn-xs mypopover" href="javascript:void(0)" data-container="body" data-toggle="popover" data-placement="left" data-title="Asal Pasien Masuk" data-content="' + layananBefore + '"><i class="fas fa-fw fa-address-book mr-1"></i>Asal Pasien Masuk</a>'}

												${accountGroup === 'Admin' | accountGroup === 'Kepala Instalasi Rawat Inap' | accountGroup === 'Kepala Ruangan Rawat Inap' | accountGroup === 'Admin Rekam Medis' ?
													'<a class="dropdown-item '+disabledCancel+' btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluar('+v.id_pendaftaran+','+v.id+')"><i class="fas fa-fw fa-times-circle mr-1"></i>Pembatalan Status Keluar</a>' : ''
												}
												${accountGroup === 'Admin'  ?
													'<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="pembatalanRawatInap('+v.id+')" '+(v.status_terlayani == 'Batal' ? 'disabled' : '')+'><i class="fas fa-fw fa-trash-alt mr-1"></i>Pembatalan Rawat Inap</a>' : ''
												}
												
												${accountGroup === 'Kepala Instalasi Rawat Inap' | accountGroup === 'Kepala Ruangan Rawat Inap' | accountGroup === 'Admin Rekam Medis' | accountGroup === 'Dokter Spesialis RM' | accountGroup === 'Admin Pelayanan Medik' | accountGroup === 'Dokter Spesialis RM Rehab' ?
													'<a class="dropdown-item ' + disable_cco_smtr + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara</a>'
													: ''
												}
												${accountGroup === 'Admin' ?
													'<a class="dropdown-item ' + disable_cco_smtr_it + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementaraIt(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>status keluar sementara Billing</a>'
													: ''
												}
												${accountGroup === 'Admin' | accountGroup === 'Kepala Instalasi Rawat Inap' | accountGroup === 'Kepala Ruangan Rawat Inap' | accountGroup === 'Admin Rekam Medis' | accountGroup === 'Dokter Spesialis RM' | accountGroup === 'Admin Pelayanan Medik' | accountGroup === 'Dokter Spesialis RM Rehab' | accountGroup === 'Dokter Spesialis' | accountGroup === 'Dokter Umum' ?
													'<a class="dropdown-item ' + disable_cco_smtr_btl + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar Sementara</a>'
													: ''
												}
											</div>
										</div>
									</div>
								</td>
							</tr>
						`;

						$('#table-data tbody').append(html);
					}

				});

				$('.mypopover').popover({
					html: true,
					trigger: 'hover'
				});
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function cekCheckOut(id_pendaftaran, id_layanan_pendaftaran, resep, id_dokter, dokter) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/cek_checkout") ?>/' + id_layanan_pendaftaran,
			dataType: 'JSON',
			success: function(data) {
				if (data.status === false) {
					swalAlert('warning', 'Informasi', data.message);
				} else {
					formTindakLanjut(id_pendaftaran, id_layanan_pendaftaran, resep, id_dokter, dokter);
				}
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan, Silahkan Coba Beberapa Saat Lagi', 'Error');
			}
		})
	}

	function paging(page, tab) {
		if (tab === 1) {
			getListPemeriksaan(page);
		} else if (tab === 2) {
			getListHistoryResep(page, $('#id-resep-history').val());
		}
	}

	// HEMODIALISA
	function addHemodialisisRanap() {
		let status = $('#hemo-status').text();
		let dokter = $('#dokter-hemodialisis').val();
		let cara_bayar_hemodialisis = $('#cara-bayar-hemodialisis').val();
		let id_penjamin_hemodialisis = $('#id-penjamin-hemodialisis').val();
		let no_polish_hemodialisis = $('#no-polish-hemodialisis').val();
		let no_sep_hemodialisis = $('#no-sep-hemodialisis').val();
		let id_dftr_hemodialisis = $('#id-dftr-hemodialisis').val();

		if (status === '') {
			let i = $('.hemo-rec').length;
			let html = /* html */ `
                <tr class="hemo-rec">
                    <td class="center">${i + 1}</td>
                    <td class="left"><?php echo date("d/m/Y H:i") ?></td>
                    <td class="center">Hemodialisis</td>
                    <td class="center">
                        <em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i><span id="hemo-status">Request</span></em>
                        <input type="hidden" name="hemo_order[]" id="hemo-order"><input type="hidden" name="id_dftr_hemodialisis[]" value="${id_dftr_hemodialisis}"><input type="hidden" name="dokter_hemodialisis[]" value="${dokter}"><input type="hidden" name="cara_bayar_hemodialisis[]" value="${cara_bayar_hemodialisis}"><input type="hidden" name="id_penjamin_hemodialisis[]" value="${id_penjamin_hemodialisis}"><input type="hidden" name="no_polish_hemodialisis[]" value="${no_polish_hemodialisis}"><input type="hidden" name="no_sep_hemodialisis[]" value="${no_sep_hemodialisis}">
                    </td>
                    <td class="center">
                        <button title="Hapus Order Hemodialisis" type="button" class="btn btn-secondary btn-xs" onclick="removeHemodialisis(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            `;
			$('#table-order-hemodialisis tbody').append(html)
		} else {
			swalAlert('info', 'Informasi', 'Harap simpan dan selesaikan Permintaan Hemodialisis terlebih dahulu!')
		}
	}

	// END HEMODIALISA

	// DPMP
	function addDPMPRanap() {

		let status = $('#dpmp-status').text();
		let id_dftr_dpmp = $('#id-dftr-dpmp').val();

		if (status === '') {
			let i = $('.dpmp-rec').length;
			let html = /* html */ `
                <tr class="dpmp-rec">
                    <td class="center">${i + 1}</td>
                    <td class="left"><?php echo date("d/m/Y H:i") ?></td>
                    <td class="center">DPMP</td>
                    <td class="center">
                        <em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i><span id="dpmp-status">Request</span></em>
                        <input type="hidden" name="dpmp_order[]" id="dpmp-order"><input type="hidden" name="id_dftr_hemodialisis[]" value="${id_dftr_dpmp}"></td>
                    <td class="center">
                        <button title="Hapus Order DPMP" type="button" class="btn btn-secondary btn-xs" onclick="removeDPMP(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            `;
			$('#table-order-dpmp tbody').append(html)
		} else {
			swalAlert('info', 'Informasi', 'Harap simpan dan selesaikan Permintaan DPMP terlebih dahulu!')
		}
	}

	// END DPMP

	function removeDPMP(its) {
		var parent = its.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
		var jml = $('.dpmp-rec').length;
		for (i = 0; i <= jml; i++) {
			$('.dpmp-rec:eq(' + i + ')').children('td:eq(0)').html(i + 1)
		}
	}

	function removeHemodialisis(its) {
		var parent = its.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
		var jml = $('.hemo-rec').length;
		for (i = 0; i <= jml; i++) {
			$('.hemo-rec:eq(' + i + ')').children('td:eq(0)').html(i + 1)
		}
	}

	function datetimerezmysql(waktu) {

		let tm = waktu.split('-');
		let gm = tm[2];
		let sx = tm[2].split(':');
		let fx = sx[0].split(' ');
		return fx[0] + '/' + tm[1] + '/' + tm[0] + ' ' + fx[1] + ':' + sx[1];
	}

	function getDataHemodialisis(id_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_data_hemodialisis") ?>/id_daftar/' + id_pendaftaran +
				'/jenis/Hemodialisa',
			dataType: 'JSON',
			success: function(data) {
				$('#table-order-hemodialisis tbody').empty();
				if (data !== undefined) {
					$.each(data.data, function(i, v) {

						let status = '';
						let button = '';
						if (v.status === 'Belum') {
							status =
								'<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Order</em>';
							button =
								'<button title="Hapus Order Hemodialisis" type="button" class="btn btn-secondary btn-xs" onclick="HapusHemodialRanap(' +
								v.id + ', ' + id_pendaftaran +
								'  )"><i class="fas fa-trash-alt"></i></button>';
						} else if (v.status === 'Batal') {
							status =
								'<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
						} else {
							status =
								'<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Diperiksa</span></h5>';
						}

						let html = /* html */ `
                            <tr class="hemo-rec">
                                <td class="center">${(++i)}</td>
                                <td>${datetimerezmysql(v.tanggal_layanan)}</td>
                                <td class="center">Hemodialisis</td>
                                <td class="center">${status}</td>
                                <td class="center">${button}</td>
                            </tr>
                        `;
						$('#table-order-hemodialisis tbody').append(html);
					})

				} else {

					$('#table-order-hemodialisis tbody').empty();
				}

			}
		})
	}

	function getDataDPMP(id_pendaftaran, id_layanan) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_data_dpmp") ?>/id_daftar/' + id_pendaftaran,
			dataType: 'JSON',
			success: function(data) {
				$('#table-order-dpmp tbody').empty();
				if (data !== undefined) {
					$.each(data.data, function(i, v) {

						let status = '';
						let button = '';
						if (v.status === 'Belum') {
							status =
								'<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Order</em>';
							button =
								'<button title="Batal Order DPMP" type="button" class="btn btn-secondary btn-xs" onclick="BatalDPMPRanap(' +
								v.od_id + ', ' + id_pendaftaran + ',' + id_layanan +
								')"><i class="fas fa-trash-alt"></i></button>';
						} else if (v.status === 'Batal') {
							status =
								'<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
						} else if (v.status === 'Konfirm') {
							status =
								'<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';
						}

						let html = /* html */ `
                            <tr class="dpmp-rec">
                                <td class="center">${(++i)}</td>
                                <td>${datetimerezmysql(v.waktu_order)}</td>
                                <td class="center">DPMP</td>
                                <td class="center">${status}</td>
                                <td class="center">${button}</td>
                            </tr>
                        `;
						$('#table-order-dpmp tbody').append(html);
					})

				} else {

					$('#table-order-dpmp tbody').empty();
				}

			}
		})
	}

	function BatalDPMPRanap(id, id_pendaftaran, id_layanan) {
		let id_layanan_pendaftaran = id_layanan;
		bootbox.dialog({
			message: "Anda yakin akan membatalkan Order ini?",
			title: "Batal Order DPMP",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				hapus: {
					label: '<i class="fas fa-trash-alt mr-1"></i>Simpan',
					className: "btn-info",
					callback: function() {
						$.ajax({
							type: 'POST',
							url: '<?= base_url("gizi/api/gizi/batal_order_dpmp") ?>',
							data: 'id_order=' + id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {

								if (data.status === true) {
									messageCustom(data.pesan, 'Success');
									let ini = '9';
									detailPemeriksaan(ini, id_pendaftaran, id_layanan_pendaftaran);
								} else {
									customAlert('Batal Order DPMP Rawat Inap', data.pesan);
								}
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	}

	function HapusHemodialRanap(id, id_pendaftaran) {
		bootbox.dialog({
			message: "Anda yakin akan menghapus Order ini?",
			title: "Hapus Order Hemodialisis",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				hapus: {
					label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
					className: "btn-info",
					callback: function() {
						$.ajax({
							type: 'DELETE',
							url: '<?= base_url("pelayanan/api/pelayanan/hapus_order_hemodialisa") ?>/' +
								id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status === true) {
									messageCustom(data.message, 'Success');
									let ini = '8';
									detailPemeriksaan(ini, id_pendaftaran, id);
								} else {
									customAlert('Hapus Order Hemodialisis Rawat Inap', data
										.message);
								}
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	}

	function pembatalanRawatInap(id_layanan_pendaftaran) {
		swal.fire({
			title: 'Pembatalan Rawat Inap',
			html: "Apakah anda yakin ingin membatalkan pasien rawat inap ini ?",
			icon: 'warning',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Proses',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'GET',
					url: '<?= base_url("rawat_inap/api/rawat_inap/pembatalan_rawat_inap") ?>/id_layanan_pendaftaran/' +
						id_layanan_pendaftaran,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom('Berhasil melakukan pembatalan rawat inap', 'Success');
						} else {
							messageCustom('Gagal melakukan pembatalan rawat inap', 'Error');
						}

						getListPemeriksaan($('#page_now').val());
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan pembatalan rawat inap', 'Error');
					},
				});
			}
		});
	}

	function UpdateKetersediaanBedID(koderuang) {

		$.ajax({
			type: 'POST',
			url: '<?= base_url(URL_APLICARES . "update_bed") ?>/' + koderuang,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoaderWithMessage('Proses update ketersediaan bed. Mohon tunggu');
			},
			success: function(data) {
				// console.log(data)
				// $('#id-bangsal').val();
				$('input[name=csrf_syam]').val('<?= $this->security->get_csrf_hash() ?>');
				if (data.metadata.code == "1") {
					// $('#modal-summary-bed').modal('hide');
					// getListBed(1);
					// resetAll();
					swalCustom('success', 'Berhasil', data.metadata.message);
				} else {
					swalCustom('error', 'Gagal update ketersediaan bed', data.metadata.message);
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				swalCustom("error", "Koneksi Bermasalah",
					"Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi IT BPJS"
				);
			}
		});
	}

	function konfirmasiRawatInap(id_rawat_inap, id_bangsal) {
		swal.fire({
			title: 'Konfirmasi Masuk Ruangan Rawat Inap',
			html: "Apakah pasien sudah masuk ruangan ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Sudah',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("rawat_inap/api/rawat_inap/konfirmasi_masuk_rawat_inap") ?>',
					data: {
						id_rawat_inap: id_rawat_inap
					},
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						UpdateKetersediaanBedID(id_bangsal);
						if (data.status) {
							messageCustom(data.message, 'Success');
						} else {
							messageCustom(data.message, 'Error');
						}

						getListPemeriksaan($('#page_now').val());
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT.', 'Error');
					},
				});
			}
		});
	}

	function setTanggalPencarian() {
		let nik = $('#nik-search').val();
		let nama = $('#nama-search').val();
		let noRM = $('#no-rm-search').val();
		let tanggalAwal = $('#tanggal-awal').val();
		let tanggalAkhir = $('#tanggal-akhir').val();
		let noRegister = $('#no-register-search').val();

		resetAllData();
		$('#nik-search').val(nik);
		$('#nama-search').val(nama);
		$('#no-rm-search').val(noRM);
		$('#tanggal-awal').val(tanggalAwal);
		$('#tanggal-akhir').val(tanggalAkhir);
		$('#no-register-search').val(noRegister);
	}

	function detailPemeriksaan(ini, id_pendaftaran, id_layanan, bed) {
		$('#wizard-form').bwizard('show', ini);

		setTanggalPencarian();

		$('#id-layanan').val(id_layanan);
		$('#id-pendaftaran-pasien').val(id_pendaftaran);
		$('#id-dftr-hemodialisis').val(id_pendaftaran);
		$('#id-dftr-dpmp').val(id_pendaftaran);

		get_pemeriksaan_lab(id_layanan);
		get_pemeriksaan_rad(id_layanan);
		getPemeriksaanFisio(id_layanan);
		getPemeriksaanOperasi(id_layanan);
		getPemeriksaanVK(id_layanan);
		getPemeriksaanBimroh(id_layanan);
		getPemeriksaanTalqin(id_layanan);
		getDataHemodialisis(id_pendaftaran);
		getDataDPMP(id_pendaftaran, id_layanan);

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran +
				'/id_layanan/' + id_layanan,
			cache: false,
			dataType: 'JSON',
			success: function(data) {

				console.log(data);  // WESACOBA

				let umur = '';
				let kelamin = '';
				let pasien = data.pasien;
				let layanan = data.layanan;
				let anamnesa = data.anamnesa[0];

				if (pasien !== null) {
					$('.form-anamnesa button[data-target="#anamnesa"]').attr('data-target', '#anamnesa')
					$('button[title="tambah diagnosa"]').off('click').attr('onclick', 'addDiagnosaRanap()')
					$('button[title="tambah soap"]').off('click').attr('onclick', 'addSOAP()')
					if (layanan.tindak_lanjut === 'cco sementara') {
						$('button[title="Tambah Tindakan"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah tindakan, silahkan hubungi <b>Kasir</b>')
						})

						$('button[title="tambah bhp"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah BHP, silahkan hubungi <b>Kasir</b>')
						})

						$('button[title="order pemeriksaan lab"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order Pemeriksaan Laboratorium, silahkan hubungi <b>Kasir</b>')
						})

						$('button[title="order pemeriksaan rad"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order Pemeriksaan Radiologi, silahkan hubungi <b>Kasir</b>')
						})

						$('button[title="tambah order hd"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order Hemodialisis, silahkan hubungi <b>Kasir</b>')
						})

						$('button[title="order operasi"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Tindakan Operasi, silahkan hubungi <b>Kasir</b>')
						})

						$('button[title="order vk"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order VK, silahkan hubungi <b>Kasir</b>')
						})

						$('button[title="permintaan darah"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Permintaan Darah, silahkan hubungi <b>Kasir</b>')
						})
					} else if (layanan.tindak_lanjut === 'cco sementara it') {
						$('button[title="tambah diagnosa"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sedang checkout billing. Silahkan lakukan cco sementara')
						})
						$('button[title="tambah soap"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sedang checkout billing. Silahkan lakukan cco sementara')
						})
						$('.form-anamnesa button[data-target="#anamnesa"]').removeAttr('data-target')
					} else {
						$('button[title="Tambah Tindakan"]').off('click').attr('onclick', 'addTindakan()')
						$('button[title="tambah bhp"]').off('click').attr('onclick', 'addBHP(); return false;')
						$('button[title="order pemeriksaan lab"]').off('click').attr('onclick', 'request_lab()')
						$('button[title="order pemeriksaan rad"]').off('click').attr('onclick', 'request_rad()')
						$('button[title="tambah order hd"]').off('click').attr('onclick', 'addHemodialisisRanap()')
						$('button[title="order operasi"]').off('click').attr('onclick', 'addOrderOperasi()')
						$('button[title="order vk"]').off('click').attr('onclick', 'addOrderVK()')
						$('button[title="permintaan darah"]').off('click').attr('onclick', 'addDarah()')
					}
					if (pasien.kelamin == 'L') {
						kelamin = 'Laki - laki';
					} else {
						kelamin = 'Perempuan';
					}

					if (pasien.tanggal_lahir !== null) {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
					}

					$('#id-pasien').val(pasien.id_pasien);
					$('#nama-detail').html(pasien.nama);
					$('#no-rm-detail').html(pasien.id_pasien);
					$('#no-register-detail').html(pasien.no_register);
					$('#kelamin-detail').html(kelamin);
					$('#umur-detail').html(umur);
					$('#agama-detail').html(pasien.agama);
					$('#telp-detail').html(pasien.telp);
					$('#alamat-detail').html(pasien.alamat);

					
					$('#alergi-detail').html(pasien.alergi);
					// $('#alergi-detail-TAIIII').html(pasien.alergi);

					// TAMBAHAN WSH
					// $('#logo-pasien-alergi').attr('title', pasien.alergi);
					// $('#alergi-coba').html(pasien.alergi); GUNAKAN NNTI KETIKA DATA ALERGI HARUS MUNCUL BUKAN CUMA MUNCUL KETIKA DISOROT
					$('#logo-pasien-alergi').attr('title', '‼️ A L E R G I ‼️\n→' + pasien.alergi + '');



					$('#alergi').val(pasien.alergi);
					$('#no-ktp-pasien').val(pasien.no_identitas);
					$('#tgl-lahir').val(pasien.tanggal_lahir);

					$('#hak-kelas-pasien').html((pasien.hak_kelas !== null ? pasien.hak_kelas : '-'));

					$('#subspesialis').empty();
					if (data.subspesialis.length > 0) {
						$('#subspesialis-row').show();

						var opt = '<option value="">Pilih Sub Spesialis</option>';
						$('#subspesialis').append(opt);
						$.each(data.subspesialis, function(i, v) {
							opt = '<option value="' + v.id + '">' + v.nama + '</option>';
							$('#subspesialis').append(opt);
						});

						$('#subspesialis').val(layan.id_sub_spesialis);
					} else {
						$('#subspesialis-row').hide();
					}

					$('.logo-pasien-alergi').hide();
					$('.logo-pasien-meninggal').hide();
					$('.logo-pasien-hiv-aids').hide();
					$('.logo-pasien-gonorrhea').hide();
					$('.logo-pasien-hepatitis').hide();
					$('.logo-pasien-kusta-lepra').hide();
					$('.logo-pasien-tbc-kp').hide();
					$('.logo-pasien-pejabat').hide();
					$('.logo-pasien-pemilik-rs').hide();
					$('.logo-pasien-potensi-komplain').hide();
					if (data.profil !== null) {
						// status profil pasien
						if (data.profil.is_alergi == 'Ya') {
							$('.logo-pasien-alergi').show();
						}
						if (data.profil.is_died == 'Ya') {
							$('.logo-pasien-meninggal').show();
						}
						if (data.profil.is_hiv == 'Ya') {
							$('.logo-pasien-hiv-aids').show();
						}
						if (data.profil.is_gonorrhea == 'Ya') {
							$('.logo-pasien-gonorrhea').show();
						}
						if (data.profil.is_hepatitis == 'Ya') {
							$('.logo-pasien-hepatitis').show();
						}
						if (data.profil.is_kusta == 'Ya') {
							$('.logo-pasien-kusta-lepra').show();
						}
						if (data.profil.is_tbc == 'Ya') {
							$('.logo-pasien-tbc-kp').show();
						}
						if (data.profil.is_pasien_pejabat == 'Ya') {
							$('.logo-pasien-pejabat').show();
						}
						if (data.profil.is_pemilik_rs == 'Ya') {
							$('.logo-pasien-pemilik-rs').show();
						}
						if (data.profil.is_potensi_komplain == 'Ya') {
							$('.logo-pasien-potensi-komplain').show();
						}
					}

					//instansi
					$('instansi-detail').html(pasien.instansi_perujuk);
					$('nadis-detail').html(pasien.nadis_perujuk);

					// Penanggung Jawab
					$('#nama-pjwb-detail').html(pasien.nama_pjwb);
					$('#alamat-pjwb-detail').html(pasien.alamat_pjwb);
					$('#telp-pjwb-detail').html(pasien.telp_pjwb);
					$('#nama-pjwb-keuangan-detail').html(pasien.nama_pjwb_finansial);
					$('#alamat-pjwb-keuangan-detail').html(pasien.alamat_pjwb_finansial);
					$('#telp-pjwb-keuangan-detail').html(pasien.telp_pjwb_finansial);

					if (calculateAge(pasien.tanggal_lahir) > 0) {
						$('#bayi-sehat-area').hide();
					} else {
						$('#bayi-sehat-area').show();
					}
				}

				if (data.profil !== null) {
					$('#berat-badan').val(data.profil.berat_badan);
					$('#tinggi-badan').val(data.profil.tinggi_badan);
				};

				// Layanan Pendaftaran
				$('#layanan-detail').html(layanan.bangsal + ' Kelas ' + layanan.kelas + ' Ruang ' + layanan
					.no_ruang + ' No. Bed ' + layanan.no_bed);

				let waktuKeluar = 'Sekarang';
				let waktuMasuk = datetimefmysql(layanan.waktu_konfirmasi_ranap);
				$('#waktu-keluar').removeAttr('disabled');
				if (layanan.waktu_keluar !== null) {
					waktuKeluar = datetimefmysql(layanan.waktu_keluar);
					$('#waktu-keluar').val(waktuKeluar);
				} else {
					$('#waktu-keluar').val('');
					$('#waktu-keluar').attr('disabled', 'disabled');
				}

				$('#waktu-masuk').val(waktuMasuk);
				$('#waktu-rawat-detail').html(waktuMasuk + ' - ' + waktuKeluar);

				$('#dokter-detail').html(layanan.dokter);
				$('#dokter-hemodialisis').val(layanan.id_dokter);
				$('#id-penjamin-tindakan').val(layanan.id_penjamin);
				$('#id-penjamin-hemodialisis').val(layanan.id_penjamin);

				let cara_bayar = '<b>' + layanan.cara_bayar + ' ' + ((layanan.id_penjamin !== null) ? '(' +
					layanan.penjamin + ')' : '') + '</b>';
				$('#cara-bayar-detail').html(cara_bayar);
				$('#cara-bayar-hemodialisis').val(layanan.cara_bayar);
				$('#no-polish-hemodialisis').val(layanan.no_polish);
				$('#no-sep-hemodialisis').val(layanan.no_sep);
				$('#no-polish-detail').html(layanan.no_polish);
				$('#no-sep-detail').html(layanan.no_sep);
				if (data.penjamin_pasien) {
					$('#kelas-rawat-pasien').html(data.penjamin_pasien.hak_kelas || '');
				}

				$('#identitas-pasien-anamnesa, #identitas-pasien-soap, #identitas-pasien-diagnosa, #identitas-pasien-tindakan, #identitas-pasien-bhp, #identitas-pasien-darah, #identitas-pasien-pkrt')
					.html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

				if (layanan.dokter === '' && layanan.id_dokter === null) {
					$('#dokter').val(layanan.id_dokter_dpjp);
					$('#s2id_dokter a .select2c-chosen').html(layanan.dokter_dpjp);
					$('#operator').val(layanan.id_dokter_dpjp);
					$('#s2id_operator a .select2c-chosen').html(layanan.dokter_dpjp);
					$('#dokter-diagnosa').val(layanan.id_dokter_dpjp);
					$('#s2id_dokter-diagnosa a .select2c-chosen').html(layanan.dokter_dpjp);
				} else {
					$('#dokter').val(layanan.id_dokter);
					$('#s2id_dokter a .select2c-chosen').html(layanan.dokter);
					$('#operator').val(layanan.id_dokter);
					$('#s2id_operator a .select2c-chosen').html(layanan.dokter);
					$('#dokter-diagnosa').val(layanan.id_dokter);
					$('#s2id_dokter-diagnosa a .select2c-chosen').html(layanan.dokter);
				}

				// anamnesa
				$('#table-visitasi tbody').empty();
				if (typeof anamnesa !== 'undefined' && typeof anamnesa !== null) {
					showAnamnesa(anamnesa);
					$('.visitasi-input').val('');
					showVisitasi(data.anamnesa);	
				}

				if (data.soap.length > 0) {
					showSOAP(data.soap);
				} else {
					$('#table-soap tbody').empty();
				}

				// diagnosa
				$('#prioritas').val('Utama');
				if (data.diagnosa.length > 0) {
					showDiagnosa(data.diagnosa);
				} else {
					$('#table-diagnosa tbody').empty();
				}

				// diagnosa ruang lain
				if (data.diagnosa_ruang_lain.length > 0) {
					$('#diagnosa-ruang-lain').show();
					showDiagnosaRuangLain(data.diagnosa_ruang_lain);
				} else {
					$('#diagnosa-ruang-lain').hide();
					$('#table-diagnosa-ruang-lain tbody').empty();
				}

				// tindakan
				$('#kelas-tindakan').val('<?= $kelas_tindakan ?>');
				// $('#profesi').val(8);
				$('#profesi').val(layanan.id_profesi).change();
				$('#jumlah-tindakan').val(1);
				$('#unit').val(layanan.id_unit);
				$('#s2id_unit a .select2c-chosen').html(layanan.unit);

				if (data.tindakan.length > 0) {
					showTindakan(data.tindakan);
				} else {
					$('#table-tindakan tbody').empty();
				}

				// BHP
				if (data.bhp.length > 0) {
					showBHP(data.bhp);
				} else {
					$('#bhp-label').html('');
					$('#table-bhp tbody').empty();
				}

				// Order Darah
				if (data.darah.length > 0) {
					showDarah(data.darah);
				} else {
					$('#darah-label').html('');
					$('#table-darah tbody').empty();
				}

				// PKRT
				if (data.pkrt.length > 0) {
					showPKRT(data.pkrt);
				} else {
					$('#pkrt-label').html('');
					$('#table-pkrt tbody').empty();
				}

				const isAdmin = '<?= $this->session->userdata("account_group") ?>' === 'Admin';

				$('#btn-edit-bed').empty().append( /*html*/ `
					<button type="button" class="btn btn-secondary btn-xs"
							title="Tombol edit bed digunakan bila petugas salah memilih bed saat konfirmasi order rawat inap pasien" 
							onclick="formEditBed(${isAdmin ? null : layanan.id_bangsal})"
					><i class="fas fa-edit mr-1"></i>Edit Bed
					</button>
				`);

				$('#modal-pemeriksaan').modal('show');
				$('#modal-pemeriksaan-label').html('Form Pemeriksaan Rawat Inap');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {

			}
		});
	}

	function KonfirmDetailPemeriksaan(ini, id_pendaftaran, id_layanan, visit_anestesi, bed) {
		user = '<?= $_SESSION['account_group'] ?>';
		if (visit_anestesi === 0 & user === 'Dokter Anestesi') {
			$('#id_layanan_pendaftaran_visit').val(id_layanan);
			$('#id_dokter_visit').val('<?= $this->session->userdata("id_translucent") ?>');
			$('#ini').val(ini);
			$('#visit_id_pendaftaran').val(id_pendaftaran);
			$('#visit_id_layanan').val(id_layanan);
			$('#visit_bed').val(bed);

			$('#konfirmasi-visit-anestesi').modal('show');

		} else {
			detailPemeriksaan(ini, id_pendaftaran, id_layanan, bed);
		}
	}

	function showAnamnesa(anamnesa) {
		if (anamnesa !== null && anamnesa !== 'undefined') {
			$('#keluhan-utama').val(anamnesa.keluhan_utama);
			$('#riwayat-penyakit-keluarga').val(anamnesa.riwayat_penyakit_keluarga);
			$('#riwayat-penyakit-sekarang').val(anamnesa.riwayat_penyakit_sekarang);
			$('#riwayat-penyakit-dahulu').val(anamnesa.riwayat_penyakit_dahulu);
			$('#anamnesa-sosial').val(anamnesa.anamnesa_sosial);

			$('#keadaan-umum').val(anamnesa.keadaan_umum);
			$('#kesadaran').val(anamnesa.kesadaran);
			$('#gcs').val(anamnesa.gcs);
			$('#tensi-sistolik').val(anamnesa.tensi_sistolik);
			$('#tensi-diastolik').val(anamnesa.tensi_diastolik);
			$('#suhu').val(anamnesa.suhu);
			$('#nadi').val(anamnesa.nadi);
			$('#tinggi-badan').val(anamnesa.tinggi_badan);
			$('#berat-badan').val(anamnesa.berat_badan);
			$('#rr').val(anamnesa.rr);
			$('#nps').val(anamnesa.nps);

			$('#kepala').val(anamnesa.kepala);
			$('#leher').val(anamnesa.leher);
			$('#thorax').val(anamnesa.thorax);
			$('#pulmo').val(anamnesa.pulmo);
			$('#cor').val(anamnesa.cor);
			$('#abdomen').val(anamnesa.abdomen);
			$('#genitalia').val(anamnesa.genitalia);
			$('#ekstrimitas').val(anamnesa.ekstrimitas);
			$('#pemeriksaan-penunjang').val(anamnesa.pemeriksaan_penunjang);
			$('#prognosis').val(anamnesa.prognosis);
			$('#status-mentalis').val(anamnesa.status_mentalis);
			$('#lingkar-kepala').val(anamnesa.lingkar_kepala);
			$('#status-gizi').val(anamnesa.status_gizi).change();
			$('#telinga').val(anamnesa.telinga);
			$('#hidung').val(anamnesa.hidung);
			$('#tenggorok').val(anamnesa.tenggorok);
			$('#mata').val(anamnesa.mata);
			$('#kulit-kelamin').val(anamnesa.kulit_kelamin);
			$('#usul-tindak-lanjut').val(anamnesa.usul_tindak_lanjut);

			if (anamnesa.pupil_dbn === 'on') {
				$('#pupil-other').attr('checked', true).change();
				$('#pupil-bentuk').val(anamnesa.pupil_bentuk);
				$('#pupil-ukuran').val(anamnesa.pupil_ukuran);
				$('#pupil-reflek-cahaya').val(anamnesa.pupil_reflek_cahaya);
			} else {
				$('#pupil-dbn').change();
				$('#pupil-other').attr('checked', false);
				$('#pupil-bentuk').val('');
				$('#pupil-ukuran').val('');
				$('#pupil-reflek-cahaya').val('');
			}

			if (anamnesa.nervi_cranialis_dbn === 'on') {
				$('#nervi-cranialis-other').attr('checked', true).change();
				$('#nervi-cranialis-paresis').val(anamnesa.nervi_cranialis_paresis);
			} else {
				$('#nervi-cranialis-dbn').change();
				$('#nervi-cranialis-other').attr('checked', false);
				$('#nervi-cranialis-paresis').val('');
			}

			$('#rf-kiri-atas').val(anamnesa.rf_kiri_atas);
			$('#rf-kiri-bawah').val(anamnesa.rf_kiri_bawah);
			$('#rf-kanan-atas').val(anamnesa.rf_kanan_atas);
			$('#rf-kanan-bawah').val(anamnesa.rf_kanan_bawah);

			if (anamnesa.sensorik_dbn === 'on') {
				$('#sensorik-other').attr('checked', true).change();
				$('#sensorik-lain').val(anamnesa.sensorik_lain);
			} else {
				$('#sensorik-dbn').change();
				$('#sensorik-other').attr('checked', false);
				$('#sensorik-lain').val('');
			}

			$('#pemeriksaan-khusus').val(anamnesa.pemeriksaan_khusus);

			if (anamnesa.trm_dbn === 'on') {
				if (anamnesa.trm_kaku_kuduk !== null) {
					$('#trm-other-one').attr('checked', true).change();
					$('#trm-kaku-kuduk').val(anamnesa.trm_kaku_kuduk);
				} else if (anamnesa.trm_laseque !== null) {
					$('#trm-other-two').attr('checked', true).change();
					$('#trm-laseque').val(anamnesa.trm_laseque);
				} else if (anamnesa.trm_kerning !== null) {
					$('#trm-other-three').attr('checked', true).change();
					$('#trm-kerning').val(anamnesa.trm_kerning);
				}
			} else {
				$('#trm-dbn').change();
				$('#trm-kaku-kuduk, #trm-laseque, #trm-kerning').val('');
			}

			$('#motorik-kiri-atas').val(anamnesa.motorik_kiri_atas);
			$('#motorik-kiri-bawah').val(anamnesa.motorik_kiri_bawah);
			$('#motorik-kanan-atas').val(anamnesa.motorik_kanan_atas);
			$('#motorik-kanan-bawah').val(anamnesa.motorik_kanan_bawah);
			$('#reflek-patologis').val(anamnesa.reflek_patologis);
			$('#otonom').val(anamnesa.otonom);
			$('#riwayat-kelahiran').val(anamnesa.riwayat_kelahiran);
			$('#riwayat-imunisasi').val(anamnesa.riwayat_imunisasi);
			$('#riwayat-nutrisi').val(anamnesa.riwayat_nutrisi);
			$('#riwayat-tumbuh-kembang').val(anamnesa.riwayat_tumbuh_kembang);
			$('#s_soap').val(anamnesa.s_soap);
			$('#o_soap').val(anamnesa.o_soap);
			$('#a_soap').val(anamnesa.a_soap);
			$('#p_soap').val(anamnesa.p_soap);
			$('#s_sbar').val(anamnesa.s_sbar);
			$('#b_sbar').val(anamnesa.b_sbar);
			$('#a_sbar').val(anamnesa.a_sbar);
			$('#r_sbar').val(anamnesa.r_sbar);
			$('#usul_tindak_lanjut').val(anamnesa.usul_tindak_lanjut);
		}

	}

	function konfirmasiSimpanPemeriksaan() {
		let subspesialis = $('#subspesialis').val();
		let dokter = $('#dokter').val();

		if (subspesialis === '') {
			syams_validation('#subspesialis', 'Kolom subspesialis harus diisi.')
			$('#wizard-form').bwizard('show', '0');
			return false;
		}

		if (dokter === '') {
			syams_validation('#dokter', 'Kolom dokter harus diisi.')
			$('#wizard-form').bwizard('show', '1');
			return false;
		}

		if ($('.number-diag').length < 1) {
			swalAlert('warning', 'Validasi', 'Diagnosa pasien harus diisi.')
			$('#wizard-form').bwizard('show', '3');
			return false;
		}

		swal.fire({
			title: 'Simpan Pemeriksaan',
			text: "Apakah anda yakin akan melakukan entri pemeriksaan Rawat Inap ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanDataPemeriksaan();
			}
		})
	}

	function simpanDataPemeriksaan() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("pelayanan/api/pelayanan/simpan_pemeriksaan") ?>',
			data: $('#form-pemeriksaan').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status) {
					messageEditSuccess();
					$('#modal-pemeriksaan').modal('hide');
					getListPemeriksaan(1);
				} else {
					messageEditFailed();
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageEditFailed();
			}
		});
	}

	// function formEditBed() {
	// 	$('#title-form-bed').text('Edit Bed');
	// 	$('.no-rm-ranap-label').text($('#no-rm-detail').html());
	// 	$('.nama-ranap-label').text($('#nama-detail').html());
	// 	$('.kelamin-ranap-label').text($('#kelamin-detail').html());
	// 	$('.layanan-ranap-label').text($('#layanan-detail'));

	// 	getListBangsal()

	// 	$('#modal-bed-ranap').modal('show');
	// 	tipeBed = 'edit';
	// 	$('#bed-status-area').empty();

	// }
	function formEditBed(id_bangsal) {
		$('#title-form-bed').text('Edit Bed');
		$('.no-rm-ranap-label').text($('#no-rm-detail').html());
		$('.nama-ranap-label').text($('#nama-detail').html());
		$('.kelamin-ranap-label').text($('#kelamin-detail').html());
		$('.layanan-ranap-label').text($('#layanan-detail'));

		getListBangsal(id_bangsal)

		$('#modal-bed-ranap').modal('show');
		tipeBed = 'edit';
		$('#bed-status-area').empty();

	}

	function setBedEdit(id_bed, bed) {
		bootbox.dialog({
			title: 'Edit Bed Pasien',
			message: 'Apakah anda yakin ingin memindahkan pasien ke ' + bed + ' ?',
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
					className: 'btn-secondary',
					callback: function() {

					}
				},
				send: {
					label: '<i class="fas fa-fw fa-paper-plane mr-1"></i>Pindahkan',
					className: 'btn-info',
					callback: function() {
						updateBedPasien($('#id-layanan').val(), id_bed);
					}
				}
			}
		})
	}

	function updateBedPasien(id_layanan_pendaftaran, id_bed) {
		let gender = $('.kelamin-ranap-label').text();
		let kelamin = 'L';
		if (gender === 'Perempuan') {
			kelamin = 'P';
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_rawat_inap/api/order_rawat_inap/update_bed_pasien") ?>',
			data: 'id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&id_bed=' + id_bed,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-pemeriksaan').modal('hide');
				$('#modal-bed-ranap').modal('hide');
				let status = 'Error';
				if (data.status === true) {
					status = 'Success';
					$('#bed-status-area').empty();
				}

				messageCustom(data.message, status);
				getListPemeriksaan($('#page_now').val());
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Gagal memindahkan pasien', 'Error');
			},
		});
	}

	function dischargeBed(id_rawat_inap) {
		swal.fire({
			title: 'Discharge Bed',
			html: "Apakah anda yakin ingin<br>mengosongkan status bed ?",
			icon: 'warning',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Kosongkan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'GET',
					url: '<?= base_url("rawat_inap/api/rawat_inap/reset_status_bed") ?>/id_rawat_inap/' +
						id_rawat_inap,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom('Berhasil mengkosongkan status bed', 'Success');
						} else {
							messageCustom(
								'Gagal mengkosongkan status bed, selesaikan dulu administrasi RS',
								'Error');
						}

						getListPemeriksaan($('#page_now').val());
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal mengkosongkan status bed', 'Error');
					},
				});
			}
		});
	}

	function addSOAP() {
		let waktu = get_date_app();
		let html = '';
		let numb = $('.number-soap').length;
		let subject = $('#s-soap').val();
		let objective = $('#o-soap').val();
		let assessment = $('#a-soap').val();
		let plan = $('#p-soap').val();

		let stop = false;
		if (subject === '') {
			syams_validation('#s-soap', 'Subject harus diisi.');
			stop = true;
		}

		if (objective === '') {
			syams_validation('#o-soap', 'Objective harus diisi.');
			stop = true;
		}

		if (assessment === '') {
			syams_validation('#a-soap', 'Assessment harus diisi.');
			stop = true;
		}

		if (plan === '') {
			syams_validation('#p-soap', 'Plan harus diisi.');
			stop = true;
		}

		if (stop) {
			return false;
		}

		html = /* html */ `
			<tr>
				<td width="5%" class="number-soap center">${(++numb)}</td>
				<td width="10%">${waktu}</td>
				<td width="15%" class="center"></td>
				<td width="15%" class="center"><input type="hidden" name="s_soap[]" value="${subject}">${subject}</td>
				<td width="15%" class="center"><input type="hidden" name="o_soap[]" value="${objective}">${objective}</td>
				<td width="15%" class="center"><input type="hidden" name="a_soap[]" value="${assessment}">${assessment}</td>
				<td width="15%" class="center"><input type="hidden" name="p_soap[]" value="${plan}">${plan}</td>
				<td width="5%" class="right">
					<button type="button" class="btn btn-secondary btn-xs" onclick="removeMe(this)"><i class="fas fa-fw fa-trash-alt"></i></button>
				</td>
			</tr>
		`;

		$('#table-soap tbody').append(html);
		$('.soap-input').val('');
	}

	function formTataTertibRawatInap() {
		$('#modal-tata-tertib-ranap').modal('show');
	}

	function printTataTertibRawatInap() {
		let id_layanan_pendaftaran = $('#id-layanan').val();
		let id_pendaftaran = $('#id-pendaftaran-pasien').val();
		let nama_penjamin = $('#nama-penjamin').val();
		let no_identitas_penjamin = $('#no-identitas-penjamin').val();
		let alamat_penjamin = $('#alamat-penjamin').val();
		let telp_penjamin = $('#telp-penjamin').val();

		window.open('<?php echo base_url() ?>rawat_inap/printing_tata_tertib_rawat_inap/' + id_pendaftaran + '/' +
			id_layanan_pendaftaran + '?nama_penjamin=' + nama_penjamin + '&no_identitas_penjamin=' +
			no_identitas_penjamin + '&alamat_penjamin=' + alamat_penjamin + '&telp_penjamin=' + telp_penjamin,
			'Cetak Form Tata Tertib Rawat Inap', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y
		);
	}

	if (typeof idPendaftaran === 'undefined' && typeof idLayananPendaftaran === 'undefined') {
		var idPendaftaran, idLayananPendaftaran;
	}

	function cetakFormKeperawatan(details, id_pendaftaran, id_layanan_pendaftaran, bed) {
		idPendaftaran = id_pendaftaran;
		idLayananPendaftaran = id_layanan_pendaftaran;
		$('#modal_cetak_form_keperawatan').modal('show');
		$('#modal_cetak_form_keperawatan_label').html('Cetak Form Keperawatan');


		// PSPMP
		// $('#btn_surat_pengkajian_pasien_muslim').click(function() {
		// 	cetakPengkajianPasienMuslim(id_pendaftaran);
		// });

		$('#btn_inidkasi_pasien_masuk_icu').click(function() {
			cetakIndikasiPasienMasukICU(id_pendaftaran, id_layanan_pendaftaran);
		});

		// Migrasi eRM
		// $('#btn_asesment_pra_bedah').click(function() {
		//	cetakAsesmentPraBedah(id, id_layanan_pendaftaran);
		// });

		$('#btn_informasi_pasien').click(function() {
			cetakPemberianInformasiKepadaPasien(id_pendaftaran, id_layanan_pendaftaran);
		});

		$('#btn_surat_keterangan_kematian').click(function() {
			cetakSuratKeteranganKematian(id_layanan_pendaftaran);
		});

		//$('#btn-surat-persetujuan-rawat-inap').click(function() {
		//	cetakSuratPersetujuanRawatInap(id_layanan_pendaftaran);
		//});

		// SURAT KENAL LAHIR
		$('#btn-surat-kenal-lahir').click(function() {
			cetakSuratKenalLahir(id_pendaftaran, id_layanan_pendaftaran);
		});

		// CPPRI WH
		//$('#btn_checklist_penerimaan_pasien_rawat_inap').click(function() {
		//	cetakChecklistPenerimaanPasienRawatInap(details);
		//});

		// SPPRAPS WH
		$('#btn_surat_peryataan_pulang_rawat_atas_permintaan_sendiri').click(function() {
			cetakSuratPeryataanPulangRawatAtasPermintaanSendiri(details);
			// console.log(details);			
		});
	}

	// $('#btn-resume-medis').on('click', function() {
	// 	cetakResumeMedis(idPendaftaran, idLayananPendaftaran);
	// });

	$('#modal-resume-medis').on('hidden.bs.modal', function() {
		$('#modal_cetak_form_keperawatan').modal('hide');
	});


	function cetakIndikasiPasienMasukICU(id, id_layanan_pendaftaran) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rawat_inap/api/rawat_inap/indikasi_pasien_masuk_icu') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				resetModalIndikasiPasienMasukICU();


				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-indikasi-pasien-masuk-icu-title').html(
					`<b>Form Indikasi Pasien Masuk ICU</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
				);

				$('#id-pendaftaran-indikasi-pasien-masuk-icu').val(id);

				if (!data.indikasi_pasien_masuk_icu) {
					$('#diagnosa-pasien-indikasi-icu').val(data.indikasi_pasien_masuk_icu[0].diagnosa_pasien);
				}

				$('#modal_indikasi_pasien_masuk_icu').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}


	function resetModalIndikasiPasienMasukICU() {
		// Set default fields
		$('#id-pendaftaran-spiritual').val('');
		$('#diagnosa-pasien-indikasi-icu').val('');

	}

	function cetakPemberianInformasiKepadaPasien(id, id_layanan_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rawat_inap/api/rawat_inap/pemberian_informasi_pasien') ?>/id/' + id +
				'/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				// resetPemberianInformasiKepadaPasien();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#id-layanan-pendaftaran-informasi').val(id_layanan_pendaftaran);
				$('#modal-pemberian-informasi-pasien-title').html(
					`<b>Form Pemberian Informasi Pasien & Keluarga</b> | No. RM: ${data.pendaftaran_detail.pasien.no_register}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
				);
				$('#unit-kerja-pemberian-informasi').val(data.pendaftaran_detail.layanan.bangsal + ' kelas ' +
					data.pendaftaran_detail.layanan.kelas + ' ruang ' + data.pendaftaran_detail.layanan
					.no_ruang + ' No.  Bed ' + data.pendaftaran_detail.layanan.no_bed);
				$('#nama-keluarga-informasi').val(data.pemberian_informasi_pasien.keluarga);
				$('#hubungan-keluarga-informasi').val(data.pemberian_informasi_pasien.hubungan_keluarga);
				$('#tanggal-waktu-pemberian-informasi').val(datetimefmysql(data.pemberian_informasi_pasien
					.tanggal_waktu));
				$('#materi-edukasi-pemberian-informasi').val(data.pemberian_informasi_pasien.materi_edukasi);
				$('#daftar-pertanyaan-pemberian-informasi').val(data.pemberian_informasi_pasien
					.daftar_pertanyaan);
				$('#id-dokter-informasi').val(data.id_dokter);
				$('#s2id_dokter-informasi a .select2c-chosen').html(data.pemberian_informasi_pasien
					.nama_dokter);

				$('#modal_pemberian_informasi_pasien').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function cetakResumeMedis(id, id_layanan_pendaftaran) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rawat_inap/api/rawat_inap/resume_medis') ?>/id/' + id + '/id_layanan_pendaftaran/' +
				id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				$('#table-kontrol-resume tbody').empty();
				$('#table-terapi-rm tbody').empty();

				// Set values in Resume Medis Modal
				$('#modal-resume-medis-title').html(
					`<b>Form Resume Medis</b> | No. RM: ${data.pendaftaran_detail.pasien.no_rm}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
				);
				$('#id-layanan-pendaftaran-resume').val(id_layanan_pendaftaran);

				$('#rm_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
				$('#rm-id-pendaftaran').val(id);

				if (data.pendaftaran_detail.pasien !== null) {
					$('#resume_id_pasien').val(data.pendaftaran_detail.pasien.id_pasien);
					$('#resume_pasien_nama').text(data.pendaftaran_detail.pasien.nama);
					$('#resume_pasien_no_rm').text(data.pendaftaran_detail.pasien.no_rm);
					$('#resume_pasien_tanggal_lahir').text((data.pendaftaran_detail.pasien.tanggal_lahir !==
						null ? datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir) : '-') + (' (' +
						hitungUmur(data.pendaftaran_detail.pasien.tanggal_lahir) + ')'));
					$('#resume_pasien_jenis_kelamin').text((data.pendaftaran_detail.pasien.kelamin === 'L' ?
						'Laki - laki' : 'Perempuan'));
				}

				$('#resume_bed').text(data.resume_medis.ruangan + ' Kelas ' + data.resume_medis.kelas +
					' Ruang ' + data.resume_medis.no_ruang + ' No.Bed ' + data.resume_medis.no_bed);
				$('#tanggal-masuk-rm').val(datetimefmysql(data.resume_medis.tgl_masuk));
				$('#tanggal-keluar-rm').val(datetimefmysql(data.resume_medis.tgl_keluar));
				$('#tanggal-keluar-rm').val(datetimefmysql(data.resume_medis.tgl_keluar));
				$('#ruang-rawat-terakhir-rm').val(data.resume_medis.ruangan);
				$('#pemeriksaan-fisik').val((data.resume_medis.pemeriksaan_fisik === null ? "" : data
					.resume_medis.pemeriksaan_fisik));
				$('#penunjang-diagnostik').val((data.resume_medis.penunjang_diagnostik === null ? "" : data
					.resume_medis.penunjang_diagnostik));
				$('#ringkasan-riwayat').val((data.resume_medis.ringkasan_riwayat === null ? "" : data
					.resume_medis.ringkasan_riwayat));
				$('#tanggung-jawab-pembayaran-rm').val(data.resume_medis.penjamin);
				$('#diagnosis-waktu-masuk-rm').html(data.diagnosa_awal === "" || data.diagnosa_awal === null ? data.diag_manual : data.diagnosa_awal);
				$('#hasil-konsultasi-rm').val(data.resume_medis.hasil_konsultasi);
				$('#alergi-rm').val(data.resume_medis.alergi_obat);
				$('#hasil-laboratoraium-rm').val(data.resume_medis.pending_lab);
				$('#diet-rm').val(data.resume_medis.diet);
				$('#instruksi-rm').val(data.resume_medis.anjuran_edukasi);

				$('#ringkasan-riwayat-penyakit-rm').html(`${(data.resume_medis.keluhan_utama == null ? "" : "Keluhan Utama: " + data.resume_medis.keluhan_utama + `<br>`)}
                ${(data.resume_medis.subject == null ? "" : data.resume_medis.subject)}`);
				$('#pemeriksaan-fisik-rm').html(`
                    ${(data.resume_medis.sistolik == null ? "" : "Tensi Sistolik: " + data.resume_medis.sistolik + " mmHg. ")}
                    ${(data.resume_medis.suhu == null ? "" : "Suhu: " + data.resume_medis.suhu + "℃. ")}
                    ${(data.resume_medis.rr == null ? "" : "Respirasi: " + data.resume_medis.rr + "/Mnt. ")}
                    ${(data.resume_medis.tinggi_badan_ranap == null ? "" : "TB: " + data.resume_medis.tinggi_badan_ranap + " cm. " + `<br>`)}
                    ${(data.resume_medis.diastolik == null ? "" : "Tensi DIastolik: " + data.resume_medis.diastolik + " mmHg. ")}
                    ${(data.resume_medis.nadi == null ? "" : "Nadi: " + data.resume_medis.nadi + "/Mnt. ")}
                    ${(data.resume_medis.nps == null ? "" : "Nafas: " + data.resume_medis.nps + "/Mnt. ")}
                    ${(data.resume_medis.berat_badan_ranap == null ? "" : "BB: " + data.resume_medis.berat_badan_ranap + " Kg. " + `<br>`)}
                    ${(data.resume_medis.objective == null ? "" : data.resume_medis.objective + `<br>`)}
                    ${(data.resume_medis.assessment == null ? "" : data.resume_medis.assessment + `<br>`)}
                    ${(data.resume_medis.plan == null ? "" : data.resume_medis.plan)}`);
				$('#pemeriksaan-penunjang-rm').html(

				);

				const diagUtamaRm = [...data.diagnosa_utama, ...data.ds_manual_utama].sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran)[0]?.nama;

				$('#diagnosis-utama-rm').html(diagUtamaRm);
				$('#diagnosis-sekunder-rm').html(
					data?.diagnosa_sekunder?.map(diag => `${diag.nama}<br>`)?.join('') +
					(data.ds_manual_sekunder == null ? "" : data?.ds_manual_sekunder?.map(diag =>
						`${diag.nama}<br>`)?.join(''))
				);

				if (data.cek_obat !== undefined) {

					if (data.cek_obat.length > 0) {

						let cekDataObat = data.cek_obat;

						let arrDatObat = new Array();

						let uniqueObat = '';

						$.each(cekDataObat, function(i, j) {

							// namaObat = j.nama_lengkap;

							// freeSpasiObat = namaObat.replace(/\s+/g, " ");

							// if(j.aturan_pakai !== '' && (j.aturan_pakai_manual === null || j.aturan_pakai_manual === '0')){
							// 	freeSpasiObat += ' (' + j.aturan_pakai + ')';
							// }

							// if(j.aturan_pakai_manual !== null || j.aturan_pakai_manual !== '0'){
							// 	freeSpasiObat += ' (' + j.aturan_pakai + ')';
							// }

							arrDatObat.push(j.nama);

						})

						const newObjObat = new Object();

						newObjObat.arrObat = new Array();

						$.each(arrDatObat, function(k, l) {

							newObjObat.arrObat.push(l);

						})

						const obatData = newObjObat.arrObat.filter((arrObat, indexObat) => {
							const _thingObat = JSON.stringify(arrObat);
							return indexObat === newObjObat.arrObat.findIndex(objObat => {
								return JSON.stringify(objObat) === _thingObat;
							});
						});

						uniqueObat = obatData;

						$('#terapi-pengobatan').html(
							`<b>` + uniqueObat?.map(obat => `${obat}, `)?.join('') + `</b>`
						);

					}

				}

				if (data.tindakan !== undefined) {

					if (data.tindakan.length > 0) {

						let daTin = data.tindakan;

						let arrDat = new Array();

						let arrDatOK = new Array();

						let namaKecil = '';

						let namaTindakan = '';

						let freeSpasi = '';

						let freeSpasiOK = '';

						let dataOK = '';

						let namaOK = '';

						let namaKecilOK = '';

						let uniqueOK = '';

						if (data.tindakan_ok.length > 0) {

							dataOK = data.tindakan_ok;

							$.each(dataOK, function(e, f) {

								namaOK = f.nama;

								namaKecilOK = namaOK.toLowerCase();

								freeSpasiOK = namaKecilOK.replace(/\s+/g, " ");

								arrDatOK.push(freeSpasiOK);

							})

							const newObjOK = new Object();

							newObjOK.arrOK = new Array();

							$.each(arrDatOK, function(g, h) {

								newObjOK.arrOK.push(h);

							})

							const okData = newObjOK.arrOK.filter((arrOK, indexOK) => {
								const _thingOK = JSON.stringify(arrOK);
								return indexOK === newObjOK.arrOK.findIndex(objOK => {
									return JSON.stringify(objOK) === _thingOK;
								});
							});

							uniqueOK = okData;

						}

						$.each(daTin, function(a, b) {

							namaTindakan = b.nama;

							namaKecil = namaTindakan.toLowerCase();

							freeSpasi = namaKecil.replace(/\s+/g, " ");

							arrDat.push(freeSpasi);

						})

						const newObj = new Object();

						newObj.arr = new Array();

						$.each(arrDat, function(c, d) {

							newObj.arr.push(d);

						})

						const uniqueArray = newObj.arr.filter((arr, index) => {
							const _thing = JSON.stringify(arr);
							return index === newObj.arr.findIndex(obj => {
								return JSON.stringify(obj) === _thing;
							});
						});

						let cekUnik = '';

						if (uniqueOK === '') {

							cekUnik = '';

						} else {

							cekUnik = `<b>` + uniqueOK?.map(ok => `${ok}<br>`)?.join('') + `</b>`;

						}


						$('#tindakan-rm').html(
							cekUnik +
							uniqueArray?.map(value => `<b>${value}</b><br>`)?.join('')
						);

					}

				}

				$('#kondisi-keluar-rm').html((data.resume_medis.cara_keluar == null ? `-` : `<b>` + data
					.resume_medis.cara_keluar + `</b>`));

				if (data.resume_medis.cara_keluar == 'Pemulasaran Jenazah') {
					document.getElementById("poliklinik-rm").disabled = true;
					document.getElementById("rs-lain-rm").disabled = true;
					document.getElementById("puskesmas-rm").disabled = true;
					document.getElementById("dokter-luar-rm").disabled = true;
				} else {
					document.getElementById("poliklinik-rm").disabled = false;
					document.getElementById("rs-lain-rm").disabled = false;
					document.getElementById("puskesmas-rm").disabled = false;
					document.getElementById("dokter-luar-rm").disabled = false;
				}

				if (data.resume_medis.pengobatan_dilanjutkan == null) {
					document.getElementById("poliklinik-rm").checked = false;
					document.getElementById("rs-lain-rm").checked = false;
					document.getElementById("puskesmas-rm").checked = false;
					document.getElementById("dokter-luar-rm").checked = false;
				} else if (data.resume_medis.pengobatan_dilanjutkan !== null) {
					if (data.resume_medis.pengobatan_dilanjutkan == 'Poliklinik') {
						document.getElementById("poliklinik-rm").checked = true;
					} else if (data.resume_medis.pengobatan_dilanjutkan == 'RS Lain') {
						document.getElementById("rs-lain-rm").checked = true;
					} else if (data.resume_medis.pengobatan_dilanjutkan == 'Puskesmas') {
						document.getElementById("puskesmas-rm").checked = true;
					} else if (data.resume_medis.pengobatan_dilanjutkan == 'Dokter Luar') {
						document.getElementById("dokter-luar-rm").checked = true;
					}
				}

				$('#resume-hasil-laboratorium').empty();
				$('#resume-hasil-radiologi').empty();
				$('#table-resume-lab tbody').empty();

				let obj = '';
				let rlab = '';
				let rOption = '';
				let pesanLab = '';
				let nomorONO = '';

				obj = data.resume_lab;

				if (obj !== null) {

					statusLab = data.status_lab;

					if (statusLab === false) {

						let rlab = /* html */ `
                                <div class="row mt-3" id="item-lab">
                                    <div class="col-md-12">
                                        <div class="widget">
                                            <div class="widget-header">
                                            </div>
                                            <div class="widget-body">
                                                <table id="table-resume-lab" class="table table-hover table-striped table-sm color-table info-table">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">Jenis Pemeriksaan</th>
                                                            <th width="1%"></th>
                                                            <th width="10%" class="center">Nama</th>
                                                            <th width="19%" class="center">Hasil</th>
                                                            <th width="15%" class="center">Satuan</th>
                                                            <th width="15%" class="center">Nilai Rujukan</th>
                                                            <th width="10%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                            `;

						rlab += /* html */ `
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

						$('#resume-hasil-laboratorium').append(rlab);

						if (obj !== null) {

							let noS = 0;
							pesanLab = data.pesan_lab;

							rOption = ` <tr>
                                            <td><label id="ono-pesan">${obj[0][0].ono} ${pesanLab[0]}</label></td>
                                        </tr>
                                        `;

							$.each(obj, function(i, value) {

								if (obj[i][0].flag !== 'N') {

									if (i !== noS) {

										rOption += `<tr>
                                                        <td><label id="ono-pesan">${obj[i][0].ono} ${pesanLab[i]}</label></td>
                                                    </tr>
                                                    `;

									}

									rOption += /* html */ `
                                                        <tr>
                                                            <td class="v-center">${obj[i][0].test_group}</td>
                                                            <td class="v-center center">${obj[i][0].flag}</td>
                                                            <td class="v-center center">${obj[i][0].order_testnm}</td>
                                                            <td class="v-center center">${obj[i][0].result_value}</td>
                                                            <td class="v-center center">${obj[i][0].unit}</td>
                                                            <td class="v-center center">${obj[i][0].ref_range}</td>
                                                        </tr>
                                                    `;

									noS = i;

								}

							})

							$('#table-resume-lab tbody').append(rOption);

						}

					} else {

						function groupAndSort(array, groupField, sortField) {

							var groups = {};
							for (var i = 0; i < array.length; i++) {
								var row = array[i];
								var groupValue = row[groupField];
								groups[groupValue] = groups[groupValue] || [];
								groups[groupValue].push(row);
							}
							// Sort each group
							for (var groupValue in groups) {
								groups[groupValue] = groups[groupValue].sort(function(a, b) {
									// return a[sortField] - b[sortField];
									var firstCase = a[sortField].toLowerCase();
									var secondCase = b[sortField].toLowerCase();
									if (firstCase < secondCase) {
										return -1;
									} else if (firstCase > secondCase) {
										return 1;
									} else {
										return 0;
									}

								});
							}
							// Return the results
							return groups;

						}

						let rlab = /* html */ `
                            <div class="row mt-3" id="item-lab">
                                <div class="col-md-12">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <label id="ono-pesan"></label>
                                        </div>
                                        <div class="widget-body">
                                            <table id="table-resume-lab" class="table table-hover table-striped table-sm color-table info-table">
                                                <thead>
                                                    <tr>
                                                        <th width="30%">Jenis Pemeriksaan</th>
                                                        <th width="1%"></th>
                                                        <th width="29%" class="center">Hasil</th>
                                                        <th width="15%" class="center">Satuan</th>
                                                        <th width="15%" class="center">Nilai Rujukan</th>
                                                        <th width="10%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                        `;

						var statVal = [];
						var iVal = [];
						var arrFlag = [];

						statVal.push(obj);

						function urutan(maSuk) {

							iVal.push(maSuk);
							return iVal.sort(function(a, b) {
								var firstCase = a.ono.toLowerCase();
								var secondCase = b.ono.toLowerCase();
								if (firstCase < secondCase) {
									return -1;
								} else if (firstCase > secondCase) {
									return 1;
								} else {
									return 0;
								}

							});

						}

						$.each(statVal, function(a, value) {

							$.each(value, function(b, c) {

								urutan(c);

							})
						})

						var groupedTegr = groupAndSort(iVal, "ono", "ono");

						$.each(groupedTegr, function(i, value) {

							var groupedOtgroup = groupAndSort(value, "test_group", "test_group");

							keyGroup = Object.keys(groupedOtgroup);
							objectGroup = Object.values(groupedOtgroup);

							for (let n = 0; n < keyGroup.length; n++) {

								for (let o = 0; o < objectGroup[n].length; o++) {

									if (objectGroup[n][o].flag !== '') {

										if (objectGroup[n][o].flag !== 'N') {

											arrFlag.push(objectGroup[n][o]);

										}

									}

								}

							}

						})

						var elementTegr = groupAndSort(arrFlag, "ono", "ono");

						$.each(elementTegr, function(eT, eTval) {

							let dateR = eTval[0].release.date;
							let tahunR = dateR.substr(0, 4);
							let bulanR = dateR.substr(4, 2);
							let tanggalR = dateR.substr(6, 2);

							let dateRelease = tanggalR + '/' + bulanR + '/' + tahunR;

							rlab += /* html */ `
                                <tr>
                                    <td style="padding-left:40px;" class="v-center bold">${eT} (tanggal : ${dateRelease})</td>
                                    <td class="v-center bold"></td>
                                    <td class="v-center bold"></td>
                                    <td class="v-center bold"></td>
                                    <td class="v-center bold"></td>
                                    <td class="v-center bold"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            `;

							var etvalOtgroup = groupAndSort(eTval, "test_group", "test_group");

							$.each(etvalOtgroup, function(d, e) {

								rlab += /* html */ `
                                    <tr>
                                        <td style="padding-left:60px;" class="v-center bold">${d}</td>
                                        <td class="v-center bold"></td>
                                        <td class="v-center bold"></td>
                                        <td class="v-center bold"></td>
                                        <td class="v-center bold"></td>
                                        <td class="v-center bold"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                `;

								var groupedOtname = groupAndSort(e, "order_testnm",
									"order_testnm");

								$.each(groupedOtname, function(j, k) {

									rlab += /* html */ `
                                        <tr>
                                            <td style="padding-left:60px;" class="v-center bold">${j}</td>
                                            <td class="v-center bold"></td>
                                            <td class="v-center bold"></td>
                                            <td class="v-center bold"></td>
                                            <td class="v-center bold"></td>
                                            <td class="v-center bold"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    `;

									rlab += /* html */ `<tr>`;

									var status = [];

									status.push(k);

									$.each(status, function(l, m) {

										const sorter = (a, b) => {
											return parseFloat(a.disp_seq
													.replace(/[_]/g, "")) -
												parseFloat(b.disp_seq
													.replace(/[_]/g, ""));
										};
										const sortByAge = arr => {
											arr.sort(sorter);
										};

										sortByAge(m);

										$.each(m, function(y, z) {

											if (Array.isArray(z.nama) &&
												!z.nama.length) {

												rlab += /* html */ `

                                                    <td style="padding-left:80px;" class="v-center"></td>

                                                `;

											} else {

												$.each(z.nama, function(
													n, o) {

													if (o
														.nama ===
														'Hitung Jenis'
													) {
														rlab += /* html */ `

                                                                        <td style="padding-left:80px;" class="v-center bold" >${(o.nama !== null ? o.nama : '')}</td>

                                                                `;

													} else {

														rlab += /* html */ `

                                                                        <td style="padding-left:80px;" class="v-center" >${(o.nama !== null ? o.nama : '')}</td>

                                                                `;

													}
												})
											}

											let mFlag = '';
											let sResult = '';

											mFlag =
												`<td style="color:red;" class="v-center center">${z.flag}</td>`;

											if (z.unit === '' && z
												.ref_range === '') {

												if (z.result_value
													.length < 10) {

													sResult = /* html */ `
                                                        <td class="v-center center">${z.result_value}</td>
                                                        <td class="v-center center">${z.unit}</td>
                                                        <td class="v-center center">${z.ref_range}</td>`;

												} else {

													sResult = /* html */ `

                                                    <td class="v-center center" colspan="3">${z.result_value}</td> `;

												}

											} else {

												sResult = /* html */ `
                                                        <td class="v-center center">${z.result_value}</td>
                                                        <td class="v-center center">${z.unit}</td>
                                                        <td class="v-center center">${z.ref_range}</td>`;

											}

											rlab += /* html */ `
                                                        ${mFlag}
                                                        ${sResult}
                                                        <td class="v-center center">${(z.test_comment !== null ? z.test_comment : '')}</td>
                                                    </tr>
                                                    `;

										})

									})

								})

							})

						})

						rlab += /* html */ `
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;

						$('#resume-hasil-laboratorium').append(rlab);

					}

				}

				dataRadiologi = data.cek_radiologi;

				if (dataRadiologi !== undefined) {

					let hRad = /* html */ `
                        <div class="row mt-3" id="hasil-radiologi">
                            <div class="col-md-12">
                                <div class="widget">
                                    <div class="widget-header">
                                    </div>
                                    <div class="widget-body">
                                        <table class="table table-hover table-striped table-sm color-table info-table">
                                            <thead>
                                                <tr>
                                                    <th width="10%">No</th>
                                                    <th width="20%" class="center">Nama Layanan</th>
                                                    <th width="70%" class="center">Hasil Radiologi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                    `;

					$.each(dataRadiologi, function(ind, radVal) {

						hRad += /* html */ `
                            <tr>
                                <td class="center">${radVal.kode}</td>
                                <td class="center">${radVal.layanan}</td>
                                <td class="center">${radVal.hasil}</td>
                            </tr>
                        `;


					})

					hRad += /* html */ `
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

					$('#resume-hasil-radiologi').append(hRad);

				}

				$.each(data.kontrol_resume, function(i, v) {

					var myDays = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

					function dateTime(waktu) {
						var el = waktu.split(' ');
						var tgl = date2mysql(el[0]);
						return tgl;
					}

					function timeAja(waktu) {
						var el = waktu.split(' ');
						var tgl = date2mysql(el[0]);
						var tm = el[1].split(':');
						return tm[0] + ':' + tm[1];
					}

					function tanggalAja(waktu) {
						var el = waktu.split(' ');
						var tgl = el[0];
						var tm = el[1].split(':');
						return tgl;
					}

					function takeTanggal(waktu) {
						var el = waktu.split(' ');
						var tgl = el[0];
						var s_tgl = tgl.split('/');
						var tm = el[1].split(':');
						return s_tgl[2] + '-' + s_tgl[1] + '-' + s_tgl[0] + ' ' + tm[0] + ':' + tm[1] +
							':' + '00';
					}

					var cariHariKontrol = dateTime(v.tanggal_kontrol);
					var cari_jam_kontrol = timeAja(v.tanggal_kontrol);
					var hari_kontrol = new Date(cariHariKontrol);
					var ambil_hari_kontrol = hari_kontrol.getDay(),
						ambil_hari_kontrol = myDays[ambil_hari_kontrol];
					var ambil_tanggal_kontrol = tanggalAja(v.tanggal_kontrol);

					let html = /* html */ `
                        <tr>
                            <td class="number-kontrol" align="center">${i + 1}</td>
                            <td align="center">${ambil_tanggal_kontrol}</td>
                            <td align="center">${ambil_hari_kontrol}</td>
                            <td align="center">${cari_jam_kontrol}</td>
                            <td align="center">${v.dokter}</td>
                            <td align="center">${v.tempat_kontrol !== null ? v.tempat_kontrol : '-'}</td>
                            <td align="center"><input type="hidden" name="ek_operator[]" value="${v.id_users}">${v.akun_user}<input type="hidden" name="tanggal_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                            <td align="center">
                            <button type="button" class="btn btn-secondary btn-xs" onclick="hapusKontrolKembaliRM(this, ${v.id}, ${data.kontrol_resume_keperawatan[i]?.id})"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;
					$('#table-kontrol-resume tbody').append(html);
				})


				//Punya Mas Reza
				// $.each(data.terapi_resume, function(i, v) {

				//     html = /* html */ `
				//         <tr>
				//             <td class="number-terapi" align="center">${i+1}</td>
				//             <td align="left">${((v.barang_auto !== null) ? v.barang_auto : '')}</td>
				//             <td align="center">${((v.jumlah_obat !== null) ? v.jumlah_obat : '')}</td>
				//             <td align="center">${((v.dosis !== null) ? v.dosis : '')}</td>
				//             <td align="center">${((v.frekuensi !== null) ? v.frekuensi : '')}</td>
				//             <td align="center">${((v.cara_pemberian !== null) ? v.cara_pemberian : '')}</td>
				//             <td align="center">${((v.ek_jam_pemberian !== null) ? timerzmysql(v.ek_jam_pemberian) : '')}</td>
				//             <td align="center">${((v.ek_jam_pemberian_satu !== null) ? timerzmysql(v.ek_jam_pemberian_satu) : '')}</td>
				//             <td align="center">${((v.ek_jam_pemberian_dua !== null) ? timerzmysql(v.ek_jam_pemberian_dua) : '')}</td>
				//             <td align="center">${((v.ek_jam_pemberian_tiga !== null) ? timerzmysql(v.ek_jam_pemberian_tiga) : '')}</td>
				//             <td align="center">${((v.ek_jam_pemberian_empat !== null) ? timerzmysql(v.ek_jam_pemberian_empat) : '')}</td>
				//             <td align="center">${((v.ek_jam_pemberian_lima !== null) ? timerzmysql(v.ek_jam_pemberian_lima) : '')}</td>
				//             <td align="center">${((v.petunjuk_khusus !== null) ? v.petunjuk_khusus : '')}</td>
				//         </tr>

				//     `;
				//     $('#table-terapi-rm tbody').append(html);
				// });

				$.each(data.terapi_resume, function(i, v) {

					html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${i + 1}</td>
                            <td align="center">${v.obat_rm}</td>
                            <td align="center">${v.jumlah_obat}</td>
                            <td align="center">${v.dosis}</td>
                            <td align="center">${v.frekuensi}</td>
                            <td align="center">${v.cara_pemberian}</td>
                            <td align="center">${!v.ek_jam_pemberian ? '-' : v.ek_jam_pemberian}</td>
                            <td align="center">${!v.ek_jam_pemberian_satu ? '-' : v.ek_jam_pemberian_satu}</td>
                            <td align="center">${!v.ek_jam_pemberian_dua ? '-' : v.ek_jam_pemberian_dua}</td>
                            <td align="center">${!v.ek_jam_pemberian_tiga ? '-' : v.ek_jam_pemberian_tiga}</td>
                            <td align="center">${!v.ek_jam_pemberian_empat ? '-' : v.ek_jam_pemberian_empat}</td>
                            <td align="center">${!v.ek_jam_pemberian_lima ? '-' : v.ek_jam_pemberian_lima}</td>
                            <td align="center">${v.petunjuk_khusus}</td>
                            <td align="center"><input type="hidden" name="trp_users[]" value="${v.id_users}">${v.akun_user}<input type="hidden" name="tanggal_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                            <td align="center">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="hapusTerapiResume(this, ${v.id}, ${data.terapi_resume_keperawatan[i]?.id})"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>

                    `;
					$('#table-terapi-rm tbody').append(html);
				});

				if (data.resume_medis?.id_rmr) {
					$('#btn_xetak').show();
					$('#modal-resume-medis #btn_simpan').html('<i class="fas fa-pencil-alt mr-1"></i>Update');
				} else {
					$('#btn_xetak').hide();
					$('#modal-resume-medis #btn_simpan').html('<i class="fas fa-fw fa-save mr-1"></i>Simpan');
				}


				$('#modal-resume-medis').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	// SURAT KENAL LAHIR
	function cetakSuratKenalLahir(id, id_layanan_pendaftaran) {
		// $('#modal_surat_kenal_lahir').modal('show');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rawat_inap/api/rawat_inap/surat_kenal_lahir') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				// Set all values first
				resetModalSuratKenalLahir();

				// Set values in surat kenal lahir 
				$('#modal-surat-kenal-lahir-title').html(
					`<b>Form Surat Kenal Lahir</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
				);

				$('#id-layanan-pendaftaran-surat-kenal-lahir').val(id_layanan_pendaftaran);
				$('#id-pendaftaran-surat-kenal-lahir').val(id);
				if (data.surat_kenal_lahir !== null) {
					$('#no-surat-lahir').val(data.surat_kenal_lahir.no_surat_lahir)
					$('#rsud-vk').val(data.surat_kenal_lahir.rsud_vk)
					$('#nama-skl').val(data.surat_kenal_lahir.nama_skl)
					$('#nama-bayi-skl').val(data.surat_kenal_lahir.nama_bayi_skl)
					if (data.surat_kenal_lahir.jenis_kelamin_skl === 'laki-laki') {
						$('#jenis-kelamin-skl-1').prop('checked', true).change()
					}
					if (data.surat_kenal_lahir.jenis_kelamin_skl === 'perempuan') {
						$('#jenis-kelamin-skl-2').prop('checked', true).change()
					}
					$('#ibu-skl').val(data.surat_kenal_lahir.ibu_skl)
					$('#nik-ektp-ibu').val(data.surat_kenal_lahir.nik_ektp_skl_ibu)
					$('#gol-darah-ibu').val(data.surat_kenal_lahir.gol_darah_ibu)
					$('#ayah-skl').val(data.surat_kenal_lahir.ayah_skl)
					$('#nik-ektp-ayah').val(data.surat_kenal_lahir.nik_ektp_skl_ayah)
					$('#gol-darah-ayah').val(data.surat_kenal_lahir.gol_darah_ayah)
					$('#alamat-rumah-skl').val(data.surat_kenal_lahir.alamat_rumah_skl)
					$('#pekerjaan-skl').val(data.surat_kenal_lahir.pekerjaan_skl)
					$('#hari-skl').val(data.surat_kenal_lahir.hari_skl)
					$('#tanggal-skl').val(data.surat_kenal_lahir.tanggal_skl);
					$('#jam-skl').val(data.surat_kenal_lahir.jam_skl)
					$('#proses-persalinan-skl-1').val(data.surat_kenal_lahir.proses_persalinan_skl_1)
					$('#proses-persalinan-skl-2').val(data.surat_kenal_lahir.proses_persalinan_skl_2)
					$('#anak-yang-ke-skl-1').val(data.surat_kenal_lahir.anak_yang_ke_skl_1)
					$('#anak-yang-ke-skl-2').val(data.surat_kenal_lahir.anak_yang_ke_skl_2)
					if (data.surat_kenal_lahir.kembar_skl === '1') {
						$('#kembar-skl-1').prop('checked', true).change()
					}
					if (data.surat_kenal_lahir.kembar_skl === '0') {
						$('#kembar-skl-2').prop('checked', true).change()
					}

					$('#panjang-skl').val(data.surat_kenal_lahir.panjang_skl)
					$('#berat-badan-skl').val(data.surat_kenal_lahir.berat_badan_skl)
					$('#lingkar-dada-skl').val(data.surat_kenal_lahir.lingkar_dada_skl)
					$('#lingkar-kepala-skl').val(data.surat_kenal_lahir.lingkar_kepala_skl)
					$('#lingkar-pinggang-skl').val(data.surat_kenal_lahir.lingkar_pinggang_skl)

					// $('#tanggal-pasien-skl').val((data.surat_kenal_lahir.tanggal_pasien !== null ? datetimefmysql(data.surat_kenal_lahir.tanggal_pasien) : ''));
					$('#ttd-pasien-skl').val(data.surat_kenal_lahir.id_pasien)
					if (data.surat_kenal_lahir.ceklis_pasien !== null) {
						$('#ceklis-ttd-pasien-skl').prop('checked', true)
					}

					$('#ttd-bidan-skl').val(data.surat_kenal_lahir.id_bidan);
					$('#s2id_ttd-bidan-skl a .select2c-chosen').html(data.surat_kenal_lahir.nama_bidan);
					if (data.surat_kenal_lahir.ceklis_bidan !== null) {
						$('#ceklis-ttd-bidan-skl').prop('checked', true)
					}

					$('#tanggal-dokter-skl').val(data.surat_kenal_lahir.tanggal_dokter);
					$('#ttd-dokter-skl').val(data.surat_kenal_lahir.id_dokter);
					$('#s2id_ttd-dokter-skl a .select2c-chosen').html(data.surat_kenal_lahir.nama_dokter);
					if (data.surat_kenal_lahir.ceklis_dokter !== null) {
						$('#ceklis-ttd-dokter-skl').prop('checked', true)
					}

				}

				$('#modal_surat_kenal_lahir').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}


	// SURAT KENAL LAHIR
	function resetModalSuratKenalLahir() {
		// Set default fields
		$('#id-layanan-pendaftaran-surat-kenal-lahir').val('');
		// $('#id-pendaftaran-surat-kenal-lahir').val('');

		$('#no-surat-lahir').val('');
		$('#rsud-vk').val('');
		$('#nama-skl').val('');
		$('#nama-bayi-skl').val('');
		$('#ibu-skl').val('');
		$('#nik-ektp-ibu').val('');
		$('#gol-darah-ibu').val('');
		$('#ayah-skl').val('');
		$('#nik-ektp-ayah').val('');
		$('#gol-darah-ayah').val('');
		$('#alamat-rumah-skl').val('');
		$('#pekerjaan-skl').val('');
		$('#hari-skl').val('');
		$('#tanggal-skl').val('');
		$('#jam-skl').val('');
		$('#proses-persalinan-skl-1').val('');
		$('#proses-persalinan-skl-2').val('');
		$('#anak-yang-ke-skl-1').val('');
		$('#anak-yang-ke-skl-2').val('');
		$('#panjang-skl').val('');
		$('#berat-badan-skl').val('');
		$('#lingkar-kepala-skl').val('');
		$('#lingkar-dada-skl').val('');
		$('#lingkar-pinggang-skl').val('');
		$('#tanggal-dokter-skl').val('');
		$('#ttd-pasien-skl').val('');
		$('#ttd-bidan-skl').val('');
		$('#ttd-dokter-skl').val('');
		$('#s2id_ttd-bidan-skl a .select2c-chosen').html('Silahkan Pilih Bidan');
		$('#s2id_ttd-dokter-skl a .select2c-chosen').html('Silahkan Pilih Dokter');

		document.getElementById("jenis-kelamin-skl-1").checked = false;
		document.getElementById("jenis-kelamin-skl-2").checked = false;
		document.getElementById("kembar-skl-1").checked = false;
		document.getElementById("kembar-skl-2").checked = false;
		document.getElementById("ceklis-ttd-pasien-skl").checked = false;
		document.getElementById("ceklis-ttd-bidan-skl").checked = false;
		document.getElementById("ceklis-ttd-dokter-skl").checked = false;

	}



	// SPPRAPS WH  
	function cetakSuratPeryataanPulangRawatAtasPermintaanSendiri(details) {
		let detail = details.split('#');
		console.log(details);
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rawat_inap/api/rawat_inap/check_surat_peryataan_pulang_rawat_atas_permintaan_sendiri') ?>/id/' +
				detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Reset all values first
				resetModalSuratPeryataanPulangRawatAtasPermintaanSendiri();
				$('#modal-surat-peryataan-pulang-rawat-atas-permintaan-sendiri-title').html(
					`<b>Form Surat Peryataan Pulang Rawat Atas Permintaan Sendiri</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);
				$('#id-layanan-pendaftaran-sppraps').val(detail[0]);
				$('#nama-sppraps').val(data.nama_sppraps);
				$('#tgl-lahir-sppraps').val(data.tgl_lahir_sppraps);
				$('#tahun-sppraps').val(data.tahun_sppraps);
				$('#alamat-sppraps').val(data.alamat_sppraps);
				$('#rt-sppraps').val(data.rt_sppraps);
				$('#rw-sppraps').val(data.rw_sppraps);
				$('#kelurahan-sppraps').val(data.kelurahan_sppraps);
				$('#kecamatan-sppraps').val(data.kecamatan_sppraps);
				$('#kota-sppraps').val(data.kota_sppraps);
				$('#nomor-ktp-sppraps').val(data.nomor_ktp_sppraps);
				$('#nomor-tlp-sppraps').val(data.nomor_tlp_sppraps);
				if (data.ya_sppraps === '1') {
					document.getElementById("ya-sppraps-1").checked = true;
					// Disabled fields
					$("#nama-sppraps").prop("disabled", true);
					$("#tgl-lahir-sppraps").prop("disabled", true);
					$("#tahun-sppraps").prop("disabled", true);
					$("#jenis-kelamin-tahun-sppraps-1").prop("disabled", true);
					$("#jenis-kelamin-tahun-sppraps-2").prop("disabled", true);
					$("#alamat-sppraps").prop("disabled", true);
					$("#rt-sppraps").prop("disabled", true);
					$("#rw-sppraps").prop("disabled", true);
					$("#kelurahan-sppraps").prop("disabled", true);
					$("#kecamatan-sppraps").prop("disabled", true);
					$("#kota-sppraps").prop("disabled", true);
					$("#nomor-ktp-sppraps").prop("disabled", true);
					$("#nomor-tlp-sppraps").prop("disabled", true);
				} else if (data.ya_sppraps === '0') {
					document.getElementById("tidak-sppraps-2").checked = true;
					// Undisabled fields
					$("#nama-sppraps").prop("disabled", false);
					$("#tgl-lahir-sppraps").prop("disabled", false);
					$("#tahun-sppraps").prop("disabled", false);
					$("#jenis-kelamin-tahun-sppraps-1").prop("disabled", false);
					$("#jenis-kelamin-tahun-sppraps-2").prop("disabled", false);
					$("#alamat-sppraps").prop("disabled", false);
					$("#rt-sppraps").prop("disabled", false);
					$("#rw-sppraps").prop("disabled", false);
					$("#kelurahan-sppraps").prop("disabled", false);
					$("#kecamatan-sppraps").prop("disabled", false);
					$("#kota-sppraps").prop("disabled", false);
					$("#nomor-ktp-sppraps").prop("disabled", false);
					$("#nomor-tlp-sppraps").prop("disabled", false);
				}
				if (data.jenis_kelamin_tahun_sppraps == 'L') {
					document.getElementById("jenis-kelamin-tahun-sppraps-1").checked = true;
				} else if (data.jenis_kelamin_tahun_sppraps == 'P') {
					document.getElementById("jenis-kelamin-tahun-sppraps-2").checked = true;
				}
				$('#nama-sppraps1').val(data.nama_sppraps1);
				$('#nomor-rekam-sppraps').val(data.nomor_rekam_sppraps);
				$('#tgl-lahir-sppraps1').val(data.tgl_lahir_sppraps1);
				$('#tahun-sppraps1').val(data.tahun_sppraps1);

				$('#kelas-sppraps').val(data.kelas_sppraps);
				$('#s2id_kelas-sppraps a .select2c-chosen').html(data.nama_bangsal);

				// console.log(data.nama_bangsal);

				$('#dokter-sppraps').val(data.dokter_sppraps);
				$('#s2id_dokter-sppraps a .select2c-chosen').html(data.dokter_1);
				$('#tanggal-dokter-sppraps').val((data.tanggal_dokter_sppraps !== null ? datetimefmysql(data.tanggal_dokter_sppraps) : ''));
				$('#ttd-dokter-sppraps').val(data.ttd_dokter_sppraps);
				$('#s2id_ttd-dokter-sppraps a .select2c-chosen').html(data.dokter_2);
				if (data.ceklis_ttd_dokter_sppraps === '1') {
					document.getElementById("ceklis-ttd-dokter-sppraps").checked = true;
				}
				$('#ttd-pasien-sppraps').val(data.ttd_pasien_sppraps);
				if (data.ceklis_ttd_pasien_sppraps === '1') {
					document.getElementById("ceklis-ttd-pasien-sppraps").checked = true;
				}
				if (data.diri_sppraps === '1') {
					document.getElementById("diri-sppraps-1").checked = true;
					// Disabled fields
					$("#nama-sppraps1").prop("disabled", true);
					$("#nomor-rekam-sppraps").prop("disabled", true);
					$("#tgl-lahir-sppraps1").prop("disabled", true);
					$("#tahun-sppraps1").prop("disabled", true);
					$("#jenis-kelamin-tahun-sppraps-11").prop("disabled", true);
					$("#jenis-kelamin-tahun-sppraps-12").prop("disabled", true);
					// $( "#kelas-sppraps" ).prop( "disabled", true );
				} else if (data.diri_sppraps === '2') {
					document.getElementById("diri-sppraps-2").checked = true;
					document.getElementById("diri-sppraps-3").checked = true;
					document.getElementById("diri-sppraps-4").checked = true;
					document.getElementById("diri-sppraps-5").checked = true;
					document.getElementById("diri-sppraps-6").checked = true;
					document.getElementById("diri-sppraps-7").checked = true;
					// Undisabled fields
					$("#nama-sppraps1").prop("disabled", false);
					$("#nomor-rekam-sppraps").prop("disabled", false);
					$("#tgl-lahir-sppraps1").prop("disabled", false);
					$("#tahun-sppraps1").prop("disabled", false);
					$("#jenis-kelamin-tahun-sppraps-11").prop("disabled", false);
					$("#jenis-kelamin-tahun-sppraps-12").prop("disabled", false);
					// $( "#kelas-sppraps" ).prop( "disabled", false );
				}
				if (data.diri_sppraps == 2) {
					document.getElementById("diri-sppraps-2").checked = true;
				} else if (data.diri_sppraps == 3) {
					document.getElementById("diri-sppraps-3").checked = true;
				}
				if (data.diri_sppraps == 4) {
					document.getElementById("diri-sppraps-4").checked = true;
				} else if (data.diri_sppraps == 5) {
					document.getElementById("diri-sppraps-5").checked = true;
				}
				if (data.diri_sppraps == 6) {
					document.getElementById("diri-sppraps-6").checked = true;
				} else if (data.diri_sppraps == 7) {
					document.getElementById("diri-sppraps-7").checked = true;
				}
				if (data.jenis_kelamin_tahun_sppraps1 == 'L') {
					document.getElementById("jenis-kelamin-tahun-sppraps-11").checked = true;
				} else if (data.jenis_kelamin_tahun_sppraps1 == 'P') {
					document.getElementById("jenis-kelamin-tahun-sppraps-12").checked = true;
				}
				$('#modal_surat_peryataan_pulang_rawat_atas_permintaan_sendiri').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}


	// SPPRAPS WH  
	function resetModalSuratPeryataanPulangRawatAtasPermintaanSendiri() {
		$('#id-layanan-pendaftaran-sppraps').val('');
		// Unchecked fields
		$('#nama-sppraps').val('');
		$('#tgl-lahir-sppraps').val('');
		$('#tahun-sppraps').val('');
		$('#alamat-sppraps').val('');
		$('#rt-sppraps').val('');
		$('#rw-sppraps').val('');
		$('#kelurahan-sppraps').val('');
		$('#kecamatan-sppraps').val('');
		$('#kota-sppraps').val('');
		$('#nomor-ktp-sppraps').val('');
		$('#nomor-tlp-sppraps').val('');
		$('#nama-sppraps1').val('');
		$('#nomor-rekam-sppraps').val('');
		$('#tgl-lahir-sppraps1').val('');
		$('#tahun-sppraps1').val('');
		$('#kelas-sppraps').val('');
		$('#s2id_kelas-sppraps a .select2c-chosen').html('Silahkan Pilih Ruangan');
		$('#dokter-sppraps').val('');
		$('#s2id_dokter-sppraps a .select2c-chosen').html('Silahkan Pilih Dokter');
		$('#tanggal-dokter-sppraps').val('');
		$('#ttd-dokter-sppraps').val('');
		$('#s2id_ttd-dokter-sppraps a .select2c-chosen').html('Silahkan Pilih Dokter');
		$('#ttd-pasien-sppraps').val('');

		document.getElementById("ya-sppraps-1").checked = false;
		document.getElementById("tidak-sppraps-2").checked = false;
		document.getElementById("jenis-kelamin-tahun-sppraps-1").checked = false;
		document.getElementById("jenis-kelamin-tahun-sppraps-2").checked = false;
		document.getElementById("diri-sppraps-1").checked = false;
		document.getElementById("diri-sppraps-2").checked = false;
		document.getElementById("diri-sppraps-3").checked = false;
		document.getElementById("diri-sppraps-4").checked = false;
		document.getElementById("diri-sppraps-5").checked = false;
		document.getElementById("diri-sppraps-6").checked = false;
		document.getElementById("diri-sppraps-7").checked = false;
		document.getElementById("jenis-kelamin-tahun-sppraps-11").checked = false;
		document.getElementById("jenis-kelamin-tahun-sppraps-12").checked = false;
		document.getElementById("ceklis-ttd-dokter-sppraps").checked = false;
		document.getElementById("ceklis-ttd-pasien-sppraps").checked = false;

		$("#nama-sppraps").prop("disabled", false);
		$("#tgl-lahir-sppraps").prop("disabled", false);
		$("#tahun-sppraps").prop("disabled", false);
		$("#jenis-kelamin-tahun-sppraps-1").prop("disabled", false);
		$("#jenis-kelamin-tahun-sppraps-2").prop("disabled", false);
		$("#alamat-sppraps").prop("disabled", false);
		$("#rt-sppraps").prop("disabled", false);
		$("#rw-sppraps").prop("disabled", false);
		$("#kelurahan-sppraps").prop("disabled", false);
		$("#kecamatan-sppraps").prop("disabled", false);
		$("#kota-sppraps").prop("disabled", false);
		$("#nomor-ktp-sppraps").prop("disabled", false);
		$("#nomor-tlp-sppraps").prop("disabled", false);
		$("#nama-sppraps1").prop("disabled", false);
		$("#nomor-rekam-sppraps").prop("disabled", false);
		$("#tgl-lahir-sppraps1").prop("disabled", false);
		$("#tahun-sppraps1").prop("disabled", false);
		$("#jenis-kelamin-tahun-sppraps-11").prop("disabled", false);
		$("#jenis-kelamin-tahun-sppraps-12").prop("disabled", false);
		// $( "#kelas-sppraps" ).prop( "disabled", false );

	}






	function addTerapiRM() {
		if ($('#obat_rm').val() === '') {
			syams_validation('#obat_rm', 'Pilihan Obat harus diisi.');
			return false;
		}

		if ($('#jumlah-obat_rm').val() === '') {
			syams_validation('#jumlah-obat_rm', 'Pilihan Jumlah Obat harus diisi.');
			return false;
		}

		let html = '';
		let number = $('.number-terapi').length;
		let obat_rm = $('#s2id_obat_rm a .select2c-chosen').html();
		let id_obat_rm = $('#obat_rm').val();
		let jumlah_obat_rm = $('#jumlah-obat-rm').val();
		let dosis_rm = $('#dosis-rm').val();
		let frekuensi_rm = $('#frekuensi-rm').val();
		let cara_pemberian_rm = $('#cara-pemberian-rm').val();
		let ek_jam_pemberian_rm = $('#ek_jam_pemberian_rm').val();
		let ek_jam_pemberian_satu_rm = $('#ek_jam_pemberian_satu_rm').val();
		let ek_jam_pemberian_dua_rm = $('#ek_jam_pemberian_dua_rm').val();
		let ek_jam_pemberian_tiga_rm = $('#ek_jam_pemberian_tiga_rm').val();
		let ek_jam_pemberian_empat_rm = $('#ek_jam_pemberian_empat_rm').val();
		let ek_jam_pemberian_lima_rm = $('#ek_jam_pemberian_lima_rm').val();
		let petunjuk_khusus_rm = $('#petunjuk-khusus-rm').val();


		html = /* html */ `
            <tr>
                <td class="number-terapi" align="center">${++number}</td>
                <td align="center"><input type="hidden" name="id_obat_rm[]" value="${id_obat_rm}">${obat_rm}</td>
                <td align="center"><input type="hidden" name="jumlah_obat_rm[]" value="${jumlah_obat_rm}">${jumlah_obat_rm}</td>
                <td align="center"><input type="hidden" name="dosis_rm[]" value="${dosis_rm}">${dosis_rm}</td>
                <td align="center"><input type="hidden" name="frekuensi_rm[]" value="${frekuensi_rm}">${frekuensi_rm}</td>
                <td align="center"><input type="hidden" name="cara_pemberian_rm[]" value="${cara_pemberian_rm}">${cara_pemberian_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_rm[]" value="${ek_jam_pemberian_rm}">${ek_jam_pemberian_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_satu_rm[]" value="${ek_jam_pemberian_satu_rm}">${ek_jam_pemberian_satu_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_dua_rm[]" value="${ek_jam_pemberian_dua_rm}">${ek_jam_pemberian_dua_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_tiga_rm[]" value="${ek_jam_pemberian_tiga_rm}">${ek_jam_pemberian_tiga_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_empat_rm[]" value="${ek_jam_pemberian_empat_rm}">${ek_jam_pemberian_empat_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_lima_rm[]" value="${ek_jam_pemberian_lima_rm}">${ek_jam_pemberian_lima_rm}</td>
                <td align="center"><input type="hidden" name="petunjuk_khusus_rm[]" value="${petunjuk_khusus_rm}">${petunjuk_khusus_rm}</td>
                <td align="center"><input type="hidden" name="trp_users[]" value="<?= $this->session->userdata("id_translucent") ?>"><?= $this->session->userdata("nama") ?><input type="hidden" name="created_date[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
		$('#table-terapi-rm tbody').append(html);

	}

	//Punya yang dulu
	function hapusTerapiResume(obj, id) {
		bootbox.dialog({
			message: "Anda yakin akan menghapus data ini?",
			title: "Hapus Data",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				hapus: {
					label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
					className: "btn-info",
					callback: function() {
						$.ajax({
							type: 'DELETE',
							url: '<?= base_url("rawat_inap/api/rawat_inap/hapus_terapi_pulang_rm") ?>/' +
								id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status) {
									messageCustom(data.message, 'Success');
									removeList(obj);
								} else {
									customAlert('Hapus Terapi Pulang', data.message);
								}
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	}

	function addJadwalKontrolResume() {
		if ($('#ek_kontrol_dokter_resume').val() === '') {
			syams_validation('#ek_kontrol_dokter_resume', 'Tanggal Kontrol Dokter harus diisi.');
			return false;
		}

		if ($('#ek_nama_dokter_resume').val() === '') {
			syams_validation('#ek_nama_dokter_resume', 'Pilihan Nama Dokter harus diisi.');
			return false;
		}

		let html = '';
		let number = $('.number-kontrol').length;
		let tanggal_kontrol = $('#ek_kontrol_dokter_resume').val();
		let ek_nama_dokter = $('#s2id_ek_nama_dokter_resume a .select2c-chosen').html();
		let id_ek_nama_dokter = $('#ek_nama_dokter_resume').val();
		let ek_tempat_kontrol = $('#ek_tempat_kontrol').val();
		var myDays = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

		function dateTime(waktu) {
			var el = waktu.split(' ');
			var tgl = date2mysql(el[0]);
			return tgl;
		}

		function timeAja(waktu) {
			var el = waktu.split(' ');
			var tgl = date2mysql(el[0]);
			var tm = el[1].split(':');
			return tm[0] + ':' + tm[1];
		}

		function tanggalAja(waktu) {
			var el = waktu.split(' ');
			var tgl = el[0];
			var tm = el[1].split(':');
			return tgl;
		}

		function takeTanggal(waktu) {
			var el = waktu.split(' ');
			var tgl = el[0];
			var s_tgl = tgl.split('/');
			var tm = el[1].split(':');
			return s_tgl[2] + '-' + s_tgl[1] + '-' + s_tgl[0] + ' ' + tm[0] + ':' + tm[1] + ':' + '00';
		}

		var cariHariKontrol = dateTime(tanggal_kontrol);
		var cari_jam_kontrol = timeAja(tanggal_kontrol);
		var hari_kontrol = new Date(cariHariKontrol);
		var ambil_hari_kontrol = hari_kontrol.getDay(),
			ambil_hari_kontrol = myDays[ambil_hari_kontrol];
		var ambil_tanggal_kontrol = tanggalAja(tanggal_kontrol);
		var entri_tanggal_kontrol = takeTanggal(tanggal_kontrol);

		html = /* html */ `
            <tr>
                <td class="number-kontrol" align="center">${++number}</td>
                <td align="center"><input type="hidden" name="ambil_tanggal_kontrol[]" value="${entri_tanggal_kontrol}">${ambil_tanggal_kontrol}</td>
                <td align="center"><input type="hidden" name="ambil_hari_kontrol[]" value="${ambil_hari_kontrol}">${ambil_hari_kontrol}</td>
                <td align="center"><input type="hidden" name="cari_jam_kontrol[]" value="${cari_jam_kontrol}">${cari_jam_kontrol}</td>
                <td align="center"><input type="hidden" name="ek_nama_dokter_resume[]" value="${id_ek_nama_dokter}">${ek_nama_dokter}</td>
                <td align="center"><input type="hidden" name="ek_tempat_kontrol[]" value="${ek_tempat_kontrol}">${ek_tempat_kontrol}</td>
                <td align="center"><input type="hidden" name="ek_operator[]" value="<?= $this->session->userdata("id_translucent") ?>"><?= $this->session->userdata("nama") ?><input type="hidden" name="tanggal_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                <td align="right">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>

        `;
		$('#table-kontrol-resume tbody').append(html);
	}

	function hapusKontrolKembaliRM(obj, id, idKeperawatan) {
		bootbox.dialog({
			message: "Anda yakin akan menghapus data ini?",
			title: "Hapus Data",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				hapus: {
					label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
					className: "btn-info",
					callback: function() {
						$.ajax({
							type: 'DELETE',
							url: '<?= base_url("rawat_inap/api/rawat_inap/hapus_kontrol_kembali_rm") ?>/' +
								id + '/' + idKeperawatan,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status) {
									messageCustom(data.message, 'Success');
									removeList(obj);
								} else {
									customAlert('Hapus Kontrol Kembali', data.message);
								}
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	}

	function hapusTerapiResume(obj, id, idKeperawatan) {
		bootbox.dialog({
			message: "Anda yakin akan menghapus data ini?",
			title: "Hapus Data",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				hapus: {
					label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
					className: "btn-info",
					callback: function() {
						$.ajax({
							type: 'DELETE',
							url: '<?= base_url("rawat_inap/api/rawat_inap/hapus_terapi_pulang_rm") ?>/' +
								id + '/' + idKeperawatan,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status) {
									messageCustom(data.message, 'Success');
									removeList(obj);
								} else {
									customAlert('Hapus Terapi Pulang', data.message);
								}
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	}

	function cetakSuratKeteranganKematian(id_layanan_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_surat_keterangan_kematian') ?>/id/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalSuratKeteranganKematian();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-surat-keterangan-kematian-title').html(`<b>Form Surat Keterangan Kematian</b> | No. RM: ${data.no_rm}, Nama: ${data.nama_pasien}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telp}</b></i>`);
				$('#id-layanan-pendaftaran-skk').val(id_layanan_pendaftaran);
				$('#id-pemeriksa-skk').val(data.id_pemeriksa);
				$('#nomor-surat-kematian-skk').val(data.nomor_surat_kematian);
				$('#nomor-urut-kematian-skk').val(data.nomor_urut_kematian);
				$('#nomor-kk-skk').val(data.nomor_kk);
				$('#alamat-meninggal-skk').val(data.alamat_meninggal);
				$('#kode-kematian-skk').val(data.kode_kematian);
				$('#yang-melapor-skk').val(data.yang_melapor);
				$('#ktp-skk').val(data.ktp);
				$('#waktu-pemeriksaan-skk').val(datetimefmysql(data.waktu_pemeriksaan));

				$('#s2id_dokter-pemeriksa-skk a .select2c-chosen').html(data.nama_pemeriksa);

				if (data.tempat_meninggal == 'Rumah Sakit') {
					document.getElementById("rs-skk").checked = true;
				} else if (data.tempat_meninggal == 'Rumah Bersalin') {
					document.getElementById("rb-skk").checked = true;
				} else if (data.tempat_meninggal == 'Puskesmas') {
					document.getElementById("puskesmas-skk").checked = true;
				} else if (data.tempat_meninggal == 'Rumah') {
					document.getElementById("rumah-skk").checked = true;
				} else if (data.tempat_meninggal == 'Lain-lain') {
					document.getElementById("lain-lain-skk").checked = true;
				}

				if (data.jenis_pemeriksaan == 'Visum') {
					document.getElementById("visum-skk").checked = true;
				} else if (data.jenis_pemeriksaan == 'Otopsi') {
					document.getElementById("otopsi-skk").checked = true;
				} else if (data.jenis_pemeriksaan == 'Tidak divisum') {
					document.getElementById("tidak-divisum-skk").checked = true;
				}

				if (data.sebab_kematian == 'Sakit') {
					document.getElementById("sakit-skk").checked = true;
				} else if (data.sebab_kematian == 'Bersalin') {
					document.getElementById("bersalin-skk").checked = true;
				} else if (data.sebab_kematian == 'Lahir Mati') {
					document.getElementById("lahir-mati-skk").checked = true;
				} else if (data.sebab_kematian == 'Kecelakaan Lalu Lintas') {
					document.getElementById("kecelakaan-lalin-skk").checked = true;
				} else if (data.sebab_kematian == 'Kecelakaan Industri') {
					document.getElementById("kecelakaan-industri-skk").checked = true;
				} else if (data.sebab_kematian == 'Bunuh Diri') {
					document.getElementById("bunuh-diri-skk").checked = true;
				} else if (data.sebab_kematian == 'Pembunuhan/Penganiayaan') {
					document.getElementById("pembunuhan-skk").checked = true;
				} else if (data.sebab_kematian == 'Lain-lain') {
					document.getElementById("lain-lain-sebab-kematian-skk").checked = true;
				} else if (data.sebab_kematian == 'Tidak Dapat Ditentukan') {
					document.getElementById("tidak-dapat-ditentukan-skk").checked = true;
				}

				if (data.dikubur == 'Tangerang') {
					document.getElementById("tangerang-skk").checked = true;
				} else if (data.dikubur == 'Luar Tangerang') {
					document.getElementById("luar-tangerang-skk").checked = true;
				}

				if (data.awetkan == 1) {
					document.getElementById("diawetkan-skk").checked = true;
				} else if (data.awetkan == 0) {
					document.getElementById("tidak-diawetkan-skk").checked = true;
				}

				$('#modal-surat-keterangan-kematian').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function resetModalSuratKeteranganKematian() {
		// Set default fields
		$('#id-pendaftaran-skk').val('');
		$('#id-pemeriksa-skk').val('');
		$('#nomor-surat-kematian-skk').val('');
		$('#nomor-urut-kematian-skk').val('');
		$('#nomor-kk-skk').val('');
		$('#alamat-meninggal-skk').val('');
		$('#waktu-pemeriksaan-skk').val('');
		$('#kode-kematian-skk').val('');
		$('#yang-melapor-skk').val('');
		$('#ktp-skk').val('');
		$('#s2id_dokter-pemeriksa-skk a .select2c-chosen').html('Silahkan dipilih');

		// Unchecked fields
		document.getElementById("rs-skk").checked = false;
		document.getElementById("rb-skk").checked = false;
		document.getElementById("puskesmas-skk").checked = false;
		document.getElementById("rumah-skk").checked = false;
		document.getElementById("lain-lain-skk").checked = false;
		document.getElementById("visum-skk").checked = false;
		document.getElementById("otopsi-skk").checked = false;
		document.getElementById("tidak-divisum-skk").checked = false;
		document.getElementById("sakit-skk").checked = false;
		document.getElementById("bersalin-skk").checked = false;
		document.getElementById("lahir-mati-skk").checked = false;
		document.getElementById("kecelakaan-lalin-skk").checked = false;
		document.getElementById("kecelakaan-industri-skk").checked = false;
		document.getElementById("bunuh-diri-skk").checked = false;
		document.getElementById("pembunuhan-skk").checked = false;
		document.getElementById("lain-lain-sebab-kematian-skk").checked = false;
		document.getElementById("tidak-dapat-ditentukan-skk").checked = false;
		document.getElementById("tangerang-skk").checked = false;
		document.getElementById("luar-tangerang-skk").checked = false;
		document.getElementById("diawetkan-skk").checked = false;
		document.getElementById("tidak-diawetkan-skk").checked = false;
	}

	function addDiagnosaRanap() {
		const layanan = $('#jenis-layanan').val();
		const listLayanan = ['Rawat Inap', 'Intensive Care', 'Hemodialisa']
		if ($('#diagnosa-manual').val() === '1') {
			if ($('#golongan-sebab-sakit-lain').val() === '') {
				syams_validation('#golongan-sebab-sakit-lain', 'Kolom diagnosa harus diisi.');
				$('#wizard-form').bwizard('show', '2');
				return false;
			}
		} else {
			if ($('#golongan-sebab-sakit').val() === '') {
				syams_validation('#golongan-sebab-sakit', 'Kolom diagnosa harus diisi.');
				$('#wizard-form').bwizard('show', '2');
				return false;
			}
		}

		if ($('#dokter-diagnosa').val() === '') {
			syams_validation('#dokter-diagnosa', 'Kolom dokter harus diisi.');
			$('#wizard-form').bwizard('show', '1');
			return false;
		}

		console.log($('#dokter-diagnosa').val());

		if ($('#jenis_kasus').val() === '') {
			syams_validation('#jenis_kasus', 'Jenis kasus harus dipilih.');
			return false;
		}

		var html = '';
		var numberDiagnosa = $('.number-diag').length;
		var diagnosaManual = $('#diagnosa-manual').val();
		var dokter = $('#s2id_dokter-diagnosa a .select2c-chosen').html();
		var id_dokter = $('#dokter-diagnosa').val();
		var golonganSebabSakit = $('#s2id_golongan-sebab-sakit a .select2c-chosen').html();
		var kodeDiagnosa = golonganSebabSakit.substr(0, 3);
		var golonganSebabSakitLain = $('#golongan-sebab-sakit-lain').val();
		var id_gol_sebab_sakit = $('#golongan-sebab-sakit').val();
		var diagnosaKlinik = $('#diagnosa-klinik').val();
		var jenisKasus = $('#jenis_kasus').val();
		var diagnosaBanding = $("input[name='diagnosa_banding[]']").map(function() {
			return $(this).val();
		}).get();
		var diagnosaAkhir = $('#diagnosa-akhir').val();
		var penyebabKematian = $('#penyebab-kematian').val();

		var idhid = 'primerdiag' + numberDiagnosa;
		var valPrimer = 'Sekunder';
		var checkPrimer = '';
		if (numberDiagnosa === 0) {
			valPrimer = 'Utama';
			checkPrimer = 'checked';
		}

		var jenisKasusLabel = '';
		if (jenisKasus == 1) {
			jenisKasusLabel = 'Baru';
		} else {
			jenisKasusLabel = 'Lama';
		}

		// alert(kodeDiagnosa);

		var diagnosa = '';
		if (diagnosaManual == 1) {
			diagnosa = `<input type="hidden" name="gol_sebab_sakit_lain[]" value="${golonganSebabSakitLain}">${golonganSebabSakitLain}
                        <input type="hidden" name="id_golongan_sebab_sakit[]" value>`;
		} else {
			diagnosa = `<input type="hidden" name="gol_sebab_sakit_lain[]" value="${golonganSebabSakitLain}">
                        <input type="hidden" name="id_golongan_sebab_sakit[]" value="${id_gol_sebab_sakit}">${golonganSebabSakit}`;
		}

		html = /* html */ `
            <tr>
                <td class="number-diag center">
                    <input type="hidden" name="id_diag[]" value="">${(++numberDiagnosa)}
                    <input type="hidden" name="kode_diag[]" value="${kodeDiagnosa}">
                </td>
                <td>
                    <input type="hidden" name="dokter_diag[]" value="${id_dokter}">${dokter}
                </td>
                <td>
                    <input type="hidden" name="diag_manual[]" value="${diagnosaManual}">
                    ${diagnosa}
                </td>
                <td>
                    <input type="hidden" name="diag_klinis[]" value="${diagnosaKlinik}">${(diagnosaKlinik == 1) ? 'Ya' : 'Tidak'}
                </td>
                <td class="center v-center">
                    <input type="hidden" class="hiddenprimer" name="prioritas[]" id="${idhid}" value="${valPrimer}">
                    <input type="checkbox" class="checkprimer" ${!listLayanan.includes(layanan) ? checkPrimer : ''} onchange="return setPrimerDiagnosa(this, '${idhid}')">
                </td>
                <td class="center v-center">
                    <input type="hidden" name="jenis_kasus[]" value="${jenisKasus}"> ${(jenisKasusLabel)}
                </td>
                <td>
                    <input type="hidden" name="diag_banding[]" value="${diagnosaBanding}"> ${(diagnosaBanding)}
                </td>
                <td>
                    <input type="hidden" name="diag_akhir[]" value="${diagnosaAkhir}">${(diagnosaAkhir == 1) ? 'Ya' : 'Tidak'}
                </td>
                <td>
                    <input type="hidden" name="sebab_kematian[]" value="${penyebabKematian}">${(penyebabKematian == 1) ? 'Ya' : 'Tidak'}
                </td>
                <td class="right">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        `;

		$('#table-diagnosa tbody').append(html);
		$('#diagnosa-manual').val('');

		$('#golongan-sebab-sakit-lain').val('');
		$('#golongan-sebab-sakit').val('');
		$('#s2id_golongan-sebab-sakit a .select2c-chosen').html('');

		$('#diagnosa-banding').val('');
		$('.copy1').remove();
		$('.copy2').remove();
		$('.copy3').remove();
		$('.copy4').remove();

		$('#diagnosa-klinik').val('');
		$('#jenis_kasus').val('');
		$('#diagnosa-akhir').val('');
		$('#penyebab-kematian').val('');

		$('.golongan-sebab-sakit-lain').hide();
		$('.golongan-sebab-sakit-lain').val('');
		$('.golongan-sebab-sakit').show();

		$('#diagnosa-manual, #diagnosa-akhir, #penyebab-kematian').prop('checked', false);
		syams_validation_remove('.select2c-input, .custom-form');
	}

	function editResep(id, edit = 1) {
		$('#salin-resep').hide();
		$('.obkrs').show();
		$('#res-resep-ranap').html('');
		$('[data-toggle="popover"]').popover('hide');
		klik = null;
		date_time('tanggal-resep-realtime', 'html');
		let title_mode = '';
		let cek_stok = 0;
		if (edit > 0) {
			$('input[name=tanggal_resep]').attr('id', 'tanggal-resep-edit');
		} else {
			$('#no_r').val('');
			$('input[name=tanggal_resep]').attr('id', 'tanggal-resep');
			title_mode = '(Salin)';
			cek_stok = 1;
		}
		$('input[name=tanggal_resep]').attr('id', 'tanggal-resep-edit');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('pelayanan/api/pelayanan/get_data_resep') ?>',
			data: {
				id: id,
				cek_stok: cek_stok
			},
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				var hasil = data;
				var data = data.data[0];
				$('#modal-form-resep-label').html(`
                    <b>Form Resep Rawat Jalan ${title_mode}</b> | No. RM : ${data.id_pasien}, Nama: ${data.pasien},
                    <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telp}</b></i></span>
                `);
				$('#modal-form-resep').modal('show');

				$('#list-resep').html('');
				if (edit > 0) {
					$('#no-resep, #id').val(id);
					$('#id-pk').val(data.id_layanan_pendaftaran);
				} else {
					$('#no-resep, #id').val('');
					$('#salin-resep').show();
				}

				// $('#dokterhide').val(data.id_dokter);
				// $('#s2id_dokterhide a .select2c-chosen').html(data.dokter);
				$('#pasien-auto').html(data.id_pasien + ' / ' + data.pasien);
				$('#pasienhide').val(data.id_pasien);
				// $('#dokterhide').val(data.id_dokter);
				$('#usia-pasien').html(hitungUmur(data.tanggal_lahir));
				$('#jenis-pk').html(data.jenis_layanan);
				$('#penjamin-pasien').html(data.penjamin);
				$('#jasa').val(money_format(data.toeslag));
				$('#tanggal-resep-label').html(datetimefmysql(data.tanggal_resep));

				$('#no-r').val(data.resep_r.length + 1);

				$.each(data.resep_r, function(i, v) {
					let list = /* html */ `
                        <div id="wrap${v.no_r}" class="wrap">
                            <table class="table-no-border">
                                <tr><td><input type=hidden name="no_r${v.no_r}" id="no-r${v.no_r}" value="${v.no_r}" class="no-r"></td></tr>
                                <tr><td></td></tr>
                                <tr><td><input type=hidden name="jt${v.no_r}" id="jt${v.no_r}" value="${v.tebus_r_jumlah}" class="jt"></td></tr>
                                <tr><td><input type=hidden name="ap${v.no_r}" id="ap${v.no_r}" value="${v.aturan_pakai}" class="ap"></td></tr>
                                <tr><td><input type=hidden name="ap2${v.no_r}" id="ap2${v.no_r}" value="${v.ket_aturan_pakai}" class="ap2"></td></tr>
                                <tr><td><input type=hidden name="it${v.no_r}" id="it${v.no_r}" value="${v.iter}" class="it"></td></tr>
                                <tr><td><input type=hidden name="ja${v.no_r}" id="ja${v.no_r}" value="${v.id_tarif_tuslah}" class="ja"></td></tr>
                                <tr><td><input type=hidden name="cara_buat${v.no_r}" id="cara-buat${v.no_r}" value="${v.cara_pembuatan}" class="cara-buat"></td></tr>
                                <tr>
                                    <td>
                                        <input type=hidden name="timing${v.no_r}" id="timing${v.no_r}" value="${v.timing}" class="timing">
                                        <input type=hidden name="jmlnor" id="jmlnor${v.no_r}" class="jmlnor" value="${v.no_r}">
                                        <input type=hidden name="waktu_pemberian${v.no_r}" id="waktu-pemberian${v.no_r}" class="waktu-pemberian" value="${v.admin_time}">
                                    </td>
                                </tr>
                            </table>
                            <div id="table-list-resep${v.no_r}" class="input-resep" style="width: 100%; display: flex; flex-direction: column; gap:.5rem">
								<div style="display: flex;gap: 1rem; justify-content: space-between">
									<div style="display: flex;gap: 1rem;align-items: center">
										<strong id="nomor-r${v.no_r}">R/${v.no_r}</strong>
										<label for="is-racik${v.no_r}" style="display: flex; gap:.3rem;">
											<input
												type="hidden"
												name="is_racik${v.no_r}"
												id="is-racik${v.no_r}"
												title="Apakah ini resep racikan?"
												class="check-is-racik"
												value="${v.is_racik}"
											>
											<div style="display: flex; align-items: center; gap: .5rem">
												Racikan ${v.is_racik !== '1' ? `<i class="fas fa-times-circle"></i>` : `<i class="fas fa-check-circle"></i>`}
											</div>
										</label>
										|
										<div id="cara-buat-r${v.no_r}" style="display: flex; gap:0.4rem">
											<div>${v.cara_pembuatan}</div>
											<div>|</div>
											<span style="display: flex; gap: .2rem">Permintaan <input id="jp${v.no_r}" class="jp custom-form" type="number" name="jp${v.no_r}" value="${parseInt(v.resep_r_jumlah)}" onkeypress="return hanyaAngka(event)" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></span>
											<div>|</div>
											<div>${v.aturan_pakai_manual == 1 ? v.ket_aturan_pakai_manual : v.aturan_pakai}</div>
											<div>|</div>
											<div>${v.admin_time}</div>
										</div>
										<button type="button" title="Klik untuk hapus R /" class="btn btn-secondary btn-xs" onclick="removeREdit($(this));"><i class="fas fa-trash-alt"></i> Delete R /</button>
									</div>

									${v.is_racik !== '1' ? '' : /* html */ `
										<label for="sediaan${v.no_r}" class="sediaan" style="display: flex; gap:.3rem;align-items: center;">
											Sediaan:
											<input type="text" name="sediaan${v.no_r}" id="sediaan${v.no_r}" class="sediaan_auto select2c-input">
										</label>
									`}
								</div>
								<div style="display: inline-flex;margin-left: 12px;" class="kr">
									<b>Keterangan : </b>
									<input type="text" name="keterangan_resep${v.no_r}" id="keterangan_resep${v.no_r}" style="width:300px;margin-left:5px" class="custom-form" value="${v.keterangan_resep ? v.keterangan_resep : ''}">
								</div>
								<div class="tr-row" style="display: flex; flex-direction: column;">
								</div>
							</div>
                        </div>
                    `;

					$('#list-resep').append(list);

					let subtotal = 0;
					let obatkronistxt = '';

					$.each(v.resep_r_detail, function(j, val) {
						obatkronis = '';
						if (val.kronis === '1') {
							obatkronistxt = '<i class="blinker">Obat Kronis</i>';
						}

						var ada = true;
						if (edit == 0) {
							if (val['stok_akhir'] < 0) {
								ada = false;
							}
						}

						if (ada) {
							// let listResep = /* html */ `
							//     <tr class="tr-rows${v.no_r}">
							//         <td width="50%" style="padding-left:20px">
							//             <span class="brg"><input type=hidden name="id_barang${v.no_r}[]" id="id-barang${v.no_r}${i}" class="barang" value="${val.id_barang}"></span>
							//             <span class="krs"><input type=hidden name="obatkronis${v.no_r}[]" id="obatkronis${v.no_r}${i}" class="barang" value="${val.kronis}"></span>
							//             ${val.nama_barang}&nbsp;${obatkronistxt}
							//         </td>
							//         <td width="20%" class="center">
							//             Dosis Racik
							//             <input class="jmlpakai custom-form" type="text" value="${val.dosis_racik}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)" readonly>
							//         </td>
							//         <td width="20%" class="center">
							//             Jml Pakai
							//             <input class="jmlpakai custom-form" type="text" name="jmlpakai${v.no_r}[]" id="jmlpakai${v.no_r}${i}" value="${val.jumlah_pakai}" style="width:50px; display:unset;" data-jual_harga="${val.jual_harga}" data-id="${val.id}" onchange="chRDetail($(this))" onkeypress="return hanyaAngka(event)">
							//         </td>
							//         <td width="10%" class="right">
							//             <input type=hidden name="dosisracik${v.no_r}[]" id="dosisracik${v.no_r}${i}" value="${val.dosis_racik}">
							//             <span id="hb-${val.id}" class="harga-barang">${money_format(precise_round(val.jumlah_pakai * val.jual_harga, 2))}</span>
							//         </td>
							//         <td width="5%" class="right">
							//             <button type="button" title="Klik untuk hapus" class="btn btn-secondary btn-xs" onclick="removeElement(${v.no_r}, this)"><i class="fas fa-times-circle"></i></button>
							//             <input type=hidden name="jmldetail${v.no_r}" id="jmldetail${v.no_r}${i}" class="jmldetail" value="${v.no_r}">
							//         </td>
							//     </tr>
							// `;
							let listResep = /* html */ `
								<div class="tr-rows${v.no_r}" style="width:100%">
									<div style="display: flex; justify-content: space-between; margin-left: 1.5rem">
										<span class="brg" style="display: none"><input type=hidden name="id_barang${v.no_r}[]" id="id-barang${v.no_r}${j}" class="barang" value="${val.id_barang}"></span>
										<span class="krs" style="display: none"><input type=hidden name="obatkronis${v.no_r}[]" id="obatkronis${v.no_r}${j}" class="obat-kronis" value="${val.kronis}"></span>
										<p>
											${val.nama_barang}&nbsp;${obatkronistxt}
											<input type="hidden" class="kekuatan-obat" id="kekuatan${v.no_r}${j}" value="${val.kekuatan  === '' ? val.dosis_racik : val.kekuatan}"/>
											<input type="hidden" class="harga-jual-barang" id="harga-jual-barang${v.no_r}${j}" value="${val.jual_harga}"/>
											<input type="hidden" class="sisa-stok" id="sisa-stok${v.no_r}${j}" value="${val.stok_akhir}"/>
										</p>
										<div style="display: flex; justify-content: space-between; align-items: center; gap: 2.4rem">
											<div style="display: flex; gap:.5rem">
												Dosis Racik
												<input class="dosisracik custom-form" type="text" name="dosisracik${v.no_r}[]" id="dosisracik${v.no_r}${j}" value="${val.dosis_racik}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)" readonly>
												${val.satuan_kekuatan}
											</div>
											<div style="display: flex; gap:.5rem; align-items: center">
												Jml Pakai
												<input class="jmlpakai custom-form" type="text" name="jmlpakai${v.no_r}[]" id="jmlpakai${v.no_r}${j}" value="${val.jumlah_pakai}" style="width:50px; display:unset;" data-jual_harga="${val.jual_harga}" data-id="${v.no_r}${j}n" onchange="chRDetail($(this))" onkeypress="return hanyaAngka(event)">
											</div>
											<div style="display: flex; gap:.5rem">
												<span id="hb-${v.no_r}${j}n" class="harga-barang">${money_format(precise_round(val.jumlah_pakai * val.jual_harga, 2))}</span>
											</div>
											<div style="display: flex; gap:.2rem">
												<button type="button" title="Klik untuk hapus" class="btn btn-secondary btn-xs" onclick="removeElement(${v.no_r}, $(this))"><i class="fas fa-times-circle"></i></button>
												<input type=hidden name="jmldetail${v.no_r}[]" id="jmldetail${v.no_r}${j}" class="jmldetail" value="${v.no_r}">
											</div>
										</div>
									</div>
								</div>
							`;

							$('#table-list-resep' + v.no_r + ' .tr-row').append(listResep);
							subtotal = subtotal + (val.jumlah_pakai * val.jual_harga);
						}
					});

					sediaanAuto(v.no_r);
					$(`#sediaan${v.no_r}`).val(v.id_sediaan)
					$(`#s2id_sediaan${v.no_r} a .select2c-chosen`).html(v.nama_sediaan);

					const jumlahPermintaan = $(`#jp${v.no_r}`)

					jumlahPermintaan.on('keyup', function() {
						let permintaan = parseInt($(this).val());
						$(this).parent().parent().parent().parent().siblings('table').find(`#jt${v.no_r}`).val(permintaan)

						$(this)
							.parent()
							.parent()
							.parent()
							.parent()
							.siblings('.tr-row')
							.children()
							.each(function(index, element) {
								let no_r = $(this).parent()
									.parent()
									.parent()
									.find('.no-r').val()

								const dose = `#dosisracik${no_r}${index}`;
								const strength = `#kekuatan${no_r}${index}`;
								const price = `#harga-jual-barang${no_r}${index}`;
								const usedAmount = `#jmlpakai${no_r}${index}`;
								const salePrice = `#hb-${no_r}${index}n`;

								if (permintaan) {
									const dosisRacik = parseInt($(element).find(dose).val());
									const kekuatan = parseInt($(element).find(strength).val());
									const hargaJualBarang = parseFloat($(element).find(price).val());
									const sisaStok = parseInt($(`#sisa-stok${no_r}${index}`).val())

									const jumlahPakai = (dosisRacik * permintaan) / kekuatan;
									console.log(jumlahPakai)

									const hargaJual = roundToTwo(jumlahPakai * hargaJualBarang);

									if (jumlahPakai > sisaStok) {
										syams_validation(`#jmlpakai${no_r}${index}`, 'Sisa stok tidak cukup! sisa stok : ' + $(`#sisa-stok${no_r}${index}`).val());
									} else {
										syams_validation_remove(`#jmlpakai${no_r}${index}`);
									}

									$(element).find(usedAmount).val(roundToTwo(jumlahPakai));
									$(element).find(salePrice).html(money_format(hargaJual));
								} else {
									$(element).find(usedAmount).val(0);
									$(element).find(salePrice).html(0.00);
								}
							});

						totalHargaBarang()
					});
				});

				try {
					var warning = hasil['status']['warning'];
					$('#res-resep-ranap').html(notification(hasil));
				} catch (e) {
					console.log(e)
				}
			},
			complete: function() {
				hideLoader();
				totalHargaBarang();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}
</script>