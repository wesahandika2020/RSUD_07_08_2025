<!-- Modal Search -->
<div id="modal-search-02" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-02-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-02-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-02 role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-02" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-02 name=periode_laporan class=form-control') ?>
					</div>
				</div>

				<div class="bulanan form-group row tight">
					<label for="bulan" class="col-md-3 col-form-label"></label>
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
				<div class="harian form-group row tight">
					<label for="tanggal-harian-02" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-02" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="rajal form-group row tight">
					<label for="tempat-layanan-02" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan', $tempat_layanan, array(), 'id=tempat-layanan-02 class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight penjamin-group-search">
                    <label for="penjamin-search-02" class="col-md-3 col-form-label">Penjamin</label>
                    <div class="col-md-9">
                        <input type="text" name="penjamin" id="penjamin-search-02" class="selecr2-input" placeholder="Pilih Penjamin">
                    </div>
                </div>
				<div class="form-group row tight">
					<label for="dokter-search-02" class="col-md-3 col-form-label">Dokter</label>
					<div class="col-md-9">
						<input type="text" name="id_dokter" id="dokter-search-02" class="select2-input" placeholder="Semua Dokter / Petugas">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLporanPemeriksaan(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-02, #tanggal-akhir-02, #tanggal-harian-02').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-02').change(function() {
		if ($('#periode-laporan-02').val() == 'Bulanan') {
			$('.bulanan, #bulan-02, #tahun-02').show();
			$('.harian, .rentang-waktu, #tanggal-awal-02, #tanggal-akhir-02').hide();
		}
		if ($('#periode-laporan-02').val() == 'Rentang Waktu') {
			$('.rentang-waktu, #tanggal-awal-02, #tanggal-akhir-02').show();
			$('.harian, #tanggal-harian-02, .bulanan, #bulan-02, #tahun-02').hide();
		}
		if ($('#periode-laporan-02').val() == 'Harian') {
			$('.harian, #tanggal-harian-02').show();
			$('.bulanan, .rentang-waktu').hide();
		}
	});

	$('#unit-search-02').select2({
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

	$('#penjamin-search-02').select2({
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

	$('#dokter-search-02').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto_spesialisasi') ?>",
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

	function resetForm_02() {
		$('#periode-laporan-02').val('Bulanan')
		$('#bulan-02').val('<?= date('m') ?>')
		$('#tahun-02').val('<?= date('Y') ?>')
		$('.bulanan, #tahun-02, #bulan-02').show()
		$('#tanggal-awal-02, #tanggal-akhir-02, #tanggal-harian-02').val('<?= date('d/m/Y') ?>')
		$('#jenis', '#unit-search-02', '#penjamin-search-02', '#dokter-search-02', '#tempat-layanan-02').val('')
		$('#unit-search-02').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search-02 a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		$('.harian, #tanggal-harian-02, .rentang-waktu').hide()
		$('#s2id_dokter-search-02 a .select2-chosen').html('Pilih Dokter')
		$('#s2id_penjamin-search-02 a .select2-chosen').html('Pilih Penjamin')
		$('#tempat-layanan-02, .rajal').show()
	}

	function getLporanPemeriksaan(page) {
		//Laporan 02
		$('#page-now').val(page);
		openData();

		if ($('#jenis-laporan').val() == "2") {
			$('.lap-pemeriksaan, #table-lap-pemeriksaan tbody').show();

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rajal/api/laporan_rajal/get_list_laporan_rajal_02') ?>/page/' + page + '/jenis/',
				data: $('#form-search-02').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {

					// console.log(data.total_waktu);
					if ((page - 1) & (data.data.length === 0)) {
					getLporanPemeriksaan(page - 1);
					return false;
					}

					$('#jenis-periode-02').html('Periode : ' + data.periode);
					$('#pagination02').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary02').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-pemeriksaan, #table-lap-pemeriksaan tbody').show();
					$('#table-lap-pemeriksaan tbody').empty();
					$('#table-lap-pemeriksaan tfoot').empty();

					let groupedData = {};
					let counter = 1; // Variabel untuk nomor urutan

					$.each(data.data, function(i, v) {
						let periode = '';
						if ($('#periode-laporan-02').val() == 'Harian') {
							periode = 'Laporan Harian';
						}
						if ($('#periode-laporan-02').val() == 'Bulanan') {
							periode = 'Laporan Bulanan';
						}
						if ($('#periode-laporan-02').val() == 'Rentang Waktu') {
							periode = 'Laporan Rentang Waktu';
						}

						let doctorName = v.dokter;
						if (groupedData[doctorName]) {
							groupedData[doctorName].tindakan.push(v.tindakan);
							groupedData[doctorName].jumlah_tindakan.push(v.jumlah_tindakan);
						} else {
							groupedData[doctorName] = {
							dokter: doctorName,
							tindakan: [v.tindakan],
							jumlah_tindakan: [v.jumlah_tindakan]
							};
						}
					});

					$.each(groupedData, function(i, v) {
						let html = `
							<tr>
							<td class="center">${counter}</td>
							<td class="left">${v.dokter}</td>
							<td class="left">${v.tindakan.join('<br>')}</td>
							<td class="left">${v.jumlah_tindakan.join('<br>')}</td>
							</tr>
						`;
						
						counter++; // Tambahkan 1 ke nomor urutan
						$('#table-lap-pemeriksaan tbody').append(html);
					});

				},
				complete: function() {
					hideLoader()
					$('#modal-search-02').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}


</script>