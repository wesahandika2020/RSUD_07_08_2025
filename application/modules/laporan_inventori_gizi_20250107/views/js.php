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

	/* #table-lap-mutasi-gizi {
        width: 100% !important;
    } */
</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	
	$(function() {
		$('#page-now').val()

		$('.lap-mutasi-gizi, #table-lap-mutasi-gizi tbody').hide()
		$('#table-lap-mutasi-gizi tbody').empty();
		$('#table-lap-mutasi-gizi tfoot').empty();

		$('.lap-pengeluaran-gizi, #table-lap-pengeluaran-gizi tbody').hide()
		$('#table-lap-pengeluaran-gizi tbody').empty();
		$('#table-lap-pengeluaran-gizi tfoot').empty();

		$('.lap-pembelian-gizi, #table-lap-pembelian-gizi tbody').hide()
		$('#table-lap-pembelian-gizi tbody').empty();
		$('#table-lap-pembelian-gizi tfoot').empty();

		$('.lap-permintaan-gizi, #table-lap-permintaan-gizi tbody').hide()
		$('#table-lap-permintaan-gizi tbody').empty();
		$('#table-lap-permintaan-gizi tfoot').empty();

		$('.lap-pemakaian-gizi, #table-lap-pemakaian-gizi tbody').hide()
		$('#table-lap-pemakaian-gizi tbody').empty();
		$('#table-lap-pemakaian-gizi tfoot').empty();

		$('#modal-search').modal('hide');
		$('#pengeluaran-gizi-search').modal('hide');
		$('#modal-search-pembelian').modal('hide');
		$('#permintaan-gizi-search').modal('hide');
		$('#pemakaian-gizi-search').modal('hide');
		
		$('#jenis-laporan').change(function() {
			resetAllForm();

			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search').modal('show')
			} else if ($('#jenis-laporan').val() == '2') {
				$('#pengeluaran-gizi-search').modal('show')
			} else if ($('#jenis-laporan').val() == '3') {
				$('#modal-search-pembelian').modal('show')
			} else if ($('#jenis-laporan').val() == '4') {
				$('#permintaan-gizi-search').modal('show')
			} else if ($('#jenis-laporan').val() == '5') {
				$('#pemakaian-gizi-search').modal('show')
			}
		});

		$('#btn-search').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search').modal('show')
			} else if ($('#jenis-laporan').val() == '2') {
				$('#pengeluaran-gizi-search').modal('show')
			} else if ($('#jenis-laporan').val() == '3') {
				$('#modal-search-pembelian').modal('show')
			} else if ($('#jenis-laporan').val() == '4') {
				$('#permintaan-gizi-search').modal('show')
			} else if ($('#jenis-laporan').val() == '5') {
				$('#pemakaian-gizi-search').modal('show')
			}
		})

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_inventori_gizi/export_mutasi?') ?>' + $('#form-search').serialize());
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_inventori_gizi/export_pengeluaran?') ?>' + $('#form-search-pengeluaran-gizi').serialize());
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_inventori_gizi/export_pembelian?') ?>' + $('#form-search-pembelian').serialize());
			} else if ($('#jenis-laporan').val() == '4') {
				window.open('<?= base_url('laporan_inventori_gizi/export_permintaan?') ?>' + $('#form-search-permintaan-gizi').serialize());
			} else if ($('#jenis-laporan').val() == '5') {
				window.open('<?= base_url('laporan_inventori_gizi/export_pemakaian?') ?>' + $('#form-search-pemakaian-gizi').serialize());
			}
		});

		$('#btn-reload').click(function() {
			reloadData();
			resetAllForm();
		})
	})

	function openData() {
		$('.lap-mutasi-gizi, #table-lap-mutasi-gizi tbody').hide()
		$('#table-lap-mutasi-gizi tbody').empty();
		$('#table-lap-mutasi-gizi tfoot').empty();

		$('.lap-pengeluaran-gizi, #table-lap-pengeluaran-gizi tbody').hide()
		$('#table-lap-pengeluaran-gizi tbody').empty();
		$('#table-lap-pengeluaran-gizi tfoot').empty();

		$('.lap-pembelian-gizi, #table-lap-pembelian-gizi tbody').hide()
		$('#table-lap-pembelian-gizi tbody').empty();
		$('#table-lap-pembelian-gizi tfoot').empty();

		$('.lap-permintaan-gizi, #table-lap-permintaan-gizi tbody').hide()
		$('#table-lap-permintaan-gizi tbody').empty();
		$('#table-lap-permintaan-gizi tfoot').empty();

		$('.lap-pemakaian-gizi, #table-lap-pemakaian-gizi tbody').hide()
		$('#table-lap-pemakaian-gizi tbody').empty();
		$('#table-lap-pemakaian-gizi tfoot').empty();

		$('#modal-search').modal('hide');
		$('#pengeluaran-gizi-search').modal('hide');
		$('#modal-search-pembelian').modal('hide');
		$('#permintaan-gizi-search').modal('hide');
		$('#pemakaian-gizi-search').modal('hide');
		
	}

	function resetAllForm() {
		resetForm_gizi();
		resetForm_kel();
		resetFormPembeliangizi();
		resetFormPermintaangizi();
		resetFormPemakaiangizi();
	}

	function reloadData() {
		$('#jenis-laporan').val('')
		$('.lap-mutasi-gizi, #table-lap-mutasi-gizi tbody').hide()
		$('.lap-pengeluaran-gizi, #table-lap-pengeluaran-gizi tbody').hide()
		$('.lap-pembelian-gizi, #table-lap-pembelian-gizi tbody').hide()
		$('.lap-permintaan-gizi, #table-lap-permintaan-gizi tbody').hide()
		$('.lap-pemakaian-gizi, #table-lap-pemakaian-gizi tbody').hide()
		resetAllForm();
	}

	function paging(page) {
		if ($('#jenis-laporan').val() == "1") {
			getLaporanInventori(page);
		} else if ($('#jenis-laporan').val() == "2") {
			getLaporanPengeluaranGizi(page);
		} else if ($('#jenis-laporan').val() == "3") {
			getLaporanPembelianGizi(page);
		} else if ($('#jenis-laporan').val() == "4") {
			getLaporanPermintaanGizi(page);
		} else if ($('#jenis-laporan').val() == '5') {
			getLaporanPemakaianGizi(page);
		}
	}
</script>