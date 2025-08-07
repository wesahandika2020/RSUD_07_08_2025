<!-- Modal Search -->
<div id="modal-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan form-group row tight">
					<label for="bulan" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
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
				<div class="rentang-waktu form-group row tight">
					<label for="tanggal-awal" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian form-group row tight">
					<label for="tanggal-harian" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-search" class="col-3 col-form-label">Unit</label>
					<div class="col">
						<input type="text" name="unit" id="unit-search" class="select2-input" placeholder="Semua Unit...">
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
					<label for="kategori" class="col-md-3 col-form-label">Kategori</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori class=form-control') ?>
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
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanInventory(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan').change(function() {
		if ($('#periode-laporan').val() == 'Bulanan') {
			$('.bulanan, #bulan, #tahun').show();
			$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
		}
		if ($('#periode-laporan').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show();
			$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide();
		}
		if ($('#periode-laporan').val() == 'Harian') {
			$('.harian, #tanggal-harian').show();
			$('.bulanan, .rentang-waktu').hide();
		}
	});

	$('#unit-search').select2({
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

	function resetForm_01() {
		$('#periode-laporan').val('Bulanan')
		$('#bulan').val('<?= date('m') ?>')
		$('#tahun').val('<?= date('Y') ?>')
		$('.bulanan, #tahun, #bulan').show()
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>')
		$('#golongan, #jenis, #kategori, #unit-search, #fornas', '#generik').val('')
		$('#unit-search').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		$('.harian, #tanggal-harian, .rentang-waktu').hide()
	}

	function getLaporanInventory(page) {
		//Laporan 01
		$('#page-now').val(page)
		openData();

		if ($('#jenis-laporan').val() == "1") {
			$('.lap-mutasi-obat, #table-lap-mutasi-obat tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventory/api/laporan_inventory/get_list_laporan_inventory_01') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanInventory(page - 1);
						return false;
					}

					$('#jenis-periode').html('Periode : ' + data.periode);
					$('#pagination01').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary01').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-mutasi-obat, #table-lap-mutasi-obat tbody').show()
					$('#table-lap-mutasi-obat tbody').empty();
					$('#table-lap-mutasi-obat tfoot').empty();

					let TotalSaldoAwal = 0;
					let TotalSaldoAkhir = 0;
					$.each(data.data, function(i, v) {
						TotalSaldoAwal += parseInt(v.harga_satuan * v.awal);
						TotalSaldoAkhir += parseInt(v.harga_satuan * v.sisa);

						let periode = '';
						if ($('#periode-laporan').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#periode-laporan').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#periode-laporan').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="left">${v.nama_barang}</td>
								<td class="center">${v.kategori}</td>
								<td class="center">JPKMKT</td>
								<td class="center">${number_format(v.awal, 0, ',', '.')}</td>
								<td class="right">${number_format(v.harga_satuan*v.awal, 0, ',', '.')} &ensp;</td>
								<td class="center">${number_format(v.masuk_pbf, 0, ',', '.')}</td>
								<td class="center">${number_format(v.masuk_unit, 0, ',', '.')}</td>
								<td class="center">${number_format(v.masuk_retur, 0, ',', '.')}</td>
								<td class="center">${number_format(v.keluar_jual, 0, ',', '.')}</td>
								<td class="center">${number_format(v.keluar_unit, 0, ',', '.')}</td>
								<td class="center">${number_format(v.keluar_retur, 0, ',', '.')}</td>
								<td class="center">${number_format(v.keluar_hapus, 0, ',', '.')}</td>
								<td class="center">${number_format(v.adj_koreksi, 0, ',', '.')}</td>
								<td class="center">${number_format(v.sisa, 0, ',', '.')}</td>
								<td class="right">${number_format(v.harga_satuan*v.sisa, 0, ',', '.')} &ensp;</td>
							</tr>
						`;

						$('#table-lap-mutasi-obat tbody').append(html);
					})

					let html = /* html */ `
						<tr>
							<td colspan="4" class="right"><h6><b>Total Saldo Awal</b></h6></td>
							<td colspan="2" class="right"><h6><b>${number_format(TotalSaldoAwal, 0, ',', '.')} &ensp;</b></h6></td>
							<td colspan="8" class="right"><h6><b>Total Saldo Akhir</b></h6></td>
							<td colspan="2" class="right"><h6><b>${number_format(TotalSaldoAkhir, 0, ',', '.')} &ensp;</b></h6></td>
						</tr>
					`;

					$('#table-lap-mutasi-obat tfoot').append(html);
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}
</script>