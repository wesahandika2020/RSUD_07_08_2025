<script>
    var nomer = 1;
    $(function() {
        nomer++;     
        $("#wizard-rekam-medis").bwizard();

        // PDIRJRJ
        $('#perawat-pdirjrj-1, #perawat-pdirjrj-2, #perawat-pdirjrj-3')
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

    // PDIRJRJ
    function entriFormRekamMedis(details, id_pasien, data_page, layanan) {
        // console.log(12345);
        // $('#modal_form_rekam_medis_rajal').modal('show');          
        // $('#wizard_form_resume').bwizard('show', '0');
        let detail = details.split('#');
        $('#efrm-id-layanan-pendaftaran').val(detail[0]);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pemeriksaan_poli/api/pemeriksaan_poli/get_data_entri_rekam_medis') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
				resetFormEntriRekamMedis();

                if (data.pasien !== null) {
                    $('#rm-nama-pasien').text(data.pasien.nama);
                    $('#no-rm').text(data.pasien.id);
                    $('#rm-tanggal-lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#rm-jenis-kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // PDIRJRJ 
                let pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan = data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan;

                if (pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan !== null) {
                    $('#id-efrm').val(pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.id); 
                    $('#id-users').val(data.id_users);
                    const pengkajian_pdirjrj = JSON.parse(data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.pengkajian_pdirjrj); 
                    if (pengkajian_pdirjrj.pengkajian_pdirjrj_1 !== null) { $('#pengkajian-pdirjrj-1').prop('checked', true) }
                    if (pengkajian_pdirjrj.pengkajian_pdirjrj_2 === '1') {$('#pengkajian-pdirjrj-2').prop('checked', true).change()  }
                    if (pengkajian_pdirjrj.pengkajian_pdirjrj_2 === '0') {$('#pengkajian-pdirjrj-3').prop('checked', true).change () }
                    if (pengkajian_pdirjrj.pengkajian_pdirjrj_4 !== null) { $('#pengkajian-pdirjrj-4').prop('checked', true) }
                    if (pengkajian_pdirjrj.pengkajian_pdirjrj_5 === '1') {$('#pengkajian-pdirjrj-5').prop('checked', true).change()  }
                    if (pengkajian_pdirjrj.pengkajian_pdirjrj_5 === '0') {$('#pengkajian-pdirjrj-6').prop('checked', true).change () }
                    if (pengkajian_pdirjrj.pengkajian_pdirjrj_7 !== null) { $('#pengkajian-pdirjrj-7').prop('checked', true) }
                    if (pengkajian_pdirjrj.pengkajian_pdirjrj_8 === '1') {$('#pengkajian-pdirjrj-8').prop('checked', true).change()  }
                    if (pengkajian_pdirjrj.pengkajian_pdirjrj_8 === '0') {$('#pengkajian-pdirjrj-9').prop('checked', true).change () }

                    const hasil_pdirjrj = JSON.parse(data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.hasil_pdirjrj);
                    if (hasil_pdirjrj.hasil_pdirjrj_1 !== null) { $('#hasil-pdirjrj-1').prop('checked', true) }
                    if (hasil_pdirjrj.hasil_pdirjrj_2 !== null) { $('#hasil-pdirjrj-2').prop('checked', true) }
                    if (hasil_pdirjrj.hasil_pdirjrj_3 !== null) {$('#hasil-pdirjrj-3').val(hasil_pdirjrj.hasil_pdirjrj_3);}
                    if (hasil_pdirjrj.hasil_pdirjrj_4 !== null) { $('#hasil-pdirjrj-4').prop('checked', true) }
                    if (hasil_pdirjrj.hasil_pdirjrj_5 !== null) { $('#hasil-pdirjrj-5').prop('checked', true) }
                    if (hasil_pdirjrj.hasil_pdirjrj_6 !== null) {$('#hasil-pdirjrj-6').val(hasil_pdirjrj.hasil_pdirjrj_6);}
                    if (hasil_pdirjrj.hasil_pdirjrj_7 !== null) { $('#hasil-pdirjrj-7').prop('checked', true) }
                    if (hasil_pdirjrj.hasil_pdirjrj_8 !== null) { $('#hasil-pdirjrj-8').prop('checked', true) }
                    if (hasil_pdirjrj.hasil_pdirjrj_9 !== null) {$('#hasil-pdirjrj-9').val(hasil_pdirjrj.hasil_pdirjrj_9);}

                    const intervensi_pdirjrj = JSON.parse(data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.intervensi_pdirjrj);
                    if (intervensi_pdirjrj.intervensi_pdirjrj_1 !== null) { $('#intervensi-pdirjrj-1').prop('checked', true) }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_2 !== null) { $('#intervensi-pdirjrj-2').prop('checked', true) }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_3 === '1') {$('#intervensi-pdirjrj-3').prop('checked', true).change()  }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_3 === '0') {$('#intervensi-pdirjrj-4').prop('checked', true).change () }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_5 !== null) { $('#intervensi-pdirjrj-5').prop('checked', true) }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_6 !== null) { $('#intervensi-pdirjrj-6').prop('checked', true) }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_7 === '1') {$('#intervensi-pdirjrj-7').prop('checked', true).change()  }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_7 === '0') {$('#intervensi-pdirjrj-8').prop('checked', true).change () }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_9 !== null) { $('#intervensi-pdirjrj-9').prop('checked', true) }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_10 !== null) { $('#intervensi-pdirjrj-10').prop('checked', true) }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_11 === '1') {$('#intervensi-pdirjrj-11').prop('checked', true).change()  }
                    if (intervensi_pdirjrj.intervensi_pdirjrj_11 === '0') {$('#intervensi-pdirjrj-12').prop('checked', true).change () }
    
                    $('#perawat-pdirjrj-1').val(data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.perawat_pdirjrj_1);
                    $('#s2id_perawat-pdirjrj-1 a .select2c-chosen').html(data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.nama_perawat_1);
                    $('#perawat-pdirjrj-2').val(data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.perawat_pdirjrj_2);
                    $('#s2id_perawat-pdirjrj-2 a .select2c-chosen').html(data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.nama_perawat_2);
                    $('#perawat-pdirjrj-3').val(data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.perawat_pdirjrj_3);
                    $('#s2id_perawat-pdirjrj-3 a .select2c-chosen').html(data.pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan.nama_perawat_3);

                }           
                $('#rm-poli').text(layanan);
                // console.log(v.ruang_ri);
                $('#modal_form_rekam_medis_rajal').modal('show');        
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function resetFormEntriRekamMedis() {
        $('#wizard-rekam-medis').bwizard('show', '0');
        // perawat
        $('#perawat-pdirjrj-1, #perawat-pdirjrj-2, #perawat-pdirjrj-3')
            .val('');
         // s2id perawat
        $('#s2id_perawat-pdirjrj-1 a .select2c-chosen, #s2id_perawat-pdirjrj-2 a .select2c-chosen, #s2id_perawat-pdirjrj-3 a .select2c-chosen')
            .empty();

        // text
        $('#hasil-pdirjrj-3, #hasil-pdirjrj-6, #hasil-pdirjrj-9')
        .val('');

        $('#pengkajian-pdirjrj-1, #pengkajian-pdirjrj-2, #pengkajian-pdirjrj-3, #pengkajian-pdirjrj-4, #pengkajian-pdirjrj-5, #pengkajian-pdirjrj-6, #pengkajian-pdirjrj-7, #pengkajian-pdirjrj-8, #pengkajian-pdirjrj-9, #hasil-pdirjrj-1, #hasil-pdirjrj-2, #hasil-pdirjrj-4, #hasil-pdirjrj-5, #hasil-pdirjrj-7, #hasil-pdirjrj-8, #intervensi-pdirjrj-1, #intervensi-pdirjrj-2, #intervensi-pdirjrj-3, #intervensi-pdirjrj-4, #intervensi-pdirjrj-5, #intervensi-pdirjrj-6, #intervensi-pdirjrj-7, #intervensi-pdirjrj-8, #intervensi-pdirjrj-9, #intervensi-pdirjrj-10, #intervensi-pdirjrj-11, #intervensi-pdirjrj-12')
        .prop('checked', false);

        // $('#form_entri_rekam_medis')[0].reset()
        // $("input[type='checkbox']").prop('checked',false);
        // $("input[type='radio']").prop('checked',false);
    }

    function konfirmasiSimpanEntriFormRekamMedis() {
    // console.log('contoh');
        swal.fire({
            title: 'Simpan Entri Rekam Medis',
            text: "Apakah anda yakin akan menyimpan Resume Rekam Medis ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriFormRekamMedis();
            }
        })
    }
 
    function simpanEntriFormRekamMedis() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pemeriksaan_poli/api/pemeriksaan_poli/simpan_entri_rekam_medis_rajal") ?>',
            data: $('#form_entri_rekam_medis').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-rekam-medis').bwizard('show', data.respon.show);

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
                        $('#modal_form_rekam_medis_rajal').modal('hide');
                        getListPemeriksaan($('#page_now').val());
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