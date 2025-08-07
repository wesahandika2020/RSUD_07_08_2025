<script>
    $(function() {
        
        $("#wizard-bridging").bwizard();

        getBridgingAntrian(1);
        getKirimAntrian(1);

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
            getBridgingAntrian(1);
        });

        $('#btn-bridging').click(function() {
            getKirimAntrian(1);
        });

        $('#integra-antrian').click(function() {
            $('#modal-validasi-integra').modal('show');
        });

        $('#nm-poli').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('antrian_bpjs/api/antrian_bpjs/kode_bpjs') ?>",
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
                searchDokterAntrian(data.id);
                return data.nama;
            }
        });

        $('#nmpoli').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('antrian_bpjs/api/antrian_bpjs/kode_bpjs') ?>",
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
                searchDokterKirim(data.id);
                return data.nama;
            }
        });

    });

    function validIntegrasi() {

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
                    url: '<?= base_url("bridging_antrian/api/bridging_antrian/validasi_kirim") ?>',
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
                                getBridgingAntrian(1);
                                getKirimAntrian(1);
                                $('#modal-validasi-integra').modal('hide');

                            } else {

                                messageCustom(data.metaData.message, 'Success');
                                getBridgingAntrian(1);
                                getKirimAntrian(1);
                                $('#modal-validasi-integra').modal('hide');

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

    function searchDokterKirim(id_spesialisasi = null) {
        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/get_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Dokter</option>';
                $.each(data, function(i, v) {
                    html += '<option value="' + v.id + '"><b>' + v.dokter + '</b> - <small>' + v.spesialisasi +' '+ v.jml_terlayani +  '</small></option>';
                });

                $('#nmdokter').html(html);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function searchDokterAntrian(id_spesialisasi = null) {
        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/get_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Dokter</option>';
                $.each(data, function(i, v) {
                    html += '<option value="' + v.id + '"><b>' + v.dokter + '</b> - <small>' + v.spesialisasi +' '+ v.jml_terlayani +  '</small></option>';
                });

                $('#nm-dokter').html(html);

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function cariDataAntrian() {
        getBridgingAntrian(1);
        $('#modal-search').modal('hide');
    }

    function paging(p) {
        
        getBridgingAntrian(p);
        
    }

    function getBridgingAntrian(p) {
        $('#page-now').val(p);
        $.ajax({
            url: '<?= base_url('bridging_antrian/api/bridging_antrian/data_bridging_antrian') ?>/page/' + p,
            data: $('#form_search').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getBridgingAntrian(p - 1);
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

                        statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="statusResponse(' + v.id + ',  ' + v.status_respon + ', \'' + v.kode_booking + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Kirim BPJS</button>';

                    }

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="left">' + v.kode_booking + '</td>' +
                        '<td class="center">' + v.nomor_antrean + '</td>' +
                        '<td class="center">' + ((v.poli !== null) ? v.poli : '') + '</td>' +
                        '<td>' + ((v.nama_dokter !== null) ? v.nama_dokter : '') + '</td>' +
                        '<td class="center">' + ((v.kirim_bpjs !== null) ? v.kirim_bpjs : 'Belum') + '</td>' +
                        '<td class="center">' + ((v.respon_bpjs !== null) ? v.respon_bpjs : '') + '</td>' +
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
        getKirimAntrian(p);
    }

    function cariDataKirimAntrian() {
        getKirimAntrian(1);
        $('#modal-kirim-search').modal('hide');
    }

    function getKirimAntrian(p) {
        $('#hal-ini').val(p);
        $.ajax({
            url: '<?= base_url('bridging_antrian/api/bridging_antrian/data_kirim_antrian') ?>/page/' + p,
            data: $('#form-kirim-search').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getKirimAntrian(p - 1);
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

                        statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="statusResponse(' + v.id + ',  ' + v.status_respon + ', \'' + v.kode_booking + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Kirim BPJS</button>';

                    }

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="left">' + v.kode_booking + '</td>' +
                        '<td class="center">' + v.nomor_antrean + '</td>' +
                        '<td class="center">' + v.poli + '</td>' +
                        '<td>' + v.nama_dokter + '</td>' +
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

    function statusResponse(id, status, kode_booking, p) {

        let pesan = 'Apakah anda ingin mengirim ulang booking BPJS untuk pasien ini ?';
        let confirm_button = 'Booking Ulang';
        let tanggalTunggu = new Date().getTime();
        
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
                    url: '<?= base_url('bridging_antrian/api/bridging_antrian/booking_ulang') ?>/id/' + id,
                    type: 'GET',
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if(data.metaData.code === 200){

                            //pending 
                            bookingUlangBPJS(id, p);


                        } else {


                            swalAlert('warning', data.metaData.code, data.metaData.message);

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

    function bookingUlangBPJS(id, p) {

        $.ajax({
            type: 'POST',
            url: '<?= base_url('bridging_antrian/api/bridging_antrian/booking_kembali') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code !== 200){

                        swalAlert('warning', data.metaData.code, data.metaData.message);
                        

                    } else {

                        $('#modal-tambah-antrean').modal('hide');
                        getKirimAntrian(p);
                        messageCustom('Booking Ulang BPJS Berhasil', 'Success');
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