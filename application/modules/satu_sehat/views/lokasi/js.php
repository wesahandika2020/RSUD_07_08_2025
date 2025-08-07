<script>
$(function() {

    getListDataLokasi(1);

    let namaTabel = $('#nama-tabel').val();

    $('#bt-expand-lokasi').click(function() {
        $('#table-satset-lokasi').treetable('expandAll');
    });

    $('#bt-collapse-lokasi').click(function() {
        $('#table-satset-lokasi').treetable('collapseAll');
    });

    $('#tmbh-lokasi').click(function() {
        $('#modal-lokasi').modal('show');
        $('#modal-lokasi-label').html('Form Tambah Lokasi Rumah Sakit');
        $('#form-tambah-lokasi')[0].reset();
        resetAllLokasi();
    });

    $('#btn-reload-lokasi').click(function() {
        resetAllLokasi();
        // getListDataLokasi(1);
    });

    
    $('#bt-search-lokasi').click(function() {
        $('#modal-search-lokasi').modal('show');
        $('#modal-search-lokasi-label').html('Parameter Pencarian');
    });

    $('#bt-search-bridging-lokasi').click(function() {
        $('#modal-search-integrasi-lokasi').modal('show');
        $('#modal-search-integrasi-lokasi-label').html('Parameter Pencarian');
    });

    $('#btn-reload-lokasi').click(function() {
        // getListDataLokasi(1);
    });

    $('#btn-bridging-lokasi').click(function() {
        // getListIntegrasiLokasi(1);
    });

    $('#pilih-lokasi-induk-organisasi').select2({
        ajax: {
            url: "<?= base_url('satu_sehat/api/satu_sehat/pilih_induk_organisasi') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page // page number
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
            var markup = data.nama;
            return markup;
        },
        formatSelection: function(data) {
            return data.nama;
        }
    });

    $('#pilih-organisasi-lokasi').select2({
        ajax: {
            url: "<?= base_url('satu_sehat/api/satu_sehat/pilih_induk') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    id_jenis: $('#pilih-induk-organisasi').val(),
                    page: page // page number
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
            var markup = data.kode + ' ' + data.nama;
            return markup;
        },
        formatSelection: function(data) {
            return data.nama;
        }
    });

    $('#pilih-lokasi').select2({
        ajax: {
            url: "<?= base_url('satu_sehat/api/satu_sehat/pilih_lokasi') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    id_jenis: $('#pilih-induk-organisasi').val(),
                    page: page // page number
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
            var markup = data.kode + ' ' + data.nama;
            return markup;
        },
        formatSelection: function(data) {
            return data.nama;
        }
    });

    $('#tipe-fisik').select2({
        ajax: {
            url: "<?= base_url('satu_sehat/api/satu_sehat/tipe_fisik') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page // page number
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
            var markup = data.display;
            return markup;
        },
        formatSelection: function(data) {
            return data.display;
        }
    });

    $('#kategori').select2({
        ajax: {
            url: "<?= base_url('satu_sehat/api/satu_sehat/kategori') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page // page number
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
            var markup = data.nama;
            return markup;
        },
        formatSelection: function(data) {
            $('#nama-tabel').val(data.nama_tabel);
            return data.nama;
        }
    });

    $('#lokasi-sistem').select2({
        ajax: {
            url: "<?= base_url('satu_sehat/api/satu_sehat/lokasi_sistem?nama=') ?>"+ namaTabel,
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page // page number
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

            if(data){
                if(data.id !== ''){
                    if(namaTabel === 'sm_bed'){
                        var markup = '<b>'+ data.nama + '</b> Ruang '+ data.no_ruang +' Bed ' + data.no_bed;
                        return markup;
                    } else if(namaTabel === 'sm_ruang'){
                        var markup = '<b>'+ data.nama + '</b> Ruang '+ data.no_ruang;
                        return markup;
                    } else if(namaTabel === 'sm_spesialisasi'){
                        var markup = '<b>'+ data.nama;
                        return markup;
                    } else if(namaTabel === 'sm_unit'){
                        var markup = '<b>'+ data.nama;
                        return markup;
                    }
                }
            }
        },
        formatSelection: function(data) {

            if(data){
                if(data.id !== ''){
                    if(namaTabel === 'sm_bed'){
                        return '<b>'+ data.nama + '</b> Ruang '+ data.no_ruang +' Bed ' + data.no_bed;
                    } else if(namaTabel === 'sm_ruang'){
                        return '<b>'+ data.nama + '</b> Ruang '+ data.no_ruang;
                    } else if(namaTabel === 'sm_spesialisasi'){
                        return '<b>'+ data.nama; 
                    } else if(namaTabel === 'sm_unit'){
                        return '<b>'+ data.nama; 
                    }
                }
            }
        }
    });

    $('#kategori').change(function() {
        namaTabel = $('#nama-tabel').val();
        $('#lokasi-sistem').select2({
            ajax: {
                url: "<?= base_url('satu_sehat/api/satu_sehat/lokasi_sistem?nama=') ?>"+ namaTabel,
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page // page number
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
                
                if(data.id !== ''){
                    if(namaTabel === 'sm_bed'){
                        var markup = '<b>'+ data.nama + '</b> Ruang '+ data.no_ruang +' Bed ' + data.no_bed;
                        return markup;
                    } else if(namaTabel === 'sm_ruang'){
                        var markup = '<b>'+ data.nama + '</b> Ruang '+ data.no_ruang;
                        return markup;
                    } else if(namaTabel === 'sm_spesialisasi'){
                        var markup = '<b>'+ data.nama;
                        return markup;
                    } else if(namaTabel === 'sm_unit'){
                        var markup = '<b>'+ data.nama;
                        return markup;
                    }
                }
            },
            formatSelection: function(data) {
                if(data.id !== ''){
                    if(namaTabel === 'sm_bed'){
                        return '<b>'+ data.nama + '</b> Ruang '+ data.no_ruang +' Bed ' + data.no_bed;
                    } else if(namaTabel === 'sm_ruang'){
                        return '<b>'+ data.nama + '</b> Ruang '+ data.no_ruang;
                    } else if(namaTabel === 'sm_spesialisasi'){
                        return '<b>'+ data.nama; 
                    } else if(namaTabel === 'sm_unit'){
                        return '<b>'+ data.nama; 
                    }
                }
            }
        });

    });

    
})

