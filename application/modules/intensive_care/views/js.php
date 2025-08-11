<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script type="text/javascript">
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	var JENIS_LAYANAN = '<?= $jenis ?>';
	var GROUP = '<?= $group ?>';

	$(function() {
		$('#jenis-rawat').val('Rawat Inap');
		$("#wizard-form").bwizard();
		getListPemeriksaan(1);

		$('#dokter-search-icare').select2({
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
			location.href = '<?= base_url('intensive_care/export_data_intensive_care?') ?>' + $('#form-search').serialize() + '&bangsal=' + $('#bangsal-search').val() + '&status_pasien_icare=' + $('#status_pasien_icare').val();
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

		$('#status_pasien_icare').change(function() {
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
				$('#s2id_dokter_diagnosa a .select2c-chosen, #s2id_operator a .select2c-chosen, #dokter-detail, #s2id_dokter_rujuk a .select2-chosen, #s2id_dokter_rujuk_rad a .select2-chosen, #s2id_dokter-icare a .select2-chosen, #s2id_dokter-diagnosa a .select2-chosen').html(data.nama);
				$('#operator, #id-dokter-detail, #dokter_rujuk, #dokter_rujuk_rad, #dokter-icare, #dokter-diagnosa').val(data.id);
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
						jenis: 1, //$('#profesi').val()
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
				$('#s2id_dokter_diagnosa a .select2c-chosen, #s2id_operator a .select2c-chosen, #dokter-detail, #s2id_dokter_rujuk a .select2-chosen, #s2id_dokter_rujuk_rad a .select2-chosen, #s2id_dokter-icare a .select2-chosen, #s2id_dokter-diagnosa a .select2-chosen').html(data.nama);
				$('#operator, #id-dokter-detail, #dokter_rujuk, #dokter_rujuk_rad, #dokter-icare, #dokter-diagnosa').val(data.id);
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

		
		$('#btn-upload-file-icare').click(function() {
			uploadFileRM($('#id-pendaftaran-pasien').val(), $('#id-layanan').val(), $('#id-pasien').val());
		})
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
			url: '<?= base_url("intensive_care/api/intensive_care/get_list_intensive_care") ?>/page/' + page,
			data: $('#form-search').serialize() + '&bangsal=' + $('#bangsal-search').val() + '&status_pasien_icare=' + $('#status_pasien_icare').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListPemeriksaan(page - 1);
					return false;
				}

				$('#icare-pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#icare-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data-icare tbody').empty();


				$.each(data.data, function(i, v) {
					let disabled = '';
					let disabledCancel = '';
					let disabledDischarge = '';
					let status_resep = '';
					let status = '';
					let disable_cco_smtr = '';
					let disable_cco_smtr_it = '';
					let disable_cco_smtr_btl = '';


					let bed = v.bangsal + ' No. Bed ' + v.no_bed;
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

						disabled = 'disabled';
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
					if (v.konfirmasi_icare != 'Ya') {
						btnKonfirmasi = '<button type="button" title="Konfirmasi pasien masuk ruangan" class="btn btn-secondary btn-xs mr-1" onclick="konfirmasiIntensiveCare(' + v.id_intensive_care + ',' + v.id_bangsal + ')" ' + (v.status_terlayani == 'Batal' ? 'disabled' : '') + '><i class="fas fa-fw fa-check-circle mr-1"></i>Konfirmasi</button>';
						if (idAccountGroup == '1') {
							btnKonfirmasi += '<button type="button" title="Pembatalan Intensive Care" class="btn btn-danger btn-xs" onclick="pembatalanIntensiveCare(' + v.id + ')" ' + (v.status_terlayani == 'Batal' ? 'disabled' : '') + '><i class="fas fa-fw fa-trash-alt mr-1"></i>Batal</button>';
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
								disable_cco_smtr = 'disabled';
								disable_cco_smtr_it = 'disabled';
								if (v.tindak_lanjut_sementara !== '') {
									disable_cco_smtr_btl = '';
								} else {
									disable_cco_smtr_btl = 'disabled';
								}
							} else {
								disabled = 'disabled';
								disable_cco_smtr = '';
								disable_cco_smtr_btl = 'disabled';
							}
						}
					}

					let layananBefore = '';
					if (v.before.jenis_layanan !== 'Poliklinik') {
						layananBefore = v.before.jenis_layanan;
					} else {
						layananBefore = 'Poliklinik ' + v.before.spesialisasi;
					}

					let disable_viewonly = '';
					if ((accountGroup === 'Komite Keperawatan')) { //READ ONLY
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

					let detail = v.id + '#' + v.id_pasien + '#' + v.nama + '#' + v.dokter + '#' + v.id_dokter + '#' + hitungUmur(v.tanggal_lahir) + '#' + v.jenis_layanan + '#' + v.id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#icare';
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
								<td class="center v-center">${v.no_register}</td>
								<td class="center v-center">${((v.waktu_konfirmasi_icare !== null) ? datetimefmysql(v.waktu_konfirmasi_icare) : '')}</td>
								<td class="center v-center">${((v.waktu_keluar !== null) ? datetimefmysql(v.waktu_keluar) : '')}</td>
								<td class="v-center">${v.id_pasien}</td>
								<td class="nowrap v-center">${v.nama}</td>
								<td class="v-center">${bed}</td>
								<td class="v-center">${(v.dokter)}</td>
								<td class="center v-center">${((v.cara_bayar !== null) ? v.cara_bayar : '-')}</td>
								<td class="center v-center">${statusResep}</td>
								<td class="center v-center">${((v.tindak_lanjut !== null) ? v.tindak_lanjut : '-')}</td>
								<td class="right v-center ${noWrap}">
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

						$('#table-data-icare tbody').append(html);

					} else {

						let html = /* html */ `
							<tr class="${activeStyle}">
								<td class="center">${no}</td>
								<td class="center v-center">${v.no_register}</td>
								<td class="center v-center">${((v.waktu_konfirmasi_icare !== null) ? datetimefmysql(v.waktu_konfirmasi_icare) : '')}</td>
								<td class="center v-center">${((v.waktu_keluar !== null) ? datetimefmysql(v.waktu_keluar) : '')}</td>
								<td class="v-center">${v.id_pasien}</td>
								<td class="nowrap v-center">${v.nama}</td>
								<td class="v-center">${bed}</td>
								<td class="v-center">${(v.dokter)}</td>
								<td class="center v-center">${((v.cara_bayar !== null) ? v.cara_bayar : '-')}</td>
								<td class="center v-center">${statusResep}</td>
								<td class="center v-center">${tindakLanjut}</td>
								<td class="right v-center ${noWrap}">
									${btnKonfirmasi}
									<div style="${groupAction}">
										<button ${disabled_resep} ${disable_viewonly} type="button" class="btn btn-secondary btn-xs mr-1" title="Klik untuk input resep" onclick="inputResep('${detail}')">
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

												${accountGroup === 'Admin' | accountGroup === 'Admin Rawat Inap' ?
													'<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriEdukasi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Edukasi Pasien</a>'
													: '<a class="dropdown-item ' + disabled + ' btn-xs" href="javascript:void(0)" onclick="entriEdukasi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Edukasi Pasien</a>'
												}

												${accountGroup === 'Admin' | accountGroup === 'Admin Rawat Inap' ?
													'<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="riwayatGizi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-eye mr-1"></i>Riwayat Gizi</a>'
													: '<a class="dropdown-item ' + disabled + ' btn-xs" href="javascript:void(0)" onclick="riwayatGizi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-eye mr-1"></i>Riwayat Gizi</a>'
												}

												${v.tindak_lanjut === 'Pulang APS' ? '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratAPS(' + v.id_pendaftaran + ',' + v.id + ', ' + v.id_intensive_care + ')"><i class="fas fa-fw fa-file-medical-alt mr-1"></i>Buat Surat Pulang APS</a>' : ''}
												${v.waktu_keluar !== null ? '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratKontrol(' + v.id_pendaftaran + ', ' + v.id + ')"><i class="fas fa-fw fa-file-medical-alt mr-1"></i>Buat Surat Kontrol</a>' : ''}
												${v.tindak_lanjut === 'RS Lain' ? '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratRujukan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-file-medical-alt mr-1"></i>Buat Surat Rujukan</a>' : ''}
												${'<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="settingPerlakuanKhusus(\'' + v.id_pasien + '\')"><i class="fas fa-fw fa-thumbtack mr-1"></i>Set Perlakuan Khusus</a>'}

												${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="uploadFileRM(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.id_pasien + '\')"><i class="fas fa-upload m-r-5"></i> Upload File Rekam Medis</a>'}
												
												${'<a class="dropdown-item ' + disabled + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut(' + v.id_pendaftaran + ',' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter + '\')"><i class="fas fa-fw fa-arrow-circle-right mr-1"></i>Status Keluar</a>'}
												${'<a class="dropdown-item ' + disabledDischarge + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="dischargeBed(' + v.id_intensive_care + ')"><i class="fas fa-fw fa-unlink mr-1"></i>Kosongkan Bed</a>'}
												${'<a class="dropdown-item waves-effect waves-light btn-xs mypopover" href="javascript:void(0)" data-container="body" data-toggle="popover" data-placement="left" data-title="Asal Pasien Masuk" data-content="' + layananBefore + '"><i class="fas fa-fw fa-address-book mr-1"></i>Asal Pasien Masuk</a>'}

												${accountGroup === 'Admin' | accountGroup === 'Kepala Instalasi Intensive Care' | accountGroup === 'Kepala Ruangan Intensive Care' | accountGroup === 'Admin Rekam Medis' | accountGroup === 'Dokter Spesialis RM' | accountGroup === 'Admin Pelayanan Medik' | accountGroup === 'Dokter Spesialis RM Rehab' ?
													'<a class="dropdown-item ' + disabledCancel + ' btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluarIcare(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-times-circle mr-1"></i>Pembatalan Status Keluar</a>' +
													'<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="pembatalanIntensiveCare(' + v.id + ')" ' + (v.status_terlayani == 'Batal' ? 'disabled' : '') + '><i class="fas fa-fw fa-trash-alt mr-1"></i>Pembatalan Intensive Care</a>' : ''
												}
												${accountGroup === 'Admin' ?
													'<a class="dropdown-item ' + disable_cco_smtr_it + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementaraIt(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>status keluar sementara Billing</a>'
													: ''
												}
												${accountGroup === 'Kepala Instalasi Intensive Care' | accountGroup === 'Kepala Ruangan Intensive Care' | accountGroup === 'Admin Rekam Medis' | accountGroup === 'Dokter Spesialis RM' | accountGroup === 'Admin Pelayanan Medik' | accountGroup === 'Dokter Spesialis RM Rehab' ?
													'<a class="dropdown-item ' + disable_cco_smtr + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara</a>'
													: ''
												}
												${accountGroup === 'Admin' | accountGroup === 'Kepala Instalasi Intensive Care' | accountGroup === 'Kepala Ruangan Intensive Care' | accountGroup === 'Admin Rekam Medis' | accountGroup === 'Dokter Spesialis RM' | accountGroup === 'Admin Pelayanan Medik' | accountGroup === 'Dokter Spesialis RM Rehab'  | accountGroup === 'Dokter Umum' | accountGroup === 'Dokter Spesialis'?
													'<a class="dropdown-item ' + disable_cco_smtr_btl + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar Sementara</a>'
													: ''
												}
											</div>
										</div>
									</div>
								</td>
							</tr>
						`;

						$('#table-data-icare tbody').append(html);
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

	function paging(page, tab) {
		if (tab === 1) {
			getListPemeriksaan(page);
		} else if (tab === 2) {
			getListHistoryResep(page, $('#id-resep-history').val())
		}
	}


	// CPPRI IC WH
	function cetakFormIntensiveCare(details, id_pendaftaran, id_layanan_pendaftaran, bed) {
		idPendaftaran = id_pendaftaran;
		idLayananPendaftaran = id_layanan_pendaftaran;
		$('#modal_cetak_form_intensive_care').modal('show');
		$('#modal_cetak_form_intensive_care_label').html('Cetak Form Intensive Care');
		// IC WH
		//$('#btn_checklist_penerimaan_pasien_rawat_inap').click(function () {
		//	cetakChecklistPenerimaanPasienRawatInap(details);

		//});
	}


	// HEMODIALISA
	function addHemodialisisIcare() {
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
	function addDPMPIcare() {

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
		$('#table-order-hemodialisis tbody').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_data_hemodialisis") ?>/id_daftar/' + id_pendaftaran + '/jenis/Hemodialisa',
			dataType: 'JSON',
			success: function(data) {
				$('#table-order-hemodialisis tbody').empty();
				if (data !== undefined) {
					$.each(data.data, function(i, v) {

						let status = '';
						let button = '';
						if (v.status === 'Belum') {
							status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Order</em>';
							button = '<button title="Hapus Order Hemodialisis" type="button" class="btn btn-secondary btn-xs" onclick="HapusHemodialIcare(' + v.id + ', ' + id_pendaftaran + '  )"><i class="fas fa-trash-alt"></i></button>';
						} else if (v.status === 'Batal') {
							status = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
						} else {
							status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Diperiksa</span></h5>';
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
							status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Order</em>';
							button = '<button title="Batal Order DPMP" type="button" class="btn btn-secondary btn-xs" onclick="BatalDPMPIcare(' + v.od_id + ', ' + id_pendaftaran + ',' + id_layanan + ')"><i class="fas fa-trash-alt"></i></button>';
						} else if (v.status === 'Batal') {
							status = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
						} else if (v.status === 'Konfirm') {
							status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';
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

	function BatalDPMPIcare(id, id_pendaftaran, id_layanan) {
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
									customAlert('Batal Order DPMP Intensive Care', data.pesan);
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

	function HapusHemodialIcare(id, id_pendaftaran) {
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
							url: '<?= base_url("pelayanan/api/pelayanan/hapus_order_hemodialisa") ?>/' + id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status === true) {
									messageCustom(data.message, 'Success');
									let ini = '8';
									detailPemeriksaan(ini, id_pendaftaran, id);
								} else {
									customAlert('Hapus Order Hemodialisis Intensive Care', data.message);
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

	function pembatalanIntensiveCare(id_layanan_pendaftaran) {
		swal.fire({
			title: 'Pembatalan Intensive Care',
			html: "Apakah anda yakin ingin membatalkan pasien intensive care ini ?",
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
					url: '<?= base_url("intensive_care/api/intensive_care/pembatalan_intensive_care") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom('Berhasil melakukan pembatalan intensive care', 'Success');
						} else {
							messageCustom('Gagal melakukan pembatalan intensive care', 'Error');
						}

						getListPemeriksaan($('#page_now').val());
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan pembatalan intensive care', 'Error');
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
				$('input[name=csrf_syam]').val('<?= $this->security->get_csrf_hash() ?>');
				if (data.metadata.code == "1") {
					swalCustom('success', 'Berhasil', data.metadata.message);
				} else {
					swalCustom('error', 'Gagal update ketersediaan bed', data.metadata.message);
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				swalCustom("error", "Koneksi Bermasalah", "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi IT BPJS");
			}
		});
	}

	function konfirmasiIntensiveCare(id_intensive_care, id_bangsal) {
		swal.fire({
			title: 'Konfirmasi Masuk Ruangan Intensive Care',
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
					url: '<?= base_url("intensive_care/api/intensive_care/konfirmasi_masuk_intensive_care") ?>',
					data: {
						id_intensive_care: id_intensive_care
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
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				let umur = '';
				let kelamin = '';
				let pasien = data.pasien;
				let layanan = data.layanan;
				let anamnesa = data.anamnesa[0];

				if (pasien !== null) {
					$('.form-anamnesa button[data-target="#anamnesa"]').attr('data-target', '#anamnesa')
					$('button[title="tambah diagnosa"]').off('click').attr('onclick', 'addDiagnosaIcare()')
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
						$('.form-anamnesa button[data-target="#anamnesa"]').removeAttr('data-target')
					} else {
						$('button[title="Tambah Tindakan"]').off('click').attr('onclick', 'addTindakan()')
						$('button[title="tambah bhp"]').off('click').attr('onclick', 'addBHP(); return false;')
						$('button[title="order pemeriksaan lab"]').off('click').attr('onclick', 'request_lab()')
						$('button[title="order pemeriksaan rad"]').off('click').attr('onclick', 'request_rad()')
						$('button[title="tambah order hd"]').off('click').attr('onclick', 'addHemodialisisIcare()')
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
					$('#alamat-detail').html(pasien.alamat);
					$('#alergi-detail').html(pasien.alergi);
					$('#alergi').val(pasien.alergi);

					// TAMBAHAN WSH
					// $('#logo-pasien-alergi').attr('title', pasien.alergi);
					// $('#alergi-coba').html(pasien.alergi); GUNAKAN NNTI KETIKA DATA ALERGI HARUS MUNCUL BUKAN CUMA MUNCUL KETIKA DISOROT
					$('#logo-pasien-alergi').attr('title', '‼️ A L E R G I ‼️\n→' + pasien.alergi + '');


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
				$('#layanan-detail').html(layanan.bangsal_ic + ' No. Bed ' + layanan.no_bed_ic);

				let waktuKeluar = 'Sekarang';
				let waktuMasuk = datetimefmysql(layanan.waktu_konfirmasi_icare);
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

				let cara_bayar = layanan.cara_bayar + ' ' + ((layanan.id_penjamin !== null) ? '(' + layanan.penjamin + ')' : '');
				$('#cara-bayar-detail').html(cara_bayar);
				$('#cara-bayar-hemodialisis').val(layanan.cara_bayar);
				$('#no-polish-hemodialisis').val(layanan.no_polish);
				$('#no-sep-hemodialisis').val(layanan.no_sep);
				$('#no-polish-detail').html(layanan.no_polish);
				$('#no-sep-detail').html(layanan.no_sep);
				if (data.penjamin_pasien) {
					$('#kelas-rawat-pasien').html(data.penjamin_pasien.hak_kelas || '');
				}

				$('#identitas-pasien-anamnesa, #identitas-pasien-darah, #identitas-pasien-soap, #identitas-pasien-diagnosa, #identitas-pasien-tindakan, #identitas-pasien-bhp, #identitas-pasien-pkrt').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

				let status_perawat = '<?= $this->session->userdata('profesi_nadis') ?>';


				if (status_perawat === 'Perawat' && layanan.dokter === '' && layanan.id_dokter === null) {


					$('#dokter').val(layanan.id_dokter_dpjp_ic);
					$('#s2id_dokter a .select2c-chosen').html(layanan.dokter_dpjp_ic);
					$('#operator').val(layanan.id_dokter);
					$('#s2id_operator a .select2c-chosen').html(layanan.dokter);
					$('#dokter-diagnosa').val(layanan.id_dokter);
					$('#s2id_dokter-diagnosa a .select2c-chosen').html(layanan.dokter);

				} else if (status_perawat === 'Perawat' && layanan.dokter !== '' && layanan.id_dokter !== null) {

					$('#dokter').val(layanan.id_dokter);
					$('#s2id_dokter a .select2c-chosen').html(layanan.dokter);
					$('#operator').val();
					$('#s2id_operator a .select2c-chosen').html();
					$('#dokter-diagnosa').val();
					$('#s2id_dokter-diagnosa a .select2c-chosen').html();

				} else if (status_perawat !== 'Perawat' && layanan.dokter === '' && layanan.id_dokter === null) {
					$('#dokter').val(layanan.id_dokter_dpjp_ic);
					$('#s2id_dokter a .select2c-chosen').html(layanan.dokter_dpjp_ic);
					$('#operator').val(layanan.id_dokter_dpjp_ic);
					$('#s2id_operator a .select2c-chosen').html(layanan.dokter_dpjp_ic);
					$('#dokter-diagnosa').val(layanan.id_dokter_dpjp_ic);
					$('#s2id_dokter-diagnosa a .select2c-chosen').html(layanan.dokter_dpjp_ic);
				} else {
					$('#dokter').val(layanan.id_dokter);
					$('#s2id_dokter a .select2c-chosen').html(layanan.dokter);
					$('#operator').val(layanan.id_dokter);
					$('#s2id_operator a .select2c-chosen').html(layanan.dokter);
					$('#dokter-diagnosa').val(layanan.id_dokter);
					$('#s2id_dokter-diagnosa a .select2c-chosen').html(layanan.dokter);
				}


				// anamnesa
				if (typeof anamnesa !== 'undefined' && typeof anamnesa !== null) {
					showAnamnesa(anamnesa);
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
				let status_profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
				if (status_profesi === 'Perawat') {

					$('#profesi').val(18);

				} else {

					$('#profesi').val(8);

				}

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
							onclick="formEditBed(${isAdmin ? null : layanan.id_bangsal_ic})"
					><i class="fas fa-edit mr-1"></i>Edit Bed
					</button>
				`);

				$('#modal-pemeriksaan').modal('show');
				$('#modal-pemeriksaan-label').html('Form Pemeriksaan Intensive Care');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {

			}
		});
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

	// CPPRI IC WH  
	/*function cetakChecklistPenerimaanPasienRawatInap(details) {
	let detail = details.split('#');
		// console.log(details); 
		$.ajax({
			type: 'GET',
			url: '<?= base_url('intensive_care/api/intensive_care/check_checklist_penerimaan_pasien_rawat_inap') ?>/id/' +
				detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader();
			},
			success: function (data) {
				// Reset all values first
				resetModalChecklistPenerimaanPasienRawatInap();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-checklist-penerimaan-pasien-rawat-inap-title').html(
					`<b>Form Checklist Penerimaan Pasien Rawat Inap</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);
				$('#id-layanan-pendaftaran-cpri').val(detail[0]);
				$('#nama-keluarga-cpri').val(data.nama_keluarga);

				if (data.is_pasien == 1) {
					document.getElementById("is-pasien-cpri-ya").checked = true;
				} else if (data.is_pasien == 0) {
					document.getElementById("is-pasien-cpri-tidak").checked = true;
				}

				if (data.perawat_yang_merawat == 1) {
					document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-ya").checked =
						true;
				} else if (data.perawat_yang_merawat == 0) {
					document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-tidak").checked =
						true;
				}

				if (data.dokter_yang_merawat == 1) {
					document.getElementById("informasi-tentang-dokter-yang-merawat-ya").checked = true;
				} else if (data.dokter_yang_merawat == 0) {
					document.getElementById("informasi-tentang-dokter-yang-merawat-tidak").checked = true;
				}

				if (data.nurse_station == 1) {
					document.getElementById("nurse-station-ya").checked = true;
				} else if (data.nurse_station == 0) {
					document.getElementById("nurse-station-tidak").checked = true;
				}

				if (data.kamar_mandi_pasien == 1) {
					document.getElementById("kamar-mandi-pasien-ya").checked = true;
				} else if (data.kamar_mandi_pasien == 0) {
					document.getElementById("kamar-mandi-pasien-tidak").checked = true;
				}

				if (data.bel_pasien == 1) {
					document.getElementById("bel-di-kamar-mandi-ya").checked = true;
				} else if (data.bel_pasien == 0) {
					document.getElementById("bel-di-kamar-mandi-tidak").checked = true;
				}

				if (data.tempat_tidur_pasien == 1) {
					document.getElementById("tempat-tidur-pasien-ya").checked = true;
				} else if (data.tempat_tidur_pasien == 0) {
					document.getElementById("tempat-tidur-pasien-tidak").checked = true;
				}

				if (data.remote == 1) {
					document.getElementById("remote-tv-ac-ya").checked = true;
				} else if (data.remote == 0) {
					document.getElementById("remote-tv-ac-tidak").checked = true;
				}

				if (data.tempat_ibadah == 1) {
					document.getElementById("tempat-ibadah-ya").checked = true;
				} else if (data.tempat_ibadah == 0) {
					document.getElementById("tempat-ibadah-tidak").checked = true;
				}

				if (data.tempat_sampah == 1) {
					document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-ya").checked = true;
				} else if (data.tempat_sampah == 0) {
					document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-tidak").checked = true;
				}

				if (data.jadwal_pembagian == 1) {
					document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-ya").checked = true;
				} else if (data.jadwal_pembagian == 0) {
					document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-tidak").checked = true;
				}

				if (data.jadwal_visit == 1) {
					document.getElementById("jadwal-visit-dokter-ya").checked = true;
				} else if (data.jadwal_visit == 0) {
					document.getElementById("jadwal-visit-dokter-tidak").checked = true;
				}

				if (data.jadwal_jam_berkunjung == 1) {
					document.getElementById("jadwal-jam-berkunjung-ya").checked = true;
				} else if (data.jadwal_jam_berkunjung == 0) {
					document.getElementById("jadwal-jam-berkunjung-tidak").checked = true;
				}

				if (data.jadwal_ganti_linen == 1) {
					document.getElementById("jadwal-ganti-linen-ya").checked = true;
				} else if (data.jadwal_ganti_linen == 0) {
					document.getElementById("jadwal-ganti-linen-tidak").checked = true;
				}

				if (data.membawa_barang_sesuai_keperluan == 1) {
					document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-ya")
						.checked = true;
				} else if (data.membawa_barang_sesuai_keperluan == 0) {
					document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-tidak")
						.checked = true;
				}

				if (data.mematuhi_peraturan == 1) {
					document.getElementById(
						"perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-ya")
						.checked = true;
				} else if (data.mematuhi_peraturan == 0) {
					document.getElementById(
						"perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-tidak")
						.checked = true;
				}

				if (data.tidak_duduk_ditempat_tidur == 1) {
					document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-ya").checked = true;
				} else if (data.tidak_duduk_ditempat_tidur == 0) {
					document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-tidak").checked = true;
				}

				if (data.menyimpan_barang_berharga == 1) {
					document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-ya").checked = true;
				} else if (data.menyimpan_barang_berharga == 0) {
					document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-tidak").checked =
						true;
				}

				if (data.dapat_kartu_penunggu == 1) {
					document.getElementById("mendapat-kartu-penunggu-ya").checked = true;
				} else if (data.dapat_kartu_penunggu == 0) {
					document.getElementById("mendapat-kartu-penunggu-tidak").checked = true;
				}

				if (data.menghargai_privasi_pasien == 1) {
					document.getElementById("untuk-selalu-menghargai-privasi-pasien-ya").checked = true;
				} else if (data.menghargai_privasi_pasien == 0) {
					document.getElementById("untuk-selalu-menghargai-privasi-pasien-tidak").checked = true;
				}

				if (data.gelang == 1) {
					document.getElementById("pemasangan-dan-fungsi-gelang-ya").checked = true;
				} else if (data.gelang == 0) {
					document.getElementById("pemasangan-dan-fungsi-gelang-tidak").checked = true;
				}

				if (data.cuci_tangan == 1) {
					document.getElementById("cara-cuci-tangan-ya").checked = true;
				} else if (data.cuci_tangan == 0) {
					document.getElementById("cara-cuci-tangan-tidak").checked = true;
				}

				$('#modal_checklist_penerimaan_pasien_rawat_inap').modal('show');
			},
			complete: function () {
				hideLoader();
			},
			error: function (e) {
				accessFailed(e.status);
			}
		});
	}*/




	// CPPRI IC WH  
	/*function resetModalChecklistPenerimaanPasienRawatInap() {
		// Undisabled fields
		$("#nama-keluarga-cpri").prop("disabled", false);
		// Set default fields
		$('#nama-keluarga-cpri').val('');
		$('#id-layanan-pendaftaran-cpri').val('');
		// Unchecked fields
		document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-ya").checked = false;
		document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-tidak").checked = false;
		document.getElementById("is-pasien-cpri-ya").checked = false;
		document.getElementById("is-pasien-cpri-tidak").checked = false;
		document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-ya").checked = false;
		document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-tidak").checked = false;
		document.getElementById("informasi-tentang-dokter-yang-merawat-ya").checked = false;
		document.getElementById("informasi-tentang-dokter-yang-merawat-tidak").checked = false;
		document.getElementById("nurse-station-ya").checked = false;
		document.getElementById("nurse-station-tidak").checked = false;
		document.getElementById("kamar-mandi-pasien-ya").checked = false;
		document.getElementById("kamar-mandi-pasien-tidak").checked = false;
		document.getElementById("bel-di-kamar-mandi-ya").checked = false;
		document.getElementById("bel-di-kamar-mandi-tidak").checked = false;
		document.getElementById("tempat-tidur-pasien-ya").checked = false;
		document.getElementById("tempat-tidur-pasien-tidak").checked = false;
		document.getElementById("remote-tv-ac-ya").checked = false;
		document.getElementById("remote-tv-ac-tidak").checked = false;
		document.getElementById("tempat-ibadah-ya").checked = false;
		document.getElementById("tempat-ibadah-tidak").checked = false;
		document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-ya").checked = false;
		document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-tidak").checked = false;
		document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-ya").checked = false;
		document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-tidak").checked = false;
		document.getElementById("jadwal-visit-dokter-ya").checked = false;
		document.getElementById("jadwal-visit-dokter-tidak").checked = false;
		document.getElementById("jadwal-jam-berkunjung-ya").checked = false;
		document.getElementById("jadwal-jam-berkunjung-tidak").checked = false;
		document.getElementById("jadwal-ganti-linen-ya").checked = false;
		document.getElementById("jadwal-ganti-linen-tidak").checked = false;
		document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-ya").checked = false;
		document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-tidak").checked = false;
		document.getElementById("perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-ya").checked = false;
		document.getElementById("perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-tidak").checked = false;
		document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-ya").checked = false;
		document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-tidak").checked = false;
		document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-ya").checked = false;
		document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-tidak").checked = false;
		document.getElementById("mendapat-kartu-penunggu-ya").checked = false;
		document.getElementById("mendapat-kartu-penunggu-tidak").checked = false;
		document.getElementById("untuk-selalu-menghargai-privasi-pasien-ya").checked = false;
		document.getElementById("untuk-selalu-menghargai-privasi-pasien-tidak").checked = false;
		document.getElementById("pemasangan-dan-fungsi-gelang-ya").checked = false;
		document.getElementById("pemasangan-dan-fungsi-gelang-tidak").checked = false;
		document.getElementById("cara-cuci-tangan-ya").checked = false;
		document.getElementById("cara-cuci-tangan-tidak").checked = false;
	}*/




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
			text: "Apakah anda yakin akan melakukan entri pemeriksaan Intensive Care ?",
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
			url: '<?= base_url("pelayanan/api/pelayanan/simpan_pemeriksaan_icare") ?>',
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
					getListPemeriksaan($('#page_now').val());
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

	function formEditBed(id_bangsal) {
		$('#title-form-bed').text('Edit Bed');
		$('.no-rm-icare-label').text($('#no-rm-detail').html());
		$('.nama-icare-label').text($('#nama-detail').html());
		$('.kelamin-icare-label').text($('#kelamin-detail').html());
		$('.layanan-icare-label').text($('#layanan-detail').html());
		$('.cara-bayar-icare-label').text($('#cara-bayar-detail').html());

		getListBangsal(id_bangsal)

		$('#modal-bed-icare').modal('show');
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
		let gender = $('.kelamin-icare-label').text();
		let kelamin = 'L';
		if (gender === 'Perempuan') {
			kelamin = 'P';
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_intensive_care/api/order_intensive_care/update_bed_pasien") ?>',
			data: 'id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&id_bed=' + id_bed,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-pemeriksaan').modal('hide');
				$('#modal-bed-icare').modal('hide');
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

	function dischargeBed(id_intensive_care) {
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
					url: '<?= base_url("intensive_care/api/intensive_care/reset_status_bed") ?>/id_intensive_care/' + id_intensive_care,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom('Berhasil mengkosongkan status bed', 'Success');
						} else {
							messageCustom('Gagal mengkosongkan status bed, selesaikan dulu administrasi RS', 'Error');
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

	function formTataTertibIntensiveCare() {
		$('#modal-tata-tertib-icare').modal('show');
	}

	function printTataTertibIntensiveCare() {
		let id_layanan_pendaftaran = $('#id-layanan').val();
		let id_pendaftaran = $('#id-pendaftaran-pasien').val();
		let nama_penjamin = $('#nama-penjamin').val();
		let no_identitas_penjamin = $('#no-identitas-penjamin').val();
		let alamat_penjamin = $('#alamat-penjamin').val();
		let telp_penjamin = $('#telp-penjamin').val();

		window.open('<?php echo base_url() ?>intensive_care/printing_tata_tertib_intensive_care/' + id_pendaftaran + '/' + id_layanan_pendaftaran + '?nama_penjamin=' + nama_penjamin + '&no_identitas_penjamin=' + no_identitas_penjamin + '&alamat_penjamin=' + alamat_penjamin + '&telp_penjamin=' + telp_penjamin, 'Cetak Form Tata Tertib Intensive Care', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function addDiagnosaIcare() {
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
</script>