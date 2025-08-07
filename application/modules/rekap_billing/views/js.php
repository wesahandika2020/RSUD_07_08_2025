<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var totalBilling = 0;
	var totalAll = 0;
	var subTotal = 0;
	var jenisPenjamin = 0;

	$(function() {
		getListRekapBilling(1)
		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})
		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})
		$('#btn-reload').click(function() {
			reloadData()
			getListRekapBilling(1)
		})
		$('#jenis-layanan').change(function() {
			getListRekapBilling(1)
		})
		$('#keyword-search').keyup(debounce(function() {
			if ($('#keyword-search').val() !== '') {
				$('#tanggal-awal').val('')
				getListRekapBilling(1)
			} else {
				$('#tanggal-awal').val('<?= date('d/m/Y') ?>')
				getListRekapBilling(1)
			}
		}, 500));
		$('.penjamin-group-search').hide()
		$('#cara-bayar-search').change(function() {
			jenisPenjamin = $(this).val()
			$('#penjamin-search').val('')
			$('#s2id_penjamin-search a .select2-chosen').html('Pilih Penjamin')
			if ($(this).val() !== 'Tunai') {
				$('.penjamin-group-search').show()
			} else {
				$('.penjamin-group-search').hide()
			}
		})
		$('#penjamin-search').select2({
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
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		})
		$('#btn-expand-all').click(function() {
			$('.btn-collapse').click()
		})
	})

	function reloadData() {
		let filterLayanan = $('#jenis-layanan').val()
		$('#jenis-layanan').val(filterLayanan)
		$('#id, .form-control').val('')
		$('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
		$('#penjamin-search, #cara-bayar-search, #dokter-search, #keyword-search').val('')
		$('#s2id_penjamin-search a .select2-chosen').html('Pilih Penjamin')
		$('#s2id_dokter-search a .select2-chosen').html('Pilih Dokter DPJP')
		$('.penjamin-group-search').hide()
		// syams_validation_remove('.form-control')
		// syams_validation_remove('.select2-input')
	}

	function getListRekapBilling(page) {
		getStatusCco(1);
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url('keuangan/api/keuangan/get_list_rekap_billing') ?>/page/' + page + '/jenis/' + $('#jenis-layanan').val(),
			data: $('#form-search').serialize() + '&keyword=' + $('#keyword-search').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListRekapBilling(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-data tbody').empty();

				$.each(data.data, function(i, v) {
					let status = '';
					if (v.status_billing === 'Batal') {
						status = '<h5><span class="label label-danger"><i class="fas fa-times mr-1"></i> Batal</span></h5>';
					} else {
						if (v.lunas === 'Belum') {
							// belum lunas
							if (parseInt(v.diskon_asuransi) === 100) {
								status = '<em class="blinker"> Cetak Rincian Biaya</em>';
							} else {
								status = '<em class="blinker"><i class="fas fa-spinner fa-spin"></i> Belum Lunas</em>';
							}
						} else {
							status = '<h5><span class="label label-success"><i class="fas fa-check-circle mr-1"></i>Lunas</span></h5>';
						}
					}

					let spesialisasi = '';
					if (v.spesialisasi !== '') {
						spesialisasi = '(' + v.spesialisasi + ')';
					}

					if (v.status_terlayani === 'Belum') {
						status_terlayani = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
					} else if (v.status_terlayani === 'Batal') {
						status_terlayani = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
					} else {
						status_terlayani = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
					}

					cekCCO = '';
					if (v.cek_cco == 'cco sementara') {
						if ((v.waktu_cetak_billing < v.tanggal_batal_keluar) && (v.is_have_cco_it == '1')) {
							detail = `<table>
									<tr><td>Cetak Billing &nbsp;</td>      <td> : ` + (v.waktu_cetak_billing !== '' ? v.waktu_cetak_billing : '-') + `</td></tr>
									<tr><td>Tanggal CCO &nbsp;</td>     <td> : ` + (v.tanggal_batal_keluar !== null ? v.tanggal_batal_keluar : '-') + ` </td></tr>
									<tr><td colspan='2'><i style='color:red;'><b>- Harap dilakukan cetak billing kembali</b></i></td></tr>
									<tr><td colspan='2'><i style='color:red;'><b>  Jika terjadi perubahan biaya - </b></i></td></tr>
									</table>`;
							cekCCO = '<button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="left" data-title="Cek Cancel Check Out (CCO)" data-content="' + detail + '"><em class="blinker"><i class="fas fa-bell" style="color:red"></i></em> </button>';
						} else {
							cekCCO = '';
						}
					}

					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${v.no_register}</td>
							<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
							<td class="center">${v.id_pasien}</td>
							<td>${v.nama}</td>
							<td>${v.jenis_layanan} ${spesialisasi}</td>
							<td class="center">${status_terlayani}</td>
							<td class="center">${v.cara_bayar + (v.cara_bayar === 'Asuransi' ? ' ( ' + v.penjamin + ' )' : '')}</td>
							<td class="right">${money_format(v.tagihan)}</td>
							<td class="center">${status}</td>
							<td class="right aksi">
								${cekCCO} <button type="button" title="Klik untuk melihat Detail Billing Pasien" class="btn btn-secondary btn-xs" onclick="detailBilling(${v.id})"><i class="fas fa-fw fa-eye mr-1"></i>Detail</button>
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html);
				})

				$('.mypopover').popover({
					html: true,
					trigger: 'hover',
					sanitize: false,
				});
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function paging(page) {
		getListRekapBilling(page)
	}

	function detailBilling(id) {
		totalAll = 0;
		$('#total-billing').html(0)
		$('.billing-area').empty()
		$('#id-pendaftaran').val(id)
		$.ajax({
			type: 'GET',
			url: '<?= base_url('keuangan/api/keuangan/get_rekap_billing_detail') ?>/id/' + id,
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

					if(result.penjamin == 'BPJS'){ 
						$('#set-nosep').show()
						if(result.no_sep  !== null){
							btn_sep = result.no_sep + '<button type="button" title="Klik untuk cetak SEP" class="btn btn-secondary btn-xs waves-effect waves-light nowrap ml-2" onclick="cetakNotaSEP(\'' + result.no_sep+ '\')"><i class="fas fa-print m-r-5"></i> Cetak</button>';
						} else {
							btn_sep = '<b style="color: red;">NO SEP TIDAK ADA</b>';
						}
					} else {
						$('#set-nosep').hide()	
						btn_sep = '';
					}
					$('#nosep').html(btn_sep)
					
					// data layanan
					$('#diagnosa-detail').html(data?.diagnosa?.map(diag => `- ${diag.nama}.<br>`)?.join(''))
					$('#tanggal-daftar-detail').html(datetimefmysql(result.tanggal_daftar))
					$('#tanggal-pulang-detail').html(result.tanggal_keluar !== null ? datetimefmysql(result.tanggal_keluar) : '-')
					$('#nama-pjwb-finansial-detail').html(result.nama_pjwb_finansial)
					$('#alamat-pjwb-finansial-detail').html(result.alamat_pjwb_finansial)
					$('#telp-pjwb-finansial-detail').html(result.telp_pjwb_finansial)

					showDataLayananPendaftaran(data.layanan)
					$('#total-billing').html(money_format(Math.ceil(totalAll)))

					$('#modal-detail-rekap-billing').modal('show')
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
			if (v.pkrt.length > 0) {
				html += showBiayaPKRT(v.pkrt, 'PKRT', i)
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

	function showBiayaPKRT(data, label, urutan) {
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
					<th width="35%" class="left" colspan="2">Item</th>
					<th width="25%" class="center">waktu</th>
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
				<td colspan="2">${v.item}</td>
				<td class="center">${v.waktu}</td>
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

	// function showBiayaBarangBankDarah(data, label, urutan) {
	// 	let totalPenunjang = 0;
	// 	let labelDefault = label;
	// 	let namaKelas = label.split(' ');
	// 	let kelas = namaKelas[0];
	// 	let title = '';
	// 	let html = /* html */ `
	// 		<div class="row mt-3">
	// 			<div class="col-md-12"><span class="text-red v-center"><i class="fas fa-fw fa-info-circle mr-1"></i>${label}</span></div>
	// 		</div>
	// 	`;
	// 	$.each(data, function(i, v) {
	// 		title = 'Barang Bank Darah';
	// 		html += /* html */ `
	// 			<div class="row mb-1">
	// 				<div class="col-md-12 d-flex justify-content-end"><span><strong>Waktu Order :</strong><span class="ml-1">${((v.waktu_konfirm !== null ? datetimefmysql(v.waktu_konfirm) : '-'))}</span></span></div>
	// 			</div>
	// 			<table class="table table-sm table-striped table-hover color-table info-table">
	// 				<thead>
	// 					<tr><td colspan="5" class="bold center">${title}</td></tr>
	// 					<tr>
	// 						<th width="5%" class="center">No.</th>
	// 						<th width="60%" class="left">Item</th>
	// 						<th width="5%" class="center">Jml</th>
	// 						<th width="15%" class="right">Harga</th>
	// 						<th width="15%" class="right">Total</th>
	// 					</tr>
	// 				</thead>
	// 				<tbody>
	// 					<tr data-toggle="collapse" data-target=".${kelas + urutan}">
	// 						<td colspan="5" style="cursor:pointer">
	// 							<button type="button" class="btn btn-info btn-xs btn-collapse ml-1"><i class="fas fa-fw fa-expand mr-1"></i>Expand ${labelDefault}</button>
	// 						</td>
	// 					</tr>`;
	// 		totalPenunjang = 0;
	// 		let jml = 1;
	// 		let hargaItem = 0;
	// 		let operator = '';
	// 		$.each(v.detail, function(j, x) {
	// 			totalPenunjang += parseFloat(x.total)
	// 			if (typeof x.qty !== 'undefined') {
	// 				jml = x.qty;
	// 			}
	// 			hargaItem = x.total;
	// 			if (typeof x.harga_jual !== 'undefined') {
	// 				hargaItem = x.harga_jual
	// 			}
	// 			if (typeof x.operator !== 'undefined') {
	// 				operator = x.operator;
	// 			}
	// 			html += /* html */ `
	// 				<tr class="collapse ${kelas + urutan}">
	// 					<td class="center">${(j + 1)}</td>
	// 					<td>${x.item + ((v.operator !== '') ? ', ' : '') + operator}</td>
	// 					<td class="center">${jml}</td>
	// 					<td class="right">${money_format(hargaItem)}</td>
	// 					<td class="right">${money_format(x.total)}</td>
	// 				</tr>
	// 			`;
	// 		})

	// 		subTotal += totalPenunjang;
	// 		html += /* html */ `
	// 				<tr>
	// 					<td colspan="4"></td><td class="right text-red bold" style="font-size:14px">${money_format(totalPenunjang)}</td>
	// 				</tr>
	// 		`;
	// 		html += /* html */ `
	// 				</tbody>
	// 			</table>
	// 		`;

	// 	})

	// 	return html;
	// }

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

	function cetakRincianBilling(id_layanan_pendaftaran) {
		let id_pendaftaran = $('#id-pendaftaran').val()
		window.open('<?= base_url() ?>rekap_billing/printing_rincian_billing/' + id_pendaftaran + '/print/' + id_layanan_pendaftaran, 'Cetak Rincian Billing', 'width=' + dWidth + ' height=' + dHeight + ', left=' + x + ',top=' + y)
	}

	function debounce(func, timeout) {
		let timer;
		return (...args) => {
			clearTimeout(timer);
			timer = setTimeout(() => {
				func.apply(this, args);
			}, timeout);
		};
	}

	function getListStatusCco() {
		$('#modal-list-status-cco').modal('show');
	}

	function getStatusCco(p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekap_billing/api/rekap_billing/get_status_cco/page/') ?>' + p,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				$('#status-cco').empty();
				if (data.jumlah >= 1) {
					title_notif = `<table>
									<tr><td><h4><i style='color:red;'><b>- Klik untuk melihat -</b></i></h4></td></tr>
									<tr><td><h4><i style='color:red;'><b>Harap lakukan cetak billing kembali</b></i></h4></td></tr>
									<tr><td><h4><i style='color:red;'><b>Total pasien : ` + data.jumlah + `</b></i></h4></td></tr>
									</table>`;
					cekCCO = '<a onclick="getListStatusCco()" class="mr-3 mypopover" data-container="body" data-toggle="popover" data-placement="top" data-content="' + title_notif + '"><em class="blinker"><i class="fas fa-bell" style="color:red; font-size: xx-large; cursor: pointer;"></i></em></a>';
					$('#status-cco').append(cekCCO);
				}

				$('#pagination-status-cco').html(pagination2(data.jumlah, data.limit, data.page, 1));
				$('#summary-status-cco').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-listcco tbody').empty();
				$.each(data.data, function(i, v) {
					btnHapus = '<button hidden type="button" class="btn btn-danger  btn-xxs mr-2" onclick="setStatusCco(' + v.id + ', \'' + v.id_pasien + '\', \'' + v.nama + '\')" title="Hapus status cetak ulang billing"><i class="fa fa-trash"></i></button>';
					let html = `<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="center">${v.no_register}</td>
								<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
								<td class="center">${v.id_pasien}</td>
								<td class="left"> ${v.nama}</td>
								<td class="center">${((v.penjamin !== null) ? v.penjamin : '')}</td>
								<td class="right">${money_format(v.tagihan-v.piutang_dibayar)}</td>
								<td class="center">${((v.waktu_cetak_billing !== null) ? datetimefmysql(v.waktu_cetak_billing) : '')}</td>
								<td class="center">${((v.tanggal_batal_keluar !== null) ? datetimefmysql(v.tanggal_batal_keluar) : '')}</td>
								<td class="left" style="display:flex;float:left">
									${btnHapus}
								</td>
								</tr> `;
					$('#table-listcco tbody').append(html);
				})

				$('.mypopover').popover({
					html: true,
					trigger: 'hover',
					sanitize: false,
				});

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function setStatusCco(id_pendaftaran, id_pasien, nama) {
		Swal.fire({
			title: 'Penghapusan status cetak ulang billing karena CCO',
			text: "Apakah anda yakin akan melakukan penghapusan status cetak ulang billing karena CCO? Untuk pasien " + id_pasien + " " + nama,
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Tidak',
			confirmButtonText: '<i class="fas fa-paper-plane mr-1"></i>Ya',
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url('rekap_billing/api/rekap_billing/simpan_waktu_cetak') ?>',
					data: 'id_pendaftaran=' + id_pendaftaran + '&keterangan=0',
					cache: false,
					dataType: 'JSON',
					success: function(data) {
						if (data.status) {
							getStatusCco(1);
							messageCustom('Gagal Penghapusan status cetak ulang billing karena CCO', 'Success');
						} else {
							messageCustom('Gagal Penghapusan status cetak ulang billing karena CCO', 'Gagal');
						}
					},
					error: function(e) {
						messageCustom('Gagal Penghapusan status cetak ulang billing karena CCO', 'Gagal');
					}
				})

			}
		});
	}

	function paging2(page) {
		getStatusCco(page)
	}
</script>