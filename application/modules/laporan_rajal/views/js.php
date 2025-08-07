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

	/* #table-lap-waktu-tunggu {
        width: 100% !important;
    } */

	#table-lap-waktu-tunggu {
	overflow-x: auto;
	white-space: nowrap;
	}

	/* #table-lap-waktu-tunggu tbody,
	#table-lap-waktu-tunggu thead {
	display: inline-block;
	} */

</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('laporan_rajal/api/laporan_rajal') ?>';

	$(function() {
		$('#page-now').val()

		// lap waktu tunggu
		$('.lap-waktu-tunggu, #table-lap-waktu-tunggu tbody').hide()
		$('#table-lap-waktu-tunggu tbody,  #table-lap-waktu-tunggu tfoot').empty();
		$('#modal-search-wt').modal('hide');

		// lap Pemeriksaan
		$('.lap-pemeriksaan, #table-lap-pemeriksaan tbody').hide()
		$('#table-lap-pemeriksaan tbody, #table-lap-pemeriksaan tfoot').empty();
		$('#modal-search-02').modal('hide');

		// lap kunjungan
		$('.lap-kunjungan, #table-lap-kunjungan tbody').hide()
		$('#table-lap-kunjungan tbody, #table-lap-kunjungan tfoot').empty();
		$('#modal-search-03').modal('hide');

		// lap mrs
		$('.lap-mrs, #table-lap-mrs tbody').hide()
		$('#table-lap-mrs tbody, #table-lap-mrs tfoot').empty();
		$('#modal-search-mrs').modal('hide');

		// lap diagnosa
		$('.lap-diagnosa, #table-lap-diagnosa tbody').hide()
		$('#table-lap-diagnosa tbody, #table-lap-diagnosa tfoot').empty();
		$('#modal-search-diagnosa').modal('hide');

		// lap diagnosa PP
		$('.lap-diagnosa-pp, #table-lap-diagnosa-pp tbody').hide()
		$('#table-lap-diagnosa-pp tbody, #table-lap-diagnosa-pp tfoot').empty();
		$('#modal-search-diagnosa-pp').modal('hide');

		// lap diagnosa PP
		$('.lap-status-keluar, #table-lap-status-keluar tbody').hide()
		$('#table-lap-status-keluar tbody, #table-lap-status-keluar tfoot').empty();
		$('#modal-search-status-keluar').modal('hide');

		// lap terima resep
		$('.lap-terima-resep, #table-lap-terima-resep tbody').hide()
		$('#table-lap-terima-resep tbody, #table-lap-terima-resep tfoot').empty();
		$('#modal-search-terima-resep').modal('hide');


		$('#jenis-laporan').change(function() {
			resetAllForm();

			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search-wt').modal('show')
			} 
			else if ($('#jenis-laporan').val() == '2') {
				$('#modal-search-02').modal('show')
			}
			else if ($('#jenis-laporan').val() == '3') {
				$('#modal-search-03').modal('show')
			}
			else if ($('#jenis-laporan').val() == '4') {
				$('#modal-search-mrs').modal('show')
			}
			else if ($('#jenis-laporan').val() == '5') {
				$('#modal-search-diagnosa').modal('show')
			}
			else if ($('#jenis-laporan').val() == '6') {
				$('#modal-search-diagnosa-pp').modal('show')
			}
			else if ($('#jenis-laporan').val() == '7') {
				$('#modal-search-status-keluar').modal('show')
			}
			else if ($('#jenis-laporan').val() == '8') {
				$('#modal-search-terima-resep').modal('show')
			}
		});

		$('#btn-search').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				$('#modal-search-wt').modal('show')
			} 
			else if ($('#jenis-laporan').val() == '2') {
				$('#modal-search-02').modal('show')
			}
			else if ($('#jenis-laporan').val() == '3') {
				$('#modal-search-03').modal('show')
			}
			else if ($('#jenis-laporan').val() == '4') {
				$('#modal-search-mrs').modal('show')
			}
			else if ($('#jenis-laporan').val() == '5') {
				$('#modal-search-diagnosa').modal('show')
			}
			else if ($('#jenis-laporan').val() == '6') {
				$('#modal-search-diagnosa-pp').modal('show')
			}
			else if ($('#jenis-laporan').val() == '7') {
				$('#modal-search-status-keluar').modal('show')
			}
			else if ($('#jenis-laporan').val() == '8') {
				$('#modal-search-terima-resep').modal('show')
			}
		})

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_rajal/export_laporan_01?') ?>' + $('#form-search').serialize());
			} 
			else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_rajal/export_laporan_02?') ?>' + $('#form-search-02').serialize());
			}
			else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_rajal/export_laporan_03?') ?>' + $('#form-search-03').serialize());
			}
			else if ($('#jenis-laporan').val() == '4') {
				window.open('<?= base_url('laporan_rajal/export_laporan_mrs?') ?>' + $('#form-search-mrs').serialize());
			}
			else if ($('#jenis-laporan').val() == '5') {
				window.open('<?= base_url('laporan_rajal/export_laporan_diagnosa?') ?>' + $('#form-search-diagnosa').serialize());
			}
			else if ($('#jenis-laporan').val() == '6') {
				window.open('<?= base_url('laporan_rajal/export_laporan_diagnosa_pp?') ?>' + $('#form-search-diagnosa-pp').serialize());
			}
			else if ($('#jenis-laporan').val() == '7') {
				window.open('<?= base_url('laporan_rajal/export_laporan_11?') ?>' + $('#form-modal-search-status-keluar').serialize());
			}
			else if ($('#jenis-laporan').val() == '8') {
				window.open('<?= base_url('laporan_rajal/export_laporan_terima_resep?') ?>' + $('#form-search-terima-resep').serialize());
			}
		});

		$('#btn-reload').click(function() {
			reloadData();
			resetAllForm();
		})

		$('#asal-kunjungan-status-keluar').change(function() {
			if ($('#jenis-laporan').val() == '7') { //Laporan Status Keluar Pasien
				if ($('#asal-kunjungan-status-keluar').val() == 'jalan') { // Poliklinik
					$('#asal-kunjungan-poli-search').parent().parent().show()
					$('#shift-poli').parent().parent().show()
				} else {
					$('#asal-kunjungan-poli-search').parent().parent().hide()
					$('#shift-poli').parent().parent().hide()
					$('#shift-poli').val('')
				}
			} else {
				$('#asal-kunjungan-poli-search').parent().parent().hide()
				$('#shift-poli').parent().parent().hide()
				$('#shift-poli').val('')
			}
		})
	})

	function openData() {
		// lap waktu tunggu
		$('.lap-waktu-tunggu, #table-lap-waktu-tunggu tbody').hide()
		$('#table-lap-waktu-tunggu tbody, #table-lap-waktu-tunggu tfoot').empty();
		$('#modal-search-wt').modal('hide');

		// lap pemeriksaan
		$('.lap-pemeriksaan, #table-lap-pemeriksaan tbody').hide()
		$('#table-lap-pemeriksaan tbody, #table-lap-pemeriksaan tfoot').empty();
		$('#modal-search-02').modal('hide');

		// lap kunjungan
		$('.lap-kunjungan, #table-lap-kunjungan tbody').hide()
		$('#table-lap-kunjungan tbody, #table-lap-kunjungan tfoot').empty();
		$('#modal-search-03').modal('hide');

		// lap mrs
		$('.lap-mrs, #table-lap-mrs tbody').hide()
		$('#table-lap-mrs tbody, #table-lap-mrs tfoot').empty();
		$('#modal-search-mrs').modal('hide');

		// lap diagnosa
		$('.lap-diagnosa, #table-lap-diagnosa tbody').hide()
		$('#table-lap-diagnosa tbody, #table-lap-diagnosa tfoot').empty();
		$('#modal-search-diagnosa').modal('hide');

		// lap diagnosa PP
		$('.lap-diagnosa-pp, #table-lap-diagnosa-pp tbody').hide()
		$('#table-lap-diagnosa-pp tbody, #table-lap-diagnosa-pp tfoot').empty();
		$('#modal-search-diagnosa-pp').modal('hide');

		// lap status keluar
		$('.lap-status-keluar, #table-lap-status-keluar tbody').hide()
		$('#table-lap-status-keluar tbody, #table-lap-status-keluar tfoot').empty();
		$('#modal-search-status-keluar').modal('hide');

		// lap terima resep
		$('.lap-terima-resep, #table-lap-terima-resep tbody').hide()
		$('#table-lap-terima-resep tbody, #table-lap-terima-resep tfoot').empty();
		$('#modal-search-terima-resep').modal('hide');
	}

	function resetAllForm() {
		resetForm_01();
		resetForm_02();
		resetForm_03();
		resetFormMrs();
		resetFormDiagnosa();
		resetFormDiagnosaPp();
		resetFormStatusKeluar();		
		$('#asal-kunjungan-poli-search').parent().parent().hide();
		$('#shift-poli').parent().parent().hide()
		$('#shift-poli').val('')
		resetFormTerimaResep();
	}

	function reloadData() {
		$('#jenis-laporan').val('')
		// lap waktu tunggu
		$('.lap-waktu-tunggu, #table-lap-waktu-tunggu tbody').hide();

		// lap pemeriksaan
		$('.lap-pemeriksaan, #table-lap-pemeriksaan tbody').hide();

		// lap kunjungan
		$('.lap-kunjungan, #table-lap-kunjungan tbody').hide();

		// lap mrs
		$('.lap-mrs, #table-lap-mrs tbody').hide();

		// lap mrs
		$('.lap-diagnosa, #table-lap-diagnosa tbody').hide();

		// lap status keluar
		$('.lap-status-keluar, #table-lap-status-keluar tbody').hide();

		// lap terima resep
		$('.lap-terima-resep, #table-lap-terima-resep tbody').hide();

		resetAllForm();
	}

	function paging(page) {
		if ($('#jenis-laporan').val() == "1") {
			getLaporanRajal(page);
		} 
		else if ($('#jenis-laporan').val() == "2") {
			getLporanPemeriksaan(page);
		}
		else if ($('#jenis-laporan').val() == "3") {
			getLporanKunjungan(page);
		}
		else if ($('#jenis-laporan').val() == "4") {
			getLaporanMrs(page);
		}
		else if ($('#jenis-laporan').val() == "5") {
			getLaporanDiagnosa(page);
		}
		else if ($('#jenis-laporan').val() == "6") {
			getLaporanDiagnosaPp(page);
		}
		else if ($('#jenis-laporan').val() == "7") {
			getLaporanStatusKeluar(page);
		}
		else if ($('#jenis-laporan').val() == "8") {
			getLaporanTerimaResep(page);
		}
	}
</script>
