<script>
    $(function() {
        getListEtnis(1);

        $('#bt_tambah_etnis').click(function() {
            $('#modal_etnis').modal('show');
            $('#modal_etnis_label').html('Form Tambah Etnis');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListEtnis(1);
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
        $('input[type=text], .form-control, #id, #pencarian_etnis').val('');
        syams_validation_remove('.form-control');
    }

    function getListEtnis(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('etnis/api/etnis/get_list_etnis/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_etnis').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListEtnis(p - 1);
                    return false;
                }

                $('#etnis_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#etnis_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_etnis tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editEtnis(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteEtnis(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_etnis tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataEtnis() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('etnis/api/etnis/simpan_etnis/') ?>' + update,
            cache: false,
            data: $('#form_etnis').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['nama']) {
                        syams_validation('#nama', data.error_string['nama']);
                    }

                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListEtnis($('#page_now_etnis').val());
                    } else {
                        messageAddSuccess();
                        getListEtnis(1);
                    }

                    $('#modal_etnis').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editEtnis(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('etnis/api/etnis/get_etnis') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);

                $('#page_now_etnis').val(p);
                $('#modal_etnis').modal('show');
                $('#modal_etnis_label').html('Form Edit Etnis');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteEtnis(id, p) {
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
                            url: '<?= base_url('etnis/api/etnis/delete_etnis') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListEtnis(p);
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
        getListEtnis(p);
    }
</script>