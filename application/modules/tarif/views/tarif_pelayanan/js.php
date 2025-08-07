<script>
    $(function() {
        $('.autoshow').hide();
        getListTarifPelayanan(1);

        //btn tambah data
        $('#bt_tambah_tarif_pelayanan').click(function() {
            resetAllTarifPelayanan();
            $("#modal_tarif_pelayanan").modal('show');
            $("#modal_tarif_pelayanan_label").html('Form Tambah Tarif Pelayanan');
        });

        //btn reload data
        $('#bt_reload_data_tarif_pelayanan').click(function() {
            resetAllTarifPelayanan();
            getListTarifPelayanan(1);
        });

        //btn search data
        $('#bt_search_data_tarif_pelayanan').click(function() {
            $('#modal_search_tarif_pelayanan').modal('show');
            $('#modal_search_tarif_pelayanan_label').html('Form Parameter Pencarian');
        });

        //btn export data
        $('#bt_export_data_tarif_pelayanan').click(function() {
            export_data_tarif_pelayanan();
        });

        $('.select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // auto for input
        $('#layanan_auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/layanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        id_jenis: $('#jenis_pemeriksaan_auto').val(),
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
                var markup = data.kode + ' ' + data.nama + '<br/>' + data.layanan_parent;
                return markup;
            },
            formatSelection: function(data) {
                if (data.jenis_pemeriksaan === 'Pelayanan Pembedahan') {
                    $('.autoshow').show();
                    $('.autohide').hide();
                } else {
                    $('.autoshow').hide();
                    $('.autohide').show();
                }
                return data.nama + ' - ' + data.parent;
            }
        });

        $('#instalasi_auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
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

        // auto for search
        $('#layanan_auto_search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/layanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        id_jenis: $('#jenis_pemeriksaan_auto').val(),
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
                var markup = data.kode + ' ' + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#jenis_pemeriksaan_auto_search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/jenis_pemeriksaan_auto') ?>",
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

        $('#instalasi_auto_search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
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

        // placeholder search
        $('#s2id_layanan_auto_search a .select2-chosen').html('Pilih Layanan');
        $('#s2id_jenis_pemeriksaan_auto_search a .select2-chosen').html('Pilih Jenis Pemeriksaan');
        $('#s2id_instalasi_auto_search a .select2-chosen').html('Pilih Instalasi');
    });

    function komponenPersen(obj) {
        var total = $('#total').val();
        var uid = $(obj).attr('id').split('-')[0];
        var persen = parseInt($(obj).val());
        var sum = 0;
        var nominal = 0;
        $(".field_persen").each(function() {
            sum += +$(this).val();
        });
        if (parseInt(sum) > 100) {
            $(obj).val('');
            swalAlert('warning', 'Validasi', 'Persentase pembagian komponen tarif melebihi 100 %!');
        } else {
            nominal = Math.round((total * persen) / 100);
            $('#' + uid).val((nominal));
        }

    }

    function komponenNominal(obj) {
        var total = $('#total').val();
        var nominal = $(obj).val();
        var uid = $(obj).attr('id');
        $(obj).val(nominal);
        if ((nominal !== '') & (total !== 0)) {
            nominal = nominal;
            $('#' + uid + '-persen').val((nominal / total) * 100);

            var sum = 0;
            $(".field_persen").each(function() {
                sum += +$(this).val();
            });
            if (parseInt(sum) > 100) {
                $(obj).val('');
                swalAlert('warning', 'Validasi', 'Persentase pembagian komponen tarif melebihi 100 %!');
                $('#' + uid + '-persen').val(0);
            }
        };
    }

    function resetTotal() {
        var total = $('#total').val();
        $('#total').val(total);
        $('.field_persen').val(0);
        $('.field_nominal').val(0);
    }


    function resetAllTarifPelayanan() {
        $('#id_tarif_pelayanan, .form-control, #pencarian_tarif_pelayanan, #layanan_auto_search, #instalasi_auto_search, #jenis_pemeriksaan_auto_search, #kelas_search, #jenis_search, .custom-select').val('');
        $('#total').val(0);
        $('#s2id_layanan_auto a .select2-chosen').html('Pilih Layanan');
        $('#s2id_jenis_pemeriksaan_auto a .select2-chosen').html('Pilih Jenis Pemeriksaan');
        $('#s2id_instalasi_auto a .select2-chosen').html('Pilih Instalasi');
        $('#s2id_layanan_auto_search a .select2-chosen').html('Pilih Layanan');
        $('#s2id_jenis_pemeriksaan_auto_search a .select2-chosen').html('Pilih Jenis Pemeriksaan');
        $('#s2id_instalasi_auto_search a .select2-chosen').html('Pilih Instalasi');
    }

    function getListTarifPelayanan(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('tarif/api/tarif_pelayanan/get_list_tarif_pelayanan') ?>/page/' + p,
            data: $('#form_search_tarif_pelayanan').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListTarifPelayanan(p - 1);
                    return false;
                }

                $('#tarif_pelayanan_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#tarif_pelayanan_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_tarif_pelayanan tbody').empty();

                let active = '';
                let active_background = '';
                $.each(data.data, function(i, v) {
                    if (v.is_active === '0') {
                        active = '<i class="fas fa-times"></i>'
                        active_background = 'style="background-color:red"';
                    } else {
                        active = '<i class="fas fa-check"></i>'
                        active_background = '';
                    }

                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr ' + active_background + '>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.instalasi + '</td>' +
                        '<td>' + v.layanan + '</td>' +
                        '<td align="center" class="nowrap">' + v.kelas + '</td>' +
                        '<td>' + ((v.jenis !== null) ? v.jenis : '') + '</td>' +
                        '<td>' + v.bobot + '</td>' +
                        '<td align="right">' + ((v.jasa_nadis !== null) ? money_format(v.jasa_nadis) : '0') + '</td>' +
                        '<td align="right">' + ((v.jasa_klinik !== null) ? money_format(v.jasa_klinik) : '0') + '</td>' +
                        '<td align="right">' + ((v.bhp !== null) ? money_format(v.bhp) : '0') + '</td>' +
                        '<td align="right">' + ((v.total !== null) ? money_format(v.total) : '0') + '</td>' +
                        '<td align="center">' + active + '</td>' +
                        '<td align="right">' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editTarifPelayanan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit Tarif Pelayanan</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="deleteTarifPelayanan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Hapus Tarif Pelayanan</a>' +
                        '</div>' +
                        '</div></td>' +
                        '</tr>';
                    $('#table_tarif_pelayanan tbody').append(html);
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

    function simpanDataTarifPelayanan() {
        let stop = false;
        if ($('#layanan_auto').val() === '') {
            syams_validation('#layanan_auto', 'Kolom layanan harus diisi!');
            stop = true;
        };

        let sum = 0;
        $(".field_nominal").each(function() {
            sum += parseFloat($(this).val());
        });

        if (sum < $('#total').val()) {
            swalAlert('warning', 'Validasi', "Pembagian komponen tarif belum mencapai 100%");
            stop = true;
        };

        if (stop) {
            return false;
        };

        let update = '';
        if ($('#id_tarif_pelayanan').val() !== '') {
            update = '/id/' + $('#id_tarif_pelayanan').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('tarif/api/tarif_pelayanan/simpan_tarif_pelayanan') ?>' + update,
            data: $('#form_tarif_pelayanan').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['layanan']) {
                        syams_validation('#layanan_auto', data.error_string['layanan']);
                    }

                    if (data.error_string['jasa_nadis_persen']) {
                        syams_validation('#jasa_nadis-persen', data.error_string['jasa_nadis_persen']);
                    }

                    if (data.error_string['jasa_nadis']) {
                        syams_validation('#jasa_nadis', data.error_string['jasa_nadis']);
                    }

                    if (data.error_string['jasa_klinik_persen']) {
                        syams_validation('#jasa_klinik-persen', data.error_string['jasa_klinik_persen']);
                    }

                    if (data.error_string['jasa_klinik']) {
                        syams_validation('#jasa_klinik', data.error_string['jasa_klinik']);
                    }

                    if (data.error_string['bhp_persen']) {
                        syams_validation('#bhp-persen', data.error_string['bhp_persen']);
                    }

                    if (data.error_string['bhp']) {
                        syams_validation('#bhp', data.error_string['bhp']);
                    }

                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id_tarif_pelayanan').val() !== '') {
                        messageEditSuccess();
                        getListTarifPelayanan($('#page_now_tarif_pelayanan').val());
                    } else {
                        messageAddSuccess();
                        getListTarifPelayanan(1);
                    }

                    $('#modal_tarif_pelayanan').modal('hide');
                    resetAllTarifPelayanan();
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

    function editTarifPelayanan(id, p) {
        $('#page_now_tarif_pelayanan').val(p);
        syams_validation_remove('.form-control, .select2-input');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('tarif/api/tarif_pelayanan/get_tarif_pelayanan') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // alert(data.data.jenis_pemeriksaan);
                $('#id_tarif_pelayanan').val(data.data.id);
                $('#layanan_auto').val(data.data.id_layanan);
                $('#s2id_layanan_auto a .select2-chosen').html(data.data.layanan);
                $('#instalasi_auto').val(data.data.id_instalasi);
                $('#s2id_instalasi_auto a .select2-chosen').html(data.data.instalasi);
                $('#kelas').val(data.data.id_kelas);
                $('#jenis').val(data.data.jenis);
                $('#bobot').val(data.data.bobot);
                $('#keterangan').val(data.data.keterangan);

                let persentase = 0;
                let total = parseInt(data.data.total);

                $('#total').val(total);

                $('#jasa_nadis').val(data.data.jasa_nadis);
                persentase = parseInt(data.data.jasa_nadis) / total * 100;
                $('#jasa_nadis-persen').val(Math.ceil(persentase));

                $('#jasa_klinik').val(data.data.jasa_klinik);
                persentase = parseInt(data.data.jasa_klinik) / total * 100;
                $('#jasa_klinik-persen').val(Math.ceil(persentase));

                $('#bhp').val(data.data.bhp);
                persentase = parseInt(data.data.bhp) / total * 100;
                $('#bhp-persen').val(Math.ceil(persentase));

                $('#bahan_alat').val(data.data.bahan_alat);
                persentase = parseInt(data.data.bahan_alat) / total * 100;
                $('#bahan_alat-persen').val(Math.ceil(persentase));

                $('#dokter_anasthesi').val(data.data.jasa_dokter_anasthesi);
                persentase = parseInt(data.data.jasa_dokter_anasthesi) / total * 100;
                $('#dokter_anasthesi-persen').val(Math.ceil(persentase));

                $('#penata_anasthesi').val(data.data.jasa_penata_anasthesi);
                persentase = parseInt(data.data.jasa_penata_anasthesi) / total * 100;
                $('#penata_anasthesi-persen').val(Math.ceil(persentase));

                $('#instrument').val(data.data.jasa_instrument);
                persentase = parseInt(data.data.jasa_instrument) / total * 100;
                $('#instrument-persen').val(Math.ceil(persentase));

                $('#medisnonmedis').val(data.data.jasa_para_no_medis);
                persentase = parseInt(data.data.jasa_para_no_medis) / total * 100;
                $('#medisnonmedis-persen').val(Math.ceil(persentase));

                if (data.data.jenis_pemeriksaan === 'Pelayanan Pembedahan') {
                    $('.autoshow').show();
                    $('.autohide').hide();
                } else {
                    $('.autoshow').hide();
                    $('.autohide').show();
                }

                $('#modal_tarif_pelayanan').modal('show');
                $('#modal_tarif_pelayanan_label').html('Form Edit Tarif Pelayanan');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteTarifPelayanan(id, p) {
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
                            url: '<?= base_url('tarif/api/tarif_pelayanan/delete_tarif_pelayanan') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListTarifPelayanan(p);
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

    function export_data_tarif_pelayanan() {
        location.href = '<?= base_url() ?>tarif/export_tarif/tarif_pelayanan?' + $('#form_search_tarif_pelayanan').serialize();
    }
</script>