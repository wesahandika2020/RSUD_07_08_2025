<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
	$(function() {
		let noPolishBPJS = '';

		getListDataKunjunganPasien(1);
		$("#wizard-form").bwizard();
		$('#code-diagnosa-asterik').select2("enable", false);

		// btn search data
		$('#btn-search').click(function() {
			$('#modal-search').modal('show');
		});

		$('#btn-close-pengkodean').click(function() {
			getListDataKunjunganPasien($('#page-now-kunjungan-pasien').val());
			getListLayananPasien(1, $('#id-pendaftaran').val())
			$('#modal-pengkodean').modal('hide');
		});

		// datepicker
		$("#tgl-masuk-awal, #tgl-masuk-akhir, #tgl-keluar-awal, #tgl-keluar-akhir").datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date()
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		// $('#tanggal-awal, #tanggal-akhir').datepicker({
		//     format: 'dd/mm/yyyy'
		// }).on('changeDate', function(){
		//     $(this).datepicker('hide')
		// })

		$('#btn-resume-medis').click(function() {
			if ($('#jenis-rawat').val() == 'Inap') {
				cetakResumeMedisRawatInap($('#id-layanan-pendaftaran').val(), $('#id-pendaftaran').val());
			} else if ($('#jenis-rawat').val() == 'Inap') {
				cetakResumeMedisIntensivecare($('#id-layanan-pendaftaran').val(), $('#id-pendaftaran').val());
			} else {
				cetakResumeMedisRawatJalan($('#id-layanan-pendaftaran').val(), $('#id-pendaftaran').val());
			}
		});

		// Filter Tindakan
		$('#filter_tindakan').change(function() {
			getListDataTindakan(1, $('#id-layanan-pendaftaran').val(), $('#id-spesialis').val(), $('#id-konsul').val(), $('#filter_tindakan').val());
		});

		// select option in coding diagnosa
		$('#code-diagnosa').select2({
			ajax: {
				url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd_auto') ?>",
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
				var kode_icdx = (data.kode_icdx_rinci !== null || data.kode_icdx_rinci !== '') ? (data.kode_icdx_rinci + ' - ') : '';

				var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/><i>' + data.nama_idn + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				$('#code-diagnosa').val(data.id);
				$('#jenis-kode-diagnosa').val(data.jenis_kode);

				if (data.jenis_kode === 'dagger') {
					$('#code-diagnosa-asterik').select2("enable", true);
				} else {
					$('#code-diagnosa-asterik').select2("enable", false);
				}

				return data.kode_icdx_rinci + ' | ' + data.nama;
			}
		});

		$('#code-diagnosa-asterik').select2({
			ajax: {
				url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd_asterik_auto') ?>",
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
				var kode_icdx = (data.kode_icdx_rinci !== null || data.kode_icdx_rinci !== '') ? (data.kode_icdx_rinci + ' - ') : '';

				var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/><i>' + data.nama_idn + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				$('#code-diagnosa-asterik').val(data.id);
				return data.kode_icdx_rinci + ' | ' + data.nama;
			}
		});

		// select option in coding tindakan
		$('#code-tindakan').select2({
			ajax: {
				url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd9_auto') ?>",
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
				var markup = '<b>' + data.icd9 + '</b> <br/>' + data.nama;
				return markup;
			},
			formatSelection: function(data) {
				$('#code-tindakan').val(data.id);
				return data.icd9;
			}
		});

		$('#golongan-sebab-sakit').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
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
				var kode_icdx = (data.kode_icdx !== null) ? (data.kode_icdx + ' | ') : '';

				var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/>';
				return markup;
			},
			formatSelection: function(data) {
				return data.kode_icdx_rinci + ' | ' + data.nama;
			}
		});

		$('#no_sep_eclaim').on('click keyup', function() {
			syams_validation_remove('#no_sep_eclaim');
		});

		$('#nomor_kartu').on('click keyup', function() {
			syams_validation_remove('#nomor_kartu');
		});
	});

	function getListDataKunjunganPasien(page) {
		$('#page-now-kunjungan-pasien').val(page);

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_list_pengkodean_icd_x") ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-search').modal('hide');

				if ((page - 1) & (data.data.length === 0)) {
					getListDataKunjunganPasien(page - 1);
					return false;
				}

				$('#paginationKunjunganPasien').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summaryKunjunganPasien').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data-kunjungan-pasien tbody').empty();

				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let fontColor = '';
					$('#id-pendaftaran').val(v.id);
					$('#id-layanan-pendaftaran').val(v.id_layanan);
					$('#jenis-rawat').val(v.jenis_rawat);

					if (v.sudah_diagnosa + v.sudah_tindakan == 0) { //belum
						fontColor = 'color:red';
						status_koding = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
					} else if ((v.sudah_diagnosa + v.sudah_tindakan) == (v.total_diagnosa + v.total_tindakan)) { //sudah
						fontColor = 'color:green';
						status_koding = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
					} else if ((v.sudah_diagnosa + v.sudah_tindakan) != 0 && (v.sudah_diagnosa + v.sudah_tindakan) != (v.total_diagnosa + v.total_tindakan)) { //beberapa
						fontColor = 'color:blue';
						status_koding = '<h5><span class="label label-info"><i class="fas fa-fw fa-plus m-r-5"></i>Beberapa</span></h5>';
					}

					// if (v.status_terlayani === 'Belum') {
					// 		status = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
					// 	} else if (v.status_terlayani === 'Batal') {
					// 		status = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
					// 	} else {
					// 		status = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
					// 	}

					if (v.tanggal_keluar === null) {
						disableEklaim = 'disabled';
						titleEklaim = 'Tidak Bisa, Pasien Belum Checkout';
					} else if (v.sudah_diagnosa + v.sudah_tindakan == 0) {
						disableEklaim = 'disabled';
						titleEklaim = 'Tidak Bisa, Pasien Belum Checkout';
					} else {
						disableEklaim = '';
						titleEklaim = 'Klik untuk konfirmasi e-Klaim';
					}

					let html = /* html */ `
						<tr class="" style="${fontColor}" >
							<td class="center v-center">${no}</td>
							<td class="center v-center">${datetimefmysql(v.tanggal_daftar)}</td>
							<td class="center v-center">${((v.id_pasien))}</td>
							<td class="left   v-center">${((v.nama_pasien))}</td>
							<td class="center v-center">${((v.nama_penjamin !== null) ? v.nama_penjamin : '')}</td>
							<td class="center v-center">${((v.jenis_pendaftaran))} ${((v.nama_spesialisasi !== null) ? v.nama_spesialisasi : '')}</td>
							<td class="center v-center">${((v.tanggal_keluar !== null) ? v.tanggal_keluar : '')}</td>	
							<td class="center v-center">${status_koding}</td>	
							<td class="center v-center">${((v.sudah_diagnosa !== '') ? v.sudah_diagnosa+'/'+v.total_diagnosa : '0')}</td>
							<td class="center v-center">${((v.sudah_tindakan !== '') ? v.sudah_tindakan+'/'+v.total_tindakan : '0')}</td>
							<td class="center v-center"><button type="button" title="Klik untuk melihat layanan pasien" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="getListLayananPasien(1, ${v.id})"><i class="fas fa-fw fa-arrow-circle-right"></i></button></td>"		
							${((v.status_klaim === null ? 
								`<td class="center v-center"><button type="button" ` + disableEklaim + ` title="` + titleEklaim + `" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="entrieClaim(${v.id_layanan} , ${v.id} , ${v.no_polish}, '${v.jenis_rawat}')"><i class="fas fa-donate"></i></button></td>` :
								`<td class="center v-center"><button type="button" ` + disableEklaim + ` title="Klik untuk update data e-Klaim" class="btn waves-effect waves-light btn-success btn-xs" onclick="entrieClaim(${v.id_layanan} , ${v.id} , ${v.no_polish}, '${v.jenis_rawat}')"><i class="fas fa-donate"></i></button></td>`)
								)}

						</tr>
					`;

					// $('body').on("click", "table tr", function() {
					// 	$(this).siblings().css('background','#ffffff');
					// 	$(this).css('background','#E7E7E7');   
					// });

					//<td class="center v-center">${((v.jenis_pendaftaran))} ${((v.nama_spesialisasi !== null) ? v.nama_spesialisasi : '')}</td>	
					$('#table-data-kunjungan-pasien tbody').append(html);


				});

				// if (data.data.length !== 0) {
				// 	getListLayananPasien(page, data.data[0].id);
				// }
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
		switch (tab) {
			case 1:
				getListDataKunjunganPasien(page);
				break;

			case 2:
				getListLayananPasien(page, '');
				break;
			case 3:
				getListDataDiagnosa(page, $('#id-layanan-pendaftaran-form-diagnosa').val());
				break;
			case 4:
				getListDataTindakan(page, $('#id-layanan-pendaftaran').val(), $('#id-spesialis').val(), $('#id-konsul').val(), '');
				break;
			default:

				break;
		}
	}

	function getListLayananPasien(page, id) {
		$('#page-now-layanan-pasien').val(page);

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_list_layanan_pasien") ?>/page/' + page + '/id_pendaftaran/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				// if ((page - 1) & (data.data.length === 0)) {
				// 	getListLayananPasien(page - 1, id);
				// 	return false;
				// }

				// $('#paginationLayananPasien').html(pagination(data.jumlah, data.limit, data.page, 2));
				// $('#summaryLayananPasien').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data-pelayanan-pasien tbody').empty();

				let no_pasien = '';
				let no_ok = '';
				let no_ra = '';
				let noakhir = 0;
				let nomor = '';

				$.each(data.hasil, function(ihasil, vhasil) {

					$.each(vhasil, function(i, v) {
						let fontColor = '';
						let status_koding = '';
						let nomor = noakhir;

						$('#id-pendaftaran').val(v.id_pendaftaran);
						$('#id-layanan-pendaftaran').val(v.id);

						if (v.total_diagnosa == v.sudah_diagnosa && v.total_tindakan == v.sudah_tindakan) {
							fontColor = 'color:green';
							status_koding = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Sudah</span></h5>';
						} else {
							fontColor = 'color:red';
							status_koding = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
						}

						if (v.status_terlayani === 'Belum') {
							status = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
						} else if (v.status_terlayani === 'Batal') {
							status = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
						} else {
							status = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
						}

						if (v.tindak_lanjut === null) {
							tindak_lanjut = 'BELUM CHECKOUT';
							disableTindakLanjut = 'disabled';
							titleTindakLanjut = 'Tidak Bisa Koding, Pasien Belum Checkout';
						} else if (v.tindak_lanjut === undefined) {
							tindak_lanjut = '-';
							disableTindakLanjut = '';
							titleTindakLanjut = 'Klik untuk melakukan koding';
						} else {
							tindak_lanjut = v.tindak_lanjut;
							disableTindakLanjut = '';
							titleTindakLanjut = 'Klik untuk melakukan koding';
						}

						let html = /* html */ `
							<tr class="" style="${fontColor}">
								<td class="center v-center">${nomor+1}</td>
								<td class="center v-center">${datetimefmysql(v.tanggal_layanan)}</td>
								<td class="center v-center">${v.id_pasien}</td>
								<td class="center v-center">${v.nama_pasien}</td>
								<td class="center v-center">${v.jenis_layanan} ${((v.spesialisasi !== null) ? v.spesialisasi : '')}</td>
								<td class="center v-center">${v.nama_dokter}</td>
								<td class="center v-center">${v.asal_rawat}</td>
								<td class="center v-center">${status}</td>
								<td class="center v-center">${tindak_lanjut}</td>
								<td class="center v-center">${status_koding}</td>
								<td class="center v-center">${((v.sudah_diagnosa !== '') ? v.sudah_diagnosa+'/'+v.total_diagnosa : '0')}</td>
								<td class="center v-center">${((v.sudah_tindakan !== '') ? v.sudah_tindakan+'/'+v.total_tindakan : '0')}</td>
								<td class="center v-center"><button type="button" ` + disableTindakLanjut + ` title="` + titleTindakLanjut + `" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="pengkodean(${v.id}, ${v.id_pendaftaran}, ${v.id_spesialisasi}, '')"><i class="fas fa-edit"></i></button></td>
							</tr>
						`;

						$('#table-data-pelayanan-pasien tbody').append(html);
						noakhir = nomor + 1;

					});




				});

				//  ${v.id_pasien}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function pengkodean(idLayananPendaftaran, idPendaftaran, id_spesialisasi, id_konsul) {
		$('#wizard-form').bwizard('show', '0');

		// alert(idLayananPendaftaran+'='+idPendaftaran+'='+id_spesialisasi+'='+id_konsul);
		$('#data-diagnosa').empty();
		if ((id_spesialisasi != '40' && id_spesialisasi != '41' && id_spesialisasi != '38' && id_spesialisasi != '39')) {
			getListDataDiagnosa(1, idLayananPendaftaran);
		}
		$('#id-layanan-pendaftaran').val(idLayananPendaftaran);
		$('#id-pendaftaran').val(idPendaftaran);
		$('#id-spesialis').val(id_spesialisasi);
		$('#id-konsul').val(id_konsul);

		getFilterTindakan(1, idLayananPendaftaran, id_spesialisasi, id_konsul);
		getListDataTindakan(1, idLayananPendaftaran, id_spesialisasi, id_konsul, '');
		getDetailLayananPendaftaran(idLayananPendaftaran, id_spesialisasi);

		$('#modal-pengkodean').modal('show');
		$('#modal-pengkodean-label').html('Form Pengkodean');
	}

	function entrieClaim(id_layanan, id, no_kartu, jenis_rawat) {
		resetFormEklaim();
		$('#wizard-form').bwizard('show', '0');
		$('#id-layanan-pendaftaran-eclaim').val(id_layanan);
		$('#id-pendaftaran-eclaim').val(id);
		syams_validation_remove('#nomor_kartu, #no_sep_eclaim');

		if (no_kartu !== null) {
			getPesertaByPolish(no_kartu);
			getDetailLayananPendaftaranEclaim(id_layanan, id, no_kartu, jenis_rawat);
			swalCustom('info', "Pastikan Koding Diagnosa dan Tindakan Sudah Sesuai!");
			$('#modal-eclaim').modal('show');
			$('#modal-eclaim-label').html('Form Penginputan Data Eclaim');
		} else {

			swal.fire({
				title: 'Konfirmasi',
				html: 'Nomor Peserta BPJS Kosong!',
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: '<i class="fas fa-pencil-alt mr-2"></i> ' + 'Input No. BPJS',
				cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
				reverseButtons: true,
				allowOutsideClick: false
			}).then((result) => {
				if (result.value) {
					inputNoBPJS(id, id_layanan)

				}
			});
			// swalCustom('error', "Nomor Peserta BPJS Kosong!");
		}


	}

	function pad(str, max) {
		str = str.toString();
		return str.length < max ? pad("0" + str, max) : str;
	}

	function getPesertaByPolish(no_kartu) {

		noPolishBPJS = pad(no_kartu, 13);
		// alert(noPolishBPJS + '/' + no_kartu );

		$.ajax({
			type: 'GET',
			url: '<?= base_url(URL_VCLAIM . "get_peserta") ?>/nokartu/' + noPolishBPJS,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data !== null) {
					if (data.metaData.code === "200") {
						if (data.response !== null) {
							$('#hak_eclaim').val((data.response.peserta.hakKelas.keterangan = null ? '-' : data.response.peserta.hakKelas.keterangan));
						}
					} else {
						swalCustom('info', "Pencarian Peserta BPJS", data.metaData.message);
					}
				} else {
					swalCustom('error', "Koneksi Bermasalah", "Aplikasi tidak dapat terhubung dengan server BPJS. Silahkan hubungi pihak BPJS");
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

	function resetFormEklaim() {
		$('#hak_eclaim').val('');
		$('#button-footer').html('');
	}

	function getDetailLayananPendaftaran(id, spesialisasi) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_detail_layanan") ?>/id_layanan_pendaftaran/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				// Set the html of element
				$('#tanggal-pelayanan').html(datetimefmysql(data.tanggal_layanan));
				$('#nama-pasien').html(data.nama_pasien + ' / ' + data.kelamin + ' / ' + hitungUmur(data.tanggal_lahir));
				$('#no-rm').html(data.id_pasien);

				if (spesialisasi == '40') {
					$('#tempat-pelayanan').html('OK');
				} else if (spesialisasi == '41') {
					$('#tempat-pelayanan').html('Radiologi');
				} else if (spesialisasi == '38') {
					$('#tempat-pelayanan').html('Patologi Klinik');
				} else if (spesialisasi == '39') {
					$('#tempat-pelayanan').html('Patologi Anatomi');
				} else {
					$('#tempat-pelayanan').html(data.jenis_layanan + ' ' + ((data.spesialisasi !== null) ? data.spesialisasi : '') +
						' ' + ((data.bangsal !== null) ? '- ' + data.bangsal + ' ruang ' + data.no_ruang + ' no bed ' + data.no_bed : ''));
				}


				$('#id-dokter').val(data.id_dokter);
				$('#dokter').html(data.nama_dokter);
				$('#asal-kunjungan').html(data.asal_rawat);
				$('#id-pasien').val(data.id_pasien);
				$('#id-layanan-pendaftaran').val(id);
				$('#no-ktp-pasien').val(data.no_identitas);
				$('#jenis-rawat').val(data.jenis_rawat);

				getListHistoryResep(1, data.id_pasien);
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function getDetailLayananPendaftaranEclaim(id_layanan, id, no_kartu, jenis_rawat) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Eklaim/get_detail_layanan_eclaim") ?>/id_layanan_pendaftaran/' + id_layanan + '/id/' + id + '/nokartu/' + no_kartu + '/jenis_rawat/' + jenis_rawat,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},

			success: function(data) {

				if (data.eclaim.status_klaim == null) {
					html = /* html */ `
						<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
						<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanEklaim()"><i class="fas fa-save"></i> Simpan</button>
					`;
					$('#button-footer').append(html);
				} else {
					html = /* html */ `
						<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
						<button type="button" class="btn btn-info waves-effect" title="Data Sudah diklaim" disabled><i class="fas fa-save"></i> Sudah di Klaim</button>
						<button type="button" class="btn btn-dark waves-effect" onclick="konfirmasiSimpanEklaim()"><i class="fas fa-save"></i> Update</button>
					`;
					$('#button-footer').append(html);
				}

				// Set the html of element
				$('#id-pasien-eclaim').val(data.pendaftaran.id_pasien);
				$('#id-dokter-eclaim').val(data.pendaftaran.id_dokter);
				$('#id-layanan-pendaftaran-eclaim').val(data.eclaim.id);
				$('#id-pendaftaran-eclaim').val(data.eclaim.id_pendaftaran);
				$('#no-ktp-pasien-eclaim').val(data.pendaftaran.no_identitas);
				$('#jenis-pendaftaran-eclaim').html(data.pendaftaran.jenis_layanan);

				if (data.eclaim.gender == '1') {
					$('#jk_eclaim').val('Laki-laki');
				} else {
					$('#jk_eclaim').val('Perempuan');
				}

				$('#tanggal-pelayanan-eclaim').html(datetimefmysql(data.eclaim.tgl_masuk));
				$('#nama-pasien-eclaim').html(data.pendaftaran.nama_pasien + ' / ' + data.pendaftaran.kelamin + ' / ' + hitungUmur(data.pendaftaran.tanggal_lahir));
				$('#no-rm-eclaim').html(data.pendaftaran.id_pasien);
				$('#tanggal-keluar-eclaim').html(datetimefmysql(data.eclaim.tgl_pulang));
				$('#dokter_eclaim').val(data.eclaim.nama_dokter);

				$('#cara_bayar').val(data.eclaim.nama_penjamin);
				$('#no_rm_eclaim').val(data.pendaftaran.id_pasien);
				// $('#jk_eclaim').val(data.pendaftaran.kelamin);

				$('#pelayanan_eclaim').val(data.eclaim.jenis_rawat);
				if (data.eclaim.jenis_rawat == '1') {
					$('#jenis_rawat_eclaim').val('Rawat Inap');
				} else {
					$('#jenis_rawat_eclaim').val('Rawat Jalan');
				}

				if (data.eclaim.tindak_lanjut == 'Atas Izin Dokter') {
					let discharge_status = 1;
				} else if (data.eclaim.tindak_lanjut == 'RS Lain') {
					let discharge_status = 2;
				} else if (data.eclaim.tindak_lanjut == 'Pulang APS') {
					let discharge_status = 3;
				} else if (data.eclaim.tindak_lanjut == 'Pemulasaran Jenazah') {
					let discharge_status = 4;
				} else {
					let discharge_status = 5;
				}

				var jenis_tarif = 'TARIF RS KELAS C PEMERINTAH',
					kode_tarif = 'CP';

				var selisihMenit = data.eclaim.selisih / 60,
					selisihJam = selisihMenit / 60,
					getMenit = selisihMenit - (selisihJam * 60);

				$('#tgl_lahir').val(data.eclaim.tgl_lahir);
				$('#icu_los').val(data.eclaim.icu_los);

				// $('#los_eclaim').val(data.eclaim.total_hari + ' hari');
				$('#dokter-eclaim').html(data.eclaim.nama_dokter);
				$('#adl_eclaim').val();
				$('#nomor_kartu').val(data.eclaim.nomor_kartu);
				$('#nama_pasien').val(data.eclaim.nama_pasien);
				$('#kelas_rawat').val(data.eclaim.kelas_rawat);
				$('#cara_pulang_eclaim').val(data.eclaim.tindak_lanjut);
				$('#sub_active_eclaim').val();
				$('#no_sep_eclaim').val(data.eclaim.nomor_sep);
				$('#usia_eclaim').val(hitungUmur(data.pendaftaran.tanggal_lahir));
				$('#tgl_pulang').val(data.eclaim.tgl_pulang);
				// $('#hak_eclaim').val();
				$('#berat_lahir_eclaim').val((data.eclaim.berat_badan_lahir == null ? "0" : data.eclaim.berat_badan_lahir * 1000));
				$('#jenis_tarif_eclaim').val('TARIF RS KELAS C PEMERINTAH');
				$('#chronic_eclaim').val();

				let TarifRad = (data.eclaim.tarif_radiologi !== null ? parseInt(data.eclaim.tarif_radiologi) : 0);
				let TarifLab = (data.eclaim.tarif_laboratorium !== null ? parseInt(data.eclaim.tarif_laboratorium) : 0);
				let TarifKamar = (data.eclaim.tarif_kamar !== null ? parseInt(data.eclaim.tarif_kamar) : 0);
				let TarifAkomodasi = (data.eclaim.tarif_akomodasi !== null ? parseInt(data.eclaim.tarif_akomodasi) : 0);
				let TarifICare = (data.eclaim.tarif_intensive_care !== null ? parseInt(data.eclaim.tarif_intensive_care) : 0);
				let TarifDarah = (data.eclaim.tarif_pelayanan_darah !== null ? parseInt(data.eclaim.tarif_pelayanan_darah) : 0);
				let TarifHemo = (data.eclaim.tarif_hemodialisa !== null ? parseInt(data.eclaim.tarif_hemodialisa) : 0);
				let TarifKonsul = (data.eclaim.tarif_konsultasi !== null ? parseInt(data.eclaim.tarif_konsultasi) : 0);
				let TarifKeperawatan = (data.eclaim.tarif_keperawatan !== null ? parseInt(data.eclaim.tarif_keperawatan) : 0);
				let TarifTenagaAhli = (data.eclaim.tarif_tenaga_ahli !== null ? parseInt(data.eclaim.tarif_tenaga_ahli) : 0);
				let TarifRehab = (data.eclaim.tarif_rehabilitas !== null ? parseInt(data.eclaim.tarif_rehabilitas) : 0);
				let TarifNonBedah = (data.eclaim.tarif_non_bedah_vk !== null ? parseInt(data.eclaim.tarif_non_bedah_vk) : 0);
				let TarifBedah = (data.eclaim.tarif_bedah_ok !== null ? parseInt(data.eclaim.tarif_bedah_ok) : 0);
				let TarifObat = (data.eclaim.tarif_obat !== null ? parseInt(data.eclaim.tarif_obat) : 0);
				let TarifBHP = (data.eclaim.tarif_bhp !== null ? parseInt(data.eclaim.tarif_bhp) : 0);
				let TarifKronis = (data.eclaim.tarif_obat_kronis !== null ? parseInt(data.eclaim.tarif_obat_kronis) : 0);
				let TarifKemoterapi = (data.eclaim.tarif_obat_kemoterapi !== null ? parseInt(data.eclaim.tarif_obat_kemoterapi) : 0);
				let TarifAlkes = (data.eclaim.tarif_alkes !== null ? parseInt(data.eclaim.tarif_alkes) : 0);
				let TarifSewaAlat = (data.eclaim.tarif_sewa_alat !== null ? parseInt(data.eclaim.tarif_sewa_alat) : 0);
				let TarifAkomdasiRanap = TarifKamar;
				let TarifKeperawatandanAkomodasi = TarifKeperawatan + TarifAkomodasi;

				if ($('#jenis-rawat').val() == 'Inap') {

					if (data.eclaim.waktu_icu !== null) {
						$('#label-los').html('ICU LOS');
						$('#los_eclaim').val(data.eclaim.selisih_hari + ' hari');
						$('#tgl-rawat').html('Tanggal Rawat ICU');
						$('#tanggal_rawat_eclaim').val(data.eclaim.tgl_masuk);
					} else {
						$('#label-los').html('LOS');
						$('#los_eclaim').val(data.eclaim.selisih_hari + ' hari');
						$('#tgl-rawat').html('Tanggal Rawat');
						$('#tanggal_rawat_eclaim').val(data.eclaim.tgl_masuk);
					}

					// $('#los_eclaim').val(data.eclaim.total_hari + ' hari');
					// $('#tanggal_rawat_eclaim').val(data.eclaim.waktu_ranap);
					$('#waktu_eclaim').val(data.eclaim.selisih_waktu);
					$('#kamar_eclaim').val(number_format(TarifAkomdasiRanap, 0, ',', '.'));
					let total_tarif = TarifSewaAlat + TarifAlkes + TarifKemoterapi + TarifKronis + TarifBHP + TarifObat + TarifLab + TarifRad + TarifKamar + TarifAkomodasi + TarifICare + TarifDarah + TarifHemo + TarifKonsul + TarifKeperawatan + TarifTenagaAhli + TarifRehab + TarifNonBedah + TarifBedah;
					$('#tarif_rs_eclaim').html(`<i><h3>Rp. ` + number_format(total_tarif, 0, ',', '.') + `, -</h3></i>`);
				} else {
					$('#los_eclaim').val('1 hari');
					$('#waktu_eclaim').val('(00:00) jam');
					$('#tanggal_rawat_eclaim').val(data.eclaim.tgl_masuk);
					// $('#kamar_eclaim').val(number_format(TarifAkomodasi, 0, ',', '.'));
					$('#kamar_eclaim').val(0);
					let total_tarif = TarifSewaAlat + TarifAlkes + TarifKemoterapi + TarifKronis + TarifBHP + TarifObat + TarifLab + TarifRad + TarifAkomodasi + TarifICare + TarifDarah + TarifHemo + TarifKonsul + TarifKeperawatan + TarifTenagaAhli + TarifRehab + TarifNonBedah + TarifBedah;
					$('#tarif_rs_eclaim').html(`<i><h3>Rp. ` + number_format(total_tarif, 0, ',', '.') + `, -</h3></i>`);
				}

				$('#non_bedah_eclaim').val(number_format(TarifNonBedah, 0, ',', '.'));
				$('#radiologi_eclaim').val(number_format(TarifRad, 0, ',', '.'));
				$('#rehabilitas_eclaim').val(number_format(TarifRehab, 0, ',', '.'));
				$('#obat_eclaim').val(number_format(TarifObat, 0, ',', '.'));
				$('#prosedur_bedah_eclaim').val(number_format(TarifBedah, 0, ',', '.'));
				$('#keperawatan_eclaim').val(number_format(TarifKeperawatandanAkomodasi, 0, ',', '.'));
				$('#lab_eclaim').val(number_format(TarifLab, 0, ',', '.'));
				$('#konsultasi_eclaim').val(number_format(TarifKonsul, 0, ',', '.'));
				$('#penunjang_eclaim').val(number_format(TarifHemo, 0, ',', '.'));
				$('#darah_eclaim').val(number_format(TarifDarah, 0, ',', '.'));
				$('#intensif_eclaim').val(number_format(TarifICare, 0, ',', '.'));

				$('#tenaga_ahli_eclaim').val(number_format(TarifTenagaAhli, 0, ',', '.'));
				$('#alkes_eclaim').val(number_format(TarifAlkes, 0, ',', '.'));
				$('#obat_kronis_eclaim').val(number_format(TarifKronis, 0, ',', '.'));
				$('#bhp_eclaim').val(number_format(TarifBHP, 0, ',', '.'));
				$('#obat_kemo_eclaim').val(number_format(TarifKemoterapi, 0, ',', '.'));
				$('#sewa_alat_eclaim').val(number_format(TarifSewaAlat, 0, ',', '.'));

				$('#kode-diagnosa').html(data?.diagnosa_utama?.map(diag => `${diag.code}`)?.join('<br>') + data?.diagnosa_sekunder?.map(diag => `<br>${diag.code}`)?.join(''));
				$('#diagnosa-utama').html(data?.diagnosa_utama?.map(diag => `${diag.nama}<i> (Utama)</i>`)?.join('<br>') + data?.diagnosa_sekunder?.map(diag => `<br>${diag.nama}`)?.join(''));

				$('#kode-prosedur-tindakan').html(data?.prosedur_tindakan?.map(diag => `${diag.code}`)?.join('<br>') + data?.tindakan_ok?.map(diag => `<br>${diag.code}`)?.join('') + data?.tindakan_lab?.map(diag => `<br>${diag.code}`)?.join('') + data?.tindakan_rad?.map(diag => `<br>${diag.code}`)?.join(''));
				$('#prosedur-tindakan').html(data?.prosedur_tindakan?.map(diag => `${diag.nama}`)?.join('<br>') + data?.tindakan_ok?.map(diag => `<br>${diag.nama}`)?.join('') + data?.tindakan_lab?.map(diag => `<br>${diag.nama}`)?.join('') + data?.tindakan_rad?.map(diag => `<br>${diag.nama}`)?.join(''));

				$('#procedure').val((data?.prosedur_tindakan?.map(diag => `${diag.code}`)?.join('#')) + (data.tindakan_ok == null ? '' : data?.tindakan_ok?.map(diag => `#${diag.code}`)?.join('')) + (data.tindakan_lab == null ? '' : data?.tindakan_lab?.map(diag => `#${diag.code}`)?.join('')) + (data.tindakan_rad == null ? '' : data?.tindakan_rad?.map(diag => `#${diag.code}`)?.join('')));
				// $('#diagnosa').val(data?.diagnosa_utama?.map(diag => `${diag.code}`)?.join('#') + data?.diagnosa_sekunder?.map(diag => `#${diag.code}`)?.join(''));
				let lisDiagnosa = data?.diagnosa_utama?.map(diag => `${diag.code}`)?.join('#') + data?.diagnosa_sekunder?.map(diag => `#${diag.code}`)?.join('');
				let resultDiagnosa = lisDiagnosa.replace("+. ", "#").replace("*", "");
				$('#diagnosa').val(resultDiagnosa);

				// getListHistoryResepEclaim(1, data.pendaftaran.id_pasien);
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	// Function for getting value for the Diagnosa table
	function getListDataDiagnosa(page, id) {
		$('#page-diagnosa').val(page);
		$('#id-layanan-pendaftaran-form-diagnosa').val(id)

		// Set empty html in #data-diagnosa
		$('#data-diagnosa').empty();

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_list_diagnosa") ?>/page/' + page + '/id_layanan_pendaftaran/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				//Condition when data is null
				if ((page - 1) & (data.data.length === 0)) {
					getListDataDiagnosa(page - 1, id);
					return false;
				}

				// Make first div with row class
				var divRow = document.createElement('div');

				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					// Set the row class
					divRow.setAttribute("class", "row");

					// Make div with col-lg-6
					var divChild1 = document.createElement('div');
					divChild1.setAttribute("class", "col-lg-5");
					var divChild2 = document.createElement('div');
					divChild2.setAttribute("class", "col-lg-7");

					// Make table element
					var table1 = document.createElement('table');
					table1.setAttribute("class", "table table-sm table-striped");

					let row0 = table1.insertRow(0); // Make <tr>
					let cell01 = row0.insertCell(0); // Make <td>
					let cell02 = row0.insertCell(1);
					cell01.setAttribute("class", "bold"); // Set class
					cell01.setAttribute("width", "30%"); // Set width
					cell02.setAttribute("width", "70%");
					cell01.setAttribute("style", "background-color: #45B1FF");
					cell02.setAttribute("style", "background-color: #45B1FF");
					cell01.innerHTML = "Nomor"; // Set the Html 
					cell02.innerHTML = ": <span>" + no + "</span>";


					let row1 = table1.insertRow(1); // Make <tr>
					let cell11 = row1.insertCell(0); // Make <td>
					let cell12 = row1.insertCell(1);
					cell11.setAttribute("class", "bold"); // Set class
					cell11.setAttribute("width", "30%"); // Set width
					cell12.setAttribute("width", "70%");
					cell11.innerHTML = "Tanggal"; // Set the Html
					cell12.innerHTML = ": <span>" + datetimefmysql(v.waktu) + "</span>";

					let row2 = table1.insertRow(2);
					let cell21 = row2.insertCell(0);
					let cell22 = row2.insertCell(1);
					cell21.setAttribute("class", "bold");
					cell21.setAttribute("width", "30%");
					cell22.setAttribute("width", "70%");
					cell21.innerHTML = "Diagnosa";
					cell22.innerHTML = ": <span>" + ((v.diagnosa !== null) ? v.diagnosa : '') + "</span>";

					let row3 = table1.insertRow(3);
					let cell31 = row3.insertCell(0);
					let cell32 = row3.insertCell(1);
					cell31.setAttribute("class", "bold");
					cell31.setAttribute("width", "30%");
					cell32.setAttribute("width", "70%");
					cell31.innerHTML = "ICD-10[RM]";
					cell32.innerHTML = ": <span>" + ((v.kode_icdx_rinci !== null) ? v.kode_icdx_rinci : '') + ' ' + ((v.kode_icdx_rinci_asterik !== null) ? v.kode_icdx_rinci_asterik : '') + "</span> <button type='button' class='btn btn-secondary btn-xxs' onclick='codingDiagnosa(" + v.id + ", " + v.id_pengkodean + ", " + v.id_layanan_pendaftaran + ")'><i class='fas fa-edit m-r-5'></i>Edit ICD-10[RM]</button>";

					let row4 = table1.insertRow(4);
					let cell41 = row4.insertCell(0);
					let cell42 = row4.insertCell(1);
					cell41.setAttribute("class", "bold");
					cell41.setAttribute("width", "30%");
					cell42.setAttribute("width", "70%");
					cell41.innerHTML = "Jenis Kasus";
					cell42.innerHTML = ": <span>" + ((v.jenis_kasus !== null) ? v.jenis_kasus : '') + "</span> <button type='button' class='btn btn-secondary btn-xxs' onclick='editJenisKasus(" + v.id + ", " + v.id_layanan_pendaftaran + ")'><i class='fas fa-edit m-r-5'></i>Edit Jenis Kasus</button>";

					let row5 = table1.insertRow(5);
					let cell51 = row5.insertCell(0);
					let cell52 = row5.insertCell(1);
					cell51.setAttribute("class", "bold");
					cell51.setAttribute("width", "30%");
					cell52.setAttribute("width", "70%");
					cell51.innerHTML = "Dokter";
					cell52.innerHTML = ": <span>" + v.dokter + "</span>";

					let row6 = table1.insertRow(6);
					let cell61 = row6.insertCell(0);
					let cell62 = row6.insertCell(1);
					cell61.setAttribute("class", "bold");
					cell61.setAttribute("width", "30%");
					cell62.setAttribute("width", "70%");
					cell61.innerHTML = "Coder";
					cell62.innerHTML = ": <span>" + ((v.coder !== null) ? v.coder : '') + "</span>";

					let row7 = table1.insertRow(7);
					let cell71 = row7.insertCell(0);
					let cell72 = row7.insertCell(1);
					cell71.setAttribute("class", "bold");
					cell71.setAttribute("width", "30%");
					cell72.setAttribute("width", "70%");
					cell71.innerHTML = "Prioritas";
					cell72.innerHTML = ": <span>" + v.prioritas + "</span>";

					let row8 = table1.insertRow(8);
					let cell81 = row8.insertCell(0);
					let cell82 = row8.insertCell(1);
					cell81.setAttribute("class", "bold");
					cell81.setAttribute("width", "30%");
					cell82.setAttribute("width", "70%");
					cell81.innerHTML = "Akhir";
					cell82.innerHTML = ": <span>" + v.diagnosa_akhir + "</span>";


					// Go to function for diagnosa coding history table
					getListPengkodeanDiagnosaHistory(v.id, divChild2, 1);

					divChild1.append(table1); // Add diagnosa table to div col-lg-6
					divRow.append(divChild1); // Add div col-lg-6 to div row
					divRow.append(divChild2);
				});

				// Make element for pagination

				var rowPagination = document.createElement('div'); // First element
				rowPagination.setAttribute("class", "row");

				var colPagination = document.createElement('div'); // Second element
				colPagination.setAttribute("class", "col");

				var paginationDiv = document.createElement('div'); // Pagination div
				paginationDiv.setAttribute("class", "float-left");
				paginationDiv.setAttribute("id", "pagination-diagnosa-form");

				var summary = document.createElement('div'); // Summary div
				summary.setAttribute("class", "float-right text-sm");
				summary.setAttribute("id", "summary-diagnosa-form");

				paginationDiv.innerHTML = (pagination(data.jumlah, data.limit, data.page, 3)); // Set pagination library
				summary.innerHTML = (page_summary(data.jumlah, data.data.length, data.limit, data.page)); // Set summary library

				colPagination.appendChild(paginationDiv); // Add div pagination to second element
				colPagination.appendChild(summary); // Add div summary to second element
				rowPagination.append(colPagination); // Add second element to first element

				divRow.append(rowPagination); // Add all pagination element
				$("#data-diagnosa").append(divRow); // Show all element that already built to #data-diagnosa
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function getFilterTindakan(page, id, spesialisasi, id_konsul) {

		$.ajax({
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_filter_tindakan") ?>/page/' + page + '/id_layanan_pendaftaran/' + id + '/spesialisasi/' + spesialisasi + '/id_konsul/' + id_konsul,
			type: 'GET',
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				let html = '';
				html += '<option value=""><b>Semua Tindakan</b></option>';
				$.each(data.data, function(i, v) {
					html += '<option value="' + v.nama_tindakan + '"><b>' + v.nama_tindakan + '</b></option>';
				});

				$('#filter_tindakan').html(html);
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	// Function for getting value for the Tindakan table
	function getListDataTindakan(page, id, spesialisasi, id_konsul, filterTindakan) {
		$('#page-tindakan').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_list_tindakan") ?>/page/' + page + '/id_layanan_pendaftaran/' + id + '/spesialisasi/' + spesialisasi + '/id_konsul/' + id_konsul,
			data: 'filterTindakan=' + filterTindakan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				//Condition when data is null
				if ((page - 1) & (data.data.length === 0)) {
					getListDataDiagnosa(page - 1, id);
					return false;
				}

				// Set empty html in #data-tindakan
				$('#data-tindakan').empty();

				// Make first div with row class
				var divRow = document.createElement('div');

				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));

					// Set the row class
					divRow.setAttribute("class", "row");

					// Make div with col-lg-6
					var divChild1 = document.createElement('div');
					divChild1.setAttribute("class", "col-lg-5");
					var divChild2 = document.createElement('div');
					divChild2.setAttribute("class", "col-lg-7");

					// Make table element
					var table1 = document.createElement('table');
					table1.setAttribute("class", "table table-sm table-striped");

					let row0 = table1.insertRow(0); // Make <tr>
					let cell01 = row0.insertCell(0); // Make <td>
					let cell02 = row0.insertCell(1);
					cell01.setAttribute("class", "bold"); // Set class
					cell01.setAttribute("width", "30%"); // Set width
					cell02.setAttribute("width", "70%");
					cell01.setAttribute("style", "background-color: #45B1FF");
					cell02.setAttribute("style", "background-color: #45B1FF");
					cell01.innerHTML = "Nomor"; // Set the Html 
					cell02.innerHTML = ": <span>" + no + "</span>";

					let row1 = table1.insertRow(1); // Make <tr>
					let cell11 = row1.insertCell(0); // Make <td>
					let cell12 = row1.insertCell(1);
					cell11.setAttribute("class", "bold"); // Set class
					cell11.setAttribute("width", "30%"); // Set width
					cell12.setAttribute("width", "70%");
					cell11.innerHTML = "Tanggal"; // Set the Html
					cell12.innerHTML = ": <span>" + datetimefmysql(v.tanggal) + "</span>";

					let row2 = table1.insertRow(2);
					let cell21 = row2.insertCell(0);
					let cell22 = row2.insertCell(1);
					cell21.setAttribute("class", "bold");
					cell21.setAttribute("width", "30%");
					cell22.setAttribute("width", "70%");
					cell21.innerHTML = "Tindakan";
					cell22.innerHTML = ": <span>" + ((v.tindakan !== null) ? v.tindakan : '') + "</span>";

					let row3 = table1.insertRow(3);
					let cell31 = row3.insertCell(0);
					let cell32 = row3.insertCell(1);
					cell31.setAttribute("class", "bold");
					cell31.setAttribute("width", "30%");
					cell32.setAttribute("width", "70%");
					cell31.innerHTML = "Tindakan ICD-9";
					cell32.innerHTML = ": <span>" + ((v.tindakan_icd9 !== null) ? v.tindakan_icd9 : '') + "</span>";

					let row4 = table1.insertRow(4);
					let cell41 = row4.insertCell(0);
					let cell42 = row4.insertCell(1);
					cell41.setAttribute("class", "bold");
					cell41.setAttribute("width", "30%");
					cell42.setAttribute("width", "70%");
					cell41.innerHTML = "ICD-9CM";
					cell42.innerHTML = ": <span>" + ((v.icd9 !== null) ? v.icd9 : '') + "</span> <button type='button' class='btn btn-secondary btn-xxs' onclick='codingTindakan(" + v.id + ", " + v.id_pengkodean + ", " + v.id_layanan_pendaftaran + ", " + v.id_unit_layanan + ")'><i class='fas fa-edit m-r-5'></i>Edit ICD-9CM</button>";

					let row5 = table1.insertRow(5);
					let cell51 = row5.insertCell(0);
					let cell52 = row5.insertCell(1);
					cell51.setAttribute("class", "bold");
					cell51.setAttribute("width", "30%");
					cell52.setAttribute("width", "70%");
					cell51.innerHTML = "Kelas";
					cell52.innerHTML = ": <span>" + v.kelas + "</span>";

					let row6 = table1.insertRow(6);
					let cell61 = row6.insertCell(0);
					let cell62 = row6.insertCell(1);
					cell61.setAttribute("class", "bold");
					cell61.setAttribute("width", "30%");
					cell62.setAttribute("width", "70%");
					cell61.innerHTML = "Biaya";
					cell62.innerHTML = ": <span>" + v.biaya + "</span>";

					let row7 = table1.insertRow(7);
					let cell71 = row7.insertCell(0);
					let cell72 = row7.insertCell(1);
					cell71.setAttribute("class", "bold");
					cell71.setAttribute("width", "30%");
					cell72.setAttribute("width", "70%");
					cell71.innerHTML = "Dokter";
					cell72.innerHTML = ": <span>" + v.dokter + "</span>";

					let row8 = table1.insertRow(8);
					let cell81 = row8.insertCell(0);
					let cell82 = row8.insertCell(1);
					cell81.setAttribute("class", "bold");
					cell81.setAttribute("width", "30%");
					cell82.setAttribute("width", "70%");
					cell81.innerHTML = "Petugas Input";
					cell82.innerHTML = ": <span>" + ((v.coder !== null) ? v.coder : '') + "</span>";

					// Go to function for diagnosa coding history table
					getListPengkodeanTindakanHistory(v.id, divChild2, 1, spesialisasi, id_konsul);

					divChild1.append(table1); // Add diagnosa table to div col-lg-6
					divRow.append(divChild1); // Add div col-lg-6 to div row
					divRow.append(divChild2);
				});

				// Make element for pagination

				var rowPagination = document.createElement('div'); // First element
				rowPagination.setAttribute("class", "row");

				var colPagination = document.createElement('div'); // Second element
				colPagination.setAttribute("class", "col");

				var paginationDiv = document.createElement('div'); // Pagination div
				paginationDiv.setAttribute("class", "float-left");
				paginationDiv.setAttribute("id", "pagination-diagnosa");

				var summary = document.createElement('div'); // Summary div
				summary.setAttribute("class", "float-right text-sm");
				summary.setAttribute("id", "summary-diagnosa");

				paginationDiv.innerHTML = (pagination(data.jumlah, data.limit, data.page, 4)); // Set pagination library
				summary.innerHTML = (page_summary(data.jumlah, data.data.length, data.limit, data.page)); // Set summary library

				colPagination.appendChild(paginationDiv); // Add div pagination to second element
				colPagination.appendChild(summary); // Add div summary to second element
				rowPagination.append(colPagination); // Add second element to first element

				divRow.append(rowPagination); // Add all pagination element
				$("#data-tindakan").append(divRow); // Show all element that already built to #data-tindakan
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	// Function for getting pengkodean diagnosa history
	function getListPengkodeanDiagnosaHistory(id, divChild2, page) {
		$('#page-diagnosa-history').val(page);

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_list_pengkodean_diagnosa_history") ?>/page/' + page + '/id_diagnosa/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				//Condition when data is null
				if ((page - 1) & (data.data.length === 0)) {
					getListPengkodeanDiagnosaHistory(id, divChild2, page - 1);
					return false;
				}

				// Make table element
				var table2 = document.createElement('table');
				table2.setAttribute("class", "table table-hover table-sm color-table info-table");

				var thead = table2.createTHead(); // Make Thead
				var trThead1 = thead.insertRow(0); // Make <tr>

				// Make <th> in <tr>
				var th0 = document.createElement("th");
				th0.setAttribute("class", "center");
				th0.setAttribute("colspan", "4");
				th0.innerHTML = "Histori Pengkodean Diagnosa";
				trThead1.appendChild(th0);

				var trThead2 = thead.insertRow(1);

				var th1 = document.createElement("th");
				th1.setAttribute("class", "center");
				th1.innerHTML = "Code After";
				trThead2.appendChild(th1);

				var th2 = document.createElement("th");
				th2.setAttribute("class", "center");
				th2.innerHTML = "Code Before";
				trThead2.appendChild(th2);

				var th3 = document.createElement("th");
				th3.setAttribute("class", "center");
				th3.innerHTML = "Coder";
				trThead2.appendChild(th3);

				var th4 = document.createElement("th");
				th4.setAttribute("class", "center");
				th4.innerHTML = "Updated On";
				trThead2.appendChild(th4);

				thead.appendChild(trThead1);
				thead.appendChild(trThead2);

				var tbody = table2.createTBody(); // Make <tbody>

				$.each(data.data, function(i, v) {

					var row = tbody.insertRow(0); // Make <tr> in <tbody>
					let cell1 = row.insertCell(0); // Make <td> in <tr>
					let cell2 = row.insertCell(1); // Make <td> in <tr>
					let cell3 = row.insertCell(2); // Make <td> in <tr>
					let cell4 = row.insertCell(3); // Make <td> in <tr>

					// Set Html in <td>
					cell1.innerHTML = v.code_after + "<br> (" + v.nama_code_after + ")";
					cell2.innerHTML = ((v.code_before == null) ? '' : v.code_before) + ((v.nama_code_before == null) ? '' : "<br> (" + v.nama_code_before + ")");
					cell3.innerHTML = v.coder;
					cell4.innerHTML = datetimefmysql(v.updated_on);

					// Set <td> style
					cell1.style.textAlign = "center";
					cell2.style.textAlign = "center";
					cell3.style.textAlign = "center";
					cell4.style.textAlign = "center";
				});

				// Make element for pagination

				// First element
				var rowPagination = document.createElement('div');
				rowPagination.setAttribute("class", "row");

				// Second element
				var colPagination = document.createElement('div');
				colPagination.setAttribute("class", "col");

				// Pagination div
				var paginationDiv = document.createElement('div');
				paginationDiv.setAttribute("class", "float-left");
				paginationDiv.setAttribute("id", "pagination-history-diagnosa");

				// Summary div
				var summary = document.createElement('div');
				summary.setAttribute("class", "float-right text-sm");
				summary.setAttribute("id", "summary-history-diagnosa");

				paginationDiv.innerHTML = (pagination(data.jumlah, data.limit, data.page, 1)); // Set pagination library
				summary.innerHTML = (page_summary(data.jumlah, data.data.length, data.limit, data.page)); // Set summary library

				colPagination.appendChild(paginationDiv); // Add div pagination to second element
				colPagination.appendChild(summary); // Add div summary to second element
				rowPagination.append(colPagination); // Add second element to first element

				divChild2.append(table2); // Add table element
				divChild2.append(rowPagination); // Add all pagination element

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	//Function for showing edit diagnosa modal
	function codingDiagnosa(id, id_pengkodean, idLayananPendaftaran) {
		$('#id-diagnosa').val(id);
		$('#id-golongan-sebab-before-diagnosa').val(id_pengkodean);
		$('#id-layanan-pendaftaran-coding-diagnosa').val(idLayananPendaftaran);
		$('#modal-koding-diagnosa').modal('show');
	}

	// Function for saving diagnosa code
	function simpanKodingDiagnosa() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/simpan_coding_diagnosa") ?>',
			data: $('#form-koding-diagnosa').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				// getListDataKunjunganPasien($('#page-now-kunjungan-pasien').val());
				if (data.status === true) {
					messageCustom(data.message, 'Success');
				} else {
					messageCustom(data.message, 'Error');
				}

				$('#modal-koding-diagnosa').modal('hide');
				getListDataDiagnosa($('#page-diagnosa').val(), $('#id-layanan-pendaftaran-coding-diagnosa').val());
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Koding Diagnosa Gagal Dilakukan', 'Error');
			},
		});
	}

	// Function for getting pengkodean diagnosa history
	function getListPengkodeanTindakanHistory(id, divChild2, page, spesialisasi, id_konsul) {
		$('#page-tindakan-history').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_list_pengkodean_tindakan_history") ?>/page/' + page + '/id_tarif_tindakan_pasien/' + id + '/spesialisasi/' + spesialisasi + '/id_konsul/' + id_konsul,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				//Condition when data is null
				if ((page - 1) & (data.data.length === 0)) {
					getListPengkodeanDiagnosaHistory(id, divChild2, page - 1);
					return false;
				}

				// Make table element
				var table2 = document.createElement('table');
				table2.setAttribute("class", "table table-hover table-sm color-table info-table");

				var thead = table2.createTHead(); // Make Thead
				var trThead1 = thead.insertRow(0); // Make <tr>

				// Make <th> in <tr>
				var th0 = document.createElement("th");
				th0.setAttribute("class", "center");
				th0.setAttribute("colspan", "4");
				th0.innerHTML = "Histori Pengkodean Tindakan";
				trThead1.appendChild(th0);

				var trThead2 = thead.insertRow(1);

				var th1 = document.createElement("th");
				th1.setAttribute("class", "center");
				th1.innerHTML = "Code After";
				trThead2.appendChild(th1);

				var th2 = document.createElement("th");
				th2.setAttribute("class", "center");
				th2.innerHTML = "Code Before";
				trThead2.appendChild(th2);

				var th3 = document.createElement("th");
				th3.setAttribute("class", "center");
				th3.innerHTML = "Coder";
				trThead2.appendChild(th3);

				var th4 = document.createElement("th");
				th4.setAttribute("class", "center");
				th4.innerHTML = "Updated On";
				trThead2.appendChild(th4);

				thead.appendChild(trThead1);
				thead.appendChild(trThead2);

				var tbody = table2.createTBody(); // Make <tbody>

				$.each(data.data, function(i, v) {

					var row = tbody.insertRow(0); // Make <tr> in <tbody>
					let cell1 = row.insertCell(0); // Make <td> in <tr>
					let cell2 = row.insertCell(1); // Make <td> in <tr>
					let cell3 = row.insertCell(2); // Make <td> in <tr>
					let cell4 = row.insertCell(3); // Make <td> in <tr>

					// Set Html in <td>
					cell1.innerHTML = v.code_after + "<br> (" + v.nama_code_after + ")";
					cell2.innerHTML = v.code_before + "<br> (" + v.nama_code_before + ")";
					cell3.innerHTML = v.coder;
					cell4.innerHTML = datetimefmysql(v.updated_on);

					// Set <td> style
					cell1.style.textAlign = "center";
					cell2.style.textAlign = "center";
					cell3.style.textAlign = "center";
					cell4.style.textAlign = "center";
				});

				// Make element for pagination

				// First element
				var rowPagination = document.createElement('div');
				rowPagination.setAttribute("class", "row");

				// Second element
				var colPagination = document.createElement('div');
				colPagination.setAttribute("class", "col");

				// Pagination div
				var paginationDiv = document.createElement('div');
				paginationDiv.setAttribute("class", "float-left");
				paginationDiv.setAttribute("id", "pagination-history-diagnosa");

				// Summary div
				var summary = document.createElement('div');
				summary.setAttribute("class", "float-right text-sm");
				summary.setAttribute("id", "summary-history-diagnosa");

				paginationDiv.innerHTML = (pagination(data.jumlah, data.limit, data.page, 1)); // Set pagination library
				summary.innerHTML = (page_summary(data.jumlah, data.data.length, data.limit, data.page)); // Set summary library

				colPagination.appendChild(paginationDiv); // Add div pagination to second element
				colPagination.appendChild(summary); // Add div summary to second element
				rowPagination.append(colPagination); // Add second element to first element

				divChild2.append(table2); // Add table element
				divChild2.append(rowPagination); // Add all pagination element

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	// Function for showing edit tindakan modal
	function codingTindakan(id, id_pengkodean, idLayananPendaftaran, id_unit_layanan) {
		resetForm();
		$('#id-golongan-sebab-before-tindakan').val(id_pengkodean);
		$('#id-tarif-tindakan-pasien').val(id);
		$('#id-layanan-pendaftaran-history-tindakan').val(idLayananPendaftaran);
		$('#id-unit-tindakan').val(id_unit_layanan);
		$('#modal-koding-tindakan').modal('show');

	}

	function resetForm() {
		$('#code-tindakan').val('');
		$('#id-tarif-tindakan-pasien').val('');
		$('#id-golongan-sebab-before-tindakan').val('');
		$('#id-layanan-pendaftaran-history-tindakan').val('');
		$('#id-unit-tindakan').val('');

		$('#code-tindakan').html('');
		$('#id-tarif-tindakan-pasien').html('');
		$('#id-golongan-sebab-before-tindakan').html('');
		$('#id-layanan-pendaftaran-history-tindakan').html('');
		$('#id-unit-tindakan').html('');
	}

	// Function for saving tindakan code
	function simpanKodingTindakan() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/simpan_coding_tindakan") ?>',
			data: $('#form-koding-tindakan').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				// getListDataKunjunganPasien($('#page-now-kunjungan-pasien').val());
				if (data.status === true) {
					messageCustom(data.message, 'Success');
				} else {
					messageCustom(data.message, 'Error');
				}

				$('#modal-koding-tindakan').modal('hide');
				getListDataTindakan($('#page-tindakan').val(), $('#id-layanan-pendaftaran').val(), $('#id-spesialis').val(), $('#id-konsul').val(), '');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Koding Tindakan Gagal Dilakukan', 'Error');
			},
		});
	}

	//Function for showing edit jenis kasus modal
	function editJenisKasus(id, idLayananPendaftaran) {
		$('#id-diagnosa-jk').val(id);
		$('#id-layanan-pendaftaran-coding-diagnosa').val(idLayananPendaftaran);
		$('#modal-edit-jenis-kasus-diagnosa').modal('show');
	}

	// Function for saving jenis kasus diagnosa
	function simpanJenisKasusDiagnosa() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/simpan_jenis_kasus_diagnosa") ?>',
			data: $('#form-edit-jenis-kasus-diagnosa').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === true) {
					messageCustom(data.message, 'Success');
				} else {
					messageCustom(data.message, 'Error');
				}

				$('#modal-edit-jenis-kasus-diagnosa').modal('hide');
				getListDataDiagnosa(1, $('#id-layanan-pendaftaran-coding-diagnosa').val());
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Koding Diagnosa Gagal Dilakukan', 'Error');
			},
		});
	}

	//Function for showing add diagnosa modal
	function addNewDiagnosa() {
		$('#modal-add-diagnosa-label').html('Tambah Diagnosa Baru');
		$('#modal-add-diagnosa').modal('show');
		$('#table-diagnosa tbody').empty();
	}

	//Function for add diagnosa
	function addDiagnosa() {
		if ($('#diagnosa-manual').val() === '1') {
			if ($('#golongan-sebab-sakit-lain').val() === '') {
				syams_validation('#golongan-sebab-sakit-lain', 'Kolom diagnosa harus diisi.');
				return false;
			}
		} else {
			if ($('#golongan-sebab-sakit').val() === '') {
				syams_validation('#golongan-sebab-sakit', 'Kolom diagnosa harus diisi.');
				return false;
			}
		}

		var html = '';
		var numberDiagnosa = $('.number-diag').length;
		var diagnosaManual = $('#diagnosa-manual').val();
		var dokter = $('#dokter').html();
		var id_dokter = $('#id-dokter').val();
		var golonganSebabSakit = $('#s2id_golongan-sebab-sakit a .select2c-chosen').html();
		var kodeDiagnosa = golonganSebabSakit.substr(0, 3);
		var golonganSebabSakitLain = $('#golongan-sebab-sakit-lain').val();
		var id_gol_sebab_sakit = $('#golongan-sebab-sakit').val();
		var diagnosaKlinik = $('#diagnosa-klinik').val();
		var prioritas = $('#prioritas').val();
		var diagnosaBanding = $("input[name='diagnosa_banding[]']").map(function() {
			return $(this).val();
		}).get();
		var diagnosaAkhir = $('#diagnosa-akhir').val();
		var penyebabKematian = $('#penyebab-kematian').val();

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
                    <input type="hidden" name="diag_klinis[]" value="${diagnosaKlinik}">${(diagnosaKlinik == 1) ? 'Ya' : 'Tidak' }
                </td>
                <td>
                    <input type="hidden" name="prioritas[]" value="${prioritas}"> ${(prioritas)}
                </td>
                <td>
                    <input type="hidden" name="diag_banding[]" value="${diagnosaBanding}"> ${(diagnosaBanding)}
                </td>
                <td>
                    <input type="hidden" name="diag_akhir[]" value="${diagnosaAkhir}">${(diagnosaAkhir == 1) ? 'Ya' : 'Tidak' }
                </td>
                <td>
                    <input type="hidden" name="sebab_kematian[]" value="${penyebabKematian}">${(penyebabKematian == 1) ? 'Ya' : 'Tidak' }
                </td>
                <td align="right">
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
		$('#prioritas').val('Utama');
		$('#diagnosa-akhir').val('');
		$('#penyebab-kematian').val('');

		$('input[type="checkbox"]').prop('checked', false);
		syams_validation_remove('.select2c-input, .custom-form');
	}

	function removeList(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}

	function saveNewDiagnosa() {

		$.ajax({
			type: 'POST',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/save_new_diagnosa") ?>',
			data: $('#form-add-diagnosa').serialize() + "&id_pasien=" + $('#id-pasien').val() + "&id_layanan_pendaftaran=" + $('#id-layanan-pendaftaran').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === true) {
					messageCustom(data.message, 'Success');
				} else {
					messageCustom(data.message, 'Error');
				}

				$('#modal-add-diagnosa').modal('hide');
				getListDataDiagnosa(1, $('#id-layanan-pendaftaran').val());
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Penambahan Diagnosa Gagal Dilakukan', 'Error');
			},
		});
	}

	function getListHistoryResep(p, idPasien) {
		let id = '';

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_list_history_resep") ?>/page/' + p + '/jenis/Rawat Jalan/id/' + id,
			data: $('#form-search-resep').serialize() + '&pasien=' + idPasien,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListHistoryResep(p - 1);
					return false;
				}

				$('#pagination-resep').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#page-summary-resep').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data-resep tbody').empty();
				let no = '';
				let num = 1;
				let html = '';
				$.each(data.data, function(i, v) {
					html = /* html */ `
                        <tr>
                            <td class="center">${((i+1) + ((data.page - 1) * 20))}</td>
                            <td class="center">${v.id}</td>
                            <td class="center">${datefmysql(v.tanggal)}</td>
                            <td>${v.dokter}</td>
                            <td>${v.jenis_layanan}</td>
                            <td>${v.nama_barang}</td>
                            <td class="center">${v.jumlah}</td>
                        </tr>
                    `;

					$('#table-data-resep tbody').append(html);
					if (no !== v.id) {
						num++;
					}
					no = v.id;
				});
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function konfirmasiSimpan() {
		bootbox.dialog({
			message: "Anda yakin akan menyimpan data ini?",
			title: "Konfirmasi",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				simpan: {
					label: '<i class="fas fa-check-circle mr-1"></i>Ya',
					className: "btn-info",
					callback: function() {
						simpanKodingDiagnosa();
						simpanKodingTindakan();
						simpanJenisKasusDiagnosa();
					}
				}
			}
		});
	}

	function konfirmasiSimpanPengkodean() {
		bootbox.dialog({
			message: "Anda yakin akan menyimpan data ini?",
			title: "Konfirmasi",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				simpan: {
					label: '<i class="fas fa-check-circle mr-1"></i>Ya',
					className: "btn-info",
					callback: function() {
						// simpanKodingDiagnosa(); 
						// simpanKodingTindakan();
						// simpanJenisKasusDiagnosa();
					}
				}
			}
		});
	}

	function cetakResumeMedisRawatInap(id, id_pendaftaran) {
		window.open('<?= base_url('pengkodean_icd_x/cetak_resume_medis_ranap/') ?>' + id + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakResumeMedisRawatJalan(id, id_pendaftaran) {
		window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + id + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakResumeMedisIntensivecare(id, id_pendaftaran) {
		window.open('<?= base_url('pengkodean_icd_x/cetak_resume_medis_intensive_care/') ?>' + id + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}
</script>