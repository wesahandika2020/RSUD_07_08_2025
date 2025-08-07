<script>
    $(function() {
        
        $("#wizard-bridging").bwizard();

        getBridgingTask(1);
        getKirimTask(1);

        $('#bt-search').click(function() {
            $('#modal-search').modal('show');
            $('#modal-search-label').html('Parameter Pencarian');
        });

        $("#tanggal_awal, #tanggal_akhir, #tanggal-integrasi, #tanggal_a_kunjungan, #tanggal_kh_kunjungan").datepicker({
            format: 'dd/mm/yyyy',
            endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#bt-search-bridging').click(function() {
            $('#modal-kirim-search').modal('show');
            $('#modal-kirim-search-label').html('Parameter Pencarian');
        });

        $('#btn-reload').click(function() {
            getBridgingTask(1);
        });

        $('#btn-bridging').click(function() {
            getKirimTask(1);
        });

        $('#integra-antrian').click(function() {
            $('#modal-validasi-integra').modal('show');
        });

    });

    function validTask() {

        let pesan = 'Apakah Anda melakukan Integrasi ?';
        let confirm_button = 'Integrasi';
                    
        swal.fire({
            title: 'Integrasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("bridging_task/api/bridging_task/validasi_task") ?>',
                    data: $('#form-integrasi').serialize(),
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        
                        if(typeof data.metaData !== 'undefined'){

                            if(data.metaData.code === 201 | data.metaData.code === 202 | data.metaData.code === 400){

                                messageCustom(data.metaData.message, 'Error');
                                getBridgingTask(1);
                                getKirimTask(1);

                            } else {

                                messageCustom(data.metaData.message, 'Success');
                                $('#modal-validasi-integra').modal('hide');
                                getBridgingTask(1);
                                getKirimTask(1);

                            }

                        }
                            
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                })

            }
        });

    }

    function cariDataTask() {
        getBridgingTask(1);
        $('#modal-search').modal('hide');
    }

    function paging(p) {
        
        getBridgingTask(p);
        
    }

    function getBridgingTask(p) {
        $('#page-now').val(p);
        $.ajax({
            url: '<?= base_url('bridging_task/api/bridging_task/data_bridging_task') ?>/page/' + p,
            data: $('#form_search').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                
                if ((p > 1) & (data.data.length === 0)) {
                    getBridgingTask(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-bridging-antrian tbody').empty();

                let batalAntrian = '';
                let disDropdown = '';
                let statusRespon = '';
                let dataWA = '';

                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    if(v.respon_bpjs === '200'){

                        statusRespon = '';
                    
                    } else {

                        statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="statusResponse(' + v.id + ',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Kirim Task</button>';

                    }

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="left">' + v.kode_booking + '</td>' +
                        '<td class="center">' + ((v.nomor_task !== null) ? v.nomor_task : 'Belum') + '</td>' +
                        '<td class="center">' + ((v.kirim_bpjs !== null) ? v.kirim_bpjs : 'Belum') + '</td>' +
                        '<td class="center">' + ((v.respon_bpjs !== null) ? v.respon_bpjs : '') + '</td>' +
                        '<td class="center">' + ((v.ket_bridging !== null) ? v.ket_bridging : '') + '</td>' +
                        '<td class="right" style="display:flex;float:right">' +
                        statusRespon +
                        '</td>' +
                        '</tr>';

                    $('#table-bridging-antrian tbody').append(html);

                });

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function paging2(p) {
        getKirimTask(p);
    }

    function cariDataKirimTask() {
        getKirimTask(1);
        $('#modal-kirim-search').modal('hide');
    }

    function getKirimTask(p) {
        $('#hal-ini').val(p);
        $.ajax({
            url: '<?= base_url('bridging_task/api/bridging_task/data_kirim_task') ?>/page/' + p,
            data: $('#form-kirim-search').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getKirimTask(p - 1);
                    return false;
                }

                $('#kirim-pagination').html(pagination2(data.jumlah, data.limit, data.page, 1));
                $('#kirim-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-kirim-antrian tbody').empty();

                let statusRespon = '';
                
                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    if(v.respon_bpjs === '200'){

                        statusRespon = '';
                    
                    } else {

                        if(v.nomor_task === '99'){

                            statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="statusBatal(' + v.id + ',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Kirim Task</button>';

                        } else {

                            statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="statusResponse(' + v.id + ',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Kirim Task</button>';

                        }

                    }

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="left">' + v.kode_booking + '</td>' +
                        '<td class="center">' + ((v.nomor_task !== null) ? v.nomor_task : 'Belum') + '</td>' +
                        '<td class="center">' + ((v.kirim_bpjs !== null) ? v.kirim_bpjs : 'Belum') + '</td>' +
                        '<td class="center">' + ((v.respon_bpjs !== null) ? v.respon_bpjs : '') + '</td>' +
                        '<td class="center">' + ((v.ket_bridging !== null) ? v.ket_bridging : '') + '</td>' +
                        '<td class="right" style="display:flex;float:right">' +
                        statusRespon +
                        '</td>' +
                        '</tr>';

                    $('#table-kirim-antrian tbody').append(html);

                });

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function batalAntrean(id, kode_booking, tanggal, id_dokter, p) {
        $('#page-batal').val(p);
        $('#kode-batal-booking').val(kode_booking);
        $('#tanggal-kunjungan-batal').val(tanggal);
        $('#kode-batal-dokter').val(id_dokter);
        $('#id-batal').val(id);
        $('#modal-batal-antrean').modal('show');
        
    }

    function statusResponse(id, p) {

        let pesan = 'Apakah anda ingin mengirim task BPJS untuk Antrian ini ?';
        let confirm_button = 'Kirim';
        
        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('bridging_task/api/bridging_task/booking_task') ?>/id/' + id,
                    type: 'GET',
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if(typeof data.metaData !== 'undefined'){

                            if(data.metaData.code !== 200){

                                swalAlert('warning', data.metaData.code, data.metaData.message);
                                getKirimTask(p);
                                

                            } else {

                                getKirimTask(p);
                                messageCustom('Kirim Task Berhasil', 'Success');
                            }

                            

                        }
                            
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                        
                });

            }

        });

    }

    function statusBatal(id, p) {

        let pesan = 'Apakah anda ingin mengirim Pembatalan untuk Antrian ini ?';
        let confirm_button = 'Kirim';
        
        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('bridging_task/api/bridging_task/batal_antrean') ?>/id/' + id,
                    type: 'POST',
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if(typeof data.metaData !== 'undefined'){

                            if(data.metaData.code !== 200){

                                swalAlert('warning', data.metaData.code, data.metaData.message);
                                getKirimTask(p);
                                getBridgingTask(1);
                                

                            } else {

                                getKirimTask(p);
                                getBridgingTask(1);
                                messageCustom('Kirim Task Berhasil', 'Success');
                            }

                            

                        }
                            
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                        
                });

            }

        });

    }

    

</script>