var tipeData = 'daftar';

function simpanLokasi() {
    let stop = false;


    if ($('#nama-lokasi').val() === '') {
        syams_validation('#nama-lokasi', 'Nama Lokasi harus diisi!');
        stop = true;
    }

    if ($('#kategori').val() !== '') {
        if ($('#lokasi-sistem').val() === '') {
            syams_validation('#lokasi-sistem', 'Nama Lokasi SIMRS harus diisi!');
            stop = true;
        }
    }

    if (stop) {
        return false;
    }

    $.ajax({
        type: 'POST',
        url: '<?= base_url('satu_sehat/api/satu_sehat/simpan_lokasi') ?>',
        data: $('#form-tambah-lokasi').serialize(),
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader();
        },
        success: function(data) {

            if(typeof data.metaData !== 'undefined'){

                if(data.metaData.code === 201 | data.metaData.code === '201'){

                    swalAlert('warning', data.metaData.code, data.metaData.message);
                    hideLoader();
                    

                } else {

                    messageCustom(data.metaData.message, 'Success');
                    getListDataLokasi(1);
                    $('#modal-lokasi').modal('hide');

                }

            }
        },
        error: function(e) {
            messageAddFailed();
            hideLoader();
        }
    });
}

function page_summary7(total_data, total_datapage, limit, page) {
    var start = ((page - 1) * limit) + 1;

    var finish = (start - 1) + total_datapage;
    if (finish < 1) {
        start = 0;
    };
    var str = '<div class="dataTables_info">Showing ' + start + ' to ' + finish + ' of ' + total_data + ' entries</div>';

    return str;
}

