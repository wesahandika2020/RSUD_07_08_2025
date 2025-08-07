<script>
	$(function () {
		getListPendidikan(1);

		$('#bt_tambah_pendidikan').click(function() {
            $('#modal_pendidikan').modal('show');
            $('#modal_pendidikan_label').html('Form Tambah Pendidikan');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListPendidikan(1);
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
        $('input[type=text], .form-control, #id, #pencarian_pendidikan').val('');
        syams_validation_remove('.form-control');
    }

	function getListPendidikan(p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('pendidikan/api/pendidikan/get_list_pendidikan/page/') ?>' + p,
			data: 'keyword=' + $('#pencarian_pendidikan').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
                    getListPendidikan(p - 1);
                    return false;
                }

                $('#pendidikan_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#pendidikan_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_pendidikan tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editPendidikan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deletePendidikan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_pendidikan tbody').append(html);
                });

                hideLoader();
			},
			error: function (e) {
				accessFailed(e.status);
				hideLoader();
			}
		});
	}

	function simpanDataPendidikan() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama pendidikan');
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
            url: '<?= base_url('pendidikan/api/pendidikan/simpan_pendidikan/') ?>' + update,
            cache: false,
            data: $('#form_pendidikan').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListPendidikan($('#page_now_pendidikan').val());
                } else {
                    getListPendidikan(1);
                    messageAddSuccess();
                }

                $('#modal_pendidikan').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editPendidikan(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendidikan/api/pendidikan/get_pendidikan') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);

                $('#page_now_pendidikan').val(p);
                $('#modal_pendidikan').modal('show');
                $('#modal_pendidikan_label').html('Form Edit Pendidikan');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deletePendidikan(id, p) {
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
                            url: '<?= base_url('pendidikan/api/pendidikan/delete_pendidikan') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListPendidikan(p);
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
    	getListPendidikan(p);
    }

</script>