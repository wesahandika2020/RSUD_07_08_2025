<!-- // PADOKB  -->
<script>
   
    $('#dokter-op-padoa, #dokter-an-padoa')
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

    function lihatFORM_KEP_58_00(data) {
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
        entriPemakaianAlkesObatAnestesi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_58_00(data) {
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
        entriPemakaianAlkesObatAnestesi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_58_00(data) {
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
        entriPemakaianAlkesObatAnestesi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriPemakaianAlkesObatAnestesi(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        // $('#modal_padoa').modal('show');        
        
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
            url: '<?= base_url("order_operasi/api/order_operasi/get_data_pemakaian_alkes_dan_obat_anestesi") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetFormPemakaianAlkesDanObatAnestesi(); 
                $('#id-layanan-pendaftaran-padoa').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-padoa').val(id_pendaftaran);

                if (data.pasien !== null) {
                    $('#id-pasien-padoa').val(data.pasien.id_pasien);
                    $('#nama-pasien-padoa').text(data.pasien.nama);
                    $('#no-padoa').text(data.pasien.no_rm);
                    $('#tanggal-lahir-padoa').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-padoa').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                $('#tindakan-padoa').val(data.tindakan_operasi.tindakan_padoa); 


                let pemakaian_alkes_dan_obat_anestesi = data.pemakaian_alkes_dan_obat_anestesi;
                if (pemakaian_alkes_dan_obat_anestesi !== null) {
                    $('#id-padoa').val(pemakaian_alkes_dan_obat_anestesi.id);
                    $('#tanggal-padoa').val(data.pemakaian_alkes_dan_obat_anestesi.tanggal_padoa);
                    $('#dokter-op-padoa').val(data.pemakaian_alkes_dan_obat_anestesi.dokter_op_padoa);
                    $('#s2id_dokter-op-padoa a .select2c-chosen').html(data.pemakaian_alkes_dan_obat_anestesi.nama_dokter_operator);
                    $('#dokter-an-padoa').val(data.pemakaian_alkes_dan_obat_anestesi.dokter_an_padoa);
                    $('#s2id_dokter-an-padoa a .select2c-chosen').html(data.pemakaian_alkes_dan_obat_anestesi.nama_dokter_anestesi);

                    $('#jumlahQ-1').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_1);
                    $('#jumlahQ-2').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_2);
                    $('#jumlahQ-3').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_3);
                    $('#jumlahQ-4').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_4);
                    $('#jumlahQ-5').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_5);
                    $('#jumlahQ-6').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_6);
                    $('#jumlahQ-7').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_7);
                    $('#jumlahQ-8').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_8);
                    $('#jumlahQ-9').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_9);
                    $('#jumlahQ-10').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_10);

                    $('#jumlahQ-11').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_11);
                    $('#jumlahQ-12').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_12);
                    $('#jumlahQ-13').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_13);
                    $('#jumlahQ-14').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_14);
                    $('#jumlahQ-15').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_15);
                    $('#jumlahQ-16').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_16);
                    $('#jumlahQ-17').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_17);
                    $('#jumlahQ-18').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_18);
                    $('#jumlahQ-19').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_19);
                    $('#jumlahQ-20').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_20);

                    $('#jumlahQ-21').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_21);
                    $('#jumlahQ-22').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_22);
                    $('#jumlahQ-23').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_23);
                    $('#jumlahQ-24').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_24);
                    $('#jumlahQ-25').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_25);
                    $('#jumlahQ-26').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_26);
                    $('#jumlahQ-27').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_27);
                    $('#jumlahQ-28').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_28);
                    $('#jumlahQ-29').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_29);
                    $('#jumlahQ-30').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_30);

                    $('#jumlahQ-31').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_31);
                    $('#jumlahQ-32').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_32);
                    $('#jumlahQ-33').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_33);
                    $('#jumlahQ-34').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_34);
                    $('#jumlahQ-35').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_35);
                    $('#jumlahQ-36').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_36);
                    $('#jumlahQ-37').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_37);
                    $('#jumlahQ-38').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_38);
                    $('#jumlahQ-39').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_39);
                    $('#jumlahQ-40').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_40);

                    $('#jumlahQ-41').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_41);
                    $('#jumlahQ-42').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_42);
                    $('#jumlahQ-43').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_43);
                    $('#jumlahQ-44').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_44);
                    $('#jumlahQ-45').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_45);
                    $('#jumlahQ-46').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_46);
                    $('#jumlahQ-47').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_47);
                    $('#jumlahQ-48').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_48);
                    $('#jumlahQ-49').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_49);
                    $('#jumlahQ-50').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_50);

                    $('#jumlahQ-51').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_51);
                    $('#jumlahQ-52').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_52);
                    $('#jumlahQ-53').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_53);
                    $('#jumlahQ-54').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_54);
                    $('#jumlahQ-55').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_55);
                    $('#jumlahQ-56').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_56);
                    $('#jumlahQ-57').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_57);
                    $('#jumlahQ-58').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_58);
                    $('#jumlahQ-59').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_59);
                    $('#jumlahQ-60').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_60);

                    $('#jumlahQ-61').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_61);
                    $('#jumlahQ-62').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_62);
                    $('#jumlahQ-63').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_63);
                    $('#jumlahQ-64').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_64);
                    $('#jumlahQ-65').val(data.pemakaian_alkes_dan_obat_anestesi.jumlahQ_65);

                    if (pemakaian_alkes_dan_obat_anestesi.fentanyl == '1') { $('#fentanyl').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.mo == '1') { $('#mo').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.pethidine == '1') { $('#pethidine').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.b02 == '1') { $('#b02').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.n20 == '1') { $('#n20').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.air == '1') { $('#air').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.ett_no == '1') { $('#ett-no').prop('checked', true); }
                    $('#ett-noT').val(data.pemakaian_alkes_dan_obat_anestesi.ett_noT);



                    if (pemakaian_alkes_dan_obat_anestesi.ephedrine == '1') { $('#ephedrine').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.iv_line == '1') { $('#iv-line').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.ett_nkk_no == '1') { $('#ett-nkk-no').prop('checked', true); }
                    $('#ett-nkk-noT').val(data.pemakaian_alkes_dan_obat_anestesi.ett_nkk_noT);


                    if (pemakaian_alkes_dan_obat_anestesi.ephineprine == '1') { $('#ephineprine').prop('checked', true); } 
                    if (pemakaian_alkes_dan_obat_anestesi.tegaderm_no == '1') { $('#tegaderm-no').prop('checked', true); }
                    $('#tegaderm-noA').val(data.pemakaian_alkes_dan_obat_anestesi.tegaderm_noA);
                    if (pemakaian_alkes_dan_obat_anestesi.lma_no == '1') { $('#lma-no').prop('checked', true); }
                    $('#lma-noY').val(data.pemakaian_alkes_dan_obat_anestesi.lma_noY);


                    if (pemakaian_alkes_dan_obat_anestesi.adona == '1') { $('#adona').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.kalnex == '1') { $('#kalnex').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.vitk == '1') { $('#vitk').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.dicinon == '1') { $('#dicinon').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.trheeway == '1') { $('#trheeway').prop('checked', true); }
                    $('#trheewayA').val(data.pemakaian_alkes_dan_obat_anestesi.trheewayA);
                    if (pemakaian_alkes_dan_obat_anestesi.guedel == '1') { $('#guedel').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.npa_no == '1') { $('#npa-no').prop('checked', true); }
                    $('#guedelG').val(data.pemakaian_alkes_dan_obat_anestesi.guedelG);


                    if (pemakaian_alkes_dan_obat_anestesi.invomit == '1') { $('#invomit').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.granon == '1') { $('#granon').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.alkhohol_swab == '1') { $('#alkhohol-swab').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.bacteri_filter == '1') { $('#bacteri-filter').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.gastridine == '1') { $('#gastridine').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.infus_set == '1') { $('#infus-set').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.blood_set == '1') { $('#blood-set').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.brething_circuit == '1') { $('#brething-circuit').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.sa == '1') { $('#sa').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.prostigmine == '1') { $('#prostigmine').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.nasal_02 == '1') { $('#nasal-02').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.broadced == '1') { $('#broadced').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.ceftriaxone == '1') { $('#ceftriaxone').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.darmicum == '1') { $('#darmicum').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.sedacum == '1') { $('#sedacum').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.simple_mask == '1') { $('#simple-mask').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.flagyl_drip == '1') { $('#flagyl-drip').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.marcain_heavy == '1') { $('#marcain-heavy').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.buvanes == '1') { $('#buvanes').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.decain == '1') { $('#decain').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.nrm == '1') { $('#nrm').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.rm == '1') { $('#rm').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.texegram == '1') { $('#texegram').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.propofol == '1') { $('#propofol').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.recofol == '1') { $('#recofol').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.proanes == '1') { $('#proanes').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.elektroda_adult == '1') { $('#elektroda-adult').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.ped == '1') { $('#ped').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.catapres == '1') { $('#catapres').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.hansaplast == '1') { $('#hansaplast').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.ketrobat_30mg == '1') { $('#ketrobat-30mg').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.spinocant == '1') { $('#spinocant').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.no_24 == '1') { $('#no-24').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.no_27 == '1') { $('#no-27').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.orasic_100mg == '1') { $('#orasic-100mg').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.pencan_no_27 == '1') { $('#pencan-no-27').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.farmodal == '1') { $('#farmodal').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.glofusal == '1') { $('#glofusal').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.glofusin == '1') { $('#glofusin').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.dynastat == '1') { $('#dynastat').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.ring_as == '1') { $('#ring-as').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.rlH == '1') { $('#rlH').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.d5 == '1') { $('#d5').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.rd == '1') { $('#rd').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.profenid == '1') { $('#profenid').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.tramal_supp == '1') { $('#tramal-supp').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.nacl_25 == '1') { $('#nacl-25').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.t100 == '1') { $('#t100').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.t500 == '1') { $('#t500').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.paracetamol_supp_125mg == '1') { $('#paracetamol-supp-125mg').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.futrolit == '1') { $('#futrolit').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.manitol == '1') { $('#manitol').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.stesolid == '1') { $('#stesolid').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.S5c == '1') { $('#S5c').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.S10c == '1') { $('#S10c').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.heas == '1') { $('#heas').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.W130c == '1') { $('#W130c').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.W200c == '1') { $('#W200c').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.lasik == '1') { $('#lasik').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.tridex == '1') { $('#tridex').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.t27a == '1') { $('#t27a').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.t27b == '1') { $('#t27b').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.plain == '1') { $('#plain').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.reculax == '1') { $('#reculax').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.traoum == '1') { $('#traoum').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.ecron == '1') { $('#ecron').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.emla_salep == '1') { $('#emla-salep').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.kalmethason == '1') { $('#kalmethason').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.y4mg == '1') { $('#y4mg').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.y5mg == '1') { $('#y5mg').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.chatheter_tip_50cc == '1') { $('#chatheter-tip-50cc').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.syntonicon == '1') { $('#syntonicon').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.methergine == '1') { $('#methergine').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.extensiontube == '1') { $('#extensiontube').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.citotex == '1') { $('#citotex').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.gastrul == '1') { $('#gastrul').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.xylocainjlly == '1') { $('#xylocainjlly').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.alinaminf == '1') { $('#alinaminf').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.ngt_no == '1') { $('#ngt-no').prop('checked', true); }
                    $('#ngt-noX').val(data.pemakaian_alkes_dan_obat_anestesi.ngt_noX);

                    if (pemakaian_alkes_dan_obat_anestesi.dopamin == '1') { $('#dopamin').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.vascon == '1') { $('#vascon').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.cathurine == '1') { $('#cathurine').prop('checked', true); }
                    $('#cathurineNO').val(data.pemakaian_alkes_dan_obat_anestesi.cathurineNO);

                    if (pemakaian_alkes_dan_obat_anestesi.nakoba == '1') { $('#nakoba').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.urinebag == '1') { $('#urinebag').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.aminophillin == '1') { $('#aminophillin').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.selangsuccen == '1') { $('#selangsuccen').prop('checked', true); }

                    if (pemakaian_alkes_dan_obat_anestesi.sevo == '1') { $('#sevo').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.isoflurane == '1') { $('#isoflurane').prop('checked', true); }
                    if (pemakaian_alkes_dan_obat_anestesi.cathetersuction == '1') { $('#cathetersuction').prop('checked', true); }
                    $('#cathetersuctionA').val(data.pemakaian_alkes_dan_obat_anestesi.cathetersuctionA);
                }
                $('#modal_padoa').modal('show');        
            },

            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })

    }

    function resetFormPemakaianAlkesDanObatAnestesi() {
        $('#form_entri_operasi_padoa')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
    }


    function konfirmasiSimpanPemakaianAlkesDanObatAnastesi() {
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
                simpanPemakaianAlkesDanObatAnastesi();
            }
        })
    }
 
    function simpanPemakaianAlkesDanObatAnastesi() {
        var id_layanan_pendaftaran_padoa = $('#id-layanan-pendaftaran-padoa').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/order_operasi/simpan_pemakaian_alkes_dan_obat_anestesi") ?>',
            data: $('#form_entri_operasi_padoa').serialize() + '&id-layanan-pendaftaran-padoa=' + id_layanan_pendaftaran_padoa,

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
                        
                        $('#modal_padoa').modal('hide');
                        showListForm($('#id-pendaftaran-padoa').val(), $('#id-layanan-pendaftaran-padoa').val(), $('#id-pasien-padoa').val());
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