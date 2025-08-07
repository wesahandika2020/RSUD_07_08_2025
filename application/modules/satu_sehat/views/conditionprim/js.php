<script>
$(function() {

    $("#wizard-condition-primary").bwizard();

    getDataConditionPrimary(1);
    getIntegrasiConditionPrimary(1);

    $('#bt-search-condition-primary').click(function() {
        $('#modal-search-condition-primary').modal('show');
        $('#modal-search-label-condition-primary').html('Parameter Pencarian');
    });

    $('#bt-integrasi-condition-primary').click(function() {
        $('#modal-search-integrasi-condition-primary').modal('show');
        $('#modal-search-integrasi-label-condition-primary').html('Parameter Pencarian');
    });

    $('#btn-reload-condition-primary').click(function() {
        getDataConditionPrimary(1);
    });

    $('#btn-reload-int-condition-primary').click(function() {
        getIntegrasiConditionPrimary(1);
    });


})

function paging(p) {
        
    getDataConditionPrimary(p);
    
}

function cariDataConditionPrimary() {
    getDataConditionPrimary(1);
    $('#modal-search-condition-primary').modal('hide');
}

function getDataConditionPrimary(page) {

    $('#page-condition-primary').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/ambil_condition_primary/page/') ?>' + page,
        data: $('#form-search-condition-primary').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getDataConditionPrimary(page - 1);
                return false;
            }

            $('#pagination-condition-primary').html(pagination(data.jumlah, data.limit, data.page, 1));
            $('#summary-condition-primary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-condition-primary tbody').empty();

            let updateConditionPrimary = '';

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                
                updateConditionPrimary = '<button type="button" class="btn btn-secondary btn-xxs" onclick="updateConditionPrimary(' + v.id_diagnosis + ',  ' + page + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.tanggal_layanan !== null) ? datetime2date(v.tanggal_layanan) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="center">' + ((v.kode_icdx !== null) ? v.kode_icdx : '') + '</td>' +
                    '<td class="left">' + ((v.nama_diagnosis !== null) ? v.nama_diagnosis : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        updateConditionPrimary +
                    '</td>' +
                    '</tr>';

                $('#table-satset-condition-primary tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function updateConditionPrimary(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/update_condition_primary") ?>',
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
                            getDataConditionPrimary(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getDataConditionPrimary(1);

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
    getIntegrasiConditionPrimary(p);
}

function cariIntegrasiConditionPrimary() {
    getIntegrasiConditionPrimary(1);
    $('#modal-search-integrasi-condition-primary').modal('hide');
}

function getIntegrasiConditionPrimary(p) {
    $('#hal-condition-primary').val(p);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/integrasi_condition_primary') ?>/page/' + p,
        data: $('#form-kirim-condition-primary').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getIntegrasiConditionPrimary(p - 1);
                return false;
            }

            $('#kirim-pagination-condition-primary').html(pagination2(data.jumlah, data.limit, data.page, 1));
            $('#kirim-summary-condition-primary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-kirim-condition-primary tbody').empty();

            let statusRespon = '';
            
            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="postPrimaryCondition(' + v.id_diagnosis + ',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

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

                $('#table-satset-kirim-condition-primary tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function postPrimaryCondition(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/kirim_primary_condition") ?>',
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
                            getIntegrasiConditionPrimary(p);
                            getDataConditionPrimary(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiConditionPrimary(p);
                            getDataConditionPrimary(1);

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