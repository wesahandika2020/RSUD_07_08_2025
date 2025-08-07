<script>
$(function() {

    $("#wizard-nakes").bwizard();

    getListDataNakes(1);
    getListIntegrasiNakes(1);

    $('#bt-search-nakes').click(function() {
        $('#modal-search-nakes').modal('show');
        $('#modal-search-nakes-label').html('Parameter Pencarian');
    });

    $('#bt-search-bridging-nakes').click(function() {
        $('#modal-search-integrasi-nakes').modal('show');
        $('#modal-search-integrasi-nakes-label').html('Parameter Pencarian');
    });

    $('#btn-reload-nakes').click(function() {
    
        getListDataNakes(1);
        
    });

    $('#btn-bridging-nakes').click(function() {
    
        getListIntegrasiNakes(1);
        
    });

})



function paging(p) {
        
    getListDataNakes(p);
    
}

function cariDataNakes() {
    getListDataNakes(1);
    $('#modal-search-nakes').modal('hide');
}

function getListDataNakes(page) {

    $('#page-now').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/ambil_data_nakes/page/') ?>' + page,
        data: $('#form-search').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getListDataPasien(page - 1);
                return false;
            }

            $('#pagination-nakes').html(pagination(data.jumlah, data.limit, data.page, 1));
            $('#summary-nakes').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-nakes tbody').empty();

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="left">' + v.nama + '</td>' +
                    '<td class="center">' + v.nik + '</td>' +
                    '<td class="center">' + ((v.spesialisasi !== null) ? v.spesialisasi : '-') + '</td>' +
                    '<td class="center">' + ((v.ihs_number !== null) ? v.ihs_number : '') + '</td>' +
                    '</tr>';

                $('#table-satset-nakes tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });


}

function paging2(p) {
        
    getListIntegrasiNakes(p);
    
}

function cariDataIntegrasiNakes() {
    getListIntegrasiNakes(1);
    $('#modal-search-integrasi-nakes').modal('hide');
}

function getListIntegrasiNakes(page) {
    $('#hal-ini').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/data_integrasi_nakes/page/') ?>' + page,
        data: $('#form-kirim-nakes').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getListIntegrasiNakes(page - 1);
                return false;
            }

            $('#pagination-integrasi-nakes').html(pagination2(data.jumlah, data.limit, data.page, 1));
            $('#summary-integrasi-nakes').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-kirim-nakes tbody').empty();

            let integrasiNakes= '';

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                integrasiNakes = '<button type="button" class="btn btn-secondary btn-xxs" onclick="integrasiNakes(\'' + v.nama + '\' ,\'' + v.nik + '\', \'' + v.id + '\',  ' + page + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="left">' + v.nama + '</td>' +
                    '<td class="center">' + v.nik + '</td>' +
                    '<td class="center">' + ((v.spesialisasi !== null) ? v.spesialisasi : '-') + '</td>' +
                    '<td class="center">' + ((v.ihs_number !== null) ? v.ihs_number : '-') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        integrasiNakes +
                    '</td>' +
                    '</tr>';

                $('#table-satset-kirim-nakes tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });
}

function integrasiNakes(nama, nik, id, p) {

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
                type: 'GET',
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_nakes") ?>',
                data: 'nik=' + nik + '&nama=' + nama + '&id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201 | data.metaData.code === 202 | data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            getListIntegrasiNakes(p);
                            getListDataNakes(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getListIntegrasiNakes(p);
                            getListDataNakes(1);

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