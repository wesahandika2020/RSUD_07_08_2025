<script>
    $(function() {
        getListSignaObat(1);

        $('#bt_tambah_signa').click(function() {
            resetAll();
            $('#modal_signa').modal('show');
            $('#modal_signa_label').html('Form Tambah Aturan Pakai');
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListSignaObat(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });
    });

    function resetAll() {
        $('#id, .form-control, #pencarian_signa').val('');
        syams_validation_remove('.form-control');
    }

    function getListSignaObat(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('signa/api/signa/get_list_signa_obat') ?>/page/' + p,
            data: 'keyword=' + $('#pencarian_signa').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListSignaObat(p - 1);
                    return false;
                }

                $('#signa_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#signa_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_signa tbody').empty();

                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.signa + '</td>' +
                        '<td>' + v.keterangan + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editSignaObat(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteSignaObat(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_signa tbody').append(html);
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

    function paging(p) {
        getListSignaObat(p);
    }


    function simpanDataSignaObat() {
        let stop = false;
        if ($('#jml_pemberian').val() === '0') {
            syams_validation('#jml_pemberian', 'Jumlah pemberian signa tidak boleh nol!<br/>Jumlah pemberian signa tidak boleh menggunakan koma!');
            stop = true;
        }

        if ($('#dosis_pemberian').val() === '0') {
            syams_validation('#dosis_pemberian', 'Dosis pemberian signa tidak boleh nol!<br />Boleh menggunakan nilai desimal, misal : 0.75 <br />Maksimal 3 angka di belakang koma!');
            stop = true;
        }

        if (stop) {
            return false;
        };

        let update = '';
        if ($('#id').val() !== '') {
            update = '/id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('signa/api/signa/simpan_signa_obat') ?>' + update,
            data: $('#form_signa').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['signa']) {
                        syams_validation('#signa', data.error_string['signa']);
                    }

                    if (data.error_string['jml_pemberian']) {
                        syams_validation('#jml_pemberian', data.error_string['jml_pemberian']);
                    }

                    if (data.error_string['dosis_pemberian']) {
                        syams_validation('#dosis_pemberian', data.error_string['dosis_pemberian']);
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListSignaObat($('#page_now_signa').val());
                    } else {
                        messageAddSuccess();
                        getListSignaObat(1);
                    }

                    $('#modal_signa').modal('hide');
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

    function editSignaObat(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('signa/api/signa/get_signa_obat') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#signa').val(data.data.signa);
                $('#keterangan').val(data.data.keterangan);
                $('#jml_pemberian').val(data.data.jml_pemberian);
                $('#dosis_pemberian').val(data.data.jml_tablet);

                $('#page_now_signa').val(p);
                $('#modal_signa').modal('show');
                $('#modal_signa_label').html('Form Edit Aturan Pakai Obat');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function deleteSignaObat(id, p) {
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
                            url: '<?= base_url('signa/api/signa/delete_signa_obat') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListSignaObat(p);
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