<script>
    $(function() {
        getListSatuan(1);

        $('#bt_tambah_satuan').click(function() {
            resetAll();
            $('#view_on').val('Inventory');
            $('#modal_satuan').modal('show');
            $('#modal_satuan_label').html('Form Tambah Satuan');
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListSatuan(1);
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
        $('input[type=text], .form-control, #id, #pencarian_satuan').val('');
        syams_validation_remove('.form-control');
    }

    function getListSatuan(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('satuan/api/satuan/get_list_satuan/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_satuan').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListSatuan(p - 1);
                    return false;
                }

                $('#satuan_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#satuan_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_satuan tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.view_on + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editSatuan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteSatuan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_satuan tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataSatuan() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('satuan/api/satuan/simpan_satuan/') ?>' + update,
            cache: false,
            data: $('#form_satuan').serialize(),
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
                        getListSatuan($('#page_now_satuan').val());
                    } else {
                        messageAddSuccess();
                        getListSatuan(1);
                    }

                    $('#modal_satuan').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editSatuan(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('satuan/api/satuan/get_satuan') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#view_on').val(data.data.view_on);

                $('#page_now_satuan').val(p);
                $('#modal_satuan').modal('show');
                $('#modal_satuan_label').html('Form Edit Satuan');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteSatuan(id, p) {
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
                            url: '<?= base_url('satuan/api/satuan/delete_satuan') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListSatuan(p);
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
        getListSatuan(p);
    }
</script>