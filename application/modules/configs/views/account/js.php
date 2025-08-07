<script>
    $(function() {
        getListAccount(1);

        //btn tambah
        $('#bt_tambah_account').click(function() {
            resetAll();
            $('.password').show();
            $('#key').val('12345');
            $('#modal_account').modal('show');
            $('#account').attr('readonly', false);
            $('#modal_account_label').html('Form Tambah Account');
        });

        //btn reload
        $('#bt_reload_data').click(function() {
            getListAccount(1);
            resetAll();
        });

        $('#account').keyup(function() {
            similarityCheck($(this).val());
        });

        $('#pegawai_auto').select2({
            ajax: {
                url: '<?= base_url('masterdata/api/masterdata_auto/pegawai_account_auto') ?>',
                dataType: 'JSON',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        param: 'not_in'
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.nama + '</b><br/><i>' + ((data.jabatan !== null) ? data.jabatan : '') + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama + ' ' + ((data.jabatan !== null) ? ' - ' + data.jabatan : '');
            }
        });

        $('#account_group_auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/account_group_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = data.name;
                return markup;
            },
            formatSelection: function(data) {
                return data.name;
            }
        });

        $('#unit_auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control, #pegawai_auto').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });
    });

    function resetAll() {
        $('#id, .form-control, .select2-input, #pencarian_account').val('');
        $('.select2-chosen').html('');
        syams_validation_remove('.form-control');
        syams_validation_remove('.select2-input');
    }

    function similarityCheck(account) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("configs/api/account/account_similarity_check") ?>',
            data: 'account=' + account,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.similar) {
                    syams_validation('#account', 'Account sudah dipakai, silahkan cari account lain');
                    $('#bt_simpan').attr('disabled', 'disabled');
                } else {
                    syams_validation_remove('#account');
                    $('#bt_simpan').removeAttr('disabled');
                }
            },
            error: function(e) {
                messageCustom('error', 'Error', 'Sistem Error');
            }
        });
    }


    function simpanData() {
        let update = '';
        if ($('#id').val() !== '') {
            update = '/id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('configs/api/account/simpan_account') ?>' + update,
            data: $('#formaccount').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['pegawai']) {
                        syams_validation('#pegawai_auto', data.error_string['pegawai']);
                    }

                    if (data.error_string['account']) {
                        syams_validation('#account', data.error_string['account']);
                    }

                    if (data.error_string['account_group']) {
                        syams_validation('#account_group_auto', data.error_string['account_group']);
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListAccount($('#page_now').val());
                    } else {
                        messageAddSuccess();
                        getListAccount(1);
                    }

                    $('#modal_account').modal('hide');
                    resetAll();
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }

        });
    }

    function getListAccount(p) {
        $('#page_now').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('configs/api/account/get_list_account') ?>/page/' + p,
            data: 'keyword=' + $('#pencarian_account').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKecamatan(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 3));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_account tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let status = `<div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="${v.id}" onclick="updateStatus(${v.id}, ${v.is_active})" ${(v.is_active == 1 ? 'checked' : '')}>
                                    <label class="custom-control-label" for="${v.id}">${(v.is_active == 1 ? '<h5><span class="label label-success">Aktif</span></h5>' : '<h5><span class="label label-danger">Tidak Aktif</span></h5>')}</label>
                                </div>`;

                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.account + '</td>' +
                        '<td>' + v.id + '</td>' +
                        '<td>' + v.jabatan + '</td>' +
                        '<td>' + v.account_group + '</td>' +
                        '<td>' + v.unit + '</td>' +
                        '<td>' + status + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="resetKey(\'' + v.id + '\', \'' + v.nama + '\')"><i class="fas fa-exchange-alt"></i> Reset Password</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editAccount(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteAccount(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_account tbody').append(html);
                });
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function paging(page) {
        getListAccount(page);
    }

    function editAccount(id, p) {
        $('#page_now').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('configs/api/account/get_account') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id, #pegawai_auto').val(data.data.id);
                $('#unit_auto').val(data.data.id_unit);
                $('#account_group_auto').val(data.data.id_account_group);
                $('#s2id_pegawai_auto a .select2-chosen').html(data.data.nama);
                $('#s2id_unit_auto a .select2-chosen').html(data.data.unit);
                $('#s2id_account_group_auto a .select2-chosen').html(data.data.account_group);
                $('#account').val(data.data.account);
                $('#account').attr('readonly', true);

                $('.password').hide();
                $('#modal_account').modal('show');
                $('#modal_account_label').html('Form Edit Account');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteAccount(id, p) {
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
                            url: '<?= base_url('configs/api/account/delete_account') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListAccount(p);
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

    function resetKey(id, nama) {
        bootbox.dialog({
            title: "Reset Password",
            message: "Password akan direset menjadi <b>12345</b>,<br>Anda yakit akan mereset password atas nama : <b>" + nama + "</b> ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary'
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Confirm',
                    className: 'btn-danger',
                    callback: function() {
                        $.ajax({
                            type: 'GET',
                            url: '<?= base_url('configs/api/account/reset_key') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageCustom('Berhasil reset password', 'Success');
                            },
                            error: function(e) {
                                messageCustom('Gagal reset password', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function updateStatus(id, status) 
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('configs/api/account/update_status') ?>',
            data: 'id=' + id + '&status=' + status,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status !== false) {
                    getListAccount($('#page_now').val());
                    messageCustom(data.message, 'Success');
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            error: function(e) {
                messageCustom('error', 'Error', 'Sistem Error');
            }
        })
    }
</script>