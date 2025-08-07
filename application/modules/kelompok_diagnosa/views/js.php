<script>
	var dWidth = $(window).width()
	var dHeight = $(window).height()
	var x = screen.width / 2 - dWidth / 2
	var y = screen.height / 2 - dHeight / 2

	$(function() {
		// getKelompokDiagnosa(1);
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
				window.open('<?= base_url('kelompok_diagnosa/export_klp_diagnosa_01?') ?>' + $('#form-search').serialize())
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

	function getKelompokDiagnosa(page) {
		$('.lap-01').hide();
		$('.lap-01 #tabs-lap01').hide();

		//Kode SKDR (Sistem Kewaspadaan Dini dan Respon)
		if ($('#jenis-laporan').val() == '1') {
			$('#page-now').val(page)	
			$('.lap-01, #tabs-lap01').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('kelompok_diagnosa/api/kelompok_diagnosa/get_klp_diagnosa_01') ?>/page/' + page + '/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data.data) {
						klpDiagnosa01(data.data)
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

	function klpDiagnosa01(data) {

		$('#label-lap-01').empty();
		let kode_skdr =  data.kode_skdr != '' ? `<p><b>Kode SKDR &emsp;:</b> ${data.kode_skdr}</p>` : '';
		let label_01  = kode_skdr;
		$('#label-lap-01').append(label_01);

		let html = '';
		$('#table-data-01').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Kode</th>
						<th class="left">SKDR</th>
						<th class="left">Kode ICDX</th>
						<th class="left">Diagnosa</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			html += `<tr>
						<td class="center">${i + 1}</td>
						<td class="center">${v.kode}</td>
						<td class="left">${v.skdr}</td>
						<td class="left">${v.kode_icdx_rinci}</td>
						<td class="left">${v.diagnosa}</td>
					</tr>`
		})

		$('#table-data-01').append(html + '</tbody>')
	}

	function paging(page) {
		getKelompokDiagnosa(page)
	}
</script>