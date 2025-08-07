<script>
    $(function() {
        getListBangsal(1);

        $('#btn-tambah').click(function() {
            $('#modal-bangsal').modal('show');
            $('#modal-bangsal-label').html('Form Tambah Bangsal');
            resetAll();
        });

        $('#btn-reload').click(function() {
            resetAll();
            getListBangsal(1);
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

        $('#unit').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
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
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });
    });

    function resetAll() {
        $('input[type=text], .form-control, #id, #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
        $('#status').val('Ya');
		$('#is_for_woman').val('Tidak');
    }

    function getListBangsal(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('bangsal/api/bangsal/get_list_bangsal/page/') ?>' + p,
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListBangsal(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-data tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td class="center">' + v.kode + '</td>' +
                        '<td class="center">' + v.kode_kelas + ' (RUANG ' + v.nama_kelas + ')' + '</td>' +
                        '<td>' + v.unit + '</td>' +
                        '<td>' + v.keterangan + '</td>' +
                        '<td class="center">' + v.is_active + '</td>' +
                        // '<td class="center">' + (v.is_for_woman !== null ? v.is_for_woman : '') + '</td>' +
                        '<td class="right aksi">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editDataBangsal(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit mr-1"></i>Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteDataBangsal(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash-alt mr-1"></i>Delete</button> ' +
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

    function paging(p) {
        getListBangsal(p);
    }

    function simpanDataBangsal() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('bangsal/api/bangsal/simpan_bangsal/') ?>' + update,
            cache: false,
            data: $('#form-bangsal').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['bangsal']) {
                        syams_validation('#bangsal', data.error_string['bangsal']);
                    }
                    if (data.error_string['kode']) {
                        syams_validation('#kode', data.error_string['kode']);
                    }

                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListBangsal($('#page-now').val());
                    } else {
                        messageAddSuccess();
                        getListBangsal(1);
                    }

                    $('#modal-bangsal').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editDataBangsal(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('bangsal/api/bangsal/get_bangsal') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#bangsal').val(data.data.nama);
                $('#kode').val(data.data.kode);
                $('#kode-kelas-bed').val(data.data.id_kode_kelas);
                $('#unit').val(data.data.id_unit);
                $('#s2id_unit a .select2-chosen').html(data.data.unit);
                $('#keterangan').val(data.data.keterangan);
                $('#status').val(data.data.is_active);

                $('#page-now').val(p);
                $('#modal-bangsal').modal('show');
                $('#modal-bangsal-label').html('Form Edit Bangsal');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteDataBangsal(id, p) {
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
                            url: '<?= base_url('bangsal/api/bangsal/delete_bangsal') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListBangsal(p);
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
</script>
