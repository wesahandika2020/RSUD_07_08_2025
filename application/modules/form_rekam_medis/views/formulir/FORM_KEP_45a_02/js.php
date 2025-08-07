<script>



    // AAAS_BARU
    $('#aaas-tanggal-pemeriksaan-pasien').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        maxDate: new Date()
    }).on('dp.change', function() {
        const date = $(this).val().split(' ')[0].split('/');
        const tanggal = date[0];
        const bulan = date[1];
        const tahun = date[2];
        const namaHari = new Date(`${tahun}-${bulan}-${tanggal}`).toLocaleDateString('id-ID',{weekday:'long'});
        $('').val(namaHari);
    });

    // AAAS_BARU
    $(' #aaas-perawat, #aaas-pemeriksa-asesmen-anestesi')
    .select2c({
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



    // function lihatFORM_KEP_45a_02(data) {
    //     let pasien = data.pasien;
    //     let layanan = data.layanan;
    //     let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
    //     let action = 'lihat';

    //     entriAsesmentAwalAnestesiSedasi(layanan.id_pendaftaran, layanan.id, bed, action);
    // }

    // function editFORM_KEP_45a_02(data) {
    //     let pasien = data.pasien;
    //     let layanan = data.layanan;
    //     let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
    //     let action = 'edit';

    //     entriAsesmentAwalAnestesiSedasi(layanan.id_pendaftaran, layanan.id, bed, action);
    // }

    // function tambahFORM_KEP_45a_02(data) {
    //     let pasien = data.pasien;
    //     let layanan = data.layanan;
    //     let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
    //     let action = 'tambah';

    //     entriAsesmentAwalAnestesiSedasi(layanan.id_pendaftaran, layanan.id, bed, action);
    // }


    
    function lihatFORM_KEP_45a_02(data) {
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
        entriAsesmentAwalAnestesiSedasi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_45a_02(data) {
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
        entriAsesmentAwalAnestesiSedasi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_45a_02(data) {
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
        entriAsesmentAwalAnestesiSedasi(layanan.id_pendaftaran, layanan.id, bed, action);
    }



    function entriAsesmentAwalAnestesiSedasi(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        // console.log(id_pendaftaran, id_layanan_pendaftaran, bed, action);

        // $('#modal_assesment_anestesi_sedasi').modal('show');        
        
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
            url: '<?= base_url("order_operasi/api/order_operasi/get_data_asesment_anestesi_sedasi") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,

           

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetFormAsesmentAwalAnestesiSedasi(); 
                $('#id-layanan-pendaftaran-aaasB').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-aaasB').val(id_pendaftaran);

                if (data.pasien !== null) {
                    $('#id-pasien-aaasB').val(data.pasien.id_pasien);
                    $('#nama-pasien-aaasB').text(data.pasien.nama);
                    $('#no-aaasB').text(data.pasien.no_rm);
                    $('#tanggal-lahir-aaasB').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-aaasB').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#alamat-aaasB').text(data.pasien.alamat);
                }


                // ASESSMENT ANESTESI/SEDASI KAMAR OPERASI AWAL
                let assesmen_awal_anestesi_sedasi = data.assesmen_awal_anestesi_sedasi;
                if (assesmen_awal_anestesi_sedasi !== null) {
                    $('#id-aaasB').val(assesmen_awal_anestesi_sedasi.id);
                    $('#aaas-diagnosis').val(data.assesmen_awal_anestesi_sedasi.aaas_diagnosis);
                    $('#aaas-rot').val(data.assesmen_awal_anestesi_sedasi.aaas_rot);

                    $('#aaas-perawat').val(data.assesmen_awal_anestesi_sedasi.aaas_perawat);
                    $('#s2id_aaas-perawat a .select2c-chosen').html(data.assesmen_awal_anestesi_sedasi.nama_perawat_1);

                    const aaas_anamnesa = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_anamnesa);
                    if (aaas_anamnesa.aaas_anamnesa === 'Pasien') { $('#aaas-anamnesa-1').prop('checked', true).change() }
                    if (aaas_anamnesa.aaas_anamnesa === 'Keluarga') { $('#aaas-anamnesa-2').prop('checked', true).change() }
                    if (aaas_anamnesa.aaas_anamnesa === 'Lainnya') { $('#aaas-anamnesa-3').prop('checked', true).change() }
                    if (aaas_anamnesa.aaas_anamnesa_4 !== null) { $('#aaas-anamnesa-4').val(aaas_anamnesa.aaas_anamnesa_4);}

                    const aaas_riwayat_anestesi = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_riwayat_anestesi);
                    if (aaas_riwayat_anestesi.aaas_riwayat_anestesi === 'Normal') { $('#aaas-riwayat-anestesi-1').prop('checked', true).change() }
                    if (aaas_riwayat_anestesi.aaas_riwayat_anestesi === 'Kering') { $('#aaas-riwayat-anestesi-2').prop('checked', true).change() }
                    if (aaas_riwayat_anestesi.aaas_riwayat_anestesi === 'Ada cairan dari luka') { $('#aaas-riwayat-anestesi-3').prop('checked', true).change() }
                    if (aaas_riwayat_anestesi.aaas_riwayat_anestesi_4 !== null) { $('#aaas-riwayat-anestesi-4').val(aaas_riwayat_anestesi.aaas_riwayat_anestesi_4);}

                    const aaas_komplikasi = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_komplikasi);
                    if (aaas_komplikasi.aaas_komplikasi === 'Normal') { $('#aaas-komplikasi-1').prop('checked', true).change() }
                    if (aaas_komplikasi.aaas_komplikasi === 'Kering') { $('#aaas-komplikasi-2').prop('checked', true).change() }
                    if (aaas_komplikasi.aaas_komplikasi === 'Ada cairan dari luka') { $('#aaas-komplikasi-3').prop('checked', true).change() }
                    if (aaas_komplikasi.aaas_komplikasi_4 !== null) { $('#aaas-komplikasi-4').val(aaas_komplikasi.aaas_komplikasi_4);}

                    $('#aaas-konsumsi-obat').val(data.assesmen_awal_anestesi_sedasi.aaas_konsumsi_obat);

                    const aaas_riwayat_alergi = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_riwayat_alergi);
                    if (aaas_riwayat_alergi.aaas_riwayat_alergi === 'Normal') { $('#aaas-riwayat-alergi-1').prop('checked', true).change() }
                    if (aaas_riwayat_alergi.aaas_riwayat_alergi === 'Kering') { $('#aaas-riwayat-alergi-2').prop('checked', true).change() }
                    if (aaas_riwayat_alergi.aaas_riwayat_alergi === 'Ada cairan dari luka') { $('#aaas-riwayat-alergi-3').prop('checked', true).change() }
                    if (aaas_riwayat_alergi.aaas_riwayat_alergi_4 !== null) { $('#aaas-riwayat-alergi-4').val(aaas_riwayat_alergi.aaas_riwayat_alergi_4);}

                    $('#aaas-tanda').val(data.assesmen_awal_anestesi_sedasi.aaas_tanda);

                    const aaas_berat = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_berat);
                    if (aaas_berat.aaas_berat_1 !== null) { $('#aaas-berat-1').val(aaas_berat.aaas_berat_1);}
                    if (aaas_berat.aaas_berat_2 !== null) { $('#aaas-berat-2').val(aaas_berat.aaas_berat_2);}
                    if (aaas_berat.aaas_berat_3 !== null) { $('#aaas-berat-3').val(aaas_berat.aaas_berat_3);}
                    if (aaas_berat.aaas_berat_4 !== null) { $('#aaas-berat-4').val(aaas_berat.aaas_berat_4);}
                    if (aaas_berat.aaas_berat_5 !== null) { $('#aaas-berat-5').val(aaas_berat.aaas_berat_5);}
                    if (aaas_berat.aaas_berat_6 !== null) { $('#aaas-berat-6').val(aaas_berat.aaas_berat_6);}

                    const aaas_skor_nyeri = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_skor_nyeri);
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '1') { $('#aaas-skor-nyeri-1').prop('checked', true).change() }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '2') { $('#aaas-skor-nyeri-2').prop('checked', true).change() }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '3') { $('#aaas-skor-nyeri-3').prop('checked', true).change() }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '4') { $('#aaas-skor-nyeri-4').prop('checked', true).change() }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '5') { $('#aaas-skor-nyeri-5').prop('checked', true).change() }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '6') { $('#aaas-skor-nyeri-6').prop('checked', true).change() }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '7') { $('#aaas-skor-nyeri-7').prop('checked', true).change() }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '8') { $('#aaas-skor-nyeri-8').prop('checked', true).change() }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '9') { $('#aaas-skor-nyeri-9').prop('checked', true).change() }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '10') { $('#aaas-skor-nyeri-10').prop('checked', true).change() }

                    const aaas_evaluasi = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_evaluasi);
                    if (aaas_evaluasi.aaas_evaluasi_1 === '0') { $('#aaas-evaluasi-1').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_1 === '1') { $('#aaas-evaluasi-2').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_3 === '0') { $('#aaas-evaluasi-3').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_3 === '1') { $('#aaas-evaluasi-4').prop('checked', true).change() }

                    if (aaas_evaluasi.aaas_evaluasi_5 === '0') { $('#aaas-evaluasi-5').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_5 === '1') { $('#aaas-evaluasi-6').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_7 !== null) { $('#aaas-evaluasi-7').val(aaas_evaluasi.aaas_evaluasi_7);}

                    if (aaas_evaluasi.aaas_evaluasi_8 === '0') { $('#aaas-evaluasi-8').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_8 === '1') { $('#aaas-evaluasi-9').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_10 !== null) { $('#aaas-evaluasi-10').val(aaas_evaluasi.aaas_evaluasi_10);}

                    if (aaas_evaluasi.aaas_evaluasi_11 === '0') { $('#aaas-evaluasi-11').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_11 === '1') { $('#aaas-evaluasi-12').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_13 !== null) { $('#aaas-evaluasi-13').val(aaas_evaluasi.aaas_evaluasi_13);}

                    if (aaas_evaluasi.aaas_evaluasi_14 === '0') { $('#aaas-evaluasi-14').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_14 === '1') { $('#aaas-evaluasi-15').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_16 === '0') { $('#aaas-evaluasi-16').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_16 === '1') { $('#aaas-evaluasi-17').prop('checked', true).change() }

                    if (aaas_evaluasi.aaas_evaluasi_18 === '1') { $('#aaas-evaluasi-18').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_18 === '2') { $('#aaas-evaluasi-19').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_18 === '3') { $('#aaas-evaluasi-20').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_18 === '4') { $('#aaas-evaluasi-21').prop('checked', true).change() }

                    if (aaas_evaluasi.aaas_evaluasi_22 === '0') { $('#aaas-evaluasi-22').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_22 === '1') { $('#aaas-evaluasi-23').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_24 === '0') { $('#aaas-evaluasi-24').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_24 === '1') { $('#aaas-evaluasi-25').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_26 === '0') { $('#aaas-evaluasi-26').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_26 === '1') { $('#aaas-evaluasi-27').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_28 === '0') { $('#aaas-evaluasi-28').prop('checked', true).change() }
                    if (aaas_evaluasi.aaas_evaluasi_28 === '1') { $('#aaas-evaluasi-29').prop('checked', true).change() }












                    const aaas_pernafasan = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_pernafasan);
                    if (aaas_pernafasan.aaas_pernafasan_1 !== null) {$('#aaas-pernafasan-1').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_2 !== null) {$('#aaas-pernafasan-2').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_3 !== null) {$('#aaas-pernafasan-3').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_4 !== null) {$('#aaas-pernafasan-4').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_5 !== null) {$('#aaas-pernafasan-5').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_6 !== null) {$('#aaas-pernafasan-6').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_7 !== null) {$('#aaas-pernafasan-7').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_8 !== null) {$('#aaas-pernafasan-8').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_9 !== null) {$('#aaas-pernafasan-9').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_10 !== null) {$('#aaas-pernafasan-10').prop('checked', true).change() }
                    if (aaas_pernafasan.aaas_pernafasan_11 !== null) { $('#aaas-pernafasan-11').val(aaas_pernafasan.aaas_pernafasan_11);}
                    if (aaas_pernafasan.aaas_pernafasan_12 !== null) {$('#aaas-pernafasan-12').prop('checked', true).change() }



                    const aaas_kardiovaskular = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_kardiovaskular);
                    if (aaas_kardiovaskular.aaas_kardiovaskular_1 !== null) {$('#aaas-kardiovaskular-1').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_2 !== null) {$('#aaas-kardiovaskular-2').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_3 !== null) {$('#aaas-kardiovaskular-3').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_4 !== null) {$('#aaas-kardiovaskular-4').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_5 !== null) {$('#aaas-kardiovaskular-5').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_6 !== null) {$('#aaas-kardiovaskular-6').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_7 !== null) {$('#aaas-kardiovaskular-7').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_8 !== null) {$('#aaas-kardiovaskular-8').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_9 !== null) {$('#aaas-kardiovaskular-9').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_10 !== null) {$('#aaas-kardiovaskular-10').prop('checked', true).change() }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_11 !== null) { $('#aaas-kardiovaskular-11').val(aaas_kardiovaskular.aaas_kardiovaskular_11);}
                    if (aaas_kardiovaskular.aaas_kardiovaskular_12 !== null) {$('#aaas-kardiovaskular-12').prop('checked', true).change() }



                    const aaas_neuro = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_neuro);
                    if (aaas_neuro.aaas_neuro_1 !== null) {$('#aaas-neuro-1').prop('checked', true).change() }
                    if (aaas_neuro.aaas_neuro_2 !== null) {$('#aaas-neuro-2').prop('checked', true).change() }
                    if (aaas_neuro.aaas_neuro_3 !== null) {$('#aaas-neuro-3').prop('checked', true).change() }
                    if (aaas_neuro.aaas_neuro_4 !== null) {$('#aaas-neuro-4').prop('checked', true).change() }
                    if (aaas_neuro.aaas_neuro_5 !== null) {$('#aaas-neuro-5').prop('checked', true).change() }
                    if (aaas_neuro.aaas_neuro_6 !== null) {$('#aaas-neuro-6').prop('checked', true).change() }
                    if (aaas_neuro.aaas_neuro_7 !== null) {$('#aaas-neuro-7').prop('checked', true).change() }
                    if (aaas_neuro.aaas_neuro_8 !== null) {$('#aaas-neuro-8').prop('checked', true).change() }
                    if (aaas_neuro.aaas_neuro_9 !== null) { $('#aaas-neuro-9').val(aaas_neuro.aaas_neuro_9);}
                    if (aaas_neuro.aaas_neuro_10 !== null) {$('#aaas-neuro-10').prop('checked', true).change() }



                    const aaas_renal = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_renal);
                    if (aaas_renal.aaas_renal_1 !== null) {$('#aaas-renal-1').prop('checked', true).change() }
                    if (aaas_renal.aaas_renal_2 !== null) {$('#aaas-renal-2').prop('checked', true).change() }
                    if (aaas_renal.aaas_renal_3 !== null) {$('#aaas-renal-3').prop('checked', true).change() }
                    if (aaas_renal.aaas_renal_4 !== null) {$('#aaas-renal-4').prop('checked', true).change() }
                    if (aaas_renal.aaas_renal_5 !== null) { $('#aaas-renal-5').val(aaas_renal.aaas_renal_5);}
                    if (aaas_renal.aaas_renal_6 !== null) {$('#aaas-renal-6').prop('checked', true).change() }


                
                    const aaas_hepato = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_hepato);
                    if (aaas_hepato.aaas_hepato_1 !== null) {$('#aaas-hepato-1').prop('checked', true).change() }
                    if (aaas_hepato.aaas_hepato_2 !== null) {$('#aaas-hepato-2').prop('checked', true).change() }
                    if (aaas_hepato.aaas_hepato_3 !== null) {$('#aaas-hepato-3').prop('checked', true).change() }
                    if (aaas_hepato.aaas_hepato_4 !== null) {$('#aaas-hepato-4').prop('checked', true).change() }
                    if (aaas_hepato.aaas_hepato_5 !== null) {$('#aaas-hepato-5').prop('checked', true).change() }
                    if (aaas_hepato.aaas_hepato_6 !== null) {$('#aaas-hepato-6').prop('checked', true).change() }
                    if (aaas_hepato.aaas_hepato_7 !== null) { $('#aaas-hepato-7').val(aaas_hepato.aaas_hepato_7);}
                    if (aaas_hepato.aaas_hepato_8 !== null) {$('#aaas-hepato-8').prop('checked', true).change() }



                    const aaas_lain = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_lain);
                    if (aaas_lain.aaas_lain_1 !== null) {$('#aaas-lain-1').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_2 !== null) {$('#aaas-lain-2').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_3 !== null) {$('#aaas-lain-3').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_4 !== null) {$('#aaas-lain-4').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_5 !== null) {$('#aaas-lain-5').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_6 !== null) {$('#aaas-lain-6').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_7 !== null) {$('#aaas-lain-7').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_8 !== null) {$('#aaas-lain-8').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_9 !== null) {$('#aaas-lain-9').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_10 !== null) {$('#aaas-lain-10').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_11 !== null) {$('#aaas-lain-11').prop('checked', true).change() }
                    if (aaas_lain.aaas_lain_12 !== null) { $('#aaas-lain-12').val(aaas_lain.aaas_lain_12);}
                    if (aaas_lain.aaas_lain_13 !== null) {$('#aaas-lain-13').prop('checked', true).change() }






                    const aaas_hematologi = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_hematologi);
                    if (aaas_hematologi.aaas_hematologi_1 !== null) { $('#aaas-hematologi-1').val(aaas_hematologi.aaas_hematologi_1);}
                    if (aaas_hematologi.aaas_hematologi_2 !== null) { $('#aaas-hematologi-2').val(aaas_hematologi.aaas_hematologi_2);}
                    if (aaas_hematologi.aaas_hematologi_3 !== null) { $('#aaas-hematologi-3').val(aaas_hematologi.aaas_hematologi_3);}
                    if (aaas_hematologi.aaas_hematologi_4 !== null) { $('#aaas-hematologi-4').val(aaas_hematologi.aaas_hematologi_4);}
                    if (aaas_hematologi.aaas_hematologi_5 !== null) { $('#aaas-hematologi-5').val(aaas_hematologi.aaas_hematologi_5);}
                    if (aaas_hematologi.aaas_hematologi_6 !== null) { $('#aaas-hematologi-6').val(aaas_hematologi.aaas_hematologi_6);}

                    const aaas_serum = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_serum);
                    if (aaas_serum.aaas_serum_1 !== null) { $('#aaas-serum-1').val(aaas_serum.aaas_serum_1);}
                    if (aaas_serum.aaas_serum_2 !== null) { $('#aaas-serum-2').val(aaas_serum.aaas_serum_2);}
                    if (aaas_serum.aaas_serum_3 !== null) { $('#aaas-serum-3').val(aaas_serum.aaas_serum_3);}
                    if (aaas_serum.aaas_serum_4 !== null) { $('#aaas-serum-4').val(aaas_serum.aaas_serum_4);}

                    const aaas_fungsi = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_fungsi);
                    if (aaas_fungsi.aaas_fungsi_1 !== null) { $('#aaas-fungsi-1').val(aaas_fungsi.aaas_fungsi_1);}
                    if (aaas_fungsi.aaas_fungsi_2 !== null) { $('#aaas-fungsi-2').val(aaas_fungsi.aaas_fungsi_2);}
                    if (aaas_fungsi.aaas_fungsi_3 !== null) { $('#aaas-fungsi-3').val(aaas_fungsi.aaas_fungsi_3);}
                    if (aaas_fungsi.aaas_fungsi_4 !== null) { $('#aaas-fungsi-4').val(aaas_fungsi.aaas_fungsi_4);}
                    if (aaas_fungsi.aaas_fungsi_5 !== null) { $('#aaas-fungsi-5').val(aaas_fungsi.aaas_fungsi_5);}
                    if (aaas_fungsi.aaas_fungsi_6 !== null) { $('#aaas-fungsi-6').val(aaas_fungsi.aaas_fungsi_6);}
                    if (aaas_fungsi.aaas_fungsi_7 !== null) { $('#aaas-fungsi-7').val(aaas_fungsi.aaas_fungsi_7);}
                    if (aaas_fungsi.aaas_fungsi_8 !== null) { $('#aaas-fungsi-8').val(aaas_fungsi.aaas_fungsi_8);}
                    

                    const aaas_ginjal = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_ginjal);
                    if (aaas_ginjal.aaas_ginjal_1 !== null) { $('#aaas-ginjal-1').val(aaas_ginjal.aaas_ginjal_1);}
                    if (aaas_ginjal.aaas_ginjal_2 !== null) { $('#aaas-ginjal-2').val(aaas_ginjal.aaas_ginjal_2);}

                    const aaas_edokorin = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_edokorin);
                    if (aaas_edokorin.aaas_edokorin_1 !== null) { $('#aaas-edokorin-1').val(aaas_edokorin.aaas_edokorin_1);}
                    if (aaas_edokorin.aaas_edokorin_2 !== null) { $('#aaas-edokorin-2').val(aaas_edokorin.aaas_edokorin_2);}
                    if (aaas_edokorin.aaas_edokorin_3 !== null) { $('#aaas-edokorin-3').val(aaas_edokorin.aaas_edokorin_3);}
                    if (aaas_edokorin.aaas_edokorin_4 !== null) { $('#aaas-edokorin-4').val(aaas_edokorin.aaas_edokorin_4);}
                    if (aaas_edokorin.aaas_edokorin_5 !== null) { $('#aaas-edokorin-5').val(aaas_edokorin.aaas_edokorin_5);}
                    if (aaas_edokorin.aaas_edokorin_6 !== null) { $('#aaas-edokorin-6').val(aaas_edokorin.aaas_edokorin_6);}

                    const aaas_agd = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_agd);
                    if (aaas_agd.aaas_agd_1 !== null) { $('#aaas-agd-1').val(aaas_agd.aaas_agd_1);}
                    if (aaas_agd.aaas_agd_2 !== null) { $('#aaas-agd-2').val(aaas_agd.aaas_agd_2);}
                    if (aaas_agd.aaas_agd_3 !== null) { $('#aaas-agd-3').val(aaas_agd.aaas_agd_3);}
                    if (aaas_agd.aaas_agd_4 !== null) { $('#aaas-agd-4').val(aaas_agd.aaas_agd_4);}
                    if (aaas_agd.aaas_agd_5 !== null) { $('#aaas-agd-5').val(aaas_agd.aaas_agd_5);}

                    const aaas_pemeriksaan = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_pemeriksaan);
                    if (aaas_pemeriksaan.aaas_pemeriksaan_1 !== null) { $('#aaas-pemeriksaan-1').val(aaas_pemeriksaan.aaas_pemeriksaan_1);}
                    if (aaas_pemeriksaan.aaas_pemeriksaan_2 !== null) { $('#aaas-pemeriksaan-2').val(aaas_pemeriksaan.aaas_pemeriksaan_2);}
                    if (aaas_pemeriksaan.aaas_pemeriksaan_3 !== null) { $('#aaas-pemeriksaan-3').val(aaas_pemeriksaan.aaas_pemeriksaan_3);}
                    if (aaas_pemeriksaan.aaas_pemeriksaan_4 !== null) { $('#aaas-pemeriksaan-4').val(aaas_pemeriksaan.aaas_pemeriksaan_4);}
                    if (aaas_pemeriksaan.aaas_pemeriksaan_5 !== null) { $('#aaas-pemeriksaan-5').val(aaas_pemeriksaan.aaas_pemeriksaan_5);}
                    if (aaas_pemeriksaan.aaas_pemeriksaan_6 !== null) { $('#aaas-pemeriksaan-6').val(aaas_pemeriksaan.aaas_pemeriksaan_6);}

            
                    // TAMBAHAN BARU
                    // const baru = JSON.parse(data.assesmen_awal_anestesi_sedasi.baru);
                    // if (baru.baru_1 !== null) {$('#baru-1').prop('checked', true).change() }
                    // if (baru.baru_2 !== null) {$('#baru-2').prop('checked', true).change() }
                    // if (baru.baru_3 !== null) {$('#baru-3').prop('checked', true).change() }
                    // if (baru.baru_4 !== null) {$('#baru-4').prop('checked', true).change() }

                    const baru = JSON.parse(data.assesmen_awal_anestesi_sedasi.baru);
                    if (baru !== null) {
                        if (baru.baru_1 !== null) {$('#baru-1').prop('checked', true).change(); }
                        if (baru.baru_2 !== null) {$('#baru-2').prop('checked', true).change(); }
                        if (baru.baru_3 !== null) {$('#baru-3').prop('checked', true).change(); }
                        if (baru.baru_4 !== null) {$('#baru-4').prop('checked', true).change(); }
                    }



                    $('#aaas-sedasi').val(data.assesmen_awal_anestesi_sedasi.aaas_sedasi);
                    $('#aaas-ga').val(data.assesmen_awal_anestesi_sedasi.aaas_ga);


                    const aaas_regional = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_regional);
                    // if (aaas_regional.aaas_regional_1 === 'Spinal') { $('#aaas-regional-1').prop('checked', true).change() }
                    // if (aaas_regional.aaas_regional_1 === 'Epidural') { $('#aaas-regional-2').prop('checked', true).change() }
                    // if (aaas_regional.aaas_regional_1 === 'Kaudal') { $('#aaas-regional-3').prop('checked', true).change() }
                    // if (aaas_regional.aaas_regional_1 === 'Block Prifer') { $('#aaas-regional-4').prop('checked', true).change() }
                    if (aaas_regional.aaas_regional_1 !== null) {$('#aaas-regional-1').prop('checked', true).change() }
                    if (aaas_regional.aaas_regional_2 !== null) {$('#aaas-regional-2').prop('checked', true).change() }
                    if (aaas_regional.aaas_regional_3 !== null) {$('#aaas-regional-3').prop('checked', true).change() }
                    if (aaas_regional.aaas_regional_4 !== null) {$('#aaas-regional-4').prop('checked', true).change() }

                    const aaas_teknik = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_teknik);
                    // if (aaas_teknik.aaas_teknik_1 === 'Hipotensi') { $('#aaas-teknik-1').prop('checked', true).change() }
                    // if (aaas_teknik.aaas_teknik_1 === 'Ventilasi satu Paru') { $('#aaas-teknik-2').prop('checked', true).change() }
                    // if (aaas_teknik.aaas_teknik_1 === 'TCI') { $('#aaas-teknik-3').prop('checked', true).change() }
                    // if (aaas_teknik.aaas_teknik_1 === '1') { $('#aaas-teknik-4').prop('checked', true).change() }
                    if (aaas_teknik.aaas_teknik_1 !== null) {$('#aaas-teknik-1').prop('checked', true).change() }
                    if (aaas_teknik.aaas_teknik_2 !== null) {$('#aaas-teknik-2').prop('checked', true).change() }
                    if (aaas_teknik.aaas_teknik_3 !== null) {$('#aaas-teknik-3').prop('checked', true).change() }
                    if (aaas_teknik.aaas_teknik_4 !== null) {$('#aaas-teknik-4').prop('checked', true).change() }
                    if (aaas_teknik.aaas_teknik_5 !== null) { $('#aaas-teknik-5').val(aaas_teknik.aaas_teknik_5);}

                    const aaas_monitoring = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_monitoring);
                    // if (aaas_monitoring.aaas_monitoring_1 === 'EKG Lead') { $('#aaas-monitoring-1').prop('checked', true).change() }
                    // if (aaas_monitoring.aaas_monitoring_1 === 'SpO2') { $('#aaas-monitoring-2').prop('checked', true).change() }
                    // if (aaas_monitoring.aaas_monitoring_1 === 'NIBP') { $('#aaas-monitoring-3').prop('checked', true).change() }
                    // if (aaas_monitoring.aaas_monitoring_1 === 'Temp') { $('#aaas-monitoring-4').prop('checked', true).change() }
                    // if (aaas_monitoring.aaas_monitoring_1 === 'CVP') { $('#aaas-monitoring-5').prop('checked', true).change() }
                    // if (aaas_monitoring.aaas_monitoring_1 === 'Arteri Line') { $('#aaas-monitoring-6').prop('checked', true).change() }
                    // if (aaas_monitoring.aaas_monitoring_1 === 'ELCO2') { $('#aaas-monitoring-7').prop('checked', true).change() }
                    // if (aaas_monitoring.aaas_monitoring_1 === 'BIS') { $('#aaas-monitoring-8').prop('checked', true).change() }
                    // if (aaas_monitoring.aaas_monitoring_1 === '1') { $('#aaas-monitoring-9').prop('checked', true).change() }

                    if (aaas_monitoring.aaas_monitoring_1 !== null) {$('#aaas-monitoring-1').prop('checked', true).change() }
                    if (aaas_monitoring.aaas_monitoring_2 !== null) {$('#aaas-monitoring-2').prop('checked', true).change() }
                    if (aaas_monitoring.aaas_monitoring_3 !== null) {$('#aaas-monitoring-3').prop('checked', true).change() }
                    if (aaas_monitoring.aaas_monitoring_4 !== null) {$('#aaas-monitoring-4').prop('checked', true).change() }
                    if (aaas_monitoring.aaas_monitoring_5 !== null) {$('#aaas-monitoring-5').prop('checked', true).change() }
                    if (aaas_monitoring.aaas_monitoring_6 !== null) {$('#aaas-monitoring-6').prop('checked', true).change() }
                    if (aaas_monitoring.aaas_monitoring_7 !== null) {$('#aaas-monitoring-7').prop('checked', true).change() }
                    if (aaas_monitoring.aaas_monitoring_8 !== null) {$('#aaas-monitoring-8').prop('checked', true).change() }
                    if (aaas_monitoring.aaas_monitoring_9 !== null) {$('#aaas-monitoring-9').prop('checked', true).change() }
                    if (aaas_monitoring.aaas_monitoring_10 !== null) { $('#aaas-monitoring-10').val(aaas_monitoring.aaas_monitoring_10);}

                    const aaas_alat = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_alat);
                    // if (aaas_alat.aaas_alat_1 === 'Bronchoscopy') { $('#aaas-alat-1').prop('checked', true).change() }
                    // if (aaas_alat.aaas_alat_1 === 'Glidecsope') { $('#aaas-alat-2').prop('checked', true).change() }
                    // if (aaas_alat.aaas_alat_1 === 'USG') { $('#aaas-alat-3').prop('checked', true).change() }
                    // if (aaas_alat.aaas_alat_1 === '1') { $('#aaas-alat-4').prop('checked', true).change() }

                    if (aaas_alat.aaas_alat_1 !== null) {$('#aaas-alat-1').prop('checked', true).change() }
                    if (aaas_alat.aaas_alat_2 !== null) {$('#aaas-alat-2').prop('checked', true).change() }
                    if (aaas_alat.aaas_alat_3 !== null) {$('#aaas-alat-3').prop('checked', true).change() }
                    if (aaas_alat.aaas_alat_4 !== null) {$('#aaas-alat-4').prop('checked', true).change() }
                    if (aaas_alat.aaas_alat_5 !== null) { $('#aaas-alat-5').val(aaas_alat.aaas_alat_5);}






                    const aaas_pasca = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_pasca);
                    if (aaas_pasca.aaas_pasca_1 === 'Rawat Inap') { $('#aaas-pasca-1').prop('checked', true).change() }
                    if (aaas_pasca.aaas_pasca_1 === 'Rawat Jalan') { $('#aaas-pasca-2').prop('checked', true).change() }
                    if (aaas_pasca.aaas_pasca_1 === 'Rawat Khusus') { $('#aaas-pasca-3').prop('checked', true).change() }
                    if (aaas_pasca.aaas_pasca_1 === 'ICU') { $('#aaas-pasca-4').prop('checked', true).change() }
                    if (aaas_pasca.aaas_pasca_1 === 'HCU') { $('#aaas-pasca-5').prop('checked', true).change() }
                    if (aaas_pasca.aaas_pasca_1 === 'APS') { $('#aaas-pasca-6').prop('checked', true).change() }
                    if (aaas_pasca.aaas_pasca_1 === '1') { $('#aaas-pasca-7').prop('checked', true).change() }
                    if (aaas_pasca.aaas_pasca_8 !== null) { $('#aaas-pasca-8').val(aaas_pasca.aaas_pasca_8);}

                    const aaas_ps = JSON.parse(data.assesmen_awal_anestesi_sedasi.aaas_ps);
                    if (aaas_ps.aaas_ps_1 === '1') { $('#aaas-ps-1').prop('checked', true).change() }
                    if (aaas_ps.aaas_ps_1 === '2') { $('#aaas-ps-2').prop('checked', true).change() }
                    if (aaas_ps.aaas_ps_1 === '3') { $('#aaas-ps-3').prop('checked', true).change() }
                    if (aaas_ps.aaas_ps_1 === '4') { $('#aaas-ps-4').prop('checked', true).change() }
                    if (aaas_ps.aaas_ps_1 === '5') { $('#aaas-ps-5').prop('checked', true).change() }
                    if (aaas_ps.aaas_ps_1 === '6') { $('#aaas-ps-6').prop('checked', true).change() }

                    $('#aaas-penyulit').val(data.assesmen_awal_anestesi_sedasi.aaas_penyulit);

                    $('#aaas-puasa').val(data.assesmen_awal_anestesi_sedasi.aaas_puasa);

                    $('#aaas-premedikal').val(data.assesmen_awal_anestesi_sedasi.aaas_premedikal);

                    $('#aaas-catatan').val(data.assesmen_awal_anestesi_sedasi.aaas_catatan);

                    $('#aaas-tanggal-pemeriksaan-pasien').val((data.assesmen_awal_anestesi_sedasi.aaas_tanggal_pemeriksaan_pasien !== null ? datetimefmysql(data.assesmen_awal_anestesi_sedasi.aaas_tanggal_pemeriksaan_pasien) : ''));

                    $('#aaas-pemeriksa-asesmen-anestesi').val(data.assesmen_awal_anestesi_sedasi.aaas_pemeriksa_asesmen_anestesi);
                    $('#s2id_aaas-pemeriksa-asesmen-anestesi a .select2c-chosen').html(data.assesmen_awal_anestesi_sedasi.nama_perawat_2);

                    if (assesmen_awal_anestesi_sedasi.aaas_pemeriksa == '1') { $('#aaas-pemeriksa').prop('checked', true); }
                }
                //  ASESSMENT ANESTESI/SEDASI KAMAR OPERASI AKHIR
   
                $('#bed-aaasB').text(bed);
                $('#modal_assesment_anestesi_sedasi').modal('show');        
            },

            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })

    }



    function resetFormAsesmentAwalAnestesiSedasi() {
        $('#form_entri_operasi_aaasB')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
    }


    function konfirmasiSimpanAsesmentAwalAnestesiSedasi() {
        swal.fire({
            title: 'Simpan Data',
            text: "Apakah anda yakin akan menyimpan data ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanAsesmentAwalAnestesiSedasi();
            }
        })
    }
 
    function simpanAsesmentAwalAnestesiSedasi() {
        var id_layanan_pendaftaran_aaasB = $('#id-layanan-pendaftaran-aaasB').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/order_operasi/simpan_asesment_anestesi_sedasi") ?>',
            data: $('#form_entri_operasi_aaasB').serialize() + '&id-layanan-pendaftaran-aaasB=' + id_layanan_pendaftaran_aaasB,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {
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
                        
                        $('#modal_assesment_anestesi_sedasi').modal('hide');
                        showListForm($('#id-pendaftaran-aaasB').val(), $('#id-layanan-pendaftaran-aaasB').val(), $('#id-pasien-aaasB').val());
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






</script>