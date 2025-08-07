<script>
	$(function() {
		getListTarifKamarOperasi(1);

		// btn tambah data
		$('#btn-tambah-tarif-kamar-operasi').click(function() {
			resetAllTarifKamarOperasi();
            $("#modal-tarif-kamar-operasi").modal('show');
            $("#modal-tarif-kamar-operasi-label").html('Form Tambah Tarif Sewa Kamar Operasi');
		});

		// btn reload data
		$('#btn-reload-tarif-kamar-operasi').click(function() {
			resetAllTarifKamarOperasi();
            getListTarifKamarOperasi(1);
		});

		// onkeyup nominal
		$('#nominal-tarif-kamar-operasi').keyup(function() {
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

	function resetAllTarifKamarOperasi() {
		$('#id-tarif-kamar-operasi, .form-control, #pencarian-tarif-kamar-operasi').val('');
		$('#nominal-tarif-kamar-operasi').val(0);
		syams_validation_remove('.form-control, .select2-chosen');
	}

	function simpanDataTarifKamarOperasi() {
		let stop = false;
		if ($('#ruang-tarif-kamar-operasi').val() === '') {
			syams_validation('#ruang-tarif-kamar-operasi', 'Kolom ruang harus dipilih.');
			stop = true;
		}

		if ($('#nominal-tarif-kamar-operasi').val() === '') {
			syams_validation('#nominal-tarif-kamar-operasi', 'Kolom nominal harus diisi.');
			stop = true;
		}

		if (stop) {
			return false;
		}

		let update = '';
		if ($('#id-tarif-kamar-operasi').val() !== '') {
			update = '/id/' + $('#id-tarif-kamar-operasi').val();
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("tarif/api/tarif_kamar_operasi/simpan_tarif_kamar_operasi") ?>' + update,
			data: $('#form-tarif-kamar-operasi').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.error_string['ruang']) {
                        syams_validation('#ruang-tarif-kamar-operasi', data.error_string['ruang']);
                    }
                    if (data.error_string['nominal']) {
                        syams_validation('#nominal-tarif-kamar-operasi', data.error_string['nominal']);
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id-tarif-kamar-operasi').val() !== '') {
                        messageEditSuccess();
                        getListTarifKamarOperasi($('#page-now-tarif-kamar-operasi').val());
                    } else {
                        messageAddSuccess();
                        getListTarifKamarOperasi(1);
                    }

                    $('#modal-tarif-kamar-operasi').modal('hide');
                    resetAllTarifKamarOperasi();
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

	function getListTarifKamarOperasi(p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("tarif/api/tarif_kamar_operasi/get_list_tarif_kamar_operasi") ?>/page/' + p,
			data: 'pencarian=' + $('#pencarian-tarif-kamar-operasi').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
                    getListTarifKamarOperasi(p - 1);
                    return false;
                }

                $('#tarif-kamar-operasi-pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#tarif-kamar-operasi-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-tarif-kamar-operasi tbody').empty();
				
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
								<button type="button" class="btn btn-secondary btn-xs" onclick="editTarifKamarOperasi('${v.id}', '${data.page}')"><i class="fas fa-edit mr-1"></i>Edit</button>
								<button type="button" class="btn btn-secondary btn-xs" onclick="deleteTarifKamarOperasi('${v.id}', '${data.page}')"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
							</td>
						</tr>
					`;

					$('#table-tarif-kamar-operasi tbody').append(html);
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
		getListTarifKamarOperasi(page);
	}

	function editTarifKamarOperasi(id, page) {
		$('#page-now-tarif-kamar-operasi').val(page);
		$('#modal-tarif-kamar-operasi-label').html('Form Edit Tarif Sewa Kamar Operasi');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("tarif/api/tarif_kamar_operasi/get_tarif_kamar_operasi") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#id-tarif-kamar-operasi').val(data.data.id);
				$('#ruang-tarif-kamar-operasi').val(data.data.id_ruang_operasi);
				$('#kelas-tarif-kamar-operasi').val(data.data.id_kelas);
				$('#nominal-tarif-kamar-operasi').val(data.data.nominal);
				$('#keterangan-tarif-kamar-operasi').val(data.data.keterangan);

				$('#modal-tarif-kamar-operasi').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function deleteTarifKamarOperasi(id, page) {
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
                            url: '<?= base_url('tarif/api/tarif_kamar_operasi/delete_tarif_kamar_operasi') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListTarifKamarOperasi(page);
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