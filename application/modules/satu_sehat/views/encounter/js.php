<script>
$(function() {

    $("#wizard-encounter").bwizard();

    getListDataEncounter(1);
    getListIntegrasiEncounter(1);

    $("#tanggal-awal, #tanggal-akhir, #tanggalakhir, #tanggalawal").datepicker({
            format: 'dd/mm/yyyy',
            endDate: new Date()
    }).on('changeDate', function() {
        $(this).datepicker('hide');

    });


    $('#bt-search-encounter').click(function() {
        $('#modal-search-encounter').modal('show');
        $('#modal-search-label-encounter').html('Parameter Pencarian');
    });

    $('#bt-integrasi-encounter').click(function() {
        $('#modal-search-integrasi-encounter').modal('show');
        $('#modal-search-integrasi-label-encounter').html('Parameter Pencarian');
    });

    $('#list-encounter').click(function() {
        $('#modal-list-encounter-pasien').modal('show');
        $('#modal-list-encounter-pasien-label').html('Parameter Pencarian');
    });

    $('#list-condition').click(function() {
        $('#modal-list-condition-pasien').modal('show');
        $('#modal-list-condition-pasien-label').html('Parameter Pencarian');
    });

    $('#btn-reload-encounter').click(function() {
        getListDataEncounter(1);
    });

    $('#btn-reload-int-encounter').click(function() {
        getListIntegrasiEncounter(1);
    });

    $('#no-rm').select2({
        ajax: {
            url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
            var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '</b>' + ' ( ' + data.tanggal_lahir + ' )  ' + data.no_identitas + ' <br/>' + data.alamat;
            return markup;
        },
        formatSelection: function(data) {
            //cek_pelunasan(data.id);
            $('#list-pasien').html(data.nama );
            return data.id;
        }
    });

    $('#no-rm-condition').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '</b>' + ' ( ' + data.tanggal_lahir + ' )  ' + data.no_identitas + ' <br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
                //cek_pelunasan(data.id);
                $('#list-kondisi-pasien').html(data.nama );
                return data.id;
            }
        });


})

