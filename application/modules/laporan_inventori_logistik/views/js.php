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

	/* #table-lap-mutasi-logistik {
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

		$('.lap-mutasi-logistik, #table-lap-mutasi-logistik tbody').hide()
		$('#table-lap-mutasi-logistik tbody').empty();
		$('#table-lap-mutasi-logistik tfoot').empty();

		$('.lap-pengeluaran-logistik, #table-lap-pengeluaran-logistik tbody').hide()
		$('#table-lap-pengeluaran-logistik tbody').empty();
		$('#table-lap-pengeluaran-logistik tfoot').empty();

		$('.lap-pembelian-logistik, #table-lap-pembelian-logistik tbody').hide()
		$('#table-lap-pembelian-logistik tbody').empty();
		$('#table-lap-pembelian-logistik tfoot').empty();

		$('.lap-permintaan-logistik, #table-lap-permintaan-logistik tbody').hide()
		$('#table-lap-permintaan-logistik tbody').empty();
		$('#table-lap-permintaan-logistik tfoot').empty();

		$('.lap-pemakaian-logistik, #table-lap-pemakaian-logistik tbody').hide()
		$('#table-lap-pemakaian-logistik tbody').empty();
		$('#table-lap-pemakaian-logistik tfoot').empty();

		$('#modal-search').modal('hide');
		$('#pengeluaran-logistik-search').modal('hide');
		$('#modal-search-pembelian').modal('hide');
		$('#permintaan-logistik-search').modal('hide');
		$('#pemakaian-logistik-search').modal('hide');
		
		$('#jenis-laporan').change(function() {
			resetAllForm();

			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search').modal('show')
			} else if ($('#jenis-laporan').val() == '2') {
				$('#pengeluaran-logistik-search').modal('show')
			} else if ($('#jenis-laporan').val() == '3') {
				$('#modal-search-pembelian').modal('show')
			} else if ($('#jenis-laporan').val() == '4') {
				$('#permintaan-logistik-search').modal('show')
			} else if ($('#jenis-laporan').val() == '5') {
				$('#pemakaian-logistik-search').modal('show')
			}
		});

		$('#btn-search').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search').modal('show')
			} else if ($('#jenis-laporan').val() == '2') {
				$('#pengeluaran-logistik-search').modal('show')
			} else if ($('#jenis-laporan').val() == '3') {
				$('#modal-search-pembelian').modal('show')
			} else if ($('#jenis-laporan').val() == '4') {
				$('#permintaan-logistik-search').modal('show')
			} else if ($('#jenis-laporan').val() == '5') {
				$('#pemakaian-logistik-search').modal('show')
			}
		})

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_inventori_logistik/export_mutasi?') ?>' + $('#form-search').serialize());
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_inventori_logistik/export_pengeluaran?') ?>' + $('#form-search-pengeluaran-logistik').serialize());
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_inventori_logistik/export_pembelian?') ?>' + $('#form-search-pembelian').serialize());
			} else if ($('#jenis-laporan').val() == '4') {
				window.open('<?= base_url('laporan_inventori_logistik/export_permintaan?') ?>' + $('#form-search-permintaan-logistik').serialize());
			} else if ($('#jenis-laporan').val() == '5') {
				window.open('<?= base_url('laporan_inventori_logistik/export_pemakaian?') ?>' + $('#form-search-pemakaian-logistik').serialize());
			}
		});

		$('#btn-reload').click(function() {
			reloadData();
			resetAllForm();
		})
	})

	function openData() {
		$('.lap-mutasi-logistik, #table-lap-mutasi-logistik tbody').hide()
		$('#table-lap-mutasi-logistik tbody').empty();
		$('#table-lap-mutasi-logistik tfoot').empty();

		$('.lap-pengeluaran-logistik, #table-lap-pengeluaran-logistik tbody').hide()
		$('#table-lap-pengeluaran-logistik tbody').empty();
		$('#table-lap-pengeluaran-logistik tfoot').empty();

		$('.lap-pembelian-logistik, #table-lap-pembelian-logistik tbody').hide()
		$('#table-lap-pembelian-logistik tbody').empty();
		$('#table-lap-pembelian-logistik tfoot').empty();

		$('.lap-permintaan-logistik, #table-lap-permintaan-logistik tbody').hide()
		$('#table-lap-permintaan-logistik tbody').empty();
		$('#table-lap-permintaan-logistik tfoot').empty();

		$('.lap-pemakaian-logistik, #table-lap-pemakaian-logistik tbody').hide()
		$('#table-lap-pemakaian-logistik tbody').empty();
		$('#table-lap-pemakaian-logistik tfoot').empty();

		$('#modal-search').modal('hide');
		$('#pengeluaran-logistik-search').modal('hide');
		$('#modal-search-pembelian').modal('hide');
		$('#permintaan-logistik-search').modal('hide');
		$('#pemakaian-logistik-search').modal('hide');
		
	}

	function resetAllForm() {
		resetForm_logistik();
		resetForm_kel();
		resetFormPembelianlogistik();
		resetFormPermintaanlogistik();
		resetFormPemakaianlogistik();
	}

	function reloadData() {
		$('#jenis-laporan').val('')
		$('.lap-mutasi-logistik, #table-lap-mutasi-logistik tbody').hide()
		$('.lap-pengeluaran-logistik, #table-lap-pengeluaran-logistik tbody').hide()
		$('.lap-pembelian-logistik, #table-lap-pembelian-logistik tbody').hide()
		$('.lap-permintaan-logistik, #table-lap-permintaan-logistik tbody').hide()
		$('.lap-pemakaian-logistik, #table-lap-pemakaian-logistik tbody').hide()
		resetAllForm();
	}

	function paging(page) {
		if ($('#jenis-laporan').val() == "1") {
			getLaporanInventori(page);
		} else if ($('#jenis-laporan').val() == "2") {
			getLaporanPengeluaranLogistik(page);
		} else if ($('#jenis-laporan').val() == "3") {
			getLaporanPembelianLogistik(page);
		} else if ($('#jenis-laporan').val() == "4") {
			getLaporanPermintaanLogistik(page);
		} else if ($('#jenis-laporan').val() == '5') {
			getLaporanPemakaianLogistik(page);
		}
	}
</script>