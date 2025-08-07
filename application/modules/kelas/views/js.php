<script>
    $(function() {
        getListKelas(1);

        $('#btn-tambah').click(function() {
            $('#modal-kelas').modal('show');
            $('#modal-kelas-label').html('Form Tambah Kelas');
            resetAll();
        });

        $('#btn-reload').click(function() {
            resetAll();
            getListKelas(1);
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

    function getListKelas(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('kelas/api/kelas/get_list_kelas/page/') ?>' + p,
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKelas(p - 1);
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
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editDataKelas(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit mr-1"></i>Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteDataKelas(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash-alt mr-1"></i>Delete</button> ' +
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

    function simpanDataKelas() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('kelas/api/kelas/simpan_kelas/') ?>' + update,
            cache: false,
            data: $('#form-kelas').serialize(),
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
                        getListKelas($('#page-now').val());
                    } else {
                        messageAddSuccess();
                        getListKelas(1);
                    }

                    $('#modal-kelas').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editDataKelas(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('kelas/api/kelas/get_kelas') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#keterangan').val(data.data.keterangan);

                $('#page-now').val(p);
                $('#modal-kelas').modal('show');
                $('#modal-kelas-label').html('Form Edit Kelas');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteDataKelas(id, p) {
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
                            url: '<?= base_url('kelas/api/kelas/delete_kelas') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListKelas(p);
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
        getListKelas(p);
    }
</script>