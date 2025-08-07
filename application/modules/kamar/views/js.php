<script>
    $(function() {
        getListKamar(1);

        $('#btn-tambah').click(function() {
            $('.jml-kamar').show();
            $('.no-kamar').hide();
            $('#modal-kamar').modal('show');
            $('#modal-kamar-label').html('Form Tambah Kamar');
            resetAll();
        });

        $('#btn-reload').click(function() {
            resetAll();
            getListKamar(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control, .select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#bangsal').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/bangsal_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama + '<br>' + data.kode;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#kelas').change(function(){
            var bangsal = $('#bangsal').val();
            var kelas = $(this).val();
            if(($('#id').val() != '') & (bangsal !== '')){
                getNoKamar(bangsal, kelas)
            }
        });
    });

    function getNoKamar(bangsal, kelas) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("kamar/api/kamar/get_no_kamar") ?>/' + bangsal + '/' + kelas,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data !== null) {
                    $('#no-kamar').val(data.no_kamar);
                }else{
                    $('#no-kamar').val('');
                }
                syams_validation_remove('#no-kamar');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function resetAll() {
        $('input[type=text], .form-control, #id, #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
        $('#s2id_bangsal a .select2-chosen').html('Pilih Bangsal');
    }

    function getListKamar(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('kamar/api/kamar/get_list_kamar/page/') ?>' + p,
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKamar(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-data tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    if (v.penghuni == 'L') {
                       penghuni = 'Laki - laki';
                    } else if (v.penghuni == 'P') {
                        penghuni = 'Perempuan';
                    } else {
                        penghuni = '';
                    }

                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td>' + v.bangsal + '</td>' +
                        '<td class="center">' + v.kode_kelas + '</td>' +
                        '<td class="center">' + v.kelas + '</td>' +
                        '<td class="center">' + v.no_ruang + '</td>' +
                        '<td>' + v.keterangan + '</td>' +
                        '<td>' + penghuni + '</td>' +
                        '<td class="right aksi">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editDataKamar(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit mr-1"></i>Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteDataKamar(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash-alt mr-1"></i>Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table-data tbody').append(html);
                });

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function simpanDataKamar() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('kamar/api/kamar/simpan_kamar/') ?>' + update,
            cache: false,
            data: $('#form-kamar').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['bangsal']) {
                        syams_validation('#bangsal', data.error_string['bangsal']);
                    }
                    if (data.error_string['jumlah_kamar']) {
                        syams_validation('#jumlah-kamar', data.error_string['jumlah_kamar']);
                    }

                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListKamar($('#page-now').val());
                    } else {
                        messageAddSuccess();
                        getListKamar(1);
                    }

                    $('#modal-kamar').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editDataKamar(id, p) {
        resetAll();
        $('.jml-kamar').hide();
        $('.no-kamar').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('kamar/api/kamar/get_kamar') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#bangsal').val(data.data.id_bangsal);
                $('#s2id_bangsal a .select2-chosen').html(data.data.bangsal);
                $('#kelas').val(data.data.id_kelas);
                $('#kode-kelas-bed').val(data.data.id_kode_kelas);
                $('#no-kamar').val(data.data.no_ruang);
                $('#keterangan').val(data.data.keterangan);

                $('#page-now').val(p);
                $('#modal-kamar').modal('show');
                $('#modal-kamar-label').html('Form Edit Kamar');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteDataKamar(id, p) {
        bootbox.dialog({
            title: "Konfirmasi Hapus",
            message: "Apakah anda yakin ingin menghapus data ini ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary'
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Hapus',
                    className: 'btn-danger',
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url('kamar/api/kamar/delete_kamar') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListKamar(p);
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    function paging(p) {
        getListKamar(p);
    }
</script>