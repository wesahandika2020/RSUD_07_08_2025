<script>
$(function() {

    $("#wizard-condition-secondary").bwizard();

    getDataConditionSecondary(1);
    getIntegrasiConditionSecondary(1);

    $('#bt-search-condition-secondary').click(function() {
        $('#modal-search-condition-secondary').modal('show');
        $('#modal-search-label-condition-secondary').html('Parameter Pencarian');
    });

    $('#bt-integrasi-condition-secondary').click(function() {
        $('#modal-search-integrasi-condition-secondary').modal('show');
        $('#modal-search-integrasi-label-condition-secondary').html('Parameter Pencarian');
    });

    $('#btn-reload-condition-secondary').click(function() {
        getDataConditionSecondary(1);
    });

    $('#btn-reload-int-condition-secondary').click(function() {
        getIntegrasiConditionSecondary(1);
    });


})

function paging(p) {
        
    getDataConditionSecondary(p);
    
}

function cariDataConditionSecondary() {
    getDataConditionSecondary(1);
    $('#modal-search-condition-secondary').modal('hide');
}

function getDataConditionSecondary(page) {

    $('#page-condition-secondary').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/ambil_condition_secondary/page/') ?>' + page,
        data: $('#form-search-condition-secondary').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getDataConditionSecondary(page - 1);
                return false;
            }

            $('#pagination-condition-secondary').html(pagination(data.jumlah, data.limit, data.page, 1));
            $('#summary-condition-secondary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-condition-secondary tbody').empty();

            let updateConditionSecondary = '';

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                
                updateConditionSecondary = '<button type="button" class="btn btn-secondary btn-xxs" onclick="updateConditionSecondary(' + v.id_diagnosis + ',  ' + page + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.tanggal_layanan !== null) ? datetime2date(v.tanggal_layanan) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="center">' + ((v.kode_icdx !== null) ? v.kode_icdx : '') + '</td>' +
                    '<td class="left">' + ((v.nama_diagnosis !== null) ? v.nama_diagnosis : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        updateConditionSecondary +
                    '</td>' +
                    '</tr>';

                $('#table-satset-condition-secondary tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function updateConditionSecondary(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/update_condition_secondary") ?>',
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
                            getDataConditionSecondary(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getDataConditionSecondary(1);

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
    getIntegrasiConditionSecondary(p);
}

function cariIntegrasiConditionSecondary() {
    getIntegrasiConditionSecondary(1);
    $('#modal-search-integrasi-condition-secondary').modal('hide');
}

function getIntegrasiConditionSecondary(p) {
    $('#hal-condition-secondary').val(p);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/integrasi_condition_secondary') ?>/page/' + p,
        data: $('#form-kirim-condition-secondary').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getIntegrasiConditionSecondary(p - 1);
                return false;
            }

            $('#kirim-pagination-condition-secondary').html(pagination2(data.jumlah, data.limit, data.page, 1));
            $('#kirim-summary-condition-secondary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-kirim-condition-secondary tbody').empty();

            let statusRespon = '';
            
            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="postSecondaryCondition(' + v.id_diagnosis + ',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.tanggal_layanan !== null) ? datetime2date(v.tanggal_layanan) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="center">' + ((v.kode_icdx !== null) ? v.kode_icdx : '') + '</td>' +
                    '<td class="left">' + ((v.nama_diagnosis !== null) ? v.nama_diagnosis : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        statusRespon +
                    '</td>' +
                    '</tr>';

                $('#table-satset-kirim-condition-secondary tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function postSecondaryCondition(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/kirim_secondary_condition") ?>',
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
                            getIntegrasiConditionSecondary(p);
                            getDataConditionSecondary(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiConditionSecondary(p);
                            getDataConditionSecondary(1);

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