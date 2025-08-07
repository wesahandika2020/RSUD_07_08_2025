<script>
	$(function() {
		getListTarifKamarRanap(1);

		// btn tambah data
		$('#btn-tambah-tarif-kamar-ranap').click(function() {
			resetAllTarifKamarRanap();
            $("#modal-tarif-kamar-ranap").modal('show');
            $("#modal-tarif-kamar-ranap-label").html('Form Tambah Tarif Sewa Kamar Ranap');
		});

		// btn reload data
		$('#btn-reload-tarif-kamar-ranap').click(function() {
			resetAllTarifKamarRanap();
            getListTarifKamarRanap(1);
		});

		// onkeyup nominal
		$('#nominal-tarif-kamar-ranap').keyup(function() {
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
		
		$('#bangsal-auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/bangsal_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama+'<br/>'+data.kode;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });

	});

	function resetAllTarifKamarRanap() {
		$('#id-tarif-kamar-ranap, .form-control, #pencarian-tarif-kamar-ranap, #bangsal-auto').val('');
		$('#s2id_bangsal-auto a .select2-chosen').html('Pilih Bangsal');
		$('#nominal-tarif-kamar-ranap').val(0);
		syams_validation_remove('.form-control, .select2-chosen');
	}

	function simpanDataTarifKamarRanap() {
		let stop = false;
		if ($('#bangsal-auto').val() === '') {
			syams_validation('#bangsal-auto', 'Kolom bangsal harus dipilih.');
			stop = true;
		}

		if ($('#nominal-tarif-kamar-ranap').val() === '') {
			syams_validation('#nominal-tarif-kamar-ranap', 'Kolom nominal harus diisi.');
			stop = true;
		}

		if (stop) {
			return false;
		}

		let update = '';
		if ($('#id-tarif-kamar-ranap').val() !== '') {
			update = '/id/' + $('#id-tarif-kamar-ranap').val();
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("tarif/api/tarif_kamar_ranap/simpan_tarif_kamar_ranap") ?>' + update,
			data: $('#form-tarif-kamar-ranap').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.error_string['bangsal']) {
                        syams_validation('#bangsal-auto', data.error_string['bangsal']);
                    }
                    if (data.error_string['nominal']) {
                        syams_validation('#nominal-tarif-kamar-ranap', data.error_string['nominal']);
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id-tarif-kamar-ranap').val() !== '') {
                        messageEditSuccess();
                        getListTarifKamarRanap($('#page-now-tarif-kamar-ranap').val());
                    } else {
                        messageAddSuccess();
                        getListTarifKamarRanap(1);
                    }

                    $('#modal-tarif-kamar-ranap').modal('hide');
                    resetAllTarifKamarRanap();
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

	function getListTarifKamarRanap(p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("tarif/api/tarif_kamar_ranap/get_list_tarif_kamar_ranap") ?>/page/' + p,
			data: 'pencarian=' + $('#pencarian-tarif-kamar-ranap').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
                    getListTarifKamarRanap(p - 1);
                    return false;
                }

                $('#tarif-kamar-ranap-pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#tarif-kamar-ranap-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-tarif-kamar-ranap tbody').empty();
				
				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let html = /* html */ `
						<tr>
							<td>${no}</td>
							<td>${v.nama} (${v.kode})</td>
							<td class="center">${v.kelas}</td>
							<td class="right">${numberToCurrency(v.nominal)}</td>
							<td>${v.keterangan}</td>
							<td class="aksi right">
								<button type="button" class="btn btn-secondary btn-xs" onclick="editTarifKamarRanap('${v.id}', '${data.page}')"><i class="fas fa-edit mr-1"></i>Edit</button>
								<button type="button" class="btn btn-secondary btn-xs" onclick="deleteTarifKamarRanap('${v.id}', '${data.page}')"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
							</td>
						</tr>
					`;

					$('#table-tarif-kamar-ranap tbody').append(html);
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
		getListTarifKamarRanap(page);
	}

	function editTarifKamarRanap(id, page) {
		$('#page-now-tarif-kamar-ranap').val(page);
		$('#modal-tarif-kamar-ranap-label').html('Form Edit Tarif Sewa Kamar Ranap');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("tarif/api/tarif_kamar_ranap/get_tarif_kamar_ranap") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#id-tarif-kamar-ranap').val(data.data.id);
				$('#bangsal-auto').val(data.data.id_bangsal);
				$('#s2id_bangsal-auto a .select2-chosen').html(data.data.nama);
				$('#kelas-tarif-kamar-ranap').val(data.data.id_kelas);
				$('#nominal-tarif-kamar-ranap').val(data.data.nominal);
				$('#keterangan-tarif-kamar-ranap').val(data.data.keterangan);

				$('#modal-tarif-kamar-ranap').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function deleteTarifKamarRanap(id, page) {
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
                            url: '<?= base_url('tarif/api/tarif_kamar_ranap/delete_tarif_kamar_ranap') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListTarifKamarRanap(page);
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