<script>
	var dWidth = $(window).width()
	var dHeight = $(window).height()
	var x = screen.width / 2 - dWidth / 2
	var y = screen.height / 2 - dHeight / 2

	$(function() {
		getLaporanRad(1);
		$('.lap-01').hide();
		$('.lap-02').hide();
		$('.lap-03').hide();

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
				// const tabActive = $('#tabs-lap01 .nav-item .active').attr('aria-controls')
				window.open('<?= base_url('laporan_radiologi/export_laporan_01?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_radiologi/export_laporan_02?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_radiologi/export_laporan_03?') ?>' + $('#form-search').serialize())
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
		resetAllForm()
	}

	function resetAllForm() {
		$('#periode-laporan').val('Harian');
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');
		$('#bulan').val('<?= date('m') ?>');
		$('.harian, #tanggal-harian').show();
		$('.bulanan, .rentang-waktu').hide();
	}

	function getLaporanRad(page) {
		$('.lap-01').hide();
		$('.lap-01 #tabs-lap01').hide();
		$('.lap-02').hide();
		$('.lap-02 #tabs-lap02').hide();
		$('.lap-03').hide();
		$('.lap-03 #tabs-lap03').hide();

		//Laporan 01 Laporan Jumlah Pemeriksaan
		if ($('#jenis-laporan').val() == '1') {
			$('#page-now').val(page)
			$('.lap-01, #tabs-lap01').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_radiologi/api/laporan_radiologi/get_list_laporan_radiologi_01') ?>/page/' + page + '/jenis/',
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

		//Laporan 02 Laporan Jumlah Pemeriksaan berdasarkan Penjamin
		else if ($('#jenis-laporan').val() == '2') {
			$('#page-now').val(page)
			$('.lap-02, #tabs-lap02').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_radiologi/api/laporan_radiologi/get_list_laporan_radiologi_02') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data.data) {
						jmlPemeriksaanByPenjamin(data.data)
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

		//Laporan 03 Laporan Baca Expertise Perbulan
		else if ($('#jenis-laporan').val() == '3') {
			$('#page-now').val(page)
			$('.lap-03, #tabs-lap03').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_radiologi/api/laporan_radiologi/get_list_laporan_radiologi_03') ?>/page/' + page + '/jenis/',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data.data) {
						bacaExpertisePerBulan(data)
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
		let html = '';
		$('#table-data-01').empty()

		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Jenis Pemeriksaan</th>
						<th class="center">Total</th>
					</tr>
					</thead>
					<tbody>`
					
		let totalTindakan = 0
		$.each(data.tindakan, function(i, v) {
			totalTindakan += parseInt(v.total_tindakan)
			html += `<tr>
					<td class="center">${i + 1}</td>
					<td>${v.nama_tindakan}</td>
					<td class="center">${v.total_tindakan}</td>
				</tr>`
		})
		html += `<tr>
					<td></td>
					<td class="center"><b>TOTAL</b></td>
					<td class="center"><b>${totalTindakan}</b></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td class="center"><b>PASIEN RADIOLOGI</b></td>
					<td></td>
				</tr>`

		let totalPasien = 0
		$.each(data.layanan, function(i, v) {
			totalPasien += parseInt(v.total)
			html += `<tr>
						<td class="center">${i + 1}</td>
						<td>${v.jenis_layanan}</td>
						<td class="center">${v.total}</td>
					</tr>`
		})
		html += `<tr>
					<td></td>
					<td class="center"><b>TOTAL</b></td>
					<td class="center"><b>${totalPasien}</b></td>
				</tr>`

		$('#table-data-01').append(html + '</tbody>')
	}

	function jmlPemeriksaanByPenjamin(data) {
		let html = '';		
		let totalSemua = 0;
		let no = 0;
		$('#table-data-02').empty()

		// START RADIOLOGI
		html += `<thead>
				<tr>
					<th class="center">No.</th>
					<th class="center">Jenis Pemeriksaan</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th class="center">Total</th>
				</tr>	
				</thead>
				<tbody>				
				<tr>
					<td></td>
					<td class="center"><b>RADIOLOGI</b></td>
					<td class="center"><b>JPKMKT</b></td>
					<td class="center"><b>BPJS</b></td>
					<td class="center"><b>UMUM</b></td>
					<td class="center"><b>JAMINAN KESEHATAN RSUD</b></td>
					<td class="center"><b>MCU PEGAWAI RSUD</b></td>
					<td class="center"><b>PENJAMIN LAIN</b></td>
					<td class="center"><b>NON PENJAMIN</b></td>
					<td class="center"></td>
				</tr>`	

		if(data.radiologi.length > 0){
			$.each(data.radiologi, function(i, v) {
			totalSemua += parseInt(v.total)
			no += 1;
			html += `<tr>
					<td class="center">${no}</td>
					<td>${v.tindakan}</td>
					<td class="center">${v.jpkmkt}</td>
					<td class="center">${v.bpjs}</td>
					<td class="center">${v.umum}</td>
					<td class="center">${v.jaminan_rsud}</td>
					<td class="center">${v.jaminan_rsud}</td>
					<td class="center">${v.penjamin_lain}</td>
					<td class="center">${v.penjamin_kosong}</td>
					<td class="center">${v.total}</td>
				</tr>`
			})
		} else {
			html += `<tr>
					<td class="center"></td>
					<td></td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
				</tr>`
		}
		// END RADIOLOGI

		// START PEMERIKSAAN USG
		html += `<tr>
					<td></td>
					<td class="center"><b>PEMERIKSAAN USG</b></td>
					<td class="center"><b>JPKMKT</b></td>
					<td class="center"><b>BPJS</b></td>
					<td class="center"><b>UMUM</b></td>
					<td class="center"><b>JAMINAN KESEHATAN RSUD</b></td>
					<td class="center"><b>MCU PEGAWAI RSUD</b></td>
					<td class="center"><b>PENJAMIN LAIN</b></td>
					<td class="center"><b>NON PENJAMIN</b></td>
					<td class="center"></td>
				</tr>`

		if(data.usg.length > 0){
			$.each(data.usg, function(i, v) {
				totalSemua += parseInt(v.total)
				no += 1;
				html += `<tr>
					<td class="center">${no}</td>
						<td>${v.tindakan}</td>
						<td class="center">${v.jpkmkt}</td>
						<td class="center">${v.bpjs}</td>
						<td class="center">${v.umum}</td>
						<td class="center">${v.jaminan_rsud}</td>
						<td class="center">${v.jaminan_rsud}</td>
						<td class="center">${v.penjamin_lain}</td>
						<td class="center">${v.penjamin_kosong}</td>
						<td class="center">${v.total}</td>
					</tr>`
			})
		} else {
			html += `<tr>
					<td class="center"></td>
					<td></td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
				</tr>`
		}
		// END PEMERIKSAAN USG

		// START TINDAKAN CT SCAN
		html += `<tr>
					<td></td>
					<td class="center"><b>TINDAKAN CT SCAN</b></td>
					<td class="center"><b>JPKMKT</b></td>
					<td class="center"><b>BPJS</b></td>
					<td class="center"><b>UMUM</b></td>
					<td class="center"><b>JAMINAN KESEHATAN RSUD</b></td>
					<td class="center"><b>MCU PEGAWAI RSUD</b></td>
					<td class="center"><b>PENJAMIN LAIN</b></td>
					<td class="center"><b>NON PENJAMIN</b></td>
					<td class="center"></td>
				</tr>`

		if(data.ctscan.length > 0){
			$.each(data.ctscan, function(i, v) {
				totalSemua += parseInt(v.total)
				no += 1;
				html += `<tr>
					<td class="center">${no}</td>
						<td>${v.tindakan}</td>
						<td class="center">${v.jpkmkt}</td>
						<td class="center">${v.bpjs}</td>
						<td class="center">${v.umum}</td>
						<td class="center">${v.jaminan_rsud}</td>
						<td class="center">${v.jaminan_rsud}</td>
						<td class="center">${v.penjamin_lain}</td>
						<td class="center">${v.penjamin_kosong}</td>
						<td class="center">${v.total}</td>
					</tr>`
			})
		} else {
			html += `<tr>
					<td class="center"></td>
					<td></td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
				</tr>`
		}
		// END TINDAKAN CT SCAN

		// START PANORAMIC
		html += `<tr>
					<td></td>
					<td class="center"><b>PANORAMIC</b></td>
					<td class="center"><b>JPKMKT</b></td>
					<td class="center"><b>BPJS</b></td>
					<td class="center"><b>UMUM</b></td>
					<td class="center"><b>JAMINAN KESEHATAN RSUD</b></td>
					<td class="center"><b>MCU PEGAWAI RSUD</b></td>
					<td class="center"><b>PENJAMIN LAIN</b></td>
					<td class="center"><b>NON PENJAMIN</b></td>
					<td class="center"></td>
				</tr>`

		if(data.panoramic.length > 0){
			$.each(data.panoramic, function(i, v) {
				totalSemua += parseInt(v.total)
				no += 1;
				html += `<tr>
					<td class="center">${no}</td>
						<td>${v.tindakan}</td>
						<td class="center">${v.jpkmkt}</td>
						<td class="center">${v.bpjs}</td>
						<td class="center">${v.umum}</td>
						<td class="center">${v.jaminan_rsud}</td>
						<td class="center">${v.jaminan_rsud}</td>
						<td class="center">${v.penjamin_lain}</td>
						<td class="center">${v.penjamin_kosong}</td>
						<td class="center">${v.total}</td>
					</tr>`
			})
		} else {
			html += `<tr>
					<td class="center"></td>
					<td></td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
				</tr>`
		}
		// END PANORAMIC

		// START FLUROSCOPY
		html += `<tr>
					<td></td>
					<td class="center"><b>FLUROSCOPY</b></td>
					<td class="center"><b>JPKMKT</b></td>
					<td class="center"><b>BPJS</b></td>
					<td class="center"><b>UMUM</b></td>
					<td class="center"><b>JAMINAN KESEHATAN RSUD</b></td>
					<td class="center"><b>MCU PEGAWAI RSUD</b></td>
					<td class="center"><b>PENJAMIN LAIN</b></td>
					<td class="center"><b>NON PENJAMIN</b></td>
					<td class="center"></td>
				</tr>`

		if(data.fluroscopy.length > 0){
			$.each(data.fluroscopy, function(i, v) {
				totalSemua += parseInt(v.total)
				no += 1;
				html += `<tr>
					<td class="center">${no}</td>
						<td>${v.tindakan}</td>
						<td class="center">${v.jpkmkt}</td>
						<td class="center">${v.bpjs}</td>
						<td class="center">${v.umum}</td>
						<td class="center">${v.jaminan_rsud}</td>
						<td class="center">${v.jaminan_rsud}</td>
						<td class="center">${v.penjamin_lain}</td>
						<td class="center">${v.penjamin_kosong}</td>
						<td class="center">${v.total}</td>
					</tr>`
			})
		} else {
			html += `<tr>
					<td class="center"></td>
					<td></td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
					<td class="center">0</td>
				</tr>`
		}
		// END FLUROSCOPY

		html += `<tr>
					<td  class="center" colspan="9" style="text-align: right"><b>TOTAL</b</td>
					<td class="center"><b>${totalSemua}</b></td>
				</tr>`

		$('#table-data-02').append(html + '</tbody>')
	}

	function getHari(tgl){
		var myDays = ['MG', 'SN', 'SL', 'RB', 'KM', 'JM', 'SB'];
		var hari_tsb = new Date(tgl);
		var ambil_hari = hari_tsb.getDay(),
			ambil_hari = myDays[ambil_hari];
		return ambil_hari;
	}

	function getTglTerakhir(year, month) {
		let lastDay = new Date(year, month + 1, 0);
		return lastDay.getDate();
	}


	function bacaExpertisePerBulan(data) {
		let html = '';		
		let totalSemua = 0;
		let no = 0;
		$('#table-data-03').empty()

		let tahun = parseInt(data.tahun);
		let bulan = parseInt(data.bulan)-1;; // (0 untuk Januari, 1 untuk Februari, dst.)
		let tglTerakhir = getTglTerakhir(tahun, bulan);
		
		let setHeaderHari = '';
		let setHeaderTgl  = '';
		let setData  = '';

		for (let i = 1; i <= tglTerakhir; i++) {
			setHeaderHari += `<th class="center">${getHari(data.periode+'-'+i)}</th>`;			
			setHeaderTgl  += `<th class="center">${i}</th>`;
		}

		html += `<thead>	
					<tr>
						<th class="center" rowspan="2">Nama Dokter / Pemeriksaan</th>
						${setHeaderHari}
						<th class="center" rowspan="2">Jumlah</th>
					</tr>	
					<tr>
						${setHeaderTgl}				
					</tr>	
				</thead>
				<tbody>`	

		$.each(data.hasil, function(i, v) {
			html += `<tr>
					<td class="left" colspan="${tglTerakhir+2}"><b>${i}</b></td>
				</tr>`

			$.each(v, function(hi, hv) {				
				totalSemua += parseInt(hv.total);

				setData = '';
				for (let i = 1; i <= tglTerakhir; i++) {
					let setParamTgl = 'tgl_' + i;
					setData += `<td class="center">${hv[setParamTgl]}</td>`;
				}

				html += `<tr>
							<td class="left">${hv.pemeriksaan}</td>
							${setData}		
							<td class="center">${hv.total}</td>
						</tr>`				
			})

			html += `<tr>
						<td colspan="${tglTerakhir+2}"></td>
					</tr>`
		})
		
		html += `<tr>
					<td  class="center" colspan="${tglTerakhir+1}" style="text-align: right"><b>TOTAL</b</td>
					<td class="center"><b>${totalSemua}</b></td>
				</tr>`

		$('#table-data-03').append(html + '</tbody>')
	}

	function paging(page) {
		getLaporanRad(page)
	}
</script>