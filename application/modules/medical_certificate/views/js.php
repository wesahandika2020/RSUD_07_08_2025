<script>
	var dWidth = $(window).width();
    var dHeight= $(window).height();
    var x = screen.width/2 - dWidth/2;
    var y = screen.height/2 - dHeight/2;

	$(function() {
		getListMedicalCertificate(1);

		$('#btn_tambah').click(function() {
			resetData();
			$('#modal_medical_certificate').modal('show');
		});

		$('#btn_reload').click(function() {
			resetData();
		});

		$('#pasien_auto').select2({
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
				return data.id + ' - ' + data.nama;
			}
		});

		$('#tanggal_visite').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date()
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#tanggal_start_istirahat, #tanggal_end_istirahat,#tanggal_start_dirawat, #tanggal_end_dirawat,#tanggal_start_persalinan, #tanggal_end_persalinan').datepicker({
			format: 'dd/mm/yyyy',
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('.form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		})

		$('.form-control, .select2-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		})
	})

	function resetData() {
		getListMedicalCertificate(1);
		$('#form_medical_certificate')[0].reset();
		syams_validation_remove('.form-control');
		syams_validation_remove('.select2-input');
	}

	function getListMedicalCertificate(page) {
		$('#page_now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("medical_certificate/api/medical_certificate/get_list_medical_certificate") ?>/page/' + page,
			data: 'search=' + $('#search').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListMedicalCertificate(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table_medical_certificate tbody').empty();

				$.each(data.data, function(i, v) {
					var no = ((i + 1) + ((data.page - 1) * data.limit));
					var html = '<tr>'+
									'<td class="center">'+ no +'</td>'+
									'<td class="center">'+ v.no_rm +'</td>'+
									'<td>'+ v.pasien +'</td>'+
									'<td>'+ v.alamat +'</td>'+
									'<td class="center">'+ (v.tanggal_visite !== null ? datefmysql(v.tanggal_visite) : '') +'</td>'+
									'<td>'+ 0 +' Hari</td>'+
									'<td>'+ v.keterangan +'</td>'+
									'<td class="right nowrap">'+
										'<button type="button" class="btn btn-secondary btn-xs" onclick="cetakMedicalCertificate('+v.id+')"><i class="fas fa-fw fa-print mr-1"></i>Cetak Surat</button>'+
									'</td>'+
								'</tr>';
					$('#table_medical_certificate tbody').append(html);
				});

			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}
	
	function paging(page) {
		getListMedicalCertificate(page);
	}

	function konfirmasiSimpanMedicalCertificate() {
		let validasi = false;
		if ($('#pasien_auto').val() === '') {
			syams_validation('#pasien_auto', 'Pilih pasien terlebih dahulu.');
			return false;
		}

		if ($('#tanggal_visite').val() === '') {
			syams_validation('#tanggal_visite', 'Kolom tanggal visite wajib diisi.');
			validasi = true;
		}

		if ($('#tanggal_start').val() === '') {
			syams_validation('#tanggal_start', 'Kolom tanggal mulai wajib diisi.');
			validasi = true;
		}

		if ($('#tanggal_end').val() === '') {
			syams_validation('#tanggal_end', 'Kolom tanggal akhir wajib diisi.');
			validasi = true;
		}

		if (validasi) {
			return false;
		}

		// swal.fire({
		// 	title: 'Are you sure?',
		// 	text: "You won't be able to revert this!",
		// 	icon: 'warning',
		// 	showCancelButton: true,
		// 	confirmButtonText: 'Yes, delete it!',
		// 	cancelButtonText: 'No, cancel!',
		// 	reverseButtons: true
		// }).then((result) => {
		// 	if (result.value) {
				simpanMedicalCertificate();
		// 	}
		// })
	}

	function simpanMedicalCertificate() {
		const keteranganIstirahat = $('#keterangan_istirahat').is(':checked') ? $('#keterangan_istirahat').val() : '';
		const keteranganDirawat = $('#keterangan_dirawat').is(':checked') ? $('#keterangan_dirawat').val() : '';
		const keteranganPersalinan = $('#keterangan_persalinan').is(':checked') ? $('#keterangan_persalinan').val() : '';

		const keterangan = [
			keteranganIstirahat,
			keteranganDirawat,
			keteranganPersalinan
		];

		$.ajax({
			type: 'POST',
			url: '<?= base_url("medical_certificate/api/medical_certificate/simpan_medical_certificate") ?>',
			data: $('#form_medical_certificate').serialize() + '&keterangan=' + keterangan.filter(v => v).join(','),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status === false) {
					messageAddFailed();
				} else {
					resetData();
					messageAddSuccess();
					cetakMedicalCertificate(data.id);
					$('#modal_medical_certificate').modal('hide');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan, Gagal menyimpan data', 'Error');
			}
		});
	}

	function cetakMedicalCertificate(id) {
		window.open('<?= base_url("medical_certificate/printing_medical_certificate/") ?>' + id, 'Cetak Surat Keterangan Dokter', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}
</script>
