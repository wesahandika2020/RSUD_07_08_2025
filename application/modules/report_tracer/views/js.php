<script src="<?php echo resource_url() ?>assets/js/jquery.animateNumber.min.js"></script>
<script>
	var DATENOW = '<?php echo date('Y-m-d') ?>';
	$(function() {
		getDataSummaryTracer()
		getDataAverageReady()
		getListDataAverageReadyBRM(1)
		getListDataInOutBRM(1)
		getListDataInOutPoliBRM(1, '')

		$("#tanggal-awal-avg, #tanggal-akhir-avg, #tanggal-awal-inout, #tanggal-akhir-inout").datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function(){
			$(this).datepicker('hide')
		})
	})

	function getDataSummaryTracer() {
		$('.progress-bar').css({
			'width': '0%'
		})
		$('.info_persen_berkas').html("0%")
		$('.info_num_berkas').html("0")
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('distribusi_tracer/api/distribusi_tracer/get_data_summary_tracer') ?>',
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				let result = data.data.list;
				$('#order_count').animateNumber({
					number: result.order.jumlah
				}, 4000)
				$('#ready_count').animateNumber({
					number: result.ready.jumlah
				}, 4000)
				$('#dist_count').animateNumber({
					number: result.distributed.jumlah
				}, 4000)
				$('#return_count').animateNumber({
					number: result.returned.jumlah
				}, 4000)

				$('#order_percen').html(result.order.persentase)
				$('#ready_percen').html(result.ready.persentase)
				$('#dist_percen').html(result.distributed.persentase)
				$('#return_percen').html(result.returned.persentase)

				$('#order_bar_percen').css({
					'width': result.order.persentase
				})
				$('#ready_bar_percen').css({
					'width': result.ready.persentase
				})
				$('#dist_bar_percen').css({
					'width': result.distributed.persentase
				})
				$('#return_bar_percen').css({
					'width': result.returned.persentase
				})
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function paging(page, tab) {
		switch (tab) {
			case 1:
				getListDataAverageReadyBRM(page)
				break;
			case 2:
				getListDataInOutBRM(page)
				break;
			case 3:
				getListDataInOutPoliBRM(page, '')
				break;
			default:
				break;
		}
	}

	function getDataAverageReady(){
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('report_tracer/api/report_tracer/get_data_average_ready_brm') ?>',
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				drawAverageReady(data)
			},
			error: function(e){

			}
		})
	}

	function drawAverageReady(data){
		$('#area-average-ready').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				backgroundColor: '#f7ffff',
				polar: true,
				type: 'line'
			},
			exporting: {
				enabled: true
			},
			xAxis: {
				categories: data.data.tanggal
			},
			yAxis:{
				title: {
					text: 'Jumlah'
				}
			},
			title: {
				text: data.title
			},
			tooltip: {
				pointFormat: '{point.y} menit'
			},
			series: [{
				type: 'spline',
				name : 'Menit',
				data: data.data.avg
			}]
		})
	}

	function getListDataAverageReadyBRM(page) {
		var tanggal_awal = $('#tanggal-awal-avg').val()
		var tanggal_akhir = $('#tanggal-akhir-avg').val()
		if (tanggal_awal !== '') {
			tanggal_awal = date2mysql(tanggal_awal)
		}

		if (tanggal_akhir !== '') {
			tanggal_akhir = date2mysql(tanggal_akhir)
		}
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('report_tracer/api/report_tracer/get_list_average_ready_brm') ?>/page/' + page,
			data: 'tanggal_awal=' + tanggal_awal + '&tanggal_akhir=' + tanggal_akhir,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
				$('#page-average-ready').val(page)
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListDataAverageReadyBRM(page - 1)
					return false;
				};

				$('#pagination-average-ready').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary-average-ready').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				if (data.parameter.tanggal_awal != '') {
					$('#tanggal-awal-avg').val(datefmysql(data.parameter.tanggal_awal))
					$('#tanggal-akhir-avg').val(datefmysql(data.parameter.tanggal_akhir))
				}
				$('#table-data-average-ready-brm tbody').empty()
				$.each(data.data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="wrapper center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${v.tanggal}</td>
							<td class="wrapper left">${(v.avg + ' menit')}</td>
						</tr>
					`;

					$('#table-data-average-ready-brm tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function cetakAverageBRM() {

	}

	function getListDataInOutBRM(page) {
		var tanggal_awal = $('#tanggal-awal-inout').val()
		var tanggal_akhir = $('#tanggal-akhir-inout').val()
		if (tanggal_awal !== '') {
			tanggal_awal = date2mysql(tanggal_awal)
		}

		if (tanggal_akhir !== '') {
			tanggal_akhir = date2mysql(tanggal_akhir)
		}
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('report_tracer/api/report_tracer/get_list_inout_brm') ?>/page/' + page,
			data: 'tanggal_awal=' + tanggal_awal + '&tanggal_akhir=' + tanggal_akhir,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
				$('#page-inout').val(page)
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListDataAverageReadyBRM(page - 1)
					return false;
				};

				$('#pagination-inout').html(pagination(data.jumlah, data.limit, data.page, 2))
				$('#summary-inout').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				if (data.parameter.tanggal_awal != '') {
					$('#tanggal-awal-inout').val(datefmysql(data.parameter.tanggal_awal))
					$('#tanggal-akhir-inout').val(datefmysql(data.parameter.tanggal_akhir))
				}
				$('#table-data-inout-brm tbody').empty()
				$.each(data.data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="wrapper center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td>${v.tanggal_app}</td>
							<td class="center">${v.keluar}</td>
							<td class="center">${v.kembali}</td>
							<td class="center">${v.ranap}</td>
							<td class="center">${v.nokembali}</td>
							<td class="center">
								<button type="button" class="btn btn-secondary btn-xs" onclick="getListDataInOutPoliBRM(1, '${v.tanggal}')" title="Klik untuk menampilkan rincian per poliklinik"><i class="fas fa-arrow-circle-right"></i></button>
							</td>
						</tr>
					`;

					$('#table-data-inout-brm tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function getListDataInOutPoliBRM(page, tanggal) {
		if (tanggal === '') {
			tanggal = DATENOW;
		} else {
			DATENOW = tanggal;
		}

		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('report_tracer/api/report_tracer/get_list_inout_poli_brm') ?>/page/' + page,
 			data: 'tanggal=' + tanggal,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
				$('#page-inout-poli').val(page)
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListDataInOutPoliBRM(page - 1)
					return false;
				};
				$('#inout-poli-title').html(data.parameter.tanggal);
				$('#pagination-inout-poli').html(pagination(data.jumlah, data.limit, data.page, 3))
				$('#summary-inout-poli').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				if (data.parameter.tanggal_awal != '') {
					$('#tanggal-awal-inout-poli').val(datefmysql(data.parameter.tanggal_awal))
					$('#tanggal-akhir-inout-poli').val(datefmysql(data.parameter.tanggal_akhir))
				}
				$('#table-data-inout-poli-brm tbody').empty()
				$.each(data.data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="wrapper center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper left">${v.klinik}</td>
							<td class="wrapper center">${v.keluar}</td>
							<td class="wrapper center">${v.kembali}</td>
							<td class="wrapper center">${v.ranap}</td>
							<td class="wrapper center">${v.nokembali}</td>
						</tr>
					`;

					$('#table-data-inout-poli-brm tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}
</script>