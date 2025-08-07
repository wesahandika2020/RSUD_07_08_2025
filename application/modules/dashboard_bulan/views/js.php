<script>
    $(function() {
        getDashboardPerBulan();

        $('#cek-dashboard-bulan').click(function() {
            $('#modal-dashboard-bulan').modal('show');
            $('#modal-dashboard-bulan-label').html('Filter Tanggal Dashboard');
        });
        
        $('#btn-reload').click(function() {
            resetAll();
            getDashboardPerBulan();
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

        $('#tahun-dash').datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true //to close picker once year is selected
        });

    });

    function resetAll() {
        $('input[type=text], #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
    }

    function proses(detik){
        let x = detik;
        var y = '';
        var jam = '';
        var menit = '';
        var detik = '';

        y = x % 3600;
        jam   = x / 3600;
        menit = y / 60;
        detik = y % 60;

        return Math.floor(jam) + ' Jam ' + Math.floor(menit) + ' Mnt ' + Math.floor(detik) + ' Dtk ';
    }

    function tanggal_masuk(date) {
        let day = date.getDate();
        let month = date.getMonth();
        let year = date.getFullYear();

        return day + '/' + (month+1) + '/' + year;
    }

    function getDashboardPerBulan() {

        $('#modal-dashboard-bulan').modal('hide');

        let bulanDashboard = $('#bulan-dash').val();
        let tahunDashboard = $('#tahun-dash').val();
        let jenisWaktu = $('#jenis-waktu').val();

        
        if ($('#bulan-dash').val() == '') {
            syams_validation('#bulan-dash', 'Silahkan pilih Bulan terlebih dahulu');
            return false;
        }

        if ($('#tahun-dash').val() == '') {
            syams_validation('#tahun-dash', 'Silahkan pilih Tahun terlebih dahulu');
            return false;
        }

        if ($('#jenis-waktu').val() == '') {
            syams_validation('#jenis-waktu', 'Silahkan pilih Jenis terlebih dahulu');
            return false;
        }

        $('#table-dashboard-bulan tbody').empty();
        $('#bulan-dashboard-label').empty();

        $('#bulan-dashboard-label').html('Bulan : ' + bulanDashboard + '/' + tahunDashboard);
        
        $.ajax({
            type: 'GET',
            url: '<?= base_url('dashboard_bulan/api/dashboard_bulan/dashboard_bulan') ?>/bulan/' + bulanDashboard + '/tahun/' + tahunDashboard + '/waktu/' + jenisWaktu,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 404){

                        swalAlert('warning', 'Validasi', data.metaData.message);

                        // console.log(new Date().getTime());console.log(new Date(1656575668543));
                        // console.log(new Date("Thu Jun 30 2022 15:00:00 GMT+0700 (Western Indonesia Time)").getTime());
                    
                    }

                }

                if(typeof data.metadata !== 'undefined'){

                    if(data.metadata.code === 201){

                        swalAlert('warning', 'Validasi', data.metadata.message);

                    } else {

                        $.each(data.response.list, function(i, v) {

                            let masuk = new Date(v.insertdate);

                            let waktuMasuk = '';

                            waktuMasuk = tanggal_masuk(masuk);

                            let html = /* html */ `
                                <tr>
                                    <td class="jadwal-hfis" align="center">${++i}</td>
                                    <td align="center">${datefmysql(v.tanggal)}</td>
                                    <td align="center">${v.namapoli}</td>
                                    <td align="center">${v.jumlah_antrean}</td>
                                    <td align="center">${waktuMasuk}</td>
                                    <td align="center">${proses(v.waktu_task1)}</td>
                                    <td align="center">${proses(v.avg_waktu_task1)}</td>
                                    <td align="center">${proses(v.waktu_task2)}</td>
                                    <td align="center">${proses(v.avg_waktu_task2)}</td>
                                    <td align="center">${proses(v.waktu_task3)}</td>
                                    <td align="center">${proses(v.avg_waktu_task3)}</td>
                                    <td align="center">${proses(v.waktu_task4)}</td>
                                    <td align="center">${proses(v.avg_waktu_task4)}</td>
                                    <td align="center">${proses(v.waktu_task5)}</td>
                                    <td align="center">${proses(v.avg_waktu_task5)}</td>
                                    <td align="center">${proses(v.waktu_task6)}</td>
                                    <td align="center">${proses(v.avg_waktu_task6)}</td>
                                    <td align="center"></td>
                                </tr>
                            `;
                            $('#table-dashboard-bulan tbody').append(html);

                        })   

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

    
</script>