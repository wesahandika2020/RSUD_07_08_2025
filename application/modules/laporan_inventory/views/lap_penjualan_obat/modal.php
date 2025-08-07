<!-- Modal Search -->
<div id="penjualan-obat-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="penjualan-obat-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="penjualan-obat-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-penjualan-obat role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-03" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-03 name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-03 form-group row tight">
					<label for="bulan-03" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-03 class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-03" class="form-control">
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
					<label for="tanggal-awal-03" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-03" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-03" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-03 form-group row tight">
					<label for="tanggal-harian-03" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-03" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
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
					<label for="kategori-03" class="col-md-3 col-form-label">Kategori Obat</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori-03 class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="jenis-pasien" class="col-md-3 col-form-label">Jenis Pasien</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_pasien', $jenis_pasien, array(), 'id=jenis-pasien class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="jaminan" class="col-md-3 col-form-label">Jaminan</label>
					<div class="col-md-9">
						<?= form_dropdown('jaminan', $jaminan, array(), 'id=jaminan class=form-control') ?>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPenjualanObat(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-03, #tanggal-akhir-03, #tanggal-harian-03').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-03').change(function() {
		if ($('#periode-laporan-03').val() == 'Bulanan') {
			$('.bulanan-03, #bulan-03, #tahun-03').show();
			$('.harian-03, .rentang-waktu, #tanggal-awal-03, #tanggal-akhir-03').hide();
		}
		if ($('#periode-laporan-03').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-03, #tanggal-akhir-03').show();
			$('.harian-03, #tanggal-harian-03, .bulanan-03, #bulan-03, #tahun-03').hide();
		}
		if ($('#periode-laporan-03').val() == 'Harian') {
			$('.harian-03, #tanggal-harian-03').show();
			$('.bulanan-03, .rentang-waktu').hide();
		}
	});

	function resetForm_03() {
		$('#periode-laporan-03').val('Bulanan')
		$('#bulan-03').val('<?= date('m') ?>')
		$('#tahun-03').val('<?= date('Y') ?>')
		$('.bulanan-03, #tahun-03, #bulan-03').show()
		$('#tanggal-awal-03, #tanggal-akhir-03, #tanggal-harian-03').val('<?= date('d/m/Y') ?>')

		$('#kategori-03, #jenis-pasien').val('')
		$('.harian-03, #tanggal-harian-03, .rentang-waktu-03').hide()
	}

	function getLaporanPenjualanObat(page) {
		//Laporan 01
		$('#page-now').val(page)
		$('#penjualan-obat-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "3") {
			$('.lap-penjualan-obat, #table-lap-penjualan-obat tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventory/api/laporan_inventory/get_list_laporan_inventory_03') ?>/page/' + page + '/jenis/',
				data: $('#form-search-penjualan-obat').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPenjualanObat(page - 1);
						return false;
					}

					$('#jenis-periode-penjualan-obat').html('Periode : ' + data.periode);
					$('#pagination-03').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-03').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-penjualan-obat, #table-lap-penjualan-obat tbody').show()
					$('#table-lap-penjualan-obat tbody').empty();
					$('#table-lap-penjualan-obat tfoot').empty();

					$.each(data.data, function(i, v) {
						let periode = '';
						if ($('#jenis-periode-penjualan-obat').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-penjualan-obat').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-penjualan-obat').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ ``;
						$.each(v.resep, function(index, val) {
							if (index <= 0) {
								html += `
								<tr>
									<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
									<td class="center">${v.tanggal_transaksi}</td>
									<td class="center">${v.no_penjualan}</td>
									<td class="center">${val.no_resep}</td>
									<td class="center">${val.no_rm}</td>
									<td class="left">${val.nama_pasien}</td>
									<td class="center">${val.cara_bayar}</td>
									<td class="center">${val.kso}</td>
									<td class="center">${(val.ruangan == null ? 'INSTALASI GAWAT DARURAT' : val.ruangan)}</td>
									<td class="right">${number_format(val.netto, 2, ',', '.')}</td>
									<td class="right">${number_format(val.total, 2, ',', '.')}</td>
									<td class="center"><button type="button" class="btn btn-secondary btn-xs" onclick="cetakDetail(${val.no_resep}, 1)"><i class="fas fa-eye mr-1"></i></button></td>
								</tr>`;
							}
						})
						$('#table-lap-penjualan-obat tbody').append(html);
					})
				},
				complete: function() {
					hideLoader()
					$('#penjualan-obat-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	function cetakDetail(no_resep, pengambilan_ke) {
		let wWidth = $(window).width();
		let dWidth = wWidth * 1;
		let wHeight = $(window).height();
		let dHeight = wHeight * 1;
		let x = screen.width / 2 - dWidth / 2;
		let y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('resep/printing_bukti_pelayanan_obat') ?>/' + no_resep + '/' + pengambilan_ke, 'Cetak Bukti Resep Rawat Jalan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}
</script>