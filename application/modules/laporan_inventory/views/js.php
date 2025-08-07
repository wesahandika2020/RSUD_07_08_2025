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
	var baseUrl = '<?= base_url('laporan_inventory/api/laporan_inventory') ?>';

	$(function() {
		$('#page-now').val()

		$('.lap-mutasi-obat, #table-lap-mutasi-obat tbody').hide()
		$('#table-lap-mutasi-obat tbody').empty();
		$('#table-lap-mutasi-obat tfoot').empty();

		$('.lap-buku-penjualan, #table-lap-buku-penjualan tbody').hide()
		$('#table-lap-buku-penjualan tbody').empty();

		$('.lap-penjualan-obat, #table-lap-penjualan-obat tbody').hide()
		$('#table-lap-penjualan-obat tbody').empty();

		$('.lap-pemakaian-obat, #table-lap-pemakaian-obat tbody').hide()
		$('#table-lap-pemakaian-obat tbody').empty();
		$('#table-lap-pemakaian-obat tfoot').empty();

		$('.lap-pemakaian-obat-all-unit, #table-lap-pemakaian-obat-all-unit tbody').hide()
		$('#table-lap-pemakaian-obat-all-unit tbody').empty();
		$('#table-lap-pemakaian-obat-all-unit tfoot').empty();
		
		$('.lap-pengeluaran-obat, #table-lap-pengeluaran-obat tbody').hide()
		$('#table-lap-pengeluaran-obat tbody').empty();
		$('#table-lap-pengeluaran-obat tfoot').empty();

		$('.lap-permintaan-obat, #table-lap-permintaan-obat tbody').hide()
		$('#table-lap-permintaan-obat tbody').empty();

		$('.lap-permintaan-kegudang, #table-lap-permintaan-kegudang tbody').hide();
		$('#table-lap-permintaan-kegudang tbody').empty();
		$('#table-lap-permintaan-kegudang tfoot').empty();
		
		$('.lap-permintaan-takterlayani, #table-lap-permintaan-takterlayani tbody').hide();
		$('#table-lap-permintaan-takterlayani tbody').empty();
		
		$('.lap-stok-opname, #table-lap-stok-opname tbody').hide();
		$('#table-lap-stok-opname tbody').empty();

		$('#modal-search').modal('hide');
		$('#buku-penjualan-search').modal('hide');
		$('#penjualan-obat-search').modal('hide');
		$('#pemakaian-obat-search').modal('hide');
		$('#pemakaian-obat-all-unit-search').modal('hide');
		$('#pengeluaran-obat-search').modal('hide');
		$('#permintaan-obat-search').modal('hide');
		$('#permintaan-kegudang-search').modal('hide');
		$('#permintaan-takterlayani-search').modal('hide');
		$('#stok-opname-search').modal('hide');

		$('#jenis-laporan').change(function() {
			resetAllForm();

			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search').modal('show')
			} else if ($('#jenis-laporan').val() == '2') {
				$('#buku-penjualan-search').modal('show')
			} else if ($('#jenis-laporan').val() == '3') {
				$('#penjualan-obat-search').modal('show')
			} else if ($('#jenis-laporan').val() == '4') {
				$('#pemakaian-obat-search').modal('show')
			} else if ($('#jenis-laporan').val() == '5') {
				$('#pemakaian-obat-all-unit-search').modal('show')
			} else if ($('#jenis-laporan').val() == '6') {
				$('#pengeluaran-obat-search').modal('show')
			} else if ($('#jenis-laporan').val() == '7') {
				$('#permintaan-obat-search').modal('show')
			} else if ($('#jenis-laporan').val() == '8') {
				$('#permintaan-kegudang-search').modal('show')
			} else if ($('#jenis-laporan').val() == '9') {
				$('#permintaan-takterlayani-search').modal('show')
			} else if ($('#jenis-laporan').val() == '10') {
				$('#stok-opname-search').modal('show')
			}
		});

		$('#btn-search').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search').modal('show')
			} else if ($('#jenis-laporan').val() == '2') {
				$('#buku-penjualan-search').modal('show')
			} else if ($('#jenis-laporan').val() == '3') {
				$('#penjualan-obat-search').modal('show')
			} else if ($('#jenis-laporan').val() == '4') {
				$('#pemakaian-obat-search').modal('show')
			} else if ($('#jenis-laporan').val() == '5') {
				$('#pemakaian-obat-all-unit-search').modal('show')
			} else if ($('#jenis-laporan').val() == '6') {
				$('#pengeluaran-obat-search').modal('show')
			} else if ($('#jenis-laporan').val() == '7') {
				$('#permintaan-obat-search').modal('show')
			} else if ($('#jenis-laporan').val() == '8') {
				$('#permintaan-kegudang-search').modal('show')
			} else if ($('#jenis-laporan').val() == '9') {
				$('#permintaan-takterlayani-search').modal('show')
			} else if ($('#jenis-laporan').val() == '10') {
				$('#stok-opname-search').modal('show')
			}
		})

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_inventory/export_laporan_01?') ?>' + $('#form-search').serialize());
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_inventory/export_laporan_02?') ?>' + $('#form-search-buku-penjualan').serialize());
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_inventory/export_laporan_03?') ?>' + $('#form-search-penjualan-obat').serialize());
			} else if ($('#jenis-laporan').val() == '4') {
				window.open('<?= base_url('laporan_inventory/export_laporan_04?') ?>' + $('#form-search-pemakaian-obat').serialize());
			} else if ($('#jenis-laporan').val() == '5') {
				window.open('<?= base_url('laporan_inventory/export_laporan_05?') ?>' + $('#form-search-pemakaian-obat-all-unit').serialize());
			} else if ($('#jenis-laporan').val() == '6') {
				window.open('<?= base_url('laporan_inventory/export_laporan_06?') ?>' + $('#form-search-pengeluaran-obat').serialize());
			} else if ($('#jenis-laporan').val() == '7') {
				window.open('<?= base_url('laporan_inventory/export_laporan_07?') ?>' + $('#form-search-permintaan-obat').serialize());
			} else if ($('#jenis-laporan').val() == '8') {
				window.open('<?= base_url('laporan_inventory/export_laporan_08?') ?>' + $('#form-search-permintaan-kegudang').serialize());
			} else if ($('#jenis-laporan').val() == '9') {
				window.open('<?= base_url('laporan_inventory/export_laporan_09?') ?>' + $('#form-search-permintaan-takterlayani').serialize());
			} else if ($('#jenis-laporan').val() == '10') {
				window.open('<?= base_url('laporan_inventory/export_laporan_10?') ?>' + $('#form-search-stok-opname').serialize());
			}
		});

		$('#btn-reload').click(function() {
			reloadData();
			resetAllForm();
		})
	})

	function openData() {
		$('.lap-mutasi-obat, #table-lap-mutasi-obat tbody').hide()
		$('#table-lap-mutasi-obat tbody').empty();
		$('#table-lap-mutasi-obat tfoot').empty();

		$('.lap-buku-penjualan, #table-lap-buku-penjualan tbody').hide()
		$('#table-lap-buku-penjualan tbody').empty();

		$('.lap-penjualan-obat, #table-lap-penjualan-obat tbody').hide()
		$('#table-lap-penjualan-obat tbody').empty();

		$('.lap-pemakaian-obat, #table-lap-pemakaian-obat tbody').hide()
		$('#table-lap-pemakaian-obat tbody').empty();
		$('#table-lap-pemakaian-obat tfoot').empty();

		$('.lap-pemakaian-obat-all-unit, #table-lap-pemakaian-obat-all-unit tbody').hide()
		$('#table-lap-pemakaian-obat-all-unit tbody').empty();
		$('#table-lap-pemakaian-obat-all-unit tfoot').empty();

		$('.lap-pengeluaran-obat, #table-lap-pengeluaran-obat tbody').hide()
		$('#table-lap-pengeluaran-obat tbody').empty();
		$('#table-lap-pengeluaran-obat tfoot').empty();

		$('.lap-permintaan-obat, #table-lap-permintaan-obat tbody').hide()
		$('#table-lap-permintaan-obat tbody').empty();

		$('.lap-permintaan-kegudang, #table-lap-permintaan-kegudang tbody').hide()
		$('#table-lap-permintaan-kegudang tbody').empty();
		$('#table-lap-permintaan-kegudang tfoot').empty();

		$('.lap-permintaan-takterlayani, #table-lap-permintaan-takterlayani tbody').hide()
		$('#table-lap-permintaan-takterlayani tbody').empty();

		$('.lap-stok-opname, #table-lap-stok-opname tbody').hide()
		$('#table-lap-stok-opname tbody').empty();

		$('#modal-search').modal('hide')
		$('#buku-penjualan-search').modal('hide')
		$('#penjualan-obat-search').modal('hide')
		$('#pemakaian-obat-search').modal('hide')
		$('#pemakaian-obat-all-unit-search').modal('hide')
		$('#pengeluaran-obat-search').modal('hide')
		$('#permintaan-obat-search').modal('hide')
		$('#permintaan-kegudang-search').modal('hide')
		$('#permintaan-takterlayani-search').modal('hide')
		$('#stok-opname-search').modal('hide')
	}

	function resetAllForm() {
		resetForm_01();
		resetForm_02();
		resetForm_03();
		resetForm_04();
		resetForm_05();
		resetForm_06();
		resetForm_07();
		resetForm_08();
		resetForm_09();
		resetForm_10();
	}

	function reloadData() {
		$('#jenis-laporan').val('')
		$('.lap-mutasi-obat, #table-lap-mutasi-obat tbody').hide()
		$('.lap-buku-penjualan, #table-lap-buku-penjualan tbody').hide()
		$('.lap-penjualan-obat, #table-lap-penjualan-obat tbody').hide()
		$('.lap-pemakaian-obat, #table-lap-pemakaian-obat tbody').hide()
		$('.lap-pemakaian-obat-all-unit, #table-lap-pemakaian-obat-all-unit tbody').hide()
		$('.lap-pengeluaran-obat, #table-lap-pengeluaran-obat tbody').hide()
		$('.lap-permintaan-obat, #table-lap-permintaan-obat tbody').hide()
		$('.lap-permintaan-kegudang, #table-lap-permintaan-kegudang tbody').hide()
		$('.lap-permintaan-takterlayani, #table-lap-permintaan-takterlayani tbody').hide()
		$('.lap-stok-opname, #table-lap-stok-opname tbody').hide()
		resetAllForm();
	}

	function paging(page) {
		if ($('#jenis-laporan').val() == "1") {
			getLaporanInventory(page);
		} else if ($('#jenis-laporan').val() == "2") {
			getLaporanBukuPenjualan(page);
		} else if ($('#jenis-laporan').val() == "3") {
			getLaporanPenjualanObat(page);
		} else if ($('#jenis-laporan').val() == "4") {
			getLaporanPemakaianObat(page);
		} else if ($('#jenis-laporan').val() == "5") {
			getLaporanPemakaianObatAllUnit(page);
		} else if ($('#jenis-laporan').val() == "6") {
			getLaporanPengeluaranObat(page);
		} else if ($('#jenis-laporan').val() == "7") {
			getLaporanPermintaanObat(page);
		} else if ($('#jenis-laporan').val() == "8") {
			getLaporanPermintaanKegudang(page);
		} else if ($('#jenis-laporan').val() == "9") {
			getLaporanPermintaanTakTerlayani(page);
		} else if ($('#jenis-laporan').val() == "10") {
			getLaporanStokOpname(page);
		}
	}
</script>