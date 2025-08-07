<script>
    $(function() {
        getListSmf(1);

        $('#bt_tambah_smf').click(function() {
            $('#modal_smf').modal('show');
            $('#modal_smf_label').html('Form Tamba SMF');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListSmf(1);
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
        $('input[type=text], .form-control, #id, #pencarian_smf').val('');
        syams_validation_remove('.form-control');
    }

    function getListSmf(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('smf/api/smf/get_list_smf/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_smf').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListSmf(p - 1);
                    return false;
                }

                $('#smf_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#smf_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_smf tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editSmf(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteSmf(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_smf tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataSmf() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama smf');
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
            url: '<?= base_url('smf/api/smf/simpan_smf/') ?>' + update,
            cache: false,
            data: $('#form_smf').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListSmf($('#page_now_smf').val());
                } else {
                    getListSmf(1);
                    messageAddSuccess();
                }

                $('#modal_smf').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editSmf(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('smf/api/smf/get_smf') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);

                $('#page_now_smf').val(p);
                $('#modal_smf').modal('show');
                $('#modal_smf_label').html('Form Edit SMF');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteSmf(id, p) {
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
                            url: '<?= base_url('smf/api/smf/delete_smf') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListSmf(p);
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
        getListSmf(p);
    }
</script>