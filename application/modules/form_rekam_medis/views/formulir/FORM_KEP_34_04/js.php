<!--// PAKARJ  -->
<script>
    $(function() {
        // nomer++;     
        $("#wizard-keperawatan-anak").bwizard();

        $('#btn-expand-all-keperawatan-anak').click(function() {
            $('.multi-collapse').addClass('show');
        });

        $('#btn-collapse-all-keperawatan-anak').click(function() {
            $('.multi-collapse').removeClass('show');
        });


        $('#tanggal-jam-perawat-anak, #tanggal-jam-dokter-anak')
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

        $('#status-fung-anak-5')
        .on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false
            });
        })


        // PAKARJ
        $('#perawat-anak').select2c({
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

        $('#dokter-anak').select2c({
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

        $('[name="riwayat_kes_1"]').on('change', function() {
            if ($(this).attr('id') === 'riwayat-kes-2' && $(this).is(':checked')) {
                $('#riwayat-kes-3').prop('disabled', false);
            } else {
                $('#riwayat-kes-3').prop('disabled', true);
            }
        })

        $('#riwayat-kes-8').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-kes-9').prop('disabled', false);
            } else {
                $('#riwayat-kes-9').val('');
                $('#riwayat-kes-9').prop('disabled', true);
            }
        });

        $('[name="riwayat_kes_10"]').on('change', function() {
            if ($(this).attr('id') === 'riwayat-kes-11' && $(this).is(':checked')) {
                $('#riwayat-kes-12').prop('disabled', false);
            } else {
                $('#riwayat-kes-12').prop('disabled', true);
            }
            if ($(this).attr('id') === 'riwayat-kes-11' && $(this).is(':checked')) {
                $('#riwayat-kes-13').prop('disabled', false);
            } else {
                $('#riwayat-kes-13').prop('disabled', true);
            }
        })

        $('[name="riwayat_kes_14"]').on('change', function() {
            if ($(this).attr('id') === 'riwayat-kes-16' && $(this).is(':checked')) {
                $('#riwayat-kes-17').prop('disabled', false);
            } else {
                $('#riwayat-kes-17').prop('disabled', true);
            }
        })

        $('#riwayat-pesi-8').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-pesi-9').prop('disabled', false);
            } else {
                $('#riwayat-pesi-9').val('');
                $('#riwayat-pesi-9').prop('disabled', true);
            }
        });

        $('#riwayat-pesi-10').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-pesi-11').prop('disabled', false);
            } else {
                $('#riwayat-pesi-11').val('');
                $('#riwayat-pesi-11').prop('disabled', true);
            }
        });

        $('#riwayat-pesi-12').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-pesi-13').prop('disabled', false);
            } else {
                $('#riwayat-pesi-13').val('');
                $('#riwayat-pesi-13').prop('disabled', true);
            }
        });

        $('[name="status_ekom_1"]').on('change', function() {
            if ($(this).attr('id') === 'status-ekom-3' && $(this).is(':checked')) {
                $('#status-ekom-4').prop('disabled', false);
            } else {
                $('#status-ekom-4').prop('disabled', true);
            }
        })

        $('#status-ekom-5').click(function() {
            if ($(this).is(":checked")) {
                $('#status-ekom-6').prop('disabled', false);
            } else {
                $('#status-ekom-6').val('');
                $('#status-ekom-6').prop('disabled', true);
            }
        });

        $('#riwayat-kelahiran-1').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-kelahiran-2').prop('disabled', false);
            } else {
                $('#riwayat-kelahiran-2').val('');
                $('#riwayat-kelahiran-2').prop('disabled', true);
            }
        });

        $('#riwayat-kelahiran-3').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-kelahiran-4').prop('disabled', false);
            } else {
                $('#riwayat-kelahiran-4').val('');
                $('#riwayat-kelahiran-4').prop('disabled', true);
            }
        });

        $('#riwayat-kelahiran-5').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-kelahiran-6').prop('disabled', false);
            } else {
                $('#riwayat-kelahiran-6').val('');
                $('#riwayat-kelahiran-6').prop('disabled', true);
            }
        });

        
        $('#riwayat-imunisasi-8').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-imunisasi-9').prop('disabled', false);
            } else {
                $('#riwayat-imunisasi-9').val('');
                $('#riwayat-imunisasi-9').prop('disabled', true);
            }
        });

        $('#riwayat-tumbuh-1').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-tumbuh-2').prop('disabled', false);
            } else {
                $('#riwayat-tumbuh-2').val('');
                $('#riwayat-tumbuh-2').prop('disabled', true);
            }
        });

        $('#riwayat-tumbuh-3').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-tumbuh-4').prop('disabled', false);
            } else {
                $('#riwayat-tumbuh-4').val('');
                $('#riwayat-tumbuh-4').prop('disabled', true);
            }
        });

        $('#riwayat-tumbuh-5').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-tumbuh-6').prop('disabled', false);
            } else {
                $('#riwayat-tumbuh-6').val('');
                $('#riwayat-tumbuh-6').prop('disabled', true);
            }
        });

        $('#riwayat-tumbuh-7').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-tumbuh-8').prop('disabled', false);
            } else {
                $('#riwayat-tumbuh-8').val('');
                $('#riwayat-tumbuh-8').prop('disabled', true);
            }
        });

        $('#riwayat-tumbuh-9').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-tumbuh-10').prop('disabled', false);
            } else {
                $('#riwayat-tumbuh-10').val('');
                $('#riwayat-tumbuh-10').prop('disabled', true);
            }
        });

        $('#riwayat-tumbuh-11').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-tumbuh-12').prop('disabled', false);
            } else {
                $('#riwayat-tumbuh-12').val('');
                $('#riwayat-tumbuh-12').prop('disabled', true);
            }
        });

        $('#riwayat-tumbuh-13').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-tumbuh-14').prop('disabled', false);
            } else {
                $('#riwayat-tumbuh-14').val('');
                $('#riwayat-tumbuh-14').prop('disabled', true);
            }
        });

        $('#riwayat-tumbuh-15').click(function() {
            if ($(this).is(":checked")) {
                $('#riwayat-tumbuh-16').prop('disabled', false);
            } else {
                $('#riwayat-tumbuh-16').val('');
                $('#riwayat-tumbuh-16').prop('disabled', true);
            }
        });

        $('#kebutuhan-komunikasi-2').click(function() {
            if ($(this).is(":checked")) {
                $('#kebutuhan-komunikasi-3').prop('disabled', false);
            } else {
                $('#kebutuhan-komunikasi-3').val('');
                $('#kebutuhan-komunikasi-3').prop('disabled', true);
            }
        });

        $('[name="kebutuhan_komunikasi_4"]').on('change', function() {
            if ($(this).attr('id') === 'kebutuhan-komunikasi-5' && $(this).is(':checked')) {
                $('#kebutuhan-komunikasi-6').prop('disabled', false);
            } else {
                $('#kebutuhan-komunikasi-6').prop('disabled', true);
            }
        })

        $('[name="kebutuhan_komunikasi_9"]').on('change', function() {
            if ($(this).attr('id') === 'kebutuhan-komunikasi-10' && $(this).is(':checked')) {
                $('#kebutuhan-komunikasi-11').prop('disabled', false);
            } else {
                $('#kebutuhan-komunikasi-11').prop('disabled', true);
            }
        })

        
        $('#kebutuhan-komunikasi-15').click(function() {
            if ($(this).is(":checked")) {
                $('#kebutuhan-komunikasi-16').prop('disabled', false);
            } else {
                $('#kebutuhan-komunikasi-16').val('');
                $('#kebutuhan-komunikasi-16').prop('disabled', true);
            }
        });

        $('#pengkajian-spiritual-5').click(function() {
            if ($(this).is(":checked")) {
                $('#pengkajian-spiritual-6').prop('disabled', false);
            } else {
                $('#pengkajian-spiritual-6').val('');
                $('#pengkajian-spiritual-6').prop('disabled', true);
            }
        });

        $('#nyeri-hilang-anak-5').click(function() {
            if ($(this).is(":checked")) {
                $('#nyeri-hilang-anak-6').prop('disabled', false);
            } else {
                $('#nyeri-hilang-anak-6').val('');
                $('#nyeri-hilang-anak-6').prop('disabled', true);
            }
        });

        $('#status-fung-anak-2').click(function() {
            if ($(this).is(":checked")) {
                $('#status-fung-anak-3').prop('disabled', false);
            } else {
                $('#status-fung-anak-3').val('');
                $('#status-fung-anak-3').prop('disabled', true);
            }
        });

        $('#status-fung-anak-4').click(function() {
            if ($(this).is(":checked")) {
                $('#status-fung-anak-5').prop('disabled', false);
            } else {
                $('#status-fung-anak-5').val('');
                $('#status-fung-anak-5').prop('disabled', true);
            }
        });

        $('#masalah-kep-anak-18').click(function() {
            if ($(this).is(":checked")) {
                $('#masalah-kep-anak-19').prop('disabled', false);
            } else {
                $('#masalah-kep-anak-19').val('');
                $('#masalah-kep-anak-19').prop('disabled', true);
            }
        });
    })
    
    // function lihatFORM_KEP_34_04(data) {
    //     let pasien = data.pasien;
    //     let layanan = data.layanan;
    //     let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
    //     let action = 'lihat';

    //     entriFormPengkajianAwalKeperawatanAnakRawatJalan(pasien.id, 1, layanan.layanan, layanan.tanggal_layanan, layanan.id_pendaftaran, layanan.id, action);
    // }

    // function editFORM_KEP_34_04(data) {
    //     let pasien = data.pasien;
    //     let layanan = data.layanan;
    //     let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
    //     let action = 'edit';

    //     entriFormPengkajianAwalKeperawatanAnakRawatJalan(pasien.id, 1, layanan.layanan, layanan.tanggal_layanan, layanan.id_pendaftaran, layanan.id, action);
    // }

    // function tambahFORM_KEP_34_04(data) {
    //     let pasien = data.pasien;
    //     let layanan = data.layanan;
    //     let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
    //     let action = 'tambah';

    //     entriFormPengkajianAwalKeperawatanAnakRawatJalan(pasien.id, 1, layanan.layanan, layanan.tanggal_layanan, layanan.id_pendaftaran, layanan.id, action);
    // }






    
    function lihatFORM_KEP_34_04(data) {
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
        entriFormPengkajianAwalKeperawatanAnakRawatJalan(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, layanan.tanggal_layanan, action);
    }

    function editFORM_KEP_34_04(data) {
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
        entriFormPengkajianAwalKeperawatanAnakRawatJalan(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, layanan.tanggal_layanan, action);
    }

    function tambahFORM_KEP_34_04(data) {
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
        entriFormPengkajianAwalKeperawatanAnakRawatJalan(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, layanan.tanggal_layanan, action);
    }
    
    // PAKARJ 
    function entriFormPengkajianAwalKeperawatanAnakRawatJalan(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, tanggal, action) {
        // $('#modal_form_keperawatan_anak_rm').modal('show');  

        $('#wizard-keperawatan-anak').bwizard('show', '0');
        
        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat' ) {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pemeriksaan_poli/api/pemeriksaan_poli/get_data_pengkajian_keperawatan_anak') ?>/id/' +id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
         
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
                // console.log(data);
                resetFormPengkajianAwalKeperawatanAnak(); 
                $('#id-layanan-pendaftaran-pakarj').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-pakarj').val(id_pendaftaran);

                if (data.pasien !== null) {
                    $('#id-pasien-pakarj').val(data.pasien.id_pasien);
                    $('#nama-pasien-pakarj').text(data.pasien.nama);
                    // $('#no-pakarj').text(data.pasien.id);
                    $('#no-pakarj').text(data.pasien.no_rm);
                    $('#tanggal-lahir-pakarj').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-pakarj').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }
   
                let pengkajian_awal_keperawatan_anak = data.pengkajian_awal_keperawatan_anak;

                if (data.pengkajian_awal_keperawatan_anak !== null) {                   
                    // $('#id-users').val(data.id_users);                   
                    $('#id-pakarj').val(data.pengkajian_awal_keperawatan_anak.id);
                    $('#keluhan-utama-pakarj').val(data.pengkajian_awal_keperawatan_anak.keluhan_utama_pakarj);
                    const riwayat_kes = JSON.parse(data.pengkajian_awal_keperawatan_anak.riwayat_kes); 
                    if (riwayat_kes.riwayat_kes_1 === '0') {$('#riwayat-kes-1').prop('checked', true).change() }
                    if (riwayat_kes.riwayat_kes_1 === '1') {$('#riwayat-kes-2').prop('checked', true).change () }
                    if (riwayat_kes.riwayat_kes_3 !== null) {$('#riwayat-kes-3').val(riwayat_kes.riwayat_kes_3);}
                    if (riwayat_kes.riwayat_kes_4 !== null) { $('#riwayat-kes-4').prop('checked', true) }
                    if (riwayat_kes.riwayat_kes_5 !== null) { $('#riwayat-kes-5').prop('checked', true) }
                    if (riwayat_kes.riwayat_kes_6 !== null) { $('#riwayat-kes-6').prop('checked', true) }
                    if (riwayat_kes.riwayat_kes_7 !== null) { $('#riwayat-kes-7').prop('checked', true) }
                    if (riwayat_kes.riwayat_kes_8 !== null) { $('#riwayat-kes-8').prop('checked', true) }
                    if (riwayat_kes.riwayat_kes_9 !== null) {$('#riwayat-kes-9').val(riwayat_kes.riwayat_kes_9);}
                    if (riwayat_kes.riwayat_kes_10 === '0') {$('#riwayat-kes-10').prop('checked', true).change() }
                    if (riwayat_kes.riwayat_kes_10 === '1') {$('#riwayat-kes-11').prop('checked', true).change () }
                    if (riwayat_kes.riwayat_kes_12 !== null) {$('#riwayat-kes-12').val(riwayat_kes.riwayat_kes_12);}
                    if (riwayat_kes.riwayat_kes_13 !== null) {$('#riwayat-kes-13').val(riwayat_kes.riwayat_kes_13);}
                    if (riwayat_kes.riwayat_kes_14 === '0') {$('#riwayat-kes-14').prop('checked', true).change() }
                    if (riwayat_kes.riwayat_kes_14 === '1') {$('#riwayat-kes-15').prop('checked', true).change () }
                    if (riwayat_kes.riwayat_kes_14 === '2') {$('#riwayat-kes-16').prop('checked', true).change () }
                    if (riwayat_kes.riwayat_kes_17 !== null) {$('#riwayat-kes-17').val(riwayat_kes.riwayat_kes_17);}

                    const riwayat_pesi = JSON.parse(data.pengkajian_awal_keperawatan_anak.riwayat_pesi); 
                    if (riwayat_pesi.riwayat_pesi_1 === '1') {$('#riwayat-pesi-1').prop('checked', true).change() }
                    if (riwayat_pesi.riwayat_pesi_1 === '0') {$('#riwayat-pesi-2').prop('checked', true).change () }
                    if (riwayat_pesi.riwayat_pesi_3 !== null) { $('#riwayat-pesi-3').prop('checked', true) }
                    if (riwayat_pesi.riwayat_pesi_4 !== null) { $('#riwayat-pesi-4').prop('checked', true) }
                    if (riwayat_pesi.riwayat_pesi_5 !== null) { $('#riwayat-pesi-5').prop('checked', true) }
                    if (riwayat_pesi.riwayat_pesi_6 !== null) { $('#riwayat-pesi-6').prop('checked', true) }
                    if (riwayat_pesi.riwayat_pesi_7 !== null) { $('#riwayat-pesi-7').prop('checked', true) }
                    if (riwayat_pesi.riwayat_pesi_8 !== null) { $('#riwayat-pesi-8').prop('checked', true) }
                    if (riwayat_pesi.riwayat_pesi_9 !== null) {$('#riwayat-pesi-9').val(riwayat_pesi.riwayat_pesi_9);}
                    if (riwayat_pesi.riwayat_pesi_10 !== null) { $('#riwayat-pesi-10').prop('checked', true) }
                    if (riwayat_pesi.riwayat_pesi_11 !== null) {$('#riwayat-pesi-11').val(riwayat_pesi.riwayat_pesi_11);}
                    if (riwayat_pesi.riwayat_pesi_12 !== null) { $('#riwayat-pesi-12').prop('checked', true) }
                    if (riwayat_pesi.riwayat_pesi_13 !== null) {$('#riwayat-pesi-13').val(riwayat_pesi.riwayat_pesi_13);}

                    const pemeriksaan_fisik = JSON.parse(data.pengkajian_awal_keperawatan_anak.pemeriksaan_fisik); 
                    if (pemeriksaan_fisik.pemeriksaan_fisik_1 !== null) {$('#pemeriksaan-fisik-1').val(pemeriksaan_fisik.pemeriksaan_fisik_1);}
                    if (pemeriksaan_fisik.pemeriksaan_fisik_2 !== null) {$('#pemeriksaan-fisik-2').val(pemeriksaan_fisik.pemeriksaan_fisik_2);}
                    if (pemeriksaan_fisik.pemeriksaan_fisik_3 !== null) {$('#pemeriksaan-fisik-3').val(pemeriksaan_fisik.pemeriksaan_fisik_3);}
                    if (pemeriksaan_fisik.pemeriksaan_fisik_4 !== null) {$('#pemeriksaan-fisik-4').val(pemeriksaan_fisik.pemeriksaan_fisik_4);}
                    if (pemeriksaan_fisik.pemeriksaan_fisik_5 !== null) {$('#pemeriksaan-fisik-5').val(pemeriksaan_fisik.pemeriksaan_fisik_5);}
                    if (pemeriksaan_fisik.pemeriksaan_fisik_6 !== null) {$('#pemeriksaan-fisik-6').val(pemeriksaan_fisik.pemeriksaan_fisik_6);}
                    if (pemeriksaan_fisik.pemeriksaan_fisik_7 !== null) {$('#pemeriksaan-fisik-7').val(pemeriksaan_fisik.pemeriksaan_fisik_7);}

                    const status_ekom = JSON.parse(data.pengkajian_awal_keperawatan_anak.status_ekom); 
                    if (status_ekom.status_ekom_1 === '1') {$('#status-ekom-1').prop('checked', true).change() }
                    if (status_ekom.status_ekom_1 === '2') {$('#status-ekom-2').prop('checked', true).change () }
                    if (status_ekom.status_ekom_1 === '3') {$('#status-ekom-3').prop('checked', true).change () }
                    if (status_ekom.status_ekom_4 !== null) {$('#status-ekom-4').val(status_ekom.status_ekom_4);}
                    if (status_ekom.status_ekom_5 !== null) { $('#status-ekom-5').prop('checked', true) }
                    if (status_ekom.status_ekom_6 !== null) {$('#status-ekom-6').val(status_ekom.status_ekom_6);}

                    const riwayat_kelahiran = JSON.parse(data.pengkajian_awal_keperawatan_anak.riwayat_kelahiran); 
                    if (riwayat_kelahiran.riwayat_kelahiran_1 !== null) { $('#riwayat-kelahiran-1').prop('checked', true) }
                    if (riwayat_kelahiran.riwayat_kelahiran_2 !== null) {$('#riwayat-kelahiran-2').val(riwayat_kelahiran.riwayat_kelahiran_2);}
                    if (riwayat_kelahiran.riwayat_kelahiran_3 !== null) { $('#riwayat-kelahiran-3').prop('checked', true) }
                    if (riwayat_kelahiran.riwayat_kelahiran_4 !== null) {$('#riwayat-kelahiran-4').val(riwayat_kelahiran.riwayat_kelahiran_4);}
                    if (riwayat_kelahiran.riwayat_kelahiran_5 !== null) { $('#riwayat-kelahiran-5').prop('checked', true) }
                    if (riwayat_kelahiran.riwayat_kelahiran_6 !== null) {$('#riwayat-kelahiran-6').val(riwayat_kelahiran.riwayat_kelahiran_6);}
                    if (riwayat_kelahiran.riwayat_kelahiran_7 === '1') {$('#riwayat-kelahiran-7').prop('checked', true).change () }
                    if (riwayat_kelahiran.riwayat_kelahiran_7 === '2') {$('#riwayat-kelahiran-8').prop('checked', true).change () }
                    if (riwayat_kelahiran.riwayat_kelahiran_7 === '3') {$('#riwayat-kelahiran-9').prop('checked', true).change () }
                    if (riwayat_kelahiran.riwayat_kelahiran_7 === '4') {$('#riwayat-kelahiran-10').prop('checked', true).change () }
                    if (riwayat_kelahiran.riwayat_kelahiran_11 === '1') {$('#riwayat-kelahiran-11').prop('checked', true).change () }
                    if (riwayat_kelahiran.riwayat_kelahiran_11 === '2') {$('#riwayat-kelahiran-12').prop('checked', true).change () }
                    if (riwayat_kelahiran.riwayat_kelahiran_13 === '1') {$('#riwayat-kelahiran-13').prop('checked', true).change () }
                    if (riwayat_kelahiran.riwayat_kelahiran_13 === '2') {$('#riwayat-kelahiran-14').prop('checked', true).change () }

                    const riwayat_imunisasi = JSON.parse(data.pengkajian_awal_keperawatan_anak.riwayat_imunisasi); 
                    if (riwayat_imunisasi.riwayat_imunisasi_1 !== null) { $('#riwayat-imunisasi-1').prop('checked', true) }
                    if (riwayat_imunisasi.riwayat_imunisasi_2 !== null) { $('#riwayat-imunisasi-2').prop('checked', true) }
                    if (riwayat_imunisasi.riwayat_imunisasi_3 !== null) { $('#riwayat-imunisasi-3').prop('checked', true) }
                    if (riwayat_imunisasi.riwayat_imunisasi_4 !== null) { $('#riwayat-imunisasi-4').prop('checked', true) }
                    if (riwayat_imunisasi.riwayat_imunisasi_5 !== null) { $('#riwayat-imunisasi-5').prop('checked', true) }
                    if (riwayat_imunisasi.riwayat_imunisasi_6 !== null) { $('#riwayat-imunisasi-6').prop('checked', true) }
                    if (riwayat_imunisasi.riwayat_imunisasi_7 !== null) { $('#riwayat-imunisasi-7').prop('checked', true) }
                    if (riwayat_imunisasi.riwayat_imunisasi_8 !== null) { $('#riwayat-imunisasi-8').prop('checked', true) }
                    if (riwayat_imunisasi.riwayat_imunisasi_9 !== null) {$('#riwayat-imunisasi-9').val(riwayat_imunisasi.riwayat_imunisasi_9);}

                    const riwayat_tumbuh = JSON.parse(data.pengkajian_awal_keperawatan_anak.riwayat_tumbuh); 
                    if (riwayat_tumbuh.riwayat_tumbuh_1 !== null) { $('#riwayat-tumbuh-1').prop('checked', true) }
                    if (riwayat_tumbuh.riwayat_tumbuh_2 !== null) {$('#riwayat-tumbuh-2').val(riwayat_tumbuh.riwayat_tumbuh_2);}
                    if (riwayat_tumbuh.riwayat_tumbuh_3 !== null) { $('#riwayat-tumbuh-3').prop('checked', true) }
                    if (riwayat_tumbuh.riwayat_tumbuh_4 !== null) {$('#riwayat-tumbuh-4').val(riwayat_tumbuh.riwayat_tumbuh_4);}
                    if (riwayat_tumbuh.riwayat_tumbuh_5 !== null) { $('#riwayat-tumbuh-5').prop('checked', true) }
                    if (riwayat_tumbuh.riwayat_tumbuh_6 !== null) {$('#riwayat-tumbuh-6').val(riwayat_tumbuh.riwayat_tumbuh_6);}
                    if (riwayat_tumbuh.riwayat_tumbuh_7 !== null) { $('#riwayat-tumbuh-7').prop('checked', true) }
                    if (riwayat_tumbuh.riwayat_tumbuh_8 !== null) {$('#riwayat-tumbuh-8').val(riwayat_tumbuh.riwayat_tumbuh_8);}
                    if (riwayat_tumbuh.riwayat_tumbuh_9 !== null) { $('#riwayat-tumbuh-9').prop('checked', true) }
                    if (riwayat_tumbuh.riwayat_tumbuh_10 !== null) {$('#riwayat-tumbuh-10').val(riwayat_tumbuh.riwayat_tumbuh_10);}
                    if (riwayat_tumbuh.riwayat_tumbuh_11 !== null) { $('#riwayat-tumbuh-11').prop('checked', true) }
                    if (riwayat_tumbuh.riwayat_tumbuh_12 !== null) {$('#riwayat-tumbuh-12').val(riwayat_tumbuh.riwayat_tumbuh_12);}
                    if (riwayat_tumbuh.riwayat_tumbuh_13 !== null) { $('#riwayat-tumbuh-13').prop('checked', true) }
                    if (riwayat_tumbuh.riwayat_tumbuh_14 !== null) {$('#riwayat-tumbuh-14').val(riwayat_tumbuh.riwayat_tumbuh_14);}
                    if (riwayat_tumbuh.riwayat_tumbuh_15 !== null) { $('#riwayat-tumbuh-15').prop('checked', true) }
                    if (riwayat_tumbuh.riwayat_tumbuh_16 !== null) {$('#riwayat-tumbuh-16').val(riwayat_tumbuh.riwayat_tumbuh_16);}

                    const kebutuhan_komunikasi = JSON.parse(data.pengkajian_awal_keperawatan_anak.kebutuhan_komunikasi); 
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_1 !== null) { $('#kebutuhan-komunikasi-1').prop('checked', true) }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_2 !== null) { $('#kebutuhan-komunikasi-2').prop('checked', true) }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_3 !== null) {$('#kebutuhan-komunikasi-3').val(kebutuhan_komunikasi.kebutuhan_komunikasi_3);}
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_4 === '0') {$('#kebutuhan-komunikasi-4').prop('checked', true).change() }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_4 === '1') {$('#kebutuhan-komunikasi-5').prop('checked', true).change () }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_6 !== null) {$('#kebutuhan-komunikasi-6').val(kebutuhan_komunikasi.kebutuhan_komunikasi_6);}
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_7 === '0') {$('#kebutuhan-komunikasi-7').prop('checked', true).change() }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_7 === '1') {$('#kebutuhan-komunikasi-8').prop('checked', true).change () }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_9 === '0') {$('#kebutuhan-komunikasi-9').prop('checked', true).change() }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_9 === '1') {$('#kebutuhan-komunikasi-10').prop('checked', true).change () }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_11 !== null) {$('#kebutuhan-komunikasi-11').val(kebutuhan_komunikasi.kebutuhan_komunikasi_11);}
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_12 !== null) { $('#kebutuhan-komunikasi-12').prop('checked', true) }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_13 !== null) { $('#kebutuhan-komunikasi-13').prop('checked', true) }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_14 !== null) { $('#kebutuhan-komunikasi-14').prop('checked', true) }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_15 !== null) { $('#kebutuhan-komunikasi-15').prop('checked', true) }
                    if (kebutuhan_komunikasi.kebutuhan_komunikasi_16 !== null) {$('#kebutuhan-komunikasi-16').val(kebutuhan_komunikasi.kebutuhan_komunikasi_16);}

                    const pengkajian_spiritual = JSON.parse(data.pengkajian_awal_keperawatan_anak.pengkajian_spiritual); 
                    if (pengkajian_spiritual.pengkajian_spiritual_1 !== null) {$('#pengkajian-spiritual-1').val(pengkajian_spiritual.pengkajian_spiritual_1);}
                    if (pengkajian_spiritual.pengkajian_spiritual_2 !== null) { $('#pengkajian-spiritual-2').prop('checked', true) }
                    if (pengkajian_spiritual.pengkajian_spiritual_3 !== null) { $('#pengkajian-spiritual-3').prop('checked', true) }
                    if (pengkajian_spiritual.pengkajian_spiritual_4 !== null) { $('#pengkajian-spiritual-4').prop('checked', true) }
                    if (pengkajian_spiritual.pengkajian_spiritual_5 !== null) { $('#pengkajian-spiritual-5').prop('checked', true) }
                    if (pengkajian_spiritual.pengkajian_spiritual_6 !== null) {$('#pengkajian-spiritual-6').val(pengkajian_spiritual.pengkajian_spiritual_6);}
                    if (pengkajian_spiritual.pengkajian_spiritual_7 !== null) { $('#pengkajian-spiritual-7').prop('checked', true) }
                    if (pengkajian_spiritual.pengkajian_spiritual_8 !== null) { $('#pengkajian-spiritual-8').prop('checked', true) }
                    if (pengkajian_spiritual.pengkajian_spiritual_9 !== null) { $('#pengkajian-spiritual-9').prop('checked', true) }
                    if (pengkajian_spiritual.pengkajian_spiritual_10 !== null) { $('#pengkajian-spiritual-10').prop('checked', true) }
                    if (pengkajian_spiritual.pengkajian_spiritual_11 !== null) { $('#pengkajian-spiritual-11').prop('checked', true) }

                    if (data.pengkajian_awal_keperawatan_anak.skrining_gizi_1 === '0') {
                    $('#skrining-gizi-1').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.skrining_gizi_1 === '1') {
                    $('#skrining-gizi-2').prop('checked', true).change()
                    }

                    if (data.pengkajian_awal_keperawatan_anak.skrining_gizi_3 === '0') {
                    $('#skrining-gizi-3').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.skrining_gizi_3 === '1') {
                    $('#skrining-gizi-4').prop('checked', true).change()
                    }

                    if (data.pengkajian_awal_keperawatan_anak.skrining_gizi_5 === '0') {
                    $('#skrining-gizi-5').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.skrining_gizi_5 === '1') {
                    $('#skrining-gizi-6').prop('checked', true).change()
                    }

                    if (data.pengkajian_awal_keperawatan_anak.skrining_gizi_7 === '0') {
                    $('#skrining-gizi-7').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.skrining_gizi_7 === '2') {
                    $('#skrining-gizi-8').prop('checked', true).change()
                    }

                    const neonatust = JSON.parse(data.pengkajian_awal_keperawatan_anak.neonatust);
                    if (neonatust.menangist === '0') {
                        $('#menangist-0').prop('checked', true).change()
                    }

                    if (neonatust.menangist === '1') {
                        $('#menangist-1').prop('checked', true).change()
                    }
                    if (neonatust.menangist === '2') {
                        $('#menangist-2').prop('checked', true).change()
                    }

                    if (neonatust.spot === '0') {
                        $('#spot-0').prop('checked', true).change()
                    }
                    if (neonatust.spot === '1') {
                        $('#spot-1').prop('checked', true).change()
                    }
                    if (neonatust.spot === '2') {
                        $('#spot-2').prop('checked', true).change()
                    }

                    if (neonatust.vitalt === '0') {
                        $('#vitalt-0').prop('checked', true).change()
                    }
                    if (neonatust.vitalt === '1') {
                        $('#vitalt-1').prop('checked', true).change()
                    }
                    if (neonatust.vitalt === '2') {
                        $('#vitalt-2').prop('checked', true).change()
                    }

                    if (neonatust.wajaht === '0') {
                        $('#wajaht-0').prop('checked', true).change()
                    }
                    if (neonatust.wajaht === '1') {
                        $('#wajaht-1').prop('checked', true).change()
                    }
                    if (neonatust.wajaht === '2') {
                        $('#wajaht-2').prop('checked', true).change()
                    }

                    if (neonatust.tidurt === '0') {
                        $('#tidurt-0').prop('checked', true).change()
                    }
                    if (neonatust.tidurt === '1') {
                        $('#tidurt-1').prop('checked', true).change()
                    }
                    if (neonatust.tidurt === '2') {
                        $('#tidurt-2').prop('checked', true).change()
                    }

                    const ptnt_keterangan = JSON.parse(data.pengkajian_awal_keperawatan_anak.ptnt_keterangan); 
                    if (ptnt_keterangan.ptnt_keterangan_1 === '1') {$('#ptnt-keterangan-1').prop('checked', true).change() }
                    if (ptnt_keterangan.ptnt_keterangan_1 === '2') {$('#ptnt-keterangan-2').prop('checked', true).change() }
                    if (ptnt_keterangan.ptnt_keterangan_1 === '3') {$('#ptnt-keterangan-3').prop('checked', true).change() }
                    if (ptnt_keterangan.ptnt_keterangan_1 === '4') {$('#ptnt-keterangan-4').prop('checked', true).change() }

                    const sk_nyeri = JSON.parse(data.pengkajian_awal_keperawatan_anak.sk_nyeri); 
                    if (sk_nyeri.sk_nyeri_1 !== null) { $('#sk-nyeri-1').prop('checked', true) }
                    if (sk_nyeri.sk_nyeri_2 !== null) { $('#sk-nyeri-2').prop('checked', true) }
                    if (sk_nyeri.sk_nyeri_3 !== null) { $('#sk-nyeri-3').prop('checked', true) }
                    if (sk_nyeri.sk_nyeri_4 !== null) {$('#sk-nyeri-4').val(sk_nyeri.sk_nyeri_4);}
                    if (sk_nyeri.sk_nyeri_5 !== null) {$('#sk-nyeri-5').val(sk_nyeri.sk_nyeri_5);}
                    if (sk_nyeri.sk_nyeri_6 !== null) {$('#sk-nyeri-6').val(sk_nyeri.sk_nyeri_6);}

                    const keterangan_anak = JSON.parse(data.pengkajian_awal_keperawatan_anak.keterangan_anak); 
                    if (keterangan_anak.keterangan_anak_1 === '1') {$('#keterangan-anak-1').prop('checked', true).change() }
                    if (keterangan_anak.keterangan_anak_1 === '2') {$('#keterangan-anak-2').prop('checked', true).change() }
                    if (keterangan_anak.keterangan_anak_1 === '3') {$('#keterangan-anak-3').prop('checked', true).change() }

                    const nyeri_hilang_anak = JSON.parse(data.pengkajian_awal_keperawatan_anak.nyeri_hilang_anak); 
                    if (nyeri_hilang_anak.nyeri_hilang_anak_1 !== null) { $('#nyeri-hilang-anak-1').prop('checked', true) }
                    if (nyeri_hilang_anak.nyeri_hilang_anak_2 !== null) { $('#nyeri-hilang-anak-2').prop('checked', true) }
                    if (nyeri_hilang_anak.nyeri_hilang_anak_3 !== null) { $('#nyeri-hilang-anak-3').prop('checked', true) }
                    if (nyeri_hilang_anak.nyeri_hilang_anak_4 !== null) { $('#nyeri-hilang-anak-4').prop('checked', true) }
                    if (nyeri_hilang_anak.nyeri_hilang_anak_5 !== null) { $('#nyeri-hilang-anak-5').prop('checked', true) }
                    if (nyeri_hilang_anak.nyeri_hilang_anak_6 !== null) {$('#nyeri-hilang-anak-6').val(nyeri_hilang_anak.nyeri_hilang_anak_6);}

                    if (data.pengkajian_awal_keperawatan_anak.wajah_anak === '1') {
                    $('#wajah-anak-1').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.wajah_anak === '2') {
                    $('#wajah-anak-2').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.wajah_anak === '3') {
                    $('#wajah-anak-3').prop('checked', true).change()
                    }

                    if (data.pengkajian_awal_keperawatan_anak.kaki_anak === '0') {
                    $('#kaki-anak-1').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.kaki_anak === '1') {
                    $('#kaki-anak-2').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.kaki_anak === '2') {
                    $('#kaki-anak-3').prop('checked', true).change()
                    }
                    
                    if (data.pengkajian_awal_keperawatan_anak.aktifitas_anak === '0') {
                    $('#aktifitas-anak-1').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.aktifitas_anak === '1') {
                    $('#aktifitas-anak-2').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.aktifitas_anak === '2') {
                    $('#aktifitas-anak-3').prop('checked', true).change()
                    }

                    if (data.pengkajian_awal_keperawatan_anak.menangis_anak === '0') {
                    $('#menangis-anak-1').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.menangis_anak === '1') {
                    $('#menangis-anak-2').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.menangis_anak === '2') {
                    $('#menangis-anak-3').prop('checked', true).change()
                    }

                    if (data.pengkajian_awal_keperawatan_anak.bicara_anak === '0') {
                    $('#bicara-anak-1').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.bicara_anak === '1') {
                    $('#bicara-anak-2').prop('checked', true).change()
                    }
                    if (data.pengkajian_awal_keperawatan_anak.bicara_anak === '2') {
                    $('#bicara-anak-3').prop('checked', true).change()
                    }

                    const cidera_anak = JSON.parse(data.pengkajian_awal_keperawatan_anak.cidera_anak); 
                    if (cidera_anak.cidera_anak_1 === '1') {$('#cidera-anak-1').prop('checked', true).change() }
                    if (cidera_anak.cidera_anak_1 === '0') {$('#cidera-anak-2').prop('checked', true).change () }
                    if (cidera_anak.cidera_anak_3 === '1') {$('#cidera-anak-3').prop('checked', true).change() }
                    if (cidera_anak.cidera_anak_3 === '0') {$('#cidera-anak-4').prop('checked', true).change () }
                    if (cidera_anak.cidera_anak_5 === '1') {$('#cidera-anak-5').prop('checked', true).change () }
                    if (cidera_anak.cidera_anak_5 === '2') {$('#cidera-anak-6').prop('checked', true).change() }
                    if (cidera_anak.cidera_anak_5 === '3') {$('#cidera-anak-7').prop('checked', true).change () }

                    const status_fung_anak = JSON.parse(data.pengkajian_awal_keperawatan_anak.status_fung_anak); 
                    if (status_fung_anak.status_fung_anak_1 !== null) { $('#status-fung-anak-1').prop('checked', true) }
                    if (status_fung_anak.status_fung_anak_2 !== null) { $('#status-fung-anak-2').prop('checked', true) }
                    if (status_fung_anak.status_fung_anak_3 !== null) {$('#status-fung-anak-3').val(status_fung_anak.status_fung_anak_3);}
                    if (status_fung_anak.status_fung_anak_4 !== null) { $('#status-fung-anak-4').prop('checked', true) }
                    if (status_fung_anak.status_fung_anak_5 !== null) {$('#status-fung-anak-5').val(status_fung_anak.status_fung_anak_5);}

                    const masalah_kep_anak = JSON.parse(data.pengkajian_awal_keperawatan_anak.masalah_kep_anak); 
                    if (masalah_kep_anak.masalah_kep_anak_1 !== null) { $('#masalah-kep-anak-1').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_2 !== null) { $('#masalah-kep-anak-2').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_3 !== null) { $('#masalah-kep-anak-3').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_4 !== null) { $('#masalah-kep-anak-4').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_5 !== null) { $('#masalah-kep-anak-5').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_6 !== null) { $('#masalah-kep-anak-6').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_7 !== null) { $('#masalah-kep-anak-7').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_8 !== null) { $('#masalah-kep-anak-8').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_9 !== null) { $('#masalah-kep-anak-9').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_10 !== null) { $('#masalah-kep-anak-10').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_11 !== null) { $('#masalah-kep-anak-11').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_12 !== null) { $('#masalah-kep-anak-12').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_13 !== null) { $('#masalah-kep-anak-13').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_14 !== null) { $('#masalah-kep-anak-14').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_15 !== null) { $('#masalah-kep-anak-15').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_16 !== null) { $('#masalah-kep-anak-16').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_17 !== null) { $('#masalah-kep-anak-17').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_18 !== null) { $('#masalah-kep-anak-18').prop('checked', true) }
                    if (masalah_kep_anak.masalah_kep_anak_19 !== null) {$('#masalah-kep-anak-19').val(masalah_kep_anak.masalah_kep_anak_19);}
                    if (masalah_kep_anak.masalah_kep_anak_20 !== null) { $('#masalah-kep-anak-20').prop('checked', true) }

                    $('#tanggal-jam-perawat-anak').val((data.pengkajian_awal_keperawatan_anak.tanggal_jam_perawat_anak !== null ? datetimefmysql(data.pengkajian_awal_keperawatan_anak.tanggal_jam_perawat_anak) : ''));
                    if (data.pengkajian_awal_keperawatan_anak.perawat_anak !== null) { $('#perawat-anak').select2c('readonly', true)}
                    $('#perawat-anak').val(data.pengkajian_awal_keperawatan_anak.perawat_anak);
                    $('#s2id_perawat-anak a .select2c-chosen').html(data.pengkajian_awal_keperawatan_anak.perawat);
                    if (data.ttd_perawat_anak !== null) {
                        $('#ttd-perawat-anak').hide();
                        $('#ttd_perawat_anak_verified').show();
                    }


                    $('#tanggal-jam-dokter-anak').val((data.pengkajian_awal_keperawatan_anak.tanggal_jam_dokter_anak !== null ? datetimefmysql(data.pengkajian_awal_keperawatan_anak.tanggal_jam_dokter_anak) : ''));
                    if (data.pengkajian_awal_keperawatan_anak.dokter_anak !== null) { $('#dokter-anak').select2c('readonly', true)}
                    $('#dokter-anak').val(data.pengkajian_awal_keperawatan_anak.dokter_anak);
                    $('#s2id_dokter-anak a .select2c-chosen').html(data.pengkajian_awal_keperawatan_anak.dokter);
                    if (data.ttd_dokter_anak !== null) {
                        $('#ttd-dokter-anak').hide();
                        $('#ttd_dokter_anak_verified').show();
                    }
                    
                }           
                $('#bed-pakarj').text(bed);
                $('#tanggal-jam-pakarj').text(tanggal);
                // console.log(bed);

                if (action === 'lihat') {
                    // Disable semua input dan textarea, tapi biarkan tombol expand/collapse tetap aktif
                    $('#modal_form_keperawatan_anak_rm :input')
                        .not('[data-dismiss="modal"], #btn-expand-all-keperawatan-anak, #btn-collapse-all-keperawatan-anak')
                        .prop('disabled', true);

                    $('#modal_form_keperawatan_anak_rm textarea').prop('readonly', true);
                    $('#btn-simpan').hide();

                    // Disable select dan Select2
                    $('#modal_form_keperawatan_anak_rm select')
                        .not('[data-dismiss="modal"]')
                        .prop('disabled', true)
                        .trigger('change.select2c');

                    $('#modal_form_keperawatan_anak_rm [id^="s2id_"]').css({
                        'pointer-events': 'none',
                        'opacity': 0.6
                    });
                }

                $('#modal_form_keperawatan_anak_rm').modal('show');        
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }


    function resetFormPengkajianAwalKeperawatanAnak() {
        $('#wizard-keperawatan-anak').bwizard('show', '0');
        $('#form_entri_keperawatan_anak')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#id-pakarj').val('');

        // perawat / dokter Tulisan pilih
        $('#s2id_perawat-anak a .select2c-chosen').html('Pilih Perawat');
        $('#s2id_dokter-anak a .select2c-chosen').html('Pilih Dokter DPJP');

        // Perawat / Dokter
        $('#perawat-anak, #dokter-anak').val('');
         // s2id perawat
        $('#s2id_perawat-anak a .select2c-chosen, #s2id_dokter-anak a .select2c-chosen').empty();

        // CEKLIS TTTD PERAWAT OR DOKTER 
        $('#ceklis-ttd-perawat-anak').show();
        $('#ttd_perawat_anak_verified').hide();
        $('#ceklis-ttd-dokter-anak').show();         
        $('#ttd_dokter_anak_verified').hide();


        $('#tanggal-jam-perawat-anak, #tanggal-jam-dokter-anak').attr('disabled', false);

        $('#perawat-anak, #dokter-anak').select2c('readonly',false);
    }

    function konfirmasiSimpanEntriFormKeperawatanAnak() {
        ($('#form_entri_keperawatan_anak').serialize()); 

            var stop = false;
            if ($('#tanggal-jam-perawat-anak').val() === '') {
                syams_validation('#tanggal-jam-perawat-anak', 'Kolom waktu verifikasi perawat harus diisi!');
                $('#tanggal-jam-perawat-anak').focus();
                $('#wizard-keperawatan-anak').bwizard('show', '0');
                stop = true;
            }
            if ($('#perawat-anak').val() === '') {
                syams_validation('#perawat-anak', 'Kolom perawat harus dipilih!');
                $('#wizard-keperawatan-anak').bwizard('show', '0');
                stop = true;
            }
            if ($('#tanggal-jam-dokter-anak').val() === '') {
                syams_validation('#tanggal-jam-dokter-anak', 'Kolom waktu verifikasi dokter harus diisi!');
                $('#tanggal-jam-dokter-anak').focus();
                $('#wizard-kedokteran-anak').bwizard('show', '0');
                stop = true;
            }
            if ($('#dokter-anak').val() === '') {
                syams_validation('#dokter-anak', 'Kolom dokter harus dipilih!');
                $('#wizard-keperawatan-anak').bwizard('show', '0');
                stop = true;
            }
            var id_pakarj = $('#id-pakarj').val();
            if (id_pakarj) {
                var text = 'Apakah anda yakin ingin mengupdate data ini ?';
                var btnTextConfirmPakarj = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmPakarj = 'Simpan';
            }
        swal.fire({
            // title: 'Simpan Pengkajian Keperawatan Anak',
            // text: "Apakah anda yakin akan menyimpan Data ini ?",
            // icon: 'question',
            title: 'Konfirmasi ?',
            html: text,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmPakarj,
            // confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                SimpanEntriFormKeperawatanAnak();
            }
        })
    }
 
    function SimpanEntriFormKeperawatanAnak() {
        var id_layanan_pendaftaran_pakarj = $('#id-layanan-pendaftaran-pakarj').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pemeriksaan_poli/api/pemeriksaan_poli/simpan_data_pengkajian_keperawatan_anak_rajal") ?>',
            data: $('#form_entri_keperawatan_anak').serialize() + '&id-layanan-pendaftaran-pakarj=' + id_layanan_pendaftaran_pakarj,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-keperawatan-anak').bwizard('show', data.respon.show);

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
                        
                        $('#modal_form_keperawatan_anak_rm').modal('hide');
                        showListForm($('#id-pendaftaran-pakarj').val(), $('#id-layanan-pendaftaran-pakarj').val(), $('#id-pasien-pakarj').val());
                        // getListPemeriksaan($('#page_now').val());
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


    // SKRINING GIZI 
    function calcscorepjds() {
        var score = 0;
        $("input[name='skrining_gizi_1']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
        });
        $("input[name='skrining_gizi_3']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
        });
        $("input[name='skrining_gizi_5']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
        });
        $("input[name='skrining_gizi_7']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '2') {
                score += parseInt(2);
            }
        });

        $("input[name='jumlah_skor_anak']").val(score);
    }


    // NEONATUST
    $('.neonatust').change(function() {
        var total = parseInt(0)
        for (let index = 0; index < $('.neonatust').length; index++) {
            var val = parseInt(0)
            if ($('.neot_' + index).is(":checked")) {
                val = $('.neot_' + index).val()
            }
            total = total + parseInt(val)
        }
        $('#total-neonatust').val(total)
    })


    // PENILAIAN TINGKAT NYERI
    function calcscorepjdu() {
        var score = 0;
        $("input[name='wajah_anak_1']:checked").each(function() {
            if ($(this).val() == '1') {
                score += parseInt(1);
            } else if ($(this).val() == '2') {
                score += parseInt(2);
            }
            else if ($(this).val() == '3') {
                score += parseInt(3);
            }           
        });

        $("input[name='kaki_anak_1']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
            else if ($(this).val() == '2') {
                score += parseInt(2);
            }           
        });

        $("input[name='aktifitas_anak_1']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
            else if ($(this).val() == '2') {
                score += parseInt(2);
            }           
        });

        $("input[name='menangis_anak_1']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
            else if ($(this).val() == '2') {
                score += parseInt(2);
            }           
        });

        $("input[name='bicara_anak_1']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
            } else if ($(this).val() == '1') {
                score += parseInt(1);
            }
            else if ($(this).val() == '2') {
                score += parseInt(2);
            }           
        });

        $("input[name='jumlah_total_anak']").val(score);
    }
</script>