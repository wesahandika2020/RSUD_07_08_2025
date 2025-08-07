<!-- Modal Search -->
<div id="permintaan-kegudang-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="permintaan-kegudang-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="permintaan-kegudang-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-permintaan-kegudang role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-08" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-08 name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-08 form-group row tight">
					<label for="bulan-08" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-08 class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-08" class="form-control">
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
				<div class="rentang-waktu form-group row tight">
					<label for="tanggal-awal-08" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-08" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-08" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-08 form-group row tight">
					<label for="tanggal-harian-08" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-08" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-08" class="col-3 col-form-label">Unit Tujuan</label>
					<div class="col">
						<?= form_dropdown('unit_depo_08', $unit, array(), 'id=unit-08 class=form-control') ?>
						<!-- <input type="text" name="unit_depo_08" id="unit-08" class="select2-input" placeholder="Semua Unit..."> -->
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang_search_08" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang_search_08" id="barang_search_08" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPermintaanKegudang(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('laporan_inventory/api/laporan_inventory') ?>';

	// Format Tanggal
	$('#tanggal-awal-08, #tanggal-akhir-08, #tanggal-harian-08').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-08').change(function() {
		if ($('#periode-laporan-08').val() == 'Bulanan') {
			$('.bulanan-08, #bulan-08, #tahun-08').show();
			$('.harian-08, .rentang-waktu, #tanggal-awal-08, #tanggal-akhir-08').hide();
		}
		if ($('#periode-laporan-08').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-08, #tanggal-akhir-08').show();
			$('.harian-08, #tanggal-harian-08, .bulanan-08, #bulan-08, #tahun-08').hide();
		}
		if ($('#periode-laporan-08').val() == 'Harian') {
			$('.harian-08, #tanggal-harian-08').show();
			$('.bulanan-08, .rentang-waktu').hide();
		}
	});

	function resetForm_08() {
		$('#periode-laporan-08').val('Bulanan')
		$('#bulan-08').val('<?= date('m') ?>')
		$('#tahun-08').val('<?= date('Y') ?>')
		$('.bulanan-08, #tahun-08, #bulan-08').show()
		$('#tanggal-awal-08, #tanggal-akhir-08, #tanggal-harian-08').val('<?= date('d/m/Y') ?>')

		$('#kategori-08, #jenis-pasien').val('')
		$('.harian-08, #tanggal-harian-08, .rentang-waktu-08').hide()
	}

	function getLaporanPermintaanKegudang(page) {
		//Laporan 01
		$('#page-now').val(page)
		$('#permintaan-kegudang-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "8") {
			$('.lap-permintaan-kegudang, #table-lap-permintaan-kegudang tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventory/api/laporan_inventory/get_list_laporan_inventory_08') ?>/page/' + page + '/jenis/',
				data: $('#form-search-permintaan-kegudang').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPermintaanKegudang(page - 1);
						return false;
					}

					$('#jenis-periode-permintaan-kegudang').html('Periode : ' + data.periode);
					$('#pagination-08').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-08').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-permintaan-kegudang, #table-lap-permintaan-kegudang tbody').show()
					$('#table-lap-permintaan-kegudang tbody').empty();
					$('#table-lap-permintaan-kegudang tfoot').empty();

					let SubTotal = 0;
					$.each(data.data, function(i, v) {
						SubTotal += parseInt(v.total);
						let periode = '';
						if ($('#jenis-periode-permintaan-kegudang').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-permintaan-kegudang').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-permintaan-kegudang').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.kode}</td>
								<td class="left">${v.obat}</td>
								<td class="center">${v.satuan}</td>
								<td class="center">${v.kepemilikan}</td>
								<td class="center">${number_format(v.qty_minta, 0, ',', '.')}</td>
								<td class="center">${number_format(v.qty_kirim, 0, ',', '.')}</td>
								<td class="right">${number_format(v.harga_satuan, 0, ',', '.')}</td>
								<td class="right">${number_format(v.total, 0, ',', '.')}</td>
							</tr>`;

						$('#table-lap-permintaan-kegudang tbody').append(html);
					})

					let tfoot = /* html */ `
						<tr>
							<td colspan="8" class="right"><b>Sub Total</b></td>
							<td class="right"><b>${number_format(SubTotal, 0, ',', '.')}</b></td>
						</tr>`;

					$('#table-lap-permintaan-kegudang tfoot').append(tfoot);

					// $.each(data.sub_total, function(i, val) {
					// })
				},
				complete: function() {
					hideLoader()
					$('#permintaan-kegudang-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	$('#barang_search_08').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/barang_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
					jenissppb: $('#kategori-barang-search').val()
				};
			},
			results: function(data, page) {
				var more = (page * 20) < data.total; // whether or not there are more results available

				// notice we return the value of more so Select2 knows if more results can be loaded
				return {
					results: data.data,
					more: more
				};
			}
		},
		formatResult: function(data) {
			var markup = data.nama;
			return markup;
		},
		formatSelection: function(data) {
			return data.nama + ' ' + data.kekuatan + ' ' + data.satuan_kekuatan;
		}
	})

	// $('#unit-08').select2({
	// 	ajax: {
	// 		url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
	// 		dataType: 'json',
	// 		quietMillis: 100,
	// 		data: function(term, page) { // page is the one-based page number tracked by Select2
	// 			return {
	// 				q: term, //search term
	// 				page: page, // page number
	// 			};
	// 		},
	// 		results: function(data, page) {
	// 			var more = (page * 20) < data.total; // whether or not there are more results available

	// 			// notice we return the value of more so Select2 knows if more results can be loaded
	// 			return {
	// 				results: data.data,
	// 				more: more
	// 			};
	// 		}
	// 	},
	// 	formatResult: function(data) {
	// 		var markup = data.nama;
	// 		return markup;
	// 	},
	// 	formatSelection: function(data) {
	// 		return data.nama;
	// 	}
	// })
</script>