function pagination7(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging7(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging7(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging7(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging7(' + (page + 1) + ',' + tab + ')"';
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
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging7(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page +'</a></li>' + '';
        }

    };

    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function paging7(p) {
        
    getListDataLokasi(p);
    
}

function resetAllLokasi() {
    tipedata = 'daftar';
    $('#id, .select2-input, #pilih-induk, .form-control').val('');
    $('.select2-chosen').html('');
    syams_validation_remove('.form-control');
    syams_validation_remove('.select2-input');
    $('.edit_hide').show();
    getListDataLokasi(1);
}

function cariDataLokasi() {
    getListDataLokasi(1);
    $('#modal-search-lokasi').modal('hide');
}

function getListDataLokasi(p) {

    $('#page-lokasi').val(p);
    $.ajax({
        type: 'GET',
        url: '<?= base_url('satu_sehat/api/satu_sehat/daftar_lokasi'); ?>/page/' + p,
        data: 'tipe=' + tipeData + '&' + $('#form-search-lokasi').serialize(),
        cache: false,
        dataType: 'JSON',
        beforeSend: function(data) {
            showLoader();
        },
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getListDataLokasi(p - 1);
                return false;
            }

            $('#pagination-lokasi').html(pagination7(data.jumlah, data.limit, data.page, 1));
            $('#summary-lokasi').html(page_summary7(data.jumlah, data.data.length, data.limit, data.page));
            $('#table-satset-lokasi tbody').empty();
            if (tipeData === 'daftar') {
                $('#table-satset-lokasi').treetable('destroy');
                detailDataLokasi(data);
            } else {
                tampilDataLokasi(data);
            }

            hideLoader();
        },
        error: function(e) {
            accessFailed(e.status);
            hideLoader();
        }
    });
}

function tampilDataLokasi(data) {
    let html = '';
    $.each(data.data, function(i, v) {
        html = '<tr>' +
            '<td align="center">' + v.kode + '</td>' +
            '<td>' + v.nama + ((v.induk !== '') ? ', ' : '') + v.induk + ', <b> ' + v.induk_organisasi + ' </b></td>' +
            '<td></td>' +
            '<td>' + v.integrasi_baru + '</td>' +
            '<td align="right">' +
            '<button type="button" class="btn btn-secondary btn-xs" onclick="editLokasi(' + v.id + ', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button>' +
            '<button type="button" class="btn btn-secondary btn-xs" onclick="deleteLokasi(this, ' + v.id + ', ' + data.page + ')"><i class="fas fa-trash"></i> Hapus</button>' +
            '</td>' +
            '</tr>';
        $('#table-satset-lokasi tbody').append(html);
    });
}

function detailDataLokasi(data) {
    var html = '';
    var cabang = '';
    var induk = '';
    var root = '';

    $.each(data.data, function(i, v) {
        i++;
        root = ((i + 1) + ((data.page - 1) * data.limit));
        cabang = 'data-tt-id="' + root + '"';
        html = drawTable(v, cabang, induk, data.page, 0);
        $('#table-satset-lokasi tbody').append(html);

        if (v.ekor !== null) {
            $.each(v.ekor, function(i2, v2) {
                i2++;
                cabang = 'data-tt-id="' + root + '-' + i2 + '"';
                induk = 'data-tt-parent-id="' + root + '"';
                html = drawTable(v2, cabang, induk, data.page, 20);
                $('#table-satset-lokasi tbody').append(html);

                if (v2.ekor !== null) {
                    $.each(v2.ekor, function(i3, v3) {
                        i3++;
                        cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '"';
                        induk = 'data-tt-parent-id="' + root + '-' + i2 + '"';
                        html = drawTable(v3, cabang, induk, data.page, 40);
                        $('#table-satset-lokasi tbody').append(html);

                        if (v3.ekor !== null) {
                            $.each(v3.ekor, function(i4, v4) {
                                i4++;
                                cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
                                induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '"';
                                html = drawTable(v4, cabang, induk, data.page, 60);
                                $('#table-satset-lokasi tbody').append(html);

                                if (v4.ekor !== null) {
                                    $.each(v4.ekor, function(i5, v5) {
                                        i5++;
                                        cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
                                        induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
                                        html = drawTable(v5, cabang, induk, data.page, 80);
                                        $('#table-satset-lokasi tbody').append(html);

                                        if (v5.ekor !== null) {
                                            $.each(v5.ekor, function(i6, v6) {
                                                i6++;
                                                cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '"';
                                                induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
                                                html = drawTable(v6, cabang, induk, data.page, 100);
                                                $('#table-satset-lokasi tbody').append(html);

                                                if (v6.ekor !== null) {
                                                    $.each(v6.ekor, function(i7, v7) {
                                                        i7++;
                                                        cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '"';
                                                        induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '"';
                                                        html = drawTable(v7, cabang, induk, data.page, 100);
                                                        $('#table-satset-lokasi tbody').append(html);

                                                        if (v7.ekor !== null) {
                                                            $.each(v7.ekor, function(i8, v8) {
                                                                i8++;
                                                                cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '-' + i8 + '"';
                                                                induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '"';
                                                                html = drawTable(v8, cabang, induk, data.page, 100);
                                                                $('#table-satset-lokasi tbody').append(html);
                                                            });
                                                        }
                                                    });
                                                }
                                            });
                                        }

                                    });
                                }
                            });
                        }

                    });
                }
            });
        }

        cabang = '';
        induk = '';
    });

    $('#table-satset-lokasi').treetable({
        expandable: true
    });
}

function drawTable(v, cabang, induk, page, indent) {
    let btn = '';
    let bold = '';

    if (v.kode !== '') {

        if(v.integrasi_baru  === null | v.integrasi_baru === undefined){

            btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="intLokasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Integrasi</button> ' +
            '<button type="button" class="btn btn-secondary btn-xs" onclick="editLokasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                '<button type="button" class="btn btn-secondary btn-xs" onclick="deleteLokasi(this, ' + v.id + ', ' + page + ')"><i class="fas fa-trash"></i> Hapus</button> ';

        } else {

            if(v.integrasi_ulang === '1'){

                btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="updateIntegrasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> update integrasi</button> ' +
                    '<button type="button" class="btn btn-secondary btn-xs" onclick="editLokasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button> ';

            } else {

                btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="editLokasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button> ';

            }

        }

    } else {

        bold = 'font-weight:bold;';

    }

    let html = '<tr ' + cabang + ' ' + induk + '>' +
        '<td>' + v.kode + '</td>' +
        '<td><span style="' + bold + ' margin-left: ' + indent + 'px;">' + v.nama + '</span></td>' +
        '<td>' + (v.status === null | v.status === undefined ? '' : (v.status === '1' ? 'Aktif' : 'Non Aktif')) + '</td>' +
        '<td>' + (v.integrasi_baru  === null | v.integrasi_baru === undefined ? '' : v.integrasi_baru) + '</td>' +
        '<td align="right">' + btn + '</td>' +
        '</tr>';
    return html;

}

function resetEditLokasi() {

    $('#status-aktif').empty();
    $('#nama-edit-lokasi').val();
    
}

function editLokasi(id, p) {

    resetEditLokasi();

    $('#modal-edit-lokasi').modal('show');

    let namaStatus = '';

    $.ajax({
        type: 'GET',
        url: '<?= base_url("satu_sehat/api/satu_sehat/data_lokasi") ?>',
        data: 'id=' + id,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader();
        },
        success: function(data) {

            $('#id-lokasi').val(id);
            $('#nama-edit-lokasi').val(data.nama);
            if(data.status === '1'){

                namaStatus = 'Aktif';

            } else {

                namaStatus = 'Non Aktif';

            }

            $('#page-lokasi').val(p);

            if(data.status === '0'){
            
                $('#status-aktif').append('<option value="'+ data.status+'">'+ namaStatus +'</option><option value="1">Aktif</option>');

            } else {

                $('#status-aktif').append('<option value="'+ data.status+'">'+ namaStatus +'</option><option value="0">Non Aktif</option>');

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

function deleteLokasi(obj, id, p) {

    let pesan = 'Apakah Anda ingin menghapus Lokasi?';
    let confirm_button = 'Hapus';
                
    swal.fire({
        title: 'Hapus Lokasi',
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
                type: 'DELETE',
                url: '<?= base_url('satu_sehat/api/satu_sehat/hapus_lokasi') ?>',
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
                            getListDataLokasi(p);

                        } else {
                            removeMe(obj);
                            messageCustom(data.metaData.message, 'Success');
                            getListDataLokasi(p);

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

function simpanEditLokasi() {

    let pesan = 'Apakah Anda ingin memperbaharui data?';
    let confirm_button = 'Simpan';
                
    swal.fire({
        title: 'Edit Data',
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
                url: '<?= base_url("satu_sehat/api/satu_sehat/simpan_edit_lokasi") ?>',
                data: $('#form-edit-lokasi').serialize(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201 | data.metaData.code === 202 | data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            $('#modal-edit-lokasi').modal('hide');
                            getListDataLokasi($('#page-lokasi').val());

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            $('#modal-edit-lokasi').modal('hide');
                            getListDataLokasi($('#page-lokasi').val());

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

function intLokasi(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_lokasi") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201 | data.metaData.code === 202 | data.metaData.code === 400){

                            swalAlert('warning', data.metaData.code, data.metaData.message);
                            getListDataLokasi(p);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getListDataLokasi(p);

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

function updateIntegrasi(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/update_integrasi_lokasi") ?>',
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
                            getListDataLokasi(p);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getListDataLokasi(p);

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