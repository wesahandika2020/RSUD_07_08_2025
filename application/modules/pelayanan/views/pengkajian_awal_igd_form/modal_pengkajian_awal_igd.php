<script>
$(function() {
    $('#wizard_form_igd').bwizard()

    $('.btn_expand_all').click(function() {
        $('.collapse').addClass('show')
    })

    $('.btn_collapse_all').click(function() {
        $('.collapse').removeClass('show')
    })

    $('#modal_pengkajian_awal_igd').on('hide.bs.modal', function () {
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

        $('#ttd_perawat_igd').show()
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
    $('#cara-datang-pasien-igd-4').click(function() {
        if ($(this).is(":checked")) {
            $('#cara-datang-pasien-igd-5').prop('disabled', false);
        } else {
            $('#cara-datang-pasien-igd-5').val('');
            $('#cara-datang-pasien-igd-5').prop('disabled', true);
        }
    });

    $('#cara-datang-pasien-igd-9').click(function() {
        if ($(this).is(":checked")) {
            $('#cara-datang-pasien-igd-10').prop('disabled', false);
        } else {
            $('#cara-datang-pasien-igd-10').val('');
            $('#cara-datang-pasien-igd-10').prop('disabled', true);
        }
    });

    $('#cara-datang-pasien-igd-11').click(function() {
        if ($(this).is(":checked")) {
            $('#cara-datang-pasien-igd-12').prop('disabled', false);
        } else {
            $('#cara-datang-pasien-igd-12').val('');
            $('#cara-datang-pasien-igd-12').prop('disabled', true);
        }
    });
    // CARA DATANG PASIEN AKHIR

    // ASESMENT TRIAGE AWAL  
    $('#asesment-triage-6').click(function() {
        if ($(this).is(":checked")) {
            $('#asesment-triage-7').prop('disabled', false);
        } else {
            $('#asesment-triage-7').val('');
            $('#asesment-triage-7').prop('disabled', true);
        }
        if ($(this).is(":checked")) {
            $('#asesment-triage-8').prop('disabled', false);
        } else {
            $('#asesment-triage-8').val('');
            $('#asesment-triage-8').prop('disabled', true);
        }
        if ($(this).is(":checked")) {
            $('#asesment-triage-9').prop('disabled', false);
        } else {
            $('#asesment-triage-9').val('');
            $('#asesment-triage-9').prop('disabled', true);
        }
        if ($(this).is(":checked")) {
            $('#asesment-triage-10').prop('disabled', false);
        } else {
            $('#asesment-triage-10').val('');
            $('#asesment-triage-10').prop('disabled', true);
        }
    });
    // ASESMENT TRIAGE AKHIR


    // rumus hitung skala early warning system
    $('.skalanews').change(function() {
        hitungSkalaEarlyNews()
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

    // PEMERIKSAAN ANAK AWAL WH4
    $('.calc_pa').change(function() {
        var id = $(this).attr('id');
        // console.log(id)
        var value = parseFloat($('#' + id).val());
        var split = id.split('-');
        var id_nilai = split[0] + '-' + split[1];
        console.log(id_nilai)


        $('#nilai-' + id_nilai).val(value);
        // console.log(id_nilai)

        var total = 0;
        for (let index = 0; index < $('.sub_total_nilai_pa_anak').length; index++) {
            if ($('.sub_total_nilai_pa_anak_' + index).val() == '') {
                var sub_total = 0;
            } else {
                sub_total = parseInt($('.sub_total_nilai_pa_anak_' + index).val());
            }
            total = parseInt(total) + parseInt(sub_total);
        }
        $('#total-nilai-pa').val(total);
    });
    // PEMERIKSAAN ANAK AKHIR WH

    // GCS WESA AWAL WH5
    let total = 0;
    $('#gcs-e-igd, #gcs-m-igd, #gcs-v-igd').on('keyup', function(e) {
        if (e.target.getAttribute('id') === 'gcs-e-igd') {
            total += parseInt($(this).val());
        }
        if (e.target.getAttribute('id') === 'gcs-m-igd') {
            total += parseInt($(this).val());
        }
        if (e.target.getAttribute('id') === 'gcs-v-igd') {
            total += parseInt($(this).val());
        }
        $('#gcs-total-igd').val(total);
    })
    // GCS WESA AKHIR

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
                    .total; // whether or not there are more results available

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
            // $('#verifikasi_dpjp').val(data.id)
            // $('#s2id_verifikasi_dpjp a .select2c-chosen').html(data.nama)

            $('#verifikasi_dpjp_2').val(data.id)
            $('#s2id_verifikasi_dpjp_2 a .select2c-chosen').html(data.nama)

            return data.nama;
        }
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
    // $('#modal_pengkajian_awal_igd').modal('show')
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

    $('#ttd_perawat_igd').show()
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

function entriPengkajianAwalIGD(id_pendaftaran, id_layanan_pendaftaran) {
    $('#wizard_form_igd').bwizard('show', '0')
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
            resetFormPengkajianAwalIGD()
            $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran)
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

            if (data.pasien.pekerjaan !== '') {
                $('#pekerjaan_pasien').val(data.pasien.pekerjaan)
            }

            $('#cara_bayar_pasien').val((data.layanan.cara_bayar === 'Tunai' ? data.layanan.cara_bayar :
                data.layanan.cara_bayar + ' (' + data.layanan.penjamin + ')'))

            if (data.kajian_medis != null) {
                showKajianMedis(data.kajian_medis)
            }

            if (data.kajian_keperawatan != null) {
                showKajianKeperawatan(data.kajian_keperawatan)
            }

            // WH9
            if (data.kajian_triase != null) {
                showKajianTriase(data.kajian_triase)
            }

            $('#modal_pengkajian_awal_igd').modal('show')
        },
        complete: function() {
            hideLoader()
        },
        error: function(e) {
            accessFailed(e.status)
        },
    })
}


// TRIASE AWAL WH10
function showKajianTriase(data) {
    $('#id-kajian-triase').val(data.id)
    $('#waktu-kajian-igd').val((data.waktu_igd !== null ? datetimefmysql(data.waktu_igd) : ''))

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
    // PEMERIKSAAN DEWASA AKHIR

    // PEMERIKSAAN ANAK AWAL
    if (data.pernafasan_igd_w === '3') {
        $('#pa-pernafasan-1 ').prop('checked', true).change()
    }
    if (data.pernafasan_igd_w === '2') {
        $('#pa-pernafasan-2 ').prop('checked', true).change()
    }
    if (data.pernafasan_igd_w === '1') {
        $('#pa-pernafasan-3 ').prop('checked', true).change()
    }
    if (data.pernafasan_igd_w === '0') {
        $('#pa-pernafasan-4 ').prop('checked', true).change()
    }
    if (data.pernafasan_igd_w === '3') {
        $('#pa-pernafasan-5 ').prop('checked', true).change()
    }
    if (data.pernafasan_igd_w === '2') {
        $('#pa-pernafasan-6').prop('checked', true).change()
    }
    if (data.pernafasan_igd_w === '1') {
        $('#pa-pernafasan-7 ').prop('checked', true).change()
    }

    if (data.sirkulasi_igd_w === '3') {
        $('#pa-sirkulasi-1 ').prop('checked', true).change()
    }
    if (data.sirkulasi_igd_w === '2') {
        $('#pa-sirkulasi-2 ').prop('checked', true).change()
    }
    if (data.sirkulasi_igd_w === '1') {
        $('#pa-sirkulasi-3 ').prop('checked', true).change()
    }
    if (data.sirkulasi_igd_w === '0') {
        $('#pa-sirkulasi-4 ').prop('checked', true).change()
    }
    if (data.sirkulasi_igd_w === '3') {
        $('#pa-sirkulasi-5 ').prop('checked', true).change()
    }
    if (data.sirkulasi_igd_w === '2') {
        $('#pa-sirkulasi-6 ').prop('checked', true).change()
    }
    if (data.sirkulasi_igd_w === '1') {
        $('#pa-sirkulasi-7 ').prop('checked', true).change()
    }
    if (data.sirkulasi_igd_w === '0') {
        $('#pa-sirkulasi-8 ').prop('checked', true).change()
    }
    if (data.sirkulasi_igd_w === '3') {
        $('#pa-sirkulasi-9 ').prop('checked', true).change()
    }
    if (data.sirkulasi_igd_w === '2') {
        $('#pa-sirkulasi-10 ').prop('checked', true).change()
    }

    if (data.kesadaran_igd_3 === '3') {
        $('#pa-kesadaran-1 ').prop('checked', true).change()
    }
    if (data.kesadaran_igd_3 === '2') {
        $('#pa-kesadaran-2 ').prop('checked', true).change()
    }
    if (data.kesadaran_igd_3 === '1') {
        $('#pa-kesadaran-3 ').prop('checked', true).change()
    }
    if (data.kesadaran_igd_3 === '0') {
        $('#pa-kesadaran-4 ').prop('checked', true).change()
    }
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
        $('#pk-perawat-igd').select2c('readonly', true)
        $('#pk-perawat-igd').val(data.id_perawatt_igd)
        $('#s2id_pk-perawat-igd a .select2c-chosen').html(data.perawat)
    }

    if (data.id_dokterr_igd !== null) {
        $('#pk-dokter-igd').select2c('readonly', true)
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

}
// TRIASE AKHIR


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
    if (lab.dr !== '') {
        $('#lab_dr').prop('checked', true)
    }
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
    if (data.kebutuhan_layanan !== null) {
        var kebutuhan_layanan = JSON.parse(data.kebutuhan_layanan)

        if (kebutuhan_layanan.preventif !== '') {
            $('#kebutuhan_preventif').prop('checked', true)
        }
        if (kebutuhan_layanan.kuratif !== '') {
            $('#kebutuhan_kuratif').prop('checked', true)
        }
        if (kebutuhan_layanan.paliatif !== '') {
            $('#kebutuhan_paliatif').prop('checked', true)
        }
        if (kebutuhan_layanan.rehabilitatif !== '') {
            $('#kebutuhan_rehabilitatif').prop('checked', true)
        }
    }

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

    $('#gcs_keperawatan_e').val(data.gcs_e)
    $('#gcs_keperawatan_m').val(data.gcs_m)
    $('#gcs_keperawatan_v').val(data.gcs_v)

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

    // skala early warning system news
    var skala_early = [data.sew_laju_respirasi, data.sew_saturasi, data.sew_suplemen, data.sew_temperatur, data.sew_tds,
        data.sew_laju_jantung, data.sew_kesadaran
    ];
    for (let i = 0; i <= skala_early.length; i++) {
        for (let j = 1; j <= 8; j++) {
            var z = i + 1;
            // console.log(skala_early[i] + ' ' + $('#skalanews_' + z + '_' + j).val())
            if (skala_early[i] === $('#skalanews_' + z + '_' + j).val()) {
                $('#skalanews_' + z + '_' + j).prop('checked', true).change()
            }
        }
    }
    // end skala early warning system news

    // skala early warning system pews
    // var skalapews = [data.pews_suhu, data.pews_pernafasan, data.pews_subpernafasan, data.pews_alat_bantu, data.pews_saturasi, data.pews_nadi, data.pews_warna_kulit, data.pews_tds, data.pews_kesadaran];

    // for (let a = 1; a <= 19; a++) {
    // 	for (let b = 1; b <= 7; b++) {
    // 		if (skalapews[i] === $('#skalapews_' + a + '_' + b).val()) {
    // 			$('#skalapews_' + a + '_' + b).prop('checked', true).change()
    // 		}
    // 	}
    // }

    for (let a = 1; a <= 19; a++) {
        for (let b = 1; b <= 7; b++) {
            if (data.pews_suhu === $('#skalapews_' + a + '_' + b).val() && data.pews_suhu === $('.pews_suhu_' + a +
                    '_' + b).val()) {
                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
            }

            if (data.pews_pernafasan === $('#skalapews_' + a + '_' + b).val() && data.pews_pernafasan === $(
                    '.pews_pernafasan_' + a + '_' + b).val()) {
                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
            }

            if (data.pews_subpernafasan === $('#skalapews_' + a + '_' + b).val() && data.pews_subpernafasan === $(
                    '.pews_subpernafasan_' + a + '_' + b).val()) {
                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
            }

            if (data.pews_alat_bantu === $('#skalapews_' + a + '_' + b).val() && data.pews_alat_bantu === $(
                    '.pews_alat_bantu_' + a + '_' + b).val()) {
                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
            }

            if (data.pews_saturasi === $('#skalapews_' + a + '_' + b).val() && data.pews_saturasi === $(
                    '.pews_saturasi_' + a + '_' + b).val()) {
                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
            }

            if (data.pews_nadi === $('#skalapews_' + a + '_' + b).val() && data.pews_nadi === $('.pews_nadi_' + a +
                    '_' + b).val()) {
                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
            }

            if (data.pews_warna_kulit === $('#skalapews_' + a + '_' + b).val() && data.pews_warna_kulit === $(
                    '.pews_warna_kulit_' + a + '_' + b).val()) {
                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
            }

            if (data.pews_tds === $('#skalapews_' + a + '_' + b).val() && data.pews_tds === $('.pews_tds_' + a + '_' +
                    b).val()) {
                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
            }

            if (data.pews_kesadaran === $('#skalapews_' + a + '_' + b).val() && data.pews_kesadaran === $(
                    '.pews_kesadaran_' + a + '_' + b).val()) {
                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
            }
        }
    }

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
        $('#ttd_perawat_igd').hide()
        $('#ttd_perawat_igd_verified').show()
    } else {
        $('#ttd_perawat_igd').show()
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
    // end vefikasi DPJP
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

    // , #waktu-kajian-igd, #tanggal-perawat-igd, #tanggal-dokter-igd  BARU DI TAROH

    // if ($('#dokter_igd').val() === '') {
    // 	syams_validation('#dokter_igd', 'Kolom dokter IGD harus diisi!')
    // 	$('#wizard_form_igd').bwizard('show', '0')
    // 	stop = true;
    // }

    // if ($('#perawat_igd').val() === '') {
    // 	syams_validation('#perawat_igd', 'Kolom perawat IGD harus diisi!')
    // 	$('#wizard_form_igd').bwizard('show', '0')
    // 	stop = true;
    // }


    if (stop) {
        return false;
    }

    // if ($('#ttd_dokter_igd').is(":visible")) {
    // 	if ($('#ttd_dokter_igd').is(":not(:checked)")) {
    // 		swalAlert('warning', 'Signature Validation', 'Harap dokter IGD tanda tangan terlebih dahulu')
    // 		$('#wizard_form_igd').bwizard('show', '0')
    // 		return false;
    // 	}
    // }
    // var id_kajian_triase = $('#id_kajian_triase').val()
    // var id_kajian_keperawatan = $('#id_kajian_keperawatan').val()

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

            $('#modal_pengkajian_awal_igd').modal('hide')
        },
        complete: function(data) {
            hideLoader()
        },
        error: function(e) {
            messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error')
        }
    })
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

    var nilaiTransfer = $("input[name='prjl_transfer']:checked").val()
    var nilaiMobilitas = $("input[name='prjl_mobilitas']:checked").val()

    $("input[name='prjl_transfer']:checked").each(function() {
        if (nilaiTransfer == '0' && nilaiMobilitas == '0') {
            score += parseInt(0)
        } else if (nilaiTransfer == '1' && nilaiMobilitas == '0') {
            score += parseInt(0)
        } else if (nilaiTransfer == '2' && nilaiMobilitas == '0') {
            score += parseInt(0)
        } else if (nilaiTransfer == '3' && nilaiMobilitas == '0') {
            score += parseInt(0)
        } else if (nilaiTransfer == '0' && nilaiMobilitas == '1') {
            score += parseInt(0)
        } else if (nilaiTransfer == '1' && nilaiMobilitas == '1') {
            score += parseInt(0)
        } else if (nilaiTransfer == '2' && nilaiMobilitas == '1') {
            score += parseInt(0)
        } else if (nilaiTransfer == '3' && nilaiMobilitas == '1') {
            score += parseInt(7)
        } else if (nilaiTransfer == '0' && nilaiMobilitas == '2') {
            score += parseInt(0)
        } else if (nilaiTransfer == '1' && nilaiMobilitas == '2') {
            score += parseInt(0)
        } else if (nilaiTransfer == '2' && nilaiMobilitas == '2') {
            score += parseInt(7)
        } else if (nilaiTransfer == '3' && nilaiMobilitas == '2') {
            score += parseInt(7)
        } else if (nilaiTransfer == '0' && nilaiMobilitas == '3') {
            score += parseInt(0)
        } else if (nilaiTransfer == '1' && nilaiMobilitas == '3') {
            score += parseInt(7)
        } else if (nilaiTransfer == '2' && nilaiMobilitas == '3') {
            score += parseInt(7)
        } else if (nilaiTransfer == '3' && nilaiMobilitas == '3') {
            score += parseInt(7)
        }
    })

    $('#prjl_jumlah').val(score)
}

