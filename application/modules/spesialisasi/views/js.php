<script>
    $(function() {
        getListSpesialisasi(1);

        //btn tambah
        $('#bt_tambah_spesialisasi').click(function() {
            restAllSpesialisasi();
            $('#modal_spesialisasi').modal('show');
            $('#modal_spesialisasi_label').html('Form Tambah Spesialisasi');
        });

        //btn reload
        $('#bt_reload_data').click(function() {
            restAllSpesialisasi();
            getListSpesialisasi(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#unit').select2({
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

        $('#kode_rekening').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/rekening_auto') ?>",
                dataType: 'JSON',
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
                var markup = data.kode + ' ' + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                $('#kode_rekening').val(data.kode);
                return data.kode;
            }
        });

        $('#tarif').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pemeriksaan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        kelas: 1, // id kelas III
                        penjamin: "",
                        unit: $('#unit').val(),
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
                var total = data.total;
                var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';

                var markup = data.layanan + '<br/><i>' + data.instalasi + ', ' + data.jenis + ', ' + data.bobot + kelas + '</i><br/>' + numberToCurrency(total);
                return markup;
            },
            formatSelection: function(data) {
                var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
                return data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas
            }
        });
    });

    function restAllSpesialisasi() {
        $('#id, .form-control, #pencarian_spesialisasi, #smf, #unit, #kode_rekening').val('');
        $('.select2-chosen').html('');
        syams_validation_remove('.form-control');
    }

    function getListSpesialisasi(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('spesialisasi/api/spesialisasi/get_list_spesialisasi') ?>/page/' + p,
            data: 'keyword=' + $('#pencarian_spesialisasi').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListSpesialisasi(p - 1);
                    return false;
                }

                $('#spesialisasi_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#spesialisasi_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_spesialisasi tbody').empty();

                let tglBridging = '';
                
                $.each(data.data, function(i, v) {

                    tglBridging = ((v.tgl_bridging !== null) ? datetimefmysql(v.tgl_bridging) : 'Belum Cek!') ;

                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.kode + '</td>' +
                        '<td>' + v.kode_bpjs + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.smf + '</td>' +
                        '<td>' + v.unit + '</td>' +
                        '<td>' + v.tarif + '</td>' +
                        '<td>' + v.kode_rekening + '</td>' +
                        '<td>' + ((v.status === '1') ? 'Terdaftar' : '') + '</td>' +
                        '<td align="right">' +
                        '<button type="button" title="'+tglBridging+'" class="btn btn-secondary btn-xs waves-effect waves-light nowrap mr-1" onclick="listBridging('+v.id+', ' + data.page + ')"><i class="fas fa-sync-alt"></i></button>' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editSpesialisasi(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteSpesialisasi(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_spesialisasi tbody').append(html);
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
        getListSpesialisasi(p);
    }

    function listBridging(d, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('spesialisasi/api/spesialisasi/list_bridging') ?>',
            data: 'id=' + d,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (typeof data.metaData !== 'undefined') {

                    if (data.metaData.code === 200) {

                        messageCustom(data.metaData.message, 'Success');
                        getListSpesialisasi(p);
                        
                    } else {

                        swalAlert('warning', data.metaData.code, data.metaData.message);
                        getListSpesialisasi(p);
                    
                    }

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

    function simpanDataSpesialisasi() {
        let update = '';
        if ($('#id').val() !== '') {
            update = '/id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('spesialisasi/api/spesialisasi/simpan_spesialisasi') ?>' + update,
            data: $('#form_spesialisasi').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
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
                        getListSpesialisasi($('#page_now_spesialisasi').val());
                    } else {
                        messageAddSuccess();
                        getListSpesialisasi(1);
                    }

                    // $('#modal_spesialisasi').modal('hide');
                    restAllSpesialisasi();
                    $('#kode').focus();
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

    function editSpesialisasi(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('spesialisasi/api/spesialisasi/get_spesialisasi') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#kode').val(data.data.kode);
                $('#kode_bpjs').val(data.data.kode_bpjs);
                $('#nama').val(data.data.nama);
                $('#smf').val(data.data.id_smf);
                $('#is_klinik').val(data.data.is_klinik).change();

                $('#unit').val(data.data.id_unit);
                $('#s2id_unit a .select2-chosen').html(data.data.unit);
                $('#kode_rekening').val(data.data.kode_rekening);
                $('#s2id_kode_rekening a .select2-chosen').html(data.data.kode_rekening);

                $('#tarif').val(data.data.id_tarif);
                $('#s2id_tarif a .select2-chosen').html(data.data.tarif);

                $('#page_now_spesialisasi').val(p);
                $('#modal_spesialisasi').modal('show');
                $('#modal_spesialisasi_label').html('Form Edit Spesialisasi');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function deleteSpesialisasi(id, p) {
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
                            url: '<?= base_url('spesialisasi/api/spesialisasi/delete_spesialisasi') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListSpesialisasi(p);
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