<!-- // PARTOGRAF -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
<script>  
    // var nomer = 1;
    //     nomer++;
        
    $('#btn-expand-all-partograf').click(function() { $('.multi-collapse').addClass('show');});

    $('#btn-collapse-all-partograf').click(function() { $('.multi-collapse').removeClass('show');});
    
    $("#wizard-partograf").bwizard();

    // BIDAN
    $('#bidan-cp')
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

    // $('#tgl-cp')
    // .datetimepicker({
    //     format: 'DD/MM/YYYY',
    //     pickSecond: false,
    //     pick12HourFormat: false,
    //     maxDate: new Date(),
    //     beforeShow: function(i) {
    //         if ($(i).attr('readonly')) {
    //             return false;
    //         }
    //     }
    // });

    $('#waktu-iv-1, #waktu-iv-2, #waktu-iv-3, #waktu-iv-4, #waktu-iv-5, #waktu-iv-6, #waktu-iv-7, #waktu-iv-8, #waktu-iv-9, #waktu-iv-10, #waktujam-1, #waktujam-2, #waktujam-3, #waktujam-4, #waktujam-5, #waktujam-6, #waktujam-7, #waktujam-8, #waktujam-9, #waktujam-10, #waktujam-11, #waktujam-12, #waktujam-13, #waktujam-14, #waktujam-15, #waktujam-16, #jam-grafik-sk')
    .on('click', function() {
        $(this).timepicker({
            format: 'HH:mm',
            showInputs: false,
            showMeridian: false
        });
    })   

    function lihatFORM_KEP_112_00(data) {
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
        entriFormPortograf(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function editFORM_KEP_112_00(data) {
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
        entriFormPortograf(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function tambahFORM_KEP_112_00(data) {
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
        entriFormPortograf(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }
  
    // ini yang asli
    function entriFormPortograf(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, action) {
        // $('#modal_partograf').modal('show');  
        // showTabel(nomer);
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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_partograf") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
                console.log(data);
                resetFormPartograf(); 
                $('#id-layanan-pendaftaran-partograf').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-partograf').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-partograf').val(data.pasien.id_pasien);
                    $('#nama-pasien-partograf').text(data.pasien.nama);
                    // $('#nama-suami-partograf').text(data.pasien.nama_ayah);
                    $('#no-partograf').text(data.pasien.no_rm);
                    $('#tanggal-lahir-partograf').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-partograf').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan')); 
                    $('#agama-partograf').text(data.pasien.agama);
                    $('#alamat-partograf').text(data.pasien.alamat);                      
                }
     
 
                // Dalam catatn persalinan numpang naroh data partograf tgl dan jam yang paling atas
                if (data.catatan_persalinan !== null) {  
                    $('#btn_cetak_partograf').show();  // Menampilkan tombol cetak
                    $('#btn_cetak_partograf').on('click', function() {
                        konfirmasiCetakFormPartograf(id_pendaftaran, id_layanan_pendaftaran);  // Fungsi ini hanya dipanggil setelah tombol diklik
                    });

                    
                    
                    $('#id-partograf').val(data.catatan_persalinan.id);

                    $('#nama-suami-partograf').text(data.catatan_persalinan.nama_ayah);

                    
                    $('#g-partograf').val(data.catatan_persalinan.g_partograf);
                    $('#p-partograf').val(data.catatan_persalinan.p_partograf);
                    $('#a-partograf').val(data.catatan_persalinan.a_partograf);
                    $('#hamil-partograf').val(data.catatan_persalinan.hamil_partograf);
                    $('#tbj-partograf').val(data.catatan_persalinan.tbj_partograf);
                    
                    $('#tgl-mulas-partograf').val(data.catatan_persalinan.tgl_mulas_partograf);
                    $('#pukul-mulas-partograf').val(data.catatan_persalinan.pukul_mulas_partograf);
                    $('#tgl-masuk-partograf').val(data.catatan_persalinan.tgl_masuk_partograf);
                    $('#pukul-masuk-partograf').val(data.catatan_persalinan.pukul_masuk_partograf);
                    $('#tgl-pecah-partograf').val(data.catatan_persalinan.tgl_pecah_partograf);
                    $('#pukul-pecah-partograf').val(data.catatan_persalinan.pukul_pecah_partograf);

                    // const air_ket_penyusupan = JSON.parse(data.catatan_persalinan.air_ket_penyusupan);  
                    // if (air_ket_penyusupan.air_ket_penyusupan_1 !== null) {$('#air-ket-penyusupan-1').val(air_ket_penyusupan.air_ket_penyusupan_1);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_2 !== null) {$('#air-ket-penyusupan-2').val(air_ket_penyusupan.air_ket_penyusupan_2);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_3 !== null) {$('#air-ket-penyusupan-3').val(air_ket_penyusupan.air_ket_penyusupan_3);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_4 !== null) {$('#air-ket-penyusupan-4').val(air_ket_penyusupan.air_ket_penyusupan_4);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_5 !== null) {$('#air-ket-penyusupan-5').val(air_ket_penyusupan.air_ket_penyusupan_5);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_6 !== null) {$('#air-ket-penyusupan-6').val(air_ket_penyusupan.air_ket_penyusupan_6);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_7 !== null) {$('#air-ket-penyusupan-7').val(air_ket_penyusupan.air_ket_penyusupan_7);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_8 !== null) {$('#air-ket-penyusupan-8').val(air_ket_penyusupan.air_ket_penyusupan_8);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_9 !== null) {$('#air-ket-penyusupan-9').val(air_ket_penyusupan.air_ket_penyusupan_9);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_10 !== null) {$('#air-ket-penyusupan-10').val(air_ket_penyusupan.air_ket_penyusupan_10);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_11 !== null) {$('#air-ket-penyusupan-11').val(air_ket_penyusupan.air_ket_penyusupan_11);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_12 !== null) {$('#air-ket-penyusupan-12').val(air_ket_penyusupan.air_ket_penyusupan_12);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_13 !== null) {$('#air-ket-penyusupan-13').val(air_ket_penyusupan.air_ket_penyusupan_13);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_14 !== null) {$('#air-ket-penyusupan-14').val(air_ket_penyusupan.air_ket_penyusupan_14);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_15 !== null) {$('#air-ket-penyusupan-15').val(air_ket_penyusupan.air_ket_penyusupan_15);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_16 !== null) {$('#air-ket-penyusupan-16').val(air_ket_penyusupan.air_ket_penyusupan_16);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_17 !== null) {$('#air-ket-penyusupan-17').val(air_ket_penyusupan.air_ket_penyusupan_17);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_18 !== null) {$('#air-ket-penyusupan-18').val(air_ket_penyusupan.air_ket_penyusupan_18);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_19 !== null) {$('#air-ket-penyusupan-19').val(air_ket_penyusupan.air_ket_penyusupan_19);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_20 !== null) {$('#air-ket-penyusupan-20').val(air_ket_penyusupan.air_ket_penyusupan_20);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_21 !== null) {$('#air-ket-penyusupan-21').val(air_ket_penyusupan.air_ket_penyusupan_21);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_22 !== null) {$('#air-ket-penyusupan-22').val(air_ket_penyusupan.air_ket_penyusupan_22);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_23 !== null) {$('#air-ket-penyusupan-23').val(air_ket_penyusupan.air_ket_penyusupan_23);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_24 !== null) {$('#air-ket-penyusupan-24').val(air_ket_penyusupan.air_ket_penyusupan_24);}


                    // const air_ket_penyusupan = JSON.parse(data.catatan_persalinan.air_ket_penyusupan);  
                    // if (air_ket_penyusupan.air_ket_penyusupan_1 !== null) {$('#air-ket-penyusupan-1').val(air_ket_penyusupan.air_ket_penyusupan_1);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_2 !== null) {$('#air-ket-penyusupan-2').val(air_ket_penyusupan.air_ket_penyusupan_2);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_3 !== null) {$('#air-ket-penyusupan-3').val(air_ket_penyusupan.air_ket_penyusupan_3);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_4 !== null) {$('#air-ket-penyusupan-4').val(air_ket_penyusupan.air_ket_penyusupan_4);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_5 !== null) {$('#air-ket-penyusupan-5').val(air_ket_penyusupan.air_ket_penyusupan_5);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_6 !== null) {$('#air-ket-penyusupan-6').val(air_ket_penyusupan.air_ket_penyusupan_6);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_7 !== null) {$('#air-ket-penyusupan-7').val(air_ket_penyusupan.air_ket_penyusupan_7);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_8 !== null) {$('#air-ket-penyusupan-8').val(air_ket_penyusupan.air_ket_penyusupan_8);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_9 !== null) {$('#air-ket-penyusupan-9').val(air_ket_penyusupan.air_ket_penyusupan_9);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_10 !== null) {$('#air-ket-penyusupan-10').val(air_ket_penyusupan.air_ket_penyusupan_10);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_11 !== null) {$('#air-ket-penyusupan-11').val(air_ket_penyusupan.air_ket_penyusupan_11);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_12 !== null) {$('#air-ket-penyusupan-12').val(air_ket_penyusupan.air_ket_penyusupan_12);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_13 !== null) {$('#air-ket-penyusupan-13').val(air_ket_penyusupan.air_ket_penyusupan_13);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_14 !== null) {$('#air-ket-penyusupan-14').val(air_ket_penyusupan.air_ket_penyusupan_14);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_15 !== null) {$('#air-ket-penyusupan-15').val(air_ket_penyusupan.air_ket_penyusupan_15);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_16 !== null) {$('#air-ket-penyusupan-16').val(air_ket_penyusupan.air_ket_penyusupan_16);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_17 !== null) {$('#air-ket-penyusupan-17').val(air_ket_penyusupan.air_ket_penyusupan_17);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_18 !== null) {$('#air-ket-penyusupan-18').val(air_ket_penyusupan.air_ket_penyusupan_18);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_19 !== null) {$('#air-ket-penyusupan-19').val(air_ket_penyusupan.air_ket_penyusupan_19);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_20 !== null) {$('#air-ket-penyusupan-20').val(air_ket_penyusupan.air_ket_penyusupan_20);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_21 !== null) {$('#air-ket-penyusupan-21').val(air_ket_penyusupan.air_ket_penyusupan_21);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_22 !== null) {$('#air-ket-penyusupan-22').val(air_ket_penyusupan.air_ket_penyusupan_22);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_23 !== null) {$('#air-ket-penyusupan-23').val(air_ket_penyusupan.air_ket_penyusupan_23);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_24 !== null) {$('#air-ket-penyusupan-24').val(air_ket_penyusupan.air_ket_penyusupan_24);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_25 !== null) {$('#air-ket-penyusupan-25').val(air_ket_penyusupan.air_ket_penyusupan_25);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_26 !== null) {$('#air-ket-penyusupan-26').val(air_ket_penyusupan.air_ket_penyusupan_26);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_27 !== null) {$('#air-ket-penyusupan-27').val(air_ket_penyusupan.air_ket_penyusupan_27);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_28 !== null) {$('#air-ket-penyusupan-28').val(air_ket_penyusupan.air_ket_penyusupan_28);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_29 !== null) {$('#air-ket-penyusupan-29').val(air_ket_penyusupan.air_ket_penyusupan_29);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_30 !== null) {$('#air-ket-penyusupan-30').val(air_ket_penyusupan.air_ket_penyusupan_30);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_31 !== null) {$('#air-ket-penyusupan-31').val(air_ket_penyusupan.air_ket_penyusupan_31);}
                    // if (air_ket_penyusupan.air_ket_penyusupan_32 !== null) {$('#air-ket-penyusupan-32').val(air_ket_penyusupan.air_ket_penyusupan_32);}


                    const air_ket_penyusupan = JSON.parse(data.catatan_persalinan.air_ket_penyusupan);
                    for (let i = 1; i <= 32; i++) {
                        let key = `air_ket_penyusupan_${i}`;
                        if (air_ket_penyusupan[key] !== null) {
                            $(`#air-ket-penyusupan-${i}`).val(air_ket_penyusupan[key]);
                        }
                    }




                    // const air_ketu_penyusupan = JSON.parse(data.catatan_persalinan.air_ketu_penyusupan);  
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_1 !== null) {$('#air-ketu-penyusupan-1').val(air_ketu_penyusupan.air_ketu_penyusupan_1);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_2 !== null) {$('#air-ketu-penyusupan-2').val(air_ketu_penyusupan.air_ketu_penyusupan_2);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_3 !== null) {$('#air-ketu-penyusupan-3').val(air_ketu_penyusupan.air_ketu_penyusupan_3);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_4 !== null) {$('#air-ketu-penyusupan-4').val(air_ketu_penyusupan.air_ketu_penyusupan_4);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_5 !== null) {$('#air-ketu-penyusupan-5').val(air_ketu_penyusupan.air_ketu_penyusupan_5);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_6 !== null) {$('#air-ketu-penyusupan-6').val(air_ketu_penyusupan.air_ketu_penyusupan_6);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_7 !== null) {$('#air-ketu-penyusupan-7').val(air_ketu_penyusupan.air_ketu_penyusupan_7);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_8 !== null) {$('#air-ketu-penyusupan-8').val(air_ketu_penyusupan.air_ketu_penyusupan_8);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_9 !== null) {$('#air-ketu-penyusupan-9').val(air_ketu_penyusupan.air_ketu_penyusupan_9);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_10 !== null) {$('#air-ketu-penyusupan-10').val(air_ketu_penyusupan.air_ketu_penyusupan_10);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_11 !== null) {$('#air-ketu-penyusupan-11').val(air_ketu_penyusupan.air_ketu_penyusupan_11);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_12 !== null) {$('#air-ketu-penyusupan-12').val(air_ketu_penyusupan.air_ketu_penyusupan_12);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_13 !== null) {$('#air-ketu-penyusupan-13').val(air_ketu_penyusupan.air_ketu_penyusupan_13);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_14 !== null) {$('#air-ketu-penyusupan-14').val(air_ketu_penyusupan.air_ketu_penyusupan_14);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_15 !== null) {$('#air-ketu-penyusupan-15').val(air_ketu_penyusupan.air_ketu_penyusupan_15);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_16 !== null) {$('#air-ketu-penyusupan-16').val(air_ketu_penyusupan.air_ketu_penyusupan_16);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_17 !== null) {$('#air-ketu-penyusupan-17').val(air_ketu_penyusupan.air_ketu_penyusupan_17);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_18 !== null) {$('#air-ketu-penyusupan-18').val(air_ketu_penyusupan.air_ketu_penyusupan_18);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_19 !== null) {$('#air-ketu-penyusupan-19').val(air_ketu_penyusupan.air_ketu_penyusupan_19);}
                    // if (air_ketu_penyusupan.air_ketu_penyusupan_20 !== null) {$('#air-ketu-penyusupan-20').val(air_ketu_penyusupan.air_ketu_penyusupan_20);}
                    // // if (air_ketu_penyusupan.air_ketu_penyusupan_21 !== null) {$('#air-ketu-penyusupan-21').val(air_ketu_penyusupan.air_ketu_penyusupan_21);}
                    // // if (air_ketu_penyusupan.air_ketu_penyusupan_22 !== null) {$('#air-ketu-penyusupan-22').val(air_ketu_penyusupan.air_ketu_penyusupan_22);}
                    // // if (air_ketu_penyusupan.air_ketu_penyusupan_23 !== null) {$('#air-ketu-penyusupan-23').val(air_ketu_penyusupan.air_ketu_penyusupan_23);}
                    // // if (air_ketu_penyusupan.air_ketu_penyusupan_24 !== null) {$('#air-ketu-penyusupan-24').val(air_ketu_penyusupan.air_ketu_penyusupan_24);}


                    const air_ketu_penyusupan = JSON.parse(data.catatan_persalinan.air_ketu_penyusupan);
                    for (let i = 1; i <= 32; i++) {
                        let key = `air_ketu_penyusupan_${i}`;
                        if (air_ketu_penyusupan[key] !== null) {
                            $(`#air-ketu-penyusupan-${i}`).val(air_ketu_penyusupan[key]);
                        }
                    }


                    $('#tgl-cp').val(data.catatan_persalinan.tgl_cp);
                    $('#bidan-cp').val(data.catatan_persalinan.bidan_cp);
                    $('#s2id_bidan-cp a .select2c-chosen').html(data.catatan_persalinan.bidan);   


                    const tp_cp = JSON.parse(data.catatan_persalinan.tp_cp);  
                    if (tp_cp.tp_cp_1 !== null) { $('#tp-cp-1').prop('checked', true) }
                    if (tp_cp.tp_cp_2 !== null) { $('#tp-cp-2').prop('checked', true) }
                    if (tp_cp.tp_cp_3 !== null) { $('#tp-cp-3').prop('checked', true) }
                    if (tp_cp.tp_cp_4 !== null) { $('#tp-cp-4').prop('checked', true) }
                    if (tp_cp.tp_cp_5 !== null) {$('#tp-cp-5').val(tp_cp.tp_cp_5);}
                    if (tp_cp.tp_cp_6 !== null) { $('#tp-cp-6').prop('checked', true) }
                    if (tp_cp.tp_cp_7 !== null) { $('#tp-cp-7').prop('checked', true) }
                    if (tp_cp.tp_cp_8 !== null) {$('#tp-cp-8').val(tp_cp.tp_cp_8);}

                    $('#alamat-cp').val(data.catatan_persalinan.alamat_cp);

                    const catatan_cp = JSON.parse(data.catatan_persalinan.catatan_cp);  
                    if (catatan_cp.catatan_cp_1 !== null) { $('#catatan-cp-1').prop('checked', true) }
                    if (catatan_cp.catatan_cp_2 !== null) { $('#catatan-cp-2').prop('checked', true) }
                    if (catatan_cp.catatan_cp_3 !== null) { $('#catatan-cp-3').prop('checked', true) }
                    if (catatan_cp.catatan_cp_4 !== null) { $('#catatan-cp-4').prop('checked', true) }
                    if (catatan_cp.catatan_cp_5 !== null) { $('#catatan-cp-5').prop('checked', true) }

                    $('#as-cp').val(data.catatan_persalinan.as_cp);
                    $('#tr-cp').val(data.catatan_persalinan.tr_cp);

                    const juk_cp = JSON.parse(data.catatan_persalinan.juk_cp);  
                    if (juk_cp.juk_cp_1 !== null) { $('#juk-cp-1').prop('checked', true) }
                    if (juk_cp.juk_cp_2 !== null) { $('#juk-cp-2').prop('checked', true) }
                    if (juk_cp.juk_cp_3 !== null) { $('#juk-cp-3').prop('checked', true) }
                    if (juk_cp.juk_cp_4 !== null) { $('#juk-cp-4').prop('checked', true) }
                    if (juk_cp.juk_cp_5 !== null) { $('#juk-cp-5').prop('checked', true) }
                    if (juk_cp.juk_cp_6 !== null) { $('#juk-cp-6').prop('checked', true) }


                    const mas_cp = JSON.parse(data.catatan_persalinan.mas_cp);  
                    if (mas_cp.mas_cp_1 !== null) { $('#mas-cp-1').prop('checked', true) }
                    if (mas_cp.mas_cp_2 !== null) { $('#mas-cp-2').prop('checked', true) }
                    if (mas_cp.mas_cp_3 !== null) { $('#mas-cp-3').prop('checked', true) }
                    if (mas_cp.mas_cp_4 !== null) { $('#mas-cp-4').prop('checked', true) }
                    if (mas_cp.mas_cp_5 !== null) { $('#mas-cp-5').prop('checked', true) }

                    $('#part-cp').val(data.catatan_persalinan.part_cp);
                    $('#kan-cp').val(data.catatan_persalinan.kan_cp);
                    $('#but-cp').val(data.catatan_persalinan.but_cp);
                    $('#sil-cp').val(data.catatan_persalinan.sil_cp);

                    const episiotomi_cp = JSON.parse(data.catatan_persalinan.episiotomi_cp);  
                    if (episiotomi_cp.episiotomi_cp_1 !== null) { $('#episiotomi-cp-1').prop('checked', true) }
                    if (episiotomi_cp.episiotomi_cp_2 !== null) {$('#episiotomi-cp-2').val(episiotomi_cp.episiotomi_cp_2);}
                    if (episiotomi_cp.episiotomi_cp_3 !== null) { $('#episiotomi-cp-3').prop('checked', true) }
                    if (episiotomi_cp.episiotomi_cp_4 !== null) {$('#episiotomi-cp-4').val(episiotomi_cp.episiotomi_cp_4);}

                    const pendm_cp = JSON.parse(data.catatan_persalinan.pendm_cp);  
                    if (pendm_cp.pendm_cp_1 !== null) { $('#pendm-cp-1').prop('checked', true) }
                    if (pendm_cp.pendm_cp_2 !== null) { $('#pendm-cp-2').prop('checked', true) }
                    if (pendm_cp.pendm_cp_3 !== null) { $('#pendm-cp-3').prop('checked', true) }
                    if (pendm_cp.pendm_cp_4 !== null) { $('#pendm-cp-4').prop('checked', true) }
                    if (pendm_cp.pendm_cp_5 !== null) { $('#pendm-cp-5').prop('checked', true) }


                    const gwt_cp = JSON.parse(data.catatan_persalinan.gwt_cp);  
                    if (gwt_cp.gwt_cp_1 !== null) { $('#gwt-cp-1').prop('checked', true) }
                    if (gwt_cp.gwt_cp_2 !== null) {$('#gwt-cp-2').val(gwt_cp.gwt_cp_2);}
                    if (gwt_cp.gwt_cp_3 !== null) {$('#gwt-cp-3').val(gwt_cp.gwt_cp_3);}


                    const distosia_cp = JSON.parse(data.catatan_persalinan.distosia_cp);  
                    if (distosia_cp.distosia_cp_1 !== null) { $('#distosia-cp-1').prop('checked', true) }
                    if (distosia_cp.distosia_cp_2 !== null) {$('#distosia-cp-2').val(distosia_cp.distosia_cp_2);}
                    if (distosia_cp.distosia_cp_3 !== null) { $('#distosia-cp-3').prop('checked', true) }

                    $('#tsb-cp').val(data.catatan_persalinan.tsb_cp);

                    const ini_cp = JSON.parse(data.catatan_persalinan.ini_cp);  
                    if (ini_cp.ini_cp_1 !== null) { $('#ini-cp-1').prop('checked', true) }
                    if (ini_cp.ini_cp_2 !== null) { $('#ini-cp-2').prop('checked', true) }
                    if (ini_cp.ini_cp_3 !== null) {$('#ini-cp-3').val(ini_cp.ini_cp_3);}

                    $('#iii-cp').val(data.catatan_persalinan.iii_cp);

                    const im_cp = JSON.parse(data.catatan_persalinan.im_cp);  
                    if (im_cp.im_cp_1 !== null) { $('#im-cp-1').prop('checked', true) }
                    if (im_cp.im_cp_2 !== null) {$('#im-cp-2').val(im_cp.im_cp_2);}
                    if (im_cp.im_cp_3 !== null) { $('#im-cp-3').prop('checked', true) }
                    if (im_cp.im_cp_4 !== null) {$('#im-cp-4').val(im_cp.im_cp_4);}

                    $('#tali-cp').val(data.catatan_persalinan.tali_cp);

                    const pb_cp = JSON.parse(data.catatan_persalinan.pb_cp);  
                    if (pb_cp.pb_cp_1 !== null) { $('#pb-cp-1').prop('checked', true) }
                    if (pb_cp.pb_cp_2 !== null) {$('#pb-cp-2').val(pb_cp.pb_cp_2);}
                    if (pb_cp.pb_cp_3 !== null) { $('#pb-cp-3').prop('checked', true) }
                    if (pb_cp.pb_cp_4 !== null) {$('#pb-cp-4').val(pb_cp.pb_cp_4);}

                    const penegangan_cp = JSON.parse(data.catatan_persalinan.penegangan_cp);  
                    if (penegangan_cp.penegangan_cp_1 !== null) { $('#penegangan-cp-1').prop('checked', true) }
                    if (penegangan_cp.penegangan_cp_2 !== null) { $('#penegangan-cp-2').prop('checked', true) }
                    if (penegangan_cp.penegangan_cp_3 !== null) {$('#penegangan-cp-3').val(penegangan_cp.penegangan_cp_3);}


                    const masase_cp = JSON.parse(data.catatan_persalinan.masase_cp);  
                    if (masase_cp.masase_cp_1 !== null) { $('#masase-cp-1').prop('checked', true) }
                    if (masase_cp.masase_cp_2 !== null) { $('#masase-cp-2').prop('checked', true) }
                    if (masase_cp.masase_cp_3 !== null) {$('#masase-cp-3').val(masase_cp.masase_cp_3);}

                    const lahi_cp = JSON.parse(data.catatan_persalinan.lahi_cp);  
                    if (lahi_cp.lahi_cp_1 !== null) { $('#lahi-cp-1').prop('checked', true) }
                    if (lahi_cp.lahi_cp_2 !== null) {$('#lahi-cp-2').val(lahi_cp.lahi_cp_2);}
                    if (lahi_cp.lahi_cp_3 !== null) {$('#lahi-cp-3').val(lahi_cp.lahi_cp_3);}

                    const senta_cp = JSON.parse(data.catatan_persalinan.senta_cp);  
                    if (senta_cp.senta_cp_1 !== null) { $('#senta-cp-1').prop('checked', true) }
                    if (senta_cp.senta_cp_2 !== null) { $('#senta-cp-2').prop('checked', true) }
                    if (senta_cp.senta_cp_3 !== null) {$('#senta-cp-3').val(senta_cp.senta_cp_3);}

                    const laser_cp = JSON.parse(data.catatan_persalinan.laser_cp);  
                    if (laser_cp.laser_cp_1 !== null) { $('#laser-cp-1').prop('checked', true) }
                    if (laser_cp.laser_cp_2 !== null) {$('#laser-cp-2').val(laser_cp.laser_cp_2);}
                    if (laser_cp.laser_cp_3 !== null) { $('#laser-cp-3').prop('checked', true) }

                    const jika_cp = JSON.parse(data.catatan_persalinan.jika_cp);  
                    if (jika_cp.jika_cp_1 !== null) { $('#jika-cp-1').prop('checked', true) }
                    if (jika_cp.jika_cp_2 !== null) { $('#jika-cp-2').prop('checked', true) }
                    if (jika_cp.jika_cp_3 !== null) { $('#jika-cp-3').prop('checked', true) }
                    if (jika_cp.jika_cp_4 !== null) { $('#jika-cp-4').prop('checked', true) }
                    if (jika_cp.jika_cp_5 !== null) { $('#jika-cp-5').prop('checked', true) }
                    if (jika_cp.jika_cp_6 !== null) { $('#jika-cp-6').prop('checked', true) }
                    if (jika_cp.jika_cp_7 !== null) {$('#jika-cp-7').val(jika_cp.jika_cp_7);}
                    if (jika_cp.jika_cp_8 !== null) { $('#jika-cp-8').prop('checked', true) }

                    const atoni_cp = JSON.parse(data.catatan_persalinan.atoni_cp);  
                    if (atoni_cp.atoni_cp_1 !== null) { $('#atoni-cp-1').prop('checked', true) }
                    if (atoni_cp.atoni_cp_2 !== null) {$('#atoni-cp-2').val(atoni_cp.atoni_cp_2);}
                    if (atoni_cp.atoni_cp_3 !== null) { $('#atoni-cp-3').prop('checked', true) }

                    $('#jum-cp').val(data.catatan_persalinan.jum_cp);
                    $('#penatalaksanaan-cp').val(data.catatan_persalinan.penatalaksanaan_cp);


                    $('#Masalah-cp').val(data.catatan_persalinan.Masalah_cp);
                    $('#bb-cp').val(data.catatan_persalinan.bb_cp);
                    $('#panjang-cp').val(data.catatan_persalinan.panjang_cp);

                    const jk_cp = JSON.parse(data.catatan_persalinan.jk_cp);  
                    if (jk_cp.jk_cp_1 !== null) { $('#jk-cp-1').prop('checked', true) }
                    if (jk_cp.jk_cp_2 !== null) { $('#jk-cp-2').prop('checked', true) }

                    const by_cp = JSON.parse(data.catatan_persalinan.by_cp);  
                    if (by_cp.by_cp_1 !== null) { $('#by-cp-1').prop('checked', true) }
                    if (by_cp.by_cp_2 !== null) { $('#by-cp-2').prop('checked', true) }


                    const by_cplh = JSON.parse(data.catatan_persalinan.by_cplh);  
                    if (by_cplh.by_cplh_1 !== null) { $('#by-cplh-1').prop('checked', true) }
                    if (by_cplh.by_cplh_2 !== null) { $('#by-cplh-2').prop('checked', true) }
                    if (by_cplh.by_cplh_3 !== null) { $('#by-cplh-3').prop('checked', true) }
                    if (by_cplh.by_cplh_4 !== null) { $('#by-cplh-4').prop('checked', true) }
                    if (by_cplh.by_cplh_5 !== null) { $('#by-cplh-5').prop('checked', true) }
                    if (by_cplh.by_cplh_6 !== null) { $('#by-cplh-6').prop('checked', true) }
                    if (by_cplh.by_cplh_7 !== null) { $('#by-cplh-7').prop('checked', true) }
                    if (by_cplh.by_cplh_8 !== null) {$('#by-cplh-8').val(by_cplh.by_cplh_8);}
                    if (by_cplh.by_cplh_9 !== null) { $('#by-cplh-9').prop('checked', true) }
                    if (by_cplh.by_cplh_10 !== null) {$('#by-cplh-10').val(by_cplh.by_cplh_10);}
                    if (by_cplh.by_cplh_11 !== null) {$('#by-cplh-11').val(by_cplh.by_cplh_11);}
                    if (by_cplh.by_cplh_12 !== null) {$('#by-cplh-12').val(by_cplh.by_cplh_12);}

                    const asi_cp = JSON.parse(data.catatan_persalinan.asi_cp);  
                    if (asi_cp.asi_cp_1 !== null) { $('#asi-cp-1').prop('checked', true) }
                    if (asi_cp.asi_cp_2 !== null) {$('#asi-cp-2').val(asi_cp.asi_cp_2);}
                    if (asi_cp.asi_cp_3 !== null) { $('#asi-cp-3').prop('checked', true) }
                    if (asi_cp.asi_cp_4 !== null) {$('#asi-cp-4').val(asi_cp.asi_cp_4);}


                    const sebutkan_cp = JSON.parse(data.catatan_persalinan.sebutkan_cp);  
                    if (sebutkan_cp.sebutkan_cp_1 !== null) {$('#sebutkan-cp-1').val(sebutkan_cp.sebutkan_cp_1);}
                    if (sebutkan_cp.sebutkan_cp_2 !== null) {$('#sebutkan-cp-2').val(sebutkan_cp.sebutkan_cp_2);}  
                    

                    // WARNA PUTIH ARSIR HITAM
                    const putih = JSON.parse(data.catatan_persalinan.putih);  
                    if (putih.putih_1 !== null) { $('#putih_1').prop('checked', true); changeColor('warna_1', 'putih_1');}
                    if (putih.putih_2 !== null) { $('#putih_2').prop('checked', true); changeColor('warna_2', 'putih_2');}
                    if (putih.putih_3 !== null) { $('#putih_3').prop('checked', true); changeColor('warna_3', 'putih_3');}
                    if (putih.putih_4 !== null) { $('#putih_4').prop('checked', true); changeColor('warna_4', 'putih_4');}
                    if (putih.putih_5 !== null) { $('#putih_5').prop('checked', true); changeColor('warna_5', 'putih_5');}
                    if (putih.putih_6 !== null) { $('#putih_6').prop('checked', true); changeColor('warna_6', 'putih_6');}
                    if (putih.putih_7 !== null) { $('#putih_7').prop('checked', true); changeColor('warna_7', 'putih_7');}
                    if (putih.putih_8 !== null) { $('#putih_8').prop('checked', true); changeColor('warna_8', 'putih_8');}
                    if (putih.putih_9 !== null) { $('#putih_9').prop('checked', true); changeColor('warna_9', 'putih_9');}
                    if (putih.putih_10 !== null) { $('#putih_10').prop('checked', true); changeColor('warna_10', 'putih_10');}
                    if (putih.putih_11 !== null) { $('#putih_11').prop('checked', true); changeColor('warna_11', 'putih_11');}
                    if (putih.putih_12 !== null) { $('#putih_12').prop('checked', true); changeColor('warna_12', 'putih_12');}
                    if (putih.putih_13 !== null) { $('#putih_13').prop('checked', true); changeColor('warna_13', 'putih_13');}
                    if (putih.putih_14 !== null) { $('#putih_14').prop('checked', true); changeColor('warna_14', 'putih_14');}
                    if (putih.putih_15 !== null) { $('#putih_15').prop('checked', true); changeColor('warna_15', 'putih_15');}
                    if (putih.putih_16 !== null) { $('#putih_16').prop('checked', true); changeColor('warna_16', 'putih_16');}
                    if (putih.putih_17 !== null) { $('#putih_17').prop('checked', true); changeColor('warna_17', 'putih_17');}
                    if (putih.putih_18 !== null) { $('#putih_18').prop('checked', true); changeColor('warna_18', 'putih_18');}
                    if (putih.putih_19 !== null) { $('#putih_19').prop('checked', true); changeColor('warna_19', 'putih_19');}
                    if (putih.putih_20 !== null) { $('#putih_20').prop('checked', true); changeColor('warna_20', 'putih_20');}
                    if (putih.putih_21 !== null) { $('#putih_21').prop('checked', true); changeColor('warna_21', 'putih_21');}
                    if (putih.putih_22 !== null) { $('#putih_22').prop('checked', true); changeColor('warna_22', 'putih_22');}
                    if (putih.putih_23 !== null) { $('#putih_23').prop('checked', true); changeColor('warna_23', 'putih_23');}
                    if (putih.putih_24 !== null) { $('#putih_24').prop('checked', true); changeColor('warna_24', 'putih_24');}
                    if (putih.putih_25 !== null) { $('#putih_25').prop('checked', true); changeColor('warna_25', 'putih_25');}
                    if (putih.putih_26 !== null) { $('#putih_26').prop('checked', true); changeColor('warna_26', 'putih_26');}
                    if (putih.putih_27 !== null) { $('#putih_27').prop('checked', true); changeColor('warna_27', 'putih_27');}
                    if (putih.putih_28 !== null) { $('#putih_28').prop('checked', true); changeColor('warna_28', 'putih_28');}
                    if (putih.putih_29 !== null) { $('#putih_29').prop('checked', true); changeColor('warna_29', 'putih_29');}
                    if (putih.putih_30 !== null) { $('#putih_30').prop('checked', true); changeColor('warna_30', 'putih_30');}
                    if (putih.putih_31 !== null) { $('#putih_31').prop('checked', true); changeColor('warna_31', 'putih_31');}
                    if (putih.putih_32 !== null) { $('#putih_32').prop('checked', true); changeColor('warna_32', 'putih_32');}
                    if (putih.putih_33 !== null) { $('#putih_33').prop('checked', true); changeColor('warna_33', 'putih_33');}
                    if (putih.putih_34 !== null) { $('#putih_34').prop('checked', true); changeColor('warna_34', 'putih_34');}
                    if (putih.putih_35 !== null) { $('#putih_35').prop('checked', true); changeColor('warna_35', 'putih_35');}
                    if (putih.putih_36 !== null) { $('#putih_36').prop('checked', true); changeColor('warna_36', 'putih_36');}
                    if (putih.putih_37 !== null) { $('#putih_37').prop('checked', true); changeColor('warna_37', 'putih_37');}
                    if (putih.putih_38 !== null) { $('#putih_38').prop('checked', true); changeColor('warna_38', 'putih_38');}
                    if (putih.putih_39 !== null) { $('#putih_39').prop('checked', true); changeColor('warna_39', 'putih_39');}
                    if (putih.putih_40 !== null) { $('#putih_40').prop('checked', true); changeColor('warna_40', 'putih_40');}
                    if (putih.putih_41 !== null) { $('#putih_41').prop('checked', true); changeColor('warna_41', 'putih_41');}
                    if (putih.putih_42 !== null) { $('#putih_42').prop('checked', true); changeColor('warna_42', 'putih_42');}
                    if (putih.putih_43 !== null) { $('#putih_43').prop('checked', true); changeColor('warna_43', 'putih_43');}
                    if (putih.putih_44 !== null) { $('#putih_44').prop('checked', true); changeColor('warna_44', 'putih_44');}
                    if (putih.putih_45 !== null) { $('#putih_45').prop('checked', true); changeColor('warna_45', 'putih_45');}
                    if (putih.putih_46 !== null) { $('#putih_46').prop('checked', true); changeColor('warna_46', 'putih_46');}
                    if (putih.putih_47 !== null) { $('#putih_47').prop('checked', true); changeColor('warna_47', 'putih_47');}
                    if (putih.putih_48 !== null) { $('#putih_48').prop('checked', true); changeColor('warna_48', 'putih_48');}
                    if (putih.putih_49 !== null) { $('#putih_49').prop('checked', true); changeColor('warna_49', 'putih_49');}
                    if (putih.putih_50 !== null) { $('#putih_50').prop('checked', true); changeColor('warna_50', 'putih_50');}
                    if (putih.putih_51 !== null) { $('#putih_51').prop('checked', true); changeColor('warna_51', 'putih_51');}
                    if (putih.putih_52 !== null) { $('#putih_52').prop('checked', true); changeColor('warna_52', 'putih_52');}
                    if (putih.putih_53 !== null) { $('#putih_53').prop('checked', true); changeColor('warna_53', 'putih_53');}
                    if (putih.putih_54 !== null) { $('#putih_54').prop('checked', true); changeColor('warna_54', 'putih_54');}
                    if (putih.putih_55 !== null) { $('#putih_55').prop('checked', true); changeColor('warna_55', 'putih_55');}
                    if (putih.putih_56 !== null) { $('#putih_56').prop('checked', true); changeColor('warna_56', 'putih_56');}
                    if (putih.putih_57 !== null) { $('#putih_57').prop('checked', true); changeColor('warna_57', 'putih_57');}
                    if (putih.putih_58 !== null) { $('#putih_58').prop('checked', true); changeColor('warna_58', 'putih_58');}
                    if (putih.putih_59 !== null) { $('#putih_59').prop('checked', true); changeColor('warna_59', 'putih_59');}
                    if (putih.putih_60 !== null) { $('#putih_60').prop('checked', true); changeColor('warna_60', 'putih_60');}
                    if (putih.putih_61 !== null) { $('#putih_61').prop('checked', true); changeColor('warna_61', 'putih_61');}
                    if (putih.putih_62 !== null) { $('#putih_62').prop('checked', true); changeColor('warna_62', 'putih_62');}
                    if (putih.putih_63 !== null) { $('#putih_63').prop('checked', true); changeColor('warna_63', 'putih_63');}
                    if (putih.putih_64 !== null) { $('#putih_64').prop('checked', true); changeColor('warna_64', 'putih_64');}
                    if (putih.putih_65 !== null) { $('#putih_65').prop('checked', true); changeColor('warna_65', 'putih_65');}
                    if (putih.putih_66 !== null) { $('#putih_66').prop('checked', true); changeColor('warna_66', 'putih_66');}
                    if (putih.putih_67 !== null) { $('#putih_67').prop('checked', true); changeColor('warna_67', 'putih_67');}
                    if (putih.putih_68 !== null) { $('#putih_68').prop('checked', true); changeColor('warna_68', 'putih_68');}
                    if (putih.putih_69 !== null) { $('#putih_69').prop('checked', true); changeColor('warna_69', 'putih_69');}
                    if (putih.putih_70 !== null) { $('#putih_70').prop('checked', true); changeColor('warna_70', 'putih_70');}
                    if (putih.putih_71 !== null) { $('#putih_71').prop('checked', true); changeColor('warna_71', 'putih_71');}
                    if (putih.putih_72 !== null) { $('#putih_72').prop('checked', true); changeColor('warna_72', 'putih_72');}
                    if (putih.putih_73 !== null) { $('#putih_73').prop('checked', true); changeColor('warna_73', 'putih_73');}
                    if (putih.putih_74 !== null) { $('#putih_74').prop('checked', true); changeColor('warna_74', 'putih_74');}
                    if (putih.putih_75 !== null) { $('#putih_75').prop('checked', true); changeColor('warna_75', 'putih_75');}
                    if (putih.putih_76 !== null) { $('#putih_76').prop('checked', true); changeColor('warna_76', 'putih_76');}
                    if (putih.putih_77 !== null) { $('#putih_77').prop('checked', true); changeColor('warna_77', 'putih_77');}
                    if (putih.putih_78 !== null) { $('#putih_78').prop('checked', true); changeColor('warna_78', 'putih_78');}
                    if (putih.putih_79 !== null) { $('#putih_79').prop('checked', true); changeColor('warna_79', 'putih_79');}
                    if (putih.putih_80 !== null) { $('#putih_80').prop('checked', true); changeColor('warna_80', 'putih_80');}
                    if (putih.putih_81 !== null) { $('#putih_81').prop('checked', true); changeColor('warna_81', 'putih_81');}
                    if (putih.putih_82 !== null) { $('#putih_82').prop('checked', true); changeColor('warna_82', 'putih_82');}
                    if (putih.putih_83 !== null) { $('#putih_83').prop('checked', true); changeColor('warna_83', 'putih_83');}
                    if (putih.putih_84 !== null) { $('#putih_84').prop('checked', true); changeColor('warna_84', 'putih_84');}
                    if (putih.putih_85 !== null) { $('#putih_85').prop('checked', true); changeColor('warna_85', 'putih_85');}

                    if (putih.putih_86 !== null) { $('#putih_86').prop('checked', true); changeColor('warna_86', 'putih_86');}
                    if (putih.putih_87 !== null) { $('#putih_87').prop('checked', true); changeColor('warna_87', 'putih_87');}
                    if (putih.putih_88 !== null) { $('#putih_88').prop('checked', true); changeColor('warna_88', 'putih_88');}
                    if (putih.putih_89 !== null) { $('#putih_89').prop('checked', true); changeColor('warna_89', 'putih_89');}
                    if (putih.putih_90 !== null) { $('#putih_90').prop('checked', true); changeColor('warna_90', 'putih_90');}
                    if (putih.putih_91 !== null) { $('#putih_91').prop('checked', true); changeColor('warna_91', 'putih_91');}
                    if (putih.putih_92 !== null) { $('#putih_92').prop('checked', true); changeColor('warna_92', 'putih_92');}
                    if (putih.putih_93 !== null) { $('#putih_93').prop('checked', true); changeColor('warna_93', 'putih_93');}
                    if (putih.putih_94 !== null) { $('#putih_94').prop('checked', true); changeColor('warna_94', 'putih_94');}
                    if (putih.putih_95 !== null) { $('#putih_95').prop('checked', true); changeColor('warna_95', 'putih_95');}
                    if (putih.putih_96 !== null) { $('#putih_96').prop('checked', true); changeColor('warna_96', 'putih_96');}
                    if (putih.putih_97 !== null) { $('#putih_97').prop('checked', true); changeColor('warna_97', 'putih_97');}
                    if (putih.putih_98 !== null) { $('#putih_98').prop('checked', true); changeColor('warna_98', 'putih_98');}
                    if (putih.putih_99 !== null) { $('#putih_99').prop('checked', true); changeColor('warna_99', 'putih_99');}
                    if (putih.putih_100 !== null) { $('#putih_100').prop('checked', true); changeColor('warna_100', 'putih_100');}
                    if (putih.putih_101 !== null) { $('#putih_101').prop('checked', true); changeColor('warna_101', 'putih_101');}
                    if (putih.putih_102 !== null) { $('#putih_102').prop('checked', true); changeColor('warna_102', 'putih_102');}
                    if (putih.putih_103 !== null) { $('#putih_103').prop('checked', true); changeColor('warna_103', 'putih_103');}
                    if (putih.putih_104 !== null) { $('#putih_104').prop('checked', true); changeColor('warna_104', 'putih_104');}
                    if (putih.putih_105 !== null) { $('#putih_105').prop('checked', true); changeColor('warna_105', 'putih_105');}
                    if (putih.putih_106 !== null) { $('#putih_106').prop('checked', true); changeColor('warna_106', 'putih_106');}
                    if (putih.putih_107 !== null) { $('#putih_107').prop('checked', true); changeColor('warna_107', 'putih_107');}
                    if (putih.putih_108 !== null) { $('#putih_108').prop('checked', true); changeColor('warna_108', 'putih_108');}
                    if (putih.putih_109 !== null) { $('#putih_109').prop('checked', true); changeColor('warna_109', 'putih_109');}
                    if (putih.putih_110 !== null) { $('#putih_110').prop('checked', true); changeColor('warna_110', 'putih_110');}
                    if (putih.putih_111 !== null) { $('#putih_111').prop('checked', true); changeColor('warna_111', 'putih_111');}
                    if (putih.putih_112 !== null) { $('#putih_112').prop('checked', true); changeColor('warna_112', 'putih_112');}
                    if (putih.putih_113 !== null) { $('#putih_113').prop('checked', true); changeColor('warna_113', 'putih_113');}
                    if (putih.putih_114 !== null) { $('#putih_114').prop('checked', true); changeColor('warna_114', 'putih_114');}
                    if (putih.putih_115 !== null) { $('#putih_115').prop('checked', true); changeColor('warna_115', 'putih_115');}
                    if (putih.putih_116 !== null) { $('#putih_116').prop('checked', true); changeColor('warna_116', 'putih_116');}
                    if (putih.putih_117 !== null) { $('#putih_117').prop('checked', true); changeColor('warna_117', 'putih_117');}
                    if (putih.putih_118 !== null) { $('#putih_118').prop('checked', true); changeColor('warna_118', 'putih_118');}
                    if (putih.putih_119 !== null) { $('#putih_119').prop('checked', true); changeColor('warna_119', 'putih_119');}
                    if (putih.putih_120 !== null) { $('#putih_120').prop('checked', true); changeColor('warna_120', 'putih_120');}
                    if (putih.putih_121 !== null) { $('#putih_121').prop('checked', true); changeColor('warna_121', 'putih_121');}
                    if (putih.putih_122 !== null) { $('#putih_122').prop('checked', true); changeColor('warna_122', 'putih_122');}
                    if (putih.putih_123 !== null) { $('#putih_123').prop('checked', true); changeColor('warna_123', 'putih_123');}
                    if (putih.putih_124 !== null) { $('#putih_124').prop('checked', true); changeColor('warna_124', 'putih_124');}
                    if (putih.putih_125 !== null) { $('#putih_125').prop('checked', true); changeColor('warna_125', 'putih_125');}
                    if (putih.putih_126 !== null) { $('#putih_126').prop('checked', true); changeColor('warna_126', 'putih_126');}
                    if (putih.putih_127 !== null) { $('#putih_127').prop('checked', true); changeColor('warna_127', 'putih_127');}
                    if (putih.putih_128 !== null) { $('#putih_128').prop('checked', true); changeColor('warna_128', 'putih_128');}
                    if (putih.putih_129 !== null) { $('#putih_129').prop('checked', true); changeColor('warna_129', 'putih_129');}
                    if (putih.putih_130 !== null) { $('#putih_130').prop('checked', true); changeColor('warna_130', 'putih_130');}
                    if (putih.putih_131 !== null) { $('#putih_131').prop('checked', true); changeColor('warna_131', 'putih_131');}
                    if (putih.putih_132 !== null) { $('#putih_132').prop('checked', true); changeColor('warna_132', 'putih_132');}
                    if (putih.putih_133 !== null) { $('#putih_133').prop('checked', true); changeColor('warna_133', 'putih_133');}
                    if (putih.putih_134 !== null) { $('#putih_134').prop('checked', true); changeColor('warna_134', 'putih_134');}
                    if (putih.putih_135 !== null) { $('#putih_135').prop('checked', true); changeColor('warna_135', 'putih_135');}
                    if (putih.putih_136 !== null) { $('#putih_136').prop('checked', true); changeColor('warna_136', 'putih_136');}
                    if (putih.putih_137 !== null) { $('#putih_137').prop('checked', true); changeColor('warna_137', 'putih_137');}
                    if (putih.putih_138 !== null) { $('#putih_138').prop('checked', true); changeColor('warna_138', 'putih_138');}
                    if (putih.putih_139 !== null) { $('#putih_139').prop('checked', true); changeColor('warna_139', 'putih_139');}
                    if (putih.putih_140 !== null) { $('#putih_140').prop('checked', true); changeColor('warna_140', 'putih_140');}
                    if (putih.putih_141 !== null) { $('#putih_141').prop('checked', true); changeColor('warna_141', 'putih_141');}
                    if (putih.putih_142 !== null) { $('#putih_142').prop('checked', true); changeColor('warna_142', 'putih_142');}
                    if (putih.putih_143 !== null) { $('#putih_143').prop('checked', true); changeColor('warna_143', 'putih_143');}
                    if (putih.putih_144 !== null) { $('#putih_144').prop('checked', true); changeColor('warna_144', 'putih_144');}
                    if (putih.putih_145 !== null) { $('#putih_145').prop('checked', true); changeColor('warna_145', 'putih_145');}
                    if (putih.putih_146 !== null) { $('#putih_146').prop('checked', true); changeColor('warna_146', 'putih_146');}
                    if (putih.putih_147 !== null) { $('#putih_147').prop('checked', true); changeColor('warna_147', 'putih_147');}
                    if (putih.putih_148 !== null) { $('#putih_148').prop('checked', true); changeColor('warna_148', 'putih_148');}
                    if (putih.putih_149 !== null) { $('#putih_149').prop('checked', true); changeColor('warna_149', 'putih_149');}
                    if (putih.putih_150 !== null) { $('#putih_150').prop('checked', true); changeColor('warna_150', 'putih_150');}
                    if (putih.putih_151 !== null) { $('#putih_151').prop('checked', true); changeColor('warna_151', 'putih_151');}
                    if (putih.putih_152 !== null) { $('#putih_152').prop('checked', true); changeColor('warna_152', 'putih_152');}
                    if (putih.putih_153 !== null) { $('#putih_153').prop('checked', true); changeColor('warna_153', 'putih_153');}
                    if (putih.putih_154 !== null) { $('#putih_154').prop('checked', true); changeColor('warna_154', 'putih_154');}
                    if (putih.putih_155 !== null) { $('#putih_155').prop('checked', true); changeColor('warna_155', 'putih_155');}
                    if (putih.putih_156 !== null) { $('#putih_156').prop('checked', true); changeColor('warna_156', 'putih_156');}
                    if (putih.putih_157 !== null) { $('#putih_157').prop('checked', true); changeColor('warna_157', 'putih_157');}
                    if (putih.putih_158 !== null) { $('#putih_158').prop('checked', true); changeColor('warna_158', 'putih_158');}
                    if (putih.putih_159 !== null) { $('#putih_159').prop('checked', true); changeColor('warna_159', 'putih_159');}
                    if (putih.putih_160 !== null) { $('#putih_160').prop('checked', true); changeColor('warna_160', 'putih_160');}




                    // warna arsisran
                    const abu = JSON.parse(data.catatan_persalinan.abu);  
                    if (abu.abu_1 !== null) { $('#abu_1').prop('checked', true); changeColor('warna_1', 'abu_1');}
                    if (abu.abu_2 !== null) { $('#abu_2').prop('checked', true); changeColor('warna_2', 'abu_2');}
                    if (abu.abu_3 !== null) { $('#abu_3').prop('checked', true); changeColor('warna_3', 'abu_3');}
                    if (abu.abu_4 !== null) { $('#abu_4').prop('checked', true); changeColor('warna_4', 'abu_4');}
                    if (abu.abu_5 !== null) { $('#abu_5').prop('checked', true); changeColor('warna_5', 'abu_5');}
                    if (abu.abu_6 !== null) { $('#abu_6').prop('checked', true); changeColor('warna_6', 'abu_6');}
                    if (abu.abu_7 !== null) { $('#abu_7').prop('checked', true); changeColor('warna_7', 'abu_7');}
                    if (abu.abu_8 !== null) { $('#abu_8').prop('checked', true); changeColor('warna_8', 'abu_8');}
                    if (abu.abu_9 !== null) { $('#abu_9').prop('checked', true); changeColor('warna_9', 'abu_9');}
                    if (abu.abu_10 !== null) { $('#abu_10').prop('checked', true); changeColor('warna_10', 'abu_10');}
                    if (abu.abu_11 !== null) { $('#abu_11').prop('checked', true); changeColor('warna_11', 'abu_11');}
                    if (abu.abu_12 !== null) { $('#abu_12').prop('checked', true); changeColor('warna_12', 'abu_12');}
                    if (abu.abu_13 !== null) { $('#abu_13').prop('checked', true); changeColor('warna_13', 'abu_13');}
                    if (abu.abu_14 !== null) { $('#abu_14').prop('checked', true); changeColor('warna_14', 'abu_14');}
                    if (abu.abu_15 !== null) { $('#abu_15').prop('checked', true); changeColor('warna_15', 'abu_15');}
                    if (abu.abu_16 !== null) { $('#abu_16').prop('checked', true); changeColor('warna_16', 'abu_16');}
                    if (abu.abu_17 !== null) { $('#abu_17').prop('checked', true); changeColor('warna_17', 'abu_17');}
                    if (abu.abu_18 !== null) { $('#abu_18').prop('checked', true); changeColor('warna_18', 'abu_18');}
                    if (abu.abu_19 !== null) { $('#abu_19').prop('checked', true); changeColor('warna_19', 'abu_19');}
                    if (abu.abu_20 !== null) { $('#abu_20').prop('checked', true); changeColor('warna_20', 'abu_20');}
                    if (abu.abu_21 !== null) { $('#abu_21').prop('checked', true); changeColor('warna_21', 'abu_21');}
                    if (abu.abu_22 !== null) { $('#abu_22').prop('checked', true); changeColor('warna_22', 'abu_22');}
                    if (abu.abu_23 !== null) { $('#abu_23').prop('checked', true); changeColor('warna_23', 'abu_23');}
                    if (abu.abu_24 !== null) { $('#abu_24').prop('checked', true); changeColor('warna_24', 'abu_24');}
                    if (abu.abu_25 !== null) { $('#abu_25').prop('checked', true); changeColor('warna_25', 'abu_25');}
                    if (abu.abu_26 !== null) { $('#abu_26').prop('checked', true); changeColor('warna_26', 'abu_26');}
                    if (abu.abu_27 !== null) { $('#abu_27').prop('checked', true); changeColor('warna_27', 'abu_27');}
                    if (abu.abu_28 !== null) { $('#abu_28').prop('checked', true); changeColor('warna_28', 'abu_28');}
                    if (abu.abu_29 !== null) { $('#abu_29').prop('checked', true); changeColor('warna_29', 'abu_29');}
                    if (abu.abu_30 !== null) { $('#abu_30').prop('checked', true); changeColor('warna_30', 'abu_30');}
                    if (abu.abu_31 !== null) { $('#abu_31').prop('checked', true); changeColor('warna_31', 'abu_31');}
                    if (abu.abu_32 !== null) { $('#abu_32').prop('checked', true); changeColor('warna_32', 'abu_32');}
                    if (abu.abu_33 !== null) { $('#abu_33').prop('checked', true); changeColor('warna_33', 'abu_33');}
                    if (abu.abu_34 !== null) { $('#abu_34').prop('checked', true); changeColor('warna_34', 'abu_34');}
                    if (abu.abu_35 !== null) { $('#abu_35').prop('checked', true); changeColor('warna_35', 'abu_35');}
                    if (abu.abu_36 !== null) { $('#abu_36').prop('checked', true); changeColor('warna_36', 'abu_36');}
                    if (abu.abu_37 !== null) { $('#abu_37').prop('checked', true); changeColor('warna_37', 'abu_37');}
                    if (abu.abu_38 !== null) { $('#abu_38').prop('checked', true); changeColor('warna_38', 'abu_38');}
                    if (abu.abu_39 !== null) { $('#abu_39').prop('checked', true); changeColor('warna_39', 'abu_39');}
                    if (abu.abu_40 !== null) { $('#abu_40').prop('checked', true); changeColor('warna_40', 'abu_40');}
                    if (abu.abu_41 !== null) { $('#abu_41').prop('checked', true); changeColor('warna_41', 'abu_41');}
                    if (abu.abu_42 !== null) { $('#abu_42').prop('checked', true); changeColor('warna_42', 'abu_42');}
                    if (abu.abu_43 !== null) { $('#abu_43').prop('checked', true); changeColor('warna_43', 'abu_43');}
                    if (abu.abu_44 !== null) { $('#abu_44').prop('checked', true); changeColor('warna_44', 'abu_44');}
                    if (abu.abu_45 !== null) { $('#abu_45').prop('checked', true); changeColor('warna_45', 'abu_45');}
                    if (abu.abu_46 !== null) { $('#abu_46').prop('checked', true); changeColor('warna_46', 'abu_46');}
                    if (abu.abu_47 !== null) { $('#abu_47').prop('checked', true); changeColor('warna_47', 'abu_47');}
                    if (abu.abu_48 !== null) { $('#abu_48').prop('checked', true); changeColor('warna_48', 'abu_48');}
                    if (abu.abu_49 !== null) { $('#abu_49').prop('checked', true); changeColor('warna_49', 'abu_49');}
                    if (abu.abu_50 !== null) { $('#abu_50').prop('checked', true); changeColor('warna_50', 'abu_50');}
                    if (abu.abu_51 !== null) { $('#abu_51').prop('checked', true); changeColor('warna_51', 'abu_51');}
                    if (abu.abu_52 !== null) { $('#abu_52').prop('checked', true); changeColor('warna_52', 'abu_52');}
                    if (abu.abu_53 !== null) { $('#abu_53').prop('checked', true); changeColor('warna_53', 'abu_53');}
                    if (abu.abu_54 !== null) { $('#abu_54').prop('checked', true); changeColor('warna_54', 'abu_54');}
                    if (abu.abu_55 !== null) { $('#abu_55').prop('checked', true); changeColor('warna_55', 'abu_55');}
                    if (abu.abu_56 !== null) { $('#abu_56').prop('checked', true); changeColor('warna_56', 'abu_56');}
                    if (abu.abu_57 !== null) { $('#abu_57').prop('checked', true); changeColor('warna_57', 'abu_57');}
                    if (abu.abu_58 !== null) { $('#abu_58').prop('checked', true); changeColor('warna_58', 'abu_58');}
                    if (abu.abu_59 !== null) { $('#abu_59').prop('checked', true); changeColor('warna_59', 'abu_59');}
                    if (abu.abu_60 !== null) { $('#abu_60').prop('checked', true); changeColor('warna_60', 'abu_60');}
                    if (abu.abu_61 !== null) { $('#abu_61').prop('checked', true); changeColor('warna_61', 'abu_61');}
                    if (abu.abu_62 !== null) { $('#abu_62').prop('checked', true); changeColor('warna_62', 'abu_62');}
                    if (abu.abu_63 !== null) { $('#abu_63').prop('checked', true); changeColor('warna_63', 'abu_63');}
                    if (abu.abu_64 !== null) { $('#abu_64').prop('checked', true); changeColor('warna_64', 'abu_64');}
                    if (abu.abu_65 !== null) { $('#abu_65').prop('checked', true); changeColor('warna_65', 'abu_65');}
                    if (abu.abu_66 !== null) { $('#abu_66').prop('checked', true); changeColor('warna_66', 'abu_66');}
                    if (abu.abu_67 !== null) { $('#abu_67').prop('checked', true); changeColor('warna_67', 'abu_67');}
                    if (abu.abu_68 !== null) { $('#abu_68').prop('checked', true); changeColor('warna_68', 'abu_68');}
                    if (abu.abu_69 !== null) { $('#abu_69').prop('checked', true); changeColor('warna_69', 'abu_69');}
                    if (abu.abu_70 !== null) { $('#abu_70').prop('checked', true); changeColor('warna_70', 'abu_70');}
                    if (abu.abu_71 !== null) { $('#abu_71').prop('checked', true); changeColor('warna_71', 'abu_71');}
                    if (abu.abu_72 !== null) { $('#abu_72').prop('checked', true); changeColor('warna_72', 'abu_72');}
                    if (abu.abu_73 !== null) { $('#abu_73').prop('checked', true); changeColor('warna_73', 'abu_73');}
                    if (abu.abu_74 !== null) { $('#abu_74').prop('checked', true); changeColor('warna_74', 'abu_74');}
                    if (abu.abu_75 !== null) { $('#abu_75').prop('checked', true); changeColor('warna_75', 'abu_75');}
                    if (abu.abu_76 !== null) { $('#abu_76').prop('checked', true); changeColor('warna_76', 'abu_76');}
                    if (abu.abu_77 !== null) { $('#abu_77').prop('checked', true); changeColor('warna_77', 'abu_77');}
                    if (abu.abu_78 !== null) { $('#abu_78').prop('checked', true); changeColor('warna_78', 'abu_78');}
                    if (abu.abu_79 !== null) { $('#abu_79').prop('checked', true); changeColor('warna_79', 'abu_79');}
                    if (abu.abu_80 !== null) { $('#abu_80').prop('checked', true); changeColor('warna_80', 'abu_80');}
                    if (abu.abu_81 !== null) { $('#abu_81').prop('checked', true); changeColor('warna_81', 'abu_81');}
                    if (abu.abu_82 !== null) { $('#abu_82').prop('checked', true); changeColor('warna_82', 'abu_82');}
                    if (abu.abu_83 !== null) { $('#abu_83').prop('checked', true); changeColor('warna_83', 'abu_83');}
                    if (abu.abu_84 !== null) { $('#abu_84').prop('checked', true); changeColor('warna_84', 'abu_84');}
                    if (abu.abu_85 !== null) { $('#abu_85').prop('checked', true); changeColor('warna_85', 'abu_85');}
                    if (abu.abu_86 !== null) { $('#abu_86').prop('checked', true); changeColor('warna_86', 'abu_86');}
                    if (abu.abu_87 !== null) { $('#abu_87').prop('checked', true); changeColor('warna_87', 'abu_87');}
                    if (abu.abu_88 !== null) { $('#abu_88').prop('checked', true); changeColor('warna_88', 'abu_88');}
                    if (abu.abu_89 !== null) { $('#abu_89').prop('checked', true); changeColor('warna_89', 'abu_89');}
                    if (abu.abu_90 !== null) { $('#abu_90').prop('checked', true); changeColor('warna_90', 'abu_90');}
                    if (abu.abu_91 !== null) { $('#abu_91').prop('checked', true); changeColor('warna_91', 'abu_91');}
                    if (abu.abu_92 !== null) { $('#abu_92').prop('checked', true); changeColor('warna_92', 'abu_92');}
                    if (abu.abu_93 !== null) { $('#abu_93').prop('checked', true); changeColor('warna_93', 'abu_93');}
                    if (abu.abu_94 !== null) { $('#abu_94').prop('checked', true); changeColor('warna_94', 'abu_94');}
                    if (abu.abu_95 !== null) { $('#abu_95').prop('checked', true); changeColor('warna_95', 'abu_95');}
                    if (abu.abu_96 !== null) { $('#abu_96').prop('checked', true); changeColor('warna_96', 'abu_96');}
                    if (abu.abu_97 !== null) { $('#abu_97').prop('checked', true); changeColor('warna_97', 'abu_97');}
                    if (abu.abu_98 !== null) { $('#abu_98').prop('checked', true); changeColor('warna_98', 'abu_98');}
                    if (abu.abu_99 !== null) { $('#abu_99').prop('checked', true); changeColor('warna_99', 'abu_99');}
                    if (abu.abu_100 !== null) { $('#abu_100').prop('checked', true); changeColor('warna_100', 'abu_100');}
                    if (abu.abu_101 !== null) { $('#abu_101').prop('checked', true); changeColor('warna_101', 'abu_101');}
                    if (abu.abu_102 !== null) { $('#abu_102').prop('checked', true); changeColor('warna_102', 'abu_102');}
                    if (abu.abu_103 !== null) { $('#abu_103').prop('checked', true); changeColor('warna_103', 'abu_103');}
                    if (abu.abu_104 !== null) { $('#abu_104').prop('checked', true); changeColor('warna_104', 'abu_104');}
                    if (abu.abu_105 !== null) { $('#abu_105').prop('checked', true); changeColor('warna_105', 'abu_105');}
                    if (abu.abu_106 !== null) { $('#abu_106').prop('checked', true); changeColor('warna_106', 'abu_106');}
                    if (abu.abu_107 !== null) { $('#abu_107').prop('checked', true); changeColor('warna_107', 'abu_107');}
                    if (abu.abu_108 !== null) { $('#abu_108').prop('checked', true); changeColor('warna_108', 'abu_108');}
                    if (abu.abu_109 !== null) { $('#abu_109').prop('checked', true); changeColor('warna_109', 'abu_109');}
                    if (abu.abu_110 !== null) { $('#abu_110').prop('checked', true); changeColor('warna_110', 'abu_110');}
                    if (abu.abu_111 !== null) { $('#abu_111').prop('checked', true); changeColor('warna_111', 'abu_111');}
                    if (abu.abu_112 !== null) { $('#abu_112').prop('checked', true); changeColor('warna_112', 'abu_112');}
                    if (abu.abu_113 !== null) { $('#abu_113').prop('checked', true); changeColor('warna_113', 'abu_113');}
                    if (abu.abu_114 !== null) { $('#abu_114').prop('checked', true); changeColor('warna_114', 'abu_114');}
                    if (abu.abu_115 !== null) { $('#abu_115').prop('checked', true); changeColor('warna_115', 'abu_115');}
                    if (abu.abu_116 !== null) { $('#abu_116').prop('checked', true); changeColor('warna_116', 'abu_116');}
                    if (abu.abu_117 !== null) { $('#abu_117').prop('checked', true); changeColor('warna_117', 'abu_117');}
                    if (abu.abu_118 !== null) { $('#abu_118').prop('checked', true); changeColor('warna_118', 'abu_118');}
                    if (abu.abu_119 !== null) { $('#abu_119').prop('checked', true); changeColor('warna_119', 'abu_119');}
                    if (abu.abu_120 !== null) { $('#abu_120').prop('checked', true); changeColor('warna_120', 'abu_120');}
                    if (abu.abu_121 !== null) { $('#abu_121').prop('checked', true); changeColor('warna_121', 'abu_121');}
                    if (abu.abu_122 !== null) { $('#abu_122').prop('checked', true); changeColor('warna_122', 'abu_122');}
                    if (abu.abu_123 !== null) { $('#abu_123').prop('checked', true); changeColor('warna_123', 'abu_123');}
                    if (abu.abu_124 !== null) { $('#abu_124').prop('checked', true); changeColor('warna_124', 'abu_124');}
                    if (abu.abu_125 !== null) { $('#abu_125').prop('checked', true); changeColor('warna_125', 'abu_125');}
                    if (abu.abu_126 !== null) { $('#abu_126').prop('checked', true); changeColor('warna_126', 'abu_126');}
                    if (abu.abu_127 !== null) { $('#abu_127').prop('checked', true); changeColor('warna_127', 'abu_127');}
                    if (abu.abu_128 !== null) { $('#abu_128').prop('checked', true); changeColor('warna_128', 'abu_128');}
                    if (abu.abu_129 !== null) { $('#abu_129').prop('checked', true); changeColor('warna_129', 'abu_129');}
                    if (abu.abu_130 !== null) { $('#abu_130').prop('checked', true); changeColor('warna_130', 'abu_130');}
                    if (abu.abu_131 !== null) { $('#abu_131').prop('checked', true); changeColor('warna_131', 'abu_131');}
                    if (abu.abu_132 !== null) { $('#abu_132').prop('checked', true); changeColor('warna_132', 'abu_132');}
                    if (abu.abu_133 !== null) { $('#abu_133').prop('checked', true); changeColor('warna_133', 'abu_133');}
                    if (abu.abu_134 !== null) { $('#abu_134').prop('checked', true); changeColor('warna_134', 'abu_134');}
                    if (abu.abu_135 !== null) { $('#abu_135').prop('checked', true); changeColor('warna_135', 'abu_135');}
                    if (abu.abu_136 !== null) { $('#abu_136').prop('checked', true); changeColor('warna_136', 'abu_136');}
                    if (abu.abu_137 !== null) { $('#abu_137').prop('checked', true); changeColor('warna_137', 'abu_137');}
                    if (abu.abu_138 !== null) { $('#abu_138').prop('checked', true); changeColor('warna_138', 'abu_138');}
                    if (abu.abu_139 !== null) { $('#abu_139').prop('checked', true); changeColor('warna_139', 'abu_139');}
                    if (abu.abu_140 !== null) { $('#abu_140').prop('checked', true); changeColor('warna_140', 'abu_140');}
                    if (abu.abu_141 !== null) { $('#abu_141').prop('checked', true); changeColor('warna_141', 'abu_141');}
                    if (abu.abu_142 !== null) { $('#abu_142').prop('checked', true); changeColor('warna_142', 'abu_142');}
                    if (abu.abu_143 !== null) { $('#abu_143').prop('checked', true); changeColor('warna_143', 'abu_143');}
                    if (abu.abu_144 !== null) { $('#abu_144').prop('checked', true); changeColor('warna_144', 'abu_144');}
                    if (abu.abu_145 !== null) { $('#abu_145').prop('checked', true); changeColor('warna_145', 'abu_145');}
                    if (abu.abu_146 !== null) { $('#abu_146').prop('checked', true); changeColor('warna_146', 'abu_146');}
                    if (abu.abu_147 !== null) { $('#abu_147').prop('checked', true); changeColor('warna_147', 'abu_147');}
                    if (abu.abu_148 !== null) { $('#abu_148').prop('checked', true); changeColor('warna_148', 'abu_148');}
                    if (abu.abu_149 !== null) { $('#abu_149').prop('checked', true); changeColor('warna_149', 'abu_149');}
                    if (abu.abu_150 !== null) { $('#abu_150').prop('checked', true); changeColor('warna_150', 'abu_150');}
                    if (abu.abu_151 !== null) { $('#abu_151').prop('checked', true); changeColor('warna_151', 'abu_151');}
                    if (abu.abu_152 !== null) { $('#abu_152').prop('checked', true); changeColor('warna_152', 'abu_152');}
                    if (abu.abu_153 !== null) { $('#abu_153').prop('checked', true); changeColor('warna_153', 'abu_153');}
                    if (abu.abu_154 !== null) { $('#abu_154').prop('checked', true); changeColor('warna_154', 'abu_154');}
                    if (abu.abu_155 !== null) { $('#abu_155').prop('checked', true); changeColor('warna_155', 'abu_155');}
                    if (abu.abu_156 !== null) { $('#abu_156').prop('checked', true); changeColor('warna_156', 'abu_156');}
                    if (abu.abu_157 !== null) { $('#abu_157').prop('checked', true); changeColor('warna_157', 'abu_157');}
                    if (abu.abu_158 !== null) { $('#abu_158').prop('checked', true); changeColor('warna_158', 'abu_158');}
                    if (abu.abu_159 !== null) { $('#abu_159').prop('checked', true); changeColor('warna_159', 'abu_159');}
                    if (abu.abu_160 !== null) { $('#abu_160').prop('checked', true); changeColor('warna_160', 'abu_160');}


    
                    // warna hitam
                    const hitam = JSON.parse(data.catatan_persalinan.hitam);
                    if (hitam.hitam_1 !== null) { $('#hitam_1').prop('checked', true); changeColor('warna_1', 'hitam_1');}
                    if (hitam.hitam_2 !== null) { $('#hitam_2').prop('checked', true); changeColor('warna_2', 'hitam_2');}
                    if (hitam.hitam_3 !== null) { $('#hitam_3').prop('checked', true); changeColor('warna_3', 'hitam_3');}
                    if (hitam.hitam_4 !== null) { $('#hitam_4').prop('checked', true); changeColor('warna_4', 'hitam_4');}
                    if (hitam.hitam_5 !== null) { $('#hitam_5').prop('checked', true); changeColor('warna_5', 'hitam_5');}
                    if (hitam.hitam_6 !== null) { $('#hitam_6').prop('checked', true); changeColor('warna_6', 'hitam_6');}
                    if (hitam.hitam_7 !== null) { $('#hitam_7').prop('checked', true); changeColor('warna_7', 'hitam_7');}
                    if (hitam.hitam_8 !== null) { $('#hitam_8').prop('checked', true); changeColor('warna_8', 'hitam_8');}
                    if (hitam.hitam_9 !== null) { $('#hitam_9').prop('checked', true); changeColor('warna_9', 'hitam_9');}
                    if (hitam.hitam_10 !== null) { $('#hitam_10').prop('checked', true); changeColor('warna_10', 'hitam_10');}
                    if (hitam.hitam_11 !== null) { $('#hitam_11').prop('checked', true); changeColor('warna_11', 'hitam_11');}
                    if (hitam.hitam_12 !== null) { $('#hitam_12').prop('checked', true); changeColor('warna_12', 'hitam_12');}
                    if (hitam.hitam_13 !== null) { $('#hitam_13').prop('checked', true); changeColor('warna_13', 'hitam_13');}
                    if (hitam.hitam_14 !== null) { $('#hitam_14').prop('checked', true); changeColor('warna_14', 'hitam_14');}
                    if (hitam.hitam_15 !== null) { $('#hitam_15').prop('checked', true); changeColor('warna_15', 'hitam_15');}
                    if (hitam.hitam_16 !== null) { $('#hitam_16').prop('checked', true); changeColor('warna_16', 'hitam_16');}
                    if (hitam.hitam_17 !== null) { $('#hitam_17').prop('checked', true); changeColor('warna_17', 'hitam_17');}
                    if (hitam.hitam_18 !== null) { $('#hitam_18').prop('checked', true); changeColor('warna_18', 'hitam_18');}
                    if (hitam.hitam_19 !== null) { $('#hitam_19').prop('checked', true); changeColor('warna_19', 'hitam_19');}
                    if (hitam.hitam_20 !== null) { $('#hitam_20').prop('checked', true); changeColor('warna_20', 'hitam_20');}
                    if (hitam.hitam_21 !== null) { $('#hitam_21').prop('checked', true); changeColor('warna_21', 'hitam_21');}
                    if (hitam.hitam_22 !== null) { $('#hitam_22').prop('checked', true); changeColor('warna_22', 'hitam_22');}
                    if (hitam.hitam_23 !== null) { $('#hitam_23').prop('checked', true); changeColor('warna_23', 'hitam_23');}
                    if (hitam.hitam_24 !== null) { $('#hitam_24').prop('checked', true); changeColor('warna_24', 'hitam_24');}
                    if (hitam.hitam_25 !== null) { $('#hitam_25').prop('checked', true); changeColor('warna_25', 'hitam_25');}
                    if (hitam.hitam_26 !== null) { $('#hitam_26').prop('checked', true); changeColor('warna_26', 'hitam_26');}
                    if (hitam.hitam_27 !== null) { $('#hitam_27').prop('checked', true); changeColor('warna_27', 'hitam_27');}
                    if (hitam.hitam_28 !== null) { $('#hitam_28').prop('checked', true); changeColor('warna_28', 'hitam_28');}
                    if (hitam.hitam_29 !== null) { $('#hitam_29').prop('checked', true); changeColor('warna_29', 'hitam_29');}
                    if (hitam.hitam_30 !== null) { $('#hitam_30').prop('checked', true); changeColor('warna_30', 'hitam_30');}
                    if (hitam.hitam_31 !== null) { $('#hitam_31').prop('checked', true); changeColor('warna_31', 'hitam_31');}
                    if (hitam.hitam_32 !== null) { $('#hitam_32').prop('checked', true); changeColor('warna_32', 'hitam_32');}
                    if (hitam.hitam_33 !== null) { $('#hitam_33').prop('checked', true); changeColor('warna_33', 'hitam_33');}
                    if (hitam.hitam_34 !== null) { $('#hitam_34').prop('checked', true); changeColor('warna_34', 'hitam_34');}
                    if (hitam.hitam_35 !== null) { $('#hitam_35').prop('checked', true); changeColor('warna_35', 'hitam_35');}
                    if (hitam.hitam_36 !== null) { $('#hitam_36').prop('checked', true); changeColor('warna_36', 'hitam_36');}
                    if (hitam.hitam_37 !== null) { $('#hitam_37').prop('checked', true); changeColor('warna_37', 'hitam_37');}
                    if (hitam.hitam_38 !== null) { $('#hitam_38').prop('checked', true); changeColor('warna_38', 'hitam_38');}
                    if (hitam.hitam_39 !== null) { $('#hitam_39').prop('checked', true); changeColor('warna_39', 'hitam_39');}
                    if (hitam.hitam_40 !== null) { $('#hitam_40').prop('checked', true); changeColor('warna_40', 'hitam_40');}
                    if (hitam.hitam_41 !== null) { $('#hitam_41').prop('checked', true); changeColor('warna_41', 'hitam_41');}
                    if (hitam.hitam_42 !== null) { $('#hitam_42').prop('checked', true); changeColor('warna_42', 'hitam_42');}
                    if (hitam.hitam_43 !== null) { $('#hitam_43').prop('checked', true); changeColor('warna_43', 'hitam_43');}
                    if (hitam.hitam_44 !== null) { $('#hitam_44').prop('checked', true); changeColor('warna_44', 'hitam_44');}
                    if (hitam.hitam_45 !== null) { $('#hitam_45').prop('checked', true); changeColor('warna_45', 'hitam_45');}
                    if (hitam.hitam_46 !== null) { $('#hitam_46').prop('checked', true); changeColor('warna_46', 'hitam_46');}
                    if (hitam.hitam_47 !== null) { $('#hitam_47').prop('checked', true); changeColor('warna_47', 'hitam_47');}
                    if (hitam.hitam_48 !== null) { $('#hitam_48').prop('checked', true); changeColor('warna_48', 'hitam_48');}
                    if (hitam.hitam_49 !== null) { $('#hitam_49').prop('checked', true); changeColor('warna_49', 'hitam_49');}
                    if (hitam.hitam_50 !== null) { $('#hitam_50').prop('checked', true); changeColor('warna_50', 'hitam_50');}
                    if (hitam.hitam_51 !== null) { $('#hitam_51').prop('checked', true); changeColor('warna_51', 'hitam_51');}
                    if (hitam.hitam_52 !== null) { $('#hitam_52').prop('checked', true); changeColor('warna_52', 'hitam_52');}
                    if (hitam.hitam_53 !== null) { $('#hitam_53').prop('checked', true); changeColor('warna_53', 'hitam_53');}
                    if (hitam.hitam_54 !== null) { $('#hitam_54').prop('checked', true); changeColor('warna_54', 'hitam_54');}
                    if (hitam.hitam_55 !== null) { $('#hitam_55').prop('checked', true); changeColor('warna_55', 'hitam_55');}
                    if (hitam.hitam_56 !== null) { $('#hitam_56').prop('checked', true); changeColor('warna_56', 'hitam_56');}
                    if (hitam.hitam_57 !== null) { $('#hitam_57').prop('checked', true); changeColor('warna_57', 'hitam_57');}
                    if (hitam.hitam_58 !== null) { $('#hitam_58').prop('checked', true); changeColor('warna_58', 'hitam_58');}
                    if (hitam.hitam_59 !== null) { $('#hitam_59').prop('checked', true); changeColor('warna_59', 'hitam_59');}
                    if (hitam.hitam_60 !== null) { $('#hitam_60').prop('checked', true); changeColor('warna_60', 'hitam_60');}
                    if (hitam.hitam_61 !== null) { $('#hitam_61').prop('checked', true); changeColor('warna_61', 'hitam_61');}
                    if (hitam.hitam_62 !== null) { $('#hitam_62').prop('checked', true); changeColor('warna_62', 'hitam_62');}
                    if (hitam.hitam_63 !== null) { $('#hitam_63').prop('checked', true); changeColor('warna_63', 'hitam_63');}
                    if (hitam.hitam_64 !== null) { $('#hitam_64').prop('checked', true); changeColor('warna_64', 'hitam_64');}
                    if (hitam.hitam_65 !== null) { $('#hitam_65').prop('checked', true); changeColor('warna_65', 'hitam_65');}
                    if (hitam.hitam_66 !== null) { $('#hitam_66').prop('checked', true); changeColor('warna_66', 'hitam_66');}
                    if (hitam.hitam_67 !== null) { $('#hitam_67').prop('checked', true); changeColor('warna_67', 'hitam_67');}
                    if (hitam.hitam_68 !== null) { $('#hitam_68').prop('checked', true); changeColor('warna_68', 'hitam_68');}
                    if (hitam.hitam_69 !== null) { $('#hitam_69').prop('checked', true); changeColor('warna_69', 'hitam_69');}
                    if (hitam.hitam_70 !== null) { $('#hitam_70').prop('checked', true); changeColor('warna_70', 'hitam_70');}
                    if (hitam.hitam_71 !== null) { $('#hitam_71').prop('checked', true); changeColor('warna_71', 'hitam_71');}
                    if (hitam.hitam_72 !== null) { $('#hitam_72').prop('checked', true); changeColor('warna_72', 'hitam_72');}
                    if (hitam.hitam_73 !== null) { $('#hitam_73').prop('checked', true); changeColor('warna_73', 'hitam_73');}
                    if (hitam.hitam_74 !== null) { $('#hitam_74').prop('checked', true); changeColor('warna_74', 'hitam_74');}
                    if (hitam.hitam_75 !== null) { $('#hitam_75').prop('checked', true); changeColor('warna_75', 'hitam_75');}
                    if (hitam.hitam_76 !== null) { $('#hitam_76').prop('checked', true); changeColor('warna_76', 'hitam_76');}
                    if (hitam.hitam_77 !== null) { $('#hitam_77').prop('checked', true); changeColor('warna_77', 'hitam_77');}
                    if (hitam.hitam_78 !== null) { $('#hitam_78').prop('checked', true); changeColor('warna_78', 'hitam_78');}
                    if (hitam.hitam_79 !== null) { $('#hitam_79').prop('checked', true); changeColor('warna_79', 'hitam_79');}
                    if (hitam.hitam_80 !== null) { $('#hitam_80').prop('checked', true); changeColor('warna_80', 'hitam_80');}
                    if (hitam.hitam_81 !== null) { $('#hitam_81').prop('checked', true); changeColor('warna_81', 'hitam_81');}
                    if (hitam.hitam_82 !== null) { $('#hitam_82').prop('checked', true); changeColor('warna_82', 'hitam_82');}
                    if (hitam.hitam_83 !== null) { $('#hitam_83').prop('checked', true); changeColor('warna_83', 'hitam_83');}
                    if (hitam.hitam_84 !== null) { $('#hitam_84').prop('checked', true); changeColor('warna_84', 'hitam_84');}
                    if (hitam.hitam_85 !== null) { $('#hitam_85').prop('checked', true); changeColor('warna_85', 'hitam_85');}
                    if (hitam.hitam_86 !== null) { $('#hitam_86').prop('checked', true); changeColor('warna_86', 'hitam_86');}
                    if (hitam.hitam_87 !== null) { $('#hitam_87').prop('checked', true); changeColor('warna_87', 'hitam_87');}
                    if (hitam.hitam_88 !== null) { $('#hitam_88').prop('checked', true); changeColor('warna_88', 'hitam_88');}
                    if (hitam.hitam_89 !== null) { $('#hitam_89').prop('checked', true); changeColor('warna_89', 'hitam_89');}
                    if (hitam.hitam_90 !== null) { $('#hitam_90').prop('checked', true); changeColor('warna_90', 'hitam_90');}
                    if (hitam.hitam_91 !== null) { $('#hitam_91').prop('checked', true); changeColor('warna_91', 'hitam_91');}
                    if (hitam.hitam_92 !== null) { $('#hitam_92').prop('checked', true); changeColor('warna_92', 'hitam_92');}
                    if (hitam.hitam_93 !== null) { $('#hitam_93').prop('checked', true); changeColor('warna_93', 'hitam_93');}
                    if (hitam.hitam_94 !== null) { $('#hitam_94').prop('checked', true); changeColor('warna_94', 'hitam_94');}
                    if (hitam.hitam_95 !== null) { $('#hitam_95').prop('checked', true); changeColor('warna_95', 'hitam_95');}
                    if (hitam.hitam_96 !== null) { $('#hitam_96').prop('checked', true); changeColor('warna_96', 'hitam_96');}
                    if (hitam.hitam_97 !== null) { $('#hitam_97').prop('checked', true); changeColor('warna_97', 'hitam_97');}
                    if (hitam.hitam_98 !== null) { $('#hitam_98').prop('checked', true); changeColor('warna_98', 'hitam_98');}
                    if (hitam.hitam_99 !== null) { $('#hitam_99').prop('checked', true); changeColor('warna_99', 'hitam_99');}
                    if (hitam.hitam_100 !== null) { $('#hitam_100').prop('checked', true); changeColor('warna_100', 'hitam_100');}
                    if (hitam.hitam_101 !== null) { $('#hitam_101').prop('checked', true); changeColor('warna_101', 'hitam_101');}
                    if (hitam.hitam_102 !== null) { $('#hitam_102').prop('checked', true); changeColor('warna_102', 'hitam_102');}
                    if (hitam.hitam_103 !== null) { $('#hitam_103').prop('checked', true); changeColor('warna_103', 'hitam_103');}
                    if (hitam.hitam_104 !== null) { $('#hitam_104').prop('checked', true); changeColor('warna_104', 'hitam_104');}
                    if (hitam.hitam_105 !== null) { $('#hitam_105').prop('checked', true); changeColor('warna_105', 'hitam_105');}
                    if (hitam.hitam_106 !== null) { $('#hitam_106').prop('checked', true); changeColor('warna_106', 'hitam_106');}
                    if (hitam.hitam_107 !== null) { $('#hitam_107').prop('checked', true); changeColor('warna_107', 'hitam_107');}
                    if (hitam.hitam_108 !== null) { $('#hitam_108').prop('checked', true); changeColor('warna_108', 'hitam_108');}
                    if (hitam.hitam_109 !== null) { $('#hitam_109').prop('checked', true); changeColor('warna_109', 'hitam_109');}
                    if (hitam.hitam_110 !== null) { $('#hitam_110').prop('checked', true); changeColor('warna_110', 'hitam_110');}
                    if (hitam.hitam_111 !== null) { $('#hitam_111').prop('checked', true); changeColor('warna_111', 'hitam_111');}
                    if (hitam.hitam_112 !== null) { $('#hitam_112').prop('checked', true); changeColor('warna_112', 'hitam_112');}
                    if (hitam.hitam_113 !== null) { $('#hitam_113').prop('checked', true); changeColor('warna_113', 'hitam_113');}
                    if (hitam.hitam_114 !== null) { $('#hitam_114').prop('checked', true); changeColor('warna_114', 'hitam_114');}
                    if (hitam.hitam_115 !== null) { $('#hitam_115').prop('checked', true); changeColor('warna_115', 'hitam_115');}
                    if (hitam.hitam_116 !== null) { $('#hitam_116').prop('checked', true); changeColor('warna_116', 'hitam_116');}
                    if (hitam.hitam_117 !== null) { $('#hitam_117').prop('checked', true); changeColor('warna_117', 'hitam_117');}
                    if (hitam.hitam_118 !== null) { $('#hitam_118').prop('checked', true); changeColor('warna_118', 'hitam_118');}
                    if (hitam.hitam_119 !== null) { $('#hitam_119').prop('checked', true); changeColor('warna_119', 'hitam_119');}
                    if (hitam.hitam_120 !== null) { $('#hitam_120').prop('checked', true); changeColor('warna_120', 'hitam_120');}
                    if (hitam.hitam_121 !== null) { $('#hitam_121').prop('checked', true); changeColor('warna_121', 'hitam_121');}
                    if (hitam.hitam_122 !== null) { $('#hitam_122').prop('checked', true); changeColor('warna_122', 'hitam_122');}
                    if (hitam.hitam_123 !== null) { $('#hitam_123').prop('checked', true); changeColor('warna_123', 'hitam_123');}
                    if (hitam.hitam_124 !== null) { $('#hitam_124').prop('checked', true); changeColor('warna_124', 'hitam_124');}
                    if (hitam.hitam_125 !== null) { $('#hitam_125').prop('checked', true); changeColor('warna_125', 'hitam_125');}
                    if (hitam.hitam_126 !== null) { $('#hitam_126').prop('checked', true); changeColor('warna_126', 'hitam_126');}
                    if (hitam.hitam_127 !== null) { $('#hitam_127').prop('checked', true); changeColor('warna_127', 'hitam_127');}
                    if (hitam.hitam_128 !== null) { $('#hitam_128').prop('checked', true); changeColor('warna_128', 'hitam_128');}
                    if (hitam.hitam_129 !== null) { $('#hitam_129').prop('checked', true); changeColor('warna_129', 'hitam_129');}
                    if (hitam.hitam_130 !== null) { $('#hitam_130').prop('checked', true); changeColor('warna_130', 'hitam_130');}
                    if (hitam.hitam_131 !== null) { $('#hitam_131').prop('checked', true); changeColor('warna_131', 'hitam_131');}
                    if (hitam.hitam_132 !== null) { $('#hitam_132').prop('checked', true); changeColor('warna_132', 'hitam_132');}
                    if (hitam.hitam_133 !== null) { $('#hitam_133').prop('checked', true); changeColor('warna_133', 'hitam_133');}
                    if (hitam.hitam_134 !== null) { $('#hitam_134').prop('checked', true); changeColor('warna_134', 'hitam_134');}
                    if (hitam.hitam_135 !== null) { $('#hitam_135').prop('checked', true); changeColor('warna_135', 'hitam_135');}
                    if (hitam.hitam_136 !== null) { $('#hitam_136').prop('checked', true); changeColor('warna_136', 'hitam_136');}
                    if (hitam.hitam_137 !== null) { $('#hitam_137').prop('checked', true); changeColor('warna_137', 'hitam_137');}
                    if (hitam.hitam_138 !== null) { $('#hitam_138').prop('checked', true); changeColor('warna_138', 'hitam_138');}
                    if (hitam.hitam_139 !== null) { $('#hitam_139').prop('checked', true); changeColor('warna_139', 'hitam_139');}
                    if (hitam.hitam_140 !== null) { $('#hitam_140').prop('checked', true); changeColor('warna_140', 'hitam_140');}
                    if (hitam.hitam_141 !== null) { $('#hitam_141').prop('checked', true); changeColor('warna_141', 'hitam_141');}
                    if (hitam.hitam_142 !== null) { $('#hitam_142').prop('checked', true); changeColor('warna_142', 'hitam_142');}
                    if (hitam.hitam_143 !== null) { $('#hitam_143').prop('checked', true); changeColor('warna_143', 'hitam_143');}
                    if (hitam.hitam_144 !== null) { $('#hitam_144').prop('checked', true); changeColor('warna_144', 'hitam_144');}
                    if (hitam.hitam_145 !== null) { $('#hitam_145').prop('checked', true); changeColor('warna_145', 'hitam_145');}
                    if (hitam.hitam_146 !== null) { $('#hitam_146').prop('checked', true); changeColor('warna_146', 'hitam_146');}
                    if (hitam.hitam_147 !== null) { $('#hitam_147').prop('checked', true); changeColor('warna_147', 'hitam_147');}
                    if (hitam.hitam_148 !== null) { $('#hitam_148').prop('checked', true); changeColor('warna_148', 'hitam_148');}
                    if (hitam.hitam_149 !== null) { $('#hitam_149').prop('checked', true); changeColor('warna_149', 'hitam_149');}
                    if (hitam.hitam_150 !== null) { $('#hitam_150').prop('checked', true); changeColor('warna_150', 'hitam_150');}
                    if (hitam.hitam_151 !== null) { $('#hitam_151').prop('checked', true); changeColor('warna_151', 'hitam_151');}
                    if (hitam.hitam_152 !== null) { $('#hitam_152').prop('checked', true); changeColor('warna_152', 'hitam_152');}
                    if (hitam.hitam_153 !== null) { $('#hitam_153').prop('checked', true); changeColor('warna_153', 'hitam_153');}
                    if (hitam.hitam_154 !== null) { $('#hitam_154').prop('checked', true); changeColor('warna_154', 'hitam_154');}
                    if (hitam.hitam_155 !== null) { $('#hitam_155').prop('checked', true); changeColor('warna_155', 'hitam_155');}
                    if (hitam.hitam_156 !== null) { $('#hitam_156').prop('checked', true); changeColor('warna_156', 'hitam_156');}
                    if (hitam.hitam_157 !== null) { $('#hitam_157').prop('checked', true); changeColor('warna_157', 'hitam_157');}
                    if (hitam.hitam_158 !== null) { $('#hitam_158').prop('checked', true); changeColor('warna_158', 'hitam_158');}
                    if (hitam.hitam_159 !== null) { $('#hitam_159').prop('checked', true); changeColor('warna_159', 'hitam_159');}
                    if (hitam.hitam_160 !== null) { $('#hitam_160').prop('checked', true); changeColor('warna_160', 'hitam_160');}



                    // const oksitosin = JSON.parse(data.catatan_persalinan.oksitosin);  
                    // if (oksitosin.oksitosin_1 !== null) {$('#oksitosin-1').val(oksitosin.oksitosin_1);}
                    // if (oksitosin.oksitosin_2 !== null) {$('#oksitosin-2').val(oksitosin.oksitosin_2);}
                    // if (oksitosin.oksitosin_3 !== null) {$('#oksitosin-3').val(oksitosin.oksitosin_3);}
                    // if (oksitosin.oksitosin_4 !== null) {$('#oksitosin-4').val(oksitosin.oksitosin_4);}
                    // if (oksitosin.oksitosin_5 !== null) {$('#oksitosin-5').val(oksitosin.oksitosin_5);}
                    // if (oksitosin.oksitosin_6 !== null) {$('#oksitosin-6').val(oksitosin.oksitosin_6);}
                    // if (oksitosin.oksitosin_7 !== null) {$('#oksitosin-7').val(oksitosin.oksitosin_7);}
                    // if (oksitosin.oksitosin_8 !== null) {$('#oksitosin-8').val(oksitosin.oksitosin_8);}
                    // if (oksitosin.oksitosin_9 !== null) {$('#oksitosin-9').val(oksitosin.oksitosin_9);}
                    // if (oksitosin.oksitosin_10 !== null) {$('#oksitosin-10').val(oksitosin.oksitosin_10);}
                    // if (oksitosin.oksitosin_11 !== null) {$('#oksitosin-11').val(oksitosin.oksitosin_11);}
                    // if (oksitosin.oksitosin_12 !== null) {$('#oksitosin-12').val(oksitosin.oksitosin_12);}
                    // if (oksitosin.oksitosin_13 !== null) {$('#oksitosin-13').val(oksitosin.oksitosin_13);}
                    // if (oksitosin.oksitosin_14 !== null) {$('#oksitosin-14').val(oksitosin.oksitosin_14);}
                    // if (oksitosin.oksitosin_15 !== null) {$('#oksitosin-15').val(oksitosin.oksitosin_15);}
                    // if (oksitosin.oksitosin_16 !== null) {$('#oksitosin-16').val(oksitosin.oksitosin_16);}
                    // if (oksitosin.oksitosin_17 !== null) {$('#oksitosin-17').val(oksitosin.oksitosin_17);}
                    // if (oksitosin.oksitosin_18 !== null) {$('#oksitosin-18').val(oksitosin.oksitosin_18);}
                    // if (oksitosin.oksitosin_19 !== null) {$('#oksitosin-19').val(oksitosin.oksitosin_19);}
                    // if (oksitosin.oksitosin_20 !== null) {$('#oksitosin-20').val(oksitosin.oksitosin_20);}
                    // if (oksitosin.oksitosin_21 !== null) {$('#oksitosin-21').val(oksitosin.oksitosin_21);}
                    // if (oksitosin.oksitosin_22 !== null) {$('#oksitosin-22').val(oksitosin.oksitosin_22);}
                    // if (oksitosin.oksitosin_23 !== null) {$('#oksitosin-23').val(oksitosin.oksitosin_23);}
                    // if (oksitosin.oksitosin_24 !== null) {$('#oksitosin-24').val(oksitosin.oksitosin_24);}

                    // const tetes = JSON.parse(data.catatan_persalinan.tetes);  
                    // if (tetes.tetes_1 !== null) {$('#tetes-1').val(tetes.tetes_1);}
                    // if (tetes.tetes_2 !== null) {$('#tetes-2').val(tetes.tetes_2);}
                    // if (tetes.tetes_3 !== null) {$('#tetes-3').val(tetes.tetes_3);}
                    // if (tetes.tetes_4 !== null) {$('#tetes-4').val(tetes.tetes_4);}
                    // if (tetes.tetes_5 !== null) {$('#tetes-5').val(tetes.tetes_5);}
                    // if (tetes.tetes_6 !== null) {$('#tetes-6').val(tetes.tetes_6);}
                    // if (tetes.tetes_7 !== null) {$('#tetes-7').val(tetes.tetes_7);}
                    // if (tetes.tetes_8 !== null) {$('#tetes-8').val(tetes.tetes_8);}
                    // if (tetes.tetes_9 !== null) {$('#tetes-9').val(tetes.tetes_9);}
                    // if (tetes.tetes_10 !== null) {$('#tetes-10').val(tetes.tetes_10);}
                    // if (tetes.tetes_11 !== null) {$('#tetes-11').val(tetes.tetes_11);}
                    // if (tetes.tetes_12 !== null) {$('#tetes-12').val(tetes.tetes_12);}
                    // if (tetes.tetes_13 !== null) {$('#tetes-13').val(tetes.tetes_13);}
                    // if (tetes.tetes_14 !== null) {$('#tetes-14').val(tetes.tetes_14);}
                    // if (tetes.tetes_15 !== null) {$('#tetes-15').val(tetes.tetes_15);}
                    // if (tetes.tetes_16 !== null) {$('#tetes-16').val(tetes.tetes_16);}
                    // if (tetes.tetes_17 !== null) {$('#tetes-17').val(tetes.tetes_17);}
                    // if (tetes.tetes_18 !== null) {$('#tetes-18').val(tetes.tetes_18);}
                    // if (tetes.tetes_19 !== null) {$('#tetes-19').val(tetes.tetes_19);}
                    // if (tetes.tetes_20 !== null) {$('#tetes-20').val(tetes.tetes_20);}
                    // if (tetes.tetes_21 !== null) {$('#tetes-21').val(tetes.tetes_21);}
                    // if (tetes.tetes_22 !== null) {$('#tetes-22').val(tetes.tetes_22);}
                    // if (tetes.tetes_23 !== null) {$('#tetes-23').val(tetes.tetes_23);}
                    // if (tetes.tetes_24 !== null) {$('#tetes-24').val(tetes.tetes_24);}


                    const oksitosin = JSON.parse(data.catatan_persalinan.oksitosin);
                    for (let i = 1; i <= 32; i++) {
                        let key = `oksitosin_${i}`;
                        if (oksitosin[key] !== null) {
                            $(`#oksitosin-${i}`).val(oksitosin[key]);
                        }
                    }

                    const tetes = JSON.parse(data.catatan_persalinan.tetes);
                    for (let i = 1; i <= 32; i++) {
                        let key = `tetes_${i}`;
                        if (tetes[key] !== null) {
                            $(`#tetes-${i}`).val(tetes[key]);
                        }
                    }


                    // $('#obat-cairan').val(data.catatan_persalinan.obat_cairan);

                    const obat_cairan = JSON.parse(data.catatan_persalinan.obat_cairan);
                    for (let i = 1; i <= 16; i++) {
                        let key = `obat_cairan_${i}`;
                        if (obat_cairan[key] !== null) {
                            $(`#obat-cairan-${i}`).val(obat_cairan[key]);
                        }
                    }

                    // const obat_cairan = JSON.parse(data.catatan_persalinan.obat_cairan);  
                    // if (obat_cairan.obat_cairan_1 !== null) {$('#obat-cairan-1').val(obat_cairan.obat_cairan_1);}
                    // if (obat_cairan.obat_cairan_2 !== null) {$('#obat-cairan-2').val(obat_cairan.obat_cairan_2);}
                    // if (obat_cairan.obat_cairan_3 !== null) {$('#obat-cairan-3').val(obat_cairan.obat_cairan_3);}
                    // if (obat_cairan.obat_cairan_4 !== null) {$('#obat-cairan-4').val(obat_cairan.obat_cairan_4);}
                    // if (obat_cairan.obat_cairan_5 !== null) {$('#obat-cairan-5').val(obat_cairan.obat_cairan_5);}
                    // if (obat_cairan.obat_cairan_6 !== null) {$('#obat-cairan-6').val(obat_cairan.obat_cairan_6);}
                    // if (obat_cairan.obat_cairan_7 !== null) {$('#obat-cairan-7').val(obat_cairan.obat_cairan_7);}
                    // if (obat_cairan.obat_cairan_8 !== null) {$('#obat-cairan-8').val(obat_cairan.obat_cairan_8);}
                    // if (obat_cairan.obat_cairan_9 !== null) {$('#obat-cairan-9').val(obat_cairan.obat_cairan_9);}
                    // if (obat_cairan.obat_cairan_10 !== null) {$('#obat-cairan-10').val(obat_cairan.obat_cairan_10);}

                    const suhu = JSON.parse(data.catatan_persalinan.suhu);  
                    if (suhu.suhu_1 !== null) {$('#suhu-1').val(suhu.suhu_1);}
                    if (suhu.suhu_2 !== null) {$('#suhu-2').val(suhu.suhu_2);}
                    if (suhu.suhu_3 !== null) {$('#suhu-3').val(suhu.suhu_3);}
                    if (suhu.suhu_4 !== null) {$('#suhu-4').val(suhu.suhu_4);}
                    if (suhu.suhu_5 !== null) {$('#suhu-5').val(suhu.suhu_5);}
                    if (suhu.suhu_6 !== null) {$('#suhu-6').val(suhu.suhu_6);}
                    if (suhu.suhu_7 !== null) {$('#suhu-7').val(suhu.suhu_7);}
                    if (suhu.suhu_8 !== null) {$('#suhu-8').val(suhu.suhu_8);}
                    if (suhu.suhu_9 !== null) {$('#suhu-9').val(suhu.suhu_9);}
                    if (suhu.suhu_10 !== null) {$('#suhu-10').val(suhu.suhu_10);}
                    if (suhu.suhu_11 !== null) {$('#suhu-11').val(suhu.suhu_11);}
                    if (suhu.suhu_12 !== null) {$('#suhu-12').val(suhu.suhu_12);}
                    if (suhu.suhu_13 !== null) {$('#suhu-13').val(suhu.suhu_13);}
                    if (suhu.suhu_14 !== null) {$('#suhu-14').val(suhu.suhu_14);}
                    if (suhu.suhu_15 !== null) {$('#suhu-15').val(suhu.suhu_15);}
                    if (suhu.suhu_16 !== null) {$('#suhu-16').val(suhu.suhu_16);}


                    const protein = JSON.parse(data.catatan_persalinan.protein);  
                    if (protein.protein_1 !== null) {$('#protein-1').val(protein.protein_1);}
                    if (protein.protein_2 !== null) {$('#protein-2').val(protein.protein_2);}
                    if (protein.protein_3 !== null) {$('#protein-3').val(protein.protein_3);}
                    if (protein.protein_4 !== null) {$('#protein-4').val(protein.protein_4);}
                    if (protein.protein_5 !== null) {$('#protein-5').val(protein.protein_5);}
                    if (protein.protein_6 !== null) {$('#protein-6').val(protein.protein_6);}
                    if (protein.protein_7 !== null) {$('#protein-7').val(protein.protein_7);}
                    if (protein.protein_8 !== null) {$('#protein-8').val(protein.protein_8);}
                    if (protein.protein_9 !== null) {$('#protein-9').val(protein.protein_9);}
                    if (protein.protein_10 !== null) {$('#protein-10').val(protein.protein_10);}
                    if (protein.protein_11 !== null) {$('#protein-11').val(protein.protein_11);}
                    if (protein.protein_12 !== null) {$('#protein-12').val(protein.protein_12);}
                    if (protein.protein_13 !== null) {$('#protein-13').val(protein.protein_13);}
                    if (protein.protein_14 !== null) {$('#protein-14').val(protein.protein_14);}
                    if (protein.protein_15 !== null) {$('#protein-15').val(protein.protein_15);}
                    if (protein.protein_16 !== null) {$('#protein-16').val(protein.protein_16);}

                    const aseton = JSON.parse(data.catatan_persalinan.aseton);  
                    if (aseton.aseton_1 !== null) {$('#aseton-1').val(aseton.aseton_1);}
                    if (aseton.aseton_2 !== null) {$('#aseton-2').val(aseton.aseton_2);}
                    if (aseton.aseton_3 !== null) {$('#aseton-3').val(aseton.aseton_3);}
                    if (aseton.aseton_4 !== null) {$('#aseton-4').val(aseton.aseton_4);}
                    if (aseton.aseton_5 !== null) {$('#aseton-5').val(aseton.aseton_5);}
                    if (aseton.aseton_6 !== null) {$('#aseton-6').val(aseton.aseton_6);}
                    if (aseton.aseton_7 !== null) {$('#aseton-7').val(aseton.aseton_7);}
                    if (aseton.aseton_8 !== null) {$('#aseton-8').val(aseton.aseton_8);}
                    if (aseton.aseton_9 !== null) {$('#aseton-9').val(aseton.aseton_9);}
                    if (aseton.aseton_10 !== null) {$('#aseton-10').val(aseton.aseton_10);}
                    if (aseton.aseton_11 !== null) {$('#aseton-11').val(aseton.aseton_11);}
                    if (aseton.aseton_12 !== null) {$('#aseton-12').val(aseton.aseton_12);}
                    if (aseton.aseton_13 !== null) {$('#aseton-13').val(aseton.aseton_13);}
                    if (aseton.aseton_14 !== null) {$('#aseton-14').val(aseton.aseton_14);}
                    if (aseton.aseton_15 !== null) {$('#aseton-15').val(aseton.aseton_15);}
                    if (aseton.aseton_16 !== null) {$('#aseton-16').val(aseton.aseton_16);}

                    const volume = JSON.parse(data.catatan_persalinan.volume);  
                    if (volume.volume_1 !== null) {$('#volume-1').val(volume.volume_1);}
                    if (volume.volume_2 !== null) {$('#volume-2').val(volume.volume_2);}
                    if (volume.volume_3 !== null) {$('#volume-3').val(volume.volume_3);}
                    if (volume.volume_4 !== null) {$('#volume-4').val(volume.volume_4);}
                    if (volume.volume_5 !== null) {$('#volume-5').val(volume.volume_5);}
                    if (volume.volume_6 !== null) {$('#volume-6').val(volume.volume_6);}
                    if (volume.volume_7 !== null) {$('#volume-7').val(volume.volume_7);}
                    if (volume.volume_8 !== null) {$('#volume-8').val(volume.volume_8);}
                    if (volume.volume_9 !== null) {$('#volume-9').val(volume.volume_9);}
                    if (volume.volume_10 !== null) {$('#volume-10').val(volume.volume_10);}
                    if (volume.volume_11 !== null) {$('#volume-11').val(volume.volume_11);}
                    if (volume.volume_12 !== null) {$('#volume-12').val(volume.volume_12);}
                    if (volume.volume_13 !== null) {$('#volume-13').val(volume.volume_13);}
                    if (volume.volume_14 !== null) {$('#volume-14').val(volume.volume_14);}
                    if (volume.volume_15 !== null) {$('#volume-15').val(volume.volume_15);}
                    if (volume.volume_16 !== null) {$('#volume-16').val(volume.volume_16);}

                    // TABELLLLL 
                    const waktu_iv = JSON.parse(data.catatan_persalinan.waktu_iv);  
                    if (waktu_iv.waktu_iv_1 !== null) {$('#waktu-iv-1').val(waktu_iv.waktu_iv_1);}
                    if (waktu_iv.waktu_iv_2 !== null) {$('#waktu-iv-2').val(waktu_iv.waktu_iv_2);}
                    if (waktu_iv.waktu_iv_3 !== null) {$('#waktu-iv-3').val(waktu_iv.waktu_iv_3);}
                    if (waktu_iv.waktu_iv_4 !== null) {$('#waktu-iv-4').val(waktu_iv.waktu_iv_4);}
                    if (waktu_iv.waktu_iv_5 !== null) {$('#waktu-iv-5').val(waktu_iv.waktu_iv_5);}
                    if (waktu_iv.waktu_iv_6 !== null) {$('#waktu-iv-6').val(waktu_iv.waktu_iv_6);}
                    if (waktu_iv.waktu_iv_7 !== null) {$('#waktu-iv-7').val(waktu_iv.waktu_iv_7);}
                    // if (waktu_iv.waktu_iv_8 !== null) {$('#waktu-iv-8').val(waktu_iv.waktu_iv_8);}
                    // if (waktu_iv.waktu_iv_9 !== null) {$('#waktu-iv-9').val(waktu_iv.waktu_iv_9);}
                    // if (waktu_iv.waktu_iv_10 !== null) {$('#waktu-iv-10').val(waktu_iv.waktu_iv_10);}

                    const tekanan_darah_iv = JSON.parse(data.catatan_persalinan.tekanan_darah_iv);  
                    if (tekanan_darah_iv.tekanan_darah_iv_1 !== null) {$('#tekanan-darah-iv-1').val(tekanan_darah_iv.tekanan_darah_iv_1);}
                    if (tekanan_darah_iv.tekanan_darah_iv_2 !== null) {$('#tekanan-darah-iv-2').val(tekanan_darah_iv.tekanan_darah_iv_2);}
                    if (tekanan_darah_iv.tekanan_darah_iv_3 !== null) {$('#tekanan-darah-iv-3').val(tekanan_darah_iv.tekanan_darah_iv_3);}
                    if (tekanan_darah_iv.tekanan_darah_iv_4 !== null) {$('#tekanan-darah-iv-4').val(tekanan_darah_iv.tekanan_darah_iv_4);}
                    if (tekanan_darah_iv.tekanan_darah_iv_5 !== null) {$('#tekanan-darah-iv-5').val(tekanan_darah_iv.tekanan_darah_iv_5);}
                    if (tekanan_darah_iv.tekanan_darah_iv_6 !== null) {$('#tekanan-darah-iv-6').val(tekanan_darah_iv.tekanan_darah_iv_6);}
                    if (tekanan_darah_iv.tekanan_darah_iv_7 !== null) {$('#tekanan-darah-iv-7').val(tekanan_darah_iv.tekanan_darah_iv_7);}
                    if (tekanan_darah_iv.tekanan_darah_iv_8 !== null) {$('#tekanan-darah-iv-8').val(tekanan_darah_iv.tekanan_darah_iv_8);}
                    if (tekanan_darah_iv.tekanan_darah_iv_9 !== null) {$('#tekanan-darah-iv-9').val(tekanan_darah_iv.tekanan_darah_iv_9);}
                    if (tekanan_darah_iv.tekanan_darah_iv_10 !== null) {$('#tekanan-darah-iv-10').val(tekanan_darah_iv.tekanan_darah_iv_10);}

                    const nadi_iv = JSON.parse(data.catatan_persalinan.nadi_iv);  
                    if (nadi_iv.nadi_iv_1 !== null) {$('#nadi-iv-1').val(nadi_iv.nadi_iv_1);}
                    if (nadi_iv.nadi_iv_2 !== null) {$('#nadi-iv-2').val(nadi_iv.nadi_iv_2);}
                    if (nadi_iv.nadi_iv_3 !== null) {$('#nadi-iv-3').val(nadi_iv.nadi_iv_3);}
                    if (nadi_iv.nadi_iv_4 !== null) {$('#nadi-iv-4').val(nadi_iv.nadi_iv_4);}
                    if (nadi_iv.nadi_iv_5 !== null) {$('#nadi-iv-5').val(nadi_iv.nadi_iv_5);}
                    if (nadi_iv.nadi_iv_6 !== null) {$('#nadi-iv-6').val(nadi_iv.nadi_iv_6);}
                    if (nadi_iv.nadi_iv_7 !== null) {$('#nadi-iv-7').val(nadi_iv.nadi_iv_7);}
                    if (nadi_iv.nadi_iv_8 !== null) {$('#nadi-iv-8').val(nadi_iv.nadi_iv_8);}
                    if (nadi_iv.nadi_iv_9 !== null) {$('#nadi-iv-9').val(nadi_iv.nadi_iv_9);}
                    if (nadi_iv.nadi_iv_10 !== null) {$('#nadi-iv-10').val(nadi_iv.nadi_iv_10);}

                    const suhu_iv = JSON.parse(data.catatan_persalinan.suhu_iv);  
                    if (suhu_iv.suhu_iv_1 !== null) {$('#suhu-iv-1').val(suhu_iv.suhu_iv_1);}
                    if (suhu_iv.suhu_iv_2 !== null) {$('#suhu-iv-2').val(suhu_iv.suhu_iv_2);}
                    if (suhu_iv.suhu_iv_3 !== null) {$('#suhu-iv-3').val(suhu_iv.suhu_iv_3);}
                    if (suhu_iv.suhu_iv_4 !== null) {$('#suhu-iv-4').val(suhu_iv.suhu_iv_4);}
                    if (suhu_iv.suhu_iv_5 !== null) {$('#suhu-iv-5').val(suhu_iv.suhu_iv_5);}
                    if (suhu_iv.suhu_iv_6 !== null) {$('#suhu-iv-6').val(suhu_iv.suhu_iv_6);}
                    if (suhu_iv.suhu_iv_7 !== null) {$('#suhu-iv-7').val(suhu_iv.suhu_iv_7);}
                    if (suhu_iv.suhu_iv_8 !== null) {$('#suhu-iv-8').val(suhu_iv.suhu_iv_8);}
                    if (suhu_iv.suhu_iv_9 !== null) {$('#suhu-iv-9').val(suhu_iv.suhu_iv_9);}
                    if (suhu_iv.suhu_iv_10 !== null) {$('#suhu-iv-10').val(suhu_iv.suhu_iv_10);}

                    const tfu_iv = JSON.parse(data.catatan_persalinan.tfu_iv);  
                    if (tfu_iv.tfu_iv_1 !== null) {$('#tfu-iv-1').val(tfu_iv.tfu_iv_1);}
                    if (tfu_iv.tfu_iv_2 !== null) {$('#tfu-iv-2').val(tfu_iv.tfu_iv_2);}
                    if (tfu_iv.tfu_iv_3 !== null) {$('#tfu-iv-3').val(tfu_iv.tfu_iv_3);}
                    if (tfu_iv.tfu_iv_4 !== null) {$('#tfu-iv-4').val(tfu_iv.tfu_iv_4);}
                    if (tfu_iv.tfu_iv_5 !== null) {$('#tfu-iv-5').val(tfu_iv.tfu_iv_5);}
                    if (tfu_iv.tfu_iv_6 !== null) {$('#tfu-iv-6').val(tfu_iv.tfu_iv_6);}
                    if (tfu_iv.tfu_iv_7 !== null) {$('#tfu-iv-7').val(tfu_iv.tfu_iv_7);}
                    if (tfu_iv.tfu_iv_8 !== null) {$('#tfu-iv-8').val(tfu_iv.tfu_iv_8);}
                    if (tfu_iv.tfu_iv_9 !== null) {$('#tfu-iv-9').val(tfu_iv.tfu_iv_9);}
                    if (tfu_iv.tfu_iv_10 !== null) {$('#tfu-iv-10').val(tfu_iv.tfu_iv_10);}

                    const kontraksi_uterus_iv = JSON.parse(data.catatan_persalinan.kontraksi_uterus_iv);  
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_1 !== null) {$('#kontraksi-uterus-iv-1').val(kontraksi_uterus_iv.kontraksi_uterus_iv_1);}
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_2 !== null) {$('#kontraksi-uterus-iv-2').val(kontraksi_uterus_iv.kontraksi_uterus_iv_2);}
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_3 !== null) {$('#kontraksi-uterus-iv-3').val(kontraksi_uterus_iv.kontraksi_uterus_iv_3);}
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_4 !== null) {$('#kontraksi-uterus-iv-4').val(kontraksi_uterus_iv.kontraksi_uterus_iv_4);}
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_5 !== null) {$('#kontraksi-uterus-iv-5').val(kontraksi_uterus_iv.kontraksi_uterus_iv_5);}
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_6 !== null) {$('#kontraksi-uterus-iv-6').val(kontraksi_uterus_iv.kontraksi_uterus_iv_6);}
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_7 !== null) {$('#kontraksi-uterus-iv-7').val(kontraksi_uterus_iv.kontraksi_uterus_iv_7);}
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_8 !== null) {$('#kontraksi-uterus-iv-8').val(kontraksi_uterus_iv.kontraksi_uterus_iv_8);}
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_9 !== null) {$('#kontraksi-uterus-iv-9').val(kontraksi_uterus_iv.kontraksi_uterus_iv_9);}
                    if (kontraksi_uterus_iv.kontraksi_uterus_iv_10 !== null) {$('#kontraksi-uterus-iv-10').val(kontraksi_uterus_iv.kontraksi_uterus_iv_10);}

                    const kandung_kemih_iv = JSON.parse(data.catatan_persalinan.kandung_kemih_iv);  
                    if (kandung_kemih_iv.kandung_kemih_iv_1 !== null) {$('#kandung-kemih-iv-1').val(kandung_kemih_iv.kandung_kemih_iv_1);}
                    if (kandung_kemih_iv.kandung_kemih_iv_2 !== null) {$('#kandung-kemih-iv-2').val(kandung_kemih_iv.kandung_kemih_iv_2);}
                    if (kandung_kemih_iv.kandung_kemih_iv_3 !== null) {$('#kandung-kemih-iv-3').val(kandung_kemih_iv.kandung_kemih_iv_3);}
                    if (kandung_kemih_iv.kandung_kemih_iv_4 !== null) {$('#kandung-kemih-iv-4').val(kandung_kemih_iv.kandung_kemih_iv_4);}
                    if (kandung_kemih_iv.kandung_kemih_iv_5 !== null) {$('#kandung-kemih-iv-5').val(kandung_kemih_iv.kandung_kemih_iv_5);}
                    if (kandung_kemih_iv.kandung_kemih_iv_6 !== null) {$('#kandung-kemih-iv-6').val(kandung_kemih_iv.kandung_kemih_iv_6);}
                    if (kandung_kemih_iv.kandung_kemih_iv_7 !== null) {$('#kandung-kemih-iv-7').val(kandung_kemih_iv.kandung_kemih_iv_7);}
                    if (kandung_kemih_iv.kandung_kemih_iv_8 !== null) {$('#kandung-kemih-iv-8').val(kandung_kemih_iv.kandung_kemih_iv_8);}
                    if (kandung_kemih_iv.kandung_kemih_iv_9 !== null) {$('#kandung-kemih-iv-9').val(kandung_kemih_iv.kandung_kemih_iv_9);}
                    if (kandung_kemih_iv.kandung_kemih_iv_10 !== null) {$('#kandung-kemih-iv-10').val(kandung_kemih_iv.kandung_kemih_iv_10);}

                    const darah_yg_keluar_iv = JSON.parse(data.catatan_persalinan.darah_yg_keluar_iv);  
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_1 !== null) {$('#darah-yg-keluar-iv-1').val(darah_yg_keluar_iv.darah_yg_keluar_iv_1);}
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_2 !== null) {$('#darah-yg-keluar-iv-2').val(darah_yg_keluar_iv.darah_yg_keluar_iv_2);}
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_3 !== null) {$('#darah-yg-keluar-iv-3').val(darah_yg_keluar_iv.darah_yg_keluar_iv_3);}
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_4 !== null) {$('#darah-yg-keluar-iv-4').val(darah_yg_keluar_iv.darah_yg_keluar_iv_4);}
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_5 !== null) {$('#darah-yg-keluar-iv-5').val(darah_yg_keluar_iv.darah_yg_keluar_iv_5);}
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_6 !== null) {$('#darah-yg-keluar-iv-6').val(darah_yg_keluar_iv.darah_yg_keluar_iv_6);}
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_7 !== null) {$('#darah-yg-keluar-iv-7').val(darah_yg_keluar_iv.darah_yg_keluar_iv_7);}
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_8 !== null) {$('#darah-yg-keluar-iv-8').val(darah_yg_keluar_iv.darah_yg_keluar_iv_8);}
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_9 !== null) {$('#darah-yg-keluar-iv-9').val(darah_yg_keluar_iv.darah_yg_keluar_iv_9);}
                    if (darah_yg_keluar_iv.darah_yg_keluar_iv_10 !== null) {$('#darah-yg-keluar-iv-10').val(darah_yg_keluar_iv.darah_yg_keluar_iv_10);}

                    $('#tgl-grafik-sk').val(data.catatan_persalinan.tgl_grafik_sk);
                    $('#jam-grafik-sk').val(data.catatan_persalinan.jam_grafik_sk);
                    $('#keterangan-grafik-sk').val(data.catatan_persalinan.keterangan_grafik_sk);

                    // const waktujam = JSON.parse(data.catatan_persalinan.waktujam);  
                    // if (waktujam.waktujam_1 !== null) {$('#waktujam-1').val(waktujam.waktujam_1);}
                    // if (waktujam.waktujam_2 !== null) {$('#waktujam-2').val(waktujam.waktujam_2);}
                    // if (waktujam.waktujam_3 !== null) {$('#waktujam-3').val(waktujam.waktujam_3);}
                    // if (waktujam.waktujam_4 !== null) {$('#waktujam-4').val(waktujam.waktujam_4);}
                    // if (waktujam.waktujam_5 !== null) {$('#waktujam-5').val(waktujam.waktujam_5);}
                    // if (waktujam.waktujam_6 !== null) {$('#waktujam-6').val(waktujam.waktujam_6);}
                    // if (waktujam.waktujam_7 !== null) {$('#waktujam-7').val(waktujam.waktujam_7);}
                    // if (waktujam.waktujam_8 !== null) {$('#waktujam-8').val(waktujam.waktujam_8);}
                    // if (waktujam.waktujam_9 !== null) {$('#waktujam-9').val(waktujam.waktujam_9);}
                    // if (waktujam.waktujam_10 !== null) {$('#waktujam-10').val(waktujam.waktujam_10);}
                    // if (waktujam.waktujam_11 !== null) {$('#waktujam-11').val(waktujam.waktujam_11);}
                    // if (waktujam.waktujam_12 !== null) {$('#waktujam-12').val(waktujam.waktujam_12);}
                    // if (waktujam.waktujam_13 !== null) {$('#waktujam-13').val(waktujam.waktujam_13);}
                    // if (waktujam.waktujam_14 !== null) {$('#waktujam-14').val(waktujam.waktujam_14);}
                    // if (waktujam.waktujam_15 !== null) {$('#waktujam-15').val(waktujam.waktujam_15);}
                    // if (waktujam.waktujam_16 !== null) {$('#waktujam-16').val(waktujam.waktujam_16);}

                    if (data.catatan_persalinan.waktujam) {
                        const waktujam = JSON.parse(data.catatan_persalinan.waktujam);                      
                        if (waktujam && typeof waktujam === 'object') {
                            if (waktujam.waktujam_1 !== null) {$('#waktujam-1').val(waktujam.waktujam_1);}
                            if (waktujam.waktujam_2 !== null) {$('#waktujam-2').val(waktujam.waktujam_2);}
                            if (waktujam.waktujam_3 !== null) {$('#waktujam-3').val(waktujam.waktujam_3);}
                            if (waktujam.waktujam_4 !== null) {$('#waktujam-4').val(waktujam.waktujam_4);}
                            if (waktujam.waktujam_5 !== null) {$('#waktujam-5').val(waktujam.waktujam_5);}
                            if (waktujam.waktujam_6 !== null) {$('#waktujam-6').val(waktujam.waktujam_6);}
                            if (waktujam.waktujam_7 !== null) {$('#waktujam-7').val(waktujam.waktujam_7);}
                            if (waktujam.waktujam_8 !== null) {$('#waktujam-8').val(waktujam.waktujam_8);}
                            if (waktujam.waktujam_9 !== null) {$('#waktujam-9').val(waktujam.waktujam_9);}
                            if (waktujam.waktujam_10 !== null) {$('#waktujam-10').val(waktujam.waktujam_10);}
                            if (waktujam.waktujam_11 !== null) {$('#waktujam-11').val(waktujam.waktujam_11);}
                            if (waktujam.waktujam_12 !== null) {$('#waktujam-12').val(waktujam.waktujam_12);}
                            if (waktujam.waktujam_13 !== null) {$('#waktujam-13').val(waktujam.waktujam_13);}
                            if (waktujam.waktujam_14 !== null) {$('#waktujam-14').val(waktujam.waktujam_14);}
                            if (waktujam.waktujam_15 !== null) {$('#waktujam-15').val(waktujam.waktujam_15);}
                            if (waktujam.waktujam_16 !== null) {$('#waktujam-16').val(waktujam.waktujam_16);}
                        }
                    }

                }   
                   
                // GRAFIK PARTOGRAF
                if (typeof data.grafik_partograf !== 'undefined' || data.grafik_partograf !== null) {
                    grafikPtg(data.grafik_partograf, id_layanan_pendaftaran, id_pendaftaran, action);
                } else {
                    $('#tabel-partograf .body-table').empty();
                }

                // GRAFIK SERVIKS
                if (typeof data.grafik_serviks !== 'undefined' || data.grafik_serviks !== null) {
                    grafikSvk(data.grafik_serviks, id_layanan_pendaftaran, id_pendaftaran, action);
                } else {
                    $('#tabel-serviks .body-table').empty();
                }

                // GRAFIK NT
                if (typeof data.grafik_nt !== 'undefined' || data.grafik_nt !== null) {
                    grafikNt(data.grafik_nt, id_layanan_pendaftaran, id_pendaftaran, action);
                } else {
                    $('#tabel-nt .body-table').empty();
                }

                $('#bed-partograf').text(bed);
                $('#modal_partograf').modal('show');                 
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })

    } 

    // 
    function konfirmasiCetakFormPartograf(id_pendaftaran, id_layanan_pendaftaran){
        window.open('<?= base_url('pendaftaran_igd/cetak_form_partograf/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran,
        'Cetak Form Partograf', 'width=' + dWidth + ', height=' +
        dHeight +
        ', left=' + x + ', top=' + y);
    }


    function resetFormPartograf() {
        $('#form_partograf')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
    }

    function konfirmasiSimpanFormPartograf() {
        var stop = false;
        if (!stop) {
            var id_partograf = $('#id-partograf').val();
            var text;
            var btnTextConfirmpartograf;

            if (id_partograf) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmpartograf = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmpartograf = 'Simpan';
            }

            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmpartograf,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanFormPartograf();
                }
            });
        }
    }

    function simpanFormPartograf() {
        var id_layanan_pendaftaran_partograf = $('#id-layanan-pendaftaran-partograf').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_partograf") ?>',
            data: $('#form_partograf').serialize() + '&id-layanan-pendaftaran-partograf=' + id_layanan_pendaftaran_partograf,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-partograf').bwizard('show', data.respon.show);

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
                        $('#modal_partograf').modal('hide');
                        showListForm($('#id-pendaftaran-partograf').val(), $('#id-layanan-pendaftaran-partograf').val(), $('#id-pasien-partograf').val());
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
    

    $('#data-partograf').one('click', function() {
        $('#jam-partograf, #edit-jam-partograf, #pukul-mulas-partograf, #pukul-masuk-partograf, #pukul-pecah-partograf, #jam-serviks, #edit-jam-serviks')
        .on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false
            });
        })
    }) 


    $('#data-partograf').one('click', function() {
            $('#tanggal-partograf, #edit-tanggal-partograf, #tanggal-serviks, #edit-tanggal-serviks').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });
    })

    // GRAFIK PARTOGRAF
    var chart;
    var xAxisCategories = [];
    $('#btn-partograf-chart').on('click', function() {
        // Mengubah nilai field kosong menjadi null
        var denyutValue = $('#denyut-partograf').val() === '' ? null : parseFloat($('#denyut-partograf').val());
        var ajaxData = {
            denyut: denyutValue,
            id_layanan_pendaftaran: $('#id-layanan-pendaftaran-partograf').val(),
            id_pendaftaran: $('#id-pendaftaran-partograf').val(),
            id_user: <?= $this->session->userdata("id_translucent") ?>
        };

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_grafik_partograf") ?>',
            data: ajaxData,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                hideLoader(); // Hide loader before calling grafik function
                if (data.respon !== null) {
                    grafikPtg(data); // Call grafik function here
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });

        $('#denyut-partograf').val('');
    });

    // GRAFIK PARTOGRAF
    // function grafikPtg(data, id_layanan_pendaftaran, id_pendaftaran, action) {   
        
    //     // Mengubah data denyut jantung ke float dengan mengganti koma menjadi titik
    //     var denyutData = data.map((v) => parseFloat(v.denyut_partograf.replace(',', '.')));

    //     // console.log(denyutData);
    
    //     // Mengurutkan data berdasarkan denyut_partograf dan kepala_serviks dari terbesar ke terkecil
    //     data.sort((a, b) => parseFloat(b.denyut_partograf.replace(',', '.')) - parseFloat(a.denyut_partograf.replace(',', '.')));
    
    //     var options = {
    //         title: {
    //             text: 'Grafik Partograf', // Judul grafik
    //             style: { fontSize: '15px', fontWeight: 'bold', color: '#333333' } // Gaya teks judul
    //         },
    //         chart: {
    //             height: '400px', // Kurangi tinggi chart
    //             type: 'spline', // Tipe chart spline untuk garis melengkung
    //             // type: 'areaspline', // Tipe chart spline untuk garis melengkung
    //             backgroundColor: '#f4f4f4', // Warna latar belakang chart
    //             borderColor: '#ccc', // Warna border chart
    //             borderWidth: 1, // Lebar border chart
    //             plotShadow: true, // Memberikan efek bayangan pada plot
    //             plotBorderWidth: 1, // Lebar border plot
    //             plotBorderColor: '#ccc', // Warna border plot
    //             shadow: { color: 'rgba(0, 0, 0, 0.1)', offsetX: 3, offsetY: 3, opacity: 0.7, width: 5 }, // Efek bayangan
    //             animation: { duration: 2000, easing: 'easeOutBounce' }, // Efek animasi saat loading chart
    //             resetZoomButton: { position: { x: -110, y: 10 } } // Posisi tombol reset zoom
    //         },

    //         yAxis: {
    //             title: {
    //                 text: 'Denyut Jantung<br>Janin (x/menit)',
    //                 align: 'middle', // Align the title in the middle
    //                 rotation: -90, // Rotate the title to face upwards
    //                 x: 0, // Adjust the horizontal position
    //                 useHTML: true // Enable HTML in the title
    //             },
    //             accessibility: {
    //                 rangeDescription: 'Range: 60 to 180 cm.'
    //             },
    //             lineWidth: 2,
    //             min: 80,
    //             max: 200,
    //             tickInterval: 10, // Interval tick pada sumbu y
    //             gridLineWidth: 1, // Lebar garis grid sumbu y
    //             gridLineColor: '#e6e6e6' // Warna garis grid sumbu y
    //         },


    //         xAxis: {
    //             min: 0,
    //             max: 25,
    //             tickInterval: 1,
    //             gridLineWidth: 1,
    //             gridLineColor: '#e6e6e6',
    //             title: {
    //                 text: '',
    //                 align: 'middle'
    //             },
    //             accessibility: {
    //                 rangeDescription: 'Range: 0 to 25 hours.'
    //             },
    //             labels: {
    //                 formatter: function() {
    //                     // Return empty string for numbers between 1 and 25
    //                     if (this.value >= 1 && this.value <= 25) {
    //                         return '';
    //                     }
    //                     return '' + this.value;
    //                 }
    //             }
    //         },
    //         series: [
    //             {
    //                 name: 'Denyut Jantung Janin', // Nama seri
    //                 data: denyutData, // Data seri
    //                 marker: { symbol: 'circle', radius: 5 }, // Gaya marker
    //                 lineWidth: 2, // Lebar garis
    //                 shadow: true, // Efek bayangan pada garis
    //                 color: '#ff0000', // Warna garis merah
    //                 zones: [{ value: 120, color: '#ff0000' }, { value: 160, color: '#ff0000' }, { color: '#ff0000' }], // Warna zona garis
    //                 states: { hover: { lineWidth: 2 } } // Gaya saat hover
    //             },
    //         ],
    //         tooltip: {
    //             headerFormat: '<b>{series.name}</b><br>', // Format header tooltip
    //             pointFormat: '{point.y} (x/menit)', // Format poin tooltip
    //             backgroundColor: 'rgba(255,255,255,0.95)', // Warna latar belakang tooltip
    //             borderColor: '#ccc', // Warna border tooltip
    //             borderRadius: 10, // Radius border tooltip
    //             style: { fontSize: '10px' }, // Gaya teks tooltip
    //             shadow: true // Efek bayangan pada tooltip
    //         },
    //         legend: {
    //             enabled: true, // Mengaktifkan legenda
    //             itemStyle: { fontSize: '14px', fontWeight: 'bold' } // Gaya teks legenda
    //         },
    //         plotOptions: {
    //             series: {
    //                 dataLabels: {
    //                     enabled: true, // Mengaktifkan label data
    //                     format: '{point.y}', // Format label data
    //                     style: { fontSize: '12px', color: '#000000', textOutline: '1px contrast' } // Gaya teks label data
    //                 },
    //                 enableMouseTracking: true, // Mengaktifkan tracking mouse
    //                 marker: {
    //                     enabled: true, // Mengaktifkan marker
    //                     radius: 4, // Radius marker
    //                     states: { hover: { enabled: true, radius: 6 } } // Gaya marker saat hover
    //                 }
    //             }
    //         }
    //     };
    //     Highcharts.chart('grafik_partograf', options); // Membuat chart dengan opsi yang telah diset
    //     grafikPortograf(data, action); // Memanggil fungsi grafikPortograf dengan data dan action
    // }

    function filterEmptyValues(dataArray) {
        return dataArray.filter(value => value !== '');
    }

    // GRAFIK PARTOGRAF
    function grafikPtg(data, id_layanan_pendaftaran, id_pendaftaran, action) {   
        function processData(value) {
            if (value === null || value === '' || isNaN(parseFloat(value.replace(',', '.')))) {
                return '';
            }
            return parseFloat(value.replace(',', '.'));
        }

        var denyutData = filterEmptyValues(data.map(v => processData(v.denyut_partograf)));

        // var maxDataLength = denyutData.length > 0 ? denyutData.length - 1 : 25; // Menyesuaikan panjang sumbu X
        var maxDataLength = denyutData.length > 0 ? Math.max(denyutData.length - 1, 31) : 31;


        var options = {
            title: {
                text: 'Grafik Partograf',
                style: { fontSize: '15px', fontWeight: 'bold', color: '#333333' }
            },
            chart: {
                height: '400px',
                type: 'spline',
                backgroundColor: '#f4f4f4',
                borderColor: '#ccc',
                borderWidth: 1,
                plotShadow: true,
                plotBorderWidth: 1,
                plotBorderColor: '#ccc',
                shadow: { color: 'rgba(0, 0, 0, 0.1)', offsetX: 3, offsetY: 3, opacity: 0.7, width: 5 },
                animation: { duration: 2000, easing: 'easeOutBounce' },
                resetZoomButton: { position: { x: -110, y: 10 } }
            },

            yAxis: {
                title: {
                    text: 'Denyut Jantung<br>Janin (x/menit)',
                    align: 'middle',
                    rotation: -90,
                    x: 0,
                    useHTML: true
                },
                min: 80,
                max: 200,
                tickInterval: 10,
                gridLineWidth: 1,
                gridLineColor: '#e6e6e6'
            },

            xAxis: {
                min: 0,
                max: maxDataLength, // Menyesuaikan dengan panjang data
                tickInterval: 1,
                gridLineWidth: 1,
                gridLineColor: '#e6e6e6',
                labels: {
                    formatter: function() {
                        return '' + this.value;
                    }
                }
            },
            series: [
                {
                    name: 'Denyut Jantung Janin',
                    data: denyutData,
                    marker: { symbol: 'circle', radius: 5 },
                    lineWidth: 2,
                    shadow: true,
                    color: '#ff0000',
                    zones: [
                        { value: 120, color: '#ff0000' },
                        { value: 160, color: '#ff0000' },
                        { color: '#ff0000' }
                    ],
                    states: { hover: { lineWidth: 2 } }
                },
            ],

            tooltip: {
                headerFormat: '<b>{series.name}</b><br>',
                pointFormat: '{point.y} (x/menit)',
                backgroundColor: 'rgba(255,255,255,0.95)',
                borderColor: '#ccc',
                borderRadius: 10,
                style: { fontSize: '10px' },
                shadow: true
            },

            legend: {
                enabled: true,
                itemStyle: { fontSize: '14px', fontWeight: 'bold' }
            },

            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}',
                        style: { fontSize: '12px', color: '#000000', textOutline: '1px contrast' }
                    },
                    enableMouseTracking: true,
                    marker: {
                        enabled: true,
                        radius: 4,
                        states: { hover: { enabled: true, radius: 6 } }
                    }
                }
            }
        };

        Highcharts.chart('grafik_partograf', options);
        grafikPortograf(data, action);
    }


    // GRAFIK PARTOGRAF
    function grafikPortograf(data, action) {
        if (data != null) {
            $('#tabel-partograf .body-table').empty(); // Kosongkan tabel sebelum mengisi ulang
            $.each(data, function (i, v) {
                let html = /* html */ `
                <tr class="row-in-${i + 1}">
                    <td class="number-monitoring" align="center">${i + 1}</td>
                    <td align="center"> 
                        <span>${v.denyut_partograf}</span> 
                        <input type="hidden" class="custom-form denyut-edit clear-input d-inline-block col-lg-3" value="${v.denyut_partograf}">
                    </td>
                    
                    <td align="center"> 
                        <span>${v.nama_petugas}</span> 
                        <input type="hidden" class="custom-form nama-edit clear-input d-inline-block col-lg-3" value="${v.nama_petugas}">
                    </td>
                    <td align="center" class="alatGrafik">
                        <button type="button" class="btn btn-secondary btn-xxs edit-button" onclick="editGrafikPartograf('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="konfirmHapusGrafikPartograf('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')" index="${i}" denyut="${v.denyut_partograf}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                `;
                $('#tabel-partograf .body-table').append(html);
                var groupAccount = '<?= $this->session->userdata('account_group') ?>';
                var profesi = '<?= $this->session->userdata('profesinadis') ?>';
                if (groupAccount == 'Admin') {
                    profesi = 'Perawat';
                }
                if (action !== 'lihat' ) {
                    $('.alatGrafik').show();
                } else {
                    $('.alatGrafik').hide();
                }
            });
        }

    }

    // GRAFIK PARTOGRAF
    function konfirmHapusGrafikPartograf(id, id_layanan_pendaftaran, id_pendaftaran) {
        swal.fire({
            title: 'Hapus Data',
            text: "Apakah anda yakin akan menghapus ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                hapusGrafikPartograf(id, id_layanan_pendaftaran, id_pendaftaran);
            }
        })
    }

    // GRAFIK PARTOGRAF
    function hapusGrafikPartograf(id, id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'DELETE',
            url: '<?= base_url("pelayanan/api/pelayanan/hapus_grafik_partograf") ?>/' + id + '/' + id_layanan_pendaftaran + '/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader(); 
                if (data.respon !== null) {
                    grafikPtg(data); 
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });
    }

    // GRAFIK PARTOGRAF
    function editGrafikPartograf(id, id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_grafik_partograf_by_id") ?>/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#modal-edit-grafik-partograf').modal('show');

                $('#edit-id-partograf').val(data.id);
                $('#edit-id-layanan-pendaftaran-partograf').val(data.id_layanan_pendaftaran);
                $('#edit-id-pendaftaran-partograf').val(data.id_pendaftaran);
                $('#edit-denyut-partograf').val(data.denyut_partograf);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

        $('#btn-update-grafik-partograf').on('click', function() {


            var id = $('#edit-id-partograf').val();
            // var denyutValue = $('#edit-denyut-partograf').val() === '' ? null : parseInt($('#edit-denyut-partograf').val()); // agar di update ada komanya harus pakek  parseFloat
            var denyutValue = $('#edit-denyut-partograf').val() === '' ? null : parseFloat($('#edit-denyut-partograf').val());
            var idLayananPendaftaranValue = $('#edit-id-layanan-pendaftaran-partograf').val();
            var idPendaftaranValue = $('#edit-id-pendaftaran-partograf').val();
            var idUserValue = <?= $this->session->userdata("id_translucent") ?>; // Add this line

            if (isNaN(denyutValue)) {
                console.error("Invalid input values for denyut.");
                return;
            }

            var ajaxData = {
                id: id,
                denyut_edit: denyutValue,
                id_layanan_pendaftaran: idLayananPendaftaranValue,
                id_pendaftaran: idPendaftaranValue,
                id_user: idUserValue
            };

            $.ajax({
                type: 'POST',
                url: '<?= base_url("pelayanan/api/pelayanan/update_grafik_partograf") ?>',
                data: ajaxData,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    hideLoader(); 
                    $('#modal-edit-grafik-partograf').modal('hide');
                    if (data.respon !== null) {
                        grafikPtg(data); 
                    }
                },
                error: function(e) {
                    console.error("AJAX Error:", e);
                    hideLoader(); 
                    messageAddFailed();
                }
            });
        });
    }


    // GRAFIK SERVIKS 1
    // function syams_validation(selector, message) {
    //     $(selector).css('border', '1px solid red');
    //     $(selector).next('.validation-message').remove(); // Remove any existing validation messages
    //     $(selector).after('<div class="validation-message" style="color: red;">' + message + '</div>');
    // }

    // function syams_validation_remove(selector) {
    //     $(selector).css('border', '');
    //     $(selector).next('.validation-message').remove(); // Remove validation message
    // }

    // GRAFIK SERVIKS 1
    var chart;
    var xAxisCategories = [];
    $('#btn-serviks-chart').on('click', function() {
        var valid = true;

        // Validation
        if ($('#number-serviks').val() === null) {
            syams_validation('#number-serviks', 'Anda Belum Memilih Angka.');
            valid = false;
        } else {
            syams_validation_remove('#number-serviks');
        }

        // If validation fails, do not proceed
        if (!valid) {
            return false;
        }

        var NumberValue = $('#number-serviks').val() === '' ? null : parseFloat($('#number-serviks').val());
        var ServiksValue = $('#pembukaan-serviks').val() === '' ? null : parseFloat($('#pembukaan-serviks').val());
        var KepalaValue = $('#kepala-serviks').val() === '' ? null : parseFloat($('#kepala-serviks').val());
        var ajaxData = {
            Number: NumberValue,
            Serviks: ServiksValue,
            Kepala: KepalaValue,
            id_layanan_pendaftaran: $('#id-layanan-pendaftaran-partograf').val(),
            id_pendaftaran: $('#id-pendaftaran-partograf').val(),
            id_user: <?= $this->session->userdata("id_translucent") ?>
        };
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_grafik_serviks") ?>',
            data: ajaxData,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader(); // Hide loader before calling grafik function
                if (data.respon !== null) {
                    grafikSvk(data); // Call grafik function here
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });

        // Reset form fields
        $('#number-serviks').val('');
        $('#pembukaan-serviks').val('');
        $('#kepala-serviks').val('');
    });


    // GRAFIK SERVIKS 1
    function grafikSvk(data, id_layanan_pendaftaran, id_pendaftaran, action) {
        var kepalaData = data
            .map(v => {
                const numberServiks = v.number_serviks ? parseFloat(v.number_serviks.replace(',', '.')) : null;
                const kepalaServiks = v.kepala_serviks ? parseFloat(v.kepala_serviks.replace(',', '.')) : null;
                return { numberServiks, kepalaServiks };
            })
            .filter(({ numberServiks, kepalaServiks }) => numberServiks !== null && kepalaServiks !== null)
            .map(({ numberServiks, kepalaServiks }) => [numberServiks, kepalaServiks]); // Format array of pairs
        // console.log('Kepala Data:', kepalaData);

        var serviksData = data
            .map(v => {
                const numberServiks = v.number_serviks ? parseFloat(v.number_serviks.replace(',', '.')) : null;
                const pembukaanServiks = v.pembukaan_serviks ? parseFloat(v.pembukaan_serviks.replace(',', '.')) : null;
                return { numberServiks, pembukaanServiks };
            })
            .filter(({ numberServiks, pembukaanServiks }) => numberServiks !== null && pembukaanServiks !== null)
            .map(({ numberServiks, pembukaanServiks }) => [numberServiks, pembukaanServiks]); // Format array of pairs
        // Menampilkan hasil
        // console.log('Serviks Data:', serviksData);

        // var options = {
        //     chart: {
        //         height: '400px',
        //         type: 'spline',
        //         // type: 'areaspline',
        //         backgroundColor: '#f4f4f4',
        //         borderColor: '#ccc',
        //         borderWidth: 1,
        //         plotShadow: true,
        //         plotBorderWidth: 1,
        //         plotBorderColor: '#ccc',
        //         shadow: { color: 'rgba(0, 0, 0, 0.1)', offsetX: 3, offsetY: 3, opacity: 0.7, width: 5 },
        //         animation: { duration: 2000, easing: 'easeOutBounce' },
        //         resetZoomButton: { position: { x: -110, y: 10 } }
        //     },
        //     title: {
        //         text: 'Grafik Serviks',
        //         align: 'center',
        //         style: {
        //             fontSize: '15px',
        //             fontWeight: 'bold',
        //             color: '#333333'
        //         }
        //     },
        //     yAxis: {
        //         title: {
        //             text: 'Pembukaan serviks(cm) beri tanda X<br/>Turunnya kepala (beri tanda O)<br/>sentimeter (cm)',
        //             align: 'middle',
        //             rotation: -90,
        //             x: 0
        //         },
        //         accessibility: {
        //             rangeDescription: 'Range: 0 to 10 cm.'
        //         },
        //         lineWidth: 2,
        //         min: 0,
        //         max: 10,
        //         tickInterval: 1,
        //         gridLineWidth: 1,
        //         gridLineColor: '#e6e6e6'
        //     },
        //     // xAxis: {
        //     //     min: 0,
        //     //     max: 16,
        //     //     tickInterval: 1,
        //     //     gridLineWidth: 1,
        //     //     gridLineColor: '#e6e6e6',
        //     //     title: {
        //     //         text: '',
        //     //         align: 'middle'
        //     //     },
        //     //     accessibility: {
        //     //         rangeDescription: 'Range: 0 to 16 hours.'
        //     //     },
        //     //     labels: {
        //     //         formatter: function() {
        //     //             return '' + this.value;
        //     //         }
        //     //     }
        //     // },

        //     xAxis: {
        //         min: 0,
        //         max: 16,
        //         tickInterval: 1,
        //         minorTickInterval: 0.5, // Tambah garis di tengah-tengah
        //         minorGridLineWidth: 1, // Biar kelihatan jelas
        //         minorGridLineColor: '#d9d9d9', // Warna abu-abu muda biar ga terlalu mencolok
        //         gridLineWidth: 1,
        //         gridLineColor: '#e6e6e6',
        //         title: {
        //             text: '',
        //             align: 'middle'
        //         },
        //         accessibility: {
        //             rangeDescription: 'Range: 0 to 16 hours.'
        //         },
        //         labels: {
        //             formatter: function() {
        //                 return '' + this.value;
        //             }
        //         }
        //     },
        //     series: [
        //         {
        //             name: '<span style="font-size:16px;">(X)</span>',
        //             data: serviksData,
        //             marker: {
        //                 symbol: 'url(data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"%3E%3Cline x1="1" y1="1" x2="11" y2="11" stroke="red" stroke-width="2"/%3E%3Cline x1="11" y1="1" x2="1" y2="11" stroke="red" stroke-width="2"/%3E%3C/svg%3E)',
        //                 radius: 0 // Radius harus 0 jika menggunakan simbol kustom
        //             },
        //             lineWidth: 2,
        //             shadow: true,
        //             color: '#ff0000',
        //             states: { hover: { lineWidth: 2 } }
        //         },


        //         {
        //             name: 'Dummy Data',
        //             data: [3.8, 4.8, 5.8, 6.8, 7.8, 8.8, 9.8, 10.8],
        //             marker: { enabled: false },
        //             lineWidth: 3,
        //             shadow: false,
        //             color: '#666666',
        //             enableMouseTracking: false,
        //             showInLegend: false
        //         },
        //         {
        //             name: '',
        //             type: 'scatter',
        //             data: [12, 12, 7, 12, 12],
        //             marker: { enabled: false },
        //             showInLegend: false,
        //             dataLabels: {
        //                 enabled: true,
        //                 format: 'W A S P A D A',
        //                 align: 'left',
        //                 style: {
        //                     color: '#CCCCCC',
        //                     fontWeight: 'bold',
        //                     fontSize: '20px'
        //                 },
        //                 allowOverlap: true,
        //                 rotation: 337,
        //                 verticalAlign: 'middle',
        //                 y: 20
        //             }
        //         },
        //         {
        //             name: 'Dummy Data',
        //             data: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        //             marker: { enabled: false },
        //             lineWidth: 3,
        //             shadow: false,
        //             color: '#666666',
        //             enableMouseTracking: false,
        //             showInLegend: false,
        //             zones: [{
        //                 value: 4,
        //                 color: 'rgba(0, 0, 0, 0)'
        //             }, {
        //                 color: '#666666'
        //             }]
        //         },
        //         {
        //             name: '',
        //             type: 'scatter',
        //             data: [12, 12, 12, 12, 12, 12, 6, 12, 12, 12, 12, 12],
        //             marker: { enabled: false },
        //             showInLegend: false,
        //             dataLabels: {
        //                 enabled: true,
        //                 format: 'B E R T I N D A K',
        //                 align: 'left',
        //                 style: {
        //                     color: '#CCCCCC',
        //                     fontWeight: 'bold',
        //                     fontSize: '20px'
        //                 },
        //                 allowOverlap: true,
        //                 rotation: 337,
        //                 verticalAlign: 'middle',
        //                 y: -10
        //             }
        //         },

        //         {
        //             name: '<span style="font-size:16px;">(O)</span>',
        //             data: kepalaData,
        //             marker: {
        //                 symbol: 'circle', // Menggunakan simbol square untuk dasar marker
        //                 radius: 6, // Sesuaikan ukuran sesuai kebutuhan
        //                 fillColor: 'transparent', // Membuat latar belakang transparan
        //                 lineWidth: 2, // Menyesuaikan ketebalan garis
        //                 lineColor: '#0000ff' // Warna garis untuk marker
        //             },
        //             lineWidth: 2,
        //             shadow: true,
        //             color: '#0000ff',
        //             zones: [{ value: 120, color: '#0000ff' }, { value: 160, color: '#0000ff' }, { color: '#0000ff' }],
        //             states: { hover: { lineWidth: 2 } }
        //         },
        //     ],
        //     tooltip: {
        //         headerFormat: '<b>{series.name}</b><br>',
        //         pointFormat: '{point.y}',
        //         backgroundColor: 'rgba(255,255,255,0.95)',
        //         borderColor: '#ccc',
        //         borderRadius: 10,
        //         style: { fontSize: '10px' },
        //         shadow: true
        //     },
        // };




        var options = {
            chart: {
                height: '400px',
                type: 'spline',
                // type: 'areaspline',
                backgroundColor: '#f4f4f4',
                borderColor: '#ccc',
                borderWidth: 1,
                plotShadow: true,
                plotBorderWidth: 1,
                plotBorderColor: '#ccc',
                shadow: { color: 'rgba(0, 0, 0, 0.1)', offsetX: 3, offsetY: 3, opacity: 0.7, width: 5 },
                animation: { duration: 2000, easing: 'easeOutBounce' },
                resetZoomButton: { position: { x: -110, y: 10 } }
            },
            title: {
                text: 'Grafik Serviks',
                align: 'center',
                style: {
                    fontSize: '15px',
                    fontWeight: 'bold',
                    color: '#333333'
                }
            },
            yAxis: {
                title: {
                    text: 'Pembukaan serviks(cm) beri tanda X<br/>Turunnya kepala (beri tanda O)<br/>sentimeter (cm)',
                    align: 'middle',
                    rotation: -90,
                    x: 0
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 10 cm.'
                },
                lineWidth: 2,
                min: 0,
                max: 10,
                tickInterval: 1,
                gridLineWidth: 1,
                gridLineColor: '#e6e6e6'
            },

            xAxis: {
                min: 0,
                max: 16,
                tickInterval: 1,
                minorTickInterval: 0.5, // Tambah garis di tengah-tengah
                minorGridLineWidth: 1, // Biar kelihatan jelas
                minorGridLineColor: '#d9d9d9', // Warna abu-abu muda biar ga terlalu mencolok
                gridLineWidth: 1,
                gridLineColor: '#e6e6e6',
                title: {
                    text: '',
                    align: 'middle'
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 16 hours.'
                },
                labels: {
                    formatter: function() {
                        return '' + this.value;
                    }
                }
            },




            series: [
                {
                    name: '<span style="font-size:16px;">(X)</span>',
                    data: serviksData,
                    marker: {
                        symbol: 'url(data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"%3E%3Cline x1="1" y1="1" x2="11" y2="11" stroke="red" stroke-width="2"/%3E%3Cline x1="11" y1="1" x2="1" y2="11" stroke="red" stroke-width="2"/%3E%3C/svg%3E)',
                        radius: 0 // Radius harus 0 jika menggunakan simbol kustom
                    },
                    lineWidth: 2,
                    shadow: true,
                    color: '#ff0000',
                    states: { hover: { lineWidth: 2 } }
                },


                {
                    name: 'Dummy Data',
                    data: [3.8, 4.8, 5.8, 6.8, 7.8, 8.8, 9.8, 10.8],
                    marker: { enabled: false },
                    lineWidth: 3,
                    shadow: false,
                    color: '#666666',
                    enableMouseTracking: false,
                    showInLegend: false
                },
                {
                    name: '',
                    type: 'scatter',
                    data: [12, 12, 7, 12, 12],
                    marker: { enabled: false },
                    showInLegend: false,
                    dataLabels: {
                        enabled: true,
                        format: 'W A S P A D A',
                        align: 'left',
                        style: {
                            color: '#CCCCCC',
                            fontWeight: 'bold',
                            fontSize: '20px'
                        },
                        allowOverlap: true,
                        rotation: 337,
                        verticalAlign: 'middle',
                        y: 20
                    }
                },
                {
                    name: 'Dummy Data',
                    data: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
                    marker: { enabled: false },
                    lineWidth: 3,
                    shadow: false,
                    color: '#666666',
                    enableMouseTracking: false,
                    showInLegend: false,
                    zones: [{
                        value: 4,
                        color: 'rgba(0, 0, 0, 0)'
                    }, {
                        color: '#666666'
                    }]
                },
                {
                    name: '',
                    type: 'scatter',
                    data: [12, 12, 12, 12, 12, 12, 6, 12, 12, 12, 12, 12],
                    marker: { enabled: false },
                    showInLegend: false,
                    dataLabels: {
                        enabled: true,
                        format: 'B E R T I N D A K',
                        align: 'left',
                        style: {
                            color: '#CCCCCC',
                            fontWeight: 'bold',
                            fontSize: '20px'
                        },
                        allowOverlap: true,
                        rotation: 337,
                        verticalAlign: 'middle',
                        y: -10
                    }
                },

                {
                    name: '<span style="font-size:16px;">(O)</span>',
                    data: kepalaData,
                    marker: {
                        symbol: 'circle', // Menggunakan simbol square untuk dasar marker
                        radius: 6, // Sesuaikan ukuran sesuai kebutuhan
                        fillColor: 'transparent', // Membuat latar belakang transparan
                        lineWidth: 2, // Menyesuaikan ketebalan garis
                        lineColor: '#0000ff' // Warna garis untuk marker
                    },
                    lineWidth: 2,
                    shadow: true,
                    color: '#0000ff',
                    zones: [{ value: 120, color: '#0000ff' }, { value: 160, color: '#0000ff' }, { color: '#0000ff' }],
                    states: { hover: { lineWidth: 2 } }
                },
            ],
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>',
                pointFormat: '{point.y}',
                backgroundColor: 'rgba(255,255,255,0.95)',
                borderColor: '#ccc',
                borderRadius: 10,
                style: { fontSize: '10px' },
                shadow: true
            },
        };

        Highcharts.chart('grafik_serviks', options);
        grafikServiks(data, action);
    }
 
    function grafikServiks(data, action) {
        if (data != null) {
            $('#tabel-serviks .body-table').empty(); // Kosongkan tabel sebelum mengisi ulang
            $.each(data, function (i, v) {
                let html = /* html */ `
                <tr class="row-in-${i + 1}">
                    <td class="number-monitoring" align="center">${i + 1}</td>                                                     
                     <td align="center">
                        <span>${v.number_serviks ? v.number_serviks : '-'}</span>
                        <input type="hidden" class="custom-form edit-number-serviks clear-input d-inline-block col-lg-3" value="${v.number_serviks ? v.number_serviks : ''}">
                    </td>
                    <td align="center">
                        <span>${v.pembukaan_serviks ? v.pembukaan_serviks : '-'}</span>
                        <input type="hidden" class="custom-form edit-pembukaan-serviks clear-input d-inline-block col-lg-3" value="${v.pembukaan_serviks ? v.pembukaan_serviks : ''}">
                    </td>                   
                    <td align="center">
                        <span>${v.kepala_serviks ? v.kepala_serviks : '-'}</span>
                        <input type="hidden" class="custom-form edit-kepala-serviks clear-input d-inline-block col-lg-3" value="${v.kepala_serviks ? v.kepala_serviks : ''}">
                    </td>                 
                    <td align="center"> <span>${v.nama_petugas}</span> <input type="hidden" class="custom-form jam-edit clear-input d-inline-block col-lg-3" value="${v.nama_petugas}"></td>
                    <td align="center" class="alatGrafik">
                        <button type="button" class="btn btn-secondary btn-xxs edit-button" onclick="editGrafikServiks('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="konfirmHapusGrafikServiks('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')" index="${i}" number="${v.number_serviks}" serviks="${v.pembukaan_serviks}" kepala="${v.kepala_serviks}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                `;
                $('#tabel-serviks .body-table').append(html);
                var groupAccount = '<?= $this->session->userdata('account_group') ?>';
                var profesi = '<?= $this->session->userdata('profesinadis') ?>';
                if (groupAccount == 'Admin') {
                    profesi = 'Perawat';
                }
                if (action !== 'lihat' ) {
                    $('.alatGrafik').show();
                } else {
                    $('.alatGrafik').hide();
                }
            });
        }
    }

    // GRAFIK SERVIKS 1
    function konfirmHapusGrafikServiks(id, id_layanan_pendaftaran, id_pendaftaran) {
        swal.fire({
            title: 'Hapus Data',
            text: "Apakah anda yakin akan menghapus ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                hapusGrafikServiks(id, id_layanan_pendaftaran, id_pendaftaran);
            }
        })
    }

    // GRAFIK SERVIKS 1
    function hapusGrafikServiks(id, id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'DELETE',
            url: '<?= base_url("pelayanan/api/pelayanan/hapus_grafik_serviks") ?>/' + id + '/' + id_layanan_pendaftaran + '/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader(); 
                if (data.respon !== null) {
                    grafikSvk(data); 
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });
    }

    // GRAFIK SERVIKS 1
    function editGrafikServiks(id, id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_grafik_serviks_by_id") ?>/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#modal-edit-grafik-serviks').modal('show');
                $('#edit-id-serviks').val(data.id);
                $('#edit-id-layanan-pendaftaran-serviks').val(data.id_layanan_pendaftaran);
                $('#edit-id-pendaftaran-serviks').val(data.id_pendaftaran);
                $('#edit-number-serviks').val(data.number_serviks);
                $('#edit-pembukaan-serviks').val(data.pembukaan_serviks);
                $('#edit-kepala-serviks').val(data.kepala_serviks);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

        $('#btn-update-grafik-serviks').on('click', function() {
            var id = $('#edit-id-serviks').val();
            var NumberValue = $('#edit-number-serviks').val() === '' ? null : parseFloat($('#edit-number-serviks').val());
            var ServiksValue = $('#edit-pembukaan-serviks').val() === '' ? null : parseFloat($('#edit-pembukaan-serviks').val());
            var KepalaValue = $('#edit-kepala-serviks').val() === '' ? null : parseFloat($('#edit-kepala-serviks').val());
            var idLayananPendaftaranValue = $('#edit-id-layanan-pendaftaran-serviks').val();
            var idPendaftaranValue = $('#edit-id-pendaftaran-serviks').val();
            var idUserValue = <?= $this->session->userdata("id_translucent") ?>; // Add this line

            if (isNaN(NumberValue)) {
                console.error("Invalid input values for serviks.");
                return;
            }
            
            if (isNaN(ServiksValue)) {
                console.error("Invalid input values for serviks.");
                return;
            }

            if (isNaN(KepalaValue)) {
                console.error("Invalid input values for kepala.");
                return;
            }

            var ajaxData = {
                id: id,
                Number: NumberValue,
                Serviks: ServiksValue,
                Kepala: KepalaValue,
                id_layanan_pendaftaran: idLayananPendaftaranValue,
                id_pendaftaran: idPendaftaranValue,
                id_user: idUserValue
            };

            $.ajax({
                type: 'POST',
                url: '<?= base_url("pelayanan/api/pelayanan/update_grafik_serviks") ?>',
                data: ajaxData,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    hideLoader(); 
                    $('#modal-edit-grafik-serviks').modal('hide');
                    if (data.respon !== null) {
                        grafikSvk(data); 
                    }
                },
                error: function(e) {
                    console.error("AJAX Error:", e);
                    hideLoader(); 
                    messageAddFailed();
                }
            });
        });
    }

    // WARNA   
    function changeColor(cellId, checkboxId) {
        var warna = document.getElementById(cellId);
        var checkbox = document.getElementById(checkboxId);

        if (checkbox.checked) {
            switch (checkboxId) {
                case 'putih_1':
                case 'putih_2':
                case 'putih_3':
                case 'putih_4':
                case 'putih_5':
                case 'putih_6':
                case 'putih_7':
                case 'putih_8':
                case 'putih_9':
                case 'putih_10':
                case 'putih_11':
                case 'putih_12':
                case 'putih_13':
                case 'putih_14':
                case 'putih_15':
                case 'putih_16':
                case 'putih_17':
                case 'putih_18':
                case 'putih_19':
                case 'putih_20':
                case 'putih_21':
                case 'putih_22':
                case 'putih_23':
                case 'putih_24':
                case 'putih_25':
                case 'putih_26':
                case 'putih_27':
                case 'putih_28':
                case 'putih_29':
                case 'putih_30':
                case 'putih_31':
                case 'putih_32':
                case 'putih_33':
                case 'putih_34':
                case 'putih_35':
                case 'putih_36':
                case 'putih_37':
                case 'putih_38':
                case 'putih_39':
                case 'putih_40':
                case 'putih_41':
                case 'putih_42':
                case 'putih_43':
                case 'putih_44':
                case 'putih_45':
                case 'putih_46':
                case 'putih_47':
                case 'putih_48':
                case 'putih_49':
                case 'putih_50':
                case 'putih_51':
                case 'putih_52':
                case 'putih_53':
                case 'putih_54':
                case 'putih_55':
                case 'putih_56':
                case 'putih_57':
                case 'putih_58':
                case 'putih_59':
                case 'putih_60':
                case 'putih_61':
                case 'putih_62':
                case 'putih_63':
                case 'putih_64':
                case 'putih_65':
                case 'putih_66':
                case 'putih_67':
                case 'putih_68':
                case 'putih_69':
                case 'putih_70':
                case 'putih_71':
                case 'putih_72':
                case 'putih_73':
                case 'putih_74':
                case 'putih_75':
                case 'putih_76':
                case 'putih_77':
                case 'putih_78':
                case 'putih_79':
                case 'putih_80':
                case 'putih_81':
                case 'putih_82':
                case 'putih_83':
                case 'putih_84':
                case 'putih_85':

                case 'putih_86':
                case 'putih_87':
                case 'putih_88':
                case 'putih_89':
                case 'putih_90':
                case 'putih_91':
                case 'putih_92':
                case 'putih_93':
                case 'putih_94':
                case 'putih_95':
                case 'putih_96':
                case 'putih_97':
                case 'putih_98':
                case 'putih_99':
                case 'putih_100':
                case 'putih_101':
                case 'putih_102':
                case 'putih_103':
                case 'putih_104':
                case 'putih_105':
                case 'putih_106':
                case 'putih_107':
                case 'putih_108':
                case 'putih_109':
                case 'putih_110':
                case 'putih_111':
                case 'putih_112':
                case 'putih_113':
                case 'putih_114':
                case 'putih_115':
                case 'putih_116':
                case 'putih_117':
                case 'putih_118':
                case 'putih_119':
                case 'putih_120':
                case 'putih_121':
                case 'putih_122':
                case 'putih_123':
                case 'putih_124':
                case 'putih_125':
                case 'putih_126':
                case 'putih_127':
                case 'putih_128':
                case 'putih_129':
                case 'putih_130':
                case 'putih_131':
                case 'putih_132':
                case 'putih_133':
                case 'putih_134':
                case 'putih_135':
                case 'putih_136':
                case 'putih_137':
                case 'putih_138':
                case 'putih_139':
                case 'putih_140':
                case 'putih_141':
                case 'putih_142':
                case 'putih_143':
                case 'putih_144':
                case 'putih_145':
                case 'putih_146':
                case 'putih_147':
                case 'putih_148':
                case 'putih_149':
                case 'putih_150':
                case 'putih_151':
                case 'putih_152':
                case 'putih_153':
                case 'putih_154':
                case 'putih_155':
                case 'putih_156':
                case 'putih_157':
                case 'putih_158':
                case 'putih_159':
                case 'putih_160':

                    // warna.style.backgroundColor = '#ffffff'; // warna putih
                    // warna.style.backgroundImage = ''; // menghapus pola arsiran jika checkbox lain dipilih

                    warna.style.backgroundColor = ''; // menghapus warna latar belakang jika checkbox lain dipilih
                    warna.style.background = `
                        radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
                        radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
                        radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
                        radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
                        radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
                        radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px)
                    `;
                    warna.style.backgroundSize = '5px 5px'; // ukuran pola bulatan
                    break;
                case 'abu_1':
                case 'abu_2':
                case 'abu_3':
                case 'abu_4':
                case 'abu_5':
                case 'abu_6':
                case 'abu_7':
                case 'abu_8':
                case 'abu_9':
                case 'abu_10':
                case 'abu_11':
                case 'abu_12':
                case 'abu_13':
                case 'abu_14':
                case 'abu_15':
                case 'abu_16':
                case 'abu_17':
                case 'abu_18':
                case 'abu_19':
                case 'abu_20':
                case 'abu_21':
                case 'abu_22':
                case 'abu_23':
                case 'abu_24':
                case 'abu_25':
                case 'abu_26':
                case 'abu_27':
                case 'abu_28':
                case 'abu_29':
                case 'abu_30':
                case 'abu_31':
                case 'abu_32':
                case 'abu_33':
                case 'abu_34':
                case 'abu_35':
                case 'abu_36':
                case 'abu_37':
                case 'abu_38':
                case 'abu_39':
                case 'abu_40':
                case 'abu_41':
                case 'abu_42':
                case 'abu_43':
                case 'abu_44':
                case 'abu_45':
                case 'abu_46':
                case 'abu_47':
                case 'abu_48':
                case 'abu_49':
                case 'abu_50':
                case 'abu_51':
                case 'abu_52':
                case 'abu_53':
                case 'abu_54':
                case 'abu_55':
                case 'abu_56':
                case 'abu_57':
                case 'abu_58':
                case 'abu_59':
                case 'abu_60':
                case 'abu_61':
                case 'abu_62':
                case 'abu_63':
                case 'abu_64':
                case 'abu_65':
                case 'abu_66':
                case 'abu_67':
                case 'abu_68':
                case 'abu_69':
                case 'abu_70':
                case 'abu_71':
                case 'abu_72':
                case 'abu_73':
                case 'abu_74':
                case 'abu_75':
                case 'abu_76':
                case 'abu_77':
                case 'abu_78':
                case 'abu_79':
                case 'abu_80':
                case 'abu_81':
                case 'abu_82':
                case 'abu_83':
                case 'abu_84':
                case 'abu_85':

                case 'abu_86':
                case 'abu_87':
                case 'abu_88':
                case 'abu_89':
                case 'abu_90':
                case 'abu_91':
                case 'abu_92':
                case 'abu_93':
                case 'abu_94':
                case 'abu_95':
                case 'abu_96':
                case 'abu_97':
                case 'abu_98':
                case 'abu_99':
                case 'abu_100':
                case 'abu_101':
                case 'abu_102':
                case 'abu_103':
                case 'abu_104':
                case 'abu_105':
                case 'abu_106':
                case 'abu_107':
                case 'abu_108':
                case 'abu_109':
                case 'abu_110':
                case 'abu_111':
                case 'abu_112':
                case 'abu_113':
                case 'abu_114':
                case 'abu_115':
                case 'abu_116':
                case 'abu_117':
                case 'abu_118':
                case 'abu_119':
                case 'abu_120':
                case 'abu_121':
                case 'abu_122':
                case 'abu_123':
                case 'abu_124':
                case 'abu_125':
                case 'abu_126':
                case 'abu_127':
                case 'abu_128':
                case 'abu_129':
                case 'abu_130':
                case 'abu_131':
                case 'abu_132':
                case 'abu_133':
                case 'abu_134':
                case 'abu_135':
                case 'abu_136':
                case 'abu_137':
                case 'abu_138':
                case 'abu_139':
                case 'abu_140':
                case 'abu_141':
                case 'abu_142':
                case 'abu_143':
                case 'abu_144':
                case 'abu_145':
                case 'abu_146':
                case 'abu_147':
                case 'abu_148':
                case 'abu_149':
                case 'abu_150':
                case 'abu_151':
                case 'abu_152':
                case 'abu_153':
                case 'abu_154':
                case 'abu_155':
                case 'abu_156':
                case 'abu_157':
                case 'abu_158':
                case 'abu_159':
                case 'abu_160':
                    warna.style.backgroundColor = ''; // menghapus warna latar belakang jika checkbox lain dipilih
                    warna.style.background =
                        'linear-gradient(45deg, transparent 25%, #cccccc 25%, #cccccc 50%, transparent 50%, transparent 75%, #cccccc 75%, #cccccc)';
                    warna.style.backgroundSize = '10px 10px';   // warna arsirran
                    break;
                case 'hitam_1':
                case 'hitam_2':
                case 'hitam_3':
                case 'hitam_4':
                case 'hitam_5':
                case 'hitam_6':
                case 'hitam_7':
                case 'hitam_8':
                case 'hitam_9':
                case 'hitam_10':
                case 'hitam_11':
                case 'hitam_12':
                case 'hitam_13':
                case 'hitam_14':
                case 'hitam_15':
                case 'hitam_16':
                case 'hitam_17':
                case 'hitam_18':
                case 'hitam_19':
                case 'hitam_20':
                case 'hitam_21':
                case 'hitam_22':
                case 'hitam_23':
                case 'hitam_24':
                case 'hitam_25':
                case 'hitam_26':
                case 'hitam_27':
                case 'hitam_28':
                case 'hitam_29':
                case 'hitam_30':
                case 'hitam_31':
                case 'hitam_32':
                case 'hitam_33':
                case 'hitam_34':
                case 'hitam_35':
                case 'hitam_36':
                case 'hitam_37':
                case 'hitam_38':
                case 'hitam_39':
                case 'hitam_40':
                case 'hitam_41':
                case 'hitam_42':
                case 'hitam_43':
                case 'hitam_44':
                case 'hitam_45':
                case 'hitam_46':
                case 'hitam_47':
                case 'hitam_48':
                case 'hitam_49':
                case 'hitam_50':
                case 'hitam_51':
                case 'hitam_52':
                case 'hitam_53':
                case 'hitam_54':
                case 'hitam_55':
                case 'hitam_56':
                case 'hitam_57':
                case 'hitam_58':
                case 'hitam_59':
                case 'hitam_60':
                case 'hitam_61':
                case 'hitam_62':
                case 'hitam_63':
                case 'hitam_64':
                case 'hitam_65':
                case 'hitam_66':
                case 'hitam_67':
                case 'hitam_68':
                case 'hitam_69':
                case 'hitam_70':
                case 'hitam_71':
                case 'hitam_72':
                case 'hitam_73':
                case 'hitam_74':
                case 'hitam_75':
                case 'hitam_76':
                case 'hitam_77':
                case 'hitam_78':
                case 'hitam_79':
                case 'hitam_80':
                case 'hitam_81':
                case 'hitam_82':
                case 'hitam_83':
                case 'hitam_84':
                case 'hitam_85':

                case 'hitam_86':
                case 'hitam_87':
                case 'hitam_88':
                case 'hitam_89':
                case 'hitam_90':
                case 'hitam_91':
                case 'hitam_92':
                case 'hitam_93':
                case 'hitam_94':
                case 'hitam_95':
                case 'hitam_96':
                case 'hitam_97':
                case 'hitam_98':
                case 'hitam_99':
                case 'hitam_100':
                case 'hitam_101':
                case 'hitam_102':
                case 'hitam_103':
                case 'hitam_104':
                case 'hitam_105':
                case 'hitam_106':
                case 'hitam_107':
                case 'hitam_108':
                case 'hitam_109':
                case 'hitam_110':
                case 'hitam_111':
                case 'hitam_112':
                case 'hitam_113':
                case 'hitam_114':
                case 'hitam_115':
                case 'hitam_116':
                case 'hitam_117':
                case 'hitam_118':
                case 'hitam_119':
                case 'hitam_120':
                case 'hitam_121':
                case 'hitam_122':
                case 'hitam_123':
                case 'hitam_124':
                case 'hitam_125':
                case 'hitam_126':
                case 'hitam_127':
                case 'hitam_128':
                case 'hitam_129':
                case 'hitam_130':
                case 'hitam_131':
                case 'hitam_132':
                case 'hitam_133':
                case 'hitam_134':
                case 'hitam_135':
                case 'hitam_136':
                case 'hitam_137':
                case 'hitam_138':
                case 'hitam_139':
                case 'hitam_140':
                case 'hitam_141':
                case 'hitam_142':
                case 'hitam_143':
                case 'hitam_144':
                case 'hitam_145':
                case 'hitam_146':
                case 'hitam_147':
                case 'hitam_148':
                case 'hitam_149':
                case 'hitam_150':
                case 'hitam_151':
                case 'hitam_152':
                case 'hitam_153':
                case 'hitam_154':
                case 'hitam_155':
                case 'hitam_156':
                case 'hitam_157':
                case 'hitam_158':
                case 'hitam_159':
                case 'hitam_160':
                    warna.style.backgroundColor = '#000000'; // warna hitam
                    warna.style.backgroundImage = ''; // menghapus pola arsiran jika checkbox lain dipilih
                    break;
            }
        } else {
            warna.style.backgroundColor = ''; // menghapus warna latar belakang jika checkbox tidak dipilih
            warna.style.backgroundImage = ''; // menghapus pola arsiran jika checkbox tidak dipilih
        }
    }

    // GRAFIK NT
    var chart;
    var xAxisCategories = [];
    $('#btn-nt-chart').on('click', function() {
        var valid = true;

        // Validation
        if ($('#number-nt').val() === null) {
            syams_validation('#number-nt', 'Anda Belum Memilih Angka.');
            valid = false;
        } else {
            syams_validation_remove('#number-nt');
        }

        // Jika validasi gagal, jangan lanjutkan
        if (!valid) {
            return false;
        }

        // Mengubah nilai field kosong menjadi null
        var NomertValue = $('#number-nt').val() === '' ? null : parseFloat($('#number-nt').val());
        var AtasValue = $('#atas-nt').val() === '' ? null : parseFloat($('#atas-nt').val());
        var NadiValue = $('#nadi-nt').val() === '' ? null : parseFloat($('#nadi-nt').val());
        var TekananValue = $('#tekanan-nt').val() === '' ? null : parseFloat($('#tekanan-nt').val());

        var TekananAValue = $('#tekanan-nt-3').val() === '' ? null : parseFloat($('#tekanan-nt-3').val());
        var TekananBValue = $('#tekanan-nt-4').val() === '' ? null : parseFloat($('#tekanan-nt-4').val());
        var TekananCValue = $('#tekanan-nt-5').val() === '' ? null : parseFloat($('#tekanan-nt-5').val());
        var TekananDValue = $('#tekanan-nt-6').val() === '' ? null : parseFloat($('#tekanan-nt-6').val());
        var TekananEValue = $('#tekanan-nt-7').val() === '' ? null : parseFloat($('#tekanan-nt-7').val());
        var TekananFValue = $('#tekanan-nt-8').val() === '' ? null : parseFloat($('#tekanan-nt-8').val());
       

        var ajaxData = {
            Nomert: NomertValue,
            Atas: AtasValue,
            Nadi: NadiValue,
            Tekanan: TekananValue,

            TekananA: TekananAValue,
            TekananB: TekananBValue,
            TekananC: TekananCValue,
            TekananD: TekananDValue,
            TekananE: TekananEValue,
            TekananF: TekananFValue,


            id_layanan_pendaftaran: $('#id-layanan-pendaftaran-partograf').val(),
            id_pendaftaran: $('#id-pendaftaran-partograf').val(),
            id_user: <?= $this->session->userdata("id_translucent") ?>
        };


        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_grafik_nt") ?>',
            data: ajaxData,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                hideLoader(); // Hide loader before calling grafik function
                if (data.respon !== null) {
                    grafikNt(data); // Call grafik function here
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });
        $('#number-nt').val('');
        $('#atas-nt').val('');
        $('#nadi-nt').val('');
        $('#tekanan-nt').val('');
        $('#tekanan-nt-3').val('');
        $('#tekanan-nt-4').val('');
        $('#tekanan-nt-5').val('');
        $('#tekanan-nt-6').val('');
        $('#tekanan-nt-7').val('');
        $('#tekanan-nt-8').val('');
    });

    // GRAFIK NT
    function grafikNt(data, id_layanan_pendaftaran, id_pendaftaran, action) {
        var atasData = data
            .map(v => {
                const numbertnt = v.number_nt ? parseFloat(v.number_nt.replace(',', '.')) : null;
                const atas = v.atas_nt ? parseFloat(v.atas_nt.replace(',', '.')) : null;
                return { numbertnt, atas };
            })
            .filter(({ numbertnt, atas }) => numbertnt !== null && atas !== null)
            .map(({ numbertnt, atas }) => [numbertnt, atas]); // Format array of pairs
        var nadiData = data
            .map(v => {
                const numbertnt = v.number_nt ? parseFloat(v.number_nt.replace(',', '.')) : null;
                const nadi = v.nadi_nt ? parseFloat(v.nadi_nt.replace(',', '.')) : null;
                return { numbertnt, nadi };
            })
            .filter(({ numbertnt, nadi }) => numbertnt !== null && nadi !== null)
            .map(({ numbertnt, nadi }) => [numbertnt, nadi]); // Format array of pairs

        var tekananData = data
            .map(v => {
                const numbertnt = v.number_nt ? parseFloat(v.number_nt.replace(',', '.')) : null;
                const tekanan = v.tekanan_nt ? parseFloat(v.tekanan_nt.replace(',', '.')) : null;
                return { numbertnt, tekanan };
            })
            .filter(({ numbertnt, tekanan }) => numbertnt !== null && tekanan !== null)
            .map(({ numbertnt, tekanan }) => [numbertnt, tekanan]); // Format array of pairs

        var tekananAData = data
            .map(v => {
                const numbertnt = v.number_nt ? parseFloat(v.number_nt.replace(',', '.')) : null;
                const tekananA = v.tekanan_nt_3 ? parseFloat(v.tekanan_nt_3.replace(',', '.')) : null;
                return { numbertnt, tekananA };
            })
            .filter(({ numbertnt, tekananA }) => numbertnt !== null && tekananA !== null)
            .map(({ numbertnt, tekananA }) => [numbertnt, tekananA]); // Format array of pairs

        var tekananBData = data
            .map(v => {
                const numbertnt = v.number_nt ? parseFloat(v.number_nt.replace(',', '.')) : null;
                const tekananB = v.tekanan_nt_4 ? parseFloat(v.tekanan_nt_4.replace(',', '.')) : null;
                return { numbertnt, tekananB };
            })
            .filter(({ numbertnt, tekananB }) => numbertnt !== null && tekananB !== null)
            .map(({ numbertnt, tekananB }) => [numbertnt, tekananB]); // Format array of pairs

        var tekananCData = data
            .map(v => {
                const numbertnt = v.number_nt ? parseFloat(v.number_nt.replace(',', '.')) : null;
                const tekananC = v.tekanan_nt_5 ? parseFloat(v.tekanan_nt_5.replace(',', '.')) : null;
                return { numbertnt, tekananC };
            })
            .filter(({ numbertnt, tekananC }) => numbertnt !== null && tekananC !== null)
            .map(({ numbertnt, tekananC }) => [numbertnt, tekananC]); // Format array of pairs

        var tekananDData = data
            .map(v => {
                const numbertnt = v.number_nt ? parseFloat(v.number_nt.replace(',', '.')) : null;
                const tekananD = v.tekanan_nt_6 ? parseFloat(v.tekanan_nt_6.replace(',', '.')) : null;
                return { numbertnt, tekananD };
            })
            .filter(({ numbertnt, tekananD }) => numbertnt !== null && tekananD !== null)
            .map(({ numbertnt, tekananD }) => [numbertnt, tekananD]); // Format array of pairs

        var tekananEData = data
            .map(v => {
                const numbertnt = v.number_nt ? parseFloat(v.number_nt.replace(',', '.')) : null;
                const tekananE = v.tekanan_nt_7 ? parseFloat(v.tekanan_nt_7.replace(',', '.')) : null;
                return { numbertnt, tekananE };
            })
            .filter(({ numbertnt, tekananE }) => numbertnt !== null && tekananE !== null)
            .map(({ numbertnt, tekananE }) => [numbertnt, tekananE]); // Format array of pairs

        var tekananFData = data
            .map(v => {
                const numbertnt = v.number_nt ? parseFloat(v.number_nt.replace(',', '.')) : null;
                const tekananF = v.tekanan_nt_8 ? parseFloat(v.tekanan_nt_8.replace(',', '.')) : null;
                return { numbertnt, tekananF };
            })
            .filter(({ numbertnt, tekananF }) => numbertnt !== null && tekananF !== null)
            .map(({ numbertnt, tekananF }) => [numbertnt, tekananF]); // Format array of pairs



        var options = {
            title: {
                text: 'Grafik NTD', // Judul grafik
                style: { fontSize: '15px', fontWeight: 'bold', color: '#333333' } // Gaya teks judul
            },
            chart: {
                height: '400px', // Kurangi tinggi chart
                type: 'spline', // Tipe chart spline untuk garis melengkung
                // type: 'areaspline', // Tipe chart spline untuk garis melengkung
                backgroundColor: '#f4f4f4', // Warna latar belakang chart
                borderColor: '#ccc', // Warna border chart
                borderWidth: 1, // Lebar border chart
                plotShadow: true, // Memberikan efek bayangan pada plot
                plotBorderWidth: 1, // Lebar border plot
                plotBorderColor: '#ccc', // Warna border plot
                shadow: { color: 'rgba(0, 0, 0, 0.1)', offsetX: 3, offsetY: 3, opacity: 0.7, width: 5 }, // Efek bayangan
                animation: { duration: 2000, easing: 'easeOutBounce' }, // Efek animasi saat loading chart
                resetZoomButton: { position: { x: -110, y: 10 } } // Posisi tombol reset zoom
            },
            xAxis: {
                categories: xAxisCategories, // Kategori sumbu x berdasarkan waktu
                gridLineWidth: 1, // Lebar garis grid
                gridLineColor: '#e6e6e6', // Warna garis grid
                title: { text: '', style: { fontSize: '16px', color: '#000000', fontWeight: 'bold' } } // Gaya teks sumbu x
            },

            yAxis: {
                title: {
                    text: '<------------><span style="display: inline-block; transform: rotate(-270deg);">Nadi</span> <br/> Tekanan Darah',
                    align: 'middle', // Align the title in the middle
                    rotation: -90, // Rotate the title to face upwards
                    x: 0, // Adjust the horizontal position
                    useHTML: true // Enable HTML in the title
                },
                accessibility: {
                    rangeDescription: 'Range: 60 to 180 cm.'
                },
                lineWidth: 2,
                min: 60,
                max: 180,
                tickInterval: 10, // Interval tick pada sumbu y
                gridLineWidth: 1, // Lebar garis grid sumbu y
                gridLineColor: '#e6e6e6' // Warna garis grid sumbu y
            },

            xAxis: {
                min: 0,
                max: 31, // Ubah dari 25 ke 31
                tickInterval: 1,
                gridLineWidth: 1,
                gridLineColor: '#e6e6e6',
                title: {
                    text: '',
                    align: 'middle'
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 31 hours.' // Ubah deskripsi juga
                },
                labels: {
                    formatter: function() {
                        return '' + this.value;
                    }
                }
            },


            series: [
                {
                    name: '<span style="font-size:12px;">● nadi</span>',
                    data: nadiData, // Data seri
                    marker: { symbol: 'circle', radius: 5 }, // Gaya marker
                    lineWidth: 1, // Lebar garis
                    shadow: true, // Efek bayangan pada garis
                    color: '#00ff00', // Warna garis hijau
                    zones: [{ value: 120, color: '#00ff00' }, { value: 160, color: '#00ff00' }, { color: '#00ff00' }], // Warna zona garis
                    states: { hover: { lineWidth: 2 } } // Gaya saat hover
                },

                {
                    name: '<span style="font-size:12px;">↕ TD-1</span>',
                    data: atasData, // Data seri
                    marker: { symbol: 'circle', radius: 5 }, // Gaya marker
                    lineWidth: 1, // Lebar garis
                    shadow: true, // Efek bayangan pada garis
                    color: '#ff0000', // Warna garis hijau
                    zones: [{ value: 120, color: '#ff0000' }, { value: 160, color: '#ff0000' }, { color: '#ff0000' }], // Warna zona garis
                    states: { hover: { lineWidth: 2 } } // Gaya saat hover
                },

               
                {
                    name: '<span style="font-size:12px;">↕ TD-2</span>',
                    // name: '<span style="font-size:12px;">(↓)</span>',
                    data: tekananData, // Data seri
                    marker: { symbol: 'circle', radius: 5 }, // Gaya marker
                    lineWidth: 1, // Lebar garis
                    shadow: true, // Efek bayangan pada garis
                    color: '#ff0000', // Warna garis biru
                    zones: [{ value: 120, color: '#ff0000' }, { value: 160, color: '#ff0000' }, { color: '#ff0000' }], // Warna zona garis
                    states: { hover: { lineWidth: 2 } } // Gaya saat hover
                },

                {
                    name: '<span style="font-size:12px;">↕ TD-3</span>',
                    data: tekananAData, // Data seri
                    marker: { symbol: 'circle', radius: 5 }, // Gaya marker
                    lineWidth: 1, // Lebar garis
                    shadow: true, // Efek bayangan pada garis
                    color: '#ff0000', // Warna garis biru
                    zones: [{ value: 120, color: '#ff0000' }, { value: 160, color: '#ff0000' }, { color: '#ff0000' }], // Warna zona garis
                    states: { hover: { lineWidth: 2 } } // Gaya saat hover
                },
                {
                    name: '<span style="font-size:12px;">↕ TD-4</span>',
                    data: tekananBData, // Data seri
                    marker: { symbol: 'circle', radius: 5 }, // Gaya marker
                    lineWidth: 1, // Lebar garis
                    shadow: true, // Efek bayangan pada garis
                    color: '#ff0000', // Warna garis biru
                    zones: [{ value: 120, color: '#ff0000' }, { value: 160, color: '#ff0000' }, { color: '#ff0000' }], // Warna zona garis
                    states: { hover: { lineWidth: 2 } } // Gaya saat hover
                },
                {
                    name: '<span style="font-size:12px;">↕ TD-5</span>',
                    data: tekananCData, // Data seri
                    marker: { symbol: 'circle', radius: 5 }, // Gaya marker
                    lineWidth: 1, // Lebar garis
                    shadow: true, // Efek bayangan pada garis
                    color: '#ff0000', // Warna garis biru
                    zones: [{ value: 120, color: '#ff0000' }, { value: 160, color: '#ff0000' }, { color: '#ff0000' }], // Warna zona garis
                    states: { hover: { lineWidth: 2 } } // Gaya saat hover
                },
                {
                    name: '<span style="font-size:12px;">↕ TD-6</span>',
                    data: tekananDData, // Data seri
                    marker: { symbol: 'circle', radius: 5 }, // Gaya marker
                    lineWidth: 1, // Lebar garis
                    shadow: true, // Efek bayangan pada garis
                    color: '#ff0000', // Warna garis biru
                    zones: [{ value: 120, color: '#ff0000' }, { value: 160, color: '#ff0000' }, { color: '#ff0000' }], // Warna zona garis
                    states: { hover: { lineWidth: 2 } } // Gaya saat hover
                },
                {
                    name: '<span style="font-size:12px;">↕ TD-7</span>',
                    data: tekananEData, // Data seri
                    marker: { symbol: 'circle', radius: 5 }, // Gaya marker
                    lineWidth: 1, // Lebar garis
                    shadow: true, // Efek bayangan pada garis
                    color: '#ff0000', // Warna garis biru
                    zones: [{ value: 120, color: '#ff0000' }, { value: 160, color: '#ff0000' }, { color: '#ff0000' }], // Warna zona garis
                    states: { hover: { lineWidth: 2 } } // Gaya saat hover
                },
                {
                    name: '<span style="font-size:12px;">↕ TD-8</span>',
                    data: tekananFData, // Data seri
                    marker: { symbol: 'circle', radius: 5 }, // Gaya marker
                    lineWidth: 1, // Lebar garis
                    shadow: true, // Efek bayangan pada garis
                    color: '#ff0000', // Warna garis biru
                    zones: [{ value: 120, color: '#ff0000' }, { value: 160, color: '#ff0000' }, { color: '#ff0000' }], // Warna zona garis
                    states: { hover: { lineWidth: 2 } } // Gaya saat hover
                }

            ],
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>', // Format header tooltip
                pointFormat: '{point.y}', // Format poin tooltip
                backgroundColor: 'rgba(255,255,255,0.95)', // Warna latar belakang tooltip
                borderColor: '#ccc', // Warna border tooltip
                borderRadius: 10, // Radius border tooltip
                style: { fontSize: '10px' }, // Gaya teks tooltip
                shadow: true // Efek bayangan pada tooltip
            },
            legend: {
                enabled: true, // Mengaktifkan legenda
                itemStyle: { fontSize: '10px', fontWeight: 'bold' } // Gaya teks legenda
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true, // Mengaktifkan label data
                        format: '{point.y}', // Format label data
                        style: { fontSize: '10px', color: '#000000', textOutline: '1px contrast' } // Gaya teks label data
                    },
                    enableMouseTracking: true, // Mengaktifkan tracking mouse
                    marker: {
                        enabled: true, // Mengaktifkan marker
                        radius: 4, // Radius marker
                        states: { hover: { enabled: true, radius: 6 } } // Gaya marker saat hover
                    }
                }
            }
        };
        Highcharts.chart('grafik_nt', options); // Membuat chart dengan opsi yang telah diset
        grafikNadiTekanan(data, action); // Memanggil fungsi grafikNadiTekanan dengan data dan action
    }

    // GRAFIK NT
    // kalau nanti ada kesalahan dari sini berri ganti nama yang ada di bawah ini dengan huruf besar contoh tanggal jadi Tanggal
    function grafikNadiTekanan(data, action) {
        if (data != null) {
            $('#tabel-nt .body-table').empty(); // Kosongkan tabel sebelum mengisi ulang
            $.each(data, function (i, v) {
                let html = /* html */ `
                <tr class="row-in-${i + 1}">
                    <td class="number-monitoring" align="center">${i + 1}</td>
                    <td align="center">
                        <span>${v.number_nt ? v.number_nt : '-'}</span>
                        <input type="hidden" class="custom-form edit-number-nt clear-input d-inline-block col-lg-3" value="${v.number_nt ? v.number_nt : ''}">
                    </td>
                    <td align="center">
                        <span>${v.atas_nt ? v.atas_nt : '-'}</span>
                        <input type="hidden" class="custom-form edit-atas-nt clear-input d-inline-block col-lg-3" value="${v.atas_nt ? v.atas_nt : ''}">
                    </td>
                    <td align="center">
                        <span>${v.nadi_nt ? v.nadi_nt : '-'}</span>
                        <input type="hidden" class="custom-form edit-nadi-nt clear-input d-inline-block col-lg-3" value="${v.nadi_nt ? v.nadi_nt : ''}">
                    </td>
                    <td align="center">
                        <span>${v.tekanan_nt ? v.tekanan_nt : '-'}</span>
                        <input type="hidden" class="custom-form edit-tekanan-nt clear-input d-inline-block col-lg-3" value="${v.tekanan_nt ? v.tekanan_nt : ''}">
                    </td>

                    <td align="center">
                        <span>${v.tekanan_nt_3 ? v.tekanan_nt_3 : '-'}</span>
                        <input type="hidden" class="custom-form edit-tekanan-nt-3 clear-input d-inline-block col-lg-3" value="${v.tekanan_nt_3 ? v.tekanan_nt_3 : ''}">
                    </td>
                    <td align="center">
                        <span>${v.tekanan_nt_4 ? v.tekanan_nt_4 : '-'}</span>
                        <input type="hidden" class="custom-form edit-tekanan-nt-4 clear-input d-inline-block col-lg-3" value="${v.tekanan_nt_4 ? v.tekanan_nt_4 : ''}">
                    </td>
                    <td align="center">
                        <span>${v.tekanan_nt_5 ? v.tekanan_nt_5 : '-'}</span>
                        <input type="hidden" class="custom-form edit-tekanan-nt-5 clear-input d-inline-block col-lg-3" value="${v.tekanan_nt_5 ? v.tekanan_nt_5 : ''}">
                    </td>
                    <td align="center">
                        <span>${v.tekanan_nt_6 ? v.tekanan_nt_6 : '-'}</span>
                        <input type="hidden" class="custom-form edit-tekanan-nt-6 clear-input d-inline-block col-lg-3" value="${v.tekanan_nt_6 ? v.tekanan_nt_6 : ''}">
                    </td>
                    <td align="center">
                        <span>${v.tekanan_nt_7 ? v.tekanan_nt_7 : '-'}</span>
                        <input type="hidden" class="custom-form edit-tekanan-nt-7 clear-input d-inline-block col-lg-3" value="${v.tekanan_nt_7 ? v.tekanan_nt_7 : ''}">
                    </td>
                    <td align="center">
                        <span>${v.tekanan_nt_8 ? v.tekanan_nt_8 : '-'}</span>
                        <input type="hidden" class="custom-form edit-tekanan-nt-8 clear-input d-inline-block col-lg-3" value="${v.tekanan_nt_8 ? v.tekanan_nt_8 : ''}">
                    </td>

                    <td align="center"> <span>${v.nama_petugas}</span> <input type="hidden" class="custom-form jam-edit clear-input d-inline-block col-lg-3" value="${v.nama_petugas}"></td>
                    <td align="center" class="alatGrafik">
                        <button type="button" class="btn btn-secondary btn-xxs edit-button" onclick="editGrafikNt('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="konfirmHapusGrafikNt('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')" index="${i}" numbert="${v.number_nt}" atas="${v.atas_nt}" nadi="${v.nadi_nt}" tekanan="${v.tekanan_nt}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                `;
                $('#tabel-nt .body-table').append(html);
                var groupAccount = '<?= $this->session->userdata('account_group') ?>';
                var profesi = '<?= $this->session->userdata('profesinadis') ?>';
                if (groupAccount == 'Admin') {
                    profesi = 'Perawat';
                }
                if (action !== 'lihat' ) {
                    $('.alatGrafik').show();
                } else {
                    $('.alatGrafik').hide();
                }
            });
        }
    }

    // GRAFIK NT
    function konfirmHapusGrafikNt(id, id_layanan_pendaftaran, id_pendaftaran) {
        swal.fire({
            title: 'Hapus Data',
            text: "Apakah anda yakin akan menghapus ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                hapusGrafikNt(id, id_layanan_pendaftaran, id_pendaftaran);
            }
        })
    }

    // GRAFIK NT
    function hapusGrafikNt(id, id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'DELETE',
            url: '<?= base_url("pelayanan/api/pelayanan/hapus_grafik_nt") ?>/' + id + '/' + id_layanan_pendaftaran + '/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader(); 
                if (data.respon !== null) {
                    grafikNt(data); 
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });
    }

    // GRAFIK NT
    function editGrafikNt(id, id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_grafik_nt_by_id") ?>/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#modal-edit-grafik-nt').modal('show');
                $('#edit-id-nt').val(data.id);
                $('#edit-id-layanan-pendaftaran-nt').val(data.id_layanan_pendaftaran);
                $('#edit-id-pendaftaran-nt').val(data.id_pendaftaran);
                $('#edit-number-nt').val(data.number_nt);
                $('#edit-atas-nt').val(data.atas_nt);
                $('#edit-nadi-nt').val(data.nadi_nt);
                $('#edit-tekanan-nt').val(data.tekanan_nt);

                $('#edit-tekanan-nt-3').val(data.tekanan_nt_3);
                $('#edit-tekanan-nt-4').val(data.tekanan_nt_4);
                $('#edit-tekanan-nt-5').val(data.tekanan_nt_5);
                $('#edit-tekanan-nt-6').val(data.tekanan_nt_6);
                $('#edit-tekanan-nt-7').val(data.tekanan_nt_7);
                $('#edit-tekanan-nt-8').val(data.tekanan_nt_8);

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

        $('#btn-update-grafik-nt').on('click', function() {
            var id = $('#edit-id-nt').val();
            var NomertValue = $('#edit-number-nt').val() === '' ? null : parseFloat($('#edit-number-nt').val());
            var AtasValue = $('#edit-atas-nt').val() === '' ? null : parseFloat($('#edit-atas-nt').val());
            var NadiValue = $('#edit-nadi-nt').val() === '' ? null : parseFloat($('#edit-nadi-nt').val());
            var TekananValue = $('#edit-tekanan-nt').val() === '' ? null : parseFloat($('#edit-tekanan-nt').val());

            var TekananAValue = $('#edit-tekanan-nt-3').val() === '' ? null : parseFloat($('#edit-tekanan-nt-3').val());
            var TekananBValue = $('#edit-tekanan-nt-4').val() === '' ? null : parseFloat($('#edit-tekanan-nt-4').val());
            var TekananCValue = $('#edit-tekanan-nt-5').val() === '' ? null : parseFloat($('#edit-tekanan-nt-5').val());
            var TekananDValue = $('#edit-tekanan-nt-6').val() === '' ? null : parseFloat($('#edit-tekanan-nt-6').val());
            var TekananEValue = $('#edit-tekanan-nt-7').val() === '' ? null : parseFloat($('#edit-tekanan-nt-7').val());
            var TekananFValue = $('#edit-tekanan-nt-8').val() === '' ? null : parseFloat($('#edit-tekanan-nt-8').val());



            var idLayananPendaftaranValue = $('#edit-id-layanan-pendaftaran-nt').val();
            var idPendaftaranValue = $('#edit-id-pendaftaran-nt').val();
            var idUserValue = <?= $this->session->userdata("id_translucent") ?>; // Add this line

            if (isNaN(NomertValue)) {
                console.error("Invalid input values for numbert.");
                return;
            }

            if (isNaN(AtasValue)) {
                console.error("Invalid input values for atas.");
                return;
            }

            if (isNaN(NadiValue)) {
                console.error("Invalid input values for nadi.");
                return;
            }

            if (isNaN(TekananValue)) {
                console.error("Invalid input values for tekanan.");
                return;
            }

            if (isNaN(TekananAValue)) {
                console.error("Invalid input values for tekanan.");
                return;
            }
            if (isNaN(TekananBValue)) {
                console.error("Invalid input values for tekanan.");
                return;
            }
            if (isNaN(TekananCValue)) {
                console.error("Invalid input values for tekanan.");
                return;
            }
            if (isNaN(TekananDValue)) {
                console.error("Invalid input values for tekanan.");
                return;
            }
            if (isNaN(TekananEValue)) {
                console.error("Invalid input values for tekanan.");
                return;
            }
            if (isNaN(TekananFValue)) {
                console.error("Invalid input values for tekanan.");
                return;
            }

            var ajaxData = {
                id: id,
                Nomert: NomertValue,
                Atas: AtasValue,
                Nadi: NadiValue,
                Tekanan: TekananValue,

                TekananA: TekananAValue,
                TekananB: TekananBValue,
                TekananC: TekananCValue,
                TekananD: TekananDValue,
                TekananE: TekananEValue,
                TekananF: TekananFValue,

                id_layanan_pendaftaran: idLayananPendaftaranValue,
                id_pendaftaran: idPendaftaranValue,
                id_user: idUserValue
            };

            $.ajax({
                type: 'POST',
                url: '<?= base_url("pelayanan/api/pelayanan/update_grafik_nt") ?>',
                data: ajaxData,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    hideLoader(); 
                    $('#modal-edit-grafik-nt').modal('hide');
                    if (data.respon !== null) {
                        grafikNt(data); 
                    }
                },
                error: function(e) {
                    console.error("AJAX Error:", e);
                    hideLoader(); 
                    messageAddFailed();
                }
            });
        });
    }


























  

















</script>