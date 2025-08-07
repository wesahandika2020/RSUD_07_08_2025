<script>
	var unitKasir = '<?= $this->session->userdata("unit_kasir") ?>';
	$(function() {
		getListPembayaran(1)

		$('#btn-search').click(function() {
			resetData()
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function() {
			resetData()
			getListPembayaran(1)
		})

		$("#tanggal-awal, #tanggal-akhir").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})
		
		$('#bayar').keyup(function() {
			let bayar = currencyToNumber($(this).val())
			$('#serah').val(numberToCurrency(bayar))
		})

		$('.form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.form-control').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#serah').keyup(function() {
			hitungKembalian()
		})
	})

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

	function resetData() {
		$('#form-search')[0].reset()
		$('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
	}

	function getListPembayaran(page) {
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("penjualan_non_resep/api/penjualan_non_resep/get_list_penjualan") ?>/page/' + page + '/jenis/langsung',
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPembayaran(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()

				let no  = '';
                let num = 0;
				$.each(data.data, function(i, v) {
					let button = '';
					let buttonn = 'disabled';
					let status = '<em class="blinker"><i class="fas fa-spinner fa-spin"></i> Belum Lunas</em>';
					if (v.bayar !== '0') {
						status = '<h5><span class="label label-success"><i class="fas fa-check-circle mr-1"></i>Lunas</span></h5>';
						button = 'disabled';
						buttonn = '';
					}

					if (no !== v.id) {
                        num++;
                    }
					var detail = v.id+'#'+numberToCurrency(Math.ceil(v.total2))
					let html = /* html */ `
						<tr>
							<td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
							<td class="center">${v.id}</td>
							<td class="center">${v.id_pasien !== null ? v.id_pasien : '-'}</td>
							<td>${v.pembeli !== null ? v.pembeli : v.pembeli}</td>
							<td class="right">${numberToCurrency(Math.ceil(v.total2))}</td>
							<td class="center">${status}</td>
							<td class="right aksi">
								${button === '' ? '<button type="button" class="btn btn-secondary btn-xxs" title="Klik untuk melakukan pembayaran" onclick="inputPembayaran(\''+detail+'\')"><i class="fas fa-money-bill-alt mr-1"></i>Bayar</button>' : '<button type="button" class="btn btn-secondary btn-xxs" title="Klik untuk cetak bukti pembayaran" onclick="cetakBuktiPembayaran('+v.id+')"><i class="fas fa-print mr-1"></i>Print</button>'}
								<button type="button" ${buttonn} class="btn btn-secondary btn-xxs" title="Klik untuk membatalkan pembayaran non resep" onclick="batalPembayaran(${v.id}, ${data.page})"><i class="fas fa-times-circle mr-1"></i>Batal</button>
							</td>
						</tr>
					`;
					no = v.id;
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

	function paging(page) {
		getListPembayaran(page)
	}

	function inputPembayaran(detail) {
		let data = detail.split('#')
		if (unitKasir !== '') {
			$('#serah, #kembalian').val('')
        	$('#kembalian-detail').html('0')
			$('#id-penjualan').val(data[0])
			$('#nominal').val(currencyToNumber(data[1]))
			$('#nominal-detail').html(data[1])
			$('#bayar').val(money_format(pembulatan_seratus(currencyToNumber(data[1]))))
			$('#serah').focus()

			$('#modal-pembayaran').modal('show')
		} else {
			Swal.fire({
				icon: 'warning',
				title: 'Informasi',
				html: 'Anda belum melakukan setting unit kasir, <br> Silahkan set unit kasir terlebih dahulu pada tombol disebelah kanan.',
				showConfirmButton: true,
			})
		}
	}

	function konfirmasiSimpanPembayaran() {
		let validate = false;
		if ($('#serah').val() === '') {
			syams_validation('#serah', 'Uang yang diserahkan harus diisi!')
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
				simpanPembayaran()
			}
		})
	}

	function simpanPembayaran() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("keuangan/api/pembayaran/simpan_pembayaran_non_resep") ?>',
			data: $('#form-pembayaran').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status) {
					messageCustom('Berhasil melakukan transaksi pembayaran', 'Success')

					resetPembayaran()
					cetakBuktiPembayaran(data.id)

					getListPembayaran($('#page-now').val())
					$('#modal-pembayaran').modal('hide')
				} else {
					swalAlert('warning', 'Informasi Pembayaran', data.message)
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

	function resetPembayaran() {
		$('#id-pasien, #serah, #bulat, #bayar, #kembalian').val('')
		$('#kembalian-detail').html('')
	}

	function cetakBuktiPembayaran(id) {
		window.open("<?php echo base_url('pembayaran_non_resep/printing_nota_pembayaran_non_resep') ?>?id=" + id, "Cetak Nota Pembayaran Non Resep",'width='+dWidth+', height='+dHeight+', left='+x+',top='+y)
	}

	function batalPembayaran(id, page) {
		swal.fire({
			title: 'Konfirmasi Pembatalan',
			html: "Apakah anda yakin akan melakukan pembatalan pembayaran non resep ?",
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
					url: '<?= base_url('keuangan/api/pembayaran/batal_pembayaran_non_resep') ?>',
					data: 'id=' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success')
							getListPembayaran($('#page-now').val())
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