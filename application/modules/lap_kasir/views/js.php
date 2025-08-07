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

	/* #table-lap-mutasi-obat {
        width: 100% !important;
    } */
</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('lap_kasir/api/lap_kasir') ?>';
	var jenisPenjamin = 0;
	var subTotal = 0;

	$(function() {
		$('.lap-01').hide();
		$('.lap-02').hide();
		$('.lap-03').hide();

		$('#jenis-laporan').change(function() {
			$('#kasir-search').modal($(this).val() !== '' ? 'show' : 'hide');

			resetForm();

			if ($('#jenis-laporan').val() == '1') {
				$('#jenis-pasien').parent().parent().show();
				$('#cara-bayar-search').parent().parent().show();
				$('#bangsal-search').parent().parent().hide();
				$('#kelas-rawat').parent().parent().hide();
				$('#diagnosa-awal').parent().parent().hide();
				$('#diagnosa-akhir').parent().parent().hide();
			} else if ($('#jenis-laporan').val() == '2') {
				$('#jenis-pasien').parent().parent().hide();
				$('#cara-bayar-search').parent().parent().hide();
				$('#bangsal-search').parent().parent().show();
				$('#diagnosa-awal').parent().parent().show();
				$('#diagnosa-akhir').parent().parent().show();
			} else if ($('#jenis-laporan').val() == '3') {
				$('#jenis-pasien').parent().parent().show();
				$('#cara-bayar-search').parent().parent().show();
				$('#bangsal-search').parent().parent().hide();
				$('#kelas-rawat').parent().parent().hide();
				$('#diagnosa-awal').parent().parent().hide();
				$('#diagnosa-akhir').parent().parent().hide();
			}
		})

		$('#jenis-layanan').change(function() {
			getLaporanKasir(1)
		})

		$('#periode-laporan').change(function() {
			if ($('#periode-laporan').val() == 'Rentang Waktu') {
				$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show();
				$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide();
			}
			if ($('#periode-laporan').val() == 'Bulanan') {
				$('.bulanan, #bulan, #tahun').show();
				$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
			}
			if ($('#periode-laporan').val() == 'Harian') {
				$('.harian, #tanggal-harian').show();
				$('.bulanan, .rentang-waktu').hide();
			}
		});

		$('#page-now').val();
		$('#kasir-search').modal('hide');
		resetForm();
		// getLaporanKasir(1);

		$('#btn-search').click(function() {
			$('#kasir-search').modal('show')
		})

		$('#btn-export').click(function() {
			if ($('#jenis-laporan').val() == '1') {
				window.open('<?= base_url('lap_kasir/export_lap_01?') ?>' + $('#form-search-kasir').serialize());
			}
			if ($('#jenis-laporan').val() == '2') {
				window.open('<?= base_url('lap_kasir/export_lap_02?') ?>' + $('#form-search-kasir').serialize());
			}
			if ($('#jenis-laporan').val() == '3') {
				window.open('<?= base_url('lap_kasir/export_lap_03?') ?>' + $('#form-search-kasir').serialize());
			}
		});

		$('#btn-reload').click(function() {
			resetForm();
			getLaporanKasir(1);
		})

		$('#btn-expand-all').click(function() {
			$('.btn-collapse').click()
		})
	});

	$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#diagnosa-awal, #diagnosa-akhir').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
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
			var kode_icdx = (data.kode_icdx_rinci !== null || data.kode_icdx_rinci !== '') ? (data.kode_icdx_rinci + ' - ') : '';

			var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/><i>' + data.nama_idn + '</i>';
			return markup;
		},
		formatSelection: function(data) {
			return data.kode_icdx_rinci + ' | ' + data.nama;
		}
	});

	$('.penjamin-group-search').hide()
	$('.metode-bayar').hide()
	$('#cara-bayar-search').change(function() {
		jenisPenjamin = $(this).val()
		$('#penjamin-search-kasir').val('')
		$('#s2id_penjamin-search-kasir a .select2-chosen').html('Pilih Penjamin')
		if ($(this).val() !== 'Tunai') {
			$('.penjamin-group-search').show()
			$('.metode-bayar').hide()
		} else {
			$('.penjamin-group-search').hide()
			$('.metode-bayar').show()
		}
	})

	$('#penjamin-search-kasir').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					jenis: jenisPenjamin,
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

	$('#nama_pasien').select2({
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
			return data.id + ' ' + data.nama;
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

	$('#jenis-pasien').change(function() {
		if ($('#jenis-pasien').val() == 'Rawat Jalan') {
			$('#ruangan_rajal, .ruangan_rajal').show();
			$('#ruangan_ranap, .ruangan_ranap').hide();
			$('#ruangan_ranap, .ruangan_ranap').val('');
			
			if ($('#jenis-laporan').val() == '1') {
				$('#shift-poli').parent().parent().show();
			} else {
				$('#shift-poli').parent().parent().hide();
				$('#shift-poli').val('');
			}
			
		} else if ($('#jenis-pasien').val() == 'Rawat Inap') {
			$('#ruangan_rajal, .ruangan_rajal').hide();
			$('#ruangan_rajal, .ruangan_rajal').val('');
			$('#ruangan_ranap, .ruangan_ranap').show();
		} else {
			$('#ruangan_rajal, .ruangan_rajal').hide();
			$('#ruangan_rajal, .ruangan_rajal').val('');
			$('#ruangan_ranap, .ruangan_ranap').hide();
			$('#ruangan_ranap, .ruangan_ranap').val('');
		}
	});

	$('#ruangan_rajal').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
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

	$('#ruangan_ranap').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/bangsal_auto') ?>",
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

	$('#tgl-search').change(function() {
		let id_pendaftaran = $('#tgl-search').val();
		$('#id_pendaftaran_search').val(id_pendaftaran);
	})

	function paging(page) {
		getLaporanKasir(page);
	}

	function getLaporanKasir(page) {
		hideLaporan();
		const urls = [
			'<?= base_url('lap_kasir/api/lap_kasir/get_list_lap_01') ?>/page/' + page + '/jenis/' + $('#jenis-layanan').val(),
			'<?= base_url('lap_kasir/api/lap_kasir/get_list_lap_02') ?>/page/' + page + '/jenis/' + $('#jenis-layanan').val(),
			'<?= base_url('lap_kasir/api/lap_kasir/get_list_lap_03') ?>/page/' + page + '/jenis/' + $('#jenis-layanan').val()
		];
		const functions = [
			lapKasir01,
			lapKasir02,
			lapKasir03,
		];
		// Asumsinya kalau jenis laporan ngurut. kalau engga tolong rubah ini 🙏
		const url = urls[parseInt($('#jenis-laporan').val()) - 1];
		const functionName = functions[parseInt($('#jenis-laporan').val()) - 1];
		
		$.ajax({
			type: 'GET',
			url: url,
			data: $('#form-search-kasir').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				functionName(data, page)
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

	function lapKasir01(data, page){
		$('#page-now').val(page)
		$('.lap-01').show()
		let shift_poli = data.shift_poli !== '' ? '<br>Shift Poli : ' + data.shift_poli : '';
		$('#jenis-periode-01').html('Periode : ' + data.periode + shift_poli);
		$('.lap-01 .pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
		$('.lap-01 .summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
		$('#table-lap-01 tbody').empty();
		// $('#table-lap-kasir tfoot').empty();

		$.each(data.data, function(i, v) {
			console.log(v);
			let status = '';
			if (v.status_billing === 'Batal') {
				status = '<h5><span class="label label-danger"><i class="fas fa-times mr-1"></i> Batal</span></h5>';
			} else {
				if (v.lunas === 'Belum') {
					status = '<em class="blinker"><i class="fas fa-spinner fa-spin"></i> Belum Lunas</em>';
				} else {
					status = '<h5><span class="label label-success"><i class="fas fa-check-circle mr-1"></i>Lunas</span></h5>';
				}
			}

			let periode = '';
			if ($('#jenis-periode-01').val() == 'Harian') {
				periode = 'Laporan Harian';
			}
			if ($('#jenis-periode-01').val() == 'Bulanan') {
				periode = 'Laporan Bulanan';
			}
			if ($('#jenis-periode-01').val() == 'Rentang Waktu') {
				periode = 'Laporan Rentang Waktu';
			}

			let keterangan = '';
			if (v.spesialist !== '') {
				let shift_poli = v.shift_poli !== ''?  v.shift_poli  : '';
				keterangan = '(' + shift_poli + ' - ' + v.spesialist + ')';
			}
			if (v.ruang_ranap !== null) {
				keterangan = '(' + v.ruang_ranap + ')';
			}
			if (v.ruang_icare !== null) {
				keterangan = '(' + v.ruang_icare + ')';
			}

			let caraBayar = v.cara_bayar;
			if (v.cara_bayar === 'Asuransi') {
				caraBayar = v.cara_bayar + ' ( ' + v.penjamin + ' )';
			}
			if (v.cara_bayar === 'Tunai') {
				caraBayar = v.cara_bayar + ( v.jenis_tunai !== null ? ' ( ' + v.jenis_tunai + ' )' : '');
			}

			let html = /* html */ `
				<tr>
					<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
					<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
					<td class="center">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '')}</td>
					<td class="center">${v.no_rm}</td>
					<td class="left">${v.nama}</td>
					<td class="center">${v.jenis_layanan} ${keterangan}</td>
					<td class="center">${caraBayar}</td>
					<td class="center">${money_format(v.total_billing)}</td>
					<td class="left">${(v.nama_dokter)}</td>
					<td class="center">${status}</td>
					<td class="center">${v.status_terlayani}</td>
					<td class="center"><button type="button" title="Klik untuk melihat Detail Laporan kasir" class="btn btn-secondary btn-xs" onclick="detailLaporanKasir(${v.id})"><i class="fas fa-fw fa-eye mr-1"></i>Detail</button></td>
				</tr>`;

			$('#table-lap-01 tbody').append(html);
		})

		// 	let html = /* html */ `
		// 	<tr>
		// 		<td colspan="8" class="right"><h6><b>Total</b></h6></td>
		// 		<td class="center"><h6><b>${number_format(data.jumlah_total, 0, ',', '.')} &ensp;</b></h6></td>
		// 	</tr>
		// `;

		// 	$('#table-lap-kasir tfoot').append(html);
	}

	function lapKasir02(data, page){
		$('#page-now').val(page)
		$('.lap-02').show()
		$('#jenis-periode-02').html('Periode : ' + data.periode);
		$('.lap-02 .pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
		$('.lap-02 .summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
		$('#table-lap-02 tbody').empty();

		$.each(data.data, function(i, v) {
			let periode = '';
			if ($('#jenis-periode-02').val() == 'Harian') {
				periode = 'Laporan Harian';
			}
			if ($('#jenis-periode-02').val() == 'Bulanan') {
				periode = 'Laporan Bulanan';
			}
			if ($('#jenis-periode-02').val() == 'Rentang Waktu') {
				periode = 'Laporan Rentang Waktu';
			}

			let html = /* html */ `
				<tr>
					<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
					<td class="center">${v.no_rm}</td>
					<td class="left">${v.nama}</td>
					<td class="left">${v.icdx_diagnosa_awal || '-'}</td>
					<td class="left">${v.icdx_diagnosa_akhir}</td>
					<td class="center">${v.lama_rawat} Hari</td>
					<td class="center">${v.bangsal}</td>
					<td class="left">${parsePostgresArray(v.tindakan_operasi)}</td>
					<td class="center">${v.kelas}</td>
					<td class="center">${money_format(v.total_billing)}</td>
				</tr>`;

			$('#table-lap-02 tbody').append(html);
		})
	}

	function lapKasir03(data, page){
		$('#page-now').val(page)
		$('.lap-03').show()
		$('#jenis-periode-03').html('Periode : ' + data.periode);
		$('.lap-03 .pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
		$('.lap-03 .summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
		$('#table-lap-03 tbody').empty();
		// $('#table-lap-kasir tfoot').empty();

		$.each(data.data, function(i, v) {
			let status = '';
			if (v.status_billing === 'Batal') {
				status = '<h5><span class="label label-danger"><i class="fas fa-times mr-1"></i> Batal</span></h5>';
			} else {
				if (v.lunas === 'Belum') {
					status = '<em class="blinker"><i class="fas fa-spinner fa-spin"></i> Belum Lunas</em>';
				} else {
					status = '<h5><span class="label label-success"><i class="fas fa-check-circle mr-1"></i>Lunas</span></h5>';
				}
			}

			let periode = '';
			if ($('#jenis-periode-03').val() == 'Harian') {
				periode = 'Laporan Harian';
			}
			if ($('#jenis-periode-03').val() == 'Bulanan') {
				periode = 'Laporan Bulanan';
			}
			if ($('#jenis-periode-03').val() == 'Rentang Waktu') {
				periode = 'Laporan Rentang Waktu';
			}

			let keterangan = '';
			if (v.spesialist !== '') {
				keterangan = '(' + v.spesialist + ')';
			}
			if (v.ruang_ranap !== null) {
				keterangan = '(' + v.ruang_ranap + ')';
			}
			if (v.ruang_icare !== null) {
				keterangan = '(' + v.ruang_icare + ')';
			}

			let caraBayar = v.cara_bayar;
			if (v.cara_bayar === 'Asuransi') {
				caraBayar = v.cara_bayar + ' ( ' + v.penjamin + ' )';
			}
			if (v.cara_bayar === 'Tunai') {
				caraBayar = v.cara_bayar + ( v.jenis_tunai !== null ? ' ( ' + v.jenis_tunai + ' )' : '');
			}

			let html = /* html */ `
				<tr>
					<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
					<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
					<td class="center">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '')}</td>
					<td class="center">${v.no_rm}</td>
					<td class="left">${v.nama}</td>
					<td class="center">${v.jenis_layanan} ${keterangan}</td>
					<td class="center">${caraBayar}</td>
					<td class="center">${money_format(v.total_billing)}</td>
					<td class="center">${money_format(v.total_obat)}</td>
					<td class="center">${money_format(v.total_tindakan)}</td>
					<td class="left">${(v.nama_dokter)}</td>
					<td class="center">${status}</td>
					<td class="center">${v.status_terlayani}</td>
					<td class="center"><button type="button" title="Klik untuk melihat Detail Laporan kasir" class="btn btn-secondary btn-xs" onclick="detailLaporanKasir(${v.id})"><i class="fas fa-fw fa-eye mr-1"></i>Detail</button></td>
				</tr>`;

			$('#table-lap-03 tbody').append(html);
		})

		// 	let html = /* html */ `
		// 	<tr>
		// 		<td colspan="8" class="right"><h6><b>Total</b></h6></td>
		// 		<td class="center"><h6><b>${number_format(data.jumlah_total, 0, ',', '.')} &ensp;</b></h6></td>
		// 	</tr>
		// `;

		// 	$('#table-lap-kasir tfoot').append(html);
	}

	function parsePostgresArray(str) {
		if (!str) return [];

		// Remove outer curly braces
		const trimmed = str.slice(1, -1);

		// Regex to handle quoted and unquoted elements
		const matches = trimmed.match(/"([^"]+)"|[^,]+/g);

		return (matches ? matches.map(s => s.replace(/^"|"$/g, '')) : []).map(s => `<b>${s}</b>`).join(' | ');
	}

	function detailLaporanKasir(id) {
		totalAll = 0;
		$('#total-billing').html(0)
		$('.billing-area').empty()
		$('#id-pendaftaran').val(id)
		$.ajax({
			type: 'GET',
			url: '<?= base_url('lap_kasir/api/lap_kasir/get_list_lap_kasir_detail') ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data !== null) {
					// data pasien
					let kelamin = '';
					let umur = '';
					let result = data.pasien;
					$('#no-rm-detail').html(result.id_pasien)
					$('#no-register-detail').html(result.no_register)
					$('#nama-detail').html(result.nama)
					$('#alamat-detail').html(result.alamat)
					if (result.kelamin == 'L') {
						kelamin = 'Laki - Laki';
					} else {
						kelamin = 'Perempuan';
					}
					$('#kelamin-detail').html(kelamin)
					if (result.tanggal_lahir !== null) {
						umur = hitungUmur(result.tanggal_lahir) + ' (' + datefmysql(result.tanggal_lahir) + ') ';
					}
					$('#umur-detail').html(umur)

					// data layanan
					$('#diagnosa-detail').html(data?.diagnosa?.map(diag => `- ${diag.nama}.<br>`)?.join(''))
					$('#tanggal-daftar-detail').html(datetimefmysql(result.tanggal_daftar))
					$('#tanggal-pulang-detail').html(result.tanggal_keluar !== null ? datetimefmysql(result.tanggal_keluar) : '-')
					$('#nama-pjwb-finansial-detail').html(result.nama_pjwb_finansial)
					$('#alamat-pjwb-finansial-detail').html(result.alamat_pjwb_finansial)
					$('#telp-pjwb-finansial-detail').html(result.telp_pjwb_finansial)

					showDataLayananPendaftaran(data.layanan)
					$('#total-billing').html(money_format(Math.ceil(totalAll)))

					$('#modal-detail-laporan-kasir').modal('show')
				} else {
					messageCustom('Tidak ada data', 'Info')
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function hideLaporan() {
		$('.lap-01').hide();
		$('.lap-02').hide();
		$('.lap-03').hide();
		$('.lap-04').hide();
		$('.lap-05').hide();
	}

	function showDataLayananPendaftaran(data) {
		let html = '';
		$.each(data, function(i, v) {
			html = /* html */ `
				<div class="list-group shadow-sm mb-3"> 
					<div class="list-group-item active" style="font-weight:500"><i class="fas fa-fw fa-stethoscope mr-1"></i>${v.jenis_layanan + ' ' + v.layanan}</div>
					<div class="list-group-item list-theme">
						<div class="row">
							<div class="col-md-6">
								<table style="border:0">
									<tr>
										<td width="30%"><strong>Cara Bayar</strong></td>
										<td width="1%">:</td>
										<td width="69%">${v.cara_bayar}</td>
									</tr>
									<tr>
										<td><strong>Penjamin</strong></td>
										<td>:</td>
										<td>${v.penjamin !== '' ? v.penjamin : '-'}</td>
									</tr>
									<tr>
										<td><strong>Reimburse</strong></td>
										<td>:</td>
										<td>${v.diskon !== null ? v.diskon + '%' : '-'}</td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<table style="border:0">
									<tr>
										<td width="30%"><strong>Waktu Masuk</strong></td>
										<td width="1%">:</td>
										<td width="69%">${datetimefmysql(v.tanggal_layanan)}</td>
									</tr>
									<tr>
										<td><strong>Dokter DPJP</strong></td>
										<td>:</td>
										<td>${v.dokter}</td>
									</tr>
									<tr>
										<td><strong>No. Polish</strong></td>
										<td>:</td>
										<td>${v.no_polish !== null ? v.no_polish : '-'}</td>
									</tr>
								</table>
							</div>
						</div>`;
			if ((v.rawat_inap !== null) && (v.rawat_inap.length > 0)) {
				html += showBiayaKamarRanap(v.id, v.rawat_inap, i)
			}
			if ((v.intensive_care !== null) && (v.intensive_care.length > 0)) {
				html += showBiayaKamarIcare(v.id, v.intensive_care, i)
			}
			if (v.pendaftaran.length > 0) {
				html += showBiayaTindakan(v.pendaftaran, 'Pendaftaran', i)
			}
			if (v.tindakan.length > 0) {
				html += showBiayaTindakan(v.tindakan, 'Tindakan', i)
			}
			// if (v.hemodialisa.length > 0) {
			// 	html += showBiayaTindakan(v.hemodialisa, 'Hemodialisa', i)
			// }
			if (v.laboratorium.length > 0) {
				html += showBiayaPenunjang(v.laboratorium, 'Laboratorium', i)
			}
			if (v.radiologi.length > 0) {
				html += showBiayaPenunjang(v.radiologi, 'Radiologi', i)
			}
			if (v.fisioterapi.length > 0) {
				html += showBiayaPenunjang(v.fisioterapi, 'Fisioterapi', i)
			}
			if (v.barang.length > 0) {
				html += showBiayaBarang(v.barang, 'Resep & BHP', i)
			}
			if (v.barang_operasi.length > 0) {
				html += showBiayaBarang(v.barang_operasi, 'BHP Operasi', i)
			}
			if (v.operasi.length > 0) {
				html += showBiayaOperasi(v.operasi, 'Operasi', i)
			}
			if (v.vk.length > 0) {
				html += showBiayaOperasi(v.vk, 'VK', i)
			}
			if (v.bank_darah.length > 0) {
				html += showBiayaTindakanBankDarah(v.bank_darah, 'Bank Darah', i)
			}
			// if (v.barang_bank_darah.length > 0) {
			// 	html += showBiayaBarangBankDarah(v.barang_bank_darah, 'Barang Bank Darah', i)
			// }
			if (v.retur_barang.length > 0) {
				html += showReturBiayaBarang(v.retur_barang, i)
			}

			// if (v.status_rawat === 'Masih Dirawat') {
			// 	// htung administrasi rawat inap
			// 	let biayaAdministrasi = Math.ceil((5 / 100) * (totalAll + subTotal))
			// 	if (biayaAdministrasi > 1500000) {
			// 		biayaAdministrasi = 1500000;
			// 	}
			// 	let administrasi = [{
			// 		'diskon': v.diskon,
			// 		'item': 'Administrasi Rawat Inap',
			// 		'operator': '',
			// 		'frekuensi': 1,
			// 		'harga_item': biayaAdministrasi,
			// 		'total': biayaAdministrasi
			// 	}]

			// 	html += showBiayaTindakan(administrasi, 'Administrasi Rawat Inap', i)
			// }

			if (v.status_rawat_icare === 'Masih Dirawat') {
				// htung administrasi rawat icare
				let biayaAdministrasi = Math.ceil((5 / 100) * (totalAll + subTotal))
				if (biayaAdministrasi > 1500000) {
					biayaAdministrasi = 1500000;
				}
				let administrasi = [{
					'diskon': v.diskon,
					'item': 'Administrasi Intensive Care',
					'operator': '',
					'frekuensi': 1,
					'harga_item': biayaAdministrasi,
					'total': biayaAdministrasi
				}]

				// html += showBiayaTindakan(administrasi, 'Administrasi Intensive Care', i)
			}

			html += /* html */ `
					</div>
					<div class="list-group-item list-theme bg-light">
						<span class="d-flex justify-content-end text-red" style="font-size:16px;font-weight:600">Sub Total : ${money_format(subTotal)}</span>
					</div>
				</div>
			`;
			$('.billing-area').append(html)
			totalAll += subTotal;
			subTotal = 0;
		})
	}

	function showBiayaTindakan(data, label, urutan) {
		let total = 0;
		let totalTagihan = 0;
		let labelDefault = label;
		let namaKelas = label.split(' ');
		let kelas = namaKelas[0];
		let komponen = '';
		let html = /* html */ `
			<div class="row mt-3 mb-1">
				<div class="col-md-12"><span class="text-red v-center"><i class="fas fa-fw fa-info-circle mr-1"></i>${label}</span></div>
			</div>
			<table class="table table-sm table-striped table-hover color-table info-table">
				<thead>
					<tr>
						<th width="5%" class="center">No.</th>
						<th width="30%" class="left">Item</th>
						<th width="20%" class="left">Operator</th>
						<th width="10%" class="center">Komponen</th>
						<th width="5%" class="center">Jml</th>
						<th width="15%" class="right">Harga</th>
						<th width="15%" class="right">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr data-toggle="collapse" data-target=".${kelas + urutan}">
						<td colspan="7" style="cursor:pointer">
							<button type="button" class="btn btn-info btn-xs btn-collapse ml-1"><i class="fas fa-fw fa-expand mr-1"></i>Expand ${labelDefault}</button>
						</td>
					</tr>`;
		$.each(data, function(i, v) {
			total += parseFloat(v.total)
			totalTagihan += parseFloat(v.tagihan)
			html += /* html */ `
				<tr class="collapse ${kelas + urutan}">
					<td class="center">${(i + 1)}</td>
					<td>${v.item}</td>
					<td>${v.operator}</td>
					<td class="center">${komponen}</td>
					<td class="center">${v.frekuensi}</td>
					<td class="right">${money_format(v.harga_item)}</td>
					<td class="right">${money_format(v.total)}</td>
				</tr>
			`;
		})

		subTotal += parseFloat(total)
		html += /* html */ `
				<tr>
					<td colspan="6"></td><td class="right text-red bold" style="font-size:14px">${money_format(total)}</td>
				</tr>
		`;
		html += /* html */ `
				</tbody>
			</table>
		`;

		return html;
	}

	function showBiayaBarang(data, label, urutan) {
		let totalPenunjang = 0;
		let labelDefault = label;
		let namaKelas = label.split(' ');
		let kelas = namaKelas[0];
		let title = '';
		let html = /* html */ `
			<div class="row mt-3">
				<div class="col-md-12"><span class="text-red v-center"><i class="fas fa-fw fa-info-circle mr-1"></i>${label}</span></div>
			</div>
		`;
		$.each(data, function(i, v) {
			if (v.id_resep !== null) {
				title = 'Resep ' + v.id_resep;
			} else if (v.id_operasi !== null) {
				title = 'BHP Operasi';
			} else {
				title = 'BHP';
			}
			html += /* html */ `
				<div class="row mb-1">
					<div class="col-md-12 d-flex justify-content-end"><span><strong>Waktu Order :</strong><span class="ml-1">${((v.waktu_konfirm !== null ? datetimefmysql(v.waktu_konfirm) : '-'))}</span></span></div>
				</div>
				<table class="table table-sm table-striped table-hover color-table info-table">
					<thead>
						<tr><td colspan="5" class="bold center">${title}</td></tr>
						<tr>
							<th width="5%" class="center">No.</th>
							<th width="60%" class="left">Item</th>
							<th width="5%" class="center">Jml</th>
							<th width="15%" class="right">Harga</th>
							<th width="15%" class="right">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr data-toggle="collapse" data-target=".${kelas + urutan}">
							<td colspan="5" style="cursor:pointer">
								<button type="button" class="btn btn-info btn-xs btn-collapse ml-1"><i class="fas fa-fw fa-expand mr-1"></i>Expand ${labelDefault}</button>
							</td>
						</tr>`;
			totalPenunjang = 0;
			let jml = 1;
			let hargaItem = 0;
			let operator = '';
			$.each(v.detail, function(j, x) {
				totalPenunjang += parseFloat(x.total)
				if (typeof x.qty !== 'undefined') {
					jml = x.qty;
				}
				hargaItem = x.total;
				if (typeof x.harga_jual !== 'undefined') {
					hargaItem = x.harga_jual
				}
				if (typeof x.operator !== 'undefined') {
					operator = x.operator;
				}
				html += /* html */ `
					<tr class="collapse ${kelas + urutan}">
						<td class="center">${(j + 1)}</td>
						<td>${x.item + ((v.operator !== '') ? ', ' : '') + operator}</td>
						<td class="center">${jml}</td>
						<td class="right">${money_format(hargaItem)}</td>
						<td class="right">${money_format(x.total)}</td>
					</tr>
				`;
			})

			subTotal += totalPenunjang;
			html += /* html */ `
					<tr>
						<td colspan="4"></td><td class="right text-red bold" style="font-size:14px">${money_format(totalPenunjang)}</td>
					</tr>
			`;
			html += /* html */ `
					</tbody>
				</table>
			`;

		})

		return html;
	}

	function showBiayaKamarRanap(id_layanan_pendaftaran, data, urutan) {
		let total = 0;
		let totalTagihan = 0;
		let nominal = 0;
		let html = /* html */ `
			<div class="row mt-3 mb-1">
				<div class="col-md-6"><span class="text-red v-center"><i class="fas fa-fw fa-info-circle mr-1"></i>Akomodasi Kamar</span></div>
				<div class="col-md-6 d-flex justify-content-end"><button type="button" class="btn btn-secondary btn-xs"><i class="fas fa-fw fa-edit mr-1"></i>Edit Akomodasi Kamar</button></div>
			</div>
			<table class="table table-sm table-striped table-hover color-table info-table">
				<thead>
					<tr>
						<th width="5%" class="center">No.</th>
						<th width="57%" class="left">Bed</th>
						<th width="10%" class="center">Status Rawat</th>
						<th width="8%" class="center">Durasi</th>
						<th width="10%" class="right">Harga</th>
						<th width="10%" class="right">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr data-toggle="collapse" data-target=".kamar${urutan}">
						<td colspan="6" style="cursor:pointer">
							<button type="button" class="btn btn-info btn-xs btn-collapse ml-1"><i class="fas fa-fw fa-expand mr-1"></i>Expand Biaya Kamar</button>
						</td>
					</tr>`;
		$.each(data, function(i, v) {
			total += parseFloat(v.total)
			totalTagihan += parseFloat(v.total) - parseFloat(v.reimburse)
			html += /* html */ `
				<tr class="collapse kamar${urutan}">
					<td class="center">${(i + 1)}</td>
					<td>${v.bangsal + ' (' + datetimefmysql(v.tanggal_masuk) + ' - ' + ((v.tanggal_keluar !== null ? datetimefmysql(v.tanggal_keluar) : 'Sekarang')) + ') '}</td>
					<td class="center">${v.status_rawat}</td>
					<td class="center">${v.durasi + ' Hari'}</td>
					<td class="right">${money_format(v.nominal)}</td>
					<td class="right">${money_format(v.total)}</td>
				</tr>
			`;

			nominal = v.nominal;
		})

		subTotal += parseFloat(total)
		$('#total').val(money_format(nominal))

		html += /* html */ `
				<tr>
					<td colspan="5"></td><td class="right text-red bold" style="font-size:14px">${money_format(total)}</td>
				</tr>
		`;
		html += /* html */ `
				</tbody>
			</table>
		`;

		return html;
	}

	function showBiayaPenunjang(data, label, urutan) {
		let totalPenunjang = 0;
		let labelDefault = label;
		let namaKelas = label.split(' ');
		let kelas = namaKelas[0];
		let html = /* html */ `
			<div class="row mt-3">
				<div class="col-md-12"><span class="text-red v-center"><i class="fas fa-fw fa-info-circle mr-1"></i>${label}</span></div>
			</div>
		`;
		$.each(data, function(i, v) {
			html += /* html */ `
				<div class="row mb-1">
					<div class="col-md-12 d-flex justify-content-end"><span><strong>Waktu Order :</strong><span class="ml-1">${((v.waktu_konfirm !== null ? datetimefmysql(v.waktu_konfirm) : '-'))}</span></span></div>
				</div>
				<table class="table table-sm table-striped table-hover color-table info-table">
					<thead>
						<tr>
							<th width="5%" class="center">No.</th>
							<th width="30%" class="left">Item</th>
							<th width="30%" class="left">Operator</th>
							<th width="5%" class="center">Jml</th>
							<th width="15%" class="right">Harga</th>
							<th width="15%" class="right">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr data-toggle="collapse" data-target=".${kelas + urutan}">
							<td colspan="6" style="cursor:pointer">
								<button type="button" class="btn btn-info btn-xs btn-collapse ml-1"><i class="fas fa-fw fa-expand mr-1"></i>Expand ${labelDefault}</button>
							</td>
						</tr>`;
			totalPenunjang = 0;
			let jml = 1;
			let hargaItem = 0;
			let operator = '';
			let dokter = v.dokter;
			$.each(v.detail, function(j, x) {
				totalPenunjang += parseFloat(x.total)
				if (label === 'Radiologi') {
					dokter = x.dokter;
				}
				html += /* html */ `
					<tr class="collapse ${kelas + urutan}">
						<td class="center">${(j + 1)}</td>
						<td>${x.item}</td>
						<td>${dokter}</td>
						<td class="center">${jml}</td>
						<td class="right">${money_format(x.total)}</td>
						<td class="right">${money_format(x.total)}</td>
					</tr>
				`;
			})

			subTotal += totalPenunjang;
			html += /* html */ `
					<tr>
						<td colspan="5"></td><td class="right text-red bold" style="font-size:14px">${money_format(totalPenunjang)}</td>
					</tr>
			`;
			html += /* html */ `
					</tbody>
				</table>
			`;

		})

		return html;
	}

	function showBiayaKamarIcare(id_layanan_pendaftaran, data, urutan) {
		let total = 0;
		let totalTagihan = 0;
		let nominal = 0;
		let html = /* html */ `
			<div class="row mt-3 mb-1">
				<div class="col-md-6"><span class="text-red v-center"><i class="fas fa-fw fa-info-circle mr-1"></i>Akomodasi Kamar</span></div>
				<div class="col-md-6 d-flex justify-content-end"><button type="button" class="btn btn-secondary btn-xs"><i class="fas fa-fw fa-edit mr-1"></i>Edit Akomodasi Kamar</button></div>
			</div>
			<table class="table table-sm table-striped table-hover color-table info-table">
				<thead>
					<tr>
						<th width="5%" class="center">No.</th>
						<th width="57%" class="left">Bed</th>
						<th width="10%" class="center">Status Rawat</th>
						<th width="8%" class="center">Durasi</th>
						<th width="10%" class="right">Harga</th>
						<th width="10%" class="right">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr data-toggle="collapse" data-target=".kamar${urutan}">
						<td colspan="6" style="cursor:pointer">
							<button type="button" class="btn btn-info btn-xs btn-collapse ml-1"><i class="fas fa-fw fa-expand mr-1"></i>Expand Biaya Kamar</button>
						</td>
					</tr>`;
		$.each(data, function(i, v) {
			total += parseFloat(v.total)
			totalTagihan += parseFloat(v.total) - parseFloat(v.reimburse)
			html += /* html */ `
				<tr class="collapse kamar${urutan}">
					<td class="center">${(i + 1)}</td>
					<td>${v.bangsal + ' (' + datetimefmysql(v.tanggal_masuk) + ' - ' + ((v.tanggal_keluar !== null ? datetimefmysql(v.tanggal_keluar) : 'Sekarang')) + ') '}</td>
					<td class="center">${v.status_rawat}</td>
					<td class="center">${v.durasi + ' Hari'}</td>
					<td class="right">${money_format(v.nominal)}</td>
					<td class="right">${money_format(v.total)}</td>
				</tr>
			`;

			nominal = v.nominal;
		})

		subTotal += parseFloat(total)
		$('#total').val(money_format(nominal))

		html += /* html */ `
				<tr>
					<td colspan="5"></td><td class="right text-red bold" style="font-size:14px">${money_format(total)}</td>
				</tr>
		`;
		html += /* html */ `
				</tbody>
			</table>
		`;

		return html;
	}

	function showBiayaOperasi(data, label, urutan) {
		let total = 0;
		let totalTagihan = 0;
		let labelDefault = label;
		let namaKelas = label.split(' ');
		let kelas = namaKelas[0];
		let komponen = '';
		let html = /* html */ `
			<div class="row mt-3 mb-1">
				<div class="col-md-12"><span class="text-red v-center"><i class="fas fa-fw fa-info-circle mr-1"></i>${label}</span></div>
			</div>
			<table class="table table-sm table-striped table-hover color-table info-table">
				<thead>
					<tr>
						<th width="5%" class="center">No.</th>
						<th width="30%" class="left">Item</th>
						<th width="30%" class="left">Operator</th>
						<th width="5%" class="center">Jml</th>
						<th width="15%" class="right">Harga</th>
						<th width="15%" class="right">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr data-toggle="collapse" data-target=".${kelas + urutan}">
						<td colspan="6" style="cursor:pointer">
							<button type="button" class="btn btn-info btn-xs btn-collapse ml-1"><i class="fas fa-fw fa-expand mr-1"></i>Expand ${labelDefault}</button>
						</td>
					</tr>`;
		$.each(data, function(i, v) {
			total += parseFloat(v.total)
			totalTagihan += parseFloat(v.tagihan)

			komponen = '';

			html += /* html */ `
				<tr class="collapse ${kelas + urutan}">
					<td class="center">${(i + 1)}</td>
					<td>${v.item}</td>
					<td>`;
			if (v.operator_list.length > 0) {
				html += /* html */ `<b style="font-weight:bold">Operator</b>`;
				$.each(v.operator_list, function(j, x) {
					html += /* html */ `<li>${x.operator}</li>`;
				})
			}
			if (v.anesthesi_list.length > 0) {
				html += /* html */ `<b style="font-weight:bold">Anesthesi</b>`;
				$.each(v.anesthesi_list, function(j, x) {
					html += /* html */ `<li>${x.operator}</li>`;
				})
			}
			if ((v.operator_list.length) === 0 && (v.anesthesi_list.length) === 0) {
				html += v.operator;
			}
			html += /* html */ `
					</td>
					<td class="center">${v.frekuensi}</td>
					<td class="right">${money_format(v.harga_item)}</td>
					<td class="right">${money_format(v.total)}</td>
				</tr>
			`;
		})

		subTotal += parseFloat(total)
		html += /* html */ `
				<tr>
					<td colspan="5"></td><td class="right text-red bold" style="font-size:14px">${money_format(total)}</td>
				</tr>
		`;
		html += /* html */ `
				</tbody>
			</table>
		`;

		return html;
	}

	function showBiayaTindakanBankDarah(data, label, urutan) {
		let total = 0;
		let totalTagihan = 0;
		let labelDefault = label;
		let namaKelas = label.split(' ');
		let kelas = namaKelas[0];
		let komponen = '';
		let html = /* html */ `
			<div class="row mt-3 mb-1">
				<div class="col-md-12"><span class="text-red v-center"><i class="fas fa-fw fa-info-circle mr-1"></i>${label}</span></div>
			</div>
			<table class="table table-sm table-striped table-hover color-table info-table">
				<thead>
					<tr>
						<th width="5%" class="center">No.</th>
						<th width="30%" class="left">Item</th>
						<th width="20%" class="left">Operator</th>
						<th width="10%" class="center">Komponen</th>
						<th width="5%" class="center">Jml</th>
						<th width="15%" class="right">Harga</th>
						<th width="15%" class="right">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr data-toggle="collapse" data-target=".${kelas + urutan}">
						<td colspan="7" style="cursor:pointer">
							<button type="button" class="btn btn-info btn-xs btn-collapse ml-1"><i class="fas fa-fw fa-expand mr-1"></i>Expand ${labelDefault}</button>
						</td>
					</tr>`;
		$.each(data, function(i, v) {
			total += parseFloat(v.total)
			totalTagihan += parseFloat(v.tagihan)
			html += /* html */ `
				<tr class="collapse ${kelas + urutan}">
					<td class="center">${(i + 1)}</td>
					<td>${v.item}</td>
					<td>${v.operator}</td>
					<td class="center">${komponen}</td>
					<td class="center">${v.frekuensi}</td>
					<td class="right">${money_format(v.harga_item)}</td>
					<td class="right">${money_format(v.total)}</td>
				</tr>
			`;
		})

		subTotal += parseFloat(total)
		html += /* html */ `
				<tr>
					<td colspan="6"></td><td class="right text-red bold" style="font-size:14px">${money_format(total)}</td>
				</tr>
		`;
		html += /* html */ `
				</tbody>
			</table>
		`;

		return html;
	}

	function showReturBiayaBarang(data, urutan) {
		let totalPenunjang = 0;
		let title = '';
		let html = /* html */ `
			<div class="row mt-3">
				<div class="col-md-12"><span class="text-red v-center"><i class="fas fa-fw fa-info-circle mr-1"></i>Retur Barang</span></div>
			</div>
		`;
		$.each(data, function(i, v) {
			if (v.id_resep !== null) {
				title = '';
			} else if (v.id_operasi !== null) {
				title = 'BHP Operasi';
			} else {
				title = 'BHP';
			}
			html += /* html */ `
				<div class="row mb-1">
					<div class="col-md-12 d-flex justify-content-end"><span><strong>Waktu Retur :</strong><span class="ml-1">${((v.waktu !== null ? datetimefmysql(v.waktu) : '-'))}</span></span></div>
				</div>
				<table class="table table-sm table-striped table-hover color-table info-table">
					<thead>
						<tr><td colspan="5" class="bold center">${title}</td></tr>
						<tr>
							<th width="5%" class="center">No.</th>
							<th width="60%" class="left">Item</th>
							<th width="5%" class="center">Jml</th>
							<th width="15%" class="right">Harga</th>
							<th width="15%" class="right">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr data-toggle="collapse" data-target=".retur${urutan}">
							<td colspan="5" style="cursor:pointer">
								<button type="button" class="btn btn-info btn-xs btn-collapse ml-1"><i class="fas fa-fw fa-expand mr-1"></i>Expand Retur Barang</button>
							</td>
						</tr>`;
			totalPenunjang = 0;
			let jml = 1;
			let hargaItem = 0;
			let operator = '';
			$.each(v.detail, function(j, x) {
				totalPenunjang += parseFloat(x.total)
				if (typeof x.qty !== 'undefined') {
					jml = x.qty;
				}
				hargaItem = x.total;
				if (typeof x.harga_jual !== 'undefined') {
					hargaItem = x.harga_jual
				}
				if (typeof x.operator !== 'undefined') {
					operator = x.operator;
				}
				html += /* html */ `
					<tr class="collapse retur${urutan}">
						<td class="center">${(j + 1)}</td>
						<td>${x.item + ((v.operator !== '') ? ', ' : '') + operator}</td>
						<td class="center">${jml}</td>
						<td class="right">${money_format(hargaItem)}</td>
						<td class="right">${money_format(x.total)}</td>
					</tr>
				`;
			})

			subTotal += -(totalPenunjang);
			html += /* html */ `
					<tr>
						<td colspan="4"></td><td class="right text-red bold" style="font-size:14px">${money_format(totalPenunjang)}</td>
					</tr>
			`;
			html += /* html */ `
					</tbody>
				</table>
			`;

		})

		return html;
	}

	function resetForm() {
		$('#periode-laporan').val('Rentang Waktu');
		$('#bulan').val('<?= date('m') ?>');
		$('#tahun').val('<?= date('Y') ?>');
		$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show();
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');

		$('#dokter-search, #nama_pasien, #diagnosa-awal, #diagnosa-akhir').val('')
		$('#s2id_dokter-search a .select2-chosen').html('Semua Dokter / Petugas')
		$('#s2id_nama_pasien a .select2-chosen').html('Semua Pasien')
		$('#s2id_diagnosa-awal a .select2-chosen').html('Pilih Diagnosa Awal')
		$('#s2id_diagnosa-akhir a .select2-chosen').html('Pilih Diagnosa Akhir')

		$('.harian, .bulanan, #tahun, #bulan').hide();
		$('#ruangan_rajal, #ruangan_ranap').val('');
		$('#ruangan_rajal, #ruangan_ranap, .ruangan_rajal, .ruangan_ranap').hide();

		let filterLayanan = $('#jenis-layanan').val()
		$('#jenis-layanan').val(filterLayanan)

		$('#penjamin-search-kasir, #cara-bayar-search, #dokter-search, #keyword-search, #bangsal-search, #kelas-rawat').val('')
		$('#s2id_penjamin-search-kasir a .select2-chosen').html('Pilih Penjamin')
	}
</script>