<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	$(function() {
		getLaporanLayananTenagaMedis(1)
		$('#btn-expand-all').click(function() {
			if ($(this).attr('aria-expanded') === 'true') {
				$('.collapse').removeClass('show');
				$(this).attr('aria-expanded', 'false');
				$(this).html('<i class="fas fa-fw fa-expand mr-1"></i>Expand All');
				$(this).toggleClass('btn-info', true);
				$(this).toggleClass('btn-danger', false);

				$('.btn-expand').attr('aria-expanded', 'false');
				$('.btn-expand').html('<i class="fas fa-fw fa-expand mr-1"></i>Expand');
				$('.btn-expand').toggleClass('btn-info', true);
				$('.btn-expand').toggleClass('btn-danger', false);
			} else {
				$('.collapse').addClass('show');
				$(this).attr('aria-expanded', 'true');
				$(this).html('<i class="fas fa-fw fa-compress mr-1"></i>Collapse All');
				$(this).toggleClass('btn-danger', true);
				$(this).toggleClass('btn-info', false);

				$('.btn-expand').attr('aria-expanded', 'true');
				$('.btn-expand').html('<i class="fas fa-fw fa-compress mr-1"></i>Collapse')
				$('.btn-expand').toggleClass('btn-danger', true);
				$('.btn-expand').toggleClass('btn-info', false);
			}
		});

		$('#btn-search').click(function() {
			$('#kasir-search').modal('show')
		})

		$('#no-rm').select2({
			placeholder: 'Cari Pasien',
			ajax: {
				url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
				var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
				return markup;
			},
			formatSelection: function(data) {
				return data.id;
			}
		});

		$('#jenis-rawat-search').on('change', function(){
			let val = $(this).val();
			if (val === '1') {
				$('.rajal').removeClass('hide');
				$('.ranap').addClass('hide');
				$('.penunjang').addClass('hide');
			} else if (val === '2') {
				$('.rajal').addClass('hide');
				$('.ranap').removeClass('hide');
				$('.penunjang').addClass('hide');
			} else if (val === '4') {
				$('.rajal').addClass('hide');
				$('.ranap').addClass('hide');
				$('.penunjang').removeClass('hide');
			} else {
				$('.rajal').addClass('hide');
				$('.ranap').addClass('hide');
				$('.penunjang').addClass('hide');
			}
		})

		$('#btn-export').click(function() {
			window.open('<?= base_url('laporan_layanan_per_pasien/export_laporan_layanan_per_pasien?') ?>' + $('#form-search-layanan-tenaga-medis').serialize());
		});

		$('#btn-reload').click(function() {
			resetForm();
			getLaporanLayananTenagaMedis(1);
		})
	})

	function paging(page) {
		getLaporanLayananTenagaMedis(page);
	}

	function getLaporanLayananTenagaMedis(page) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('laporan_layanan_per_pasien/api/laporan_layanan_per_pasien/get_list_laporan_per_pasien') ?>/page/' + page,
			data: $('#form-search-layanan-tenaga-medis').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getLaporanLayananTenagaMedis(page - 1);
					return false;
				}

				$('#jenis-periode-cb').html('Periode : ' + data.periode);
				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-lap-layanan-tenaga-medis tbody').empty();
				$('#table-lap-layanan-tenaga-medis tfoot').empty();

				$.each(data.data, function(i, v) {
					$(function() {
						$('#btn-expand-form-all' + v.id).click(function() {
							// Toggle class "active" pada ikon berdasarkan aria-expanded
							const isExpanded = $(this).attr('aria-expanded') === 'true';
							$('#expand-icon' + v.id).toggleClass('active', isExpanded);

							// Ubah teks tombol berdasarkan aria-expanded
							$(this).html(`<i class="fas fa-fw ${isExpanded ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded ? 'Expand' : 'Collapse'}`);
							$(this).toggleClass('btn-danger', !isExpanded);
							$(this).toggleClass('btn-info', isExpanded);

							if(isExpanded){
								$('.collapse-sec').removeClass('show');
								$('.btn-expand-sec').attr('aria-expanded', 'false');
								$('.btn-expand-sec').html('<i class="fas fa-fw fa-expand mr-1"></i>Expand');
								$('.btn-expand-sec').toggleClass('btn-info', true);
								$('.btn-expand-sec').toggleClass('btn-danger', false);
							}

							history.replaceState({}, document.title, window.location.pathname);
						});
					})
					let btnExpand = '<a type="button" data-toggle="collapse" href="#show' + v.id + '" class="btn btn-info btn-xs btn-expand" aria-expanded="false" id="btn-expand-form-all' + v.id + '"><i id="expand-icon' + v.id + '" class="fas fa-fw fa-expand mr-1"></i>Expand</a>';

					let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${(v.id)}</td>
							<td class="left">${(v.nama)}</td>
							<td class="center">${datefmysql(v.tanggal_daftar)}</td>
							<td class="center">${btnExpand}</td>
						</tr>
						${'<tr style="font-size: xx-small;" id="show' + v.id + '" class="collapse">'}
							<td style="font-weight:bold;" class="center"></td>
							<td style="background-color: #f9e897; font-weight:bold;" class="center">Tanggal Layanan</td>
							<td style="background-color: #f9e897; font-weight:bold;" class="left">Tenaga Medis</td>
							<td style="background-color: #f9e897; font-weight:bold;" class="center">Penjamin</td>
							<td style="background-color: #f9e897; font-weight:bold;" class="right"></td>
						</tr>
						`;

					$.each(v.tenaga_medis, function(key, val) {
						$(function() {
							$('#btn-expand-form-all' +  val.id_layanan_pendaftaran).click(function() {
								// Toggle class "active" pada ikon berdasarkan aria-expanded
								const isExpanded = $(this).attr('aria-expanded') === 'true';
								$('#expand-icon' +  val.id_layanan_pendaftaran).toggleClass('active', isExpanded);

								// Ubah teks tombol berdasarkan aria-expanded
								$(this).html(`<i class="fas fa-fw ${isExpanded ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded ? 'Expand' : 'Collapse'}`);
								$(this).toggleClass('btn-danger', !isExpanded);
								$(this).toggleClass('btn-info', isExpanded);

								history.replaceState({}, document.title, window.location.pathname);
							});
						})
						let btnExpand = '<a type="button" data-toggle="collapse" href="#show' +  val.id_layanan_pendaftaran + '" class="btn btn-info btn-xs btn-expand-sec" aria-expanded="false" id="btn-expand-form-all' +  val.id_layanan_pendaftaran + '"><i id="expand-icon' +  val.id_layanan_pendaftaran + '" class="fas fa-fw fa-expand mr-1"></i>Expand</a>';

						html += `
						${'<tr id="show' + v.id + '" class="collapse">'}
							<td colspan="1" style="background-color: white; class="center"></td>
							<td style="background-color: #fdf5d0" class="center">${datefmysql(val.tanggal_layanan)}</td>
							<td style="background-color: #fdf5d0" class="left">${val.nama}</td>
							<td style="background-color: #fdf5d0" class="center">${val.penjamin}</td>
							<td style="background-color: #fdf5d0" colspan="2" style="background-color: white; class="center">
								<div style="display: flex;justify-content: center">
									${btnExpand}
								</div>
							</td>
						</tr>`;
						html += `
						${'<tr id="show' +  val.id_layanan_pendaftaran + '" class="collapse collapse-sec">'}
								<td style="font-weight:bold;" class="right"></td>
								<td style="background-color: #ffafb6; font-weight:bold;" class="center">Unit</td>
								<td style="background-color: #ffafb6; font-weight:bold;" class="left">Layanan</td>
								<td style="background-color: #ffafb6; font-weight:bold;" class="center">Tarif Layanan</td>
								<td style="background-color: #ffafb6" class="right"></td>
						</tr>`;

						$.each(val.layanan, function(kunci, data) {
							html += `
								${'<tr id="show' +  val.id_layanan_pendaftaran + '" class="collapse collapse-sec">'}
									<td></td>
									<td style="background-color: #f5dbdd" class="center">${data.unit || '-'}</td>
									<td style="background-color: #f5dbdd" class="left">${data.nama_tindakan} <b>${parseInt(data.total_tindakan) > 1 ? `(x${data.total_tindakan})` : ''}</b></td>
									<td style="background-color: #f5dbdd" class="center">${data.tarif_layanan ? money_format(data.tarif_layanan) : data.tarif_layanan}</td>
									<td style="background-color: #f5dbdd" class="center"></td>
								</tr>`;
						})
						html += `
							${'<tr id="show' + val.id_layanan_pendaftaran + '" class="collapse collapse-sec">'}
								<td></td>
								<td style="background-color: #FFD147"></td>
								<td class="right" style="background-color: #FFD147"><b>Total tarif layanan: </b></td>
								<td class="center" style="background-color: #FFD147"><b> ${val.total_tarif_layanan ? money_format(val.total_tarif_layanan) : ''} </b></td>
								<td class="center" style="background-color: #FFD147"></td>
							</tr>`;
					});


					$('#table-lap-layanan-tenaga-medis tbody').append(html);
				})

					let html = /* html */ `
					<tr>
						<td colspan="4" class="right" style="background-color: #FFD147"><b>Total tarif layanan</b></td>
						<td class="center" style="background-color: #FFD147"><b>${number_format(data.total_tarif_layanan, 0, ',', '.')} &ensp;</b></td>
					</tr>
					`;

					$('#table-lap-layanan-tenaga-medis tfoot').append(html);

			},
			complete: function() {
				hideLoader()
				$('#kasir-search').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})

	}

	function resetForm() {
		$('#periode-laporan').val('Bulanan');
		$('#bulan').val('<?= date('m') ?>');
		$('#tahun').val('<?= date('Y') ?>');
		$('.bulanan, #tahun, #bulan').show();
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');

		$('#dokter-search, #nama_pasien').val('')
		// $('#s2id_dokter-search a .select2-chosen').html('Semua Dokter / Petugas')
		$('#s2id_nama_pasien a .select2-chosen').html('Semua Pasien')

		$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
		$('.harian').hide();
		$('#ruangan_ranap').val('');
		// $('#ruangan_ranap, .ruangan_rajal, .ruangan_ranap').hide();

		let filterLayanan = $('#jenis-layanan').val()
		$('#jenis-layanan').val(filterLayanan)

		// $('#penjamin-search-cb, #cara-bayar-search, #dokter-search, #keyword-search').val('')
		// $('#s2id_penjamin-search-cb a .select2-chosen').html('Pilih Penjamin')
	}
</script>
