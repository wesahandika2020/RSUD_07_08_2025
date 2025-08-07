<script>
    $(function() {
        getListMenu(1);

        $('#bt_tambah_menu').click(function() {
            resetAll();
            $('#modal_menu').modal('show');
            $('#modal_menu_label').html('Form Tambah Menu');
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListMenu(1);
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

        $('.select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#selectModule').select2({
            theme: 'bootstrap4',
            placeholder: 'Silahkan Pilih Module',
            ajax: {
                url: "<?= base_url('settings/api/module/module_auto') ?>",
                dataType: 'JSON',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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
    });

    function resetAll() {
        $('input[type=text], .form-control, textarea, #id, select2-input, #pencarian_menu').val('');
        $('a .select2-chosen').html('Silahkan pilih module');
        syams_validation_remove('.form-control, .select2-input, .custom-select');
    }

    function getListMenu(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('settings/api/menu/get_list_menu/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_menu').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListMenu(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 2));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_menu tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let status = '';
                    if (v.active == 1) {
                        status = '<span class="label label-success">Active</span>';
                    } else {
                        status = '<span class="label label-danger">Not Active</span>';
                    }

                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama_module + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.url + '</td>' +
                        '<td align="center">' + v.sort + '</td>' +
                        '<td align="center">' + status + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="edit_menu(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="delete_menu(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_menu tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        })
    }

    function konfirmasiSimpan() {
        let stop = false;
        if ($('#selectModule').val() === '') {
            syams_validation('#selectModule', 'Silahkan pilih module');
            stop = true;
        }

        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama menu');
            stop = true;
        }

        if ($('#url').val() === '') {
            syams_validation('#url', 'Silahkan masukkan url menu');
            stop = true;
        }

        if ($('#sort').val() === '') {
            syams_validation('#sort', 'Silahkan masukkan sort menu');
            stop = true;
        }

        if (stop) {
            return false;
        }

        bootbox.dialog({
            message: "Apakah anda ingin menyimpan data ini ?",
            title: "Konfirmasi Simpan",
            buttons: {
                close: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn btn-secondary',
                    callback: function() {

                    }
                },
                save: {
                    label: '<i class="fas fa-save"></i> Simpan Data',
                    className: 'btn btn-info',
                    callback: function() {
                        simpanData();
                    }
                }
            }
        });
    }

    function simpanData() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('settings/api/menu/simpan_menu/') ?>' + update,
            cache: false,
            data: $('#formmenu').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListMenu($('#page_now').val());
                } else {
                    getListMenu(1);
                    messageAddSuccess();
                }

                $('#modal_menu').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function delete_menu(id, p) {
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
                            url: '<?= base_url('settings/api/menu/delete_menu') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListMenu(p);
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

    function edit_menu(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('settings/api/menu/get_menu') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#selectModule').val(data.data.id_module);
                $('#s2id_selectModule a .select2-chosen').html(data.data.nama_module);
                $('#nama').val(data.data.nama);
                $('#url').val(data.data.url);
                $('#sort').val(data.data.sort);
                $('#status').val(data.data.active);

                $('#page_now').val(p);
                $('#modal_menu').modal('show');
                $('#modal_menu_label').html('Form Edit Menu');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function paging(p) {
        getListMenu(p);
    }
</script>