function hitungSkalaEarlyNews() {
    var total = 0;
    // looping vertical
    for (let i = 1; i <= 7; i++) {
        // looping horizontal
        var sub_total = 0
        for (let j = 1; j <= 7; j++) {
            var value = 0;
            if ($('#skalanews_' + i + '_' + j).is(':checked')) {
                var getNilai = $('#skalanews_' + i + '_' + j).val()
                value = getNilai.split('_', 1)
                if (value[0] === 'bk') {
                    value = 8;
                }
            }

            sub_total = sub_total + parseInt(value)
        }

        total = total + parseInt(sub_total)
    }

    if (total == 0) {
        $('#total_skalanews_1').prop('checked', true)
    } else if (total >= 1 && total <= 4) {
        $('#total_skalanews_2').prop('checked', true)
    } else if (total >= 5 && total <= 6) {
        $('#total_skalanews_3').prop('checked', true)
    } else if (total >= 7) {
        $('#total_skalanews_4').prop('checked', true)
    }
}

function hitungSkalaEarlyPews() {
    var total = 0;
    // looping vertical
    for (let i = 1; i <= 19; i++) {
        // looping horizontal
        var sub_total = 0
        for (let j = 1; j <= 7; j++) {
            var value = 0;
            if ($('#skalapews_' + i + '_' + j).is(':checked')) {
                var getNilai = $('#skalapews_' + i + '_' + j).val()
                value = getNilai.split('_', 1)
            }

            sub_total = sub_total + parseInt(value)
        }

        total = total + parseInt(sub_total)
    }

    if (total >= 0 && total <= 2) {
        $('#total_skalapews_1').prop('checked', true)
    } else if (total >= 3 && total <= 4) {
        $('#total_skalapews_2').prop('checked', true)
    } else if (total >= 5) {
        $('#total_skalapews_3').prop('checked', true)
    }
}
// END Pengkajian Keperawatan
</script>


