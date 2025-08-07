<script>
    $(function() {
        getListKelurahan(1);

        $('#bt_tambah_kelurahan').click(function() {
            $('#modal_kelurahan').modal('show');
            $('#modal_kelurahan_label').html('Form Tambah Kelurahan');
            resetAllKelurahan();
        })

        $('#bt_reload_data_kelurahan').click(function() {
            getListKelurahan(1);
            resetAllKelurahan();
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

        $('#kecamatan').select2({
            theme: 'bootstrap4',
            placeholder: 'Silahkan pilih kecamatan',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/kecamatan_auto') ?>",
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
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.kotakabupaten + ', ' + data.provinsi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama + ', ' + data.kotakabupaten + ', ' + data.provinsi;
            }
        });
    });

    function resetAllKelurahan() {
        $('input[type=text], .form-control, #id_kelurahan, #kecamatan #pencarian_kelurahan').val('');
        $('a .select2-chosen').html('Silahkan pilih kecamatan');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getListKelurahan(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('wilayah/api/kelurahan/get_list_kelurahan/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_kelurahan').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKelurahan(p - 1);
                    return false;
                }

                $('#kelurahan_pagination').html(pagination(data.jumlah, data.limit, data.page, 4));
                $('#kelurahan_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_kelurahan tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.kecamatan + ', <b>' + v.kotakabupaten + ', ' + v.provinsi + '</b></td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editKelurahan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteKelurahan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_kelurahan tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataKelurahan() {
        let stop = false;
        if ($('#kecamatan').val() === '') {
            syams_validation('#kecamatan', 'Silahkan pilih kecamatan terlebih dahulu');
            stop = true;
        }

        if ($('#nama_kelurahan').val() === '') {
            syams_validation('#nama_kelurahan', 'Silahkan masukkan nama kelurahan');
            stop = true;
        }

        if (stop) {
            return false;
        }

        let update = '';
        if ($('#id_kelurahan').val() !== '') {
            update = 'id/' + $('#id_kelurahan').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('wilayah/api/kelurahan/simpan_kelurahan/') ?>' + update,
            cache: false,
            data: $('#formkelurahan').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListKelurahan($('#page_now_kelurahan').val());
                } else {
                    getListKelurahan(1);
                    messageAddSuccess();
                }

                $('#modal_kelurahan').modal('hide');
                resetAllKelurahan();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editKelurahan(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('wilayah/api/kelurahan/get_kelurahan') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id_kelurahan').val(data.data.id);
                $('#nama_kelurahan').val(data.data.nama);

                $('#kecamatan').val(data.data.id_kecamatan);
                $('#s2id_kecamatan a .select2-chosen').html(data.data.kecamatan);

                $('#page_now_kelurahan').val(p);
                $('#modal_kelurahan').modal('show');
                $('#modal_kelurahan_label').html('Form Edit Kelurahan');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteKelurahan(id, p) {
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
                            url: '<?= base_url('wilayah/api/kelurahan/delete_kelurahan') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListKelurahan(p);
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