<script>
    $(function() {
        getListKotaKabupaten(1);

        $('#bt_tambah_kota_kabupaten').click(function() {
            $('#modal_kota_kabupaten').modal('show');
            $('#modal_kota_kabupaten_label').html('Form Tambah Kota/Kabupaten');
            resetAllKotaKabupaten();
        });

        $('#bt_reload_data_kota_kabupaten').click(function() {
            resetAllKotaKabupaten();
            getListKotaKabupaten(1);
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

        $('#provinsi').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/provinsi_auto') ?>",
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
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

    });

    function resetAllKotaKabupaten() {
        $('input[type=text], .form-control, #id_kota_kabupaten, #provinsi #pencarian_provinsi').val('');
        $('a .select2-chosen').html('Silahkan pilih provinsi');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getListKotaKabupaten(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('wilayah/api/kotakabupaten/get_list_kota_kabupaten/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_kota_kabupaten').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKotaKabupaten(p - 1);
                    return false;
                }

                $('#kota_kabupaten_pagination').html(pagination(data.jumlah, data.limit, data.page, 2));
                $('#kota_kabupaten_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_kota_kabupaten tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.provinsi + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editKotaKabupaten(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteKotaKabupaten(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_kota_kabupaten tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataKotaKabupaten() {
        let stop = false;
        if ($('#provinsi').val() === '') {
            syams_validation('#provinsi', 'Silahkan pilih provinsi terlebih dahulu');
            stop = true;
        }

        if ($('#nama_kota_kabupaten').val() === '') {
            syams_validation('#nama_kota_kabupaten', 'Silahkan masukkan nama kota/kabupaten');
            stop = true;
        }

        if (stop) {
            return false;
        }

        let update = '';
        if ($('#id_kota_kabupaten').val() !== '') {
            update = 'id/' + $('#id_kota_kabupaten').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('wilayah/api/kotakabupaten/simpan_kota_kabupaten/') ?>' + update,
            cache: false,
            data: $('#formkotakabupaten').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListKotaKabupaten($('#page_now_kota_kabupaten').val());
                } else {
                    getListKotaKabupaten(1);
                    messageAddSuccess();
                }

                $('#modal_kota_kabupaten').modal('hide');
                resetAllKotaKabupaten();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editKotaKabupaten(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('wilayah/api/kotakabupaten/get_kota_kabupaten') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id_kota_kabupaten').val(data.data.id);
                $('#nama_kota_kabupaten').val(data.data.nama);

                $('#provinsi').val(data.data.id_provinsi);
                $('#s2id_provinsi a .select2-chosen').html(data.data.provinsi);

                $('#page_now_kota_kabupaten').val(p);
                $('#modal_kota_kabupaten').modal('show');
                $('#modal_kota_kabupaten_label').html('Form Edit Kota Kabupaten');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteKotaKabupaten(id, p) {
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
                            url: '<?= base_url('wilayah/api/kotakabupaten/delete_kota_kabupaten') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListKotaKabupaten(p);
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