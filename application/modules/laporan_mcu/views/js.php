<script>
	var dWidth = $(window).width()
	var dHeight = $(window).height()
	var x = screen.width / 2 - dWidth / 2
	var y = screen.height / 2 - dHeight / 2

	$(function() {
		// getLaporanMcu(1);
		$('.lap-01').hide();
		$('.lap-02').hide();
		$('.lap-03').hide();
		$('.lap-04').hide();

		$('#jenis-laporan').change(function() {
			if ($('#jenis-laporan').val() !== '') {
				resetAllForm()
				$('#modal-search').modal('show')

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

		// Format Tanggal
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

		$('#dokter-mcu').select2({
			ajax: {
				url: "<?= base_url('laporan_mcu/api/laporan_mcu/dokter_mcu') ?>",
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

		// remove validasi keyup
		$('.validasi-input, .form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		})

		$('#btn-reload').click(function() {
			reloadData();
			resetAllForm();
		})		

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('laporan_mcu/export_laporan_01?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_mcu/export_laporan_02?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_mcu/export_laporan_03?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '4') {
				window.open('<?= base_url('laporan_mcu/export_laporan_04?') ?>' + $('#form-search').serialize())
			}
		})
	})

	function reloadData() {
		$('#jenis-laporan').val('')
		$('.lap-01').hide();
		$('.lap-01, #table-data-01 tbody').hide();
		$('.lap-02').hide();
		$('.lap-02, #table-data-02 tbody').hide();
		$('.lap-03').hide();
		$('.lap-03, #table-data-03 tbody').hide();
		$('.lap-04').hide();
		$('.lap-04, #table-data-04 tbody').hide();
		resetAllForm()
	}

	function resetAllForm() {
		$('#periode-laporan').val('Harian');
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');
		$('#bulan').val('<?= date('m') ?>');
		$('.harian, #tanggal-harian').show();
		$('.bulanan, .rentang-waktu').hide();

		if ($('#jenis-laporan').val() == '1') {			
			$('#poliklinik').parent().parent().show()
		} else {
			$('#poliklinik').parent().parent().hide()
		}
	}

	function getLaporanMcu(page) {
		$('.lap-01').hide();
		$('.lap-01 #tabs-lap01').hide();
		$('.lap-02').hide();
		$('.lap-02 #tabs-lap02').hide();
		$('.lap-03').hide();
		$('.lap-03 #tabs-lap03').hide();
		$('.lap-04').hide();
		$('.lap-04 #tabs-lap04').hide();

		// Laporan Konsul Medical Check Up
		if ($('#jenis-laporan').val() == '1') {
			$('#page-now').val(page)	
			$('.lap-01, #tabs-lap01').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_mcu/api/laporan_mcu/get_list_laporan_mcu_01') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						jmlKonsulMcu(data)
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

		// Laporan MCU Order Lab
		} else if ($('#jenis-laporan').val() == '2') {
			$('#page-now').val(page)	
			$('.lap-02, #tabs-lap02').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_mcu/api/laporan_mcu/get_list_laporan_mcu_02') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						jmlKonsulLab(data)
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

		// Laporan MCU Order Rad
		} else if ($('#jenis-laporan').val() == '3') {
			$('#page-now').val(page)	
			$('.lap-03, #tabs-lap03').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_mcu/api/laporan_mcu/get_list_laporan_mcu_03') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						jmlKonsulRad(data)
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

		// Laporan Tindakan Dokter MCU
		} else if ($('#jenis-laporan').val() == '4') {
			$('#page-now').val(page)	
			$('.lap-04, #tabs-lap04').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_mcu/api/laporan_mcu/get_list_laporan_mcu_04') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						jmlTindakanMcu(data)
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

	function jmlKonsulMcu(data) {
		$('#label-lap-01').empty();
		let jml_data     = data.jml_data  != '' ? `<p><b>Jumlah Data &emsp;:</b> ${data.jml_data}</p>` : '';
		let periode      = data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin     = data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;:</b> ${data.penjamin}</p>` : '';
		let dokter       = data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;&emsp;:</b> ${data.dokter}</p>` : '';
		let poliklinik   = data.poliklinik != '' ? `<p><b>Poliklinik &emsp;&emsp;:</b> ${data.poliklinik}</p>` : '';
		let label_param  = jml_data+periode+penjamin+poliklinik;
		$('#label-lap-01').append(label_param);

		$('#pagination_01').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_01').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let html = '';	
		let no   = 0;

		$('#table-data-01').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">No Register</th>
						<th class="center">Tgl Daftar</th>
						<th class="center">No RM</th>
						<th class="left">Nama Pasien</th>
						<th class="left">Dokter</th>
						<th class="left">Konsul Poliklinik</th>
						<th class="left">Dokter Poliklinik</th>
						<th class="center">Penjamin</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {

			let poli = '';
			let dokter = '';
			let penjamin = '';
			$.each(v.konsul, function(key, val) {
				poli 	 += val.nama_poli+"<br>";
				dokter 	 += val.nama_dokter+"<br>";
				penjamin += val.nama_penjamin+"<br>";
			})	

			html += `<tr>
						<td class="center">${(no + 1) + ((data.page - 1) * data.limit)}</td>
						<td class="center">${v.no_register}</td>
						<td class="center">${v.tanggal_daftar}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama_pasien}</td>
						<td class="left">${v.dokter_mcu}</td>
						<td class="left">${poli}</td>
						<td class="left">${dokter}</td>
						<td class="center">${penjamin}</td>
					</tr>`
			no++;
		})

		$('#table-data-01').append(html + '</tbody>')
	}

	function jmlKonsulLab(data) {
		$('#label-lap-02').empty();
		let jml_data  =  data.jml_data  != '' ? `<p><b>Jumlah Data &emsp;:</b> ${data.jml_data}</p>` : '';
		let periode  =  data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin =  data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;:</b> ${data.penjamin}</p>` : '';
		let dokter   =  data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;&emsp;:</b> ${data.dokter}</p>` : '';
		let label_param = jml_data+periode+penjamin+dokter;
		$('#label-lap-02').append(label_param);

		$('#pagination_02').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_02').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let html = '';	
		let no   = 0;

		$('#table-data-02').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">No Register</th>
						<th class="center">Tgl Daftar</th>
						<th class="center">No RM</th>
						<th class="left">Nama Pasien</th>
						<th class="left">Dokter</th>
						<th class="left">Tindakan Laboratorium</th>
						<th class="center">Penjamin</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			let nama_tindakan = '';
			$.each(v.konsul, function(key, val) {
				nama_tindakan 	 += val.nama_tindakan+"<br>";
			})	

			html += `<tr>
						<td class="center">${(no + 1) + ((data.page - 1) * data.limit)}</td>
						<td class="center">${v.no_register}</td>
						<td class="center">${v.tanggal_daftar}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama_pasien}</td>
						<td class="left">${v.dokter_mcu}</td>
						<td class="left">${nama_tindakan}</td>
						<td class="center">${v.nama_penjamin}</td>
					</tr>`
			no++;
		})

		$('#table-data-02').append(html + '</tbody>')
	}

	function jmlKonsulRad(data) {
		$('#label-lap-03').empty();
		let jml_data  =  data.jml_data  != '' ? `<p><b>Jumlah Data &emsp;:</b> ${data.jml_data}</p>` : '';
		let periode  =  data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin =  data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;:</b> ${data.penjamin}</p>` : '';
		let dokter   =  data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;&emsp;:</b> ${data.dokter}</p>` : '';
		let label_param = jml_data+periode+penjamin+dokter;
		$('#label-lap-03').append(label_param);

		$('#pagination_03').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_03').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let html = '';	
		let no   = 0;

		$('#table-data-03').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">No Register</th>
						<th class="center">Tgl Daftar</th>
						<th class="center">No RM</th>
						<th class="left">Nama Pasien</th>
						<th class="left">Dokter</th>
						<th class="left">Tindakan Laboratorium</th>
						<th class="center">Penjamin</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			let nama_tindakan = '';
			$.each(v.konsul, function(key, val) {
				nama_tindakan 	 += val.nama_tindakan+"<br>";
			})	

			html += `<tr>
						<td class="center">${(no + 1) + ((data.page - 1) * data.limit)}</td>
						<td class="center">${v.no_register}</td>
						<td class="center">${v.tanggal_daftar}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama_pasien}</td>
						<td class="left">${v.dokter_mcu}</td>
						<td class="left">${nama_tindakan}</td>
						<td class="center">${v.nama_penjamin}</td>
					</tr>`
			no++;
		})

		$('#table-data-03').append(html + '</tbody>')
	}

	function jmlTindakanMcu(data) {
		$('#label-lap-04').empty();
		let jml_data  =  data.jml_data  != '' ? `<p><b>Jumlah Data &emsp;:</b> ${data.jml_data}</p>` : '';
		let periode  =  data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin =  data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;:</b> ${data.penjamin}</p>` : '';
		let dokter   =  data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;&emsp;:</b> ${data.dokter}</p>` : '';
		let label_param = jml_data+periode+penjamin+dokter;
		$('#label-lap-04').append(label_param);

		$('#pagination_04').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_04').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let html = '';	
		let no   = 0;

		$('#table-data-04').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="left">Dokter</th>
						<th class="left">Tindakan</th>
						<th class="center">Jumlah</th>
						<th class="center">Penjamin</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			let tindakan 	 = '';
			let jml_tindakan = '';
			let penjamin 	 = '';
			$.each(v.tindakan, function(key, val) {
				tindakan 	 += val.tindakan+"<br>";
				jml_tindakan += val.jml_tindakan+"<br>";
				penjamin 	 += val.penjamin+"<br>";
			})	

			html += `<tr>
						<td class="center">${(no + 1) + ((data.page - 1) * data.limit)}</td>
						<td class="left">${v.dokter_mcu}</td>
						<td class="left">${tindakan}</td>
						<td class="center">${jml_tindakan}</td>
						<td class="center">${penjamin}</td>
					</tr>`
			no++;
		})

		$('#table-data-04').append(html + '</tbody>')
	}

	function paging(page) {
		getLaporanMcu(page)
	}
</script>