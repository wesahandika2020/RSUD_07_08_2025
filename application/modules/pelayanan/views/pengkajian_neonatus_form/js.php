<script>
    $(function() {
        $("#bwizard_pengkajian_neonatus").bwizard();
        $('#waktu-kajian-neonatus, #tanggal-ttd-perawat-neonatus, #tanggal-ttd-neonatus-dokter, #tangggal-riwayat-kelahiran-bayi, #waktu-kajian-medis-neonatus, #tanggal-ttd-dokter-dpjp-neonatus, #tanggal-ttd-dokter-pengkajian-neonatus')
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

        $('#tanggal-pemeriksaan-lab-neonatus, #tanggal-pemeriksaan-rad-neonatus')
        .datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $("#rk-neonatus-5").datepicker({
            format: 'dd/mm/yyyy',
            // endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });


        // Exspand NEONATUS
        $('#btn-expand-all-neonatus').click(function() {
            $('.collapse').addClass('show');
        });

        $('#btn-collapse-all-neonatus').click(function() {
            $('.collapse').removeClass('show');
        });

        //Nama Perawat Neonatus		
        $('#pilih-perawat-neonatus').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama+'<br/><i>'+data.spesialisasi+'</i>';
                return markup;
            },
            formatSelection: function(data){
                return data.nama;
            }
        });

        //Nama dokter Neonatus
        $('#pilih-dokter-neonatus, #dokter-dpjp-neonatus, #dokter-pengkajian-neonatus').select2c({
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

        //  CEKLIS UNTUK MEMBUKA TEXT 
        $('#kepalaa-9').click(function() {
        if ($(this).is(":checked")) {
                $('#kepalaa-10').prop('disabled', false);
            } else {
                $('#kepalaa-10').val('');
                $('#kepalaa-10').prop('disabled', true);
            }
        });

        $('#mataa-6').click(function() {
        if ($(this).is(":checked")) {
                $('#mataa-7').prop('disabled', false);
            } else {
                $('#mataa-7').val('');
                $('#mataa-7').prop('disabled', true);
            }
        });

        $('#mataa-8').click(function() {
        if ($(this).is(":checked")) {
                $('#mataa-9').prop('disabled', false);
            } else {
                $('#mataa-9').val('');
                $('#mataa-9').prop('disabled', true);
            }
        });

        $('#mataa-10').click(function() {
        if ($(this).is(":checked")) {
                $('#mataa-11').prop('disabled', false);
            } else {
                $('#mataa-11').val('');              
                $('#mataa-11').prop('disabled', true);
            }
        });

        $('#tht-5').click(function() {
        if ($(this).is(":checked")) {
                $('#tht-6').prop('disabled', false);
            } else {mulut-6
                $('#tht-6').val('');              
                $('#tht-6').prop('disabled', true);
            }
        });

        $('#mulut-6').click(function() {
        if ($(this).is(":checked")) {
                $('#mulut-7').prop('disabled', false);
            } else {
                $('#mulut-7').val('');              
                $('#mulut-7').prop('disabled', true);
            }
        });

        $('#gigi-2').click(function() {
        if ($(this).is(":checked")) {
                $('#gigi-3').prop('disabled', false);
            } else {
                $('#gigi-3').val('');            
                $('#gigi-3').prop('disabled', true);
            }
        });

        $('#leher-2').click(function() {
        if ($(this).is(":checked")) {
                $('#leher-3').prop('disabled', false);
            } else {
                $('#leher-3').val('');            
                $('#leher-3').prop('disabled', true);
            }
        });

        $('#dada-4 ').click(function() {
        if ($(this).is(":checked")) {
                $('#dada-5').prop('disabled', false);
            } else {
                $('#dada-5').val('');            
                $('#dada-5').prop('disabled', true);
            }
        });

        $('#paru-12 ').click(function() {
        if ($(this).is(":checked")) {
                $('#paru-13').prop('disabled', false);
            } else {
                $('#paru-13').val('');          
                $('#paru-13').prop('disabled', true);
            }
        });

        $('#paru-14').click(function() {
        if ($(this).is(":checked")) {
                $('#paru-15').prop('disabled', false);
            } else {
                $('#paru-15').val('');          
                $('#paru-15').prop('disabled', true);
            }
        });

        $('#paru-16').click(function() {
        if ($(this).is(":checked")) {
                $('#paru-17').prop('disabled', false);
            } else {
                $('#paru-17').val('');           
                $('#paru-17').prop('disabled', true);
            }
        });

        $('#paru-24').click(function() {
        if ($(this).is(":checked")) {
                $('#paru-25').prop('disabled', false);
            } else {    
                $('#paru-25').prop('disabled', true);
            }
        });

        $('#jantung-3').click(function() {
        if ($(this).is(":checked")) {
                $('#jantung-4').prop('disabled', false);
            } else {
                $('#jantung-4').val('');        
                $('#jantung-4').prop('disabled', true);
            }
        });

        $('#extremitas-4').click(function() {
        if ($(this).is(":checked")) {
                $('#extremitas-5').prop('disabled', false);
            } else {
                $('#extremitas-5').val('');        
                $('#extremitas-5').prop('disabled', true);
            }
        });

        $('#ardomen-5').click(function() {
        if ($(this).is(":checked")) {
                $('#ardomen-6').prop('disabled', false);
            } else {
                $('#ardomen-6').val('');          
                $('#ardomen-6').prop('disabled', true);
            }
        });

        $('#ardomen-7').click(function() {
        if ($(this).is(":checked")) {
                $('#ardomen-8').prop('disabled', false);
            } else {
                $('#ardomen-8').val('');          
                $('#ardomen-8').prop('disabled', true);
            }
        });

        $('#genetalia-1').click(function() {
        if ($(this).is(":checked")) {
                $('#genetalia-2').prop('disabled', false);
            } else {
                $('#genetalia-2').val('');          
                $('#genetalia-2').prop('disabled', true);
            }
        });

        $('#genetalia-3').click(function() {
        if ($(this).is(":checked")) {
                $('#genetalia-4').prop('disabled', false);
            } else {
                $('#genetalia-4').val('');          
                $('#genetalia-4').prop('disabled', true);
            }
        });

        $('#kulit-7').click(function() {
        if ($(this).is(":checked")) {
                $('#kulit-8').prop('disabled', false);
            } else {
                $('#kulit-8').val('');          
                $('#kulit-8').prop('disabled', true);
            }
        });

        $('#extremitass-4').click(function() {
        if ($(this).is(":checked")) {
                $('#extremitass-5').prop('disabled', false);
            } else {
                $('#extremitass-5').val('');         
                $('#extremitass-5').prop('disabled', true);
            }
        });

        $('#masalah-keperawatan-36-neonatus ').click(function() {
        if ($(this).is(":checked")) {
                $('#masalah-keperawatan-lain-input-neonatus').prop('disabled', false);
            } else {
                $('#masalah-keperawatan-lain-input-neonatus').val('');         
                $('#masalah-keperawatan-lain-input-neonatus').prop('disabled', true);
            }
        });

        $('#kriteria-discharge-noenatus-9 ').click(function() {
        if ($(this).is(":checked")) {
                $('#kriteria-discharge-noenatus-10').prop('disabled', false);
            } else {
                $('#kriteria-discharge-noenatus-10').val('');         
                $('#kriteria-discharge-noenatus-10').prop('disabled', true);
            }
        });

        // RIWAYAT PENYAKIT KLUWARGA 
        $('input[name="rpk_medis_neonatus"]').change(function() {
            if ($(this).val() == '1') {
                $('#rpk-medis-neonatus-asma, #rpk-medis-neonatus-dm, #rpk-medis-neonatus-cardiovascular, #rpk-medis-neonatus-kanker, #rpk-medis-neonatus-thalasemia, #rpk-medis-neonatus-lain, #rpk-medis-neonatus-lain-input')
                    .prop('disabled', false);
            } else {
                $('#rpk-medis-neonatus-asma, #rpk-medis-neonatus-dm, #rpk-medis-neonatus-cardiovascular, #rpk-medis-neonatus-kanker, #rpk-medis-neonatus-thalasemia, #rpk-medis-neonatus-lain, #rpk-medis-neonatus-lain-input')
                    .prop('disabled', true);
                // $('#rpk-medis-neonatus-lain-input').val('');
            }
        });

        // SKALA EARLY WARNING EWS PEWS AWAL 
        $('.skalapews').change(function() {
            hitungSkalaEarlyEws()
        })


        

        // PENGKAJIAN MEDIS 
        $('#riwayat_field_neonatus, #hasil_laboratorium_neonatus, #hasil_radiologi_neonatus, #hasil_penunjang_lain_neonatus, #diagnosa_awal_medis_neonatus').summernote({
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
    })

    function resetFormPengkajianAwalNeonatus() {       
        // $('#bwizard_pengkajian_neonatus').bwizard('show', '0');
        $('#form_pengkajian_awal_neonatus')[0].reset();
        // $("input[type='checkbox']").prop('checked',false);
        // $("input[type='radio']").prop('checked',false);
        $('#id-kajian-neonatus, #id-kajian-medis-neonatus').val('');
        $('#agama-islam-neonatus, #agama-kristen-neonatus, #agama-hindu-neonatus, #agama-katholik-neonatus, #agama-buddha-neonatus, #agama-lain-input-neonatus')
            .prop('disabled', true);

        $('#cara-masuk-irj-neonatus, #cara-masuk-igd-neonatus, #cara-masuk-lain-neonatus').prop('disabled', true);

        $('.disabled').attr('disabled', true);

        // MEMUNCULKAN TANGGAL LANGSUNG 
        $('#tanggal-ttd-perawat-neonatus').val('<?= date('d/m/Y H:i') ?>');

        $('#s2id_pilih-perawat-neonatus a .select2c-chosen').html('Pilih Perawat');
        $('#s2id_pilih-dokter-neonatus a .select2c-chosen').html('Pilih Verifikator Dokter DPJP');

        $('#s2id_dokter-dpjp-neonatus a .select2c-chosen').html('Pilih Dokter DPJP');
        $('#s2id_dokter-pengkajian-neonatus a .select2c-chosen').html('Pilih Dokter Pengkajian');

        // CEKLIS TTTD PERAWAT OR DOKTER 
        $('#ceklis-ttd-perawat-neonatus').show();
        $('#ceklis_neonatus_perawat_verified').hide();
        $('#ceklis-ttd-dokter-neonatus').show();         
        $('#ceklis_neonatus_dokter_verified').hide();

        // CEKLIS TTTD DOKTER  OR DOKTER PENGKAJIAN MEDIS 
        $('#ttd-dokter-dpjp-neonatus').show();
        $('#ttd_dokter_dpjp_verified_neonatus').hide();
        $('#ttd-dokter-pengkajian-neonatus').show();         
        $('#ttd_dokter_pengkajian_verified_neonatus').hide();


        $('#waktu-kajian-neonatus, #tangggal-riwayat-kelahiran-bayi, #tanggal-pemeriksaan-lab-neonatus, #tanggal-pemeriksaan-rad-neonatus, #tanggal-ttd-perawat-neonatus, #tanggal-ttd-neonatus-dokter,  #waktu-kajian-medis-neonatus, #tanggal-ttd-dokter-dpjp-neonatus, #tanggal-ttd-dokter-pengkajian-neonatus, #rk-neonatus-5')
            .attr('disabled', false);

        $('#pilih-perawat-neonatus, #pilih-dokter-neonatus, #dokter-dpjp-neonatus, #dokter-pengkajian-neonatus').select2c('readonly',false);

        $('#riwayat_field_neonatus').summernote('code', '');
        $('#hasil_laboratorium_neonatus').summernote('code', '');
        $('#hasil_radiologi_neonatus').summernote('code', '');
        $('#hasil_penunjang_lain_neonatus').summernote('code', '');
        $('#diagnosa_awal_medis_neonatus').summernote('code', '');         
    }

    // ENTRI PENGKAJIAN AWAL NEONATUS AWAL
    function entriPengkajianAwalNeonatus(id_pendaftaran, id_layanan_pendaftaran, bed){
        $('#modal_pengkajian_neonatus').modal('show');
        $('#desclaimer-history-neonatus').html('');
        $('#bwizard_pengkajian_neonatus').bwizard('show', '0');
        $.ajax({
            type: 'GET',
            url: '<?= base_url("rawat_inap/api/rawat_inap/get_data_pengkajian_awal_neonatus") ?>/id/' +id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                resetFormPengkajianAwalNeonatus();
                $('#id-layanan-pendaftaran-neonatus').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-neonatus').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-neonatus').val(data.pasien.id_pasien);
                    $('#nama-pasien-neonatus').text(data.pasien.nama);
                    $('#norm-neonatus').text(data.pasien.no_rm);
                    $('#ttl-neonatus').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jk-neonatus').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

                    // $('#waktu-kajian-neonatus').val((data.tanggal_jam_pengkajian !== null ? datetimefmysql(data.tanggal_jam_pengkajian) : ''));

                    // PENGKAJIAN AWAL NEONATUSAWAL
                    // AGAMA pengkajian awal neonatus AWAL
                    if (data.pasien.agama == 'Islam') {
                        $('#agama-islam-neonatus').prop('checked', true).attr('disabled', false);
                    } else if (data.pasien.agama == 'Kristen') {
                        $('#agama-kristen-neonatus').prop('checked', true).attr('disabled', false);
                    } else if (data.pasien.agama == 'Hindu') {
                        $('#agama-hindu-neonatus').prop('checked', true).attr('disabled', false);
                    } else if (data.pasien.agama == 'Katholik') {
                        $('#agama-katholik-neonatus').prop('checked', true).attr('disabled', false);
                    } else if (data.pasien.agama == 'Buddha') {
                        $('#agama-buddha-neonatus').prop('checked', true).attr('disabled', false);
                    } else if (data.pasien.agama == 'Konghucu') {
                        $('#agama-lain-neonatus').prop('checked', true).attr('disabled', false);
                        $('#agama-lain-input-neonatus').val(data.pasien.agama).attr('disabled', false);
                    } else if (data.pasien.agama == 'Lain-lain') {
                        $('#agama-lain-neonatus').prop('checked', true).attr('disabled', false);
                        syams_validation('#agama-lain-input-neonatus', 'Masukkan agama lain').attr('disabled',
                            false);
                    }
                    if (data.pasien.alergi !== null) {
                        $('#riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                }

                // PENDIDIKAN NEONATUS 
                $('#pendidikan-pasien-neonatus').val(data.pasien.pendidikan);

                // CARA MASUK RS NEONATUS AWAL
                if (data.layanan !== null) {
                    $('#waktu-masuk-neonatus').val((data.layanan.waktu_konfirmasi_ranap !== null ?datetimefmysql(data.layanan.waktu_konfirmasi_ranap) : '<?= date('d/m/Y H:i:s') ?>'));
                    if (data.layanan.before !== null) {
                        if (data.layanan.before.jenis_layanan == 'Poliklinik') {
                            $('#cara-masuk-irj-neonatus').prop('checked', true).attr('disabled', false)
                        }
                        if (data.layanan.before.jenis_layanan == 'IGD') {
                            $('#cara-masuk-igd-neonatus').prop('checked', true).attr('disabled', false)
                        }
                        if (data.layanan.before.jenis_layanan == 'Hemodialisa') {
                            $('#cara-masuk-lain-neonatus').prop('checked', true).attr('disabled', false)
                        }
                        if (data.layanan.before.jenis_layanan == 'Hemodialisa') {
                            $('#cara-masuk-lain-lain-neonatus').val(data.layanan.before.jenis_layanan)
                        }
                    }
                }
                // CARA MASUK RS NEONATUS AKHIR
                if (data.kajian_neonatus !== null) {
                    $('#id-kajian-neonatus').val(data.kajian_neonatus.id);
                    $('#desclaimer_history_neonatus').html('');
                    $('#btn_history_logs_neonatus').hide();
                    if (data !== null) {
                        if (data.update_date !== null) {
                            $('#desclaimer_history_neonatus').html('*) Ada Perubahan Data');
                            $('#btn_history_logs_neonatus').show();
                            $('#btn_history_logs_neonatus').attr('onclick', 'showHistoryLogsNeonatus(' +
                                id_layanan_pendaftaran + ')');
                        }
                    }

                    if (data.kajian_medis_neonatus !== null) { showKajianMedisNeonatus(data.kajian_medis_neonatus);}

                    $('#waktu-kajian-neonatus').val((data.kajian_neonatus.tanggal_jam_pengkajian !== null ?datetimefmysql(data.kajian_neonatus.tanggal_jam_pengkajian) : '<?= date('d/m/Y H:i:s') ?>'));

                    // MEMBAWA OBAT DARI LUAR AKHIR
                    if (data.kajian_neonatus.membawa_obat === 'tidak') { $('#membawa-obatt-1').prop('checked', true).change() }
                    if (data.kajian_neonatus.membawa_obat === 'ya') { $('#membawa-obatt-2').prop('checked', true).change() }  
                                                    
                
                    // NAMA ORANG TUA AWAL
                    // ayah awal
                    const nama_ayah = JSON.parse(data.kajian_neonatus.nama_ayah);
                    if (nama_ayah.data_ayah_1 !== null) { $('#data-ayah-1').val(nama_ayah.data_ayah_1); }
                    if (nama_ayah.data_ayah_2 !== null) { $('#data-ayah-2').val(nama_ayah.data_ayah_2); }
                    if (nama_ayah.data_ayah_3 !== null) { $('#data-ayah-3').val(nama_ayah.data_ayah_3); }
                    if (nama_ayah.data_ayah_4 !== null) { $('#data-ayah-4').val(nama_ayah.data_ayah_4); }
                    if (nama_ayah.data_ayah_5 !== null) { $('#data-ayah-5').val(nama_ayah.data_ayah_5); }
                    if (nama_ayah.data_ayah_6 !== null) { $('#data-ayah-6').val(nama_ayah.data_ayah_6); }
                    if (nama_ayah.data_ayah_7 !== null) {  $('#data-ayah-7').val(nama_ayah.data_ayah_7); }
                    // ayah akhir

                    // ibu awal
                    const nama_ibu = JSON.parse(data.kajian_neonatus.nama_ibu);
                    if (nama_ibu.data_ibu_1 !== null) {
                        $('#data-ibu-1').val(nama_ibu.data_ibu_1);
                    }
                    if (nama_ibu.data_ibu_2 !== null) {
                        $('#data-ibu-2').val(nama_ibu.data_ibu_2);
                    }
                    if (nama_ibu.data_ibu_3 !== null) {
                        $('#data-ibu-3').val(nama_ibu.data_ibu_3);
                    }
                    if (nama_ibu.data_ibu_4 !== null) {
                        $('#data-ibu-4').val(nama_ibu.data_ibu_4);
                    }
                    if (nama_ibu.data_ibu_5 !== null) {
                        $('#data-ibu-5').val(nama_ibu.data_ibu_5);
                    }
                    if (nama_ibu.data_ibu_6 !== null) {
                        $('#data-ibu-6').val(nama_ibu.data_ibu_6);
                    }
                    if (nama_ibu.data_ibu_7 !== null) {
                        $('#data-ibu-7').val(nama_ibu.data_ibu_7);
                    }
                    // ibu akhir
                    // NAMA ORANG TUA AKHIR

                    // RIWAYAT KEHAMILAN DAN PERSALINAN IBU AWAL
                    const riwayat_kehamilan_persalinan = JSON.parse(data.kajian_neonatus.riwayat_kehamilan_persalinan);
                    if (riwayat_kehamilan_persalinan.riwayat_kdpi_1 !== null) {
                        $('#riwayat-kdpi-1').val(riwayat_kehamilan_persalinan.riwayat_kdpi_1);
                    }
                    if (riwayat_kehamilan_persalinan.riwayat_kdpi_2 !== null) {
                        $('#riwayat-kdpi-2').val(riwayat_kehamilan_persalinan.riwayat_kdpi_2);
                    }
                    if (riwayat_kehamilan_persalinan.riwayat_kdpi_3 !== null) {
                        $('#riwayat-kdpi-3').val(riwayat_kehamilan_persalinan.riwayat_kdpi_3);
                    }
                    if (riwayat_kehamilan_persalinan.riwayat_kdpi_4 !== null) {
                        $('#riwayat-kdpi-4').val(riwayat_kehamilan_persalinan.riwayat_kdpi_4);
                    }
                    if (riwayat_kehamilan_persalinan.riwayat_kdpi_5 !== null) {
                        $('#riwayat-kdpi-5').val(riwayat_kehamilan_persalinan.riwayat_kdpi_5);
                    }
                    if (riwayat_kehamilan_persalinan.riwayat_kdpi_6 !== null) {
                        $('#riwayat-kdpi-6').val(riwayat_kehamilan_persalinan.riwayat_kdpi_6);
                    }
                    if (riwayat_kehamilan_persalinan.riwayat_kdpi_7 !== null) {
                        $('#riwayat-kdpi-7').val(riwayat_kehamilan_persalinan.riwayat_kdpi_7);
                    }
                    // RIWAYAT KEHAMILAN DAN PERSALINAN IBU AKHIR

                    // RIWAYAT KELAHIRAN BAYI AWAL 
                    $('#tangggal-riwayat-kelahiran-bayi').val((data.kajian_neonatus.tanggal_lahir_riwayat !== null ?datetimefmysql(data.kajian_neonatus.tanggal_lahir_riwayat) : ''));
                    // var_dump(tangggal-riwayat-kelahiran-bayi);die;
                    const riwayat_kehamilan_bayi = JSON.parse(data.kajian_neonatus.riwayat_kehamilan_bayi);
                    if (riwayat_kehamilan_bayi.riwayat_kb_1 !== null) {
                        $('#riwayat-kb-1').val(riwayat_kehamilan_bayi.riwayat_kb_1);
                    }
                    if (riwayat_kehamilan_bayi.riwayat_kb_2 !== null) {
                        $('#riwayat-kb-2').val(riwayat_kehamilan_bayi.riwayat_kb_2);
                    }
                    if (riwayat_kehamilan_bayi.riwayat_kb_3 !== null) {
                        $('#riwayat-kb-3').val(riwayat_kehamilan_bayi.riwayat_kb_3);
                    }
                    if (riwayat_kehamilan_bayi.riwayat_kb_4 !== null) {
                        $('#riwayat-kb-4').val(riwayat_kehamilan_bayi.riwayat_kb_4);
                    }
                    if (riwayat_kehamilan_bayi.riwayat_kb_5 !== null) {
                        $('#riwayat-kb-5').val(riwayat_kehamilan_bayi.riwayat_kb_5);
                    }


                    const riwayat_kehamilan_bayii = JSON.parse(data.kajian_neonatus.riwayat_kehamilan_bayii);
                    if (riwayat_kehamilan_bayii.riwayat_kb_6 !== null) {
                        $('#riwayat-kb-6').val(riwayat_kehamilan_bayii.riwayat_kb_6);
                    }
                    if (riwayat_kehamilan_bayii.riwayat_kb_7 !== null) {
                        $('#riwayat-kb-7').val(riwayat_kehamilan_bayii.riwayat_kb_7);
                    }
                    if (riwayat_kehamilan_bayii.riwayat_kb_8 !== null) {
                        $('#riwayat-kb-8').val(riwayat_kehamilan_bayii.riwayat_kb_8);
                    }
                    if (riwayat_kehamilan_bayii.riwayat_kb_9 !== null) {
                        $('#riwayat-kb-9').val(riwayat_kehamilan_bayii.riwayat_kb_9);
                    }
                    if (riwayat_kehamilan_bayii.riwayat_kb_10 !== null) {
                        $('#riwayat-kb-10').val(riwayat_kehamilan_bayii.riwayat_kb_10);
                    }
                    if (riwayat_kehamilan_bayii.riwayat_kb_11 !== null) {
                        $('#riwayat-kb-11').val(riwayat_kehamilan_bayii.riwayat_kb_11);
                    }
                    // RIWAYAT KELAHIRAN BAYI AKHIR


                    // APGAR SKORE AWAL 
                    const apgar_frekuensi_jantung = JSON.parse(data.kajian_neonatus.apgar_frekuensi_jantung);
                        if (apgar_frekuensi_jantung.apgar_frekuensi_1 !== null) { $('#apgar-frekuensi-1').prop('checked', true) }
                        if (apgar_frekuensi_jantung.apgar_frekuensi_2 !== null) { $('#apgar-frekuensi-2').prop('checked', true) }
                        if (apgar_frekuensi_jantung.apgar_frekuensi_3 !== null) { $('#apgar-frekuensi-3').prop('checked', true) }
                        if (apgar_frekuensi_jantung.apgar_frekuensi_4 !== null) { $('#apgar-frekuensi-4').prop('checked', true) }
                        if (apgar_frekuensi_jantung.apgar_frekuensi_6 !== null) { $('#apgar-frekuensi-6').prop('checked', true) }

                    const apgar_usaha_nafas = JSON.parse(data.kajian_neonatus.apgar_usaha_nafas);
                        if (apgar_usaha_nafas.apgar_usaha_1 !== null) { $('#apgar-usaha-1').prop('checked', true) }
                        if (apgar_usaha_nafas.apgar_usaha_2 !== null) { $('#apgar-usaha-2').prop('checked', true) }
                        if (apgar_usaha_nafas.apgar_usaha_3 !== null) { $('#apgar-usaha-3').prop('checked', true) }
                        if (apgar_usaha_nafas.apgar_usaha_4 !== null) { $('#apgar-usaha-4').prop('checked', true) }
                        if (apgar_usaha_nafas.apgar_usaha_6 !== null) { $('#apgar-usaha-6').prop('checked', true) }

                    const apgar_tonus_otot = JSON.parse(data.kajian_neonatus.apgar_tonus_otot);
                        if (apgar_tonus_otot.apgar_tonus_1 !== null) { $('#apgar-tonus-1').prop('checked', true) }
                        if (apgar_tonus_otot.apgar_tonus_2 !== null) { $('#apgar-tonus-2').prop('checked', true) }
                        if (apgar_tonus_otot.apgar_tonus_3 !== null) { $('#apgar-tonus-3').prop('checked', true) }
                        if (apgar_tonus_otot.apgar_tonus_4 !== null) { $('#apgar-tonus-4').prop('checked', true) }
                        if (apgar_tonus_otot.apgar_tonus_6 !== null) { $('#apgar-tonus-6').prop('checked', true) }

                    const apgar_refleksi = JSON.parse(data.kajian_neonatus.apgar_refleksi);
                        if (apgar_refleksi.apgar_refleksi_1 !== null) { $('#apgar-refleksi-1').prop('checked', true) }
                        if (apgar_refleksi.apgar_refleksi_2 !== null) { $('#apgar-refleksi-2').prop('checked', true) }
                        if (apgar_refleksi.apgar_refleksi_3 !== null) { $('#apgar-refleksi-3').prop('checked', true) }
                        if (apgar_refleksi.apgar_refleksi_4 !== null) { $('#apgar-refleksi-4').prop('checked', true) }
                        if (apgar_refleksi.apgar_refleksi_6 !== null) { $('#apgar-refleksi-6').prop('checked', true) }

                    const apgar_warna = JSON.parse(data.kajian_neonatus.apgar_warna);
                        if (apgar_warna.apgar_warna_1 !== null) { $('#apgar-warna-1').prop('checked', true) }
                        if (apgar_warna.apgar_warna_2 !== null) { $('#apgar-warna-2').prop('checked', true) }
                        if (apgar_warna.apgar_warna_3 !== null) { $('#apgar-warna-3').prop('checked', true) }
                        if (apgar_warna.apgar_warna_4 !== null) { $('#apgar-warna-4').prop('checked', true) }
                        if (apgar_warna.apgar_warna_6 !== null) { $('#apgar-warna-6').prop('checked', true) }

                    const apgar_skor_1 = JSON.parse(data.kajian_neonatus.apgar_skor_1);
                        if (apgar_skor_1.total_skor_1 !== null) {$('#total-skor-1').val(apgar_skor_1.total_skor_1);}
                        if (apgar_skor_1.total_skor_1_1 !== null) {$('#total-skor-1-1').val(apgar_skor_1.total_skor_1_1);}
                        if (apgar_skor_1.total_skor_1_1_1 !== null) {$('#total-skor-1-1-1').val(apgar_skor_1.total_skor_1_1_1);}
                        if (apgar_skor_1.total_skor_1_1_1_1 !== null) {$('#total-skor-1-1-1-1').val(apgar_skor_1.total_skor_1_1_1_1);}
                        if (apgar_skor_1.total_skor_1_1_1_1_1 !== null) {$('#total-skor-1-1-1-1-1').val(apgar_skor_1.total_skor_1_1_1_1_1);}


                    const apgar_skor_2 = JSON.parse(data.kajian_neonatus.apgar_skor_2);
                        if (apgar_skor_2.total_skor_2 !== null) {$('#total-skor-2').val(apgar_skor_2.total_skor_2);}
                        if (apgar_skor_2.total_skor_2_2 !== null) {$('#total-skor-2-2').val(apgar_skor_2.total_skor_2_2);}
                        if (apgar_skor_2.total_skor_2_2_2 !== null) {$('#total-skor-2-2-2').val(apgar_skor_2.total_skor_2_2_2);}
                        if (apgar_skor_2.total_skor_2_2_2_2 !== null) {$('#total-skor-2-2-2-2').val(apgar_skor_2.total_skor_2_2_2_2);}
                        if (apgar_skor_2.total_skor_2_2_2_2_2 !== null) {$('#total-skor-2-2-2-2-2').val(apgar_skor_2.total_skor_2_2_2_2_2);}      
                    // APGAR SKORE AKHIR 


                    // PEMERIKSAAN FISIK DAN TANDA-TANDA FITAL AWAL
                    const pemeriksaan_fisik_dan_ttv = JSON.parse(data.kajian_neonatus.pemeriksaan_fisik_dan_ttv);
                        if (pemeriksaan_fisik_dan_ttv.pemeriksaan_fdttl_1 !== null) {
                            $('#pemeriksaan-fdttl-1').val(pemeriksaan_fisik_dan_ttv.pemeriksaan_fdttl_1);
                        }
                        if (pemeriksaan_fisik_dan_ttv.pemeriksaan_fdttl_2 !== null) {
                            $('#pemeriksaan-fdttl-2').val(pemeriksaan_fisik_dan_ttv.pemeriksaan_fdttl_2);
                        }
                        if (pemeriksaan_fisik_dan_ttv.pemeriksaan_fdttl_3 !== null) {
                            $('#pemeriksaan-fdttl-3').val(pemeriksaan_fisik_dan_ttv.pemeriksaan_fdttl_3);
                        }
                        if (pemeriksaan_fisik_dan_ttv.pemeriksaan_fdttl_4 !== null) {
                            $('#pemeriksaan-fdttl-4').val(pemeriksaan_fisik_dan_ttv.pemeriksaan_fdttl_4);
                        }
                    // PEMERIKSAAN FISIK DAN TANDA-TANDA FITAL AKHIR

                    // PENGKAJIAN NYERI AWAL 
                    // NEONATUS AWAL
                    const neonatusj = JSON.parse(data.kajian_neonatus.neonatusj);
                        if (neonatusj.menangisj === '0') {
                            $('#menangisj-0').prop('checked', true).change()
                        }

                        if (neonatusj.menangisj === '1') {
                            $('#menangisj-1').prop('checked', true).change()
                        }
                        if (neonatusj.menangisj === '2') {
                            $('#menangisj-2').prop('checked', true).change()
                        }


                        if (neonatusj.spoj === '0') {
                            $('#spoj-0').prop('checked', true).change()
                        }
                        if (neonatusj.spoj === '1') {
                            $('#spoj-1').prop('checked', true).change()
                        }
                        if (neonatusj.spoj === '2') {
                            $('#spoj-2').prop('checked', true).change()
                        }

                        if (neonatusj.vitalj === '0') {
                            $('#vitalj-0').prop('checked', true).change()
                        }
                        if (neonatusj.vitalj === '1') {
                            $('#vitalj-1').prop('checked', true).change()
                        }
                        if (neonatusj.vitalj === '2') {
                            $('#vitalj-2').prop('checked', true).change()
                        }

                        if (neonatusj.wajahj === '0') {
                            $('#wajahj-0').prop('checked', true).change()
                        }
                        if (neonatusj.wajahj === '1') {
                            $('#wajahj-1').prop('checked', true).change()
                        }
                        if (neonatusj.wajahj === '2') {
                            $('#wajahj-2').prop('checked', true).change()
                        }

                        if (neonatusj.tidurj === '0') {
                            $('#tidurj-0').prop('checked', true).change()
                        }
                        if (neonatusj.tidurj === '1') {
                            $('#tidurj-1').prop('checked', true).change()
                        }
                        if (neonatusj.tidurj === '2') {
                            $('#tidurj-2').prop('checked', true).change()
                        }
                    // NEONATUS AKHIR

                    // KETERANGAN NYERI
                    const ket_nyerii = JSON.parse(data.kajian_neonatus.ket_nyerii);
                        if (ket_nyerii.ptn_keterangan === 'Tidak Nyeri') {
                            $('#ptn-keterangan-tidak').prop('checked', true).change()
                        }
                        if (ket_nyerii.ptn_keterangan === 'Ringan') {
                            $('#ptn-keterangan-ringan').prop('checked', true).change()
                        }
                        if (ket_nyerii.ptn_keterangan === 'Sedang') {
                            $('#ptn-keterangan-sedang').prop('checked', true).change()
                        }
                        if (ket_nyerii.ptn_keterangan === 'Berat') {
                            $('#ptn-keterangan-berat').prop('checked', true).change()
                        }
                    // PENGKAJIAN NYERI AKHIR 
                    
                    // PEMERIKSAAN NYERI AWAL 2 AWAL
                    // KEPALA
                    const pengkajian_nyeri_kepala = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_kepala);
                        if (pengkajian_nyeri_kepala.kepalaa_1 !== null) {$('#kepalaa-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_2 !== null) {$('#kepalaa-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_3 !== null) {$('#kepalaa-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_4 !== null) {$('#kepalaa-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_5 !== null) {$('#kepalaa-5').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_6 !== null) {$('#kepalaa-6').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_7 !== null) {$('#kepalaa-7').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_8 !== null) {$('#kepalaa-8').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_9 !== null) { $('#kepalaa-9').prop('checked', true).change()}
                        if (pengkajian_nyeri_kepala.kepalaa_10 !== null) { $('#kepalaa-10').val(pengkajian_nyeri_kepala.kepalaa_10);  }
                        if (pengkajian_nyeri_kepala.kepalaa_11 !== null) {$('#kepalaa-11').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_12 !== null) {$('#kepalaa-12').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_13 !== null) {$('#kepalaa-13').prop('checked', true).change() }
                        if (pengkajian_nyeri_kepala.kepalaa_14 !== null) {$('#kepalaa-14').prop('checked', true).change() }


                    // MATA
                    const pengkajian_nyeri_mata = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_mata);
                        if (pengkajian_nyeri_mata.mataa_1 !== null) { $('#mataa-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_mata.mataa_2 !== null) { $('#mataa-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_mata.mataa_3 !== null) { $('#mataa-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_mata.mataa_4 !== null) { $('#mataa-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_mata.mataa_5 !== null) { $('#mataa-5').prop('checked', true).change() }
                        if (pengkajian_nyeri_mata.mataa_6 !== null) { $('#mataa-6').prop('checked', true).change() }
                        if (pengkajian_nyeri_mata.mataa_7 !== null) { $('#mataa-7').val(pengkajian_nyeri_mata.mataa_7);  }
                        if (pengkajian_nyeri_mata.mataa_8 !== null) { $('#mataa-8').prop('checked', true).change() }
                        if (pengkajian_nyeri_mata.mataa_9 !== null) { $('#mataa-9').val(pengkajian_nyeri_mata.mataa_9);  }
                        if (pengkajian_nyeri_mata.mataa_10 !== null) { $('#mataa-10').prop('checked', true).change() }
                        if (pengkajian_nyeri_mata.mataa_11 !== null) { $('#mataa-11').val(pengkajian_nyeri_mata.mataa_11);  }


                    // THT
                    const pengkajian_nyeri_tht = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_tht);
                        if (pengkajian_nyeri_tht.tht_1 !== null) { $('#tht-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_tht.tht_2 !== null) { $('#tht-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_tht.tht_3 !== null) { $('#tht-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_tht.tht_4 !== null) { $('#tht-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_tht.tht_5 !== null) { $('#tht-5').prop('checked', true).change() }
                        if (pengkajian_nyeri_tht.tht_6 !== null) { $('#tht-6').val(pengkajian_nyeri_tht.tht_6);  }


                    // MULUT
                    const pengkajian_nyeri_mulut = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_mulut);
                        if (pengkajian_nyeri_mulut.mulut_1 !== null) { $('#mulut-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_mulut.mulut_2 !== null) { $('#mulut-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_mulut.mulut_3 !== null) { $('#mulut-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_mulut.mulut_4 !== null) { $('#mulut-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_mulut.mulut_5 !== null) { $('#mulut-5').prop('checked', true).change() }
                        if (pengkajian_nyeri_mulut.mulut_6 !== null) { $('#mulut-6').prop('checked', true).change() }
                        if (pengkajian_nyeri_mulut.mulut_7 !== null) { $('#mulut-7').val(pengkajian_nyeri_mulut.mulut_7);  }
    

                    // GIGI
                    const pengkajian_nyeri_gigi = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_gigi);
                        if (pengkajian_nyeri_gigi.gigi_1 !== null) {$('#gigi-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_gigi.gigi_2 !== null) { $('#gigi-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_gigi.gigi_3 !== null) {$('#gigi-3').val(pengkajian_nyeri_gigi.gigi_3); }
                

                    // LEHER
                    const pengkajian_nyeri_leher = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_leher);
                        if (pengkajian_nyeri_leher.leher_1 !== null) { $('#leher-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_leher.leher_2 !== null) { $('#leher-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_leher.leher_3 !== null) { $('#leher-3').val(pengkajian_nyeri_leher.leher_3); }

                    // DADA
                    const pengkajian_nyeri_dada = JSON.parse(data.kajian_neonatus .pengkajian_nyeri_dada);
                        if (pengkajian_nyeri_dada.dada_1 !== null) { $('#dada-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_dada.dada_2 !== null) { $('#dada-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_dada.dada_3 !== null) { $('#dada-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_dada.dada_4 !== null) { $('#dada-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_dada.dada_5 !== null) { $('#dada-5').val(pengkajian_nyeri_dada.dada_5); }
                        if (pengkajian_nyeri_dada.dada_6 !== null) { $('#dada-6').prop('checked', true).change() }
                        if (pengkajian_nyeri_dada.dada_7 !== null) { $('#dada-7').prop('checked', true).change() }
                    

                    // PARU-PARU
                    const pengkajian_nyeri_paru_paru = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_paru_paru);
                        if (pengkajian_nyeri_paru_paru.paru_1 !== null) { $('#paru-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_2 !== null) { $('#paru-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_3 !== null) { $('#paru-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_4 !== null) { $('#paru-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_5 !== null) { $('#paru-5').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_6 !== null) { $('#paru-6').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_7 !== null) { $('#paru-7').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_8 !== null) { $('#paru-8').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_9 !== null) { $('#paru-9').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_10 !== null) { $('#paru-10').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_11 !== null) { $('#paru-11').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_12 !== null) { $('#paru-12').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_13 !== null) { $('#paru-13').val(pengkajian_nyeri_paru_paru.paru_13); }
                        if (pengkajian_nyeri_paru_paru.paru_14 !== null) { $('#paru-14').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_15 !== null) { $('#paru-15').val(pengkajian_nyeri_paru_paru.paru_15); }
                        if (pengkajian_nyeri_paru_paru.paru_16 !== null) { $('#paru-16').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_17 !== null) { $('#paru-17').val(pengkajian_nyeri_paru_paru.paru_17); }
                        if (pengkajian_nyeri_paru_paru.paru_18 !== null) { $('#paru-18').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_19 !== null) { $('#paru-19').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_20 === '0') { $('#paru-20').prop('checked', true).change()  }
                        if (pengkajian_nyeri_paru_paru.paru_20 === '1') { $('#paru-21').prop('checked', true).change()  }
                        if (pengkajian_nyeri_paru_paru.paru_22 !== null) { $('#paru-22').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_23 !== null) { $('#paru-23').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_24 !== null) { $('#paru-24').prop('checked', true).change() }
                        if (pengkajian_nyeri_paru_paru.paru_25 !== null) { $('#paru-25').val(pengkajian_nyeri_paru_paru.paru_25); }

                    // JANTUNG
                    const pengkajian_nyeri_jantung = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_jantung);
                        if (pengkajian_nyeri_jantung.jantung_1 !== null) { $('#jantung-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_jantung.jantung_2 !== null) { $('#jantung-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_jantung.jantung_3 !== null) { $('#jantung-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_jantung.jantung_4 !== null) { $('#jantung-4').val(pengkajian_nyeri_jantung.jantung_4); }                              

                    // EXTREMITAS ATAS
                    const pengkajian_nyeri_extremitas_atas = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_extremitas_atas);
                        if (pengkajian_nyeri_extremitas_atas.extremitas_1 !== null) {$('#extremitas-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_extremitas_atas.extremitas_2 !== null) { $('#extremitas-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_extremitas_atas.extremitas_3 !== null) { $('#extremitas-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_extremitas_atas.extremitas_4 !== null) { $('#extremitas-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_extremitas_atas.extremitas_5 !== null) { $('#extremitas-5').val(pengkajian_nyeri_extremitas_atas.extremitas_5); }
                        if (pengkajian_nyeri_extremitas_atas.extremitas_6 !== null) { $('#extremitas-6').prop('checked', true).change() }
                        if (pengkajian_nyeri_extremitas_atas.extremitas_7 !== null) { $('#extremitas-7').prop('checked', true).change() }

                    // ABDOMEN
                    const pengkajian_nyeri_abdomen = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_abdomen);
                        if (pengkajian_nyeri_abdomen.ardomen_1 !== null) { $('#ardomen-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_abdomen.ardomen_2 !== null) { $('#ardomen-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_abdomen.ardomen_3 !== null) { $('#ardomen-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_abdomen.ardomen_4 !== null) { $('#ardomen-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_abdomen.ardomen_5 !== null) { $('#ardomen-5').prop('checked', true).change() }
                        if (pengkajian_nyeri_abdomen.ardomen_6 !== null) { $('#ardomen-6').val(pengkajian_nyeri_abdomen.ardomen_6); }
                        if (pengkajian_nyeri_abdomen.ardomen_7 !== null) { $('#ardomen-7').prop('checked', true).change() }
                        if (pengkajian_nyeri_abdomen.ardomen_8 !== null) { $('#ardomen-8').val(pengkajian_nyeri_abdomen.ardomen_8); }

                    // UMBILIKAL
                    const pengkajian_nyeri_umbilikal = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_umbilikal);
                        if (pengkajian_nyeri_umbilikal.umbilikal_1 !== null) { $('#umbilikal-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_umbilikal.umbilikal_2 !== null) { $('#umbilikal-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_umbilikal.umbilikal_3 !== null) { $('#umbilikal-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_umbilikal.umbilikal_4 !== null) { $('#umbilikal-4').prop('checked', true).change() }

                    // GENETALIA
                    const pengkajian_nyeri_genetalia = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_genetalia);
                        if (pengkajian_nyeri_genetalia.genetalia_1 !== null) { $('#genetalia-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_genetalia.genetalia_2 !== null) { $('#genetalia-2').val(pengkajian_nyeri_genetalia.genetalia_2); }
                        if (pengkajian_nyeri_genetalia.genetalia_3 !== null) { $('#genetalia-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_genetalia.genetalia_4 !== null) { $('#genetalia-4').val(pengkajian_nyeri_genetalia.genetalia_4); }

                    // ANUS
                    const pengkajian_nyeri_anus = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_anus);
                        if (pengkajian_nyeri_anus.anus_1 === '1') { $('#anus-1').prop('checked', true).change()  }
                        if (pengkajian_nyeri_anus.anus_1 === '0') { $('#anus-2').prop('checked', true).change()  }

                    // KULIT
                    const pengkajian_nyeri_kulit = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_kulit);
                        if (pengkajian_nyeri_kulit.kulit_1 !== null) { $('#kulit-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_kulit.kulit_2 !== null) { $('#kulit-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_kulit.kulit_3 !== null) { $('#kulit-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_kulit.kulit_4 !== null) { $('#kulit-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_kulit.kulit_5 !== null) { $('#kulit-5').prop('checked', true).change() }
                        if (pengkajian_nyeri_kulit.kulit_6 !== null) { $('#kulit-6').prop('checked', true).change() }
                        if (pengkajian_nyeri_kulit.kulit_7 !== null) { $('#kulit-7').prop('checked', true).change() }
                        if (pengkajian_nyeri_kulit.kulit_8 !== null) { $('#kulit-8').val(pengkajian_nyeri_kulit.kulit_8); }

                    // REFLEKS
                    const pengkajian_nyeri_refleks = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_refleks);
                        if (pengkajian_nyeri_refleks.refleks_1 !== null) { $('#refleks-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_refleks.refleks_2 !== null) { $('#refleks-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_refleks.refleks_3 !== null) { $('#refleks-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_refleks.refleks_4 !== null) { $('#refleks-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_refleks.refleks_5 !== null) { $('#refleks-5').prop('checked', true).change() }
                        if (pengkajian_nyeri_refleks.refleks_6 !== null) { $('#refleks-6').prop('checked', true).change() }

                    // TONUS OTOT
                    const pengkajian_nyeri_otot_tonus = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_otot_tonus);
                        if (pengkajian_nyeri_otot_tonus.tonus_1 !== null) { $('#tonus-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_otot_tonus.tonus_2 !== null) { $('#tonus-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_otot_tonus.tonus_3 !== null) { $('#tonus-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_otot_tonus.tonus_4 !== null) { $('#tonus-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_otot_tonus.tonus_5 !== null) { $('#tonus-5').prop('checked', true).change() }
                        if (pengkajian_nyeri_otot_tonus.tonus_6 !== null) { $('#tonus-6').prop('checked', true).change() }
                        if (pengkajian_nyeri_otot_tonus.tonus_7 !== null) { $('#tonus-7').prop('checked', true).change() }
                        if (pengkajian_nyeri_otot_tonus.tonus_8 !== null) { $('#tonus-8').prop('checked', true).change() }

                    // EXTREMITAS BAWAH
                    const pengkajian_nyeri_ektremitas_bawah = JSON.parse(data.kajian_neonatus.pengkajian_nyeri_ektremitas_bawah);
                        if (pengkajian_nyeri_ektremitas_bawah.extremitass_1 !== null) { $('#extremitass-1').prop('checked', true).change() }
                        if (pengkajian_nyeri_ektremitas_bawah.extremitass_2 !== null) { $('#extremitass-2').prop('checked', true).change() }
                        if (pengkajian_nyeri_ektremitas_bawah.extremitass_3 !== null) { $('#extremitass-3').prop('checked', true).change() }
                        if (pengkajian_nyeri_ektremitas_bawah.extremitass_4 !== null) { $('#extremitass-4').prop('checked', true).change() }
                        if (pengkajian_nyeri_ektremitas_bawah.extremitass_5 !== null) {  $('#extremitass-5').val(pengkajian_nyeri_ektremitas_bawah .extremitass_5);  }
                    // PEMERIKSAAN NYERI AWAL 2 AKHIR

                    // SKALA ERLY WARNING SYSTEM EWS / PEWS AWAL 
                    if (data.kajian_neonatus.pews_suhu == '2_1') {
                        $('#skalapews-1-1').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_suhu == '1_2') {
                        $('#skalapews-1-2').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_suhu == '0_3') {
                        $('#skalapews-1-3').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_suhu == '1_4') {
                        $('#skalapews-1-4').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_suhu == '2_5') {
                        $('#skalapews-1-5').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.pews_pernafasan == '3_1') {
                        $('#skalapews-2-1').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_pernafasan == '1_2') {
                        $('#skalapews-2-2').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_pernafasan == '0_3') {
                        $('#skalapews-2-3').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_pernafasan == '1_4') {
                        $('#skalapews-2-4').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_pernafasan == '2_5') {
                        $('#skalapews-2-5').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_pernafasan == '3_6') {
                        $('#skalapews-2-6').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.pews_alat_bantu == '0_1') {
                        $('#skalapews-3-1').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_alat_bantu == '1_2') {
                        $('#skalapews-3-2').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_alat_bantu == '2_2') {
                        $('#skalapews-3-3').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_alat_bantu == '3_3') {
                        $('#skalapews-3-4').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.pews_saturasi == '3_1') {
                        $('#skalapews-4-1').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_saturasi == '2_2') {
                        $('#skalapews-4-2').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_saturasi == '1_3') {
                        $('#skalapews-4-3').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_saturasi == '0_4') {
                        $('#skalapews-4-4').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.pews_nadi == '3_1') {
                        $('#skalapews-5-1').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_nadi == '2_2') {
                        $('#skalapews-5-2').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_nadi == '1_3') {
                        $('#skalapews-5-3').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_nadi == '0_4') {
                        $('#skalapews-5-4').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_nadi == '1_5') {
                        $('#skalapews-5-5').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_nadi == '3_6') {
                        $('#skalapews-5-6').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.pews_warna_kulit == '0_1') {
                        $('#skalapews-6-1').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_warna_kulit == '2_2') {
                        $('#skalapews-6-2').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_warna_kulit == '3_3') {
                        $('#skalapews-6-3').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.pews_tds == '3_1') {
                        $('#skalapews-7-1').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_tds == '1_2') {
                        $('#skalapews-7-2').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_tds == '0_3') {
                        $('#skalapews-7-3').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_tds == '1_4') {
                        $('#skalapews-7-4').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_tds == '2_5') {
                        $('#skalapews-7-5').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_tds == '3_6') {
                        $('#skalapews-7-6').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.pews_kesadaran == '3_1') {
                        $('#skalapews-8-1').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_kesadaran == '1_2') {
                        $('#skalapews-8-2').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_kesadaran == '0_3') {
                        $('#skalapews-8-3').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_kesadaran == '1_4') {
                        $('#skalapews-8-4').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_kesadaran == '3_5') {
                        $('#skalapews-8-5').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.pews_total === 'Hijau') {
                        $('#total-skalapews-1').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_total === 'Kuning') {
                        $('#total-skalapews-2').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.pews_total === 'Merah') {
                        $('#total-skalapews-3').prop('checked', true).change()
                    }                               
                    // SKALA ERLY WARNING SYSTEM EWS / PEWS AKHIR 

                        //SKALA EARLY WARNING SYSTEM ( NEWS) 
                    // skala early warning system PEWS AWAL
                    var skala_early = [data.pews_suhu, data.pews_pernafasan, data.pews_alat_bantu, data
                        .pews_saturasi, data.pews_nadi, data.pews_warna_kulit, data.pews_tds, data.pews_kesadaran
                    ];
                    for (let i = 0; i <= skala_early.length; i++) {
                        for (let j = 1; j <= 8; j++) {
                            var z = i + 1;
                            // console.log(skala_early[i] + ' ' + $('#skalanews_' + z + '_' + j).val())
                            if (skala_early[i] === $('#skalapews-' + z + '-' + j).val()) {
                                $('#skalapews-' + z + '-' + j).prop('checked', true).change()
                            }
                        }
                    }
                    // end skala early warning system PEWS AKHIR

                    // SKRINING PASIEN AKHIR KEHIDUPAN NEONATUS AWAL
                    if (data.kajian_neonatus.skrining_usia == '1') {
                        $('#spak-1-neonatus-ya').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.skrining_usia == '0') {
                        $('#spak-1-neonatus-tidak').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.skrining_nafas == '1') {
                        $('#spak-2-neonatus-ya').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.skrining_nafas == '0') {
                        $('#spak-2-neonatus-tidak').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.skrining_sepsis == '1') {
                        $('#spak-3-neonatus-ya').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.skrining_sepsis == '0') {
                        $('#spak-3-neonatus-tidak').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.skrining_multiple == '1') {
                        $('#spak-4-neonatus-ya').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.skrining_multiple == '0') {
                        $('#spak-4-neonatus-tidak').prop('checked', true).change()
                    }

                    if (data.kajian_neonatus.skrining_stadium == '1') {
                        $('#spak-5-neonatus-ya').prop('checked', true).change()
                    }
                    if (data.kajian_neonatus.skrining_stadium == '0') {
                        $('#spak-5-neonatus-tidak').prop('checked', true).change()
                    }
                    // SKRINING PASIEN AKHIR KEHIDUPAN NEONATUS AKHIR

                    // DATA PENUNJANG NEONATUS AWAL
                    $('#tanggal-pemeriksaan-lab-neonatus').val(data.kajian_neonatus.data_penunjang_tgl_lab)
                    $('#hasil-pemeriksaan-labo-neonatus').val(data.kajian_neonatus.data_penunjang_hasil)
                    $('#tanggal-pemeriksaan-rad-neonatus').val(data.kajian_neonatus.data_penunjang_tgl_radiologi)
                    $('#hasil-pemeriksaan-rad-neonatus').val(data.kajian_neonatus.data_penunjang_hasil1)
                    $('#penunjang-lain-neonatus').val(data.kajian_neonatus.data_penunjang_lain_lain)
                    // DATA PENUNJANG NEONATUS AWAL

                    // MASALAH KEPARAWATAN NEONATUS AWAL
                    const masalah_keperawatann = JSON.parse(data.kajian_neonatus.masalah_keperawatann);
                    if (masalah_keperawatann.masalah_keperawatan_1_neonatus !== null) {
                        $('#masalah-keperawatan-1-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_2_neonatus !== null) {
                        $('#masalah-keperawatan-2-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_3_neonatus !== null) {
                        $('#masalah-keperawatan-3-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_4_neonatus !== null) {
                        $('#masalah-keperawatan-4-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_5_neonatus !== null) {
                        $('#masalah-keperawatan-5-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_6_neonatus !== null) {
                        $('#masalah-keperawatan-6-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_7_neonatus !== null) {
                        $('#masalah-keperawatan-7-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_8_neonatus !== null) {
                        $('#masalah-keperawatan-8-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_9_neonatus !== null) {
                        $('#masalah-keperawatan-9-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_10_neonatus !== null) {
                        $('#masalah-keperawatan-10-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_11_neonatus !== null) {
                        $('#masalah-keperawatan-11-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_12_neonatus !== null) {
                        $('#masalah-keperawatan-12-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_13_neonatus !== null) {
                        $('#masalah-keperawatan-13-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_14_neonatus !== null) {
                        $('#masalah-keperawatan-14-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_15_neonatus !== null) {
                        $('#masalah-keperawatan-15-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_16_neonatus !== null) {
                        $('#masalah-keperawatan-16-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_17_neonatus !== null) {
                        $('#masalah-keperawatan-17-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_18_neonatus !== null) {
                        $('#masalah-keperawatan-18-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_19_neonatus !== null) {
                        $('#masalah-keperawatan-19-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_20_neonatus !== null) {
                        $('#masalah-keperawatan-20-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_21_neonatus !== null) {
                        $('#masalah-keperawatan-21-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_22_neonatus !== null) {
                        $('#masalah-keperawatan-22-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_23_neonatus !== null) {
                        $('#masalah-keperawatan-23-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_24_neonatus !== null) {
                        $('#masalah-keperawatan-24-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_25_neonatus !== null) {
                        $('#masalah-keperawatan-25-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_26_neonatus !== null) {
                        $('#masalah-keperawatan-26-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_27_neonatus !== null) {
                        $('#masalah-keperawatan-27-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_28_neonatus !== null) {
                        $('#masalah-keperawatan-28-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_29_neonatus !== null) {
                        $('#masalah-keperawatan-29-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_30_neonatus !== null) {
                        $('#masalah-keperawatan-30-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_31_neonatus !== null) {
                        $('#masalah-keperawatan-31-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_32_neonatus !== null) {
                        $('#masalah-keperawatan-32-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_33_neonatus !== null) {
                        $('#masalah-keperawatan-33-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_34_neonatus !== null) {
                        $('#masalah-keperawatan-34-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_35_neonatus !== null) {
                        $('#masalah-keperawatan-35-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_36_neonatus !== null) {
                        $('#masalah-keperawatan-36-neonatus').prop('checked', true)
                    }
                    if (masalah_keperawatann.masalah_keperawatan_lain_input_neonatus !== null) {
                        $('#masalah-keperawatan-lain-input-neonatus').prop('checked', true)
                    }                           
                    // MASALAH KEPERAWATAAN NEONATUS AKHIR 

                    // PERENCANAAN PULANG (DISCHARGE PLANING) NEONATUS AWAL
                    // PERENCANAAN PULANG / DISCHARGE PLANNING 
                    const kriteria_discharge_planingg = JSON.parse(data.kajian_neonatus.kriteria_discharge_planingg);
                    if (kriteria_discharge_planingg.discharge_planning_noenatus_1 === '1') {
                        $('#discharge-planning-1-noenatus-ya').prop('checked', true).change()
                    }
                    if (kriteria_discharge_planingg.discharge_planning_noenatus_1 === '0') {
                        $('#discharge-planning-1-noenatus-tidak').prop('checked', true).change()
                    }

                    if (kriteria_discharge_planingg.discharge_planning_noenatus_2 === '1') {
                        $('#discharge-planning-2-noenatus-ya').prop('checked', true).change()
                    }
                    if (kriteria_discharge_planingg.discharge_planning_noenatus_2 === '0') {
                        $('#discharge-planning-2-noenatus-tidak').prop('checked', true).change()
                    }

                    if (kriteria_discharge_planingg.discharge_planning_noenatus_3 === '1') {
                        $('#discharge-planning-3-noenatus-ya').prop('checked', true).change()
                    }
                    if (kriteria_discharge_planingg.discharge_planning_noenatus_3 === '0') {
                        $('#discharge-planning-3-noenatus-tidak').prop('checked', true).change()
                    }

                    if (kriteria_discharge_planingg.discharge_planning_noenatus_4 === '1') {
                        $('#discharge-planning-4-noenatus-ya').prop('checked', true).change()
                    }
                    if (kriteria_discharge_planingg.discharge_planning_noenatus_4 === '0') {
                        $('#discharge-planning-4-noenatus-tidak').prop('checked', true).change()
                    }
                    
                    const perencanaan_pulangg = JSON.parse(data.kajian_neonatus
                        .perencanaan_pulangg);
                    if (perencanaan_pulangg.kriteria_discharge_noenatus_1 !== null) {
                        $('#kriteria-discharge-noenatus-1').prop('checked', true)
                    }
                    if (perencanaan_pulangg.kriteria_discharge_noenatus_2 !== null) {
                        $('#kriteria-discharge-noenatus-2').prop('checked', true)
                    }
                    if (perencanaan_pulangg.kriteria_discharge_noenatus_3 !== null) {
                        $('#kriteria-discharge-noenatus-3').prop('checked', true)
                    }
                    if (perencanaan_pulangg.kriteria_discharge_noenatus_4 !== null) {
                        $('#kriteria-discharge-noenatus-4').prop('checked', true)
                    }
                    if (perencanaan_pulangg.kriteria_discharge_noenatus_5 !== null) {
                        $('#kriteria-discharge-noenatus-5').prop('checked', true)
                    }
                    if (perencanaan_pulangg.kriteria_discharge_noenatus_6 !== null) {
                        $('#kriteria-discharge-noenatus-6').prop('checked', true)
                    }
                    if (perencanaan_pulangg.kriteria_discharge_noenatus_7 !== null) {
                        $('#kriteria-discharge-noenatus-7').prop('checked', true)
                    }
                    if (perencanaan_pulangg.kriteria_discharge_noenatus_8 !== null) {
                        $('#kriteria-discharge-noenatus-8').prop('checked', true)
                    }
                    if (perencanaan_pulangg.kriteria_discharge_noenatus_9 !== null) {
                        $('#kriteria-discharge-noenatus-9').prop('checked', true);
                        $('#kriteria-discharge-noenatus-10').val(perencanaan_pulangg
                            .kriteria_discharge_noenatus_10).attr(
                            'disabled', false);
                    }


                    // TANGGAL DAN JAM / TTD PERAWAT / CEKLIS / NEONATUS AWAL 
                    $('#tanggal-ttd-perawat-neonatus').val((data.kajian_neonatus.tanggal_jam_perawat !== null ? datetimefmysql(data.kajian_neonatus.tanggal_jam_perawat) : ''));
                    if (data.kajian_neonatus.id_perawat !== null) { $('#pilih-perawat-neonatus').select2c('readonly', true)}
                    $('#pilih-perawat-neonatus').val(data.kajian_neonatus.id_perawat);
                    $('#s2id_pilih-perawat-neonatus a .select2c-chosen').html(data.kajian_neonatus.perawat);
                    if (data.ceklis_ttd_perawat !== null) {
                        $('#ceklis-ttd-perawat-neonatus').hide();
                        $('#ceklis_neonatus_perawat_verified').show();
                    }
                    // TANGGAL DAN JAM / TTD PERAWAT / CEKLIS / NEONATUS AKHIR


                    // TANGGAL DAN JAM / TTD DOKTER / CEKLIS / NEONATUS 
                    $('#tanggal-ttd-neonatus-dokter').val((data.kajian_neonatus.tanggal_jam_dokter !== null ? datetimefmysql(data.kajian_neonatus.tanggal_jam_dokter) : ''));
                    if (data.kajian_neonatus.id_dokter !== null) { $('#pilih-dokter-neonatus').select2c('readonly', true)}
                    $('#pilih-dokter-neonatus').val(data.kajian_neonatus.id_dokter);
                    $('#s2id_pilih-dokter-neonatus a .select2c-chosen').html(data.kajian_neonatus.verifikator_dpjp);                           
                    if (data.ceklis_ttd_dokter !== null) {
                        $('#ceklis-ttd-dokter-neonatus').hide();
                        $('#ceklis_neonatus_dokter_verified').show();
                    }
                }

                $('#neonatus-bed').text(bed);

                $('.logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-pasien-alergi').show();
                    }
                }

                $('#modal_pengkajian_neonatus').modal('show');

            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },       
        });
    }

    // SKALA EARLY WARNING NEWS AWAL
    function hitungSkalaEarlyEws() {
        var total = 0;
        // looping vertical
        for (let i = 1; i <= 7; i++) {
            // looping horizontal
            var sub_total = 0
            for (let j = 1; j <= 7; j++) {
                var value = 0;
                if ($('#skalapews-' + i + '-' + j).is(':checked')) {
                    var getNilai = $('#skalapews-' + i + '-' + j).val()
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
            // $('#total-skalapews-1').prop('checked', true)
        } else if (total >= 0 && total <= 2) {
            $('#total-skalapews-1').prop('checked', true)
        } else if (total >= 3 && total <= 4) {
            $('#total-skalapews-2').prop('checked', true)
        } else if (total >= 5) {
            $('#total-skalapews-3').prop('checked', true)
        }
    }

    // APGAR SKOR PERHITUNGAN AWAL 
    // FREKUENSI JANTUNG NEONATUS
    function calcscorefrekuensi() {
        var score = 0;
        $("input[name='apgar_frekuensi_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_frekuensi_2']:checked").each(function() {if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_frekuensi_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_1']").val(score);
    }

    function calcscorefrekuensii() {
        var score = 0;
        $("input[name='apgar_frekuensi_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_frekuensi_2']:checked").each(function() { if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_frekuensi_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_2']").val(score);
    }

    // USAHA 
    function calcscoreusaha() {
        var score = 0;
        $("input[name='apgar_usaha_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_usaha_2']:checked").each(function() {if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_usaha_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_1_1']").val(score);
    }
    function calcscoreusahaa() {
        var score = 0;
        $("input[name='apgar_usaha_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_usaha_2']:checked").each(function() {if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_usaha_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_2_2']").val(score);
    }

    //  TONUS OTOT NEONATUS 
    function calcscoretonus() {
        var score = 0;
        $("input[name='apgar_tonus_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_tonus_2']:checked").each(function() {if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_tonus_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_1_1_1']").val(score);
    }
    function calcscoretonuss() {
        var score = 0;
        $("input[name='apgar_tonus_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_tonus_2']:checked").each(function() {if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_tonus_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_2_2_2']").val(score);
    }


    //  REFLEKSI NEONATUS 
    function calcscorerefleksi() {
        var score = 0;
        $("input[name='apgar_refleksi_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_refleksi_2']:checked").each(function() {if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_refleksi_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_1_1_1_1']").val(score);
    }
    function calcscorerefleksii() {
        var score = 0;
        $("input[name='apgar_refleksi_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_refleksi_2']:checked").each(function() {if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_refleksi_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_2_2_2_2']").val(score);
    }

    //  WARNA NEONATUS 
    function calcscorewarna() {
        var score = 0;
        $("input[name='apgar_warna_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_warna_2']:checked").each(function() {if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_warna_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_1_1_1_1_1']").val(score);
    }
    function calcscorewarnaa() {
        var score = 0;
        $("input[name='apgar_warna_1']:checked").each(function() {if ($(this).val() == '0') {score = parseInt(0);return false;}});
        $("input[name='apgar_warna_2']:checked").each(function() {if ($(this).val() == '1') {score = parseInt(1);return false;}});
        $("input[name='apgar_warna_3']:checked").each(function() {if ($(this).val() == '2') {score = parseInt(2);return false;}});
        $("input[name='total_skor_2_2_2_2_2']").val(score);
    }


    // SHOW PENGKAJIAN MEDIS AWAL KEBIDANAN DAN KANDUNGAN AWAL
    function showKajianMedisNeonatus(data) {
        $('#id-kajian-medis-neonatus').val(data.id);
        $('#waktu-kajian-medis-neonatus').val((data.waktu_pengkajian !== null ? datetimefmysql(data.waktu_pengkajian) : '')) .attr('disabled');            
        $('#keluhan-utama-medis-neonatus ').val(data.keluhan_utama);
        $('#rps-medis-neonatus ').val(data.riwayat_penyakit_sekarang);
        $('#rpt-medis-neonatus ').val(data.riwayat_penyakit_terdahulu);
        $('#pengobatan-medis-neonatus ').val(data.pengobatan);
        $('#riwayat-alergi-neonatus ').val(data.riwayat_alergi);

        var rpk = JSON.parse(data.riwayat_penyakit_keluarga);
        if (rpk.hasil === '1') {
            $('#rpk-medis-neonatus-ya').prop('checked', true).change()
        }
        if (rpk.asma !== '') {
            $('#rpk-medis-neonatus-asma').prop('checked', true)
        }
        if (rpk.dm !== '') {
            $('#rpk-medis-neonatus-dm').prop('checked', true)
        }
        if (rpk.cardiovascular !== '') {
            $('#rpk-medis-neonatus-cardiovascular').prop('checked', true)
        }
        if (rpk.kanker !== '') {
            $('#rpk-medis-neonatus-kanker').prop('checked', true)
        }
        if (rpk.thalasemia !== '') {
            $('#rpk-medis-neonatus-thalasemia').prop('checked', true)
        }
        if (rpk.lain !== '') {
            $('#rpk-medis-neonatus-lain').prop('checked', true)
        }
        if (rpk.ket_lain !== '') {
            $('#rpk-medis-neonatus-lain-input').val(rpk.ket_lain).attr('disabled', false)
        }

        var sadar = JSON.parse(data.kesadaran);
        if (sadar.composmentis !== '') {
            $('#composmentis-medis-neonatus').prop('checked', true)
        }
        if (sadar.apatis !== '') {
            $('#apatis-medis-neonatus').prop('checked', true)
        }
        if (sadar.samnolen !== '') {
            $('#samnolen-medis-neonatus').prop('checked', true)
        }
        if (sadar.sopor !== '') {
            $('#sopor-medis-neonatus').prop('checked', true)
        }
        if (sadar.koma !== '') {
            $('#koma-medis-neonatus').prop('checked', true)
        }

        if (data.pf_kepala === 'Normal') {
            $('#pf-kepala-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_kepala === 'Abnormal') {
            $('#pf-kepala-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_kepala !== null) {
            $('#ket-pf-kepala-neonatus').val(data.ket_pf_kepala)
        }

        if (data.pf_mata === 'Normal') {
            $('#pf-mata-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_mata === 'Abnormal') {
            $('#pf-mata-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_mata !== null) {
            $('#ket-pf-mata-neonatus').val(data.ket_pf_mata)
        }

        if (data.pf_hidung === 'Normal') {
            $('#pf-hidung-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_hidung === 'Abnormal') {
            $('#pf-hidung-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_hidung !== null) {
            $('#ket-pf-hidung-neonatus').val(data.ket_pf_hidung)
        }

        if (data.pf_gigi_mulut === 'Normal') {
            $('#pf-gigi-mulut-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_gigi_mulut === 'Abnormal') {
            $('#pf-gigi-mulut-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_gigi_mulut !== null) {
            $('#ket-pf-gigi-mulut-neonatus').val(data.ket_pf_gigi_mulut)
        }

        if (data.pf_tenggorokan === 'Normal') {
            $('#pf-tenggorokan-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_tenggorokan === 'Abnormal') {
            $('#pf-tenggorokan-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_tenggorokan !== null) {
            $('#ket-pf-tenggorokan-neonatus').val(data.ket_pf_tenggorokan)
        }

        if (data.pf_telinga === 'Normal') {
            $('#pf-telinga-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_telinga === 'Abnormal') {
            $('#pf-telinga-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_telinga !== null) {
            $('#ket-pf-telinga-neonatus').val(data.ket_pf_telinga)
        }

        if (data.pf_leher === 'Normal') {
            $('#pf-leher-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_leher === 'Abnormal') {
            $('#pf-leher-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_leher !== null) {
            $('#ket-pf-leher-neonatus').val(data.ket_pf_leher)
        }

        if (data.pf_thorax === 'Normal') {
            $('#pf-thorax-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_thorax === 'Abnormal') {
            $('#pf-thorax-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_thorax !== null) {
            $('#ket-pf-thorax-neonatus').val(data.ket_pf_thorax)
        }

        if (data.pf_jantung === 'Normal') {
            $('#pf-jantung-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_jantung === 'Abnormal') {
            $('#pf-jantung-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_jantung !== null) {
            $('#ket-pf-jantung-neonatus').val(data.ket_pf_jantung)
        }

        if (data.pf_paru === 'Normal') {
            $('#pf-paru-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_paru === 'Abnormal') {
            $('#pf-paru-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_paru !== null) {
            $('#ket-pf-paru-neonatus').val(data.ket_pf_paru)
        }

        if (data.pf_abdomen === 'Normal') {
            $('#pf-abdomen-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_abdomen === 'Abnormal') {
            $('#pf-abdomen-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_abdomen !== null) {
            $('#ket-pf-abdomen-neonatus').val(data.ket_pf_abdomen)
        }

        if (data.pf_genitalia_anus === 'Normal') {
            $('#pf-genitalia-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_genitalia_anus === 'Abnormal') {
            $('#pf-genitalia-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_genitalia_anus !== null) {
            $('#ket-pf-genitalia-neonatus').val(data.ket_pf_genitalia_anus)
        }

        if (data.pf_ekstermitas === 'Normal') {
            $('#pf-ekstermitas-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_ekstermitas === 'Abnormal') {
            $('#pf-ekstermitas-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_ekstermitas !== null) {
            $('#ket-pf-ekstermitas-neonatus').val(data.ket_pf_ekstermitas)
        }

        if (data.pf_kulit === 'Normal') {
            $('#pf-kulit-neonatus-tidak').prop('checked', true)
        }
        if (data.pf_kulit === 'Abnormal') {
            $('#pf-kulit-neonatus-ya').prop('checked', true)
        }
        if (data.ket_pf_kulit !== null) {
            $('#ket-pf-kulit-neonatus').val(data.ket_pf_kulit)
        }

        $('#hasil_laboratorium_neonatus ').summernote('code', data.hasil_laboratorium_neonatus);
        $('#hasil_radiologi_neonatus ').summernote('code', data.hasil_radiologi_neonatus);
        $('#hasil_penunjang_lain_neonatus ').summernote('code', data.hasil_penunjang_lain_neonatus);
        $('#diagnosa_awal_medis_neonatus ').summernote('code', data.diagnosa_awal_medis_neonatus);
        $('#riwayat_field_neonatus ').summernote('code', data.riwayat_field_neonatus);

        $('#rd-neonatus').val(data.rd_neonatus);
        $('#rpp-neonatus').val(data.rpp_neonatus);
        $('#rt-neonatus').val(data.rt_neonatus);
        $('#rk-neonatus').val(data.rk_neonatus);

        const rp_neonatus = JSON.parse(data.rp_neonatus); 
        if (rp_neonatus.rp_neonatus_1 !== null) {$('#rk-neonatus-1').val(rp_neonatus.rp_neonatus_1);}
        if (rp_neonatus.rp_neonatus_2 !== null) {$('#rk-neonatus-2').prop('checked', true) }
        if (rp_neonatus.rp_neonatus_3 !== null) {$('#rk-neonatus-3').val(rp_neonatus.rp_neonatus_3);}
        if (rp_neonatus.rp_neonatus_4 !== null) {$('#rk-neonatus-4').val(rp_neonatus.rp_neonatus_4);}
        if (rp_neonatus.rp_neonatus_5 !== null) {$('#rk-neonatus-5').val(rp_neonatus.rp_neonatus_5);}

        // TANGGAL DAN JAM / TTD DOKTER 1 / NEONATUS MEDIS AWAL
        $('#tanggal-ttd-dokter-dpjp-neonatus').val((data.waktu_ttd_dokter_dpjp !==null ? datetimefmysql(data.waktu_ttd_dokter_dpjp) : ''));
        $('#dokter-dpjp-neonatus').val(data.id_dokter_dpjp);
        if (data.id_dokter_dpjp !== null) { $('#dokter-dpjp-neonatus').select2c('readonly', true) }
        if (data.ttd_dokter_dpjp !== null) { $('#ttd-dokter-dpjp-neonatus').hide(); $('#ttd_dokter_dpjp_verified_neonatus').show();}
        $('#s2id_dokter-dpjp-neonatus a .select2c-chosen').html(data.dokter_dpjp);
                   
        // TANGGAL DAN JAM / TTD DOKTER 2 / NEONATUS MEDIS AWAL
        $('#tanggal-ttd-dokter-pengkajian-neonatus').val((data.waktu_ttd_dokter_pengkajian !==null ?  datetimefmysql(data.waktu_ttd_dokter_pengkajian) : ''));
        $('#dokter-pengkajian-neonatus').val(data.id_dokter_pengkajian);
        if (data.id_dokter_pengkajian !== null) {$('#dokter-pengkajian-neonatus').select2c('readonly', true)  }
        if (data.ttd_dokter_pengkajian !== null) { $('#ttd-dokter-pengkajian-neonatus').hide(); $('#ttd_dokter_pengkajian_verified_neonatus').show(); }
        $('#s2id_dokter-pengkajian-neonatus a .select2c-chosen').html(data.dokter_pengkajian);               
    }


    function showHistoryLogsNeonatus(id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("rawat_inap/api/rawat_inap/get_history_logs_pengkajian_awal_neonatus") ?>/id_layanan_pendaftaran/' +
                id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                $('#table_kajian_medis_neonatus tbody').empty();
                $.each(data.kajian_neonatus_logs, function(i, v) {
                    let html = /* html */ `
                            <tr>
                                <td>${i + 1}</td>
                                <td class="nowrap">${(v.tanggal_ubah_neonatus !== null ? v.tanggal_ubah_neonatus : '')}</td>
                                <td class="nowrap">${v.user}</td>
                                <td>${v.keluhan_utama}</td>
                                <td>${v.riwayat_penyakit_sekarang}</td>
                                <td>${v.riwayat_penyakit_terdahulu}</td>
                                <td>${v.pengobatan}</td>
                                <td>${v.riwayat_alergi}</td>
                                <td>${v.hasil_laboratorium_neonatus}</td>
                                <td>${v.hasil_radiologi_neonatus}</td>
                                <td>${v.hasil_penunjang_lain_neonatus}</td>
                                <td>${v.diagnosa_awal_medis_neonatus}</td>
                                <td>${v.rd_neonatus}</td>
                                <td>${v.rpp_neonatus}</td>
                                <td>${v.rt_neonatus}</td>
                                <td>${v.rk_neonatus}</td>
                            </tr>
                        `;
                    $('#table_kajian_medis_neonatus tbody').append(html);
                });
                $('#modal_history_logs_neonatus').modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // SIMPAN PENGKAJIAN NEONATUS AWAL
    function konfirmasiSimpanPengkajianAwalNeonatus() {
        ($('#form_pengkajian_awal_neonatus').serialize()); 

        if ($('#tanggal-ttd-perawat-neonatus').val() === '') {
            syams_validation('#tanggal-ttd-perawat-neonatus', 'Kolom waktu verifikasi perawat harus diisi!');
            $('#tanggal-ttd-perawat-neonatus').focus();
            $('#bwizard_pengkajian_neonatus').bwizard('show', '0');
            stop = true;
        }
        if ($('#pilih-perawat-neonatus').val() === '') {
            syams_validation('#pilih-perawat-neonatus', 'Kolom perawat harus dipilih!');
            $('#bwizard_pengkajian_neonatus').bwizard('show', '0');
            stop = true;
        }
        if ($('#pilih-dokter-neonatus').val() === '') {
            syams_validation('#pilih-dokter-neonatus', 'Kolom dokter harus dipilih!');
            $('#bwizard_pengkajian_neonatus').bwizard('show', '0');
            stop = true;
        }
        if ($('#tanggal-ttd-dokter-dpjp-neonatus').val() === '') {
            // syams_validation('#tanggal-ttd-dokter-dpjp-neonatus', 'Kolom waktu verifikasi perawat harus diisi!');
            $('#tanggal-ttd-dokter-dpjp-neonatus').focus();
            $('#bwizard_pengkajian_neonatus').bwizard('show', '0');
            stop = true;
        }

        if ($('#ceklis-ttd-perawat-neonatus').is(":visible")) {
            if ($('#ceklis-ttd-perawat-neonatus').is(":not(:checked)")) {
                swalAlert('warning', 'Signature Validation', 'Tolong PERAWAT dan DOKTER  mengisi Ceklis tanda tangan terlebih dahulu !!!');
                $('#bwizard_pengkajian_neonatus').bwizard('show', '0');
                return false;
            }
        }        
        var id_kajian_neonatus = $('#id-kajian-neonatus').val();
        if (id_kajian_neonatus) {
            var text = 'Apakah anda yakin ingin mengupdate data ini ?';
            var btnTextConfirmNeonatus = 'Update';
        } else {
            text = 'Apakah anda yakin ingin menyimpan data ini ?';
            btnTextConfirmNeonatus = 'Simpan';
        }
        swal.fire({
            title: 'Konfirmasi ?',
            html: text,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save mr-1"></i>' + btnTextConfirmNeonatus,
            cancelButtonText: '<i class="fas fa-time-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                SimpanPengkajianAwalNeonatus();
            }
        })
    }


    // NEONATUS AWAL
    $('.neonatusj').change(function() {
        var total = parseInt(0)
        for (let index = 0; index < $('.neonatusj').length; index++) {
            var val = parseInt(0)
            if ($('.neoj_' + index).is(":checked")) {
                val = $('.neoj_' + index).val()
            }
            total = total + parseInt(val)
        }
        $('#total-neonatusj').val(total)
    })




    function SimpanPengkajianAwalNeonatus() {
        var id_layanan_pendaftaran_neonatus = $('#id-layanan-pendaftaran-neonatus').val();  
        var riwayat_neonatus = $('#riwayat_field_neonatus').summernote('code');
		var hasil_lab_neonatus = $('#hasil_laboratorium_neonatus').summernote('code');
		var hasil_rad_neonatus = $('#hasil_radiologi_neonatus').summernote('code');
		var hasil_pen_lain_neonatus = $('#hasil_penunjang_lain_neonatus').summernote('code');
		var diag_awal_neonatus = $('#diagnosa_awal_medis_neonatus').summernote('code');
        $.ajax({
            type: 'POST',
            url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_pengkajian_awal_neonatus") ?>',
            data: $('#form_pengkajian_awal_neonatus').serialize() + '&id-layanan-pendaftaran-neonatus=' +id_layanan_pendaftaran_neonatus + '&riwayat_neonatus=' + riwayat_neonatus + '&hasil_lab_neonatus=' + hasil_lab_neonatus + '&hasil_rad_neonatus=' + hasil_rad_neonatus + '&hasil_pen_lain_neonatus=' + hasil_pen_lain_neonatus + '&diag_awal_neonatus=' + diag_awal_neonatus,
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

                $('#modal_pengkajian_neonatus').modal('hide');
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