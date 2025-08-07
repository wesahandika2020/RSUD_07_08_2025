<style>
	.font-large {
		font-size: large;
	}

	.th-rotate {
		transform: rotate(-90deg);
		transform-origin: center;
		white-space: nowrap;
	}

	/* #table-lap-bulanan-ppi {
        width: 100% !important;
    } */
</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('laporan_ppi/api/laporan_ppi') ?>';

	$(function() {
		$('#page-now').val()

		// Label and table
		$('.lap-bulanan-ppi, #table-lap-bulanan-ppi tbody').hide()
		$('#table-lap-bulanan-ppi tbody').empty();
		$('#table-lap-bulanan-ppi tfoot').empty();

		$('.lap-kultur-ppi, #table-lap-kultur-ppi tbody').hide()
		$('#table-lap-kultur-ppi tbody').empty();
		$('#table-lap-kultur-ppi thead').empty();
		$('#table-lap-kultur-ppi tfoot').empty();

		$('.lap-antiobika-ppi, #table-lap-antiobika-ppi tbody').hide()
		$('#table-lap-antiobika-ppi tbody').empty();
		$('#table-lap-antiobika-ppi thead').empty();
		$('#table-lap-antiobika-ppi tfoot').empty();

		// Modal
		$('#lap-bulanan-ppi-search').modal('hide');
		$('#lap-kultur-ppi-search').modal('hide');
		$('#lap-antiobika-ppi-search').modal('hide');

		// Dropdown jenis laporan
		$('#jenis-laporan').change(function() {
			resetAllForm();

			if ($('#jenis-laporan').val() == '1') {
				$('#lap-bulanan-ppi-search').modal('show')
			} else if ($('#jenis-laporan').val() == '2') {
				$('#lap-kultur-ppi-search').modal('show')
			} else if ($('#jenis-laporan').val() == '3') {
				$('#lap-antiobika-ppi-search').modal('show')
			}
		});

		// Button search parameter
		$('#btn-search').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				$('#lap-bulanan-ppi-search').modal('show')
			} else if ($('#jenis-laporan').val() == '2') {
				$('#lap-kultur-ppi-search').modal('show')
			} else if ($('#jenis-laporan').val() == '3') {
				$('#lap-antiobika-ppi-search').modal('show')
			}
		})

		// Button Export Laporan
		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_ppi/export_laporan_bulanan?') ?>' + $('#form-search-ppi-bulanan').serialize());
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_ppi/export_laporan_kultur?') ?>' + $('#form-search-kultur-ppi').serialize());
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_ppi/export_laporan_antiobika?') ?>' + $('#form-search-antiobika-ppi').serialize());
			}
		});

		// Reload
		$('#btn-reload').click(function() {
			reloadData();
			resetAllForm();
		})
	})

	function openData() {
		// Tabel dan label
		$('.lap-bulanan-ppi, #table-lap-bulanan-ppi tbody').hide()
		$('#table-lap-bulanan-ppi tbody').empty();
		$('#table-lap-bulanan-ppi tfoot').empty();

		$('.lap-kultur-ppi, #table-lap-kultur-ppi tbody').hide()
		$('#table-lap-kultur-ppi tbody').empty();
		$('#table-lap-kultur-ppi thead').empty();
		$('#table-lap-kultur-ppi tfoot').empty();

		$('.lap-antiobika-ppi, #table-lap-antiobika-ppi tbody').hide()
		$('#table-lap-antiobika-ppi tbody').empty();
		$('#table-lap-antiobika-ppi thead').empty();
		$('#table-lap-antiobika-ppi tfoot').empty();

		// Modal search hide
		$('#lap-bulanan-ppi-search').modal('hide')
		$('#lap-kultur-ppi-search').modal('hide')
	}

	function resetAllForm() {
		resetForm_01();
		resetForm_02();
		resetForm_03();
	}

	function reloadData() {
		$('#jenis-laporan').val('')
		$('.lap-bulanan-ppi, #table-lap-bulanan-ppi tbody').hide()
		$('.lap-kultur-ppi, #table-lap-kultur-ppi thead').hide()
		$('.lap-antiobika-ppi, #table-lap-antiobika-ppi thead').hide()
		resetAllForm();
	}

	function paging(page) {
		if ($('#jenis-laporan').val() == "1") {
			getLaporanBulananPPI(page);
		} else if ($('#jenis-laporan').val() == "2") {
			getLaporanKulturPPI(page);
		} else if ($('#jenis-laporan').val() == "3") {
			getLaporanAntiobikaPPI(page);
		}
	}
</script>