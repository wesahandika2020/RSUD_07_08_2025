<!-- // PKRJ -->
<script>
        
        $('#btn-expand-all-keperawatan-rajal').click(function() {
            $('.multi-collapse').addClass('show');
        });

        $('#btn-collapse-all-keperawatan-rajal').click(function() {
            $('.multi-collapse').removeClass('show');
        });
        
        $("#wizard-keperawatan-rajal").bwizard();


        $('#tanggal-jam-perawat-pkrj, #tanggal-jam-dokter-pkrj')
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

        $('#keterangan-pkrj-20')
        .on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false
            });
        })

        $('#perawat-pkrj').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term,
                    page) { // page is the one-based page number tracked by Select2
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
        });

        $('#dokter-pkrj').select2c({
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


        $('#rpk-pkrj-5').click(function() {
            if ($(this).is(":checked")) {
                $('#rpk-pkrj-6').prop('disabled', false);
            } else {
                $('#rpk-pkrj-6').val('');
                $('#rpk-pkrj-6').prop('disabled', true);
            }
        });


        $('[name="rpk_pkrj_7"]').on('change', function() {
            if ($(this).attr('id') === 'rpk-pkrj-8' && $(this).is(':checked')) {
                $('#rpk-pkrj-9').prop('disabled', false);
            } else {
                $('#rpk-pkrj-9').prop('disabled', true);
            }
        })

        $('[name="rpk_pkrj_10"]').on('change', function() {
            if ($(this).attr('id') === 'rpk-pkrj-11' && $(this).is(':checked')) {
                $('#rpk-pkrj-12').prop('disabled', false);
            } else {
                $('#rpk-pkrj-12').prop('disabled', true);
            }
        })

        $('[name="rpk_pkrj_17"]').on('change', function() {
            if ($(this).attr('id') === 'rpk-pkrj-18' && $(this).is(':checked')) {
                $('#rpk-pkrj-19').prop('disabled', false);
            } else {
                $('#rpk-pkrj-19').prop('disabled', true);
            }
            if ($(this).attr('id') === 'rpk-pkrj-18' && $(this).is(':checked')) {
                $('#rpk-pkrj-20').prop('disabled', false);
            } else {
                $('#rpk-pkrj-20').prop('disabled', true);
            }
        })
    
        $('[name="rpk_pkrj_21"]').on('change', function() {
            if ($(this).attr('id') === 'rpk-pkrj-23' && $(this).is(':checked')) {
                $('#rpk-pkrj-24').prop('disabled', false);
            } else {
                $('#rpk-pkrj-24').prop('disabled', true);
            }
        })


        $('#riwayat-pkrj-8').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-pkrj-9').prop('disabled', false);
            } else {
                $('#riwayat-pkrj-9').val('');
                $('#riwayat-pkrj-9').prop('disabled', true);
            }
        });

        $('#riwayat-pkrj-10').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-pkrj-11').prop('disabled', false);
            } else {
                $('#riwayat-pkrj-11').val('');
                $('#riwayat-pkrj-11').prop('disabled', true);
            }
        });

        $('[name="status_pkrj_1"]').on('change', function() {
            if ($(this).attr('id') === 'status-pkrj-6' && $(this).is(':checked')) {
                $('#status-pkrj-7').prop('disabled', false);
            } else {
                $('#status-pkrj-7').prop('disabled', true);
            }
        })

        $('[name="status_pkrj_8"]').on('change', function() {
            if ($(this).attr('id') === 'status-pkrj-10' && $(this).is(':checked')) {
                $('#status-pkrj-11').prop('disabled', false);
            } else {
                $('#status-pkrj-11').prop('disabled', true);
            }
        })

        $('#status-pkrj-12').click(function() {
            if ($(this).is(":checked")) {
                $('#status-pkrj-13').prop('disabled', false);
            } else {
                $('#status-pkrj-13').val('');
                $('#status-pkrj-13').prop('disabled', true);
            }
        });

        $('#pengkajian-pkrj-4').click(function() {
            if ($(this).is(":checked")) {
                $('#pengkajian-pkrj-6').prop('disabled', false);
            } else {
                $('#pengkajian-pkrj-6').val('');
                $('#pengkajian-pkrj-6').prop('disabled', true);
            }
        });

        $('#status-fung-pkrj-2').click(function() {
            if ($(this).is(":checked")) {
                $('#status-fung-pkrj-3').prop('disabled', false);
            } else {
                $('#status-fung-pkrj-3').val('');
                $('#status-fung-pkrj-3').prop('disabled', true);
            }
        });

        $('#status-fung-pkrj-4').click(function() {
            if ($(this).is(":checked")) {
                $('#status-fung-pkrj-5').prop('disabled', false);
            } else {
                $('#status-fung-pkrj-5').val('');
                $('#status-fung-pkrj-5').prop('disabled', true);
            }
        });

        $('#keterangan-pkrj-16').click(function() {
            if ($(this).is(":checked")) {
                $('#keterangan-pkrj-17').prop('disabled', false);
            } else {
                $('#keterangan-pkrj-17').val('');
                $('#keterangan-pkrj-17').prop('disabled', true);
            }
        });

        $('[name="keterangan_pkrj_18"]').on('change', function() {
            if ($(this).attr('id') === 'keterangan-pkrj-19' && $(this).is(':checked')) {
                $('#keterangan-pkrj-20').prop('disabled', false);
            } else {
                $('#keterangan-pkrj-20').prop('disabled', true);
            }
        })

        $('#masalah-kep-pkrj-27').click(function() {
            if ($(this).is(":checked")) {
                $('#masalah-kep-pkrj-28').prop('disabled', false);
            } else {
                $('#masalah-kep-pkrj-28').val('');
                $('#masalah-kep-pkrj-28').prop('disabled', true);
            }
        });


        $('.sn_penurunan_bb_area_pkrj').hide();
        $('input[name="sn_penurunan_bb_pkrj"]').change(function() {
            if ($(this).val() == '3') {
                $('.sn_penurunan_bb_area_pkrj').show();
            } else {
                $('input[name="sn_penurunan_bb_on_pkrj"]').prop('checked', false);
                $('.sn_penurunan_bb_area_pkrj').hide();
            }
        });

    function lihatFORM_KEP_33_03(data) {
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
        entriPengkajianKeperawatanRajal(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, layanan.tanggal_layanan, action);
    }

    function editFORM_KEP_33_03(data) {
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
        entriPengkajianKeperawatanRajal(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, layanan.tanggal_layanan, action);
    }

    function tambahFORM_KEP_33_03(data) {
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
        entriPengkajianKeperawatanRajal(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, layanan.tanggal_layanan, action);
    }

    
    // PKRJ
    function entriPengkajianKeperawatanRajal(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, tanggal, action) {

        // $('#modal_pengkajian_kep_rajal').modal('show');  
        $('#wizard-keperawatan-rajal').bwizard('show', '0');

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
            url: '<?= base_url("pemeriksaan_poli/api/pemeriksaan_poli/get_data_pengkajian_keperawatan_rajal") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
                resetFormPengkajianKeperawatanRajal(); 
                $('#id-layanan-pendaftaran-pkrj').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-pkrj').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-pkrj').val(data.pasien.id_pasien);
                    $('#nama-pasien-pkrj').text(data.pasien.nama);
                    $('#no-pkrj').text(data.pasien.no_rm);
                    // $('#no-pkrj').text(data.pasien.id);
                    $('#tanggal-lahir-pkrj').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-pkrj').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // PKRJ 
                let pengkajian_awal_keperawatan_rajal = data.pengkajian_awal_keperawatan_rajal;
                if (data.pengkajian_awal_keperawatan_rajal !== null) {                   
                    // $('#id-users').val(data.id_users);
                    // $('#id-pkrj').val(data.id_pkrj);
                    $('#id-pkrj').val(data.pengkajian_awal_keperawatan_rajal.id);
                    // $('#id-pkrj').val(data.pengkajian_awal_keperawatan_rajal.id_pkrj);
                    $('#keluhan-utama-pkrj').val(data.pengkajian_awal_keperawatan_rajal.keluhan_utama_pkrj);

                    const rpk_pkrj = JSON.parse(data.pengkajian_awal_keperawatan_rajal.rpk_pkrj); 
                    if (rpk_pkrj.rpk_pkrj_1 !== null) { $('#rpk-pkrj-1').prop('checked', true) }
                    if (rpk_pkrj.rpk_pkrj_2 !== null) { $('#rpk-pkrj-2').prop('checked', true) }
                    if (rpk_pkrj.rpk_pkrj_3 !== null) { $('#rpk-pkrj-3').prop('checked', true) }
                    if (rpk_pkrj.rpk_pkrj_4 !== null) { $('#rpk-pkrj-4').prop('checked', true) }
                    if (rpk_pkrj.rpk_pkrj_5 !== null) { $('#rpk-pkrj-5').prop('checked', true) }
                    if (rpk_pkrj.rpk_pkrj_6 !== null) {$('#rpk-pkrj-6').val(rpk_pkrj.rpk_pkrj_6);}
                    if (rpk_pkrj.rpk_pkrj_7 === '0') {$('#rpk-pkrj-7').prop('checked', true).change() }
                    if (rpk_pkrj.rpk_pkrj_7 === '1') {$('#rpk-pkrj-8').prop('checked', true).change () }
                    if (rpk_pkrj.rpk_pkrj_9 !== null) {$('#rpk-pkrj-9').val(rpk_pkrj.rpk_pkrj_9);}
                    if (rpk_pkrj.rpk_pkrj_10 === '0') {$('#rpk-pkrj-10').prop('checked', true).change() }
                    if (rpk_pkrj.rpk_pkrj_10 === '1') {$('#rpk-pkrj-11').prop('checked', true).change () }
                    if (rpk_pkrj.rpk_pkrj_12 !== null) {$('#rpk-pkrj-12').val(rpk_pkrj.rpk_pkrj_12);}
                    if (rpk_pkrj.rpk_pkrj_13 === '0') {$('#rpk-pkrj-13').prop('checked', true).change() }
                    if (rpk_pkrj.rpk_pkrj_13 === '1') {$('#rpk-pkrj-14').prop('checked', true).change () }
                    if (rpk_pkrj.rpk_pkrj_15 === '0') {$('#rpk-pkrj-15').prop('checked', true).change() }
                    if (rpk_pkrj.rpk_pkrj_15 === '1') {$('#rpk-pkrj-16').prop('checked', true).change () }
                    if (rpk_pkrj.rpk_pkrj_17 === '0') {$('#rpk-pkrj-17').prop('checked', true).change() }
                    if (rpk_pkrj.rpk_pkrj_17 === '1') {$('#rpk-pkrj-18').prop('checked', true).change () }
                    if (rpk_pkrj.rpk_pkrj_19 !== null) {$('#rpk-pkrj-19').val(rpk_pkrj.rpk_pkrj_19);}
                    if (rpk_pkrj.rpk_pkrj_20 !== null) {$('#rpk-pkrj-20').val(rpk_pkrj.rpk_pkrj_20);}
                    if (rpk_pkrj.rpk_pkrj_21 === '0') {$('#rpk-pkrj-21').prop('checked', true).change() }
                    if (rpk_pkrj.rpk_pkrj_21 === '1') {$('#rpk-pkrj-22').prop('checked', true).change () }
                    if (rpk_pkrj.rpk_pkrj_21 === '2') {$('#rpk-pkrj-23').prop('checked', true).change () }
                    if (rpk_pkrj.rpk_pkrj_24 !== null) {$('#rpk-pkrj-24').val(rpk_pkrj.rpk_pkrj_24);}

                    const riwayat_pkrj = JSON.parse(data.pengkajian_awal_keperawatan_rajal.riwayat_pkrj); 
                    if (riwayat_pkrj.riwayat_pkrj_1 === '1') {$('#riwayat-pkrj-1').prop('checked', true).change() }
                    if (riwayat_pkrj.riwayat_pkrj_1 === '0') {$('#riwayat-pkrj-2').prop('checked', true).change () }
                    if (riwayat_pkrj.riwayat_pkrj_3 !== null) { $('#riwayat-pkrj-3').prop('checked', true) }
                    if (riwayat_pkrj.riwayat_pkrj_4 !== null) { $('#riwayat-pkrj-4').prop('checked', true) }
                    if (riwayat_pkrj.riwayat_pkrj_5 !== null) { $('#riwayat-pkrj-5').prop('checked', true) }
                    if (riwayat_pkrj.riwayat_pkrj_6 !== null) { $('#riwayat-pkrj-6').prop('checked', true) }
                    if (riwayat_pkrj.riwayat_pkrj_7 !== null) { $('#riwayat-pkrj-7').prop('checked', true) }
                    if (riwayat_pkrj.riwayat_pkrj_8 !== null) { $('#riwayat-pkrj-8').prop('checked', true) }
                    if (riwayat_pkrj.riwayat_pkrj_9 !== null) {$('#riwayat-pkrj-9').val(riwayat_pkrj.riwayat_pkrj_9);}
                    if (riwayat_pkrj.riwayat_pkrj_10 !== null) { $('#riwayat-pkrj-10').prop('checked', true) }
                    if (riwayat_pkrj.riwayat_pkrj_11 !== null) {$('#riwayat-pkrj-11').val(riwayat_pkrj.riwayat_pkrj_11);}

                    const status_pkrj = JSON.parse(data.pengkajian_awal_keperawatan_rajal.status_pkrj); 
                    if (status_pkrj.status_pkrj_1 === '1') {$('#status-pkrj-1').prop('checked', true).change() }
                    if (status_pkrj.status_pkrj_1 === '2') {$('#status-pkrj-2').prop('checked', true).change () }
                    if (status_pkrj.status_pkrj_1 === '3') {$('#status-pkrj-3').prop('checked', true).change() }
                    if (status_pkrj.status_pkrj_1 === '4') {$('#status-pkrj-4').prop('checked', true).change () }
                    if (status_pkrj.status_pkrj_1 === '5') {$('#status-pkrj-5').prop('checked', true).change() }
                    if (status_pkrj.status_pkrj_1 === '6') {$('#status-pkrj-6').prop('checked', true).change () }
                    if (status_pkrj.status_pkrj_7 !== null) {$('#status-pkrj-7').val(status_pkrj.status_pkrj_7);}
                    if (status_pkrj.status_pkrj_8 === '1') {$('#status-pkrj-8').prop('checked', true).change() }
                    if (status_pkrj.status_pkrj_8 === '2') {$('#status-pkrj-9').prop('checked', true).change () }
                    if (status_pkrj.status_pkrj_8 === '3') {$('#status-pkrj-10').prop('checked', true).change() }
                    if (status_pkrj.status_pkrj_11 !== null) {$('#status-pkrj-11').val(status_pkrj.status_pkrj_11);}
                    if (status_pkrj.status_pkrj_12 !== null) { $('#status-pkrj-12').prop('checked', true) }
                    if (status_pkrj.status_pkrj_13 !== null) {$('#status-pkrj-13').val(status_pkrj.status_pkrj_13);}
                   
                    const pemeriksaan_pkrj = JSON.parse(data.pengkajian_awal_keperawatan_rajal.pemeriksaan_pkrj); 
                    if (pemeriksaan_pkrj.pemeriksaan_pkrj_1 !== null) {$('#pemeriksaan-pkrj-1').val(pemeriksaan_pkrj.pemeriksaan_pkrj_1);}
                    if (pemeriksaan_pkrj.pemeriksaan_pkrj_2 !== null) {$('#pemeriksaan-pkrj-2').val(pemeriksaan_pkrj.pemeriksaan_pkrj_2);}
                    if (pemeriksaan_pkrj.pemeriksaan_pkrj_3 !== null) {$('#pemeriksaan-pkrj-3').val(pemeriksaan_pkrj.pemeriksaan_pkrj_3);}
                    if (pemeriksaan_pkrj.pemeriksaan_pkrj_4 !== null) {$('#pemeriksaan-pkrj-4').val(pemeriksaan_pkrj.pemeriksaan_pkrj_4);}
                    if (pemeriksaan_pkrj.pemeriksaan_pkrj_5 !== null) {$('#pemeriksaan-pkrj-5').val(pemeriksaan_pkrj.pemeriksaan_pkrj_5);}
                    if (pemeriksaan_pkrj.pemeriksaan_pkrj_6 !== null) {$('#pemeriksaan-pkrj-6').val(pemeriksaan_pkrj.pemeriksaan_pkrj_6);}
                    if (pemeriksaan_pkrj.pemeriksaan_pkrj_7 !== null) {$('#pemeriksaan-pkrj-7').val(pemeriksaan_pkrj.pemeriksaan_pkrj_7);}

                    const pengkajian_pkrj = JSON.parse(data.pengkajian_awal_keperawatan_rajal.pengkajian_pkrj); 
                    if (pengkajian_pkrj.pengkajian_pkrj_1 !== null) {$('#pengkajian-pkrj-1').val(pengkajian_pkrj.pengkajian_pkrj_1);}
                    if (pengkajian_pkrj.pengkajian_pkrj_2 !== null) { $('#pengkajian-pkrj-2').prop('checked', true) }
                    if (pengkajian_pkrj.pengkajian_pkrj_3 !== null) { $('#pengkajian-pkrj-3').prop('checked', true) }
                    if (pengkajian_pkrj.pengkajian_pkrj_4 !== null) { $('#pengkajian-pkrj-4').prop('checked', true) }
                    // if (pengkajian_pkrj.pengkajian_pkrj_5 !== null) { $('#pengkajian-pkrj-5').prop('checked', true) }
                    if (pengkajian_pkrj.pengkajian_pkrj_6 !== null) {$('#pengkajian-pkrj-6').val(pengkajian_pkrj.pengkajian_pkrj_6);}
                    if (pengkajian_pkrj.pengkajian_pkrj_7 !== null) { $('#pengkajian-pkrj-7').prop('checked', true) }
                    if (pengkajian_pkrj.pengkajian_pkrj_8 !== null) { $('#pengkajian-pkrj-8').prop('checked', true) }
                    if (pengkajian_pkrj.pengkajian_pkrj_9 !== null) { $('#pengkajian-pkrj-9').prop('checked', true) }
                    if (pengkajian_pkrj.pengkajian_pkrj_10 !== null) { $('#pengkajian-pkrj-10').prop('checked', true) }
                    if (pengkajian_pkrj.pengkajian_pkrj_11 !== null) { $('#pengkajian-pkrj-11').prop('checked', true) }

                    const status_fung_pkrj = JSON.parse(data.pengkajian_awal_keperawatan_rajal.status_fung_pkrj); 
                    if (status_fung_pkrj.status_fung_pkrj_1 !== null) { $('#status-fung-pkrj-1').prop('checked', true) }
                    if (status_fung_pkrj.status_fung_pkrj_2 !== null) { $('#status-fung-pkrj-2').prop('checked', true) }
                    if (status_fung_pkrj.status_fung_pkrj_3 !== null) {$('#status-fung-pkrj-3').val(status_fung_pkrj.status_fung_pkrj_3);}
                    if (status_fung_pkrj.status_fung_pkrj_4 !== null) { $('#status-fung-pkrj-4').prop('checked', true) }
                    if (status_fung_pkrj.status_fung_pkrj_5 !== null) {$('#status-fung-pkrj-5').val(status_fung_pkrj.status_fung_pkrj_5);}

                    const cidera_pkrj = JSON.parse(data.pengkajian_awal_keperawatan_rajal.cidera_pkrj); 
                    if (cidera_pkrj.cidera_pkrj_1 === '1') {$('#cidera-pkrj-1').prop('checked', true).change() }
                    if (cidera_pkrj.cidera_pkrj_1 === '0') {$('#cidera-pkrj-2').prop('checked', true).change () }
                    if (cidera_pkrj.cidera_pkrj_3 === '1') {$('#cidera-pkrj-3').prop('checked', true).change() }
                    if (cidera_pkrj.cidera_pkrj_3 === '0') {$('#cidera-pkrj-4').prop('checked', true).change () }
                    if (cidera_pkrj.cidera_pkrj_5 === '1') {$('#cidera-pkrj-5').prop('checked', true).change () }
                    if (cidera_pkrj.cidera_pkrj_5 === '2') {$('#cidera-pkrj-6').prop('checked', true).change() }
                    if (cidera_pkrj.cidera_pkrj_5 === '3') {$('#cidera-pkrj-7').prop('checked', true).change () }

                    if (data.pengkajian_awal_keperawatan_rajal.sn_penurunan_bb_pkrj == 1) {
                        $('#sn-pkrj-tidak').prop('checked', true);
                        calcscorerjl();

                    } else if (data.pengkajian_awal_keperawatan_rajal.sn_penurunan_bb_pkrj == 2) {
                        $('#sn-pkrj-tidak-yakin').prop('checked', true);
                        calcscorerjl();

                    } else if (data.pengkajian_awal_keperawatan_rajal.sn_penurunan_bb_pkrj == 3) {
                        $('#sn-pkrj-ya').prop('checked', true).change();

                        if (data.pengkajian_awal_keperawatan_rajal.sn_penurunan_bb_on_pkrj == 1) {
                            $('#sn-pkrj-pbb-1-1').prop('checked', true);
                            calcscorerjl();

                        } else if (data.pengkajian_awal_keperawatan_rajal.sn_penurunan_bb_on_pkrj == 2) {
                            $('#sn-pkrj-pbb-2-2').prop('checked', true);
                            calcscorerjl();

                        } else if (data.pengkajian_awal_keperawatan_rajal.sn_penurunan_bb_on_pkrj == 3) {
                            $('#sn-pkrj-pbb-3-3').prop('checked', true);
                            calcscorerjl();

                        } else if (data.pengkajian_awal_keperawatan_rajal.sn_penurunan_bb_on_pkrj == 4) {
                            $('#sn-pkrj-pbb-4-4').prop('checked', true);
                            calcscorerjl();

                        } else if (data.pengkajian_awal_keperawatan_rajal.sn_penurunan_bb_on_pkrj == 5) {
                            $('#sn-pkrj-pbb-5-5').prop('checked', true);
                            calcscorerjl();
                        }
                    }

                    if (data.pengkajian_awal_keperawatan_rajal.sn_asupan_makan_pkrj == 0) {
                        $('#sn-pkrj-asupan-makan-tidak').prop('checked', true);
                        calcscorerjl();
                    } else if (data.pengkajian_awal_keperawatan_rajal.sn_asupan_makan_pkrj == 1) {
                        $('#sn-pkrj-asupan-makan-ya').prop('checked', true);
                        calcscorerjl();
                    }

                    const keterangan_pkrj = JSON.parse(data.pengkajian_awal_keperawatan_rajal.keterangan_pkrj); 
                    if (keterangan_pkrj.keterangan_pkrj_1 === '1') {$('#keterangan-pkrj-1').prop('checked', true).change() }
                    if (keterangan_pkrj.keterangan_pkrj_1 === '2') {$('#keterangan-pkrj-2').prop('checked', true).change () }
                    if (keterangan_pkrj.keterangan_pkrj_1 === '3') {$('#keterangan-pkrj-3').prop('checked', true).change() }
                    if (keterangan_pkrj.keterangan_pkrj_1 === '4') {$('#keterangan-pkrj-4').prop('checked', true).change () }
                    if (keterangan_pkrj.keterangan_pkrj_5 !== null) { $('#keterangan-pkrj-5').prop('checked', true) }
                    if (keterangan_pkrj.keterangan_pkrj_6 !== null) { $('#keterangan-pkrj-6').prop('checked', true) }
                    if (keterangan_pkrj.keterangan_pkrj_7 !== null) { $('#keterangan-pkrj-7').prop('checked', true) }
                    if (keterangan_pkrj.keterangan_pkrj_8 !== null) {$('#keterangan-pkrj-8').val(keterangan_pkrj.keterangan_pkrj_8);}
                    if (keterangan_pkrj.keterangan_pkrj_9 !== null) {$('#keterangan-pkrj-9').val(keterangan_pkrj.keterangan_pkrj_9);}
                    if (keterangan_pkrj.keterangan_pkrj_10 !== null) {$('#keterangan-pkrj-10').val(keterangan_pkrj.keterangan_pkrj_10);}
                    if (keterangan_pkrj.keterangan_pkrj_11 !== null) {$('#keterangan-pkrj-11').val(keterangan_pkrj.keterangan_pkrj_11);}
                    if (keterangan_pkrj.keterangan_pkrj_12 !== null) { $('#keterangan-pkrj-12').prop('checked', true) }
                    if (keterangan_pkrj.keterangan_pkrj_13 !== null) { $('#keterangan-pkrj-13').prop('checked', true) }
                    if (keterangan_pkrj.keterangan_pkrj_14 !== null) { $('#keterangan-pkrj-14').prop('checked', true) }
                    if (keterangan_pkrj.keterangan_pkrj_15 !== null) { $('#keterangan-pkrj-15').prop('checked', true) }
                    if (keterangan_pkrj.keterangan_pkrj_16 !== null) { $('#keterangan-pkrj-16').prop('checked', true) }
                    if (keterangan_pkrj.keterangan_pkrj_17 !== null) {$('#keterangan-pkrj-17').val(keterangan_pkrj.keterangan_pkrj_17);}
                    if (keterangan_pkrj.keterangan_pkrj_18 === '0') {$('#keterangan-pkrj-18').prop('checked', true).change() }
                    if (keterangan_pkrj.keterangan_pkrj_18 === '1') {$('#keterangan-pkrj-19').prop('checked', true).change () }
                    if (keterangan_pkrj.keterangan_pkrj_20 !== null) {$('#keterangan-pkrj-20').val(keterangan_pkrj.keterangan_pkrj_20);}

                    const masalah_kep_pkrj = JSON.parse(data.pengkajian_awal_keperawatan_rajal.masalah_kep_pkrj); 
                    if (masalah_kep_pkrj.masalah_kep_pkrj_1 !== null) { $('#masalah-kep-pkrj-1').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_2 !== null) { $('#masalah-kep-pkrj-2').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_3 !== null) { $('#masalah-kep-pkrj-3').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_4 !== null) { $('#masalah-kep-pkrj-4').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_5 !== null) { $('#masalah-kep-pkrj-5').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_6 !== null) { $('#masalah-kep-pkrj-6').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_7 !== null) { $('#masalah-kep-pkrj-7').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_8 !== null) { $('#masalah-kep-pkrj-8').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_9 !== null) { $('#masalah-kep-pkrj-9').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_10 !== null) { $('#masalah-kep-pkrj-10').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_11 !== null) { $('#masalah-kep-pkrj-11').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_12 !== null) { $('#masalah-kep-pkrj-12').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_13 !== null) { $('#masalah-kep-pkrj-13').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_14 !== null) { $('#masalah-kep-pkrj-14').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_15 !== null) { $('#masalah-kep-pkrj-15').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_16 !== null) { $('#masalah-kep-pkrj-16').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_17 !== null) { $('#masalah-kep-pkrj-17').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_18 !== null) { $('#masalah-kep-pkrj-18').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_19 !== null) { $('#masalah-kep-pkrj-19').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_20 !== null) { $('#masalah-kep-pkrj-20').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_21 !== null) { $('#masalah-kep-pkrj-21').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_22 !== null) { $('#masalah-kep-pkrj-22').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_23 !== null) { $('#masalah-kep-pkrj-23').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_24 !== null) { $('#masalah-kep-pkrj-24').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_25 !== null) { $('#masalah-kep-pkrj-25').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_26 !== null) { $('#masalah-kep-pkrj-26').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_27 !== null) { $('#masalah-kep-pkrj-27').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_28 !== null) {$('#masalah-kep-pkrj-28').val(masalah_kep_pkrj.masalah_kep_pkrj_28);}
                    if (masalah_kep_pkrj.masalah_kep_pkrj_29 !== null) { $('#masalah-kep-pkrj-29').prop('checked', true) }
                    if (masalah_kep_pkrj.masalah_kep_pkrj_30 !== null) { $('#masalah-kep-pkrj-30').prop('checked', true) }

                    $('#tanggal-jam-perawat-pkrj').val((data.pengkajian_awal_keperawatan_rajal.tanggal_jam_perawat_pkrj !== null ? datetimefmysql(data.pengkajian_awal_keperawatan_rajal.tanggal_jam_perawat_pkrj) : ''));
                    if (data.pengkajian_awal_keperawatan_rajal.perawat_pkrj !== null) { $('#perawat-pkrj').select2c('readonly', false)}
                    $('#perawat-pkrj').val(data.pengkajian_awal_keperawatan_rajal.perawat_pkrj);
                    $('#s2id_perawat-pkrj a .select2c-chosen').html(data.pengkajian_awal_keperawatan_rajal.perawat);
                    if (data.ttd_perawat_pkrj !== null) {
                        $('#ttd-perawat-pkrj').hide();
                        $('#ttd_perawat_pkrj_verified').show();
                    }

                    $('#tanggal-jam-dokter-pkrj').val((data.pengkajian_awal_keperawatan_rajal.tanggal_jam_dokter_pkrj !== null ? datetimefmysql(data.pengkajian_awal_keperawatan_rajal.tanggal_jam_dokter_pkrj) : ''));
                    if (data.pengkajian_awal_keperawatan_rajal.dokter_pkrj !== null) { $('#dokter-pkrj').select2c('readonly', false)}
                    $('#dokter-pkrj').val(data.pengkajian_awal_keperawatan_rajal.dokter_pkrj);
                    $('#s2id_dokter-pkrj a .select2c-chosen').html(data.pengkajian_awal_keperawatan_rajal.dokter);
                    if (data.ttd_dokter_pkrj !== null) {
                        $('#ttd-dokter-pkrj').hide();
                        $('#ttd_dokter_pkrj_verified').show();
                    }                  
                }           
                $('#bed-pkrj').text(bed);
                $('#tanggal-jam-pkrj').text(tanggal);
                $('#modal_pengkajian_kep_rajal').modal('show');        
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })

    }   

    function resetFormPengkajianKeperawatanRajal() {
        $('#wizard-keperawatan-rajal').bwizard('show', '0');
        $('#form_entri_keperawatan_rajal')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#id-pkrj').val('');

        // perawat / dokter Tulisan pilih
        $('#s2id_perawat-pkrj a .select2c-chosen').html('Pilih Perawat');
        $('#s2id_dokter-pkrj a .select2c-chosen').html('Pilih Dokter DPJP');

        // Perawat / Dokter
        $('#perawat-pkrj, #dokter-pkrj').val('');
         // s2id perawat
        $('#s2id_perawat-pkrj a .select2c-chosen, #s2id_dokter-pkrj a .select2c-chosen').empty();

        // CEKLIS TTTD PERAWAT OR DOKTER 
        $('#ttd-perawat-pkrj').show();
        $('#ttd_perawat_pkrj_verified').hide();
        $('#ttd-dokter-pkrj').show();         
        $('#ttd_dokter_pkrj_verified').hide();

        $('#tanggal-jam-perawat-pkrj, #tanggal-jam-dokter-pkrj').attr('disabled', false);
        $('#perawat-pkrj, #dokter-pkrj').select2c('readonly',false);
    }



    

    // function konfirmasiSimpanEntriFormKeperawatanRajal() {
    //     ($('#form_entri_keperawatan_rajal').serialize()); 
    //         var stop = false;

    //         if ($('#tanggal-jam-perawat-pkrj').val() === '') {
    //             syams_validation('#tanggal-jam-perawat-pkrj', 'Kolom waktu verifikasi perawat harus diisi!');
    //             $('#tanggal-jam-perawat-pkrj').focus();
    //             $('#wizard-keperawatan-pkrj').bwizard('show', '0');
    //             stop = true;
    //         }

    //         if ($('#perawat-pkrj').val() === '') {
    //             syams_validation('#perawat-pkrj', 'Kolom perawat harus dipilih!');
    //             $('#wizard-keperawatan-pkrj').bwizard('show', '0');
    //             stop = true;
    //         }

    //         if ($('#tanggal-jam-dokter-pkrj').val() === '' && !stop) {
    //             syams_validation('#tanggal-jam-dokter-pkrj', 'Kolom waktu verifikasi dokter harus diisi!');
    //             $('#tanggal-jam-dokter-pkrj').focus();
    //             $('#wizard-kedokteran-pkrj').bwizard('show', '0');
    //             stop = true;
    //         }

    //         if ($('#dokter-pkrj').val() === '' && !stop) {
    //             syams_validation('#dokter-pkrj', 'Kolom dokter harus dipilih!');
    //             $('#wizard-keperawatan-pkrj').bwizard('show', '0');
    //             stop = true;
    //         }



    //         var id_pkrj = $('#id-pkrj').val();
    //         if (id_pkrj) {
    //             var text = 'Apakah anda yakin ingin mengupdate data ini ?';
    //             var btnTextConfirmPkrj = 'Update';
    //         } else {
    //             text = 'Apakah anda yakin ingin menyimpan data ini ?';
    //             btnTextConfirmPkrj = 'Simpan';
    //         }
    //     swal.fire({
    //         // title: 'Simpan Pengkajian Keperawatan Rajal',
    //         // text: "Apakah anda yakin akan menyimpan Data ini ?",
    //         // icon: 'question',
    //         title: 'Konfirmasi ?',
    //         html: text,
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmPkrj,
    //         // confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
    //         cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.value) {
    //             SimpanEntriFormKeperawatanRajal();
    //         }
    //     })
    // }


    // baru
    function konfirmasiSimpanEntriFormKeperawatanRajal() {
        var stop = false;
        if ($('#tanggal-jam-perawat-pkrj').val() === '') {
            syams_validation('#tanggal-jam-perawat-pkrj', 'Kolom waktu verifikasi perawat harus diisi!');
            $('#tanggal-jam-perawat-pkrj').focus();
            $('#wizard-keperawatan-pkrj').bwizard('show', '0');
            stop = true;
        }

        if ($('#perawat-pkrj').val() === '') {
            syams_validation('#perawat-pkrj', 'Kolom perawat harus dipilih!');
            $('#wizard-keperawatan-pkrj').bwizard('show', '0');
            stop = true;
        }

        if ($('#tanggal-jam-dokter-pkrj').val() === '' && !stop) {
            syams_validation('#tanggal-jam-dokter-pkrj', 'Kolom waktu verifikasi dokter harus diisi!');
            $('#tanggal-jam-dokter-pkrj').focus();
            $('#wizard-kedokteran-pkrj').bwizard('show', '0');
            stop = true;
        }

        if ($('#dokter-pkrj').val() === '' && !stop) {
            syams_validation('#dokter-pkrj', 'Kolom dokter harus dipilih!');
            $('#wizard-keperawatan-pkrj').bwizard('show', '0');
            stop = true;
        }

        if (!stop) {
            var id_pkrj = $('#id-pkrj').val();
            var text;
            var btnTextConfirmPkrj;

            if (id_pkrj) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmPkrj = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmPkrj = 'Simpan';
            }

            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmPkrj,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    SimpanEntriFormKeperawatanRajal();
                }
            });
        }
    }

 
    function SimpanEntriFormKeperawatanRajal() {
        var id_layanan_pendaftaran_pkrj = $('#id-layanan-pendaftaran-pkrj').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pemeriksaan_poli/api/pemeriksaan_poli/simpan_data_pengkajian_keperawatan_rajal") ?>',
            data: $('#form_entri_keperawatan_rajal').serialize() + '&id-layanan-pendaftaran-pkrj=' + id_layanan_pendaftaran_pkrj,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-keperawatan-pkrj').bwizard('show', data.respon.show);

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
                        $('#modal_pengkajian_kep_rajal').modal('hide');
                        showListForm($('#id-pendaftaran-pkrj').val(), $('#id-layanan-pendaftaran-pkrj').val(), $('#id-pasien-pkrj').val());
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

    function calcscorerjl() {
        var score = 0;
        $("input[name='sn_penurunan_bb_pkrj']:checked").each(function() {
            if ($(this).val() == '1') {
                score += parseInt(0);
            } else if ($(this).val() == '2') {
                score += parseInt(2);
            } else if ($(this).val() == '3') {
                $("input[name='sn_penurunan_bb_on_pkrj']:checked").each(function() {
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

        $("input[name='sn_asupan_makan_pkrj']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
        });
        $("input[name=sn_total_pkrj]").val(score);
    }   

</script>