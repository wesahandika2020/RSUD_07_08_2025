<!-- Modal Search -->
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div id="permintaan-gizi-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="permintaan-gizi-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="permintaan-gizi-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-permintaan-gizi role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-permintaan" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-permintaan name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-permintaan form-group row tight">
					<label for="bulan-permintaan" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-permintaan class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-permintaan" class="form-control">
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
					<label for="tanggal-awal-permintaan" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-permintaan" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-permintaan" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-permintaan form-group row tight">
					<label for="tanggal-harian-permintaan" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-permintaan" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-permintaan" class="col-3 col-form-label">Unit Tujuan</label>
					<div class="col">
						<!--?= form_dropdown('unit_depo_07', $unit_all, array(), 'id=unit-permintaan class=form-control') ?-->
						<input type="text" name="unit" id="unit-permintaan" class="select2-input" placeholder="Semua Unit...">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kategori-kel" class="col-md-3 col-form-label">Kategori</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori-permintaan class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang-search-gizi" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang" id="barang-search-gizi" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPermintaanGizi(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	var baseUrl = '<?= base_url('laporan_inventori_gizi/api/laporan_inventori_gizi') ?>';

	// Format Tanggal
	$('#tanggal-awal-permintaan, #tanggal-akhir-permintaan, #tanggal-harian-permintaan').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-permintaan').change(function() {
		if ($('#periode-laporan-permintaan').val() == 'Bulanan') {
			$('.bulanan-permintaan, #bulan-permintaan, #tahun-permintaan').show();
			$('.harian-permintaan, .rentang-waktu, #tanggal-awal-permintaan, #tanggal-akhir-permintaan').hide();
		}
		if ($('#periode-laporan-permintaan').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-permintaan, #tanggal-akhir-permintaan').show();
			$('.harian-permintaan, #tanggal-harian-permintaan, .bulanan-permintaan, #bulan-permintaan, #tahun-permintaan').hide();
		}
		if ($('#periode-laporan-permintaan').val() == 'Harian') {
			$('.harian-permintaan, #tanggal-harian-permintaan').show();
			$('.bulanan-permintaan, .rentang-waktu').hide();
		}
	});

	function resetFormPermintaangizi() {
		<?php date_default_timezone_set('Asia/Jakarta'); ?>
		$('#periode-laporan-permintaan').val('Bulanan')
		$('#bulan-permintaan').val('<?= date('m') ?>')
		$('#tahun-permintaan').val('<?= date('Y') ?>')
		$('.bulanan-permintaan, #tahun-permintaan, #bulan-permintaan').show()
		$('#tanggal-awal-permintaan, #tanggal-akhir-permintaan, #tanggal-harian-permintaan').val('<?= date('d/m/Y') ?>')

		$('#kategori-permintaan, #jenis-pasien').val('')
		$('.harian-permintaan, #tanggal-harian-permintaan, .rentang-waktu-permintaan').hide()
	}

	function getLaporanPermintaanGizi(page) {
		//Laporan 01
		$('#page-now').val(page)
		$('#permintaan-gizi-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "4") {
			$('.lap-permintaan-gizi, #table-lap-permintaan-gizi tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventori_gizi/api/laporan_inventori_gizi/get_list_laporan_permintaan') ?>/page/' + page + '/jenis/',
				data: $('#form-search-permintaan-gizi').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPermintaanGizi(page - 1);
						return false;
					}

					$('#jenis-periode-permintaan-gizi').html('Periode : ' + data.periode);
					$('#pagination-permintaan').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-permintaan').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-permintaan-gizi, #table-lap-permintaan-gizi tbody').show()
					$('#table-lap-permintaan-gizi tbody').empty();

					$.each(data.data, function(i, v) {

						let periode = '';
						if ($('#jenis-periode-permintaan-gizi').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-permintaan-gizi').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-permintaan-gizi').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.kode}</td>
								<td class="left">${v.nama_barang}</td>
								<td class="center">${v.satuan}</td>
								<td class="center">${v.kategori}</td>
								<td class="center">${number_format(v.qty_minta, 0, ',', '.')}</td>
								<td class="center">${number_format(v.qty_kirim, 0, ',', '.')}</td>
								<td class="right">${number_format(v.harga_satuan, 0, ',', '.')}</td>
								<td class="right">${number_format(v.total, 0, ',', '.')}</td>
							</tr>`;

						$('#table-lap-permintaan-gizi tbody').append(html);
					})
				},
				complete: function() {
					hideLoader()
					$('#permintaan-gizi-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	$('#barang-search-gizi').select2({
		ajax: {
			url: "<?= base_url('laporan_inventori_gizi/api/laporan_inventori_gizi/barang_pembelian') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
					jenissppb: $('#kategori-permintaan').val()
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
			return data.nama + ' ' + ((data.kekuatan !== null) ? data.kekuatan : '') + ' ' + ((data.satuan_kekuatan !== null) ? data.satuan_kekuatan : '');
		}
	})

	$('#unit-permintaan').select2({
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