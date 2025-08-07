<!-- Modal Search -->
<div id="pemakaian-obat-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="pemakaian-obat-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="pemakaian-obat-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-pemakaian-obat role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-04" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-04 name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-04 form-group row tight">
					<label for="bulan-04" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-04 class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-04" class="form-control">
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
					<label for="tanggal-awal-04" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-04" autocomplete="off" class="form-control">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-04" autocomplete="off" class="form-control">
					</div>
				</div>
				<div class="harian-04 form-group row tight">
					<label for="tanggal-harian-04" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-04" autocomplete="off" class="form-control">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-depo" class="col-3 col-form-label">Unit</label>
					<div class="col">
						<?= form_dropdown('unit_depo', $unit, array(), 'id=unit-depo class=form-control') ?>
						<!-- <input type="text" name="unit" id="unit-depo" class="select2-input" placeholder="Semua Unit..."> -->
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang_search_04" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang_search_04" id="barang_search_04" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kategori-04" class="col-md-3 col-form-label">Kategori Obat</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori-04 class=form-control') ?>
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
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPemakaianObat(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-04, #tanggal-akhir-04, #tanggal-harian-04').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-04').change(function() {
		if ($('#periode-laporan-04').val() == 'Bulanan') {
			$('.bulanan-04, #bulan-04, #tahun-04').show();
			$('.harian-04, .rentang-waktu, #tanggal-awal-04, #tanggal-akhir-04').hide();
		}
		if ($('#periode-laporan-04').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-04, #tanggal-akhir-04').show();
			$('.harian-04, #tanggal-harian-04, .bulanan-04, #bulan-04, #tahun-04').hide();
		}
		if ($('#periode-laporan-04').val() == 'Harian') {
			$('.harian-04, #tanggal-harian-04').show();
			$('.bulanan-04, .rentang-waktu').hide();
		}
	});

	function resetForm_04() {
		$('#periode-laporan-04').val('Bulanan')
		$('#bulan-04').val('<?= date('m') ?>')
		$('#tahun-04').val('<?= date('Y') ?>')
		$('.bulanan-04, #tahun-04, #bulan-04').show()
		$('#tanggal-awal-04, #tanggal-akhir-04, #tanggal-harian-04').val('<?= date('d/m/Y') ?>')

		$('#kategori-04, #jenis-pasien').val('')
		$('.harian-04, #tanggal-harian-04, .rentang-waktu-04').hide()
	}

	function getLaporanPemakaianObat(page) {
		//Laporan 01
		$('#page-now').val(page)
		$('#pemakaian-obat-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "4") {
			$('.lap-pemakaian-obat, #table-lap-pemakaian-obat tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventory/api/laporan_inventory/get_list_laporan_inventory_04') ?>/page/' + page + '/jenis/',
				data: $('#form-search-pemakaian-obat').serialize(),
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

					$('#jenis-periode-pemakaian-obat').html('Periode : ' + data.periode);
					$('#pagination-04').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-04').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-pemakaian-obat, #table-lap-pemakaian-obat tbody').show()
					$('#table-lap-pemakaian-obat tbody').empty();
					$('#table-lap-pemakaian-obat tfoot').empty();

					$.each(data.data, function(i, v) {
						
						let periode = '';
						if ($('#jenis-periode-pemakaian-obat').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-pemakaian-obat').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-pemakaian-obat').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.kode_barang}</td>
								<td class="left">${v.nama_barang}</td>
								<td class="center">${v.kepemilikan}</td>
								<td class="center">${number_format(v.qty, 0, ',', '.')}</td>
								<td class="right">${number_format(v.harga_satuan, 0, ',', '.')}</td>
								<td class="right">${number_format(v.nilai, 2, ',', '.')}</td>
							</tr>`;

						$('#table-lap-pemakaian-obat tbody').append(html);
					})

					// $.each(data.sum_total, function(i, v) {
						let html = /* html */ `
								<tr>
									<td colspan="4" class="right"><h6><b>Total QTY</b></h6></td>
									<td class="right"><h6><b>${number_format(data.qty_total, 0, ',', '.')} &ensp;</b></h6></td>
									<td class="right"><h6><b>Total Harga</b></h6></td>
									<td class="right"><h6><b>Rp. ${number_format(data.nilai_total, 2, ',', '.')} &ensp;</b></h6></td>
								</tr>
							`;

						$('#table-lap-pemakaian-obat tfoot').append(html);
					// })
				},
				complete: function() {
					hideLoader()
					$('#pemakaian-obat-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	$('#barang_search_04').select2({
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