<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    $(function() {
        getListPKRT(1);

        $('#keyword').keyup(debounceTime(function() {
            getListPKRT(1)
        }, 550));

        $('#btn-tambah').click(function() {
            resetForm();
            let htmlFooter = /* html */ `
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
                        class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiPKRT()"><i
                        class="fas fa-save"></i> Simpan</button>
            `;

            $('#footer').append(htmlFooter);

            $('#modal-add').modal('show');
            $('#modal-add-label').html('Tambah Perbekalan Kesehatan Rumah Tangga');
            $('.input-pkrt').val('');

        });

        $('#btn-reload').click(function() {
            resetForm();
            getListPKRT(1);
        });

    });

    function paging(p) {
        getListPKRT(p);
    }

    function resetForm() {
        $('#footer').empty();
        $('input[type=text], select, textarea, #id').val('');
        $('input[type=radio]').removeAttr('checked');
        $('a .select2-chosen').html('');
        $('#status-active').val(1);
    }

    function konfirmasiPKRT() {
        if ($('#nama-pkrt').val() === '') {
            syams_validation('#nama-pkrt', 'Kolom nama barang harus diisi.');
            $('#nama-pkrt').focus();
            return false;
        }
        syams_validation_remove('#nama-pkrt');

        bootbox.dialog({
            message: "Anda yakin akan menyimpan data ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        simpanDataPKRT();
                    }
                }
            }
        });
    }

    function simpanDataPKRT() {

        $.ajax({
            type: 'POST',
            url: '<?= base_url('perbekalan_kesehatan/api/perbekalan_kesehatan/simpan_pkrt') ?>',
            data: $('#form-tambah-pkrt').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    $('#modal-add').modal('hide');
                    getListPKRT(1);
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }

    function getListPKRT(p) {
        $('#page-now').val(p);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('perbekalan_kesehatan/api/perbekalan_kesehatan/perbekalan_kesehatan_list/page/') ?>' + p,
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListPKRT(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-data-pkrt tbody').empty();

                $.each(data.data, function(i, v) {
                    let active = /* html */ `
                        <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk mengaktifkan" onclick="konfirmasiAktivasi(${v.id}, '1')">
                            <i class="fas fa-toggle-off"></i> Tidak Aktif
                        </button>`;
                    let redBlock = 'style="background:red; color:white;"';

                    if (v.is_active == 1) {
                        active = /* html */ `
                        <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk me-nonaktifkan" onclick="konfirmasiAktivasi(${v.id}, '0')">
                            <i class="fas fa-toggle-on"></i> Aktif
                        </button>`;
                        redBlock = '';
                    }

                    let html = /* html */ `
                        <tr ${redBlock}>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td class="left">${v.nama}</td>                            
                            <td class="left">${active}</td>                            
                            <td class="right aksi">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editPKRT(${v.id})"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="deletePKRT(${v.id})"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;

                    $('#table-data-pkrt tbody').append(html);
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

    function editPKRT(id) {
        resetForm();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("perbekalan_kesehatan/api/perbekalan_kesehatan/get_detail_pkrt") ?>/id_pkrt/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {

                let idPKRT = id;

                let htmlFooter = /* html */ `
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
                            class="fas fa-window-close"></i> Batal</button>
                    <button type="button" class="btn btn-success waves-effect" onclick="konfirmasiEditPKRT(${idPKRT})"><i
                            class="fas fa-save"></i> Update</button>
                `;

                $('#footer').append(htmlFooter);

                $('#id-pkrt').val(idPKRT);
                $('#nama-pkrt').val(data.nama);
                $('#status-active').val(data.is_active);

            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });

        $('#modal-add-label').html('Edit Data Perbekalan Kesehatan Rumah Tangga');
        $('#modal-add').modal('show');
    }

    function konfirmasiEditPKRT(id) {
        bootbox.dialog({
            message: "Anda yakin akan mengubah data ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        updatePKRT(id);
                    }
                }
            }
        });
    }

    function updatePKRT(id) {
        if ($('#nama-pkrt').val() === '') {
            syams_validation('#nama-pkrt', 'Kolom nama barang harus diisi.');
            $('#nama-pkrt').focus();
            return false;
        }

        let idPKRT = id;

        $.ajax({
            type: 'POST',
            url: '<?= base_url("perbekalan_kesehatan/api/perbekalan_kesehatan/update_item") ?>',
            data: $('#form-tambah-pkrt').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    $('#modal-add').modal('hide');
                    getListPKRT($('#page-now').val());
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }

    function deletePKRT(id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        konfirmasiDeletePKRT(id);
                    }
                }
            }
        });
    }

    function konfirmasiDeletePKRT(id) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("perbekalan_kesehatan/api/perbekalan_kesehatan/delete_pkrt") ?>',
            data: {
                idPKRT: id
            },
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    getListPKRT($('#page-now').val());

                } else {

                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }

    function konfirmasiAktivasi(id, status) {
        var message = '';

        if (status == 1) {
            message = 'Anda yakin akan mengaktifkan data ini?';
        } else {
            message = 'Anda yakin akan mengnonaktifkan data ini?';
        }

        bootbox.dialog({
            message: message,
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        aktivasiMasterdata(id, status);
                    }
                }
            }
        });
    }

    function aktivasiMasterdata(id, status) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("perbekalan_kesehatan/api/perbekalan_kesehatan/aktifkan_masterdata") ?>',
            data: {
                id: id,
                status: status
            },
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    getListPKRT($('#page-now').val());
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }
</script>