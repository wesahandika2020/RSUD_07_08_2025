<script>
	$(function() {
		getListSelisihBilling(1, '')

		$('#btn-add').click(function() {
			reloadData()
			$('#modal-selisih-billing').modal('show')
		})


		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#waktu').datetimepicker({
			format: 'YYYY-MM-DD HH:mm'
		}).on('changeDate', function() {
			$(this).datetimepicker('hide');
		})

		$('#search-pasien').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/pasien_kunjungan_regis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term,
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
				var nama = (data.id_pasien !== '') ? ('<b>(' + data.id_pasien + ' / ' + data.no_register + ') - ' + data.nama + '</b><br/>') : 'Semua Pasien<br/>';
				var tanggal_layanan = (data.tanggal !== '') ? ('Tgl. Kunjungan, ' + data.tanggal) : '';
				var kunjungan = (data.jenis_layanan !== '') ? tanggal_layanan + ' ' + data.jenis_layanan + '<br/>' : '';
				var tindak_lanjut = data.tindak_lanjut == null ? "<i>-Masih dalam kunjungan-</i>" : data.tindak_lanjut;

				var markup = nama + kunjungan + tindak_lanjut
				return markup;
			},
			formatSelection: function(data) {
				$('#id-pendaftaran').val(data.id)
				$('#id-layanan-pendaftaran').val(data.id_layanan_pendaftaran)
				$('#nama').val(data.nama)
				// bayar(data.total)
				var nama = (data.id_pasien !== '') ? (data.id_pasien + '/' + data.no_register + ' ' + data.nama) : 'Semua Pasien';
				var kunjungan = (data.jenis_layanan !== '') ? data.jenis_layanan : '';
				return nama + ', ' + kunjungan;
			}
		})

		$('#bayar').keyup(function() {
			$('#pembulatan, #serah, #nominal').val($(this).val())
		})

		$('#pembulatan').keyup(function() {
			let pembulatan = numberToCurrency($(this).val())
			$('#serah, #pembulatan').val(pembulatan)
			hitungKembalian()
		})

		$('#serah').keyup(function() {
			hitungKembalian()
		})

		$('.validasi, .select2-input').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.validasi, .select2-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function() {
			reloadData()
			getListSelisihBilling(1, '')
		})

	})

	function reloadData() {
		$('#serah, #bulat, #pembulatan, #kembalian').val('')
		$('#kembalian-detail').html('')
		syams_validation_remove('.validasi')
		syams_validation_remove('.select2-input')
		$('#no-kwitansi-search, #nama-search, #tanggal-awal').val('')
	}

	function hitungKembalian() {
		let bayar = parseInt(currencyToNumber($('#bayar').val()))
		let serah = parseInt(currencyToNumber($('#serah').val()))
		let kembalian = serah - bayar;

		if (kembalian < 0) {
			kembalian = 0;
		}

		$('#kembalian-detail').html(numberToCurrency(kembalian))
		$('#kembalian').val(kembalian)
	}

	function settingUnitKasir() {
		$('#modal-unit-kasir').modal('show')
	}

	function simpanUnitKasir() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("keuangan/api/keuangan/set_unit_kasir") ?>',
			data: $('#form-unit-kasir').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === false) {
					swalAlert('error', 'Set Unit Kasir', 'Gagal mensetting unit kasir!')
				} else {
					messageCustom('Berhasil mensetting unit kasir!', 'Success')
					location.reload()
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', 'Set Unit Kasir', 'Gagal mensetting unit kasir!')
			},
		})
	}

	function simpanUnitKasirAuto() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("keuangan/api/keuangan/set_unit_kasir") ?>',
			data: 'unit_kasir=' + localStorage.getItem('unit_kasir'),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === false) {
					swalAlert('error', 'Set Unit Kasir', 'Gagal mensetting unit kasir!')
				} else {
					messageCustom('Berhasil mensetting unit kasir!', 'Success')
					location.reload()
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', 'Set Unit Kasir', 'Gagal mensetting unit kasir!')
			},
		})
	}

	function simpanSelisihBilling() {
		let validate = false;
		if ($('#search-pasien').val() === '') {
			syams_validation('#search-pasien', 'Nama Pasien harus diisi!')
			validate = true;
		}
		if ($('#waktu').val() === '') {
			syams_validation('#waktu', 'Waktu dan tanggal harus diisi!')
			validate = true;
		}
		if ($('#bayar').val() === '') {
			syams_validation('#bayar', 'Total bayar harus diisi!')
			validate = true;
		}
		if ($('#pembulatan').val() === '') {
			syams_validation('#pembulatan', 'Pembulatan harus diisi!')
			validate = true;
		}
		if ($('#serah').val() === '') {
			syams_validation('#serah', 'Jumlah uang yang diterima harus diisi!')
			validate = true;
		}
		let bayar = currencyToNumber($('#bayar').val())
		let serah = currencyToNumber($('#serah').val())
		if (serah < bayar) {
			syams_validation('#serah', 'Uang yang diserahkan harus lebih besar atau sama dengan nominal yang akan dibayarkan!')
			validate = true;
		}
		if (validate) {
			return false;
		}
		swal.fire({
			title: 'Konfirmasi Pembayaran',
			html: "Apakah anda yakin akan melakukan transaksi pembayaran ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Proses',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("pembayaran_selisih_billing/api/pembayaran_selisih_billing/simpan_pembayaran_selisih_billing") ?>',
					data: $('#form-selisih-billing').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						let type = 'Error';
						if (data.status) {
							type = 'Success';
						}
						messageCustom(data.message, type)
						reloadData()
						$('#modal-selisih-billing').modal('hide')
						if (data.status === true) {
							getListSelisihBilling(1, data.id)
							cetakKwitansiPembayaran(data.id)
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan transaksi pembayaran', 'Error')
					},
				})
			}
		})
	}

	function getListSelisihBilling(page, id) {
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pembayaran_selisih_billing/api/pembayaran_selisih_billing/get_list_pembayaran_selisih_billing") ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListSelisihBilling(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()

				$.each(data.data, function(i, v) {
					let activeStatus = '';
					let disabled = '';
					if (v.status === 'Batal') {
						disabled = 'disabled';
						activeStatus = 'active-status';
					}

					let html = /* html */ `
						<tr>
							<td class="${activeStatus} center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="${activeStatus} center">${v.no_kwitansi}</td>
							<td class="${activeStatus} center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
							<td class="${activeStatus} center">${v.no_register}</td>
							<td class="${activeStatus} center">${v.id_pasien}</td>
							<td class="${activeStatus}">${v.nama}</td>
							<td class="${activeStatus} center">${v.penjamin}</td>
							<td class="${activeStatus} right">${money_format(v.tagihan)}</td>
							<td class="${activeStatus} right">${money_format(v.nominal)}</td>
							<td class="${activeStatus}">${v.keterangan}</td>
							<td class="${activeStatus} right aksi">
								<button type="button" class="btn btn-secondary btn-xs" title="Klik untuk melihat riwayat pembayaran" onclick="historyPembayaran(${v.id_pendaftaran})"><i class="fas fa-history mr-1"></i>History</button>
								<button type="button" ${disabled} class="btn btn-secondary btn-xs" title="Klik untuk pembatalan pembayaran" onclick="batalPembayaranLain(${v.id})"><i class="fas fa-times mr-1"></i>Batal</button>
						</tr>
					`;

					$('#table-data tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})
	}

	function historyPembayaran(id_pendaftaran) {
		$('#history-pembayaran-content').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url('keuangan/api/keuangan/get_data_history_pembayaran') ?>/id/' + id_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				console.log(data)
				if (data.length > 0) {
					let html = showContentHistoryPembayaran(data);
					$('#history-pembayaran-content').append(html);
					$('#modal-history-pembayaran').modal('show');
				} else {
					swalAlert('info', 'Informasi Pembayaran', 'Belum ada transaksi pembayaran, Silahkan lakukan pembayaran terlebih dahulu!');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function showContentHistoryPembayaran(data) {
		let html = /* html */ `
			<table class="table table-sm table-striped table-hover color-table info-table">
				<thead>
					<tr>
						<th width="3%" class="center">No.</th>
						<th width="10%" class="center">No. Kwitansi</th>
						<th width="12%" class="center">Waktu</th>
						<th width="13%" class="left">Transaksi</th>
						<th width="15%" class="left">Petugas Kasir</th>
						<th width="5%" class="center">Shift</th>
						<th width="10%" class="right">Selisih Billing</th>
						<th></th>
					</tr>
				</thead>`;

		$.each(data, function(i, v) {
			if (v.jenis_transaksi === 'Selisih Billing') {
				let disabled = '';
				let activeStatus = '';
				if (v.status === 'Batal') {
					disabled = 'disabled';
					activeStatus = 'active-status';
				}

				let accountGroup = '<?= $this->session->userdata('account_group') ?>'

				html += /* html */ `
				<tbody>
					<tr>
						<td class="${activeStatus} center">${++i}</td>
						<td class="${activeStatus} center">${v.no_kwitansi}</td>
						<td class="${activeStatus} center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
						<td class="${activeStatus}">${v.jenis_transaksi}</td>
						<td class="${activeStatus}">${v.kasir}</td>
						<td class="${activeStatus} center">${v.shift}</td>
						<td class="${activeStatus} right"><b>${money_format(v.nominal)}</b></td>
						<td class="${activeStatus} right aksi">
							<button type="button" class="btn btn-secondary btn-xs" onclick="cetakNotaPembayaran('${v.id}')"><i class="fas fa-fw fa-print mr-1"></i>Nota</button>
							<button type="button" class="btn btn-secondary btn-xs" onclick="cetakKwitansiPembayaran(${v.id})"><i class="fas fa-fw fa-print mr-1"></i>Kwitansi</button>
							${accountGroup === 'Admin' | accountGroup === 'Kasir' ? '<button '+disabled+' type="button" class="btn btn-secondary btn-xs" title="Klik untuk melakukan batal pembayaran" onclick="batalPembayaran('+v.id+')"><i class="fas fa-fw fa-times mr-1"></i>Batal</button>' : ''}
						</td>

					</tr>
				</tbody>
			`;
			}
		});

		html += /* html */ `
			</table>
			<br>
		`;

		return html;
	}

	function cetakKwitansiPembayaran(id_history_pembayaran, tanggal = '') {
		let param = '';
		if (tanggal !== '') {
			param = '&tanggal=' + date2mysql(tanggal);
		}

		window.open("<?php echo base_url('keuangan/pembayaran/printing_kwitansi_pembayaran') ?>?id_history_pembayaran=" + id_history_pembayaran + param, "Cetak Kwitansi Pembayaran", 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakNotaPembayaran(id_history_pembayaran, tanggal = '') {
		let param = '';
		if (tanggal !== '') {
			param = '&tanggal=' + date2mysql(tanggal);
		}

		window.open("<?php echo base_url('keuangan/pembayaran/printing_nota_pembayaran') ?>?id_history_pembayaran=" + id_history_pembayaran + param, "Cetak Nota Pembayaran", 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function paging(page, tab) {
		getListSelisihBilling(page, '')
	}

	function batalPembayaranLain(id) {
		swal.fire({
			title: 'Konfirmasi Pembatalan',
			html: "Apakah anda yakin akan melakukan pembatalan pembayaran ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url('pembayaran_selisih_billing/api/Pembayaran_selisih_billing/batal_pembayaran_selisih_billing') ?>',
					data: 'id=' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success')
							getListSelisihBilling($('#page-now').val())
						} else {
							messageCustom(data.message, 'Info')
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan pembatalan pembayaran', 'Error')
					}
				})
			}
		})
	}
</script>