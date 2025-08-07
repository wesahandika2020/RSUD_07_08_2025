<script type="text/javascript">
	$(function() {
		getListBookingBed(1);

		// button tambah
		$('#btn-tambah-data').click(function() {
			resetAllData();
			$('#modal-booking-bed').modal('show');
		});

		// button search
		$('#btn-search-data').click(function() {
			$('#modal-search').modal('show');
		});

		// button reload
		$('#btn-reload-data').click(function() {
			resetAllData();
			getListBookingBed(1);
		});

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
                fillDataPasien(data);
                return data.id;
            }
		});
		
		// $('.form-control').keyup(function () {
		// 	if ($(this).val() !== '') {
		// 		syams_validation_remove(this);
		// 	}
		// }); 

		$('.select2-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		$("#tanggal-awal, #tanggal-akhir").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });

		$('#status').change(function() {
			getListBookingBed(1);
		});
		
	});
	
	function getListBookingBed(page) {
		$('#page-now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("booking_bed/api/booking_bed/get_list_booking_bed") ?>/page/' + page,
			data: $('#form-search').serialize() + '&status=' + $('#status').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListBookingBed(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				let html = '';
				let bed = '';
				let status = '';
				let disabled = '';
				$.each(data.data, function(i, v) {
					if (v.status === 'request') {
						status = '<span class="blinker"><i><i class="fas fa-spinner fa-spin mr-1"></i>Order</i></span>';
						disabled = '';
					} else if (v.status === 'konfirm') {
						status = '<h5><span class="label label-success"><i class="fas fa-thumbs-up mr-1"></i>Dirawat</span></h5>';
						disabled = 'disabled';
					} else if (v.status === 'batal') {
						status = '<h5><span class="label label-danger"><i class="fas fa-minus-circle mr-1"></i>Batal</span></h5>';
						disabled = 'disabled';
					}

					no = ((i + 1) + ((data.page - 1) * data.limit));
					bed = v.bangsal + ' kelas ' + v.kelas + ' ruang ' + v.no_ruang + ' No. Bed ' + v.no_bed;
					html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td>${(v.waktu !== null) ? datetimefmysql(v.waktu) : ''}</td>
							<td class="center">${v.id_pasien}</td>
							<td>${v.pasien}</td>
							<td>${v.alamat}</td>
							<td>${v.telp}</td>
							<td>${bed}</td>
							<td>${v.user}</td>
							<td class="center">${v.repeat} Kali</td>
							<td class="center aksi">${status}</td>
							<td class="right aksi">
								<button ${disabled} title="Klik untuk membatalkan pemesanan tempat tidur" type="button" class="btn btn-secondary btn-xs" onclick="batalBookingBed('${v.id}', ${data.page})"><i class="fas fa-times mr-1"></i>Batal</button>
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
		});
	}

	function paging(page) {
		getListBookingBed(page);
	}

	function resetAllData() {
		let filter = $('#status').val();
		$('#id-bed, .select2-input, .form-control').val('');
		$('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>');
		$('.select2-chosen, .booking-label').html('');
		$('#repeat').val(0);
		$('#status').val(filter);
	}

	function maxOrder(object) {
		let repeat = $(object).val();
		if (repeat > 2) {
			repeat = 2;
		}

		$(object).val(repeat);
	}

	function fillDataPasien(data) {
		let kelamin = '';
		let umur = '';
		if (data.kelamin === 'L') {
			kelamin = 'Laki-laki';
		} else if (data.kelamin === 'P') {
			kelamin = 'Perempuan';
		}

		if (data.tanggal_lahir !== null) {
			umur = hitungUmur(data.tanggal_lahir) + ' ('+ datefmysql(data.tanggal_lahir) +')';
		}

		$('#nama-label').text(data.nama);
		$('#kelamin-label').text(kelamin);
		$('#usia-label').text(umur);
		$('#alamat-label').text(data.alamat);
		$('#no-telp-label').text(data.telp);
	}

	function pilihTempatTidur() {
		let stop = false;
		if ($('#no-rm').val() === '') {
			syams_validation('#no-rm', 'Pilih pasien terlebih dahulu.');
			stop = true;
		}

		if (stop) {
			return false;
		}

		$('#title-form-bed').html('Pilih Bed');
		$('.no-rm-ranap-label').html($('#s2id_no-rm a .select2-chosen').html());
		$('.nama-ranap-label').html($('#nama-label').html());
		$('.kelamin-ranap-label').html($('#kelamin-label').html());
		$('.layanan-ranap-label').html('');
		$('#modal-bed-ranap').modal('show');
	}

	function setBed(id, bed) {
		$('#id-bed').val(id);
		let dataBed = bed.replace(' kelas ', '').replace(' kamar ', '').replace(' nomor bed ', '');
		let data = dataBed.split(',');
		$('#bangsal-label').html(data[0]);
		$('#ruang-label').html(data[2] + ' (Kelas ' + data[1] + ')');
		$('#no-bed-label').html(data[3]);
		$('#modal-bed-ranap').modal('hide');
	}

	function konfirmasiBookingBed() {
		let stop = false;
		if ($('#no-rm').val() === '') {
			syams_validation('#no-rm', 'Pilih pasien terlebih dahulu.');
			stop = true;
		}

		if (stop) {
			return false;
		}

		if ($('#id-bed').val() === '') {
			Swal.fire({
				title: 'Booking Bed',
				text: "Anda belum memilih tempat tidur yang akan dipesan, silahkan pilih terlebih dahulu",
				icon: 'warning',
				showCancelButton: false,
				allowOutsideClick: false,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: '<i class="fas fa-check-circle mr-1"></i>OK'
				}).then((result) => {
				if (result.value) {
					pilihTempatTidur();
				}
			});

			return false;
		}

		Swal.fire({
			title: 'Booking Bed',
			text: "Apakah anda yakin akan melakukan booking bed, Klik Proses untuk melanjukan proses booking",
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			confirmButtonText: '<i class="fas fa-paper-plane mr-1"></i>Proses',
			}).then((result) => {
			if (result.value) {
				simpanDataBookingBed();
			}
		});
	}

	function simpanDataBookingBed() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("booking_bed/api/booking_bed/simpan_data_booking_bed") ?>',
			data: $('#form-booking-bed').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === true) {
					$('#modal-booking-bed').modal('hide');
					messageCustom(data.message, 'Success');
				} else {
					swalAlert('error', 'Booking Bed', data.message);
				}

				getListBookingBed($('#page-now').val());
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', e.status, 'Gagal melakukan pemesanan tempat tidur');
			},
		});
	}

	function batalBookingBed(id, page) {
		Swal.fire({
			title: 'Pemabatalan Booking Bed',
			text: "Apakah anda yakin akan melakukan pembatalan booking bed, Klik Proses untuk melanjukan proses booking",
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			confirmButtonText: '<i class="fas fa-paper-plane mr-1"></i>Proses',
			}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'GET',
					url: '<?= base_url("booking_bed/api/booking_bed/batal_booking_bed") ?>/id/' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success');
						} else {
							swalAlert('error', 'Pembatalan Booking Bed', data.message);
						}

						getListBookingBed(page);
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						swalAlert('error', e.status, e.statusText);
					},
				});
			}
		});
	}

</script>