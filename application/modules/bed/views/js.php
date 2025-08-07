<script>
    $(function() {
        getListBed(1);
        $('.penghuni-area').hide();

        $('#btn-summary').click(function() {
            $('#modal-summary-bed').modal('show');
            $('#modal-summary-bed-label').html('Detail Summary Tempat Tidur Tersedia');
            getListBedBPJS(1);
            getListSummaryBed(1);
            // resetAll();
        });

        $('#btn-batal').click(function() {
            $('#modal-summary-bed').modal('hide');
            getListBed(1);
            resetAll();
        });

        $('#btn-tambah').click(function() {
			let accountGroup = "<?= $this->session->userdata('account_group') ?>";
            if (accountGroup !== 'Admin') {
                messageCustom('Hubungi administrator untuk penambahan bed !', 'Info');
            } else {
                $('.jml-bed').show();
                $('.no-bed, .status-bed').hide();

                $('#modal-bed').modal('show');
                $('#modal-bed-label').html('Form Tambah Bed');
                resetAll();
            }
        });

        $('#status-bed').change(function() {
            $('#penghuni').val('');
            $('.penghuni-area').hide();
            if ($(this).val() === 'Terpakai') {
                $('.penghuni-area').show();
            }
        });

        $('#btn-reload').click(function() {
            resetAll();
            getListBed(1);
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

        $('#kamar').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/kamar_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
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
                getNoBed(data.id);
                return data.nama;
            }
        });

    });

    function getNoBed(id_kamar) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("bed/api/bed/get_no_bed") ?>/' + id_kamar,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data !== null) {
                    $('#no-bed').val(data.no_bed);
                } else {
                    $('#no-bed').val('');
                }

                syams_validation_remove('#no-bed');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetAll() {
        $('input[type=text], #kamar, #id, #keyword').val('');
        $('#s2id_kamar a .select2-chosen').html('Pilih Kamar');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getListSummaryBed(page) {
        $('#page-now-sum').val(page);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('bed/api/bed/get_summary_bed/page_sum/') ?>' + page,
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((page > 1) & (data.length === 0)) {
                    getListSummaryBed(page - 1);
                    return false;
                }

                $('#pagination-sum').html(pagination(data.jumlah_sum, data.limit, data.page_sum, 1));
                $('#summary-sum').html(page_summary(data.jumlah_sum, data.data.length, data.limit, data.page_sum));
                $('#table-summary-bed tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page_sum - 1) * data.limit));
                    let hiddenBtnCreate = '';
                    if (v.status == 'create') {
                        hiddenBtnCreate = ''
                        hiddenBtnDelete = 'hidden'
                    } else {
                        hiddenBtnCreate = 'hidden'
                        hiddenBtnDelete = ''
                    }
                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td>' + v.namaruang + '</td>' +
                        '<td class="center">' + v.namakelas + '</td>' +
                        '<td class="center">' + v.kapasitas + '</td>' +
                        '<td class="center">' + (v.tersedia == null ? "0" : v.tersedia) + '</td>' +
                        '<td class="center">' + (v.tersediapria == null ? "0" : v.tersediapria) + '</td>' +
                        '<td class="center">' + (v.tersediawanita == null ? "0" : v.tersediawanita) + '</td>' +
                        '<td class="center">' + (v.tersediapriawanita == null ? "0" : v.tersediapriawanita) + '</td>' +
                        '<td class="center">' + (v.update_terakhir == null ? "-" : v.update_terakhir) + '</td>' +
                        <?php if ($this->session->userdata("account_group") == 'Admin') : ?> '<td class="right aksi">' +
                            '<button type="button" ' + hiddenBtnCreate + ' class="btn waves-effect waves-light btn-success btn-xs" onclick="createKetersediaanBed(\'' + v.kodekelas + '\', \'' + v.koderuang + '\')"><i class="fas fa-save mr-1"></i>Create</button> ' +
                            '<button type="button" ' + hiddenBtnDelete + ' class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteKetersediaanBed(\'' + v.kodekelas + '\', \'' + v.koderuang + '\')"><i class="fas fa-trash-alt mr-1"></i>Delete</button> ' +
                            '</td>' +
                        <?php endif; ?>
                    // '<td class="right aksi">' + (v.tersediapriawanita == null ? "0" : v.tersediapriawanita) + '</td>' +
                    '</tr>';
                    $('#table-summary-bed tbody').append(html);
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

    function getListBed(p) {
        $('#page-now').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('bed/api/bed/get_list_bed/page/') ?>' + p,
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListBed(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-data tbody').empty();

                let html = '';
                let is_bedah = '';
                let accountGroup = "<?= $this->session->userdata('account_group') ?>";
                $.each(data.data, function(i, v) {
                    is_bedah = 'Tidak';
                    if (v.icu_bedah === '1') {
                        is_bedah = 'Ya'
                    };

                    if (v.keterangan === 'Terpakai') {
                        keterangan = '<h5><span class="label label-info"><i class="fas fa-check-circle m-r-5"></i>Terpakai</span></h5>';
                    } else if (v.keterangan === 'Waiting') {
                        keterangan = '<h5><span class="label label-warning"><i class="fas fa-clock m-r-5"></i>Waiting</span></h5>';
                    } else if (v.keterangan === 'Dipesan') {
                        keterangan = '<h5><span class="label label-primary"><i class="fas fa-calendar m-r-5"></i>Dipesan</span></h5>';
                    } else {
                        keterangan = '<h5><span class="label label-success"><i class="fas fa-check m-r-5"></i>Tersedia</span></h5>';
                    }

					let buttonDelete = '';
					let buttonEdit= '';
                    if (accountGroup === 'Admin') {
                        buttonDelete = '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteDataBed(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash-alt mr-1"></i>Delete</button>';
                        buttonEdit   = '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editDataBed(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit mr-1"></i>Edit</button>';
                    } else {
                        buttonDelete = '';
                        v.is_active == 1 ? buttonEdit = '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editDataBed(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit mr-1"></i>Edit</button>' : '';
                    }
					
                    let status = ``;
                    if(accountGroup == 'Admin'){
                        status = `<div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="${v.id}" onclick="updateStatusBed(${v.id}, ${v.is_active}, ${v.id_bangsal})" ${(v.is_active == 1 ? 'checked' : '')}>
                                    <label class="custom-control-label" for="${v.id}">${(v.is_active == 1 ? '<h5><span class="label label-success">Aktif</span></h5>' : '<h5><span class="label label-danger">Tidak Aktif</span></h5>')}</label>
                                </div>`;
                    } else {
                        status = `<div>
                                    <label>${(v.is_active == 1 ? '<h5><span class="label label-success">Aktif</span></h5>' : '<h5><span class="label label-danger">Tidak Aktif</span></h5>')}</label>
                                </div>`;
                    }
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td>' + (v.nama + ' (' + v.kode + ')') + '</td>' +
                        '<td class="center">' + v.kelas + '</td>' +
                        '<td class="center">' + v.no_ruang + '</td>' +
                        '<td class="center">' + v.no_bed + '</td>' +
                        '<td class="center">' + v.out_of_service + '</td>' +
                        '<td class="center">' + v.out_of_capacity + '</td>' +
                        '<td class="center">' + is_bedah + '</td>' +
                        '<td class="center">' + status + '</td>' +
                        '<td>' + keterangan + '</td>' +
                        '<td class="right aksi">' +
                        buttonEdit + buttonDelete+
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

    function getListBedBPJS(page) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_APLICARES . "get_ruang_rawat") ?>/' + page,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Pencarian data rujukan, Mohon Tunggu...')
            },
            success: function(data) {
                if (data == null) {
                    swalCustom('error', 'Koneksi Bermasalah', 'Aplikasi tidak dapat terhubung dengan server BPJS. Silahkan hubungi pihak BPJS');
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

    function updateStatusBed(id, status, id_bangsal) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('bed/api/bed/update_status') ?>',
            data: 'id=' + id + '&status=' + status,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status !== false) {
                    UpdateKetersediaanBedID(id_bangsal);
                    getListBed($('#page-now').val());
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

    function simpanDataBed() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('bed/api/bed/simpan_bed/') ?>' + update,
            cache: false,
            data: $('#form-bed').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['kamar']) {
                        syams_validation('#kamar', data.error_string['kamar']);
                    }
                    if (data.error_string['jumlah_bed']) {
                        syams_validation('#jumlah-bed', data.error_string['jumlah_bed']);
                    }

                } else {
                    UpdateKetersediaanBedID($('#id-bangsal').val());
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListBed($('#page-now').val());
                    } else {
                        messageAddSuccess();
                        getListBed(1);
                    }

                    $('#modal-bed').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editDataBed(id, p) {
        $('.jml-bed').hide();
        $('#penghuni').val('');
        $('.penghuni-area').hide();
        $('.no-bed, .status-bed').show();

        $.ajax({
            type: 'GET',
            url: '<?= base_url('bed/api/bed/get_bed') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#id-bangsal').val(data.data.id_bangsal);
                $('#kamar').val(data.data.id_ruang);
                $('#s2id_kamar a .select2-chosen').html(data.data.ruangan);
                $('#no-bed').val(data.data.no_bed);
                $('#status-bed').val(data.data.keterangan);
                if (data.data.keterangan === 'Terpakai') {
                    $('#penghuni').val(data.data.penghuni);
                    $('.penghuni-area').show();
                };
                $('#out-of-service').val(data.data.out_of_service);
                $('#out-of-capacity').val(data.data.out_of_capacity);
                $('#icu-bedah').val(data.data.icu_bedah);

                $('#page-now').val(p);
                $('#modal-bed').modal('show');
                $('#modal-bed-label').html('Form Edit Bed');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteDataBed(id, p) {
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
                            url: '<?= base_url('bed/api/bed/delete_bed') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListBed(p);
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

    function createKetersediaanBed(kodekelas, koderuang) {

        $.ajax({
            type: 'POST',
            url: '<?= base_url(URL_APLICARES . "create_bed") ?>/kodekelas/' + kodekelas + '/koderuang/' + koderuang,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Proses update ketersediaan bed. Mohon tunggu');
            },
            success: function(data) {
                console.log(data)
                $('input[name=csrf_syam]').val('<?= $this->security->get_csrf_hash() ?>');
                if (data.metadata.code == "1") {
                    // $('#modal-summary-bed').modal('hide');
                    getListBedBPJS(1);
                    getListSummaryBed($('#page-now-sum').val());
                    getListBed(1);
                    resetAll();
                    swalCustom('success', 'Berhasil', data.metadata.message);
                } else {
                    swalCustom('error', 'Gagal update ketersediaan bed', data.metadata.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalCustom("error", "Koneksi Bermasalah", "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi IT BPJS");
            }
        });
    }

    function konfirmasiUpdateBed() {
        var message = '';
        message = "Tekan tombol \"Ya\" untuk mengupdate ketersediaan bed ";

        bootbox.dialog({
            message: message,
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close"></i> Tidak',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-check-circle"></i>  Ya',
                    className: "btn-info",
                    callback: function() {
                        doUpdateKetersediaanBed();
                    }
                }
            }
        });
    }

    function doUpdateKetersediaanBed() {

        $.ajax({
            type: 'POST',
            url: '<?= base_url(URL_APLICARES . "update_all_bed") ?>',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Proses update ketersediaan bed. Mohon tunggu');
            },
            success: function(data) {
                console.log(data)
                $('input[name=csrf_syam]').val('<?= $this->security->get_csrf_hash() ?>');
                if (data.metadata.code == "1") {
                    // $('#modal-summary-bed').modal('hide');
                    getListBedBPJS(1);
                    getListSummaryBed($('#page-now-sum').val());
                    getListBed(1);
                    resetAll();
                    swalCustom('success', 'Berhasil', data.metadata.message);
                } else {
                    swalCustom('error', 'Gagal update ketersediaan bed', data.metadata.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalCustom("error", "Koneksi Bermasalah", "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi IT BPJS");
            }
        });
    }

    function UpdateKetersediaanBedID(koderuang) {

        $.ajax({
            type: 'POST',
            url: '<?= base_url(URL_APLICARES . "update_bed") ?>/' + koderuang,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Proses update ketersediaan bed. Mohon tunggu');
            },
            success: function(data) {
                $('input[name=csrf_syam]').val('<?= $this->security->get_csrf_hash() ?>');
                if (data.metadata.code == "1") {
                    swalCustom('success', 'Berhasil', data.metadata.message);
                } else {
                    swalCustom('error', 'Gagal update ketersediaan bed', data.metadata.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalCustom("error", "Koneksi Bermasalah", "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi IT BPJS");
            }
        });
    }

    function deleteKetersediaanBed(kodekelas, koderuang) {
        var message = '';
        message = "Tekan tombol \"Ya\" Untuk menghapus data ruang ";

        bootbox.dialog({
            message: message,
            title: "Konfirmasi Hapus Data!",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close"></i> Tidak',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-check-circle"></i>  Ya',
                    className: "btn-info",
                    callback: function() {
                        doDeleteRuang(kodekelas, koderuang);
                    }
                }
            }
        });
    }

    function doDeleteRuang(kodekelas, koderuang) {

        $.ajax({
            type: 'POST',
            url: '<?= base_url(URL_APLICARES . "delete_bed") ?>/' + kodekelas + '/' + koderuang,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Proses hapus ketersediaan bed. Mohon tunggu');
            },
            success: function(data) {
                console.log(data)
                $('input[name=csrf_syam]').val('<?= $this->security->get_csrf_hash() ?>');
                if (data.metadata.code == "1") {
                    getListBedBPJS(1);
                    getListSummaryBed($('#page-now-sum').val());
                    swalCustom('success', 'Berhasil', data.metadata.message);
                } else {
                    swalCustom('error', 'Gagal hapus ketersediaan bed', data.metadata.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalCustom("error", "Koneksi Bermasalah", "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi IT BPJS");
            }
        });
    }

    function paging(p) {
        let pageBed = getListBed(p);
        let pageSummary = getListSummaryBed(p);
        ($('#page-now-sum').val() == 1 ? pageSummary : pageBed);
    }

   
</script>