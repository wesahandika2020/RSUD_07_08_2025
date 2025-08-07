<!-- Modal Search -->
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div id="pemakaian-logistik-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="pemakaian-logistik-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="pemakaian-logistik-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-pemakaian-logistik role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-pemakaian" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-pemakaian name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-pemakaian form-group row tight">
					<label for="bulan-pemakaian" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-pemakaian class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-pemakaian" class="form-control">
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
					<label for="tanggal-awal-pemakaian" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-pemakaian" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-pemakaian" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-pemakaian form-group row tight">
					<label for="tanggal-harian-pemakaian" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-pemakaian" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-pemakaian" class="col-3 col-form-label">Unit Tujuan</label>
					<div class="col">
						<!--?= form_dropdown('unit_depo_07', $unit_all, array(), 'id=unit-pemakaian class=form-control') ?-->
						<input type="text" name="unit" id="unit-pemakaian" class="select2-input" placeholder="Semua Unit...">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kategori-kel" class="col-md-3 col-form-label">Kategori</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori-pemakaian class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang-pemakaian-logistik" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang" id="barang-pemakaian-logistik" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPemakaianLogistik(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	var baseUrl = '<?= base_url('laporan_inventori_logistik/api/laporan_inventori_logistik') ?>';

	// Format Tanggal
	$('#tanggal-awal-pemakaian, #tanggal-akhir-pemakaian, #tanggal-harian-pemakaian').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-pemakaian').change(function() {
		if ($('#periode-laporan-pemakaian').val() == 'Bulanan') {
			$('.bulanan-pemakaian, #bulan-pemakaian, #tahun-pemakaian').show();
			$('.harian-pemakaian, .rentang-waktu, #tanggal-awal-pemakaian, #tanggal-akhir-pemakaian').hide();
		}
		if ($('#periode-laporan-pemakaian').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-pemakaian, #tanggal-akhir-pemakaian').show();
			$('.harian-pemakaian, #tanggal-harian-pemakaian, .bulanan-pemakaian, #bulan-pemakaian, #tahun-pemakaian').hide();
		}
		if ($('#periode-laporan-pemakaian').val() == 'Harian') {
			$('.harian-pemakaian, #tanggal-harian-pemakaian').show();
			$('.bulanan-pemakaian, .rentang-waktu').hide();
		}
	});

	function resetFormPemakaianlogistik() {
		<?php date_default_timezone_set('Asia/Jakarta'); ?>
		$('#periode-laporan-pemakaian').val('Bulanan')
		$('#bulan-pemakaian').val('<?= date('m') ?>')
		$('#tahun-pemakaian').val('<?= date('Y') ?>')
		$('.bulanan-pemakaian, #tahun-pemakaian, #bulan-pemakaian').show()
		$('#tanggal-awal-pemakaian, #tanggal-akhir-pemakaian, #tanggal-harian-pemakaian').val('<?= date('d/m/Y') ?>')

		$('#kategori-pemakaian, #jenis-pasien').val('')
		$('.harian-pemakaian, #tanggal-harian-pemakaian, .rentang-waktu-pemakaian').hide()
	}

	function getLaporanPemakaianLogistik(page) {
		//Laporan
		$('#page-now').val(page)
		$('#pemakaian-logistik-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "5") {
			$('.lap-pemakaian-logistik, #table-lap-pemakaian-logistik tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventori_logistik/api/laporan_inventori_logistik/get_list_laporan_pemakaian') ?>/page/' + page + '/jenis/',
				data: $('#form-search-pemakaian-logistik').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPemakaianLogistik(page - 1);
						return false;
					}

					$('#jenis-periode-pemakaian-logistik').html('Periode : ' + data.periode);
					$('#pagination-pemakaian').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-pemakaian').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-pemakaian-logistik, #table-lap-pemakaian-logistik tbody').show()
					$('#table-lap-pemakaian-logistik tbody').empty();

					$.each(data.data, function(i, v) {

						let periode = '';
						if ($('#jenis-periode-pemakaian-logistik').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-pemakaian-logistik').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-pemakaian-logistik').val() == 'Rentang Waktu') {
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

						$('#table-lap-pemakaian-logistik tbody').append(html);
					})
				},
				complete: function() {
					hideLoader()
					$('#pemakaian-logistik-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	$('#barang-pemakaian-logistik').select2({
		ajax: {
			url: "<?= base_url('laporan_inventori_logistik/api/laporan_inventori_logistik/barang_non_kategori') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
					jenissppb: $('#kategori-pemakaian').val()
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
			return data.nama + ' ' + ((data.kekuatan !== null) ? data.kekuatan : '') + ' ' + data.satuan_kekuatan;
		}
	})

	$('#unit-pemakaian').select2({
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