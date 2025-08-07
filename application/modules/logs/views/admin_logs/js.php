<script>
    $(function() {
        getListAdminLogs(1);

        $('#bt_reload_data').click(function() {
            resetData();
            getListAdminLogs(1);
        });

        $('#bt_search_data').click(function() {
            $('#modal_search').modal('show');
            $('#modal_search_label').modal('Parameter Pencarian Data');
        });

        $('#tanggal_awal, #tanggal_akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('.lay_area').hide();

        $('#tanggal_awal').val('<?= date("01/m/Y") ?>');
        $('#tanggal_akhir').val('<?= date("d/m/Y") ?>');

        $('#jenis_layanan').change(function() {
            resetOption();
            if ($(this).val() === 'Poliklinik') {
                $('.klinik_area').show();
            } else if ($(this).val() === 'IGD') {
                $('.igd_area').show();
            } else if ($(this).val() === 'Rawat Inap') {
                $('.ranap_area').show();
            } else {
                resetOption();
            }
        });

        $('#klinik').select2({
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
                var kode = '';
                if (data.kode !== '') {
                    kode = '<b>' + data.kode + '</b> - ';
                };
                var markup = kode + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                $('#kode_poli').val(data.kode_bpjs);
                return data.nama;
            }
        });
    });

    function resetOption() {
        $('.lay_area').hide();
        $('#klinik, #jenis_igd').val('');
        $('.select2-chosen').html('');
    }

    function resetData() {
        $('#id, .form-control').val('');
        $('.select2-input').html('');
        $('#tanggal_awal').val('<?= date("01/m/Y") ?>');
        $('#tanggal_akhir').val('<?= date("d/m/Y") ?>');
        resetOption();
    }

    function getListAdminLogs(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("logs/api/logs/get_list_admin_logs") ?>/page/' + p,
            data: $('#form_search').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListAdminLogs(p - 1);
                    return false;
                };

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table_admin_logs tbody').empty();
                let html = '';
                let layanan = '';
                let detail = '';
                let btShow = '';

                $.each(data.data, function(i, v) {
                    let highlight = 'odd';
                    if ((i % 2) === 1) {
                        highlight = 'even';
                    };

                    if (v.before !== null) {
                        btShow = '<button type="button" onclick="showChanges(\'' + v.id + '\')" title="Klik untuk melihat detail perubahan" class="btn btn-secondary btn-xs"><i class="fas fa-list"></i> Detail</button>';
                    } else {
                        detail = `<table>
                                    <tr><td><b>Catatan</b>&nbsp;</td><td>` + v.catatan + `</td></tr>
                                    <tr><td><b>User</b>&nbsp;</td><td>` + v.nama_user +` </td></tr>
                                  </table>`;

                        btShow = '<button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="left" data-title="Detail"' +
                            ' data-content="'+ detail +'"><i class="fas fa-eye"></i>' +
                            ' Show</button>';
                    }

                    html = '<tr class="' + highlight + '">' +
                        '<td align="center">' + ((i + 1) + ((data.page - 1) * data.limit)) + '</td>' +
                        '<td>' + ((v.waktu !== null) ? datetimefmysql(v.waktu) : '') + '</td>' +
                        '<td>' + ((v.no_register !== null) ? v.no_register : '') + '</td>' +
                        '<td>' + v.no_rm + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + ((v.layanan !== null) ? v.layanan : '') + '</td>' +
                        '<td>' + ((v.ruang !== null) ? v.ruang : '') + '</td>' +
                        '<td>' + v.keterangan + '</td>' +
                        '<td align="center">' +
                        btShow +
                        '</td>' +
                        // '<td>' + v.nama_user + '</td>' +
                        '</tr>';

                    $('#table_admin_logs tbody').append(html);
                });

                $('.mypopover').popover({
                    html: true,
                    trigger: 'hover',
                    sanitize: false,
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
        getListAdminLogs(p);
    }

    function showChanges(id) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("logs/api/logs/get_admin_logs_by_id") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                var beforeData = data.data.before;
                var beforeObj = JSON.parse(beforeData);
                var before = JSON.stringify(beforeObj, null, '\t');
                $("#data_area_before").text(before);

                var afterData = data.data.after;
                var afterObj = JSON.parse(afterData);
                var after = JSON.stringify(afterObj, null, '\t');
                $("#data_area_after").text(after);

                $('#user_log_dt').html(data.data.nama_user);
                $('#modal_admin_logs').modal('show');

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }
</script>