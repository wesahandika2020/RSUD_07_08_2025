
<!-- // TPERS PENDINNG -->
<script>

    // TANGGAL
    $('')
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

    // JAM DAN TANGGAL
    $('#tgl-opst-1, #tgl-opst-2, #tgl-opst-3, #tgl-opst-4, #tgl-opst-5, #tgl-opst-6, #tgl-opst-7, #tgl-opst-8, #tgl-opst-9, #tgl-opst-10, #tgl-opst-11, #tgl-opst-12, #tgl-opst-13, #tgl-opst-14, #tgl-opst-15, #tanggal-opst, #staf-tpers')
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


    // NAMA PERAWAT TPERS
    $('#nama-tpers, #perawat-pendamping-tpers, #pj-shift-tpers').select2c({
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



    // NAMA DOKTER TPERS
    $('#dokter-dpjp-tpers, #dokter-pendamping-tpers, #dokter-pem-tpers').select2c({
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
    });

 
    // NAMA PERAWAT OPST
    $('#petugas-opst-1, #petugas-opst-2, #petugas-opst-3, #petugas-opst-4, #petugas-opst-5, #petugas-opst-6, #petugas-opst-7, #petugas-opst-8, #petugas-opst-9, #petugas-opst-10, #petugas-opst-11, #petugas-opst-12, #petugas-opst-13, #petugas-opst-14, #petugas-opst-15, #petugas-melakukan').select2c({
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

    // JAM
    $('#jika-staf-tpers, #tiba-staf-tpers')
    .on('click', function() {
        $(this).timepicker({
            format: 'HH:mm',
            showInputs: false,
            showMeridian: false
        });
    })


    $('#btn_expand_all_tpers').click(function() {
        $('.multi-collapse').addClass('show');
    });

    $('#btn_collapse_all_tpers').click(function() {
        $('.multi-collapse').removeClass('show');
    });

        
    function lihatFORM_KEP_106_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        // TPERS
        $('#modal-transfer-pasien-exstra-rs-lihat').modal('show');

        cetakTransferPasienEkstraRS = function() {
            window.open('<?= base_url("pendaftaran_igd/cetak_transfer_pasien_ekstra_rs/") ?>' + layanan.id, 'Cetak Surat Transfer Ekstra RS', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
        }

        cetakObservasiPasienSaatTransfer = function() {
            window.open('<?= base_url("pendaftaran_igd/cetak_observasi_pasien_saat_transfer/") ?>' + layanan.id, 'Cetak Observasi Pasien Saat Transfer', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
        }

    }

    function editFORM_KEP_106_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        cetakTPERS(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_106_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        cetakTPERS(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function cetakTPERS(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        // $('#modal-transfer-pasien-exstra-rs').modal('show');
        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/form_transfer_pasien_exstra_rs") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                console.log(data);
                $('#table-terapi-rm tbody').empty();
                resetTPERS(); 
                $('#id-layanan-pendaftaran-tpers').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-tpers').val(id_pendaftaran);
                
                if (data.pasien !== null) {
                    $('#id-pasien-tpers').val(data.pasien.id_pasien);
                    $('#nama-pasien-tpers').text(data.pasien.nama);
                    $('#norm-pasien-tpers').text(data.pasien.no_rm);
                    $('#ttl-pasien-tpers').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jk-pasien-tpers').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // $('#diagnosa-medis-tpers').val(data.diagnosa_medis.map(item => item.nama).join(', '));
                // $('#diagnosa-sek-tpers').val([...data.diagnosa_sekunder,...data.diagnosa_sekunder_manual].map(data=>data.nama).join(', ')); 
                // $('#diagnosa-sek-tpers').val([...data.diagnosa_medis,...data.diagnosa_sekunder].map(data=>data.nama).join(', ')); 

                // NARIK DATA
                $('#tgl-masuk-tpers').val(data.pasien.tanggal_daftar); 
                // console.log(data.pasien.tanggal_daftar);

                $('#tgl-pindah-tpers').val(data.pasien.tanggal_keluar); 
                // console.log(data.pasien.tanggal_keluar);

                $('#unit-tpers').val(data.layanan.bangsal); 
                // console.log(data.layanan.bangsal);

                // let transfer_pasien_exstra_rs = data.transfer_pasien_exstra_rs;
                    if (data.transfer_pasien_exstra_rs !== null) { 
                        
                        $('#id-pas').val(data.transfer_pasien_exstra_rs.id);


                        $('#id-pasien-tpers').val(data.transfer_pasien_exstra_rs.id);


                        $('#staf-tpers').val((data.transfer_pasien_exstra_rs.staf_tpers !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.staf_tpers) : ''));
                        $('#nama-tpers').val(data.transfer_pasien_exstra_rs.nama_tpers); 
                        $('#s2id_nama-tpers a .select2c-chosen').html(data.transfer_pasien_exstra_rs.perawat_1);

                        if (data.transfer_pasien_exstra_rs.transportasi_tpers_1 == '1') { $('#transportasi-tpers-1').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.transportasi_tpers_2 == '1') { $('#transportasi-tpers-2').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.transportasi_tpers_3 == '1') { $('#transportasi-tpers-3').prop('checked', true) }

                        if (data.transfer_pasien_exstra_rs.alasan_tpers_1 == '1') { $('#alasan-tpers-1').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.alasan_tpers_2 == '1') { $('#alasan-tpers-2').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.alasan_tpers_3 == '1') { $('#alasan-tpers-3').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.alasan_tpers_4 == '1') { $('#alasan-tpers-4').prop('checked', true) }          

                        if (data.transfer_pasien_exstra_rs.alasan_tpers_5 == '1') { $('#alasan-tpers-5').prop('checked', true) }
                        $('#alasan-tpers-6').val(data.transfer_pasien_exstra_rs.alasan_tpers_6); 

                        $('#dokter-dpjp-tpers').val(data.transfer_pasien_exstra_rs.dokter_dpjp_tpers); 
                        $('#s2id_dokter-dpjp-tpers a .select2c-chosen').html(data.transfer_pasien_exstra_rs.dokter_1);

                        if (data.transfer_pasien_exstra_rs.ceklis_tpers_1 == '1') { $('#ceklis-tpers-1').prop('checked', true) }
                        $('#rs-dituju-tpers').val(data.transfer_pasien_exstra_rs.rs_dituju_tpers); 
                        if (data.transfer_pasien_exstra_rs.ceklis_tpers_2 == '1') { $('#ceklis-tpers-2').prop('checked', true) }
                        $('#ruang-tpers').val(data.transfer_pasien_exstra_rs.ruang_tpers); 
                        if (data.transfer_pasien_exstra_rs.ceklis_tpers_3 == '1') { $('#ceklis-tpers-3').prop('checked', true) }
                        $('#dokter-sp-tpers').val(data.transfer_pasien_exstra_rs.dokter_sp_tpers); 

                        $('#nama-staf-tpers').val(data.transfer_pasien_exstra_rs.nama_staf_tpers); 
                        $('#no-staf-tpers').val(data.transfer_pasien_exstra_rs.no_staf_tpers); 
                        $('#jika-staf-tpers').val(data.transfer_pasien_exstra_rs.jika_staf_tpers); 
                        $('#tiba-staf-tpers').val(data.transfer_pasien_exstra_rs.tiba_staf_tpers); 

                        if (data.transfer_pasien_exstra_rs.ceklis_tpers_4 == '1') { $('#ceklis-tpers-4').prop('checked', true) }
                        $('#dokter-pendamping-tpers').val(data.transfer_pasien_exstra_rs.dokter_pendamping_tpers); 
                        $('#s2id_dokter-pendamping-tpers a .select2c-chosen').html(data.transfer_pasien_exstra_rs.dokter_2);

                        if (data.transfer_pasien_exstra_rs.ceklis_tpers_5 == '1') { $('#ceklis-tpers-5').prop('checked', true) }
                        $('#perawat-pendamping-tpers').val(data.transfer_pasien_exstra_rs.perawat_pendamping_tpers); 
                        $('#s2id_perawat-pendamping-tpers a .select2c-chosen').html(data.transfer_pasien_exstra_rs.perawat_2);

                        if (data.transfer_pasien_exstra_rs.kel_tpers == '1') { $('#kel-tpers').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.tidak_ada_tpers == '1') { $('#tidak-ada-tpers').prop('checked', true) }

                        $('#indikasi-tpers').val(data.transfer_pasien_exstra_rs.indikasi_tpers); 
                        $('#riwayat-kesehatan-tpers').val(data.transfer_pasien_exstra_rs.riwayat_kesehatan_tpers); 

                        if (data.transfer_pasien_exstra_rs.alergi_tpers_1 == '1') { $('#alergi-tpers-1').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.alergi_tpers_2 == '1') { $('#alergi-tpers-2').prop('checked', true) }
                        $('#alergi-tpers-3').val(data.transfer_pasien_exstra_rs.alergi_tpers_3); 

                        // $('#diagnosa-medis-tpers').val(data.transfer_pasien_exstra_rs.diagnosa_medis); 
                        // $('#diagnosa-sek-tpers').val(data.transfer_pasien_exstra_rs.diagnosa_sekunder);                   

                        // $('#diagnosa-medis-tpers').val(data.transfer_pasien_exstra_rs.diagnosa_medis_tpers); 
                        // $('#diagnosa-sek-tpers').val(data.transfer_pasien_exstra_rs.diagnosa_sek_tpers); 

                        if (data.transfer_pasien_exstra_rs.terapi_tpers_1 == '1') { $('#terapi-tpers-1').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.terapi_tpers_2 == '1') { $('#terapi-tpers-2').prop('checked', true) }
                        $('#terapi-tpers-3').val(data.transfer_pasien_exstra_rs.terapi_tpers_3); 

                        if (data.transfer_pasien_exstra_rs.rw_penyakit_tpers_1 == '1') { $('#rw-penyakit-tpers-1').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.rw_penyakit_tpers_2 == '1') { $('#rw-penyakit-tpers-2').prop('checked', true) }
                        $('#rw-penyakit-tpers-3').val(data.transfer_pasien_exstra_rs.rw_penyakit_tpers_3); 

                        $('#intake-tpers').val(data.transfer_pasien_exstra_rs.intake_tpers); 

                        $('#E-tpers').val(data.transfer_pasien_exstra_rs.E_tpers); 
                        $('#V-tpers').val(data.transfer_pasien_exstra_rs.V_tpers); 
                        $('#M-tpers').val(data.transfer_pasien_exstra_rs.M_tpers); 
                        $('#pupil-tpers').val(data.transfer_pasien_exstra_rs.pupil_tpers); 
                        $('#reflek-tpers-1').val(data.transfer_pasien_exstra_rs.reflek_tpers_1); 
                        $('#reflek-tpers-2').val(data.transfer_pasien_exstra_rs.reflek_tpers_2); 

                        $('#td-tpers-1').val(data.transfer_pasien_exstra_rs.td_tpers_1); 
                        $('#td-tpers-2').val(data.transfer_pasien_exstra_rs.td_tpers_2); 
                        $('#nadi-tpers').val(data.transfer_pasien_exstra_rs.nadi_tpers); 
                        $('#suhu-tpers').val(data.transfer_pasien_exstra_rs.suhu_tpers); 
                        $('#pf-tpers').val(data.transfer_pasien_exstra_rs.pf_tpers); 

                        if (data.transfer_pasien_exstra_rs.pasien_mmberi_tpers_1 == '1') { $('#pasien-mmberi-tpers-1').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.pasien_mmberi_tpers_2 == '1') { $('#pasien-mmberi-tpers-2').prop('checked', true) }

                        if (data.transfer_pasien_exstra_rs.infus_tpers == '1') { $('#infus-tpers').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.ett_tpers == '1') { $('#ett-tpers').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.oksigen_tpers == '1') { $('#oksigen-tpers').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.cvc_tpers == '1') { $('#cvc-tpers').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.kateter_tpers == '1') { $('#kateter-tpers').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.bidai_tpers == '1') { $('#bidai-tpers').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.pupm_tpers == '1') { $('#pupm-tpers').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.lain_tpers == '1') { $('#lain-tpers').prop('checked', true) }
                        $('#peralatan-tpers').val(data.transfer_pasien_exstra_rs.peralatan_tpers); 

                        if (data.transfer_pasien_exstra_rs.pp_dianostik_1 == '1') { $('#pp-dianostik-1').prop('checked', true) }
                        if (data.transfer_pasien_exstra_rs.pp_dianostik_2 == '1') { $('#pp-dianostik-2').prop('checked', true) }
                        $('#pp-dianostik-3').val(data.transfer_pasien_exstra_rs.pp_dianostik_3); 

                        $('#pj-shift-tpers').val(data.transfer_pasien_exstra_rs.pj_shift_tpers); 
                        $('#s2id_pj-shift-tpers a .select2c-chosen').html(data.transfer_pasien_exstra_rs.perawat_3);

                        $('#dokter-pem-tpers').val(data.transfer_pasien_exstra_rs.dokter_pem_tpers); 
                        $('#s2id_dokter-pem-tpers a .select2c-chosen').html(data.transfer_pasien_exstra_rs.dokter_3);

                        // BATAS OPST
                        $('#tgl-opst-1').val((data.transfer_pasien_exstra_rs.tgl_opst_1 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_1) : ''));
                        $('#keadaan-opst-1').val(data.transfer_pasien_exstra_rs.keadaan_opst_1);
                        $('#td-opst-1').val(data.transfer_pasien_exstra_rs.td_opst_1);
                        $('#n-opst-1').val(data.transfer_pasien_exstra_rs.n_opst_1);
                        $('#rr-opst-1').val(data.transfer_pasien_exstra_rs.rr_opst_1);
                        $('#s-opst-1').val(data.transfer_pasien_exstra_rs.s_opst_1);
                        $('#sp02-opst-1').val(data.transfer_pasien_exstra_rs.sp02_opst_1);
                        $('#oksigen-opst-1').val(data.transfer_pasien_exstra_rs.oksigen_opst_1);
                        $('#tindakan-opst-1').val(data.transfer_pasien_exstra_rs.tindakan_opst_1);
                        $('#evaluasi-opst-1').val(data.transfer_pasien_exstra_rs.evaluasi_opst_1);                        
                        $('#petugas-opst-1').val(data.transfer_pasien_exstra_rs.petugas_opst_1);
                        $('#s2id_petugas-opst-1 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_1);

                        $('#tgl-opst-2').val((data.transfer_pasien_exstra_rs.tgl_opst_2 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_2) : ''));
                        $('#keadaan-opst-2').val(data.transfer_pasien_exstra_rs.keadaan_opst_2);
                        $('#td-opst-2').val(data.transfer_pasien_exstra_rs.td_opst_2);
                        $('#n-opst-2').val(data.transfer_pasien_exstra_rs.n_opst_2);
                        $('#rr-opst-2').val(data.transfer_pasien_exstra_rs.rr_opst_2);
                        $('#s-opst-2').val(data.transfer_pasien_exstra_rs.s_opst_2);
                        $('#sp02-opst-2').val(data.transfer_pasien_exstra_rs.sp02_opst_2);
                        $('#oksigen-opst-2').val(data.transfer_pasien_exstra_rs.oksigen_opst_2);
                        $('#tindakan-opst-2').val(data.transfer_pasien_exstra_rs.tindakan_opst_2);
                        $('#evaluasi-opst-2').val(data.transfer_pasien_exstra_rs.evaluasi_opst_2);                        
                        $('#petugas-opst-2').val(data.transfer_pasien_exstra_rs.petugas_opst_2);
                        $('#s2id_petugas-opst-2 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_2);

                        $('#tgl-opst-3').val((data.transfer_pasien_exstra_rs.tgl_opst_3 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_3) : ''));
                        $('#keadaan-opst-3').val(data.transfer_pasien_exstra_rs.keadaan_opst_3);
                        $('#td-opst-3').val(data.transfer_pasien_exstra_rs.td_opst_3);
                        $('#n-opst-3').val(data.transfer_pasien_exstra_rs.n_opst_3);
                        $('#rr-opst-3').val(data.transfer_pasien_exstra_rs.rr_opst_3);
                        $('#s-opst-3').val(data.transfer_pasien_exstra_rs.s_opst_3);
                        $('#sp02-opst-3').val(data.transfer_pasien_exstra_rs.sp02_opst_3);
                        $('#oksigen-opst-3').val(data.transfer_pasien_exstra_rs.oksigen_opst_3);
                        $('#tindakan-opst-3').val(data.transfer_pasien_exstra_rs.tindakan_opst_3);
                        $('#evaluasi-opst-3').val(data.transfer_pasien_exstra_rs.evaluasi_opst_3);                        
                        $('#petugas-opst-3').val(data.transfer_pasien_exstra_rs.petugas_opst_3);
                        $('#s2id_petugas-opst-3 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_3);

                        $('#tgl-opst-4').val((data.transfer_pasien_exstra_rs.tgl_opst_4 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_4) : ''));
                        $('#keadaan-opst-4').val(data.transfer_pasien_exstra_rs.keadaan_opst_4);
                        $('#td-opst-4').val(data.transfer_pasien_exstra_rs.td_opst_4);
                        $('#n-opst-4').val(data.transfer_pasien_exstra_rs.n_opst_4);
                        $('#rr-opst-4').val(data.transfer_pasien_exstra_rs.rr_opst_4);
                        $('#s-opst-4').val(data.transfer_pasien_exstra_rs.s_opst_4);
                        $('#sp02-opst-4').val(data.transfer_pasien_exstra_rs.sp02_opst_4);
                        $('#oksigen-opst-4').val(data.transfer_pasien_exstra_rs.oksigen_opst_4);
                        $('#tindakan-opst-4').val(data.transfer_pasien_exstra_rs.tindakan_opst_4);
                        $('#evaluasi-opst-4').val(data.transfer_pasien_exstra_rs.evaluasi_opst_4);                        
                        $('#petugas-opst-4').val(data.transfer_pasien_exstra_rs.petugas_opst_4);
                        $('#s2id_petugas-opst-4 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_4);

                        $('#tgl-opst-5').val((data.transfer_pasien_exstra_rs.tgl_opst_5 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_5) : ''));
                        $('#keadaan-opst-5').val(data.transfer_pasien_exstra_rs.keadaan_opst_5);
                        $('#td-opst-5').val(data.transfer_pasien_exstra_rs.td_opst_5);
                        $('#n-opst-5').val(data.transfer_pasien_exstra_rs.n_opst_5);
                        $('#rr-opst-5').val(data.transfer_pasien_exstra_rs.rr_opst_5);
                        $('#s-opst-5').val(data.transfer_pasien_exstra_rs.s_opst_5);
                        $('#sp02-opst-5').val(data.transfer_pasien_exstra_rs.sp02_opst_5);
                        $('#oksigen-opst-5').val(data.transfer_pasien_exstra_rs.oksigen_opst_5);
                        $('#tindakan-opst-5').val(data.transfer_pasien_exstra_rs.tindakan_opst_5);
                        $('#evaluasi-opst-5').val(data.transfer_pasien_exstra_rs.evaluasi_opst_5);                        
                        $('#petugas-opst-5').val(data.transfer_pasien_exstra_rs.petugas_opst_5);
                        $('#s2id_petugas-opst-5 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_5);

                        $('#tgl-opst-6').val((data.transfer_pasien_exstra_rs.tgl_opst_6 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_6) : ''));
                        $('#keadaan-opst-6').val(data.transfer_pasien_exstra_rs.keadaan_opst_6);
                        $('#td-opst-6').val(data.transfer_pasien_exstra_rs.td_opst_6);
                        $('#n-opst-6').val(data.transfer_pasien_exstra_rs.n_opst_6);
                        $('#rr-opst-6').val(data.transfer_pasien_exstra_rs.rr_opst_6);
                        $('#s-opst-6').val(data.transfer_pasien_exstra_rs.s_opst_6);
                        $('#sp02-opst-6').val(data.transfer_pasien_exstra_rs.sp02_opst_6);
                        $('#oksigen-opst-6').val(data.transfer_pasien_exstra_rs.oksigen_opst_6);
                        $('#tindakan-opst-6').val(data.transfer_pasien_exstra_rs.tindakan_opst_6);
                        $('#evaluasi-opst-6').val(data.transfer_pasien_exstra_rs.evaluasi_opst_6);                        
                        $('#petugas-opst-6').val(data.transfer_pasien_exstra_rs.petugas_opst_6);
                        $('#s2id_petugas-opst-6 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_6);

                        $('#tgl-opst-7').val((data.transfer_pasien_exstra_rs.tgl_opst_7 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_7) : ''));
                        $('#keadaan-opst-7').val(data.transfer_pasien_exstra_rs.keadaan_opst_7);
                        $('#td-opst-7').val(data.transfer_pasien_exstra_rs.td_opst_7);
                        $('#n-opst-7').val(data.transfer_pasien_exstra_rs.n_opst_7);
                        $('#rr-opst-7').val(data.transfer_pasien_exstra_rs.rr_opst_7);
                        $('#s-opst-7').val(data.transfer_pasien_exstra_rs.s_opst_7);
                        $('#sp02-opst-7').val(data.transfer_pasien_exstra_rs.sp02_opst_7);
                        $('#oksigen-opst-7').val(data.transfer_pasien_exstra_rs.oksigen_opst_7);
                        $('#tindakan-opst-7').val(data.transfer_pasien_exstra_rs.tindakan_opst_7);
                        $('#evaluasi-opst-7').val(data.transfer_pasien_exstra_rs.evaluasi_opst_7);                        
                        $('#petugas-opst-7').val(data.transfer_pasien_exstra_rs.petugas_opst_7);
                        $('#s2id_petugas-opst-7 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_7);

                        $('#tgl-opst-8').val((data.transfer_pasien_exstra_rs.tgl_opst_8 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_8) : ''));
                        $('#keadaan-opst-8').val(data.transfer_pasien_exstra_rs.keadaan_opst_8);
                        $('#td-opst-8').val(data.transfer_pasien_exstra_rs.td_opst_8);
                        $('#n-opst-8').val(data.transfer_pasien_exstra_rs.n_opst_8);
                        $('#rr-opst-8').val(data.transfer_pasien_exstra_rs.rr_opst_8);
                        $('#s-opst-8').val(data.transfer_pasien_exstra_rs.s_opst_8);
                        $('#sp02-opst-8').val(data.transfer_pasien_exstra_rs.sp02_opst_8);
                        $('#oksigen-opst-8').val(data.transfer_pasien_exstra_rs.oksigen_opst_8);
                        $('#tindakan-opst-8').val(data.transfer_pasien_exstra_rs.tindakan_opst_8);
                        $('#evaluasi-opst-8').val(data.transfer_pasien_exstra_rs.evaluasi_opst_8);                        
                        $('#petugas-opst-8').val(data.transfer_pasien_exstra_rs.petugas_opst_8);
                        $('#s2id_petugas-opst-8 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_8);

                        $('#tgl-opst-9').val((data.transfer_pasien_exstra_rs.tgl_opst_9 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_9) : ''));
                        $('#keadaan-opst-9').val(data.transfer_pasien_exstra_rs.keadaan_opst_9);
                        $('#td-opst-9').val(data.transfer_pasien_exstra_rs.td_opst_9);
                        $('#n-opst-9').val(data.transfer_pasien_exstra_rs.n_opst_9);
                        $('#rr-opst-9').val(data.transfer_pasien_exstra_rs.rr_opst_9);
                        $('#s-opst-9').val(data.transfer_pasien_exstra_rs.s_opst_9);
                        $('#sp02-opst-9').val(data.transfer_pasien_exstra_rs.sp02_opst_9);
                        $('#oksigen-opst-9').val(data.transfer_pasien_exstra_rs.oksigen_opst_9);
                        $('#tindakan-opst-9').val(data.transfer_pasien_exstra_rs.tindakan_opst_9);
                        $('#evaluasi-opst-9').val(data.transfer_pasien_exstra_rs.evaluasi_opst_9);                        
                        $('#petugas-opst-9').val(data.transfer_pasien_exstra_rs.petugas_opst_9);
                        $('#s2id_petugas-opst-9 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_9);

                        $('#tgl-opst-10').val((data.transfer_pasien_exstra_rs.tgl_opst_10 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_10) : ''));
                        $('#keadaan-opst-10').val(data.transfer_pasien_exstra_rs.keadaan_opst_10);
                        $('#td-opst-10').val(data.transfer_pasien_exstra_rs.td_opst_10);
                        $('#n-opst-10').val(data.transfer_pasien_exstra_rs.n_opst_10);
                        $('#rr-opst-10').val(data.transfer_pasien_exstra_rs.rr_opst_10);
                        $('#s-opst-10').val(data.transfer_pasien_exstra_rs.s_opst_10);
                        $('#sp02-opst-10').val(data.transfer_pasien_exstra_rs.sp02_opst_10);
                        $('#oksigen-opst-10').val(data.transfer_pasien_exstra_rs.oksigen_opst_10);
                        $('#tindakan-opst-10').val(data.transfer_pasien_exstra_rs.tindakan_opst_10);
                        $('#evaluasi-opst-10').val(data.transfer_pasien_exstra_rs.evaluasi_opst_10);                        
                        $('#petugas-opst-10').val(data.transfer_pasien_exstra_rs.petugas_opst_10);
                        $('#s2id_petugas-opst-10 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_10);

                        $('#tgl-opst-11').val((data.transfer_pasien_exstra_rs.tgl_opst_11 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_11) : ''));
                        $('#keadaan-opst-11').val(data.transfer_pasien_exstra_rs.keadaan_opst_11);
                        $('#td-opst-11').val(data.transfer_pasien_exstra_rs.td_opst_11);
                        $('#n-opst-11').val(data.transfer_pasien_exstra_rs.n_opst_11);
                        $('#rr-opst-11').val(data.transfer_pasien_exstra_rs.rr_opst_11);
                        $('#s-opst-11').val(data.transfer_pasien_exstra_rs.s_opst_11);
                        $('#sp02-opst-11').val(data.transfer_pasien_exstra_rs.sp02_opst_11);
                        $('#oksigen-opst-11').val(data.transfer_pasien_exstra_rs.oksigen_opst_11);
                        $('#tindakan-opst-11').val(data.transfer_pasien_exstra_rs.tindakan_opst_11);
                        $('#evaluasi-opst-11').val(data.transfer_pasien_exstra_rs.evaluasi_opst_11);                        
                        $('#petugas-opst-11').val(data.transfer_pasien_exstra_rs.petugas_opst_11);
                        $('#s2id_petugas-opst-11 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_11);

                        $('#tgl-opst-12').val((data.transfer_pasien_exstra_rs.tgl_opst_12 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_12) : ''));
                        $('#keadaan-opst-12').val(data.transfer_pasien_exstra_rs.keadaan_opst_12);
                        $('#td-opst-12').val(data.transfer_pasien_exstra_rs.td_opst_12);
                        $('#n-opst-12').val(data.transfer_pasien_exstra_rs.n_opst_12);
                        $('#rr-opst-12').val(data.transfer_pasien_exstra_rs.rr_opst_12);
                        $('#s-opst-12').val(data.transfer_pasien_exstra_rs.s_opst_12);
                        $('#sp02-opst-12').val(data.transfer_pasien_exstra_rs.sp02_opst_12);
                        $('#oksigen-opst-12').val(data.transfer_pasien_exstra_rs.oksigen_opst_12);
                        $('#tindakan-opst-12').val(data.transfer_pasien_exstra_rs.tindakan_opst_12);
                        $('#evaluasi-opst-12').val(data.transfer_pasien_exstra_rs.evaluasi_opst_12);                        
                        $('#petugas-opst-12').val(data.transfer_pasien_exstra_rs.petugas_opst_12);
                        $('#s2id_petugas-opst-12 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_12);

                        $('#tgl-opst-13').val((data.transfer_pasien_exstra_rs.tgl_opst_13 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_13) : ''));
                        $('#keadaan-opst-13').val(data.transfer_pasien_exstra_rs.keadaan_opst_13);
                        $('#td-opst-13').val(data.transfer_pasien_exstra_rs.td_opst_13);
                        $('#n-opst-13').val(data.transfer_pasien_exstra_rs.n_opst_13);
                        $('#rr-opst-13').val(data.transfer_pasien_exstra_rs.rr_opst_13);
                        $('#s-opst-13').val(data.transfer_pasien_exstra_rs.s_opst_13);
                        $('#sp02-opst-13').val(data.transfer_pasien_exstra_rs.sp02_opst_13);
                        $('#oksigen-opst-13').val(data.transfer_pasien_exstra_rs.oksigen_opst_13);
                        $('#tindakan-opst-13').val(data.transfer_pasien_exstra_rs.tindakan_opst_13);
                        $('#evaluasi-opst-13').val(data.transfer_pasien_exstra_rs.evaluasi_opst_13);                        
                        $('#petugas-opst-13').val(data.transfer_pasien_exstra_rs.petugas_opst_13);
                        $('#s2id_petugas-opst-13 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_13);

                        $('#tgl-opst-14').val((data.transfer_pasien_exstra_rs.tgl_opst_14 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_14) : ''));
                        $('#keadaan-opst-14').val(data.transfer_pasien_exstra_rs.keadaan_opst_14);
                        $('#td-opst-14').val(data.transfer_pasien_exstra_rs.td_opst_14);
                        $('#n-opst-14').val(data.transfer_pasien_exstra_rs.n_opst_14);
                        $('#rr-opst-14').val(data.transfer_pasien_exstra_rs.rr_opst_14);
                        $('#s-opst-14').val(data.transfer_pasien_exstra_rs.s_opst_14);
                        $('#sp02-opst-14').val(data.transfer_pasien_exstra_rs.sp02_opst_14);
                        $('#oksigen-opst-14').val(data.transfer_pasien_exstra_rs.oksigen_opst_14);
                        $('#tindakan-opst-14').val(data.transfer_pasien_exstra_rs.tindakan_opst_14);
                        $('#evaluasi-opst-14').val(data.transfer_pasien_exstra_rs.evaluasi_opst_14);                        
                        $('#petugas-opst-14').val(data.transfer_pasien_exstra_rs.petugas_opst_14);
                        $('#s2id_petugas-opst-14 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_14);

                        $('#tgl-opst-15').val((data.transfer_pasien_exstra_rs.tgl_opst_15 !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tgl_opst_15) : ''));
                        $('#keadaan-opst-15').val(data.transfer_pasien_exstra_rs.keadaan_opst_15);
                        $('#td-opst-15').val(data.transfer_pasien_exstra_rs.td_opst_15);
                        $('#n-opst-15').val(data.transfer_pasien_exstra_rs.n_opst_15);
                        $('#rr-opst-15').val(data.transfer_pasien_exstra_rs.rr_opst_15);
                        $('#s-opst-15').val(data.transfer_pasien_exstra_rs.s_opst_15);
                        $('#sp02-opst-15').val(data.transfer_pasien_exstra_rs.sp02_opst_15);
                        $('#oksigen-opst-15').val(data.transfer_pasien_exstra_rs.oksigen_opst_15);
                        $('#tindakan-opst-15').val(data.transfer_pasien_exstra_rs.tindakan_opst_15);
                        $('#evaluasi-opst-15').val(data.transfer_pasien_exstra_rs.evaluasi_opst_15);                        
                        $('#petugas-opst-15').val(data.transfer_pasien_exstra_rs.petugas_opst_15);
                        $('#s2id_petugas-opst-15 a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_15);

                        $('#tanggal-opst').val((data.transfer_pasien_exstra_rs.tanggal_opst !== null ? datetimefmysql(data.transfer_pasien_exstra_rs.tanggal_opst) : ''));
                        $('#pasien-opst').val(data.transfer_pasien_exstra_rs.pasien_opst);
                        $('#petugas-menerima').val(data.transfer_pasien_exstra_rs.petugas_menerima);
                        $('#petugas-melakukan').val(data.transfer_pasien_exstra_rs.petugas_melakukan);
                        $('#s2id_petugas-melakukan a .select2c-chosen').html(data.transfer_pasien_exstra_rs.nama_perawat_16);                     
                    }   


                    // NARIK DATA 
                    const diagUtamaRm = [...data.diagnosa_utama, ...data.ds_manual_utama].sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran)[0]?.nama;
                    $('#diagnosis-utama-rm').html(diagUtamaRm);
                    $('#diagnosis-sekunder-rm').html(
                        data?.diagnosa_sekunder?.map(diag => `${diag.nama}<br>`)?.join('') +
                        (data.ds_manual_sekunder == null ? "" : data?.ds_manual_sekunder?.map(diag =>
                        `${diag.nama}<br>`)?.join(''))
                    );


                    // NARIK DATA 
                    $.each(data.terapi_resume, function(i, v) {
                        html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${i + 1}</td>
                            <td align="center">${v.nama_obat}</td>
                            <td align="center">${v.jumlah_obat}</td>
                            <td align="center">${v.dosis}</td>
                            <td align="center">${v.frekuensi}</td>
                            <td align="center">${v.cara_pemberian}</td>
                            <td align="center">${!v.ek_jam_pemberian ? '-' : v.ek_jam_pemberian}</td>
                            <td align="center">${!v.ek_jam_pemberian_satu ? '-' : v.ek_jam_pemberian_satu}</td>
                            <td align="center">${!v.ek_jam_pemberian_dua ? '-' : v.ek_jam_pemberian_dua}</td>
                            <td align="center">${!v.ek_jam_pemberian_tiga ? '-' : v.ek_jam_pemberian_tiga}</td>
                            <td align="center">${!v.ek_jam_pemberian_empat ? '-' : v.ek_jam_pemberian_empat}</td>
                            <td align="center">${!v.ek_jam_pemberian_lima ? '-' : v.ek_jam_pemberian_lima}</td>
                            <td align="center">${v.petunjuk_khusus ? v.petunjuk_khusus : ''}</td>
                            <td align="center"><input type="hidden" name="trp_users[]" value="${v.id_users}">${v.akun_user}<input type="hidden" name="tanggal_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                        </tr>
                        `;
                        $('#table-terapi-rm tbody').append(html);
                    });

                $('#modal-transfer-pasien-exstra-rs').modal('show');                  
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function CetakTransferPasienEkstraRumahSakit() {
        if ($('#dokter-dpjp-tpers').val() === '') {
            syams_validation('#dokter-dpjp-tpers', 'Nama Dokter Belum di Pilih.....!');
            return false;
        } else {
            syams_validation_remove('#dokter-dpjp-tpers');
        }

        const id = $('#id-layanan-pendaftaran-tpers').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_cetak_transfer_pasien_ekstra_rs') ?>',
            data: $('#form-transfer-pasien-exstra-rs').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                
                if (data.status) {
                    messageCustom(data.message, 'Success');

                    var dWidth = $(window).width();
                    var dHeight = $(window).height();
                    var x = screen.width / 2 - dWidth / 2;
                    var y = screen.height / 2 - dHeight / 2;;

                    window.open('<?= base_url('pendaftaran_igd/cetak_transfer_pasien_ekstra_rs/') ?>' + id, 'Cetak Surat Transfer Pasien Ekstra RS', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);
                    showListForm($('#id-pendaftaran-tpers').val(), $('#id-layanan-pendaftaran-tpers').val(), $('#id-pasien-tpers').val());
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function CetakObservasiPasienSaatTransfer() {
        const id = $('#id-layanan-pendaftaran-tpers').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_cetak_observasi_pasien_saat_transfer') ?>',
            data: $('#form-transfer-pasien-exstra-rs').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                
                if (data.status) {
                    messageCustom(data.message, 'Success');

                    var dWidth = $(window).width();
                    var dHeight = $(window).height();
                    var x = screen.width / 2 - dWidth / 2;
                    var y = screen.height / 2 - dHeight / 2;

                    window.open('<?= base_url('pendaftaran_igd/cetak_observasi_pasien_saat_transfer/') ?>' + id, 'Cetak Obvervasi Pasien Saat Transfer', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);
                    // $('#modal-tpers').modal('hide');
                    showListForm($('#id-pendaftaran-tpers').val(), $('#id-layanan-pendaftaran-tpers').val(), $('#id-pasien-tpers').val());
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetTPERS() {
        $('#form-transfer-pasien-exstra-rs')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);

        $('#nama-tpers').val('');
		$('#s2id_nama-tpers a .select2c-chosen').html('Pilih Petugas');
        $('#dokter-dpjp-tpers').val('');
		$('#s2id_dokter-dpjp-tpers a .select2c-chosen').html('Pilih Dokter');
        $('#perawat-pendamping-tpers').val('');
		$('#s2id_perawat-pendamping-tpers a .select2c-chosen').html('Pilih Petugas');
        $('#dokter-pendamping-tpers').val('');
		$('#s2id_dokter-pendamping-tpers a .select2c-chosen').html('Pilih Dokter');
        $('#pj-shift-tpers').val('');
		$('#s2id_pj-shift-tpers a .select2c-chosen').html('Pilih Petugas');
        $('#dokter-pem-tpers').val('');
		$('#s2id_dokter-pem-tpers a .select2c-chosen').html('Pilih Dokter');

        // BATAS

        $('#petugas-opst-1').val('');
		$('#s2id_petugas-opst-1 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-2').val('');
		$('#s2id_petugas-opst-2 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-3').val('');
		$('#s2id_petugas-opst-3 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-4').val('');
		$('#s2id_petugas-opst-4 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-5').val('');
		$('#s2id_petugas-opst-5 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-6').val('');
		$('#s2id_petugas-opst-6 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-7').val('');
		$('#s2id_petugas-opst-7 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-8').val('');
		$('#s2id_petugas-opst-8 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-9').val('');
		$('#s2id_petugas-opst-9 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-10').val('');
		$('#s2id_petugas-opst-10 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-11').val('');
		$('#s2id_petugas-opst-11 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-12').val('');
		$('#s2id_petugas-opst-12 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-13').val('');
		$('#s2id_petugas-opst-13 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-14').val('');
		$('#s2id_petugas-opst-14 a .select2c-chosen').html('Pilih Petugas');
        $('#petugas-opst-15').val('');
		$('#s2id_petugas-opst-15 a .select2c-chosen').html('Pilih Petugas');
	}



</script>