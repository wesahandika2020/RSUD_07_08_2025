<script>
    $(function () {
        getListKultur(1);

        $('#bt_tambah_kultur').click(function() {
            $('#modal_kultur').modal('show');
            $('#modal_kulturi_label').html('Form Tambah Kultur');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListKultur(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control, .custom-select').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });
        
    });

    function resetAll() {
        $('input[type=text], .form-control, #id, #pencarian_kultur').val('');
        syams_validation_remove('.form-control, .custom-select');
    }

    function getListKultur(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('kultur_lab/api/kultur_lab/get_list_kultur/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_kultur').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKultur(p - 1);
                    return false;
                }

                $('#kultur_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#kultur_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_Kultur tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.kode + '</td>' +
                        '<td>' + v.grup + '</td>' +
                        '<td>' + v.kode_lis + '</td>' +
                        '<td>' + v.jenis + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editKultur(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteKultur(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_Kultur tbody').append(html);
                });
                
                hideLoader();
            },
            error: function (e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function editKultur(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('kultur_lab/api/kultur_lab/get_kultur') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#kode').val(data.data.kode);
                $('#kode_lis').val(data.data.kode_lis);
                $('#grup').val(data.data.grup);
                $('#jenis').val(data.data.jenis);

                $('#page_now_kultur').val(p);
                $('#modal_kultur').modal('show');
                $('#modal_kultur_label').html('Form Edit Kultur');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteKultur(id, p) {
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
                            url: '<?= base_url('kultur_lab/api/kultur_lab/delete_kultur') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListKultur(p);
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
    
    function simpanDatakultur() {
        let stop = false;
        // if ($('#nama').val() === '') {
        //     syams_validation('#nama', 'Silahkan masukkan nama Kultur');
        //     stop = true;
        // }

        if (stop) {
            return false;
        }

        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('kultur_lab/api/kultur_lab/simpan_kultur/') ?>' + update,
            cache: false,
            data: $('#form_kultur').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    alert('1');
                    messageEditSuccess();
                    getListKultur($('#page_now_kultur').val());
                } else {
                    alert('2');
                    getListKultur(1);
                    messageAddSuccess();
                }

                $('#modal_kultur').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function paging(p) {
        getListKultur(p);
    }

</script>