<script>
	var dWidth = $(window).width()
	var dHeight = $(window).height()
	var x = screen.width / 2 - dWidth / 2
	var y = screen.height / 2 - dHeight / 2
	var baseUrl = '<?= base_url('laporan_rm/api/laporan_rm') ?>'
	// var totalBilling = 0;
	// var totalAll = 0;
	// var subTotal = 0;
	// var jenisPenjamin = 0;

	$(function() {
		getLaporanRM(1)

		$('.lap-rajal, #table-data tbody').hide()
		$('.lap-ranap, #table-data-ranap tbody').hide()
		$('.lap-03, #table-data-03 tbody').hide()
		$('.lap-04, #table-data-04 tbody').hide()
		$('.lap-05').hide()
		$('.lap-06, #table-data-06 tbody').hide()
		$('.lap-08').hide()
		$('.lap-08 #tabs-lap08').hide()
		$('.lap-09').hide()
		$('.lap-09 #tabs-lap09').hide()
		$('.lap-10').hide()
		$('.lap-10 #tabs-lap09').hide()
		$('.lap-11').hide()
		$('.lap-11 #tabs-lap11').hide()
		$('.lap-12').hide()
		$('.lap-12 #tabs-lap12').hide()
		$('.lap-13').hide()
		$('.lap-13 #tabs-lap13').hide()
		$('.lap-14').hide()
		$('.lap-14 #tabs-lap14').hide()
		$('.lap-15').hide()
		$('.lap-15 #tabs-lap15').hide()
		$('.lap-16').hide()
		$('.lap-16 #tabs-lap16').hide()
		$('.lap-17').hide()
		$('.lap-17 #tabs-lap17').hide()
		$('.lap-18').hide()
		$('.lap-18 #tabs-lap18').hide()

		$('#jenis-laporan').change(function() {
			if ($('#jenis-laporan').val() !== '') {
				resetAllForm()
				$('#modal-search').modal('show')

			} else {
				$('#modal-search').modal('hide')
			}
		})

		// Format Tanggal
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
			format: 'dd/mm/yyyy',
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#btn-search').click(function() {
			if ($('#jenis-laporan').val() !== '') {
				$('#modal-search').modal('show')
			} else {
				$('#modal-search').modal('hide')
			}
		})

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_rm/export_laporan_01?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_rm/export_laporan_02?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_rm/export_laporan_03?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '4') {
				window.open('<?= base_url('laporan_rm/export_laporan_04?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '5') {
				const tabActive = $('#tabs-lap05 .nav-item .active').attr('aria-controls')
				window.open('<?= base_url('laporan_rm/export_laporan_05?') ?>' + $('#form-search').serialize() + '&tab_active=' + encodeURIComponent(tabActive))
			} else if ($('#jenis-laporan').val() == '6') {
				const tabActive = $('#tabs-lap06 .nav-item .active').attr('aria-controls')
				window.open('<?= base_url('laporan_rm/export_laporan_06?') ?>' + $('#form-search').serialize() + '&tab_active=' + encodeURIComponent(tabActive))
			} else if ($('#jenis-laporan').val() == '7') {
				const tabActive = $('#tabs-lap07 .nav-item .active').attr('aria-controls')
				window.open('<?= base_url('laporan_rm/export_laporan_07?') ?>' + $('#form-search').serialize() + '&tab_active=' + encodeURIComponent(tabActive))
			} else if ($('#jenis-laporan').val() == '8') {
				window.open('<?= base_url('laporan_rm/export_laporan_08?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '10') {
				window.open('<?= base_url('laporan_rm/export_laporan_10?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '11') {
				window.open('<?= base_url('laporan_rm/export_laporan_11?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '12') {
				window.open('<?= base_url('laporan_rm/export_laporan_12?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '13') {
				window.open('<?= base_url('laporan_rm/export_laporan_13?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '14') {
				window.open('<?= base_url('laporan_rm/export_laporan_14?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '15') {
				window.open('<?= base_url('laporan_rm/export_laporan_15?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '16') {
				window.open('<?= base_url('laporan_rm/export_laporan_16?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '17') {
				window.open('<?= base_url('laporan_rm/export_laporan_17?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '18') {
				window.open('<?= base_url('laporan_rm/export_laporan_18?') ?>' + $('#form-search').serialize())
			}
		})

		$('#asal-kunjungan-search').change(function() {
			if ($('#jenis-laporan').val() == '12') {
				if ($('#asal-kunjungan-search').val() == '1') { // Poliklinik
					$('#asal-kunjungan-poli-search').parent().parent().show()
				} else {
					$('#asal-kunjungan-poli-search').parent().parent().hide()
				}
			} else {
				$('#asal-kunjungan-poli-search').parent().parent().hide()
			}
		})

		$('#asal-kunjungan-11-search').change(function() {
			if ($('#jenis-laporan').val() == '11') {
				// igd, ranap , icare
				if ($('#asal-kunjungan-11-search').val() == 'jalan') { // Poliklinik
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
			}
		})

		$('#periode-laporan').change(function() {
			if ($('#periode-laporan').val() == 'Harian') {
				$('.harian, #tanggal-harian').show()
				$('.bulanan, .rentang-waktu').hide()
			}
			if ($('#periode-laporan').val() == 'Bulanan') {
				$('.bulanan, #bulan, #tahun').show()
				$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide()
			}
			if ($('#periode-laporan').val() == 'Rentang Waktu') {
				$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show()
				$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide()
			}
		})

		$('#jenis-rawat-search').change(function() {
			$('#tempat-layanan-1').val('')
			$('#tempat-layanan-2').val('')
			$('#tempat-layanan-3').val('')

			if ($('#jenis-rawat-search').val() === '1') {
				$('#tempat-layanan-2, .penunjang').hide()
				$('#tempat-layanan-3, .ranap').hide()
				$('#tempat-layanan-1, .rajal').show()
			} else if ($('#jenis-rawat-search').val() === '4') {
				$('#tempat-layanan-1, .rajal').hide()
				$('#tempat-layanan-2, .ranap').hide()
				$('#tempat-layanan-3, .penunjang').show()
			} else {
				$('#tempat-layanan-3, .penunjang').hide()
				$('#tempat-layanan-1, .rajal').hide()
				$('#tempat-layanan-2, .ranap').show()
			}

			if ($('#jenis-laporan').val() == '13') {
				$('#tempat-layanan-3, .penunjang').hide()
				$('#tempat-layanan-1, .rajal').hide()
				$('#tempat-layanan-2, .ranap').hide()
			}
		})

		// remove validasi keyup
		$('.validasi-input, .form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#btn-reload').click(function() {
			reloadData()
			resetAllForm()
			// getLaporanRM(1)
		})
	})

	function reloadData() {
		$('#jenis-laporan').val('')
		$('.ranap').hide()
		$('.lap-rajal, #table-data tbody').hide()
		$('.lap-ranap, #table-data-ranap tbody').hide()
		$('.lap-03, #table-data-03 tbody').hide()
		$('.lap-05').hide()
		$('.lap-04, #table-data-04 tbody').hide()
		$('.lap-06').hide()
		$('.lap-06, #table-data-06 tbody').hide()
		$('#dokter-search').hide()
		$('.lap-07').hide()
		$('.lap-07, #table-data-07 tbody').hide()
		$('.lap-08').hide()
		$('.lap-08, #table-data-08 tbody').hide()
		$('.lap-09').hide()
		$('.lap-09, #table-data-09 tbody').hide()
		$('.lap-10').hide()
		$('.lap-10, #table-data-09 tbody').hide()
		$('.lap-11').hide()
		$('.lap-11, #table-data-11 tbody').hide()
		$('.lap-12').hide()
		$('.lap-12, #table-data-12 tbody').hide()
		$('.lap-13').hide()
		$('.lap-13, #table-data-13 tbody').hide()
		$('.lap-14').hide()
		$('.lap-14, #table-data-14 tbody').hide()
		$('.lap-15').hide()
		$('.lap-15, #table-data-15 tbody').hide()
		$('.lap-16').hide()
		$('.lap-16, #table-data-16 tbody').hide()
		$('.lap-17').hide()
		$('.lap-17, #table-data-17 tbody').hide()
		$('.lap-18').hide()
		$('.lap-18, #table-data-18 tbody').hide()
		resetAllForm()
	}

	function resetAllForm() {
		$('#jenis-rawat-search').parent().parent().show()
		$('#penjamin-search').parent().parent().show()
		$('#kunjungan-search').parent().parent().show()
		$('#tempat-layanan-1, .rajal').show()
		$('#tempat-layanan-2, .ranap').show()
		$('#tempat-layanan-3, .penunjang').show()
		$('#periode-laporan').val('Harian')
		$('#jenis-penunjang').parent().parent().hide()
		$('#jenis-kasus').parent().parent().hide()
		$('#asal-kunjungan-search').parent().parent().hide()
		$('#asal-kunjungan-poli-search').parent().parent().hide()
		$('#asal-kunjungan-11-search').parent().parent().hide()
		$('#status_keluar').parent().parent().hide()
		$('#kelas-rawat').parent().parent().hide()
		$('#shift-poli').parent().parent().hide()

		if ($('#jenis-laporan').val() == '1') {
			$('#jenis-rawat-search').val('1')
			$('#tempat-layanan-1, .rajal').show()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
		} else if ($('#jenis-laporan').val() == '2') {
			$('#jenis-rawat-search').val('2').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').show()
			$('#tempat-layanan-3, .penunjang').hide()
			$('#asal-kunjungan-search').parent().parent().show()
			$('#kelas-rawat').parent().parent().show()
		} else if ($('#jenis-laporan').val() == '3') {
			$('#jenis-rawat-search').val('2')
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').show()
			$('#tempat-layanan-3, .penunjang').hide()
		} else if ($('#jenis-laporan').val() == '4') {
			$('#jenis-rawat-search').val('2')
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').show()
			$('#tempat-layanan-3, .penunjang').hide()
		} else if ($('#jenis-laporan').val() == '6') {
			$('#jenis-rawat-search').val('1')
			$('#tempat-layanan-1, .rajal').show()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
		} else if ($('#jenis-laporan').val() == '8') {
			$('#jenis-rawat-search').parent().parent().hide()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
			$('#jenis-penunjang').parent().parent().show()
		} else if ($('#jenis-laporan').val() == '9') {
			$('#jenis-rawat-search').find('option:last').remove().parent().parent().show()
			$('#jenis-kasus').parent().parent().show()
			$('#status_keluar').parent().parent().show()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
		} else if ($('#jenis-laporan').val() == '10') {
			$('#jenis-rawat-search').parent().parent().remove()
			$('#jenis-kasus').parent().parent().remove()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').show()
		} else if ($('#jenis-laporan').val() == '11') {
			$('#jenis-rawat-search').parent().parent().remove()
			$('#jenis-kasus').parent().parent().remove()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
			$('#asal-kunjungan-11-search').parent().parent().show()
			$('#status_keluar').parent().parent().show()
		} else if ($('#jenis-laporan').val() == '12') {
			$('#jenis-rawat-search').parent().parent().remove()
			$('#jenis-kasus').parent().parent().remove()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
			$('#asal-kunjungan-search').parent().parent().show()
			$('#status_keluar').parent().parent().show()
		} else if ($('#jenis-laporan').val() == '13') {
			$('#jenis-rawat-search').find('option:last').remove().parent().parent().show()
			$('#jenis-kasus').parent().parent().show()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
		} else if ($('#jenis-laporan').val() == '15') {
			$('#asal-kunjungan-search').parent().parent().show()
			$('#jenis-rawat-search').parent().parent().remove()
			$('#jenis-kasus').parent().parent().remove()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
		} else if ($('#jenis-laporan').val() == '16') {
			$('#jenis-rawat-search').parent().parent().remove()
			$('#jenis-kasus').parent().parent().remove()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
		}
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>')
		$('#tempat-layanan-1, #tempat-layanan-2, #penjamin-search, #kunjungan-search, #dokter-search-select').val('')
		$('#bulan').val('<?= date('m') ?>')
		$('.harian, #tanggal-harian').show()
		$('.bulanan, .rentang-waktu').hide()

		if ($('#jenis-laporan').val() == '14') {
			$('#tanggal-harian').parent().parent().hide()
			$('#periode-laporan').parent().parent().hide()
			$('#jenis-rawat-search').parent().parent().hide()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
			$('.periode-tahunan').attr('hidden', false)
		} else {
			$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>')
			$('#tempat-layanan-1, #tempat-layanan-2, #penjamin-search, #kunjungan-search, #dokter-search-select').val('')
			$('#periode-laporan').parent().parent().show()
			$('#bulan').val('<?= date('m') ?>')
			$('.harian, #tanggal-harian').show()
			$('.bulanan, .rentang-waktu').hide()
			$('.periode-tahunan').attr('hidden', true)
		}
		if ($('#jenis-laporan').val() == '17') {
			$('#periode-laporan').val('Bulanan')
			$('.bulanan, #bulan, #tahun').show()
			$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide()
			$('#jenis-rawat-search').parent().parent().hide()
			$('#status_keluar').parent().parent().show()
			$('#jenis-kasus').parent().parent().hide()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
		} else if ($('#jenis-laporan').val() == '18') {
			$('#periode-laporan').val('Bulanan')
			$('.bulanan, #bulan, #tahun').show()
			$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide()
			$('#jenis-rawat-search').parent().parent().hide()
			$('#status_keluar').parent().parent().show()
			$('#jenis-kasus').parent().parent().hide()
			$('#penjamin-search').parent().parent().hide()
			$('#kunjungan-search').parent().parent().hide()
			$('#tempat-layanan-1, .rajal').hide()
			$('#tempat-layanan-2, .ranap').hide()
			$('#tempat-layanan-3, .penunjang').hide()
		}
	}

	function getLaporanRM(page) {
		$('.lap-04, #table-data-04 tbody').hide()
		$('.lap-03, #table-data-03 tbody').hide()
		$('.lap-ranap, #table-data-ranap tbody').hide()
		$('.lap-05').hide()
		$('.lap-05 #tabs-lap05').hide()
		$('.lap-06, #tabs-lap06').hide()
		$('#dokter-search').hide()
		$('.lap-07, #tabs-lap07').hide()
		$('.lap-08').hide()
		$('.lap-08 #tabs-lap08').hide()
		$('.lap-rajal, #table-data tbody').hide()

		$('.ranap').hide()
		$('.lap-rajal, #table-data tbody').hide()
		$('.lap-ranap, #table-data-ranap tbody').hide()
		$('.lap-03, #table-data-03 tbody').hide()
		$('.lap-05').hide()
		$('.lap-04, #table-data-04 tbody').hide()
		$('.lap-06').hide()
		$('.lap-06, #table-data-06 tbody').hide()
		$('#dokter-search').hide()
		$('.lap-07').hide()
		$('.lap-07, #table-data-07 tbody').hide()
		$('.lap-08').hide()
		$('.lap-08, #table-data-08 tbody').hide()
		$('.lap-09').hide()
		$('.lap-09, #table-data-09 tbody').hide()
		$('.lap-10').hide()
		$('.lap-10, #table-data-09 tbody').hide()
		$('.lap-11').hide()
		$('.lap-11, #table-data-11 tbody').hide()
		$('.lap-12').hide()
		$('.lap-12, #table-data-12 tbody').hide()
		$('.lap-13').hide()
		$('.lap-13, #table-data-13 tbody').hide()
		$('.lap-14').hide()
		$('.lap-14, #table-data-14 tbody').hide()
		$('.lap-15').hide()
		$('.lap-15, #table-data-15 tbody').hide()
		$('.lap-16').hide()
		$('.lap-16, #table-data-16 tbody').hide()
		$('.lap-17').hide()
		$('.lap-17, #table-data-17 tbody').hide()
		$('.lap-18').hide()
		$('.lap-18, #table-data-18 tbody').hide()

		//Laporan 01
		if ($('#jenis-laporan').val() == '1') {
			$('#page-now').val(page)
			$('.lap-rajal, #table-data tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_01') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanRM(page - 1)
						return false
					}

					$('#jenis-periode').html('Periode : ' + data.periode)
					$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
					$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
					$('.lap-rajal, #table-data tbody').show()
					$('#table-data tbody').empty()

					$.each(data.data, function(i, v) {

						let periode = ''
						if ($('#periode-laporan').val() == 'Harian') {
							periode = 'Laporan Harian'
						}
						if ($('#periode-laporan').val() == 'Bulanan') {
							periode = 'Laporan Bulanan'
						}
						if ($('#periode-laporan').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu'
						}

						let html = /* html */ ``
						$.each(v.diagnosa_data, function(index, val) {
							if (index <= 0) {
								html += `<tr>
									<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
									<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
									<td class="center">${v.id_pasien}</td>
									<td>${v.nama_pasien}</td>
									<td class="center">${(v.penjamin !== null ? v.penjamin : 'Tunai')}</td>
									<td class="center">${(v.unit_pelayanan !== null ? v.unit_pelayanan : '-')}</td>
									<td>${val.icdx_diagnosa}</td>
									<td class="center">${val.prioritas !== null ? val.prioritas : '-'}</td>
									<td>${(v.nama_dokter !== null ? v.nama_dokter : '-')}</td>
									<td class="center">${val.diagnosa_akhir !== null ? val.diagnosa_akhir : '-'}</td>
									<td class="center">${val.kasus}</td>
									<td class="center">${v.status_kunjungan}</td>
									<td class="center">${v.kelamin}</td>
									<td class="center">${v.umur}</td>
									<td>${v.alamat}</td>
									<td class="center">${v.nama_kec}</td>
									<td class="center">${datetimefmysql(v.tgl_selesai)}</td>
								</tr>`
							} else {
								html += `<tr>
									<td colspan="6"> </td>
									<td>${val.icdx_diagnosa}</td>
									<td class="center">${val.prioritas !== null ? val.prioritas : '-'}</td>
									<td></td>
									<td class="center">${val.diagnosa_akhir !== null ? val.diagnosa_akhir : '-'}</td>
									<td class="center">${val.kasus}</td>
									<td colspan="5"> </td>
								</tr>`
							}
						})

						$('#table-data tbody').append(html)
					})
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		//Laporan 02
		else if ($('#jenis-laporan').val() == '2') {
			$('#page-now').val(page)
			$('.lap-ranap, #table-data-ranap tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_02') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanRM(page - 1)
						return false
					}

					$('#jenis-periode-ranap').html('Periode : ' + data.periode)
					$('#pagination-ranap').html(pagination(data.jumlah, data.limit, data.page, 1))
					$('#summary-ranap').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
					$('.lap-ranap, #table-data-ranap tbody').show()
					$('#table-data-ranap tbody').empty()

					$.each(data.data, function(i, v) {

						let periode = ''
						if ($('#periode-laporan').val() == 'Harian') {
							periode = 'Laporan Harian'
						}
						if ($('#periode-laporan').val() == 'Bulanan') {
							periode = 'Laporan Bulanan'
						}
						if ($('#periode-laporan').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu'
						}

						let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${v.id_pasien}</td>
							<td class="center">${v.kunjungan}</td>
							<td>${v.nama_pasien}</td>
							<td>${v.alamat}</td>
							<td class="center">${v.nama_kec}</td>
							<td class="center">${v.umur}</td>
							<td class="center">${v.kelamin}</td>
							<td class="center">${(v.penjamin !== null ? v.penjamin : 'Tunai')}</td>
							<td class="center">${(v.ruangan !== null ? v.ruangan : '-')}</td>
							<td class="center">${(v.kelas !== null ? v.kelas : '-')}</td>
							<td class="center">${v.asal_kunjungan}</td>
							<td>${(v.nama_dokter !== null ? v.nama_dokter : '-')}</td>
							<td class="center">${(v.jenis_igd !== null ? v.jenis_igd : '-')}</td>
						</tr>
					`

						$('#table-data-ranap tbody').append(html)
					})
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		//Laporan 03 
		else if ($('#jenis-laporan').val() == '3') {
			$('#page-now').val(page)
			$('.lap-03, #table-data-03 tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_03') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanRM(page - 1)
						return false
					}

					$('#jenis-periode-03').html('Periode : ' + data.periode)
					$('#pagination-03').html(pagination(data.jumlah, data.limit, data.page, 1))
					$('#summary-03').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
					$('.lap-03, #table-data-03 tbody').show()
					$('#table-data-03 tbody').empty()

					$.each(data.data, function(i, v) {

						let periode = ''
						if ($('#periode-laporan').val() == 'Harian') {
							periode = 'Laporan Harian'
						}
						if ($('#periode-laporan').val() == 'Bulanan') {
							periode = 'Laporan Bulanan'
						}
						if ($('#periode-laporan').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu'
						}

						let html = /* html */ ``
						$.each(v.diagnosa_data, function(index, val) {
							if (index <= 0) {
								html += `<tr>
											<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
											<td class="center">${v.id_pasien}</td>
											<td class="center">${v.kunjungan}</td>
											<td class="left">${v.nama_pasien}</td>
											<td class="left">${v.alamat}</td>
											<td class="center">${v.nama_kec}</td>
											<td class="center">${v.umur}</td>
											<td class="center">${v.kelamin}</td>
											<td class="center">${(v.penjamin !== null ? v.penjamin : 'Tunai')}</td>
											<td class="center">${(v.kelas !== null ? v.kelas : '-')}</td>
											<td class="center">${(v.ruangan !== null ? v.ruangan : '-')}</td>
											<td class="center">${datetimefmysql(v.tgl_mrs)}</td>
											<td class="center">${v.cara_keluar !== null ? v.cara_keluar : 'Belum Checkout'}</td>
											<td class="center">${v.is_pindah_ruang !== null ? v.is_pindah_ruang == '0' ? 'Tidak' : 'Ya' : '-'}</td>
											<td class="left">${(val.icdx_diagnosa !== null && val.icdx_diagnosa !== '' ? val.icdx_diagnosa : '-')}</td>
											<td class="left">${(v.nama_dokter !== null ? v.nama_dokter : '-')}</td>
										</tr>`
							} else {
								html += `<tr>
									<td colspan="14"> </td>
									<td>${(val.icdx_diagnosa !== null && val.icdx_diagnosa !== '' ? val.icdx_diagnosa : '-')}</td>
									<td> </td>
								</tr>`
							}
						})

						$('#table-data-03 tbody').append(html)
					})
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		//Laporan 04 
		else if ($('#jenis-laporan').val() == '4') {
			$('#page-now').val(page)
			$('.lap-04, #table-data-04 tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_04') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanRM(page - 1)
						return false
					}

					$('#jenis-periode-04').html('Periode : ' + data.periode)
					$('#pagination-04').html(pagination(data.jumlah, data.limit, data.page, 1))
					$('#summary-04').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
					$('.lap-04, #table-data-04 tbody').show()
					$('#table-data-04 tbody').empty()

					$.each(data.data, function(i, v) {

						let periode = ''
						if ($('#periode-laporan').val() == 'Harian') {
							periode = 'Laporan Harian'
						}
						if ($('#periode-laporan').val() == 'Bulanan') {
							periode = 'Laporan Bulanan'
						}
						if ($('#periode-laporan').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu'
						}

						let html = /* html */ ``
						$.each(v.diagnosa_data, function(index, val) {
							if (index <= 0) {
								html += `<tr>
											<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
											<td class="center">${v.id_pasien}</td>
											<td class="center">${v.kunjungan}</td>
											<td class="left">${v.nama}</td>
											<td class="left">${v.alamat}</td>
											<td class="center">${v.umur}</td>
											<td class="center">${v.kelamin}</td>
											<td class="left">${(val.icdx_diagnosa !== null && val.icdx_diagnosa !== '' ? val.icdx_diagnosa : '-')}</td>
											<td class="center">${datetimefmysql(v.tgl_mrs)}</td>
											<td class="center">${(v.penjamin !== null ? v.penjamin : 'Tunai')}</td>
											<td class="center">${(v.kelas !== null ? v.kelas : '-')}</td>
											<td class="center">${(v.asal_kunjungan !== null ? v.asal_kunjungan : '-')}</td>
											<td class="left">${(v.dokter_dpjp !== null ? v.dokter_dpjp : '-')}</td>
											<td class="center">${(v.bangsal !== null ? v.bangsal : '-')}</td>
										</tr>`
							} else {
								html += `<tr>
									<td colspan="7"> </td>
									<td>${(val.icdx_diagnosa !== null && val.icdx_diagnosa !== '' ? val.icdx_diagnosa : '-')}</td>
									<td colspan="6"> </td>
								</tr>`
							}
						})

						$('#table-data-04 tbody').append(html)
					})
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		//Laporan 05
		else if ($('#jenis-laporan').val() == '5') {
			$('#page-now').val(page)
			$('.lap-05').show()
			$('.lap-05 #tabs-lap05').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_05') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) && (data.data.length === 0)) {
						getLaporanRM(page - 1)
						return false
					}

					$('#jenis-periode-05').html('Periode : ' + data.periode)
					$('#pagination-05').html(pagination(data.jumlah, data.limit, data.page, 1))
					$('#summary-05').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
					$('#table-data-dvdp-05 tbody').empty()
					$('#table-data-lw-05 tbody').empty()

					$.each(data.data, function(i, v) {

						let html = /* html */ ``
						$.each(v.diagnosa_data, function(index, val) {
							if (index <= 0) {
								html += `<tr>
									<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
									<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
									<td class="center">${v.id_pasien}</td>
									<td>${v.nama_pasien}</td>
									<td class="center">${(v.penjamin !== null ? v.penjamin : 'Tunai')}</td>
									<td>${(val.icdx_diagnosa !== null && val.icdx_diagnosa !== '' ? val.icdx_diagnosa : '-')}</td>
									<td>${(v.nama_dokter !== null ? v.nama_dokter : '-')}</td>
									<td class="center">${v.kunjungan}</td>
									<td class="center">${v.kelamin}</td>
									<td class="center">${v.umur}</td>
									<td>${v.alamat}</td>
									<td class="center">${v.nama_kec}</td>
									<td class="center">${datetimefmysql(v.tgl_keluar)}</td>
								</tr>`
							} else {
								if (val.icdx_diagnosa !== null && val.icdx_diagnosa !== '') {
									html += `<tr>
										<td colspan="5"> </td>
										<td>${val.icdx_diagnosa}</td>
										<td colspan="7"> </td>
									</tr>`
								}
							}
						})

						$('#table-data-dvdp-05 tbody').append(html)
					})

					let html = ''
					let jumlDiareUnder5 = 0
					let jumlDiareUpper5 = 0
					let jumlDbd = 0
					let jumlCampakUnder5 = 0
					let jumlCampakUpper5 = 0
					let jumlPneunomiaUnder5 = 0
					let jumlPneunomiaUpper5 = 0
					let jumlGiziBuruk = 0
					let jumlTbPositif = 0
					$.each(data.laporan_wabah, function(i, v) {
						jumlDiareUnder5 += parseInt(v.diare_under_5)
						jumlDiareUpper5 += parseInt(v.diare_uper_5)
						jumlDbd += parseInt(v.dbd)
						jumlCampakUnder5 += parseInt(v.campak_under_5)
						jumlCampakUpper5 += parseInt(v.campak_upper_5)
						jumlPneunomiaUnder5 += parseInt(v.pneumonia_under_5)
						jumlPneunomiaUpper5 += parseInt(v.pneumonia_upper_5)
						jumlGiziBuruk += parseInt(v.gizi_buruk)
						jumlTbPositif += parseInt(v.tb_positif)
						html += `<tr>
							<td class="center">${i + 1}</td>
							<td class="left">${v.nama_kec}</td>
							<td class="center">${v.diare_under_5 != '0' ? v.diare_under_5 : ''}</td>
							<td class="center"></td>
							<td class="center">${v.diare_uper_5 != '0' ? v.diare_uper_5 : ''}</td>
							<td class="center"></td>
							<td class="center">${v.dbd != '0' ? v.dbd : ''}</td>
							<td class="center"></td>
							<td class="center">${v.campak_under_5 != '0' ? v.campak_under_5 : ''}</td>
							<td class="center"></td>
							<td class="center">${v.campak_upper_5 != '0' ? v.campak_upper_5 : ''}</td>
							<td class="center"></td>
							<td class="center">${v.pneumonia_under_5 != '0' ? v.pneumonia_under_5 : ''}</td>
							<td class="center"></td>
							<td class="center">${v.pneumonia_upper_5 != '0' ? v.pneumonia_upper_5 : ''}</td>
							<td class="center"></td>
							<td class="center">${v.gizi_buruk != '0' ? v.gizi_buruk : ''}</td>
							<td class="center"></td>
							<td class="center">${v.tb_positif != '0' ? v.tb_positif : ''}</td>
							<td class="center"></td>
							<td class="center">${parseInt(v.diare_under_5) + parseInt(v.diare_uper_5) + parseInt(v.dbd) + parseInt(v.campak_under_5) + parseInt(v.campak_upper_5) +
						parseInt(v.pneumonia_under_5) + parseInt(v.pneumonia_upper_5) + parseInt(v.gizi_buruk) + parseInt(v.tb_positif)}</td>
						</tr>`

					})

					html += `<tr>
								<td colspan="2" class="center">jumlah</td>
								<td class="center">${jumlDiareUnder5}</td>
								<td class="center">0</td>
								<td class="center">${jumlDiareUpper5}</td>
								<td class="center">0</td>
								<td class="center">${jumlDbd}</td>
								<td class="center">0</td>
								<td class="center">${jumlCampakUnder5}</td>
								<td class="center">0</td>
								<td class="center">${jumlCampakUpper5}</td>
								<td class="center">0</td>
								<td class="center">${jumlPneunomiaUnder5}</td>
								<td class="center">0</td>
								<td class="center">${jumlPneunomiaUpper5}</td>
								<td class="center">0</td>
								<td class="center">${jumlGiziBuruk}</td>
								<td class="center">0</td>
								<td class="center">${jumlTbPositif}</td>
								<td class="center">0</td>
								<td class="center">${jumlDiareUnder5 + jumlDiareUpper5 + jumlDbd + jumlCampakUnder5 + jumlCampakUpper5 + jumlPneunomiaUnder5 + jumlPneunomiaUpper5 + jumlGiziBuruk +
					jumlTbPositif}</td>
							</tr>`
					$('#table-data-lw-05 tbody').append(html)
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		//Laporan 06
		else if ($('#jenis-laporan').val() == '6') {
			$('#page-now').val(page)
			$('.lap-06, #tabs-lap06').show()
			$('#dokter-search').show()

			const tabActive = $('#tabs-lap06 .nav-item .active').attr('aria-controls')

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_06') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) && (data.per_dokter.data.length === 0)) {
						getLaporanRM(page - 1)
						return false
					}

					const jenisLayanan = ['Rawat Jalan', 'Rawat Inap', 'Intensive Care', 'IGD', 'Laboratorium', 'Radiologi', 'Medical Check Up', 'Hemodialisa', 'Pemulasaran Jenazah']
					const isLastPage = (data.per_dokter.jumlah - (data.page * data.limit)) < 0 ? true : false

					$('#jenis-periode-06').html('Periode : ' + data.periode)
					$('#pagination-06-dokter').html(pagination(data.per_dokter.jumlah, data.limit, data.page, 1))
					$('#summary-06-dokter').html(page_summary(data.per_dokter.jumlah, data.per_dokter.data.length, data.limit, data.page))

					$('.lap-06, #table-data-06 tbody').show()
					$('#table-data-up-06 tbody').empty()
					$('#table-data-pd-06 tbody').empty()
					$('#table-data-wilayah-06 tbody').empty()
					$('.lap-06-head-month').html(data.periode)

					const jenisUnit1 = $('#tempat-layanan-1').val() === '' ? 'Semua' : $('#tempat-layanan-1').val()
					const jenisUnit2 = $('#tempat-layanan-2').val() === '' ? 'Semua' : $('#tempat-layanan-2').val()
					const jenisUnit3 = $('#tempat-layanan-3').val() === '' ? 'Semua' : $('#tempat-layanan-3').val()

					let jenisUnit = ''
					if (jenisUnit1 === 'Semua' && jenisUnit2 === 'Semua' && jenisUnit3 === 'Semua') {
						jenisUnit = jenisUnit1
					} else if (jenisUnit1 === 'Semua' && jenisUnit2 !== 'Semua' && jenisUnit3 === 'Semua') {
						jenisUnit = jenisUnit2
					} else if (jenisUnit1 !== 'Semua' && jenisUnit2 === 'Semua' && jenisUnit3 === 'Semua') {
						jenisUnit = jenisUnit1
					} else if (jenisUnit1 === 'Semua' && jenisUnit2 === 'Semua' && jenisUnit3 !== 'Semua') {
						jenisUnit = jenisUnit3
					} else if (jenisUnit1 !== 'Semua' && jenisUnit2 !== 'Semua' && jenisUnit3 !== 'Semua') {
						jenisUnit = jenisUnit1
					} else {
						jenisUnit = '-'
					}

					$('#unit-penjamin').html(jenisUnit)

					let html1 = ''
					let totalPenjaminan = 0
					$.each(data.per_unit_pelayanan.data, function(i, v) {
						totalPenjaminan += parseInt(v.total_penjamin)
						if (v.penjamin !== null) {
							html1 += `<tr>
									<td class="center">${i + 1}</td>
									<td class="left">${v.penjamin}</td>
									<td class="center">${v.total_penjamin}</td>
								</tr>`
						}
					})

					html1 += `<tr>
							<td colspan="2" class="right"><i><b>JUMLAH</b></i></td>
							<td class="center"><b>${totalPenjaminan}</b></td>
						</tr>`
					$('#table-data-up-06 tbody').append(html1)

					let html2 = ''
					let iterate = 0

					let total = {
						bpjs: 0,
						bpjs_ketenagakerjaan: 0,
						umum: 0,
						jaminan_covid_kemenkes: 0,
						jpkmkt: 0,
						jasa_raharja: 0,
						taspen: 0,
						dp3ap2kb: 0,
						global_fund: 0,
						keluarga_karyawan: 0,
						gratis: 0,
						crm: 0,
						penunggu_pasien: 0,
						jamkesmas: 0,
						rbs: 0,
						jkr: 0
					};

					$.each(data.per_dokter.data, (i, v) => {
						html2 += `
						<tr>
							<td class="center">${((iterate + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="left" colspan="10"> <b>${v.nama}</b></td>
						</tr>`;

						$.each(JSON.parse(v.data_dokter), function(index, val) {
							Object.keys(total).forEach(key => total[key] += parseInt(val[key]));

							let rowSum = Object.keys(total).reduce((sum, key) => sum + parseInt(val[key]), 0);

							html2 += `
							<tr>
								<td></td>
								<td class="left">${val.nama_dokter}</td>
								${Object.keys(total).map(key => `<td class="center">${val[key]}</td>`).join('')}
								<td class="center"><b>${rowSum}</b></td>
							</tr>`;

						})

						let totalSum = Object.values(total).reduce((sum, value) => sum + parseInt(value), 0);

						html2 += `
						<tr>
							<td></td>
							<td class="right"><b>TOTAL</b></td>
							${Object.values(total).map(value => `<td class="center"><b>${value}</b></td>`).join('')}
							<td class="center"><b>${totalSum}</b></td>
						</tr>`;

						Object.keys(total).forEach(key => total[key] = 0); // Reset total values
						iterate++;
					});

					let totalSemuaPenjamin = Object.values(data.per_dokter_total).reduce((sum, value) => sum + parseInt(value), 0)

					if (isLastPage) {
						html2 += /*html*/ `
							<tr>
								<td></td>
								<td class="right"><b><i>TOTAL SEMUA PENJAMIN</i></b></td>
								${Object.values(data.per_dokter_total).map(value => `<td class="center"><b>${value}</b></td>`).join('')}
								<td class="center"><b>${totalSemuaPenjamin}</b></td>
							</tr>
						`;
					}

					$('#table-data-pd-06 tbody').append(html2)

					let html3 = ''
					let totalWilayah = 0
					$.each(data.per_wilayah.data, function(i, v) {
						if (typeof v.nama_kec !== 'undefined') {
							totalWilayah += parseInt(v.total_wilayah)
							html3 += `<tr>
										<td class="center">${parseInt(i) + 1}</td>
										<td class="left">${v.nama_kec}</td>
										<td class="center">${v.total_wilayah}</td>
									</tr>`
						} else {
							totalWilayah += parseInt(v.total_wilayah)
							html3 += `<tr>
										<td class="center">${parseInt(i) + 1}</td>
										<td class="left"><b>Luar Kota Tangerang</b></td>
										<td class="center">${v.total_wilayah}</td>
									</tr>`
						}
					})

					html3 += `<tr>
								<td colspan="2" class="right"><i><b>JUMLAH</b></i></td>
								<td class="center"><b>${totalWilayah}</b></td>
							</tr>`

					$('#table-data-wilayah-06 tbody').append(html3)
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		//Laporan 07
		else if ($('#jenis-laporan').val() == '7') {
			$('#page-now').val(page)
			$('.lap-07, #tabs-lap07').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_07') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) && (data.dokter.data.length === 0)) {
						getLaporanRM(page - 1)
						return false
					}

					$('#jenis-periode-07').html('Periode : ' + data.periode)
					$('#pagination-07').html(pagination(data.dokter.jumlah, data.limit, data.page, 1))
					$('#summary-07').html(page_summary(data.dokter.jumlah, data.dokter.data.length, data.limit, data.page))
					$('.lap-07, #table-data-07 tbody').show()
					$('#table-data-spesialistik-07 tbody').empty()
					$('#table-data-pd-07 tbody').empty()
					$('.lap-07-head-month').html(data.periode)

					let html1 = ''
					let totalSpesialisasi = 0
					$.each(data.spesialisasi.data, function(i, v) {
						totalSpesialisasi += parseInt(v.total_spesialisasi)
						html1 += `<tr>
								<td class="center">${i + 1}</td>
								<td class="left">${v.spesialisasi}</td>
								<td class="center">${v.total_spesialisasi}</td>
							</tr>`
					})

					html1 += `<tr>
							<td colspan="2" class="right"><i><b>JUMLAH</b></i></td>
							<td class="center"><b>${totalSpesialisasi}</b></td>
						</tr>`
					$('#table-data-spesialistik-07 tbody').append(html1)

					let html2 = ''
					let iterate = 0

					$.each(data.dokter.data, function(i, v) {
						html2 += `<tr>
									<td class="center">${((iterate + 1) + ((data.page - 1) * data.limit))}</td>
									<td class="left" colspan="2"> <b>${v.nama}</b></td>
								</tr>`
						let totalPasien = 0
						$.each(JSON.parse(v.data_dokter), function(index, val) {
							if (val.penjamin !== null) {
								totalPasien += parseInt(val.total_pasien)

								html2 += `<tr>
									<td></td>
									<td class="left">${val.nama_dokter}</td>
									<td class="center">${val.total_pasien}</td>
								</tr>`
							}
						})

						html2 += `<tr>
							<td></td>
							<td class="right"><b>TOTAL</b></td>
							<td class="center"><b>${totalPasien}</b></td>
							<td></td>
						</tr>`
						iterate++
					})

					$('#table-data-pd-07 tbody').append(html2)

				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 08
		else if ($('#jenis-laporan').val() == '8') {
			$('#page-now').val(page)
			$('.lap-08, #tabs-lap08').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_08') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data.radiologi) {
						laporanPenunjangRadiologi(data.radiologi)
					}
					if (data.farmasi) {
						laporanPenunjangFarmasi(data.farmasi)
					}
					if (data.laboratorium) {
						laporanPenunjangLaboratorium(data.laboratorium)
					}
					if (data.rehab) {
						laporanPenunjangRehab(data.rehab)
					}
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 09
		else if ($('#jenis-laporan').val() == '9') {
			$('#page-now').val(page)
			$('.lap-09, #tabs-lap09').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_09') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					$('.lap-09, #table-data-09 tbody').show()
					$('#table-data-09 tbody').empty()

					$.each(data.data, function(i, v) {
						const html = `
							<tr>
								<td class="center">${i + 1}</td>
								<td class="center">${v.kode_icd}</td>
								<td>${v.diagnosa}</td>
								<td class="center">${v.total}</td>
							</tr>
						`;
						$('#table-data-09 tbody').append(html)
					})
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 10
		else if ($('#jenis-laporan').val() == '10') {
			$('#page-now').val(page)
			$('.lap-10, #tabs-lap10').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_10') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					$('.lap-10, #table-data-10 tbody').show()
					$('#table-data-10 tbody').empty()

					$.each(data.data, function(i, v) {
						const html = `
							<tr>
								<td class="center">${i + 1}</td>
								<td class="center">${v.nama}</td>
								<td style="text-align: center">${v.jumlah || '-'}</td>
							</tr>
						`;
						$('#table-data-10 tbody').append(html)
					})

					$('.lap-10-head-month').html(data.periode)
					$('#jenis-periode-10').html(`Penunjang: <b>${data.penunjang}</b>`)
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 11
		else if ($('#jenis-laporan').val() == '11') {
			$('#page-now').val(page)
			$('.lap-11, #tabs-lap11').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_11') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					$('#pagination-11').html(pagination(data.jumlah, data.limit, data.page, 1))
					$('#summary-11').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
					$('.lap-11, #table-data-11 tbody').show()
					$('#table-data-11 tbody').empty()


					$.each(data.data, function(i, v) {
						let jenis_rawat = ''
						if (v.jenis_rawat !== 'IGD') {
							jenis_rawat = v.jenis_rawat + ' (' + v.unit_poli + ')';
						} else {
							jenis_rawat = v.jenis_rawat;
						}

						let keteranganRujukan = "-";
						if (v.tujuan_rujukan !== '' && v.tujuan_rujukan !== null) {
							keteranganRujukan = v.tujuan_rujukan + (v.ket_rujukan !== '' && v.ket_rujukan !== null ? ' ( ' + v.ket_rujukan + ' )' : '');
						}
						
						let unit_poli  = '';
						if (v.shift_poli !== null && v.shift_poli !== '') {
							unit_poli = '<b>' + v.shift_poli + '</b> - ' + v.unit_poli ;
						} else {
							unit_poli = v.unit_poli;
						}
						
						const html = `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '-')}</td>							
								<td class="center">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '-')}</td>
								<td class="center">${v.no_rm}</td>
								<td class="left">${v.nama}</td>
								<td class="center">${v.kelamin}</td>
								<td class="center">${hitungUmur(v.tanggal_lahir)}</td>
								<td class="center">${v.status_kunjungan}</td>
								<td class="left">${v.alamat}</td>
								<td class="center">${v.nama_kec}</td>
								<td class="left">${unit_poli}</td>
								<td class="left">${v.diagnosa !== "" ? v.diagnosa : '-'}</td>
								<td class="left">${v.nama_coder !== "" ? v.nama_coder : '-'}</td>
								<td class="left">${v.dokter_dpjp}</td>
								<td class="center">${v.penjamin}</td>
								<td class="center">${v.status_keluar}</td>
								<td class="left">${v.tujuan_rujukan !== "" ? v.tujuan_rujukan : '-'}</td>
								<td class="left">${v.ket_rujukan !== "" ? v.ket_rujukan : '-'}</td>
							<tr>
						`;
						$('#table-data-11 tbody').append(html)
					})

					$('.lap-11-head-month').html(data.periode)
					$('#jenis-periode-11').html(`Periode: <b> ${data.periode}</b><br>Status Keluar: <b> ${data.status_keluar}</b>`)
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 12
		else if ($('#jenis-laporan').val() == '12') {
			$('#page-now').val(page)
			$('.lap-12, #tabs-lap12').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_12') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					$('#pagination-12').html(pagination(data.jumlah, data.limit, data.page, 1))
					$('#summary-12').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
					$('.lap-12, #table-data-12 tbody').show()
					$('#table-data-12 tbody').empty()


					$.each(data.data, function(i, v) {
						let jenis_rawat = ''
						if (v.jenis_rawat !== 'IGD') {
							jenis_rawat = v.jenis_rawat + ' (' + v.unit_poli + ')';
						} else {
							jenis_rawat = v.jenis_rawat;
						}

						const html = `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.tanggal_daftar}</td>
								<td class="center">${v.no_rm}</td>
								<td class="left">${v.nama}</td>
								<td class="left">${v.unit_poli}</td>
								<td class="center">${v.kode_icdx !== null ? v.kode_icdx : '-'}</td>
								<td class="left">${v.dokter_dpjp}</td>
								<td class="left">${v.diagnosa !== "" ? v.diagnosa : '-'}</td>
								<td class="center">${v.jenis_kasus !== null ? v.jenis_kasus : '-'}</td>
								<td class="center">${v.status_kunjungan}</td>
								<td class="center">${v.kelamin}</td>
								<td class="center">${hitungUmur(v.tanggal_lahir)}</td>
								<td class="center">${v.penjamin !== null ? v.penjamin : '-'}</td>
								<td class="left">${v.alamat}</td>
								<td class="center">${v.nama_kec}</td>
								<td class="center">${v.tanggal_keluar}</td>
								<td class="center">${v.status_keluar !== null ? v.status_keluar : '-'}</td>
							<tr>
						`;
						$('#table-data-12 tbody').append(html)
					})

					$('.lap-12-head-month').html(data.periode)
					$('#jenis-periode-12').html(`Periode: <b> ${data.periode}</b><br>Status Keluar: <b> ${data.status_keluar}</b>`)
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 13
		else if ($('#jenis-laporan').val() == '13') {
			$('#page-now').val(page)
			$('.lap-13, #tabs-lap13').show()
			$('#label-lap-13').empty()
			let total_kasus = 0;
			let total_meninggal = 0;
			let total_lab = 0;
			let totalSemua_kasus = 0;
			let totalSemua_meninggal = 0;
			let totalSemua_lab = 0;
			let html = '';
			let expandDiagnosa = false;

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_13') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					$('.lap-13, #table-data-13 tbody').show()
					$('#table-data-13 tbody').empty()

					$.each(data.data, function(i, v) {
						totalSemua_kasus += parseInt(v.total_kasus)
						totalSemua_meninggal += parseInt(v.total_meninggal)
						totalSemua_lab += parseInt(v.total_lab)

						$(document).ready(function() {
							$('#btn-expand-form-all' + v.kode_skdr).click(function() {
								const isExpanded = $(this).attr('aria-expanded') === 'true';
								$('#expand-icon' + v.kode_skdr).toggleClass('active', isExpanded);
								$(this).html(`<i class="fas fa-fw ${isExpanded ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded ? 'Expand All' : 'Collapse All'}`);
								$(this).toggleClass('btn-danger', !isExpanded);
								$(this).toggleClass('btn-info', isExpanded);
								history.replaceState({}, document.title, window.location.pathname);
							});
						});

						let btnExpand = '<a type="button" data-toggle="collapse" href="#show' + v.kode_skdr + '" class="btn btn-info btn-xs" aria-expanded="false" id="btn-expand-form-all' + v.kode_skdr + '"><i id="expand-icon' + v.kode_skdr + '" class="fas fa-fw fa-expand mr-1"></i>Expand All </a>';
						html += `<tr>
								<td style="text-align: center"><b>${i + 1}</b></td>
								<td style="text-align: center"><b>${v.kode_skdr}</b></td>
								<td style="text-align: left"><b>${v.nama_skdr}</b></td>
								<td style="text-align: center"><b>${v.total_kasus}</b></td>
								<td style="text-align: center"><b>${v.total_meninggal}</b></td>
								<td style="text-align: center"><b>${v.total_lab}</b></td>
								<td class="wrapper right">
									${v.diagnosa.length >= 1 ? btnExpand : ''}
								</td>
							</tr>
							<tr id="show${v.kode_skdr}" class="collapse">
								<td style="background-color: white;" class="center"></td>
								<td style="background-color: #f9e897; font-weight: bold;" class="center">ICDX</td>
								<td style="background-color: #f9e897; font-weight: bold;" class="center">DIAGNOSA</td>
								<td style="background-color: #f9e897; font-weight: bold;" class="center">JUMLAH KASUS</td>
								<td style="background-color: #f9e897; font-weight: bold;" class="center">JUMLAH KEMATIAN</td>
								<td style="background-color: #f9e897; font-weight: bold;" class="center">JUMLAH LAB</td>
								<td style="background-color: #f9e897; font-weight: bold;" class="center"></td>
							</tr>
						`;

						$.each(v.diagnosa, function(key, val) {
							$(document).ready(function() {
								$('#btn-expand-form-all2' + val.icdx_trim).click(function() {
									const isExpanded2 = $(this).attr('aria-expanded') === 'true';
									$('#expand-icon2' + val.icdx_trim).toggleClass('active', isExpanded2);
									$(this).html(`<i class="fas fa-fw ${isExpanded2 ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded2 ? 'Expand All' : 'Collapse All'}`);
									$(this).toggleClass('btn-danger', !isExpanded2);
									$(this).toggleClass('btn-info', isExpanded2);
									history.replaceState({}, document.title, window.location.pathname);
								});
							});

							let btnExpand2 = '<a type="button" data-toggle="collapse" href="#show2' + val.icdx_trim + '" class="btn btn-info btn-xs" aria-expanded="false" id="btn-expand-form-all2' + val.icdx_trim + '"><i id="expand-icon2' + val.icdx_trim + '" class="fas fa-fw fa-expand mr-1"></i>Expand All </a>';
							html += `
								${'<tr id="show' + v.kode_skdr + '" class="collapse">'}
									<td style="background-color: white;" class="center">${v.kode_skdr} - (${key+1})</td>
									<td style="background-color: #fdf5d0;" class="center">${val.kode_icdx_rinci}</td>
									<td style="background-color: #fdf5d0;" class="left">${val.diagnosa}</td>
									<td style="background-color: #fdf5d0;" class="center">${val.total_kasus}</td>
									<td style="background-color: #fdf5d0;" class="center">${val.total_meninggal}</td>
									<td style="background-color: #fdf5d0;" class="center">${val.total_lab}</td>
									<td style="background-color: #fdf5d0;" class="wrapper left">
										${val.pasien.length >= 1 ? btnExpand2 : ''}
									</td>
								</tr>
								<tr id="show2${val.icdx_trim}" class="collapse">
									<td style="background-color: white;" class="center"></td>
									<td style="background-color: white;" class="center"></td>
									<td style="background-color: #ffafb6; font-weight: bold;" class="center">PASIEN</td>
									<td style="background-color: #ffafb6; font-weight: bold;" class="center">TGL DAFTAR</td>
									<td style="background-color: #ffafb6; font-weight: bold;" class="center">MENINGGAL</td>	
									<td style="background-color: #ffafb6; font-weight: bold;" class="center">LAB</td>
									<td style="background-color: #ffafb6; font-weight: bold;" class="left">JENIS LAYANAN</td>
								</tr>`;

							$.each(val.pasien, function(key2, val2) {
								jenis_layanan = '';
								if (val2.jenis_layanan == 'Rawat Inap') {
									jenis_layanan = val2.jenis_layanan + ' (' + val2.bangsal + ')'
								} else if (val2.jenis_layanan == 'Poliklinik') {
									jenis_layanan = val2.jenis_layanan + ' (' + val2.spesialisasi + ')'
								} else {
									jenis_layanan = val2.jenis_layanan
								}

								html += `
									${'<tr id="show2' + val.icdx_trim + '" class="collapse">'}
										<td style="background-color: white;" class="center"></td>
										<td style="background-color: white;" class="center">${val.kode_icdx_rinci} - (${key2+1})</td>
										<td style="background-color: #f5dbdd;" class="left">${val2.id_pasien} ${val2.nama_pasien}</td>
										<td style="background-color: #f5dbdd;" class="center">${((val2.tanggal_daftar !== null) ? datetimefmysql(val2.tanggal_daftar) : '')}</td>
										<td style="background-color: #f5dbdd;" class="center">${val2.kondisi_keluar}</td>
										<td style="background-color: #f5dbdd;" class="center">${val2.order_lab}</td>
										<td style="background-color: #f5dbdd;" class="left">${jenis_layanan} </td>
									</tr>`;
							});
						});
					})

					html += `<tr>
								<td style="background-color: #9cc8ff; text-align: right" colspan="3"><b>TOTAL</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${totalSemua_kasus}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${totalSemua_meninggal}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${totalSemua_lab}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"></td>
							</tr>`
					$('#table-data-13 tbody').append(html)

					$('.lap-13-head-month').html(data.periode)

					let periode = data.periode != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
					let jenis_rawat = data.jenis_rawat != '' ? `<p><b>Jenis Rawat &emsp;:</b> ${data.jenis_rawat}</p>` : '';
					let jenis_kasus = data.jenis_kasus != '' ? `<p><b>Jenis Kasus &emsp;:</b> ${data.jenis_kasus}</p>` : '';
					label_lap_13 = periode + jenis_rawat + jenis_kasus;
					$('#label-lap-13').append(label_lap_13);
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 14
		else if ($('#jenis-laporan').val() == '14') {
			$('#page-now').val(page)
			$('.lap-14, #tabs-lap14').show()
			$('#label-lap-14').empty()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_14') ?>/page/' + page,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {

					let get_message = `Data Halaman ${data.page}, berhasil disimpan!`;
					// messageCustom(get_message, 'Success');

					$('.lap-14, #table-data-14 tbody').show()
					$('#table-data-14 tbody').empty()

					// $('#pagination-14').html(paginationCustom(data.jumlah, data.limit, data.page, 1))
					// $('#summary-14').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))


					$.each(data.data, function(i, v) {

						html = `<tr>
								<td style="text-align: right"><b>${v.bulan}</b></td>
								<td style="text-align: right"><b>${v.pbi}</b></td>
								<td style="text-align: right"><b>${v.non_pbi}</b></td>
								<td style="text-align: right"><b>${v.kosong}</b></td>
								<td style="text-align: right"><b>${v.total}</b></td>
							</tr>
						`;


						$('#table-data-14 tbody').append(html)
					})

					$('.lap-14-head-month').html(data.periode)

					let periode = data.periode != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
					label_lap_13 = periode;
					$('#label-lap-14').append(label_lap_13);
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')

					// // Cari elemen dan simulasikan klik
					// let btnPaggingAutomatic = $('#btn-pagging-automatic');
					// if (btnPaggingAutomatic.length) {
					// 	btnPaggingAutomatic.click();
					// } else {
					// 	console.error('Button with ID btn-pagging-automatic not found!');
					// }
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 15
		else if ($('#jenis-laporan').val() == '15') {

			if ($('#asal-kunjungan-search').val() === '' || $('#asal-kunjungan-search').val() === null) {
				syams_validation('#asal-kunjungan-search', 'Asal Kunjungan Harus dipilih !')
				return false;
			} else {
				syams_validation_remove('.form-control');
			}


			$('#page-now').val(page)
			$('.lap-15, #tabs-lap15').show()
			$('#label-lap-15').empty()
			let total_kotang_l = 0;
			let total_kotang_p = 0;
			let total_lukotang_l = 0;
			let total_lukotang_p = 0;
			let total_tdk_diketahui_l = 0;
			let total_tdk_diketahui_p = 0;
			let totalSemua = 0;
			let html = '';

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_15') ?>/page/' + page,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {

					let get_message = `Data Halaman ${data.page}, berhasil disimpan!`;
					// messageCustom(get_message, 'Success');

					$('.lap-15, #table-data-15 tbody').show()
					$('#table-data-15 tbody').empty()

					// $('#pagination-15').html(paginationCustom(data.jumlah, data.limit, data.page, 1))
					// $('#summary-15').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))


					$.each(data.data, function(i, v) {
						total_kotang_l += parseInt(v.detail.kotang_l);
						total_kotang_p += parseInt(v.detail.kotang_p);
						total_lukotang_l += parseInt(v.detail.lukotang_l);
						total_lukotang_p += parseInt(v.detail.lukotang_p);
						total_tdk_diketahui_l += parseInt(v.detail.total_tdk_diketahui_l);
						total_tdk_diketahui_p += parseInt(v.detail.total_tdk_diketahui_p);
						totalSemua += parseInt(v.detail.total);
						let grayIfZero = (val) => parseInt(val) === 0 ? 'color: grey;' : '';

						html += `<tr>
							<td style="text-align: center;">${i + 1}</td>
							<td style="text-align: left;">${v.nama}</td>
							<td style="text-align: center; ${grayIfZero(v.detail.kotang_l)}">${v.detail.kotang_l}</td>
							<td style="text-align: center; ${grayIfZero(v.detail.kotang_p)}">${v.detail.kotang_p}</td>
							<td style="text-align: center; ${grayIfZero(v.detail.lukotang_l)}">${v.detail.lukotang_l}</td>
							<td style="text-align: center; ${grayIfZero(v.detail.lukotang_p)}">${v.detail.lukotang_p}</td>
							<td style="text-align: center; ${grayIfZero(v.detail.total_tdk_diketahui_l)}">${v.detail.total_tdk_diketahui_l}</td>
							<td style="text-align: center; ${grayIfZero(v.detail.total_tdk_diketahui_p)}">${v.detail.total_tdk_diketahui_p}</td>
							<td style="text-align: center; ${grayIfZero(v.detail.total)}"><b>${v.detail.total}</b></td>
						</tr>`;
					})

					html += `<tr>
								<td style="background-color: #9cc8ff; text-align: right" colspan="2"><b>TOTAL</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_kotang_l}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_kotang_p}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_lukotang_l}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_lukotang_p}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_tdk_diketahui_l}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_tdk_diketahui_p}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${totalSemua}</b></td>
							</tr>`

					$('#table-data-15 tbody').append(html)


					$('.lap-15-head-month').html(data.periode)

					let periode = data.periode != '' ? `<p><b>Periode &emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
					let asal_kunjungan = data.asal_kunjungan != '' ? `<p><b>Asal Kunjungan &emsp;:</b> ${data.asal_kunjungan}</p>` : '';
					label_lap_15 = periode + asal_kunjungan;
					$('#label-lap-15').append(label_lap_15);
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 16
		else if ($('#jenis-laporan').val() == '16') {

			$('#page-now').val(page)
			$('.lap-16, #tabs-lap16').show()
			$('#label-lap-16').empty()
			let total_ranap_pasien_keluar = 0;
			let total_ranap_total_hari = 0;
			let total_rajal_total = 0;
			let total_rajal_igd = 0;
			let total_rajal_poli = 0;
			let total_rajal_lab = 0;
			let total_rajal_rad = 0;
			let total_rajal_hd = 0;
			let html = '';

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_16') ?>/page/' + page,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {

					let get_message = `Data Halaman ${data.page}, berhasil disimpan!`;

					$('.lap-16, #table-data-16 tbody').show()
					$('#table-data-16 tbody').empty()

					let no = 1;
					let jenis_penjamin = '';
					$.each(data.data, function(i, v) {
						html += `
								<tr>
									<td class="center" style="background-color: #d7e9ff"><b>${no++}</b></td>
									<td class="left" colspan="9" style="text-transform: uppercase; background-color: #d7e9ff"><b>${v.jenis_penjamin}<b></td>
								</tr>
							`;

						let subno = 1;
						$.each(v.detail, function(j, d) {
							total_ranap_pasien_keluar += parseInt(d.ranap.pasien_keluar);
							total_ranap_total_hari += parseInt(d.ranap.total_hari);
							total_rajal_total += parseInt(d.rajal.total);
							total_rajal_igd += parseInt(d.rajal.igd);
							total_rajal_poli += parseInt(d.rajal.poli);
							total_rajal_lab += parseInt(d.rajal.lab);
							total_rajal_rad += parseInt(d.rajal.rad);
							total_rajal_hd += parseInt(d.rajal.hd);
							let grayIfZero = (val) => parseInt(val) === 0 ? 'color: grey;' : '';

							html += `
									<tr>
										<td class="center">${no-1}.${subno++}</td>
										<td class="left">${d.penjamin}</td>										
										<td style="text-align: center; ${grayIfZero(d.ranap.pasien_keluar)}">${d.ranap.pasien_keluar}</td>
										<td style="text-align: center; ${grayIfZero(d.ranap.total_hari)}">${d.ranap.total_hari}</td>
										<td style="text-align: center; ${grayIfZero(d.rajal.total)}">${d.rajal.total}</td>
										<td style="text-align: center; ${grayIfZero(d.rajal.igd)}">${d.rajal.igd}</td>
										<td style="text-align: center; ${grayIfZero(d.rajal.poli)}">${d.rajal.poli}</td>
										<td style="text-align: center; ${grayIfZero(d.rajal.lab)}">${d.rajal.lab}</td>
										<td style="text-align: center; ${grayIfZero(d.rajal.rad)}">${d.rajal.rad}</td>
										<td style="text-align: center; ${grayIfZero(d.rajal.hd)}">${d.rajal.hd}</td>
									</tr>
								`;
						})
					})

					html += `<tr>
								<td style="background-color: #9cc8ff; text-align: right" colspan="2"><b>TOTAL</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_ranap_pasien_keluar}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_ranap_total_hari}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_rajal_total}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_rajal_igd}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_rajal_poli}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_rajal_lab}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_rajal_rad}</b></td>
								<td style="background-color: #9cc8ff; text-align: center"><b>${total_rajal_hd}</b></td>								
							</tr>`

					$('#table-data-16 tbody').append(html)

					$('.lap-16-head-month').html(data.periode)

					let periode = data.periode != '' ? `<p><b>Periode &emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
					label_lap_16 = periode;
					$('#label-lap-16').append(label_lap_16);
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 17
		else if ($('#jenis-laporan').val() == '17') {
			$('#page-now').val(page)
			$('.lap-17, #tabs-lap17').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_17') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					$('.lap-17, #table-data-17 tbody').show()
					$('#table-data-17 tbody').empty()

					$.each(data.data, function(i, v) {
						const html = `
							<tr>
								<td class="center">${i + 1}</td>
								<td class="center">${v.kode_icd}</td>
								<td>${v.diagnosa}</td>
								<td class="center">${v.l_jam_1}</td>
								<td class="center">${v.p_jam_1}</td>
								<td class="center">${v.l_jam_1_23}</td>
								<td class="center">${v.p_jam_1_23}</td>
								<td class="center">${v.l_hari_1_7}</td>
								<td class="center">${v.p_hari_1_7}</td>
								<td class="center">${v.l_hari_8_28}</td>
								<td class="center">${v.p_hari_8_28}</td>
								<td class="center">${v.l_hari_29_bln_3}</td>
								<td class="center">${v.p_hari_29_bln_3}</td>
								<td class="center">${v.l_bln_3_6}</td>
								<td class="center">${v.p_bln_3_6}</td>
								<td class="center">${v.l_bln_6_11}</td>
								<td class="center">${v.p_bln_6_11}</td>
								<td class="center">${v.l_thn_1_4}</td>
								<td class="center">${v.p_thn_1_4}</td>
								<td class="center">${v.l_thn_5_9}</td>
								<td class="center">${v.p_thn_5_9}</td>
								<td class="center">${v.l_thn_10_14}</td>
								<td class="center">${v.p_thn_10_14}</td>
								<td class="center">${v.l_thn_15_19}</td>
								<td class="center">${v.p_thn_15_19}</td>
								<td class="center">${v.l_thn_20_24}</td>
								<td class="center">${v.p_thn_20_24}</td>
								<td class="center">${v.l_thn_25_29}</td>
								<td class="center">${v.p_thn_25_29}</td>
								<td class="center">${v.l_thn_30_34}</td>
								<td class="center">${v.p_thn_30_34}</td>
								<td class="center">${v.l_thn_35_39}</td>
								<td class="center">${v.p_thn_35_39}</td>
								<td class="center">${v.l_thn_40_44}</td>
								<td class="center">${v.p_thn_40_44}</td>
								<td class="center">${v.l_thn_45_49}</td>
								<td class="center">${v.p_thn_45_49}</td>
								<td class="center">${v.l_thn_50_54}</td>
								<td class="center">${v.p_thn_50_54}</td>
								<td class="center">${v.l_thn_55_59}</td>
								<td class="center">${v.p_thn_55_59}</td>
								<td class="center">${v.l_thn_60_64}</td>
								<td class="center">${v.p_thn_60_64}</td>
								<td class="center">${v.l_thn_65_69}</td>
								<td class="center">${v.p_thn_65_69}</td>
								<td class="center">${v.l_thn_70_74}</td>
								<td class="center">${v.p_thn_70_74}</td>
								<td class="center">${v.l_thn_75_79}</td>
								<td class="center">${v.p_thn_75_79}</td>
								<td class="center">${v.l_thn_80_84}</td>
								<td class="center">${v.p_thn_80_84}</td>
								<td class="center">${v.l_thn_85_plus}</td>
								<td class="center">${v.p_thn_85_plus}</td>
								<td class="center">${v.total_l_hidup}</td>
								<td class="center">${v.total_p_hidup}</td>
								<td class="center">${(Number(v.total_p_hidup) + Number(v.total_l_hidup))}</td>
								<td class="center">${v.total_l_meninggal}</td>
								<td class="center">${v.total_p_meninggal}</td>
								<td class="center">${(Number(v.total_p_meninggal) + Number(v.total_l_meninggal))}</td>
							</tr>
						`;
						$('#table-data-17 tbody').append(html)
					})
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		// Laporan 18
		else if ($('#jenis-laporan').val() == '18') {
			$('#page-now').val(page)
			$('.lap-18, #tabs-lap18').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rm/api/laporan_rm/get_list_laporan_rm_18') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					$('.lap-18, #table-data-18 tbody').show()
					$('#table-data-18 tbody').empty()

					$.each(data.data, function(i, v) {
						const html = `
							<tr>
								<td class="center">${i + 1}</td>
								<td class="center">${v.kode_icd}</td>
								<td>${v.diagnosa}</td>
								<td class="center">${v.l_jam_1}</td>
								<td class="center">${v.p_jam_1}</td>
								<td class="center">${v.l_jam_1_23}</td>
								<td class="center">${v.p_jam_1_23}</td>
								<td class="center">${v.l_hari_1_7}</td>
								<td class="center">${v.p_hari_1_7}</td>
								<td class="center">${v.l_hari_8_28}</td>
								<td class="center">${v.p_hari_8_28}</td>
								<td class="center">${v.l_hari_29_bln_3}</td>
								<td class="center">${v.p_hari_29_bln_3}</td>
								<td class="center">${v.l_bln_3_6}</td>
								<td class="center">${v.p_bln_3_6}</td>
								<td class="center">${v.l_bln_6_11}</td>
								<td class="center">${v.p_bln_6_11}</td>
								<td class="center">${v.l_thn_1_4}</td>
								<td class="center">${v.p_thn_1_4}</td>
								<td class="center">${v.l_thn_5_9}</td>
								<td class="center">${v.p_thn_5_9}</td>
								<td class="center">${v.l_thn_10_14}</td>
								<td class="center">${v.p_thn_10_14}</td>
								<td class="center">${v.l_thn_15_19}</td>
								<td class="center">${v.p_thn_15_19}</td>
								<td class="center">${v.l_thn_20_24}</td>
								<td class="center">${v.p_thn_20_24}</td>
								<td class="center">${v.l_thn_25_29}</td>
								<td class="center">${v.p_thn_25_29}</td>
								<td class="center">${v.l_thn_30_34}</td>
								<td class="center">${v.p_thn_30_34}</td>
								<td class="center">${v.l_thn_35_39}</td>
								<td class="center">${v.p_thn_35_39}</td>
								<td class="center">${v.l_thn_40_44}</td>
								<td class="center">${v.p_thn_40_44}</td>
								<td class="center">${v.l_thn_45_49}</td>
								<td class="center">${v.p_thn_45_49}</td>
								<td class="center">${v.l_thn_50_54}</td>
								<td class="center">${v.p_thn_50_54}</td>
								<td class="center">${v.l_thn_55_59}</td>
								<td class="center">${v.p_thn_55_59}</td>
								<td class="center">${v.l_thn_60_64}</td>
								<td class="center">${v.p_thn_60_64}</td>
								<td class="center">${v.l_thn_65_69}</td>
								<td class="center">${v.p_thn_65_69}</td>
								<td class="center">${v.l_thn_70_74}</td>
								<td class="center">${v.p_thn_70_74}</td>
								<td class="center">${v.l_thn_75_79}</td>
								<td class="center">${v.p_thn_75_79}</td>
								<td class="center">${v.l_thn_80_84}</td>
								<td class="center">${v.p_thn_80_84}</td>
								<td class="center">${v.l_thn_85_plus}</td>
								<td class="center">${v.p_thn_85_plus}</td>
								<td class="center">${v.total_l_baru}</td>
								<td class="center">${v.total_p_baru}</td>
								<td class="center">${(Number(v.total_p_baru) + Number(v.total_l_baru))}</td>
								<td class="center">${v.total_l_kunjungan}</td>
								<td class="center">${v.total_p_kunjungan}</td>
								<td class="center">${(Number(v.total_p_kunjungan) + Number(v.total_l_kunjungan))}</td>
							</tr>
						`;
						$('#table-data-18 tbody').append(html)
					})
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}

		$('#per-dokter-tab, #per-dokter-07-tab').on('click', function() {
			$('#dokter-search').show()
		})
		$('#unit-pelayanan-tab, #spesialistik-tab').on('click', function() {
			$('#dokter-search').hide()
		})

		$('#dokter-search-select').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function(data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					}
				},
			},
			formatResult: function(data) {
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>'
				return markup
			},
			formatSelection: function(data) {
				$('#dokter-search-select').val(data.id)
				return data.nama
			},
		})
	}

	function laporanPenunjangRadiologi(data) {
		let html = ''
		let totalTindakan = 0
		$('#table-data-08').empty()

		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Kegiatan</th>
						<th class="center">Keterangan</th>
						<th class="center">Total</th>
					</tr>
					</thead>
					<tbody>`

		$.each(data.data, function(i, v) {
			totalTindakan += parseInt(v.total_tindakan)
			html += `<tr>
					<td class="center">${i + 1}</td>
					<td>${v.tindakan}</td>
					${i === 0 && `<td rowspan="${data.data.length}" class="center" style="vertical-align : middle;text-align:center;">Jumlah Pemeriksaan</td>`}
					<td class="center">${v.total_tindakan}</td>
				</tr>`
		})
		html += `<tr>
					<td></td>
					<td class="center"><b>TOTAL</b></td>
					<td></td>
					<td class="center"><b>${totalTindakan}</b></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td class="center"><b>PASIEN RADIOLOGI</b></td>
					<td></td>
					<td></td>
				</tr>`

		let totalPasien = 0
		$.each(data.layanan, function(i, v) {
			totalPasien += parseInt(v.total)
			html += `<tr>
						<td class="center">${i + 1}</td>
						<td>${v.jenis_layanan}</td>
						${i === 0 && `<td rowspan="${data.layanan.length}" class="center" style="vertical-align : middle;text-align:center;">Jumlah Layanan</td>`}
						<td class="center">${v.total}</td>
					</tr>`
		})
		html += `<tr>
					<td></td>
					<td class="center"><b>TOTAL</b></td>
					<td></td>
					<td class="center"><b>${totalPasien}</b></td>
				</tr>`

		$('#table-data-08').append(html + '</tbody>')
	}

	function laporanPenunjangFarmasi(data) {
		let html = ''
		let total = 0
		$('#table-data-08').empty()

		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Jenis Pemeriksaan</th>
						<th class="center">Total</th>
					</tr>
					</thead>
						<tr>
							<td class="center"><b>1</b></td>
							<td><b>LEMBAR RESEP</b></td>
						</tr>
					<tbody>`

		$.each(data.data, function(i, v) {
			total += parseInt(v.total)
			html += `<tr>
					<td class="center"></td>
					<td>${v.depo}</td>
					<td class="center">${v.total}</td>
				</tr>`
		})
		html += `<tr>
					<td></td>
					<td class="center"><b>TOTAL</b></td>
					<td class="center"><b>${total}</b></td>
				</tr>`

		$('#table-data-08').append(html + '</tbody>')
	}

	function laporanPenunjangLaboratorium(data) {
		let html = ''
		let totalTindakan = 0
		$('#table-data-08').empty()

		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Kegiatan</th>
						<th class="center">Keterangan</th>
						<th class="center">Total</th>
					</tr>
					</thead>
					<tbody>`

		$.each(data.data, function(i, v) {
			totalTindakan += parseInt(v.total_tindakan)
			html += `<tr>
					<td class="center">${i + 1}</td>
					<td>${v.tindakan}</td>
					${i === 0 && `<td rowspan="${data.data.length}" class="center" style="vertical-align : middle;text-align:center;">Jumlah Pemeriksaan</td>`}
					<td class="center">${v.total_tindakan}</td>
				</tr>`
		})
		html += `<tr>
					<td></td>
					<td class="center"><b>TOTAL</b></td>
					<td></td>
					<td class="center"><b>${totalTindakan}</b></td>
				</tr>
				<tr>
					<td colspan="4"></td>
				</tr>
				`
		$.each(data.covid, function(i, v) {
			html += `<tr>
							<td class="center">${i + 1}</td>
							<td>${v.tindakan}</td>
							<td rowspan="3" class="center" style="vertical-align : middle;text-align:center;">JUMLAH PASIEN</td>
							<td class="center"><b>${v.total_tindakan}</b></td>
						</tr>
						<tr>
							<td></td>
							<td><span style="margin-left: 0.5rem">Negatif</span></td>
							<td class="center">${v.negative}</td>
						</tr>
						<tr>
							<td></td>
							<td><span style="margin-left: 0.5rem">Positif</span></td>
							<td class="center">${v.positive}</td>
						</tr>
						`
		})

		html += `<tr>
				<td></td>
				<td class="center"><b>RINCIAN</b></td>
				<td></td>
				<td></td>
			</tr>`

		let totalPasien = 0
		$.each(data.layanan, function(i, v) {
			totalPasien += parseInt(v.total)
			html += `<tr>
						<td class="center">${i + 1}</td>
						<td>${v.jenis_layanan}</td>
						${i === 0 && `<td rowspan="${data.layanan.length}" class="center" style="vertical-align : middle;text-align:center;">Jumlah Layanan</td>`}
						<td class="center">${v.total}</td>
					</tr>`
		})
		html += `<tr>
					<td></td>
					<td class="center"><b>TOTAL</b></td>
					<td></td>
					<td class="center"><b>${totalPasien}</b></td>
				</tr>`

		$('#table-data-08').append(html + '</tbody>')
	}

	function laporanPenunjangRehab(data) {
		let html = ''
		let totalTindakan = 0
		let totalTindakan2 = 0
		$('#table-data-08').empty()

		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Jenis Pemeriksaan</th>
						<th class="center">Keterangan</th>
						<th class="center">Total</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td colspan="2"><b>Kunjungan Pasien Rawat Jalan Rehab Medik</b></td>
						<td>Jumlah Pasien</td>
						<td class="center">${data.total}</td>
					</tr>
					`

		$.each(data.data, function(i, v) {
			totalTindakan += parseInt(v.total_tindakan)
			html += `<tr>
					<td class="center">${i + 1}</td>
					<td><b>${v.tindakan}</b></td>
					<td rowspan="3" style="vertical-align : middle;text-align:center;">Jumlah Pasien</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td style="margin-left: .2rem">Rawat Jalan</td>
					<td class="center">${v.total_tindakan}</td>
				</tr>
				<tr>
					<td></td>
					<td style="margin-left: .2rem">Rawat Inap</td>
					<td class="center">-</td>
				</tr>
				`
		})
		html += `<tr>
					<td></td>
					<td class="center"><b>TOTAL</b></td>
					<td></td>
					<td class="center"><b>${totalTindakan}</b></td>
				</tr>
				<tr>
					<td></td>
					<td><b>Tindakan</b></td>
					<td></td>
					<td></td>
				</tr>
				`

		$.each(data.tindakan, function(i, v) {
			totalTindakan2 += parseInt(v.count)
			html += `<tr>
						<td class="center"></td>
						<td>${v.tindakan}</td>
						${i === 0 && `<td rowspan="${data.tindakan.length}" class="center" style="vertical-align : middle;text-align:center;">Jumlah Pemeriksaan</td>`}
						<td class="center">${v.count}</td>
					</tr>`
		})
		html += `<tr>
				<td></td>
				<td class="center"><b>TOTAL</b></td>
				<td></td>
				<td class="center"><b>${totalTindakan2}</b></td>
			</tr>`

		$('#table-data-08').append(html + '</tbody>')
	}

	function paging(page) {
		getLaporanRM(page)
	}
</script>