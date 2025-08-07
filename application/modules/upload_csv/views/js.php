<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	$(function() {
		getListDataTarifINACBG(1)
		$('#simpan-upload').click(function() {
			simpanUploadFile();
		})

		$('#table-data-tarif-inacbg').show()
		$('#table-data-tarif-pending').hide()

		$('#jenis-data-search').change(function() {
			getListDataTarifINACBG($('#page-now').val())
			if ($('#jenis-data-search').val() === '01') {
				$('#table-data-tarif-inacbg').show()
				$('#table-data-tarif-pending').hide()
				// getListDataTarifINACBG($('#page-now').val())
			}
			if ($('#jenis-data-search').val() === '02') {
				$('#table-data-tarif-pending').show()
				$('#table-data-tarif-inacbg').hide()
				// console.log('data-pending-inacbg');
			}
		})

		$('#csv-file').change(function() {
			if ($('#csv-file').val() !== '') {
				syams_validation_remove('#csv-file');
			}
		})


	})

	function getListDataTarifINACBG(page) {
		$('#page-now').val(page)

		if ($('#jenis-data-search').val() === '01') {
			$('#table-data-tarif-inacbg').show()
			$('#table-data-tarif-pending').hide()
		}
		if ($('#jenis-data-search').val() === '02') {
			$('#table-data-tarif-pending').show()
			$('#table-data-tarif-inacbg').hide()
		}

		$.ajax({
			type: 'GET',
			url: '<?= base_url('upload_csv/api/upload_csv/get_list_tarif_inacbg') ?>/page/' + page + '/jenis_data_search/' + $('#jenis-data-search').val(),
			data: $('#form-upload-csv').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDataTarifINACBG(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-data-tarif-inacbg tbody').empty();
				$('#table-data-tarif-pending tbody').empty();

				dataTableTarifINACBG(data)
				dataTableTarifPending(data)

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function dataTableTarifINACBG(data) {
		$.each(data.data, function(i, v) {

			let html = /* html */ `
				<tr>
					<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
					<td class="center">${v.discharge_date}</td>
					<td class="center">${(v.inacbg)}</td>
					<td>${v.deskripsi_inacbg}</td>
					<td>${v.sep}</td>
					<td>${v.nama_pasien}</td>
					<td>${v.dpjp}</td>
					<td class="right">${(money_format(v.tarif_rs))}</td>
					<td class="right">${(money_format(v.total_tarif))}</td>
				</tr>
			`;

			$('#table-data-tarif-inacbg tbody').append(html);
		})
	}

	function dataTableTarifPending(data) {
		$.each(data.data, function(i, v) {

			let html = /* html */ `
				<tr>
					<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
					<td class="center">${(v.tgl_sep)}</td>
					<td class="center">${(v.tgl_pulang)}</td>
					<td>${v.sep}</td>
					<td>${v.nama_peserta}</td>
					<td class="center">${(v.jenis_layanan)}</td>
					<td class="left">${(v.jenis_pending)}</td>
					<td>${v.keterangan_pending}</td>
					<td class="right">${(money_format(v.tarif_pengajuan))}</td>
				</tr>
			`;

			$('#table-data-tarif-pending tbody').append(html);
		})
	}

	function simpanUploadFile() {
		if ($('#csv-file').val() === '') {
			syams_validation('#csv-file', 'File belum diisi.');
			return false;
		} else {
			syams_validation_remove('#csv-file');
		}

		var fileInput = $('#csv-file');
		var fileImage = fileInput.prop('files')[0];
		var formInputData = $('#form-upload-csv').serialize();

		bootbox.dialog({
			message: 'Anda yakin akan menyimpan Data dari CSV?',
			title: 'Simpan Upload Data CSV',
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-check-circle"></i> Simpan',
					className: "btn-info",
					callback: function() {
						// Proses upload file ke server
						var formData = new FormData();
						formData.append('csv_file', fileImage);

						// Menambahkan data form input ke formData
						$.each(formInputData.split('&'), function(index, field) {
							var [key, value] = field.split('=');
							formData.append(key, decodeURIComponent(value.replace(/\+/g, ' ')));
						});

						$.ajax({
							type: 'POST',
							url: '<?= base_url('upload_csv/api/upload_csv/upload_file_tarif_ekalim/') ?>',
							data: formData,
							cache: false,
							contentType: false,
							processData: false,
							dataType: 'JSON',
							beforeSend: function() {
								showLoader();
							},
							success: function(data) {
								if (data.metadata.code !== 200) {
									swalAlert('warning', data.metadata.code, data.metadata.message);
								} else {
									// messageEditSuccess();
									$('#csv-file').val('');
									swalAlert('success', data.metadata.code, data.metadata.message);
									$('#jenis-data-search').val($('#jenis-data').val())
									getListDataTarifINACBG($('#page-now').val())
								}
							},
							complete: function() {
								hideLoader();
							},
							error: function(e) {
								messageEditFailed();
							}
						});
					}
				}
			}
		});
	}


	function paging(page) {
		getListDataTarifINACBG(page)
	}
</script>