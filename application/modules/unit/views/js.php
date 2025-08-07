<script>
    $(function() {
        getListUnit(1);

        $('#bt_tambah_unit').click(function() {
            $('#modal_unit').modal('show');
            $('#modal_unit_label').html('Form Tambah Unit');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListUnit(1);
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

        $('#instalasi').select2({
            theme: 'bootstrap4',
            placeholder: 'Silahkan pilih instalasi',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/instalasi_auto') ?>",
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
    });

    function resetAll() {
        $('input[type=text], .form-control, #id, #id_instalasi #pencarian_unit').val('');
        $('a .select2-chosen').html('Silahkan pilih instalasi');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getListUnit(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('unit/api/unit/get_list_unit/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_unit').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListInstalasi(p - 1);
                    return false;
                }

                $('#unit_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#unit_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_unit tbody').empty();

                $.each(data.data, function(i, v) {
                    let isfarmasi = '';
                    if (v.is_farmasi == 0) {
                        isfarmasi = 'Tidak';
                    } else {
                        isfarmasi = 'Ya';
                    }

                    let status = ''; let background = '';
                    if (v.status == 0) {
                        status = '<span class="label label-danger">Not Active</span>';
                        background = 'style="background-color:#ffb6b6;"';
                    } else {
                        status = '<span class="label label-success">Active</span>';
                        background = '';
                    }

                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr '+ background +'>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.kode + '</td>' +
                        '<td>' + v.acc + '</td>' +
                        '<td>' + isfarmasi + '</td>' +
                        '<td>' + ((v.instalasi) ? v.instalasi : '') + '</td>' +
                        '<td align="center">' + status + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editUnit(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteUnit(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_unit tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataUnit() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama unit');
            stop = true;
        }

        if ($('#kode').val() === '') {
            syams_validation('#kode', 'Silahkan masukkan kode unit ?');
            stop = true;
        }

        if ($('#acc').val() === '') {
            syams_validation('#acc', 'Silahkan masukkan akronim unit ?');
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
            url: '<?= base_url('unit/api/unit/simpan_unit/') ?>' + update,
            cache: false,
            data: $('#formunit').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListUnit($('#page_now_unit').val());
                } else {
                    getListUnit(1);
                    messageAddSuccess();
                }

                $('#modal_unit').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editUnit(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('unit/api/unit/get_unit') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#kode').val(data.data.kode);
                $('#acc').val(data.data.acc);
                $('#isfarmasi').val(data.data.is_farmasi);

                if (data.data.id_instalasi !== null) {
                    $('#instalasi').val(data.data.id_instalasi);
                    $('#s2id_instalasi a .select2-chosen').html(data.data.instalasi);
                } else {
                    $('#instalasi').val();
                    $('#s2id_instalasi a .select2-chosen').html('Silahkan pilih instalasi');
                }

                $('#page_now_unit').val(p);
                $('#modal_unit').modal('show');
                $('#modal_unit_label').html('Form Edit Unit');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteUnit(id, p) {
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
                            url: '<?= base_url('unit/api/unit/delete_unit') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListUnit(p);
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
        getListUnit(p);
    }
</script>