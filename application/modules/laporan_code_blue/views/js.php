<style>
	#table-lap-code-blue thead th {
		border-bottom: 1px solid #D3D3D3;
	}

	.table-freeze thead {
		position: sticky;
		top: 0;
		z-index: 2;
		/* background-color: #fff; */
		/* border-bottom: 2px solid #ccc; */
	}

	.table-freeze tbody tr:first-child {
		position: sticky;
		top: 0;
		z-index: 1;
	}

	.table-freeze tbody {
		position: sticky;
		top: 0;
		z-index: 1;
	}


	@media screen and (max-width: 680px) {
		.table-freeze {
			height: 70vh
		}
	}

	@media screen and (max-width: 480px) {
		.table-freeze {
			height: 60vh
		}
	}

	#parent {
		height: 450px;
		overflow-y: auto;
		overflow-x: 0;
	}
</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('laporan_code_blue/api/laporan_code_blue') ?>';
	var jenisPenjamin = 0;
	var subTotal = 0;

	$(function() {

		$('#jenis-layanan').change(function() {
			getLaporanCodeBlue(1)
		})

		$('#periode-laporan').change(function() {
			if ($('#periode-laporan').val() == 'Rentang Waktu') {
				$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show();
				$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide();
			}
			if ($('#periode-laporan').val() == 'Bulanan') {
				$('.bulanan, #bulan, #tahun').show();
				$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
			}
			if ($('#periode-laporan').val() == 'Harian') {
				$('.harian, #tanggal-harian').show();
				$('.bulanan, .rentang-waktu').hide();
			}
		});

		$('#page-now').val();
		$('#kasir-search').modal('hide');
		resetForm();
		getLaporanCodeBlue(1);

		$('#btn-search').click(function() {
			$('#kasir-search').modal('show')
		})

		$('#btn-export').click(function() {
			window.open('<?= base_url('laporan_code_blue/export_laporan_code_blue?') ?>' + $('#form-search-code-blue').serialize());
		});

		$('#btn-reload').click(function() {
			resetForm();
			getLaporanCodeBlue(1);
		})

		$('#btn-expand-all').click(function() {
			$('.btn-collapse').click()
		})
	});

	$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('.penjamin-group-search').hide()
	$('#cara-bayar-search').change(function() {
		jenisPenjamin = $(this).val()
		$('#penjamin-search-cb').val('')
		$('#s2id_penjamin-search-cb a .select2-chosen').html('Pilih Penjamin')
		if ($(this).val() !== 'Tunai') {
			$('.penjamin-group-search').show()
		} else {
			$('.penjamin-group-search').hide()
		}
	})

	$('#penjamin-search-cb').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					jenis: jenisPenjamin,
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
			var markup = data.nama;
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	})

	$('#nama_pasien').select2({
		ajax: {
			url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
			var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
			return markup;
		},
		formatSelection: function(data) {
			return data.id + ' ' + data.nama;
		}
	})

	$('#dokter-search').select2({
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
	})

	$('#ruangan_rajal').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
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
			var markup = data.nama;
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	})

	$('#ruangan_ranap').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/bangsal_auto') ?>",
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
			var markup = data.nama;
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	})

	$('#tgl-search').change(function() {
		let id_pendaftaran = $('#tgl-search').val();
		$('#id_pendaftaran_search').val(id_pendaftaran);
	})

	function paging(page) {
		getLaporanCodeBlue(page);
	}

	function getLaporanCodeBlue(page) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('laporan_code_blue/api/laporan_code_blue/get_list_laporan_code_blue') ?>/page/' + page + '/jenis/' + $('#jenis-layanan').val(),
			data: $('#form-search-code-blue').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getLaporanCodeBlue(page - 1);
					return false;
				}

				$('#jenis-periode-cb').html('Periode : ' + data.periode);
				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-lap-code-blue tbody').empty();
				// $('#table-lap-code-blue tfoot').empty();

				let fieldBlank = `<tr><td colspan="34"></td></td>`
				$('#table-lap-code-blue tbody').append(fieldBlank);

				$.each(data.data, function(i, v) {
					// console.log(v);

					let periode = '';
					if ($('#jenis-periode-cb').val() == 'Harian') {
						periode = 'Laporan Harian';
					}
					if ($('#jenis-periode-cb').val() == 'Bulanan') {
						periode = 'Laporan Bulanan';
					}
					if ($('#jenis-periode-cb').val() == 'Rentang Waktu') {
						periode = 'Laporan Rentang Waktu';
					}

					// Respon Awal S1
					var responAwalObj1 = JSON.parse(v.respon_fcb);
					var responAwal1Val = [];

					for (var key in responAwalObj1) {
						if (responAwalObj1[key] !== null && ['respon_fcb_1', 'respon_fcb_3'].indexOf(key) !== -1) {
							var kata = (key === 'respon_fcb_1') ? 'Petugas primer' : (key === 'respon_fcb_3') ? 'Awam terlatih' : '-';
							responAwal1Val.push(kata);
						}
					}
					var responAwal1 = responAwal1Val.join(', ');

					// Respon time code blue
					var rttCBobj = JSON.parse(v.respon_fcb);
					var responRTTCBVal = [];

					for (var key in rttCBobj) {
						if (rttCBobj[key] !== null && ['respon_fcb_4', 'respon_fcb_5', 'respon_fcb_6'].indexOf(key) !== -1) {
							var kata = (key === 'respon_fcb_4') ? '3 menit' : (key === 'respon_fcb_5') ? '5 menit' : (key === 'respon_fcb_6') ? '> 5 menit' : '-';
							responRTTCBVal.push(kata);
						}
					}
					var rttCB = responRTTCBVal.join(', ');

					// Code blue zonasi
					var zonasiObj = JSON.parse(v.respon_fcb);
					var zonasiVal = [];

					for (var key in zonasiObj) {
						if (zonasiObj[key] !== null && ['respon_fcb_2', 'respon_fcb_7', 'respon_fcb_8'].indexOf(key) !== -1) {
							var kata = (key === 'respon_fcb_2') ? 'Zonasi 1' : (key === 'respon_fcb_7') ? 'Zonasi 2' : (key === 'respon_fcb_8') ? 'Zonasi 3' : '-';
							zonasiVal.push(kata);
						}
					}
					var zonasiCodeBlue = zonasiVal.join(', ');

					// Kriteria aktivasi code blue
					var kriteriaAktifitasObj = JSON.parse(v.kriteria_fcb);
					var kritetiaAktivitasVal = [];

					for (var key in kriteriaAktifitasObj) {
						if (kriteriaAktifitasObj[key] !== null && ['kriteria_fcb_1', 'kriteria_fcb_2', 'kriteria_fcb_3'].indexOf(key) !== -1) {
							var kata = (key === 'kriteria_fcb_1') ? 'Henti jantung' : (key === 'kriteria_fcb_2') ? 'Henti napas' : (key === 'kriteria_fcb_3') ? 'Kegawatan medis' : '-';
							kritetiaAktivitasVal.push(kata);
						}
					}
					var kriteriaAktivitas = kritetiaAktivitasVal.join(', ');

					// Kriteria kegawatan medis
					var kriteriaMedisObj = JSON.parse(v.kriteria_fcb);
					var kritetiaMedisVal = [];

					for (var key in kriteriaMedisObj) {
						if (kriteriaMedisObj[key] !== null && ['kriteria_fcb_4', 'kriteria_fcb_5', 'kriteria_fcb_6', 'kriteria_fcb_7', 'kriteria_fcb_8'].indexOf(key) !== -1) {
							var kata = (key === 'kriteria_fcb_4') ? 'Airway : obstruksi jalan nafas' : (key === 'kriteria_fcb_5') ? 'Breathing : P>35x/mnt atau < 5x/mnt' : (key === 'kriteria_fcb_6') ? 'Sirkulasi : hr>140x/mnt atau < 40x/mnt, td sistol>220mmhg atau < 70mmhg' : (key === 'kriteria_fcb_7') ? 'neurologis penurunan kesadaran / kejang' : (key === 'kriteria_fcb_8') ? 'Skor EWS Merah' : '-';
							kritetiaMedisVal.push(kata);
						}
					}
					var kriteriaMedis = kritetiaMedisVal.join('.<br>');

					// Respon Awal
					var responAwalObj = JSON.parse(v.awal_fcb);
					var responAwalVal = [];

					for (var key in responAwalObj) {
						if (responAwalObj[key] !== null) {
							var kata = (key === 'awal_fcb_1') ? 'Sadar' : key === 'awal_fcb_2' ? 'Merespon suara' : key === 'awal_fcb_3' ? 'Merespon nyeri' : 'Tidak ada respon';
							responAwalVal.push(kata);
						}
					}
					var responAwal = responAwalVal.join(', ');

					// Assesmen jalan napas 1, 5, 9
					var jalanNapasObj = JSON.parse(v.jalan_fcb);
					var jalanNapasVal = [];

					for (var key in jalanNapasObj) {
						if (jalanNapasObj[key] !== null && ['jalan_fcb_1', 'jalan_fcb_5', 'jalan_fcb_9'].indexOf(key) !== -1) {
							var kata = (key === 'jalan_fcb_1') ? 'Obstruksi total' : (key === 'jalan_fcb_5') ? 'Obstruksi parsial' : (key === 'jalan_fcb_9') ? 'Normal' : '-';
							jalanNapasVal.push(kata);
						}
					}
					var jalanNapas = jalanNapasVal.join('.<br>');

					// Assesmen Resusitasi jalan napas 2, 6, 10, 13, 14
					var resusitasi1Obj = JSON.parse(v.jalan_fcb);
					var resusitasi1Val = [];

					for (var key in resusitasi1Obj) {
						if (resusitasi1Obj[key] !== null && ['jalan_fcb_2', 'jalan_fcb_6', 'jalan_fcb_10', 'jalan_fcb_13', 'jalan_fcb_14'].indexOf(key) !== -1) {
							var kata = (key === 'jalan_fcb_2') ? 'Orofaringeal tube' : (key === 'jalan_fcb_6') ? 'Intubasi endotrakheal' : (key === 'jalan_fcb_10') ? 'Laryngeal mask airway' : (key === 'jalan_fcb_13') ? jalanNapasObj['jalan_fcb_14'] : '-';
							resusitasi1Val.push(kata);
						}
					}
					var resusitasi1 = resusitasi1Val.join('.<br>');

					// Assesment pernapasan 3, 7, 11, 15, 18
					var pernapasanObj = JSON.parse(v.jalan_fcb);
					var pernapasanVal = [];

					for (var key in pernapasanObj) {
						if (pernapasanObj[key] !== null && ['jalan_fcb_3', 'jalan_fcb_7', 'jalan_fcb_11', 'jalan_fcb_15', 'jalan_fcb_18'].indexOf(key) !== -1) {
							var kata = (key === 'jalan_fcb_3') ? 'Apneu/gasping' : (key === 'jalan_fcb_7') ? 'Sesak napas' : (key === 'jalan_fcb_11') ? 'Sianosis' : (key === 'jalan_fcb_15') ? 'Retraksi otot bantu napas' : (key === 'jalan_fcb_18') ? 'Normal' : '-';
							pernapasanVal.push(kata);
						}
					}
					var AssesmentPernapasan = pernapasanVal.join('.<br>');

					// Resusitasi Assesment pernapasan 4, 8, 12, 16, 17
					var resusitasi2Obj = JSON.parse(v.jalan_fcb);
					var resusitasi2Val = [];

					for (var key in resusitasi2Obj) {
						if (resusitasi2Obj[key] !== null && ['jalan_fcb_4', 'jalan_fcb_8', 'jalan_fcb_12', 'jalan_fcb_16', 'jalan_fcb_17'].indexOf(key) !== -1) {
							var kata = (key === 'jalan_fcb_4') ? '02 bag value mask' : (key === 'jalan_fcb_8') ? '02 reabreathing mask' : (key === 'jalan_fcb_12') ? '02 non reabreathing mask' : (key === 'jalan_fcb_16') ? resusitasi2Obj['jalan_fcb_17'] : '-';
							resusitasi2Val.push(kata);
						}
					}
					var resusitasi2 = resusitasi2Val.join('.<br>');

					// Assesmen sirkulasi	1, 3, 7, 11, 15, 16, 17
					var sirkulasiObj = JSON.parse(v.sirkulasi_fcb);
					var sirkulasiVal = [];

					for (var key in sirkulasiObj) {
						if (sirkulasiObj[key] !== null && ['sirkulasi_fcb_1', 'sirkulasi_fcb_3', 'sirkulasi_fcb_7', 'sirkulasi_fcb_11', 'sirkulasi_fcb_15', 'sirkulasi_fcb_16', 'sirkulasi_fcb_17'].indexOf(key) !== -1) {
							var kata = (key === 'sirkulasi_fcb_1') ? 'Nadi karotis tidak teraba' : (key === 'sirkulasi_fcb_3') ? 'Tachicardia' : (key === 'sirkulasi_fcb_7') ? 'Bradicardia' : (key === 'sirkulasi_fcb_11') ? 'Hipotensi' : (key === 'sirkulasi_fcb_15') ? 'Hipertensi' : (key === 'sirkulasi_fcb_16') ? 'Irama jantung ireguler' : (key === 'sirkulasi_fcb_17') ? 'Normal' : '-';
							sirkulasiVal.push(kata);
						}
					}
					var sirkulasi = sirkulasiVal.join('.<br>');

					// Resusitasi Assesmen sirkulasi	2, 4, 8, 12, 13
					var resusitasi3Obj = JSON.parse(v.sirkulasi_fcb);
					var resusitasi3Val = [];

					for (var key in resusitasi3Obj) {
						if (resusitasi3Obj[key] !== null && ['sirkulasi_fcb_2', 'sirkulasi_fcb_4', 'sirkulasi_fcb_8', 'sirkulasi_fcb_12', 'sirkulasi_fcb_13'].indexOf(key) !== -1) {
							var kata = (key === 'sirkulasi_fcb_2') ? 'Resusitasi jantung paru' : (key === 'sirkulasi_fcb_4') ? 'Defibrilasi kardioversi' : (key === 'sirkulasi_fcb_8') ? 'Pasang iv line terapi cairan' : (key === 'sirkulasi_fcb_12') ? resusitasi3Obj['sirkulasi_fcb_13'] : '-';
							resusitasi3Val.push(kata);
						}
					}
					var resusitasi3 = resusitasi3Val.join('.<br>');

					// Assesmen disabilitas 5, 6, 9, 10, 14
					var disabilitasObj = JSON.parse(v.sirkulasi_fcb);
					var hasilAssesmentObj = JSON.parse(v.gcs_fcb);
					var disabilitasVal = [];

					for (var key in disabilitasObj) {
						if (disabilitasObj[key] !== null && ['sirkulasi_fcb_5', 'sirkulasi_fcb_9', 'sirkulasi_fcb_14'].indexOf(key) !== -1) {
							var kata = (key === 'sirkulasi_fcb_5') ? ('Pupil (' + disabilitasObj['sirkulasi_fcb_6'] + ')') : (key === 'sirkulasi_fcb_9') ? ('Refleks cahaya : ' + disabilitasObj['sirkulasi_fcb_10']) : (key === 'sirkulasi_fcb_14') ? 'Plegi parese' : '-';
							disabilitasVal.push(kata);
						}
					}
					var disabilatasKey = disabilitasVal.join('.<br>');
					var hasilAssesment = `GCS: e = ${(hasilAssesmentObj['gcs_fcb_1'] || 0)} &ensp; m = ${hasilAssesmentObj['gcs_fcb_2'] || 0} &ensp; v = ${hasilAssesmentObj['gcs_fcb_3'] || 0} &ensp; total = ${hasilAssesmentObj['gcs_fcb_4'] || 0}`;
					var assesmentDisabilatas = hasilAssesment + '<br><br>' + disabilatasKey;

					// Tanda Vital 
					var tandaVitalObj = JSON.parse(v.tanda_vital_fcb);

					var tekananDarah = (tandaVitalObj['tanda_vital_fcb_1'] || '-') + ' / ' + (tandaVitalObj['tanda_vital_fcb_2'] || '-') + ' mmHg';
					var frekuensiNadi = (tandaVitalObj['tanda_vital_fcb_3'] || '-') + ' x/mnt';
					var frekuensiNapas = (tandaVitalObj['tanda_vital_fcb_4'] || '-') + ' x/mnt';
					var suhuCB = (tandaVitalObj['tanda_vital_fcb_5'] || '-') + ' ℃';
					var spo2 = (tandaVitalObj['tanda_vital_fcb_6'] || '-') + ' %';
					var hasilAssesment = `GCS: e = ${(hasilAssesmentObj['gcs_fcb_1'] || 0)} &ensp; m = ${hasilAssesmentObj['gcs_fcb_2'] || 0} &ensp; v = ${hasilAssesmentObj['gcs_fcb_3'] || 0} &ensp; total = ${hasilAssesmentObj['gcs_fcb_4'] || 0}`;
					var assesmentDisabilatas = hasilAssesment + '<br><br>' + disabilatasKey;

					// SECONDARY MANAGEMENT
					// Alergi
					var alergiObj = JSON.parse(v.alergi_fcb);
					var alergiVal = [];

					for (var key in alergiObj) {
						if (alergiObj[key] !== null && ['alergi_fcb_1', 'alergi_fcb_2', 'alergi_fcb_3', 'alergi_fcb_5'].indexOf(key) !== -1) {
							var kata = (key === 'alergi_fcb_1') ? 'Obat' : (key === 'alergi_fcb_2') ? 'Makanan' : (key === 'alergi_fcb_3') ? alergiObj['alergi_fcb_4'] : (key === 'alergi_fcb_5') ? 'Tidak ada' : '-';
							alergiVal.push(kata);
						}
					}
					var alergiCodeBlue = alergiVal.join(', ');

					// LEMBAR MONITORING DAN TERAPI
					let tglJamMonitor = v.lembar_monitoring.map(val => `► ${val.tgl_fcb} ${val.jam_fcb}`).join('<br>');
					let evaluasiMonitor = v.lembar_monitoring.map(val => `► ${val.terapi_eva_fcb}`).join('<br>');

					// let tglJamMonitor = '';
					// let evaluasiMonitor = '';
					// $.each(v.lembar_monitoring, function(ind, val) {
					// 	tglJamMonitor += val.tgl_fcb + ' ' + val.jam_fcb + '<br>';
					// 	evaluasiMonitor += val.terapi_eva_fcb + '<br>';
					// })

					// KRITERIA PASCA RESUSITASI
					var kriteriaPascaObj = JSON.parse(v.paska_fcb);
					var kriteriaPascaVal = [];

					for (var key in kriteriaPascaObj) {
						if (kriteriaPascaObj[key] !== null && ['paska_fcb_1', 'paska_fcb_2', 'paska_fcb_3', 'paska_fcb_5', 'paska_fcb_6'].indexOf(key) !== -1) {
							var kata = (key === 'paska_fcb_1') ? 'ICU/HCU jam (' + (kriteriaPascaObj['paska_fcb_8'] || '-') + ') ' : (key === 'paska_fcb_2') ? 'PICU/NICU jam (' + (kriteriaPascaObj['paska_fcb_8'] || '-') + ') ' : (key === 'paska_fcb_3') ? 'PERAWATAN BIASA jam (' + (kriteriaPascaObj['paska_fcb_8'] || '-') + ') ' : (key === 'paska_fcb_4') ? 'DNR jam (' + (kriteriaPascaObj['paska_fcb_8'] || '-') + ') ' : (key === 'paska_fcb_5') ? 'MENINGGAL jam (' + (kriteriaPascaObj['paska_fcb_8'] || '-') + ') ' : (key === 'paska_fcb_6') ? 'TRANSFER KE ' + kriteriaPascaObj['paska_fcb_7'] + ' jam (' + (kriteriaPascaObj['paska_fcb_8'] || '-') + ') ' : '-';
							kriteriaPascaVal.push(kata);
						}
					}
					var kriteriaPasca = kriteriaPascaVal.join(', ');


					let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="left">${(v.nama_pasien)}</td>
							<td class="center">${(v.no_rm)}</td>
							<td class="center">${hitungUmur(v.tanggal_lahir)}</td>
							<td class="center">${v.kelamin}</td>
							<td class="center">${responAwal1}</td>
							<td class="center">${v.tgl_jam_fcb}</td>
							<td class="center">${rttCB}</td>
							<td class="center">${(v.nama_bangsal || '-')}</td>
							<td class="center">${(zonasiCodeBlue)}</td>
							<td class="center">${kriteriaAktivitas}</td>
							<td class="center">${kriteriaMedis}</td>
							<td class="center">${responAwal}</td>
							<td class="center">${jalanNapas}</td>
							<td class="center">${resusitasi1}</td>
							<td class="center">${AssesmentPernapasan}</td>
							<td class="center">${resusitasi2}</td>
							<td class="center">${sirkulasi}</td>
							<td class="center">${resusitasi3}</td>
							<td class="center">${assesmentDisabilatas}</td>
							<td class="center">${tekananDarah}</td>
							<td class="center">${frekuensiNadi}</td>
							<td class="center">${frekuensiNapas}</td>
							<td class="center">${suhuCB}</td>
							<td class="center">${spo2}</td>
							<td class="center">${(v.anamnesa_fcb || '-')}</td>
							<td class="center">${alergiCodeBlue}</td>
							<td class="center">${(v.pemeriksaan_fcb || '-')}</td>
							<td class="center">${(v.diagnosis_fcb || '-')}</td>
							<td class="center">${tglJamMonitor}</td>
							<td class="center">${evaluasiMonitor}</td>
							<td class="center">${kriteriaPasca}</td>
							<td class="center">${(v.keterangan_fcb || '-')}</td>
							<td class="center">${(v.leader_code_blue || '-')}</td>
						</tr>`;

					$('#table-lap-code-blue tbody').append(html);
				})

				// 	let html = /* html */ `
				// 	<tr>
				// 		<td colspan="8" class="right"><h6><b>Total</b></h6></td>
				// 		<td class="center"><h6><b>${number_format(data.jumlah_total, 0, ',', '.')} &ensp;</b></h6></td>
				// 	</tr>
				// `;

				// 	$('#table-lap-code-blue tfoot').append(html);

			},
			complete: function() {
				hideLoader()
				$('#kasir-search').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})

	}

	function resetForm() {
		$('#periode-laporan').val('Bulanan');
		$('#bulan').val('<?= date('m') ?>');
		$('#tahun').val('<?= date('Y') ?>');
		$('.bulanan, #tahun, #bulan').show();
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');

		$('#dokter-search, #nama_pasien').val('')
		// $('#s2id_dokter-search a .select2-chosen').html('Semua Dokter / Petugas')
		$('#s2id_nama_pasien a .select2-chosen').html('Semua Pasien')

		$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
		$('.harian').hide();
		$('#ruangan_ranap').val('');
		// $('#ruangan_ranap, .ruangan_rajal, .ruangan_ranap').hide();

		let filterLayanan = $('#jenis-layanan').val()
		$('#jenis-layanan').val(filterLayanan)

		// $('#penjamin-search-cb, #cara-bayar-search, #dokter-search, #keyword-search').val('')
		// $('#s2id_penjamin-search-cb a .select2-chosen').html('Pilih Penjamin')
	}
</script>