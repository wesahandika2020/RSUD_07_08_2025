<!-- // PAPAK -->
<script>  

    $('#penilaian-papak-6').click(function() {
        if ($(this).is(':checked')) {
            $('#penilaian-papak-8').prop('readonly', false);
            $('#penilaian-papak-9').prop('readonly', false);
        } else {
            $('#penilaian-papak-8').prop('readonly', true);
            $('#penilaian-papak-9').prop('readonly', true);
        }
    });

    $('#faktor-papak-3').click(function() {
        $('#faktor-papak-4').prop('readonly', false);
    });



   $('#orintasi-papak-1, #orintasi-papak-2').click(function() {
        if ($('#orintasi-papak-2').is(':checked')) {
            $('#orintasi-papak-3').prop('readonly', false);
        } else {
            $('#orintasi-papak-3').prop('readonly', true);
        }
    });

    $('#urusan-papak-1, #urusan-papak-2').click(function() {
        if ($('#urusan-papak-2').is(':checked')) {
            $('#urusan-papak-7').prop('readonly', false);
        } else {
            $('#urusan-papak-7').prop('readonly', true);
        }
    });

    $('#urusan-papak-3, #urusan-papak-4').click(function() {
        if ($('#urusan-papak-4').is(':checked')) {
            $('#urusan-papak-8').prop('readonly', false);
        } else {
            $('#urusan-papak-8').prop('readonly', true);
        }
    });

    $('#urusan-papak-5, #urusan-papak-6').click(function() {
        if ($('#urusan-papak-6').is(':checked')) {
            $('#urusan-papak-9').prop('readonly', false);
        } else {
            $('#urusan-papak-9').prop('readonly', true);
        }
    }); 

    $('#psikologis-papak-1').click(function() {
        if ($(this).is(':checked')) {
            $('#psikologis-papak-2').prop('readonly', false);
            $('#psikologis-papak-3').prop('readonly', false);
            $('#psikologis-papak-4').prop('readonly', false);
            $('#psikologis-papak-5').prop('readonly', false);
        } else {
            $('#psikologis-papak-2').prop('readonly', true);
            $('#psikologis-papak-3').prop('readonly', true);
            $('#psikologis-papak-4').prop('readonly', true);
            $('#psikologis-papak-5').prop('readonly', true);
        }
    });

    $('#psikologis-papak-12, #psikologis-papak-10').click(function() {
        if ($('#psikologis-papak-10').is(':checked')) {
            $('#psikologis-papak-11').prop('readonly', false);
        } else {
            $('#psikologis-papak-11').prop('readonly', true);
        }
    });

    $('#kebutuhan-papak-4').click(function() {
        $('#kebutuhan-papak-5').prop('readonly', false);
    });

    $('#apakah-papak-3').click(function() {
        $('#apakah-papak-4').prop('readonly', false);
    });

    $('#apakah-papak-5').click(function() {
        $('#apakah-papak-6').prop('readonly', false);
    });







    
    $("#wizard-keperawatan-papak").bwizard();


    $('#tgl-masuk-papak, #tgl-pengkajian-papak, #tanggal-jam-perawat-papak')
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


    $('#perawat-papak').select2c({
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



    function lihatFORM_KEP_97_00(data) {
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
        entriPengkajianAwalPasienAkhirKehidupan(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function editFORM_KEP_97_00(data) {
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
        entriPengkajianAwalPasienAkhirKehidupan(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function tambahFORM_KEP_97_00(data) {
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
        entriPengkajianAwalPasienAkhirKehidupan(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function entriPengkajianAwalPasienAkhirKehidupan(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, action ) {
        // $('#modal_pengkajian_pasien_akhir_kehidupan').modal('show');  
        $('#wizard-keperawatan-papak').bwizard('show', '0');

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
            url: '<?= base_url("pemeriksaan_poli/api/pemeriksaan_poli/get_data_pengkajian_awal_pasien_akhir_kehidupan") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
                console.log(data);
                resetFormPengkajianAwalPasienAkhirKehidupan(); 
                $('#id-layanan-pendaftaran-papak').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-papak').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-papak').val(data.pasien.id_pasien);
                    $('#nama-pasien-papak').text(data.pasien.nama);
                    $('#no-papak').text(data.pasien.no_rm);
                    $('#tanggal-lahir-papak').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-papak').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#tgl-masuk-papak').text((data.layanan.tanggal_layanan !== null ?datetimefmysql(data.layanan.tanggal_layanan) : '<?= date('d/m/Y H:i:s') ?>'));
                }   

                // PAPAK 
                let pengkajian_awal_pasien_akhir_kehidupan = data.pengkajian_awal_pasien_akhir_kehidupan;
                if (data.pengkajian_awal_pasien_akhir_kehidupan !== null) {      
                    $('#id-papak').val(data.pengkajian_awal_pasien_akhir_kehidupan.id);

                    // $('#tgl-masuk-papak').val((data.pengkajian_awal_pasien_akhir_kehidupan.tgl_masuk_papak !== null ? datetimefmysql(data.pengkajian_awal_pasien_akhir_kehidupan.tgl_masuk_papak) : ''));
                    $('#tgl-pengkajian-papak').val((data.pengkajian_awal_pasien_akhir_kehidupan.tgl_pengkajian_papak !== null ? datetimefmysql(data.pengkajian_awal_pasien_akhir_kehidupan.tgl_pengkajian_papak) : ''));


                    // const kewarganegaraan_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.kewarganegaraan_papak);
                    // if (kewarganegaraan_papak.kewarganegaraan_papak === '1') {$('#kewarganegaraan-papak-1').prop('checked', true).change() }
                    // if (kewarganegaraan_papak.kewarganegaraan_papak === '2') {$('#kewarganegaraan-papak-2').prop('checked', true).change () } 

                    // $('#suku-bangsa-papak').val(data.pengkajian_awal_pasien_akhir_kehidupan.suku_bangsa_papak);

                    // const bahasa_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.bahasa_papak); 
                    // if (bahasa_papak.bahasa_papak_1 !== null) { $('#bahasa-papak-1').prop('checked', true) }
                    // if (bahasa_papak.bahasa_papak_2 !== null) { $('#bahasa-papak-2').prop('checked', true) }
                    // if (bahasa_papak.bahasa_papak_3 !== null) { $('#bahasa-papak-3').prop('checked', true) }
                    // if (bahasa_papak.bahasa_papak_4 !== null) {$('#bahasa-papak-4').val(bahasa_papak.bahasa_papak_4);}

                    // const agama_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.agama_papak); 
                    // if (agama_papak.agama_papak_1 !== null) { $('#agama-papak-1').prop('checked', true) }
                    // if (agama_papak.agama_papak_2 !== null) { $('#agama-papak-2').prop('checked', true) }
                    // if (agama_papak.agama_papak_3 !== null) { $('#agama-papak-3').prop('checked', true) }
                    // if (agama_papak.agama_papak_4 !== null) { $('#agama-papak-4').prop('checked', true) }
                    // if (agama_papak.agama_papak_5 !== null) { $('#agama-papak-5').prop('checked', true) }
                    // if (agama_papak.agama_papak_6 !== null) { $('#agama-papak-6').prop('checked', true) }
                    // if (agama_papak.agama_papak_7 !== null) {$('#agama-papak-7').val(agama_papak.agama_papak_7);}

                    // const status_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.status_papak);
                    // if (status_papak.status_papak === '1') {$('#status-papak-1').prop('checked', true).change() }
                    // if (status_papak.status_papak === '2') {$('#status-papak-2').prop('checked', true).change () } 
                    // if (status_papak.status_papak === '3') {$('#status-papak-3').prop('checked', true).change () } 

                    // $('#pendidikan-papak').val(data.pengkajian_awal_pasien_akhir_kehidupan.pendidikan_papak);

                    // const yang_merawat_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.yang_merawat_papak); 
                    // if (yang_merawat_papak.yang_merawat_papak_1 !== null) { $('#yang-merawat-papak-1').prop('checked', true) }
                    // if (yang_merawat_papak.yang_merawat_papak_2 !== null) { $('#yang-merawat-papak-2').prop('checked', true) }
                    // if (yang_merawat_papak.yang_merawat_papak_3 !== null) { $('#yang-merawat-papak-3').prop('checked', true) }
                    // if (yang_merawat_papak.yang_merawat_papak_4 !== null) { $('#yang-merawat-papak-4').prop('checked', true) }                   
                    // if (yang_merawat_papak.yang_merawat_papak_5 !== null) {$('#yang-merawat-papak-5').val(yang_merawat_papak.yang_merawat_papak_5);}

                    // const cara_masuk_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.cara_masuk_papak); 
                    // if (cara_masuk_papak.cara_masuk_papak_1 !== null) { $('#cara-masuk-papak-1').prop('checked', true) }
                    // if (cara_masuk_papak.cara_masuk_papak_2 !== null) { $('#cara-masuk-papak-2').prop('checked', true) }
                    // if (cara_masuk_papak.cara_masuk_papak_3 !== null) { $('#cara-masuk-papak-3').prop('checked', true) }                  
                    // if (cara_masuk_papak.cara_masuk_papak_4 !== null) {$('#cara-masuk-papak-4').val(cara_masuk_papak.cara_masuk_papak_4);}

                    // const cara_tiba_diruangan_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.cara_tiba_diruangan_papak);
                    // if (cara_tiba_diruangan_papak.cara_tiba_diruangan_papak === '1') {$('#cara-tiba-diruangan-papak-1').prop('checked', true).change() }
                    // if (cara_tiba_diruangan_papak.cara_tiba_diruangan_papak === '2') {$('#cara-tiba-diruangan-papak-2').prop('checked', true).change () } 
                    // if (cara_tiba_diruangan_papak.cara_tiba_diruangan_papak === '3') {$('#cara-tiba-diruangan-papak-3').prop('checked', true).change () } 

                    // const idd_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.idd_papak); 
                    // if (idd_papak.idd_papak_1 !== null) { $('#idd-papak-1').prop('checked', true) }
                    // if (idd_papak.idd_papak_2 !== null) { $('#idd-papak-2').prop('checked', true) }
                    // if (idd_papak.idd_papak_3 !== null) { $('#idd-papak-3').prop('checked', true) }                  
                    // if (idd_papak.idd_papak_4 !== null) {$('#idd-papak-4').val(idd_papak.idd_papak_4);}
                    // if (idd_papak.idd_papak_5 !== null) {$('#idd-papak-5').val(idd_papak.idd_papak_5);}

                    // const ra_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.ra_papak);
                    // if (ra_papak.ra_papak_1 === '0') {$('#ra-papak-1').prop('checked', true).change() }
                    // if (ra_papak.ra_papak_1 === '1') {$('#ra-papak-2').prop('checked', true).change () } 
                    // if (ra_papak.ra_papak_1 === '2') {$('#ra-papak-3').prop('checked', true).change () } 
                    // if (ra_papak.ra_papak_4 !== null) {$('#ra-papak-4').val(ra_papak.ra_papak_4);}
                    // if (ra_papak.ra_papak_5 !== null) {$('#ra-papak-5').val(ra_papak.ra_papak_5);}
                    // if (ra_papak.ra_papak_6 !== null) {$('#ra-papak-6').val(ra_papak.ra_papak_6);}
                    // if (ra_papak.ra_papak_7 !== null) {$('#ra-papak-7').val(ra_papak.ra_papak_7);}
                    // if (ra_papak.ra_papak_8 !== null) { $('#ra-papak-8').prop('checked', true) }
                    // if (ra_papak.ra_papak_9 !== null) { $('#ra-papak-9').prop('checked', true) }
                    // if (ra_papak.ra_papak_10 !== null) { $('#ra-papak-10').prop('checked', true) }
                    // if (ra_papak.ra_papak_11 !== null) { $('#ra-papak-11').prop('checked', true) }
                    // if (ra_papak.ra_papak_12 !== null) { $('#ra-papak-12').prop('checked', true) }
                    // if (ra_papak.ra_papak_13 !== null) {$('#ra-papak-13').val(ra_papak.ra_papak_13);}
                    // if (ra_papak.ra_papak_14 !== null) { $('#ra-papak-14').prop('checked', true) }
                    // if (ra_papak.ra_papak_15 === '0') {$('#ra-papak-15').prop('checked', true).change() }
                    // if (ra_papak.ra_papak_15 === '1') {$('#ra-papak-16').prop('checked', true).change () } 
                    // if (ra_papak.ra_papak_17 !== null) {$('#ra-papak-17').val(ra_papak.ra_papak_17);}
                    // if (ra_papak.ra_papak_18 !== null) { $('#ra-papak-18').prop('checked', true) }
                    // if (ra_papak.ra_papak_19 === '0') {$('#ra-papak-19').prop('checked', true).change() }
                    // if (ra_papak.ra_papak_19 === '1') {$('#ra-papak-20').prop('checked', true).change () } 
                    // if (ra_papak.ra_papak_21 !== null) {$('#ra-papak-21').val(ra_papak.ra_papak_21);}
                    // if (ra_papak.ra_papak_22 !== null) { $('#ra-papak-22').prop('checked', true) }
                    // if (ra_papak.ra_papak_23 === '0') {$('#ra-papak-23').prop('checked', true).change() }
                    // if (ra_papak.ra_papak_23 === '1') {$('#ra-papak-24').prop('checked', true).change () } 
                    // if (ra_papak.ra_papak_25 === '0') {$('#ra-papak-25').prop('checked', true).change() }
                    // if (ra_papak.ra_papak_25 === '1') {$('#ra-papak-26').prop('checked', true).change () } 
                    // if (ra_papak.ra_papak_27 !== null) {$('#ra-papak-27').val(ra_papak.ra_papak_27);}
                    // if (ra_papak.ra_papak_28 !== null) {$('#ra-papak-28').val(ra_papak.ra_papak_28);}

                    // const rpk_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.rpk_papak); 
                    // if (rpk_papak.rpk_papak_1 !== null) { $('#rpk-papak-1').prop('checked', true) }
                    // if (rpk_papak.rpk_papak_2 !== null) { $('#rpk-papak-2').prop('checked', true) }
                    // if (rpk_papak.rpk_papak_3 !== null) { $('#rpk-papak-3').prop('checked', true) }
                    // if (rpk_papak.rpk_papak_4 !== null) { $('#rpk-papak-4').prop('checked', true) }                   
                    // if (rpk_papak.rpk_papak_5 !== null) { $('#rpk-papak-5').prop('checked', true) }                   
                    // if (rpk_papak.rpk_papak_6 !== null) {$('#rpk-papak-6').val(rpk_papak.rpk_papak_6);}

                    // const kesadaran_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.kesadaran_papak); 
                    // if (kesadaran_papak.kesadaran_papak_1 !== null) { $('#kesadaran-papak-1').prop('checked', true) }
                    // if (kesadaran_papak.kesadaran_papak_2 !== null) { $('#kesadaran-papak-2').prop('checked', true) }
                    // if (kesadaran_papak.kesadaran_papak_3 !== null) { $('#kesadaran-papak-3').prop('checked', true) }
                    // if (kesadaran_papak.kesadaran_papak_4 !== null) { $('#kesadaran-papak-4').prop('checked', true) }                   
                    // if (kesadaran_papak.kesadaran_papak_5 !== null) { $('#kesadaran-papak-5').prop('checked', true) } 

                    // const gcs_et = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.gcs_et);                    
                    // if (gcs_et.gcs_et_1 !== null) {$('#gcs-et-1').val(gcs_et.gcs_et_1);}
                    // if (gcs_et.gcs_et_2 !== null) {$('#gcs-et-2').val(gcs_et.gcs_et_2);}
                    // if (gcs_et.gcs_et_3 !== null) {$('#gcs-et-3').val(gcs_et.gcs_et_3);}
                    // if (gcs_et.gcs_et_4 !== null) {$('#gcs-et-4').val(gcs_et.gcs_et_4);}


                    // const pemeriksaan_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.pemeriksaan_papak);                    
                    // if (pemeriksaan_papak.pemeriksaan_papak_1 !== null) {$('#pemeriksaan-papak-1').val(pemeriksaan_papak.pemeriksaan_papak_1);}
                    // if (pemeriksaan_papak.pemeriksaan_papak_2 !== null) {$('#pemeriksaan-papak-2').val(pemeriksaan_papak.pemeriksaan_papak_2);}
                    // if (pemeriksaan_papak.pemeriksaan_papak_3 !== null) {$('#pemeriksaan-papak-3').val(pemeriksaan_papak.pemeriksaan_papak_3);}
                    // if (pemeriksaan_papak.pemeriksaan_papak_4 !== null) {$('#pemeriksaan-papak-4').val(pemeriksaan_papak.pemeriksaan_papak_4);}
                    // if (pemeriksaan_papak.pemeriksaan_papak_5 !== null) {$('#pemeriksaan-papak-5').val(pemeriksaan_papak.pemeriksaan_papak_5);}
                    // if (pemeriksaan_papak.pemeriksaan_papak_6 !== null) {$('#pemeriksaan-papak-6').val(pemeriksaan_papak.pemeriksaan_papak_6);}
                    // if (pemeriksaan_papak.pemeriksaan_papak_7 !== null) {$('#pemeriksaan-papak-7').val(pemeriksaan_papak.pemeriksaan_papak_7);}

                    const kegawatan_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.kegawatan_papak); 
                    if (kegawatan_papak.kegawatan_papak_1 !== null) { $('#kegawatan-papak-1').prop('checked', true) }
                    if (kegawatan_papak.kegawatan_papak_2 !== null) { $('#kegawatan-papak-2').prop('checked', true) }
                    if (kegawatan_papak.kegawatan_papak_3 !== null) { $('#kegawatan-papak-3').prop('checked', true) }
                    if (kegawatan_papak.kegawatan_papak_4 !== null) { $('#kegawatan-papak-4').prop('checked', true) } 
                    if (kegawatan_papak.kegawatan_papak_5 !== null) { $('#kegawatan-papak-5').prop('checked', true) }
                    if (kegawatan_papak.kegawatan_papak_6 !== null) { $('#kegawatan-papak-6').prop('checked', true) }
                    if (kegawatan_papak.kegawatan_papak_7 !== null) { $('#kegawatan-papak-7').prop('checked', true) }
                    if (kegawatan_papak.kegawatan_papak_8 !== null) { $('#kegawatan-papak-8').prop('checked', true) } 
                    if (kegawatan_papak.kegawatan_papak_9 !== null) { $('#kegawatan-papak-9').prop('checked', true) } 

                    const kehilangan_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.kehilangan_papak); 
                    if (kehilangan_papak.kehilangan_papak_1 !== null) { $('#kehilangan-papak-1').prop('checked', true) }
                    if (kehilangan_papak.kehilangan_papak_2 !== null) { $('#kehilangan-papak-2').prop('checked', true) }
                    if (kehilangan_papak.kehilangan_papak_3 !== null) { $('#kehilangan-papak-3').prop('checked', true) }
                    if (kehilangan_papak.kehilangan_papak_4 !== null) { $('#kehilangan-papak-4').prop('checked', true) } 
                    if (kehilangan_papak.kehilangan_papak_5 !== null) { $('#kehilangan-papak-5').prop('checked', true) }
                    if (kehilangan_papak.kehilangan_papak_6 !== null) { $('#kehilangan-papak-6').prop('checked', true) }
                    if (kehilangan_papak.kehilangan_papak_7 !== null) { $('#kehilangan-papak-7').prop('checked', true) }
                    if (kehilangan_papak.kehilangan_papak_8 !== null) { $('#kehilangan-papak-8').prop('checked', true) } 
                   
                    const perlambatan_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.perlambatan_papak); 
                    if (perlambatan_papak.perlambatan_papak_1 !== null) { $('#perlambatan-papak-1').prop('checked', true) }
                    if (perlambatan_papak.perlambatan_papak_2 !== null) { $('#perlambatan-papak-2').prop('checked', true) }
                    if (perlambatan_papak.perlambatan_papak_3 !== null) { $('#perlambatan-papak-3').prop('checked', true) }
                    if (perlambatan_papak.perlambatan_papak_4 !== null) { $('#perlambatan-papak-4').prop('checked', true) } 
                    if (perlambatan_papak.perlambatan_papak_5 !== null) { $('#perlambatan-papak-5').prop('checked', true) }
                    if (perlambatan_papak.perlambatan_papak_6 !== null) { $('#perlambatan-papak-6').prop('checked', true) }
                    if (perlambatan_papak.perlambatan_papak_7 !== null) { $('#perlambatan-papak-7').prop('checked', true) }

                    const faktor_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.faktor_papak); 
                    if (faktor_papak.faktor_papak_1 !== null) { $('#faktor-papak-1').prop('checked', true) }
                    if (faktor_papak.faktor_papak_2 !== null) { $('#faktor-papak-2').prop('checked', true) }
                    if (faktor_papak.faktor_papak_3 !== null) { $('#faktor-papak-3').prop('checked', true) }
                    if (faktor_papak.faktor_papak_4 !== null) {$('#faktor-papak-4').val(faktor_papak.faktor_papak_4);}

                    // BARU
                    // const manajemen_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.manajemen_papak); 
                    // if (manajemen_papak.manajemen_papak_1 !== null) { $('#manajemen-papak-1').prop('checked', true) }
                    // if (manajemen_papak.manajemen_papak_2 !== null) { $('#manajemen-papak-2').prop('checked', true) }
                    // if (manajemen_papak.manajemen_papak_3 !== null) { $('#manajemen-papak-3').prop('checked', true) }
                    // if (manajemen_papak.manajemen_papak_4 !== null) { $('#manajemen-papak-4').prop('checked', true) } 
                    // if (manajemen_papak.manajemen_papak_5 !== null) { $('#manajemen-papak-5').prop('checked', true) }
                    // if (manajemen_papak.manajemen_papak_6 !== null) { $('#manajemen-papak-6').prop('checked', true) }
                    // if (manajemen_papak.manajemen_papak_7 !== null) { $('#manajemen-papak-7').prop('checked', true) }
                    // if (manajemen_papak.manajemen_papak_8 !== null) { $('#manajemen-papak-8').prop('checked', true) } 
                    // if (manajemen_papak.manajemen_papak_9 !== null) { $('#manajemen-papak-9').prop('checked', true) } 

                    // Manajemen Papak
                    if (data.pengkajian_awal_pasien_akhir_kehidupan.manajemen_papak) {
                        const manajemen_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.manajemen_papak);
                        if (manajemen_papak.manajemen_papak_1 !== null) { $('#manajemen-papak-1').prop('checked', true) }
                        if (manajemen_papak.manajemen_papak_2 !== null) { $('#manajemen-papak-2').prop('checked', true) }
                        if (manajemen_papak.manajemen_papak_3 !== null) { $('#manajemen-papak-3').prop('checked', true) }
                        if (manajemen_papak.manajemen_papak_4 !== null) { $('#manajemen-papak-4').prop('checked', true) }
                        if (manajemen_papak.manajemen_papak_5 !== null) { $('#manajemen-papak-5').prop('checked', true) }
                        if (manajemen_papak.manajemen_papak_6 !== null) { $('#manajemen-papak-6').prop('checked', true) }
                        if (manajemen_papak.manajemen_papak_7 !== null) { $('#manajemen-papak-7').prop('checked', true) }
                        if (manajemen_papak.manajemen_papak_8 !== null) { $('#manajemen-papak-8').prop('checked', true) }
                        if (manajemen_papak.manajemen_papak_9 !== null) { $('#manajemen-papak-9').prop('checked', true) }
                    }

                    const reaksi_pasien_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.reaksi_pasien_papak); 
                    if (reaksi_pasien_papak.reaksi_pasien_papak_1 !== null) { $('#reaksi-pasien-papak-1').prop('checked', true) }
                    if (reaksi_pasien_papak.reaksi_pasien_papak_2 !== null) { $('#reaksi-pasien-papak-2').prop('checked', true) }
                    if (reaksi_pasien_papak.reaksi_pasien_papak_3 !== null) { $('#reaksi-pasien-papak-3').prop('checked', true) }
                    if (reaksi_pasien_papak.reaksi_pasien_papak_4 !== null) { $('#reaksi-pasien-papak-4').prop('checked', true) } 
                    if (reaksi_pasien_papak.reaksi_pasien_papak_5 !== null) { $('#reaksi-pasien-papak-5').prop('checked', true) }
                    if (reaksi_pasien_papak.reaksi_pasien_papak_6 !== null) { $('#reaksi-pasien-papak-6').prop('checked', true) }

                    // BARU
                    // const mp_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.mp_papak); 
                    // if (mp_papak.mp_papak_1 === '1') {$('#mp-papak-1').prop('checked', true).change() }
                    // if (mp_papak.mp_papak_2 === '1') {$('#mp-papak-2').prop('checked', true).change() }

                    if (data.pengkajian_awal_pasien_akhir_kehidupan.mp_papak) {
                        try {
                            const mp_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.mp_papak);
                            if (mp_papak.mp_papak_1 === '1') { $('#mp-papak-1').prop('checked', true).change(); }
                            if (mp_papak.mp_papak_2 === '1') { $('#mp-papak-2').prop('checked', true).change(); }
                        } catch (e) {
                            console.error('Data mp_papak tidak bisa diparse:', e);
                        }
                    }



                    const reaksi_keluarga_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.reaksi_keluarga_papak); 
                    if (reaksi_keluarga_papak.reaksi_keluarga_papak_1 !== null) { $('#reaksi-keluarga-papak-1').prop('checked', true) }
                    if (reaksi_keluarga_papak.reaksi_keluarga_papak_2 !== null) { $('#reaksi-keluarga-papak-2').prop('checked', true) }
                    if (reaksi_keluarga_papak.reaksi_keluarga_papak_3 !== null) { $('#reaksi-keluarga-papak-3').prop('checked', true) }
                    if (reaksi_keluarga_papak.reaksi_keluarga_papak_4 !== null) { $('#reaksi-keluarga-papak-4').prop('checked', true) } 
                    if (reaksi_keluarga_papak.reaksi_keluarga_papak_5 !== null) { $('#reaksi-keluarga-papak-5').prop('checked', true) }
                    if (reaksi_keluarga_papak.reaksi_keluarga_papak_6 !== null) { $('#reaksi-keluarga-papak-6').prop('checked', true) }
                    if (reaksi_keluarga_papak.reaksi_keluarga_papak_7 !== null) { $('#reaksi-keluarga-papak-7').prop('checked', true) }
                    if (reaksi_keluarga_papak.reaksi_keluarga_papak_8 !== null) { $('#reaksi-keluarga-papak-8').prop('checked', true) }
                    if (reaksi_keluarga_papak.reaksi_keluarga_papak_9 !== null) { $('#reaksi-keluarga-papak-9').prop('checked', true) }

                    const masalah_kep_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.masalah_kep_papak); 
                    // if (masalah_kep_papak.masalah_kep_papak_1 !== null) { $('#masalah-kep-papak-1').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_2 !== null) { $('#masalah-kep-papak-2').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_3 !== null) { $('#masalah-kep-papak-3').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_4 !== null) { $('#masalah-kep-papak-4').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_5 !== null) { $('#masalah-kep-papak-5').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_6 !== null) { $('#masalah-kep-papak-6').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_7 !== null) { $('#masalah-kep-papak-7').prop('checked', true) }
                    if (masalah_kep_papak.masalah_kep_papak_8 !== null) { $('#masalah-kep-papak-8').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_9 !== null) { $('#masalah-kep-papak-9').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_10 !== null) { $('#masalah-kep-papak-10').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_11 !== null) { $('#masalah-kep-papak-11').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_12 !== null) { $('#masalah-kep-papak-12').prop('checked', true) }
                    if (masalah_kep_papak.masalah_kep_papak_13 !== null) { $('#masalah-kep-papak-13').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_14 !== null) { $('#masalah-kep-papak-14').prop('checked', true) }                  
                    // if (masalah_kep_papak.masalah_kep_papak_15 !== null) {$('#masalah-kep-papak-15').val(masalah_kep_papak.masalah_kep_papak_15);}
                    if (masalah_kep_papak.masalah_kep_papak_16 !== null) { $('#masalah-kep-papak-16').prop('checked', true) }

                    const kebutuhan_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.kebutuhan_papak); 
                    if (kebutuhan_papak.kebutuhan_papak_1 !== null) { $('#kebutuhan-papak-1').prop('checked', true) }
                    if (kebutuhan_papak.kebutuhan_papak_2 !== null) { $('#kebutuhan-papak-2').prop('checked', true) }
                    if (kebutuhan_papak.kebutuhan_papak_3 !== null) { $('#kebutuhan-papak-3').prop('checked', true) }
                    if (kebutuhan_papak.kebutuhan_papak_4 !== null) { $('#kebutuhan-papak-4').prop('checked', true) }
                    if (kebutuhan_papak.kebutuhan_papak_5 !== null) {$('#kebutuhan-papak-5').val(kebutuhan_papak.kebutuhan_papak_5);}

                    
                    const apakah_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.apakah_papak); 
                    if (apakah_papak.apakah_papak_1 !== null) { $('#apakah-papak-1').prop('checked', true) }
                    if (apakah_papak.apakah_papak_2 !== null) { $('#apakah-papak-2').prop('checked', true) }
                    if (apakah_papak.apakah_papak_3 !== null) { $('#apakah-papak-3').prop('checked', true) }
                    if (apakah_papak.apakah_papak_4 !== null) {$('#apakah-papak-4').val(apakah_papak.apakah_papak_4);}
                    if (apakah_papak.apakah_papak_5 !== null) { $('#apakah-papak-5').prop('checked', true) }
                    if (apakah_papak.apakah_papak_6 !== null) {$('#apakah-papak-6').val(apakah_papak.apakah_papak_6);}

                    const bagi_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.bagi_papak); 
                    if (bagi_papak.bagi_papak_1 !== null) { $('#bagi-papak-1').prop('checked', true) }
                    if (bagi_papak.bagi_papak_2 !== null) { $('#bagi-papak-2').prop('checked', true) }
                    if (bagi_papak.bagi_papak_3 !== null) { $('#bagi-papak-3').prop('checked', true) }
                    if (bagi_papak.bagi_papak_4 !== null) { $('#bagi-papak-4').prop('checked', true) } 
                    if (bagi_papak.bagi_papak_5 !== null) { $('#bagi-papak-5').prop('checked', true) }
                    if (bagi_papak.bagi_papak_6 !== null) { $('#bagi-papak-6').prop('checked', true) }
                    if (bagi_papak.bagi_papak_7 !== null) { $('#bagi-papak-7').prop('checked', true) }
                    if (bagi_papak.bagi_papak_8 !== null) { $('#bagi-papak-8').prop('checked', true) }
                    if (bagi_papak.bagi_papak_9 !== null) { $('#bagi-papak-9').prop('checked', true) }

                    // BARU
                    // const mpn_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.mpn_papak); 
                    // if (mpn_papak.mpn_papak_1 === '1') {$('#mpn-papak-1').prop('checked', true).change() }
                    // if (mpn_papak.mpn_papak_2 === '1') {$('#mpn-papak-2').prop('checked', true).change() }

                    if (data.pengkajian_awal_pasien_akhir_kehidupan.mpn_papak) {
                        try {
                            const mpn_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.mpn_papak);
                            if (mpn_papak.mpn_papak_1 === '1') { $('#mpn-papak-1').prop('checked', true).change(); }
                            if (mpn_papak.mpn_papak_2 === '1') { $('#mpn-papak-2').prop('checked', true).change(); }
                        } catch (e) {
                            console.error('Gagal parsing mpn_papak:', e);
                        }
                    }



                    const penilaian_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.penilaian_papak);
                    // if (penilaian_papak.penilaian_papak_1 === '1') {$('#penilaian-papak-1').prop('checked', true).change() }
                    // if (penilaian_papak.penilaian_papak_1 === '2') {$('#penilaian-papak-2').prop('checked', true).change () } 
                    // if (penilaian_papak.penilaian_papak_1 === '3') {$('#penilaian-papak-3').prop('checked', true).change () } 
                    if (penilaian_papak.penilaian_papak_5 !== null) { $('#penilaian-papak-5').prop('checked', true) }
                    if (penilaian_papak.penilaian_papak_6 !== null) { $('#penilaian-papak-6').prop('checked', true) }
                    // if (penilaian_papak.penilaian_papak_7 !== null) { $('#penilaian-papak-7').prop('checked', true) }
                    if (penilaian_papak.penilaian_papak_8 !== null) {$('#penilaian-papak-8').val(penilaian_papak.penilaian_papak_8);}
                    if (penilaian_papak.penilaian_papak_9 !== null) {$('#penilaian-papak-9').val(penilaian_papak.penilaian_papak_9);}
                    // if (penilaian_papak.penilaian_papak_10 !== null) {$('#penilaian-papak-10').val(penilaian_papak.penilaian_papak_10);}
                    // if (penilaian_papak.penilaian_papak_11 !== null) {$('#penilaian-papak-11').val(penilaian_papak.penilaian_papak_11);}
                    // if (penilaian_papak.penilaian_papak_12 !== null) { $('#penilaian-papak-12').prop('checked', true) }
                    // if (penilaian_papak.penilaian_papak_13 !== null) { $('#penilaian-papak-13').prop('checked', true) }
                    // if (penilaian_papak.penilaian_papak_14 !== null) { $('#penilaian-papak-14').prop('checked', true) }
                    // if (penilaian_papak.penilaian_papak_15 !== null) { $('#penilaian-papak-15').prop('checked', true) }
                    // if (penilaian_papak.penilaian_papak_16 !== null) { $('#penilaian-papak-16').prop('checked', true) }
                    // if (penilaian_papak.penilaian_papak_17 !== null) {$('#penilaian-papak-17').val(penilaian_papak.penilaian_papak_17);}
                    // if (penilaian_papak.penilaian_papak_18 === '0') {$('#penilaian-papak-18').prop('checked', true).change() }
                    // if (penilaian_papak.penilaian_papak_18 === '1') {$('#penilaian-papak-19').prop('checked', true).change () } 
                    // if (penilaian_papak.penilaian_papak_20 !== null) {$('#penilaian-papak-20').val(penilaian_papak.penilaian_papak_20);}

                    const orintasi_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.orintasi_papak); 
                    if (orintasi_papak.orintasi_papak_1 === '1') {$('#orintasi-papak-1').prop('checked', true).change() }
                    if (orintasi_papak.orintasi_papak_1 === '2') {$('#orintasi-papak-2').prop('checked', true).change () } 
                    if (orintasi_papak.orintasi_papak_3 !== null) {$('#orintasi-papak-3').val(orintasi_papak.orintasi_papak_3);}

                    const urusan_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.urusan_papak); 
                    if (urusan_papak.urusan_papak_1 === '1') {$('#urusan-papak-1').prop('checked', true).change() }
                    if (urusan_papak.urusan_papak_1 === '2') {$('#urusan-papak-2').prop('checked', true).change () }
                    if (urusan_papak.urusan_papak_7 !== null) {$('#urusan-papak-7').val(urusan_papak.urusan_papak_7);} 
                    if (urusan_papak.urusan_papak_3 === '1') {$('#urusan-papak-3').prop('checked', true).change() }
                    if (urusan_papak.urusan_papak_3 === '2') {$('#urusan-papak-4').prop('checked', true).change () }
                    if (urusan_papak.urusan_papak_8 !== null) {$('#urusan-papak-8').val(urusan_papak.urusan_papak_8);}
                    if (urusan_papak.urusan_papak_5 === '1') {$('#urusan-papak-5').prop('checked', true).change() }
                    if (urusan_papak.urusan_papak_5 === '2') {$('#urusan-papak-6').prop('checked', true).change () }
                    if (urusan_papak.urusan_papak_9 !== null) {$('#urusan-papak-9').val(urusan_papak.urusan_papak_9);}

                    const psikologis_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.psikologis_papak); 
                    if (psikologis_papak.psikologis_papak_1 !== null) { $('#psikologis-papak-1').prop('checked', true) }
                    if (psikologis_papak.psikologis_papak_2 !== null) {$('#psikologis-papak-2').val(psikologis_papak.psikologis_papak_2);}
                    if (psikologis_papak.psikologis_papak_3 !== null) {$('#psikologis-papak-3').val(psikologis_papak.psikologis_papak_3);}
                    if (psikologis_papak.psikologis_papak_4 !== null) {$('#psikologis-papak-4').val(psikologis_papak.psikologis_papak_4);}
                    if (psikologis_papak.psikologis_papak_5 !== null) {$('#psikologis-papak-5').val(psikologis_papak.psikologis_papak_5);}
                    if (psikologis_papak.psikologis_papak_6 !== null) { $('#psikologis-papak-6').prop('checked', true) }
                    if (psikologis_papak.psikologis_papak_7 !== null) { $('#psikologis-papak-7').prop('checked', true) }
                    if (psikologis_papak.psikologis_papak_8 === '1') {$('#psikologis-papak-8').prop('checked', true).change() }
                    if (psikologis_papak.psikologis_papak_8 === '2') {$('#psikologis-papak-9').prop('checked', true).change () }
                    if (psikologis_papak.psikologis_papak_10 === '1') {$('#psikologis-papak-10').prop('checked', true).change() }
                    if (psikologis_papak.psikologis_papak_11 !== null) {$('#psikologis-papak-11').val(psikologis_papak.psikologis_papak_11);}
                    if (psikologis_papak.psikologis_papak_10 === '2') {$('#psikologis-papak-12').prop('checked', true).change () }
                    if (psikologis_papak.psikologis_papak_13 === '1') {$('#psikologis-papak-13').prop('checked', true).change() }
                    if (psikologis_papak.psikologis_papak_13 === '2') {$('#psikologis-papak-14').prop('checked', true).change () }
             

                    // if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_penurunan_bb_papak == 1) {
                    //     $('#sn-papak-tidak').prop('checked', true);
                    //     calcscorerjk();

                    // } else if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_penurunan_bb_papak == 2) {
                    //     $('#sn-papak-tidak-yakin').prop('checked', true);
                    //     calcscorerjk();

                    // } else if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_penurunan_bb_papak == 3) {
                    //     $('#sn-papak-ya').prop('checked', true).change();

                    //     if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_penurunan_bb_on_papak == 1) {
                    //         $('#sn-papak-pbb-1-1').prop('checked', true);
                    //         calcscorerjk();

                    //     } else if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_penurunan_bb_on_papak == 2) {
                    //         $('#sn-papak-pbb-2-2').prop('checked', true);
                    //         calcscorerjk();

                    //     } else if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_penurunan_bb_on_papak == 3) {
                    //         $('#sn-papak-pbb-3-3').prop('checked', true);
                    //         calcscorerjk();

                    //     } else if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_penurunan_bb_on_papak == 4) {
                    //         $('#sn-papak-pbb-4-4').prop('checked', true);
                    //         calcscorerjk();

                    //     } else if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_penurunan_bb_on_papak == 5) {
                    //         $('#sn-papak-pbb-5-5').prop('checked', true);
                    //         calcscorerjk();
                    //     }
                    // }

                    // if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_asupan_makan_papak == 0) {
                    //     $('#sn-papak-asupan-makan-tidak').prop('checked', true);
                    //     calcscorerjk();
                    // } else if (data.pengkajian_awal_pasien_akhir_kehidupan.sn_asupan_makan_papak == 1) {
                    //     $('#sn-papak-asupan-makan-ya').prop('checked', true);
                    //     calcscorerjk();
                    // }


                    // const masalah_kep_papak = JSON.parse(data.pengkajian_awal_pasien_akhir_kehidupan.masalah_kep_papak); 
                    // if (masalah_kep_papak.masalah_kep_papak_1 !== null) { $('#masalah-kep-papak-1').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_2 !== null) { $('#masalah-kep-papak-2').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_3 !== null) { $('#masalah-kep-papak-3').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_4 !== null) { $('#masalah-kep-papak-4').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_5 !== null) { $('#masalah-kep-papak-5').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_6 !== null) { $('#masalah-kep-papak-6').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_7 !== null) { $('#masalah-kep-papak-7').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_8 !== null) { $('#masalah-kep-papak-8').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_9 !== null) { $('#masalah-kep-papak-9').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_10 !== null) { $('#masalah-kep-papak-10').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_11 !== null) { $('#masalah-kep-papak-11').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_12 !== null) { $('#masalah-kep-papak-12').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_13 !== null) { $('#masalah-kep-papak-13').prop('checked', true) }
                    // if (masalah_kep_papak.masalah_kep_papak_14 !== null) { $('#masalah-kep-papak-14').prop('checked', true) }                  
                    // if (masalah_kep_papak.masalah_kep_papak_15 !== null) {$('#masalah-kep-papak-15').val(masalah_kep_papak.masalah_kep_papak_15);}
                    // if (masalah_kep_papak.masalah_kep_papak_16 !== null) { $('#masalah-kep-papak-16').prop('checked', true) }

                    $('#tanggal-jam-perawat-papak').val((data.pengkajian_awal_pasien_akhir_kehidupan.tanggal_jam_perawat_papak !== null ? datetimefmysql(data.pengkajian_awal_pasien_akhir_kehidupan.tanggal_jam_perawat_papak) : ''));
                    if (data.pengkajian_awal_pasien_akhir_kehidupan.perawat_papak !== null) { $('#perawat-papak').select2c('readonly', false)}
                    $('#perawat-papak').val(data.pengkajian_awal_pasien_akhir_kehidupan.perawat_papak);
                    $('#s2id_perawat-papak a .select2c-chosen').html(data.pengkajian_awal_pasien_akhir_kehidupan.perawat);
                    if (data.ttd_perawat_papak !== null) {
                        $('#ttd-perawat-papak').hide();
                        $('#ttd_perawat_papak_verified').show();
                    }                   
                }     

                $('#bed-papak').text(bed);
                $('#modal_pengkajian_pasien_akhir_kehidupan').modal('show');        
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })

    }   

    function resetFormPengkajianAwalPasienAkhirKehidupan() {
        $('#wizard-keperawatan-papak').bwizard('show', '0');
        $('#form_entri_keperawatan_papak')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#id-papak').val('');

        // perawat /  Tulisan pilih
        $('#s2id_perawat-papak a .select2c-chosen').html('Pilih Perawat');

        // Perawat 
        $('#perawat-papak').val('');
         // s2id perawat
        $('#s2id_perawat-papak a .select2c-chosen').empty();

        // CEKLIS TTTD PERAWAT 
        $('#ttd-perawat-papak').show();
        $('#ttd_perawat_papak_verified').hide();


        $('#tanggal-jam-perawat-papak').attr('disabled', false);
        $('#perawat-papak').select2c('readonly',false);
    }

    function konfirmasiSimpanFormPengkajianPasienAkhirKehidupan() {
        var stop = false;
        if ($('#tanggal-jam-perawat-papak').val() === '') {
            syams_validation('#tanggal-jam-perawat-papak', 'Kolom waktu verifikasi perawat harus diisi!');
            $('#tanggal-jam-perawat-papak').focus();
            $('#wizard-keperawatan-papak').bwizard('show', '0');
            stop = true;
        }

        if ($('#perawat-papak').val() === '') {
            syams_validation('#perawat-papak', 'Kolom perawat harus dipilih!');
            $('#wizard-keperawatan-papak').bwizard('show', '0');
            stop = true;
        }

        if (!stop) {
            var id_papak = $('#id-papak').val();
            var text;
            var btnTextConfirmPapak;

            if (id_papak) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmPapak = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmPapak = 'Simpan';
            }

            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmPapak,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    SimpanFormPengkajianPasienAkhirKehidupan();
                }
            });
        }
    }

    function SimpanFormPengkajianPasienAkhirKehidupan() {
        var id_layanan_pendaftaran_papak = $('#id-layanan-pendaftaran-papak').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pemeriksaan_poli/api/pemeriksaan_poli/simpan_data_pengkajian_awal_pasien_akhir_kehidupan") ?>',
            data: $('#form_entri_keperawatan_papak').serialize() + '&id-layanan-pendaftaran-papak=' + id_layanan_pendaftaran_papak,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-keperawatan-papak').bwizard('show', data.respon.show);

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
                        $('#modal_pengkajian_pasien_akhir_kehidupan').modal('hide');
                        showListForm($('#id-pendaftaran-papak').val(), $('#id-layanan-pendaftaran-papak').val(), $('#id-pasien-papak').val());
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

    // function calcscorerjk() {
    //     var score = 0;
    //     $("input[name='sn_penurunan_bb_papak']:checked").each(function() {
    //         if ($(this).val() == '1') {
    //             score += parseInt(0);
    //         } else if ($(this).val() == '2') {
    //             score += parseInt(2);
    //         } else if ($(this).val() == '3') {
    //             $("input[name='sn_penurunan_bb_on_papak']:checked").each(function() {
    //                 if ($(this).val() == '1') {
    //                     score += parseInt(1);
    //                 } else if ($(this).val() == '2') {
    //                     score += parseInt(2);
    //                 } else if ($(this).val() == '3') {
    //                     score += parseInt(3);
    //                 } else if ($(this).val() == '4') {
    //                     score += parseInt(4);
    //                 } else if ($(this).val() == '5') {
    //                     score += parseInt(2);
    //                 }
    //             });
    //         }
    //     });

    //     $("input[name='sn_asupan_makan_papak']:checked").each(function() {
    //         if ($(this).val() == '0') {
    //             score += parseInt(0);
    //         } else if ($(this).val() == '1') {
    //             score += parseInt(1);
    //         }
    //     });
    //     $("input[name=sn_total_papak]").val(score);
    // } 

    // // GCS
    // $('.gcsk').on('keyup', function() {
    //     let sum = 0
    //     $('.gcsk').each(function() {
    //         sum += Number($(this).val());
    //     });
    //     $('#gcs-et-4').val(sum);
    // })

</script>

