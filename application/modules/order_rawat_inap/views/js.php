<script type="text/javascript">
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	$(function() {
		getListDataOrderRawatInap(1);
		resetDataPenjamin();

		$('#btn-reload-data').click(function() {
			resetAllData();
			getListDataOrderRawatInap(1);
		});

		$('#status').change(function() {
			if ($(this).val() !== 'request') {
				$('#pagination, #summary').show();
			} else {
				$('#pagination, #summary').hide();
			}
			getListDataOrderRawatInap(1);
		});

		$('#btn-search-data').click(function() {
			$('#dokter-ranap').val('');
			$('#s2id_dokter-ranap a .select2-chosen').html('Pilih Dokter');
			$('#modal-search').modal('show');
		});

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		// $("#tanggal-awal, #tanggal-akhir").datepicker({
		// 	format: "mm-yyyy",
		// 	viewMode: "months",
		// 	minViewMode: "months"
		// }).on('changeDate', function() {
		// 	$(this).datepicker('hide')
		// });

		$('#dokter-ranap').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'JSON',
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
				var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});
	});

	function getListDataOrderRawatInap(page) {
		$('#page-now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_rawat_inap/api/order_rawat_inap/get_list_order_rawat_inap") ?>/page/' + page,
			data: $('#form-search').serialize() + '&status=' + $('#status').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListDataOrderRawatInap(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				let html = '';
				let status = '';
				let btnKonfirmasi = '';
				let btnBatal = '';
				let btnEntriFormTransferIntra = '';
				let kelamin = '';
				let jenisLayanan = '';
				let disabled = '';

				$.each(data.data, function(i, v) {
					if (v.kelamin === 'L') {
						kelamin = 'Laki-laki';
					} else if (v.kelamin === 'P') {
						kelamin = 'Perempuan';
					}

					btnKonfirmasi = '<button disabled type="button" title="Konfirmasi Order Rawat Inap" class="btn btn-secondary btn-xs mr-1"><i class="fas fa-check-circle mr-1"></i>Konfirmasi</button>';
					btnBatal = '<button disabled type="button" title="Batal Order Rawat Inap" class="btn btn-secondary btn-xs mr-1"><i class="fas fa-times-circle mr-1"></i>Batal</button>';
					if (v.status === 'request') {
						status = '<span class="blinker"><i><i class="fas fa-spinner fa-spin mr-1"></i>Order</i></span>';
						btnKonfirmasi = '<button type="button" title="Konfirmasi Order Rawat Inap" class="btn btn-secondary btn-xs mr-1" onclick="konfirmasiOrderRawatInap(\'' + v.no_rm + '\', ' + v.id + ')"><i class="fas fa-check-circle mr-1"></i>Konfirmasi</button>';
						btnBatal = '<button type="button" title="Batal Order Rawat Inap" class="btn btn-secondary btn-xs mr-1" onclick="batalOrderRawatInap(' + v.id + ', ' + data.page + ')"><i class="fas fa-times-circle mr-1"></i>Batal</button>';
					} else if (v.status === 'dirawat') {
						status = '<h5><span class="label label-success"><i class="fas fa-thumbs-up mr-1"></i>Dirawat</span></h5>';
						btnKonfirmasi = '<button type="button" title="Edit Bed" class="btn btn-secondary btn-xs mr-1" onclick="formEditBed(' + v.id_layanan_pendaftaran_ranap + ', \'' + v.no_rm + '\', \'' + v.pasien + '\', \'' + kelamin + '\')"><i class="fas fa-edit mr-1"></i>Edit Bed</button>';
					} else if (v.status === 'batal') {
						status = '<h5><span class="label label-danger"><i class="fas fa-minus-circle mr-1"></i>Batal</span></h5>';
					}

					if (v.is_pindah_ruang === '1') {
						// btnEntriFormTransferIntra = '<button ' + disabled + ' type="button" class="btn btn-secondary btn-xs mr-1" onclick="entriFormTransferIntra('+v.id+', '+v.id_layanan_pendaftaran+')"><i class="fas fa-pencil-alt mr-1"></i>Entri Form Intra</button>'
					}

					jenisLayanan = '';
					if (v.jenis_layanan === 'Rawat Inap') {
						jenisLayanan = v.bangsal_asal;
					} else if (v.jenis_layanan === 'IGD') {
						jenisLayanan = v.jenis_igd;
					} else {
						jenisLayanan = v.spesialisasi;
					}

					disabled = 'disabled';
					if (v.id_rawat_inap !== null) {
						disabled = '';
					}

					let no = ((i + 1) + ((data.page - 1) * data.limit));
					html = '<tr>' +
						'<td class="center">' + no + '</td>' +
						'<td class="nowrap center">' + ((v.waktu !== null) ? datetimefmysql(v.waktu) : '') + '</td>' +
						'<td class="center">' + v.no_register + '</td>' +
						'<td class="center">' + v.no_rm + '</td>' +
						'<td>' + v.pasien + '</td>' +
						'<td>' + v.kelamin + '</td>' +
						'<td>' + v.dokter + '</td>' +
						'<td>' + v.jenis_layanan + ' ' + jenisLayanan + '</td>' +
						'<td>' + v.bangsal_tujuan + '</td>' +
						'<td class="center">' + status + '</td>' +
						'<td class="aksi right">' +
						btnKonfirmasi + btnBatal + btnEntriFormTransferIntra +
						'<button ' + disabled + ' type="button" class="btn btn-secondary btn-xs mr-1" onclick="showPrintOption(\'' + v.no_rm + '\', ' + v.id_rawat_inap + ')"><i class="fas fa-print mr-1"></i>Print</button>' +
						'</td>' +
						'</tr>';

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
		getListDataOrderRawatInap(page);
	}

	function resetAllData() {
		$('#dokter-ranap, .form-control').val('');
		$('#tanggal-awal, #tanggal-akhir').val('<?= date("d/m/Y") ?>');
		$('#s2id_dokter-ranap a .select2-chosen').html('Pilih Dokter');
		$('#status').val('request');
		resetDataPenjamin();
	}

	function resetDataPenjamin() {
		$("#penjamin, #no-polish-penjamin, #cara-bayar").val('');
	}

	function batalOrderRawatInap(id, page) {
		$('#id-order').val(id);
		$('#page-now').val(page);
		$('#modal-batal-order-rawat-inap').modal('show');
	}

	function simpanPembatalanOrderRawatInap() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_rawat_inap/api/order_rawat_inap/simpan_batal_order_rawat_inap") ?>',
			data: $('#form-batal-order-rawat-inap').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-batal-order-rawat-inap').modal('hide');
				getListDataOrderRawatInap($('#page-now').val());
				messageCustom('Pembatalan Order Rawat Inap Berhasil Dilakukan', 'Success');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Pembatalan Order Rawat Inap Gagal Dilakukan', 'Error');
			},
		});
	}

	function konfirmasiOrderRawatInap(no_rm, id_order) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_rawat_inap/api/order_rawat_inap/check_booking_status") ?>/no_rm/' + no_rm,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status_booking === 'booking') {
					konfirmasiBooking(id_order, data.data);
				} else {
					pilihTempatTidur(id_order);
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Data tidak ada', 'Error');
			},
		});
	}

	function konfirmasiBooking(id_order, data_booking) {
		$('#title-konfirmasi-bed').text('Konfirmasi Pemesanan Tempat Tidur');
		$('#id-order-ranap').val(id_order);
		$('#id-bed').val(data_booking.id_bed);
		$('#id-booking').val(data_booking.id);
		let bed = data_booking.bangsal + ' kelas ' + data_booking.kelas + ' ruang ' + data_booking.no_ruang + ' No. Bed ' + data_booking.no_bed;
		$('.bed-ranap-detail').html(bed);
		tipeBed = 'konfirm';
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_rawat_inap/api/order_rawat_inap/get_detail_order_rawat_inap") ?>/id/' + id_order,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#id-pendaftaran-ranap').val(data.id_pendaftaran);
				$('#id-layanan').val(data.id_spesialisasi);
				$('#kelamin').val(data.kelamin);
				$('#id-dokter').val(data.id_dokter);
				$('#cara-bayar').val(data.cara_bayar);
				$('#penjamin').val(data.id_penjamin);
				$('#no-polish-penjamin').val(data.no_polish);

				$('.nama-ranap-label').text(data.pasien);
				$('.no-rm-ranap-label').text(data.no_rm);

				let kelamin = '';
				if (data.kelamin === 'L') {
					kelamin = 'Laki-laki';
				} else if (data.kelamin === 'P') {
					kelamin = 'Perempuan';
				}

				$('.kelamin-ranap-label').text(kelamin);
				$('.layanan-ranap-label').text(data.layanan);
				$('.cara-bayar-ranap-label').text(data.cara_bayar + ' ' + ((data.penjamin !== null) ? data.penjamin : ''));
				$('.bangsal-tujuan-ranap-label').text(data.bangsal_tujuan);

				const isAdmin = '<?= $this->session->userdata("account_group") ?>' === 'Admin';

				getListBangsal(isAdmin ? null : data.id_bangsal_tujuan)

				$('#modal-konfirmasi-bed').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Data tidak ada', 'Error');
			},
		});
	}

	function pilihTempatTidur(id_order) {
		$('#title-form-bed').html('Konfirmasi Rawat Inap');
		$('#id-order-ranap, #id-pendaftaran-ranap, #kelas, #id-bed, #layanan-ranap').val('');
		$('#list-bangsal').empty();
		$('#label-bed').html('');
		$('#id-order-ranap').val(id_order);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_rawat_inap/api/order_rawat_inap/get_detail_order_rawat_inap") ?>/id/' + id_order,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#id-pendaftaran-ranap').val(data.id_pendaftaran);
				$('#id-layanan').val(data.id_spesialisasi);
				$('#kelamin').val(data.kelamin);
				$('#id-dokter').val(data.id_dokter);
				$('#cara-bayar').val(data.cara_bayar);
				$('#penjamin').val(data.id_penjamin);
				$('#no-polish-penjamin').val(data.no_polish);

				$('.nama-ranap-label').text(data.pasien);
				$('.no-rm-ranap-label').text(data.no_rm);

				let kelamin = '';
				if (data.kelamin === 'L') {
					kelamin = 'Laki-laki';
				} else if (data.kelamin === 'P') {
					kelamin = 'Perempuan';
				}

				$('.kelamin-ranap-label').text(kelamin);
				$('.layanan-ranap-label').text(data.layanan);
				$('.cara-bayar-ranap-label').text(data.cara_bayar + ' ' + ((data.penjamin !== null) ? data.penjamin : ''));
				$('.bangsal-tujuan-ranap-label').text(data.bangsal_tujuan);
				$('.hak-kelas-pasien').text(data.hak_kelas !== null ? data.hak_kelas : '-');

				const isAdmin = '<?= $this->session->userdata("account_group") ?>' === 'Admin';

				getListBangsal(isAdmin ? null : data.id_bangsal_tujuan)

				$('#modal-bed-ranap').modal('show');
				$('#bed-status-area').empty();
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Data tidak ada', 'Error');
			},
		});
	}

	function setBed(id, bed) {
		tipeBed = 'konfirm';
		$('#id-bed').val(id);
		$('#id-booking').val('');
		$('#modal-konfirmasi-bed').modal('show');
		$('.bed-ranap-detail').html(bed);
	}

	function setBedEdit(id_bed, bed) {
		bootbox.dialog({
			title: 'Edit Bed Pasien',
			message: 'Apakah anda yakin ingin memindahkan pasien ke ' + bed + ' ?',
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: 'btn-secondary',
					callback: function() {

					}
				},
				send: {
					label: '<i class="fas fa-paper-plane mr-1"></i>Pindahkan',
					className: 'btn-info',
					callback: function() {
						updateBedPasien($('#id-layanan-pendaftaran').val(), id_bed);
					}
				}
			}
		})
	}

	function sendRawatInap() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_rawat_inap/api/order_rawat_inap/send_to_rawat_inap") ?>',
			data: $('#form-rawat-inap').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-bed-ranap, #modal-konfirmasi-bed').modal('hide');
				if (data.status === true) {
					messageCustom(data.message, 'Success');
				} else {
					messageCustom(data.message, 'Error');
				}

				getListDataOrderRawatInap($('#page-now').val());
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageAddFailed();
			},
		});
	}

	function formEditBed(id_layanan_pendaftaran, no_rm, nama, kelamin, cara_bayar) {
		$('#title-form-bed').text('Edit Bed');
		$('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);
		$('.no-rm-ranap-label').text(no_rm);
		$('.nama-ranap-label').text(nama);
		$('.kelamin-ranap-label').text(kelamin);
		$('.layanan-ranap-label').text('');

		getListBangsal()

		$('#modal-bed-ranap').modal('show');
		tipeBed = 'edit';
	}

	function updateBedPasien(id_layanan_pendaftaran, id_bed) {
		let gender = $('.kelamin-ranap-label').text();
		let kelamin = 'L';
		if (gender === 'Perempuan') {
			kelamin = 'P';
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_rawat_inap/api/order_rawat_inap/update_bed_pasien") ?>',
			data: 'id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&id_bed=' + id_bed,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-bed-ranap').modal('hide');
				let status = 'Error';
				if (data.status === true) {
					status = 'Success';
					$('#bed-status-area').empty();
				}

				messageCustom(data.message, status);
				getListDataOrderRawatInap($('#page-now').val());
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Gagal memindahkan pasien', 'Error');
			},
		});
	}

	function entriFormTransferIntra(id_order_rawat_inap, id_layanan_pendaftaran) {
		swalAlert('warning', 'Halo Ardi', 'Good Luck')
	}
</script>