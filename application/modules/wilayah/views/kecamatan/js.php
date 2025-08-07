<script>
    $(function() {
        getListKecamatan(1);

        $('#bt_tambah_kecamatan').click(function() {
            $('#modal_kecamatan').modal('show');
            $('#modal_kecamatan_label').html('Form Tambah Kecamatan');
            resetAllKecamatan();
        });

        $('#bt_reload_data_kecamatan').click(function() {
            resetAllKecamatan();
            getListKecamatan(1);
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

        $('#kota_kabupaten').select2({
            theme: 'bootstrap4',
            placeholder: 'Silahkan pilih kota/kabupaten',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/kotakabupaten_auto') ?>",
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
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.provinsi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama + ', ' + data.provinsi;
            }
        });

    });

    function resetAllKecamatan() {
        $('input[type=text], .form-control, #id_kecamatan, #kota_kabupaten #pencarian_kecamatan').val('');
        $('a .select2-chosen').html('Silahkan pilih kota/kabupaten');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getListKecamatan(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('wilayah/api/kecamatan/get_list_kecamatan/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_kecamatan').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKecamatan(p - 1);
                    return false;
                }

                $('#kecamatan_pagination').html(pagination(data.jumlah, data.limit, data.page, 3));
                $('#kecamatan_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_kecamatan tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.kotakabupaten + ', <b>' + v.provinsi + '</b></td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editKecamatan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteKecamatan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_kecamatan tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function simpanDataKecamatan() {
        let stop = false;
        if ($('#kota_kabupaten').val() === '') {
            syams_validation('#kota_kabupaten', 'Silahkan pilih kota/kabupaten terlebih dahulu');
            stop = true;
        }

        if ($('#nama_kecamatan').val() === '') {
            syams_validation('#nama_kecamatan', 'Silahkan masukkan nama kecamatan');
            stop = true;
        }

        if (stop) {
            return false;
        }

        let update = '';
        if ($('#id_kecamatan').val() !== '') {
            update = 'id/' + $('#id_kecamatan').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('wilayah/api/kecamatan/simpan_kecamatan/') ?>' + update,
            cache: false,
            data: $('#formkecamatan').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListKecamatan($('#page_now_kecamatan').val());
                } else {
                    getListKecamatan(1);
                    messageAddSuccess();
                }

                $('#modal_kecamatan').modal('hide');
                resetAllKecamatan();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editKecamatan(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('wilayah/api/kecamatan/get_kecamatan') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id_kecamatan').val(data.data.id);
                $('#nama_kecamatan').val(data.data.nama);

                $('#kota_kabupaten').val(data.data.id_kota_kabupaten);
                $('#s2id_kota_kabupaten a .select2-chosen').html(data.data.kotakabupaten);

                $('#page_now_kecamatan').val(p);
                $('#modal_kecamatan').modal('show');
                $('#modal_kecamatan_label').html('Form Edit Kecamatan');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteKecamatan(id, p) {
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
                            url: '<?= base_url('wilayah/api/kecamatan/delete_kecamatan') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListKecamatan(p);
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