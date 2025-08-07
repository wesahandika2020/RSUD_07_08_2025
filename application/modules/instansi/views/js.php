<script>
    $(function () {
        getListInstansi(1);

        setInputFilter(document.getElementById("telp"), function(value) {
            return /^\d*$/.test(value);
        });

        $('#bt_tambah_instansi').click(function() {
            $('#modal_instansi').modal('show');
            $('#modal_instansi_label').html('Form Tambah Instansi');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListInstansi(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control, .custom-select').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

    });

    function resetAll() {
        $('input[type=text], .form-control, #id, #pencarian_instansi').val('');
        syams_validation_remove('.form-control, .custom-select');
    }

    function getListInstansi(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('instansi/api/instansi/get_list_instansi/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_instansi').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListInstansi(p - 1);
                    return false;
                }

                $('#instansi_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#instansi_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_instansi tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let pendaftaran = '';
                    if (v.is_pendaftaran == 0) {
                        pendaftaran = 'Tidak';
                    } else {
                        pendaftaran = 'Ya';
                    }

                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.alamat + '</td>' +
                        '<td>' + v.email + '</td>' +
                        '<td>' + v.telp + '</td>' +
                        '<td>' + pendaftaran + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editInstansi(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteInstansi(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_instansi tbody').append(html);
                });

                hideLoader();
            },
            error: function (e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataInstansi() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama instansi');
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
            url: '<?= base_url('instansi/api/instansi/simpan_instansi/') ?>' + update,
            cache: false,
            data: $('#form_instansi').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListInstansi($('#page_now_instansi').val());
                } else {
                    getListInstansi(1);
                    messageAddSuccess();
                }

                $('#modal_instansi').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editInstansi(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('instansi/api/instansi/get_instansi') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#alamat').val(data.data.alamat);
                $('#email').val(data.data.email);
                $('#telp').val(data.data.telp);
                $('#ispendaftaran').val(data.data.is_pendaftaran);

                $('#page_now_instansi').val(p);
                $('#modal_instansi').modal('show');
                $('#modal_instansi_label').html('Form Edit Instansi');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteInstansi(id, p) {
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
                            url: '<?= base_url('instansi/api/instansi/delete_instansi') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListInstansi(p);
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
        getListInstansi(p);
    }

</script>