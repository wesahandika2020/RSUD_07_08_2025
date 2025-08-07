<script>
    $(function() {
        getListAccountGroup(1);

        $('#bt_tambah_group').click(function() {
            resetAll();
            $('#modal_group').modal('show');
            $('#modal_group_label').html('Form Tambah Account Group');
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListAccountGroup(1);
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
        $('input[type=text], .form-control, #id ,#id_privileges, #pencarian_group').val('');
        syams_validation_remove('.form-control');
    }

    function getListAccountGroup(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('configs/api/group/get_list_group/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_group').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListAccountGroup(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 2));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_group tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.name + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="settingPrivileges(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-cog"></i> Setting Privileges</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editGroup(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteGroup(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_group tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        })
    }

    function paging(page) {
        getListAccountGroup(page)
    }

    function simpanData() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama account group');
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
            url: '<?= base_url('configs/api/group/simpan_group/') ?>' + update,
            cache: false,
            data: $('#formgroup').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListAccountGroup($('#page_now').val());
                } else {
                    getListAccountGroup(1);
                    messageAddSuccess();
                }

                $('#modal_group').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editGroup(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('configs/api/group/get_group') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.name);

                $('#page_now').val(p);
                $('#modal_group').modal('show');
                $('#modal_group_label').html('Form Edit Account Group');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteGroup(id, p) {
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
                            url: '<?= base_url('configs/api/group/delete_group') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListAccountGroup(p);
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

    function checkAll() {
        $('.check').each(function() {
            $(this).attr('checked', 'checked');
        });
    }

    function unCheckAll() {
        $('.check').each(function() {
            $(this).removeAttr('checked', 'checked');
        });
    }

    function settingPrivileges(id) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('configs/api/group/setting_privileges') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(id);
                $('#table_privileges tbody').empty();

                let html = '';
                let modul = '';
                let no = 1;

                $.each(data, function(i, v) {
                    var check = '';
                    if (v.id_account_group !== null) {
                        check = 'checked="checked"';
                    }

                    html = '<tr>' +
                        '<td align="center">' + ((modul != v.module) ? no : '') + '</td>' +
                        '<td><b>' + ((modul !== v.module) ? v.module : '') + '</b></td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="center">' +
                        '<input type="checkbox" name="data[]" value="' + v.id + '" ' + check + ' class="check" />' +
                        '</td>' +
                        '</tr>';

                    $('#table_privileges tbody').append(html);

                    if (modul !== v.module) {
                        no++;
                        modul = v.module;
                    }
                });

                $('#modal_privileges').modal('show');
                $('#modal_privileges_label').html('Setting Privileges Menu Access');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function simpanPrivileges() {
        let id_account_group = $('#id').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('configs/api/group/simpan_privileges') ?>/id/' + id_account_group,
            cache: false,
            data: $('#formprivileges').serialize(),
            dataType: 'JSON',
            success: function(data) {
                $('#modal_privileges').modal('hide');
                messageEditSuccess();
                setInterval(() => {
                    location.reload();
                }, 1000);
            },
            error: function(e) {
                messageEditFailed();
                $('#modal_privileges').modal('hide');
            }
        })
    }
</script>