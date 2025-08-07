<script>
	$(function() {
		getListPembayaranLain(1, '')

		$('.attr-tarif-manual').hide()

		$('#btn-add').click(function() {
			reloadData()
			$('#modal-pembayaran-lain').modal('show')
		})

		$('#is-manual').change(function() {
			if ($('#is-manual').prop('checked')) {
				$('#is-manual').val(1);
				$('.attr-tarif-manual').show();
				$('.attr-tarif').hide();
			} else {
				$('#is-manual').val(0);
				$('.attr-tarif-manual').hide();
				$('.attr-tarif').show();
			}
		});

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#search-pasien').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/pasien_kunjungan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						// jenis_pemeriksaan: 'Pelayanan Lain - Lain',
						// jenis_tindakan: '',
						// kelas: '',
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
				$('#jumlah').val(1)
				$('#nominal').val(data.total)
				$('#id-pendaftaran').val(data.id)
				$('#id-layanan-pendaftaran').val(data.id_layanan_pendaftaran)
				$('#nama').val(data.nama)
				bayar(data.total)
				var nama = (data.id_pasien !== '') ? (data.id_pasien + '/' + data.no_register + ' ' + data.nama) : 'Semua Pasien';
				var kunjungan = (data.jenis_layanan !== '') ? data.jenis_layanan : '';
				return nama + ', ' + kunjungan;
			}
		})

		$('#tarif').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2

					return {
						q: term, //search term
						jenis_pemeriksaan: 'Pelayanan Lain - Lain',
						jenis_tindakan: '',
						kelas: '',
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
				var total = data.total;
				var kelas = (data.kelas !== '') ? ((', kelas ') + data.kelas) : 'Semua Kelas';
				var jenis = (data.jenis !== '') ? ('<br/>' + data.jenis + '<br/>') : '<br/>';

				var markup = '<b>' + data.layanan + '</b> <br/>' + data.jenis + ', ' + data.bobot + kelas + '<br/>' + numberToCurrency(total)
				return markup;
			},
			formatSelection: function(data) {
				$('#jumlah').val(1)
				$('#nominal').val(data.total)
				bayar(data.total)
				var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
				return data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas
			}
		})

		$('#tarif-search').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2

					return {
						q: term, //search term
						jenis_pemeriksaan: 'Pelayanan Lain - Lain',
						jenis_tindakan: '',
						kelas: '',
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
				var total = data.total;
				var kelas = (data.kelas !== null) ? ((', kelas ') + data.kelas) : '';

				var markup = '<b>' + data.layanan + '</b> <br/>' + data.jenis + ', ' + data.bobot + kelas + '<br/>' + numberToCurrency(total)
				return markup;
			},
			formatSelection: function(data) {
				var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
				return data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas
			}
		})

		$('#bayar').keyup(function() {
			$('#pembulatan, #serah').val($(this).val())
		})

		$('#jumlah').change(function() {
			if ($(this).val() !== '') {
				if ($(this).val() < 1) {
					$(this).val(1)
				};
				let total = $('#nominal').val()
				bayar(total)
			}
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
			getListPembayaranLain(1, '')
		})

	})

	function reloadData() {
		$('#serah, #bulat, #pembulatan, #kembalian').val('')
		// $('#nama, #serah, #bulat, #pembulatan, #kembalian').val('')
		$('#kembalian-detail').html('')
		syams_validation_remove('.validasi')
		syams_validation_remove('.select2-input')
		$('#no-kwitansi-search, #nama-search, #tarif-search').val('')
		$('s2id_tarif-search a .select2-chosen').html('Pilih Tarif')
	}

	function bayar(total) {
		reloadData()
		let jumlah = $('#jumlah').val()
		total = total * jumlah;
		let totalCurrency = numberToCurrency(total)
		$('#kembalian').val(0)
		$('#pembulatan, #bayar, #serah').val(totalCurrency)
		$('#kembalian-detail').html(0)
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

	function simpanPembayaranLain() {
		let validate = false;
		if ($('#nama').val() === '') {
			syams_validation('#nama', 'Nama harus diisi!')
			validate = true;
		}
		if ($('#is-manual').val() != 1) {
			if ($('#tarif').val() === '') {
				syams_validation('#tarif', 'Tarif harus dipilih!')
				validate = true;
			}
		} else {
			if ($('#tarif-manual').val() === '') {
				syams_validation('#tarif-manual', 'Tarif harus dipilih!')
				validate = true;
			}
		}
		if ($('#jumlah').val() === '') {
			syams_validation('#jumlah', 'Jumlah harus diisi!')
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
					url: '<?= base_url("pembayaran_lain/api/pembayaran_lain/simpan_pembayaran_lain") ?>',
					data: $('#form-pembayaran-lain').serialize(),
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
						$('#modal-pembayaran-lain').modal('hide')
						if (data.status === true) {
							getListPembayaranLain(1, data.id)
							
							const noRegis = data.data.pasien.no_register;
							const noRM = data.data.pasien.id_pasien;
							
							cetakKwitansi(data.id, noRegis, noRM)
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

	function getListPembayaranLain(page, id) {
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pembayaran_lain/api/pembayaran_lain/get_list_pembayaran_lain") ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPembayaranLain(page - 1)
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
							<td class="${activeStatus} center">${v.id_pasien !== null ? v.id_pasien : "-"}</td>
							<td class="${activeStatus}">${v.nama}</td>
							<td class="${activeStatus}">${v.tarif}</td>
							<td class="${activeStatus} right">${money_format(v.nominal)}</td>
							<td class="${activeStatus}">${v.keterangan}</td>
							<td class="${activeStatus} right aksi">
								${(v.status !== 'Batal' ? `<button type="button" class="btn btn-secondary btn-xs" title="Klik untuk cetak kwitansi" onclick="cetakKwitansi('${v.id}', '${v.no_register}', '${v.id_pasien}')"><i class="fas fa-print mr-1"></i>Print</button>` : '')}
								<button type="button" ${disabled} class="btn btn-secondary btn-xs" title="Klik untuk pembatalan pembayaran" onclick="batalPembayaranLain(${v.id_history_pembayaran})"><i class="fas fa-times mr-1"></i>Batal</button>
							</td>
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

	function paging(page, tab) {
		getListPembayaranLain(page, '')
	}

	function cetakKwitansi(id, noRegis, noRM) {
		window.open('<?= base_url() ?>pembayaran_lain/printing_kwitansi_pembayaran_lain/' + id + '/' + noRegis + '/' + noRM, 'Cetak Kwitansi Pembayaran Lain', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y)
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
					url: '<?= base_url('keuangan/api/pembayaran/batal_pembayaran') ?>',
					data: 'id=' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success')
							getListPembayaranLain($('#page-now').val())
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