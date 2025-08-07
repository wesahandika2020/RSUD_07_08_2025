<!-- // TPI -->
<script>   
    $('#btn_expand_all_tpi').click(function() {
        $('.multi-collapse').addClass('show');
    });

    $('#btn_collapse_all_tpi').click(function() {
        $('.multi-collapse').removeClass('show');
    });


    $('#nephrologist-consultant').select2c({
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


    // NAMA OBAT
    $('#nama-medication-1,#nama-medication-2,#nama-medication-3,#nama-medication-4,#nama-medication-5,#nama-medication-6,#nama-medication-7,#nama-medication-8,#nama-medication-9,#nama-medication-10,#nama-medication-11,#nama-medication-12,#nama-medication-13,#nama-medication-14,#nama-medication-15').select2c({
        minimumInputLength: 2,
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/obat_untuk_keperawatan') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term,
                page) { // page is the one-based page number tracked by Select2

                return {
                    q: term, //search term
                    page: page // page number
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
            var markup = data.nama;

            return markup;
        },
        formatSelection: function(data) {
            return data.nama;
        }
    });



    function lihatFORM_KEP_35_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        window.open('<?= base_url('pendaftaran_igd/cetak_travelling_patient_information/') ?>' + layanan.id, 'Cetak Travelling Patient Information', 'width=' + dWidth + ', height=' +
        dHeight + ', left=' + x + ', top=' + y);

    }

    function editFORM_KEP_35_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        cetakFormTpi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_35_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        cetakFormTpi(layanan.id_pendaftaran, layanan.id, bed, action);
    }


    // function cetakFormTpi(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

    //     // $('#modal_travelling_patient_information').modal('show');
    
    //     $('#btn-simpan').hide();
    //     var groupAccount = '<?= $this->session->userdata('account_group') ?>';
    //     if (action !== 'lihat') {
    //         $('#btn-simpan').show();
    //     } else {
    //         $('#btn-simpan').hide();
    //     }

    //     $('#id-layanan-pendaftaran-tpi').val(id_layanan_pendaftaran);
    //     $('#id-pendaftaran-tpi').val(id_pendaftaran);

    //     $.ajax({
    //         type: 'GET',
    //         url: '<?= base_url("pelayanan/api/pelayanan/get_data_travelling_patient_information") ?>/id/' + id_pendaftaran +
    //             '/id_layanan/' + id_layanan_pendaftaran,

    //         cache: false,
    //         dataType: 'JSON',
    //         beforeSend: function() {
    //             showLoader();
    //         },
    //         // harap di perhatikan dilihat dengan teliti liatt data atau response yang ada disini
    //         success: function(response) {
    //             console.log(response);
    //             $('#modal_travelling_patient_information').modal('show');
    //             const data = response.travelling_patient_information.data
    //             const pasien = response.travelling_patient_information.pendaftaran.pasien
    //             const penanggung_jawab = response.travelling_patient_information.penanggung_jawab 
    //             resetFormtpi(); 
    //             $('#id-pasien-tpi').val(pasien.id);  
    //             $('#name').val(pasien.nama).prop('readOnly', true);
    //             // $('#date-of-birth').val(pasien.tanggal_lahir).prop('readOnly', true);
    //             $('#date-of-birth').text((pasien.tanggal_lahir !== null ? datefmysql(pasien.tanggal_lahir) : '-') +  ' (' + hitungUmur(pasien.tanggal_lahir) + ')');
    //             $('#home-address').val(pasien.alamat).prop('readOnly', true);

    //             $('#dialysis').val(data?.dialysis); 
    //             $('#duration').val(data?.duration); 
    //             $('#dialisat').val(data?.dialisat); 
    //             $('#dry-weight').val(data?.dry_weight); 
    //             $('#acces-vascular').val(data?.acces_vascular); 
    //             $('#average-weight').val(data?.average_weight); 
    //             $('#average-blood-pre').val(data?.average_blood_pre); 
    //             $('#average-blood-post').val(data?.average_blood_post); 
    //             $('#dialyser-type').val(data?.dialyser_type); 
    //             $('#blood-flow').val(data?.blood_flow); 
    //             $('#heparinitation').val(data?.heparinitation); 
    //             $('#loading-dose').val(data?.loading_dose); 
    //             $('#maintenance-dose').val(data?.maintenance_dose); 
    //             $('#blood-group').val(data?.blood_group); 
    //             $('#blood-tranfusion').val(data?.blood_tranfusion); 
    //             $('#date-of-laboratorium').val(data?.date_of_laboratorium); 
    //             $('#hb-ereum-pre').val(data?.hb_ereum_pre); 
    //             $('#hb-ureum-post').val(data?.hb_ureum_post); 
    //             $('#cratine-pre').val(data?.cratine_pre); 
    //             $('#kalium').val(data?.kalium); 
    //             $('#phospor').val(data?.phospor); 
    //             $('#hbsag').val(data?.hbsag); 
    //             $('#anti-hcv').val(data?.anti_hcv); 
    //             $('#anti-hiv').val(data?.anti_hiv); 
    //             $('#problem-during').val(data?.problem_during); 
    //             $('#tanggal-tpi').val(data?.tanggal_tpi); 
    //             $('#nephrologist-consultant').val(data?.nephrologist_consultant);
    //             $('#s2id_nephrologist-consultant a .select2c-chosen').html(data?.dokter);

    //             // // NARIK DATA 2
    //             // // Gabungkan dan urutkan response diagnosis
    //             // const allDiagnoses = [...(response?.diagnosa || []), ...(response?.diagnosa_ruang_lain || [])]
    //             //     .sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran);

    //             // // Ambil semua golongan_sebab_sakit dan gabungkan dengan <br> sebagai pemisah
    //             // const allDiagnosisContent = allDiagnoses.map(diag => diag.golongan_sebab_sakit).join('<br>');

    //             // // Tampilkan data di elemen HTML dengan ID 'diagnosis'
    //             // $('#diagnosis').html(allDiagnosisContent);

    //             // NARIK DATA 1
    //             const semuaDiagnosa = [...(response?.diagnosa || [])]
    //                 .sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran);

    //             // Ambil semua golongan_sebab_sakit dan gabungkan dengan <br> sebagai pemisah
    //             const semuaIsiDiagnosa = semuaDiagnosa.map(diag => diag.golongan_sebab_sakit).join('<br>');

    //             // Tampilkan data di elemen HTML dengan ID 'diagnosis'
    //             $('#diagnosis').html(semuaIsiDiagnosa);

    //             // console.log("Data TPI:", response?.resep_tpi.data);
    //             // NARIK DATA yg njrin bg.why
    //             $('#table-data-resep-tpi tbody').empty();  
    //             $.each(response?.resep_tpi.data, function(i, v) {
	// 				html = /* html */ `
    //                     <tr>
    //                         <td class="center">${(i + 1)}</td>
    //                         <td>${v.nama_barang}</td>                         
    //                         <td class="center">${v.dosis_racik}</td>                          
    //                         <td class="center">${v.jumlah}</td>
    //                     </tr>
    //                 `;
	// 				$('#table-data-resep-tpi tbody').append(html);
	// 			});                 
    //         },

    //         complete: function() {
    //             hideLoader();
    //         },
    //         error: function(e) {
    //             accessFailed(e.status);
    //         }
    //     });
    // }

    // TPI BARU
    function cetakFormTpi(id_pendaftaran, id_layanan_pendaftaran, bed, action) {  
        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }    

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_travelling_patient_information") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetFormtpi(); 

                $('#id-layanan-pendaftaran-tpi').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-tpi').val(id_pendaftaran);

                // if (data.pasien !== null) {
                //     $('#id-pasien-tpi').val(data.pasien.id_pasien);
                //     $('#nama-pasien-tpi').text(data.pasien.nama);
                //     $('#norm-pasien-tpi').text(data.pasien.no_rm);
                //     $('#ttl-pasien-tpi').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                //     $('#jk-pasien-tpi').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                // }

                if (data.pasien !== null) {
                    $('#id-pasien-tpi').val(data.pasien.id);  
                    $('#name').val(data.pasien.nama).prop('readOnly', true);
                    $('#date-of-birth').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') +  ' (' + hitungUmur(data.pasien.tanggal_lahir) + ')');
                    $('#home-address').val(data.pasien.alamat).prop('readOnly', true);
                }


                let travelling_patient_information = data.travelling_patient_information;
                    if (data.travelling_patient_information !== null) {  
                        $('#id-pasien-tpi').val(data.travelling_patient_information.id);
                        $('#dialysis').val(data.travelling_patient_information.dialysis); 
                        $('#duration').val(data.travelling_patient_information.duration); 
                        $('#dialisat').val(data.travelling_patient_information.dialisat); 
                        $('#dry-weight').val(data.travelling_patient_information.dry_weight); 
                        $('#acces-vascular').val(data.travelling_patient_information.acces_vascular); 
                        $('#average-weight').val(data.travelling_patient_information.average_weight); 
                        $('#average-blood-pre').val(data.travelling_patient_information.average_blood_pre); 
                        $('#average-blood-post').val(data.travelling_patient_information.average_blood_post); 
                        $('#dialyser-type').val(data.travelling_patient_information.dialyser_type); 
                        $('#blood-flow').val(data.travelling_patient_information.blood_flow); 
                        $('#heparinitation').val(data.travelling_patient_information.heparinitation); 
                        $('#loading-dose').val(data.travelling_patient_information.loading_dose); 
                        $('#maintenance-dose').val(data.travelling_patient_information.maintenance_dose); 
                        $('#blood-group').val(data.travelling_patient_information.blood_group); 
                        $('#blood-tranfusion').val(data.travelling_patient_information.blood_tranfusion); 
                        $('#date-of-laboratorium').val(data.travelling_patient_information.date_of_laboratorium); 
                        $('#hb-ereum-pre').val(data.travelling_patient_information.hb_ereum_pre); 
                        $('#hb-ureum-post').val(data.travelling_patient_information.hb_ureum_post); 
                        $('#cratine-pre').val(data.travelling_patient_information.cratine_pre); 
                        $('#kalium').val(data.travelling_patient_information.kalium); 
                        $('#phospor').val(data.travelling_patient_information.phospor); 
                        $('#hbsag').val(data.travelling_patient_information.hbsag); 
                        $('#anti-hcv').val(data.travelling_patient_information.anti_hcv); 
                        $('#anti-hiv').val(data.travelling_patient_information.anti_hiv); 
                        $('#problem-during').val(data.travelling_patient_information.problem_during); 
                        $('#tanggal-tpi').val(data.travelling_patient_information.tanggal_tpi); 
                        $('#nephrologist-consultant').val(data.travelling_patient_information.nephrologist_consultant);
                        $('#s2id_nephrologist-consultant a .select2c-chosen').html(data.travelling_patient_information.dokter);                          
                        
                        // BATAS OBAT  

                        $('#nama-medication-1').val(data.travelling_patient_information.nama_medication_1);
                        $('#s2id_nama-medication-1 a .select2c-chosen').html(data.travelling_patient_information.obat_1);
                        $('#nama-medication-2').val(data.travelling_patient_information.nama_medication_2);
                        $('#s2id_nama-medication-2 a .select2c-chosen').html(data.travelling_patient_information.obat_2);
                        $('#nama-medication-3').val(data.travelling_patient_information.nama_medication_3);
                        $('#s2id_nama-medication-3 a .select2c-chosen').html(data.travelling_patient_information.obat_3);
                        $('#nama-medication-4').val(data.travelling_patient_information.nama_medication_4);
                        $('#s2id_nama-medication-4 a .select2c-chosen').html(data.travelling_patient_information.obat_4);
                        $('#nama-medication-5').val(data.travelling_patient_information.nama_medication_5);
                        $('#s2id_nama-medication-5 a .select2c-chosen').html(data.travelling_patient_information.obat_5);
                        $('#nama-medication-6').val(data.travelling_patient_information.nama_medication_6);
                        $('#s2id_nama-medication-6 a .select2c-chosen').html(data.travelling_patient_information.obat_6);
                        $('#nama-medication-7').val(data.travelling_patient_information.nama_medication_7);
                        $('#s2id_nama-medication-7 a .select2c-chosen').html(data.travelling_patient_information.obat_7);
                        $('#nama-medication-8').val(data.travelling_patient_information.nama_medication_8);
                        $('#s2id_nama-medication-8 a .select2c-chosen').html(data.travelling_patient_information.obat_8);
                        $('#nama-medication-9').val(data.travelling_patient_information.nama_medication_9);
                        $('#s2id_nama-medication-9 a .select2c-chosen').html(data.travelling_patient_information.obat_9);
                        $('#nama-medication-10').val(data.travelling_patient_information.nama_medication_10);
                        $('#s2id_nama-medication-10 a .select2c-chosen').html(data.travelling_patient_information.obat_10);
                        $('#nama-medication-11').val(data.travelling_patient_information.nama_medication_11);
                        $('#s2id_nama-medication-11 a .select2c-chosen').html(data.travelling_patient_information.obat_11);
                        $('#nama-medication-12').val(data.travelling_patient_information.nama_medication_12);
                        $('#s2id_nama-medication-12 a .select2c-chosen').html(data.travelling_patient_information.obat_12);
                        $('#nama-medication-13').val(data.travelling_patient_information.nama_medication_13);
                        $('#s2id_nama-medication-13 a .select2c-chosen').html(data.travelling_patient_information.obat_13);
                        $('#nama-medication-14').val(data.travelling_patient_information.nama_medication_14);
                        $('#s2id_nama-medication-14 a .select2c-chosen').html(data.travelling_patient_information.obat_14);
                        $('#nama-medication-15').val(data.travelling_patient_information.nama_medication_15);
                        $('#s2id_nama-medication-15 a .select2c-chosen').html(data.travelling_patient_information.obat_15);
                        $('#dosis-1').val(data.travelling_patient_information.dosis_1); 
                        $('#dosis-2').val(data.travelling_patient_information.dosis_2); 
                        $('#dosis-3').val(data.travelling_patient_information.dosis_3); 
                        $('#dosis-4').val(data.travelling_patient_information.dosis_4); 
                        $('#dosis-5').val(data.travelling_patient_information.dosis_5); 
                        $('#dosis-6').val(data.travelling_patient_information.dosis_6); 
                        $('#dosis-7').val(data.travelling_patient_information.dosis_7); 
                        $('#dosis-8').val(data.travelling_patient_information.dosis_8); 
                        $('#dosis-9').val(data.travelling_patient_information.dosis_9); 
                        $('#dosis-10').val(data.travelling_patient_information.dosis_10); 
                        $('#dosis-11').val(data.travelling_patient_information.dosis_11); 
                        $('#dosis-12').val(data.travelling_patient_information.dosis_12); 
                        $('#dosis-13').val(data.travelling_patient_information.dosis_13); 
                        $('#dosis-14').val(data.travelling_patient_information.dosis_14); 
                        $('#dosis-15').val(data.travelling_patient_information.dosis_15); 

                    }   

                // NARIK DATA 1
                const semuaDiagnosa = [...(data.diagnosa || [])]
                    .sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran);

                // Ambil semua golongan_sebab_sakit dan gabungkan dengan <br> sebagai pemisah
                const semuaIsiDiagnosa = semuaDiagnosa.map(diag => diag.golongan_sebab_sakit).join('<br>');

                // Tampilkan data di elemen HTML dengan ID 'diagnosis'
                $('#diagnosis').html(semuaIsiDiagnosa);

                // console.log("Data TPI:", data.resep_tpi.data);
                // NARIK DATA yg njrin bg.why  YANG INI UNTUK RESEP
                // $('#table-data-resep-tpi tbody').empty();  
                // $.each(data.resep_tpi.data, function(i, v) {
				// 	html = /* html */ `
                //         <tr>
                //             <td class="center">${(i + 1)}</td>
                //             <td>${v.nama_barang}</td>                         
                //             <td class="center">${v.dosis_racik}</td>                          
                //             <td class="center">${v.jumlah}</td>
                //         </tr>
                //     `;
				// 	$('#table-data-resep-tpi tbody').append(html);
				// });  

                // $.each(data.bhp, function(i, v) {
				// 	html = /* html */ `
                //         <tr>
                //             <td class="center">${(i + 1)}</td>
                //             <td>${v.nama_barang}</td>                                              
                //             <td class="center">${v.qty}</td>
                //         </tr>
                //     `;
				// 	$('#table-data-resep-tpi tbody').append(html);
				// });   
                
                $('#modal_travelling_patient_information').modal('show');
                
            },


            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }
 
    function resetFormtpi() {
        $('#form_travelling_patient_information')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);             
    }

    function CetakSuratTravelling() {
        if ($('#date-of-laboratorium').val() === '') {
            syams_validation('#date-of-laboratorium', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#date-of-laboratorium');
        }

        if ($('#tanggal-tpi').val() === '') {
            syams_validation('#tanggal-tpi', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-tpi');
        }

        if ($('#nephrologist-consultant').val() === '') {
            syams_validation('#nephrologist-consultant', 'Nama Dokter Belum di Pilih.....!');
            return false;
        } else {
            syams_validation_remove('#nephrologist-consultant');
        }

        const id = $('#id-layanan-pendaftaran-tpi').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_cetak_travelling_patient_information') ?>',
            data: $('#form_travelling_patient_information').serialize(),
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
                    window.open('<?= base_url('pendaftaran_igd/cetak_travelling_patient_information/') ?>' + id, 'Cetak Travelling Patient Information', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);
                    showListForm($('#id-pendaftaran-tpi').val(), $('#id-layanan-pendaftaran-tpi').val(), $('#id-pasien-tpi').val());
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
 
</script>