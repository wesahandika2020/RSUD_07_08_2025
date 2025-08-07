<!-- // PRJODG -->
<script>
   
    $('#btn-expand-all-pengkajian-obstetri').click(function() {
        $('.multi-collapse').addClass('show');
    });

    $('#btn-collapse-all-pengkajian-obstetri').click(function() {
        $('.multi-collapse').removeClass('show');
    });
    
    $("#wizard-rajal-obstetri-ginekologi").bwizard();

    $('#tanggal-jam-bidan-prjogd, #tanggal-jam-dokter-prjogd')
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

    $("#tgl-partus-prjogd-1, #tgl-partus-prjogd-2, #tgl-partus-prjogd-3, #tgl-partus-prjogd-4, #tgl-partus-prjogd-5, #tgl-partus-prjogd-6, #tgl-partus-prjogd-7").datepicker({
        format: 'dd/mm/yyyy',
    }).on('changeDate', function() {
        $(this).datepicker('hide');
    });

    $('#status-fung-prjogd-5, #keterangan-prjogd-20')
    .on('click', function() {
        $(this).timepicker({
            format: 'HH:mm',
            showInputs: false,
            showMeridian: false
        });
    })

    $('#bidan-prjogd').select2c({
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


    $('#dokter-prjogd').select2c({
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
            var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data){
            return data.nama;
        }
    });	


    $('[name="informasi_pasien_prjogd_1"]').on('change', function() {
        if ($(this).attr('id') === 'informasi-pasien-prjogd-3' && $(this).is(':checked')) {
            $('#informasi-pasien-prjogd-4').prop('disabled', false);
        } else {
            $('#informasi-pasien-prjogd-4').prop('disabled', true);
        }
    })

    $('[name="rujukan_prjogd_1"]').on('change', function() {
        if ($(this).attr('id') === 'rujukan-prjogd-2' && $(this).is(':checked')) {
            $('#rujukan-prjogd-3').prop('disabled', false);
        } else {
            $('#rujukan-prjogd-3').prop('disabled', true);
        }
    })

    $('#rk-prjogd-5').click(function() {
        if ($(this).is(":checked")) {
            $('#rk-prjogd-6').prop('disabled', false);
        } else {
            $('#rk-prjogd-6').val('');
            $('#rk-prjogd-6').prop('disabled', true);
        }
    });

    $('[name="rk_prjogd_8"]').on('change', function() {
        if ($(this).attr('id') === 'rk-prjogd-9' && $(this).is(':checked')) {
            $('#rk-prjogd-10').prop('disabled', false);
        } else {
            $('#rk-prjogd-10').prop('disabled', true);
        }
    })

    $('[name="rk_prjogd_12"]').on('change', function() {
        if ($(this).attr('id') === 'rk-prjogd-13' && $(this).is(':checked')) {
            $('#rk-prjogd-14').prop('disabled', false);
        } else {
            $('#rk-prjogd-14').prop('disabled', true);
        }
    })

    $('[name="rk_prjogd_21"]').on('change', function() {
        if ($(this).attr('id') === 'rk-prjogd-22' && $(this).is(':checked')) {
            $('#rk-prjogd-23').prop('disabled', false);
        } else {
            $('#rk-prjogd-23').prop('disabled', true);
        }
        if ($(this).attr('id') === 'rk-prjogd-22' && $(this).is(':checked')) {
            $('#rk-prjogd-24').prop('disabled', false);
        } else {
            $('#rk-prjogd-24').prop('disabled', true);
        }
    })

    $('[name="rk_prjogd_25"]').on('change', function() {
        if ($(this).attr('id') === 'rk-prjogd-26' && $(this).is(':checked')) {
            $('#rk-prjogd-27').prop('disabled', false);
        } else {
            $('#rk-prjogd-27').prop('disabled', true);
        }
    })

    $('[name="rk_prjogd_28"]').on('change', function() {
        if ($(this).attr('id') === 'rk-prjogd-30' && $(this).is(':checked')) {
            $('#rk-prjogd-31').prop('disabled', false);
        } else {
            $('#rk-prjogd-31').prop('disabled', true);
        }
    })

    $('#rk-prjogd-36').click(function() {
        if ($(this).is(":checked")) {
            $('#rk-prjogd-37').prop('disabled', false);
        } else {
            $('#rk-prjogd-37').val('');
            $('#rk-prjogd-37').prop('disabled', true);
        }
    });

    $('[name="rk_prjogd_38"]').on('change', function() {
        if ($(this).attr('id') === 'rk-prjogd-39' && $(this).is(':checked')) {
            $('#rk-prjogd-40').prop('disabled', false);
        } else {
            $('#rk-prjogd-40').prop('disabled', true);
        }
    })

    $('#rk-prjogd-53').click(function() {
        if ($(this).is(":checked")) {
            $('#rk-prjogd-54').prop('disabled', false);
        } else {
            $('#rk-prjogd-54').val('');
            $('#rk-prjogd-54').prop('disabled', true);
        }
    });

    $('#riwayat-prjogd-8').click(function() {
        if ($(this).is(":checked")) {
            $('#riwayat-prjogd-9').prop('disabled', false);
        } else {
            $('#riwayat-prjogd-9').val('');
            $('#riwayat-prjogd-9').prop('disabled', true);
        }
    });

    $('#riwayat-prjogd-10').click(function() {
        if ($(this).is(":checked")) {
            $('#riwayat-prjogd-11').prop('disabled', false);
        } else {
            $('#riwayat-prjogd-11').val('');
            $('#riwayat-prjogd-11').prop('disabled', true);
        }
    });

    $('[name="status_prjogd_1"]').on('change', function() {
        if ($(this).attr('id') === 'status-prjogd-6' && $(this).is(':checked')) {
            $('#status-prjogd-7').prop('disabled', false);
        } else {
            $('#status-prjogd-7').prop('disabled', true);
        }
    })

    $('[name="status_prjogd_8"]').on('change', function() {
        if ($(this).attr('id') === 'status-prjogd-10' && $(this).is(':checked')) {
            $('#status-prjogd-11').prop('disabled', false);
        } else {
            $('#status-prjogd-11').prop('disabled', true);
        }
    })

    $('#status-prjogd-12').click(function() {
        if ($(this).is(":checked")) {
            $('#status-prjogd-13').prop('disabled', false);
        } else {
            $('#status-prjogd-13').val('');
            $('#status-prjogd-13').prop('disabled', true);
        }
    });

    $('#pengkajian-prjogd-4').click(function() {
        if ($(this).is(":checked")) {
            $('#pengkajian-prjogd-5').prop('disabled', false);
        } else {
            $('#pengkajian-prjogd-5').val('');
            $('#pengkajian-prjogd-5').prop('disabled', true);
        }
    });

    $('#status-fung-prjogd-2').click(function() {
        if ($(this).is(":checked")) {
            $('#status-fung-prjogd-3').prop('disabled', false);
        } else {
            $('#status-fung-prjogd-3').val('');
            $('#status-fung-prjogd-3').prop('disabled', true);
        }
    });

    $('#status-fung-prjogd-4').click(function() {
        if ($(this).is(":checked")) {
            $('#status-fung-prjogd-5').prop('disabled', false);
        } else {
            $('#status-fung-prjogd-5').val('');
            $('#status-fung-prjogd-5').prop('disabled', true);
        }
    });

    $('#keterangan-prjogd-16').click(function() {
        if ($(this).is(":checked")) {
            $('#keterangan-prjogd-17').prop('disabled', false);
        } else {
            $('#keterangan-prjogd-17').val('');
            $('#keterangan-prjogd-17').prop('disabled', true);
        }
    });

    $('[name="keterangan_prjogd_18"]').on('change', function() {
        if ($(this).attr('id') === 'keterangan-prjogd-19' && $(this).is(':checked')) {
            $('#keterangan-prjogd-20').prop('disabled', false);
        } else {
            $('#keterangan-prjogd-20').prop('disabled', true);
        }
    })


    $('.sn_penurunan_bb_area_prjogd').hide();
    $('input[name="sn_penurunan_bb_prjogd"]').change(function() {
        if ($(this).val() == '3') {
            $('.sn_penurunan_bb_area_prjogd').show();
        } else {
            $('input[name="sn_penurunan_bb_on_prjogd"]').prop('checked', false);
            $('.sn_penurunan_bb_area_prjogd').hide();
        }
    });
  
    function lihatFORM_KEP_102_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action = 'lihat';
        entriPengkajianRajalObstetriGinekologi(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, layanan.tanggal_layanan, action);
    }

    function editFORM_KEP_102_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action = 'edit';
        entriPengkajianRajalObstetriGinekologi(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, layanan.tanggal_layanan, action);
    }

    function tambahFORM_KEP_102_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action = 'tambah';
        entriPengkajianRajalObstetriGinekologi(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, layanan.tanggal_layanan, action);
    }


    // PRJODG 
    function entriPengkajianRajalObstetriGinekologi(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, tanggal, action ) {
        // $('#modal_pengkajian_rajal_obstetri_ginekologi').modal('show');  

        $('#wizard-rajal-obstetri-ginekologi').bwizard('show', '0');

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
            url: '<?= base_url("pemeriksaan_poli/api/pemeriksaan_poli/get_data_pengkajian_rajal_obstetri_ginekologi") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
                resetFormPengkajianRajalObstetriGinekologi(); 
                $('#id-layanan-pendaftaran-prjogd').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-prjogd').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-prjogd').val(data.pasien.id_pasien);
                    $('#nama-pasien-prjogd').text(data.pasien.nama);
                    $('#no-prjogd').text(data.pasien.no_rm);
                    $('#tanggal-lahir-prjogd').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-prjogd').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // PRJODG 
                let pengkajian_rajal_obstetri_ginekologi = data.pengkajian_rajal_obstetri_ginekologi;
                if (data.pengkajian_rajal_obstetri_ginekologi !== null) {  

                    $('#id-prjogd').val(data.pengkajian_rajal_obstetri_ginekologi.id);

                    const informasi_pasien_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.informasi_pasien_prjogd); 
                    if (informasi_pasien_prjogd.informasi_pasien_prjogd_1=== '1') {$('#informasi-pasien-prjogd-1').prop('checked', true).change() }
                    if (informasi_pasien_prjogd.informasi_pasien_prjogd_1=== '2') {$('#informasi-pasien-prjogd-2').prop('checked', true).change () }
                    if (informasi_pasien_prjogd.informasi_pasien_prjogd_1=== '3') {$('#informasi-pasien-prjogd-3').prop('checked', true).change () }
                    if (informasi_pasien_prjogd.informasi_pasien_prjogd_4 !== null) {$('#informasi-pasien-prjogd-4').val(informasi_pasien_prjogd.informasi_pasien_prjogd_4);}

                    const rujukan_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.rujukan_prjogd); 
                    if (rujukan_prjogd.rujukan_prjogd_1=== '0') {$('#rujukan-prjogd-1').prop('checked', true).change() }
                    if (rujukan_prjogd.rujukan_prjogd_1=== '1') {$('#rujukan-prjogd-2').prop('checked', true).change () }
                    if (rujukan_prjogd.rujukan_prjogd_3 !== null) {$('#rujukan-prjogd-3').val(rujukan_prjogd.rujukan_prjogd_3);}

                    $('#diagnosa-rujukan-prjogd').val(data.pengkajian_rajal_obstetri_ginekologi.diagnosa_rujukan_prjogd);
                    $('#keluhan-utama-prjogd').val(data.pengkajian_rajal_obstetri_ginekologi.keluhan_utama_prjogd);

                    const rk_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.rk_prjogd); 
                    if (rk_prjogd.rk_prjogd_1 !== null) { $('#rk-prjogd-1').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_2 !== null) { $('#rk-prjogd-2').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_3 !== null) { $('#rk-prjogd-3').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_4 !== null) { $('#rk-prjogd-4').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_5 !== null) { $('#rk-prjogd-5').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_6 !== null) {$('#rk-prjogd-6').val(rk_prjogd.rk_prjogd_6);}

                    if (rk_prjogd.rk_prjogd_7 !== null) { $('#rk-prjogd-7').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_8 === '0') {$('#rk-prjogd-8').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_8 === '1') {$('#rk-prjogd-9').prop('checked', true).change () }
                    if (rk_prjogd.rk_prjogd_10 !== null) {$('#rk-prjogd-10').val(rk_prjogd.rk_prjogd_10);}

                    if (rk_prjogd.rk_prjogd_11 !== null) { $('#rk-prjogd-11').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_12 === '0') {$('#rk-prjogd-12').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_12 === '1') {$('#rk-prjogd-13').prop('checked', true).change () }
                    if (rk_prjogd.rk_prjogd_14 !== null) {$('#rk-prjogd-14').val(rk_prjogd.rk_prjogd_14);}

                    if (rk_prjogd.rk_prjogd_15 !== null) { $('#rk-prjogd-15').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_16 === '0') {$('#rk-prjogd-16').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_16 === '1') {$('#rk-prjogd-17').prop('checked', true).change () }

                    if (rk_prjogd.rk_prjogd_18 !== null) { $('#rk-prjogd-18').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_19 === '0') {$('#rk-prjogd-19').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_19 === '1') {$('#rk-prjogd-20').prop('checked', true).change () }

                    if (rk_prjogd.rk_prjogd_21 === '0') {$('#rk-prjogd-21').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_21 === '1') {$('#rk-prjogd-22').prop('checked', true).change () }
                    if (rk_prjogd.rk_prjogd_23 !== null) {$('#rk-prjogd-23').val(rk_prjogd.rk_prjogd_23);}
                    if (rk_prjogd.rk_prjogd_24 !== null) {$('#rk-prjogd-24').val(rk_prjogd.rk_prjogd_24);}

                    if (rk_prjogd.rk_prjogd_25 === '0') {$('#rk-prjogd-25').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_25 === '1') {$('#rk-prjogd-26').prop('checked', true).change () }
                    if (rk_prjogd.rk_prjogd_27 !== null) {$('#rk-prjogd-27').val(rk_prjogd.rk_prjogd_27);}

                    if (rk_prjogd.rk_prjogd_28 === '0') {$('#rk-prjogd-28').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_28 === '1') {$('#rk-prjogd-29').prop('checked', true).change () }
                    if (rk_prjogd.rk_prjogd_28 === '2') {$('#rk-prjogd-30').prop('checked', true).change () }
                    if (rk_prjogd.rk_prjogd_31 !== null) {$('#rk-prjogd-31').val(rk_prjogd.rk_prjogd_31);}

                    if (rk_prjogd.rk_prjogd_32 !== null) { $('#rk-prjogd-32').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_33 !== null) { $('#rk-prjogd-33').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_34 !== null) { $('#rk-prjogd-34').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_35 !== null) { $('#rk-prjogd-35').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_36 !== null) { $('#rk-prjogd-36').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_37 !== null) {$('#rk-prjogd-37').val(rk_prjogd.rk_prjogd_37);}

                    if (rk_prjogd.rk_prjogd_38 === '0') {$('#rk-prjogd-38').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_38 === '1') {$('#rk-prjogd-39').prop('checked', true).change () }
                    if (rk_prjogd.rk_prjogd_40 !== null) {$('#rk-prjogd-40').val(rk_prjogd.rk_prjogd_40);}

                    
                    if (rk_prjogd.rk_prjogd_41 === '0') {$('#rk-prjogd-41').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_41 === '1') {$('#rk-prjogd-42').prop('checked', true).change () }
                    if (rk_prjogd.rk_prjogd_43 !== null) {$('#rk-prjogd-43').val(rk_prjogd.rk_prjogd_43);}                   
                    if (rk_prjogd.rk_prjogd_41 === '2') {$('#rk-prjogd-44').prop('checked', true).change() }
                    if (rk_prjogd.rk_prjogd_41 === '3') {$('#rk-prjogd-45').prop('checked', true).change () }


                    if (rk_prjogd.rk_prjogd_46 !== null) {$('#rk-prjogd-46').val(rk_prjogd.rk_prjogd_46);}
                    if (rk_prjogd.rk_prjogd_47 !== null) {$('#rk-prjogd-47').val(rk_prjogd.rk_prjogd_47);}
                    if (rk_prjogd.rk_prjogd_48 !== null) { $('#rk-prjogd-48').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_49 !== null) { $('#rk-prjogd-49').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_50 !== null) {$('#rk-prjogd-50').val(rk_prjogd.rk_prjogd_50);}


                    if (rk_prjogd.rk_prjogd_51 !== null) {$('#rk-prjogd-51').val(rk_prjogd.rk_prjogd_51);}
                    if (rk_prjogd.rk_prjogd_52 !== null) { $('#rk-prjogd-52').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_53 !== null) { $('#rk-prjogd-53').prop('checked', true) }
                    if (rk_prjogd.rk_prjogd_54 !== null) {$('#rk-prjogd-54').val(rk_prjogd.rk_prjogd_54);}

                    if (rk_prjogd.rk_prjogd_55 !== null) {$('#rk-prjogd-55').val(rk_prjogd.rk_prjogd_55);}
                    if (rk_prjogd.rk_prjogd_56 !== null) {$('#rk-prjogd-56').val(rk_prjogd.rk_prjogd_56);}
                    if (rk_prjogd.rk_prjogd_57 !== null) {$('#rk-prjogd-57').val(rk_prjogd.rk_prjogd_57);}
                    if (rk_prjogd.rk_prjogd_58 !== null) {$('#rk-prjogd-58').val(rk_prjogd.rk_prjogd_58);}
                    if (rk_prjogd.rk_prjogd_59 !== null) {$('#rk-prjogd-59').val(rk_prjogd.rk_prjogd_59);}
                    if (rk_prjogd.rk_prjogd_60 !== null) {$('#rk-prjogd-60').val(rk_prjogd.rk_prjogd_60);}

                    $('#tgl-partus-prjogd-1').val(data.pengkajian_rajal_obstetri_ginekologi.tgl_partus_prjogd_1)
                    $('#tgl-partus-prjogd-2').val(data.pengkajian_rajal_obstetri_ginekologi.tgl_partus_prjogd_2)
                    $('#tgl-partus-prjogd-3').val(data.pengkajian_rajal_obstetri_ginekologi.tgl_partus_prjogd_3)
                    $('#tgl-partus-prjogd-4').val(data.pengkajian_rajal_obstetri_ginekologi.tgl_partus_prjogd_4)
                    $('#tgl-partus-prjogd-5').val(data.pengkajian_rajal_obstetri_ginekologi.tgl_partus_prjogd_5)
                    $('#tgl-partus-prjogd-6').val(data.pengkajian_rajal_obstetri_ginekologi.tgl_partus_prjogd_6)
                    $('#tgl-partus-prjogd-7').val(data.pengkajian_rajal_obstetri_ginekologi.tgl_partus_prjogd_7)


                    const tempat_partus_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.tempat_partus_prjogd); 
                    if (tempat_partus_prjogd.tempat_partus_prjogd_1 !== null) {$('#tempat-partus-prjogd-1').val(tempat_partus_prjogd.tempat_partus_prjogd_1);}
                    if (tempat_partus_prjogd.tempat_partus_prjogd_2 !== null) {$('#tempat-partus-prjogd-2').val(tempat_partus_prjogd.tempat_partus_prjogd_2);}
                    if (tempat_partus_prjogd.tempat_partus_prjogd_3 !== null) {$('#tempat-partus-prjogd-3').val(tempat_partus_prjogd.tempat_partus_prjogd_3);}
                    if (tempat_partus_prjogd.tempat_partus_prjogd_4 !== null) {$('#tempat-partus-prjogd-4').val(tempat_partus_prjogd.tempat_partus_prjogd_4);}
                    if (tempat_partus_prjogd.tempat_partus_prjogd_5 !== null) {$('#tempat-partus-prjogd-5').val(tempat_partus_prjogd.tempat_partus_prjogd_5);}
                    if (tempat_partus_prjogd.tempat_partus_prjogd_6 !== null) {$('#tempat-partus-prjogd-6').val(tempat_partus_prjogd.tempat_partus_prjogd_6);}
                    if (tempat_partus_prjogd.tempat_partus_prjogd_7 !== null) {$('#tempat-partus-prjogd-7').val(tempat_partus_prjogd.tempat_partus_prjogd_7);}

                    const umur_kh_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.umur_kh_prjogd); 
                    if (umur_kh_prjogd.umur_kh_prjogd_1 !== null) {$('#umur-kh-prjogd-1').val(umur_kh_prjogd.umur_kh_prjogd_1);}
                    if (umur_kh_prjogd.umur_kh_prjogd_2 !== null) {$('#umur-kh-prjogd-2').val(umur_kh_prjogd.umur_kh_prjogd_2);}
                    if (umur_kh_prjogd.umur_kh_prjogd_3 !== null) {$('#umur-kh-prjogd-3').val(umur_kh_prjogd.umur_kh_prjogd_3);}
                    if (umur_kh_prjogd.umur_kh_prjogd_4 !== null) {$('#umur-kh-prjogd-4').val(umur_kh_prjogd.umur_kh_prjogd_4);}
                    if (umur_kh_prjogd.umur_kh_prjogd_5 !== null) {$('#umur-kh-prjogd-5').val(umur_kh_prjogd.umur_kh_prjogd_5);}
                    if (umur_kh_prjogd.umur_kh_prjogd_6 !== null) {$('#umur-kh-prjogd-6').val(umur_kh_prjogd.umur_kh_prjogd_6);}
                    if (umur_kh_prjogd.umur_kh_prjogd_7 !== null) {$('#umur-kh-prjogd-7').val(umur_kh_prjogd.umur_kh_prjogd_7);}

                    const jenis_persalinan_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.jenis_persalinan_prjogd); 
                    if (jenis_persalinan_prjogd.jenis_persalinan_prjogd_1 !== null) {$('#jenis-persalinan-prjogd-1').val(jenis_persalinan_prjogd.jenis_persalinan_prjogd_1);}
                    if (jenis_persalinan_prjogd.jenis_persalinan_prjogd_2 !== null) {$('#jenis-persalinan-prjogd-2').val(jenis_persalinan_prjogd.jenis_persalinan_prjogd_2);}
                    if (jenis_persalinan_prjogd.jenis_persalinan_prjogd_3 !== null) {$('#jenis-persalinan-prjogd-3').val(jenis_persalinan_prjogd.jenis_persalinan_prjogd_3);}
                    if (jenis_persalinan_prjogd.jenis_persalinan_prjogd_4 !== null) {$('#jenis-persalinan-prjogd-4').val(jenis_persalinan_prjogd.jenis_persalinan_prjogd_4);}
                    if (jenis_persalinan_prjogd.jenis_persalinan_prjogd_5 !== null) {$('#jenis-persalinan-prjogd-5').val(jenis_persalinan_prjogd.jenis_persalinan_prjogd_5);}
                    if (jenis_persalinan_prjogd.jenis_persalinan_prjogd_6 !== null) {$('#jenis-persalinan-prjogd-6').val(jenis_persalinan_prjogd.jenis_persalinan_prjogd_6);}
                    if (jenis_persalinan_prjogd.jenis_persalinan_prjogd_7 !== null) {$('#jenis-persalinan-prjogd-7').val(jenis_persalinan_prjogd.jenis_persalinan_prjogd_7);}

                    const penolong_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.penolong_prjogd); 
                    if (penolong_prjogd.penolong_prjogd_1 !== null) {$('#penolong-prjogd-1').val(penolong_prjogd.penolong_prjogd_1);}
                    if (penolong_prjogd.penolong_prjogd_2 !== null) {$('#penolong-prjogd-2').val(penolong_prjogd.penolong_prjogd_2);}
                    if (penolong_prjogd.penolong_prjogd_3 !== null) {$('#penolong-prjogd-3').val(penolong_prjogd.penolong_prjogd_3);}
                    if (penolong_prjogd.penolong_prjogd_4 !== null) {$('#penolong-prjogd-4').val(penolong_prjogd.penolong_prjogd_4);}
                    if (penolong_prjogd.penolong_prjogd_5 !== null) {$('#penolong-prjogd-5').val(penolong_prjogd.penolong_prjogd_5);}
                    if (penolong_prjogd.penolong_prjogd_6 !== null) {$('#penolong-prjogd-6').val(penolong_prjogd.penolong_prjogd_6);}
                    if (penolong_prjogd.penolong_prjogd_7 !== null) {$('#penolong-prjogd-7').val(penolong_prjogd.penolong_prjogd_7);}

                    const penyulit_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.penyulit_prjogd); 
                    if (penyulit_prjogd.penyulit_prjogd_1 !== null) {$('#penyulit-prjogd-1').val(penyulit_prjogd.penyulit_prjogd_1);}
                    if (penyulit_prjogd.penyulit_prjogd_2 !== null) {$('#penyulit-prjogd-2').val(penyulit_prjogd.penyulit_prjogd_2);}
                    if (penyulit_prjogd.penyulit_prjogd_3 !== null) {$('#penyulit-prjogd-3').val(penyulit_prjogd.penyulit_prjogd_3);}
                    if (penyulit_prjogd.penyulit_prjogd_4 !== null) {$('#penyulit-prjogd-4').val(penyulit_prjogd.penyulit_prjogd_4);}
                    if (penyulit_prjogd.penyulit_prjogd_5 !== null) {$('#penyulit-prjogd-5').val(penyulit_prjogd.penyulit_prjogd_5);}
                    if (penyulit_prjogd.penyulit_prjogd_6 !== null) {$('#penyulit-prjogd-6').val(penyulit_prjogd.penyulit_prjogd_6);}
                    if (penyulit_prjogd.penyulit_prjogd_7 !== null) {$('#penyulit-prjogd-7').val(penyulit_prjogd.penyulit_prjogd_7);}

                    const jk_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.jk_prjogd); 
                    if (jk_prjogd.jk_prjogd_1 !== null) {$('#jk-prjogd-1').val(jk_prjogd.jk_prjogd_1);}
                    if (jk_prjogd.jk_prjogd_2 !== null) {$('#jk-prjogd-2').val(jk_prjogd.jk_prjogd_2);}
                    if (jk_prjogd.jk_prjogd_3 !== null) {$('#jk-prjogd-3').val(jk_prjogd.jk_prjogd_3);}
                    if (jk_prjogd.jk_prjogd_4 !== null) {$('#jk-prjogd-4').val(jk_prjogd.jk_prjogd_4);}
                    if (jk_prjogd.jk_prjogd_5 !== null) {$('#jk-prjogd-5').val(jk_prjogd.jk_prjogd_5);}
                    if (jk_prjogd.jk_prjogd_6 !== null) {$('#jk-prjogd-6').val(jk_prjogd.jk_prjogd_6);}
                    if (jk_prjogd.jk_prjogd_7 !== null) {$('#jk-prjogd-7').val(jk_prjogd.jk_prjogd_7);}

                    const bb_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.bb_prjogd); 
                    if (bb_prjogd.bb_prjogd_1 !== null) {$('#bb-prjogd-1').val(bb_prjogd.bb_prjogd_1);}
                    if (bb_prjogd.bb_prjogd_2 !== null) {$('#bb-prjogd-2').val(bb_prjogd.bb_prjogd_2);}
                    if (bb_prjogd.bb_prjogd_3 !== null) {$('#bb-prjogd-3').val(bb_prjogd.bb_prjogd_3);}
                    if (bb_prjogd.bb_prjogd_4 !== null) {$('#bb-prjogd-4').val(bb_prjogd.bb_prjogd_4);}
                    if (bb_prjogd.bb_prjogd_5 !== null) {$('#bb-prjogd-5').val(bb_prjogd.bb_prjogd_5);}
                    if (bb_prjogd.bb_prjogd_6 !== null) {$('#bb-prjogd-6').val(bb_prjogd.bb_prjogd_6);}
                    if (bb_prjogd.bb_prjogd_7 !== null) {$('#bb-prjogd-7').val(bb_prjogd.bb_prjogd_7);}

                    const pb_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.pb_prjogd); 
                    if (pb_prjogd.pb_prjogd_1 !== null) {$('#pb-prjogd-1').val(pb_prjogd.pb_prjogd_1);}
                    if (pb_prjogd.pb_prjogd_2 !== null) {$('#pb-prjogd-2').val(pb_prjogd.pb_prjogd_2);}
                    if (pb_prjogd.pb_prjogd_3 !== null) {$('#pb-prjogd-3').val(pb_prjogd.pb_prjogd_3);}
                    if (pb_prjogd.pb_prjogd_4 !== null) {$('#pb-prjogd-4').val(pb_prjogd.pb_prjogd_4);}
                    if (pb_prjogd.pb_prjogd_5 !== null) {$('#pb-prjogd-5').val(pb_prjogd.pb_prjogd_5);}
                    if (pb_prjogd.pb_prjogd_6 !== null) {$('#pb-prjogd-6').val(pb_prjogd.pb_prjogd_6);}
                    if (pb_prjogd.pb_prjogd_7 !== null) {$('#pb-prjogd-7').val(pb_prjogd.pb_prjogd_7);}

                    const nifas_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.nifas_prjogd); 
                    if (nifas_prjogd.nifas_prjogd_1 !== null) {$('#nifas-prjogd-1').val(nifas_prjogd.nifas_prjogd_1);}
                    if (nifas_prjogd.nifas_prjogd_2 !== null) {$('#nifas-prjogd-2').val(nifas_prjogd.nifas_prjogd_2);}
                    if (nifas_prjogd.nifas_prjogd_3 !== null) {$('#nifas-prjogd-3').val(nifas_prjogd.nifas_prjogd_3);}
                    if (nifas_prjogd.nifas_prjogd_4 !== null) {$('#nifas-prjogd-4').val(nifas_prjogd.nifas_prjogd_4);}
                    if (nifas_prjogd.nifas_prjogd_5 !== null) {$('#nifas-prjogd-5').val(nifas_prjogd.nifas_prjogd_5);}
                    if (nifas_prjogd.nifas_prjogd_6 !== null) {$('#nifas-prjogd-6').val(nifas_prjogd.nifas_prjogd_6);}
                    if (nifas_prjogd.nifas_prjogd_7 !== null) {$('#nifas-prjogd-7').val(nifas_prjogd.nifas_prjogd_7);}

                    const keadaan_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.keadaan_prjogd); 
                    if (keadaan_prjogd.keadaan_prjogd_1 !== null) {$('#keadaan-prjogd-1').val(keadaan_prjogd.keadaan_prjogd_1);}
                    if (keadaan_prjogd.keadaan_prjogd_2 !== null) {$('#keadaan-prjogd-2').val(keadaan_prjogd.keadaan_prjogd_2);}
                    if (keadaan_prjogd.keadaan_prjogd_3 !== null) {$('#keadaan-prjogd-3').val(keadaan_prjogd.keadaan_prjogd_3);}
                    if (keadaan_prjogd.keadaan_prjogd_4 !== null) {$('#keadaan-prjogd-4').val(keadaan_prjogd.keadaan_prjogd_4);}
                    if (keadaan_prjogd.keadaan_prjogd_5 !== null) {$('#keadaan-prjogd-5').val(keadaan_prjogd.keadaan_prjogd_5);}
                    if (keadaan_prjogd.keadaan_prjogd_6 !== null) {$('#keadaan-prjogd-6').val(keadaan_prjogd.keadaan_prjogd_6);}
                    if (keadaan_prjogd.keadaan_prjogd_7 !== null) {$('#keadaan-prjogd-7').val(keadaan_prjogd.keadaan_prjogd_7);}

                    const riwayat_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.riwayat_prjogd); 
                    if (riwayat_prjogd.riwayat_prjogd_1 === '1') {$('#riwayat-prjogd-1').prop('checked', true).change() }
                    if (riwayat_prjogd.riwayat_prjogd_1 === '0') {$('#riwayat-prjogd-2').prop('checked', true).change () }
                    if (riwayat_prjogd.riwayat_prjogd_3 !== null) { $('#riwayat-prjogd-3').prop('checked', true) }
                    if (riwayat_prjogd.riwayat_prjogd_4 !== null) { $('#riwayat-prjogd-4').prop('checked', true) }
                    if (riwayat_prjogd.riwayat_prjogd_5 !== null) { $('#riwayat-prjogd-5').prop('checked', true) }
                    if (riwayat_prjogd.riwayat_prjogd_6 !== null) { $('#riwayat-prjogd-6').prop('checked', true) }
                    if (riwayat_prjogd.riwayat_prjogd_7 !== null) { $('#riwayat-prjogd-7').prop('checked', true) }
                    if (riwayat_prjogd.riwayat_prjogd_8 !== null) { $('#riwayat-prjogd-8').prop('checked', true) }
                    if (riwayat_prjogd.riwayat_prjogd_9 !== null) {$('#riwayat-prjogd-9').val(riwayat_prjogd.riwayat_prjogd_9);}
                    if (riwayat_prjogd.riwayat_prjogd_10 !== null) { $('#riwayat-prjogd-10').prop('checked', true) }
                    if (riwayat_prjogd.riwayat_prjogd_11 !== null) {$('#riwayat-prjogd-11').val(riwayat_prjogd.riwayat_prjogd_11);}

                    const status_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.status_prjogd); 
                    if (status_prjogd.status_prjogd_1 === '1') {$('#status-prjogd-1').prop('checked', true).change() }
                    if (status_prjogd.status_prjogd_1 === '2') {$('#status-prjogd-2').prop('checked', true).change () }
                    if (status_prjogd.status_prjogd_1 === '3') {$('#status-prjogd-3').prop('checked', true).change() }
                    if (status_prjogd.status_prjogd_1 === '4') {$('#status-prjogd-4').prop('checked', true).change () }
                    if (status_prjogd.status_prjogd_1 === '5') {$('#status-prjogd-5').prop('checked', true).change() }
                    if (status_prjogd.status_prjogd_1 === '6') {$('#status-prjogd-6').prop('checked', true).change () }
                    if (status_prjogd.status_prjogd_7 !== null) {$('#status-prjogd-7').val(status_prjogd.status_prjogd_7);}
                    if (status_prjogd.status_prjogd_8 === '1') {$('#status-prjogd-8').prop('checked', true).change() }
                    if (status_prjogd.status_prjogd_8 === '2') {$('#status-prjogd-9').prop('checked', true).change () }
                    if (status_prjogd.status_prjogd_8 === '3') {$('#status-prjogd-10').prop('checked', true).change() }
                    if (status_prjogd.status_prjogd_11 !== null) {$('#status-prjogd-11').val(status_prjogd.status_prjogd_11);}
                    if (status_prjogd.status_prjogd_12 !== null) { $('#status-prjogd-12').prop('checked', true) }
                    if (status_prjogd.status_prjogd_13 !== null) {$('#status-prjogd-13').val(status_prjogd.status_prjogd_13);}

                    const pengkajian_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.pengkajian_prjogd); 
                    if (pengkajian_prjogd.pengkajian_prjogd_1 !== null) {$('#pengkajian-prjogd-1').val(pengkajian_prjogd.pengkajian_prjogd_1);}
                    if (pengkajian_prjogd.pengkajian_prjogd_2 !== null) { $('#pengkajian-prjogd-2').prop('checked', true) }
                    if (pengkajian_prjogd.pengkajian_prjogd_3 !== null) { $('#pengkajian-prjogd-3').prop('checked', true) }
                    if (pengkajian_prjogd.pengkajian_prjogd_4 !== null) { $('#pengkajian-prjogd-4').prop('checked', true) }
                    if (pengkajian_prjogd.pengkajian_prjogd_5 !== null) {$('#pengkajian-prjogd-5').val(pengkajian_prjogd.pengkajian_prjogd_5);}
                    if (pengkajian_prjogd.pengkajian_prjogd_6 !== null) { $('#pengkajian-prjogd-6').prop('checked', true) }
                    if (pengkajian_prjogd.pengkajian_prjogd_7 !== null) { $('#pengkajian-prjogd-7').prop('checked', true) }
                    if (pengkajian_prjogd.pengkajian_prjogd_8 !== null) { $('#pengkajian-prjogd-8').prop('checked', true) }
                    if (pengkajian_prjogd.pengkajian_prjogd_9 !== null) { $('#pengkajian-prjogd-9').prop('checked', true) }
                    if (pengkajian_prjogd.pengkajian_prjogd_10 !== null) { $('#pengkajian-prjogd-10').prop('checked', true) }                 
                   
                    const pemeriksaan_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.pemeriksaan_prjogd); 
                    if (pemeriksaan_prjogd.pemeriksaan_prjogd_1 !== null) {$('#pemeriksaan-prjogd-1').val(pemeriksaan_prjogd.pemeriksaan_prjogd_1);}
                    if (pemeriksaan_prjogd.pemeriksaan_prjogd_2 !== null) {$('#pemeriksaan-prjogd-2').val(pemeriksaan_prjogd.pemeriksaan_prjogd_2);}
                    if (pemeriksaan_prjogd.pemeriksaan_prjogd_3 !== null) {$('#pemeriksaan-prjogd-3').val(pemeriksaan_prjogd.pemeriksaan_prjogd_3);}
                    if (pemeriksaan_prjogd.pemeriksaan_prjogd_4 !== null) {$('#pemeriksaan-prjogd-4').val(pemeriksaan_prjogd.pemeriksaan_prjogd_4);}
                    if (pemeriksaan_prjogd.pemeriksaan_prjogd_5 !== null) {$('#pemeriksaan-prjogd-5').val(pemeriksaan_prjogd.pemeriksaan_prjogd_5);}
                    if (pemeriksaan_prjogd.pemeriksaan_prjogd_6 !== null) {$('#pemeriksaan-prjogd-6').val(pemeriksaan_prjogd.pemeriksaan_prjogd_6);}
                    if (pemeriksaan_prjogd.pemeriksaan_prjogd_7 !== null) {$('#pemeriksaan-prjogd-7').val(pemeriksaan_prjogd.pemeriksaan_prjogd_7);}
                    
                    if (data.pengkajian_rajal_obstetri_ginekologi.sn_penurunan_bb_prjogd == 1) {
                        $('#sn-prjogd-tidak').prop('checked', true);
                        calcscoreprjogd();

                    } else if (data.pengkajian_rajal_obstetri_ginekologi.sn_penurunan_bb_prjogd == 2) {
                        $('#sn-prjogd-tidak-yakin').prop('checked', true);
                        calcscoreprjogd();

                    } else if (data.pengkajian_rajal_obstetri_ginekologi.sn_penurunan_bb_prjogd == 3) {
                        $('#sn-prjogd-ya').prop('checked', true).change();

                        if (data.pengkajian_rajal_obstetri_ginekologi.sn_penurunan_bb_on_prjogd == 1) {
                            $('#sn-prjogd-pbb-1-1').prop('checked', true);
                            calcscoreprjogd();

                        } else if (data.pengkajian_rajal_obstetri_ginekologi.sn_penurunan_bb_on_prjogd == 2) {
                            $('#sn-prjogd-pbb-2-2').prop('checked', true);
                            calcscoreprjogd();

                        } else if (data.pengkajian_rajal_obstetri_ginekologi.sn_penurunan_bb_on_prjogd == 3) {
                            $('#sn-prjogd-pbb-3-3').prop('checked', true);
                            calcscoreprjogd();

                        } else if (data.pengkajian_rajal_obstetri_ginekologi.sn_penurunan_bb_on_prjogd == 4) {
                            $('#sn-prjogd-pbb-4-4').prop('checked', true);
                            calcscoreprjogd();

                        } else if (data.pengkajian_rajal_obstetri_ginekologi.sn_penurunan_bb_on_prjogd == 5) {
                            $('#sn-prjogd-pbb-5-5').prop('checked', true);
                            calcscoreprjogd();
                        }
                    }

                    if (data.pengkajian_rajal_obstetri_ginekologi.sn_asupan_makan_prjogd == 0) {
                        $('#sn-prjogd-asupan-makan-tidak').prop('checked', true);
                        calcscoreprjogd();
                    } else if (data.pengkajian_rajal_obstetri_ginekologi.sn_asupan_makan_prjogd == 1) {
                        $('#sn-prjogd-asupan-makan-ya').prop('checked', true);
                        calcscoreprjogd();
                    }

                    const skrining_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.skrining_prjogd); 
                    if (skrining_prjogd.skrining_prjogd_1=== '0') {$('#skrining-prjogd-1').prop('checked', true).change() }
                    if (skrining_prjogd.skrining_prjogd_1=== '1') {$('#skrining-prjogd-2').prop('checked', true).change () }
                    if (skrining_prjogd.skrining_prjogd_3 !== null) {$('#skrining-prjogd-3').val(skrining_prjogd.skrining_prjogd_3);}
                    if (skrining_prjogd.skrining_prjogd_4=== '0') {$('#skrining-prjogd-4').prop('checked', true).change() }
                    if (skrining_prjogd.skrining_prjogd_4=== '1') {$('#skrining-prjogd-5').prop('checked', true).change () }
                    if (skrining_prjogd.skrining_prjogd_6=== '0') {$('#skrining-prjogd-6').prop('checked', true).change() }
                    if (skrining_prjogd.skrining_prjogd_6=== '1') {$('#skrining-prjogd-7').prop('checked', true).change () }
                    if (skrining_prjogd.skrining_prjogd_8=== '0') {$('#skrining-prjogd-8').prop('checked', true).change() }
                    if (skrining_prjogd.skrining_prjogd_8=== '1') {$('#skrining-prjogd-9').prop('checked', true).change () }

                    const status_fung_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.status_fung_prjogd); 
                    if (status_fung_prjogd.status_fung_prjogd_1 !== null) { $('#status-fung-prjogd-1').prop('checked', true) }
                    if (status_fung_prjogd.status_fung_prjogd_2 !== null) { $('#status-fung-prjogd-2').prop('checked', true) }
                    if (status_fung_prjogd.status_fung_prjogd_3 !== null) {$('#status-fung-prjogd-3').val(status_fung_prjogd.status_fung_prjogd_3);}
                    if (status_fung_prjogd.status_fung_prjogd_4 !== null) { $('#status-fung-prjogd-4').prop('checked', true) }
                    if (status_fung_prjogd.status_fung_prjogd_5 !== null) {$('#status-fung-prjogd-5').val(status_fung_prjogd.status_fung_prjogd_5);}

                    const cidera_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.cidera_prjogd); 
                    if (cidera_prjogd.cidera_prjogd_1 === '1') {$('#cidera-prjogd-1').prop('checked', true).change() }
                    if (cidera_prjogd.cidera_prjogd_1 === '0') {$('#cidera-prjogd-2').prop('checked', true).change () }
                    if (cidera_prjogd.cidera_prjogd_3 === '1') {$('#cidera-prjogd-3').prop('checked', true).change() }
                    if (cidera_prjogd.cidera_prjogd_3 === '0') {$('#cidera-prjogd-4').prop('checked', true).change () }
                    if (cidera_prjogd.cidera_prjogd_5 === '1') {$('#cidera-prjogd-5').prop('checked', true).change () }
                    if (cidera_prjogd.cidera_prjogd_5 === '2') {$('#cidera-prjogd-6').prop('checked', true).change() }
                    if (cidera_prjogd.cidera_prjogd_5 === '3') {$('#cidera-prjogd-7').prop('checked', true).change () }

                    const keterangan_prjogd = JSON.parse(data.pengkajian_rajal_obstetri_ginekologi.keterangan_prjogd); 
                    if (keterangan_prjogd.keterangan_prjogd_1 === '1') {$('#keterangan-prjogd-1').prop('checked', true).change() }
                    if (keterangan_prjogd.keterangan_prjogd_1 === '2') {$('#keterangan-prjogd-2').prop('checked', true).change () }
                    if (keterangan_prjogd.keterangan_prjogd_1 === '3') {$('#keterangan-prjogd-3').prop('checked', true).change() }
                    if (keterangan_prjogd.keterangan_prjogd_1 === '4') {$('#keterangan-prjogd-4').prop('checked', true).change () }
                    if (keterangan_prjogd.keterangan_prjogd_5 !== null) { $('#keterangan-prjogd-5').prop('checked', true) }
                    if (keterangan_prjogd.keterangan_prjogd_6 !== null) { $('#keterangan-prjogd-6').prop('checked', true) }
                    if (keterangan_prjogd.keterangan_prjogd_7 !== null) { $('#keterangan-prjogd-7').prop('checked', true) }
                    if (keterangan_prjogd.keterangan_prjogd_8 !== null) {$('#keterangan-prjogd-8').val(keterangan_prjogd.keterangan_prjogd_8);}
                    if (keterangan_prjogd.keterangan_prjogd_9 !== null) {$('#keterangan-prjogd-9').val(keterangan_prjogd.keterangan_prjogd_9);}
                    if (keterangan_prjogd.keterangan_prjogd_10 !== null) {$('#keterangan-prjogd-10').val(keterangan_prjogd.keterangan_prjogd_10);}
                    if (keterangan_prjogd.keterangan_prjogd_11 !== null) {$('#keterangan-prjogd-11').val(keterangan_prjogd.keterangan_prjogd_11);}
                    if (keterangan_prjogd.keterangan_prjogd_12 !== null) { $('#keterangan-prjogd-12').prop('checked', true) }
                    if (keterangan_prjogd.keterangan_prjogd_13 !== null) { $('#keterangan-prjogd-13').prop('checked', true) }
                    if (keterangan_prjogd.keterangan_prjogd_14 !== null) { $('#keterangan-prjogd-14').prop('checked', true) }
                    if (keterangan_prjogd.keterangan_prjogd_15 !== null) { $('#keterangan-prjogd-15').prop('checked', true) }
                    if (keterangan_prjogd.keterangan_prjogd_16 !== null) { $('#keterangan-prjogd-16').prop('checked', true) }
                    if (keterangan_prjogd.keterangan_prjogd_17 !== null) {$('#keterangan-prjogd-17').val(keterangan_prjogd.keterangan_prjogd_17);}
                    if (keterangan_prjogd.keterangan_prjogd_18 === '0') {$('#keterangan-prjogd-18').prop('checked', true).change() }
                    if (keterangan_prjogd.keterangan_prjogd_18 === '1') {$('#keterangan-prjogd-19').prop('checked', true).change () }
                    if (keterangan_prjogd.keterangan_prjogd_20 !== null) {$('#keterangan-prjogd-20').val(keterangan_prjogd.keterangan_prjogd_20);}

                    $('#masalah-kebidanan-prjogd').val(data.pengkajian_rajal_obstetri_ginekologi.masalah_kebidanan_prjogd);

                    $('#tanggal-jam-bidan-prjogd').val((data.pengkajian_rajal_obstetri_ginekologi.tanggal_jam_bidan_prjogd !== null ? datetimefmysql(data.pengkajian_rajal_obstetri_ginekologi.tanggal_jam_bidan_prjogd) : ''));
                    if (data.pengkajian_rajal_obstetri_ginekologi.bidan_prjogd !== null) { $('#bidan-prjogd').select2c('readonly', true)}
                    $('#bidan-prjogd').val(data.pengkajian_rajal_obstetri_ginekologi.bidan_prjogd);
                    $('#s2id_bidan-prjogd a .select2c-chosen').html(data.pengkajian_rajal_obstetri_ginekologi.bidan);
                    if (data.ttd_bidan_prjogd !== null) {
                        $('#ttd-bidan-prjogd').hide();
                        $('#ttd_bidan_prjogd_verified').show();
                    }

                    $('#tanggal-jam-dokter-prjogd').val((data.pengkajian_rajal_obstetri_ginekologi.tanggal_jam_dokter_prjogd !== null ? datetimefmysql(data.pengkajian_rajal_obstetri_ginekologi.tanggal_jam_dokter_prjogd) : ''));
                    if (data.pengkajian_rajal_obstetri_ginekologi.dokter_prjogd !== null) { $('#dokter-prjogd').select2c('readonly', true)}
                    $('#dokter-prjogd').val(data.pengkajian_rajal_obstetri_ginekologi.dokter_prjogd);
                    $('#s2id_dokter-prjogd a .select2c-chosen').html(data.pengkajian_rajal_obstetri_ginekologi.dokter);
                    if (data.ttd_dokter_prjogd !== null) {
                        $('#ttd-dokter-prjogd').hide();
                        $('#ttd_dokter_prjogd_verified').show();
                    }
                    
                }           
                $('#bed-prjogd').text(bed);
                $('#tanggal-jam-prjogd').text(tanggal);
                $('#modal_pengkajian_rajal_obstetri_ginekologi').modal('show');        
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })


    }  

    function resetFormPengkajianRajalObstetriGinekologi() {
        $('#wizard-rajal-obstetri-ginekologi').bwizard('show', '0');
        $('#form_entri_pengkajian_rajal_obstetri_ginekologi')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#id-prjogd').val('');

        // bidan / dokter Tulisan pilih
        $('#s2id_bidan-prjogd a .select2c-chosen').html('Pilih Perawat');
        $('#s2id_dokter-prjogd a .select2c-chosen').html('Pilih Dokter DPJP');

        // Perawat / Dokter
        $('#bidan-prjogd, #dokter-prjogd').val('');
         // s2id bidan
        $('#s2id_bidan-prjogd a .select2c-chosen, #s2id_dokter-prjogd a .select2c-chosen').empty();

        // CEKLIS TTTD PERAWAT OR DOKTER 
        $('#ttd-bidan-prjogd').show();
        $('#ttd_bidan_prjogd_verified').hide();
        $('#ttd-dokter-prjogd').show();         
        $('#ttd_dokter_prjogd_verified').hide();

        $('#tanggal-jam-bidan-prjogd, #tanggal-jam-dokter-prjogd').attr('disabled', false);
        $('#bidan-prjogd, #dokter-prjogd').select2c('readonly',false);
    }

    // baru
    function konfirmasiSimpanPengkajianRajalObstetriGinekologi() {
        var stop = false;
        if ($('#tanggal-jam-bidan-prjogd').val() === '') {
            syams_validation('#tanggal-jam-bidan-prjogd', 'Kolom waktu verifikasi bidan harus diisi!');
            $('#tanggal-jam-bidan-prjogd').focus();
            $('#wizard-rajal-obstetri-ginekologi').bwizard('show', '0');
            stop = true;
        }

        if ($('#bidan-prjogd').val() === '') {
            syams_validation('#bidan-prjogd', 'Kolom bidan harus dipilih!');
            $('#wizard-rajal-obstetri-ginekologi').bwizard('show', '0');
            stop = true;
        }

        if ($('#tanggal-jam-dokter-prjogd').val() === '' && !stop) {
            syams_validation('#tanggal-jam-dokter-prjogd', 'Kolom waktu verifikasi dokter harus diisi!');
            $('#tanggal-jam-dokter-prjogd').focus();
            $('#wizard-kedokteran-prjogd').bwizard('show', '0');
            stop = true;
        }

        if ($('#dokter-prjogd').val() === '' && !stop) {
            syams_validation('#dokter-prjogd', 'Kolom dokter harus dipilih!');
            $('#wizard-rajal-obstetri-ginekologi').bwizard('show', '0');
            stop = true;
        }

        if (!stop) {
            var id_prjogd = $('#id-prjogd').val();
            var text;
            var btnTextConfirmPrjogd;

            if (id_prjogd) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmPrjogd = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmPrjogd = 'Simpan';
            }

            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmPrjogd,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    SimpanPengkajianRajalObstetriGinekologi();
                }
            });
        }
    }

    function SimpanPengkajianRajalObstetriGinekologi() {
        var id_layanan_pendaftaran_prjogd = $('#id-layanan-pendaftaran-prjogd').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pemeriksaan_poli/api/pemeriksaan_poli/simpan_data_pengkajian_rajal_obstetri_ginekologi") ?>',
            data: $('#form_entri_pengkajian_rajal_obstetri_ginekologi').serialize() + '&id-layanan-pendaftaran-prjogd=' + id_layanan_pendaftaran_prjogd,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-rajal-obstetri-ginekologi').bwizard('show', data.respon.show);

                        if (data.respon.status === false) {

                            bootbox.dialog({
                                message: data.respon.message,
                                title: "Penyimpanan Data Gagal",
                                buttons: {
                                    batal: {
                                        label: '<i class=" fas fa-times-circle"></i> Close',
                                        className: "btn-danger",
                                        callback: function() {
                                        }
                                    }
                                }
                            });
                        }
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageAddSuccess();
                        $('#modal_pengkajian_rajal_obstetri_ginekologi').modal('hide');
                        showListForm($('#id-pendaftaran-prjogd').val(), $('#id-layanan-pendaftaran-prjogd').val(), $('#id-pasien-prjogd').val());
                    } else {
                        messageAddFailed();
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        });
    }



    function calcscoreprjogd() {
        var score = 0;
        $("input[name='sn_penurunan_bb_prjogd']:checked").each(function() {
            if ($(this).val() == '1') {
                score += parseInt(0);
            } else if ($(this).val() == '2') {
                score += parseInt(2);
            } else if ($(this).val() == '3') {
                $("input[name='sn_penurunan_bb_on_prjogd']:checked").each(function() {
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

        $("input[name='sn_asupan_makan_prjogd']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
        });
        $("input[name=sn_total_prjogd]").val(score);
    } 

</script>