<script>
	$(function() {
		getListDeposit(1);
		getSummaryDeposit();

		$('#btn-tambah').click(function() {
			resetData()
			$('#modal-deposit').modal('show')
		})

		// No RM Auto
        $('#no-rm').select2({
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
				depositPasien(data.id)
                return data.id;
            }
		})
		
		$('.validasi').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.validasi').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
        })

		$('#btn-reload').click(function() {
			resetData();
			getListDeposit(1);
			getSummaryDeposit();
		})
	})
	
	function resetData() {
		$('#form-deposit')[0].reset()
		$('#no-rm').val('');
		$('#s2id_no-rm a .select2-chosen').html('Pilih')
		$('.detail-pasien, #sisa-deposit-detail').html('')
		$('#sisa-deposit').val('')
		$('#deposit-content').empty()
	}

	function getListDeposit(page) {
		$('#page-now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url('deposit/api/deposit/get_list_deposit') ?>/page/' + page,
			data: $('#form-search').serialize() + '&keyword=' + $('#pencarian-nama-pasien').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDeposit(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-data tbody').empty();

				$.each(data.data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="left">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
							<td class="center">${v.no_rm}</td>
							<td>${v.pasien}</td>
							<td class="right">${money_format(v.masuk)}</td>
							<td class="right">${money_format(v.keluar)}</td>
							<td class="left">${v.keterangan}</td>
							<td class="left">${v.user}</td>
							<td class="right aksi">
								<button type="button" class="btn btn-secondary btn-xs" onclick="cetakKwitansi(${v.id})"><i class="fas fa-fw fa-print"></i></button>
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html);
				});
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		})
	}

	function paging(page) {
		getListDeposit(page)
	}

	function getSummaryDeposit() {
		$('#page-now').val(1)
		$('#table-summary tbody').empty()
		$.ajax({
			type: 'GET',
			url: '<?= base_url('deposit/api/deposit/get_summary_deposit') ?>',
			data: '',
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let html = /* html */ `
					<tr>
						<td>Saldo</td>
						<td class="right"><b>${money_format(data.saldo)}</b></td>
					</tr>
					<tr>
						<td>Uang Masuk Hari Ini</td>
						<td class="right"><b>${money_format(data.setor_today)}</b></td>
					</tr>
					<tr>
						<td>Uang Keluar Hari Ini</td>
						<td class="right"><b>${money_format(data.ambil_today)}</b></td>
					</tr>
				`;

				$('#table-summary tbody').append(html)
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function depositPasien(id_pasien) {
		$('#deposit-content').empty()
		$.ajax({
			type: 'GET',
			url: '<?= base_url('deposit/api/deposit/get_history_deposit_pasien') ?>/id/' + id_pasien,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data !== null) {
					let pasien = data.pasien;
					$('#norm-detail').html(pasien.id)
					$('#nama-detail').html(pasien.nama)
					let kelamin = '';
					if (pasien.kelamin === 'L') {
						kelamin = 'Laki - laki';
					} else if (pasien.kelamin === 'Perempuan') {
						kelamin = 'Perempuan';
					}
					let umur = '';
					if (pasien.tanggal_lahir !== null) {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + pasien.tanggal_lahir + ') ';
					}
					$('#alamat-detail').html(pasien.alamat)
					$('#kelamin-detail').html(kelamin)
					$('#umur-detail').html(umur)
					
					$('#sisa-deposit-detail').html(money_format(data.pasien.sisa_deposit))
					$('#sisa-deposit').val(data.pasien.sisa_deposit)

					if (data.history_deposit.length > 0) {
						let html = showHistoryDeposit(data.history_deposit)
						$('#deposit-content').html(html)
					}
				} else {
					messageCustom('Data tidak ditemukan!', 'Info')
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

	function showHistoryDeposit(data) {
		let masuk = 0; let keluar = 0;
		let html = /* html */ `
			<h4>Rekap Deposit</h4>
			<table class="table table-hover table-striped table-sm color-table info-table">
				<thead>
					<tr>
						<th width="5%" class="center">No.</th>
						<th width="15%" class="center">Waktu</th>
						<th width="15%" class="right">Masuk</th>
						<th width="15%" class="right">Keluar</th>
						<th width="30%" class="left">Keterangan</th>
						<th width="15%" class="left">Petugas</th>
						<th width="5%" class="left"></th>
					</tr>
				</thead>
				<tbody>`;
				
		$.each(data, function (i, v) {
			html += /* html */ `
					<tr>
						<td class="center">${i + 1}</td>
						<td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
						<td class="right">${numberToCurrency(v.masuk)}</td>
						<td class="right">${numberToCurrency(v.keluar)}</td>
						<td>${v.keterangan}</td>
						<td>${v.petugas}</td>
						<td class="right aksi">
							<button onclick="cetakKwitansi(${v.id})" title="Cetak Kwitansi Deposit" class="btn btn-secondary btn-xs"><i class="fas fa-fw fa-print"></i></button></td>
						</td>
					</tr>
			`;

			masuk += parseInt(v.masuk)
            keluar += parseInt(v.keluar)
		})

		html += /* html */ `
					<tr>
						<td colspan="2"></td>
						<td class="text-red right"><b>${numberToCurrency(masuk)}</b></td>
						<td class="text-red right"><b>${numberToCurrency(keluar)}</b></td>
						<td colspan="3" class="text-red center"><b>${numberToCurrency(masuk - keluar)}</b></td>
					</tr>
		`;

		html += /* html */	`
				</tbody>
			</table>
		`;

		return html;
	}

 	function simpanDeposit() {
		let validasi = false;

		if ($('#no-rm').val() === '') {
			syams_validation('#no-rm', 'Pilih No. RM terlebih dahulu!')
			return false;
		}

		let id_pasien = $('#no-rm').val()

		if ($('#jenis-transaksi').val() === '') {
			syams_validation('#jenis-transaksi', 'Jenis transaksi harus dipilih!')
			validasi = true;
		}

		if ($('#total').val() === '' | $('#total').val() === 0) {
			syams_validation('#total', 'Uang yang diserahkan harus diisi / tidak sama dengan 0!')
			validasi = true;
		}

		if (validasi) {
			return false;
		}

		swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Apakah anda yakin akan melakukan transaksi deposit?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
			allowOutsideClick: false,
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url('deposit/api/deposit/simpan_deposit') ?>',
					data: $('#form-deposit').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success');
							depositPasien(id_pasien)
							getListDeposit($('#page-now').val());
							getSummaryDeposit();
						} else {
							messageCustom(data.message, 'Error');
						}
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Gagal melakukan transaksi simpan deposit', 'Error');
					}
				})
			}
		});
	}

	function cetakKwitansi(id) {
		window.open('<?= base_url() ?>deposit/printing_kwitansi_deposit/' + id, 'Cetak Kwitansi Deposit','width='+dWidth+', height='+dHeight+', left='+x+',top='+y)
	}
</script>