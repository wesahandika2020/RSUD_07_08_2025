<!-- // PADOKB  -->
<script>
   
    $('#dokter-op-padokb, #dokter-an-padokb')
    .select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term,
                page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page, // page number
                    jenis: 18,
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
    
    function lihatFORM_KEP_60_00(data) {
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
        entriPemakaianAlkesObatKamarBedah(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_60_00(data) {
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
        entriPemakaianAlkesObatKamarBedah(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_60_00(data) {
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
        entriPemakaianAlkesObatKamarBedah(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriPemakaianAlkesObatKamarBedah(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        // $('#modal_padokb').modal('show');        
        
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
            url: '<?= base_url("order_operasi/api/order_operasi/get_data_pemakaian_alkes_dan_obat_kamar_bedah") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                console.log(data);
                resetFormPemakaianAlkesDanObatKamarBedah(); 
                $('#id-layanan-pendaftaran-padokb').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-padokb').val(id_pendaftaran);

                if (data.pasien !== null) {
                    $('#id-pasien-padokb').val(data.pasien.id_pasien);
                    $('#nama-pasien-padokb').text(data.pasien.nama);
                    $('#no-padokb').text(data.pasien.no_rm);
                    $('#tanggal-lahir-padokb').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-padokb').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                $('#tindakan-padokb').val(data.tindakan_operasi.tindakan_padokb); 

                let pemakaian_alkes_dan_obat_kamar_bedah = data.pemakaian_alkes_dan_obat_kamar_bedah;
                if (pemakaian_alkes_dan_obat_kamar_bedah !== null) {
                    $('#id-padokb').val(pemakaian_alkes_dan_obat_kamar_bedah.id);
                    $('#tanggal-padokb').val(data.pemakaian_alkes_dan_obat_kamar_bedah.tanggal_padokb);
                    $('#dokter-op-padokb').val(data.pemakaian_alkes_dan_obat_kamar_bedah.dokter_op_padokb);
                    $('#s2id_dokter-op-padokb a .select2c-chosen').html(data.pemakaian_alkes_dan_obat_kamar_bedah.nama_dokter_operator);
                    $('#dokter-an-padokb').val(data.pemakaian_alkes_dan_obat_kamar_bedah.dokter_an_padokb);
                    $('#s2id_dokter-an-padokb a .select2c-chosen').html(data.pemakaian_alkes_dan_obat_kamar_bedah.nama_dokter_anestesi);

                    if (pemakaian_alkes_dan_obat_kamar_bedah.gamemex_1 == '1') { $('#gamemex-1').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.gamemex_2 == '1') { $('#gamemex-2').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.gamemex_3 == '1') { $('#gamemex-3').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.gamemex_4 == '1') { $('#gamemex-4').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.gamemex_5 == '1') { $('#gamemex-5').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.gamemex_6 == '1') { $('#gamemex-6').prop('checked', true); }

                    $('#jumlah-1').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_1);
                    $('#jumlah-2').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_2);
                    $('#jumlah-3').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_3);
                    $('#jumlah-4').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_4);
                    $('#jumlah-5').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_5);
                    $('#jumlah-6').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_6);
                    $('#jumlah-7').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_7);
                    $('#jumlah-8').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_8);
                    $('#jumlah-9').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_9);
                    $('#jumlah-10').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_10);

                    $('#jumlah-11').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_11);
                    $('#jumlah-12').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_12);
                    $('#jumlah-13').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_13);
                    $('#jumlah-14').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_14);
                    $('#jumlah-15').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_15);
                    $('#jumlah-16').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_16);
                    $('#jumlah-17').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_17);
                    $('#jumlah-18').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_18);
                    $('#jumlah-19').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_19);
                    $('#jumlah-20').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_20);

                    $('#jumlah-21').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_21);
                    $('#jumlah-22').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_22);
                    $('#jumlah-23').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_23);
                    $('#jumlah-24').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_24);
                    $('#jumlah-25').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_25);
                    $('#jumlah-26').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_26);
                    $('#jumlah-27').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_27);
                    $('#jumlah-28').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_28);
                    $('#jumlah-29').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_29);
                    $('#jumlah-30').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_30);

                    $('#jumlah-31').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_31);
                    $('#jumlah-32').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_32);
                    $('#jumlah-33').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_33);
                    $('#jumlah-34').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_34);
                    $('#jumlah-35').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_35);
                    $('#jumlah-36').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_36);
                    $('#jumlah-37').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_37);
                    $('#jumlah-38').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_38);
                    $('#jumlah-39').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_39);
                    $('#jumlah-40').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_40);

                    $('#jumlah-41').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_41);
                    $('#jumlah-42').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_42);
                    $('#jumlah-43').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_43);
                    $('#jumlah-44').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_44);
                    $('#jumlah-45').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_45);
                    $('#jumlah-46').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_46);
                    $('#jumlah-47').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_47);
                    $('#jumlah-48').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_48);
                    $('#jumlah-49').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_49);
                    $('#jumlah-50').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_50);

                    $('#jumlah-51').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_51);
                    $('#jumlah-52').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_52);
                    $('#jumlah-53').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_53);
                    $('#jumlah-54').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_54);
                    $('#jumlah-55').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_55);
                    $('#jumlah-56').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_56);
                    $('#jumlah-57').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_57);
                    $('#jumlah-58').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_58);
                    $('#jumlah-59').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_59);
                    $('#jumlah-60').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_60);

                    $('#jumlah-61').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_61);
                    $('#jumlah-62').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_62);
                    $('#jumlah-63').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_63);
                    $('#jumlah-64').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_64);
                    $('#jumlah-65').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_65);
                    $('#jumlah-66').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_66);
                    $('#jumlah-67').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_67);
                    $('#jumlah-68').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_68);
                    $('#jumlah-69').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_69);
                    $('#jumlah-70').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_70);

                    $('#jumlah-71').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_71);
                    $('#jumlah-72').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_72);
                    $('#jumlah-73').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_73);
                    $('#jumlah-74').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_74);
                    $('#jumlah-75').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_75);
                    $('#jumlah-76').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_76);
                    $('#jumlah-77').val(data.pemakaian_alkes_dan_obat_kamar_bedah.jumlah_77);


                    if (pemakaian_alkes_dan_obat_kamar_bedah.pembalut_wanita == '1') { $('#pembalut-wanita').prop('checked', true); }
                    $('#pembalut').val(data.pemakaian_alkes_dan_obat_kamar_bedah.pembalut);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.hogi_gowm == '1') { $('#hogi-gowm').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.profeel_1 == '1') { $('#profeel-1').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.profeel_2 == '1') { $('#profeel-2').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.profeel_3 == '1') { $('#profeel-3').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.profeel_4 == '1') { $('#profeel-4').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.profeel_5 == '1') { $('#profeel-5').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.profeel_6 == '1') { $('#profeel-6').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.masker_goggle == '1') { $('#masker-goggle').prop('checked', true); }
                    $('#masker').val(data.pemakaian_alkes_dan_obat_kamar_bedah.masker);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.scrub == '1') { $('#scrub').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.profeel_lp_1 == '1') { $('#profeel-lp-1').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.profeel_lp_2 == '1') { $('#profeel-lp-2').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.profeel_lp_3 == '1') { $('#profeel-lp-3').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.tegaderm == '1') { $('#tegaderm').prop('checked', true); }
                    $('#tegadermP').val(data.pemakaian_alkes_dan_obat_kamar_bedah.tegadermP);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.face_mask == '1') { $('#face-mask').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.transofik == '1') { $('#transofik').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.paper_green == '1') { $('#paper-green').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.masker_kaca == '1') { $('#masker-kaca').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.bethadine == '1') { $('#bethadine').prop('checked', true); }
                    $('#bethadine-cc').val(data.pemakaian_alkes_dan_obat_kamar_bedah.bethadine_cc);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.formalin == '1') { $('#formalin').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.surgical_hat == '1') { $('#surgical-hat').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.alkohol == '1') { $('#alkohol').prop('checked', true); }
                    $('#alkohol-cc').val(data.pemakaian_alkes_dan_obat_kamar_bedah.alkohol_cc);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.aquabidest_1000 == '1') { $('#aquabidest-1000').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.sensi_glove == '1') { $('#sensi-glove').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.needle == '1') { $('#needle').prop('checked', true); }
                    $('#needle-no').val(data.pemakaian_alkes_dan_obat_kamar_bedah.needle_no);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.alkazym == '1') { $('#alkazym').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.xylocine_gel == '1') { $('#xylocine-gel').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.instillagel == '1') { $('#instillagel').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.netral_plate == '1') { $('#netral-plate').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.hyprafix == '1') { $('#hyprafix').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.urograd == '1') { $('#urograd').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.bactigras == '1') { $('#bactigras').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.supratule == '1') { $('#supratule').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.daryantule == '1') { $('#daryantule').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.baraovac == '1') { $('#baraovac').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.ps == '1') { $('#ps').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.pp == '1') { $('#pp').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.disk == '1') { $('#disk').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.mersilk == '1') { $('#mersilk').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.urine_bag == '1') { $('#urine-bag').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.h202 == '1') { $('#h202').prop('checked', true); }
            
                    if (pemakaian_alkes_dan_obat_kamar_bedah.polisorb == '1') { $('#polisorb').prop('checked', true); }
                    $('#polisorbQ').val(data.pemakaian_alkes_dan_obat_kamar_bedah.polisorbQ);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.foley == '1') { $('#foley').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.bocal_pa == '1') { $('#bocal-pa').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.ultrasorb == '1') { $('#ultrasorb').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.ngt == '1') { $('#ngt').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.rl == '1') { $('#rl').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.suprasob == '1') { $('#suprasob').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.syringe == '1') { $('#syringe').prop('checked', true); }
                    $('#syringeT').val(data.pemakaian_alkes_dan_obat_kamar_bedah.syringeT);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.surgiwear == '1') { $('#surgiwear').prop('checked', true); }
                   
                    if (pemakaian_alkes_dan_obat_kamar_bedah.suprasobV == '1') { $('#suprasobV').prop('checked', true); }
                    $('#suprasobE').val(data.pemakaian_alkes_dan_obat_kamar_bedah.suprasobE);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.catheter_tip == '1') { $('#catheter-tip').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.bone_wax == '1') { $('#bone-wax').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.chromic == '1') { $('#chromic').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.guardix_sol == '1') { $('#guardix-sol').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.microscop_drape == '1') { $('#microscop-drape').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.monosyn == '1') { $('#monosyn').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.gelita_spon == '1') { $('#gelita-spon').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.surgicel == '1') { $('#surgicel').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.vicryl == '1') { $('#vicryl').prop('checked', true); }
                    $('#vicrylU').val(data.pemakaian_alkes_dan_obat_kamar_bedah.vicrylU);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.wi == '1') { $('#wi').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.lina_pen == '1') { $('#lina-pen').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.palin_cutget == '1') { $('#palin-cutget').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.nacl == '1') { $('#nacl').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.external_drain == '1') { $('#external-drain').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.silkam == '1') { $('#silkam').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.polygyp == '1') { $('#polygyp').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.suction_conecting_tube == '1') { $('#suction-conecting-tube').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.premilen == '1') { $('#premilen').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.prolaine == '1') { $('#prolaine').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.surgipro == '1') { $('#surgipro').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.polyban == '1') { $('#polyban').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.bag_suction_disposible == '1') { $('#bag-suction-disposible').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.monocryl == '1') { $('#monocryl').prop('checked', true); }
                    $('#monocrylR').val(data.pemakaian_alkes_dan_obat_kamar_bedah.monocrylR);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.tensocrepe == '1') { $('#tensocrepe').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.medicrepe == '1') { $('#medicrepe').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.white_apron == '1') { $('#white-apron').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.pds == '1') { $('#pds').prop('checked', true); }
                    $('#pds2').val(data.pemakaian_alkes_dan_obat_kamar_bedah.pds2);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.conforming == '1') { $('#conforming').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.secureg == '1') { $('#secureg').prop('checked', true); }
                    $('#securegS').val(data.pemakaian_alkes_dan_obat_kamar_bedah.securegS);
                    if (pemakaian_alkes_dan_obat_kamar_bedah.microshield == '1') { $('#microshield').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.kasssax == '1') { $('#kasssax').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.betadine == '1') { $('#betadine').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.kasa_ray == '1') { $('#kasa-ray').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.fromaline == '1') { $('#fromaline').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.kkasa == '1') { $('#kkasa').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.cidex == '1') { $('#cidex').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.kasa_laparatomy == '1') { $('#kasa-laparatomy').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.prasept == '1') { $('#prasept').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_kamar_bedah.under_pad == '1') { $('#under-pad').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_kamar_bedah.suction_catheter == '1') { $('#suction-catheter').prop('checked', true); }
                }
                $('#modal_padokb').modal('show');        
            },

            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function resetFormPemakaianAlkesDanObatKamarBedah() {
        $('#form_entri_operasi_padokb')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
    }


    function konfirmasiSimpanPemakaianAlkesDanObatKamarBedah() {
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
                simpanPemakaianAlkesDanObatKamarBedah();
            }
        })
    }
 
    function simpanPemakaianAlkesDanObatKamarBedah() {
        var id_layanan_pendaftaran_padokb = $('#id-layanan-pendaftaran-padokb').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/order_operasi/simpan_pemakaian_alkes_dan_obat_kamar_bedah") ?>',
            data: $('#form_entri_operasi_padokb').serialize() + '&id-layanan-pendaftaran-padokb=' + id_layanan_pendaftaran_padokb,

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
                        
                        $('#modal_padokb').modal('hide');
                        showListForm($('#id-pendaftaran-padokb').val(), $('#id-layanan-pendaftaran-padokb').val(), $('#id-pasien-padokb').val());
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