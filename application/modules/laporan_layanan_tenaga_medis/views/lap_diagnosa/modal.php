<!-- Modal Search -->
<div id="modal-search-diagnosa" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-diagnosa-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-diagnosa-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-diagnosa role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-diagnosa" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-diagnosa class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-diagnosa form-group row tight">
					<label for="bulan-diagnosa" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-diagnosa class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-diagnosa" class="form-control">
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
				<div class="rentang-waktu-diagnosa form-group row tight">
					<label for="tanggal-awal-diagnosa" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-diagnosa" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-diagnosa" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-diagnosa form-group row tight">
					<label for="tanggal-harian-diagnosa" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-diagnosa" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="rajal-diagnosa form-group row tight">
					<label for="tempat-layanan-diagnosa" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan', $tempat_layanan, array(), 'id=tempat-layanan-diagnosa class=form-control') ?>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanDiagnosa(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-diagnosa, #tanggal-akhir-diagnosa, #tanggal-harian-diagnosa').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-diagnosa').change(function() {
		if ($('#periode-laporan-diagnosa').val() == 'Bulanan') {
			$('.bulanan-diagnosa, #bulan-diagnosa, #tahun-diagnosa').show();
			$('.harian-diagnosa, .rentang-waktu-diagnosa, #tanggal-awal-diagnosa, #tanggal-akhir-diagnosa').hide();
		}
		if ($('#periode-laporan-diagnosa').val() == 'Rentang Waktu') {
			$('.rentang-waktu-diagnosa, #tanggal-awal-diagnosa, #tanggal-akhir-diagnosa').show();
			$('.harian-diagnosa, #tanggal-harian-diagnosa, .bulanan-diagnosa, #bulan-diagnosa, #tahun-diagnosa').hide();
		}
		if ($('#periode-laporan-diagnosa').val() == 'Harian') {
			$('.harian-diagnosa, #tanggal-harian-diagnosa').show();
			$('.bulanan-diagnosa, .rentang-waktu-diagnosa').hide();
		}
	});

	$('#unit-search-diagnosa').select2({
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

	function resetFormDiagnosa() {
		$('#periode-laporan-diagnosa').val('Bulanan')
		$('#bulan-diagnosa').val('<?= date('m') ?>')
		$('#tahun-diagnosa').val('<?= date('Y') ?>')
		$('.bulanan-diagnosa, #tahun-diagnosa, #bulan-diagnosa').show()
		$('#tanggal-awal-diagnosa, #tanggal-akhir-diagnosa, #tanggal-harian-diagnosa').val('<?= date('d/m/Y') ?>')
		$('#jenis-diagnosa', '#unit-search-diagnosa', '#tempat-layanan-diagnosa').val('')
		$('#unit-search-diagnosa').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search-diagnosa a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		$('.harian-diagnosa, #tanggal-harian-diagnosa, .rentang-waktu-diagnosa').hide()
		$('#tempat-layanan-diagnosa, .rajal-diagnosa').show()
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

	function getLaporanDiagnosa(page) {
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

		if ($('#jenis-laporan').val() == "5") {
			$('.lap-diagnosa, #table-lap-diagnosa tbody').show();

			periodeLaporan = $('#periode-laporan-diagnosa').val();

			if(periodeLaporan === 'Rentang Waktu'){

				let cekTanggalAwal = $('#tanggal-awal-diagnosa').val();
				let cekTanggalAkhir = $('#tanggal-akhir-diagnosa').val();

				tahunAwal = cekTahun(cekTanggalAwal);
				tahunAkhir = cekTahun(cekTanggalAkhir);

				bulanTahunAwal = cekBulanTahun(cekTanggalAwal);
				bulanTahunAkhir = cekBulanTahun(cekTanggalAkhir);

				if(tahunAwal === undefined){

					syams_validation('#tanggal-awal-diagnosa', 'Tanggal Awal tidak terdefinisi');
					return false;

				}

				if(tahunAkhir === undefined){

					syams_validation('#tanggal-akhir-diagnosa', 'Tanggal Akhir tidak terdefinisi');
					return false;

				}

				if(bulanTahunAwal > bulanTahunAkhir){

					syams_validation('#tanggal-awal-diagnosa', 'Tanggal Awal tidak Boleh lebih dari Tanggal Akhir');
					return false;

				}

				if(parseInt(tahunAwal) > parseInt(tahunAkhir)){

					syams_validation('#tanggal-awal-diagnosa', 'Tahun Awal Tidak boleh Lebih dari Tahun Akhir');
					return false;

				}

				if(parseInt(tahunAwal) < 2022){

					syams_validation('#tanggal-awal-diagnosa', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAkhir) > new Date().getFullYear()){

					syams_validation('#tanggal-akhir-diagnosa', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				tanggalAwal = cekDateTime('#tanggal-awal-diagnosa', cekTanggalAwal);
				tanggalAkhir = cekDateTime('#tanggal-akhir-diagnosa', cekTanggalAkhir);

				syams_validation_remove('#tanggal-awal-diagnosa');
        		syams_validation_remove('#tanggal-akhir-diagnosa');

        	}

			if(periodeLaporan === 'Harian'){

				tanggalHarian = $('#tanggal-harian-diagnosa').val();

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

					syams_validation('#tanggal-harian-diagnosa', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAwal) > new Date().getFullYear()){

					syams_validation('#tanggal-harian-diagnosa', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				if(bulanTahunAwal > tanggalHariIni){

					syams_validation('#tanggal-harian-diagnosa', 'Tanggal Harian tidak boleh lebih dari pada Tanggal Hari ini');
					return false;

				}

				syams_validation_remove('#tanggal-harian-diagnosa');

			}


			if(periodeLaporan === 'Bulanan'){

				periksaBulan = $('#bulan-diagnosa').val();
				periksaTahun = $('#tahun-diagnosa').val();

				bulanSekarang = new Date().getMonth() + 1;
				tahunSekarang = new Date().getFullYear();


				if(parseInt(periksaTahun) < 2023){

					if(parseInt(periksaBulan) < 3){

						syams_validation('#bulan-diagnosa', 'Bulan Tidak Boleh Kurang dari Bulan Maret 2022');
						return false;

					}

				}

				if(parseInt(periksaTahun) > new Date().getFullYear()){

					syams_validation('#tahun-diagnosa', 'Tahun Tidak Boleh Lebih Dari Tahun Sekarang');
					return false;

				}

				if(parseInt(periksaTahun) === new Date().getFullYear() && (parseInt(periksaBulan) > (new Date().getMonth() + 1))){

					syams_validation('#bulan-diagnosa', 'Belum ada Data di Bulan tersebut');
					return false;

				}

				syams_validation_remove('#tahun-diagnosa');
        		syams_validation_remove('#bulan-diagnosa');

			}

			openData();		

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rajal/api/laporan_rajal/get_list_laporan_diagnosa') ?>/page/' + page + '/jenis/',
				data: $('#form-search-diagnosa').serialize(),
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
						getLaporanDiagnosa(page - 1);
						return false;
					}

					$('#jenis-periode-diagnosa').html('Periode : ' + data.periode);
					$('#pagination-diagnosa').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-diagnosa').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-diagnosa, #table-lap-diagnosa tbody').show();
					$('#table-lap-diagnosa tbody').empty();
					$('#table-lap-diagnosa tfoot').empty();

					let i = 1;

					let html = '';

					$.each(data.data, function(a, value) {

						html = `<tr>
									<td class="center">${((a + 1) + ((data.page - 1) * data.limit))}</td>
									<td class="center">${value.icdx}</td>
									<td class="left">${value.diagnosa}</td>
									<td class="left">${value.count}</td>
								</tr>
							`;

						$('#table-lap-diagnosa tbody').append(html);
		                
		            })

				},
				complete: function() {
					hideLoader()
					$('#modal-search-diagnosa').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}


</script>