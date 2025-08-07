<script>
    $(function() {
        getListInstalasi(1);

        $('#bt_tambah_instalasi').click(function() {
            $('#modal_instalasi').modal('show');
            $('#modal_instalasi_label').html('Form Tambah Instalasi');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListInstalasi(1);
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

        $('#kepala_instalasi').select2({
            theme: 'bootstrap4',
            placeholder: 'Silahkan pilih kepala instalasi',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/pegawai_nadis_auto') ?>",
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
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.jabatan + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama + ', ' + data.jabatan;
            }
        });
    });

    function resetAll() {
        $('input[type=text], .form-control, #id, #kepala_instalasi #pencarian_instalasi').val('');
        $('a .select2-chosen').html('Silahkan pilih Kepala Instalasi');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getListInstalasi(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('instalasi/api/instalasi/get_list_instalasi/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_instalasi').val(),
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

                $('#instalasi_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#instalasi_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_instalasi tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let status = '';
                    let background = '';
                    if (v.status == 0) {
                        status = '<span class="label label-danger">Not Active</span>';
                        background = 'style="background-color:red;"';
                    } else {
                        status = '<span class="label label-success">Active</span>';
                        background = '';
                    }

                    let html = '<tr ' + background + '>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.kode + '</td>' +
                        '<td>' + ((v.kepala_instalasi) ? v.kepala_instalasi : '') + '</td>' +
                        '<td>' + status + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editInstalasi(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteInstalasi(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_instalasi tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataInstalasi() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama instalasi');
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
            url: '<?= base_url('instalasi/api/instalasi/simpan_instalasi/') ?>' + update,
            cache: false,
            data: $('#forminstalasi').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListInstalasi($('#page_now_instalasi').val());
                } else {
                    getListInstalasi(1);
                    messageAddSuccess();
                }

                $('#modal_instalasi').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editInstalasi(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('instalasi/api/instalasi/get_instalasi') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#kode').val(data.data.kode);

                if (data.data.id_pegawai !== null) {
                    $('#kepala_instalasi').val(data.data.id_pegawai);
                    $('#s2id_kepala_instalasi a .select2-chosen').html(data.data.kepala_instalasi);
                } else {
                    $('#kepala_instalasi').val();
                    $('#s2id_kepala_instalasi a .select2-chosen').html('Silahkan pilih kepala instalasi');
                }

                $('#page_now_instalasi').val(p);
                $('#modal_instalasi').modal('show');
                $('#modal_instalasi_label').html('Form Edit Instalasi');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteInstalasi(id, p) {
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
                            url: '<?= base_url('instalasi/api/instalasi/delete_instalasi') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListInstalasi(p);
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
        getListInstalasi(p);
    }
</script>