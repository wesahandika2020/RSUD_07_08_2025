<!-- Modal Search -->
<div id="lap-antiobika-ppi-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="lap-antiobika-ppi-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="lap-antiobika-ppi-search-label">Form Parameter Laporan Rekap Antiobika</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-antiobika-ppi role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="bulan-03" class="col-md-4 col-form-label">Periode</label>
					<div class="col-md-5">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-03 class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-03" class="form-control">
							<?php $tg_awal = date('Y') - 5;
							$tgl_akhir = date('Y') + 5;
							for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
								echo "<option value='$i'";
								if (date('Y') == $i) {
									echo "selected";
								}
								echo ">$i</option>";
							}
							?>
						</select>
					</div>
				</div>

				<br>
				<div class="form-group row tight">
					<label for="unit-search" class="col-4 col-form-label">Unit</label>
					<div class="col">
						<?= form_dropdown('bangsal_search', $bangsal_filter, array(), 'class="form-control" id=bangsal-search-03') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="unit-search" class="col-4 col-form-label">Status Pasien</label>
					<div class="col">
						<?= form_dropdown('status_pasien', $status_pasien, array(), 'class="form-control" id=status-pasien-03') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="unit-search" class="col-4 col-form-label">Antiobika</label>
					<div class="col">
						<?= form_dropdown('antiobika', $antiobika, array(), 'class="form-control" id=antiobika-03') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="unit-search" class="col-4 col-form-label">No. RM / Nama Pasien</label>
					<div class="col">
						<input type="text" name="keyword" id="keyword-search-03" class="form-control form-control" placeholder="Nama / No. RM...">
					</div>
				</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanAntiobikaPPI(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<script>
	function resetForm_03() {
		$('#bulan-03').val('<?= date('m') ?>')
		$('#tahun-03').val('<?= date('Y') ?>')
		$('#bangsal-search-03, #status-pasien-03, #antiobika-03, #keyword-search-03').val('')
	}

	function getLaporanAntiobikaPPI(page) {
		//Laporan 01
		$('#page-now').val(page)
		openData();

		if ($('#jenis-laporan').val() == "3") {
			$('.lap-antiobika-ppi, #table-lap-antiobika-ppi').show()

			$.ajax({
				type: 'GET',
				url: baseUrl + '/get_list_laporan_antiobika/page/' + page + '/jenis/',
				data: $('#form-search-antiobika-ppi').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					// if ((page - 1) & (data.data.length === 0)) {
					// 	getLaporanAntiobikaPPI(page - 1);
					// 	return false;
					// }

					// // $('#jenis-periode').html('Periode : ' + data.periode);
					// $('#pagination-03').html(pagination(data.jumlah, data.limit, data.page, 1));
					// $('#summary-03').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-antiobika-ppi, #table-lap-antiobika-ppi').show()
					$('#table-lap-antiobika-ppi').empty();
					$('#table-angka-antiobika tbody').empty();
					// $('#table-lap-antiobika-ppi tbody').empty();
					// $('#table-lap-antiobika-ppi tfoot').empty();

					$('#label-antiobika-ppi').empty();

					let label_ppi = `
								<p><b>Ruangan/ Unit :</b> ${data.unit}</p>
								<p><b>Periode  &emsp;&emsp;&emsp;:</b> ${data.periode}</p>
							`;
					$('#label-antiobika-ppi').append(label_ppi);

					let data_head = data.header;
					let header = ``;
					for (let key in data_head) {
						if (data_head.hasOwnProperty(key)) {
							header += `<th class="center">${data_head[key]}</th>`;
						}
					};
					// $.each(data.header, function(i, v) {
					// });

					let data_body = data.detail;
					let tbody = ``;

					let total = {};
					$.each(data.detail, function(i, v) {
						tbody += `
							<tr>
								<td class="center">${i+1}</td>
						`;
						for (let key in v) {
							if (v.hasOwnProperty(key)) {
								tbody += `
								<td class="center">${v[key]}</td>
							`;
							}
							
							if (key !== 'tanggal' && v[key] !== undefined) {
								total[key] = (total[key] || 0) + parseFloat(v[key]);
							}

						}
						tbody += `</tr>`;
					});
				
					let tfoot = ``;
					for (let key in total) {
						if (total.hasOwnProperty(key)) {
							tfoot += `<td class="center"><h6><b>${total[key]}</b></h6></td>`;
						}
					};

					let html = /* html */ `
					<table class="table table-hover table-striped table-bordered table-sm color-table info-table">
						<thead>
							<tr style="top: 0;">
								<th width="3%" class="center">No.</th>
								${header}
							</tr>
						</thead>
						<tbody>
							${tbody}
						</tbody>
						<tfoot>
							<tr>
								<td class="center"> </td>
								<td class="center"> </td>
								${tfoot}
							</tr>
						</tfoot>
					</table>`;

					$('#table-lap-antiobika-ppi').append(html);

					const array_nama = [];
					const array_jumlah = [];
					$.each(data.antiobika, function(i, v) {
						let html_angka_antiobika = `
						<tr>
							<td class="font-large left" >${(v.nama)}</td>
							<td class="font-large center" >${(v.jumlah)}</td>
						</tr>
					`;

						$('#table-angka-antiobika tbody').append(html_angka_antiobika);

						array_nama.push(v.nama);
						array_jumlah.push(parseInt(v.jumlah));
					});
					
					
					const categories = array_nama;
					const data_antiobika = array_jumlah;
					console.log(categories, data_antiobika)
					
					Highcharts.chart('angka-antiobika-chart', {
						chart: {
							type: 'column'
						},
						title: {
							text: '<b>GRAFIK ANGKA antiobika</b>'
						},
						xAxis: {
							categories: categories
						},
						yAxis: {
							title: {
								text: 'Jumlah per mil'
							}
						},
						series: [{
							name: 'PER MIL',
							data: data_antiobika
						}]
					});

				},
				complete: function() {
					hideLoader()
					$('#lap-antiobika-ppi-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}
</script>