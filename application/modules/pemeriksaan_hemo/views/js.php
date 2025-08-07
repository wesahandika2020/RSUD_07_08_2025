<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    var JENIS_LAYANAN = '<?= $jenis ?>';
    var baseUrl = '<?= base_url('pemeriksaan_hemo/api/pemeriksaan_hemo') ?>';

    var KELAS_TINDAKAN = '<?= $kelas_tindakan ?>';
    var JENIS_RAWAT = '<?= $jenis_tindakan ?>';
    var RAD = 266;
    $('#tindakan_laboratorium').select2({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pemeriksaan_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    kelas: KELAS_TINDAKAN,
                    jenis: JENIS_RAWAT,
                    unit: $('#jenis_lab').val(),
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
            var total = (data.total !== '') ? ('Rp. ') + numberToCurrency(data.total) : '';

            var kelas = (data.kelas !== null) ? (' kelas ') + data.kelas : '';
            var bobot = (data.bobot !== null) ? (' ') + data.bobot : '';
            var instalasi = (data.instalasi !== null) ? (' ' + data.instalasi + ' ') : '';
            var markup = '<b>' + data.layanan + '</b> <br/>' + data.layanan_parent + '<br/>' + instalasi + data.jenis + bobot + ' ' + kelas + data.keterangan + '<br/>' + total;

            return markup;
        },
        formatSelection: function(data) {
            $('#tarif_tindakan_lab').val(data.total);
            var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
            var result = data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas + ' ' + data.keterangan;

            if (data.id !== '') {
                show_item_laboratorium(data.id_layanan);
            } else {
                result = '';
            }
            return result;
        }
    });

    $('#tindakan_radiologi').select2({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    kelas: KELAS_TINDAKAN,
                    jenis_tindakan: '<?= $jenis_tindakan ?>',
                    jenis_pemeriksaan: 'Pelayanan Radiologi',
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
            var total = data.total;
            var kelas = (data.kelas !== null) ? ((', kelas ') + data.kelas) : ((data.id !== '') ? 'Semua Kelas' : '');
            var jenis = (data.jenis !== null) ? ('<br/>' + data.jenis + '<br/>') : '<br/>';

            var markup = '<b>' + data.layanan + '</b>' + jenis + data.bobot + kelas + '<br/>' + numberToCurrency(total);
            return markup;
        },
        formatSelection: function(data) {
            $('#tarif_tindakan_rad').val(data.total);
            var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
            var jenis = (data.jenis !== null) ? data.jenis : '';
            var result = data.layanan + ', ' + jenis + ', ' + data.bobot + kelas;
            if (data.id === '') {
                result = '';
            }
            return result;
        }
    });

    $(function() {
        getListPemeriksaan(1);
        $("#wizard-form").bwizard();
        $('#jenis-rawat').val('<?= $jenis_tindakan; ?>');

        // btn search data
        $('#btn-search-data').click(function() {
            $('#modal-search').modal('show');
        });

        // btn reload data
        $('#btn-reload-data').click(function() {
            resetFormData();
            getListPemeriksaan(1);
        });

        // select filter layanan
        $('#layanan').change(function() {
            getListPemeriksaan(1);
        });

        // datepicker search tanggal
        $('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        // remove validasi keyup
        $('.validasi-input, .form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // remove validasi change
        $('.validasi-input, .select2-input, .select2c-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
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
                    var more = (page * 20) < data.total; // whether or not there are more results available

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

        // select2 dokter
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
                    var more = (page * 20) < data.total; // whether or not there are more results available

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
                $('#s2id_dokter_diagnosa a .select2c-chosen, #s2id_operator a .select2c-chosen, #dokter-detail, #s2id_dokter_rujuk a .select2-chosen, #s2id_dokter_rujuk_rad a .select2-chosen').html(data.nama);
                $('#operator, #id-dokter-detail, #dokter_rujuk, #dokter_rujuk_rad').val(data.id);
                return data.nama;
            }
        });

        $('#dokter-pengganti').select2c({
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
                    var more = (page * 20) < data.total; // whether or not there are more results available

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
                return data.nama;
            }
        });

        $('#dokter_rujuk').select2({
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
                    var more = (page * 20) < data.total; // whether or not there are more results available

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
                return data.nama;
            }
        });

        $('#dokter_rujuk_rad').select2({
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
                    var more = (page * 20) < data.total; // whether or not there are more results available

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
                return data.nama;
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
    });

    function getListPemeriksaan(p) {
        $('#page_now').val(p);
        $.ajax({
            type: 'GET',
            url: baseUrl + '/get_list_pemeriksaan_hemo/page/' + p + '/jenis/Hemodialisa',
            cache: false,
            data: $('#form_search').serialize() + '&jenis_igd=Hemodialisa',
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
                let disable_viewonly = '';
                let accountGroup = "<?= $this->session->userdata('account_group') ?>"

                $.each(data.data, function(i, v) {
                    let asal_kunjungan = v.jml_id_pendaftaran == 1 ? 'Pendaftaran' : 'Konsul';
                    let disable_cco_smtr_it = '';

                    if (v.tanggal_keluar === null) {
                        disabled_resep = '';
                    } else {
                        disabled_resep = 'disabled';
                    }
                    let detail = v.id_layanan_pendaftaran + '#' + v.id_pasien + '#' + v.nama + '#' + v.dokter + '#' + v.id_dokter + '#' + ((v.tanggal_lahir !== null) ? hitungUmur(v.tanggal_lahir) : '') + '#' + v.jenis_layanan + '#' + v.id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#hemodialisa';

                    // if (v.tindak_lanjut === null) {
                    //     disable_lanjut = '';
                    //     disable = '';
                    // } else {
                    //     disable_lanjut = 'disabled';
                    //     disable = 'disabled';
                    // }

                    if (v.tindak_lanjut === 'Batal') {
                        disable_lanjut = 'disabled';
                        disable = 'disabled';
                        disable_cco_smtr = 'disabled';
                        disable_cco_smtr_it = 'disabled';
                        disable_cco_smtr_btl = 'disabled';
                    } else {
                        if (v.tindak_lanjut === null) {
                            disable_lanjut = '';
                            disable = '';
                            disable_cco_smtr = 'disabled';
                            disable_cco_smtr_it = 'disabled';
                            disable_cco_smtr_btl = 'disabled';
                        } else {
                            if (v.tindak_lanjut === 'cco sementara') {
                                disable = '';
                                disable_cco_smtr = 'disabled';
                                if (v.tindak_lanjut_sementara !== '') {
                                    disable_cco_smtr_btl = '';
                                } else {
                                    disable_cco_smtr_btl = 'disabled';
                                }
                            } else if (v.tindak_lanjut === 'cco sementara it') {
                                disable = '';
                                disable_cco_smtr = 'disabled';
                                disable_cco_smtr_it = 'disabled';
                                if (v.tindak_lanjut_sementara !== '') {
                                    disable_cco_smtr_btl = '';
                                } else {
                                    disable_cco_smtr_btl = 'disabled';
                                }
                            } else {
                                disable_cco_smtr = '';
                                disable_cco_smtr_it = '';
                                disable_cco_smtr_btl = 'disabled';
                                disable = 'disabled';
                            }
                        }
                    }

                    if ((accountGroup === 'Komite Keperawatan') || accountGroup === 'Kasir') { //READ ONLY
                        disable_viewonly = 'disabled';
                    } else {
                        disable_viewonly = '';
                    }

                    if (v.tindak_lanjut === null && disable_viewonly == '') {
                        riwayat_rekammedis = '';
                    } else {
                        riwayat_rekammedis = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="riwayatPasien(\'' + v.id_pasien + '\')"><i class="fas fa-eye m-r-5"></i> Lihat Riwayat Rekam Medis Pasien</a>';
                    }

                    if (v.status_terlayani === 'Belum') {
                        status = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                    } else if (v.status_terlayani === 'Batal') {
                        disable = 'disabled';
                        status = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
                    } else {
                        status = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Diperiksa</span></h5>';
                    }

                    if (v.id_resep === null) {
                        status_resep = '-';
                    } else {
                        status_resep = '<i class="fas fa-check-circle"></i>';
                    }

                    let option = '';
                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    if (v.status_terlayani === 'Batal') {

                        <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                            option = '<td align="right">' + `<button ${disabled_resep} ${disable_viewonly} type="button" class="btn btn-secondary btn-xs mr-1" title="Klik untuk input resep" onclick="inputResep('${detail}')">
                                        <i class="fas fa-plus-circle mr-1"></i> Resep
                                </button>`;
                            option += '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                                '<div class="dropdown-menu">' + riwayat_rekammedis + '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>';
                            option += '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showListForm(\'' + v.id_pendaftaran + '\', \'' + v.id + '\', \'' + v.id_pasien + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Formulir</a>';
                        <?php else : ?>
                            option += '<td></td>';
                        <?php endif ?>

                    } else {

                        option = '<td align="right">' + `<button ${disabled_resep} ${disable_viewonly} type="button" class="btn btn-secondary btn-xs mr-1" title="Klik untuk input resep" onclick="inputResep('${detail}')">
                                        <i class="fas fa-plus-circle mr-1"></i> Resep
                                </button>`;
                        <?php if ($this->session->userdata('account_group') === 'Admin') : ?>

                            option += '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                                '<div class="dropdown-menu">' + riwayat_rekammedis + '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>';
                        <?php else : ?>
                            option += '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                                '<div class="dropdown-menu">' + riwayat_rekammedis + '<a class="dropdown-item ' + disable + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>';
                        <?php endif ?>

                        option += '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showListForm(\'' + v.id_pendaftaran + '\', \'' + v.id + '\', \'' + v.id_pasien + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Formulir</a>';
                        // option += '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriAsuhanKeperawatan('+v.id_pendaftaran+','+v.id+')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Asuhan Keperawatan</a>';
                        // option += '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriLaporanHemodialisa('+v.id_pendaftaran+','+v.id+')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Laporan HD</a>';

                        (v.tindak_lanjut === 'RS Lain' ? option += '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratRujukan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-file-medical-alt m-r-5"></i>Buat Surat Rujukan</a>' : '');
                        option += '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="settingPerlakuanKhusus(\'' + v.id_pasien + '\')"><i class="fas fa-fw fa-thumbtack m-r-5"></i>Set Perlakuan Khusus</a>';
                        option += '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showRekapStatusBED()"><i class="fas fa-fw fa-bed m-r-5"></i>Rekap Ketersediaan Bed</a>';
                        option += '<a class="dropdown-item ' + disable_lanjut + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="konsulKlinikLain(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-plus m-r-5"></i>Konsul Klinik Lain</a>';
                        option += '<a class="dropdown-item ' + disable_lanjut + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut(' + v.id_pendaftaran + ',' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter + '\', \'HD_' + asal_kunjungan + '\')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>';
                        <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                            option += '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluar(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar</a>';
                        <?php endif ?>

                        // WAHYU ADD
                        if (asal_kunjungan == 'Konsul') {
                            option += `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalKonsul('${v.id_pendaftaran}', '${v.id}', '${v.nama}', '${v.id_pasien}')"><i class="fas fa-ban m-r-5"></i>Batal Konsul</a>`;
                        }
                        // END WAHYU ADD

                        <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                            option += '<a class="dropdown-item ' + disable_cco_smtr_it + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementaraIt(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>status keluar sementara Billing</a>';
                        <?php elseif ($this->session->userdata('account_group') === 'Rekam Medis' || $this->session->userdata('account_group') === 'Admin Rekam Medis' || $this->session->userdata('account_group') === 'Admin Pelayanan Medik' || $this->session->userdata('account_group') === 'Dokter Spesialis RM' || $this->session->userdata('account_group') === 'Dokter Spesialis RM Rehab') : ?>
                            option += '<a class="dropdown-item ' + disable_cco_smtr + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara</a>';
                        <?php endif ?>

                        <?php if ($this->session->userdata('account_group') === 'Admin' || $this->session->userdata('account_group') === 'Rekam Medis' || $this->session->userdata('account_group') === 'Admin Rekam Medis' || $this->session->userdata('account_group') === 'Admin Pelayanan Medik' || $this->session->userdata('account_group') === 'Dokter Spesialis RM' || $this->session->userdata('account_group') === 'Dokter Spesialis RM Rehab') : ?>
                            option += '<a class="dropdown-item ' + disable_cco_smtr_btl + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar Sementara</a>';
                        <?php endif ?>

                        <?php if ($this->session->userdata('account_group') === 'Admin' || $this->session->userdata('account_group') === 'Hemodialisa' || $this->session->userdata('account_group') === 'Dokter Spesialis') : ?>
                            if (v.jml_id_pendaftaran == 1) {
                                v.tindak_lanjut !== null ?
                                    option += '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formSuratKontrolDoker(' + v.id_pendaftaran + ', ' + v.id + ',\'dokter\')"><i class="fas fa-fw fa-file m-r-5"></i>Surat Keterangan Kontrol (SKK)</a>' :
                                    option += '<a class="dropdown-item disabled waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formSuratKontrolDoker(' + v.id_pendaftaran + ', ' + v.id + ',\'dokter\')"><i class="fas fa-fw fa-file m-r-5"></i>Surat Keterangan Kontrol (SKK)</a>'
                            }
                        <?php endif ?>

                        option += '</div>' + '</div>' + '</td>';

                    }

                    v.id_skk === null ? status_skk = '-' : status_skk = '<i class="fas fa-check-circle"></i>';

                    let tindakLanjut = v.tindak_lanjut !== null ? v.tindak_lanjut : '-';

                    if (tindakLanjut === 'cco sementara it') {
                        tindakLanjut = 'cco sementara billing';
                    }

                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td align="center">' + v.no_register + '</td>' +
                        '<td align="center">' + v.id_pasien + '</td>' +
                        '<td align="center" class="nowrap">' + ((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '') + '</td>' +
                        '<td align="center" class="nowrap">' + ((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '') + '</td>' +
                        '<td class="nowrap">' + v.nama + '</td>' +
                        '<td class="nowrap">' + v.dokter + '</td>' +
                        '<td align="center" class="nowrap">' + v.jenis_layanan + '</td>' +
                        '<td align="center" class="nowrap">' + asal_kunjungan + '</td>' +
                        '<td align="center">' + status + '</td>' +
                        '<td align="center">' + status_resep + '</td>' +
                        '<td align="center">' + status_skk + '</td>' +
                        '<td align="center">' + tindakLanjut + '</td>' + option +
                        '</tr>';
                    $('#table_data tbody').append(html);
                });

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function paging(p) {
        getListPemeriksaan(p);
    }

    function resetFormData() {
        // form search
        $('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>');
        $('#layanan, #no-register-search, #no-rm-search, #nik-search, #nama-search').val('');

        $('.custom-textarea, .custom-form').val('');
        $('.select2-chosen').html('');
        $('#unit').val('259');
        $('#s2id_unit a .select2c-chosen').html('Hemodialisa');
        $('#table-diagnosa tbody, #table-tindakan tbody').empty();

        // validasi
        syams_validation_remove('.validasi-input');
        syams_validation_remove('.select2-input');
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

    // modal detail pemeriksaan
    function detailPemeriksaan(id_pendaftaran, id_layanan) {
        $('#wizard-form').bwizard('show', '0');

        setTanggalPencarian();

        $('#id-layanan').val(id_layanan);
        $('#id-pendaftaran-pasien').val(id_pendaftaran);
        $('#id-dftr-dpmp').val(id_pendaftaran);

        get_pemeriksaan_lab(id_layanan);
        get_pemeriksaan_rad(id_layanan);
        getPemeriksaanFisio(id_layanan);
        getDataDPMPHemo(id_pendaftaran, id_layanan);

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let umur = '';
                let kelamin = '';
                let pasien = data.pasien;
                let layanan = data.layanan;
                let anamnesa = data.anamnesa[0];

                if (pasien !== null) {
                    if (layanan.tindak_lanjut === 'cco sementara') {
                        $('button[title="Tambah Tindakan"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah tindakan, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="tambah bhp"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah BHP, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="order pemeriksaan lab"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order Pemeriksaan Laboratorium, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="order pemeriksaan rad"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order Pemeriksaan Radiologi, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="permintaan darah"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Permintaan Darah, silahkan hubungi <b>Kasir</b>')
                        })
                    } else {
                        $('button[title="Tambah Tindakan"]').off('click').attr('onclick', 'addTindakan()')
                        $('button[title="tambah bhp"]').off('click').attr('onclick', 'addBHP(); return false;')
                        $('button[title="order pemeriksaan lab"]').off('click').attr('onclick', 'request_lab()')
                        $('button[title="order pemeriksaan rad"]').off('click').attr('onclick', 'request_rad()')
                        $('button[title="permintaan darah"]').off('click').attr('onclick', 'addDarah()')
                    }
                    if (pasien.kelamin == 'L') {
                        kelamin = 'Laki - laki';
                    } else {
                        kelamin = 'Perempuan';
                    }

                    if (pasien.tanggal_lahir !== null) {
                        umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
                    }

                    $('#id-pasien').val(pasien.id_pasien);
                    $('#nama-detail').html(pasien.nama);
                    $('#nik-detail').html(pasien.no_identitas);
                    $('#no-rm-detail').html(pasien.id_pasien);
                    $('#no-register-detail').html(pasien.no_register);
                    $('#kelamin-detail').html(kelamin);
                    $('#umur-detail').html(umur);
                    $('#agama-detail').html(pasien.agama);
                    $('#telp-detail').html(pasien.telp);
                    $('#alamat-detail').html(pasien.alamat);
                    $('#alergi-detail').html(pasien.alergi);
                    $('#alergi').val(pasien.alergi);

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
                    $('#layanan-detail').html(layanan.jenis_layanan);
                    $('#no-antrian-detail').html(layanan.no_antrian);
                    $('#dokter-detail').html(layanan.dokter);
                    $('#id-penjamin-tindakan').val(layanan.id_penjamin);

                    let cara_bayar = '<b>' + layanan.cara_bayar + ' ' + ((layanan.id_penjamin !== null) ? '(' + layanan.penjamin + ')' : '') + '</b>';
                    $('#cara-bayar-detail').html(cara_bayar);
                    $('#no-polish-detail').html(layanan.no_polish);
                    $('#no-sep-detail').html(layanan.no_sep);
                    if (data.penjamin_pasien) {
                        $('#hak-kelas-pasien').html(data.penjamin_pasien.hak_kelas || '');
                    }

                    $('#identitas-pasien-anamnesa, #identitas-pasien-diagnosa, #identitas-pasien-darah, #identitas-pasien-tindakan, #identitas-pasien-bhp').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

                    $('#dokter').val(layanan.id_dokter);
                    $('#s2id_dokter a .select2c-chosen').html(layanan.dokter);

                    $('#operator').val(layanan.id_dokter);
                    $('#s2id_operator a .select2c-chosen').html(layanan.dokter);

                    // anamnesa
                    if (typeof anamnesa !== 'undefined' && typeof anamnesa !== null) {
                        showAnamnesa(anamnesa);
                    }

                    // diagnosa
                    $('#prioritas').val('Utama');
                    if (data.diagnosa.length > 0) {
                        showDiagnosa(data.diagnosa);
                    }

                    // diagnosa ruang lain
                    if (data.diagnosa_ruang_lain.length > 0) {
                        $('#diagnosa-ruang-lain').show();
                        showDiagnosaRuangLain(data.diagnosa_ruang_lain);
                    } else {
                        $('#diagnosa-ruang-lain').hide();
                        $('#table-diagnosa-ruang-lain tbody').empty();
                    }

                    // tindakan
                    $('#kelas-tindakan').val('<?= $kelas_tindakan ?>');
                    $('#profesi').val(8);
                    $('#jumlah-tindakan').val(1);
                    $('#unit').val('259');
                    $('#s2id_unit a .select2c-chosen').html('Hemodialisa');

                    if (data.tindakan.length > 0) {
                        showTindakan(data.tindakan);
                    }

                    // BHP
                    if (data.bhp.length > 0) {
                        showBHP(data.bhp);
                    }

                    $('#modal-pemeriksaan').modal('show');
                    $('#modal-pemeriksaan-label').html('Form Pemeriksaan Hemodialisa');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {

            }
        });
    }

    function showAnamnesa(anamnesa) {
        if (anamnesa !== null && anamnesa !== 'undefined') {
            $('#keluhan-utama').val(anamnesa.keluhan_utama);
            $('#riwayat-penyakit-keluarga').val(anamnesa.riwayat_penyakit_keluarga);
            $('#riwayat-penyakit-sekarang').val(anamnesa.riwayat_penyakit_sekarang);
            $('#riwayat-penyakit-dahulu').val(anamnesa.riwayat_penyakit_dahulu);
            $('#anamnesa-sosial').val(anamnesa.anamnesa_sosial);

            $('#keadaan-umum').val(anamnesa.keadaan_umum);
            $('#kesadaran').val(anamnesa.kesadaran);
            $('#gcs').val(anamnesa.gcs);
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
            $('#s_soap').val(anamnesa.s_soap);
            $('#o_soap').val(anamnesa.o_soap);
            $('#a_soap').val(anamnesa.a_soap);
            $('#p_soap').val(anamnesa.p_soap);
            $('#s_sbar').val(anamnesa.s_sbar);
            $('#b_sbar').val(anamnesa.b_sbar);
            $('#a_sbar').val(anamnesa.a_sbar);
            $('#r_sbar').val(anamnesa.r_sbar);
            $('#usul_tindak_lanjut').val(anamnesa.usul_tindak_lanjut);
        }

    }

    function konfirmasiSimpan() {
        let subspesialis = $('#subspesialis').val();
        let dokter = $('#dokter').val();

        if (subspesialis === '') {
            syams_validation('#subspesialis', 'Kolom subspesialis harus diisi.')
            $('#wizard-form').bwizard('show', '0');
            return false;
        }

        if (dokter === '') {
            syams_validation('#dokter', 'Kolom dokter harus diisi.')
            $('#wizard-form').bwizard('show', '1');
            return false;
        }

        if ($('.number-diag').length < 1) {
            swalAlert('warning', 'Validasi', 'Diagnosa pasien harus diisi.')
            $('#wizard-form').bwizard('show', '2');
            return false;
        }

        bootbox.dialog({
            message: "Anda yakin akan menyimpan hasil pemeriksaan ?",
            title: "Simpan Pemeriksaan Hemodialisa",
            buttons: {
                batal: {
                    label: '<i class="fas fa-fw fa-window-close"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-fw fa-check-circle"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        simpanDataPemeriksaan();
                    }
                }
            }
        });
    }

    function simpanDataPemeriksaan() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_pemeriksaan") ?>',
            data: $('#form-pemeriksaan').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status) {
                    messageEditSuccess();
                    $('#modal-pemeriksaan').modal('hide');
                    getListPemeriksaan($('#page_now').val());
                } else {
                    messageEditFailed();
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function request_lab() {
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
                                '<input type="checkbox" ' + checked + ' name="itemdata" value="' + v.id + '|' + v.item + '" class="check_item_lab" />';
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
            '<td align="center"><input type="hidden" name="tindakan_lab[]" value="' + id_tindakan + '"/>' + tindakan + '</td>' +
            '<td align="center"><input type="hidden" name="item_lab_label[]" value="' + itemlabel + '" />' + itemlabel + '</td>' +
            '<td align="center"><input type="hidden" name="item_lab[]" value="' + itemdata + '" />' + numberToCurrency(tarif) + '</td>' +
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
            '<td align="center"><input type="hidden" name="tindakan_rad[]" value="' + id_tindakan + '"/>' + tindakan + '</td>' +
            '<td align="center"><input type="hidden" name="item_rad_label[]" value="' + itemlabel + '" />' + itemlabel + '</td>' +
            '<td align="center"><input type="hidden" name="item_rad[]" value="' + itemdata + '" />' + numberToCurrency(tarif) + '</td>' +
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
                    data: $('#formlab').serialize() + '&id_layanan=' + id_layanan_pendaftaran + '&dokter=' + id_dokter,
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
                            '<tr><td width="15%"><strong>Waktu Order</strong></td><td>' + ((v.waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '') + '</td></tr>' +
                            '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>' + ((v.waktu_hasil !== null) ? datetimefmysql(v.waktu_hasil) : '') + '</td></tr>' +
                            '<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>' + v.dokter + '</td></tr>' +
                            '<tr><td width="15%"><strong>Analis Laboratorium</strong></td><td>' + v.analis_lab + '</td></tr>' +
                            '<tr><td width="15%"></td>' +
                            '<td><button title="Klik untuk melihat order laboratorium" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetak_pemeriksaan_laboratorium(' + v.id + ')"><i class="fa fa-print"></i> Nota Order</button>' +
                            '<button title="Klik untuk melihat hasil laboratorium" type="button" class="btn btn-secondary btn-xxs" onclick="cetak_hasil_laboratorium(' + v.id + ')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>' +
                            '</tr>' +
                            hapus_lab +
                            '</table>';
                        $('#req_lab').append(str);

                        str = '<table class="table table-hover table-striped table-sm color-table info-table">' +
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
                    data: $('#formrad').serialize() + '&id_layanan=' + id_layanan_pendaftaran + '&dokter=' + id_dokter,
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
                        console.log(data);
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
                            '<tr><td width="15%"><strong>Waktu Order</strong></td><td>' + ((v.waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '') + '</td></tr>' +
                            '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>' + ((v.waktu_hasil !== null) ? datetimefmysql(v.waktu_hasil) : '') + '</td></tr>' +
                            '<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>' + v.dokter + '</td></tr>' +
                            '<tr><td width="15%"><strong>Radiografer</strong></td><td>' + v.radiografer + '</td></tr>' +
                            '<tr><td width="15%"></td>' +
                            '<td><button title="Klik untuk melihat order radiologi" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetak_pemeriksaan_radiologi(' + v.id + ')"><i class="fa fa-print"></i> Nota Order</button>' +
                            '<button title="Klik untuk melihat hasil radiologi" type="button" class="btn btn-secondary btn-xxs" onclick="cetak_hasil_radiologi(' + v.id + ')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>' +
                            '</tr>' +
                            hapus_rad +
                            '</table>';
                        $('#req_rad').append(str);

                        str = '<table class="table table-hover table-striped table-sm color-table info-table">' +
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

    // DPMP
    function addDPMPHemo() {

        let status = $('#dpmp-status').text();
        let id_dftr_dpmp = $('#id-dftr-dpmp').val();

        if (status === '') {
            let i = $('.dpmp-rec-hemo').length;
            let html = /* html */ `
                <tr class="dpmp-rec-hemo">
                    <td class="center">${i + 1}</td>
                    <td class="left"><?php echo date("d/m/Y H:i") ?></td>
                    <td class="center">DPMP</td>
                    <td class="center">
                        <em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i><span id="dpmp-status">Request</span></em>
                        <input type="hidden" name="dpmp_order[]" id="dpmp-order"><input type="hidden" name="id_dftr_hemodialisis[]" value="${id_dftr_dpmp}"></td>
                    <td class="center">
                        <button title="Hapus Order DPMP" type="button" class="btn btn-secondary btn-xs" onclick="removeDPMPHemo(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            `;
            $('#table-order-dpmp-hemo tbody').append(html)
        } else {
            swalAlert('info', 'Informasi', 'Harap simpan dan selesaikan Permintaan DPMP terlebih dahulu!')
        }
    }

    function removeDPMPHemo(its) {
        var parent = its.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
        var jml = $('.dpmp-rec-hemo').length;
        for (i = 0; i <= jml; i++) {
            $('.dpmp-rec-hemo:eq(' + i + ')').children('td:eq(0)').html(i + 1)
        }
    }

    function getDataDPMPHemo(id_pendaftaran, id_layanan) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_dpmp") ?>/id_daftar/' + id_pendaftaran,
            dataType: 'JSON',
            success: function(data) {
                $('#table-order-dpmp-hemo tbody').empty();
                if (data !== undefined) {
                    $.each(data.data, function(i, v) {
                        console.log(v);

                        let status = '';
                        let button = '';
                        if (v.status === 'Belum') {
                            status =
                                '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Order</em>';
                            button =
                                '<button title="Batal Order DPMP" type="button" class="btn btn-secondary btn-xs" onclick="BatalDPMPHemo(' +
                                v.od_id + ', ' + id_pendaftaran + ',' + id_layanan +
                                ')"><i class="fas fa-trash-alt"></i></button>';
                        } else if (v.status === 'Batal') {
                            status =
                                '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
                        } else if (v.status === 'Konfirm') {
                            status =
                                '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';
                        }

                        let html = /* html */ `
                            <tr class="dpmp-rec-hemo">
                                <td class="center">${(++i)}</td>
                                <td>${datetimerezmysql(v.waktu_order)}</td>
                                <td class="center">DPMP</td>
                                <td class="center">${status}</td>
                                <td class="center">${button}</td>
                            </tr>
                        `;
                        $('#table-order-dpmp-hemo tbody').append(html);
                    })

                } else {

                    $('#table-order-dpmp-hemo tbody').empty();
                }

            }
        })
    }

    function BatalDPMPHemo(id, id_pendaftaran, id_layanan) {
        let id_layanan_pendaftaran = id_layanan;
        bootbox.dialog({
            message: "Anda yakin akan membatalkan Order ini?",
            title: "Batal Order DPMP",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Simpan',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url("gizi/api/gizi/batal_order_dpmp") ?>',
                            data: 'id_order=' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {

                                if (data.status === true) {
                                    messageCustom(data.pesan, 'Success');
                                    let ini = '9';
                                    detailPemeriksaan(ini, id_pendaftaran, id_layanan_pendaftaran);
                                } else {
                                    customAlert('Batal Order DPMP Rawat Inap', data.pesan);
                                }
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

    function datetimerezmysql(waktu) {

        let tm = waktu.split('-');
        let gm = tm[2];
        let sx = tm[2].split(':');
        let fx = sx[0].split(' ');
        return fx[0] + '/' + tm[1] + '/' + tm[0] + ' ' + fx[1] + ':' + sx[1];
    }

    function batalKonsul(idPendaftaran, idLayananPendaftaran, nama, noRM) {
        let textAlert = `Apakah anda yakin akan membatalkan konsultasi pasien dengan nama [ ${noRM} - ${nama} ] ?`;

        Swal.fire({
            title: 'Batal Konsul!',
            text: textAlert,
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
            confirmButtonText: '<i class="fas fa-trash mr-1"></i>Hapus',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("pemeriksaan_hemo/api/Pemeriksaan_hemo/batal_konsul") ?>',
                    data: {
                        id_pendaftaran: idPendaftaran,
                        id_layanan_pendaftaran: idLayananPendaftaran,
                        jenis_layanan: JENIS_LAYANAN,
                    },
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {
                        if (data.status) {
                            messageCustom(data.message, 'Success');
                            getListPemeriksaan($('#page_now').val());
                        } else {
                            messageCustom(data.message, 'Error');
                        }
                    },
                    complete: function(data) {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
                    }
                });
            }
        });
    }
</script>