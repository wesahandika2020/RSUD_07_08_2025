<!-- Modal Search -->
<div id="lap-bulanan-ppi-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="lap-bulanan-ppi-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="lap-bulanan-ppi-search-label">Form Parameter Laporan Bulanan PPI</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-ppi-bulanan role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="bulan" class="col-md-4 col-form-label">Periode</label>
					<div class="col-md-5">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun" class="form-control">
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
						<?= form_dropdown('bangsal_search', $bangsal_filter, array(), 'class="form-control" id=bangsal-search') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="unit-search" class="col-4 col-form-label">Status Pasien</label>
					<div class="col">
						<?= form_dropdown('status_pasien', $status_pasien, array(), 'class="form-control" id=status-pasien') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="unit-search" class="col-4 col-form-label">Kultur</label>
					<div class="col">
						<?= form_dropdown('kultur', $kultur, array(), 'class="form-control" id=kultur') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="unit-search" class="col-4 col-form-label">Antiobika</label>
					<div class="col">
						<?= form_dropdown('antiobika', $antiobika, array(), 'class="form-control" id=antiobika') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="unit-search" class="col-4 col-form-label">No. RM / Nama Pasien</label>
					<div class="col">
						<input type="text" name="keyword" id="keyword-search" class="form-control form-control" placeholder="Nama / No. RM...">
					</div>
				</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanBulananPPI(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<script>
	// Format Tanggal
	// $('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
	// 	format: 'dd/mm/yyyy'
	// }).on('changeDate', function() {
	// 	$(this).datepicker('hide')
	// })

	// $('#periode-laporan').change(function() {
	// 	if ($('#periode-laporan').val() == 'Bulanan') {
	// 		$('.bulanan, #bulan, #tahun').show();
	// 		$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
	// 	}
	// 	if ($('#periode-laporan').val() == 'Rentang Waktu') {
	// 		$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show();
	// 		$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide();
	// 	}
	// 	if ($('#periode-laporan').val() == 'Harian') {
	// 		$('.harian, #tanggal-harian').show();
	// 		$('.bulanan, .rentang-waktu').hide();
	// 	}
	// });

	function resetForm_01() {
		$('#bulan').val('<?= date('m') ?>')
		$('#tahun').val('<?= date('Y') ?>')
		// $('#unit-search').val('<?= $this->session->userdata('id_unit') ?>').change()
		// $('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>')
		// $('#s2id_unit-search a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		// $('.harian, #tanggal-harian, .rentang-waktu').hide()
		$('#bangsal-search, #status-pasien, #kultur, #antiobika, #keyword-search').val('')
	}

	function getLaporanBulananPPI(page) {
		//Laporan 01
		$('#page-now').val(page)
		openData();

		if ($('#jenis-laporan').val() == "1") {
			$('.lap-bulanan-ppi, #table-lap-bulanan-ppi tbody').show()

			$.ajax({
				type: 'GET',
				url: baseUrl + '/get_list_laporan_bulanan/page/' + page + '/jenis/',
				data: $('#form-search-ppi-bulanan').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanBulananPPI(page - 1);
						return false;
					}

					$('#jenis-periode').html('Periode : ' + data.periode);
					$('#pagination01').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary01').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-bulanan-ppi, #table-lap-bulanan-ppi tbody').show()
					$('#table-lap-bulanan-ppi tbody').empty();
					$('#table-lap-bulanan-ppi tfoot').empty();
					$('#table-angka-infeksi-hs tbody').empty();
					
					$('#label-ppi').empty();

					let label_ppi = `
								<p><b>Ruangan/ Unit :</b> ${data.unit}</p>
								<p><b>Periode  &emsp;&emsp;&emsp;:</b> ${data.periode}</p>
							`;

					$('#label-ppi').append(label_ppi);
					
					// let TotalSaldoAwal = 0;
					// let TotalSaldoAkhir = 0;
					$.each(data.data, function(i, v) {
						// TotalSaldoAwal += parseInt(v.harga_satuan * v.awal);
						// TotalSaldoAkhir += parseInt(v.harga_satuan * v.sisa);

						// let periode = '';
						// if ($('#periode-laporan').val() == 'Harian') {
						// 	periode = 'Laporan Harian';
						// }
						// if ($('#periode-laporan').val() == 'Bulanan') {
						// 	periode = 'Laporan Bulanan';
						// }
						// if ($('#periode-laporan').val() == 'Rentang Waktu') {
						// 	periode = 'Laporan Rentang Waktu';
						// }

						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.tanggal}</td>
								<td class="center">${v.jumlah_pasien}</td>
								<td class="center">${v.sum_ett}</td>
								<td class="center">${v.sum_cvl}</td>
								<td class="center">${v.sum_ivl}</td>
								<td class="center">${v.sum_uc}</td>
								<td class="center">${v.sum_tirah_baring}</td>
								<td class="center">${v.sum_operasi}</td>

								<td class="center">${v.sum_vap}</td>
								<td class="center">${v.sum_iadp}</td>
								<td class="center">${v.sum_plebitis}</td>
								<td class="center">${v.sum_isk}</td>
								<td class="center">${v.sum_dekubitus}</td>
								<td class="center">${v.sum_ido}</td>
								<td class="center">${v.count_kultur}</td>
								<td class="center">${v.count_antiobika}</td>
							</tr>
						`;

						$('#table-lap-bulanan-ppi tbody').append(html);
					})

					let = jumlah_pasien = 0;
					let = sum_ett = 0;
					let = sum_cvl = 0;
					let = sum_ivl = 0;
					let = sum_uc = 0;
					let = sum_tirah_baring = 0;
					let = sum_vap = 0;
					let = sum_iadp = 0;
					let = sum_isk = 0;
					let = sum_dekubitus = 0;
					let = sum_plebitis = 0;
					let = sum_operasi = 0;
					let = sum_ido = 0;
					let = count_kultur = 0;
					let = count_antiobika = 0;

					$.each(data.data, function(i, v) {
						jumlah_pasien += parseInt(v.jumlah_pasien);
						sum_ett += parseInt(v.sum_ett);
						sum_cvl += parseInt(v.sum_cvl);
						sum_ivl += parseInt(v.sum_ivl);
						sum_uc += parseInt(v.sum_uc);
						sum_tirah_baring += parseInt(v.sum_tirah_baring);
						sum_vap += parseInt(v.sum_vap);
						sum_iadp += parseInt(v.sum_iadp);
						sum_isk += parseInt(v.sum_isk);
						sum_dekubitus += parseInt(v.sum_dekubitus);
						sum_plebitis += parseInt(v.sum_plebitis);
						sum_operasi += parseInt(v.sum_operasi);
						sum_ido += parseInt(v.sum_ido);
						count_kultur += parseInt(v.count_kultur);
						count_antiobika += parseInt(v.count_antiobika);
					})

					let html_footer = /* html */ `
						<tr>
							<td colspan="2" class="center"><h6><b></b></h6></td>
							<td class="center"><h6><b>${jumlah_pasien}</b></h6></td>

							<td class="center"><h6><b>${sum_ett}</b></h6></td>
							<td class="center"><h6><b>${sum_cvl}</b></h6></td>
							<td class="center"><h6><b>${sum_ivl}</b></h6></td>
							<td class="center"><h6><b>${sum_uc}</b></h6></td>
							<td class="center"><h6><b>${sum_tirah_baring}</b></h6></td>
							<td class="center"><h6><b>${sum_operasi}</b></h6></td>

							<td class="center"><h6><b>${sum_vap}</b></h6></td>
							<td class="center"><h6><b>${sum_iadp}</b></h6></td>
							<td class="center"><h6><b>${sum_plebitis}</b></h6></td>
							<td class="center"><h6><b>${sum_isk}</b></h6></td>
							<td class="center"><h6><b>${sum_dekubitus}</b></h6></td>
							<td class="center"><h6><b>${sum_ido}</b></h6></td>

							<td class="center"><h6><b>${count_kultur}</b></h6></td>
							<td class="center"><h6><b>${count_antiobika}</b></h6></td>
						</tr>
					`;
					$('#table-lap-bulanan-ppi tfoot').append(html_footer);

					let vap_mil = Math.round(((sum_vap / sum_ett) * 1000));
					let iadp_mil = Math.round(((sum_iadp / sum_cvl) * 1000));
					let plebitis_mil = Math.round(((sum_plebitis / sum_ivl) * 1000));
					let isk_mil = Math.round(((sum_isk / sum_uc) * 1000));
					let dekubitus_mil = Math.round(((sum_dekubitus / sum_tirah_baring) * 1000));
					let ido_mil = Math.round(((sum_ido / sum_operasi) * 1000));

					if (isNaN(parseInt(vap_mil))) vap_mil = 0;
					if (isNaN(parseInt(iadp_mil))) iadp_mil = 0;
					if (isNaN(parseInt(plebitis_mil))) plebitis_mil = 0;
					if (isNaN(parseInt(isk_mil))) isk_mil = 0;
					if (isNaN(parseInt(dekubitus_mil))) dekubitus_mil = 0;
					if (isNaN(parseInt(ido_mil))) ido_mil = 0;

					let html_tbl_angka_infeksi = `
						<tr>
							<td class="font-large left" >VAP</td>
							<td class="font-large center" >${(vap_mil)}</td>
						</tr>
						<tr>
							<td class="font-large left" >IADP</td>
							<td class="font-large center" >${(iadp_mil)}</td>
						</tr>
						<tr>
							<td class="font-large left" >PLEBITIS</td>
							<td class="font-large center" >${(plebitis_mil)}</td>
						</tr>
						<tr>
							<td class="font-large left" >ISK</td>
							<td class="font-large center" >${(isk_mil)}</td>
						</tr>
						<tr>
							<td class="font-large left" >DEKUBITUS</td>
							<td class="font-large center" >${(dekubitus_mil)}</td>
						</tr>
						<tr>
							<td class="font-large left" >IDO</td>
							<td class="font-large center" >${(ido_mil)}</td>
						</tr>
					`;

					$('#table-angka-infeksi-hs tbody').append(html_tbl_angka_infeksi);

					const categories = ['<b>VAP</b>', '<b>IADP</b>', '<b>PLEBITIS</b>', '<b>ISK</b>', '<b>DEKUBITUS</b>', '<b>IDO</b>'];
					const data_infeksi = [
						(vap_mil),
						(iadp_mil),
						(plebitis_mil),
						(isk_mil),
						(dekubitus_mil),
						(ido_mil)
					];

					Highcharts.chart('angka-infeksi-chart', {
						chart: {
							type: 'column'
						},
						title: {
							text: '<b>GRAFIK ANGKA INFEKSI HAIs</b>'
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
							data: data_infeksi
						}]
					});

				},
				complete: function() {
					hideLoader()
					$('#lap-bulanan-ppi-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}
</script>