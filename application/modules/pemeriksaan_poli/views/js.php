<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	var JENIS_LAYANAN = '<?= $jenis ?>';
	var POLI = '<?= $poli == 'NULL' ? '' : $poli ?>';
	var GROUP = '<?= $group ?>'
	var baseUrl = '<?= base_url('pemeriksaan_poli/api/pemeriksaan_poli') ?>';

	$(function() {
		getListPemeriksaan(1);
		$("#wizard-form").bwizard();
		$("#wizard-form-1").bwizard();
		$('#jenis-rawat').val('<?= $jenis_tindakan; ?>');

		// btn search data
		$('#btn-search-data').click(function() {
			$('#modal-search').modal('show');
		});

		// btn reload data
		$('#btn-reload-data').click(function() {
			resetFormData();
			getListPemeriksaan(1);
		});

		// select filter layanan
		$('#layanan').change(function() {
			getListPemeriksaan(1);
		});
		
		$('#shifpoli').change(function() {
			getListPemeriksaan(1);
		});
		
		// datepicker search tanggal
		$('#tanggal-awal, #tanggal-akhir,#tanggal-awal-layanan, #tanggal-akhir-layanan').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#skd-tanggal-kontrol').datepicker({
			format: 'dd/mm/yyyy',
			startDate: '+0d'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		// remove validasi keyup
		$('.validasi-input, .form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		// remove validasi change
		$('.validasi-input, .select2-input, .select2c-input, .custom-form').change(function() {
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
				$('#s2id_dokter_diagnosa a .select2c-chosen, #s2id_operator a .select2c-chosen, #dokter-detail, #s2id_dokter_rujuk a .select2c-chosen, #s2id_dokter_rujuk_rad a .select2c-chosen')
					.html(data.nama);
				$('#operator, #id-dokter-detail, #dokter_rujuk, #dokter_rujuk_rad').val(data.id);
				return data.nama;
			}
		});

		$('#dokter-pengganti_new').select2c({ // DOKTER PENGGANTI DI modal_pemeriksaan.php
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

		// Saat radio button alergi berubah
	    $('input[name="pilihan_alergi"]').change(function() {
	        if ($(this).val() === "ya") {
	            $("#deskripsi-alergi-container, #jenis-alergi-container").show();
	            $("#pilihan-alergi-container").hide();
	        } else {
	            $("#deskripsi-alergi-container, #jenis-alergi-container, #pilihan-alergi-container").hide();
	            $('#deskripsi-alergi').val('');
		        $('#jenis-alergi').val('').trigger('change'); // Reset select2 jika digunakan
		        $('#pilihan-alergi').val('').trigger('change'); // Reset select2 jika digunakan
	        }
	    });

	    // Saat jenis alergi dipilih
	    $("#jenis-alergi").change(function() {
	        let jenis = $(this).val();
	        if (jenis !== "") {
	            $("#pilihan-alergi-container").show();
	            $("#pilihan-alergi").select2c({
	                ajax: {
	                    url: "<?= base_url('pemeriksaan_poli/api/pemeriksaan_poli/getAlergiAuto') ?>",
	                    dataType: 'json',
	                    quietMillis: 100,
	                    data: function(term, page) { // page is the one-based page number tracked by Select2
	                        return {
	                            q: term,  // search term
	                            group: jenis, // filter berdasarkan jenis alergi
	                            page: page, // page number
	                        };
	                    },
	                    results: function(data, page) {
	                        var more = (page * 20) < data.total; // apakah ada data lebih lanjut

	                        return {
	                            results: data.data,
	                            more: more
	                        };
	                    }
	                },
	                formatResult: function(data) {
					    if (!data.id || data.id === "0") return "<b style='color:gray;'>Pilih Alergi</b>";
					    return "<b>" + data.name + "</b>";
					},
					formatSelection: function(data) {
					    return data.id !== "0" ? data.name : "Pilih Alergi";
					}
	            });
	        } else {
	            $("#pilihan-alergi-container").hide();
	        }
	    });

	    $(document).ready(function() {
	        $.ajax({
	            url: "<?= base_url('pemeriksaan_poli/api/pemeriksaan_poli/getPrognosisOptions') ?>",
	            type: "GET",
	            dataType: "json",
	            success: function(response) {
	                let select = $("#prognosis");
	                select.empty(); // Hapus opsi lama
	                $.each(response, function(key, value) {
	                    select.append($("<option></option>").attr("value", key).text(value));
	                });
	            },
	            error: function(xhr, status, error) {
	                console.error("Error:", error);
	            }
	        });
	    });
	});

	function getListPemeriksaan(p) {
		$('#page_now').val(p);
		getKuotaPoli();

		if (GROUP !== 'Admin') {
			if (POLI !== '') {
				$('#layanan').val(POLI);
				$('#filter_select').addClass('d-none');
			}
		}

		if (GROUP == 'Medical Checkup') {
			$('#layanan').val(40);
			$('#filter_select').addClass('d-none');
		}

		var filter_dokter = '';
		if ('<?= $this->session->userdata('profesi_nadis') ?>' == 'Dokter Spesialis') {
			filter_dokter = '&id_dokter=' + '<?= $this->session->userdata('id_translucent') ?>'
		}

		$.ajax({
			type: 'GET',
			url: baseUrl + '/get_list_pemeriksaan_poli/page/' + p + '/jenis/Poliklinik',
			cache: false,
			data: $('#form_search').serialize() + '&layanan=' + $('#layanan').val() + '&shifpoli=' + $('#shifpoli').val() + filter_dokter,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListPemeriksaan(p - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table_data tbody').empty();
				let html = '';
				let status = '';
				let disable = '';
				let status_resep = '';
				let status_skk = '';
				let disable_lanjut = '';
				let disable_resep = '';
				let disable_btl_keluar = '';
				let disable_btl_klinik = '';
				let disable_cco_smtr = '';
				let disable_cco_smtr_it = '';
				let disable_cco_smtr_btl = '';
				let taskEmpat = '';
				let ketAntre = '';
				let disable_viewonly = '';
				let accountGroup = "<?= $this->session->userdata('account_group') ?>"

				$.each(data.data, function(i, v) {

					let bangsal_bed = '';
					if (v.jenis_layanan === 'Rawat Inap') {

						bangsal_bed = bed_ri + ' kelas ' + v.kelas_ri + ' ruang ' + v.ruang_ri + ' No. Bed ' + v.bed_ri;

					} else if (v.jenis_layanan === 'Intensive Care') {

						bangsal_bed = bed_ic + ' kelas ' + v.kelas_ic + ' ruang ' + v.ruang_ic + ' No. Bed ' + v.bed_ic;

						// PDIRJRJ
						// } else if (v.jenis_layanan === 'Poliklinik') {

					} else {

						bangsal_bed = '';
					}
					// } else {

					//     bangsal_bed = '';
					// }

					// Untuk tindak lanjut
					$('#dokter-pengirim').val(v.id_dokter);
					$('#nama-dokter-pengirim').val(v.dokter);

					if (v.task_empat === null) {

						taskEmpat = 0;

						if (v.keterangan_antrean === 'Bukan Antrean') {

							ketAntre = 1;

						} else {

							ketAntre = 0;

						}

					} else {

						taskEmpat = 1;
						ketAntre = 0;

					}

					if (v.tindak_lanjut === null) {
						disable_lanjut = '';
						disable = '';
						disable_cco_smtr = 'disabled';
						disable_cco_smtr_it = 'disabled';
						disable_cco_smtr_btl = 'disabled';
						disable_btl_keluar = 'disabled';
						disable_btl_klinik = 'disabled';

						if (v.konsul !== '1') { // poli pendaftaran
							disable_btl_keluar = 'disabled';
							disable_btl_klinik = 'disabled';
						} else { // poli pendaftaran
							disable_btl_keluar = 'disabled';
							disable_btl_klinik = '';
						}

					} else if (v.tindak_lanjut === 'Klinik Lain') {
						disable_lanjut = 'disabled';
						disable_btl_keluar = '';
						disable_btl_klinik = 'disabled';
						disable_cco_smtr = '';
						disable_cco_smtr_it = '';
						disable_cco_smtr_btl = 'disabled';

					} else if (v.tindak_lanjut === 'cco sementara') {
						disable_lanjut = 'disabled';
						disable = '';
						disable_cco_smtr = 'disabled';
						disable_cco_smtr_it = '';

						if (v.tindak_lanjut_sementara !== '') {
							disable_cco_smtr_btl = '';
						} else {
							disable_cco_smtr_btl = 'disabled';
						}

					} else if (v.tindak_lanjut === 'cco sementara it') {
						disable_lanjut = 'disabled';
						disable = '';
						disable_cco_smtr_it = 'disabled';

						if (v.tindak_lanjut_sementara !== '') {
							disable_cco_smtr_btl = '';
						} else {
							disable_cco_smtr_btl = 'disabled';
						}

					} else {
						// disable_lanjut = 'disabled';
						disable = 'disabled';
						disable_btl_keluar = '';
						disable_btl_klinik = 'disabled';
						disable_cco_smtr = '';
						disable_cco_smtr_it = '';
						disable_cco_smtr_btl = 'disabled';
					}

					let btn_hidden = '';
					if ((accountGroup === 'Admin') || (accountGroup === 'Kepala Instalasi Rawat Jalan') || (accountGroup === 'Kepala Ruangan Rawat Jalan') || (accountGroup === 'Admin Rekam Medis') || (accountGroup === 'Dokter Spesialis RM') || (accountGroup === 'Admin Pelayanan Medik') || (accountGroup === 'Koordinator Rehabilitasi Medik') || (accountGroup === 'Dokter Spesialis RM Rehab') || (accountGroup === 'Dokter Umum') || (accountGroup === 'Dokter Spesialis')) {
						btn_hidden = '';
						disable_viewonly = '';
					} else if ((accountGroup === 'Komite Keperawatan') || accountGroup === 'Kasir') { //READ ONLY
						btn_hidden = 'hidden';
						disable_viewonly = 'disabled';
					} else {
						btn_hidden = 'hidden';
						disable_viewonly = '';
					}

					let btn_hidden_keluar = '';
					if (accountGroup === 'Admin') {
						btn_hidden_keluar = '';
					} else {
						btn_hidden_keluar = 'hidden';
					}

					// let upload_file_rm = '';
					// if ((accountGroup === 'Admin') || ('<?= $this->session->userdata('unit') ?>' === 'Paru')) {
					let upload_file_rm = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="uploadFileRM(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.id_pasien + '\')"><i class="fas fa-upload m-r-5"></i> Upload File Rekam Medis</a>'
					// }

					if (v.tindak_lanjut === null && disable_viewonly == '') {
						riwayat_rekammedis = '';
					} else {
						riwayat_rekammedis = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="riwayatPasien(\'' + v.id_pasien + '\')"><i class="fas fa-eye m-r-5"></i> Lihat Riwayat Rekam Medis Pasien</a>';
					}

					if (v.layanan === 'Rehab Medik' && v.status_terlayani !== 'Belum') {
						terapi = '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailTerapi(' + v.id_pendaftaran + ',' + v.id + ',' + v.id_pasien + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Protokol Terapi</a>';
						link_rehab = '<a class="dropdown-item ' + disable_lanjut + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cekCheckOut(' + v.id_pendaftaran + ', ' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter + '\', \'' + v.layanan + '\', \'\', \'' + v.id_penjamin + '\')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>';
					} else if (v.layanan === 'Rehab Medik' && v.status_terlayani === 'Belum') {
						terapi = '<a class="dropdown-item disabled waves-effect waves-light btn-xs" href="javascript:void(0)"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Protokol Terapi</a>';
						link_rehab = '<a class="dropdown-item ' + disable_lanjut + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cekCheckOut(' + v.id_pendaftaran + ', ' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter + '\', \'' + v.layanan + '\', \'\', \'' + v.id_penjamin + '\')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>';
					} else {
						terapi = '';
						link_rehab = '<a class="dropdown-item ' + disable_lanjut + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cekCheckOut(' + v.id_pendaftaran + ', ' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter + '\', \'' + v.layanan + '\', \'\', \'' + v.id_penjamin + '\')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>';
					}

					if (v.status_terlayani === 'Belum') {
						disable_resep = '';
						status = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
					} else if (v.status_terlayani === 'Batal') {
						status = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
					} else {
						disable_resep = '';
						status = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
					}

					if (v.status_terlayani === 'Batal' || v.tindak_lanjut !== null && v.tindak_lanjut !== 'cco sementara' && v.tindak_lanjut !== 'cco sementara it') {
						disable_resep = 'disabled';
					}

					if (v.id_penjamin === '1') {
						disable_resep = ''
						disable_viewonly = ''
					}

					if (v.id_resep === null) {
						status_resep = '-';
					} else {
						status_resep = '<i class="fas fa-check-circle"></i>';
					}

					if (v.id_skk === null) {
						status_skk = '-';
					} else {
						status_skk = '<i class="fas fa-check-circle"></i>';
					}

					v.lab.jml >= 1 ? status_lab = '<i class="fas fa-check-circle"></i>' : status_lab = '-';
					v.rad.jml >= 1 ? status_rad = '<i class="fas fa-check-circle"></i>' : status_rad = '-';

					let detail = v.id + '#' + v.id_pasien + '#' + v.nama + '#' + v.dokter + '#' + v.id_dokter + '#' + hitungUmur(v.tanggal_lahir) + '#' + v.jenis_layanan + '#' + v.id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#rajal' + v.id_pendaftaran;
					let no = ((i + 1) + ((data.page - 1) * data.limit));

					let tindakLanjut = v.tindak_lanjut !== null ? v.tindak_lanjut : '-';

					if (tindakLanjut === 'cco sementara it') {
						tindakLanjut = 'cco sementara billing';
					}

					let layanan = ((v.shift_poli !== null) ? '<b>'+v.shift_poli+'</b> - ' : '') + ((v.layanan !== null) ? v.layanan : '') ;

					let html = '<tr>' +
						'<td align="center" >' + no + '</td>' +
						'<td align="center" >' + v.no_register + '</td>' +
						'<td align="center" >' + v.id_pasien + '</td>' +
						'<td align="center" class="nowrap">' + ((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '') + '</td>' +
						'<td align="center" class="nowrap">' + ((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '') + '</td>' +
						'<td>' + v.nama + '</td>' +
						'<td class="nowrap">' + layanan + '</td>' +
						'<td align="center" style="white-space:nowrap">' + v.no_antrian + '</td>' +
						'<td class="nowrap">' + v.dokter + '</td>' +
						'<td class="nowrap">' + v.cara_bayar + (v.cara_bayar === 'Asuransi' ? ' ( ' + v.penjamin + ' )' : '') + '</td>' +
						'<td align="center">' + status + '</td>' +
						'<td align="center">' + status_resep + '</td>' +
						'<td align="center">' + status_skk + '</td>' +
						'<td align="center">' + status_lab + '</td>' +
						'<td align="center">' + status_rad + '</td>' +
						'<td align="center">' + tindakLanjut + '</td>' +
						'<td align="right" style="display:flex;justify-content:flex-end">' +
						'<button ' + disable_resep + ' ' + disable_viewonly + ' type="button" class="btn btn-secondary btn-xs mr-1" title="Klik untuk input resep" onclick="inputResep(\'' + detail + '\')"><i class="fas fa-plus-circle mr-1"></i>Resep</button>' +
						'<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
						'<div class="dropdown-menu">' +
						'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showListForm(\'' + v.id_pendaftaran + '\', \'' + v.id + '\', \'' + v.id_pasien + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Formulir</a>' +

						<?php if ($this->session->userdata('account_group') === 'Admin') : ?>

					// PAKARJ                       
					// '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriFormPengkajianAwalKeperawatanAnakRawatJalan(\'' + detail + '\', \'' + v.id_pasien + '\', ' + data.page + ', \'' + v.layanan + '\', \'' + v.tanggal_daftar + '\', \'' + v.id_pendaftaran + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Pengkajian Awal Keperawatan Anak</a>' +

					'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + '0' + ',' + v.id_pendaftaran + ',' + v.id + ',' + taskEmpat + ',' + ketAntre + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>' +
						'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriGiziRajal(' + v.id_pendaftaran + ', ' + v.id + ', \'' + bangsal_bed + '\')" style="display: none;"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Konsultasi Gizi</a>' +
					<?php else : ?> '<a class="dropdown-item ' + disable + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + '0' + ',' + v.id_pendaftaran + ',' + v.id + ',' + taskEmpat + ',' + ketAntre + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>' +
					<?php endif ?>

					(v.id_unit_layanan === '34' ? // Rehab Medik
						'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriCPPT(' + v.id_pendaftaran + ',' + v.id + ',\'' + v.layanan + '\',\'\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri CPPT</a>' :
						'') +

					(v.tindak_lanjut === 'RS Lain' ?
						'<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratRujukan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-file-medical-alt m-r-5"></i>Buat Surat Rujukan</a>' :
						'') +

					terapi +
						'<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="settingPerlakuanKhusus(\'' + v.id_pasien + '\')"><i class="fas fa-fw fa-thumbtack m-r-5"></i>Set Perlakuan Khusus</a>' +
						'<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showRekapStatusBED()"><i class="fas fa-fw fa-bed m-r-5"></i>Rekap Ketersediaan Bed</a>' +
						// '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakFormRekamMedis(\'' + detail + '\', \'' + v.id_pasien + '\', ' + data.page + ')"><i class="fas fa-print m-r-5"></i> Cetak Form Rekam Medis</a>' +

						// PDIRJRJ
						// '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriFormRekamMedis(\'' + detail + '\', \'' + v.id_pasien + '\', ' + data.page + ', \'' + v.layanan + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i> Entri Form Rekam Medis</a>' +

						'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="profilRingkas(\'' + v.id_pasien + '\')"><i class="fas fa-eye m-r-5"></i> Profil Ringkas Medis Rajal</a>' +
						riwayat_rekammedis +
						upload_file_rm +
						'<a class="dropdown-item ' + disable_lanjut + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="konsulKlinikLain(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-plus m-r-5"></i>Konsul Klinik Lain</a>' +
						
						<?php if ($this->session->userdata('unit') == 'Okupasi') : ?> 
							'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="hasilPemeriksaanMCU(\'' + v.id_pendaftaran + '\',\'' + v.id + '\',\'' + v.id_pasien + '\',\'' + p + '\')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Hasil Pemeriksaan MCU</a>' +
						<?php endif; ?>

						link_rehab +
						(v.status_terlayani === 'Sudah' ?
							'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formSuratKontrolDoker(' + v.id_pendaftaran + ', ' + v.id + ',\'dokter\')"><i class="fas fa-fw fa-file m-r-5"></i>Surat Keterangan Kontrol (SKK)</a>' :
							'<a class="dropdown-item disabled waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formSuratKontrolDoker(' + v.id_pendaftaran + ', ' + v.id + ',\'dokter\')"><i class="fas fa-fw fa-file m-r-5"></i>Surat Keterangan Kontrol (SKK)</a>') +

						<?php if ($this->session->userdata('account_group') === 'Admin') : ?> '<a class="dropdown-item ' + disable_btl_keluar + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden_keluar + ' href="javascript:void(0)" onclick="pembatalanStatusKeluar(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar</a>' +
							'<a class="dropdown-item ' + disable_btl_klinik + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="pembatalanKonsulKlinik(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Konsul Klinik</a>' +
							'<a class="dropdown-item ' + disable_cco_smtr_it + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="statusKeluarSementaraIt(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara Billing</a>' +
						<?php endif ?>

					<?php if ($this->session->userdata('account_group') === 'Kepala Instalasi Rawat Jalan') : ?>
							(v.id_unit_layanan === '40' ?
								'<a class="dropdown-item ' + disable_cco_smtr + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="statusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara</a>' +
								'<a class="dropdown-item ' + disable_cco_smtr_it + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="statusKeluarSementaraIt(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara Billing</a>' :
								'') +
						<?php endif ?>

						<?php if ($this->session->userdata('account_group') === 'Admin' || $this->session->userdata('account_group') === 'Admin Rekam Medis' || $this->session->userdata('account_group') === 'Dokter Spesialis RM' || $this->session->userdata('account_group') === 'Dokter Spesialis RM Rehab') : ?>
								'<a class="dropdown-item ' + disable_cco_smtr + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="statusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara</a>' +
							<?php endif ?>

							'<a class="dropdown-item ' + disable_cco_smtr_btl + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="pembatalanStatusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar Sementara</a>' +

								'</div>' +
								'</div>' +
								'</td>' +
								'</tr>';
							$('#table_data tbody').append(html);
				});

			},
			complete: function() {
				hideLoader();
				$('#modal-search').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function cekCheckOut(id_pendaftaran, id_layanan_pendaftaran, resep, id_dokter, dokter, layanan, jenis, id_penjamin) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/cek_checkout") ?>/' + id_layanan_pendaftaran,
			dataType: 'JSON',
			success: function(data) {
				if (data.status === false) {
					swalAlert('warning', 'Informasi', data.message);
				} else {
					formTindakLanjut(id_pendaftaran, id_layanan_pendaftaran, resep, id_dokter, dokter, layanan, jenis, id_penjamin);
				}
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan, Silahkan Coba Beberapa Saat Lagi', 'Error');
			}
		})
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

	function resetFormTerapi() {

		let disable_terapi = '';
		$('#get-terapi').empty();
		$('#catatan-terapi').val('');
		$('#catatan-dokter-terapi').val('');
		$('#riwayat-kunjungan').empty();
		$('#button-batal').empty();
		$('#button-stop-terapi').empty();
		$('#status-terapi').empty();
		$('#tanggal-program').empty();


	}

	function detailTerapi(id_pendaftaran, id, id_pasien) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/get_pendaftaran") ?>/id/' + id_pendaftaran +
				'/id_layanan/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				let pasien = '';
				pasien = data.pasien;
				if (pasien !== null) {
					let kelamin = '';
					if (pasien.kelamin == 'L') {
						kelamin = 'Laki - laki';
					} else if (pasien.kelamin == 'P') {
						kelamin = 'Perempuan';
					}

					let umur = '';
					if (pasien.tanggal_lahir !== null | pasien.tanggal_lahir !== '') {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
					}

					$('#rhm-layanan-pendaftaran').val(id);
					$('#no-rm-terapi').text(pasien.id_pasien);
					$('#no-register-terapi').text(pasien.no_register);
					$('#nama-terapi').text(pasien.nama);
					$('#alamat-terapi').text(pasien.alamat);
					$('#kelamin-terapi').text(kelamin);
					$('#umur-terapi').text(umur);
					$('#nama-pjwb-terapi').text(pasien.nama_pjwb);
					$('#alamat-pjwb-terapi').text(pasien.alamat_pjwb);
					$('#telp-pjwb-terapi').text(pasien.telp_pjwb);
					$('#instansi-perujuk-terapi').text(pasien.instansi_perujuk);
					$('#tenaga-medis-perujuk-terapi').text(pasien.nadis_perujuk);
					$('#rhm-id-pasien').val(pasien.id_pasien);

					let diagnosis = '';
					diagnosis = data.diagnosa;

					if (diagnosis.length > 0) {

						showDiagnosis(diagnosis);

					} else {

						messageCustom('Silakan Entri Diagnosis dan Tindakan terlebih dahulu', 'Error');


						$('#diagnosis-baru').val();
					}

					let dokter_jwb = '';
					dokter_jwb = data.dokter;

					if (dokter_jwb.length > 0) {

						showDokter(dokter_jwb);

					} else {

						messageCustom('Silakan Entri Diagnosis dan Tindakan terlebih dahulu', 'Error');

						$('#dokter-pjwb-auto').val();

					}

					let tindakin = '';
					tindakin = data.tindakan;

					if (tindakin.length > 0) {

						showPerlakuan(tindakin);

					} else {

						messageCustom('Silakan Entri Pemeriksaan dan Tindakan terlebih dahulu', 'Error');
					}


					resetFormTerapi();
					var status_kunjungan = '';
					status_kunjungan = data.kunjungan;


					var cv = '';
					var cv_total = '';
					var disable_terapi = '';

					if (status_kunjungan.length > 0) {

						let disable_terapi = 'disabled="disabled"';
						let ruin = '';
						ruin = '\<select name=\"program_terapi\" ' + disable_terapi + ' class=\"custom-select\" id=\"rhm-bilangan-terapi\">\
                                            <option value="1">1</option>\
                                            <option value="2">2</option>\
                                            <option value="3">3</option>\
                                            <option value="4">4</option>\
                                            <option value="5">5</option>\
                                            <option value="6">6</option>\
                                            <option value="7">7</option>\
                                            <option value="8">8</option>\
                                            <option value="9">9</option>\
                                            <option value="10">10</option>\
                                            <option value="11">11</option>\
                                            <option value="12">12</option>\
                                            <option value="13">13</option>\
                                            <option value="14">14</option>\
                                            <option value="15">15</option>\
                                            <option value="16">16</option>\
                                            <option value="17">17</option>\
                                            <option value="18">18</option>\
                                            <option value="19">19</option>\
                                            <option value="20">20</option>\
                                            <option value="21">21</option>\
                                            <option value="22">22</option>\
                                            <option value="23">23</option>\
                                            <option value="24">24</option>\
                                            <option value="25">25</option>\
                                            <option value="26">26</option>\
                                            <option value="27">27</option>\
                                            <option value="28">28</option>\
                                            <option value="29">29</option>\
                                            <option value="30">30</option>\
                                            </select>';

						$('#get-terapi').append(ruin);
						showKunjungan(status_kunjungan);
						showIDKunjungan(status_kunjungan);


						let sttsKunjungan = '';


						sttsKunjungan = status_kunjungan[0].status;

						if (sttsKunjungan === null) {

							$('#status-terapi').text('Belum Selesai');

							let html = '';
							let totalkjgn = '';
							let next = '';
							totalkjgn = status_kunjungan[0].idk;

							next =
								'<td></td><td></td><td><button type="button" class="btn btn-secondary btn-xs" title="Tombol edit total digunakan bila petugas salah memilih total tindakan saat menetapkan program terapi" onclick="formEditTotal(' +
								totalkjgn + ', ' + id_pendaftaran + ', ' + id + ', \' ' + id_pasien +
								' \')"><i class="fas fa-edit mr-1"></i>Edit Total</button></td>';

							$('#button-batal').append(next);

							html =
								'<button type="button" class="btn btn-secondary btn-xs" title="Tombol Hentikan Terapi digunakan bila petugas ingin menyelesaikan Program Terapi" onclick="formStopTerapi(' +
								totalkjgn + ', ' + id_pendaftaran + ', ' + id + ', \' ' + id_pasien +
								' \')"><i class="fas fa-edit mr-1"></i>Hentikan Terapi</button>';

							$('#button-stop-terapi').append(html);

						} else {

							tanggalSelesai(status_kunjungan);

							let html = '';
							let totalkjgn = '';
							totalkjgn = status_kunjungan[0].idk;

							html =
								'<button type="button" class="btn btn-secondary btn-xs" title="Tombol Ubah Status Terapi digunakan bila petugas ingin mengubah status Program Terapi" onclick="formUbahStatus(' +
								totalkjgn + ', ' + id_pendaftaran + ', ' + id + ', \' ' + id_pasien +
								' \')"><i class="fas fa-edit mr-1"></i>Ubah Status Terapi</button>';

							$('#button-stop-terapi').append(html);

						}


					} else {

						let ruin = '';
						ruin = '\<select name=\"program_terapi\" ' + disable_terapi + ' class=\"custom-select\" id=\"rhm-bilangan-terapi\">\
                                        <option value="1">1</option>\
                                        <option value="2">2</option>\
                                        <option value="3">3</option>\
                                        <option value="4">4</option>\
                                        <option value="5">5</option>\
                                        <option value="6">6</option>\
                                        <option value="7">7</option>\
                                        <option value="8">8</option>\
                                        <option value="9">9</option>\
                                        <option value="10">10</option>\
                                        <option value="11">11</option>\
                                        <option value="12">12</option>\
                                        <option value="13">13</option>\
                                        <option value="14">14</option>\
                                        <option value="15">15</option>\
                                        <option value="16">16</option>\
                                        <option value="17">17</option>\
                                        <option value="18">18</option>\
                                        <option value="19">19</option>\
                                        <option value="20">20</option>\
                                        <option value="21">21</option>\
                                        <option value="22">22</option>\
                                        <option value="23">23</option>\
                                        <option value="24">24</option>\
                                        <option value="25">25</option>\
                                        <option value="26">26</option>\
                                        <option value="27">27</option>\
                                        <option value="28">28</option>\
                                        <option value="29">29</option>\
                                        <option value="30">30</option>\
                                        </select>';

						$('#get-terapi').append(ruin);


					}

					let noReM = pasien.id_pasien;
					let riwayat_kunjungan = '';
					riwayat_kunjungan =
						'<button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatKunjunganPasien(\'' + noReM + '\', ' + id + ')"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Kunjungan Pasien</button><button type="button" class="ml-2 btn btn-secondary btn-xxs" onclick="formRehabilitasMedik(\'' + id_pendaftaran + '\',\'' + noReM + '\')"><i class="fas fa-pencil-alt m-r-5"></i>Form Rehabilitas Medik</button><button type="button" class="ml-2 btn btn-secondary btn-xxs" onclick="historyFmr(\'' + id_pendaftaran + '\',\'' + noReM + '\')"><i class="fas fa-history m-r-5"></i>Riwayat Rehabilitas Medik</button>';
					$('#riwayat-kunjungan').append(riwayat_kunjungan);



					let terapis = '';
					terapis = data.terapi;

					if (terapis.length > 0) {

						showTerapis(terapis);

					} else {

						$('#catatan-terapi').empty();
						$('#catatan-dokter-terapi').empty();

					}


				}

				let layanan = '';

				layanan = data.layanan;
				if (layanan !== null) {
					let kelasTindakan = layanan.kelas;
					let jenisTindakan = layanan.jenis_layanan;
					if (jenisTindakan !== 'Rawat Inap') {
						jenisTindakan = 'Rawat Jalan';
						kelasTindakan = '<?= $kelas_tindakan ?>';
					}
				}

				$('#modal-terapi').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}


	function simpanEditRehab() {
		let dokter_pjwb = $('#dokter-pjwb-auto').val();
		let diagnosis = $('#diagnosis-baru').val();

		if (dokter_pjwb === '') {
			syams_validation('#dokter-pjwb-auto', 'Kolom subspesialis harus diisi.')
			$('#modal-terapi').modal('show');
			return false;
		}

		if (diagnosis === '') {
			syams_validation('#diagnosis-baru', 'Kolom dokter harus diisi.')
			$('#modal-terapi').modal('show');
			return false;
		}


		bootbox.dialog({
			message: "Anda yakin akan menyimpan hasil pencatatan rehab ?",
			title: "Simpan Pemeriksaan Catatan Rehab",
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-check-circle"></i> Simpan',
					className: "btn-info",
					callback: function() {
						simpanDataRehab();
					}
				}
			}
		});
	}


	function simpanDataRehab() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/simpan_data_rehab") ?>',
			data: $('#form-detail-pemeriksaan').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status) {
					messageEditSuccess();
					$('#modal-terapi').modal('hide');
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

	function formEditTotal(id_kunjungan, id_pendaftaran, id, id_pasien) {

		$('#footer-edit-rehab').empty();
		$('#form-edit-rehab').empty();
		$('#rhm-get-rehab').val('');

		$('#rhm-get-rehab').val(id_kunjungan);

		let ruin = '';
		ruin = '\<select name=\"total_edit_terapi\" class=\"custom-select\" id=\"edit-total-terapi\">\
                <option value="1">1</option>\
                <option value="2">2</option>\
                <option value="3">3</option>\
                <option value="4">4</option>\
                <option value="5">5</option>\
                <option value="6">6</option>\
                <option value="7">7</option>\
                <option value="8">8</option>\
                <option value="9">9</option>\
                <option value="10">10</option>\
                <option value="11">11</option>\
                <option value="12">12</option>\
                <option value="13">13</option>\
                <option value="14">14</option>\
                <option value="15">15</option>\
                <option value="16">16</option>\
                <option value="17">17</option>\
                <option value="18">18</option>\
                <option value="19">19</option>\
                <option value="20">20</option>\
                <option value="21">21</option>\
                <option value="22">22</option>\
                <option value="23">23</option>\
                <option value="24">24</option>\
                <option value="25">25</option>\
                <option value="26">26</option>\
                <option value="27">27</option>\
                <option value="28">28</option>\
                <option value="29">29</option>\
                <option value="30">30</option>\
                </select>';

		$('#form-edit-rehab').append(ruin);


		let html =
			'<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="editTotalRehab(' +
			id_kunjungan + ', ' + id_pendaftaran + ', ' + id + ', \' ' + id_pasien +
			' \')"><i class="fas fa-plus-circle"></i> Simpan</button>';

		$('#footer-edit-rehab').append(html);


		$('#modal-batal-rehab').modal('show');
	}

	function formStopTerapi(id_kunjungan, id_pendaftaran, id, id_pasien) {

		bootbox.dialog({
			message: "Apakah Anda yakin akan menyelesaikan Program Terapi?",
			title: "Program Terapi",
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-check-circle"></i> Selesai',
					className: "btn-info",
					callback: function() {
						simpanFormStopTerapi(id_kunjungan, id_pendaftaran, id, id_pasien);
					}
				}
			}
		});

	}

	function simpanFormStopTerapi(id_kunjungan, id_pendaftaran, id, id_pasien) {

		$.ajax({
			type: 'PUT',
			url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/simpan_form_stop_terapi") ?>',
			data: $('#form-detail-pemeriksaan').serialize() + 'id_kunjungan=' + id_kunjungan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status) {

					let get = '';
					let get_message = '';
					get = data.status;
					get_message = data.message;

					if (get === true && get_message === 1) {

						messageCustom('Program Terapi Berhasil diselesaikan', 'Success');
						detailTerapi(id_pendaftaran, id, id_pasien);

					} else if (get_message === 2) {

						messageCustom('Masih ada Tindakan yang belum diselesaikan', 'Error');
						detailTerapi(id_pendaftaran, id, id_pasien);


					} else {

						messageCustom(
							'Jumlah Tindakan Lebih dari Total Program Terapi, Silakan Hapus Tindakan Terlebih Dahulu',
							'Error');
						detailTerapi(id_pendaftaran, id, id_pasien);
					}

				} else {

					messageCustom('Total Program Terapi Gagal disimpan', 'Error');
					detailTerapi(id_pendaftaran, id, id_pasien);

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

	function formUbahStatus(id_kunjungan, id_pendaftaran, id, id_pasien) {

		bootbox.dialog({
			message: "Apakah Anda yakin mengubah status Program Terapi?",
			title: "Program Terapi",
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-check-circle"></i> Ubah Status',
					className: "btn-info",
					callback: function() {
						simpanUbahStatusTerapi(id_kunjungan, id_pendaftaran, id, id_pasien);
					}
				}
			}
		});

	}

	function simpanUbahStatusTerapi(id_kunjungan, id_pendaftaran, id, id_pasien) {
		$.ajax({
			type: 'PUT',
			url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/simpan_ubah_status_terapi") ?>',
			data: $('#form-detail-pemeriksaan').serialize() + '&id_kunjungan=' + id_kunjungan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status) {
					messageEditSuccess();
					detailTerapi(id_pendaftaran, id, id_pasien);
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

	function editTotalRehab(id_kunjungan, id_pendaftaran, id, id_pasien) {

		$.ajax({
			type: 'PUT',
			url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/edit_total_program") ?>',
			data: $('#form-batal-total').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status) {

					let get = '';
					let get_message = '';
					get = data.status;
					get_message = data.message;

					if (get === true && get_message === 1) {

						$('#modal-batal-rehab').modal('hide');
						messageCustom('Total Program Terapi Berhasil diubah', 'Success');
						detailTerapi(id_pendaftaran, id, id_pasien);

					} else if (get_message === 2) {

						messageCustom('Masih ada Tindakan yang belum diselesaikan', 'Error');
						detailTerapi(id_pendaftaran, id, id_pasien);


					} else {

						messageCustom(
							'Jumlah Tindakan Lebih dari Total Program Terapi, Silakan Hapus Tindakan Terlebih Dahulu',
							'Error');
						detailTerapi(id_pendaftaran, id, id_pasien);
					}

				} else {

					messageCustom('Total Program Terapi Gagal disimpan', 'Error');
					detailTerapi(id_pendaftaran, id, id_pasien);

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

	function showDiagnosis(diagnosa) {

		$('#diagnosis-baru').text(diagnosa[0].item);

		$('#diagnosis-baru').val(diagnosa[0].item);

	}

	function showDokter(dokter) {

		$('#dokter-pjwb-auto').text(dokter[0].dokter);
		$('#dokter-pjwb-auto').val(dokter[0].dokter);


	}


	function showPerlakuan(tindakan) {

		$('#rhm-id-operator').val(tindakan[0].id_operator);

	}

	function showTerapis(terapi) {

		$('#catatan-terapi').val(terapi[0].catatan);
		$('#catatan-dokter-terapi').val(terapi[0].catatan_dokter);

	}

	function tanggalSelesai(kunjungan) {

		let html = '';
		let selesai = '';
		let tanggal_selesai = '';
		selesai = kunjungan[0].tanggal_stop;
		tanggal_selesai = datetimerezmysql(selesai);

		$('#status-terapi').text('Selesai pada tanggal ' + tanggal_selesai);
	}

	function showKunjungan(kunjungan) {

		let program = '';
		let tanggal_program = '';
		program = kunjungan[0].tanggal;
		tanggal_program = datetimerezmysql(program);


		$('#rhm-bilangan-terapi').val(kunjungan[0].total);
		$('#tanggal-program').text(tanggal_program);

	}

	function showIDKunjungan(kunjungan) {

		$('#rhm-kunjungan-rehab').val(kunjungan[0].idk);
		$('#rhm-idk-pasien').val(kunjungan[0].idk);

	}

	function paging(p, tab) {
		if (tab === 1) {
			getListPemeriksaan(p);
		} else if (tab === 2) {
			getListHistoryResep(p, $('#id-resep-history').val());
		}
	}

	function resetFormData() {
		// form search
		$('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>');
		$('#tanggal-awal-layanan, #tanggal-akhir-layanan').val('');

		if (GROUP !== 'Admin') {
			if (POLI !== '') {
				$('#no-register-search, #no-rm-search, #nik-search, #nama-search').val('');
			} else {
				$('#layanan, #shifpoli, #no-register-search, #no-rm-search, #nik-search, #nama-search').val('');
			}
		} else {
			$('#layanan, #shifpoli, #no-register-search, #no-rm-search, #nik-search, #nama-search').val('');
		}

		$('.custom-textarea, .custom-form').val('');
		$('.select2-chosen').html('');

		$('#table-diagnosa tbody, #table-tindakan tbody, #table-bhp tbody').empty();

		// validasi
		syams_validation_remove('.validasi-input');
		syams_validation_remove('.select2-input');
	}

	function setTanggalPencarian() {
		let nik = $('#nik-search').val();
		let nama = $('#nama-search').val();
		let noRM = $('#no-rm-search').val();
		let tanggalAwal = $('#tanggal-awal').val();
		let tanggalAkhir = $('#tanggal-akhir').val();
		let noRegister = $('#no-register-search').val();

		resetFormData();
		$('#nik-search').val(nik);
		$('#nama-search').val(nama);
		$('#no-rm-search').val(noRM);
		$('#tanggal-awal').val(tanggalAwal);
		$('#tanggal-akhir').val(tanggalAkhir);
		$('#no-register-search').val(noRegister);
	}

	function dataAlergiPasien(profil, pasien){

		$('#alergi-detail').html(profil.keterangan_alergi);

		if (typeof profil.id_master_alergi !== 'undefined' && profil.id_master_alergi !== null && profil.id_master_alergi !== "") {
			$.ajax({
				type: 'GET',
				url: '<?= base_url("pelayanan/api/pelayanan/getDataAlergiPasien") ?>/id/' + profil.id_master_alergi,
				cache: false,
				dataType: 'JSON',
				success: function(data) {

					if (profil.is_alergi === "Ya") {
				        // Pilih radio button "Ya"
				        $('input[name="pilihan_alergi"][value="ya"]').prop("checked", true).trigger("change");

				        // Isi jenis alergi sesuai dengan group dari dataAlergi
				        $("#jenis-alergi").val(data.group).trigger("change");
				        $('#deskripsi-alergi').val(profil.keterangan_alergi);
				        $('#deskripsi-alergi').html(profil.keterangan_alergi);
				        // Isi pilihan alergi dengan opsi dari objek data
				        $('#pilihan-alergi').val(data.id);
                    	$('#s2id_pilihan-alergi a .select2c-chosen').html(data.name);
				    } else {
				        // Pilih radio button "Tidak"
				        $('input[name="pilihan_alergi"][value="tidak"]').prop("checked", true).trigger("change");
				        $("#deskripsi-alergi-container, #jenis-alergi-container, #pilihan-alergi-container").hide();
			            $('#deskripsi-alergi').val('');
			            $('#deskripsi-alergi').html('');
				        $('#jenis-alergi').val('').trigger('change'); // Reset select2 jika digunakan
				        $('#pilihan-alergi').val('').trigger('change'); // Reset select2 jika digunakan
				    }

				},
				complete: function() {
					hideLoader();
				},
				error: function(e) {

				}
			});

		} else {

			if(typeof pasien.alergi !== 'undefined' && profil.alergi !== null  && profil.alergi !== ""){

				$('#alergi-detail').html(pasien.alergi);
				$('#alergi').val(pasien.alergi);

			}

		}

	}

	// modal detail pemeriksaan
	function detailPemeriksaan(ini, id_pendaftaran, id_layanan, task_empat, antre) {

		$('#wizard-form').bwizard('show', ini);
		setTanggalPencarian();

		$('#id-layanan').val(id_layanan);
		$('#id-pendaftaran-pasien').val(id_pendaftaran);
		$('#id-dftr-hemorajal').val(id_pendaftaran);
		get_pemeriksaan_lab(id_layanan);
		get_pemeriksaan_rad(id_layanan);
		getPemeriksaanFisio(id_layanan);
		getPemeriksaanOperasi(id_layanan);
		getDataHemoRajal(id_pendaftaran);

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
					$('.form-anamnesa button[data-target="#pemeriksaanFisik"]').attr('data-target', '#pemeriksaanFisik')
					$('.form-anamnesa button[data-target="#pemeriksaanNeurologi"]').attr('data-target', '#pemeriksaanNeurologi')
					$('.form-anamnesa button[data-target="#pemeriksaanAnak"]').attr('data-target', '#pemeriksaanAnak')
					$('button[title="tambah diagnosa"]').off('click').attr('onclick', 'addDiagnosa()')

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
					} else if (layanan.tindak_lanjut === 'cco sementara it') {
						$('button[title="tambah diagnosa"]').removeAttr('onclick').on('click', function() {
							swalAlert('info', 'Info', 'Pasien sedang checkout billing. Silahkan lakukan cco sementara')
						})
						$('.form-anamnesa button[data-target="#anamnesa"]').removeAttr('data-target')
						$('.form-anamnesa button[data-target="#pemeriksaanFisik"]').removeAttr('data-target')
						$('.form-anamnesa button[data-target="#pemeriksaanNeurologi"]').removeAttr('data-target')
						$('.form-anamnesa button[data-target="#pemeriksaanAnak"]').removeAttr('data-target')
					} else {
						$('button[title="Tambah Tindakan"]').off('click').attr('onclick', 'addTindakan()')
						$('button[title="tambah bhp"]').off('click').attr('onclick', 'addBHP(); return false;')
						$('button[title="order pemeriksaan lab"]').off('click').attr('onclick', 'request_lab()')
						$('button[title="order pemeriksaan rad"]').off('click').attr('onclick', 'request_rad()')
						$('button[title="tambah order hd"]').off('click').attr('onclick', 'addHemodialisisRajal()')
						$('button[title="order operasi"]').off('click').attr('onclick', 'addOrderOperasi()')
					}
					if (pasien.kelamin == 'L') {
						kelamin = 'Laki - laki';
					} else {
						kelamin = 'Perempuan';
					}

					if (pasien.tanggal_lahir !== null) {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
					}

					$('#btn-upload-pasien').empty();
					$('#btn-upload-pasien').append('<button type="button" title="Upload File Rekam Medis" class="btn btn-secondary btn-xxs" onclick="uploadFileRM(' + pasien.id + ',' + layanan.id + ', \'' + pasien.id_pasien + '\')"><i class="fas fa-upload m-r-5"></i> Upload File Rekam Medis</button>');
					$('#skd-btn-riwayat-poli').empty();
					$('#skd-btn-riwayat-poli').append('<button type="button" title="Riwayat Kontrol Pasien" class="btn btn-secondary btn-xxs" onclick="riwayatSKD(\'' + pasien.id_pasien + '\')"><i class="fas fa-eye m-r-5"></i> Lihat Riwayat Kontrol Pasien</button>');
					$('#skd-btn-riwayat-reload').empty();
					$('#skd-btn-riwayat-reload').append('<button type="button" class="btn btn-secondary waves-effect" onclick="reloadDataSKDRiwayat(\'' + pasien.id_pasien + '\')"><i class="fas fa-history"></i> Reload Data</button>');
					$('#id-pasien').val(pasien.id_pasien);
					$('#nama-detail').html(pasien.nama);
					$('#no-rm-detail').html(pasien.id_pasien);
					$('#no-register-detail').html(pasien.no_register);
					$('#kelamin-detail').html(kelamin);
					$('#umur-detail').html(umur);
					$('#alamat-detail').html(pasien.alamat);
					$('#agama-detail').html(pasien.agama);
					$('#telp-detail').html(pasien.telp);
					$('#no-ktp-pasien').val(pasien.no_identitas);
					$('#tgl-lahir').val(pasien.tanggal_lahir);
					$('#nama-pasien').val(pasien.nama);

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
					$('.logo-pasien-prb').hide();
					$('#alergi-detail').html('');
					$('#alergi').val('');
					$("#deskripsi-alergi-container, #jenis-alergi-container, #pilihan-alergi-container").hide();
		            $('#deskripsi-alergi').val('');
			        $('#jenis-alergi').val('').trigger('change'); // Reset select2 jika digunakan
			        $('#pilihan-alergi').val('').trigger('change'); // Reset select2 jika digunakan
		
					if (data.profil !== null) {
						// status profil pasien
						dataAlergiPasien(data.profil, data.pasien);
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
						if (data.profil.is_prb == 'Ya') {
							$('.logo-pasien-prb').show();
						}
					}



					// TAMBAHAN WH
					// $('#logo-pasien-alergi').attr('title', pasien.alergi);
					// $('#alergi-coba').html(pasien.alergi); GUNAKAN NNTI KETIKA DATA ALERGI HARUS MUNCUL BUKAN CUMA MUNCUL KETIKA DISOROT
					$('#logo-pasien-alergi').attr('title', '⚠️‼️ A L E R G I ‼️⚠️\n→' + pasien.alergi + '');

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

					// Layanan Pendaftaran
					$('#layanan-detail').html(layanan.layanan);
					$('#no-antrian-detail').html(layanan.no_antrian);
					$('#dokter-detail').html(layanan.dokter);
					$('#dokter-hemorajal').val(layanan.id_dokter);
					$('#id-penjamin-tindakan').val(layanan.id_penjamin);
					$('#id-penjamin-rajal').val(layanan.id_penjamin);

					let cara_bayar = '<b>' + layanan.cara_bayar + ' ' + ((layanan.id_penjamin !== null) ? '(' + layanan.penjamin + ')' : '') + '</b>';
					$('#cara-bayar-detail').html(cara_bayar);
					$('#no-polish-detail').html(layanan.no_polish);
					$('#no-sep-detail').html(layanan.no_sep);
					$('#rajal-bayar-hemodialisis').val(layanan.cara_bayar);
					$('#no-polish-hemorajal').val(layanan.no_polish);
					$('#no-sep-hemorajal').val(layanan.no_sep);
					if (data.penjamin_pasien) {
						$('#hak-kelas-pasien').html(data.penjamin_pasien.hak_kelas || '');
					}
					$('#identitas-pasien-anamnesa, #identitas-pasien-diagnosa, #identitas-pasien-tindakan, #identitas-pasien-bhp, #identitas-pasien-pkrt').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

					$('#dokter').val(layanan.id_dokter);
					$('#s2id_dokter a .select2c-chosen').html(layanan.dokter);

					$('#operator').val(layanan.id_dokter);
					$('#s2id_operator a .select2c-chosen').html(layanan.dokter);

					// anamnesa
					if (typeof anamnesa !== 'undefined' && typeof anamnesa !== null) {
						showAnamnesa(anamnesa);
					}
					// diagnosa
					$('#prioritas').val('Utama');
					if (data.diagnosa.length > 0) {
						showDiagnosa(data.diagnosa);
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
					$('#profesi').val(8);
					$('#jumlah-tindakan').val(1);
					$('#unit').val(layanan.id_unit);
					// $('#s2id_unit a .select2c-chosen').html(layanan.unit);

					if (data.tindakan.length > 0) {
						showTindakan(data.tindakan);
					}

					// BHP
					if (data.bhp.length > 0) {
						showBHP(data.bhp);
					}

					// PKRT
					if (data.pkrt.length > 0) {
						showPKRT(data.pkrt);
					} else {
						$('#pkrt-label').html('');
						$('#table-pkrt tbody').empty();
					}

					$('#modal-pemeriksaan').modal('show');
					$('#modal-pemeriksaan-label').html('Form Pemeriksaan Poliklinik');
				}
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
			let storedPrognosis = anamnesa.prognosis;

		    $.ajax({
		        url: "<?= base_url('pemeriksaan_poli/api/pemeriksaan_poli/getPrognosisOptions') ?>",
		        type: "GET",
		        dataType: "json",
		        success: function(response) {
		            let select = $("#prognosis");
		            select.empty();
		            select.append('<option value="">-- Pilih Prognosis --</option>');
		            $.each(response, function(key, value) {
		                select.append($("<option></option>").attr("value", key).text(value));
		            });

		            if (storedPrognosis) {
		                $("#prognosis").val(storedPrognosis).trigger("change");
		            }
		        },
		        error: function(xhr, status, error) {
		            console.error("Error:", error);
		        }
		    });

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

	// HEMODIALISIS
	function addHemodialisisRajal() {
		let status = $('#hemorajal-status').text();
		let dokter = $('#dokter-hemorajal').val();
		let cara_bayar_hemodialisis = $('#rajal-bayar-hemodialisis').val();
		let id_penjamin_hemodialisis = $('#id-penjamin-rajal').val();
		let no_polish_hemodialisis = $('#no-polish-hemorajal').val();
		let no_sep_hemodialisis = $('#no-sep-hemorajal').val();
		let id_dftr_hemodialisis = $('#id-dftr-hemorajal').val();

		if (status === '') {
			let i = $('.hemorajal-rec').length;
			let html = /* html */ `
                <tr class="hemorajal-rec">
                    <td class="center">${i + 1}</td>
                    <td class="left"><?php echo date("d/m/Y H:i") ?></td>
                    <td class="center">Hemodialisis</td>
                    <td class="center">
                        <em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i><span id="hemorajal-status">Request</span></em>
                        <input type="hidden" name="hemo_order[]" id="hemorajal-order"><input type="hidden" name="id_dftr_hemodialisis[]" value="${id_dftr_hemodialisis}"><input type="hidden" name="dokter_hemodialisis[]" value="${dokter}"><input type="hidden" name="cara_bayar_hemodialisis[]" value="${cara_bayar_hemodialisis}"><input type="hidden" name="id_penjamin_hemodialisis[]" value="${id_penjamin_hemodialisis}"><input type="hidden" name="no_polish_hemodialisis[]" value="${no_polish_hemodialisis}"><input type="hidden" name="no_sep_hemodialisis[]" value="${no_sep_hemodialisis}">
                    </td>
                    <td class="center">
                        <button title="Hapus Order Hemodialisis" type="button" class="btn btn-secondary btn-xs" onclick="removeHemoRajal(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            `;
			$('#table-order-hemorajal tbody').append(html)
		} else {
			swalAlert('info', 'Informasi', 'Harap simpan dan selesaikan Permintaan Hemodialisis terlebih dahulu!')
		}
	}

	// END HEMODIALISIS

	function removeHemoRajal(its) {
		var parent = its.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
		var jml = $('.hemorajal-rec').length;
		for (i = 0; i <= jml; i++) {
			$('.hemorajal-rec:eq(' + i + ')').children('td:eq(0)').html(i + 1)
		}
	}

	function datetimerezmysql(waktu) {

		let tm = waktu.split('-');
		let gm = tm[2];
		let sx = tm[2].split(':');
		let fx = sx[0].split(' ');
		return fx[0] + '/' + tm[1] + '/' + tm[0] + ' ' + fx[1] + ':' + sx[1];
	}

	function getDataHemoRajal(id_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_data_hemodialisis") ?>/id_daftar/' + id_pendaftaran +
				'/jenis/Hemodialisa',
			dataType: 'JSON',
			success: function(data) {
				$('#table-order-hemorajal tbody').empty();

				if (data !== undefined) {
					$.each(data.data, function(i, v) {

						let status = '';
						let button = '';
						if (v.status === 'Belum') {
							status =
								'<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Order</em>';
							button =
								'<button title="Hapus Order Hemodialisis" type="button" class="btn btn-secondary btn-xs" onclick="HapusHemoRajal(' +
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
                            <tr class="hemorajal-rec">
                                <td class="center">${(++i)}</td>
                                <td>${datetimerezmysql(v.tanggal_layanan)}</td>
                                <td class="center">Hemodialisis</td>
                                <td class="center">${status}</td>
                                <td class="center">${button}</td>
                            </tr>
                        `;
						$('#table-order-hemorajal tbody').append(html);
					})

				} else {

					$('#table-order-hemorajal tbody').empty();
				}

			}
		})
	}

	function HapusHemoRajal(id, id_pendaftaran) {
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
									let ini = '7';
									detailPemeriksaan(ini, id_pendaftaran, id);
								} else {
									customAlert('Hapus Order Hemodialisis Rawat Jalan', data
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

	function konfirmasiSimpan() {
		let subspesialis = $('#subspesialis').val();
		let dokter = $('#dokter').val();
		let usulTindakLanjut = $('#usul-tindak-lanjut').val();
		let pilihanAlergi = $('input[name="pilihan_alergi"]:checked').val();
		let jenisAlergi = $('#jenis-alergi').val();
		let deskripsiAlergi = $('#deskripsi-alergi').val();
		let pilihanAlergiDetail = $('#pilihan-alergi').val();

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
			$('#wizard-form').bwizard('show', '2');
			return false;
		}

		if (usulTindakLanjut === '') {
			syams_validation('#usul-tindak-lanjut', 'Kolom rencana tindak lanjut harus diisi.')
			swalAlert('warning', 'Validasi', 'Kolom <b>Rencana Tindak Lanjut</b> pada form <b>Anamnesis</b> harap diisi untuk kelengkapan <i>Resume Medis</i>.')
			$('#wizard-form').bwizard('show', '1');
			return false;
		}

		if (pilihanAlergi === "ya") {
			if (jenisAlergi === '' || deskripsiAlergi === '' || pilihanAlergiDetail === '' || pilihanAlergiDetail === '0') {
				swalAlert('warning', 'Validasi', 'Kolom <b>Jenis Alergi</b>, <b>Deskripsi Alergi</b>, dan <b>Pilihan Alergi</b> harus diisi jika memilih "Ya" pada alergi.');
				$('#wizard-form').bwizard('show', '1');
				return false;
			}
		} else {
			
			$('#deskripsi-alergi').val('');
			$('#jenis-alergi').val('').trigger('change');
			$('#pilihan-alergi').val('').trigger('change');

		}

		let prognosis = $("#prognosis").val(); // Ambil nilai prognosis

        if (prognosis === "" || prognosis === null) {
            Swal.fire({
                icon: "warning",
                title: "Prognosis Belum Dipilih!",
                text: "Silakan pilih prognosis sebelum menyimpan(Untuk menunjang pengiriman data Satu Sehat Kemenkes)",
                confirmButtonText: "OK"
            });
            syams_validation('#prognosis', 'Kolom Prognosis harus diisi.')
            $('#wizard-form').bwizard('show', '1');
            return;
        }

        syams_validation_remove('#prognosis');

        bootbox.dialog({
			message: "Anda yakin akan menyimpan hasil pemeriksaan ?",
			title: "Simpan Pemeriksaan Poliklinik",
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-check-circle"></i> Simpan',
					className: "btn-info",
					callback: function() {
						simpanDataPemeriksaan();
					}
				}
			}
		});
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

	var KELAS_TINDAKAN = '<?= $kelas_tindakan ?>';
	var JENIS_RAWAT = '<?= $jenis_tindakan ?>';
	var RAD = 266;
	$('#tindakan_laboratorium').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pemeriksaan_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					kelas: KELAS_TINDAKAN,
					jenis: JENIS_RAWAT,
					unit: $('#jenis_lab').val(),
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
			var total = (data.total !== '') ? ('Rp. ') + numberToCurrency(data.total) : '';

			var kelas = (data.kelas !== null) ? (' kelas ') + data.kelas : '';
			var bobot = (data.bobot !== null) ? (' ') + data.bobot : '';
			var instalasi = (data.instalasi !== null) ? (' ' + data.instalasi + ' ') : '';
			var markup = '<b>' + data.layanan + '</b> <br/>' + data.layanan_parent + '<br/>' + instalasi + data
				.jenis + bobot + ' ' + kelas + data.keterangan + '<br/>' + total;

			return markup;
		},
		formatSelection: function(data) {
			$('#tarif_tindakan_lab').val(data.total);
			var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
			var result = data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas + ' ' + data.keterangan;

			if (data.id !== '') {
				show_item_laboratorium(data.id_layanan);
			} else {
				result = '';
			}
			return result;
		}
	});

	$('#tindakan_radiologi').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					kelas: KELAS_TINDAKAN,
					jenis_tindakan: '<?= $jenis_tindakan ?>',
					jenis_pemeriksaan: 'Pelayanan Radiologi',
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
			var total = data.total;
			var kelas = (data.kelas !== null) ? ((', kelas ') + data.kelas) : ((data.id !== '') ?
				'Semua Kelas' : '');
			var jenis = (data.jenis !== null) ? ('<br/>' + data.jenis + '<br/>') : '<br/>';

			var markup = '<b>' + data.layanan + '</b>' + jenis + data.bobot + kelas + '<br/>' +
				numberToCurrency(total);
			return markup;
		},
		formatSelection: function(data) {
			$('#tarif_tindakan_rad').val(data.total);
			var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
			var jenis = (data.jenis !== null) ? data.jenis : '';
			var result = data.layanan + ', ' + jenis + ', ' + data.bobot + kelas;
			if (data.id === '') {
				result = '';
			}
			return result;
		}
	});

	function request_lab() {
		$('#id_layanan_asal').val($('#id-layanan').val());
		$('#modal-lab-label').html('Permintaan Pemeriksaan Laboratorium');
		$('#tindakan_laboratorium, #tarif_tindakan_lab').val('');
		$('#s2id_tindakan_laboratorium a .select2-chosen').html('');
		$('#dokter_rujuk').val($('#dokter').val());
		$('#s2id_dokter_rujuk a .select2-chosen').html($('#s2id_dokter a .select2c-chosen').html());
		$('#lab_modal').modal('show');
		$('#table-lab tbody').empty();
		klik = null;
	}

	function request_rad() {
		$('#id_layanan_asal_rad').val($('#id-layanan').val());
		$('#modal-rad-label').html('Permintaan Pemeriksaan Radiologi');
		$('#tindakan_radiologi, #tarif_tindakan_rad').val('');
		$('#s2id_tindakan_radiologi a .select2-chosen').html('');
		$('#dokter_rujuk_rad').val($('#dokter').val());
		$('#s2id_dokter_rujuk_rad a .select2-chosen').html($('#s2id_dokter a .select2c-chosen').html());
		$('#rad_modal').modal('show');
		$('#table-rad tbody').empty();
		klik = null;
	}

	function show_item_laboratorium(id_layanan) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_item_laboratorium") ?>/id_layanan/' + id_layanan,
			cache: false,
			dataType: 'json',
			success: function(data) {
				if (data.status) {
					if (data.data.length > 0) {
						$('#table_item_lab tbody').empty();
						var checked = '';
						if (data.data.length === 1) {
							checked = 'checked';
						};
						$.each(data.data, function(i, v) {

							var highlight = 'odd';
							if ((i % 2) == 1) {
								highlight = 'even';
							};

							str = '<tr class="' + highlight + '">' +
								'<td align="center"><b>' + (i + 1) + '</b></td>' +
								'<td align="center">' + v.item + '</td>' +
								'<td align="right" class="aksi">' +
								'<input type="checkbox" ' + checked + ' name="itemdata" value="' + v
								.id + '|' + v.item + '" class="check_item_lab" />';
							'</td>' +
							'</tr>;'
							$('#table_item_lab tbody').append(str);

						});
						if (checked === 'checked') {
							simpan_item_lab();
						} else {
							$('#item_lab_modal').modal('show');
						}
					} else {
						messageCustom(data.message, 'Info');
					}
				} else {
					messageCustom(data.message, 'Info');
				}
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function simpan_item_lab() {
		var formitemlab = $('#formitemlab').serializeArray();
		var str = '[';
		var str_label = '';
		var buf = null;
		if (formitemlab.length > 0) {
			$.each(formitemlab, function(i, v) {
				buf = v.value.split('|');
				str += buf[0];
				str_label += buf[1];
				if (i < (formitemlab.length - 1)) {
					str += ',';
					str_label += ', ';
				};
			});
			str += ']';

			$('#hd_item_lab').val(str);
			$('#hd_item_lab_label').val(str_label);
			$('#item_lab_modal').modal('hide');
		} else {
			bootbox.dialog({
				message: "Anda belum memilih item pemeriksaan laboratorium!",
				title: "Peringatan!",
				buttons: {
					hapus: {
						label: '<i class="fa fa-check"></i>  OK',
						className: "btn-primary",
						callback: function() {

						}
					}
				}
			});
		}
	}

	function check_all() {
		$(".check_item_lab").each(function() {
			$(this).attr("checked", 'checked');
		});
	}

	function uncheck_all() {
		$(".check_item_lab").each(function() {
			$(this).removeAttr('checked');
		});
	}

	function add_laboratorium() {

		var stop = false;
		var is_cito = 'tidak';
		var checked = '';
		if ($('#is_cito_lab').is(':checked')) {
			checked = '&checkmark;';
			is_cito = 'ya';
		};

		if ($('#tindakan_laboratorium').val() === '') {
			syams_validation('#tindakan_laboratorium', 'Pemeriksaan harus diisi!');
			stop = true;
		};

		if (stop) {
			return false;
		};

		var str = '';
		var numb = $('.number_tindakan_lab').length;

		var tindakan = $('#s2id_tindakan_laboratorium a .select2-chosen').html();
		var id_tindakan = $('#tindakan_laboratorium').val();
		var tarif = $('#tarif_tindakan_lab').val();
		var itemdata = $('#hd_item_lab').val();
		var itemlabel = $('#hd_item_lab_label').val();

		if (tarif === '') {
			tarif = 0;
		};
		str = '<tr>' +
			'<td class="number_tindakan_lab" align="center">' + (++numb) + '</td>' +
			'<td align="center"><input type="hidden" name="tindakan_lab[]" value="' + id_tindakan + '"/>' + tindakan +
			'</td>' +
			'<td align="center"><input type="hidden" name="item_lab_label[]" value="' + itemlabel + '" />' + itemlabel +
			'</td>' +
			'<td align="center"><input type="hidden" name="item_lab[]" value="' + itemdata + '" />' + numberToCurrency(
				tarif) + '</td>' +
			'<td align="center"><input type="hidden" name="cito[]" value="' + is_cito + '" />' + checked + '</td>' +
			'<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-fw fa-trash-alt"></i></button>' +
			'</tr>';

		$('#table-lab tbody').append(str);
		$('#is_cito_lab').removeAttr(':checked');
		$('#s2id_tindakan_laboratorium a .select2-chosen').html('');
		$('#hd_item_lab').val('');
		$('#hd_item_lab_label').val('');
	}

	function hapus_list(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}

	function add_radiologi() {
		var stop = false;
		var is_cito = 'tidak';
		var checked = '';
		if ($('#is_cito_rad').is(':checked')) {
			checked = '&checkmark;';
			is_cito = 'ya';
		};

		if ($('#tindakan_radiologi').val() === '') {
			syams_validation('#tindakan_radiologi', 'Pemeriksaan harus diisi!');
			stop = true;
		};

		if (stop) {
			return false;
		};

		var str = '';
		var numb = $('.number_tindakan_rad').length;

		var tindakan = $('#s2id_tindakan_radiologi a .select2-chosen').html();
		var id_tindakan = $('#tindakan_radiologi').val();
		var tarif = $('#tarif_tindakan_rad').val();
		var itemdata = $('#hd_item_rad').val();
		var itemlabel = $('#hd_item_rad_label').val();

		if (tarif === '') {
			tarif = 0;
		};
		str = '<tr>' +
			'<td class="number_tindakan_rad" align="center">' + (++numb) + '</td>' +
			'<td align="center"><input type="hidden" name="tindakan_rad[]" value="' + id_tindakan + '"/>' + tindakan +
			'</td>' +
			'<td align="center"><input type="hidden" name="item_rad_label[]" value="' + itemlabel + '" />' + itemlabel +
			'</td>' +
			'<td align="center"><input type="hidden" name="item_rad[]" value="' + itemdata + '" />' + numberToCurrency(
				tarif) + '</td>' +
			'<td align="center"><input type="hidden" name="cito[]" value="' + is_cito + '" />' + checked + '</td>' +
			'<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-fw fa-trash-alt"></i></button>' +
			'</tr>';

		$('#table-rad tbody').append(str);
		$('#is_cito_rad').removeAttr('checked');
	}

	function simpan_request_lab() {
		var id_layanan_pendaftaran = $('#id_layanan_asal').val();
		var id_dokter = $('#dokter_rujuk').val();
		var stop = false;

		if (id_dokter === '') {
			syams_validation('#dokter_rujuk', 'Dokter harus diisi!');
			stop = true;
		};

		if (stop) {
			return false;
		};

		if ((id_layanan_pendaftaran !== '') & (id_dokter != '')) {
			if (klik === null) {
				klik = $.ajax({
					type: 'POST',
					url: '<?= base_url("pelayanan/api/pelayanan/order_laboratorium") ?>/',
					data: $('#formlab').serialize() + '&id_layanan=' + id_layanan_pendaftaran + '&dokter=' +
						id_dokter,
					cache: false,
					dataType: 'json',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						var tipe = 'Success';
						if (data.status === false) {
							tipe = 'error';
						}
						messageCustom(data.message, tipe);

						$('input[type=checkbox]').removeAttr('checked');
						$('#lab_modal').modal('hide');
						get_pemeriksaan_lab(id_layanan_pendaftaran);
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Gagal order pemeriksaan laboratorium', 'Error');
					}
				});
			}
		} else {
			messageCustom('info', 'Informasi', 'Pilih dulu dokter', '');
		}

	}

	function get_pemeriksaan_lab(id_layanan) {
		$('#req_lab').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_laboratorium_detail") ?>/id/' + id_layanan,
			cache: false,
			dataType: 'json',
			success: function(data) {
				if (data.length > 0) {
					var str = '';
					$.each(data, function(i, v) {
						var hapus_lab = '';
						if (v.waktu_hasil === null) {};

						str = '<table class="table table-sm table-detail table-striped">' +
							'<tr><td width="15%"><strong>Waktu Order</strong></td><td>' + ((v
								.waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '') +
							'</td></tr>' +
							'<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>' + ((v
								.waktu_hasil !== null) ? datetimefmysql(v.waktu_hasil) : '') +
							'</td></tr>' +
							'<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>' + v.dokter +
							'</td></tr>' +
							'<tr><td width="15%"><strong>Analis Laboratorium</strong></td><td>' + v
							.analis_lab + '</td></tr>' +
							'<tr><td width="15%"></td>' +
							'<td><button title="Klik untuk melihat order laboratorium" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetak_pemeriksaan_laboratorium(' +
							v.id + ')"><i class="fa fa-print"></i> Nota Order</button>' +
							'<button title="Klik untuk melihat hasil laboratorium" type="button" class="btn btn-secondary btn-xxs" onclick="cetak_hasil_laboratorium(' +
							v.id + ')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>' +
							'</tr>' +
							hapus_lab +
							'</table>';
						$('#req_lab').append(str);

						str =
							'<table class="table table-hover table-striped table-sm color-table info-table">' +
							'<thead><tr>' +
							'<th width="15%" class="left">Layanan</th>' +
							'<th width="40%" class="left"></th>' +
							'<th width="40%" class="left">Status</th>' +
							'<th align="center" width="5%"></th>' +
							'</tr></thead><tbody>';


						$.each(v.detail, function(j, x) {
							str += '<tr>' +
								'<td><b>' + j + '</b></td>' +
								'<td></td>' +
								'<td></td>' +
								'<td></td>' +
								'</tr>';

							var hapus = '';
							$.each(x, function(k, z) {
								if (z.status == 'Belum') {
									//hapus = '<button type="button" class="btn btn-default btn-xs" onclick="hapus_detail_lab(this, '+z.id+')"><i class="fa fa-trash-o"></i></button>';
								};
								str += '<tr>' +
									'<td></td>' +
									'<td>' + z.layanan_lab + '</td>' +
									'<td>' + z.konfirmasi + '</td>' +
									'<td align="center">' + hapus + '</td>' +
									'</tr>';
							});
						});

						str += '</tbody></table><br/><hr/>';
						$('#req_lab').append(str);
					});

				}
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function simpan_request_rad() {
		var id_layanan_pendaftaran = $('#id_layanan_asal_rad').val();
		var id_dokter = $('#dokter_rujuk_rad').val();
		var stop = false;

		if (id_dokter === '') {
			syams_validation('#dokter_rujuk_rad', 'Dokter harus diisi!');
			stop = true;
		};

		if (stop) {
			return false;
		};

		if ((id_layanan_pendaftaran !== '') & (id_dokter != '')) {
			if (klik === null) {
				klik = $.ajax({
					type: 'POST',
					url: '<?= base_url("pelayanan/api/pelayanan/order_radiologi") ?>/',
					data: $('#formrad').serialize() + '&id_layanan=' + id_layanan_pendaftaran + '&dokter=' +
						id_dokter,
					cache: false,
					dataType: 'json',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						var tipe = 'Success';
						if (data.status === false) {
							tipe = 'Error';
						}

						messageCustom(data.message, tipe);

						$('input[type=checkbox]').removeAttr('checked');
						$('#rad_modal').modal('hide');
						get_pemeriksaan_rad(id_layanan_pendaftaran);
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Gagal order pemeriksaan Radiologi', 'Error');
					}
				});
			}
		} else {
			messageCustom('Dokter Harus Dipilih', 'Info');
		}

	}

	function get_pemeriksaan_rad(id_layanan) {
		$('#req_rad').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_radiologi_detail") ?>/id/' + id_layanan,
			cache: false,
			dataType: 'json',
			success: function(data) {
				if (data.length > 0) {
					var str = '';
					$.each(data, function(i, v) {
						var hapus_rad = '';
						if (v.waktu_hasil === null) {};

						str = '<table class="table table-sm table-detail table-striped">' +
							'<tr><td width="15%"><strong>Waktu Order</strong></td><td>' + ((v
								.waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '') +
							'</td></tr>' +
							'<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>' + ((v
								.waktu_hasil !== null) ? datetimefmysql(v.waktu_hasil) : '') +
							'</td></tr>' +
							'<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>' + v.dokter +
							'</td></tr>' +
							'<tr><td width="15%"><strong>Radiografer</strong></td><td>' + v
							.radiografer + '</td></tr>' +
							'<tr><td width="15%"></td>' +
							'<td><button title="Klik untuk melihat order radiologi" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetak_pemeriksaan_radiologi(' +
							v.id + ')"><i class="fa fa-print"></i> Nota Order</button>' +
							'<button title="Klik untuk melihat hasil radiologi" type="button" class="btn btn-secondary btn-xxs" onclick="cetak_hasil_radiologi(' +
							v.id + ')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>' +
							'</tr>' +
							hapus_rad +
							'</table>';
						$('#req_rad').append(str);

						str =
							'<table class="table table-hover table-striped table-sm color-table info-table">' +
							'<thead><tr>' +
							'<th width="15%" class="left">Layanan</th>' +
							'<th width="40%" class="left"></th>' +
							'<th width="40%" class="left">Status</th>' +
							'<th align="center" width="5%"></th>' +
							'</tr></thead><tbody>';


						$.each(v.detail, function(j, x) {
							str += '<tr>' +
								'<td><b>' + j + '</b></td>' +
								'<td></td>' +
								'<td></td>' +
								'<td></td>' +
								'</tr>';

							var hapus = '';
							$.each(x, function(k, z) {
								if (z.status == 'Belum') {
									//hapus = '<button type="button" class="btn btn-default btn-xs" onclick="hapus_detail_lab(this, '+z.id+')"><i class="fa fa-trash-o"></i></button>';
								};
								str += '<tr>' +
									'<td></td>' +
									'<td>' + z.layanan_radiologi + '</td>' +
									'<td>' + z.konfirmasi + '</td>' +
									'<td align="center">' + hapus + '</td>' +
									'</tr>';
							});
						});

						str += '</tbody></table><br/><hr/>';
						$('#req_rad').append(str);
					});

				}
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function cetakFormRekamMedis(details, id) {
		$('#modal_cetak_form_rekam_medis').modal('show');
		$('#modal_cetak_form_rekam_medis_label').html('Cetak Form Rekam Medis');

		// Migrasi eRM
		// $('#btn_checklist_skrining_jatuh_rajal').click(function() {
		// 	cetakCheklistSkriningResikoJatuhRajal(details);
		// });

		//$('#btn_checklist_penerimaan_pasien_rawat_inap').click(function() {
		//	cetakChecklistPenerimaanPasienRawatInap(details);
		//});

		// Migrasi eRM
		/*
		// PI  
		$('#btn_pemberian_informasi').click(function() {
			cetakPemberianInformasi(details);
		});

		$('#btn_penolakan_tindakan_kedokteran').click(function() {
			cetakPenolakanTindakanKedokteran(details);
		});

		$('#btn_persetujuan_tindakan_anestesi').click(function() {
			cetakPersetujuanTindakanAnestesi(details);
		});

		$('#btn_persetujuan_tindakan_kedokteran').click(function() {
			cetakPersetujuanTindakanKedokteran(details);
		});

		$('#btn_persetujuan_tindakan_operasi').click(function() {
			cetakPersetujuanTindakanOperasi(details);
		});
		*/

		// $('#btn_resume_medis').click(function() {
		// 	cetakResumeMedis(details);
		// });

		// SPR
		$('#btn_surat_pengantar_rawat').click(function() {
			cetakSuratPengantarRawat(details);
		});

		$('#btn_tata_tertib_pasien').click(function() {
			cetakTataTertibPasien(details);
		});

		$('#btn_surat_persetujuan_rawat_inap').click(function() {
			cetakSuratPersetujuanRawatInap(details);
		});

		$('#btn_surat_keterangan_kematian').click(function() {
			cetakSuratKeteranganKematian(details);
		});
		//ERM
		//$('#btn_visum_et_repertum').click(function() {
		//	cetakVisumEtRepertum(details);
		//});

		// SSCRJ
		$('#btn_surgical_safety_ceklist_rawat_jalan').click(function() {
			cetakSurgicalSafetyCeklisRawatJalan(details);
		});
		// SKPM
		//$('#btn_surat_keterangan_pemeriksaan_mata').click(function() {
		//	cetakSuratKeteranganPemeriksaanMata(details);
		//});
	}

	// Migrasi eRM
	/*function cetakCheklistSkriningResikoJatuhRajal(details) {

		let detail = details.split('#');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_skrining_resiko_jatuh_rajal') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalSkrining();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-skrining-resiko-jatuh-rajal-title').html(
					`<b>Form Skrining Risiko Jatuh Rajal</b> |  No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);

				$('#id-layanan-pendaftaran-sr').val(detail[0]);
				$('#id-petugas').val(data.id_petugas);
				$('#id-users').val(data.id_users);
				$('#s2id_petugas-skrining a .select2c-chosen').html(data.nama_petugas);
				$('#tanggal-skrining').val(data.tanggal_skrining);

				if (data.check_1 === '1') {
					document.getElementById("check-1").checked = true;
				}
				if (data.check_2 === '1') {
					document.getElementById("check-2").checked = true;
				}
				if (data.check_3 === '1') {
					document.getElementById("check-3").checked = true;
				}
				if (data.check_4 === '1') {
					document.getElementById("check-4").checked = true;
				}
				if (data.check_5 === '1') {
					document.getElementById("check-5").checked = true;
				}
				if (data.check_6 === '1') {
					document.getElementById("check-6").checked = true;
				}
				if (data.check_7 === '1') {
					document.getElementById("check-7").checked = true;
				}
				if (data.check_8 === '1') {
					document.getElementById("check-8").checked = true;
				}
				if (data.check_9 === '1') {
					document.getElementById("check-9").checked = true;
				}
				if (data.check_10 === '1') {
					document.getElementById("check-10").checked = true;
				}
				if (data.check_11 === '1') {
					document.getElementById("check-11").checked = true;
				}
				if (data.check_12 === '1') {
					document.getElementById("check-12").checked = true;
				}
				if (data.check_13 === '1') {
					document.getElementById("check-13").checked = true;
				}
				if (data.check_14 === '1') {
					document.getElementById("check-14").checked = true;
				}
				if (data.check_15 === '1') {
					document.getElementById("check-15").checked = true;
				}
				if (data.resiko_jatuh === '1') {
					document.getElementById("resiko-jatuh").checked = true;
				}
				if (data.tidak_resiko_jatuh === '1') {
					document.getElementById("tidak-resiko-jatuh").checked = true;
				}
				if (data.tanda_tangan === '1') {
					document.getElementById("tanda-tangan").checked = true;
				}
				if (data.stiker === '1') {
					document.getElementById("stiker").checked = true;
				}
				if (data.edukasi_resiko_jatuh === '1') {
					document.getElementById("edukasi-resiko-jatuh").checked = true;
				}
				if (data.edukasi_lokasi === '1') {
					document.getElementById("edukasi-lokasi").checked = true;
				}
				if (data.edukasi_pencegahan === '1') {
					document.getElementById("edukasi-pencegahan").checked = true;
				}

				$('#modal-skrining-resiko-jatuh-rajal').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}*/

	/*function cetakChecklistPenerimaanPasienRawatInap(details) {
		let detail = details.split('#');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_checklist_penerimaan_pasien_rawat_inap') ?>/id/' +
				detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
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
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}*/

	// Migrasi eRM
	/*function cetakPemberianInformasi(details) {

		let detail = details.split('#');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_pemberian_informasi') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalPemberianInformasi();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-pemberian-informasi-title').html(
					`<b>Form Pemberian Informasi</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);
				$('#id-layanan-pendaftaran-pi').val(detail[0]);
				$('#nama-keluarga-pi').val(data.nama_keluarga);
				$('#id-dokter-pelaksana-tindakan-pi').val(data.id_dokter_pelaksana_tindakan);
				$('#s2id_dokter-pelaksana-tindakan-pi a .select2c-chosen').html(data.nama_dokter_pelaksana);
				$('#penerima-informasi-pi').val(data.penerima_informasi);
				$('#pemberi-informasi-pi').val(data.pemberi_informasi);
				$('#diagnosis-kerja-pi').val(data.diagnosis_kerja);
				$('#dasar-diagnosis-pi').val(data.dasar_diagnosis);
				$('#tindakan-kedokteran-pi').val(data.tindakan_kedokteran);
				$('#indikasi-tindakan-pi').val(data.indikasi_tindakan);
				$('#tata-cara-pi').val(data.tata_cara);
				$('#tujuan-pi').val(data.tujuan);
				$('#risiko-komplikasi-pi').val(data.risiko_komplikasi);
				$('#prognosis-pi').val(data.prognosis);
				$('#alternatif-resiko-pi').val(data.alternatif_resiko);
				$('#menyelamatkan-pasien-pi').val(data.menyelamatkan_pasien);
				$('#penggunaan-darah-pi').val(data.penggunaan_darah);
				$('#analgesia-pi').val(data.analgesia);

				if (data.is_pasien === '1') {
                    document.getElementById("is-pasien-pi-ya").checked = true;
                    // Disabled fields
                    $("#nama-keluarga-pi").prop("disabled", true);
                    $("#pemberi-informasi-pi").prop("disabled", true);
                    $("#penerima-informasi-pi").prop("disabled", true);
                } else if (data.is_pasien === '0') {
                    document.getElementById("is-pasien-pi-tidak").checked = true;
                    // Undisabled fields
                    $("#nama-keluarga-pi").prop("disabled", false);
                    $("#pemberi-informasi-pi").prop("disabled", false);
                    $("#penerima-informasi-pi").prop("disabled", false);
                }

				if (data.diagnosis_kerja_check === '1') {
					document.getElementById("diagnosis-kerja-check-pi").checked = true;
				}

				if (data.dasar_diagnosis_check === '1') {
					document.getElementById("dasar-diagnosis-check-pi").checked = true;
				}

				if (data.tindakan_kedokteran_check === '1') {
					document.getElementById("tindakan-kedokteran-check-pi").checked = true;
				}

				if (data.indikasi_tindakan_check === '1') {
					document.getElementById("indikasi-tindakan-check-pi").checked = true;
				}

				if (data.tata_cara_check === '1') {
					document.getElementById("tata-cara-check-pi").checked = true;
				}

				if (data.tujuan_check === '1') {
					document.getElementById("tujuan-check-pi").checked = true;
				}

				if (data.risiko_komplikasi_check === '1') {
					document.getElementById("risiko-komplikasi-check-pi").checked = true;
				}

				if (data.prognosis_check === '1') {
					document.getElementById("prognosis-check-pi").checked = true;
				}

				if (data.alternatif_resiko_check === '1') {
					document.getElementById("alternatif-resiko-check-pi").checked = true;
				}

				if (data.menyelamatkan_pasien_check === '1') {
					document.getElementById("menyelamatkan-pasien-check-pi").checked = true;
				}

				if (data.penggunaan_darah_check === '1') {
					document.getElementById("penggunaan-darah-check-pi").checked = true;
				}

				if (data.analgesia_check === '1') {
					document.getElementById("analgesia-check-pi").checked = true;
				}

				$('#modal-pemberian-informasi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}*/

	// Migrasi eRM
	/*function cetakPenolakanTindakanKedokteran(details) {
		let detail = details.split('#');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_penolakan_tindakan_kedokteran') ?>/id/' + detail[
				0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalPenolakanTindakanKedokteran();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-penolakan-tindakan-kedokteran-title').html(
					`<b>Form Penolakan Tindakan Kedokteran</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);
				$('#nama-keluarga').val(data.nama_keluarga);
				$('#tanggal-lahir').val(datefmysql(data.tanggal_lahir));
				$('#id-layanan-pendaftaran-form').val(detail[0]);
				$('#alamat-form-rekam-medis').val(data.alamat);
				$('#hubungan-keluarga').val(data.hubungan_keluarga);
				$('#tindakan').val(data.tindakan);
				$('#id-saksi-1').val(data.id_saksi_1);
				$('#id-saksi-2').val(data.id_saksi_2);
				$('#s2id_saksi-1 a .select2c-chosen').html(data.nama_saksi_1);
				$('#s2id_saksi-2 a .select2c-chosen').html(data.nama_saksi_2);

				if (data.is_pasien === '1') {
					document.getElementById("is-pasien-ya").checked = true;
					// Disabled fields
					$("#nama-keluarga").prop("disabled", true);
					$("#tanggal-lahir").prop("disabled", true);
					$("#laki-laki").prop("disabled", true);
					$("#perempuan").prop("disabled", true);
					$("#alamat-form-rekam-medis    ").prop("disabled", true);
					$("#hubungan-keluarga").prop("disabled", true);
				} else if (data.is_pasien === '0') {
					document.getElementById("is-pasien-tidak").checked = true;
					// Undisabled fields
					$("#nama-keluarga").prop("disabled", false);
					$("#tanggal-lahir").prop("disabled", false);
					$("#laki-laki").prop("disabled", false);
					$("#perempuan").prop("disabled", false);
					$("#alamat-form-rekam-medis    ").prop("disabled", false);
					$("#hubungan-keluarga").prop("disabled", false);
				}

				if (data.jenis_kelamin == 'Laki-laki') {
					document.getElementById("laki-laki").checked = true;
				} else if (data.jenis_kelamin == 'Perempuan') {
					document.getElementById("perempuan").checked = true;
				}

				$('#modal_penolakan_tindakan_kedokteran').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}*/

	/*function cetakPersetujuanTindakanAnestesi(details) {
		let detail = details.split('#');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_persetujuan_tindakan_anestesi') ?>/id/' + detail[
				0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalPersetujuanTindakanAnestesi();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-persetujuan-tindakan-anestesi-title').html(
					`<b>Form Persetujuan Tindakan Anestesi</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);
				$('#nama-keluarga-mpta').val(data.nama_keluarga);
				$('#tanggal-lahir-mpta').val(datefmysql(data.tanggal_lahir));
				$('#id-layanan-pendaftaran-form-mpta').val(detail[0]);
				$('#alamat-form-rekam-medis-mpta').val(data.alamat);
				$('#hubungan-keluarga-mpta').val(data.hubungan_keluarga);
				$('#tindakan-mpta').val(data.tindakan);
				$('#id-saksi-1-mpta').val(data.id_saksi_1);
				$('#id-saksi-2-mpta').val(data.id_saksi_2);
				$('#s2id_saksi-1-mpta a .select2c-chosen').html(data.nama_saksi_1);
				$('#s2id_saksi-2-mpta a .select2c-chosen').html(data.nama_saksi_2);

				if (data.is_pasien === '1') {
					document.getElementById("is-pasien-ya-mpta").checked = true;
					// Disabled fields
					$("#nama-keluarga-mpta").prop("disabled", true);
					$("#tanggal-lahir-mpta").prop("disabled", true);
					$("#laki-laki-mpta").prop("disabled", true);
					$("#perempuan-mpta").prop("disabled", true);
					$("#alamat-form-rekam-medis-mpta   ").prop("disabled", true);
					$("#hubungan-keluarga-mpta").prop("disabled", true);
				} else if (data.is_pasien === '0') {
					document.getElementById("is-pasien-tidak-mpta").checked = true;
					// Undisabled fields
					$("#nama-keluarga-mpta").prop("disabled", false);
					$("#tanggal-lahir-mpta").prop("disabled", false);
					$("#laki-laki-mpta").prop("disabled", false);
					$("#perempuan-mpta").prop("disabled", false);
					$("#alamat-form-rekam-medis-mpta   ").prop("disabled", false);
					$("#hubungan-keluarga-mpta").prop("disabled", false);
				}

				if (data.jenis_kelamin == 'Laki-laki') {
					document.getElementById("laki-laki-mpta").checked = true;
				} else if (data.jenis_kelamin == 'Perempuan') {
					document.getElementById("perempuan-mpta").checked = true;
				}

				$('#modal_persetujuan_tindakan_anestesi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}*/

	/*function cetakPersetujuanTindakanKedokteran(details) {
		let detail = details.split('#');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_persetujuan_tindakan_kedokteran') ?>/id/' +
				detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalPersetujuanTindakanKedokteran();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-persetujuan-tindakan-kedokteran-title').html(
					`<b>Form Persetujuan Tindakan Kedokteran</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`
				);
				$('#nama-keluarga-mptk').val(data.nama_keluarga);
				$('#tanggal-lahir-mptk').val(datefmysql(data.tanggal_lahir));
				$('#id-layanan-pendaftaran-form-mptk').val(detail[0]);
				$('#alamat-form-rekam-medis-mptk').val(data.alamat);
				$('#hubungan-keluarga-mptk').val(data.hubungan_keluarga);
				$('#tindakan-mptk').val(data.tindakan);
				$('#id-saksi-1-mptk').val(data.id_saksi_1);
				$('#id-saksi-2-mptk').val(data.id_saksi_2);
				$('#s2id_saksi-1-mptk a .select2c-chosen').html(data.nama_saksi_1);
				$('#s2id_saksi-2-mptk a .select2c-chosen').html(data.nama_saksi_2);

				if (data.is_pasien === '1') {
					document.getElementById("is-pasien-ya-mptk").checked = true;
					// Disabled fields
					$("#nama-keluarga-mptk").prop("disabled", true);
					$("#tanggal-lahir-mptk").prop("disabled", true);
					$("#laki-laki-mptk").prop("disabled", true);
					$("#perempuan-mptk").prop("disabled", true);
					$("#alamat-form-rekam-medis-mptk   ").prop("disabled", true);
					$("#hubungan-keluarga-mptk").prop("disabled", true);
				} else if (data.is_pasien === '0') {
					document.getElementById("is-pasien-tidak-mptk").checked = true;
					// Undisabled fields
					$("#nama-keluarga-mptk").prop("disabled", false);
					$("#tanggal-lahir-mptk").prop("disabled", false);
					$("#laki-laki-mptk").prop("disabled", false);
					$("#perempuan-mptk").prop("disabled", false);
					$("#alamat-form-rekam-medis-mptk   ").prop("disabled", false);
					$("#hubungan-keluarga-mptk").prop("disabled", false);
				}

				if (data.jenis_kelamin == 'Laki-laki') {
					document.getElementById("laki-laki-mptk").checked = true;
				} else if (data.jenis_kelamin == 'Perempuan') {
					document.getElementById("perempuan-mptk").checked = true;
				}

				$('#modal-persetujuan-tindakan-kedokteran').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}*/

	/*function cetakPersetujuanTindakanOperasi(details) {
		let detail = details.split('#');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_persetujuan_tindakan_operasi') ?>/id/' + detail[
				0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalPersetujuanTindakanOperasi();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-persetujuan-tindakan-operasi-title').html(
					`<b>Form Persetujuan Tindakan Operasi</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);
				$('#nama-keluarga-mpto').val(data.nama_keluarga);
				$('#tanggal-lahir-mpto').val(datefmysql(data.tanggal_lahir));
				$('#id-layanan-pendaftaran-form-mpto').val(detail[0]);
				$('#alamat-form-rekam-medis-mpto').val(data.alamat);
				$('#hubungan-keluarga-mpto').val(data.hubungan_keluarga);
				$('#tindakan-mpto').val(data.tindakan);
				$('#id-saksi-1-mpto').val(data.id_saksi_1);
				$('#id-saksi-2-mpto').val(data.id_saksi_2);
				$('#s2id_saksi-1-mpto a .select2c-chosen').html(data.nama_saksi_1);
				$('#s2id_saksi-2-mpto a .select2c-chosen').html(data.nama_saksi_2);

				if (data.is_pasien === '1') {
					document.getElementById("is-pasien-ya-mpto").checked = true;
					// Disabled fields
					$("#nama-keluarga-mpto").prop("disabled", true);
					$("#tanggal-lahir-mpto").prop("disabled", true);
					$("#laki-laki-mpto").prop("disabled", true);
					$("#perempuan-mpto").prop("disabled", true);
					$("#alamat-form-rekam-medis-mpto").prop("disabled", true);
					$("#hubungan-keluarga-mpto").prop("disabled", true);
				} else if (data.is_pasien === '0') {
					document.getElementById("is-pasien-tidak-mpto").checked = true;
					// Undisabled fields
					$("#nama-keluarga-mpto").prop("disabled", false);
					$("#tanggal-lahir-mpto").prop("disabled", false);
					$("#laki-laki-mpto").prop("disabled", false);
					$("#perempuan-mpto").prop("disabled", false);
					$("#alamat-form-rekam-medis-mpto   ").prop("disabled", false);
					$("#hubungan-keluarga-mpto").prop("disabled", false);
				}

				if (data.jenis_kelamin == 'Laki-laki') {
					document.getElementById("laki-laki-mpto").checked = true;
				} else if (data.jenis_kelamin == 'Perempuan') {
					document.getElementById("perempuan-mpto").checked = true;
				}

				$('#modal-persetujuan-tindakan-operasi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}*/

	function cetakResumeMedis(details) {
		let detail = details.split('#');
		window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + detail[0], 'Cetak Resume Medis', 'width=' +
			dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	// function cetakSuratPengantarRawat(details) {
	// 	var dWidth = $(window).width();
	// 	var dHeight = $(window).height();
	// 	var x = screen.width / 2 - dWidth / 2;
	// 	var y = screen.height / 2 - dHeight / 2;

	// 	let detail = details.split('#');

	// 	window.open('<?= base_url('pemeriksaan_poli/cetak_surat_pengantar_rawat/') ?>' + detail[0], 'Cetak Surat Pengantar Rawat',
	// 		'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	// }


	// SPR +++
	function cetakSuratPengantarRawat(details) {
		let detail = details.split('#');
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/surat_pengantar_rawat') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetSuratPengantarRawat();
				$('#modal-surat-pengantar-rawat-title').html(`<b>Form Surat Pengantar Rawat</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
				$('#id-layanan-pendaftaran-spr').val(detail[0]);
				$('#id-users').val(data.id_users);

				if (data.operasi_spr === '1') {
					document.getElementById("operasi-spr").checked = true;
				}
				if (data.odc_spr === '1') {
					document.getElementById("odc-spr").checked = true;
				}
				if (data.rawat_inap_spr === '1') {
					document.getElementById("rawat-inap-spr").checked = true;
				}


				// OLD
				// if (data.is_pasien_spr === '1') {
				// 	document.getElementById("is-pasien-spr-1").checked = true;
				// 	// Disabled fields
				// 	$("#nama-pasien-spr").prop("disabled", true);
				// 	$("#j-spr-1").prop("disabled", true);
				// 	$("#j-spr-2").prop("disabled", true);
				// 	$("#no-rm-spr").prop("disabled", true);
				// 	$("#umur-spr").prop("disabled", true);
				// } else if (data.is_pasien_spr === '0') {
				// 	document.getElementById("is-pasien-spr-2").checked = true;
				// 	// Undisabled fields
				// 	$("#nama-pasien-spr").prop("disabled", false);
				// 	$("#j-spr-1").prop("disabled", false);
				// 	$("#j-spr-2").prop("disabled", false);
				// 	$("#no-rm-spr").prop("disabled", false);
				// 	$("#umur-spr").prop("disabled", false);
				// }

				// BARU
				if (data.is_pasien_spr === '1') {
					document.getElementById("is-pasien-spr-1").checked = true;
					// Disabled fields
					$("#nama-pasien-spr").prop("disabled", true);
					$("#j-spr-1").prop("disabled", true);
					$("#j-spr-2").prop("disabled", true);
					$("#no-rm-spr").prop("disabled", true);
					$("#umur-spr").prop("disabled", true);
				} else if (data.is_pasien_spr === '0') {
					// document.getElementById("is-pasien-spr-2").checked = true;
					// Undisabled fields
					$("#nama-pasien-spr").prop("disabled", true);
					$("#j-spr-1").prop("disabled", true);
					$("#j-spr-2").prop("disabled", true);
					$("#no-rm-spr").prop("disabled", true);
					$("#umur-spr").prop("disabled", true);
				}
				if (data.j_spr == 'Laki-laki') {
					document.getElementById("j-spr-1").checked = true;
				} else if (data.j_spr == 'Perempuan') {
					document.getElementById("j-spr-2").checked = true;
				}

				$('#diagnosis-spr').val(data.diagnosis_spr);
				if (data.infeksi_spr === '1') {
					document.getElementById("infeksi-spr").checked = true;
				}
				if (data.non_infeksi_spr === '1') {
					document.getElementById("non-infeksi-spr").checked = true;
				}
				$('#dokter-spr').val(data.dokter_spr);
				$('#s2id_dokter-spr a .select2c-chosen').html(data.nama_dokter_1);
				$('#jto-spr').val(data.jto_spr);
				$('#gto-spr').val(data.gto_spr);
				if (data.cito_spr === '1') {
					document.getElementById("cito-spr").checked = true;
				}
				if (data.tidak_cito_spr === '1') {
					document.getElementById("tidak-cito-spr").checked = true;
				}
				if (data.icu_spr === '1') {
					document.getElementById("icu-spr").checked = true;
				}
				if (data.hcu_spr === '1') {
					document.getElementById("hcu-spr").checked = true;
				}
				if (data.pcu_spr === '1') {
					document.getElementById("pcu-spr").checked = true;
				}
				if (data.nicu_spr === '1') {
					document.getElementById("nicu-spr").checked = true;
				}
				if (data.vk_spr === '1') {
					document.getElementById("vk-spr").checked = true;
				}
				if (data.perinatologi_spr === '1') {
					document.getElementById("perinatologi-spr").checked = true;
				}
				if (data.ruang_perawatan_spr === '1') {
					document.getElementById("ruang-perawatan-spr").checked = true;
				}
				$('#rp-spr').val(data.rp_spr);
				if (data.isolasi_spr === '1') {
					document.getElementById("isolasi-spr").checked = true;
				}
				if (data.lain_lain_spr === '1') {
					document.getElementById("lain-lain-spr").checked = true;
				}
				$('#ll-spr').val(data.ll_spr);
				$('#tanggal-dokter-spr').val(data.tanggal_dokter_spr);
				$('#ttd-dokter-spr').val(data.ttd_dokter_spr);
				$('#s2id_ttd-dokter-spr a .select2c-chosen').html(data.nama_dokter_2);
				if (data.ceklis_dokter_spr === '1') {
					document.getElementById("ceklis-dokter-spr").checked = true;
				}
				$('#catatan-pendaftaran-spr').val(data.catatan_pendaftaran_spr);
				$('#tanggal-petugas-spr').val(data.tanggal_petugas_spr);
				if (data.ceklis_petugas_spr === '1') {
					document.getElementById("ceklis-petugas-spr").checked = true;
				}
				$('#id-petugas-pendaftaran-spr').val(data.id_petugas_pendaftaran_spr);
				$('#s2id_id-petugas-pendaftaran-spr a .select2c-chosen').html(data.nama_petugas_pendaftaran);
				$('#modal_surat_pengantar_rawat').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	// SPR +++
	function resetSuratPengantarRawat() {
		$('#form_surat_keterangan_pengantar_rawat').val('');
		$('#id-layanan-pendaftaran-spr').val('');
		$('#id-users').val('');
		$('#nama-pasien-spr').val('');
		$('#no-rm-spr').val('');
		$('#umur-spr').val('');
		$('#diagnosis-spr').val('');
		$('#dokter-spr').val('');
		$('#jto-spr').val('');
		$('#gto-spr').val('');
		$('#rp-spr').val('');
		$('#ll-spr').val('');
		$('#tanggal-dokter-spr').val('');
		$('#ttd-dokter-spr').val('');
		$('#catatan-pendaftaran-spr').val('');
		$('#tanggal-petugas-spr').val('');
		$('#id-petugas-pendaftaran-spr').val('');

		document.getElementById("operasi-spr").checked = false;
		document.getElementById("odc-spr").checked = false;
		document.getElementById("rawat-inap-spr").checked = false;
		document.getElementById("j-spr-1").checked = false;
		document.getElementById("j-spr-2").checked = false;
		document.getElementById("infeksi-spr").checked = false;
		document.getElementById("non-infeksi-spr").checked = false;
		document.getElementById("cito-spr").checked = false;
		document.getElementById("tidak-cito-spr").checked = false;
		document.getElementById("icu-spr").checked = false;
		document.getElementById("hcu-spr").checked = false;
		document.getElementById("pcu-spr").checked = false;
		document.getElementById("nicu-spr").checked = false;
		document.getElementById("vk-spr").checked = false;
		document.getElementById("perinatologi-spr").checked = false;
		document.getElementById("ruang-perawatan-spr").checked = false;
		document.getElementById("isolasi-spr").checked = false;
		document.getElementById("lain-lain-spr").checked = false;
		document.getElementById("ceklis-dokter-spr").checked = false;
		document.getElementById("ceklis-petugas-spr").checked = false;

		// $("#nama-pasien-spr").prop("disabled", false);
		// $("#j-spr-1").prop("disabled", false);
		// $("#j-spr-2").prop("disabled", false);
		// $("#no-rm-spr").prop("disabled", false);
		// $("#umur-spr").prop("disabled", false);

		$("#nama-pasien-spr").prop("disabled", true);
		$("#j-spr-1").prop("disabled", true);
		$("#j-spr-2").prop("disabled", true);
		$("#no-rm-spr").prop("disabled", true);
		$("#umur-spr").prop("disabled", true);
	}



	function cetakSuratPersetujuanRawatInap(details) {
		let detail = details.split('#');

		bootbox.dialog({
			message: "Apakah yang menandatangani adalah pasien sendiri?",
			title: "Tanda Tangan Pasien",
			buttons: {
				tidak: {
					label: '<i class="fas fa-window-close"></i> Tidak',
					className: "btn-secondary",
					callback: function() {
						var dWidth = $(window).width();
						var dHeight = $(window).height();
						var x = screen.width / 2 - dWidth / 2;
						var y = screen.height / 2 - dHeight / 2;

						window.open('<?= base_url('pemeriksaan_poli/cetak_persetujuan_rawat_inap/') ?>' + detail[0] +
							'/tidak', 'Cetak Persetujuan Rawat Inap', 'width=' + dWidth + ', height=' +
							dHeight + ', left=' + x + ', top=' + y);
					}
				},
				ya: {
					label: '<i class="fas fa-check"></i>  Ya',
					className: "btn-success",
					callback: function() {
						var dWidth = $(window).width();
						var dHeight = $(window).height();
						var x = screen.width / 2 - dWidth / 2;
						var y = screen.height / 2 - dHeight / 2;

						window.open('<?= base_url('pemeriksaan_poli/cetak_persetujuan_rawat_inap/') ?>' + detail[0] +
							'/ya', 'Cetak Persetujuan Rawat Inap', 'width=' + dWidth + ', height=' +
							dHeight + ', left=' + x + ', top=' + y);
					}
				}
			}
		});
	}


	function cetakTataTertibPasien(details) {
		let detail = details.split('#');
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_tata_tertib') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Reset all values first
				resetModalTataTertib();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-tata-tertib-title').html(
					`<b>Form Tata Tertib</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);
				$('#id-layanan-pendaftaran-ttb').val(detail[0]);
				$('#nama-keluarga-ttb').val(data.nama_keluarga);
				$('#no-telp-ttb').val(data.no_telp);

				if (data.is_pasien == 1) {
					document.getElementById("is-pasien-ttb-ya").checked = true;
				} else if (data.is_pasien == 0) {
					document.getElementById("is-pasien-ttb-tidak").checked = true;
				}

				$('#modal_tata_tertib').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function resetModalTataTertib() {
		// Undisabled fields
		$("#nama-keluarga-ttb").prop("disabled", false);
		$("#no-telp-ttb").prop("disabled", false);

		// Set default fields
		$('#nama-keluarga-ttb').val('');
		$('#no-telp-ttb').val('');
		$('#id-layanan-pendaftaran-ttb').val('');

		// Unchecked fields
		document.getElementById("is-pasien-ttb-ya").checked = false;
		document.getElementById("is-pasien-ttb-tidak").checked = false;
	}

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
		document.getElementById("perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-tidak").checked =
			false;
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

	//MigraSI eRM
	/*function resetModalPemberianInformasi() {
		// Set default fields
		$('#id-layanan-pendaftaran-pi').val('');
		$('#nama-keluarga-pi').val('');
		$('#id-dokter-pelaksana-tindakan-pi').val('');
		$('#pemberi-informasi-pi').val('');
		$('#penerima-informasi-pi').val('');
		$('#diagnosis-kerja-pi').val('');
		$('#dasar-diagnosis-pi').val('');
		$('#tindakan-kedokteran-pi').val('');
		$('#indikasi-tindakan-pi').val('');
		$('#tata-cara-pi').val('');
		$('#tujuan-pi').val('');
		$('#risiko-komplikasi-pi').val('');
		$('#prognosis-pi').val('');
		$('#alternatif-resiko-pi').val('');
		$('#menyelamatkan-pasien-pi').val('');
		$('#penggunaan-darah-pi').val('');
		$('#analgesia-pi').val('');
		$('#s2id_dokter-pelaksana-tindakan-pi a .select2c-chosen').html('Silahkan dipilih');

		// Undisabled fields
		$("#nama-keluarga-pi").prop("disabled", false);
        $("#pemberi-informasi-pi").prop("disabled", false);
        $("#penerima-keluarga-pi").prop("disabled", false);

		// Unchecked fields
		document.getElementById("is-pasien-pi-ya").checked = false;
		document.getElementById("is-pasien-pi-tidak").checked = false;
		document.getElementById("diagnosis-kerja-check-pi").checked = false;
		document.getElementById("dasar-diagnosis-check-pi").checked = false;
		document.getElementById("tindakan-kedokteran-check-pi").checked = false;
		document.getElementById("indikasi-tindakan-check-pi").checked = false;
		document.getElementById("tata-cara-check-pi").checked = false;
		document.getElementById("tujuan-check-pi").checked = false;
		document.getElementById("risiko-komplikasi-check-pi").checked = false;
		document.getElementById("prognosis-check-pi").checked = false;
		document.getElementById("alternatif-resiko-check-pi").checked = false;
		document.getElementById("menyelamatkan-pasien-check-pi").checked = false;
		document.getElementById("penggunaan-darah-check-pi").checked = false;
		document.getElementById("analgesia-check-pi").checked = false;
	}*/

	//MigraSI eRM
	/*function resetModalSkrining() {
		// Set default fields
		$('#id-layanan-pendaftaran-sr').val('');
		$('#id-petugas').val('');
		$('#id-users').val('');
		$('#tanggal-skrining').val('');
		$('#s2id_petugas-skrining a .select2c-chosen').html('');

		// Undisabled fields
		$("#resiko-jatuh").prop("disabled", false);
		$("#tidak-resiko-jatuh").prop("disabled", false);

		// Unchecked fields
		document.getElementById("check-1").checked = false;
		document.getElementById("check-2").checked = false;
		document.getElementById("check-3").checked = false;
		document.getElementById("check-4").checked = false;
		document.getElementById("check-5").checked = false;
		document.getElementById("check-6").checked = false;
		document.getElementById("check-7").checked = false;
		document.getElementById("check-8").checked = false;
		document.getElementById("check-9").checked = false;
		document.getElementById("check-10").checked = false;
		document.getElementById("check-11").checked = false;
		document.getElementById("check-12").checked = false;
		document.getElementById("check-13").checked = false;
		document.getElementById("check-14").checked = false;
		document.getElementById("check-15").checked = false;
		document.getElementById("resiko-jatuh").checked = false;
		document.getElementById("tidak-resiko-jatuh").checked = false;
		document.getElementById("tanda-tangan").checked = false;
		document.getElementById("stiker").checked = false;
		document.getElementById("edukasi-resiko-jatuh").checked = false;
		document.getElementById("edukasi-lokasi").checked = false;
		document.getElementById("edukasi-pencegahan").checked = false;
	} */

	//MigraSI eRM
	/*function resetModalPenolakanTindakanKedokteran() {
		// Set default fields
		$('#id-layanan-pendaftaran-form').val('');
		$('#nama-keluarga').val('');
		$('#tanggal-lahir').val('');
		$('#alamat-form-rekam-medis').val('');
		$('#hubungan-keluarga').val('');
		$('#tindakan').val('');
		$('#id-saksi-1').val('');
		$('#id-saksi-2').val('');
		$('#s2id_saksi-1 a .select2c-chosen').html('Silahkan dipilih');
		$('#s2id_saksi-2 a .select2c-chosen').html('Silahkan dipilih');

		// Unchecked fields
		document.getElementById("laki-laki").checked = false;
		document.getElementById("perempuan").checked = false;
		document.getElementById("is-pasien-ya").checked = false;
		document.getElementById("is-pasien-tidak").checked = false;

		// Undisabled fields
		$("#nama-keluarga").prop("disabled", false);
		$("#tanggal-lahir").prop("disabled", false);
		$("#laki-laki").prop("disabled", false);
		$("#perempuan").prop("disabled", false);
		$("#alamat-form-rekam-medis    ").prop("disabled", false);
		$("#hubungan-keluarga").prop("disabled", false);
	}*/

	//MigraSI eRM
	/*function resetModalPersetujuanTindakanAnestesi() {
		// Set default fields
		$('#id-layanan-pendaftaran-form-mpta').val('');
		$('#nama-keluarga-mpta').val('');
		$('#tanggal-lahir-mpta').val('');
		$('#alamat-form-rekam-medis-mpta').val('');
		$('#hubungan-keluarga-mpta').val('');
		$('#tindakan-mpta').val('');
		$('#id-saksi-1-mpta').val('');
		$('#id-saksi-2-mpta').val('');
		$('#s2id_saksi-1-mpta a .select2c-chosen').html('Silahkan dipilih');
		$('#s2id_saksi-2-mpta a .select2c-chosen').html('Silahkan dipilih');

		// Unchecked fields
		document.getElementById("laki-laki-mpta").checked = false;
		document.getElementById("perempuan-mpta").checked = false;
		document.getElementById("is-pasien-ya-mpta").checked = false;
		document.getElementById("is-pasien-tidak-mpta").checked = false;

		// Undisabled fields
		$("#nama-keluarga-mpta").prop("disabled", false);
		$("#tanggal-lahir-mpta").prop("disabled", false);
		$("#laki-laki-mpta").prop("disabled", false);
		$("#perempuan-mpta").prop("disabled", false);
		$("#alamat-form-rekam-medis-mpta").prop("disabled", false);
		$("#hubungan-keluarga-mpta").prop("disabled", false);
	}*/

	//MigraSI eRM
	/*function resetModalPersetujuanTindakanKedokteran() {
		// Set default fields
		$('#id-layanan-pendaftaran-form-mptk').val('');
		$('#nama-keluarga-mptk').val('');
		$('#tanggal-lahir-mptk').val('');
		$('#alamat-form-rekam-medis-mptk').val('');
		$('#hubungan-keluarga-mptk').val('');
		$('#tindakan-mptk').val('');
		$('#id-saksi-1-mptk').val('');
		$('#id-saksi-2-mptk').val('');
		$('#s2id_saksi-1-mptk a .select2c-chosen').html('Silahkan dipilih');
		$('#s2id_saksi-2-mptk a .select2c-chosen').html('Silahkan dipilih');

		// Unchecked fields
		document.getElementById("laki-laki-mptk").checked = false;
		document.getElementById("perempuan-mptk").checked = false;
		document.getElementById("is-pasien-ya-mptk").checked = false;
		document.getElementById("is-pasien-tidak-mptk").checked = false;

		// Undisabled fields
		$("#nama-keluarga-mptk").prop("disabled", false);
		$("#tanggal-lahir-mptk").prop("disabled", false);
		$("#laki-laki-mptk").prop("disabled", false);
		$("#perempuan-mptk").prop("disabled", false);
		$("#alamat-form-rekam-medis-mptk").prop("disabled", false);
		$("#hubungan-keluarga-mptk").prop("disabled", false);
	}*/

	// Migrasi ERM
	/*function resetModalPersetujuanTindakanOperasi() {
		// Set default fields
		$('#id-layanan-pendaftaran-form-mpto').val('');
		$('#nama-keluarga-mpto').val('');
		$('#tanggal-lahir-mpto').val('');
		$('#alamat-form-rekam-medis-mpto').val('');
		$('#hubungan-keluarga-mpto').val('');
		$('#tindakan-mpto').val('');
		$('#id-saksi-1-mpto').val('');
		$('#id-saksi-2-mpto').val('');
		$('#s2id_saksi-1-mpto a .select2c-chosen').html('Silahkan dipilih');
		$('#s2id_saksi-2-mpto a .select2c-chosen').html('Silahkan dipilih');

		// Unchecked fields
		document.getElementById("laki-laki-mpto").checked = false;
		document.getElementById("perempuan-mpto").checked = false;
		document.getElementById("is-pasien-ya-mpto").checked = false;
		document.getElementById("is-pasien-tidak-mpto").checked = false;

		// Undisabled fields
		$("#nama-keluarga-mpto").prop("disabled", false);
		$("#tanggal-lahir-mpto").prop("disabled", false);
		$("#laki-laki-mpto").prop("disabled", false);
		$("#perempuan-mpto").prop("disabled", false);
		$("#alamat-form-rekam-medis-mpto").prop("disabled", false);
		$("#hubungan-keluarga-mpto").prop("disabled", false);
	}*/

	// Migrasi ERM
	/*function cetakVisumEtRepertum(details) {
		let detail = details.split('#');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_visum_et_repertum') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalVisumEtRepertum();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-visum-et-repertum-title').html(`<b>Form Visum Et Repertum</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
				$('#id-pendaftaran-ver').val(detail[0]);
				$('#id-dokter-jaga-idg-ver').val(data.id_dokter_igd);
				$('#nomor-visum-ver').val(data.nomor_visum);
				$('#nomor-surat-ver').val(data.nomor_surat);
				$('#tahun-surat-ver').val(data.tahun_surat);
				$('#diperiksa-ver').val(datetimefmysql(data.diperiksa));
				$('#diterima-ver').val(datetimefmysql(data.diterima));
				$('#nomor-polisi-ver').val(data.nomor_polisi);
				$('#ditandatangani-oleh-ver').val(data.ditandatangani_oleh);
				$('#pangkat-ver').val(data.pangkat);
				$('#nrp-ver').val(data.nrp);
				$('#berat-badan-ver').val(data.berat_badan);
				$('#panjang-badan-ver').val(data.panjang_badan);
				$('#warna-kulit-ver').val(data.warna_kulit);
				$('#warna-pelangi-mata-ver').val(data.warna_pelangi_mata);
				$('#warna-rambut-ver').val(data.warna_rambut);
				$('#warna-pakaian-ver').val(data.warna_pakaian);
				$('#bahan-pakaian-ver').val(data.bahan_pakaian);
				$('#merk-pakaian-ver').val(data.merk_pakaian);
				$('#ukuran-pakaian-ver').val(data.ukuran_pakaian);
				$('#gambar-lambang-pakaian-ver').val(data.gambar_lambang_pakaian);
				$('#warna-celana-ver').val(data.warna_celana);
				$('#ukuran-celana-ver').val(data.ukuran_celana);
				$('#merk-celana-ver').val(data.merk_celana);
				$('#perhiasan-ver').val(data.perhiasan);
				$('#lain-lain-identitas-pasien-ver').val(data.lain_lain_identitas_pasien);
				$('#tubuh-ver').val(data.tubuh);
				$('#anggota-gerak-atas-kanan-ver').val(data.anggota_gerak_atas_kanan);
				$('#anggota-gerak-atas-kiri-ver').val(data.anggota_gerak_atas_kiri);
				$('#anggota-gerak-bawah-kanan-ver').val(data.anggota_gerak_bawah_kanan);
				$('#anggota-gerak-bawah-kiri-ver').val(data.anggota_gerak_bawah_kiri);
				$('#alis-mata-ver').val(data.alis_mata);
				$('#bulu-mata-ver').val(data.bulu_mata);
				$('#selaput-kelopak-mata-ver').val(data.selaput_kelopak_mata);
				$('#selaput-bening-mata-ver').val(data.selaput_biji_mata);
				$('#selaput-biji-mata-ver').val(data.selaput_biji_mata);
				$('#bentuk-pupil-mata-ver').val(data.bentuk_pupil);
				$('#ukuran-pupil-mata-ver').val(data.ukuran_pupil);
				$('#garis-tengah-pupil-mata-ver').val(data.garis_tengah);
				$('#garis-kanan-pupil-mata-ver').val(data.garis_kanan);
				$('#garis-kiri-pupil-mata-ver').val(data.garis_kiri);
				$('#pelangi-mata-ver').val(data.pelangi_mata);
				$('#kesimpulan-ver').val(data.kesimpulan);
				$('#s2id_dokter-jaga-igd-ver a .select2c-chosen').html(data.nama_dokter_jaga_igd);
				$("#bulan-surat-ver").val(data.bulan_surat).change();

				if (data.ciri_rambut == 'Pendek') {
					document.getElementById("pendek-ver").checked = true;
				} else if (data.ciri_rambut == 'Panjang') {
					document.getElementById("panjang-ver").checked = true;
				}

				if (data.keadaan_gizi == 'Kurang') {
					document.getElementById("kurang-ver").checked = true;
				} else if (data.keadaan_gizi == 'Cukup') {
					document.getElementById("cukup-ver").checked = true;
				} else if (data.keadaan_gizi == 'Lebih') {
					document.getElementById("lebih-ver").checked = true;
				}

				if (data.pakaian == 'Baju lengan panjang') {
					document.getElementById("pakaian-lengan-panjang-ver").checked = true;
				} else if (data.pakaian == 'Baju lengan pendek') {
					document.getElementById("pakaian-lengan-pendek-ver").checked = true;
				}

				if (data.tampak_pakaian == 'Ada darah') {
					document.getElementById("ada-darah-ver").checked = true;
				} else if (data.tampak_pakaian == 'Tidak ada darah') {
					document.getElementById("tidak-ada-darah-ver").checked = true;
				}

				if (data.bentuk_hidung == 'Ada kelainan') {
					document.getElementById("ada-kelainan-bentuk-hidung-ver").checked = true;
				} else if (data.bentuk_hidung == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-bentuk-hidung-ver").checked = true;
				}

				if (data.permukaan_kulit_hidung == 'Ada kelainan') {
					document.getElementById("ada-kelainan-permukaan-kulit-hidung-ver").checked = true;
				} else if (data.permukaan_kulit_hidung == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-permukaan-kulit-hidung-ver").checked = true;
				}

				if (data.lubang_hidung == 'Ada kelainan') {
					document.getElementById("ada-kelainan-lubang-hidung-ver").checked = true;
				} else if (data.lubang_hidung == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-lubang-hidung-ver").checked = true;
				}

				if (data.bentuk_telinga == 'Ada kelainan') {
					document.getElementById("ada-kelainan-bentuk-telinga-ver").checked = true;
				} else if (data.bentuk_telinga == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-bentuk-telinga-ver").checked = true;
				}

				if (data.permukaan_telinga == 'Ada kelainan') {
					document.getElementById("ada-kelainan-permukaan-telinga-ver").checked = true;
				} else if (data.permukaan_telinga == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-permukaan-telinga-ver").checked = true;
				}

				if (data.lubang_telinga == 'Ada kelainan') {
					document.getElementById("ada-kelainan-lubang-telinga-ver").checked = true;
				} else if (data.lubang_telinga == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-lubang-telinga-ver").checked = true;
				}

				if (data.bibir_atas == 'Ada kelainan') {
					document.getElementById("ada-kelainan-bibir-atas-ver").checked = true;
				} else if (data.bibir_atas == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-bibir-atas-ver").checked = true;
				}

				if (data.celana == 'Celana panjang') {
					document.getElementById("celana-panjang-ver").checked = true;
				} else if (data.celana == 'Rok') {
					document.getElementById("rok-ver").checked = true;
				} else if (data.celana == 'Kain') {
					document.getElementById("kain-ver").checked = true;
				}

				if (data.tato == 'Tidak') {
					document.getElementById("tato-tidak-ada-ver").checked = true;
				} else if (data.tato == 'Ada') {
					document.getElementById("tato-ada-ver").checked = true;
					$('#posisi-tato-ver').val(data.posisi_tato);
					$("#posisi-tato-ver").prop("disabled", false);
				}

				if (data.jaringan_parut == 'Tidak') {
					document.getElementById("jaringan-parut-tidak-ada-ver").checked = true;
				} else if (data.jaringan_parut == 'Ada') {
					document.getElementById("jaringan-parut-ada-ver").checked = true;
					$('#posisi-jaringan-parut-ver').val(data.posisi_jaringan_parut);
					$("#posisi-jaringan-parut-ver").prop("disabled", false);
				}

				if (data.tahi_lalat == 'Tidak') {
					document.getElementById("tahi-lalat-tidak-ada-ver").checked = true;
				} else if (data.tahi_lalat == 'Ada') {
					document.getElementById("tahi-lalat-ada-ver").checked = true;
					$('#posisi-tahi-lalat-ver').val(data.posisi_tahi_lalat);
					$("#posisi-tahi-lalat-ver").prop("disabled", false);
				}

				if (data.tanda_lahir == 'Tidak') {
					document.getElementById("tanda-lahir-tidak-ada-ver").checked = true;
				} else if (data.tanda_lahir == 'Ada') {
					document.getElementById("tanda-lahir-ada-ver").checked = true;
					$('#posisi-tanda-lahir-ver').val(data.posisi_tanda_lahir);
					$("#posisi-tanda-lahir-ver").prop("disabled", false);
				}

				if (data.cacat_fisik == 'Tidak') {
					document.getElementById("cacat-fisik-tidak-ada-ver").checked = true;
				} else if (data.cacat_fisik == 'Ada') {
					document.getElementById("cacat-fisik-ada-ver").checked = true;
					$('#posisi-cacat-fisik-ver').val(data.posisi_cacat_fisik);
					$("#posisi-cacat-fisik-ver").prop("disabled", false);
				}

				if (data.daerah_berambut == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-daerah-berambut-ver").checked = true;
				} else if (data.daerah_berambut == 'Ada kelainan') {
					document.getElementById("ada-kelainan-daerah-berambut-ver").checked = true;
					$('#kelainan-daerah-berambut-ver').val(data.kelainan_daerah_rambut);
					$("#kelainan-daerah-berambut-ver").prop("disabled", false);
				}

				if (data.bentuk_kepala == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-bentuk-kepala-ver").checked = true;
				} else if (data.bentuk_kepala == 'Ada kelainan') {
					document.getElementById("ada-kelainan-bentuk-kepala-ver").checked = true;
					$('#kelainan-bentuk-kepala-ver').val(data.kelainan_bentuk_kepala);
					$("#kelainan-bentuk-kepala-ver").prop("disabled", false);
				}

				if (data.wajah == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-wajah-ver").checked = true;
				} else if (data.wajah == 'Ada kelainan') {
					document.getElementById("ada-kelainan-wajah-ver").checked = true;
					$('#kelainan-wajah-ver').val(data.kelainan_wajah);
					$("#kelainan-wajah-ver").prop("disabled", false);
				}

				if (data.leher == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-leher-ver").checked = true;
				} else if (data.leher == 'Ada kelainan') {
					document.getElementById("ada-kelainan-leher-ver").checked = true;
					$('#kelainan-leher-ver').val(data.kelainan_leher);
					$("#kelainan-leher-ver").prop("disabled", false);
				}

				if (data.bahu == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-bahu-ver").checked = true;
				} else if (data.bahu == 'Ada kelainan') {
					document.getElementById("ada-kelainan-bahu-ver").checked = true;
					$('#kelainan-bahu-ver').val(data.kelainan_bahu);
					$("#kelainan-bahu-ver").prop("disabled", false);
				}

				if (data.dada == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-dada-ver").checked = true;
				} else if (data.dada == 'Ada kelainan') {
					document.getElementById("ada-kelainan-dada-ver").checked = true;
					$('#kelainan-dada-ver').val(data.kelainan_dada);
					$("#kelainan-dada-ver").prop("disabled", false);
				}

				if (data.punggung == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-punggung-ver").checked = true;
				} else if (data.punggung == 'Ada kelainan') {
					document.getElementById("ada-kelainan-punggung-ver").checked = true;
					$('#kelainan-punggung-ver').val(data.kelainan_punggung);
					$("#kelainan-punggung-ver").prop("disabled", false);
				}

				if (data.perut == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-perut-ver").checked = true;
				} else if (data.perut == 'Ada kelainan') {
					document.getElementById("ada-kelainan-perut-ver").checked = true;
					$('#kelainan-perut-ver').val(data.kelainan_perut);
					$("#kelainan-perut-ver").prop("disabled", false);
				}

				if (data.bokong == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-bokong-ver").checked = true;
				} else if (data.bokong == 'Ada kelainan') {
					document.getElementById("ada-kelainan-bokong-ver").checked = true;
					$('#kelainan-bokong-ver').val(data.kelainan_bokong);
					$("#kelainan-bokong-ver").prop("disabled", false);
				}

				if (data.dubur == 'Tidak ada kelainan') {
					document.getElementById("tidak-ada-kelainan-dubur-ver").checked = true;
				} else if (data.dubur == 'Ada kelainan') {
					document.getElementById("ada-kelainan-dubur-ver").checked = true;
					$('#kelainan-dubur-ver').val(data.kelainan_dubur);
					$("#kelainan-dubur-ver").prop("disabled", false);
				}

				$('#modal-visum-et-repertum').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function resetModalVisumEtRepertum() {
		// Set default fields
		$('#id-pendaftaran-ver').val('');
		$('#id-dokter-jaga-idg-ver').val('');
		$('#nomor-visum-ver').val('');
		$('#nomor-surat-ver').val('');
		$('#tahun-surat-ver').val('');
		$('#nomor-polisi-ver').val('');
		$('#ditandatangani-oleh-ver').val('');
		$('#pangkat-ver').val('');
		$('#nrp-ver').val('');
		$('#berat-badan-ver').val('');
		$('#panjang-badan-ver').val('');
		$('#warna-kulit-ver').val('');
		$('#warna-pelangi-mata-ver').val('');
		$('#warna-rambut-ver').val('');
		$('#warna-pakaian-ver').val('');
		$('#bahan-pakaian-ver').val('');
		$('#merk-pakaian-ver').val('');
		$('#ukuran-pakaian-ver').val('');
		$('#gambar-lambang-pakaian-ver').val('');
		$('#warna-celana-ver').val('');
		$('#ukuran-celana-ver').val('');
		$('#merk-celana-ver').val('');
		$('#perhiasan-ver').val('');
		$('#lain-lain-identitas-pasien-ver').val('');
		$('#tubuh-ver').val('');
		$('#anggota-gerak-atas-kanan-ver').val('');
		$('#anggota-gerak-atas-kiri-ver').val('');
		$('#anggota-gerak-bawah-kanan-ver').val('');
		$('#anggota-gerak-bawah-kiri-ver').val('');
		$('#alis-mata-ver').val('');
		$('#bulu-mata-ver').val('');
		$('#selaput-kelopak-mata-ver').val('');
		$('#selaput-bening-mata-ver').val('');
		$('#selaput-biji-mata-ver').val('');
		$('#bentuk-pupil-mata-ver').val('');
		$('#ukuran-pupil-mata-ver').val('');
		$('#garis-tengah-pupil-mata-ver').val('');
		$('#garis-kanan-pupil-mata-ver').val('');
		$('#garis-kiri-pupil-mata-ver').val('');
		$('#pelangi-mata-ver').val('');
		$('#kesimpulan-ver').val('');
		$('#posisi-tato-ver').val('');
		$('#posisi-jaringan-parut-ver').val('');
		$('#posisi-tahi-lalat-ver').val('');
		$('#posisi-tanda-lahir-ver').val('');
		$('#posisi-cacat-fisik-ver').val('');
		$('#kelainan-daerah-berambut-ver').val('');
		$('#kelainan-bentuk-kepala-ver').val('');
		$('#kelainan-wajah-ver').val('');
		$('#kelainan-leher-ver').val('');
		$('#kelainan-bahu-ver').val('');
		$('#kelainan-dada-ver').val('');
		$('#kelainan-punggung-ver').val('');
		$('#kelainan-perut-ver').val('');
		$('#kelainan-bokong-ver').val('');
		$('#kelainan-dubur-ver').val('');
		$("#bulan-surat-ver").val('Januari').change();
		$('#s2id_dokter-jaga-igd-ver a .select2c-chosen').html('');

		// Unchecked fields
		document.getElementById("pendek-ver").checked = false;
		document.getElementById("panjang-ver").checked = false;
		document.getElementById("kurang-ver").checked = false;
		document.getElementById("cukup-ver").checked = false;
		document.getElementById("lebih-ver").checked = false;
		document.getElementById("pakaian-lengan-panjang-ver").checked = false;
		document.getElementById("pakaian-lengan-pendek-ver").checked = false;
		document.getElementById("ada-darah-ver").checked = false;
		document.getElementById("tidak-ada-darah-ver").checked = false;
		document.getElementById("ada-kelainan-bentuk-hidung-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-bentuk-hidung-ver").checked = false;
		document.getElementById("ada-kelainan-permukaan-kulit-hidung-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-permukaan-kulit-hidung-ver").checked = false;
		document.getElementById("ada-kelainan-lubang-hidung-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-lubang-hidung-ver").checked = false;
		document.getElementById("ada-kelainan-bentuk-telinga-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-bentuk-telinga-ver").checked = false;
		document.getElementById("ada-kelainan-permukaan-telinga-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-permukaan-telinga-ver").checked = false;
		document.getElementById("ada-kelainan-lubang-telinga-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-lubang-telinga-ver").checked = false;
		document.getElementById("ada-kelainan-bibir-atas-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-bibir-atas-ver").checked = false;
		document.getElementById("celana-panjang-ver").checked = false;
		document.getElementById("rok-ver").checked = false;
		document.getElementById("kain-ver").checked = false;
		document.getElementById("tato-tidak-ada-ver").checked = false;
		document.getElementById("tato-ada-ver").checked = false;
		document.getElementById("jaringan-parut-tidak-ada-ver").checked = false;
		document.getElementById("jaringan-parut-ada-ver").checked = false;
		document.getElementById("tahi-lalat-tidak-ada-ver").checked = false;
		document.getElementById("tahi-lalat-ada-ver").checked = false;
		document.getElementById("tanda-lahir-tidak-ada-ver").checked = false;
		document.getElementById("tanda-lahir-ada-ver").checked = false;
		document.getElementById("cacat-fisik-tidak-ada-ver").checked = false;
		document.getElementById("cacat-fisik-ada-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-daerah-berambut-ver").checked = false;
		document.getElementById("ada-kelainan-daerah-berambut-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-bentuk-kepala-ver").checked = false;
		document.getElementById("ada-kelainan-bentuk-kepala-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-wajah-ver").checked = false;
		document.getElementById("ada-kelainan-wajah-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-leher-ver").checked = false;
		document.getElementById("ada-kelainan-leher-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-bahu-ver").checked = false;
		document.getElementById("ada-kelainan-bahu-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-dada-ver").checked = false;
		document.getElementById("ada-kelainan-dada-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-punggung-ver").checked = false;
		document.getElementById("ada-kelainan-punggung-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-perut-ver").checked = false;
		document.getElementById("ada-kelainan-perut-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-bokong-ver").checked = false;
		document.getElementById("ada-kelainan-bokong-ver").checked = false;
		document.getElementById("tidak-ada-kelainan-dubur-ver").checked = false;
		document.getElementById("ada-kelainan-dubur-ver").checked = false;

		// Disabled fields
		$("#posisi-tato-ver").prop("disabled", true);
		$("#posisi-jaringan-parut-ver").prop("disabled", true);
		$("#posisi-tahi-lalat-ver").prop("disabled", true);
		$("#posisi-tanda-lahir-ver").prop("disabled", true);
		$("#posisi-cacat-fisik-ver").prop("disabled", true);
		$("#kelainan-daerah-berambut-ver").prop("disabled", true);
		$("#kelainan-bentuk-kepala-ver").prop("disabled", true);
		$("#kelainan-wajah-ver").prop("disabled", true);
		$("#kelainan-leher-ver").prop("disabled", true);
		$("#kelainan-bahu-ver").prop("disabled", true);
		$("#kelainan-dada-ver").prop("disabled", true);
		$("#kelainan-punggung-ver").prop("disabled", true);
		$("#kelainan-perut-ver").prop("disabled", true);
		$("#kelainan-bokong-ver").prop("disabled", true);
		$("#kelainan-dubur-ver").prop("disabled", true);
	}*/

	function cetakSuratKeteranganKematian(details) {
		let detail = details.split('#');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_surat_keterangan_kematian') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalSuratKeteranganKematian();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-surat-keterangan-kematian-title').html(`<b>Form Surat Keterangan Kematian</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
				$('#id-layanan-pendaftaran-skk').val(detail[0]);
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

	// SSCRJ
	function cetakSurgicalSafetyCeklisRawatJalan(details) {
		let detail = details.split('#');
		// console.log(detail);
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/surgical_safety_ceklist_rawat_jalan') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalModalSurgicalSafetyCeklistRawatJalan();
				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-surgical-safety-ceklist-rawat-jalan-title').html(`<b>Form Surgical Safety Ceklist Rawat Jalan</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
				$('#id-layanan-pendaftaran-sscrj').val(detail[0]);
				$('#id-users').val(data.id_users);
				// $('#id-pendaftaran-sscrj').val(data.id_pendaftaran);				

				if (data.sscrj_gelang === '1') {
					document.getElementById("sscrj-gelang").checked = true;
				}
				if (data.sscrj_lengkap === '1') {
					document.getElementById("sscrj-lengkap").checked = true;
				}
				if (data.sscrj_nama_tindakan === '1') {
					document.getElementById("sscrj-nama-tindakan").checked = true;
				}
				if (data.sscrj_informed_concent === '1') {
					document.getElementById("sscrj-informed-concent").checked = true;
				}
				if (data.sscrj_tidak_lengkap === '1') {
					document.getElementById("sscrj-tidak-lengkap").checked = true;
				}
				$('#sscrj-alasan-2').val(data.sscrj_alasan_2);
				if (data.sscrj_dokter_bedah === '1') {
					document.getElementById("sscrj-dokter-bedah").checked = true;
				}
				if (data.sscrj_instrument === '1') {
					document.getElementById("sscrj-instrument").checked = true;
				}
				// $('#sscrj-nama-operator').val(data.sscrj_nama_operator.nama_dokter).nama_dokter_1
				$('#s2id_sscrj-nama-operator a .select2c-chosen').html(data.nama_dokter_1);
				if (data.sscrj_instrumentt === '1') {
					document.getElementById("sscrj-instrumentt").checked = true;
				}
				if (data.sscrj_kassa === '1') {
					document.getElementById("sscrj-kassa").checked = true;
				}
				// $('#sscrj-nama-anastesi').val(data.sscrj_nama_anastesi.nama_dokter).nama_dokter_2
				$('#s2id_sscrj-nama-anastesi a .select2c-chosen').html(data.nama_dokter_2);
				if (data.sscrj_kassaa === '1') {
					document.getElementById("sscrj-kassaa").checked = true;
				}
				if (data.sscrj_jarum === '1') {
					document.getElementById("sscrj-jarum").checked = true;
				}
				$('#sscrj-nama-tindakann').val(data.sscrj_nama_tindakann);
				if (data.sscrj_jarumm === '1') {
					document.getElementById("sscrj-jarumm").checked = true;
				}
				if (data.sscrj_lokasi == '1') {
					document.getElementById("sscrj-lokasi-1").checked = true;
				}
				if (data.sscrj_lokasi == '0') {
					document.getElementById("sscrj-lokasi-2").checked = true;
				}
				if (data.sscrj_tanggal_tindakan === '1') {
					document.getElementById("sscrj-tanggal-tindakan").checked = true;
				}
				if (data.sscrj_preparat == '1') {
					document.getElementById("sscrj-preparat-ya").checked = true;
				}
				$('#sscrj-tekanan-darah').val(data.sscrj_tekanan_darah);
				if (data.sscrj_identitas_pasien === '1') {
					document.getElementById("sscrj-identitas-pasien").checked = true;
				}
				if (data.sscrj_preparat_pa === '1') {
					document.getElementById("sscrj-preparat-pa").checked = true;
				}
				$('#sscrj-naddi').val(data.sscrj_naddi);
				if (data.sscrj_nama_tindakkan === '1') {
					document.getElementById("sscrj-nama-tindakkan").checked = true;
				}
				if (data.sscrj_preparat_kultur === '1') {
					document.getElementById("sscrj-preparat-kultur").checked = true;
				}
				$('#sscrj-perrnafasan').val(data.sscrj_perrnafasan);
				if (data.sscrj_prosedur_tindakan === '1') {
					document.getElementById("sscrj-prosedur-tindakan").checked = true;
				}
				if (data.sscrj_preparat_sitologi === '1') {
					document.getElementById("sscrj-preparat-sitologi").checked = true;
				}
				$('#sscrj-saturasi-o2').val(data.sscrj_saturasi_o2);
				if (data.sscrj_lokasi_tindakan === '1') {
					document.getElementById("sscrj-lokasi-tindakan").checked = true;
				}
				if (data.sscrj_preparat == '0') {
					document.getElementById("sscrj-preparat-tidak").checked = true;
				}
				$('#sscrj-suhu').val(data.sscrj_suhu);
				if (data.sscrj_informed_consent === '1') {
					document.getElementById("sscrj-informed-consent").checked = true;
				}
				if (data.sscrj_formulir_permintaan == '1') {
					document.getElementById("sscrj-formulir-permintaan-ya").checked = true;
				}
				if (data.sscrj_formulir_permintaan == '0') {
					document.getElementById("sscrj-preparat-tidak").checked = true;
				}
				if (data.sscrj_telah_dilengkapi == '1') {
					document.getElementById("sscrj-telah-dilengkapi-ya").checked = true;
				}
				if (data.sscrj_telah_dilengkapi == '0') {
					document.getElementById("sscrj-telah-dilengkapi-tidak").checked = true;
				}
				if (data.sscrj_keterangan == '1') {
					document.getElementById("sscrj-ada-keterangan-ada").checked = true;
				}
				if (data.sscrj_keterangan == '0') {
					document.getElementById("sscrj-penjelasan-tidak").checked = true;
				}
				$('#sscrj-alasan').val(data.sscrj_alasan);
				// if (data.sscrj_ya === '1') {document.getElementById("sscrj-local").checked = true;}
				if (data.sscrj_ya == '1') {
					document.getElementById("sscrj-local").checked = true;
				}
				if (data.sscrj_local === '1') {
					document.getElementById("sscrj-ya").checked = true;
				}
				// $('#sscrj-nama-obat').val(data.sscrj_nama_obat);
				$('#s2id_sscrj-nama-obat a .select2c-chosen').html(data.nama_obat);
				if (data.sscrj_diberikan === '1') {
					document.getElementById("sscrj-diberikan").checked = true;
				}
				$('#sscrj-aalasan').val(data.sscrj_aalasan);
				$('#sscrj-dosis-obat').val(data.sscrj_dosis_obat);
				if (data.sscrj_tidak_diberikan === '1') {
					document.getElementById("sscrj-tidak-diberikan").checked = true;
				}
				$('#sscrj-allasan').val(data.sscrj_allasan);
				$('#sscrj-jam-di-berikan-obat').val(data.sscrj_jam_di_berikan_obat);
				// if (data.sscrj_tidak === '1') {document.getElementById("sscrj-tidak").checked = true;}
				if (data.sscrj_ya == '0') {
					document.getElementById("sscrj-tidak").checked = true;
				}
				$('#sscrj-kesaddaran').val(data.sscrj_kesaddaran);
				$('#sscrj-tekanann-darah').val(data.sscrj_tekanann_darah);
				if (data.sscrj_dipasang === '1') {
					document.getElementById("sscrj-dipasang").checked = true;
				}
				if (data.sscrj_tidak_dipasang === '1') {
					document.getElementById("sscrj-tidak-dipasang").checked = true;
				}
				$('#sscrj-nadii').val(data.sscrj_nadii);
				$('#sscrj-pernaffasan').val(data.sscrj_pernaffasan);
				$('#sscrj-saturasi').val(data.sscrj_saturasi);
				$('#sscrj-ssuhu').val(data.sscrj_ssuhu);
				$('#sscrj-skala-nyeri').val(data.sscrj_skala_nyeri);
				if (data.sscrj_ada_rembesan === '1') {
					document.getElementById("sscrj-ada-rembesan").checked = true;
				}
				if (data.sscrj_tidak_ada_rembesan === '1') {
					document.getElementById("sscrj-tidak-ada-rembesan").checked = true;
				}
				$('#sscrj-tanggal-sign-in').val(datetimefmysql(data.sscrj_tanggal_sign_in));
				if (data.sscrj_paraf_perawat_sign_in === '1') {
					document.getElementById("sscrj-paraf-perawat-sign-in").checked = true;
				}
				if (data.sscrj_paraf_perawat_time_out === '1') {
					document.getElementById("sscrj-paraf-perawat-time-out").checked = true;
				}
				if (data.sscrj_paraf_perawat_sign_out === '1') {
					document.getElementById("sscrj-paraf-perawat-sign-out").checked = true;
				}
				$('#s2id_sscrj-perawat-sign-in a .select2c-chosen').html(data.nama_perawat_1);
				$('#s2id_sscrj-perawat-time-out a .select2c-chosen').html(data.nama_perawat_2);
				$('#s2id_sscrj-perawat-sign-out a .select2c-chosen').html(data.nama_perawat_3);
				if (data.sscrj_paraf_dokter_operator_sign_in === '1') {
					document.getElementById("sscrj-paraf-dokter-operator-sign-in").checked = true;
				}
				if (data.sscrj_paraf_dokter_operator_time_out === '1') {
					document.getElementById("sscrj-paraf-dokter-operator-time-out").checked = true;
				}
				if (data.sscrj_paraf_dokter_operator_sign_out === '1') {
					document.getElementById("sscrj-paraf-dokter-operator-sign-out").checked = true;
				}
				$('#s2id_sscrj-dokter-operator-sign-in a .select2c-chosen').html(data.nama_dokter_3);
				$('#s2id_sscrj-dokter-operator-time-out a .select2c-chosen').html(data.nama_dokter_4);
				$('#s2id_sscrj-dokter-operator-sign-out a .select2c-chosen').html(data.nama_dokter_5);

				$('#modal-surgical-safety-ceklist-rawat-jalan').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function resetModalModalSurgicalSafetyCeklistRawatJalan() {
		// Set default fields
		$('#id-layanan-pendaftaran-sscrj').val('');
		// $('#id-pendaftaran-sscrj').val('');
		$('#id-users').val('');
		$('#sscrj-alasan-2').val('');
		// $('#sscrj-nama-operator').val('');
		$('#s2id_sscrj-nama-operator a .select2c-chosen').html('Silahkan dipilih operator');
		// $('#sscrj-nama-anastesi').val('');
		$('#s2id_sscrj-nama-anastesi a .select2c-chosen').html('Silahkan dipilih anastesi');
		$('#sscrj-nama-tindakann').val('');
		$('#sscrj-tekanan-darah').val('');
		$('#sscrj-naddi').val('');
		$('#sscrj-perrnafasan').val('');
		$('#sscrj-saturasi-o2').val('');
		$('#sscrj-suhu').val('');
		$('#sscrj-alasan').val('');
		$('#s2id_sscrj-nama-obat a .select2c-chosen').html('Silahkan dipilih obat');
		// $('#sscrj-nama-obat').val('Silahkan pilih obat');
		$('#sscrj-aalasan').val('');
		$('#sscrj-dosis-obat').val('');
		// $('#s2id_sscrj-dosis-obat a .select2c-chosen').html('Silahkan dipilih');
		$('#sscrj-allasan').val('')
		$('#sscrj-jam-di-berikan-obat').val('')
		$('#sscrj-kesaddaran').val('')
		$('#sscrj-tekanann-darah').val('')
		$('#sscrj-nadii').val('')
		$('#sscrj-pernaffasan').val('')
		$('#sscrj-saturasi').val('')
		$('#sscrj-ssuhu').val('')
		$('#sscrj-skala-nyeri').val('')
		$('#sscrj-tanggal-sign-in').val('')
		$('#s2id_sscrj-perawat-sign-in a .select2c-chosen').html('Silahkan dipilih perawat');
		$('#s2id_sscrj-perawat-time-out a .select2c-chosen').html('Silahkan dipilih perawat');
		$('#s2id_sscrj-perawat-sign-out a .select2c-chosen').html('Silahkan dipilih perawat');
		$('#s2id_sscrj-dokter-operator-sign-in a .select2c-chosen').html('Silahkan dipilih dokter');
		$('#s2id_sscrj-dokter-operator-time-out a .select2c-chosen').html('Silahkan dipilih dokter');
		$('#s2id_sscrj-dokter-operator-sign-out a .select2c-chosen').html('Silahkan dipilih dokter');

		document.getElementById("sscrj-gelang").checked = false;
		document.getElementById("sscrj-lengkap").checked = false;
		document.getElementById("sscrj-nama-tindakan").checked = false;
		document.getElementById("sscrj-informed-concent").checked = false;
		document.getElementById("sscrj-tidak-lengkap").checked = false;
		document.getElementById("sscrj-dokter-bedah").checked = false;
		document.getElementById("sscrj-instrument").checked = false;
		document.getElementById("sscrj-instrumentt").checked = false;
		document.getElementById("sscrj-kassa").checked = false;
		document.getElementById("sscrj-kassaa").checked = false;
		document.getElementById("sscrj-jarum").checked = false;
		document.getElementById("sscrj-jarumm").checked = false;
		document.getElementById("sscrj-lokasi-1").checked = false;
		document.getElementById("sscrj-lokasi-2").checked = false;
		document.getElementById("sscrj-tanggal-tindakan").checked = false;
		document.getElementById("sscrj-preparat-ya").checked = false;
		document.getElementById("sscrj-identitas-pasien").checked = false;
		document.getElementById("sscrj-preparat-pa").checked = false;
		document.getElementById("sscrj-nama-tindakkan").checked = false;
		document.getElementById("sscrj-preparat-kultur").checked = false;
		document.getElementById("sscrj-prosedur-tindakan").checked = false;
		document.getElementById("sscrj-preparat-sitologi").checked = false;
		document.getElementById("sscrj-lokasi-tindakan").checked = false;
		document.getElementById("sscrj-preparat-tidak").checked = false;
		document.getElementById("sscrj-informed-consent").checked = false;
		document.getElementById("sscrj-formulir-permintaan-ya").checked = false;
		document.getElementById("sscrj-preparat-tidak").checked = false;
		document.getElementById("sscrj-telah-dilengkapi-ya").checked = false;
		document.getElementById("sscrj-telah-dilengkapi-tidak").checked = false;
		document.getElementById("sscrj-ada-keterangan-ada").checked = false;
		document.getElementById("sscrj-penjelasan-tidak").checked = false;
		document.getElementById("sscrj-local").checked = false;
		document.getElementById("sscrj-ya").checked = false;
		document.getElementById("sscrj-diberikan").checked = false;
		document.getElementById("sscrj-tidak-diberikan").checked = false;
		document.getElementById("sscrj-tidak").checked = false;
		document.getElementById("sscrj-dipasang").checked = false;
		document.getElementById("sscrj-tidak-dipasang").checked = false;
		document.getElementById("sscrj-ada-rembesan").checked = false;
		document.getElementById("sscrj-tidak-ada-rembesan").checked = false;
		document.getElementById("sscrj-paraf-perawat-sign-in").checked = false;
		document.getElementById("sscrj-paraf-perawat-time-out").checked = false;
		document.getElementById("sscrj-paraf-perawat-sign-out").checked = false;
		document.getElementById("sscrj-paraf-dokter-operator-sign-in").checked = false;
		document.getElementById("sscrj-paraf-dokter-operator-time-out").checked = false;
		document.getElementById("sscrj-paraf-dokter-operator-sign-out").checked = false;

	}





	// SKPM
	/*function cetakSuratKeteranganPemeriksaanMata(details) {
		let detail = details.split('#');
		// console.log(detail);
		// $('#modal_surat_keterangan_pemeriksaan_mata').modal('show');
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/surat_keterangan_pemeriksaan_mata') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetModalSuratKeteranganPemeriksaanMata();
				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-surat-keterangan-pemeriksaan-mata-title').html(`<b>Form Surat Keterangan Pemeriksaan Mata</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
				$('#id-layanan-pendaftaran-skpm').val(detail[0]);
				$('#id-users').val(data.id_users);
				$('#nama-skpm').val(data.nama_skpm);
				$('#no-rm-skpm').val(data.no_rm_skpm);
				$('#usia-skpm').val(data.usia_skpm);
				$('#ktp-skpm').val(data.ktp_skpm);
				$('#alamat-skpm').val(data.alamat_skpm);
				$('#tlp-skpm').val(data.tlp_skpm);

				if (data.ya_skpm === '1') {
					document.getElementById("ya-skpm-1").checked = true;
					// Disabled fields
					$("#nama-skpm").prop("disabled", true);
					$("#l-skpm-1").prop("disabled", true);
					$("#p-skpm-2").prop("disabled", true);
					$("#no-rm-skpm").prop("disabled", true);
					$("#usia-skpm").prop("disabled", true);
					$("#ktp-skpm").prop("disabled", true);
					$("#alamat-skpm").prop("disabled", true);
					$("#tlp-skpm").prop("disabled", true);
				} else if (data.ya_skpm === '0') {
					document.getElementById("tidak-skpm-2").checked = true;
					// Undisabled fields
					$("#nama-skpm").prop("disabled", false);
					$("#l-skpm-1").prop("disabled", false);
					$("#p-skpm-2").prop("disabled", false);
					$("#no-rm-skpm").prop("disabled", false);
					$("#usia-skpm").prop("disabled", false);
					$("#ktp-skpm").prop("disabled", false);
					$("#alamat-skpm").prop("disabled", false);
					$("#tlp-skpm").prop("disabled", false);
				}
				if (data.skpm == 'L') {
					document.getElementById("l-skpm-1").checked = true;
				} else if (data.skpm == 'P') {
					document.getElementById("p-skpm-2").checked = true;
				}
				$('#tajam-pengelihatan-skpm').val(data.tajam_pengelihatan_skpm);
				$('#mata-kanan-skpm').val(data.mata_kanan_skpm);
				$('#mata-kiri-skpm').val(data.mata_kiri_skpm);
				$('#anterior-kanan-skpm').val(data.anterior_kanan_skpm);
				$('#anterior-kiri-skpm').val(data.anterior_kiri_skpm);
				$('#posterior-kanan-skpm').val(data.posterior_kanan_skpm);
				$('#posterior-kiri-skpm').val(data.posterior_kiri_skpm);
				$('#p-warna-skpm').val(data.p_warna_skpm);
				$('#catatan-skpm').val(data.catatan_skpm);
				if (data.tanpa_kacamata_kanan_skpm === '1') {
					document.getElementById("tanpa-kacamata-kanan-skpm").checked = true;
				}
				if (data.tanpa_kacamata_kiri_skpm === '1') {
					document.getElementById("tanpa-kacamata-kiri-skpm").checked = true;
				}
				if (data.anterior_mata_kanan_skpm === '1') {
					document.getElementById("anterior-mata-kanan-skpm").checked = true;
				}
				if (data.anterior_mata_kiri_skpm === '1') {
					document.getElementById("anterior-mata-kiri-skpm").checked = true;
				}
				if (data.posterior_mata_kanan_skpm === '1') {
					document.getElementById("posterior-mata-kanan-skpm").checked = true;
				}
				if (data.posterior_mata_kiri_skpm === '1') {
					document.getElementById("posterior-mata-kiri-skpm").checked = true;
				}
				$('#tanggal-skpm').val(data.tanggal_skpm);
				$('#ttd-dokter-skpm').val(data.ttd_dokter_skpm);
				$('#s2id_ttd-dokter-skpm a .select2c-chosen').html(data.nama_dokter_1);
				if (data.ceklis_dokter_skpm === '1') {
					document.getElementById("ceklis-dokter-skpm").checked = true;
				}
				$('#modal_surat_keterangan_pemeriksaan_mata').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}*/



	// SKPM eRM
	/*function resetModalSuratKeteranganPemeriksaanMata() {
		// Set default fields
		$('#id-layanan-pendaftaran-skpm').val('');
		$('#id-users').val('');
		$('#nama-skpm').val('');
		$('#no-rm-skpm').val('');
		$('#usia-skpm').val('');
		$('#ktp-skpm').val('');
		$('#alamat-skpm').val('');
		$('#tlp-skpm').val('');
		$('#tajam-pengelihatan-skpm').val('');
		$('#mata-kanan-skpm').val('');
		$('#mata-kiri-skpm').val('');
		$('#anterior-kanan-skpm').val('');
		$('#anterior-kiri-skpm').val('');
		$('#posterior-kanan-skpm').val('');
		$('#posterior-kiri-skpm').val('');
		$('#p-warna-skpm').val('');
		$('#catatan-skpm').val('');
		$('#tanggal-skpm').val('');
		$('#ttd-dokter-skpm').val('');
		document.getElementById("l-skpm-1").checked = false;
		document.getElementById("p-skpm-2").checked = false;
		document.getElementById("tanpa-kacamata-kanan-skpm").checked = false;
		document.getElementById("tanpa-kacamata-kiri-skpm").checked = false;
		document.getElementById("anterior-mata-kanan-skpm").checked = false;
		document.getElementById("anterior-mata-kiri-skpm").checked = false;
		document.getElementById("posterior-mata-kanan-skpm").checked = false;
		document.getElementById("posterior-mata-kiri-skpm").checked = false;
		document.getElementById("ceklis-dokter-skpm").checked = false;
		$("#nama-skpm").prop("disabled", false);
		$("#l-skpm-1").prop("disabled", false);
		$("#p-skpm-2").prop("disabled", false);
		$("#no-rm-skpm").prop("disabled", false);
		$("#usia-skpm").prop("disabled", false);
		$("#ktp-skpm").prop("disabled", false);
		$("#alamat-skpm").prop("disabled", false);
		$("#tlp-skpm").prop("disabled", false);
	}*/

	function getKuotaPoli() {
		$.ajax({
			type: 'GET',
			url: baseUrl + '/get_kuota_poli/layanan',
			data: $('#form_search').serialize() + '&layanan=' + $('#layanan').val() + '&shifpoli=' + $('#shifpoli').val(),
			dataType: 'JSON',
			success: function(data) {
				$('#kuota-poli').empty();
				$('#jmlkunjungan-poli').empty();
				$('#checkin-poli').empty();
				$('#booking-poli').empty();
				$('#dokter-poli').empty();

				if (data.data !== null) {
					kuota_poli = '';
					jml_kunjung = '';
					jml_checkin = '';
					jml_booking = '';
					dokter = '';

					if (data.data.kuota !== null) {
						kuota_poli = 'Kuota: ' + (data.data.kuota !== null ? data.data.kuota : 0);
						jml_kunjung = 'Kunjungan: ' + (data.data.jml_kunjung !== null ? data.data.jml_kunjung : 0);
						jml_checkin = 'Checkin: ' + (data.data.jml_checkin !== null ? data.data.jml_checkin : 0);
						jml_booking = 'Booking: ' + (data.data.jml_kunjung - data.data.jml_checkin);
						dokter = data.data.nama_dokter;
					}

					$('#kuota-poli').append(kuota_poli);
					$('#jmlkunjungan-poli').append(jml_kunjung);
					$('#checkin-poli').append(jml_checkin);
					$('#booking-poli').append(jml_booking);
					$('#dokter-poli').append(dokter);
				}
			}
		})
	}
</script>