<!-- Modal Search -->
<div id="permintaan-takterlayani-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="permintaan-takterlayani-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="permintaan-takterlayani-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-permintaan-takterlayani role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-09" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-09 name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-09 form-group row tight">
					<label for="bulan-09" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-09 class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-09" class="form-control">
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
					<label for="tanggal-awal-09" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-09" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-09" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-09 form-group row tight">
					<label for="tanggal-harian-09" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-09" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-tujuan" class="col-3 col-form-label">Unit Tujuan</label>
					<div class="col">
						<?= form_dropdown('unit_tujuan', $unit_all, array(), 'id=unit-tujuan class=form-control') ?>
						<!-- <input type="text" name="unit_depo_09" id="unit-tujuan" class="select2-input" placeholder="Semua Unit..."> -->
					</div>
				</div>
				<div class="form-group row tight">
					<label for="dari-unit" class="col-3 col-form-label">Dari Unit</label>
					<div class="col">
						<!--?= form_dropdown('unit_depo_09', $unit_all, array(), 'id=dari-unit class=form-control') ?-->
						<input type="text" name="dari_unit" id="dari-unit" class="select2-input" placeholder="Semua Unit...">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang_search_09" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang_search_09" id="barang_search_09" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPermintaanTakTerlayani(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-09, #tanggal-akhir-09, #tanggal-harian-09').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-09').change(function() {
		if ($('#periode-laporan-09').val() == 'Bulanan') {
			$('.bulanan-09, #bulan-09, #tahun-09').show();
			$('.harian-09, .rentang-waktu, #tanggal-awal-09, #tanggal-akhir-09').hide();
		}
		if ($('#periode-laporan-09').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-09, #tanggal-akhir-09').show();
			$('.harian-09, #tanggal-harian-09, .bulanan-09, #bulan-09, #tahun-09').hide();
		}
		if ($('#periode-laporan-09').val() == 'Harian') {
			$('.harian-09, #tanggal-harian-09').show();
			$('.bulanan-09, .rentang-waktu').hide();
		}
	});

	// $('#unit-tujuan').select('Depo Farmasi IGD')
	// $('#unit-tujuan').change(function() {
	// });

	function resetForm_09() {
		$('#periode-laporan-09').val('Bulanan')
		$('#bulan-09').val('<?= date('m') ?>')
		$('#tahun-09').val('<?= date('Y') ?>')
		$('.bulanan-09, #tahun-09, #bulan-09').show()
		$('#tanggal-awal-09, #tanggal-akhir-09, #tanggal-harian-09').val('<?= date('d/m/Y') ?>')

		$('#unit-tujuan').val('304')
		$('#kategori-09, #jenis-pasien, #dari-unit').val('')
		$('.harian-09, #tanggal-harian-09, .rentang-waktu-09').hide()
	}

	function getLaporanPermintaanTakTerlayani(page) {
		//Laporan 01
		$('#page-now').val(page)
		$('#permintaan-takterlayani-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "9") {
			$('.lap-permintaan-takterlayani, #table-lap-permintaan-takterlayani tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventory/api/laporan_inventory/get_list_laporan_inventory_09') ?>/page/' + page + '/jenis/',
				data: $('#form-search-permintaan-takterlayani').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPermintaanTakTerlayani(page - 1);
						return false;
					}

					let label =
						'<h5 style="text-transform: uppercase;"><b>LAPORAN PERMINTAAN OBAT TAK TERLAYANI</b></h5>' +
						'<p>Unit Tujuan : ' + data.unit_tujuan + '</p>' +
						'<p>Dari Unit : ' + data.dari_unit + '</p>' +
						'<p>Periode : ' + data.periode + '</p>';

					$('#label-permintaan-takterlayani').html(label);
					// $('#jenis-periode-permintaan-takterlayani').html('Periode : ' + data.periode);
					$('#pagination-09').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-09').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-permintaan-takterlayani, #table-lap-permintaan-takterlayani tbody').show()
					$('#table-lap-permintaan-takterlayani tbody').empty();

					$.each(data.data, function(i, v) {

						let periode = '';
						if ($('#jenis-periode-permintaan-takterlayani').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-permintaan-takterlayani').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-permintaan-takterlayani').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.tanggal}</td>
								<td class="center">${v.no_permintaan}</td>
								<td class="center">${v.unit}</td>
								<td class="center">${v.kode_obat}</td>
								<td class="left">${v.nama_obat}</td>
								<td class="center">${v.kepemilikan}</td>
								<td class="center">${number_format(v.qty_minta, 0, ',', '.')}</td>
								<td class="center">${number_format(v.qty_terima, 0, ',', '.')}</td>
								<td class="center">${number_format(v.qty_sisa, 0, ',', '.')}</td>
								<td class="center">${v.status}</td>
							</tr>`;

						$('#table-lap-permintaan-takterlayani tbody').append(html);
					})
				},
				complete: function() {
					hideLoader()
					$('#permintaan-takterlayani-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	$('#barang_search_09').select2({
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

	$('#dari-unit').select2({
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