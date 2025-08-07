<!-- Modal Search -->
<div id="modal-search-terima-resep" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-terima-resep-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-terima-resep-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-terima-resep role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-terima-resep" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-terima-resep class=form-control') ?>
					</div>
				</div>
				<div class="bulanan-terima-resep form-group row tight">
					<label for="bulan-terima-resep" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-terima-resep class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-terima-resep" class="form-control">
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
				<div class="rentang-waktu-terima-resep form-group row tight">
					<label for="tanggal-awal-terima-resep" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-terima-resep" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-terima-resep" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-terima-resep form-group row tight">
					<label for="tanggal-harian-terima-resep" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-terima-resep" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="rajal-terima-resep form-group row tight">
					<label for="tempat-layanan-terima-resep" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan', $tempat_layanan, array(), 'id=tempat-layanan-terima-resep class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="dokter-terima-resep" class="col-md-3 col-form-label">Dokter</label>
					<div class="col-md-9">
						<input type="text" name="id_dokter" id="dokter-terima-resep" class="select2-input" placeholder="Semua Dokter / Petugas">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanTerimaResep(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-terima-resep, #tanggal-akhir-terima-resep, #tanggal-harian-terima-resep').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-terima-resep').change(function() {
		if ($('#periode-laporan-terima-resep').val() == 'Bulanan') {
			$('.bulanan-terima-resep, #bulan-terima-resep, #tahun-terima-resep').show();
			$('.harian-terima-resep, .rentang-waktu-terima-resep, #tanggal-awal-terima-resep, #tanggal-akhir-terima-resep').hide();
		}
		if ($('#periode-laporan-terima-resep').val() == 'Rentang Waktu') {
			$('.rentang-waktu-terima-resep, #tanggal-awal-terima-resep, #tanggal-akhir-terima-resep').show();
			$('.harian-terima-resep, #tanggal-harian-terima-resep, .bulanan-terima-resep, #bulan-terima-resep, #tahun-terima-resep').hide();
		}
		if ($('#periode-laporan-terima-resep').val() == 'Harian') {
			$('.harian-terima-resep, #tanggal-harian-terima-resep').show();
			$('.bulanan-terima-resep, .rentang-waktu-terima-resep').hide();
		}
	});

	$('#unit-search-terima-resep').select2({
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

	$('#dokter-terima-resep').select2({
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

	function resetFormTerimaResep() {
		$('#periode-laporan-terima-resep').val('Bulanan')
		$('#bulan-terima-resep').val('<?= date('m') ?>')
		$('#tahun-terima-resep').val('<?= date('Y') ?>')
		$('.bulanan-terima-resep, #tahun-terima-resep, #bulan-terima-resep').show()
		$('#tanggal-awal-terima-resep, #tanggal-akhir-terima-resep, #tanggal-harian-terima-resep').val('<?= date('d/m/Y') ?>')
		$('#jenis-terima-resep', '#unit-search-terima-resep', '#tempat-layanan-terima-resep', '#dokter-terima-resep').val('')
		$('#unit-search-terima-resep').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search-terima-resep a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		$('.harian-terima-resep, #tanggal-harian-terima-resep, .rentang-waktu-terima-resep').hide()
		$('#tempat-layanan-terima-resep, .rajal-terima-resep').show()
		$('#s2id_dokter-terima-resep a .select2-chosen').html('Pilih Dokter')
	}

	function cekDateTime(id, form) {
		// ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan

		re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
		if (form !== '') {
			if (regs = form.match(re)) {
				// nilai hari antara 1 s.d 31
				if (regs[1] < 1 || regs[1] > 31) {
					alert("Nilai tidak valid untuk hari: " + regs[1]);
					syams_validation(id, 'Format Tanggal tidak sesuai');
					return false;
				}
				// nilai bulan antara 1 s.d 12
				if (regs[2] < 1 || regs[2] > 12) {
					alert("Nilai tidak valid untuk bulan: " + regs[2]);
					syams_validation(id, 'Format Tanggal tidak sesuai');
					return false;
				}
				// nilai tahun antara 2000 s.d sekarang
				if (regs[3] < 2022 || regs[3] > ((new Date()).getFullYear())) {
					alert("Nilai tidak valid untuk tahun: " + regs[3] + " - harus antara " + 2022 + " dan " + (((new Date()).getFullYear())));
					syams_validation(id, 'Format Tanggal tidak sesuai');
					return false;
				}
			} else {
				syams_validation(id, 'Format Tanggal tidak sesuai');
				return false;
			}
		}
	}

	function cekTahun(form){
		re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
		if (form !== '') {
			if (regs = form.match(re)) {
				return regs[3];
			}
		}
	}

	function cekBulanTahun(form){
		re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
		if (form !== '') {
			if (regs = form.match(re)) {
				return regs[3]+'-'+regs[2]+'-'+regs[1];
			}
		}
	}

	function getLaporanTerimaResep(page) {
		
		//Laporan terima resep
		$('#page-now').val(page);
		var periodeLaporan = '';
		var tanggalAwal = '';
		var tanggalAkhir = '';
		var tanggalHarian = '';
		var bulanTahunAwal = '';
		var bulanTahunAkhir = '';
		var periksaBulan = '';
		var periksaTahun = '';
		var bulanSekarang = '';
		var tahunSekarang = '';
		var tahunAwal = '';
		var tahunAkhir = '';
		var bulanTahunAwal = '';
		var tanggalHariIni = '';

		if ($('#jenis-laporan').val() == "8") {
			$('.lap-terima-resep, #table-lap-terima-resep tbody').show();
			periodeLaporan = $('#periode-laporan-terima-resep').val();

			if(periodeLaporan === 'Rentang Waktu'){
				let cekTanggalAwal = $('#tanggal-awal-terima-resep').val();
				let cekTanggalAkhir = $('#tanggal-akhir-terima-resep').val();

				tahunAwal = cekTahun(cekTanggalAwal);
				tahunAkhir = cekTahun(cekTanggalAkhir);

				bulanTahunAwal = cekBulanTahun(cekTanggalAwal);
				bulanTahunAkhir = cekBulanTahun(cekTanggalAkhir);

				if(tahunAwal === undefined){
					syams_validation('#tanggal-awal-terima-resep', 'Tanggal Awal tidak terdefinisi');
					return false;
				}

				if(tahunAkhir === undefined){
					syams_validation('#tanggal-akhir-terima-resep', 'Tanggal Akhir tidak terdefinisi');
					return false;
				}

				if(bulanTahunAwal > bulanTahunAkhir){
					syams_validation('#tanggal-awal-terima-resep', 'Tanggal Awal tidak Boleh lebih dari Tanggal Akhir');
					return false;
				}

				if(parseInt(tahunAwal) > parseInt(tahunAkhir)){
					syams_validation('#tanggal-awal-terima-resep', 'Tahun Awal Tidak boleh Lebih dari Tahun Akhir');
					return false;
				}

				if(parseInt(tahunAwal) < 2022){
					syams_validation('#tanggal-awal-terima-resep', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;
				}

				if(parseInt(tahunAkhir) > new Date().getFullYear()){
					syams_validation('#tanggal-akhir-terima-resep', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;
				}

				tanggalAwal = cekDateTime('#tanggal-awal-terima-resep', cekTanggalAwal);
				tanggalAkhir = cekDateTime('#tanggal-akhir-terima-resep', cekTanggalAkhir);

				syams_validation_remove('#tanggal-awal-terima-resep');
				syams_validation_remove('#tanggal-akhir-terima-resep');

			}

			if(periodeLaporan === 'Harian'){
				tanggalHarian = $('#tanggal-harian-terima-resep').val();

				tahunAwal = cekTahun(tanggalHarian);
				bulanTahunAwal = cekBulanTahun(tanggalHarian);

				var x = new Date();
				var date = x.getDate();
				var month = x.getMonth();
				month++;

				if (month < 10) {
					month = '0' + String(month);
				};

				if (date < 10) {
					date = '0' + String(date);
				}

				tanggalHariIni = new Date().getFullYear() + '-' + month + '-' + date;

				if(parseInt(tahunAwal) < 2022){
					syams_validation('#tanggal-harian-terima-resep', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;
				}

				if(parseInt(tahunAwal) > new Date().getFullYear()){
					syams_validation('#tanggal-harian-terima-resep', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;
				}

				if(bulanTahunAwal > tanggalHariIni){
					syams_validation('#tanggal-harian-terima-resep', 'Tanggal Harian tidak boleh lebih dari pada Tanggal Hari ini');
					return false;
				}

				syams_validation_remove('#tanggal-harian-terima-resep');
			}


			if(periodeLaporan === 'Bulanan'){

				periksaBulan = $('#bulan-terima-resep').val();
				periksaTahun = $('#tahun-terima-resep').val();

				bulanSekarang = new Date().getMonth() + 1;
				tahunSekarang = new Date().getFullYear();

				if(parseInt(periksaTahun) < 2023){
					if(parseInt(periksaBulan) < 3){
						syams_validation('#bulan-terima-resep', 'Bulan Tidak Boleh Kurang dari Bulan Maret 2022');
						return false;
					}
				}

				if(parseInt(periksaTahun) > new Date().getFullYear()){
					syams_validation('#tahun-terima-resep', 'Tahun Tidak Boleh Lebih Dari Tahun Sekarang');
					return false;
				}

				if(parseInt(periksaTahun) === new Date().getFullYear() && (parseInt(periksaBulan) > (new Date().getMonth() + 1))){
					syams_validation('#bulan-terima-resep', 'Belum ada Data di Bulan tersebut');
					return false;
				}

				syams_validation_remove('#tahun-terima-resep');
				syams_validation_remove('#bulan-terima-resep');
			}

			openData();		

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rajal/api/laporan_rajal/get_list_laporan_terima_resep') ?>/page/' + page + '/jenis/',
				data: $('#form-search-terima-resep').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {

					if (typeof data.data === 'undefined' || data.data === null) {
						messageCustom('Tidak Ada Data', 'Error');
						return false;
					}

					if ((page - 1) & (data.data.length === 0)) {
						getLaporanTerimaResep(page - 1);
						return false;
					}

					$('#jenis-periode-terima-resep').html('Periode : ' + data.periode);
					$('#pagination-terima-resep').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-terima-resep').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-terima-resep, #table-lap-terima-resep tbody').show();
					$('#table-lap-terima-resep tbody').empty();
					$('#table-lap-terima-resep tfoot').empty();

					let i = 1;
					let html = '';

				$.each(data.data, function(a, value) {
					
					let umurPasien = hitungUmur(value.tanggal_lahir);
					let tanggalDaftar = datetimefmysql(value.tanggal_daftar);
					let tanggalKeluar = datetimefmysql(value.tanggal_keluar);

					// Definisikan tombol expand di luar loop
					let btnExpand = '';
					if (value.diagnosa_data && value.diagnosa_data.length > 0) {
						btnExpand = `<a type="button" data-toggle="collapse" href="#show${value.id_layanan_pendaftaran}" class="btn btn-info btn-xs" aria-expanded="false" id="btn-expand-form-all${value.id_layanan_pendaftaran}">
										<i id="expand-icon${value.id_layanan_pendaftaran}" class="fas fa-fw fa-expand mr-1"></i>Expand
									</a>`;
					}

					// Membuat konten HTML untuk baris
					let html = `
						<tr>
							<td class="center">${((a + 1) + ((data.page - 1) * data.limit))}</td>
							<th class="center">${tanggalDaftar}</th>
							<th class="center">${tanggalKeluar}</th>
							<th class="center">${value.no_rm}</th>
							<th class="center">${value.nama_pasien}</th>
							<th class="center">${value.kelamin}</th>
							<th class="center">${umurPasien}</th>
							<th class="center">${value.penjamin}</th>
							<th class="center">${value.diagnosa_data && value.diagnosa_data[0]?.icdx_diagnosa ? value.diagnosa_data[0].icdx_diagnosa : ''} 
								${value.diagnosa_data && value.diagnosa_data[0]?.nama_diagnosa ? value.diagnosa_data[0].nama_diagnosa : ''}
							</th>
							<th class="center">${value.dokter_dpjp}</th>
							<th class="center">${btnExpand}</th>
						</tr>
						<tr id="show${value.id_layanan_pendaftaran}" class="collapse">
						<td style="background-color: white;" class="center" colspan="3"></td>
						<td style="background-color: #f9e897; font-weight: bold;" class="center">No</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="center">Waktu Penjualan</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="center">No Resep</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="center">Nama Obat</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="center">Dosis</td>
						<td style="background-color: #f9e897; font-weight: bold;" width="8%" class="center">Jumlah pakai</td>
						<td style="background-color: white;" class="center" colspan="3"></td>
					</tr>
					`;

					$.each(value.resep_data, function(key, val) {

						html += `
							<tr id="show${value.id_layanan_pendaftaran}" class="collapse">
								<td style="background-color: white;" class="center" colspan="3"></td>
								<td style="background-color: #fdf5d0;" class="center">${key + 1}</td>
								<td style="background-color: #fdf5d0;" class="center">${val.waktu_penjualan ? datetimefmysql(val.waktu_penjualan) : ''}</td>
								<td style="background-color: #fdf5d0;" class="left">${val.no_resep ? val.no_resep : ''}</td>
								<td style="background-color: #fdf5d0;" class="left">${val.nama_obat ? val.nama_obat : ''}</td>
								<td style="background-color: #fdf5d0;" class="right">${val.dosis ? val.dosis : ''} ${val.nama_satuan ? val.nama_satuan : ''}</td>
								<td style="background-color: #fdf5d0;" class="right">${val.jumlah_pakai ? val.jumlah_pakai : ''}</td>
								<td style="background-color: white;" class="center" colspan="3"></td>
							</tr>
						`;
					});


					// Menambahkan baris HTML ke dalam tabel
					$('#table-lap-terima-resep tbody').append(html);

					// Menambahkan event listener di luar loop agar tidak terjadi pengikatan berulang
					$('#btn-expand-form-all' + value.id_layanan_pendaftaran).off('click').on('click', function() {
						const isExpanded = $(this).attr('aria-expanded') === 'true';
						$('#expand-icon' + value.id_layanan_pendaftaran).toggleClass('active', isExpanded);
						$(this).html(`<i class="fas fa-fw ${isExpanded ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded ? 'Expand' : 'Collapse'}`);
						$(this).toggleClass('btn-danger', !isExpanded);
						$(this).toggleClass('btn-info', isExpanded);
						history.replaceState({}, document.title, window.location.pathname);
					});

				});


				},
				complete: function() {
					hideLoader()
					$('#modal-search-terima-resep').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})
		}
	}


</script>