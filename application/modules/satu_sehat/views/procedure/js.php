<script>
$(function() {

    $("#wizard-procedure").bwizard();

    getDataProcedure(1);
    getIntegrasiProcedure(1);

    $('#bt-search-procedure').click(function() {
        $('#modal-search-procedure').modal('show');
        $('#modal-search-label-procedure').html('Parameter Pencarian');
    });

    $('#bt-integrasi-procedure').click(function() {
        $('#modal-search-integrasi-procedure').modal('show');
        $('#modal-search-integrasi-label-procedure').html('Parameter Pencarian');
    });

    $('#btn-reload-procedure').click(function() {
        getDataProcedure(1);
    });

    $('#btn-reload-int-procedure').click(function() {
        getIntegrasiProcedure(1);
    });


})

function paging(p) {
        
    getDataProcedure(p);
    
}

function cariDataProcedure() {
    getDataProcedure(1);
    $('#modal-search-procedure').modal('hide');
}

function getDataProcedure(page) {

    $('#page-procedure').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/ambil_procedure/page/') ?>' + page,
        data: $('#form-search-procedure').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getDataProcedure(page - 1);
                return false;
            }

            $('#pagination-procedure').html(pagination(data.jumlah, data.limit, data.page, 1));
            $('#summary-procedure').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-procedure tbody').empty();

            let updateProcedure = '';

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                
                updateProcedure = '<button type="button" class="btn btn-secondary btn-xxs" onclick="updateProcedure(' + v.id_tindakan + ',  ' + page + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.tanggal_layanan !== null) ? datetime2date(v.tanggal_layanan) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="left">' + ((v.nama_layanan !== null) ? v.nama_layanan : '') + '</td>' +
                    '<td class="center">' + ((v.icd9 !== null) ? v.icd9 : '') + '</td>' +
                    '<td class="left">' + ((v.nama_tindakan !== null) ? v.nama_tindakan : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        updateProcedure +
                    '</td>' +
                    '</tr>';

                $('#table-satset-procedure tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function updateProcedure(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/update_procedure") ?>',
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
                            getDataProcedure(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getDataProcedure(1);

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
    getIntegrasiProcedure(p);
}

function cariIntegrasiProcedure() {
    getIntegrasiProcedure(1);
    $('#modal-search-integrasi-procedure').modal('hide');
}

function getIntegrasiProcedure(p) {
    $('#hal-procedure').val(p);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/integrasi_procedure') ?>/page/' + p,
        data: $('#form-kirim-procedure').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getIntegrasiProcedure(p - 1);
                return false;
            }

            $('#kirim-pagination-procedure').html(pagination2(data.jumlah, data.limit, data.page, 1));
            $('#kirim-summary-procedure').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-kirim-procedure tbody').empty();

            let statusRespon = '';
            
            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="postProcedure(' + v.id_tindakan + ',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.tanggal_layanan !== null) ? datetime2date(v.tanggal_layanan) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="left">' + ((v.nama_layanan !== null) ? v.nama_layanan : '') + '</td>' +
                    '<td class="center">' + ((v.icd9 !== null) ? v.icd9 : '') + '</td>' +
                    '<td class="left">' + ((v.nama_tindakan !== null) ? v.nama_tindakan : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        statusRespon +
                    '</td>' +
                    '</tr>';

                $('#table-satset-kirim-procedure tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function postProcedure(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/kirim_procedure") ?>',
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
                            getIntegrasiProcedure(p);
                            getDataProcedure(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiProcedure(p);
                            getDataProcedure(1);

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