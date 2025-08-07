<script>
	$(function () {
		getDataKepegawaian('<?= date('Y-m') ?>')
		filterBulanTahun()
	})

	function getDataKepegawaian (waktu) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('kepegawaian/api/kepegawaian/data_kepegawaian_dashboard') ?>',
			data: { waktu },
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				$('.jumlah-struktural').html(data.data_jabatan.struktural)
				$('.jumlah-fungsional-umum').html(data.data_jabatan.fungsional_umum)
				$('.jumlah-fungsional-tertentu').html(data.data_jabatan.fungsional_tertentu)

				loadUnitKerja(data.data_unit_kerja)
				loadUsia(data.data_usia)
				loadPangkat(data.data_pangkat)
			},
			complete: function () {
				hideLoader()
				$('#modal-search').modal('hide')
			},
			error: function (e) {
				accessFailed(e.status)
			},
		})
	}

	function loadUnitKerja (data) {
		$('#table-unit-kerja tbody').empty()

		let html = ''
		$.each(data, function (i, v) {
			html += `<tr>
						<td>${++i}</td>
						<td>${v.upt}</td>
						<td>
							<div style="padding: .4rem; border: 1px solid #c2c2c2;">
							PNS: ${v.pns}
							</div>
						</td>
						<td>
							<div style="padding: .4rem; border: 1px solid #c2c2c2;">
							CPNS: ${v.cpns}
							</div>
						</td>
						<td>
							<div style="padding: .4rem; border: 1px solid #c2c2c2;">
							PPPK: ${v.pppk}
							</div>
						</td>
					</tr>`
		})

		$('#table-unit-kerja tbody').append(html)
	}

	function loadUsia (data) {
		$('#table-usia tbody').empty()

		let html = ''
		$.each(data, function (i, v) {
			html += `<tr>
						<td>${++i}</td>
						<td>${v.kelompok_umur}</td>
						<td>
							<div style="padding: .4rem; border: 1px solid #c2c2c2;">
							<i class="fas fa-mars mr-1" style="font-size: 18px"></i>: ${v.jumlah_laki_laki}
							</div>
						</td>
						<td>
							<div style="padding: .4rem; border: 1px solid #c2c2c2;">
							<i class="fas fa-venus mr-1" style="font-size: 18px"></i>: ${v.jumlah_perempuan}
							</div>
						</td>
					</tr>`
		})

		$('#table-usia tbody').append(html)
	}

	function loadPangkat (data) {
		$('#table-pangkat tbody').empty()

		let html = ''
		$.each(data, function (i, v) {
			html += `<tr>
						<td>${++i}</td>
						<td>${v.pangkat}</td>
						<td>
							<div style="padding: .4rem; border: 1px solid #c2c2c2;">
							<i class="fas fa-mars mr-1" style="font-size: 18px"></i>: ${v.jumlah_laki_laki}
							</div>
						</td>
						<td>
							<div style="padding: .4rem; border: 1px solid #c2c2c2;">
							<i class="fas fa-venus mr-1" style="font-size: 18px"></i>: ${v.jumlah_perempuan}
							</div>
						</td>
					</tr>`
		})

		$('#table-pangkat tbody').append(html)
	}

	function filterBulanTahun () {
		const currentMonthYear = new Date()
		let currentMonth = currentMonthYear.getMonth()
		let currentYear = currentMonthYear.getFullYear()
		const currentMonthDisplay = $('#month-year')

		const updateMonthDisplay = () => {
			currentMonthDisplay.text(`${getNamaBulan(currentMonth)} ${currentYear}`)
		}

		updateMonthDisplay()

		const updateMonth = (monthDiff) => {
			currentMonth += monthDiff
			if (currentMonth < 0) {
				currentMonth = 11
				currentYear--
			}
			else if (currentMonth > 11) {
				currentMonth = 0
				currentYear++
			}

			getDataKepegawaian(`${currentYear}-${('0' + (currentMonth + 1)).slice(-2)}`)
			updateMonthDisplay()
		}

		$('#prev-btn').click(() => updateMonth(-1))
		$('#next-btn').click(() => updateMonth(1))
	}

	function getNamaBulan (bulan) {
		const namaBulan = [
			'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
			'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
		]
		return namaBulan[bulan]
	}
</script>
