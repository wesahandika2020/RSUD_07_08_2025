<script>
$(function() {

    $("#wizard-pasien").bwizard();

    getListDataPasien(1);
    getListIntegrasiPasien(1);

    $('#bt-search').click(function() {
        $('#modal-search').modal('show');
        $('#modal-search-label').html('Parameter Pencarian');
    });

    $('#bt-search-bridging').click(function() {
        $('#modal-search-integrasi').modal('show');
        $('#modal-search-integrasi-label').html('Parameter Pencarian');
    });

    $('#btn-reload').click(function() {
        getListDataPasien(1);
    });

    $('#btn-bridging').click(function() {
        getListIntegrasiPasien(1);
    });


})

function paging8(p) {
        
    getListDataPasien(p);
    
}

function pagination8(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging8(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging8(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging8(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging8(' + (page + 1) + ',' + tab + ')"';
    };
    var next = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_next + '>&raquo;</a></li>';

    var page_numb = '';
    var act_click = '';
    var start = page - 2;
    var finish = page + 2;
    if (start < 1) {
        start = 1;
    }

    if (finish > total_page) {
        finish = total_page;
    }

    for (var p = start; p <= finish; p++) {

        if (p !== page) {
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging8(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page +'</a></li>' + '';
        }

    };

    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function cariDataPasien() {
    getListDataPasien(1);
    $('#modal-search').modal('hide');
}

function getListDataPasien(page) {

    $('#page-now').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/ambil_data_pasien/page/') ?>' + page,
        data: $('#form-search').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getListDataPasien(page - 1);
                return false;
            }

            $('#pagination-pasien').html(pagination8(data.jumlah, data.limit, data.page, 1));
            $('#summary-pasien').html(page_summary8(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-pasien tbody').empty();

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="left">' + v.id + '</td>' +
                    '<td class="left">' + v.nama + '</td>' +
                    '<td class="center">' + ((v.no_identitas !== null) ? v.no_identitas : '') + '</td>' +
                    '<td class="center">' + ((v.ihsn !== null) ? v.ihsn : '') + '</td>' +
                    '</tr>';

                $('#table-satset-pasien tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function page_summary8(total_data, total_datapage, limit, page) {
    var start = ((page - 1) * limit) + 1;

    var finish = (start - 1) + total_datapage;
    if (finish < 1) {
        start = 0;
    };
    var str = '<div class="dataTables_info">Showing ' + start + ' to ' + finish + ' of ' + total_data + ' entries</div>';

    return str;
}

function page_summary9(total_data, total_datapage, limit, page) {
    var start = ((page - 1) * limit) + 1;

    var finish = (start - 1) + total_datapage;
    if (finish < 1) {
        start = 0;
    };
    var str = '<div class="dataTables_info">Showing ' + start + ' to ' + finish + ' of ' + total_data + ' entries</div>';

    return str;
}

function pagination9(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging9(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging9(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging9(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging9(' + (page + 1) + ',' + tab + ')"';
    };
    var next = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_next + '>&raquo;</a></li>';

    var page_numb = '';
    var act_click = '';
    var start = page - 2;
    var finish = page + 2;
    if (start < 1) {
        start = 1;
    }

    if (finish > total_page) {
        finish = total_page;
    }

    for (var p = start; p <= finish; p++) {

        if (p !== page) {
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging9(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page +'</a></li>' + '';
        }

    };

    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function paging9(p) {
    getListIntegrasiPasien(p);
}

function cariDataIntegrasiPasien() {
    getListIntegrasiPasien(1);
    $('#modal-search-integrasi').modal('hide');
}

function getListIntegrasiPasien(p) {
    $('#hal-ini').val(p);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/data_integrasi_pasien') ?>/page/' + p,
        data: $('#form-kirim-pasien').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getListIntegrasiPasien(p - 1);
                return false;
            }

            $('#kirim-pagination-pasien').html(pagination9(data.jumlah, data.limit, data.page, 1));
            $('#kirim-summary-pasien').html(page_summary9(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-kirim-pasien tbody').empty();

            let integrasiPasien = '';
            
            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                integrasiPasien = '<button type="button" class="btn btn-secondary btn-xxs" onclick="integrasiPasien(\'' + v.nama + '\' ,\'' + v.no_identitas + '\', \'' + v.id + '\',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="left">' + v.id + '</td>' +
                    '<td class="left">' + v.nama + '</td>' +
                    '<td class="center">' + ((v.no_identitas !== null) ? v.no_identitas : '') + '</td>' +
                    '<td class="center">' + ((v.ihsn !== null) ? v.ihsn : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                    integrasiPasien +
                    '</td>' +
                    '</tr>';

                $('#table-satset-kirim-pasien tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function integrasiPasien(nama, nik, id, p) {

    let pesan = 'Apakah Pasien sudah mengisi Form Inform Consent?';
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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_pasien") ?>',
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
                            getListIntegrasiPasien(p);
                            getListDataPasien(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getListIntegrasiPasien(p);
                            getListDataPasien(1);

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