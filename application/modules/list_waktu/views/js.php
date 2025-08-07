<script>
    $(function() {
        getListWaktuTask();

        $('#cek-kode-booking').click(function() {
            $('#modal-kode-booking').modal('show');
            $('#modal-kode-label').html('Cek Kode Booking');
        });
        
        $('#btn-reload').click(function() {
            resetAll();
            getListWaktuTask();
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

    });

    function resetAll() {
        $('input[type=text], #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getListWaktuTask() {

        let tanggalTunggu = new Date().getTime();

        // let tanggal = new Date().getDate();
        // let bulan = new Date().getMonth();
        // let tahun = new Date().getFullYear();

        // let waktuFull = tahun + '-' + (bulan+1) + '-' + tanggal + ' ' + '07' + ':' + '30';


        // console.log(new Date(waktuFull).getTime());
        // Wed Jul 06 2022 15:03:45 GMT+0700 (Western Indonesia Time)

        let kodeBooking = $('#lw-kode-booking').val();

        if ($('#lw-kode-booking').val() == '') {
            syams_validation('#lw-kode-booking', 'Silahkan isi Kode Booking terlebih dahulu');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('list_waktu/api/list_waktu/list_waktu_task') ?>/kode_booking/' + kodeBooking,
            // url: '<?= base_url('list_waktu/api/list_waktu/update_waktu_task') ?>/tanggal_tunggu/' + tanggalTunggu,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 204){

                        swalAlert('warning', 'Validasi', data.metaData.message);

                        // console.log(new Date().getTime());console.log(new Date(1656575668543));
                        // console.log(new Date("Thu Jun 30 2022 15:00:00 GMT+0700 (Western Indonesia Time)").getTime());
                        // console.log(new Date(1595)); php round(microtime(true) * 1000)
                    
                    }

                }

                if(typeof data.metadata !== 'undefined'){

                    if(data.metadata.code === 200 && data.response === null){

                        swalAlert('warning', 'Validasi', 'Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS');

                        // console.log(new Date().getTime());console.log(new Date(1656575668543));
                        // console.log(new Date("Thu Jun 30 2022 15:00:00 GMT+0700 (Western Indonesia Time)").getTime());
                    
                    } else {

                        $('#table-list-task tbody').empty();
                        $('#kode-booking').empty();


                        $('#kode-booking').html('Kode Booking : ' + kodeBooking);
                        $.each(data.response, function(i, v) {

                            let html = /* html */ `
                                <tr>
                                    <td class="list-task" align="center">${++i}</td>
                                    <td align="left">${v.taskname}</td>
                                    <td align="center">${v.taskid}</td>
                                    <td align="center">${v.waktu}</td>
                                    <td align="center">${v.wakturs}</td>
                                    <td align="center">${v.kodebooking}</td>
                                    <td align="center"></td>
                                </tr>
                            `;
                            $('#table-list-task tbody').append(html);

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