<script>
    $(function() {
        getListPabrik(1);

        $('#bt_tambah_pabrik').click(function() {
            $('#modal_pabrik').modal('show');
            $('#modal_pabrik_label').html('Form Tambah Pabrik');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListPabrik(1);
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
        $('input[type=text], .form-control, #id, #pencarian_pabrik').val('');
        syams_validation_remove('.form-control');
    }

    function getListPabrik(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pabrik/api/pabrik/get_list_pabrik/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_pabrik').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListPabrik(p - 1);
                    return false;
                }

                $('#pabrik_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#pabrik_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_pabrik tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.alamat + '</td>' +
                        '<td>' + v.email + '</td>' +
                        '<td>' + v.telp + '</td>' +
                        '<td align="right" class="aksi">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editPabrik(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deletePabrik(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_pabrik tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataPabrik() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('pabrik/api/pabrik/simpan_pabrik/') ?>' + update,
            cache: false,
            data: $('#form_pabrik').serialize(),
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
                        getListPabrik($('#page_now_pabrik').val());
                    } else {
                        messageAddSuccess();
                        getListPabrik(1);
                    }

                    $('#modal_pabrik').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editPabrik(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pabrik/api/pabrik/get_pabrik') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#alamat').val(data.data.alamat);
                $('#email').val(data.data.email);
                $('#telp').val(data.data.telp);

                $('#page_now_pabrik').val(p);
                $('#modal_pabrik').modal('show');
                $('#modal_pabrik_label').html('Form Edit Pabrik');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deletePabrik(id, p) {
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
                            url: '<?= base_url('pabrik/api/pabrik/delete_pabrik') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListPabrik(p);
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
        getListPabrik(p);
    }
</script>