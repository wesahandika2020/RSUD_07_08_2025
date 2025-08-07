<script>
    $(function() {
        $('#wizard_form_igd').bwizard()

        $('.btn_expand_all').click(function() {
            $('.collapse').addClass('show')
        })

        $('.btn_collapse_all').click(function() {
            $('.collapse').removeClass('show')
        })

        $('#modal_pengkajian_awal_igd_rm').on('hide.bs.modal', function() {
            $('.collapse').removeClass('show')
            $('#form_pengkajian_awal_igd')[0].reset()
            $('.disabled').prop('disabled', true)

            $('#dokter_igd').select2c('readonly', false)
            $('#verifikasi_dpjp').select2c('readonly', false)

            $('#perawat_igd').select2c('readonly', false)
            $('#verifikasi_dpjp_2').select2c('readonly', false)

            // drawpad
            $('.drawpad').show()
            $('#btn_hapus_drawpad').show()
            $('#fisik_img_anathomi').hide()
            $('#fisik_img_anathomi').attr('src', '')
            $('#drawpad_input').val('')
            // end drawpad

            $('#field_terapi_tindakan').summernote('code', '')
            $('#field_catatan_khusus').summernote('code', '')

            $('#id_kajian_medis, #id_kajian_keperawatan, #id-kajian-triase').val('')
            $('#bangsal_auto').val('')
            $('#s2id_bangsal_auto a .select2c-chosen').html('')
            $('#dokter_igd').val('')
            $('#s2id_dokter_igd a .select2c-chosen').html('')
            $('#verifikasi_dpjp').val('')
            $('#s2id_verifikasi_dpjp a .select2c-chosen').html('')

            $('#perawat_igd').val('')
            $('#s2id_perawat_igd a .select2c-chosen').html('')
            $('#verifikasi_dpjp_2').val('')
            $('#s2id_verifikasi_dpjp_2 a .select2c-chosen').html('')

            $('#ttd_dokter_igd').show()
            $('#ttd_dokter_igd_verified').hide()
            $('#ttd_verifikasi_dpjp').show()
            $('#ttd_verifikasi_dpjp_verified').hide()

            $('#ttd_perawat_igdGDG').show()
            $('#ttd_perawat_igd_verified').hide()
            $('#ttd_verifikasi_dpjp_2').show()
            $('#ttd_verifikasi_dpjp_2_verified').hide()

            // WH8
            $('#pk-perawat-igd').select2c('readonly', false)
            $('#pk-dokter-igd').select2c('readonly', false)

            $('#pk-perawat-igd').val('')
            $('#s2id_pk-perawat-igd a .select2c-chosen').html('')
            $('#pk-dokter-igd').val('')
            $('#s2id_pk-dokter-igd a .select2c-chosen').html('')

            $('#ttd-perawat-igd').show()
            $('#ttd_perawat_dpjp_igd_verified').hide()
            $('#ttd-dokter-dpjp-igd').show()
            $('#ttd_dokter_dpjp_igd_verified').hide()
        })

        // WH1
        $('#waktu_kajian, #waktu-kajian-igd, #tanggal-perawat-igd, #tanggal-dokter-igd').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false
                }
            }
        })

        // WH2
        $('#asesment-triage-10')
            .on('click', function() {
                $(this).timepicker({
                    format: 'HH:mm',
                    showInputs: false,
                    showMeridian: false
                });
            })


        $('#rpt_lain').click(function() {
            if ($(this).is(':checked')) {
                $('#rpt_lain_input').prop('disabled', false)
            } else {
                $('#rpt_lain_input').val('').prop('disabled', true)
            }
        })

        $('#rpk_lain_lain').click(function() {
            if ($(this).is(':checked')) {
                $('#rpk_lain_input').prop('disabled', false)
            } else {
                $('#rpk_lain_input').val('').prop('disabled', true)
            }
        })

        $('[name="alergi"]').change(function() {
            if ($(this).val() == '1') {
                $('#alergi_input').prop('disabled', false)
                $('#reaksi_alergi_input').prop('disabled', false)
            } else {
                $('#alergi_input').val('').prop('disabled', true)
                $('#reaksi_alergi_input').val('').prop('disabled', true)
            }
        })

        $('#ptn_lain').click(function() {
            if ($(this).is(':checked')) {
                $('#ptn_lain_input').prop('disabled', false)
            } else {
                $('#ptn_lain_input').val('').prop('disabled', true)
            }
        })

        $('#lab_lain').click(function() {
            if ($(this).is(':checked')) {
                $('#lab_lain_input').prop('disabled', false)
            } else {
                $('#lab_lain_input').val('').prop('disabled', true)
            }
        })

        $('#xray_lain').click(function() {
            if ($(this).is(':checked')) {
                $('#xray_lain_input').prop('disabled', false)
            } else {
                $('#xray_lain_input').val('').prop('disabled', true)
            }
        })

        $('[name="ekg"]').change(function() {
            if ($(this).val() == '1') {
                $('#ket_ekg').prop('disabled', false)
            } else {
                $('#ket_ekg').val('').prop('disabled', true)
            }
        })

        $('[name="dipulangkan"]').change(function() {
            if ($(this).val() == '1') {
                $('#ket_dipulangkan').prop('disabled', false)
            } else {
                $('#ket_dipulangkan').val('').prop('disabled', true)
            }
        })

        // Pengkajian Keperawatan
        $('#informasi_dari_lain').click(function() {
            if ($(this).is(":checked")) {
                $('#informasi_dari_lain_input').prop('disabled', false)
            } else {
                $('#informasi_dari_lain_input').val('').prop('disabled', true)
            }
        })

        $('#rpt_keperawatan_lain').click(function() {
            if ($(this).is(":checked")) {
                $('#rpt_keperawatan_lain_input').prop('disabled', false)
            } else {
                $('#rpt_keperawatan_lain_input').val('').prop('disabled', true)
            }
        })

        $('#rpk_keperawatan_lain').click(function() {
            if ($(this).is(":checked")) {
                $('#rpk_keperawatan_lain_input').prop('disabled', false)
            } else {
                $('#rpk_keperawatan_lain_input').val('').prop('disabled', true)
            }
        })

        $('#sps_lain').click(function() {
            if ($(this).is(":checked")) {
                $('#sps_lain_input').prop('disabled', false)
            } else {
                $('#sps_lain_input').val('').prop('disabled', true)
            }
        })

        $('#smen_ada_masalah').click(function() {
            if ($(this).is(":checked")) {
                $('#smen_ada_masalah_input').prop('disabled', false)
            } else {
                $('#smen_ada_masalah_input').val('').prop('disabled', true)
            }
        })

        $('#alat_bantu_jalan_1').click(function() {
            if ($(this).is(":checked")) {
                $('#alat_bantu_jalan_1_ya').prop('disabled', false)
                $('#alat_bantu_jalan_1_ya').prop('checked', true).change()
            } else {
                $('#alat_bantu_jalan_1_ya').prop('checked', false).change()
                $('#alat_bantu_jalan_1_ya').prop('disabled', true)
            }
        })

        $('#alat_bantu_jalan_2').click(function() {
            if ($(this).is(":checked")) {
                $('#alat_bantu_jalan_2_ya').prop('disabled', false)
                $('#alat_bantu_jalan_2_ya').prop('checked', true).change()
            } else {
                $('#alat_bantu_jalan_2_ya').prop('checked', false).change()
                $('#alat_bantu_jalan_2_ya').prop('disabled', true)
            }
        })

        $('#alat_bantu_jalan_3').click(function() {
            if ($(this).is(":checked")) {
                $('#alat_bantu_jalan_3_ya').prop('disabled', false)
                $('#alat_bantu_jalan_3_ya').prop('checked', true).change()
            } else {
                $('#alat_bantu_jalan_3_ya').prop('checked', false).change()
                $('#alat_bantu_jalan_3_ya').prop('disabled', true)
            }
        })

        $('#cara_berjalan_1').click(function() {
            if ($(this).is(":checked")) {
                $('#cara_berjalan_1_ya').prop('disabled', false)
                $('#cara_berjalan_1_ya').prop('checked', true).change()
            } else {
                $('#cara_berjalan_1_ya').prop('checked', false).change()
                $('#cara_berjalan_1_ya').prop('disabled', true)
            }
        })

        $('#cara_berjalan_2').click(function() {
            if ($(this).is(":checked")) {
                $('#cara_berjalan_2_ya').prop('disabled', false)
                $('#cara_berjalan_2_ya').prop('checked', true).change()
            } else {
                $('#cara_berjalan_2_ya').prop('checked', false).change()
                $('#cara_berjalan_2_ya').prop('disabled', true)
            }
        })

        $('#cara_berjalan_3').click(function() {
            if ($(this).is(":checked")) {
                $('#cara_berjalan_3_ya').prop('disabled', false)
                $('#cara_berjalan_3_ya').prop('checked', true).change()
            } else {
                $('#cara_berjalan_3_ya').prop('checked', false).change()
                $('#cara_berjalan_3_ya').prop('disabled', true)
            }
        })

        $('#status_mental_1').click(function() {
            if ($(this).is(":checked")) {
                $('#status_mental_1_ya').prop('disabled', false)
                $('#status_mental_1_ya').prop('checked', true).change()
            } else {
                $('#status_mental_1_ya').prop('checked', false).change()
                $('#status_mental_1_ya').prop('disabled', true)
            }
        })

        $('#status_mental_2').click(function() {
            if ($(this).is(":checked")) {
                $('#status_mental_2_ya').prop('disabled', false)
                $('#status_mental_2_ya').prop('checked', true).change()
            } else {
                $('#status_mental_2_ya').prop('checked', false).change()
                $('#status_mental_2_ya').prop('disabled', true)
            }
        })

        $('input[name="prjl_riwayat_jatuh"]').change(function() {
            if ($(this).val() == '0') {
                $('input[name="prjl_riwayat_jatuh_opt"]').prop('disabled', false)
            } else {
                $('#prjl_riwayat_jatuh_opt_tidak').prop('checked', true).change()
                $('input[name="prjl_riwayat_jatuh_opt"]').prop('disabled', true)
            }
        })

        // WH3
        // CARA DATANG PASIEN AWAL
        // $('#cara-datang-pasien-igd-4').click(function() {
        //     if ($(this).is(":checked")) {
        //         $('#cara-datang-pasien-igd-5').prop('disabled', false);
        //     } else {
        //         $('#cara-datang-pasien-igd-5').val('');
        //         $('#cara-datang-pasien-igd-5').prop('disabled', true);
        //     }
        // });


        // $('#cara-datang-pasien-igd-9').click(function() {
        //     if ($(this).is(":checked")) {
        //         $('#cara-datang-pasien-igd-10').prop('disabled', false);
        //     } else {
        //         $('#cara-datang-pasien-igd-10').val('');
        //         $('#cara-datang-pasien-igd-10').prop('disabled', true);
        //     }
        // });

        // $('#cara-datang-pasien-igd-11').click(function() {
        //     if ($(this).is(":checked")) {
        //         $('#cara-datang-pasien-igd-12').prop('disabled', false);
        //     } else {
        //         $('#cara-datang-pasien-igd-12').val('');
        //         $('#cara-datang-pasien-igd-12').prop('disabled', true);
        //     }
        // });


        $('#cara-datang-pasien-igd-4').click(function() {
            // Tidak ada pengondisian, hanya memastikan #cara-datang-pasien-igd-5 aktif
            $('#cara-datang-pasien-igd-5').prop('readonly', false);
        });
        $('#cara-datang-pasien-igd-9').click(function() {
            // Tidak ada pengondisian, hanya memastikan #cara-datang-pasien-igd-5 aktif
            $('#cara-datang-pasien-igd-10').prop('readonly', false);
        });
        $('#cara-datang-pasien-igd-11').click(function() {
            // Tidak ada pengondisian, hanya memastikan #cara-datang-pasien-igd-5 aktif
            $('#cara-datang-pasien-igd-12').prop('readonly', false);
        });


        // CARA DATANG PASIEN AKHIR
    
        // ASESMENT TRIAGE AWAL  
        // $('#asesment-triage-6').click(function() {
        //     if ($(this).is(":checked")) {
        //         $('#asesment-triage-7').prop('disabled', false);
        //     } else {
        //         $('#asesment-triage-7').val('');
        //         $('#asesment-triage-7').prop('disabled', true);
        //     }
        //     if ($(this).is(":checked")) {
        //         $('#asesment-triage-8').prop('disabled', false);
        //     } else {
        //         $('#asesment-triage-8').val('');
        //         $('#asesment-triage-8').prop('disabled', true);
        //     }
        //     if ($(this).is(":checked")) {
        //         $('#asesment-triage-9').prop('disabled', false);
        //     } else {
        //         $('#asesment-triage-9').val('');
        //         $('#asesment-triage-9').prop('disabled', true);
        //     }
        //     if ($(this).is(":checked")) {
        //         $('#asesment-triage-10').prop('disabled', false);
        //     } else {
        //         $('#asesment-triage-10').val('');
        //         $('#asesment-triage-10').prop('disabled', true);
        //     }
        // });


        // $('#asesment-triage-6').click(function() {
        //     // Tidak ada pengondisian, hanya memastikan #cara-datang-pasien-igd-5 aktif
        //     $('#asesment-triage-7, #asesment-triage-8, #asesment-triage-9, #asesment-triage-10').prop('readonly', false);
        // });

        $('#asesment-triage-6').click(function() {
            // Pastikan elemen-elemen target ada sebelum mengatur properti
            if ($('#asesment-triage-7').length &&
                $('#asesment-triage-8').length &&
                $('#asesment-triage-9').length &&
                $('#asesment-triage-10').length) {
                
                // Mengatur properti readonly menjadi false untuk elemen-elemen target
                $('#asesment-triage-7, #asesment-triage-8, #asesment-triage-9, #asesment-triage-10').prop('readonly', false);
            } else {
                console.error("Beberapa elemen tidak ditemukan di DOM");
            }
        });

        // ASESMENT TRIAGE AKHIR

        // rumus hitung skala early warning system 
        $('.skalanews').change(function() {
            hitungSkalaEarlyNews()
        })

        $('.calsneuk').change(function() {
            hitungSkalaEarlyNeonatal()
        })

        $('.skalapews').change(function() {
            hitungSkalaEarlyPews()
        })

        $('input[name="wajib_ibadah"]').change(function() {
            if ($(this).val() == 'Halangan') {
                $('#wajib_ibadah_halangan_input').prop('disabled', false)
            } else {
                $('#wajib_ibadah_halangan_input').prop('disabled', true)
                $('#wajib_ibadah_halangan_input').val('')
            }
        })

        $('#masalah_keperawatan_30').click(function() {
            if ($(this).is(":checked")) {
                $('#masalah_keperawatan_lain_input').prop('disabled', false)
            } else {
                $('#masalah_keperawatan_lain_input').val('').prop('disabled', true)
            }
        })

        $('.calcscoreprja').change(function() {
            var score = parseInt(0)
            for (let i = 0; i < $('.calcscoreprja').length; i++) {
                if ($('.calcscoreprja_' + i).is(":checked")) {
                    score += parseInt($('.calcscoreprja_' + i).val())
                }
            }
            $('#prja_jumlah_skor').val(score)
        })
        // END Pengkajian Keperawatan

        $('.drawpad').jqSignature({
            lineWidth: 1.5,
            width: 361,
            height: 434,
        })

        // untuk drawpad
        var lengthSignature = $('.drawpad').length;
        for (let i = 0; i < lengthSignature; i++) {
            $('.drawpad').eq(i).on('jq.signature.changed', function() {
                var dataUrl = $('.drawpad').eq(i).jqSignature('getDataURL')
                $('#drawpad_input').val(dataUrl)
            })
        }

        // neonatus
        $('.neonatus').change(function() {
            var total = parseInt(0)
            for (let index = 0; index < $('.neonatus').length; index++) {
                var val = parseInt(0)
                if ($('.neo_' + index).is(":checked")) {
                    val = $('.neo_' + index).val()
                }

                total = total + parseInt(val)
            }

            $('#total_neonatus').val(total)
        })

        // TOO0
        // flacc
        $('.flacc').change(function() {
            var id = $(this).attr('id')
            var value = parseFloat($('#' + id).val())
            var split = id.split('_')
            var id_nilai = split[0] + '_' + split[1];
            $('#nilai_' + id_nilai).val(value)

            var total = parseFloat(0)
            for (let index = 0; index < $('.sub_total_nilai_flacc').length; index++) {
                if ($('.sub_total_nilai_flacc_' + index).val() == '') {
                    var sub_total = parseFloat(0)
                } else {
                    sub_total = parseFloat($('.sub_total_nilai_flacc_' + index).val())
                }

                total = total + sub_total;
            }

            $('#total_nilai_flacc').val(total)
        })

        // GCSWK
        $('.gcswK').on('keyup', function() {
            let sum = 0
            $('.gcswK').each(function() {
                sum += Number($(this).val());
            });
            $('#gcs-tottal').val(sum);
        })


        // DEPAN WH
        $('.gcswKWH').on('keyup', function() {
            let sum = 0
            $('.gcswKWH').each(function() {
                sum += Number($(this).val());
            });
            $('#gcs-total-igd').val(sum);
        })

        $('#field_terapi_tindakan, #field_catatan_khusus').summernote({
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
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData)
                        .getData('Text')

                    e.preventDefault()

                    // Firefox fix
                    setTimeout(function() {
                        document.execCommand('insertText', false, bufferText)
                    }, 10)
                }
            }
        })

        $('#bangsal_auto').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/bangsal_auto') ?>",
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
                        .total; 

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    }
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.nama + '</b><br/>' + data.kode;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })

        $('#dokter_igd').select2c({
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
                        .total; 

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
        })

        // WH6
        $('#verifikasi_dpjp, #verifikasi_dpjp_2, #pk-dokter-igd').select2c({
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
            // formatSelection: function(data) {
            //     $('#verifikasi_dpjp_2').val(data.id)
            //     $('#s2id_verifikasi_dpjp_2 a .select2c-chosen').html(data.nama)

            //     return data.nama;
            // }
        })

        // WH7
        $('#perawat_igd, #pk-perawat-igd').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
        })

        $('.select2c-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this)
            }
        })

        $('.disabled').prop('disabled', true)

        $('#ttd_verifikasi_dpjp').click(function() {
            if ($(this).is(':checked')) {
                $('#ttd_verifikasi_dpjp_2').prop('checked', true)
            }
        })

        // PIM        
        $('#pm-waktu-kajian, #pm-waktu-kontraksi, #pm-waktu-bidan, #pm-waktu-dpjp').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false
                }
            }
        })

        $('#pm-waktu-partus-1, #pm-waktu-partus-2, #pm-waktu-partus-3, #pm-waktu-partus-4, #pm-waktu-partus-5, #pm-waktu-partus-6, #pm-tanggal-lab, #pm-tanggal-cgt').datetimepicker({
            format: 'DD/MM/YYYY',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false
                }
            }
        })


        $('#pm-waktu-lendir, #pm-waktu-ketuban, #pm-waktu-makan, #pm-waktu-minum, #pm-waktu-bak, #pm-waktu-bab').datetimepicker({
            format: 'HH:mm',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $('[name="pm_diperoleh"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-diperoleh-sebutkan').prop('disabled', false)
            } else {
                $('#pm-diperoleh-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-kontraksi').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-waktu-kontraksi').prop('disabled', false)
            } else {
                $('#pm-waktu-kontraksi').val('').prop('disabled', true)
            }
        })

        $('#pm-lendir').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-waktu-lendir').prop('disabled', false)
            } else {
                $('#pm-waktu-lendir').val('').prop('disabled', true)
            }
        })

        $('#pm-ketuban').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-waktu-ketuban, #pm-warna-ketuban').prop('disabled', false)
            } else {
                $('#pm-waktu-ketuban, #pm-warna-ketuban').val('').prop('disabled', true)
            }
        })

        $('#pm-darah').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-darah-sebutkan').prop('disabled', false)
            } else {
                $('#pm-darah-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-lainnya').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-lainnya-sebutkan').prop('disabled', false)
            } else {
                $('#pm-lainnya-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-hamil-muda-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-hamil-muda-sebutkan').prop('disabled', false);
            } else {
                $('#pm-hamil-muda-sebutkan').val('');
                $('#pm-hamil-muda-sebutkan').prop('disabled', true);
            }
        });

        $('#pm-hamil-tua-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-hamil-tua-sebutkan').prop('disabled', false);
            } else {
                $('#pm-hamil-tua-sebutkan').val('');
                $('#pm-hamil-tua-sebutkan').prop('disabled', true);
            }
        });

        $('#pm-umur-menarche').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-umur-menarche-sebutkan, #pm-lama-haid, #pm-pembalut').prop('disabled', false)
            } else {
                $('#pm-umur-menarche-sebutkan, #pm-lama-haid, #pm-pembalut').val('').prop('disabled', true)
            }
        })

        $('#pm-penyakit-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-penyakit-sebutkan').prop('disabled', false)
            } else {
                $('#pm-penyakit-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-luka-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-luka-sebutkan').prop('disabled', false)
            } else {
                $('#pm-luka-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-leopold-1-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-leopold-1-sebutkan').prop('disabled', false);
            } else {
                $('#pm-leopold-1-sebutkan').val('');
                $('#pm-leopold-1-sebutkan').prop('disabled', true);
            }
        });

        $('#pm-leopold-2-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-leopold-2-sebutkan').prop('disabled', false);
            } else {
                $('#pm-leopold-2-sebutkan').val('');
                $('#pm-leopold-2-sebutkan').prop('disabled', true);
            }
        });

        $('#pm-leopold-3-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-leopold-3-sebutkan').prop('disabled', false);
            } else {
                $('#pm-leopold-3-sebutkan').val('');
                $('#pm-leopold-3-sebutkan').prop('disabled', true);
            }
        });

        $('[name="pm_vulva"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-vulva-sebutkan').prop('disabled', false)
            } else {
                $('#pm-vulva-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-pengeluaran-ketuban').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-pengeluaran-ketuban-warna').prop('disabled', false)
            } else {
                $('#pm-pengeluaran-ketuban-warna').val('').prop('disabled', true)
            }
        })

        $('#pm-pengeluaran-darah').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-pengeluaran-darah-sebanyak').prop('disabled', false)
            } else {
                $('#pm-pengeluaran-darah-sebanyak').val('').prop('disabled', true)
            }
        })

        $('#pm-pengeluaran-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-pengeluaran-sebutkan').prop('disabled', false)
            } else {
                $('#pm-pengeluaran-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_introitus"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-introitus-sebutkan').prop('disabled', false)
            } else {
                $('#pm-introitus-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_porsio"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-porsio-sebutkan').prop('disabled', false)
            } else {
                $('#pm-porsio-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_pembukaan_ketuban"]').change(function() {
            if ($(this).val() == '1') {
                $('#pm-pembukaan-ketuban-warna').prop('disabled', false)
            } else {
                $('#pm-pembukaan-ketuban-warna').val('').prop('disabled', true)
            }
        })

        $('#pm-kursi-roda').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-kursi-roda-ya').prop('disabled', false);
                $('#pm-kursi-roda-ya').prop('checked', true).change();
            } else {
                $('#pm-kursi-roda-ya').prop('checked', false).change();;
                $('#pm-kursi-roda-ya').prop('disabled', true);
            }
        });

        $('#pm-kruk').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-kruk-ya').prop('disabled', false);
                $('#pm-kruk-ya').prop('checked', true).change();
            } else {
                $('#pm-kruk-ya').prop('checked', false).change();;
                $('#pm-kruk-ya').prop('disabled', true);
            }
        });

        $('#pm-pegangan').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-pegangan-ya').prop('disabled', false);
                $('#pm-pegangan-ya').prop('checked', true).change();
            } else {
                $('#pm-pegangan-ya').prop('checked', false).change();;
                $('#pm-pegangan-ya').prop('disabled', true);
            }
        });

        $('#pm-imobilisasi').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-imobilisasi-ya').prop('disabled', false);
                $('#pm-imobilisasi-ya').prop('checked', true).change();
            } else {
                $('#pm-imobilisasi-ya').prop('checked', false).change();;
                $('#pm-imobilisasi-ya').prop('disabled', true);
            }
        });


        $('#pm-lemah').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-lemah-ya').prop('disabled', false);
                $('#pm-lemah-ya').prop('checked', true).change();
            } else {
                $('#pm-lemah-ya').prop('checked', false).change();;
                $('#pm-lemah-ya').prop('disabled', true);
            }
        });


        $('#pm-terganggu').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-terganggu-ya').prop('disabled', false);
                $('#pm-terganggu-ya').prop('checked', true).change();
            } else {
                $('#pm-terganggu-ya').prop('checked', false).change();;
                $('#pm-terganggu-ya').prop('disabled', true);
            }
        });


        $('#pm-kemampuan').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-kemampuan-ya').prop('disabled', false);
                $('#pm-kemampuan-ya').prop('checked', true).change();
            } else {
                $('#pm-kemampuan-ya').prop('checked', false).change();;
                $('#pm-kemampuan-ya').prop('disabled', true);
            }
        });

        $('#pm-lupa').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-lupa-ya').prop('disabled', false);
                $('#pm-lupa-ya').prop('checked', true).change();
            } else {
                $('#pm-lupa-ya').prop('checked', false).change();;
                $('#pm-lupa-ya').prop('disabled', true);
            }
        });

        $('[name="pm_alergi"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-alergi-obat, #pm-alergi-makan, #pm-alergi-obat-reaksi, #pm-alergi-makan-reaksi, #pm-alergi-lain, #pm-alergi-lain-reaksi').prop('disabled', false)
            } else {
                $('#pm-alergi-obat, #pm-alergi-makan, #pm-alergi-obat-reaksi, #pm-alergi-makan-reaksi, #pm-alergi-lain, #pm-alergi-lain-reaksi').val('').prop('disabled', true)
            }
        })

        $('[name="pm_berat_badan"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-berat-badan-kg').prop('disabled', false)
            } else {
                $('#pm-berat-badan-kg').val('').prop('disabled', true)
            }
        })

        $('#pm-berat-badan-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-berat-badan-sebutkan').prop('disabled', false);
            } else {
                $('#pm-berat-badan-sebutkan').val('');
                $('#pm-berat-badan-sebutkan').prop('disabled', true);
            }
        });

        $('[name="pm_fungsional"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-fungsional-sebutkan').prop('disabled', false)
            } else {
                $('#pm-fungsional-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_psikologis"]').change(function() {
            if ($(this).val() == '6') {
                $('#pm-psikologis-sebutkan').prop('disabled', false)
            } else {
                $('#pm-psikologis-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_mental"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-mental-sebutkan').prop('disabled', false)
            } else {
                $('#pm-mental-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_bayar"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-bayar-asuransi').prop('disabled', false)
            } else {
                $('#pm-bayar-asuransi').val('').prop('disabled', true)
            }
        })

        $('#pm-bayar-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-bayar-sebutkan').prop('disabled', false);
            } else {
                $('#pm-bayar-sebutkan').val('');
                $('#pm-bayar-sebutkan').prop('disabled', true);
            }
        });

        $('[name="pm_ibadah"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-ibadah-sebutkan').prop('disabled', false)
            } else {
                $('#pm-ibadah-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-kebutuhan-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-kebutuhan-sebutkan').prop('disabled', false)
            } else {
                $('#pm-kebutuhan-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-asuhan-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-asuhan-sebutkan').prop('disabled', false)
            } else {
                $('#pm-asuhan-sebutkan').val('').prop('disabled', true)
            }
        })

        $('.cgs').on('keyup', function() {
            let sum = 0
            $('.cgs').each(function() {
                sum += Number($(this).val());
            });
            $('#pm-cgs-total').val(sum);
        })

        // SKALA EARLY WARNING MEOWS & NEWS
        $('.skalameowst').change(function() {
            hitungSkalaEarlyMeowst()
        })

        $('.skalanewso').change(function() {
            hitungSkalaEarlyNewso()
        })


        $('#pm-bidan').select2c({
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
        })

        $('#pm-dpjp').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
        })
    })

    function resetFormPengkajianAwalIGD() {
        $('.collapse').removeClass('show')
        $('#form_pengkajian_awal_igd')[0].reset()
        $('.disabled').prop('disabled', true)

        $('#dokter_igd').select2c('readonly', false)
        $('#verifikasi_dpjp').select2c('readonly', false)

        $('#perawat_igd').select2c('readonly', false)
        $('#verifikasi_dpjp_2').select2c('readonly', false)


        // drawpad
        $('.drawpad').show()
        $('#btn_hapus_drawpad').show()
        $('#fisik_img_anathomi').hide()
        $('#fisik_img_anathomi').attr('src', '')
        $('#drawpad_input').val('')
        // end drawpad

        $('#field_terapi_tindakan').summernote('code', '')
        $('#field_catatan_khusus').summernote('code', '')

        $('#id_kajian_medis, #id_kajian_keperawatan, #id-kajian-triase').val('')
        $('#bangsal_auto').val('')
        $('#s2id_bangsal_auto a .select2c-chosen').html('')
        $('#dokter_igd').val('')
        $('#s2id_dokter_igd a .select2c-chosen').html('')
        $('#verifikasi_dpjp').val('')
        $('#s2id_verifikasi_dpjp a .select2c-chosen').html('')

        $('#perawat_igd').val('')
        $('#s2id_perawat_igd a .select2c-chosen').html('')
        $('#verifikasi_dpjp_2').val('')
        $('#s2id_verifikasi_dpjp_2 a .select2c-chosen').html('')

        $('#ttd_dokter_igd').show()
        $('#ttd_dokter_igd_verified').hide()
        $('#ttd_verifikasi_dpjp').show()
        $('#ttd_verifikasi_dpjp_verified').hide()

        $('#ttd_perawat_igdGDG').show()
        $('#ttd_perawat_igd_verified').hide()
        $('#ttd_verifikasi_dpjp_2').show()
        $('#ttd_verifikasi_dpjp_2_verified').hide()

        // WH8
        $('#pk-perawat-igd').select2c('readonly', false)
        $('#pk-dokter-igd').select2c('readonly', false)

        $('#pk-perawat-igd').val('')
        $('#s2id_pk-perawat-igd a .select2c-chosen').html('')
        $('#pk-dokter-igd').val('')
        $('#s2id_pk-dokter-igd a .select2c-chosen').html('')

        $('#ttd-perawat-igd').show()
        $('#ttd_perawat_dpjp_igd_verified').hide()
        $('#ttd-dokter-dpjp-igd').show()
        $('#ttd_dokter_dpjp_igd_verified').hide()
    }

    function lihatFORM_KEP_26_04(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let action = 'lihat';

        entriPengkajianAwalIGD(layanan.id_pendaftaran, layanan.id, action);
    }

    function editFORM_KEP_26_04(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let action = 'edit';

        entriPengkajianAwalIGD(layanan.id_pendaftaran, layanan.id, action);
    }

    function tambahFORM_KEP_26_04(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let action = 'tambah';

        entriPengkajianAwalIGD(layanan.id_pendaftaran, layanan.id, action);
    }

    function entriPengkajianAwalIGD(id_pendaftaran, id_layanan_pendaftaran, action) {
        $('#wizard_form_igd').bwizard('show', '0');
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
            url: '<?= base_url("pemeriksaan_igd/api/pemeriksaan_igd/get_data_pengkajian_awal_igd") ?>/id/' +
                id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                // console.log(data);
                resetFormPengkajianAwalIGD()
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id_pendaftaran').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id_pasien').val(data.pasien.id_pasien)
                    $('#pa_pasien_nama').text(data.pasien.nama)
                    $('#pa_pasien_no_rm').text(data.pasien.no_rm)
                    $('#pa_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data
                    .pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +
                    ')'))
                    $('#pa_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :
                    'Perempuan'))
                }

                if (data.pasien.pendidikan !== '') {
                    $('#pendidikan_pasien').val(data.pasien.pendidikan)
                }

                // if (data.pasien.pekerjaan !== '') {
                //     $('#pekerjaan_pasien').val(data.pasien.pekerjaan)
                // }

                // $('#cara_bayar_pasien').val((data.layanan.cara_bayar === 'Tunai' ? data.layanan.cara_bayar :
                //     data.layanan.cara_bayar + ' (' + data.layanan.penjamin + ')'))

                // TPIGD
                if (data.kajian_triase != null) {  
                    $('#btn_cetak').show();  // Menampilkan tombol cetak
                    $('#btn_cetak').on('click', function() {
                        konfirmasiCetakTPIGD(id_pendaftaran, id_layanan_pendaftaran);  // Fungsi ini hanya dipanggil setelah tombol diklik
                    });
                    showKajianTriase(data.kajian_triase);  // Menampilkan kajian triase
                }
                
                if (data.kajian_medis != null) {
                    showKajianMedis(data.kajian_medis)
                }

                if (data.kajian_keperawatan != null) {
                    showKajianKeperawatan(data.kajian_keperawatan)
                }

                // PIM
                if (data.maternal != null) {
                    showKajianMaternal(data.maternal)
                }

                $('#modal_pengkajian_awal_igd_rm').modal('show')
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status)
            },
        })
    }

    // TPIGD
    function konfirmasiCetakTPIGD(id_pendaftaran, id_layanan_pendaftaran){
        window.open('<?= base_url('pendaftaran_igd/cetak_triase_pasien_gawat_darurat/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran,
        'Cetak TriasePasien Instalasi Gawat Darurat', 'width=' + dWidth + ', height=' +
        dHeight +
        ', left=' + x + ', top=' + y);
    }

    function simpanPengkajianAwalIGD() {
        var terapi_tindakan = $('#field_terapi_tindakan').summernote('code')
        var catatan_khusus = $('#field_catatan_khusus').summernote('code')
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pemeriksaan_igd/api/pemeriksaan_igd/simpan_pengkajian_awal_igd") ?>',
            data: $('#form_pengkajian_awal_igd').serialize() + '&terapi_tindakan=' + terapi_tindakan +
                '&catatan_khusus=' + catatan_khusus,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success')
                } else {
                    messageCustom(data.message, 'Error')
                }
                
                $('#modal_pengkajian_awal_igd_rm').modal('hide')
                showListForm($('#id_pendaftaran').val(), $('#id_layanan_pendaftaran').val(), $('#id_pasien').val())
            },
            complete: function(data) {
                hideLoader()
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error')
            }
        })
    }

    // TRIASE AWAL WH10
    function showKajianTriase(data) {
        $('#id-kajian-triase').val(data.id)
        // console.log(data.id);
        $('#waktu-kajian-igd').val((data.waktu_igd !== null ? datetimefmysql(data.waktu_igd) : ''))
        $('#tanggal-perawat-igd').val((data.tgl_jam_perawat !== null ?datetimefmysql(data.tgl_jam_perawat) : '<?= date('d/m/Y H:i:s') ?>'));
        // $('#tanggal-dokter-igd').val((data.tgl_jam_dokter !== null ?datetimefmysql(data.tgl_jam_dokter) : '<!?= date('d/m/Y H:i:s') ?>'));

        // CARA DATANG PASIEN AWAL
        const cara_datang_pasien_igd = JSON.parse(data.cara_datang_pasien_igd);
        if (cara_datang_pasien_igd.cara_datang_pasien_igd_1 !== null) {
            $('#cara-datang-pasien-igd-1').prop('checked', true)
        }

        if (cara_datang_pasien_igd.cara_datang_pasien_igd_2 !== null) {
            $('#cara-datang-pasien-igd-2').prop('checked', true)
        }
        if (cara_datang_pasien_igd.cara_datang_pasien_igd_3 !== null) {
            $('#cara-datang-pasien-igd-3').prop('checked', true)
        }
        if (cara_datang_pasien_igd.cara_datang_pasien_igd_4 !== null) {
            $('#cara-datang-pasien-igd-4').prop('checked', true)
        }

        if (cara_datang_pasien_igd.cara_datang_pasien_igd_5 !== null) {
            $('#cara-datang-pasien-igd-5').val(cara_datang_pasien_igd.cara_datang_pasien_igd_5);
        }

        if (cara_datang_pasien_igd.cara_datang_pasien_igd_6 !== null) {
            $('#cara-datang-pasien-igd-6').prop('checked', true)
        }
        if (cara_datang_pasien_igd.cara_datang_pasien_igd_7 !== null) {
            $('#cara-datang-pasien-igd-7').prop('checked', true)
        }
        if (cara_datang_pasien_igd.cara_datang_pasien_igd_8 !== null) {
            $('#cara-datang-pasien-igd-8').prop('checked', true)
        }
        if (cara_datang_pasien_igd.cara_datang_pasien_igd_9 !== null) {
            $('#cara-datang-pasien-igd-9').prop('checked', true)
        }

        if (cara_datang_pasien_igd.cara_datang_pasien_igd_10 !== null) {
            $('#cara-datang-pasien-igd-10').val(cara_datang_pasien_igd.cara_datang_pasien_igd_10);
        }

        if (cara_datang_pasien_igd.cara_datang_pasien_igd_11 !== null) {
            $('#cara-datang-pasien-igd-11').prop('checked', true)
        }
        if (cara_datang_pasien_igd.cara_datang_pasien_igd_12 !== null) {
            $('#cara-datang-pasien-igd-12').val(cara_datang_pasien_igd.cara_datang_pasien_igd_12);
        }
        // CARA DATANG PASIEN AKHIR

        // 1. PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL AWAL
        const kesadaran_igd = JSON.parse(data.kesadaran_igd);
        if (kesadaran_igd.kesadaran_igd_1 !== null) {
            $('#kesadaran-igd-1').prop('checked', true)
        }
        if (kesadaran_igd.kesadaran_igd_2 !== null) {
            $('#kesadaran-igd-2').prop('checked', true)
        }
        if (kesadaran_igd.kesadaran_igd_3 !== null) {
            $('#kesadaran-igd-3').prop('checked', true)
        }
        if (kesadaran_igd.kesadaran_igd_4 !== null) {
            $('#kesadaran-igd-4').prop('checked', true)
        }
        if (kesadaran_igd.kesadaran_igd_5 !== null) {
            $('#kesadaran-igd-5').prop('checked', true)
        }
        // ======

        $('#gcs-e-igd').val(data.gcs_e_igd);
        $('#gcs-m-igd').val(data.gcs_m_igd);
        $('#gcs-v-igd').val(data.gcs_v_igd);
        $('#gcs-total-igd').val(data.gcs_total_igd);



        const tekanan_darah_igd = JSON.parse(data.tekanan_darah_igd);
        if (tekanan_darah_igd.tekanan_darah_igd_1 !== null) {
            $('#tekanan-darah-igd-1').val(tekanan_darah_igd.tekanan_darah_igd_1);
        }
        if (tekanan_darah_igd.tekanan_darah_igd_2 !== null) {
            $('#tekanan-darah-igd-2').val(tekanan_darah_igd.tekanan_darah_igd_2);
        }
        if (tekanan_darah_igd.tekanan_darah_igd_3 !== null) {
            $('#tekanan-darah-igd-3').val(tekanan_darah_igd.tekanan_darah_igd_3);
        }



        const frekuensi_nadi_igd = JSON.parse(data.frekuensi_nadi_igd);
        if (frekuensi_nadi_igd.frekuensi_igd_1 !== null) {
            $('#frekuensi-igd-1').val(frekuensi_nadi_igd.frekuensi_igd_1);
        }
        if (frekuensi_nadi_igd.frekuensi_igd_2 !== null) {
            $('#frekuensi-igd-2').val(frekuensi_nadi_igd.frekuensi_igd_2);
        }

        const tinggi_badan_igd = JSON.parse(data.tinggi_badan_igd);
        if (tinggi_badan_igd.tinggi_badan_igd_1 !== null) {
            $('#tinggi-badan-igd-1').val(tinggi_badan_igd.tinggi_badan_igd_1);
        }
        if (tinggi_badan_igd.tinggi_badan_igd_2 !== null) {
            $('#tinggi-badan-igd-2').val(tinggi_badan_igd.tinggi_badan_igd_2);
        }

        const s_o2 = JSON.parse(data.s_o2);
        if (s_o2.imunisasi_igd_1 !== null) {
            $('#imunisasi-igd-1').val(s_o2.imunisasi_igd_1);
        }
        if (s_o2.imunisasi_igd_2 !== null) {
            $('#imunisasi-igd-2').prop('checked', true).change()
        }
        if (s_o2.imunisasi_igd_3 !== null) {
            $('#imunisasi-igd-3').prop('checked', true).change()
        }
        //  PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL AKHIR

        // PEMERIKSAAN DEWASA AWAL
        if (data.jalan_nafas_igd) {
            const jalan_nafas_igd = JSON.parse(data.jalan_nafas_igd);
            if (jalan_nafas_igd.jalan_nafas_igd_1 !== null) {
                $('#jalan-nafas-igd-1').prop('checked', true)
            }
            if (jalan_nafas_igd.jalan_nafas_igd_2 !== null) {
                $('#jalan-nafas-igd-2').prop('checked', true)
            }
            if (jalan_nafas_igd.jalan_nafas_igd_3 !== null) {
                $('#jalan-nafas-igd-3').prop('checked', true)
            }
            if (jalan_nafas_igd.jalan_nafas_igd_4 !== null) {
                $('#jalan-nafas-igd-4').prop('checked', true)
            }
            if (jalan_nafas_igd.jalan_nafas_igd_5 !== null) {
                $('#jalan-nafas-igd-5').prop('checked', true)
            }
            if (jalan_nafas_igd.jalan_nafas_igd_6 !== null) {
                $('#jalan-nafas-igd-6').prop('checked', true)
            }
        }




        const pernafasan_igd = JSON.parse(data.pernafasan_igd);
        if (pernafasan_igd.pernafasan_igd_1 !== null) {
            $('#pernafasan-igd-1').prop('checked', true)
        }
        if (pernafasan_igd.pernafasan_igd_2 !== null) {
            $('#pernafasan-igd-2').prop('checked', true)
        }
        if (pernafasan_igd.pernafasan_igd_3 !== null) {
            $('#pernafasan-igd-3').prop('checked', true)
        }
        if (pernafasan_igd.pernafasan_igd_4 !== null) {
            $('#pernafasan-igd-4').prop('checked', true)
        }
        if (pernafasan_igd.pernafasan_igd_5 !== null) {
            $('#pernafasan-igd-5').prop('checked', true)
        }
        if (pernafasan_igd.pernafasan_igd_6 !== null) {
            $('#pernafasan-igd-6').prop('checked', true)
        }
        if (pernafasan_igd.pernafasan_igd_7 !== null) {
            $('#pernafasan-igd-7').prop('checked', true)
        }
        if (pernafasan_igd.pernafasan_igd_8 !== null) {
            $('#pernafasan-igd-8').prop('checked', true)
        }

        const sirkulasi_igd = JSON.parse(data.sirkulasi_igd);
        if (sirkulasi_igd.sirkulasi_igd_1 !== null) {
            $('#sirkulasi-igd-1').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_2 !== null) {
            $('#sirkulasi-igd-2').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_3 !== null) {
            $('#sirkulasi-igd-3').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_4 !== null) {
            $('#sirkulasi-igd-4').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_5 !== null) {
            $('#sirkulasi-igd-5').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_6 !== null) {
            $('#sirkulasi-igd-6').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_7 !== null) {
            $('#sirkulasi-igd-7').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_8 !== null) {
            $('#sirkulasi-igd-8').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_9 !== null) {
            $('#sirkulasi-igd-9').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_10 !== null) {
            $('#sirkulasi-igd-10').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_11 !== null) {
            $('#sirkulasi-igd-11').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_12 !== null) {
            $('#sirkulasi-igd-12').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_13 !== null) {
            $('#sirkulasi-igd-13').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_14 !== null) {
            $('#sirkulasi-igd-14').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_15 !== null) {
            $('#sirkulasi-igd-15').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_16 !== null) {
            $('#sirkulasi-igd-16').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_17 !== null) {
            $('#sirkulasi-igd-17').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_18 !== null) {
            $('#sirkulasi-igd-18').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_19 !== null) {
            $('#sirkulasi-igd-19').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_20 !== null) {
            $('#sirkulasi-igd-20').prop('checked', true)
        }
        if (sirkulasi_igd.sirkulasi_igd_21 !== null) {
            $('#sirkulasi-igd-21').prop('checked', true)
        }

        const kesadaran_igd_w = JSON.parse(data.kesadaran_igd_w);
        if (kesadaran_igd_w.kesadaran_igdd_1 !== null) {
            $('#kesadaran-igdd-1 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_2 !== null) {
            $('#kesadaran-igdd-2 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_3 !== null) {
            $('#kesadaran-igdd-3 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_4 !== null) {
            $('#kesadaran-igdd-4 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_5 !== null) {
            $('#kesadaran-igdd-5 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_6 !== null) {
            $('#kesadaran-igdd-6 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_7 !== null) {
            $('#kesadaran-igdd-7 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_8 !== null) {
            $('#kesadaran-igdd-8 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_9 !== null) {
            $('#kesadaran-igdd-9 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_10 !== null) {
            $('#kesadaran-igdd-10 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_11 !== null) {
            $('#kesadaran-igdd-11 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_12 !== null) {
            $('#kesadaran-igdd-12 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_13 !== null) {
            $('#kesadaran-igdd-13 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_14 !== null) {
            $('#kesadaran-igdd-14 ').prop('checked', true)
        }
        if (kesadaran_igd_w.kesadaran_igdd_15 !== null) {
            $('#kesadaran-igdd-15 ').prop('checked', true)
        }

        // PDA
        // if (data.pernafasan_igd_w === '3_1') {$('#pa-pernafasan-1').prop('checked', true).change()}
        // if (data.pernafasan_igd_w === '2_2') { $('#pa-pernafasan-2').prop('checked', true).change()}
        // if (data.pernafasan_igd_w === '1_3') {$('#pa-pernafasan-3').prop('checked', true).change()}
        // if (data.pernafasan_igd_w === '0_4') {$('#pa-pernafasan-4').prop('checked', true).change()}
        // if (data.pernafasan_igd_w === '3_5') {$('#pa-pernafasan-5').prop('checked', true).change()}
        // if (data.pernafasan_igd_w === '2_6') {$('#pa-pernafasan-6').prop('checked', true).change()}
        // if (data.pernafasan_igd_w === '1_7') {$('#pa-pernafasan-7').prop('checked', true).change()}

        // if (data.sirkulasi_igd_w === '3_1') {$('#pa-sirkulasi-1').prop('checked', true).change()}
        // if (data.sirkulasi_igd_w === '2_2') {$('#pa-sirkulasi-2').prop('checked', true).change()}
        // if (data.sirkulasi_igd_w === '1_3') {$('#pa-sirkulasi-3').prop('checked', true).change()}
        // if (data.sirkulasi_igd_w === '3_4') {$('#pa-sirkulasi-4').prop('checked', true).change()}
        // if (data.sirkulasi_igd_w === '2_5') {$('#pa-sirkulasi-5').prop('checked', true).change()}
        // if (data.sirkulasi_igd_w === '1_6') {$('#pa-sirkulasi-6').prop('checked', true).change()}
        // if (data.sirkulasi_igd_w === '0_7') {$('#pa-sirkulasi-7').prop('checked', true).change()}
        // if (data.sirkulasi_igd_w === '3_8') {$('#pa-sirkulasi-8').prop('checked', true).change()}
        // if (data.sirkulasi_igd_w === '2_9') {$('#pa-sirkulasi-9').prop('checked', true).change()}

        // if (data.kesadaran_igd_3 === '3_1') { $('#pa-kesadaran-1').prop('checked', true).change()}
        // if (data.kesadaran_igd_3 === '2_2') {$('#pa-kesadaran-2').prop('checked', true).change()}
        // if (data.kesadaran_igd_3 === '1_3') { $('#pa-kesadaran-3').prop('checked', true).change()}
        // if (data.kesadaran_igd_3 === '0_4') {$('#pa-kesadaran-4').prop('checked', true).change()}
        // PEMERIKSAAN ANAK AKHIR



        //  ASESMENT TRIAGE AWAL
        const asesment_triage_igd = JSON.parse(data.asesment_triage_igd);
        if (asesment_triage_igd.asesment_triage_1 !== null) {
            $('#asesment-triage-1 ').prop('checked', true)
        }
        if (asesment_triage_igd.asesment_triage_2 !== null) {
            $('#asesment-triage-2 ').prop('checked', true)
        }
        if (asesment_triage_igd.asesment_triage_3 !== null) {
            $('#asesment-triage-3 ').prop('checked', true)
        }
        if (asesment_triage_igd.asesment_triage_4 !== null) {
            $('#asesment-triage-4 ').prop('checked', true)
        }
        if (asesment_triage_igd.asesment_triage_5 !== null) {
            $('#asesment-triage-5 ').prop('checked', true)
        }
        if (asesment_triage_igd.asesment_triage_6 !== null) {
            $('#asesment-triage-6 ').prop('checked', true)
        }
        if (asesment_triage_igd.asesment_triage_7 !== null) {
            $('#asesment-triage-7').val(asesment_triage_igd.asesment_triage_7);
        }
        if (asesment_triage_igd.asesment_triage_8 !== null) {
            $('#asesment-triage-8').val(asesment_triage_igd.asesment_triage_8);
        }
        if (asesment_triage_igd.asesment_triage_9 !== null) {
            $('#asesment-triage-9').val(asesment_triage_igd.asesment_triage_9);
        }
        if (asesment_triage_igd.asesment_triage_10 !== null) {
            $('#asesment-triage-10').val(asesment_triage_igd.asesment_triage_10);
        }
        //  ASESMENT TRIAGE AKHIR


        

        // TINDAK LANJUT AWAL
        const tindak_lanjut_igd = JSON.parse(data.tindak_lanjut_igd);
        if (tindak_lanjut_igd.tindak_lanjut_1 !== null) {
            $('#tindak-lanjut-1 ').prop('checked', true)
        }
        if (tindak_lanjut_igd.tindak_lanjut_2 !== null) {
            $('#tindak-lanjut-2 ').prop('checked', true)
        }
        if (tindak_lanjut_igd.tindak_lanjut_3 !== null) {
            $('#tindak-lanjut-3 ').prop('checked', true)
        }
        if (tindak_lanjut_igd.tindak_lanjut_4 !== null) {
            $('#tindak-lanjut-4 ').prop('checked', true)
        }
        // TINDAK LANJUT AKHIR

        if (data.id_perawatt_igd !== null) {
            $('#pk-perawat-igd').select2c('readonly', false)
            $('#pk-perawat-igd').val(data.id_perawatt_igd)
            $('#s2id_pk-perawat-igd a .select2c-chosen').html(data.perawat)
        }

        if (data.id_dokterr_igd !== null) {
            $('#pk-dokter-igd').select2c('readonly', false)
            $('#pk-dokter-igd').val(data.id_dokterr_igd)
            $('#s2id_pk-dokter-igd a .select2c-chosen').html(data.verifikasi_dpjp)
        }

        if (data.ttd_perawat_igd !== null) {
            $('#ttd-perawat-igd').hide()
            $('#ttd_perawat_dpjp_igd_verified').show()
        } else {
            $('#ttd-perawat-igd').show()
            $('#ttd_perawat_dpjp_igd_verified').hide()
        }

        if (data.ttd_dokter_igd !== null) {
            $('#ttd-dokter-dpjp-igd').hide()
            $('#ttd_dokter_dpjp_igd_verified').show()
        } else {
            $('#ttd-dokter-dpjp-igd').show()
            $('#ttd_dokter_dpjp_igd_verified').hide()
        }


        if (data.tampilan_saga_1 == '1') { $('#tampilan-saga-1').prop('checked', true); }
        if (data.tampilan_saga_2 == '1') { $('#tampilan-saga-2').prop('checked', true); }
        if (data.tampilan_saga_3 == '1') { $('#tampilan-saga-3').prop('checked', true); }
        if (data.tampilan_saga_4 == '1') { $('#tampilan-saga-4').prop('checked', true); }
        if (data.tampilan_saga_5 == '1') { $('#tampilan-saga-5').prop('checked', true); }

        if (data.usaha_saga_1 == '1') { $('#usaha-saga-1').prop('checked', true); }
        if (data.usaha_saga_2 == '1') { $('#usaha-saga-2').prop('checked', true); }
        if (data.usaha_saga_3 == '1') { $('#usaha-saga-3').prop('checked', true); }
        if (data.usaha_saga_4 == '1') { $('#usaha-saga-4').prop('checked', true); }

        if (data.sirkulasi_saga_1 == '1') { $('#sirkulasi-saga-1').prop('checked', true); }
        if (data.sirkulasi_saga_2 == '1') { $('#sirkulasi-saga-2').prop('checked', true); }
        if (data.sirkulasi_saga_3 == '1') { $('#sirkulasi-saga-3').prop('checked', true); }

        if (data.gambarsaga_1 == '1') { $('#gambarsaga-1').prop('checked', true); }
        if (data.gambarsaga_2 == '1') { $('#gambarsaga-2').prop('checked', true); }
        if (data.gambarsaga_3 == '1') { $('#gambarsaga-3').prop('checked', true); }
        if (data.gambarsaga_4 == '1') { $('#gambarsaga-4').prop('checked', true); }
        if (data.gambarsaga_5 == '1') { $('#gambarsaga-5').prop('checked', true); }
        if (data.gambarsaga_6 == '1') { $('#gambarsaga-6').prop('checked', true); }


    }
    // TRIASE AKHIR

    // WH11
    function konfirmasiPengkajianAwalIGD() {
        var stop = false;
        if ($('#waktu_kajian, #waktu-kajian-igd, #tanggal-perawat-igd, #tanggal-dokter-igd').val() === '') {
            syams_validation('#waktu_kajian', 'Kolom waktu pengkajian harus diisi!')
            $('#wizard_form_igd').bwizard('show', '0')
            stop = true;
        }
        if ($('#pk-perawat-igd').val() === '') {
            syams_validation('#pk-perawat-igd', 'Kolom waktu verifikasi Perawat harus diisi!');
            $('#pk-perawat-igd').focus();
            $('#wizard_form_igd').bwizard('show', '0');
            stop = true;
        }
        if (stop) {
            return false;
        }
        var id_kajian_medis = $('#id_kajian_medis').val()
        if (id_kajian_medis) {
            var text = 'Apakah anda yakin ingin mengupdate data ini ?';
            var btnTextConfirm = 'Update';
        } else {
            text = 'Apakah anda yakin ingin menyimpan data ini ?';
            btnTextConfirm = 'Simpan';
        }
        swal.fire({
            title: 'Konfirmasi ?',
            html: text,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save mr-1"></i>' + btnTextConfirm,
            cancelButtonText: '<i class="fas fa-time-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanPengkajianAwalIGD()
            }
        })
    }

    // BENTROK ID 
    function showKajianMedis(data) {
        $('#id_kajian_medis').val(data.id)
        $('#waktu_kajian').val((data.waktu !== null ? datetimefmysql(data.waktu) : ''))
        $('#keluhan_utama_medis').val(data.keluhan_utama)
        $('#rps_medis').val(data.riwayat_penyakit_sekarang)

        // riwayat penyakit terdahulu
        var rpt = JSON.parse(data.riwayat_penyakit_dahulu)
        if (rpt.asma !== '') {
            $('#rpt_asma').prop('checked', true)
        }
        if (rpt.diabetes_miletus !== '') {
            $('#rpt_diabetes_miletus').prop('checked', true)
        }
        if (rpt.cardiovascular !== '') {
            $('#rpt_cardiovascular').prop('checked', true)
        }
        if (rpt.kanker !== '') {
            $('#rpt_kanker').prop('checked', true)
        }
        if (rpt.thalasemia !== '') {
            $('#rpt_thalasemia').prop('checked', true)
        }
        if (rpt.lain !== '') {
            $('#rpt_lain').prop('checked', true)
            $('#rpt_lain_input').val(rpt.ket_lain).attr('disabled', false)
        }
        // end riwayat penyakit terdahulu

        // riwayat penyakit keluarga
        var rpk = JSON.parse(data.riwayat_penyakit_keluarga)
        if (rpk.asma !== '') {
            $('#rpk_asma').prop('checked', true)
        }
        if (rpk.diabetes_miletus !== '') {
            $('#rpk_diabetes_miletus').prop('checked', true)
        }
        if (rpk.cardiovascular !== '') {
            $('#rpk_cardiovascular').prop('checked', true)
        }
        if (rpk.kanker !== '') {
            $('#rpk_kanker').prop('checked', true)
        }
        if (rpk.thalasemia !== '') {
            $('#rpk_thalasemia').prop('checked', true)
        }
        if (rpk.lain !== '') {
            $('#rpk_lain_lain').prop('checked', true)
            $('#rpk_lain_input').val(rpk.ket_lain).attr('disabled', false)
        }
        // end riwayat penyakit keluarga

        $('#riwayat_detail').val(data.riwayat_detail)

        // alergi
        if (data.alergi === '0') {
            $('#alergi_awal_tidak').prop('checked', true).change()
        }
        if (data.alergi === '1') {
            $('#alergi_awal_ya').prop('checked', true).change()
            $('#alergi_input').val(data.ket_alergi)
            $('#reaksi_alergi_input').val(data.ket_reaksi_alergi)
        }
        // end alergi

        // neonatus
        var neonatus = JSON.parse(data.neonatus)
        getValueEdit('menangis', neonatus.menangis)
        getValueEdit('spo', neonatus.spo)
        getValueEdit('vital', neonatus.vital)
        getValueEdit('wajah', neonatus.wajah)
        getValueEdit('tidur', neonatus.tidur)
        // end neonatus 

        // penilaian tingkat nyeri
        if (data.ket_nyeri === 'Ringan') {
            $('#ptn_keterangan_ringan').prop('checked', true).change()
        }
        if (data.ket_nyeri === 'Sedang') {
            $('#ptn_keterangan_sedang').prop('checked', true).change()
        }
        if (data.ket_nyeri === 'Berat') {
            $('#ptn_keterangan_berat').prop('checked', true).change()
        }

        // nyeri hilang
        var ket_nyeri_hilang = JSON.parse(data.ket_nyeri_hilang)
        if (ket_nyeri_hilang.minum_obat !== '') {
            $('#ptn_minum_obat').prop('checked', true)
        }
        if (ket_nyeri_hilang.mendengarkan_musik !== '') {
            $('#ptn_mendengarkan_musik').prop('checked', true)
        }
        if (ket_nyeri_hilang.istirahat !== '') {
            $('#ptn_istirahat').prop('checked', true)
        }
        if (ket_nyeri_hilang.berubah_posisi !== '') {
            $('#ptn_berubah_posisi').prop('checked', true)
        }
        if (ket_nyeri_hilang.lain !== '') {
            $('#ptn_lain').prop('checked', true)
            $('#ptn_lain_input').val(ket_nyeri_hilang.ket_lain).attr('disabled', false)
        }
        // end nyeri hilang
        // end penilaian tingkat nyeri

        // flacc
        getValueEdit('flacc_wajah', data.flacc_wajah)
        getValueEdit('flacc_kaki', data.flacc_kaki)
        getValueEdit('flacc_aktifitas', data.flacc_aktifitas)
        getValueEdit('flacc_bicara', data.flacc_bicara)
        getValueEdit('flacc_menangis', data.flacc_menangis)
        getValueEdit('flacc_bicara', data.flacc_bicara)
        // end flacc

        // pemeriksaan fisik
        $('#kepala_pm').val(data.fisik_kepala)
        $('#mata_pm').val(data.fisik_mata)
        $('#mulut_pm').val(data.fisik_mulut)
        $('#leher_pm').val(data.fisik_leher)
        $('#thoraks_cor_pm').val(data.fisik_thoraks_cor)
        $('#thoraks_pulmo_pm').val(data.fisik_thoraks_pulmo)
        $('#abdomen_pm').val(data.fisik_abdomen)
        $('#ekstermitas_pm').val(data.fisik_ekstermitas)
        $('#kulit_kelamin_pm').val(data.fisik_kulit_kelamin)
        $('#status_lokalis').val(data.fisik_status_lokalis)

        if (data.fisik_note_anathomi !== '') {
            $('.drawpad').hide()
            $('#btn_hapus_drawpad').hide()
            $('#fisik_img_anathomi').show()
            $('#fisik_img_anathomi').attr('src', data.fisik_note_anathomi)
            $('#drawpad_input').val(data.fisik_note_anathomi)
        } else {
            $('#btn_hapus_drawpad').show()
            $('#fisik_img_anathomi').hide()
            $('#fisik_img_anathomi').attr('src', '')
        }

        $('#diagnosa_awal').val(data.diagnosa_awal)
        $('#diagnosa_banding').val(data.diagnosa_banding)
        // end pemeriksaan fisik

        // pemeriksaan penunjang lab
        var lab = JSON.parse(data.penunjang_lab)
        // if (lab.dr !== '') {
        //     $('#lab_dr').prop('checked', true)
        // }
        if (lab.dpl !== '') {
            $('#lab_dpl').prop('checked', true)
        }
        if (lab.agd !== '') {
            $('#lab_agd').prop('checked', true)
        }
        if (lab.elektrolit !== '') {
            $('#lab_elektrolit').prop('checked', true)
        }
        if (lab.urin !== '') {
            $('#lab_urin').prop('checked', true)
        }
        if (lab.ck !== '') {
            $('#lab_ck').prop('checked', true)
        }
        if (lab.gds !== '') {
            $('#lab_gds').prop('checked', true)
        }
        if (lab.ureum !== '') {
            $('#lab_ureum').prop('checked', true)
        }
        if (lab.lain !== '') {
            $('#lab_lain').prop('checked', true)
            $('#lab_lain_input').val(lab.ket_lain).attr('disabled', false)
        }
        // end pemeriksaan penunjang lab

        // pemeriksaan penunjang xray
        var xray = JSON.parse(data.penunjang_xray)
        if (xray.tidak_ada !== '') {
            $('#xray_tidak_ada').prop('checked', true)
        }
        if (xray.thorax !== '') {
            $('#xray_thorax').prop('checked', true)
        }
        if (xray.abdomen !== '') {
            $('#xray_abdomen').prop('checked', true)
        }
        if (xray.ctscan !== '') {
            $('#xray_ctscan').prop('checked', true)
        }
        if (xray.lain !== '') {
            $('#xray_lain').prop('checked', true)
            $('#xray_lain_input').val(xray.ket_lain).attr('disabled', false)
        }
        // end pemeriksaan penunjang xray

        // ekg
        var ekg = JSON.parse(data.penunjang_ekg)
        if (ekg.ekg == '0') {
            $('#ekg_tidak').prop('checked', true).change()
        }
        if (ekg.ekg == '1') {
            $('#ekg_yaa').prop('checked', true).change()
            $('#ket_ekg').val(ekg.ket_ekg)
        }
        // end ekg

        $('#field_terapi_tindakan').summernote('code', data.terapi_tindakan)
        $('#bangsal_auto').val(data.id_bangsal)
        $('#s2id_bangsal_auto a .select2c-chosen').html(data.bangsal)

        if (data.kontrol === '0') {
            $('#dipulangkan_tidak').prop('checked', true).change()
        }
        if (data.kontrol === '1') {
            $('#dipulangkan_ya').prop('checked', true).change()
            $('#ket_dipulangkan').val(data.ket_kontrol)
        }

        $('#dirujuk_ke').val(data.dirujuk_ke)
        $('#alasan_rujuk').val(data.alasan_rujuk)
        $('#alasan_pulang_paksa').val(data.alasan_pulang_paksa)

        if (data.meninggal === '1') {
            $('#meninggal').prop('checked', true)
        } else {
            $('#meninggal').prop('checked', false)
        }

        $('#kondisi_pulang').val(data.kondisi_saat_pulang)

        // kesadaran
        var kesadaran = JSON.parse(data.kesadaran)
        if (kesadaran.cm !== '') {
            $('#kesadaran_cm').prop('checked', true)
        }
        if (kesadaran.apatis !== '') {
            $('#kesadaran_apatis').prop('checked', true)
        }
        if (kesadaran.delirium !== '') {
            $('#kesadaran_delirium').prop('checked', true)
        }
        if (kesadaran.sopor !== '') {
            $('#kesadaran_sopor').prop('checked', true)
        }
        if (kesadaran.koma !== '') {
            $('#kesadaran_koma').prop('checked', true)
        }
        // end kesadaran

        // Jenis Kebutuhan Layanan
        // if (data.kebutuhan_layanan !== null) {
        //     var kebutuhan_layanan = JSON.parse(data.kebutuhan_layanan)

        //     if (kebutuhan_layanan.preventif !== '') {
        //         $('#kebutuhan_preventif').prop('checked', true)
        //     }
        //     if (kebutuhan_layanan.kuratif !== '') {
        //         $('#kebutuhan_kuratif').prop('checked', true)
        //     }
        //     if (kebutuhan_layanan.paliatif !== '') {
        //         $('#kebutuhan_paliatif').prop('checked', true)
        //     }
        //     if (kebutuhan_layanan.rehabilitatif !== '') {
        //         $('#kebutuhan_rehabilitatif').prop('checked', true)
        //     }
        // }

        // end Jenis Kebutuhan Layanan

        $('#gcs_e').val(data.gcs_e)
        $('#gcs_m').val(data.gcs_m)
        $('#gcs_v').val(data.gcs_v)

        $('#field_catatan_khusus').summernote('code', data.catatan_khusus)

        // dokter IGD
        if (data.id_dokter_igd !== null) {
            $('#dokter_igd').select2c('readonly', true)
            $('#dokter_igd').val(data.id_dokter_igd)
            $('#s2id_dokter_igd a .select2c-chosen').html(data.dokter_igd)
        }

        if (data.signature_dokter_igd !== null) {
            $('#ttd_dokter_igd').hide()
            $('#ttd_dokter_igd_verified').show()
        } else {
            $('#ttd_dokter_igd').show()
            $('#ttd_dokter_igd_verified').hide()
        }
        // end dokter IGD

        // vefikasi DPJP
        if (data.id_dokter_dpjp !== null) {
            $('#verifikasi_dpjp').select2c('readonly', true)
            $('#verifikasi_dpjp').val(data.id_dokter_dpjp)
            $('#s2id_verifikasi_dpjp a .select2c-chosen').html(data.verifikasi_dpjp)
        }

        if (data.signature_dokter_dpjp !== null) {
            $('#ttd_verifikasi_dpjp').hide()
            $('#ttd_verifikasi_dpjp_verified').show()
        } else {
            $('#ttd_verifikasi_dpjp').show()
            $('#ttd_verifikasi_dpjp_verified').hide()
        }
        // end vefikasi DPJP
    }

    function showKajianKeperawatan(data) {
        $('#id_kajian_keperawatan').val(data.id)
        // informasi diperoleh dari
        var informasi = JSON.parse(data.informasi_dari)
        if (informasi.pasien !== '') {
            $('#informasi_dari_pasien').prop('checked', true)
        }
        if (informasi.keluarga !== '') {
            $('#informasi_dari_keluarga').prop('checked', true)
        }
        if (informasi.lain !== '') {
            $('#informasi_dari_lain').prop('checked', true)
            $('#informasi_dari_lain_input').val(informasi.ket_lain).attr('disabled', false)
        }
        // end informasi diperoleh dari

        // cara masuk
        var cara_masuk = JSON.parse(data.cara_masuk)
        if (cara_masuk.tanpa_bantuan !== '') {
            $('#cara_masuk_tanpa_bantuan').prop('checked', true)
        }
        if (cara_masuk.dengan_bantuan !== '') {
            $('#cara_masuk_dengan_bantuan').prop('checked', true)
        }
        if (cara_masuk.kursi_roda !== '') {
            $('#cara_masuk_kursi_roda').prop('checked', true)
        }
        if (cara_masuk.brankar !== '') {
            $('#cara_masuk_brankar').prop('checked', true)
        }
        // end cara masuk

        $('#keluhan_utama_keperawatan').val(data.keluhan_utama)
        $('#rps_keperawatan').val(data.riwayat_penyakit_sekarang)

        // riwayat penyakit terdahulu
        var rpt = JSON.parse(data.riwayat_penyakit_terdahulu);
        if (rpt.asma !== '') {
            $('#rpt_keperawatan_asma').prop('checked', true)
        }
        if (rpt.hipertensi !== '') {
            $('#rpt_keperawatan_hipertensi').prop('checked', true)
        }
        if (rpt.jantung !== '') {
            $('#rpt_keperawatan_jantung').prop('checked', true)
        }
        if (rpt.diabetes !== '') {
            $('#rpt_keperawatan_diabetes').prop('checked', true)
        }
        if (rpt.hepatitis !== '') {
            $('#rpt_keperawatan_hepatitis').prop('checked', true)
        }
        if (rpt.lain !== '') {
            $('#rpt_keperawatan_lain').prop('checked', true);
            $('#rpt_keperawatan_lain_input').val(rpt.ket_lain).attr('disabled', false);
        }
        // end riwayat penyakit terdahulu


        // TAMBAHAN BARU WESA
        // Mengecek apakah 'data.pernahdirawat' tidak null atau undefined
        if (data.pernahdirawat) {
            const pernahdirawat = JSON.parse(data.pernahdirawat);
            if (pernahdirawat.pernahdirawat_1) {$('#pernahdirawat-1').prop('checked', true);}
            if (pernahdirawat.pernahdirawat_2) {$('#pernahdirawat-2').prop('checked', true);}
            if (pernahdirawat.pernahdirawat_3) {$('#pernahdirawat-3').val(pernahdirawat.pernahdirawat_3);}
        }

        if (data.pernahdioprasi) {
            const pernahdioprasi = JSON.parse(data.pernahdioprasi);
            if (pernahdioprasi.pernahdioprasi_1) {$('#pernahdioprasi-1').prop('checked', true);}
            if (pernahdioprasi.pernahdioprasi_2) {$('#pernahdioprasi-2').prop('checked', true);}
            if (pernahdioprasi.pernahdioprasi_3) {$('#pernahdioprasi-3').val(pernahdioprasi.pernahdioprasi_3);}
        }

        if (data.riwayatkesehatanZ) {
            const riwayatkesehatanZ = JSON.parse(data.riwayatkesehatanZ);
            if (riwayatkesehatanZ.riwayatkesehatanZ_1) {$('#riwayatkesehatanZ-1').val(riwayatkesehatanZ.riwayatkesehatanZ_1);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_2) {$('#riwayatkesehatanZ-2').val(riwayatkesehatanZ.riwayatkesehatanZ_2);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_3) {$('#riwayatkesehatanZ-3').val(riwayatkesehatanZ.riwayatkesehatanZ_3);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_4) {$('#riwayatkesehatanZ-4').val(riwayatkesehatanZ.riwayatkesehatanZ_4);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_5) {$('#riwayatkesehatanZ-5').prop('checked', true);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_6) {$('#riwayatkesehatanZ-6').prop('checked', true);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_7) {$('#riwayatkesehatanZ-7').prop('checked', true);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_8) {$('#riwayatkesehatanZ-8').prop('checked', true);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_9) {$('#riwayatkesehatanZ-9').prop('checked', true);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_10) {$('#riwayatkesehatanZ-10').prop('checked', true);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_11) {$('#riwayatkesehatanZ-11').val(riwayatkesehatanZ.riwayatkesehatanZ_11);}
            if (riwayatkesehatanZ.riwayatkesehatanZ_12) {$('#riwayatkesehatanZ-12').val(riwayatkesehatanZ.riwayatkesehatanZ_12);}
        }
  
        if (data.rpkimunisasi) {
            const rpkimunisasi = JSON.parse(data.rpkimunisasi);
            if (rpkimunisasi.rpkimunisasi_1) {$('#rpkimunisasi-1').prop('checked', true);}
            if (rpkimunisasi.rpkimunisasi_2) {$('#rpkimunisasi-2').prop('checked', true);}
            if (rpkimunisasi.rpkimunisasi_3) {$('#rpkimunisasi-3').val(rpkimunisasi.rpkimunisasi_3);}
            if (rpkimunisasi.rpkimunisasi_4) {$('#rpkimunisasi-4').prop('checked', true);}
            if (rpkimunisasi.rpkimunisasi_5) {$('#rpkimunisasi-5').val(rpkimunisasi.rpkimunisasi_5);}
            if (rpkimunisasi.rpkimunisasi_6) {$('#rpkimunisasi-6').prop('checked', true);}
            if (rpkimunisasi.rpkimunisasi_7) {$('#rpkimunisasi-7').val(rpkimunisasi.rpkimunisasi_7);}
            if (rpkimunisasi.rpkimunisasi_8) {$('#rpkimunisasi-8').prop('checked', true);}
            if (rpkimunisasi.rpkimunisasi_9) {$('#rpkimunisasi-9').val(rpkimunisasi.rpkimunisasi_9);}
            if (rpkimunisasi.rpkimunisasi_10) {$('#rpkimunisasi-10').prop('checked', true);}
            if (rpkimunisasi.rpkimunisasi_11) {$('#rpkimunisasi-11').prop('checked', true);}
            if (rpkimunisasi.rpkimunisasi_12) {$('#rpkimunisasi-12').val(rpkimunisasi.rpkimunisasi_12);}
        }

        if (data.personalsosial) {
            const personalsosial = JSON.parse(data.personalsosial);
            if (personalsosial.personalsosial_1) {$('#personalsosial-1').prop('checked', true);}
            if (personalsosial.personalsosial_2) {$('#personalsosial-2').prop('checked', true);}
            if (personalsosial.personalsosial_3) {$('#personalsosial-3').prop('checked', true);}
            if (personalsosial.personalsosial_4) {$('#personalsosial-4').prop('checked', true);}
        }
        if (data.motorikhalus) {
            const motorikhalus = JSON.parse(data.motorikhalus);
            if (motorikhalus.motorikhalus_1) {$('#motorikhalus-1').prop('checked', true);}
            if (motorikhalus.motorikhalus_2) {$('#motorikhalus-2').prop('checked', true);}
            if (motorikhalus.motorikhalus_3) {$('#motorikhalus-3').prop('checked', true);}
            if (motorikhalus.motorikhalus_4) {$('#motorikhalus-4').prop('checked', true);}
        }
        if (data.motorikkasar) {
            const motorikkasar = JSON.parse(data.motorikkasar);
            if (motorikkasar.motorikkasar_1) {$('#motorikkasar-1').prop('checked', true);}
            if (motorikkasar.motorikkasar_2) {$('#motorikkasar-2').prop('checked', true);}
            if (motorikkasar.motorikkasar_3) {$('#motorikkasar-3').prop('checked', true);}
            if (motorikkasar.motorikkasar_4) {$('#motorikkasar-4').prop('checked', true);}
        }
        if (data.bahasaP) {
            const bahasaP = JSON.parse(data.bahasaP);
            if (bahasaP.bahasaP_1) {$('#bahasaP-1').prop('checked', true);}
            if (bahasaP.bahasaP_2) {$('#bahasaP-2').prop('checked', true);}
            if (bahasaP.bahasaP_3) {$('#bahasaP-3').prop('checked', true);}
            if (bahasaP.bahasaP_4) {$('#bahasaP-4').prop('checked', true);}
        }
        if (data.bahasaQ) {
            const bahasaQ = JSON.parse(data.bahasaQ);
            if (bahasaQ.bahasaQ_1) {$('#bahasaQ-1').prop('checked', true);}
            if (bahasaQ.bahasaQ_2) {$('#bahasaQ-2').prop('checked', true);}
            if (bahasaQ.bahasaQ_3) {$('#bahasaQ-3').prop('checked', true);}
            if (bahasaQ.bahasaQ_4) {$('#bahasaQ-4').prop('checked', true);}
        }

        $('#saturasiTM').val(data.saturasiTM)

        if (data.retraksidada) {
            const retraksidada = JSON.parse(data.retraksidada);
            if (retraksidada.retraksidada_1) {$('#retraksidada-1').val(retraksidada.retraksidada_1);}
            if (retraksidada.retraksidada_2) {$('#retraksidada-2').prop('checked', true);}
            if (retraksidada.retraksidada_3) {$('#retraksidada-3').prop('checked', true);}
            if (retraksidada.retraksidada_4) {$('#retraksidada-4').prop('checked', true);}
            if (retraksidada.retraksidada_5) {$('#retraksidada-5').prop('checked', true);}
            if (retraksidada.retraksidada_6) {$('#retraksidada-6').prop('checked', true);}
            if (retraksidada.retraksidada_7) {$('#retraksidada-7').prop('checked', true);}
            if (retraksidada.retraksidada_8) {$('#retraksidada-8').prop('checked', true);}
            if (retraksidada.retraksidada_9) {$('#retraksidada-9').prop('checked', true);}
            if (retraksidada.retraksidada_10) {$('#retraksidada-10').val(retraksidada.retraksidada_10);}
        }

        if (data.aktifikasaktif) {
            const aktifikasaktif = JSON.parse(data.aktifikasaktif);
            if (aktifikasaktif.aktifikasaktif_1) {$('#aktifikasaktif-1').prop('checked', true);}
            if (aktifikasaktif.aktifikasaktif_2) {$('#aktifikasaktif-2').prop('checked', true);}
            if (aktifikasaktif.aktifikasaktif_3) {$('#aktifikasaktif-3').prop('checked', true);}
            if (aktifikasaktif.aktifikasaktif_4) {$('#aktifikasaktif-4').prop('checked', true);}
        }

        if (data.sistemsaraf) {
            const sistemsaraf = JSON.parse(data.sistemsaraf);
            if (sistemsaraf.sistemsaraf_1) {$('#sistemsaraf-1').prop('checked', true);}
            if (sistemsaraf.sistemsaraf_2) {$('#sistemsaraf-2').prop('checked', true);}
            if (sistemsaraf.sistemsaraf_3) {$('#sistemsaraf-3').prop('checked', true);}
            if (sistemsaraf.sistemsaraf_4) {$('#sistemsaraf-4').prop('checked', true);}
            if (sistemsaraf.sistemsaraf_5) {$('#sistemsaraf-5').val(sistemsaraf.sistemsaraf_5);}
            if (sistemsaraf.sistemsaraf_6) {$('#sistemsaraf-6').prop('checked', true);}
            if (sistemsaraf.sistemsaraf_7) {$('#sistemsaraf-7').prop('checked', true);}
            // if (sistemsaraf.sistemsaraf_8) {$('#sistemsaraf-8').prop('checked', true);}
            if (sistemsaraf.sistemsaraf_9) {$('#sistemsaraf-9').prop('checked', true);}
            if (sistemsaraf.sistemsaraf_10) {$('#sistemsaraf-10').prop('checked', true);}
            if (sistemsaraf.sistemsaraf_11) {$('#sistemsaraf-11').prop('checked', true);}
        }

        if (data.hambatanlain) {
            const hambatanlain = JSON.parse(data.hambatanlain);
            if (hambatanlain.hambatanlain_1) {$('#hambatanlain-1').prop('checked', true);}
            if (hambatanlain.hambatanlain_2) {$('#hambatanlain-2').prop('checked', true);}
            if (hambatanlain.hambatanlain_3) {$('#hambatanlain-3').prop('checked', true);}
            if (hambatanlain.hambatanlain_4) {$('#hambatanlain-4').prop('checked', true);}
            if (hambatanlain.hambatanlain_5) {$('#hambatanlain-5').prop('checked', true);}
            if (hambatanlain.hambatanlain_6) {$('#hambatanlain-6').prop('checked', true);}
            if (hambatanlain.hambatanlain_7) {$('#hambatanlain-7').prop('checked', true);}
            if (hambatanlain.hambatanlain_8) {$('#hambatanlain-8').prop('checked', true);}
            if (hambatanlain.hambatanlain_9) {$('#hambatanlain-9').prop('checked', true);}
            if (hambatanlain.hambatanlain_10) {$('#hambatanlain-10').val(hambatanlain.hambatanlain_10);}
        }

        if (data.pekerjaaanes) {
            const pekerjaaanes = JSON.parse(data.pekerjaaanes);
            if (pekerjaaanes.pekerjaaanes_1) {$('#pekerjaaanes-1').prop('checked', true);}
            if (pekerjaaanes.pekerjaaanes_2) {$('#pekerjaaanes-2').prop('checked', true);}
            if (pekerjaaanes.pekerjaaanes_3) {$('#pekerjaaanes-3').prop('checked', true);}
            if (pekerjaaanes.pekerjaaanes_4) {$('#pekerjaaanes-4').prop('checked', true);}
            if (pekerjaaanes.pekerjaaanes_5) {$('#pekerjaaanes-5').prop('checked', true);}
        }

        
        if (data.carapembayaran) {
            const carapembayaran = JSON.parse(data.carapembayaran);
            if (carapembayaran.carapembayaran_1) {$('#carapembayaran-1').prop('checked', true);}
            if (carapembayaran.carapembayaran_2) {$('#carapembayaran-2').prop('checked', true);}
            if (carapembayaran.carapembayaran_3) {$('#carapembayaran-3').prop('checked', true);}
            if (carapembayaran.carapembayaran_4) {$('#carapembayaran-4').val(carapembayaran.carapembayaran_4);}
            if (carapembayaran.carapembayaran_5) {$('#carapembayaran-5').prop('checked', true);}
            if (carapembayaran.carapembayaran_6) {$('#carapembayaran-6').val(carapembayaran.carapembayaran_6);}
        }


        if (data.pengasuh) {
            const pengasuh = JSON.parse(data.pengasuh);
            if (pengasuh.pengasuh_1) {$('#pengasuh-1').prop('checked', true);}
            if (pengasuh.pengasuh_2) {$('#pengasuh-2').prop('checked', true);}
            if (pengasuh.pengasuh_3) {$('#pengasuh-3').prop('checked', true);}
            if (pengasuh.pengasuh_4) {$('#pengasuh-4').prop('checked', true);}
            if (pengasuh.pengasuh_5) {$('#pengasuh-5').val(pengasuh.pengasuh_5);}
        }

        if (data.dukungan) {
            const dukungan = JSON.parse(data.dukungan);
            if (dukungan.dukungan_1) {$('#dukungan-1').prop('checked', true);}
            if (dukungan.dukungan_2) {$('#dukungan-2').prop('checked', true);}
        }

        $('#gcs_keperawatan_e').val(data.gcs_e)
        $('#gcs_keperawatan_m').val(data.gcs_m)
        $('#gcs_keperawatan_v').val(data.gcs_v)
        $('#gcs-tottal').val(data.gcs_tottal)

        // if (data.neuro === '0') {$('#neuro-1').prop('checked', true).change()}
        // if (data.neuro === '1') {$('#neuro-2').prop('checked', true).change()}
        // if (data.neuro === '2') {$('#neuro-3').prop('checked', true).change()}

        // if (data.nadiq === '2') {$('#nadiq-1').prop('checked', true).change()}
        // if (data.nadiq === '1') {$('#nadiq-2').prop('checked', true).change()}
        // if (data.nadiq === '0') {$('#nadiq-3').prop('checked', true).change()}
        // if (data.nadiq === '1') {$('#nadiq-4').prop('checked', true).change()}
        // if (data.nadiq === '2') {$('#nadiq-5').prop('checked', true).change()}

        // if (data.respirasq === '2') {$('#respirasq-1').prop('checked', true).change()}
        // if (data.respirasq === '1') {$('#respirasq-2').prop('checked', true).change()}
        // if (data.respirasq === '0') {$('#respirasq-3').prop('checked', true).change()}
        // if (data.respirasq === '1') {$('#respirasq-4').prop('checked', true).change()}
        // if (data.respirasq === '2') {$('#respirasq-5').prop('checked', true).change()}

        // if (data.warnaulit === '0') {$('#warnaulit-1').prop('checked', true).change()}
        // if (data.warnaulit === '1') {$('#warnaulit-2').prop('checked', true).change()}
        // if (data.warnaulit === '2') {$('#warnaulit-3').prop('checked', true).change()}

        // if (data.suhuq === '2') {$('#suhuq-1').prop('checked', true).change()}
        // if (data.suhuq === '1') {$('#suhuq-2').prop('checked', true).change()}
        // if (data.suhuq === '0') {$('#suhuq-3').prop('checked', true).change()}
        // if (data.suhuq === '1') {$('#suhuq-4').prop('checked', true).change()}
        // if (data.suhuq === '2') {$('#suhuq-5').prop('checked', true).change()}

        // if (data.merintihq === '0') {$('#merintihq-1').prop('checked', true).change()}
        // if (data.merintihq === '1') {$('#merintihq-2').prop('checked', true).change()}

        // if (data.hijau === 'Hijau') {$('#hijau').prop('checked', true).change()}
        // if (data.kuning === 'Kuning') {$('#kuning').prop('checked', true).change()}
        // if (data.merah === 'Merah') {$('#merah').prop('checked', true).change()}

        
        if (data.lainop) {
            const lainop = JSON.parse(data.lainop);
            if (lainop.lainop_1) {$('#lainop-1').prop('checked', true);}
            if (lainop.lainop_2) {$('#lainop-2').val(lainop.lainop_2);}
        }

        // NEWS (DEWASA)
        for (let a = 1; a <= 8; a++) { 
            for (let b = 1; b <= 7; b++) { 
                if (data.sew_laju_respirasi === $('#skalanews_' + a + '_' + b).val() && 
                    data.sew_laju_respirasi === $('.news_respirasi_' + a + '_' + b).val()) {
                    $('#skalanews_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.sew_saturasi === $('#skalanews_' + a + '_' + b).val() && 
                    data.sew_saturasi === $('.news_ppok_' + a + '_' + b).val()) {
                    $('#skalanews_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.sew_suplemen === $('#skalanews_' + a + '_' + b).val() && 
                    data.sew_suplemen === $('.news_skala_' + a + '_' + b).val()) {
                    $('#skalanews_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.sew_temperatur === $('#skalanews_' + a + '_' + b).val() && 
                    data.sew_temperatur === $('.news_skala_' + a + '_' + b).val()) {
                    $('#skalanews_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.sew_tds === $('#skalanews_' + a + '_' + b).val() && 
                    data.sew_tds === $('.news_tds_' + a + '_' + b).val()) {
                    $('#skalanews_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.sew_laju_jantung === $('#skalanews_' + a + '_' + b).val() && 
                    data.sew_laju_jantung === $('.news_nadih_' + a + '_' + b).val()) {
                    $('#skalanews_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.sew_kesadaran === $('#skalanews_' + a + '_' + b).val() && 
                    data.sew_kesadaran === $('.news_kesadarany_' + a + '_' + b).val()) {
                    $('#skalanews_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.suhunews === $('#skalanews_' + a + '_' + b).val() && 
                    data.suhunews === $('.news_sihu_' + a + '_' + b).val()) {
                    $('#skalanews_' + a + '_' + b).prop('checked', true).change();
                }
            }
        }

        // Neonatal Early Warning Score
        for (let a = 1; a <= 6; a++) { 
            for (let b = 1; b <= 5; b++) { 
                if (data.neuro === $('#calsneuk_' + a + '_' + b).val() && 
                    data.neuro === $('.pramet_neuro_' + a + '_' + b).val()) {
                    $('#calsneuk_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.nadiq === $('#calsneuk_' + a + '_' + b).val() && 
                    data.nadiq === $('.pramet_nadiq_' + a + '_' + b).val()) {
                    $('#calsneuk_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.respirasq === $('#calsneuk_' + a + '_' + b).val() && 
                    data.respirasq === $('.pramet_respirasq_' + a + '_' + b).val()) {
                    $('#calsneuk_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.warnaulit === $('#calsneuk_' + a + '_' + b).val() && 
                    data.warnaulit === $('.pramet_warnaulit_' + a + '_' + b).val()) {
                    $('#calsneuk_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.suhuq === $('#calsneuk_' + a + '_' + b).val() && 
                    data.suhuq === $('.pramet_suhuq_' + a + '_' + b).val()) {
                    $('#calsneuk_' + a + '_' + b).prop('checked', true).change();
                }
                if (data.merintihq === $('#calsneuk_' + a + '_' + b).val() && 
                    data.merintihq === $('.pramet_merintihq_' + a + '_' + b).val()) {
                    $('#calsneuk_' + a + '_' + b).prop('checked', true).change();
                }
            }
        }


        // PENJELSANYA JUGA ADA bY WESA PEWS (ANAK)
        for (let a = 1; a <= 17; a++) { // Iterasi dari 1 hingga 17 untuk variabel 'a', kemungkinan mewakili baris
            for (let b = 1; b <= 7; b++) { // Iterasi dari 1 hingga 7 untuk variabel 'b', kemungkinan mewakili kolom
                // Memeriksa dan memperbarui elemen berdasarkan data.pews_suhu
                if (data.pews_suhu === $('#skalapews_' + a + '_' + b).val() && 
                    data.pews_suhu === $('.pews_suhu_' + a + '_' + b).val()) {
                    // Jika nilai data.pews_suhu sama dengan nilai dari elemen dengan ID dan kelas tertentu,
                    // setel elemen dengan ID tersebut menjadi checked dan trigger event change
                    $('#skalapews_' + a + '_' + b).prop('checked', true).change();
                }

                // Memeriksa dan memperbarui elemen berdasarkan data.pews_pernafasan
                if (data.pews_pernafasan === $('#skalapews_' + a + '_' + b).val() && 
                    data.pews_pernafasan === $('.pews_pernafasan_' + a + '_' + b).val()) {
                    // Jika nilai data.pews_pernafasan sama dengan nilai dari elemen dengan ID dan kelas tertentu,
                    // setel elemen dengan ID tersebut menjadi checked dan trigger event change
                    $('#skalapews_' + a + '_' + b).prop('checked', true).change();
                }

                // Memeriksa dan memperbarui elemen berdasarkan data.pews_subpernafasan
                if (data.pews_subpernafasan === $('#skalapews_' + a + '_' + b).val() && 
                    data.pews_subpernafasan === $('.pews_subpernafasan_' + a + '_' + b).val()) {
                    // Jika nilai data.pews_subpernafasan sama dengan nilai dari elemen dengan ID dan kelas tertentu,
                    // setel elemen dengan ID tersebut menjadi checked dan trigger event change
                    $('#skalapews_' + a + '_' + b).prop('checked', true).change();
                }

                // Memeriksa dan memperbarui elemen berdasarkan data.pews_alat_bantu
                if (data.pews_alat_bantu === $('#skalapews_' + a + '_' + b).val() && 
                    data.pews_alat_bantu === $('.pews_alat_bantu_' + a + '_' + b).val()) {
                    // Jika nilai data.pews_alat_bantu sama dengan nilai dari elemen dengan ID dan kelas tertentu,
                    // setel elemen dengan ID tersebut menjadi checked dan trigger event change
                    $('#skalapews_' + a + '_' + b).prop('checked', true).change();
                }

                // Memeriksa dan memperbarui elemen berdasarkan data.pews_saturasi
                if (data.pews_saturasi === $('#skalapews_' + a + '_' + b).val() && 
                    data.pews_saturasi === $('.pews_saturasi_' + a + '_' + b).val()) {
                    // Jika nilai data.pews_saturasi sama dengan nilai dari elemen dengan ID dan kelas tertentu,
                    // setel elemen dengan ID tersebut menjadi checked dan trigger event change
                    $('#skalapews_' + a + '_' + b).prop('checked', true).change();
                }

                // Memeriksa dan memperbarui elemen berdasarkan data.pews_nadi
                if (data.pews_nadi === $('#skalapews_' + a + '_' + b).val() && 
                    data.pews_nadi === $('.pews_nadi_' + a + '_' + b).val()) {
                    // Jika nilai data.pews_nadi sama dengan nilai dari elemen dengan ID dan kelas tertentu,
                    // setel elemen dengan ID tersebut menjadi checked dan trigger event change
                    $('#skalapews_' + a + '_' + b).prop('checked', true).change();
                }

                // Memeriksa dan memperbarui elemen berdasarkan data.pews_warna_kulit
                if (data.pews_warna_kulit === $('#skalapews_' + a + '_' + b).val() && 
                    data.pews_warna_kulit === $('.pews_warna_kulit_' + a + '_' + b).val()) {
                    // Jika nilai data.pews_warna_kulit sama dengan nilai dari elemen dengan ID dan kelas tertentu,
                    // setel elemen dengan ID tersebut menjadi checked dan trigger event change
                    $('#skalapews_' + a + '_' + b).prop('checked', true).change();
                }

                // Memeriksa dan memperbarui elemen berdasarkan data.pews_tds
                if (data.pews_tds === $('#skalapews_' + a + '_' + b).val() && 
                    data.pews_tds === $('.pews_tds_' + a + '_' + b).val()) {
                    // Jika nilai data.pews_tds sama dengan nilai dari elemen dengan ID dan kelas tertentu,
                    // setel elemen dengan ID tersebut menjadi checked dan trigger event change
                    $('#skalapews_' + a + '_' + b).prop('checked', true).change();
                }

                // Memeriksa dan memperbarui elemen berdasarkan data.pews_kesadaran
                if (data.pews_kesadaran === $('#skalapews_' + a + '_' + b).val() && 
                    data.pews_kesadaran === $('.pews_kesadaran_' + a + '_' + b).val()) {
                    // Jika nilai data.pews_kesadaran sama dengan nilai dari elemen dengan ID dan kelas tertentu,
                    // setel elemen dengan ID tersebut menjadi checked dan trigger event change
                    $('#skalapews_' + a + '_' + b).prop('checked', true).change();
                }
            }
        }
        // AKHIR

        // riwayat penyakit keluarga
        var rpk = JSON.parse(data.riwayat_penyakit_keluarga);
        if (rpk.asma !== '') {
            $('#rpk_keperawatan_asma').prop('checked', true)
        }
        if (rpk.hipertensi !== '') {
            $('#rpk_keperawatan_hipertensi').prop('checked', true)
        }
        if (rpk.jantung !== '') {
            $('#rpk_keperawatan_jantung').prop('checked', true)
        }
        if (rpk.diabetes !== '') {
            $('#rpk_keperawatan_diabetes').prop('checked', true)
        }
        if (rpk.hepatitis !== '') {
            $('#rpk_keperawatan_hepatitis').prop('checked', true)
        }
        if (rpk.lain !== '') {
            $('#rpk_keperawatan_lain').prop('checked', true);
            $('#rpk_keperawatan_lain_input').val(rpk.ket_lain).attr('disabled', false);
        }
        // end riwayat penyakit keluarga

        // kesadaran
        var kesadaran = JSON.parse(data.kesadaran);
        if (kesadaran.composmentis !== '') {
            $('#composmentis').prop('checked', true)
        }
        if (kesadaran.apatis !== '') {
            $('#apatis').prop('checked', true)
        }
        if (kesadaran.samnolen !== '') {
            $('#samnolen').prop('checked', true)
        }
        if (kesadaran.sopor !== '') {
            $('#sopor').prop('checked', true)
        }
        if (kesadaran.koma !== '') {
            $('#koma').prop('checked', true)
        }
        // end kesadaran

        $('#pa_tensi_sis').val(data.tensi_sistolik)
        $('#pa_tensi_dis').val(data.tensi_diastolik)
        $('#pa_nadi').val(data.nadi)
        $('#pa_suhu').val(data.suhu)
        $('#pa_nafas').val(data.nafas)

        // status psikologis
        var psikologis = JSON.parse(data.status_psikologis);
        if (psikologis.cemas !== '') {
            $('#sps_cemas').prop('checked', true)
        }
        if (psikologis.takut !== '') {
            $('#sps_takut').prop('checked', true)
        }
        if (psikologis.marah !== '') {
            $('#sps_marah').prop('checked', true)
        }
        if (psikologis.sedih !== '') {
            $('#sps_sedih').prop('checked', true)
        }
        if (psikologis.bunuh_diri !== '') {
            $('#sps_bunuh_diri').prop('checked', true)
        }
        if (psikologis.lain !== '') {
            $('#sps_lain').prop('checked', true);
            $('#sps_lain_input').val(psikologis.ket_lain).attr('disabled', false);
        }
        // end status psikologis

        // status mental
        var mental = JSON.parse(data.status_mental);
        if (mental.sadar !== '') {
            $('#smen_sadar').prop('checked', true)
        }
        if (mental.ada_masalah !== '') {
            $('#smen_ada_masalah').prop('checked', true);
            $('#smen_ada_masalah_input').val(mental.ket_ada_masalah).attr('disabled', false);
        }
        if (mental.perilaku_kekerasan !== '') {
            $('#smen_perilaku_kekerasan').prop('checked', true)
        }
        // end status mental

        // penilaian resiko jatuh anak
        getValueEdit('prja_umur', data.prja_umur)
        getValueEdit('prja_kelamin', data.prja_jenis_kelamin)
        getValueEdit('prja_diagnosis', data.prja_diagnosis)
        getValueEdit('prja_gangguan_kognitif', data.prja_gangguan_kognitif)
        getValueEdit('prja_faktor_lingkungan', data.prja_faktor_lingkungan)
        getValueEdit('prja_pembedahan', data.prja_respon_pembedahan)
        getValueEdit('prja_obat', data.prja_penggunaan_obat)
        // end penilaian resiko jatuh anak

        // penilaian resiko jatuh dewasa
        if (data.prjd_riwayat_jatuh === '25') {
            $('#prjd_riwayat_jatuh_ya').prop('checked', true).change()
        }
        if (data.prjd_diagnosis_sekunder === '15') {
            $('#prjd_diagnosis_sekunder_ya').prop('checked', true).change()
        }
        if (data.prjd_alat_bantu_jalan_1 === '0') {
            $('#alat_bantu_jalan_1').prop('checked', true);
            $('#alat_bantu_jalan_1_ya').prop('checked', true).attr('disabled', false).change()
        }
        if (data.prjd_alat_bantu_jalan_2 === '15') {
            $('#alat_bantu_jalan_2').prop('checked', true);
            $('#alat_bantu_jalan_2_ya').prop('checked', true).attr('disabled', false).change()
        }
        if (data.prjd_alat_bantu_jalan_3 === '30') {
            $('#alat_bantu_jalan_3').prop('checked', true);
            $('#alat_bantu_jalan_3_ya').prop('checked', true).attr('disabled', false).change()
        }

        if (data.prjd_terpasang_infus === '20') {
            $('#prjd_terpasang_infus_ya').prop('checked', true).change()
        }
        if (data.prjd_cara_berjalan_1 === '0') {
            $('#cara_berjalan_1').prop('checked', true);
            $('#cara_berjalan_1_ya').prop('checked', true).attr('disabled', false).change()
        }
        if (data.prjd_cara_berjalan_2 === '10') {
            $('#cara_berjalan_2').prop('checked', true);
            $('#cara_berjalan_2_ya').prop('checked', true).attr('disabled', false).change()
        }
        if (data.prjd_cara_berjalan_3 === '20') {
            $('#cara_berjalan_3').prop('checked', true);
            $('#cara_berjalan_3_ya').prop('checked', true).attr('disabled', false).change()
        }
        if (data.prjd_status_mental_1 === '0') {
            $('#status_mental_1').prop('checked', true);
            $('#status_mental_1_ya').prop('checked', true).attr('disabled', false).change()
        }
        if (data.prjd_status_mental_2 === '15') {
            $('#status_mental_2').prop('checked', true);
            $('#status_mental_2_ya').prop('checked', true).attr('disabled', false).change()
        }
        // end penialian resiko jatuh dewasa

        // penilaian resiko jatuh lansia
        // riwayat jatuh
        if (data.prjl_riwayat_jatuh === '6') {
            $('#prjl_riwayat_jatuh_ya').prop('checked', true).change()
        }
        if (data.prjl_riwayat_jatuh === '0') {
            $('#prjl_riwayat_jatuh_tidak').prop('checked', true).change()
        }
        if (data.prjl_riwayat_jatuh_opt === '6') {
            $('#prjl_riwayat_jatuh_opt_ya').prop('checked', true).change()
        }
        if (data.prjl_riwayat_jatuh_opt === '0') {
            $('#prjl_riwayat_jatuh_opt_tidak').prop('checked', true).change()
        }
        // riwayat jatuh

        // status mental
        if (data.prjl_status_mental === '14') {
            $('#prjl_status_mental_ya').prop('checked', true).change()
        }
        if (data.prjl_status_mental === '0') {
            $('#prjl_status_mental_tidak').prop('checked', true).change()
        }
        if (data.prjl_status_mental_opt_1 === '14') {
            $('#prjl_status_mental_opt_1_ya').prop('checked', true).change()
        }
        if (data.prjl_status_mental_opt_1 === '0') {
            $('#prjl_status_mental_opt_1_tidak').prop('checked', true).change()
        }
        if (data.prjl_status_mental_opt_2 === '14') {
            $('#prjl_status_mental_opt_2_ya').prop('checked', true).change()
        }
        if (data.prjl_status_mental_opt_2 === '0') {
            $('#prjl_status_mental_opt_2_tidak').prop('checked', true).change()
        }
        // status mental

        // penglihatan
        if (data.prjl_penglihatan === '1') {
            $('#prjl_penglihatan_ya').prop('checked', true).change()
        }
        if (data.prjl_penglihatan === '0') {
            $('#prjl_penglihatan_tidak').prop('checked', true).change()
        }
        if (data.prjl_penglihatan_opt_1 === '1') {
            $('#prjl_penglihatan_opt_1_ya').prop('checked', true).change()
        }
        if (data.prjl_penglihatan_opt_1 === '0') {
            $('#prjl_penglihatan_opt_1_tidak').prop('checked', true).change()
        }
        if (data.prjl_penglihatan_opt_2 === '1') {
            $('#prjl_penglihatan_opt_2_ya').prop('checked', true).change()
        }
        if (data.prjl_penglihatan_opt_2 === '0') {
            $('#prjl_penglihatan_opt_2_tidak').prop('checked', true).change()
        }
        // penglihatan

        // kebiasaan berkemih
        if (data.prjl_berkemih === '2') {
            $('#prjl_berkemih_ya').prop('checked', true).change()
        }
        if (data.prjl_berkemih === '0') {
            $('#prjl_berkemih_tidak').prop('checked', true).change()
        }
        // end kebiasaan berkemih

        // transfer
        if (data.prjl_transfer === '0') {
            $('#prjl_transfer_1').prop('checked', true).change()
        }
        if (data.prjl_transfer === '1') {
            $('#prjl_transfer_2').prop('checked', true).change()
        }
        if (data.prjl_transfer === '2') {
            $('#prjl_transfer_3').prop('checked', true).change()
        }
        if (data.prjl_transfer === '3') {
            $('#prjl_transfer_4').prop('checked', true).change()
        }
        // end transfer

        // mobilitas
        if (data.prjl_mobilitas === '0') {
            $('#prjl_mobilitas_1').prop('checked', true).change()
        }
        if (data.prjl_mobilitas === '1') {
            $('#prjl_mobilitas_2').prop('checked', true).change()
        }
        if (data.prjl_mobilitas === '2') {
            $('#prjl_mobilitas_3').prop('checked', true).change()
        }
        if (data.prjl_mobilitas === '3') {
            $('#prjl_mobilitas_4').prop('checked', true).change()
        }
        // end mobilitas
        // end penilaian resiko jatuh lansia

        $('#skala_nyeri_keperawatan').val(data.skala_nyeri)
        $('#frekuensi_nyeri_keperawatan').val(data.frekuensi_nyeri)
        $('#lama_nyeri_keperawatan').val(data.lama_nyeri)
        $('#kualitas_nyeri_keperawatan').val(data.kualitas_nyeri)
        $('#pemberat_nyeri_keperawatan').val(data.faktor_memperberat_nyeri)
        $('#pengurang_nyeri_keperawatan').val(data.faktor_mengurangi_nyeri)

        // end skala early warning system pews
        $('#kegiatan_keagamaan').val(data.kegiatan_keagamaan)

        // wajib ibadah
        if (data.wajib_ibadah === 'Baligh') {
            $('#wajib_ibadah_baligh').prop('checked', true).change()
        }
        if (data.wajib_ibadah === 'Belum Baligh') {
            $('#wajib_ibadah_belum').prop('checked', true).change()
        }
        if (data.wajib_ibadah === 'Halangan') {
            $('#wajib_ibadah_halangan').prop('checked', true).change()
        }
        $('#wajib_ibadah_halangan_input').val(data.ket_halangan);
        // end wajib ibadah

        if (data.thaharoh === 'Berwudhu') {
            $('#thaharoh_berwudhu').prop('checked', true).change()
        }
        if (data.thaharoh === 'Tayamum') {
            $('#thaharoh_tayamum').prop('checked', true).change()
        }

        if (data.sholat === 'Berdiri') {
            $('#sholat_berdiri').prop('checked', true).change()
        }
        if (data.sholat === 'Duduk') {
            $('#sholat_duduk').prop('checked', true).change()
        }
        if (data.sholat === 'Berbaring') {
            $('#sholat_berbaring').prop('checked', true).change()
        }

        var status_nutrisi = JSON.parse(data.status_nutrisi);
        if (status_nutrisi.penurunan_bb !== '0') {
            $('#penurunan_bb_tidak').prop('checked', true)
        }
        if (status_nutrisi.penurunan_bb !== '1') {
            $('#penurunan_bb_ya').prop('checked', true)
        }
        if (status_nutrisi.ket_penurunan_bb !== '') {
            $('#ket_penurunan_bb').val(status_nutrisi.ket_penurunan_bb).attr('disabled', false);
        }

        var sfn = JSON.parse(data.status_fungsional);
        if (sfn.mandiri !== '') {
            $('#sf_mandiri').prop('checked', true)
        }
        if (sfn.perlua_bantuan !== '') {
            $('#sf_perlu_bantuan').prop('checked', true)
        }
        if (sfn.ket_ketergantungan !== '') {
            $('#sf_ketergantungan').prop('checked', true)
            $('#ket_sf_ketergantungan').val(sfn.ket_ketergantungan).attr('disabled', false);
        }

        // masalah keperawatan
        var kep = JSON.parse(data.masalah_keperawatan);
        for (let i = 1; i <= 34; i++) {
            if (kep['ket_' + i] !== '') {
                $('#masalah_keperawatan_' + i).prop('checked', true)
            }
            if (kep.ket_lain !== '') {
                $('#masalah_keperawatan_lain_input').val(kep.ket_lain).attr('disabled', false)
            }
        }
        // end masalah keperawatan

        // perawat IGD
        if (data.id_perawat_igd !== null) {
            $('#perawat_igd').select2c('readonly', true)
            $('#perawat_igd').val(data.id_perawat_igd)
            $('#s2id_perawat_igd a .select2c-chosen').html(data.perawat)
        }

        if (data.signature_perawat_igd !== null) {
            $('#ttd_perawat_igdGDG').hide()
            $('#ttd_perawat_igd_verified').show()
        } else {
            $('#ttd_perawat_igdGDG').show()
            $('#ttd_perawat_igd_verified').hide()
        }
        // end perawat IGD

        // vefikasi DPJP
        if (data.id_dokter_dpjp !== null) {
            $('#verifikasi_dpjp_2').select2c('readonly', true)
            $('#verifikasi_dpjp_2').val(data.id_dokter_dpjp)
            $('#s2id_verifikasi_dpjp_2 a .select2c-chosen').html(data.verifikasi_dpjp)
        }

        if (data.signature_dokter_dpjp !== null) {
            $('#ttd_verifikasi_dpjp_2').hide()
            $('#ttd_verifikasi_dpjp_2_verified').show()
        } else {
            $('#ttd_verifikasi_dpjp_2').show()
            $('#ttd_verifikasi_dpjp_2_verified').hide()
        }
    }

    // PIM +
    function showKajianMaternal(data) {
        $('#id_pengkajian_maternal').val(data.id)
        $('#pm-waktu-kajian').val(data.pm_waktu_kajian)
        $('#pm-waktu-bidan').val(data.pm_waktu_bidan)
        $('#pm-waktu-dpjp').val(data.pm_waktu_dpjp)
        if (data.pm_diperoleh === '1') {
            $('#pm-diperoleh-pasien').prop('checked', true).change()
        }
        if (data.pm_diperoleh === '2') {
            $('#pm-diperoleh-keluarga').prop('checked', true).change()
        }
        if (data.pm_diperoleh === '3') {
            $('#pm-diperoleh-lain').prop('checked', true).change()
        }
        $('#pm-diperoleh-sebutkan').val(data.pm_diperoleh_sebutkan)
        if (data.pm_cara_masuk === '1') {
            $('#pm-cara-masuk-jalan').prop('checked', true).change()
        }
        $('#pm-diperoleh-sebutkan').val(data.pm_diperoleh_sebutkan)
        if (data.pm_cara_masuk === '2') {
            $('#pm-cara-masuk-kursi').prop('checked', true).change()
        }
        if (data.pm_cara_masuk === '3') {
            $('#pm-cara-masuk-bantuan').prop('checked', true).change()
        }
        if (data.pm_cara_masuk === '4') {
            $('#pm-cara-masuk-Brangkar').prop('checked', true).change()
        }

        // PEMERIKSAAN KELUHAN UTAMA
        $('#pm-keluhan-utama').val(data.pm_keluhan_utama)

        if (data.pm_kontraksi === '1') {
            $('#pm-kontraksi').prop('checked', true).change()
            $('#pm-waktu-kontraksi').prop('disabled', false).change()
        }
        $('#pm-waktu-kontraksi').val(data.pm_waktu_kontraksi)

        if (data.pm_lendir === '1') {
            $('#pm-lendir').prop('checked', true).change()
            $('#pm-waktu-lendir').prop('disabled', false).change()
        }
        $('#pm-waktu-lendir').val(data.pm_waktu_lendir)

        if (data.pm_ketuban === '1') {
            $('#pm-ketuban').prop('checked', true).change()
            $('#pm-waktu-ketuban').prop('disabled', false).change()
            $('#pm-warna-ketuban').prop('disabled', false).change()
        }
        $('#pm-waktu-ketuban').val(data.pm_waktu_ketuban)
        $('#pm-warna-ketuban').val(data.pm_warna_ketuban)

        if (data.pm_darah === '1') {
            $('#pm-darah').prop('checked', true).change()
            $('#pm-darah-sebutkan').prop('disabled', false).change()
        }
        $('#pm-darah-sebutkan').val(data.pm_darah_sebutkan)

        if (data.pm_lainnya === '1') {
            $('#pm-lainnya').prop('checked', true).change()
            $('#pm-lainnya-sebutkan').prop('disabled', false).change()
        }
        $('#pm-lainnya-sebutkan').val(data.pm_lainnya_sebutkan)

        // RIWAYAT PENYAKIT SEKARANG
        if (data.pm_hamil_muda !== null) {
            $('#pm-hamil-muda-mual ').prop('checked', true)
        }
        if (data.pm_hamil_muda_muntah !== null) {
            $('#pm-hamil-muda-muntah ').prop('checked', true)
        }
        if (data.pm_hamil_muda_pendarahan !== null) {
            $('#pm-hamil-muda-pendarahan ').prop('checked', true)
        }
        if (data.pm_hamil_muda_lain !== null) {
            $('#pm-hamil-muda-lain ').prop('checked', true)
        }


        $('#pm-hamil-muda-sebutkan').val(data.pm_hamil_muda_sebutkan)

        if (data.pm_hamil_tua !== null) {
            $('#pm-hamil-tua-pusing ').prop('checked', true)
        }
        if (data.pm_hamil_tua_kepala !== null) {
            $('#pm-hamil-tua-sakit-kepala').prop('checked', true)
        }
        if (data.pm_hamil_tua_pendarahan !== null) {
            $('#pm-hamil-tua-pendarahan ').prop('checked', true)
        }
        if (data.pm_hamil_tua_lain !== null) {
            $('#pm-hamil-tua-lain ').prop('checked', true)
        }

        $('#pm-hamil-tua-sebutkan').val(data.pm_hamil_tua_sebutkan)

        $('#pm-anc-x').val(data.pm_anc_x)
        $('#pm-anc-lokasi').val(data.pm_anc_lokasi)

        if (data.pm_anc !== null) {
            $('#pm-anc-teratur ').prop('checked', true)
        }
        if (data.pm_anc_tidak_teratur !== null) {
            $('#pm-anc-tidak-teratur').prop('checked', true)
        }
        if (data.pm_anc_imunisasi !== null) {
            $('#pm-anc-imunisasi').prop('checked', true)
        }

        // RIWAYAT KEHAMILAN PERSALINAN DAN NIFAS YANG LALU
        $('#pm-nifas-g').val(data.pm_nifas_g)
        $('#pm-nifas-p').val(data.pm_nifas_p)
        $('#pm-nifas-a').val(data.pm_nifas_a)
        $('#pm-nifas-hidup').val(data.pm_nifas_hidup)

        // $('#pm-waktu-partus-1').val(data.pm_waktu_partus_1)

        $('#pm-waktu-partus-1').val(datefmysql(data.pm_waktu_partus_1));
        $('#pm-tempat-partus-1').val(data.pm_tempat_partus_1)
        $('#pm-umur-hamil-1').val(data.pm_umur_hamil_1)
        $('#pm-jenis-persalinan-1').val(data.pm_jenis_persalinan_1)
        $('#pm-penolong-persalinan-1').val(data.pm_penolong_persalinan_1)
        $('#pm-penyulit-1').val(data.pm_penyulit_1)
        $('#pm-nifas-1').val(data.pm_nifas_1)
        $('#pm-kelamin-1').val(data.pm_kelamin_1)
        $('#pm-keadaan-1').val(data.pm_keadaan_1)

        // $('#pm-waktu-partus-2').val(data.pm_waktu_partus_2)
        $('#pm-waktu-partus-2').val(datefmysql(data.pm_waktu_partus_2));
        $('#pm-tempat-partus-2').val(data.pm_tempat_partus_2)
        $('#pm-umur-hamil-2').val(data.pm_umur_hamil_2)
        $('#pm-jenis-persalinan-2').val(data.pm_jenis_persalinan_2)
        $('#pm-penolong-persalinan-2').val(data.pm_penolong_persalinan_2)
        $('#pm-penyulit-2').val(data.pm_penyulit_2)
        $('#pm-nifas-2').val(data.pm_nifas_2)
        $('#pm-kelamin-2').val(data.pm_kelamin_2)
        $('#pm-keadaan-2').val(data.pm_keadaan_2)

        // $('#pm-waktu-partus-3').val(data.pm_waktu_partus_3)
        $('#pm-waktu-partus-3').val(datefmysql(data.pm_waktu_partus_3));
        $('#pm-tempat-partus-3').val(data.pm_tempat_partus_3)
        $('#pm-umur-hamil-3').val(data.pm_umur_hamil_3)
        $('#pm-jenis-persalinan-3').val(data.pm_jenis_persalinan_3)
        $('#pm-penolong-persalinan-3').val(data.pm_penolong_persalinan_3)
        $('#pm-penyulit-3').val(data.pm_penyulit_3)
        $('#pm-nifas-3').val(data.pm_nifas_3)
        $('#pm-kelamin-3').val(data.pm_kelamin_3)
        $('#pm-keadaan-3').val(data.pm_keadaan_3)

        // $('#pm-waktu-partus-4').val(data.pm_waktu_partus_4)
        $('#pm-waktu-partus-4').val(datefmysql(data.pm_waktu_partus_4));
        $('#pm-tempat-partus-4').val(data.pm_tempat_partus_4)
        $('#pm-umur-hamil-4').val(data.pm_umur_hamil_4)
        $('#pm-jenis-persalinan-4').val(data.pm_jenis_persalinan_4)
        $('#pm-penolong-persalinan-4').val(data.pm_penolong_persalinan_4)
        $('#pm-penyulit-4').val(data.pm_penyulit_4)
        $('#pm-nifas-4').val(data.pm_nifas_4)
        $('#pm-kelamin-4').val(data.pm_kelamin_4)
        $('#pm-keadaan-4').val(data.pm_keadaan_4)

        // $('#pm-waktu-partus-5').val(data.pm_waktu_partus_5)
        $('#pm-waktu-partus-5').val(datefmysql(data.pm_waktu_partus_5));
        $('#pm-tempat-partus-5').val(data.pm_tempat_partus_5)
        $('#pm-umur-hamil-5').val(data.pm_umur_hamil_5)
        $('#pm-jenis-persalinan-5').val(data.pm_jenis_persalinan_5)
        $('#pm-penolong-persalinan-5').val(data.pm_penolong_persalinan_5)
        $('#pm-penyulit-5').val(data.pm_penyulit_5)
        $('#pm-nifas-5').val(data.pm_nifas_5)
        $('#pm-kelamin-5').val(data.pm_kelamin_5)
        $('#pm-keadaan-5').val(data.pm_keadaan_5)

        // $('#pm-waktu-partus-6').val(data.pm_waktu_partus_6)
        $('#pm-waktu-partus-6').val(datefmysql(data.pm_waktu_partus_6));
        $('#pm-tempat-partus-6').val(data.pm_tempat_partus_6)
        $('#pm-umur-hamil-6').val(data.pm_umur_hamil_6)
        $('#pm-jenis-persalinan-6').val(data.pm_jenis_persalinan_6)
        $('#pm-penolong-persalinan-6').val(data.pm_penolong_persalinan_6)
        $('#pm-penyulit-6').val(data.pm_penyulit_6)
        $('#pm-nifas-6').val(data.pm_nifas_6)
        $('#pm-kelamin-6').val(data.pm_kelamin_6)
        $('#pm-keadaan-6').val(data.pm_keadaan_6)

        // RIWAYAT MENSTRUASI
        if (data.pm_umur_menarche === '1') {
            $('#pm-umur-menarche').prop('checked', true).change()
            $('#pm-umur-menarche-sebutkan').prop('disabled', false).change()
            $('#pm-lama-haid').prop('disabled', false).change()
            $('#pm-pembalut').prop('disabled', false).change()
        }
        $('#pm-umur-menarche-sebutkan').val(data.pm_umur_menarche_sebutkan)
        $('#pm-lama-haid').val(data.pm_lama_haid)
        $('#pm-pembalut').val(data.pm_pembalut)
        if (data.pm_dismenorroe === '1') {
            $('#pm-dismenorroe').prop('checked', true).change()
        }
        if (data.pm_spoting === '1') {
            $('#pm-spoting').prop('checked', true).change()
        }
        if (data.pm_menorrhagia === '1') {
            $('#pm-menorrhagia').prop('checked', true).change()
        }
        if (data.pmm_metrorhagia === '1') {
            $('#pmm-metrorhagia').prop('checked', true).change()
        }
        if (data.pm_menstrual === '1') {
            $('#pm-menstrual').prop('checked', true).change()
        }
        $('#pm-hpht').val(data.pm_hpht)
        $('#pm-taksiran').val(data.pm_taksiran)
        if (data.pm_asma === '1') {
            $('#pm-asma').prop('checked', true).change()
        }
        if (data.pm_hipertensi === '1') {
            $('#pm-hipertensi').prop('checked', true).change()
        }
        if (data.pm_jantung === '1') {
            $('#pm-jantung').prop('checked', true).change()
        }
        if (data.pm_diabetes === '1') {
            $('#pm-diabetes').prop('checked', true).change()
        }
        if (data.pm_penyakit_lain === '1') {
            $('#pm-penyakit-lain').prop('checked', true).change()
            $('#pm-penyakit-sebutkan').prop('disabled', false).change()
        }
        $('#pm-penyakit-sebutkan').val(data.pm_penyakit_lain_sebutkan)
        if (data.pm_kesadaran === '1') {
            $('#pm-kesadaran-cm').prop('checked', true).change()
        }
        if (data.pm_kesadaran === '2') {
            $('#pm-kesadaran-apatis').prop('checked', true).change()
        }
        if (data.pm_kesadaran === '3') {
            $('#pm-kesadaran-samnolen').prop('checked', true).change()
        }
        if (data.pm_kesadaran === '4') {
            $('#pm-kesadaran-sopor').prop('checked', true).change()
        }
        if (data.pm_kesadaran === '5') {
            $('#pm-kesadaran-koma').prop('checked', true).change()
        }
        $('#pm-sistolik').val(data.pm_sistolik)
        $('#pm-suhu-sistolik').val(data.pm_suhu_sistolik)
        $('#pm-diastolik').val(data.pm_diastolik)
        // $('#pm-suhu-diastolik').val(data.pm_suhu_diastolik)
        $('#pm-cgs-e').val(data.pm_cgs_e)
        $('#pm-cgs-m').val(data.pm_cgs_m)
        $('#pm-cgs-v').val(data.pm_cgs_v)
        $('#pm-cgs-total').val(data.pm_cgs_total)
        $('#pm-spo2').val(data.pm_spo2)
        $('#pm-frekuensi-nadi').val(data.pm_frekuensi_nadi)
        $('#pm-frekuensi-nafas').val(data.pm_frekuensi_nafas)

        // PEMERIKSAAN KEBIDANAN DAN KANDUNGAN
        if (data.pm_membesar === '1') {
            $('#pm-membesar').prop('checked', true).change()
        }
        if (data.pm_melebar === '1') {
            $('#pm-melebar').prop('checked', true).change()
        }
        if (data.pm_pelebaran === '1') {
            $('#pm-pelebaran').prop('checked', true).change()
        }
        if (data.pm_linea_alba === '1') {
            $('#pm-linea-alba').prop('checked', true).change()
        }
        if (data.pm_linea_nigra === '1') {
            $('#pm-linea-nigra').prop('checked', true).change()
        }
        if (data.pm_striae_livide === '1') {
            $('#pm-striae-livide').prop('checked', true).change()
        }
        if (data.pm_striae_albican === '1') {
            $('#pm-striae-albican').prop('checked', true).change()
        }
        if (data.pm_luka === '1') {
            $('#pm-luka').prop('checked', true).change()
        }
        if (data.pm_luka_lain === '1') {
            $('#pm-luka-lain').prop('checked', true).change()
            $('#pm-luka-sebutkan').prop('disabled', false).change()
        }
        $('#pm-luka-sebutkan').val(data.pm_luka_lain_sebutkan)
        $('#pm-tfu').val(data.pm_tfu)

        if (data.pm_leopold_1 !== null) {
            $('#pm-leopold-1-kepala').prop('checked', true)
        }
        if (data.pm_leopold_bokong !== null) {
            $('#pm-leopold-1-bokong').prop('checked', true)
        }
        if (data.pm_leopold_lain !== null) {
            $('#pm-leopold-1-lain').prop('checked', true)
        }

        $('#pm-leopold-1-sebutkan').val(data.pm_leopold_1_sebutkan)

        if (data.pm_leopold_2 !== null) {
            $('#pm-leopold-2-punggung-kanan').prop('checked', true)
        }
        if (data.pm_leopold_punggung !== null) {
            $('#pm-leopold-2-punggung-kiri').prop('checked', true)
        }
        if (data.pm_leopold_lainn !== null) {
            $('#pm-leopold-2-lain').prop('checked', true)
        }

        $('#pm-leopold-2-sebutkan').val(data.pm_leopold_2_sebutkan)

        if (data.pm_leopold_3 !== null) {
            $('#pm-leopold-3-kepala').prop('checked', true)
        }
        if (data.pm_leopold_bokonggg !== null) {
            $('#pm-leopold-3-bokong').prop('checked', true)
        }
        if (data.pm_leopold_lainnn !== null) {
            $('#pm-leopold-3-lain').prop('checked', true)
        }

        $('#pm-leopold-3-sebutkan').val(data.pm_leopold_3_sebutkan)

        if (data.pm_leopold_4 !== null) {
            $('#pm-leopold-4-kepala').prop('checked', true)
        }
        if (data.pm_leopold_bokongggg !== null) {
            $('#pm-leopold-4-bokong').prop('checked', true)
        }

        $('#pm-janin-masuk').val(data.pm_janin_masuk)
        $('#pm-taksiran-janin').val(data.pm_taksiran_janin)
        $('#pm-djj-x').val(data.pm_djj_x)
        if (data.pm_djj === '1') {
            $('#pm-djj-teratur').prop('checked', true).change()
        }
        if (data.pm_djj === '2') {
            $('#pm-djj-tidak-teratur').prop('checked', true).change()
        }
        if (data.pm_djj === '3') {
            $('#pm-djj-tidak-terdengar').prop('checked', true).change()
        }
        $('#pm-gerak-janin').val(data.pm_gerak_janin)
        $('#pm-his-x').val(data.pm_his_x)
        $('#pm-his-detik').val(data.pm_his_detik)
        $('#pm-his-kekuatan').val(data.pm_his_kekuatan)
        if (data.pm_vulva === '1') {
            $('#pm-vulva-normal').prop('checked', true).change()
        }
        if (data.pm_vulva === '2') {
            $('#pm-vulva-lain').prop('checked', true).change()
            $('#pm-vulva-sebutkan').prop('disabled', false).change()
        }
        $('#pm-vulva-sebutkan').val(data.pm_vulva_sebutkan)
        if (data.pm_pengeluaran_lendir === '1') {
            $('#pm-pengeluaran-lendir').prop('checked', true).change()
        }
        if (data.pm_pengeluaran_ketuban === '1') {
            $('#pm-pengeluaran-ketuban').prop('checked', true).change()
            $('#pm-pengeluaran-ketuban-warna').prop('disabled', false).change()
        }
        $('#pm-pengeluaran-ketuban-warna').val(data.pm_pengeluaran_ketuban_warna)
        if (data.pm_pengeluaran_flex === '1') {
            $('#pm-pengeluaran-flex').prop('checked', true).change()
        }
        if (data.pm_pengeluaran_darah === '1') {
            $('#pm-pengeluaran-darah').prop('checked', true).change()
            $('#pm-pengeluaran-darah-sebanyak').prop('disabled', false).change()
        }
        $('#pm-pengeluaran-darah-sebanyak').val(data.pm_pengeluaran_darah_sebanyak)
        if (data.pm_pengeluaran_lain === '1') {
            $('#pm-pengeluaran-lain').prop('checked', true).change()
            $('#pm-pengeluaran-sebutkan').prop('disabled', false).change()
        }
        $('#pm-pengeluaran-sebutkan').val(data.pm_pengeluaran_lain_sebutkan)
        if (data.pm_introitus === '1') {
            $('#pm-introitus-benjolan').prop('checked', true).change()
        }
        if (data.pm_introitus === '2') {
            $('#pm-introitus-lain').prop('checked', true).change()
            $('#pm-introitus-sebutkan').prop('disabled', false).change()
        }
        $('#pm-introitus-sebutkan').val(data.pm_introitus_sebutkan)
        if (data.pm_porsio === '1') {
            $('#pm-porsio-benjolan').prop('checked', true).change()
        }
        if (data.pm_porsio === '2') {
            $('#pm-porsio-lain').prop('checked', true).change()
            $('#pm-porsio-sebutkan').prop('disabled', false).change()
        }



        $('#pm-porsio-sebutkan').val(data.pm_porsio_sebutkan)
        $('#pm-pembukaan').val(data.pm_pembukaan)



        if (data.pm_pembukaan_ketuban === '0') {
            $('#pm-pembukaan-utuh').prop('checked', true).change()
        }
        if (data.pm_pembukaan_ketuban === '1') {
            $('#pm-pembukaan-pecah').prop('checked', true).change()
            $('#pm-pembukaan-ketuban-warna').prop('disabled', false).change()
        }
        $('#pm-pembukaan-ketuban-warna').val(data.pm_pembukaan_ketuban_warna)
        $('#pm-hodge').val(data.pm_hodge)
        $('#pm-uuk').val(data.pm_uuk)
        $('#pm-moulage').val(data.pm_moulage)
        if (data.pm_nyeri_porsio === '1') {
            $('#pm-nyeri-ya').prop('checked', true).change()
        }
        if (data.pm_nyeri_porsio === '2') {
            $('#pm-nyeri-tidak').prop('checked', true).change()
        }

        // PENILAIAN RESIKO JATUH
        if (data.pm_jatuh === '25') {
            $('#pm-jatuh-ya').prop('checked', true).change()
        }
        if (data.pm_jatuh === '0') {
            $('#pm-jatuh-tidak').prop('checked', true).change()
        }
        if (data.pm_diagnosis === '15') {
            $('#pm-diagnosis-ya').prop('checked', true).change()
        }
        if (data.pm_diagnosis === '0') {
            $('#pm-diagnosis-tidak').prop('checked', true).change()
        }
        if (data.pm_kursi_roda === '1') {
            $('#pm-kursi-roda').prop('checked', true).change()
            $('#pm-kursi-roda-ya').prop('disabled', false).change()
        }
        if (data.pm_kursi_roda_ya === '0') {
            $('#pm-kursi-roda-ya').prop('checked', true).change()
        }
        if (data.pm_kruk === '1') {
            $('#pm-kruk').prop('checked', true).change()
            $('#pm-kruk-ya').prop('disabled', false).change()
        }
        if (data.pm_kruk_ya === '15') {
            $('#pm-kruk-ya').prop('checked', true).change()
        }
        if (data.pm_pegangan === '1') {
            $('#pm-pegangan').prop('checked', true).change()
            $('#pm-pegangan-ya').prop('disabled', false).change()
        }
        if (data.pm_pegangan_ya === '30') {
            $('#pm-pegangan-ya').prop('checked', true).change()
        }
        if (data.pm_heparin === '20') {
            $('#pm-heparin-ya').prop('checked', true).change()
        }
        if (data.pm_heparin === '0') {
            $('#pm-heparin-tidak').prop('checked', true).change()
        }
        if (data.pm_imobilisasi === '1') {
            $('#pm-imobilisasi').prop('checked', true).change()
            $('#pm-imobilisasi-ya').prop('disabled', false).change()
        }
        if (data.pm_imobilisasi_ya === '0') {
            $('#pm-imobilisasi-ya').prop('checked', true).change()
        }
        if (data.pm_lemah === '1') {
            $('#pm-lemah').prop('checked', true).change()
            $('#pm-lemah-ya').prop('disabled', false).change()
        }
        if (data.pm_lemah_ya === '10') {
            $('#pm-lemah-ya').prop('checked', true).change()
        }
        if (data.pm_terganggu === '1') {
            $('#pm-terganggu').prop('checked', true).change()
            $('#pm-terganggu-ya').prop('disabled', false).change()
        }
        if (data.pm_terganggu_ya === '20') {
            $('#pm-terganggu-ya').prop('checked', true).change()
        }
        if (data.pm_kemampuan === '1') {
            $('#pm-kemampuan').prop('checked', true).change()
            $('#pm-kemampuan-ya').prop('disabled', false).change()
        }
        if (data.pm_kemampuan_ya === '0') {
            $('#pm-kemampuan-ya').prop('checked', true).change()
        }
        if (data.pm_lupa === '1') {
            $('#pm-lupa').prop('checked', true).change()
            $('#pm-lupa-ya').prop('disabled', false).change()
        }
        if (data.pm_lupa_ya === '15') {
            $('#pm-lupa-ya').prop('checked', true).change()
        }
        $('#pm-jumlah-skor').val(data.pm_jumlah_skor)

        // PENILAIAN TINGKAT NYERI
        $('#pm-skala-nyeri').val(data.pm_skala_nyeri)
        $('#pm-kualitas-nyeri').val(data.pm_kualitas_nyeri)
        $('#pm-frekuensi-nyeri').val(data.pm_frekuensi_nyeri)
        $('#pm-pemberat-nyeri').val(data.pm_pemberat_nyeri)
        $('#pm-lama-nyeri').val(data.pm_lama_nyeri)
        $('#pm-pengurang-nyeri').val(data.pm_pengurang_nyeri)

        // RIWAYAT ALERGI
        if (data.pm_alergi === '1') {
            $('#pm-alergi-tidak').prop('checked', true).change()
        }
        if (data.pm_alergi === '2') {
            $('#pm-alergi-tidak-tahu').prop('checked', true).change()
        }
        if (data.pm_alergi === '3') {
            $('#pm-alergi-ya').prop('checked', true).change()
        }
        $('#pm-alergi-obat').val(data.pm_alergi_obat)
        $('#pm-alergi-obat-reaksi').val(data.pm_alergi_obat_reaksi)
        $('#pm-alergi-makan').val(data.pm_alergi_makan)
        $('#pm-alergi-makan-reaksi').val(data.pm_alergi_makan_reaksi)
        $('#pm-alergi-lain').val(data.pm_alergi_lain)
        $('#pm-alergi-lain-reaksi').val(data.pm_alergi_lain_reaksi)
        $('#pm-alergi-obat-konsumsi').val(data.pm_alergi_obat_konsumsi)

        // STATUS NUTRISI
        if (data.pm_berat_badan === '1') {
            $('#pm-berat-badan-tidak').prop('checked', true).change()
        }
        if (data.pm_berat_badan === '2') {
            $('#pm-berat-badan-ya').prop('checked', true).change()
        }
        $('#pm-berat-badan-kg').val(data.pm_berat_badan_kg)

        if (data.pm_berat_badan_t !== null) {
            $('#pm-berat-badan-lain ').prop('checked', true)
        }

        $('#pm-berat-badan-sebutkan').val(data.pm_berat_badan_sebutkan)

        // STATUS FUNGSIONAL
        if (data.pm_fungsional === '1') {
            $('#pm-fungsional-mandiri').prop('checked', true).change()
        }
        if (data.pm_fungsional === '2') {
            $('#pm-fungsional-bantuan').prop('checked', true).change()
        }
        if (data.pm_fungsional === '3') {
            $('#pm-fungsional-ketergantungan').prop('checked', true).change()
        }
        $('#pm-fungsional-sebutkan').val(data.pm_fungsional_sebutkan)

        // PSIKOSOSIAL EKONOMI
        if (data.pm_psikologis === '1') {
            $('#pm-psikologis-cemas').prop('checked', true).change()
        }
        if (data.pm_psikologis === '2') {
            $('#pm-psikologis-takut').prop('checked', true).change()
        }
        if (data.pm_psikologis === '3') {
            $('#pm-psikologis-marah').prop('checked', true).change()
        }
        if (data.pm_psikologis === '4') {
            $('#pm-psikologis-sedih').prop('checked', true).change()
        }
        if (data.pm_psikologis === '5') {
            $('#pm-psikologis-bunuh').prop('checked', true).change()
        }
        if (data.pm_psikologis === '6') {
            $('#pm-psikologis-lain').prop('checked', true).change()
        }
        $('#pm-psikologis-sebutkan').val(data.pm_psikologis_sebutkan)
        if (data.pm_mental === '1') {
            $('#pm-mental-sadar').prop('checked', true).change()
        }
        if (data.pm_mental === '2') {
            $('#pm-mental-masalah').prop('checked', true).change()
        }
        $('#pm-mental-sebutkan').val(data.pm_mental_sebutkan)
        if (data.pm_mental === '3') {
            $('#pm-mental-kekerasan').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '1') {
            $('#pm-pekerjaan-wiraswasta').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '2') {
            $('#pm-pekerjaan-pegawai-swasta').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '3') {
            $('#pm-pekerjaan-pns').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '4') {
            $('#pm-pekerjaan-pensiunan').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '5') {
            $('#pm-pekerjaan-pengangguran').prop('checked', true).change()
        }
        if (data.pm_bayar === '1') {
            $('#pm-bayar-sendiri').prop('checked', true).change()
        }
        if (data.pm_bayar === '2') {
            $('#pm-bayar-bpjs').prop('checked', true).change()
        }
        if (data.pm_bayar === '3') {
            $('#pm-bayar-pns').prop('checked', true).change()
        }
        $('#pm-bayar-asuransi').val(data.pm_bayar_asuransi_sebutkan)

        if (data.pm_bayar_t !== null) {
            $('#pm-bayar-lain ').prop('checked', true)
        }

        $('#pm-bayar-sebutkan').val(data.pm_bayar_sebutkan)

        // PENGKAJIAN SPIRITUAL
        $('#pm-keagamaan').val(data.pm_keagamaan)
        if (data.pm_ibadah === '1') {
            $('#pm-ibadah-baligh').prop('checked', true).change()
        }
        if (data.pm_ibadah === '2') {
            $('#pm-ibadah-belum').prop('checked', true).change()
        }
        if (data.pm_ibadah === '3') {
            $('#pm-ibadah-lain').prop('checked', true).change()
        }
        $('#pm-ibadah-sebutkan').val(data.pm_ibadah_sebutkan)
        if (data.pm_thaharoh === '1') {
            $('#pm-thaharoh-wudhu').prop('checked', true).change()
        }
        if (data.pm_thaharoh === '2') {
            $('#pm-thaharoh-tayamum').prop('checked', true).change()
        }
        if (data.pm_sholat === '1') {
            $('#pm-sholat-berdiri').prop('checked', true).change()
        }
        if (data.pm_sholat === '2') {
            $('#pm-sholat-duduk').prop('checked', true).change()
        }
        if (data.pm_sholat === '3') {
            $('#pm-sholat-berbaring').prop('checked', true).change()
        }

        // KEBUTUHAN BIOLOGIS
        $('#pm-banyak-makan').val(data.pm_banyak_makan)
        $('#pm-waktu-makan').val(data.pm_waktu_makan)
        $('#pm-banyak-minum').val(data.pm_banyak_minum)
        $('#pm-waktu-minum').val(data.pm_waktu_minum)
        $('#pm-banyak-bak').val(data.pm_banyak_bak)
        $('#pm-waktu-bak').val(data.pm_waktu_bak)
        $('#pm-banyak-bab').val(data.pm_banyak_bab)
        $('#pm-waktu-bab').val(data.pm_waktu_bab)
        $('#pm-sex').val(data.pm_sex)

        // SKALA EARLY WARNING SYSTEM (EWS)
        if (data.sews_respirasit == '3_1') {
            $('#skalameowst-1-1').prop('checked', true).change()
        }
        if (data.sews_respirasit == '0_2') {
            $('#skalameowst-1-2').prop('checked', true).change()
        }
        if (data.sews_respirasit == '2_3') {
            $('#skalameowst-1-3').prop('checked', true).change()
        }
        if (data.sews_respirasit == '3_4') {
            $('#skalameowst-1-4').prop('checked', true).change()
        }
        if (data.sews_saturasit == '3_1') {
            $('#skalameowst-2-1').prop('checked', true).change()
        }
        if (data.sews_saturasit == '2_2') {
            $('#skalameowst-2-2').prop('checked', true).change()
        }
        if (data.sews_saturasit == '0_3') {
            $('#skalameowst-2-3').prop('checked', true).change()
        }
        if (data.sews_o2t == '2_1') {
            $('#skalameowst-3-1').prop('checked', true).change()
        }
        if (data.sews_o2t == '0_2') {
            $('#skalameowst-3-2').prop('checked', true).change()
        }
        if (data.sews_suhut == '3_1') {
            $('#skalameowst-4-1').prop('checked', true).change()
        }
        if (data.sews_suhut == '0_2') {
            $('#skalameowst-4-2').prop('checked', true).change()
        }
        if (data.sews_suhut == '2_3') {
            $('#skalameowst-4-3').prop('checked', true).change()
        }
        if (data.sews_suhut == '3_4') {
            $('#skalameowst-4-4').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '3_1') {
            $('#skalameowst-5-1').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '0_2') {
            $('#skalameowst-5-2').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '1_3') {
            $('#skalameowst-5-3').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '2_4') {
            $('#skalameowst-5-4').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '3_5') {
            $('#skalameowst-5-5').prop('checked', true).change()
        }
        if (data.sews_td_diastolikt == '0_1') {
            $('#skalameowst-6-1').prop('checked', true).change()
        }
        if (data.sews_td_diastolikt == '1_2') {
            $('#skalameowst-6-2').prop('checked', true).change()
        }
        if (data.sews_td_diastolikt == '2_3') {
            $('#skalameowst-6-3').prop('checked', true).change()
        }
        if (data.sews_td_diastolikt == '3_4') {
            $('#skalameowst-6-4').prop('checked', true).change()
        }
        if (data.sews_nadit == '3_1') {
            $('#skalameowst-7-1').prop('checked', true).change()
        }
        if (data.sews_nadit == '2_2') {
            $('#skalameowst-7-2').prop('checked', true).change()
        }
        if (data.sews_nadit == '0_3') {
            $('#skalameowst-7-3').prop('checked', true).change()
        }
        if (data.sews_nadit == '1_4') {
            $('#skalameowst-7-4').prop('checked', true).change()
        }
        if (data.sews_nadit == '2_5') {
            $('#skalameowst-7-5').prop('checked', true).change()
        }
        if (data.sews_nadit == '3_6') {
            $('#skalameowst-7-6').prop('checked', true).change()
        }
        if (data.sews_kesadarant == '0_1') {
            $('#skalameowst-8-1').prop('checked', true).change()
        }
        if (data.sews_kesadarant == '3_2') {
            $('#skalameowst-8-2').prop('checked', true).change()
        }
        if (data.sews_nyerit == '0_1') {}
        if (data.sews_nyerit == '3_2') {
            $('#skalameowst-9-2').prop('checked', true).change()
        }
        if (data.sews_pengeluwarant == '0_1') {
            $('#skalameowst-10-1').prop('checked', true).change()
        }
        if (data.sews_pengeluwarant == '3_2') {
            $('#skalameowst-10-2').prop('checked', true).change()
        }
        if (data.sews_proteint == '2_1') {
            $('#skalameowst-11-1').prop('checked', true).change()
        }
        if (data.sews_proteint == '3_2') {
            $('#skalameowst-11-2').prop('checked', true).change()
        }
        if (data.pm_meows === 'Putih') {
            $('#total-skalameowst-1').prop('checked', true).change()
        }
        if (data.pm_meows === 'Hijau') {
            $('#total-skalameowst-2').prop('checked', true).change()
        }
        if (data.pm_meows === 'Kuning') {
            $('#total-skalameowst-3').prop('checked', true).change()
        }
        if (data.pm_meows === 'Merah') {
            $('#total-skalameowst-4').prop('checked', true).change()
        }

        //  MEOWS
        var skala_early = [data.sews_respirasit, data.sews_saturasit, data.sews_o2t, data
            .sews_suhut, data.sews_td_sintolikt, data.sews_td_diastolikt, data.sews_nadit, data
            .sews_kesadarant, data.sews_nyerit, data.sews_pengeluwarant, data.sews_proteint
        ];
        for (let i = 0; i <= skala_early.length; i++) {
            for (let j = 1; j <= 8; j++) {
                var z = i + 1;
                if (skala_early[i] === $('#skalameowst-' + z + '-' + j).val()) {
                    $('#skalameowst-' + z + '-' + j).prop('checked', true).change()
                }
            }
        }

        // NEWS
        if (data.sews_laju_respirasio == '3_1') {
            $('#skalanewso-1-1').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == '1_2') {
            $('#skalanewso-1-2').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == '0_3') {
            $('#skalanewso-1-3').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == '2_4') {
            $('#skalanewso-1-4').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == '3_5') {
            $('#skalanewso-1-5').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == 'bk_6') {
            $('#skalanewso-1-6').prop('checked', true).change()
        }
        if (data.sews_saturasio == '3_1') {
            $('#skalanewso-2-1').prop('checked', true).change()
        }
        if (data.sews_saturasio == '2_2') {
            $('#skalanewso-2-2').prop('checked', true).change()
        }
        if (data.sews_saturasio == '1_3') {
            $('#skalanewso-2-3').prop('checked', true).change()
        }
        if (data.sews_saturasio == '0_4') {
            $('#skalanewso-2-4').prop('checked', true).change()
        }
        if (data.sews_suplemeno == '2_1') {
            $('#skalanewso-3-1').prop('checked', true).change()
        }
        if (data.sews_suplemeno == '0_2') {
            $('#skalanewso-3-2').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '3_1') {
            $('#skalanewso-4-1').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '1_2') {
            $('#skalanewso-4-2').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '0_3') {
            $('#skalanewso-4-3').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '1_4') {
            $('#skalanewso-4-4').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '2_5') {
            $('#skalanewso-4-5').prop('checked', true).change()
        }
        if (data.sews_tdso == '3_1') {
            $('#skalanewso-5-1').prop('checked', true).change()
        }
        if (data.sews_tdso == '1_2') {
            $('#skalanewso-5-2').prop('checked', true).change()
        }
        if (data.sews_tdso == '0_3') {
            $('#skalanewso-5-3').prop('checked', true).change()
        }
        if (data.sews_tdso == '1_4') {
            $('#skalanewso-5-4').prop('checked', true).change()
        }
        if (data.sews_tdso == '2_5') {
            $('#skalanewso-5-5').prop('checked', true).change()
        }
        if (data.sews_tdso == '3_6') {
            $('#skalanewso-5-6').prop('checked', true).change()
        }
        if (data.sews_tdso == 'bk_7') {
            $('#skalanewso-5-7').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '3_1') {
            $('#skalanewso-6-1').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '0_2') {
            $('#skalanewso-6-2').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '1_3') {
            $('#skalanewso-6-3').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '2_4') {
            $('#skalanewso-6-4').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '3_5') {
            $('#skalanewso-6-5').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == 'bk_6') {
            $('#skalanewso-6-6').prop('checked', true).change()
        }
        if (data.sews_kesadarano == '0_1') {
            $('#skalanewso-7-1').prop('checked', true).change()
        }
        if (data.sews_kesadarano == '3_2') {
            $('#skalanewso-7-2').prop('checked', true).change()
        }
        if (data.sews_kesadarano == 'bk_3') {
            $('#skalanewso-7-3').prop('checked', true).change()
        }
        if (data.pm_news === 'Putih') {
            $('#total-skalanewso-1').prop('checked', true).change()
        }
        if (data.pm_news === 'Hijau') {
            $('#total-skalanewso-2').prop('checked', true).change()
        }
        if (data.pm_news === 'Kuning') {
            $('#total-skalanewso-3').prop('checked', true).change()
        }
        if (data.pm_news === 'Merah') {
            $('#total-skalanewso-4').prop('checked', true).change()
        }


        // NEWS
        var skala_early = [data.sews_laju_respirasio, data.sews_saturasio, data.sews_suplemeno, data
            .sews_temperaturo, data.sews_tdso, data.sews_laju_jantungo, data.sews_kesadarano
        ];
        for (let i = 0; i <= skala_early.length; i++) {
            for (let j = 1; j <= 8; j++) {
                var z = i + 1;
                if (skala_early[i] === $('#skalanewso-' + z + '-' + j).val()) {
                    $('#skalanewso-' + z + '-' + j).prop('checked', true).change()
                }
            }
        }

        // DATA PENUNJANG
        $('#pm-tanggal-lab').val(data.pm_tanggal_lab)
        $('#pm-hasil-lab').val(data.pm_hasil_lab)
        $('#pm-tanggal-cgt').val(data.pm_tanggal_cgt)
        $('#pm-hasil-cgt').val(data.pm_hasil_cgt)
        $('#pm-penunjang-lain').val(data.pm_penunjang_lain)

        // ASSESMEN KEBIDANAN
        if (data.pm_infeksi === '1') {
            $('#pm-infeksi').prop('checked', true).change()
        }
        if (data.pm_pendarahan === '1') {
            $('#pm-pendarahan').prop('checked', true).change()
        }
        if (data.pm_nausea === '1') {
            $('#pm-nausea').prop('checked', true).change()
        }
        if (data.pm_gawat_jalan === '1') {
            $('#pm-gawat-jalan').prop('checked', true).change()
        }
        if (data.pm_anxietas === '1') {
            $('#pm-anxietas').prop('checked', true).change()
        }
        if (data.pm_nyeri_melahirkan === '1') {
            $('#pm-pm_nyeri_melahirkan').prop('checked', true).change()
        }
        if (data.pm_pola_nafas === '1') {
            $('#pm-pola-nafas').prop('checked', true).change()
        }
        if (data.pm_kebutuhan_lain === '1') {
            $('#pm-kebutuhan-lain').prop('checked', true).change()
        }
        $('#pm-kebutuhan-sebutkan').val(data.pm_kebutuhan_sebutkan)

        // RENCANA ASUHAN KEBIDANAN
        if (data.pm_asuhan_jelaskan === '1') {
            $('#pm-asuhan-jelaskan').prop('checked', true).change()
        }
        if (data.pm_asuhan_laporkan === '1') {
            $('#pm-asuhan-laporkan').prop('checked', true).change()
        }
        if (data.pm_asuhan_fasilitas === '1') {
            $('#pm-asuhan-fasilitas').prop('checked', true).change()
        }
        if (data.pm_asuhan_masalah === '1') {
            $('#pm-asuhan-masalah').prop('checked', true).change()
        }
        if (data.pm_asuhan_observasi === '1') {
            $('#pm-asuhan-observasi').prop('checked', true).change()
        }
        if (data.pm_asuhan_edukasi === '1') {
            $('#pm-asuhan-edukasi').prop('checked', true).change()
        }
        if (data.pm_asuhan_lain === '1') {
            $('#pm-asuhan-lain').prop('checked', true).change()
            $('#pm-asuhan-sebutkan').prop('disabled', false).change()
        }
        $('#pm-asuhan-sebutkan').val(data.pm_asuhan_sebutkan)


        if (data.pm_bidan !== null) {
            $('#pm-bidan').select2c('readonly', false)
        }
        $('#pm-bidan').val(data.pm_bidan)
        $('#s2id_pm-bidan a .select2c-chosen').html(data.nama_bidan)


        if (data.pm_dpjp !== null) {
            $('#pm-dpjp').select2c('readonly', false)
            $('#pm-dpjp').val(data.pm_dpjp)
            $('#s2id_pm-dpjp a .select2c-chosen').html(data.nama_dpjp)
        }


        // Bidan maternal signature
        if (data.pm_paraf_bidan === '1') {
            $('#pm-paraf-bidan').prop('checked', true)
            $('#pm-paraf-bidan').hide()
            $('#pm-paraf-bidan-verified').show()
        } else {
            $('#pm-paraf-bidan').prop('checked', false)
            $('#pm-paraf-bidan').show()
            $('#pm-paraf-bidan-verified').hide()
        }

        // DPJP maternal signature
        if (data.pm_paraf_dpjp === '1') {
            $('#pm-paraf-dpjp').prop('checked', true)
            $('#pm-paraf-dpjp').hide()
            $('#pm-paraf-dpjp-verified').show()
        } else {
            $('#pm-paraf-dpjp').prop('checked', false)
            $('#pm-paraf-dpjp').show()
            $('#pm-paraf-dpjp-verified').hide()
        }
    }

    function getValueEdit(param, value) {
        for (let i = 0; i < $('[name="' + param + '"]').length; i++) {
            const val = $('#' + param + '_' + i).val()
            if (val == value) {
                $('#' + param + '_' + i).prop('checked', true).change()
            }
        }
    }

    function hapusDrawpad() {
        $('#drawpad').jqSignature('clearCanvas')
        $('#drawpad_input').val('')
    }

    // Pengkajian Keperawatan
    function calcscorepjd() {
        var score = 0;
        $("input[name='prjd_riwayat_jatuh']:checked").each(function() {
            if ($(this).val() == '25') {
                score += parseInt(25)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='prjd_diagnosis_sekunder']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='prjd_terpasang_infus']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='alat_bantu_jalan_1_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='alat_bantu_jalan_2_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15)
            }
        })
        $("input[name='alat_bantu_jalan_3_ya']:checked").each(function() {
            if ($(this).val() == '30') {
                score += parseInt(30)
            }
        })
        $("input[name='cara_berjalan_1_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='cara_berjalan_2_ya']:checked").each(function() {
            if ($(this).val() == '10') {
                score += parseInt(10)
            }
        })
        $("input[name='cara_berjalan_3_ya']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20)
            }
        })
        $("input[name='status_mental_1_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='status_mental_2_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15)
            }
        })

        $("input[name='prjd_jumlah_skor']").val(score)
    }

    function calcscoreprjl() {
        var score = 0;
        $("input[name='prjl_riwayat_jatuh']:checked").each(function() {
            if ($(this).val() == '6') {
                score += parseInt(6)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })

        $("input[name='prjl_riwayat_jatuh_opt']:checked").each(function() {
            if ($(this).val() == '6') {
                score += parseInt(6)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })

        $("input[name='prjl_status_mental']:checked").each(function() {
            if ($(this).val() == '14') {
                if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14') {
                    score += parseInt(14)
                } else if ($("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
                    score += parseInt(14)
                } else if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14' && $(
                        "input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
                    score += parseInt(14)
                } else {
                    score += parseInt(14)
                }
            } else {
                if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14') {
                    score += parseInt(14)
                } else if ($("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
                    score += parseInt(14)
                } else if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14' && $(
                        "input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
                    score += parseInt(14)
                } else {
                    score += parseInt(0)
                }
            }
        })

        $("input[name='prjl_penglihatan']:checked").each(function() {
            if ($(this).val() == '1') {
                if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1') {
                    score += parseInt(1)
                } else if ($("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
                    score += parseInt(1)
                } else if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1' && $(
                        "input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
                    score += parseInt(1)
                } else {
                    score += parseInt(1)
                }
            } else {
                if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1') {
                    score += parseInt(1)
                } else if ($("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
                    score += parseInt(1)
                } else if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1' && $(
                        "input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
                    score += parseInt(1)
                } else {
                    score += parseInt(0)
                }
            }
        })

        $("input[name='prjl_berkemih']:checked").each(function() {
            if ($(this).val() == '2') {
                score += parseInt(2)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })

        // BARU JANGAN DI BUKA DULU
        $("input[name='prjl_transfer']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            } else if ($(this).val() == '1') {
                score += parseInt(1)
            } else if ($(this).val() == '2') {
                score += parseInt(2)
            } else if ($(this).val() == '3') {
                score += parseInt(3)
            }
        })

        // BARU JANGAN DI BUKA DULU
        $("input[name='prjl_mobilitas']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            } else if ($(this).val() == '1') {
                score += parseInt(1)
            } else if ($(this).val() == '2') {
                score += parseInt(2)
            } else if ($(this).val() == '3') {
                score += parseInt(3)
            }
        })




        // var nilaiTransfer = $("input[name='prjl_transfer']:checked").val()
        // var nilaiMobilitas = $("input[name='prjl_mobilitas']:checked").val()

        // $("input[name='prjl_transfer']:checked").each(function() {
        //     if (nilaiTransfer == '0' && nilaiMobilitas == '0') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '1' && nilaiMobilitas == '0') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '2' && nilaiMobilitas == '0') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '3' && nilaiMobilitas == '0') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '0' && nilaiMobilitas == '1') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '1' && nilaiMobilitas == '1') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '2' && nilaiMobilitas == '1') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '3' && nilaiMobilitas == '1') {
        //         score += parseInt(7)
        //     } else if (nilaiTransfer == '0' && nilaiMobilitas == '2') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '1' && nilaiMobilitas == '2') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '2' && nilaiMobilitas == '2') {
        //         score += parseInt(7)
        //     } else if (nilaiTransfer == '3' && nilaiMobilitas == '2') {
        //         score += parseInt(7)
        //     } else if (nilaiTransfer == '0' && nilaiMobilitas == '3') {
        //         score += parseInt(0)
        //     } else if (nilaiTransfer == '1' && nilaiMobilitas == '3') {
        //         score += parseInt(7)
        //     } else if (nilaiTransfer == '2' && nilaiMobilitas == '3') {
        //         score += parseInt(7)
        //     } else if (nilaiTransfer == '3' && nilaiMobilitas == '3') {
        //         score += parseInt(7)
        //     }
        // })

        $('#prjl_jumlah').val(score)
    }

    // NEWS (DEWASA) 
    function hitungSkalaEarlyNews() {
        var total = 0;
        for (let i = 1; i <= 8; i++) {
            var sub_total = 0; 
            for (let j = 1; j <= 7; j++) { 
                var value = 0; 
                if ($('#skalanews_' + i + '_' + j).is(':checked')) { 
                    var getNilai = $('#skalanews_' + i + '_' + j).val(); 
                    value = parseInt(getNilai.split('_')[0]); // Mengambil elemen pertama dan parseInt
                }
                sub_total += value;
            }
            total += sub_total; 
        }

        // Reset semua checkbox
        $('#total_skalanews_1, #total_skalanews_2, #total_skalanews_3, #total_skalanews_4').prop('checked', false);

        // Cek rentang total dan set checkbox yang sesuai
        if (total === 0) {
            $('#total_skalanews_1').prop('checked', true); 
        } else if (total >= 1 && total <= 4) {
            $('#total_skalanews_2').prop('checked', true); 
        } else if (total >= 5 && total <= 6) {
            $('#total_skalanews_3').prop('checked', true); 
        } else if (total >= 7) {
            $('#total_skalanews_4').prop('checked', true); 
        }
    }

    // NEWS (Neonatal Early Warning Score)
    function hitungSkalaEarlyNeonatal() {
        var total = 0;
        for (let i = 1; i <= 6; i++) {
            var sub_total = 0; 
            for (let j = 1; j <= 5; j++) { 
                var value = 0; 
                if ($('#calsneuk_' + i + '_' + j).is(':checked')) { 
                    var getNilai = $('#calsneuk_' + i + '_' + j).val(); 
                    value = parseInt(getNilai.split('_')[0]); // Mengambil elemen pertama dan parseInt
                }
                sub_total += value;
            }
            total += sub_total; 
        }
        // Reset semua checkbox
        $('#total_calsneuk_1, #total_calsneuk_2, #total_calsneuk_3').prop('checked', false);

        if (total >= 0 && total <= 0) {
            $('#total_calsneuk_1').prop('checked', true); // Jika total antara 0 dan 0, centang elemen dengan ID 'total_calsneuk_1'
        } else if (total >= 0 && total <= 1) {
            $('#total_calsneuk_2').prop('checked', true); // Jika total antara 0 dan 1, centang elemen dengan ID 'total_calsneuk_2'
        } else if (total >= 2) {
            $('#total_calsneuk_3').prop('checked', true); // Jika total 2 atau lebih, centang elemen dengan ID 'total_calsneuk_3'
        }
    }

    // PEWS (ANAK)
    function hitungSkalaEarlyPews() {
        var total = 0; // Inisialisasi variabel 'total' yang akan menyimpan jumlah keseluruhan nilai
        for (let i = 1; i <= 17; i++) { // Loop untuk iterasi baris dari 1 hingga 17
            var sub_total = 0; // Inisialisasi variabel 'sub_total' untuk menyimpan jumlah sementara per baris
            for (let j = 1; j <= 7; j++) { // Loop untuk iterasi kolom dari 1 hingga 7
                var value = 0; // Inisialisasi variabel 'value' untuk menyimpan nilai dari elemen yang diperiksa
                if ($('#skalapews_' + i + '_' + j).is(':checked')) { // Memeriksa apakah elemen dengan ID tertentu tercentang
                    var getNilai = $('#skalapews_' + i + '_' + j).val(); // Mengambil nilai dari elemen yang tercentang
                    value = getNilai.split('_', 1); // Memisahkan nilai dengan delimiter '_' dan mengambil bagian pertama
                }
                sub_total = sub_total + parseInt(value); // Menambahkan nilai ke 'sub_total', pastikan nilai dikonversi menjadi integer
            }
            total = total + parseInt(sub_total); // Menambahkan 'sub_total' ke 'total', pastikan nilai dikonversi menjadi integer
        }
        // Mengatur status elemen berdasarkan nilai 'total'
        if (total >= 0 && total <= 2) {
            $('#total_skalapews_1').prop('checked', true); // Jika total antara 0 dan 2, centang elemen dengan ID 'total_skalapews_1'
        } else if (total >= 3 && total <= 4) {
            $('#total_skalapews_2').prop('checked', true); // Jika total antara 3 dan 4, centang elemen dengan ID 'total_skalapews_2'
        } else if (total >= 5) {
            $('#total_skalapews_3').prop('checked', true); // Jika total 5 atau lebih, centang elemen dengan ID 'total_skalapews_3'
        }
    }

    // PIM
    function hitungSkoreMaternal() {
        var score = 0;
        $("input[name='pm_jatuh']:checked").each(function() {
            if ($(this).val() == '25') {
                score += parseInt(25)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_diagnosis']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_kursi_roda_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_kruk_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15)
            }
        })
        $("input[name='pm_pegangan_ya']:checked").each(function() {
            if ($(this).val() == '30') {
                score += parseInt(30)
            }
        })
        $("input[name='pm_heparin']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_imobilisasi_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_lemah_ya']:checked").each(function() {
            if ($(this).val() == '10') {
                score += parseInt(10)
            }
        })
        $("input[name='pm_terganggu_ya']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20)
            }
        })
        $("input[name='pm_kemampuan_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_lupa_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15)
            }
        })

        $("input[name='pm_jumlah_skor']").val(score)
    }

    // MEOWS
    function hitungSkalaEarlyMeowst() {
        var total = 0;
        // looping vertical
        for (let i = 1; i <= 11; i++) {
            // looping horizontal
            var sub_total = 0
            for (let j = 1; j <= 11; j++) {
                var value = 0;
                if ($('#skalameowst-' + i + '-' + j).is(':checked')) {
                    var getNilai = $('#skalameowst-' + i + '-' + j).val()
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
            $('#total-skalameowst-1').prop('checked', true)
        } else if (total >= 1 && total <= 4) {
            $('#total-skalameowst-2').prop('checked', true)
        } else if (total >= 5 && total <= 6) {
            $('#total-skalameowst-3').prop('checked', true)
        } else if (total >= 7) {
            $('#total-skalameowst-4').prop('checked', true)
        }
    }

    // NEWS
    function hitungSkalaEarlyNewso() {
        var total = 0;
        // looping vertical
        for (let i = 1; i <= 7; i++) {
            // looping horizontal
            var sub_total = 0
            for (let j = 1; j <= 7; j++) {
                var value = 0;
                if ($('#skalanewso-' + i + '-' + j).is(':checked')) {
                    var getNilai = $('#skalanewso-' + i + '-' + j).val()
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
            $('#total-skalanewso-1').prop('checked', true)
        } else if (total >= 1 && total <= 4) {
            $('#total-skalanewso-2').prop('checked', true)
        } else if (total >= 5 && total <= 6) {
            $('#total-skalanewso-3').prop('checked', true)
        } else if (total >= 7) {
            $('#total-skalanewso-4').prop('checked', true)
        }
    }

</script>












<!-- Modal -->
<!-- IGD -->
<div class="modal fade" id="modal_pengkajian_awal_igd_rm" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold">FORM PENGKAJIAN AWAL PASIEN IGD</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_pengkajian_awal_igd class="form-horizontal"') ?>
                <input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
                <input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran">
                <input type="hidden" name="id_pasien" id="id_pasien">
                <input type="hidden" name="id_kajian_medis" id="id_kajian_medis">
                <input type="hidden" name="id_kajian_keperawatan" id="id_kajian_keperawatan">
                <!-- TPIGD -->
                <input type="hidden" name="id_kajian_triase" id="id-kajian-triase">
                <!-- // PIM -->
                <input type="hidden" name="id_pengkajian_maternal" id="id_pengkajian_maternal">
                <!-- <!?= $this->session->userdata('nama') ?> -->
                <!-- <input type="hidden" name="id_user_maternal" value="<!?= $this->session->userdata("id_translucent") ?>"> -->

                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="pa_pasien_nama"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="pa_pasien_no_rm"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="pa_pasien_tanggal_lahir"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="pa_pasien_jenis_kelamin"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
                <!-- end header -->


                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard_form_igd">
                                <ol>
                                    <!-- WH13 -->
                                    <li>Triase Pasien Instalasi Gawat Darurat <i class="bold"></i></li>
                                    <li>Pengkajian Medis <i class="bold"><small>(Diisi Oleh Dokter)</small></i></li>
                                    <li>Pengkajian Keperawatan <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li>
                                    <li>Pengkajian IGD Maternal <i class="bold"><small>(Diisi Oleh Bidan)</small></i></li>
                                </ol>
                                <!-- Data Triase-->
                                <div class="form-data-pengkajian-dokter">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left btn_expand_all" type="button"><i class="fas fa-fw fa-expand mr-1"></i>Expand
                                                    All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left btn_collapse_all" type="button"><i class="fas fa-fw fa-compress mr-1"></i>Collapse
                                                    All</button>
                                            </td>
                                        </tr>

                                        <!-- WH14 -->
                                        <tr>
                                            <td width="20%" class="bold">Waktu Pengkajian</td>
                                            <td width="1%" class="bold">:</td>
                                            <td width="79%">
                                                <input type="text" name="waktu_kajian_igd" id="waktu-kajian-igd" class="custom-form clear-input col-lg-2" value="<?= date('d/m/Y H:i') ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="td-dark"><b></b></td>
                                        </tr>

                                        <!-- CARA DATANG PASIEN AWAL-->
                                        <tr>
                                            <td width="20%" class="bold">Cara Datang Pasien</td>
                                            <td wdith="1%" class="bold">:</td>
                                            <td width="79%">
                                                <input type="checkbox" name="cara_datang_pasien_igd_1" id="cara-datang-pasien-igd-1" value="1" class="mr-1">Sendiri
                                                <input type="checkbox" name="cara_datang_pasien_igd_2" id="cara-datang-pasien-igd-2" value="1" class="mr-1 ml-2">Diantar,
                                                Keluarga/Teman
                                                <input type="checkbox" name="cara_datang_pasien_igd_3" id="cara-datang-pasien-igd-3" value="1" class="mr-1 ml-2">Warga
                                                <input type="checkbox" name="cara_datang_pasien_igd_4" id="cara-datang-pasien-igd-4" value="1" class="mr-1 ml-2">Rujukan,
                                                dari
                                                <!-- <input type="text" name="cara_datang_pasien_igd_5" id="cara-datang-pasien-igd-5" class="custom-form clear-input d-inline-block col-lg-4 readonly" placeholder="Masukkan informasi lain"> -->
                                                <input type="text" name="cara_datang_pasien_igd_5" id="cara-datang-pasien-igd-5" class="custom-form clear-input d-inline-block col-lg-4"  readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold"></td>
                                            <td class="bold"></td>
                                            <td>
                                                <input type="checkbox" name="cara_datang_pasien_igd_6" id="cara-datang-pasien-igd-6" value="1" class="mr-1">Trauma
                                                <input type="checkbox" name="cara_datang_pasien_igd_7" id="cara-datang-pasien-igd-7" value="1" class="mr-1 ml-2">Non Trauma
                                                <input type="checkbox" name="cara_datang_pasien_igd_8" id="cara-datang-pasien-igd-8" value="1" class="mr-1 ml-2">Obstetri
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold"></td>
                                            <td class="bold"></td>
                                            <td>
                                                <input type="checkbox" name="cara_datang_pasien_igd_9" id="cara-datang-pasien-igd-9" value="1" class="mr-1">Ambulance
                                                <!-- <input type="text" name="cara_datang_pasien_igd_10" id="cara-datang-pasien-igd-10" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukan Nama Petugas"> -->
                                                <input type="text" name="cara_datang_pasien_igd_10" id="cara-datang-pasien-igd-10" class="custom-form clear-input d-inline-block col-lg-4"  readonly>
                                                <input type="checkbox" name="cara_datang_pasien_igd_11" id="cara-datang-pasien-igd-11" value="1" class="mr-1 ml-2">Polisi
                                                <!-- <input type="text" name="cara_datang_pasien_igd_12" id="cara-datang-pasien-igd-12" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukan Nama Petugas"> -->
                                                <input type="text" name="cara_datang_pasien_igd_12" id="cara-datang-pasien-igd-12" class="custom-form clear-input d-inline-block col-lg-4"  readonly>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- CARA DATANG PASIEN AKHIR -->

                                    <!-- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL AWAL  -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-vital-sign"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
                                                DAN TANDA-TANDA VITAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-vital-sign">
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td width="20%" class="bold">Kesadaran</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="39%">
                                                    <input type="checkbox" name="kesadaran_igd_1" id="kesadaran-igd-1" value="1" class="mr-1">Composmentis
                                                    <input type="checkbox" name="kesadaran_igd_2" id="kesadaran-igd-2" value="1" class="mr-1 ml-2">Apatis
                                                    <input type="checkbox" name="kesadaran_igd_3" id="kesadaran-igd-3" value="1" class="mr-1 ml-2">Samnolen
                                                    <input type="checkbox" name="kesadaran_igd_4" id="kesadaran-igd-4" value="1" class="mr-1 ml-2">Sopor
                                                    <input type="checkbox" name="kesadaran_igd_5" id="kesadaran-igd-5" value="1" class="mr-1 ml-2">Koma
                                                </td>
                                                <td></td>
                                                <td width="15%"></td>
                                                <td width="1%"></td>
                                                <td width="39%"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <span class="bold">GCS :
                                                        E <input type="text" name="gcs_e_igd" id="gcs-e-igd" class="custom-form clear-input d-inline-block col-lg-2 mr-1 ml-2 gcswKWH" placeholder="" onkeypress="return hanyaAngka(event)">
                                                        M <input typevent="text" name="gcs_m_igd" id="gcs-m-igd" class="custom-form clear-input d-inline-block col-lg-2 mr-1 ml-2 gcswKWH" placeholder="" onkeypress="return hanyaAngka(event)">
                                                        V <input type="teventxt" name="gcs_v_igd" id="gcs-v-igd" class="custom-form clear-input d-inline-block col-lg-2 mr-1 ml-2 gcswKWH" placeholder="" onkeypress="return hanyaAngka(event)">
                                                        Total : <input type="text" name="gcs_total_igd" id="gcs-total-igd" class="custom-form clear-input d-inline-block col-lg-2" placeholder="0">
                                                    </span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Tekanan Darah</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="tekanan_darah_igd_1" id="tekanan-darah-igd-1" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
                                                        <span>/</span>
                                                        <input type="text" name="tekanan_darah_igd_2" id="tekanan-darah-igd-2" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Diastolik" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">mmHg</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td class="bold">Suhu</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="tekanan_darah_igd_3" id="tekanan-darah-igd-3" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Suhu" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">&#8451;</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Frekuensi Nadi</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="frekuensi_igd_1" id="frekuensi-igd-1" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">x/mnt</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td class="bold">Frekuensi Nafas</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="frekuensi_igd_2" id="frekuensi-igd-2" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Nafas" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">x/mnt</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Tinggi Badan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="tinggi_badan_igd_1" id="tinggi-badan-igd-1" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Tinggi Badan" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">Cm</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td class="bold">Berat Badan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="tinggi_badan_igd_2" id="tinggi-badan-igd-2" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Berat Badan" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">Kg</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">SO2</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="imunisasi_igd_1" id="imunisasi-igd-1" class="custom-form clear-input d-inline-block col-lg-3" placeholder="s02" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">%</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td width="20%" class="bold">Imunisasi</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="79%">
                                                    <input type="checkbox" name="imunisasi_igd_2" id="imunisasi-igd-2" class="mr-1" value="1">Ya
                                                    <input type="checkbox" name="imunisasi_igd_3" id="imunisasi-igd-3" class="mr-1 ml-2" value="0">Tidak
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL AKHIR  -->

                                    <!-- PEMERIKSAAN DEWASA AWAL -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pdewasa-sign"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN DEWASA
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pdewasa-sign">
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td width="100%">
                                                    <table class="table table-sm table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%" class="center" style="background-color: #C0C0C0; color: blakc;"><b>No.</b></th>
                                                                <th width="20%" style="background-color: #C0C0C0; color: blakc;"><b>Parameter</b></th>
                                                                <th width="15%" class="center" style="background-color: #FF0000; color: blakc;"><b>I. RESUSITASI (SEGERA)</b></th>
                                                                <th width="15%" class="center" style="background-color: #FF0000; color: blakc;"><b>II. EMERGENCY (10Menit)</b></th>
                                                                <th width="15%" class="center" style="background-color: #FFFF00; color: blakc;"><b>III. URGENT (30Menit)</b></th>
                                                                <th width="15%" class="center" style="background-color: #00FF00; color: blakc;"><b>IV. NON URGENT (60Menit)</b></th>
                                                                <th width="15%" class="center" style="background-color: #00FF00; color: blakc;"><b>V. FALSE EMERGENCY(120 Menit)</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th rowspan="2" class="center v-center">1</th>
                                                                <th rowspan="2" class="center v-center">Jalan Nafas</th>
                                                                <td class="center"><input type="checkbox" name="jalan_nafas_igd_1" id="jalan-nafas-igd-1" value="1" class="mr-1 ">Sumbatan</td>
                                                                <td class="center"><input type="checkbox" name="jalan_nafas_igd_2" id="jalan-nafas-igd-2" value="1" class="mr-1 ">Bebas</td>
                                                                <td class="center"><input type="checkbox" name="jalan_nafas_igd_3" id="jalan-nafas-igd-3" value="1" class="mr-1 ">Bebas 0</td>
                                                                <td class="center"><input type="checkbox" name="jalan_nafas_igd_4" id="jalan-nafas-igd-4" value="1" class="mr-1 ">Bebas</td>
                                                                <td class="center"><input type="checkbox" name="jalan_nafas_igd_6" id="jalan-nafas-igd-6" value="1" class="mr-1 ">Bebas</td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <td class="center"><input type="checkbox" name="jalan_nafas_igd_5" id="jalan-nafas-igd-5" value="1" class="mr-1 ">Ancaman</td>
                                                                <th></th>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="2" class="center v-center">2</th>
                                                                <th rowspan="2" class="center v-center">Pernafasan</th>
                                                                <td class="center"><input type="checkbox" name="pernafasan_igd_1" id="pernafasan-igd-1" value="1" class="mr-1 ">Henti Nafas</td>
                                                                <td class="center"><input type="checkbox" name="pernafasan_igd_2" id="pernafasan-igd-2" value="1" class="mr-1 ">Takipnoe</td>
                                                                <td class="center"><input type="checkbox" name="pernafasan_igd_3" id="pernafasan-igd-3" value="1" class="mr-1 ">Normal</td>
                                                                <td class="center"><input type="checkbox" name="pernafasan_igd_4" id="pernafasan-igd-4" value="1" class="mr-1 ">Frek Nafas Normal</td>
                                                                <td class="center"><input type="checkbox" name="pernafasan_igd_5" id="pernafasan-igd-5" value="1" class="mr-1 ">Frek Nafas
                                                                    Normal</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox" name="pernafasan_igd_6" id="pernafasan-igd-6" value="1" class="mr-1 ">Distress Nafas
                                                                    Berat</td>
                                                                <td class="center"><input type="checkbox" name="pernafasan_igd_7" id="pernafasan-igd-7" value="1" class="mr-1 ">Distress Nafas
                                                                    Sedang</td>
                                                                <td class="center"><input type="checkbox" name="pernafasan_igd_8" id="pernafasan-igd-8" value="1" class="mr-1 ">Distress Nafas
                                                                    Ringan</td>
                                                                <th></th>
                                                                <th></th>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="6" class="center v-center">3</th>
                                                                <th rowspan="6" class="center v-center">Sirkulasi</th>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_1" id="sirkulasi-igd-1" value="1" class="mr-1 ">Henti Jantung
                                                                </td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_2" id="sirkulasi-igd-2" value="1" class="mr-1 ">Nadi Teraba</td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_3" id="sirkulasi-igd-3" value="1" class="mr-1 ">Nadi Kuat</td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_4" id="sirkulasi-igd-4" value="1" class="mr-1 ">Nadi Kuat</td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_5" id="sirkulasi-igd-5" value="1" class="mr-1 ">Nadi Kuat</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_6" id="sirkulasi-igd-6" value="1" class="mr-1 ">Nadi Tidak Ada
                                                                </td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_7" id="sirkulasi-igd-7" value="1" class="mr-1 ">Bradikardi</td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_8" id="sirkulasi-igd-8" value="1" class="mr-1 ">Takikardi</td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_9" id="sirkulasi-igd-9" value="1" class="mr-1 ">Frek Nadi Normal
                                                                </td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_10" id="sirkulasi-igd-10" value="1" class="mr-1 ">Frek Nadi Normal
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_11" id="sirkulasi-igd-11" value="1" class="mr-1 ">Sianosis</td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_12" id="sirkulasi-igd-12" value="1" class="mr-1 ">Takikardi</td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_13" id="sirkulasi-igd-13" value="1" class="mr-1 ">TDS > 160</td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_14" id="sirkulasi-igd-14" value="1" class="mr-1 ">TDS 120 mmHg
                                                                </td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_15" id="sirkulasi-igd-15" value="1" class="mr-1 ">TDS 120 mmHg
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_16" id="sirkulasi-igd-16" value="1" class="mr-1 ">Akral Dingin
                                                                </td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_17" id="sirkulasi-igd-17" value="1" class="mr-1 ">Pucat</td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_18" id="sirkulasi-igd-18" value="1" class="mr-1 ">TDD > 100</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_19" id="sirkulasi-igd-19" value="1" class="mr-1 ">CRT > 4 detik
                                                                </td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_20" id="sirkulasi-igd-20" value="1" class="mr-1 ">Akral Dingin
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td class="center"><input type="checkbox" name="sirkulasi_igd_21" id="sirkulasi-igd-21" value="1" class="mr-1 ">CRT > 2 detik
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="4" class="center v-center">4</th>
                                                                <th rowspan="4" class="center v-center">Kesadaran</th>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_1" id="kesadaran-igdd-1" value="1" class="mr-1 ">GCS < 8</td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_2" id="kesadaran-igdd-2" value="1" class="mr-1 ">GCS 9-12</td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_3" id="kesadaran-igdd-3" value="1" class="mr-1 ">GCS ≥ 13</td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_4" id="kesadaran-igdd-4" value="1" class="mr-1 ">GCS 15</td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_5" id="kesadaran-igdd-5" value="1" class="mr-1 ">GCS 15</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_6" id="kesadaran-igdd-6" value="1" class="mr-1 ">Kejang</td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_7" id="kesadaran-igdd-7" value="1" class="mr-1 ">Gelisah</td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_8" id="kesadaran-igdd-8" value="1" class="mr-1 ">Apatis</td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_9" id="kesadaran-igdd-9" value="1" class="mr-1 ">Nyeri Ringan
                                                                </td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_10" id="kesadaran-igdd-10" value="1" class="mr-1 ">Nyeri Ringan
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_11" id="kesadaran-igdd-11" value="1" class="mr-1 ">Tidak ada respon
                                                                </td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_12" id="kesadaran-igdd-12" value="1" class="mr-1 ">Hemiparesis</td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_13" id="kesadaran-igdd-13" value="1" class="mr-1 ">Samnolen</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_14" id="kesadaran-igdd-14" value="1" class="mr-1 ">Nyeri Hebat</td>
                                                                <td class="center"><input type="checkbox" name="kesadaran_igdd_15" id="kesadaran-igdd-15" value="1" class="mr-1 ">Nyeri Sedang
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- PEMERIKSAAN DEWASA AKHIR -->                                  

                                    <!-- PEMERIKSAAN ANAK AWAL -->
                                    <!-- // PDA -->
                                    <!-- <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-panak"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN
                                                ANAK</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-panak">
                                        <td width="100%">
                                            <table class="table table-sm table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="center"><b>No.</b></th>
                                                        <th width="20%"><b>Parameter</b></th>
                                                        <th width="15%" class="center"><b>Nilai = 3</b></th>
                                                        <th width="15%" class="center"><b>Nilai = 2</b></th>
                                                        <th width="15%" class="center"><b>Nilai = 1</b></th>
                                                        <th width="15%" class="center"><b>Nilai = 0</b></th>
                                                        <th width="15%" class="center"><b>Total</b></th>
                                                    </tr>
                                                    <tr>
                                                        <th rowspan="2" class="center v-center">1</th>
                                                        <th rowspan="2" class="center v-center">PERNAFASAN</th>
                                                        <td class="center"><input type="radio" name="pa_pernafasan" id="pa-pernafasan-1" value="3_1" class="mr-1 calc_pa">Retraksi Berat</td>
                                                        <td class="center"><input type="radio" name="pa_pernafasan" id="pa-pernafasan-2" value="2_2" class="mr-1 calc_pa ">Retraksi Ringan</td>
                                                        <td class="center"><input type="radio" name="pa_pernafasan" id="pa-pernafasan-3" value="1_3" class="mr-1 calc_pa ">Nafas Cuping Hidung</td>
                                                        <td class="center"><input type="radio" name="pa_pernafasan" id="pa-pernafasan-4" value="0_4" class="mr-1 calc_pa ">Normal</td>
                                                        <td class="center v-center" rowspan="2"><input type="number" name="nilai_pa_pernafasan" id="nilai-pa-pernafasan" class="custom-form center clear-input sub_total_nilai_pa_pernafasan" min="0" placeholder="Nilai" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center"><input type="radio" name="pa_pernafasan" id="pa-pernafasan-5" value="3_5" class="mr-1 calc_pa "> RR melambat / henti nafas</td>
                                                        <td class="center"><input type="radio" name="pa_pernafasan" id="pa-pernafasan-6" value="2_6" class="mr-1 calc_pa ">RR meningkat </td>
                                                        <td class="center"><input type="radio" name="pa_pernafasan" id="pa-pernafasan-7" value="1_7" class="mr-1 calc_pa">RR meningkat</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                                                                    
                                                    <tr>
                                                        <th rowspan="3" class="center v-center">2</th>
                                                        <th rowspan="3" class="center v-center">SIRKULASI</th>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi" id="pa-sirkulasi-1" value="3_1" class="mr-1  calc_pa ">Kebiruan</td>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi" id="pa-sirkulasi-2" value="2_2" class="mr-1 calc_pa ">Pucat</td>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi" id="pa-sirkulasi-3" value="1_3" class="mr-1 calc_pa ">Pucat</td>
                                                        <td></td>
                                                        <td class="center v-center" rowspan="3"><input type="number" name="nilai_pa_sirkulasi" id="nilai-pa-sirkulasi" class="custom-form center clear-input sub_total_nilai_pa_sirkulasi" min="0" placeholder="Nilai" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi" id="pa-sirkulasi-4" value="3_4" class="mr-1  calc_pa ">CTR > 5 detik</td>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi" id="pa-sirkulasi-5" value="2_5" class="mr-1 calc_pa ">CTR 3-4 detik </td>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi" id="pa-sirkulasi-6" value="1_6" class="mr-1 calc_pa ">CTR 2-3 detik </td>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi" id="pa-sirkulasi-7" value="0_7" class="mr-1 calc_pa ">Normal</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi" id="pa-sirkulasi-8" value="3_8" class="mr-1  calc_pa ">Takikardia atau bradikardia </td>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi" id="pa-sirkulasi-9" value="2_9" class="mr-1 calc_pa ">Takikardia</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>
                                                        <th class="center">3</th>
                                                        <th class="center">KESADARAN</th>
                                                        <td class="center"><input type="radio" name="pa_kesadaran" id="pa-kesadaran-1" value="3_1" class="mr-1 calc_pa ">Letargik</td>
                                                        <td class="center"><input type="radio" name="pa_kesadaran" id="pa-kesadaran-2" value="2_2" class="mr-1 calc_pa ">Gelisah </td>
                                                        <td class="center"><input type="radio" name="pa_kesadaran" id="pa-kesadaran-3" value="1_3" class="mr-1 calc_pa ">Somnolen </td>
                                                        <td class="center"><input type="radio" name="pa_kesadaran" id="pa-kesadaran-4" value="0_4" class="mr-1 calc_pa ">Normal</td>
                                                        <td class="center"><input type="number" name="nilai_pa_kesadaran" id="nilai-pa-kesadaran" class="custom-form center clear-input sub_total_nilai_pa_kesadaran" min="0" placeholder="Nilai" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="center">4</th>
                                                        <th class="center">INTERPRESTASI</th>
                                                        <td class="center">>=6 (SEGERA)</td>
                                                        <td class="center">5 ( < 10menit ) </td>
                                                        <td class="center">3-4 ( < 30 Menit )</td>
                                                        <td class="center">0-2 ( 60-120 Menit )</td>
                                                        <td class="center"><input type="number" name="total_nilai_pa" id="total-nilai-pa" class="custom-form clear-input center" min="0" value="0" placeholder="Nilai" readonly></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </td>
                                    </div> -->
                                    <!-- PEMERIKSAAN ANAK AKHIR -->

                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <thead>
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-saga">
                                                        <i class="fas fa-expand mr-1"></i>Expand
                                                    </button>
                                                    Pemeriksaan Segitiga Asesmen Gawat Anak (SAGA)
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>

                                    <div class="collapse multi-collapse mt-2" id="data-saga">

                                    
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="6" class="bold center" style="background-color: #9966CC; color: White;">Segitiga Asesmen Gawat Anak (SAGA)</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                <!-- Gunakan div untuk mengelompokkan gambar -->
                                                                <div class="d-flex justify-content-center">
                                                                    <!-- Gambar pertama dengan ukuran dikurangi -->
                                                                    <img src="<?= resource_url() ?>images/attributes/saga.png" alt="Pain Measurement Scale" class="img-fluid mx-auto d-block rounded shadow" style="width: 235px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="col-lg-8">
                                                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="7" class="bold center" style="background-color: #008000; color: White;">Pemeriksaan Segitiga Asesmen Gawat Anak (SAGA)</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%" class="center"><b>Tampilan</td>
                                                            <td width="30%" class="center"><b>Usaha Napas</td>
                                                            <td width="20%" class="center"><b>Sirkulasi</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="checkbox" name="tampilan_saga_1" id="tampilan-saga-1" value="1" class="mr-1">Tidak aktif bergerak</td>
                                                            <td><input type="checkbox" name="usaha_saga_1" id="usaha-saga-1" value="1" class="mr-1">Napas cuping hidung</td>
                                                            <td><input type="checkbox" name="sirkulasi_saga_1" id="sirkulasi-saga-1" value="1" class="mr-1">Sianosis</td>
                                                        </tr>                                                                                                                             
                                                        <tr>
                                                            <td><input type="checkbox" name="tampilan_saga_2" id="tampilan-saga-2" value="1" class="mr-1">Tidak ada interaksi dengan lingkungan</td>
                                                            <td><input type="checkbox" name="usaha_saga_2" id="usaha-saga-2" value="1" class="mr-1">Retraksi</td>
                                                            <td><input type="checkbox" name="sirkulasi_saga_2" id="sirkulasi-saga-2" value="1" class="mr-1">Pucat</td>
                                                        </tr>                                                                                                                             
                                                        <tr>
                                                            <td><input type="checkbox" name="tampilan_saga_3" id="tampilan-saga-3" value="1" class="mr-1">Gelisah /sulit ditenangkan</td>
                                                            <td><input type="checkbox" name="usaha_saga_3" id="usaha-saga-3" value="1" class="mr-1">Posisi tubuh abnormal (tripoding, head bobbing, sniffing, menolak berbaring)</td>
                                                            <td><input type="checkbox" name="sirkulasi_saga_3" id="sirkulasi-saga-3" value="1" class="mr-1">Kutis marmorata</td>
                                                        </tr>                                                                                                                             
                                                        <tr>
                                                            <td><input type="checkbox" name="tampilan_saga_4" id="tampilan-saga-4" value="1" class="mr-1">Pandangan kosong</td>
                                                            <td><input type="checkbox" name="usaha_saga_4" id="usaha-saga-4" value="1" class="mr-1">Suara napas abnormal (mengorok, parau, stridor, merintih)</td>
                                                            <td></td>
                                                        </tr>                                                                                                                             
                                                        <tr>
                                                            <td><input type="checkbox" name="tampilan_saga_5" id="tampilan-saga-5" value="1" class="mr-1">Tidak bersuara / tidak menangis</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>                                                                                                                             
                                                    </tbody>
                                                </table>
                                                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="6" class="bold center"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6">
                                                                <div class="d-flex justify-content-start">
                                                                    <img src="<?= resource_url() ?>images/attributes/saga_1.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 150px;">
                                                                </div>
                                                                <div class="d-flex justify-content-center mt-2">
                                                                    <input type="checkbox" name="gambarsaga_1" id="gambarsaga-1" value="1" style="transform: scale(1.5);">
                                                                </div>
                                                            </td>
                                                            <td colspan="6">
                                                                <div class="d-flex justify-content-start">
                                                                    <img src="<?= resource_url() ?>images/attributes/saga_2.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 135px;">
                                                                </div>
                                                                <div class="d-flex justify-content-center mt-2">
                                                                    <input type="checkbox" name="gambarsaga_2" id="gambarsaga-2" value="1" style="transform: scale(1.5);">
                                                                </div>
                                                            </td>
                                                            <td colspan="6">
                                                                <div class="d-flex justify-content-start">
                                                                    <img src="<?= resource_url() ?>images/attributes/saga_3.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 140px;">
                                                                </div>
                                                                <div class="d-flex justify-content-center mt-2">
                                                                    <input type="checkbox" name="gambarsaga_3" id="gambarsaga-3" value="1" style="transform: scale(1.5);">
                                                                </div>
                                                            </td>
                                                            <td colspan="6">
                                                                <div class="d-flex justify-content-start">
                                                                    <img src="<?= resource_url() ?>images/attributes/saga_4.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 150px;">
                                                                </div>
                                                                <div class="d-flex justify-content-center mt-2">
                                                                    <input type="checkbox" name="gambarsaga_4" id="gambarsaga-4" value="1" style="transform: scale(1.5);">
                                                                </div>
                                                            </td>
                                                            <td colspan="6">
                                                                <div class="d-flex justify-content-start">
                                                                    <img src="<?= resource_url() ?>images/attributes/saga_5.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 142px;">
                                                                </div>
                                                                <div class="d-flex justify-content-center mt-2">
                                                                    <input type="checkbox" name="gambarsaga_5" id="gambarsaga-5" value="1" style="transform: scale(1.5);">
                                                                </div>
                                                            </td>
                                                            <td colspan="6">
                                                                <div class="d-flex justify-content-start">
                                                                    <img src="<?= resource_url() ?>images/attributes/saga_6.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 150px;">
                                                                </div>
                                                                <div class="d-flex justify-content-center mt-2">
                                                                    <input type="checkbox" name="gambarsaga_6" id="gambarsaga-6" value="1" style="transform: scale(1.5);">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                </table>


                                            </div>
                                        </div>


                                    </div>
                                    
                                    <!-- DATA TRIASE AWAL -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-assesment-triage"><i class="fas fa-expand mr-1"></i>Expand</button>ASESMENT
                                                TRIAGE</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-assesment-triage">
                                        <td width="100%">
                                            <table class="table table-sm table-striped table-bordered">
                                                <tr>
                                                    <th rowspan="3">Assesment Triage :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="asesment_triage_1" id="asesment-triage-1" value="1" class="mr-1">
                                                        EMERGENCY

                                                        <input type="checkbox" name="asesment_triage_2" id="asesment-triage-2" value="1" class="mr-1 ml-4">
                                                        NON URGENT

                                                        <input type="checkbox" name="asesment_triage_3" id="asesment-triage-3" value="1" class="mr-1 ml-4">
                                                        Potensi Resiko Khusus (Air Borne & Droplet)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="asesment_triage_4" id="asesment-triage-4" value="1" class="mr-1">
                                                        URGENT

                                                        <input type="checkbox" name="asesment_triage_5" id="asesment-triage-5" value="1" class="mr-1 ml-4">
                                                        FALSE EMERGENCY
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="asesment_triage_6" id="asesment-triage-6" value="1" class="mr-1"> DOA,
                                                        <!-- Tanda Kematian :<input type="text" name="asesment_triage_7" id="asesment-triage-7" class="custom-form clear-input d-inline-block col-lg-2 mx-2 disabled" placeholder="Sebutkan"> -->
                                                        Tanda Kematian : <input type="text" name="asesment_triage_7" id="asesment-triage-7" class="custom-form clear-input d-inline-block col-lg-2" readonly>
                                                        
                                                        <!-- RC : <input type="text" name="asesment_triage_8" id="asesment-triage-8" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled" placeholder="rc"> -->
                                                        RC : <input type="text" name="asesment_triage_8" id="asesment-triage-8" class="custom-form clear-input d-inline-block col-lg-2" readonly>
                                                        
                                                        <!-- EKG : <input type="text" name="asesment_triage_9" id="asesment-triage-9" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled" placeholder="ekg"> -->
                                                        EKG : <input type="text" name="asesment_triage_9" id="asesment-triage-9" class="custom-form clear-input d-inline-block col-lg-2" readonly>
                                                        
                                                        <!-- Jam DOA : <input type="text" name="asesment_triage_10" id="asesment-triage-10" class="custom-form clear-input d-inline-block col-lg-2 mx-1 disabled" placeholder="jam doa"> -->
                                                        Jam DOA : <input type="text" name="asesment_triage_10" id="asesment-triage-10" class="custom-form clear-input d-inline-block col-lg-2" readonly>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </div>
                                    <!-- DATA TRIASE AKHIR -->

                                    <!-- TINDAK LANJUT AWAL -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-tindak-lanjut"><i class="fas fa-expand mr-1"></i>Expand</button>TINDAK
                                                LANJUT</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-tindak-lanjut">
                                        <td width="100%">
                                            <table class="table table-sm table-striped table-bordered">
                                                <tr>
                                                    <td width="20%" class="bold">Tindak Lanjut</td>
                                                    <td wdith="1%" class="bold">:</td>
                                                    <td width="79%">
                                                        <input type="checkbox" name="tindak_lanjut_1" id="tindak-lanjut-1" value="1" class="mr-1"> Periksa
                                                        ke Ruang pelayanan non urgent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold"></td>
                                                    <td class="bold"></td>
                                                    <td>
                                                        <input type="checkbox" name="tindak_lanjut_2" id="tindak-lanjut-2" value="1" class="mr-1"> Perawatan
                                                        ke Ruang Observasi pasien semi Kritis
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold"></td>
                                                    <td class="bold"></td>
                                                    <td>
                                                        <input type="checkbox" name="tindak_lanjut_3" id="tindak-lanjut-3" value="1" class="mr-1"> Perawatan
                                                        ke Ruang resusitasi/Kritis (emergent)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold"></td>
                                                    <td class="bold"></td>
                                                    <td>
                                                        <input type="checkbox" name="tindak_lanjut_4" id="tindak-lanjut-4" value="1" class="mr-1"> Perawatan
                                                        Maternal
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </div>
                                    <!-- TINDAK LANJUT AKHIR -->

                                    <!-- YANG MELAKUKAN PENGKAJIAN AWAL -->
                                    <!-- <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="2" class="center td-dark"></td>
                                        </tr>
                                        <tr>
                                            <td width="50%">
                                                Tanggal & Jam : <input type="text" name="tanggal_perawat_igd" id="tanggal-perawat-igd" class="custom-form clear-input d-inline-block col-lg-5 ml-2" value="<?= date('d/m/Y H:i') ?>" placeholder="Masukkan tanggal & jam">
                                            </td>
                                            <td width="50%">
                                                Tanggal & Jam : <input type="text" name="tanggal_dokter_igd" id="tanggal-dokter-igd" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="Masukkan tanggal & jam">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Perawat : <input type="text" name="pk_perawat_igd" id="pk-perawat-igd" class="select2c-input ml-2"></td>
                                            <td>Dokter Verifikasi DPJP : <input type="text" name="pk_dokter_igd" id="pk-dokter-igd" class="select2c-input ml-2"></td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                Tanda Tangan Perawat
                                            </td>
                                            <td class="center">
                                                Verifikasi DPJP dan Tanda Tangan
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ttd_perawat_igd" id="ttd-perawat-igd" value="1" class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ttd_perawat_dpjp_igd_verified') ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ttd_dokter_dpjp_igd" id="ttd-dokter-dpjp-igd" value="1" class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ttd_dokter_dpjp_igd_verified') ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table> -->


                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td width="33%" class="center"><b>Tanggal & Jam : </td>
                                            <td width="33%" class="center"><b>Nama Perawat :</td>
                                            <td width="33%" class="center"><b>Dokter Verifikasi DPJP :</td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <input type="text" name="tanggal_perawat_igd" id="tanggal-perawat-igd" class="custom-form clear-input d-inline-block col-lg-5 ml-2" value="<?= date('d/m/Y H:i') ?>" placeholder="Masukkan tanggal & jam">
                                            </td>
                                            <td class="center"> <input type="text" name="pk_perawat_igd" id="pk-perawat-igd" class="select2c-input ml-2"></td>
                                            <td class="center"> <input type="text" name="pk_dokter_igd" id="pk-dokter-igd" class="select2c-input ml-2"></td>
                                        </tr>
                                        <tr>
                                            <td class="center"></td>
                                            <td class="center">
                                                Tanda Tangan Perawat
                                            </td>
                                            <td class="center">
                                                Verifikasi DPJP dan Tanda Tangan
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center"></td>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ttd_perawat_igd" id="ttd-perawat-igd" value="1" class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ttd_perawat_dpjp_igd_verified') ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ttd_dokter_dpjp_igd" id="ttd-dokter-dpjp-igd" value="1" class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ttd_dokter_dpjp_igd_verified') ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>


                                </div>



                                <!-- Data Pengkajian Dokter-->
                                <div class="form-data-pengkajian-dokter">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left btn_expand_all" type="button"><i class="fas fa-fw fa-expand mr-1"></i>Expand
                                                    All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left btn_collapse_all" type="button"><i class="fas fa-fw fa-compress mr-1"></i>Collapse
                                                    All</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="bold">Waktu Pengkajian</td>
                                            <td width="1%" class="bold">:</td>
                                            <td width="79%">
                                                <input type="text" name="waktu_kajian" id="waktu_kajian" class="custom-form clear-input col-lg-2" value="<?= date('d/m/Y H:i') ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="td-dark"><b></b></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Keluhan Utama</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="keluhan_utama_medis" id="keluhan_utama_medis" rows="4" class="form-control clear-input" placeholder="Keluhan Utama"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Sekarang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rps_medis" id="rps_medis" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Sekarang"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Terdahulu</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="rpt_asma" id="rpt_asma" value="1" class="mr-1">Asma
                                                <input type="checkbox" name="rpt_diabetes_miletus" id="rpt_diabetes_miletus" value="1" class="mr-1 ml-2">Diabetes
                                                Miletus
                                                <input type="checkbox" name="rpt_cardiovascular" id="rpt_cardiovascular" value="1" class="mr-1 ml-2">Cardiovascular
                                                <input type="checkbox" name="rpt_kanker" id="rpt_kanker" value="1" class="mr-1 ml-2">Kanker
                                                <input type="checkbox" name="rpt_thalasemia" id="rpt_thalasemia" value="1" class="mr-1 ml-2">Thalasemia
                                                <input type="checkbox" name="rpt_lain" id="rpt_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="rpt_lain_input" id="rpt_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat terdahulu lain">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Keluarga</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="rpk_asma" id="rpk_asma" value="1" class="mr-1">Asma
                                                <input type="checkbox" name="rpk_diabetes_miletus" id="rpk_diabetes_miletus" value="1" class="mr-1 ml-2">Diabetes
                                                Miletus
                                                <input type="checkbox" name="rpk_cardiovascular" id="rpk_cardiovascular" value="1" class="mr-1 ml-2">Cardiovascular
                                                <input type="checkbox" name="rpk_kanker" id="rpk_kanker" value="1" class="mr-1 ml-2">Kanker
                                                <input type="checkbox" name="rpk_thalasemia" id="rpk_thalasemia" value="1" class="mr-1 ml-2">Thalasemia
                                                <input type="checkbox" name="rpk_lain_lain" id="rpk_lain_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="rpk_lain_input" id="rpk_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat keluarga lain">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" colspan="3">Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan
                                                Kebiasaan :</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><i>(termasuk riwayat perkawinan, obstetri, imunisasi tumbuh
                                                    kembang)</i></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <textarea name="riwayat_detail" id="riwayat_detail" rows="4" class="form-control clear-input" placeholder="Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Alergi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="alergi" id="alergi_awal_tidak" value="0" class="mr-1">Tidak
                                                <input type="radio" name="alergi" id="alergi_awal_ya" value="1" class="mr-1 ml-2">Ya, Sebutkan
                                                <input type="text" name="alergi_input" id="alergi_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan Alergi">
                                                <span class="mr-1 ml-3">Reaksi</span><input type="text" name="reaksi_alergi_input" id="reaksi_alergi_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan Reaksi Alergi">
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Row Data Pengkajian Nyeri -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pengkajian-nyeri"><i class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN
                                                NYERI</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pengkajian-nyeri">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3"><img src="<?= resource_url() ?>images/attributes/pain-measurement-scale-hd.png" alt="Pain Measurement Scale" class="img-fluid mx-auto d-block rounded shadow"></td>
                                                    </tr>
                                                </table>
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="4">Untuk Neonatus</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="center" width="25%">Nilai</th>
                                                            <th class="center" width="25%">0</th>
                                                            <th class="center" width="25%">1</th>
                                                            <th class="center" width="25%">2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Menangis</td>
                                                            <td><input type="radio" name="menangis" id="menangis_0" value="0" class="mr-1 neonatus neo_0">Tidak Menangis
                                                            </td>
                                                            <td><input type="radio" name="menangis" id="menangis_1" value="1" class="mr-1 neonatus neo_1">Merintih</td>
                                                            <td><input type="radio" name="menangis" id="menangis_2" value="2" class="mr-1 neonatus neo_2">Menagis Terus
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>SPO<sub>2</sub> > 95%</td>
                                                            <td><input type="radio" name="spo" id="spo_0" value="0" class="mr-1 neonatus neo_3">Normal</td>
                                                            <td><input type="radio" name="spo" id="spo_1" value="1" class="mr-1 neonatus neo_4">F<sub>1</sub>O<sub>2</sub>
                                                                < 30%</td>
                                                            <td><input type="radio" name="spo" id="spo_2" value="2" class="mr-1 neonatus neo_5">F<sub>1</sub>O<sub>2</sub>
                                                                < 30%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Peningkatan Tanda-Tanda Vital</td>
                                                            <td><input type="radio" name="vital" id="vital_0" value="0" class="mr-1 neonatus neo_6">HR dan TD dalam batas
                                                                normal</td>
                                                            <td><input type="radio" name="vital" id="vital_1" value="1" class="mr-1 neonatus neo_7">
                                                                < 20%</td>
                                                            <td><input type="radio" name="vital" id="vital_2" value="2" class="mr-1 neonatus neo_8">> 20%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ekspresi Wajah</td>
                                                            <td><input type="radio" name="wajah" id="wajah_0" value="0" class="mr-1 neonatus neo_9">Biasa</td>
                                                            <td><input type="radio" name="wajah" id="wajah_1" value="1" class="mr-1 neonatus neo_10">Meringis</td>
                                                            <td><input type="radio" name="wajah" id="wajah_2" value="2" class="mr-1 neonatus neo_11">Meringis / Mendengkur
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tidur</td>
                                                            <td><input type="radio" name="tidur" id="tidur_0" value="0" class="mr-1 neonatus neo_12">Normal</td>
                                                            <td><input type="radio" name="tidur" id="tidur_1" value="1" class="mr-1 neonatus neo_13">Sering Terbangun</td>
                                                            <td><input type="radio" name="tidur" id="tidur_2" value="2" class="mr-1 neonatus neo_14">Tidak Ada Tidur</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td colspan="3">
                                                                <input type="text" name="total_neonatus" id="total_neonatus" class="custom-form col-md-1 center" readonly>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                                    <tr>
                                                        <td width="20%" class="bold">Keterangan</td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td width="69%">
                                                            <input type="radio" name="ptn_keterangan" id="ptn_keterangan_tidak" value="Tidak Nyeri" class="mr-1">Tidak Nyeri : 0
                                                            <input type="radio" name="ptn_keterangan" id="ptn_keterangan_ringan" value="Ringan" class="mr-1 ml-2">Ringan : 1 - 3
                                                            <input type="radio" name="ptn_keterangan" id="ptn_keterangan_sedang" value="Sedang" class="mr-1 ml-2">Sedang : 4 - 6
                                                            <input type="radio" name="ptn_keterangan" id="ptn_keterangan_berat" value="Berat" class="mr-1 ml-2">Berat : 7 - 10
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Nyeri Hilang, Bila</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="ptn_minum_obat" id="ptn_minum_obat" value="1" class="mr-1">Minum Obat
                                                            <input type="checkbox" name="ptn_mendengarkan_musik" id="ptn_mendengarkan_musik" value="1" class="mr-1 ml-2">Mendengarkan Musik
                                                            <input type="checkbox" name="ptn_istirahat" id="ptn_istirahat" value="1" class="mr-1 ml-2">Istirahat
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <input type="checkbox" name="ptn_berubah_posisi" id="ptn_berubah_posisi" value="1" class="mr-1">Berubah
                                                            Posisi / Tidur
                                                            <input type="checkbox" name="ptn_lain" id="ptn_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="ptn_lain_input" id="ptn_lain_input" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain - lain">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3" class="bold center">Untuk Anak Usia < 3 tahun <i>
                                                                FLACC</i></td>
                                                    </tr>
                                                </table>
                                                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                    <thead>
                                                        <tr>
                                                            <th width="80%" class="center" colspan="2"><b>Wajah</b></th>
                                                            <th width="20%" class="center"><b>Nilai</b></th>
                                                        </tr>
                                                    </thead>




                                                    <!-- WESS -->
                                                    <tbody>
                                                        <tr>
                                                            <td width="5%" class="center">1</td>
                                                            <td width="75%">
                                                                <input type="radio" name="flacc_wajah" id="flacc_wajah_0" value="1" class="mr-1 flacc">Tidak ada ekspresi tertentu
                                                                atau
                                                                senyum
                                                            </td>
                                                            <td width="20%" rowspan="3">
                                                                <input type="number" name="nilai_flacc_wajah" id="nilai_flacc_wajah" class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_0" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_wajah" id="flacc_wajah_1" value="2" class="mr-1 flacc">Sesekali meringis /
                                                                mengerutkan
                                                                kening, menarik diri, tidak tertarik</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">3</td>
                                                            <td><input type="radio" name="flacc_wajah" id="flacc_wajah_2" value="3" class="mr-1 flacc">Sering sampai konstan
                                                                mengerutkan
                                                                kening, rahang terkatup, dagu gemetaran</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="center bold">Kaki</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">0</td>
                                                            <td><input type="radio" name="flacc_kaki" id="flacc_kaki_0" value="0" class="mr-1 flacc">Posisi kaki normal atau
                                                                santai</td>
                                                            <td rowspan="3">
                                                                <input type="number" name="nilai_flacc_kaki" id="nilai_flacc_kaki" class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_1" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td><input type="radio" name="flacc_kaki" id="flacc_kaki_1" value="1" class="mr-1 flacc">Cemas, gelisah, tegang
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_kaki" id="flacc_kaki_2" value="2" class="mr-1 flacc">Menendang atau menarik
                                                                kaki</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="center bold">Aktifitas</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">0</td>
                                                            <td><input type="radio" name="flacc_aktifitas" id="flacc_aktifitas_0" value="0" class="mr-1 flacc">Berbaring tenang, posisi normal,
                                                                bergerak dengan mudah</td>
                                                            <td rowspan="3">
                                                                <input type="number" name="nilai_flacc_aktifitas" id="nilai_flacc_aktifitas" class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_2" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td><input type="radio" name="flacc_aktifitas" id="flacc_aktifitas_1" value="1" class="mr-1 flacc">Menggeliat, mondar-mandir, tegang
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_aktifitas" id="flacc_aktifitas_2" value="2" class="mr-1 flacc">Melengkung, kaku, menyentak</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="center bold">Menangis</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">0</td>
                                                            <td><input type="radio" name="flacc_menangis" id="flacc_menangis_0" value="0" class="mr-1 flacc">Tidak
                                                                ada teriakan (terjaga /
                                                                tidur)</td>
                                                            <td rowspan="3">
                                                                <input type="number" name="nilai_flacc_menangis" id="nilai_flacc_menangis" class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_3" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td><input type="radio" name="flacc_menangis" id="flacc_menangis_1" value="1" class="mr-1 flacc">Mengerang, merintih, sesekali
                                                                mengeluh</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_menangis" id="flacc_menangis_2" value="2" class="mr-1 flacc">Menangis terus, teriak, sering
                                                                mengeluh</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="center bold">Bicara / Suara</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">0</td>
                                                            <td><input type="radio" name="flacc_bicara" id="flacc_bicara_0" value="0" class="mr-1 flacc">Puas, senang, santai</td>
                                                            <td rowspan="3">
                                                                <input type="number" name="nilai_flacc_bicara" id="nilai_flacc_bicara" class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_4" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td><input type="radio" name="flacc_bicara" id="flacc_bicara_1" value="1" class="mr-1 flacc">Sesekali diyakinkan dengan
                                                                sentuhan, pelukan, diajak berbicara atau dialihkan</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_bicara" id="flacc_bicara_2" value="2" class="mr-1 flacc">Sulit untuk dihibur atau dibuat
                                                                nyaman</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="bold">TOTAL</td>
                                                            <td><input type="number" min="0" name="total_nilai_flacc" id="total_nilai_flacc" class="form-control center" readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row Data Pemeriksaan Fisik -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemeriksaan-fisik"btn_hapus_drawpad><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN
                                                FISIK</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-fisik">
                                        <table class="table table-bordered table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td width="20%">Kepala</td>
                                                <td wdith="50%"><input type="text" name="kepala_pm" id="kepala_pm" class="custom-form col-lg-12"></td>
                                                <!-- Untuk Gambar Anatomi -->
                                                <td width="30%" rowspan="8">
                                                    <div class="box-draw">
                                                        <img src="<?php echo base_url('resources/images/attributes/') . 'anathomi-fix.jpg' ?>" width="361" height="434">
                                                        <div class="drawpad" id="drawpad" data-input="#drawpad"></div>
                                                        <img src="" id="fisik_img_anathomi" width="361" height="434">
                                                    </div>
                                                    <button type="button" id="btn_hapus_drawpad" class="btn btn-secondary btn-block" onclick="hapusDrawpad()"><i class="fas fa-trash mr-2"></i>Clear Canvas</button>

                                                    <input type="hidden" name="drawpad" id="drawpad_input" value="">
                                                </td>
                                                <!-- End -->
                                            </tr>
                                            <tr>
                                                <td>Mata</td>
                                                <td><input type="text" name="mata_pm" id="mata_pm" class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td>Mulut</td>
                                                <td><input type="text" name="mulut_pm" id="mulut_pm" class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td>Leher</td>
                                                <td><input type="text" name="leher_pm" id="leher_pm" class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2">Thoraks</td>
                                                <td><label class="col-lg-2">Cor</label><input type="text" name="thoraks_cor_pm" id="thoraks_cor_pm" class="custom-form d-inline-block col-lg-10"></td>
                                            </tr>
                                            <tr>
                                                <td><label class="col-lg-2">Pulmo</label><input type="text" name="thoraks_pulmo_pm" id="thoraks_pulmo_pm" class="custom-form d-inline-block col-lg-10"></td>
                                            </tr>
                                            <tr>
                                                <td>Abdomen</td>
                                                <td><input type="text" name="abdomen_pm" id="abdomen_pm" class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td>Ekstermitas</td>
                                                <td><input type="text" name="ekstermitas_pm" id="ekstermitas_pm" class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td>Kulit dan Kelamin</td>
                                                <td><input type="text" name="kulit_kelamin_pm" id="kulit_kelamin_pm" class="custom-form col-lg-12"></td>
                                                <td><label class="col-lg-4">Status Lokalis</label><input type="text" name="status_lokalis" id="status_lokalis" class="custom-form d-inline-block col-lg-8"></td>
                                            </tr>
                                            <tr>
                                                <td>Diagnosis Awal</td>
                                                <td colspan="2">
                                                    <textarea name="diagnosa_awal" id="diagnosa_awal" class="form-control" rows="4"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Diagnosis Banding</td>
                                                <td colspan="2">
                                                    <textarea name="diagnosa_banding" id="diagnosa_banding" class="form-control" rows="4"></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Pemeriksaan Penunjang -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemeriksaan-penunjang"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN
                                                PENUNJANG</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-penunjang">
                                        <table class="table table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td width="20%" class="bold">Lab</td>
                                                <td width="1%" class="bold">:</td>
                                                <td width="79%%">
                                                    <!-- <input type="checkbox" name="lab_dr" id="lab_dr" value="1" class="mr-1">DR -->
                                                    <input type="checkbox" name="lab_dpl" id="lab_dpl" value="1" class="mr-1">DPL
                                                    <input type="checkbox" name="lab_agd" id="lab_agd" value="1" class="mr-1 ml-2">AGD
                                                    <input type="checkbox" name="lab_elektrolit" id="lab_elektrolit" value="1" class="mr-1 ml-2">Elektrolit
                                                    <input type="checkbox" name="lab_urin" id="lab_urin" value="1" class="mr-1 ml-2">Urin
                                                    <input type="checkbox" name="lab_ck" id="lab_ck" value="1" class="mr-1 ml-2">CK/CKMB
                                                    <input type="checkbox" name="lab_gds" id="lab_gds" value="1" class="mr-1 ml-2">GDS
                                                    <input type="checkbox" name="lab_ureum" id="lab_ureum" value="1" class="mr-1 ml-2">Ureum Creatinin
                                                    <input type="checkbox" name="lab_lain" id="lab_lain" value="1" class="mr-1 ml-2">Lain-lain,
                                                    <input type="text" name="lab_lain_input" id="lab_lain_input" class="custom-form d-inline-block col-md-4 disabled" placeholder="Sebutkan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">X-Ray</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="checkbox" name="xray_tidak_ada" id="xray_tidak_ada" value="1" class="mr-1">Tidak Ada
                                                    <input type="checkbox" name="xray_thorax" id="xray_thorax" value="1" class="mr-1 ml-2">Thorax
                                                    <input type="checkbox" name="xray_abdomen" id="xray_abdomen" value="1" class="mr-1 ml-2">Abdomen 3 Posisi
                                                    <input type="checkbox" name="xray_ctscan" id="xray_ctscan" value="1" class="mr-1 ml-2">CT Scan
                                                    <input type="checkbox" name="xray_lain" id="xray_lain" value="1" class="mr-1 ml-2">Lain-lain,
                                                    <input type="text" name="xray_lain_input" id="xray_lain_input" class="custom-form d-inline-block col-md-4 disabled" placeholder="Sebutkan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">EKG</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="ekg" id="ekg_tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="ekg" id="ekg_yaa" value="1" class="mr-1 ml-2">Ya,
                                                    <input type="text" name="ket_ekg" id="ket_ekg" class="custom-form d-inline-block col-md-4 disabled" placeholder="Hasil">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Terapi / Tindakan / Instruksi Lain -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-terapi-tindakan"><i class="fas fa-expand mr-1"></i>Expand</button>TERAPI / TINDAKAN
                                                / INSTRUKSI LAIN</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-terapi-tindakan">
                                        <div id="field_terapi_tindakan"></div>
                                    </div>

                                    <!-- Row Data Status Akhir Pasien -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-status-akhir-pasien"><i class="fas fa-expand mr-1"></i>Expand</button>STATUS AKHIR
                                                PASIEN</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-status-akhir-pasien">
                                        <table class="table table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td width="20%" class="bold">Dirawat di Ruang</td>
                                                <td width="1%" class="bold">:</td>
                                                <td width="79%%">
                                                    <input type="text" name="bangsal" id="bangsal_auto" class="select2c-input">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Dipulangkan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="dipulangkan" id="dipulangkan_tidak" value="0" class="mr-1">Tidak Perlu Kontrol
                                                    <input type="radio" name="dipulangkan" id="dipulangkan_ya" value="1" class="mr-1 ml-2">Kontrol di
                                                    <input type="text" name="ket_dipulangkan" id="ket_dipulangkan" class="custom-form d-inline-block col-md-4 disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Dirujuk Ke</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="dirujuk_ke" id="dirujuk_ke" class="custom-form col-md-6"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Alasan Rujuk</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="alasan_rujuk" id="alasan_rujuk" class="custom-form col-md-6"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Pulang Paksa / APS</td>
                                                <td class="bold">:</td>
                                                <td>Alasan<input type="text" name="alasan_pulang_paksa" id="alasan_pulang_paksa" class="custom-form d-inline-block col-md-6 ml-2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><input type="checkbox" name="meninggal" id="meninggal" value="1" class="mr-1">Meninggal</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Kondisi Pasien Saat Pulang/Rujuk</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="kondisi_pulang" id="kondisi_pulang" class="custom-form col-md-6"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Kesadaran</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="checkbox" name="kesadaran_cm" id="kesadaran_cm" value="1" class="mr-1">CM
                                                    <input type="checkbox" name="kesadaran_apatis" id="kesadaran_apatis" value="1" class="mr-1 ml-2">Apatis
                                                    <input type="checkbox" name="kesadaran_delirium" id="kesadaran_delirium" value="1" class="mr-1 ml-2">Delirium
                                                    <input type="checkbox" name="kesadaran_sopor" id="kesadaran_sopor" value="1" class="mr-1 ml-2">Sopor
                                                    <input type="checkbox" name="kesadaran_koma" id="kesadaran_koma" value="1" class="mr-1 ml-2">Koma
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td class="bold">Jenis Kebutuhan layanan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="checkbox" name="kebutuhan_preventif" id="kebutuhan_preventif" value="1" class="mr-1">Preventif
                                                    <input type="checkbox" name="kebutuhan_kuratif" id="kebutuhan_kuratif" value="1" class="mr-1 ml-2">Kuratif
                                                    <input type="checkbox" name="kebutuhan_paliatif" id="kebutuhan_paliatif" value="1" class="mr-1 ml-2">Paliatif
                                                    <input type="checkbox" name="kebutuhan_rehabilitatif" id="kebutuhan_rehabilitatif" value="1" class="mr-1 ml-2">Rehabilitatif
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="bold">GCS</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <label>E</label><input type="text" name="gcs_e" id="gcs_e" class="custom-form d-inline-block col-md-1 mr-1 ml-2" onkeypress="return hanyaAngka(event)">
                                                    <label>M</label><input type="text" name="gcs_m" id="gcs_m" class="custom-form d-inline-block col-md-1 mr-1 ml-2" onkeypress="return hanyaAngka(event)">
                                                    <label>V</label><input type="text" name="gcs_v" id="gcs_v" class="custom-form d-inline-block col-md-1 mr-1 ml-2" onkeypress="return hanyaAngka(event)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Catatan Khusus</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div id="field_catatan_khusus"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Verifikasi -->
                                    <table class="table table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td width="50%" class="bold center">Nama Dokter Jaga IGD dan Tanda Tangan
                                            </td>
                                            <td width="50%" class="bold center">Verifikasi DPJP dan Tanda Tangan</td>
                                        </tr>
                                        <tr>
                                            <td class="center"><input type="text" name="dokter_igd" id="dokter_igd" class="select2c-input"></td>
                                            <td class="center"><input type="text" name="verifikasi_dpjp" id="verifikasi_dpjp" class="select2c-input"></td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <input type="checkbox" name="ttd_dokter_igd" id="ttd_dokter_igd" value="1" class="custom-form col-lg-1 mx-auto">
                                                <?= digitalSignature('ttd_dokter_igd_verified') ?>
                                            </td>
                                            <td class="center">
                                                <input type="checkbox" name="ttd_verifikasi_dpjp" id="ttd_verifikasi_dpjp" value="1" class="custom-form col-lg-1 mx-auto">
                                                <?= digitalSignature('ttd_verifikasi_dpjp_verified') ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>



                                <!-- Data Pengkajian Perawat-->
                                <div class="form-data-pengkajian-perawat">
                                    <table table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left btn_expand_all" type="button"><i class="fas fa-fw fa-expand mr-1"></i>Expand
                                                    All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left btn_collapse_all" type="button"><i class="fas fa-fw fa-compress mr-1"></i>Collapse
                                                    All</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="td-dark"><b></b></td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="bold">Informasi Diperoleh dari</td>
                                            <td wdith="1%" class="bold">:</td>
                                            <td width="79%">
                                                <input type="checkbox" name="informasi_dari_pasien" id="informasi_dari_pasien" value="1" class="mr-1">Pasien
                                                <input type="checkbox" name="informasi_dari_keluarga" id="informasi_dari_keluarga" value="1" class="mr-1 ml-2">Keluarga
                                                <input type="checkbox" name="informasi_dari_lain" id="informasi_dari_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="informasi_dari_lain_input" id="informasi_dari_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan informasi lain">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Cara Masuk</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="cara_masuk_tanpa_bantuan" id="cara_masuk_tanpa_bantuan" value="1" class="mr-1">Jalan tanpa
                                                bantuan
                                                <input type="checkbox" name="cara_masuk_dengan_bantuan" id="cara_masuk_dengan_bantuan" value="1" class="mr-1 ml-2">Jalan
                                                dengan bantuan
                                                <input type="checkbox" name="cara_masuk_kursi_roda" id="cara_masuk_kursi_roda" value="1" class="mr-1 ml-2">Kursi Roda
                                                <input type="checkbox" name="cara_masuk_brankar" id="cara_masuk_brankar" value="1" class="mr-1 ml-2">Brankar
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Keluhan Utama</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="keluhan_utama_keperawatan" id="keluhan_utama_keperawatan" rows="4" class="form-control clear-input" placeholder="Keluhan Utama"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Sekarang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rps_keperawatan" id="rps_keperawatan" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Sekarang"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Terdahulu</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="rpt_keperawatan_asma" id="rpt_keperawatan_asma" value="1" class="mr-1">Asma
                                                <input type="checkbox" name="rpt_keperawatan_hipertensi" id="rpt_keperawatan_hipertensi" value="1" class="mr-1 ml-2">Hipertensi
                                                <input type="checkbox" name="rpt_keperawatan_jantung" id="rpt_keperawatan_jantung" value="1" class="mr-1 ml-2">Jantung
                                                <input type="checkbox" name="rpt_keperawatan_diabetes" id="rpt_keperawatan_diabetes" value="1" class="mr-1 ml-2">Diabetes
                                                <input type="checkbox" name="rpt_keperawatan_hepatitis" id="rpt_keperawatan_hepatitis" value="1" class="mr-1 ml-2">Hepatitis
                                                <input type="checkbox" name="rpt_keperawatan_lain" id="rpt_keperawatan_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="rpt_keperawatan_lain_input" id="rpt_keperawatan_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat penyakit terdahulu lain">
                                            </td>
                                        </tr>

                                        <!-- // BARU -->
                                        <tr>
                                            <td class="bold">Pernah dirawat</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="pernahdirawat_1" id="pernahdirawat-1" value="1" class="mr-1">Tidak
                                                <input type="checkbox" name="pernahdirawat_2" id="pernahdirawat-2" value="1" class="mr-1 ml-2">Ya, atas indikasi
                                                <input type="text" name="pernahdirawat_3" id="pernahdirawat-3" class="custom-form clear-input d-inline-block col-lg-7">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Pernah operasi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="pernahdioprasi_1" id="pernahdioprasi-1" value="1" class="mr-1">Tidak
                                                <input type="checkbox" name="pernahdioprasi_2" id="pernahdioprasi-2" value="1" class="mr-1 ml-2">Ya, atas indikasi
                                                <input type="text" name="pernahdioprasi_3" id="pernahdioprasi-3" class="custom-form clear-input d-inline-block col-lg-7">
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-rpkk"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT PENYAKIT KELUARGA</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-rpkk">
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="rpk_keperawatan_asma" id="rpk_keperawatan_asma" value="1" class="mr-1">Asma
                                                    <input type="checkbox" name="rpk_keperawatan_hipertensi" id="rpk_keperawatan_hipertensi" value="1" class="mr-1 ml-2">Hipertensi
                                                    <input type="checkbox" name="rpk_keperawatan_jantung" id="rpk_keperawatan_jantung" value="1" class="mr-1 ml-2">Jantung
                                                    <input type="checkbox" name="rpk_keperawatan_diabetes" id="rpk_keperawatan_diabetes" value="1" class="mr-1 ml-2">Diabetes
                                                    <input type="checkbox" name="rpk_keperawatan_hepatitis" id="rpk_keperawatan_hepatitis" value="1" class="mr-1 ml-2">Hepatitis
                                                    <input type="checkbox" name="rpk_keperawatan_lain" id="rpk_keperawatan_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                    <input type="text" name="rpk_keperawatan_lain_input" id="rpk_keperawatan_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat penyakit keluarga lain">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- // BARU -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-rkdiisi"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT KESEHATAN (DIISI UNTUK PASIEN NEONATUS / ANAK)</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-rkdiisi">
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td><span style="white-space: nowrap;">1. Riwayat kesehatan</span></td>
                                                <td> a. Usia kehamilan 
                                                    <input type="text" name="riwayatkesehatanZ_1" id="riwayatkesehatanZ-1" class="custom-form clear-input d-inline-block col-lg-1 ml-1"> minggu, 
                                                    BB : <input type="text" name="riwayatkesehatanZ_2" id="riwayatkesehatanZ-2" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2"> gram, 
                                                    PB : <input type="text" name="riwayatkesehatanZ_3" id="riwayatkesehatanZ-3" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2"> cm, 
                                                    LK : <input type="text" name="riwayatkesehatanZ_4" id="riwayatkesehatanZ-4" class="custom-form clear-input d-inline-block col-lg-1"> cm
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> b. Cara persalinan  
                                                    <input type="checkbox" name="riwayatkesehatanZ_5" id="riwayatkesehatanZ-5" value="1" class="mr-1">Spontan
                                                    <input type="checkbox" name="riwayatkesehatanZ_6" id="riwayatkesehatanZ-6" value="1" class="mr-1 ml-2">Ekstraksi vakum  
                                                    <input type="checkbox" name="riwayatkesehatanZ_7" id="riwayatkesehatanZ-7" value="1" class="mr-1 ml-2">Ekstraksi Forceps  
                                                    <input type="checkbox" name="riwayatkesehatanZ_8" id="riwayatkesehatanZ-8" value="1" class="mr-1 ml-2">Seksio caesaria
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> c. Kondisi Pasca persalinan   
                                                    <input type="checkbox" name="riwayatkesehatanZ_9" id="riwayatkesehatanZ-9" value="1" class="mr-1">Normal   
                                                    <input type="checkbox" name="riwayatkesehatanZ_10" id="riwayatkesehatanZ-10" value="1" class="mr-1 ml-2">Dirawat selama   
                                                    <input type="text" name="riwayatkesehatanZ_11" id="riwayatkesehatanZ-11" class="custom-form clear-input d-inline-block col-lg-1 mr-1 ml-2"> hari, di
                                                    <input type="text" name="riwayatkesehatanZ_12" id="riwayatkesehatanZ-12" class="custom-form clear-input d-inline-block col-lg-4">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span style="white-space: nowrap;">2. Imunisasi</span></td>
                                                <td> <input type="checkbox" name="rpkimunisasi_1" id="rpkimunisasi-1" value="1" class="mr-1"> BCG
                                                    <input type="checkbox" name="rpkimunisasi_2" id="rpkimunisasi-2" value="1" class="mr-1 ml-1"> DPT : 
                                                    <input type="text" name="rpkimunisasi_3" id="rpkimunisasi-3" class="custom-form clear-input d-inline-block col-lg-1 mr-1 ml-1">
                                                    <input type="checkbox" name="rpkimunisasi_4" id="rpkimunisasi-4" value="1" class="mr-1 ml-2"> HIB :
                                                    <input type="text" name="rpkimunisasi_5" id="rpkimunisasi-5" class="custom-form clear-input d-inline-block col-lg-1 mr-1 ml-1">
                                                    <input type="checkbox" name="rpkimunisasi_6" id="rpkimunisasi-6" value="1" class="mr-1 ml-2"> Polio :
                                                    <input type="text" name="rpkimunisasi_7" id="rpkimunisasi-7" class="custom-form clear-input d-inline-block col-lg-1 mr-1 ml-1">
                                                    <input type="checkbox" name="rpkimunisasi_8" id="rpkimunisasi-8" value="1" class="mr-1 ml-2"> Hepatitis B :
                                                    <input type="text" name="rpkimunisasi_9" id="rpkimunisasi-9" class="custom-form clear-input d-inline-block col-lg-1 mr-1 ml-1">
                                                    <input type="checkbox" name="rpkimunisasi_10" id="rpkimunisasi-10" value="1" class="mr-1 ml-1"> Campak 
                                                    <input type="checkbox" name="rpkimunisasi_11" id="rpkimunisasi-11" value="1" class="mr-1 ml-1"> Lain-lain  
                                                    <input type="text" name="rpkimunisasi_12" id="rpkimunisasi-12" class="custom-form clear-input d-inline-block col-lg-1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span style="white-space: nowrap;">3. Riwayat Pertumbuhan dan Perkembangan</span></td>
                                            </tr>
                                        </table>

                                        <table class="table table-sm" style="margin-top: -15px">
                                            <tr>
                                                <td width="75%">
                                                    <table class="table table-sm table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%" class="center"><b>Personal Sosial</b></th>
                                                                <th width="10%" class="center"><b>Motorik Halus</b></th>
                                                                <th width="10%" class="center"><b>Motorik Kasar</b></th>
                                                                <th width="10%" class="center"><b>Bahasa</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" name="personalsosial_1" id="personalsosial-1" value="1" class="mr-1">Tersenyum</td>
                                                                <td><input type="checkbox" name="personalsosial_2" id="personalsosial-2" value="1" class="mr-1">Mengikuti Objek ke garis  tengah</td>
                                                                <td><input type="checkbox" name="personalsosial_3" id="personalsosial-3" value="1" class="mr-1">ooo / aah</td>
                                                                <td><input type="checkbox" name="personalsosial_4" id="personalsosial-4" value="1" class="mr-1">Mengangkat kepala 45 <sup>0</sup></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="motorikhalus_1" id="motorikhalus-1" value="1" class="mr-1">Mengambil Tangan</td>
                                                                <td><input type="checkbox" name="motorikhalus_2" id="motorikhalus-2" value="1" class="mr-1">Meraih benda</td>
                                                                <td><input type="checkbox" name="motorikhalus_3" id="motorikhalus-3" value="1" class="mr-1">Mengoceh</td>
                                                                <td><input type="checkbox" name="motorikhalus_4" id="motorikhalus-4" value="1" class="mr-1">Tengkurap sendiri</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="motorikkasar_1" id="motorikkasar-1" value="1" class="mr-1">Tepuk tangan</td>
                                                                <td><input type="checkbox" name="motorikkasar_2" id="motorikkasar-2" value="1" class="mr-1">Memegang dengan ibu jari</td>
                                                                <td><input type="checkbox" name="motorikkasar_3" id="motorikkasar-3" value="1" class="mr-1">Papa/mama</td>
                                                                <td><input type="checkbox" name="motorikkasar_4" id="motorikkasar-4" value="1" class="mr-1">Berdiri</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="bahasaP_1" id="bahasaP-1" value="1" class="mr-1">Meniru kegiatan</td>
                                                                <td><input type="checkbox" name="bahasaP_2" id="bahasaP-2" value="1" class="mr-1">Mencoret-coret</td>
                                                                <td><input type="checkbox" name="bahasaP_3" id="bahasaP-3" value="1" class="mr-1">Beberapa kata</td>
                                                                <td><input type="checkbox" name="bahasaP_4" id="bahasaP-4" value="1" class="mr-1">Berjalan</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="bahasaQ_1" id="bahasaQ-1" value="1" class="mr-1">Memakai sendok</td>
                                                                <td><input type="checkbox" name="bahasaQ_2" id="bahasaQ-2" value="1" class="mr-1">Menumpuk kubus</td>
                                                                <td><input type="checkbox" name="bahasaQ_3" id="bahasaQ-3" value="1" class="mr-1">Kombinasi kata</td>
                                                                <td><input type="checkbox" name="bahasaQ_4" id="bahasaQ-4" value="1" class="mr-1">Naik tangga</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Pemeriksaan Fisik dan Tanda Vital -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemeriksaan-fisik-tanda-vital"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
                                                DAN TANDA-TANDA VITAL</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-fisik-tanda-vital">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="30%"><b>Tanda Vital</b></td>
                                                        <td width="70%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kesadaran</td>
                                                        <td>
                                                            <input type="checkbox" name="composmentis" id="composmentis" value="1" class="mr-1">Composmentis
                                                            <input type="checkbox" name="apatis" id="apatis" value="1" class="mr-1 ml-2">Apatis
                                                            <input type="checkbox" name="samnolen" id="samnolen" value="1" class="mr-1 ml-2">Samnolen
                                                            <input type="checkbox" name="sopor" id="sopor" value="1" class="mr-1 ml-2">Sopor
                                                            <input type="checkbox" name="koma" id="koma" value="1" class="mr-1 ml-2">Koma
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCS</td>
                                                        <td>
                                                            <span>
                                                                E =<input type="text" name="gcs_keperawatan_e" id="gcs_keperawatan_e" class="custom-form clear-input d-inline-block col-lg-2 mr-1 ml-2 gcswK" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                M =<input type="text" name="gcs_keperawatan_m" id="gcs_keperawatan_m" class="custom-form clear-input d-inline-block col-lg-2 mr-1 ml-2 gcswK" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                V =<input type="text" name="gcs_keperawatan_v" id="gcs_keperawatan_v" class="custom-form clear-input d-inline-block col-lg-2 mr-1 ml-2 gcswK" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                Total : <input type="text" name="gcs_tottal" id="gcs-tottal" class="custom-form clear-input d-inline-block col-lg-2" placeholder="0">

                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tekanan Darah</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="tensi_sis" id="pa_tensi_sis" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
                                                                <span>/</span>
                                                                <input type="text" name="tensi_dis" id="pa_tensi_dis" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Diastolik" onkeypress="return hanyaAngka(event)">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-custom">mmHg</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Suhu</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="suhu_pa" id="pa_suhu" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Suhu" onkeypress="return hanyaAngka(event)">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-custom">&#8451;</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Frekuensi Nadi</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="nadi_pa" id="pa_nadi" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-custom">x/mnt</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Frekuensi Nafas</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="nafas_pa" id="pa_nafas" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Nafas" onkeypress="return hanyaAngka(event)">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-custom">x/mnt</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Saturasi</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="saturasiTM" id="saturasiTM" class="custom-form clear-input d-inline-block col-lg-3" placeholder="saturasi" onkeypress="return hanyaAngka(event)">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-custom">%</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%"><b>Respirasi dan Kardiovaskuler</b></td>
                                                        <td width="70%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Retraksi Dada</td>
                                                        <td> :
                                                            <input type="text" name="retraksidada_1" id="retraksidada-1" class="custom-form clear-input d-inline-block col-lg-8">                                                          
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jalan Nafas</td>
                                                        <td> :
                                                            <input type="checkbox" name="retraksidada_2" id="retraksidada-2" value="1" class="mr-1">Ya
                                                            <input type="checkbox" name="retraksidada_3" id="retraksidada-3" value="1" class="mr-1 ml-2">Tidak                                                          
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Warna Kulit</td>
                                                        <td> :
                                                            <input type="checkbox" name="retraksidada_4" id="retraksidada-4" value="1" class="mr-1">Kemerahan   
                                                            <input type="checkbox" name="retraksidada_5" id="retraksidada-5" value="1" class="mr-1 ml-2">Pucat                                                        
                                                            <input type="checkbox" name="retraksidada_6" id="retraksidada-6" value="1" class="mr-1 ml-2">Sianosis                                                         
                                                            <input type="checkbox" name="retraksidada_7" id="retraksidada-7" value="1" class="mr-1 ml-2">Ikterik                                                         
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ekstermitas</td>
                                                        <td> :
                                                            <input type="checkbox" name="retraksidada_8" id="retraksidada-8" value="1" class="mr-1">Hangat   
                                                            <input type="checkbox" name="retraksidada_9" id="retraksidada-9" value="1" class="mr-1 ml-2">Dingin                                                         
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>CRT</td>
                                                        <td> :
                                                            <input type="text" name="retraksidada_10" id="retraksidada-10" class="custom-form clear-input d-inline-block col-lg-3">detik                                                                                                               
                                                       </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="30%"><b>Aktivitas :</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">
                                                            <input type="checkbox" name="aktifikasaktif_1" id="aktifikasaktif-1" value="1" class="mr-1">Aktif
                                                            <input type="checkbox" name="aktifikasaktif_2" id="aktifikasaktif-2" value="1" class="mr-1 ml-2">Tenang
                                                            <input type="checkbox" name="aktifikasaktif_3" id="aktifikasaktif-3" value="1" class="mr-1 ml-2">Letargi
                                                            <input type="checkbox" name="aktifikasaktif_4" id="aktifikasaktif-4" value="1" class="mr-1 ml-2">Kejang
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="table table-no-border table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="30%"><b>Sistem Saraf Pusat</b></td>
                                                        <td width="70%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pupil</td>
                                                        <td> :
                                                            <input type="checkbox" name="sistemsaraf_1" id="sistemsaraf-1" value="1" class="mr-1">Isorkor
                                                            <input type="checkbox" name="sistemsaraf_2" id="sistemsaraf-2" value="1" class="mr-1 ml-2">Anisorkor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kejang</td>
                                                        <td> :
                                                            <input type="checkbox" name="sistemsaraf_3" id="sistemsaraf-3" value="1" class="mr-1">Tidak           
                                                            <input type="checkbox" name="sistemsaraf_4" id="sistemsaraf-4" value="1" class="mr-1 ml-2">Ada :                                                        
                                                            <input type="text" name="sistemsaraf_5" id="sistemsaraf-5" class="custom-form clear-input d-inline-block col-lg-8">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gerakan</td>
                                                        <td> :
                                                            <input type="checkbox" name="sistemsaraf_6" id="sistemsaraf-6" value="1" class="mr-1">Aktif                   
                                                            <input type="checkbox" name="sistemsaraf_7" id="sistemsaraf-7" value="1" class="mr-1 ml-2">Lemah                
                                                            <!-- <input type="checkbox" name="sistemsaraf_8" id="sistemsaraf-8" value="1" class="mr-1 ml-2">Aktif                       -->
                                                            <input type="checkbox" name="sistemsaraf_9" id="sistemsaraf-9" value="1" class="mr-1 ml-2">Paralisis  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Refleks isap (neonatus)</td>
                                                        <td> :
                                                            <input type="checkbox" name="sistemsaraf_10" id="sistemsaraf-10" value="1" class="mr-1">Kuat                               
                                                            <input type="checkbox" name="sistemsaraf_11" id="sistemsaraf-11" value="1" class="mr-1 ml-2">Lemah                 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%"><b>Hambatan Lain</b></td>
                                                        <td width="70%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kondisi Mulut</td>
                                                        <td> :
                                                            <input type="checkbox" name="hambatanlain_1" id="hambatanlain-1" value="1" class="mr-1">Normal              
                                                            <input type="checkbox" name="hambatanlain_2" id="hambatanlain-2" value="1" class="mr-1 ml-2">Labio schizis                                                                 
                                                            <input type="checkbox" name="hambatanlain_3" id="hambatanlain-3" value="1" class="mr-1 ml-2">Palato schizis                                                                 
                                                            <input type="checkbox" name="hambatanlain_4" id="hambatanlain-4" value="1" class="mr-1 ml-2">Labio palato schizis                 
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>Spastisitas alat gerak </td>
                                                        <td> :
                                                            <input type="checkbox" name="hambatanlain_5" id="hambatanlain-5" value="1" class="mr-1">Tidak spastik                  
                                                            <input type="checkbox" name="hambatanlain_6" id="hambatanlain-6" value="1" class="mr-1 ml-2">Spastik                                                                        
                                                            <input type="checkbox" name="hambatanlain_7" id="hambatanlain-7" value="1" class="mr-1 ml-2">Hipotoni                
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>Kelainan tulang</td>
                                                        <td> :
                                                            <input type="checkbox" name="hambatanlain_8" id="hambatanlain-8" value="1" class="mr-1">Tidak                  
                                                            <input type="checkbox" name="hambatanlain_9" id="hambatanlain-9" value="1" class="mr-1 ml-2">Ada, Sebutkan  
                                                            <input type="text" name="hambatanlain_10" id="hambatanlain-10" class="custom-form clear-input d-inline-block col-lg-4">                
                                                        </td>
                                                    </tr> 
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row Psikososial, Ekonomi -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-psikososial-ekonomi"><i class="fas fa-expand mr-1"></i>Expand</button>PSIKOSOSIAL,
                                                EKONOMI</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-psikososial-ekonomi">
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td width="20%" class="bold">Status Psikologis</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="79%">
                                                    <input type="checkbox" name="sps_cemas" id="sps_cemas" value="1" class="mr-1">Cemas
                                                    <input type="checkbox" name="sps_takut" id="sps_takut" value="1" class="mr-1 ml-2">Takut
                                                    <input type="checkbox" name="sps_marah" id="sps_marah" value="1" class="mr-1 ml-2">Marah
                                                    <input type="checkbox" name="sps_sedih" id="sps_sedih" value="1" class="mr-1 ml-2">Sedih
                                                    <input type="checkbox" name="sps_bunuh_diri" id="sps_bunuh_diri" value="1" class="mr-1 ml-2">Kecendrungan Bunuh Diri
                                                    <input type="checkbox" name="sps_lain" id="sps_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                    <input type="text" name="sps_lain_input" id="sps_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Status Mental</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="checkbox" name="smen_sadar" id="smen_sadar" value="1" class="mr-1">Sadar dan Orientasi Baik
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold"></td>
                                                <td class="bold"></td>
                                                <td>
                                                    <input type="checkbox" name="smen_ada_masalah" id="smen_ada_masalah" value="1" class="mr-1">Ada Masalah Perilaku, Sebutkan
                                                    <input type="text" name="smen_ada_masalah_input" id="smen_ada_masalah_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold"></td>
                                                <td class="bold"></td>
                                                <td>
                                                    <input type="checkbox" name="smen_perilaku_kekerasan" id="smen_perilaku_kekerasan" value="1" class="mr-1">Perilaku
                                                    Kekerasan yang dialami pasien sebelumnya
                                                </td>
                                            </tr>

                                     
                                            <tr>
                                                <td width="20%" class="bold">Status Ekonomi dan Sosial</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Pekerjaan</td>
                                                <td wdith="1%">:</td>
                                                <td width="79%">
                                                    <input type="checkbox" name="pekerjaaanes_1" id="pekerjaaanes-1" value="1" class="mr-1">Wiraswasta       
                                                    <input type="checkbox" name="pekerjaaanes_2" id="pekerjaaanes-2" value="1" class="mr-1 ml-2">Pegawai swasta       
                                                    <input type="checkbox" name="pekerjaaanes_3" id="pekerjaaanes-3" value="1" class="mr-1 ml-2">PNS            
                                                    <input type="checkbox" name="pekerjaaanes_4" id="pekerjaaanes-4" value="1" class="mr-1 ml-2">Pensiunan         
                                                    <input type="checkbox" name="pekerjaaanes_5" id="pekerjaaanes-5" value="1" class="mr-1">Tidak bekerja           
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Cara pembayaran</td>
                                                <td wdith="1%">:</td>
                                                <td width="79%">
                                                    <input type="checkbox" name="carapembayaran_1" id="carapembayaran-1" value="1" class="mr-1">Biaya Sendiri        
                                                    <input type="checkbox" name="carapembayaran_2" id="carapembayaran-2" value="1" class="mr-1 ml-2">BPJS           
                                                    <input type="checkbox" name="carapembayaran_3" id="carapembayaran-3" value="1" class="mr-1 ml-2">Asuransi            
                                                    <input type="text" name="carapembayaran_4" id="carapembayaran-4" class="custom-form clear-input d-inline-block col-lg-4">
                                                    <input type="checkbox" name="carapembayaran_5" id="carapembayaran-5" value="1" class="mr-1 ml-2">lain-lain
                                                    <input type="text" name="carapembayaran_6" id="carapembayaran-6" class="custom-form clear-input d-inline-block col-lg-4">
                                                </td>
                                            </tr>

                                            
                                            <!-- <tr>
                                                <td><span class="ml-4">Pekerjaan</span></td>
                                                <td>:</td>
                                                <td><input type="text" name="pekerjaan" id="pekerjaan_pasien" class="custom-form clear-input col-lg-3" placeholder="Masukkan pekerjaan" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><span class="ml-4">Cara Bayar</span></td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" name="cara_bayar" id="cara_bayar_pasien" class="custom-form clear-input col-lg-3" placeholder="Masukkan cara bayar" readonly>
                                                </td>
                                            </tr> -->



                                            <tr>
                                                <td width="20%" class="bold">Status Perkembangan Interpersonal</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">1. Pengasuh</td>
                                                <td wdith="1%">:</td>
                                                <td width="79%">
                                                    <input type="checkbox" name="pengasuh_1" id="pengasuh-1" value="1" class="mr-1">Ayah
                                                    <input type="checkbox" name="pengasuh_2" id="pengasuh-2" value="1" class="mr-1 ml-2">Ibu
                                                    <input type="checkbox" name="pengasuh_3" id="pengasuh-3" value="1" class="mr-1 ml-2">Nenek            
                                                    <input type="checkbox" name="pengasuh_4" id="pengasuh-4" value="1" class="mr-1 ml-2">Orang lain, sebutkan
                                                    <input type="text" name="pengasuh_5" id="pengasuh-5" class="custom-form clear-input d-inline-block col-lg-4">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%">2.	Dukungan Keluarga Lain    </td>
                                                <td wdith="1%">:</td>
                                                <td width="79%">
                                                    <input type="checkbox" name="dukungan_1" id="dukungan-1" value="1" class="mr-1">Ya
                                                    <input type="checkbox" name="dukungan_2" id="dukungan-2" value="1" class="mr-1 ml-2">Tidak
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Penilaian Resiko Jatuh -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-resiko-jatuh"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN RESIKO
                                                JATUH</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-penilaian-resiko-jatuh">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3" class="bold center">Penilaian Resiko Jatuh Anak
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="table table-bordered table-sm table-striped" style="margin-top:-15px">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%" class="bold center">Parameter</th>
                                                            <th width="60%" class="bold center">Kriteria</th>
                                                            <th width="10%" class="bold center">Skor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="4">Umur</td>
                                                            <td><input type="radio" name="prja_umur" id="prja_umur_1" value="4" class="mr-1 calcscoreprja calcscoreprja_0">Dibawah 3
                                                                Tahun</td>
                                                            <td class="center">4</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_umur" id="prja_umur_2" value="3" class="mr-1 calcscoreprja calcscoreprja_1">3 -
                                                                7
                                                                Tahun</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_umur" id="prja_umur_3" value="2" class="mr-1 calcscoreprja calcscoreprja_2">7 -
                                                                13
                                                                Tahun</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_umur" id="prja_umur_4" value="1" class="mr-1 calcscoreprja calcscoreprja_3">>
                                                                13
                                                                Tahun</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Kelamin</td>
                                                            <td><input type="radio" name="prja_kelamin" id="prja_kelamin_1" value="2" class="mr-1 calcscoreprja calcscoreprja_4">Laki -
                                                                Laki</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_kelamin" id="prja_kelamin_2" value="1" class="mr-1 calcscoreprja calcscoreprja_5">Perempuan
                                                            </td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">Diagnosis</td>
                                                            <td><input type="radio" name="prja_diagnosis" id="prja_diagnosis_1" value="4" class="mr-1 calcscoreprja calcscoreprja_6">Kelainan
                                                                Neurologi</td>
                                                            <td class="center">4</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_diagnosis" id="prja_diagnosis_2" value="3" class="mr-1 calcscoreprja calcscoreprja_7">Respiratori,
                                                                Dehidrasi, Anemia, Anoreksia, Syncope</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_diagnosis" id="prja_diagnosis_3" value="2" class="mr-1 calcscoreprja calcscoreprja_8">Perilaku
                                                            </td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_diagnosis" id="prja_diagnosis_4" value="1" class="mr-1 calcscoreprja calcscoreprja_9">Lain -
                                                                lain</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">Gangguan Kognitif</td>
                                                            <td><input type="radio" name="prja_gangguan_kognitif" id="prja_gangguan_kognitif_1" value="3" class="mr-1 calcscoreprja calcscoreprja_10">Keterbatasan
                                                                Daya Pikir</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_gangguan_kognitif" id="prja_gangguan_kognitif_2" value="2" class="mr-1 calcscoreprja calcscoreprja_11">Pelupa,
                                                                berkurangnya orientasi sekitar</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_gangguan_kognitif" id="prja_gangguan_kognitif_3" value="1" class="mr-1 calcscoreprja calcscoreprja_12">Dapat
                                                                menggunakan daya pikir tanpa hambatan</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">Faktor Lingkungan</td>
                                                            <td><input type="radio" name="prja_faktor_lingkungan" id="prja_faktor_lingkungan_1" value="4" class="mr-1 calcscoreprja calcscoreprja_13">Riwayat
                                                                Jatuh atau Bayi/Balita yang Ditempatkan Ditempat tidur
                                                            </td>
                                                            <td class="center">4</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_faktor_lingkungan" id="prja_faktor_lingkungan_2" value="3" class="mr-1 calcscoreprja calcscoreprja_14">Pasien
                                                                Menggunakan Alat Bantu atau Bayi/Balita dalam Ayunan
                                                            </td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_faktor_lingkungan" id="prja_faktor_lingkungan_3" value="2" class="mr-1 calcscoreprja calcscoreprja_15">Pasien
                                                                di Tempat Tidur Standar</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_faktor_lingkungan" id="prja_faktor_lingkungan_4" value="1" class="mr-1 calcscoreprja calcscoreprja_16">Area
                                                                Pasien Rawat Jalan</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">Respon Terhadap Pembedahan, Sedasi dan
                                                                Anastesi</td>
                                                            <td><input type="radio" name="prja_pembedahan" id="prja_pembedahan_1" value="3" class="mr-1 calcscoreprja calcscoreprja_17">Dalam 24
                                                                Jam</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_pembedahan" id="prja_pembedahan_2" value="2" class="mr-1 calcscoreprja calcscoreprja_18">Dalam 48
                                                                Jam</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_pembedahan" id="prja_pembedahan_3" value="1" class="mr-1 calcscoreprja calcscoreprja_19">Lebih
                                                                dari 48 Jam / Tidak Ada Respon</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">Penggunaan Obat - obatan</td>
                                                            <td><input type="radio" name="prja_obat" id="prja_obat_1" value="3" class="mr-1 calcscoreprja calcscoreprja_20">Penggunaan
                                                                Bersamaan Sedative Barbiturate, Anti Depresan, Diuretic,
                                                                Narkotik</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_obat" id="prja_obat_2" value="2" class="mr-1 calcscoreprja calcscoreprja_21">Salah Satu Dari Obat Diatas</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_obat" id="prja_obat_3" value="1" class="mr-1 calcscoreprja calcscoreprja_22">Obat -
                                                                obatan lainnya / Tanpa Obat</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">Jumlah Skor</td>
                                                            <td class="center"><input type="number" name="prja_jumlah_skor" id="prja_jumlah_skor" class="custom-form center" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Resiko Rendah : 7 - 11 | Resiko Tinggi : ≥ 12</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3" class="bold center">Penilaian Resiko Jatuh
                                                            Dewasa</td>
                                                    </tr>
                                                </table>
                                                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                    <thead>
                                                        <tr>
                                                            <th width="60%" class="center"><b>Parameter</b></th>
                                                            <th width="20%" class="center"><b>Nilai</b></th>
                                                            <th width="20%" class="center"><b>Skor</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="2">Riwayat jatuh dalam waktu 3 bulan sebab
                                                                apapun</td>
                                                            <td><input type="radio" name="prjd_riwayat_jatuh" id="prjd_riwayat_jatuh_ya" value="25" class="mr-1" onchange="calcscorepjd()">Ya</td>
                                                            <td class="center">25</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prjd_riwayat_jatuh" id="prjd_riwayat_jatuh_tidak" value="0" class="mr-1" onchange="calcscorepjd()" checked>Tidak</td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Diagnosis Sekunder (≥2 Diagnosis Medis)</td>
                                                            <td><input type="radio" name="prjd_diagnosis_sekunder" id="prjd_diagnosis_sekunder_ya" value="15" class="mr-1" onchange="calcscorepjd()">Ya</td>
                                                            <td class="center">15</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prjd_diagnosis_sekunder" id="prjd_diagnosis_sekunder_tidak" value="0" class="mr-1" onchange="calcscorepjd()" checked>Tidak
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Alat Bantu Jalan</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="alat_bantu_jalan_1" id="alat_bantu_jalan_1" value="1" class="mr-1">Tidak
                                                                Ada / Kursi Roda</td>
                                                            <td><input type="radio" name="alat_bantu_jalan_1_ya" id="alat_bantu_jalan_1_ya" value="0" class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="alat_bantu_jalan_2" id="alat_bantu_jalan_2" value="1" class="mr-1">Kruk
                                                                / Tongkat / Walker</td>
                                                            <td><input type="radio" name="alat_bantu_jalan_2_ya" id="alat_bantu_jalan_2_ya" value="15" class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">15</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="alat_bantu_jalan_3" id="alat_bantu_jalan_3" value="1" class="mr-1">Berpegangan pada benda-benda disekitar
                                                                / Furniture</td>
                                                            <td><input type="radio" name="alat_bantu_jalan_3_ya" id="alat_bantu_jalan_3_ya" value="30" class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">30</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Terpasang Infus / Heparin Lock</td>
                                                            <td><input type="radio" name="prjd_terpasang_infus" id="prjd_terpasang_infus_ya" value="20" class="mr-1" onchange="calcscorepjd()">Ya</td>
                                                            <td class="center">20</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prjd_terpasang_infus" id="prjd_terpasang_infus_tidak" value="0" class="mr-1" onchange="calcscorepjd()" checked>Tidak
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Cara Berjalan atau Berpindah</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="cara_berjalan_1" id="cara_berjalan_1" value="1" class="mr-1">Normal /
                                                                Bedrest / Imobilisasi</td>
                                                            <td><input type="radio" name="cara_berjalan_1_ya" id="cara_berjalan_1_ya" value="0" class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="cara_berjalan_2" id="cara_berjalan_2" value="1" class="mr-1">Lemah
                                                            </td>
                                                            <td><input type="radio" name="cara_berjalan_2_ya" id="cara_berjalan_2_ya" value="10" class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">10</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="cara_berjalan_3" id="cara_berjalan_3" value="1" class="mr-1">Terganggu
                                                            </td>
                                                            <td><input type="radio" name="cara_berjalan_3_ya" id="cara_berjalan_3_ya" value="20" class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">20</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Status Mental</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="status_mental_1" id="status_mental_1" value="1" class="mr-1">Sadar
                                                                Akan Kemampuan Diri Sendiri</td>
                                                            <td><input type="radio" name="status_mental_1_ya" id="status_mental_1_ya" value="0" class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="status_mental_2" id="status_mental_2" value="1" class="mr-1">Sering
                                                                Lupa akan Keterbatasan Yang dimiliki</td>
                                                            <td><input type="radio" name="status_mental_2_ya" id="status_mental_2_ya" value="15" class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">15</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="bold">JUMLAH SKOR</td>
                                                            <td class="center"><input type="number" min="0" name="prjd_jumlah_skor" id="prjd_jumlah_skor" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                                    <tr>
                                                        <td>
                                                            <span class="bold">Keterangan</span><br>
                                                            <span class="ml-3">Resiko Rendah : 0 - 24</span><br>
                                                            <span class="ml-3">Resiko Sedang : 25 - 50</span><br>
                                                            <span class="ml-3">Resiko Tinggi : ≥ 51</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>














                                    <!-- Row Data Penilaian Resiko Jatuh Lansia (Usia > 60 th) -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-resiko-jatuh-lansia"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN RESIKO
                                                JATUH LANSIA <i>(Usia > 60 th)</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-penilaian-resiko-jatuh-lansia">
                                        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <th class="center" width="5%"><b>No.</b></th>
                                                    <th class="center" width="20%"><b>Parameter</b></th>
                                                    <th class="center" width="45%"><b>Skrining</b></th>
                                                    <th class="center" width="15"><b>Jawaban (Pilih)</b></th>
                                                    <th class="center" width="15%"><b>Keterangan Nilai</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th rowspan="2" class="center v-center">1.</th>
                                                    <td rowspan="2" style="text-align: left; vertical-align: middle;">Riwayat Jatuh</td>
                                                    <td>Apakah pasien datang ke RS karena jatuh ?</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_riwayat_jatuh" id="prjl_riwayat_jatuh_ya" value="6" class="mr-1" onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_riwayat_jatuh" id="prjl_riwayat_jatuh_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                    <td rowspan="2">Salah satu jawabannya = 6</td>
                                                </tr>
                                                <tr>
                                                    <td>Jika Tidak, Apakah pasien mengalami jatuh dalam 2 bulan terakhir ini ?</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_riwayat_jatuh_opt" id="prjl_riwayat_jatuh_opt_ya" value="6" class="mr-1" disabled onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_riwayat_jatuh_opt" id="prjl_riwayat_jatuh_opt_tidak" value="0" class="mr-1 ml-3" disabled checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th rowspan="3" class="center v-center">2.</th>
                                                    <td rowspan="3" style="text-align: left; vertical-align: middle;">Status Mental</td>
                                                    <td>Apakah pasien delirium ? (Tidak dapat membuat keputusan, pola pikir tidak terorganisir, gangguan daya ingat)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_status_mental" id="prjl_status_mental_ya" value="14" class="mr-1" onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_status_mental" id="prjl_status_mental_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                    <td rowspan="3">Salah satu jawabannya = 14</td>
                                                </tr>
                                                <tr>
                                                    <td>Apakah pasien disorientasi ? (Salah menyebutkan waktu, tempat atau orang)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_status_mental_opt_1" id="prjl_status_mental_opt_1_ya" value="14" class="mr-1" onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_status_mental_opt_1" id="prjl_status_mental_opt_1_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Apakah pasien mengalami agitasi ? (Ketakutan, gelisah dan cemas)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_status_mental_opt_2" id="prjl_status_mental_opt_2_ya" value="14" class="mr-1" onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_status_mental_opt_2" id="prjl_status_mental_opt_2_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="3" class="center v-center">3.</th>
                                                    <td rowspan="3" style="text-align: left; vertical-align: middle;">Penglihatan</td>
                                                    <td>Apakah pasien memakai kacamata ?</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_penglihatan" id="prjl_penglihatan_ya" value="1" class="mr-1" onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_penglihatan" id="prjl_penglihatan_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                    <td rowspan="3">Salah satu jawabannya = 1</td>
                                                </tr>
                                                <tr>
                                                    <td>Apakah pasien mengeluh adanya penglihatan buram ?</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_penglihatan_opt_1" id="prjl_penglihatan_opt_1_ya" value="1" class="mr-1" onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_penglihatan_opt_1" id="prjl_penglihatan_opt_1_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Apakah pasien mempunyai galukoma ? Katarak / degenerasi makula ?
                                                    </td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_penglihatan_opt_2" id="prjl_penglihatan_opt_2_ya" value="1" class="mr-1" onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_penglihatan_opt_2" id="prjl_penglihatan_opt_2_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="center v-center">4.</th>
                                                    <td>Kebiasaan Berkemih</td>
                                                    <td>Apakah terdapat perubahan perilaku berkemih ? (Frekuensi,
                                                        urgensi, inkontinensia, nokturia)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_berkemih" id="prjl_berkemih_ya" value="2" class="mr-1" onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_berkemih" id="prjl_berkemih_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                    <td>Salah satu jawabannya = 2</td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="4" style="text-align: center; vertical-align: middle;">5.</th>
                                                    <td rowspan="4" style="text-align: left; vertical-align: middle;">Transfer dari tempat tidur ke kursi dan kembali lagi ke tempat tidur</td>
                                                    <td>Mandiri (Boleh memakai alat bantu jalan)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_transfer" id="prjl_transfer_1" value="0" class="mr-1" checked onchange="calcscoreprjl()">0
                                                    </td>
                                                    <td rowspan="8">Jumlah nilai transfer dan mobilitas jika nilai total 0 - 3 = 0, nilai total 4 - 6 = 7</td>
                                                </tr>
                                                <tr>
                                                    <td>Memerlukan sedikit bantuan (1 orang) / dalam pengawasan</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_transfer" id="prjl_transfer_2" value="1" class="mr-1" onchange="calcscoreprjl()">1
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Memerlukan bantuan yang nyata (2 orang)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_transfer" id="prjl_transfer_3" value="2" class="mr-1" onchange="calcscoreprjl()">2
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tidak dapat duduk dengan seimbang, perlu bantuan total</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_transfer" id="prjl_transfer_4" value="3" class="mr-1" onchange="calcscoreprjl()">3
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="4" class="center v-center">6.</th>
                                                    <td rowspan="4" style="text-align: left; vertical-align: middle;">Mobilitas</td>
                                                    <td>Mandiri (Boleh memakai alat bantu jalan)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_1" value="0" class="mr-1" checked onchange="calcscoreprjl()">0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Berjalan dengan bantuan 1 orang (verbal / fisik)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_2" value="1" class="mr-1" onchange="calcscoreprjl()">1
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Menggunakan kursi roda</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_3" value="2" class="mr-1" onchange="calcscoreprjl()">2
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Imobilisasi</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_4" value="3" class="mr-1" onchange="calcscoreprjl()">3
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="bold center">TOTAL</td>
                                                    <td><input type="number" name="prjl_jumlah" id="prjl_jumlah" class="custom-form clear-input center" placeholder="Jumlah" readonly></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <span class="bold">Keterangan : </span><br>
                                                        <span class="ml-3">0 - 5 = Resiko Rendah</span><br>
                                                        <span class="ml-3">6 - 16 = Resiko Sedang</span><br>
                                                        <span class="ml-3">17 - 30 = Resiko Tinggi</span><br>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Row Data Penilaian Tingkat Nyeri -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-tingkat-nyeri"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN TINGKAT
                                                NYERI
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-penilaian-tingkat-nyeri">
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td width="10%" class="bold">Skala Nyeri</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="34%"><input type="text" name="skala_nyeri_keperawatan" id="skala_nyeri_keperawatan" class="custom-form clear-input" placeholder="Masukkan skala nyeri"></td>
                                                <td></td>
                                                <td width="25%" class="bold">Kualitas Nyeri</td>
                                                <td width="1%" class="bold">:</td>
                                                <td width="39%"><input type="text" name="kualitas_nyeri_keperawatan" id="kualitas_nyeri_keperawatan" class="custom-form clear-input" placeholder="Masukkan kualitas nyeri"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Frekuensi Nyeri</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="frekuensi_nyeri_keperawatan" id="frekuensi_nyeri_keperawatan" class="custom-form clear-input" placeholder="Masukkan frekuensi nyeri"></td>
                                                <td></td>
                                                <td class="bold">Faktor - Faktor yang Memperberat Nyeri</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="pemberat_nyeri_keperawatan" id="pemberat_nyeri_keperawatan" class="custom-form clear-input" placeholder="Masukkan Faktor Memperberat nyeri"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Lama Nyeri</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="lama_nyeri_keperawatan" id="lama_nyeri_keperawatan" class="custom-form clear-input" placeholder="Masukkan lama nyeri"></td>
                                                <td></td>
                                                <td class="bold">Faktor - Faktor yang Mengurangi Nyeri</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="pengurang_nyeri_keperawatan" id="pengurang_nyeri_keperawatan" class="custom-form clear-input" placeholder="Masukkan Faktor Mengurangi nyeri"></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Skala Early Warning System (News) -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skala-early-warning-system"><i class="fas fa-expand mr-1"></i>Expand</button>SKALA EARLY
                                                WARNING SYSTEM (EWS)
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-skala-early-warning-system">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-sm" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="75%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="10" style="background-color: #5F9EA0; color: white;"><b>NEWS (DEWASA)</b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="20%"><b>Parameter</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>0</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Respirasi</td>
                                                                        <td class="center"><input type="radio" name="respirasinews" id="skalanews_1_1" value="3_1" class="mr-1 skalanews news_respirasi_1_1">≤8</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"><input type="radio" name="respirasinews" id="skalanews_1_2" value="1_2" class="mr-1 skalanews news_respirasi_1_2">9-11</td>
                                                                        <td class="center"><input type="radio" name="respirasinews" id="skalanews_1_3" value="0_3" class="mr-1 skalanews news_respirasi_1_3">12-20</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"><input type="radio" name="respirasinews" id="skalanews_1_4" value="2_4" class="mr-1 skalanews news_respirasi_1_4">21-24</td>
                                                                        <td class="center"><input type="radio" name="respirasinews" id="skalanews_1_5" value="3_5" class="mr-1 skalanews news_respirasi_1_5">≥25</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>SpO2 Skala 1 (Non PPOK)</td>
                                                                        <td class="center"><input type="radio" name="spskala" id="skalanews_2_1" value="3_1" class="mr-1 skalanews news_ppok_2_1">≤91</td>
                                                                        <td class="center"><input type="radio" name="spskala" id="skalanews_2_2" value="2_2" class="mr-1 skalanews news_ppok_2_2">92-93</td>
                                                                        <td class="center"><input type="radio" name="spskala" id="skalanews_2_3" value="1_3" class="mr-1 skalanews news_ppok_2_3">94-95</td>
                                                                        <td class="center"><input type="radio" name="spskala" id="skalanews_2_4" value="0_4" class="mr-1 skalanews news_ppok_2_4">≥96</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>SpO2 Skala 2 (PPOK)</td>
                                                                        <td class="center"><input type="radio" name="spskalappok" id="skalanews_3_1" value="3_1" class="mr-1 skalanews news_skala_3_1">≤83</td>
                                                                        <td class="center"><input type="radio" name="spskalappok" id="skalanews_3_2" value="2_2" class="mr-1 skalanews news_skala_3_2">84-85</td>
                                                                        <td class="center"><input type="radio" name="spskalappok" id="skalanews_3_3" value="1_3" class="mr-1 skalanews news_skala_3_3">86-87</td>
                                                                        <td class="center"><input type="radio" name="spskalappok" id="skalanews_3_4" value="0_4" class="mr-1 skalanews news_skala_3_4">88-92 <br> ≥93 RA </td>
                                                                        <td class="center"><input type="radio" name="spskalappok" id="skalanews_3_5" value="1_5" class="mr-1 skalanews news_skala_3_5">93-94 <br> dgn O2 </td>
                                                                        <td class="center"><input type="radio" name="spskalappok" id="skalanews_3_6" value="2_6" class="mr-1 skalanews news_skala_3_6">95-96 <br> dgn O2 </td>
                                                                        <td class="center"><input type="radio" name="spskalappok" id="skalanews_3_7" value="3_7" class="mr-1 skalanews news_skala_3_7">≥97 <br> dgn O2 </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Suplemen O₂ </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"><input type="radio" name="suplement" id="skalanews_4_1" value="2_1" class="mr-1 skalanews news_skala_4_1">Ya</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"><input type="radio" name="suplement" id="skalanews_4_2" value="0_2" class="mr-1 skalanews news_skala_4_2">Tidak</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>TD Sistolik</td>
                                                                        <td class="center"><input type="radio" name="tdssistolik" id="skalanews_5_1" value="3_1" class="mr-1 skalanews news_tds_5_1">≤90</td>
                                                                        <td class="center"><input type="radio" name="tdssistolik" id="skalanews_5_2" value="2_2" class="mr-1 skalanews news_tds_5_2">91-100</td>
                                                                        <td class="center"><input type="radio" name="tdssistolik" id="skalanews_5_3" value="1_3" class="mr-1 skalanews news_tds_5_3">101-110</td>
                                                                        <td class="center"><input type="radio" name="tdssistolik" id="skalanews_5_4" value="0_4" class="mr-1 skalanews news_tds_5_4">111-219</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"><input type="radio" name="tdssistolik" id="skalanews_5_5" value="3_5" class="mr-1 skalanews news_tds_5_5">≥220</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nadi</td>
                                                                        <td class="center"><input type="radio" name="nadiws" id="skalanews_6_1" value="3_1" class="mr-1 skalanews news_nadih_6_1">≤40</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"><input type="radio" name="nadiws" id="skalanews_6_2" value="1_2" class="mr-1 skalanews news_nadih_6_2">41-50</td>
                                                                        <td class="center"><input type="radio" name="nadiws" id="skalanews_6_3" value="0_3" class="mr-1 skalanews news_nadih_6_3">51-90</td>
                                                                        <td class="center"><input type="radio" name="nadiws" id="skalanews_6_4" value="1_4" class="mr-1 skalanews news_nadih_6_4">91-110</td>
                                                                        <td class="center"><input type="radio" name="nadiws" id="skalanews_6_5" value="2_5" class="mr-1 skalanews news_nadih_6_5">111-130</td>
                                                                        <td class="center"><input type="radio" name="nadiws" id="skalanews_6_6" value="3_6" class="mr-1 skalanews news_nadih_6_6">≥131</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kesadaran</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"><input type="radio" name="kesadaranws" id="skalanews_7_1" value="0_1" class="mr-1 skalanews news_kesadarany_7_1">A</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"><input type="radio" name="kesadaranws" id="skalanews_7_2" value="3_2" class="mr-1 skalanews news_kesadarany_7_2">CVPU</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Suhu</td>
                                                                        <td class="center"><input type="radio" name="suhunews" id="skalanews_8_1" value="3_1" class="mr-1 skalanews news_sihu_8_1">≤35,0</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"><input type="radio" name="suhunews" id="skalanews_8_2" value="1_2" class="mr-1 skalanews news_sihu_8_2">35,1-36,0</td>
                                                                        <td class="center"><input type="radio" name="suhunews" id="skalanews_8_3" value="0_3" class="mr-1 skalanews news_sihu_8_3">36,1-38,0</td>
                                                                        <td class="center"><input type="radio" name="suhunews" id="skalanews_8_4" value="1_4" class="mr-1 skalanews news_sihu_8_4">38,1-39,0</td>
                                                                        <td class="center"><input type="radio" name="suhunews" id="skalanews_8_5" value="2_5" class="mr-1 skalanews news_sihu_8_5">≥39,1</td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td colspan="7">
                                                                            <input type="radio" name="total_skalanews" id="total_skalanews_1" class="mr-1 ml-3" value="Putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih(0)</b>
                                                                            <input type="radio" name="total_skalanews" id="total_skalanews_2" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>
                                                                            <input type="radio" name="total_skalanews" id="total_skalanews_3" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning(5-6)</b>
                                                                            <input type="radio" name="total_skalanews" id="total_skalanews_4" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b> Merah (≥7) </b>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="center" colspan="10" style="background-color: #5F9EA0; color: white;"><b>NEWS (Neonatal Early Warning Score)</b></th>
                                                        </tr>
                                                        <tr>
                                                            <th width="1%"><b>No</b></th>
                                                            <th width="10%"><b>Parameter</b></th>
                                                            <th width="10%" class="center"><b>2</b></th>
                                                            <th width="10%" class="center"><b>1</b></th>
                                                            <th width="10%" class="center"><b>0</b></th>
                                                            <th width="10%" class="center"><b>1</b></th>
                                                            <th width="10%" class="center"><b>2</b></th>                                                          
                                                            <!-- <th width="5%" class="center"><b>Score</b></th>                                                           -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="3" style="text-align: center; vertical-align: middle;">1</td>
                                                            <td rowspan="3" class="center" style="text-align: center; vertical-align: middle;">Neurobehavirol</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="neuro" id="calsneuk_1_1" value="0_3" class="mr-1 calsneuk pramet_neuro_1_1">Aktif/sadar saat diberi susu</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="neuro" id="calsneuk_1_2" value="1_4" class="mr-1 calsneuk pramet_neuro_1_2">Jittery /rewel terus menerus</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="neuro" id="calsneuk_1_3" value="2_5" class="mr-1 calsneuk pramet_neuro_1_3">kejang /terkulai lemas /susah dibangunkan</td>
                                                            <!-- <td class="center v-center"><input type="number" name="nilai_neuro" id="nilai-neuro" class="custom-form center clear-input sub_total_nilai_neuro" min="0" placeholder="" readonly></td> -->
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td class="center">Nadi</td>
                                                            <td class="center"><input type="radio" name="nadiq" id="calsneuk_2_1" value="2_1" class="mr-1 calsneuk pramet_nadiq_2_1">>190</td>
                                                            <td class="center"><input type="radio" name="nadiq" id="calsneuk_2_2" value="1_2" class="mr-1 calsneuk pramet_nadiq_2_2">>151-190</td>
                                                            <td class="center"><input type="radio" name="nadiq" id="calsneuk_2_3" value="0_3" class="mr-1 calsneuk pramet_nadiq_2_3">90-150</td>
                                                            <td class="center"><input type="radio" name="nadiq" id="calsneuk_2_4" value="1_4" class="mr-1 calsneuk pramet_nadiq_2_4">70-89</td>
                                                            <td class="center"><input type="radio" name="nadiq" id="calsneuk_2_5" value="2_5" class="mr-1 calsneuk pramet_nadiq_2_5">< 70</td>  
                                                            <!-- <td class="center v-center"><input type="number" name="nilai_nadiq" id="nilai-nadiq" class="custom-form center clear-input sub_total_nilai_nadiq" min="0" placeholder="" readonly></td> -->
                                                        </tr>
                                                        <tr>
                                                            <td class="center">3</td>
                                                            <td class="center">Respirasi Rate</td>
                                                            <td class="center"><input type="radio" name="respirasq" id="calsneuk_3_1" value="2_1" class="mr-1 calsneuk pramet_respirasq_3_1">>80</td>
                                                            <td class="center"><input type="radio" name="respirasq" id="calsneuk_3_2" value="1_2" class="mr-1 calsneuk pramet_respirasq_3_2">>61-80</td>
                                                            <td class="center"><input type="radio" name="respirasq" id="calsneuk_3_3" value="0_3" class="mr-1 calsneuk pramet_respirasq_3_3">30-60</td>
                                                            <td class="center"><input type="radio" name="respirasq" id="calsneuk_3_4" value="1_4" class="mr-1 calsneuk pramet_respirasq_3_4">20-29</td>
                                                            <td class="center"><input type="radio" name="respirasq" id="calsneuk_3_5" value="2_5" class="mr-1 calsneuk pramet_respirasq_3_5">< 20</td>  
                                                            <!-- <td class="center v-center"><input type="number" name="nilai_respirasq" id="nilai-respirasq" class="custom-form center clear-input sub_total_nilai_respirasq" min="0" placeholder="" readonly></td> -->
                                                        </tr>
                                                        <tr>
                                                            <td class="center">4</td>
                                                            <td class="center">Warna Kulit (Spo2)</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="warnaulit" id="calsneuk_4_1" value="0_1" class="mr-1 calsneuk pramet_warnaulit_4_1">Pink > 94%</td>
                                                            <td class="center"><input type="radio" name="warnaulit" id="calsneuk_4_2" value="1_2" class="mr-1 calsneuk pramet_warnaulit_4_2">90-94%</td>
                                                            <td class="center"><input type="radio" name="warnaulit" id="calsneuk_4_3" value="2_3" class="mr-1 calsneuk pramet_warnaulit_4_3">Pucat / Kebiruan < 90 %</td>  
                                                            <!-- <td class="center v-center"><input type="number" name="nilai_warnaulit" id="nilai-warnaulit" class="custom-form center clear-input sub_total_nilai_warnaulit" min="0" placeholder="" readonly></td> -->
                                                        </tr>
                                                        <tr>
                                                            <td class="center">5</td>
                                                            <td class="center">Suhu</td>
                                                            <td class="center"><input type="radio" name="suhuq" id="calsneuk_5_1" value="2_1" class="mr-1 calsneuk pramet_suhuq_5_1">>38,1 ⁰C</td>
                                                            <td class="center"><input type="radio" name="suhuq" id="calsneuk_5_2" value="1_2" class="mr-1 calsneuk pramet_suhuq_5_2">37,6-38⁰C</td>
                                                            <td class="center"><input type="radio" name="suhuq" id="calsneuk_5_3" value="0_3" class="mr-1 calsneuk pramet_suhuq_5_3">36,5-37,5⁰C</td>
                                                            <td class="center"><input type="radio" name="suhuq" id="calsneuk_5_4" value="1_4" class="mr-1 calsneuk pramet_suhuq_5_4">35,5-37,5 ⁰C</td>
                                                            <td class="center"><input type="radio" name="suhuq" id="calsneuk_5_5" value="2_5" class="mr-1 calsneuk pramet_suhuq_5_5">< 35,4 ⁰C</td>  
                                                            <!-- <td class="center v-center"><input type="number" name="nilai_suhuq" id="nilai-suhuq" class="custom-form center clear-input sub_total_nilai_suhuq" min="0" placeholder="" readonly></td> -->
                                                        </tr>
                                                        <tr>
                                                            <td class="center">6</td>
                                                            <td class="center">Merintih</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="merintihq" id="calsneuk_6_1" value="0_1" class="mr-1 calsneuk pramet_merintihq_6_1">Tidak</td>
                                                            <td class="center"><input type="radio" name="merintihq" id="calsneuk_6_2" value="1_2" class="mr-1 calsneuk pramet_merintihq_6_2">Ya</td>
                                                            <td></td>
                                                            <!-- <td class="center v-center"><input type="number" name="nilai_merintihq" id="nilai-merintihq" class="custom-form center clear-input sub_total_nilai_merintihq" min="0" placeholder="" readonly></td> -->
                                                        </tr>
                                                        <tr>
                                                            <td></td>                                                  
                                                            <td colspan="6">
                                                                <input type="radio" name="total_calsneuk" id="total_calsneuk_1" class="mr-1 ml-3" value="putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih : 0 </b>
                                                                <input type="radio" name="total_calsneuk" id="total_calsneuk_2" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning : 1 </b>
                                                                <input type="radio" name="total_calsneuk" id="total_calsneuk_3" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah : ≥ 2 atau skor  pada 1 parameter</b>
                                                            </td>
                                                        </tr>
                                                        <!-- <tr>
                                                            <td colspan="6">
                                                                <input type="checkbox" name="hijau" id="hijau" class="mr-1 ml-3" value="white"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih : 0 </b>
                                                                <input type="checkbox" name="kuning" id="kuning" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning : 1 </b>
                                                                <input type="checkbox" name="merah" id="merah" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah : ≥ 2 atau skor  pada 1 parameter</b>
                                                            </td>
                                                            <td class="center">Total =</td>                                                  
                                                            <td class="center"><input type="number" name="total_nilait" id="total-nilait" class="custom-form clear-input center" min="0" value="0" placeholder="score" readonly></td>
                                                        </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="center" colspan="8" style="background-color: #5F9EA0; color: white;"><b>PEWS (ANAK)</b></th>
                                                        </tr>
                                                        <tr>
                                                            <th width="15%"><b>Parameter</b></th>
                                                            <th width="10%" class="center"><b>3</b></th>
                                                            <th width="10%" class="center"><b>2</b></th>
                                                            <th width="10%" class="center"><b>1</b></th>
                                                            <th width="10%" class="center"><b>0</b></th>
                                                            <th width="10%" class="center"><b>1</b></th>
                                                            <th width="10%" class="center"><b>2</b></th>
                                                            <th width="10%" class="center"><b>3</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Suhu</td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="suhupews" id="skalapews_1_1" value="2_1" class="mr-1 skalapews pews_suhu_1_1">< 35</td>
                                                            <td class="center"><input type="radio" name="suhupews" id="skalapews_1_2" value="1_2" class="mr-1 skalapews pews_suhu_1_2">35.1-36</td>
                                                            <td class="center"><input type="radio" name="suhupews" id="skalapews_1_3" value="0_3" class="mr-1 skalapews pews_suhu_1_3">36.1-38</td>
                                                            <td class="center"><input type="radio" name="suhupews" id="skalapews_1_4" value="1_4" class="mr-1 skalapews pews_suhu_1_4">38.1-38.5</td>
                                                            <td class="center"><input type="radio" name="suhupews" id="skalapews_1_5" value="2_5" class="mr-1 skalapews pews_suhu_1_5">> 38.5</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8">Pernafasan</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">1-12 Bulan</span></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_2_1" value="3_1" class="mr-1 skalapews pews_pernafasan_2_1"> ≤20</td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_2_2" value="1_2" class="mr-1 skalapews pews_pernafasan_2_2">20-29</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_2_3" value="0_3" class="mr-1 skalapews pews_pernafasan_2_3">30-40</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_2_4" value="1_4" class="mr-1 skalapews pews_pernafasan_2_4">41-50</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_2_5" value="2_5" class="mr-1 skalapews pews_pernafasan_2_5">51-60</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_2_6" value="3_6" class="mr-1 skalapews pews_pernafasan_2_6"> ≥60</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">13-36 Bulan</span></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_3_1" value="3_7" class="mr-1 skalapews pews_pernafasan_3_1">≤20</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_3_2" value="0_8" class="mr-1 skalapews pews_pernafasan_3_2">20-30</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_3_3" value="1_9" class="mr-1 skalapews pews_pernafasan_3_3">31-50</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_3_4" value="2_10" class="mr-1 skalapews pews_pernafasan_3_4">51-60</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_3_5" value="3_11" class="mr-1 skalapews pews_pernafasan_3_5"> ≥60</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">4-6 Tahun</span></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_4_1" value="3_12" class="mr-1 skalapews pews_pernafasan_4_1"> ≤20</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_4_2" value="0_13" class="mr-1 skalapews pews_pernafasan_4_2">20-30</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_4_3" value="1_14" class="mr-1 skalapews pews_pernafasan_4_3">31-50</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_4_4" value="2_15" class="mr-1 skalapews pews_pernafasan_4_4">51-60</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_4_5" value="3_16" class="mr-1 skalapews pews_pernafasan_4_5"> ≥60</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">7-12 Tahun</span></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_5_1" value="3_17" class="mr-1 skalapews pews_pernafasan_5_1">≤10</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_5_2" value="0_18" class="mr-1 skalapews pews_pernafasan_5_2">10-20</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_5_3" value="1_19" class="mr-1 skalapews pews_pernafasan_5_3">21-30</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_5_4" value="2_20" class="mr-1 skalapews pews_pernafasan_5_4">31-40</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_5_5" value="3_21" class="mr-1 skalapews pews_pernafasan_5_5"> ≥40</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">13-18 Tahun</span></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_6_1" value="3_22" class="mr-1 skalapews pews_pernafasan_6_1"> ≤10</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_6_2" value="0_23" class="mr-1 skalapews pews_pernafasan_6_2">10-20</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_6_3" value="1_24" class="mr-1 skalapews pews_pernafasan_6_3">21-30</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_6_4" value="2_25" class="mr-1 skalapews pews_pernafasan_6_4">31-40</td>
                                                            <td class="center"><input type="radio" name="pernafasanpews" id="skalapews_6_5" value="3_26" class="mr-1 skalapews pews_pernafasan_6_5"> ≥40</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="tidakretraksipews" id="skalapews_7_1" value="0_1" class="mr-1 skalapews pews_subpernafasan_7_1">Tidak Retraksi</td>
                                                            <td class="center"><input type="radio" name="tidakretraksipews" id="skalapews_7_2" value="1_2" class="mr-1 skalapews pews_subpernafasan_7_2">Otot Bantu Nafas</td>
                                                            <td class="center"><input type="radio" name="tidakretraksipews" id="skalapews_7_3" value="2_3" class="mr-1 skalapews pews_subpernafasan_7_3">Retraksi</td>
                                                            <td class="center"><input type="radio" name="tidakretraksipews" id="skalapews_7_4" value="3_4" class="mr-1 skalapews pews_subpernafasan_7_4">Merintih</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alat Bantu O₂</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="alatbantupews" id="skalapews_8_1" value="0_1" class="mr-1 skalapews pews_alat_bantu_8_1">Tidak</td>
                                                            <td class="center"><input type="radio" name="alatbantupews" id="skalapews_8_2" value="1_2" class="mr-1 skalapews pews_alat_bantu_8_2"> > 3L/Menit</td>
                                                            <td class="center"><input type="radio" name="alatbantupews" id="skalapews_8_3" value="2_3" class="mr-1 skalapews pews_alat_bantu_8_3"> > 6L/Menit</td>
                                                            <td class="center"><input type="radio" name="alatbantupews" id="skalapews_8_4" value="3_4" class="mr-1 skalapews pews_alat_bantu_8_4"> > 8L/Menit</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Saturasi O₂</td>
                                                            <td class="center"><input type="radio" name="saturasipewas" id="skalapews_9_1" value="3_1" class="mr-1 skalapews pews_saturasi_9_1">≤85</td>
                                                            <td class="center"><input type="radio" name="saturasipewas" id="skalapews_9_2" value="2_2" class="mr-1 skalapews pews_saturasi_9_2">86-89</td>
                                                            <td class="center"><input type="radio" name="saturasipewas" id="skalapews_9_3" value="1_3" class="mr-1 skalapews pews_saturasi_9_3">90-93</td>
                                                            <td class="center"><input type="radio" name="saturasipewas" id="skalapews_9_4" value="0_4" class="mr-1 skalapews pews_saturasi_9_4"> >94</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8">Nadi</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">1-12 Bulan</span></td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_10_1" value="3_1" class="mr-1 skalapews pews_nadi_10_1"> ≤90 </td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_10_2" value="2_2" class="mr-1 skalapews pews_nadi_10_2">90-99 </td> 
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_10_3" value="1_3" class="mr-1 skalapews pews_nadi_10_3">100-109</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_10_4" value="0_4" class="mr-1 skalapews pews_nadi_10_4">110-160</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_10_5" value="1_5" class="mr-1 skalapews pews_nadi_10_5">161-170</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_10_6" value="2_6" class="mr-1 skalapews pews_nadi_10_6">171-190</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_10_7" value="3_7" class="mr-1 skalapews pews_nadi_10_7">≥ 190</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">13-36 Bulan</span></td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_11_1" value="3_8" class="mr-1 skalapews pews_nadi_11_1">≤ 70</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_11_2" value="2_9" class="mr-1 skalapews pews_nadi_11_2">70-79</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_11_3" value="1_10" class="mr-1 skalapews pews_nadi_11_3">80-89</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_11_4" value="0_11" class="mr-1 skalapews pews_nadi_11_4">90-140</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_11_5" value="1_12" class="mr-1 skalapews pews_nadi_11_5">141-160</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_11_6" value="2_13" class="mr-1 skalapews pews_nadi_11_6">161-170</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_11_7" value="3_14" class="mr-1 skalapews pews_nadi_11_7">≥170</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">4-6 Tahun</span></td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_12_1" value="3_15" class="mr-1 skalapews pews_nadi_12_1">≤60</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_12_2" value="2_16" class="mr-1 skalapews pews_nadi_12_2">60-79</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_12_3" value="1_17" class="mr-1 skalapews pews_nadi_12_3">80-89</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_12_4" value="0_18" class="mr-1 skalapews pews_nadi_12_4">90-120</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_12_5" value="1_19" class="mr-1 skalapews pews_nadi_12_5">121-140</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_12_6" value="2_20" class="mr-1 skalapews pews_nadi_12_6">141-160</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_12_7" value="3_21" class="mr-1 skalapews pews_nadi_12_7">≥160</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">7-12 Tahun</span></td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_13_1" value="3_22" class="mr-1 skalapews pews_nadi_13_1">≤60</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_13_2" value="2_23" class="mr-1 skalapews pews_nadi_13_2">60-69</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_13_3" value="1_24" class="mr-1 skalapews pews_nadi_13_3">70-79</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_13_4" value="0_25" class="mr-1 skalapews pews_nadi_13_4">80-100</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_13_5" value="1_26" class="mr-1 skalapews pews_nadi_13_5">101-120</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_13_6" value="2_27" class="mr-1 skalapews pews_nadi_13_6">121-140</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_13_7" value="3_28" class="mr-1 skalapews pews_nadi_13_7">≥140</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="ml-3">13-18 Tahun</span></td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_14_1" value="3_29" class="mr-1 skalapews pews_nadi_14_1">≤60</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_14_2" value="2_30" class="mr-1 skalapews pews_nadi_14_2">60-69</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_14_3" value="1_31" class="mr-1 skalapews pews_nadi_14_3">70-79</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_14_4" value="0_32" class="mr-1 skalapews pews_nadi_14_4">80-100</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_14_5" value="1_33" class="mr-1 skalapews pews_nadi_14_5">101-120</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_14_6" value="2_34" class="mr-1 skalapews pews_nadi_14_6">121-140</td>
                                                            <td class="center"><input type="radio" name="nadipews" id="skalapews_14_7" value="3_35" class="mr-1 skalapews pews_nadi_14_7">≥140</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Warna Kulit</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="warnakulitpews" id="skalapews_15_1" value="0_1" class="mr-1 skalapews pews_warna_kulit_15_1">Tidak Sianosis/CRT < 2 S</td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="warnakulitpews" id="skalapews_15_2" value="2_2" class="mr-1 skalapews pews_warna_kulit_15_2">Tampak Sianotik/CRT > 2 S</td>
                                                            <td class="center"><input type="radio" name="warnakulitpews" id="skalapews_15_3" value="3_3" class="mr-1 skalapews pews_warna_kulit_15_3">Sianotik dan Motled /CRT > 5 S</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TDS</td>
                                                            <td class="center"><input type="radio" name="tdspews" id="skalapews_16_1" value="3_1" class="mr-1 skalapews pews_tds_16_1">≤ 80</td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="tdspews" id="skalapews_16_2" value="1_2" class="mr-1 skalapews pews_tds_16_2">80-89</td>
                                                            <td class="center"><input type="radio" name="tdspews" id="skalapews_16_3" value="0_3" class="mr-1 skalapews pews_tds_16_3">90-119</td>
                                                            <td class="center"><input type="radio" name="tdspews" id="skalapews_16_4" value="1_4" class="mr-1 skalapews pews_tds_16_4">120-129</td>
                                                            <td class="center"><input type="radio" name="tdspews" id="skalapews_16_5" value="2_5" class="mr-1 skalapews pews_tds_16_5">130-139</td>
                                                            <td class="center"><input type="radio" name="tdspews" id="skalapews_16_6" value="3_6" class="mr-1 skalapews pews_tds_16_6">> 140</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kesadaran</td>
                                                            <td class="center"><input type="radio" name="kesadaranpews" id="skalapews_17_1" value="3_1" class="mr-1 skalapews pews_kesadaran_17_1">P/U</td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="kesadaranpews" id="skalapews_17_2" value="1_2" class="mr-1 skalapews pews_kesadaran_17_2">V</td>
                                                            <td class="center"><input type="radio" name="kesadaranpews" id="skalapews_17_3" value="0_3" class="mr-1 skalapews pews_kesadaran_17_3">A</td>
                                                            <td class="center"><input type="radio" name="kesadaranpews" id="skalapews_17_4" value="1_4" class="mr-1 skalapews pews_kesadaran_17_4">V</td>
                                                            <td></td>
                                                            <td class="center"><input type="radio" name="kesadaranpews" id="skalapews_17_5" value="3_5" class="mr-1 skalapews pews_kesadaran_17_5">P/U</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td colspan="7">
                                                                <input type="radio" name="total_skalapews" id="total_skalapews_1" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (0-2)</b>
                                                                <input type="radio" name="total_skalapews" id="total_skalapews_2" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (3-4)</b>
                                                                <input type="radio" name="total_skalapews" id="total_skalapews_3" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah(≥5/3 Pada salah satu parameter)</b>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row Data Pengkajian Spiritual -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pengkajian-spiritual"><i class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN
                                                SPIRITUAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pengkajian-spiritual">
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3">Kegiatan keagamaan yang biasa dilakukan : <input type="text" name="kegiatan_keagamaan" id="kegiatan_keagamaan" class="custom-form clear-input" placeholder="Masukkan Kegiatan Keagamaan"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Kemampuan beribadah <b>(Khusus Muslim)</b></td>
                                            </tr>
                                            <tr>
                                                <td width="20%"><span class="ml-4">Wajib Ibadah</span></td>
                                                <td wdith="1%">:</td>
                                                <td width="79%">
                                                    <input type="radio" name="wajib_ibadah" id="wajib_ibadah_baligh" value="Baligh" class="mr-1">Baligh
                                                    <input type="radio" name="wajib_ibadah" id="wajib_ibadah_belum" value="Belum Baligh" class="mr-1 ml-2">Belum Baligh
                                                    <input type="radio" name="wajib_ibadah" id="wajib_ibadah_halangan" value="Halangan" class="mr-1 ml-2">Halangan Lain
                                                    <input type="text" name="wajib_ibadah_halangan_input" id="wajib_ibadah_halangan_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan halangan lain">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="ml-4">Thaharoh</span></td>
                                                <td>:</td>
                                                <td>
                                                    <input type="radio" name="thaharoh" id="thaharoh_berwudhu" value="Berwudhu" class="mr-1">Berwudhu
                                                    <input type="radio" name="thaharoh" id="thaharoh_tayamum" value="Tayamum" class="mr-1 ml-2">Tayamum
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="ml-4">Sholat</span></td>
                                                <td>:</td>
                                                <td>
                                                    <input type="radio" name="sholat" id="sholat_berdiri" value="Berdiri" class="mr-1">Berdiri
                                                    <input type="radio" name="sholat" id="sholat_duduk" value="Duduk" class="mr-1 ml-2">Duduk
                                                    <input type="radio" name="sholat" id="sholat_berbaring" value="Berbaring" class="mr-1 ml-2">Berbaring
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Status Nutisi dan Status Fungsional -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-status-nutrisi-fungsional"><i class="fas fa-expand mr-1"></i>Expand</button>STATUS NUTRISI DAN
                                                STATUS FUNGSIONAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-status-nutrisi-fungsional">
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold">STATUS NUTRISI</td>
                                                <td></td>
                                                <td colspan="3" class="center bold">STATUS FUNGSIONAL</td>
                                            </tr>
                                            <tr>
                                                <td width="20%" class="bold">Adakah Penurunan Berat Badan</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="39%">
                                                    <input type="radio" name="penurunan_bb" id="penurunan_bb_tidak" class="mr-1" value="1">Tidak
                                                    <input type="radio" name="penurunan_bb" id="penurunan_bb_ya" class="mr-1 ml-2" value="1">Ya,
                                                    <input type="text" name="ket_penurunan_bb" id="ket_penurunan_bb" class="custom-form d-inline-block col-lg-5">&nbsp;Kg
                                                </td>
                                                <td></td>
                                                <td width="50%">
                                                    <input type="checkbox" name="sf_mandiri" id="sf_mandiri" value="1" class="mr-1">Mandiri
                                                    <input type="checkbox" name="sf_perlu_bantuan" id="sf_perlu_bantuan" value="1" class="mr-1 ml-2">Perlu Bantuan <br>
                                                    <input type="checkbox" name="sf_ketergantungan" id="sf_ketergantungan" value="1" class="mr-1">Ketergantungan
                                                    total, dilaporkan ke dokter pukul
                                                    <input type="time" name="ket_sf_ketergantungan" id="ket_sf_ketergantungan" class="custom-form d-inline-block col-lg-3 clear-input ml-2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" class="bold"></td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="39%">
                                                    <input type="checkbox" name="lainop_1" id="lainop-1" class="mr-1" value="1">lain-lain
                                                    <input type="text" name="lainop_2" id="lainop-2" class="custom-form d-inline-block col-lg-8">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Masalah Keperawatan -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-masalah-keperawatan"><i class="fas fa-expand mr-1"></i>Expand</button>MASALAH
                                                KEPERAWATAN
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-masalah-keperawatan">
                                        <table class="table table-sm table-striped" style="margin-top: -15px">
                                            <tr>
                                                <td width="33%"><input type="checkbox" name="masalah_keperawatan_1" id="masalah_keperawatan_1" class="mr-1" value="1">Bersihan Jalan
                                                    Nafas Tidak Efektif</td>
                                                <td width="33%"><input type="checkbox" name="masalah_keperawatan_2" id="masalah_keperawatan_2" class="mr-1" value="1">Diare</td>
                                                <td width="33%"><input type="checkbox" name="masalah_keperawatan_3" id="masalah_keperawatan_3" class="mr-1" value="1">Ansietas</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_4" id="masalah_keperawatan_4" class="mr-1" value="1">Pola Nafas
                                                    Tidak Efektif</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_5" id="masalah_keperawatan_5" class="mr-1" value="1">Intoleransi
                                                    Aktivitas</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_6" id="masalah_keperawatan_6" class="mr-1" value="1">Berduka</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_7" id="masalah_keperawatan_7" class="mr-1" value="1">Gangguan
                                                    Pertukaran Gas</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_8" id="masalah_keperawatan_8" class="mr-1" value="1">Gangguan
                                                    Mobilitas Fisik</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_9" id="masalah_keperawatan_9" class="mr-1" value="1">Gangguan
                                                    Interaksi Sosial</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_10" id="masalah_keperawatan_10" class="mr-1" value="1">Gangguan
                                                    Ventilasi Spontan</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_11" id="masalah_keperawatan_11" class="mr-1" value="1">Penurunan
                                                    Kapasitas Adaptif Intrakranial</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_12" id="masalah_keperawatan_12" class="mr-1" value="1">Risiko Cedera
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_13" id="masalah_keperawatan_13" class="mr-1" value="1">Penurunan
                                                    Curah Jantung</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_14" id="masalah_keperawatan_14" class="mr-1" value="1">Nyeri Akut
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_15" id="masalah_keperawatan_15" class="mr-1" value="1">Risiko
                                                    Aspirasi</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_16" id="masalah_keperawatan_16" class="mr-1" value="1">Perfusi
                                                    Perifer Tidak Efektif</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_17" id="masalah_keperawatan_17" class="mr-1" value="1">Nyeri Kronis
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_18" id="masalah_keperawatan_18" class="mr-1" value="1">Risiko
                                                    Pendarahan</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_19" id="masalah_keperawatan_19" class="mr-1" value="1">Nausea</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_20" id="masalah_keperawatan_20" class="mr-1" value="1">Nyeri
                                                    Melahirkan</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_21" id="masalah_keperawatan_21" class="mr-1" value="1">Risiko Syok
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_22" id="masalah_keperawatan_22" class="mr-1" value="1">Defisit
                                                    Nutrisi</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_23" id="masalah_keperawatan_23" class="mr-1" value="1">Defisit
                                                    Perawatan Diri</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_24" id="masalah_keperawatan_24" class="mr-1" value="1">Risiko Jatuh
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_25" id="masalah_keperawatan_25" class="mr-1" value="1">Hipervolemia
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_26" id="masalah_keperawatan_26" class="mr-1" value="1">Hipertermia
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_27" id="masalah_keperawatan_27" class="mr-1" value="1">Risiko Luka
                                                    Tekan</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_28" id="masalah_keperawatan_28" class="mr-1" value="1">Hipovolemia
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_29" id="masalah_keperawatan_29" class="mr-1" value="1">Hipertermi
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="masalah_keperawatan_30" id="masalah_keperawatan_30" class="mr-1" value="1">Lain-lain
                                                    <input type="text" name="masalah_keperawatan_lain_input" id="masalah_keperawatan_lain_input" class="custom-form clear-input d-inline-block col-lg-6 disabled" placeholder="Masukkan lain - lain">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_31" id="masalah_keperawatan_31" class="mr-1" value="1">Ketidakstabilan
                                                    Kadar Glukosa Darah</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_32" id="masalah_keperawatan_32" class="mr-1" value="1">Ketegangan
                                                    Peran Pemberi Asuhan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_33" id="masalah_keperawatan_33" class="mr-1" value="1">Gangguan
                                                    Eliminasi Urin</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_34" id="masalah_keperawatan_34" class="mr-1" value="1">Resiko
                                                    Gangguan Integritas Kulit / Jaringan</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <table class="table table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td width="50%" class="bold center">Nama Perawat IGD dan Tanda Tangan</td>
                                            <td width="50%" class="bold center">Verifikasi DPJP dan Tanda Tangan</td>
                                        </tr>
                                        <tr>
                                            <td class="center"><input type="text" name="perawat_igd" id="perawat_igd" class="select2c-input"></td>
                                            <td class="center"><input type="text" name="verifikasi_dpjp_2" id="verifikasi_dpjp_2" class="select2c-input"></td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <input type="checkbox" name="ttd_perawat_igdGDG" id="ttd_perawat_igdGDG" value="1" class="custom-form col-lg-1 mx-auto">
                                                <?= digitalSignature('ttd_perawat_igd_verified') ?>
                                            </td>
                                            <td class="center">
                                                <input type="checkbox" name="ttd_verifikasi_dpjp_2" id="ttd_verifikasi_dpjp_2" value="1" class="custom-form col-lg-1 mx-auto">
                                                <?= digitalSignature('ttd_verifikasi_dpjp_2_verified') ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>



                                <!-- // PIM  -->
                                <div class="form-data-pengkajian-dokter">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card p-2">
                                                <h5 class="center"><b>PENGKAJIAN IGD MATERNAL</b></h5>
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td width="10%">Tanggal dan Jam</td>
                                                        <td width="1%">:</td>
                                                        <td colspan="4">
                                                            <input type="text" name="pm_waktu_kajian" id="pm-waktu-kajian" class="custom-form clear-input d-inline-block col-lg-2" placeholder="dd/mm/yyyy hh:mm">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">Informasi diperoleh dari</td>
                                                        <td wdith="1%">:</td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_diperoleh" id="pm-diperoleh-pasien" value="1" class="mr-1">Pasien
                                                        </td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_diperoleh" id="pm-diperoleh-keluarga" value="2" class="mr-1">Keluarga
                                                        </td>
                                                        <td colspan="2">
                                                            <input type="radio" name="pm_diperoleh" id="pm-diperoleh-lain" value="3" class="mr-1">Lain-lain, Sebutkan
                                                            <input type="text" name="pm_diperoleh_sebutkan" id="pm-diperoleh-sebutkan" class="custom-form clear-input d-inline-block col-lg-8 disabled">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">Cara Masuk</td>
                                                        <td wdith="1%">:</td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_cara_masuk" id="pm-cara-masuk-jalan" value="1" class="mr-1">Jalan tanpa bantuan
                                                        </td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_cara_masuk" id="pm-cara-masuk-kursi" value="2" class="mr-1">Kursi roda
                                                        </td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_cara_masuk" id="pm-cara-masuk-bantuan" value="3" class="mr-1">Jalan dengan bantuan
                                                        </td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_cara_masuk" id="pm-cara-masuk-Brangkar" value="4" class="mr-1">Brangkar
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <button class="btn btn-info btn-xs mr-1 float-left btn_expand_all" type="button"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                            <button class="btn btn-warning btn-xs mr-1 float-left btn_collapse_all" type="button"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <!-- PEMERIKSAAN KELUHAN UTAMA  -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#keluhan-utama">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>KELUHAN UTAMA
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="keluhan-utama">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td colspan="2">
                                                                <textarea name="pm_keluhan_utama" id="pm-keluhan-utama" rows="3" class="form-control clear-input" placeholder="Keluhan Utama"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%">
                                                                <input type="checkbox" name="pm_kontraksi" id="pm-kontraksi" value="1" class="mr-1">Mules-mules/kontraksi, mulai tanggal & jam
                                                                <input type="text" name="pm_waktu_kontraksi" id="pm-waktu-kontraksi" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="dd/mm/yyyy hh:mm">
                                                            </td>
                                                            <td width="50%">
                                                                <input type="checkbox" name="pm_lendir" id="pm-lendir" value="1" class="mr-1">Keluar lendir darah, sejak jam
                                                                <input type="text" name="pm_waktu_lendir" id="pm-waktu-lendir" class="custom-form clear-input d-inline-block col-lg-1 disabled" placeholder="hh:mm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%">
                                                                <input type="checkbox" name="pm_ketuban" id="pm-ketuban" value="1" class="mr-1">Keluar air ketuban, sejak jam
                                                                <input type="text" name="pm_waktu_ketuban" id="pm-waktu-ketuban" class="custom-form clear-input d-inline-block col-lg-1 disabled" placeholder="hh:mm"> warna
                                                                <input type="text" name="pm_warna_ketuban" id="pm-warna-ketuban" class="custom-form clear-input d-inline-block col-lg-3 disabled">
                                                            </td>
                                                            <td width="50%">
                                                                <input type="checkbox" name="pm_darah" id="pm-darah" value="1" class="mr-1">Darah
                                                                <input type="text" name="pm_darah_sebutkan" id="pm-darah-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <input type="checkbox" name="pm_lainnya" id="pm-lainnya" value="1" class="mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_lainnya_sebutkan" id="pm-lainnya-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- PEMERIKSAAN KELUHAN UTAMA AKHIR  -->

                                            <!-- RIWAYAT PENYAKIT SEKARANG -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#penyakit-sekarang">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT PENYAKIT SEKARANG
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="penyakit-sekarang">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td width="7%">Hamil muda</td>
                                                            <td width="15%">
                                                                :<input type="checkbox" name="pm_hamil_muda" id="pm-hamil-muda-mual" value="1" class="ml-2 mr-1">Mual
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_hamil_muda_muntah" id="pm-hamil-muda-muntah" value="1" class="mr-1">Muntah
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_hamil_muda_pendarahan" id="pm-hamil-muda-pendarahan" value="1" class="mr-1">Perdarahan
                                                            </td>
                                                            <td colspan="2">
                                                                <input type="checkbox" name="pm_hamil_muda_lain" id="pm-hamil-muda-lain" value="1" class="mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_hamil_muda_sebutkan" id="pm-hamil-muda-sebutkan" class="custom-form clear-input d-inline-block col-lg-7 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="7%">Hamil Tua</td>
                                                            <td width="15%">
                                                                :<input type="checkbox" name="pm_hamil_tua" id="pm-hamil-tua-pusing" value="1" class="ml-2 mr-1">Pusing
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_hamil_tua_kepala" id="pm-hamil-tua-sakit-kepala" value="1" class="mr-1">Sakit kepala
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_hamil_tua_pendarahan" id="pm-hamil-tua-pendarahan" value="1" class="mr-1">Perdarahan
                                                            </td>
                                                            <td colspan="2">
                                                                <input type="checkbox" name="pm_hamil_tua_lain" id="pm-hamil-tua-lain" value="1" class="mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_hamil_tua_sebutkan" id="pm-hamil-tua-sebutkan" class="custom-form clear-input d-inline-block col-lg-7 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="7%">ANC</td>
                                                            <td colspan="2">
                                                                :<input type="number" name="pm_anc_x" id="pm-anc-x" class="custom-form clear-input d-inline-block col-lg-2 ml-2 mr-1">X, di
                                                                <input type="text" name="pm_anc_lokasi" id="pm-anc-lokasi" class="custom-form clear-input d-inline-block col-lg-7 ml-1">
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_anc" id="pm-anc-teratur" value="1" class="mr-1">Teratur
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_anc_tidak_teratur" id="pm-anc-tidak-teratur" value="1" class="mr-1">Tidak teratur
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_anc_imunisasi" id="pm-anc-imunisasi" value="1" class="mr-1">Imunisasi TT
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- RIWAYAT PENYAKIT SEKARANG AKHIR -->


                                            <!-- RIWAYAT KEHAMILAN PERSALINAN DAN NIFAS YANG LALU -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#riwayat-kehamilan">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT KEHAMILAN PERSALINAN DAN NIFAS YANG LALU
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="riwayat-kehamilan">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                G<input type="text" name="pm_nifas_g" id="pm-nifas-g" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2">
                                                                P<input type="text" name="pm_nifas_p" id="pm-nifas-p" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2">
                                                                A<input type="text" name="pm_nifas_a" id="pm-nifas-a" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-4">
                                                                Hidup :<input type="text" name="pm_nifas_hidup" id="pm-nifas-hidup" class="custom-form clear-input d-inline-block col-lg-2 ml-1">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-bordered table-sm table-striped" style="margin-top: -15px;">
                                                        <thead>
                                                            <tr>
                                                                <th class="center">No</th>
                                                                <th class="center">Tgl Tahun Partus</th>
                                                                <th class="center">Tempat Partus</th>
                                                                <th class="center">Umur Hamil</th>
                                                                <th class="center">Jenis Persalinan</th>
                                                                <th class="center">Penolong Persalinan</th>
                                                                <th class="center">Penyulit</th>
                                                                <th class="center">Nifas</th>
                                                                <th class="center">Kelamin/BB</th>
                                                                <th class="center">Keadaan Anak Sekarang</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="center">1</td>
                                                                <td><input type="text" name="pm_waktu_partus_1" id="pm-waktu-partus-1" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_1" id="pm-tempat-partus-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_1" id="pm-umur-hamil-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_1" id="pm-jenis-persalinan-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_1" id="pm-penolong-persalinan-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_1" id="pm-penyulit-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_1" id="pm-nifas-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_1" id="pm-kelamin-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_1" id="pm-keadaan-1" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">2</td>
                                                                <td><input type="text" name="pm_waktu_partus_2" id="pm-waktu-partus-2" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_2" id="pm-tempat-partus-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_2" id="pm-umur-hamil-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_2" id="pm-jenis-persalinan-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_2" id="pm-penolong-persalinan-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_2" id="pm-penyulit-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_2" id="pm-nifas-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_2" id="pm-kelamin-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_2" id="pm-keadaan-2" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">3</td>
                                                                <td><input type="text" name="pm_waktu_partus_3" id="pm-waktu-partus-3" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_3" id="pm-tempat-partus-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_3" id="pm-umur-hamil-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_3" id="pm-jenis-persalinan-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_3" id="pm-penolong-persalinan-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_3" id="pm-penyulit-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_3" id="pm-nifas-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_3" id="pm-kelamin-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_3" id="pm-keadaan-3" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">4</td>
                                                                <td><input type="text" name="pm_waktu_partus_4" id="pm-waktu-partus-4" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_4" id="pm-tempat-partus-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_4" id="pm-umur-hamil-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_4" id="pm-jenis-persalinan-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_4" id="pm-penolong-persalinan-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_4" id="pm-penyulit-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_4" id="pm-nifas-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_4" id="pm-kelamin-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_4" id="pm-keadaan-4" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">5</td>
                                                                <td><input type="text" name="pm_waktu_partus_5" id="pm-waktu-partus-5" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_5" id="pm-tempat-partus-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_5" id="pm-umur-hamil-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_5" id="pm-jenis-persalinan-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_5" id="pm-penolong-persalinan-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_5" id="pm-penyulit-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_5" id="pm-nifas-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_5" id="pm-kelamin-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_5" id="pm-keadaan-5" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">6</td>
                                                                <td><input type="text" name="pm_waktu_partus_6" id="pm-waktu-partus-6" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_6" id="pm-tempat-partus-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_6" id="pm-umur-hamil-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_6" id="pm-jenis-persalinan-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_6" id="pm-penolong-persalinan-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_6" id="pm-penyulit-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_6" id="pm-nifas-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_6" id="pm-kelamin-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_6" id="pm-keadaan-6" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- RIWAYAT KEHAMILAN PERSALINAN DAN NIFAS YANG LALU AKHIR -->

                                            <!-- RIWAYAT MENSTRUASI -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#riwayat-menstruasi">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT MENSTRUASI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="riwayat-menstruasi">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_umur_menarche" id="pm-umur-menarche" value="1" class="mr-1">Umur Menarche
                                                                <input type="number" name="pm_umur_menarche_sebutkan" id="pm-umur-menarche-sebutkan" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled">th, lamanya haid
                                                                <input type="number" name="pm_lama_haid" id="pm-lama-haid" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled">hari, banyaknya
                                                                <input type="number" name="pm_pembalut" id="pm-pembalut" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled">pembalut/hari
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_dismenorroe" id="pm-dismenorroe" value="1" class="mr-1">Dismenorroe
                                                                <input type="checkbox" name="pm_spoting" id="pm-spoting" value="1" class="ml-2 mr-1">Spoting
                                                                <input type="checkbox" name="pm_menorrhagia" id="pm-menorrhagia" value="1" class="ml-2 mr-1">Menorrhagia
                                                                <input type="checkbox" name="pmm_metrorhagia" id="pmm-metrorhagia" value="1" class="ml-2 mr-1">Metrorhagia
                                                                <input type="checkbox" name="pm_menstrual" id="pm-menstrual" value="1" class="ml-2 mr-1">Pre Menstrual Syndrome
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Hari Pertama Haid Terakhir (HPHT) : <input type="text" name="pm_hpht" id="pm-hpht" class="custom-form clear-input d-inline-block col-lg-2 ml-1 mr-2">
                                                                Taksiran Persalinan (TP) <input type="text" name="pm_taksiran" id="pm-taksiran" class="custom-form clear-input d-inline-block col-lg-2 ml-1">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- RIWAYAT MENSTRUASI AKHIR -->

                                            <!-- RIWAYAT PENYAKIT KELUARGA -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#riwayat-penyakit-keluarga">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT PENYAKIT KELUARGA
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="riwayat-penyakit-keluarga">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asma" id="pm-asma" value="1" class="mr-1">Asma
                                                                <input type="checkbox" name="pm_hipertensi" id="pm-hipertensi" value="1" class="ml-3 mr-1">Hipertensi
                                                                <input type="checkbox" name="pm_jantung" id="pm-jantung" value="1" class="ml-3 mr-1">Jantung
                                                                <input type="checkbox" name="pm_diabetes" id="pm-diabetes" value="1" class="ml-3 mr-1">Diabetes
                                                                <input type="checkbox" name="pm_penyakit_lain" id="pm-penyakit-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_penyakit_lain_sebutkan" id="pm-penyakit-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- RIWAYAT PENYAKIT KELUARGA AKHIR -->

                                            <!-- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#tanda-vital">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="tanda-vital">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td width="10%">Kesadaran</td>
                                                            <td colspan="2">
                                                                : <input type="radio" name="pm_kesadaran" id="pm-kesadaran-cm" value="1" class="ml-2 mr-1">CM
                                                                <input type="radio" name="pm_kesadaran" id="pm-kesadaran-apatis" value="2" class="ml-3 mr-1">Apatis
                                                                <input type="radio" name="pm_kesadaran" id="pm-kesadaran-samnolen" value="3" class="ml-3 mr-1">Samnolen
                                                                <input type="radio" name="pm_kesadaran" id="pm-kesadaran-sopor" value="4" class="ml-3 mr-1">Sopor
                                                                <input type="radio" name="pm_kesadaran" id="pm-kesadaran-koma" value="5" class="ml-3 mr-1">Koma
                                                            </td>
                                                            <td width="10%">
                                                                Sistolik
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_sistolik" id="pm-sistolik" class="custom-form clear-input d-inline-block col-lg-2 mx-1">mmHg, Suhu
                                                                <input type="number" name="pm_suhu_sistolik" id="pm-suhu-sistolik" class="custom-form clear-input d-inline-block col-lg-2 mx-1">℃
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">GCS</td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                E = <input type="text" name="pm_cgs_e" id="pm-cgs-e" class="custom-form clear-input d-inline-block col-lg-1 cgs" onkeypress="return hanyaAngka(event)">

                                                                <!-- E <input type="text" name="gcs_e" id="gcs-e"class="custom-form clear-input d-inline-block col-lg-1 gcsw"placeholder="" onkeypress="return hanyaAngka(event)"> -->

                                                                M = <input typevent="text" name="pm_cgs_m" id="pm-cgs-m" class="custom-form clear-input d-inline-block col-lg-1 cgs" onkeypress="return hanyaAngka(event)">
                                                                V = <input type="teventxt" name="pm_cgs_v" id="pm-cgs-v" class="custom-form clear-input d-inline-block col-lg-1 cgs" onkeypress="return hanyaAngka(event)">
                                                                Total = <input type="text" name="pm_cgs_total" id="pm-cgs-total" class="custom-form clear-input d-inline-block col-lg-1 ml-3" placeholder="0" readonly>
                                                            </td>
                                                            <td width="10%">
                                                                Diastolik
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_diastolik" id="pm-diastolik" class="custom-form clear-input d-inline-block col-lg-2 mx-1">mmHg
                                                                <!-- <input type="number" name="pm_suhu_diastolik" id="pm-suhu-diastolik" class="custom-form clear-input d-inline-block col-lg-2 mx-1">℃ -->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">SpO2</td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_spo2" id="pm-spo2" class="custom-form clear-input d-inline-block col-lg-2 mx-1">
                                                            </td>
                                                            <td width="10%">
                                                                Frekuensi Nadi
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_frekuensi_nadi" id="pm-frekuensi-nadi" class="custom-form clear-input d-inline-block col-lg-2 mx-1">x/mnt
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"></td>
                                                            <td width="10%">
                                                                Frekuensi Nafas
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_frekuensi_nafas" id="pm-frekuensi-nafas" class="custom-form clear-input d-inline-block col-lg-2 mx-1">x/mnt
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL AKHIR -->

                                            <!-- PEMERIKSAAN KEBIDANAN DAN KANDUNGAN -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pemeriksaan-kandungan">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PEMERIKSAAN KEBIDANAN DAN KANDUNGAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pemeriksaan-kandungan">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr rowspan="2">
                                                            <td width="10%" class="bold" rowspan="2">
                                                                Inspeksi Abdomen
                                                            </td>
                                                            <td width="1%" rowspan="2">
                                                                :
                                                            </td>
                                                            <td colspan="4">
                                                                <input type="checkbox" name="pm_membesar" id="pm-membesar" value="1" class="mr-1">Membesar dengan arah memanjang
                                                                <input type="checkbox" name="pm_melebar" id="pm-melebar" value="1" class="ml-3 mr-1">Melebar
                                                                <input type="checkbox" name="pm_pelebaran" id="pm-pelebaran" value="1" class="ml-3 mr-1">Pelebaran vena
                                                                <input type="checkbox" name="pm_linea_alba" id="pm-linea-alba" value="1" class="ml-3 mr-1">Linea alba
                                                                <input type="checkbox" name="pm_linea_nigra" id="pm-linea-nigra" value="1" class="ml-3 mr-1">Linea nigra
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <input type="checkbox" name="pm_striae_livide" id="pm-striae-livide" value="1" class="mr-1">Striae livide
                                                                <input type="checkbox" name="pm_striae_albican" id="pm-striae-albican" value="1" class="ml-3 mr-1">Striae albican
                                                                <input type="checkbox" name="pm_luka" id="pm-luka" value="1" class="ml-3 mr-1">Luka bekas operasi
                                                                <input type="checkbox" name="pm_luka_lain" id="pm-luka-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_luka_lain_sebutkan" id="pm-luka-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold" rowspan="6">
                                                                Palpasi
                                                            </td>
                                                            <td width="1%" rowspan="6">
                                                                :
                                                            </td>
                                                            <td width="10%">
                                                                Leopold I
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                TFU :<input type="text" name="pm_tfu" id="pm-tfu" class="custom-form clear-input d-inline-block col-lg-1 mx-1">cm, Teraba :
                                                                <input type="checkbox" name="pm_leopold_1" id="pm-leopold-1-kepala" value="1" class="mx-1">Kepala
                                                                <input type="checkbox" name="pm_leopold_bokong" id="pm-leopold-1-bokong" value="1" class="ml-3 mr-1">Bokong
                                                                <input type="checkbox" name="pm_leopold_lain" id="pm-leopold-1-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_leopold_1_sebutkan" id="pm-leopold-1-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Leopold II
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                Teraba :
                                                                <input type="checkbox" name="pm_leopold_2" id="pm-leopold-2-punggung-kanan" value="1" class="mx-1">Punggung Kanan
                                                                <input type="checkbox" name="pm_leopold_punggung" id="pm-leopold-2-punggung-kiri" value="1" class="ml-3 mr-1">Punggung kiri
                                                                <input type="checkbox" name="pm_leopold_lainn" id="pm-leopold-2-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_leopold_2_sebutkan" id="pm-leopold-2-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Leopold III
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                Bagiah terbawah janin; Teraba :
                                                                <input type="checkbox" name="pm_leopold_3" id="pm-leopold-3-kepala" value="1" class="mx-1">Kepala
                                                                <input type="checkbox" name="pm_leopold_bokonggg" id="pm-leopold-3-bokong" value="1" class="ml-3 mr-1">Bokong
                                                                <input type="checkbox" name="pm_leopold_lainnn" id="pm-leopold-3-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_leopold_3_sebutkan" id="pm-leopold-3-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Leopold IV
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="pm_leopold_4" id="pm-leopold-4-kepala" value="1" class="mx-1">Konvergen
                                                                <input type="checkbox" name="pm_leopold_bokongggg" id="pm-leopold-4-bokong" value="1" class="ml-3 mr-1">Divergen
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Bagian terbawah janin masuk panggul <input type="text" name="pm_janin_masuk" id="pm-janin-masuk" class="custom-form clear-input d-inline-block col-lg-1 mx-1">bagian</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Taksiran berat janin : <input type="number" name="pm_taksiran_janin" id="pm-taksiran-janin" class="custom-form clear-input d-inline-block col-lg-1 mx-1">gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold">
                                                                Auskultasi
                                                            </td>
                                                            <td width="1%">
                                                                :
                                                            </td>
                                                            <td colspan="4">
                                                                DJJ : <input type="number" name="pm_djj_x" id="pm-djj-x" class="custom-form clear-input d-inline-block col-lg-1 mx-1">x / menit,
                                                                <input type="radio" name="pm_djj" id="pm-djj-teratur" value="1" class="mx-1">Teratur
                                                                <input type="radio" name="pm_djj" id="pm-djj-tidak-teratur" value="2" class="ml-3 mr-1">Tidak teratur
                                                                <input type="radio" name="pm_djj" id="pm-djj-tidak-terdengar" value="3" class="ml-3 mr-1">Tidak terdengar
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold">
                                                                Gerak Janin
                                                            </td>
                                                            <td width="1%">
                                                                :
                                                            </td>
                                                            <td colspan="4">
                                                                <input type="number" name="pm_gerak_janin" id="pm-gerak-janin" class="custom-form clear-input d-inline-block col-lg-1 mx-1">x / 30 menit
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold">
                                                                His / kontraksi
                                                            </td>
                                                            <td width="1%">
                                                                :
                                                            </td>
                                                            <td colspan="4">
                                                                <input type="number" name="pm_his_x" id="pm-his-x" class="custom-form clear-input d-inline-block col-lg-1 mx-1">x dalam 10 menit, lamanya
                                                                <input type="number" name="pm_his_detik" id="pm-his-detik" class="custom-form clear-input d-inline-block col-lg-1 mx-1">detik, kekuatan
                                                                <input type="text" name="pm_his_kekuatan" id="pm-his-kekuatan" class="custom-form clear-input d-inline-block col-lg-1 mx-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold" rowspan="3">
                                                                Inspeksi vagina
                                                            </td>
                                                            <td width="1%" rowspan="3">
                                                                :
                                                            </td>
                                                            <td width="20%">
                                                                Vulva / vagina
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_vulva" id="pm-vulva-normal" value="1" class="mx-1">Normal
                                                                <input type="radio" name="pm_vulva" id="pm-vulva-lain" value="2" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_vulva_sebutkan" id="pm-vulva-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Pengeluaran
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="pm_pengeluaran_lendir" id="pm-pengeluaran-lendir" value="1" class="mx-1">Lendir darah
                                                                <input type="checkbox" name="pm_pengeluaran_ketuban" id="pm-pengeluaran-ketuban" value="1" class="ml-3 mr-1">Air ketuban, warna
                                                                <input type="text" name="pm_pengeluaran_ketuban_warna" id="pm-pengeluaran-ketuban-warna" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                                <input type="checkbox" name="pm_pengeluaran_flex" id="pm-pengeluaran-flex" value="1" class="ml-3 mr-1">Flek Darah
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>
                                                                <input type="checkbox" name="pm_pengeluaran_darah" id="pm-pengeluaran-darah" value="1" class="ml-1 mr-1">Darah segar, sebanyak
                                                                <input type="text" name="pm_pengeluaran_darah_sebanyak" id="pm-pengeluaran-darah-sebanyak" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                                <input type="checkbox" name="pm_pengeluaran_lain" id="pm-pengeluaran-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_pengeluaran_lain_sebutkan" id="pm-pengeluaran-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold" rowspan="6">
                                                                Pemeriksaan dalam
                                                            </td>
                                                            <td width="1%" rowspan="6">
                                                                :
                                                            </td>
                                                            <td width="20%">
                                                                Introitus vagina
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_introitus" id="pm-introitus-benjolan" value="1" class="mx-1">Teraba benjolan
                                                                <input type="radio" name="pm_introitus" id="pm-introitus-lain" value="2" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_introitus_sebutkan" id="pm-introitus-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Porsio
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_porsio" id="pm-porsio-benjolan" value="1" class="mx-1">Tipis
                                                                <input type="radio" name="pm_porsio" id="pm-porsio-lain" value="2" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_porsio_sebutkan" id="pm-porsio-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Pembukaan
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="text" name="pm_pembukaan" id="pm-pembukaan" class="custom-form clear-input d-inline-block col-lg-3">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Ketuban
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_pembukaan_ketuban" id="pm-pembukaan-utuh" value="0" class="mx-1">Utuh
                                                                <input type="radio" name="pm_pembukaan_ketuban" id="pm-pembukaan-pecah" value="1" class="ml-3 mr-1">Pecah, warna
                                                                <input type="text" name="pm_pembukaan_ketuban_warna" id="pm-pembukaan-ketuban-warna" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Penurunan bagian terendah di Hodge
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="text" name="pm_hodge" id="pm-hodge" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-4">
                                                                UUK :<input type="text" name="pm_uuk" id="pm-uuk" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-4">
                                                                Moulage :<input type="text" name="pm_moulage" id="pm-moulage" class="custom-form clear-input d-inline-block col-lg-1 ml-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Nyeri goyang porsio
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_nyeri_porsio" id="pm-nyeri-ya" value="1" class="mx-1">Ada
                                                                <input type="radio" name="pm_nyeri_porsio" id="pm-nyeri-tidak" value="2" class="ml-3 mr-1">Tidak
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- PEMERIKSAAN KEBIDANAN DAN KANDUNGAN AKHIR -->

                                            <!-- PENILAIAN RESIKO JATUH -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-resiko-jatuh">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PENILAIAN RESIKO JATUH
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2 col-lg-6" id="pm-resiko-jatuh" style="margin-left:-10px">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-bordered table-sm">
                                                        <thead class="table-info">
                                                            <tr class="center">
                                                                <th>
                                                                    PARAMETER
                                                                </th>
                                                                <th width="15%">
                                                                    Nilai
                                                                </th>
                                                                <th width="10%">
                                                                    Skor
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td rowspan="2">RIwayat Jatuh dalan waktu 3 bulan sebab apapun</td>
                                                                <td>
                                                                    <input type="radio" name="pm_jatuh" id="pm-jatuh-ya" value="25" class="mr-1" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">25</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="radio" name="pm_jatuh" id="pm-jatuh-tidak" value="0" class="mr-1" onchange="hitungSkoreMaternal()">Tidak
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="2">Diagnosis Sekunder (≥2 Diagnosis Medis)</td>
                                                                <td>
                                                                    <input type="radio" name="pm_diagnosis" id="pm-diagnosis-ya" value="15" class="mr-1" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">15</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="radio" name="pm_diagnosis" id="pm-diagnosis-tidak" value="0" class="mr-1" onchange="hitungSkoreMaternal()">Tidak
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alat bantu jalan</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="pm_kursi_roda" id="pm-kursi-roda" value="1" class="mr-1">Tidak ada/kursi roda
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_kursi_roda_ya" id="pm-kursi-roda-ya" value="0" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_kruk" id="pm-kruk" value="1" class="mr-1">Kruk/Tongkat/Walker
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_kruk_ya" id="pm-kruk-ya" value="15" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">15</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_pegangan" id="pm-pegangan" value="1" class="mr-1">Berpegangan pada benda-benda disekitar/furniture
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_pegangan_ya" id="pm-pegangan-ya" value="30" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">30</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="2">Terpasang infus/Heparin lock</td>
                                                                <td>
                                                                    <input type="radio" name="pm_heparin" id="pm-heparin-ya" value="20" class="mr-1" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="radio" name="pm_heparin" id="pm-heparin-tidak" value="0" class="mr-1" onchange="hitungSkoreMaternal()">Tidak
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">Cara berjalan atau berpisah</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_imobilisasi" id="pm-imobilisasi" value="1" class="mr-1">Normal/bedrest/imobilisasi
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_imobilisasi_ya" id="pm-imobilisasi-ya" value="0" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_lemah" id="pm-lemah" value="1" class="mr-1">Lemah
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_lemah_ya" id="pm-lemah-ya" value="10" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">10</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_terganggu" id="pm-terganggu" value="1" class="mr-1">Terganggu
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_terganggu_ya" id="pm-terganggu-ya" value="20" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status mental</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_kemampuan" id="pm-kemampuan" value="1" class="mr-1">Sadar dengan kemampuan diri sendiri
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_kemampuan_ya" id="pm-kemampuan-ya" value="0" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_lupa" id="pm-lupa" value="1" class="mr-1">Sering lupa akan keterbatasan yang dimiliki
                                                                </td>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_lupa_ya" id="pm-lupa-ya" value="15" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">15</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" class="bold">JUMLAH SKOR</td>
                                                                <td class="center">
                                                                    <input type="number" name="pm_jumlah_skor" id="pm-jumlah-skor" class="custom-form clear-input d-inline-block" readonly placeholder="0">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="ml-1">Ket : Tidak Beresiko : 0-24, Resiko Rendah : 25-50, Resiko Tinggi : ≥ 51</p>
                                                </div>
                                            </div>
                                            <!-- PENILAIAN RESIKO JATUH AKHIR -->

                                            <!-- PENILAIAN TINGKAT NYERI -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-tingkat-nyeri">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PENILAIAN TINGKAT NYERI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-tingkat-nyeri">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td class="bold" width="10%">Skala Nyeri</td>
                                                            <td class="bold" wdith="1%">:</td>
                                                            <td class="pr-3"><input type="text" name="pm_skala_nyeri" id="pm-skala-nyeri" class="custom-form clear-input" placeholder="Masukkan skala nyeri"></td>
                                                            <td class="bold pl-2" width="20%">Kualitas Nyeri</td>
                                                            <td class="bold" width="1%">:</td>
                                                            <td><input type="text" name="pm_kualitas_nyeri" id="pm-kualitas-nyeri" class="custom-form clear-input" placeholder="Masukkan kualitas nyeri"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Frekuensi Nyeri</td>
                                                            <td class="bold">:</td>
                                                            <td class="pr-3"><input type="text" name="pm_frekuensi_nyeri" id="pm-frekuensi-nyeri" class="custom-form clear-input" placeholder="Masukkan frekuensi nyeri"></td>
                                                            <td class="bold pl-2">Faktor - Faktor yang Memperberat Nyeri</td>
                                                            <td class="bold">:</td>
                                                            <td><input type="text" name="pm_pemberat_nyeri" id="pm-pemberat-nyeri" class="custom-form clear-input" placeholder="Masukkan Faktor Memperberat nyeri"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Lama Nyeri</td>
                                                            <td class="bold">:</td>
                                                            <td class="pr-3"><input type="text" name="pm_lama_nyeri" id="pm-lama-nyeri" class="custom-form clear-input" placeholder="Masukkan lama nyeri"></td>
                                                            <td class="bold pl-2">Faktor - Faktor yang Mengurangi Nyeri</td>
                                                            <td class="bold">:</td>
                                                            <td><input type="text" name="pm_pengurang_nyeri" id="pm-pengurang-nyeri" class="custom-form clear-input" placeholder="Masukkan Faktor Mengurangi nyeri"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- PENILAIAN TINGKAT NYERI AKHIR -->

                                            <!-- RIWAYAT ALERGI -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-riwayat-alergi">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT ALERGI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-riwayat-alergi">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td rowspan="4">
                                                                <input type="radio" name="pm_alergi" id="pm-alergi-tidak" value="1" class="mr-1">Tidak
                                                            </td>
                                                            <td rowspan="4">
                                                                <input type="radio" name="pm_alergi" id="pm-alergi-tidak-tahu" value="2" class="mr-1">Tidak tahu
                                                            </td>
                                                            <td colspan="4">
                                                                <input type="radio" name="pm_alergi" id="pm-alergi-ya" value="3" class="mr-1">Ya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Alergi obat
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_obat" id="pm-alergi-obat" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                            <td class="right">
                                                                Reaksi
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_obat_reaksi" id="pm-alergi-obat-reaksi" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Alergi Makanan
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_makan" id="pm-alergi-makan" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                            <td class="right">
                                                                Reaksi
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_makan_reaksi" id="pm-alergi-makan-reaksi" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Lain-lain
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_lain" id="pm-alergi-lain" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                            <td class="right">
                                                                Reaksi
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_lain_reaksi" id="pm-alergi-lain-reaksi" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6">
                                                                <i>(BIla ada alergi segera pasang gelang merah dan tulis nama obat/makanan)</i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6">
                                                                <b>Obat yang masih dikonsumsi :</b><input type="text" name="pm_alergi_obat_konsumsi" id="pm-alergi-obat-konsumsi" class="custom-form clear-input d-inline-block col-lg-5 ml-1">
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                            <!-- RIWAYAT ALERGI AKHIR -->

                                            <!-- STATUS NUTRISI -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-status-nutrisi">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>STATUS NUTRISI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-status-nutrisi">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                Adakah penurunan berat badan :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="radio" name="pm_berat_badan" id="pm-berat-badan-tidak" value="1" class="mr-1">Tidak
                                                                <input type="radio" name="pm_berat_badan" id="pm-berat-badan-ya" value="2" class="ml-3 mr-1">Ya,
                                                                <input type="number" name="pm_berat_badan_kg" id="pm-berat-badan-kg" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled">kg

                                                                <input type="checkbox" name="pm_berat_badan_t" id="pm-berat-badan-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan


                                                                <!-- <input type="checkbox" name="pm_berat_badan_t" id="pm-berat-badan-lain" value="3" class="ml-3 mr-1">Lain-lain, sebutkan -->
                                                                <input type="text" name="pm_berat_badan_sebutkan" id="pm-berat-badan-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- STATUS NUTRISI AKHIR -->

                                            <!-- STATUS FUNGSIONAL -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-status-fungsional">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>STATUS FUNGSIONAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-status-fungsional">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                <input type="radio" name="pm_fungsional" id="pm-fungsional-mandiri" value="1" class="mr-1">Mandiri
                                                                <input type="radio" name="pm_fungsional" id="pm-fungsional-bantuan" value="2" class="ml-3 mr-1">Perlu bantuan
                                                                <input type="radio" name="pm_fungsional" id="pm-fungsional-ketergantungan" value="3" class="ml-3 mr-1">Ketergantungan total, dilaporkan ke dokter pukul
                                                                <input type="text" name="pm_fungsional_sebutkan" id="pm-fungsional-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- STATUS FUNGSIONAL AKHIR -->

                                            <!-- PSIKOSOSIAL EKONOMI -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-psikososial">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PSIKOSOSIAL EKONOMI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-psikososial">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td width="10%">
                                                                Status Psikologis
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-cemas" value="1" class="ml-1 mr-1">Cemas
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-takut" value="2" class="ml-3 mr-1">Takut
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-marah" value="3" class="ml-3 mr-1">Marah
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-sedih" value="4" class="ml-3 mr-1">Sedih
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-bunuh" value="5" class="ml-3 mr-1">Kecenderungan bunuh diri
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-lain" value="6" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_psikologis_sebutkan" id="pm-psikologis-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Status Mental
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_mental" id="pm-mental-sadar" value="1" class="ml-1 mr-1">Sadar dan orientasi baik
                                                                <input type="radio" name="pm_mental" id="pm-mental-masalah" value="2" class="ml-3 mr-1">Ada masalah perilaku, sebutkan
                                                                <input type="text" name="pm_mental_sebutkan" id="pm-mental-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                                <input type="radio" name="pm_mental" id="pm-mental-kekerasan" value="3" class="ml-3 mr-1">Perilaku kekerasan yang dialami pasien sebelumnya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                Status Ekonomi dan Sosial
                                                            </td>
                                                        </tr>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Pekerjaan
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-wiraswasta" value="1" class="ml-1 mr-1">Wiraswasta
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-pegawai-swasta" value="2" class="ml-3 mr-1">Pegawai swasta
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-pns" value="3" class="ml-3 mr-1">PNS
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-pensiunan" value="4" class="ml-3 mr-1">Pensiunan
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-pengangguran" value="5" class="ml-3 mr-1">Tidak Bekerja
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Cara pembayaran
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_bayar" id="pm-bayar-sendiri" value="1" class="ml-1 mr-1">Biaya Sendiri
                                                                <input type="radio" name="pm_bayar" id="pm-bayar-bpjs" value="2" class="ml-3 mr-1">BPJS
                                                                <input type="radio" name="pm_bayar" id="pm-bayar-pns" value="3" class="ml-3 mr-1">Asuransi, sebutkan
                                                                <input type="text" name="pm_bayar_asuransi_sebutkan" id="pm-bayar-asuransi" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">

                                                                <input type="checkbox" name="pm_bayar_t" id="pm-bayar-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan

                                                                <!-- <input type="radio" name="pm_bayar_t" id="pm-bayar-lain" value="4" class="ml-3 mr-1">Lain-lain, sebutkan -->
                                                                <input type="text" name="pm_bayar_sebutkan" id="pm-bayar-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- PSIKOSOSIAL EKONOMI AKHIR -->

                                            <!-- PENGKAJIAN SPIRITUAL -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-spiritual">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PENGKAJIAN SPIRITUAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-spiritual">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td colspan="5">
                                                                Kegiatan keagamaan yang bisa dilakukan :
                                                                <input type="text" name="pm_keagamaan" id="pm-keagamaan" class="custom-form clear-input d-inline-block col-lg-3 ml-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                Kemampuan beribadah
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Wajib Ibadah
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_ibadah" id="pm-ibadah-baligh" value="1" class="ml-1 mr-1">Baligh
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="pm_ibadah" id="pm-ibadah-belum" value="2" class="ml-1 mr-1">Belum Baligh
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="pm_ibadah" id="pm-ibadah-lain" value="3" class="ml-3 mr-1">Halangan Lain, sebutkan
                                                                <input type="text" name="pm_ibadah_sebutkan" id="pm-ibadah-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Thaharoh
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_thaharoh" id="pm-thaharoh-wudhu" value="1" class="ml-1 mr-1">Berwudhu
                                                            </td>
                                                            <td colspan="2">
                                                                <input type="radio" name="pm_thaharoh" id="pm-thaharoh-tayamum" value="1" class="ml-1 mr-1">Tayamum
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Sholat
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_sholat" id="pm-sholat-berdiri" value="1" class="ml-1 mr-1">Berdiri
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="pm_sholat" id="pm-sholat-duduk" value="2" class="ml-1 mr-1">Duduk
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="pm_sholat" id="pm-sholat-berbaring" value="3" class="ml-3 mr-1">Berbaring
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- PENGKAJIAN SPIRITUAL AKHIR -->

                                            <!-- KEBUTUHAN BIOLOGIS -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-biologis">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>KEBUTUHAN BIOLOGIS
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-biologis">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td width="20%">
                                                                Pola Makan
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_banyak_makan" id="pm-banyak-makan" class="custom-form clear-input d-inline-block col-lg-1 mr-1">x / hari, terakhir jam
                                                                <input type="text" name="pm_waktu_makan" id="pm-waktu-makan" class="custom-form clear-input d-inline-block col-lg-1" placeholder="hh:mm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Pola Minum
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="number" name="pm_banyak_minum" id="pm-banyak-minum" class="custom-form clear-input d-inline-block col-lg-1 mr-1">x / hari, terakhir jam
                                                                <input type="text" name="pm_waktu_minum" id="pm-waktu-minum" class="custom-form clear-input d-inline-block col-lg-1" placeholder="hh:mm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">
                                                                Pola Eliminasi
                                                            </td>
                                                            <td rowspan="2">:</td>
                                                            <td>
                                                                BAK &nbsp;<input type="number" name="pm_banyak_bak" id="pm-banyak-bak" class="custom-form clear-input d-inline-block col-lg-1 mr-1">x / hari, terakhir jam
                                                                <input type="text" name="pm_waktu_bak" id="pm-waktu-bak" class="custom-form clear-input d-inline-block col-lg-1" placeholder="hh:mm">
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                BAB &nbsp;<input type="number" name="pm_banyak_bab" id="pm-banyak-bab" class="custom-form clear-input d-inline-block col-lg-1 mr-1">x / hari, terakhir jam
                                                                <input type="text" name="pm_waktu_bab" id="pm-waktu-bab" class="custom-form clear-input d-inline-block col-lg-1" placeholder="hh:mm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Hubungan Seksual terakhir
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" name="pm_sex" id="pm-sex" class="custom-form clear-input d-inline-block col-lg-3">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- KEBUTUHAN BIOLOGIS AKHIR -->

                                            <!-- SKALA EARLY WARNING SYSTEM (EWS) -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-skala-early">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>SKALA EARLY WARNING SYSTEM (EWS)
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-skala-early">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card p-2" style="margin-top:-15px">
                                                            <table class="table table-bordered table-sm">
                                                                <thead class="table-info">
                                                                    <tr class="center">
                                                                        <th colspan="8">
                                                                            MEOWS
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th width="15%"><b>Parameter</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>0</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Respirasi</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_respirasit" id="skalameowst-1-1" value="3_1" class="mr-1 skalameowst">&#60;12
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_respirasit" id="skalameowst-1-2" value="0_2" class="mr-1 skalameowst ">12-20
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_respirasit" id="skalameowst-1-3" value="2_3" class="mr-1 skalameowst ">21-25
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_respirasit" id="skalameowst-1-4" value="3_4" class="mr-1 skalameowst ">&#62;25
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Saturasi</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasit" id="skalameowst-2-1" value="3_1" class="mr-1 skalameowst ">&#60;92
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasit" id="skalameowst-2-2" value="2_2" class="mr-1 skalameowst ">92-95
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasit" id="skalameowst-2-3" value="0_3" class="mr-1 skalameowst ">&#62;95
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> O₂</td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_o2t" id="skalameowst-3-1" value="2_1" class="mr-1 skalameowst ">Ya
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_o2t" id="skalameowst-3-2" value="0_2" class="mr-1 skalameowst ">Tidak
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Suhu</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suhut" id="skalameowst-4-1" value="3_1" class="mr-1 skalameowst ">&#60;36
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suhut" id="skalameowst-4-2" value="0_2" class="mr-1 skalameowst ">36.1-37.2
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suhut" id="skalameowst-4-3" value="2_3" class="mr-1 skalameowst ">37.5-37.7
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suhut" id="skalameowst-4-4" value="3_4" class="mr-1 skalameowst ">&#62;37.7
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>TD Sistolik</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-1" value="3_1" class="mr-1 skalameowst ">&#60;90
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-2" value="0_2" class="mr-1 skalameowst ">90-140
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-3" value="1_3" class="mr-1 skalameowst ">141-150
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-4" value="2_4" class="mr-1 skalameowst ">151-160
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-5" value="3_5" class="mr-1 skalameowst ">&#62;160
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>TD diastolik</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_diastolikt" id="skalameowst-6-1" value="0_1" class="mr-1 skalameowst ">60-90
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_diastolikt" id="skalameowst-6-2" value="1_2" class="mr-1 skalameowst ">91-100
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_diastolikt" id="skalameowst-6-3" value="2_3" class="mr-1 skalameowst ">101-110
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_diastolikt" id="skalameowst-6-4" value="3_4" class="mr-1 skalameowst ">&#62;110
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nadi</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-1" value="3_1" class="mr-1 skalameowst ">&#60;50
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-2" value="2_2" class="mr-1 skalameowst ">50-60
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-3" value="0_3" class="mr-1 skalameowst ">61-100
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-4" value="1_4" class="mr-1 skalameowst ">101-110
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-5" value="2_5" class="mr-1 skalameowst ">111-120
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-6" value="3_6" class="mr-1 skalameowst ">&#62;120
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kesadaran</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarant" id="skalameowst-8-1" value="0_1" class="mr-1 skalameowst ">A
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarant" id="skalameowst-8-2" value="3_2" class="mr-1 skalameowst ">V,P/U
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nyeri</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nyerit" id="skalameowst-9-1" value="0_1" class="mr-1 skalameowst ">Normal
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nyerit" id="skalameowst-9-2" value="3_2" class="mr-1 skalameowst ">Abnormal
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Pengeluaran/Lochea</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_pengeluwarant" id="skalameowst-10-1" value="0_1" class="mr-1 skalameowst ">Normal
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_pengeluwarant" id="skalameowst-10-2" value="3_2" class="mr-1 skalameowst ">Abnormal
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Protein urin</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_proteint" id="skalameowst-11-1" value="2_1" class="mr-1 skalameowst ">+
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_proteint" id="skalameowst-11-2" value="3_2" class="mr-1 skalameowst ">&#62;++
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><b>TOTAL</b></td>
                                                                        <td colspan="7">
                                                                            <input type="radio" name="pm_meows" id="total-skalameowst-1" class="mr-1" value="Putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih (0)</b>
                                                                            <input type="radio" name="pm_meows" id="total-skalameowst-2" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>
                                                                            <input type="radio" name="pm_meows" id="total-skalameowst-3" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning(5-6/skor 3 pd 1 prameter)</b>
                                                                            <input type="radio" name="pm_meows" id="total-skalameowst-4" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah(≥7)</b>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card p-2" style="margin-top:-15px">
                                                            <table class="table table-bordered table-sm">
                                                                <thead class="table-info">
                                                                    <tr class="center">
                                                                        <th colspan="10">
                                                                            NEWS
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th width="5%" class="center"><b>No.</b></th>
                                                                        <th width="15%"><b>Parameter Fisiologis</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>0</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                        <th width="10%" class="center"><b>Blue kriteria</b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">1.</td>
                                                                        <td>Laju respirasi / menit</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-1" value="3_1" class="mr-1 skalanewso">6-8
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-2" value="1_2" class="mr-1 skalanewso ">9-11
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-3" value="0_3" class="mr-1 skalanewso ">12-20
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-4" value="2_4" class="mr-1 skalanewso ">21-24
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-5" value="3_5" class="mr-1 skalanewso ">25-34
                                                                        </td>
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-6" value="bk_6" class="mr-1 skalanewso ">&#8804;5/&#8805;35
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">2.</td>
                                                                        <td>Saturasi O₂ (%)</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasio" id="skalanewso-2-1" value="3_1" class="mr-1 skalanewso "> ≤91
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasio" id="skalanewso-2-2" value="2_2" class="mr-1 skalanewso ">92-93
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasio" id="skalanewso-2-3" value="1_3" class="mr-1 skalanewso ">94-95
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasio" id="skalanewso-2-4" value="0_4" class="mr-1 skalanewso "> ≥96
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">3.</td>
                                                                        <td>Suplemen O₂</td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suplemeno" id="skalanewso-3-1" value="2_1" class="mr-1 skalanewso ">Ya
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suplemeno" id="skalanewso-3-2" value="0_2" class="mr-1 skalanewso ">Tidak
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">4.</td>
                                                                        <td>Temperatur (°C)</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-1" value="3_1" class="mr-1 skalanewso "> ≤35
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-2" value="1_2" class="mr-1 skalanewso ">35.1-36
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-3" value="0_3" class="mr-1 skalanewso ">36.1-38
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-4" value="1_4" class="mr-1 skalanewso ">38.1-39
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-5" value="2_5" class="mr-1 skalanewso "> ≥39
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">5.</td>
                                                                        <td>TDS (mmHG)</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-1" value="3_1" class="mr-1 skalanewso ">71-90
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-2" value="1_2" class="mr-1 skalanewso ">91-100
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-3" value="0_3" class="mr-1 skalanewso ">101-110
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-4" value="1_4" class="mr-1 skalanewso ">111-180
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-5" value="2_5" class="mr-1 skalanewso ">181-220
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-6" value="3_6" class="mr-1 skalanewso "> ≥221
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-7" value="bk_7" class="mr-1 skalanewso "> ≤70
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">6.</td>
                                                                        <td>Laju jantung/menit</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-1" value="3_1" class="mr-1 skalanewso ">41-50
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-2" value="0_2" class="mr-1 skalanewso ">51-90
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-3" value="1_3" class="mr-1 skalanewso ">91-110
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-4" value="2_4" class="mr-1 skalanewso ">111-130
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-5" value="3_5" class="mr-1 skalanewso ">131-140
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-6" value="bk_6" class="mr-1 skalanewso ">&#8804;40/&#8805;140
                                                                        </td>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">7.</td>
                                                                        <td>Kesadaran</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarano" id="skalanewso-7-1" value="0_1" class="mr-1 skalanewso "> A
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarano" id="skalanewso-7-2" value="3_2" class="mr-1 skalanewso ">V & P
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarano" id="skalanewso-7-3" value="bk_3" class="mr-1 skalanewso ">U
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><b>TOTAL = </b></td>
                                                                        <td colspan="8">
                                                                            <input type="radio" name="pm_news" id="total-skalanewso-1" class="mr-1" value="Putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih (0)</b>
                                                                            <input type="radio" name="pm_news" id="total-skalanewso-2" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>
                                                                            <input type="radio" name="pm_news" id="total-skalanewso-3" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (5-6)</b>
                                                                            <input type="radio" name="pm_news" id="total-skalanewso-4" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah (≥7/1 Parameter Blue Kriteria)</b>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <p class="ml-1">Keterangan :</p>
                                                        <p class="ml-1">A = Alert (sadar penuh), V = Verbal (respon dengan rangsang suara), P=\ = Pain (respon dengan rangsang nyeri), U = Unrespon</p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- SKALA EARLY WARNING SYSTEM (EWS) AKHIR -->

                                            <!-- DATA PENUNJANG -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-data-penunjang">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>DATA PENUNJANG
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-data-penunjang">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                Pemeriksaan Laboratorium, tanggal
                                                                <input type="text" name="pm_tanggal_lab" id="pm-tanggal-lab" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="dd/mm/yy"> Hasil :
                                                                <input type="text" name="pm_hasil_lab" id="pm-hasil-lab" class="custom-form clear-input d-inline-block col-lg-3 ml-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Pemeriksaan Cardiotokografi (CTG), tanggal
                                                                <input type="text" name="pm_tanggal_cgt" id="pm-tanggal-cgt" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="dd/mm/yy"> Hasil :
                                                                <input type="text" name="pm_hasil_cgt" id="pm-hasil-cgt" class="custom-form clear-input d-inline-block col-lg-3 ml-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Lain-lain, sebutkan
                                                                <input type="text" name="pm_penunjang_lain" id="pm-penunjang-lain" class="custom-form clear-input d-inline-block col-lg-3 ml-1">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- DATA PENUNJANG AKHIR -->

                                            <!-- ASSESMEN KEBIDANAN -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-assesmen-kebidanan">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>ASSESMEN KEBIDANAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-assesmen-kebidanan">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                Masalah & kebutuhan :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_infeksi" id="pm-infeksi" value="1" class="mr-1">Resiko infeksi
                                                                <input type="checkbox" name="pm_pendarahan" id="pm-pendarahan" value="1" class="ml-3 mr-1">Resiko perdarahan
                                                                <input type="checkbox" name="pm_nausea" id="pm-nausea" value="1" class="ml-3 mr-1">Nausea
                                                                <input type="checkbox" name="pm_gawat_jalan" id="pm-gawat-jalan" value="1" class="ml-3 mr-1">Resiko gawat janin
                                                                <input type="checkbox" name="pm_anxietas" id="pm-anxietas" value="1" class="ml-3 mr-1">Anxietas
                                                                <input type="checkbox" name="pm_nyeri_melahirkan" id="pm-pm_nyeri_melahirkan" value="1" class="ml-3 mr-1">Nyeri akut/kronis/melahirkan*
                                                                <input type="checkbox" name="pm_pola_nafas" id="pm-pola-nafas" value="1" class="ml-3 mr-1">Pola nafas tidak efektif
                                                                <input type="checkbox" name="pm_kebutuhan_lain" id="pm-kebutuhan-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_kebutuhan_sebutkan" id="pm-kebutuhan-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- ASSESMEN KEBIDANAN AKHIR -->

                                            <!-- RENCANA ASUHAN KEBIDANAN -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-asuhan-kebidanan">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RENCANA ASUHAN KEBIDANAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-asuhan-kebidanan">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_jelaskan" id="pm-asuhan-jelaskan" value="1" class="mr-1">Jelaskan hasil pemeriksaan kepada pasien dan keluarga
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_laporkan" id="pm-asuhan-laporkan" value="1" class="mr-1">Laporkan hasil pemeriksaan kepada DPJP untuk penanganan selanjutnya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_fasilitas" id="pm-asuhan-fasilitas" value="1" class="mr-1">Fasilitasi surat informed consent
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_masalah" id="pm-asuhan-masalah" value="1" class="mr-1">Lakukan asuhan kebidanan sesuai masalah dan kebutuhan
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_observasi" id="pm-asuhan-observasi" value="1" class="mr-1">Lakukan observasi persalinan
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_edukasi" id="pm-asuhan-edukasi" value="1" class="mr-1">Lakukan edukasi kepada pasien
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_lain" id="pm-asuhan-lain" value="1" class="mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_asuhan_sebutkan" id="pm-asuhan-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- RENCANA ASUHAN KEBIDANAN AKHIR -->

                                            <!-- YANG MELAKUKAN PENGKAJIAN MATERNAL -->
                                            <div class="card p-2" style="margin-top:-15px">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td colspan="6" class="td-dark"><b></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">
                                                            Tanggal & Jam
                                                        </td>
                                                        <td width="1%">:</td>
                                                        <td>
                                                            <input type="text" name="pm_waktu_bidan" id="pm-waktu-bidan" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="Masukkan tanggal & jam">
                                                        </td>
                                                        <td width="10%">
                                                            Tanggal & Jam
                                                        </td>
                                                        <td width="1%">:</td>
                                                        <td>
                                                            <input type="text" name="pm_waktu_dpjp" id="pm-waktu-dpjp" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="Masukkan tanggal & jam">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">
                                                            Nama Bidan
                                                        </td>
                                                        <td width="1%">:</td>
                                                        <td>
                                                            <input type="text" name="pm_bidan" id="pm-bidan" class="select2c-input ml-2">
                                                        </td>
                                                        <td width="10%">
                                                            Dokter Verifikasi DPJP
                                                        </td>
                                                        <td width="1%">:</td>
                                                        <td>
                                                            <input type="text" name="pm_dpjp" id="pm-dpjp" class="select2c-input ml-2">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="center">
                                                            Tanda Tangan Bidan
                                                        </td>
                                                        <td colspan="3" class="center">
                                                            Verifikasi DPJP dan Tanda Tangan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="center">
                                                            <input type="checkbox" name="pm_paraf_bidan" id="pm-paraf-bidan" value="1" class="custom-form col-lg-1 mx-auto">
                                                            <?= digitalSignature('pm-paraf-bidan-verified') ?>
                                                        </td>
                                                        <td colspan="3" class="center">
                                                            <input type="checkbox" name="pm_paraf_dpjp" id="pm-paraf-dpjp" value="1" class="custom-form col-lg-1 mx-auto">
                                                            <?= digitalSignature('pm-paraf-dpjp-verified') ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               

                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
           
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiPengkajianAwalIGD()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
                <button type="button" class="btn btn-success hide" onclick="konfirmasiCetakTPIGD()" id="btn_cetak"><i class="fas fa-fw fa-print mr-1"></i>Print</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->