<script src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    var JENIS_LAYANAN = '<?= $jenis ?>';
    var baseUrl = '<?= base_url('pemeriksaan_igd/api/pemeriksaan_igd') ?>';

    $(function() {
        getListPemeriksaan(1);
        $("#wizard-form").bwizard();
        $("#wizard-form-asessment-foto").bwizard();
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
        $('.validasi-input').keyup(function() {
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
                $('#s2id_dokter_diagnosa a .select2c-chosen, #s2id_operator a .select2c-chosen, #dokter-detail')
                    .html(data.nama);
                $('#operator, #id-dokter-detail').val(data.id);
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
                return data.nama;
            }
        });

        $('#dokter_rujuk').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokterujukigd_auto') ?>",
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
                return data.nama;
            }
        });

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
        $('#s_yalg').hide();
        $('#r_yalg').hide();
        $('#s_yalg').val('');
        $('#r_yalg').val('');
        $('#yalg').change(function() {
            $('#yalg').attr('checked', true);
            $('#yalg').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#yalg').val(val);
            });
            if ($('#yalg').val() > 0) {
                $('#s_yalg').show();
                $('#r_yalg').show();
            } else {
                $('#s_yalg').hide();
                $('#r_yalg').hide();
                $('#s_yalg').val('');
                $('#r_yalg').val('');

            }
        });
        $('#talg').change(function() {
            $('#talg').attr('checked', true);
            $('#talg').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#talg').val(val);
            });
            if ($('#talg').val() > 0) {
                $('#yalg').attr('checked', false);
                // $('#yalg').removeAttribute('checked');
                $('#s_yalg').hide();
                $('#r_yalg').hide();
                $('#s_yalg').val('');
                $('#r_yalg').val('');
            } else {


            }
        });

        $('#lain_inp').hide();
        $('#x_lain').hide();
        $('#ekg_lain').hide();
        $('#rpk_lain').hide();
        $('#text_yrpd').hide();
        $('#text_yrpd').val('');
        $('#yrpd').change(function() {
            $('#yrpd').attr('checked', true);
            $('#yrpd').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#yrpd').val(val);
            });
            if ($('#yrpd').val() > 0) {
                $('#text_yrpd').show();
            } else {
                $('#text_yrpd').hide();
                $('#text_yrpd').val('');

            }
        });
        $('#lainlain').change(function() {
            $('#lainlain').attr('checked', true);
            $('#lainlain').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#lainlain').val(val);
            });
            if ($('#lainlain').val() > 0) {
                $('#lain_inp').show();
            } else {
                $('#lain_inp').hide();
                $('#lain_inp').val('');

            }
        });
        $('#text_infodarlain').hide();
        $('#text_infodarlain').val('');
        $('#infodarlain').change(function() {
            $('#infodarlain').attr('checked', true);
            $('#infodarlain').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#infodarlain').val(val);
            });
            if ($('#infodarlain').val() > 0) {
                $('#text_infodarlain').show();
            } else {
                $('#text_infodarlain').hide();
                $('#text_infodarlain').val('');

            }
        });
        $('#text_rptlain2').hide();
        $('#text_rptlain2').val('');
        $('#rptlain2').change(function() {
            $('#rptlain2').attr('checked', true);
            $('#rptlain2').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#rptlain2').val(val);
            });
            if ($('#rptlain2').val() > 0) {
                $('#text_rptlain2').show();
            } else {
                $('#text_rptlain2').hide();
                $('#text_rptlain2').val('');

            }
        });
        $('#text_rpkellain2').hide();
        $('#text_rpkellain2').val('');
        $('#rpkellain2').change(function() {
            $('#rpkellain2').attr('checked', true);
            $('#rpkellain2').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#rpkellain2').val(val);
            });
            if ($('#rpkellain2').val() > 0) {
                $('#text_rpkellain2').show();
            } else {
                $('#text_rpkellain2').hide();
                $('#text_rpkellain2').val('');

            }
        });
        $('#x_lainlain').change(function() {
            $('#x_lainlain').attr('checked', true);
            $('#x_lainlain').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#x_lainlain').val(val);
            });
            if ($('#x_lainlain').val() > 0) {
                $('#x_lain').show();
            } else {
                $('#x_lain').hide();
                $('#x_lain').val('');

            }
        });
        $('#ekg_ya').change(function() {
            $('#ekg_ya').attr('checked', true);
            $('#ekg_ya').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#ekg_ya').val(val);
            });
            if ($('#ekg_ya').val() > 0) {
                $('#ekg_lain').show();
            } else {
                $('#ekg_lain').hide();
                $('#ekg_lain').val('');

            }
        });
        $('#rpk_ya').change(function() {
            $('#rpk_ya').attr('checked', true);
            $('#rpk_ya').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#rpk_ya').val(val);
            });
            if ($('#rpk_ya').val() > 0) {
                $('#rpk_lain').show();
            } else {
                $('#rpk_lain').hide();
                $('#rpk_lain').val('');

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


        $('#btn-upload-file-igd').click(function() {
            uploadFileRM($('#id-pendaftaran').val(), $('#id-layanan').val(), $('#id-pasien').val());
        })
    });

    function getListPemeriksaan(p) {
        $('#page_now').val(p);

        $.ajax({
            type: 'GET',
            url: baseUrl + '/get_list_pemeriksaan_igd/page/' + p + '/jenis/IGD',
            cache: false,
            data: $('#form_search').serialize() + '&layanan=' + $('#layanan').val(),
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
                let disable_resep = '';
                let bed = '-';
                let disable_viewonly = '';
                let accountGroup = "<?= $this->session->userdata('account_group') ?>";

                $.each(data.data, function(i, v) {
                    if (v.tindak_lanjut === null) {
                        disable_lanjut = '';
                        disable = '';
                    } else {
                        if (v.tindak_lanjut === 'cco sementara') {
                            disable_lanjut = 'disabled';
                            disable = '';
                        } else {
                            disable_lanjut = 'disabled';
                            disable = 'disabled';
                        }
                        // if (v.penjamin === 'BPJS' || v.penjamin === 'Jaminan Covid Kemenkes'){
                        //     disable = '';    
                        // } else {
                        //     disable = 'disabled';    
                        // }
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

                    let btnEntriFormulirPasien = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showListForm(\'' + v.id_pendaftaran + '\', \'' + v.id + '\', \'' + v.id_pasien + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Formulir</a>';

                    if (v.status_terlayani === 'Belum') {
                        status =
                            '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin mr-1"></i>Belum</i></span>';
                        disable_resep = '';
                    } else if (v.status_terlayani === 'Batal') {
                        status =
                            '<h5><span class="label label-danger"><i class="fas fa-fw fa-times mr-1"></i>Batal</span></h5>';
                    } else {
                        status =
                            '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle mr-1"></i>Selesai</span></h5>';
                        disable_resep = '';
                    }
                    if (v.status_terlayani === 'Batal' || v.tindak_lanjut !== null && v.tindak_lanjut !== 'cco sementara') {
                        disable_resep = 'disabled';
                    }

                    if (v.id_resep === null) {
                        status_resep = '-';
                    } else {
                        status_resep = '<i class="fas fa-check-square"></i>';
                    }

                    if (v.triase === '1') {
                        status_triase = '<i class="fas fa-check-square"></i>';
                    } else {
                        status_triase = '-';
                    }

                    if (v.jenis_pendaftaran == 'Poliklinik') {
                        btnBatalKonsul = `<a class="dropdown-item waves-effect ${disable_resep} waves-light btn-xs" href="javascript:void(0)" onclick="batalKonsul('${v.id_pendaftaran}', '${v.id}', '${v.nama}', '${v.id_pasien}')"><i class="fas fa-ban m-r-5"></i>Batal Konsul</a>`;
                    } else {
                        btnBatalKonsul = '';
                    }

                    let detail = v.id + '#' + v.id_pasien + '#' + v.nama + '#' + v.dokter + '#' + v
                        .id_dokter + '#' + hitungUmur(v.tanggal_lahir) + '#' + v.jenis_layanan + '#' + v
                        .id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#rajal';
                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let tindakLanjut = v.tindak_lanjut !== null ? v.tindak_lanjut : '-';

                    if (tindakLanjut === 'cco sementara it') {
                        tindakLanjut = 'cco sementara billing';
                    }

                    if (v.tindak_lanjut == 'cco sementara it') {
                        disable_resep = '';
                    }

                    let html = '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + v.no_register + '</td>' +
                        '<td>' + v.id_pasien + '</td>' +
                        '<td>' + ((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '') + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td align="center">' + v.dokter + '</td>' +
                        '<td align="center">' + v.jenis_igd + '</td>' +
                        '<td align="center">' + v.cara_bayar + (v.cara_bayar === 'Asuransi' ? ' ( ' + v.penjamin + ' )' : (v.cara_bayar === 'Gratis' ? ' ( ' + v.penjamin + ' )' : '')) + '</td>' +
                        '<td align="center">' + status + '</td>' +
                        '<td align="center">' + status_triase + '</td>' +
                        '<td align="center">' + status_resep + '</td>' +
                        '<td align="center">' + tindakLanjut + '</td>' +
                        '<td align="right">' +
                        '<button ' + disable_resep + ' ' + disable_viewonly + ' type="button" class="btn btn-secondary btn-xs mr-1" title="Klik untuk input resep" onclick="inputResep(\'' + detail + '\')"><i class="fas fa-plus-circle mr-1"></i>Resep</button>' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        btnEntriFormulirPasien +
                        riwayat_rekammedis +
                        <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                    // '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriPengkajianAwalIGD(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pengkajian Awal</a>' +
                    // PIM
                    // '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriPengkajianMaternal(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pengkajian Maternal</a>' +
                    // '<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriPengkajianAwalNeonatus(' + v.id_pendaftaran + ',' + v.id + ',\'' + bed + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pengkajian Awal Neonatus</a>' +
                    '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pemeriksaan</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriCPPT(' + v.id_pendaftaran + ',' + v.id + ',\'' + v.jenis_igd + '\',\'\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri CPPT</a>' +
                        '<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriEdukasi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Edukasi Pasien</a>' +

                    <?php else : ?>
                    // '<a class="dropdown-item ' + disable + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriPengkajianAwalIGD(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pengkajian Awal</a>' +
                    // PIM
                    // '<a class="dropdown-item ' + disable + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriPengkajianMaternal(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pengkajian Maternal</a>' +
                    // '<a class="dropdown-item ' + disable + ' btn-xs" href="javascript:void(0)" onclick="entriPengkajianAwalNeonatus(' + v.id_pendaftaran + ',' + v.id + ',\'' + bed + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pengkajian Awal Neonatus</a>' +
                    '<a class="dropdown-item ' + disable + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Pemeriksaan</a>' +
                        '<a class="dropdown-item  waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entriCPPT(' + v.id_pendaftaran + ',' + v.id + ',\'' + v.jenis_igd + '\',\'\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri CPPT</a>' +
                        '<a class="dropdown-item ' + disable + ' btn-xs" href="javascript:void(0)" onclick="entriEdukasi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Edukasi Pasien</a>' +

                    <?php endif ?>(v.tindak_lanjut === 'RS Lain' ?
                        '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSuratRujukan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-file-medical-alt mr-1"></i>Buat Surat Rujukan</a>' :
                        '') +

                    // '<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriKeperawatan(' + v.id_pendaftaran + ',' + v.id + ',\'' + bed + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Keperawatan</a>' +
                    '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="settingPerlakuanKhusus(\'' + v.id_pasien + '\')"><i class="fas fa-fw fa-thumbtack mr-1"></i>Set Perlakuan Khusus</a>' +
                    // '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakFormRekamMedis(\'' + detail + '\', \'' + v.id_pendaftaran + '\', ' + data.page + ')"><i class="fas fa-print m-r-5"></i> Cetak Form Rekam Medis</a>' +
                    '<a class="dropdown-item ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showRekapStatusBED()"><i class="fas fa-fw fa-bed mr-1"></i>Rekap Ketersediaan Bed</a>' +
                    btnBatalKonsul +
                    '<a class="dropdown-item ' + disable_lanjut + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="konsulKlinikLain(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-plus mr-1"></i>Konsul Klinik Lain</a>' +
                    '<a class="dropdown-item ' + disable_lanjut + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut(' + v.id_pendaftaran + ',' + v.id + ', 0, ' + v.id_dokter + ', \'' + v.dokter + '\', \'' + 'IGD' + '\', \'' + '' + '\', \'' + '' + '\', \'' + v.status_terlayani + '\', \'' + v.triase + '\')"><i class="fas fa-fw fa-arrow-circle-right mr-1"></i>Status Keluar</a>' +

                    <?php if ($this->session->userdata('account_group') === 'Admin' || $this->session->userdata('account_group') === 'Admin Rekam Medis' || $this->session->userdata('account_group') === 'Dokter Spesialis RM' || $this->session->userdata('account_group') === 'Dokter Spesialis RM Rehab') : ?> '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluar(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-times-circle mr-1"></i>Pembatalan Status Keluar</a>' +
                    <?php endif ?>

                    <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementaraIt(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>status keluar sementara Billing</a>' +
                        <?php elseif ($this->session->userdata('account_group') === 'Admin Rekam Medis' || $this->session->userdata('account_group') === 'Dokter Spesialis RM' || $this->session->userdata('account_group') === 'Dokter Spesialis RM Rehab') : ?> '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara</a>' +
                        <?php endif ?>

                        <?php if ($this->session->userdata('account_group') === 'Admin' || $this->session->userdata('account_group') === 'Admin Rekam Medis' || $this->session->userdata('account_group') === 'Dokter Spesialis RM' || $this->session->userdata('account_group') === 'Dokter Spesialis RM Rehab') : ?>
                                '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar Sementara</a>' +
                            <?php endif ?>

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
                accessFailed(e.status);
            }
        })
    }

    function paging(p, tab) {
        if (tab === 1) {
            getListPemeriksaan(p);
        } else if (tab === 2) {
            getListHistoryResep(p, $('#id-resep-history').val());
        }
    }

    // function cetakResumeMedisICD(id) {
    //     window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + id, 'Cetak Resume Medis', 'width=' +
    //         dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    // }

    function resetFormData() {
        // form search
        $('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>');
        $('#layanan, #no-register-search, #no-rm-search, #nik-search, #nama-search').val('');

        $('.custom-textarea, .custom-form').val('');
        $('.select2-chosen').html('');
        $('#unit').val('260');
        $('#s2id_unit a .select2c-chosen').html('IGD');
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
        get_pemeriksaan_lab(id_layanan);
        get_pemeriksaan_rad(id_layanan);
        getPemeriksaanFisio(id_layanan);
        getPemeriksaanOperasi(id_layanan);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let umur = '';
                let kelamin = '';
                let pasien = data.pasien;
                let layanan = data.layanan;
                let anamnesa = data.anamnesa[0];

                if (pasien !== null) {
                    if (layanan.tindak_lanjut === 'cco sementara it') {
                        $('button[title="tambah diagnosa"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sedang checkout billing. Silahkan lakukan cco sementara')
                        })
                        $('.form-anamnesa button[data-target="#anamnesa"]').removeAttr('data-target')
                    } else {
                        $('.form-anamnesa button[data-target="#anamnesa"]').attr('data-target', '#anamnesa')
                        $('button[title="tambah diagnosa"]').off('click').attr('onclick', 'addDiagnosa()')
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
                    $('#id-pendaftaran').val(pasien.id);
                    $('#nama-detail').html(pasien.nama);
                    $('#no-rm-detail').html(pasien.id_pasien);
                    $('#no-register-detail').html(pasien.no_register);
                    $('#kelamin-detail').html(kelamin);
                    $('#umur-detail').html(umur);
                    $('#alamat-detail').html(pasien.alamat);
                    $('#alergi-detail').html(pasien.alergi);
                    $('#alergi').val(pasien.alergi);

                    // TAMBAHAN WSH
					// $('#logo-pasien-alergi').attr('title', pasien.alergi);
					// $('#alergi-coba').html(pasien.alergi); GUNAKAN NNTI KETIKA DATA ALERGI HARUS MUNCUL BUKAN CUMA MUNCUL KETIKA DISOROT
					$('#logo-pasien-alergi').attr('title', '‼️ A L E R G I ‼️\n→' + pasien.alergi + '');

                    $('#hak-kelas-pasien').html((pasien.hak_kelas !== null ? pasien.hak_kelas : '-'));

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
                    $('#id-penjamin-tindakan').val(layanan.id_penjamin);

                    let cara_bayar = '<b>' + layanan.cara_bayar + ' ' + ((layanan.id_penjamin !== null) ? '(' +
                        layanan.penjamin + ')' : '') + '</b>';
                    $('#cara-bayar-detail').html(cara_bayar);
                    $('#no-polish-detail').html(layanan.no_polish);
                    $('#no-sep-detail').html(layanan.no_sep);
                    if (data.penjamin_pasien) {
                        $('#kelas-rawat-pasien').html(data.penjamin_pasien.hak_kelas || '');
                    }

                    $('#identitas-pasien-anamnesa, #identitas-pasien-darah, #identitas-pasien-diagnosa, #identitas-pasien-tindakan, #identitas-pasien-bhp, #identitas-pasien-pkrt')
                        .html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

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
                    $('#kelas-tindakan').hide();
                    $('#profesi').val(8);
                    $('#jumlah-tindakan').val(1);
                    $('#unit').val('260');
                    $('#s2id_unit a .select2c-chosen').html('IGD');

                    if (data.tindakan.length > 0) {
                        showTindakan(data.tindakan);
                    }

                    // BHP
                    if (data.bhp.length > 0) {
                        showBHP(data.bhp);
                    }

                    // Order Darah
                    if (data.darah.length > 0) {
                        showDarah(data.darah);
                    } else {
                        $('#darah-label').html('');
                        $('#table-darah tbody').empty();
                    }

                    // PKRT
                    if (data.pkrt.length > 0) {
                        showPKRT(data.pkrt);
                    } else {
                        $('#pkrt-label').html('');
                        $('#table-pkrt tbody').empty();
                    }

                    $('#modal-pemeriksaan').modal('show');
                    $('#modal-pemeriksaan-label').html('Form Pemeriksaan IGD');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {

            }
        });
    }

    // modal detail asessment
    function detailAsessment(id_pendaftaran, id_layanan) {
        $('#wizard-form-asessment-foto').bwizard('show', '0');

        setTanggalPencarian();

        $('#id-layananas').val(id_layanan);
        $('#id-pendaftaran-pasienas').val(id_pendaftaran);

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let umur = '';
                let kelamin = '';
                let pasien = data.pasien;
                let layanan = data.layanan;
                let anamnesa = data.anamnesa[0];

                if (pasien !== null) {
                    if (pasien.kelamin == 'L') {
                        kelamin = 'Laki - laki';
                    } else {
                        kelamin = 'Perempuan';
                    }

                    if (pasien.tanggal_lahir !== null) {
                        umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
                    }

                    $('#id-pasienas').val(pasien.id_pasien);
                    $('#nama-detailas').html(pasien.nama);
                    $('#no-rm-detailas').html(pasien.id_pasien);
                    $('#no-register-detailas').html(pasien.no_register);
                    $('#kelamin-detailas').html(kelamin);
                    $('#umur-detailas').html(umur);
                    $('#alamat-detailas').html(pasien.alamat);
                    $('#alergi-detailas').html(pasien.alergi);
                    $('#alergias').val(pasien.alergi);

                    $('#subspesialisas').empty();
                    if (data.subspesialis.length > 0) {
                        $('#subspesialis-rowas').show();

                        var opt = '<option value="">Pilih Sub Spesialis</option>';
                        $('#subspesialisas').append(opt);
                        $.each(data.subspesialis, function(i, v) {
                            opt = '<option value="' + v.id + '">' + v.nama + '</option>';
                            $('#subspesialisas').append(opt);
                        });

                        $('#subspesialisas').val(layan.id_sub_spesialis);
                    } else {
                        $('#subspesialis-rowas').hide();
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
                    $('#id-penjamin-tindakan').val(layanan.id_penjamin);

                    let cara_bayar = '<b>' + layanan.cara_bayar + ' ' + ((layanan.id_penjamin !== null) ? '(' +
                        layanan.penjamin + ')' : '') + '</b>';
                    $('#cara-bayar-detail').html(cara_bayar);
                    $('#no-polish-detail').html(layanan.no_polish);
                    $('#no-sep-detail').html(layanan.no_sep);
                    if (data.penjamin_pasien) {
                        $('#kelas-rawat-pasien').html(data.penjamin_pasien.hak_kelas || '');
                    }

                    $('#identitas-pasien-anamnesa, #identitas-pasien-darah, #identitas-pasien-diagnosa, #identitas-pasien-tindakan, #identitas-pasien-bhp, #identitas-pasien-pkrt')
                        .html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

                    $('#dokter').val(layanan.id_dokter);
                    $('#s2id_dokter a .select2c-chosen').html(layanan.dokter);
                    $('#operator').val(layanan.id_dokter);
                    $('#s2id_operator a .select2c-chosen').html(layanan.dokter);

                    // tindakan
                    $('#kelas-tindakan').val('<?= $kelas_tindakan ?>');
                    $('#kelas-tindakan').hide();
                    $('#profesi').val(8);
                    $('#jumlah-tindakan').val(1);
                    $('#unit').val('260');
                    $('#s2id_unit a .select2c-chosen').html('IGD');

                    $('#modal-asessment-foto').modal('show');
                    $('#modal-asessment-foto-label').html('Form Asessment foto Awal IGD');
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

    function showAsessment(anamnesa) {
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
        $('#rf-kiri-atas').val(anamnesa.rf_kiri_atas);
        $('#rf-kiri-bawah').val(anamnesa.rf_kiri_bawah);
        $('#rf-kanan-atas').val(anamnesa.rf_kanan_atas);
        $('#rf-kanan-bawah').val(anamnesa.rf_kanan_bawah);
        $('#pemeriksaan-khusus').val(anamnesa.pemeriksaan_khusus);
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
            title: "Simpan Pemeriksaan IGD",
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
            var markup = '<b>' + data.layanan + '</b> <br/>' + data.layanan_parent + '<br/>' + instalasi + data
                .jenis + bobot + ' ' + kelas + data.keterangan + '<br/>' + total;

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
                        messageCustom('info', 'Item Laboratorium', data.message, '');
                    }
                } else {
                    messageCustom('info', 'Item Laboratorium', data.message, '');
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
                        var tipe = 'success';
                        if (data.status === false) {
                            tipe = 'error';
                        }
                        messageCustom(tipe, 'Order Pemeriksaan Laboratorium', data.message, '');

                        $('input[type=checkbox]').removeAttr('checked');
                        $('#lab_modal').modal('hide');
                        get_pemeriksaan_lab(id_layanan_pendaftaran);
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('error', 'Order Pemeriksaan Laboratorium',
                            'Gagal order pemeriksaan laboratorium', '');
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

    function simpanDataAsessment() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_pemeriksaan") ?>',
            data: $('#form-asessment').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status) {
                    messageEditSuccess();
                    $('#modal-asessment-foto').modal('hide');
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

    function cetakFormRekamMedis(details, id) {
        $('#modal_cetak_form_rekam_medis').modal('show');
        $('#modal_cetak_form_rekam_medis_label').html('Cetak Form Rekam Medis');

        // Migrasi eRM
        // $('#btn_checklist_skrining_jatuh_rajal').click(function() {
        //     cetakCheklistSkriningResikoJatuhRajal(details);
        // });

        //$('#btn_checklist_penerimaan_pasien_rawat_inap').click(function() {
        //    cetakChecklistPenerimaanPasienRawatInap(details);
        //});

        // Migrasi eRM
        /*
        // PI 
        $('#btn_pemberian_informasi').click(function() {
            cetakPemberianInformasi(details);
        });

        $('#btn_penolakan_tindakan_kedokteran').click(function() {
            cetakPenolakanTindakanKedokteran(details);
        });

        $('#btn_persetujuan_tindakan_anestesi').click(function() {
            cetakPersetujuanTindakanAnestesi(details);
        });
		
        $('#btn_persetujuan_tindakan_kedokteran').click(function() {
            cetakPersetujuanTindakanKedokteran(details);
        });

        $('#btn_persetujuan_tindakan_operasi').click(function() {
            cetakPersetujuanTindakanOperasi(details);
        });
		*/

        $('#btn_resume_medis').click(function() {
            cetakResumeMedis(details);
        });

        // SPR
        $('#btn_surat_pengantar_rawat').click(function() {
            cetakSuratPengantarRawat(details, id);
        });

        $('#btn_tata_tertib_pasien').click(function() {
            cetakTataTertibPasien(details);
        });

        $('#btn_surat_persetujuan_rawat_inap').click(function() {
            cetakSuratPersetujuanRawatInap(details);
        });

        $('#btn_surat_keterangan_kematian').click(function() {
            cetakSuratKeteranganKematian(details);
        });

        // Migrasi ERM
        //$('#btn_visum_et_repertum').click(function() {
        //    cetakVisumEtRepertum(details);
        //});
    }

    /*function cetakCheklistSkriningResikoJatuhRajal(details) {

        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_skrining_resiko_jatuh_rajal') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalSkrining();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-skrining-resiko-jatuh-rajal-title').html(
                    `<b>Form Skrining Risiko Jatuh Rajal</b> |  No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );

                $('#id-layanan-pendaftaran-sr').val(detail[0]);
                $('#id-petugas').val(data.id_petugas);
                $('#id-users').val(data.id_users);
                $('#s2id_petugas-skrining a .select2c-chosen').html(data.nama_petugas);
                $('#tanggal-skrining').val(data.tanggal_skrining);

                if (data.check_1 === '1') {
                    document.getElementById("check-1").checked = true;
                }
                if (data.check_2 === '1') {
                    document.getElementById("check-2").checked = true;
                }
                if (data.check_3 === '1') {
                    document.getElementById("check-3").checked = true;
                }
                if (data.check_4 === '1') {
                    document.getElementById("check-4").checked = true;
                }
                if (data.check_5 === '1') {
                    document.getElementById("check-5").checked = true;
                }
                if (data.check_6 === '1') {
                    document.getElementById("check-6").checked = true;
                }
                if (data.check_7 === '1') {
                    document.getElementById("check-7").checked = true;
                }
                if (data.check_8 === '1') {
                    document.getElementById("check-8").checked = true;
                }
                if (data.check_9 === '1') {
                    document.getElementById("check-9").checked = true;
                }
                if (data.check_10 === '1') {
                    document.getElementById("check-10").checked = true;
                }
                if (data.check_11 === '1') {
                    document.getElementById("check-11").checked = true;
                }
                if (data.check_12 === '1') {
                    document.getElementById("check-12").checked = true;
                }
                if (data.check_13 === '1') {
                    document.getElementById("check-13").checked = true;
                }
                if (data.check_14 === '1') {
                    document.getElementById("check-14").checked = true;
                }
                if (data.check_15 === '1') {
                    document.getElementById("check-15").checked = true;
                }
                if (data.resiko_jatuh === '1') {
                    document.getElementById("resiko-jatuh").checked = true;
                }
                if (data.tidak_resiko_jatuh === '1') {
                    document.getElementById("tidak-resiko-jatuh").checked = true;
                }
                if (data.tanda_tangan === '1') {
                    document.getElementById("tanda-tangan").checked = true;
                }
                if (data.stiker === '1') {
                    document.getElementById("stiker").checked = true;
                }
                if (data.edukasi_resiko_jatuh === '1') {
                    document.getElementById("edukasi-resiko-jatuh").checked = true;
                }
                if (data.edukasi_lokasi === '1') {
                    document.getElementById("edukasi-lokasi").checked = true;
                }
                if (data.edukasi_pencegahan === '1') {
                    document.getElementById("edukasi-pencegahan").checked = true;
                }

                $('#modal-skrining-resiko-jatuh-rajal').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }*/

    /*function cetakChecklistPenerimaanPasienRawatInap(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_checklist_penerimaan_pasien_rawat_inap') ?>/id/' +
                detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Reset all values first
                resetModalChecklistPenerimaanPasienRawatInap();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-checklist-penerimaan-pasien-rawat-inap-title').html(
                    `<b>Form Checklist Penerimaan Pasien Rawat Inap</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );
                $('#id-layanan-pendaftaran-cpri').val(detail[0]);
                $('#nama-keluarga-cpri').val(data.nama_keluarga);

                if (data.is_pasien == 1) {
                    document.getElementById("is-pasien-cpri-ya").checked = true;
                } else if (data.is_pasien == 0) {
                    document.getElementById("is-pasien-cpri-tidak").checked = true;
                }

                if (data.perawat_yang_merawat == 1) {
                    document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-ya").checked =
                        true;
                } else if (data.perawat_yang_merawat == 0) {
                    document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-tidak").checked =
                        true;
                }

                if (data.dokter_yang_merawat == 1) {
                    document.getElementById("informasi-tentang-dokter-yang-merawat-ya").checked = true;
                } else if (data.dokter_yang_merawat == 0) {
                    document.getElementById("informasi-tentang-dokter-yang-merawat-tidak").checked = true;
                }

                if (data.nurse_station == 1) {
                    document.getElementById("nurse-station-ya").checked = true;
                } else if (data.nurse_station == 0) {
                    document.getElementById("nurse-station-tidak").checked = true;
                }

                if (data.kamar_mandi_pasien == 1) {
                    document.getElementById("kamar-mandi-pasien-ya").checked = true;
                } else if (data.kamar_mandi_pasien == 0) {
                    document.getElementById("kamar-mandi-pasien-tidak").checked = true;
                }

                if (data.bel_pasien == 1) {
                    document.getElementById("bel-di-kamar-mandi-ya").checked = true;
                } else if (data.bel_pasien == 0) {
                    document.getElementById("bel-di-kamar-mandi-tidak").checked = true;
                }

                if (data.tempat_tidur_pasien == 1) {
                    document.getElementById("tempat-tidur-pasien-ya").checked = true;
                } else if (data.tempat_tidur_pasien == 0) {
                    document.getElementById("tempat-tidur-pasien-tidak").checked = true;
                }

                if (data.remote == 1) {
                    document.getElementById("remote-tv-ac-ya").checked = true;
                } else if (data.remote == 0) {
                    document.getElementById("remote-tv-ac-tidak").checked = true;
                }

                if (data.tempat_ibadah == 1) {
                    document.getElementById("tempat-ibadah-ya").checked = true;
                } else if (data.tempat_ibadah == 0) {
                    document.getElementById("tempat-ibadah-tidak").checked = true;
                }

                if (data.tempat_sampah == 1) {
                    document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-ya").checked = true;
                } else if (data.tempat_sampah == 0) {
                    document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-tidak").checked = true;
                }

                if (data.jadwal_pembagian == 1) {
                    document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-ya").checked = true;
                } else if (data.jadwal_pembagian == 0) {
                    document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-tidak").checked = true;
                }

                if (data.jadwal_visit == 1) {
                    document.getElementById("jadwal-visit-dokter-ya").checked = true;
                } else if (data.jadwal_visit == 0) {
                    document.getElementById("jadwal-visit-dokter-tidak").checked = true;
                }

                if (data.jadwal_jam_berkunjung == 1) {
                    document.getElementById("jadwal-jam-berkunjung-ya").checked = true;
                } else if (data.jadwal_jam_berkunjung == 0) {
                    document.getElementById("jadwal-jam-berkunjung-tidak").checked = true;
                }

                if (data.jadwal_ganti_linen == 1) {
                    document.getElementById("jadwal-ganti-linen-ya").checked = true;
                } else if (data.jadwal_ganti_linen == 0) {
                    document.getElementById("jadwal-ganti-linen-tidak").checked = true;
                }

                if (data.membawa_barang_sesuai_keperluan == 1) {
                    document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-ya")
                        .checked = true;
                } else if (data.membawa_barang_sesuai_keperluan == 0) {
                    document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-tidak")
                        .checked = true;
                }

                if (data.mematuhi_peraturan == 1) {
                    document.getElementById(
                            "perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-ya")
                        .checked = true;
                } else if (data.mematuhi_peraturan == 0) {
                    document.getElementById(
                            "perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-tidak")
                        .checked = true;
                }

                if (data.tidak_duduk_ditempat_tidur == 1) {
                    document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-ya").checked = true;
                } else if (data.tidak_duduk_ditempat_tidur == 0) {
                    document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-tidak").checked = true;
                }

                if (data.menyimpan_barang_berharga == 1) {
                    document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-ya").checked = true;
                } else if (data.menyimpan_barang_berharga == 0) {
                    document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-tidak").checked =
                        true;
                }

                if (data.dapat_kartu_penunggu == 1) {
                    document.getElementById("mendapat-kartu-penunggu-ya").checked = true;
                } else if (data.dapat_kartu_penunggu == 0) {
                    document.getElementById("mendapat-kartu-penunggu-tidak").checked = true;
                }

                if (data.menghargai_privasi_pasien == 1) {
                    document.getElementById("untuk-selalu-menghargai-privasi-pasien-ya").checked = true;
                } else if (data.menghargai_privasi_pasien == 0) {
                    document.getElementById("untuk-selalu-menghargai-privasi-pasien-tidak").checked = true;
                }

                if (data.gelang == 1) {
                    document.getElementById("pemasangan-dan-fungsi-gelang-ya").checked = true;
                } else if (data.gelang == 0) {
                    document.getElementById("pemasangan-dan-fungsi-gelang-tidak").checked = true;
                }

                if (data.cuci_tangan == 1) {
                    document.getElementById("cara-cuci-tangan-ya").checked = true;
                } else if (data.cuci_tangan == 0) {
                    document.getElementById("cara-cuci-tangan-tidak").checked = true;
                }

                $('#modal_checklist_penerimaan_pasien_rawat_inap').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }*/

    /*function cetakPemberianInformasi(details) {

        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_pemberian_informasi') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalPemberianInformasi();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-pemberian-informasi-title').html(
                    `<b>Form Pemberian Informasi</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );
                $('#id-layanan-pendaftaran-pi').val(detail[0]);
                $('#nama-keluarga-pi').val(data.nama_keluarga);
                $('#id-dokter-pelaksana-tindakan-pi').val(data.id_dokter_pelaksana_tindakan);
                $('#s2id_dokter-pelaksana-tindakan-pi a .select2c-chosen').html(data.nama_dokter_pelaksana);
                $('#penerima-informasi-pi').val(data.penerima_informasi);
                $('#pemberi-informasi-pi').val(data.pemberi_informasi);
                $('#diagnosis-kerja-pi').val(data.diagnosis_kerja);
                $('#dasar-diagnosis-pi').val(data.dasar_diagnosis);
                $('#tindakan-kedokteran-pi').val(data.tindakan_kedokteran);
                $('#indikasi-tindakan-pi').val(data.indikasi_tindakan);
                $('#tata-cara-pi').val(data.tata_cara);
                $('#tujuan-pi').val(data.tujuan);
                $('#risiko-komplikasi-pi').val(data.risiko_komplikasi);
                $('#prognosis-pi').val(data.prognosis);
                $('#alternatif-resiko-pi').val(data.alternatif_resiko);
                $('#menyelamatkan-pasien-pi').val(data.menyelamatkan_pasien);
                $('#penggunaan-darah-pi').val(data.penggunaan_darah);
                $('#analgesia-pi').val(data.analgesia);

                if (data.is_pasien === '1') {
                    document.getElementById("is-pasien-pi-ya").checked = true;
                    // Disabled fields
                    $("#nama-keluarga-pi").prop("disabled", true);
                    $("#pemberi-informasi-pi").prop("disabled", true);
                    $("#penerima-informasi-pi").prop("disabled", true);
                } else if (data.is_pasien === '0') {
                    document.getElementById("is-pasien-pi-tidak").checked = true;
                    // Undisabled fields
                    $("#nama-keluarga-pi").prop("disabled", false);
                    $("#pemberi-informasi-pi").prop("disabled", false);
                    $("#penerima-informasi-pi").prop("disabled", false);
                }

                if (data.diagnosis_kerja_check === '1') {
                    document.getElementById("diagnosis-kerja-check-pi").checked = true;
                }

                if (data.dasar_diagnosis_check === '1') {
                    document.getElementById("dasar-diagnosis-check-pi").checked = true;
                }

                if (data.tindakan_kedokteran_check === '1') {
                    document.getElementById("tindakan-kedokteran-check-pi").checked = true;
                }

                if (data.indikasi_tindakan_check === '1') {
                    document.getElementById("indikasi-tindakan-check-pi").checked = true;
                }

                if (data.tata_cara_check === '1') {
                    document.getElementById("tata-cara-check-pi").checked = true;
                }

                if (data.tujuan_check === '1') {
                    document.getElementById("tujuan-check-pi").checked = true;
                }

                if (data.risiko_komplikasi_check === '1') {
                    document.getElementById("risiko-komplikasi-check-pi").checked = true;
                }

                if (data.prognosis_check === '1') {
                    document.getElementById("prognosis-check-pi").checked = true;
                }

                if (data.alternatif_resiko_check === '1') {
                    document.getElementById("alternatif-resiko-check-pi").checked = true;
                }

                if (data.menyelamatkan_pasien_check === '1') {
                    document.getElementById("menyelamatkan-pasien-check-pi").checked = true;
                }

                if (data.penggunaan_darah_check === '1') {
                    document.getElementById("penggunaan-darah-check-pi").checked = true;
                }

                if (data.analgesia_check === '1') {
                    document.getElementById("analgesia-check-pi").checked = true;
                }

                $('#modal-pemberian-informasi').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }*/

    // Migrasi eRM
    /*function cetakPenolakanTindakanKedokteran(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_penolakan_tindakan_kedokteran') ?>/id/' + detail[
                0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalPenolakanTindakanKedokteran();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-penolakan-tindakan-kedokteran-title').html(
                    `<b>Form Penolakan Tindakan Kedokteran</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );
                $('#nama-keluarga').val(data.nama_keluarga);
                $('#tanggal-lahir').val(datefmysql(data.tanggal_lahir));
                $('#id-layanan-pendaftaran-form').val(detail[0]);
                $('#alamat-form-rekam-medis').val(data.alamat);
                $('#hubungan-keluarga').val(data.hubungan_keluarga);
                $('#tindakan').val(data.tindakan);
                $('#id-saksi-1').val(data.id_saksi_1);
                $('#id-saksi-2').val(data.id_saksi_2);
                $('#s2id_saksi-1 a .select2c-chosen').html(data.nama_saksi_1);
                $('#s2id_saksi-2 a .select2c-chosen').html(data.nama_saksi_2);

                if (data.is_pasien === '1') {
                    document.getElementById("is-pasien-ya").checked = true;
                    // Disabled fields
                    $("#nama-keluarga").prop("disabled", true);
                    $("#tanggal-lahir").prop("disabled", true);
                    $("#laki-laki").prop("disabled", true);
                    $("#perempuan").prop("disabled", true);
                    $("#alamat-form-rekam-medis    ").prop("disabled", true);
                    $("#hubungan-keluarga").prop("disabled", true);
                } else if (data.is_pasien === '0') {
                    document.getElementById("is-pasien-tidak").checked = true;
                    // Undisabled fields
                    $("#nama-keluarga").prop("disabled", false);
                    $("#tanggal-lahir").prop("disabled", false);
                    $("#laki-laki").prop("disabled", false);
                    $("#perempuan").prop("disabled", false);
                    $("#alamat-form-rekam-medis    ").prop("disabled", false);
                    $("#hubungan-keluarga").prop("disabled", false);
                }

                if (data.jenis_kelamin == 'Laki-laki') {
                    document.getElementById("laki-laki").checked = true;
                } else if (data.jenis_kelamin == 'Perempuan') {
                    document.getElementById("perempuan").checked = true;
                }

                $('#modal_penolakan_tindakan_kedokteran').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }*/

    /*function cetakPersetujuanTindakanAnestesi(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_persetujuan_tindakan_anestesi') ?>/id/' + detail[
                0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalPersetujuanTindakanAnestesi();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-persetujuan-tindakan-anestesi-title').html(
                    `<b>Form Persetujuan Tindakan Anestesi</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );
                $('#nama-keluarga-mpta').val(data.nama_keluarga);
                $('#tanggal-lahir-mpta').val(datefmysql(data.tanggal_lahir));
                $('#id-layanan-pendaftaran-form-mpta').val(detail[0]);
                $('#alamat-form-rekam-medis-mpta').val(data.alamat);
                $('#hubungan-keluarga-mpta').val(data.hubungan_keluarga);
                $('#tindakan-mpta').val(data.tindakan);
                $('#id-saksi-1-mpta').val(data.id_saksi_1);
                $('#id-saksi-2-mpta').val(data.id_saksi_2);
                $('#s2id_saksi-1-mpta a .select2c-chosen').html(data.nama_saksi_1);
                $('#s2id_saksi-2-mpta a .select2c-chosen').html(data.nama_saksi_2);

                if (data.is_pasien === '1') {
                    document.getElementById("is-pasien-ya-mpta").checked = true;
                    // Disabled fields
                    $("#nama-keluarga-mpta").prop("disabled", true);
                    $("#tanggal-lahir-mpta").prop("disabled", true);
                    $("#laki-laki-mpta").prop("disabled", true);
                    $("#perempuan-mpta").prop("disabled", true);
                    $("#alamat-form-rekam-medis-mpta   ").prop("disabled", true);
                    $("#hubungan-keluarga-mpta").prop("disabled", true);
                } else if (data.is_pasien === '0') {
                    document.getElementById("is-pasien-tidak-mpta").checked = true;
                    // Undisabled fields
                    $("#nama-keluarga-mpta").prop("disabled", false);
                    $("#tanggal-lahir-mpta").prop("disabled", false);
                    $("#laki-laki-mpta").prop("disabled", false);
                    $("#perempuan-mpta").prop("disabled", false);
                    $("#alamat-form-rekam-medis-mpta   ").prop("disabled", false);
                    $("#hubungan-keluarga-mpta").prop("disabled", false);
                }

                if (data.jenis_kelamin == 'Laki-laki') {
                    document.getElementById("laki-laki-mpta").checked = true;
                } else if (data.jenis_kelamin == 'Perempuan') {
                    document.getElementById("perempuan-mpta").checked = true;
                }

                $('#modal_persetujuan_tindakan_anestesi').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }*/

    /*function cetakPersetujuanTindakanKedokteran(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_persetujuan_tindakan_kedokteran') ?>/id/' +
                detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalPersetujuanTindakanKedokteran();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-persetujuan-tindakan-kedokteran-title').html(
                    `<b>Form Persetujuan Tindakan Kedokteran</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`
                );
                $('#nama-keluarga-mptk').val(data.nama_keluarga);
                $('#tanggal-lahir-mptk').val(datefmysql(data.tanggal_lahir));
                $('#id-layanan-pendaftaran-form-mptk').val(detail[0]);
                $('#alamat-form-rekam-medis-mptk').val(data.alamat);
                $('#hubungan-keluarga-mptk').val(data.hubungan_keluarga);
                $('#tindakan-mptk').val(data.tindakan);
                $('#id-saksi-1-mptk').val(data.id_saksi_1);
                $('#id-saksi-2-mptk').val(data.id_saksi_2);
                $('#s2id_saksi-1-mptk a .select2c-chosen').html(data.nama_saksi_1);
                $('#s2id_saksi-2-mptk a .select2c-chosen').html(data.nama_saksi_2);

                if (data.is_pasien === '1') {
                    document.getElementById("is-pasien-ya-mptk").checked = true;
                    // Disabled fields
                    $("#nama-keluarga-mptk").prop("disabled", true);
                    $("#tanggal-lahir-mptk").prop("disabled", true);
                    $("#laki-laki-mptk").prop("disabled", true);
                    $("#perempuan-mptk").prop("disabled", true);
                    $("#alamat-form-rekam-medis-mptk   ").prop("disabled", true);
                    $("#hubungan-keluarga-mptk").prop("disabled", true);
                } else if (data.is_pasien === '0') {
                    document.getElementById("is-pasien-tidak-mptk").checked = true;
                    // Undisabled fields
                    $("#nama-keluarga-mptk").prop("disabled", false);
                    $("#tanggal-lahir-mptk").prop("disabled", false);
                    $("#laki-laki-mptk").prop("disabled", false);
                    $("#perempuan-mptk").prop("disabled", false);
                    $("#alamat-form-rekam-medis-mptk   ").prop("disabled", false);
                    $("#hubungan-keluarga-mptk").prop("disabled", false);
                }

                if (data.jenis_kelamin == 'Laki-laki') {
                    document.getElementById("laki-laki-mptk").checked = true;
                } else if (data.jenis_kelamin == 'Perempuan') {
                    document.getElementById("perempuan-mptk").checked = true;
                }

                $('#modal-persetujuan-tindakan-kedokteran').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }*/

    /*function cetakPersetujuanTindakanOperasi(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_persetujuan_tindakan_operasi') ?>/id/' + detail[
                0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalPersetujuanTindakanOperasi();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-persetujuan-tindakan-operasi-title').html(
                    `<b>Form Persetujuan Tindakan Operasi</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );
                $('#nama-keluarga-mpto').val(data.nama_keluarga);
                $('#tanggal-lahir-mpto').val(datefmysql(data.tanggal_lahir));
                $('#id-layanan-pendaftaran-form-mpto').val(detail[0]);
                $('#alamat-form-rekam-medis-mpto').val(data.alamat);
                $('#hubungan-keluarga-mpto').val(data.hubungan_keluarga);
                $('#tindakan-mpto').val(data.tindakan);
                $('#id-saksi-1-mpto').val(data.id_saksi_1);
                $('#id-saksi-2-mpto').val(data.id_saksi_2);
                $('#s2id_saksi-1-mpto a .select2c-chosen').html(data.nama_saksi_1);
                $('#s2id_saksi-2-mpto a .select2c-chosen').html(data.nama_saksi_2);

                if (data.is_pasien === '1') {
                    document.getElementById("is-pasien-ya-mpto").checked = true;
                    // Disabled fields
                    $("#nama-keluarga-mpto").prop("disabled", true);
                    $("#tanggal-lahir-mpto").prop("disabled", true);
                    $("#laki-laki-mpto").prop("disabled", true);
                    $("#perempuan-mpto").prop("disabled", true);
                    $("#alamat-form-rekam-medis-mpto").prop("disabled", true);
                    $("#hubungan-keluarga-mpto").prop("disabled", true);
                } else if (data.is_pasien === '0') {
                    document.getElementById("is-pasien-tidak-mpto").checked = true;
                    // Undisabled fields
                    $("#nama-keluarga-mpto").prop("disabled", false);
                    $("#tanggal-lahir-mpto").prop("disabled", false);
                    $("#laki-laki-mpto").prop("disabled", false);
                    $("#perempuan-mpto").prop("disabled", false);
                    $("#alamat-form-rekam-medis-mpto   ").prop("disabled", false);
                    $("#hubungan-keluarga-mpto").prop("disabled", false);
                }

                if (data.jenis_kelamin == 'Laki-laki') {
                    document.getElementById("laki-laki-mpto").checked = true;
                } else if (data.jenis_kelamin == 'Perempuan') {
                    document.getElementById("perempuan-mpto").checked = true;
                }

                $('#modal-persetujuan-tindakan-operasi').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }*/

    function cetakResumeMedis(details) {
        let detail = details.split('#');
        window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + detail[0], 'Cetak Resume Medis', 'width=' +
            dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }


    // function cetakSuratPengantarRawat(details) {
    //     var dWidth = $(window).width();
    //     var dHeight = $(window).height();
    //     var x = screen.width / 2 - dWidth / 2;
    //     var y = screen.height / 2 - dHeight / 2;
    //     let detail = details.split('#');
    //     window.open('<?= base_url('pemeriksaan_poli/cetak_surat_pengantar_rawat/') ?>' + detail[0], 'Cetak Surat Pengantar Rawat',
    //         'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    // }



    // SPR +++
    function cetakSuratPengantarRawat(details, id) {
        let detail = details.split('#');
        console.log(detail);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/surat_pengantar_rawat') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetSuratPengantarRawat();
                $('#modal-surat-pengantar-rawat-title').html(`<b>Form Surat Pengantar Rawat</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
                $('#id-layanan-pendaftaran-spr').val(detail[0]);
                $('#id-users').val(data.id_users);

                if (data.operasi_spr === '1') {
                    document.getElementById("operasi-spr").checked = true;
                }
                if (data.odc_spr === '1') {
                    document.getElementById("odc-spr").checked = true;
                }
                if (data.rawat_inap_spr === '1') {
                    document.getElementById("rawat-inap-spr").checked = true;
                }

                // BARU
                if (data.is_pasien_spr === '1') {
                    document.getElementById("is-pasien-spr-1").checked = true;
                    // Disabled fields
                    $("#nama-pasien-spr").prop("disabled", true);
                    $("#j-spr-1").prop("disabled", true);
                    $("#j-spr-2").prop("disabled", true);
                    $("#no-rm-spr").prop("disabled", true);
                    $("#umur-spr").prop("disabled", true);
                } else if (data.is_pasien_spr === '0') {
                    // document.getElementById("is-pasien-spr-2").checked = true;
                    // Undisabled fields
                    $("#nama-pasien-spr").prop("disabled", true);
                    $("#j-spr-1").prop("disabled", true);
                    $("#j-spr-2").prop("disabled", true);
                    $("#no-rm-spr").prop("disabled", true);
                    $("#umur-spr").prop("disabled", true);
                }
                if (data.j_spr == 'Laki-laki') {
                    document.getElementById("j-spr-1").checked = true;
                } else if (data.j_spr == 'Perempuan') {
                    document.getElementById("j-spr-2").checked = true;
                }

                $('#diagnosis-spr').val(data.diagnosis_spr);
                if (data.infeksi_spr === '1') {
                    document.getElementById("infeksi-spr").checked = true;
                }
                if (data.non_infeksi_spr === '1') {
                    document.getElementById("non-infeksi-spr").checked = true;
                }
                $('#dokter-spr').val(data.dokter_spr);
                $('#s2id_dokter-spr a .select2c-chosen').html(data.nama_dokter_1);
                $('#jto-spr').val(data.jto_spr);
                $('#gto-spr').val(data.gto_spr);
                if (data.cito_spr === '1') {
                    document.getElementById("cito-spr").checked = true;
                }
                if (data.tidak_cito_spr === '1') {
                    document.getElementById("tidak-cito-spr").checked = true;
                }
                if (data.icu_spr === '1') {
                    document.getElementById("icu-spr").checked = true;
                }
                if (data.hcu_spr === '1') {
                    document.getElementById("hcu-spr").checked = true;
                }
                if (data.pcu_spr === '1') {
                    document.getElementById("pcu-spr").checked = true;
                }
                if (data.nicu_spr === '1') {
                    document.getElementById("nicu-spr").checked = true;
                }
                if (data.vk_spr === '1') {
                    document.getElementById("vk-spr").checked = true;
                }
                if (data.perinatologi_spr === '1') {
                    document.getElementById("perinatologi-spr").checked = true;
                }
                if (data.ruang_perawatan_spr === '1') {
                    document.getElementById("ruang-perawatan-spr").checked = true;
                }
                $('#rp-spr').val(data.rp_spr);
                if (data.isolasi_spr === '1') {
                    document.getElementById("isolasi-spr").checked = true;
                }
                if (data.lain_lain_spr === '1') {
                    document.getElementById("lain-lain-spr").checked = true;
                }
                $('#ll-spr').val(data.ll_spr);
                $('#tanggal-dokter-spr').val(data.tanggal_dokter_spr);
                $('#ttd-dokter-spr').val(data.ttd_dokter_spr);
                $('#s2id_ttd-dokter-spr a .select2c-chosen').html(data.nama_dokter_2);
                if (data.ceklis_dokter_spr === '1') {
                    document.getElementById("ceklis-dokter-spr").checked = true;
                }
                $('#catatan-pendaftaran-spr').val(data.catatan_pendaftaran_spr);
                $('#tanggal-petugas-spr').val(data.tanggal_petugas_spr);
                if (data.ceklis_petugas_spr === '1') {
                    document.getElementById("ceklis-petugas-spr").checked = true;
                }

                // $('#id-petugas-pendaftaran-spr').val(data.id_petugas_pendaftaran_spr);
                // $('#s2id_id-petugas-pendaftaran-spr a .select2c-chosen').html(data.nama_petugas_pendaftaran);
                $('#modal_surat_pengantar_rawat').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // SPR +++
    function resetSuratPengantarRawat() {
        $('#form_surat_keterangan_pengantar_rawat').val('');
        $('#id-layanan-pendaftaran-spr').val('');
        $('#id-users').val('');
        $('#nama-pasien-spr').val('');
        $('#no-rm-spr').val('');
        $('#umur-spr').val('');
        $('#diagnosis-spr').val('');
        $('#dokter-spr').val('');
        $('#jto-spr').val('');
        $('#gto-spr').val('');
        $('#rp-spr').val('');
        $('#ll-spr').val('');
        $('#tanggal-dokter-spr').val('');
        $('#ttd-dokter-spr').val('');
        $('#catatan-pendaftaran-spr').val('');
        $('#tanggal-petugas-spr').val('');
        // $('#id-petugas-pendaftaran-spr').val('');

        document.getElementById("operasi-spr").checked = false;
        document.getElementById("odc-spr").checked = false;
        document.getElementById("rawat-inap-spr").checked = false;
        document.getElementById("j-spr-1").checked = false;
        document.getElementById("j-spr-2").checked = false;
        document.getElementById("infeksi-spr").checked = false;
        document.getElementById("non-infeksi-spr").checked = false;
        document.getElementById("cito-spr").checked = false;
        document.getElementById("tidak-cito-spr").checked = false;
        document.getElementById("icu-spr").checked = false;
        document.getElementById("hcu-spr").checked = false;
        document.getElementById("pcu-spr").checked = false;
        document.getElementById("nicu-spr").checked = false;
        document.getElementById("vk-spr").checked = false;
        document.getElementById("perinatologi-spr").checked = false;
        document.getElementById("ruang-perawatan-spr").checked = false;
        document.getElementById("isolasi-spr").checked = false;
        document.getElementById("lain-lain-spr").checked = false;
        document.getElementById("ceklis-dokter-spr").checked = false;
        document.getElementById("ceklis-petugas-spr").checked = false;

        // $("#nama-pasien-spr").prop("disabled", false);
        // $("#j-spr-1").prop("disabled", false);
        // $("#j-spr-2").prop("disabled", false);
        // $("#no-rm-spr").prop("disabled", false);
        // $("#umur-spr").prop("disabled", false);

        $("#nama-pasien-spr").prop("disabled", true);
        $("#j-spr-1").prop("disabled", true);
        $("#j-spr-2").prop("disabled", true);
        $("#no-rm-spr").prop("disabled", true);
        $("#umur-spr").prop("disabled", true);
    }





    function cetakSuratPersetujuanRawatInap(details) {
        let detail = details.split('#');

        bootbox.dialog({
            message: "Apakah yang menandatangani adalah pasien sendiri?",
            title: "Tanda Tangan Pasien",
            buttons: {
                tidak: {
                    label: '<i class="fas fa-window-close"></i> Tidak',
                    className: "btn-secondary",
                    callback: function() {
                        var dWidth = $(window).width();
                        var dHeight = $(window).height();
                        var x = screen.width / 2 - dWidth / 2;
                        var y = screen.height / 2 - dHeight / 2;

                        window.open('<?= base_url('pemeriksaan_poli/cetak_persetujuan_rawat_inap/') ?>' + detail[0] +
                            '/tidak', 'Cetak Persetujuan Rawat Inap', 'width=' + dWidth + ', height=' +
                            dHeight + ', left=' + x + ', top=' + y);
                    }
                },
                ya: {
                    label: '<i class="fas fa-check"></i>  Ya',
                    className: "btn-success",
                    callback: function() {
                        var dWidth = $(window).width();
                        var dHeight = $(window).height();
                        var x = screen.width / 2 - dWidth / 2;
                        var y = screen.height / 2 - dHeight / 2;

                        window.open('<?= base_url('pemeriksaan_poli/cetak_persetujuan_rawat_inap/') ?>' + detail[0] +
                            '/ya', 'Cetak Persetujuan Rawat Inap', 'width=' + dWidth + ', height=' +
                            dHeight + ', left=' + x + ', top=' + y);
                    }
                }
            }
        });
    }


    function cetakTataTertibPasien(details) {
        let detail = details.split('#');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_tata_tertib') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Reset all values first
                resetModalTataTertib();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-tata-tertib-title').html(
                    `<b>Form Tata Tertib</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );
                $('#id-layanan-pendaftaran-ttb').val(detail[0]);
                $('#nama-keluarga-ttb').val(data.nama_keluarga);
                $('#no-telp-ttb').val(data.no_telp);

                if (data.is_pasien == 1) {
                    document.getElementById("is-pasien-ttb-ya").checked = true;
                } else if (data.is_pasien == 0) {
                    document.getElementById("is-pasien-ttb-tidak").checked = true;
                }

                $('#modal_tata_tertib').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetModalTataTertib() {
        // Undisabled fields
        $("#nama-keluarga-ttb").prop("disabled", false);
        $("#no-telp-ttb").prop("disabled", false);

        // Set default fields
        $('#nama-keluarga-ttb').val('');
        $('#no-telp-ttb').val('');
        $('#id-layanan-pendaftaran-ttb').val('');

        // Unchecked fields
        document.getElementById("is-pasien-ttb-ya").checked = false;
        document.getElementById("is-pasien-ttb-tidak").checked = false;
    }

    /*function resetModalChecklistPenerimaanPasienRawatInap() {
        // Undisabled fields
        $("#nama-keluarga-cpri").prop("disabled", false);

        // Set default fields
        $('#nama-keluarga-cpri').val('');
        $('#id-layanan-pendaftaran-cpri').val('');

        // Unchecked fields
        document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-ya").checked = false;
        document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-tidak").checked = false;
        document.getElementById("is-pasien-cpri-ya").checked = false;
        document.getElementById("is-pasien-cpri-tidak").checked = false;
        document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-ya").checked = false;
        document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-tidak").checked = false;
        document.getElementById("informasi-tentang-dokter-yang-merawat-ya").checked = false;
        document.getElementById("informasi-tentang-dokter-yang-merawat-tidak").checked = false;
        document.getElementById("nurse-station-ya").checked = false;
        document.getElementById("nurse-station-tidak").checked = false;
        document.getElementById("kamar-mandi-pasien-ya").checked = false;
        document.getElementById("kamar-mandi-pasien-tidak").checked = false;
        document.getElementById("bel-di-kamar-mandi-ya").checked = false;
        document.getElementById("bel-di-kamar-mandi-tidak").checked = false;
        document.getElementById("tempat-tidur-pasien-ya").checked = false;
        document.getElementById("tempat-tidur-pasien-tidak").checked = false;
        document.getElementById("remote-tv-ac-ya").checked = false;
        document.getElementById("remote-tv-ac-tidak").checked = false;
        document.getElementById("tempat-ibadah-ya").checked = false;
        document.getElementById("tempat-ibadah-tidak").checked = false;
        document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-ya").checked = false;
        document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-tidak").checked = false;
        document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-ya").checked = false;
        document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-tidak").checked = false;
        document.getElementById("jadwal-visit-dokter-ya").checked = false;
        document.getElementById("jadwal-visit-dokter-tidak").checked = false;
        document.getElementById("jadwal-jam-berkunjung-ya").checked = false;
        document.getElementById("jadwal-jam-berkunjung-tidak").checked = false;
        document.getElementById("jadwal-ganti-linen-ya").checked = false;
        document.getElementById("jadwal-ganti-linen-tidak").checked = false;
        document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-ya").checked = false;
        document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-tidak").checked = false;
        document.getElementById("perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-ya").checked = false;
        document.getElementById("perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-tidak").checked =
            false;
        document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-ya").checked = false;
        document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-tidak").checked = false;
        document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-ya").checked = false;
        document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-tidak").checked = false;
        document.getElementById("mendapat-kartu-penunggu-ya").checked = false;
        document.getElementById("mendapat-kartu-penunggu-tidak").checked = false;
        document.getElementById("untuk-selalu-menghargai-privasi-pasien-ya").checked = false;
        document.getElementById("untuk-selalu-menghargai-privasi-pasien-tidak").checked = false;
        document.getElementById("pemasangan-dan-fungsi-gelang-ya").checked = false;
        document.getElementById("pemasangan-dan-fungsi-gelang-tidak").checked = false;
        document.getElementById("cara-cuci-tangan-ya").checked = false;
        document.getElementById("cara-cuci-tangan-tidak").checked = false;
    }*/

    //MigraSI eRM
    /*function resetModalPemberianInformasi() {
        // Set default fields
        $('#id-layanan-pendaftaran-pi').val('');
        $('#nama-keluarga-pi').val('');
        $('#id-dokter-pelaksana-tindakan-pi').val('');
        $('#pemberi-informasi-pi').val('');
        $('#penerima-informasi-pi').val('');
        $('#diagnosis-kerja-pi').val('');
        $('#dasar-diagnosis-pi').val('');
        $('#tindakan-kedokteran-pi').val('');
        $('#indikasi-tindakan-pi').val('');
        $('#tata-cara-pi').val('');
        $('#tujuan-pi').val('');
        $('#risiko-komplikasi-pi').val('');
        $('#prognosis-pi').val('');
        $('#alternatif-resiko-pi').val('');
        $('#menyelamatkan-pasien-pi').val('');
        $('#penggunaan-darah-pi').val('');
        $('#analgesia-pi').val('');
        $('#s2id_dokter-pelaksana-tindakan-pi a .select2c-chosen').html('Silahkan dipilih');

        // Undisabled fields
        $("#nama-keluarga-pi").prop("disabled", false);
        $("#pemberi-informasi-pi").prop("disabled", false);
        $("#penerima-keluarga-pi").prop("disabled", false);

        // Unchecked fields
        document.getElementById("is-pasien-pi-ya").checked = false;
        document.getElementById("is-pasien-pi-tidak").checked = false;
        document.getElementById("diagnosis-kerja-check-pi").checked = false;
        document.getElementById("dasar-diagnosis-check-pi").checked = false;
        document.getElementById("tindakan-kedokteran-check-pi").checked = false;
        document.getElementById("indikasi-tindakan-check-pi").checked = false;
        document.getElementById("tata-cara-check-pi").checked = false;
        document.getElementById("tujuan-check-pi").checked = false;
        document.getElementById("risiko-komplikasi-check-pi").checked = false;
        document.getElementById("prognosis-check-pi").checked = false;
        document.getElementById("alternatif-resiko-check-pi").checked = false;
        document.getElementById("menyelamatkan-pasien-check-pi").checked = false;
        document.getElementById("penggunaan-darah-check-pi").checked = false;
        document.getElementById("analgesia-check-pi").checked = false;
    }*/

    //MigraSI eRM
    /*function resetModalSkrining() {
        // Set default fields
        $('#id-layanan-pendaftaran-sr').val('');
        $('#id-petugas').val('');
        $('#id-users').val('');
        $('#tanggal-skrining').val('');
        $('#s2id_petugas-skrining a .select2c-chosen').html('');

        // Undisabled fields
        $("#resiko-jatuh").prop("disabled", false);
        $("#tidak-resiko-jatuh").prop("disabled", false);

        // Unchecked fields
        document.getElementById("check-1").checked = false;
        document.getElementById("check-2").checked = false;
        document.getElementById("check-3").checked = false;
        document.getElementById("check-4").checked = false;
        document.getElementById("check-5").checked = false;
        document.getElementById("check-6").checked = false;
        document.getElementById("check-7").checked = false;
        document.getElementById("check-8").checked = false;
        document.getElementById("check-9").checked = false;
        document.getElementById("check-10").checked = false;
        document.getElementById("check-11").checked = false;
        document.getElementById("check-12").checked = false;
        document.getElementById("check-13").checked = false;
        document.getElementById("check-14").checked = false;
        document.getElementById("check-15").checked = false;
        document.getElementById("resiko-jatuh").checked = false;
        document.getElementById("tidak-resiko-jatuh").checked = false;
        document.getElementById("tanda-tangan").checked = false;
        document.getElementById("stiker").checked = false;
        document.getElementById("edukasi-resiko-jatuh").checked = false;
        document.getElementById("edukasi-lokasi").checked = false;
        document.getElementById("edukasi-pencegahan").checked = false;
    } */

    //MigraSI eRM
    /*function resetModalPenolakanTindakanKedokteran() {
        // Set default fields
        $('#id-layanan-pendaftaran-form').val('');
        $('#nama-keluarga').val('');
        $('#tanggal-lahir').val('');
        $('#alamat-form-rekam-medis').val('');
        $('#hubungan-keluarga').val('');
        $('#tindakan').val('');
        $('#id-saksi-1').val('');
        $('#id-saksi-2').val('');
        $('#s2id_saksi-1 a .select2c-chosen').html('Silahkan dipilih');
        $('#s2id_saksi-2 a .select2c-chosen').html('Silahkan dipilih');

        // Unchecked fields
        document.getElementById("laki-laki").checked = false;
        document.getElementById("perempuan").checked = false;
        document.getElementById("is-pasien-ya").checked = false;
        document.getElementById("is-pasien-tidak").checked = false;

        // Undisabled fields
        $("#nama-keluarga").prop("disabled", false);
        $("#tanggal-lahir").prop("disabled", false);
        $("#laki-laki").prop("disabled", false);
        $("#perempuan").prop("disabled", false);
        $("#alamat-form-rekam-medis    ").prop("disabled", false);
        $("#hubungan-keluarga").prop("disabled", false);
    }*/

    //MigraSI eRM
    /*function resetModalPersetujuanTindakanAnestesi() {
        // Set default fields
        $('#id-layanan-pendaftaran-form-mpta').val('');
        $('#nama-keluarga-mpta').val('');
        $('#tanggal-lahir-mpta').val('');
        $('#alamat-form-rekam-medis-mpta').val('');
        $('#hubungan-keluarga-mpta').val('');
        $('#tindakan-mpta').val('');
        $('#id-saksi-1-mpta').val('');
        $('#id-saksi-2-mpta').val('');
        $('#s2id_saksi-1-mpta a .select2c-chosen').html('Silahkan dipilih');
        $('#s2id_saksi-2-mpta a .select2c-chosen').html('Silahkan dipilih');

        // Unchecked fields
        document.getElementById("laki-laki-mpta").checked = false;
        document.getElementById("perempuan-mpta").checked = false;
        document.getElementById("is-pasien-ya-mpta").checked = false;
        document.getElementById("is-pasien-tidak-mpta").checked = false;

        // Undisabled fields
        $("#nama-keluarga-mpta").prop("disabled", false);
        $("#tanggal-lahir-mpta").prop("disabled", false);
        $("#laki-laki-mpta").prop("disabled", false);
        $("#perempuan-mpta").prop("disabled", false);
        $("#alamat-form-rekam-medis-mpta").prop("disabled", false);
        $("#hubungan-keluarga-mpta").prop("disabled", false);
    }*/

    //MigraSI eRM
    /*function resetModalPersetujuanTindakanKedokteran() {
        // Set default fields
        $('#id-layanan-pendaftaran-form-mptk').val('');
        $('#nama-keluarga-mptk').val('');
        $('#tanggal-lahir-mptk').val('');
        $('#alamat-form-rekam-medis-mptk').val('');
        $('#hubungan-keluarga-mptk').val('');
        $('#tindakan-mptk').val('');
        $('#id-saksi-1-mptk').val('');
        $('#id-saksi-2-mptk').val('');
        $('#s2id_saksi-1-mptk a .select2c-chosen').html('Silahkan dipilih');
        $('#s2id_saksi-2-mptk a .select2c-chosen').html('Silahkan dipilih');

        // Unchecked fields
        document.getElementById("laki-laki-mptk").checked = false;
        document.getElementById("perempuan-mptk").checked = false;
        document.getElementById("is-pasien-ya-mptk").checked = false;
        document.getElementById("is-pasien-tidak-mptk").checked = false;

        // Undisabled fields
        $("#nama-keluarga-mptk").prop("disabled", false);
        $("#tanggal-lahir-mptk").prop("disabled", false);
        $("#laki-laki-mptk").prop("disabled", false);
        $("#perempuan-mptk").prop("disabled", false);
        $("#alamat-form-rekam-medis-mptk").prop("disabled", false);
        $("#hubungan-keluarga-mptk").prop("disabled", false);
    }*/

    // Migrasi ERM
    /*function resetModalPersetujuanTindakanOperasi() {
        // Set default fields
        $('#id-layanan-pendaftaran-form-mpto').val('');
        $('#nama-keluarga-mpto').val('');
        $('#tanggal-lahir-mpto').val('');
        $('#alamat-form-rekam-medis-mpto').val('');
        $('#hubungan-keluarga-mpto').val('');
        $('#tindakan-mpto').val('');
        $('#id-saksi-1-mpto').val('');
        $('#id-saksi-2-mpto').val('');
        $('#s2id_saksi-1-mpto a .select2c-chosen').html('Silahkan dipilih');
        $('#s2id_saksi-2-mpto a .select2c-chosen').html('Silahkan dipilih');

        // Unchecked fields
        document.getElementById("laki-laki-mpto").checked = false;
        document.getElementById("perempuan-mpto").checked = false;
        document.getElementById("is-pasien-ya-mpto").checked = false;
        document.getElementById("is-pasien-tidak-mpto").checked = false;

        // Undisabled fields
        $("#nama-keluarga-mpto").prop("disabled", false);
        $("#tanggal-lahir-mpto").prop("disabled", false);
        $("#laki-laki-mpto").prop("disabled", false);
        $("#perempuan-mpto").prop("disabled", false);
        $("#alamat-form-rekam-medis-mpto").prop("disabled", false);
        $("#hubungan-keluarga-mpto").prop("disabled", false);
    }*/

    // Migrasi ERM
    /*function cetakVisumEtRepertum(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_visum_et_repertum') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalVisumEtRepertum();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-visum-et-repertum-title').html(`<b>Form Visum Et Repertum</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
                $('#id-pendaftaran-ver').val(detail[0]);
                $('#id-dokter-jaga-idg-ver').val(data.id_dokter_igd);
                $('#nomor-visum-ver').val(data.nomor_visum);
                $('#nomor-surat-ver').val(data.nomor_surat);
                $('#tahun-surat-ver').val(data.tahun_surat);
                $('#diperiksa-ver').val(datetimefmysql(data.diperiksa));
                $('#diterima-ver').val(datetimefmysql(data.diterima));
                $('#nomor-polisi-ver').val(data.nomor_polisi);
                $('#ditandatangani-oleh-ver').val(data.ditandatangani_oleh);
                $('#pangkat-ver').val(data.pangkat);
                $('#nrp-ver').val(data.nrp);
                $('#berat-badan-ver').val(data.berat_badan);
                $('#panjang-badan-ver').val(data.panjang_badan);
                $('#warna-kulit-ver').val(data.warna_kulit);
                $('#warna-pelangi-mata-ver').val(data.warna_pelangi_mata);
                $('#warna-rambut-ver').val(data.warna_rambut);
                $('#warna-pakaian-ver').val(data.warna_pakaian);
                $('#bahan-pakaian-ver').val(data.bahan_pakaian);
                $('#merk-pakaian-ver').val(data.merk_pakaian);
                $('#ukuran-pakaian-ver').val(data.ukuran_pakaian);
                $('#gambar-lambang-pakaian-ver').val(data.gambar_lambang_pakaian);
                $('#warna-celana-ver').val(data.warna_celana);
                $('#ukuran-celana-ver').val(data.ukuran_celana);
                $('#merk-celana-ver').val(data.merk_celana);
                $('#perhiasan-ver').val(data.perhiasan);
                $('#lain-lain-identitas-pasien-ver').val(data.lain_lain_identitas_pasien);
                $('#tubuh-ver').val(data.tubuh);
                $('#anggota-gerak-atas-kanan-ver').val(data.anggota_gerak_atas_kanan);
                $('#anggota-gerak-atas-kiri-ver').val(data.anggota_gerak_atas_kiri);
                $('#anggota-gerak-bawah-kanan-ver').val(data.anggota_gerak_bawah_kanan);
                $('#anggota-gerak-bawah-kiri-ver').val(data.anggota_gerak_bawah_kiri);
                $('#alis-mata-ver').val(data.alis_mata);
                $('#bulu-mata-ver').val(data.bulu_mata);
                $('#selaput-kelopak-mata-ver').val(data.selaput_kelopak_mata);
                $('#selaput-bening-mata-ver').val(data.selaput_biji_mata);
                $('#selaput-biji-mata-ver').val(data.selaput_biji_mata);
                $('#bentuk-pupil-mata-ver').val(data.bentuk_pupil);
                $('#ukuran-pupil-mata-ver').val(data.ukuran_pupil);
                $('#garis-tengah-pupil-mata-ver').val(data.garis_tengah);
                $('#garis-kanan-pupil-mata-ver').val(data.garis_kanan);
                $('#garis-kiri-pupil-mata-ver').val(data.garis_kiri);
                $('#pelangi-mata-ver').val(data.pelangi_mata);
                $('#kesimpulan-ver').val(data.kesimpulan);
                $('#s2id_dokter-jaga-igd-ver a .select2c-chosen').html(data.nama_dokter_jaga_igd);
                $("#bulan-surat-ver").val(data.bulan_surat).change();

                if (data.ciri_rambut == 'Pendek') {
                    document.getElementById("pendek-ver").checked = true;
                } else if (data.ciri_rambut == 'Panjang') {
                    document.getElementById("panjang-ver").checked = true;
                }

                if (data.keadaan_gizi == 'Kurang') {
                    document.getElementById("kurang-ver").checked = true;
                } else if (data.keadaan_gizi == 'Cukup') {
                    document.getElementById("cukup-ver").checked = true;
                } else if (data.keadaan_gizi == 'Lebih') {
                    document.getElementById("lebih-ver").checked = true;
                }

                if (data.pakaian == 'Baju lengan panjang') {
                    document.getElementById("pakaian-lengan-panjang-ver").checked = true;
                } else if (data.pakaian == 'Baju lengan pendek') {
                    document.getElementById("pakaian-lengan-pendek-ver").checked = true;
                }

                if (data.tampak_pakaian == 'Ada darah') {
                    document.getElementById("ada-darah-ver").checked = true;
                } else if (data.tampak_pakaian == 'Tidak ada darah') {
                    document.getElementById("tidak-ada-darah-ver").checked = true;
                }

                if (data.bentuk_hidung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bentuk-hidung-ver").checked = true;
                } else if (data.bentuk_hidung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bentuk-hidung-ver").checked = true;
                }

                if (data.permukaan_kulit_hidung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-permukaan-kulit-hidung-ver").checked = true;
                } else if (data.permukaan_kulit_hidung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-permukaan-kulit-hidung-ver").checked = true;
                }

                if (data.lubang_hidung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-lubang-hidung-ver").checked = true;
                } else if (data.lubang_hidung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-lubang-hidung-ver").checked = true;
                }

                if (data.bentuk_telinga == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bentuk-telinga-ver").checked = true;
                } else if (data.bentuk_telinga == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bentuk-telinga-ver").checked = true;
                }

                if (data.permukaan_telinga == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-permukaan-telinga-ver").checked = true;
                } else if (data.permukaan_telinga == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-permukaan-telinga-ver").checked = true;
                }

                if (data.lubang_telinga == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-lubang-telinga-ver").checked = true;
                } else if (data.lubang_telinga == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-lubang-telinga-ver").checked = true;
                }

                if (data.bibir_atas == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bibir-atas-ver").checked = true;
                } else if (data.bibir_atas == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bibir-atas-ver").checked = true;
                }

                if (data.celana == 'Celana panjang') {
                    document.getElementById("celana-panjang-ver").checked = true;
                } else if (data.celana == 'Rok') {
                    document.getElementById("rok-ver").checked = true;
                } else if (data.celana == 'Kain') {
                    document.getElementById("kain-ver").checked = true;
                }

                if (data.tato == 'Tidak') {
                    document.getElementById("tato-tidak-ada-ver").checked = true;
                } else if (data.tato == 'Ada') {
                    document.getElementById("tato-ada-ver").checked = true;
                    $('#posisi-tato-ver').val(data.posisi_tato);
                    $("#posisi-tato-ver").prop("disabled", false);
                }

                if (data.jaringan_parut == 'Tidak') {
                    document.getElementById("jaringan-parut-tidak-ada-ver").checked = true;
                } else if (data.jaringan_parut == 'Ada') {
                    document.getElementById("jaringan-parut-ada-ver").checked = true;
                    $('#posisi-jaringan-parut-ver').val(data.posisi_jaringan_parut);
                    $("#posisi-jaringan-parut-ver").prop("disabled", false);
                }

                if (data.tahi_lalat == 'Tidak') {
                    document.getElementById("tahi-lalat-tidak-ada-ver").checked = true;
                } else if (data.tahi_lalat == 'Ada') {
                    document.getElementById("tahi-lalat-ada-ver").checked = true;
                    $('#posisi-tahi-lalat-ver').val(data.posisi_tahi_lalat);
                    $("#posisi-tahi-lalat-ver").prop("disabled", false);
                }

                if (data.tanda_lahir == 'Tidak') {
                    document.getElementById("tanda-lahir-tidak-ada-ver").checked = true;
                } else if (data.tanda_lahir == 'Ada') {
                    document.getElementById("tanda-lahir-ada-ver").checked = true;
                    $('#posisi-tanda-lahir-ver').val(data.posisi_tanda_lahir);
                    $("#posisi-tanda-lahir-ver").prop("disabled", false);
                }

                if (data.cacat_fisik == 'Tidak') {
                    document.getElementById("cacat-fisik-tidak-ada-ver").checked = true;
                } else if (data.cacat_fisik == 'Ada') {
                    document.getElementById("cacat-fisik-ada-ver").checked = true;
                    $('#posisi-cacat-fisik-ver').val(data.posisi_cacat_fisik);
                    $("#posisi-cacat-fisik-ver").prop("disabled", false);
                }

                if (data.daerah_berambut == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-daerah-berambut-ver").checked = true;
                } else if (data.daerah_berambut == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-daerah-berambut-ver").checked = true;
                    $('#kelainan-daerah-berambut-ver').val(data.kelainan_daerah_rambut);
                    $("#kelainan-daerah-berambut-ver").prop("disabled", false);
                }

                if (data.bentuk_kepala == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bentuk-kepala-ver").checked = true;
                } else if (data.bentuk_kepala == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bentuk-kepala-ver").checked = true;
                    $('#kelainan-bentuk-kepala-ver').val(data.kelainan_bentuk_kepala);
                    $("#kelainan-bentuk-kepala-ver").prop("disabled", false);
                }

                if (data.wajah == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-wajah-ver").checked = true;
                } else if (data.wajah == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-wajah-ver").checked = true;
                    $('#kelainan-wajah-ver').val(data.kelainan_wajah);
                    $("#kelainan-wajah-ver").prop("disabled", false);
                }

                if (data.leher == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-leher-ver").checked = true;
                } else if (data.leher == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-leher-ver").checked = true;
                    $('#kelainan-leher-ver').val(data.kelainan_leher);
                    $("#kelainan-leher-ver").prop("disabled", false);
                }

                if (data.bahu == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bahu-ver").checked = true;
                } else if (data.bahu == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bahu-ver").checked = true;
                    $('#kelainan-bahu-ver').val(data.kelainan_bahu);
                    $("#kelainan-bahu-ver").prop("disabled", false);
                }

                if (data.dada == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-dada-ver").checked = true;
                } else if (data.dada == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-dada-ver").checked = true;
                    $('#kelainan-dada-ver').val(data.kelainan_dada);
                    $("#kelainan-dada-ver").prop("disabled", false);
                }

                if (data.punggung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-punggung-ver").checked = true;
                } else if (data.punggung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-punggung-ver").checked = true;
                    $('#kelainan-punggung-ver').val(data.kelainan_punggung);
                    $("#kelainan-punggung-ver").prop("disabled", false);
                }

                if (data.perut == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-perut-ver").checked = true;
                } else if (data.perut == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-perut-ver").checked = true;
                    $('#kelainan-perut-ver').val(data.kelainan_perut);
                    $("#kelainan-perut-ver").prop("disabled", false);
                }

                if (data.bokong == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bokong-ver").checked = true;
                } else if (data.bokong == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bokong-ver").checked = true;
                    $('#kelainan-bokong-ver').val(data.kelainan_bokong);
                    $("#kelainan-bokong-ver").prop("disabled", false);
                }

                if (data.dubur == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-dubur-ver").checked = true;
                } else if (data.dubur == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-dubur-ver").checked = true;
                    $('#kelainan-dubur-ver').val(data.kelainan_dubur);
                    $("#kelainan-dubur-ver").prop("disabled", false);
                }

                $('#modal-visum-et-repertum').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }*/

    /*function resetModalVisumEtRepertum() {
        // Set default fields
        $('#id-pendaftaran-ver').val('');
        $('#id-dokter-jaga-idg-ver').val('');
        $('#nomor-visum-ver').val('');
        $('#nomor-surat-ver').val('');
        $('#tahun-surat-ver').val('');
        $('#nomor-polisi-ver').val('');
        $('#ditandatangani-oleh-ver').val('');
        $('#pangkat-ver').val('');
        $('#nrp-ver').val('');
        $('#berat-badan-ver').val('');
        $('#panjang-badan-ver').val('');
        $('#warna-kulit-ver').val('');
        $('#warna-pelangi-mata-ver').val('');
        $('#warna-rambut-ver').val('');
        $('#warna-pakaian-ver').val('');
        $('#bahan-pakaian-ver').val('');
        $('#merk-pakaian-ver').val('');
        $('#ukuran-pakaian-ver').val('');
        $('#gambar-lambang-pakaian-ver').val('');
        $('#warna-celana-ver').val('');
        $('#ukuran-celana-ver').val('');
        $('#merk-celana-ver').val('');
        $('#perhiasan-ver').val('');
        $('#lain-lain-identitas-pasien-ver').val('');
        $('#tubuh-ver').val('');
        $('#anggota-gerak-atas-kanan-ver').val('');
        $('#anggota-gerak-atas-kiri-ver').val('');
        $('#anggota-gerak-bawah-kanan-ver').val('');
        $('#anggota-gerak-bawah-kiri-ver').val('');
        $('#alis-mata-ver').val('');
        $('#bulu-mata-ver').val('');
        $('#selaput-kelopak-mata-ver').val('');
        $('#selaput-bening-mata-ver').val('');
        $('#selaput-biji-mata-ver').val('');
        $('#bentuk-pupil-mata-ver').val('');
        $('#ukuran-pupil-mata-ver').val('');
        $('#garis-tengah-pupil-mata-ver').val('');
        $('#garis-kanan-pupil-mata-ver').val('');
        $('#garis-kiri-pupil-mata-ver').val('');
        $('#pelangi-mata-ver').val('');
        $('#kesimpulan-ver').val('');
        $('#posisi-tato-ver').val('');
        $('#posisi-jaringan-parut-ver').val('');
        $('#posisi-tahi-lalat-ver').val('');
        $('#posisi-tanda-lahir-ver').val('');
        $('#posisi-cacat-fisik-ver').val('');
        $('#kelainan-daerah-berambut-ver').val('');
        $('#kelainan-bentuk-kepala-ver').val('');
        $('#kelainan-wajah-ver').val('');
        $('#kelainan-leher-ver').val('');
        $('#kelainan-bahu-ver').val('');
        $('#kelainan-dada-ver').val('');
        $('#kelainan-punggung-ver').val('');
        $('#kelainan-perut-ver').val('');
        $('#kelainan-bokong-ver').val('');
        $('#kelainan-dubur-ver').val('');
        $("#bulan-surat-ver").val('Januari').change();
        $('#s2id_dokter-jaga-igd-ver a .select2c-chosen').html('');

        // Unchecked fields
        document.getElementById("pendek-ver").checked = false;
        document.getElementById("panjang-ver").checked = false;
        document.getElementById("kurang-ver").checked = false;
        document.getElementById("cukup-ver").checked = false;
        document.getElementById("lebih-ver").checked = false;
        document.getElementById("pakaian-lengan-panjang-ver").checked = false;
        document.getElementById("pakaian-lengan-pendek-ver").checked = false;
        document.getElementById("ada-darah-ver").checked = false;
        document.getElementById("tidak-ada-darah-ver").checked = false;
        document.getElementById("ada-kelainan-bentuk-hidung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bentuk-hidung-ver").checked = false;
        document.getElementById("ada-kelainan-permukaan-kulit-hidung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-permukaan-kulit-hidung-ver").checked = false;
        document.getElementById("ada-kelainan-lubang-hidung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-lubang-hidung-ver").checked = false;
        document.getElementById("ada-kelainan-bentuk-telinga-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bentuk-telinga-ver").checked = false;
        document.getElementById("ada-kelainan-permukaan-telinga-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-permukaan-telinga-ver").checked = false;
        document.getElementById("ada-kelainan-lubang-telinga-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-lubang-telinga-ver").checked = false;
        document.getElementById("ada-kelainan-bibir-atas-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bibir-atas-ver").checked = false;
        document.getElementById("celana-panjang-ver").checked = false;
        document.getElementById("rok-ver").checked = false;
        document.getElementById("kain-ver").checked = false;
        document.getElementById("tato-tidak-ada-ver").checked = false;
        document.getElementById("tato-ada-ver").checked = false;
        document.getElementById("jaringan-parut-tidak-ada-ver").checked = false;
        document.getElementById("jaringan-parut-ada-ver").checked = false;
        document.getElementById("tahi-lalat-tidak-ada-ver").checked = false;
        document.getElementById("tahi-lalat-ada-ver").checked = false;
        document.getElementById("tanda-lahir-tidak-ada-ver").checked = false;
        document.getElementById("tanda-lahir-ada-ver").checked = false;
        document.getElementById("cacat-fisik-tidak-ada-ver").checked = false;
        document.getElementById("cacat-fisik-ada-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-daerah-berambut-ver").checked = false;
        document.getElementById("ada-kelainan-daerah-berambut-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bentuk-kepala-ver").checked = false;
        document.getElementById("ada-kelainan-bentuk-kepala-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-wajah-ver").checked = false;
        document.getElementById("ada-kelainan-wajah-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-leher-ver").checked = false;
        document.getElementById("ada-kelainan-leher-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bahu-ver").checked = false;
        document.getElementById("ada-kelainan-bahu-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-dada-ver").checked = false;
        document.getElementById("ada-kelainan-dada-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-punggung-ver").checked = false;
        document.getElementById("ada-kelainan-punggung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-perut-ver").checked = false;
        document.getElementById("ada-kelainan-perut-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bokong-ver").checked = false;
        document.getElementById("ada-kelainan-bokong-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-dubur-ver").checked = false;
        document.getElementById("ada-kelainan-dubur-ver").checked = false;

        // Disabled fields
        $("#posisi-tato-ver").prop("disabled", true);
        $("#posisi-jaringan-parut-ver").prop("disabled", true);
        $("#posisi-tahi-lalat-ver").prop("disabled", true);
        $("#posisi-tanda-lahir-ver").prop("disabled", true);
        $("#posisi-cacat-fisik-ver").prop("disabled", true);
        $("#kelainan-daerah-berambut-ver").prop("disabled", true);
        $("#kelainan-bentuk-kepala-ver").prop("disabled", true);
        $("#kelainan-wajah-ver").prop("disabled", true);
        $("#kelainan-leher-ver").prop("disabled", true);
        $("#kelainan-bahu-ver").prop("disabled", true);
        $("#kelainan-dada-ver").prop("disabled", true);
        $("#kelainan-punggung-ver").prop("disabled", true);
        $("#kelainan-perut-ver").prop("disabled", true);
        $("#kelainan-bokong-ver").prop("disabled", true);
        $("#kelainan-dubur-ver").prop("disabled", true);
    } */

    function cetakSuratKeteranganKematian(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_surat_keterangan_kematian') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalSuratKeteranganKematian();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-surat-keterangan-kematian-title').html(`<b>Form Surat Keterangan Kematian</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
                $('#id-pendaftaran-skk').val(detail[0]);
                $('#id-pemeriksa-skk').val(data.id_pemeriksa);
                $('#nomor-surat-kematian-skk').val(data.nomor_surat_kematian);
                $('#nomor-urut-kematian-skk').val(data.nomor_urut_kematian);
                $('#nomor-kk-skk').val(data.nomor_kk);
                $('#alamat-meninggal-skk').val(data.alamat_meninggal);
                $('#kode-kematian-skk').val(data.kode_kematian);
                $('#yang-melapor-skk').val(data.yang_melapor);
                $('#ktp-skk').val(data.ktp);
                $('#waktu-pemeriksaan-skk').val(datetimefmysql(data.waktu_pemeriksaan));

                $('#s2id_dokter-pemeriksa-skk a .select2c-chosen').html(data.nama_pemeriksa);

                if (data.tempat_meninggal == 'Rumah Sakit') {
                    document.getElementById("rs-skk").checked = true;
                } else if (data.tempat_meninggal == 'Rumah Bersalin') {
                    document.getElementById("rb-skk").checked = true;
                } else if (data.tempat_meninggal == 'Puskesmas') {
                    document.getElementById("puskesmas-skk").checked = true;
                } else if (data.tempat_meninggal == 'Rumah') {
                    document.getElementById("rumah-skk").checked = true;
                } else if (data.tempat_meninggal == 'Lain-lain') {
                    document.getElementById("lain-lain-skk").checked = true;
                }

                if (data.jenis_pemeriksaan == 'Visum') {
                    document.getElementById("visum-skk").checked = true;
                } else if (data.jenis_pemeriksaan == 'Otopsi') {
                    document.getElementById("otopsi-skk").checked = true;
                } else if (data.jenis_pemeriksaan == 'Tidak divisum') {
                    document.getElementById("tidak-divisum-skk").checked = true;
                }

                if (data.sebab_kematian == 'Sakit') {
                    document.getElementById("sakit-skk").checked = true;
                } else if (data.sebab_kematian == 'Bersalin') {
                    document.getElementById("bersalin-skk").checked = true;
                } else if (data.sebab_kematian == 'Lahir Mati') {
                    document.getElementById("lahir-mati-skk").checked = true;
                } else if (data.sebab_kematian == 'Kecelakaan Lalu Lintas') {
                    document.getElementById("kecelakaan-lalin-skk").checked = true;
                } else if (data.sebab_kematian == 'Kecelakaan Industri') {
                    document.getElementById("kecelakaan-industri-skk").checked = true;
                } else if (data.sebab_kematian == 'Bunuh Diri') {
                    document.getElementById("bunuh-diri-skk").checked = true;
                } else if (data.sebab_kematian == 'Pembunuhan/Penganiayaan') {
                    document.getElementById("pembunuhan-skk").checked = true;
                } else if (data.sebab_kematian == 'Lain-lain') {
                    document.getElementById("lain-lain-sebab-kematian-skk").checked = true;
                } else if (data.sebab_kematian == 'Tidak Dapat Ditentukan') {
                    document.getElementById("tidak-dapat-ditentukan-skk").checked = true;
                }

                if (data.dikubur == 'Tangerang') {
                    document.getElementById("tangerang-skk").checked = true;
                } else if (data.dikubur == 'Luar Tangerang') {
                    document.getElementById("luar-tangerang-skk").checked = true;
                }

                if (data.awetkan == 1) {
                    document.getElementById("diawetkan-skk").checked = true;
                } else if (data.awetkan == 0) {
                    document.getElementById("tidak-diawetkan-skk").checked = true;
                }

                $('#modal-surat-keterangan-kematian').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetModalSuratKeteranganKematian() {
        // Set default fields
        $('#id-pendaftaran-skk').val('');
        $('#id-pemeriksa-skk').val('');
        $('#nomor-surat-kematian-skk').val('');
        $('#nomor-urut-kematian-skk').val('');
        $('#nomor-kk-skk').val('');
        $('#alamat-meninggal-skk').val('');
        $('#waktu-pemeriksaan-skk').val('');
        $('#kode-kematian-skk').val('');
        $('#yang-melapor-skk').val('');
        $('#ktp-skk').val('');
        $('#s2id_dokter-pemeriksa-skk a .select2c-chosen').html('Silahkan dipilih');

        // Unchecked fields
        document.getElementById("rs-skk").checked = false;
        document.getElementById("rb-skk").checked = false;
        document.getElementById("puskesmas-skk").checked = false;
        document.getElementById("rumah-skk").checked = false;
        document.getElementById("lain-lain-skk").checked = false;
        document.getElementById("visum-skk").checked = false;
        document.getElementById("otopsi-skk").checked = false;
        document.getElementById("tidak-divisum-skk").checked = false;
        document.getElementById("sakit-skk").checked = false;
        document.getElementById("bersalin-skk").checked = false;
        document.getElementById("lahir-mati-skk").checked = false;
        document.getElementById("kecelakaan-lalin-skk").checked = false;
        document.getElementById("kecelakaan-industri-skk").checked = false;
        document.getElementById("bunuh-diri-skk").checked = false;
        document.getElementById("pembunuhan-skk").checked = false;
        document.getElementById("lain-lain-sebab-kematian-skk").checked = false;
        document.getElementById("tidak-dapat-ditentukan-skk").checked = false;
        document.getElementById("tangerang-skk").checked = false;
        document.getElementById("luar-tangerang-skk").checked = false;
        document.getElementById("diawetkan-skk").checked = false;
        document.getElementById("tidak-diawetkan-skk").checked = false;
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
										<span class="brg" style="display: none"><input type=hidden name="id_barang${v.no_r}[]" id="id-barang${v.no_r}${j}" class="barang" value="${val.id_barang}"></span>
										<span class="krs" style="display: none"><input type=hidden name="obatkronis${v.no_r}[]" id="obatkronis${v.no_r}${j}" class="obat-kronis" value="${val.kronis}"></span>
										<p>
											${val.nama_barang}&nbsp;${obatkronistxt}
											<input type="hidden" class="kekuatan-obat" id="kekuatan${v.no_r}${j}" value="${val.kekuatan  === '' ? val.dosis_racik : val.kekuatan}"/>
											<input type="hidden" class="harga-jual-barang" id="harga-jual-barang${v.no_r}${j}" value="${val.jual_harga}"/>
											<input type="hidden" class="sisa-stok" id="sisa-stok${v.no_r}${j}" value="${val.stok_akhir}"/>
										</p>
										<div style="display: flex; justify-content: space-between; align-items: center; gap: 2.4rem">
											<div style="display: flex; gap:.5rem">
												Dosis Racik
												<input class="dosisracik custom-form" type="text" name="dosisracik${v.no_r}[]" id="dosisracik${v.no_r}${j}" value="${val.dosis_racik}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)" readonly>
												${val.satuan_kekuatan}
											</div>
											<div style="display: flex; gap:.5rem; align-items: center">
												Jml Pakai
												<input class="jmlpakai custom-form" type="text" name="jmlpakai${v.no_r}[]" id="jmlpakai${v.no_r}${j}" value="${val.jumlah_pakai}" style="width:50px; display:unset;" data-jual_harga="${val.jual_harga}" data-id="${v.no_r}${j}n" onchange="chRDetail($(this))" onkeypress="return hanyaAngka(event)">
											</div>
											<div style="display: flex; gap:.5rem">
												<span id="hb-${v.no_r}${j}n" class="harga-barang">${money_format(precise_round(val.jumlah_pakai * val.jual_harga, 2))}</span>
											</div>
											<div style="display: flex; gap:.2rem">
												<button type="button" title="Klik untuk hapus" class="btn btn-secondary btn-xs" onclick="removeElement(${v.no_r}, $(this))"><i class="fas fa-times-circle"></i></button>
												<input type=hidden name="jmldetail${v.no_r}[]" id="jmldetail${v.no_r}${j}" class="jmldetail" value="${v.no_r}">
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
                                let no_r = $(this).parent()
                                    .parent()
                                    .parent()
                                    .find('.no-r').val()

                                const dose = `#dosisracik${no_r}${index}`;
                                const strength = `#kekuatan${no_r}${index}`;
                                const price = `#harga-jual-barang${no_r}${index}`;
                                const usedAmount = `#jmlpakai${no_r}${index}`;
                                const salePrice = `#hb-${no_r}${index}n`;

                                if (permintaan) {
                                    const dosisRacik = parseInt($(element).find(dose).val());
                                    const kekuatan = parseInt($(element).find(strength).val());
                                    const hargaJualBarang = parseFloat($(element).find(price).val());
                                    const sisaStok = parseInt($(`#sisa-stok${no_r}${index}`).val())

                                    const jumlahPakai = (dosisRacik * permintaan) / kekuatan;
                                    const hargaJual = roundToTwo(jumlahPakai * hargaJualBarang);

                                    if (jumlahPakai > sisaStok) {
                                        syams_validation(`#jmlpakai${no_r}${index}`, 'Sisa stok tidak cukup! sisa stok : ' + $(`#sisa-stok${no_r}${index}`).val());
                                    } else {
                                        syams_validation_remove(`#jmlpakai${no_r}${index}`);
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