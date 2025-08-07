<script>
	var dWidth = $(window).width()
	var dHeight = $(window).height()
	var x = screen.width / 2 - dWidth / 2
	var y = screen.height / 2 - dHeight / 2

	$(function() {
		getLaporanGizi(1);
		$('.lap-01').hide();
		$('.lap-02').hide();
		$('.lap-03').hide();
		$('.lap-04').hide();
		$('.lap-05').hide();
		$('.lap-06').hide();

		$('#jenis-laporan').change(function() {
			if ($('#jenis-laporan').val() !== '') {
				resetAllForm()
				$('#modal-search').modal('show')

				if ($('#jenis-laporan').val() == '1') {
					$('#jenis-diet').parent().parent().show();
					$('#tempat-layanan').parent().parent().show();

				} else if ($('#jenis-laporan').val() == '2') {
					$('#jenis-diet').parent().parent().show();
					$('#tempat-layanan').parent().parent().show();

				} else if ($('#jenis-laporan').val() == '3') {
					$('#jenis-diet').val(1);
					$('#jenis-diet').parent().parent().show();
					$('#tempat-layanan').parent().parent().show();

				} else if ($('#jenis-laporan').val() == '4') {
					$('#jenis-diet').parent().parent().hide();
					$('#tempat-layanan').parent().parent().show();

				} else if ($('#jenis-laporan').val() == '5') {
					$('#jenis-diet').parent().parent().hide();
					$('#tempat-layanan').parent().parent().hide();
				
				}else if ($('#jenis-laporan').val() == '6') {
					$('#jenis-diet').parent().parent().show();
					$('#tempat-layanan').parent().parent().show();
				
				} else {				
					$('#jenis-diet').parent().parent().hide();
					$('#tempat-layanan').parent().parent().hide();
				}

			} else {
				$('#modal-search').modal('hide')
			}
			
			$('#periode-laporan').prop('disabled',false);
			// if($('#jenis-laporan').val() == '3'){
			// 	$('#periode-laporan').prop('disabled',true);
			// 	$('#periode-laporan').val('Bulanan') ;
			// 	$('.bulanan, #bulan, #tahun').show();
			// 	$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
			// }
		})

		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
			format: 'dd/mm/yyyy',
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#btn-search').click(function() {
			if ($('#jenis-laporan').val() !== '') {
				$('#modal-search').modal('show')
			} else {
				$('#modal-search').modal('hide')
			}
		})

		$('#periode-laporan').change(function() {
			if ($('#periode-laporan').val() == 'Harian') {
				$('.harian, #tanggal-harian').show()
				$('.bulanan, .rentang-waktu').hide()
			}
			if ($('#periode-laporan').val() == 'Bulanan') {
				$('.bulanan, #bulan, #tahun').show()
				$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide()
			}
			if ($('#periode-laporan').val() == 'Rentang Waktu') {
				$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show()
				$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide()
			}
		})

        $('#tempat-layanan').change(function() {
			$('#ruangan-ic').val('');
			$('#ruangan-ranap').val('');

			if ($('#tempat-layanan').val() === '1') {
				$('#ruangan-ic').parent().parent().hide();
				$('#ruangan-ranap').parent().parent().show();
			} else if ($('#tempat-layanan').val() === '2') {
				$('#ruangan-ic').parent().parent().show();
				$('#ruangan-ranap').parent().parent().hide();
			} else {
				$('#ruangan-ic').parent().parent().hide();
				$('#ruangan-ranap').parent().parent().hide();
			}
		})

		$('.validasi-input, .form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		})

		$('#btn-reload').click(function() {
			reloadData();
		})		

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_gizi/export_laporan_01?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_gizi/export_laporan_02?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_gizi/export_laporan_03?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '4') {
				window.open('<?= base_url('laporan_gizi/export_laporan_04?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '5') {
				window.open('<?= base_url('laporan_gizi/export_laporan_05?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '6') {
				window.open('<?= base_url('laporan_gizi/export_laporan_06?') ?>' + $('#form-search').serialize())
			} else {				
				swalAlert('info', 'INFO', `Pilih laporan gizi / Export Data belum tersedia.`)
			}
		})
	})

	function reloadData() {
		$('#jenis-laporan').val('')
		resetLap()
		resetAllForm()
	}

	function resetAllForm() {
		$('#periode-laporan').val('Harian');
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');
		$('#bulan').val('<?= date('m') ?>');
		$('.harian, #tanggal-harian').show();
		$('.bulanan, .rentang-waktu').hide();

        $('#jenis-diet').val('');
        $('#tempat-layanan').val('');
        $('#ruangan-ranap').val('');
        $('#ruangan-ic').val('');

		$('#ruangan-ranap').parent().parent().hide();
		$('#ruangan-ic').parent().parent().hide();
	}

	function resetLap() {
		$('.lap-01').hide();
		$('.lap-01, #table-data-01 tbody').hide();
		$('.lap-02').hide();
		$('.lap-02, #table-data-02 tbody').hide();
		$('.lap-03').hide();
		$('.lap-03, #table-data-03 tbody').hide();
		$('.lap-04').hide();
		$('.lap-04, #table-data-04 tbody').hide();
		$('.lap-05').hide();
		$('.lap-05, #table-data-05 tbody').hide();
		$('.lap-06').hide();
		$('.lap-06, #table-data-06 tbody').hide();
	}


	function getLaporanGizi(page) {
		resetLap();

		//Laporan 01 Daftar Permintaan Makan Pasien (DPMP) Ahli Gizi Ruanga
		if ($('#jenis-laporan').val() == '1') {
			$('#page-now').val(page)	
			$('.lap-01, #tabs-lap01').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_gizi/api/laporan_gizi/get_list_laporan_gizi_01') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						getListLaporanGizi01(data)
					}
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		} else if ($('#jenis-laporan').val() == '2') {
			$('#page-now').val(page)	
			$('.lap-02, #tabs-lap02').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_gizi/api/laporan_gizi/get_list_laporan_gizi_02') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						getListLaporanGizi02(data)
					}
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		} else if ($('#jenis-laporan').val() == '3') {
			var stop = false;
			if ($('#jenis-diet').val() === '') {
            syams_validation('#jenis-diet', 'Jenis Diet tidak boleh kosong !');
            stop = true;
			};

			if (stop) {
				return false;
			};

			$('#page-now').val(page)	
			$('.lap-03, #tabs-lap03').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_gizi/api/laporan_gizi/get_list_laporan_gizi_03') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						getListLaporanGizi03(data);
					}
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		} else if ($('#jenis-laporan').val() == '4') {
			$('#page-now').val(page)	
			$('.lap-04, #tabs-lap04').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_gizi/api/laporan_gizi/get_list_laporan_gizi_04') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						getListLaporanGizi04(data)
					}
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		} else if ($('#jenis-laporan').val() == '5') {
			$('#page-now').val(page)	
			$('.lap-05, #tabs-lap05').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_gizi/api/laporan_gizi/get_list_laporan_gizi_05') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						console.log(data.periode );
						$('#label-lap-05').empty();
						let periode  	   = data.periode  !== '' ? 	  	`<p><b>Periode &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
						let jenis_diet 	   = data.jenis_diet !== '' ? 	`<p><b>Jenis Diet &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.jenis_diet}</p>` : '';
						let label_05 	   = periode+jenis_diet;
						$('#label-lap-05').append(label_05);
						
						getListLaporanGizi05(data)
					}
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		} else if ($('#jenis-laporan').val() == '6') {
			$('#page-now').val(page)	
			$('.lap-06, #tabs-lap06').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_gizi/api/laporan_gizi/get_list_laporan_gizi_06') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						console.log(data.periode );
						$('#label-lap-06').empty();
						let periode  	   = data.periode  !== '' ? 	`<p><b>Periode &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
						let jenis_diet 	   = data.jenis_diet !== '' ? 	`<p><b>Jenis Diet &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.jenis_diet}</p>` : '';
						let label_06 	   = periode+jenis_diet;
						$('#label-lap-06').append(label_06);
						
						getListLaporanGizi06(data)
					}
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})
		}
	}

	function getListLaporanGizi01(data) {
		$('#label-lap-01').empty();
		let periode  	   = data.periode  != '' ? 	  	`<p><b>Periode &emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let jenis_diet 	   = data.jenis_diet != '' ? 	`<p><b>Jenis Diet &emsp;&emsp;&emsp;&emsp;:</b> ${data.jenis_diet}</p>` : '';
		let tempat_layanan = data.tempat_layanan != '' ?`<b>Tempat Layanan &emsp;:</b> ${data.tempat_layanan}` : '';
		let ruangan_ranap  = data.ruangan_ranap != '' ? ` (${data.ruangan_ranap})` : '';
		let ruangan_ic     = data.ruangan_ic != '' ? 	` (${data.ruangan_ic})` : '';
		let jml_data 	   = data.jml_data >=0 ? 		`<p><b>Jumlah Pasien &emsp;&emsp;:</b> ${data.jml_data}</p>` : '';
		let ruangan 	   = data.tempat_layanan == 'Rawat Inap'? `<p>`+tempat_layanan+ruangan_ranap+`</p>` : `<p>`+tempat_layanan+ruangan_ic+`</p>`;
		let label_01 	   = periode+jenis_diet+ruangan+jml_data;
		$('#label-lap-01').append(label_01);

		$('#pagination_01').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_01').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let html = '';
		$('#table-data-01').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Tgl Masuk</th>
						<th class="center">Tgl Order</th>
						<th class="center">Ruangan</th>
						<th class="center">No Rm</th>
						<th class="center">Nama</th>
						<th class="center">Umur</th>
						<th class="center">Tgl Lahir</th>
						<th class="center">P/L</th>
						<th class="center">Diagnosa Utama</th>
						<th class="center">Dokter</th>
						<th class="center">Diet</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			let dataDiet = '';
			dataDiet = getDataDiet(v,true);
			html += `<tr>
						<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
						<td class="center">${v.tanggal_layanan}</td>
						<td class="center">${v.waktu_dpmp}</td>
						<td class="left">${v.ruangan}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama}</td>
						<td class="left">${hitungUmur(v.tanggal_lahir)}</td>
						<td class="center">${datefmysql(v.tanggal_lahir)}</td>
						<td class="center">${v.kelamin}</td>
						<td class="left">${((v.diagnosa !== null) ? v.diagnosa : '')}</td>
						<td class="left">${v.dokter}</td>
						<td class="left">${dataDiet}</td>
					</tr>`
		})

		$('#table-data-01').append(html + '</tbody>')
	}

	function getListLaporanGizi02(data) {
		$('#label-lap-02').empty();
		let periode  	   = data.periode  != '' ? 	  	`<p><b>Periode &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let jenis_diet 	   = data.jenis_diet != '' ? 	`<p><b>Jenis Diet &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.jenis_diet}</p>` : '';
		let tempat_layanan = data.tempat_layanan != '' ?`<b>Tempat Layanan &emsp;&emsp;&emsp;:</b> ${data.tempat_layanan}` : '';
		let ruangan_ranap  = data.ruangan_ranap != '' ? ` (${data.ruangan_ranap})` : '';
		let ruangan_ic     = data.ruangan_ic != '' ? 	` (${data.ruangan_ic})` : '';
		let jml_data 	   = data.jml_data >=0 ? 		`<p><b>Jumlah Pasien &emsp;&emsp;&emsp;&emsp;:</b> ${data.jml_data}</p>` : '';
		let jml_data_all   = data.jml_data_all >=0 ? 	`<p><b>Jumlah Pasien Total &emsp;:</b> ${data.jml_data_all}</p>` : '';
		let ruangan 	   = data.tempat_layanan == 'Rawat Inap'? `<p>`+tempat_layanan+ruangan_ranap+`</p>` : `<p>`+tempat_layanan+ruangan_ic+`</p>`;
		let label_02 	   = periode+jenis_diet+ruangan+jml_data+jml_data_all;
		$('#label-lap-02').append(label_02);

		$('#pagination_02').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_02').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let html = '';
		$('#table-data-02').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Tgl Masuk</th>
						<th class="center">Tgl Order</th>
						<th class="center">Ruangan</th>
						<th class="center">No Rm</th>
						<th class="center">Nama</th>
						<th class="center">Umur</th>
						<th class="center">Tgl Lahir</th>
						<th class="center">P/L</th>
						<th class="center">Diagnosa Utama</th>
						<th class="center">Dokter</th>
						<th class="center">Diet</th>
						<th class="center">MP</th>
						<th class="center">SP</th>
						<th class="center">MS</th>
						<th class="center">SS</th>
						<th class="center">MM</th>
						<th class="center">SM</th>
						<th class="center">KET</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			let dataDiet = '';
			dataDiet = getDataDiet(v,true);
			html += `<tr>
						<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
						<td class="center">${v.tanggal_layanan}</td>
						<td class="center">${v.waktu_dpmp}</td>
						<td class="left">${v.ruangan}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama}</td>
						<td class="left">${hitungUmur(v.tanggal_lahir)}</td>
						<td class="center">${datefmysql(v.tanggal_lahir)}</td>
						<td class="center">${v.kelamin}</td>
						<td class="left">${((v.diagnosa !== null) ? v.diagnosa : '')}</td>
						<td class="left">${v.dokter}</td>
						<td class="left">${dataDiet}</td>
						<td class="left">${((v.mp_makan_pasien !== null) ? v.mp_makan_pasien : '')}</td>
						<td class="left">${((v.sp_makan_pasien !== null) ? v.sp_makan_pasien : '')}</td>
						<td class="left">${((v.ms_makan_pasien !== null) ? v.ms_makan_pasien : '')}</td>
						<td class="left">${((v.ss_makan_pasien !== null) ? v.ss_makan_pasien : '')}</td>
						<td class="left">${((v.mm_makan_pasien !== null) ? v.mm_makan_pasien : '')}</td>
						<td class="left">${((v.sm_makan_pasien !== null) ? v.sm_makan_pasien : '')}</td>
						<td class="left">${((v.ket_makan_pasien !== null) ? v.ket_makan_pasien : '')}</td>
					</tr>`
		})

		$('#table-data-02').append(html + '</tbody>')
	}

	function getListLaporanGizi03(data) {
		$('#label-lap-03').empty();
		let periode  	   = data.periode  != '' ? 	  	`<p><b>Periode &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let jenis_diet 	   = data.jenis_diet != '' ? 	`<p><b>Jenis Diet &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.jenis_diet}</p>` : '';
		let tempat_layanan = data.tempat_layanan != '' ?`<b>Tempat Layanan &emsp;&emsp;&emsp;:</b> ${data.tempat_layanan}` : '';
		let ruangan_ranap  = data.ruangan_ranap != '' ? ` (${data.ruangan_ranap})` : '';
		let ruangan_ic     = data.ruangan_ic != '' ? 	` (${data.ruangan_ic})` : '';
		let ruangan 	   = data.tempat_layanan == 'Rawat Inap'? `<p>`+tempat_layanan+ruangan_ranap+`</p>` : `<p>`+tempat_layanan+ruangan_ic+`</p>`;
		let label_03 	   = periode+jenis_diet+ruangan;
		$('#label-lap-03').append(label_03);

		let html = '';
		$('#table-data-03').empty()
		// $.each(data.data, function(i, v) {
		if(data.jenis_diet == 'Diet Makan'){
			html = '';
			html += `<div class="col-lg-6 table-responsive">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center" colspan="9">JENIS DIET</th>
						</tr>
						<tr>
							<th class="center">No</th>	
							<th class="center">Diet</th>	
							<th class="center">MP</th>
							<th class="center">SP</th>
							<th class="center">MS</th>
							<th class="center">SS</th>
							<th class="center">MM</th>
							<th class="center">SM</th>
							<th class="center">TOTAL</th>
						</tr>
					</thead>
				<tbody>`;

				let no_jns = 0; let jml_total_jns= 0; 
				let jml_mp_jns = 0; let jml_sp_jns = 0; 
				let jml_ms_jns = 0; let jml_ss_jns = 0; 
				let jml_mm_jns = 0; let jml_sm_jns = 0; 
				$.each(data.jenisdiet, function(i, v) {
					no_jns += 1; jml_total_jns += parseInt(v.total);
					jml_mp_jns += parseInt(v.mp); jml_sp_jns += parseInt(v.sp);
					jml_ms_jns += parseInt(v.ms); jml_ss_jns += parseInt(v.ss);
					jml_mm_jns += parseInt(v.mm); jml_sm_jns += parseInt(v.sm); 

					html += `<tr>
						<td class="center">${no_jns}</td>
						<td class="left">${i}</td>
						<td class="center">${v.mp}</td>
						<td class="center">${v.sp}</td>
						<td class="center">${v.ms}</td>
						<td class="center">${v.ss}</td>
						<td class="center">${v.mm}</td>
						<td class="center">${v.sm}</td>
						<td class="center">${v.total}</td>
					</tr>`;
				});

				html += `<tr>
						<td class="center" colspan="2"><b>JUMLAH</b></td>
						<td class="center"><b>${jml_mp_jns}</b></td>
						<td class="center"><b>${jml_sp_jns}</b></td>
						<td class="center"><b>${jml_ms_jns}</b></td>
						<td class="center"><b>${jml_ss_jns}</b></td>
						<td class="center"><b>${jml_mm_jns}</b></td>
						<td class="center"><b>${jml_sm_jns}</b></td>
						<td class="center"><b>${jml_total_jns}</b></td>
					</tr>`

			html += `</tbody>
				</table>
			</div>`;


			html += `<div class="col-lg-6 table-responsive">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center" colspan="9">BENTUK MAKAN</th>
						</tr>
						<tr>
							<th class="center">No</th>	
							<th class="center">Bentuk</th>	
							<th class="center">MP</th>
							<th class="center">SP</th>
							<th class="center">MS</th>
							<th class="center">SS</th>
							<th class="center">MM</th>
							<th class="center">SM</th>
							<th class="center">TOTAL</th>
						</tr>
					</thead>
				<tbody>`;

				let no_bentuk = 0; let jml_total_bentuk= 0; 
				let jml_mp_bentuk = 0; let jml_sp_bentuk = 0; 
				let jml_ms_bentuk = 0; let jml_ss_bentuk = 0; 
				let jml_mm_bentuk = 0; let jml_sm_bentuk = 0; 
				$.each(data.bentukmakan, function(i, v) {
					no_bentuk += 1; jml_total_bentuk += parseInt(v.total);
					jml_mp_bentuk += parseInt(v.mp); jml_sp_bentuk += parseInt(v.sp);
					jml_ms_bentuk += parseInt(v.ms); jml_ss_bentuk += parseInt(v.ss);
					jml_mm_bentuk += parseInt(v.mm); jml_sm_bentuk += parseInt(v.sm); 

					html += `<tr>
						<td class="center">${no_bentuk}</td>
						<td class="left">${i}</td>
						<td class="center">${v.mp}</td>
						<td class="center">${v.sp}</td>
						<td class="center">${v.ms}</td>
						<td class="center">${v.ss}</td>
						<td class="center">${v.mm}</td>
						<td class="center">${v.sm}</td>
						<td class="center">${v.total}</td>
					</tr>`;
				});

				html += `<tr>
						<td class="right" colspan="2"><b>JUMLAH</b></td>
						<td class="center"><b>${jml_mp_bentuk}</b></td>
						<td class="center"><b>${jml_sp_bentuk}</b></td>
						<td class="center"><b>${jml_ms_bentuk}</b></td>
						<td class="center"><b>${jml_ss_bentuk}</b></td>
						<td class="center"><b>${jml_mm_bentuk}</b></td>
						<td class="center"><b>${jml_sm_bentuk}</b></td>
						<td class="center"><b>${jml_total_bentuk}</b></td>
					</tr>`

			html += `</tbody>
				</table>
			</div>`;

		} else {
			html = '';
			html += `<div class="col-lg-12 table-responsive">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center" colspan="10">DIET CAIR</th>
						</tr>
						<tr>
							<th class="center">No</th>	
							<th class="center">Merek</th>	
							<th class="center">Jenis Susu</th>	
							<th class="center">MP</th>
							<th class="center">SP</th>
							<th class="center">MS</th>
							<th class="center">SS</th>
							<th class="center">MM</th>
							<th class="center">SM</th>
							<th class="center">TOTAL</th>
						</tr>
					</thead>
				<tbody>`;

				let no_cair = 0; let jml_total_cair= 0; 
				let jml_mp_cair = 0; let jml_sp_cair = 0; 
				let jml_ms_cair = 0; let jml_ss_cair = 0; 
				let jml_mm_cair = 0; let jml_sm_cair = 0; 
				$.each(data.cair, function(i, v) {
					no_cair += 1; jml_total_cair += parseInt(v.total);
					jml_mp_cair += parseInt(v.mp); jml_sp_cair += parseInt(v.sp);
					jml_ms_cair += parseInt(v.ms); jml_ss_cair += parseInt(v.ss);
					jml_mm_cair += parseInt(v.mm); jml_sm_cair += parseInt(v.sm); 

					html += `<tr>
						<td class="center">${no_cair}</td>
						<td class="left">${i}</td>
						<td class="left">${v.jenis_susu}</td>
						<td class="center">${v.mp}</td>
						<td class="center">${v.sp}</td>
						<td class="center">${v.ms}</td>
						<td class="center">${v.ss}</td>
						<td class="center">${v.mm}</td>
						<td class="center">${v.sm}</td>
						<td class="center">${v.total}</td>
					</tr>`;
				});

				html += `<tr>
						<td class="right" colspan="3"><b>JUMLAH</b></td>
						<td class="center"><b>${jml_mp_cair}</b></td>
						<td class="center"><b>${jml_sp_cair}</b></td>
						<td class="center"><b>${jml_ms_cair}</b></td>
						<td class="center"><b>${jml_ss_cair}</b></td>
						<td class="center"><b>${jml_mm_cair}</b></td>
						<td class="center"><b>${jml_sm_cair}</b></td>
						<td class="center"><b>${jml_total_cair}</b></td>
					</tr>`

			html += `</tbody>
				</table>
			</div>`;
		}
		$('#table-data-03').append(html)



		// let html = '';
		// $('#table-data-03').empty()
		// html += `<thead>
		// 			<tr>
		// 				<th class="center">No.</th>
		// 				<th class="center">Tgl Masuk</th>
		// 				<th class="center">Tgl Order</th>
		// 				<th class="center">Ruangan</th>
		// 				<th class="center">No Rm</th>
		// 				<th class="center">Nama</th>
		// 				<th class="center">Umur</th>
		// 				<th class="center">Tgl Lahir</th>
		// 				<th class="center">P/L</th>
		// 				<th class="center">Diagnosa Utama</th>
		// 				<th class="center">Dokter</th>
		// 				<th class="center">Diet</th>
		// 				<th class="center">MP</th>
		// 				<th class="center">SP</th>
		// 				<th class="center">MS</th>
		// 				<th class="center">SS</th>
		// 				<th class="center">MM</th>
		// 				<th class="center">SM</th>
		// 				<th class="center">KET</th>
		// 			</tr>
		// 		</thead>
		// 		<tbody>`
					
		// $.each(data.data, function(i, v) {
		// 	let dataDiet = '';
		// 	dataDiet = getDataDiet(v,true);
		// 	html += `<tr>
		// 				<td class="center">${((i + 1))}</td>
		// 				<td class="center">${v.tanggal_layanan}</td>
		// 				<td class="center">${v.waktu_dpmp}</td>
		// 				<td class="left">${v.ruangan}</td>
		// 				<td class="center">${v.id_pasien}</td>
		// 				<td class="left">${v.nama}</td>
		// 				<td class="left">${hitungUmur(v.tanggal_lahir)}</td>
		// 				<td class="center">${datefmysql(v.tanggal_lahir)}</td>
		// 				<td class="center">${v.kelamin}</td>
		// 				<td class="left">${((v.diagnosa !== null) ? v.diagnosa : '')}</td>
		// 				<td class="left">${v.dokter}</td>
		// 				<td class="left">${dataDiet}</td>
		// 				<td class="left">${((v.mp_makan_pasien !== null) ? v.mp_makan_pasien : '')}</td>
		// 				<td class="left">${((v.sp_makan_pasien !== null) ? v.sp_makan_pasien : '')}</td>
		// 				<td class="left">${((v.ms_makan_pasien !== null) ? v.ms_makan_pasien : '')}</td>
		// 				<td class="left">${((v.ss_makan_pasien !== null) ? v.ss_makan_pasien : '')}</td>
		// 				<td class="left">${((v.mm_makan_pasien !== null) ? v.mm_makan_pasien : '')}</td>
		// 				<td class="left">${((v.sm_makan_pasien !== null) ? v.sm_makan_pasien : '')}</td>
		// 				<td class="left">${((v.ket_makan_pasien !== null) ? v.ket_makan_pasien : '')}</td>
		// 			</tr>`
		// })

		// $('#table-data-03').append(html + '</tbody>')
	}

	function getListLaporanGizi04(data) {
		$('#label-lap-04').empty();
		let periode  	   = data.periode  != '' ? 	  	`<p><b>Periode &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let jenis_diet 	   = data.jenis_diet != '' ? 	`<p><b>Jenis Diet &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.jenis_diet}</p>` : '';
		let tempat_layanan = data.tempat_layanan != '' ?`<b>Tempat Layanan &emsp;&emsp;&emsp;:</b> ${data.tempat_layanan}` : '';
		let ruangan_ranap  = data.ruangan_ranap != '' ? ` (${data.ruangan_ranap})` : '';
		let ruangan_ic     = data.ruangan_ic != '' ? 	` (${data.ruangan_ic})` : '';
		let jml_data 	   = data.jml_data >=0 ? 		`<p><b>Jumlah Pasien &emsp;&emsp;&emsp;&emsp;:</b> ${data.jml_data}</p>` : '';
		let jml_data_all   = data.jml_data_all >=0 ? 	`<p><b>Jumlah Pasien Total &emsp;:</b> ${data.jml_data_all}</p>` : '';
		let ruangan 	   = data.tempat_layanan == 'Rawat Inap'? `<p>`+tempat_layanan+ruangan_ranap+`</p>` : `<p>`+tempat_layanan+ruangan_ic+`</p>`;
		let label_04 	   = periode+jenis_diet+ruangan+jml_data+jml_data_all;
		$('#label-lap-04').append(label_04);

		$('#pagination_04').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_04').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let html = '';
		$('#table-data-04').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Tgl Masuk</th>
						<th class="center">Tgl Order</th>
						<th class="center">Ruangan</th>
						<th class="center">No Rm</th>
						<th class="center">Nama</th>
						<th class="center">Berat</th>
						<th class="center">Diet</th>
						<th class="center" colspan="8">Jam Pemberian</th>
						<th class="center">Freq</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			let dataDiet = '';
			dataDiet = getDataDiet(v,false);
			html += `<tr>
						<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
						<td class="center">${v.tanggal_layanan}</td>
						<td class="center">${v.waktu_dpmp}</td>
						<td class="left">${v.ruangan}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama}</td>
						<td class="left">${((v.dpmp_gram !== null) ? v.dpmp_gram : '-')}</td>
						<td class="left">${dataDiet}</td>
						<td class="center">${((v.dpmp_jam_satu !== null) ? 	v.dpmp_jam_satu : '-')}</td>
						<td class="center">${((v.dpmp_jam_dua !== null) ? 	v.dpmp_jam_dua : '-')}</td>
						<td class="center">${((v.dpmp_jam_tiga !== null) ? 	v.dpmp_jam_tiga : '-')}</td>
						<td class="center">${((v.dpmp_jam_empat !== null) ? 	v.dpmp_jam_empat : '-')}</td>
						<td class="center">${((v.dpmp_jam_lima !== null) ? 	v.dpmp_jam_lima : '-')}</td>
						<td class="center">${((v.dpmp_jam_enam !== null) ? 	v.dpmp_jam_enam : '-')}</td>
						<td class="center">${((v.dpmp_jam_tujuh !== null) ? 	v.dpmp_jam_tujuh : '-')}</td>
						<td class="center">${((v.dpmp_jam_delapan !== null) ? v.dpmp_jam_delapan : '-')}</td>
						<td class="center">${v.freq}</td>
					</tr>`
		})

		$('#table-data-04').append(html + '</tbody>')
	}

	function getListLaporanGizi05(data) {
		let html = '';
		$('#table-data-05').empty()
		$.each(data.data, function(i, v) {
			if(v.length >= 1){
				nama_bangsal = i.replace(/_/g, ' ');
				
				html += `<div class="col-lg-4 table-responsive">
					<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th class="center" colspan="4">${nama_bangsal}</th>
								<th class="center" colspan="2">TOTAL = ${v.length}</th>
							</tr>
							<tr>
								<th class="center">No.</th>	
								<th class="center">Ruangan</th>
								<th class="center">No RM</th>
								<th class="center">Nama</th>
								<th class="center">Tgl Lahir</th>
								<th class="center">Diet</th>
							</tr>
						</thead>
					<tbody>`;

					$.each(v, function(key, value) {
						let dataDiet = '';
						dataDiet = getDataDiet(value,false);
						html += `<tr>
							<td class="center">${key + 1}</td>
							<td class="left">${value.ruangan}</td>
							<td class="center">${value.id_pasien}</td>
							<td class="left">${value.nama}</td>
							<td class="center">${datefmysql(value.tanggal_lahir)}</td>
							<td class="left">${dataDiet}</td>
						</tr>`;
					});

				html += `</tbody>
					</table>
				</div>`;
			}
		})
		$('#table-data-05').append(html)
	}

	function getListLaporanGizi06(data) {
		$('#label-lap-06').empty();
		let periode  	   = data.periode  != '' ? 	  	`<p><b>Periode &emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let jenis_diet 	   = data.jenis_diet != '' ? 	`<p><b>Jenis Diet &emsp;&emsp;&emsp;&emsp;:</b> ${data.jenis_diet}</p>` : '';
		let tempat_layanan = data.tempat_layanan != '' ?`<b>Tempat Layanan &emsp;:</b> ${data.tempat_layanan}` : '';
		let ruangan_ranap  = data.ruangan_ranap != '' ? ` (${data.ruangan_ranap})` : '';
		let ruangan_ic     = data.ruangan_ic != '' ? 	` (${data.ruangan_ic})` : '';
		let jml_data 	   = data.jml_data >=0 ? 		`<p><b>Jumlah Pasien &emsp;&emsp;:</b> ${data.jml_data}</p>` : '';
		let ruangan 	   = data.tempat_layanan == 'Rawat Inap'? `<p>`+tempat_layanan+ruangan_ranap+`</p>` : `<p>`+tempat_layanan+ruangan_ic+`</p>`;
		let label_06 	   = periode+jenis_diet+ruangan+jml_data;
		$('#label-lap-06').append(label_06);

		$('#pagination_06').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_06').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let html = '';
		$('#table-data-06').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Tgl Masuk</th>
						<th class="center">Tgl Order</th>
						<th class="center">Ruangan</th>
						<th class="center">No Rm</th>
						<th class="center">Nama</th>
						<th class="center">Umur</th>
						<th class="center">Tgl Lahir</th>
						<th class="center">P/L</th>
						<th class="center">Diet</th>
						<th class="center">Keterangan</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			let dataDiet = '';
			dataDiet = getDataDiet(v,true);
			html += `<tr>
						<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
						<td class="center">${v.tanggal_layanan}</td>
						<td class="center">${v.waktu_dpmp}</td>
						<td class="left">${v.ruangan}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama}</td>
						<td class="left">${hitungUmur(v.tanggal_lahir)}</td>
						<td class="center">${datefmysql(v.tanggal_lahir)}</td>
						<td class="center">${v.kelamin}</td>
						<td class="left">${dataDiet}</td>
						<td class="left">${((v.ket_makan_pasien !== null) ? v.ket_makan_pasien : '')}</td>
					</tr>`
		})

		$('#table-data-06').append(html + '</tbody>')
	}

	function getDataDiet(v,getJam){
		let dataDiet 		= '';
		let jnsDiet 		= [];
		let bentuk_makanan 	= [];
		let diet_cair 		= [];
		let jnsKDC 			= [];

		jnsDiet 		= [v.jns_diet_mp, v.jns_diet_sp, v.jns_diet_ms, v.jns_diet_ss, v.jns_diet_mm, v.jns_diet_sm];
		bentuk_makanan 	= [v.btk_mkn_mp, v.btk_mkn_sp, v.btk_mkn_ms, v.btk_mkn_ss, v.btk_mkn_mm, v.btk_mkn_sm];
		diet_cair 		= [v.mp_kode, v.ms_kode, v.mm_kode, v.ss_kode, v.sp_kode, v.sm_kode];
		jnsKDC 			= [v.kdc];

		let jam_pemberian = '';
		let getJamP = '';

		if(getJam){
			if(v.dpmp_jam_satu !== null && (v.dpmp_jam_dua !== null | v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){
				let psh_jam_satu = v.dpmp_jam_satu.split(':');
				let jam_satu = psh_jam_satu[0];
				jam_pemberian += +jam_satu + ', ';
			
			} else if(v.dpmp_jam_satu !== null){
				let psh_jam_satu = v.dpmp_jam_satu.split(':');
				let jam_satu = psh_jam_satu[0];
				jam_pemberian += +jam_satu;
			}

			if(v.dpmp_jam_dua !== null && (v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){
				let psh_jam_dua = v.dpmp_jam_dua.split(':');
				let jam_dua = psh_jam_dua[0];
				jam_pemberian += +jam_dua + ', ';
			} else if(v.dpmp_jam_dua !== null){
				let psh_jam_dua = v.dpmp_jam_dua.split(':');
				let jam_dua = psh_jam_dua[0];
				jam_pemberian += +jam_dua;
			}

			if(v.dpmp_jam_tiga !== null && (v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){
				let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
				let jam_tiga = psh_jam_tiga[0];
				jam_pemberian += +jam_tiga + ', ';
			} else if(v.dpmp_jam_tiga !== null){
				let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
				let jam_tiga = psh_jam_tiga[0];
				jam_pemberian += +jam_tiga;
			}

			if(v.dpmp_jam_empat !== null && (v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){
				let psh_jam_empat = v.dpmp_jam_empat.split(':');
				let jam_empat = psh_jam_empat[0];
				jam_pemberian += +jam_empat + ', ';
			} else if(v.dpmp_jam_empat !== null){
				let psh_jam_empat = v.dpmp_jam_empat.split(':');
				let jam_empat = psh_jam_empat[0];
				jam_pemberian += +jam_empat;
			}

			if(v.dpmp_jam_lima !== null && (v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){
				let psh_jam_lima = v.dpmp_jam_lima.split(':');
				let jam_lima = psh_jam_lima[0];
				jam_pemberian += +jam_lima + ', ';
			} else if(v.dpmp_jam_lima !== null){
				let psh_jam_lima = v.dpmp_jam_lima.split(':');
				let jam_lima = psh_jam_lima[0];
				jam_pemberian += +jam_lima;
			}

			if(v.dpmp_jam_enam !== null && (v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){
				let psh_jam_enam = v.dpmp_jam_enam.split(':');
				let jam_enam = psh_jam_enam[0];
				jam_pemberian += +jam_enam + ', ';
			} else if(v.dpmp_jam_enam !== null){
				let psh_jam_enam = v.dpmp_jam_enam.split(':');
				let jam_enam = psh_jam_enam[0];
				jam_pemberian += +jam_enam;
			}

			if(v.dpmp_jam_tujuh !== null && (v.dpmp_jam_delapan !== null)){
				let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
				let jam_tujuh = psh_jam_tujuh[0];
				jam_pemberian += +jam_tujuh + ', ';
			} else if(v.dpmp_jam_tujuh !== null){
				let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
				let jam_tujuh = psh_jam_tujuh[0];
				jam_pemberian += +jam_tujuh;
			}

			if(v.dpmp_jam_delapan !== null){
				let psh_jam_delapan = v.dpmp_jam_delapan.split(':');
				let jam_delapan = psh_jam_delapan[0];
				jam_pemberian += +jam_delapan;
			}
			
			if(jam_pemberian !== null){
				getJamP = 'JAM ' + jam_pemberian + ' WIB';
			} 
		}

		if (typeof jnsDiet != "undefined" && jnsDiet != null && jnsDiet.length != null && jnsDiet.length > 0) {                        
			let newjnsDiet = [...new Set(jnsDiet)];
			dataDiet += newjnsDiet + ' ';		
		}

		if (typeof bentuk_makanan != "undefined" && bentuk_makanan != null && bentuk_makanan.length != null && bentuk_makanan.length > 0) {			
			let newBtkMkn = [...new Set(bentuk_makanan)];
			dataDiet += newBtkMkn + ' ';		
		}

		if (typeof diet_cair != "undefined" && diet_cair != null && diet_cair.length != null && diet_cair.length > 0 && diet_cair !=",,,,," ) {			
			let newDietCair = [...new Set(diet_cair)];
			getJam ? dataDiet += 'CAIR ' + newDietCair + ' ' + jnsKDC + ' ' + getJamP : dataDiet += 'CAIR ' + newDietCair + ' ' + jnsKDC ;		
		}

		return dataDiet;
	}

	function paging(page) {
		getLaporanGizi(page)
	}
</script>