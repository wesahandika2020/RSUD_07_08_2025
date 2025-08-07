<!-- // ICC -->

<style>
    .dokterdpjpicc[disabled] {
        height: 15px;
        font-size: 9px;
        padding: 2px 4px;
        width: auto;
        background-color: #f5f5f5;
        border: 1px solid #ccc;
    }
</style>

<script>  

    var nomer = 1;
    nomer++;

    // DOWN SCORE/EVALUASI GAWAT NAFAS
    $(function() {
        $('.calc_dsegn').change(function() {           
            var id = $(this).attr('id'); // Mendapatkan ID dari input radio yang diubah          
            var value = parseFloat($(this).val()); // Mendapatkan nilai dari input radio yang dipilih                
            var id_nilai;  // Menentukan ID input nilai berdasarkan ID elemen input radio
            if (id.startsWith('frekuensinafasicc')) {id_nilai = 'nilai-frekuensinafasicc';
                } else if (id.startsWith('retraksiicc')) {id_nilai = 'nilai-retraksiicc';
                } else if (id.startsWith('sianosisicc')) {id_nilai = 'nilai-sianosisicc';
                } else if (id.startsWith('airentriicc')) {id_nilai = 'nilai-airentriicc';
                } else if (id.startsWith('merintihicc')) {id_nilai = 'nilai-merintihicc';
            }                   
            $('#' + id_nilai).val(value); // Mengatur nilai input nilai sesuai dengan input radio yang dipilih       
            var total = 0; // Menghitung total nilai dari semua input nilai
            $('.sub_total_nilai_frekuensinafasicc, .sub_total_nilai_retraksiicc, .sub_total_nilai_sianosisicc, .sub_total_nilai_airentriicc, .sub_total_nilai_merintihicc').each(function() {
                var sub_total = $(this).val();
                // Jika sub_total kosong atau bukan angka, set nilai menjadi 0
                sub_total = sub_total ? parseFloat(sub_total) : 0;
                total += sub_total;
            });        
            $('#total-nilai-dsegn').val(total); // Mengatur nilai total ke dalam input total
        });      
    });

    // BRADEN RISK ASESSMENT SCALE
    $(function() {
        $('.calcT_bras').change(function() {
            var id = $(this).attr('id');
            var value = parseFloat($(this).val());
            var id_nilai;
            // Tentukan ID input yang sesuai berdasarkan checkbox yang diklik
            if (id.startsWith('totalyicc')) {
                id_nilai = 'nilai-totalyicc';
            } else if (id.startsWith('veryicc')) {
                id_nilai = 'nilai-veryicc';
            } else if (id.startsWith('slightly')) {
                id_nilai = 'nilai-slightly';
            } else if (id.startsWith('impairment')) {
                id_nilai = 'nilai-impairment';
            }
            var currentVal = parseFloat($('#' + id_nilai).val()) || 0; // Dapatkan nilai saat ini dari input
            // Tambahkan atau kurangi nilai berdasarkan status checkbox (checked atau unchecked)
            var newVal = $(this).is(':checked') ? currentVal + value : currentVal - value;
            $('#' + id_nilai).val(newVal);
            // Hitung total nilai keseluruhan
            var total = 0;
            $('.sub_total_nilai_totalyicc, .sub_total_nilai_veryicc, .sub_total_nilai_slightly, .sub_total_nilai_impairment').each(function() {
                var sub_total = $(this).val();
                sub_total = sub_total ? parseFloat(sub_total) : 0;
                total += sub_total;
            });
            $('#total-nilai-bras').val(total);
        });
    });

    // SOFA SCORE
    $(function() {
        $('.calc_sofascore').change(function() {           
            var id = $(this).attr('id'); // Mendapatkan ID dari input radio yang diubah          
            var value = parseFloat($(this).val()); // Mendapatkan nilai dari input radio yang dipilih                
            var id_nilai;  // Menentukan ID input nilai berdasarkan ID elemen input radio
            if (id.startsWith('respirationa')) {id_nilai = 'nilai-respirationa';
                } else if (id.startsWith('coagulation')) {id_nilai = 'nilai-coagulation';
                } else if (id.startsWith('bilirubin')) {id_nilai = 'nilai-bilirubin';
                } else if (id.startsWith('cardiovascular')) {id_nilai = 'nilai-cardiovascular';
                } else if (id.startsWith('cns')) {id_nilai = 'nilai-cns';
                } else if (id.startsWith('renalicc')) {id_nilai = 'nilai-renalicc';
            }                   
            $('#' + id_nilai).val(value); // Mengatur nilai input nilai sesuai dengan input radio yang dipilih       
            var total = 0; // Menghitung total nilai dari semua input nilai
            $('.sub_total_nilai_respirationa, .sub_total_nilai_coagulation, .sub_total_nilai_bilirubin, .sub_total_nilai_cardiovascular, .sub_total_nilai_cns, .sub_total_nilai_renalicc').each(function() {
                var sub_total = $(this).val();
                // Jika sub_total kosong atau bukan angka, set nilai menjadi 0
                sub_total = sub_total ? parseFloat(sub_total) : 0;
                total += sub_total;
            });        
            $('#total-nilai-ss').val(total); // Mengatur nilai total ke dalam input total
        });      
    });

    // TRS  
    function calcscoremata() {
        var score = 0;
        $("input[name='mataicc']:checked").each(function() {
            if ($(this).val() == '4') {
                score += parseInt(4);
            } else if ($(this).val() == '3') {
                score += parseInt(3);
            }
            else if ($(this).val() == '2') {
                score += parseInt(2);
            }           
            else if ($(this).val() == '1') {
                score += parseInt(1);
            }           
        });  

        $("input[name='motorikicc']:checked").each(function() {
            if ($(this).val() == '6') {
                score += parseInt(6);
            } else if ($(this).val() == '5') {
                score += parseInt(5);
            }
            else if ($(this).val() == '4') {
                score += parseInt(4);
            }           
            else if ($(this).val() == '3') {
                score += parseInt(3);
            }           
            else if ($(this).val() == '2') {
                score += parseInt(2);
            }           
            else if ($(this).val() == '1') {
                score += parseInt(1);
            }           
        });  

        $("input[name='verbalicc']:checked").each(function() {
            if ($(this).val() == '5') {
                score += parseInt(5);
            } else if ($(this).val() == '4') {
                score += parseInt(4);
            }
            else if ($(this).val() == '3') {
                score += parseInt(3);
            }           
            else if ($(this).val() == '2') {
                score += parseInt(2);
            }           
            else if ($(this).val() == '1') {
                score += parseInt(1);
            }                     
        });  

        $("input[name='jmlhtrs']").val(score);
    }


       
    // TRSP  
    // function calcscoretrsp() {
    //     var score = 0;
    //     $("input[name='spontanmicc']:checked").each(function() {
    //         if ($(this).val() == '4') {
    //             score += parseInt(4);
    //         } else if ($(this).val() == '3') {
    //             score += parseInt(3);
    //         }
    //         else if ($(this).val() == '2') {
    //             score += parseInt(2);
    //         }           
    //         else if ($(this).val() == '1') {
    //             score += parseInt(1);
    //         }           
    //     });  

    //     $("input[name='bercakapicc']:checked").each(function() {
    //         if ($(this).val() == '5') {
    //             score += parseInt(5);
    //         } else if ($(this).val() == '4') {
    //             score += parseInt(4);
    //         }
    //         else if ($(this).val() == '3') {
    //             score += parseInt(3);
    //         }           
    //         else if ($(this).val() == '2') {
    //             score += parseInt(2);
    //         }           
    //         else if ($(this).val() == '1') {
    //             score += parseInt(1);
    //         }                     
    //     });  

    //     $("input[name='terbaikicc']:checked").each(function() {
    //         if ($(this).val() == '6') {
    //             score += parseInt(6);
    //         } else if ($(this).val() == '5') {
    //             score += parseInt(5);
    //         }
    //         else if ($(this).val() == '4') {
    //             score += parseInt(4);
    //         }           
    //         else if ($(this).val() == '3') {
    //             score += parseInt(3);
    //         }           
    //         else if ($(this).val() == '2') {
    //             score += parseInt(2);
    //         }           
    //         else if ($(this).val() == '1') {
    //             score += parseInt(1);
    //         }           
    //     });  

    //     $("input[name='jmlhtrsp']").val(score);
    // }


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
        
    $('#btn-expand-all-icc').click(function() { $('.multi-collapse').addClass('show');});

    $('#btn-collapse-all-icc').click(function() { $('.multi-collapse').removeClass('show');});
    
    $("#wizard-icc").bwizard();

    // DOKTER
    // $('#dokterdpjpicc, #dokterdpjptambahicc, #dokterdpjptambahiccq, #dokterdpjptambahiccw')
    $('#dokterdpjptambahicc')
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

    function lihatFORM_KEP_28_02(data) {
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
        entriFormIcc(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function editFORM_KEP_28_02(data) {
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
        entriFormIcc(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function tambahFORM_KEP_28_02(data) {
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
        entriFormIcc(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }
  
    function entriFormIcc(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, action) {

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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_intensive_care_chart") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
                // console.log(data);
                resetFormICC(); 
                $('#id-layanan-pendaftaran-icc').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-icc').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-icc').val(data.pasien.id_pasien);
                    $('#nama-pasien-icc').text(data.pasien.nama);
                    $('#no-icc').text(data.pasien.no_rm);
                    $('#tanggal-lahir-icc').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-icc').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan')); 
                    $('#agama-icc').text(data.pasien.agama);
                    $('#alamat-icc').text(data.pasien.alamat);                      
                }

                $('#tglmasukicc').val(data.layanan.tanggal_layanan);                      

                
                if (data.intensive_care_chart !== null) {  

                    $('#btn_cetak_icc').show();  // Menampilkan tombol cetak
                    $('#btn_cetak_icc').on('click', function() {
                        konfirmasiCetakFormintensiveCareChart(id_pendaftaran, id_layanan_pendaftaran);  // Fungsi ini hanya dipanggil setelah tombol diklik
                    });


                    $('#id-icc').val(data.intensive_care_chart.id);

                    // $('#dokterdpjpicc').val(data.intensive_care_chart.dokterdpjpicc);
                    // $('#s2id_dokterdpjpicc a .select2c-chosen').html(data.intensive_care_chart.dokter_1); 

                    $('#dokterdpjptambahicc').val(data.intensive_care_chart.dokterdpjptambahicc);
                    $('#s2id_dokterdpjptambahicc a .select2c-chosen').html(data.intensive_care_chart.dokter_2);
                      
                    // $('#dokterdpjptambahiccq').val(data.intensive_care_chart.dokterdpjptambahiccq);
                    // $('#s2id_dokterdpjptambahiccq a .select2c-chosen').html(data.intensive_care_chart.dokter_3);  

                    // $('#dokterdpjptambahiccw').val(data.intensive_care_chart.dokterdpjptambahiccw);
                    // $('#s2id_dokterdpjptambahiccw a .select2c-chosen').html(data.intensive_care_chart.dokter_4);  

                    // $('#tglmasukicc').val(data.intensive_care_chart.tglmasukicc);
                    $('#tglicc').val(data.intensive_care_chart.tglicc);
                    $('#perawatanharike').val(data.intensive_care_chart.perawatanharike);
                    $('#bbicc').val(data.intensive_care_chart.bbicc);
                    $('#tbicc').val(data.intensive_care_chart.tbicc);
                    $('#goldarahrh').val(data.intensive_care_chart.goldarahrh);
                    $('#unitruangansebelumnya').val(data.intensive_care_chart.unitruangansebelumnya);
                    $('#sofascore').val(data.intensive_care_chart.sofascore);
                    $('#bradenscore').val(data.intensive_care_chart.bradenscore);
                    $('#downscore').val(data.intensive_care_chart.downscore);
            
                    const pesaniic = JSON.parse(data.intensive_care_chart.pesaniic); 
                    if (pesaniic.pesaniic_1 !== null) {$('#pesaniic-1').val(pesaniic.pesaniic_1);}
                    if (pesaniic.pesaniic_2 !== null) {$('#pesaniic-2').val(pesaniic.pesaniic_2);}
                    if (pesaniic.pesaniic_3 !== null) {$('#pesaniic-3').val(pesaniic.pesaniic_3);}


                    $('#diagnosisicc').val(data.intensive_care_chart.diagnosisicc);
                    $('#tanggaljoicc').val(data.intensive_care_chart.tanggaljoicc);
                    $('#jenisoperasiicc').val(data.intensive_care_chart.jenisoperasiicc);


                    if (data.intensive_care_chart.infusIicc !== null) { $('#infusIicc').prop('checked', true);}
                    $('#tanggalpemasangan1').val(data.intensive_care_chart.tanggalpemasangan1);
                    $('#posisi1').val(data.intensive_care_chart.posisi1);
                    $('#ukuran1').val(data.intensive_care_chart.ukuran1);
                    $('#tanggalpencabutan1').val(data.intensive_care_chart.tanggalpencabutan1);

                    if (data.intensive_care_chart.infusIIicc !== null) { $('#infusIIicc').prop('checked', true);}
                    $('#tanggalpemasangan2').val(data.intensive_care_chart.tanggalpemasangan2);
                    $('#posisi2').val(data.intensive_care_chart.posisi2);
                    $('#ukuran2').val(data.intensive_care_chart.ukuran2);
                    $('#tanggalpencabutan2').val(data.intensive_care_chart.tanggalpencabutan2);

                    if (data.intensive_care_chart.cvc !== null) { $('#cvc').prop('checked', true);}
                    if (data.intensive_care_chart.cdl !== null) { $('#cdl').prop('checked', true);}
                    if (data.intensive_care_chart.picc !== null) { $('#picc').prop('checked', true);}
                    $('#tanggalpemasangan3').val(data.intensive_care_chart.tanggalpemasangan3);
                    $('#posisi3').val(data.intensive_care_chart.posisi3);
                    $('#ukuran3').val(data.intensive_care_chart.ukuran3);
                    $('#tanggalpencabutan3').val(data.intensive_care_chart.tanggalpencabutan3);

                    if (data.intensive_care_chart.ett !== null) { $('#ett').prop('checked', true);}
                    if (data.intensive_care_chart.tracheostomy !== null) { $('#tracheostomy').prop('checked', true);}
                    $('#tanggalpemasangan4').val(data.intensive_care_chart.tanggalpemasangan4);
                    $('#posisi4').val(data.intensive_care_chart.posisi4);
                    $('#ukuran4').val(data.intensive_care_chart.ukuran4);
                    $('#tanggalpencabutan4').val(data.intensive_care_chart.tanggalpencabutan4);

                    if (data.intensive_care_chart.icp !== null) { $('#icp').prop('checked', true);}
                    if (data.intensive_care_chart.ext !== null) { $('#ext').prop('checked', true);}
                    if (data.intensive_care_chart.epi !== null) { $('#epi').prop('checked', true);}
                    // if (data.intensive_care_chart.drainage !== null) { $('#drainage').prop('checked', true);}
                    $('#tanggalpemasangan5').val(data.intensive_care_chart.tanggalpemasangan5);
                    $('#posisi5').val(data.intensive_care_chart.posisi5);
                    $('#ukuran5').val(data.intensive_care_chart.ukuran5);
                    $('#tanggalpencabutan5').val(data.intensive_care_chart.tanggalpencabutan5);

                    if (data.intensive_care_chart.cimino !== null) { $('#cimino').prop('checked', true);}
                    if (data.intensive_care_chart.avgraft !== null) { $('#avgraft').prop('checked', true);}
                    $('#tanggalpemasangan6').val(data.intensive_care_chart.tanggalpemasangan6);
                    $('#posisi6').val(data.intensive_care_chart.posisi6);
                    $('#ukuran6').val(data.intensive_care_chart.ukuran6);
                    $('#tanggalpencabutan6').val(data.intensive_care_chart.tanggalpencabutan6);

                    if (data.intensive_care_chart.ngticc !== null) { $('#ngticc').prop('checked', true);}
                    if (data.intensive_care_chart.ogticc !== null) { $('#ogticc').prop('checked', true);}
                    $('#tanggalpemasangan7').val(data.intensive_care_chart.tanggalpemasangan7);
                    $('#posisi7').val(data.intensive_care_chart.posisi7);
                    $('#ukuran7').val(data.intensive_care_chart.ukuran7);
                    $('#tanggalpencabutan7').val(data.intensive_care_chart.tanggalpencabutan7);

                    if (data.intensive_care_chart.urineekttr !== null) { $('#urineekttr').prop('checked', true);}
                    $('#tanggalpemasangan8').val(data.intensive_care_chart.tanggalpemasangan8);
                    $('#posisi8').val(data.intensive_care_chart.posisi8);
                    $('#ukuran8').val(data.intensive_care_chart.ukuran8);
                    $('#tanggalpencabutan8').val(data.intensive_care_chart.tanggalpencabutan8);

                    const textkosong = JSON.parse(data.intensive_care_chart.textkosong); 
                    if (textkosong.textkosong_1 !== null) {$('#textkosong-1').val(textkosong.textkosong_1);}
                    if (textkosong.textkosong_2 !== null) {$('#textkosong-2').val(textkosong.textkosong_2);}
                    if (textkosong.textkosong_3 !== null) {$('#textkosong-3').val(textkosong.textkosong_3);}

                    // const textkosong = JSON.parse(data.intensive_care_chart.textkosong);
                    // // Pastikan textkosong bukan null atau undefined
                    // if (textkosong && textkosong.textkosong_1 !== null) {$('#textkosong-1').val(textkosong.textkosong_1);}
                    // if (textkosong && textkosong.textkosong_2 !== null) {$('#textkosong-2').val(textkosong.textkosong_2);}
                    // if (textkosong && textkosong.textkosong_3 !== null) {$('#textkosong-3').val(textkosong.textkosong_3);}

                    $('#alergiicct').val(data.intensive_care_chart.alergiicct);
                    $('#antibiotikicc').val(data.intensive_care_chart.antibiotikicc);
                    $('#kulturicc').val(data.intensive_care_chart.kulturicc);


                    // const terapioralicc = JSON.parse(data.intensive_care_chart.terapioralicc); 
                    // if (terapioralicc1.terapioralicc1 !== null) {$('#terapioralicc1').val(terapioralicc1.terapioralicc1);}
                    // if (terapioralicc2.terapioralicc2 !== null) {$('#terapioralicc2').val(terapioralicc2.terapioralicc2);}
                    // if (terapioralicc3.terapioralicc3 !== null) {$('#terapioralicc3').val(terapioralicc3.terapioralicc3);}
                    // if (terapioralicc4.terapioralicc4 !== null) {$('#terapioralicc4').val(terapioralicc4.terapioralicc4);}
                    // if (terapioralicc5.terapioralicc5 !== null) {$('#terapioralicc5').val(terapioralicc5.terapioralicc5);}
                    // if (terapioralicc6.terapioralicc6 !== null) {$('#terapioralicc6').val(terapioralicc6.terapioralicc6);}
                    // if (terapioralicc7.terapioralicc7 !== null) {$('#terapioralicc7').val(terapioralicc7.terapioralicc7);}
                    // if (terapioralicc8.terapioralicc8 !== null) {$('#terapioralicc8').val(terapioralicc8.terapioralicc8);}
                    // if (terapioralicc9.terapioralicc9 !== null) {$('#terapioralicc9').val(terapioralicc9.terapioralicc9);}
                    // if (terapioralicc10.terapioralicc10 !== null) {$('#terapioralicc10').val(terapioralicc10.terapioralicc10);}
                    // if (terapioralicc11.terapioralicc11 !== null) {$('#terapioralicc11').val(terapioralicc11.terapioralicc11);}
                    // if (terapioralicc12.terapioralicc12 !== null) {$('#terapioralicc12').val(terapioralicc12.terapioralicc12);}
                    // if (terapioralicc13.terapioralicc13 !== null) {$('#terapioralicc13').val(terapioralicc13.terapioralicc13);}
                    // if (terapioralicc14.terapioralicc14 !== null) {$('#terapioralicc14').val(terapioralicc14.terapioralicc14);}
                    // if (terapioralicc15.terapioralicc15 !== null) {$('#terapioralicc15').val(terapioralicc15.terapioralicc15);}
                    // if (terapioralicc16.terapioralicc16 !== null) {$('#terapioralicc16').val(terapioralicc16.terapioralicc16);}
                    // if (terapioralicc17.terapioralicc17 !== null) {$('#terapioralicc17').val(terapioralicc17.terapioralicc17);}
                    // if (terapioralicc18.terapioralicc18 !== null) {$('#terapioralicc18').val(terapioralicc18.terapioralicc18);}
                    // if (terapioralicc19.terapioralicc19 !== null) {$('#terapioralicc19').val(terapioralicc19.terapioralicc19);}
                    // if (terapioralicc20.terapioralicc20 !== null) {$('#terapioralicc20').val(terapioralicc20.terapioralicc20);}
                    // if (terapioralicc21.terapioralicc21 !== null) {$('#terapioralicc21').val(terapioralicc21.terapioralicc21);}
                    // if (terapioralicc22.terapioralicc22 !== null) {$('#terapioralicc22').val(terapioralicc22.terapioralicc22);}
                    // if (terapioralicc23.terapioralicc23 !== null) {$('#terapioralicc23').val(terapioralicc23.terapioralicc23);}
                    // if (terapioralicc24.terapioralicc24 !== null) {$('#terapioralicc24').val(terapioralicc24.terapioralicc24);}
                    // if (terapioralicc25.terapioralicc25 !== null) {$('#terapioralicc25').val(terapioralicc25.terapioralicc25);}
                    // if (terapioralicc26.terapioralicc26 !== null) {$('#terapioralicc26').val(terapioralicc26.terapioralicc26);}
                    // if (terapioralicc27.terapioralicc27 !== null) {$('#terapioralicc27').val(terapioralicc27.terapioralicc27);}
                    // if (terapioralicc28.terapioralicc28 !== null) {$('#terapioralicc28').val(terapioralicc28.terapioralicc28);}
                    // if (terapioralicc29.terapioralicc29 !== null) {$('#terapioralicc29').val(terapioralicc29.terapioralicc29);}
                    // if (terapioralicc30.terapioralicc30 !== null) {$('#terapioralicc30').val(terapioralicc30.terapioralicc30);}
                    // if (terapioralicc31.terapioralicc31 !== null) {$('#terapioralicc31').val(terapioralicc31.terapioralicc31);}
                    // if (terapioralicc32.terapioralicc32 !== null) {$('#terapioralicc32').val(terapioralicc32.terapioralicc32);}
                    // if (terapioralicc33.terapioralicc33 !== null) {$('#terapioralicc33').val(terapioralicc33.terapioralicc33);}
                    // if (terapioralicc34.terapioralicc34 !== null) {$('#terapioralicc34').val(terapioralicc34.terapioralicc34);}
                    // if (terapioralicc35.terapioralicc35 !== null) {$('#terapioralicc35').val(terapioralicc35.terapioralicc35);}
                    // if (terapioralicc36.terapioralicc36 !== null) {$('#terapioralicc36').val(terapioralicc36.terapioralicc36);}
                    // if (terapioralicc37.terapioralicc37 !== null) {$('#terapioralicc37').val(terapioralicc37.terapioralicc37);}
                    // if (terapioralicc38.terapioralicc38 !== null) {$('#terapioralicc38').val(terapioralicc38.terapioralicc38);}
                    // if (terapioralicc39.terapioralicc39 !== null) {$('#terapioralicc39').val(terapioralicc39.terapioralicc39);}
                    // if (terapioralicc40.terapioralicc40 !== null) {$('#terapioralicc40').val(terapioralicc40.terapioralicc40);}
                    // if (terapioralicc41.terapioralicc41 !== null) {$('#terapioralicc41').val(terapioralicc41.terapioralicc41);}
                    // if (terapioralicc42.terapioralicc42 !== null) {$('#terapioralicc42').val(terapioralicc42.terapioralicc42);}
                    // if (terapioralicc43.terapioralicc43 !== null) {$('#terapioralicc43').val(terapioralicc43.terapioralicc43);}
                    // if (terapioralicc44.terapioralicc44 !== null) {$('#terapioralicc44').val(terapioralicc44.terapioralicc44);}
                    // if (terapioralicc45.terapioralicc45 !== null) {$('#terapioralicc45').val(terapioralicc45.terapioralicc45);}
                    // if (terapioralicc46.terapioralicc46 !== null) {$('#terapioralicc46').val(terapioralicc46.terapioralicc46);}
                    // if (terapioralicc47.terapioralicc47 !== null) {$('#terapioralicc47').val(terapioralicc47.terapioralicc47);}
                    // if (terapioralicc48.terapioralicc48 !== null) {$('#terapioralicc48').val(terapioralicc48.terapioralicc48);}
                    // if (terapioralicc49.terapioralicc49 !== null) {$('#terapioralicc49').val(terapioralicc49.terapioralicc49);}
                    // if (terapioralicc50.terapioralicc50 !== null) {$('#terapioralicc50').val(terapioralicc50.terapioralicc50);}


                    // ini blm kasih kondisi  JANGAN DI HAPUS
                    // const terapioralicc = JSON.parse(data.intensive_care_chart.terapioralicc); // Mengambil data JSON dari properti 'terapioralicc' dalam objek 'intensive_care_chart' dan mengubahnya menjadi objek JavaScript.
                    // for (let i = 1; i <= 50; i++) { // Memulai loop dari 1 hingga 50 untuk iterasi sebanyak 50 kali.
                    //     let key = `terapioralicc${i}`; // Membuat string dengan nama 'terapioralicc' yang diikuti oleh nilai 'i', misalnya 'terapioralicc1', 'terapioralicc2', dst.
                    //     if (terapioralicc[key] !== null) { // Memeriksa apakah nilai dari 'terapioralicc[key]' tidak null (artinya ada data yang tersimpan di properti tersebut).
                    //         $(`#${key}`).val(terapioralicc[key]); // Jika tidak null, mengisi nilai dari elemen HTML dengan id 'terapioralicc1', 'terapioralicc2', dst., dengan nilai yang sesuai dari objek 'terapioralicc'.
                    //     }
                    // }

                    // ini udah kasih kondisi
                    const terapioralicc = JSON.parse(data.intensive_care_chart.terapioralicc);
                    if (terapioralicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioralicc${i}`;
                            if (terapioralicc[key] !== null && terapioralicc[key] !== undefined) {
                                $(`#${key}`).val(terapioralicc[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioralicca = JSON.parse(data.intensive_care_chart.terapioralicca);
                    if (terapioralicca) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioralicca${i}`;
                            if (terapioralicca[key] !== null && terapioralicca[key] !== undefined) {
                                $(`#${key}`).val(terapioralicca[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioraliccb = JSON.parse(data.intensive_care_chart.terapioraliccb);
                    if (terapioraliccb) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioraliccb${i}`;
                            if (terapioraliccb[key] !== null && terapioraliccb[key] !== undefined) {
                                $(`#${key}`).val(terapioraliccb[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioraliccc = JSON.parse(data.intensive_care_chart.terapioraliccc);
                    if (terapioraliccc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioraliccc${i}`;
                            if (terapioraliccc[key] !== null && terapioraliccc[key] !== undefined) {
                                $(`#${key}`).val(terapioraliccc[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioraliccd = JSON.parse(data.intensive_care_chart.terapioraliccd);
                    if (terapioraliccd) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioraliccd${i}`;
                            if (terapioraliccd[key] !== null && terapioraliccd[key] !== undefined) {
                                $(`#${key}`).val(terapioraliccd[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioralicce = JSON.parse(data.intensive_care_chart.terapioralicce);
                    if (terapioralicce) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioralicce${i}`;
                            if (terapioralicce[key] !== null && terapioralicce[key] !== undefined) {
                                $(`#${key}`).val(terapioralicce[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioraliccf = JSON.parse(data.intensive_care_chart.terapioraliccf);
                    if (terapioraliccf) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioraliccf${i}`;
                            if (terapioraliccf[key] !== null && terapioraliccf[key] !== undefined) {
                                $(`#${key}`).val(terapioraliccf[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioraliccg = JSON.parse(data.intensive_care_chart.terapioraliccg);
                    if (terapioraliccg) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioraliccg${i}`;
                            if (terapioraliccg[key] !== null && terapioraliccg[key] !== undefined) {
                                $(`#${key}`).val(terapioraliccg[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioralicch = JSON.parse(data.intensive_care_chart.terapioralicch);
                    if (terapioralicch) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioralicch${i}`;
                            if (terapioralicch[key] !== null && terapioralicch[key] !== undefined) {
                                $(`#${key}`).val(terapioralicch[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioralicci = JSON.parse(data.intensive_care_chart.terapioralicci);
                    if (terapioralicci) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioralicci${i}`;
                            if (terapioralicci[key] !== null && terapioralicci[key] !== undefined) {
                                $(`#${key}`).val(terapioralicci[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioraliccj = JSON.parse(data.intensive_care_chart.terapioraliccj);
                    if (terapioraliccj) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioraliccj${i}`;
                            if (terapioraliccj[key] !== null && terapioraliccj[key] !== undefined) {
                                $(`#${key}`).val(terapioraliccj[key]);
                            }
                        }
                    }

                    // ini udah kasih kondisi
                    const terapioralicck = JSON.parse(data.intensive_care_chart.terapioralicck);
                    if (terapioralicck) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapioralicck${i}`;
                            if (terapioralicck[key] !== null && terapioralicck[key] !== undefined) {
                                $(`#${key}`).val(terapioralicck[key]);
                            }
                        }
                    }
                    // batas

                    const terapiinjeksiicc = JSON.parse(data.intensive_care_chart.terapiinjeksiicc);
                    if (terapiinjeksiicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiicc${i}`;
                            if (terapiinjeksiicc[key] !== null && terapiinjeksiicc[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiicc[key]);
                            }
                        }
                    }
                    const terapiinjeksiicca = JSON.parse(data.intensive_care_chart.terapiinjeksiicca);
                    if (terapiinjeksiicca) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiicca${i}`;
                            if (terapiinjeksiicca[key] !== null && terapiinjeksiicca[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiicca[key]);
                            }
                        }
                    }
                    const terapiinjeksiiccb = JSON.parse(data.intensive_care_chart.terapiinjeksiiccb);
                    if (terapiinjeksiiccb) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiiccb${i}`;
                            if (terapiinjeksiiccb[key] !== null && terapiinjeksiiccb[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiiccb[key]);
                            }
                        }
                    }
                    const terapiinjeksiiccc = JSON.parse(data.intensive_care_chart.terapiinjeksiiccc);
                    if (terapiinjeksiiccc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiiccc${i}`;
                            if (terapiinjeksiiccc[key] !== null && terapiinjeksiiccc[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiiccc[key]);
                            }
                        }
                    }
                    const terapiinjeksiiccd = JSON.parse(data.intensive_care_chart.terapiinjeksiiccd);
                    if (terapiinjeksiiccd) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiiccd${i}`;
                            if (terapiinjeksiiccd[key] !== null && terapiinjeksiiccd[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiiccd[key]);
                            }
                        }
                    }
                    const terapiinjeksiicce = JSON.parse(data.intensive_care_chart.terapiinjeksiicce);
                    if (terapiinjeksiicce) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiicce${i}`;
                            if (terapiinjeksiicce[key] !== null && terapiinjeksiicce[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiicce[key]);
                            }
                        }
                    }
                    const terapiinjeksiiccf = JSON.parse(data.intensive_care_chart.terapiinjeksiiccf);
                    if (terapiinjeksiiccf) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiiccf${i}`;
                            if (terapiinjeksiiccf[key] !== null && terapiinjeksiiccf[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiiccf[key]);
                            }
                        }
                    }
                    const terapiinjeksiiccg = JSON.parse(data.intensive_care_chart.terapiinjeksiiccg);
                    if (terapiinjeksiiccg) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiiccg${i}`;
                            if (terapiinjeksiiccg[key] !== null && terapiinjeksiiccg[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiiccg[key]);
                            }
                        }
                    }
                    const terapiinjeksiicch = JSON.parse(data.intensive_care_chart.terapiinjeksiicch);
                    if (terapiinjeksiicch) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiicch${i}`;
                            if (terapiinjeksiicch[key] !== null && terapiinjeksiicch[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiicch[key]);
                            }
                        }
                    }
                    const terapiinjeksiicci = JSON.parse(data.intensive_care_chart.terapiinjeksiicci);
                    if (terapiinjeksiicci) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiicci${i}`;
                            if (terapiinjeksiicci[key] !== null && terapiinjeksiicci[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiicci[key]);
                            }
                        }
                    }
                    const terapiinjeksiiccj = JSON.parse(data.intensive_care_chart.terapiinjeksiiccj);
                    if (terapiinjeksiiccj) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiiccj${i}`;
                            if (terapiinjeksiiccj[key] !== null && terapiinjeksiiccj[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiiccj[key]);
                            }
                        }
                    }
                    const terapiinjeksiicck = JSON.parse(data.intensive_care_chart.terapiinjeksiicck);
                    if (terapiinjeksiicck) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapiinjeksiicck${i}`;
                            if (terapiinjeksiicck[key] !== null && terapiinjeksiicck[key] !== undefined) {
                                $(`#${key}`).val(terapiinjeksiicck[key]);
                            }
                        }
                    }

                    // batas
                    const terapilainicc = JSON.parse(data.intensive_care_chart.terapilainicc);
                    if (terapilainicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapilainicc${i}`;
                            if (terapilainicc[key] !== null && terapilainicc[key] !== undefined) {
                                $(`#${key}`).val(terapilainicc[key]);
                            }
                        }
                    }
                    const terapilainicca = JSON.parse(data.intensive_care_chart.terapilainicca);
                    if (terapilainicca) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapilainicca${i}`;
                            if (terapilainicca[key] !== null && terapilainicca[key] !== undefined) {
                                $(`#${key}`).val(terapilainicca[key]);
                            }
                        }
                    }
                    const terapilainiccb = JSON.parse(data.intensive_care_chart.terapilainiccb);
                    if (terapilainiccb) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `terapilainiccb${i}`;
                            if (terapilainiccb[key] !== null && terapilainiccb[key] !== undefined) {
                                $(`#${key}`).val(terapilainiccb[key]);
                            }
                        }
                    }

                    // BATAS

                    const lapcwpA = JSON.parse(data.intensive_care_chart.lapcwpA);
                    if (lapcwpA) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpA${i}`;
                            if (lapcwpA[key] !== null && lapcwpA[key] !== undefined) {
                                $(`#${key}`).val(lapcwpA[key]);
                            }
                        }
                    }
                    const lapcwpB = JSON.parse(data.intensive_care_chart.lapcwpB);
                    if (lapcwpB) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpB${i}`;
                            if (lapcwpB[key] !== null && lapcwpB[key] !== undefined) {
                                $(`#${key}`).val(lapcwpB[key]);
                            }
                        }
                    }
                    const lapcwpC = JSON.parse(data.intensive_care_chart.lapcwpC);
                    if (lapcwpC) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpC${i}`;
                            if (lapcwpC[key] !== null && lapcwpC[key] !== undefined) {
                                $(`#${key}`).val(lapcwpC[key]);
                            }
                        }
                    }
                    const lapcwpD = JSON.parse(data.intensive_care_chart.lapcwpD);
                    if (lapcwpD) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpD${i}`;
                            if (lapcwpD[key] !== null && lapcwpD[key] !== undefined) {
                                $(`#${key}`).val(lapcwpD[key]);
                            }
                        }
                    }
                    const lapcwpE = JSON.parse(data.intensive_care_chart.lapcwpE);
                    if (lapcwpE) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpE${i}`;
                            if (lapcwpE[key] !== null && lapcwpE[key] !== undefined) {
                                $(`#${key}`).val(lapcwpE[key]);
                            }
                        }
                    }
                    const lapcwpF = JSON.parse(data.intensive_care_chart.lapcwpF);
                    if (lapcwpF) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpF${i}`;
                            if (lapcwpF[key] !== null && lapcwpF[key] !== undefined) {
                                $(`#${key}`).val(lapcwpF[key]);
                            }
                        }
                    }
                    const lapcwpG = JSON.parse(data.intensive_care_chart.lapcwpG);
                    if (lapcwpG) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpG${i}`;
                            if (lapcwpG[key] !== null && lapcwpG[key] !== undefined) {
                                $(`#${key}`).val(lapcwpG[key]);
                            }
                        }
                    }
                    const lapcwpH = JSON.parse(data.intensive_care_chart.lapcwpH);
                    if (lapcwpH) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpH${i}`;
                            if (lapcwpH[key] !== null && lapcwpH[key] !== undefined) {
                                $(`#${key}`).val(lapcwpH[key]);
                            }
                        }
                    }
                    const lapcwpI = JSON.parse(data.intensive_care_chart.lapcwpI);
                    if (lapcwpI) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpI${i}`;
                            if (lapcwpI[key] !== null && lapcwpI[key] !== undefined) {
                                $(`#${key}`).val(lapcwpI[key]);
                            }
                        }
                    }
                    const lapcwpJ = JSON.parse(data.intensive_care_chart.lapcwpJ);
                    if (lapcwpJ) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpJ${i}`;
                            if (lapcwpJ[key] !== null && lapcwpJ[key] !== undefined) {
                                $(`#${key}`).val(lapcwpJ[key]);
                            }
                        }
                    }
                    const lapcwpK = JSON.parse(data.intensive_care_chart.lapcwpK);
                    if (lapcwpK) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpK${i}`;
                            if (lapcwpK[key] !== null && lapcwpK[key] !== undefined) {
                                $(`#${key}`).val(lapcwpK[key]);
                            }
                        }
                    }
                    const lapcwpL = JSON.parse(data.intensive_care_chart.lapcwpL);
                    if (lapcwpL) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpL${i}`;
                            if (lapcwpL[key] !== null && lapcwpL[key] !== undefined) {
                                $(`#${key}`).val(lapcwpL[key]);
                            }
                        }
                    }
                    const lapcwpM = JSON.parse(data.intensive_care_chart.lapcwpM);
                    if (lapcwpM) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpM${i}`;
                            if (lapcwpM[key] !== null && lapcwpM[key] !== undefined) {
                                $(`#${key}`).val(lapcwpM[key]);
                            }
                        }
                    }
                    const lapcwpN = JSON.parse(data.intensive_care_chart.lapcwpN);
                    if (lapcwpN) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpN${i}`;
                            if (lapcwpN[key] !== null && lapcwpN[key] !== undefined) {
                                $(`#${key}`).val(lapcwpN[key]);
                            }
                        }
                    }
                    const lapcwpO = JSON.parse(data.intensive_care_chart.lapcwpO);
                    if (lapcwpO) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpO${i}`;
                            if (lapcwpO[key] !== null && lapcwpO[key] !== undefined) {
                                $(`#${key}`).val(lapcwpO[key]);
                            }
                        }
                    }
                    const lapcwpP = JSON.parse(data.intensive_care_chart.lapcwpP);
                    if (lapcwpP) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpP${i}`;
                            if (lapcwpP[key] !== null && lapcwpP[key] !== undefined) {
                                $(`#${key}`).val(lapcwpP[key]);
                            }
                        }
                    }
                    const lapcwpQ = JSON.parse(data.intensive_care_chart.lapcwpQ);
                    if (lapcwpQ) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpQ${i}`;
                            if (lapcwpQ[key] !== null && lapcwpQ[key] !== undefined) {
                                $(`#${key}`).val(lapcwpQ[key]);
                            }
                        }
                    }
                    const lapcwpR = JSON.parse(data.intensive_care_chart.lapcwpR);
                    if (lapcwpR) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpR${i}`;
                            if (lapcwpR[key] !== null && lapcwpR[key] !== undefined) {
                                $(`#${key}`).val(lapcwpR[key]);
                            }
                        }
                    }
                    const lapcwpS = JSON.parse(data.intensive_care_chart.lapcwpS);
                    if (lapcwpS) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpS${i}`;
                            if (lapcwpS[key] !== null && lapcwpS[key] !== undefined) {
                                $(`#${key}`).val(lapcwpS[key]);
                            }
                        }
                    }
                    const lapcwpT = JSON.parse(data.intensive_care_chart.lapcwpT);
                    if (lapcwpT) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpT${i}`;
                            if (lapcwpT[key] !== null && lapcwpT[key] !== undefined) {
                                $(`#${key}`).val(lapcwpT[key]);
                            }
                        }
                    }
                    const lapcwpU = JSON.parse(data.intensive_care_chart.lapcwpU);
                    if (lapcwpU) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpU${i}`;
                            if (lapcwpU[key] !== null && lapcwpU[key] !== undefined) {
                                $(`#${key}`).val(lapcwpU[key]);
                            }
                        }
                    }
                    const lapcwpV = JSON.parse(data.intensive_care_chart.lapcwpV);
                    if (lapcwpV) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpV${i}`;
                            if (lapcwpV[key] !== null && lapcwpV[key] !== undefined) {
                                $(`#${key}`).val(lapcwpV[key]);
                            }
                        }
                    }
                    const lapcwpW = JSON.parse(data.intensive_care_chart.lapcwpW);
                    if (lapcwpW) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpW${i}`;
                            if (lapcwpW[key] !== null && lapcwpW[key] !== undefined) {
                                $(`#${key}`).val(lapcwpW[key]);
                            }
                        }
                    }
                    const lapcwpX = JSON.parse(data.intensive_care_chart.lapcwpX);
                    if (lapcwpX) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpX${i}`;
                            if (lapcwpX[key] !== null && lapcwpX[key] !== undefined) {
                                $(`#${key}`).val(lapcwpX[key]);
                            }
                        }
                    }
                    const lapcwpY = JSON.parse(data.intensive_care_chart.lapcwpY);
                    if (lapcwpY) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpY${i}`;
                            if (lapcwpY[key] !== null && lapcwpY[key] !== undefined) {
                                $(`#${key}`).val(lapcwpY[key]);
                            }
                        }
                    }
                    const lapcwpZ = JSON.parse(data.intensive_care_chart.lapcwpZ);
                    if (lapcwpZ) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpZ${i}`;
                            if (lapcwpZ[key] !== null && lapcwpZ[key] !== undefined) {
                                $(`#${key}`).val(lapcwpZ[key]);
                            }
                        }
                    }
                    const lapcwpAA = JSON.parse(data.intensive_care_chart.lapcwpAA);
                    if (lapcwpAA) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpAA${i}`;
                            if (lapcwpAA[key] !== null && lapcwpAA[key] !== undefined) {
                                $(`#${key}`).val(lapcwpAA[key]);
                            }
                        }
                    }
                    const lapcwpBB = JSON.parse(data.intensive_care_chart.lapcwpBB);
                    if (lapcwpBB) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpBB${i}`;
                            if (lapcwpBB[key] !== null && lapcwpBB[key] !== undefined) {
                                $(`#${key}`).val(lapcwpBB[key]);
                            }
                        }
                    }
                    const lapcwpCC = JSON.parse(data.intensive_care_chart.lapcwpCC);
                    if (lapcwpCC) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpCC${i}`;
                            if (lapcwpCC[key] !== null && lapcwpCC[key] !== undefined) {
                                $(`#${key}`).val(lapcwpCC[key]);
                            }
                        }
                    }
                    const lapcwpDD = JSON.parse(data.intensive_care_chart.lapcwpDD);
                    if (lapcwpDD) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpDD${i}`;
                            if (lapcwpDD[key] !== null && lapcwpDD[key] !== undefined) {
                                $(`#${key}`).val(lapcwpDD[key]);
                            }
                        }
                    }
                    const lapcwpEE = JSON.parse(data.intensive_care_chart.lapcwpEE);
                    if (lapcwpEE) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpEE${i}`;
                            if (lapcwpEE[key] !== null && lapcwpEE[key] !== undefined) {
                                $(`#${key}`).val(lapcwpEE[key]);
                            }
                        }
                    }
                    const lapcwpFF = JSON.parse(data.intensive_care_chart.lapcwpFF);
                    if (lapcwpFF) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpFF${i}`;
                            if (lapcwpFF[key] !== null && lapcwpFF[key] !== undefined) {
                                $(`#${key}`).val(lapcwpFF[key]);
                            }
                        }
                    }
                    const lapcwpGG = JSON.parse(data.intensive_care_chart.lapcwpGG);
                    if (lapcwpGG) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `lapcwpGG${i}`;
                            if (lapcwpGG[key] !== null && lapcwpGG[key] !== undefined) {
                                $(`#${key}`).val(lapcwpGG[key]);
                            }
                        }
                    }

                    $('#lapcwptext').val(data.intensive_care_chart.lapcwptext);

                    // BATAS
                    const sirkulasiA = JSON.parse(data.intensive_care_chart.sirkulasiA);
                    if (sirkulasiA) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `sirkulasiA${i}`;
                            if (sirkulasiA[key] !== null && sirkulasiA[key] !== undefined) {
                                $(`#${key}`).val(sirkulasiA[key]);
                            }
                        }
                    }
                    const sirkulasiB = JSON.parse(data.intensive_care_chart.sirkulasiB);
                    if (sirkulasiB) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `sirkulasiB${i}`;
                            if (sirkulasiB[key] !== null && sirkulasiB[key] !== undefined) {
                                $(`#${key}`).val(sirkulasiB[key]);
                            }
                        }
                    }
                    const sirkulasiC = JSON.parse(data.intensive_care_chart.sirkulasiC);
                    if (sirkulasiC) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `sirkulasiC${i}`;
                            if (sirkulasiC[key] !== null && sirkulasiC[key] !== undefined) {
                                $(`#${key}`).val(sirkulasiC[key]);
                            }
                        }
                    }
                    const sirkulasiD = JSON.parse(data.intensive_care_chart.sirkulasiD);
                    if (sirkulasiD) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `sirkulasiD${i}`;
                            if (sirkulasiD[key] !== null && sirkulasiD[key] !== undefined) {
                                $(`#${key}`).val(sirkulasiD[key]);
                            }
                        }
                    }
                    const sirkulasiE = JSON.parse(data.intensive_care_chart.sirkulasiE);
                    if (sirkulasiE) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `sirkulasiE${i}`;
                            if (sirkulasiE[key] !== null && sirkulasiE[key] !== undefined) {
                                $(`#${key}`).val(sirkulasiE[key]);
                            }
                        }
                    }
                    const sirkulasiF = JSON.parse(data.intensive_care_chart.sirkulasiF);
                    if (sirkulasiF) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `sirkulasiF${i}`;
                            if (sirkulasiF[key] !== null && sirkulasiF[key] !== undefined) {
                                $(`#${key}`).val(sirkulasiF[key]);
                            }
                        }
                    }

                    $('#sirkulasitext').val(data.intensive_care_chart.sirkulasitext);


                    // BATAS
                    const modeicc = JSON.parse(data.intensive_care_chart.modeicc);
                    if (modeicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `modeicc${i}`;
                            if (modeicc[key] !== null && modeicc[key] !== undefined) {
                                $(`#${key}`).val(modeicc[key]);
                            }
                        }
                    }
                    const mvemvicc = JSON.parse(data.intensive_care_chart.mvemvicc);
                    if (mvemvicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `mvemvicc${i}`;
                            if (mvemvicc[key] !== null && mvemvicc[key] !== undefined) {
                                $(`#${key}`).val(mvemvicc[key]);
                            }
                        }
                    }
                    const tvetvicc = JSON.parse(data.intensive_care_chart.tvetvicc);
                    if (tvetvicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `tvetvicc${i}`;
                            if (tvetvicc[key] !== null && tvetvicc[key] !== undefined) {
                                $(`#${key}`).val(tvetvicc[key]);
                            }
                        }
                    }
                    const totalrateicc = JSON.parse(data.intensive_care_chart.totalrateicc);
                    if (totalrateicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `totalrateicc${i}`;
                            if (totalrateicc[key] !== null && totalrateicc[key] !== undefined) {
                                $(`#${key}`).val(totalrateicc[key]);
                            }
                        }
                    }
                    const inspirasipressicc = JSON.parse(data.intensive_care_chart.inspirasipressicc);
                    if (inspirasipressicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `inspirasipressicc${i}`;
                            if (inspirasipressicc[key] !== null && inspirasipressicc[key] !== undefined) {
                                $(`#${key}`).val(inspirasipressicc[key]);
                            }
                        }
                    }
                    const modpeepicc = JSON.parse(data.intensive_care_chart.modpeepicc);
                    if (modpeepicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `modpeepicc${i}`;
                            if (modpeepicc[key] !== null && modpeepicc[key] !== undefined) {
                                $(`#${key}`).val(modpeepicc[key]);
                            }
                        }
                    }
                    const peakicc = JSON.parse(data.intensive_care_chart.peakicc);
                    if (peakicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `peakicc${i}`;
                            if (peakicc[key] !== null && peakicc[key] !== undefined) {
                                $(`#${key}`).val(peakicc[key]);
                            }
                        }
                    }
                    const fiicc = JSON.parse(data.intensive_care_chart.fiicc);
                    if (fiicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `fiicc${i}`;
                            if (fiicc[key] !== null && fiicc[key] !== undefined) {
                                $(`#${key}`).val(fiicc[key]);
                            }
                        }
                    }
                    const cufforessicc = JSON.parse(data.intensive_care_chart.cufforessicc);
                    if (cufforessicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `cufforessicc${i}`;
                            if (cufforessicc[key] !== null && cufforessicc[key] !== undefined) {
                                $(`#${key}`).val(cufforessicc[key]);
                            }
                        }
                    }
                    const suctionicc = JSON.parse(data.intensive_care_chart.suctionicc);
                    if (suctionicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `suctionicc${i}`;
                            if (suctionicc[key] !== null && suctionicc[key] !== undefined) {
                                $(`#${key}`).val(suctionicc[key]);
                            }
                        }
                    }
                    const gdsicc = JSON.parse(data.intensive_care_chart.gdsicc);
                    if (gdsicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 26; i++) {
                            let key = `gdsicc${i}`;
                            if (gdsicc[key] !== null && gdsicc[key] !== undefined) {
                                $(`#${key}`).val(gdsicc[key]);
                            }
                        }
                    }
                    $('#respirasitext').val(data.intensive_care_chart.respirasitext);

                    // BATAS
                    const ukuranpupilicc = JSON.parse(data.intensive_care_chart.ukuranpupilicc);
                    if (ukuranpupilicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `ukuranpupilicc${i}`;
                            if (ukuranpupilicc[key] !== null && ukuranpupilicc[key] !== undefined) {
                                $(`#${key}`).val(ukuranpupilicc[key]);
                            }
                        }
                    }
                    const reaksipupilicc = JSON.parse(data.intensive_care_chart.reaksipupilicc);
                    if (reaksipupilicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `reaksipupilicc${i}`;
                            if (reaksipupilicc[key] !== null && reaksipupilicc[key] !== undefined) {
                                $(`#${key}`).val(reaksipupilicc[key]);
                            }
                        }
                    }
                    const gcsicc = JSON.parse(data.intensive_care_chart.gcsicc);
                    if (gcsicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `gcsicc${i}`;
                            if (gcsicc[key] !== null && gcsicc[key] !== undefined) {
                                $(`#${key}`).val(gcsicc[key]);
                            }
                        }
                    }
                    const kesadaranicct = JSON.parse(data.intensive_care_chart.kesadaranicct);
                    if (kesadaranicct) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `kesadaranicct${i}`;
                            if (kesadaranicct[key] !== null && kesadaranicct[key] !== undefined) {
                                $(`#${key}`).val(kesadaranicct[key]);
                            }
                        }
                    }
                    const plebitisicc = JSON.parse(data.intensive_care_chart.plebitisicc);
                    if (plebitisicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `plebitisicc${i}`;
                            if (plebitisicc[key] !== null && plebitisicc[key] !== undefined) {
                                $(`#${key}`).val(plebitisicc[key]);
                            }
                        }
                    }
                    const locationicc = JSON.parse(data.intensive_care_chart.locationicc);
                    if (locationicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `locationicc${i}`;
                            if (locationicc[key] !== null && locationicc[key] !== undefined) {
                                $(`#${key}`).val(locationicc[key]);
                            }
                        }
                    }
                    const intensity = JSON.parse(data.intensive_care_chart.intensity);
                    if (intensity) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `intensity${i}`;
                            if (intensity[key] !== null && intensity[key] !== undefined) {
                                $(`#${key}`).val(intensity[key]);
                            }
                        }
                    }
                    const sedationicc = JSON.parse(data.intensive_care_chart.sedationicc);
                    if (sedationicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `sedationicc${i}`;
                            if (sedationicc[key] !== null && sedationicc[key] !== undefined) {
                                $(`#${key}`).val(sedationicc[key]);
                            }
                        }
                    }
                    $('#neurotext').val(data.intensive_care_chart.neurotext);


                    // BATAS
                    const phicc = JSON.parse(data.intensive_care_chart.phicc);
                    if (phicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `phicc${i}`;
                            if (phicc[key] !== null && phicc[key] !== undefined) {
                                $(`#${key}`).val(phicc[key]);
                            }
                        }
                    }
                    const pcoicc = JSON.parse(data.intensive_care_chart.pcoicc);
                    if (pcoicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `pcoicc${i}`;
                            if (pcoicc[key] !== null && pcoicc[key] !== undefined) {
                                $(`#${key}`).val(pcoicc[key]);
                            }
                        }
                    }
                    const poicc = JSON.parse(data.intensive_care_chart.poicc);
                    if (poicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `poicc${i}`;
                            if (poicc[key] !== null && poicc[key] !== undefined) {
                                $(`#${key}`).val(poicc[key]);
                            }
                        }
                    }
                    const tcoicc = JSON.parse(data.intensive_care_chart.tcoicc);
                    if (tcoicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `tcoicc${i}`;
                            if (tcoicc[key] !== null && tcoicc[key] !== undefined) {
                                $(`#${key}`).val(tcoicc[key]);
                            }
                        }
                    }
                    const belicc = JSON.parse(data.intensive_care_chart.belicc);
                    if (belicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `belicc${i}`;
                            if (belicc[key] !== null && belicc[key] !== undefined) {
                                $(`#${key}`).val(belicc[key]);
                            }
                        }
                    }
                    const hcoicc = JSON.parse(data.intensive_care_chart.hcoicc);
                    if (hcoicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `hcoicc${i}`;
                            if (hcoicc[key] !== null && hcoicc[key] !== undefined) {
                                $(`#${key}`).val(hcoicc[key]);
                            }
                        }
                    }
                    const ooduaicc = JSON.parse(data.intensive_care_chart.ooduaicc);
                    if (ooduaicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `ooduaicc${i}`;
                            if (ooduaicc[key] !== null && ooduaicc[key] !== undefined) {
                                $(`#${key}`).val(ooduaicc[key]);
                            }
                        }
                    }
                    const saturwasiicc = JSON.parse(data.intensive_care_chart.saturwasiicc);
                    if (saturwasiicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `saturwasiicc${i}`;
                            if (saturwasiicc[key] !== null && saturwasiicc[key] !== undefined) {
                                $(`#${key}`).val(saturwasiicc[key]);
                            }
                        }
                    }
                    const nakclcaicc = JSON.parse(data.intensive_care_chart.nakclcaicc);
                    if (nakclcaicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `nakclcaicc${i}`;
                            if (nakclcaicc[key] !== null && nakclcaicc[key] !== undefined) {
                                $(`#${key}`).val(nakclcaicc[key]);
                            }
                        }
                    }
                    const ureumcreatininicc = JSON.parse(data.intensive_care_chart.ureumcreatininicc);
                    if (ureumcreatininicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `ureumcreatininicc${i}`;
                            if (ureumcreatininicc[key] !== null && ureumcreatininicc[key] !== undefined) {
                                $(`#${key}`).val(ureumcreatininicc[key]);
                            }
                        }
                    }
                    const albuminicc = JSON.parse(data.intensive_care_chart.albuminicc);
                    if (albuminicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `albuminicc${i}`;
                            if (albuminicc[key] !== null && albuminicc[key] !== undefined) {
                                $(`#${key}`).val(albuminicc[key]);
                            }
                        }
                    }
                    const hbhtleuicc = JSON.parse(data.intensive_care_chart.hbhtleuicc);
                    if (hbhtleuicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `hbhtleuicc${i}`;
                            if (hbhtleuicc[key] !== null && hbhtleuicc[key] !== undefined) {
                                $(`#${key}`).val(hbhtleuicc[key]);
                            }
                        }
                    }
                    const otpticc = JSON.parse(data.intensive_care_chart.otpticc);
                    if (otpticc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `otpticc${i}`;
                            if (otpticc[key] !== null && otpticc[key] !== undefined) {
                                $(`#${key}`).val(otpticc[key]);
                            }
                        }
                    }
                    const bildirectlicc = JSON.parse(data.intensive_care_chart.bildirectlicc);
                    if (bildirectlicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `bildirectlicc${i}`;
                            if (bildirectlicc[key] !== null && bildirectlicc[key] !== undefined) {
                                $(`#${key}`).val(bildirectlicc[key]);
                            }
                        }
                    }
                    const ckckmbicc = JSON.parse(data.intensive_care_chart.ckckmbicc);
                    if (ckckmbicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `ckckmbicc${i}`;
                            if (ckckmbicc[key] !== null && ckckmbicc[key] !== undefined) {
                                $(`#${key}`).val(ckckmbicc[key]);
                            }
                        }
                    }
                    const ptapttcc = JSON.parse(data.intensive_care_chart.ptapttcc);
                    if (ptapttcc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `ptapttcc${i}`;
                            if (ptapttcc[key] !== null && ptapttcc[key] !== undefined) {
                                $(`#${key}`).val(ptapttcc[key]);
                            }
                        }
                    }
                    const fibrinogenicc = JSON.parse(data.intensive_care_chart.fibrinogenicc);
                    if (fibrinogenicc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `fibrinogenicc${i}`;
                            if (fibrinogenicc[key] !== null && fibrinogenicc[key] !== undefined) {
                                $(`#${key}`).val(fibrinogenicc[key]);
                            }
                        }
                    }
                    const crppcticc = JSON.parse(data.intensive_care_chart.crppcticc);
                    if (crppcticc) { // Pastikan objek tidak null
                        for (let i = 1; i <= 6; i++) {
                            let key = `crppcticc${i}`;
                            if (crppcticc[key] !== null && crppcticc[key] !== undefined) {
                                $(`#${key}`).val(crppcticc[key]);
                            }
                        }
                    }


                    // BATAS
                    const intakeA = JSON.parse(data.intensive_care_chart.intakeA);
                    if (intakeA) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeA${i}`;
                            if (intakeA[key] !== null && intakeA[key] !== undefined) {
                                $(`#${key}`).val(intakeA[key]);
                            }
                        }
                    }
                    const intakeB = JSON.parse(data.intensive_care_chart.intakeB);
                    if (intakeB) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeB${i}`;
                            if (intakeB[key] !== null && intakeB[key] !== undefined) {
                                $(`#${key}`).val(intakeB[key]);
                            }
                        }
                    }
                    const intakeC = JSON.parse(data.intensive_care_chart.intakeC);
                    if (intakeC) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeC${i}`;
                            if (intakeC[key] !== null && intakeC[key] !== undefined) {
                                $(`#${key}`).val(intakeC[key]);
                            }
                        }
                    }
                    const intakeD = JSON.parse(data.intensive_care_chart.intakeD);
                    if (intakeD) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeD${i}`;
                            if (intakeD[key] !== null && intakeD[key] !== undefined) {
                                $(`#${key}`).val(intakeD[key]);
                            }
                        }
                    }
                    const intakeE = JSON.parse(data.intensive_care_chart.intakeE);
                    if (intakeE) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeE${i}`;
                            if (intakeE[key] !== null && intakeE[key] !== undefined) {
                                $(`#${key}`).val(intakeE[key]);
                            }
                        }
                    }
                    const intakeF = JSON.parse(data.intensive_care_chart.intakeF);
                    if (intakeF) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeF${i}`;
                            if (intakeF[key] !== null && intakeF[key] !== undefined) {
                                $(`#${key}`).val(intakeF[key]);
                            }
                        }
                    }
                    const intakeG = JSON.parse(data.intensive_care_chart.intakeG);
                    if (intakeG) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeG${i}`;
                            if (intakeG[key] !== null && intakeG[key] !== undefined) {
                                $(`#${key}`).val(intakeG[key]);
                            }
                        }
                    }
                    const intakeH = JSON.parse(data.intensive_care_chart.intakeH);
                    if (intakeH) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeH${i}`;
                            if (intakeH[key] !== null && intakeH[key] !== undefined) {
                                $(`#${key}`).val(intakeH[key]);
                            }
                        }
                    }
                    const intakeI = JSON.parse(data.intensive_care_chart.intakeI);
                    if (intakeI) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeI${i}`;
                            if (intakeI[key] !== null && intakeI[key] !== undefined) {
                                $(`#${key}`).val(intakeI[key]);
                            }
                        }
                    }
                    const intakeJ = JSON.parse(data.intensive_care_chart.intakeJ);
                    if (intakeJ) { // Pastikan objek tidak null
                        for (let i = 1; i <= 51; i++) {
                            let key = `intakeJ${i}`;
                            if (intakeJ[key] !== null && intakeJ[key] !== undefined) {
                                $(`#${key}`).val(intakeJ[key]);
                            }
                        }
                    }
                    const intakeK = JSON.parse(data.intensive_care_chart.intakeK);
                    if (intakeK) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `intakeK${i}`;
                            if (intakeK[key] !== null && intakeK[key] !== undefined) {
                                $(`#${key}`).val(intakeK[key]);
                            }
                        }
                    }
                    const intakeL = JSON.parse(data.intensive_care_chart.intakeL);
                    if (intakeL) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `intakeL${i}`;
                            if (intakeL[key] !== null && intakeL[key] !== undefined) {
                                $(`#${key}`).val(intakeL[key]);
                            }
                        }
                    }
                    

                    // BATAS 
                    const drainA = JSON.parse(data.intensive_care_chart.drainA);
                    if (drainA) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `drainA${i}`;
                            if (drainA[key] !== null && drainA[key] !== undefined) {
                                $(`#${key}`).val(drainA[key]);
                            }
                        }
                    }
                    const drainB = JSON.parse(data.intensive_care_chart.drainB);
                    if (drainB) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `drainB${i}`;
                            if (drainB[key] !== null && drainB[key] !== undefined) {
                                $(`#${key}`).val(drainB[key]);
                            }
                        }
                    }
                    const drainC = JSON.parse(data.intensive_care_chart.drainC);
                    if (drainC) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `drainC${i}`;
                            if (drainC[key] !== null && drainC[key] !== undefined) {
                                $(`#${key}`).val(drainC[key]);
                            }
                        }
                    }
                    const drainD = JSON.parse(data.intensive_care_chart.drainD);
                    if (drainD) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `drainD${i}`;
                            if (drainD[key] !== null && drainD[key] !== undefined) {
                                $(`#${key}`).val(drainD[key]);
                            }
                        }
                    }
                    const ngtE = JSON.parse(data.intensive_care_chart.ngtE);
                    if (ngtE) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `ngtE${i}`;
                            if (ngtE[key] !== null && ngtE[key] !== undefined) {
                                $(`#${key}`).val(ngtE[key]);
                            }
                        }
                    }
                    const babF = JSON.parse(data.intensive_care_chart.babF);
                    if (babF) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `babF${i}`;
                            if (babF[key] !== null && babF[key] !== undefined) {
                                $(`#${key}`).val(babF[key]);
                            }
                        }
                    }
                    const bakG = JSON.parse(data.intensive_care_chart.bakG);
                    if (bakG) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `bakG${i}`;
                            if (bakG[key] !== null && bakG[key] !== undefined) {
                                $(`#${key}`).val(bakG[key]);
                            }
                        }
                    }
                    const totalperjamH = JSON.parse(data.intensive_care_chart.totalperjamH);
                    if (totalperjamH) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `totalperjamH${i}`;
                            if (totalperjamH[key] !== null && totalperjamH[key] !== undefined) {
                                $(`#${key}`).val(totalperjamH[key]);
                            }
                        }
                    }
                    const runingtotalI = JSON.parse(data.intensive_care_chart.runingtotalI);
                    if (runingtotalI) { // Pastikan objek tidak null
                        for (let i = 1; i <= 25; i++) {
                            let key = `runingtotalI${i}`;
                            if (runingtotalI[key] !== null && runingtotalI[key] !== undefined) {
                                $(`#${key}`).val(runingtotalI[key]);
                            }
                        }
                    }

                    $('#totaloutput').val(data.intensive_care_chart.totaloutput);

                    const balenceJ = JSON.parse(data.intensive_care_chart.balenceJ);
                    if (balenceJ) { // Pastikan objek tidak null
                        for (let i = 1; i <= 50; i++) {
                            let key = `balenceJ${i}`;
                            if (balenceJ[key] !== null && balenceJ[key] !== undefined) {
                                $(`#${key}`).val(balenceJ[key]);
                            }
                        }
                    }

                    $('#balenceK').val(data.intensive_care_chart.balenceK);

                    const balanceL = JSON.parse(data.intensive_care_chart.balanceL);
                    if (balanceL) { // Pastikan objek tidak null
                        for (let i = 1; i <= 3; i++) {
                            let key = `balanceL${i}`;
                            if (balanceL[key] !== null && balanceL[key] !== undefined) {
                                $(`#${key}`).val(balanceL[key]);
                            }
                        }
                    }

                    // DOWN SCORE/EVALUASI GAWAT NAFAS
                    if (data.intensive_care_chart.frekuensinafasicc === '0') {$('#frekuensinafasicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.frekuensinafasicc === '1') {$('#frekuensinafasicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.frekuensinafasicc === '2') {$('#frekuensinafasicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.retraksiicc === '0') {$('#retraksiicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.retraksiicc === '1') {$('#retraksiicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.retraksiicc === '2') {$('#retraksiicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.sianosisicc === '0') {$('#sianosisicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.sianosisicc === '1') {$('#sianosisicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.sianosisicc === '2') {$('#sianosisicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.airentriicc === '0') {$('#airentriicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.airentriicc === '1') {$('#airentriicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.airentriicc === '2') {$('#airentriicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.merintihicc === '0') {$('#merintihicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.merintihicc === '1') {$('#merintihicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.merintihicc === '2') {$('#merintihicc-3').prop('checked', true).change()}

                    // BRADEN RISK ASESSMENT SCALE
                    if (data.intensive_care_chart.totalyicc_1 === '1') {$('#totalyicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.totalyicc_2 === '1') {$('#totalyicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.totalyicc_3 === '1') {$('#totalyicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.totalyicc_4 === '1') {$('#totalyicc-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.totalyicc_5 === '1') {$('#totalyicc-5').prop('checked', true).change()}
                    if (data.intensive_care_chart.totalyicc_6 === '1') {$('#totalyicc-6').prop('checked', true).change()}
                    if (data.intensive_care_chart.veryicc_1 === '2') {$('#veryicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.veryicc_2 === '2') {$('#veryicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.veryicc_3 === '2') {$('#veryicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.veryicc_4 === '2') {$('#veryicc-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.veryicc_5 === '2') {$('#veryicc-5').prop('checked', true).change()}
                    if (data.intensive_care_chart.veryicc_6 === '2') {$('#veryicc-6').prop('checked', true).change()}
                    if (data.intensive_care_chart.slightly_1 === '3') {$('#slightly-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.slightly_2 === '3') {$('#slightly-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.slightly_3 === '3') {$('#slightly-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.slightly_4 === '3') {$('#slightly-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.slightly_5 === '3') {$('#slightly-5').prop('checked', true).change()}
                    if (data.intensive_care_chart.slightly_6 === '3') {$('#slightly-6').prop('checked', true).change()}
                    if (data.intensive_care_chart.impairment_1 === '4') {$('#impairment-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.impairment_2 === '4') {$('#impairment-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.impairment_3 === '4') {$('#impairment-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.impairment_4 === '4') {$('#impairment-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.impairment_5 === '4') {$('#impairment-5').prop('checked', true).change()}


                    // SOFA SCORE
                    if (data.intensive_care_chart.respirationa === '0') {$('#respirationa-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.respirationa === '1') {$('#respirationa-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.respirationa === '2') {$('#respirationa-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.respirationa === '3') {$('#respirationa-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.respirationa === '4') {$('#respirationa-5').prop('checked', true).change()}
                    if (data.intensive_care_chart.coagulation === '0') {$('#coagulation-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.coagulation === '1') {$('#coagulation-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.coagulation === '2') {$('#coagulation-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.coagulation === '3') {$('#coagulation-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.coagulation === '4') {$('#coagulation-5').prop('checked', true).change()}
                    if (data.intensive_care_chart.bilirubin === '0') {$('#bilirubin-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.bilirubin === '1') {$('#bilirubin-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.bilirubin === '2') {$('#bilirubin-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.bilirubin === '3') {$('#bilirubin-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.bilirubin === '4') {$('#bilirubin-5').prop('checked', true).change()}
                    if (data.intensive_care_chart.cardiovascular === '0') {$('#cardiovascular-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.cardiovascular === '1') {$('#cardiovascular-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.cardiovascular === '2') {$('#cardiovascular-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.cardiovascular === '3') {$('#cardiovascular-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.cardiovascular === '4') {$('#cardiovascular-5').prop('checked', true).change()}
                    if (data.intensive_care_chart.cns === '0') {$('#cns-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.cns === '1') {$('#cns-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.cns === '2') {$('#cns-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.cns === '3') {$('#cns-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.cns === '4') {$('#cns-5').prop('checked', true).change()}
                    if (data.intensive_care_chart.renalicc === '0') {$('#renalicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.renalicc === '1') {$('#renalicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.renalicc === '2') {$('#renalicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.renalicc === '3') {$('#renalicc-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.renalicc === '4') {$('#renalicc-5').prop('checked', true).change()}

                    // TRS
                    if (data.intensive_care_chart.mataicc === '4') {$('#mataicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.mataicc === '3') {$('#mataicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.mataicc === '2') {$('#mataicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.mataicc === '1') {$('#mataicc-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.motorikicc === '6') {$('#motorikicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.motorikicc === '5') {$('#motorikicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.motorikicc === '4') {$('#motorikicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.motorikicc === '3') {$('#motorikicc-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.motorikicc === '2') {$('#motorikicc-5').prop('checked', true).change()}
                    if (data.intensive_care_chart.motorikicc === '1') {$('#motorikicc-6').prop('checked', true).change()}
                    if (data.intensive_care_chart.verbalicc === '5') {$('#verbalicc-1').prop('checked', true).change()}
                    if (data.intensive_care_chart.verbalicc === '4') {$('#verbalicc-2').prop('checked', true).change()}
                    if (data.intensive_care_chart.verbalicc === '3') {$('#verbalicc-3').prop('checked', true).change()}
                    if (data.intensive_care_chart.verbalicc === '2') {$('#verbalicc-4').prop('checked', true).change()}
                    if (data.intensive_care_chart.verbalicc === '1') {$('#verbalicc-5').prop('checked', true).change()}


                    if (data.intensive_care_chart.plebitistkicc) {
                        const plebitistkicc = JSON.parse(data.intensive_care_chart.plebitistkicc);
                        if (plebitistkicc.plebitistkicc_1 !== null) {$('#plebitistkicc-1').prop('checked', true)}
                        if (plebitistkicc.plebitistkicc_2 !== null) {$('#plebitistkicc-2').prop('checked', true)}
                        if (plebitistkicc.plebitistkicc_3 !== null) {$('#plebitistkicc-3').prop('checked', true)}
                        if (plebitistkicc.plebitistkicc_4 !== null) {$('#plebitistkicc-4').prop('checked', true)}
                        if (plebitistkicc.plebitistkicc_5 !== null) {$('#plebitistkicc-5').prop('checked', true)}
                    }

                    // TRSP
                    // if (data.intensive_care_chart.spontanmicc === '4') {$('#spontanmicc-1').prop('checked', true).change()}
                    // if (data.intensive_care_chart.spontanmicc === '3') {$('#spontanmicc-2').prop('checked', true).change()}
                    // if (data.intensive_care_chart.spontanmicc === '2') {$('#spontanmicc-3').prop('checked', true).change()}
                    // if (data.intensive_care_chart.spontanmicc === '1') {$('#spontanmicc-4').prop('checked', true).change()}                 
                    // if (data.intensive_care_chart.bercakapicc === '5') {$('#bercakapicc-1').prop('checked', true).change()}
                    // if (data.intensive_care_chart.bercakapicc === '4') {$('#bercakapicc-2').prop('checked', true).change()}
                    // if (data.intensive_care_chart.bercakapicc === '3') {$('#bercakapicc-3').prop('checked', true).change()}
                    // if (data.intensive_care_chart.bercakapicc === '2') {$('#bercakapicc-4').prop('checked', true).change()}
                    // if (data.intensive_care_chart.bercakapicc === '1') {$('#bercakapicc-5').prop('checked', true).change()}
                    // if (data.intensive_care_chart.terbaikicc === '6') {$('#terbaikicc-1').prop('checked', true).change()}
                    // if (data.intensive_care_chart.terbaikicc === '5') {$('#terbaikicc-2').prop('checked', true).change()}
                    // if (data.intensive_care_chart.terbaikicc === '4') {$('#terbaikicc-3').prop('checked', true).change()}
                    // if (data.intensive_care_chart.terbaikicc === '3') {$('#terbaikicc-4').prop('checked', true).change()}
                    // if (data.intensive_care_chart.terbaikicc === '2') {$('#terbaikicc-5').prop('checked', true).change()}
                    // if (data.intensive_care_chart.terbaikicc === '1') {$('#terbaikicc-6').prop('checked', true).change()}

                    if (data.intensive_care_chart.sspm) {
                        const sspm = JSON.parse(data.intensive_care_chart.sspm);
                        if (sspm.sspm_1 !== null) {$('#sspm-1').prop('checked', true)}
                        if (sspm.sspm_2 !== null) {$('#sspm-2').prop('checked', true)}
                        if (sspm.sspm_3 !== null) {$('#sspm-3').prop('checked', true)}
                        if (sspm.sspm_4 !== null) {$('#sspm-4').prop('checked', true)}
                        if (sspm.sspm_5 !== null) {$('#sspm-5').prop('checked', true)}
                        if (sspm.sspm_6 !== null) {$('#sspm-6').prop('checked', true)}
                        if (sspm.sspm_7 !== null) {$('#sspm-7').prop('checked', true)}
                        if (sspm.sspm_8 !== null) {$('#sspm-8').prop('checked', true)}
                        if (sspm.sspm_9 !== null) {$('#sspm-9').prop('checked', true)}
                        if (sspm.sspm_10 !== null) {$('#sspm-10').prop('checked', true)}
                        if (sspm.sspm_11 !== null) {$('#sspm-11').prop('checked', true)}
                        if (sspm.sspm_12 !== null) {$('#sspm-12').prop('checked', true)}
                        if (sspm.sspm_13 !== null) {$('#sspm-13').prop('checked', true)}
                        if (sspm.sspm_14 !== null) {$('#sspm-14').prop('checked', true)}
                    }

                    if (data.intensive_care_chart.ngcsk) {
                        const ngcsk = JSON.parse(data.intensive_care_chart.ngcsk);
                        if (ngcsk.ngcsk_1 !== null) {$('#ngcsk-1').prop('checked', true)}
                        if (ngcsk.ngcsk_2 !== null) {$('#ngcsk-2').prop('checked', true)}
                        if (ngcsk.ngcsk_3 !== null) {$('#ngcsk-3').prop('checked', true)}
                        if (ngcsk.ngcsk_4 !== null) {$('#ngcsk-4').prop('checked', true)}
                        if (ngcsk.ngcsk_5 !== null) {$('#ngcsk-5').prop('checked', true)}
                        if (ngcsk.ngcsk_6 !== null) {$('#ngcsk-6').prop('checked', true)}
                        if (ngcsk.ngcsk_7 !== null) {$('#ngcsk-7').prop('checked', true)}
                        if (ngcsk.ngcsk_8 !== null) {$('#ngcsk-8').prop('checked', true)}
                        if (ngcsk.ngcsk_9 !== null) {$('#ngcsk-9').prop('checked', true)}
                        if (ngcsk.ngcsk_10 !== null) {$('#ngcsk-10').prop('checked', true)}
                        if (ngcsk.ngcsk_11 !== null) {$('#ngcsk-11').prop('checked', true)}
                        if (ngcsk.ngcsk_12 !== null) {$('#ngcsk-12').prop('checked', true)}
                    }

    
                }               
  
                // JAM
                $('#collapse-data-catatanperawat').one('click', function() {
                    $('#jampagiicc, #edit-jampagiicc, #jamsoreicc, #edit-jamsoreicc, #jammalamicc, #edit-jammalamicc')
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })

                // Perawat
                $('#collapse-data-catatanperawat').one('click', function() {
                    $('#perawatpagiicc, #edit-perawatpagiicc, #perawatsoreicc, #edit-perawatsoreicc, #perawatmalamicc, #edit-perawatmalamicc')
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

                // CATATANPERAWAT
                if (typeof data.catatan_perawat_icc !== 'undefined' || data.catatan_perawat_icc !== null) {
                    showCatatanPerawatICC(data.catatan_perawat_icc, id_pendaftaran, id_layanan_pendaftaran, action);
                    showCatatanPerawatICCT(nomer);
                } else {
                    $('#tabel-catatanperawat .body-table').empty();
                }

                
                $('#bed-icc').text(bed);
                $('#modal_intensive_care_chart').modal('show');  

                if (action === 'lihat') {
                    // Disable semua input dan textarea, tapi biarkan tombol expand/collapse tetap aktif
                    $('#modal_intensive_care_chart :input')
                        .not('[data-dismiss="modal"], #btn-expand-all-icc, #btn-collapse-all-icc, #btn_cetak_icc')
                        .prop('disabled', true);

                    $('#modal_intensive_care_chart textarea').prop('readonly', true);
                    $('#btn-simpan').hide();

                    // Disable select dan Select2
                    $('#modal_intensive_care_chart select')
                        .not('[data-dismiss="modal"]')
                        .prop('disabled', true)
                        .trigger('change.select2c');

                    $('#modal_intensive_care_chart [id^="s2id_"]').css({
                        'pointer-events': 'none',
                        'opacity': 0.6
                    });
                }

                // DOKTER ICC
                loadDataPemeriksaanOperasi(id_pendaftaran, id_layanan_pendaftaran, action)
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    } 

    // // DOKTER ICC JANAGAN DI HAPUS BUAT JAGA" AJAH INI 
    // function loadDataPemeriksaanOperasi(id_pendaftaran, id_layanan_pendaftaran) {
    //     $('#dokterdpjpicc-hide').empty();
    //     $('#wrapper-dokterdpjp-picc').empty();

    //     $.ajax({
    //         type: 'GET',
    //         url: '<?= base_url("pelayanan/api/pelayanan/get_tim_dokter") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
    //         cache: false,
    //         dataType: 'JSON',
    //         beforeSend: function () {
    //             showLoader();
    //         },
    //         success: function (data) {
    //             $('#id-layanan-pendaftaran-icc').val(id_layanan_pendaftaran);
    //             $('#id-pendaftaran-icc').val(id_pendaftaran);

    //             if (Array.isArray(data.dokter_pdjp)) {
    //                 data.dokter_pdjp.forEach(function (v) {
    //                     if (v.dokterdpjpicc) {
    //                         const html = `
    //                             <div id="dinamic1${v.id}" class="dinamic1 dokterdpjpicc d-flex align-items-center gap-1 mb-1">
    //                                 <input type="text" class="form-control form-control-sm py-1 px-2" style="font-size: 12px; max-width: 220px;" value="${v.dokter_1}" disabled />
    //                                 <button type="button" class="btn btn-danger btn-xs py-1 px-2" style="font-size: 11px;" onclick="hapusDokterBedahDB(${v.id})">
    //                                     <i class="fas fa-trash-alt mr-1"></i>Hapus
    //                                 </button>
    //                             </div>
    //                         `;
    //                         $('#wrapper-dokterdpjp-picc').append(html);
    //                     }
    //                 });
    //             }
    //         },
    //         complete: function () {
    //             hideLoader();
    //         },
    //         error: function (e) {
    //             console.error(e);
    //         }
    //     });
    // }

    // DOKTER ICC ini menyembuyikan tombol hapus saat Klik LIHAT
    function loadDataPemeriksaanOperasi(id_pendaftaran, id_layanan_pendaftaran, action) {
        $('#dokterdpjpicc-hide').empty();
        $('#wrapper-dokterdpjp-picc').empty();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_tim_dokter") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function () {
                showLoader();
            },
            success: function (data) {
                $('#id-layanan-pendaftaran-icc').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-icc').val(id_pendaftaran);

                if (Array.isArray(data.dokter_pdjp)) {
                    data.dokter_pdjp.forEach(function (v) {
                        if (v.dokterdpjpicc) {
                            const html = `
                                <div id="dinamic1${v.id}" class="dinamic1 dokterdpjpicc d-flex align-items-center gap-1 mb-1">
                                    <input type="text" class="form-control form-control-sm py-1 px-2" style="font-size: 12px; max-width: 220px;" value="${v.dokter_1}" disabled />
                                    <button type="button" class="btn btn-danger btn-xs py-1 px-2 btn-hapus-dokter" style="font-size: 11px;" onclick="hapusDokterBedahDB(${v.id})">
                                        <i class="fas fa-trash-alt mr-1"></i>Hapus
                                    </button>
                                </div>
                            `;
                            $('#wrapper-dokterdpjp-picc').append(html);

                            // 🔒 Nonaktifkan tombol hapus kalau dalam mode lihat
                            if (action === 'lihat') {
                                $('#dinamic1' + v.id).find('.btn-hapus-dokter').prop('disabled', true);
                            }
                        }
                    });
                }
            },
            complete: function () {
                hideLoader();
            },
            error: function (e) {
                console.error(e);
            }
        });
    }
 
    // DOKTER ICC
    function tambahDokterBedah() {
        let i = $('.dokterdpjpicc').length;

        let html = `
            <div id="dinamic1${i}" class="dinamic1 nadis" style="vertical-align:middle !important">
                <input type="text" name="dokter_bedah[]" id="dokterdpjpicc${i}" class="dokterdpjpicc mb-2">
                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterBedah(${i})">
                    <i class="fas fa-trash-alt mr-1"></i>Hapus
                </button>
            </div>
        `;

        $('#wrapper-dokterdpjp-picc').append(html);

        $('#dokterdpjpicc' + i).select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) {
                    return { q: term, page: page, jenis: 18 };
                },
                results: function(data, page) {
                    return {
                        results: data.data,
                        more: (page * 20) < data.total
                    };
                }
            },
            formatResult: function(data) {
                return data.nama + '<br/><i>' + data.spesialisasi + '</i>';
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#dokterdpjpicc' + i).on('select2:select', function(e) {
            simpanTimDokterBedah(); // tetap simpan otomatis
        });
    }

    // DOKTER ICC
    function simpanTimDokterBedah() {
        var id_layanan_pendaftaran_icc = $('#id-layanan-pendaftaran-icc').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_tim_dokter_bedah_satuan") ?>',
            data: $('#form_intensive_care_chart').serialize() + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran_icc,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);

                if (data.status) {
                    messageAddSuccess();

                    // ✅ Setelah simpan, langsung reload dokter agar tampilannya terupdate
                    loadDataPemeriksaanOperasi(
                        $('#id-pendaftaran-icc').val(),
                        $('#id-layanan-pendaftaran-icc').val()
                    );
                } else {
                    messageAddFailed();
                }          
            },
            complete: function(data) {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed('Terjadi Kesalahan : ' + e.statusText + ' (' + e.status + ')', 'Error');
            }
         });
    }

    // DOKTER ICC
    function removeDokterBedah(i) {
        $('#dinamic1' + i).remove(); // tanpa reindex
    }

    // DOKTER ICC
    function hapusDokterBedahDB(id_dokter_icc) {
        bootbox.confirm({
            message: "Apakah kamu yakin ingin menghapus dokter ini?",
            buttons: {
                confirm: {
                    label: '<i class="fas fa-check"></i> Ya',
                    className: 'btn-success btn-xs'
                },
                cancel: {
                    label: '<i class="fas fa-times"></i> Batal',
                    className: 'btn-danger btn-xs'
                }
            },
            callback: function(result) {
                if (result) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url("pelayanan/api/pelayanan/hapus_tim_dokter_bedah") ?>',
                        data: {
                            id_dokter_icc: id_dokter_icc,
                            csrf_syam: $('input[name=csrf_syam]').val()
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.status) {
                                messageDeleteSuccess();
                                loadDataPemeriksaanOperasi(
                                    $('#id-pendaftaran-icc').val(),
                                    $('#id-layanan-pendaftaran-icc').val()
                                );
                            } else {
                                messageDeleteFailed();
                            }
                        },
                        error: function() {
                            messageDeleteFailed('Gagal menghapus data dari.');
                        }
                    });
                }
            }
        });
    }

    function konfirmasiCetakFormintensiveCareChart(id_pendaftaran, id_layanan_pendaftaran){
        window.open('<?= base_url('pendaftaran_igd/cetak_form_intensive_care_chart/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran,
        'CETAK FORM INTENSIVE CARE CHART ICU/HCU/NICU/PICU', 'width=' + dWidth + ', height=' +
        dHeight +
        ', left=' + x + ', top=' + y);
    }

    // CATATANPERAWAT
    function resetFormICC() {
        $('#form_intensive_care_chart')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
        $('#wrapper-dokterdpjp-picc').empty();       // Tambahan untuk aman
        $('#dokterdpjpicc-hide').empty();            // Tambahan juga
        $('#buka-tutup-catatanperawat').empty();
    }

    function konfirmasiSimpanFormintensiveCareChart() {
        var stop = false;

        if (!stop) {
            var id_icc = $('#id-icc').val();
            var text;
            var btnTextConfirmicc;

            if (id_icc) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmicc = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmicc = 'Simpan';
            }

            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmicc,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanFormintensiveCareChart();
                }
            });
        }
    }

    function simpanFormintensiveCareChart() {
        var id_layanan_pendaftaran_icc = $('#id-layanan-pendaftaran-icc').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_intensive_care_chart") ?>',
            data: $('#form_intensive_care_chart').serialize() + '&id-layanan-pendaftaran-icc=' + id_layanan_pendaftaran_icc,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-icc').bwizard('show', data.respon.show);

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
                        $('#modal_intensive_care_chart').modal('hide');
                        showListForm($('#id-pendaftaran-icc').val(), $('#id-layanan-pendaftaran-icc').val(), $('#id-pasien-icc').val());
                    } else {
                        messageAddFailed();
                    }
                }
            },


            // complete: function() {
            //     hideLoader();
            // },
            // error: function(e) {
            //     messageAddFailed();
            // }


            complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				// messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
				messageAddFailed('Terjadi Kesalahan : '+ e.statusText +' ('+e.status+')', 'Error');
			}
        });
    }

    // CATATANPERAWAT
    function showCatatanPerawatICCT(num) {
        let html = bukaLebar('Form Catatan Keperawatan ', num);
        html += /* html */ `
            <div class="from-group">
            </div>
            <hr>
            <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                <thead>
                    <tr>
                        <td colspan="12"><b></b>
                    </tr>
                    <tr>
                        <td class="center" style="background-color: #B0E0E6; color: black;"><b>JAM</td>
                        <td class="center" style="background-color: #B0E0E6; color: black;"><b>DINAS PAGI</td>
                        <td class="center" style="background-color: #B0E0E6; color: black;"><b>PARAF</td>
                        <td class="center" style="background-color: #B0E0E6; color: black;"><b>JAM</td>
                        <td class="center" style="background-color: #B0E0E6; color: black;"><b>DINAS SORE</td>
                        <td class="center" style="background-color: #B0E0E6; color: black;"><b>PARAF</td>
                        <td class="center" style="background-color: #B0E0E6; color: black;"><b>JAM</td>
                        <td class="center" style="background-color: #B0E0E6; color: black;"><b>DINAS MALAM</td>
                        <td class="center" style="background-color: #B0E0E6; color: black;"><b>PARAF</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="5%"> <input type="text" name="jampagiicc" id="jampagiicc"class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><textarea name="dinaspagiicc" id="dinaspagiicc" cols="30" rows="10" class="form-control clear-input custom-textarea"></textarea></td> 
                        <td class="center"><input type="checkbox" name="parafpagiicc" id="parafpagiicc" value="1"></td>

                        <td width="5%"> <input type="text" name="jamsoreicc" id="jamsoreicc"class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><textarea name="dinassoreicc" id="dinassoreicc" cols="30" rows="10" class="form-control clear-input custom-textarea"></textarea></td> 
                         <td class="center"><input type="checkbox" name="parafsoreicc" id="parafsoreicc" value="1"></td>

                        <td width="5%"> <input type="text" name="jammalamicc" id="jammalamicc"class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><textarea name="dinasmalamicc" id="dinasmalamicc" cols="30" rows="10" class="form-control clear-input custom-textarea"></textarea></td> 
                        <td class="center"><input type="checkbox" name="parafmalamicc" id="parafmalamicc" value="1"></td>
                    </tr>
                </tbody>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                    <tr>
                        <td>Perawat Pagi</td>
                        <td><input type="text" name="perawatpagiicc" id="perawatpagiicc" class="select2c-input ml-2"></td>
                        <td>Perawat Sore</td>
                        <td><input type="text" name="perawatsoreicc" id="perawatsoreicc" class="select2c-input ml-2"></td>
                        <td>Perawat Malam</td>
                        <td><input type="text" name="perawatmalamicc" id="perawatmalamicc" class="select2c-input ml-2"></td>
                    </tr>
                </table>
                <tr>
                    <td colspan="12">
                        <button type="button" title="Tambah Catatan Keperawatan" class="btn btn-info" onclick="tambahCatatanKeperawatanIcc()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Catatan Keperawatan</button>
                    </td>
                </tr>
                <table class="table table-no-border table-sm table-striped">
                    <tbody>
                        <tr>
                            <td colspan="8" style="text-align: right;">
                                <p class="page__number" style="margin: 0;">HARAP DI PERHATIKAN <span style="font-weight: bold; color: red;">SEBELUM *KONFIRMASI* KLIK *TAMBAH CATATAN KEPERAWATAN* TERLEBIH DAHULU..!!!</span></p>
                            </td>
                        </tr>
                    </tbody>                      
                </table> 
            </table>`;              
        html += tutupRapet();
        $('#buka-tutup-catatanperawat').append(html);
    }

    // CATATANPERAWAT
    function showCatatanPerawatICC(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-catatanperawat .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp =
                '<td align="center"><button type="button" class="btn btn-secondary btn-xs"onclick="editCatatanPerawatICC(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                '\')"><i class="fas fa-edit" ></i> </button> <button type="button" class="btn btn-secondary btn-xs"onclick="hapusCatatanPerawatICC($(this),' + v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';                         
                let html = /* html */ `                 
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">${v.jampagiicc || '-'}</td>                                       
                        <td class="center">${v.parafpagiicc == '1' ? '&check;' : '-'}</td>
                        <td align="center">${v.nama_perawat_pagi || '-'}</td>                            
                        <td align="center">${v.jamsoreicc || '-'}</td>                       
                        <td class="center">${v.parafsoreicc == '1' ? '&check;' : '-'}</td>
                        <td align="center">${v.nama_perawat_sore || '-'}</td>                            
                        <td align="center">${v.jammalamicc || '-'}</td>                       
                        <td class="center">${v.parafmalamicc == '1' ? '&check;' : '-'}</td>          
                        <td align="center">${v.nama_perawat_malam || '-'}</td>                            
                        <td align="center"></td>
                        ${selOp}
                    </tr>                   
                `;               
                $('#tabel-catatanperawat .body-table').append(html);
                numberICC = i;
            })
        }
    }
    // <td align="center">${v.akun_user}</td>

    // CATATANPERAWAT
    if (typeof numberICC === 'undefined') {
        var numberICC = 1;
    }

    // CATATANPERAWAT
    function tambahCatatanKeperawatanIcc() {
        let html = '';
        let jampagiicc = $('#jampagiicc').val();   
        let dinaspagiicc = $('#dinaspagiicc').val();   
        let parafpagiicc = $('#parafpagiicc').is(':checked');
        let nama_perawat_pagi = $('#s2id_perawatpagiicc a .select2c-chosen').html();
        let perawatpagiicc = $('#perawatpagiicc').val();

        let jamsoreicc = $('#jamsoreicc').val();   
        let dinassoreicc = $('#dinassoreicc').val();   
        let parafsoreicc = $('#parafsoreicc').is(':checked');
        let nama_perawat_sore = $('#s2id_perawatsoreicc a .select2c-chosen').html();
        let perawatsoreicc = $('#perawatsoreicc').val();

        let jammalamicc = $('#jammalamicc').val();   
        let dinasmalamicc = $('#dinasmalamicc').val();   
        let parafmalamicc = $('#parafmalamicc').is(':checked');
        let nama_perawat_malam = $('#s2id_perawatmalamicc a .select2c-chosen').html();
        let perawatmalamicc = $('#perawatmalamicc').val();

        html = /* html */ `
             <tr class="row-in-${++numberICC}">
                <td class="number-pengkajian" align="center">${numberICC++}</td>
                <td align="center">
                    <input type="hidden" name="jampagiicc[]" value="${jampagiicc}">${jampagiicc}
                </td>
                <td align="center">
                    <input class="mr-1" type="hidden" name="parafpagiicc[]" value="${parafpagiicc ? 1 : 0}">${parafpagiicc ? '&check;' : '-'}
                </td>
                <td align="center">
                    <input type="hidden" name="perawatpagiicc[]" value="${perawatpagiicc}">${nama_perawat_pagi}
                </td>            
                <td align="center">
                    <input type="hidden" name="jamsoreicc[]" value="${jamsoreicc}">${jamsoreicc}
                </td>
                <td align="center">
                    <input class="mr-1" type="hidden" name="parafsoreicc[]" value="${parafsoreicc ? 1 : 0}">${parafsoreicc ? '&check;' : '-'}
                </td>
                <td align="center">
                    <input type="hidden" name="perawatsoreicc[]" value="${perawatsoreicc}">${nama_perawat_sore}
                </td> 
                <td align="center">
                    <input type="hidden" name="jammalamicc[]" value="${jammalamicc}">${jammalamicc}
                </td>
                <td align="center">
                    <input class="mr-1" type="hidden" name="parafmalamicc[]" value="${parafmalamicc ? 1 : 0}">${parafmalamicc ? '&check;' : '-'}
                </td>          
                <td align="center">
                    <input type="hidden" name="perawatmalamicc[]" value="${perawatmalamicc}">${nama_perawat_malam}
                </td> 
                <td align="center">
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pencegahan_date_icc[]" value="<?= date("Y-m-d H:i:s") ?>"> 
                    <input type="hidden" name="dinaspagiicc[]" value="${dinaspagiicc}">                                  
                    <input type="hidden" name="dinassoreicc[]" value="${dinassoreicc}">                                  
                    <input type="hidden" name="dinasmalamicc[]" value="${dinasmalamicc}">                                                                                                                  
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-catatanperawat .body-table').append(html);
    }
    // <!?= $this->session->userdata('nama') ?>

    // CATATANPERAWAT
    function editCatatanPerawatICC(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-catatanperawat');
        $('#update-catatanperawat').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_edit_catatanperawatIcc") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-catatanperawat').empty();
                $('#id-catatanperawat').val(id);

                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-catatanperawat').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateCatatanPerawatICC(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-catatanperawat').append(cttntndkn);

                $('#edit-jampagiicc').val(data.jampagiicc);
                $('#edit-dinaspagiicc').val(data.dinaspagiicc);
                data.parafpagiicc == '1' ? $('#edit-parafpagiicc').prop('checked', true) : $('#edit-parafpagiicc').prop('checked', false); 
                $('#s2id_edit-perawatpagiicc a .select2c-chosen').html(data.nama_perawat_pagi);
                $('#edit-perawatpagiicc').val(data.perawatpagiicc);

                $('#edit-jamsoreicc').val(data.jamsoreicc);
                $('#edit-dinassoreicc').val(data.dinassoreicc);
                data.parafsoreicc == '1' ? $('#edit-parafsoreicc').prop('checked', true) : $('#edit-parafsoreicc').prop('checked', false); 
                $('#s2id_edit-perawatsoreicc a .select2c-chosen').html(data.nama_perawat_sore);
                $('#edit-perawatsoreicc').val(data.perawatsoreicc);

                $('#edit-jammalamicc').val(data.jammalamicc);
                $('#edit-dinasmalamicc').val(data.dinasmalamicc);
                data.parafmalamicc == '1' ? $('#edit-parafmalamicc').prop('checked', true) : $('#edit-parafmalamicc').prop('checked', false); 
                $('#s2id_edit-perawatmalamicc a .select2c-chosen').html(data.nama_perawat_malam);
                $('#edit-perawatmalamicc').val(data.perawatmalamicc);

                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // CATATANPERAWAT
    function updateCatatanPerawatICC(id_pendaftaran, id_layanan_pendaftaran, bed) {
        // Ambil ID user dari input hidden
        const id_user = $('#id-user').val();

        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_catatanperawatIcc") ?>',
            data: $('#form-edit-catatanperawatIcc').serialize() + '&id_user=' + id_user, // tetap kirim juga kalau butuh
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log('User yang update:', id_user); // debug

                if (data.status) {
                    messageEditSuccess();
                    entriFormIcc(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-catatanperawat').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // CATATANPERAWAT
    function hapusCatatanPerawatICC(obj, id) {
        const id_user = $('#id-user').val();
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_catatanperawatIcc") ?>/' + id,
                            data: { id_user: id_user }, // kirim id_user
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                            console.log('User yang hapus:', id_user); // debug

                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.closest('tr').remove();
                                } else {
                                    customAlert('Hapus Data', data.message);
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

</script>