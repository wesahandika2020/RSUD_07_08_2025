<script>
	$(function() {
        getListJenisPemeriksaan(1);

        $('#bt_tambah_jenis_pemeriksaan').click(function() {
            $('#modal_jenis_pemeriksaan').modal('show');
            $('#modal_jenis_pemeriksaan_label').html('Form Tambah Jenis Pemeriksaan');
            resetAll();
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListJenisPemeriksaan(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });
    });

    function resetAll() {
        $('input[type=text], .form-control, #id, #pencarian_jenis_pemeriksaan').val('');
        syams_validation_remove('.form-control');
    }

    function getListJenisPemeriksaan(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('jenis_pemeriksaan/api/jenis_pemeriksaan/get_list_jenis_pemeriksaan/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_jenis_pemeriksaan').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListJenisPemeriksaan(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_jenis_pemeriksaan tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editJenisPemeriksaan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteJenisPemeriksaan(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_jenis_pemeriksaan tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        })
    }

    function simpanDataJenisPemeriksaan() {
        let stop = false;
        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Silahkan masukkan nama jenis pemeriksaan');
            stop = true;
        }

        if (stop) {
            return false;
        }

        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('jenis_pemeriksaan/api/jenis_pemeriksaan/simpan_jenis_pemeriksaan/') ?>' + update,
            cache: false,
            data: $('#form_jenis_pemeriksaan').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id').val() !== '') {
                    messageEditSuccess();
                    getListJenisPemeriksaan($('#page_now_jenis_pemeriksaan').val());
                } else {
                    getListJenisPemeriksaan(1);
                    messageAddSuccess();
                }

                $('#modal_jenis_pemeriksaan').modal('hide');
                resetAll();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editJenisPemeriksaan(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('jenis_pemeriksaan/api/jenis_pemeriksaan/get_jenis_pemeriksaan') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);

                $('#page_now_jenis_pemeriksaan').val(p);
                $('#modal_jenis_pemeriksaan').modal('show');
                $('#modal_jenis_pemeriksaan_label').html('Form Edit Jenis Pemeriksaan');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteJenisPemeriksaan(id, p) {
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
                            url: '<?= base_url('jenis_pemeriksaan/api/jenis_pemeriksaan/delete_jenis_pemeriksaan') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListJenisPemeriksaan(p);
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

    function paging(page) {
    	getListJenisPemeriksaan(page);
    }
</script>