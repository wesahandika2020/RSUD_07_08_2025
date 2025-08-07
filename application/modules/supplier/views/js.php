<script>
    $(function() {
        getListDataSupplier(1);

        $('#btn_tambah').click(function() {
            $('#modal_supplier').modal('show');
            $('#modal_supplier_label').html('Form Tambah Supplier');
            resetAll();
        });

        $('#btn_reload').click(function() {
            resetAll();
            getListDataSupplier(1);
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
        $('input[type=text], .form-control, #id, #pencarian_supplier').val('');
        syams_validation_remove('.form-control');
    }

    function getListDataSupplier(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('supplier/api/supplier/get_list_supplier/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListDataSupplier(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_data tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.npwp + '</td>' +
                        '<td>' + v.alamat + '</td>' +
                        // '<td>' + v.email + '</td>' +
                        '<td>' + v.fax + '</td>' +
                        '<td>' + v.telp + '</td>' +
                        '<td>' + v.hp + '</td>' +
                        '<td align="right" class="aksi">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editDataSupplier(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteDataSupplier(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_data tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataSupplier() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('supplier/api/supplier/simpan_supplier/') ?>' + update,
            cache: false,
            data: $('#form_supplier').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['nama']) {
                        syams_validation('#nama', data.error_string['nama']);
                        syams_validation('#alamat', data.error_string['alamat']);
                        syams_validation('#telp', data.error_string['telp']);
                    }

                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListDataSupplier($('#page_now').val());
                    } else {
                        messageAddSuccess();
                        getListDataSupplier(1);
                    }

                    $('#modal_supplier').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editDataSupplier(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('supplier/api/supplier/get_supplier') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#npwp').val(data.data.npwp);
                $('#alamat').val(data.data.alamat);
                $('#email').val(data.data.email);
                $('#telp').val(data.data.telp);

                $('#page_now').val(p);
                $('#modal_supplier').modal('show');
                $('#modal_supplier_label').html('Form Edit Supplier');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteDataSupplier(id, p) {
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
                            url: '<?= base_url('supplier/api/supplier/delete_supplier') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListDataSupplier(p);
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
        getListDataSupplier(p);
    }
</script>