<!-- <script src="https://code.highcharts.com/themes/grid-light.js"></script> -->
<?php if ($this->session->userdata('account_group') !== 'Kepegawaian') : ?>
	<script>
		var number = 1;
		var key = 1;
		var tipe = ['Success', 'Info', 'Notice', 'Error'];
		var interval = '';
		var setScreen = '';

		$(function() {
			$('body').keyup(function() {
				key = 1;
				number = 1;
				clearInterval(setScreen);
			})

			// play();
		})

		function play() {
			setInterval(function() {
				key++;
				if (key == 15) {
					screenSaver();
					clearInterval(this);
				}
			}, 1000);
		}

		function screenSaver() {
			setScreen = setInterval(function() {
				messageCustom(number++, tipe[getRandomInt(0, 3)]);
			}, 200);
		}

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
	</script>



	<h1 style="font-weight: 500" class="center">Dashboard</h1>
	<br>
	<div class="row">
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-body">
					<div id="pasien-status-chart"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-body">
					<div id="pasien-status-chart-rajal"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-body">
					<div id="pasien-status-chart-ranap"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-body">
					<div id="pasien-status-chart-penunjang"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow">
				<div class="card-body">
					<div id="top-diagnosis-chart"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow">
				<div class="card-body">
					<div id="pasien-unit-chart"></div>
				</div>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<script>
		$(function() {
			reloadAllGraphics();
		})

		function reloadAllGraphics() {
			getDataSeries('apps/get_all_data_pasien_status', 'pasienstatus');
			getDataSeries('apps/get_all_data_pasien_status_rajal', 'pasienstatusrajal');
			getDataSeries('apps/get_all_data_pasien_status_ranap', 'pasienstatusranap');
			getDataSeries('apps/get_all_data_pasien_status_penunjang', 'pasienstatuspenunjang');
			getDataSeries('apps/get_top_data_diagnosis', 'topdiagnosis');
			getDataSeries('apps/get_all_data_pasien_unit', 'pasienunit');
		}

		function getDataSeries(url, chart) {
			$.ajax({
				url: '<?php echo base_url("' + url + '") ?>',
				dataType: 'JSON',
				beforeSeappnd: function() {
					showLoader();
				},
				success: function(data) {
					if (chart === 'pasienstatus') {
						showChartSpline('#pasien-status-chart', data);
					} else if (chart === 'pasienstatusrajal') {
						showChartSpline('#pasien-status-chart-rajal', data);
					} else if (chart === 'pasienstatusranap') {
						showChartSpline('#pasien-status-chart-ranap', data);
					} else if (chart === 'pasienstatuspenunjang') {
						showChartSpline('#pasien-status-chart-penunjang', data);
					} else if (chart === 'topdiagnosis') {
						showChartPie('#top-diagnosis-chart', data);
					} else if (chart === 'pasienunit') {
						showChartColumn('#pasien-unit-chart', data);
					}
				},
				complete: function() {
					hideLoader();
				}
			})
		}

		function showChartSpline(element, data) {
			$(element).highcharts({
				chart: {
					zoomType: 'x',
				},
				title: {
					text: data.title
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					categories: data.tanggal
				},
				yAxis: {
					title: {
						text: 'Jumlah Data'
					}
				},
				tooltip: {
					pointFormat: '{point.y} Pasien',
					crosshairs: true,
				},
				series: data.data
			});
		}

		function showChartPie(element, data) {
			$(element).highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: data.title
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				accessibility: {
					point: {
						valueSuffix: '%'
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %'
						},
					}
				},
				series: [{
					name: 'Diagnosis',
					colorByPoint: true,
					data: data.series.data
				}]
			});
		}

		function showChartColumn(element, data) {
			$(element).highcharts({
				chart: {
					type: 'column',
					zoomType: 'x',
				},
				title: {
					text: data.title
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					categories: data.tanggal,
					crosshair: true
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Jumlah Data (Pasien)'
					}
				},
				tooltip: {
					headerFormat: '<b><span style="font-size:10px">{point.key}</span><b><table>',
					pointFormat: '<tr style="font-size:9px"><td style="padding:0">{series.name}:</td>' +
								 '<td style="padding:0"><b>{point.y} pasien</b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series: data.data
			});
		}
	</script>
<?php else : ?>
	<style>
		.table td {
			padding: .3rem !important;
		}
	</style>
	<div class="row mb-3">
		<div class="col">
			<h2>Dashboard Kepegawaian</h2>
		</div>
		<div class="col right">
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-secondary" id="prev-btn"><i class="fas fa-backward"></i></button>
				<div class="btn btn-primary" id="month-year" style="width: 130px"></div>
				<button type="button" class="btn btn-secondary" id="next-btn"><i class="fas fa-forward"></i></button>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block">
						<div class="round align-self-center round-success"><i class="fas fa-sitemap"></i></div>
						<div class="m-l-10 align-self-center">
							<h3 class="m-b-0 jumlah-struktural"></h3>
							<h5 class="text-muted m-b-0">Struktural</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block">
						<div class="round align-self-center round-info"><i class="fas fa-clipboard-list"></i></div>
						<div class="m-l-10 align-self-center">
							<h3 class="m-b-0 jumlah-fungsional-umum"></h3>
							<h5 class="text-muted m-b-0">Fungsional Umum</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block">
						<div class="round align-self-center round-danger"><i class="fas fa-cubes"></i></div>
						<div class="m-l-10 align-self-center">
							<h3 class="m-b-0 jumlah-fungsional-tertentu"></h3>
							<h5 class="text-muted m-b-0">Fungsional Tertentu</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<ul class="list-group m-b-10">
				<li class="list-group-item bg-danger text-white" style="font-size: 25px">
					<i class="mdi mdi-worker m-r-5"></i>
					<b>Unit Kerja - Status</b>
				</li>
				<li class="list-group-item border-danger">
					<table class="table table-striped" id="table-unit-kerja">
						<tbody>

						</tbody>
					</table>
				</li>
			</ul>
		</div>

		<div class="col-md-4">
			<div class="row">
				<div class="col">
					<ul class="list-group m-b-10">
						<li class="list-group-item bg-theme text-white" style="font-size: 25px">
							<i class="fas fa-calendar-alt m-r-5"></i>
							<b>Usia</b>
						</li>
						<li class="list-group-item border-theme">
							<table class="table table-striped" id="table-usia">
								<tbody>

								</tbody>
							</table>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<ul class="list-group m-b-10">
						<li class="list-group-item bg-success text-white" style="font-size: 25px">
							<i class="fas fa-signal m-r-5"></i>
							<b>Pangkat</b>
						</li>
						<li class="list-group-item border-success">
							<table class="table table-striped" id="table-pangkat">
								<tbody>

								</tbody>
							</table>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('kepegawaian/dashboard_js') ?>
<?php endif; ?>