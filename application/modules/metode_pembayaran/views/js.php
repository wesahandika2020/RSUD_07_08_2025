<script>
    $(function() {
        getListData(1);

        $('#btn-tambah').click(function() {
            $('#modal-data').modal('show');
            $('#modal-data-label').html('Form Tambah Data');
            resetAll();
        });

        $('#btn-reload').click(function() {
            resetAll();
            getListData(1);
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
        $('input[type=text], .form-control, #id, #keyword').val('');
        syams_validation_remove('.form-control');
    }

    function getListData(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('metode_pembayaran/api/metode_pembayaran/get_list_data/page/') ?>' + p,
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListData(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-data tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.keterangan + '</td>' +
                        '<td class="right aksi">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editData(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit mr-1"></i>Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteData(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash-alt mr-1"></i>Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table-data tbody').append(html);
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

    function simpanData() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('metode_pembayaran/api/metode_pembayaran/simpan_data/') ?>' + update,
            cache: false,
            data: $('#form-data').serialize(),
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
                        getListData($('#page-now').val());
                    } else {
                        messageAddSuccess();
                        getListData(1);
                    }

                    $('#modal-data').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editData(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('metode_pembayaran/api/metode_pembayaran/get_data') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#keterangan').val(data.data.keterangan);

                $('#page-now').val(p);
                $('#modal-data').modal('show');
                $('#modal-data-label').html('Form Edit Data');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteData(id, p) {
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
                            url: '<?= base_url('metode_pembayaran/api/metode_pembayaran/delete_data') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListData(p);
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
        getListData(p);
    }
</script>