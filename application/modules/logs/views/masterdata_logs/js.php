<script>
    $(function() {
        getListMasterdataLogs(1);

        $('#bt_reload_data').click(function() {
            resetData();
            getListMasterdataLogs(1);
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

        $('#tanggal_awal').val('<?= date("01/m/Y") ?>');
        $('#tanggal_akhir').val('<?= date("d/m/Y") ?>');


    });

    function resetData() {
        $('.form-control').val('');
        $('#tanggal_awal').val('<?= date("01/m/Y") ?>');
        $('#tanggal_akhir').val('<?= date("d/m/Y") ?>');
    }

    function getListMasterdataLogs(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("logs/api/logs/get_list_masterdata_logs") ?>/page/' + p,
            data: $('#form_search').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListMasterdataLogs(p - 1);
                    return false;
                };

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table_masterdata_logs tbody').empty();
                let html = '';
                let action = '';

                $.each(data.data, function(i, v) {
                    let highlight = 'odd';
                    if ((i % 2) === 1) {
                        highlight = 'even';
                    };

                    action = '';
                    if (v.action === 'Insert') {
                        action = '<h5><span class="label label-success"><i class="fas fa-plus-circle"></i> Insert</span></h5>';
                    } else if (v.action === 'Update') {
                        action = '<h5><span class="label label-info"><i class="fas fa-edit"></i> Update</span></h5>';
                    } else if (v.action === 'Delete') {
                        action = '<h5><span class="label label-danger"><i class="fas fa-trash"></i> Delete</span></h5>';
                    }

                    html = '<tr class="' + highlight + '">' +
                        '<td align="center">' + ((i + 1) + ((data.page - 1) * data.limit)) + '</td>' +
                        '<td>' + ((v.waktu !== null) ? datetimefmysql(v.waktu) : '') + '</td>' +
                        '<td>' + v.masterdata + '</td>' +
                        '<td>' + v.account + '</td>' +
                        '<td>' + v.nama_user + '</td>' +
                        '<td>' + action + '</td>' +
                        '<td align="center">' +
                        '<button type="button" class="btn btn-secondary btn-xs" onclick="showLog(' + v.id + ', \'' + v.action + '\')"><i class="fas fa-eye"></i> Show</button> ' +
                        '</td>' +
                        '</tr>';

                    $('#table_masterdata_logs tbody').append(html);
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
        getListMasterdataLogs(p);
    }

    function showLog(id, action) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("logs/api/logs/get_masterdata_logs_by_id") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (action === 'Update') {
                    showUpdateModal(data.data);
                } else {
                    showModal(data.data);
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

    function showUpdateModal(data) {
        var beforeData = data.databefore;
        var beforeObj = JSON.parse(beforeData);
        var before = JSON.stringify(beforeObj, null, '\t');
        $("#data_area_before").text(before);

        var afterData = data.data;
        var afterObj = JSON.parse(afterData);
        var after = JSON.stringify(afterObj, null, '\t');
        $("#data_area_after").text(after);

        $('#log_update_modal').modal('show');
    }

    function showModal(data) {
        var afterData = data.data;
        var afterObj = JSON.parse(afterData);
        var data = JSON.stringify(afterObj, null, '\t');
        $('#data_area').text(data);
        $('#log_modal').modal('show');
    }
</script>