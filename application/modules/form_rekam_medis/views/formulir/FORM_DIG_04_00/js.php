<!-- // CPTDI -->

<script>  
 
    $("#wizard-cptdi").bwizard();

    $('#btn-expand-all-cptdi').click(function() { $('.multi-collapse').addClass('show');});

    $('#btn-collapse-all-cptdi').click(function() { $('.multi-collapse').removeClass('show');});
    

    $('#perawat-cptdi, #perawatobsser-cptdi')
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

    $('#tanggaljam-cptdi, #tanggaljagm-cptdi').datetimepicker({
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

    
    $('#jamgo-cptdi, #edit-jamgo-cptdi')
    .on('click', function() {
        $(this).timepicker({
            format: 'HH:mm',
            showInputs: false,
            showMeridian: false
        });
    })


    // MP-A tanggal
    $('#tglgo-cptdi, #edit-tglgo-cptdi')
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


    $('#pasientiba-cptdi-1')
    .on('click', function() {
        $(this).timepicker({
            format: 'HH:mm',
            showInputs: false,
            showMeridian: false
        });
    })


    function lihatFORM_DIG_04_00(data) {
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
        entriFormCptdI(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function editFORM_DIG_04_00(data) {
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
        entriFormCptdI(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function tambahFORM_DIG_04_00(data) {
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
        entriFormCptdI(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }
  
    function entriFormCptdI(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, action) {

        // $('#modal_asesmen_awal_keperawatan_tindakan_invasif_non_bedah').modal('show');  
        // $('#wizard-cptdi').bwizard('show', '0');


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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_cheklis_persiapan_tindakan_diagnostik_invasif") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
                console.log(data);
                resetFormCptDi(); 
                $('#id-layanan-pendaftaran-cptdi').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-cptdi').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-cptdi').val(data.pasien.id_pasien);
                    $('#nama-pasien-cptdi').text(data.pasien.nama);
                    $('#no-cptdi').text(data.pasien.no_rm);
                    $('#jenis-kelamin-cptdi').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan')); 
                }

                $('#tgljammasuk-cptdi').val(data.layanan.tanggal_layanan);                      

                if (data.cheklis_persiapan_tindakan_diagnostik_invasif !== null) {  

                    $('#btn_cetak_cptdi').show();  // Menampilkan tombol cetak
                    $('#btn_cetak_cptdi').on('click', function() {
                        konfirmasiCetakCheklisPersiapanTindakanDiagInvasi(id_pendaftaran, id_layanan_pendaftaran);  // Fungsi ini hanya dipanggil setelah tombol diklik
                    });

                    $('#id-cptdi').val(data.cheklis_persiapan_tindakan_diagnostik_invasif.id);

                    // INI GABUNGAN ANTARA TEXT DAN JUGA CHEKBOX
                    // Ambil data tujuan_cptdi dari server dan ubah ke bentuk objek JavaScript
                    const tujuan_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.tujuan_cptdi);
                    // Daftar nomor input yang bertipe text (bukan checkbox)
                    const inputText_tujuan = [7]; // Misalnya hanya input ke-7 yang berupa teks
                    if (tujuan_cptdi) { // Pastikan data-nya ada dan bukan null
                        for (let i = 1; i <= 11; i++) { // Loop dari 1 sampai 11
                            let key = `tujuan_cptdi_${i}`;        // Bentuk key seperti "tujuan_cptdi_1", "tujuan_cptdi_2", dst.
                            let selector = `#tujuan-cptdi-${i}`;  // Bentuk selector id di HTML seperti "#tujuan-cptdi-1"

                            if (tujuan_cptdi[key] !== null && tujuan_cptdi[key] !== undefined) {
                                if (inputText_tujuan.includes(i)) {
                                    // Jika i termasuk input teks, maka isi dengan .val()
                                    $(selector).val(tujuan_cptdi[key]);
                                } else {
                                    // Jika bukan input teks (berarti checkbox), centang checkbox-nya
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const statuspsikologis_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.statuspsikologis_cptdi);
                    const inputText_statuspsikologis = [6];
                    if (statuspsikologis_cptdi) {
                        for (let i = 1; i <= 6; i++) {
                            let key = `statuspsikologis_cptdi_${i}`;
                            let selector = `#statuspsikologis-cptdi-${i}`;
                            if (statuspsikologis_cptdi[key] !== null && statuspsikologis_cptdi[key] !== undefined) {
                                if (inputText_statuspsikologis.includes(i)) {
                                    $(selector).val(statuspsikologis_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const riwayatpenyakit_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.riwayatpenyakit_cptdi);
                    const inputText_riwayatpenyakit = [10];
                    if (riwayatpenyakit_cptdi) {
                        for (let i = 1; i <= 10; i++) {
                            let key = `riwayatpenyakit_cptdi_${i}`;
                            let selector = `#riwayatpenyakit-cptdi-${i}`;
                            if (riwayatpenyakit_cptdi[key] !== null && riwayatpenyakit_cptdi[key] !== undefined) {
                                if (inputText_riwayatpenyakit.includes(i)) {
                                    $(selector).val(riwayatpenyakit_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    // const sistempernafasan_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.sistempernafasan_cptdi);
                    // const inputText_sistempernafasan = [1, 4, 5];
                    // if (sistempernafasan_cptdi) {
                    //     for (let i = 1; i <= 5; i++) {
                    //         let key = `sistempernafasan_cptdi_${i}`;
                    //         let selector = `#sistempernafasan-cptdi-${i}`;
                    //         if (sistempernafasan_cptdi[key] !== null && sistempernafasan_cptdi[key] !== undefined) {
                    //             if (inputText_sistempernafasan.includes(i)) {
                    //                 $(selector).val(sistempernafasan_cptdi[key]);
                    //             } else {
                    //                 $(selector).prop('checked', true);
                    //             }
                    //         }
                    //     }
                    // }




                    // INI UNTUK BAGIAN CHEKBOX
                    // const sistempencernaan_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.sistempencernaan_cptdi);
                    // if (sistempencernaan_cptdi) {
                    //     for (let i = 1; i <= 5; i++) { // Karena cuma sampai 5
                    //         let key = `sistempencernaan_cptdi_${i}`;
                    //         let selector = `#sistempencernaan-cptdi-${i}`;
                    //         if (sistempencernaan_cptdi[key] !== null && sistempencernaan_cptdi[key] !== undefined) {
                    //             $(selector).prop('checked', true); // langsung centang checkbox-nya
                    //         }
                    //     }
                    // }


                    // $('#sistemkemih-cptdi').val(data.cheklis_persiapan_tindakan_diagnostik_invasif.sistemkemih_cptdi);



                    const riwayatpengob_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.riwayatpengob_cptdi);
                    const inputText_riwayatpengob = [3, 6, 9];
                    if (riwayatpengob_cptdi) {
                        for (let i = 1; i <= 9; i++) {
                            let key = `riwayatpengob_cptdi_${i}`;
                            let selector = `#riwayatpengob-cptdi-${i}`;
                            if (riwayatpengob_cptdi[key] !== null && riwayatpengob_cptdi[key] !== undefined) {
                                if (inputText_riwayatpengob.includes(i)) {
                                    $(selector).val(riwayatpengob_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const riwayatalergi_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.riwayatalergi_cptdi);
                    const inputText_riwayatalergi = [3];
                    if (riwayatalergi_cptdi) {
                        for (let i = 1; i <= 3; i++) {
                            let key = `riwayatalergi_cptdi_${i}`;
                            let selector = `#riwayatalergi-cptdi-${i}`;
                            if (riwayatalergi_cptdi[key] !== null && riwayatalergi_cptdi[key] !== undefined) {
                                if (inputText_riwayatalergi.includes(i)) {
                                    $(selector).val(riwayatalergi_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    // INI UNTUK BAGIAN TEXT
                    const ttv_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.ttv_cptdi);
                    if (ttv_cptdi) { // Pastikan objek tidak null
                        for (let i = 1; i <= 4; i++) {
                            let key = `ttv_cptdi_${i}`; // key untuk ambil dari objek
                            let selector = `#ttv-cptdi-${i}`; // ID sesuai HTML
                            if (ttv_cptdi[key] !== null && ttv_cptdi[key] !== undefined) {
                                $(selector).val(ttv_cptdi[key]);
                            }
                        }
                    }

                    // const testalent_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.testalent_cptdi);
                    // if (testalent_cptdi) {
                    //     for (let i = 1; i <= 4; i++) { // Karena cuma sampai 5
                    //         let key = `testalent_cptdi_${i}`;
                    //         let selector = `#testalent-cptdi-${i}`;
                    //         if (testalent_cptdi[key] !== null && testalent_cptdi[key] !== undefined) {
                    //             $(selector).prop('checked', true); // langsung centang checkbox-nya
                    //         }
                    //     }
                    // }

                    // const arteridor_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.arteridor_cptdi);
                    // if (arteridor_cptdi) {
                    //     for (let i = 1; i <= 4; i++) { // Karena cuma sampai 5
                    //         let key = `arteridor_cptdi_${i}`;
                    //         let selector = `#arteridor-cptdi-${i}`;
                    //         if (arteridor_cptdi[key] !== null && arteridor_cptdi[key] !== undefined) {
                    //             $(selector).prop('checked', true); // langsung centang checkbox-nya
                    //         }
                    //     }
                    // }


                    $('#bb-cptdi').val(data.cheklis_persiapan_tindakan_diagnostik_invasif.bb_cptdi);
                    $('#tb-cptdi').val(data.cheklis_persiapan_tindakan_diagnostik_invasif.tb_cptdi);

                    // const keluhannyeri_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.keluhannyeri_cptdi);
                    // const inputText_keluhannyeri = [3, 4, 5, 6, 7, 10];
                    // if (keluhannyeri_cptdi) {
                    //     for (let i = 1; i <= 10; i++) {
                    //         let key = `keluhannyeri_cptdi_${i}`;
                    //         let selector = `#keluhannyeri-cptdi-${i}`;
                    //         if (keluhannyeri_cptdi[key] !== null && keluhannyeri_cptdi[key] !== undefined) {
                    //             if (inputText_keluhannyeri.includes(i)) {
                    //                 $(selector).val(keluhannyeri_cptdi[key]);
                    //             } else {
                    //                 $(selector).prop('checked', true);
                    //             }
                    //         }
                    //     }
                    // }

                    // const kebutuhanedu_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.kebutuhanedu_cptdi);
                    // const inputText_kebutuhanedu = [10];
                    // if (kebutuhanedu_cptdi) {
                    //     for (let i = 1; i <= 10; i++) {
                    //         let key = `kebutuhanedu_cptdi_${i}`;
                    //         let selector = `#kebutuhanedu-cptdi-${i}`;
                    //         if (kebutuhanedu_cptdi[key] !== null && kebutuhanedu_cptdi[key] !== undefined) {
                    //             if (inputText_kebutuhanedu.includes(i)) {
                    //                 $(selector).val(kebutuhanedu_cptdi[key]);
                    //             } else {
                    //                 $(selector).prop('checked', true);
                    //             }
                    //         }
                    //     }
                    // }

                    // INI UNTUK BAGIAN TEXT
                    const labroturiem_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.labroturiem_cptdi);
                    if (labroturiem_cptdi) { // Pastikan objek tidak null
                        for (let i = 1; i <= 10; i++) {
                            let key = `labroturiem_cptdi_${i}`; // key untuk ambil dari objek
                            let selector = `#labroturiem-cptdi-${i}`; // ID sesuai HTML
                            if (labroturiem_cptdi[key] !== null && labroturiem_cptdi[key] !== undefined) {
                                $(selector).val(labroturiem_cptdi[key]);
                            }
                        }
                    }

                    // const skrining_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.skrining_cptdi);
                    // const inputText_skrining = [1];
                    // if (skrining_cptdi) {
                    //     for (let i = 1; i <= 4; i++) {
                    //         let key = `skrining_cptdi_${i}`;
                    //         let selector = `#skrining-cptdi-${i}`;
                    //         if (skrining_cptdi[key] !== null && skrining_cptdi[key] !== undefined) {
                    //             if (inputText_skrining.includes(i)) {
                    //                 $(selector).val(skrining_cptdi[key]);
                    //             } else {
                    //                 $(selector).prop('checked', true);
                    //             }
                    //         }
                    //     }
                    // }

                    const hasilecho_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.hasilecho_cptdi);
                    const inputText_hasilecho = [3];
                    if (hasilecho_cptdi) {
                        for (let i = 1; i <= 3; i++) {
                            let key = `hasilecho_cptdi_${i}`;
                            let selector = `#hasilecho-cptdi-${i}`;
                            if (hasilecho_cptdi[key] !== null && hasilecho_cptdi[key] !== undefined) {
                                if (inputText_hasilecho.includes(i)) {
                                    $(selector).val(hasilecho_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const hasitmt_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.hasitmt_cptdi);
                    const inputText_hasitmt = [3];
                    if (hasitmt_cptdi) {
                        for (let i = 1; i <= 3; i++) {
                            let key = `hasitmt_cptdi_${i}`;
                            let selector = `#hasitmt-cptdi-${i}`;
                            if (hasitmt_cptdi[key] !== null && hasitmt_cptdi[key] !== undefined) {
                                if (inputText_hasitmt.includes(i)) {
                                    $(selector).val(hasitmt_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const mskep_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.mskep_cptdi);
                    if (mskep_cptdi) {
                        for (let i = 1; i <= 6; i++) { // Karena cuma sampai 5
                            let key = `mskep_cptdi_${i}`;
                            let selector = `#mskep-cptdi-${i}`;
                            if (mskep_cptdi[key] !== null && mskep_cptdi[key] !== undefined) {
                                $(selector).prop('checked', true); // langsung centang checkbox-nya
                            }
                        }
                    }

                    const rctindkep_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.rctindkep_cptdi);
                    const inputText_rctindkep = [8,10,12];
                    if (rctindkep_cptdi) {
                        for (let i = 1; i <= 12; i++) {
                            let key = `rctindkep_cptdi_${i}`;
                            let selector = `#rctindkep-cptdi-${i}`;
                            if (rctindkep_cptdi[key] !== null && rctindkep_cptdi[key] !== undefined) {
                                if (inputText_rctindkep.includes(i)) {
                                    $(selector).val(rctindkep_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    $('#tanggaljam-cptdi').val((data.cheklis_persiapan_tindakan_diagnostik_invasif.tanggaljam_cptdi !== null ? datetimefmysql(data.cheklis_persiapan_tindakan_diagnostik_invasif.tanggaljam_cptdi) : ''));
                    $('#perawat-cptdi').val(data.cheklis_persiapan_tindakan_diagnostik_invasif.perawat_cptdi);
                    $('#s2id_perawat-cptdi a .select2c-chosen').html(data.cheklis_persiapan_tindakan_diagnostik_invasif.perawat_1);

                    // BATAS INI 

                    // ini senganja blm di ubah tadiya json 3 cuma tinggal 1 coba dulu kalau eror di perbaiki lagi
                    // INI UNTUK BAGIAN TEXT VAL
                    const pasientiba_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.pasientiba_cptdi);
                    if (pasientiba_cptdi) { // Pastikan objek tidak null
                        for (let i = 1; i <= 3; i++) {
                            let key = `pasientiba_cptdi_${i}`; // key untuk ambil dari objek
                            let selector = `#pasientiba-cptdi-${i}`; // ID sesuai HTML
                            if (pasientiba_cptdi[key] !== null && pasientiba_cptdi[key] !== undefined) {
                                $(selector).val(pasientiba_cptdi[key]);
                            }
                        }
                    }


                     // INI UNTUK BAGIAN GABUNGAN CHEKBOX dan TEXT
                    const terpasang_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.terpasang_cptdi);
                    const inputText_terpasang = [3];
                    if (terpasang_cptdi) {
                        for (let i = 1; i <= 3; i++) {
                            let key = `terpasang_cptdi_${i}`;
                            let selector = `#terpasang-cptdi-${i}`;
                            if (terpasang_cptdi[key] !== null && terpasang_cptdi[key] !== undefined) {
                                if (inputText_terpasang.includes(i)) {
                                    $(selector).val(terpasang_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    // INI UNTUK BAGIAN CHEKBOX PROP
                    // const pulsasia_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.pulsasia_cptdi);
                    // if (pulsasia_cptdi) {
                    //     for (let i = 1; i <= 6; i++) { // Karena cuma sampai 5
                    //         let key = `pulsasia_cptdi_${i}`;
                    //         let selector = `#pulsasia-cptdi-${i}`;
                    //         if (pulsasia_cptdi[key] !== null && pulsasia_cptdi[key] !== undefined) {
                    //             $(selector).prop('checked', true); // langsung centang checkbox-nya
                    //         }
                    //     }
                    // }

                    // const pulsasidor_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.pulsasidor_cptdi);
                    // if (pulsasidor_cptdi) {
                    //     for (let i = 1; i <= 6; i++) { // Karena cuma sampai 5
                    //         let key = `pulsasidor_cptdi_${i}`;
                    //         let selector = `#pulsasidor-cptdi-${i}`;
                    //         if (pulsasidor_cptdi[key] !== null && pulsasidor_cptdi[key] !== undefined) {
                    //             $(selector).prop('checked', true); // langsung centang checkbox-nya
                    //         }
                    //     }
                    // }


                    const alatyt_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.alatyt_cptdi);
                    const inputText_alatyt = [8];
                    if (alatyt_cptdi) {
                        for (let i = 1; i <= 8; i++) {
                            let key = `alatyt_cptdi_${i}`;
                            let selector = `#alatyt-cptdi-${i}`;
                            if (alatyt_cptdi[key] !== null && alatyt_cptdi[key] !== undefined) {
                                if (inputText_alatyt.includes(i)) {
                                    $(selector).val(alatyt_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const jenisanest_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.jenisanest_cptdi);
                    const inputText_jenisanest = [3, 4, 5];
                    if (jenisanest_cptdi) {
                        for (let i = 1; i <= 5; i++) {
                            let key = `jenisanest_cptdi_${i}`;
                            let selector = `#jenisanest-cptdi-${i}`;
                            if (jenisanest_cptdi[key] !== null && jenisanest_cptdi[key] !== undefined) {
                                if (inputText_jenisanest.includes(i)) {
                                    $(selector).val(jenisanest_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    $('#sedasi-cptdi').val(data.cheklis_persiapan_tindakan_diagnostik_invasif.sedasi_cptdi);

                    const antikoagulan_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.antikoagulan_cptdi);
                    const inputText_antikoagulan = [3, 4, 5];
                    if (antikoagulan_cptdi) {
                        for (let i = 1; i <= 5; i++) {
                            let key = `antikoagulan_cptdi_${i}`;
                            let selector = `#antikoagulan-cptdi-${i}`;
                            if (antikoagulan_cptdi[key] !== null && antikoagulan_cptdi[key] !== undefined) {
                                if (inputText_antikoagulan.includes(i)) {
                                    $(selector).val(antikoagulan_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const hematoma_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.hematoma_cptdi);
                    const inputText_hematoma = [3, 4];
                    if (hematoma_cptdi) {
                        for (let i = 1; i <= 4; i++) {
                            let key = `hematoma_cptdi_${i}`;
                            let selector = `#hematoma-cptdi-${i}`;
                            if (hematoma_cptdi[key] !== null && hematoma_cptdi[key] !== undefined) {
                                if (inputText_hematoma.includes(i)) {
                                    $(selector).val(hematoma_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const leserasi_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.leserasi_cptdi);
                    const inputText_leserasi = [3, 4];
                    if (leserasi_cptdi) {
                        for (let i = 1; i <= 4; i++) {
                            let key = `leserasi_cptdi_${i}`;
                            let selector = `#leserasi-cptdi-${i}`;
                            if (leserasi_cptdi[key] !== null && leserasi_cptdi[key] !== undefined) {
                                if (inputText_leserasi.includes(i)) {
                                    $(selector).val(leserasi_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const reaksif_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.reaksif_cptdi);
                    const inputText_reaksif = [3];
                    if (reaksif_cptdi) {
                        for (let i = 1; i <= 3; i++) {
                            let key = `reaksif_cptdi_${i}`;
                            let selector = `#reaksif-cptdi-${i}`;
                            if (reaksif_cptdi[key] !== null && reaksif_cptdi[key] !== undefined) {
                                if (inputText_reaksif.includes(i)) {
                                    $(selector).val(reaksif_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const intaker_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.intaker_cptdi);
                    if (intaker_cptdi) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `intaker_cptdi_${i}`; // key untuk ambil dari objek
                            let selector = `#intaker-cptdi-${i}`; // ID sesuai HTML
                            if (intaker_cptdi[key] !== null && intaker_cptdi[key] !== undefined) {
                                $(selector).val(intaker_cptdi[key]);
                            }
                        }
                    }

                    // const imobil_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.imobil_cptdi);
                    // if (imobil_cptdi) { // Pastikan objek tidak null
                    //     for (let i = 1; i <= 6; i++) {
                    //         let key = `imobil_cptdi_${i}`; // key untuk ambil dari objek
                    //         let selector = `#imobil-cptdi-${i}`; // ID sesuai HTML
                    //         if (imobil_cptdi[key] !== null && imobil_cptdi[key] !== undefined) {
                    //             $(selector).val(imobil_cptdi[key]);
                    //         }
                    //     }
                    // }

                    const maskeptan_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.maskeptan_cptdi);
                    const inputText_maskeptan = [8, 10, 12];
                    if (maskeptan_cptdi) {
                        for (let i = 1; i <= 12; i++) {
                            let key = `maskeptan_cptdi_${i}`;
                            let selector = `#maskeptan-cptdi-${i}`;
                            if (maskeptan_cptdi[key] !== null && maskeptan_cptdi[key] !== undefined) {
                                if (inputText_maskeptan.includes(i)) {
                                    $(selector).val(maskeptan_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }

                    const tdmandiri_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.tdmandiri_cptdi);
                    const inputText_tdmandiri = [8, 10, 12, 15];
                    if (tdmandiri_cptdi) {
                        for (let i = 1; i <= 15; i++) {
                            let key = `tdmandiri_cptdi_${i}`;
                            let selector = `#tdmandiri-cptdi-${i}`;
                            if (tdmandiri_cptdi[key] !== null && tdmandiri_cptdi[key] !== undefined) {
                                if (inputText_tdmandiri.includes(i)) {
                                    $(selector).val(tdmandiri_cptdi[key]);
                                } else {
                                    $(selector).prop('checked', true);
                                }
                            }
                        }
                    }


                    const saturasy_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.saturasy_cptdi);
                    if (saturasy_cptdi) { // Pastikan objek tidak null
                        for (let i = 1; i <= 8; i++) {
                            let key = `saturasy_cptdi_${i}`; // key untuk ambil dari objek
                            let selector = `#saturasy-cptdi-${i}`; // ID sesuai HTML
                            if (saturasy_cptdi[key] !== null && saturasy_cptdi[key] !== undefined) {
                                $(selector).val(saturasy_cptdi[key]);
                            }
                        }
                    }

                    const pulsasi_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.pulsasi_cptdi);
                    if (pulsasi_cptdi) { // Pastikan objek tidak null
                        for (let i = 1; i <= 8; i++) {
                            let key = `pulsasi_cptdi_${i}`; // key untuk ambil dari objek
                            let selector = `#pulsasi-cptdi-${i}`; // ID sesuai HTML
                            if (pulsasi_cptdi[key] !== null && pulsasi_cptdi[key] !== undefined) {
                                $(selector).val(pulsasi_cptdi[key]);
                            }
                        }
                    }

                    const reflek_cptdi = JSON.parse(data.cheklis_persiapan_tindakan_diagnostik_invasif.reflek_cptdi);
                    if (reflek_cptdi) { // Pastikan objek tidak null
                        for (let i = 1; i <= 8; i++) {
                            let key = `reflek_cptdi_${i}`; // key untuk ambil dari objek
                            let selector = `#reflek-cptdi-${i}`; // ID sesuai HTML
                            if (reflek_cptdi[key] !== null && reflek_cptdi[key] !== undefined) {
                                $(selector).val(reflek_cptdi[key]);
                            }
                        }
                    }



                    $('#tanggaljagm-cptdi').val((data.cheklis_persiapan_tindakan_diagnostik_invasif.tanggaljagm_cptdi !== null ? datetimefmysql(data.cheklis_persiapan_tindakan_diagnostik_invasif.tanggaljagm_cptdi) : ''));
                    $('#perawatobsser-cptdi').val(data.cheklis_persiapan_tindakan_diagnostik_invasif.perawatobsser_cptdi);
                    $('#s2id_perawatobsser-cptdi a .select2c-chosen').html(data.cheklis_persiapan_tindakan_diagnostik_invasif.perawat_2);
                }        
                
                // GRAFIK OBSERVASI
                if (typeof data.grafik_observasi !== 'undefined' || data.grafik_observasi !== null) {
                    grafikObservasi(data.grafik_observasi, id_layanan_pendaftaran, id_pendaftaran, action);
                } else {
                    $('#tabel-grafik-observasi .body-table').empty();
                }

                
                // NARIK DATA 
                const diagUtamaRm = [
                ...(data.diagnosa_utama || []),
                ...(data.ds_manual_utama || [])
                ].sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran)[0]?.nama;

                const semuaDiagnosa = 
                (diagUtamaRm ? `<b>${diagUtamaRm}</b><br>` : '') +
                ((data.diagnosa_sekunder || []).map(diag => `${diag.nama}<br>`).join('')) +
                ((data.ds_manual_sekunder || []).map(diag => `${diag.nama}<br>`).join(''));

                $('#diagnosis-cptdi').html(semuaDiagnosa);




                
                $('#modal_asesmen_awal_keperawatan_tindakan_invasif_non_bedah').modal('show');  

                if (action === 'lihat') {
                    // Disable semua input dan textarea, tapi biarkan tombol expand/collapse tetap aktif
                    $('#modal_asesmen_awal_keperawatan_tindakan_invasif_non_bedah :input')
                        .not('[data-dismiss="modal"], #btn-expand-all-cptdi, #btn-collapse-all-cptdi, #btn_cetak_cptdi')
                        .prop('disabled', true);

                    $('#modal_asesmen_awal_keperawatan_tindakan_invasif_non_bedah textarea').prop('readonly', true);
                    $('#btn-simpan').hide();

                    // Disable select dan Select2
                    $('#modal_asesmen_awal_keperawatan_tindakan_invasif_non_bedah select')
                        .not('[data-dismiss="modal"]')
                        .prop('disabled', true)
                        .trigger('change.select2c');

                    $('#modal_asesmen_awal_keperawatan_tindakan_invasif_non_bedah [id^="s2id_"]').css({
                        'pointer-events': 'none',
                        'opacity': 0.6
                    });
                }

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    } 


    function konfirmasiCetakCheklisPersiapanTindakanDiagInvasi(id_pendaftaran, id_layanan_pendaftaran){
        window.open('<?= base_url('pendaftaran_igd/cetak_cheklist_persiapan_tindakan_diagnostik_invasif/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran,
        'CETAK FORM CHEKLIST PERSIAPAN TINDAKAN DIAGNOSTIK INVASIF DAN INTERVENSI NON BEDAH', 'width=' + dWidth + ', height=' +
        dHeight +
        ', left=' + x + ', top=' + y);
    }

    function resetFormCptDi() { 
        $('#form_asesmen_awal_keperawatan_tindakan_invasif_non_bedah')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
    }


    function konfirmasisimpanCheklisPersiapanTindakanDiagInvasi() {
        var stop = false;

        if (!stop) {
            var id_cptdi = $('#id-cptdi').val();
            var text;
            var btnTextConfirmcptdi;

            if (id_cptdi) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmcptdi = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmcptdi = 'Simpan';
            }

            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmcptdi,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanCheklisPersiapanTindakanDiagInvasi();
                }
            });
        }
    }


    function simpanCheklisPersiapanTindakanDiagInvasi() {
        var id_layanan_pendaftaran_cptdi = $('#id-layanan-pendaftaran-cptdi').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_cheklis_persiapan_tindakan_diagnostik_invasif") ?>',
            data: $('#form_asesmen_awal_keperawatan_tindakan_invasif_non_bedah').serialize() + '&id-layanan-pendaftaran-cptdi=' + id_layanan_pendaftaran_cptdi,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-cptdi').bwizard('show', data.respon.show);

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
                        $('#modal_asesmen_awal_keperawatan_tindakan_invasif_non_bedah').modal('hide');
                        showListForm($('#id-pendaftaran-cptdi').val(), $('#id-layanan-pendaftaran-cptdi').val(), $('#id-pasien-cptdi').val());
                    } else {
                        messageAddFailed();
                    }
                }
            },
            complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				// messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
				messageAddFailed('Terjadi Kesalahan : '+ e.statusText +' ('+e.status+')', 'Error');
			}
            
        });
    }



    // GRAFIK OBSERVASI
    var chart;
    var xAxisCategories = [];
    $('#btn-cptdi-chart').on('click', function() {

        if ($('#jamgo-cptdi').val() === '') {
            syams_validation('#jamgo-cptdi', 'jam harus diisi.');
            return false;
        } else {
            syams_validation_remove('#jamgo-cptdi');
        }

        if ($('#tglgo-cptdi').val() === '') {
            syams_validation('#tglgo-cptdi', 'tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tglgo-cptdi');
        }

        var BPValue     = $('#bloodpressure-cptdi').val() === '' ? null : parseFloat($('#bloodpressure-cptdi').val());
        var NValue      = $('#nadipulse-cptdi').val() === '' ? null : parseFloat($('#nadipulse-cptdi').val());
        var PValue      = $('#pernafasan-cptdi').val() === '' ? null : parseFloat($('#pernafasan-cptdi').val());
        var SValue      = $('#suhu-cptdi').val() === '' ? null : parseFloat($('#suhu-cptdi').val());
        var jamGOValue  = $('#jamgo-cptdi').val();
        var tglGOValue  = $('#tglgo-cptdi').val();

        var ajaxData = {
            bloodpressure   : BPValue,
            nadipulse       : NValue,
            pernafasan      : PValue,
            suhu            : SValue,
            jamgo           : jamGOValue,
            tglgo           : tglGOValue,
            id_layanan_pendaftaran: $('#id-layanan-pendaftaran-cptdi').val(),
            id_pendaftaran: $('#id-pendaftaran-cptdi').val(),
            id_user: <?= $this->session->userdata("id_translucent") ?>
        };

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_grafik_observasi") ?>',
            data: ajaxData,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                hideLoader(); // Hide loader before calling grafik function
                if (data.respon !== null) {
                    grafikObservasi(data); // Call grafik function here
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });
        $('#bloodpressure-cptdi').val('');
        $('#nadipulse-cptdi').val('');
        $('#pernafasan-cptdi').val('');
        $('#suhu-cptdi').val('');
        $('#jamgo-cptdi').val('');
        $('#tglgo-cptdi').val('');        
    });

    // GRAFIK OBSERVASI
    function filterEmptyValues(dataArray) {
        return dataArray.filter(value => value !== '');
    }

    // // GRAFIK OBSERVASI
    // function grafikObservasi(data, id_layanan_pendaftaran, id_pendaftaran, action) {
    //     function processData(value) {
    //         if (value === null || value === '' || isNaN(parseFloat(value.replace(',', '.')))) {
    //             return '';
    //         }
    //         return parseFloat(value.replace(',', '.'));
    //     }

    //     var bloodpressure   = data.map(v => processData(v.bloodpressure_cptdi));
    //     var nadipulse       = data.map(v => processData(v.nadipulse_cptdi));
    //     var pernafasan      = data.map(v => processData(v.pernafasan_cptdi));
    //     var suhu            = data.map(v => processData(v.suhu_cptdi));

    //     // Filter data untuk menghapus nilai kosong
    //     bloodpressure   = filterEmptyValues(bloodpressure);
    //     nadipulse       = filterEmptyValues(nadipulse);
    //     pernafasan      = filterEmptyValues(pernafasan);
    //     suhu            = filterEmptyValues(suhu);

    //     // INI SUDAH BENAR DAN MEEPET KELUARYA DATA GRAFIK PERTAMA
    //     var options = {
    //         title: {
    //             text: 'Grafik Observasi', // Judul grafik
    //             style: { fontSize: '15px', fontWeight: 'bold', color: '#333333' } // Gaya teks judul
    //         },
    //         chart: {
    //             height: '500px', // Tinggi grafik
    //             type: 'spline', // Jenis grafik (spline = garis halus)
    //             backgroundColor: '#f4f4f4', // Warna latar belakang grafik
    //             borderColor: '#ccc', // Warna border grafik
    //             borderWidth: 1, // Ketebalan border
    //             plotShadow: true, // Mengaktifkan bayangan di dalam area plot
    //             plotBorderWidth: 1, // Ketebalan border area plot
    //             plotBorderColor: '#ccc', // Warna border area plot
    //             shadow: { 
    //                 color: 'rgba(0, 0, 0, 0.1)', // Warna bayangan 
    //                 offsetX: 3, // Pergeseran bayangan ke kanan
    //                 offsetY: 3, // Pergeseran bayangan ke bawah
    //                 opacity: 0.7, // Transparansi bayangan
    //                 width: 5 // Lebar bayangan
    //             },
    //             animation: { 
    //                 duration: 2000, // Durasi animasi saat grafik dimuat (dalam ms)
    //                 easing: 'easeOutBounce' // Efek animasi bouncing
    //             },
    //             resetZoomButton: { 
    //                 position: { x: -110, y: 10 } // Posisi tombol reset zoom
    //             }
    //         },
    //         xAxis: {
    //             categories: xAxisCategories, // Data pada sumbu X
    //             min: 0, // Nilai minimum sumbu X
    //             max: 40, // Nilai maksimum sumbu X
    //             tickInterval: 1, // Jarak antar-tanda pada sumbu X
    //             gridLineWidth: 1, // Ketebalan garis grid
    //             gridLineColor: '#e6e6e6', // Warna garis grid
    //             title: { 
    //                 text: '', // Judul sumbu X
    //                 style: { fontSize: '16px', color: '#000000', fontWeight: 'bold' } 
    //             },
    //             accessibility: {
    //                 rangeDescription: 'Range: 0 to 40 hours.' // Deskripsi aksesibilitas untuk pembaca layar
    //             },
    //             labels: {
    //                 formatter: function() {
    //                     // Jika nilai antara 1 dan 40, tampilkan label kosong (untuk menghindari tampilan terlalu ramai)
    //                     if (this.value >= 1 && this.value <= 40) {
    //                         return '';
    //                     }
    //                     return '' + this.value;
    //                 }
    //             },
    //             startOnTick: true, // Memastikan grafik dimulai dari titik pertama
    //             endOnTick: false, // Mencegah grafik berhenti di titik terakhir
    //             minPadding: 0, // Mengurangi padding di awal grafik
    //             maxPadding: 0 // Mengurangi padding di akhir grafik
    //         },

    //         // yAxis: {
    //         //     title: {
    //         //         text: 'TANDA<span style="display: inline-block; transform: rotate(-270deg);"></span>', // Kosongkan karena tidak ada label sumbu Y
    //         //         align: 'middle',
    //         //         rotation: -90, // Rotasi label
    //         //         x: 0, // Posisi label
    //         //         useHTML: true // Gunakan HTML dalam teks
    //         //     },
    //         //     accessibility: {
    //         //         rangeDescription: 'Range: 0 to 200.' // Deskripsi aksesibilitas
    //         //     },
    //         //     lineWidth: 2, // Ketebalan garis sumbu Y
    //         //     min: 0, // Nilai minimum sumbu Y
    //         //     max: 200, // Nilai maksimum sumbu Y
    //         //     tickAmount: 21, // Jumlah tanda pada sumbu Y
    //         //     tickInterval: 10, // Jarak antar-tanda pada sumbu Y
    //         //     gridLineWidth: 1, // Ketebalan garis grid
    //         //     gridLineColor: '#e6e6e6' // Warna garis grid
    //         // },

    //         yAxis: {
    //             title: {
    //                 text: 'T<br>A<br>N<br>D<br>A<br><br>V<br>I<br>T<br>A<br>L<br>', // Teks vertikal
    //                 align: 'middle',
    //                 rotation: 0, // Tanpa rotasi
    //                 x: -40, // Geser ke kiri
    //                 useHTML: true
    //             },
    //             accessibility: {
    //                 rangeDescription: 'Range: 0 to 200.'
    //             },
    //             lineWidth: 2,
    //             min: 0,
    //             max: 200,
    //             tickInterval: 20, // Setiap 20
    //             labels: {
    //                 formatter: function () {
    //                     // Tampilkan BP hanya di titik paling atas (200)
    //                     if (this.value === 200) return '200\nBP';
    //                     return this.value;
    //                 },
    //                 style: {
    //                     fontSize: '11px',
    //                     fontWeight: 'bold',
    //                     color: '#000'
    //                 }
    //             },
    //             gridLineWidth: 1,
    //             gridLineColor: '#e6e6e6'
    //         },



    //         series: [
    //             { 
    //                 name: '<span style="font-size:10px;">BP</span>', // Nama seri
    //                 data: bloodpressure, // Data untuk bloodpressure
    //                 marker: { 
    //                     symbol: 'circle', // Bentuk titik data
    //                     radius: 5 // Ukuran titik data
    //                 },
    //                 lineWidth: 1, // Ketebalan garis
    //                 shadow: true, // Aktifkan bayangan pada garis
    //                 color: '#000000', // Warna garis merah
    //                 pointPlacement: 'on' // Memastikan titik berada di atas label sumbu X
    //             },
    //             { 
    //                 name: '<span style="font-size:10px;">N</span>', 
    //                 data: nadipulse, 
    //                 marker: { 
    //                     symbol: 'circle', 
    //                     radius: 5 
    //                 }, 
    //                 lineWidth: 1, 
    //                 shadow: true, 
    //                 color: '#e70c0cff',
    //                 pointPlacement: 'on'
    //             },
    //             { 
    //                 name: '<span style="font-size:10px;">P</span>', 
    //                 data: pernafasan, 
    //                 marker: { 
    //                     symbol: 'circle', 
    //                     radius: 5 
    //                 }, 
    //                 lineWidth: 1, 
    //                 shadow: true, 
    //                 color: '#0cdd0cff',
    //                 pointPlacement: 'on'
    //             },
    //             { 
    //                 name: '<span style="font-size:10px;">S</span>', 
    //                 data: suhu, 
    //                 marker: { 
    //                     symbol: 'circle', 
    //                     radius: 5 
    //                 }, 
    //                 lineWidth: 1, 
    //                 shadow: true, 
    //                 color: '#3b0be8ff',
    //                 pointPlacement: 'on'
    //             }
    //         ],
    //         tooltip: {
    //             headerFormat: '<b>{series.name}</b><br>', // Format header tooltip
    //             pointFormat: '{point.y}', // Format nilai titik data
    //             backgroundColor: 'rgba(255,255,255,0.95)', // Warna latar belakang tooltip
    //             borderColor: '#ccc', // Warna border tooltip
    //             borderRadius: 10, // Bentuk sudut tooltip
    //             style: { fontSize: '10px' }, // Ukuran teks tooltip
    //             shadow: true // Aktifkan bayangan pada tooltip
    //         },
    //         legend: {
    //             enabled: true, // Aktifkan legenda
    //             itemStyle: { fontSize: '14px', fontWeight: 'bold' } // Gaya teks legenda
    //         },
    //         plotOptions: {
    //             series: {
    //                 dataLabels: {
    //                     enabled: true, // Aktifkan label data
    //                     format: '{point.y}', // Format angka pada label data
    //                     style: { fontSize: '12px', color: '#000000', textOutline: '1px contrast' } // Gaya teks label
    //                 },
    //                 enableMouseTracking: true, // Memungkinkan interaksi dengan mouse
    //                 marker: {
    //                     enabled: true, // Aktifkan titik data
    //                     radius: 4, // Ukuran titik data
    //                     states: { 
    //                         hover: { enabled: true, radius: 6 } // Efek hover pada titik data
    //                     }
    //                 }
    //             }
    //         }
    //     };
    //     Highcharts.chart('grafik_observasi', options);
    //     ObServasiGrafikInVasif(data, action); // Pastikan fungsi ObServasiGrafikInVasif didefinisikan
    // }




    // function grafikObservasi(data, id_layanan_pendaftaran, id_pendaftaran, action) {
    //     function processData(value) {
    //         if (value === null || value === '' || isNaN(parseFloat(value.replace(',', '.')))) {
    //             return '';
    //         }
    //         return parseFloat(value.replace(',', '.'));
    //     }

    //     var bloodpressure   = data.map(v => processData(v.bloodpressure_cptdi));
    //     var nadipulse       = data.map(v => processData(v.nadipulse_cptdi));
    //     var pernafasan      = data.map(v => processData(v.pernafasan_cptdi));
    //     var suhu            = data.map(v => processData(v.suhu_cptdi));

    //     // Filter data untuk menghapus nilai kosong
    //     bloodpressure   = filterEmptyValues(bloodpressure);
    //     nadipulse       = filterEmptyValues(nadipulse);
    //     pernafasan      = filterEmptyValues(pernafasan);
    //     suhu            = filterEmptyValues(suhu);

    //     // INI SUDAH BENAR DAN MEEPET KELUARYA DATA GRAFIK PERTAMA
    //     var options = {
    //         title: {
    //             text: 'GRAFIK TANDA VITAL', // Judul grafik
    //             style: { fontSize: '15px', fontWeight: 'bold', color: '#333333' } // Gaya teks judul
    //         },
    //         chart: {
    //             height: '400px', // Tinggi grafik
    //             type: 'spline', // Jenis grafik (spline = garis halus)
    //             backgroundColor: '#f4f4f4', // Warna latar belakang grafik
    //             borderColor: '#ccc', // Warna border grafik
    //             borderWidth: 1, // Ketebalan border
    //             plotShadow: true, // Mengaktifkan bayangan di dalam area plot
    //             plotBorderWidth: 1, // Ketebalan border area plot
    //             plotBorderColor: '#ccc', // Warna border area plot
    //             shadow: { 
    //                 color: 'rgba(0, 0, 0, 0.1)', // Warna bayangan 
    //                 offsetX: 3, // Pergeseran bayangan ke kanan
    //                 offsetY: 3, // Pergeseran bayangan ke bawah
    //                 opacity: 0.7, // Transparansi bayangan
    //                 width: 5 // Lebar bayangan
    //             },
    //             animation: { 
    //                 duration: 2000, // Durasi animasi saat grafik dimuat (dalam ms)
    //                 easing: 'easeOutBounce' // Efek animasi bouncing
    //             },
    //             resetZoomButton: { 
    //                 position: { x: -110, y: 10 } // Posisi tombol reset zoom
    //             }
    //         },
    //         xAxis: {
    //             categories: xAxisCategories, // Data pada sumbu X
    //             min: 0, // Nilai minimum sumbu X
    //             max: 30, // Nilai maksimum sumbu X
    //             tickInterval: 1, // Jarak antar-tanda pada sumbu X
    //             gridLineWidth: 1, // Ketebalan garis grid
    //             gridLineColor: '#e6e6e6', // Warna garis grid
    //             title: { 
    //                 text: '', // Judul sumbu X
    //                 style: { fontSize: '16px', color: '#000000', fontWeight: 'bold' } 
    //             },
    //             accessibility: {
    //                 rangeDescription: 'Range: 0 to 30 hours.' // Deskripsi aksesibilitas untuk pembaca layar
    //             },
    //             labels: {
    //                 formatter: function() {
    //                     // Jika nilai antara 1 dan 30, tampilkan label kosong (untuk menghindari tampilan terlalu ramai)
    //                     if (this.value >= 1 && this.value <= 30) {
    //                         return '';
    //                     }
    //                     return '' + this.value;
    //                 }
    //             },
    //             startOnTick: true, // Memastikan grafik dimulai dari titik pertama
    //             endOnTick: false, // Mencegah grafik berhenti di titik terakhir
    //             minPadding: 0, // Mengurangi padding di awal grafik
    //             maxPadding: 0 // Mengurangi padding di akhir grafik
    //         },

    //         yAxis: {
    //             title: {
    //                 text: '',
    //                 align: 'middle',
    //                 rotation: 0,
    //                 x: -40,
    //                 y: -20,
    //                 useHTML: true
    //             },
    //             accessibility: {
    //                 rangeDescription: 'Range: 0 to 200.'
    //             },
    //             lineWidth: 2,
    //             min: 0,
    //             max: 200,
    //             tickInterval: 20,
    //             // labels: {
    //             //     useHTML: true,
    //             //     formatter: function () {
    //             //         if (this.value === 200) {
    //             //             // BP di atas angka 200
    //             //             return '<div style="text-align:center;"><span style="font-size:10px;">BP</span><br>200</div>';
    //             //         }
    //             //         return this.value;
    //             //     },
    //             //     style: {
    //             //         fontSize: '11px',
    //             //         fontWeight: 'bold',
    //             //         color: '#000'
    //             //     }
    //             // },



    //             // labels: {
    //             //     useHTML: true,
    //             //     formatter: function () {
    //             //         const val = this.value;

    //             //         if (val % 20 === 0) {
    //             //             // Tampilkan header cuma di 200
    //             //             if (val === 200) {
    //             //                 return `
    //             //                     <div style="display:flex; justify-content:space-between; width: 50px; font-size: 10px;">
    //             //                         <b>BP</b><b>N</b>
    //             //                     </div>
    //             //                     <div style="display:flex; justify-content:space-between; width: 50px;">
    //             //                         <span>${val}</span><span>${val}</span>
    //             //                     </div>
    //             //                 `;
    //             //             }

    //             //             return `
    //             //                 <div style="display:flex; justify-content:space-between; width: 50px;">
    //             //                     <span>${val}</span><span>${val}</span>
    //             //                 </div>
    //             //             `;
    //             //         }
    //             //         return null;
    //             //     },
    //             //     style: {
    //             //         fontSize: '11px',
    //             //         fontWeight: 'bold',
    //             //         color: '#000'
    //             //     }
    //             // },


    //             labels: {
    //                 useHTML: true,
    //                 formatter: function () {
    //                     const val = this.value;

    //                     if (val % 20 === 0) {
    //                         // Tampilkan header cuma di 200
    //                         if (val === 200) {
    //                             return `
    //                                 <div style="text-align:center; width:60px; margin:auto;">
    //                                     <div style="display:flex; justify-content:space-between; font-size:10px; font-weight:bold;">
    //                                         <span>BP</span><span>N</span>
    //                                     </div>
    //                                     <div style="display:flex; justify-content:space-between;">
    //                                         <span>${val}</span><span>${val}</span>
    //                                     </div>
    //                                 </div>
    //                             `;
    //                         }

    //                         return `
    //                             <div style="text-align:center; width:60px; margin:auto;">
    //                                 <div style="display:flex; justify-content:space-between;">
    //                                     <span>${val}</span><span>${val}</span>
    //                                 </div>
    //                             </div>
    //                         `;
    //                     }
    //                     return null;
    //                 },
    //                 style: {
    //                     fontSize: '11px',
    //                     fontWeight: 'bold',
    //                     color: '#000'
    //                 }
    //             },



    //             gridLineWidth: 1,
    //             gridLineColor: '#e6e6e6'
    //         },

           


    //         // yAxis1: {
    //         //     title: {
    //         //         text: '',
    //         //         align: 'middle',
    //         //         rotation: 0,
    //         //         x: -40,
    //         //         y: -20,
    //         //         useHTML: true
    //         //     },
    //         //     accessibility: {
    //         //         rangeDescription: 'Range: 0 to 200.'
    //         //     },
    //         //     lineWidth: 2,
    //         //     min: 0,
    //         //     max: 200,
    //         //     tickInterval: 20,
    //         //     labels: {
    //         //         useHTML: true,
    //         //         formatter: function () {
    //         //             if (this.value === 200) {
    //         //                 // BP di atas angka 200
    //         //                 return '<div style="text-align:center;"><span style="font-size:10px;">N</span><br>200</div>';
    //         //             }
    //         //             return this.value;
    //         //         },
    //         //         style: {
    //         //             fontSize: '11px',
    //         //             fontWeight: 'bold',
    //         //             color: '#000'
    //         //         }
    //         //     },
    //         //     gridLineWidth: 1,
    //         //     gridLineColor: '#e6e6e6'
    //         // },

    //         series: [
    //             { 
    //                 name: '<span style="font-size:10px;">BP</span>', // Nama seri
    //                 data: bloodpressure, // Data untuk bloodpressure
    //                 marker: { 
    //                     symbol: 'circle', // Bentuk titik data
    //                     radius: 5 // Ukuran titik data
    //                 },
    //                 lineWidth: 1, // Ketebalan garis
    //                 shadow: true, // Aktifkan bayangan pada garis
    //                 color: '#000000', // Warna garis merah
    //                 pointPlacement: 'on' // Memastikan titik berada di atas label sumbu X
    //             },
    //             { 
    //                 name: '<span style="font-size:10px;">N</span>', 
    //                 data: nadipulse, 
    //                 marker: { 
    //                     symbol: 'circle', 
    //                     radius: 5 
    //                 }, 
    //                 lineWidth: 1, 
    //                 shadow: true, 
    //                 color: '#e70c0cff',
    //                 pointPlacement: 'on'
    //             },



    //             { 
    //                 name: '<span style="font-size:10px;">P</span>', 
    //                 data: pernafasan, 
    //                 marker: { 
    //                     symbol: 'circle', 
    //                     radius: 5 
    //                 }, 
    //                 lineWidth: 1, 
    //                 shadow: true, 
    //                 color: '#0cdd0cff',
    //                 pointPlacement: 'on'
    //             },
    //             { 
    //                 name: '<span style="font-size:10px;">S</span>', 
    //                 data: suhu, 
    //                 marker: { 
    //                     symbol: 'circle', 
    //                     radius: 5 
    //                 }, 
    //                 lineWidth: 1, 
    //                 shadow: true, 
    //                 color: '#3b0be8ff',
    //                 pointPlacement: 'on'
    //             }
    //         ],
    //         tooltip: {
    //             headerFormat: '<b>{series.name}</b><br>', // Format header tooltip
    //             pointFormat: '{point.y}', // Format nilai titik data
    //             backgroundColor: 'rgba(255,255,255,0.95)', // Warna latar belakang tooltip
    //             borderColor: '#ccc', // Warna border tooltip
    //             borderRadius: 10, // Bentuk sudut tooltip
    //             style: { fontSize: '10px' }, // Ukuran teks tooltip
    //             shadow: true // Aktifkan bayangan pada tooltip
    //         },
    //         legend: {
    //             enabled: true, // Aktifkan legenda
    //             itemStyle: { fontSize: '14px', fontWeight: 'bold' } // Gaya teks legenda
    //         },
    //         plotOptions: {
    //             series: {
    //                 dataLabels: {
    //                     enabled: true, // Aktifkan label data
    //                     format: '{point.y}', // Format angka pada label data
    //                     style: { fontSize: '12px', color: '#000000', textOutline: '1px contrast' } // Gaya teks label
    //                 },
    //                 enableMouseTracking: true, // Memungkinkan interaksi dengan mouse
    //                 marker: {
    //                     enabled: true, // Aktifkan titik data
    //                     radius: 4, // Ukuran titik data
    //                     states: { 
    //                         hover: { enabled: true, radius: 6 } // Efek hover pada titik data
    //                     }
    //                 }
    //             }
    //         }
    //     };
    //     Highcharts.chart('grafik_observasi', options);
    //     ObServasiGrafikInVasif(data, action); // Pastikan fungsi ObServasiGrafikInVasif didefinisikan
    // }





    function grafikObservasi(data, id_layanan_pendaftaran, id_pendaftaran, action) {
        function processData(value) {
            if (value === null || value === '' || isNaN(parseFloat(value.replace(',', '.')))) {
                return '';
            }
            return parseFloat(value.replace(',', '.'));
        }

        var bloodpressure   = data.map(v => processData(v.bloodpressure_cptdi));
        var nadipulse       = data.map(v => processData(v.nadipulse_cptdi));
        var pernafasan      = data.map(v => processData(v.pernafasan_cptdi));
        var suhu            = data.map(v => processData(v.suhu_cptdi));

        // Filter data untuk menghapus nilai kosong
        bloodpressure   = filterEmptyValues(bloodpressure);
        nadipulse       = filterEmptyValues(nadipulse);
        pernafasan      = filterEmptyValues(pernafasan);
        suhu            = filterEmptyValues(suhu);

        // INI SUDAH BENAR DAN MEEPET KELUARYA DATA GRAFIK PERTAMA
        var options = {
            title: {
                text: 'GRAFIK TANDA VITAL', // Judul grafik
                style: { fontSize: '15px', fontWeight: 'bold', color: '#333333' } // Gaya teks judul
            },
            chart: {
                height: '400px', // Tinggi grafik
                type: 'spline', // Jenis grafik (spline = garis halus)
                backgroundColor: '#f4f4f4', // Warna latar belakang grafik
                borderColor: '#ccc', // Warna border grafik
                borderWidth: 1, // Ketebalan border
                plotShadow: true, // Mengaktifkan bayangan di dalam area plot
                plotBorderWidth: 1, // Ketebalan border area plot
                plotBorderColor: '#ccc', // Warna border area plot
                shadow: { 
                    color: 'rgba(0, 0, 0, 0.1)', // Warna bayangan 
                    offsetX: 3, // Pergeseran bayangan ke kanan
                    offsetY: 3, // Pergeseran bayangan ke bawah
                    opacity: 0.7, // Transparansi bayangan
                    width: 5 // Lebar bayangan
                },
                animation: { 
                    duration: 2000, // Durasi animasi saat grafik dimuat (dalam ms)
                    easing: 'easeOutBounce' // Efek animasi bouncing
                },
                resetZoomButton: { 
                    position: { x: -110, y: 10 } // Posisi tombol reset zoom
                }
            },
            xAxis: { // Data pada sumbu X
                min: 0, // Nilai minimum sumbu X
                max: 39, // Nilai maksimum sumbu X
                tickInterval: 1, // Jarak antar-tanda pada sumbu X
                gridLineWidth: 1, // Ketebalan garis grid
                gridLineColor: '#e6e6e6', // Warna garis grid
                title: {
                    text: '', // Judul sumbu X
                    style: { fontSize: '16px', color: '#000000', fontWeight: 'bold' }
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 39 hours.' // Deskripsi aksesibilitas untuk pembaca layar
                },
                labels: {
                    formatter: function() { // Jika nilai antara 1 dan 39, tampilkan label kosong (untuk menghindari tampilan terlalu ramai)
                        return (this.value >= 1 && this.value <= 39) ? '' : '' + this.value;
                    }
                },
                startOnTick: true, // Memastikan grafik dimulai dari titik pertama
                endOnTick: false, // Mencegah grafik berhenti di titik terakhir
                minPadding: 0, // Mengurangi padding di awal grafik
                maxPadding: 0 // Mengurangi padding di akhir grafik
            },
            yAxis: {  // ini untuk membuat datadami di tampilan
                title: {
                    text: '',
                    align: 'middle',
                    rotation: 0,
                    x: -40,
                    y: -20,
                    useHTML: true
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 200.'
                },
                lineWidth: 2,
                min: 0,
                max: 200,
                tickInterval: 20,
                labels: {
                    useHTML: true,
                    formatter: function () {
                        const val = this.value;
                        const mapping = {
                            200: { BP: 200, N: 200, P: 44, S: 40 },
                            180: { BP: 180, N: 180, P: 40, S: 39 },
                            160: { BP: 160, N: 160, P: 32, S: 38 },
                            140: { BP: 140, N: 140, P: 28, S: 37 },
                            120: { BP: 120, N: 120, P: 24, S: 36 },
                            100: { BP: 100, N: 100, P: 20, S: 35 },
                            80:  { BP: 80,  N: 80,  P: 16, S: 34 },
                            60:  { BP: 60,  N: 60,  P: 12, S: 33 },
                            40:  { BP: 40,  N: 40,  P: 8,  S: 32 },
                            20:  { BP: 20,  N: 20,  P: 4,  S: 31 },
                            0:   { BP: 0,   N: 0,   P: 0,  S: 0 }
                        };

                        if (val in mapping) {
                            const row = mapping[val];
                            return `
                                <div style="text-align:center; width:100px; margin:auto;">
                                    ${val === 200 ? `
                                        <div style="display:flex; justify-content:space-between; font-size:10px; font-weight:bold;">
                                            <span style="color:black;">BP</span>
                                            <span style="color:red;">N</span>
                                            <span style="color:green;">P</span>
                                            <span style="color:blue;">S</span>
                                        </div>` : ''}
                                    <div style="display:flex; justify-content:space-between;">
                                        <span style="color:black;">${row.BP}</span>
                                        <span style="color:red;">${row.N}</span>
                                        <span style="color:green;">${row.P}</span>
                                        <span style="color:blue;">${row.S}</span>
                                    </div>
                                </div>
                            `;
                        }
                        return null;
                    },
                    style: {
                        fontSize: '11px',
                        fontWeight: 'bold',
                        color: '#000'
                    }
                },
                gridLineWidth: 1,
                gridLineColor: '#e6e6e6'
            },
            series: [
                { 
                    name: '<span style="font-size:10px;">BP</span>',
                    data: bloodpressure,
                    marker: { 
                        symbol: 'circle',
                        radius: 3
                    },
                    lineWidth: 1,
                    shadow: true,
                    color: '#000000',
                    pointStart: 0, // ini untuk mengatur arah titik pada grafik  jadi titiknya bener" nempel ke tabel
                    pointInterval: 1 // ini untuk mengatur arah titik pada grafik  jadi titiknya bener" nempel ke tabel
                },


                { 
                    name: '<span style="font-size:10px;">N</span>', 
                    data: nadipulse, 
                    marker: { 
                        symbol: 'circle', 
                        radius: 3 
                    }, 
                    lineWidth: 1, 
                    shadow: true, 
                    color: '#e70c0cff',
                    pointStart: 0, // ini untuk mengatur arah titik pada grafik  jadi titiknya bener" nempel ke tabel
                    pointInterval: 1 // ini untuk mengatur arah titik pada grafik  jadi titiknya bener" nempel ke tabel
                },
                { 
                    name: '<span style="font-size:10px;">P</span>', 
                    data: pernafasan, 
                    marker: { 
                        symbol: 'circle', 
                        radius: 3 
                    }, 
                    lineWidth: 1, 
                    shadow: true, 
                    color: '#0cdd0cff',
                    pointStart: 0, // ini untuk mengatur arah titik pada grafik  jadi titiknya bener" nempel ke tabel
                    pointInterval: 1 // ini untuk mengatur arah titik pada grafik  jadi titiknya bener" nempel ke tabel
                },
                { 
                    name: '<span style="font-size:10px;">S</span>', 
                    data: suhu, 
                    marker: { 
                        symbol: 'circle', 
                        radius: 3 
                    }, 
                    lineWidth: 1, 
                    shadow: true, 
                    color: '#3b0be8ff',
                    pointStart: 0, // ini untuk mengatur arah titik pada grafik jadi titiknya bener" nempel ke tabel
                    pointInterval: 1 // ini untuk mengatur arah titik pada grafik  jadi titiknya bener" nempel ke tabel
                }
            ],
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>', // Format header tooltip
                pointFormat: '{point.y}', // Format nilai titik data
                backgroundColor: 'rgba(255,255,255,0.95)', // Warna latar belakang tooltip
                borderColor: '#ccc', // Warna border tooltip
                borderRadius: 8, // Bentuk sudut tooltip
                style: { fontSize: '8' }, // Ukuran teks tooltip
                shadow: true // Aktifkan bayangan pada tooltip
            },
            legend: {
                enabled: true, // Aktifkan legenda
                itemStyle: { fontSize: '14px', fontWeight: 'bold' } // Gaya teks legenda
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true, // Aktifkan label data
                        format: '{point.y}', // Format angka pada label data
                        style: { fontSize: '8px', color: '#000000', textOutline: '1px contrast' } // Gaya teks label
                    },
                    enableMouseTracking: true, // Memungkinkan interaksi dengan mouse
                    marker: {
                        enabled: true, // Aktifkan titik data
                        radius: 4, // Ukuran titik data
                        states: { 
                            hover: { enabled: true, radius: 6 } // Efek hover pada titik data
                        }
                    }
                }
            }
        };
        Highcharts.chart('grafik_observasi', options);
        ObServasiGrafikInVasif(data, action); // Pastikan fungsi ObServasiGrafikInVasif didefinisikan
    }











    // GRAFIK OBSERVASI
    function ObServasiGrafikInVasif(data, action) {
        if (data != null) {
            $('#tabel-grafik-observasi .body-table').empty(); // Kosongkan tabel sebelum mengisi ulang

            $.each(data, function (i, v) {
                let html = /* html */ `
                <tr class="row-in-${i + 1}">
                    <td class="number-monitoring" align="center">${i + 1}</td>

                    <td align="center">
                        <span>${v.bloodpressure_cptdi ? v.bloodpressure_cptdi : '-'}</span>
                        <input type="hidden" class="custom-form edit-bloodpressure-cptdi clear-input d-inline-block col-lg-3" value="${v.bloodpressure_cptdi ? v.bloodpressure_cptdi : ''}">
                    </td>
                    <td align="center">
                        <span>${v.nadipulse_cptdi ? v.nadipulse_cptdi : '-'}</span>
                        <input type="hidden" class="custom-form edit-nadipulse-cptdi clear-input d-inline-block col-lg-3" value="${v.nadipulse_cptdi ? v.nadipulse_cptdi : ''}">
                    </td>
                    <td align="center">
                        <span>${v.pernafasan_cptdi ? v.pernafasan_cptdi : '-'}</span>
                        <input type="hidden" class="custom-form edit-pernafasan-cptdi clear-input d-inline-block col-lg-3" value="${v.pernafasan_cptdi ? v.pernafasan_cptdi : ''}">
                    </td>
                    <td align="center">
                        <span>${v.suhu_cptdi ? v.suhu_cptdi : '-'}</span>
                        <input type="hidden" class="custom-form edit-suhu-cptdi clear-input d-inline-block col-lg-3" value="${v.suhu_cptdi ? v.suhu_cptdi : ''}">
                    </td>
                    <td align="center">
                        <span>${v.jamgo_cptdi ? v.jamgo_cptdi : '-'}</span>
                        <input type="hidden" class="custom-form edit-jamgo-cptdi clear-input d-inline-block col-lg-3" value="${v.jamgo_cptdi ? v.jamgo_cptdi : ''}">
                    </td>
                    <td align="center"> <span>${datefmysql(v.tglgo_cptdi)}</span> <input type="hidden" class="custom-form edit-tglgo-cptdi clear-input d-inline-block col-lg-5" value="${datefmysql(v.tglgo_cptdi)}"></td>
                    <td align="center" class="alatGrafikObservasi">
                        <button type="button" class="btn btn-secondary btn-xxs edit-button" onclick="editGrafikObservasi('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="konfirmHapusObservasi('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')" index="${i}" jam="${v.jamgo_cptdi}" tanggal="${v.tglgo_cptdi}" bp="${v.bloodpressure_cptdi}" n="${v.nadipulse_cptdi}" p="${v.pernafasan_cptdi}" s="${v.suhu_cptdi}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                `;

                $('#tabel-grafik-observasi .body-table').append(html);
                var groupAccount = '<?= $this->session->userdata('account_group') ?>';
                var profesi = '<?= $this->session->userdata('profesinadis') ?>';
                if (groupAccount == 'Admin') {
                    profesi = 'Perawat';
                }
                if (action !== 'lihat' ) {
                    $('.alatGrafikObservasi').show();
                } else {
                    $('.alatGrafikObservasi').hide();
                }
            });
        }

    }

    // GRAFIK OBSERVASI
    function konfirmHapusObservasi(id, id_layanan_pendaftaran, id_pendaftaran) {
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
                hapusGrafikObservasiDiag(id, id_layanan_pendaftaran, id_pendaftaran);
            }
        })
    }

    // GRAFIK OBSERVASI
    // function hapusGrafikObservasiDiag(id, id_layanan_pendaftaran, id_pendaftaran) {
    //     $.ajax({
    //         type: 'DELETE',
    //         url: '<?= base_url("pelayanan/api/pelayanan/hapus_grafik_observasi") ?>/' + id + '/' + id_layanan_pendaftaran + '/' + id_pendaftaran,
    //         cache: false,
    //         dataType: 'JSON',
    //         beforeSend: function() {
    //             showLoader();
    //         },
    //         success: function(data) {
    //             hideLoader(); 
    //             if (data.respon !== null) {
    //                 grafikObservasi(data); 
    //             }
    //         },
    //         error: function(e) {
    //             console.error("AJAX Error:", e);
    //             hideLoader(); // Hide loader on error
    //             messageAddFailed();
    //         }
    //     });
    // }


    function hapusGrafikObservasiDiag(id, id_layanan_pendaftaran, id_pendaftaran) {
        var id_user_login = $('#id-user').val(); // Ambil dari hidden input

        $.ajax({
            type: 'DELETE',
            url: '<?= base_url("pelayanan/api/pelayanan/hapus_grafik_observasi") ?>/' 
                + id + '/' + id_layanan_pendaftaran + '/' + id_pendaftaran 
                + '?id_user=' + id_user_login,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader(); 
                if (data.respon !== null) {
                    grafikObservasi(data); 
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); 
                messageAddFailed();
            }
        });
    }


    // GRAFIK OBSERVASI
    function editGrafikObservasi(id, id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_grafik_observasi_by_id") ?>/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#modal-edit-grafik-observasi').modal('show');

                $('#id-edit-cptdi').val(data.id);
                $('#edit-id-layanan-pendaftaran-cptdi').val(data.id_layanan_pendaftaran);
                $('#edit-id-pendaftaran-cptdi').val(data.id_pendaftaran);
                $('#edit-bloodpressure-cptdi').val(data.bloodpressure_cptdi);
                $('#edit-nadipulse-cptdi').val(data.nadipulse_cptdi);
                $('#edit-pernafasan-cptdi').val(data.pernafasan_cptdi);
                $('#edit-suhu-cptdi').val(data.suhu_cptdi);
                $('#edit-jamgo-cptdi').val(data.jamgo_cptdi);
                $('#edit-tglgo-cptdi').val(datefmysql(data.tglgo_cptdi));
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

        $('#btn-update-grafik-observasi').on('click', function() {

            var id          = $('#id-edit-cptdi').val();
            var BPValue     = $('#edit-bloodpressure-cptdi').val() === '' ? null : parseFloat($('#edit-bloodpressure-cptdi').val());
            var NValue      = $('#edit-nadipulse-cptdi').val() === '' ? null : parseFloat($('#edit-nadipulse-cptdi').val());
            var PValue      = $('#edit-pernafasan-cptdi').val() === '' ? null : parseFloat($('#edit-pernafasan-cptdi').val());
            var SValue      = $('#edit-suhu-cptdi').val() === '' ? null : parseFloat($('#edit-suhu-cptdi').val());
            var jamGOValue  = $('#edit-jamgo-cptdi').val();
            var tglGOValue  = $('#edit-tglgo-cptdi').val();
            var idLayananPendaftaranValue = $('#edit-id-layanan-pendaftaran-cptdi').val();
            var idPendaftaranValue = $('#edit-id-pendaftaran-cptdi').val();
            var idUserValue = <?= $this->session->userdata("id_translucent") ?>; // Add this line

            if (isNaN(BPValue) || isNaN(NValue) || isNaN(PValue) || isNaN(SValue)) {
                console.error("Invalid input values for bloodpressure, nadipulse, pernafasan, or suhu.");
                return;
            }

            var ajaxData = {
                id: id,
                edit_bloodpressure: BPValue,
                edit_nadipulse: NValue,
                edit_pernafasan: PValue,
                edit_suhu: SValue,
                edit_jamgo: jamGOValue,
                edit_tglgo: tglGOValue,
                id_layanan_pendaftaran: idLayananPendaftaranValue,
                id_pendaftaran: idPendaftaranValue,
                id_user: idUserValue
            };

            $.ajax({
                type: 'POST',
                url: '<?= base_url("pelayanan/api/pelayanan/update_grafik_observasi") ?>',
                data: ajaxData,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    hideLoader(); 
                    $('#modal-edit-grafik-observasi').modal('hide');
                    if (data.respon !== null) {
                        grafikObservasi(data); 
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