<script>
    $(function() {
        getListKepegawaian(1);
        // $('.mypopover').popover();

        setInputFilter(document.getElementById("hp_pegawai"), function(value) {
            return /^\d*$/.test(value);
        });

        $('#bt_tambah_kepegawaian').click(function() {
            $('#modal_kepegawaian').modal('show');
            $('#modal_kepegawaian_label').html('Form Tambah Pegawai');
            resetAllKepegawaian();
        });

        $('#bt_reload_data_kepegawaian').click(function() {
            resetAllKepegawaian();
            getListKepegawaian(1);
        });

        $('#tgl_lahir_pegawai').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            format: 'DD/MM/YYYY',
            lang: 'id',
            switchOnClick: true,
            maxDate: new Date()
        });

        $('#jabatan_pegawai').select2({
            theme: 'bootstrap4',
            placeholder: 'Silahkan pilih jabatan pegawai',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/jabatan_auto') ?>",
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

        $('#tmp_lahir_pegawai').select2({
            theme: 'bootstrap4',
            placeholder: 'Silahkan pilih tempat lahir pegawai',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/kotakabupaten_auto') ?>",
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
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.provinsi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama + ', ' + data.provinsi;
            }
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control, .select2-input, .custom-select').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });
    });

    function resetAllKepegawaian() {
        $('input[type=text], .form-control, .custom-select, #id_pegawai, #pencarian_kepegawaian').val('');
        $('#s2id_tmp_lahir_pegawai a .select2-chosen').html('Silahkan pilih tempat lahir pegawai');
        $('#s2id_jabatan_pegawai a .select2-chosen').html('Silahkan pilih jabatan pegawai');
        $('#image_upload').attr('src', '<?= resource_url() ?>images/avatars/upload.png');
        $('#nama_image').val('');
        syams_validation_remove('.form-control, .custom-select, .select2-input');
    }

    function getListKepegawaian(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pegawai/api/pegawai/get_list_pegawai/page/') ?>' + p,
            cache: false,
            data: 'keyword=' + $('#pencarian_kepegawaian').val(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKepegawaian(p - 1);
                    return false;
                }

                $('#kepegawaian_pagination').html(pagination(data.jumlah, data.limit, data.page, 2));
                $('#kepegawaian_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_kepegawaian tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let status = '';
                    let background = '';

                    let name_image = v.profil + '.' + v.type;

                    if (v.status == 0) {
                        status = '<span class="label label-danger">Not Active</span>';
                        background = 'style="background-color:red;"';
                    } else {
                        status = '<span class="label label-success">Active</span>';
                        background = '';
                    }

                    let html = '<tr '+ background +'>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.nip + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="center">' + v.kelamin + '</td>' +
                        '<td>' + v.jabatan + '</td>' +
                        '<td>' + status + '</td>' +
                        '<td align="right">' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="detailKepegawaian(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-eye"></i> Detail</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editKepegawaian(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
                        '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteKepegawaian(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_kepegawaian tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function detailKepegawaian(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pegawai/api/pegawai/get_pegawai') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#nama_pegawai_detail').html(data.data.nama);
                $('#jabatan_pegawai_detail').html(data.data.jabatan);
                $('#email_pegawai_detail').html(data.data.email);
                $('#hp_pegawai_detail').html(data.data.hp);
                $('#alamat_pegawai_detail').html(data.data.alamat);

                $('#nip_pegawai_detail').html(data.data.nip);
                $('#nik_pegawai_detail').html(data.data.nik);
                $('#tmp_lahir_pegawai_detail').html(data.data.kotakabupaten);
                $('#tgl_lahir_pegawai_detail').html(data.data.tgl_lahir);
                $('#kelamin_pegawai_detail').html(data.data.kelamin);
                $('#agama_pegawai_detail').html(data.data.agama);
                $('#gol_darah_pegawai_detail').html(data.data.gol_darah);

                if (data.data.profil !== null) {
                    $('#image_detail_pegawai').attr('src', '<?= resource_url() ?>images/avatars/' + data.data.profil + '.' + data.data.type);
                } else {
                    $('#image_detail_pegawai').attr('src', '<?= resource_url() ?>assets/images/big/d2.jpg');
                }

                $('#modal_detail_kepegawaian').modal('show');
                $('#modal_detail_kepegawaian_label').html('Detail Kepegawaian');

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function uploadFoto() {
        let fileImage = $('#file_image').prop('files')[0];

        // validasi ukuran file
        if (fileImage.size > 1000000) {
            $('#file_image').val('');
            messageCustom('File yang diunggah terlalu besar ! | Maximal gambar 1 MB', 'Error');
        } else {
            // proses upload file ke server
            let data = new FormData();
            data.append('file_image', fileImage);
            // console.log(data); return false;
            $.ajax({
                type: 'POST',
                url: '<?= base_url('pegawai/pegawai/upload_image') ?>',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    if (data.status === false) {
                        messageCustom(data.error, 'Error');
                        $('#file_image').val();
                        $('#nama_image').val();
                    } else {
                        deleteImageOld('#nama_image');

                        let url_image = '<?= resource_url() ?>images/avatars/' + data.file_name;
                        $('#image_upload').attr('src', url_image);
                        $('#nama_image').val(data.file_name);
                        // deleteImageOld('#nama_image');


                        messageCustom(data.success, 'Success');
                        hideLoader();
                    }
                },
                error: function(e) {
                    accessFailed(e.status);
                    hideLoader();
                }
            });
        }
    }

    function deleteImageOld(param) {
        let file_tmp = $(param).val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('pegawai/pegawai/delete_image_old') ?>',
            data: {
                file_tmp: file_tmp
            },
            dataType: 'JSON',
            success: function(data) {
                messageCustom('Image lama telah terhapus!', 'Success');
            },
            error: function(e) {
                messageCustom(e.status, 'Error');
            }
        })
    }

    function simpanDataKepegawaian() {
        let stop = false;
        if ($('#nama_pegawai').val() === '') {
            syams_validation('#nama_pegawai', 'Nama pegawai tidak boleh kosong');
            stop = true;
        }

        // if ($('#tmp_lahir_pegawai').val() === '') {
        //     syams_validation('#tmp_lahir_pegawai', 'Tempat lahir tidak boleh kosong');
        //     stop = true;
        // }

        // if ($('#tgl_lahir_pegawai').val() === '') {
        //     syams_validation('#tgl_lahir_pegawai', 'Tanggal lahir tidak boleh kosong');
        //     stop = true;
        // }

        if ($('#kelamin_pegawai').val() === '') {
            syams_validation('#kelamin_pegawai', 'Pilih jenis kelamin');
            stop = true;
        }

        // if ($('#jabatan_pegawai').val() === '') {
        //     syams_validation('#jabatan_pegawai', 'Pilih jabatan pegawai');
        //     stop = true;
        // }

        if (stop) {
            return false;
        }

        let update = '';
        if ($('#id_pegawai').val() !== '') {
            update = 'id/' + $('#id_pegawai').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('pegawai/api/pegawai/simpan_pegawai/') ?>' + update,
            cache: false,
            data: $('#formkepegawaian').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if ($('#id_pegawai').val() !== '') {
                    messageEditSuccess();
                    getListKepegawaian($('#page_now_kepegawaian').val());
                } else {
                    messageAddSuccess();
                    getListKepegawaian(1);
                }

                $('#modal_kepegawaian').modal('hide');
                resetAllKepegawaian();
                hideLoader();
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function deleteKepegawaian(id, p) {
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
                            url: '<?= base_url('pegawai/api/pegawai/delete_pegawai') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListKepegawaian(p);
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

    function editKepegawaian(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pegawai/api/pegawai/get_pegawai') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id_pegawai').val(data.data.id);
                $('#nip_pegawai').val(data.data.nip);
                $('#nik_pegawai').val(data.data.nik);
                $('#nama_pegawai').val(data.data.nama);
                $('#email_pegawai').val(data.data.email);
                $('#tmp_lahir_pegawai').val(data.data.id_kota_kabupaten);
                $('#s2id_tmp_lahir_pegawai a .select2-chosen').html(data.data.kotakabupaten);
                $('#tgl_lahir_pegawai').val((data.data.tgl_lahir !== null)?datefmysql(data.data.tgl_lahir):'');
                $('#alamat_pegawai').val(data.data.alamat);
                $('#kelamin_pegawai').val(data.data.kelamin);
                $('#gol_darah_pegawai').val(data.data.gol_darah);
                $('#agama_pegawai').val(data.data.agama);
                $('#jabatan_pegawai').val(data.data.id_jabatan);
                $('#s2id_jabatan_pegawai a .select2-chosen').html(data.data.jabatan);
                $('#hp_pegawai').val(data.data.hp);

                if (data.data.profil !== null) {
                    let profil = data.data.profil + '.' + data.data.type;
                    $('#image_upload').attr('src', '<?= resource_url() ?>images/avatars/' + profil);
                    $('#nama_image').val(profil);
                } else {
                    $('#image_upload').attr('src', '<?= resource_url() ?>images/avatars/upload.png');
                    $('#nama_image').val('');
                }

                $('#page_now_kepegawaian').val(p);
                $('#modal_kepegawaian').modal('show');
                $('#modal_kepegawaian_label').html('Form Edit Pegawai');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }
</script>