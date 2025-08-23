<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    var baseUrl = '<?= base_url('medical_check_up/api/medical_check_up') ?>';
    var GROUP = '<?= $group ?>'
    var POLI = '<?= $poli == 'NULL' ? '' : $poli ?>';
    var JENIS_LAYANAN = '<?= $jenis ?>';

    $(function() {
        getListPemeriksaan(1);
        $("#wizard-form").bwizard();
        $("#wizard-form-1").bwizard();

        // btn search data
        $('#btn-search-data').click(function() {
            $('#modal-search').modal('show');
        });

        $('#btn-reload-data').click(function() {
            resetFormData();
            getListPemeriksaan(1);
        });

        // select2 dokter on anamnesa
        $('#dokter').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $('#s2id_dokter_diagnosa a .select2c-chosen, #s2id_operator a .select2c-chosen, #dokter-detail, #s2id_dokter_rujuk a .select2c-chosen, #s2id_dokter_rujuk_rad a .select2c-chosen')
                    .html(data.nama);
                $('#operator, #id-dokter-detail, #dokter_rujuk, #dokter_rujuk_rad').val(data.id);
                return data.nama;
            }
        });

        $('#listanamnesa').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/listanamnesa_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        id_pendaftaran: $('#id-pendaftaran-pasien').val(),
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.nm_unit_layanan + '</b><br/><i>' + data.nm_dokter +
                    '</b><br/><i>' + data.tanggal_periksa + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $('#id-anamnesa-pilih').val(data.id);
                getDataAnamnesa(data.id_pendaftran, data.id_layanan_pendaftaran);

                return data.nm_unit_layanan;
            }
        });

        // select2 dokter on tindakan
        $('#operator').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#profesi').val(),
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {

                return data.nama;
            }
        });

        // Show Tindakan Paket
        $('.tindakan-lain').hide();
        $('#tindakan-paket').change(function() {
            $('#tindakan-paket').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#tindakan-paket').val(val);
            });

            if ($('#tindakan-paket').val() > 0) {
                $('.tindakan-lain').show();
                $('.tindakan-biasa').hide();
                $('.jumlah-tindakan').hide();
            } else {
                $('.tindakan-lain').hide();
                $('.tindakan-biasa').show();
                $('.jumlah-tindakan').show();
            }
        });

        $('#tindakan-biasa').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pemeriksaan_mcu_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term      
                        kelas: '1',
                        //penjamin: id_pj,
                        jenis: 'Rawat Jalan',
                        unit: '314',
                        mcu: 'mcu',
                        page: page // page number

                    };

                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var total = (data.total !== '') ? ('Rp. ') + numberToCurrency(data.total) : '';
                var markup = '<b>' + data.layanan + '</b> <br/>' + total;

                return markup;
            },
            formatSelection: function(data) {
                $('#tarif-tindakan').val(data.total);
                $('#id-paket').val(data.id);

                return data.layanan;
            }
        });


        // select2 tindakan
        $('#tindakan-lain').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pemeriksaan_mcu_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term      
                        kelas: '1',
                        //penjamin: id_pj,
                        jenis: 'Rawat Jalan',
                        unit: '314',
                        mcu: 'paket',
                        page: page // page number

                    };

                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var total = (data.total !== '') ? ('Rp. ') + numberToCurrency(data.total) : '';
                var markup = '<b>' + data.layanan + '</b> <br/>' + total;

                return markup;
            },
            formatSelection: function(data) {
                $('#tarif-tindakan').val(data.total);
                $('#id-paket').val(data.id);

                return data.layanan;
            }
        });

        $('#tindakan-icd9').select2c({
            ajax: {
                url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd9_auto') ?>",
                dataType: 'JSON',
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
                var markup = '<b>' + data.icd9 + '</b> <br/>' + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                $('#tindakan-icd9').val(data.id);
                return '[' + data.icd9 + '] ' + data.nama;
            }
        });

        // Change Pupil Input
        $('#pupil-other').change(function() {
            if ($(this).val() == 'on') {
                $('#pupil-bentuk').attr('disabled', false);
                $('#pupil-ukuran').attr('disabled', false);
                $('#pupil-reflek-cahaya').attr('disabled', false);
            }
        });

        $('#pupil-dbn').change(function() {
            if ($(this).val() == 'dbn') {
                $('#pupil-bentuk').attr('disabled', true);
                $('#pupil-ukuran').attr('disabled', true);
                $('#pupil-reflek-cahaya').attr('disabled', true);
            }
        });
        // End Change Pupil Input

        // Change Nervi Cranialis Input
        $('#nervi-cranialis-other').change(function() {
            if ($(this).val() == 'on') {
                $('#nervi-cranialis-paresis').attr('disabled', false);
            }
        });

        $('#nervi-cranialis-dbn').change(function() {
            if ($(this).val() == 'dbn') {
                $('#nervi-cranialis-paresis').attr('disabled', true);
            }
        });
        // End Change Nervi Cranialis Input

        // Change Sensorik Input
        $('#sensorik-other').change(function() {
            if ($(this).val() == 'on') {
                $('#sensorik-lain').attr('disabled', false);
            }
        });

        $('#sensorik-dbn').change(function() {
            if ($(this).val() == 'dbn') {
                $('#sensorik-lain').attr('disabled', true);
            }
        });
        // End Change Sensorik Input

        // Change Tanda Rangsang Meningeal Input
        $('#trm-other-one').change(function() {
            if ($(this).val() == 'on') {
                $('#trm-kaku-kuduk').attr('disabled', false);
                $('#trm-laseque').attr('disabled', true);
                $('#trm-kerning').attr('disabled', true);
            }
        });

        $('#trm-other-two').change(function() {
            if ($(this).val() == 'on') {
                $('#trm-kaku-kuduk').attr('disabled', true);
                $('#trm-laseque').attr('disabled', false);
                $('#trm-kerning').attr('disabled', true);
            }
        });

        $('#trm-other-three').change(function() {
            if ($(this).val() == 'on') {
                $('#trm-kaku-kuduk').attr('disabled', true);
                $('#trm-laseque').attr('disabled', true);
                $('#trm-kerning').attr('disabled', false);
            }
        });

        $('#trm-dbn').change(function() {
            if ($(this).val() == 'dbn') {
                $('#trm-kaku-kuduk').attr('disabled', true);
                $('#trm-laseque').attr('disabled', true);
                $('#trm-kerning').attr('disabled', true);
            }
        });
        // End Change Tanda Rangsang Meningeal Input

        // Show Diagnosa Manual
        $('.golongan-sebab-sakit-lain').hide();
        $('#diagnosa-manual').change(function() {
            $('#diagnosa-manual').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#diagnosa-manual').val(val);
            });

            if ($('#diagnosa-manual').val() > 0) {
                $('.golongan-sebab-sakit-lain').show();
                $('.golongan-sebab-sakit').hide();
            } else {
                $('.golongan-sebab-sakit-lain').hide();
                $('.golongan-sebab-sakit-lain').val('');
                $('.golongan-sebab-sakit').show();
            }
        });

        // diagnosa klinik
        $('#diagnosa-klinik').change(function() {
            $('#diagnosa-klinik').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#diagnosa-klinik').val(val);
            });
        });

        // diagnosa akhir
        $('#diagnosa-akhir').change(function() {
            $('#diagnosa-akhir').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#diagnosa-akhir').val(val);
            });
        });

        // penyebab kematian
        $('#penyebab-kematian').change(function() {
            $('#penyebab-kematian').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#penyebab-kematian').val(val);
            });
        });

        $("#tanggal-awal, #tanggal-akhir").datepicker({
            format: 'dd/mm/yyyy',
            endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#dokterhide').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });
    });

    function resetFormData() {
        // form search
        $('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>');
        $('#layanan, #no-register-search, #no-rm-search, #nik-search, #nama-search').val('');

        $('.custom-textarea, .custom-form').val('');
        $('.select2-chosen').html('');
        $('#unit').val('314');
        $('#s2id_unit a .select2c-chosen').html('Medical Check Up');
        $('#table-diagnosa tbody, #table-tindakan tbody').empty();

        // validasi
        syams_validation_remove('.validasi-input');
        syams_validation_remove('.select2-input');

        //anamnesis
        $('#id-anamnesa-asli, #id-anamnesa-pilih').val('');
        $('#s2id_listanamnesa a .select2c-chosen').html('');

        // resume medis
        $('#mcu-no-surat, #mcu-tahun-surat, #mcu-nama-pasien, #mcu-jenis-kelamin, #mcu-tanggal-lahir, #mcu-alamat, #mcu-pekerjaan, #mcu-keperluan, #mcu-ksi, #mcu-rpd, #mcu-rpk, #mcu-tinggi-badan, #mcu-berat-badan, #mcu-bmi,#mcu-tensi-sistolik, #mcu-tensi-diastolik, #mcu-nadi, #mcu-rr, #mcu-kepala, #mcu-kulit, #mcu-mata, #mcu-persepsi-warna, #mcu-jauh-od, #mcu-jauh-os, #mcu-dekat-od, #mcu-dekat-os, #mcu-konjungtiva, #mcu-sklera, #mcu-komea, #mcu-telinga, #mcu-hidung, #mcu-tenggorokan, #mcu-gdm, #mcu-leher, #mcu-dada, #mcu-paru, #mcu-abdomen, #mcu-anggota-gerak, #mcu-pemeriksaan-penunjang, #mcu-kesimpulan, #mcu-saran, #mcu-status-kesehatan, #mcu-dokter, #mcu-dokter-nik')
            .val('');

        $('#s2id_mcu-dokter a .select2c-chosen').html('');
        $('#mcu-tanggal-surat').val('<?= date('d/m/Y') ?>');
    }

    function setAnamnesa() {
        let id_pend = $('#id-pendaftaran-pasien').val();
        let id_anam_asli = $('#id-anamnesa-asli').val();
        let id_anam_pilih = $('#id-anamnesa-pilih').val();

        if (id_anam_pilih === '') {
            boolval = false;
        } else if (id_anam_asli === id_anam_pilih) {
            boolval = false;
        } else {
            boolval = true;
        }

        $('#keluhan-utama').attr('readonly', boolval);
        $('#riwayat-penyakit-keluarga').attr('readonly', boolval);
        $('#riwayat-penyakit-sekarang').attr('readonly', boolval);
        $('#riwayat-penyakit-dahulu').attr('readonly', boolval);
        $('#anamnesa-sosial').attr('readonly', boolval);

        $('#keadaan-umum').attr('readonly', boolval);
        $('#kesadaran').attr('readonly', boolval);
        $('#gcs').attr('readonly', boolval);
        $('#alergi').attr('readonly', boolval);
        $('#tensi-sistolik').attr('readonly', boolval);
        $('#tensi-diastolik').attr('readonly', boolval);
        $('#suhu').attr('readonly', boolval);
        $('#nadi').attr('readonly', boolval);
        $('#tinggi-badan').attr('readonly', boolval);
        $('#berat-badan').attr('readonly', boolval);
        $('#rr').attr('readonly', boolval);
        $('#nps').attr('readonly', boolval);

        $('#kepala').attr('readonly', boolval);
        $('#leher').attr('readonly', boolval);
        $('#thorax').attr('readonly', boolval);
        $('#pulmo').attr('readonly', boolval);
        $('#cor').attr('readonly', boolval);
        $('#abdomen').attr('readonly', boolval);
        $('#genitalia').attr('readonly', boolval);
        $('#ekstrimitas').attr('readonly', boolval);
        $('#pemeriksaan-penunjang').attr('readonly', boolval);
        $('#prognosis').attr('readonly', boolval);
        $('#status-mentalis').attr('readonly', boolval);
        $('#lingkar-kepala').attr('readonly', boolval);
        $('#status-gizi').attr('readonly', boolval);
        $('#telinga').attr('readonly', boolval);
        $('#hidung').attr('readonly', boolval);
        $('#tenggorok').attr('readonly', boolval);
        $('#mata').attr('readonly', boolval);
        $('#kulit-kelamin').attr('readonly', boolval);
        $('#usul-tindak-lanjut').attr('readonly', boolval);

        $('#pupil-dbn').attr('readonly', boolval);
        $('#pupil-other').attr('readonly', boolval);
        $('#pupil-bentuk').attr('readonly', boolval);
        $('#pupil-ukuran').attr('readonly', boolval);
        $('#pupil-reflek-cahaya').attr('readonly', boolval);

        $('#nervi-cranialis-other').attr('readonly', boolval);
        $('#nervi-cranialis-paresis').attr('readonly', boolval);

        $('#nervi-cranialis-dbn').attr('readonly', boolval);
        $('#nervi-cranialis-other').attr('readonly', boolval);
        $('#nervi-cranialis-paresis').attr('readonly', boolval);

        $('#rf-kiri-atas').attr('readonly', boolval);
        $('#rf-kiri-bawah').attr('readonly', boolval);
        $('#rf-kanan-atas').attr('readonly', boolval);
        $('#rf-kanan-bawah').attr('readonly', boolval);

        $('#sensorik-dbn').attr('readonly', boolval);
        $('#sensorik-other').attr('readonly', boolval);
        $('#sensorik-lain').attr('readonly', boolval);

        $('#pemeriksaan-khusus').attr('readonly', boolval);

        $('#trm-other-one').attr('readonly', boolval);
        $('#trm-kaku-kuduk').attr('readonly', boolval);

        $('#trm-other-two').attr('readonly', boolval);
        $('#trm-laseque').attr('readonly', boolval);

        $('#trm-other-three').attr('readonly', boolval);
        $('#trm-kerning').attr('readonly', boolval);

        $('#trm-dbn').attr('readonly', boolval);

        $('#motorik-kiri-atas').attr('readonly', boolval);
        $('#motorik-kiri-bawah').attr('readonly', boolval);
        $('#motorik-kanan-atas').attr('readonly', boolval);
        $('#motorik-kanan-bawah').attr('readonly', boolval);
        $('#reflek-patologis').attr('readonly', boolval);
        $('#otonom').attr('readonly', boolval);
        $('#riwayat-kelahiran').attr('readonly', boolval);
        $('#riwayat-imunisasi').attr('readonly', boolval);
        $('#riwayat-nutrisi').attr('readonly', boolval);
        $('#riwayat-tumbuh-kembang').attr('readonly', boolval);
    }

    function getListPemeriksaan(p) {
        $('#page_now').val(p);

        if (GROUP !== 'Admin') {
            if (POLI !== '') {
                $('#layanan').val(POLI);
                $('#filter_select').addClass('d-none');
            }
        }

        var filter_dokter = '';
        if ('<?= $this->session->userdata('profesi_nadis') ?>' == 'Dokter Spesialis') {
            filter_dokter = '&id_dokter=' + '<?= $this->session->userdata('id_translucent') ?>'
        }

        $.ajax({
            type: 'GET',
            url: baseUrl + '/get_list_medical_check_up/page/' + p + '/jenis/Medical Check Up',
            cache: false,
            data: $('#form_search').serialize() + '&layanan=' + $('#layanan').val() + filter_dokter,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListPemeriksaan(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table_data tbody').empty();
                let html = '';
                let status = '';
                let disable = '';
                let status_resep = '';
                let disable_lanjut = '';
                let disable_btl_keluar = '';
                let disable_cco_smtr = '';
                let disable_cco_smtr_it = '';
                let disable_cco_smtr_btl = '';
                let disable_resep = '';
                let disable_viewonly = '';

                $.each(data.data, function(i, v) {
                    // Untuk tindak lanjut
                    $('#dokter-pengirim').val(v.id_dokter);
                    $('#nama-dokter-pengirim').val(v.dokter);


                    if (v.tindak_lanjut === null) {
                        disable_lanjut = '';
                        disable = '';
                        disable_btl_keluar = 'disabled';
                        disable_cco_smtr = 'disabled';
                        disable_cco_smtr_it = 'disabled';
                        disable_cco_smtr_btl = 'disabled';
                    } else if (v.tindak_lanjut === 'cco sementara') {
                        disable_lanjut = '';
                        disable = '';
                        disable_cco_smtr = 'disabled';
                        if (v.tindak_lanjut_sementara !== '') {
                            disable_cco_smtr_btl = '';
                        } else {
                            disable_cco_smtr_btl = 'disabled';
                        }
                    } else if (v.tindak_lanjut === 'cco sementara it') {
                        disable_lanjut = '';
                        disable = '';
                        disable_cco_smtr = 'disabled';
                        disable_cco_smtr_it = 'disabled';
                        if (v.tindak_lanjut_sementara !== '') {
                            disable_cco_smtr_btl = '';
                        } else {
                            disable_cco_smtr_btl = 'disabled';
                        }
                    } else {
                        disable_lanjut = 'disabled';
                        disable = 'disabled';
                        disable_cco_smtr = '';
                        disable_cco_smtr_it = '';
                        disable_cco_smtr_btl = 'disabled';
                    }

                    if (v.layanan === 'Rehab Medik' && v.status_terlayani !== 'Belum') {
                        terapi =
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailTerapi(' +
                            v.id_pendaftaran + ',' + v.id + ',' + v.id_pasien +
                            ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Protokol Terapi</a>';
                        link_rehab = '<a class="dropdown-item ' + disable_lanjut +
                            ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut(' +
                            v.id_pendaftaran + ', ' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter +
                            '\', \'' + v.layanan +
                            '\')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>';
                    } else if (v.layanan === 'Rehab Medik' && v.status_terlayani === 'Belum') {

                        terapi =
                            '<a class="dropdown-item disabled waves-effect waves-light btn-xs" href="javascript:void(0)"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Protokol Terapi</a>';
                        link_rehab = '<a class="dropdown-item ' + disable_lanjut +
                            ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut(' +
                            v.id_pendaftaran + ', ' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter +
                            '\', \'' + v.layanan +
                            '\')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>';

                    } else {


                        terapi = '';
                        link_rehab = '<a class="dropdown-item ' + disable_lanjut +
                            ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut(' +
                            v.id_pendaftaran + ', ' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter +
                            '\', \'' + v.layanan +
                            '\')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>';
                    }

                    if (v.status_terlayani === 'Belum') {
                        disable_resep = '';
                        status =
                            '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                    } else if (v.status_terlayani === 'Batal') {
                        status =
                            '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
                    } else {
                        disable_resep = '';
                        status =
                            '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
                    }

                    if (v.status_terlayani === 'Batal' || v.tindak_lanjut !== null && v.tindak_lanjut !== 'cco sementara' && v.tindak_lanjut !== 'cco sementara it') {
                        disable_resep = 'disabled';
                    }

                    if (v.id_resep === null) {
                        status_resep = '-';
                    } else {
                        status_resep = '<i class="fas fa-check-circle"></i>';
                    }

                    let accountGroup = "<?= $this->session->userdata('account_group') ?>"
                    let idTranslucent = "<?= $this->session->userdata('id_translucent') ?>"
                    let btn_hidden = '';
                    //idTranslucent 1703 => ekasm MCU   //idTranslucent 1803 => JAYANTI MCU
                    if ((accountGroup === 'Admin') || (accountGroup === 'Kepala Instalasi Rawat Jalan') || (accountGroup === 'Kepala Ruangan Rawat Jalan') || (accountGroup === 'Admin Rekam Medis') || (idTranslucent === '1703') || (idTranslucent === '1803')) {
                        btn_hidden = '';
                    } else {
                        btn_hidden = 'hidden';
                    }

                    let btn_hidden_keluar = '';
                    if (accountGroup === 'Admin') {
                        btn_hidden_keluar = '';
                    } else {
                        btn_hidden_keluar = 'hidden';
                    }

                    let detail = v.id + '#' + v.id_pasien + '#' + v.nama + '#' + v.dokter + '#' + v
                        .id_dokter + '#' + hitungUmur(v.tanggal_lahir) + '#' + v.jenis_layanan + '#' + v
                        .id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#rajal' +
                        v.id_pendaftaran;
                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let tindakLanjut = v.tindak_lanjut !== null ? v.tindak_lanjut : '-';

                    if (tindakLanjut === 'cco sementara it') {
                        tindakLanjut = 'cco sementara billing';
                    }

                    if (v.tindak_lanjut === null) {
                        riwayat_rekammedis = '';
                    } else {
                        riwayat_rekammedis = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="riwayatPasien(\'' + v.id_pasien + '\')"><i class="fas fa-eye m-r-5"></i> Lihat Riwayat Rekam Medis Pasien</a>';
                    }

                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.no_register + '</td>' +
                        '<td>' + v.id_pasien + '</td>' +
                        '<td class="nowrap">' + ((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '') + '</td>' +
                        '<td class="nowrap">' + v.nama + '</td>' +
                        '<td class="nowrap">' + v.layanan + '</td>' +
                        '<td class="nowrap">' + v.dokter + '</td>' +
                        '<td class="nowrap">' + v.cara_bayar + (v.cara_bayar === 'Asuransi' ? ' ( ' + v.penjamin + ' )' : '') + '</td>' +
                        '<td align="center">' + status + '</td>' +
                        '<td align="center">' + status_resep + '</td>' +
                        '<td align="center">' + tindakLanjut + '</td>' +
                        '<td align="right" style="white-scace:nowrap">' +
                        '<button ' + disable_resep + ' type="button" class="btn btn-secondary btn-xs mr-1" title="Klik untuk input resep" onclick="inputResep(\'' + detail + '\')"><i class="fas fa-plus-circle mr-1"></i>Resep</button>' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        <?php if ($this->session->userdata('account_group') === 'Admin') : ?> '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id + ',\'' + ((v.tindak_lanjut !== null) ? v.tindak_lanjut : '') + '\')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>' +
                        <?php else : ?> '<a class="dropdown-item waves-effect waves-light btn-xs ' + disable + '" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id + ',\'' + ((v.tindak_lanjut !== null) ? v.tindak_lanjut : '') + '\')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>' +
                        <?php endif ?>(v.tindak_lanjut === 'RS Lain' ?
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratRujukan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-file-medical-alt m-r-5"></i>Buat Surat Rujukan</a>' :
                            '') + terapi +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailOkupasi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Okupasi</a>' +
                        riwayat_rekammedis +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakFormMCU(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-print"></i> Cetak Form MCU</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="settingPerlakuanKhusus(\'' + v.id_pasien + '\')"><i class="fas fa-fw fa-thumbtack m-r-5"></i>Set Perlakuan Khusus</a>' +
                        '<a class="dropdown-item ' + disable_lanjut + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="konsulKlinikLain(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-plus m-r-5"></i>Konsul Klinik Lain</a>' +
                        link_rehab +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="hasilPemeriksaanMCU(\'' + v.id_pendaftaran + '\',\'' + v.id + '\',\'' + v.id_pasien + '\',\'' + p + '\')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Hasil Pemeriksaan MCU</a>' +
                        '<a hidden class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakHasilMCU(\'' + v.id_pendaftaran + '\',\'' + v.id + '\',\'' + v.id_pasien + '\')"><i class="mdi mdi-printer m-r-5"></i>Cetak Pemeriksaan MCU</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" ' + btn_hidden_keluar + ' href="javascript:void(0)" onclick="pembatalanStatusKeluarMcu(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar</a>' +
                        <?php if ($this->session->userdata('account_group') === 'Admin') : ?> '<a class="dropdown-item ' + disable_cco_smtr_it + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="statusKeluarSementaraIt(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>status keluar sementara Billing</a>' +
                        <?php else : ?> '<a class="dropdown-item ' + disable_cco_smtr + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="statusKeluarSementaraMcu(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara</a>' +
                        <?php endif ?> '<a class="dropdown-item ' + disable_cco_smtr_btl + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="pembatalanStatusKeluarSementaraMcu(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar Sementara</a>' +
                        '</div>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('#table_data tbody').append(html);
                });

            },
            complete: function() {
                hideLoader();
                $('#modal-search').modal('hide')
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        })
    }









    function paging(page) {
        getListPemeriksaan(page)
    }

    function setTanggalPencarian() {
        let nik = $('#nik-search').val();
        let nama = $('#nama-search').val();
        let noRM = $('#no-rm-search').val();
        let tanggalAwal = $('#tanggal-awal').val();
        let tanggalAkhir = $('#tanggal-akhir').val();
        let noRegister = $('#no-register-search').val();

        resetFormData();
        $('#nik-search').val(nik);
        $('#nama-search').val(nama);
        $('#no-rm-search').val(noRM);
        $('#tanggal-awal').val(tanggalAwal);
        $('#tanggal-akhir').val(tanggalAkhir);
        $('#no-register-search').val(noRegister);
    }

    function detailPemeriksaan(id_pendaftaran, id_layanan, tindak_lanjut) {

        //remove validasi
        syams_validation_remove('#tambah-tindakan');
        syams_validation_remove('#tambah-lab');
        syams_validation_remove('#tambah-rad');

        $('#btn-file-pasien').empty();

        $('#wizard-form').bwizard('show', '0');
        setTanggalPencarian();
        $('#id-paket').val('');
        $('#id-layanan').val(id_layanan);
        $('#tindaklanjut').val(tindak_lanjut);
        $('#id-pendaftaran-pasien').val(id_pendaftaran);
        $('#s2id_tindakan a .select2c-chosen').html('');
        $('#s2tarif_tindakan a .select2c-chosen').html('');
        get_pemeriksaan_lab(id_layanan);
        get_pemeriksaan_rad(id_layanan);

        // Tambahan Wahyu (Default Input Pemeriksaan Fisik)
        $('#kepala').val('Dalam batas normal');
        $('#thorax').val('Dalam batas normal');
        $('#cor').val('Dalam batas normal');
        $('#genitalia').val('Dalam batas normal');
        $('#status-mentalis').val('Dalam batas normal');
        $('#hidung').val('Dalam batas normal');
        $('#mata').val('Dalam batas normal');

        $('#leher').val('Dalam batas normal');
        $('#pulmo').val('Dalam batas normal');
        $('#abdomen').val('Dalam batas normal');
        $('#ekstrimitas').val('Dalam batas normal');
        $('#prognosis').val('Dalam batas normal');
        $('#lingkar-kepala').val('Dalam batas normal');
        $('#telinga').val('Dalam batas normal');
        $('#tenggorok').val('Dalam batas normal');
        $('#kulit-kelamin').val('Dalam batas normal');
        // End

        $.ajax({
            type: 'GET',
            url: '<?= base_url("medical_check_up/api/medical_check_up/detail_pemeriksaan") ?>/id/' +
                id_pendaftaran + '/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                let umur = '';
                let kelamin = '';
                let pasien = data.pasien;
                let layanan = data.layanan;
                let anamnesa = data.anamnesa[0];

                let btnUploadDokumen = `<button type="button" class="btn btn-secondary btn-xxs" onclick="uploadFileRM('${pasien.id}', '${layanan.id}', '${pasien.id_pasien}')"><i class="fas fa-upload m-r-5"></i>Upload File Rekam Medis</button>`
                $('#btn-file-pasien').append(btnUploadDokumen);

                if (pasien !== null) {
                    if (layanan.tindak_lanjut === 'cco sementara') {
                        $('button[title="Tambah Tindakan"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah tindakan, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="order pemeriksaan lab"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order Pemeriksaan Laboratorium, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="order pemeriksaan rad"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order Pemeriksaan Radiologi, silahkan hubungi <b>Kasir</b>')
                        })
                    } else {
                        $('button[title="Tambah Tindakan"]').off('click').attr('onclick', 'addTindakanMCU()')
                        $('button[title="order pemeriksaan lab"]').off('click').attr('onclick', 'request_lab()')
                        $('button[title="order pemeriksaan rad"]').off('click').attr('onclick', 'request_rad()')
                    }
                    if (pasien.kelamin == 'L') {
                        kelamin = 'Laki - laki';
                    } else {
                        kelamin = 'Perempuan';
                    }

                    if (pasien.tanggal_lahir !== null) {
                        umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
                    }

                    detail_alamat = '';
                    if ((pasien.no_rumah !== '') && (pasien.no_rumah !== null)) {
                        detail_alamat = detail_alamat + ' NO.' + pasien.no_rumah;
                    }
                    if ((pasien.no_rt !== '') && (pasien.no_rt !== null)) {
                        detail_alamat = detail_alamat + ' RT.' + pasien.no_rt;
                    }
                    if ((pasien.no_rw !== '') && (pasien.no_rw !== null)) {
                        detail_alamat = detail_alamat + ' RW.' + pasien.no_rw;
                    }
                    if ((pasien.kelurahan !== '') && (pasien.kelurahan !== null)) {
                        detail_alamat = detail_alamat + ', ' + pasien.kelurahan;
                    }
                    if ((pasien.kecamatan !== '') && (pasien.kecamatan !== null)) {
                        detail_alamat = detail_alamat + ', ' + pasien.kecamatan;
                    }
                    if ((pasien.kabupaten !== '') && (pasien.kabupaten !== null)) {
                        detail_alamat = detail_alamat + ', ' + pasien.kabupaten;
                    }
                    if ((pasien.provinsi !== '') && (pasien.provinsi !== null)) {
                        detail_alamat = detail_alamat + ', ' + pasien.provinsi;
                    }
                    if ((pasien.kode_pos !== '') && (pasien.kode_pos !== null)) {
                        detail_alamat = detail_alamat + ', ' + pasien.kode_pos;
                    }

                    $('#id-pasien').val(pasien.id_pasien);
                    $('#nama-detail').html(pasien.nama);
                    $('#no-rm-detail').html(pasien.id_pasien);
                    $('#no-register-detail').html(pasien.no_register);
                    $('#kelamin-detail').html(kelamin);
                    $('#umur-detail').html(umur);
                    $('#alamat-detail').html(pasien.alamat + detail_alamat);
                    $('#alergi-detail').html(pasien.alergi);
                    $('#alergi').val(pasien.alergi);
                    $('#no-ktp-pasien').val(pasien.no_identitas);
                    $('#tgl-lahir').val(pasien.tanggal_lahir);
                    $('#nama-pasien').val(pasien.nama);

                    // TAMBAHAN WSH
					// $('#logo-pasien-alergi').attr('title', pasien.alergi);
					// $('#alergi-coba').html(pasien.alergi); GUNAKAN NNTI KETIKA DATA ALERGI HARUS MUNCUL BUKAN CUMA MUNCUL KETIKA DISOROT
					$('#logo-pasien-alergi').attr('title', '‼️ A L E R G I ‼️\n→' + pasien.alergi + '');

                    $('#subspesialis').empty();
                    if (data.subspesialis.length > 0) {
                        $('#subspesialis-row').show();

                        var opt = '<option value="">Pilih Sub Spesialis</option>';
                        $('#subspesialis').append(opt);
                        $.each(data.subspesialis, function(i, v) {
                            opt = '<option value="' + v.id + '">' + v.nama + '</option>';
                            $('#subspesialis').append(opt);
                        });

                        $('#subspesialis').val(layan.id_sub_spesialis);
                    } else {
                        $('#subspesialis-row').hide();
                    }

                    $('.logo-pasien-alergi').hide();
                    $('.logo-pasien-meninggal').hide();
                    $('.logo-pasien-hiv-aids').hide();
                    $('.logo-pasien-gonorrhea').hide();
                    $('.logo-pasien-hepatitis').hide();
                    $('.logo-pasien-kusta-lepra').hide();
                    $('.logo-pasien-tbc-kp').hide();
                    $('.logo-pasien-pejabat').hide();
                    $('.logo-pasien-pemilik-rs').hide();
                    $('.logo-pasien-potensi-komplain').hide();
                    if (data.profil !== null) {
                        // status profil pasien
                        if (data.profil.is_alergi == 'Ya') {
                            $('.logo-pasien-alergi').show();
                        }
                        if (data.profil.is_died == 'Ya') {
                            $('.logo-pasien-meninggal').show();
                        }
                        if (data.profil.is_hiv == 'Ya') {
                            $('.logo-pasien-hiv-aids').show();
                        }
                        if (data.profil.is_gonorrhea == 'Ya') {
                            $('.logo-pasien-gonorrhea').show();
                        }
                        if (data.profil.is_hepatitis == 'Ya') {
                            $('.logo-pasien-hepatitis').show();
                        }
                        if (data.profil.is_kusta == 'Ya') {
                            $('.logo-pasien-kusta-lepra').show();
                        }
                        if (data.profil.is_tbc == 'Ya') {
                            $('.logo-pasien-tbc-kp').show();
                        }
                        if (data.profil.is_pasien_pejabat == 'Ya') {
                            $('.logo-pasien-pejabat').show();
                        }
                        if (data.profil.is_pemilik_rs == 'Ya') {
                            $('.logo-pasien-pemilik-rs').show();
                        }
                        if (data.profil.is_potensi_komplain == 'Ya') {
                            $('.logo-pasien-potensi-komplain').show();
                        }
                    }

                    //instansi
                    $('instansi-detail').html(pasien.instansi_perujuk);
                    $('nadis-detail').html(pasien.nadis_perujuk);

                    // Penanggung Jawab
                    $('#nama-pjwb-detail').html(pasien.nama_pjwb);
                    $('#alamat-pjwb-detail').html(pasien.alamat_pjwb);
                    $('#telp-pjwb-detail').html(pasien.telp_pjwb);
                    $('#nama-pjwb-keuangan-detail').html(pasien.nama_pjwb_finansial);
                    $('#alamat-pjwb-keuangan-detail').html(pasien.alamat_pjwb_finansial);
                    $('#telp-pjwb-keuangan-detail').html(pasien.telp_pjwb_finansial);

                    // Layanan Pendaftaran
                    $('#layanan-detail').html(layanan.layanan);
                    $('#no-antrian-detail').html(layanan.no_antrian);
                    $('#dokter-detail').html(layanan.dokter);
                    $('#dokter-hemorajal').val(layanan.id_dokter);
                    $('#id-penjamin-tindakan').val(layanan.id_penjamin);
                    $('#id-penjamin-rajal').val(layanan.id_penjamin);

                    let cara_bayar = '<b>' + layanan.cara_bayar + ' ' + ((layanan.id_penjamin !== null) ? '(' +
                        layanan.penjamin + ')' : '') + '</b>';
                    $('#cara-bayar-detail').html(cara_bayar);
                    $('#no-polish-detail').html(layanan.no_polish);
                    $('#no-sep-detail').html(layanan.no_sep);
                    $('#rajal-bayar-hemodialisis').val(layanan.cara_bayar);
                    $('#no-polish-hemorajal').val(layanan.no_polish);
                    $('#no-sep-hemorajal').val(layanan.no_sep);
                    if (data.penjamin_pasien) {
                        $('#hak-kelas-pasien').html(data.penjamin_pasien.hak_kelas || '');
                    }

                    $('#identitas-pasien-anamnesa, #identitas-pasien-diagnosa, #identitas-pasien-tindakan, #identitas-pasien-bhp')
                        .html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

                    $('#dokter').val(layanan.id_dokter);
                    $('#s2id_dokter a .select2c-chosen').html(layanan.dokter);

                    $('#operator').val(layanan.id_dokter);
                    $('#s2id_operator a .select2c-chosen').html(layanan.dokter);

                    // anamnesa
                    // if (typeof anamnesa !== 'undefined') {
                    //     $('#id-anamnesa-asli').val(data.anamnesa[0].id);
                    //     showAnamnesa(anamnesa, 'asli');
                    // } else if (anamnesa_okupasi !== null) {
                    //     showAnamnesaOkupasi(anamnesa_okupasi, 'asli');
                    // }

                    // DI SINI DULU KALAU EROR LANGSUNG HAPUS AJAH
                    if (typeof anamnesa !== 'undefined') {
                        $('#id-anamnesa-asli').val(data.anamnesa[0].id);
                        showAnamnesa(anamnesa, 'asli');
                    } else if (typeof anamnesa_okupasi !== 'undefined' && anamnesa_okupasi !== null) {
                        showAnamnesaOkupasi(anamnesa_okupasi, 'asli');
                    }


                    // diagnosa
                    $('#prioritas').val('Utama');
                    if (data.diagnosa.length > 0) {
                        showDiagnosa(data.diagnosa);
                    }

                    // tindakan
                    $('#kelas-tindakan').val('<?= $kelas_tindakan ?>');
                    $('#profesi').val(8);
                    $('#jumlah-tindakan').val(1);
                    $('#unit').val(layanan.id_unit);
                    // $('#s2id_unit a .select2c-chosen').html(layanan.unit);


                    if (data.tindakan !== 'undefined') {
                        showTindakanBiasa(data.tindakan); //tindakan biasa
                        // showTindakan(data.tindakan); //tindakan paket
                    }

                    $('#modal-pemeriksaan').modal('show');
                    $('#modal-pemeriksaan-label').html('Form Pemeriksaan Medical Check Up');
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

    // TAMBAHAN WH
    function hitungUmur(tanggalLahir) {
        // console.log(tanggalLahir); // Mencetak nilai dari variabel 'tanggalLahir' ke konsol, untuk tujuan debugging.     
        const today = new Date(); // Mendapatkan tanggal saat ini.
        const birthDate = new Date(tanggalLahir); // Mengonversi 'tanggalLahir' ke dalam format objek Date JavaScript.

        let ageYears = today.getFullYear() - birthDate.getFullYear(); // Menghitung selisih tahun antara tanggal lahir dan hari ini.
        let ageMonths = today.getMonth() - birthDate.getMonth(); // Menghitung selisih bulan antara tanggal lahir dan hari ini.
        let ageDays = today.getDate() - birthDate.getDate(); // Menghitung selisih hari antara tanggal lahir dan hari ini.

        // Jika bulan saat ini kurang dari bulan lahir atau bulan sama tetapi hari kurang, kurangi 1 tahun
        if (ageMonths < 0 || (ageMonths === 0 && ageDays < 0)) {
            ageYears--; // Kurangi 1 tahun karena belum ulang tahun tahun ini.
            ageMonths += 12; // Tambahkan 12 bulan jika sudah melewati ulang tahun.
        }

        // Jika hari saat ini lebih kecil dari hari lahir, kurangi 1 bulan
        if (ageDays < 0) {
            ageMonths--; // Kurangi 1 bulan karena belum sampai hari lahir dalam bulan ini.
            const lastMonth = new Date(today.getFullYear(), today.getMonth(), 0).getDate(); // Mendapatkan jumlah hari dalam bulan sebelumnya.
            ageDays += lastMonth; // Tambahkan jumlah hari dari bulan sebelumnya untuk menyesuaikan hari.
        }

        return `${ageYears} Tahun ${ageMonths} Bulan ${ageDays} Hari`; // Mengembalikan hasil dalam format 'tahun, bulan, hari'.
    }



    function showDiagnosis(diagnosa) {
        $('#diagnosis-baru').text(diagnosa[0].item);

        $('#diagnosis-baru').val(diagnosa[0].item);
    }

    function getDataAnamnesa(id_pendaftaran, id_layanan) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("medical_check_up/api/medical_check_up/data_anamnesa") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                let anamnesa = data.anamnesa[0];

                if (typeof anamnesa !== 'undefined') {
                    // $('#id-anamnesa-asli').val(data.anamnesa[0].id);
                    showAnamnesa(anamnesa, 'pilih');
                    setAnamnesa();
                }

                $('#modal-pemeriksaan').modal('show');
                $('#modal-pemeriksaan-label').html('Form Pemeriksaan Medical Check Up');

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }

    function showAnamnesa(anamnesa, kode) {
        $('#keluhan-utama').val(anamnesa.keluhan_utama);
        $('#riwayat-penyakit-keluarga').val(anamnesa.riwayat_penyakit_keluarga);
        $('#riwayat-penyakit-sekarang').val(anamnesa.riwayat_penyakit_sekarang);
        $('#riwayat-penyakit-dahulu').val(anamnesa.riwayat_penyakit_dahulu);
        $('#anamnesa-sosial').val(anamnesa.anamnesa_sosial);

        $('#keadaan-umum').val(anamnesa.keadaan_umum);
        $('#kesadaran').val(anamnesa.kesadaran);
        $('#gcs').val(anamnesa.gcs);
        $('#alergi').val(anamnesa.alergi);
        $('#tensi-sistolik').val(anamnesa.tensi_sistolik);
        $('#tensi-diastolik').val(anamnesa.tensi_diastolik);
        $('#suhu').val(anamnesa.suhu);
        $('#nadi').val(anamnesa.nadi);
        $('#tinggi-badan').val(anamnesa.tinggi_badan);
        $('#berat-badan').val(anamnesa.berat_badan);
        $('#rr').val(anamnesa.rr);
        $('#nps').val(anamnesa.nps);

        $('#kepala').val(anamnesa.kepala);
        $('#leher').val(anamnesa.leher);
        $('#thorax').val(anamnesa.thorax);
        $('#pulmo').val(anamnesa.pulmo);
        $('#cor').val(anamnesa.cor);
        $('#abdomen').val(anamnesa.abdomen);
        $('#genitalia').val(anamnesa.genitalia);
        $('#ekstrimitas').val(anamnesa.ekstrimitas);
        $('#pemeriksaan-penunjang').val(anamnesa.pemeriksaan_penunjang);
        $('#prognosis').val(anamnesa.prognosis);
        $('#status-mentalis').val(anamnesa.status_mentalis);
        $('#lingkar-kepala').val(anamnesa.lingkar_kepala);
        $('#status-gizi').val(anamnesa.status_gizi).change();
        $('#telinga').val(anamnesa.telinga);
        $('#hidung').val(anamnesa.hidung);
        $('#tenggorok').val(anamnesa.tenggorok);
        $('#mata').val(anamnesa.mata);
        $('#kulit-kelamin').val(anamnesa.kulit_kelamin);
        $('#usul-tindak-lanjut').val(anamnesa.usul_tindak_lanjut);

        if (anamnesa.pupil_dbn === 'on') {
            $('#pupil-other').attr('checked', true).change();
            $('#pupil-bentuk').val(anamnesa.pupil_bentuk);
            $('#pupil-ukuran').val(anamnesa.pupil_ukuran);
            $('#pupil-reflek-cahaya').val(anamnesa.pupil_reflek_cahaya);
        } else {
            $('#pupil-dbn').change();
            $('#pupil-other').attr('checked', false);
            $('#pupil-bentuk').val('');
            $('#pupil-ukuran').val('');
            $('#pupil-reflek-cahaya').val('');
        }

        if (anamnesa.nervi_cranialis_dbn === 'on') {
            $('#nervi-cranialis-other').attr('checked', true).change();
            $('#nervi-cranialis-paresis').val(anamnesa.nervi_cranialis_paresis);
        } else {
            $('#nervi-cranialis-dbn').change();
            $('#nervi-cranialis-other').attr('checked', false);
            $('#nervi-cranialis-paresis').val('');
        }

        $('#rf-kiri-atas').val(anamnesa.rf_kiri_atas);
        $('#rf-kiri-bawah').val(anamnesa.rf_kiri_bawah);
        $('#rf-kanan-atas').val(anamnesa.rf_kanan_atas);
        $('#rf-kanan-bawah').val(anamnesa.rf_kanan_bawah);

        if (anamnesa.sensorik_dbn === 'on') {
            $('#sensorik-other').attr('checked', true).change();
            $('#sensorik-lain').val(anamnesa.sensorik_lain);
        } else {
            $('#sensorik-dbn').change();
            $('#sensorik-other').attr('checked', false);
            $('#sensorik-lain').val('');
        }

        $('#pemeriksaan-khusus').val(anamnesa.pemeriksaan_khusus);

        if (anamnesa.trm_dbn === 'on') {
            if (anamnesa.trm_kaku_kuduk !== null) {
                $('#trm-other-one').attr('checked', true).change();
                $('#trm-kaku-kuduk').val(anamnesa.trm_kaku_kuduk);
            } else if (anamnesa.trm_laseque !== null) {
                $('#trm-other-two').attr('checked', true).change();
                $('#trm-laseque').val(anamnesa.trm_laseque);
            } else if (anamnesa.trm_kerning !== null) {
                $('#trm-other-three').attr('checked', true).change();
                $('#trm-kerning').val(anamnesa.trm_kerning);
            }
        } else {
            $('#trm-dbn').change();
            $('#trm-kaku-kuduk, #trm-laseque, #trm-kerning').val('');
        }

        $('#motorik-kiri-atas').val(anamnesa.motorik_kiri_atas);
        $('#motorik-kiri-bawah').val(anamnesa.motorik_kiri_bawah);
        $('#motorik-kanan-atas').val(anamnesa.motorik_kanan_atas);
        $('#motorik-kanan-bawah').val(anamnesa.motorik_kanan_bawah);
        $('#reflek-patologis').val(anamnesa.reflek_patologis);
        $('#otonom').val(anamnesa.otonom);
        $('#riwayat-kelahiran').val(anamnesa.riwayat_kelahiran);
        $('#riwayat-imunisasi').val(anamnesa.riwayat_imunisasi);
        $('#riwayat-nutrisi').val(anamnesa.riwayat_nutrisi);
        $('#riwayat-tumbuh-kembang').val(anamnesa.riwayat_tumbuh_kembang);
        if (kode === 'asli') {
            $('#kritik').val(anamnesa.kritik);
            $('#saran').val(anamnesa.saran);
        }
    }

    function showAnamnesaOkupasi(anamnesa, kode) {
        $('#keluhan-utama').val(anamnesa.keluhan_utama);
        $('#riwayat-penyakit-keluarga').val(anamnesa.riwayat_penyakit_keluarga);
        $('#riwayat-penyakit-sekarang').val(anamnesa.riwayat_penyakit_sekarang);
        $('#riwayat-penyakit-dahulu').val(anamnesa.riwayat_penyakit_dahulu);
        $('#anamnesa-sosial').val(anamnesa.anamnesa_sosial);

        $('#keadaan-umum').val(anamnesa.keadaan_umum);
        $('#kesadaran').val(anamnesa.kesadaran);
        $('#gcs').val(anamnesa.gcs);
        $('#alergi').val(anamnesa.alergi);
        $('#tensi-sistolik').val(anamnesa.tensi_sistolik);
        $('#tensi-diastolik').val(anamnesa.tensi_diastolik);
        $('#suhu').val(anamnesa.suhu);
        $('#nadi').val(anamnesa.nadi);
        $('#tinggi-badan').val(anamnesa.tinggi_badan);
        $('#berat-badan').val(anamnesa.berat_badan);
        $('#rr').val(anamnesa.rr);
        $('#nps').val(anamnesa.nps);

        $('#kepala').val(anamnesa.kepala);
        $('#leher').val(anamnesa.leher);
        $('#thorax').val(anamnesa.thorax);
        $('#pulmo').val(anamnesa.pulmo);
        $('#cor').val(anamnesa.cor);
        $('#abdomen').val(anamnesa.abdomen);
        $('#genitalia').val(anamnesa.genitalia);
        $('#ekstrimitas').val(anamnesa.ekstrimitas);
        $('#pemeriksaan-penunjang').val(anamnesa.pemeriksaan_penunjang);
        $('#prognosis').val(anamnesa.prognosis);
        $('#status-mentalis').val(anamnesa.status_mentalis);
        $('#lingkar-kepala').val(anamnesa.lingkar_kepala);
        $('#status-gizi').val(anamnesa.status_gizi).change();
        $('#telinga').val(anamnesa.telinga);
        $('#hidung').val(anamnesa.hidung);
        $('#tenggorok').val(anamnesa.tenggorok);
        $('#mata').val(anamnesa.mata);
        $('#kulit-kelamin').val(anamnesa.kulit_kelamin);
        $('#usul-tindak-lanjut').val(anamnesa.usul_tindak_lanjut);

        if (anamnesa.pupil_dbn === 'on') {
            $('#pupil-other').attr('checked', true).change();
            $('#pupil-bentuk').val(anamnesa.pupil_bentuk);
            $('#pupil-ukuran').val(anamnesa.pupil_ukuran);
            $('#pupil-reflek-cahaya').val(anamnesa.pupil_reflek_cahaya);
        } else {
            $('#pupil-dbn').change();
            $('#pupil-other').attr('checked', false);
            $('#pupil-bentuk').val('');
            $('#pupil-ukuran').val('');
            $('#pupil-reflek-cahaya').val('');
        }

        if (anamnesa.nervi_cranialis_dbn === 'on') {
            $('#nervi-cranialis-other').attr('checked', true).change();
            $('#nervi-cranialis-paresis').val(anamnesa.nervi_cranialis_paresis);
        } else {
            $('#nervi-cranialis-dbn').change();
            $('#nervi-cranialis-other').attr('checked', false);
            $('#nervi-cranialis-paresis').val('');
        }

        $('#rf-kiri-atas').val(anamnesa.rf_kiri_atas);
        $('#rf-kiri-bawah').val(anamnesa.rf_kiri_bawah);
        $('#rf-kanan-atas').val(anamnesa.rf_kanan_atas);
        $('#rf-kanan-bawah').val(anamnesa.rf_kanan_bawah);

        if (anamnesa.sensorik_dbn === 'on') {
            $('#sensorik-other').attr('checked', true).change();
            $('#sensorik-lain').val(anamnesa.sensorik_lain);
        } else {
            $('#sensorik-dbn').change();
            $('#sensorik-other').attr('checked', false);
            $('#sensorik-lain').val('');
        }

        $('#pemeriksaan-khusus').val(anamnesa.pemeriksaan_khusus);

        if (anamnesa.trm_dbn === 'on') {
            if (anamnesa.trm_kaku_kuduk !== null) {
                $('#trm-other-one').attr('checked', true).change();
                $('#trm-kaku-kuduk').val(anamnesa.trm_kaku_kuduk);
            } else if (anamnesa.trm_laseque !== null) {
                $('#trm-other-two').attr('checked', true).change();
                $('#trm-laseque').val(anamnesa.trm_laseque);
            } else if (anamnesa.trm_kerning !== null) {
                $('#trm-other-three').attr('checked', true).change();
                $('#trm-kerning').val(anamnesa.trm_kerning);
            }
        } else {
            $('#trm-dbn').change();
            $('#trm-kaku-kuduk, #trm-laseque, #trm-kerning').val('');
        }

        $('#motorik-kiri-atas').val(anamnesa.motorik_kiri_atas);
        $('#motorik-kiri-bawah').val(anamnesa.motorik_kiri_bawah);
        $('#motorik-kanan-atas').val(anamnesa.motorik_kanan_atas);
        $('#motorik-kanan-bawah').val(anamnesa.motorik_kanan_bawah);
        $('#reflek-patologis').val(anamnesa.reflek_patologis);
        $('#otonom').val(anamnesa.otonom);
        $('#riwayat-kelahiran').val(anamnesa.riwayat_kelahiran);
        $('#riwayat-imunisasi').val(anamnesa.riwayat_imunisasi);
        $('#riwayat-nutrisi').val(anamnesa.riwayat_nutrisi);
        $('#riwayat-tumbuh-kembang').val(anamnesa.riwayat_tumbuh_kembang);
        if (kode === 'asli') {
            $('#kritik').val(anamnesa.kritik);
            $('#saran').val(anamnesa.saran);
        }
    }

    function showTindakanBiasa(data) {
        $('#table-tindakan tbody').empty();
        if (data !== null) {
            let waktu = '';
            let btnHapus = '';
            let btnDokter = '';
            let btnItemPaket = '';

            $.each(data, function(i, v) {
                num = ++i;
                waktu = ((v.tanggal !== null) ? datetimefmysql(v.tanggal) : '');
                operator = v.operator;
                btn_disabled = '';
                btn_waktu =
                    `class="pointer" onclick="editWaktuTindakan('${v.id}', '${waktu}')" title="Klik untuk mengedit waktu entri tindakan" style="text-decoration: underline"`;
                btn_operator =
                    `class="pointer" onclick="editOperator(${v.id})" title="Klik untuk mengedit operator" style="text-decoration: underline"`;
                list_tindakan = `${v.layanan}&nbsp;${(v.keterangan !== null ? v.keterangan : '')}`;
                list_tindakan_icd9 = `${(v.icd9 !== null ? v.icd9 : '')}`;
                jumlah = '1';
                tarif = `${numberToCurrency(v.total)}`;
                users = v.nama_users;

                if (v.log != '0') {
                    num = `<s> ${num} </s>`;
                    waktu = `<s> ${waktu} </s>`;
                    operator = `<s> ${operator} </s>`;
                    btn_disabled = `disabled`;
                    btn_waktu = ``;
                    btn_operator = ``;
                    list_tindakan = `<s> ${list_tindakan} </s>`;
                    jumlah = `<s> ${jumlah} </s>`;
                    tarif = `<s> ${tarif} </s>`;
                    users = `<s> ${users} </s>`;

                }

                if (v.id_history_pembayaran === null) {
                    btnHapus =
                        `<button type="button" class="btn btn-secondary btn-xxs" ${btn_disabled} onclick="removeTindakan(this, ${v.id})"><i class="fas fa-trash-alt"></i></button>`;
                }

                let account_group = '<?= $this->session->userdata('account_group') ?>';
                if ($('#tindaklanjut').val() !== '' && account_group !== 'Admin') {
                    btnHapus = ``;
                }

                if (v.id_parent_layanan === '121') {
                    btnItemPaket =
                        `<button type="button" class="btn btn-secondary btn-xxs" ${btn_disabled} onclick="showItemPaket(${v.id_layanan_tarif})"> Item Paket</button>`;
                } else {
                    btnItemPaket = '';
                }

                btnDokter = `<span ${btn_operator}>${operator}</span>`;
                // </?php //else : ?>
                // <td class="center">${waktu}</td> *INI IF STATMENT YG DIBAWAH*
                let html = /* html */ `
                    <tr>
                        <td class="number-tindakan" align="center">${num}</td>
                        
                        </?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                        <td class="center"><span ${btn_waktu}>${waktu}</span></td>
                        
                        </?php endif ?>
                        
                        <td>${btnDokter}</td>
                        <td>${list_tindakan}</td>
                        <td>${list_tindakan_icd9}</td>
                        <td class="center">${jumlah}</td>
                        <td class="right">${tarif}</td>
                        <td>${users}</td>
                        <td class="right">${btnItemPaket}</td>
                        <td class="left">${btnHapus}</td>
                    </tr>
                `;

                // <input type="hidden" name="item_lab[]" value="${JSON.stringify(v.item_lab)}">
                //             <button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="top" data-title="Item Pemeriksaan Lab" data-content="ini datanya">Show</button>

                $('#table-tindakan tbody').append(html);
            });
        }
    }

    function showItemPaket(id_layanan_tarif) {
        $('#table_item_paket tbody').empty();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("medical_check_up/api/medical_check_up/data_item_paket") ?>/id/' + id_layanan_tarif,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                let dataitem = data.item;
                if (dataitem !== null) {
                    $('#item_paket_modal').modal('show');
                    $.each(dataitem, function(i, v) {
                        let html = /* html */ `
                            <tr>
                                <td class="number-tindakan" align="center">${++i}</td>
                                <td class="left">${v.nama}</td>
                            </tr>
                        `;
                        $('#table_item_paket tbody').append(html);
                    });
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

    // function showTindakan(data) {
    //     $('#table-tindakan tbody').empty();		

    //     if (data !== null) {                        
    //         $.each(data, function(i, v) {                 
    //             $('#s2id_paket a .select2c-chosen').html(v.nama_paket);
    // 			$('#id-paket').val(v.id_paket);

    //             let html = /* html */ `
    //                 <tr>
    //                     <td class="center">${++i}</td>                        
    //                     <td class="center">${v.nama_tindakan}</td>
    //                     <td class="center">${v.nama_kelas}</td>
    // 					<td class="center">${v.nama_unit}</td>
    // 					<td class="center">${v.nama_jenis_pemeriksaan}</td>
    //                 </tr>
    //             `;

    //             $('#table-tindakan tbody').append(html);
    //         });
    //     }
    // }

    function addTindakanMCU() {

        let account_group = '<?= $this->session->userdata('account_group') ?>';
        if (($('#tindaklanjut').val() !== '' && account_group !== 'Admin') && ($('#tindaklanjut').val() !== 'cco sementara') && ($('#tindaklanjut').val() !== 'cco sementara it') && ($('#tindaklanjut').val() !== 'cco sementara billing')) {
            syams_validation('#tambah-tindakan', 'Pasien sudah pulang, tidak dapat input tindakan.');
            return false;
        }

        if ($('#operator').val() === '') {
            syams_validation('#operator', 'Kolom dokter harus diisi.');
            return false;
        }

        if ($('#tindakan').val() === '') {
            syams_validation('#tindakan', 'Kolom tindakan harus diisi.');
            return false;
        }

        let html = '';
        let tindakan = '';
        let id_tindakan = '';
        let qty = $('#jumlah-tindakan').val();
        let number = $('.number-tindakan').length;
        let operator = $('#s2id_operator a .select2c-chosen').html();
        let id_operator = $('#operator').val();
        let tarif_item = $('#tarif-tindakan').val();
        let tarif = parseInt(tarif_item) * parseInt(qty);

        let tindakan_icd9 = $('#s2id_tindakan-icd9 a .select2c-chosen').html();
        let id_tindakan_icd9 = $('#tindakan-icd9').val();
        if (typeof id_tindakan_icd9 == 'undefined' || id_tindakan_icd9 == 'undefined') {
            tindakan_icd9 = '';
            id_tindakan_icd9 = '';
        }

        if ($('#tindakan-paket').val() > 0) {
            //Tindakan Lain
            tindakan = $('#s2id_tindakan-lain a .select2c-chosen').html();
            id_tindakan = $('#tindakan-lain').val();

        } else {
            //Tindakan Biasa
            tindakan = $('#s2id_tindakan-biasa a .select2c-chosen')
                .html(); // $('#tindakan_biasa').val(); //$('#s2id_tindakan a .select2c-chosen').html();
            id_tindakan = $('#tindakan-biasa').val(); // $('#tindakan').val();
        }

        html = /* html */ `
            <tr>
                <td class="number-tindakan" align="center">${++number}</td>
                <td class="center"></td>
                <td><input type="hidden" name="id_operator[]" value="${id_operator}">${operator}</td>
                <td><input type="hidden" name="id_tindakan[]" value="${id_tindakan}">${tindakan}</td>
                <td><input type="hidden" name="id_tindakan_icd9[]" value="${id_tindakan_icd9}">${tindakan_icd9}</td>
                <td><input type="text" name="qty[]" id="qty${number}" value="${qty}" class="jumlah custom-form col-lg-5 mx-auto" style="text-align: center"></td>
                <td class="center"><input type="hidden" id="trfh${number}" value="${tarif_item}" style="text-align: right"><span id="trf${number}">${numberToCurrency(tarif)}</span></td>
                <td><?= $this->session->userdata("nama") ?></td>
                <td align="right">
                   
                </td>
                <td align="right">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#table-tindakan tbody').append(html);
        $('#qty' + number).keyup(function() {
            let jml = $(this).val();
            let trf = $('#trfh' + number).val();
            if (jml !== '') {
                $('#trf' + number).html(numberToCurrency(parseInt(trf) * parseInt(jml)));
            }
        });

        $('#jumlah-tindakan').val(1);
        $('#tindakan-lain, #tindakan-biasa, #tindakan-icd9, #tarif-tindakan').val('');
        // $('#tindakan_lain, #tindakan_biasa, #tarif_tindakan').val('');
        $('#s2id_tindakan a .select2c-chosen').html('');
        $('#s2id_tindakan-lain a .select2c-chosen').html('');
        $('#s2id_tindakan-biasa a .select2c-chosen').html('');
        $('#s2id_tindakan-icd9 a .select2c-chosen').html('');
        // updateScroll('tindakan-scroll');
    }

    function choosePaket() {
        var idPaket = $('#id-paket').val();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("paket_mcu/api/paket_mcu/get_detail") ?>/id_paket/' + idPaket,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#table-tindakan tbody').empty();

                $.each(data, function(i, v) {
                    let j = $('.tr-rows').length + 1;
                    let html = /* html */ `
						<tr class="tr-rows">
							<td class="center">${j}</td>
							<td class="center">${v.nama_tindakan}</td>
							<td class="center">${v.nama_kelas}</td>
							<td class="center">${v.nama_unit}</td>
							<td class="center">${v.nama_jenis_pemeriksaan}</td>			
						</tr>
					`;

                    $('#table-tindakan tbody').append(html);
                });
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }

    function saveNewDiagnosa() {
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
                        savePemeriksaan(); //Tindakan Biasa
                        // save(); // Tindakan Paket
                    }
                }
            }
        });
    }



    
    // MRM
    function cetakHasilMCU(id_pendaftaran, id_layanan, no_rm) {
        const url = `<?= base_url('medical_check_up/cetak_surat_hrm_dompdf/') ?>${id_pendaftaran}/${id_layanan}/${no_rm}`;

        // Membuka URL di tab baru, tanpa pengaturan tambahan untuk ukuran atau posisi jendela
        window.open(url, '_blank');
    }







    function savePemeriksaan() {
        let jumlah = $('.number-tindakan').length;
        let id_anam_asli = $('#id-anamnesa-asli').val();
        let id_anam_pilih = $('#id-anamnesa-pilih').val();

        if (jumlah === 0) {
            swalAlert('warning', 'Validasi', 'Belum ada tindakan yang dipilih.');
            return false;
        }

        if (id_anam_asli !== id_anam_pilih) {
            if (id_anam_pilih !== '') {
                swalAlert('warning', 'Validasi', 'Pilih List Anamnesis sesuai tempat layanan.');
                return false;
            }
        }

        // if (id_anam_pilih !== '' ){
        //     swalAlert('warning', 'Validasi', 'Pilih List Anamnesis sesuai tempat layanan.');
        // 	return false;    
        // } 
        // else if (id_anam_pilih !== '' && id_anam_asli !== id_anam_pilih) {
        //     swalAlert('warning', 'Validasi', 'Pilih List Anamnesis sesuai tempat layanan.');
        // 	return false;
        // }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('medical_check_up/api/medical_check_up/simpan_pemeriksaan_mcu') ?>',
            data: $('#form-pemeriksaan').serialize() + '&jenis_layanan=MCU',
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    $('#modal-pemeriksaan').modal('hide');
                    getListPemeriksaan(1);
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT.', 'Error');
            }
        });
    }

    function save() {
        let jumlah = $('.tr-rows').length;
        if (jumlah === 0) {
            swalAlert('warning', 'Validasi', 'Belum ada paket yang dipilih.');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('medical_check_up/api/medical_check_up/store') ?>',
            data: $('#form-pemeriksaan').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    $('#modal-pemeriksaan').modal('hide');
                    getListPemeriksaan(1);
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

    function request_lab() {
        let account_group = '<?= $this->session->userdata('account_group') ?>';
        if (($('#tindaklanjut').val() !== '' && account_group !== 'Admin') && ($('#tindaklanjut').val() !== 'cco sementara') && ($('#tindaklanjut').val() !== 'cco sementara it') && ($('#tindaklanjut').val() !== 'cco sementara billing')) {
            syams_validation('#tambah-lab', 'Pasien sudah pulang, tidak dapat order Laboratorium.');
            return false;
        }

        $('#id_layanan_asal').val($('#id-layanan').val());
        $('#modal-lab-label').html('Permintaan Pemeriksaan Laboratorium');
        $('#tindakan_laboratorium, #tarif_tindakan_lab').val('');
        $('#s2id_tindakan_laboratorium a .select2-chosen').html('');
        $('#dokter_rujuk').val($('#dokter').val());
        $('#s2id_dokter_rujuk a .select2-chosen').html($('#s2id_dokter a .select2c-chosen').html());
        $('#lab_modal').modal('show');
        $('#table-lab tbody').empty();
        klik = null;
    }

    function request_rad() {
        let account_group = '<?= $this->session->userdata('account_group') ?>';
        if (($('#tindaklanjut').val() !== '') && (account_group !== 'Admin') && ($('#tindaklanjut').val() !== 'cco sementara') && ($('#tindaklanjut').val() !== 'cco sementara it') && ($('#tindaklanjut').val() !== 'cco sementara billing')) {
            syams_validation('#tambah-rad', 'Pasien sudah pulang, tidak dapat order Radiologi.');
            return false;
        }

        $('#id_layanan_asal_rad').val($('#id-layanan').val());
        $('#modal-rad-label').html('Permintaan Pemeriksaan Radiologi');
        $('#tindakan_radiologi, #tarif_tindakan_rad').val('');
        $('#s2id_tindakan_radiologi a .select2-chosen').html('');
        $('#dokter_rujuk_rad').val($('#dokter').val());
        $('#s2id_dokter_rujuk_rad a .select2-chosen').html($('#s2id_dokter a .select2c-chosen').html());
        $('#rad_modal').modal('show');
        $('#table-rad tbody').empty();
        klik = null;
    }

    function show_item_laboratorium(id_layanan) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_item_laboratorium") ?>/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.status) {
                    if (data.data.length > 0) {
                        $('#table_item_lab tbody').empty();
                        var checked = '';
                        if (data.data.length === 1) {
                            checked = 'checked';
                        };
                        $.each(data.data, function(i, v) {

                            var highlight = 'odd';
                            if ((i % 2) == 1) {
                                highlight = 'even';
                            };

                            str = '<tr class="' + highlight + '">' +
                                '<td align="center"><b>' + (i + 1) + '</b></td>' +
                                '<td align="center">' + v.item + '</td>' +
                                '<td align="right" class="aksi">' +
                                '<input type="checkbox" ' + checked + ' name="itemdata" value="' + v
                                .id + '|' + v.item + '" class="check_item_lab" />';
                            '</td>' +
                            '</tr>;'
                            $('#table_item_lab tbody').append(str);

                        });
                        if (checked === 'checked') {
                            simpan_item_lab();
                        } else {
                            $('#item_lab_modal').modal('show');
                        }
                    } else {
                        messageCustom(data.message, 'Info');
                    }
                } else {
                    messageCustom(data.message, 'Info');
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function simpan_item_lab() {
        var formitemlab = $('#formitemlab').serializeArray();
        var str = '[';
        var str_label = '';
        var buf = null;
        if (formitemlab.length > 0) {
            $.each(formitemlab, function(i, v) {
                buf = v.value.split('|');
                str += buf[0];
                str_label += buf[1];
                if (i < (formitemlab.length - 1)) {
                    str += ',';
                    str_label += ', ';
                };
            });
            str += ']';

            $('#hd_item_lab').val(str);
            $('#hd_item_lab_label').val(str_label);
            $('#item_lab_modal').modal('hide');
        } else {
            bootbox.dialog({
                message: "Anda belum memilih item pemeriksaan laboratorium!",
                title: "Peringatan!",
                buttons: {
                    hapus: {
                        label: '<i class="fa fa-check"></i>  OK',
                        className: "btn-primary",
                        callback: function() {

                        }
                    }
                }
            });
        }
    }

    function check_all() {
        $(".check_item_lab").each(function() {
            $(this).attr("checked", 'checked');
        });
    }

    function uncheck_all() {
        $(".check_item_lab").each(function() {
            $(this).removeAttr('checked');
        });
    }

    function add_laboratorium() {

        var stop = false;
        var is_cito = 'tidak';
        var checked = '';
        if ($('#is_cito_lab').is(':checked')) {
            checked = '&checkmark;';
            is_cito = 'ya';
        };

        if ($('#tindakan_laboratorium').val() === '') {
            syams_validation('#tindakan_laboratorium', 'Pemeriksaan harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        var str = '';
        var numb = $('.number_tindakan_lab').length;

        var tindakan = $('#s2id_tindakan_laboratorium a .select2-chosen').html();
        var id_tindakan = $('#tindakan_laboratorium').val();
        var tarif = $('#tarif_tindakan_lab').val();
        var itemdata = $('#hd_item_lab').val();
        var itemlabel = $('#hd_item_lab_label').val();

        if (tarif === '') {
            tarif = 0;
        };
        str = '<tr>' +
            '<td class="number_tindakan_lab" align="center">' + (++numb) + '</td>' +
            '<td align="center"><input type="hidden" name="tindakan_lab[]" value="' + id_tindakan + '"/>' + tindakan +
            '</td>' +
            '<td align="center"><input type="hidden" name="item_lab_label[]" value="' + itemlabel + '" />' + itemlabel +
            '</td>' +
            '<td align="center"><input type="hidden" name="item_lab[]" value="' + itemdata + '" />' + numberToCurrency(
                tarif) + '</td>' +
            '<td align="center"><input type="hidden" name="cito[]" value="' + is_cito + '" />' + checked + '</td>' +
            '<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-fw fa-trash-alt"></i></button>' +
            '</tr>';

        $('#table-lab tbody').append(str);
        $('#is_cito_lab').removeAttr(':checked');
        $('#s2id_tindakan_laboratorium a .select2-chosen').html('');
        $('#hd_item_lab').val('');
        $('#hd_item_lab_label').val('');
    }

    function hapus_list(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function add_radiologi() {
        var stop = false;
        var is_cito = 'tidak';
        var checked = '';
        if ($('#is_cito_rad').is(':checked')) {
            checked = '&checkmark;';
            is_cito = 'ya';
        };

        if ($('#tindakan_radiologi').val() === '') {
            syams_validation('#tindakan_radiologi', 'Pemeriksaan harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        var str = '';
        var numb = $('.number_tindakan_rad').length;

        var tindakan = $('#s2id_tindakan_radiologi a .select2-chosen').html();
        var id_tindakan = $('#tindakan_radiologi').val();
        var tarif = $('#tarif_tindakan_rad').val();
        var itemdata = $('#hd_item_rad').val();
        var itemlabel = $('#hd_item_rad_label').val();

        if (tarif === '') {
            tarif = 0;
        };
        str = '<tr>' +
            '<td class="number_tindakan_rad" align="center">' + (++numb) + '</td>' +
            '<td align="center"><input type="hidden" name="tindakan_rad[]" value="' + id_tindakan + '"/>' + tindakan +
            '</td>' +
            '<td align="center"><input type="hidden" name="item_rad_label[]" value="' + itemlabel + '" />' + itemlabel +
            '</td>' +
            '<td align="center"><input type="hidden" name="item_rad[]" value="' + itemdata + '" />' + numberToCurrency(
                tarif) + '</td>' +
            '<td align="center"><input type="hidden" name="cito[]" value="' + is_cito + '" />' + checked + '</td>' +
            '<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-fw fa-trash-alt"></i></button>' +
            '</tr>';

        $('#table-rad tbody').append(str);
        $('#is_cito_rad').removeAttr('checked');
    }

    function simpan_request_lab() {
        var id_layanan_pendaftaran = $('#id_layanan_asal').val();
        var id_dokter = $('#dokter_rujuk').val();
        var stop = false;

        if (id_dokter === '') {
            syams_validation('#dokter_rujuk', 'Dokter harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        if ((id_layanan_pendaftaran !== '') & (id_dokter != '')) {
            if (klik === null) {
                klik = $.ajax({
                    type: 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/order_laboratorium") ?>/',
                    data: $('#formlab').serialize() + '&id_layanan=' + id_layanan_pendaftaran + '&dokter=' +
                        id_dokter,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {
                        var tipe = 'Success';
                        if (data.status === false) {
                            tipe = 'error';
                        }
                        messageCustom(data.message, tipe);

                        $('input[type=checkbox]').removeAttr('checked');
                        $('#lab_modal').modal('hide');
                        get_pemeriksaan_lab(id_layanan_pendaftaran);
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Gagal order pemeriksaan laboratorium', 'Error');
                    }
                });
            }
        } else {
            messageCustom('info', 'Informasi', 'Pilih dulu dokter', '');
        }

    }

    function get_pemeriksaan_lab(id_layanan) {
        $('#req_lab').empty();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_laboratorium_detail") ?>/id/' + id_layanan,
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    var str = '';
                    $.each(data, function(i, v) {
                        var hapus_lab = '';
                        if (v.waktu_hasil === null) {};

                        str = '<table class="table table-sm table-detail table-striped">' +
                            '<tr><td width="15%"><strong>Waktu Order</strong></td><td>' + ((v
                                .waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '') +
                            '</td></tr>' +
                            '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>' + ((v
                                .waktu_hasil !== null) ? datetimefmysql(v.waktu_hasil) : '') +
                            '</td></tr>' +
                            '<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>' + v.dokter +
                            '</td></tr>' +
                            '<tr><td width="15%"><strong>Analis Laboratorium</strong></td><td>' + v
                            .analis_lab + '</td></tr>' +
                            '<tr><td width="15%"></td>' +
                            '<td><button title="Klik untuk melihat order laboratorium" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetak_pemeriksaan_laboratorium(' +
                            v.id + ')"><i class="fa fa-print"></i> Nota Order</button>' +
                            '<button title="Klik untuk melihat hasil laboratorium" type="button" class="btn btn-secondary btn-xxs" onclick="cetak_hasil_laboratorium(' +
                            v.id + ')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>' +
                            '</tr>' +
                            hapus_lab +
                            '</table>';
                        $('#req_lab').append(str);

                        str =
                            '<table class="table table-hover table-striped table-sm color-table info-table">' +
                            '<thead><tr>' +
                            '<th width="15%" class="left">Layanan</th>' +
                            '<th width="40%" class="left"></th>' +
                            '<th width="40%" class="left">Status</th>' +
                            '<th align="center" width="5%"></th>' +
                            '</tr></thead><tbody>';


                        $.each(v.detail, function(j, x) {
                            str += '<tr>' +
                                '<td><b>' + j + '</b></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>';

                            var hapus = '';
                            $.each(x, function(k, z) {
                                if (z.status == 'Belum') {
                                    //hapus = '<button type="button" class="btn btn-default btn-xs" onclick="hapus_detail_lab(this, '+z.id+')"><i class="fa fa-trash-o"></i></button>';
                                };
                                str += '<tr>' +
                                    '<td></td>' +
                                    '<td>' + z.layanan_lab + '</td>' +
                                    '<td>' + z.konfirmasi + '</td>' +
                                    '<td align="center">' + hapus + '</td>' +
                                    '</tr>';
                            });
                        });

                        str += '</tbody></table><br/><hr/>';
                        $('#req_lab').append(str);
                    });

                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function simpan_request_rad() {
        var id_layanan_pendaftaran = $('#id_layanan_asal_rad').val();
        var id_dokter = $('#dokter_rujuk_rad').val();
        var stop = false;

        if (id_dokter === '') {
            syams_validation('#dokter_rujuk_rad', 'Dokter harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        if ((id_layanan_pendaftaran !== '') & (id_dokter != '')) {
            if (klik === null) {
                klik = $.ajax({
                    type: 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/order_radiologi") ?>/',
                    data: $('#formrad').serialize() + '&id_layanan=' + id_layanan_pendaftaran + '&dokter=' +
                        id_dokter,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {
                        var tipe = 'Success';
                        if (data.status === false) {
                            tipe = 'Error';
                        }

                        messageCustom(data.message, tipe);

                        $('input[type=checkbox]').removeAttr('checked');
                        $('#rad_modal').modal('hide');
                        get_pemeriksaan_rad(id_layanan_pendaftaran);
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Gagal order pemeriksaan Radiologi', 'Error');
                    }
                });
            }
        } else {
            messageCustom('Dokter Harus Dipilih', 'Info');
        }

    }

    function get_pemeriksaan_rad(id_layanan) {
        $('#req_rad').empty();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_radiologi_detail") ?>/id/' + id_layanan,
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    var str = '';
                    $.each(data, function(i, v) {
                        var hapus_rad = '';
                        if (v.waktu_hasil === null) {};

                        str = '<table class="table table-sm table-detail table-striped">' +
                            '<tr><td width="15%"><strong>Waktu Order</strong></td><td>' + ((v
                                .waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '') +
                            '</td></tr>' +
                            '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>' + ((v
                                .waktu_hasil !== null) ? datetimefmysql(v.waktu_hasil) : '') +
                            '</td></tr>' +
                            '<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>' + v.dokter +
                            '</td></tr>' +
                            '<tr><td width="15%"><strong>Radiografer</strong></td><td>' + v
                            .radiografer + '</td></tr>' +
                            '<tr><td width="15%"></td>' +
                            '<td><button title="Klik untuk melihat order radiologi" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetak_pemeriksaan_radiologi(' +
                            v.id + ')"><i class="fa fa-print"></i> Nota Order</button>' +
                            '<button title="Klik untuk melihat hasil radiologi" type="button" class="btn btn-secondary btn-xxs" onclick="cetak_hasil_radiologi(' +
                            v.id + ')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>' +
                            '</tr>' +
                            hapus_rad +
                            '</table>';
                        $('#req_rad').append(str);

                        str =
                            '<table class="table table-hover table-striped table-sm color-table info-table">' +
                            '<thead><tr>' +
                            '<th width="15%" class="left">Layanan</th>' +
                            '<th width="40%" class="left"></th>' +
                            '<th width="40%" class="left">Status</th>' +
                            '<th align="center" width="5%"></th>' +
                            '</tr></thead><tbody>';


                        $.each(v.detail, function(j, x) {
                            str += '<tr>' +
                                '<td><b>' + j + '</b></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>';

                            var hapus = '';
                            $.each(x, function(k, z) {
                                if (z.status == 'Belum') {
                                    //hapus = '<button type="button" class="btn btn-default btn-xs" onclick="hapus_detail_lab(this, '+z.id+')"><i class="fa fa-trash-o"></i></button>';
                                };
                                str += '<tr>' +
                                    '<td></td>' +
                                    '<td>' + z.layanan_radiologi + '</td>' +
                                    '<td>' + z.konfirmasi + '</td>' +
                                    '<td align="center">' + hapus + '</td>' +
                                    '</tr>';
                            });
                        });

                        str += '</tbody></table><br/><hr/>';
                        $('#req_rad').append(str);
                    });

                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function cetakFormMCU(id_pendaftaran, id_layanan_pendaftaran) {
        $('#modal_cetak_mcu').modal('show');
        $('#modal_cetak_mcu_label').html('Cetak Form Medical Check Up');

        $('#btn_skpk').click(function() {
            cetakSKPK(id_pendaftaran);
        });

        $('#btn_skpk_dinkes').click(function() {
            cetakSKDinkes(id_pendaftaran);
        });

        $('#btn_sks').click(function() {
            cetakSKS(id_pendaftaran, id_layanan_pendaftaran);
        });

        $('#btn_sbn').click(function() {
            cetakSBN(id_pendaftaran, id_layanan_pendaftaran);
        });

        $('#btn_mcu').click(function() {
            cetakResumeMedis(id_pendaftaran, id_layanan_pendaftaran);
        });

        // SKKJ1
        $('#btn_skkj_1').click(function() {
            cetakSKKJsatu(id_pendaftaran, id_layanan_pendaftaran);
        });

        // SKKJ2
        $('#btn_skkj_2').click(function() {
            cetakSKKJdua(id_pendaftaran, id_layanan_pendaftaran);
        });

        // SKKJ3
        $('#btn_skkj_3').click(function() {
            cetakSKKJtiga(id_pendaftaran, id_layanan_pendaftaran);
        });

        // skb
        $('#btn_kelaikan_bekerja').click(function() {
            cetakSkb(id_pendaftaran, id_layanan_pendaftaran);
        });

        // lpk
        $('#btn_lpk').click(function() {
            cetakLpk(id_pendaftaran, id_layanan_pendaftaran);
        });

        // SKM
        $('#btn_skm').click(function() {
            cetakSKM(id_pendaftaran, id_layanan_pendaftaran);
        });

        // SKD
        $('#btn_skd').click(function() {
            cetakSKD(id_pendaftaran, id_layanan_pendaftaran);
        });

        // SKTD
        $('#btn_sktd').click(function() {
            cetakSKTD(id_pendaftaran, id_layanan_pendaftaran);
        });

        // HPDO
        $('#btn_hpdo').click(function() {
            cetakHPDO(id_pendaftaran, id_layanan_pendaftaran);
        });

    }

    // SKPK
    function cetakSKPK(id_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/form_skpk') ?>/id_pendaftaran/' +
                id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first

                // Set values in Penolakan Tindakan Kedokteran modal
                resetFormSKPK();
                $('#id-pendaftaran-skpk').val(id_pendaftaran);
                $('#modal-form-skpk-title').html(
                    `<b>Surat Keterangan Pengujian Kesehatan </b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                $('#no-surat-skpk').val(data.form_skpk.no_surat);
                $('#tahun-surat-skpk').val(data.form_skpk.tahun_surat);
                $('#nama-pasien-skpk').val(data.pendaftaran_detail.pasien.nama);
                $('#nip-skpk').val(data.form_skpk.nip);
                $('#jenis-kelamin-skpk').val(data.pendaftaran_detail.pasien.kelamin);
                // $('#pekerjaan-skpk').val(data.pendaftaran_detail.pasien.pekerjaan);
                $('#gol-ruang-skpk').val(data.form_skpk.gol_ruang_skpk);
                $('#karpeg-skpk').val(data.form_skpk.karpeg);
                $('#nama-kecil-skpk').val(data.form_skpk.nama_kecil);
                $('#alamat-skpk').val(data.pendaftaran_detail.pasien.alamat);
                $('#salinan-hasil-satu').val(data.form_skpk.salinan_hasil_satu);
                $('#salinan-hasil-dua').val(data.form_skpk.salinan_hasil_dua);
                $('#salinan-hasil-tiga').val(data.form_skpk.salinan_hasil_tiga);
                $('#telah-diperiksa').val(data.form_skpk.telah_diperiksa);
                $('#tanggal-diperiksa-skpk').val(datefmysql(data.form_skpk.tanggal_diperiksa_skpk));
                $('#tanggal-waktu-surat').val(datefmysql(data.form_skpk.tanggal_surat));
                // $('#tanggal-waktu-surat').val(data.form_skpk.tanggal_surat);
                $('#dokter-penguji-kesehatan').val(data.form_skpk.id_dokter);
                $('#s2id_dokter-penguji-kesehatan a .select2c-chosen').html(data.form_skpk.nama_dokter);

                $('#modal_form_skpk').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // SKPK
    function resetFormSKPK() {
        // console.log('contoh Reset');  
        // $('#btn_skpk').unbind('click');
        // Reset seluruh form
        if ($('#form-skpk').length > 0) {
            $('#form-skpk')[0].reset();
        }
        // Atur ulang semua checkbox dan radio
        $("input[type='checkbox'], input[type='radio']").prop('checked', false);
        // Reset Select2 jika ada
        if ($('#dokter-penguji-kesehatan').length > 0) {
            $('#dokter-penguji-kesehatan').val(null).trigger('change');
        }
        // Reset nilai untuk elemen input teks lainnya
        $('#no-surat-skpk').val('');
        $('#nama-pasien-skpk').val('');
        $('#nip-skpk').val('');
        $('#pekerjaan-skpk').val('');
        $('#gol-ruang-skpk').val('');
        $('#karpeg-skpk').val('');       // Reset nama pasien
        $('#nama-kecil-skpk').val('');     
        $('#alamat-skpk').val('');             
        $('#salinan-hasil-satu').val('');             
        $('#salinan-hasil-dua').val('');             
        $('#salinan-hasil-tiga').val('');             
        $('#telah-diperiksa').val('');             
        $('#tanggal-waktu-surat').val('');                        
        $('#tanggal-diperiksa-skpk').val('');                        
    }


    function cetakSKDinkes(id_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/form_sk_dinkes') ?>/id_pendaftaran/' +
                id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#id-pendaftaran-sk-dinkes').val(id_pendaftaran);
                $('#modal-sk-dinkes-title').html(
                    `<b>Surat Keterangan Pengujian Kesehatan (KEMENKES) </b> | No. RM: ${data.pendaftaran_detail.pasien.no_register}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                $('#nama-pasien-sk-dinkes').val(data.pendaftaran_detail.pasien.nama);
                $('#jenis-kelamin-sk-dinkes').val(data.pendaftaran_detail.pasien.kelamin);
                $('#pekerjaan-sk-dinkes').val(data.pendaftaran_detail.pasien.pekerjaan);
                $('#alamat-sk-dinkes').val(data.pendaftaran_detail.pasien.alamat);
                $('#nip-sk-dinkes').val(data.sk_dinkes.nip);
                $('#nama-kecil-sk-dinkes').val(data.sk_dinkes.nama_kecil);
                $('#pekerjaan-sk-dinkes').val(data.pendaftaran_detail.pasien.pekerjaan);
                $('#gol-ruang-sk-dinkes').val(data.sk_dinkes.gol_ruang);
                $('#karpeg-sk-dinkes').val(data.sk_dinkes.karpeg);
                $('#salin-hasil-satu').val(data.sk_dinkes.salinan_satu);
                $('#salin-hasil-dua').val(data.sk_dinkes.salinan_dua);
                $('#salin-hasil-tiga').val(data.sk_dinkes.salinan_tiga);
                $('#tanggal-waktu-sk-dinkes').val(data.sk_dinkes.tanggal_surat_dinkes);
                $('#dokter-sk-dinkes').val(data.sk_dinkes.id_dokter_dinkes);
                $('#s2id_dokter-sk-dinkes a .select2c-chosen').html(data.sk_dinkes.nama_dokter);

                $('#modal_sk_dinkes').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function cetakSKS(id, id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/form_sk_sehat') ?>/id/' + id +
                '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#id-layanan-pendaftaran-sks').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-sks').val(id);
                $('#modal-sks-title').html(
                    `<b>Form Surat Keterangan Sehat</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                $('#nama-pasien-sks').val(data.pendaftaran_detail.pasien.nama);
                $('#jenis-kelamin-sks').val(data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' :
                    'Perempuan');
                $('#alamat-sks').val(data.pendaftaran_detail.pasien.alamat);
                $('#pekerjaan-sks').val(data.pendaftaran_detail.pasien.pekerjaan);
                $('#tanggal-lahir-sks').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#tinggi-badan-sks').val(data.sk_sehat.tinggi_badan);
                $('#berat-badan-sks').val(data.sk_sehat.berat_badan);
                $('#keterangan-surat-sks').val(data.sk_sehat.keterangan);
                $('#tensi-sistolik-sks').val(data.sk_sehat.tensi_sistolik);
                $('#tensi-diastolik-sks').val(data.sk_sehat.tensi_diastolik);
                $('#nadi-sks').val(data.sk_sehat.nadi);
                $('#pernafasan-sks').val(data.sk_sehat.rr);
                // $('#keterangan-surat-sks').val(data.sk_sehat.keterangan_surat_sks);
                $('#catatan-sks').val(data.sk_sehat.catatan_sks);
                $('#hasil-pemeriksaan-sks').val(data.sk_sehat.hasil_pemeriksaan);
                $('#no-surat-sks').val(data.sk_sehat.no_surat_sks);
                $('#tahun-surat-sks').val(data.sk_sehat.tahun_surat_sks);
                $('#dokter-sks').val(data.sk_sehat.id_dokter_sks);
                $('#s2id_dokter-sks a .select2c-chosen').html(data.sk_sehat.nama_dokter);
                $('#tanggal-periksa-sks').val(datefmysql(data.sk_sehat.tanggal_periksa_sks));
                $('#sip_mcu').prop('checked', true);
                $('#nip_mcu').prop('checked', true);

                $('#modal_sks').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function cetakSBN(id, id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/surat_bebas_narkoba') ?>/id/' + id +
                '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#id-layanan-pendaftaran-sbn').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-sbn').val(id);
                $('#modal-surat-narkoba-title').html(
                    `<b>Form Surat Keterangan Bebas Narkoba</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                $('#no-surat-sbn').val(data.surat_narkoba.no_surat);
                $('#tahun-surat-sbn').val(data.surat_narkoba.tahun_surat);
                $('#nama-pasien-surat-narkoba').val(data.pendaftaran_detail.pasien.nama);
                $('#jenis-kelamin-surat-narkoba').val(data.pendaftaran_detail.pasien.kelamin === 'L' ?
                    'Laki - laki' : 'Perempuan');
                $('#alamat-surat-narkoba').val(data.pendaftaran_detail.pasien.alamat);
                $('#pekerjaan-pasien-sbn').val(data.pendaftaran_detail.pasien.pekerjaan);
                $('#tanggal-lahir-sbn').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#dokter-surat-narkoba').val(data.surat_narkoba.id_dokter_narkoba);
                $('#s2id_dokter-surat-narkoba a .select2c-chosen').html(data.surat_narkoba.nama_dokter);
                $('#tanggal-pemeriksaan-sbn').val(datefmysql(data.surat_narkoba.tanggal_pemeriksaan));

                $('#sip_sbn').prop('checked', true);
                $('#nip_sbn').prop('checked', true);

                $('#modal_surat_narkoba').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }










    // MRM
    function cetakResumeMedis(id, id_layanan_pendaftaran) {
        resetFormData();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/form_rekam_medis') ?>/id/' + id +
                '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first

                if (data.data_resume_medis.tinggi_badan && data.data_resume_medis.berat_badan) {
                    var tinggi_badan_dalam_meter = data.data_resume_medis.tinggi_badan / 100;
                    var bmi = data.data_resume_medis.berat_badan / (tinggi_badan_dalam_meter * tinggi_badan_dalam_meter);
                    $('#mcu-bmi').val(bmi.toFixed(4));
                } else {
                    $('#mcu-bmi').val('');
                }

                // Set values in modal
                $('#id-layanan-pendaftaran-mcu').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-mcu').val(id);
                $('#modal-resume-medis-title').html(
                    `<b>Form Resume Medical Check Up</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                $('#mcu-nama-pasien').val(data.pendaftaran_detail.pasien.nama);
                $('#mcu-jenis-kelamin').val(data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' :
                    'Perempuan');
                $('#mcu-tanggal-lahir').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#mcu-alamat').val(data.pendaftaran_detail.pasien.alamat);
                $('#mcu-pekerjaan').val(data.pendaftaran_detail.pasien.pekerjaan);
                $('#mcu-keperluan').val(data.data_resume_medis.keperluan);
                $('#mcu-ksi').val(data.data_resume_medis.keluhan_utama);
                $('#mcu-rpd').val(data.data_resume_medis.riwayat_penyakit_dahulu);
                $('#mcu-rpk').val(data.data_resume_medis.riwayat_penyakit_keluarga);
                $('#mcu-tinggi-badan').val(data.data_resume_medis.tinggi_badan);
                $('#mcu-berat-badan').val(data.data_resume_medis.berat_badan);
                $('#mcu-tensi-sistolik').val(data.data_resume_medis.tensi_sistolik);
                $('#mcu-tensi-diastolik').val(data.data_resume_medis.tensi_diastolik);
                $('#mcu-nadi').val(data.data_resume_medis.nadi);
                $('#mcu-rr').val(data.data_resume_medis.rr);
                $('#mcu-kepala').val(data.data_resume_medis.kepala);
                $('#mcu-kulit').val(data.data_resume_medis.kulit_kelamin);
                $('#mcu-mata').val(data.data_resume_medis.mata);
                $('#mcu-persepsi-warna').val(data.data_resume_medis.mcu_persepsi_warna);
                $('#mcu-jauh-od').val(data.data_resume_medis.mcu_jauh_od);
                $('#mcu-jauh-os').val(data.data_resume_medis.mcu_jauh_os);
                $('#mcu-dekat-od').val(data.data_resume_medis.mcu_dekat_od);
                $('#mcu-dekat-os').val(data.data_resume_medis.mcu_dekat_os);
                $('#mcu-konjungtiva').val(data.data_resume_medis.mcu_konjungtiva);
                $('#mcu-sklera').val(data.data_resume_medis.mcu_sklera);
                $('#mcu-komea').val(data.data_resume_medis.mcu_komea);
                $('#mcu-telinga').val(data.data_resume_medis.telinga);
                $('#mcu-hidung').val(data.data_resume_medis.hidung);
                $('#mcu-tenggorokan').val(data.data_resume_medis.tenggorok);
                $('#mcu-gdm').val(data.data_resume_medis.mcu_gdm);
                $('#mcu-leher').val(data.data_resume_medis.leher);
                $('#mcu-dada').val(data.data_resume_medis.thorax);
                $('#mcu-jantung').val(data.data_resume_medis.mcu_jantung);
                $('#mcu-paru').val(data.data_resume_medis.pulmo);
                $('#mcu-abdomen').val(data.data_resume_medis.abdomen);
                $('#mcu-anggota-gerak').val(data.data_resume_medis.ekstrimitas);
                $('#mcu-pemeriksaan-penunjang').val(data.data_resume_medis.pemeriksaan_penunjang);
                $('#mcu-kesimpulan').val(data.data_resume_medis.kritik);
                $('#mcu-saran').val(data.data_resume_medis.saran);
                $('#mcu-status-kesehatan').val(data.data_resume_medis.mcu_status_kesehatan);
                $('#mcu-status-kesehatan').val(data.data_resume_medis.mcu_status_kesehatan);
                $('#mcu-dokter').val(data.data_resume_medis.mcu_dokter);
                $('#mcu-dokter-nik').val(data.data_resume_medis.nip_dokter);
                $('#s2id_mcu-dokter a .select2c-chosen').html(data.data_resume_medis.nama_dokter);
                $('#mcu-tanggal-surat').val(datefmysql(data.data_resume_medis.mcu_tanggal_surat));


                $('#modal-resume-medis').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }















    function editResep(id, edit = 1) {
        $('#salin-resep').hide();
        $('.obkrs').show();
        $('#res-resep-ranap').html('');
        $('[data-toggle="popover"]').popover('hide');
        klik = null;
        date_time('tanggal-resep-realtime', 'html');
        let title_mode = '';
        let cek_stok = 0;
        if (edit > 0) {
            $('input[name=tanggal_resep]').attr('id', 'tanggal-resep-edit');
        } else {
            $('#no_r').val('');
            $('input[name=tanggal_resep]').attr('id', 'tanggal-resep');
            title_mode = '(Salin)';
            cek_stok = 1;
        }
        $('input[name=tanggal_resep]').attr('id', 'tanggal-resep-edit');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('pelayanan/api/pelayanan/get_data_resep') ?>',
            data: {
                id: id,
                cek_stok: cek_stok
            },
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                var hasil = data;
                var data = data.data[0];
                $('#modal-form-resep-label').html(`
                    <b>Form Resep Rawat Jalan ${title_mode}</b> | No. RM : ${data.id_pasien}, Nama: ${data.pasien},
                    <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telp}</b></i></span>
                `);
                $('#modal-form-resep').modal('show');

                $('#list-resep').html('');
                if (edit > 0) {
                    $('#no-resep, #id').val(id);
                    $('#id-pk').val(data.id_layanan_pendaftaran);
                } else {
                    $('#no-resep, #id').val('');
                    $('#salin-resep').show();
                }

                // $('#dokterhide').val(data.id_dokter);
                // $('#s2id_dokterhide a .select2c-chosen').html(data.dokter);
                $('#pasien-auto').html(data.id_pasien + ' / ' + data.pasien);
                $('#pasienhide').val(data.id_pasien);
                // $('#dokterhide').val(data.id_dokter);
                $('#usia-pasien').html(hitungUmur(data.tanggal_lahir));
                $('#jenis-pk').html(data.jenis_layanan);
                $('#penjamin-pasien').html(data.penjamin);
                $('#jasa').val(money_format(data.toeslag));
                $('#tanggal-resep-label').html(datetimefmysql(data.tanggal_resep));

                $('#no-r').val(data.resep_r.length + 1);

                $.each(data.resep_r, function(i, v) {
                    let list = /* html */ `
                        <div id="wrap${v.no_r}" class="wrap">
                            <table class="table-no-border">
                                <tr><td><input type=hidden name="no_r${v.no_r}" id="no-r${v.no_r}" value="${v.no_r}" class="no-r"></td></tr>
                                <tr><td></td></tr>
                                <tr><td><input type=hidden name="jt${v.no_r}" id="jt${v.no_r}" value="${v.tebus_r_jumlah}" class="jt"></td></tr>
                                <tr><td><input type=hidden name="ap${v.no_r}" id="ap${v.no_r}" value="${v.aturan_pakai}" class="ap"></td></tr>
                                <tr><td><input type=hidden name="ap2${v.no_r}" id="ap2${v.no_r}" value="${v.ket_aturan_pakai}" class="ap2"></td></tr>
                                <tr><td><input type=hidden name="it${v.no_r}" id="it${v.no_r}" value="${v.iter}" class="it"></td></tr>
                                <tr><td><input type=hidden name="ja${v.no_r}" id="ja${v.no_r}" value="${v.id_tarif_tuslah}" class="ja"></td></tr>
                                <tr><td><input type=hidden name="cara_buat${v.no_r}" id="cara-buat${v.no_r}" value="${v.cara_pembuatan}" class="cara-buat"></td></tr>
                                <tr>
                                    <td>
                                        <input type=hidden name="timing${v.no_r}" id="timing${v.no_r}" value="${v.timing}" class="timing">
                                        <input type=hidden name="jmlnor" id="jmlnor${v.no_r}" class="jmlnor" value="${v.no_r}">
                                        <input type=hidden name="waktu_pemberian${v.no_r}" id="waktu-pemberian${v.no_r}" class="waktu-pemberian" value="${v.admin_time}">
                                    </td>
                                </tr>
                            </table>
                            <div id="table-list-resep${v.no_r}" class="input-resep" style="width: 100%; display: flex; flex-direction: column; gap:.5rem">
								<div style="display: flex;gap: 1rem; justify-content: space-between">
									<div style="display: flex;gap: 1rem;align-items: center">
										<strong id="nomor-r${v.no_r}">R/${v.no_r}</strong>
										<label for="is-racik${v.no_r}" style="display: flex; gap:.3rem;">
											<input
												type="hidden"
												name="is_racik${v.no_r}"
												id="is-racik${v.no_r}"
												title="Apakah ini resep racikan?"
												class="check-is-racik"
												value="${v.is_racik}"
											>
											<div style="display: flex; align-items: center; gap: .5rem">
												Racikan ${v.is_racik !== '1' ? `<i class="fas fa-times-circle"></i>` : `<i class="fas fa-check-circle"></i>`}
											</div>
										</label>
										|
										<div id="cara-buat-r${v.no_r}" style="display: flex; gap:0.4rem">
											<div>${v.cara_pembuatan}</div>
											<div>|</div>
											<span style="display: flex; gap: .2rem">Permintaan <input id="jp${v.no_r}" class="jp custom-form" type="number" name="jp${v.no_r}" value="${parseInt(v.resep_r_jumlah)}" onkeypress="return hanyaAngka(event)" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></span>
											<div>|</div>
											<div>${v.aturan_pakai_manual == 1 ? v.ket_aturan_pakai_manual : v.aturan_pakai}</div>
											<div>|</div>
											<div>${v.admin_time}</div>
										</div>
										<button type="button" title="Klik untuk hapus R /" class="btn btn-secondary btn-xs" onclick="removeREdit($(this));"><i class="fas fa-trash-alt"></i> Delete R /</button>
									</div>

									${v.is_racik !== '1' ? '' : /* html */ `
										<label for="sediaan${v.no_r}" class="sediaan" style="display: flex; gap:.3rem;align-items: center;">
											Sediaan:
											<input type="text" name="sediaan${v.no_r}" id="sediaan${v.no_r}" class="sediaan_auto select2c-input">
										</label>
									`}
								</div>
								<div style="display: inline-flex;margin-left: 12px;" class="kr">
									<b>Keterangan : </b>
									<input type="text" name="keterangan_resep${v.no_r}" id="keterangan_resep${v.no_r}" style="width:300px;margin-left:5px" class="custom-form" value="${v.keterangan_resep ? v.keterangan_resep : ''}">
								</div>
								<div class="tr-row" style="display: flex; flex-direction: column;">
								</div>
							</div>
                        </div>
                    `;

                    $('#list-resep').append(list);

                    let subtotal = 0;
                    let obatkronistxt = '';

                    $.each(v.resep_r_detail, function(j, val) {
                        obatkronis = '';
                        if (val.kronis === '1') {
                            obatkronistxt = '<i class="blinker">Obat Kronis</i>';
                        }

                        var ada = true;
                        if (edit == 0) {
                            if (val['stok_akhir'] < 0) {
                                ada = false;
                            }
                        }

                        if (ada) {
                            // let listResep = /* html */ `
                            //     <tr class="tr-rows${v.no_r}">
                            //         <td width="50%" style="padding-left:20px">
                            //             <span class="brg"><input type=hidden name="id_barang${v.no_r}[]" id="id-barang${v.no_r}${i}" class="barang" value="${val.id_barang}"></span>
                            //             <span class="krs"><input type=hidden name="obatkronis${v.no_r}[]" id="obatkronis${v.no_r}${i}" class="barang" value="${val.kronis}"></span>
                            //             ${val.nama_barang}&nbsp;${obatkronistxt}
                            //         </td>
                            //         <td width="20%" class="center">
                            //             Dosis Racik
                            //             <input class="jmlpakai custom-form" type="text" value="${val.dosis_racik}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)" readonly>
                            //         </td>
                            //         <td width="20%" class="center">
                            //             Jml Pakai
                            //             <input class="jmlpakai custom-form" type="text" name="jmlpakai${v.no_r}[]" id="jmlpakai${v.no_r}${i}" value="${val.jumlah_pakai}" style="width:50px; display:unset;" data-jual_harga="${val.jual_harga}" data-id="${val.id}" onchange="chRDetail($(this))" onkeypress="return hanyaAngka(event)">
                            //         </td>
                            //         <td width="10%" class="right">
                            //             <input type=hidden name="dosisracik${v.no_r}[]" id="dosisracik${v.no_r}${i}" value="${val.dosis_racik}">
                            //             <span id="hb-${val.id}" class="harga-barang">${money_format(precise_round(val.jumlah_pakai * val.jual_harga, 2))}</span>
                            //         </td>
                            //         <td width="5%" class="right">
                            //             <button type="button" title="Klik untuk hapus" class="btn btn-secondary btn-xs" onclick="removeElement(${v.no_r}, this)"><i class="fas fa-times-circle"></i></button>
                            //             <input type=hidden name="jmldetail${v.no_r}" id="jmldetail${v.no_r}${i}" class="jmldetail" value="${v.no_r}">
                            //         </td>
                            //     </tr>
                            // `;
                            let listResep = /* html */ `
								<div class="tr-rows${v.no_r}" style="width:100%">
									<div style="display: flex; justify-content: space-between; margin-left: 1.5rem">
										<span class="brg" style="display: none"><input type=hidden name="id_barang${v.no_r}[]" id="id-barang${v.no_r}${i}" class="barang" value="${val.id_barang}"></span>
										<span class="krs" style="display: none"><input type=hidden name="obatkronis${v.no_r}[]" id="obatkronis${v.no_r}${i}" class="obat-kronis" value="${val.kronis}"></span>
										<p>
											${val.nama_barang}&nbsp;${obatkronistxt}
											<input type="hidden" class="kekuatan-obat" id="kekuatan${v.no_r}${i}" value="${val.kekuatan}"/>
											<input type="hidden" class="harga-jual-barang" id="harga-jual-barang${v.no_r}${i}" value="${val.jual_harga}"/>
											<input type="hidden" class="sisa-stok" id="sisa-stok${v.no_r}${i}" value="${val.stok_akhir}"/>
										</p>
										<div style="display: flex; justify-content: space-between; align-items: center; gap: 2.4rem">
											<div style="display: flex; gap:.5rem">
												Dosis Racik
												<input class="dosisracik custom-form" type="text" name="dosisracik${v.no_r}[]" id="dosisracik${v.no_r}${i}" value="${val.dosis_racik}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)" readonly>
												${val.satuan_kekuatan}
											</div>
											<div style="display: flex; gap:.5rem; align-items: center">
												Jml Pakai
												<input class="jmlpakai custom-form" type="text" name="jmlpakai${v.no_r}[]" id="jmlpakai${v.no_r}${i}" value="${val.jumlah_pakai}" style="width:50px; display:unset;" data-jual_harga="${val.jual_harga}" data-id="${v.no_r}${i}n" onchange="chRDetail($(this))" onkeypress="return hanyaAngka(event)">
											</div>
											<div style="display: flex; gap:.5rem">
												<span id="hb-${v.no_r}${i}n" class="harga-barang">${money_format(precise_round(val.jumlah_pakai * val.jual_harga, 2))}</span>
											</div>
											<div style="display: flex; gap:.2rem">
												<button type="button" title="Klik untuk hapus" class="btn btn-secondary btn-xs" onclick="removeElement(${v.no_r}, $(this))"><i class="fas fa-times-circle"></i></button>
												<input type=hidden name="jmldetail${v.no_r}[]" id="jmldetail${v.no_r}${i}" class="jmldetail" value="${v.no_r}">
											</div>
										</div>
									</div>
								</div>
							`;

                            $('#table-list-resep' + v.no_r + ' .tr-row').append(listResep);
                            subtotal = subtotal + (val.jumlah_pakai * val.jual_harga);
                        }
                    });

                    sediaanAuto(v.no_r);
                    $(`#sediaan${v.no_r}`).val(v.id_sediaan)
                    $(`#s2id_sediaan${v.no_r} a .select2c-chosen`).html(v.nama_sediaan);

                    const jumlahPermintaan = $(`#jp${v.no_r}`)

                    jumlahPermintaan.on('keyup', function() {
                        let permintaan = parseInt($(this).val());
                        $(this).parent().parent().parent().parent().siblings('table').find(`#jt${v.no_r}`).val(permintaan)

                        $(this)
                            .parent()
                            .parent()
                            .parent()
                            .parent()
                            .siblings('.tr-row')
                            .children()
                            .each(function(index, element) {
                                const dose = `#dosisracik${v.no_r}${index}`;
                                const strength = `#kekuatan${v.no_r}${index}`;
                                const price = `#harga-jual-barang${v.no_r}${index}`;
                                const usedAmount = `#jmlpakai${v.no_r}${index}`;
                                const salePrice = `#hb-${v.no_r}${index}n`;

                                if (permintaan) {
                                    const dosisRacik = parseInt($(element).find(dose).val());
                                    const kekuatan = parseInt($(element).find(strength).val());
                                    const hargaJualBarang = parseFloat($(element).find(price).val());
                                    const sisaStok = parseInt($(`#sisa-stok${v.no_r}${index}`).val())

                                    const jumlahPakai = (dosisRacik * permintaan) / kekuatan;
                                    console.log(jumlahPakai)

                                    const hargaJual = roundToTwo(jumlahPakai * hargaJualBarang);

                                    if (jumlahPakai > sisaStok) {
                                        syams_validation(`#jmlpakai${v.no_r}${index}`, 'Sisa stok tidak cukup! sisa stok : ' + $(`#sisa-stok${v.no_r}${index}`).val());
                                    } else {
                                        syams_validation_remove(`#jmlpakai${v.no_r}${index}`);
                                    }

                                    $(element).find(usedAmount).val(roundToTwo(jumlahPakai));
                                    $(element).find(salePrice).html(money_format(hargaJual));
                                } else {
                                    $(element).find(usedAmount).val(0);
                                    $(element).find(salePrice).html(0.00);
                                }
                            });

                        totalHargaBarang()
                    });
                });

                try {
                    var warning = hasil['status']['warning'];
                    $('#res-resep-ranap').html(notification(hasil));
                } catch (e) {
                    console.log(e)
                }
            },
            complete: function() {
                hideLoader();
                totalHargaBarang();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }


    // SKKJ1 RUBAH
    function cetakSKKJsatu(id, id_layanan_pendaftaran) {
        // $('#modal-skkj-1').modal('show');
        // resetFormData();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/form_sk_kesehatan_jiwa_1') ?>/id/' + id +
                '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetFormDataSkkj1();
                // Set values in modal
                $('#id-layanan-pendaftaran-skkj-1').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-skkj-1').val(id);

                $('#modal-skkj-1-title').html(
                    `<b>Form Surat Keterangan Kesehatan Jiwa</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                data.surat_keterangan_kesehatan_jiwa_1.valid_1 == 'VALID' ? $('#valid-1').prop('checked', true) : $('#valid-1').prop('checked', false);
                data.surat_keterangan_kesehatan_jiwa_1.valid_2 == 'TIDAK VALID' ? $('#valid-2').prop('checked', true) : $('#valid-2').prop('checked', false);
                data.surat_keterangan_kesehatan_jiwa_1.nrptt_nip == 'NRTKK' ? $('#nrptt-skkj-1').prop('checked', true) : $('#nrptt-skkj-1').prop('checked', false);
                data.surat_keterangan_kesehatan_jiwa_1.nrptt_nip == 'NIP' ? $('#nip-skkj-1').prop('checked', true) : $('#nip-skkj-1').prop('checked', false);
                $('#no-surat-skkj-1').val(data.surat_keterangan_kesehatan_jiwa_1.no_surat_skkj_1);
                $('#nama-pasien-skkj-1').val(data.pendaftaran_detail.pasien.nama);
                $('#jenis-kelamin-skkj-1').val(data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' :
                    'Perempuan');
                $('#tanggal-lahir-skkj-1').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#alamat-skkj-1').val(data.pendaftaran_detail.pasien.alamat);
                $('#tanggal-skkj-1').val(datefmysql(data.surat_keterangan_kesehatan_jiwa_1.tanggal_skkj_1));
                $('#dokter-skkj-1').val(data.surat_keterangan_kesehatan_jiwa_1.dokter_skkj_1);
                $('#s2id_dokter-skkj-1 a .select2c-chosen').html(data.surat_keterangan_kesehatan_jiwa_1.nama_dokter);
                $('#skkj-1-dokter-nik').val(data.surat_keterangan_kesehatan_jiwa_1.nip_dokter);

                $('#keterangan-skkj-1').val(data.surat_keterangan_kesehatan_jiwa_1.keterangan);


                $('#modal-skkj-1').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetFormDataSkkj1() {
        $('#form-skkj-1')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
        $('#no-surat-skkj-1').val('');
        $('#nama-pasien-skkj-1').val('');
        $('#jenis-kelamin-skkj-1').val('');
        $('#tanggal-lahir-skkj-1').val('');
        $('#alamat-skkj-1').val('');
        $('#tanggal-skkj-1').val('');
        $('#skkj-1-dokter-nik').val('');
        $('#s2id_dokter-skkj-1 a .select2c-chosen').empty();
        $('#dokter-skkj-1').val('');
        $('#keterangan-skkj-1').val('');

    }

    // SKKJ2
    function cetakSKKJdua(id, id_layanan_pendaftaran) {
        // $('#modal-skkj-2').modal('show');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/form_sk_kesehatan_jiwa_2') ?>/id/' + id +
                '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetFormDataSkkj2();
                $('#id-layanan-pendaftaran-skkj-2').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-skkj-2').val(id);

                $('#modal-skkj-2-title').html(
                    `<b>Form Surat Keterangan Kesehatan Jiwa</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                data.surat_keterangan_kesehatan_jiwa_2.valid_1 == 'VALID' ? $('#validd-1').prop('checked', true) : $('#validd-1').prop('checked', false);
                data.surat_keterangan_kesehatan_jiwa_2.valid_2 == 'TIDAK VALID' ? $('#validd-2').prop('checked', true) : $('#validd-2').prop('checked', false);
                data.surat_keterangan_kesehatan_jiwa_2.nrptt_nip == 'NRTKK' ? $('#nrptt-skkj-2').prop('checked', true) : $('#nrptt-skkj-2').prop('checked', false);
                data.surat_keterangan_kesehatan_jiwa_2.nrptt_nip == 'NIP' ? $('#nip-skkj-2').prop('checked', true) : $('#nip-skkj-2').prop('checked', false);
                $('#no-surat-skkj-2').val(data.surat_keterangan_kesehatan_jiwa_2.no_surat_skkj_2);
                $('#nama-pasien-skkj-2').val(data.pendaftaran_detail.pasien.nama);
                $('#jenis-kelamin-skkj-2').val(data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' :
                    'Perempuan');
                $('#tanggal-lahir-skkj-2').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#alamat-skkj-2').val(data.pendaftaran_detail.pasien.alamat);
                $('#tanggal-skkj-2').val(datefmysql(data.surat_keterangan_kesehatan_jiwa_2.tanggal_skkj_2));
                $('#dokter-skkj-2').val(data.surat_keterangan_kesehatan_jiwa_2.dokter_skkj_2);
                $('#s2id_dokter-skkj-2 a .select2c-chosen').html(data.surat_keterangan_kesehatan_jiwa_2.nama_dokter);
                $('#skkj-2-dokter-nik').val(data.surat_keterangan_kesehatan_jiwa_2.nip_dokter);
                $('#keterangan-skkj-2').val(data.surat_keterangan_kesehatan_jiwa_2.keterangan);
                $('#modal-skkj-2').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetFormDataSkkj2() {
        $('#form-skkj-2')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
        $('#no-surat-skkj-2').val('');
        $('#nama-pasien-skkj-2').val('');
        $('#jenis-kelamin-skkj-2').val('');
        $('#tanggal-lahir-skkj-2').val('');
        $('#alamat-skkj-2').val('');
        $('#tanggal-skkj-2').val('');
        $('#skkj-2-dokter-nik').val('');
        $('#s2id_dokter-skkj-2 a .select2c-chosen').empty();
        $('#dokter-skkj-2').val('');
        $('#keterangan-skkj-2').val('');

    }

    // SKKJ3
    function cetakSKKJtiga(id, id_layanan_pendaftaran) {
        // $('#modal-skkj-3').modal('show');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/form_sk_kesehatan_jiwa_3') ?>/id/' + id +
                '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetFormDataSkkj3();
                $('#id-layanan-pendaftaran-skkj-3').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-skkj-3').val(id);
                $('#modal-skkj-3-title').html(
                    `<b>Form Surat Keterangan Kesehatan Jiwa</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                data.surat_keterangan_kesehatan_jiwa_3.valid_1 == 'VALID' ? $('#validdd-1').prop('checked', true) : $('#validdd-1').prop('checked', false);
                data.surat_keterangan_kesehatan_jiwa_3.valid_2 == 'TIDAK VALID' ? $('#validdd-2').prop('checked', true) : $('#validdd-2').prop('checked', false);
                data.surat_keterangan_kesehatan_jiwa_3.nrptt_nip == 'NRTKK' ? $('#nrptt-skkj-3').prop('checked', true) : $('#nrptt-skkj-3').prop('checked', false);
                data.surat_keterangan_kesehatan_jiwa_3.nrptt_nip == 'NIP' ? $('#nip-skkj-3').prop('checked', true) : $('#nip-skkj-3').prop('checked', false);
                $('#no-surat-skkj-3').val(data.surat_keterangan_kesehatan_jiwa_3.no_surat_skkj_3);
                $('#nama-pasien-skkj-3').val(data.pendaftaran_detail.pasien.nama);
                $('#jenis-kelamin-skkj-3').val(data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' :
                    'Perempuan');
                $('#tanggal-lahir-skkj-3').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#alamat-skkj-3').val(data.pendaftaran_detail.pasien.alamat);
                $('#tanggal-skkj-3').val(datefmysql(data.surat_keterangan_kesehatan_jiwa_3.tanggal_skkj_3));
                $('#dokter-skkj-3').val(data.surat_keterangan_kesehatan_jiwa_3.dokter_skkj_3);
                $('#s2id_dokter-skkj-3 a .select2c-chosen').html(data.surat_keterangan_kesehatan_jiwa_3.nama_dokter);
                $('#skkj-3-dokter-nik').val(data.surat_keterangan_kesehatan_jiwa_3.nip_dokter);
                $('#keterangan-skkj-3').val(data.surat_keterangan_kesehatan_jiwa_3.keterangan);
                $('#modal-skkj-3').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetFormDataSkkj3() {
        $('#form-skkj-3')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
        $('#no-surat-skkj-3').val('');
        $('#nama-pasien-skkj-3').val('');
        $('#jenis-kelamin-skkj-3').val('');
        $('#tanggal-lahir-skkj-3').val('');
        $('#alamat-skkj-3').val('');
        $('#tanggal-skkj-3').val('');
        $('#skkj-3-dokter-nik').val('');
        $('#s2id_dokter-skkj-3 a .select2c-chosen').empty();
        $('#dokter-skkj-3').val('');
        $('#keterangan-skkj-3').val('');
    }

    // SKB
    function cetakSkb(id_pendaftaran, id_layanan_pendaftaran) {
        $.ajax({
			type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/get_kelaikan_bekerja') ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
            success: function(data) {
                // console.log(data);
                resetSkb();
                $('#id-layanan-pendaftaran-skb').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-skb').val(id_pendaftaran);
                $('#modal_kelaikan_bekerja_title').html(
                    `<b>Form Sertifikat Kelaikan Bekerja</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );  
                $('#kb_nomor_1').val(data.kelalaian_bekerja.kb_nomor_1);
                $('#kb_nomor_2').val(data.kelalaian_bekerja.kb_nomor_2);
                $('#kb_permintaan_dari').val(data.kelalaian_bekerja.kb_permintaan_dari);
                $('#kb_permintaan_nomor').val(data.kelalaian_bekerja.kb_permintaan_nomor);
                $('#kb_permintaan_tanggal').val(datefmysql(data.kelalaian_bekerja.kb_permintaan_tanggal));
                $('#kb_keterangan').val(data.kelalaian_bekerja.kb_keterangan);
                $('#kb_tanggal').val(datefmysql(data.kelalaian_bekerja.kb_tanggal));
                $('#dokter-sepesialis-skb').val(data.kelalaian_bekerja.dokter_sepesialis_skb);
                $('#s2id_dokter-sepesialis-skb a .select2c-chosen').html(data.kelalaian_bekerja.nama_dokter);
                $('#modal_kelaikan_bekerja').modal('show');            
            },
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

    }

    // SKB 
    function resetSkb() {
        $('#form_skb')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#kb_nomor_1, #kb_nomor_2, #kb_permintaan_dari, #kb_permintaan_nomor, #kb_permintaan_tanggal, #kb_keterangan, #kb_tanggal, #dokter-sepesialis-skb').val('');
    }


    // skb
    // function cetakSkb(id_pendaftaran, id_layanan_pendaftaran) {
    //     $.ajax({
    //         type: 'GET',
    //         url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
    //         cache: false,
    //         dataType: 'JSON',
    //         beforeSend: function() {
    //             showLoader();
    //         },
    //         success: function(data) {
    //             resetSkb();
    //             // Set all values first
    //             $('#kb_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
    //             $('#kb_id_pendaftaran').val(id_pendaftaran);
    //             $('#modal_skb_title').html(
    //                 `<b>Form Sertifikat Kelaikan Bekerja</b> | No. RM: ${data.pasien.id_pasien}, Nama: ${data.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pasien.telp}</b></i>`
    //             );

    //             // sertifikat kelaikan bekerja
    //             let kb = data.kb;
    //             if (kb !== null) {
    //                 $('#kb_id').val(kb.id);
    //                 $('#kb_nomor_1').val(kb.kb_nomor_1);
    //                 $('#kb_nomor_2').val(kb.kb_nomor_1);
    //                 $('#kb_permintaan_dari').val(kb.kb_permintaan_dari);
    //                 $('#kb_permintaan_nomor').val(kb.kb_permintaan_nomor);
    //                 $('#kb_permintaan_tanggal').val((kb.kb_permintaan_tanggal !== null ? datefmysql(kb.kb_permintaan_tanggal) : ''));
    //                 $('#kb_keterangan').val(kb.kb_keterangan);
    //                 $('#kb_tanggal').val((kb.kb_tanggal !== null ? datefmysql(kb.kb_tanggal) : ''));
    //             }

    //             $('#modal_skb').modal('show');

    //         },
    //         complete: function() {
    //             hideLoader();
    //         },
    //         error: function(e) {
    //             accessFailed(e.status);
    //         }
    //     });

    // }

    // function resetSkb() {
    //     $('#kb_nomor_1, #kb_nomor_2, #kb_permintaan_dari, #kb_permintaan_nomor, #kb_permintaan_tanggal, #kb_keterangan, #kb_tanggal').val('');
    // }













    // lpk
    function cetakLpk(id_pendaftaran, id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetLpk();
                // Set all values first
                $('#lpk_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#lpk_id_pendaftaran').val(id_pendaftaran);
                $('#modal_lpk_title').html(
                    `<b>Form Laporan Pemeriksaan Kesehatan</b> | No. RM: ${data.pasien.id_pasien}, Nama: ${data.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pasien.telp}</b></i>`
                );

                // sertifikat kelaikan bekerja
                let lpk = data.lpk;
                console.log(lpk);
                if (lpk !== null) {
                    // radio
                    lpk.lpk_dirawat == '1' ? $('#lpk_dirawat_ya').prop('checked', true) : $('#lpk_dirawat_tidak').prop('checked', true);
                    lpk.lpk_kecelakaan == '1' ? $('#lpk_kecelakaan_ya').prop('checked', true) : $('#lpk_kecelakaan_tidak').prop('checked', true);
                    lpk.lpk_batuk == '1' ? $('#lpk_batuk_ya').prop('checked', true) : $('#lpk_batuk_tidak').prop('checked', true);
                    lpk.lpk_dada == '1' ? $('#lpk_dada_ya').prop('checked', true) : $('#lpk_dada_tidak').prop('checked', true);
                    lpk.lpk_kuning == '1' ? $('#lpk_kuning_ya').prop('checked', true) : $('#lpk_kuning_tidak').prop('checked', true);
                    lpk.lpk_pingsan == '1' ? $('#lpk_pingsan_ya').prop('checked', true) : $('#lpk_pingsan_tidak').prop('checked', true);
                    lpk.lpk_kejang == '1' ? $('#lpk_kejang_ya').prop('checked', true) : $('#lpk_kejang_tidak').prop('checked', true);
                    lpk.lpk_muntah == '1' ? $('#lpk_muntah_ya').prop('checked', true) : $('#lpk_muntah_tidak').prop('checked', true);
                    lpk.lpk_hati == '1' ? $('#lpk_hati_ya').prop('checked', true) : $('#lpk_hati_tidak').prop('checked', true);
                    lpk.lpk_batu == '1' ? $('#lpk_batu_ya').prop('checked', true) : $('#lpk_batu_tidak').prop('checked', true);
                    lpk.lpk_nanah == '1' ? $('#lpk_nanah_ya').prop('checked', true) : $('#lpk_nanah_tidak').prop('checked', true);
                    lpk.lpk_ambien == '1' ? $('#lpk_ambien_ya').prop('checked', true) : $('#lpk_ambien_tidak').prop('checked', true);
                    lpk.lpk_buang == '1' ? $('#lpk_buang_ya').prop('checked', true) : $('#lpk_buang_tidak').prop('checked', true);
                    lpk.lpk_narkotik == '1' ? $('#lpk_narkotik_ya').prop('checked', true) : $('#lpk_narkotik_tidak').prop('checked', true);
                    lpk.lpk_darah == '1' ? $('#lpk_darah_ya').prop('checked', true) : $('#lpk_darah_tidak').prop('checked', true);
                    lpk.lpk_jantung == '1' ? $('#lpk_jantung_ya').prop('checked', true) : $('#lpk_jantung_tidak').prop('checked', true);
                    lpk.lpk_asma == '1' ? $('#lpk_asma_ya').prop('checked', true) : $('#lpk_asma_tidak').prop('checked', true);
                    lpk.lpk_malaria == '1' ? $('#lpk_malaria_ya').prop('checked', true) : $('#lpk_malaria_tidak').prop('checked', true);
                    lpk.lpk_jiwa == '1' ? $('#lpk_jiwa_ya').prop('checked', true) : $('#lpk_jiwa_tidak').prop('checked', true);
                    lpk.lpk_manis == '1' ? $('#lpk_manis_ya').prop('checked', true) : $('#lpk_manis_tidak').prop('checked', true);
                    lpk.lpk_hipertensi == '1' ? $('#lpk_hipertensi_ya').prop('checked', true) : $('#lpk_hipertensi_tidak').prop('checked', true);
                    lpk.lpk_penyakit == '1' ? $('#lpk_penyakit_ya').prop('checked', true) : $('#lpk_penyakit_tidak').prop('checked', true);
                    lpk.lpk_stroke == '1' ? $('#lpk_stroke_ya').prop('checked', true) : $('#lpk_stroke_tidak').prop('checked', true);
                    lpk.lpk_cacat == '1' ? $('#lpk_cacat_ya').prop('checked', true) : $('#lpk_cacat_tidak').prop('checked', true);

                    // field
                    $('#lpk_id').val(lpk.id);
                    $('#lpk_dirawat_ket').val(lpk.lpk_dirawat_ket);
                    $('#lpk_kecelakaan_ket').val(lpk.lpk_kecelakaan_ket);
                    $('#lpk_batuk_ket').val(lpk.lpk_batuk_ket);
                    $('#lpk_dada_ket').val(lpk.lpk_dada_ket);
                    $('#lpk_kuning_ket').val(lpk.lpk_kuning_ket);
                    $('#lpk_pingsan_ket').val(lpk.lpk_pingsan_ket);
                    $('#lpk_kejang_ket').val(lpk.lpk_kejang_ket);
                    $('#lpk_muntah_ket').val(lpk.lpk_muntah_ket);
                    $('#lpk_hati_ket').val(lpk.lpk_hati_ket);
                    $('#lpk_batu_ket').val(lpk.lpk_batu_ket);
                    $('#lpk_nanah_ket').val(lpk.lpk_nanah_ket);
                    $('#lpk_ambien_ket').val(lpk.lpk_ambien_ket);
                    $('#lpk_buang_ket').val(lpk.lpk_buang_ket);
                    $('#lpk_narkotik_ket').val(lpk.lpk_narkotik_ket);
                    $('#lpk_darah_ket').val(lpk.lpk_darah_ket);
                    $('#lpk_jantung_ket').val(lpk.lpk_jantung_ket);
                    $('#lpk_asma_ket').val(lpk.lpk_asma_ket);
                    $('#lpk_malaria_ket').val(lpk.lpk_malaria_ket);
                    $('#lpk_jiwa_ket').val(lpk.lpk_jiwa_ket);
                    $('#lpk_manis_ket').val(lpk.lpk_manis_ket);
                    $('#lpk_hipertensi_ket').val(lpk.lpk_hipertensi_ket);
                    $('#lpk_penyakit_ket').val(lpk.lpk_penyakit_ket);
                    $('#lpk_stroke_ket').val(lpk.lpk_stroke_ket);
                    $('#lpk_cacat_ket').val(lpk.lpk_cacat_ket);
                    $('#lpk_dokter').val(lpk.lpk_dokter);
                    $('#lpk_tanggal').val((lpk.lpk_tanggal !== null ? datefmysql(lpk.lpk_tanggal) : ''));
                    $('#s2id_lpk_dokter a .select2c-chosen').html(lpk.nama_dokter);
                }

                $('#modal_lpk').modal('show');

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function resetLpk() {
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
        $("input[type='text']").val('');
        $("input[type='date']").val('');
        $('#s2id_lpk_dokter a .select2c-chosen').empty();

    }

    // SKM
    function cetakSKM(id_pendaftaran, id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/get_surat_keterangan_medis') ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetFormDataSkM();
                $('#id-layanan-pendaftaran-skm').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-skm').val(id_pendaftaran);

                $('#jabatan').val(data.surat_keterangan_medis.jabatan);

                if (typeof anamnesa !== 'undefined') {
                    $('#hasil-pemeriksaan-pasien-skm').val(data.anamnesa[0].pemeriksaan_penunjang);
                }

                $('#diagnosa-pasien-skm').val(data.surat_keterangan_medis.keterangan);

                $('#modal-skm-title').html(
                    `<b>Form Surat Keterangan Medis</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );

                $('#nama-dokter-skm').val(data.pendaftaran_detail.layanan.dokter);
                $('#nama-pasien-skm').val(data.pendaftaran_detail.pasien.nama);
                $('#tgl-lahir-pasien-skm').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#pekerjaan-pasien-skm').val(data.pendaftaran_detail.pasien.pekerjaan);
                $('#alamat-pasien-skm').val(data.pendaftaran_detail.pasien.alamat);
                $('#nomor-skm-1').val(data.surat_keterangan_medis.nomor_skm_1);
                $('#nomor-skm-2').val(data.surat_keterangan_medis.nomor_skm_2);
                $('#no-porsi').val(data.surat_keterangan_medis.no_porsi);
                $('#menyatakan').val(data.surat_keterangan_medis.menyatakan);
                $('#tanggal-skm').val(datefmysql(data.surat_keterangan_medis.tanggal_skm));
                $('#dokter-skm').val(data.surat_keterangan_medis.dokter_skm);
                $('#s2id_dokter-skm a .select2c-chosen').html(data.surat_keterangan_medis.nama_dokter);

                $('#modal-skm').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // SKM ini wajib pakek RESETT KARENA KALAU GA PAKEK TIDAK TERESET
    function resetFormDataSkM() {
        $('#form-skm')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
        $('#jabatan').val('');
        $('#hasil-pemeriksaan-pasien-skm').val('');
        $('#diagnosa-pasien-skm').val('');
        $('#nama-dokter-skm').val('');
        $('#nama-pasien-skm').val('');
        $('#tgl-lahir-pasien-skm').val('');
        $('#pekerjaan-pasien-skm').val('');
        $('#alamat-pasien-skm').val('');
        $('#nomor-skm-1').val('');
        $('#nomor-skm-2').val('');
        $('#no-porsi').val('');
        $('#menyatakan').val('');
        $('#tanggal-skm').val('');
        $('#s2id_dokter-skm a .select2c-chosen').empty();
        $('#dokter-skm').val('');
    }

    // SKD
    function cetakSKD(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_skd').modal('show');  
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/get_surat_keterangan_disabilitas') ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetFormDataSkD();

                $('#id-layanan-pendaftaran-skd').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-skd').val(id_pendaftaran);

                $('#modal_skd_title').html(
                    `<b>Form Surat Keterangan Disabilitas</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );

                $('#nomorskd').val(data.surat_keterangan_disabilitas.nomorskd);
                $('#namapasienskd').val(data.pendaftaran_detail.pasien.nama);
                $('#ttlskd').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#umurskd').val(data.pendaftaran_detail.pasien.umur_pasien);
                $('#jkskd').val(data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan');
                // $('#alamatskd').val(data.pendaftaran_detail.pasien.alamat);
                $('#alamatskd').val(
                    `${data.pendaftaran_detail.pasien.alamat} RT. ${data.pendaftaran_detail.pasien.no_rt} / RW. ${data.pendaftaran_detail.pasien.no_rw}, Kel. ${data.pendaftaran_detail.pasien.kelurahan}, Kec. ${data.pendaftaran_detail.pasien.kecamatan}, Kab. ${data.pendaftaran_detail.pasien.kabupaten}, Prop. ${data.pendaftaran_detail.pasien.provinsi}`
                );

                $('#keperluanskd').val(data.surat_keterangan_disabilitas.keterangan);
                $('#lokasiskd').val(data.surat_keterangan_disabilitas.lokasiskd);
                if (data.surat_keterangan_disabilitas.adadisabilitas == '1') {
                    $('#adadisabilitas').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.adadisabilitasq == '1') {
                    $('#adadisabilitasq').prop('checked', true)
                }
                $('#susunanskd').val(data.surat_keterangan_disabilitas.susunanskd);
                $('#organskd').val(data.surat_keterangan_disabilitas.organskd);
                if (data.surat_keterangan_disabilitas.ektremitasataskanan == '1') {
                    $('#ektremitasataskanan').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.extremitasataskiri == '1') {
                    $('#extremitasataskiri').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.extremitasataskeduanya == '1') {
                    $('#extremitasataskeduanya').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.dominankanan == '1') {
                    $('#dominankanan').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.dominankiri == '1') {
                    $('#dominankiri').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.ektremitasbawahkanan == '1') {
                    $('#ektremitasbawahkanan').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.extremitasbawahkiri == '1') {
                    $('#extremitasbawahkiri').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.extremitasbawahkeduanya == '1') {
                    $('#extremitasbawahkeduanya').prop('checked', true)
                }
                $('#lainskd').val(data.surat_keterangan_disabilitas.lainskd);
                if (data.surat_keterangan_disabilitas.sejakskd == '1') {
                    $('#sejakskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.kecelakaanskd == '1') {
                    $('#kecelakaanskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.kecelaskd == '1') {
                    $('#kecelaskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.strokeskd == '1') {
                    $('#strokeskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.kustaskd == '1') {
                    $('#kustaskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.laenskd == '1') {
                    $('#laenskd').prop('checked', true)
                }
                $('#ptskd').val(data.surat_keterangan_disabilitas.ptskd);
                $('#skdpt').val(data.surat_keterangan_disabilitas.skdpt);
                if (data.surat_keterangan_disabilitas.sesudahskd == '1') {
                    $('#sesudahskd').prop('checked', true)
                }
                $('#thskd').val(data.surat_keterangan_disabilitas.thskd);
                if (data.surat_keterangan_disabilitas.kemampuanskd == '1') {
                    $('#kemampuanskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.tmskd == '1') {
                    $('#tmskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.besarbisaskd == '1') {
                    $('#besarbisaskd').prop('checked', true)
                }
                $('#jelasskd').val(data.surat_keterangan_disabilitas.jelasskd);
                if (data.surat_keterangan_disabilitas.perluskd == '1') {
                    $('#perluskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bsaskb == '1') {
                    $('#bsaskb').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.anggotaskd == '1') {
                    $('#anggotaskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.atanganskd == '1') {
                    $('#atanganskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.akakiskd == '1') {
                    $('#akakiskd').prop('checked', true)
                }
                $('#tangankakiskd').val(data.surat_keterangan_disabilitas.tangankakiskd);
                $('#akelemahanskd').val(data.surat_keterangan_disabilitas.akelemahanskd);
                $('#aparaplegiskd').val(data.surat_keterangan_disabilitas.aparaplegiskd);
                $('#acelebral').val(data.surat_keterangan_disabilitas.acelebral);
                $('#anetralskd').val(data.surat_keterangan_disabilitas.anetralskd);
                $('#bnetralskd').val(data.surat_keterangan_disabilitas.bnetralskd);
                $('#brunguskd').val(data.surat_keterangan_disabilitas.brunguskd);
                $('#bwicaraskd').val(data.surat_keterangan_disabilitas.bwicaraskd);
                $('#cgrahitaskd').val(data.surat_keterangan_disabilitas.cgrahitaskd);
                $('#csyndromskd').val(data.surat_keterangan_disabilitas.csyndromskd);
                $('#dmentallskd').val(data.surat_keterangan_disabilitas.dmentallskd);
                $('#dperkembanganskd').val(data.surat_keterangan_disabilitas.dperkembanganskd);
                if (data.surat_keterangan_disabilitas.derajatskd1 == '1') {
                    $('#derajatskd1').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.derajatskd2 == '1') {
                    $('#derajatskd2').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.derajatskd3 == '1') {
                    $('#derajatskd3').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.derajatskd4 == '1') {
                    $('#derajatskd4').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.derajatskd5 == '1') {
                    $('#derajatskd5').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.derajatskd6 == '1') {
                    $('#derajatskd6').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.amjalanskd == '1') {
                    $('#amjalanskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.amperlahanskd == '1') {
                    $('#amperlahanskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.amalatskd == '1') {
                    $('#amalatskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.ammampuskd == '1') {
                    $('#ammampuskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bnaikskd == '1') {
                    $('#bnaikskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.btanggaskd == '1') {
                    $('#btanggaskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bnaeikskd == '1') {
                    $('#bnaeikskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.aextrimskd1 == '1') {
                    $('#aextrimskd1').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.aextrimskd2 == '1') {
                    $('#aextrimskd2').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.aextrimskd3 == '1') {
                    $('#aextrimskd3').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.aextrimskd4 == '1') {
                    $('#aextrimskd4').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.aextrimskd5 == '1') {
                    $('#aextrimskd5').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.aextrimskd6 == '1') {
                    $('#aextrimskd6').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.aextrimskd7 == '1') {
                    $('#aextrimskd7').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.aextrimskd8 == '1') {
                    $('#aextrimskd8').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bextrimskd1 == '1') {
                    $('#bextrimskd1').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bextrimskd2 == '1') {
                    $('#bextrimskd2').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bextrimskd3 == '1') {
                    $('#bextrimskd3').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bextrimskd4 == '1') {
                    $('#bextrimskd4').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bextrimskd5 == '1') {
                    $('#bextrimskd5').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bextrimskd6 == '1') {
                    $('#bextrimskd6').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bextrimskd7 == '1') {
                    $('#bextrimskd7').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.bextrimskd8 == '1') {
                    $('#bextrimskd8').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.gunakanskd == '1') {
                    $('#gunakanskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.skdada == '1') {
                    $('#skdada').prop('checked', true)
                }
                $('#skdsebutkan').val(data.surat_keterangan_disabilitas.skdsebutkan);
                if (data.surat_keterangan_disabilitas.tidakkakd == '1') {
                    $('#tidakkakd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.adaaskd == '1') {
                    $('#adaaskd').prop('checked', true)
                }
                $('#sebuttkannskd').val(data.surat_keterangan_disabilitas.sebuttkannskd);
                if (data.surat_keterangan_disabilitas.tidakpskd == '1') {
                    $('#tidakpskd').prop('checked', true)
                }
                if (data.surat_keterangan_disabilitas.adapskd == '1') {
                    $('#adapskd').prop('checked', true)
                }
                $('#sebutkanpskd').val(data.surat_keterangan_disabilitas.sebutkanpskd);
                $('#tanggalskd').val(datefmysql(data.surat_keterangan_disabilitas.tanggalskd));
                $('#dokterskd').val(data.surat_keterangan_disabilitas.dokterskd);
                // $('#catatan-tambahan-skd').val(data.surat_keterangan_disabilitas.catatan_tambahan_skd);

                $('#s2id_dokterskd a .select2c-chosen').html(data.surat_keterangan_disabilitas.nama_dokter);
                let jenis = data.surat_keterangan_disabilitas.nip_sip_skd?.trim().toUpperCase();
                if (jenis == 'NIP') {
                    $('#nip-sip-skd').prop('checked', true);
                } else if (jenis == 'SIP') {
                    $('#sip-nip-skd').prop('checked', true);
                }
                $('#modal_skd').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    // SKD ini wajib pakek RESETT KARENA KALAU GA PAKEK TIDAK TERESET
    function resetFormDataSkD() {
        $('#form_skd')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
        $('#nomorskd').val('');
        $('#lokasiskd').val('');
        $('#susunanskd').val('');
        $('#organskd').val('');
        $('#lainskd').val('');
        $('#ptskd').val('');
        $('#skdpt').val('');
        $('#thskd').val('');
        $('#jelasskd').val('');
        $('#tangankakiskd').val('');
        $('#akelemahanskd').val('');
        $('#aparaplegiskd').val('');
        $('#acelebral').val('');
        $('#anetralskd').val('');
        $('#bnetralskd').val('');
        $('#brunguskd').val('');
        $('#bwicaraskd').val('');
        $('#cgrahitaskd').val('');
        $('#csyndromskd').val('');
        $('#dmentallskd').val('');
        $('#dperkembanganskd').val('');
        $('#skdsebutkan').val('');
        $('#sebuttkannskd').val('');
        $('#sebutkanpskd').val('');
        $('#tanggalskd').val('');
        // $('#catatan-tambahan-skd').val('');
        $('#s2id_dokterskd a .select2c-chosen').empty();
        $('#dokterskd').val('');
    }

    // SKTD
    function cetakSKTD(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_sktd').modal('show');  
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/get_surat_keterangan_tidak_disabilitas') ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetFormDataSkTD();
                $('#id-layanan-pendaftaran-sktd').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-sktd').val(id_pendaftaran);
                $('#modal_sktd_title').html(
                    `<b>Form Surat Keterangan Tidak Disabilitas</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                $('#nomorsktd').val(data.surat_keterangan_tidak_disabilitas.nomorsktd);
                $('#namapasiensktd').val(data.pendaftaran_detail.pasien.nama);
                $('#ttlsktd').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#umursktd').val(data.pendaftaran_detail.pasien.umur_pasien);
                $('#jksktd').val(data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan');
                // $('#alamatsktd').val(data.pendaftaran_detail.pasien.alamat);
                $('#alamatsktd').val(
                    `${data.pendaftaran_detail.pasien.alamat} RT. ${data.pendaftaran_detail.pasien.no_rt} / RW. ${data.pendaftaran_detail.pasien.no_rw}, Kel. ${data.pendaftaran_detail.pasien.kelurahan}, Kec. ${data.pendaftaran_detail.pasien.kecamatan}, Kab. ${data.pendaftaran_detail.pasien.kabupaten}, Prop. ${data.pendaftaran_detail.pasien.provinsi}`
                );
                $('#keperluansktd').val(data.surat_keterangan_tidak_disabilitas.keterangan);
                $('#tanggalsktd').val(datefmysql(data.surat_keterangan_tidak_disabilitas.tanggalsktd));
                $('#doktersktd').val(data.surat_keterangan_tidak_disabilitas.doktersktd);
                $('#s2id_doktersktd a .select2c-chosen').html(data.surat_keterangan_tidak_disabilitas.nama_dokter);
                let jenis = data.surat_keterangan_tidak_disabilitas.nip_sip_sktd?.trim().toUpperCase();
                if (jenis == 'NIP') {
                    $('#nip-sip-sktd').prop('checked', true);
                } else if (jenis == 'SIP') {
                    $('#sip-nip-sktd').prop('checked', true);
                }
                $('#modal_sktd').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    // SKTD ini wajib pakek RESETT KARENA KALAU GA PAKEK TIDAK TERESET
    function resetFormDataSkTD() {
        $('#form_sktd')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
        $('#nomorsktd').val('');
        $('#tanggalsktd').val('');
        $('#s2id_doktersktd a .select2c-chosen').empty();
        $('#doktersktd').val('');
    }


    // HPDO BARU
    function cetakHPDO(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#btn-print-hpdo').empty();      
        // $('#modal_hpdo').modal('show');  
        $.ajax({
            type: 'GET',
            url: '<?= base_url('medical_check_up/api/medical_check_up/get_hasil_pemeriksaan_dokter_okupasi') ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#btn-simpan-hpdo').empty();
                let pasien = data.pendaftaran_detail.pasien;
                let layanan = data.pendaftaran_detail.layanan;
                let hpdo = data.hasil_pemeriksaan_dokter_okupasi;
                let gform_okupasi = data.questionnaire_mcu_okupasi;
                resetFormDataHpDO();
                $('#id-layanan-pendaftaran-hpdo').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-hpdo').val(id_pendaftaran);
                $('#modal_hpdo_title').html(
                    `<b>Form Hasil Pemeriksaan Dokter Okupasi</b> | No. RM: ${pasien.id_pasien}, Nama: ${pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${pasien.telp}</b></i>`
                );

                $('#namapasienhpdo').val(pasien.nama);
                $('#umurhpdo').val(pasien.umur_pasien);
                $('#jkhpdo').val(pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan');

                if (hpdo === null && gform_okupasi !== null) {

                    $('#pekerjaany-hpdo').val(gform_okupasi.pekerjaan)
                    $('#keluhan-hpdo').val(gform_okupasi.keluhan_pekerjaan)
                    $('#uraian-hpdo').val(gform_okupasi.uraian_kerja)
                    $('#masakerja-hpdo').val(gform_okupasi.masa_kerja)

                    if (gform_okupasi.rkf_bising == '1') {
                        $('#bising-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkf_bising == '0') {
                        $('#bising-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkf_ketinggian == '1') {
                        $('#ketinggian-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkf_ketinggian == '0') {
                        $('#ketinggian-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkf_getaran_tubuh == '1') {
                        $('#gtubuh-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkf_getaran_tubuh == '0') {
                        $('#gtubuh-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkf_getaran_tangan == '1') {
                        $('#gtangan-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkf_getaran_tangan == '0') {
                        $('#gtangan-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkf_suhu_panas_dingin == '1') {
                        $('#suhu-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkf_suhu_panas_dingin == '0') {
                        $('#suhu-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkf_radiasi == '1') {
                        $('#radiasi-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkf_radiasi == '0') {
                        $('#radiasi-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkf_lain_lainnya == '1') {
                        $('#lain-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkf_lain_lainnya == '0') {
                        $('#lain-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkk_debu == '1') {
                        $('#debu-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkk_debu == '0') {
                        $('#debu-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkk_zat_kimia == '1') {
                        $('#zatkimia-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkk_zat_kimia == '0') {
                        $('#zatkimia-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkk_pestisida == '1') {
                        $('#pestisida-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkk_pestisida == '0') {
                        $('#pestisida-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkk_asap == '1') {
                        $('#asap-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkk_asap == '0') {
                        $('#asap-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkk_lainnya == '1') {
                        $('#lainn-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkk_lainnya == '0') {
                        $('#lainn-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkb_bakteri == '1') {
                        $('#bakteri-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkb_bakteri == '0') {
                        $('#bakteri-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkb_virus == '1') {
                        $('#virus-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkb_virus == '0') {
                        $('#virus-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkb_parasit == '1') {
                        $('#parasit-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkb_parasit == '0') {
                        $('#parasit-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkb_jamur == '1') {
                        $('#jamur-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkb_jamur == '0') {
                        $('#jamur-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkb_lainnya == '1') {
                        $('#lainnya-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkb_lainnya == '0') {
                        $('#lainnya-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rke_gerakan_berulang == '1') {
                        $('#gberulang-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rke_gerakan_berulang == '0') {
                        $('#gberulang-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rke_angkut_berat == '1') {
                        $('#angkat-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rke_angkut_berat == '0') {
                        $('#angkat-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rke_berdiri_lebih_4_jam == '1') {
                        $('#berdiri-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rke_berdiri_lebih_4_jam == '0') {
                        $('#berdiri-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rke_duduk_lebih_4_jam == '1') {
                        $('#duduk-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rke_duduk_lebih_4_jam == '0') {
                        $('#duduk-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rke_posisi_tubuh_janggal == '1') {
                        $('#posisi-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rke_posisi_tubuh_janggal == '0') {
                        $('#posisi-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rke_pencahayaan_tidak_sesuai == '1') {
                        $('#pencahayaan-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rke_pencahayaan_tidak_sesuai == '0') {
                        $('#pencahayaan-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rke_bekerja_monitor_lebih_4_jam == '1') {
                        $('#bekerja-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rke_bekerja_monitor_lebih_4_jam == '0') {
                        $('#bekerja-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rke_lainnya == '1') {
                        $('#laint-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rke_lainnya == '0') {
                        $('#laint-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkp_beban_tidak_sesuai == '1') {
                        $('#bebankerja-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkp_beban_tidak_sesuai == '0') {
                        $('#bebankerja-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkp_shift == '1') {
                        $('#kerjagilir-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkp_shift == '0') {
                        $('#kerjagilir-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkp_ketidak_jelasan_tugas == '1') {
                        $('#ketidakjelasan-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkp_ketidak_jelasan_tugas == '0') {
                        $('#ketidakjelasan-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkp_pekerjaan_monoton == '1') {
                        $('#pekerjaan-monoton-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkp_pekerjaan_monoton == '0') {
                        $('#pekerjaan-monoton-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkp_konflik_tempat_kerja == '1') {
                        $('#konflik-kerja-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkp_konflik_tempat_kerja == '0') {
                        $('#konflik-kerja-hpdo-tidak').prop('checked', true);
                    }

                    if (gform_okupasi.rkp_tuntutan_kerja_tinggi == '1') {
                        $('#tuntutan-hpdo-ya').prop('checked', true);
                    }
                    if (gform_okupasi.rkp_tuntutan_kerja_tinggi == '0') {
                        $('#tuntutan-hpdo-tidak').prop('checked', true);
                    }

                } else if (hpdo !== null) {
                    $('#pekerjaany-hpdo').val(hpdo.pekerjaany_hpdo);
                    $('#uraian-hpdo').val(hpdo.uraian_hpdo);
                    $('#masakerja-hpdo').val(hpdo.masakerja_hpdo);
                    $('#keterangan-hpdo').val(hpdo.keterangan_hpdo);
                    $('#keluhan-hpdo').val(hpdo.keluhan_hpdo);

                    if (hpdo.bising_hpdo == '1') {
                        $('#bising-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.bising_hpdo == '0') {
                        $('#bising-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.ketinggian_hpdo == '1') {
                        $('#ketinggian-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.ketinggian_hpdo == '0') {
                        $('#ketinggian-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.gtubuh_hpdo == '1') {
                        $('#gtubuh-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.gtubuh_hpdo == '0') {
                        $('#gtubuh-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.gtangan_hpdo == '1') {
                        $('#gtangan-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.gtangan_hpdo == '0') {
                        $('#gtangan-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.suhu_hpdo == '1') {
                        $('#suhu-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.suhu_hpdo == '0') {
                        $('#suhu-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.radiasi_hpdo == '1') {
                        $('#radiasi-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.radiasi_hpdo == '0') {
                        $('#radiasi-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.lain_hpdo == '1') {
                        $('#lain-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.lain_hpdo == '0') {
                        $('#lain-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.debu_hpdo == '1') {
                        $('#debu-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.debu_hpdo == '0') {
                        $('#debu-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.zatkimia_hpdo == '1') {
                        $('#zatkimia-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.zatkimia_hpdo == '0') {
                        $('#zatkimia-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.pestisida_hpdo == '1') {
                        $('#pestisida-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.pestisida_hpdo == '0') {
                        $('#pestisida-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.asap_hpdo == '1') {
                        $('#asap-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.asap_hpdo == '0') {
                        $('#asap-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.lainn_hpdo == '1') {
                        $('#lainn-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.lainn_hpdo == '0') {
                        $('#lainn-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.bakteri_hpdo == '1') {
                        $('#bakteri-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.bakteri_hpdo == '0') {
                        $('#bakteri-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.virus_hpdo == '1') {
                        $('#virus-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.virus_hpdo == '0') {
                        $('#virus-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.parasit_hpdo == '1') {
                        $('#parasit-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.parasit_hpdo == '0') {
                        $('#parasit-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.jamur_hpdo == '1') {
                        $('#jamur-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.jamur_hpdo == '0') {
                        $('#jamur-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.lainnya_hpdo == '1') {
                        $('#lainnya-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.lainnya_hpdo == '0') {
                        $('#lainnya-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.gberulang_hpdo == '1') {
                        $('#gberulang-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.gberulang_hpdo == '0') {
                        $('#gberulang-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.angkat_hpdo == '1') {
                        $('#angkat-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.angkat_hpdo == '0') {
                        $('#angkat-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.berdiri_hpdo == '1') {
                        $('#berdiri-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.berdiri_hpdo == '0') {
                        $('#berdiri-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.duduk_hpdo == '1') {
                        $('#duduk-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.duduk_hpdo == '0') {
                        $('#duduk-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.posisi_hpdo == '1') {
                        $('#posisi-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.posisi_hpdo == '0') {
                        $('#posisi-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.pencahayaan_hpdo == '1') {
                        $('#pencahayaan-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.pencahayaan_hpdo == '0') {
                        $('#pencahayaan-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.bekerja_hpdo == '1') {
                        $('#bekerja-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.bekerja_hpdo == '0') {
                        $('#bekerja-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.laint_hpdo == '1') {
                        $('#laint-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.laint_hpdo == '0') {
                        $('#laint-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.bebankerja_hpdo == '1') {
                        $('#bebankerja-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.bebankerja_hpdo == '0') {
                        $('#bebankerja-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.kerjagilir_hpdo == '1') {
                        $('#kerjagilir-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.kerjagilir_hpdo == '0') {
                        $('#kerjagilir-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.ketidakjelasan_hpdo == '1') {
                        $('#ketidakjelasan-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.ketidakjelasan_hpdo == '0') {
                        $('#ketidakjelasan-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.pekerjaan_monoton_hpdo == '1') {
                        $('#pekerjaan-monoton-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.pekerjaan_monoton_hpdo == '0') {
                        $('#pekerjaan-monoton-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.konflik_kerja_hpdo == '1') {
                        $('#konflik-kerja-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.konflik_kerja_hpdo == '0') {
                        $('#konflik-kerja-hpdo-tidak').prop('checked', true);
                    }

                    if (hpdo.tuntutan_hpdo == '1') {
                        $('#tuntutan-hpdo-ya').prop('checked', true);
                    }
                    if (hpdo.tuntutan_hpdo == '0') {
                        $('#tuntutan-hpdo-tidak').prop('checked', true);
                    }

                    // if (hpdo.gejala_hpdo == '1') {
                    //     $('#gejala-hpdo-ya').prop('checked', true);
                    // }
                    // if (hpdo.gejala_hpdo == '0') {
                    //     $('#gejala-hpdo-tidak').prop('checked', true);
                    // }

                    if (hpdo.ketaksaan == '1') {
                        $('#ketaksaan-ringan').prop('checked', true);
                    }
                    if (hpdo.ketaksaan == '2') {
                        $('#ketaksaan-sedang').prop('checked', true);
                    }
                    if (hpdo.ketaksaan == '3') {
                        $('#ketaksaan-berat').prop('checked', true);
                    }

                    if (hpdo.konflikk == '1') {
                        $('#konflikk-ringan').prop('checked', true);
                    }
                    if (hpdo.konflikk == '2') {
                        $('#konflikk-sedang').prop('checked', true);
                    }
                    if (hpdo.konflikk == '3') {
                        $('#konflikk-berat').prop('checked', true);
                    }

                    if (hpdo.kuantitatif == '1') {
                        $('#kuantitatif-ringan').prop('checked', true);
                    }
                    if (hpdo.kuantitatif == '2') {
                        $('#kuantitatif-sedang').prop('checked', true);
                    }
                    if (hpdo.kuantitatif == '3') {
                        $('#kuantitatif-berat').prop('checked', true);
                    }

                    if (hpdo.kualitatif == '1') {
                        $('#kualitatif-ringan').prop('checked', true);
                    }
                    if (hpdo.kualitatif == '2') {
                        $('#kualitatif-sedang').prop('checked', true);
                    }
                    if (hpdo.kualitatif == '3') {
                        $('#kualitatif-berat').prop('checked', true);
                    }

                    if (hpdo.pengembang == '1') {
                        $('#pengembang-ringan').prop('checked', true);
                    }
                    if (hpdo.pengembang == '2') {
                        $('#pengembang-sedang').prop('checked', true);
                    }
                    if (hpdo.pengembang == '3') {
                        $('#pengembang-berat').prop('checked', true);
                    }

                    if (hpdo.tanggungjewab == '1') {
                        $('#tanggungjewab-ringan').prop('checked', true);
                    }
                    if (hpdo.tanggungjewab == '2') {
                        $('#tanggungjewab-sedang').prop('checked', true);
                    }
                    if (hpdo.tanggungjewab == '3') {

                        $('#tanggungjewab-berat').prop('checked', true);
                    }

                    $('#kesimpulanhpdo').summernote('code', hpdo.kesimpulanhpdo);
                    $('#saranhpdo').summernote('code', hpdo.saranhpdo);
                    $('#tanggal-hpdo').val(datefmysql(hpdo.tanggal_hpdo));
                    $('#dokter-hpdo').val(hpdo.dokter_hpdo);
                    $('#s2id_dokter-hpdo a .select2c-chosen').html(hpdo.nama_dokter);
                }
                let btnSimpanHPDO = "";
                let btnPrintHPDO = "";
                if (hpdo !== null) {
                    btnSimpanHPDO = `<button type="button" class="btn btn-dark waves-effect m-r-5" onclick="simpanHasilPemeriksaanDokterOkupasi()"><i class="far fa-save"></i> Update</button>`;
                    btnPrintHPDO = `<button type="button" class="btn btn-info waves-effect" onclick="cetaKHasilPemeriksaanDokterOkupasi('${id_pendaftaran}', '${id_layanan_pendaftaran}')"><i class="mdi mdi-printer m-r-5"></i> Cetak Hasil Pemeriksaan Dokter Okupasi</button>`;
                } else {
                    btnSimpanHPDO = `<button type="button" class="btn btn-info waves-effect" onclick="simpanHasilPemeriksaanDokterOkupasi()"><i class="fas fa-save"></i> Simpan</button>`;
                }
                $('#btn-simpan-hpdo').append(btnSimpanHPDO + btnPrintHPDO);
                $('#modal_hpdo').modal('show');
            },

            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // HPDO Baru ini wajib pakek RESETT KARENA KALAU GA PAKEK TIDAK TERESET
    // function resetFormDataHpDO() {
    //     console.log('contoh Reset');  
    //     $('#btn_hpdo').unbind('click');
    //     $('#form_hpdo')[0].reset();
    //     $("input[type='checkbox']").prop('checked', false);
    //     $("input[type='radio']").prop('checked', false);
    //     $('#tanggal-hpdo').val('');
    //     $('#s2id_dokter-hpdo a .select2c-chosen').empty();
    //     $('#dokter-hpdo').val('');
    //     $('#pekerjaan-hpdo').val('');
    //     $('#uraian-hpdo').val('');
    //     $('#masakerja-hpdo').val('');
    //     $('#berdasarkan-hpdo').val('');
    //     $('#keterangan-hpdo').val('');
    //     $('#namapasienhpdo').val('');  
    //     $('#umurhpdo').val('');  
    //     $('#jkhpdo').val('');  
    //     var kesimpulanContent = `
    //             <ol>
    //                 <li></li>
    //             </ol>
    //         `;

    //     $('#kesimpulanhpdo').summernote('code', kesimpulanContent);
    //     var saranContent = `
    //             <ol>
    //                 <li></li>
    //             </ol>
    //         `;

    //     $('#saranhpdo').summernote('code', saranContent);
    // }


    function resetFormDataHpDO() {
        console.log('contoh Reset');  
        $('#btn_hpdo').unbind('click');
        // Reset seluruh form
        if ($('#form_hpdo').length > 0) {
            $('#form_hpdo')[0].reset();
        }

        // Atur ulang semua checkbox dan radio
        $("input[type='checkbox'], input[type='radio']").prop('checked', false);

        // Reset Select2 jika ada
        if ($('#dokter-hpdo').length > 0) {
            $('#dokter-hpdo').val(null).trigger('change');
        }

        // Reset nilai untuk elemen input teks lainnya
        $('#tanggal-hpdo').val('');
        $('#pekerjaan-hpdo').val('');
        $('#uraian-hpdo').val('');
        $('#masakerja-hpdo').val('');
        $('#berdasarkan-hpdo').val('');
        $('#namapasienhpdo').val('');
        $('#umurhpdo').val('');
        $('#jkhpdo').val('');

        // Reset konten Summernote untuk kesimpulan
        if ($('#kesimpulanhpdo').length > 0) {
            $('#kesimpulanhpdo').summernote('code', `
                <ol>
                    <li></li>
                </ol>
            `);
        }

        // Reset konten Summernote untuk saran
        if ($('#saranhpdo').length > 0) {
            $('#saranhpdo').summernote('code', `
                <ol>
                    <li></li>
                </ol>
            `);
        }
    }







</script>