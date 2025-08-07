<script>
    $(function() {
        getListProvinsi(1);

        $('#bt_tambah_provinsi').click(function() {
            $('#modal_provinsi').modal('show');
            $('#modal_provinsi_label').html('Form Tambah Provinsi');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListProvinsi(1);
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
        $('input[type=text], .form-control, #id, #pencarian_provinsi').val('');
        syams_validation_remove('.form-control');
    }

    function getListProvinsi(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('wilayah/api/provinsi/get_list_provinsi/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_provinsi').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListProvinsi(p - 1);
                    return false;
                }

                $('#provinsi_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#provinsi_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_provinsi tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editProvinsi(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteProvinsi(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_provinsi tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        })
    }

    function simpanDataProvinsi() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama provinsi');
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
            url: '<?= base_url('wilayah/api/provinsi/simpan_provinsi/') ?>' + update,
            cache: false,
            data: $('#formprovinsi').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListProvinsi($('#page_now_provinsi').val());
                } else {
                    getListProvinsi(1);
                    messageAddSuccess();
                }

                $('#modal_provinsi').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editProvinsi(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('wilayah/api/provinsi/get_provinsi') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);

                $('#page_now_provinsi').val(p);
                $('#modal_provinsi').modal('show');
                $('#modal_provinsi_label').html('Form Edit Provinsi');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteProvinsi(id, p) {
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
                            url: '<?= base_url('wilayah/api/provinsi/delete_provinsi') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListProvinsi(p);
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