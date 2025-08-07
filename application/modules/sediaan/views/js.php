<script>
    $(function() {
        getListSediaan(1);

        $('#bt_tambah_sediaan').click(function() {
            $('#modal_sediaan').modal('show');
            $('#modal_sediaan_label').html('Form Tambah Sediaan');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListSediaan(1);
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

        $('#nama').keydown(function(e) {
            if (e.keyCode === 13) {
                simpanDataSediaan();
            }
        });
    });

    function resetAll() {
        $('input[type=text], .form-control, #id, #pencarian_sediaan').val('');
        syams_validation_remove('.form-control');
    }

    function getListSediaan(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('sediaan/api/sediaan/get_list_sediaan/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_sediaan').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListSediaan(p - 1);
                    return false;
                }

                $('#sediaan_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#sediaan_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_sediaan tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editSediaan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteSediaan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_sediaan tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataSediaan() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('sediaan/api/sediaan/simpan_sediaan/') ?>' + update,
            cache: false,
            data: $('#form_sediaan').serialize(),
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
                        getListSediaan($('#page_now_sediaan').val());
                    } else {
                        messageAddSuccess();
                        getListSediaan(1);
                    }

                    $('#nama').focus();
                    // $('#modal_sediaan').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editSediaan(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('sediaan/api/sediaan/get_sediaan') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);

                $('#page_now_sediaan').val(p);
                $('#modal_sediaan').modal('show');
                $('#modal_sediaan_label').html('Form Edit Sediaan');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteSediaan(id, p) {
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
                            url: '<?= base_url('sediaan/api/sediaan/delete_sediaan') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListSediaan(p);
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
        getListSediaan(p);
    }
</script>