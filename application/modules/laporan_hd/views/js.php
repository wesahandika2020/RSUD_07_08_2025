<script>
	var dWidth = $(window).width()
	var dHeight = $(window).height()
	var x = screen.width / 2 - dWidth / 2
	var y = screen.height / 2 - dHeight / 2

	$(function() {
		// getLaporanHd(1);
		$('.lap-01').hide();

		$('#jenis-laporan').change(function() {
			if ($('#jenis-laporan').val() !== '') {
				resetAllForm()
				$('#modal-search').modal('show')

			} else {
				$('#modal-search').modal('hide')
			}
			
			$('#periode-laporan').prop('disabled',false);
			if($('#jenis-laporan').val() == '3'){
				$('#periode-laporan').prop('disabled',true);
				$('#periode-laporan').val('Bulanan') ;
				$('.bulanan, #bulan, #tahun').show();
				$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
			}
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
				window.open('<?= base_url('laporan_hd/export_laporan_01?') ?>' + $('#form-search').serialize())
			}
		})
	})

	function reloadData() {
		$('#jenis-laporan').val('')
		$('.lap-01').hide();
		$('.lap-01, #table-data-01 tbody').hide();
		resetAllForm()
	}

	function resetAllForm() {
		$('#periode-laporan').val('Harian');
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');
		$('#bulan').val('<?= date('m') ?>');
		$('.harian, #tanggal-harian').show();
		$('.bulanan, .rentang-waktu').hide();
	}

	function getLaporanHd(page) {
		$('.lap-01').hide();
		$('.lap-01 #tabs-lap01').hide();

		//Laporan 01 Laporan Tindakan Hemodialisa Rawat Jalan dan Rawat Inap
		if ($('#jenis-laporan').val() == '1') {
			$('#page-now').val(page)	
			$('.lap-01, #tabs-lap01').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_hd/api/laporan_hd/get_list_laporan_hd_01') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data.data) {
						jmlPemeriksaan(data.data)
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

	function jmlPemeriksaan(data) {

		$('#label-lap-01').empty();
		let nama_tindakan = '';
		if(data.tindakan == '4463'){ nama_tindakan='HD NON REGULER'}
		else if(data.tindakan == '4464'){ nama_tindakan='HD REGULER'}
		let periode  =  data.periode  != '' ? `<p><b>Periode &emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin =  data.penjamin != '' ? `<p><b>Penjamin &emsp;:</b> ${data.penjamin}</p>` : '';
		let tindakan =  data.tindakan != '' ? `<p><b>Tindakan &emsp;:</b> ${nama_tindakan}</p>` : '';
		let label_ppi = periode+penjamin+tindakan;
		$('#label-lap-01').append(label_ppi);

		let html = '';
		$('#table-data-01').empty()
		html += `<thead>
					<tr>
						<th class="left" colspan="5"><b>PASIEN RUTIN RAWAT JALAN</b></th>
					</tr>
					<tr>
						<th class="center">No.</th>
						<th class="left">Nama Pasien</th>
						<th class="center">No Rekam Medis</th>
						<th class="left">Dokter Penanggung Jawab</th>
						<th class="center">Jaminan</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.rajal, function(i, v) {
			html += `<tr>
						<td class="center">${i + 1}</td>
						<td class="left">${v.nama}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.dokter}</td>
						<td class="center">${v.penjamin}</td>
					</tr>`
		})

		html += `<tr>
					<td></td>
					<td class="left" colspan="4"><b>JUMLAH TINDAKAN RAWAT JALAN : ${data.jml_rajal}</b></td>
				</tr>
				<tr>
					<td colspan="5"></td>
				</tr>
				<thead>
					<tr>
						<th class="left" colspan="5"><b>PASIEN RUTIN RAWAT INAP / ICU / HCU / IGD</b></th>
					</tr>
					<tr>
						<th class="center">No.</th>
						<th class="left">Nama Pasien</th>
						<th class="center">No Rekam Medis</th>
						<th class="left">Dokter Penanggung Jawab</th>
						<th class="center">Jaminan</th>
					</tr>
				</thead>`

		$.each(data.ranap, function(i, v) {
			html += `<tr>
					<td class="center">${i + 1}</td>
						<td class="left">${v.nama}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.dokter}</td>
						<td class="center">${v.penjamin}</td>
					</tr>`
		})
	
		html += `<tr>
					<td></td>
					<td class="left" colspan="4"><b>JUMLAH TINDAKAN RAWAT INAP : ${data.jml_ranap}</b></td>
				</tr>`

		$('#table-data-01').append(html + '</tbody>')
	}

	function paging(page) {
		getLaporanHd(page)
	}
</script>