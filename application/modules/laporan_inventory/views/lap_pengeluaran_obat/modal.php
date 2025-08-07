<!-- Modal Search -->
<div id="pengeluaran-obat-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="pengeluaran-obat-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="pengeluaran-obat-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-pengeluaran-obat role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-06" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-06 name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-06 form-group row tight">
					<label for="bulan-06" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-06 class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-06" class="form-control">
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
					<label for="tanggal-awal-06" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-06" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-06" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-06 form-group row tight">
					<label for="tanggal-harian-06" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-06" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-depo-06" class="col-3 col-form-label">Unit Tujuan</label>
					<div class="col">
						<input type="text" name="unit_depo_06" id="unit-depo-06" class="select2-input" placeholder="Semua Unit...">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang_search_06" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang_search_06" id="barang_search_06" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPengeluaranObat(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-06, #tanggal-akhir-06, #tanggal-harian-06').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-06').change(function() {
		if ($('#periode-laporan-06').val() == 'Bulanan') {
			$('.bulanan-06, #bulan-06, #tahun-06').show();
			$('.harian-06, .rentang-waktu, #tanggal-awal-06, #tanggal-akhir-06').hide();
		}
		if ($('#periode-laporan-06').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-06, #tanggal-akhir-06').show();
			$('.harian-06, #tanggal-harian-06, .bulanan-06, #bulan-06, #tahun-06').hide();
		}
		if ($('#periode-laporan-06').val() == 'Harian') {
			$('.harian-06, #tanggal-harian-06').show();
			$('.bulanan-06, .rentang-waktu').hide();
		}
	});

		$('#unit-depo-06').select2({
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

	function resetForm_06() {
		$('#periode-laporan-06').val('Bulanan')
		$('#bulan-06').val('<?= date('m') ?>')
		$('#tahun-06').val('<?= date('Y') ?>')
		$('.bulanan-06, #tahun-06, #bulan-06').show()
		$('#tanggal-awal-06, #tanggal-akhir-06, #tanggal-harian-06').val('<?= date('d/m/Y') ?>')

		$('#kategori-06, #jenis-pasien, #unit-depo-06').val('')
		$('.harian-06, #tanggal-harian-06, .rentang-waktu-06').hide()
		$('#unit-depo-06').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-depo-06 a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
	}

	function getLaporanPengeluaranObat(page) {
		//Laporan 01
		$('#page-now').val(page)
		$('#pengeluaran-obat-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "6") {
			$('.lap-pengeluaran-obat, #table-lap-pengeluaran-obat tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventory/api/laporan_inventory/get_list_laporan_inventory_06') ?>/page/' + page + '/jenis/',
				data: $('#form-search-pengeluaran-obat').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPengeluaranObat(page - 1);
						return false;
					}

					$('#jenis-periode-pengeluaran-obat').html('Periode : ' + data.periode);
					$('#pagination-06').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-06').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-pengeluaran-obat, #table-lap-pengeluaran-obat tbody').show()
					$('#table-lap-pengeluaran-obat tbody').empty();
					$('#table-lap-pengeluaran-obat tfoot').empty();

					let distribusi_terakhir = "";
					let no = 1;
					$.each(data.data, function(i, v) {
						distribusi_sekarang = v.id_distribusi;
						if (distribusi_terakhir == distribusi_sekarang) {
							no_urut = "";
							tanggal_dikirim = "";
							no_kirim = "";
							unit = "";
							unit_asal = "";
						} else {
							no_urut = (no++);
							tanggal_dikirim = v.tanggal_dikirim;
							no_kirim = v.no_kirim;
							unit = v.unit;
							unit_asal = v.unit_asal;
						}
						distribusi_terakhir = distribusi_sekarang;

						let periode = '';
						if ($('#jenis-periode-pengeluaran-obat').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-pengeluaran-obat').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-pengeluaran-obat').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ `
							<tr>
								<td class="center">${no_urut}</td>
								<td class="center">${tanggal_dikirim}</td>
								<td class="center">${no_kirim}</td>
								<td class="center">${unit_asal}</td>
								<td class="center">${unit}</td>
								<td class="center">${v.kode}</td>
								<td class="left">${v.obat}</td>
								<td class="center">${v.kepemilikan}</td>
								<td class="center">${number_format(v.qty, 0, ',', '.')}</td>
								<td class="right">${number_format(v.total, 0, ',', '.')}</td>
							</tr>`;

						$('#table-lap-pengeluaran-obat tbody').append(html);
					})

					// $.each(data.sum_total, function(i, v) {
					let html = /* html */ `
								<tr>
									<td colspan="7" class="right"><h5><b>Sub Total</b></h5></td>
									<td colspan="2" class="center"><h5><b>${number_format(data.sub_total, 0, ',', '.')}</b></h5></td>
								</tr>
							`;

					$('#table-lap-pengeluaran-obat tfoot').append(html);
					// })
				},
				complete: function() {
					hideLoader()
					$('#pengeluaran-obat-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	$('#barang_search_06').select2({
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