<!-- Modal -->
<!-- IGD -->
<div class="modal fade" id="modal_pengkajian_awal_igd" data-backdrop="static">
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
                <input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran">
                <input type="hidden" name="id_pasien" id="id_pasien">
                <input type="hidden" name="id_kajian_medis" id="id_kajian_medis">
                <input type="hidden" name="id_kajian_keperawatan" id="id_kajian_keperawatan">
                <!-- WH12 -->
                <input type="hidden" name="id_kajian_triase" id="id-kajian-triase">

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
                            <!-- form pengkajian awal IGD -->
                            <div id="wizard_form_igd">
                                <!-- Tab bwizard -->
                                <ol>
                                    <!-- WH13 -->
                                    <li>Triase Pasien Instalasi Gawat Darurat <i class="bold"></i></li>
                                    <li>Pengkajian Medis <i class="bold"><small>(Diisi Oleh Dokter)</small></i></li>
                                    <li>Pengkajian Keperawatan <i class="bold"><small>(Diisi Oleh Perawat)</small></i>
                                    </li>
                                </ol>

                                <!-- Data bwizard -->
                                <!-- Data Triase-->
                                <div class="form-data-pengkajian-dokter">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left btn_expand_all"
                                                    type="button"><i class="fas fa-fw fa-expand mr-1"></i>Expand
                                                    All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left btn_collapse_all"
                                                    type="button"><i class="fas fa-fw fa-compress mr-1"></i>Collapse
                                                    All</button>
                                            </td>
                                        </tr>

                                        <!-- WH14 -->
                                        <tr>
                                            <td width="20%" class="bold">Waktu Pengkajian</td>
                                            <td width="1%" class="bold">:</td>
                                            <td width="79%">
                                                <input type="text" name="waktu_kajian_igd" id="waktu-kajian-igd"
                                                    class="custom-form clear-input col-lg-2"
                                                    value="<?= date('d/m/Y H:i') ?>">
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
                                                <input type="checkbox" name="cara_datang_pasien_igd_1"
                                                    id="cara-datang-pasien-igd-1" value="1" class="mr-1">Sendiri
                                                <input type="checkbox" name="cara_datang_pasien_igd_2"
                                                    id="cara-datang-pasien-igd-2" value="1" class="mr-1 ml-2">Diantar,
                                                Keluarga/Teman
                                                <input type="checkbox" name="cara_datang_pasien_igd_3"
                                                    id="cara-datang-pasien-igd-3" value="1" class="mr-1 ml-2">Warga
                                                <input type="checkbox" name="cara_datang_pasien_igd_4"
                                                    id="cara-datang-pasien-igd-4" value="1" class="mr-1 ml-2">Rujukan,
                                                dari
                                                <input type="text" name="cara_datang_pasien_igd_5"
                                                    id="cara-datang-pasien-igd-5"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukkan informasi lain">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold"></td>
                                            <td class="bold"></td>
                                            <td>
                                                <input type="checkbox" name="cara_datang_pasien_igd_6"
                                                    id="cara-datang-pasien-igd-6" value="1" class="mr-1">Trauma
                                                <input type="checkbox" name="cara_datang_pasien_igd_7"
                                                    id="cara-datang-pasien-igd-7" value="1" class="mr-1 ml-2">Non Trauma
                                                <input type="checkbox" name="cara_datang_pasien_igd_8"
                                                    id="cara-datang-pasien-igd-8" value="1" class="mr-1 ml-2">Obstetri
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold"></td>
                                            <td class="bold"></td>
                                            <td>
                                                <input type="checkbox" name="cara_datang_pasien_igd_9"
                                                    id="cara-datang-pasien-igd-9" value="1" class="mr-1">Ambulance
                                                <input type="text" name="cara_datang_pasien_igd_10"
                                                    id="cara-datang-pasien-igd-10"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukan Nama Petugas">
                                                <input type="checkbox" name="cara_datang_pasien_igd_11"
                                                    id="cara-datang-pasien-igd-11" value="1" class="mr-1 ml-2">Polisi
                                                <input type="text" name="cara_datang_pasien_igd_12"
                                                    id="cara-datang-pasien-igd-12"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukan Nama Petugas">
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- CARA DATANG PASIEN AKHIR -->

                                    <!-- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL AWAL  -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-vital-sign"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
                                                DAN TANDA-TANDA VITAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-vital-sign">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td width="20%" class="bold">Kesadaran</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="39%">
                                                    <input type="checkbox" name="kesadaran_igd_1" id="kesadaran-igd-1"
                                                        value="1" class="mr-1">Composmentis
                                                    <input type="checkbox" name="kesadaran_igd_2" id="kesadaran-igd-2"
                                                        value="1" class="mr-1 ml-2">Apatis
                                                    <input type="checkbox" name="kesadaran_igd_3" id="kesadaran-igd-3"
                                                        value="1" class="mr-1 ml-2">Samnolen
                                                    <input type="checkbox" name="kesadaran_igd_4" id="kesadaran-igd-4"
                                                        value="1" class="mr-1 ml-2">Sopor
                                                    <input type="checkbox" name="kesadaran_igd_5" id="kesadaran-igd-5"
                                                        value="1" class="mr-1 ml-2">Koma
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
                                                        E <input type="text" name="gcs_e_igd" id="gcs-e-igd"
                                                            class="custom-form clear-input d-inline-block col-lg-1"
                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                        M <input typevent="text" name="gcs_m_igd" id="gcs-m-igd"
                                                            class="custom-form clear-input d-inline-block col-lg-1"
                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                        V <input type="teventxt" name="gcs_v_igd" id="gcs-v-igd"
                                                            class="custom-form clear-input d-inline-block col-lg-1"
                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                        Total : <input type="text" name="gcs_total_igd"
                                                            id="gcs-total-igd"
                                                            class="custom-form clear-input d-inline-block col-lg-1 ml-3"
                                                            placeholder="0">
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
                                                        <input type="text" name="tekanan_darah_igd_1"
                                                            id="tekanan-darah-igd-1"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Sistolik"
                                                            onkeypress="return hanyaAngka(event)">
                                                        <span>/</span>
                                                        <input type="text" name="tekanan_darah_igd_2"
                                                            id="tekanan-darah-igd-2"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Diastolik"
                                                            onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="tekanan_darah_igd_3"
                                                            id="tekanan-darah-igd-3"
                                                            class="custom-form clear-input d-inline-block col-lg-3"
                                                            placeholder="Suhu" onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="frekuensi_igd_1" id="frekuensi-igd-1"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Nadi" onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="frekuensi_igd_2" id="frekuensi-igd-2"
                                                            class="custom-form clear-input d-inline-block col-lg-3"
                                                            placeholder="Nafas" onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="tinggi_badan_igd_1"
                                                            id="tinggi-badan-igd-1"
                                                            class="custom-form clear-input d-inline-block col-lg-3"
                                                            placeholder="Tinggi Badan"
                                                            onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="tinggi_badan_igd_2"
                                                            id="tinggi-badan-igd-2"
                                                            class="custom-form clear-input d-inline-block col-lg-4"
                                                            placeholder="Berat Badan"
                                                            onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="imunisasi_igd_1" id="imunisasi-igd-1"
                                                            class="custom-form clear-input d-inline-block col-lg-3"
                                                            placeholder="s02" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">%</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td width="20%" class="bold">Imunisasi</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="79%">
                                                    <input type="radio" name="imunisasi_igd_2" id="imunisasi-igd-2"
                                                        class="mr-1" value="1">Ya
                                                    <input type="radio" name="imunisasi_igd_3" id="imunisasi-igd-3"
                                                        class="mr-1 ml-2" value="0">Tidak
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL AKHIR  -->

                                    <!-- PEMERIKSAAN DEWASA AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-pdewasa-sign"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN DEWASA
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pdewasa-sign">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td width="100%">
                                                    <table class="table table-sm table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%" class="center"><b>No.</b></th>
                                                                <th width="20%"><b>Parameter</b></th>
                                                                <th width="15%" class="center"><b>I. IRETURASI
                                                                        (Segera)</b></th>
                                                                <th width="15%" class="center"><b>II. EMERGENCY (10
                                                                        Menit)</b></th>
                                                                <th width="15%" class="center"><b>III. URGENT (30
                                                                        Menit)</b></th>
                                                                <th width="15%" class="center"><b>IV. NON URGENT (60
                                                                        Menit)</b></th>
                                                                <th width="15%" class="center"><b>V. FALSE EMERGENCY
                                                                        (120 Menit)</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Desclaimer -->
                                                            <!-- Nilai value setelah dash itu ada lah urut sesuai parameter nya... yang dipakai adalah nilai awal nya -->
                                                            <tr>
                                                                <th rowspan="2" class="center v-center">1</th>
                                                                <th rowspan="2" class="center v-center">Jalan Nafas</th>
                                                                <td class="center"><input type="checkbox"
                                                                        name="jalan_nafas_igd_1" id="jalan-nafas-igd-1"
                                                                        value="1" class="mr-1 ">Sumbatan</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="jalan_nafas_igd_2" id="jalan-nafas-igd-2"
                                                                        value="1" class="mr-1 ">Bebas</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="jalan_nafas_igd_3" id="jalan-nafas-igd-3"
                                                                        value="1" class="mr-1 ">Bebas 0</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="jalan_nafas_igd_4" id="jalan-nafas-igd-4"
                                                                        value="1" class="mr-1 ">Bebas</td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <td class="center"><input type="checkbox"
                                                                        name="jalan_nafas_igd_5" id="jalan-nafas-igd-5"
                                                                        value="1" class="mr-1 ">Ancaman</td>
                                                                <th></th>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="2" class="center v-center">2</th>
                                                                <th rowspan="2" class="center v-center">Pernafasan</th>
                                                                <td class="center"><input type="checkbox"
                                                                        name="pernafasan_igd_1" id="pernafasan-igd-1"
                                                                        value="1" class="mr-1 ">Henti Nafas</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="pernafasan_igd_2" id="pernafasan-igd-2"
                                                                        value="1" class="mr-1 ">Takipnoe</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="pernafasan_igd_3" id="pernafasan-igd-3"
                                                                        value="1" class="mr-1 ">Normal</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="pernafasan_igd_4" id="pernafasan-igd-4"
                                                                        value="1" class="mr-1 ">Frek Nafas Normal</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="pernafasan_igd_5" id="pernafasan-igd-5"
                                                                        value="1" class="mr-1 ">Frek Nafas
                                                                    Normal</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox"
                                                                        name="pernafasan_igd_6" id="pernafasan-igd-6"
                                                                        value="1" class="mr-1 ">Distress Nafas
                                                                    Berat</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="pernafasan_igd_7" id="pernafasan-igd-7"
                                                                        value="1" class="mr-1 ">Distress Nafas
                                                                    Sedang</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="pernafasan_igd_8" id="pernafasan-igd-8"
                                                                        value="1" class="mr-1 ">Distress Nafas
                                                                    Ringan</td>
                                                                <th></th>
                                                                <th></th>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="6" class="center v-center">3</th>
                                                                <th rowspan="6" class="center v-center">Sirkulasi</th>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_1" id="sirkulasi-igd-1"
                                                                        value="1" class="mr-1 ">Henti Jantung
                                                                </td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_2" id="sirkulasi-igd-2"
                                                                        value="1" class="mr-1 ">Nadi Teraba</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_3" id="sirkulasi-igd-3"
                                                                        value="1" class="mr-1 ">Nadi Kuat</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_4" id="sirkulasi-igd-4"
                                                                        value="1" class="mr-1 ">Nadi Kuat</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_5" id="sirkulasi-igd-5"
                                                                        value="1" class="mr-1 ">Nadi Kuat</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_6" id="sirkulasi-igd-6"
                                                                        value="1" class="mr-1 ">Nadi Tidak Ada
                                                                </td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_7" id="sirkulasi-igd-7"
                                                                        value="1" class="mr-1 ">Bradikadi</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_8" id="sirkulasi-igd-8"
                                                                        value="1" class="mr-1 ">Takikardi</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_9" id="sirkulasi-igd-9"
                                                                        value="1" class="mr-1 ">Frek Nadi Normal
                                                                </td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_10" id="sirkulasi-igd-10"
                                                                        value="1" class="mr-1 ">Frek Nadi Normal
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_11" id="sirkulasi-igd-11"
                                                                        value="1" class="mr-1 ">Sianosis</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_12" id="sirkulasi-igd-12"
                                                                        value="1" class="mr-1 ">Takikardi</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_13" id="sirkulasi-igd-13"
                                                                        value="1" class="mr-1 ">TDS > 160</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_14" id="sirkulasi-igd-14"
                                                                        value="1" class="mr-1 ">TDS 120 mmHg
                                                                </td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_15" id="sirkulasi-igd-15"
                                                                        value="1" class="mr-1 ">TDS 120 mmHg
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_16" id="sirkulasi-igd-16"
                                                                        value="1" class="mr-1 ">Akral Dingin
                                                                </td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_17" id="sirkulasi-igd-17"
                                                                        value="1" class="mr-1 ">POucat</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_18" id="sirkulasi-igd-18"
                                                                        value="1" class="mr-1 ">TDD > 100</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_19" id="sirkulasi-igd-19"
                                                                        value="1" class="mr-1 ">CRT > 4 detik
                                                                </td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_20" id="sirkulasi-igd-20"
                                                                        value="1" class="mr-1 ">Akral Dingin
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="sirkulasi_igd_21" id="sirkulasi-igd-21"
                                                                        value="1" class="mr-1 ">CRT > 2 detik
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="4" class="center v-center">4</th>
                                                                <th rowspan="4" class="center v-center">Kesadaran</th>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_1" id="kesadaran-igdd-1"
                                                                        value="1" class="mr-1 ">GCS > 8</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_2" id="kesadaran-igdd-2"
                                                                        value="1" class="mr-1 ">GCS 9-12</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_3" id="kesadaran-igdd-3"
                                                                        value="1" class="mr-1 ">GCS > 13</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_4" id="kesadaran-igdd-4"
                                                                        value="1" class="mr-1 ">GCS 15</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_5" id="kesadaran-igdd-5"
                                                                        value="1" class="mr-1 ">GCS 15</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_6" id="kesadaran-igdd-6"
                                                                        value="1" class="mr-1 ">Kejang</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_7" id="kesadaran-igdd-7"
                                                                        value="1" class="mr-1 ">Gelisah</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_8" id="kesadaran-igdd-8"
                                                                        value="1" class="mr-1 ">Apatis</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_9" id="kesadaran-igdd-9"
                                                                        value="1" class="mr-1 ">Nyeri Ringan
                                                                </td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_10" id="kesadaran-igdd-10"
                                                                        value="1" class="mr-1 ">Nyeri Ringan
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_11" id="kesadaran-igdd-11"
                                                                        value="1" class="mr-1 ">Tidak Respon
                                                                </td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_12" id="kesadaran-igdd-12"
                                                                        value="1" class="mr-1 ">Hemiparesis</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_13" id="kesadaran-igdd-13"
                                                                        value="1" class="mr-1 ">Samnolen</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_14" id="kesadaran-igdd-14"
                                                                        value="1" class="mr-1 ">Nyeri Hebat</td>
                                                                <td class="center"><input type="checkbox"
                                                                        name="kesadaran_igdd_15" id="kesadaran-igdd-15"
                                                                        value="1" class="mr-1 ">Nyeri Sedang
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
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-panak"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN
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
                                                        <td class="center"><input type="radio" name="pa_pernafasan"
                                                                id="pa-pernafasan-1" value="3"
                                                                class="mr-1 calc_pa">Retraksi Berat</td>
                                                        <td class="center"><input type="radio" name="pa_pernafasan"
                                                                id="pa-pernafasan-2" value="2"
                                                                class="mr-1 calc_pa ">Retraksi
                                                            Ringan</td>
                                                        <td class="center"><input type="radio" name="pa_pernafasan"
                                                                id="pa-pernafasan-3" value="1"
                                                                class="mr-1 calc_pa ">Nafas
                                                            Cuping Hidung</td>
                                                        <td class="center"><input type="radio" name="pa_pernafasan"
                                                                id="pa-pernafasan-4" value="0"
                                                                class="mr-1 calc_pa ">Normal
                                                        </td>
                                                        <td class="center v-center" rowspan="2"><input type="number"
                                                                name="nilai_pa_pernafasan" id="nilai-pa-pernafasan"
                                                                class="custom-form center clear-input sub_total_nilai_pa_anak sub_total_nilai_pa_anak_0"
                                                                min="0" placeholder="Nilai" readonly></td>
                                                    </tr>
                                                    <td class="center"><input type="radio" name="pa_pernafasan"
                                                            id="pa-pernafasan-5" value="3" class="mr-1 calc_pa "> RR
                                                        melambat / henti
                                                        nafas</td>
                                                    <td class="center"><input type="radio" name="pa_pernafasan"
                                                            id="pa-pernafasan-6" value="2" class="mr-1 calc_pa ">RR
                                                        meningkat
                                                    </td>
                                                    <td class="center"><input type="radio" name="pa_pernafasan"
                                                            id="pa-pernafasan-7" value="1" class="mr-1 calc_pa">RR
                                                        meningkat
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th rowspan="3" class="center v-center">2</th>
                                                        <th rowspan="3" class="center v-center">SIRKULASI</th>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi"
                                                                id="pa-sirkulasi-1" value="3"
                                                                class="mr-1  calc_pa ">Kebiruan
                                                        </td>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi"
                                                                id="pa-sirkulasi-2" value="2"
                                                                class="mr-1 calc_pa ">Pucat
                                                        </td>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi"
                                                                id="pa-sirkulasi-3" value="1"
                                                                class="mr-1 calc_pa ">Pucat
                                                        </td>
                                                        <td class="center"><input type="radio" name="pa_sirkulasi"
                                                                id="pa-sirkulasi-4" value="0"
                                                                class="mr-1 calc_pa ">Normal
                                                        </td>
                                                        <td class="center v-center" rowspan="3"><input type="number"
                                                                name="nilai_pa_sirkulasi" id="nilai-pa-sirkulasi"
                                                                class="custom-form center clear-input sub_total_nilai_pa_anak sub_total_nilai_pa_anak_1"
                                                                min="0" placeholder="Nilai" readonly></td>
                                                    </tr>
                                                    <td class="center"><input type="radio" name="pa_sirkulasi"
                                                            id="pa-sirkulasi-5" value="3" class="mr-1  calc_pa ">CTR >
                                                        5
                                                        detik</td>
                                                    <td class="center"><input type="radio" name="pa_sirkulasi"
                                                            id="pa-sirkulasi-6" value="2" class="mr-1 calc_pa ">CTR 3-4
                                                        detik
                                                    </td>
                                                    <td class="center"><input type="radio" name="pa_sirkulasi"
                                                            id="pa-sirkulasi-7" value="1" class="mr-1 calc_pa ">CTR 2-3
                                                        detik
                                                    </td>
                                                    <td class="center"><input type="radio" name="pa_sirkulasi"
                                                            id="pa-sirkulasi-8" value="0" class="mr-1 calc_pa ">Normal
                                                    </td>
                                                    <td></td>
                                                    </tr>
                                                    </tr>
                                                    <td class="center"><input type="radio" name="pa_sirkulasi"
                                                            id="pa-sirkulasi-9" value="3"
                                                            class="mr-1  calc_pa ">Takikardia
                                                        atau bradikardia
                                                    </td>
                                                    <td class="center"><input type="radio" name="pa_sirkulasi"
                                                            id="pa-sirkulasi-10" value="2"
                                                            class="mr-1 calc_pa ">Takikardia
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="center">3</th>
                                                        <th class="center">KESADARAN</th>
                                                        <td class="center"><input type="radio" name="pa_kesadaran"
                                                                id="pa-kesadaran-1" value="3"
                                                                class="mr-1 calc_pa ">Letargik
                                                        </td>
                                                        <td class="center"><input type="radio" name="pa_kesadaran"
                                                                id="pa-kesadaran-2" value="2"
                                                                class="mr-1 calc_pa ">Gelisah
                                                        </td>
                                                        <td class="center"><input type="radio" name="pa_kesadaran"
                                                                id="pa-kesadaran-3" value="1"
                                                                class="mr-1 calc_pa ">Somnolen
                                                        </td>
                                                        <td class="center"><input type="radio" name="pa_kesadaran"
                                                                id="pa-kesadaran-4" value="0"
                                                                class="mr-1 calc_pa ">Normal
                                                        </td>
                                                        <td class="center"><input type="number"
                                                                name="nilai_pa_kesadaran" id="nilai-pa-kesadaran"
                                                                class="custom-form center clear-input sub_total_nilai_pa_anak sub_total_nilai_pa_anak_2"
                                                                min="0" placeholder="Nilai" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="center">4</th>
                                                        <th class="center">INTERPRESTASI</th>
                                                        <td class="center">>=6 (SEGERA)</td>
                                                        <td class="center">5 ( < 10menit ) </td>
                                                        <td class="center">3-4 ( < 30 Menit )</td>
                                                        <td class="center">0-2 ( 60-120 Menit )</td>
                                                        <td class="center"><input type="number" name="total_nilai_pa"
                                                                id="total-nilai-pa"
                                                                class="custom-form clear-input center" min="0" value="0"
                                                                placeholder="Nilai" readonly></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                    </div>
                                    <!-- PEMERIKSAAN ANAK AKHIR -->

                                    <!-- DATA TRIASE AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-assesment-triage"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>ASESMENT
                                                TRIAGE</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-assesment-triage">
                                        <td width="100%">
                                            <table class="table table-sm table-striped table-bordered">
                                                <tr>
                                                    <th rowspan="3">Asesment Triage :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="asesment_triage_1"
                                                            id="asesment-triage-1" value="1" class="mr-1">
                                                        EMERGENCY

                                                        <input type="checkbox" name="asesment_triage_2"
                                                            id="asesment-triage-2" value="1" class="mr-1 ml-4">
                                                        NON URGENT

                                                        <input type="checkbox" name="asesment_triage_3"
                                                            id="asesment-triage-3" value="1" class="mr-1 ml-4">
                                                        Potensi Resiko Khusus (Air Borneo & Droplet)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="asesment_triage_4"
                                                            id="asesment-triage-4" value="1" class="mr-1">
                                                        URGENT

                                                        <input type="checkbox" name="asesment_triage_5"
                                                            id="asesment-triage-5" value="1" class="mr-1 ml-4">
                                                        FALSE EMERGENCY
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="asesment_triage_6"
                                                            id="asesment-triage-6" value="1" class="mr-1"> DOA
                                                        Tanda Kematian :<input type="text" name="asesment_triage_7"
                                                            id="asesment-triage-7"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-2 disabled"
                                                            placeholder="Sebutkan">
                                                        RC : <input type="text" name="asesment_triage_8"
                                                            id="asesment-triage-8"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled"
                                                            placeholder="rc">
                                                        EKG : <input type="text" name="asesment_triage_9"
                                                            id="asesment-triage-9"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled"
                                                            placeholder="ekg">
                                                        Jam Doa : <input type="text" name="asesment_triage_10"
                                                            id="asesment-triage-10"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1 disabled"
                                                            placeholder="jam doa">
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </div>
                                    <!-- DATA TRIASE AKHIR -->

                                    <!-- TINDAK LANJUT AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-tindak-lanjut"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>TINDAK
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
                                                        <input type="checkbox" name="tindak_lanjut_1"
                                                            id="tindak-lanjut-1" value="1" class="mr-1"> Periksa
                                                        ke Ruang non urgent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold"></td>
                                                    <td class="bold"></td>
                                                    <td>
                                                        <input type="checkbox" name="tindak_lanjut_2"
                                                            id="tindak-lanjut-2" value="1" class="mr-1"> Perawatan
                                                        ke Ruang Observasi pasien semi Kritis
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold"></td>
                                                    <td class="bold"></td>
                                                    <td>
                                                        <input type="checkbox" name="tindak_lanjut_3"
                                                            id="tindak-lanjut-3" value="1" class="mr-1"> Perawatan
                                                        ke Ruang resusitasi/Kritis (emergent)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold"></td>
                                                    <td class="bold"></td>
                                                    <td>
                                                        <input type="checkbox" name="tindak_lanjut_4"
                                                            id="tindak-lanjut-4" value="1" class="mr-1"> Perawatan
                                                        Maternal
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </div>
                                    <!-- TINDAK LANJUT AKHIR -->

                                    <!-- YANG MELAKUKAN PENGKAJIAN AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="2" class="center td-dark"></td>
                                        </tr>
                                        <tr>
                                            <td width="50%">
                                                Tanggal & Jam : <input type="text" name="tanggal_perawat_igd"
                                                    id="tanggal-perawat-igd"
                                                    class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                    value="<?= date('d/m/Y H:i') ?>"
                                                    placeholder="Masukkan tanggal & jam">
                                            </td>
                                            <td width="50%">
                                                Tanggal & Jam : <input type="text" name="tanggal_dokter_igd"
                                                    id="tanggal-dokter-igd"
                                                    class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                    placeholder="Masukkan tanggal & jam">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Perawat : <input type="text" name="pk_perawat_igd"
                                                    id="pk-perawat-igd" class="select2c-input ml-2"></td>
                                            <td>Dokter Verifikasi DPJP : <input type="text" name="pk_dokter_igd"
                                                    id="pk-dokter-igd" class="select2c-input ml-2"></td>
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
                                                    <input type="checkbox" name="ttd_perawat_igd" id="ttd-perawat-igd"
                                                        value="1" class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ttd_perawat_dpjp_igd_verified') ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ttd_dokter_dpjp_igd"
                                                        id="ttd-dokter-dpjp-igd" value="1"
                                                        class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ttd_dokter_dpjp_igd_verified') ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!--YANG MELAKUKAN PENGKAJIAN AKHIR -->


                                <!-- Data bwizard -->
                                <!-- Data Pengkajian Dokter-->
                                <div class="form-data-pengkajian-dokter">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left btn_expand_all"
                                                    type="button"><i class="fas fa-fw fa-expand mr-1"></i>Expand
                                                    All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left btn_collapse_all"
                                                    type="button"><i class="fas fa-fw fa-compress mr-1"></i>Collapse
                                                    All</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="bold">Waktu Pengkajian</td>
                                            <td width="1%" class="bold">:</td>
                                            <td width="79%">
                                                <input type="text" name="waktu_kajian" id="waktu_kajian"
                                                    class="custom-form clear-input col-lg-2"
                                                    value="<?= date('d/m/Y H:i') ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="td-dark"><b></b></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Keluhan Utama</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="keluhan_utama_medis" id="keluhan_utama_medis" rows="4"
                                                    class="form-control clear-input"
                                                    placeholder="Keluhan Utama"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Sekarang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rps_medis" id="rps_medis" rows="4"
                                                    class="form-control clear-input"
                                                    placeholder="Riwayat Penyakit Sekarang"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Terdahulu</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="rpt_asma" id="rpt_asma" value="1"
                                                    class="mr-1">Asma
                                                <input type="checkbox" name="rpt_diabetes_miletus"
                                                    id="rpt_diabetes_miletus" value="1" class="mr-1 ml-2">Diabetes
                                                Miletus
                                                <input type="checkbox" name="rpt_cardiovascular" id="rpt_cardiovascular"
                                                    value="1" class="mr-1 ml-2">Cardiovascular
                                                <input type="checkbox" name="rpt_kanker" id="rpt_kanker" value="1"
                                                    class="mr-1 ml-2">Kanker
                                                <input type="checkbox" name="rpt_thalasemia" id="rpt_thalasemia"
                                                    value="1" class="mr-1 ml-2">Thalasemia
                                                <input type="checkbox" name="rpt_lain" id="rpt_lain" value="1"
                                                    class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="rpt_lain_input" id="rpt_lain_input"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukkan riwayat terdahulu lain">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Keluarga</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="rpk_asma" id="rpk_asma" value="1"
                                                    class="mr-1">Asma
                                                <input type="checkbox" name="rpk_diabetes_miletus"
                                                    id="rpk_diabetes_miletus" value="1" class="mr-1 ml-2">Diabetes
                                                Miletus
                                                <input type="checkbox" name="rpk_cardiovascular" id="rpk_cardiovascular"
                                                    value="1" class="mr-1 ml-2">Cardiovascular
                                                <input type="checkbox" name="rpk_kanker" id="rpk_kanker" value="1"
                                                    class="mr-1 ml-2">Kanker
                                                <input type="checkbox" name="rpk_thalasemia" id="rpk_thalasemia"
                                                    value="1" class="mr-1 ml-2">Thalasemia
                                                <input type="checkbox" name="rpk_lain_lain" id="rpk_lain_lain" value="1"
                                                    class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="rpk_lain_input" id="rpk_lain_input"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukkan riwayat keluarga lain">
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
                                                <textarea name="riwayat_detail" id="riwayat_detail" rows="4"
                                                    class="form-control clear-input"
                                                    placeholder="Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Alergi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="alergi" id="alergi_awal_tidak" value="0"
                                                    class="mr-1">Tidak
                                                <input type="radio" name="alergi" id="alergi_awal_ya" value="1"
                                                    class="mr-1 ml-2">Ya, Sebutkan
                                                <input type="text" name="alergi_input" id="alergi_input"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukkan Alergi">
                                                <span class="mr-1 ml-3">Reaksi</span><input type="text"
                                                    name="reaksi_alergi_input" id="reaksi_alergi_input"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukkan Reaksi Alergi">
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Row Data Pengkajian Nyeri -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-pengkajian-nyeri"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN
                                                NYERI</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pengkajian-nyeri">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3"><img
                                                                src="<?= resource_url() ?>images/attributes/pain-measurement-scale-hd.png"
                                                                alt="Pain Measurement Scale"
                                                                class="img-fluid mx-auto d-block rounded shadow"></td>
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
                                                            <td><input type="radio" name="menangis" id="menangis_0"
                                                                    value="0" class="mr-1 neonatus neo_0">Tidak Menangis
                                                            </td>
                                                            <td><input type="radio" name="menangis" id="menangis_1"
                                                                    value="1" class="mr-1 neonatus neo_1">Merintih</td>
                                                            <td><input type="radio" name="menangis" id="menangis_2"
                                                                    value="2" class="mr-1 neonatus neo_2">Menagis Terus
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>SPO<sub>2</sub> > 95%</td>
                                                            <td><input type="radio" name="spo" id="spo_0" value="0"
                                                                    class="mr-1 neonatus neo_3">Normal</td>
                                                            <td><input type="radio" name="spo" id="spo_1" value="1"
                                                                    class="mr-1 neonatus neo_4">F<sub>2</sub>O<sub>2</sub>
                                                                < 30%</td>
                                                            <td><input type="radio" name="spo" id="spo_2" value="2"
                                                                    class="mr-1 neonatus neo_5">F<sub>2</sub>O<sub>2</sub>
                                                                < 30%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Peningkatan Tanda-Tanda Vital</td>
                                                            <td><input type="radio" name="vital" id="vital_0" value="0"
                                                                    class="mr-1 neonatus neo_6">HR dan TD dalam batas
                                                                normal</td>
                                                            <td><input type="radio" name="vital" id="vital_1" value="1"
                                                                    class="mr-1 neonatus neo_7">
                                                                < 20%</td>
                                                            <td><input type="radio" name="vital" id="vital_2" value="2"
                                                                    class="mr-1 neonatus neo_8">> 20%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ekspresi Wajah</td>
                                                            <td><input type="radio" name="wajah" id="wajah_0" value="0"
                                                                    class="mr-1 neonatus neo_9">Biasa</td>
                                                            <td><input type="radio" name="wajah" id="wajah_1" value="1"
                                                                    class="mr-1 neonatus neo_10">Meringis</td>
                                                            <td><input type="radio" name="wajah" id="wajah_2" value="2"
                                                                    class="mr-1 neonatus neo_11">Meringis / Mendengkur
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tidur</td>
                                                            <td><input type="radio" name="tidur" id="tidur_0" value="0"
                                                                    class="mr-1 neonatus neo_12">Normal</td>
                                                            <td><input type="radio" name="tidur" id="tidur_1" value="1"
                                                                    class="mr-1 neonatus neo_13">Sering Terbangun</td>
                                                            <td><input type="radio" name="tidur" id="tidur_2" value="2"
                                                                    class="mr-1 neonatus neo_14">Tidak Ada Tidur</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td colspan="3">
                                                                <input type="text" name="total_neonatus"
                                                                    id="total_neonatus"
                                                                    class="custom-form col-md-1 center" readonly>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:15px">
                                                    <tr>
                                                        <td width="20%" class="bold">Keterangan</td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td width="69%">
                                                            <input type="radio" name="ptn_keterangan"
                                                                id="ptn_keterangan_tidak" value="Tidak Nyeri"
                                                                class="mr-1">Tidak Nyeri : 0
                                                            <input type="radio" name="ptn_keterangan"
                                                                id="ptn_keterangan_ringan" value="Ringan"
                                                                class="mr-1 ml-2">Ringan : 1 - 3
                                                            <input type="radio" name="ptn_keterangan"
                                                                id="ptn_keterangan_sedang" value="Sedang"
                                                                class="mr-1 ml-2">Sedang : 4 - 6
                                                            <input type="radio" name="ptn_keterangan"
                                                                id="ptn_keterangan_berat" value="Berat"
                                                                class="mr-1 ml-2">Berat : 7 - 10
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Nyeri Hilang, Bila</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="ptn_minum_obat"
                                                                id="ptn_minum_obat" value="1" class="mr-1">Minum Obat
                                                            <input type="checkbox" name="ptn_mendengarkan_musik"
                                                                id="ptn_mendengarkan_musik" value="1"
                                                                class="mr-1 ml-2">Mendengarkan Musik
                                                            <input type="checkbox" name="ptn_istirahat"
                                                                id="ptn_istirahat" value="1" class="mr-1 ml-2">Istirahat
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <input type="checkbox" name="ptn_berubah_posisi"
                                                                id="ptn_berubah_posisi" value="1" class="mr-1">Berubah
                                                            Posisi / Tidur
                                                            <input type="checkbox" name="ptn_lain" id="ptn_lain"
                                                                value="1" class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="ptn_lain_input" id="ptn_lain_input"
                                                                class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled"
                                                                placeholder="Masukkan lain - lain">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3" class="bold center">Untuk Anak Usia < 3 tahun
                                                                <i>
                                                                FLACC</i></td>
                                                    </tr>
                                                </table>
                                                <table class="table table-sm table-striped table-bordered"
                                                    style="margin-top: -15px">
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
                                                                <input type="radio" name="flacc_wajah"
                                                                    id="flacc_wajah_0" value="1"
                                                                    class="mr-1 flacc">Tidak ada ekspresi tertentu
                                                                atau
                                                                senyum
                                                            </td>
                                                            <td width="20%" rowspan="3">
                                                                <input type="number" name="nilai_flacc_wajah"
                                                                    id="nilai_flacc_wajah"
                                                                    class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_0"
                                                                    readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_wajah"
                                                                    id="flacc_wajah_1" value="2"
                                                                    class="mr-1 flacc">Sesekali meringis /
                                                                mengerutkan
                                                                kening, menarik diri tidak tertarik</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">3</td>
                                                            <td><input type="radio" name="flacc_wajah"
                                                                    id="flacc_wajah_2" value="3"
                                                                    class="mr-1 flacc">Sering sampai konstan
                                                                mengerutkan
                                                                kening, rahang terkatup, dagu gemetaran</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="center bold">Kaki</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">0</td>
                                                            <td><input type="radio" name="flacc_kaki" id="flacc_kaki_0"
                                                                    value="0" class="mr-1 flacc">Posisi kaki normal atau
                                                                santai</td>
                                                            <td rowspan="3">
                                                                <input type="number" name="nilai_flacc_kaki"
                                                                    id="nilai_flacc_kaki"
                                                                    class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_1"
                                                                    readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td><input type="radio" name="flacc_kaki" id="flacc_kaki_1"
                                                                    value="1" class="mr-1 flacc">Cemas, gelisah, tegang
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_kaki" id="flacc_kaki_2"
                                                                    value="2" class="mr-1 flacc">Menendang atau menarik
                                                                kaki</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="center bold">Aktifitas</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">0</td>
                                                            <td><input type="radio" name="flacc_aktifitas"
                                                                    id="flacc_aktifitas_0" value="0"
                                                                    class="mr-1 flacc">Berbaring tenang, posisi normal,
                                                                bergerak dengan mudah</td>
                                                            <td rowspan="3">
                                                                <input type="number" name="nilai_flacc_aktifitas"
                                                                    id="nilai_flacc_aktifitas"
                                                                    class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_2"
                                                                    readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td><input type="radio" name="flacc_aktifitas"
                                                                    id="flacc_aktifitas_1" value="1"
                                                                    class="mr-1 flacc">Menggeliat, modar-mandir, tegang
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_aktifitas"
                                                                    id="flacc_aktifitas_2" value="2"
                                                                    class="mr-1 flacc">Melengkung, kaku, menyentak</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="center bold">Menangis</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">0</td>
                                                            <td><input type="radio" name="flacc_menangis"
                                                                    id="flacc_menangis_0" value="0"
                                                                    class="mr-1 flacc">Tidak
                                                                ada teriakan (terjaga /
                                                                tidur)</td>
                                                            <td rowspan="3">
                                                                <input type="number" name="nilai_flacc_menangis"
                                                                    id="nilai_flacc_menangis"
                                                                    class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_3"
                                                                    readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td><input type="radio" name="flacc_menangis"
                                                                    id="flacc_menangis_1" value="1"
                                                                    class="mr-1 flacc">Mengerang, merintih sesekali
                                                                mengeluh</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_menangis"
                                                                    id="flacc_menangis_2" value="2"
                                                                    class="mr-1 flacc">Menangis terus teriak, sering
                                                                mengeluh</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="center bold">Bicara / Suara</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">0</td>
                                                            <td><input type="radio" name="flacc_bicara"
                                                                    id="flacc_bicara_0" value="0"
                                                                    class="mr-1 flacc">Puas, senang, santai</td>
                                                            <td rowspan="3">
                                                                <input type="number" name="nilai_flacc_bicara"
                                                                    id="nilai_flacc_bicara"
                                                                    class="form-control center sub_total_nilai_flacc sub_total_nilai_flacc_4"
                                                                    readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td><input type="radio" name="flacc_bicara"
                                                                    id="flacc_bicara_1" value="1"
                                                                    class="mr-1 flacc">Sesekali diyakinkan dengan
                                                                sentuhan, pelukan, diajak</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td><input type="radio" name="flacc_bicara"
                                                                    id="flacc_bicara_2" value="2"
                                                                    class="mr-1 flacc">Sulit untuk dihibur atau di
                                                                buat
                                                                nyaman</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="bold">TOTAL</td>
                                                            <td><input type="number" min="0" name="total_nilai_flacc"
                                                                    id="total_nilai_flacc" class="form-control center"
                                                                    readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row Data Pemeriksaan Fisik -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-pemeriksaan-fisik"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN
                                                FISIK</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-fisik">
                                        <table class="table table-bordered table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td width="20%">Kepala</td>
                                                <td wdith="50%"><input type="text" name="kepala_pm" id="kepala_pm"
                                                        class="custom-form col-lg-12"></td>
                                                <!-- Untuk Gambar Anatomi -->
                                                <td width="30%" rowspan="8">
                                                    <div class="box-draw">
                                                        <img src="<?php echo base_url('resources/images/attributes/') . 'anathomi-fix.jpg' ?>"
                                                            width="361" height="434">
                                                        <div class="drawpad" id="drawpad" data-input="#drawpad"></div>
                                                        <img src="" id="fisik_img_anathomi" width="361" height="434">
                                                    </div>
                                                    <button type="button" id="btn_hapus_drawpad"
                                                        class="btn btn-secondary btn-block" onclick="hapusDrawpad()"><i
                                                            class="fas fa-trash mr-2"></i>Clear Canvas</button>

                                                    <input type="hidden" name="drawpad" id="drawpad_input" value="">
                                                </td>
                                                <!-- End -->
                                            </tr>
                                            <tr>
                                                <td>Mata</td>
                                                <td><input type="text" name="mata_pm" id="mata_pm"
                                                        class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td>Mulut</td>
                                                <td><input type="text" name="mulut_pm" id="mulut_pm"
                                                        class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td>Leher</td>
                                                <td><input type="text" name="leher_pm" id="leher_pm"
                                                        class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2">Thoraks</td>
                                                <td><label class="col-lg-2">Cor</label><input type="text"
                                                        name="thoraks_cor_pm" id="thoraks_cor_pm"
                                                        class="custom-form d-inline-block col-lg-10"></td>
                                            </tr>
                                            <tr>
                                                <td><label class="col-lg-2">Pulmo</label><input type="text"
                                                        name="thoraks_pulmo_pm" id="thoraks_pulmo_pm"
                                                        class="custom-form d-inline-block col-lg-10"></td>
                                            </tr>
                                            <tr>
                                                <td>Abdomen</td>
                                                <td><input type="text" name="abdomen_pm" id="abdomen_pm"
                                                        class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td>Ekstermitas</td>
                                                <td><input type="text" name="ekstermitas_pm" id="ekstermitas_pm"
                                                        class="custom-form col-lg-12"></td>
                                            </tr>
                                            <tr>
                                                <td>Kulit dan Kelamin</td>
                                                <td><input type="text" name="kulit_kelamin_pm" id="kulit_kelamin_pm"
                                                        class="custom-form col-lg-12"></td>
                                                <td><label class="col-lg-4">Status Lokalis</label><input type="text"
                                                        name="status_lokalis" id="status_lokalis"
                                                        class="custom-form d-inline-block col-lg-8"></td>
                                            </tr>
                                            <tr>
                                                <td>Diagnosis Awal</td>
                                                <td colspan="2">
                                                    <textarea name="diagnosa_awal" id="diagnosa_awal"
                                                        class="form-control" rows="4"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Diagnosis Banding</td>
                                                <td colspan="2">
                                                    <textarea name="diagnosa_banding" id="diagnosa_banding"
                                                        class="form-control" rows="4"></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Pemeriksaan Penunjang -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-pemeriksaan-penunjang"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN
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
                                                    <input type="checkbox" name="lab_dr" id="lab_dr" value="1"
                                                        class="mr-1">DR
                                                    <input type="checkbox" name="lab_dpl" id="lab_dpl" value="1"
                                                        class="mr-1 ml-2">DPL
                                                    <input type="checkbox" name="lab_agd" id="lab_agd" value="1"
                                                        class="mr-1 ml-2">AGD
                                                    <input type="checkbox" name="lab_elektrolit" id="lab_elektrolit"
                                                        value="1" class="mr-1 ml-2">Elektrolit
                                                    <input type="checkbox" name="lab_urin" id="lab_urin" value="1"
                                                        class="mr-1 ml-2">Urin
                                                    <input type="checkbox" name="lab_ck" id="lab_ck" value="1"
                                                        class="mr-1 ml-2">CK/CKMB
                                                    <input type="checkbox" name="lab_gds" id="lab_gds" value="1"
                                                        class="mr-1 ml-2">GDS
                                                    <input type="checkbox" name="lab_ureum" id="lab_ureum" value="1"
                                                        class="mr-1 ml-2">Ureum Creatinin
                                                    <input type="checkbox" name="lab_lain" id="lab_lain" value="1"
                                                        class="mr-1 ml-2">Lain-lain,
                                                    <input type="text" name="lab_lain_input" id="lab_lain_input"
                                                        class="custom-form d-inline-block col-md-4 disabled"
                                                        placeholder="Sebutkan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">X-Ray</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="checkbox" name="xray_tidak_ada" id="xray_tidak_ada"
                                                        value="1" class="mr-1">Tidak Ada
                                                    <input type="checkbox" name="xray_thorax" id="xray_thorax" value="1"
                                                        class="mr-1 ml-2">Thorax
                                                    <input type="checkbox" name="xray_abdomen" id="xray_abdomen"
                                                        value="1" class="mr-1 ml-2">Abdomen 3 Posisi
                                                    <input type="checkbox" name="xray_ctscan" id="xray_ctscan" value="1"
                                                        class="mr-1 ml-2">CT Scan
                                                    <input type="checkbox" name="xray_lain" id="xray_lain" value="1"
                                                        class="mr-1 ml-2">Lain-lain,
                                                    <input type="text" name="xray_lain_input" id="xray_lain_input"
                                                        class="custom-form d-inline-block col-md-4 disabled"
                                                        placeholder="Sebutkan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">EKG</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="ekg" id="ekg_tidak" value="0"
                                                        class="mr-1">Tidak
                                                    <input type="radio" name="ekg" id="ekg_yaa" value="1"
                                                        class="mr-1 ml-2">Ya,
                                                    <input type="text" name="ket_ekg" id="ket_ekg"
                                                        class="custom-form d-inline-block col-md-4 disabled"
                                                        placeholder="Hasil">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Terapi / Tindakan / Instruksi Lain -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-terapi-tindakan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>TERAPI / TINDAKAN
                                                / INSTRUKSI LAIN</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-terapi-tindakan">
                                        <div id="field_terapi_tindakan"></div>
                                    </div>

                                    <!-- Row Data Status Akhir Pasien -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-status-akhir-pasien"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>STATUS AKHIR
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
                                                    <input type="text" name="bangsal" id="bangsal_auto"
                                                        class="select2c-input">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Dipulangkan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="dipulangkan" id="dipulangkan_tidak"
                                                        value="0" class="mr-1">Tidak Perlu Kontrol
                                                    <input type="radio" name="dipulangkan" id="dipulangkan_ya" value="1"
                                                        class="mr-1 ml-2">Kontrol di
                                                    <input type="text" name="ket_dipulangkan" id="ket_dipulangkan"
                                                        class="custom-form d-inline-block col-md-4 disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Dirujuk Ke</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="dirujuk_ke" id="dirujuk_ke"
                                                        class="custom-form col-md-6"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Alasan Rujuk</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="alasan_rujuk" id="alasan_rujuk"
                                                        class="custom-form col-md-6"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Pulang Paksa / APS</td>
                                                <td class="bold">:</td>
                                                <td>Alasan<input type="text" name="alasan_pulang_paksa"
                                                        id="alasan_pulang_paksa"
                                                        class="custom-form d-inline-block col-md-6 ml-2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><input type="checkbox" name="meninggal" id="meninggal"
                                                        value="1" class="mr-1">Meninggal</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Kondisi Pasien Saat Pulang/Rujuk</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="kondisi_pulang" id="kondisi_pulang"
                                                        class="custom-form col-md-6"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Kesadaran</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="checkbox" name="kesadaran_cm" id="kesadaran_cm"
                                                        value="1" class="mr-1">CM
                                                    <input type="checkbox" name="kesadaran_apatis" id="kesadaran_apatis"
                                                        value="1" class="mr-1 ml-2">Apatis
                                                    <input type="checkbox" name="kesadaran_delirium"
                                                        id="kesadaran_delirium" value="1" class="mr-1 ml-2">Delirium
                                                    <input type="checkbox" name="kesadaran_sopor" id="kesadaran_sopor"
                                                        value="1" class="mr-1 ml-2">Sopor
                                                    <input type="checkbox" name="kesadaran_koma" id="kesadaran_koma"
                                                        value="1" class="mr-1 ml-2">Koma
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Jenis Kebutuhan layanan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="checkbox" name="kebutuhan_preventif"
                                                        id="kebutuhan_preventif" value="1" class="mr-1">Preventif
                                                    <input type="checkbox" name="kebutuhan_kuratif"
                                                        id="kebutuhan_kuratif" value="1" class="mr-1 ml-2">Kuratif
                                                    <input type="checkbox" name="kebutuhan_paliatif"
                                                        id="kebutuhan_paliatif" value="1" class="mr-1 ml-2">Paliatif
                                                    <input type="checkbox" name="kebutuhan_rehabilitatif"
                                                        id="kebutuhan_rehabilitatif" value="1"
                                                        class="mr-1 ml-2">Rehabilitatif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">GCS</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <label>E</label><input type="text" name="gcs_e" id="gcs_e"
                                                        class="custom-form d-inline-block col-md-1 mr-1 ml-2"
                                                        onkeypress="return hanyaAngka(event)">
                                                    <label>M</label><input type="text" name="gcs_m" id="gcs_m"
                                                        class="custom-form d-inline-block col-md-1 mr-1 ml-2"
                                                        onkeypress="return hanyaAngka(event)">
                                                    <label>V</label><input type="text" name="gcs_v" id="gcs_v"
                                                        class="custom-form d-inline-block col-md-1 mr-1 ml-2"
                                                        onkeypress="return hanyaAngka(event)">
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
                                            <td class="center"><input type="text" name="dokter_igd" id="dokter_igd"
                                                    class="select2c-input"></td>
                                            <td class="center"><input type="text" name="verifikasi_dpjp"
                                                    id="verifikasi_dpjp" class="select2c-input"></td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <input type="checkbox" name="ttd_dokter_igd" id="ttd_dokter_igd"
                                                    value="1" class="custom-form col-lg-1 mx-auto">
                                                <?= digitalSignature('ttd_dokter_igd_verified') ?>
                                            </td>
                                            <td class="center">
                                                <input type="checkbox" name="ttd_verifikasi_dpjp"
                                                    id="ttd_verifikasi_dpjp" value="1"
                                                    class="custom-form col-lg-1 mx-auto">
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
                                                <button class="btn btn-info btn-xs mr-1 float-left btn_expand_all"
                                                    type="button"><i class="fas fa-fw fa-expand mr-1"></i>Expand
                                                    All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left btn_collapse_all"
                                                    type="button"><i class="fas fa-fw fa-compress mr-1"></i>Collapse
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
                                                <input type="checkbox" name="informasi_dari_pasien"
                                                    id="informasi_dari_pasien" value="1" class="mr-1">Pasien
                                                <input type="checkbox" name="informasi_dari_keluarga"
                                                    id="informasi_dari_keluarga" value="1" class="mr-1 ml-2">Keluarga
                                                <input type="checkbox" name="informasi_dari_lain"
                                                    id="informasi_dari_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="informasi_dari_lain_input"
                                                    id="informasi_dari_lain_input"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukkan informasi lain">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Cara Masuk</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="cara_masuk_tanpa_bantuan"
                                                    id="cara_masuk_tanpa_bantuan" value="1" class="mr-1">Jalan tanpa
                                                bantuan
                                                <input type="checkbox" name="cara_masuk_dengan_bantuan"
                                                    id="cara_masuk_dengan_bantuan" value="1" class="mr-1 ml-2">Jalan
                                                dengan bantuan
                                                <input type="checkbox" name="cara_masuk_kursi_roda"
                                                    id="cara_masuk_kursi_roda" value="1" class="mr-1 ml-2">Kursi Roda
                                                <input type="checkbox" name="cara_masuk_brankar" id="cara_masuk_brankar"
                                                    value="1" class="mr-1 ml-2">Brankar
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Keluhan Utama</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="keluhan_utama_keperawatan"
                                                    id="keluhan_utama_keperawatan" rows="4"
                                                    class="form-control clear-input"
                                                    placeholder="Keluhan Utama"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Sekarang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rps_keperawatan" id="rps_keperawatan" rows="4"
                                                    class="form-control clear-input"
                                                    placeholder="Riwayat Penyakit Sekarang"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Terdahulu</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="rpt_keperawatan_asma"
                                                    id="rpt_keperawatan_asma" value="1" class="mr-1">Asma
                                                <input type="checkbox" name="rpt_keperawatan_hipertensi"
                                                    id="rpt_keperawatan_hipertensi" value="1"
                                                    class="mr-1 ml-2">Hipertensi
                                                <input type="checkbox" name="rpt_keperawatan_jantung"
                                                    id="rpt_keperawatan_jantung" value="1" class="mr-1 ml-2">Jantung
                                                <input type="checkbox" name="rpt_keperawatan_diabetes"
                                                    id="rpt_keperawatan_diabetes" value="1" class="mr-1 ml-2">Diabetes
                                                <input type="checkbox" name="rpt_keperawatan_hepatitis"
                                                    id="rpt_keperawatan_hepatitis" value="1" class="mr-1 ml-2">Hepatitis
                                                <input type="checkbox" name="rpt_keperawatan_lain"
                                                    id="rpt_keperawatan_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="rpt_keperawatan_lain_input"
                                                    id="rpt_keperawatan_lain_input"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukkan riwayat penyakit terdahulu lain">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Keluarga</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="rpk_keperawatan_asma"
                                                    id="rpk_keperawatan_asma" value="1" class="mr-1">Asma
                                                <input type="checkbox" name="rpk_keperawatan_hipertensi"
                                                    id="rpk_keperawatan_hipertensi" value="1"
                                                    class="mr-1 ml-2">Hipertensi
                                                <input type="checkbox" name="rpk_keperawatan_jantung"
                                                    id="rpk_keperawatan_jantung" value="1" class="mr-1 ml-2">Jantung
                                                <input type="checkbox" name="rpk_keperawatan_diabetes"
                                                    id="rpk_keperawatan_diabetes" value="1" class="mr-1 ml-2">Diabetes
                                                <input type="checkbox" name="rpk_keperawatan_hepatitis"
                                                    id="rpk_keperawatan_hepatitis" value="1" class="mr-1 ml-2">Hepatitis
                                                <input type="checkbox" name="rpk_keperawatan_lain"
                                                    id="rpk_keperawatan_lain" value="1" class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="rpk_keperawatan_lain_input"
                                                    id="rpk_keperawatan_lain_input"
                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                    placeholder="Masukkan riwayat penyakit keluarga lain">
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Row Pemeriksaan Fisik dan Tanda Vital -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-pemeriksaan-fisik-tanda-vital"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
                                                DAN TANDA-TANDA VITAL</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-fisik-tanda-vital">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td width="20%" class="bold">Kesadaran</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="39%">
                                                    <input type="checkbox" name="composmentis" id="composmentis"
                                                        value="1" class="mr-1">Composmentis
                                                    <input type="checkbox" name="apatis" id="apatis" value="1"
                                                        class="mr-1 ml-2">Apatis
                                                    <input type="checkbox" name="samnolen" id="samnolen" value="1"
                                                        class="mr-1 ml-2">Samnolen
                                                    <input type="checkbox" name="sopor" id="sopor" value="1"
                                                        class="mr-1 ml-2">Sopor
                                                    <input type="checkbox" name="koma" id="koma" value="1"
                                                        class="mr-1 ml-2">Koma
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
                                                        E <input type="text" name="gcs_keperawatan_e"
                                                            id="gcs_keperawatan_e"
                                                            class="custom-form clear-input d-inline-block col-lg-1"
                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                        M <input typevent="text" name="gcs_keperawatan_m"
                                                            id="gcs_keperawatan_m"
                                                            class="custom-form clear-input d-inline-block col-lg-1"
                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                        V <input type="teventxt" name="gcs_keperawatan_v"
                                                            id="gcs_keperawatan_v"
                                                            class="custom-form clear-input d-inline-block col-lg-1"
                                                            placeholder="" onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="tensi_sis" id="pa_tensi_sis"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Sistolik"
                                                            onkeypress="return hanyaAngka(event)">
                                                        <span>/</span>
                                                        <input type="text" name="tensi_dis" id="pa_tensi_dis"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Diastolik"
                                                            onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="suhu_pa" id="pa_suhu"
                                                            class="custom-form clear-input d-inline-block col-lg-3"
                                                            placeholder="Suhu" onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="nadi_pa" id="pa_nadi"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Nadi" onkeypress="return hanyaAngka(event)">
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
                                                        <input type="text" name="nafas_pa" id="pa_nafas"
                                                            class="custom-form clear-input d-inline-block col-lg-3"
                                                            placeholder="Nafas" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">x/mnt</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Psikososial, Ekonomi -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-psikososial-ekonomi"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PSIKOSOSIAL,
                                                EKONOMI</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-psikososial-ekonomi">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td width="20%" class="bold">Status Psikologis</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="79%">
                                                    <input type="checkbox" name="sps_cemas" id="sps_cemas" value="1"
                                                        class="mr-1">Cemas
                                                    <input type="checkbox" name="sps_takut" id="sps_takut" value="1"
                                                        class="mr-1 ml-2">Takut
                                                    <input type="checkbox" name="sps_marah" id="sps_marah" value="1"
                                                        class="mr-1 ml-2">Marah
                                                    <input type="checkbox" name="sps_sedih" id="sps_sedih" value="1"
                                                        class="mr-1 ml-2">Sedih
                                                    <input type="checkbox" name="sps_bunuh_diri" id="sps_bunuh_diri"
                                                        value="1" class="mr-1 ml-2">Kecendrungan Bunuh Diri
                                                    <input type="checkbox" name="sps_lain" id="sps_lain" value="1"
                                                        class="mr-1 ml-2">Lain-lain
                                                    <input type="text" name="sps_lain_input" id="sps_lain_input"
                                                        class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                        placeholder="Masukkan lain - lain">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Status Mental</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="checkbox" name="smen_sadar" id="smen_sadar" value="1"
                                                        class="mr-1">Sadar dan Orientasi Baik
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold"></td>
                                                <td class="bold"></td>
                                                <td>
                                                    <input type="checkbox" name="smen_ada_masalah" id="smen_ada_masalah"
                                                        value="1" class="mr-1">Ada Masalah Perilaku, Sebutkan
                                                    <input type="text" name="smen_ada_masalah_input"
                                                        id="smen_ada_masalah_input"
                                                        class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                        placeholder="Sebutkan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold"></td>
                                                <td class="bold"></td>
                                                <td>
                                                    <input type="checkbox" name="smen_perilaku_kekerasan"
                                                        id="smen_perilaku_kekerasan" value="1" class="mr-1">Perilaku
                                                    Kekerasan yang dialami pasien sebelumnya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="ml-4">Pekerjaan</span></td>
                                                <td>:</td>
                                                <td><input type="text" name="pekerjaan" id="pekerjaan_pasien"
                                                        class="custom-form clear-input col-lg-3"
                                                        placeholder="Masukkan pekerjaan" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><span class="ml-4">Cara Bayar</span></td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" name="cara_bayar" id="cara_bayar_pasien"
                                                        class="custom-form clear-input col-lg-3"
                                                        placeholder="Masukkan cara bayar" readonly>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Penilaian Resiko Jatuh -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-penilaian-resiko-jatuh"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN RESIKO
                                                JATUH</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-penilaian-resiko-jatuh">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3" class="bold center">Penilaian Resiko Jatuh Anak
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="table table-bordered table-sm table-striped"
                                                    style="margin-top:-15px">
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
                                                            <td><input type="radio" name="prja_umur" id="prja_umur_1"
                                                                    value="4"
                                                                    class="mr-1 calcscoreprja calcscoreprja_0">Dibawah 3
                                                                Tahun</td>
                                                            <td class="center">4</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_umur" id="prja_umur_2"
                                                                    value="3"
                                                                    class="mr-1 calcscoreprja calcscoreprja_1">3 -
                                                                7
                                                                Tahun</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_umur" id="prja_umur_3"
                                                                    value="2"
                                                                    class="mr-1 calcscoreprja calcscoreprja_2">7 -
                                                                13
                                                                Tahun</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_umur" id="prja_umur_4"
                                                                    value="1"
                                                                    class="mr-1 calcscoreprja calcscoreprja_3">>
                                                                13
                                                                Tahun</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Kelamin</td>
                                                            <td><input type="radio" name="prja_kelamin"
                                                                    id="prja_kelamin_1" value="2"
                                                                    class="mr-1 calcscoreprja calcscoreprja_4">Laki -
                                                                Laki</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_kelamin"
                                                                    id="prja_kelamin_2" value="1"
                                                                    class="mr-1 calcscoreprja calcscoreprja_5">Perempuan
                                                            </td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">Diagnosis</td>
                                                            <td><input type="radio" name="prja_diagnosis"
                                                                    id="prja_diagnosis_1" value="4"
                                                                    class="mr-1 calcscoreprja calcscoreprja_6">Kelainan
                                                                Neurologi</td>
                                                            <td class="center">4</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_diagnosis"
                                                                    id="prja_diagnosis_2" value="3"
                                                                    class="mr-1 calcscoreprja calcscoreprja_7">Respiratori,
                                                                Dehidrasi, Anemia, Anoreksia, Syncope</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_diagnosis"
                                                                    id="prja_diagnosis_3" value="2"
                                                                    class="mr-1 calcscoreprja calcscoreprja_8">Perilaku
                                                            </td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_diagnosis"
                                                                    id="prja_diagnosis_4" value="1"
                                                                    class="mr-1 calcscoreprja calcscoreprja_9">Lain -
                                                                lain</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">Gangguan Kognitif</td>
                                                            <td><input type="radio" name="prja_gangguan_kognitif"
                                                                    id="prja_gangguan_kognitif_1" value="3"
                                                                    class="mr-1 calcscoreprja calcscoreprja_10">Keterbatasan
                                                                Daya Pikir</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_gangguan_kognitif"
                                                                    id="prja_gangguan_kognitif_2" value="2"
                                                                    class="mr-1 calcscoreprja calcscoreprja_11">Pelupa,
                                                                berkurangnya orientasi sekitar</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_gangguan_kognitif"
                                                                    id="prja_gangguan_kognitif_3" value="1"
                                                                    class="mr-1 calcscoreprja calcscoreprja_12">Dapat
                                                                menggunakan daya pikir tanpa hambatan</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">Faktor Lingkungan</td>
                                                            <td><input type="radio" name="prja_faktor_lingkungan"
                                                                    id="prja_faktor_lingkungan_1" value="4"
                                                                    class="mr-1 calcscoreprja calcscoreprja_13">Riwayat
                                                                Jatuh atau Bayi/Balita yang Ditempatkan Ditempat tidur
                                                            </td>
                                                            <td class="center">4</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_faktor_lingkungan"
                                                                    id="prja_faktor_lingkungan_2" value="3"
                                                                    class="mr-1 calcscoreprja calcscoreprja_14">Pasien
                                                                Menggunakan Alat Bantu atau Bayi/Balita dalam Ayunan
                                                            </td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_faktor_lingkungan"
                                                                    id="prja_faktor_lingkungan_3" value="2"
                                                                    class="mr-1 calcscoreprja calcscoreprja_15">Pasien
                                                                di Tempat Tidur Standar</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_faktor_lingkungan"
                                                                    id="prja_faktor_lingkungan_4" value="1"
                                                                    class="mr-1 calcscoreprja calcscoreprja_16">Area
                                                                Pasien Rawat Jalan</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">Respon Terhadap Pembedahan, Sedasi dan
                                                                Anastesi</td>
                                                            <td><input type="radio" name="prja_pembedahan"
                                                                    id="prja_pembedahan_1" value="3"
                                                                    class="mr-1 calcscoreprja calcscoreprja_17">Dalam 24
                                                                Jam</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_pembedahan"
                                                                    id="prja_pembedahan_2" value="2"
                                                                    class="mr-1 calcscoreprja calcscoreprja_18">Dalam 48
                                                                Jam</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_pembedahan"
                                                                    id="prja_pembedahan_3" value="1"
                                                                    class="mr-1 calcscoreprja calcscoreprja_19">Lebih
                                                                dari 48 Jam / Tidak Ada Respon</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">Penggunaan Obat - obatan</td>
                                                            <td><input type="radio" name="prja_obat" id="prja_obat_1"
                                                                    value="3"
                                                                    class="mr-1 calcscoreprja calcscoreprja_20">Penggunaan
                                                                Bersamaan Sedative Barbiturate, Anti Depresan, Diuretic
                                                                Narkotik</td>
                                                            <td class="center">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_obat" id="prja_obat_2"
                                                                    value="2" class="mr-1 calcscoreprja calcscoreprja_"
                                                                    21>Salah Satu Dari Obat Diatas</td>
                                                            <td class="center">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prja_obat" id="prja_obat_3"
                                                                    value="1"
                                                                    class="mr-1 calcscoreprja calcscoreprja_22">Obat -
                                                                obatan lainnya / Tanpa Obat</td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">Jumlah Skor</td>
                                                            <td class="center"><input type="number"
                                                                    name="prja_jumlah_skor" id="prja_jumlah_skor"
                                                                    class="custom-form center" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Resiko Rendah : 7 - 11 | Resiko Tinggi : >=
                                                                12</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3" class="bold center">Penilaian Resiko Jatuh
                                                            Dewasa</td>
                                                    </tr>
                                                </table>
                                                <table class="table table-sm table-striped table-bordered"
                                                    style="margin-top: -15px">
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
                                                            <td><input type="radio" name="prjd_riwayat_jatuh"
                                                                    id="prjd_riwayat_jatuh_ya" value="25" class="mr-1"
                                                                    onchange="calcscorepjd()">Ya</td>
                                                            <td class="center">25</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prjd_riwayat_jatuh"
                                                                    id="prjd_riwayat_jatuh_tidak" value="0" class="mr-1"
                                                                    onchange="calcscorepjd()" checked>Tidak</td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Diagnosis Sekunder (≥ Diagnosis Medis)</td>
                                                            <td><input type="radio" name="prjd_diagnosis_sekunder"
                                                                    id="prjd_diagnosis_sekunder_ya" value="15"
                                                                    class="mr-1" onchange="calcscorepjd()">Ya</td>
                                                            <td class="center">15</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prjd_diagnosis_sekunder"
                                                                    id="prjd_diagnosis_sekunder_tidak" value="0"
                                                                    class="mr-1" onchange="calcscorepjd()" checked>Tidak
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Alat Bantu Jalan</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="alat_bantu_jalan_1"
                                                                    id="alat_bantu_jalan_1" value="1" class="mr-1">Tidak
                                                                Ada / Kursi Roda</td>
                                                            <td><input type="radio" name="alat_bantu_jalan_1_ya"
                                                                    id="alat_bantu_jalan_1_ya" value="0"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="alat_bantu_jalan_2"
                                                                    id="alat_bantu_jalan_2" value="1" class="mr-1">Kruk
                                                                / Tongkat / Walker</td>
                                                            <td><input type="radio" name="alat_bantu_jalan_2_ya"
                                                                    id="alat_bantu_jalan_2_ya" value="15"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">15</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="alat_bantu_jalan_3"
                                                                    id="alat_bantu_jalan_3" value="1"
                                                                    class="mr-1">Berpegangan pada benda-benda disekitar
                                                                / Furniture</td>
                                                            <td><input type="radio" name="alat_bantu_jalan_3_ya"
                                                                    id="alat_bantu_jalan_3_ya" value="30"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">30</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Terpasang Infus / Heparin Lock</td>
                                                            <td><input type="radio" name="prjd_terpasang_infus"
                                                                    id="prjd_terpasang_infus_ya" value="20" class="mr-1"
                                                                    onchange="calcscorepjd()">Ya</td>
                                                            <td class="center">20</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prjd_terpasang_infus"
                                                                    id="prjd_terpasang_infus_tidak" value="0"
                                                                    class="mr-1" onchange="calcscorepjd()" checked>Tidak
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Cara Berjalan atau Berpindah</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="cara_berjalan_1"
                                                                    id="cara_berjalan_1" value="1" class="mr-1">Normal /
                                                                Bedrest / Imobilisasi</td>
                                                            <td><input type="radio" name="cara_berjalan_1_ya"
                                                                    id="cara_berjalan_1_ya" value="0"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="cara_berjalan_2"
                                                                    id="cara_berjalan_2" value="1" class="mr-1">Lemah
                                                            </td>
                                                            <td><input type="radio" name="cara_berjalan_2_ya"
                                                                    id="cara_berjalan_2_ya" value="10"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">10</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="cara_berjalan_3"
                                                                    id="cara_berjalan_3" value="1"
                                                                    class="mr-1">Terganggu
                                                            </td>
                                                            <td><input type="radio" name="cara_berjalan_3_ya"
                                                                    id="cara_berjalan_3_ya" value="20"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">20</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Status Mental</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="status_mental_1"
                                                                    id="status_mental_1" value="1" class="mr-1">Sadar
                                                                Akan Kemampuan Diri Sendiri</td>
                                                            <td><input type="radio" name="status_mental_1_ya"
                                                                    id="status_mental_1_ya" value="0"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="status_mental_2"
                                                                    id="status_mental_2" value="1" class="mr-1">Sering
                                                                Lupa akan Keterbatasan Yang dimiliki</td>
                                                            <td><input type="radio" name="status_mental_2_ya"
                                                                    id="status_mental_2_ya" value="15"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">15</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="bold">JUMLAH SKOR</td>
                                                            <td class="center"><input type="number" min="0"
                                                                    name="prjd_jumlah_skor" id="prjd_jumlah_skor"
                                                                    class="custom-form clear-input center"
                                                                    placeholder="Jumlah" value="0" readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:15px">
                                                    <tr>
                                                        <td>
                                                            <span class="bold">Keterangan</span><br>
                                                            <span class="ml-3">Tidak Beresiko : 0 - 24</span><br>
                                                            <span class="ml-3">Resiko Rendah : 25 - 50</span><br>
                                                            <span class="ml-3">Resiko Tinggi : ≥ 51</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row Data Penilaian Resiko Jatuh Lansia (Usia > 60 th) -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-penilaian-resiko-jatuh-lansia"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN RESIKO
                                                JATUH LANSIA <i>(Usia > 60 th)</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-penilaian-resiko-jatuh-lansia">
                                        <table class="table table-sm table-striped table-bordered"
                                            style="margin-top: -15px">
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
                                                    <td rowspan="2">Riwayat Jatuh</td>
                                                    <td>Apakah pasien datang ke RS karena jatuh ?</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_riwayat_jatuh"
                                                            id="prjl_riwayat_jatuh_ya" value="6" class="mr-1"
                                                            onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_riwayat_jatuh"
                                                            id="prjl_riwayat_jatuh_tidak" value="0" class="mr-1 ml-3"
                                                            checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                    <td rowspan="2">Salah satu jawabannya = 6</td>
                                                </tr>
                                                <tr>
                                                    <td>Jika Tidak, Apakah pasien mengalami jatuh dalam 2 bulan terakhir
                                                        ini ?</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_riwayat_jatuh_opt"
                                                            id="prjl_riwayat_jatuh_opt_ya" value="6" class="mr-1"
                                                            disabled onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_riwayat_jatuh_opt"
                                                            id="prjl_riwayat_jatuh_opt_tidak" value="0"
                                                            class="mr-1 ml-3" disabled checked
                                                            onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="3" class="center v-center">2.</th>
                                                    <td rowspan="3">Status Mental</td>
                                                    <td>Apakah pasien delirium ? (Tidak dapat membuat keputusan, pola
                                                        pikir tidak terorganisir, gangguan daya ingat)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_status_mental"
                                                            id="prjl_status_mental_ya" value="14" class="mr-1"
                                                            onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_status_mental"
                                                            id="prjl_status_mental_tidak" value="0" class="mr-1 ml-3"
                                                            checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                    <td rowspan="3">Salah satu jawabannya = 14</td>
                                                </tr>
                                                <tr>
                                                    <td>Apakah pasien disorientasi ? (Salah menyebutkan waktu, tempat
                                                        atau orang)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_status_mental_opt_1"
                                                            id="prjl_status_mental_opt_1_ya" value="14" class="mr-1"
                                                            onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_status_mental_opt_1"
                                                            id="prjl_status_mental_opt_1_tidak" value="0"
                                                            class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Apakah pasien mengalami agitasi ? (Ketakutan, gelisah dan cemas)
                                                    </td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_status_mental_opt_2"
                                                            id="prjl_status_mental_opt_2_ya" value="14" class="mr-1"
                                                            onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_status_mental_opt_2"
                                                            id="prjl_status_mental_opt_2_tidak" value="0"
                                                            class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="3" class="center v-center">3.</th>
                                                    <td rowspan="3">Penglihatan</td>
                                                    <td>Apakah pasien memakai kacamata ?</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_penglihatan"
                                                            id="prjl_penglihatan_ya" value="1" class="mr-1"
                                                            onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_penglihatan"
                                                            id="prjl_penglihatan_tidak" value="0" class="mr-1 ml-3"
                                                            checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                    <td rowspan="3">Salah satu jawabannya = 1</td>
                                                </tr>
                                                <tr>
                                                    <td>Apakah pasien mengeluh adanya penglihatan buram ?</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_penglihatan_opt_1"
                                                            id="prjl_penglihatan_opt_1_ya" value="1" class="mr-1"
                                                            onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_penglihatan_opt_1"
                                                            id="prjl_penglihatan_opt_1_tidak" value="0"
                                                            class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Apakah pasien mempunyai galukoma ? Katarak / degenarasi makula
                                                    </td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_penglihatan_opt_2"
                                                            id="prjl_penglihatan_opt_2_ya" value="1" class="mr-1"
                                                            onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_penglihatan_opt_2"
                                                            id="prjl_penglihatan_opt_2_tidak" value="0"
                                                            class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="center v-center">4.</th>
                                                    <td>Kebiasaan Berkemih</td>
                                                    <td>Apakah terdapat perubahan perilaku berkemih ? (Frekuensi,
                                                        urgensi, inkontinensia, nokturia)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_berkemih" id="prjl_berkemih_ya"
                                                            value="2" class="mr-1" onchange="calcscoreprjl()">Ya
                                                        <input type="radio" name="prjl_berkemih"
                                                            id="prjl_berkemih_tidak" value="0" class="mr-1 ml-3" checked
                                                            onchange="calcscoreprjl()">Tidak
                                                    </td>
                                                    <td>Salah satu jawabannya = 2</td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="4" class="center v-center">5.</th>
                                                    <td rowspan="4">Transfer dari tempat tidur kekurasi dan kembali lagi
                                                        ketempat tidur</td>
                                                    <td>Mandiri (Boleh memakai alat bantu jalan)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_transfer" id="prjl_transfer_1"
                                                            value="0" class="mr-1" checked onchange="calcscoreprjl()">0
                                                    </td>
                                                    <td rowspan="8">Jumlah nilai transfer dan mobilitas jika nilai total
                                                        0 - 3 = 0, nilai total 4 - 6 = 7</td>
                                                </tr>
                                                <tr>
                                                    <td>Memerlukan sedikit bantuan (1 orang) / dalam pengawasan</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_transfer" id="prjl_transfer_2"
                                                            value="1" class="mr-1" onchange="calcscoreprjl()">1
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Memerlukan bantuan yang nyata (2 orang)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_transfer" id="prjl_transfer_3"
                                                            value="2" class="mr-1" onchange="calcscoreprjl()">2
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tidak dapat duduk dengan seimbang, perlu bantuan total</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_transfer" id="prjl_transfer_4"
                                                            value="3" class="mr-1" onchange="calcscoreprjl()">3
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="4" class="center v-center">6.</th>
                                                    <td rowspan="4">Mobilitas</td>
                                                    <td>Mandiri (Boleh memakai alat bantu jalan)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_1"
                                                            value="0" class="mr-1" checked onchange="calcscoreprjl()">0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Berjalan dengan bantuan 1 orang (verbal / fisik)</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_2"
                                                            value="1" class="mr-1" onchange="calcscoreprjl()">1
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Menggunakan kursi roda</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_3"
                                                            value="2" class="mr-1" onchange="calcscoreprjl()">2
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Imobilisasi</td>
                                                    <td class="center">
                                                        <input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_4"
                                                            value="3" class="mr-1" onchange="calcscoreprjl()">3
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="bold center">TOTAL</td>
                                                    <td><input type="number" name="prjl_jumlah" id="prjl_jumlah"
                                                            class="custom-form clear-input center" placeholder="Jumlah"
                                                            readonly></td>
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
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-penilaian-tingkat-nyeri"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN TINGKAT
                                                NYERI
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-penilaian-tingkat-nyeri">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td width="10%" class="bold">Skala Nyeri</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="34%"><input type="text" name="skala_nyeri_keperawatan"
                                                        id="skala_nyeri_keperawatan" class="custom-form clear-input"
                                                        placeholder="Masukkan skala nyeri"></td>
                                                <td></td>
                                                <td width="25%" class="bold">Kualitas Nyeri</td>
                                                <td width="1%" class="bold">:</td>
                                                <td width="39%"><input type="text" name="kualitas_nyeri_keperawatan"
                                                        id="kualitas_nyeri_keperawatan" class="custom-form clear-input"
                                                        placeholder="Masukkan kualitas nyeri"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Frekuensi Nyeri</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="frekuensi_nyeri_keperawatan"
                                                        id="frekuensi_nyeri_keperawatan" class="custom-form clear-input"
                                                        placeholder="Masukkan frekuensi nyeri"></td>
                                                <td></td>
                                                <td class="bold">Faktor - Faktor yang Memperberat Nyeri</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="pemberat_nyeri_keperawatan"
                                                        id="pemberat_nyeri_keperawatan" class="custom-form clear-input"
                                                        placeholder="Masukkan Faktor Memperberat nyeri"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Lama Nyeri</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="lama_nyeri_keperawatan"
                                                        id="lama_nyeri_keperawatan" class="custom-form clear-input"
                                                        placeholder="Masukkan lama nyeri"></td>
                                                <td></td>
                                                <td class="bold">Faktor - Faktor yang Mengurangi Nyeri</td>
                                                <td class="bold">:</td>
                                                <td><input type="text" name="pengurang_nyeri_keperawatan"
                                                        id="pengurang_nyeri_keperawatan" class="custom-form clear-input"
                                                        placeholder="Masukkan Faktor Mengurangi nyeri"></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Skala Early Warning System (News) -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-skala-early-warning-system"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>SKALA EARLY
                                                WARNING SYSTEM (EWS)
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-skala-early-warning-system">
                                        <table class="table table-sm" style="margin-top: -15px">
                                            <tr>
                                                <td width="75%">
                                                    <table class="table table-sm table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="center" colspan="10"><b>NEWS</b></th>
                                                            </tr>
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
                                                                <th width="10%" class="center"><b>Blue Kriteria</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Desclaimer -->
                                                            <!-- Nilai value setelah dash itu ada lah urut sesuai parameter nya... yang dipakai adalah nilai awal nya -->
                                                            <tr>
                                                                <td class="center">1.</td>
                                                                <td>Laju Respirasi /Menit</td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_respirasi" id="skalanews_1_1"
                                                                        value="3_1" class="mr-1 skalanews">6-8</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_respirasi" id="skalanews_1_2"
                                                                        value="1_2" class="mr-1 skalanews">9-11</td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_respirasi" id="skalanews_1_3"
                                                                        value="0_3" class="mr-1 skalanews">12-20</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_respirasi" id="skalanews_1_4"
                                                                        value="2_4" class="mr-1 skalanews">21-24</td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_respirasi" id="skalanews_1_5"
                                                                        value="3_5" class="mr-1 skalanews">25-34</td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_respirasi" id="skalanews_1_6"
                                                                        value="bk_6" class="mr-1 skalanews">≤5 / ≥35
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">2.</td>
                                                                <td>Saturasi O₂ (%)</td>
                                                                <td class="center"><input type="radio" name="saturasi"
                                                                        id="skalanews_2_1" value="3_1"
                                                                        class="mr-1 skalanews">≤91</td>
                                                                <td class="center"><input type="radio" name="saturasi"
                                                                        id="skalanews_2_2" value="2_2"
                                                                        class="mr-1 skalanews">92-93</td>
                                                                <td class="center"><input type="radio" name="saturasi"
                                                                        id="skalanews_2_3" value="1_3"
                                                                        class="mr-1 skalanews">94-95</td>
                                                                <td class="center"><input type="radio" name="saturasi"
                                                                        id="skalanews_2_4" value="0_4"
                                                                        class="mr-1 skalanews">≥96</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">3.</td>
                                                                <td>Suplemen O₂ (%)</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="suplemen"
                                                                        id="skalanews_3_1" value="2_1"
                                                                        class="mr-1 skalanews">Ya</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="suplemen"
                                                                        id="skalanews_3_2" value="0_2"
                                                                        class="mr-1 skalanews">Tidak</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">4.</td>
                                                                <td>Temperatur (°C)</td>
                                                                <td class="center"><input type="radio" name="temperatur"
                                                                        id="skalanews_4_1" value="3_1"
                                                                        class="mr-1 skalanews">≤35</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="temperatur"
                                                                        id="skalanews_4_2" value="1_2"
                                                                        class="mr-1 skalanews">35.1-36</td>
                                                                <td class="center"><input type="radio" name="temperatur"
                                                                        id="skalanews_4_3" value="0_3"
                                                                        class="mr-1 skalanews">36.1-38</td>
                                                                <td class="center"><input type="radio" name="temperatur"
                                                                        id="skalanews_4_4" value="1_4"
                                                                        class="mr-1 skalanews">38.1-39</td>
                                                                <td class="center"><input type="radio" name="temperatur"
                                                                        id="skalanews_4_5" value="2_5"
                                                                        class="mr-1 skalanews">≥39</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">5.</td>
                                                                <td>TDS (mmHg)</td>
                                                                <td class="center"><input type="radio" name="tds"
                                                                        id="skalanews_5_1" value="3_1"
                                                                        class="mr-1 skalanews">71-90</td>
                                                                <td class="center"><input type="radio" name="tds"
                                                                        id="skalanews_5_2" value="2_2"
                                                                        class="mr-1 skalanews">91-100</td>
                                                                <td class="center"><input type="radio" name="tds"
                                                                        id="skalanews_5_3" value="1_3"
                                                                        class="mr-1 skalanews">101-110</td>
                                                                <td class="center"><input type="radio" name="tds"
                                                                        id="skalanews_5_4" value="0_4"
                                                                        class="mr-1 skalanews">111-180</td>
                                                                <td class="center"><input type="radio" name="tds"
                                                                        id="skalanews_5_5" value="1_5"
                                                                        class="mr-1 skalanews">181-220</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="tds"
                                                                        id="skalanews_5_6" value="3_6"
                                                                        class="mr-1 skalanews">≥221</td>
                                                                <td class="center"><input type="radio" name="tds"
                                                                        id="skalanews_5_7" value="bk_7"
                                                                        class="mr-1 skalanews">≤70</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">6.</td>
                                                                <td>Laju Jantung /Menit</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_jantung" id="skalanews_6_1"
                                                                        value="1_2" class="mr-1 skalanews">41-50</td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_jantung" id="skalanews_6_2"
                                                                        value="0_2" class="mr-1 skalanews">51-90</td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_jantung" id="skalanews_6_3"
                                                                        value="1_3" class="mr-1 skalanews">91-110</td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_jantung" id="skalanews_6_4"
                                                                        value="2_4" class="mr-1 skalanews">111-130</td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_jantung" id="skalanews_6_5"
                                                                        value="3_5" class="mr-1 skalanews">131-140</td>
                                                                <td class="center"><input type="radio"
                                                                        name="laju_jantung" id="skalanews_6_6"
                                                                        value="bk_8" class="mr-1 skalanews">≤40 / ≥140
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">7.</td>
                                                                <td>Kesadaran</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="kesadaran"
                                                                        id="skalanews_7_1" value="0_1"
                                                                        class="mr-1 skalanews">A</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="kesadaran"
                                                                        id="skalanews_7_2" value="3_2"
                                                                        class="mr-1 skalanews">V & P</td>
                                                                <td class="center"><input type="radio" name="kesadaran"
                                                                        id="skalanews_7_3" value="bk_9"
                                                                        class="mr-1 skalanews">U</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="10"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><b>TOTAL</b></td>
                                                                <td colspan="8">
                                                                    <input type="radio" name="total_skalanews"
                                                                        id="total_skalanews_1" class="mr-1"
                                                                        value="Putih"><i class="fas fa-fw fa-square"
                                                                        style="color: white"></i><b>Putih (0)</b>
                                                                    <input type="radio" name="total_skalanews"
                                                                        id="total_skalanews_2" class="mr-1 ml-3"
                                                                        value="Hijau"><i class="fas fa-fw fa-square"
                                                                        style="color: green"></i><b>Hijau (1-4)</b>
                                                                    <input type="radio" name="total_skalanews"
                                                                        id="total_skalanews_3" class="mr-1 ml-3"
                                                                        value="Kuning"><i class="fas fa-fw fa-square"
                                                                        style="color: yellow"></i><b>Kuning (5-6)</b>
                                                                    <input type="radio" name="total_skalanews"
                                                                        id="total_skalanews_4" class="mr-1 ml-3"
                                                                        value="Merah"><i class="fas fa-fw fa-square"
                                                                        style="color: red"></i><b>Merah (≥7/1 Parameter
                                                                        Blue Kriteria)</b>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="25%" style="vertical-align: top !important;">
                                                    <span class="bold">Keterangan :</span><br>
                                                    <span>A = Alert (Sadar Penuh)</span><br>
                                                    <span>V = Verbal (Respon dengan Rangsang Suara) Somnolen, Dapat
                                                        Ditenangkan</span><br>
                                                    <span>P = Pain (Respon dengan Rangsang Nyeri) Letargi, Gelisah,
                                                        Penurunan Respon Nyeri</span><br>
                                                    <span>U = Unrespon</span>
                                                </td>
                                            </tr>
                                        </table>

                                        <hr>

                                        <table class="table table-sm table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="center" colspan="8"><b>PEWS</b></th>
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
                                                    <td>Suhu</td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="suhu2"
                                                            id="skalapews_1_1" value="2_1"
                                                            class="mr-1 skalapews pews_suhu_1_1">
                                                        < 35</td>
                                                    <td class="center"><input type="radio" name="suhu2"
                                                            id="skalapews_1_2" value="1_2"
                                                            class="mr-1 skalapews pews_suhu_1_2">35.1-36
                                                    </td>
                                                    <td class="center"><input type="radio" name="suhu2"
                                                            id="skalapews_1_3" value="0_3"
                                                            class="mr-1 skalapews pews_suhu_1_3">36.1-38</td>
                                                    <td class="center"><input type="radio" name="suhu2"
                                                            id="skalapews_1_4" value="1_4"
                                                            class="mr-1 skalapews pews_suhu_1_4">38.1-38.5</td>
                                                    <td class="center"><input type="radio" name="suhu2"
                                                            id="skalapews_1_5" value="2_5"
                                                            class="mr-1 skalapews pews_suhu_1_5">> 38.5</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Pernafasan</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">
                                                            < 28 Hari</span>
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_2_1" value="3_1"
                                                            class="mr-1 skalapews pews_pernafasan_2_1">
                                                        < 20</td>
                                                    <td>
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_2_2" value="1_2"
                                                            class="mr-1 skalapews pews_pernafasan_2_2">30-39</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_2_3" value="0_3"
                                                            class="mr-1 skalapews pews_pernafasan_2_3">40-60</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_2_4" value="3_4"
                                                            class="mr-1 skalapews pews_pernafasan_2_4">> 60</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">1-12 Bulan</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_3_1" value="3_5"
                                                            class="mr-1 skalapews pews_pernafasan_3_1">≤ 20</td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_3_2" value="1_6"
                                                            class="mr-1 skalapews pews_pernafasan_3_2">20-29</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_3_3" value="0_7"
                                                            class="mr-1 skalapews pews_pernafasan_3_3">30-40</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_3_4" value="1_8"
                                                            class="mr-1 skalapews pews_pernafasan_3_4">41-50</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_3_5" value="2_9"
                                                            class="mr-1 skalapews pews_pernafasan_3_5">51-60</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_3_6" value="3_10"
                                                            class="mr-1 skalapews pews_pernafasan_3_6">≥ 60</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">13-36 Bulan</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_4_1" value="3_11"
                                                            class="mr-1 skalapews pews_pernafasan_4_1">
                                                        < 20</td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_4_2" value="0_12"
                                                            class="mr-1 skalapews pews_pernafasan_4_2">20-30</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_4_3" value="1_13"
                                                            class="mr-1 skalapews pews_pernafasan_4_3">31-50</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_4_4" value="2_14"
                                                            class="mr-1 skalapews pews_pernafasan_4_4">51-60</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_4_5" value="3_15"
                                                            class="mr-1 skalapews pews_pernafasan_4_5">> 60</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">4-6 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_5_1" value="3_16"
                                                            class="mr-1 skalapews pews_pernafasan_5_1">
                                                        < 20</td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_5_2" value="0_17"
                                                            class="mr-1 skalapews pews_pernafasan_5_2">20-30</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_5_3" value="1_18"
                                                            class="mr-1 skalapews pews_pernafasan_5_3">31-50</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_5_4" value="2_19"
                                                            class="mr-1 skalapews pews_pernafasan_5_4">51-60</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_5_5" value="3_20"
                                                            class="mr-1 skalapews pews_pernafasan_5_5">> 60</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">7-12 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_6_1" value="3_21"
                                                            class="mr-1 skalapews pews_pernafasan_6_1">
                                                        < 10</td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_6_2" value="0_22"
                                                            class="mr-1 skalapews pews_pernafasan_6_2">10-20</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_6_3" value="1_23"
                                                            class="mr-1 skalapews pews_pernafasan_6_3">21-30</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_6_4" value="2_24"
                                                            class="mr-1 skalapews pews_pernafasan_6_4">31-40</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_6_5" value="3_25"
                                                            class="mr-1 skalapews pews_pernafasan_6_5">> 40</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">13-18 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_7_1" value="3_26"
                                                            class="mr-1 skalapews pews_pernafasan_7_1">
                                                        < 10</td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_7_2" value="0_27"
                                                            class="mr-1 skalapews pews_pernafasan_7_2">10-20</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_7_3" value="1_28"
                                                            class="mr-1 skalapews pews_pernafasan_7_3">21-30</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_7_4" value="2_29"
                                                            class="mr-1 skalapews pews_pernafasan_7_4">31-40</td>
                                                    <td class="center"><input type="radio" name="pernafasan2"
                                                            id="skalapews_7_5" value="3_30"
                                                            class="mr-1 skalapews pews_pernafasan_7_5">> 40</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="subpernafasan2"
                                                            id="skalapews_8_1" value="0_1"
                                                            class="mr-1 skalapews pews_subpernafasan_8_1">Tidak Retraksi
                                                    </td>
                                                    <td class="center"><input type="radio" name="subpernafasan2"
                                                            id="skalapews_8_2" value="1_2"
                                                            class="mr-1 skalapews pews_subpernafasan_8_2">Otot Bantu
                                                        Nafas</td>
                                                    <td class="center"><input type="radio" name="subpernafasan2"
                                                            id="skalapews_8_3" value="2_3"
                                                            class="mr-1 skalapews pews_subpernafasan_8_3">Retraksi</td>
                                                    <td class="center"><input type="radio" name="subpernafasan2"
                                                            id="skalapews_8_4" value="3_4"
                                                            class="mr-1 skalapews pews_subpernafasan_8_4">Merintih</td>
                                                </tr>
                                                <tr>
                                                    <td>Alat Bantu O₂</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="alat_bantu2"
                                                            id="skalapews_9_1" value="0_1"
                                                            class="mr-1 skalapews pews_alat_bantu_9_1">No</td>
                                                    <td class="center"><input type="radio" name="alat_bantu2"
                                                            id="skalapews_9_2" value="1_2"
                                                            class="mr-1 skalapews pews_alat_bantu_9_2">> 3L /Menit</td>
                                                    <td class="center"><input type="radio" name="alat_bantu2"
                                                            id="skalapews_9_3" value="2_3"
                                                            class="mr-1 skalapews pews_alat_bantu_9_3">> 6L /Menit</td>
                                                    <td class="center"><input type="radio" name="alat_bantu2"
                                                            id="skalapews_9_4" value="3_4"
                                                            class="mr-1 skalapews pews_alat_bantu_9_4">> 8L /Menit</td>
                                                </tr>
                                                <tr>
                                                    <td>Saturasi O₂</td>
                                                    <td class="center"><input type="radio" name="saturasi2"
                                                            id="skalapews_10_1" value="3_1"
                                                            class="mr-1 skalapews pews_saturasi_10_1">≤ 85</td>
                                                    <td class="center"><input type="radio" name="saturasi2"
                                                            id="skalapews_10_2" value="2_2"
                                                            class="mr-1 skalapews pews_saturasi_10_2">86-89</td>
                                                    <td class="center"><input type="radio" name="saturasi2"
                                                            id="skalapews_10_3" value="1_3"
                                                            class="mr-1 skalapews pews_saturasi_10_3">90-93</td>
                                                    <td class="center"><input type="radio" name="saturasi2"
                                                            id="skalapews_10_4" value="0_4"
                                                            class="mr-1 skalapews pews_saturasi_10_4">≥ 94</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Nadi</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">
                                                            < 28 Hari</span>
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_11_1" value="3_1"
                                                            class="mr-1 skalapews pews_nadi_11_1">
                                                        < 80</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_11_2" value="2_2"
                                                            class="mr-1 skalapews pews_nadi_11_2">81-90</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_11_3" value="1_3"
                                                            class="mr-1 skalapews pews_nadi_11_3">91-99</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_11_4" value="0_4"
                                                            class="mr-1 skalapews pews_nadi_11_4">100-180</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_11_5" value="1_5"
                                                            class="mr-1 skalapews pews_nadi_11_5">181-190</td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_11_6" value="3_6"
                                                            class="mr-1 skalapews pews_nadi_11_6">≥ 200</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">1-12 Bulan</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_12_1" value="3_7"
                                                            class="mr-1 skalapews pews_nadi_12_1">
                                                        < 90</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_12_2" value="2_8"
                                                            class="mr-1 skalapews pews_nadi_12_2">90-99
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_12_3" value="1_9"
                                                            class="mr-1 skalapews pews_nadi_12_3">100-109</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_12_4" value="0_10"
                                                            class="mr-1 skalapews pews_nadi_12_4">110-160</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_12_5" value="1_11"
                                                            class="mr-1 skalapews pews_nadi_12_5">161-170</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_12_6" value="2_12"
                                                            class="mr-1 skalapews pews_nadi_12_6">171-190</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_12_7" value="3_13"
                                                            class="mr-1 skalapews pews_nadi_12_7">≥ 190</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">13-36 Bulan</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_13_1" value="3_14"
                                                            class="mr-1 skalapews pews_nadi_13_1">≤ 70</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_13_2" value="2_15"
                                                            class="mr-1 skalapews pews_nadi_13_2">70-79</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_13_3" value="1_16"
                                                            class="mr-1 skalapews pews_nadi_13_3">80-89</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_13_4" value="0_17"
                                                            class="mr-1 skalapews pews_nadi_13_4">90-140</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_13_5" value="1_18"
                                                            class="mr-1 skalapews pews_nadi_13_5">141-160</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_13_6" value="2_19"
                                                            class="mr-1 skalapews pews_nadi_13_6">161-170</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_13_7" value="3_20"
                                                            class="mr-1 skalapews pews_nadi_13_7">> 170</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">4-6 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_14_1" value="3_21"
                                                            class="mr-1 skalapews pews_nadi_14_1">
                                                        < 60</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_14_2" value="2_22"
                                                            class="mr-1 skalapews pews_nadi_14_2">70-79
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_14_3" value="1_23"
                                                            class="mr-1 skalapews pews_nadi_14_3">80-89</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_14_4" value="0_24"
                                                            class="mr-1 skalapews pews_nadi_14_4">80-120</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_14_5" value="1_25"
                                                            class="mr-1 skalapews pews_nadi_14_5">121-140</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_14_6" value="2_26"
                                                            class="mr-1 skalapews pews_nadi_14_6">141-160</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_14_7" value="3_27"
                                                            class="mr-1 skalapews pews_nadi_14_7">> 160</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">7-12 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_15_1" value="3_28"
                                                            class="mr-1 skalapews pews_nadi_15_1">
                                                        < 60</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_15_2" value="2_29"
                                                            class="mr-1 skalapews pews_nadi_15_2">60-69
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_15_3" value="1_30"
                                                            class="mr-1 skalapews pews_nadi_15_3">70-79</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_15_4" value="0_31"
                                                            class="mr-1 skalapews pews_nadi_15_4">55-100</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_15_5" value="1_32"
                                                            class="mr-1 skalapews pews_nadi_15_5">101-120</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_15_6" value="2_33"
                                                            class="mr-1 skalapews pews_nadi_15_6">121-140</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_15_7" value="3_34"
                                                            class="mr-1 skalapews pews_nadi_15_7">> 140</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">13-18 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_16_1" value="3_35"
                                                            class="mr-1 skalapews pews_nadi_16_1">
                                                        < 60</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_16_2" value="2_36"
                                                            class="mr-1 skalapews pews_nadi_16_2">60-69
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_16_3" value="1_37"
                                                            class="mr-1 skalapews pews_nadi_16_3">70-79</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_16_4" value="0_38"
                                                            class="mr-1 skalapews pews_nadi_16_4">55-100</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_16_5" value="1_39"
                                                            class="mr-1 skalapews pews_nadi_16_5">101-120</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_16_6" value="2_40"
                                                            class="mr-1 skalapews pews_nadi_16_6">121-140</td>
                                                    <td class="center"><input type="radio" name="nadi2"
                                                            id="skalapews_16_7" value="3_41"
                                                            class="mr-1 skalapews pews_nadi_16_7">> 140</td>
                                                </tr>
                                                <tr>
                                                    <td>Warna Kulit</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="warna_kulit2"
                                                            id="skalapews_17_1" value="0_1"
                                                            class="mr-1 skalapews pews_warna_kulit_17_1">Tidak Sianosis
                                                        /CRT < 2 S</td>
                                                    <td>
                                                    </td>
                                                    <td class="center"><input type="radio" name="warna_kulit2"
                                                            id="skalapews_17_2" value="2_2"
                                                            class="mr-1 skalapews pews_warna_kulit_17_2">Tampak Sianotik
                                                        /CRT > 2 S</td>
                                                    <td class="center"><input type="radio" name="warna_kulit2"
                                                            id="skalapews_17_3" value="3_3"
                                                            class="mr-1 skalapews pews_warna_kulit_17_3">Sianotik dan
                                                        Motled /CRT > 5 S</td>
                                                </tr>
                                                <tr>
                                                    <td>TDS</td>
                                                    <td class="center"><input type="radio" name="tds2"
                                                            id="skalapews_18_1" value="3_1"
                                                            class="mr-1 skalapews pews_tds_18_1">≤ 80</td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="tds2"
                                                            id="skalapews_18_2" value="1_2"
                                                            class="mr-1 skalapews pews_tds_18_2">80-89</td>
                                                    <td class="center"><input type="radio" name="tds2"
                                                            id="skalapews_18_3" value="0_3"
                                                            class="mr-1 skalapews pews_tds_18_3">90-119</td>
                                                    <td class="center"><input type="radio" name="tds2"
                                                            id="skalapews_18_4" value="1_4"
                                                            class="mr-1 skalapews pews_tds_18_4">120-129</td>
                                                    <td class="center"><input type="radio" name="tds2"
                                                            id="skalapews_18_5" value="2_5"
                                                            class="mr-1 skalapews pews_tds_18_5">130-139</td>
                                                    <td class="center"><input type="radio" name="tds2"
                                                            id="skalapews_18_6" value="3_6"
                                                            class="mr-1 skalapews pews_tds_18_6">> 140</td>
                                                </tr>
                                                <tr>
                                                    <td>Kesadaran</td>
                                                    <td class="center"><input type="radio" name="kesadaran2"
                                                            id="skalapews_19_1" value="3_1"
                                                            class="mr-1 skalapews pews_kesadaran_19_1">P/U</td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="kesadaran2"
                                                            id="skalapews_19_2" value="1_2"
                                                            class="mr-1 skalapews pews_kesadaran_19_2">V</td>
                                                    <td class="center"><input type="radio" name="kesadaran2"
                                                            id="skalapews_19_3" value="0_3"
                                                            class="mr-1 skalapews pews_kesadaran_19_3">A</td>
                                                    <td class="center"><input type="radio" name="kesadaran2"
                                                            id="skalapews_19_4" value="1_4"
                                                            class="mr-1 skalapews pews_kesadaran_19_4">V</td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="kesadaran2"
                                                            id="skalapews_19_5" value="3_5"
                                                            class="mr-1 skalapews pews_kesadaran_19_5">P/U</td>
                                                </tr>
                                                <tr>
                                                    <td><b>TOTAL</b></td>
                                                    <td colspan="7">
                                                        <input type="radio" name="total_skalapews"
                                                            id="total_skalapews_1" class="mr-1 ml-3" value="Hijau"><i
                                                            class="fas fa-fw fa-square"
                                                            style="color: green"></i><b>Hijau (0-2)</b>
                                                        <input type="radio" name="total_skalapews"
                                                            id="total_skalapews_2" class="mr-1 ml-3" value="Kuning"><i
                                                            class="fas fa-fw fa-square"
                                                            style="color: yellow"></i><b>Kuning (3-4)</b>
                                                        <input type="radio" name="total_skalapews"
                                                            id="total_skalapews_3" class="mr-1 ml-3" value="Merah"><i
                                                            class="fas fa-fw fa-square" style="color: red"></i><b>Merah
                                                            (≥5/3 Pada salah satu parameter)</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Row Data Pengkajian Spiritual -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-pengkajian-spiritual"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN
                                                SPIRITUAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pengkajian-spiritual">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3">Kegiatan keagamaan yang biasa dilakukan : <input
                                                        type="text" name="kegiatan_keagamaan" id="kegiatan_keagamaan"
                                                        class="custom-form clear-input"
                                                        placeholder="Masukkan Kegiatan Keagamaan"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Kemampuan beribadah <b>(Khusus Muslim)</b></td>
                                            </tr>
                                            <tr>
                                                <td width="20%"><span class="ml-4">Wajib Ibadah</span></td>
                                                <td wdith="1%">:</td>
                                                <td width="79%">
                                                    <input type="radio" name="wajib_ibadah" id="wajib_ibadah_baligh"
                                                        value="Baligh" class="mr-1">Baligh
                                                    <input type="radio" name="wajib_ibadah" id="wajib_ibadah_belum"
                                                        value="Belum Baligh" class="mr-1 ml-2">Belum Baligh
                                                    <input type="radio" name="wajib_ibadah" id="wajib_ibadah_halangan"
                                                        value="Halangan" class="mr-1 ml-2">Halangan Lain
                                                    <input type="text" name="wajib_ibadah_halangan_input"
                                                        id="wajib_ibadah_halangan_input"
                                                        class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                        placeholder="Masukkan halangan lain">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="ml-4">Thaharoh</span></td>
                                                <td>:</td>
                                                <td>
                                                    <input type="radio" name="thaharoh" id="thaharoh_berwudhu"
                                                        value="Berwudhu" class="mr-1">Berwudhu
                                                    <input type="radio" name="thaharoh" id="thaharoh_tayamum"
                                                        value="Tayamum" class="mr-1 ml-2">Tayamum
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="ml-4">Sholat</span></td>
                                                <td>:</td>
                                                <td>
                                                    <input type="radio" name="sholat" id="sholat_berdiri"
                                                        value="Berdiri" class="mr-1">Berdiri
                                                    <input type="radio" name="sholat" id="sholat_duduk" value="Duduk"
                                                        class="mr-1 ml-2">Duduk
                                                    <input type="radio" name="sholat" id="sholat_berbaring"
                                                        value="Berbaring" class="mr-1 ml-2">Berbaring
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Status Nutisi dan Status Fungsional -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-status-nutrisi-fungsional"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>STATUS NUTRISI DAN
                                                STATUS FUNGSIONAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-status-nutrisi-fungsional">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold">STATUS NUTRISI</td>
                                                <td></td>
                                                <td colspan="3" class="center bold">STATUS FUNGSIONAL</td>
                                            </tr>
                                            <tr>
                                                <td width="20%" class="bold">Adakah Penurunan Berat Badan</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="39%">
                                                    <input type="radio" name="penurunan_bb" id="penurunan_bb_tidak"
                                                        class="mr-1" value="1">Tidak
                                                    <input type="radio" name="penurunan_bb" id="penurunan_bb_ya"
                                                        class="mr-1 ml-2" value="1">Ya,
                                                    <input type="text" name="ket_penurunan_bb" id="ket_penurunan_bb"
                                                        class="custom-form d-inline-block col-lg-5">&nbsp;Kg
                                                </td>
                                                <td></td>
                                                <td width="50%">
                                                    <input type="checkbox" name="sf_mandiri" id="sf_mandiri" value="1"
                                                        class="mr-1">Mandiri
                                                    <input type="checkbox" name="sf_perlu_bantuan" id="sf_perlu_bantuan"
                                                        value="1" class="mr-1 ml-2">Perlu Bantuan <br>
                                                    <input type="checkbox" name="sf_ketergantungan"
                                                        id="sf_ketergantungan" value="1" class="mr-1">Ketergantungan
                                                    total, dilaporkan ke dokter pukul
                                                    <input type="time" name="ket_sf_ketergantungan"
                                                        id="ket_sf_ketergantungan"
                                                        class="custom-form d-inline-block col-lg-3 clear-input ml-2">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Masalah Keperawatan -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-masalah-keperawatan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>MASALAH
                                                KEPERAWATAN
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-masalah-keperawatan">
                                        <table class="table table-sm table-striped" style="margin-top: -15px">
                                            <tr>
                                                <td width="33%"><input type="checkbox" name="masalah_keperawatan_1"
                                                        id="masalah_keperawatan_1" class="mr-1" value="1">Bersihan Jalan
                                                    Nafas Tidak Efektif</td>
                                                <td width="33%"><input type="checkbox" name="masalah_keperawatan_2"
                                                        id="masalah_keperawatan_2" class="mr-1" value="1">Diare</td>
                                                <td width="33%"><input type="checkbox" name="masalah_keperawatan_3"
                                                        id="masalah_keperawatan_3" class="mr-1" value="1">Ansietas</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_4"
                                                        id="masalah_keperawatan_4" class="mr-1" value="1">Pola Nafas
                                                    Tidak Efektif</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_5"
                                                        id="masalah_keperawatan_5" class="mr-1" value="1">Intoleransi
                                                    Aktivitas</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_6"
                                                        id="masalah_keperawatan_6" class="mr-1" value="1">Berduka</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_7"
                                                        id="masalah_keperawatan_7" class="mr-1" value="1">Gangguan
                                                    Pertukaran Gas</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_8"
                                                        id="masalah_keperawatan_8" class="mr-1" value="1">Gangguan
                                                    Mobilitas Fisik</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_9"
                                                        id="masalah_keperawatan_9" class="mr-1" value="1">Gangguan
                                                    Interaksi Sosial</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_10"
                                                        id="masalah_keperawatan_10" class="mr-1" value="1">Gangguan
                                                    Ventilasi Spontan</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_11"
                                                        id="masalah_keperawatan_11" class="mr-1" value="1">Penurunan
                                                    Kapasitas Adaptif Intrakranial</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_12"
                                                        id="masalah_keperawatan_12" class="mr-1" value="1">Risiko Cedera
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_13"
                                                        id="masalah_keperawatan_13" class="mr-1" value="1">Penurunan
                                                    Curah Jantung</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_14"
                                                        id="masalah_keperawatan_14" class="mr-1" value="1">Nyeri Akut
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_15"
                                                        id="masalah_keperawatan_15" class="mr-1" value="1">Risiko
                                                    Aspirasi</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_16"
                                                        id="masalah_keperawatan_16" class="mr-1" value="1">Perfusi
                                                    Perifer Tidak Efektif</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_17"
                                                        id="masalah_keperawatan_17" class="mr-1" value="1">Nyeri Kronis
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_18"
                                                        id="masalah_keperawatan_18" class="mr-1" value="1">Risiko
                                                    Pendarahan</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_19"
                                                        id="masalah_keperawatan_19" class="mr-1" value="1">Nausea</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_20"
                                                        id="masalah_keperawatan_20" class="mr-1" value="1">Nyeri
                                                    Melahirkan</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_21"
                                                        id="masalah_keperawatan_21" class="mr-1" value="1">Risiko Syok
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_22"
                                                        id="masalah_keperawatan_22" class="mr-1" value="1">Defisit
                                                    Nutrisi</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_23"
                                                        id="masalah_keperawatan_23" class="mr-1" value="1">Defisit
                                                    Perawatan Diri</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_24"
                                                        id="masalah_keperawatan_24" class="mr-1" value="1">Risiko Jatuh
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_25"
                                                        id="masalah_keperawatan_25" class="mr-1" value="1">Hipervolemia
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_26"
                                                        id="masalah_keperawatan_26" class="mr-1" value="1">Hipertermia
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_27"
                                                        id="masalah_keperawatan_27" class="mr-1" value="1">Risiko Luka
                                                    Tekan</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_28"
                                                        id="masalah_keperawatan_28" class="mr-1" value="1">Hipovolemia
                                                </td>
                                                <td><input type="checkbox" name="masalah_keperawatan_29"
                                                        id="masalah_keperawatan_29" class="mr-1" value="1">Hipertermi
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="masalah_keperawatan_30"
                                                        id="masalah_keperawatan_30" class="mr-1" value="1">Lain-lain
                                                    <input type="text" name="masalah_keperawatan_lain_input"
                                                        id="masalah_keperawatan_lain_input"
                                                        class="custom-form clear-input d-inline-block col-lg-6 disabled"
                                                        placeholder="Masukkan lain - lain">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_31"
                                                        id="masalah_keperawatan_31" class="mr-1"
                                                        value="1">Ketidakstabilan
                                                    Kadar Glukosa Darah</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_32"
                                                        id="masalah_keperawatan_32" class="mr-1" value="1">Ketegangan
                                                    Peran Pemberi Asuhan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="masalah_keperawatan_33"
                                                        id="masalah_keperawatan_33" class="mr-1" value="1">Gangguan
                                                    Eliminasi Urin</td>
                                                <td><input type="checkbox" name="masalah_keperawatan_34"
                                                        id="masalah_keperawatan_34" class="mr-1" value="1">Resiko
                                                    Gangguan Integritas Kulit / Jaringan</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Row Data Verifikasi -->
                                    <table class="table table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td width="50%" class="bold center">Nama Perawat IGD dan Tanda Tangan</td>
                                            <td width="50%" class="bold center">Verifikasi DPJP dan Tanda Tangan</td>
                                        </tr>
                                        <tr>
                                            <td class="center"><input type="text" name="perawat_igd" id="perawat_igd"
                                                    class="select2c-input"></td>
                                            <td class="center"><input type="text" name="verifikasi_dpjp_2"
                                                    id="verifikasi_dpjp_2" class="select2c-input"></td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <input type="checkbox" name="ttd_perawat_igd" id="ttd_perawat_igd"
                                                    value="1" class="custom-form col-lg-1 mx-auto">
                                                <?= digitalSignature('ttd_perawat_igd_verified') ?>
                                            </td>
                                            <td class="center">
                                                <input type="checkbox" name="ttd_verifikasi_dpjp_2"
                                                    id="ttd_verifikasi_dpjp_2" value="1"
                                                    class="custom-form col-lg-1 mx-auto">
                                                <?= digitalSignature('ttd_verifikasi_dpjp_2_verified') ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content -->
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiPengkajianAwalIGD()" id="btn_simpan"><i
                        class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->