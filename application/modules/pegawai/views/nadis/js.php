<script>
    $(function() {
        getListTenagaMedis(1);

        //btn tambah
        $('#bt_tambah_tenaga_medis').click(function() {
            $('#modal_tenaga_medis').modal('show');
            $('#modal_tenaga_medis_label').html('Form Tambah Tenaga Medis');
            resetAllDataTenagaMedis();
        });

        $('#bt_reload_data_tenaga_medis').click(function() {
            resetAllDataTenagaMedis();
            getListTenagaMedis(1);
        });

        $('#tgl_mulai_praktek, #ed_no_str, #ed_no_sip, #ed_no_sik').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            format: 'DD/MM/YYYY',
            lang: 'id',
            switchOnClick: true,
            // maxDate: new Date()
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control, .select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#pegawai_auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/pegawai_nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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
                var markup = data.nama + '<br/><i>' + ((data.jabatan !== null) ? data.jabatan : '') + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#profesi_auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/profesi_nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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

        $('#spesialisasi_auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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

    function resetAllDataTenagaMedis() {
        $('#id_tenaga_medis, .form-control, .select2-input').val('');
        $('.select2-chosen').html('');
        syams_validation_remove('.form-control');
        syams_validation_remove('.select2-input');
    }

    function getListTenagaMedis(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pegawai/api/tenaga_medis/get_list_tenaga_medis') ?>/page/' + p,
            data: 'keyword=' + $('#pencarian_tenaga_medis').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListTenagaMedis(p - 1);
                    return false;
                }

                $('#tenaga_medis_pagination').html(pagination(data.jumlah, data.limit, data.page, 3));
                $('#tenaga_medis_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_tenaga_medis tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.profesi + '</td>' +
                        '<td>' + v.spesialisasi + '</td>' +
                        '<td>' + ((v.tgl_mulai_praktek !== null) ? datefmysql(v.tgl_mulai_praktek) : '') + '</td>' +
                        '<td>' + v.kode_bpjs + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="detailTenagaMedis(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-eye"></i> Detail</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editTenagaMedis(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteTenagaMedis(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_tenaga_medis tbody').append(html);
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

    function simpanDataTenagaMedis() {
        let update = '';
        if ($('#id_tenaga_medis').val() !== '') {
            update = '/id/' + $('#id_tenaga_medis').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('pegawai/api/tenaga_medis/simpan_tenaga_medis') ?>' + update,
            data: $('#formnadis').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['pegawai']) {
                        syams_validation('#pegawai_auto', data.error_string['pegawai']);
                    }

                    if (data.error_string['profesi']) {
                        syams_validation('#profesi_auto', data.error_string['profesi']);
                    }

                    if (data.error_string['tgl_mulai_praktek']) {
                        syams_validation('#tgl_mulai_praktek', data.error_string['tgl_mulai_praktek']);
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id_tenaga_medis').val() !== '') {
                        messageEditSuccess();
                        getListTenagaMedis($('#page_now_tenaga_medis').val());
                    } else {
                        messageAddSuccess();
                        getListTenagaMedis(1);
                    }

                    // $('#modal_tenaga_medis').modal('hide');
                    resetAllDataTenagaMedis();
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

    function editTenagaMedis(id, p) {
        $('#page_now_tenaga_medis').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pegawai/api/tenaga_medis/get_tenaga_medis') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id_tenaga_medis').val(data.data.id);
                $('#pegawai_auto').val(data.data.id_pegawai);
                $('#s2id_pegawai_auto a .select2-chosen').html(data.data.nama);

                $('#profesi_auto').val(data.data.id_profesi);
                $('#s2id_profesi_auto a .select2-chosen').html(data.data.profesi);

                $('#spesialisasi_auto').val(data.data.id_spesialisasi);
                $('#s2id_spesialisasi_auto a .select2-chosen').html(data.data.spesialisasi);

                $('#tgl_mulai_praktek').val((data.data.tgl_mulai_praktek !== null) ? datefmysql(data.data.tgl_mulai_praktek) : '');
                $('#kode_bpjs').val(data.data.kode_bpjs);

                $('#no_str').val(data.data.no_str);
                $('#ed_no_str').val((data.data.ed_no_str !== null) ? datefmysql(data.data.ed_no_str) : '');
                $('#no_sip').val(data.data.no_sip);
                $('#ed_no_sip').val((data.data.ed_no_sip !== null) ? datefmysql(data.data.ed_no_sip) : '');
                $('#no_sik').val(data.data.no_sik);
                $('#ed_no_sik').val((data.data.ed_no_sik !== null) ? datefmysql(data.data.ed_no_sik) : '');

                $('#modal_tenaga_medis').modal('show');
                $('#modal_tenaga_medis_label').html('Form Edit Tenaga Medis');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteTenagaMedis(id, p) {
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
                            url: '<?= base_url('pegawai/api/tenaga_medis/delete_tenaga_medis') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListTenagaMedis(p);
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