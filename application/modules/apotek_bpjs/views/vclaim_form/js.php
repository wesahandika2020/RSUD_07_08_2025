<link rel="stylesheet" href="<?= resource_url() ?>assets/css/select2-custom.css" />
<script src="<?= resource_url() ?>assets/js/select2c.js"></script>

<script>
    var kelas1 = [{
        'kode': '1',
        'kelas': 'I'
    }, {
        'kode': '2',
        'kelas': 'II'
    }, {
        'kode': '3',
        'kelas': 'III'
    }];

    var kelas2 = [{
        'kode': '2',
        'kelas': 'II'
    }, {
        'kode': '3',
        'kelas': 'III'
    }];

    var kelas3 = [{
        'kode': '3',
        'kelas': 'III'
    }];

    var NOKARTU_BPJS = '';

    $(function() {
        $('.laka').hide();
        $('.kode_poli_area').hide();
        $('#label_poli_bpjs').show();
        $('#jaminan_laka_bpjs').multiselect();

        $('#tanggal_sep_bpj').val('<?= date('d/m/Y') ?>');
        $("#tanggal_sep_bpjs, #tanggal_rujukan_bpjs, #tanggal_kejadian_bpjs").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#form_sep_bpjs, #form_no_rujukan, #form_ubah_poli').submit(function() {
            return false;
        });

        $('#laka_lantas_bpjs').change(function(i, v) {
            if ($(this).val() === '1') {
                $('.laka').show();
            } else {
                $('.laka').hide();
            }
            // end of function
        });

        $('#jenis_rujukan_bpjs').change(function() {
            showRujukanLast($('#nokartu_bpjs').val());
            // end of function
        });

        // DOKTER DPJP
        $('#dokter_dpjp_bpjs').select2({
            ajax: {
                url: "<?= base_url(URL_VCLAIM_V1.'get_dokter_dpjp') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: $('#jenis_pelayanan_bpjs').val(),
                        spesialis: (($('#spesialis_igd_auto').val() !== '') ? $('#spesialis_igd_auto').val() : $('#kode_poli').val()),
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

        // PPK RUJUKAN
        $('#ppk_rujukan_bpjs').select2({
            minimumInputLength: 3,
            ajax: {
                url: "<?= base_url(URL_VCLAIM_V1.'get_faskes') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        faskes: $('#asal_rujukan_bpjs').val(),
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

        // POLI BPJS
        $('#poli_bpjs_auto').select2({
            minimumInputLength: 3,
            ajax: {
                url: "<?= base_url(URL_VCLAIM_V1.'get_poli') ?>",
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
                var markup = '<b>' + data.kode + '</b> ' + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return '<b>' + data.kode + '</b> ' + data.nama;
            }
        });

        // SPESIALIS IGD
        $('#spesialis_igd_auto').select2({
            minimumInputLength: 3,
            ajax: {
                url: "<?= base_url(URL_VCLAIM_V1.'get_poli') ?>",
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
                var markup = '<b>' + data.kode + '</b> ' + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return '<b>' + data.kode + '</b> ' + data.nama;
            }
        });

        // DIAG AWAL
        $('#diag_awal_bpjs').select2({
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

        // KODE POLI
        $('#kode_poli_auto').select2({
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
                $('#kode_poli').val(data.kode_bpjs);
                return data.nama;
            }
        });

        // KD PROVINSI
        $('#kd_provinsi_bpjs').select2({
            ajax: {
                url: "<?= base_url(URL_VCLAIM_V1.'get_provinsi') ?>",
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

        // KD KABUPATEN
        $('#kd_kabupaten_bpjs').select2({
            ajax: {
                url: "<?= base_url(URL_VCLAIM_V1.'get_kabupaten') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        kd_provinsi: $('#kd_provinsi_bpjs').val(),
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

        // KD KECAMATAN
        $('#kd_kecamatan_bpjs').select2({
            ajax: {
                url: "<?= base_url(URL_VCLAIM_V1.'get_kecamatan') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        kd_kabupaten: $('#kd_kabupaten_bpjs').val(),
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
        // End of Object
    });

    // ALL FUNCTIONS BPJS
    function getDataPesertaBPJS(no_polish, tipe, layanan, klinik, no_rm, tanggal_daftar = null) {
        // console.log(no_polish, tipe, layanan, klinik, no_rm); return false;
        var url = '<?= base_url(URL_VCLAIM_V1."get_peserta") ?>/nokartu/' + no_polish;
        if (tipe === 'nik') {
            url = '<?= base_url(URL_VCLAIM_V1."get_peserta_by_nik") ?>/nik/' + no_polish;
        }

        $('#jenis_rujukan_bpjs').val('1');
        $.ajax({
            type: 'GET',
            url: url,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Pencarian data peserta BPJS...');
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === '200') {
                        if (data.response !== null) {
                            // Jika OK
                            NOKARTU_BPJS = data.response.peserta.noKartu;
                            formPembuatanSEP(data.response, layanan, klinik);
                            showHistorySEP(no_polish);
                            if (no_rm !== '') {
                                getDataPasien(no_rm);
                            }
    
                            $('#no_polish').val(data.response.peserta.noKartu);
    
                            showRujukanLast(data.response.peserta.noKartu);
                        } else {
                            swalCustom('info', 'Pencarian Peserta BPJS', 'Gagal mendapatkan data peserta, Silahkan coba kembali');
                        }
                    } else {
                        swalCustom('info', 'Pencarian Peserta BPJS', data.metaData.message);
                    }
                } else {
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

    function getDataPasien(no_rm) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pasien/api/pasien/get_pasien") ?>/id/' + no_rm,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#no_telp_pasien_bpjs').val(data.data.telp);
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function getRujukan(norujukan, no_rm, klinik, layanan, no_polish) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM_V1."get_rujukan") ?>/norujukan/' + norujukan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Pencarian data rujukan, Mohon Tunggu...')
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        if (data.response !== null) {
                            // Jika OK
                            NOKARTU_BPJS = data.response.rujukan.peserta.noKartu;
                            formPembuatanSEP(data.response.rujukan, layanan, klinik);
                            showHistorySEP(no_polish);
    
                            if (no_rm !== '') {
                                getDataPasien(no_rm);
                            }
    
                            $('#no_polish').val(data.response.rujukan.peserta.noKartu);
    
                            showRujukanLast(data.response.rujukan.peserta.noKartu);
                            drawRujukan(data.response.rujukan);
                        } else {
                            swalCustom('info', 'Pencarian Rujukan Peserta BPJS', 'Gagal mendapatkan data rujukan, Silahkan coba kembali');
                        }
                    } else {
                        swalCustom('info', 'Pencarian Rujukan Peserta BPJS', data.metaData.message);
                    }
                } else {
                    swalCustom('error', 'Koneksi Bermasalah', 'Aplikasi tidak dapat terhubung dengan server BPJS. Silahkan hubungi pihak BPJS');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function() {
                accessFailed(e.status);
            }
        });
    }

    // MENAMPILKAN RUJUKAN TERAKHIR
    function showRujukanLast(no_polish) {
        var rujukan = 'get_rujukan_by_pcare';
        if ($('#jenis_rujukan_bpjs').val() === '2') {
            rujukan = 'get_rujukan_by_rs';
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM_V1.'') ?>' + rujukan + '/nokartu/' + no_polish,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        // JIKA OK
                        var item = data.response.rujukan;
                        $('#no_rujukan_last').html(item.noKunjungan);
                        $('#tanggal_rujukan_last').html(datefmysql(item.tglKunjungan));
                        $('#provider_rujukan_last').html(item.provPerujuk.nama);
                        $('#icd_rujukan_last').html(item.diagnosa.kode);
                        $('#diagnosa_rujukan_last').html(item.diagnosa.nama);
                        $('#poli_rujukan_last').html(item.poliRujukan.nama);
                        $('#keluhan_rujukan_last').html(item.keluhan);
                    } else {
                        $('#no_rujukan_last, #tanggal_rujukan_last, #provider_rujukan_last, #icd_rujukan_last, #diagnosa_rujukan_last, #poli_rujukan_last, #keluhan_rujukan_last').html('');
                    }
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

    function drawRujukan(item) {
        $('#no_rujukan_bpjs').val(item.noKunjungan);
        $('#tanggal_rujukan_bpjs').val(datefmysql(item.tglKunjungan));
        $('#tanggal_sep_bpjs').val(datefmysql(datenow()));

        $('#ppk_rujukan_bpjs').val(item.provPerujuk.kode);
        $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html('<b>' + item.provPerujuk.kode + '</b> ' + item.provPerujuk.nama);

        $('#diag_awal_bpjs').val(item.diagnosa.kode);
        $('#s2id_diag_awal_bpjs a .select2-chosen').html('<b>' + item.diagnosa.kode + '</b> ' + item.diagnosa.nama);
        $('#catatan_bpjs').val(item.keluhan);

        $('#poli_rujukan_last').html(item.poliRujukan.nama);
    }

    function useRujukan() {
        var rujukan = 'get_rujukan_by_pcare';
        if ($('#jenis_rujukan_bpjs').val() === '2') {
            rujukan = 'get_rujukan_by_rs';
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM_V1.'') ?>' + rujukan + '/nokartu/' + NOKARTU_BPJS,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        // JIKA OK
                        var item = data.response.rujukan;
                        drawRujukan(item);
                    } else {
                        swalCustom('info', 'Ambil Data Rujukan', data.metaData.message);
                    }
                } else {
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

    function showHistorySEP(no_polish) {
        $('#history_scroll').empty();
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM_V1."get_history_sep") ?>/nokartu/' + no_polish,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.response !== null) {
                    var list = data.response.histori;
                    var html = '';

                    $.each(list, function(i, v) {
                        html = '<ul class="list-group m-b-10">' +
                            '<li class="list-group-item bg-success text-white"><b><i class="fas fa-id-card-alt m-r-5"></i>NO SEP : <i>' + v.noSep + '</i></b></li>' +
                            '<li class="list-group-item border-success">' +
                            '<table class="table table-striped table-sm" style="font-size: 14px; width="100%">' +
                            '<tr><td width="30%">Tujuan</td><td width="1%">&nbsp;:&nbsp;</td><td width="69%">' + ((v.jnsPelayanan === '1') ? 'Rawat Inap' : v.poli) + '</td></tr>' +
                            '<tr><td>Diagnosa</td><td>&nbsp;:&nbsp;</td><td>' + ((v.diagnosa === null) ? '' : v.diagnosa) + '</td></tr>' +
                            '<tr><td>No. Rujukan</td><td>&nbsp;:&nbsp;</td><td>' + ((v.noRujukan === null) ? '' : v.noRujukan) + '</td></tr>' +
                            '<tr><td>PPK Pelayanan</td><td>&nbsp;:&nbsp;</td><td>' + ((v.ppkPelayanan === null) ? '' : v.ppkPelayanan) + '</td></tr>' +
                            '<tr><td>Tanggal SEP</td><td>&nbsp;:&nbsp;</td><td>' + ((v.tglSep === null) ? '' : datefmysql(v.tglSep)) + '</td></tr>' +
                            '<tr><td>Tanggal Pulang</td><td>&nbsp;:&nbsp;</td><td>' + ((v.tglPlgSep === null) ? '' : datefmysql(v.tglPlgSep)) + '</td></tr>' +
                            '</table>' +
                            '</li></ul>';

                        $('#history_scroll').append(html);
                    });
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

    //  FORM PEMBUATAN SEP

    function formPembuatanSEP(data, layanan, klinik, tanggal_daftar = null) {
        $('#label_poli_bpjs').html(klinik);
        if (layanan === 'poli') {
            $('.kode_poli_area').hide();
            $('#label_poli_area').show();
        } else {
            $('.kode_poli_area').hide();
            $('#label_poli_area').hide();
        }

        $('.kode_poli_area').hide();

        $('#asal_rujukan_bpjs').val('1');
        $('#cob_bpjs, #klinik_eksekutif_bpjs, #laka_lantas_bpjs').val('0');

        $('option', $('#jaminan_laka_bpjs')).each(function(element) {
            $(this).removeAttr('selected').prop('selected', false);
        });

        $('#jaminan_laka_bpjs').multiselect('refresh');

        $('#bt_create_sep').show();
        $('#bt_update_sep').hide();

        if ($('#kode_poli').val() === '') {
            $('#jenis_pelayanan_bpjs').val('1');
        } else {
            $('#jenis_pelayanan_bpjs').val('2');
        }

        $('.laka').hide();

        var peserta = data.peserta;
        var kelamin = 'Laki - laki';

        $('#tanggal_rujukan_bpjs').val('').datepicker('update');
        if (tanggal_daftar != null) {
            $('#tanggal_sep_bpjs').val(moment(tanggal_daftar, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY')).datepicker('update');
        } else {
            $('#tanggal_sep_bpjs').val('').datepicker('update');
        }

        $('#ppk_rujukan_bpjs, #no_sep, #catatan_bpjs').val('');
        $('#diag_awal_bpjs, #no_rujukan_bpjs, #tanggal_rujukan_bpjs, #dokter_dpjp_bpjs, #spesialis_igd_auto').val('');
        $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html('');
        $('#s2id_diag_awal_bpjs a .select2-chosen').html('');
        $('#s2id_dokter_dpjp_bpjs a .select2-chosen').html('');
        $('#s2id_spesialis_igd_auto a .select2-chosen').html('');

        if (peserta !== null) {
            if (peserta.sex == 'P') {
                kelamin = 'Perempuan'
            }

            $('#no_kartu_bpjs').html(peserta.noKartu);
            $('#nik_bpjs').html(peserta.nik);
            $('#nama_bpjs').html(peserta.nama);
            $('#kelamin_bpjs').html(kelamin);
            $('#tgl_lahir_bpjs').html(datefmysql(peserta.tglLahir));
            $('#kode_provider_bpjs').html(peserta.provUmum.kdProvider);
            $('#nama_provider_bpjs').html(peserta.provUmum.nmProvider);
            $('#jenis_peserta_bpjs').html(peserta.jenisPeserta.keterangan);
            $('#kelas_label_bpjs').html(peserta.hakKelas.keterangan);
            $('#status_bpjs').html(peserta.statusPeserta.keterangan);

            var keles = kelas3;
            if (peserta.hakKelas.kode === '1') {
                keles = kelas1;
            } else if (peserta.hakKelas.kode === '2') {
                keles = kelas2;
            }

            if (peserta.hakKelas.kode !== null) {
                $('#kelas_bpjs').empty();
                $.each(keles, function(i, v) {
                    $('#kelas_bpjs').append('<option value="' + v.kode + '">' + v.kelas + '</option');
                });

                $('#nokartu_bpjs').val(peserta.noKartu);
                $('#modal_form_sep_bpjs').modal('show');
                $('#modal_form_sep_bpjs_label').html('Data Peserta BPJS | <b>Form Pembuatan SEP Ver 1.0</b>');
                $('#modal_dialog_bpjs').attr('style', 'max-width: 80%;');
            } else {
                swalAlert('warning', 'Validasi', 'Pembuatan SEP tidak bisa dilanjutkan karena kelas tanggungan tidak ada. <br/> Silahkan hubungi pihak BPJS');
            }
        } else {
            swalAlert('warning', 'Validasi', 'Gagal membuat SEP');
        }
    }

    function getPesertaByPolish(no_polish, kelas_sep) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM_V1."get_peserta") ?>/nokartu/' + no_polish,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        if (data.response !== null) {
                            var kelamin = 'Laki-laki';
                            var peserta = data.response.peserta;
                            if (peserta.sex == 'P') {
                                kelamin = 'Perempuan';
                            };
    
                            $('#no_kartu_bpjs').html(peserta.noKartu);
                            $('#nik_bpjs').html(peserta.nik);
                            $('#nama_bpjs').html(peserta.nama);
                            $('#kelamin_bpjs').html(kelamin);
                            $('#tgl_lahir_bpjs').html(datefmysql(peserta.tglLahir));
                            $('#nama_provider_bpjs').html(peserta.provUmum.nmProvider);
                            $('#jenis_peserta_bpjs').html(peserta.jenisPeserta.nmJenisPeserta);
                            $('#kelas_label_bpjs').html(peserta.hakKelas.nmKelas);
                            $('#status_bpjs').html(peserta.statusPeserta.keterangan);
    
                            var keles = kelas3;
                            if (peserta.hakKelas.kode === '1') {
                                keles = kelas1;
                            } else if (peserta.hakKelas.kode === '2') {
                                keles = kelas2;
                            }
    
                            if (peserta.hakKelas.kode !== null) {
                                $('#kelas_bpjs').empty();
                                $.each(keles, function(i, v) {
                                    $('#kelas_bpjs').append('<option value="' + v.kode + '">' + v.kelas + '</option');
                                });
    
                                $('#kelas_bpjs').val(kelas_sep);
                                $('#nokartu_bpjs').val(peserta.noKartu);
                                $('#modal_form_sep_bpjs').modal('show');
                            } else {
                                swalAlert('warning', 'Validasi', 'Pembuatan SEP tidak bisa dilanjutkan karena kelas tanggungan tidak ada. <br/> Silahkan hubungi pihak BPJS');
                            }
                        }
                    } else {
                        swalCustom('info', "Pencarian Peserta BPJS", data.metaData.message);
                    }
                } else {
                    swalCustom('error', "Koneksi Bermasalah", "Aplikasi tidak dapat terhubung dengan server BPJS. Silahkan hubungi pihak BPJS");
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

    function konfirmasiPembuatanSEP() {
        bootbox.dialog({
            message: "Tekan tombol \"Ya\" untuk membuat SEP ",
            title: "Konfirmasi Pembuatan SEP",
            buttons: {
                batal: {
                    label: '<i class="fa fa-refresh"></i> Tidak',
                    className: "btn-secondary",
                    callback: function() {}
                },
                hapus: {
                    label: '<i class="fa fa-save"></i>  Ya',
                    className: "btn-info",
                    callback: function() {
                        createSEP();
                    }
                }
            }
        });
    }

    function createSEP() {
        var ppk = $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html().split("</b> ");
        var nama_ppk = ppk[1];

        $.ajax({
            type: 'POST',
            url: '<?= base_url(URL_VCLAIM_V1."pembuatan_no_sep") ?>',
            data: $('#form_sep_bpjs').serialize() + "&nama_ppk_rujukan=" + nama_ppk,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Proses pembuatan SEP, Mohon Tunggu...');
            },
            success: function(data) {
                var result = data[0];
                if (result.metaData.code === "200") {
                    $('input[name=csrf_syam]').val(data.token);
                    var nosep = result.response.sep.noSep;
                    $('#no_sep').val(nosep);
                    $('#modal_form_sep_bpjs').modal('hide');
                    cetakNotaSEP(nosep);
                    if ($('#jenis_pendaftaran').val() !== 'Poliklinik') {
                        getListPendaftaran($('#page_now').val(), '');
                    }
                    resetBPJS();
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    swalCustom('error', 'Gagal membuat SEP', result.metaData.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalCustom('error', 'Koneksi Bermasalah', 'Tidak terhubung dengan aplikasi BPJS');
            }
        });
    }

    function resetBPJS() {
        $('.bpjs_input').val('');
        $('.bpjs_label').html('');
        $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html('');
        $('#s2id_diag_awal_bpjs a .select2-chosen').html('');
        $('#s2id_dokter_dpjp_bpjs a .select2-chosen').html('');
        $('.laka').hide();
    }

    function cetakNotaSEP(no_sep) {
        if (no_sep === null) {
            swalCustom('warning', 'Cetak SEP', 'No. SEP Tidak ada, Silahkan buat sep terlebih dahulu');
        } else {
            window.open('<?= base_url(URL_VCLAIM_PRINT)  ?>nota_sep/' + no_sep, 'Cetak Nota SEP');
        }

    }

    // UBAH SUB POLI
    function ubahPoliSub() {
        $('#poli_bpjs_auto').val('');
        $('#s2id_poli_bpjs_auto a .select2-chosen').html('');
        $('#modal_ubah_poli').modal('show');
    }

    function updateUbahPoliSub() {
        let kode_poli = $('#poli_bpjs_auto').val();
        let poli = $('#s2id_poli_bpjs_auto a .select2-chosen').html();

        $('#kode_poli').val(kode_poli);
        $('#label_poli_bpjs').html(poli);

        $('#modal_ubah_poli').modal('hide');
    }

    // CEK LAST NO RUJUKAN
    function checkLastNoRujukan() {
        let no_rm = $('#no_rm_bpjs').val();

        if (no_rm !== '') {
            $.ajax({
                type: 'GET',
                url: '<?= base_url("miscellaneous/api/miscellaneous/cek_last_no_rujukan") ?>/id/' + no_rm,
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data.status) {
                        let html = '';
                        $.each(data.data, function(i, v) {
                            html += `
                                <tr>
                                    <td align="center">${i + 1}</td>
                                    <td>${datefmysql(v.tanggal_terbit)}</td>
                                    <td>${v.jenis}</td>
                                    <td>${v.no_rujukan}</td>
                                    <td>${v.dokter}</td>
                                    <td align="right">
                                        <button type="button" class="btn btn-success btn-xs" onclick="pilihNoRujukan(\'${v.no_rujukan}\', \'${v.kode_dokter}\', \'${v.dokter}\')" title="Klik untuk melihat nomor rujukan"><i class="fas fa-check-circle m-r-5"></i>Pilih</button>
                                    </td>
                                </tr>
                            `;

                        });

                        $('#table_norujukan tbody').html(html);
                        $('#modal_norujukan').modal('show');
                    } else {
                        swalCustom('info', 'History No. Rujukan', data.message);
                    }
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            });
        } else {
            swalCustom('info', 'History No. Rujukan', 'No. RM tidak ada');
        }
    }

    function pilihNoRujukan(no_rujukan, kode_dokter, dokter) {
        $('#no_skdp_bpjs').val(no_rujukan);
        $('#dokter_dpjp_bpjs').val(kode_dokter);
        $('#s2id_dokter_dpjp_bpjs a .select2-chosen').html((dokter !== null) ? dokter : '');
        $('#modal_norujukan').modal('hide');
    }

    // SKDP
    function createSKDP() {
        let no_rm = $('#no_rm_bpjs').val();
        generateSKDP(no_rm, 'resume_inap', '', '');
    }

    function editNoPolish(id_layanan, no_polish, page) {
        var polish = no_polish;
        if (polish === 'null') {
            polish = '';
        }

        bootbox.dialog({
            title: "Edit No. Polis",
            message: `<div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" id="formeditpolish">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="name">No. Polis</label>
                                        <div class="col-lg-9">
                                            <input id="no_polish_edit" name="nopolish" type="text" value="${polish}" placeholder="No. Polis" class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>`,
            buttons: {
                success: {
                    label: '<i class="fas fa-save"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        var no_polish_edit = $('#no_polish_edit').val();
                        simpanNoPolish(id_layanan, no_polish_edit);

                    }
                }
            }
        });

        $('#formeditpolish').submit(function() {
            var no_polish_edit = $('#no_polish_edit').val();
            simpanNoPolish(id_layanan, no_polish_edit);
            $('.bootbox').modal('hide');
            return false;
        });
    }

    function simpanNoPolish(id_layanan, nopolish) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url(URL_VCLAIM_V1."update_no_polish") ?>',
            data: 'id_layanan_pendaftaran=' + id_layanan + '&nopolish=' + nopolish,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    getListPendaftaran($('#page_now').val());
                    messageEditSuccess();
                } else {
                    messageEditFailed();
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

    function editNoSEP(id_layanan, no_sep, page) {
        var sep = no_sep;
        if (sep === 'null') {
            sep = '';
        }

        bootbox.dialog({
            title: "Edit No. SEP",
            message: `<div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" id="formeditsep">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="name">No. SEP</label>
                                        <div class="col-lg-9">
                                            <input id="no_sep_edit" name="nosep" type="text" value="${sep}" placeholder="No. SEP" class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>`,
            buttons: {
                success: {
                    label: '<i class="fas fa-save"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        var no_sep_edit = $('#no_sep_edit').val();
                        simpanNoSEP(id_layanan, no_sep_edit);

                    }
                }
            }
        });

        $('#formeditsep').submit(function() {
            var no_sep_edit = $('#no_sep_edit').val();
            simpanNoSEP(id_layanan, no_sep_edit);
            $('.bootbox').modal('hide');
            return false;
        });
    }

    function simpanNoSEP(id_layanan, no_sep) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url(URL_VCLAIM_V1."update_no_sep") ?>',
            data: 'id_layanan_pendaftaran=' + id_layanan + '&no_sep=' + no_sep,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    getListPendaftaran($('#page_now').val());
                    messageEditSuccess();
                } else {
                    messageEditFailed();
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

    function formUpdateSEP(no_sep, klinik_label, layanan) {
        $('#modal_form_sep_bpjs_label').html('Update SEP');
        $('#label_poli_area').hide();

        if (layanan === 'poli') {
            $('.kode_poli_area').show();
            $('#s2id_kode_poli_auto a .select2-chosen').html(klinik_label);
        } else {
            $('.kode_poli_area').hide();
        }

        $('#no_sep_bpjs').val(no_sep);
        $('#modal_dialog_bpjs').attr("style", "max-width: 80%;");

        $('#bt_create_sep').hide();
        $('#bt_update_sep').show();

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM_V1."get_detail_sep") ?>/no_sep/' + no_sep,
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.metaData.code === '200') {
                    var resp = data.response;

                    if (resp.lakaLantas.keterangan !== 'Kasus Kecelakaan LaluLintas') {
                        $('.laka').hide();
                        $('#laka_lantas_bpjs').val('0');
                    } else {
                        $('.laka').show();
                        $('#laka_lantas_bpjs').val('1');
                    }

                    if (resp.jnsPelayanan === 'Rawat Inap') {
                        $('#jenis_pelayanan_bpjs').val('1');
                    } else {
                        $('#jenis_pelayanan_bpjs').val('2');
                    }

                    $('#tanggal_rujukan_bpjs').val(datefmysql(resp.tglRujukan)).datepicker('update');
                    $('#tanggal_sep_bpjs').val(datefmysql(resp.tglSep)).datepicker('update');

                    $('#ppk_rujukan_bpjs').val(resp.provRujukan.kdProvider);
                    $('#diag_awal_bpjs').val(resp.diagAwal.kdDiag);
                    $('#no_rujukan_bpjs').val(resp.noRujukan);
                    $('#kode_poli').val(resp.poliTujuan.kdPoli);
                    $('#no_rm_bpjs').val(resp.peserta.noMr);
                    $('#catatan_bpjs').val(resp.catatan);

                    $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html(resp.provRujukan.nmProvider);
                    $('#s2id_diag_awal_bpjs a .select2-chosen').html('<b>' + resp.diagAwal.kdDiag + '</b> ' + resp.diagAwal.nmDiag);
                    getPesertaByPolish(resp.peserta.noKartu, '');

                } else {
                    swalCustom('info', 'Update SEP', data.metaData.message);
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
</script>