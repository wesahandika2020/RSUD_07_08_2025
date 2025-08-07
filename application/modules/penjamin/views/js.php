<script>
    $(function() {
        getListPenjamin(1);
        // btn tambah
        $('#bt_tambah_penjamin').click(function() {
            $('#modal_penjamin').modal('show');
            $('#modal_penjamin_label').html('Form Tambah Penjamin');
            restAllPenjamin();
        });

        // btn reload data
        $('#bt_reload_data').click(function() {
            getListPenjamin(1);
            restAllPenjamin();
        });

        // expand/collapse
        $('#bt_expand_all').click(function() {
            $('#table_penjamin').treetable('expandAll');
        });

        $('#bt_collapse_all').click(function() {
            $('#table_penjamin').treetable('collapseAll');
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

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
                $('#kode_rekening').val(data.kode);
                return data.kode;
            }
        });
    });

    function restAllPenjamin() {
        $('#id, #id_parent, .form-control, #pencarian_penjamin, #kode_rekening').val('');
        $('#rekening_auto').html('Pilih Penjamin');
        $('.select2-chosen').html('');
        syams_validation_remove('.form-control');
    }

    function getListPenjamin(p) {
        $('#page_now').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('penjamin/api/penjamin/get_list_penjamin') ?>/page/' + p,
            cache: false,
            data: 'search=' + $('#pencarian_penjamin').val(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListPenjamin(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table_penjamin').treetable('destroy');
                $('#table_penjamin tbody').empty();

                extractData(data);
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function extractData(data) {
        let html = '';
        let branch = '';
        let parent = '';
        let root = '';
        $.each(data.data, function(i, v) {
            root = ((i + 1) + ((data.page - 1) * data.limit));
            branch = 'data-tt-id="' + root + '"';
            html = drawTable(v, branch, parent, data.page, 0);
            $('#table_penjamin tbody').append(html);

            if (v.child !== null) {
                $.each(v.child, function(i2, v2) {
                    branch = 'data-tt-id="' + root + '-' + i2 + '"';
                    parent = 'data-tt-parent-id="' + root + '"';
                    html = drawTable(v2, branch, parent, data.page, 20);
                    $('#table_penjamin tbody').append(html);

                    if (v2.child !== null) {
                        $.each(v2.child, function(i3, v3) {

                            branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '"';
                            parent = 'data-tt-parent-id="' + root + '-' + i2 + '"';
                            html = drawTable(v3, branch, parent, data.page, 40);
                            $('#table_penjamin tbody').append(html);
                        });
                    }
                });
            }

            branch = '';
            parent = '';
        });

        $('#table_penjamin').treetable({
            expandable: true
        });
    }

    function drawTable(v, branch, parent, page, indent) {
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        let btn = '';
        if (parent !== '') {
            btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="editPenjamin(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                '<button type="button" class="btn btn-secondary btn-xs" onclick="deletePenjamin(' + v.id + ', ' + page + ')"><i class="fas fa-trash"></i> Hapus</button>';
        }

        let kode_rekening = '';
        if (typeof v.kode_rekening !== 'undefined') {
            kode_rekening = v.kode_rekening;
        }

        let status = ``;
        if (accountGroup == 'Admin') {
            if (parent !== '') {
                status = `<div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="${v.id}" onclick="updateStatus(${v.id}, ${v.is_active}, ${v.id_jenis_penjamin})" ${(v.is_active == 1 ? 'checked' : '')}>
                            <label class="custom-control-label" for="${v.id}">${(v.is_active == 1 ? '<h5><span class="label label-success" style="padding-right: 10px;padding-left: 10px;">Aktif</span></h5>' : '<h5><span class="label label-danger" style="padding-right: 10px;padding-left: 10px;">Tidak Aktif</span></h5>')}</label>
                          </div>`;
            }
        } else {
            if (parent !== '') {
                status = `<div>
                            <label>${(v.is_active == 1 ? '<h5><span class="label label-success" style="padding-right: 10px;padding-left: 10px;">Aktif</span></h5>' : '<h5><span class="label label-danger" style="padding-right: 10px;padding-left: 10px;">Tidak Aktif</span></h5>')}</label>
                          </div>`;
            }
        }

        let html = '<tr ' + branch + '  ' + parent + '>' +
            '<td>' + v.kode + '</td>' +
            '<td><span style="margin-left: ' + indent + 'px;">' + v.nama + '</span></td>' +
            '<td align="right">' + ((v.diskon !== '0') ? v.diskon : '') + '</td>' +
            '<td align="right">' + ((v.diskon_barang !== '0') ? v.diskon_barang : '') + '</td>' +
            '<td align="left">' + kode_rekening + '</td>' +
            '<td align="left">' + status + '</td>' +
            '<td align="right">' + btn + '</td>' +
            '</tr>';
        return html;
    }

    function updateStatus(id, isActive, idJenisPenjamin) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('penjamin/api/penjamin/update_status') ?>',
            data: 'id=' + id + '&status=' + isActive,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status !== false) {

                    let newStatus = isActive === 1 ? 0 : 1;
                    let checkbox = document.getElementById(id);
                    let label = checkbox.nextElementSibling;
                    if (newStatus === 1) {
                        label.innerHTML = '<h5><span class="label label-success" style="padding-right: 10px;padding-left: 10px;">Aktif</span></h5>';
                    } else {
                        label.innerHTML = '<h5><span class="label label-danger" style="padding-right: 10px;padding-left: 10px;">Tidak Aktif</span></h5>';
                    }
                    checkbox.setAttribute('onclick', `updateStatus(${id}, ${newStatus}, ${idJenisPenjamin})`);

                    messageCustom(data.message, 'Success');
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            error: function(e) {
                messageCustom('error', 'Error', 'Sistem Error');
            }
        });
    }

    function simpanDataPenjamin() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Nama penjamin harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        let update = '';
        if ($('#id').val() !== '') {
            update = '/id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('penjamin/api/penjamin/simpan_penjamin') ?>' + update,
            data: $('#form_penjamin').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['nama']) {
                        syams_validation('#nama', data.error_string['nama']);
                    }

                    if (data.error_string['reimbuse']) {
                        syams_validation('#reimbuse', data.error_string['reimbuse']);
                    }

                    if (data.error_string['reimbuse_barang']) {
                        syams_validation('#reimbuse_barang', data.error_string['reimbuse_barang']);
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListPenjamin($('#page_now').val());
                    } else {
                        messageAddSuccess();
                        getListPenjamin(1);
                    }

                    $('#modal_penjamin').modal('hide');
                    restAllPenjamin();
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

    function editPenjamin(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('penjamin/api/penjamin/get_penjamin') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#kode').val(data.data.kode);
                $('#nama').val(data.data.nama);
                $('#reimbuse').val(data.data.diskon);
                $('#reimbuse_barang').val(data.data.diskon_barang);
                $('#rekening_auto').val(data.data.kode_rekening);
                $('#s2id_rekening_auto a .select2-chosen').html(data.data.korek);

                $('#page_now').val(p);
                $('#modal_penjamin').modal('show');
                $('#modal_penjamin_label').html('Form Edit Penjamin');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function deletePenjamin(id, p) {
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
                            url: '<?= base_url('penjamin/api/penjamin/delete_penjamin') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListPenjamin(p);
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
</script>