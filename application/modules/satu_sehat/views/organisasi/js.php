<script>

var tipeData = 'daftar';

$(function() {

    getDaftarOrganisasi(1);

    $('#bt-expand-org').click(function() {
        $('#table-satset-org').treetable('expandAll');
    });

    $('#bt-collapse-org').click(function() {
        $('#table-satset-org').treetable('collapseAll');
    });

    $('#tmbh-org').click(function() {
        $('#modal-organisasi').modal('show');
        $('#modal-organisasi-label').html('Form Tambah Organisasi');
        $('#form-tambah-organisasi')[0].reset();
        resetAllOrganisasi();
    });

    $('#btn-reload-org').click(function() {
        resetAllOrganisasi();
        getDaftarOrganisasi(1);
    });

    $('#pilih-induk-organisasi').select2({
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

    $('#pilih-induk').select2({
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


})

function simpanOrganisasi() {
    let stop = false;


    if ($('#nama-organisasi').val() === '') {
        syams_validation('#nama-organisasi', 'Nama Organisasi harus diisi!');
        stop = true;
    }

    if (stop) {
        return false;
    }

    let update = '';
    if ($('#id').val() !== '') {
        update = '/id/' + $('#id').val();
    }

    $.ajax({
        type: 'POST',
        url: '<?= base_url('satu_sehat/api/satu_sehat/simpan_organisasi') ?>' + update,
        data: $('#form-tambah-organisasi').serialize(),
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader();
        },
        success: function(data) {
            $('input[name=csrf_syam]').val(data.token);
            
            if ($('#id').val() !== '') {
                messageEditSuccess();
                getDaftarOrganisasi($('#page-org').val());
            } else {
                getDaftarOrganisasi(1);
                messageAddSuccess();
            }

            $('#modal-organisasi').modal('hide');
            resetAllOrganisasi();
            hideLoader();
        },
        error: function(e) {
            if ($('#id').val() !== '') {
                messageEditFailed();
            } else {
                messageAddFailed();
            }

            hideLoader();
        }
    });
}

function resetAllOrganisasi() {
    tipedata = 'daftar';
    $('#id, .select2-input, #pilih-induk, .form-control').val('');
    $('.select2-chosen').html('');
    syams_validation_remove('.form-control');
    syams_validation_remove('.select2-input');
    $('.edit_hide').show();
    getDaftarOrganisasi(1);
}

function pagination5(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging5(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging5(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging5(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging5(' + (page + 1) + ',' + tab + ')"';
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
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging5(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page +'</a></li>' + '';
        }

    };

    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function paging5(p, tab) {
        
    getDaftarOrganisasi(p);
    
}

function cariOrganisasi() {
    tipeData = 'cari';
    getDaftarOrganisasi(1);
}

function getDaftarOrganisasi(p) {
    $('#page-org').val(p);
    $.ajax({
        type: 'GET',
        url: '<?= base_url('satu_sehat/api/satu_sehat/daftar_organisasi'); ?>/page/' + p,
        data: 'tipe=' + tipeData + '&' + $('#form-search-org').serialize(),
        cache: false,
        dataType: 'JSON',
        beforeSend: function(data) {
            showLoader();
        },
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getDaftarOrganisasi(p - 1);
                return false;
            }

            $('#pagination-org').html(pagination5(data.jumlah, data.limit, data.page, 1));
            $('#summary-org').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
            $('#table-satset-org tbody').empty();
            if (tipeData === 'daftar') {
                $('#table-satset-org').treetable('destroy');
                detailData(data);
            } else {
                tampilData(data);
            }

            hideLoader();
        },
        error: function(e) {
            accessFailed(e.status);
            hideLoader();
        }
    });
}

function tampilData(data) {
    let html = '';
    $.each(data.data, function(i, v) {
        html = '<tr>' +
            '<td align="center">' + v.kode + '</td>' +
            '<td>' + v.nama + ((v.induk !== '') ? ', ' : '') + v.induk + ', <b> ' + v.induk_organisasi + ' </b></td>' +
            '<td></td>' +
            '<td>' + v.integrasi_baru + '</td>' +
            '<td align="right">' +
            '<button type="button" class="btn btn-secondary btn-xs" onclick="editOrganisasi(' + v.id + ', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button>' +
            '<button type="button" class="btn btn-secondary btn-xs" onclick="deleteOrganisasi(this, ' + v.id + ', ' + data.page + ')"><i class="fas fa-trash"></i> Hapus</button>' +
            '</td>' +
            '</tr>';
        $('#table-satset-org tbody').append(html);
    });
}

function detailData(data) {
    var html = '';
    var cabang = '';
    var induk = '';
    var root = '';

    $.each(data.data, function(i, v) {
        i++;
        root = ((i + 1) + ((data.page - 1) * data.limit));
        cabang = 'data-tt-id="' + root + '"';
        html = drawTable(v, cabang, induk, data.page, 0);
        $('#table-satset-org tbody').append(html);

        if (v.ekor !== null) {
            $.each(v.ekor, function(i2, v2) {
                i2++;
                cabang = 'data-tt-id="' + root + '-' + i2 + '"';
                induk = 'data-tt-parent-id="' + root + '"';
                html = drawTable(v2, cabang, induk, data.page, 20);
                $('#table-satset-org tbody').append(html);

                if (v2.ekor !== null) {
                    $.each(v2.ekor, function(i3, v3) {
                        i3++;
                        cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '"';
                        induk = 'data-tt-parent-id="' + root + '-' + i2 + '"';
                        html = drawTable(v3, cabang, induk, data.page, 40);
                        $('#table-satset-org tbody').append(html);

                        if (v3.ekor !== null) {
                            $.each(v3.ekor, function(i4, v4) {
                                i4++;
                                cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
                                induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '"';
                                html = drawTable(v4, cabang, induk, data.page, 60);
                                $('#table-satset-org tbody').append(html);

                                if (v4.ekor !== null) {
                                    $.each(v4.ekor, function(i5, v5) {
                                        i5++;
                                        cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
                                        induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
                                        html = drawTable(v5, cabang, induk, data.page, 80);
                                        $('#table-satset-org tbody').append(html);

                                        if (v5.ekor !== null) {
                                            $.each(v5.ekor, function(i6, v6) {
                                                i6++;
                                                cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '"';
                                                induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
                                                html = drawTable(v6, cabang, induk, data.page, 100);
                                                $('#table-satset-org tbody').append(html);

                                                if (v6.ekor !== null) {
                                                    $.each(v6.ekor, function(i7, v7) {
                                                        i7++;
                                                        cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '"';
                                                        induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '"';
                                                        html = drawTable(v7, cabang, induk, data.page, 100);
                                                        $('#table-satset-org tbody').append(html);

                                                        if (v7.ekor !== null) {
                                                            $.each(v7.ekor, function(i8, v8) {
                                                                i8++;
                                                                cabang = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '-' + i8 + '"';
                                                                induk = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '-' + i7 + '"';
                                                                html = drawTable(v8, cabang, induk, data.page, 100);
                                                                $('#table-satset-org tbody').append(html);
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

    $('#table-satset-org').treetable({
        expandable: true
    });
}

function drawTable(v, cabang, induk, page, indent) {
    let btn = '';
    let bold = '';

    if (v.kode !== '') {

        if(v.integrasi_baru  === null | v.integrasi_baru === undefined){

            btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="intOrganisasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Integrasi</button> ' +
            '<button type="button" class="btn btn-secondary btn-xs" onclick="editOrganisasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                '<button type="button" class="btn btn-secondary btn-xs" onclick="deleteOrganisasi(this, ' + v.id + ', ' + page + ')"><i class="fas fa-trash"></i> Hapus</button> ';

        } else {

            if(v.integrasi_ulang === '1'){

                btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="updateIntegrasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> update integrasi</button> ' +
                    '<button type="button" class="btn btn-secondary btn-xs" onclick="editOrganisasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button> ';

            } else {

                btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="editOrganisasi(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button> ';

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/update_integrasi_organisasi") ?>',
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
                            getDaftarOrganisasi(p);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getDaftarOrganisasi(p);

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

function deleteOrganisasi(obj, id, p) {

    let pesan = 'Apakah Anda ingin menghapus Organisasi?';
    let confirm_button = 'Hapus';
                
    swal.fire({
        title: 'Hapus Organisasi',
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
                url: '<?= base_url('satu_sehat/api/satu_sehat/hapus_organisasi') ?>',
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
                            getDaftarOrganisasi(p);

                        } else {
                            removeMe(obj);
                            messageCustom(data.metaData.message, 'Success');
                            getDaftarOrganisasi(p);

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

function removeMe(el) {
    var parent = el.parentNode.parentNode;
    parent.parentNode.removeChild(parent);
}

function resetEditOrganisasi() {

    $('#status-aktif').empty();
    $('#nama-edit-organisasi').val();
    
}

function editOrganisasi(id, p) {

    resetEditOrganisasi();

    $('#modal-edit-organisasi').modal('show');

    let namaStatus = '';

    $.ajax({
        type: 'GET',
        url: '<?= base_url("satu_sehat/api/satu_sehat/data_organisasi") ?>',
        data: 'id=' + id,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader();
        },
        success: function(data) {

            $('#id-organisasi').val(id);
            $('#nama-edit-organisasi').val(data.nama);
            if(data.status === '1'){

                namaStatus = 'Aktif';

            } else {

                namaStatus = 'Non Aktif';

            }

            $('#page-org').val(p);

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

function simpanEditOrganisasi() {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/simpan_edit_organisasi") ?>',
                data: $('#form-edit-organisasi').serialize(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201 | data.metaData.code === 202 | data.metaData.code === 400){

                            messageCustom(data.metaData.message, 'Error');
                            $('#modal-edit-organisasi').modal('hide');
                            getDaftarOrganisasi($('#page-org').val());

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            $('#modal-edit-organisasi').modal('hide');
                            getDaftarOrganisasi($('#page-org').val());

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

function intOrganisasi(id, p) {

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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasi_organisasi") ?>',
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
                            getDaftarOrganisasi(p);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getDaftarOrganisasi(p);

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