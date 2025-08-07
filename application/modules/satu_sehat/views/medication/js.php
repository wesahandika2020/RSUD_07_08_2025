<script>
$(function() {

    $("#wizard-medication").bwizard();

    getDataMedication(1);
    getIntegrasiMedication(1);

    $('#tanggal-awal, #tanggal-akhir,#tanggal-awal-layanan, #tanggal-akhir-layanan').datepicker({
        format: 'dd/mm/yyyy'
    }).on('changeDate', function() {
        $(this).datepicker('hide');
    });
    
    $('#bt-search-medication').click(function() {
        $('#modal-search-medication').modal('show');
        $('#modal-search-label-medication').html('Parameter Pencarian');
    });

    $('#bt-integrasi-medication').click(function() {
        $('#modal-search-integrasi-medication').modal('show');
        $('#modal-search-integrasi-label-medication').html('Parameter Pencarian');
    });

    $('#btn-reload-medication').click(function() {
        getDataMedication(1);
    });

    $('#btn-reload-int-medication').click(function() {
        getIntegrasiMedication(1);
    });


})

function paging(p) {
        
    getDataMedication(p);
    
}

function cariDataMedication() {
    getDataMedication(1);
    $('#modal-search-medication').modal('hide');
}

function getDataMedication(page) {

    $('#page-medication').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/ambil_medication/page/') ?>' + page,
        data: $('#form-search-medication').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getDataMedication(page - 1);
                return false;
            }

            $('#pagination-medication').html(pagination(data.jumlah, data.limit, data.page, 1));
            $('#summary-medication').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-medication tbody').empty();

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.tanggal_resep !== null) ? datetime2date(v.tanggal_resep) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="left">' + ((v.nama_barang !== null) ? v.nama_barang : '') + '</td>' +
                    '<td class="center">' + ((v.id_integrasi_resep !== null) ? 'OK' : '') + '</td>' +
                    '<td class="center">' + ((v.id_medication_request !== null) ? 'OK' : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiMedicationRequest(' + v.id + ',  ' + page + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Medication Request</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="updateMedication(' + v.id + ',  ' + page + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Update Medication</a>' +
                        '</div>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';

                $('#table-satset-medication tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function integrasiMedicationRequest(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasiMedicationRequest") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201){

                            messageCustom(data.metaData.message, 'Success');
                            getDataMedication(1);

                        } else {

                            messageCustom(data.metaData.message, 'Error');
                            getDataMedication(1);

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

function updateMedication(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/updateMedication") ?>',
                data: 'id=' + id + '&x=Edit',
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201){

                            messageCustom(data.metaData.message, 'Success');
                            getDataMedication(1);

                        } else {

                            messageCustom(data.metaData.message, 'Error');
                            getDataMedication(1);

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
    getIntegrasiMedication(p);
}

function cariIntegrasiMedication() {
    getIntegrasiMedication(1);
    $('#modal-search-integrasi-medication').modal('hide');
}

function getIntegrasiMedication(p) {
    $('#hal-medication').val(p);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/integrasi_medication') ?>/page/' + p,
        data: $('#form-kirim-medication').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getIntegrasiMedication(p - 1);
                return false;
            }

            $('#kirim-pagination-medication').html(pagination2(data.jumlah, data.limit, data.page, 1));
            $('#kirim-summary-medication').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-kirim-medication tbody').empty();

            let statusRespon = '';
            
            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.tanggal_resep !== null) ? datetime2date(v.tanggal_resep) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="left">' + ((v.nama_barang !== null) ? v.nama_barang : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiMedication(' + v.id + ',  ' + p + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Medication</a>' +
                        '</div>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';

                $('#table-satset-kirim-medication tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function integrasiMedication(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasiMedication") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201){

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiMedication(p);
                            getDataMedication(1);

                        } else {

                            messageCustom(data.metaData.message, 'Error');
                            getIntegrasiMedication(p);
                            getDataMedication(1);

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