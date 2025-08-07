<script>
    $(function() {
        $("#bwizard_pengkajian_kebidanan").bwizard();
        $('#waktu-kajian-kebidanan, #tanggal-jam-bidan, #tanggal-jam-dokter-keb, #waktu-kajian-medis-bidan, #tgl-medis-dpjp, #tgl-medis-dokter')
            .datetimepicker({
                format: 'DD/MM/YYYY HH:mm',
                pickSecond: false,
                pick12HourFormat: false,
                maxDate: new Date(),
                beforeShow: function(i) {
                    if ($(i).attr('readonly')) {
                        return false;
                    }
                }
            });

        $('#keluhan-utama-keb-3, #tanggal-pemeriksaan-lab-kebidanan, #tanggal-pemeriksaan-rad-kebidanan')
            .datetimepicker({
                format: 'DD/MM/YYYY',
                pickSecond: false,
                pick12HourFormat: false,
                maxDate: new Date(),
                beforeShow: function(i) {
                    if ($(i).attr('readonly')) {
                        return false;
                    }
                }
            });

        $("#rk-bidan-5").datepicker({
            format: 'dd/mm/yyyy',
            // endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#keluhan-utama-keb-2, #keluhan-utama-keb-5, #keluhan-utama-keb-8, #kebutuhan-biologis-2, #kebutuhan-biologis-4, #kebutuhan-biologis-6, #kebutuhan-biologis-8')
            .on('click', function() {
                $(this).timepicker({
                    format: 'HH:mm',
                    showInputs: false,
                    showMeridian: false
                });
            })

        $('#btn-expand-all-kebidanan').click(function() {$('.collapse').addClass('show');});
        $('#btn-collapse-all-kebidanan').click(function() {$('.collapse').removeClass('show');});

        // NAMA BIDAN AWAL
        $('#id-bidan').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: 15,
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


        // NAMA DOKTER AWAL
        $('#id-dokter, #ttd-medis-dpjp, #ttd-medis-dokter').select2c({
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


        $('#alat-bantu-jalan-kebidanan-1').click(function() {
            if ($(this).is(":checked")) {
                $('#alat-bantu-jalan-1-kebidanan-ya').prop('disabled', false);
                $('#alat-bantu-jalan-1-kebidanan-ya').prop('checked', true).change();
            } else {
                $('#alat-bantu-jalan-1-kebidanan-ya').prop('checked', false).change();;
                $('#alat-bantu-jalan-1-kebidanan-ya').prop('disabled', true);
            }
        });

        $('#alat-bantu-jalan-kebidanan-2').click(function() {
            if ($(this).is(":checked")) {
                $('#alat-bantu-jalan-2-kebidanan-ya').prop('disabled', false);
                $('#alat-bantu-jalan-2-kebidanan-ya').prop('checked', true).change();
            } else {
                $('#alat-bantu-jalan-2-kebidanan-ya').prop('checked', false).change();;
                $('#alat-bantu-jalan-2-kebidanan-ya').prop('disabled', true);
            }
        });

        $('#alat-bantu-jalan-kebidanan-3').click(function() {
            if ($(this).is(":checked")) {
                $('#alat-bantu-jalan-3-kebidanan-ya').prop('disabled', false);
                $('#alat-bantu-jalan-3-kebidanan-ya').prop('checked', true).change();
            } else {
                $('#alat-bantu-jalan-3-kebidanan-ya').prop('checked', false).change();;
                $('#alat-bantu-jalan-3-kebidanan-ya').prop('disabled', true);
            }
        });

        $('#cara-berjalan-kebidanan-1').click(function() {
            if ($(this).is(":checked")) {
                $('#cara-berjalan-1-kebidanan-ya').prop('disabled', false);
                $('#cara-berjalan-1-kebidanan-ya').prop('checked', true).change();
            } else {
                $('#cara-berjalan-1-kebidanan-ya').prop('checked', false).change();;
                $('#cara-berjalan-1-kebidanan-ya').prop('disabled', true);
            }
        });

        $('#cara-berjalan-kebidanan-2').click(function() {
            if ($(this).is(":checked")) {
                $('#cara-berjalan-2-kebidanan-ya').prop('disabled', false);
                $('#cara-berjalan-2-kebidanan-ya').prop('checked', true).change();
            } else {
                $('#cara-berjalan-2-kebidanan-ya').prop('checked', false).change();;
                $('#cara-berjalan-2-kebidanan-ya').prop('disabled', true);
            }
        });

        $('#cara-berjalan-kebidanan-3').click(function() {
            if ($(this).is(":checked")) {
                $('#cara-berjalan-3-kebidanan-ya').prop('disabled', false);
                $('#cara-berjalan-3-kebidanan-ya').prop('checked', true).change();
            } else {
                $('#cara-berjalan-3-kebidanan-ya').prop('checked', false).change();;
                $('#cara-berjalan-3-kebidanan-ya').prop('disabled', true);
            }
        });

        $('#status-mental-kebidanan-1').click(function() {
            if ($(this).is(":checked")) {
                $('#status-mental-1-kebidanan-ya').prop('disabled', false);
                $('#status-mental-1-kebidanan-ya').prop('checked', true).change();
            } else {
                $('#status-mental-1-kebidanan-ya').prop('checked', false).change();;
                $('#status-mental-1-kebidanan-ya').prop('disabled', true);
            }
        });

        $('#status-mental-kebidanan-2').click(function() {
            if ($(this).is(":checked")) {
                $('#status-mental-2-kebidanan-ya').prop('disabled', false);
                $('#status-mental-2-kebidanan-ya').prop('checked', true).change();
            } else {
                $('#status-mental-2-kebidanan-ya').prop('checked', false).change();;
                $('#status-mental-2-kebidanan-ya').prop('disabled', true);
            }
        });


        // Rujukan pengkajian awal kebidanan dan kandungan
        $('#rujukan-pasien-rs').click(function() {
            if ($(this).is(":checked")) {
                $('#rujukan-pasien-rss').prop('disabled', false);
            } else {
                $('#rujukan-pasien-rss').val('');
                $('#rujukan-pasien-rss').prop('disabled', true);
            }
        });

        $('#rujukan-pasien-puskesmas').click(function() {
            if ($(this).is(":checked")) {
                $('#rujukan-pasien-puskesmass').prop('disabled', false);
            } else {
                $('#rujukan-pasien-puskesmass').val('');
                $('#rujukan-pasien-puskesmass').prop('disabled', true);
            }
        });

        $('#rujukan-pasien-bidan').click(function() {
            if ($(this).is(":checked")) {
                $('#rujukan-pasien-bidann').prop('disabled', false);
            } else {
                $('#rujukan-pasien-bidann').val('');
                $('#rujukan-pasien-bidann').prop('disabled', true);
            }
        });

        $('#rujukan-pasien-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#rujukan-pasien-lainl').prop('disabled', false);
            } else {
                $('#rujukan-pasien-lainl').val('');
                $('#rujukan-pasien-lainl').prop('disabled', true);
            }
        });



        //Informasi Diperoleh Dari pengkajian awal kebidanan dan kandungan
        $('[name="informasi_pasien"]').on('change', function() {
            if ($(this).attr('id') === 'informasi-lain' && $(this).is(':checked')) {
                $('#informasi-sebutkan').prop('disabled', false);
            } else {
                $('#informasi-sebutkan').prop('disabled', true);
            }
        })

        // KELUHAN UTAMA pengkajian awal kebidanan dan kandungan
        $('#keluhan-utama-keb-10').click(function() {
            if ($(this).is(":checked")) {
                $('#keluhan-utama-keb-11').prop('disabled', false);
            } else {
                $('#keluhan-utama-keb-11').val('');
                $('#keluhan-utama-keb-11').prop('disabled', true);
            }
        });

        // RIWAYAT KEHAMILAN SEKARANG pengkajian awal kebidanan dan kandungan

        $('#hamil-muda-4').click(function() {
        if ($(this).is(":checked")) {
            $('#hamil-lain-lain').prop('disabled', false);
        } else {
            $('#hamil-lain-lain').val('');
            $('#hamil-lain-lain').prop('disabled', true);
        }
        });
        $('#hamil-tua-4').click(function() {
            if ($(this).is(":checked")) {
                $('#hamil-lain-5').prop('disabled', false);
            } else {
                $('#hamil-lain-5').val('');
                $('#hamil-lain-5').prop('disabled', true);
            }
        });



        // RIWAYAT KESEHATAN pengkajian awal kebidanan dan kandungan
        $('#riwayat-penyakit-oprasi-9').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-penyakit-oprasi-10').prop('disabled', false);
            } else {
                $('#riwayat-penyakit-oprasi-10').val('');
                $('#riwayat-penyakit-oprasi-10').prop('disabled', true);
            }
        });
        $('[name="riwayat_penyakit_oprasi_11"]').on('change', function() {
            if ($(this).attr('id') === 'riwayat-penyakit-oprasi-12' && $(this).is(':checked')) {
                $('#riwayat-penyakit-oprasi-13').prop('disabled', false);
            } else {
                $('#riwayat-penyakit-oprasi-13').prop('disabled', true);
            }
            if ($(this).attr('id') === 'riwayat-penyakit-oprasi-12' && $(this).is(':checked')) {
                $('#riwayat-penyakit-oprasi-14').prop('disabled', false);
            } else {
                $('#riwayat-penyakit-oprasi-14').prop('disabled', true);
            }
        })
        $('[name="riwayat_penyakit_oprasi"]').on('change', function() {
            if ($(this).attr('id') === 'riwayat-penyakit-oprasi-16' && $(this).is(':checked')) {
                $('#riwayat-penyakit-oprasi-17').prop('disabled', false);
            } else {
                $('#riwayat-penyakit-oprasi-17').prop('disabled', true);
            }
            if ($(this).attr('id') === 'riwayat-penyakit-oprasi-16' && $(this).is(':checked')) {
                $('#riwayat-penyakit-oprasi-18').prop('disabled', false);
            } else {
                $('#riwayat-penyakit-oprasi-18').prop('disabled', true);
            }
        })
        $('#terapi-komplementari-5').click(function() {
            if ($(this).is(":checked")) {
                $('#terapi-komplementari-6').prop('disabled', false);
            } else {
                $('#terapi-komplementari-6').val('');
                $('#terapi-komplementari-6').prop('disabled', true);
            }
        });
        $('#riwayat-penyakit-kluwarga-14').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-penyakit-kluwarga-15').prop('disabled', false);
            } else {
                $('#riwayat-penyakit-kluwarga-15').val('');
                $('#riwayat-penyakit-kluwarga-15').prop('disabled', true);
            }
        });
        $('#riwayat-kel-berencana-5').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-kel-berencana-6').prop('disabled', false);
            } else {
                $('#riwayat-kel-berencana-6').val('');
                $('#riwayat-kel-berencana-6').prop('disabled', true);
            }
        });
        $('#riwayat-ginekologi-11').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-ginekologi-12').prop('disabled', false);
            } else {
                $('#riwayat-ginekologi-12').val('');
                $('#riwayat-ginekologi-12').prop('disabled', true);
            }
        });
        $('#riwayat-alergi-3').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-alergi-4').prop('disabled', false);
            } else {
                $('#riwayat-alergi-4').val('');
                $('#riwayat-alergi-4').prop('disabled', true);
            }
            if ($(this).is(":checked")) {
                $('#riwayat-alergi-5').prop('disabled', false);
            } else {
                $('#riwayat-alergi-5').val('');
                $('#riwayat-alergi-5').prop('disabled', true);
            }
            if ($(this).is(":checked")) {
                $('#riwayat-alergi-6').prop('disabled', false);
            } else {
                $('#riwayat-alergi-6').val('');
                $('#riwayat-alergi-6').prop('disabled', true);
            }
            if ($(this).is(":checked")) {
                $('#riwayat-alergi-7').prop('disabled', false);
            } else {
                $('#riwayat-alergi-7').val('');
                $('#riwayat-alergi-7').prop('disabled', true);
            }
            if ($(this).is(":checked")) {
                $('#riwayat-alergi-8').prop('disabled', false);
            } else {
                $('#riwayat-alergi-8').val('');
                $('#riwayat-alergi-8').prop('disabled', true);
            }
        });
        $('[name="riwayat_tranfusi_darah_3"]').on('change', function() {
            if ($(this).attr('id') === 'riwayat-tranfusi-darah-4' && $(this).is(':checked')) {
                $('#riwayat-tranfusi-darah-5').prop('disabled', false);
            } else {
                $('#riwayat-tranfusi-darah-5').prop('disabled', true);
            }
        })
        $('#kebiasaan-1').click(function() {
            if ($(this).is(":checked")) {
                $('#kebiasaan-2').prop('disabled', false);
            } else {
                $('#kebiasaan-2').val('');
                $('#kebiasaan-2').prop('disabled', true);
            }
        });
        $('#kebiasaan-4').click(function() {
            if ($(this).is(":checked")) {
                $('#kebiasaan-5').prop('disabled', false);
            } else {
                $('#kebiasaan-5').val('');
                $('#kebiasaan-5').prop('disabled', true);
            }
        });
        $('#status-mental-2').click(function() {
            if ($(this).is(":checked")) {
                $('#status-mental-3').prop('disabled', false);
            } else {
                $('#status-mental-3').val('');
                $('#status-mental-3').prop('disabled', true);
            }
        });
        $('#status-mental-4').click(function() {
            if ($(this).is(":checked")) {
                $('#status-mental-5').prop('disabled', false);
            } else {
                $('#status-mental-5').val('');
                $('#status-mental-5').prop('disabled', true);
            }
        });
        $('#kebutuhan-sosial-6').click(function() {
            if ($(this).is(":checked")) {
                $('#kebutuhan-sosial-7').prop('disabled', false);
            } else {
                $('#kebutuhan-sosial-7').val('');
                $('#kebutuhan-sosial-7').prop('disabled', true);
            }
        });

        $('#kebutuhan-sosial-13').click(function() {
            if ($(this).is(":checked")) {
                $('#kebutuhan-sosial-14').prop('disabled', false);
            } else {
                $('#kebutuhan-sosial-14').val('');
                $('#kebutuhan-sosial-14').prop('disabled', true);
            }
        });
        $('#status-ekonomi-8').click(function() {
            if ($(this).is(":checked")) {
                $('#status-ekonomi-9').prop('disabled', false);
            } else {
                $('#status-ekonomi-9').val('');
                $('#status-ekonomi-9').prop('disabled', true);
            }
        });
        $('[name="status_nn_kepercayaan_1"]').on('change', function() {
            if ($(this).attr('id') === 'status-nn-kepercayaan-2' && $(this).is(':checked')) {
                $('#status-nn-kepercayaan-3').prop('disabled', false);
            } else {
                $('#status-nn-kepercayaan-3').prop('disabled', true);
            }
        })
        $('[name="status_nn_kepercayaan_4"]').on('change', function() {
            if ($(this).attr('id') === 'status-nn-kepercayaan-5' && $(this).is(':checked')) {
                $('#status-nn-kepercayaan-6').prop('disabled', false);
            } else {
                $('#status-nn-kepercayaan-6').prop('disabled', true);
            }
        })
        $('#spiritual-3').click(function() {
            if ($(this).is(":checked")) {
                $('#spiritual-4').prop('disabled', false);
            } else {
                $('#spiritual-4').val('');
                $('#spiritual-4').prop('disabled', true);
            }
        });
        $('#budaya-10').click(function() {
            if ($(this).is(":checked")) {
                $('#budaya-11').prop('disabled', false);
            } else {
                $('#budaya-11').val('');
                $('#budaya-11').prop('disabled', true);
            }
        });
        $('[name="budaya_14"]').on('change', function() {
            if ($(this).attr('id') === 'budaya-15' && $(this).is(':checked')) {
                $('#budaya-16').prop('disabled', false);
            } else {
                $('#budaya-16').prop('disabled', true);
            }
        })
        $('[name="budaya_17"]').on('change', function() {
            if ($(this).attr('id') === 'budaya-18' && $(this).is(':checked')) {
                $('#budaya-19').prop('disabled', false);
            } else {
                $('#budaya-19').prop('disabled', true);
            }
        })
        $('[name="budaya_20"]').on('change', function() {
            if ($(this).attr('id') === 'budaya-21' && $(this).is(':checked')) {
                $('#budaya-22').prop('disabled', false);
            } else {
                $('#budaya-22').prop('disabled', true);
            }
        })

        // IDENTIFIKASI KEBUTUHAN BELAJAR / EDUKASI pengkajian awal kebidanan dan kandungan
        $('[name="bicara_pasien"]').on('change', function() {
            if ($(this).attr('id') === 'bicara-pasien-gangguan' && $(this).is(':checked')) {
                $('#bicara-input-pasien').prop('disabled', false);
            } else {
                $('#bicara-input-pasien').prop('disabled', true);
            }
        })
        $('[name="perlu_penterjemah"]').on('change', function() {
            if ($(this).attr('id') === 'perlu-penterjemah-pasien-ya' && $(this).is(':checked')) {
                $('#perlu-penterjemah-pasien-input').prop('disabled', false);
            } else {
                $('#perlu-penterjemah-pasien-input').prop('disabled', true);
            }
        })

        // PEMERIKSAAN KEBIDANAN DAN KANDUNGAN pengkajian awal kebidanan dan kandungan
        $('#infeksi-abdomen-9').click(function() {
            if ($(this).is(":checked")) {
                $('#infeksi-abdomen-10').prop('disabled', false);
            } else {
                $('#infeksi-abdomen-10').val('');
                $('#infeksi-abdomen-10').prop('disabled', true);
            }
        });
        $('#palpasi-4').click(function() {
            if ($(this).is(":checked")) {
                $('#palpasi-5').prop('disabled', false);
            } else {
                $('#palpasi-5').val('');
                $('#palpasi-5').prop('disabled', true);
            }
        });
        $('#palpasi-8').click(function() {
            if ($(this).is(":checked")) {
                $('#palpasi-9').prop('disabled', false);
            } else {
                $('#palpasi-9').val('');
                $('#palpasi-9').prop('disabled', true);
            }
        });
        $('#palpasi-12').click(function() {
            if ($(this).is(":checked")) {
                $('#palpasi-13').prop('disabled', false);
            } else {
                $('#palpasi-13').val('');
                $('#palpasi-13').prop('disabled', true);
            }
        });
        $('#pemeriksaan-dalam-3').click(function() {
            if ($(this).is(":checked")) {
                $('#pemeriksaan-dalam-4').prop('disabled', false);
            } else {
                $('#pemeriksaan-dalam-4').val('');
                $('#pemeriksaan-dalam-4').prop('disabled', true);
            }
        });
        $('#pemeriksaan-dalam-7').click(function() {
            if ($(this).is(":checked")) {
                $('#pemeriksaan-dalam-8').prop('disabled', false);
            } else {
                $('#pemeriksaan-dalam-8').val('');
                $('#pemeriksaan-dalam-8').prop('disabled', true);
            }
        });
        $('#pemeriksaan-dalam-11').click(function() {
            if ($(this).is(":checked")) {
                $('#pemeriksaan-dalam-12').prop('disabled', false);
            } else {
                $('#pemeriksaan-dalam-12').val('');
                $('#pemeriksaan-dalam-12').prop('disabled', true);
            }
        });

        // SKALA EARLY WARNING NEWS AWAL 1
        $('.skalanews').change(function() {
            hitungSkalaEarlyNews()
        })

        $('.skalameows').change(function() {
            hitungSkalaEarlyMeows()
        })

        // PEMERIKSAAN FISIK DAN TANDA TANDA VITAL pengkajian awal kebidanan dan kandungan
        $('[name="sistem_kardiovaskuler_5"]').on('change', function() {
            if ($(this).attr('id') === 'sistem-kardiovaskuler-6' && $(this).is(':checked')) {
                $('#sistem-kardiovaskuler-7').prop('disabled', false);
            } else {
                $('#sistem-kardiovaskuler-7').prop('disabled', true);
            }
        })
        $('#sistem-kardiovaskuler-15').click(function() {
            if ($(this).is(":checked")) {
                $('#sistem-kardiovaskuler-16').prop('disabled', false);
            } else {
                $('#sistem-kardiovaskuler-16').val('');
                $('#sistem-kardiovaskuler-16').prop('disabled', true);
            }
        });


        // POPULASI KHUSUS (ISI SESUAI KEBUTUHAN PASIEN)

        $('#pk-penyakit-menular-6').click(function() {
            if ($(this).is(":checked")) {
                $('#pk-penyakit-menular-7').prop('disabled', false);
            } else {
                $('#pk-penyakit-menular-7').val('');
                $('#pk-penyakit-menular-7').prop('disabled', true);
            }
        });

        $('[name="pk_penyakit_menular_8"]').on('change', function() {
            if ($(this).attr('id') === 'pk-penyakit-menular-8' && $(this).is(':checked')) {
                $('#pk-penyakit-menular-9').prop('disabled', false);
            } else {
                $('#pk-penyakit-menular-9').prop('disabled', true);
            }
        })

        $('[name="pk_penyakit_menular_11"]').on('change', function() {
            if ($(this).attr('id') === 'pk-penyakit-menular-12' && $(this).is(':checked')) {
                $('#pk-penyakit-menular-13').prop('disabled', false);
            } else {
                $('#pk-penyakit-menular-13').prop('disabled', true);
            }
        })

        $('[name="pk_penyakit_menular_18"]').on('change', function() {
            if ($(this).attr('id') === 'pk-penyakit-menular-19' && $(this).is(':checked')) {
                $('#pk-penyakit-menular-20').prop('disabled', false);
            } else {
                $('#pk-penyakit-menular-20').prop('disabled', true);
            }
        })



        $('#pk-pdtt-lain-kebidanan').click(function() {
            if ($(this).is(":checked")) {
                $('#pk-pdtt-lain-kebidanan-input').prop('disabled', false);
            } else {
                $('#pk-pdtt-lain-kebidanan-input').val('');
                $('#pk-pdtt-lain-kebidanan-input').prop('disabled', true);
            }
        });


        $('[name="pk_penyakit_pdtt_3_kebidanan"]').on('change', function() {
            if ($(this).attr('id') === 'pk-penyakit-pdtt-3-kebidanan-ya' && $(this).is(':checked')) {
                $('#pk-penyakit-pdtt-3-kebidanan-input').prop('disabled', false);
            } else {
                $('#pk-penyakit-pdtt-3-kebidanan-input').prop('disabled', true);
            }
        })

        $('[name="pk_penyakit_pdtt_4_kebidanan"]').on('change', function() {
            if ($(this).attr('id') === 'pk-penyakit-pdtt-4-kebidanan-ya' && $(this).is(':checked')) {
                $('#pk-penyakit-pdtt-4-kebidanan-input').prop('disabled', false);
            } else {
                $('#pk-penyakit-pdtt-4-kebidanan-input').prop('disabled', true);
            }
        })

        
        $('[name="pk_penyakit_pdtt_5_kebidanan"]').on('change', function() {
            if ($(this).attr('id') === 'pk-penyakit-pdtt-5-kebidanan-ya' && $(this).is(':checked')) {
                $('#pk-penyakit-pdtt-5-kebidanan-input').prop('disabled', false);
            } else {
                $('#pk-penyakit-pdtt-5-kebidanan-input').prop('disabled', true);
            }
        })

       
        

        $('[name="pk_pasien_kekerasan_1_kebidanan"]').on('change', function() {
            if ($(this).attr('id') === 'pk-pasien-kekerasan-1-kebidanan-ya' && $(this).is(':checked')) {
                $('#pk-pasien-kekerasan-2-kebidanan').prop('disabled', false);
            } else {
                $('#pk-pasien-kekerasan-2-kebidanan').prop('disabled', true);
            }

            if ($(this).attr('id') === 'pk-pasien-kekerasan-1-kebidanan-ya' && $(this).is(':checked')) {
                $('#pk-pasien-kekerasan-3-kebidanan').prop('disabled', false);
            } else {
                $('#pk-pasien-kekerasan-3-kebidanan').prop('disabled', true);
            }

            if ($(this).attr('id') === 'pk-pasien-kekerasan-1-kebidanan-ya' && $(this).is(':checked')) {
                $('#pk-pasien-kekerasan-4-kebidanan').prop('disabled', false);
            } else {
                $('#pk-pasien-kekerasan-4-kebidanan').prop('disabled', true);
            }

            if ($(this).attr('id') === 'pk-pasien-kekerasan-1-kebidanan-ya' && $(this).is(':checked')) {
                $('#pk-pasien-kekerasan-5-kebidanan').prop('disabled', false);
            } else {
                $('#pk-pasien-kekerasan-5-kebidanan').prop('disabled', true);
            }
        })



        $('[name="pk_pasien_ketergantungan_obat_kebidanan"]').on('change', function() {
            if ($(this).attr('id') === 'pk-pasien-ketergantungan-obat-kebidanan-ya' && $(this).is(
                    ':checked')) {
                $('#pk-pasien-ketergantungan-obat-input-kebidanan').prop('disabled', false);
            } else {
                $('#pk-pasien-ketergantungan-obat-input-kebidanan').prop('disabled', true);
            }
            if ($(this).attr('id') === 'pk-pasien-ketergantungan-obat-kebidanan-ya' && $(this).is(
                    ':checked')) {
                $('#pk-pasien-lama-ketergantungan-obat-input-kebidanan').prop('disabled', false);
            } else {
                $('#pk-pasien-lama-ketergantungan-obat-input-kebidanan').prop('disabled', true);
            }
        })


        // PENILAIAN TINGKAT NYERI DAN RESIKO JATUH DEWASA pengkajian awal kebidanan dan kandungan
        $('#nyeri-hilang-kebidanan-5').click(function() {
            if ($(this).is(":checked")) {
                $('#nyeri-hilang-kebidanan-6').prop('disabled', false);
            } else {
                $('#nyeri-hilang-kebidanan-6').val('');
                $('#nyeri-hilang-kebidanan-6').prop('disabled', true);
            }
        });

        // ASSESMEN KEBIDANAN pengkajian awal kebidanan dan kandungan
        $('#masalah-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#masalah-lainl').prop('disabled', false);
            } else {
                $('#masalah-lainl').val('');
                $('#masalah-lainl').prop('disabled', true);
            }
        });

        // RENCANA ASUHAN KEBIDANAN pengkajian awal kebidanan dan kandungan
        $('#rencana-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#rencana-lainl').prop('disabled', false);
            } else {
                $('#rencana-lainl').val('');
                $('#rencana-lainl').prop('disabled', true);
            }
        });

        // PERENCANAAN PULANG / DISCHARGE PLANNING pengkajian awal kebidanan dan kandungan
        $('#kriteria-discharge-kebidanan-9').click(function() {
            if ($(this).is(":checked")) {
                $('#kriteria-discharge-kebidanan-10').prop('disabled', false);
            } else {
                $('#kriteria-discharge-kebidanan-10').val('');
                $('#kriteria-discharge-kebidanan-10').prop('disabled', true);
            }
        });

        // radio skrining nutrisi on
        $('.sn_penurunan_bb_area').hide();
        $('input[name="sn_penurunan_bb"]').change(function() {
            if ($(this).val() == '3') {
                $('.sn_penurunan_bb_area').show();
            } else {
                $('input[name="sn_penurunan_bb_on"]').prop('checked', false);
                $('.sn_penurunan_bb_area').hide();
            }
        });

        // RIWAYAT PENYAKIT KLUWARGA 
        // $('input[name="rpk_medis_kebidanan"]').change(function() {
        //     if ($(this).val() == '1') {
        //         $('#rpk-medis-kebidanan-asma, #rpk-medis-kebidanan-dm, #rpk-medis-kebidanan-cardiovascular, #rpk-medis-kebidanan-kanker, #rpk-medis-kebidanan-thalasemia, #rpk-medis-kebidanan-lain')
        //             .prop('disabled', false);
        //     } else {
        //         $('#rpk-medis-kebidanan-asma, #rpk-medis-kebidanan-dm, #rpk-medis-kebidanan-cardiovascular, #rpk-medis-kebidanan-kanker, #rpk-medis-kebidanan-thalasemia, #rpk-medis-kebidanan-lain')
        //             .prop('disabled', true);
        //         $('#rpk-medis-kebidanan-lain-input').val('');
        //     }
        // });

        $('input[name="rpk_medis_kebidanan"]').change(function() {
            if ($(this).val() == '1') {
                $('#rpk-medis-kebidanan-asma, #rpk-medis-kebidanan-dm, #rpk-medis-kebidanan-cardiovascular, #rpk-medis-kebidanan-kanker, #rpk-medis-kebidanan-thalasemia, #rpk-medis-kebidanan-lain')
                    .prop('disabled', false);
            } else {
                $('#rpk-medis-kebidanan-asma, #rpk-medis-kebidanan-dm, #rpk-medis-kebidanan-cardiovascular, #rpk-medis-kebidanan-kanker, #rpk-medis-kebidanan-thalasemia, #rpk-medis-kebidanan-lain')
                    .prop('disabled', true);
                $('#rpk-medis-kebidanan-lain-input').val('');
            }
        });



        // PENGKAJIAN MEDIS 
        $('#riwayat_field_bidan, #hasil_laboratorium_bidan, #hasil_radiologi_bidan, #hasil_penunjang_lain_bidan, #diagnosa_awal_medis_bidan').summernote({
            height: 200,
            focus: true,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            callbacks: {
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                    e.preventDefault();

                    // Firefox fix
                    setTimeout(function() {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        });

        $('input[name="rpk_medis_bidan_1"]').change(function() {
            if ($(this).val() == '1') {
                $('#rpk-medis-bidan-3, #rpk-medis-bidan-4, #rpk-medis-bidan-5, #rpk-medis-bidan-6, #rpk-medis-bidan-7, #rpk-medis-bidan-8').prop('disabled', false);
            } else {
                $('#rpk-medis-bidan-3, #rpk-medis-bidan-4, #rpk-medis-bidan-5, #rpk-medis-bidan-6, #rpk-medis-bidan-7, #rpk-medis-bidan-8').prop('disabled', true);
                $('#rpk-medis-bidan-9').val('');
            }
        });
    })
    // <<<====PENGKAJIAN AKHIR KEBIDANAN DAN KANDUNGAN ====>>>AKHIRRR


    function resetFormPengkajianAwalKebidanan() {
        $('#form_pengkajian_awal_kebidanan')[0].reset();
        $('#id-kajian-kebidanan, #id-kajian-medis-kebidanan').val('');
        $('#agama-islam-pasien, #agama-kristen-pasien, #agama-hindu-pasien, #agama-katholik-pasien, #agama-buddha-pasien, #agama-lain-input-pasien').prop('disabled', true);
        $('#cara-masuk-irj-pasien, #cara-masuk-igd-pasien, #cara-masuk-lain-pasien').prop('disabled', true);

        $('.disabled').attr('disabled', true);

        // signature
        $('#tanggal-jam-bidan').val('<?= date('d/m/Y H:i') ?>');
        $('#ttd-bidan').show();
        $('#ttd-dokter').show();
        $('#ttd_kebidanan_verified').hide();
        $('#ttd_dokter_verified').hide();           

        // signature
        // $('#waktu-kajian-medis-bidan').val('<!?= date('d/m/Y H:i') ?>');
        $('#ceklis-dpjp').show();
        $('#ceklis-dokter').show();
        $('#ceklis_dpjp_verified').hide();
        $('#ceklis_dokter_verified').hide();

        $('#waktu-kajian-kebidanan, #keluhan-utama-keb-3, #tanggal-pemeriksaan-lab-kebidanan, #tanggal-pemeriksaan-rad-kebidanan, #tanggal-jam-bidan, #tanggal-jam-dokter-keb, #waktu-kajian-medis-bidan,#tgl-medis-dpjp, #tgl-medis-dokter, #rk-bidan-5').attr('disabled', false);

        // DOKTER & BIDAN 
        $('#id-bidan, #id-dokter, #ttd-medis-dpjp, #ttd-medis-dokter').select2c('readonly',false);
    
        $('#s2id_id-bidan a .select2c-chosen').html('Pilih Bidan');
        $('#s2id_id-dokter a .select2c-chosen').html('Pilih Verifikator Dokter DPJP');

        $('#s2id_ttd-medis-dpjp a .select2c-chosen').html('Pilih Dokter DPJP');
        $('#s2id_ttd-medis-dokter a .select2c-chosen').html('Pilih Dokter Pengkajian');

        $('#riwayat_field_bidan').summernote('code', '');
        $('#hasil_laboratorium_bidan').summernote('code', '');
        $('#hasil_radiologi_bidan').summernote('code', '');
        $('#hasil_penunjang_lain_bidan').summernote('code', '');
        $('#diagnosa_awal_medis_bidan').summernote('code', '');
    }

    function lihatFORM_KEP_43_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriPengkajianAwalKebidananDanKandungan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_43_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriPengkajianAwalKebidananDanKandungan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_43_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriPengkajianAwalKebidananDanKandungan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriPengkajianAwalKebidananDanKandungan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#modal_pengkajian_kebidanan').modal('show');
        $('#desclaimer-history-kebidanan').html('');
        $('#bwizard_pengkajian_kebidanan').bwizard('show', '0');

        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("rawat_inap/api/rawat_inap/get_data_pengkajian_awal_kebidanan") ?>/id/' +
                id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {

                resetFormPengkajianAwalKebidanan();
                $('#id-layanan-pendaftaran-kebidanan').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-kebidanan').val(data.pasien.id_pasien);
                    $('#nama-pasien-kebidanan').text(data.pasien.nama);
                    $('#norm-pasien').text(data.pasien.no_rm);
                    $('#ttl-pasien').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jk-pasien').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

                

                    // if (data.pasien.agama == 'Islam') {
                    //     $('#agama-islam-pasien').prop('checked', true).attr('disabled', false);
                    //         } else if (data.pasien.agama == 'Kristen') {
                    //     $('#agama-kristen-pasien').prop('checked', true).attr('disabled', false);
                    //         } else if (data.pasien.agama == 'Hindu') {
                    //     $('#agama-hindu-pasien').prop('checked', true).attr('disabled', false);
                    //         } else if (data.pasien.agama == 'Katholik') {
                    //     $('#agama-katholik-pasien').prop('checked', true).attr('disabled', false);
                    //         } else if (data.pasien.agama == 'Buddha') {
                    //     $('#agama-buddha-pasien').prop('checked', true).attr('disabled', false);
                    //         } else if (data.pasien.agama == 'Konghucu') {
                    //     $('#agama-lain-pasien').prop('checked', true).attr('disabled', false);
                    //     $('#agama-lain-input-pasien').val(data.pasien.agama).attr('disabled', false);
                    //         } else if (data.pasien.agama == 'Lain-lain') {
                    //     $('#agama-lain-pasien').prop('checked', true).attr('disabled', false);
                    //     syams_validation('#agama-lain-input-pasien', 'Masukkan agama lain').attr('disabled',
                    //         false);
                    // }


                    if (data.pasien.agama == 'Islam') {
                        // Kalau agama pasien Islam, centang radio button Islam dan aktifkan (tidak disabled)
                        $('#agama-islam-pasien').prop('checked', true).attr('disabled', false);

                    } else if (data.pasien.agama == 'Kristen') {
                        // Kalau agama pasien Kristen, centang radio button Kristen dan aktifkan
                        $('#agama-kristen-pasien').prop('checked', true).attr('disabled', false);

                    } else if (data.pasien.agama == 'Hindu') {
                        // Kalau agama pasien Hindu, centang radio button Hindu dan aktifkan
                        $('#agama-hindu-pasien').prop('checked', true).attr('disabled', false);

                    } else if (data.pasien.agama == 'Katholik') {
                        // Kalau agama pasien Katholik, centang radio button Katholik dan aktifkan
                        $('#agama-katholik-pasien').prop('checked', true).attr('disabled', false);

                    } else if (data.pasien.agama == 'Buddha') {
                        // Kalau agama pasien Buddha, centang radio button Buddha dan aktifkan
                        $('#agama-buddha-pasien').prop('checked', true).attr('disabled', false);

                    } else if (data.pasien.agama == 'Konghucu') {
                        // Kalau agama pasien Konghucu, centang radio button "Lain-lain" dan aktifkan
                        $('#agama-lain-pasien').prop('checked', true).attr('disabled', false);
                        
                        // Input untuk agama lain diisi otomatis dengan nilai dari pasien dan bisa diedit
                        $('#agama-lain-input-pasien').val(data.pasien.agama).attr('disabled', false);

                    } else if (data.pasien.agama == 'Lain-lain') {
                        // Kalau agama pasien "Lain-lain", centang radio button "Lain-lain" dan aktifkan
                        $('#agama-lain-pasien').prop('checked', true).attr('disabled', false);

                        // Pastikan elemen input untuk agama lain ada sebelum mengaksesnya
                        let inputLain = $('#agama-lain-input-pasien');
                        if (inputLain.length) {
                            // Kosongkan input dan buat jadi disabled biar tidak bisa diisi
                            inputLain.val('').attr('disabled', true);

                            // Tambahkan validasi dengan pesan bahwa agama belum dipilih, harus hubungi rekam medis
                            syams_validation('#agama-lain-input-pasien', 'Agama Belum Dipilih, Silahkan Hubungi *Rekam Medis*');
                        } else {
                            // Kalau input untuk agama lain tidak ditemukan di DOM, munculkan error di console
                            console.error("Elemen #agama-lain-input-pasien tidak ditemukan!");
                        }
                    }


                    if (data.pasien.alergi !== null) {
                        $('#riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                }

                $('#pendidikan_pasien_kebidanan').val(data.pasien.pendidikan);

                if (data.layanan !== null) {
                    $('#waktu-masuk-kebidanan').val((data.layanan.waktu_konfirmasi_ranap !== null ?datetimefmysql(data.layanan.waktu_konfirmasi_ranap) : '<?= date('d/m/Y H:i:s') ?>'));
                    if (data.layanan.before !== null) {
                        if (data.layanan.before.jenis_layanan == 'Poliklinik') {
                            $('#cara-masuk-irj-pasien').prop('checked', true).attr('disabled', false)
                        }
                        if (data.layanan.before.jenis_layanan == 'IGD') {
                            $('#cara-masuk-igd-pasien').prop('checked', true).attr('disabled', false)
                        }
                        if (data.layanan.before.jenis_layanan == 'Hemodialisa') {
                            $('#cara-masuk-lain-pasien').prop('checked', true).attr('disabled', false)
                        }
                        if (data.layanan.before.jenis_layanan == 'Hemodialisa') {
                            $('#cara-masuk-lain-lain-pasien').val(data.layanan.before.jenis_layanan)
                        }
                    }
                }

                // TIBA DI RUANGAN DENGAN CARA pengkajian awal kebidanan dan kandungan AWALLL============>
                if (data.kajian_kebidanan !== null) {
                    $('#id-kajian-kebidanan').val(data.kajian_kebidanan.id);
                    $('#desclaimer_history_kebidanan').html('');
                    $('#btn_history_logs_kebidanan').hide();
                    if (data !== null) {
                        if (data.update_date !== null) {
                            $('#desclaimer_history_kebidanan').html('*) Ada Perubahan Data');
                            $('#btn_history_logs_kebidanan').show();
                            $('#btn_history_logs_kebidanan').attr('onclick', 'showHistoryLogsKebidanan(' +
                                id_layanan_pendaftaran + ')');
                        }
                    }

                    if (data.kajian_medis_kebidanan !== null) {
                        showKajianMedisKebidanan(data.kajian_medis_kebidanan);
                    }

                    $('#waktu-kajian-kebidanan').val((data.kajian_kebidanan.waktu_kajian_kebidanan !== null ?datetimefmysql(data.kajian_kebidanan.waktu_kajian_kebidanan) : '<?= date('d/m/Y H:i:s') ?>'));

                    // Tiba Diruangan Rawat dengan Cara
                    const cara_tiba = JSON.parse(data.kajian_kebidanan.cara_tiba); 
                    if (cara_tiba.cara_tiba_diruangan_pasien === 'Jalan') {$('#cara-tiba-diruangan-pasien-jalan').prop('checked', true).change() }
                    if (cara_tiba.cara_tiba_diruangan_pasien === 'Brankar') {$('#cara-tiba-diruangan-pasien-brankar').prop('checked', true).change () }
                    if (cara_tiba.cara_tiba_diruangan_pasien === 'KursiRoda') {$('#cara-tiba-diruangan-kursi-roda').prop('checked', true).change () }

                    
                    //  Rujukan  pengkajian >
                    const rujukan = JSON.parse(data.kajian_kebidanan.rujukan); 
                    if (rujukan.rujukan_pasien_1 !== null) { $('#rujukan-pasien-rs').prop('checked', true) }
                    if (rujukan.rujukan_pasien_2 !== null) {$('#rujukan-pasien-rss').val(rujukan.rujukan_pasien_2);}

                    if (rujukan.rujukan_pasien_3 !== null) { $('#rujukan-pasien-puskesmas').prop('checked', true) }
                    if (rujukan.rujukan_pasien_4 !== null) {$('#rujukan-pasien-puskesmass').val(rujukan.rujukan_pasien_4);}

                    if (rujukan.rujukan_pasien_5 !== null) { $('#rujukan-pasien-bidan').prop('checked', true) }
                    if (rujukan.rujukan_pasien_6 !== null) {$('#rujukan-pasien-bidann').val(rujukan.rujukan_pasien_6);}

                    if (rujukan.rujukan_pasien_7 !== null) { $('#rujukan-pasien-tidak').prop('checked', true) }
                    if (rujukan.rujukan_pasien_8 !== null) { $('#rujukan-pasien-lain').prop('checked', true) }

                    if (rujukan.rujukan_pasienl !== null) {$('#rujukan-pasien-lainl').val(rujukan.rujukan_pasienl);}





                    // Informasi 
                    const informasi = JSON.parse(data.kajian_kebidanan.informasi); 
                    if (informasi.informasi_pasien=== 'Pasien') {$('#informasi-pasien').prop('checked', true).change() }
                    if (informasi.informasi_pasien=== 'Keluarga') {$('#informasi-kluwarga').prop('checked', true).change () }
                    if (informasi.informasi_pasien=== 'lain-lain') {$('#informasi-lain').prop('checked', true).change () }
                    if (informasi.informasi_pasienn !== null) {$('#informasi-sebutkan').val(informasi.informasi_pasienn);}
                

                    // KELUHAN UTAMA di peroleh dari pengkajian awal kebidanan dan kandungan AAWAL==========>
                    const keluhan_utama_keb = JSON.parse(data.kajian_kebidanan.keluhan_utama_keb); 
                    if (keluhan_utama_keb.keluhan_utama_keb_1 !== null) { $('#keluhan-utama-keb-1').prop('checked', true) }
                    if (keluhan_utama_keb.keluhan_utama_keb_2 !== null) {$('#keluhan-utama-keb-2').val(keluhan_utama_keb.keluhan_utama_keb_2);}
                    if (keluhan_utama_keb.keluhan_utama_keb_3 !== null) {$('#keluhan-utama-keb-3').val(keluhan_utama_keb.keluhan_utama_keb_3);}
                    if (keluhan_utama_keb.keluhan_utama_keb_4 !== null) { $('#keluhan-utama-keb-4').prop('checked', true) }
                    if (keluhan_utama_keb.keluhan_utama_keb_5 !== null) {$('#keluhan-utama-keb-5').val(keluhan_utama_keb.keluhan_utama_keb_5);}
                    if (keluhan_utama_keb.keluhan_utama_keb_6 !== null) {$('#keluhan-utama-keb-6').val(keluhan_utama_keb.keluhan_utama_keb_6);}
                    if (keluhan_utama_keb.keluhan_utama_keb_7 !== null) { $('#keluhan-utama-keb-7').prop('checked', true) }
                    if (keluhan_utama_keb.keluhan_utama_keb_8 !== null) {$('#keluhan-utama-keb-8').val(keluhan_utama_keb.keluhan_utama_keb_8);}
                    if (keluhan_utama_keb.keluhan_utama_keb_9 !== null) { $('#keluhan-utama-keb-9').prop('checked', true) }
                    if (keluhan_utama_keb.keluhan_utama_keb_10 !== null) { $('#keluhan-utama-keb-10').prop('checked', true) }
                    if (keluhan_utama_keb.keluhan_utama_keb_11 !== null) {$('#keluhan-utama-keb-11').val(keluhan_utama_keb.keluhan_utama_keb_11);}
                    // KELUHAN UTAMA di peroleh dari pengkajian awal kebidanan dan kandungan AKHIR =====>>>>>>>

                    // $('#keluhan-utama-keb-3').val(data.kajian_kebidanan.keluhan_utama_keb_3)



                    // RIWAYAT KEHAMILAN SEKARANG pengkajian awal kebidanan dan kandungan AWAL===================>       
                    const rks_hamil_muda = JSON.parse(data.kajian_kebidanan.rks_hamil_muda);                   
                    if (rks_hamil_muda.hamil_muda_1 !== null) {$('#hamil-muda-1').prop('checked', true)}
                    if (rks_hamil_muda.hamil_muda_2 !== null) {$('#hamil-muda-2').prop('checked', true)}
                    if (rks_hamil_muda.hamil_muda_3 !== null) {$('#hamil-muda-3').prop('checked', true)}
                    if (rks_hamil_muda.hamil_muda_4 !== null) {$('#hamil-muda-4').prop('checked', true)}
                    if (rks_hamil_muda.hamil_lain_lain !== null) {$('#hamil-lain-lain').val(rks_hamil_muda.hamil_lain_lain);}

                   

                    const rks_hamil_tua = JSON.parse(data.kajian_kebidanan.rks_hamil_tua);
                    if (rks_hamil_tua.hamil_tua_1 !== null) {$('#hamil-tua-1').prop('checked', true)}
                    if (rks_hamil_tua.hamil_tua_2 !== null) {$('#hamil-tua-2').prop('checked', true)}
                    if (rks_hamil_tua.hamil_tua_3 !== null) {$('#hamil-tua-3').prop('checked', true)}
                    if (rks_hamil_tua.hamil_tua_4 !== null) {$('#hamil-tua-4').prop('checked', true)}
                    if (rks_hamil_tua.hamil_lain_5 !== null) {$('#hamil-lain-5').val(rks_hamil_tua.hamil_lain_5);}

                    const rks_anc = JSON.parse(data.kajian_kebidanan.rks_anc);
                    if (rks_anc.anc_1 !== null) {$('#anc-1').val(rks_anc.anc_1);}
                    if (rks_anc.anc_2 !== null) {$('#anc-2').val(rks_anc.anc_2);}
                    if (rks_anc.anc_3 !== null) {$('#anc-3').prop('checked', true)}
                    if (rks_anc.anc_4 !== null) {$('#anc-4').prop('checked', true)}
                    if (rks_anc.anc_5 !== null) {$('#anc-5').prop('checked', true)}

                    $('#g-riwayat').val(data.kajian_kebidanan.rks_g)
                    $('#p-riwayat').val(data.kajian_kebidanan.rks_p)
                    $('#a-riwayat').val(data.kajian_kebidanan.rks_a)
                    $('#usia-kehamilan').val(data.kajian_kebidanan.rks_usia_kehamilan)
                    $('#hari-pertama-haid').val(data.kajian_kebidanan.rks_hpht)
                    $('#taksiran-persalinan').val(data.kajian_kebidanan.rks_tp)

                 
                
                    // RIWAYAT KEHAMILAN SEKARANG pengkajian awal kebidanan dan kandungan AKHIR============>

                    // RIWAYAT KESEHATAN pengkajian awal kebidanan dan kandungan AKHIR============>
                    const rk_riwayat_menstruasi = JSON.parse(data.kajian_kebidanan.rk_riwayat_menstruasi);
                    if (rk_riwayat_menstruasi.riwayat_menstruasi_1 !== null) {
                        $('#riwayat-menstruasi-1').prop('checked', true)
                    }
                    if (rk_riwayat_menstruasi.riwayat_menstruasi_2 !== null) {
                        $('#riwayat-menstruasi-2').val(rk_riwayat_menstruasi.riwayat_menstruasi_2);
                    }
                    if (rk_riwayat_menstruasi.riwayat_menstruasi_3 !== null) {
                        $('#riwayat-menstruasi-3').val(rk_riwayat_menstruasi.riwayat_menstruasi_3);
                    }
                    if (rk_riwayat_menstruasi.riwayat_menstruasi_4 !== null) {
                        $('#riwayat-menstruasi-4').val(rk_riwayat_menstruasi.riwayat_menstruasi_4);
                    }
                    if (rk_riwayat_menstruasi.riwayat_menstruasi_5 !== null) {
                        $('#riwayat-menstruasi-5').prop('checked', true)
                    }
                    if (rk_riwayat_menstruasi.riwayat_menstruasi_6 !== null) {
                        $('#riwayat-menstruasi-6').prop('checked', true)
                    }
                    if (rk_riwayat_menstruasi.riwayat_menstruasi_7 !== null) {
                        $('#riwayat-menstruasi-7').prop('checked', true)
                    }
                    if (rk_riwayat_menstruasi.riwayat_menstruasi_8 !== null) {
                        $('#riwayat-menstruasi-8').prop('checked', true)
                    }
                    if (rk_riwayat_menstruasi.riwayat_menstruasi_9 !== null) {
                        $('#riwayat-menstruasi-9').prop('checked', true)
                    }
                    // RIWAYAT MENSTRUASI AKHIR

                    // RIWAYAT PERKAWINAN AKHIR
                    const rk_riwayat_perkawinan = JSON.parse(data.kajian_kebidanan.rk_riwayat_perkawinan);
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_1 !== null) {
                        $('#riwayat-perkawinan-1').val(rk_riwayat_perkawinan.riwayat_perkawinan_1);
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_2 !== null) {
                        $('#riwayat-perkawinan-2').prop('checked', true)
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_3 !== null) {
                        $('#riwayat-perkawinan-3').val(rk_riwayat_perkawinan.riwayat_perkawinan_3);
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_4 !== null) {
                        $('#riwayat-perkawinan-4').prop('checked', true)
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_5 !== null) {
                        $('#riwayat-perkawinan-5').prop('checked', true)
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_6 !== null) {
                        $('#riwayat-perkawinan-6').prop('checked', true)
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_7 !== null) {
                        $('#riwayat-perkawinan-7').prop('checked', true)
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_8 !== null) {
                        $('#riwayat-perkawinan-8').val(rk_riwayat_perkawinan.riwayat_perkawinan_8);
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_9 !== null) {
                        $('#riwayat-perkawinan-9').prop('checked', true)
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_10 !== null) {
                        $('#riwayat-perkawinan-10').prop('checked', true)
                    }
                    if (rk_riwayat_perkawinan.riwayat_perkawinan_11 !== null) {
                        $('#riwayat-perkawinan-11').prop('checked', true)
                    }
                    // RIWAYAT PERKAWINAN AWAL

                    // RIWAYAT PENYAKIT OPERASI AWAL
                    const rk_riwayat_penyakit_operasi = JSON.parse(data.kajian_kebidanan
                        .rk_riwayat_penyakit_operasi);
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_1 !== null) {
                        $('#riwayat-penyakit-oprasi-1').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_2 !== null) {
                        $('#riwayat-penyakit-oprasi-2').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_3 !== null) {
                        $('#riwayat-penyakit-oprasi-3').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_4 !== null) {
                        $('#riwayat-penyakit-oprasi-4').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_5 !== null) {
                        $('#riwayat-penyakit-oprasi-5').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_6 !== null) {
                        $('#riwayat-penyakit-oprasi-6').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_7 !== null) {
                        $('#riwayat-penyakit-oprasi-7').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_8 !== null) {
                        $('#riwayat-penyakit-oprasi-8').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_9 !== null) {
                        $('#riwayat-penyakit-oprasi-9').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_10 !== null) {
                        $('#riwayat-penyakit-oprasi-10').val(rk_riwayat_penyakit_operasi
                            .riwayat_penyakit_oprasi_10);
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_11 !== null) {
                        $('#riwayat-penyakit-oprasi-11').prop('checked', true).change()
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_11 !== null) {
                        $('#riwayat-penyakit-oprasi-12').prop('checked', true).change()
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_13 !== null) {
                        $('#riwayat-penyakit-oprasi-13').val(rk_riwayat_penyakit_operasi
                            .riwayat_penyakit_oprasi_13);
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_14 !== null) {
                        $('#riwayat-penyakit-oprasi-14').val(rk_riwayat_penyakit_operasi
                            .riwayat_penyakit_oprasi_14);
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi !== null) {
                        $('#riwayat-penyakit-oprasi-15').prop('checked', true).change()
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi !== null) {
                        $('#riwayat-penyakit-oprasi-16').prop('checked', true).change()
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_17 !== null) {
                        $('#riwayat-penyakit-oprasi-17').val(rk_riwayat_penyakit_operasi
                            .riwayat_penyakit_oprasi_17);
                    }
                    if (rk_riwayat_penyakit_operasi.riwayat_penyakit_oprasi_18 !== null) {
                        $('#riwayat-penyakit-oprasi-18').val(rk_riwayat_penyakit_operasi
                            .riwayat_penyakit_oprasi_18);
                    }
                    // RIWAYAT PENYAKIT OPERASI AKHIR


                    $('#rk-obat-dikosumsi').val(data.kajian_kebidanan.rk_obat_dikosumsi);

                    // MEMBAWA OBAT DARI LUAR AWAL
                    const rk_membawa_obat_dari_luar = JSON.parse(data.kajian_kebidanan
                        .rk_membawa_obat_dari_luar);
                    if (rk_membawa_obat_dari_luar.membawa_obat_1 === '0') {
                        $('#membawa-obat-1').prop('checked', true).change()
                    }
                    if (rk_membawa_obat_dari_luar.membawa_obat_1 === '1') {
                        $('#membawa-obat-2').prop('checked', true).change()
                    }
                    // MEMBAWA OBAT DARI LUAR AKHIR

                    // TERAPI KOMPLEMENTARI AWAL
                    const rk_terapi_komplementari = JSON.parse(data.kajian_kebidanan
                        .rk_terapi_komplementari);
                    if (rk_terapi_komplementari.terapi_komplementari_1 !== null) {
                        $('#terapi-komplementari-1').prop('checked', true)
                    }
                    if (rk_terapi_komplementari.terapi_komplementari_2 !== null) {
                        $('#terapi-komplementari-2').val(rk_terapi_komplementari
                            .terapi_komplementari_2);
                    }
                    if (rk_terapi_komplementari.terapi_komplementari_3 !== null) {
                        $('#terapi-komplementari-3').prop('checked', true)
                    }
                    if (rk_terapi_komplementari.terapi_komplementari_4 !== null) {
                        $('#terapi-komplementari-4').prop('checked', true)
                    }
                    if (rk_terapi_komplementari.terapi_komplementari_5 !== null) {
                        $('#terapi-komplementari-5').prop('checked', true)
                    }
                    if (rk_terapi_komplementari.terapi_komplementari_6 !== null) {
                        $('#terapi-komplementari-6').val(rk_terapi_komplementari
                            .terapi_komplementari_6);
                    }
                    // TERAPI KOMPLEMENTARI AKHIR

                    // RIWAYAT PENYAKIT KLUWARGA AWAL
                    const rk_riwayat_penyakit_kluwarga = JSON.parse(data.kajian_kebidanan
                        .rk_riwayat_penyakit_kluwarga);
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_1 !== null) {
                        $('#riwayat-penyakit-kluwarga-1').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_2 !== null) {
                        $('#riwayat-penyakit-kluwarga-2').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_3 !== null) {
                        $('#riwayat-penyakit-kluwarga-3').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_4 !== null) {
                        $('#riwayat-penyakit-kluwarga-4').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_5 !== null) {
                        $('#riwayat-penyakit-kluwarga-5').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_6 !== null) {
                        $('#riwayat-penyakit-kluwarga-6').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_7 !== null) {
                        $('#riwayat-penyakit-kluwarga-7').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_8 !== null) {
                        $('#riwayat-penyakit-kluwarga-8').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_9 !== null) {
                        $('#riwayat-penyakit-kluwarga-9').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_10 !== null) {
                        $('#riwayat-penyakit-kluwarga-10').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_11 !== null) {
                        $('#riwayat-penyakit-kluwarga-11').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_12 !== null) {
                        $('#riwayat-penyakit-kluwarga-12').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_13 !== null) {
                        $('#riwayat-penyakit-kluwarga-13').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_14 !== null) {
                        $('#riwayat-penyakit-kluwarga-14').prop('checked', true)
                    }
                    if (rk_riwayat_penyakit_kluwarga.riwayat_penyakit_kluwarga_15 !== null) {
                        $('#riwayat-penyakit-kluwarga-15').val(rk_riwayat_penyakit_kluwarga
                            .riwayat_penyakit_kluwarga_15);
                    }
                    // RIWAYAT PENYAKIT KLUWARGA AKHIR

                    // RIWAYAT KLUWARGA BERENCANA AWAL
                    const rk_riwayat_kluwarga_berencana = JSON.parse(data.kajian_kebidanan
                        .rk_riwayat_kluwarga_berencana);
                    if (rk_riwayat_kluwarga_berencana.riwayat_kel_berencana_1 !== null) {
                        $('#riwayat-kel-berencana-1').prop('checked', true)
                    }
                    if (rk_riwayat_kluwarga_berencana.riwayat_kel_berencana_2 !== null) {
                        $('#riwayat-kel-berencana-2').prop('checked', true)
                    }
                    if (rk_riwayat_kluwarga_berencana.riwayat_kel_berencana_3 !== null) {
                        $('#riwayat-kel-berencana-3').prop('checked', true)
                    }
                    if (rk_riwayat_kluwarga_berencana.riwayat_kel_berencana_4 !== null) {
                        $('#riwayat-kel-berencana-4').prop('checked', true)
                    }
                    if (rk_riwayat_kluwarga_berencana.riwayat_kel_berencana_5 !== null) {
                        $('#riwayat-kel-berencana-5').prop('checked', true)
                    }
                    if (rk_riwayat_kluwarga_berencana.riwayat_kel_berencana_6 !== null) {
                        $('#riwayat-kel-berencana-6').val(rk_riwayat_kluwarga_berencana
                            .riwayat_kel_berencana_6);
                    }
                    if (rk_riwayat_kluwarga_berencana.riwayat_kel_berencana_7 !== null) {
                        $('#riwayat-kel-berencana-7').val(rk_riwayat_kluwarga_berencana
                            .riwayat_kel_berencana_7);
                    }
                    if (rk_riwayat_kluwarga_berencana.riwayat_kel_berencana_8 !== null) {
                        $('#riwayat-kel-berencana-8').prop('checked', true)
                    }
                    if (rk_riwayat_kluwarga_berencana.riwayat_kel_berencana_9 !== null) {
                        $('#riwayat-kel-berencana-9').prop('checked', true)
                    }
                    // RIWAYAT KLUWARGA BERENCANAA AKHIR

                    // RIWAYAT GINEKOLOGI AWAL
                    const rk_riwayat_ginekologi = JSON.parse(data.kajian_kebidanan
                        .rk_riwayat_ginekologi);
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_1 !== null) {
                        $('#riwayat-ginekologi-1').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_2 !== null) {
                        $('#riwayat-ginekologi-2').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_3 !== null) {
                        $('#riwayat-ginekologi-3').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_4 !== null) {
                        $('#riwayat-ginekologi-4').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_5 !== null) {
                        $('#riwayat-ginekologi-5').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_6 !== null) {
                        $('#riwayat-ginekologi-6').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_7 !== null) {
                        $('#riwayat-ginekologi-7').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_8 !== null) {
                        $('#riwayat-ginekologi-8').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_9 !== null) {
                        $('#riwayat-ginekologi-9').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_10 !== null) {
                        $('#riwayat-ginekologi-10').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_11 !== null) {
                        $('#riwayat-ginekologi-11').prop('checked', true)
                    }
                    if (rk_riwayat_ginekologi.riwayat_ginekologi_12 !== null) {
                        $('#riwayat-ginekologi-12').val(rk_riwayat_ginekologi
                            .riwayat_ginekologi_12);
                    }

                    // RIWAYAT GINEKOLOGI AKHIR

                    // RIWAYAT ALERGI AKHIR
                    const rk_riwayat_alergi = JSON.parse(data.kajian_kebidanan
                        .rk_riwayat_alergi);
                    if (rk_riwayat_alergi.riwayat_alergi_1 === '1') {
                        $('#riwayat-alergi-1').prop('checked', true).change()
                    }
                    if (rk_riwayat_alergi.riwayat_alergi_1 === '0') {
                        $('#riwayat-alergi-2').prop('checked', true).change()
                    }
                    if (rk_riwayat_alergi.riwayat_alergi_3 !== null) {
                        $('#riwayat-alergi-3').prop('checked', true)
                    }
                    if (rk_riwayat_alergi.riwayat_alergi_4 !== null) {
                        $('#riwayat-alergi-4').val(rk_riwayat_alergi
                            .riwayat_alergi_4);
                    }
                    if (rk_riwayat_alergi.riwayat_alergi_5 !== null) {
                        $('#riwayat-alergi-5').val(rk_riwayat_alergi
                            .riwayat_alergi_5);
                    }
                    if (rk_riwayat_alergi.riwayat_alergi_6 !== null) {
                        $('#riwayat-alergi-6').val(rk_riwayat_alergi
                            .riwayat_alergi_6);
                    }
                    if (rk_riwayat_alergi.riwayat_alergi_7 !== null) {
                        $('#riwayat-alergi-7').val(rk_riwayat_alergi
                            .riwayat_alergi_7);
                    }
                    if (rk_riwayat_alergi.riwayat_alergi_8 !== null) {
                        $('#riwayat-alergi-8').val(rk_riwayat_alergi
                            .riwayat_alergi_8);
                    }
                    // RIWAYAT ALERGI AKHIR

                    // RIWAYAT TRANFUSI DARAH AWALL
                    const rk_riwayat_tranfusi_darah = JSON.parse(data.kajian_kebidanan
                        .rk_riwayat_tranfusi_darah);
                    if (rk_riwayat_tranfusi_darah.riwayat_tranfusi_darah_1 !== null) {
                        $('#riwayat-tranfusi-darah-1').prop('checked', true)
                    }
                    if (rk_riwayat_tranfusi_darah.riwayat_tranfusi_darah_2 !== null) {
                        $('#riwayat-tranfusi-darah-2').prop('checked', true)
                    }
                    if (rk_riwayat_tranfusi_darah.riwayat_tranfusi_darah_3 !== null) {
                        $('#riwayat-tranfusi-darah-3').prop('checked', true).change()
                    }
                    if (rk_riwayat_tranfusi_darah.riwayat_tranfusi_darah_3 !== null) {
                        $('#riwayat-tranfusi-darah-4').prop('checked', true).change()
                    }
                    if (rk_riwayat_tranfusi_darah.riwayat_tranfusi_darah_5 !== null) {
                        $('#riwayat-tranfusi-darah-5').val(rk_riwayat_tranfusi_darah
                            .riwayat_tranfusi_darah_5);
                    }
                    // RIWAYAT TRANFUSI DARAH AKHIR

                    // KEBIASAN AKHIR
                    const rk_kebiasaan = JSON.parse(data.kajian_kebidanan
                        .rk_kebiasaan);
                    if (rk_kebiasaan.kebiasaan_1 !== null) {
                        $('#kebiasaan-1').prop('checked', true)
                    }
                    if (rk_kebiasaan.kebiasaan_2 !== null) {
                        $('#kebiasaan-2').val(rk_kebiasaan
                            .kebiasaan_2);
                    }
                    if (rk_kebiasaan.kebiasaan_3 !== null) {
                        $('#kebiasaan-3').prop('checked', true)
                    }
                    if (rk_kebiasaan.kebiasaan_4 !== null) {
                        $('#kebiasaan-4').prop('checked', true)
                    }
                    if (rk_kebiasaan.kebiasaan_5 !== null) {
                        $('#kebiasaan-5').val(rk_kebiasaan
                            .kebiasaan_5);
                    }
                    if (rk_kebiasaan.kebiasaan_6 !== null) {
                        $('#kebiasaan-6').prop('checked', true)
                    }
                    // KEBIASAN AKHIR

                    // PSIKOLOGIS AWAL
                    const rk_status_psikologi = JSON.parse(data.kajian_kebidanan
                        .rk_status_psikologi);
                    if (rk_status_psikologi.status_psikologis_1 !== null) {
                        $('#status-psikologis-1').prop('checked', true)
                    }
                    if (rk_status_psikologi.status_psikologis_2 !== null) {
                        $('#status-psikologis-2').prop('checked', true)
                    }
                    if (rk_status_psikologi.status_psikologis_3 !== null) {
                        $('#status-psikologis-3').prop('checked', true)
                    }
                    if (rk_status_psikologi.status_psikologis_4 !== null) {
                        $('#status-psikologis-4').prop('checked', true)
                    }
                    if (rk_status_psikologi.status_psikologis_5 !== null) {
                        $('#status-psikologis-5').prop('checked', true)
                    }
                    if (rk_status_psikologi.status_psikologis_6 !== null) {
                        $('#status-psikologis-6').prop('checked', true)
                    }
                    if (rk_status_psikologi.status_psikologis_7 !== null) {
                        $('#status-psikologis-7').prop('checked', true)
                    }
                    if (rk_status_psikologi.status_psikologis_8 !== null) {
                        $('#status-psikologis-8').prop('checked', true)
                    }
                    if (rk_status_psikologi.status_psikologis_9 !== null) {
                        $('#status-psikologis-9').prop('checked', true)
                    }
                    if (rk_status_psikologi.status_psikologis_10 !== null) {
                        $('#status-psikologis-10').val(rk_status_psikologi
                            .status_psikologis_10);
                    }
                    // PSIKOLOGIS AKHIR

                    // STATUS MENTAL AWAL
                    const rk_status_mental = JSON.parse(data.kajian_kebidanan
                        .rk_status_mental);
                    if (rk_status_mental.status_mental_1 !== null) {
                        $('#status-mental-1').prop('checked', true)
                    }
                    if (rk_status_mental.status_mental_2 !== null) {
                        $('#status-mental-2').prop('checked', true)
                    }
                    if (rk_status_mental.status_mental_3 !== null) {
                        $('#status-mental-3').val(rk_status_mental
                            .status_mental_3);
                    }
                    if (rk_status_mental.status_mental_4 !== null) {
                        $('#status-mental-4').prop('checked', true)
                    }
                    if (rk_status_mental.status_mental_5 !== null) {
                        $('#status-mental-5').val(rk_status_mental
                            .status_mental_5);
                    }
                    // STATUS MENTAL AKHIR

                    // KEBUTUHAN BIOLOGIS  AWAL
                    const rk_kebutuhan_biologis = JSON.parse(data.kajian_kebidanan
                        .rk_kebutuhan_biologis);
                    if (rk_kebutuhan_biologis.kebutuhan_biologis_1 !== null) {
                        $('#kebutuhan-biologis-1').val(rk_kebutuhan_biologis
                            .kebutuhan_biologis_1);
                    }
                    if (rk_kebutuhan_biologis.kebutuhan_biologis_2 !== null) {
                        $('#kebutuhan-biologis-2').val(rk_kebutuhan_biologis
                            .kebutuhan_biologis_2);
                    }
                    if (rk_kebutuhan_biologis.kebutuhan_biologis_3 !== null) {
                        $('#kebutuhan-biologis-3').val(rk_kebutuhan_biologis
                            .kebutuhan_biologis_3);
                    }
                    if (rk_kebutuhan_biologis.kebutuhan_biologis_4 !== null) {
                        $('#kebutuhan-biologis-4').val(rk_kebutuhan_biologis
                            .kebutuhan_biologis_4);
                    }
                    if (rk_kebutuhan_biologis.kebutuhan_biologis_5 !== null) {
                        $('#kebutuhan-biologis-5').val(rk_kebutuhan_biologis
                            .kebutuhan_biologis_5);
                    }
                    if (rk_kebutuhan_biologis.kebutuhan_biologis_6 !== null) {
                        $('#kebutuhan-biologis-6').val(rk_kebutuhan_biologis
                            .kebutuhan_biologis_6);
                    }
                    if (rk_kebutuhan_biologis.kebutuhan_biologis_7 !== null) {
                        $('#kebutuhan-biologis-7').val(rk_kebutuhan_biologis
                            .kebutuhan_biologis_7);
                    }
                    if (rk_kebutuhan_biologis.kebutuhan_biologis_8 !== null) {
                        $('#kebutuhan-biologis-8').val(rk_kebutuhan_biologis
                            .kebutuhan_biologis_8);
                    }
                    if (rk_kebutuhan_biologis.kebutuhan_biologis_9 !== null) {
                        $('#kebutuhan-biologis-9').val(rk_kebutuhan_biologis
                            .kebutuhan_biologis_9);
                    }
                    // KEBUTUHAN BIOLOGIS  AKHIR

                    // KEBUTUHAN SOSIAL  AWAL
                    const rk_kebutuhan_sosial = JSON.parse(data.kajian_kebidanan
                        .rk_kebutuhan_sosial);
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_1 !== null) {
                        $('#kebutuhan-sosial-1').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_2 !== null) {
                        $('#kebutuhan-sosial-2').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_3 !== null) {
                        $('#kebutuhan-sosial-3').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_4 !== null) {
                        $('#kebutuhan-sosial-4').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_5 !== null) {
                        $('#kebutuhan-sosial-5').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_6 !== null) {
                        $('#kebutuhan-sosial-6').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_7 !== null) {
                        $('#kebutuhan-sosial-7').val(rk_kebutuhan_sosial
                            .kebutuhan_sosial_7);
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_8 === '1') {
                        $('#kebutuhan-sosial-8').prop('checked', true).change()
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_8 === '0') {
                        $('#kebutuhan-sosial-9').prop('checked', true).change()
                    }

                    if (rk_kebutuhan_sosial.kebutuhan_sosial_10 !== null) {
                        $('#kebutuhan-sosial-10').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_11 !== null) {
                        $('#kebutuhan-sosial-11').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_12 !== null) {
                        $('#kebutuhan-sosial-12').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_13 !== null) {
                        $('#kebutuhan-sosial-13').prop('checked', true)
                    }
                    if (rk_kebutuhan_sosial.kebutuhan_sosial_14 !== null) {
                        $('#kebutuhan-sosial-14').val(rk_kebutuhan_sosial
                            .kebutuhan_sosial_14);
                    }
                    // KEBUTUHAN SOSIAL  AKHIR

                    //STATUS EKONOMI  AWAL
                    const rk_status_ekonomi = JSON.parse(data.kajian_kebidanan
                        .rk_status_ekonomi);
                    if (rk_status_ekonomi.status_ekonomi_1 !== null) {
                        $('#status-ekonomi-1').prop('checked', true)
                    }
                    if (rk_status_ekonomi.status_ekonomi_2 !== null) {
                        $('#status-ekonomi-2').prop('checked', true)
                    }
                    if (rk_status_ekonomi.status_ekonomi_3 !== null) {
                        $('#status-ekonomi-3').prop('checked', true)
                    }
                    if (rk_status_ekonomi.status_ekonomi_4 !== null) {
                        $('#status-ekonomi-4').prop('checked', true)
                    }
                    if (rk_status_ekonomi.status_ekonomi_5 !== null) {
                        $('#status-ekonomi-5').prop('checked', true)
                    }
                    if (rk_status_ekonomi.status_ekonomi_6 !== null) {
                        $('#status-ekonomi-6').prop('checked', true)
                    }
                    if (rk_status_ekonomi.status_ekonomi_7 !== null) {
                        $('#status-ekonomi-7').prop('checked', true)
                    }
                    if (rk_status_ekonomi.status_ekonomi_8 !== null) {
                        $('#status-ekonomi-8').prop('checked', true)
                    }
                    if (rk_status_ekonomi.status_ekonomi_9 !== null) {
                        $('#status-ekonomi-9').val(rk_status_ekonomi
                            .status_ekonomi_9);
                    }
                    //STATUS EKONOMI  AKHIR

                    //STATUS NILAI-NILAI KEPERCAYAAN  AAWAL
                    const rk_status_nilai_kepercayaan = JSON.parse(data.kajian_kebidanan
                        .rk_status_nilai_kepercayaan);
                    if (rk_status_nilai_kepercayaan.status_nn_kepercayaan_1 !== null) {
                        $('#status-nn-kepercayaan-1').prop('checked', true).change()
                    }
                    if (rk_status_nilai_kepercayaan.status_nn_kepercayaan_1 !== null) {
                        $('#status-nn-kepercayaan-2').prop('checked', true).change()
                    }
                    if (rk_status_nilai_kepercayaan.status_nn_kepercayaan_3 !== null) {
                        $('#status-nn-kepercayaan-3').val(rk_status_nilai_kepercayaan
                            .status_nn_kepercayaan_3);
                    }
                    if (rk_status_nilai_kepercayaan.status_nn_kepercayaan_4 !== null) {
                        $('#status-nn-kepercayaan-4').prop('checked', true).change()
                    }
                    if (rk_status_nilai_kepercayaan.status_nn_kepercayaan_4 !== null) {
                        $('#status-nn-kepercayaan-5').prop('checked', true).change()
                    }
                    if (rk_status_nilai_kepercayaan.status_nn_kepercayaan_6 !== null) {
                        $('#status-nn-kepercayaan-6').val(rk_status_nilai_kepercayaan
                            .status_nn_kepercayaan_6);
                    }
                    if (rk_status_nilai_kepercayaan.status_nn_kepercayaan_7 !== null) {
                        $('#status-nn-kepercayaan-7').val(rk_status_nilai_kepercayaan
                            .status_nn_kepercayaan_7);
                    }
                    //STATUS NILAI-NILAI KEPERCAYAAN  AKHIR

                    //SPIRITUAL  AWAL
                    const rk_spiritual = JSON.parse(data.kajian_kebidanan
                        .rk_spiritual);
                    if (rk_spiritual.spiritual_1 !== null) {
                        $('#spiritual-1').prop('checked', true).change()
                    }
                    if (rk_spiritual.spiritual_2 !== null) {
                        $('#spiritual-2').prop('checked', true).change()
                    }
                    if (rk_spiritual.spiritual_3 !== null) {
                        $('#spiritual-3').prop('checked', true).change()
                    }
                    if (rk_spiritual.spiritual_4 !== null) {
                        $('#spiritual-4').val(rk_spiritual
                            .spiritual_4);
                    }
                    if (rk_spiritual.spiritual_5 !== null) {
                        $('#spiritual-5').prop('checked', true).change()
                    }
                    if (rk_spiritual.spiritual_6 !== null) {
                        $('#spiritual-6').prop('checked', true).change()
                    }
                    if (rk_spiritual.spiritual_7 !== null) {
                        $('#spiritual-7').prop('checked', true).change()
                    }
                    if (rk_spiritual.spiritual_8 !== null) {
                        $('#spiritual-8').prop('checked', true).change()
                    }
                    if (rk_spiritual.spiritual_9 !== null) {
                        $('#spiritual-9').prop('checked', true).change()
                    }
                    //SPIRITUAL  AKHIR

                    //BUDAYA  AKHIR
                    const rk_budaya = JSON.parse(data.kajian_kebidanan
                        .rk_budaya);
                    if (rk_budaya.budaya_1 !== null) {
                        $('#budaya-1').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_2 !== null) {
                        $('#budaya-2').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_3 !== null) {
                        $('#budaya-3').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_4 !== null) {
                        $('#budaya-4').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_5 !== null) {
                        $('#budaya-5').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_6 !== null) {
                        $('#budaya-6').val(rk_budaya
                            .budaya_6);
                    }
                    if (rk_budaya.budaya_7 !== null) {
                        $('#budaya-7').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_8 !== null) {
                        $('#budaya-8').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_9 !== null) {
                        $('#budaya-9').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_10 !== null) {
                        $('#budaya-10').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_11 !== null) {
                        $('#budaya-11').val(rk_budaya
                            .budaya_11);
                    }
                    if (rk_budaya.budaya_12 === '1') {
                        $('#budaya-12').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_12 === '0') {
                        $('#budaya-13').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_14 === '1') {
                        $('#budaya-14').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_14 === '1') {
                        $('#budaya-15').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_16 !== null) {
                        $('#budaya-16').val(rk_budaya
                            .budaya_16);
                    }
                    if (rk_budaya.budaya_17 === '0') {
                        $('#budaya-17').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_17 === '1') {
                        $('#budaya-18').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_19 !== null) {
                        $('#budaya-19').val(rk_budaya
                            .budaya_19);
                    }
                    if (rk_budaya.budaya_20 === '0') {
                        $('#budaya-20').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_20 === '1') {
                        $('#budaya-21').prop('checked', true).change()
                    }
                    if (rk_budaya.budaya_22 !== null) {
                        $('#budaya-22').val(rk_budaya
                            .budaya_22);
                    }
                    //BUDAYA  AKHIR
                    // RIWAYAT KESEHATAN pengkajian awal kebidanan dan kandungan AKHIR============>

                    // IDENTIFIKASI KEBUTUHAN BELAJAR/EDUKASI pengkajian awal kebidanan dan kandungan AWAL============>

                    if (data.kajian_kebidanan.ikbe_kewarganegaraan == '1') {$('#kewarganegaraan-pasien-wni').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_kewarganegaraan == '0') {$('#kewarganegaraan-pasien-wna').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_pemahaman_penyakit == '0') {$('#pt-penyakit-perawatan-pasien-tidak').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_pemahaman_penyakit == '1') {$('#pt-penyakit-perawatan-pasien-ya').prop('checked', true).change()}

                    $('#suku-bangsa-pasien').val(data.kajian_kebidanan.ikbe_suku_bangsa)

                    if (data.kajian_kebidanan.ikbe_pemahaman_pengobatan == '0') {$('#pt-pengobatan-pasien-tidak').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_pemahaman_pengobatan == '1') {$('#pt-pengobatan-pasien-ya').prop('checked', true).change()}

                    if (data.kajian_kebidanan.ikbe_bicara == '0') {$('#bicara-pasien-normal').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_bicara == '1') {$('#bicara-pasien-gangguan').prop('checked', true).change()}

                    $('#bicara-input-pasien').val(data.kajian_kebidanan.ikbe_jelaskan)

                    if (data.kajian_kebidanan.ikbe_pemahaman_nutrisi == '0') {$('#pt-nutrisi-diet-pasien-tidak').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_pemahaman_nutrisi == '1') {$('#pt-nutrisi-diet-pasien-ya').prop('checked', true).change()}

                    if (data.kajian_kebidanan.ikbe_perlu_peterjemah == '0') {$('#perlu-penterjemah-pasien-idak').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_perlu_peterjemah == '1') {$('#perlu-penterjemah-pasien-ya').prop('checked', true).change()}

                    $('#perlu-penterjemah-pasien-input').val(data.kajian_kebidanan.ikbe_bahasa)

                    if (data.kajian_kebidanan.ikbe_pemahaman_spiritual == '0') {$('#pt-spiritual-pasien-tidak').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_pemahaman_spiritual == '1') {$('#pt-spiritual-pasien-ya').prop('checked', true).change()}

                    if (data.kajian_kebidanan.ikbe_bahasa_isyarat == '0') {$('#bahasa-isyarat-pasien-tidak').prop('checked', true).change() }
                    if (data.kajian_kebidanan.ikbe_bahasa_isyarat == '1') {$('#bahasa-isyarat-pasien-ya').prop('checked', true).change() }

                    if (data.kajian_kebidanan.ikbe_pemahaman_peralatan == '0') {$('#pt-peralatan-medis-pasien-tidak').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_pemahaman_peralatan == '1') {$('#pt-peralatan-medis-pasien-ya').prop('checked', true).change()}

                    if (data.kajian_kebidanan.ikbe_pemahaman_rahab == '0') {$('#pt-rehab-medik-pasien-tidak').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_pemahaman_rahab == '1') {$('#pt-rehab-medik-pasien-ya').prop('checked', true).change()}

                    if (data.kajian_kebidanan.ikbe_pemahaman_manajemen == '0') {$('#pt_manajemen-nyeri-pasien-tidak').prop('checked', true).change()}
                    if (data.kajian_kebidanan.ikbe_pemahaman_manajemen == '1') {$('#pt-manajemen-nyeri-pasien-ya').prop('checked', true).change()}


                    // HAMBATAN UNTUK MENERIMA EDUKASI AWAL>
                    const hambatan_keb = JSON.parse(data.kajian_kebidanan.hambatan_keb); 
                    if (hambatan_keb.hambatan_keb_1 !== null) { $('#hambatan-keb-1').prop('checked', true) }
                    if (hambatan_keb.hambatan_keb_2 !== null) { $('#hambatan-keb-2').prop('checked', true) }
                    if (hambatan_keb.hambatan_keb_3 !== null) { $('#hambatan-keb-3').prop('checked', true) }
                    if (hambatan_keb.hambatan_keb_4 !== null) { $('#hambatan-keb-4').prop('checked', true) }
                    if (hambatan_keb.hambatan_keb_5 !== null) { $('#hambatan-keb-5').prop('checked', true) }
                    if (hambatan_keb.hambatan_keb_6 !== null) { $('#hambatan-keb-6').prop('checked', true) }
                    if (hambatan_keb.hambatan_keb_7 !== null) { $('#hambatan-keb-7').prop('checked', true) }
                    if (hambatan_keb.hambatan_keb_8 !== null) { $('#hambatan-keb-8').prop('checked', true) }
                    if (hambatan_keb.hambatan_keb_9 !== null) { $('#hambatan-keb-9').prop('checked', true) }
                    if (hambatan_keb.hambatan_keb_10 !== null) { $('#hambatan-keb-10').prop('checked', true) }
                

                    if (data.kajian_kebidanan.hume_tidak_ada !== null) {
                        $('#hambatan-tidak-ada').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.hume_gangguan_pengelihatan !== null) {
                        $('#hambatan-gangguan-pengelihatan').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.hume_keterbatasan_pendengaran !== null) {
                        $('#hambatan-gangguan-pendengaran').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.hume_buta_huruf !== null) {
                        $('#hambatan-buta-huruf').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.hume_gangguan_emosi !== null) {
                        $('#hambatan-gangguan-emosi').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.hume_gangguan_fisik !== null) {
                        $('#hambatan-gangguan-fisik').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.hume_gangguan_kognitif !== null) {
                        $('#hambatan-gangguan-kognitif').prop('checked', true)
                    }

                    if (data.kajian_kebidanan.hume_keterbatasan_motivasi !== null) {
                        $('#hambatan-keterbatasan-motifasi').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.hume_keterbatasan_dalam !== null) {
                        $('#hambatan-budaya').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.hume_keterbatasan_berbahasa !== null) {
                        $('#hambatan-berbahasa').prop('checked', true)
                    }
                    // HAMBATAN UNTUK MENERIMA EDUKASI AKHIR>

                    //PEMERIKSAAN KEBIDANAN DAN KANDUNGAN pengkajian awal kebidanan dan kandungan AKHIR============>
                    // INPEKSI ADDOMEN AWAL
                    const pkdk_inpeksi_abdomen = JSON.parse(data.kajian_kebidanan
                        .pkdk_inpeksi_abdomen);
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_1 !== null) {
                        $('#infeksi-abdomen-1').prop('checked', true).change()
                    }
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_2 !== null) {
                        $('#infeksi-abdomen-2').prop('checked', true).change()
                    }
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_3 !== null) {
                        $('#infeksi-abdomen-3').prop('checked', true).change()
                    }
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_4 !== null) {
                        $('#infeksi-abdomen-4').prop('checked', true).change()
                    }
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_5 !== null) {
                        $('#infeksi-abdomen-5').prop('checked', true).change()
                    }
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_6 !== null) {
                        $('#infeksi-abdomen-6').prop('checked', true).change()
                    }
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_7 !== null) {
                        $('#infeksi-abdomen-7').prop('checked', true).change()
                    }
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_8 !== null) {
                        $('#infeksi-abdomen-8').prop('checked', true).change()
                    }
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_9 !== null) {
                        $('#infeksi-abdomen-9').prop('checked', true).change()
                    }
                    if (pkdk_inpeksi_abdomen.infeksi_abdomen_10 !== null) {
                        $('#infeksi-abdomen-10').val(pkdk_inpeksi_abdomen
                            .infeksi_abdomen_10);
                    }
                    // INPEKSI ADDOMEN AKHIR

                    // PALPASI AWAL
                    const pkdk_palpasi = JSON.parse(data.kajian_kebidanan
                        .pkdk_palpasi);
                    if (pkdk_palpasi.palpasi_1 !== null) {
                        $('#palpasi-1').val(pkdk_palpasi
                            .palpasi_1);
                    }
                    if (pkdk_palpasi.palpasi_2 !== null) {
                        $('#palpasi-2').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_3 !== null) {
                        $('#palpasi-3').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_4 !== null) {
                        $('#palpasi-4').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_5 !== null) {
                        $('#palpasi-5').val(pkdk_palpasi
                            .palpasi_5);
                    }
                    if (pkdk_palpasi.palpasi_6 !== null) {
                        $('#palpasi-6').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_7 !== null) {
                        $('#palpasi-7').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_8 !== null) {
                        $('#palpasi-8').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_9 !== null) {
                        $('#palpasi-9').val(pkdk_palpasi
                            .palpasi_9);
                    }
                    if (pkdk_palpasi.palpasi_10 !== null) {
                        $('#palpasi-10').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_11 !== null) {
                        $('#palpasi-11').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_12 !== null) {
                        $('#palpasi-12').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_13 !== null) {
                        $('#palpasi-13').val(pkdk_palpasi
                            .palpasi_13);
                    }
                    if (pkdk_palpasi.palpasi_14 !== null) {
                        $('#palpasi-14').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_15 !== null) {
                        $('#palpasi-15').prop('checked', true).change()
                    }
                    if (pkdk_palpasi.palpasi_16 !== null) {
                        $('#palpasi-16').val(pkdk_palpasi
                            .palpasi_16);
                    }
                    if (pkdk_palpasi.palpasi_17 !== null) {
                        $('#palpasi-17').val(pkdk_palpasi
                            .palpasi_17);
                    }
                    // PALPASI AKHIR

                    // AUSKULTASI AWAL
                    const pkdk_auskultasi = JSON.parse(data.kajian_kebidanan
                        .pkdk_auskultasi);
                    if (pkdk_auskultasi.auskultasi_1 !== null) {
                        $('#auskultasi-1').val(pkdk_auskultasi
                            .auskultasi_1);
                    }
                    if (pkdk_auskultasi.auskultasi_2 !== null) {
                        $('#auskultasi-2').prop('checked', true).change()
                    }
                    if (pkdk_auskultasi.auskultasi_3 !== null) {
                        $('#auskultasi-3').prop('checked', true).change()
                    }
                    if (pkdk_auskultasi.auskultasi_4 !== null) {
                        $('#auskultasi-4').prop('checked', true).change()
                    }
                    // AUSKULTASI AKHIR

                    // GERAK JANIN AWAL
                    $('#gerak-janin').val(data.kajian_kebidanan.pkdk_gerak_janin)
                    // GERAK JANIN AKHIR

                    // HIS / KONTRAKSI AWAL
                    const pkdk_his_kontraksi = JSON.parse(data.kajian_kebidanan
                        .pkdk_his_kontraksi);
                    if (pkdk_his_kontraksi.his_konteraksi_1 !== null) {
                        $('#his-konteraksi-1').val(pkdk_his_kontraksi
                            .his_konteraksi_1);
                    }
                    if (pkdk_his_kontraksi.his_konteraksi_2 !== null) {
                        $('#his-konteraksi-2').val(pkdk_his_kontraksi
                            .his_konteraksi_2);
                    }
                    if (pkdk_his_kontraksi.his_konteraksi_3 !== null) {
                        $('#his-konteraksi-3').val(pkdk_his_kontraksi
                            .his_konteraksi_3);
                    }
                    // HIS / KONTRAKSI AKHIR

                    // PEMERIKSAAN DALAM AWAL
                    const pkdk_pemeriksaan_dalam = JSON.parse(data.kajian_kebidanan
                        .pkdk_pemeriksaan_dalam);
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_1 !== null) {
                        $('#pemeriksaan-dalam-1').prop('checked', true).change()
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_2 !== null) {
                        $('#pemeriksaan-dalam-2').prop('checked', true).change()
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_3 !== null) {
                        $('#pemeriksaan-dalam-3').prop('checked', true).change()
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_4 !== null) {
                        $('#pemeriksaan-dalam-4').val(pkdk_pemeriksaan_dalam
                            .pemeriksaan_dalam_4);
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_5 !== null) {
                        $('#pemeriksaan-dalam-5').prop('checked', true).change()
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_6 !== null) {
                        $('#pemeriksaan-dalam-6').prop('checked', true).change()
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_7 !== null) {
                        $('#pemeriksaan-dalam-7').prop('checked', true).change()
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_8 !== null) {
                        $('#pemeriksaan-dalam-8').val(pkdk_pemeriksaan_dalam
                            .pemeriksaan_dalam_8);
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_9 !== null) {
                        $('#pemeriksaan-dalam-9').val(pkdk_pemeriksaan_dalam
                            .pemeriksaan_dalam_9);
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_10 !== null) {
                        $('#pemeriksaan-dalam-10').prop('checked', true).change()
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_11 !== null) {
                        $('#pemeriksaan-dalam-11').prop('checked', true).change()
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_12 !== null) {
                        $('#pemeriksaan-dalam-12').val(pkdk_pemeriksaan_dalam
                            .pemeriksaan_dalam_12);
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_13 === '1') {
                        $('#pemeriksaan-dalam-13').prop('checked', true).change()
                    }
                    if (pkdk_pemeriksaan_dalam.pemeriksaan_dalam_13 === '0') {
                        $('#pemeriksaan-dalam-14').prop('checked', true).change()
                    }
                    // PEMERIKSAAN DALAM AKHIR
                    //PEMERIKSAAN KEBIDANAN DAN KANDUNGAN pengkajian awal kebidanan dan kandungan AKHIR============>

                    //PEMERIKSAAN FISISK DAN TANDA TANDA FITAL pengkajian awal kebidanan dan kandungan AWAL============>
                    // KESADARAN AWAL
                    const pftv_kesadaran = JSON.parse(data.kajian_kebidanan
                        .pftv_kesadaran);
                    if (pftv_kesadaran.kesadaran_1 !== null) {
                        $('#kesadaran-1').prop('checked', true).change()
                    }
                    if (pftv_kesadaran.kesadaran_2 !== null) {
                        $('#kesadaran-2').prop('checked', true).change()
                    }
                    if (pftv_kesadaran.kesadaran_3 !== null) {
                        $('#kesadaran-3').prop('checked', true).change()
                    }
                    if (pftv_kesadaran.kesadaran_4 !== null) {
                        $('#kesadaran-4').prop('checked', true).change()
                    }
                    // KESADARAN AKHIR

                    // GCS AWAL
                    $('#gcs-e').val(data.kajian_kebidanan.pftv_gsc_e)
                    $('#gcs-m').val(data.kajian_kebidanan.pftv_gsc_m)
                    $('#gcs-v').val(data.kajian_kebidanan.pftv_gsc_v)
                    $('#gsc-total').val(data.kajian_kebidanan.pftv_total)


                    // TEKANAN DARAH AWAL
                    const pftv_tekanan_darah = JSON.parse(data.kajian_kebidanan.pftv_tekanan_darah);
                    if (pftv_tekanan_darah.tekanan_darah_1 !== null) {$('#tekanan-darah-1').val(pftv_tekanan_darah.tekanan_darah_1);}
                    if (pftv_tekanan_darah.tekanan_darah_2 !== null) {$('#tekanan-darah-2').val(pftv_tekanan_darah.tekanan_darah_2);}
                    if (pftv_tekanan_darah.tekanan_darah_3 !== null) {$('#tekanan-darah-3').val(pftv_tekanan_darah.tekanan_darah_3);}


                    // FREKUENSI NADI AWAL
                    const pftv_frekuensi_nadi = JSON.parse(data.kajian_kebidanan.pftv_frekuensi_nadi);
                    if (pftv_frekuensi_nadi.frekuensi_nadi_1 !== null) {$('#frekuensi-nadi-1').val(pftv_frekuensi_nadi.frekuensi_nadi_1);}
                    if (pftv_frekuensi_nadi.frekuensi_nadi_2 !== null) {$('#frekuensi-nadi-2').val(pftv_frekuensi_nadi.frekuensi_nadi_2);}


                    // BERAT BADAN AWAL
                    const pftv_berat_badan = JSON.parse(data.kajian_kebidanan.pftv_berat_badan);
                    if (pftv_berat_badan.berat_badan_1 !== null) {$('#berat-badan-1').val(pftv_berat_badan.berat_badan_1); }
                    if (pftv_berat_badan.berat_badan_2 !== null) {$('#berat-badan-2').val(pftv_berat_badan.berat_badan_2);}


                    // MATA AWAL
                    const pftv_mata = JSON.parse(data.kajian_kebidanan.pftv_mata);
                    if (pftv_mata.mata_1 !== null) {$('#mata-1').prop('checked', true).change()}
                    if (pftv_mata.mata_2 !== null) {$('#mata-2').prop('checked', true).change()}
                    if (pftv_mata.mata_3 !== null) {$('#mata-3').prop('checked', true).change()}
                    if (pftv_mata.mata_4 !== null) {$('#mata-4').prop('checked', true).change()}


                    // DADA DAN AKSILA AWAL
                    const pftv_dada_aksila = JSON.parse(data.kajian_kebidanan
                        .pftv_dada_aksila);
                    if (pftv_dada_aksila.dada_askila_1 !== null) {
                        $('#dada-askila-1').prop('checked', true).change()
                    }
                    if (pftv_dada_aksila.dada_askila_2 !== null) {
                        $('#dada-askila-2').prop('checked', true).change()
                    }
                    if (pftv_dada_aksila.dada_askila_3 !== null) {
                        $('#dada-askila-3').prop('checked', true).change()
                    }
                    if (pftv_dada_aksila.dada_askila_4 !== null) {
                        $('#dada-askila-4').prop('checked', true).change()
                    }
                    if (pftv_dada_aksila.dada_askila_5 !== null) {
                        $('#dada-askila-5').prop('checked', true).change()
                    }
                    if (pftv_dada_aksila.dada_askila_6 !== null) {
                        $('#dada-askila-6').prop('checked', true).change()
                    }
                    // DADA DAN AKSILA AKHIR

                    //EKSTREMINITAS AWAL
                    const pftv_ekstremitas = JSON.parse(data.kajian_kebidanan
                        .pftv_ekstremitas);
                    if (pftv_ekstremitas.ekstremitas_1 !== null) {
                        $('#ekstremitas-1').prop('checked', true).change()
                    }
                    if (pftv_ekstremitas.ekstremitas_2 !== null) {
                        $('#ekstremitas-2').prop('checked', true).change()
                    }
                    if (pftv_ekstremitas.ekstremitas_3 !== null) {
                        $('#ekstremitas-3').prop('checked', true).change()
                    }
                    if (pftv_ekstremitas.ekstremitas_4 !== null) {
                        $('#ekstremitas-4').prop('checked', true).change()
                    }
                    //EKSTREMINITAS AKHIR

                    //SISTEM PERNAFASAN AWAL
                    const pftv_sistem_pernafasan = JSON.parse(data.kajian_kebidanan
                        .pftv_sistem_pernafasan);
                    if (pftv_sistem_pernafasan.sistem_pernafasan_1 !== null) {
                        $('#sistem-pernafasan-1').prop('checked', true).change()
                    }
                    if (pftv_sistem_pernafasan.sistem_pernafasan_2 !== null) {
                        $('#sistem-pernafasan-2').prop('checked', true).change()
                    }
                    if (pftv_sistem_pernafasan.sistem_pernafasan_3 !== null) {
                        $('#sistem-pernafasan-3').prop('checked', true).change()
                    }
                    if (pftv_sistem_pernafasan.sistem_pernafasan_4 !== null) {
                        $('#sistem-pernafasan-4').prop('checked', true).change()
                    }
                    if (pftv_sistem_pernafasan.sistem_pernafasan_5 !== null) {
                        $('#sistem-pernafasan-5').prop('checked', true).change()
                    }
                    if (pftv_sistem_pernafasan.sistem_pernafasan_6 !== null) {
                        $('#sistem-pernafasan-6').prop('checked', true).change()
                    }
                    if (pftv_sistem_pernafasan.sistem_pernafasan_7 !== null) {
                        $('#sistem-pernafasan-7').prop('checked', true).change()
                    }
                    if (pftv_sistem_pernafasan.sistem_pernafasan_8 !== null) {
                        $('#sistem-pernafasan-8').prop('checked', true).change()
                    }
                    if (pftv_sistem_pernafasan.sistem_pernafasan_9 !== null) {
                        $('#sistem-pernafasan-9').prop('checked', true).change()
                    }
                    //SISTEM PERNAFASAN AKHIR

                    //SISTEM KORDISVAKULER AWAL
                    const pftv_sistem_kardiovaskuler = JSON.parse(data.kajian_kebidanan
                        .pftv_sistem_kardiovaskuler);
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_1 !== null) {
                        $('#sistem-kardiovaskuler-1').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_2 !== null) {
                        $('#sistem-kardiovaskuler-2').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_3 !== null) {
                        $('#sistem-kardiovaskuler-3').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_4 !== null) {
                        $('#sistem-kardiovaskuler-4').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_5 !== null) {
                        $('#sistem-kardiovaskuler-5').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_5 !== null) {
                        $('#sistem-kardiovaskuler-6').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_7 !== null) {
                        $('#sistem-kardiovaskuler-7').val(pftv_sistem_kardiovaskuler
                            .sistem_kardiovaskuler_7);
                    }


                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_8 !== null) {
                        $('#sistem-kardiovaskuler-8').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_8 !== null) {
                        $('#sistem-kardiovaskuler-9').prop('checked', true).change()
                    }


                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_10 !== null) {
                        $('#sistem-kardiovaskuler-10').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_11 !== null) {
                        $('#sistem-kardiovaskuler-11').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_12 !== null) {
                        $('#sistem-kardiovaskuler-12').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_13 !== null) {
                        $('#sistem-kardiovaskuler-13').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_14 !== null) {
                        $('#sistem-kardiovaskuler-14').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_15 !== null) {
                        $('#sistem-kardiovaskuler-15').prop('checked', true).change()
                    }
                    if (pftv_sistem_kardiovaskuler.sistem_kardiovaskuler_16 !== null) {
                        $('#sistem-kardiovaskuler-16').val(pftv_sistem_kardiovaskuler
                            .sistem_kardiovaskuler_16);
                    }
                    //SISTEM KORDISVAKULER AKHIR
                    //PEMERIKSAAN FISISK DAN TANDA TANDA FITAL pengkajian awal kebidanan dan kandungan AKHIR

                    //SKALA EARLY WARNING SYSTEM ( NEWS & MEOWS ) pengkajian awal kebidanan dan kandungan AKHIR
                    // skala early warning system NEWS AWAL
                    var skala_early = [data.sews_laju_respirasi, data.sews_saturasi_2, data.sews_suplemen, data
                        .sews_temperatur, data.sews_tds, data.sews_laju_jantung, data.sews_kesadaran_2
                    ];
                    for (let i = 0; i <= skala_early.length; i++) {
                        for (let j = 1; j <= 8; j++) {
                            var z = i + 1;
                            // console.log(skala_early[i] + ' ' + $('#skalanews_' + z + '_' + j).val())
                            if (skala_early[i] === $('#skalanews-' + z + '-' + j).val()) {
                                $('#skalanews-' + z + '-' + j).prop('checked', true).change()
                            }
                        }
                    }
                    // end skala early warning system NEWS AKHIR

                    // skala early warning system MEOWS AWAL
                    var skala_early = [data.sews_respirasi, data.sews_saturasi_1, data.sews_o2, data
                        .sews_suhu, data.sews_td_sistolik, data.sews_td_diastolik, data.sews_nadi, data
                        .sews_kesadaran_1, data.sews_nyeri, data.sews_pengeluaran, data.sews_protein_urin
                    ];
                    for (let i = 0; i <= skala_early.length; i++) {
                        for (let j = 1; j <= 8; j++) {
                            var z = i + 1;
                            // console.log(skala_early[i] + ' ' + $('#skalanews-' + z + '-' + j).val())
                            if (skala_early[i] === $('#skalameows-' + z + '-' + j).val()) {
                                $('#skalameows-' + z + '-' + j).prop('checked', true).change()
                            }
                        }
                    }
                    // skala early warning system MEOWS AKHIR     
                    //SKALA EARLY WARNING SYSTEM ( NEWS & MEOWS )  pengkajian awal kebidanan dan kandungan AKHIR

                    //DATA PENUNJANG pengkajian awal kebidanan dan kandungan AWAL
                    $('#tanggal-pemeriksaan-lab-kebidanan').val(data.kajian_kebidanan.dp_pemeriksaan_lab_tanggal)
                    $('#hasil-pemeriksaan-labo-kebidanan').val(data.kajian_kebidanan.dp_hasil)
                    $('#tanggal-pemeriksaan-rad-kebidanan').val(data.kajian_kebidanan.dp_pemeriksaan_ctg_tanggal)
                    $('#hasil-pemeriksaan-rad-kebidanan').val(data.kajian_kebidanan.dp_hasil1)
                    $('#penunjang-lain-kebidanan').val(data.kajian_kebidanan.dp_lain_lain)


                    // POPULASI KHUSUS (ISI SESUAI KEBUTUHAN PASIEN)
                    const pk_penyakit_menular = JSON.parse(data.kajian_kebidanan.pk_penyakit_menular); 
                    if (pk_penyakit_menular.pk_penyakit_menular_1 === '1') {$('#pk-penyakit-menular-1').prop('checked', true).change() }
                    if (pk_penyakit_menular.pk_penyakit_menular_1 === '0') {$('#pk-penyakit-menular-2').prop('checked', true).change () }
                    if (pk_penyakit_menular.pk_penyakit_menular_3 !== null) { $('#pk-penyakit-menular-3').prop('checked', true) }
                    if (pk_penyakit_menular.pk_penyakit_menular_4 !== null) { $('#pk-penyakit-menular-4').prop('checked', true) }
                    if (pk_penyakit_menular.pk_penyakit_menular_5 !== null) { $('#pk-penyakit-menular-5').prop('checked', true) }
                    if (pk_penyakit_menular.pk_penyakit_menular_6 !== null) { $('#pk-penyakit-menular-6').prop('checked', true) }
                    if (pk_penyakit_menular.pk_penyakit_menular_7 !== null) {$('#pk-penyakit-menular-7').val(pk_penyakit_menular.pk_penyakit_menular_7);}
                    if (pk_penyakit_menular.pk_penyakit_menular_8 === '1') {$('#pk-penyakit-menular-8').prop('checked', true).change() }
                    if (pk_penyakit_menular.pk_penyakit_menular_9 !== null) {$('#pk-penyakit-menular-9').val(pk_penyakit_menular.pk_penyakit_menular_9);}
                    if (pk_penyakit_menular.pk_penyakit_menular_8 === '0') {$('#pk-penyakit-menular-10').prop('checked', true).change () }
                    if (pk_penyakit_menular.pk_penyakit_menular_11 === '0') {$('#pk-penyakit-menular-11').prop('checked', true).change() }
                    if (pk_penyakit_menular.pk_penyakit_menular_11 === '1') {$('#pk-penyakit-menular-12').prop('checked', true).change () }
                    if (pk_penyakit_menular.pk_penyakit_menular_13 !== null) {$('#pk-penyakit-menular-13').val(pk_penyakit_menular.pk_penyakit_menular_13);}
                    if (pk_penyakit_menular.pk_penyakit_menular_14 !== null) { $('#pk-penyakit-menular-14').prop('checked', true) }
                    if (pk_penyakit_menular.pk_penyakit_menular_15 !== null) { $('#pk-penyakit-menular-15').prop('checked', true) }
                    if (pk_penyakit_menular.pk_penyakit_menular_16 !== null) { $('#pk-penyakit-menular-16').prop('checked', true) }
                    if (pk_penyakit_menular.pk_penyakit_menular_17 !== null) { $('#pk-penyakit-menular-17').prop('checked', true) }
                    if (pk_penyakit_menular.pk_penyakit_menular_18 === '0') {$('#pk-penyakit-menular-18').prop('checked', true).change() }
                    if (pk_penyakit_menular.pk_penyakit_menular_18 === '1') {$('#pk-penyakit-menular-19').prop('checked', true).change () }
                    if (pk_penyakit_menular.pk_penyakit_menular_20 !== null) {$('#pk-penyakit-menular-20').val(pk_penyakit_menular.pk_penyakit_menular_20);}

                    // PENYAKIT PENURUNAN DAYA TAHAN TUBUH AWAL
                    var pk_penurunan_daya_tahan_tubuh = JSON.parse(data.kajian_kebidanan
                        .pk_penurunan_daya_tahan_tubuh);
                    if (pk_penurunan_daya_tahan_tubuh.penyakit_saat_ini === '0') {
                        $('#pk-penyakit-pdtt-1-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_penurunan_daya_tahan_tubuh.penyakit_saat_ini === '1') {
                        $('#pk-penyakit-pdtt-1-kebidanan-ya').prop('checked', true).change()
                    }
                    if (pk_penurunan_daya_tahan_tubuh.informasi_dari.dokter !== '') {
                        $('#pk-pdtt-dokter-kebidanan').prop('checked', true)
                    }
                    if (pk_penurunan_daya_tahan_tubuh.informasi_dari.perawat !== '') {
                        $('#pk-pdtt-perawat-kebidanan').prop('checked', true)
                    }
                    if (pk_penurunan_daya_tahan_tubuh.informasi_dari.keluarga !== '') {
                        $('#pk-pdtt-keluarga-kebidanan').prop('checked', true)
                    }
                    if (pk_penurunan_daya_tahan_tubuh.informasi_dari.lain !== '') {
                        $('#pk-pdtt-lain-kebidanan').prop('checked', true)
                    }
                    if (pk_penurunan_daya_tahan_tubuh.informasi_dari.ket_lain !== '') {
                        $('#pk-pdtt-lain-kebidanan-input').val(pk_penurunan_daya_tahan_tubuh.informasi_dari
                            .ket_lain).attr(
                            'disabled', false)
                    }
                    if (pk_penurunan_daya_tahan_tubuh.informasi_jangka_waktu === '0') {
                        $('#pk-penyakit-pdtt-3-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_penurunan_daya_tahan_tubuh.informasi_jangka_waktu === '1') {
                        $('#pk-penyakit-pdtt-3-kebidanan-ya').prop('checked', true).change()
                    }
                    $('#pk-penyakit-pdtt-3-kebidanan-input').val(pk_penurunan_daya_tahan_tubuh
                        .ket_informasi_jangka_waktu);
                    if (pk_penurunan_daya_tahan_tubuh.pemeriksaan_rutin === '0') {
                        $('#pk-penyakit-pdtt-4-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_penurunan_daya_tahan_tubuh.pemeriksaan_rutin === '1') {
                        $('#pk-penyakit-pdtt-4-kebidanan-ya').prop('checked', true).change()
                    }
                    $('#pk-penyakit-pdtt-4-kebidanan-input').val(pk_penurunan_daya_tahan_tubuh
                        .ket_pemeriksaan_rutin);
                    if (pk_penurunan_daya_tahan_tubuh.penyakit_penyerta === '0') {
                        $('#pk-penyakit-pdtt-5-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_penurunan_daya_tahan_tubuh.penyakit_penyerta === '1') {
                        $('#pk-penyakit-pdtt-5-kebidanan-ya').prop('checked', true).change()
                    }
                    $('#pk-penyakit-pdtt-5-kebidanan-input').val(pk_penurunan_daya_tahan_tubuh
                        .ket_penyakit_penyerta);
                    // PENYAKIT PENURUNAN DAYA TAHAN TUBUH AKHIR

                    // KESEHATAN JIWA AWAL
                    var pk_kesehatan_jiwa = JSON.parse(data.kajian_kebidanan.pk_kesehatan_jiwa);
                    if (pk_kesehatan_jiwa.ket_1 === '0') {
                        $('#pk-kesehatan-jiwa-1-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_kesehatan_jiwa.ket_1 === '1') {
                        $('#pk-kesehatan-jiwa-1-kebidanan-ya').prop('checked', true).change()
                    }

                    if (pk_kesehatan_jiwa.ket_2 === '0') {
                        $('#pk-kesehatan-jiwa-2-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_kesehatan_jiwa.ket_2 === '1') {
                        $('#pk-kesehatan-jiwa-2-kebidanan-ya').prop('checked', true).change()
                    }

                    if (pk_kesehatan_jiwa.ket_3 === '0') {
                        $('#pk-kesehatan-jiwa-3-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_kesehatan_jiwa.ket_3 === '1') {
                        $('#pk-kesehatan-jiwa-3-kebidanan-ya').prop('checked', true).change()
                    }

                    if (pk_kesehatan_jiwa.ket_4 === '0') {
                        $('#pk-kesehatan-jiwa-4-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_kesehatan_jiwa.ket_4 === '1') {
                        $('#pk-kesehatan-jiwa-4-kebidanan-ya').prop('checked', true).change()
                    }

                    if (pk_kesehatan_jiwa.ket_5 === '0') {
                        $('#pk-kesehatan-jiwa-5-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_kesehatan_jiwa.ket_5 === '1') {
                        $('#pk-kesehatan-jiwa-5-kebidanan-ya').prop('checked', true).change()
                    }

                    if (pk_kesehatan_jiwa.ket_6 === '0') {
                        $('#pk-kesehatan-jiwa-6-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_kesehatan_jiwa.ket_6 === '1') {
                        $('#pk-kesehatan-jiwa-6-kebidanan-ya').prop('checked', true).change()
                    }

                    if (pk_kesehatan_jiwa.ket_7 === '0') {
                        $('#pk-kesehatan-jiwa-7-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_kesehatan_jiwa.ket_7 === '1') {
                        $('#pk-kesehatan-jiwa-7-kebidanan-ya').prop('checked', true).change()
                    }

                    if (pk_kesehatan_jiwa.ket_8 === '0') {
                        $('#pk-kesehatan-jiwa-8-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_kesehatan_jiwa.ket_8 === '1') {
                        $('#pk-kesehatan-jiwa-8-kebidanan-ya').prop('checked', true).change()
                    }

                    if (pk_kesehatan_jiwa.ket_9 === '0') {
                        $('#pk-kesehatan-jiwa-9-kebidanan-tidak').prop('checked', true).change()
                    }
                    if (pk_kesehatan_jiwa.ket_9 === '1') {
                        $('#pk-kesehatan-jiwa-9-kebidanan-ya').prop('checked', true).change()
                    }
                    // KESEHATAN JIWA AKHIR

                    // kesehatan jiwa
                    var kj = JSON.parse(data.kajian_kebidanan.pk_kesehatan_jiwa);
                    for (let i = 1; i <= 9; i++) {
                        if (kj['ket_' + i] !== '0') {
                            $('#pk-kesehatan-jiwa-1-kebidanan' + i + '-ya').prop('checked', true)
                        }
                    }
                    // end kesehatan jiwa

                    // pasien kekerasan
                    var kekerasan = JSON.parse(data.kajian_kebidanan.pk_pasien_kekerasan_penganiayaan);
                    if (kekerasan.ket_1 !== '0') {
                        $('#pk-pasien-kekerasan-1-kebidanan-ya').prop('checked', true).change()
                    }
                    if (kekerasan.ket_2 !== '') {
                        $('#pk-pasien-kekerasan-2-kebidanan').val(kekerasan.ket_2)
                    }
                    if (kekerasan.ket_3 !== '') {
                        $('#pk-pasien-kekerasan-3-kebidanan').val(kekerasan.ket_3)
                    }
                    if (kekerasan.ket_4 !== '') {
                        $('#pk-pasien-kekerasan-4-kebidanan').val(kekerasan.ket_4)
                    }
                    if (kekerasan.ket_5 !== '') {
                        $('#pk-pasien-kekerasan-5-kebidanan').val(kekerasan.ket_5)
                    }
                    if (kekerasan.ket_6 !== '0') {
                        $('#pk-pasien-kekerasan-6-kebidanan-ya').prop('checked', true).change()
                    }
                    // end pasien kekerasan


                    // pasien ketergantungan
                    var ketergantungan = JSON.parse(data.kajian_kebidanan.pk_pasien_ketergantungan_obat);
                    if (ketergantungan.obat !== '0') {
                        $('#pk-pasien-ketergantungan-obat-kebidanan-ya').prop('checked', true).change()
                    }
                    if (ketergantungan.ket_obat !== '') {
                        $('#pk-pasien-ketergantungan-obat-input-kebidanan').val(ketergantungan.ket_obat)
                    }
                    if (ketergantungan.lama_ketergantungan !== '') {
                        $('#pk-pasien-lama-ketergantungan-obat-input-kebidanan').val(ketergantungan
                            .lama_ketergantungan)
                    }



                    
                    //POPULASI KHUSUS (ISI SESUAI KEBITUHAN PASIEN) pengkajian awal kebidanan dan kandungan AKHIR============>


                    // PENILAIAN KEMAMPUAN FUNGSIONAL (Indeks Barthel) pengkajian awal kebidanan dan kandungan AWAL=====>
                    if (data.kajian_kebidanan.pkf_makan === '0') {
                        $('#pkf-makan-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_makan === '5') {
                        $('#pkf-makan-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_makan === '10') {
                        $('#pkf-makan-3').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.pkf_mandi === '0') {
                        $('#pkf-mandi-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_mandi === '5') {
                        $('#pkf-mandi-2').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.pkf_personal === '0') {
                        $('#pkf-personal-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_personal === '5') {
                        $('#pkf-personal-2').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.pkf_berpakaian === '0') {
                        $('#pkf-berpakaian-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_berpakaian === '5') {
                        $('#pkf-berpakaian-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_berpakaian === '10') {
                        $('#pkf-berpakaian-3').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.pkf_buang_besar === '0') {
                        $('#pkf-bab-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_buang_besar === '5') {
                        $('#pkf-bab-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_buang_besar === '10') {
                        $('#pkf-bab-3').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.pkf_buang_kecil === '0') {
                        $('#pkf-bak-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_buang_kecil === '5') {
                        $('#pkf-bak-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_buang_kecil === '10') {
                        $('#pkf-bak-3').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.pkf_berpindah === '0') {
                        $('#pkf-berpindah-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_berpindah === '5') {
                        $('#pkf-berpindah-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_berpindah === '10') {
                        $('#pkf-berpindah-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_berpindah === '15') {
                        $('#pkf-berpindah-4').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.pkf_toileting === '0') {
                        $('#pkf-toiletting-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_toileting === '5') {
                        $('#pkf-toiletting-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_toileting === '10') {
                        $('#pkf-toiletting-3').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.pkf_mobilitas === '0') {
                        $('#pkf-mobilisasi-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_mobilitas === '5') {
                        $('#pkf-mobilisasi-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_mobilitas === '10') {
                        $('#pkf-mobilisasi-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_mobilitas === '15') {
                        $('#pkf-mobilisasi-4').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.pkf_naik === '0') {
                        $('#pkf-naikturuntangga-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_naik === '5') {
                        $('#pkf-naikturuntangga-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.pkf_naik === '10') {
                        $('#pkf-naikturuntangga-3').prop('checked', true).change()
                    }
                    // PENILAIAN KEMAMPUAN FUNGSIONAL (Indeks Barthel) pengkajian awal kebidanan dan kandungan AKHIR=====>

                    // SKRINING NUTRISI (Mainutrition Screening Tool Modifikasi) pengkajian awal kebidanan dan kandungan AWAL=====>
                    if (data.kajian_kebidanan.sn_penurunan_bb_kebidanan == 1) {
                        $('#sn-tidak').prop('checked', true);
                        calcscore();
                    } else if (data.kajian_kebidanan.sn_penurunan_bb_kebidanan == 2) {
                        $('#sn-tidak-yakin').prop('checked', true);
                        calcscore();
                    } else if (data.kajian_kebidanan.sn_penurunan_bb_kebidanan == 3) {
                        $('#sn-ya').prop('checked', true).change();
                        if (data.kajian_kebidanan.sn_penurunan_bb_on_kebidanan == 1) {
                            $('#sn-pbb-1-1').prop('checked', true);
                            calcscore();
                        } else if (data.kajian_kebidanan.sn_penurunan_bb_on_kebidanan == 2) {
                            $('#sn-pbb-2-2').prop('checked', true);
                            calcscore();
                        } else if (data.kajian_kebidanan.sn_penurunan_bb_on_kebidanan == 3) {
                            $('#sn-pbb-3-3').prop('checked', true);
                            calcscore();
                        } else if (data.kajian_kebidanan.sn_penurunan_bb_on_kebidanan == 4) {
                            $('#sn-pbb-4-4').prop('checked', true);
                            calcscore();
                        } else if (data.kajian_kebidanan.sn_penurunan_bb_on_kebidanan == 5) {
                            $('#sn-pbb-5-5').prop('checked', true);
                            calcscore();
                        }
                    }

                    if (data.kajian_kebidanan.sn_asupan_makan_kebidanan == 0) {
                        $('#sn-asupan-makan-tidak').prop('checked', true);
                        calcscore();
                    } else if (data.kajian_kebidanan.sn_asupan_makan_kebidanan == 1) {
                        $('#sn-asupan-makan-ya').prop('checked', true);
                        calcscore();
                    }
                    // SKRINING NUTRISI (Mainutrition Screening Tool Modifikasi) pengkajian awal kebidanan dan kandungan AKHIR=====>

                    // PENILAIAN TINGKAT NYERI DAN RESIKO JATUH DEWASA pengkajian awal kebidanan dan kandungan AWAL=====>
                    // NYERI HILANG AWAL
                    const ptn_nilai_tingkat_nyeri = JSON.parse(data.kajian_kebidanan
                        .ptn_nilai_tingkat_nyeri);
                    if (ptn_nilai_tingkat_nyeri.keterangan_kebidanan_1 !== null) {
                        $('#keterangan-kebidanan-1').prop('checked', true).change()
                    }
                    if (ptn_nilai_tingkat_nyeri.keterangan_kebidanan_1 !== null) {
                        $('#keterangan-kebidanan-2').prop('checked', true).change()
                    }
                    if (ptn_nilai_tingkat_nyeri.keterangan_kebidanan_1 !== null) {
                        $('#keterangan-kebidanan-3').prop('checked', true).change()
                    }
                    const ptn_nyeri_hilang = JSON.parse(data.kajian_kebidanan
                        .ptn_nyeri_hilang);
                    if (ptn_nyeri_hilang.nyeri_hilang_kebidanan_1 !== null) {
                        $('#nyeri-hilang-kebidanan-1').prop('checked', true)
                    }
                    if (ptn_nyeri_hilang.nyeri_hilang_kebidanan_2 !== null) {
                        $('#nyeri-hilang-kebidanan-2').prop('checked', true)
                    }
                    if (ptn_nyeri_hilang.nyeri_hilang_kebidanan_3 !== null) {
                        $('#nyeri-hilang-kebidanan-3').prop('checked', true)
                    }
                    if (ptn_nyeri_hilang.nyeri_hilang_kebidanan_4 !== null) {
                        $('#nyeri-hilang-kebidanan-4').prop('checked', true)
                    }
                    if (ptn_nyeri_hilang.nyeri_hilang_kebidanan_5 !== null) {
                        $('#nyeri-hilang-kebidanan-5').prop('checked', true);
                        $('#nyeri-hilang-kebidanan-6').val(ptn_nyeri_hilang.nyeri_hilang_kebidanan_6).attr(
                            'disabled', false);
                    }
                    // NYERI HILANG AKHIR

                    // PENILAIAN RESIKO JATUH DEWASA AWAL
                    if (data.kajian_kebidanan.prjd_riwayat_jatuh === '25') {
                        $('#prjd-riwayat-jatuh-kebidanan-ya').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.prjd_diagnosis === '15') {
                        $('#prjd-diagnosis-sekunder-kebidanan-ya').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.prjd_kursi_roda === '0') {
                        $('#alat-bantu-jalan-kebidanan-1').prop('checked', true);
                        $('#alat-bantu-jalan-1-kebidanan-ya').prop('checked', true).attr('disabled', false)
                            .change()
                    }
                    if (data.kajian_kebidanan.prjd_kruk_tongkat === '15') {
                        $('#alat-bantu-jalan-kebidanan-2').prop('checked', true);
                        $('#alat-bantu-jalan-2-kebidanan-ya').prop('checked', true).attr('disabled', false)
                            .change()
                    }
                    if (data.kajian_kebidanan.prjd_berpegangan === '30') {
                        $('#alat-bantu-jalan-kebidanan-3').prop('checked', true);
                        $('#alat-bantu-jalan-3-kebidanan-ya').prop('checked', true).attr('disabled', false)
                            .change()
                    }

                    if (data.kajian_kebidanan.prjd_terpasang_infus === '20') {
                        $('#prjd-terpasang-infus-kebidanan-ya').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.prjd_normal === '0') {
                        $('#cara-berjalan-kebidanan-1').prop('checked', true);
                        $('#cara-berjalan-1-kebidanan-ya').prop('checked', true).attr('disabled', false)
                            .change()
                    }
                    if (data.kajian_kebidanan.prjd_lemah === '10') {
                        $('#cara-berjalan-kebidanan-2').prop('checked', true);
                        $('#cara-berjalan-2-kebidanan-ya').prop('checked', true).attr('disabled', false)
                            .change()
                    }
                    if (data.kajian_kebidanan.prjd_terganggu === '20') {
                        $('#cara-berjalan-kebidanan-3').prop('checked', true);
                        $('#cara-berjalan-3-kebidanan-ya').prop('checked', true).attr('disabled', false)
                            .change()
                    }
                    if (data.kajian_kebidanan.prjd_sadar === '0') {
                        $('#status-mental-kebidanan-1').prop('checked', true);
                        $('#status-mental-1-kebidanan-ya').prop('checked', true).attr('disabled', false)
                            .change()
                    }
                    if (data.kajian_kebidanan.prjd_sering === '15') {
                        $('#status-mental-kebidanan-2').prop('checked', true);
                        $('#status-mental-2-kebidanan-ya').prop('checked', true).attr('disabled', false)
                            .change()
                    }
                    // PENILAIAN RESIKO JATUH DEWASA AKHIR
                    // PENILAIAN TINGKAT NYERI DAN RESIKO JATUH DEWASA pengkajian awal kebidanan dan kandungan AKHIR=====>

                    // SKRINING PASIEN AKHIR KEHIDUPAN pengkajian awal kebidanan dan kandungan AWAL=====>
                    if (data.kajian_kebidanan.spak_usia == '1') {
                        $('#spak-1-kebidanan-ya').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.spak_usia == '0') {
                        $('#spak-1-kebidanan-tidak').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.spak_nafas == '1') {
                        $('#spak-2-kebidanan-ya').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.spak_nafas == '0') {
                        $('#spak-2-kebidanan-tidak').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.spak_sepsis == '1') {
                        $('#spak-3-kebidanan-ya').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.spak_sepsis == '0') {
                        $('#spak-3-kebidanan-tidak').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.spak_multiple == '1') {
                        $('#spak-4-kebidanan-ya').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.spak_multiple == '0') {
                        $('#spak-4-kebidanan-tidak').prop('checked', true).change()
                    }

                    if (data.kajian_kebidanan.spak_studium == '1') {
                        $('#spak-5-kebidanan-ya').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.spak_studium == '0') {
                        $('#spak-5-kebidanan-tidak').prop('checked', true).change()
                    }
                    // SKRINING PASIEN AKHIR KEHIDUPAN pengkajian awal kebidanan dan kandungan AKHIR=====>

                    // ASSESMEN KEBIDANAN pengkajian awal kebidanan dan kandungan AKHIR=====>
                    if (data.kajian_kebidanan.ak_infeksi !== null) {
                        $('#masalah-resiko-infeksi').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.ak_anxeitas !== null) {
                        $('#masalah-anxietas').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.ak_perdarahan !== null) {
                        $('#masalah-resiko-perdarahan').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.ak_melahirkan !== null) {
                        $('#masalah-nyeri').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.ak_nausea !== null) {
                        $('#masalah-nausea').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.ak_efektif !== null) {
                        $('#masalah-pola-nafas').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.ak_janin !== null) {
                        $('#masalah-resiko-gawat').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.ak_lain !== null) {
                        $('#masalah-lain').prop('checked', true)
                    }
                    $('#masalah-lainl').val(data.kajian_kebidanan.ak_lainl);
                    // ASSESMEN KEBIDANAN pengkajian awal kebidanan dan kandungan AKHIR=====>

                    // RENCANA ASUHAN KEBIDANAN pengkajian awal kebidanan dan kandungan AKHIR=====>
                    if (data.kajian_kebidanan.rak_kluwarga !== null) {
                        $('#rencana-jelaskan').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.rak_selanjutnya !== null) {
                        $('#rencana-laporkan').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.rak_consent !== null) {
                        $('#rencana-fasilitas').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.rak_kebutuhan !== null) {
                        $('#rencana-asuhan').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.rak_persalinan !== null) {
                        $('#rencana-lakukan').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.rak_pasien !== null) {
                        $('#rencana-lakukan-edukasi').prop('checked', true)
                    }
                    if (data.kajian_kebidanan.rak_lain !== null) {
                        $('#rencana-lain').prop('checked', true)
                    }
                    $('#rencana-lainl').val(data.kajian_kebidanan.rak_lainl);
                    // RENCANA ASUHAN KEBIDANAN pengkajian awal kebidanan dan kandungan AKHIR=====>

                    // PERENCANAAN PULANG / DISCHARGE PLANNING pengkajian awal kebidanan dan kandungan AKHIR=====>
                    const kriteria_discharge_planing = JSON.parse(data.kajian_kebidanan.kriteria_discharge_planing);
                    if (kriteria_discharge_planing.discharge_planning_kebidanan_1 === '1') {
                        $('#discharge-planning-1-kebidanan-ya').prop('checked', true).change()
                    }
                    if (kriteria_discharge_planing.discharge_planning_kebidanan_1 === '0') {
                        $('#discharge-planning-1-kebidanan-tidak').prop('checked', true).change()
                    }

                    if (kriteria_discharge_planing.discharge_planning_kebidanan_2 === '1') {
                        $('#discharge-planning-2-kebidanan-ya').prop('checked', true).change()
                    }
                    if (kriteria_discharge_planing.discharge_planning_kebidanan_2 === '0') {
                        $('#discharge-planning-2-kebidanan-tidak').prop('checked', true).change()
                    }

                    if (kriteria_discharge_planing.discharge_planning_kebidanan_3 === '1') {
                        $('#discharge-planning-3-kebidanan-ya').prop('checked', true).change()
                    }
                    if (kriteria_discharge_planing.discharge_planning_kebidanan_3 === '0') {
                        $('#discharge-planning-3-kebidanan-tidak').prop('checked', true).change()
                    }

                    if (kriteria_discharge_planing.discharge_planning_kebidanan_4 === '1') {
                        $('#discharge-planning-4-kebidanan-ya').prop('checked', true).change()
                    }
                    if (kriteria_discharge_planing.discharge_planning_kebidanan_4 === '0') {
                        $('#discharge-planning-4-kebidanan-tidak').prop('checked', true).change()
                    }

                    const perencanaa_pulang = JSON.parse(data.kajian_kebidanan
                        .perencanaa_pulang);
                    if (perencanaa_pulang.kriteria_discharge_kebidanan_1 !== null) {
                        $('#kriteria-discharge-kebidanan-1').prop('checked', true)
                    }
                    if (perencanaa_pulang.kriteria_discharge_kebidanan_2 !== null) {
                        $('#kriteria-discharge-kebidanan-2').prop('checked', true)
                    }
                    if (perencanaa_pulang.kriteria_discharge_kebidanan_3 !== null) {
                        $('#kriteria-discharge-kebidanan-3').prop('checked', true)
                    }
                    if (perencanaa_pulang.kriteria_discharge_kebidanan_4 !== null) {
                        $('#kriteria-discharge-kebidanan-4').prop('checked', true)
                    }
                    if (perencanaa_pulang.kriteria_discharge_kebidanan_5 !== null) {
                        $('#kriteria-discharge-kebidanan-5').prop('checked', true)
                    }
                    if (perencanaa_pulang.kriteria_discharge_kebidanan_6 !== null) {
                        $('#kriteria-discharge-kebidanan-6').prop('checked', true)
                    }
                    if (perencanaa_pulang.kriteria_discharge_kebidanan_7 !== null) {
                        $('#kriteria-discharge-kebidanan-7').prop('checked', true)
                    }
                    if (perencanaa_pulang.kriteria_discharge_kebidanan_8 !== null) {
                        $('#kriteria-discharge-kebidanan-8').prop('checked', true)
                    }
                    if (perencanaa_pulang.kriteria_discharge_kebidanan_9 !== null) {
                        $('#kriteria-discharge-kebidanan-9').prop('checked', true);
                        $('#kriteria-discharge-kebidanan-10').val(perencanaa_pulang
                            .kriteria_discharge_kebidanan_10).attr(
                            'disabled', false);
                    }
                    // PERENCANAAN PULANG / DISCHARGE PLANNING pengkajian awal kebidanan dan kandungan AKHIR=====>

                    // SKALA EARLY WARNING MEOWS pengkajian awal kebidanan dan kandungan AWAL=====>
                    if (data.kajian_kebidanan.sews_respirasi == '3_1') {
                        $('#skalameows-1-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_respirasi == '0_2') {
                        $('#skalameows-1-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_respirasi == '2_3') {
                        $('#skalameows-1-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_respirasi == '3_4') {
                        $('#skalameows-1-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_saturasi_1 == '3_1') {
                        $('#skalameows-2-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_saturasi_1 == '2_2') {
                        $('#skalameows-2-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_saturasi_1 == '0_3') {
                        $('#skalameows-2-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_o2 == '2_1') {
                        $('#skalameows-3-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_o2 == '0_2') {
                        $('#skalameows-3-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_suhu == '3_1') {
                        $('#skalameows-4-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_suhu == '0_2') {
                        $('#skalameows-4-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_suhu == '2_3') {
                        $('#skalameows-4-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_suhu == '3_4') {
                        $('#skalameows-4-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_td_sistolik == '3_1') {
                        $('#skalameows-5-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_td_sistolik == '0_2') {
                        $('#skalameows-5-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_td_sistolik == '1_3') {
                        $('#skalameows-5-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_td_sistolik == '2_4') {
                        $('#skalameows-5-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_td_sistolik == '3_5') {
                        $('#skalameows-5-5').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_td_diastolik == '0_1') {
                        $('#skalameows-6-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_td_diastolik == '1_2') {
                        $('#skalameows-6-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_td_diastolik == '2_3') {
                        $('#skalameows-6-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_td_diastolik == '3_4') {
                        $('#skalameows-6-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_nadi == '3_1') {
                        $('#skalameows-7-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_nadi == '2_2') {
                        $('#skalameows-7-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_nadi == '0_3') {
                        $('#skalameows-7-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_nadi == '1_4') {
                        $('#skalameows-7-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_nadi == '2_5') {
                        $('#skalameows-7-5').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_nadi == '3_6') {
                        $('#skalameows-7-6').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_kesadaran_1 == '0_1') {
                        $('#skalameows-8-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_kesadaran_1 == '3_2') {
                        $('#skalameows-8-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_nyeri == '0_1') {
                        $('#skalameows-9-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_nyeri == '3_2') {
                        $('#skalameows-9-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_pengeluaran == '0_1') {
                        $('#skalameows-10-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_pengeluaran == '3_2') {
                        $('#skalameows-10-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_protein_urin == '2_1') {
                        $('#skalameows-11-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_protein_urin == '3_2') {
                        $('#skalameows-11-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_total_1 === 'Putih') {
                        $('#total-skalameows-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_total_1 === 'Hijau') {
                        $('#total-skalameows-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_total_1 === 'Kuning') {
                        $('#total-skalameows-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_total_1 === 'Merah') {
                        $('#total-skalameows-4').prop('checked', true).change()
                    }
                    // SKALA EARLY WARNING MEOWS pengkajian awal kebidanan dan kandungan AKHIR=====>

                    // SKALA EARLY WARNING NEWS  awal kebidanan dan kandungan AWAL=====>
                    if (data.kajian_kebidanan.sews_laju_respirasi == '3_1') {
                        $('#skalanews-1-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_respirasi == '1_2') {
                        $('#skalanews-1-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_respirasi == '0_3') {
                        $('#skalanews-1-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_respirasi == '2_4') {
                        $('#skalanews-1-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_respirasi == '3_5') {
                        $('#skalanews-1-5').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_respirasi == 'bk_6') {
                        $('#skalanews-1-6').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_saturasi_2 == '3_1') {
                        $('#skalanews-2-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_saturasi_2 == '2_2') {
                        $('#skalanews-2-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_saturasi_2 == '1_3') {
                        $('#skalanews-2-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_saturasi_2 == '0_4') {
                        $('#skalanews-2-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_suplemen == '2_1') {
                        $('#skalanews-3-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_suplemen == '0_2') {
                        $('#skalanews-3-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_temperatur == '3_1') {
                        $('#skalanews-4-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_temperatur == '1_2') {
                        $('#skalanews-4-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_temperatur == '0_3') {
                        $('#skalanews-4-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_temperatur == '1_4') {
                        $('#skalanews-4-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_temperatur == '2_5') {
                        $('#skalanews-4-5').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_tds == '3_1') {
                        $('#skalanews-5-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_tds == '1_2') {
                        $('#skalanews-5-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_tds == '0_3') {
                        $('#skalanews-5-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_tds == '1_4') {
                        $('#skalanews-5-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_tds == '2_5') {
                        $('#skalanews-5-5').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_tds == '3_6') {
                        $('#skalanews-5-6').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_tds == 'bk_7') {
                        $('#skalanews-5-7').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_jantung == '3_1') {
                        $('#skalanews-6-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_jantung == '0_2') {
                        $('#skalanews-6-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_jantung == '1_3') {
                        $('#skalanews-6-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_jantung == '2_4') {
                        $('#skalanews-6-4').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_jantung == '3_5') {
                        $('#skalanews-6-5').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_laju_jantung == 'bk_6') {
                        $('#skalanews-6-6').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_kesadaran_2 == '0_1') {
                        $('#skalanews-7-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_kesadaran_2 == '3_2') {
                        $('#skalanews-7-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.sews_kesadaran_2 == 'bk_3') {
                        $('#skalanews-7-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.total_skalanews === 'Putih') {
                        $('#total-skalanews-1').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.total_skalanews === 'Hijau') {
                        $('#total-skalanews-2').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.total_skalanews === 'Kuning') {
                        $('#total-skalanews-3').prop('checked', true).change()
                    }
                    if (data.kajian_kebidanan.total_skalanews === 'Merah') {
                        $('#total-skalanews-4').prop('checked', true).change()
                    }
                    // SKALA EARLY WARNING NEWS  awal kebidanan dan kandungan AKHIR=====>


                    // TANGGAL & JAM / TTD BIDAN / CEKLIS PERAWAT

                    $('#tanggal-jam-bidan').val((data.kajian_kebidanan.tanggal_jam_bidan !== null ?datetimefmysql(data.kajian_kebidanan.tanggal_jam_bidan) : '<?= date('d/m/Y H:i:s') ?>'));
                        if (data.kajian_kebidanan.id_bidan !== null) { $('#id-bidan').select2c('readonly', true)}
                        $('#id-bidan').val(data.kajian_kebidanan.id_bidan);
                        $('#s2id_id-bidan a .select2c-chosen').html(data.kajian_kebidanan.bidan);
                        if (data.kajian_kebidanan.ttd_bidan !== null) {
                            $('#ttd-bidan').hide();
                            $('#ttd_kebidanan_verified').show();
                        }


                    $('#tanggal-jam-dokter-keb').val((data.kajian_kebidanan.tanggal_jam_dokter_keb !== null ? datetimefmysql(data.kajian_kebidanan.tanggal_jam_dokter_keb) : ''));
                        if (data.kajian_kebidanan.id_dokter !== null) { $('#id-dokter').select2c('readonly', true)}
                        $('#id-dokter').val(data.kajian_kebidanan.id_dokter);
                        $('#s2id_id-dokter a .select2c-chosen').html(data.kajian_kebidanan.dokter);
                        if (data.kajian_kebidanan.ttd_dokter !== null) {
                            $('#ttd-dokter').hide();
                            $('#ttd_dokter_verified').show();
                        }
                }
                $('#kebidanan-bed').text(bed);

                $('.logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-pasien-alergi').show();
                    }
                }
                $('#modal_pengkajian_kebidanan').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }




    // GCS
    $('.gcsw').on('keyup', function() {
        let sum = 0
        $('.gcsw').each(function() {
            sum += Number($(this).val());
        });
        $('#gsc-total').val(sum);
    })

    // radio skrining nutrisi on
    $('.sn_penurunan_bb_area').hide();
    $('input[name="sn_penurunan_bb"]').change(function() {
        if ($(this).val() == '3') {
            $('.sn_penurunan_bb_area').show();
        } else {
            $('input[name="sn_penurunan_bb_on"]').prop('checked', false);
            $('.sn_penurunan_bb_area').hide();
        }
    });

    // PENILAIAN KEMAMPUAN FUNGSIONAL (Indeks Barthel)
    $('.calc_pkf').change(function() {
        var id = $(this).attr('id');
        var value = parseFloat($('#' + id).val());
        var split = id.split('-');
        var id_nilai = split[0] + '-' + split[1];

        $('#nilai-' + id_nilai).val(value);

        var total = 0;
        for (let index = 0; index < $('.sub_total_nilai_pkf_kebidanan').length; index++) {
            if ($('.sub_total_nilai_pkf_kebidanan_' + index).val() == '') {
                var sub_total = 0;
            } else {
                sub_total = parseInt($('.sub_total_nilai_pkf_kebidanan_' + index).val());
            }
            total = parseInt(total) + parseInt(sub_total);
        }

        $('#total-nilai-pkf').val(total);
    });
          

    // SKALA EARLY WARNING MEOWS AWAL
    function hitungSkalaEarlyMeows() {
        var total = 0;
        // looping vertical
        for (let i = 1; i <= 11; i++) {
            // looping horizontal
            var sub_total = 0
            for (let j = 1; j <= 11; j++) {
                var value = 0;
                if ($('#skalameows-' + i + '-' + j).is(':checked')) {
                    var getNilai = $('#skalameows-' + i + '-' + j).val()
                    value = getNilai.split('-', 1)
                    if (value[0] === 'bk') {
                        value = 8;
                    }
                }

                sub_total = sub_total + parseInt(value)
            }

            total = total + parseInt(sub_total)
        }

        if (total == 0) {
            $('#total-skalameows-1').prop('checked', true)
        } else if (total >= 1 && total <= 4) {
            $('#total-skalameows-2').prop('checked', true)
        } else if (total >= 5 && total <= 6) {
            $('#total-skalameows-3').prop('checked', true)
        } else if (total >= 7) {
            $('#total-skalameows-4').prop('checked', true)
        }
    }


    // SKALA EARLY WARNING NEWS AWAL
    function hitungSkalaEarlyNews() {
        var total = 0;
        // looping vertical
        for (let i = 1; i <= 7; i++) {
            // looping horizontal
            var sub_total = 0
            for (let j = 1; j <= 7; j++) {
                var value = 0;
                if ($('#skalanews-' + i + '-' + j).is(':checked')) {
                    var getNilai = $('#skalanews-' + i + '-' + j).val()
                    value = getNilai.split('-', 1)
                    if (value[0] === 'bk') {
                        value = 7;
                    }
                }

                sub_total = sub_total + parseInt(value)
            }

            total = total + parseInt(sub_total)
        }

        if (total == 0) {
            $('#total-skalanews-1').prop('checked', true)
        } else if (total >= 1 && total <= 4) {
            $('#total-skalanews-2').prop('checked', true)
        } else if (total >= 5 && total <= 6) {
            $('#total-skalanews-3').prop('checked', true)
        } else if (total >= 7) {
            $('#total-skalanews-4').prop('checked', true)
        }
    }


    // PENILAIAN RESIKO JATUH PASIEN DEWASA AWAL
    function calcscorepjd() {
        var score = 0;
        $("input[name='prjd_riwayat_jatuh_kebidanan']:checked").each(function() {
            if ($(this).val() == '25') {
                score += parseInt(25);
            } else if ($(this).val() == '0') {
                score += parseInt(0);
            }
        });
        $("input[name='prjd_diagnosis_sekunder_kebidanan']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15);
            } else if ($(this).val() == '0') {
                score += parseInt(0);
            }
        });
        $("input[name='prjd_terpasang_infus_kebidanan']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20);
            } else if ($(this).val() == '0') {
                score += parseInt(0);
            }
        });
        $("input[name='alat_bantu_jalan_1_kebidanan_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            }
        });
        $("input[name='alat_bantu_jalan_2_kebidanan_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15);
            }
        });
        $("input[name='alat_bantu_jalan_3_kebidanan_ya']:checked").each(function() {
            if ($(this).val() == '30') {
                score += parseInt(30);
            }
        });
        $("input[name='cara_berjalan_1_kebidanan_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            }
        });
        $("input[name='cara_berjalan_2_kebidanan_ya']:checked").each(function() {
            if ($(this).val() == '10') {
                score += parseInt(10);
            }
        });
        $("input[name='cara_berjalan_3_kebidanan_ya']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20);
            }
        });
        $("input[name='status_mental_1_kebidanan_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            }
        });
        $("input[name='status_mental_2_kebidanan_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15);
            }
        });

        $("input[name='prjd_jumlah_skor_kebidanan']").val(score);
    }

    // PENILAIAN RESIKO JATUH PASIEN DEWASA AKHIR
    function calcscore() {
        var score = 0;
        $("input[name='sn_penurunan_bb']:checked").each(function() {
            if ($(this).val() == '1') {
                score += parseInt(0);
            } else if ($(this).val() == '2') {
                score += parseInt(2);
            } else if ($(this).val() == '3') {
                $("input[name='sn_penurunan_bb_on']:checked").each(function() {
                    if ($(this).val() == '1') {
                        score += parseInt(1);
                    } else if ($(this).val() == '2') {
                        score += parseInt(2);
                    } else if ($(this).val() == '3') {
                        score += parseInt(3);
                    } else if ($(this).val() == '4') {
                        score += parseInt(4);
                    } else if ($(this).val() == '5') {
                        score += parseInt(2);
                    }
                });
            }
        });

        $("input[name='sn_asupan_makan']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
        });
        $("input[name=sn_total]").val(score);
    }


    // SHOW PENGKAJIAN MEDIS AWAL =====>
    function showKajianMedisKebidanan(data) {
        $('#id-kajian-medis-kebidanan').val(data.id);
        $('#waktu-kajian-medis-bidan').val((data.waktu_kajian_medis_bidan !== null ? datetimefmysql(data.waktu_kajian_medis_bidan) : '')).attr('disabled');

 

        $('#keluhan-utama-medis-kebidanan ').val(data.keluhan_utama);
        $('#rps-medis-kebidanan ').val(data.riwayat_penyakit_sekarang);
        $('#rpt-medis-kebidanan ').val(data.riwayat_penyakit_terdahulu);
        $('#pengobatan-medis-kebidanan ').val(data.pengobatan);
        $('#riwayat-alergi-kebidanan ').val(data.riwayat_alergi);


        var riwayat_penyakit_keluarga = JSON.parse(data.riwayat_penyakit_keluarga);
		if (riwayat_penyakit_keluarga.rpk_medis_kebidanan === '1') { $('#rpk-medis-kebidanan-ya').prop('checked', true).change() }
		if (riwayat_penyakit_keluarga.rpk_medis_kebidanan_asma !== '') { $('#rpk-medis-kebidanan-asma').prop('checked', true) }
		if (riwayat_penyakit_keluarga.rpk_medis_kebidanan_dm !== '') { $('#rpk-medis-kebidanan-dm').prop('checked', true) }
		if (riwayat_penyakit_keluarga.rpk_medis_kebidanan_cardiovascular !== '') { $('#rpk-medis-kebidanan-cardiovascular').prop('checked', true) }
		if (riwayat_penyakit_keluarga.rpk_medis_kebidanan_kanker !== '') { $('#rpk-medis-kebidanan-kanker').prop('checked', true) }
		if (riwayat_penyakit_keluarga.rpk_medis_kebidanan_thalasemia !== '') { $('#rpk-medis-kebidanan-thalasemia').prop('checked', true) }
		if (riwayat_penyakit_keluarga.rpk_medis_kebidanan_lain !== '') { $('#rpk-medis-kebidanan-lain').prop('checked', true) }
		if (riwayat_penyakit_keluarga.rpk_medis_kebidanan_lain_input !== '') { $('#rpk-medis-kebidanan-lain-input').val(riwayat_penyakit_keluarga.rpk_medis_kebidanan_lain_input).attr('disabled', false) }

        

        // TEKANAN DARAH AWAL

        const pf_tekanan_darah = JSON.parse(data.pf_tekanan_darah);
        if (pf_tekanan_darah.tekanan_darah_kebidanan_1 !== null) { $('#tekanan-darah-kebidanan-1').val(pf_tekanan_darah.tekanan_darah_kebidanan_1); }
        if (pf_tekanan_darah.tekanan_darah_kebidanan_2 !== null) {$('#tekanan-darah-kebidanan-2').val(pf_tekanan_darah.tekanan_darah_kebidanan_2);}
        if (pf_tekanan_darah.tekanan_darah_kebidanan_3 !== null) {$('#tekanan-darah-kebidanan-3').val(pf_tekanan_darah.tekanan_darah_kebidanan_3);}
        // TEKANAN DARAH AKHIR

        // FREKUENSI NADI AWAL
        const pf_frekuensi_nadi = JSON.parse(data.pf_frekuensi_nadi);
        if (pf_frekuensi_nadi.frekuensi_nadi_kebidanan_1 !== null) {$('#frekuensi-nadi-kebidanan-1').val(pf_frekuensi_nadi.frekuensi_nadi_kebidanan_1);}
        if (pf_frekuensi_nadi.frekuensi_nadi_kebidanan_2 !== null) {$('#frekuensi-nadi-kebidanan-2').val(pf_frekuensi_nadi.frekuensi_nadi_kebidanan_2);}

        var sadar = JSON.parse(data.kesadaran);
        if (sadar.composmentis !== '') {$('#composmentis-medis-kebidanan').prop('checked', true)}
        if (sadar.apatis !== '') { $('#apatis-medis-kebidanan').prop('checked', true)}
        if (sadar.samnolen !== '') { $('#samnolen-medis-kebidanan').prop('checked', true)}
        if (sadar.sopor !== '') {$('#sopor-medis-kebidanan').prop('checked', true)}
        if (sadar.koma !== '') { $('#koma-medis-kebidanan').prop('checked', true)}

        if (data.pf_kepala === 'Normal') { $('#pf-kepala-kebidanan-tidak').prop('checked', true)}
        if (data.pf_kepala === 'Abnormal') {$('#pf-kepala-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_kepala !== null) { $('#ket-pf-kepala-kebidanan').val(data.ket_pf_kepala)}

        if (data.pf_mata === 'Normal') {$('#pf-mata-kebidanan-tidak').prop('checked', true) }
        if (data.pf_mata === 'Abnormal') {$('#pf-mata-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_mata !== null) {$('#ket-pf-mata-kebidanan').val(data.ket_pf_mata) }

        if (data.pf_hidung === 'Normal') {$('#pf-hidung-kebidanan-tidak').prop('checked', true)}
        if (data.pf_hidung === 'Abnormal') {$('#pf-hidung-kebidanan-ya').prop('checked', true) }
        if (data.ket_pf_hidung !== null) { $('#ket-pf-hidung-kebidanan').val(data.ket_pf_hidung)}

        if (data.pf_gigi_mulut === 'Normal') {$('#pf-gigi-mulut-kebidanan-tidak').prop('checked', true)}
        if (data.pf_gigi_mulut === 'Abnormal') {$('#pf-gigi-mulut-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_gigi_mulut !== null) {$('#ket-pf-gigi-mulut-kebidanan').val(data.ket_pf_gigi_mulut)}

        if (data.pf_tenggorokan === 'Normal') { $('#pf-tenggorokan-kebidanan-tidak').prop('checked', true)}
        if (data.pf_tenggorokan === 'Abnormal') {$('#pf-tenggorokan-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_tenggorokan !== null) {$('#ket-pf-tenggorokan-kebidanan').val(data.ket_pf_tenggorokan)}

        if (data.pf_telinga === 'Normal') {$('#pf-telinga-kebidanan-tidak').prop('checked', true) }
        if (data.pf_telinga === 'Abnormal') {$('#pf-telinga-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_telinga !== null) { $('#ket-pf-telinga-kebidanan').val(data.ket_pf_telinga)}

        if (data.pf_leher === 'Normal') {$('#pf-leher-kebidanan-tidak').prop('checked', true)}
        if (data.pf_leher === 'Abnormal') {$('#pf-leher-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_leher !== null) {$('#ket-pf-leher-kebidanan').val(data.ket_pf_leher)}

        if (data.pf_thorax === 'Normal') {$('#pf-thorax-kebidanan-tidak').prop('checked', true) }
        if (data.pf_thorax === 'Abnormal') {$('#pf-thorax-kebidanan-ya').prop('checked', true) }
        if (data.ket_pf_thorax !== null) {$('#ket-pf-thorax-kebidanan').val(data.ket_pf_thorax)}

        if (data.pf_jantung === 'Normal') {$('#pf-jantung-kebidanan-tidak').prop('checked', true)}
        if (data.pf_jantung === 'Abnormal') {$('#pf-jantung-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_jantung !== null) {$('#ket-pf-jantung-kebidanan').val(data.ket_pf_jantung)}

        if (data.pf_paru === 'Normal') {$('#pf-paru-kebidanan-tidak').prop('checked', true)}
        if (data.pf_paru === 'Abnormal') {$('#pf-paru-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_paru !== null) {$('#ket-pf-paru-kebidanan').val(data.ket_pf_paru)}

        if (data.pf_abdomen === 'Normal') {$('#pf-abdomen-kebidanan-tidak').prop('checked', true)}
        if (data.pf_abdomen === 'Abnormal') {$('#pf-abdomen-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_abdomen !== null) {$('#ket-pf-abdomen-kebidanan').val(data.ket_pf_abdomen)}

        if (data.pf_genitalia_anus === 'Normal') {$('#pf-genitalia-kebidanan-tidak').prop('checked', true)}
        if (data.pf_genitalia_anus === 'Abnormal') {$('#pf-genitalia-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_genitalia_anus !== null) {$('#ket-pf-genitalia-kebidanan').val(data.ket_pf_genitalia_anus)}

        if (data.pf_ekstermitas === 'Normal') {$('#pf-ekstermitas-kebidanan-tidak').prop('checked', true)}
        if (data.pf_ekstermitas === 'Abnormal') {$('#pf-ekstermitas-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_ekstermitas !== null) { $('#ket-pf-ekstermitas-kebidanan').val(data.ket_pf_ekstermitas) }

        if (data.pf_kulit === 'Normal') {$('#pf-kulit-kebidanan-tidak').prop('checked', true)}
        if (data.pf_kulit === 'Abnormal') {$('#pf-kulit-kebidanan-ya').prop('checked', true)}
        if (data.ket_pf_kulit !== null) {$('#ket-pf-kulit-kebidanan').val(data.ket_pf_kulit)}


        $('#hasil_laboratorium_bidan ').summernote('code', data.hasil_laboratorium_bidan);
        $('#hasil_radiologi_bidan ').summernote('code', data.hasil_radiologi_bidan);
        $('#hasil_penunjang_lain_bidan ').summernote('code', data.hasil_penunjang_lain_bidan);
        $('#diagnosa_awal_medis_bidan ').summernote('code', data.diagnosa_awal_medis_bidan);
        $('#riwayat_field_bidan ').summernote('code', data.riwayat_field_bidan);

        $('#rd-bidan').val(data.rd_bidan);
        $('#rpp-bidan').val(data.rpp_bidan);
        $('#rt-bidan').val(data.rt_bidan);
        $('#rk-bidan').val(data.rk_bidan);

        // if (data.rp_bidan = null) {  
            const rp_bidan = JSON.parse(data.rp_bidan); 
            if (rp_bidan.rp_bidan_1 !== null) {$('#rk-bidan-1').val(rp_bidan.rp_bidan_1);}
            if (rp_bidan.rp_bidan_2 !== null) { $('#rk-bidan-2').prop('checked', true) }
            if (rp_bidan.rp_bidan_3 !== null) {$('#rk-bidan-3').val(rp_bidan.rp_bidan_3);}
            if (rp_bidan.rp_bidan_4 !== null) {$('#rk-bidan-4').val(rp_bidan.rp_bidan_4);}
            if (rp_bidan.rp_bidan_5 !== null) {$('#rk-bidan-5').val(rp_bidan.rp_bidan_5);}
        // }

        // $('#tanggal_rencana_pulang_anak').val((data.tanggal_rencana_pulang !== null ? datefmysql(data.tanggal_rencana_pulang) : ''));


        $('#tgl-medis-dpjp').val((data.tgl_medis_dpjp !== null ? datetimefmysql(data.tgl_medis_dpjp) : ''));
            if (data.ttd_medis_dpjp !== null) { $('#ttd-medis-dpjp').select2c('readonly', true)}
            $('#ttd-medis-dpjp').val(data.ttd_medis_dpjp);
            $('#s2id_ttd-medis-dpjp a .select2c-chosen').html(data.dpjp);
            if (data.ceklis_dpjp !== null) {
                $('#ceklis-dpjp').hide();
                $('#ceklis_dpjp_verified').show();
            }

        $('#tgl-medis-dokter').val((data.tgl_medis_dokter !== null ? datetimefmysql(data.tgl_medis_dokter) : ''));
            if (data.ttd_medis_dokter !== null) { $('#ttd-medis-dokter').select2c('readonly', true)}
            $('#ttd-medis-dokter').val(data.ttd_medis_dokter);
            $('#s2id_ttd-medis-dokter a .select2c-chosen').html(data.dokter);
            if (data.ceklis_dokter !== null) {
                $('#ceklis-dokter').hide();
                $('#ceklis_dokter_verified').show();
            }
    }
    // SHOW PENGKAJIAN MEDIS AKHIR =====>

    // SHOW HISTORY LOGS KEBIDANAN AWAL
    function showHistoryLogsKebidanan(id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("rawat_inap/api/rawat_inap/get_history_logs_pengkajian_awal_kebidanan") ?>/id_layanan_pendaftaran/' +
                id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#table_kajian_medis_kebidanan tbody').empty();

                $.each(data.kajian_medis_kebidanan_logs, function(i, v) {

                    let html = /* html */ `
                            <tr>
                                <td>${i + 1}</td>
                                <td class="nowrap">${(v.tanggal_ubah_kebidanan !== null ? v.tanggal_ubah_kebidanan : '')}</td>
                                <td class="nowrap">${v.user}</td>
                                <td>${v.keluhan_utama}</td>
                                <td>${v.riwayat_penyakit_sekarang}</td>
                                <td>${v.riwayat_penyakit_terdahulu}</td>
                                <td>${v.pengobatan}</td>
                                <td>${v.riwayat_alergi}</td>
                                <td>${v.hasil_laboratorium_bidan}</td>
                                <td>${v.hasil_radiologi_bidan}</td>
                                <td>${v.hasil_penunjang_lain_bidan}</td>
                                <td>${v.diagnosa_awal_medis_bidan}</td>
                                <td>${v.rd_bidan}</td>
                                <td>${v.rpp_bidan}</td>
                                <td>${v.rt_bidan}</td>
                                <td>${v.rk_bidan}</td>
                            </tr>
                        `;
                    $('#table_kajian_medis_kebidanan tbody').append(html);
                });
                $('#modal_history_logs_kebidanan').modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function konfirmasiSimpanPengkajianAwalKebidananDanKandungan() {
        var stop = false;
        if ($('#waktu-kajian-kebidanan').val() === '') {
            syams_validation('#waktu-kajian-kebidanan', 'Kolom waktu pengkajian harus diisi!');
            $('#bwizard_pengkajian_kebidanan').bwizard('show', '0');
            stop = true;
        }
        if ($('#tanggal-jam-dokter-keb').val() === '') {
            syams_validation('#tanggal-jam-dokter-keb', 'Kolom Tanggal dan Jam pengkajian harus diisi!');
            $('#bwizard_pengkajian_kebidanan').bwizard('show', '0');
            stop = true;
        }
        if ($('#id-bidan').val() === '') {
            syams_validation('#id-bidan', 'Kolom Bidan harus dipilih!');
            $('#bwizard_pengkajian_kebidanan').bwizard('show', '0');
            stop = true;
        }
        if (stop) {
			return false;
		}
        if($('#ttd-bidan').is(":visible")){
			if($('#ttd-bidan').is(":not(:checked)")){
				swalAlert('warning', 'Signature Validation', 'Harap Bidan tanda tangan terlebih dahulu');
				$('#bwizard_pengkajian_kebidanan').bwizard('show', '0');
				return false;
			}
		}
        if($('#ttd-dokter').is(":visible")){
			if($('#ttd-dokter').is(":not(:checked)")){
				swalAlert('warning', 'Signature Validation', 'Harap Dokter tanda tangan terlebih dahulu');
				$('#bwizard_pengkajian_kebidanan').bwizard('show', '0');
				return false;
			}
		}
        var id_kajian_kebidanan = $('#id-kajian-kebidanan').val();
        if (id_kajian_kebidanan) {
            var text = 'Apakah anda yakin ingin mengupdate data ini ?';
            var btnTextConfirmKebidanan = 'Update';
        } else {
            text = 'Apakah anda yakin ingin menyimpan data ini ?';
            btnTextConfirmKebidanan = 'Simpan';
        }
        swal.fire({
            title: 'Konfirmasi ?',
            html: text,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save mr-1"></i>' + btnTextConfirmKebidanan,
            cancelButtonText: '<i class="fas fa-time-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                SimpanPengkajianAwalKebidananDanKandungan();
            }
        })
    }

    function SimpanPengkajianAwalKebidananDanKandungan() {
        var id_layanan_pendaftaran_kebidanan = $('#id_layanan_pendaftaran_kebidanan').val();
        var riwayat_bidan = $('#riwayat_field_bidan').summernote('code');
		var hasil_lab_bidan = $('#hasil_laboratorium_bidan').summernote('code');
		var hasil_rad_bidan = $('#hasil_radiologi_bidan').summernote('code');
		var hasil_pen_lain_bidan = $('#hasil_penunjang_lain_bidan').summernote('code');
		var diag_awal_bidan = $('#diagnosa_awal_medis_bidan').summernote('code');
        $.ajax({
            type: 'POST',
            url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_pengkajian_awal_kebidanan") ?>',
            data: $('#form_pengkajian_awal_kebidanan').serialize() + '&id_layanan_pendaftaran_kebidanan=' + id_layanan_pendaftaran_kebidanan +'&riwayat_bidan=' + riwayat_bidan + '&hasil_lab_bidan=' + hasil_lab_bidan + '&hasil_rad_bidan=' + hasil_rad_bidan + '&hasil_pen_lain_bidan=' + hasil_pen_lain_bidan + '&diag_awal_bidan=' + diag_awal_bidan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                } else {
                    messageCustom(data.message, 'Error');
                }

                $('#modal_pengkajian_kebidanan').modal('hide');
                showListForm($('#id-pendaftaran').val(), $('#id-layanan-pendaftaran-kebidanan').val(), $('#id-pasien-kebidanan').val())
            },
            complete: function(data) {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }

</script>