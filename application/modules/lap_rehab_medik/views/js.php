<style>
	.table-freeze {
		height: 80vh;
		margin: 2rem 0;
		overflow: auto;
		scroll-snap-type: both mandatory;
		/* white-space: nowrap; */
	}

	.table-freeze .table {
		margin: 0;
		overflow: unset;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
	}

	th,
	td {
		padding: 1rem 2.5rem;
		text-align: left;
	}

	thead th,
	.freeze-top th {
		/* border-bottom: 1px solid #ccc; */
		font-weight: 600;
		top: 0;
		z-index: 1;
	}

	th.tp {
		background-color: #fff;
		z-index: 2;
	}

	tbody th {
		left: 0;
		text-align: left;
	}

	tbody th,
	th.tp {
		border-right: 1px solid #ccc;
	}

	tr {
		padding: 0;
	}

	td {
		color: #555;
		vertical-align: top;
	}

	tbody tr:nth-child(odd) th {
		background-color: #fff;
	}

	thead th,
	tbody tr:nth-child(even) th,
	tr:nth-child(even) td {
		background-color: #f4f4f4;
		/* striped background color */
	}

	thead th,
	tbody th {
		position: sticky;
		-webkit-position: sticky;
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

	/* #table-data tbody tr td {
		font-size: 11px;
	} */
	#parent {
		height: 450px;
		overflow-y: auto;
		overflow-x: 0;
	}

	/* #table-lap-mutasi-obat {
        width: 100% !important;
    } */
</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('lap_rehab_medik/api/lap_rehab_medik') ?>';

	$(function() {

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
		$('#rehab-medik-search').modal('hide');
		resetForm();
		getLaporanRehabMedik(1);

		$('#btn-search').click(function() {
			$('#rehab-medik-search').modal('show')
		})

		$('#btn-export').click(function() {
			window.open('<?= base_url('lap_rehab_medik/export_lap_rehab_medik?') ?>' + $('#form-search-rehab-medik').serialize());
		});

		$('#btn-reload').click(function() {
			resetForm();
			getLaporanRehabMedik(1);
		})
	});

	$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	function resetForm() {
		$('#periode-laporan').val('Rentang Waktu');
		$('#bulan').val('<?= date('m') ?>');
		$('#tahun').val('<?= date('Y') ?>');
		$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show();
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');

		$('#dokter_search, #nama_pasien').val('')
		$('#s2id_dokter_search a .select2-chosen').html('Semua Dokter / Petugas')
		$('#s2id_nama_pasien a .select2-chosen').html('Semua Pasien')

		$('.harian, .bulanan, #tahun, #bulan').hide();
	}

	function getLaporanRehabMedik(page) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url('lap_rehab_medik/api/lap_rehab_medik/get_list_lap_rehab_medik') ?>/page/' + page,
			data: $('#form-search-rehab-medik').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getLaporanRehabMedik(page - 1);
					return false;
				}

				$('#jenis-periode-rehab-medik').html('Periode : ' + data.periode);
				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				// $('.lap-rehab-medik, #table-lap-rehab-medik tbody').show()
				$('#table-lap-rehab-medik tbody').empty();
				$('#table-lap-rehab-medik tfoot').empty();

				$.each(data.data, function(i, v) {
					let periode = '';
					if ($('#jenis-periode-rehab-medik').val() == 'Harian') {
						periode = 'Laporan Harian';
					}
					if ($('#jenis-periode-rehab-medik').val() == 'Bulanan') {
						periode = 'Laporan Bulanan';
					}
					if ($('#jenis-periode-rehab-medik').val() == 'Rentang Waktu') {
						periode = 'Laporan Rentang Waktu';
					}

					let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${v.no_rm}</td>
							<td class="left">${v.nama}</td>
							<td class="left">${v.layanan}</td>
							<td class="left">${v?.diagnosa?.map(diag => `${diag.nama}.<br>`)?.join('')}</td>
							<td class="left">${v.operator}</td>
							<td class="center">${v.profesi}</td>
						</tr>`;

					$('#table-lap-rehab-medik tbody').append(html);
				})

				let html = /* html */ `
				<tr>
					<td colspan="6" class="right"><h6><b>Total Data</b></h6></td>
					<td class="center"><h6><b>${number_format(data.jumlah, 0, ',', '.')} &ensp;</b></h6></td>
				</tr>
				<tr>
					<td colspan="6" class="right"><h6><b>Total Pasien</b></h6></td>
					<td class="center"><h6><b>${number_format(data.jumlah_total, 0, ',', '.')} &ensp;</b></h6></td>
				</tr>
			`;

				$('#table-lap-rehab-medik tfoot').append(html);
			},
			complete: function() {
				hideLoader()
				$('#rehab-medik-search').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})

	}

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

	$('#dokter_search').select2({
		ajax: {
			url: "<?= base_url('lap_rehab_medik/api/lap_rehab_medik/dokter_auto') ?>",
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
			var markup = '<b>' + data.nama + '</b><br/><i>' + data.jabatan + '</i>';
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
		getLaporanRehabMedik(page);
	}
</script>