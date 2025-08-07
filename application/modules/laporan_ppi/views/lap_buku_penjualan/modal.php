<!-- Modal Search -->
<div id="buku-penjualan-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="buku-penjualan-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="buku-penjualan-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-buku-penjualan role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-02" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-02 name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-02 form-group row tight">
					<label for="bulan-02" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-02 class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-02" class="form-control">
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
					<label for="tanggal-awal-02" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-02" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-02" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-02 form-group row tight">
					<label for="tanggal-harian-02" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-02" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>

				<div class="form-group row tight">
					<label for="jenis-pasien" class="col-md-3 col-form-label">Jenis Pasien</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_pasien', $jenis_pasien, array(), 'id=jenis-pasien class=form-control') ?>
					</div>
				</div>
				<div class="ruangan_rajal form-group row tight">
					<label for="ruangan_rajal" class="col-md-3 col-form-label">Ruangan</label>
					<div class="col-md-9">
						<input type="text" name="ruangan_rajal" id="ruangan_rajal" class="select2-input" placeholder="Semua Ruangan">
					</div>
				</div>
				<div class="ruangan_ranap form-group row tight">
					<label for="ruangan_ranap" class="col-md-3 col-form-label">Ruangan</label>
					<div class="col-md-9">
						<input type="text" name="ruangan_ranap" id="ruangan_ranap" class="select2-input" placeholder="Semua Ruangan">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="unit-depo" class="col-3 col-form-label">Unit</label>
					<div class="col">
						<?= form_dropdown('unit_depo', $unit, array(), 'id=unit-depo class=form-control') ?>
						<!-- <input type="text" name="unit" id="unit-depo" class="select2-input" placeholder="Semua Unit..."> -->
					</div>
				</div>
				<br>

				<div class="form-group row tight">
					<label for="barang_search" class="col-md-3 col-form-label">Barang</label>
					<div class="col-md-9">
						<input type="text" name="barang_search" id="barang_search" class="select2-input" placeholder="Semua Barang">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="kategori-02" class="col-md-3 col-form-label">Kategori Obat</label>
					<div class="col-md-9">
						<?= form_dropdown('kategori', $kategori, array(), 'id=kategori-02 class=form-control') ?>
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
				<br>


				<div class="form-group row tight">
					<label for="pasien_search" class="col-md-3 col-form-label">Pasien</label>
					<div class="col-md-9">
						<input type="text" name="pasien_search" id="pasien_search" class="select2-input" placeholder="Semua Pasien">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="dokter_search" class="col-md-3 col-form-label">Dokter</label>
					<div class="col-md-9">
						<input type="text" name="dokter_search" id="dokter_search" class="select2-input" placeholder="Semua Dokter">
					</div>
				</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanBukuPenjualan(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	var baseUrl = '<?= base_url('laporan_ppi/api/laporan_ppi') ?>';

	// Format Tanggal
	$('#tanggal-awal-02, #tanggal-akhir-02, #tanggal-harian-02').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-02').change(function() {
		if ($('#periode-laporan-02').val() == 'Bulanan') {
			$('.bulanan-02, #bulan-02, #tahun-02').show();
			$('.harian-02, .rentang-waktu, #tanggal-awal-02, #tanggal-akhir-02').hide();
		}
		if ($('#periode-laporan-02').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-02, #tanggal-akhir-02').show();
			$('.harian-02, #tanggal-harian-02, .bulanan-02, #bulan-02, #tahun-02').hide();
		}
		if ($('#periode-laporan-02').val() == 'Harian') {
			$('.harian-02, #tanggal-harian-02').show();
			$('.bulanan-02, .rentang-waktu').hide();
		}
	});

	$('#jenis-pasien').change(function() {
		if ($('#jenis-pasien').val() == 'Rawat Jalan') {
			$('#ruangan_rajal, .ruangan_rajal').show();
			$('#ruangan_ranap, .ruangan_ranap').hide();
			$('#ruangan_ranap, .ruangan_ranap').val('');
		} else if ($('#jenis-pasien').val() == 'Rawat Inap') {
			$('#ruangan_rajal, .ruangan_rajal').hide();
			$('#ruangan_rajal, .ruangan_rajal').val('');
			$('#ruangan_ranap, .ruangan_ranap').show();
		} else {
			$('#ruangan_rajal, .ruangan_rajal').hide();
			$('#ruangan_rajal, .ruangan_rajal').val('');
			$('#ruangan_ranap, .ruangan_ranap').hide();
			$('#ruangan_ranap, .ruangan_ranap').val('');
		}
	});

	function resetForm_02() {
		$('#periode-laporan-02').val('Bulanan');
		$('#bulan-02').val('<?= date('m') ?>');
		$('#tahun-02').val('<?= date('Y') ?>');
		$('.bulanan-02, #tahun-02, #bulan-02').show();
		$('#tanggal-awal-02, #tanggal-akhir-02, #tanggal-harian-02').val('<?= date('d/m/Y') ?>');

		$('#kategori-02, #jenis-pasien, #jenlay, #barang_search, #pasien_search').val('');
		$('.harian-02, #tanggal-harian-02, .rentang-waktu-02').hide();

		$('#ruangan_rajal, #ruangan_ranap').val('');
		$('#ruangan_rajal, #ruangan_ranap, .ruangan_rajal, .ruangan_ranap').hide();
	}

	function getLaporanBukuPenjualan(page) {
		//Laporan 01
		$('#page-now').val(page)
		$('#modal-search').modal('hide')
		openData();

		if ($('#jenis-laporan').val() == "2") {
			$('.lap-buku-penjualan, #table-lap-buku-penjualan tbody').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_ppi/api/laporan_ppi/get_list_laporan_ppi_02') ?>/page/' + page + '/jenis/',
				data: $('#form-search-buku-penjualan').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if ((page - 1) & (data.data.length === 0)) {
						getLaporanBukuPenjualan(page - 1);
						return false;
					}

					$('#jenis-periode-buku-penjualan').html('Periode : ' + data.periode);
					$('#pagination-02').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-02').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-buku-penjualan, #table-lap-buku-penjualan tbody').show()
					$('#table-lap-buku-penjualan tbody').empty();
					$('#table-lap-buku-penjualan tfoot').empty();

					let TotalQTY = 0;
					let TotalHarga = 0;
					$.each(data.data, function(i, v) {
						TotalQTY += parseInt(v.qty);
						TotalHarga += parseInt(v.harga);
						let periode = '';
						if ($('#jenis-periode-buku-penjualan').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#jenis-periode-buku-penjualan').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#jenis-periode-buku-penjualan').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let html = /* html */ `
								<tr>
									<td widht="3%" class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
									<td widht="8%" class="center">${v.tanggal_act}</td>
									<td widht="7%" class="center">${v.no_penjualan}</td>
									<td widht="14%" class="left">${v.pasien}</td>
									<td widht="14%" class="left">${v.nama_obat}</td>
									<td widht="8%" class="center">${v.kategori}</td>
									<td widht="7%" class="center">JPKMKT</td>
									<td widht="5%" class="center">${v.qty}</td>
									<td widht="10%" class="right">${number_format(v.harga, 2, ',', '.')}</td>
									<td widht="10%" class="center">${(v.ruang == null ? 'INSTALASI GAWAT DARURAT' : v.ruang)}</td>
									<td widht="14%" class="center">${v.dokter}</td>
								</tr>`;

						$('#table-lap-buku-penjualan tbody').append(html);
					})

					let html = /* html */ `
						<tr>
							<td colspan="7" class="right"><h6><b>Total QTY</b></h6></td>
							<td colspan="2" class="right"><h6><b>${TotalQTY} &ensp;</b></h6></td>
							<td class="right"><h6><b>Total Harga</b></h6></td>
							<td class="right"><h6><b>Rp. ${number_format(TotalHarga, 2, ',', '.')} &ensp;</b></h6></td>
						</tr>
					`;

					$('#table-lap-buku-penjualan tfoot').append(html);
				},
				complete: function() {
					hideLoader()
					$('#buku-penjualan-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

	$('#pasien_search').select2({
		ajax: {
			url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
			var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
			return markup;
		},
		formatSelection: function(data) {
			return data.id + ' ' + data.nama;
		}
	})

	$('#barang_search').select2({
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

	$('#ruangan_rajal').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
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

	$('#ruangan_ranap').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/bangsal_auto') ?>",
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

	$('#dokter_search').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
			var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	})

	$('#tgl-search').change(function() {
		let id_pendaftaran = $('#tgl-search').val();
		$('#id_pendaftaran_search').val(id_pendaftaran);
	})
</script>