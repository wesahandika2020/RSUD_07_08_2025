<script>

    $(function() {

        let pageVal = '';
        let accountGroup = '<?= $this->session->userdata('account_group') ?>';

        getCallPasien(1);

        setInterval(function(){

            let pg = $('#page-now').val();

            if(pg === undefined){

                pg = $('#page-call-navbar').val();

            }

            pageVal = pg;

            getCallPasien(pageVal);
        
        }, 5000);

        if(accountGroup === 'Admin'){

            setInterval(function(){
               getPanggilAntrean();
               getPanggilLantaiDua();
            }, 1000);

            setInterval(function(){
               cekAllx();
            }, 1000);

        }
        
        $("#tanggal_awal, #tanggal_akhir").datepicker({
            format: 'dd/mm/yyyy',
            endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#bt-search').click(function() {
            $('#modal-search').modal('show');
            $('#modal-search-label').html('Parameter Pencarian');
        });

        $('#filter-loket').change(function() {
            getCallPasien(1);
            $('#loket-filter').val($('#filter-loket').val());
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
        

        
        
        $('#btn-reload').click(function() {
            getCallPasien(1);
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

    function searchDokterAntrian(id_spesialisasi = null) {
        $.ajax({
            url: '<?= base_url('masterdata/api/masterdata_auto/get_dokter_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi,
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

    function simpanCallAntrean(id) {
        $('#modal-call-antrean').modal('hide');
        let pesan = 'Apakah anda ingin memanggil Pasien ini ?';
        let confirm_button = 'Panggil';
        let waktuCall = new Date().getTime();
        
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
                    type: 'POST',
                    url: '<?= base_url("panggil_pasien/api/panggil_pasien/simpan_call_antrean") ?>',
                    data: $('#form-call-antrean').serialize() + '&waktu_panggil=' + waktuCall,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        $(".btn-recall-"+id).prop("disabled", true);

                        if(typeof data.metaData !== 'undefined'){

                            if(data.metaData.code === 201){

                                swalAlert('warning', data.metaData.code, data.metaData.message);
                            
                            } else {

                                messageCustom(data.metaData.message, 'Success');
                                // getCallPasien($('#page-call').val());
                                   
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

    function updateStatusAntrian(id) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("panggil_pasien/api/panggil_pasien/updateStatusAntrian") ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                // showLoader();
            },
            success: function(data) {
                
            },
            complete: function() {
                // hideLoader();
            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });
    }

    function getPanggilAntrean() {

        let idTrans = "<?= $this->session->userdata("id_translucent") ?>";

        $.ajax({
            url: '<?= base_url('panggil_pasien/api/panggil_pasien/panggil_antrian') ?>',
            type: 'GET',
            data: 'trans=' + idTrans,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        // messageCustom(data.metaData.message, 'Success');
                    
                    } else {

                        let urutan = data.metaData.angka_audio;

                        var totalwaktu = 1000;

                        setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+data.metaData.huruf_audio+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                        }, totalwaktu);
                        totalwaktu=totalwaktu+800;
                        
                        $.each(data.metaData.urutan_audio, function(i, v) {

                            
                            setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+v+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);
                            totalwaktu=totalwaktu+1000;
                            
                        })
                        
                        setTimeout(function() {
                               $("#audio").empty();
                               $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/loket.wav" type="audio/wav"></audio>');
                               const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);

                        totalwaktu=totalwaktu+800;

                        setTimeout(function() {
                               $("#audio").empty(); 
                               $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+data.metaData.c+'.wav" type="audio/wav"></audio>');
                               const audio = document.querySelector("audio");
                                audio.playbackRate = 1;

                            }, totalwaktu);
                        totalwaktu=totalwaktu+800;

                        setTimeout(function() {
                               $("#audio").empty();
                               updateStatusAntrian(data.metaData.idAntrean);
                               
                            }, totalwaktu);

                        
                    }
                } 
                
            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });
    }


    function getPanggilLantaiDua() {

        let idTrans = "<?= $this->session->userdata("id_translucent") ?>";

        $.ajax({
            url: '<?= base_url('panggil_pasien/api/panggil_pasien/panggil_antrian_lantai_dua') ?>',
            type: 'GET',
            data: 'trans=' + idTrans,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        // messageCustom(data.metaData.message, 'Success');
                    
                    } else {

                        let urutan = data.metaData.angka_audio;

                        var totalwaktu = 0;

                        setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+data.metaData.huruf_audio+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                        }, totalwaktu);
                        totalwaktu=totalwaktu+800;
                        
                        $.each(data.metaData.urutan_audio, function(i, v) {

                            
                            setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+v+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);
                            totalwaktu=totalwaktu+1000;
                            
                        })
                        
                        setTimeout(function() {
                               $("#audio").empty();
                               $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/loket.wav" type="audio/wav"></audio>');
                               const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);

                        totalwaktu=totalwaktu+800;

                        setTimeout(function() {
                               $("#audio").empty(); 
                               $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+data.metaData.c+'.wav" type="audio/wav"></audio>');
                               const audio = document.querySelector("audio");
                                audio.playbackRate = 1;

                            }, totalwaktu);
                        totalwaktu=totalwaktu+800;

                        setTimeout(function() {
                               $("#audio").empty(); 
                               updateStatusAntrian(data.metaData.idAntrean);
                            }, totalwaktu);

                        
                    }
                } 
                
            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });
    }

    function resetAll() {
        $('input[type=text], #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
    }

    function cariDataAntrian() {
        getCallPasien(1);
        $('#modal-search').modal('hide');
    }

    function paging(p) {
        
        getCallPasien(p);
        
    }

    function getCallPasien(p) {

        $('#page-now').val(p);
        $('#page-call-navbar').val(p);

        let filterLoket = '';

        if($('#filter-loket').val() === undefined){

            filterLoket = $('#loket-filter').val();

        } else {

            filterLoket = $('#filter-loket').val();

        }

        $.ajax({
            url: '<?= base_url('panggil_pasien/api/panggil_pasien/data_panggil_pasien') ?>/page/' + p,
            data: $('#form_search').serialize() + '&loket=' + filterLoket,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getCallPasien(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-panggil-pasien tbody').empty();

                let call = '';
                let statusPanggil = '';
                let hitungPanggil = '';
                let disable = '';

                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    if(v.status_panggil === 'x'){

                        disable = "disabled";

                    } else {

                        disable = '';

                    }

                    if((v.panggilan_pasien === 'Call' | v.panggilan_pasien === 'Recall') && v.pasien_hadir === 'Hadir'){

                        call = '<button type="button" '+disable+' class="btn btn-secondary btn-xxs btn-recall-'+v.id+'" onclick="recallPasien(' + v.id + ', \'' + v.nomor_antrean + '\',  \'' + v.panggilan_pasien + '\', \'' + v.kode_bpjs_dokter + '\', \'' + v.kode_bpjs_poli + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Recall</button>';
                        statusPanggilan = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Hadir</span></h5>';

                    } else if(v.panggilan_pasien === 'Call' && v.pasien_hadir === null){

                        call = '<button type="button" '+disable+' class="btn btn-secondary btn-xxs btn-recall-'+v.id+'" onclick="recallPasien(' + v.id + ', \'' + v.nomor_antrean + '\',  \'' + v.panggilan_pasien + '\', \'' + v.kode_bpjs_dokter + '\', \'' + v.kode_bpjs_poli + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Recall</button><button type="button" class="btn btn-secondary btn-xxs" onclick="hadirPasien(' + v.id + ', \'' + v.kode_booking + '\',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Pasien Hadir</button>';
                        statusPanggilan = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Call</i></span>';

                    } else if(v.panggilan_pasien === 'Recall' && v.pasien_hadir === null){

                        if(v.hitung_panggil !== null && v.hitung_panggil !== ''){

                            hitungPanggil = parseInt(v.hitung_panggil);

                            if(hitungPanggil > 2){

                                call = '';

                            } else {

                                call = '<button type="button" '+disable+' class="btn btn-secondary btn-xxs btn-recall-'+v.id+'" onclick="recallPasien(' + v.id + ', \'' + v.nomor_antrean + '\',  \'' + v.panggilan_pasien + '\', \'' + v.kode_bpjs_dokter + '\', \'' + v.kode_bpjs_poli + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Recall</button>';
                            }

                            call += '<button type="button" class="btn btn-secondary btn-xxs" onclick="hadirPasien(' + v.id + ', \'' + v.kode_booking + '\',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Pasien Hadir</button>';
                            statusPanggilan = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Recall</i></span>';

                        } else {

                            call = '<button type="button" '+disable+' class="btn btn-secondary btn-xxs btn-recall-'+v.id+'" onclick="recallPasien(' + v.id + ', \'' + v.nomor_antrean + '\',  \'' + v.panggilan_pasien + '\', \'' + v.kode_bpjs_dokter + '\', \'' + v.kode_bpjs_poli + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Recall</button><button type="button" class="btn btn-secondary btn-xxs" onclick="hadirPasien(' + v.id + ', \'' + v.kode_booking + '\',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Pasien Hadir</button>';
                            statusPanggilan = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Recall</i></span>';

                        }
                        
                    } else {

                        call = '<button type="button" '+disable+' class="btn btn-secondary btn-xxs" onclick="callPasien(' + v.id + ', \'' + v.nomor_antrean + '\',  \'' + v.panggilan_pasien + '\', \'' + v.kode_bpjs_dokter + '\', \'' + v.kode_bpjs_poli + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Call</button>';
                        statusPanggilan = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum Dipanggil</i></span>';


                    }
                    
                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + v.kode_booking + '</td>' +
                        '<td class="center">' + v.nomor_antrean + '</td>' +
                        '<td class="left">' + ((v.poli !== null) ? v.poli : 'Informasi') + '</td>' +
                        '<td>' + ((v.nama_dokter !== null) ? v.nama_dokter : 'Informasi') + '</td>' +
                        '<td class="center">' + ((v.loket_antrean !== null) ? v.loket_antrean : '') + '</td>' +
                        '<td class="center">' + ((v.waktu_panggil !== null) ? datetimefmysql(v.waktu_panggil) : '') + '</td>' +
                        '<td class="center">' + v.status + '</td>' +
                        '<td class="center">' + statusPanggilan + '</td>' +
                        '<td class="center" style="display:flex;float:right">' +
                        call +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPanggilan(' + v.id + ')"><i class="fas fa-check-circle"></i> Detail Panggilan</a>' +
                        '<a class="dropdown-item waves-effect waves-lightht btn-xs" href="javascript:void(0)" onclick="batalAntrean(' + v.id + ', \'' + v.kode_booking + '\', \'' + v.tanggal_kunjungan + '\', ' + v.id_dokter + ',' + p + ')"><i class="fas fa-trash"></i> Batal Antrean</a>' +
                        '</div>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('#table-panggil-pasien tbody').append(html);

                });

            },
            error: function(e) {
                // accessFailed(e.status);
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

    function simpanBatalAntrean() {
        $('#modal-batal-antrean').modal('hide');
        let pesan = 'Apakah anda ingin membatalkan Antrean pada pasien ini ?';
        let confirm_button = 'Simpan';
        let waktuBatal = new Date().getTime();
        
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
                    type: 'POST',
                    url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/batal_antrian") ?>',
                    data: $('#form-batal-antrean').serialize() + '&waktu_batal=' + waktuBatal,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if(typeof data.metaData !== 'undefined'){

                            if(data.metaData.code === 201){

                                swalAlert('warning', data.metaData.code, data.metaData.message);
                                

                            } else {

                                messageCustom('Batal Antrian Berhasil', 'Success');
                                getCallPasien($('#page-batal').val());
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
    
    function detailPanggilan(id) {
        $('#modal-detail-panggilan').modal('show');
        $('#table-panggilan-detail tbody').empty();

        $.ajax({
            url: '<?= base_url('panggil_pasien/api/panggil_pasien/detail_panggilan') ?>/id_detail/' + id,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#modal_detail_panggilan_label').html('Data Detail Panggil Pasien');
                $('#kode-booking-detail').text(data.antrian.kode_booking);
                $('#no-antrean-detail').text(data.antrian.nomor_antrean);
                $('#dokter-tujuan-detail').text(data.antrian.nama_dokter);
                $('#poli-detail').text(data.antrian.poli);
                $('#status-antrean-detail').text(data.antrian.status);
                $('#loket-detail').text(data.antrian.loket_antrean);
                $('#waktu-panggil-detail').text(datetimefmysql(data.antrian.waktu_panggil));
                $('#status-panggilan-detail').text(data.antrian.panggilan_pasien);


                $.each(data.layanan, function(i, v) {

                    let html = '<tr>' +
                        '<td class="left">' + (++i) + '</td>' +
                        '<td class="left">' + v.jenis_panggilan + '</td>' +
                        '<td class="left">' + v.loket + '</td>' +
                        '<td class="left">' + ((v.waktu !== null) ? datetimefmysql(v.waktu) : '') + '</td>' +
                        '</tr>';
                    $('#table-panggilan-detail tbody').append(html);

                });

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function recallPasien(id, no, call, kode_dokter, kode_poli, p) {

        $('#page-call').val(p);
        $('#id-antrean').val(id);
        $('#nomor-antrean').val(no);
        $('#kode-pangggil-dokter').val(kode_dokter);
        $('#kode-pangggil-poli').val(kode_poli);
        $('#tipe-panggil').html('');

        $('#call-antrean').val(call);

        panggil = '<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanCallAntrean('+ id +')"><i class="fas fa-plus-circle"></i> Panggil Ulang</button>';

            $('#tipe-panggil').append(panggil);
        
        $('#modal-call-antrean').modal('show');

    }

    function callPasien(id, no, call, kode_dokter, kode_poli, p) {

        $('#page-call').val(p);
        $('#id-antrean').val(id);
        $('#nomor-antrean').val(no);
        $('#kode-pangggil-dokter').val(kode_dokter);
        $('#kode-pangggil-poli').val(kode_poli);
        
        $('#tipe-panggil').html('');

        $('#call-antrean').val('Belum Dipanggil');

        panggil = '<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanCallAntrean('+ id +')"><i class="fas fa-plus-circle"></i> Panggil</button>';

        $('#tipe-panggil').append(panggil);

        

        $('#modal-call-antrean').modal('show');

    }

    function hadirPasien(id, kode, p) {

        let pesan = 'Apakah Pasien sudah Hadir ?';
        let confirm_button = 'Hadir';
        
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
                    type: 'POST',
                    url: '<?= base_url("panggil_pasien/api/panggil_pasien/simpan_kehadiran_pasien") ?>',
                    data: '&id_hadir=' + id + '&kode=' + kode,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if(typeof data.metaData !== 'undefined'){

                            if(data.metaData.code === 201){

                                swalAlert('warning', data.metaData.code, data.metaData.message);
                                

                            } else {

                                messageCustom(data.metaData.message, 'Success');
                                getCallPasien(p);
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

    function cekAllx(){

        $.ajax({
            type: 'POST',
            url: '<?= base_url("panggil_pasien/api/panggil_pasien/cekAllx") ?>',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                
            },
            success: function(data) {

            },
            complete: function() {
                
            },
            error: function(e) {
                
            }
        })

    }

    
</script>