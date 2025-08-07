<!-- Modal Search -->
<div id="pengeluaran-logistik-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="pengeluaran-logistik-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="pengeluaran-logistik-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-pengeluaran-logistik role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-kel" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-kel name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-kel form-group row tight">
					<label for="bulan-kel" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-kel class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-kel" class="form-control">
							<?php 
							date_default_timezone_set('Asia/Jakarta');
							$tg_awal = date('Y') - 5;
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
					<label for="tanggal-awal-kel" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-kel" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-kel" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-kel form-group row tight">
					<label for="tanggal-harian-kel" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-kel" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-depo-kel" class="col-3 col-form-label">Unit Tujuan</label>
					<div class="col">
						<input type="text" name="unit_pengeluaran" id="unit-depo-kel" class="select2-input" placeholder="Semua Unit...">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="pembayaran_pengeluaran" class="col-3 col-form-label">Pembayaran</label>
					<div class="col-md-9">
						<?= form_dropdown('pembayaran_pengeluaran', $pembayaran, array(), 'id=pembayaran_pengeluaran class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kategori-kel" class="col-md-3 col-form-label">Kategori</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori-kel class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang-search-kel" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang_search_pengeluaran" id="barang-search-kel" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPengeluaranLogistik(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	
	$('#tanggal-awal-kel, #tanggal-akhir-kel, #tanggal-harian-kel').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-kel').change(function() {
		if ($('#periode-laporan-kel').val() == 'Bulanan') {
			$('.bulanan-kel, #bulan-kel, #tahun-kel').show();
			$('.harian-kel, .rentang-waktu, #tanggal-awal-kel, #tanggal-akhir-kel').hide();
		}
		if ($('#periode-laporan-kel').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-kel, #tanggal-akhir-kel').show();
			$('.harian-kel, #tanggal-harian-kel, .bulanan-kel, #bulan-kel, #tahun-kel').hide();
		}
		if ($('#periode-laporan-kel').val() == 'Harian') {
			$('.harian-kel, #tanggal-harian-kel').show();
			$('.bulanan-kel, .rentang-waktu').hide();
		}
	});

	$('#unit-depo-kel').select2({
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


	$('#barang-search-kel').select2({
		ajax: {
			url: "<?= base_url('laporan_inventori_logistik/api/laporan_inventori_logistik/barang_pembelian') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
					jenissppb: $('#kategori-kel').val()
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

	function resetForm_kel() {
		<?php date_default_timezone_set('Asia/Jakarta'); ?>
		$('#periode-laporan-kel').val('Bulanan')
		$('#bulan-kel').val('<?= date('m') ?>')
		$('#tahun-kel').val('<?= date('Y') ?>')
		$('.bulanan-kel, #tahun-kel, #bulan-kel').show()
		$('#tanggal-awal-kel, #tanggal-akhir-kel, #tanggal-harian-kel').val('<?= date('d/m/Y') ?>')

		$('#kategori-kel, #jenis-pasien, #unit-depo-kel, #pembayaran_pengeluaran').val('')
		$('.harian-kel, #tanggal-harian-kel, .rentang-waktu-kel').hide()
		$('#unit-depo-kel').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-depo-kel a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
	}

	function getLaporanPengeluaranLogistik(page) {
		$('#page-now').val(page)
		$('#pengeluaran-logistik-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "2") {
			$('.lap-pengeluaran-logistik, #table-lap-pengeluaran-logistik tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventori_logistik/api/laporan_inventori_logistik/get_list_laporan_pengeluaran') ?>/page/' + page + '/jenis/',
				data: $('#form-search-pengeluaran-logistik').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPengeluaranLogistik(page - 1);
						return false;
					}

					$('#jenis-periode-pengeluaran-logistik').html('Periode : ' + data.periode);
					$('#pagination-kel').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-kel').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-pengeluaran-logistik, #table-lap-pengeluaran-logistik tbody').show()
					$('#table-lap-pengeluaran-logistik tbody').empty();
					$('#table-lap-pengeluaran-logistik tfoot').empty();

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
						if ($('#jenis-periode-pengeluaran-logistik').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-pengeluaran-logistik').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-pengeluaran-logistik').val() == 'Rentang Waktu') {
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
								<td class="left">${v.logistik}</td>
								<td class="center">${v.satuan}</td>
								<td class="right">${number_format(v.harga_satuan, 0, ',', '.')}</td>
								<td class="center">${v.kategori_barang}</td>
								<td class="center">${number_format(v.qty, 0, ',', '.')}</td>
								<td class="right">${number_format(v.total, 0, ',', '.')}</td>
							</tr>`;

						$('#table-lap-pengeluaran-logistik tbody').append(html);
					})

					// $.each(data.sum_total, function(i, v) {
					let html = /* html */ `
								<tr>
									<td colspan="8" class="right"><h5><b>Sub Total</b></h5></td>
									<td colspan="2" class="right"><h5><b>${number_format(data.sub_total, 0, ',', '.')}</b></h5></td>
								</tr>
							`;

					$('#table-lap-pengeluaran-logistik tfoot').append(html);
					// })
				},
				complete: function() {
					hideLoader()
					$('#pengeluaran-logistik-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	
</script>