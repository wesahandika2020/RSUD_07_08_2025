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
					<label for="kategori" class="col-md-3 col-form-label">Kategori</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori class=form-control') ?>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanInventori(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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

	function resetForm_gizi() {
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

	function getLaporanInventori(page) {
		//Laporan 01
		$('#page-now').val(page)
		openData();

		if ($('#jenis-laporan').val() == "1") {
			$('.lap-mutasi-gizi, #table-lap-mutasi-gizi tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventori_gizi/api/laporan_inventori_gizi/get_list_laporan_mutasi') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanInventori(page - 1);
						return false;
					}

					$('#jenis-periode').html('Periode : ' + data.periode);
					$('#pagination01').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary01').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-mutasi-gizi, #table-lap-mutasi-gizi tbody').show()
					$('#table-lap-mutasi-gizi tbody').empty();
					$('#table-lap-mutasi-gizi tfoot').empty();

					let TotalSaldoAwalRP = 0;
					let TotalPenerimaanRP = 0;
					let TotalPengeluaranRP = 0;
					let TotalSaldoAkhirRP = 0;
					
					$.each(data.data, function (i, v) {
						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="left">${v.kategori}</td>
								<td class="left">${v.kode_barang}</td>
								<td class="left">${v.nama_barang}</td>
								<td class="left">${v.satuan || ''}</td>
								<td class="center">${number_format(v.harga_satuan, 0, ',', '.')}</td>
								<td class="center">${number_format(v.saldo_awal_unit, 0, ',', '.')}</td>
								<td class="center saldo-awal-rp">${number_format(v.saldo_awal_rp, 0, ',', '.')}</td>
								<td class="center">${number_format(v.penerimaan_unit, 0, ',', '.')}</td>
								<td class="center penerimaan-rp">${number_format(v.penerimaan_rp, 0, ',', '.')}</td>
								<td class="center">${number_format(v.pengeluaran_unit, 0, ',', '.')}</td>
								<td class="center pengeluaran-rp">${number_format(v.pengeluaran_rp, 0, ',', '.')}</td>
								<td class="center">${number_format(v.saldo_akhir_unit, 0, ',', '.')}</td>
								<td class="center saldo-akhir-rp">${number_format(v.saldo_akhir_rp, 0, ',', '.')}</td>
								<td class="left">${v.keterangan}</td>
							</tr>
						`;
						$('#table-lap-mutasi-gizi tbody').append(html);
					});


					// Hitung total saldo awal, penerimaan, pengeluaran, dan saldo akhir berdasarkan kolom tabel
					$('#table-lap-mutasi-gizi tbody tr').each(function () {
						const saldoAwalRP = parseInt($(this).find('.saldo-awal-rp').text().replace(/\./g, '')) || 0;
						const penerimaanRP = parseInt($(this).find('.penerimaan-rp').text().replace(/\./g, '')) || 0;
						const pengeluaranRP = parseInt($(this).find('.pengeluaran-rp').text().replace(/\./g, '')) || 0;
						const saldoAkhirRP = parseInt($(this).find('.saldo-akhir-rp').text().replace(/\./g, '')) || 0;

						TotalSaldoAwalRP += saldoAwalRP;
						TotalPenerimaanRP += penerimaanRP;
						TotalPengeluaranRP += pengeluaranRP;
						TotalSaldoAkhirRP += saldoAkhirRP;
					});

					// Tambahkan total di bagian footer
					let html2 = /* html */ `
						<tr>
							<th class="center" colspan="7">Jumlah</th>
							<th class="center">${number_format(TotalSaldoAwalRP, 0, ',', '.')}</th>
							<th class="center"></th>
							<th class="center">${number_format(TotalPenerimaanRP, 0, ',', '.')}</th>
							<th class="center"></th>
							<th class="center">${number_format(TotalPengeluaranRP, 0, ',', '.')}</th>
							<th class="center"></th>
							<th class="center">${number_format(TotalSaldoAkhirRP, 0, ',', '.')}</th>
							<th></th>
						</tr>
					`;
					$('#table-lap-mutasi-gizi tfoot').html(html2);
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