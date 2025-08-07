<script>
$(function() {

    $("#wizard-observasi").bwizard();

    getDataObservasi(1);
    getIntegrasiObservasi(1);

    $('#bt-search-observasi').click(function() {
        $('#modal-search-observasi').modal('show');
        $('#modal-search-label-observasi').html('Parameter Pencarian');
    });

    $('#bt-integrasi-observasi').click(function() {
        $('#modal-search-integrasi-observasi').modal('show');
        $('#modal-search-integrasi-label-observasi').html('Parameter Pencarian');
    });

    $('#btn-reload-observasi').click(function() {
        getDataObservasi(1);
    });

    $('#btn-reload-int-observasi').click(function() {
        getIntegrasiObservasi(1);
    });


})

function paging(p) {
        
    getDataObservasi(p);
    
}

function cariDataObservasi() {
    getDataObservasi(1);
    $('#modal-search-observasi').modal('hide');
}

function getDataObservasi(page) {

    $('#page-observasi').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/ambil_observasi/page/') ?>' + page,
        data: $('#form-search-observasi').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getDataObservasi(page - 1);
                return false;
            }

            $('#pagination-observasi').html(pagination(data.jumlah, data.limit, data.page, 1));
            $('#summary-observasi').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-observasi tbody').empty();

            let updateObservasi = '';

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                
                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.tanggal_layanan !== null) ? datetime2date(v.tanggal_layanan) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_sistolik !== null) ? 'OK' : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_diastolik !== null) ? 'OK' : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_nadi !== null) ? 'OK' : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_rr !== null) ? 'OK' : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_suhu !== null) ? 'OK' : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiSistolik(' + v.id_tindakan + ',  ' + page + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Sistolik</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiDiastolik(' + v.id_tindakan + ',  ' + page + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Diastolik</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiNadi(' + v.id_tindakan + ',  ' + page + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Nadi</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiRespirasi(' + v.id_tindakan + ',  ' + page + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Respirasi</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiSuhu(' + v.id_tindakan + ',  ' + page + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Suhu</a>' +
                        '</div>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';

                $('#table-satset-observasi tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function updateObservasi(id, p) {

    let pesan = 'Apakah Anda ingin melakukan Integrasi?';
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
                type: 'PUT',
                url: '<?= base_url("satu_sehat/api/satu_sehat/update_observasi") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201 | data.metaData.code === 202 | data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            getDataObservasi(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getDataObservasi(1);

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

function paging2(p) {
    getIntegrasiObservasi(p);
}

function cariIntegrasiObservasi() {
    getIntegrasiObservasi(1);
    $('#modal-search-integrasi-observasi').modal('hide');
}

function getIntegrasiObservasi(p) {
    $('#hal-observasi').val(p);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/integrasi_observasi') ?>/page/' + p,
        data: $('#form-kirim-observasi').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getIntegrasiObservasi(p - 1);
                return false;
            }

            $('#kirim-pagination-observasi').html(pagination2(data.jumlah, data.limit, data.page, 1));
            $('#kirim-summary-observasi').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-kirim-observasi tbody').empty();

            let statusRespon = '';
            
            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.tanggal_layanan !== null) ? datetime2date(v.tanggal_layanan) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_sistolik !== null) ? 'OK' : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_diastolik !== null) ? 'OK' : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_nadi !== null) ? 'OK' : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_rr !== null) ? 'OK' : '') + '</td>' +
                    '<td class="center">' + ((v.id_satset_suhu !== null) ? 'OK' : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiSistolik(' + v.id_tindakan + ',  ' + p + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Sistolik</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiDiastolik(' + v.id_tindakan + ',  ' + p + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Diastolik</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiNadi(' + v.id_tindakan + ',  ' + p + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Nadi</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiRespirasi(' + v.id_tindakan + ',  ' + p + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Respirasi</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiSuhu(' + v.id_tindakan + ',  ' + p + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Suhu</a>' +
                        '</div>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';

                $('#table-satset-kirim-observasi tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function integrasiSistolik(id, p) {

    let pesan = 'Apakah Anda ingin melakukan Integrasi?';
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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_sistolik") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

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

function integrasiDiastolik(id, p) {

    let pesan = 'Apakah Anda ingin melakukan Integrasi?';
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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_diastolik") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

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

function integrasiNadi(id, p) {

    let pesan = 'Apakah Anda ingin melakukan Integrasi?';
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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_nadi") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

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

function integrasiRespirasi(id, p) {

    let pesan = 'Apakah Anda ingin melakukan Integrasi?';
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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_respirasi") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

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

function integrasiSuhu(id, p) {

    let pesan = 'Apakah Anda ingin melakukan Integrasi?';
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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_suhu") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiObservasi(p);
                            getDataObservasi(1);

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

</script>