<!-- Modal Search -->
<div id="modal-search-wt" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-wt-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-wt-label">Form Parameter Laporan</h4>
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
				<div class="rajal form-group row tight">
					<label for="tempat-layanan" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan', $tempat_layanan, array(), 'id=tempat-layanan class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight penjamin-group-search">
                    <label for="penjamin-search-wt" class="col-md-3 col-form-label">Penjamin</label>
                    <div class="col-md-9">
                        <input type="text" name="penjamin" id="penjamin-search-wt" class="selecr2-input" placeholder="Pilih Penjamin">
                    </div>
                </div>
				<div class="form-group row tight">
					<label for="dokter-search" class="col-md-3 col-form-label">Dokter</label>
					<div class="col-md-9">
						<input type="text" name="id_dokter" id="dokter-search" class="select2-input" placeholder="Semua Dokter / Petugas">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanRajal(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	var baseUrl = '<?= base_url('laporan_rajal/api/laporan_rajal') ?>';
	var jenisPenjamin = 0;

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

	$('#cara-bayar-search').change(function() {
		jenisPenjamin = $(this).val()
		$('#penjamin-search-wt').val('')
		$('#s2id_penjamin-search-wt a .select2-chosen').html('Pilih Penjamin')
		if ($(this).val() !== 'Tunai') {
			$('.penjamin-group-search').show()
		} else {
			$('.penjamin-group-search').hide()
		}
	})
	$('#penjamin-search-wt').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function (term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					jenis: jenisPenjamin,
					page: page, // page number
				};
			},
			results: function (data, page) {
				var more = (page * 20) < data.total; // whether or not there are more results available
		
				// notice we return the value of more so Select2 knows if more results can be loaded
				return {results: data.data, more: more};
			}
		},
		formatResult: function(data){
			var markup = data.nama;
			return markup;
		}, 
		formatSelection: function(data){
			return data.nama;
		}
	})

	$('#dokter-search').select2({
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

	function resetForm_01() {
		$('#periode-laporan').val('Bulanan')
		$('#bulan').val('<?= date('m') ?>')
		$('#tahun').val('<?= date('Y') ?>')
		$('.bulanan, #tahun, #bulan').show()
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>')
		$('#jenis', '#unit-search', '#penjamin-search-wt', '#tempat-layanan').val('')
		$('#unit-search').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		$('.harian, #tanggal-harian, .rentang-waktu').hide()
		$('#s2id_penjamin-search-wt a .select2-chosen').html('Pilih Penjamin')
		$('#tempat-layanan, .rajal').show()
	}

	function getLaporanRajal(page) {
		//Laporan 01
		$('#page-now').val(page);
		openData();

		if ($('#jenis-laporan').val() == "1") {
			$('.lap-waktu-tunggu, #table-lap-waktu-tunggu tbody').show();

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rajal/api/laporan_rajal/get_list_laporan_rajal_01') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {

					// console.log(data.total_waktu);
					// console.log(data.total_data	);

					if ((page - 1) & (data.data.length === 0)) {
					getLaporanRajal(page - 1);
					return false;
					}

					$('#jenis-periode').html('Periode : ' + data.periode);
					$('#pagination01').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary01').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-waktu-tunggu, #table-lap-waktu-tunggu tbody').show();
					$('#table-lap-waktu-tunggu tbody').empty();
					$('#table-lap-waktu-tunggu tfoot').empty();

					$.each(data.data, function(i, v) {
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

						let html = `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.no_rm}</td>
								<td class="left">${v.nama}</td>
								<td class="center">${((v.tanggal_kunjungan !== null) ? datetimefmysql(v.tanggal_kunjungan) : '')}</td>
								<td class="center">${((v.tanggal_selesai !== null) ? datetimefmysql(v.tanggal_selesai) : '')}</td>
								<td class="center">${v.waktu_tunggu || ''}</td>
								<td class="center">${v.kelamin}</td>
								<td class="center">${v.umur}</td>
								<td class="left">${v.alamat}</td>
								<td class="center">${v.kunjungan}</td>
								<td class="center">${v.penjamin}</td>
								<td class="center">${v.asal_pasien} (${v.unit_pelayanan})</td>
								<td class="left">${v.nama_dokter}</td>
							</tr>
						`;

						$('#table-lap-waktu-tunggu tbody').append(html);
					});
					// console.log(data.rata_waktu);
					// Konversi rata waktu ke dalam komponen hari, jam, menit, dan detik
					let days = Math.floor(data.rata_waktu / (24 * 3600));
					let hours = Math.floor((data.rata_waktu % (24 * 3600)) / 3600);
					let minutes = Math.floor((data.rata_waktu % 3600) / 60);
					let seconds = Math.floor(data.rata_waktu % 60);

					// Format waktu tunggu
					let rataWaktuFormatted = `${days} hari ${hours}:${minutes}:${seconds}`;

					let rataWaktuHtml = `
						<tr>
							<td colspan="12" class="left"><b>Rata-rata waktu tunggu: ${rataWaktuFormatted}</b></td>
						</tr>
					`;

					$('#table-lap-waktu-tunggu tfoot').append(rataWaktuHtml);

					},
				complete: function() {
					hideLoader()
					$('#modal-search-wt').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}


</script>