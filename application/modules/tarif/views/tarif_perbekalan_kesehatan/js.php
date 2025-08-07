<script>
	$(function() {
		getListTarifPKRT(1);

		// btn tambah data
		$('#btn-tambah-tarif-pkrt').click(function() {
			resetAllTarifPKRT();
			$("#modal-tarif-pkrt").modal('show');
			$("#modal-tarif-pkrt-label").html('Form Tambah Tarif Perbekalan Kesehatan');
		});

		// btn reload data
		$('#btn-reload-tarif-pkrt').click(function() {
			resetAllTarifPKRT();
			getListTarifPKRT(1);
		});

		// onkeyup nominal
		$('#nominal-tarif-pkrt').keyup(function() {
			return ToCurrency(this);
		});

		$('.form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		$('.select2-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});
	});

	function resetAllTarifPKRT() {
		$('#id-tarif-pkrt, .form-control, #pencarian-tarif-pkrt').val('');
		$('#kelas-tarif-pkrt').val(1);
		$('#nominal-tarif-pkrt').val(0);
		syams_validation_remove('.form-control, .select2-chosen');
	}

	function simpanDataTarifPKRT() {
		let stop = false;
		if ($('#barang-tarif-pkrt').val() === '') {
			syams_validation('#barang-tarif-pkrt', 'Kolom barang harus dipilih.');
			stop = true;
		}

		if ($('#nominal-tarif-pkrt').val() === '') {
			syams_validation('#nominal-tarif-pkrt', 'Kolom nominal harus diisi.');
			stop = true;
		}

		if (stop) {
			return false;
		}

		let update = '';
		if ($('#id-tarif-pkrt').val() !== '') {
			update = '/id/' + $('#id-tarif-pkrt').val();
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("tarif/api/tarif_perbekalan_kesehatan/simpan_tarif_pkrt") ?>' + update,
			data: $('#form-tarif-pkrt').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status == false) {
					$('input[name=csrf_syam]').val(data.token);
					if (data.error_string['barang']) {
						syams_validation('#barang-tarif-pkrt', data.error_string['barang']);
					}
					if (data.error_string['nominal']) {
						syams_validation('#nominal-tarif-pkrt', data.error_string['nominal']);
					}
				} else {
					$('input[name=csrf_syam]').val(data.token);
					if ($('#id-tarif-pkrt').val() !== '') {
						messageEditSuccess();
						getListTarifPKRT($('#page-now-tarif-pkrt').val());
					} else {
						messageAddSuccess();
						getListTarifPKRT(1);
					}

					$('#modal-tarif-pkrt').modal('hide');
					resetAllTarifPKRT();
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

	function getListTarifPKRT(p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("tarif/api/tarif_perbekalan_kesehatan/get_list_tarif_pkrt") ?>/page/' + p,
			data: 'pencarian=' + $('#pencarian-tarif-pkrt').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListTarifPKRT(p - 1);
					return false;
				}

				$('#tarif-pkrt-pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#tarif-pkrt-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-tarif-pkrt tbody').empty();

				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let html = /* html */ `
						<tr>
							<td>${no}</td>
							<td>${v.nama}</td>
							<td class="center">${v.kelas}</td>
							<td class="right">${numberToCurrency(v.nominal)}</td>
							<td>${v.keterangan}</td>
							<td class="aksi right">
								<button type="button" class="btn btn-secondary btn-xs" onclick="editTarifPKRT('${v.id}', '${data.page}')"><i class="fas fa-edit mr-1"></i>Edit</button>
								<button type="button" class="btn btn-secondary btn-xs" onclick="deleteTarifPKRT('${v.id}', '${data.page}')"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
							</td>
						</tr>
					`;

					$('#table-tarif-pkrt tbody').append(html);
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
		getListTarifPKRT(page);
	}

	function editTarifPKRT(id, page) {
		$('#page-now-tarif-pkrt').val(page);
		$('#modal-tarif-pkrt-label').html('Form Edit Tarif Perbekalan Kesehatan');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("tarif/api/tarif_perbekalan_kesehatan/get_tarif_pkrt") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#id-tarif-pkrt').val(data.data.id);
				$('#barang-tarif-pkrt').val(data.data.id_perbekalan_kesehatan);
				$('#kelas-tarif-pkrt').val(data.data.id_kelas);
				$('#nominal-tarif-pkrt').val(numberToCurrency(data.data.nominal));
				$('#keterangan-tarif-pkrt').val(data.data.keterangan);

				$('#modal-tarif-pkrt').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function deleteTarifPKRT(id, page) {
		bootbox.dialog({
			title: "Konfirmasi Hapus",
			message: "Apakah anda yakin ingin menghapus data ini ?",
			buttons: {
				cancel: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: 'btn-secondary'
				},
				confirm: {
					label: '<i class="fas fa-check-circle mr-1"></i>Hapus',
					className: 'btn-danger',
					callback: function() {
						$.ajax({
							type: 'DELETE',
							url: '<?= base_url('tarif/api/tarif_perbekalan_kesehatan/delete_tarif_pkrt') ?>/id/' + id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								messageDeleteSuccess();
								getListTarifPKRT(page);
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	}
</script>