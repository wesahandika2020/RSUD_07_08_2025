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

	/* #table-lap-kegiatan-pembedahan {
        width: 100% !important;
    } */
</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('laporan_operasi/api/laporan_operasi') ?>';

	$(function() {
		$('#page-now').val()
		openData();

		// Format Tanggal
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#periode-laporan').change(function() {
			if ($('#periode-laporan').val() == 'Bulanan') {
				$('.bulanan, #bulan, #tahun').show();
				$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
			}
			if ($('#periode-laporan').val() == 'Rentang Waktu') {
				$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show();
				$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide();
			}
			if ($('#periode-laporan').val() == 'Harian') {
				$('.harian, #tanggal-harian').show();
				$('.bulanan, .rentang-waktu').hide();
			}
		});

		$('#jenis-laporan').change(function() {
			resetAllForm();
			hideAllParameter();
			openData();

			let val = $(this).val();

			if (val !== '') {
				if (val === '1') {
					$('.param-01').show();
				} else if (val === '2') {
					$('.param-02').show();
				}

				// Tampilkan modal pencarian
				$('#modal-search').modal('show');
			}
			if (val === '') {
				reloadData();
			}
		});

		$('#btn-search').click(function() {
			hideAllParameter();

			let jenis = $('#jenis-laporan').val();

			if (jenis !== '') {
				if (jenis === '1') {
					$('.param-01').show();
				} else if (jenis === '2') {
					$('.param-02').show();
				} else if (jenis === '3') {
					$('.param-03').show();
				}

				// Tampilkan modal utama pencarian
				$('#modal-search').modal('show');
			}
		});

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_operasi/export_laporan_01?') ?>' + $('#form-search').serialize());
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_operasi/export_laporan_02?') ?>' + $('#form-search').serialize());
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_operasi/export_laporan_03?') ?>' + $('#form-search').serialize());
			} else if ($('#jenis-laporan').val() == '4') {
				window.open('<?= base_url('laporan_operasi/export_laporan_04?') ?>' + $('#form-search').serialize());
			} 
		});

		$('#btn-reload').click(function() {
			reloadData();
			resetAllForm();
		})


	})


	function getLaporan(page) {
		if ($('#jenis-laporan').val() == '1') {
			getLaporanBedahSentral(page);
		} else if ($('#jenis-laporan').val() == '2') {
			getKegiatanPembedahan(page);
		} else if ($('#jenis-laporan').val() == '3') {
			getAnastesiOK(page);
		} else if ($('#jenis-laporan').val() == '4') {
			getRekapOperasi(page);
		}
	}

	function hideAllParameter() {
		$('.param-01, .param-02, .param-03, .param-04').hide();
	}

	function openData() {
		$('.lap-bulanan-ibs, #table-lap-bulanan-ibs tbody').hide()
		$('#table-lap-bulanan-ibs tbody').empty();
		$('#table-lap-bulanan-ibs tfoot').empty();

		$('.lap-kegiatan-pembedahan, #table-lap-kegiatan-pembedahan tbody').hide()
		$('#table-lap-kegiatan-pembedahan tbody').empty();
		$('#table-lap-kegiatan-pembedahan tfoot').empty();

		$('.lap-anastesi-ok, #table-lap-anastesi-ok tbody').hide()
		$('#table-lap-anastesi-ok tbody').empty();
		$('#table-lap-anastesi-ok tfoot').empty();

		$('.lap-rekap-operasi, #table-lap-rekap-operasi tbody').hide()
		$('#table-lap-rekap-operasi tbody').empty();
		$('#table-lap-rekap-operasi tfoot').empty();

		// $('.lap-buku-penjualan, #table-lap-buku-penjualan tbody').hide()
		// $('#table-lap-buku-penjualan tbody').empty();

		// $('#buku-penjualan-search').modal('hide')
	}

	function resetAllForm() {
		$('#periode-laporan').val('Bulanan')
		$('#bulan').val('<?= date('m') ?>')
		$('#tahun').val('<?= date('Y') ?>')
		$('.bulanan, #tahun, #bulan').show()
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>')
		$('.harian, #tanggal-harian, .rentang-waktu').hide()

		$('#unit-search').val('<?= $this->session->userdata('id_unit') ?>').change();
		$('#s2id_unit-search a .select2-chosen').html('<?= $this->session->userdata('unit') ?>');
		$('#golongan').val('');
		$('#golongan-01').val('');

		$('#spesialisasi-search').val('')
		$('#s2id_spesialisasi-search a .select2-chosen').html('Semua...');
		// resetForm_01();
		// resetForm_02();
	}

	function reloadData() {
		$('#jenis-laporan').val('')
		// $('.lap-kegiatan-pembedahan, #table-lap-kegiatan-pembedahan tbody').hide()
		resetAllForm();
		openData();
		hideAllParameter();
	}

	function paging(page) {
		if ($('#jenis-laporan').val() == "1") {
			getLaporanBedahSentral(page);
		} else if ($('#jenis-laporan').val() == "2") {
			getKegiatanPembedahan(page);
		} else if ($('#jenis-laporan').val() == "3") {
			getAnastesiOK(page);
		} else if ($('#jenis-laporan').val() == "4") {
			getRekapOperasi(page);
		}
	}
</script>