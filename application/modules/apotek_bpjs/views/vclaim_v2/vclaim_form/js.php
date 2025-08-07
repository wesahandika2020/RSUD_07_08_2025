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

        $("#tanggal_rujukan_bpjs, #tanggal_kejadian_bpjs").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#form_sep_bpjs, #form_no_rujukan, #form_ubah_poli').submit(function() {
            return false;
        });

        $('#laka_lantas_bpjs').change(function(i, v) {
            if ($(this).val() !== '0') {
                $('.laka').show();
            } else {
                $('.laka').hide();
            }
            // end of function
        });

        // Bisa ganti IGD atau Ranap disini
		$('#jenis_pelayanan2_bpjs').on('change', function(){
			let typeSep = $(this).val();
			let norm = $('#no_rm_bpjs').val();
			let idLayanan = $('#id_layanan_pendaftaran_bpjs').val();
			let nopol = $('#nokartu_bpjs').val();
			let waktuDaftar = $('#waktu_daftar').val();
			let kodebpjs = $('#kode_bpjs').val();

			if(typeSep === '1'){
				pembuatanSEP(norm, idLayanan, nopol, kodebpjs, waktuDaftar, 'inap');
			}

			if(typeSep === '2'){
				pembuatanSEP(norm, idLayanan, nopol, kodebpjs, waktuDaftar, 'igd');
			}
		})

        $('#jenis_rujukan_bpjs').change(function() {
            showRujukanLast($('#nokartu_bpjs').val());
            // end of function
        });

        // DOKTER DPJP
        $('#dokter_dpjp_bpjs').select2({
            ajax: {
                url: "<?= base_url(URL_VCLAIM.'get_dokter_dpjp') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: $('#jenis_pelayanan_bpjs').val(),
                        spesialis: (($('#spesialis_igd_auto').val() !== '') ? $('#spesialis_igd_auto').val() : $('#kode_poli').val()),
                        // spesialis: $('#kode_poli').val(),
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
                url: "<?= base_url(URL_VCLAIM.'get_faskes') ?>",
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
                url: "<?= base_url(URL_VCLAIM.'get_poli') ?>",
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
                return data.nama;
            }
        });

        // SPESIALIS IGD
        $('#spesialis_igd_auto').select2({
            minimumInputLength: 3,
            ajax: {
                url: "<?= base_url(URL_VCLAIM.'get_poli') ?>",
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
                url: "<?= base_url(URL_VCLAIM.'get_diagnosa') ?>",
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
                url: "<?= base_url(URL_VCLAIM.'get_provinsi') ?>",
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
                url: "<?= base_url(URL_VCLAIM.'get_kabupaten') ?>",
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
                url: "<?= base_url(URL_VCLAIM.'get_kecamatan') ?>",
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

        // naik kelas rawat 
        $('#kelas_naik').click(function() {
            $('[name="kelas_rawat"], [name="pembiayaan"], [name="penanggung_jawab"]').val('')
            if ($(this).is(':checked')) {
                $('.naik_kelas_rawat').show()
            } else {
                $('.naik_kelas_rawat').hide()
            }
        })

        $('#pembiayaan_bpjs').change(function() {
            if ($(this).val() !== '') {
                $('#penanggung_jawab_bpjs').val($('#pembiayaan_bpjs option:selected').text())
            } else {
                $('#penanggung_jawab_bpjs').val('')
            }
        })

        $('#tujuan_kunjungan_bpjs').change(function() {
            $('#prosedur_bpjs, #penunjang_prosedur_bpjs, #assessment_pelayanan_bpjs').val('')
            if ($(this).val() == 1) {
                $('.prosedur, .penunjang_prosedur').show()
                $('.assessment_pelayanan').hide()
                $('.assessment_pelayanan_select').html(`
                    <select name="assessment_pelayanan" class="form-control" id="assessment_pelayanan_bpjs">
                        <option value="">Pilih Assessment Pelayanan</option>
                    </select>
                `)
            } else if ($(this).val() == 2) {
                $('.prosedur, .penunjang_prosedur').hide()
                $('.assessment_pelayanan').show()
                $('.assessment_pelayanan_select').html(`
                    <select name="assessment_pelayanan" class="form-control" id="assessment_pelayanan_bpjs">
                        <option value="">Pilih Assessment Pelayanan</option>
                        <option value="1">Poli spesialis tidak tersedia pada hari sebelumnya</option>
                        <option value="2">Jam Poli telah berakhir pada hari sebelumnya</option>
                        <option value="3">Dokter Spesialis yang dimaksud tidak praktek pada hari sebelumnya</option>
                        <option value="4">Atas Instruksi RS</option>
                        <option value="5">Tujuan Kontrol</option>
                    </select>
                `)
            } else if ($(this).val() == 0) {
                $('.prosedur, .penunjang_prosedur').hide()
                $('.assessment_pelayanan').show()
                $('.assessment_pelayanan_select').html(`
                    <select name="assessment_pelayanan" class="form-control" id="assessment_pelayanan_bpjs">
                        <option value="">Pilih Assessment Pelayanan</option>
                        <option value="1">Poli spesialis tidak tersedia pada hari sebelumnya</option>
                        <option value="2">Jam Poli telah berakhir pada hari sebelumnya</option>
                        <option value="3">Dokter Spesialis yang dimaksud tidak praktek pada hari sebelumnya</option>
                        <option value="4">Atas Instruksi RS</option>
                    </select>
                `)
            }
        })

        $('#prosedur_bpjs').change(function() {
            if ($(this).val() === '0') {
                $('.penunjang_select').html(`
                    <select name="penunjang" class="form-control" id="penunjang_prosedur_bpjs">
                        <option value="">Pilih Poli Penunjang</option>
                        <option value="1">Radioterapi</option>
                        <option value="2">Kemoterapi</option>
                        <option value="3">Rehabilitasi Medik</option>
                        <option value="4">Rehabilitasi Psikososial</option>
                        <option value="5">Transfusi Darah</option>
                        <option value="6">Pelayanan Gigi</option>
                        <option value="12">Hemodialisa</option>
                    </select>
                `)
            } else if ($(this).val() === '1') {
                $('.penunjang_select').html(`
                    <select name="penunjang" class="form-control" id="penunjang_prosedur_bpjs">
                        <option value="">Pilih Poli Penunjang</option>
                        <option value="7">Laboratorium</option>
                        <option value="8">USG</option>
                        <option value="9">Farmasi</option>
                        <option value="10">Lain-Lain</option>
                        <option value="11">MRI</option>
                    </select>
                `)
            } else {
                $('.penunjang_select').html(`
                    <select name="penunjang" class="form-control" id="penunjang_prosedur_bpjs">
                        <option value="">Pilih Poli Penunjang</option>
                    </select>
                `)
            }
        })
    });

    // ALL FUNCTIONS BPJS
    function getDataPesertaBPJS(no_polish, tipe, layanan, klinik, no_rm, tanggal_daftar = null) {
        var url = '<?= base_url(URL_VCLAIM."get_peserta") ?>/nokartu/' + no_polish;
        if (tipe === 'nik') {
            url = '<?= base_url(URL_VCLAIM."get_peserta_by_nik") ?>/nik/' + no_polish;
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
                            showHistorySEP(no_polish);
                            if (no_rm !== '') {
                                getDataPasien(no_rm);
                            }
    
                            $('#no_polish').val(data.response.peserta.noKartu);
                            showRujukanLast(data.response.peserta.noKartu);
                            formPembuatanSEP(data.response, layanan, klinik);
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

    function getRujukan(norujukan, no_rm, layanan, klinik, no_polish) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM."get_rujukan") ?>/norujukan/' + norujukan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Pencarian data rujukan, Mohon Tunggu...')
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        if (data.response !== null) {
                            if(no_polish !== data.response.rujukan.peserta.noKartu){
                                swalCustom('error', 'No BPJS Tidak Sesuai', 'No BPJS di Rujukan BERBEDA dengan No BPJS  di Pendaftaran, Silahkan ubah No BPJS di pendaftran!      No BPJS di Rujukan ='+data.response.rujukan.peserta.noKartu +' No BPJS di Pendaftaran='+no_polish);
                            } else {

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
                            }
                        } else {
                            swalCustom('info', 'Pencarian Rujukan Peserta BPJS', 'Gagal mendapatkan data rujukan, Silahkan coba kembali');
                        }
                    } else {
                        // swalCustom('info', 'Pencarian Rujukan Peserta BPJS', data.metaData.message);
                        getRujukanRS(norujukan, no_rm, layanan, klinik, no_polish)
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
	
	function getRujukanRS(norujukan, no_rm, layanan, klinik, no_polish) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM."get_rujukan_rs") ?>/norujukan/' + norujukan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Pencarian data rujukan, Mohon Tunggu...')
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        if (data.response !== null) {   
                            if(no_polish !== data.response.rujukan.peserta.noKartu){
                                swalCustom('error', 'No BPJS Tidak Sesuai', 'No BPJS di Rujukan BERBEDA dengan No BPJS  di Pendaftaran, Silahkan ubah No BPJS di pendaftran!      No BPJS di Rujukan ='+data.response.rujukan.peserta.noKartu +' No BPJS di Pendaftaran='+no_polish);
                            } else {

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
                            }
                        } else {
                            swalCustom('info', 'Pencarian Rujukan Faskes 2 Peserta BPJS', 'Gagal mendapatkan data rujukan, Silahkan coba kembali');
                        }
                    } else {
                        swalCustom('info', 'Pencarian Rujukan Faskes 2 Peserta BPJS', data.metaData.message);
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

    // MENAMPILKAN RUJUKAN TERAKHIR
    function showRujukanLast(no_polish) {
        var rujukan = 'get_rujukan_by_pcare';
        if ($('#jenis_rujukan_bpjs').val() === '2') {
            rujukan = 'get_rujukan_by_rs';
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM.'') ?>' + rujukan + '/nokartu/' + no_polish,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        // JIKA OK
                        if (data.response !== null) {
                            var item = data.response.rujukan;
                            $('#no_rujukan_last').html(item.noKunjungan);
                            $('#tanggal_rujukan_last').html(datefmysql(item.tglKunjungan));
                            $('#kode_provider_rujukan_last').html(item.provPerujuk.kode);
                            $('#provider_rujukan_last').html(item.provPerujuk.nama);
                            $('#icd_rujukan_last').html(item.diagnosa.kode);
                            $('#diagnosa_rujukan_last').html(item.diagnosa.nama);
                            $('#poli_rujukan_last').html(item.poliRujukan.nama);
                            $('#keluhan_rujukan_last').html(item.keluhan);
                        }
                    } else {
                        $('#no_rujukan_last, #tanggal_rujukan_last, #kode_provider_rujukan_last, #provider_rujukan_last, #icd_rujukan_last, #diagnosa_rujukan_last, #poli_rujukan_last, #keluhan_rujukan_last').html('');
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

    function drawRujukan2(noKunjungan, tglKunjungan, kodeProvPerujuk, namaProvPerujuk, kodeDiagnosa, namaDiagnosa, keluhan) {
        $('#no_rujukan_bpjs').val(noKunjungan);
        $('#tanggal_rujukan_bpjs').val(datefmysql(tglKunjungan));
        $('#tanggal_sep_bpjs').val(datefmysql(datenow()));

        $('#ppk_rujukan_bpjs').val(kodeProvPerujuk);
        $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html('<b>' + kodeProvPerujuk + '</b> ' + namaProvPerujuk);

        $('#diag_awal_bpjs').val(kodeDiagnosa);
        $('#s2id_diag_awal_bpjs a .select2-chosen').html('<b>' + kodeDiagnosa + '</b> ' + namaDiagnosa);
        $('#catatan_bpjs').val(keluhan);

        $('#modal_histori_rujukan').modal('hide')
    }

    function useRujukan() {
        var rujukan = 'get_rujukan_by_pcare';
        if ($('#jenis_rujukan_bpjs').val() === '2') {
            rujukan = 'get_rujukan_by_rs';
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM.'') ?>' + rujukan + '/nokartu/' + NOKARTU_BPJS,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        if (data.response !==  null) {
                            // JIKA OK
                            var item = data.response.rujukan;
                            drawRujukan(item);
                        }
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
        var id_layanan_pendaftaran = $('#id_layanan_pendaftaran_bpjs').val()
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM."get_history_sep") ?>/nokartu/' + no_polish,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.response !== null) {
                    var list = data.response.histori;
                    var html = '';

                    
                    $.each(list, function(i, v) {
                        var buttonUpdateSEP = '';
                        var buttonPrintSEP = '';
                        var backgroundSep = '#00c292';
                        if (v.tglSep == '<?php echo date('Y-m-d') ?>') {
                            backgroundSep = '#00946e';
                            buttonUpdateSEP = '<button type="button" class="btn btn-xs btn-light ml-1" onclick="simpanNoSEP('+id_layanan_pendaftaran+', \''+v.noSep+'\')"><i class="fas fa-edit" title="Klik untuk mengupdate No. SEP ini."></i></button>';
                            buttonPrintSEP = '<button type="button" class="btn btn-xs btn-light ml-1" onclick="cetakNotaSEP(\''+v.noSep+'\')"><i class="fas fa-print" title="Klik untuk mencetak nota SEP dengan No. SEP ini."></i></button>';
                        }
                        
                        html = '<ul class="list-group m-b-10">' +
                            '<li class="list-group-item text-white" style="background-color:'+backgroundSep+'"><b><i class="fas fa-id-card-alt m-r-5"></i>NO SEP : <i><span class="no_sep'+i+'">' + v.noSep + '</span></i></b><button onclick="copyToClipboard(\'.no_sep'+i+'\')" class="btn btn-xs ml-2 btn-light"><i class="fas fa-copy"></i> Copy</button>'+buttonPrintSEP+buttonUpdateSEP+'</li>' +
                            '<li class="list-group-item border-success">' +
                            '<div class="table-responsive">'+
                            '<table class="table table-striped table-sm" style="font-size: 14px; width="100%">' +
                            '<tr><td width="30%">Tujuan</td><td width="1%">&nbsp;:&nbsp;</td><td width="69%"><b>' + ((v.jnsPelayanan === '1') ? 'Rawat Inap' : v.poli) + '</b></td></tr>' +
                            '<tr><td>Diagnosa</td><td>&nbsp;:&nbsp;</td><td><b>' + ((v.diagnosa === null || v.diagnosa === '') ? '-' : v.diagnosa) + '</b></td></tr>' +
                            '<tr><td>No. Rujukan</td><td>&nbsp;:&nbsp;</td><td><b>' + ((v.noRujukan === null || v.noRujukan === '') ? '-' : v.noRujukan) + '</b></td></tr>' +
                            '<tr><td>PPK Pelayanan</td><td>&nbsp;:&nbsp;</td><td><b>' + ((v.ppkPelayanan === null || v.ppkPelayanan === '') ? '-' : v.ppkPelayanan) + '</b></td></tr>' +
                            '<tr><td>Tanggal SEP</td><td>&nbsp;:&nbsp;</td><td><b>' + ((v.tglSep === null || v.tglSep === '') ? '-' : datefmysql(v.tglSep)) + '</b></td></tr>' +
                            '<tr><td>Tanggal Pulang</td><td>&nbsp;:&nbsp;</td><td><b>' + ((v.tglPlgSep === null || v.tglPlgSep === '') ? '-' : datefmysql(v.tglPlgSep)) + '</b></td></tr>' +
                            '</table>' +
                            '</div>'+
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
        $('#tanggal_rujukan_bpjs').prop('disabled', false);
        $('#label_poli_bpjs').val(klinik);
        $('#asal_rujukan_bpjs').val('1').attr('readonly', false);
        $('#ppk_rujukan_bpjs, #no_sep, #catatan_bpjs').val('').select2('readonly', false);
        $('#diag_awal_bpjs, #no_rujukan_bpjs, #tanggal_rujukan_bpjs, #dokter_dpjp_bpjs, #spesialis_igd_auto, #no_skdp_bpjs').val('');
        $('#prosedur_bpjs, #penunjang_bpjs, #assessment_pelayanan_bpjs').val('');
        $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html('');
        $('#s2id_diag_awal_bpjs a .select2-chosen').html('');
        $('#s2id_dokter_dpjp_bpjs a .select2-chosen').html('');
        $('#s2id_spesialis_igd_auto a .select2-chosen').html('');

        $('#dokter_dpjp_bpjs').val($('#kode_dokter_temp').val());
        $('#s2id_dokter_dpjp_bpjs a .select2-chosen').html('<b>'+$('#kode_dokter_temp').val()+'</b> ' + $('#dokter_temp').val());

        var label_modal = ''
        if (layanan === 'poli') {
            $('.sep_igd').show()
            $('.filter_igd').hide();
            $('.kode_poli_area').hide();
            $('#label_poli_area').show();
            label_modal = 'Rawat Jalan'
        } else if (layanan === 'igd') {
            $('.sep_igd').hide()
            $('.filter_igd').show();
            $('#label_poli_area').hide();
            label_modal = 'IGD'
        } else {
            $('.sep_igd').show()
            $('.filter_igd').hide();
            $('.kode_poli_area').hide();
            $('#label_poli_area').hide();
            $('#asal_rujukan_bpjs').val('2').attr('readonly', true);
            $('#ppk_rujukan_bpjs').val('0223R038').select2('readonly', true);
            $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html('<b>0223R038</b> RSUD KOTA TANGERANG - KOTA TANGERANG');
            label_modal = 'Rawat Inap'
        }

        $('.kode_poli_area').hide();

        $('#cob_bpjs, #laka_lantas_bpjs').val('0');
        $('#klinik_eksekutif_bpjs').val('1');

        $('option', $('#jaminan_laka_bpjs')).each(function(element) {
            $(this).removeAttr('selected').prop('selected', false);
        });

        $('#jaminan_laka_bpjs').multiselect('refresh');

        $('#bt_create_sep').show();
        $('#bt_update_sep').hide();

        if ($('#kode_poli').val() === '') {
            $('#jenis_pelayanan_bpjs').val('1');
            $('#jenis_pelayanan2_bpjs').val('1');

            $('.sep_ranap').show()
            $('.label_surat_kontrol').html('No. SPRI')
        } else {
            $('#jenis_pelayanan_bpjs').val('2');
            $('#jenis_pelayanan2_bpjs').val('2');
            
            $('.sep_ranap').hide()
            $('.label_surat_kontrol').html('No. Surat Kontrol/SKDP')
        }

        if(layanan !== 'igd' && layanan !== 'inap'){

            $('.mata').show()

        }
        
        $('.laka').hide();

        var peserta = data.peserta;
        var kelamin = 'Laki - laki';
        $('.ava_bpjs').attr('src', '<?php echo resource_url() . 'images/avatars/male_bpjs.png' ?>')

        $('#tanggal_rujukan_bpjs').val('').datepicker('update');
        $('#tanggal_sep_bpjs').val('<?php echo date('d/m/Y') ?>').prop('readonly', true);

        if (peserta !== null) {
            if (peserta.sex == 'P') {
                kelamin = 'Perempuan'
                $('.ava_bpjs').attr('src', '<?php echo resource_url() . 'images/avatars/female_bpjs.png' ?>')
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

            var kelas = kelas3;
            if (peserta.hakKelas.kode === '1') {
                kelas = kelas1;
            } else if (peserta.hakKelas.kode === '2') {
                kelas = kelas2;
            }

            if (peserta.hakKelas.kode !== null) {
                if (peserta.statusPeserta.kode == 0) {
                    $('#kelas_bpjs').empty();
                    $.each(kelas, function(i, v) {
                        $('#kelas_bpjs').append('<option value="' + v.kode + '">' + v.kelas + '</option>');
                    });
    
                    $('#nokartu_bpjs').val(peserta.noKartu);
    
                    $('.reload_histori_sep').attr('onclick', 'showHistorySEP(\''+peserta.noKartu+'\')');
                    $('.reload_rujukan_sep').attr('onclick', 'showRujukanLast(\''+peserta.noKartu+'\')');
                    $('.list_rujukan_sep').attr('onclick', 'showHistoriRujukan(\''+peserta.noKartu+'\')');
    
                    $('#tujuan_kunjungan_bpjs').val('0').change()

                    $('#modal_form_sep_bpjs').modal('show');
                    $('#modal_form_sep_bpjs_label').html('Data Peserta BPJS | <b>Form Pembuatan SEP '+label_modal+' Ver. 2.0</b>');
                    $('#modal_dialog_bpjs').attr('style', 'min-width:98%');
                } else {
                    swalAlert('warning', 'Status Kepesertaan BPJS', peserta.statusPeserta.keterangan);
                }
            } else {
                swalAlert('warning', 'Validasi', 'Pembuatan SEP tidak bisa dilanjutkan karena kelas tanggungan tidak ada. <br/> Silahkan hubungi pihak BPJS');
            }
        } else {
            swalAlert('warning', 'Validasi', 'Gagal membuat SEP');
        }
    }

    function getPesertaByPolish(no_polish, kelas_sep, layanan = '') {
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM."get_peserta") ?>/nokartu/' + no_polish,
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
                                $('.ava_bpjs').attr('src', '<?php echo resource_url() . 'images/avatars/female_bpjs.png' ?>')
                            } else {
                                $('.ava_bpjs').attr('src', '<?php echo resource_url() . 'images/avatars/male_bpjs.png' ?>')
                            };
    
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
    
                            var kelas = kelas3;
                            if (peserta.hakKelas.kode === '1') {
                                kelas = kelas1;
                            } else if (peserta.hakKelas.kode === '2') {
                                kelas = kelas2;
                            }
    
                            if (peserta.hakKelas.kode !== null) {
                                $('#kelas_bpjs').empty();
                                $.each(kelas, function(i, v) {
                                    $('#kelas_bpjs').append('<option value="' + v.kode + '">' + v.kelas + '</option');
                                });
    
                                $('#kelas_bpjs').val(kelas_sep);
                                $('#nokartu_bpjs').val(peserta.noKartu);
                                
                                $('.reload_histori_sep').attr('onclick', 'showHistorySEP(\''+peserta.noKartu+'\')');
                                $('.reload_rujukan_sep').attr('onclick', 'showRujukanLast(\''+peserta.noKartu+'\')');

                                $('#modal_form_sep_bpjs').modal('show');
                            } else {
                                swalAlert('warning', 'Validasi', 'Pembuatan SEP tidak bisa dilanjutkan karena kelas tanggungan tidak ada. <br/> Silahkan hubungi pihak BPJS');
                            }

                            if (layanan !== 'inap') {
                                $('#ppk_rujukan_bpjs').val(peserta.provUmum.kdProvider)
                                $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html(peserta.provUmum.nmProvider)
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
        Swal.fire({
            title: "Konfirmasi Pembuatan SEP",
            html: "Tekan tombol \"Ya\" untuk membuat SEP ",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: '<i class="fas fa-window-close"></i> Tidak',
            confirmButtonText: '<i class="fas fa-save"></i> Ya',
            allowOutsideClick: false,
            reverseButtons: true,
        }).then((result) => {
            if (result.value) {
                createSEP()
            }
        })
    }

    function createSEP() {
        var ppk = $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html().split("</b> ");
        var nama_ppk = ppk[1];
        var statusAntrian = $('#status-antrian').val();
        var pageAntrian = $('#page-antrian').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url(URL_VCLAIM."create_no_sep") ?>',
            data: $('#form_sep_bpjs').serialize() + "&nama_ppk_rujukan=" + nama_ppk,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Proses pembuatan SEP, Mohon Tunggu...');
            },
            success: function(data) {

                var result = data[0];

                if (result.metaData.code === "200" && result.response !== null) {
                    $('input[name=csrf_syam]').val(data.token);
                    
                    if(result.response.hasOwnProperty('sep')){

                        var nosep = result.response.sep.noSep;

                        $('#no_sep').val(nosep);
                        $('#modal_form_sep_bpjs').modal('hide');
                        cetakNotaSEP(nosep);
                        // if ($('#jenis_pendaftaran').val() !== 'Poliklinik') {
                            if (statusAntrian === '1') {
                                var p = parseInt(pageAntrian);
                                getAntrianBPJS(p);
                            } else {
                                getListPendaftaran($('#page_now').val(), '');
                            
                            }
                        resetBPJS(); 

                    } else {

                        if(typeof result.response.histori[0].tglSep !== undefined && typeof result.response.histori[0].tglSep !== 'undefined'){

                            if(result.response.histori[0].tglSep === '<?php echo date('Y-m-d') ?>'){

                                nosep = result.response.histori[0].noSep;

                                $('#no_sep').val(nosep);
                                $('#modal_form_sep_bpjs').modal('hide');
                                cetakNotaSEP(nosep);
                                // if ($('#jenis_pendaftaran').val() !== 'Poliklinik') {
                                    if (statusAntrian === '1') {
                                        var p = parseInt(pageAntrian);
                                        getAntrianBPJS(p);
                                    } else {
                                        getListPendaftaran($('#page_now').val(), '');
                                    
                                    }
                                resetBPJS(); 

                            } else {

                                $('input[name=csrf_syam]').val(data.token);
                                swalCustom('warning', 'Gagal membuat SEP', result.metaData.message);

                            }

                        } else {

                            $('input[name=csrf_syam]').val(data.token);
                            swalCustom('warning', 'Gagal membuat SEP', result.metaData.message);

                        }
                    }

                } else  {
                    $('input[name=csrf_syam]').val(data.token);
                    swalCustom('warning', 'Gagal membuat SEP', 'Code : '+result.metaData.code+' Pesan: '+result.metaData.message+' '+result.response);
                }

                
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalCustom('error', 'Koneksi Bermasalah', 'Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS');
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
        if (no_sep === null || no_sep === "") {
            swalCustom('warning', 'Cetak SEP', 'No. SEP Tidak ada, Silahkan buat sep terlebih dahulu');
        } else {
            window.open('<?= base_url(URL_VCLAIM_PRINT) ?>nota_sep/' + no_sep, 'Cetak Nota SEP Ver. 2.0');
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
        $('#label_poli_bpjs').val(poli);

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

    function getSuratKontrolByNoKartu()
    {
        var noKartu = $('#no_kartu_bpjs').text()
        if (noKartu !== '') {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(URL_VCLAIM."get_list_surat_kontrol_by_no_kartu") ?>',
                data: 'no_kartu='+noKartu,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    if (data.metaData.code === "200") {
                        if (data.response !== null) {
                            let html = '';
                            let jnsKontrol = '';
                            $.each(data.response.list, function(i, v) {
                                if (v.jnsKontrol == '1') {
                                    jnsKontrol = 'Inap'
                                } else {
                                    jnsKontrol = 'Kontrol'
                                }
                                html += `
                                    <tr>
                                        <td class="center">${++i}</td>
                                        <td class="center">${datefmysql(v.tglTerbitKontrol)}</td>
                                        <td class="center">${datefmysql(v.tglRencanaKontrol)}</td>
                                        <td>${jnsKontrol}</td>
                                        <td class="center">${v.noSuratKontrol}</td>
                                        <td>${v.namaPoliTujuan}</td>
                                        <td>${v.namaDokter}</td>
                                        <td align="right">
                                            <button type="button" class="btn btn-success btn-xs" onclick="pilihNoSuratKontrol(\'${v.noSuratKontrol}\', \'${v.kodeDokter}\', \'${v.namaDokter}\', \'${v.tglRencanaKontrol}\')"><i class="fas fa-check-circle m-r-5"></i>Pilih</button>
                                        </td>
                                    </tr>
                                `;
                            });

                            $('#table_no_surat_kontrol tbody').html(html);
                            $('#modal_no_surat_kontrol').modal('show')
                        } else {
                            swalCustom('warning', 'History Surat Kontrol', 'Gagal mendapatkan data, Silahkan coba kembali.');
                        }
                    } else {
                        swalCustom('warning', 'History Surat Kontrol', data.metaData.message);
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
            swalCustom('info', 'Informasi', 'No. Kartu tidak ditemukan.');
        }
    }

    function pilihNoSuratKontrol(no_surat_kontrol, kode_dokter, dokter, tanggal_rencana_kontrol) {
        $('#no_skdp_bpjs').val(no_surat_kontrol);
        $('#dokter_dpjp_bpjs').val(kode_dokter);
        $('#s2id_dokter_dpjp_bpjs a .select2-chosen').html((dokter !== null) ? dokter : '');
        $('#tanggal_sep_bpjs').val(datefmysql(tanggal_rencana_kontrol));
        $('#modal_no_surat_kontrol').modal('hide');
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
            url: '<?= base_url(URL_VCLAIM."update_no_polish") ?>',
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
        if (sep === '') {
            sep = '0223R038<?php echo date('my') ?>V';
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
		
		let stop = false;
        if (no_sep.length != 19) {
            swalCustom('warning', 'Gagal Simpan No SEP', 'Jumlah NO SEP harus 19 digit');
            stop = true;
        }

        if (stop) {
            return false;
        }
		
        $.ajax({
            type: 'PUT',
            url: '<?= base_url(URL_VCLAIM."update_no_sep") ?>',
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
        $('#label_poli_area').hide();

        var label_modal = ''
        if (layanan === 'poli') {
            $('.sep_igd').show()
            $('.filter_igd').hide();
            $('.kode_poli_area').hide();
            $('#label_poli_area').show();
            label_modal = 'Rawat Jalan'
        } else if (layanan === 'igd') {
            $('.sep_igd').hide()
            $('.filter_igd').show();
            $('#label_poli_area').hide();
            label_modal = 'IGD'
        } else {
            $('.sep_igd').show()
            $('.filter_igd').hide();
            $('.kode_poli_area').hide();
            $('#label_poli_area').hide();
            $('#asal_rujukan_bpjs').val('2').attr('readonly', true);
            $('#ppk_rujukan_bpjs').val('0223R038').select2('readonly', true);
            $('#s2id_ppk_rujukan_bpjs a .select2-chosen').html('<b>0223R038</b> RSUD KOTA TANGERANG - KOTA TANGERANG');
            label_modal = 'Rawat Inap'
        }

        $('#no_sep_bpjs').val(no_sep);
        $('#modal_dialog_bpjs').attr("style", "min-width:98%");
        $('#modal_form_sep_bpjs_label').html('Data Peserta BPJS | <b>Form Perubahan SEP '+label_modal+' Ver. 2.0</b>');

        $('#bt_create_sep').hide();
        $('#bt_update_sep').show();

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM."get_detail_sep") ?>/no_sep/' + no_sep,
            cache: false,
            dataType: 'json',
            success: function(data) {

                if (data.metaData.code === '200') {
                    if (data.response !== null) {
                        var resp = data.response;
                        if (resp.nmstatusKecelakaan !== 'Kecelakaan LaluLintas dan Kecelakaan Kerja') {
                            $('.laka').hide();
                            $('#laka_lantas_bpjs').val('0').change();
                        } else {
                            $('.laka').show();
                            $('#laka_lantas_bpjs').val('1').change();
                        }

                        if (resp.jnsPelayanan === 'Rawat Inap') {
                            $('#jenis_pelayanan_bpjs').val('1');
                            $('#jenis_pelayanan2_bpjs').val('1');

                            $('.sep_ranap').show()
                            $('.label_surat_kontrol').html('No. SPRI')
                        } else {
                            $('#jenis_pelayanan_bpjs').val('2');
                            $('#jenis_pelayanan2_bpjs').val('2');

                            $('.sep_ranap').hide()
                            $('.label_surat_kontrol').html('No. Surat Kontrol/SKDP')
                        }

                        if(data.response.poli === 'MATA'){

                            $('.mata').show();

                        }

                        $('#tanggal_rujukan_bpjs').val(datefmysql(resp.tglRujukan)).datepicker('update');
                        $('#tanggal_sep_bpjs').val(datefmysql(resp.tglSep)).prop('readonly', true)
    
                        $('#no_rujukan_bpjs').val(resp.noRujukan);
                        $('#no_rm_bpjs').val(resp.peserta.noMr);
                        $('#no_rm2_bpjs').val(resp.peserta.noMr);
                        $('#catatan_bpjs').val(resp.catatan);
                        $('#cob_bpjs').val(resp.cob);
                        $('#katarak_bpjs').val(resp.katarak);
    
                        // laka lantas
                        $('#tanggal_kejadian_bpjs').val(datefmysql(resp.lokasiKejadian.tglKejadian)).datepicker('update');
                        $('#keterangan_kll_bpjs').val(resp.lokasiKejadian.ketKejadian);
    
                        $('#dokter_dpjp_bpjs').val(resp.dpjp.kdDPJP);
                        $('#s2id_dokter_dpjp_bpjs a .select2-chosen').html(resp.dpjp.nmDPJP);
    
                        $('#tanggal_rujukan_bpjs').prop('disabled', true);

                        getPesertaByPolish(resp.peserta.noKartu, resp.klsRawat.klsRawatHak, layanan);
                        showHistorySEP(resp.peserta.noKartu);
                    } else {
                        swalCustom('info', 'Update SEP', 'Silahkan coba kembali');
                    }
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

    function konfirmasiUpdateSEP() {
        bootbox.dialog({
            message: "Tekan tombol \"Ya\" untuk mengupdate data SEP ",
            title: "Konfirmasi Perubahan data SEP",
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
                        updateSEP();
                    }
                }
            }
        });
    }

    function updateSEP() {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url(URL_VCLAIM."update_sep") ?>',
            data: $('#form_sep_bpjs').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Proses perubahan data SEP, Mohon Tunggu...');
            },
            success: function(data) {
                var result = data[0];
                if (result.metaData.code === "200" && result.response !== null) {
                    $('input[name=csrf_syam]').val(data.token);
                    $('#modal_form_sep_bpjs').modal('hide');

                    if ($('#jenis_pendaftaran').val() !== 'Poliklinik') {
                        getListPendaftaran($('#page_now').val(), '');
                    }
                    resetBPJS();
                    swalCustom('success', 'Berhasil mengubah data SEP', result.metaData.message);
                } else  {
                    $('input[name=csrf_syam]').val(data.token);
                    swalCustom('error', 'Gagal mengubah data SEP', result.metaData.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalCustom('error', 'Koneksi Bermasalah', 'Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS');
            }
        });
    }

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        messageCustom('Berhasil Copy to Clipboard', 'Info');
    }

    function showHistoriRujukan(no_polish) {
        var rujukan = 'get_list_rujukan_by_pcare';
        $('#modal_histori_rujukan_label').html('List Data <b>Rujukan Faskes Tingkat 1</b>');
        if ($('#jenis_rujukan_bpjs').val() === '2') {
            rujukan = 'get_list_rujukan_by_rs';
            $('#modal_histori_rujukan_label').html('List Data <b>Rujukan Faskes Tingkat 2</b>');
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM.'') ?>' + rujukan + '/nokartu/' + NOKARTU_BPJS,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data !== null) {
                    if (data.metaData.code === "200") {
                        if (data.response !==  null) {
                            // JIKA OK
                            $('#table_histori_rujukan tbody').empty()
                            $.each(data.response.rujukan, function(i, v) {
                                var html = `<tr>
                                    <td class="center">${++i}</td>
                                    <td class="center">
                                        <button type="button" class="btn btn-info btn-xs" onclick="drawRujukan2('${v.noKunjungan}', '${v.tglKunjungan}', '${v.provPerujuk.kode}', '${v.provPerujuk.nama}', '${v.diagnosa.kode}', '${v.diagnosa.nama}', '${v.keluhan}')"><b><i class="fas fa-check-circle mr-1"></i>${v.noKunjungan}</b></button>
                                    </td>
                                    <td class="center"> ${datefmysql(v.tglKunjungan)}</td>
                                    <td class="center">${v.peserta.noKartu}</td>
                                    <td>${v.peserta.nama}</td>
                                    <td>${v.provPerujuk.nama}</td>
                                    <td>${v.poliRujukan.nama}</td>
                                </tr>`;

                                $('#table_histori_rujukan tbody').append(html)
                            })

                            $('#modal_histori_rujukan').modal('show')
                            
                        }
                    } else {
                        swalCustom('info', 'List Data Rujukan', data.metaData.message);
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
</script>