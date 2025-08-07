<script>
    $(function() {
        getListRekening(1);
        $('#page_now').val(1);

        // btn tambah
        $('#bt_tambah_data').click(function() {
            $('.edit_hide').show();
            $('#modal_rekening').modal('show');
            $('#modal_rekening_label').html('Form Tambah Rekening');
            resetAll();
        });

        // btn reload
        $('#bt_reload_data').click(function() {
            resetAll();
            getListRekening(1);
        });

        // btn search
        $('#bt_search_data').click(function() {
            $('#modal_search').modal('show');
            $('#modal_search_label').html('Form Parameter Pencarian');
        });

        // expand/collapse
        $('#bt_expand_all').click(function() {
            $('#table_data').treetable('expandAll');
        });

        $('#bt_collapse_all').click(function() {
            $('#table_data').treetable('collapseAll');
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // select2 rekening
        $('#rekening_auto').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/rekening_auto') ?>",
                dataType: 'JSON',
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
                var markup = data.kode + ' ' + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.kode + ' ' + data.nama;
            }
        });
    });

    function resetAll() {
        $('#id, #id_parent, .form-control, #pencarian_rekening').val('');
        $('#rekening_auto').html('Pilih Rekening');
        $('a .select2-chosen').html('');
        syams_validation_remove('.form-control');
    }

    function getListRekening(p, nodes) {
        $('#page_now').val(p);
        $('#jenis_view').val('tree');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekening/api/rekening/get_list_rekening') ?>/page/' + p,
            cache: false,
            data: 'pencarian=' + $('#pencarian').val(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListRekening(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table_data').treetable('destroy');
                $('#table_data tbody').empty();

                extractData(data, nodes);
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }

        });
    }

    function extractData(data, nodes) {
        let str = '';
        let branch = '';
        let parent = '';
        let root = '';

        $.each(data.data, function(i, v) {

            root = ((i + 1) + ((data.page - 1) * data.limit))
            branch = 'data-tt-id = "' + root + '"';
            parentNode = root;
            str = drawTable(v, branch, parent, data.page, 0, root, root);
            $('#table_data tbody').append(str);

            if (v.child !== null) {
                $.each(v.child, function(i2, v2) {
                    branch = 'data-tt-id="' + root + '-' + i2 + '"';
                    parent = 'data-tt-parent-id="' + root + '"';
                    parentNode = root + '-' + i2;
                    str = drawTable(v2, branch, parent, data.page, 20, root + '-' + i2, parentNode);
                    $('#table_data tbody').append(str);

                    if (v2.child !== null) {
                        $.each(v2.child, function(i3, v3) {

                            branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '"';
                            parent = 'data-tt-parent-id="' + root + '-' + i2 + '"';
                            parentNode = root + '-' + i2;
                            str = drawTable(v3, branch, parent, data.page, 40, root + '-' + i2 + '-' + i3, parentNode);
                            $('#table_data tbody').append(str);

                            if (v3.child !== null) {
                                $.each(v3.child, function(i4, v4) {
                                    i4++;
                                    branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
                                    parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '"';
                                    parentNode = root + '-' + i2 + '-' + i3;
                                    str = drawTable(v4, branch, parent, data.page, 60, root + '-' + i2 + '-' + i3 + '-' + i4, parentNode);
                                    $('#table_data tbody').append(str);
                                    if (v4.child !== null) {
                                        $.each(v4.child, function(i5, v5) {
                                            i5++;
                                            branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
                                            parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
                                            parentNode = root + '-' + i2 + '-' + i3 + '-' + i4;
                                            str = drawTable(v5, branch, parent, data.page, 80, root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5, parentNode);
                                            $('#table_data tbody').append(str);
                                            if (v5.child !== null) {
                                                $.each(v5.child, function(i6, v6) {
                                                    i6++;
                                                    branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '"';
                                                    parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
                                                    parentNode = root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5;
                                                    str = drawTable(v6, branch, parent, data.page, 100, root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6, parentNode);
                                                    $('#table_data tbody').append(str);
                                                    if (v6.child !== null) {
                                                        $.each(v6.child, function(i7, v7) {
                                                            i7++;
                                                            branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '"';
                                                            parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '"';
                                                            parentNode = root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6;
                                                            str = drawTable(v7, branch, parent, data.page, 120, root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7, parentNode);
                                                            $('#table_data tbody').append(str);
                                                            if (v7.child !== null) {
                                                                $.each(v7.child, function(i8, v8) {
                                                                    i8++;
                                                                    branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '-' + i8 + '"';
                                                                    parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '"';
                                                                    parentNode = root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7;
                                                                    str = drawTable(v8, branch, parent, data.page, 140, root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '-' + i8, parentNode);
                                                                    $('#table_data tbody').append(str);
                                                                    if (v8.child !== null) {
                                                                        $.each(v8.child, function(i9, v9) {
                                                                            i9++;
                                                                            branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '-' + i8 + '-' + i9 + '"';
                                                                            parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '-' + i8 + '"';
                                                                            parentNode = root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '-' + i8;
                                                                            str = drawTable(v9, branch, parent, data.page, 160, root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '-' + i8 + '-' + i9, parentNode);
                                                                            $('#table_data tbody').append(str);
                                                                        });
                                                                    }

                                                                });
                                                            }
                                                        });
                                                    };
                                                });
                                            };
                                        });
                                    };
                                });
                            };
                        });
                    };
                });
            };

            branch = '';
            parent = '';
        });

        $("#table_data").treetable({
            expandable: true
        });

        if (nodes !== undefined) {
            expandNode(nodes);
        }
    }

    function expandNode(nodes) {
        // 5-0-1
        let jumlah = (nodes.split("-").length - 1);
        let pangkal = nodes.split("-");
        let node = '';
        for (i = 0; i <= jumlah; i++) {
            node += ((i === 0) ? pangkal[i] : '-' + pangkal[i]);
            $("#table_data").treetable("expandNode", node);
        }
    }

    function drawTable(v, branch, parent, page, indent, nodeId, parentNode) {
        let status = 'Klik untuk menonaktifkan';
        let aktif = 0;
        let icon = 'fa-unlock';
        let bg = '';
        let button = '';

        if (v.is_active == 0) {
            status = 'Klik untuk mengaktifkan';
            aktif = 1;
            icon = 'fa-lock';
            bg = 'yellow';
            button = 'disabled';
        }

        let str = '<tr style="background:' + bg + '" ' + branch + ' ' + parent + '>' +
            '<td>' + v.kode + '</td>' +
            '<td><span style="margin-left: ' + indent + 'px;">' + v.nama + '</span></td>' +
            '<td align="right">' +
            '<button type="button" ' + button + ' class="btn btn-secondary btn-xs" title="Edit" onclick="editRekening(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i>  Edit</button> ' +
            '<button type="button" ' + button + ' class="btn btn-secondary btn-xs" title="Delete" onclick="deleteRekening(' + v.id + ', ' + page + ',\'' + parentNode + '\')"><i class="fas fa-trash"></i> Hapus</button> ' +
            '<button type="button" class="btn btn-secondary btn-xs" title="' + status + '" onclick="konfirmasiAktifasi(' + v.id + ', \'' + aktif + '\',\'' + nodeId + '\')"><i class="fas ' + icon + '"></i> </button>' +
            '</td>' +
            '</tr>';
        return str;
    }

    function getAllListRekening(p, id) {
        $('#page_now').val(p);
        $('#jenis_view').val('list');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekening/api/rekening/get_all_list_rekening') ?>/page/' + p + '/id/' + id,
            data: $('#form_search').serialize(),
            cache: false,
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getAllListRekening(p - 1);
                    return false;
                };

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 2));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table_data tbody').empty();

                $.each(data.data, function(i, v) {
                    str = '<tr>' +
                        '<td>' + v.kode + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn btn-secondary btn-xs" onclick="editRekening(' + v.id + ', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn btn-secondary btn-xs" onclick="deleteRekening(' + v.id + ', ' + data.page + ')"><i class="fas fa-trash"></i> Hapus</button>' +
                        '</td>' +
                        '</tr>';
                    $('#table_data tbody').append(str);
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

    function paging(p, tab) {
        if (tab === 1) {
            getListRekening(p);
        } else {
            getAllListRekening(p);
        }
    }

    function simpanDataRekening() {
        let stop = false;

        if ($('#kode').val() === '') {
            syams_validation('#kode', 'Kode tidak boleh kosong!');
            stop = true;
        }

        if ($('#rekening').val() === '') {
            syams_validation('#rekening', 'Nama rekening tidak boleh kosong!');
            stop = true;
        }

        if (stop) {
            return false;
        }

        let update = '';
        if ($('#id').val() !== '') {
            update = '/id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('rekening/api/rekening/simpan_rekening') ?>' + update,
            data: $('#form_rekening').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.error_string['kode']) {
                        syams_validation('#kode', data.error_string['kode']);
                    }

                    if (data.error_string['rekening']) {
                        syams_validation('#rekening', data.error_string['rekening']);
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListRekening($('#page_now').val());
                    } else {
                        messageAddSuccess();
                        getListRekening(1);
                    }

                    $('#modal_rekening').modal('hide');
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

    function deleteRekening(id, p, parent) {
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
                            url: '<?= base_url('rekening/api/rekening/delete_rekening') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListRekening(1, parent);
                            },
                            complete: function() {
                                hideLoader();
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

    function editRekening(id, p) {
        syams_validation_remove('.form-control');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekening/api/rekening/get_rekening') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#kode').val(data.data.kode);
                $('#rekening').val(data.data.nama);

                $('#rekening_auto').val(data.data.id_parent);
                $('#s2id_rekening_auto a .select2-chosen').html(data.data.kode_parent + ' ' + data.data.nama_parent);

                $('#page_now').val(p);
                $('#modal_rekening').modal('show');
                $('#modal_rekening_label').html('Form Edit Rekening');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function konfirmasiAktifasi(id, status, node) {
        bootbox.dialog({
            title: "Konfirmasi Aktif / Nonaktif",
            message: "Apakah anda yakin akan <b>" + ((status == 1) ? 'mengaktifkan' : 'menonaktifkan') + "</b> data ini?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary'
                },
                confirm: {
                    label: '<i class="fas fa-check-circle"></i> Ya',
                    className: 'btn-info',
                    callback: function() {
                        $.ajax({
                            type: 'GET',
                            url: '<?= base_url('rekening/api/rekening/aktifasi_rekening') ?>/id/' + id + '/status/' + status,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageEditSuccess();
                                getListRekening(1, node);
                            }
                        });
                    }
                }
            }
        });
    }
</script>