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
	var baseUrl = '<?= base_url('laporan_casemix/api/laporan_casemix') ?>';
	var jenisPenjamin = 0;
	var subTotal = 0;

	$(function() {

		$('#jenis-layanan').change(function() {
			getLaporanCasemix(1)
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
		getLaporanCasemix(1);

		$('#btn-search').click(function() {
			$('#kasir-search').modal('show')
		})

		$('#btn-export').click(function() {
			window.open('<?= base_url('laporan_casemix/export_laporan_casemix?') ?>' + $('#form-search-code-blue').serialize());
		});

		$('#btn-reload').click(function() {
			resetForm();
			getLaporanCasemix(1);
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
		getLaporanCasemix(page);
	}

	function getLaporanCasemix(page) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('laporan_casemix/api/laporan_casemix/get_list_laporan_casemix') ?>/page/' + page + '/jenis/' + $('#jenis-layanan').val(),
			data: $('#form-search-code-blue').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getLaporanCasemix(page - 1);
					return false;
				}

				$('#jenis-periode-cb').html('Periode : ' + data.periode);
				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-lap-kunjungan-ranap tbody').empty();

				$.each(data.data, function(i, v) {

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

					// Diagnosa
					let diagnosa_utama = (v.nama_diagnosa != null ? v.nama_diagnosa + ' <b><i>(Utama);</i></b><br>' : '');
					let diagnosa_sekunder = v.diagnosa_sekunder.map(item => item.nama).join(';<br>');
					let diagnosa = diagnosa_utama + diagnosa_sekunder;

					// Tindakan Operasi
					let tindakan_ok = (v.tindakan_ok && v.tindakan_ok.length > 0 ? v.tindakan_ok.map(item => item.nama).join(';<br>') : '-');

					let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td	class="center" >${(v.tanggal_daftar || '-')}</td>
							<td class="center" >${(v.tanggal_keluar || '-')}</td>
							<td class="center">${(v.no_rm)}</td>
							<td class="left">${(v.nama)}</td>
							<td class="left" >${(v.dpjp || '-')}</td>
							<td class="center" >${(v.ruangan || '-')}</td>
							<td class="center" >${(v.jenis_layanan || '-')}</td>
							<td class="Left" >${diagnosa}</td>
							<td class="Left" >${tindakan_ok}</td>
							<td class="right" >${money_format(v.tagihan)}</td>
						</tr>`;

					$('#table-lap-kunjungan-ranap tbody').append(html);
				})

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