<script>
    $(function() {
        $('#tindak-lanjut').change(function() {
            $('.ranap, .rujuk, .kondisi, .igd-area').hide();
            $('#kondisi-keluar').val('Hidup');

            if ($(this).val() === 'Rawat Inap') {
                $('.ranap').show();
                $('#pindah-ruang').prop('checked', false)
            }

            if ($(this).val() === 'Intensive Care') {
                $('.icare').show();
            }

            if ($(this).val() === 'RS Lain') {
                $('.kondisi').show();
                $('.rujuk').show();
            }

            if ($(this).val() === 'IGD') {
                $('.igd-area').show();
            }

            if (($(this).val() === 'Pulang APS') | ($(this).val() === 'Atas Izin Dokter') | ($(this).val() === 'Melarikan Diri') | ($(this).val() === 'Pulang Paksa') | ($(this).val() === 'Pulang') | ($(this).val() === 'Pemulasaran Jenazah')) {
                $('.kondisi').show();

                if ($(this).val() === 'Pemulasaran Jenazah') {
                    $("#kondisi-keluar option[value='Hidup']").hide()
                    $("#kondisi-keluar option[value='Meninggal < 48 Jam']").show()
                    $("#kondisi-keluar option[value='Meninggal > 48 Jam']").show()
                    $('#kondisi-keluar').val('Meninggal < 48 Jam')

                } else {
                    $("#kondisi-keluar option[value='Hidup']").show()
                    $("#kondisi-keluar option[value='Meninggal < 48 Jam']").hide()
                    $("#kondisi-keluar option[value='Meninggal > 48 Jam']").hide()
                    $('#kondisi-keluar').val('Hidup')
                }

                if ($('#jenis-layanan').val() === 'Rawat Inap') {
                    cekDiagnosaAkhir();
                }
            }

            if (($(this).val() === 'Pulang APS') | ($(this).val() === 'Pulang') | ($(this).val() === 'Atas Izin Dokter') | ($(this).val() === 'Melarikan Diri') | ($(this).val() === 'Pulang Paksa') | ($(this).val() === 'Pemulasaran Jenazah') | ($(this).val() === 'RS Lain') | ($(this).val() === 'IGD') | ($(this).val() === 'Rawat Inap')) {
                cekBHPOperasi($('#icare-layanan-pendaftaran').val());
            }
        });

        // SELECT2 AUTO
        $('#instansi-rujukan').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/instansi_auto') ?>",
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
                var markup = data.nama + '<br/><i>' + data.alamat + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#dokter-ranap').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
                var markup = '<b>' + data.nama +'</b><br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#dokter-dpjp').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
                var markup = '<b>' + data.nama +'</b><br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#bangsal-auto').select2({
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
                var markup = '<b>' + data.nama + '</b><br/>' + data.kode;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#kondisi-keluar').change(function() {
            $('.mati').hide();
            if ($(this).val() === 'Meninggal' | $(this).val() === 'Meninggal < 48 Jam' | $(this).val() === 'Meninggal > 48 Jam') {
                $('.mati').show();
            }
        });
    });

    function formTindakLanjut(id_pendaftaran, id_layanan_pendaftaran, resep, id_dokter, nama_dokter, jenis = '') {
        if (jenis === '') {
            if (id_dokter === null) {
                swalAlert('warning', 'Validasi', 'Dokter DPJP harus diisi terlebih dahulu !');
                return false;
            } 
        }

        $('#dokter-ranap, #bangsal-auto, #id-pendaftaran-inap, #layanan-inap, #id-layanan-pendaftaran, #tindak-lanjut').val('');
        $('#s2id_dokter-ranap a .select2-chosen').html(nama_dokter);
        $('#dokter-ranap').val(id_dokter);
        $('#s2id_dokter-dpjp a .select2-chosen').html('Pilih Dokter DPJP');
        $('#s2id_bangsal-auto a .select2-chosen').html('Pilih Bangsal Tujuan');
        $('.ranap, .rujuk, .kondisi, .igd-area').hide();
        $('.kondisi').show();
        $('#tanpa-resep').val(resep);

        $('#id-pendaftaran-inap').val(id_pendaftaran);
        $('#icare-layanan-pendaftaran').val(id_layanan_pendaftaran);
        $('#modal-tindak-lanjut').modal('show');
    }

    function cekDiagnosaAkhir() {
        $.ajax({
            url: '<?= base_url("pelayanan/api/pelayanan/cek_diagnosa_akhir") ?>/id/' + $('#icare-layanan-pendaftaran').val(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
                    openFormDiagnosaAkhir($('#icare-layanan-pendaftaran').val());
                    return false;
                }
            },
            error: function(e) {
                messageCustom('Gagal Mengakses Data', 'Error');
            }
        })
    }

    function cekBHPOperasi(id_layanan_pendaftaran) {
        $.ajax({
            url: '<?= base_url("pelayanan/api/pelayanan/cek_status_bhp_operasi") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            async: false,
            success: function(data) {
                if (data.status === false) {
                    swal({
                        html: true,
                        title: 'Warning',
                        text: data.message,
                        type: "warning"
                    });
                }
            }

        })
    }

    function openFormDiagnosaAkhir(id_layanan_pendaftaran) {
        $('#id-layanan-pendaftaran-akhir').val(id_layanan_pendaftaran);
    }

    function simpanTindakLanjut() {
        $.ajax({
            url: '<?= base_url("pelayanan/api/pelayanan/cek_diagnosa_akhir") ?>/id/' + $('#icare-layanan-pendaftaran').val(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
                    if ($('#jenis-layanan').val() === 'Intensive Care') {
                        if (($(this).val() === 'Pulang APS') | ($(this).val() === 'Atas Izin Dokter') | ($(this).val() === 'Melarikan Diri') | ($(this).val() === 'Pulang Paksa') | ($(this).val() === 'Pulang') | ($(this).val() === 'Pemulasaran Jenazah')) {
                            openFormDiagnosaAkhir($('#icare-layanan-pendaftaran').val());
                        } else {
                            konfirmasiSimpanTindakLanjut();
                        }
                    } else {
                        konfirmasiSimpanTindakLanjut();
                    }
                } else {
                    konfirmasiSimpanTindakLanjut();
                }
            },
            error: function(e) {
                messageCustom('Gagal Mengakses Data', 'Error');
            }
        });
    }

    function konfirmasiSimpanTindakLanjut() {
        var stop = false;
        if ($('#tindak-lanjut').val() === '') {
            syams_validation('#tindak-lanjut', 'Kolom cara keluar harus diisi');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_tindak_lanjut_icare") ?>/' + '<?= $jenis_tindak_lanjut ?>',
            data: $('#form-tindak-lanjut').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    $('#modal-tindak-lanjut').modal('hide');
                    getListPemeriksaan($('#page_now').val(), '');
                    messageCustom(data.message, 'Success');
                } else {
                    modalDialogKonfirmasiResep(data.id_pendaftaran, data.id_layanan_pendaftaran, data.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        })
    }

    function modalDialogKonfirmasiResep(id_pendaftaran, id_layanan_pendafaran, message) {
        bootbox.dialog({
            message: message,
            title: "Warning!",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle"></i> Tidak',
                    className: "btn-secondary",
                    callback: function() {
                        $('#modal-tindak-lanjut').modal('hide');
                    }
                },
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> Ya',
                    className: "btn-info",
                    callback: function() {
                        $('#tanpa-resep').val('Ya');
                    }
                }
            }
        });
    }

    function pembatalanStatusKeluarIcare(id_pendaftaran, id_layanan_pendaftaran) {
        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar pasien",
            title: "Pembatalan Status Keluar!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/pembatalan_status_keluar_icare") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            }, 
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },  
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }
	
	function statusKeluarSementara(id_pendaftaran, id_layanan_pendaftaran, tindak_lanjut) {

        if (tindak_lanjut === 'null') {
            messageCustom('Pasien belum dipulangkan', 'Info');
            return false;
        }

        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar SEMENTARA !",
            title: "Pembatalan Status Keluar Sementara!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/status_keluar_sementara") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar SEMENTARA', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar SEMENTARA', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function statusKeluarSementaraIt(id_pendaftaran, id_layanan_pendaftaran, tindak_lanjut) {

        if (tindak_lanjut === 'null') {
            messageCustom('Pasien belum dipulangkan', 'Info');
            return false;
        }

        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar SEMENTARA !",
            title: "Pembatalan Status Keluar Sementara!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/status_keluar_sementara_it") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar SEMENTARA', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar SEMENTARA', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function pembatalanStatusKeluarSementara(id_pendaftaran, id_layanan_pendaftaran, tindak_lanjut) {
        if (tindak_lanjut !== 'cco sementara' && tindak_lanjut !== 'cco sementara it') {
            messageCustom('Pasien tidak dengan status pulang CCO SEMENTARA ', 'Info');
            return false;
        }

        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar SEMENTARA !",
            title: "Pembatalan Status Keluar Sementara!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/pembatalan_status_keluar_sementara") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar SEMENTARA', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar SEMENTARA', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }
</script>