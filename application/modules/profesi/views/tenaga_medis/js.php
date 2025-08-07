<script>
	$(function () {
		getListProfesiTenagaMedis(1);

		$('#bt_tambah_profesi_tenaga_medis').click(function() {
            $('#modal_profesi_tenaga_medis').modal('show');
            $('#modal_profesi_tenaga_medis_label').html('Form Tambah Profesi Tenaga Medis');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListProfesiTenagaMedis(1);
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
        $('input[type=text], .form-control, #id, #pencarian_profesi_tenaga_medis').val('');
        syams_validation_remove('.form-control');
    }

	function getListProfesiTenagaMedis(p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('profesi/api/profesi/get_list_profesi_tenaga_medis/page/') ?>' + p,
			data: 'keyword=' + $('#pencarian_profesi_tenaga_medis').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
                    getListProfesiTenagaMedis(p - 1);
                    return false;
                }

                $('#profesi_tenaga_medis_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#profesi_tenaga_medis_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_profesi_tenaga_medis tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editProfesiTenagaMedis(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteProfesiTenagaMedis(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_profesi_tenaga_medis tbody').append(html);
                });

                hideLoader();
			},
			error: function (e) {
				accessFailed(e.status);
				hideLoader();
			}
		});
	}

	function simpanDataProfesiTenagaMedis() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama profesi tenaga medis');
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
            url: '<?= base_url('profesi/api/profesi/simpan_profesi_tenaga_medis/') ?>' + update,
            cache: false,
            data: $('#formprofesitenagamedis').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListProfesiTenagaMedis($('#page_now_profesi_tenaga_medis').val());
                } else {
                    getListProfesiTenagaMedis(1);
                    messageAddSuccess();
                }

                $('#modal_profesi_tenaga_medis').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editProfesiTenagaMedis(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('profesi/api/profesi/get_profesi_tenaga_medis') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);

                $('#page_now_profesi_tenaga_medis').val(p);
                $('#modal_profesi_tenaga_medis').modal('show');
                $('#modal_profesi_tenaga_medis_label').html('Form Edit Profesi Tenaga Medis');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteProfesiTenagaMedis(id, p) {
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
                            url: '<?= base_url('profesi/api/profesi/delete_profesi_tenaga_medis') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListProfesiTenagaMedis(p);
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
    	getListProfesiTenagaMedis(p);
    }

</script>