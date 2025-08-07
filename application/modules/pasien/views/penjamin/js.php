<script>
    $(function() {
        $('#bt_tambah_penjamin').click(function() {
            resetFormPenjamin();
            $('#modal_tambah_penjamin').modal('show');
            $('#modal_tambah_penjamin_label').html('Form Tambah Penjamin Pasien');
        });

        $('#penjamin').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: '',
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
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== null) {
                syams_validation_remove(this);
            }
        });

        $('.select2-input').change(function() {
            if ($(this).val() !== null) {
                syams_validation_remove(this);
            }
        });
    });

    // Penjamin Pasien
    function penjaminPasien(no_rm) {
        $.ajax({
            url: '<?= base_url('pasien/api/pasien/get_penjamin_pasien') ?>/id/' + no_rm,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                showPenjaminPasien(data);
                $('#modal_penjamin').modal('show');
                $('#modal_penjamin_label').html('Form Penjamin Pasien');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function showPenjaminPasien(data) {
        $('#table_penjamin tbody').empty();
        $('#id_pasien_penjamin').val(data.pasien.id);
        $('#no_rm_pj_pasien').html(data.pasien.id);
        $('#nama_pj_pasien').html(data.pasien.nama);

        let penjamin = data.penjamin;
        if (penjamin !== null) {
            $.each(penjamin, function(i, v) {
                let html = '<tr>' +
                    '<td align="center">' + (++i) + '</td>' +
                    '<td align="left">' + v.penjamin + '</td>' +
                    '<td align="left">' + v.no_polish + '</td>' +
                    '<td align="right">' +
                    '<button type="button" class="btn btn-secondary btn-xxs waves-effect" onclick="hapusPenjamin(this, ' + v.id + ')"><i class="fas fa-trash"></i></button>' +
                    '</td>' +
                    '</tr>';
                $('#table_penjamin tbody').append(html);
            })
        }
    }

    function resetFormPenjamin() {
        $('#penjamin, #no_polish').val('');
        $('#s2id_penjamin a .select2-chosen').html('');
    }

    function removeMe(el) {
        let parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function konfirmasiSimpanPenjamin() {
        bootbox.dialog({
            message: "Anda yakin akan mengentri penjamin pasien ?",
            title: "Konfirmasi Simpan Penjamin Pasien",
            buttons: {
                batal: {
                    label: '<i class="fa fa-refresh"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fa fa-save"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        simpanPenjaminPasien();
                    }
                }
            }
        });
    }

    function simpanPenjaminPasien() {
        let no_rm = $('#id_pasien_penjamin').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('pasien/api/pasien/simpan_penjamin_pasien') ?>/id/' + no_rm,
            cache: false,
            data: $('#form_penjamin').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.validasi == false) {
                    $('input[name=csrf_syam]').val(data.token);
                    showErrorValidate('#penjamin', 'penjamin', data);
                    showErrorValidate('#no_polish', 'no_polish', data);
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status == false) {
                        messageCustom('Gagal tambah penjamin', 'Error');
                    } else {

                        messageCustom('Berhasil tambah penjamin', 'Success');
                        penjaminPasien(no_rm);

                        resetFormPenjamin();
                        $('#modal_tambah_penjamin').modal('hide');
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Gagal tambah penjamin', 'Error');
            }
        });
    }

    function hapusPenjamin(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini ?",
            title: "Konfirmasi Hapus Penjamin Pasien",
            buttons: {
                batal: {
                    label: '<i class="fa fa-refresh"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fa fa-trash"></i> Hapus',
                    className: "btn-danger",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url('pasien/api/pasien/hapus_penjamin_pasien') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status === true) {
                                    removeMe(obj);
                                    messageDeleteSuccess();
                                } else {
                                    messageDeleteFailed();
                                }
                            },
                            error: function (e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }
</script>