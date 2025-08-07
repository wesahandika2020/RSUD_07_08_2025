<style>
	/* #parent {
		height: 450px;
		overflow-y: auto;
		overflow-x: 0;
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

		$('#jenis-laporan').change(function() {

			if ($('#jenis-laporan').val() == '2') {
				$('#notif-modal-label').html('Gunakan <b style="color: red;">TGL LAYANAN</b> dengan <b style="color: red;">Periode Harian</b> jika ingin melihat <b style="color: red;">seluruh dokter</b>. Jika ingin melihat degan <b style="color: red;">Periode Bulanan</b> pilih <b style="color: red;">per Dokter</b>. Hal ini akan mengurangi pengambilan data berlebih.')
			} else if ($('#jenis-laporan').val() == '3') {
				$('#notif-modal-label').html('Gunakan <b style="color: red;">TGL LAYANAN</b> dengan <b style="color: red;">Periode Harian</b> jika ingin melihat <b style="color: red;">seluruh petugas</b>. Jika ingin melihat degan <b style="color: red;">Periode Bulanan</b> pilih <b style="color: red;">per Petugas</b>. Hal ini akan mengurangi pengambilan data berlebih.')
			} else {
				$('#notif-modal-label').html('')
			}

			if ($('#jenis-laporan').val() !== '') {
				resetAllForm()
				$('#modal-search').modal('show')

				$('#label-tanggal').empty();
				if ($('#jenis-laporan').val() == '1') {
					$('#label-tanggal').append('Tanggal Layanan');
				} else if ($('#jenis-laporan').val() == '2') {
					$('#label-tanggal').append('Tanggal Layanan');
				} else if ($('#jenis-laporan').val() == '3') {
					$('#label-tanggal').append('Tanggal Layanan');
				} else {
					$('#label-tanggal').append('Tanggal');
				}

			} else {
				$('#modal-search').modal('hide')
			}

			if ($('#jenis-laporan').val() == '1') {
				$('#dokter-search').parent().parent().show();
				$('#petugas-search').parent().parent().hide();
			} else if ($('#jenis-laporan').val() == '2') {
				$('#dokter-search').parent().parent().show();
				$('#petugas-search').parent().parent().hide();
			} else if ($('#jenis-laporan').val() == '3') {
				$('#dokter-search').parent().parent().hide();
				$('#petugas-search').parent().parent().show();
			}

			if ($('#jenis-laporan').val() == '5') {
				$('#kelas-rawat-search').parent().parent().show();
				$('#jenis-rawat-search').parent().parent().show();
				$('#petugas-search').parent().parent().hide();
			} else {
				$('#kelas-rawat-search').parent().parent().hide();
				$('#jenis-rawat-search').parent().parent().hide();
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
				window.open('<?= base_url('laporan_keuangan/export_laporan_01?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('laporan_keuangan/export_laporan_02?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('laporan_keuangan/export_laporan_03?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '4') {
				window.open('<?= base_url('laporan_keuangan/export_laporan_04?') ?>' + $('#form-search').serialize())
			} else if ($('#jenis-laporan').val() == '5') {
				window.open('<?= base_url('laporan_keuangan/export_laporan_05?') ?>' + $('#form-search').serialize())
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

		$('#petugas-search').select2({
			ajax: {
				url: "<?= base_url('laporan_keuangan/api/laporan_keuangan/dokter_lain_auto') ?>",
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
				var markup = '<b>' + data.nama + '</b>';
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
	}

	function getLaporanKeuangan(page) {
		hideLaporan();

		// Laporan Pendapatan Berdasarkan Layanan Dokter DPJP
		if ($('#jenis-laporan').val() == '1') {
			$('#page-now').val(page)
			$('.lap-01, #tabs-lap01').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_keuangan/api/laporan_keuangan/get_list_laporan_keuangan_01') ?>',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanKeuangan01(data)
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
				url: '<?= base_url('laporan_keuangan/api/laporan_keuangan/get_list_laporan_keuangan_02') ?>',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanKeuangan02(data)
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
			$('#page-now').val(page)
			$('.lap-03, #tabs-lap03').show()

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_keuangan/api/laporan_keuangan/get_list_laporan_keuangan_03') ?>',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanKeuangan03(data)
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
				url: '<?= base_url('laporan_keuangan/api/laporan_keuangan/get_list_laporan_keuangan_04') ?>',
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanKeuangan04(data)
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
				url: '<?= base_url('laporan_keuangan/api/laporan_keuangan/get_list_laporan_keuangan_05') ?>/page/' + page,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanKeuangan05(data)
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

	function laporanKeuangan01(data) {
		$('#label-lap-01').empty();
		let periode = data.periode != '' ? `<p><b>Periode &emsp;&emsp;</b> ${data.periode}</p>` : '';
		let penjamin = data.penjamin != '' ? `<p><b>Penjamin &emsp;</b> ${data.penjamin}</p>` : '';
		let dokter = data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;</b> ${data.dokter}<p>` : '';
		let label_01 = periode + penjamin + dokter;
		$('#label-lap-01').append(label_01);

		let html = '';
		$('#table-data-01').empty()
		html += `<div class="col-lg-12 table-responsive m-t-10" id="parent">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr style="top: 0;">
							<th class="center" rowspan="3">No.</th>	
							<th class="center" rowspan="3">Dokter</th>
							<th class="center" rowspan="3">Penjamin</th>
							<th class="center" colspan="16">Tindakan</th>
							<th class="center" rowspan="3">Total Tindakan</th>
							<th class="center" rowspan="3">Resep</th>
							<th class="center" rowspan="3">BHP</th>
						</tr>
						<tr style="top: 0;">
							<th class="center" colspan="2">Poliklinik</th>
							<th class="center" colspan="2">IGD</th>
							<th class="center" colspan="2">Rawat Inap</th>						
							<th class="center" colspan="2">Intensive Care</th>
							<th class="center" colspan="2">Medical Check Up</th>
							<th class="center" colspan="2">Radiologi</th>
							<th class="center" colspan="2">Laboratorium</th>
							<th class="center" colspan="2">Hemodialisa</th>
						</tr>
						<tr style="top: 0;">
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
						</tr>
					</thead>
				<tbody>`;

		let no = 1;
		let layanan = '';
		let poli_jml = 0;
		let poli_total = 0;
		let igd_jml = 0;
		let igd_total = 0;
		let ranap_jml = 0;
		let ranap_total = 0;
		let ic_jml = 0;
		let ic_total = 0;
		let mcu_jml = 0;
		let mcu_total = 0;
		let rad_jml = 0;
		let rad_total = 0;
		let lab_jml = 0;
		let lab_total = 0;
		let hd_jml = 0;
		let hd_total = 0;
		let resep = 0;
		let bhp = 0;

		let all_total_tindakan = 0;
		let all_poli_jml = 0;
		let all_poli_total = 0;
		let all_igd_jml = 0;
		let all_igd_total = 0;
		let all_ranap_jml = 0;
		let all_ranap_total = 0;
		let all_ic_jml = 0;
		let all_ic_total = 0;
		let all_mcu_jml = 0;
		let all_mcu_total = 0;
		let all_rad_jml = 0;
		let all_rad_total = 0;
		let all_lab_jml = 0;
		let all_lab_total = 0;
		let all_hd_jml = 0;
		let all_hd_total = 0;
		let all_resep = 0;
		let all_bhp = 0;

		$.each(data.data, function(key_dokter, penjamin_list) {
			nama_dokter = key_dokter.replace(/_/g, ' ');

			$.each(penjamin_list, function(key_penjamin, layanan_list) {
				penjamin = key_penjamin.replace(/_/g, ' ');

				$.each(layanan_list, function(key_layanan, value_layanan) {
					layanan = key_layanan.replace(/_/g, ' ');

					if (layanan === 'Poliklinik') {
						poli_jml = value_layanan[0].jml;
						poli_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'IGD') {
						igd_jml = value_layanan[0].jml;
						igd_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Rawat Inap') {
						ranap_jml = value_layanan[0].jml;
						ranap_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Intensive Care') {
						ic_jml = value_layanan[0].jml;
						ic_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Medical Check Up') {
						mcu_jml = value_layanan[0].jml;
						mcu_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Radiologi') {
						rad_jml = value_layanan[0].jml;
						rad_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Laboratorium') {
						lab_jml = value_layanan[0].jml;
						lab_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Hemodialisa') {
						hd_jml = value_layanan[0].jml;
						hd_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Resep') {
						resep = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Bhp') {
						bhp = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

				});

				console.log(layanan);
				total_tindakan = parseInt(poli_total) + parseInt(igd_total) + parseInt(ranap_total) + parseInt(ic_total) + parseInt(mcu_total) + parseInt(rad_total) + parseInt(lab_total) + parseInt(hd_total);
				all_total_tindakan += parseInt(total_tindakan);
				all_poli_jml += parseInt(poli_jml);
				all_poli_total += parseInt(poli_total);
				all_igd_jml += parseInt(igd_jml);
				all_igd_total += parseInt(igd_total);
				all_ranap_jml += parseInt(ranap_jml);
				all_ranap_total += parseInt(ranap_total);
				all_ic_jml += parseInt(ic_jml);
				all_ic_total += parseInt(ic_total);
				all_mcu_jml += parseInt(mcu_jml);
				all_mcu_total += parseInt(mcu_total);
				all_rad_jml += parseInt(rad_jml);
				all_rad_total += parseInt(rad_total);
				all_lab_jml += parseInt(lab_jml);
				all_lab_total += parseInt(lab_total);
				all_hd_jml += parseInt(hd_jml);
				all_hd_total += parseInt(hd_total);
				all_resep += parseInt(resep);
				all_bhp += parseInt(bhp);


				html += `<tr>
							<td class="center">${no++}</td>
							<td class="left">${nama_dokter}</td>
							<td class="center">${penjamin}</td>

							<td class="center" style="background: #45b1ff33;">${poli_jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(poli_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${igd_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(igd_total)}</td>
							
							<td class="center" style="background: #45b1ff33;">${ranap_jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(ranap_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${ic_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(ic_total)}</td>
							
							<td class="center" style="background: #45b1ff33;">${mcu_jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(mcu_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${rad_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(rad_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${lab_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(lab_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${hd_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(hd_total)}</td>
							
							<td class="right"  style="background: #45b1ff33;"><b>${money_format(total_tindakan)}</b></td>

							<td class="right">${money_format(resep)}</td>
							<td class="right">${money_format(bhp)}</td>

						</tr>`;

				layanan = '';
				poli_jml = 0;
				poli_total = 0;
				igd_jml = 0;
				igd_total = 0;
				ranap_jml = 0;
				ranap_total = 0;
				ic_jml = 0;
				ic_total = 0;
				mcu_jml = 0;
				mcu_total = 0;
				rad_jml = 0;
				rad_total = 0;
				lab_jml = 0;
				lab_total = 0;
				hd_jml = 0;
				hd_total = 0;
				resep = 0;
				bhp = 0;

			});
		});

		html += `<tr style="background-color: #45b1ff94;">
							<td class="right" colspan="3"><b>TOTAL SELURUH</b></td>
							<td class="center"><b>${all_poli_jml}</b></td>
							<td class="right" ><b>${money_format(all_poli_total)}</b></td>
							<td class="center"><b>${all_igd_jml}</b></td>
							<td class="right" ><b>${money_format(all_igd_total)}</b></td>
							<td class="center"><b>${all_ranap_jml}</b></td>
							<td class="right" ><b>${money_format(all_ranap_total)}</b></td>
							<td class="center"><b>${all_ic_jml}</b></td>
							<td class="right" ><b>${money_format(all_ic_total)}</b></td>
							<td class="center"><b>${all_mcu_jml}</b></td>
							<td class="right" ><b>${money_format(all_mcu_total)}</b></td>
							<td class="center"><b>${all_rad_jml}</b></td>
							<td class="right" ><b>${money_format(all_rad_total)}</b></td>
							<td class="center"><b>${all_lab_jml}</b></td>
							<td class="right" ><b>${money_format(all_lab_total)}</b></td>
							<td class="center"><b>${all_hd_jml}</b></td>
							<td class="right" ><b>${money_format(all_hd_total)}</b></td>
							<td class="right" ><b>${money_format(all_total_tindakan)}</b></td>
							<td class="right" ><b>${money_format(all_resep)}</b></td>
							<td class="right" ><b>${money_format(all_bhp)}</b></td>
						</tr>`;

		html += `</tbody>
				</table>
			</div>`;
		$('#table-data-01').append(html)
	}

	function laporanKeuangan02(data) {
		$('#label-lap-02').empty();
		let periode = data.periode != '' ? `<p><b>Periode &emsp;&emsp;</b> ${data.periode}</p>` : '';
		let penjamin = data.penjamin != '' ? `<p><b>Penjamin &emsp;</b> ${data.penjamin}</p>` : '';
		let dokter = data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;</b> ${data.dokter}<p>` : '';
		let label_02 = periode + penjamin + dokter;
		$('#label-lap-02').append(label_02);

		let html = '';
		$('#table-data-02').empty()
		html += `<div class="col-lg-12 table-responsive m-t-10" id="parent">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr style="top: 0;">
							<th class="center" rowspan="3">No.</th>	
							<th class="center" rowspan="3">Dokter</th>
							<th class="center" rowspan="3">Penjamin</th>
							<th class="center" colspan="16">Tindakan</th>
							<th class="center" rowspan="3">Total Tindakan</th>
							<th class="center" rowspan="3">Resep</th>
						</tr>
						<tr style="top: 0;">
							<th class="center" colspan="2">Poliklinik</th>
							<th class="center" colspan="2">IGD</th>
							<th class="center" colspan="2">Rawat Inap</th>						
							<th class="center" colspan="2">Intensive Care</th>
							<th class="center" colspan="2">Medical Check Up</th>
							<th class="center" colspan="2">Radiologi</th>
							<th class="center" colspan="2">Laboratorium</th>
							<th class="center" colspan="2">Hemodialisa</th>
						</tr>
						<tr style="top: 0;">
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
						</tr>
					</thead>
				<tbody>`;

		let no = 1;
		let layanan = '';
		let poli_jml = 0;
		let poli_total = 0;
		let igd_jml = 0;
		let igd_total = 0;
		let ranap_jml = 0;
		let ranap_total = 0;
		let ic_jml = 0;
		let ic_total = 0;
		let mcu_jml = 0;
		let mcu_total = 0;
		let rad_jml = 0;
		let rad_total = 0;
		let lab_jml = 0;
		let lab_total = 0;
		let hd_jml = 0;
		let hd_total = 0;
		let resep = 0;

		let all_total_tindakan = 0;
		let all_poli_jml = 0;
		let all_poli_total = 0;
		let all_igd_jml = 0;
		let all_igd_total = 0;
		let all_ranap_jml = 0;
		let all_ranap_total = 0;
		let all_ic_jml = 0;
		let all_ic_total = 0;
		let all_mcu_jml = 0;
		let all_mcu_total = 0;
		let all_rad_jml = 0;
		let all_rad_total = 0;
		let all_lab_jml = 0;
		let all_lab_total = 0;
		let all_hd_jml = 0;
		let all_hd_total = 0;
		let all_resep = 0;

		$.each(data.data, function(key_dokter, penjamin_list) {
			nama_dokter = key_dokter.replace(/_/g, ' ');

			$.each(penjamin_list, function(key_penjamin, layanan_list) {
				penjamin = key_penjamin.replace(/_/g, ' ');

				$.each(layanan_list, function(key_layanan, value_layanan) {
					layanan = key_layanan.replace(/_/g, ' ');

					if (layanan === 'Poliklinik') {
						poli_jml = value_layanan[0].jml;
						poli_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'IGD') {
						igd_jml = value_layanan[0].jml;
						igd_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Rawat Inap') {
						ranap_jml = value_layanan[0].jml;
						ranap_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Intensive Care') {
						ic_jml = value_layanan[0].jml;
						ic_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Medical Check Up') {
						mcu_jml = value_layanan[0].jml;
						mcu_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Radiologi') {
						rad_jml = value_layanan[0].jml;
						rad_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Laboratorium') {
						lab_jml = value_layanan[0].jml;
						lab_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Hemodialisa') {
						hd_jml = value_layanan[0].jml;
						hd_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Resep') {
						resep = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

				});

				total_tindakan = parseInt(poli_total) + parseInt(igd_total) + parseInt(ranap_total) + parseInt(ic_total) + parseInt(mcu_total) + parseInt(rad_total) + parseInt(lab_total) + parseInt(hd_total);
				all_total_tindakan += parseInt(total_tindakan);
				all_poli_jml += parseInt(poli_jml);
				all_poli_total += parseInt(poli_total);
				all_igd_jml += parseInt(igd_jml);
				all_igd_total += parseInt(igd_total);
				all_ranap_jml += parseInt(ranap_jml);
				all_ranap_total += parseInt(ranap_total);
				all_ic_jml += parseInt(ic_jml);
				all_ic_total += parseInt(ic_total);
				all_mcu_jml += parseInt(mcu_jml);
				all_mcu_total += parseInt(mcu_total);
				all_rad_jml += parseInt(rad_jml);
				all_rad_total += parseInt(rad_total);
				all_lab_jml += parseInt(lab_jml);
				all_lab_total += parseInt(lab_total);
				all_hd_jml += parseInt(hd_jml);
				all_hd_total += parseInt(hd_total);
				all_resep += parseInt(resep);


				html += `<tr>
							<td class="center">${no++}</td>
							<td class="left">${nama_dokter}</td>
							<td class="center">${penjamin}</td>

							<td class="center" style="background: #45b1ff33;">${poli_jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(poli_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${igd_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(igd_total)}</td>
							
							<td class="center" style="background: #45b1ff33;">${ranap_jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(ranap_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${ic_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(ic_total)}</td>
							
							<td class="center" style="background: #45b1ff33;">${mcu_jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(mcu_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${rad_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(rad_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${lab_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(lab_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${hd_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(hd_total)}</td>
							
							<td class="right"  style="background: #45b1ff33;"><b>${money_format(total_tindakan)}</b></td>

							<td class="right">${money_format(resep)}</td>

						</tr>`;

				layanan = '';
				poli_jml = 0;
				poli_total = 0;
				igd_jml = 0;
				igd_total = 0;
				ranap_jml = 0;
				ranap_total = 0;
				ic_jml = 0;
				ic_total = 0;
				mcu_jml = 0;
				mcu_total = 0;
				rad_jml = 0;
				rad_total = 0;
				lab_jml = 0;
				lab_total = 0;
				hd_jml = 0;
				hd_total = 0;
				resep = 0;

			});
		});

		html += `<tr style="background-color: #45b1ff94;">
							<td class="right" colspan="3"><b>TOTAL SELURUH</b></td>
							<td class="center"><b>${all_poli_jml}</b></td>
							<td class="right" ><b>${money_format(all_poli_total)}</b></td>
							<td class="center"><b>${all_igd_jml}</b></td>
							<td class="right" ><b>${money_format(all_igd_total)}</b></td>
							<td class="center"><b>${all_ranap_jml}</b></td>
							<td class="right" ><b>${money_format(all_ranap_total)}</b></td>
							<td class="center"><b>${all_ic_jml}</b></td>
							<td class="right" ><b>${money_format(all_ic_total)}</b></td>
							<td class="center"><b>${all_mcu_jml}</b></td>
							<td class="right" ><b>${money_format(all_mcu_total)}</b></td>
							<td class="center"><b>${all_rad_jml}</b></td>
							<td class="right" ><b>${money_format(all_rad_total)}</b></td>
							<td class="center"><b>${all_lab_jml}</b></td>
							<td class="right" ><b>${money_format(all_lab_total)}</b></td>
							<td class="center"><b>${all_hd_jml}</b></td>
							<td class="right" ><b>${money_format(all_hd_total)}</b></td>
							<td class="right" ><b>${money_format(all_total_tindakan)}</b></td>
							<td class="right" ><b>${money_format(all_resep)}</b></td>
						</tr>`;

		html += `</tbody>
				</table>
			</div>`;
		$('#table-data-02').append(html)
	}

	function laporanKeuangan03(data) {
		$('#label-lap-03').empty();
		let periode = data.periode != '' ? `<p><b>Periode &emsp;&emsp;</b> ${data.periode}</p>` : '';
		let penjamin = data.penjamin != '' ? `<p><b>Penjamin &emsp;</b> ${data.penjamin}</p>` : '';
		let dokter = data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;</b> ${data.dokter}<p>` : '';
		let label_03 = periode + penjamin + dokter;
		$('#label-lap-03').append(label_03);

		let html = '';
		$('#table-data-03').empty()
		html += `<div class="col-lg-12 table-responsive m-t-10" id="parent">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr style="top: 0;">
							<th class="center" rowspan="3">No.</th>	
							<th class="center" rowspan="3">Dokter</th>
							<th class="center" rowspan="3">Penjamin</th>
							<th class="center" colspan="16">Tindakan</th>
							<th class="center" rowspan="3">Total Tindakan</th>
							<th class="center" rowspan="3">Resep</th>
						</tr>
						<tr style="top: 0;">
							<th class="center" colspan="2">Poliklinik</th>
							<th class="center" colspan="2">IGD</th>
							<th class="center" colspan="2">Rawat Inap</th>						
							<th class="center" colspan="2">Intensive Care</th>
							<th class="center" colspan="2">Medical Check Up</th>
							<th class="center" colspan="2">Radiologi</th>
							<th class="center" colspan="2">Laboratorium</th>
							<th class="center" colspan="2">Hemodialisa</th>
						</tr>
						<tr style="top: 0;">
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
							<th class="center">Jml</th>
							<th class="right" >Total</th>
						</tr>
					</thead>
				<tbody>`;

		let no = 1;
		let layanan = '';
		let poli_jml = 0;
		let poli_total = 0;
		let igd_jml = 0;
		let igd_total = 0;
		let ranap_jml = 0;
		let ranap_total = 0;
		let ic_jml = 0;
		let ic_total = 0;
		let mcu_jml = 0;
		let mcu_total = 0;
		let rad_jml = 0;
		let rad_total = 0;
		let lab_jml = 0;
		let lab_total = 0;
		let hd_jml = 0;
		let hd_total = 0;
		let resep = 0;

		let all_total_tindakan = 0;
		let all_poli_jml = 0;
		let all_poli_total = 0;
		let all_igd_jml = 0;
		let all_igd_total = 0;
		let all_ranap_jml = 0;
		let all_ranap_total = 0;
		let all_ic_jml = 0;
		let all_ic_total = 0;
		let all_mcu_jml = 0;
		let all_mcu_total = 0;
		let all_rad_jml = 0;
		let all_rad_total = 0;
		let all_lab_jml = 0;
		let all_lab_total = 0;
		let all_hd_jml = 0;
		let all_hd_total = 0;
		let all_resep = 0;

		$.each(data.data, function(key_dokter, penjamin_list) {
			nama_dokter = key_dokter.replace(/_/g, ' ');

			$.each(penjamin_list, function(key_penjamin, layanan_list) {
				penjamin = key_penjamin.replace(/_/g, ' ');

				$.each(layanan_list, function(key_layanan, value_layanan) {
					layanan = key_layanan.replace(/_/g, ' ');

					if (layanan === 'Poliklinik') {
						poli_jml = value_layanan[0].jml;
						poli_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'IGD') {
						igd_jml = value_layanan[0].jml;
						igd_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Rawat Inap') {
						ranap_jml = value_layanan[0].jml;
						ranap_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Intensive Care') {
						ic_jml = value_layanan[0].jml;
						ic_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Medical Check Up') {
						mcu_jml = value_layanan[0].jml;
						mcu_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Radiologi') {
						rad_jml = value_layanan[0].jml;
						rad_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Laboratorium') {
						lab_jml = value_layanan[0].jml;
						lab_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Hemodialisa') {
						hd_jml = value_layanan[0].jml;
						hd_total = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

					if (layanan === 'Resep') {
						resep = value_layanan[0].total == null ? 0 : value_layanan[0].total;
					}

				});

				total_tindakan = parseInt(poli_total) + parseInt(igd_total) + parseInt(ranap_total) + parseInt(ic_total) + parseInt(mcu_total) + parseInt(rad_total) + parseInt(lab_total) + parseInt(hd_total);
				all_total_tindakan += parseInt(total_tindakan);
				all_poli_jml += parseInt(poli_jml);
				all_poli_total += parseInt(poli_total);
				all_igd_jml += parseInt(igd_jml);
				all_igd_total += parseInt(igd_total);
				all_ranap_jml += parseInt(ranap_jml);
				all_ranap_total += parseInt(ranap_total);
				all_ic_jml += parseInt(ic_jml);
				all_ic_total += parseInt(ic_total);
				all_mcu_jml += parseInt(mcu_jml);
				all_mcu_total += parseInt(mcu_total);
				all_rad_jml += parseInt(rad_jml);
				all_rad_total += parseInt(rad_total);
				all_lab_jml += parseInt(lab_jml);
				all_lab_total += parseInt(lab_total);
				all_hd_jml += parseInt(hd_jml);
				all_hd_total += parseInt(hd_total);
				all_resep += parseInt(resep);


				html += `<tr>
							<td class="center">${no++}</td>
							<td class="left">${nama_dokter}</td>
							<td class="center">${penjamin}</td>

							<td class="center" style="background: #45b1ff33;">${poli_jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(poli_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${igd_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(igd_total)}</td>
							
							<td class="center" style="background: #45b1ff33;">${ranap_jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(ranap_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${ic_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(ic_total)}</td>
							
							<td class="center" style="background: #45b1ff33;">${mcu_jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(mcu_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${rad_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(rad_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${lab_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(lab_total)}</td>

							<td class="center" style="background: #45b1ff6e;">${hd_jml}</td>
							<td class="right"  style="background: #45b1ff6e;">${money_format(hd_total)}</td>
							
							<td class="right"  style="background: #45b1ff33;"><b>${money_format(total_tindakan)}</b></td>

							<td class="right">${money_format(resep)}</td>

						</tr>`;

				layanan = '';
				poli_jml = 0;
				poli_total = 0;
				igd_jml = 0;
				igd_total = 0;
				ranap_jml = 0;
				ranap_total = 0;
				ic_jml = 0;
				ic_total = 0;
				mcu_jml = 0;
				mcu_total = 0;
				rad_jml = 0;
				rad_total = 0;
				lab_jml = 0;
				lab_total = 0;
				hd_jml = 0;
				hd_total = 0;
				resep = 0;

			});
		});

		html += `<tr style="background-color: #45b1ff94;">
							<td class="right" colspan="3"><b>TOTAL SELURUH</b></td>
							<td class="center"><b>${all_poli_jml}</b></td>
							<td class="right" ><b>${money_format(all_poli_total)}</b></td>
							<td class="center"><b>${all_igd_jml}</b></td>
							<td class="right" ><b>${money_format(all_igd_total)}</b></td>
							<td class="center"><b>${all_ranap_jml}</b></td>
							<td class="right" ><b>${money_format(all_ranap_total)}</b></td>
							<td class="center"><b>${all_ic_jml}</b></td>
							<td class="right" ><b>${money_format(all_ic_total)}</b></td>
							<td class="center"><b>${all_mcu_jml}</b></td>
							<td class="right" ><b>${money_format(all_mcu_total)}</b></td>
							<td class="center"><b>${all_rad_jml}</b></td>
							<td class="right" ><b>${money_format(all_rad_total)}</b></td>
							<td class="center"><b>${all_lab_jml}</b></td>
							<td class="right" ><b>${money_format(all_lab_total)}</b></td>
							<td class="center"><b>${all_hd_jml}</b></td>
							<td class="right" ><b>${money_format(all_hd_total)}</b></td>
							<td class="right" ><b>${money_format(all_total_tindakan)}</b></td>
							<td class="right" ><b>${money_format(all_resep)}</b></td>
						</tr>`;

		html += `</tbody>
				</table>
			</div>`;
		$('#table-data-03').append(html)
	}

	function laporanKeuangan04(data) {
		$('#label-lap-04').empty();
		let periode = data.periode != '' ? `<p><b>Periode &emsp;&emsp;</b> ${data.periode}</p>` : '';
		let penjamin = data.penjamin != '' ? `<p><b>Penjamin &emsp;</b> ${data.penjamin}</p>` : '';
		let dokter = data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;</b> ${data.dokter}<p>` : '';
		let label_04 = periode + penjamin + dokter;
		$('#label-lap-04').append(label_04);

		let html = '';
		$('#table-data-04').empty()
		// $.each(data.data, function(i, v) {
		let no = 1;
		let all_jml = 1;
		let all_total = 1;
		html += `<div class="col-lg-3 table-responsive">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center" colspan="9">Laboratorium</th>
						</tr>
						<tr>
							<th class="center">No</th>	
							<th class="left">Dokter</th>	
							<th class="center">Penjamin</th>
							<th class="center">Jml<br>Kunjungan</th>
							<th class="center">Total</th>
						</tr>
					</thead>
				<tbody>`;
		no = 1;
		jml = total = all_jml = all_total = 0;
		$.each(data.data.lab, function(key_dokter, penjamin_list) {
			nama_dokter = key_dokter.replace(/_/g, ' ');
			$.each(penjamin_list, function(key_penjamin, layanan_list) {
				penjamin = key_penjamin.replace(/_/g, ' ');
				jml = layanan_list[0].jml;
				total = layanan_list[0].total == null ? 0 : layanan_list[0].total;
				all_jml += parseInt(jml);
				all_total += parseInt(total);

				html += `<tr>
							<td class="center">${no++}</td>
							<td class="left">${nama_dokter}</td>
							<td class="center">${penjamin}</td>
							<td class="center" style="background: #45b1ff33;">${jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(total)}</td>
						</tr>`;
				jml = 0;
				total = 0;
			});
		});
		html += `<tr style="background-color: #45b1ff94;">
							<td class="right" colspan="3"><b>TOTAL SELURUH</b></td>
							<td class="center"><b>${all_jml}</b></td>
							<td class="right" ><b>${money_format(all_total)}</b></td>
						</tr>`;
		html += `</tbody>
				</table>
			</div>`;


		html += `<div class="col-lg-3 table-responsive">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center" colspan="9">Radiologi</th>
						</tr>
						<tr>
							<th class="center">No</th>	
							<th class="left">Dokter</th>	
							<th class="center">Penjamin</th>
							<th class="center">Jml<br>Kunjungan</th>
							<th class="center">Total</th>
						</tr>
					</thead>
				<tbody>`;
		no = 1;
		jml = total = all_jml = all_total = 0;
		$.each(data.data.rad, function(key_dokter, penjamin_list) {
			nama_dokter = key_dokter.replace(/_/g, ' ');
			$.each(penjamin_list, function(key_penjamin, layanan_list) {
				penjamin = key_penjamin.replace(/_/g, ' ');
				jml = layanan_list[0].jml;
				total = layanan_list[0].total == null ? 0 : layanan_list[0].total;
				all_jml += parseInt(jml);
				all_total += parseInt(total);

				html += `<tr>
							<td class="center">${no++}</td>
							<td class="left">${nama_dokter}</td>
							<td class="center">${penjamin}</td>
							<td class="center" style="background: #45b1ff33;">${jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(total)}</td>
						</tr>`;
				jml = 0;
				total = 0;
			});
		});
		html += `<tr style="background-color: #45b1ff94;">
							<td class="right" colspan="3"><b>TOTAL SELURUH</b></td>
							<td class="center"><b>${all_jml}</b></td>
							<td class="right" ><b>${money_format(all_total)}</b></td>
						</tr>`;
		html += `</tbody>
				</table>
			</div>`;

		html += `<div class="col-lg-3 table-responsive">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center" colspan="9">OK</th>
						</tr>
						<tr>
							<th class="center">No</th>	
							<th class="left">Dokter</th>	
							<th class="center">Penjamin</th>
							<th class="center">Jml<br>Kunjungan</th>
							<th class="center">Total</th>
						</tr>
					</thead>
				<tbody>`;
		no = 1;
		jml = total = all_jml = all_total = 0;
		$.each(data.data.ok, function(key_dokter, penjamin_list) {
			nama_dokter = key_dokter.replace(/_/g, ' ');
			$.each(penjamin_list, function(key_penjamin, layanan_list) {
				penjamin = key_penjamin.replace(/_/g, ' ');
				jml = layanan_list[0].jml;
				total = layanan_list[0].total == null ? 0 : layanan_list[0].total;
				all_jml += parseInt(jml);
				all_total += parseInt(total);

				html += `<tr>
							<td class="center">${no++}</td>
							<td class="left">${nama_dokter}</td>
							<td class="center">${penjamin}</td>
							<td class="center" style="background: #45b1ff33;">${jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(total)}</td>
						</tr>`;
				jml = 0;
				total = 0;
			});
		});
		html += `<tr style="background-color: #45b1ff94;">
							<td class="right" colspan="3"><b>TOTAL SELURUH</b></td>
							<td class="center"><b>${all_jml}</b></td>
							<td class="right" ><b>${money_format(all_total)}</b></td>
						</tr>`;
		html += `</tbody>
				</table>
			</div>`;

		html += `<div class="col-lg-3 table-responsive">
				<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center" colspan="9">VK</th>
						</tr>
						<tr>
							<th class="center">No</th>	
							<th class="left">Dokter</th>	
							<th class="center">Penjamin</th>
							<th class="center">Jml<br>Kunjungan</th>
							<th class="center">Total</th>
						</tr>
					</thead>
				<tbody>`;
		no = 1;
		jml = total = all_jml = all_total = 0;
		$.each(data.data.vk, function(key_dokter, penjamin_list) {
			nama_dokter = key_dokter.replace(/_/g, ' ');
			$.each(penjamin_list, function(key_penjamin, layanan_list) {
				penjamin = key_penjamin.replace(/_/g, ' ');
				jml = layanan_list[0].jml;
				total = layanan_list[0].total == null ? 0 : layanan_list[0].total;
				all_jml += parseInt(jml);
				all_total += parseInt(total);

				html += `<tr>
							<td class="center">${no++}</td>
							<td class="left">${nama_dokter}</td>
							<td class="center">${penjamin}</td>
							<td class="center" style="background: #45b1ff33;">${jml}</td>
							<td class="right"  style="background: #45b1ff33;">${money_format(total)}</td>
						</tr>`;
				jml = 0;
				total = 0;
			});
		});
		html += `<tr style="background-color: #45b1ff94;">
							<td class="right" colspan="3"><b>TOTAL SELURUH</b></td>
							<td class="center"><b>${all_jml}</b></td>
							<td class="right" ><b>${money_format(all_total)}</b></td>
						</tr>`;
		html += `</tbody>
				</table>
			</div>`;

		$('#table-data-04').append(html)

	}

	function laporanKeuangan05(data) {
		$('#label-lap-05').empty();
		let periode = data.periode != '' ? `<p><b>Periode &emsp;&emsp;</b> ${data.periode}</p>` : '';
		let penjamin = data.penjamin != '' ? `<p><b>Penjamin &emsp;</b> ${data.penjamin}</p>` : '';
		let kelas_rawat = data.kelas_rawat != '' ? `<p><b>Kelas Rawat &emsp;&emsp;</b> ${data.kelas_rawat}<p>` : '';
		let jenis_rawat = data.jenis_rawat != '' ? `<p><b>Jenis Layanan &emsp;&emsp;</b> ${data.jenis_rawat}<p>` : '';
		let dokter = data.dokter != '' ? `<p><b>Dokter &emsp;&emsp;</b> ${data.dokter}<p>` : '';
		let label_05 = periode + penjamin + kelas_rawat + jenis_rawat + dokter;
		$('#label-lap-05').append(label_05);

		let html = '';
		$('#table-data-05').empty()
		
		html += `<div class="col-lg-12 table-responsive">
							<table style="overflow-x: scroll;" class="table table-hover table-striped table-sm color-table info-table">
								<thead>
									<tr>
										<th class="center">No</th>	
										<th class="center">No. RM</th>	
										<th class="left">Nama Pasien</th>	
										<th class="center">Waktu Masuk</th>
										<th class="center">Waktu Keluar</th>
										<th class="center">Lama Rawat</th>
										<th class="center">Kelas</th>
										<th class="center">Ruangan/ Bangsal</th>
										<th class="left">Dokter</th>	
										<th class="center">Penjamin</th>
									</tr>
								</thead>
							<tbody>`;
		// no = 1;
		// jml = total = all_jml = all_total = 0;
		$.each(data.data, function(i, v) {

			html += `<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.id_pasien}</td>
								<td class="left">${v.nama_pasien}</td>
								<td class="center">${v.waktu_masuk}</td>
								<td class="center">${v.waktu_keluar ?? '-'}</td>
								<td class="center">${v.total_hari}</td>
								<td class="center">${v.kelas}</td>
								<td class="center">${v.bangsal}</td>
								<td class="left">${v.nama_dokter}</td>
								<td class="center">${v.penjamin}</td>
							</tr>`;
			jml = 0;
			total = 0;

		});

		html += `</tbody>
						<tfoot style="overflow:scroll;">
							<tr>
								<td colspan="9" class="right"><b>Total Pasien: ${number_format(data.jumlah, 0, ',', '.')}</b></td>
								<td class="right"><b>Total Hari: ${number_format(data.total_hari, 0, ',', '.')}</b></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="row lap-05 m-t-10">
					<div class="col">
						<div id="pagination-05" class="float-left">
							${pagination(data.jumlah, data.limit, data.page, 1)}
						</div>
						<div id="summary-05" class="float-right text-sm">
							${page_summary(data.jumlah, data.data.length, data.limit, data.page)}
						</div>
					</div>
				</div>`;

		$('#table-data-05').append(html)

	}


	function paging(page) {
		getLaporanKeuangan(page)
	}
</script>