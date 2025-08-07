<style>
	.table-freeze {
		height: 80vh;
		margin: 2rem 0;
		overflow: auto;
		scroll-snap-type: both mandatory;
		/* white-space: nowrap; */
	}

	.table-freeze .table {
		margin: 0;
		overflow: unset;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
	}

	th,
	td {
		padding: 1rem 2.5rem;
		text-align: left;
	}

	thead th,
	.freeze-top th {
		/* border-bottom: 1px solid #ccc; */
		font-weight: 600;
		top: 0;
		z-index: 1;
	}

	th.tp {
		background-color: #fff;
		z-index: 2;
	}

	tbody th {
		left: 0;
		text-align: left;
	}

	tbody th,
	th.tp {
		border-right: 1px solid #ccc;
	}

	tr {
		padding: 0;
	}

	td {
		color: #555;
		vertical-align: top;
	}

	tbody tr:nth-child(odd) th {
		background-color: #fff;
	}

	thead th,
	tbody tr:nth-child(even) th,
	tr:nth-child(even) td {
		background-color: #f4f4f4;
		/* striped background color */
	}

	thead th,
	tbody th {
		position: sticky;
		-webkit-position: sticky;
	}

	@media screen and (max-width: 680px) {
		.table-freeze {
			height: 70vh
		}
	}

	@media screen and (max-width: 480px) {
		.table-freeze {
			height: 60vh
		}
	}

	/* #table-data tbody tr td {
		font-size: 11px;
	} */
	#parent {
		height: 450px;
		overflow-y: auto;
		overflow-x: 0;
	}

	/* #table-lap-mutasi-logistik {
        width: 100% !important;
    } */
</style>

