<script>
    $(function() {
        getListGolonganSebabSakit(1);

        //btn tambah
        $('#bt_tambah_golongan_sebab_sakit').click(function() {
            resetAll();
            $('#modal_golongan_sebab_sakit').modal('show');
            $('#modal_golongan_sebab_sakit_label').html('Form Tambah Golongan Sebab Sakit');
        });

        //btn reload
        $('#bt_reload_data').click(function() {
            getListGolonganSebabSakit(1);
            resetAll();
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });
    });

    function resetAll() {
        $('#id, #pencarian_golongan_sebab_sakit, .form-control').val('');
        syams_validation_remove('.form-control');
    }

    function getListGolonganSebabSakit(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('golongan_sebab_sakit/api/golongan_sebab_sakit/get_list_golongan_sebab_sakit') ?>/page/' + p,
            data: 'keyword=' + $('#pencarian_golongan_sebab_sakit').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListGolonganSebabSakit(p - 1);
                    return false;
                }

                $('#golongan_sebab_sakit_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#golongan_sebab_sakit_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_golongan_sebab_sakit tbody').empty();

                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let menular = '';
                    let status  = ``;
                    let account_group = "<?= $this->session->userdata('account_group') ?>";

                    if (v.menular == 0) {
                        menular = 'Tidak';
                    } else {
                        menular = 'Ya';
                    }                    

                    if (account_group == 'Admin' || account_group == 'Admin Rekam Medis') {
                        status = `<div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="${v.id}" onclick="konfirmasiUpdateStatusIcdX(${v.id}, ${v.is_aktif}, '${v.nama}')" ${(v.is_aktif == 1 ? 'checked' : '')}>
                                <label class="custom-control-label" for="${v.id}">${(v.is_aktif == 1 ? '<h5><span class="label label-success">Aktif</span></h5>' : '<h5><span class="label label-danger">Tidak Aktif</span></h5>')}</label>
                            </div>`;
                    } else{
                        status = `${(v.is_aktif == 1 ? '<h5><span class="label label-success">Aktif</span></h5>' : '<h5><span class="label label-danger">Tidak Aktif</span></h5>')}`;
                    }                    

					let is_aktif = v.is_aktif == '1' ? 'Aktif' : 'Tidak Aktif'
                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + (v.no_dtd !== null ? v.no_dtd : '')  + '</td>' +
                        '<td>' + v.kode_icdx_rinci + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + menular + '</td>' +
                        '<td>' + v.versi_tahun + '</td>' +
                        '<td>' + status + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editGolonganSebabSakit(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteGolonganSebabSakit(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_golongan_sebab_sakit tbody').append(html);
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
        getListGolonganSebabSakit(p);
    }

    function simpanDataGolonganSebabSakit() {
        let update = '';
        if ($('#id').val() !== '') {
            update = '/id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('golongan_sebab_sakit/api/golongan_sebab_sakit/simpan_golongan_sebab_sakit') ?>' + update,
            data: $('#form_golongan_sebab_sakit').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['kode_icdx']) {
                        syams_validation('#kode_icdx', data.error_string['kode_icdx']);
                    }

                    if (data.error_string['nama']) {
                        syams_validation('#nama', data.error_string['nama']);
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListGolonganSebabSakit($('#page_now_golongan_sebab_sakit').val());
                    } else {
                        messageAddSuccess();
                        getListGolonganSebabSakit(1);
                    }

                    $('#modal_golongan_sebab_sakit').modal('hide');
                    resetAll();
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }

        });
    }

    function editGolonganSebabSakit(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('golongan_sebab_sakit/api/golongan_sebab_sakit/get_golongan_sebab_sakit') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#no_dtd').val(data.data.no_dtd);
                $('#kode_icdx').val(data.data.kode_icdx_rinci);
                $('#nama').val(data.data.nama);
                $('#menular').val(data.data.menular);

                $('#page_now_golongan_sebab_sakit').val(p);
                $('#modal_golongan_sebab_sakit').modal('show');
                $('#modal_golongan_sebab_sakit_label').html('Form Edit Golongan Sebab Sakit');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function deleteGolonganSebabSakit(id, p) {
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
                            url: '<?= base_url('golongan_sebab_sakit/api/golongan_sebab_sakit/delete_golongan_sebab_sakit') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListGolonganSebabSakit(p);
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

    function konfirmasiUpdateStatusIcdX(id, status, diagnosa) {
        let getStatus = status == 1 ? 'mengaktifkan' : 'menonaktifkan';

        bootbox.dialog({
            title: "Konfirmasi Ubah Status",
            message: "Apakah anda yakin ingin <b>"+getStatus+"</b> data <b>"+diagnosa+"</b> ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary',
                    callback: function() {
                        getListGolonganSebabSakit(1);
                    }
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Ubah',
                    className: 'btn-info',
                    callback: function() {
                        $.ajax({
                            type: 'POST',                            
                            url: '<?= base_url('golongan_sebab_sakit/api/golongan_sebab_sakit/update_status') ?>',
                            data: 'id=' + id + '&status=' + status,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status !== false) {
                                    getListGolonganSebabSakit(1);
                                    messageCustom(data.message, 'Success');
                                } else {
                                    messageCustom(data.message, 'Error');
                                }
                            },
                            error: function(e) {
                                messageCustom('error', 'Error', 'Sistem Error');
                            }
                        })
                    }
                }
            }
        });
    }
	
</script>