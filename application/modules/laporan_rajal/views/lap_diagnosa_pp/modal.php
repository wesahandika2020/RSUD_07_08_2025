<!-- Modal Search -->
<div id="modal-search-diagnosa-pp" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-diagnosa-pp-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-diagnosa-pp-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-diagnosa-pp role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-diagnosa-pp" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-diagnosa-pp class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-diagnosa-pp form-group row tight">
					<label for="bulan-diagnosa-pp" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-diagnosa-pp class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-diagnosa-pp" class="form-control">
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
				<div class="rentang-waktu-diagnosa-pp form-group row tight">
					<label for="tanggal-awal-diagnosa-pp" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-diagnosa-pp" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-diagnosa-pp" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-diagnosa-pp form-group row tight">
					<label for="tanggal-harian-diagnosa-pp" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-diagnosa-pp" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="rajal-diagnosa-pp form-group row tight">
					<label for="tempat-layanan-diagnosa-pp" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan', $tempat_layanan, array(), 'id=tempat-layanan-diagnosa-pp class=form-control') ?>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanDiagnosaPp(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-diagnosa-pp, #tanggal-akhir-diagnosa-pp, #tanggal-harian-diagnosa-pp').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-diagnosa-pp').change(function() {
		if ($('#periode-laporan-diagnosa-pp').val() == 'Bulanan') {
			$('.bulanan-diagnosa-pp, #bulan-diagnosa-pp, #tahun-diagnosa-pp').show();
			$('.harian-diagnosa-pp, .rentang-waktu-diagnosa-pp, #tanggal-awal-diagnosa-pp, #tanggal-akhir-diagnosa-pp').hide();
		}
		if ($('#periode-laporan-diagnosa-pp').val() == 'Rentang Waktu') {
			$('.rentang-waktu-diagnosa-pp, #tanggal-awal-diagnosa-pp, #tanggal-akhir-diagnosa-pp').show();
			$('.harian-diagnosa-pp, #tanggal-harian-diagnosa-pp, .bulanan-diagnosa-pp, #bulan-diagnosa-pp, #tahun-diagnosa-pp').hide();
		}
		if ($('#periode-laporan-diagnosa-pp').val() == 'Harian') {
			$('.harian-diagnosa-pp, #tanggal-harian-diagnosa-pp').show();
			$('.bulanan-diagnosa-pp, .rentang-waktu-diagnosa-pp').hide();
		}
	});

	$('#unit-search-diagnosa-pp').select2({
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

	function resetFormDiagnosaPp() {
		$('#periode-laporan-diagnosa-pp').val('Bulanan')
		$('#bulan-diagnosa-pp').val('<?= date('m') ?>')
		$('#tahun-diagnosa-pp').val('<?= date('Y') ?>')
		$('.bulanan-diagnosa-pp, #tahun-diagnosa-pp, #bulan-diagnosa-pp').show()
		$('#tanggal-awal-diagnosa-pp, #tanggal-akhir-diagnosa-pp, #tanggal-harian-diagnosa-pp').val('<?= date('d/m/Y') ?>')
		$('#jenis-diagnosa-pp', '#unit-search-diagnosa-pp', '#tempat-layanan-diagnosa-pp').val('')
		$('#unit-search-diagnosa-pp').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search-diagnosa-pp a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		$('.harian-diagnosa-pp, #tanggal-harian-diagnosa-pp, .rentang-waktu-diagnosa-pp').hide()
		$('#tempat-layanan-diagnosa-pp, .rajal-diagnosa-pp').show()
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

	function getLaporanDiagnosaPp(page) {
		//Laporan diagnosa
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

		if ($('#jenis-laporan').val() == "6") {
			$('.lap-diagnosa-pp, #table-lap-diagnosa tbody').show();

			periodeLaporan = $('#periode-laporan-diagnosa-pp').val();

			if(periodeLaporan === 'Rentang Waktu'){

				let cekTanggalAwal = $('#tanggal-awal-diagnosa-pp').val();
				let cekTanggalAkhir = $('#tanggal-akhir-diagnosa-pp').val();

				tahunAwal = cekTahun(cekTanggalAwal);
				tahunAkhir = cekTahun(cekTanggalAkhir);

				bulanTahunAwal = cekBulanTahun(cekTanggalAwal);
				bulanTahunAkhir = cekBulanTahun(cekTanggalAkhir);

				if(tahunAwal === undefined){

					syams_validation('#tanggal-awal-diagnosa-pp', 'Tanggal Awal tidak terdefinisi');
					return false;

				}

				if(tahunAkhir === undefined){

					syams_validation('#tanggal-akhir-diagnosa-pp', 'Tanggal Akhir tidak terdefinisi');
					return false;

				}

				if(bulanTahunAwal > bulanTahunAkhir){

					syams_validation('#tanggal-awal-diagnosa-pp', 'Tanggal Awal tidak Boleh lebih dari Tanggal Akhir');
					return false;

				}

				if(parseInt(tahunAwal) > parseInt(tahunAkhir)){

					syams_validation('#tanggal-awal-diagnosa-pp', 'Tahun Awal Tidak boleh Lebih dari Tahun Akhir');
					return false;

				}

				if(parseInt(tahunAwal) < 2022){

					syams_validation('#tanggal-awal-diagnosa-pp', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAkhir) > new Date().getFullYear()){

					syams_validation('#tanggal-akhir-diagnosa-pp', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				tanggalAwal = cekDateTime('#tanggal-awal-diagnosa-pp', cekTanggalAwal);
				tanggalAkhir = cekDateTime('#tanggal-akhir-diagnosa-pp', cekTanggalAkhir);

				syams_validation_remove('#tanggal-awal-diagnosa-pp');
        		syams_validation_remove('#tanggal-akhir-diagnosa-pp');

        	}

			if(periodeLaporan === 'Harian'){

				tanggalHarian = $('#tanggal-harian-diagnosa-pp').val();

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

					syams_validation('#tanggal-harian-diagnosa-pp', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAwal) > new Date().getFullYear()){

					syams_validation('#tanggal-harian-diagnosa-pp', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				if(bulanTahunAwal > tanggalHariIni){

					syams_validation('#tanggal-harian-diagnosa-pp', 'Tanggal Harian tidak boleh lebih dari pada Tanggal Hari ini');
					return false;

				}

				syams_validation_remove('#tanggal-harian-diagnosa-pp');

			}


			if(periodeLaporan === 'Bulanan'){

				periksaBulan = $('#bulan-diagnosa-pp').val();
				periksaTahun = $('#tahun-diagnosa-pp').val();

				bulanSekarang = new Date().getMonth() + 1;
				tahunSekarang = new Date().getFullYear();


				if(parseInt(periksaTahun) < 2023){

					if(parseInt(periksaBulan) < 3){

						syams_validation('#bulan-diagnosa-pp', 'Bulan Tidak Boleh Kurang dari Bulan Maret 2022');
						return false;

					}

				}

				if(parseInt(periksaTahun) > new Date().getFullYear()){

					syams_validation('#tahun-diagnosa-pp', 'Tahun Tidak Boleh Lebih Dari Tahun Sekarang');
					return false;

				}

				if(parseInt(periksaTahun) === new Date().getFullYear() && (parseInt(periksaBulan) > (new Date().getMonth() + 1))){

					syams_validation('#bulan-diagnosa-pp', 'Belum ada Data di Bulan tersebut');
					return false;

				}

				syams_validation_remove('#tahun-diagnosa-pp');
        		syams_validation_remove('#bulan-diagnosa-pp');

			}

			openData();		

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rajal/api/laporan_rajal/get_list_laporan_diagnosa_pp') ?>/page/' + page + '/jenis/',
				data: $('#form-search-diagnosa-pp').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {

					if(typeof data.data === 'undefined' | data.data === null){

						messageCustom('Tidak Ada Data', 'Error');
						return false;

					}

					if ((page - 1) & (data.data.length === 0)) {
						getLaporanDiagnosaPp(page - 1);
						return false;
					}

					$('#jenis-periode-diagnosa-pp').html('Periode : ' + data.periode);
					$('#pagination-diagnosa-pp').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-diagnosa-pp').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-diagnosa-pp, #table-lap-diagnosa-pp tbody').show();
					$('#table-lap-diagnosa-pp tbody').empty();
					$('#table-lap-diagnosa-pp tfoot').empty();

					let i = 1;

					$.each(data.data, function(i, v) {
						let html = /* html */ ``
						let rowspan = v.diagnosa_data.length;
						$.each(v.diagnosa_data, function(index, val) {
							if (index <= 0) {
								html += `<tr>
									<td class="center" rowspan="${rowspan}">${((i + 1) + ((data.page - 1) * data.limit))}</td>
									<td class="center" rowspan="${rowspan}">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
									<td class="center" rowspan="${rowspan}">${v.id_pasien}</td>
									<td rowspan="${rowspan}">${v.nama_pasien}</td>
									<td class="center" rowspan="${rowspan}">${(v.penjamin !== null ? v.penjamin : 'Tunai')}</td>
									<td class="center" rowspan="${rowspan}">${(v.unit_pelayanan !== null ? v.unit_pelayanan : '-')}</td>
									<td>${val.icdx_diagnosa}</td>
									<td class="center">${val.prioritas !== null ? val.prioritas : '-'}</td>
									<td rowspan="${rowspan}">${(v.nama_dokter !== null ? v.nama_dokter : '-')}</td>
									<td class="center">${val.diagnosa_akhir !== null ? val.diagnosa_akhir : '-'}</td>
									<td class="center">${val.kasus}</td>
									<td class="center" rowspan="${rowspan}">${v.status_kunjungan}</td>
									<td class="center" rowspan="${rowspan}">${v.kelamin}</td>
									<td class="center" rowspan="${rowspan}">${v.umur}</td>
									<td rowspan="${rowspan}">${v.alamat}</td>
									<td class="center" rowspan="${rowspan}">${v.nama_kec}</td>
									<td class="center" rowspan="${rowspan}">${datetimefmysql(v.tgl_selesai)}</td>
								</tr>`
							} else {
								html += `<tr>
									<td>${val.icdx_diagnosa}</td>
									<td class="center">${val.prioritas !== null ? val.prioritas : '-'}</td>
									<td class="center">${val.diagnosa_akhir !== null ? val.diagnosa_akhir : '-'}</td>
									<td class="center">${val.kasus}</td>
								</tr>`
							}

						})

						$('#table-lap-diagnosa-pp tbody').append(html);
					})

				},
				complete: function() {
					hideLoader()
					$('#modal-search-diagnosa-pp').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}

</script>
