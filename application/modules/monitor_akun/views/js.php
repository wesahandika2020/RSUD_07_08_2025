<script>

    $(function() {

        $('#monitor-akun-label').html('MONITOR AKUN PANGGIL LOKET PENDAFTARAN');
        $('#monitor-akun-lantai-dua-label').html('MONITOR AKUN PANGGIL LOKET LANTAI DUA');
        getMonitorAkun(1);
        getMonitorLantaiDua(1);

        
    });

    $('#btn-reload').click(function() {
        getMonitorAkun(1);
        getMonitorLantaiDua(1);
    });

    function paging(p) {
        
        getMonitorAkun(p);
        
    }

    function paging2(p) {
        
        getMonitorLantaiDua(p);
        
    }

    function getMonitorAkun(p) {

        $('#page-now').val(p);

        $.ajax({
            url: '<?= base_url('monitor_akun/api/monitor_akun/data_monitor_akun') ?>/page/' + p,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getMonitorAkun(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-monitor-akun tbody').empty();

                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let html = '<tr>' +
                        '<td class="left">' + no + '</td>' +
                        '<td class="left">' + v.kode_booking + '</td>' +
                        '<td class="center">' + v.huruf_antrean + '</td>' +
                        '<td class="center">' + ((v.urutan !== null) ? v.urutan : '') + '</td>' +
                        '<td class="center">' + ((v.loket_antrean !== null) ? v.loket_antrean : '') + '</td>' +
                        '<td class="center">' + ((v.create_date !== null) ? datetimefmysql(v.create_date) : '') + '</td>' +
                        '<td class="left">' + v.nama_account + '</td>' +
                        '</tr>';
                    $('#table-monitor-akun tbody').append(html);

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

    function getMonitorLantaiDua(p) {

        $('#page-lantai').val(p);

        $.ajax({
            url: '<?= base_url('monitor_akun/api/monitor_akun/data_monitor_akun_lantai_dua') ?>/page/' + p,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getMonitorAkun(p - 1);
                    return false;
                }

                $('#pagination2').html(pagination2(data.jumlah, data.limit, data.page, 1));
                $('#summary2').html(page_summary2(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-monitor-akun-lantai-dua tbody').empty();

                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let html = '<tr>' +
                        '<td class="left">' + no + '</td>' +
                        '<td class="left">' + v.kode_booking + '</td>' +
                        '<td class="center">' + v.huruf_antrean + '</td>' +
                        '<td class="center">' + ((v.urutan !== null) ? v.urutan : '') + '</td>' +
                        '<td class="center">' + ((v.loket_antrean !== null) ? v.loket_antrean : '') + '</td>' +
                        '<td class="center">' + ((v.create_date !== null) ? datetimefmysql(v.create_date) : '') + '</td>' +
                        '<td class="left">' + v.nama_account + '</td>' +
                        '</tr>';
                    $('#table-monitor-akun-lantai-dua tbody').append(html);

                });

            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });

    }

</script>