<script>
	var dWidth = $(window).width()
	var dHeight = $(window).height()
	var x = screen.width / 2 - dWidth / 2
	var y = screen.height / 2 - dHeight / 2

	$(function() {
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

				$('#label-tanggal').empty();
				if ($('#jenis-laporan').val() == '1'){
					$('#label-tanggal').append('Tanggal Layanan') ;
				} else if ($('#jenis-laporan').val() == '2'){
					$('#label-tanggal').append('Tanggal Order') ;
				} else if ($('#jenis-laporan').val() == '3'){
					$('#label-tanggal').append('Tanggal Masuk Ranap') ;
				} else if ($('#jenis-laporan').val() == '4'){
					$('#label-tanggal').append('Tanggal Layanan') ;
				} else if ($('#jenis-laporan').val() == '5'){
					$('#label-tanggal').append('Tanggal Daftar') ;
				} else if ($('#jenis-laporan').val() == '6'){
					$('#label-tanggal').append('Tanggal Daftar') ;
				} else {
					$('#label-tanggal').append('Tanggal') ;
				}

			} else {
				$('#modal-search').modal('hide')
			}

			$('#jenis-layanan').empty();
			$('#jenis-layanan').append('<option value="">- Semua -</option>') ;
			if($('#jenis-laporan').val() == '1'){
				$('#jenis-layanan').append('<option value="IGD">IGD</option>') ;
				$('#jenis-layanan').append('<option value="Poliklinik">Poliklinik</option>') ;
			} else if($('#jenis-laporan').val() == '2'){
				$('#jenis-layanan').append('<option value="IGD">IGD</option>') ;
				$('#jenis-layanan').append('<option value="Poliklinik">Poliklinik</option>') ;
				$('#jenis-layanan').append('<option value="Rawat Inap">Rawat Inap</option>') ;
				$('#jenis-layanan').append('<option value="Intensive Care">Intensive Care</option>') ;
			} else if($('#jenis-laporan').val() == '3'){
				$('#jenis-layanan').empty();
				$('#jenis-layanan').append('<option value="Rawat Inap">Rawat Inap</option>') ;
			} else if($('#jenis-laporan').val() == '4'){
				$('#jenis-layanan').append('<option value="IGD">IGD</option>') ;
				$('#jenis-layanan').append('<option value="Poliklinik">Poliklinik</option>') ;
				$('#jenis-layanan').append('<option value="Rawat Inap">Rawat Inap</option>') ;
				$('#jenis-layanan').append('<option value="Intensive Care">Intensive Care</option>') ;
			} else if($('#jenis-laporan').val() == '5'){
				$('#jenis-layanan').append('<option value="IGD">IGD</option>') ;
				$('#jenis-layanan').append('<option value="Laboratorium">Laboratorium</option>') ;
				$('#jenis-layanan').append('<option value="Medical Check Up">Medical Check Up</option>') ;
				$('#jenis-layanan').append('<option value="Poliklinik">Poliklinik</option>') ;
			}

			if($('#jenis-laporan').val() == '1'){
				$('#jenis-layanan').val('');
				$('#jenis-layanan').parent().parent().show();
				$('#dokter-search').val('');
				$('#dokter-search').parent().parent().show();

			} else if($('#jenis-laporan').val() == '2'){
				$('#jenis-layanan').val('');
				$('#jenis-layanan').parent().parent().show();
				$('#operasi').val('');
				$('#operasi').parent().parent().show();	
				$('#timing').val('');
				$('#timing').parent().parent().show();	
				$('#status-operasi').val('');
				$('#status-operasi').parent().parent().show();
				$('#dokter-search').val('');
				$('#dokter-search').parent().parent().show();

			} else if($('#jenis-laporan').val() == '3'){	
				$('#jenis-layanan').val('');
				$('#jenis-layanan').parent().parent().show();		
				$('#bangsal-ranap').parent().parent().show();	
				$('#dokter-search').val('');
				$('#dokter-search').parent().parent().show();

			} else if($('#jenis-laporan').val() == '4'){	
				$('#jenis-layanan').val('');
				$('#jenis-layanan').parent().parent().show();
				$('#kategori-dokter').val('');
				$('#kategori-dokter').parent().parent().show();
			
			} else if($('#jenis-laporan').val() == '6'){	
				$('#jenis-boocin').val('');
				$('#jenis-boocin').parent().parent().show();
				$('#poliklinik').val('');				
				$('#poliklinik').parent().parent().show();
			}
		})

		$('#kategori-dokter').change(function() {
			if($('#kategori-dokter').val() != ''){
				$('#dokter-search').val('');
				$('#dokter-search').parent().parent().show();
			} else {
				$('#dokter-search').parent().parent().hide();			
				$('#s2id_dokter-search a .select2-chosen').html('- Semua Dokter -');
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

		$('#jenis-layanan').change(function() {
			if ($('#jenis-layanan').val() == 'Poliklinik') {
				$('#poliklinik').parent().parent().show();
				$('#bangsal-ranap').parent().parent().hide();
				$('#bangsal-icare').parent().parent().hide();	

			} else if ($('#jenis-layanan').val() == 'Rawat Inap') {
				$('#poliklinik').parent().parent().hide();
				$('#bangsal-ranap').parent().parent().show();
				$('#bangsal-icare').parent().parent().hide();	

			} else if ($('#jenis-layanan').val() == 'Intensive Care') {
				$('#poliklinik').parent().parent().hide();
				$('#bangsal-ranap').parent().parent().hide();
				$('#bangsal-icare').parent().parent().show();					
			} else {
				$('#poliklinik').parent().parent().hide();
				$('#bangsal-ranap').parent().parent().hide();
				$('#bangsal-icare').parent().parent().hide();	
			}
		})

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {				
				window.open('<?= base_url('laporan_perencanaan/export_laporan_01?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '2') {				
				window.open('<?= base_url('laporan_perencanaan/export_laporan_02?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '3') {				
				window.open('<?= base_url('laporan_perencanaan/export_laporan_03?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '4') {				
				window.open('<?= base_url('laporan_perencanaan/export_laporan_04?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '5') {				
				window.open('<?= base_url('laporan_perencanaan/export_laporan_05?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '6') {				
				window.open('<?= base_url('laporan_perencanaan/export_laporan_06?') ?>' + $('#form-search').serialize())
			} else {
				swalAlert('info', 'INFO', `Export belum tersedia, harap hubungi IT.`)
			}
		})

		$('#dokter-search').select2({
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

		$('#dokter-operasi').select2({
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
	})

	function reloadData() {
		$('#jenis-laporan').val('');
		hideLaporan();
		resetAllForm();
	}

	function resetAllForm() {
		$('#periode-laporan').val('Harian');
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');
		$('#bulan').val('<?= date('m') ?>');
		$('.harian, #tanggal-harian').show();
		$('.bulanan, .rentang-waktu').hide();		
		$('#dokter-search').val('');
		$('#s2id_dokter-search a .select2-chosen').html('- Semua Dokter -')
		$('#dokter-operasi').val('');
		$('#s2id_dokter-operasi a .select2-chosen').html('- Semua Dokter Operasi -')

		risetModelPencarian();
		if ($('#jenis-laporan').val() == '2') {
			$('#operasi').parent().parent().show();	
			$('#timing').parent().parent().show();	
			$('#status-operasi').parent().parent().show();	
			$('#dokter-operasi').parent().parent().show();	
		}

	}

	function hideLaporan() {
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

	function risetModelPencarian() {
		$('#jenis-layanan').val('');
		$('#jenis-layanan').parent().parent().hide();	
		$('#poliklinik').val('');	
		$('#poliklinik').parent().parent().hide();		
		$('#bangsal-ranap').val('');	
		$('#bangsal-ranap').parent().parent().hide();		
		$('#bangsal-icare').val('');
		$('#bangsal-icare').parent().parent().hide();	
		$('#operasi').val('');
		$('#operasi').parent().parent().hide();	
		$('#timing').val('');
		$('#timing').parent().parent().hide();	
		$('#status-operasi').val('');
		$('#status-operasi').parent().parent().hide();	
		$('#kategori-dokter').val('');
		$('#kategori-dokter').parent().parent().hide();	
		$('#dokter-operasi').parent().parent().hide();			
		$('#s2id_dokter-operasi a .select2-chosen').html('- Semua Dokter Operasi -');
		$('#dokter-search').parent().parent().hide();			
		$('#s2id_dokter-search a .select2-chosen').html('- Semua Dokter -');
		$('#jenis-boocin').val('');
		$('#jenis-boocin').parent().parent().hide();	

		syams_validation_remove($('#dokter-search'));
	}

	function getLaporanPerencanaan(page) {
		let stop = false;
		syams_validation_remove($('#dokter-search'));
        if ($('#kategori-dokter').val() !== '') {
			if ($('#dokter-search').val() === '') {
				syams_validation('#dokter-search', 'Pilihan dokter tidak boleh kosong jika memilih kategori dokter!');
				stop = true;
			}
        }

        if (stop) {
            return false;
        }

		hideLaporan();

		//Laporan 01 Laporan Resep Rawat Jalan
		if ($('#jenis-laporan').val() == '1') {
			$('#page-now').val(page)	
			$('.lap-01, #tabs-lap01').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_perencanaan/api/laporan_perencanaan/get_list_laporan_perencanaan_01') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanPerencanaan01(data)
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

		//Laporan 02 Dokter Operasi
		else if ($('#jenis-laporan').val() == '2') {
			$('#page-now').val(page)	
			$('.lap-02, #tabs-lap02').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_perencanaan/api/laporan_perencanaan/get_list_laporan_perencanaan_02') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanPerencanaan02(data)
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

		//Laporan 03 Dokter Operasi
		else if ($('#jenis-laporan').val() == '3') {
			$('#page-now').val(page)	
			$('.lap-03, #tabs-lap03').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_perencanaan/api/laporan_perencanaan/get_list_laporan_perencanaan_03') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanPerencanaan03(data)
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

		//Laporan 04 Catatan Perkembangan Pasien Terintegrasi (CPPT)
		else if ($('#jenis-laporan').val() == '4') {
			$('#page-now').val(page)	
			$('.lap-04, #tabs-lap04').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_perencanaan/api/laporan_perencanaan/get_list_laporan_perencanaan_04') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanPerencanaan04(data)
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

		//Laporan 05 Laporan Laboratorium Rawat Jalan Lebih dari Rp 100.000,-
		else if ($('#jenis-laporan').val() == '5') {
			$('#page-now').val(page)	
			$('.lap-05, #tabs-lap05').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_perencanaan/api/laporan_perencanaan/get_list_laporan_perencanaan_05') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanPerencanaan05(data)
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

		//Laporan 06 Laporan Rata-Rata Waktu Boocin (Booking Checkin) Rajal
		else if ($('#jenis-laporan').val() == '6') {
			$('#page-now').val(page)	
			$('.lap-06, #tabs-lap06').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_perencanaan/api/laporan_perencanaan/get_list_laporan_perencanaan_06') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanPerencanaan06(data)
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

	function laporanPerencanaan01(data) {

		$('#label-lap-01').empty();
		let periode       =  data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin      =  data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;:</b> ${data.penjamin}</p>` : '';
		let jenis_layanan =  data.jenis_layanan != '' ? `<p><b>Jenis Layanan :</b> ${data.jenis_layanan}</p>` : '';
		let poliklinik    =  data.poliklinik != '' ? `<p><b>Poliklinik &emsp;&emsp;:</b> ${data.poliklinik}</p>` : '';
		let label_lap     = periode+penjamin+jenis_layanan+poliklinik;
		$('#label-lap-01').append(label_lap);

		$('#pagination_01').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_01').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let no   = 1;
		let html = '';
		$('#table-data-01').empty()
		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">No RM</th>
						<th class="left">Nama Pasien</th>
						<th class="center">Tgl Daftar</th>
						<th class="center">Tgl Layanan</th>
						<th class="left">Layanan</th>
						<th class="left">Dokter Dpjp</th>
						<th class="right">Total</th>
						<th class="center">Penjamin</th>
						<th class="left">Diagnosa Utama</th>
						<th class="center"></th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {

			$(document).ready(function() {
				$('#btn-expand-form-all' + v.id_layanan_pendaftaran).click(function() {
					const isExpanded = $(this).attr('aria-expanded') === 'true';
					$('#expand-icon' + v.id_layanan_pendaftaran).toggleClass('active', isExpanded);
					$(this).html(`<i class="fas fa-fw ${isExpanded ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded ? 'Expand All' : 'Collapse All'}`);
					$(this).toggleClass('btn-danger', !isExpanded);
					$(this).toggleClass('btn-info', isExpanded);
					history.replaceState({}, document.title, window.location.pathname);
				});
			});

			let btnExpand = '<a type="button" data-toggle="collapse" href="#show' + v.id_layanan_pendaftaran + '" class="btn btn-info btn-xs" aria-expanded="false" id="btn-expand-form-all' + v.id_layanan_pendaftaran + '"><i id="expand-icon' + v.id_layanan_pendaftaran + '" class="fas fa-fw fa-expand mr-1"></i>Expand All </a>';
			html += `<tr>
						<td class="center">${(no + i) + ((data.page - 1) * data.limit)}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama_pasien}</td>
						<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
						<td class="center">${((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '')}</td>
						<td class="left">${v.nama_layanan}</td>
						<td class="left">${v.dokter_dpjp}</td>
						<td class="right">${money_format(v.total)}</td>
						<td class="center">${v.penjamin}</td>
						<td class="left">${v.diagnosa}</td>
						<td class="wrapper right">
							${v.detail.length >= 1 ? btnExpand : ''}
						</td>
					</tr>
					<tr id="show${v.id_layanan_pendaftaran}" class="collapse">
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: #f9e897; font-weight: bold;" class="center">No</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="center">Waktu Penjualan</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="left">No Resep</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="left">Dokter Resep</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="right">Detail Biaya</td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
					</tr>`

			$.each(v.detail, function(key, val) {
				html += `
					${'<tr id="show' + v.id_layanan_pendaftaran + '" class="collapse">'}
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: #fdf5d0;" class="center">${key+1}</td>
						<td style="background-color: #fdf5d0;" class="center">${((val.waktu_penjualan !== null) ? datetimefmysql(val.waktu_penjualan) : '')}</td>
						<td style="background-color: #fdf5d0;" class="left">${val.id_resep_tebus}</td>
						<td style="background-color: #fdf5d0;" class="left">${val.dokter_resep}</td>
						<td style="background-color: #fdf5d0;" class="right">${money_format(val.total)}</td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
					</tr>`;
			})
						
		})

		$('#table-data-01').append(html + '</tbody>')
	}

	function laporanPerencanaan02(data) {
		$('#label-lap-02').empty();
		let periode       =  data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin      =  data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;:</b> ${data.penjamin}</p>` : '';
		let jenis_layanan =  data.jenis_layanan != '' ? `<p><b>Jenis Layanan :</b> ${data.jenis_layanan}</p>` : '';
		let poliklinik    =  data.poliklinik != '' ? `<p><b>Poliklinik &emsp;&emsp;:</b> ${data.poliklinik}</p>` : '';
		let bangsal_ranap =  data.bangsal_ranap != '' ? `<p><b>Bangsal &emsp;&emsp;&emsp;:</b> ${data.bangsal_ranap}</p>` : '';
		let bangsal_icare =  data.bangsal_icare != '' ? `<p><b>Bangsal &emsp;&emsp;&emsp;:</b> ${data.bangsal_icare}</p>` : '';
		let operasi 	  =  data.operasi != '' ? `<p><b>Layanan Operasi:</b> ${data.operasi}</p>` : '';
		let timing 		  =  data.timing != '' ? `<p><b>Timing &emsp;&emsp;&emsp;:</b> ${data.timing}</p>` : '';
		let status_operasi=  data.status_operasi != '' ? `<p><b>Status Operasi:</b> ${data.status_operasi}</p>` : '';
		let dokter	      =  data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;&emsp;:</b> ${data.dokter}</p>` : '';
		let dokter_operasi=  data.dokter_operasi != '' ? `<p><b>Tim Operasi &emsp;:</b> ${data.dokter_operasi}</p>` : '';
		let label_lap     = periode+penjamin+jenis_layanan+poliklinik+bangsal_ranap+bangsal_icare+operasi+timing+status_operasi+dokter+dokter_operasi;
		$('#label-lap-02').append(label_lap);

		$('#pagination_02').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_02').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let no   = 1;
		let html = '';
		$('#table-data-02').empty()

		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">No RM</th>
						<th class="left">Nama Pasien</th>
						<th class="center">Status</th>
						<th class="center">Layanan</th>
						<th class="center">Timing</th>
						<th class="center">Waktu Order</th>
						<th class="center">Penjamin</th>
						<th class="center">Jenis Layanan</th>
						<th class="left">Ruangan</th>
						<th class="left">Dokter</th>
						<th class="center">Waktu Mulai</th>
						<th class="left">Tindakan</th>
						<th class="right">Total</th>
						<th class="right"></th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			$(document).ready(function() {
				$('#btn-expand-form-all' + v.id).click(function() {
					const isExpanded = $(this).attr('aria-expanded') === 'true';
					$('#expand-icon' + v.id).toggleClass('active', isExpanded);
					$(this).html(`<i class="fas fa-fw ${isExpanded ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded ? 'Expand All' : 'Collapse All'}`);
					$(this).toggleClass('btn-danger', !isExpanded);
					$(this).toggleClass('btn-info', isExpanded);
					history.replaceState({}, document.title, window.location.pathname);
				});
			});
			let btnExpand = '<a type="button" data-toggle="collapse" href="#show' + v.id + '" class="btn btn-info btn-xs" aria-expanded="false" id="btn-expand-form-all' + v.id + '"><i id="expand-icon' + v.id + '" class="fas fa-fw fa-expand mr-1"></i>Expand All </a>';

			
			let ruangan = '';
			if(v.jenis_layanan=='Rawat Inap'){ ruangan=v.bangsal_ri+' Ruang '+v.no_ruang_ri+' Bed '+v.no_bed_ri;
			} else if(v.jenis_layanan=='Intensive Care') { ruangan=v.bangsal_ic+' Ruang '+v.no_ruang_ic+' Bed '+v.no_bed_ic;
			} else if(v.jenis_layanan=='Poliklinik') { ruangan=v.poliklinik;
			} else {ruangan=v.jenis_layanan}
			html += `<tr>
						<td class="center">${(no + i) + ((data.page - 1) * data.limit)}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama_pasien}</td>
						<td class="center">${v.status}</td>
						<td class="center">${v.layanan}</td>
						<td class="left">${((v.timing !== null) ? v.timing : '')}</td>
						<td class="center">${((v.waktu_order !== null) ? datetimefmysql(v.waktu_order) : '')}</td>
						<td class="center">${v.penjamin}</td>
						<td class="center">${v.jenis_layanan}</td>
						<td class="left">${ruangan}</td>
						<td class="left">${v.dokter}</td>
						<td class="center">${((v.waktu_mulai !== null) ? datetimefmysql(v.waktu_mulai) : '')}</td>
						<td class="left">${((v.tindakan !== null) ? v.tindakan : '')}</td>
						<td class="right">${((v.total !== null) ? money_format(v.total) : '')}</td>
						<td class="wrapper right">
							${v.detail.length >= 1 ? btnExpand : ''}
						</td>
					</tr>
					<tr id="show${v.id}" class="collapse">
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: #f9e897; font-weight: bold;" class="center">No</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="right">Jasa</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="right">Jasa Netto</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="left">Dokter</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="left">Status</td>
						<td style="background-color: #f9e897; font-weight: bold;" class="left">Petugas</td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
					</tr>`

			$.each(v.detail, function(key, val) {
				html += `
					${'<tr id="show' + v.id + '" class="collapse">'}
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: #fdf5d0;" class="center">${key+1}</td>
						<td style="background-color: #fdf5d0;" class="right">${money_format(val.jasa)}</td>
						<td style="background-color: #fdf5d0;" class="right">${money_format(val.jasa_netto)}</td>
						<td style="background-color: #fdf5d0;" class="left">${val.dokter}</td>
						<td style="background-color: #fdf5d0;" class="left">${val.status}</td>
						<td style="background-color: #fdf5d0;" class="left">${val.petugas}</td>
						<td style="background-color: white;" class="center"></td>
						<td style="background-color: white;" class="center"></td>
					</tr>`;
			})
		})
		$('#table-data-02').append(html + '</tbody>')
	}

	function laporanPerencanaan03(data) {

		$('#label-lap-03').empty();
		let periode       =  data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin      =  data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;:</b> ${data.penjamin}</p>` : '';		
		let bangsal_ranap =  data.bangsal_ranap != '' ? `<p><b>Bangsal &emsp;&emsp;&emsp;:</b> ${data.bangsal_ranap}</p>` : '';
		let dokter	      =  data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;&emsp;:</b> ${data.dokter}</p>` : '';
		let label_lap     = periode+penjamin+bangsal_ranap+dokter;
		$('#label-lap-03').append(label_lap);

		$('#pagination_03').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_03').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let no   = 1;
		let html = '';
		$('#table-data-03').empty()

		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">No RM</th>
						<th class="left">Nama Pasien</th>
						<th class="center">Waktu Masuk Ranap</th>
						<th class="center">Status Terlayani</th>
						<th class="left">Dokter</th>
						<th class="center">Penjamin</th>
						<th class="left">Ruangan</th>
						<th class="center">Tgl Keluar</th>
						<th class="center">Tindak Lanjut</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			let ruangan = '';
			ruangan=v.bangsal+' Ruang '+v.no_ruang+' Bed '+v.no_bed;
			html += `<tr>
						<td class="center">${(no + i) + ((data.page - 1) * data.limit)}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama_pasien}</td>
						<td class="center">${((v.waktu_masuk_ranap !== null) ? datetimefmysql(v.waktu_masuk_ranap) : '-')}</td>
						<td class="center">${v.status_terlayani}</td>
						<td class="left">${((v.dokter !== null) ? v.dokter : '-')}</td>
						<td class="center">${v.penjamin}</td>
						<td class="left">${ruangan}</td>
						<td class="center">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '-')}</td>
						<td class="center">${((v.tindak_lanjut !== null) ? v.tindak_lanjut : '-')}</td>
					</tr>`
		})
		$('#table-data-03').append(html + '</tbody>')
	}

	function laporanPerencanaan04(data) {

		$('#label-lap-04').empty();
		let periode        =  data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin       =  data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;&emsp;:</b> ${data.penjamin}</p>` : '';		
		let bangsal_ranap  =  data.bangsal_ranap != '' ? `<p><b>Bangsal &emsp;&emsp;&emsp;&emsp;:</b> ${data.bangsal_ranap}</p>` : '';
		let kategori_dokter=  data.kategori_dokter != '' ? `<p><b>Kategori Dokter&emsp;:</b> ${data.kategori_dokter}</p>` : '';
		let dokter	       =  data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;&emsp;&emsp;:</b> ${data.dokter}</p>` : '';
		let label_lap      = periode+penjamin+bangsal_ranap+kategori_dokter+dokter;
		$('#label-lap-04').append(label_lap);

		$('#pagination_04').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_04').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let no   = 1;
		let html = '';
		$('#table-data-04').empty()

		html += `<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">Tgl Layanan</th>
						<th class="center">No RM</th>
						<th class="left">Nama Pasien</th>
						<th class="center">Penjamin</th>
						<th class="left">Ruangan</th>
						<th class="left">Dokter DPJP</th>
						<th class="center">Waktu CPPT</th>
						<th class="left">Petugas</th>
						<th class="center">Waktu Verif Raber</th>
						<th class="left">Dokter Verifikasi DPJP</th>
						<th class="center">Waktu Verif DPJP</th>
						<th class="left">Dokter Verifikasi TBAK</th>
						<th class="center">Waktu Verif TBAK</th>
					</tr>
				</thead>
				<tbody>`
					
		$.each(data.data, function(i, v) {
			$.each(v.cppt, function(index, val) {
				if (index <= 0) {
					html += `<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '-')}</td>
								<td class="center">${v.id_pasien}</td>
								<td class="left">${v.nama_pasien}</td>
								<td class="center">${v.penjamin}</td>
								<td class="left">${v.ruangan}</td>
								<td class="left">${((v.dokter_dpjp !== null) ? v.dokter_dpjp : '-')}</td>
								<td class="center">${((val.waktu !== null) ? datetimefmysql(val.waktu) : '-')}</td>
								<td class="left">${((val.petugas !== null) ? ((val.profesi !== null) ? val.petugas+' ('+ val.profesi+')' : '') : val.petugas)}</td>
								<td class="center">${((val.waktu_verif_raber !== null) ? datetimefmysql(val.waktu_verif_raber) : '-')}</td>
								<td class="left">${((val.dokter_verifikasi_dpjp !== null) ? val.dokter_verifikasi_dpjp : '-')}</td>
								<td class="center">${((val.waktu_verif_dpjp !== null) ? datetimefmysql(val.waktu_verif_dpjp) : '-')}</td>
								<td class="left">${((val.dokter_verifikasi_tbak !== null) ? val.dokter_verifikasi_tbak : '-')}</td>
								<td class="center">${((val.waktu_penerima_tbak !== null) ? datetimefmysql(val.waktu_penerima_tbak) : '-')}</td>
							</tr>`
				} else {
						html += `<tr>
								<td colspan="7"> </td>
								<td class="center">${((val.waktu !== null) ? datetimefmysql(val.waktu) : '-')}</td>
								<td class="left">${((val.petugas !== null) ? ((val.profesi !== null) ? val.petugas+' ('+ val.profesi+')' : '') : val.petugas)}</td>
								<td class="center">${((val.waktu_verif_raber !== null) ? datetimefmysql(val.waktu_verif_raber) : '-')}</td>
								<td class="left">${((val.dokter_verifikasi_dpjp !== null) ? val.dokter_verifikasi_dpjp : '-')}</td>
								<td class="center">${((val.waktu_verif_dpjp !== null) ? datetimefmysql(val.waktu_verif_dpjp) : '-')}</td>
								<td class="left">${((val.dokter_verifikasi_tbak !== null) ? val.dokter_verifikasi_tbak : '-')}</td>
								<td class="center">${((val.waktu_penerima_tbak !== null) ? datetimefmysql(val.waktu_penerima_tbak) : '-')}</td>
							</tr>`
				}				
			})			
		})
		$('#table-data-04').append(html + '</tbody>')
	}

	function laporanPerencanaan05(data) {

		$('#label-lap-05').empty();
		let jml_data      =  data.jml_data  != '' ? `<p><b>Jumlah Pasien :</b> ${data.jml_data}</p>` : '';
		let periode       =  data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin      =  data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;:</b> ${data.penjamin}</p>` : '';
		let jenis_layanan =  data.jenis_layanan != '' ? `<p><b>Jenis Layanan :</b> ${data.jenis_layanan}</p>` : '';
		let poliklinik    =  data.poliklinik != '' ? `<p><b>Poliklinik &emsp;&emsp;:</b> ${data.poliklinik}</p>` : '';
		let label_lap     = jml_data+periode+penjamin+jenis_layanan+poliklinik;
		$('#label-lap-05').append(label_lap);

		let no   = 1;
		let html = '';
		$('#table-data-05').empty()
		html += `<thead>
					<tr>
						<th rowspan="2" width="2%" class="center">No.</th>
						<th rowspan="2" width="5%" class="left">No Register</th>
						<th rowspan="2" width="3%" class="left">No RM</th>
						<th rowspan="2" width="9%" class="left">Nama Pasien</th>						
						<th rowspan="2" width="7%" class="left">Tgl Daftar</th>
						<th rowspan="2" width="7%" class="left">Tgl Keluar</th>
						
						<th rowspan="2" colspan="3" class="center">
						<table>
							<thead>
							<tr>
								<th colspan="3" class="center">Layanan</th>
							</tr>
							<tr>
								<th width="5%"  class="left">Penjamin</th>
								<th width="8%"  class="left">Jenis Layanan</th>
								<th width="12%" class="left">Dokter DPJP</th>
							</tr>
							</thead>
						</table>
						</th>						
						<th rowspan="2" colspan="4" class="center">
						<table>
							<thead>
							<tr>
								<th colspan="4" class="center">Laboratorium</th>
							</tr>
							<tr>
								<th width="7%"  class="left">No Lab</th>
								<th width="12%" class="left">Dokter Lab</th>
								<th width="13%" class="left">Tindakan</th>
								<th width="5%"  class="right">Total</th>
							</tr>
							</thead>
						</table>
						</th>
						<th rowspan="2" width="5%" class="right">Total Seluruh<br>Kunjungan</th>
					</tr>
				</thead>
				<tbody style="overflow:scroll;">`
					
		$.each(data.data, function(i, v) {

			$.each(v.tempat_layanan, function(i_tl, v_tl) {

				$.each(v_tl.tindakan, function(i_t, v_t) {
					if ((i_tl <= 0) && (i_t <= 0)) {
						html += `<tr>
							<td width="2%"  class="center">${(no + i) + ((data.page - 1) * data.limit)}</td>
							<td width="5%"  class="left">${v.no_register}</td>
							<td width="3%"  class="left">${v.id_pasien}</td>
							<td width="9%"  class="left">${v.nama_pasien}</td>
							<td width="7%"  class="left">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
							<td width="7%"  class="left">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '')}</td>
							<td width="5%"  class="left">${v_tl.penjamin}</td>
							<td width="8%"  class="left">${v_tl.tempat_layanan}</td>
							<td width="14%" class="left">${v_tl.dokter_dpjp}</td>							
							<td width="7%"  class="left">${v_t.no_lab}</td>
							<td width="14%" class="left">${v_t.dokter_pjwb}</td>
							<td width="9%"  class="left">${v_t.tindakan}</td>
							<td width="5%"  class="right">${money_format(v_t.total)}</td>
							<td width="5%"  class="right">${money_format(v.total)}</td>
						</tr>`
					} else if (i_t <= 0) {
						html += `<tr>
							<td colspan="6"> </td>
							<td width="5%"  class="left">${v_tl.penjamin}</td>
							<td width="8%"  class="left">${v_tl.tempat_layanan}</td>
							<td width="14%" class="left">${v_tl.dokter_dpjp}</td>							
							<td width="7%"  class="left">${v_t.no_lab}</td>
							<td width="14%" class="left">${v_t.dokter_pjwb}</td>
							<td width="9%"  class="left">${v_t.tindakan}</td>
							<td width="5%"  class="right">${money_format(v_t.total)}</td>
							<td></td>
						</tr>`
					} else {
						html += `<tr>
							<td colspan="9"> </td>						
							<td width="7%"  class="left">${v_t.no_lab}</td>
							<td width="14%" class="left">${v_t.dokter_pjwb}</td>
							<td width="9%"  class="left">${v_t.tindakan}</td>
							<td width="5%"  class="right">${money_format(v_t.total)}</td>
							<td></td>
						</tr>`
					}				
				})
			})
				
			html += `<tr><td colspan="14" style="background-color: #dff6ff;"> </td></tr>`						
		})

		$('#table-data-05').append(html + '</tbody>')
	}

	function laporanPerencanaan06(data) {

		$('#label-lap-06').empty();
		let jml_data    = data.jml_data  != '' ? `<p><b>Jumlah Data &emsp;&emsp;&emsp;:</b> ${data.jml_data}</p>` : '';
		let periode    = data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;&emsp;&emsp;:</b> ${data.periode}</p>` : '';
		let penjamin   = data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;&emsp;&emsp;:</b> ${data.penjamin}</p>` : '';		
		let poliklinik = data.poliklinik != '' ? `<p><b>Poliklinik &emsp;&emsp;&emsp;&emsp;:</b> ${data.poliklinik}</p>` : '';
		let boocin	   = data.boocin != '' ? `<p><b>Jenis Boocin &emsp;&emsp;:</b> ${data.boocin}</p>` : '';
		let rata_rata  = data.rata_rata != '' ? `<p><b>Rata Rata Seluruh :</b> ${data.rata_rata}</p>` : '';
		let label_lap  = jml_data+periode+penjamin+poliklinik+rata_rata;
		$('#label-lap-06').append(label_lap);

		$('#pagination_06').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_06').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let no   = 1;
		let html = '';
		$('#table-data-06').empty()

		html += `<thead>
					<tr>
						<th rowspan="2" class="center">No.</th>
						<th rowspan="2" class="center">Kode Booking</th>
						<th rowspan="2" class="center">Tgl Kunjungan</th>
						<th rowspan="2" class="center">No RM</th>
						<th rowspan="2" class="left">Nama Pasien</th>
						<th rowspan="2" class="center">Penjamin</th>
						<th rowspan="2" class="center">Poliklinik</th>
						<th rowspan="2" class="center">Jenis Booking</th>
						<th rowspan="2" class="center">Waktu Hadir</th>
						<th rowspan="2" colspan="3" class="center">
							<table>
								<thead>
									<tr>
										<th colspan="3" class="center">Waktu Check-in</th>
									</tr>
									<tr>
										<th class="center">Task 1</th>
										<th class="center">Task 2</th>
										<th class="center">Task 3</th>
									</tr>
								</thead>
							</table>
						</th>
						<th rowspan="2" class="center">Selisih Waktu<br>Check-in</th>
						<th rowspan="2" class="center">Rata-Rata<br>Per Pasien</th>
					</tr>
				</thead>
				<tbody>`

		$.each(data.data, function(i, v) {
			html += `<tr>
						<td class="center">${(no + i) + ((data.page - 1) * data.limit)}</td>
						<td class="center">${v.kode_booking}</td>
						<td class="center">${((v.tanggal_kunjungan !== null) ? datefmysql(v.tanggal_kunjungan) : '-')}</td>
						<td class="center">${v.id}</td>
						<td class="left">  ${v.nama_pasien}</td>
						<td class="center">${v.penjamin}</td>
						<td class="center">${v.poliklinik}</td>
						<td class="center">${((v.lokasi_data !== null) ? v.lokasi_data : '-')}</td>
						<td class="center">${((v.waktu_hadir !== null) ? datetimefmysql(v.waktu_hadir) : '-')}</td>
						<td class="center">${v.task_satu}</td>
						<td class="center">${v.task_dua}</td>
						<td class="center">${v.task_tiga}</td>
						<td class="center">${v.selisih_waktu}</td>
						<td class="center">${v.rata_selisih_waktu}</td>
					</tr>`
		})
		$('#table-data-06').append(html + '</tbody>')
	}

	function paging(page) {
		getLaporanPerencanaan(page)
	}
</script>