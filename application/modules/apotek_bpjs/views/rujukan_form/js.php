<script>
    $(function() {
        $("#tgl_dirujuk_rjk").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#ppk_dirujuk_rjk').select2({
            minimumInputLength: 3,
            ajax: {
                url: "<?= base_url(URL_VCLAIM_V1.'get_faskes') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        faskes: $('#asal_rujukan_rjk').val(),
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    return {
                        results: data,
                        more: false
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.kode + '</b> ' + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return '<b>' + data.kode + '</b> ' + data.nama;
            }
        });

        $('#diag_rjk').select2({
            minimumInputLength: 3,
            ajax: {
                url: "<?= base_url(URL_VCLAIM_V1.'get_diagnosa') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    return {
                        results: data,
                        more: false
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

        $('#kode_poli_rjk').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
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
                var kode = '';
                if (data.kode !== '') {
                    kode = '<b>' + data.kode + '</b> - ';
                };
                var markup = kode + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                $('#poli_hd_rjk').val(data.kode_bpjs);
                return data.nama;
            }
        });

        // End of Function
    });

    function dataPeserta(no_polish) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM_V1."get_peserta") ?>/nokartu/' + no_polish,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        // ok
                        $('#prov_rujukan_rjk').html(data.response.peserta.provUmum.nmProvider);
                    } else {
                        hide_ajax_indicator();
                        swalCustom("Pencarian Peserta BPJS", data.metaData.message);
                    }
                } else {
                    swalCustom("Koneksi Bermasalah", "Aplikasi tidak dapat terhubung dengan server BPJS. Silahkan hubungi pihak BPJS");
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

    function getDataRujukan(no_rujukan) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM_V1."get_rujukan_keluar") ?>/norujukan/' + no_rujukan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data !== null) {
                    if (data.vclaim_data.metaData.code === "200") {
                        // ok
                        var resp = data.vclaim_data.response.rujukan;
                        $('#tgl_dirujuk_rjk').val(datefmysql(resp.tglKunjungan));
                        $('#ppk_dirujuk_rjk').val(resp.provPerujuk.kode);
                        $('#s2id_ppk_dirujuk_rjk a .select2-chosen').html(resp.provPerujuk.nama);
                        $('#jenis_pelayanan_rjk').val(resp.pelayanan.kode);
                        $('#tipe_rujukan_rjk').val('0');
                        $('#poli_hd_rjk').val(resp.poliRujukan.kode);
                        $('#s2id_kode_poli_rjk a .select2-chosen').html(data.poli);
                        $('#diag_rjk').val(resp.diagnosa.kode);
                        $('#s2id_diag_rjk a .select2-chosen').html(resp.diagnosa.kode + ' - ' + resp.diagnosa.nama);
                    } else {
                        swalCustom("Pencarian Data Rujukan", data.metaData.message);
                    }
                } else {
                    swalCustom("Koneksi Bermasalah", "Aplikasi tidak dapat terhubung dengan server BPJS. Silahkan hubungi pihak BPJS");
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

    function updateRujukan(id_pendaftaran, no_sep, no_rujukan) {
        // Reset Form
        $('#bpjs_input').val('');
        $('#asal_rujukan_rjk').val('2');
        $('#jenis_pelayanan_rjk').val('2');
        $('#tipe_rujukan_rjk').val('0');

        $('#ppk_dirujuk_rjk').val('');
        $('#s2id_ppk_dirujuk_rjk a .select2-chosen').html('');

        $('#diag_rjk').val('');
        $('#s2id_diag_rjk a .select2-chosen').html('');

        $('#kode_poli_rjk').val('');
        $('#s2id_kode_poli_rjk a .select2-chosen').html('');

        $('#no_rujukan_hd_rjk').val(no_rujukan);
        if (no_rujukan !== '') {
            // Update
            $('#bt_update_rujukan').show();
            $('#bt_create_rujukan').hide();
        } else {
            // Create
            $('#bt_update_rujukan').hide();
            $('#bt_create_rujukan').show();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM_V1."get_detail_sep") ?>/no_sep/' + no_sep,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Mencari data SEP. Mohon tunggu');
            },
            success: function(data) {
                if (data.metaData.code === '200') {
                    var sep = data.response;

                    var kelamin = 'Laki-laki';
                    if (sep.peserta.sex == 'P') {
                        kelamin = 'Perempuan';
                    };

                    var poleks = 'Tidak';
                    if (sep.poliEksekutif === '1') {
                        poleks = 'Ya';
                    }

                    $('#no_sep_hd_rjk').val(sep.noSep);

                    $('#id_pendaftaran_rjk').val(id_pendaftaran);
                    $('#no_sep_rjk').html(sep.noSep);
                    $('#tgl_sep_rjk').html(datefmysql(sep.tglSep));
                    $('#no_kartu_rjk').html(sep.peserta.noKartu);
                    $('#nama_rjk').html(sep.peserta.nama);
                    $('#tgl_lahir_rjk').html(datefmysql(sep.peserta.tglLahir));
                    $('#kelamin_rjk').html(kelamin);
                    $('#jenis_rawat_rjk').html(sep.jnsPelayanan);
                    $('#no_rm_rjk').html(sep.peserta.noMr);
                    $('#poli_tujuan_rjk').html(sep.poli);
                    $('#poli_eks_rjk').html(poleks);
                    $('#kelas_rawat_rjk').html(sep.kelasRawat);
                    $('#diagnosa_rjk').html(sep.diagnosa);
                    $('#penjamin_lain_rjk').html(sep.penjamin);
                    $('#catatan_rjk').html(sep.catatan);

                    if (no_rujukan !== '') {
                        // get data rujukan
                        getDataRujukan(no_rujukan);
                    }

                    dataPeserta(sep.peserta.noKartu);
                    $('#bpjs_rujukan_form').modal('show');
                } else {
                    swalCustom('Buat Rujukan', 'Tidak dapat membuat surat rujukan, SEP tidak ditemukan');
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

    function konfirmasiRujukan(tipe) {
        var message = '';

        if (tipe === 'create') {
            message = "Tekan tombol \"Ya\" untuk membuat surat rujukan ";
        } else {
            message = "Tekan tombol \"Ya\" untuk mengupdate surat rujukan ";
        }

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
                        doUpadateRujukan(tipe);
                    }
                }
            }
        });
    }

    function doUpadateRujukan(tipe) {
        var action = '';
        if (tipe === 'create') {
            action = 'membuat';
        } else {
            action = 'mengupdate';
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url(URL_VCLAIM_V1."update_rujukan") ?>',
            data: $('#formrujukan').serialize() + '&tipe=' + tipe,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Proses ' + action + ' surat rujukan. Mohon tunggu');
            },
            success: function(data) {
                $('input[name=csrf_syam]').val('<?= $this->security->get_csrf_hash() ?>');
                if (data.metaData.code === "200") {
                    $('#bpjs_rujukan_form').modal('hide');
                    if (tipe === 'create') {
                        cetakRujukan(data.response.rujukan.noRujukan);
                    } else {
                        cetakRujukan(data.response);
                    }

                    getListPendaftaran($('#page_now').val(), '');
                } else {
                    swalCustom('error', 'Gagal membuat surat rujukan', data.metaData.message);
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

    function hapusRujukan(no_rujukan) {
        Swal.fire({
            title: 'Hapus Rujukan',
            text: "Apakah anda yakin ingin menghapus rujukan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: '<i class="fas fa-window-close"></i> Batal',
            confirmButtonText: '<i class="fas fa-check-circle"></i> Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url(URL_VCLAIM_V1."hapus_rujukan") ?>/',
                    data: 'no_rujukan=' + no_rujukan,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {
                        if (data.status) {
                            getListPendaftaran($('#page_now').val(), '');
                            swalCustom('success', 'Hapus Rujukan', data.message);
                        } else {
                            swalCustom('error', 'Gagal Hapus Rujukan', data.message);
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
        });
    }

    function cetakRujukan(id) {
        window.open('<?= base_url() ?>vclaim_bpjs/surat_rujukan_bpjs/' + id, 'Cetak Surat Rujukan ', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
    }
</script>