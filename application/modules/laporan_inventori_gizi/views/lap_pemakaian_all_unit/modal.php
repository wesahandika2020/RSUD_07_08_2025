<!-- Modal Search -->
<div id="pemakaian-obat-all-unit-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="pemakaian-obat-all-unit-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="pemakaian-obat-all-unit-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-pemakaian-obat-all-unit role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-05" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-05 name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-05 form-group row tight">
					<label for="bulan-05" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-05 class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-05" class="form-control">
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
					<label for="tanggal-awal-05" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-05" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-05" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-05 form-group row tight">
					<label for="tanggal-harian-05" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-05" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-depo" hidden class="col-3 col-form-label">Unit</label>
					<div class="col">
						<?= form_dropdown('unit_depo', $unit_all, array(), 'id=unit-depo hidden class=form-control') ?>
						<!-- <input type="text" name="unit" id="unit-depo" class="select2-input" placeholder="Semua Unit..."> -->
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang_search_05" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang_search_05" id="barang_search_05" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kategori-05" class="col-md-3 col-form-label">Kategori Obat</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori-05 class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="golongan" class="col-md-3 col-form-label">Golongan</label>
					<div class="col-md-9">
						<?= form_dropdown('golongan', $golongan, array(), 'id=golongan class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="jenis" class="col-md-3 col-form-label">Jenis</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis', $jenis, array(), 'id=jenis class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="fornas" class="col-md-3 col-form-label">Fornas</label>
					<div class="col-md-9">
						<?= form_dropdown('fornas', $fornas, array(), 'id=fornas class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="generik" class="col-md-3 col-form-label">Generik</label>
					<div class="col-md-9">
						<?= form_dropdown('generik', $generik, array(), 'id=generik class=form-control') ?>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPemakaianObatAllUnit(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-05, #tanggal-akhir-05, #tanggal-harian-05').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-05').change(function() {
		if ($('#periode-laporan-05').val() == 'Bulanan') {
			$('.bulanan-05, #bulan-05, #tahun-05').show();
			$('.harian-05, .rentang-waktu, #tanggal-awal-05, #tanggal-akhir-05').hide();
		}
		if ($('#periode-laporan-05').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-05, #tanggal-akhir-05').show();
			$('.harian-05, #tanggal-harian-05, .bulanan-05, #bulan-05, #tahun-05').hide();
		}
		if ($('#periode-laporan-05').val() == 'Harian') {
			$('.harian-05, #tanggal-harian-05').show();
			$('.bulanan-05, .rentang-waktu').hide();
		}
	});

	function resetForm_05() {
		$('#periode-laporan-05').val('Bulanan')
		$('#bulan-05').val('<?= date('m') ?>')
		$('#tahun-05').val('<?= date('Y') ?>')
		$('.bulanan-05, #tahun-05, #bulan-05').show()
		$('#tanggal-awal-05, #tanggal-akhir-05, #tanggal-harian-05').val('<?= date('d/m/Y') ?>')

		$('#kategori-05, #jenis-pasien').val('')
		$('.harian-05, #tanggal-harian-05, .rentang-waktu-05').hide()
	}

	function getLaporanPemakaianObatAllUnit(page) {
		//Laporan 01
		$('#page-now').val(page)
		$('#pemakaian-obat-all-unit-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "5") {
			$('.lap-pemakaian-obat-all-unit, #table-lap-pemakaian-obat-all-unit tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventory/api/laporan_inventory/get_list_laporan_inventory_05') ?>/page/' + page + '/jenis/',
				data: $('#form-search-pemakaian-obat-all-unit').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPemakaianObat(page - 1);
						return false;
					}

					$('#jenis-periode-pemakaian-obat-all-unit').html('Periode : ' + data.periode);
					$('#pagination-05').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-05').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-pemakaian-obat-all-unit, #table-lap-pemakaian-obat-all-unit tbody').show()
					$('#table-lap-pemakaian-obat-all-unit tbody').empty();
					$('#table-lap-pemakaian-obat-all-unit tfoot').empty();

					$.each(data.data, function(i, v) {
						
						let periode = '';
						if ($('#jenis-periode-pemakaian-obat-all-unit').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-pemakaian-obat-all-unit').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-pemakaian-obat-all-unit').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.kode_barang}</td>
								<td class="left">${v.nama_barang}</td>
								<td class="center">${v.kepemilikan}</td>
								<td class="center">${number_format(v.igd, 0, ',', '.')}</td>
								<td class="center">${number_format(v.ok, 0, ',', '.')}</td>
								<td class="center">${number_format(v.rj, 0, ',', '.')}</td>
								<td class="center">${number_format(v.ri, 0, ',', '.')}</td>
								<td class="center">${number_format(v.total, 0, ',', '.')}</td>
								<td class="right">${number_format(v.nilai, 2, ',', '.')}</td>
							</tr>`;

						$('#table-lap-pemakaian-obat-all-unit tbody').append(html);
					})

					// $.each(data.sum_total, function(i, v) {
						let html = /* html */ `
								<tr>
									<td colspan="7" class="right"><b>Total QTY</b></td>
									<td class="right"><b>${number_format(data.qty_total, 0, ',', '.')} &ensp;</b></td>
									<td class="right"><b>Total Harga</b></td>
									<td class="right"><b>Rp. ${number_format(data.nilai_total, 2, ',', '.')} &ensp;</b></td>
								</tr>
							`;

						$('#table-lap-pemakaian-obat-all-unit tfoot').append(html);
					// })
				},
				complete: function() {
					hideLoader()
					$('#pemakaian-obat-all-unit-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	$('#barang_search_05').select2({
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
</script>