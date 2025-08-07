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

</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('laporan_laboratorium/api/laporan_laboratorium') ?>';

	$(function() {
		$('#page-now').val()

		// lap rekap data dan harga pemeriksaan pasien
		$('.lap-rekap, #table-lap-rekap tbody').hide()
		$('#table-lap-rekap tbody, #table-lap-rekap tfoot').empty();
		$('#modal-search-rekap').modal('hide');

		$('#jenis-laporan').change(function() {
			resetAllForm();

			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search-rekap').modal('show')
			} 
		});

		$('#btn-search').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search-rekap').modal('show')
			} 
		})

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_laboratorium/export_laporan_rekap_data?') ?>' + $('#form-search-rekap').serialize());
			} 
		});

		$('#btn-reload').click(function() {
			reloadData();
			resetAllForm();
		})
	})

	function openData() {
		
		// lap mrs
		$('.lap-rekap, #table-lap-rekap tbody').hide()
		$('#table-lap-rekap tbody, #table-lap-rekap tfoot').empty();
		$('#modal-search-rekap').modal('hide');

	}

	function resetAllForm() {
		resetFormRekap();
	}

	function reloadData() {
		$('#jenis-laporan').val('')
		
		// lap rekap data dan harga pemeriksaan pasien
		$('.lap-rekap, #table-lap-rekap tbody').hide();

		resetAllForm();
	}

	function paging(page) {
		if ($('#jenis-laporan').val() == "1") {
			getRekapDataHarga(page);
		} 
	}
</script>