function pagination10(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging10(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging10(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging10(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging10(' + (page + 1) + ',' + tab + ')"';
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
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging10(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page +'</a></li>' + '';
        }

    };

    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function paging10(p, tab) {
        
    getListDataEncounter(p);
    
}

function pagination11(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging11(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging11(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging11(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging11(' + (page + 1) + ',' + tab + ')"';
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
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging11(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page +'</a></li>' + '';
        }

    };

    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function paging11(p, tab) {
        
    getListIntegrasiEncounter(p);
    
}

function cariDataEncounter() {
    getListDataEncounter(1);
    $('#modal-search-encounter').modal('hide');
}

function getListDataEncounter(page) {

    $('#page-encounter').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/ambil_data_encounter/page/') ?>' + page,
        data: $('#form-search-encounter').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getListDataPasien(page - 1);
                return false;
            }

            $('#pagination-encounter').html(pagination10(data.jumlah, data.limit, data.page, 1));
            $('#summary-encounter').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-encounter tbody').empty();

            let updateEncounter = '';

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                if(v.in_progress === null){

                    updateEncounter = '<button type="button" class="btn btn-secondary btn-xxs" onclick="updateEncounter(' + v.id + ',  ' + page + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                } else {

                    updateEncounter = '<button type="button" class="btn btn-secondary btn-xxs" onclick="finishEncounter(' + v.id + ',  ' + page + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                }

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + datetimefmysql(v.tanggal_layanan) + '</td>' +
                    '<td class="left">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="center">' + ((v.no_identitas !== null) ? v.no_identitas : '') + '</td>' +
                    '<td class="center">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="center">' + ((v.id_encounter !== null) ? v.id_encounter : '') + '</td>' +
                    '<td class="center">' + ((v.in_progress !== null) ? v.in_progress : '') + '</td>' +
                    '<td class="center">' + ((v.finish !== null) ? v.finish : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        updateEncounter +
                    '</td>' +
                    '</tr>';

                $('#table-satset-encounter tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function updateEncounter(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/update_encounter") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    console.log(data);

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201 | data.metaData.code === 202 | data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            getListIntegrasiEncounter(1);
                            getListDataEncounter(p);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getListIntegrasiEncounter(1);
                            getListDataEncounter(p);

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

function finishEncounter(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/finish_encounter") ?>',
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
                            getListIntegrasiEncounter(1);
                            getListDataEncounter(p);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getListIntegrasiEncounter(1);
                            getListDataEncounter(p);

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

function cariDataIntegrasiEncounter() {
    getListIntegrasiEncounter(1);
    $('#modal-search-integrasi-encounter').modal('hide');
}

function getListIntegrasiEncounter(p) {
    $('#hal-encounter').val(p);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/data_integrasi_encounter') ?>/page/' + p,
        data: $('#form-kirim-encounter').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getListIntegrasiEncounter(p - 1);
                return false;
            }

            $('#kirim-pagination-encounter').html(pagination11(data.jumlah, data.limit, data.page, 1));
            $('#kirim-summary-encounter').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-kirim-encounter tbody').empty();

            let statusRespon = '';
            
            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="statusResponse(' + v.id + ',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + datetimefmysql(v.tanggal_layanan) + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="center">' + ((v.no_identitas !== null) ? v.no_identitas : '') + '</td>' +
                    '<td class="center">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                    statusRespon +
                    '</td>' +
                    '</tr>';

                $('#table-satset-kirim-encounter tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function statusResponse(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_encounter") ?>',
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
                            getListIntegrasiEncounter(p);
                            getListDataEncounter(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getListIntegrasiEncounter(p);
                            getListDataEncounter(1);

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

function listEncounterPasien() {
    getlistEncounterPasien(1);
    $('#modal-list-encounter-pasien').modal('hide');
}


function pagination3(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging3(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging3(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging3(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging3(' + (page + 1) + ',' + tab + ')"';
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
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging3(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page +'</a></li>' + '';
        }

    };



    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function paging3(p) {
    getlistEncounterPasien(p);
}

function dateTFunc(tanggal) {
    if (tanggal !== undefined && tanggal !== null && tanggal !== 'null') {
        var elem = tanggal.split('T');
        var spTanggal = elem[0].split('-');
        var resTanggal = spTanggal[2] + '/' + spTanggal[1] + '/' + spTanggal[0];
        var spJam = elem[1].split('+');
        var resJam = spJam[0];
        // var hari = elem[2];
        return resTanggal + ' ' + resJam;
    } else {
        return '';
    }
}

function getlistEncounterPasien(p) {
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/list_encounter_pasien/') ?>',
        data: $('#form-list-encounter-pasien').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((p > 1) & (data.metaData.result.total === 0)) {
                getlistEncounterPasien(p - 1);
                return false;
            }

            $('#kirim-pagination-list-encounter').html(pagination3(data.metaData.result.total, 10, p, 1));
            $('#kirim-summary-list-encounter').html(page_summary(data.metaData.result.total, data.metaData.result.total, 10, p));

            $('#table-satset-list-encounter tbody').empty();

            let lokasi = '';
            let getData = '';
            let timeStart = '';
            let timeEnd = '';
            var no = 1;
            
            $.each(data.metaData.result.entry, function(i, v) {

                getData = v.resource;

                if(typeof getData.location !== 'undefined'){

                    lokasi = getData.location[0].location.display;

                    statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="statusResponse(' + v.id + ',  ' + p + ')"><i class="fas fa-sign m-r-5"></i>Integrasi</button>';

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="left">' + lokasi + '</td>' +
                        '<td class="left">' + getData.participant[0].individual.display + '</td>' +
                        '<td class="center">' + dateTFunc(getData.period.start) + '</td>' +
                        '<td class="center">' + dateTFunc(getData.period.end) + '</td>' +
                        '<td class="center">' + getData.status + '</td>' +
                        '</tr>';

                    $('#table-satset-list-encounter tbody').append(html);

                    no++;

                }

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function listConditionPasien() {
    getlistConditionPasien(1);
    $('#modal-list-condition-pasien').modal('hide');
}

function pagination4(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging4(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging4(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging4(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging4(' + (page + 1) + ',' + tab + ')"';
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
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging4(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page +'</a></li>' + '';
        }

    };

    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function paging4(p) {
    getlistConditionPasien(p);
}

function tambahkanNol(angka) {
  return angka < 10 ? '0' + angka : angka;
}

function getlistConditionPasien(p) {
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/list_condition_pasien/') ?>',
        data: $('#form-list-condition-pasien').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            console.log(data);

            if ((p > 1) & (data.metaData.result.total === 0)) {
                getlistConditionPasien(p - 1);
                return false;
            }

            $('#kirim-pagination-list-condition').html(pagination4(data.metaData.result.total, 10, p, 1));
            $('#kirim-summary-list-condition').html(page_summary(data.metaData.result.total, data.metaData.result.total, 10, p));

            $('#table-satset-list-condition tbody').empty();

            let lokasi = '';
            let getData = '';
            let timeStart = '';
            let timeEnd = '';
            var no = 1;
            
            $.each(data.metaData.result.entry, function(i, v) {

                getData = v.resource;

                if(typeof getData.code !== 'undefined'){

                    var tanggalObjek = new Date(getData.recordedDate);

                    var tanggal = tambahkanNol(tanggalObjek.getDate());
                    var bulan = tambahkanNol(tanggalObjek.getMonth() + 1); // Perhatikan bahwa bulan dimulai dari 0
                    var tahun = tanggalObjek.getFullYear();
                    var jam = tambahkanNol(tanggalObjek.getHours());
                    var menit = tambahkanNol(tanggalObjek.getMinutes());

                    // Format tanggal yang diinginkan
                    var tanggalAkhir = tanggal + '/' + bulan + '/' + tahun + ' ' + jam + ':' + menit;

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + tanggalAkhir + '</td>' +
                        '<td class="center">' + getData.code.coding[0].code + '</td>' +
                        '<td class="left">' + getData.code.coding[0].display + '</td>' +
                        '<td class="left">' + ((getData.encounter.display !== undefined) ? getData.encounter.display : '') + '</td>' +
                        '</tr>';

                    $('#table-satset-list-condition tbody').append(html);

                    no++;

                }

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}


</script>