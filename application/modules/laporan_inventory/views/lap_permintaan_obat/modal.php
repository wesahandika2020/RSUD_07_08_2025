<!-- Modal Search -->
<div id="permintaan-obat-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="permintaan-obat-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="permintaan-obat-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-permintaan-obat role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-07" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-07 name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-07 form-group row tight">
					<label for="bulan-07" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-07 class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-07" class="form-control">
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
					<label for="tanggal-awal-07" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-07" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-07" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-07 form-group row tight">
					<label for="tanggal-harian-07" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-07" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-07" class="col-3 col-form-label">Unit Tujuan</label>
					<div class="col">
						<!--?= form_dropdown('unit_depo_07', $unit_all, array(), 'id=unit-07 class=form-control') ?-->
						<input type="text" name="unit_depo_07" id="unit-07" class="select2-input" placeholder="Semua Unit...">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang_search_07" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang_search_07" id="barang_search_07" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPermintaanObat(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-07, #tanggal-akhir-07, #tanggal-harian-07').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-07').change(function() {
		if ($('#periode-laporan-07').val() == 'Bulanan') {
			$('.bulanan-07, #bulan-07, #tahun-07').show();
			$('.harian-07, .rentang-waktu, #tanggal-awal-07, #tanggal-akhir-07').hide();
		}
		if ($('#periode-laporan-07').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-07, #tanggal-akhir-07').show();
			$('.harian-07, #tanggal-harian-07, .bulanan-07, #bulan-07, #tahun-07').hide();
		}
		if ($('#periode-laporan-07').val() == 'Harian') {
			$('.harian-07, #tanggal-harian-07').show();
			$('.bulanan-07, .rentang-waktu').hide();
		}
	});

	function resetForm_07() {
		$('#periode-laporan-07').val('Bulanan')
		$('#bulan-07').val('<?= date('m') ?>')
		$('#tahun-07').val('<?= date('Y') ?>')
		$('.bulanan-07, #tahun-07, #bulan-07').show()
		$('#tanggal-awal-07, #tanggal-akhir-07, #tanggal-harian-07').val('<?= date('d/m/Y') ?>')

		$('#kategori-07, #jenis-pasien').val('')
		$('.harian-07, #tanggal-harian-07, .rentang-waktu-07').hide()
	}

	function getLaporanPermintaanObat(page) {
		//Laporan 01
		$('#page-now').val(page)
		$('#permintaan-obat-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "7") {
			$('.lap-permintaan-obat, #table-lap-permintaan-obat tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventory/api/laporan_inventory/get_list_laporan_inventory_07') ?>/page/' + page + '/jenis/',
				data: $('#form-search-permintaan-obat').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPermintaanObat(page - 1);
						return false;
					}

					$('#jenis-periode-permintaan-obat').html('Periode : ' + data.periode);
					$('#pagination-07').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-07').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-permintaan-obat, #table-lap-permintaan-obat tbody').show()
					$('#table-lap-permintaan-obat tbody').empty();

					$.each(data.data, function(i, v) {

						let periode = '';
						if ($('#jenis-periode-permintaan-obat').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-permintaan-obat').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-permintaan-obat').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.tanggal}</td>
								<td class="center">${v.no_bukti}</td>
								<td class="center">${v.kepemilikan}</td>
								<td class="center">${v.unit}</td>
								<td class="left">${v.obat}</td>
								<td class="center">${number_format(v.qty, 0, ',', '.')}</td>
								<td class="center">${v.status}</td>
							</tr>`;

						$('#table-lap-permintaan-obat tbody').append(html);
					})
				},
				complete: function() {
					hideLoader()
					$('#permintaan-obat-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	$('#barang_search_07').select2({
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

	$('#unit-07').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
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
			return data.nama;
		}
	})
</script>