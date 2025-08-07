<script>
    $(function() {
        getListDataLogs(1);

        $('#bt_reload_data').click(function() {
            $('.form-control').val('');
            getListDataLogs(1);
        });

        $('#bt_search_logs').click(function() {
            $('#modal_search').modal('show');
            $('#modal_search_label').html('Parameter Pencarian');
        });

        $("#tanggal_awal, #tanggal_akhir").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });
    });

    function getListDataLogs(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('logs/api/logs/get_list_logs/page/') ?>' + p,
            data: 'search=' + $('#form_search').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListDataLogs(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_logs tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td class="nowrap">' + ((v.waktu !== null) ? datetimefmysql(v.waktu) : '') + '</td>' +
                        '<td class="nowrap">' + v.menu + '</td>' +
                        '<td>' + v.status + '</td>' +
                        '<td>' + v.url + '</td>' +
                        '<td class="right nowrap">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="showLogs(' + v.id + ')"><i class="fas fa-eye"></i> View</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteLogs(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_logs tbody').append(html);
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
        getListDataLogs(p);
    }

    function showLogs(id) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("logs/api/logs/get_logs_by_id") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#response').html(data.data.response);
                $('#modal_logs').modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteLogs(id, p) {
        Swal.fire({
            title: 'Hapus Data',
            text: "Anda yakin akan menghapus data ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28A745',
            cancelButtonColor: '#d33',
            confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'DELETE',
                    url: '<?= base_url("logs/api/logs/hapus_logs") ?>/id/' + id,
                    cache: false,
                    dataType: 'JSON',
                    success: function(data) {
                        getListDataLogs(p);
                        messageDeleteSuccess();
                    },
                    error: function(e) {
                        messageDeleteFailed();
                    }
                });
            }
        })
    }

    function hapusSemuaLog() {
        Swal.fire({
            title: 'Hapus Semua Data',
            text: "Anda yakin akan menghapus semua data log ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28A745',
            cancelButtonColor: '#d33',
            confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'DELETE',
                    url: '<?= base_url("logs/api/logs/hapus_all_logs") ?>',
                    cache: false,
                    dataType: 'JSON',
                    success: function(data) {
                        getListDataLogs(1);
                        messageDeleteSuccess();
                    },
                    error: function(e) {
                        messageDeleteFailed();
                    }
                });
            }
        })
    }
</script>