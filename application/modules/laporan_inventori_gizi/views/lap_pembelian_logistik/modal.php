<!-- Modal Search -->
<div id="modal-search-pembelian" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-pembelian-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-pembelian-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-pembelian role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-pembelian" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-pembelian name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-pembelian form-group row tight">
					<label for="bulan-pembelian" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-pembelian class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-pembelian" class="form-control">
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
				<div class="rentang-waktu-pembelian form-group row tight">
					<label for="tanggal-awal-pembelian" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-pembelian" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-pembelian" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-pembelian form-group row tight">
					<label for="tanggal-harian-pembelian" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-pembelian" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="form-group row tight">
					<label for="unit-search-pembelian" class="col-3 col-form-label">Unit</label>
					<div class="col">
						<input type="text" name="unit" id="unit-search-pembelian" class="select2-input" placeholder="Semua Unit...">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kategori-pembelian" class="col-md-3 col-form-label">Kategori</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori-pembelian class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="barang-pembelian" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang_search_pembelian" id="barang-pembelian" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanPembelianLogistik(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-pembelian, #tanggal-akhir-pembelian, #tanggal-harian-pembelian, #tanggal-harian').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#barang-pembelian').select2({
		ajax: {
			url: "<?= base_url('laporan_inventori_logistik/api/laporan_inventori_logistik/barang_pembelian') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
					jenissppb: $('#kategori-pembelian').val()
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

	$('#periode-laporan-pembelian').change(function() {
		if ($('#periode-laporan-pembelian').val() == 'Bulanan') {
			$('.bulanan-pembelian, #bulan-pembelian, #tahun-pembelian').show();
			$('.harian-pembelian, .rentang-waktu-pembelian, #tanggal-awal-pembelian, #tanggal-akhir-pembelian').hide();
		}
		if ($('#periode-laporan-pembelian').val() == 'Rentang Waktu') {
			$('.rentang-waktu-pembelian, #tanggal-awal-pembelian, #tanggal-akhir-pembelian').show();
			$('.harian-pembelian, #tanggal-harian-pembelian, .bulanan-pembelian, #bulan-pembelian, #tahun-pembelian').hide();
		}
		if ($('#periode-laporan-pembelian').val() == 'Harian') {
			$('.harian-pembelian, #tanggal-harian-pembelian').show();
			$('.bulanan-pembelian, .rentang-waktu-pembelian').hide();
		}
	});

	$('#unit-search-pembelian').select2({
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

	function resetFormPembelianlogistik() {
		$('#periode-laporan-pembelian').val('Bulanan')
		$('#bulan-pembelian').val('<?= date('m') ?>')
		$('#tahun-pembelian').val('<?= date('Y') ?>')
		$('.bulanan-pembelian, #tahun-pembelian, #bulan-pembelian').show()
		$('#tanggal-awal-pembelian, #tanggal-akhir-pembelian, #tanggal-harian-pembelian').val('<?= date('d/m/Y') ?>')
		$('#kategori-pembelian, #unit-search-pembelian').val('')
		$('#unit-search-pembelian').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search-pembelian a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		$('.harian-pembelian, #tanggal-harian-pembelian, .rentang-waktu-pembelian').hide()
	}

	function getLaporanPembelianLogistik(page) {
		
		$('#page-now').val(page)
		openData();

		if ($('#jenis-laporan').val() == "3") {
			$('.lap-pembelian-logistik, #table-lap-pembelian-logistik tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_inventori_logistik/api/laporan_inventori_logistik/get_list_laporan_pembelian') ?>/page/' + page + '/jenis/',
				data: $('#form-search-pembelian').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {

					console.log(data.data);

					
					if(typeof data.data === 'undefined' | data.data === null){

						messageCustom('Tidak Ada Data', 'Error');
						return false;

					}

					if ((page - 1) & (data.data.length === 0)) {
						getLaporanPembelianLogistik(page - 1);
						return false;
					}

					$('#jenis-periode-pembelian').html('Periode : ' + data.periode);
					$('#pagination-pembelian').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-pembelian').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-pembelian-logistik, #table-lap-pembelian-logistik tbody').show();
					$('#table-lap-pembelian-logistik tbody').empty();
					$('#table-lap-pembelian-logistik tfoot').empty();

					let jenisPembayaran = '';
					let ketPembayaran = '';
					let totalPenerimaan = '';
					let kategori = '';
					let html = '';
					let dataLength = '';
					let dataTerakhir = '';
					let cariObjek = '';
					let cariObjekTerakhir = '';
					let sI = '';

					$.each(data.data, function(i, v) {

						dataLength = data.data.length;
						dataTerakhir = dataLength - 1;
						sI = Math.ceil(data.totaldata / data.limit);


						let periode = '';
						if ($('#periode-laporan-pembelian').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#periode-laporan-pembelian').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#periode-laporan-pembelian').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						jenisPembayaran = v.pembayaran;
						ketPembayaran = v.keterangan_pembayaran;
						totalPenerimaan = v.harga * v.isi * v.isi_satuan * v.jumlah;


						if(v.kategori !== kategori){

							if(kategori === ''){

								html = /* html */ `
									<tr>
										<td class="center">${v.kategori}</td>
										<td class="left">${v.nama_barang}</td>
										
									
								`;

							} else {

								cariObjek = kategori;

								let cariKunci = data.kategori[cariObjek];
								let bLud = cariKunci['BLUD'];
								let apbd = cariKunci['APBD'];
								let bttP = cariKunci['BTT'];
								let cariSubtotal = data.subtotal[cariObjek];
								
								html = /* html */ `
									<tr>
										<td colspan="2" class="center"><b>Total</b></td>
										
										<td class="right"><b>${((apbd !== undefined) ? number_format(apbd, 0, ',', '.') : 0)}</b></td>
										<td class="center"></td>
										<td class="right"><b>${((bLud !== undefined) ? number_format(bLud, 0, ',', '.') : 0)}</b></td>
										<td class="center"></td>
										<td class="right"><b>${((bttP !== undefined) ? number_format(bttP, 0, ',', '.') : 0)}</b></td>
										<td class="center"></td>
										<td class="center"><b>${((cariSubtotal !== undefined) ? number_format(cariSubtotal, 0, ',', '.') : 0)}</b></td>
									</tr>
										
									
								`;

								html += /* html */ `
									<tr>
										<td class="center">${v.kategori}</td>
										<td class="left">${v.nama_barang}</td>
										
									
								`;

							}

						} else {

							html = /* html */ `
								<tr>
									<td class="center"></td>
									<td class="left">${v.nama_barang}</td>
									
								
							`;

						}


						if(jenisPembayaran === 'APBD'){

							html += /* html */ `
									<td class="right">${number_format(totalPenerimaan, 0, ',', '.')}</td>
									
									<td class="left">${ketPembayaran}</td>
									<td class="center"></td>
									<td class="center"></td>
									<td class="center"></td>
									<td class="center"></td>
									<td class="center"></td>
									
								</tr>
							`;

						}

						if(jenisPembayaran === 'BLUD'){

							html += /* html */ `
									<td class="center"></td>
									<td class="center"></td>
									<td class="right">${number_format(totalPenerimaan, 0, ',', '.')}</td>
									
									<td class="left">${ketPembayaran}</td>
									<td class="center"></td>
									<td class="center"></td>
									<td class="center"></td>
									
								</tr>
							`;

						}

						if(jenisPembayaran === 'BTT'){

							html += /* html */ `
									<td class="center"></td>
									<td class="center"></td>
									<td class="center"></td>
									<td class="center"></td>
									<td class="right">${number_format(totalPenerimaan, 0, ',', '.')}</td>
									<td class="left">${ketPembayaran}</td>
									<td class="center"></td>
									
								</tr>
							`;

						}

						if(sI === data.page){

							if(dataTerakhir === i){

								cariObjekTerakhir = v.kategori;

								let cariKunciTerakhir = data.kategori[cariObjekTerakhir];
								let apbdTerakhir = cariKunciTerakhir['APBD'];
								let bLudTerakhir = cariKunciTerakhir['BLUD'];
								let bttPTerakhir = cariKunciTerakhir['BTT'];
								let cariSubtotalTerakhir = data.subtotal[cariObjekTerakhir];
								let cekTotal = data.total;
								let totalApbdTerakhir = cekTotal['APBD'];
								let totalBludTerakhir = cekTotal['BLUD'];
								let totalBttTerakhir = cekTotal['BTT'];

								html += /* html */ `
									<tr>
										<td colspan="2" class="center"><b>Total</b></td>
										
										<td class="right"><b>${((apbdTerakhir !== undefined) ? number_format(apbdTerakhir, 0, ',', '.') : 0)}</b></td>
										<td class="center"></td>
										<td class="right"><b>${((bLudTerakhir !== undefined) ? number_format(bLudTerakhir, 0, ',', '.') : 0)}</b></td>
										<td class="center"></td>
										<td class="right"><b>${((bttPTerakhir !== undefined) ? number_format(bttPTerakhir, 0, ',', '.') : 0)}</b></td>
										<td class="center"></td>
										<td class="center"><b>${((cariSubtotalTerakhir !== undefined) ? number_format(cariSubtotalTerakhir, 0, ',', '.') : 0)}</b></td>
									</tr>
									<tr>
										<td colspan="2" class="center"><b>Jumlah Total</b></td>
										
										<td class="right"><b>${((totalApbdTerakhir !== undefined) ? number_format(totalApbdTerakhir, 0, ',', '.') : 0)}</b></td>
										<td class="center"></td>
										<td class="right"><b>${((totalBludTerakhir !== undefined) ? number_format(totalBludTerakhir, 0, ',', '.') : 0)}</b></td>
										<td class="center"></td>
										<td class="right"><b>${((totalBttTerakhir !== undefined) ? number_format(totalBttTerakhir, 0, ',', '.') : 0)}</b></td>
										<td class="center"></td>
										<td class="center"><b>${((data.all !== undefined) ? number_format(data.all, 0, ',', '.') : 0)}</b></td>
									</tr>
										
									
								`;
							}

						}

						$('#table-lap-pembelian-logistik tbody').append(html);

						kategori = v.kategori;

					})

				},
				complete: function() {
					hideLoader()
					$('#modal-search-pembelian').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}
</script>