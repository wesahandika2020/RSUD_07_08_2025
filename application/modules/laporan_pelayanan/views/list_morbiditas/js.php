<script>
	$(function() {
		$("#tanggal-awal, #tanggal-akhir").datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function(){
			$(this).datepicker('hide')
		})
		
		$('#btn-search').click(function() {
			var jenis = $('#jenis-pelayanan').val()
			var date_from = '';
			var date_to = '';
			if (jenis !== '') {
				var from = '';
				if ($('#tanggal-awal').val() !== '') {
					from = $('#tanggal-awal').val().split('/')
					date_from = from[2] + '-' + from[1] + '-' + from[0]
				}

				var to = '';
				if ($('#tanggal-akhir').val() !== '') {
					to = $('#tanggal-akhir').val().split('/')
					date_to = to[2] + '-' + to[1] + '-' + to[0]
				}

				if (date_from !== '') {
					if (to === '') {
						syams_validation('#tanggal-akhir', 'Pilih tanggal akhir')
						return false
					} else {
						getLaporanMorbiditas(date_from, date_to, jenis)
					}
				} else {
					getLaporanMorbiditas(date_from, date_to, jenis)
				}
			} else {
				syams_validation('#jenis-pelayanan', 'Pilih jenis pelayanan terlebih dahulu!')
				return false
			}
		})

		$('#btn-reset').click(function() {
			$('#form-morbiditas')[0].reset()
			syams_validation_remove('.form-control')
			$('#chart-content').html('')
		})

		$('.form-control').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})
	})

	function getLaporanMorbiditas(date_from, date_to, jenis) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('laporan_pelayanan/get_data_morbiditas') ?>' + date_from + '/' + date_to,
			data: 'jenis_pelayanan=' + jenis,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				drawBarChart(data)
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function drawBarChart(data) {
		$('#chart-content').show();
		$('#chart-content').highcharts({
			chart: {
				type: 'bar'
			},
			title: {
				text: data.title
			},
			xAxis: {
				categories: data.nama
			},
			yAxis: {
				title: {
					text: 'Jumlah'
				}
			},
			series: [{
				name : 'Jumlah Pasien',
				data: data.jumlah
			}]
		})
	}
</script>