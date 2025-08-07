<script>
	var unitKasir = '<?= $this->session->userdata("unit_kasir") ?>';
	$(function() {
		$('.form-control').keypress(function(event) {
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if (keycode == '13') {
				event.preventDefault();
			}
		});

		// USE DEPOSIT
		$('#group-deposit').hide();
		$('.nominal-deposit').hide();
		$('#pakai-deposit').change(function() {
			$('#pakai-deposit').each(function() {
				let val = this.type == "checkbox" ? +this.checked : this.value;
				$('#pakai-deposit').val(val);
			});

			if ($('#pakai-deposit').val() > 0) {
				$('.nominal-deposit').show();
				pakaiDeposit();
			} else {
				$('.nominal-deposit').hide();
				$('#bayar-deposit').val('');
				$('#bayar').val(numberToCurrency($('#nominal').val()))
			}
		});

		// PAY DEPOSIT
		$('#bayar-deposit').keyup(function() {
			let nominalDeposit = parseInt($('#nominal-deposit').val());
			let bayarDeposit = parseInt(currencyToNumber($(this).val()));

			if (bayarDeposit > nominalDeposit) {
				pakaiDeposit();
				swalAlert('info', 'Peringatan', 'Nominal bayar deposit tidak boleh melebihi sisa deposit');
			}
		});

		// METODE PEMBAYARAN
		$('#metode-pembayaran').change(function() {
			if ($(this).val() !== '4') {
				$('.no-transaksi-metode').show()
				$('#no-transaksi-metode').val('')
			} else {
				$('.no-transaksi-metode').hide()
				$('#no-transaksi-metode').val('')
			}
		})

		// GET TAGIHAN
		$('#transaksi').prop('disabled', false);
		$('#transaksi').change(function() {
			getDataTagihan($('#id-pendaftaran').val(), $(this).val(), $('#piutang-pasien').val(), new Array());
		});

		$('#bayar').keyup(function() {
			let bayar = currencyToNumber($(this).val());
			let nominal = $('#thebill').val();
			$('#serah').val(numberToCurrency(bayar));

			if (!$('#cek-piutang-pasien').prop('checked')) {
				$('#reimburse').val(numberToCurrency(nominal - bayar));
			} else {
				$('#transaksi').prop('disabled', true);
				$('#reimburse').val('0');
			}
		});

		$('#cek-piutang-pasien').change(function() {
			if (!$(this).prop('checked')) {
				getDataTagihan($('#id-pendaftaran').val(), "", $('#piutang-pasien').val(), new Array());
				$('#transaksi').prop('disabled', false);
			} else {
				getDataTagihan($('#id-pendaftaran').val(), "", $('#piutang-pasien').val(), new Array());
				$('#transaksi').prop('disabled', true);
			}
		});

		$('.form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		$('.form-control').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		$('#serah').keyup(function() {
			hitungKembalian();
		})


		$("#waktu-perbaikan").datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date()
		}).on('changeDate', function() {
			$(this).datepicker('hide');

		});

		$('#perbaikan-waktu').change(function() {
			if (!$(this).prop('checked')) {
				$('.waktu-perbaikan').hide();
				$('#waktu-perbaikan').val('');
				$('#perbaikan-waktu').val(0);
			} else {
				$('.waktu-perbaikan').show();
				$('#waktu-perbaikan').val('<?= date('d/m/Y') ?>');
				$('#perbaikan-waktu').val(1);
			}
		});
	})


	function hitungKembalian() {
		let bayar = parseInt(currencyToNumber($('#bayar').val()));
		let serah = parseInt(currencyToNumber($('#serah').val()));
		let kembalian = serah - bayar;

		if (kembalian < 0) {
			kembalian = 0;
		}

		$('#kembalian-detail').html(numberToCurrency(kembalian));
		$('#kembalian').val(kembalian);
	}

	function convertToCurrency(obj) {
		if ($(obj).val() !== '') {
			var conv = currencyToNumber($(obj).val());
			$(obj).val(numberToCurrency(conv));
		} else {
			$(obj).val(0);
		}
	}

	function pakaiDeposit() {
		var nominalDeposit = 0;
		var nominalBayar = 0;

		nominalDeposit = parseInt($('#nominal-deposit').val());
		nominalBayar = parseInt($('#nominal').val());

		console.log(nominalBayar);

		if (nominalBayar < nominalDeposit) {
			// Lunas
			$('#bayar-deposit').val(numberToCurrency(nominalBayar));
			$('#bayar').val(0).attr('readonly', true);
			$('#bayar, #serah').val(0);
		} else {
			// Belum Lunas
			$('#bayar-deposit').val(numberToCurrency(nominalDeposit));
			var bayar = numberToCurrency(nominalBayar - nominalDeposit);
			$('#bayar').val(bayar).attr('readonly', true);
			$('#serah').val(bayar);
		}

	}

	function settingUnitKasir() {
		$('#modal-unit-kasir').modal('show');
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
					swalAlert('error', 'Set Unit Kasir', 'Gagal mensetting unit kasir!');
				} else {
					messageCustom('Berhasil mensetting unit kasir!', 'Success');
					location.reload();
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', 'Set Unit Kasir', 'Gagal mensetting unit kasir!');
			},
		});
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
					swalAlert('error', 'Set Unit Kasir', 'Gagal mensetting unit kasir!');
				} else {
					messageCustom('Berhasil mensetting unit kasir!', 'Success');
					location.reload();
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', 'Set Unit Kasir', 'Gagal mensetting unit kasir!');
			},
		});
	}

	function inputPembayaran(id_pendaftaran, cara_bayar, jenis_layanan) {
		if (unitKasir !== '') {
			$('#id-pendaftaran').val(id_pendaftaran);
			$('#transaksi').val('');

			$('#perbaikan-waktu').prop('checked', false);
			$('#perbaikan-waktu').val(0);
			$('.waktu-perbaikan').hide();
			$('#waktu-perbaikan').val('');
			
			getDetailBilling(id_pendaftaran, cara_bayar);
		} else {
			Swal.fire({
				icon: 'warning',
				title: 'Informasi',
				html: 'Anda belum melakukan setting unit kasir, <br> Silahkan set unit kasir terlebih dahulu pada tombol disebelah kanan.',
				showConfirmButton: true,
			});
		}
	}

	function konfirmasiKasir(id_pendaftaran) {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("keuangan/api/keuangan/konfirmasi_kasir") ?>',
			data: {
				id_pendaftaran
			},
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === false) {
					swalAlert('error', 'Konfirmasi Kasir', 'Gagal melakukan konfirmasi kasir!');
				} else {
					messageCustom('Berhasil melakukan konfirmasi kasir!', 'Success');
					getListPembayaran($('#page-now').val());
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', 'Konfirmasi Kasir', 'Gagal melakukan konfirmasi kasir!');
			},
		});
	}

	function getDetailBilling(id_pendaftaran, cara_bayar) {
		$('#form-pembayaran')[0].reset();
		syams_validation_remove('.form-control');
		$('#billing-content').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("keuangan/api/keuangan/get_detail_pasien") ?>/id/' + id_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				const checkbox = document.getElementById('cek-piutang-pasien');
				checkbox.addEventListener('change', function(event) {
					if (event.target.checked) {
						$('#piutang-pasien').val('TRUE');
					} else {
						$('#piutang-pasien').val('');
					}
				});

				if (data.pasien.is_piutang == 'TRUE') {
					$('#cek-piutang-pasien').prop('checked', true);
					$('#piutang-pasien').val('TRUE');
				} else {
					$('#cek-piutang-pasien').prop('checked', false);
					$('#piutang-pasien').val('');
				}

				if (data.pasien !== null) {
					$('#no-rm-detail').text(data.pasien.id_pasien);
					$('#nama-detail').text(data.pasien.nama);
					$('#no-register-detail').text(data.pasien.no_register);
					let kelamin = '';
					if (data.pasien.kelamin === 'L') {
						kelamin = 'Laki - laki';
					} else {
						kelamin = 'Perempuan';
					}
					$('#kelamin-detail').text(kelamin);
					$('#telp-detail').text(data.pasien.telp);
					$('#cara-bayar-detail').text(cara_bayar);
					if (cara_bayar === 'Tunai') {
						$('#group-pasien-perjanjian').show();
						$('.metode-pembayaran').show();
					} else {
						$('#group-pasien-perjanjian').hide();
						$('.metode-pembayaran').hide();
						$('.no-transaksi-metode').hide();
					}

					if (data.sisa_deposit > 0) {
						$('#group-deposit').show();
						$('#detail-deposit').val(numberToCurrency(data.sisa_deposit));
						$('#nominal-deposit').val(data.sisa_deposit);
						$('#id-pasien').val(data.pasien.id_pasien);
					} else {
						$('#group-deposit').hide();
					}

					$('#id-pendaftaran').val(data.pasien.id);

					if (data.status === 'Sudah') {
						$('#bayar-billing').attr('disabled', 'disabled');
					} else {
						$('#bayar-billing').removeAttr('disabled');
					}

					if (!data.status_order.rad) {
						swalAlert('warning', 'Peringatan', 'Order Radiologi belum dikonfirmasi!');
						return;
					}

					if (!data.status_order.lab) {
						swalAlert('warning', 'Peringatan', 'Order Laboratorium belum dikonfirmasi!');
						return;
					}

					if ((data.pasien.jenis_rawat == 'Inap') && (data.pasien.tanggal_keluar === null)) {
						swalAlert('warning', 'Peringatan', 'Pasien belum keluar, masih dalam kunjungan');
					} else {
						if (data.status_penyerahan && cara_bayar === 'Tunai') {
							Swal.fire({
								icon: 'warning',
								title: 'Informasi',
								html: 'Resep belum diserahkan, <br> Silahkan konfirmasi ke farmasi.',
								showConfirmButton: true,
							});

							return;
						}

						getDataTagihan(data.pasien.id, $('#transaksi').val(), $('#piutang-pasien').val(), new Array());
						$('#modal-pembayaran').modal('show');
					}
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function getDataTagihan(id_pendaftaran, transaksi, is_piutang, layanan_pendaftaran) {
		$('#kembalian').val(0);
		$('#kembalian-detail').text(0);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("keuangan/api/keuangan/get_data_tagihan") ?>/id/' + id_pendaftaran,
			data: 'transaksi=' + transaksi + '&layanan_pendaftaran=' + layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				let sisa_tagihan = 0;
				let bulat = 0;

				if ($('#piutang-pasien').val() !== "TRUE") {
					sisa_tagihan = data.total;
					$('#nominal-detail').html(money_format(data.total));
					$('#nominal').val(Math.ceil(data.total));
					$('#thebill').val(data.total + data.reimburse);
					$('#reimburse').val(money_format(data.reimburse));

					bulat = sisa_tagihan;
					$('#bayar').val(money_format(bulat));
				} else {
					sisa_tagihan = (data.total != 0 ? (data.total - data.piutang_dibayar) : 0);
					$('#nominal-detail').html(money_format(sisa_tagihan));
					$('#nominal').val(Math.ceil(sisa_tagihan));
					$('#thebill').val(sisa_tagihan + data.reimburse);
					$('#reimburse').val(money_format(data.reimburse));

					bulat = sisa_tagihan;
					$('#bayar').val(money_format(bulat));
				}

				const checkbox = document.getElementById('cek-piutang-pasien');
				checkbox.addEventListener('change', function(event) {
					if (event.target.checked) {
						sisa_tagihan = (data.total - data.piutang_dibayar);
						$('#nominal-detail').html(money_format(sisa_tagihan));
						$('#nominal').val(Math.ceil(sisa_tagihan));
						$('#thebill').val(sisa_tagihan + data.reimburse);
						$('#reimburse').val(money_format(data.reimburse));

						bulat = sisa_tagihan;
						$('#bayar').val(money_format(bulat));
					} else {
						sisa_tagihan = data.total;
						$('#nominal-detail').html(money_format(data.total));
						$('#nominal').val(Math.ceil(data.total));
						$('#thebill').val(data.total + data.reimburse);
						$('#reimburse').val(money_format(data.reimburse));

						bulat = sisa_tagihan;
						$('#bayar').val(money_format(bulat));
					}
				});

				if (data.total < 1) {
					$('#serah').val(0);
					$('#serah').attr('readonly', true);
				} else {
					$('#serah').val('');
					$('#serah').removeAttr('readonly');
				}

				$('#detail-area').empty();
				let html = '';

				if (is_piutang !== "") {
					showDetailAllRincianTagihanPiutang(data.detail, data.total, data.reimburse, data.piutang_dibayar);
				} else {
					if ((transaksi === 'all') | (transaksi === 'Rawat Inap') | (transaksi === 'IGD') | (transaksi === 'Poliklinik') | (transaksi === '')) {
						showDetailAllRincianTagihan(data.detail);
					} else {
						showDetailRincianTagihan(data.detail);
					}
				}

				// $('#cek-piutang-pasien').change(function() {
				if ($('#piutang-pasien').val() === "") {
					$('#transaksi').prop('disabled', false);
					if ((transaksi === 'all') | (transaksi === 'Rawat Inap') | (transaksi === 'IGD') | (transaksi === 'Poliklinik') | (transaksi === '')) {
						showDetailAllRincianTagihan(data.detail);
					} else {
						showDetailRincianTagihan(data.detail);
					}
				} else {
					$('#transaksi').prop('disabled', true);
					showDetailAllRincianTagihanPiutang(data.detail, data.total, data.reimburse, data.piutang_dibayar);
				}
				// });

				$('#serah').focus();
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function refreshDataTagihan() {
		let id_pendaftaran = $('#id-pendaftaran').val();
		getDataTagihan(id_pendaftaran, $('#transaksi').val(), $('#piutang-pasien').val(), '');
	}

	function showDetailAllRincianTagihan(data) {
		$('#detail-area').empty();
		let html = '';
		$.each(data, function(i, v) {
			html = /* html */ `
				<div class="card text-white bg-primary">
					<div class="card-header">
						<h6 class="m-b-0 text-white" style="cursor:pointer" onclick="gantiTransaksi('${v.jenis_layanan}')">${v.jenis_layanan + ' ' + v.klinik}</h6>
					</div>
					<div class="card-body bg-white border-white" style="color:black">`;
			if (v.jenis_layanan === 'Rawat Inap') {
				html += /* html */ `
								<table class="mb-2" style="border:0">
									<tr>
										<td width="20%">Bangsal</td>
										<td width="1%">:</td>
										<td width="79%">${v.bangsal}</td>
									</tr>
									<tr>
										<td>Waktu Keluar</td>
										<td>:</td>
										<td>${(v.waktu_keluar !== null ? datetimefmysql(v.waktu_keluar) : '')}</td>
									</tr>
								</table>
							`;


			}

			if (v.jenis_layanan === 'Intensive Care') {

				var bangsal = v.bangsal_icare;
				var bangs_icare = '';

				if (bangsal === '10') {

					bangs_icare = 'HCU';

				} else if (bangsal === '11') {

					bangs_icare = 'ICU';

				} else if (bangsal === '12') {

					bangs_icare = 'NICU';

				} else if (bangsal === '13') {

					bangs_icare = 'PICU';

				} else {

					bangs_icare = '';

				};

				html += /* html */ `
								<table class="mb-2" style="border:0">
									<tr>
										<td width="20%">Bangsal</td>
										<td width="1%">:</td>
										<td width="79%">${bangs_icare}</td>
									</tr>
									<tr>
										<td>Waktu Keluar</td>
										<td>:</td>
										<td>${(v.waktu_keluar_icare !== null ? datetimefmysql(v.waktu_keluar_icare) : '')}</td>
									</tr>
								</table>
							`;


				html += /* html */ `
							<table class="table table-striped table-sm table-hover">
								<thead>
									<tr>
										<th width="50%" class="left">Item</th>
										<th width="25%" class="right">Reimburse</th>
										<th width="25%" class="right">Total</th>
									</tr>
								</thead>
								<tbody>`;

				let sum_total = 0;
				let sum_reimburse = 0;
				$.each(v.items, function(j, w) {
					if (w.status) {
						sum_total += parseFloat(w.total);
						sum_reimburse += parseFloat(w.reimburse);

						html += /* html */ `
												<tr style="cursor:pointer" onclick="gantiTransaksi('${w.item}')" class="trx">
													<td><span class="item_trx">${w.item}</span></td>
													<td class="right">${money_format(w.reimburse)}</td>
													<td class="right">${money_format(w.total)}</td>
												</tr>
											`;
					}
				});

				html += /* html */ `
										<tr>
											<td></td>
											<td class="right" style="color:red">${money_format(sum_reimburse)}</td>
											<td class="right" style="color:red">${money_format(sum_total)}</td>
										</tr>
									`;


			} else {

				html += /* html */ `
							<table class="table table-striped table-sm table-hover">
								<thead>
									<tr>
										<th width="50%" class="left">Item</th>
										<th width="25%" class="right">Reimburse</th>
										<th width="25%" class="right">Total</th>
									</tr>
								</thead>
								<tbody>`;

				let sum_total = 0;
				let sum_reimburse = 0;
				$.each(v.items, function(j, w) {
					if (w.status) {
						sum_total += parseFloat(w.total);
						sum_reimburse += parseFloat(w.reimburse);

						html += /* html */ `
												<tr style="cursor:pointer" onclick="gantiTransaksi('${w.item}')" class="trx">
													<td><span class="item_trx">${w.item}</span></td>
													<td class="right">${money_format(w.reimburse)}</td>
													<td class="right">${money_format(w.total)}</td>
												</tr>
											`;
					}
				});

				html += /* html */ `
										<tr>
											<td></td>
											<td class="right" style="color:red">${money_format(sum_reimburse)}</td>
											<td class="right" style="color:red">${money_format(sum_total)}</td>
										</tr>
									`;

			}

			html += /* html */ `
								</tbody>
							</table>
						`;
			html += /* html */ `		
					</div>
				</div>
			`;

			$('#detail-area').append(html);
		});
	}

	function showDetailAllRincianTagihanPiutang(data, total, reimburse, piutang_dibayar) {
		$('#detail-area').empty();
		$('#transaksi').val('');

		// let html = 'Halloooo';

		html = /* html */ `
			<div class="card text-white bg-primary">
				<div class="card-header">
					<h6 class="m-b-0 text-white" style="cursor:pointer">Total Tagihan</h6>
				</div>
				<div class="card-body bg-white border-white" style="color:black">

					<table class="table table-striped table-sm table-hover">
						<thead>
							<tr>
								<th width="50%" class="left">Jenis Layanan</th>
								<th width="25%" class="right">Total</th>
							</tr>
						</thead>
						<tbody>`;

		$.each(data, function(i, v) {

			let sum_total = 0;
			let sum_reimburse = 0;

			$.each(v.items, function(j, w) {
				if (w.status) {
					sum_total += parseFloat(w.total);
					sum_reimburse += parseFloat(w.reimburse);
				}
			});

			html += `	<tr>
								<td class="left">${v.jenis_layanan}</td>
								<td class="right">${money_format(sum_total)}</td>
							</tr>`;

		});

		html += `	</tbody>
						<tfoot>
							<tr>
								<th class="right">TOTAL TAGIHAN</th>
								<th class="right">${money_format(total)}</th>
							</tr>
							<tr>
								<th class="right">JUMLAH YANG SUDAH DIBAYAR</th>
								<th class="right">${money_format(piutang_dibayar)}</th>
							</tr>
							<tr>
								<th class="right">SISA TAGIHAN</th>
								<th class="right">${(total != 0 ? money_format(total-piutang_dibayar) : 0)}</th>
							</tr>
						</tfoot>
					</table>

				</div>
			</div>`;

		$('#detail-area').append(html);
	}

	function showDetailRincianTagihan(data) {
		$('#detail-area').empty();
		let html = '';
		$.each(data, function(i, v) {
			html = /* html */ `
				<div class="card text-white bg-primary">
					<div class="card-header">
						<h6 class="m-b-0 text-white" style="cursor:pointer" onclick="gantiTransaksi('${v.jenis_layanan}')">${v.jenis_layanan + ' ' + v.klinik}</h6>
					</div>
					<div class="card-body bg-white border-white" style="color:black">`;
			html += /* html */ `
							<table class="table table-striped table-sm table-hover">
								<thead>
									<tr>
										<th width="35%" class="left">Item</th>
										<th width="15%" class="right">Harga</th>
										<th width="10%" class="center">Jml</th>
										<th width="20%" class="right">Reimburse</th>
										<th width="20%" class="right">Total</th>
									</tr>
								</thead>
								<tbody>`;

			let sum_total = 0;
			let sum_reimburse = 0;
			$.each(v.items, function(j, w) {
				if (w.frekuensi !== '0') {
					sum_total += parseFloat(w.total);
				}
				sum_reimburse += parseFloat(w.reimburse);

				html += /* html */ `
											<tr style="font-size:14px">
												<td><span>${w.item}</span></td>
												<td class="right">${money_format(w.harga_item)}</td>
												<td class="center">${w.frekuensi}</td>
												<td class="right">${money_format(w.reimburse)}</td>
												<td class="right">${money_format(w.total)}</td>
											</tr>
										`;
			});

			html += /* html */ `
										<tr>
											<td colspan="3"></td>
											<td class="right" style="color:red">${money_format(sum_reimburse)}</td>
											<td class="right" style="color:red">${money_format(sum_total)}</td>
										</tr>
									`;

			html += /* html */ `
								</tbody>
							</table>
						`;
			html += /* html */ `		
					</div>
				</div>
			`;

			$('#detail-area').append(html);
		});
	}

	function gantiTransaksi(transaksi) {
		if (transaksi === 'Resep') {
			transaksi = 'Barang';
		}

		$('#transaksi').val(transaksi);
		getDataTagihan($('#id-pendaftaran').val(), $('#transaksi').val(), $('#piutang-pasien').val(), new Array());
	}

	function konfirmasiSimpanPembayaran() {
		let validate = false;
		if ($('#serah').val() === '') {
			syams_validation('#serah', 'Uang yang diserahkan harus diisi!');
			validate = true;
		}

		let bayar = currencyToNumber($('#bayar').val());
		let serah = currencyToNumber($('#serah').val());
		let is_piutang = $('#piutang-pasien').val();

		if (is_piutang !== 'TRUE') {
			if ($('#transaksi').val() === '') {
				syams_validation('#transaksi', 'Pilih transaksi pembayaran terlebih dahulu');
				validate = true;
			}
			if (serah < bayar) {
				syams_validation('#serah', 'Uang yang diserahkan harus lebih besar atau sama dengan nominal yang akan dibayarkan!');
				validate = true;
			}
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
				simpanPembayaran();
			}
		});
	}

	function simpanPembayaran() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("keuangan/api/pembayaran/simpan_pembayaran_kasir") ?>',
			data: $('#form-pembayaran').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status) {
					messageCustom('Berhasil melakukan transaksi pembayaran', 'Success');

					resetPembayaran();
					cetakKwitansiLangsung(data.id_history_pembayaran, data.transaksi);

					getListPembayaran($('#page-now').val());
					$('#modal-pembayaran').modal('hide');
				} else {
					swalAlert('warning', 'Informasi Pembayaran', data.message);
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Gagal melakukan transaksi pembayaran', 'Error');
			},
		});
	}

	function resetPembayaran() {
		$('#id-pasien, #serah, #bulat, #bayar, #kembalian').val('');
		$('#kembalian-detail').html('');
	}

	function cetakKwitansiLangsung(id_history_pembayaran, transaksi) {
		if (transaksi === 'Rawat Inap' | transaksi === 'IGD' | transaksi === 'Poliklinik' | transaksi === 'Piutang Pasien' | transaksi === 'Layanan Pasien') {
			cetakNotaPembayaran(id_history_pembayaran);
		} else {
			cetakNotaPoli(id_history_pembayaran);
		}
	}

	function cetakNotaPembayaran(id_history_pembayaran, tanggal = '') {
		let param = '';
		if (tanggal !== '') {
			param = '&tanggal=' + date2mysql(tanggal);
		}

		window.open("<?php echo base_url('keuangan/pembayaran/printing_nota_pembayaran_all') ?>?id_history_pembayaran=" + id_history_pembayaran + param, "Cetak Nota Pembayaran", 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakNotaPoli(id_history_pembayaran, tanggal = '') {
		let param = '';
		if (tanggal !== '') {
			param = '&tanggal=' + date2mysql(tanggal);
		}

		window.open("<?php echo base_url('keuangan/pembayaran/printing_nota_pembayaran') ?>?id_history_pembayaran=" + id_history_pembayaran + param, "Cetak Nota Pembayaran", 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakKwitansiPembayaran(id_history_pembayaran, tanggal = '') {
		let param = '';
		if (tanggal !== '') {
			param = '&tanggal=' + date2mysql(tanggal);
		}

		window.open("<?php echo base_url('keuangan/pembayaran/printing_kwitansi_pembayaran') ?>?id_history_pembayaran=" + id_history_pembayaran + param, "Cetak Kwitansi Pembayaran", 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
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
						<th width="10%" class="right">Tunai</th>
						<th width="10%" class="right">Non Tunai</th>
						<th></th>
					</tr>
				</thead>`;

		$.each(data, function(i, v) {
			let disabled = '';
			let activeStatus = '';
			if (v.status === 'Batal') {
				disabled = 'disabled';
				activeStatus = 'active-status';
			}

			let cetakNotaPembayaran = '';
			if (v.jenis_transaksi === 'Rawat Inap' | v.jenis_transaksi === 'IGD' | v.jenis_transaksi === 'Poliklinik' | v.jenis_transaksi === 'Piutang Pasien' | transaksi === 'Layanan Pasien') {
				cetakNotaPembayaran = 'onclick="cetakNotaPembayaran(' + v.id + ')"';
			} else {
				cetakNotaPembayaran = 'onclick="cetakNotaPoli(' + v.id + ')"';
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
						<td class="${activeStatus} right"><b>${money_format(v.tunai)}</b></td>
						<td class="${activeStatus} right"><b>${money_format(v.non_tunai)}</b></td>
						<td class="${activeStatus} right aksi">
							<button type="button" class="btn btn-secondary btn-xs" ${cetakNotaPembayaran}><i class="fas fa-fw fa-print mr-1"></i>Nota</button>
							<button type="button" class="btn btn-secondary btn-xs" onclick="cetakKwitansiPembayaran(${v.id})"><i class="fas fa-fw fa-print mr-1"></i>Kwitansi</button>
							${accountGroup === 'Admin' | accountGroup === 'Kasir' ? '<button '+disabled+' type="button" class="btn btn-secondary btn-xs" title="Klik untuk melakukan batal pembayaran" onclick="batalPembayaran('+v.id+')"><i class="fas fa-fw fa-times mr-1"></i>Batal</button>' : ''}
						</td>

					</tr>
				</tbody>
			`;
		});

		html += /* html */ `
			</table>
			<br>
		`;

		return html;
	}

	function batalPembayaran(id) {
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
						showLoader();
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success');
							$('#modal-history-pembayaran').modal('hide');
							getListPembayaran($('#page-now').val());
						} else {
							messageCustom(data.message, 'Info');
						}
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Gagal melakukan pembatalan pembayaran', 'Error');
					}
				})
			}
		});
	}
</script>