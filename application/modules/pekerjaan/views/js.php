<script>
	$(function () {
		getListPekerjaan(1);

		$('#bt_tambah_pekerjaan').click(function() {
            $('#modal_pekerjaan').modal('show');
            $('#modal_pekerjaan_label').html('Form Tambah Pekerjaan');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListPekerjaan(1);
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
	});

	function resetAll() {
        $('input[type=text], .form-control, #id, #pencarian_pekerjaan').val('');
        syams_validation_remove('.form-control');
    }

	function getListPekerjaan(p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('pekerjaan/api/pekerjaan/get_list_pekerjaan/page/') ?>' + p,
			data: 'keyword=' + $('#pencarian_pekerjaan').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
                    getListPekerjaan(p - 1);
                    return false;
                }

                $('#pekerjaan_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#pekerjaan_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_pekerjaan tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editPekerjaan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deletePekerjaan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_pekerjaan tbody').append(html);
                });

                hideLoader();
			},
			error: function (e) {
				accessFailed(e.status);
				hideLoader();
			}
		});
	}

	function simpanDataPekerjaan() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama pekerjaan');
            stop = true;
        }

        if (stop) {
            return false;
        }

        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('pekerjaan/api/pekerjaan/simpan_pekerjaan/') ?>' + update,
            cache: false,
            data: $('#form_pekerjaan').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListPekerjaan($('#page_now_pekerjaan').val());
                } else {
                    getListPekerjaan(1);
                    messageAddSuccess();
                }

                $('#modal_pekerjaan').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editPekerjaan(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pekerjaan/api/pekerjaan/get_pekerjaan') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);

                $('#page_now_pekerjaan').val(p);
                $('#modal_pekerjaan').modal('show');
                $('#modal_pekerjaan_label').html('Form Edit Pekerjaan');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deletePekerjaan(id, p) {
        bootbox.dialog({
            title: "Konfirmasi Hapus",
            message: "Apakah anda yakin ingin menghapus data ini ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary'
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Hapus',
                    className: 'btn-danger',
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url('pekerjaan/api/pekerjaan/delete_pekerjaan') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListPekerjaan(p);
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

    function paging(p) {
    	getListPekerjaan(p);
    }

</script>