<!-- Modal Search -->
<div id="modal-search-status-keluar" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-status-keluar-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-status-keluar-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-modal-search-status-keluar role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-status-keluar" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-status-keluar class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-status-keluar form-group row tight">
					<label for="bulan-status-keluar" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-status-keluar class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-status-keluar" class="form-control">
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
				<div class="rentang-waktu-status-keluar form-group row tight">
					<label for="tanggal-awal-status-keluar" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-status-keluar" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-status-keluar" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-status-keluar form-group row tight">
					<label for="tanggal-harian-status-keluar" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-status-keluar" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="asal-kunjungan-status-keluar form-group row tight">
					<label for="asal-kunjungan-status-keluar" class="col-md-3 col-form-label">Asal Kunjungan</label>
					<div class="col-md-9">
						<?= form_dropdown('asal_kunjungan_status_keluar', $asal_kunjungan_status_keluar, array(), 'id=asal-kunjungan-status-keluar class=form-control') ?>
					</div>
				</div>
				<div class="status-keluar form-group row tight">
					<label for="status-keluar" class="col-md-3 col-form-label">Status Keluar</label>
					<div class="col-md-9">
						<?= form_dropdown('status_keluar', $status_keluar, array(), 'id=status-keluar class=form-control') ?>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanStatusKeluar(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	$('#tanggal-awal-status-keluar, #tanggal-akhir-status-keluar, #tanggal-harian-status-keluar').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-status-keluar').change(function() {
		if ($('#periode-laporan-status-keluar').val() == 'Bulanan') {
			$('.bulanan-status-keluar, #bulan-status-keluar, #tahun-status-keluar').show();
			$('.harian-status-keluar, .rentang-waktu-status-keluar, #tanggal-awal-status-keluar, #tanggal-akhir-status-keluar').hide();
		}
		if ($('#periode-laporan-status-keluar').val() == 'Rentang Waktu') {
			$('.rentang-waktu-status-keluar, #tanggal-awal-status-keluar, #tanggal-akhir-status-keluar').show();
			$('.harian-status-keluar, #tanggal-harian-status-keluar, .bulanan-status-keluar, #bulan-status-keluar, #tahun-status-keluar').hide();
		}
		if ($('#periode-laporan-status-keluar').val() == 'Harian') {
			$('.harian-status-keluar, #tanggal-harian-status-keluar').show();
			$('.bulanan-status-keluar, .rentang-waktu-status-keluar').hide();
		}
	});

	$('#unit-modal-search-status-keluar').select2({
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

	function resetFormStatusKeluar() {
		$('#periode-laporan-status-keluar').val('Bulanan')
		$('#bulan-status-keluar').val('<?= date('m') ?>')
		$('#tahun-status-keluar').val('<?= date('Y') ?>')
		$('.bulanan-status-keluar, #tahun-status-keluar, #bulan-status-keluar').show()
		$('#tanggal-awal-status-keluar, #tanggal-akhir-status-keluar, #tanggal-harian-status-keluar').val('<?= date('d/m/Y') ?>')
		$('#jenis-status-keluar', '#unit-modal-search-status-keluar', '#tempat-layanan-status-keluar').val('')
		$('.harian-status-keluar, #tanggal-harian-status-keluar, .rentang-waktu-status-keluar').hide()
		$('#asal-kunjungan-status-keluar, .asal-kunjungan-status-keluar').show()
		$('#status-keluar, .status-keluar').show()
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

	function getLaporanStatusKeluar(page) {
		console.log(page)
		//Laporan diagnosa
		$('#page-now').val(page);
		var periodeLaporan = '';
		var tanggalHarian = '';
		var bulanTahunAkhir = '';
		var periksaBulan = '';
		var periksaTahun = '';
		var tahunAwal = '';
		var tahunAkhir = '';
		var bulanTahunAwal = '';
		var tanggalHariIni = '';

		if ($('#jenis-laporan').val() == "7") {
			$('.lap-status-keluar, #table-lap-status-keluar tbody').show();

			periodeLaporan = $('#periode-laporan-status-keluar').val();

			if(periodeLaporan === 'Rentang Waktu'){

				let cekTanggalAwal = $('#tanggal-awal-status-keluar').val();
				let cekTanggalAkhir = $('#tanggal-akhir-status-keluar').val();

				tahunAwal = cekTahun(cekTanggalAwal);
				tahunAkhir = cekTahun(cekTanggalAkhir);

				bulanTahunAwal = cekBulanTahun(cekTanggalAwal);
				bulanTahunAkhir = cekBulanTahun(cekTanggalAkhir);

				if(tahunAwal === undefined){

					syams_validation('#tanggal-awal-status-keluar', 'Tanggal Awal tidak terdefinisi');
					return false;

				}

				if(tahunAkhir === undefined){

					syams_validation('#tanggal-akhir-status-keluar', 'Tanggal Akhir tidak terdefinisi');
					return false;

				}

				if(bulanTahunAwal > bulanTahunAkhir){

					syams_validation('#tanggal-awal-status-keluar', 'Tanggal Awal tidak Boleh lebih dari Tanggal Akhir');
					return false;

				}

				if(parseInt(tahunAwal) > parseInt(tahunAkhir)){

					syams_validation('#tanggal-awal-status-keluar', 'Tahun Awal Tidak boleh Lebih dari Tahun Akhir');
					return false;

				}

				if(parseInt(tahunAwal) < 2022){

					syams_validation('#tanggal-awal-status-keluar', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAkhir) > new Date().getFullYear()){

					syams_validation('#tanggal-akhir-status-keluar', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				syams_validation_remove('#tanggal-awal-status-keluar');
        		syams_validation_remove('#tanggal-akhir-status-keluar');

        	}

			if(periodeLaporan === 'Harian'){

				tanggalHarian = $('#tanggal-harian-status-keluar').val();

				tahunAwal = cekTahun(tanggalHarian);
				bulanTahunAwal = cekBulanTahun(tanggalHarian);

				var x = new Date();
			    var date = x.getDate();
			    var month = x.getMonth();
			    month++;

				if (month < 10) {
			        month = '0' + String(month);
			    }

			    if (date < 10) {
			        date = '0' + String(date);
			    }

				tanggalHariIni = new Date().getFullYear() + '-' + month + '-' + date;

				if(parseInt(tahunAwal) < 2022){

					syams_validation('#tanggal-harian-status-keluar', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAwal) > new Date().getFullYear()){

					syams_validation('#tanggal-harian-status-keluar', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				if(bulanTahunAwal > tanggalHariIni){

					syams_validation('#tanggal-harian-status-keluar', 'Tanggal Harian tidak boleh lebih dari pada Tanggal Hari ini');
					return false;

				}

				syams_validation_remove('#tanggal-harian-status-keluar');

			}


			if(periodeLaporan === 'Bulanan'){

				periksaBulan = $('#bulan-status-keluar').val();
				periksaTahun = $('#tahun-status-keluar').val();


				if(parseInt(periksaTahun) < 2023){

					if(parseInt(periksaBulan) < 3){

						syams_validation('#bulan-status-keluar', 'Bulan Tidak Boleh Kurang dari Bulan Maret 2022');
						return false;

					}

				}

				if(parseInt(periksaTahun) > new Date().getFullYear()){

					syams_validation('#tahun-status-keluar', 'Tahun Tidak Boleh Lebih Dari Tahun Sekarang');
					return false;

				}

				if(parseInt(periksaTahun) === new Date().getFullYear() && (parseInt(periksaBulan) > (new Date().getMonth() + 1))){

					syams_validation('#bulan-status-keluar', 'Belum ada Data di Bulan tersebut');
					return false;

				}

				syams_validation_remove('#tahun-status-keluar');
        		syams_validation_remove('#bulan-status-keluar');

			}

			openData();		

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rajal/api/laporan_rajal/get_list_laporan_rm_11') ?>/page/' + page + '/jenis/',
				data: $('#form-modal-search-status-keluar').serialize(),
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
						getLaporanStatusKeluar(page - 1);
						return false;
					}

					$('#jenis-periode-status-keluar').html('Periode : ' + data.periode);
					$('#pagination-status-keluar').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-status-keluar').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-status-keluar, #table-lap-status-keluar tbody').show();
					$('#table-lap-status-keluar tbody').empty();
					$('#table-lap-status-keluar tfoot').empty();

					let i = 1;

					let html = '';

					console.log(data)

					$.each(data.data, function(i, v) {
						let jenis_rawat = ''
						if (v.jenis_rawat !== 'IGD') {
							jenis_rawat = v.jenis_rawat + ' (' + v.unit_poli + ')';
						} else {
							jenis_rawat = v.jenis_rawat;
						}

						let keteranganRujukan = "-";
						if (v.tujuan_rujukan !== '' && v.tujuan_rujukan !== null){
							keteranganRujukan = v.tujuan_rujukan + (v.ket_rujukan !== '' && v.ket_rujukan !== null ? ' ( ' + v.ket_rujukan + ' )' : '');
						}

						const html = `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.tanggal_daftar}</td>
								<td class="center">${v.tanggal_keluar}</td>
								<td class="center">${v.no_rm}</td>
								<td class="left">${v.nama}</td>
								<td class="center">${v.kelamin}</td>
								<td class="center">${hitungUmur(v.tanggal_lahir)}</td>
								<td class="center">${v.status_kunjungan}</td>
								<td class="left">${v.alamat}</td>
								<td class="center">${v.nama_kec}</td>
								<td class="left">${v.unit_poli}</td>
								<td class="left">${v.diagnosa !== "" ? v.diagnosa : '-'}</td>
								<td class="left">${v.nama_coder !== "" ? v.nama_coder : '-'}</td>
								<td class="left">${v.dokter_dpjp}</td>
								<td class="center">${v.status_keluar}</td>
								<td class="left">${keteranganRujukan}</td>
							<tr>
						`;
						$('#table-lap-status-keluar tbody').append(html)
					})

				},
				complete: function() {
					hideLoader()
					$('#modal-search-status-keluar').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}


</script>
