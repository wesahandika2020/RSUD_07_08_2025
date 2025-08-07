<script>
    // MONITORING // GRVK
    var nomer = 1;
    nomer++;

    function removeList(el) {
        if (el && el.parentNode && el.parentNode.parentNode) {
            var parent = el.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        }
    }

    function removeListTable(el) {
        if (el && el.parentNode && el.parentNode.parentNode && el.parentNode.parentNode.parentNode) {
            var parent = el.parentNode.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        }
    }

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function bukaLebar(title, num) {
        let html = /* html */ `
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="heading-${num}">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-${num}" aria-expanded="false" aria-controls="collapse-${num}">
                                ${title}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse-${num}" class="collapse" aria-labelledby="heading-${num}">
                        <div class="card-body">       
        `;

        return html;
    }

    function tutupRapet(title, num) {
        let html = /* html */ `
                        </div>
                    </div>
                </div>
            </div>
        `;

        return html;
    }  

    $('#mp_btn_expand_all').click(function() {
        $('.collapse').addClass('show');
    });

    $('#mp_btn_collapse_all').click(function() {
        $('.collapse').removeClass('show');
    });

        
    // MP-A JAM
    // $('#jam-mp, #edit-jam-mp')
    // .on('click', function() {
    //     $(this).timepicker({
    //         format: 'HH:mm',
    //         showInputs: false,
    //         showMeridian: false
    //     });
    // })


    $('#jam-mp, #edit-jam-mp')
    .on('click', function() {
        $(this).timepicker({
            format: 'HH:mm',
            showInputs: false,
            showMeridian: false
        });
    })


    // MP-A tanggal
    $('#tanggal-mp, #edit-tgl-mp, #tgl-mp')
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


    // SKALA EARLY WARNING NEWS AWAL 1 MONITORING PASIEN
    $('.mpnews').change(function() {
        hitungSkalaEarlyNewsMp()
    })

    $('.mpmeows').change(function() {
        hitungSkalaEarlyMeowsMp()
    })

    $('.skalapews').change(function() {
        hitungSkalaEarlyPews()
    })

    function lihatFORM_KEP_66_03(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_66_03(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_66_03(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_monitoring") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                // console.log(data);
                resetFormEntriKeperawatanMonitoring();
                $('#id-layanan-pendaftaran-monitoring').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-monitoring').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-monitoring').val(data.pasien.id_pasien);
                    $('#nama-monitoring').text(data.pasien.nama);
                    $('#rm-monitoring').text(data.pasien.no_rm);
                    $('#tgl-monitoring').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +')'));
                    $('#jk-monitoring').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :'Perempuan'));
                    $('#alamat-monitoring').text(data.pasien.alamat);
                    if (data.pasien.alergi !== null) {$('#ek_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)};
                }
                // MP-A AWAL  // MONITORING PASIEN
                let monitoring_pasien_1 = data.monitoring_pasien_1;
                if (monitoring_pasien_1 !== null) {

                    $('#btn_cetak_monitoring').show();  // Menampilkan tombol cetak
                    $('#btn_cetak_monitoring').on('click', function() {
                        konfirmasiCetakMonitoring(id_pendaftaran, id_layanan_pendaftaran);  // Fungsi ini hanya dipanggil setelah tombol diklik
                    });

                    $('#id-monitoring').val(data.monitoring_pasien_1.id);
                    $('#tanggal-mp').val(data.monitoring_pasien_1.tanggal_mp ? datefmysql(data.monitoring_pasien_1.tanggal_mp) : $('#tanggal-mp').val());
                    $('#bb-mp').val(data.monitoring_pasien_1.bb_mp);
                    $('#tb-mp').val(data.monitoring_pasien_1.tb_mp);

                    // const grafik_mp = JSON.parse(data.monitoring_pasien_1.grafik_mp);


                    // SKALA EARLY WARNING NEWS  MONITORING Pasien AWAL=====>
                    if (data.monitoring_pasien_1.sews_laju_respirasi == '3_1') {
                        $('#mpnews-1-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_laju_respirasi == '1_2') {
                        $('#mpnews-1-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_laju_respirasi == '0_3') {
                        $('#mpnews-1-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_laju_respirasi == '2_4') {
                        $('#mpnews-1-4').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_laju_respirasi == '3_5') {
                        $('#mpnews-1-5').prop('checked', true).change()
                    }

                    if (data.monitoring_pasien_1.sews_saturasi_2 == '3_1') {
                        $('#mpnews-2-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_saturasi_2 == '2_2') {
                        $('#mpnews-2-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_saturasi_2 == '1_3') {
                        $('#mpnews-2-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_saturasi_2 == '0_4') {
                        $('#mpnews-2-4').prop('checked', true).change()
                    }

                    if (data.monitoring_pasien_1.spo2_skala2_news == '3_1') {
                        $('#mpnews-3-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.spo2_skala2_news == '2_2') {
                        $('#mpnews-3-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.spo2_skala2_news == '1_3') {
                        $('#mpnews-3-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.spo2_skala2_news == '0_4') {
                        $('#mpnews-3-4').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.spo2_skala2_news == '1_5') {
                        $('#mpnews-3-5').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.spo2_skala2_news == '2_6') {
                        $('#mpnews-3-6').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.spo2_skala2_news == '3_7') {
                        $('#mpnews-3-7').prop('checked', true).change()
                    }

                    if (data.monitoring_pasien_1.sews_suplemen == '2_1') {
                        $('#mpnews-4-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_suplemen == '0_2') {
                        $('#mpnews-4-2').prop('checked', true).change()
                    }

                    if (data.monitoring_pasien_1.td_sistolik_news == '3_1') {
                        $('#mpnews-5-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.td_sistolik_news == '2_2') {
                        $('#mpnews-5-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.td_sistolik_news == '1_3') {
                        $('#mpnews-5-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.td_sistolik_news == '0_4') {
                        $('#mpnews-5-4').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.td_sistolik_news == '3_5') {
                        $('#mpnews-5-5').prop('checked', true).change()
                    }
  
                    if (data.monitoring_pasien_1.nadi_news == '3_1') {
                        $('#mpnews-6-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.nadi_news == '1_2') {
                        $('#mpnews-6-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.nadi_news == '0_3') {
                        $('#mpnews-6-31').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.nadi_news == '1_4') {
                        $('#mpnews-6-4').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.nadi_news == '2_5') {
                        $('#mpnews-6-5').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.nadi_news == '3_6') {
                        $('#mpnews-6-6').prop('checked', true).change()
                    }
    
                    if (data.monitoring_pasien_1.kesadaran_news == '0_1') {
                        $('#mpnews-7-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.kesadaran_news == '3_2') {
                        $('#mpnews-7-2').prop('checked', true).change()
                    }

                    if (data.monitoring_pasien_1.suhu_newst == '3_1') {
                        $('#mpnews-8-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.suhu_newst == '1_2') {
                        $('#mpnews-8-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.suhu_newst == '0_3') {
                        $('#mpnews-8-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.suhu_newst == '1_4') {
                        $('#mpnews-8-4').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.suhu_newst == '2_5') {
                        $('#mpnews-8-5').prop('checked', true).change()
                    }

                    if (data.monitoring_pasien_1.sews_total_2 === 'Putih') {
                        $('#total-mpnews-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_total_2 === 'Hijau') {
                        $('#total-mpnews-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_total_2 === 'Kuning') {
                        $('#total-mpnews-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_total_2 === 'Merah') {
                        $('#total-mpnews-4').prop('checked', true).change()
                    }
                    // SKALA EARLY WARNING NEWS  MONITORING Pasien AKHIR=====>


                
                    //SKALA EARLY WARNING SYSTEM ( NEWS ) MONITORING PASIEN
                    var skala_early_mp = [data.sews_laju_respirasi, data.sews_saturasi_2, data.spo2_skala2_news, data
                    .sews_suplemen, data.td_sistolik_news, data.nadi_news, data.kesadaran_news, data.suhu_newst
                    ];
                    for (let i = 0; i <= skala_early_mp.length; i++) {
                        for (let j = 1; j <= 8; j++) {
                            var z = i + 1;
                            if (skala_early_mp[i] === $('#mpnews-' + z + '-' + j).val()) {
                                $('#mpnews-' + z + '-' + j).prop('checked', true).change()
                            }
                        }
                    }
                    // end skala early warning system NEWS AKHIR MONITORING PASIEN

                    // SKALA EARLY WARNING MEOWS MONITORING PASIEN AWAL=====>
                    if (data.monitoring_pasien_1.sews_respirasi == '3_1') {
                        $('#mpmeows-1-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_respirasi == '0_2') {
                        $('#mpmeows-1-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_respirasi == '2_3') {
                        $('#mpmeows-1-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_respirasi == '3_4') {
                        $('#mpmeows-1-4').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_saturasi_1 == '3_1') {
                        $('#mpmeows-2-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_saturasi_1 == '2_2') {
                        $('#mpmeows-2-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_saturasi_1 == '0_3') {
                        $('#mpmeows-2-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_o2 == '2_1') {
                        $('#mpmeows-3-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_o2 == '0_2') {
                        $('#mpmeows-3-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_suhu == '3_1') {
                        $('#mpmeows-4-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_suhu == '0_2') {
                        $('#mpmeows-4-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_suhu == '2_3') {
                        $('#mpmeows-4-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_suhu == '3_4') {
                        $('#mpmeows-4-4').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_td_sistolik == '3_1') {
                        $('#mpmeows-5-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_td_sistolik == '0_2') {
                        $('#mpmeows-5-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_td_sistolik == '1_3') {
                        $('#mpmeows-5-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_td_sistolik == '2_4') {
                        $('#mpmeows-5-4').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_td_sistolik == '3_5') {
                        $('#mpmeows-5-5').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_td_diastolik == '0_1') {
                        $('#mpmeows-6-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_td_diastolik == '1_2') {
                        $('#mpmeows-6-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_td_diastolik == '2_3') {
                        $('#mpmeows-6-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_td_diastolik == '3_4') {
                        $('#mpmeows-6-4').prop('checked', true).change()
                    }


                    if (data.monitoring_pasien_1.sews_nadi == '3_1') {
                        $('#mpmeows-7-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_nadi == '2_2') {
                        $('#mpmeows-7-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_nadi == '0_3') {
                        $('#mpmeows-7-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_nadi == '1_4') {
                        $('#mpmeows-7-4').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_nadi == '2_5') {
                        $('#mpmeows-7-5').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_nadi == '3_6') {
                        $('#mpmeows-7-6').prop('checked', true).change()
                    }


                    if (data.monitoring_pasien_1.sews_kesadaran_1 == '0_1') {
                        $('#mpmeows-8-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_kesadaran_1 == '3_2') {
                        $('#mpmeows-8-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_nyeri == '0_1') {
                        $('#mpmeows-9-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_nyeri == '3_2') {
                        $('#mpmeows-9-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_pengeluaran == '0_1') {
                        $('#mpmeows-10-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_pengeluaran == '3_2') {
                        $('#mpmeows-10-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_protein_urin == '2_1') {
                        $('#mpmeows-11-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_protein_urin == '3_2') {
                        $('#mpmeows-11-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_total_1 === 'Putih') {
                        $('#total-mpmeows-1').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_total_1 === 'Hijau') {
                        $('#total-mpmeows-2').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_total_1 === 'Kuning') {
                        $('#total-mpmeows-3').prop('checked', true).change()
                    }
                    if (data.monitoring_pasien_1.sews_total_1 === 'Merah') {
                        $('#total-mpmeows-4').prop('checked', true).change()
                    }
                    // SKALA EARLY WARNING MEOWS MONITORING PASIEN AKHIR=====>

                    // skala early warning system MEOWS MONITORING PASIEN AWAL
                    var skala_early_mpp = [data.sews_respirasi, data.sews_saturasi_1, data.sews_o2, data
                        .sews_suhu, data.sews_td_sistolik, data.sews_td_diastolik, data.sews_nadi, data
                        .sews_kesadaran_1, data.sews_nyeri, data.sews_pengeluaran, data.sews_protein_urin
                    ];
                    for (let i = 0; i <= skala_early_mpp.length; i++) {
                        for (let j = 1; j <= 8; j++) {
                            var z = i + 1;
                            if (skala_early_mpp[i] === $('#mpmeows-' + z + '-' + j).val()) {
                                $('#mpmeows-' + z + '-' + j).prop('checked', true).change()
                            }
                        }
                    }
                    // skala early warning system MEOWS AKHIR MONITORING PASIEN

                    // skala early warning system PEWS AKHIR MONITORING PASIEN
                    for (let a = 1; a <= 19; a++) {
                        for (let b = 1; b <= 7; b++) {
                            if (data.monitoring_pasien_1.pews_suhu === $('#skalapews_' + a + '_' + b).val() && data.monitoring_pasien_1.pews_suhu === $('.pews_suhu_' + a +
                                    '_' + b).val()) {
                                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
                            }

                            if (data.monitoring_pasien_1.pews_pernafasan === $('#skalapews_' + a + '_' + b).val() && data.monitoring_pasien_1.pews_pernafasan === $(
                                    '.pews_pernafasan_' + a + '_' + b).val()) {
                                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
                            }

                            if (data.monitoring_pasien_1.pews_subpernafasan === $('#skalapews_' + a + '_' + b).val() && data.monitoring_pasien_1.pews_subpernafasan === $(
                                    '.pews_subpernafasan_' + a + '_' + b).val()) {
                                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
                            }

                            if (data.monitoring_pasien_1.pews_alat_bantu === $('#skalapews_' + a + '_' + b).val() && data.monitoring_pasien_1.pews_alat_bantu === $(
                                    '.pews_alat_bantu_' + a + '_' + b).val()) {
                                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
                            }

                            if (data.monitoring_pasien_1.pews_saturasi === $('#skalapews_' + a + '_' + b).val() && data.monitoring_pasien_1.pews_saturasi === $(
                                    '.pews_saturasi_' + a + '_' + b).val()) {
                                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
                            }

                            if (data.monitoring_pasien_1.pews_nadi === $('#skalapews_' + a + '_' + b).val() && data.monitoring_pasien_1.pews_nadi === $('.pews_nadi_' + a +
                                    '_' + b).val()) {
                                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
                            }

                            if (data.monitoring_pasien_1.pews_warna_kulit === $('#skalapews_' + a + '_' + b).val() && data.monitoring_pasien_1.pews_warna_kulit === $(
                                    '.pews_warna_kulit_' + a + '_' + b).val()) {
                                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
                            }

                            if (data.monitoring_pasien_1.pews_tds === $('#skalapews_' + a + '_' + b).val() && data.monitoring_pasien_1.pews_tds === $('.pews_tds_' + a + '_' +
                                    b).val()) {
                                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
                            }

                            if (data.monitoring_pasien_1.pews_kesadaran === $('#skalapews_' + a + '_' + b).val() && data.monitoring_pasien_1.pews_kesadaran === $(
                                    '.pews_kesadaran_' + a + '_' + b).val()) {
                                $('#skalapews_' + a + '_' + b).prop('checked', true).change()
                            }
                        }
                    }                   
                }

                // MPP-C JAM
                $('#collapse-data-monitoring-pasien-p').one('click', function() {
                    $('#jam-mpp, #jam-mpp-edit')
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })

                // MPP-C Tanggal
                $('#collapse-data-monitoring-pasien-p').one('click', function() {
                    $('#tgl-mpp, #tgl-mpp-edit')
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
                })
        
                // Perawat
                $('#collapse-data-monitoring-pasien-p').one('click', function() {
                    $('#perawat-mpp, #perawat-mpp-edit')
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
                })


                // MPP-C
                if (typeof data.monitoring_pasien_2 !== 'undefined' || data.monitoring_pasien_2 !== null) {
                    // console.log(data.monitoring_pasien_2);
                    showMonitoringPasien2A(data.monitoring_pasien_2, id_pendaftaran, id_layanan_pendaftaran, bed);
                    showMonitoringPasien2(nomer);
                } else {
                    $('#tabel-mpp .body-table').empty();
                }
                
                // grafik monitoring
                if (typeof data.grafik_monitoring !== 'undefined' || data.grafik_monitoring !== null) {
                    // console.log(data.grafik_monitoring);
                    grafik(data.grafik_monitoring, id_layanan_pendaftaran, id_pendaftaran, action);
                } else {
                    $('#tabel-mg .body-table').empty();
                }

                $('#bed-monitoring').text(bed);

                console.log(bed);

   
                $('#modal_entri_keperawatan_monitoring').modal('show');

                if (action === 'lihat') {
                    // Disable semua input dan textarea, tapi biarkan tombol expand/collapse tetap aktif
                    $('#modal_entri_keperawatan_monitoring :input')
                        .not('[data-dismiss="modal"], #mp_btn_expand_all, #mp_btn_collapse_all, #btn_cetak_monitoring')
                        .prop('disabled', true);

                    $('#modal_entri_keperawatan_monitoring textarea').prop('readonly', true);
                    $('#btn-simpan').hide();

                    // Disable select dan Select2
                    $('#modal_entri_keperawatan_monitoring select')
                        .not('[data-dismiss="modal"]')
                        .prop('disabled', true)
                        .trigger('change.select2c');

                    $('#modal_entri_keperawatan_monitoring [id^="s2id_"]').css({
                        'pointer-events': 'none',
                        'opacity': 0.6
                    });
                }
                
            },

            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function konfirmasiCetakMonitoring(id_pendaftaran, id_layanan_pendaftaran){
        window.open('<?= base_url('pendaftaran_igd/cetak_form_monitoring/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran,
        'Cetak Form Monitoring', 'width=' + dWidth + ', height=' +
        dHeight +
        ', left=' + x + ', top=' + y);
    }

    function resetFormEntriKeperawatanMonitoring() {
        $('#form_entri_keperawatan_monitoring')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#buka-tutup-mpp').empty();
    }

    // function konfirmasiSimpanEntriKeperawatanMonitoring() {

    //     console.log('test');
        
    //     if ($('#tgl-mpp').val() === '') {
    //         syams_validation('#tgl-mpp', 'Tanggal harus diisi.');
    //         return false;
    //     } else {
    //         syams_validation_remove('#tgl-mpp');
    //     }

    //     // if ($('#jam-mpp').val() === '') {
    //     //     syams_validation('#jam-mpp', 'Jam harus diisi.');
    //     //     return false;
    //     // } else {
    //     //     syams_validation_remove('#jam-mpp');
    //     // }

    //     // if ($('#perawat-mpp').val() === '') {
    //     //     syams_validation('#perawat-mpp', 'Nama Perawat harus diisi.');
    //     //     return false;
    //     // } else {
    //     //     syams_validation_remove('#perawat-mpp');
    //     // }

    //     swal.fire({
    //         title: 'Simpan Entri Keperawatan',
    //         text: "Apakah anda yakin akan menyimpan Resume Keperawatan ini ?",
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
    //         cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.value) {
    //             simpanEntriKeperawatanMonitoring();
    //         }
    //     })     
    // }


    function konfirmasiSimpanEntriKeperawatanMonitoring() {
        // console.log('test');
        var stop = false;
        if (!stop) {
            var id_monitoring = $('#id-monitoring').val();
            var text;
            var btnTextConfirmmonitoring;

            if (id_monitoring) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmmonitoring = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmmonitoring = 'Simpan';
            }

            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmmonitoring,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanEntriKeperawatanMonitoring();
                }
            });
        }
    }
    
    function simpanEntriKeperawatanMonitoring() {
        $.ajax({
            type: 'POST',
            // url: '<!?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_monitoring_pasien") ?>',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_monitoring_pasien") ?>',
            data: $('#form_entri_keperawatan_monitoring').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.respon !== null) {
                    if (data.respon.show !== null) {
                        $('#wizard_form_resume').bwizard('show', data.respon.show);
                        if (data.respon.add_show !== undefined) {
                            $('#wizard-resume-group').bwizard('show', data.respon.add_show);
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        } else {

                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        }
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
                        $('#modal_entri_keperawatan_monitoring').modal('hide');
                        showListForm($('#id-pendaftaran-monitoring').val(), $('#id-layanan-pendaftaran-monitoring').val(), $('#id-pasien-monitoring').val());
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

    // baru monitoring
    var chart;
    var xAxisCategories = [];
    $('#btn-mp-chart').on('click', function() {

        if ($('#jam-mp').val() === '') {
            syams_validation('#jam-mp', 'jam harus diisi.');
            return false;
        } else {
            syams_validation_remove('#jam-mp');
        }

        if ($('#tgl-mp').val() === '') {
            syams_validation('#tgl-mp', 'tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tgl-mp');
        }

        var suhuValue   = $('#suhu-mp').val() === '' ? null : parseFloat($('#suhu-mp').val());
        var rrValue     = $('#rr-mp').val() === '' ? null : parseFloat($('#rr-mp').val());
        var nadiValue   = $('#nadi-mp').val() === '' ? null : parseFloat($('#nadi-mp').val());
        var jamValue    = $('#jam-mp').val();
        var tglValue    = $('#tgl-mp').val();

        var ajaxData = {
            suhu: suhuValue,
            rr: rrValue,
            nadi: nadiValue,
            jam: jamValue,
            tgl: tglValue,
            id_layanan_pendaftaran: $('#id-layanan-pendaftaran-monitoring').val(),
            id_pendaftaran: $('#id-pendaftaran-monitoring').val(),
            id_user: <?= $this->session->userdata("id_translucent") ?>
        };

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_grafik_monitoring") ?>',
            data: ajaxData,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                hideLoader(); // Hide loader before calling grafik function
                if (data.respon !== null) {
                    grafik(data); // Call grafik function here
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });
        $('#suhu-mp').val('');
        $('#rr-mp').val('');
        $('#nadi-mp').val('');
        $('#jam-mp').val('');
        $('#tgl-mp').val('');        
    });

    // baru monitoring
    function filterEmptyValues(dataArray) {
        return dataArray.filter(value => value !== '');
    }

    function grafik(data, id_layanan_pendaftaran, id_pendaftaran, action) {
        function processData(value) {
            if (value === null || value === '' || isNaN(parseFloat(value.replace(',', '.')))) {
                return '';
            }
            return parseFloat(value.replace(',', '.'));
        }

        var suhu = data.map(v => processData(v.mp_suhu));
        var rr = data.map(v => processData(v.mp_rr));
        var nadi = data.map(v => processData(v.mp_nadi));

        // Filter data untuk menghapus nilai kosong
        suhu = filterEmptyValues(suhu);
        rr = filterEmptyValues(rr);
        nadi = filterEmptyValues(nadi);

        // JANGAN DI HAPUS YO WESA
        // var options = {
        //     title: {
        //         text: 'Grafik TTV',
        //         style: { fontSize: '15px', fontWeight: 'bold', color: '#333333' }
        //     },
        //     chart: {
        //         height: '500px',
        //         // type: 'areaspline',
        //         type: 'spline',
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
        //     xAxis: {
        //         // categories: Array.from({ length: suhu.length }, (_, i) => i + 1), // Menggunakan indeks sebagai kategori
        //         categories: xAxisCategories, // Menggunakan indeks sebagai kategori
        //         gridLineWidth: 1,
        //         gridLineColor: '#e6e6e6',
        //         title: { text: 'Indeks', style: { fontSize: '16px', color: '#000000', fontWeight: 'bold' } }
        //     },
        //     yAxis: {
        //         title: {
        //             text: '',
        //             rotation: -90,
        //             x: 0,
        //             useHTML: true
        //         },
        //         accessibility: {
        //             rangeDescription: 'Range: 0 to 200.'
        //         },
        //         lineWidth: 2,
        //         min: 0,
        //         max: 200,
        //         tickAmount: 21, // Total ticks to cover range 0 to 200
        //         tickInterval: 10, // Interval for ticks
        //         gridLineWidth: 1,
        //         gridLineColor: '#e6e6e6'
        //     },
        //     xAxis: {
        //         min: 0,
        //         max: 40, // ganti jika grafik tidak muat terserah angkanya
        //         // max: 25,  
        //         tickInterval: 1,
        //         gridLineWidth: 1,
        //         gridLineColor: '#e6e6e6',
        //         title: {
        //             text: '',
        //             align: 'middle'
        //         },
        //         accessibility: {
        //             // rangeDescription: 'Range: 0 to 25 hours.'
        //             rangeDescription: 'Range: 0 to 40 hours.' // ganti jika grafik tidak muat terserah angkanya
        //         },
        //         labels: {
        //             formatter: function() {
        //                 // Return empty string for numbers between 1 and 25
        //                 // if (this.value >= 1 && this.value <= 25) {
        //                 //     return '';
        //                 // }

        //                 if (this.value >= 1 && this.value <= 40) { // ganti jika grafik tidak muat terserah angkanya
        //                     return '';
        //                 }
        //                 return '' + this.value;
        //             }
        //         }
        //     },
        //     // series: [
        //     //     { name: '<span style="font-size:10px;">Suhu</span>', data: suhu, marker: { symbol: 'circle', radius: 5 }, lineWidth: 1, shadow: true, color: '#FF0000' },
        //     //     { name: '<span style="font-size:10px;">Respiratory Rate</span>', data: rr, marker: { symbol: 'circle', radius: 5 }, lineWidth: 1, shadow: true, color: '#2E8B57' },
        //     //     { name: '<span style="font-size:10px;">Nadi</span>', data: nadi, marker: { symbol: 'circle', radius: 5 }, lineWidth: 1, shadow: true, color: '#FFFF00' }
        //     // ],
        //     series: [
        //         { name: '<span style="font-size:10px;">Suhu</span>', data: suhu, marker: { symbol: 'circle', radius: 5 }, lineWidth: 1, shadow: true, color: '#FF0000' },
        //         { name: '<span style="font-size:10px;">Respiratory Rate</span>', data: rr, marker: { symbol: 'circle', radius: 5 }, lineWidth: 1, shadow: true, color: '#00FF7F' },
        //         { name: '<span style="font-size:10px;">Nadi</span>', data: nadi, marker: { symbol: 'circle', radius: 5 }, lineWidth: 1, shadow: true, color: '#008080' }
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
        //     legend: {
        //         enabled: true,
        //         itemStyle: { fontSize: '14px', fontWeight: 'bold' }
        //     },
        //     plotOptions: {
        //         series: {
        //             dataLabels: {
        //                 enabled: true,
        //                 format: '{point.y}',
        //                 style: { fontSize: '12px', color: '#000000', textOutline: '1px contrast' }
        //             },
        //             enableMouseTracking: true,
        //             marker: {
        //                 enabled: true,
        //                 radius: 4,
        //                 states: { hover: { enabled: true, radius: 6 } }
        //             }
        //         }
        //     }


        // };

        // INI DIMULAI DARI TENGAH ANGKA GRAFIKNYA
        // var options = {
        //     title: {
        //         text: 'Grafik TTV',
        //         style: { fontSize: '15px', fontWeight: 'bold', color: '#333333' }
        //     },
        //     chart: {
        //         height: '500px',
        //         type: 'spline',
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
        //     xAxis: {
        //         categories: xAxisCategories, // Menggunakan indeks sebagai kategori
        //         min: 0,
        //         max: 40, // Sudah diperbaiki
        //         tickInterval: 1,
        //         gridLineWidth: 1,
        //         gridLineColor: '#e6e6e6',
        //         title: { text: '', style: { fontSize: '16px', color: '#000000', fontWeight: 'bold' } },
        //         accessibility: {
        //             rangeDescription: 'Range: 0 to 40 hours.' // Sudah diperbaiki
        //         },
        //         labels: {
        //             formatter: function() {
        //                 if (this.value >= 1 && this.value <= 40) { // Sudah diperbaiki
        //                     return '';
        //                 }
        //                 return '' + this.value;
        //             }
        //         }
        //     },
        //     yAxis: {
        //         title: {
        //             text: '',
        //             rotation: -90,
        //             x: 0,
        //             useHTML: true
        //         },
        //         accessibility: {
        //             rangeDescription: 'Range: 0 to 200.'
        //         },
        //         lineWidth: 2,
        //         min: 0,
        //         max: 200,
        //         tickAmount: 21,
        //         tickInterval: 10,
        //         gridLineWidth: 1,
        //         gridLineColor: '#e6e6e6'
        //     },
        //     series: [
        //         { name: '<span style="font-size:10px;">Suhu</span>', data: suhu, marker: { symbol: 'circle', radius: 5 }, lineWidth: 1, shadow: true, color: '#FF0000' },
        //         { name: '<span style="font-size:10px;">Respiratory Rate</span>', data: rr, marker: { symbol: 'circle', radius: 5 }, lineWidth: 1, shadow: true, color: '#00FF7F' },
        //         { name: '<span style="font-size:10px;">Nadi</span>', data: nadi, marker: { symbol: 'circle', radius: 5 }, lineWidth: 1, shadow: true, color: '#008080' }
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
        //     legend: {
        //         enabled: true,
        //         itemStyle: { fontSize: '14px', fontWeight: 'bold' }
        //     },
        //     plotOptions: {
        //         series: {
        //             dataLabels: {
        //                 enabled: true,
        //                 format: '{point.y}',
        //                 style: { fontSize: '12px', color: '#000000', textOutline: '1px contrast' }
        //             },
        //             enableMouseTracking: true,
        //             marker: {
        //                 enabled: true,
        //                 radius: 4,
        //                 states: { hover: { enabled: true, radius: 6 } }
        //             }
        //         }
        //     }
        // };

        // INI SUDAH BENAR DAN MEEPET KELUARYA DATA GRAFIK PERTAMA
        var options = {
            title: {
                text: 'Grafik TTV', // Judul grafik
                style: { fontSize: '15px', fontWeight: 'bold', color: '#333333' } // Gaya teks judul
            },
            chart: {
                height: '500px', // Tinggi grafik
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
            xAxis: {
                categories: xAxisCategories, // Data pada sumbu X
                min: 0, // Nilai minimum sumbu X
                max: 40, // Nilai maksimum sumbu X
                tickInterval: 1, // Jarak antar-tanda pada sumbu X
                gridLineWidth: 1, // Ketebalan garis grid
                gridLineColor: '#e6e6e6', // Warna garis grid
                title: { 
                    text: '', // Judul sumbu X
                    style: { fontSize: '16px', color: '#000000', fontWeight: 'bold' } 
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 40 hours.' // Deskripsi aksesibilitas untuk pembaca layar
                },
                labels: {
                    formatter: function() {
                        // Jika nilai antara 1 dan 40, tampilkan label kosong (untuk menghindari tampilan terlalu ramai)
                        if (this.value >= 1 && this.value <= 40) {
                            return '';
                        }
                        return '' + this.value;
                    }
                },
                startOnTick: true, // Memastikan grafik dimulai dari titik pertama
                endOnTick: false, // Mencegah grafik berhenti di titik terakhir
                minPadding: 0, // Mengurangi padding di awal grafik
                maxPadding: 0 // Mengurangi padding di akhir grafik
            },
            yAxis: {
                title: {
                    text: '', // Kosongkan karena tidak ada label sumbu Y
                    rotation: -90, // Rotasi label
                    x: 0, // Posisi label
                    useHTML: true // Gunakan HTML dalam teks
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 200.' // Deskripsi aksesibilitas
                },
                lineWidth: 2, // Ketebalan garis sumbu Y
                min: 0, // Nilai minimum sumbu Y
                max: 200, // Nilai maksimum sumbu Y
                tickAmount: 21, // Jumlah tanda pada sumbu Y
                tickInterval: 10, // Jarak antar-tanda pada sumbu Y
                gridLineWidth: 1, // Ketebalan garis grid
                gridLineColor: '#e6e6e6' // Warna garis grid
            },
            series: [
                { 
                    name: '<span style="font-size:10px;">Suhu</span>', // Nama seri
                    data: suhu, // Data untuk suhu
                    marker: { 
                        symbol: 'circle', // Bentuk titik data
                        radius: 5 // Ukuran titik data
                    },
                    lineWidth: 1, // Ketebalan garis
                    shadow: true, // Aktifkan bayangan pada garis
                    color: '#FF0000', // Warna garis merah
                    pointPlacement: 'on' // Memastikan titik berada di atas label sumbu X
                },
                { 
                    name: '<span style="font-size:10px;">Respiratory Rate</span>', 
                    data: rr, 
                    marker: { 
                        symbol: 'circle', 
                        radius: 5 
                    }, 
                    lineWidth: 1, 
                    shadow: true, 
                    color: '#00FF7F',
                    pointPlacement: 'on'
                },
                { 
                    name: '<span style="font-size:10px;">Nadi</span>', 
                    data: nadi, 
                    marker: { 
                        symbol: 'circle', 
                        radius: 5 
                    }, 
                    lineWidth: 1, 
                    shadow: true, 
                    color: '#008080',
                    pointPlacement: 'on'
                }
            ],
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>', // Format header tooltip
                pointFormat: '{point.y}', // Format nilai titik data
                backgroundColor: 'rgba(255,255,255,0.95)', // Warna latar belakang tooltip
                borderColor: '#ccc', // Warna border tooltip
                borderRadius: 10, // Bentuk sudut tooltip
                style: { fontSize: '10px' }, // Ukuran teks tooltip
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
                        style: { fontSize: '12px', color: '#000000', textOutline: '1px contrast' } // Gaya teks label
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


        Highcharts.chart('grafik_mp', options);
        monitoringGrafik(data, action); // Pastikan fungsi monitoringGrafik didefinisikan
    }

    // monitoring 
    function monitoringGrafik(data, action) {
        if (data != null) {
            $('#tabel-mg .body-table').empty(); // Kosongkan tabel sebelum mengisi ulang

            $.each(data, function (i, v) {
                let html = /* html */ `
                <tr class="row-in-${i + 1}">
                    <td class="number-monitoring" align="center">${i + 1}</td>

                    <td align="center">
                        <span>${v.mp_suhu ? v.mp_suhu : '-'}</span>
                        <input type="hidden" class="custom-form edit-number-nt clear-input d-inline-block col-lg-3" value="${v.mp_suhu ? v.mp_suhu : ''}">
                    </td>
                    <td align="center">
                        <span>${v.mp_rr ? v.mp_rr : '-'}</span>
                        <input type="hidden" class="custom-form edit-number-nt clear-input d-inline-block col-lg-3" value="${v.mp_rr ? v.mp_rr : ''}">
                    </td>
                    <td align="center">
                        <span>${v.mp_nadi ? v.mp_nadi : '-'}</span>
                        <input type="hidden" class="custom-form edit-number-nt clear-input d-inline-block col-lg-3" value="${v.mp_nadi ? v.mp_nadi : ''}">
                    </td>
                    <td align="center">
                        <span>${v.mp_jam ? v.mp_jam : '-'}</span>
                        <input type="hidden" class="custom-form edit-number-nt clear-input d-inline-block col-lg-3" value="${v.mp_jam ? v.mp_jam : ''}">
                    </td>
                    <td align="center"> <span>${datefmysql(v.mp_tanggal)}</span> <input type="hidden" class="custom-form tanggal-edit clear-input d-inline-block col-lg-5" value="${datefmysql(v.mp_tanggal)}"></td>
                    <td align="center"> <span>${v.nama_petugas}</span> <input type="hidden" class="custom-form jam-edit clear-input d-inline-block col-lg-3" value="${v.nama_petugas}"></td>
                    <td align="center" class="alatGrafik">
                        <button type="button" class="btn btn-secondary btn-xxs edit-button" onclick="editMonitoringGrafik('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="konfirmHapusMP('${v.id}', '${v.id_layanan_pendaftaran}', '${v.id_pendaftaran}')" index="${i}" nama="${v.mp_nama}" jam="${v.mp_jam}" tanggal="${v.mp_tanggal}" suhu="${v.mp_suhu}" rr="${v.mp_rr}" nadi="${v.mp_nadi}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                `;

                $('#tabel-mg .body-table').append(html);
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

    // monitoring
    function konfirmHapusMP(id, id_layanan_pendaftaran, id_pendaftaran) {
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
                hapusMonitoringGrafik(id, id_layanan_pendaftaran, id_pendaftaran);
            }
        })
    }

    // monitoring
    function hapusMonitoringGrafik(id, id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'DELETE',
            url: '<?= base_url("pelayanan/api/pelayanan/hapus_grafik_monitoring") ?>/' + id + '/' + id_layanan_pendaftaran + '/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader(); 
                if (data.respon !== null) {
                    grafik(data); 
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });
    }

    // MP-A + update // monitoring
    function editMonitoringGrafik(id, id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_grafik_monitoring_by_id") ?>/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#modal-edit-grafik-monitoring').modal('show');

                $('#id-mp').val(data.id);
                $('#edit-id-layanan-pendaftaran-mp').val(data.id_layanan_pendaftaran);
                $('#edit-id-pendaftaran-mp').val(data.id_pendaftaran);
                $('#edit-suhu-mp').val(data.mp_suhu);
                $('#edit-rr-mp').val(data.mp_rr);
                $('#edit-nadi-mp').val(data.mp_nadi);
                $('#edit-jam-mp').val(data.mp_jam);
                $('#edit-tgl-mp').val(datefmysql(data.mp_tanggal));
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

        $('#btn-update-grafik-monitoring').on('click', function() {

            var id = $('#id-mp').val();
            var suhuValue = $('#edit-suhu-mp').val() === '' ? null : parseFloat($('#edit-suhu-mp').val());
            var rrValue = $('#edit-rr-mp').val() === '' ? null : parseFloat($('#edit-rr-mp').val());
            var nadiValue = $('#edit-nadi-mp').val() === '' ? null : parseFloat($('#edit-nadi-mp').val());
            var jamValue = $('#edit-jam-mp').val();
            var tglValue = $('#edit-tgl-mp').val();
            var idLayananPendaftaranValue = $('#edit-id-layanan-pendaftaran-mp').val();
            var idPendaftaranValue = $('#edit-id-pendaftaran-mp').val();
            var idUserValue = <?= $this->session->userdata("id_translucent") ?>; // Add this line

            if (isNaN(suhuValue) || isNaN(rrValue) || isNaN(nadiValue)) {
                console.error("Invalid input values for suhu, rr, or nadi.");
                return;
            }

            var ajaxData = {
                id: id,
                suhu: suhuValue,
                rr: rrValue,
                nadi: nadiValue,
                jam: jamValue,
                tgl: tglValue,
                id_layanan_pendaftaran: idLayananPendaftaranValue,
                id_pendaftaran: idPendaftaranValue,
                id_user: idUserValue
            };

            $.ajax({
                type: 'POST',
                url: '<?= base_url("pelayanan/api/pelayanan/update_grafik_monitoring") ?>',
                data: ajaxData,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    hideLoader(); 
                    $('#modal-edit-grafik-monitoring').modal('hide');
                    if (data.respon !== null) {
                        grafik(data); 
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

    // MPP-C
    function showMonitoringPasien2(num) {
        let html = bukaLebar('Form Monitoring ', num);
        html += /* html */ `
            <div class="from-group">
            </div>
            <hr>
            <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-mpp">
                <thead>
                    <tr>
                        <td colspan="12"><b></b>
                    </tr>
                    <tr>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Tekanan Darah</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Saturasi 02</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Terapi Oksigen</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Status Kesadaran</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Kategori EWS</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Pengawasan Infus/Plebitis</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Diit</th>
                    </tr>
                    <tr>
                        <td class="center"><input type="text" name="tdarah_mpp" id="tdarah-mpp"class="custom-form clear-input d-inline-block col-lg-7"></td>
                        <td class="center"><input type="text" name="saturasi_mppp" id="saturasi-mppp"class="custom-form clear-input d-inline-block col-lg-7"></td>
                        <td class="center"><input type="text" name="toksigen_mpp" id="toksigen-mpp"class="custom-form clear-input d-inline-block col-lg-7"> LPM</td>
                        <td class="center"><input type="text" name="skesadaran_mpp" id="skesadaran-mpp"class="custom-form clear-input d-inline-block col-lg-7"></td>
                        <td class="center"><input type="text" name="kategori_mpp" id="kategori-mpp"class="custom-form clear-input d-inline-block col-lg-7"></td>
                        <td class="center"><input type="text" name="pengawasan_mpp" id="pengawasan-mpp"class="custom-form clear-input d-inline-block col-lg-7"></td>
                        <td class="center"><input type="text" name="diit_mpp" id="diit-mpp"class="custom-form clear-input d-inline-block col-lg-7"> CC</td>                           
                    </tr>
                    <tr>
                        <td colspan="12"><b>(Masuk)</b>
                    </tr>
                    <tr>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Oral</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">NGT</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Parenteral Line 1</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Parenteral Line 2</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Produk Darah</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Total Input</th>
                        <th class="center" style="background-color: #B0E0E6; color: black;">Tanggal</th>   
                        <th class="center" style="background-color: #B0E0E6; color: black;">Jam</th>               
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="12" class="bold text-uppercase"></td>
                    </tr>
                    <tr>
                        <td class="center"><input type="number"name="oral_mpp" id="oral-mpp"class="custom-form clear-input d-inline-block col-lg-6 ppm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="number"name="ngt_mpp" id="ngt-mpp"class="custom-form clear-input d-inline-block col-lg-6 ppm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="number" name="paranteral_mpp" id="paranteral-mpp"class="custom-form clear-input d-inline-block col-lg-6 ppm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="number" name="paranteral_mppp" id="paranteral-mppp"class="custom-form clear-input d-inline-block col-lg-6 ppm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="number" name="produk_mpp" id="produk-mpp"class="custom-form clear-input d-inline-block col-lg-6 ppm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="text" name="input_mpp" id="input-mpp"class="custom-form clear-input d-inline-block col-lg-6" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>                          
                        <td class="center"><input type="text" name="tgl_mpp" id="tgl-mpp"class="custom-form clear-input d-inline-block col-lg-10" placeholder="dd/mm/yyyy"></td>
                        <td class="center"><input type="text" name="jam_mpp" id="jam-mpp"class="custom-form clear-input d-inline-block col-lg-5"></td>                        
                    </tr>
                    <tr>
                        <td colspan="12"><b>(Keluar)</b>
                    </tr>
                        <tr>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Urin</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">BAB</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Gastrik</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">WSD/Drain</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">IWL</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Total Output</th>                              
                            <th class="center" style="background-color: #B0E0E6; color: black;">(Balance Cairan)</th> 
                            <th class="center" style="background-color: #B0E0E6; color: black;">Perawat</th>
                        </tr>
                    <tr>
                        <td class="center"><input type="number" name="urin_mpp" id="urin-mpp"class="custom-form clear-input d-inline-block col-lg-6 ppn" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="number" name="bab_mpp" id="bab-mpp"class="custom-form clear-input d-inline-block col-lg-6 ppn" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="number" name="gastrik_mpp" id="gastrik-mpp"class="custom-form clear-input d-inline-block col-lg-6 ppn" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="number" name="wsd_mpp" id="wsd-mpp"class="custom-form clear-input d-inline-block col-lg-6 ppn" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="number" name="iwl_mpp" id="iwl-mpp"class="custom-form clear-input d-inline-block col-lg-6 ppn" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="text" name="output_mpp" id="output-mpp"class="custom-form clear-input d-inline-block col-lg-6" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="text" name="blance_cairan_mpp" id="blance-cairan-mpp"class="custom-form clear-input d-inline-block col-lg-6" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                        <td class="center"><input type="text" name="perawat_mpp" id="perawat-mpp"class="select2c-input ml-2"></td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <button type="button" title="Tambah Monitoring" class="btn btn-info" onclick="tambahMonitoringPasien2()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Monitoring</button>
                        </td>
                    </tr>
                </tbody>
            </table>`;              
        html += tutupRapet();
        $('#buka-tutup-mpp').append(html);
        
        $('.ppm').on('keyup', function() {
            let sum = 0
            $('.ppm').each(function() {
                sum += Number($(this).val());
            });
            $('#input-mpp').val(sum);
        })

        $('.ppmm').on('keyup', function() {
            let sum = 0
            $('.ppmm').each(function() {
                sum += Number($(this).val());
            });
            $('#input-mpp-edit').val(sum);
        })
        
        $('.ppn').on('keyup', function() {
            let sum = 0
            $('.ppn').each(function() {
                sum += Number($(this).val());
            });
            $('#output-mpp').val(sum);
        })

        $('.ppnn').on('keyup', function() {
            let sum = 0
            $('.ppnn').each(function() {
                sum += Number($(this).val());
            });
            $('#output-mpp-edit').val(sum);
        })     

        // PENGURANGAN DARI HASIL INPUT & OUTPUT = BALENCE  
        $('.ppm, .ppn').on('keyup', function() {
            let ppmSum = 0;
            $('.ppm').each(function() {
                ppmSum += Number($(this).val());
            });
            $('#input-mpp').val(ppmSum);

            let ppnSum = 0;
            $('.ppn').each(function() {
                ppnSum += Number($(this).val());
            });
            $('#output-mpp').val(ppnSum);

            let result = ppmSum - ppnSum;
            $('#blance-cairan-mpp').val(result);
        });


        $('.ppmm, .ppnn').on('keyup', function() {
            let ppmmSum = 0;
            $('.ppmm').each(function() {
                ppmmSum += Number($(this).val());
            });
            $('#input-mpp-edit').val(ppmmSum);

            let ppnnSum = 0;
            $('.ppnn').each(function() {
                ppnnSum += Number($(this).val());
            });
            $('#output-mpp-edit').val(ppnnSum);

            let result = ppmmSum - ppnnSum;
            $('#blance-cairan-mpp-edit').val(result);
        });
    }

    function formatTanggalKhusus(waktu) {
        var el = waktu.split('-');
        var tahun = el[0];
        var bulan = el[1];
        var hari = el[2];
        return hari + '/' + bulan + '/' + tahun;
    }

    // MPP-C  
    function editMonitoringPasien2(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-monitoring-pasieen');
        $('#update-mpp').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_monitoring_pasien_2") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-mpp').empty();
                $('#id-monitoring-pasieen').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }

                let tgl_mpp_edit = formatTanggalKhusus(data.tgl_mpp);
                $('#tgl-mpp-edit').val(tgl_mpp_edit); 

                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-monitoring-pasieen').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateMonitoringPasien2(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-mpp').append(cttntndkn);
                $('#tdarah-mpp-edit').val(data.tdarah_mpp);
                $('#saturasi-mppp-edit').val(data.saturasi_mppp);
                $('#toksigen-mpp-edit').val(data.toksigen_mpp);
                $('#skesadaran-mpp-edit').val(data.skesadaran_mpp);
                $('#kategori-mpp-edit').val(data.kategori_mpp);
                $('#pengawasan-mpp-edit').val(data.pengawasan_mpp);
                $('#diit-mpp-edit').val(data.diit_mpp);
                $('#oral-mpp-edit').val(data.oral_mpp);
                $('#ngt-mpp-edit').val(data.ngt_mpp);
                $('#paranteral-mpp-edit').val(data.paranteral_mpp);
                $('#paranteral-mppp-edit').val(data.paranteral_mppp);
                $('#produk-mpp-edit').val(data.produk_mpp);
                $('#input-mpp-edit').val(data.input_mpp);
                $('#urin-mpp-edit').val(data.urin_mpp);
                $('#bab-mpp-edit').val(data.bab_mpp);
                $('#gastrik-mpp-edit').val(data.gastrik_mpp);
                $('#wsd-mpp-edit').val(data.wsd_mpp);
                $('#iwl-mpp-edit').val(data.iwl_mpp);
                $('#output-mpp-edit').val(data.output_mpp);
                $('#blance-cairan-mpp-edit').val(data.blance_cairan_mpp);
                // $('#tgl-mpp-edit').val(data.tgl_mpp);
                $('#jam-mpp-edit').val(data.jam_mpp);
                $('#s2id_perawat-mpp-edit a .select2c-chosen').html(data.nama_perawat);
                $('#perawat-mpp-edit').val(data.perawat_mpp);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // MPP-C 
    function showMonitoringPasien2A(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-mpp .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp =
                    '<td align="center"><button type="button" class="btn btn-secondary btn-xs"onclick="editMonitoringPasien2(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit" ></i> </button> <button type="button" class="btn btn-secondary btn-xs"onclick="hapusMonitoringPasien2($(this),' + v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';                               
                let html = /* html */ `                 
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">` + ((v.tgl_mpp !== null) ? formatTanggalKhusus(v.tgl_mpp) : '') + `</td>
                        <td align="center">${v.jam_mpp || '-'}</td>                       
                        <td align="center">${v.nama_perawat || '-'}</td>                            
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                    </tr>                   
                `;               
                $('#tabel-mpp .body-table').append(html);
                numberMpp = i;
            })
        }
    }

    // MPP-C
    function updateMonitoringPasien2(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_monitoring_pasien_2") ?>',
            data: $('#form-edit-monitoring-pasieen').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    $('#wizard_form_resume').bwizard('show', '15');
                    entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-monitoring-pasieen').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }
    
    // MPP-C
    if (typeof numberMpp === 'undefined') {
        var numberMpp = 1;
    }

    function tambahMonitoringPasien2() {

        if ($('#tgl-mpp').val() === '') {
            syams_validation('#tgl-mpp', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tgl-mpp');
        }

        if ($('#jam-mpp').val() === '') {
            syams_validation('#jam-mpp', 'Jam harus diisi.');
            return false;
        } else {
            syams_validation_remove('#jam-mpp');
        }

        if ($('#perawat-mpp').val() === '') {
            syams_validation('#perawat-mpp', 'Nama Perawat harus diisi.');
            return false;
        } else {
            syams_validation_remove('#perawat-mpp');
        }

        let html = '';
        let tdarah_mpp = $('#tdarah-mpp').val();
        let saturasi_mppp = $('#saturasi-mppp').val();
        let toksigen_mpp = $('#toksigen-mpp').val();
        let skesadaran_mpp = $('#skesadaran-mpp').val();
        let kategori_mpp = $('#kategori-mpp').val();
        let pengawasan_mpp = $('#pengawasan-mpp').val();
        let diit_mpp = $('#diit-mpp').val();
        let oral_mpp = $('#oral-mpp').val();
        let ngt_mpp = $('#ngt-mpp').val();
        let paranteral_mpp = $('#paranteral-mpp').val();
        let paranteral_mppp = $('#paranteral-mppp').val();
        let produk_mpp = $('#produk-mpp').val();
        let input_mpp = $('#input-mpp').val();
        let urin_mpp = $('#urin-mpp').val();
        let bab_mpp = $('#bab-mpp').val();
        let gastrik_mpp = $('#gastrik-mpp').val();
        let wsd_mpp = $('#wsd-mpp').val();
        let iwl_mpp = $('#iwl-mpp').val();
        let output_mpp = $('#output-mpp').val();
        let blance_cairan_mpp = $('#blance-cairan-mpp').val();
        let tgl_mpp = $('#tgl-mpp').val(); 
        let jam_mpp = $('#jam-mpp').val();       
        let nama_perawat = $('#s2id_perawat-mpp a .select2c-chosen').html();
        let perawat_mpp = $('#perawat-mpp').val();
        // console.log(perawat_mpp);
        html = /* html */ `
             <tr class="row-in-${++numberMpp}">
                <td class="number-pengkajian" align="center">${numberMpp++}</td>
                <td align="center">
                    <input type="hidden" name="tgl_mpp[]" value="${tgl_mpp}">${tgl_mpp}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_mpp[]" value="${jam_mpp}">${jam_mpp}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_mpp[]" value="${perawat_mpp}">${nama_perawat}
                </td>               
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pencegahan_date_mpp[]" value="<?= date("Y-m-d H:i:s") ?>"> 
                    <input type="hidden" name="tdarah_mpp[]" value="${tdarah_mpp}">                                  
                    <input type="hidden" name="saturasi_mppp[]" value="${saturasi_mppp}">                                  
                    <input type="hidden" name="toksigen_mpp[]" value="${toksigen_mpp}">                                  
                    <input type="hidden" name="skesadaran_mpp[]" value="${skesadaran_mpp}">                                  
                    <input type="hidden" name="kategori_mpp[]" value="${kategori_mpp}">                                  
                    <input type="hidden" name="pengawasan_mpp[]" value="${pengawasan_mpp}">                                  
                    <input type="hidden" name="diit_mpp[]" value="${diit_mpp}">                                  
                    <input type="hidden" name="oral_mpp[]" value="${oral_mpp}">                                  
                    <input type="hidden" name="ngt_mpp[]" value="${ngt_mpp}">                                  
                    <input type="hidden" name="paranteral_mpp[]" value="${paranteral_mpp}">                                  
                    <input type="hidden" name="paranteral_mppp[]" value="${paranteral_mppp}">                                  
                    <input type="hidden" name="produk_mpp[]" value="${produk_mpp}">                                  
                    <input type="hidden" name="input_mpp[]" value="${input_mpp}">                                  
                    <input type="hidden" name="urin_mpp[]" value="${urin_mpp}">                                  
                    <input type="hidden" name="bab_mpp[]" value="${bab_mpp}">                                  
                    <input type="hidden" name="gastrik_mpp[]" value="${gastrik_mpp}">                                  
                    <input type="hidden" name="wsd_mpp[]" value="${wsd_mpp}">                                  
                    <input type="hidden" name="iwl_mpp[]" value="${iwl_mpp}">                                  
                    <input type="hidden" name="output_mpp[]" value="${output_mpp}">                                  
                    <input type="hidden" name="blance_cairan_mpp[]" value="${blance_cairan_mpp}">                                                                                    
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-mpp .body-table').append(html);
    }

    // MPP-C
    function hapusMonitoringPasien2(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {}
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/monitoring_pasien_2") ?>/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    // Hapus elemen yang hanya dipilih
                                    obj.closest('tr').remove();
                                } else {
                                    customAlert('Hapus Monitoring Pasien', data.message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    // SKALA EARLY WARNING NEWS AWAL MONITORING PASIEN
    function hitungSkalaEarlyNewsMp() {
        var total = 0;
        for (let i = 1; i <= 8; i++) {
            var sub_total = 0
            for (let j = 1; j <= 8; j++) {
                var value = 0;
                if ($('#mpnews-' + i + '-' + j).is(':checked')) {
                    var getNilai = $('#mpnews-' + i + '-' + j).val()
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
            $('#total-mpnews-1').prop('checked', true)
        } else if (total >= 1 && total <= 4) {
            $('#total-mpnews-2').prop('checked', true)
        } else if (total >= 5 && total <= 6) {
            $('#total-mpnews-3').prop('checked', true)
        } else if (total >= 7) {
            $('#total-mpnews-4').prop('checked', true)
        }
    }
    // SKALA EARLY WARNING NEWS AAKHR

    // SKALA EARLY WARNING MEOWS AWAL MONITORING PASIEN
    function hitungSkalaEarlyMeowsMp() {
        var total = 0;
        // looping vertical
        for (let i = 1; i <= 11; i++) {
            // looping horizontal
            var sub_total = 0
            for (let j = 1; j <= 11; j++) {
                var value = 0;
                if ($('#mpmeows-' + i + '-' + j).is(':checked')) {
                    var getNilai = $('#mpmeows-' + i + '-' + j).val()
                    value = getNilai.split('-', 1)
                    if (value[0] === 'bk') {
                        value = 8;
                    }
                }

                sub_total = sub_total + parseInt(value)
            }

            total = total + parseInt(sub_total)
        }

        if (total == 0) {
            $('#total-mpmeows-1').prop('checked', true)
        } else if (total >= 1 && total <= 4) {
            $('#total-mpmeows-2').prop('checked', true)
        } else if (total >= 5 && total <= 6) {
            $('#total-mpmeows-3').prop('checked', true)
        } else if (total >= 7) {
            $('#total-mpmeows-4').prop('checked', true)
        }
    }
    // SKALA EARLY WARNING MEOWS AAKHR MONITORING PASIEN

    // SKALA PEWS ANAK MONITORING PASIEN
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

</script>