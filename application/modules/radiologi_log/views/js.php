<script>

    $(function() {

        $('#monitor-radiologi-del-label').html('MONITOR RADIOLOGI LOG DELETE');
        $('#monitor-radiologi-acc-label').html('MONITOR RADIOLOGI LOG ACC NUMBER');
        getMonitorRadiologiDel(1);
        getMonitorRadiologiAcc(1);

        $('#bt-search').click(function() {
            $('#modal-del-acc').modal('show');
            $('#modal-del-acc-label').html('Parameter Pencarian');
        });

        $('#search-acc').click(function() {
            $('#modal-cari-acc').modal('show');
            $('#modal-cari-acc-label').html('Parameter Pencarian');
        });

        $('#btn-reload').click(function() {
            getMonitorRadiologiDel(1);
            getMonitorRadiologiAcc(1);
        });

        
    });

    
    function cariDataLogDel() {
        getMonitorRadiologiDel(1);
        $('#modal-del-acc').modal('hide');
    }

    function cariDataLogAcc() {
        getMonitorRadiologiAcc(1);
        $('#modal-cari-acc').modal('hide');
    }

    function paging(p) {
        
        getMonitorRadiologiDel(p);
        
    }

    function paging2(p) {
        
        getMonitorRadiologiAcc(p);
        
    }



    function getMonitorRadiologiDel(p) {

        $('#page-now').val(p);

        $.ajax({
            url: '<?= base_url('radiologi_log/api/radiologi_log/data_radiologi_hapus') ?>/page/' + p,
            data: $('#form-cari-log').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getMonitorRadiologiDel(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-radiologi-del tbody').empty();

                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + v.no_rm + '</td>' +
                        '<td class="left">' + v.nama_pasien + '</td>' +
                        '<td class="left">' + v.tindakan + '</td>' +
                        '<td class="center">' + v.accessnumber + '</td>' +
                        '<td class="center">' + v.instance_uid + '</td>' +
                        '<td class="left">' + ((v.nama !== null) ? v.nama : '') + '</td>' +
                        '<td class="center">' + ((v.waktu !== null) ? datetimefmysql(v.waktu) : '') + '</td>' +
                        '</tr>';
                    $('#table-radiologi-del tbody').append(html);

                });

            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });

    }

    function page_summary2(total_data, total_datapage, limit, page) {
        var start = ((page - 1) * limit) + 1;

        var finish = (start - 1) + total_datapage;
        if (finish < 1) {
            start = 0;
        };
        var str = '<div class="dataTables_info">Showing ' + start + ' to ' + finish + ' of ' + total_data + ' entries</div>';

        return str;
    }

    function getMonitorRadiologiAcc(p) {

        $('#page-lantai').val(p);

        $.ajax({
            url: '<?= base_url('radiologi_log/api/radiologi_log/data_radiologi_acc') ?>/page/' + p,
            data: $('#form-cari-acc').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getMonitorRadiologiAcc(p - 1);
                    return false;
                }

                $('#pagination2').html(pagination2(data.jumlah, data.limit, data.page, 1));
                $('#summary2').html(page_summary2(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-radiologi-acc tbody').empty();

                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + v.no_rm + '</td>' +
                        '<td class="left">' + v.nama_pasien + '</td>' +
                        '<td class="center">' + v.acc_lama + '</td>' +
                        '<td class="center">' + v.acc_baru + '</td>' +
                        '<td class="center">' + v.instance_uid + '</td>' +
                        '<td class="left">' + ((v.nama_user !== null) ? v.nama_user : '') + '</td>' +
                        '<td class="center">' + ((v.waktu !== null) ? datetimefmysql(v.waktu) : '') + '</td>' +
                        '</tr>';
                    $('#table-radiologi-acc tbody').append(html);

                });

            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });

    }

</script>