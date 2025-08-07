<script>
  
  $(function() {
    $("#wizard_form_pengkajian_awal_ranap").bwizard();
    // $("#wizard_form_pengkajian_awal_igd_ranap").bwizard();


    $('#waktu_kajian_perawat, #waktu_kajian_medis, #tanggal_ttd_dokter_dpjp, #tanggal_ttd_dokter_pengkajian').datetimepicker({
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

    $('#tanggal_verifikasi_dokter_dpjp, #tanggal_ttd_perawat').datetimepicker({
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

    $('#btn_expand_all').click(function() {
      $('.collapse').addClass('show');
    });

    $('#btn_collapse_all').click(function() {
      $('.collapse').removeClass('show');
    });

    $('#informasi_dari_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#informasi_dari_lain_input').prop('disabled', false);
      } else {
        $('#informasi_dari_lain_input').val('');
        $('#informasi_dari_lain_input').prop('disabled', true);
      }
    });

    $('#faktor_pencetus_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#faktor_pencetus_lain_input').prop('disabled', false);
      } else {
        $('#faktor_pencetus_lain_input').val('');
        $('#faktor_pencetus_lain_input').prop('disabled', true);
      }
    });

    $('#rpt_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#rpt_lain_input').prop('disabled', false);
      } else {
        $('#rpt_lain_input').val('');
        $('#rpt_lain_input').prop('disabled', true);
      }
    });

    $('#rpk_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#rpk_lain_input').prop('disabled', false);
      } else {
        $('#rpk_lain_input').val('');
        $('#rpk_lain_input').prop('disabled', true);
      }
    });

    $('input[name="pernah_dirawat"]').change(function() {
      if ($(this).val() == '1') {
        $('#pernah_dirawat_kapan').prop('disabled', false);
        $('#pernah_dirawat_dimana').prop('disabled', false);
      } else {
        $('#pernah_dirawat_kapan').prop('disabled', true);
        $('#pernah_dirawat_dimana').prop('disabled', true);
        $('#pernah_dirawat_kapan').val('');
        $('#pernah_dirawat_dimana').val('');
      }
    });

    $('input[name="kebiasaan_merokok"]').change(function() {
      if ($(this).val() == '1') {
        $('#kebiasaan_merokok_input').prop('disabled', false);
      } else {
        $('#kebiasaan_merokok_input').prop('disabled', true);
        $('#kebiasaan_merokok_input').val('');
      }
    });

    $('input[name="kebiasaan_alkohol"]').change(function() {
      if ($(this).val() == '1') {
        $('#kebiasaan_alkohol_input').prop('disabled', false);
      } else {
        $('#kebiasaan_alkohol_input').prop('disabled', true);
        $('#kebiasaan_alkohol_input').val('');
      }
    });

    $('input[name="riwayat_operasi"]').change(function() {
      if ($(this).val() == '1') {
        $('#riwayat_operasi_kapan').prop('disabled', false);
        $('#riwayat_operasi_dimana').prop('disabled', false);
      } else {
        $('#riwayat_operasi_kapan').prop('disabled', true);
        $('#riwayat_operasi_dimana').prop('disabled', true);
        $('#riwayat_operasi_kapan').val('');
        $('#riwayat_operasi_dimana').val('');
      }
    });

    $('#bs_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#bs_lain_input').prop('disabled', false);
      } else {
        $('#bs_lain_input').val('');
        $('#bs_lain_input').prop('disabled', true);
      }
    });

    $('#wk_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#wk_lain_input').prop('disabled', false);
      } else {
        $('#wk_lain_input').val('');
        $('#wk_lain_input').prop('disabled', true);
      }
    });

    $('input[name="nyeri_dada"]').change(function() {
      if ($(this).val() == '1') {
        $('#nyeri_dada_input').prop('disabled', false);
      } else {
        $('#nyeri_dada_input').prop('disabled', true);
        $('#nyeri_dada_input').val('');
      }
    });

    $('#s_edema').click(function() {
      if ($(this).is(":checked")) {
        $('#s_edema_input').prop('disabled', false);
      } else {
        $('#s_edema_input').val('');
        $('#s_edema_input').prop('disabled', true);
      }
    });

    $('#pulsasi_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#pulsasi_lain_input').prop('disabled', false);
      } else {
        $('#pulsasi_lain_input').val('');
        $('#pulsasi_lain_input').prop('disabled', true);
      }
    });

    $('#mulut_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#mulut_lain_input').prop('disabled', false);
      } else {
        $('#mulut_lain_input').val('');
        $('#mulut_lain_input').prop('disabled', true);
      }
    });

    $('#gigi_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#gigi_lain_input').prop('disabled', false);
      } else {
        $('#gigi_lain_input').val('');
        $('#gigi_lain_input').prop('disabled', true);
      }
    });

    $('#lidah_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#lidah_lain_input').prop('disabled', false);
      } else {
        $('#lidah_lain_input').val('');
        $('#lidah_lain_input').prop('disabled', true);
      }
    });

    $('#teng_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#teng_lain_input').prop('disabled', false);
      } else {
        $('#teng_lain_input').val('');
        $('#teng_lain_input').prop('disabled', true);
      }
    });

    $('#abdomen_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#abdomen_lain_input').prop('disabled', false);
      } else {
        $('#abdomen_lain_input').val('');
        $('#abdomen_lain_input').prop('disabled', true);
      }
    });

    $('#bab_diare').click(function() {
      if ($(this).is(":checked")) {
        $('#bab_diare_input').prop('disabled', false);
      } else {
        $('#bab_diare_input').val('');
        $('#bab_diare_input').prop('disabled', true);
      }
    });

    $('#bak_kateter_warna').click(function() {
      if ($(this).is(":checked")) {
        $('#bak_kateter_warna_input').prop('disabled', false);
      } else {
        $('#bak_kateter_warna_input').val('');
        $('#bak_kateter_warna_input').prop('disabled', true);
      }
    });

    $('#bak_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#bak_lain_input').prop('disabled', false);
      } else {
        $('#bak_lain_input').val('');
        $('#bak_lain_input').prop('disabled', true);
      }
    });

    $('#sm_tulang_fraktur_terbuka').click(function() {
      if ($(this).is(":checked")) {
        $('#sm_tulang_fraktur_terbuka_lokasi').prop('disabled', false);
      } else {
        $('#sm_tulang_fraktur_terbuka_lokasi').val('');
        $('#sm_tulang_fraktur_terbuka_lokasi').prop('disabled', true);
      }
    });

    $('#sm_tulang_fraktur_tertutup').click(function() {
      if ($(this).is(":checked")) {
        $('#sm_tulang_fraktur_tertutup_lokasi').prop('disabled', false);
      } else {
        $('#sm_tulang_fraktur_tertutup_lokasi').val('');
        $('#sm_tulang_fraktur_tertutup_lokasi').prop('disabled', true);
      }
    });

    $('#sm_sendi_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#sm_sendi_lain_input').prop('disabled', false);
      } else {
        $('#sm_sendi_lain_input').val('');
        $('#sm_sendi_lain_input').prop('disabled', true);
      }
    });

    $('#si_warna_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#si_warna_lain_input').prop('disabled', false);
      } else {
        $('#si_warna_lain_input').val('');
        $('#si_warna_lain_input').prop('disabled', true);
      }
    });

    $('#si_kulit_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#si_kulit_lain_input').prop('disabled', false);
      } else {
        $('#si_kulit_lain_input').val('');
        $('#si_kulit_lain_input').prop('disabled', true);
      }
    });

    $('#sin_pengecap_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#sin_pengecap_lain_input').prop('disabled', false);
      } else {
        $('#sin_pengecap_lain_input').val('');
        $('#sin_pengecap_lain_input').prop('disabled', true);
      }
    });

    $('#sp_kelumpuhan').click(function() {
      if ($(this).is(":checked")) {
        $('#sp_kelumpuhan_lokasi').prop('disabled', false);
      } else {
        $('#sp_kelumpuhan_lokasi').val('');
        $('#sp_kelumpuhan_lokasi').prop('disabled', true);
      }
    });

    $('#sp_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#sp_lain_input').prop('disabled', false);
      } else {
        $('#sp_lain_input').val('');
        $('#sp_lain_input').prop('disabled', true);
      }
    });

    $('input[name="sr_payudara"]').change(function() {
      if ($(this).val() == 'Lain') {
        $('#sr_payudara_lain_input').prop('disabled', false);
      } else {
        $('#sr_payudara_lain_input').prop('disabled', true);
        $('#sr_payudara_lain_input').val('');
      }
    });

    $('#sps_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#sps_lain_input').prop('disabled', false);
      } else {
        $('#sps_lain_input').val('');
        $('#sps_lain_input').prop('disabled', true);
      }
    });

    $('#smen_ada_masalah').click(function() {
      if ($(this).is(":checked")) {
        $('#smen_ada_masalah_input').prop('disabled', false);
      } else {
        $('#smen_ada_masalah_input').val('');
        $('#smen_ada_masalah_input').prop('disabled', true);
      }
    });

    $('input[name="kel_tinggal"]').change(function() {
      if ($(this).val() == 'Lain') {
        $('#kel_tinggal_lain_input').prop('disabled', false);
      } else {
        $('#kel_tinggal_lain_input').prop('disabled', true);
        $('#kel_tinggal_lain_input').val('');
      }
    });


    $('input[name="tempat_tinggal"]').change(function() {
      if ($(this).val() == 'Lain') {
        $('#tempat_tinggal_lain_input').prop('disabled', false);
      } else {
        $('#tempat_tinggal_lain_input').prop('disabled', true);
        $('#tempat_tinggal_lain_input').val('');
      }
    });

    $('input[name="snk_keyakinan"]').change(function() {
      if ($(this).val() == '1') {
        $('#snk_keyakinan_ya_input').prop('disabled', false);
      } else {
        $('#snk_keyakinan_ya_input').prop('disabled', true);
        $('#snk_keyakinan_ya_input').val('');
      }
    });

    $('input[name="snk_nilai_kepercayaan"]').change(function() {
      if ($(this).val() == '1') {
        $('#snk_nilai_kepercayaan_ya_input').prop('disabled', false);
      } else {
        $('#snk_nilai_kepercayaan_ya_input').prop('disabled', true);
        $('#snk_nilai_kepercayaan_ya_input').val('');
      }
    });

    $('input[name="pengkajian_spiritual"]').change(function() {
      if ($(this).val() == 'Halangan') {
        $('#pengkajian_spiritual_halangan_input').prop('disabled', false);
      } else {
        $('#pengkajian_spiritual_halangan_input').prop('disabled', true);
        $('#pengkajian_spiritual_halangan_input').val('');
      }
    });

    $('#nb_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#nb_lain_input').prop('disabled', false);
      } else {
        $('#nb_lain_input').val('');
        $('#nb_lain_input').prop('disabled', true);
      }
    });

    $('input[name="nilai_budaya"]').change(function() {
      if ($(this).val() == 'Lain') {
        $('#nb_lain_input').prop('disabled', false);
      } else {
        $('#nb_lain_input').prop('disabled', true);
        $('#nb_lain_input').val('');
      }
    });

    $('input[name="pola_komunikasi"]').change(function() {
      if ($(this).val() == 'Lain') {
        $('#pk_lain_input').prop('disabled', false);
      } else {
        $('#pk_lain_input').prop('disabled', true);
        $('#pk_lain_input').val('');
      }
    });

    $('input[name="makanan_pokok"]').change(function() {
      if ($(this).val() == 'Selain Nasi') {
        $('#mp_selain_nasi_input').prop('disabled', false);
      } else {
        $('#mp_selain_nasi_input').prop('disabled', true);
        $('#mp_selain_nasi_input').val('');
      }
    });

    $('input[name="pantang_makanan"]').change(function() {
      if ($(this).val() == '1') {
        $('#pantang_makanan_ya_input').prop('disabled', false);
      } else {
        $('#pantang_makanan_ya_input').prop('disabled', true);
        $('#pantang_makanan_ya_input').val('');
      }
    });

    $('input[name="konsumsi_makanan_luar"]').change(function() {
      if ($(this).val() == '1') {
        $('#konsumsi_makanan_luar_ya_input').prop('disabled', false);
      } else {
        $('#konsumsi_makanan_luar_ya_input').prop('disabled', true);
        $('#konsumsi_makanan_luar_ya_input').val('');
      }
    });

    $('input[name="kepercayaan_penyakit"]').change(function() {
      if ($(this).val() == '1') {
        $('#kepercayaan_penyakit_ya_input').prop('disabled', false);
      } else {
        $('#kepercayaan_penyakit_ya_input').prop('disabled', true);
        $('#kepercayaan_penyakit_ya_input').val('');
      }
    });

    $('input[name="bicara"]').change(function() {
      if ($(this).val() == 'Gangguan Bicara') {
        $('#bicara_input').prop('disabled', false);
      } else {
        $('#bicara_input').prop('disabled', true);
        $('#bicara_input').val('');
      }
    });

    $('input[name="perlu_penterjemah"]').change(function() {
      if ($(this).val() == '1') {
        $('#perlu_penterjemah_input').prop('disabled', false);
      } else {
        $('#perlu_penterjemah_input').prop('disabled', true);
        $('#perlu_penterjemah_input').val('');
      }
    });

    // radio skrining nutrisi on
    $('.sn_penurunan_bb_area').hide();
    $('input[name="sn_penurunan_bb"]').change(function() {
      if ($(this).val() == '3') {
        $('.sn_penurunan_bb_area').show();
      } else {
        $('input[name="sn_penurunan_bb_on"]').prop('checked', false);
        $('.sn_penurunan_bb_area').hide();
      }
    });

    $('.calc_pkf').change(function() {
      var id = $(this).attr('id');
      var value = parseFloat($('#' + id).val());
      var split = id.split('_');
      var id_nilai = split[0] + '_' + split[1];

      $('#nilai_' + id_nilai).val(value);

      var total = parseFloat(0);
      for (let index = 0; index < $('.sub_total_nilai_pkf').length; index++) {
        if ($('.sub_total_nilai_pkf_' + index).val() == '') {
          var sub_total = parseFloat(0);
        } else {
          sub_total = parseFloat($('.sub_total_nilai_pkf_' + index).val());
        }

        total = total + sub_total;
      }

      $('#total_nilai_pkf').val(total);
    });

    $('#alat_bantu_jalan_1').click(function() {
      if ($(this).is(":checked")) {
        $('#alat_bantu_jalan_1_ya').prop('disabled', false);
        $('#alat_bantu_jalan_1_ya').prop('checked', true).change();
      } else {
        $('#alat_bantu_jalan_1_ya').prop('checked', false).change();;
        $('#alat_bantu_jalan_1_ya').prop('disabled', true);
      }
    });

    $('#alat_bantu_jalan_2').click(function() {
      if ($(this).is(":checked")) {
        $('#alat_bantu_jalan_2_ya').prop('disabled', false);
        $('#alat_bantu_jalan_2_ya').prop('checked', true).change();
      } else {
        $('#alat_bantu_jalan_2_ya').prop('checked', false).change();;
        $('#alat_bantu_jalan_2_ya').prop('disabled', true);
      }
    });

    $('#alat_bantu_jalan_3').click(function() {
      if ($(this).is(":checked")) {
        $('#alat_bantu_jalan_3_ya').prop('disabled', false);
        $('#alat_bantu_jalan_3_ya').prop('checked', true).change();
      } else {
        $('#alat_bantu_jalan_3_ya').prop('checked', false).change();;
        $('#alat_bantu_jalan_3_ya').prop('disabled', true);
      }
    });

    $('#cara_berjalan_1').click(function() {
      if ($(this).is(":checked")) {
        $('#cara_berjalan_1_ya').prop('disabled', false);
        $('#cara_berjalan_1_ya').prop('checked', true).change();
      } else {
        $('#cara_berjalan_1_ya').prop('checked', false).change();;
        $('#cara_berjalan_1_ya').prop('disabled', true);
      }
    });

    $('#cara_berjalan_2').click(function() {
      if ($(this).is(":checked")) {
        $('#cara_berjalan_2_ya').prop('disabled', false);
        $('#cara_berjalan_2_ya').prop('checked', true).change();
      } else {
        $('#cara_berjalan_2_ya').prop('checked', false).change();;
        $('#cara_berjalan_2_ya').prop('disabled', true);
      }
    });

    $('#cara_berjalan_3').click(function() {
      if ($(this).is(":checked")) {
        $('#cara_berjalan_3_ya').prop('disabled', false);
        $('#cara_berjalan_3_ya').prop('checked', true).change();
      } else {
        $('#cara_berjalan_3_ya').prop('checked', false).change();;
        $('#cara_berjalan_3_ya').prop('disabled', true);
      }
    });

    $('#status_mental_1').click(function() {
      if ($(this).is(":checked")) {
        $('#status_mental_1_ya').prop('disabled', false);
        $('#status_mental_1_ya').prop('checked', true).change();
      } else {
        $('#status_mental_1_ya').prop('checked', false).change();;
        $('#status_mental_1_ya').prop('disabled', true);
      }
    });

    $('#status_mental_2').click(function() {
      if ($(this).is(":checked")) {
        $('#status_mental_2_ya').prop('disabled', false);
        $('#status_mental_2_ya').prop('checked', true).change();
      } else {
        $('#status_mental_2_ya').prop('checked', false).change();;
        $('#status_mental_2_ya').prop('disabled', true);
      }
    });

    $('#ptn_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#ptn_lain_input').prop('disabled', false);
      } else {
        $('#ptn_lain_input').val('');
        $('#ptn_lain_input').prop('disabled', true);
      }
    });

    // $('input[name="prjl_riwayat_jatuh"]').change(function() {
    //   if ($(this).val() == '0') {
    //     $('input[name="prjl_riwayat_jatuh_opt"]').prop('disabled', false);
    //   } else {
    //     $('#prjl_riwayat_jatuh_opt_tidak').prop('checked', true).change();
    //     $('input[name="prjl_riwayat_jatuh_opt"]').prop('disabled', true);
    //   }
    // });

    // $('input[name="prjl_transfer"]').change(function() {
    //   if ($(this).val() == '0') {
    //     $('#prjl_transfer_1').prop('disabled', true); // Menonaktifkan checkbox
    //   } else {
    //     $('#prjl_transfer_1').prop('disabled', false); // Mengaktifkan checkbox
    //   }
    // });

    $('input[name="pk_geriatri_1"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_geriatri_1_input').prop('disabled', false);
      } else {
        $('#pk_geriatri_1_input').prop('disabled', true);
        $('#pk_geriatri_1_input').val('');
      }
    });

    $('input[name="pk_geriatri_2"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_geriatri_2_input').prop('disabled', false);
      } else {
        $('#pk_geriatri_2_input').prop('disabled', true);
        $('#pk_geriatri_2_input').val('');
      }
    });

    $('input[name="pk_geriatri_3"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_geriatri_inkontinensia, #pk_geriatri_disuria, #pk_geriatri_oliguria, #pk_geriatri_anuria').prop('disabled', false);
      } else {
        $('#pk_geriatri_inkontinensia, #pk_geriatri_disuria, #pk_geriatri_oliguria, #pk_geriatri_anuria').prop('disabled', true);
        $('#pk_geriatri_inkontinensia, #pk_geriatri_disuria, #pk_geriatri_oliguria, #pk_geriatri_anuria').prop('checked', false);
      }
    });

    $('input[name="pk_geriatri_4"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_geriatri_4_input').prop('disabled', false);
      } else {
        $('#pk_geriatri_4_input').prop('disabled', true);
        $('#pk_geriatri_4_input').val('');
      }
    });

    $('input[name="pk_geriatri_5"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_geriatri_5_input').prop('disabled', false);
      } else {
        $('#pk_geriatri_5_input').prop('disabled', true);
        $('#pk_geriatri_5_input').val('');
      }
    });

    $('#pk_pm_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#pk_pm_lain_input').prop('disabled', false);
      } else {
        $('#pk_pm_lain_input').val('');
        $('#pk_pm_lain_input').prop('disabled', true);
      }
    });

    $('input[name="pk_penyakit_menular_3"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_penyakit_menular_3_input').prop('disabled', false);
      } else {
        $('#pk_penyakit_menular_3_input').prop('disabled', true);
        $('#pk_penyakit_menular_3_input').val('');
      }
    });

    $('input[name="pk_penyakit_menular_4"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_penyakit_menular_4_input').prop('disabled', false);
      } else {
        $('#pk_penyakit_menular_4_input').prop('disabled', true);
        $('#pk_penyakit_menular_4_input').val('');
      }
    });

    $('input[name="pk_penyakit_menular_6"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_penyakit_menular_6_input').prop('disabled', false);
      } else {
        $('#pk_penyakit_menular_6_input').prop('disabled', true);
        $('#pk_penyakit_menular_6_input').val('');
      }
    });

    $('#pk_pdtt_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#pk_pdtt_lain_input').prop('disabled', false);
      } else {
        $('#pk_pdtt_lain_input').val('');
        $('#pk_pdtt_lain_input').prop('disabled', true);
      }
    });

    $('input[name="pk_penyakit_pdtt_3"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_penyakit_pdtt_3_input').prop('disabled', false);
      } else {
        $('#pk_penyakit_pdtt_3_input').prop('disabled', true);
        $('#pk_penyakit_pdtt_3_input').val('');
      }
    });

    $('input[name="pk_penyakit_pdtt_4"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_penyakit_pdtt_4_input').prop('disabled', false);
      } else {
        $('#pk_penyakit_pdtt_4_input').prop('disabled', true);
        $('#pk_penyakit_pdtt_4_input').val('');
      }
    });

    $('input[name="pk_penyakit_pdtt_5"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_penyakit_pdtt_5_input').prop('disabled', false);
      } else {
        $('#pk_penyakit_pdtt_5_input').prop('disabled', true);
        $('#pk_penyakit_pdtt_5_input').val('');
      }
    });

    // $('input[name="wajib_ibadah"]').change(function() {
    //   if ($(this).val() == 'Halangan') {
    //     $('#wajib_ibadah_halangan_input').prop('disabled', false);
    //   } else {
    //     $('#wajib_ibadah_halangan_input').prop('disabled', true);
    //     $('#wajib_ibadah_halangan_input').val('');
    //   }
    // });

    $('input[name="pk_pasien_ketergantungan_obat"]').change(function() {
      if ($(this).val() == '1') {
        $('#pk_pasien_ketergantungan_obat_input').prop('disabled', false);
        $('#pk_pasien_lama_ketergantungan_obat_input').prop('disabled', false);
      } else {
        $('#pk_pasien_ketergantungan_obat_input').prop('disabled', true);
        $('#pk_pasien_ketergantungan_obat_input').val('');
        $('#pk_pasien_lama_ketergantungan_obat_input').prop('disabled', true);
        $('#pk_pasien_lama_ketergantungan_obat_input').val('');
      }
    });

    $('#masalah_keperawatan_30').click(function() {
      if ($(this).is(":checked")) {
        $('#masalah_keperawatan_lain_input').prop('disabled', false);
      } else {
        $('#masalah_keperawatan_lain_input').val('');
        $('#masalah_keperawatan_lain_input').prop('disabled', true);
      }
    });

    $('#kriteria_discharge_9').click(function() {
      if ($(this).is(":checked")) {
        $('#kriteria_discharge_lain_input').prop('disabled', false);
      } else {
        $('#kriteria_discharge_lain_input').val('');
        $('#kriteria_discharge_lain_input').prop('disabled', true);
      }
    });

    $('#perawat').select2c({
      ajax: {
        url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
        dataType: 'json',
        quietMillis: 100,
        data: function(term, page) { // page is the one-based page number tracked by Select2
          return {
            q: term, //search term
            page: page, // page number
            jenis: 18,
          };
        },
        results: function(data, page) {
          var more = (page * 20) < data.total; // whether or not there are more results available

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

    $('#verifikasi_dokter_dpjp, #dokter_dpjp, #dokter_pengkajian').select2c({
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
          var more = (page * 20) < data.total; // whether or not there are more results available

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

    // $('#signAreaDPJP').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:false});
    // $('#signAreaPerawat').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:false});

    // rumus hitung skala early warning system
    // $('.skala').change(function() {
    //   hitungSkalaEarly();
    // });

    // rumus hitung skala early warning system 
    $('.skalanewst').change(function() {
          hitungSkalaEarlyNewst()
    })

    $('input[name="rpk_medis"]').change(function() {
      if ($(this).val() == '1') {
        $('#rpk_medis_asma, #rpk_medis_dm, #rpk_medis_cardiovascular, #rpk_medis_kanker, #rpk_medis_thalasemia, #rpk_medis_lain').prop('disabled', false);
      } else {
        $('#rpk_medis_asma, #rpk_medis_dm, #rpk_medis_cardiovascular, #rpk_medis_kanker, #rpk_medis_thalasemia, #rpk_medis_lain').prop('disabled', true);
        $('#rpk_medis_lain_input').val('');
      }
    });

    $('#rpk_medis_lain').click(function() {
      if ($(this).is(":checked")) {
        $('#rpk_medis_lain_input').prop('disabled', false);
      } else {
        $('#rpk_medis_lain_input').val('');
        $('#rpk_medis_lain_input').prop('disabled', true);
      }
    });

    $('#riwayat_field, #hasil_laboratorium, #hasil_radiologi, #hasil_penunjang_lain, #diagnosa_awal_medis').summernote({
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

    $("#tanggal_rencana_pulang").datepicker({
      format: 'dd/mm/yyyy',
      // endDate: new Date()
    }).on('changeDate', function() {
      $(this).datepicker('hide');
    });
  })


  // function hitungSkalaEarly() {
  //   var total = 0;
  //   // looping vertical
  //   for (let i = 1; i <= 7; i++) {
  //     // looping horizontal
  //     var sub_total = 0
  //     for (let j = 1; j <= 7; j++) {
  //       var value = 0;
  //       if ($('#skala_' + i + '_' + j).is(':checked')) {
  //         var getNilai = $('#skala_' + i + '_' + j).val();
  //         value = getNilai.split('_', 1);
  //         if (value[0] === 'bk') {
  //           value = 8;
  //         }
  //       }

  //       sub_total = sub_total + parseInt(value);
  //     }

  //     total = total + parseInt(sub_total);
  //   }

  //   if (total == 0) {
  //     $('#total_skala_1').prop('checked', true);
  //   } else if (total >= 1 && total <= 4) {
  //     $('#total_skala_2').prop('checked', true);
  //   } else if (total >= 5 && total <= 6) {
  //     $('#total_skala_3').prop('checked', true);
  //   } else if (total >= 7) {
  //     $('#total_skala_4').prop('checked', true);
  //   }
  // }


  // NEWS (DEWASA) 
  function hitungSkalaEarlyNewst() {
      var total = 0;
      for (let i = 1; i <= 8; i++) {
          var sub_total = 0; 
          for (let j = 1; j <= 7; j++) { 
              var value = 0; 
              if ($('#skalanewst_' + i + '_' + j).is(':checked')) { 
                  var getNilai = $('#skalanewst_' + i + '_' + j).val(); 
                  value = parseInt(getNilai.split('_')[0]); // Mengambil elemen pertama dan parseInt
              }
              sub_total += value;
          }
          total += sub_total; 
      }
      // Reset semua checkbox
      $('#total_skalanewst_1, #total_skalanewst_2, #total_skalanewst_3, #total_skalanewst_4').prop('checked', false);

      // Cek rentang total dan set checkbox yang sesuai
      if (total === 0) {
          $('#total_skalanewst_1').prop('checked', true); 
      } else if (total >= 1 && total <= 4) {
          $('#total_skalanewst_2').prop('checked', true); 
      } else if (total >= 5 && total <= 6) {
          $('#total_skalanewst_3').prop('checked', true); 
      } else if (total >= 7) {
          $('#total_skalanewst_4').prop('checked', true); 
      }
  }


  function resetFormPengkajianAwal() {
    $('#form_pengkajian_awal')[0].reset();
    $('#id_kajian_keperawatan, #id_kajian_medis').val('');
    // $('input').filter(':radio').prop('checked',false);
    // $('input').filter(':checkbox').prop('checked',false);
    $('#agama_islam, #agama_kristen, #agama_hindu, #agama_buddha, #agama_katholik, #agama_lain, #agama_lain_input').prop('disabled', true);
    $('#cara_masuk_irj, #cara_masuk_igd, #cara_masuk_lain').prop('disabled', true);
    $('#sper_menikah, #sper_belum_menikah, #sper_duda, #sper_janda, #sper_cerai_mati').prop('disabled', true);
    $('#rpk_medis_asma, #rpk_medis_dm, #rpk_medis_cardiovascular, #rpk_medis_kanker, #rpk_medis_thalasemia, #rpk_medis_lain').prop('disabled', true);

    $('.disabled').attr('disabled', true);

    $('#s2id_perawat a .select2c-chosen').html('Pilih Perawat');
    $('#s2id_verifikasi_dokter_dpjp a .select2c-chosen').html('Pilih Verifikator Dokter DPJP');

    $('#s2id_dokter_dpjp a .select2c-chosen').html('Pilih Dokter DPJP');
    $('#s2id_dokter_pengkajian a .select2c-chosen').html('Pilih Dokter Pengkajian');


    $('#riwayat_field').summernote('code', '');
    $('#hasil_laboratorium').summernote('code', '');
    $('#hasil_radiologi').summernote('code', '');
    $('#hasil_penunjang_lain').summernote('code', '');
    $('#diagnosa_awal_medis').summernote('code', '');

    // signature
    $('#ttd_perawat').show();
    $('#ttd_verifikasi_dokter_dpjp').show();
    $('#ttd_perawat_verified').hide();
    $('#ttd_verifikasi_dokter_dpjp_verified').hide();

    $('#ttd_dokter_dpjp').show();
    $('#ttd_dokter_dpjp_verified').hide();
    $('#ttd_dokter_pengkajian').show();
    $('#ttd_dokter_pengkajian_verified').hide();
    $('#waktu_kajian_perawat, #waktu_kajian_medis, #tanggal_ttd_perawat, #tanggal_verifikasi_dokter_dpjp, #tanggal_ttd_dokter_dpjp, #tanggal_ttd_dokter_pengkajian').attr('disabled', false);
    $('#perawat, #verifikasi_dokter_dpjp, #dokter_dpjp, #dokter_pengkajian').select2c('readonly', false);
  }

  function lihatFORM_KEP_15_03(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
    let action = 'lihat';

    entriPengkajianAwal(layanan.id_pendaftaran, layanan.id, bed, action);
  }

  function editFORM_KEP_15_03(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
    let action = 'edit';

    entriPengkajianAwal(layanan.id_pendaftaran, layanan.id, bed, action);
  }

  function tambahFORM_KEP_15_03(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
    let action = 'tambah';

    entriPengkajianAwal(layanan.id_pendaftaran, layanan.id, bed, action);
  }

  function entriPengkajianAwal(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
    $('#wizard_form_pengkajian_awal_ranap').bwizard('show', '0');

    // $('#desclaimer_history').html('');
    // $('#btn_history_logs').hide();
    // $('#btn-simpan').hide();
    // var groupAccount = '<?= $this->session->userdata('account_group') ?>';
    // var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
    // if (groupAccount == 'Admin') {
    //   profesi = 'Perawat';
    // }

    // if (action !== 'lihat') {
    //   $('#btn-simpan').show();
    // } else {
    //   $('#btn-simpan').hide();
    // }


    $.ajax({
      type: 'GET',
      url: '<?= base_url("rawat_inap/api/rawat_inap/get_data_pengkajian_awal_rawat_inapw") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader()
      },
      success: function(data) {
        resetFormPengkajianAwal();
        $('#id_pendaftaran').val(id_pendaftaran);
        $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
        if (data.pasien !== null) {
          $('#id_pasien').val(data.pasien.id_pasien);
          $('#pa_pasien_nama').text(data.pasien.nama);
          $('#pa_pasien_no_rm').text(data.pasien.no_rm);
          $('#pa_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
          $('#pa_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

          if (data.pasien.agama == 'Islam') {
            $('#agama_islam').prop('checked', true).attr('disabled', false);
          } else if (data.pasien.agama == 'Kristen') {
            $('#agama_kristen').prop('checked', true).attr('disabled', false);
          } else if (data.pasien.agama == 'Hindu') {
            $('#agama_hindu').prop('checked', true).attr('disabled', false);
          } else if (data.pasien.agama == 'Buddha') {
            $('#agama_buddha').prop('checked', true).attr('disabled', false);
          } else if (data.pasien.agama == 'Katholik') {
            $('#agama_katholik').prop('checked', true).attr('disabled', false);
          } else if (data.pasien.agama == 'Konghucu') {
            $('#agama_lain').prop('checked', true).attr('disabled', false);
            $('#agama_lain_input').val(data.pasien.agama).attr('disabled', false);
          } else if (data.pasien.agama == 'Lain-lain') {
            $('#agama_lain').prop('checked', true).attr('disabled', false);
            syams_validation('#agama_lain_input', 'Masukkan agama lain').attr('disabled', false);
          }

          if (data.pasien.pendidikan !== '') {
            $('#pendidikan_pasien').val(data.pasien.pendidikan);
          }

          if (data.pasien.pekerjaan !== '') {
            $('#pekerjaan_pasien').val(data.pasien.pekerjaan);
          }

          if (data.pasien.status_kawin == 'Kawin') {
            $('#sper_menikah').prop('checked', true).attr('disabled', false);
          } else if (data.pasien.status_kawin == 'Belum Kawin') {
            $('#sper_belum_menikah').prop('checked', true).attr('disabled', false);
          } else if (data.pasien.status_kawin == 'Duda') {
            $('#sper_duda').prop('checked', true).attr('disabled', false);
          } else if (data.pasien.status_kawin == 'Janda') {
            $('#sper_janda').prop('checked', true).attr('disabled', false);
          } else if (data.pasien.status_kawin == 'Cerai Mati') {
            $('#sper_cerai_mati').prop('checked', true).attr('disabled', false);
          }

          // if (data.pasien.alergi !== null) {
          //   $('#riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
          // };

        }




        if (data.profil !== null) {
          $('#pa_tinggi_badan').val((data.profil.tinggi_badan != null ? data.profil.tinggi_badan : ''));
          $('#pa_berat_badan').val(data.profil.berat_badan != null ? data.profil.berat_badan : '');
        }



        if (data.layanan !== null) {
          $('#waktu_masuk_ranap').val((data.layanan.waktu_konfirmasi_ranap !== null ? datetimefmysql(data.layanan.waktu_konfirmasi_ranap) : '<?= date('d/m/Y H:i:s') ?>'));
          if (data.layanan.before !== null) {
            if (data.layanan.before.jenis_layanan == 'Poliklinik') {
              $('#cara_masuk_irj').prop('checked', true).attr('disabled', false)
            }
            if (data.layanan.before.jenis_layanan == 'IGD') {
              $('#cara_masuk_igd').prop('checked', true).attr('disabled', false)
            }
            if (data.layanan.before.jenis_layanan == 'Hemodialisa') {
              $('#cara_masuk_lain').prop('checked', true).attr('disabled', false)
            }
            if (data.layanan.before.jenis_layanan == 'Hemodialisa') {
              $('#cara_masuk_lain_input').val(data.layanan.before.jenis_layanan)
            }
          }

          $('#cara_bayar_pasien').val((data.layanan.cara_bayar === 'Tunai' ? data.layanan.cara_bayar : data.layanan.cara_bayar + ' (' + data.layanan.penjamin + ')'));
        }

        $('#desclaimer_history').html('');
        $('#btn_history_logs').hide();
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

        if (data.kajian_perawat !== null) {
          if (data.kajian_perawat.updated_date !== null) {
            $('#desclaimer_history').html('*) Ada Perubahan Data');
            $('#btn_history_logs').show();
            $('#btn_history_logs').attr('onclick', 'showHistoryLogs(' + id_layanan_pendaftaran + ')');
          }

          showKajianPerawat(data.kajian_perawat);
        }

        if (data.kajian_medis !== null) {
          showKajianMedis(data.kajian_medis);
        }

        $('#pa_bed').text(bed);

        $('.logo-pasien-alergi').hide();
        if (data.profil !== null) {
          // status profil pasien
          if (data.profil.is_alergi == 'Ya') {
            $('.logo-pasien-alergi').show();
          }
        }

        $('#modal_pengkajian_awal_pasien_rawat_inaP').modal('show');
      },
      complete: function() {
        hideLoader()
      },
      error: function(e) {
        accessFailed(e.status);
      },
    });
  }

  function showKajianPerawat(data) {
    $('#id_kajian_keperawatan').val(data.id);
    $('#waktu_kajian_perawat').val((data.waktu_pengkajian !== null ? datetimefmysql(data.waktu_pengkajian) : '')).attr('disabled', true);
    // $('#waktu_kajian_perawat_old').val((data.waktu_pengkajian !== null ? datetimefmysql(data.waktu_pengkajian) : ''));

    // cara_tiba_diruangan
    if (data.cara_tiba_diruangan === 'Jalan') {
      $('#cara_tiba_diruangan_jalan').prop('checked', true).change()
    }
    if (data.cara_tiba_diruangan === 'Brankar') {
      $('#cara_tiba_diruangan_brankar').prop('checked', true).change()
    }
    if (data.cara_tiba_diruangan === 'Kursi Roda') {
      $('#cara_tiba_diruangan_kursi_roda').prop('checked', true).change()
    }
    // end cara_tiba_diruangan

    // informasi diperoleh dari
    var informasi = JSON.parse(data.informasi_dari);
    if (informasi.pasien !== '') {
      $('#informasi_dari_pasien').prop('checked', true)
    }
    if (informasi.keluarga !== '') {
      $('#informasi_dari_keluarga').prop('checked', true)
    }
    if (informasi.lain !== '') {
      $('#informasi_dari_lain').prop('checked', true);
      $('#informasi_dari_lain_input').val(informasi.ket_lain).attr('disabled', false);
    }
    // end informasi diperoleh dari

    $('#keluhan_utama_pengkajian_awal').val(data.keluhan_utama);
    $('#mulai_timbul_keluhan').val(data.timbul_keluhan);
    $('#lama_keluhan').val(data.lama_keluhan);

    // faktor pencetus
    var faktor_pencetus = JSON.parse(data.faktor_pencetus);
    if (faktor_pencetus.infeksi !== '') {
      $('#faktor_pencetus_infeksi').prop('checked', true)
    }
    if (faktor_pencetus.lain !== '') {
      $('#faktor_pencetus_lain').prop('checked', true);
      $('#faktor_pencetus_lain_input').val(faktor_pencetus.ket_lain).attr('disabled', false);
    }
    // end faktor pencetus

    // sifat keluhan
    if (data.sifat_keluhan === 'Akut') {
      $('#sifat_keluhan_akut').prop('checked', true).change()
    }
    if (data.sifat_keluhan === 'Kronik') {
      $('#sifat_keluhan_kronik').prop('checked', true).change()
    }
    // end sifat keluhan

    $('#riwayat_penyakit_sekarang_pengkajian_awal').val(data.rps);

    // riwayat penyakit terdahulu
    var rpt = JSON.parse(data.rpd);
    if (rpt.asma !== '') {
      $('#rpt_asma').prop('checked', true)
    }
    if (rpt.hipertensi !== '') {
      $('#rpt_hipertensi').prop('checked', true)
    }
    if (rpt.jantung !== '') {
      $('#rpt_jantung').prop('checked', true)
    }
    if (rpt.diabetes !== '') {
      $('#rpt_diabetes').prop('checked', true)
    }
    if (rpt.hepatitis !== '') {
      $('#rpt_hepatitis').prop('checked', true)
    }
    if (rpt.lain !== '') {
      $('#rpt_lain').prop('checked', true);
      $('#rpt_lain_input').val(rpt.ket_lain).attr('disabled', false);
    }
    // end riwayat penyakit terdahulu

    // riwayat penyakit keluarga
    var rpk = JSON.parse(data.rpk);
    if (rpk.asma !== '') {
      $('#rpk_asma').prop('checked', true)
    }
    if (rpk.hipertensi !== '') {
      $('#rpk_hipertensi').prop('checked', true)
    }
    if (rpk.jantung !== '') {
      $('#rpk_jantung').prop('checked', true)
    }
    if (rpk.diabetes !== '') {
      $('#rpk_diabetes').prop('checked', true)
    }
    if (rpk.hepatitis !== '') {
      $('#rpk_hepatitis').prop('checked', true)
    }
    if (rpk.lain !== '') {
      $('#rpk_lain').prop('checked', true);
      $('#rpk_lain_input').val(rpk.ket_lain).attr('disabled', false);
    }
    // end riwayat penyakit keluarga

    // pernah dirawat
    var pernah_dirawat = JSON.parse(data.pernah_dirawat);
    if (pernah_dirawat.dirawat === '0') {
      $('#pernah_dirawat_tidak').prop('checked', true).change()
    }
    if (pernah_dirawat.dirawat === '1') {
      $('#pernah_dirawat_ya').prop('checked', true).change()
    }
    $('#pernah_dirawat_kapan').val(pernah_dirawat.kapan);
    $('#pernah_dirawat_dimana').val(pernah_dirawat.dimana);
    // end pernah dirawat

    // kebiasaan
    var kebiasaan = JSON.parse(data.kebiasaan);
    if (kebiasaan.merokok === '0') {
      $('#kebiasaan_merokok_tidak').prop('checked', true).change()
    }
    if (kebiasaan.merokok === '1') {
      $('#kebiasaan_merokok_ya').prop('checked', true).change()
    }
    if (kebiasaan.ket_merokok !== '') {
      $('#kebiasaan_merokok_input').val(kebiasaan.ket_merokok).attr('disabled', false)
    }
    if (kebiasaan.alkohol === '0') {
      $('#kebiasaan_alkohol_tidak').prop('checked', true).change()
    }
    if (kebiasaan.alkohol === '1') {
      $('#kebiasaan_alkohol_ya').prop('checked', true).change()
    }
    if (kebiasaan.ket_alkohol !== '') {
      $('#kebiasaan_alkohol_input').val(kebiasaan.ket_alkohol).attr('disabled', false)
    }
    if (kebiasaan.narkoba === '0') {
      $('#kebiasaan_narkoba_tidak').prop('checked', true).change()
    }
    if (kebiasaan.narkoba === '1') {
      $('#kebiasaan_narkoba_ya').prop('checked', true).change()
    }
    if (kebiasaan.olahraga === '0') {
      $('#kebiasaan_olahraga_tidak').prop('checked', true).change()
    }
    if (kebiasaan.olahraga === '1') {
      $('#kebiasaan_olahraga_ya').prop('checked', true).change()
    }
    // end kebiasaan

    // riwayat operasi
    var riwayat_operasi = JSON.parse(data.riwayat_operasi);
    if (riwayat_operasi.operasi === '0') {
      $('riwayat_operasi_tidak').prop('checked', true).change()
    }
    if (riwayat_operasi.operasi === '1') {
      $('#riwayat_operasi_ya').prop('checked', true).change()
    }
    $('#riwayat_operasi_kapan').val(riwayat_operasi.kapan);
    $('#riwayat_operasi_dimana').val(riwayat_operasi.dimana);
    // end riwayat operasi

    // obat dari luar
    if (data.obat_dari_luar === '0') {
      $('#obat_luar_tidak').prop('checked', true).change()
    }
    if (data.obat_dari_luar === '1') {
      $('#obat_luar_ya').prop('checked', true).change()
    }
    // end obat dari luar

    // alergi
    if (data.alergi === '0') {
      $('#alergi_tidak').prop('checked', true).change()
    }
    if (data.alergi === '1') {
      $('#alergi_ya').prop('checked', true).change()
    }
    if (data.alergi === '2') {
      $('#alergi_tidak_tahu').prop('checked', true).change()
    }
    $('#alergi_obat').val(data.alergi_obat);
    $('#alergi_obat_reaksi').val(data.alergi_obat_reaksi);
    $('#alergi_makanan').val(data.alergi_makanan);
    $('#alergi_makanan_reaksi').val(data.alergi_makanan_reaksi);
    // end alergi

    // keadaan hamil
    if (data.keadaan_hamil === '0') {
      $('#hamil_tidak').prop('checked', true).change()
    }
    if (data.keadaan_hamil === '1') {
      $('#hamil_ya').prop('checked', true).change()
    }
    // end keadaan hamil

    // sedang menyusui
    if (data.sedang_menyusui === '0') {
      $('#menyusui_tidak').prop('checked', true).change()
    }
    if (data.sedang_menyusui === '1') {
      $('#menyusui_ya').prop('checked', true).change()
    }
    // end sedang menyusui

    // riwayat kelahiran
    if (data.riwayat_kelahiran === 'Spontan') {
      $('#riwayat_kelahiran_spontan').prop('checked', true).change()
    }
    if (data.riwayat_kelahiran === 'Operasi') {
      $('#riwayat_kelahiran_operasi').prop('checked', true).change()
    }
    if (data.riwayat_kelahiran === 'Cukup Bulan') {
      $('#riwayat_kelahiran_cukup_bulan').prop('checked', true).change()
    }
    if (data.riwayat_kelahiran === 'Kurang Bulan') {
      $('#riwayat_kelahiran_kurang_bulan').prop('checked', true).change()
    }
    // end riwayat kelahiran

    // kesadaran
    var kesadaran = JSON.parse(data.kesadaran);
    if (kesadaran.composmentis !== '') {
      $('#composmentis').prop('checked', true)
    }
    if (kesadaran.apatis !== '') {
      $('#apatis').prop('checked', true)
    }
    if (kesadaran.samnolen !== '') {
      $('#samnolen').prop('checked', true)
    }
    if (kesadaran.sopor !== '') {
      $('#sopor').prop('checked', true)
    }
    if (kesadaran.koma !== '') {
      $('#koma').prop('checked', true)
    }
    $('#gcs_e').val(kesadaran.gcs_e);
    $('#gcs_m').val(kesadaran.gcs_m);
    $('#gcs_v').val(kesadaran.gcs_v);
    // end kesadaran

    $('#pa_tensi_sis').val(data.tensi_sistolik_awal);
    $('#pa_tensi_dis').val(data.tensi_diastolik_awal);
    $('#pa_nadi').val(data.nadi_awal);
    $('#pa_suhu').val(data.suhu_awal);
    $('#pa_nafas').val(data.nafas_awal);



    $('#pa_tinggi_badan').val(data.tinggi_badan);
    $('#pa_berat_badan').val(data.berat_badan);



    // suara nafas
    var snf = JSON.parse(data.suara_nafas);
    if (snf.vesikuler !== '') {
      $('#sf_vesikuler').prop('checked', true)
    }
    if (snf.wheezing !== '') {
      $('#sf_wheezing').prop('checked', true)
    }
    if (snf.ronchi !== '') {
      $('#sf_ronchi').prop('checked', true)
    }
    if (snf.dispnoe !== '') {
      $('#sf_dispnoe').prop('checked', true)
    }
    // if (snf.stidor stridor !== '') {
    //   $('#sf_stridor').prop('checked', true)
    // }
    if (snf.stridor  !== '') {
      $('#sf_stridor').prop('checked', true)
    }
    // end suara nafas

    // pola nafas
    var pnf = JSON.parse(data.pola_nafas);
    if (pnf.normal !== '') {
      $('#pn_normal').prop('checked', true)
    }
    if (pnf.bradipnea !== '') {
      $('#pn_bradipnea').prop('checked', true)
    }
    if (pnf.tachipnea !== '') {
      $('#pn_tachipnea').prop('checked', true)
    }
    // end pola nafas

    // jenis pernafasan
    var jp = JSON.parse(data.jenis_pernafasan);
    if (jp.dada !== '') {
      $('#jp_dada').prop('checked', true)
    }
    if (jp.perut !== '') {
      $('#jp_perut').prop('checked', true)
    }
    if (jp.cuping_hidung !== '') {
      $('#jp_cuping_hidung').prop('checked', true)
    }
    // end jenis pernafasan

    if (data.otot_bantu_nafas === '0') {
      $('#otot_bantu_nafas_tidak').prop('checked', true).change()
    }
    if (data.otot_bantu_nafas === '1') {
      $('#otot_bantu_nafas_ya').prop('checked', true).change()
    }
    if (data.irama_nafas === '0') {
      $('#irama_nafas_tidak').prop('checked', true).change()
    }
    if (data.irama_nafas === '1') {
      $('#irama_nafas_ya').prop('checked', true).change()
    }
    if (data.batuk_sekresi === '0') {
      $('#batuk_sekresi_tidak').prop('checked', true).change()
    }
    if (data.batuk_sekresi === '1') {
      $('#batuk_sekresi_ya').prop('checked', true).change()
    }

    var kbs = JSON.parse(data.ket_batuk_sekresi);
    if (kbs.produktif !== '') {
      $('#bs_produktif').prop('checked', true)
    }
    if (kbs.non_produktif !== '') {
      $('#bs_non_produktif').prop('checked', true)
    }
    if (kbs.hemaptoe !== '') {
      $('#bs_hemaptoe').prop('checked', true)
    }
    if (kbs.lain !== '') {
      $('#bs_lain').prop('checked', true);
      $('#bs_lain_input').val(kbs.ket_lain).attr('disabled', false);
    }

    // warna kulit
    var wk = JSON.parse(data.warna_kulit);
    if (wk.normal !== '') {
      $('#wk_normal').prop('checked', true)
    }
    if (wk.kemerahan !== '') {
      $('#wk_kemerahan').prop('checked', true)
    }
    if (wk.sianosis !== '') {
      $('#wk_sianosis').prop('checked', true)
    }
    if (wk.pucat !== '') {
      $('#wk_pucat').prop('checked', true)
    }
    if (wk.lain !== '') {
      $('#wk_lain').prop('checked', true);
      $('#wk_lain_input').val(wk.ket_lain).attr('disabled', false);
    }
    // end warna kulit

    if (data.nyeri_dada === '0') {
      $('#nyeri_dada_tidak').prop('checked', true).change()
    }
    if (data.nyeri_dada === '1') {
      $('#nyeri_dada_ya').prop('checked', true).change()
    }
    $('#nyeri_dada_input').val(data.ket_nyeri_dada);

    if (data.denyut_nadi === '0') {
      $('#denyut_nadi_tidak').prop('checked', true).change()
    }
    if (data.denyut_nadi === '1') {
      $('#denyut_nadi_ya').prop('checked', true).change()
    }

    // sirkulasi
    var sirkulasi = JSON.parse(data.sirkulasi);
    if (sirkulasi.akral_hangat !== '') {
      $('#s_akral_hangat').prop('checked', true)
    }
    if (sirkulasi.akral_dingin !== '') {
      $('#s_akral_dingin').prop('checked', true)
    }
    if (sirkulasi.rasa_bebas !== '') {
      $('#s_rasa_bebas').prop('checked', true)
    }
    if (sirkulasi.palpitasi !== '') {
      $('#s_palpitasi').prop('checked', true)
    }
    if (sirkulasi.edema !== '') {
      $('#s_edema').prop('checked', true);
      $('#s_edema_input').val(sirkulasi.ket_edema).attr('disabled', false);
    }
    // end sirkulasi

    // pulsasi
    var pulsasi = JSON.parse(data.pulsasi);
    if (pulsasi.kuat !== '') {
      $('#pulsasi_kuat').prop('checked', true)
    }
    if (pulsasi.lemah !== '') {
      $('#pulsasi_lemah').prop('checked', true)
    }
    if (pulsasi.lain !== '') {
      $('#pulsasi_lain').prop('checked', true);
      $('#pulsasi_lain_input').val(pulsasi.ket_lain).attr('disabled', false);
    }
    // end pulsasi

    // mulut
    var mulut = JSON.parse(data.mulut);
    if (mulut.tidak_ada_kelainan !== '') {
      $('#mulut_tidak_ada_kelainan').prop('checked', true)
    }
    if (mulut.simetris !== '') {
      $('#mulut_simetris').prop('checked', true)
    }
    if (mulut.asimetris !== '') {
      $('#mulut_asimetris').prop('checked', true)
    }
    if (mulut.mukosa !== '') {
      $('#mulut_mukosa').prop('checked', true)
    }
    if (mulut.bibir_pucat !== '') {
      $('#mulut_bibir_pucat').prop('checked', true)
    }
    if (mulut.lain !== '') {
      $('#mulut_lain').prop('checked', true);
      $('#mulut_lain_input').val(mulut.ket_lain).attr('disabled', false);
    }
    // end mulut

    // gigi
    var gigi = JSON.parse(data.gigi);
    if (gigi.tidak_ada_kelainan !== '') {
      $('#gigi_tidak_ada_kelainan').prop('checked', true)
    }
    if (gigi.caries !== '') {
      $('#gigi_caries').prop('checked', true)
    }
    if (gigi.goyang !== '') {
      $('#gigi_goyang').prop('checked', true)
    }
    if (gigi.palsu !== '') {
      $('#gigi_palsu').prop('checked', true)
    }
    if (gigi.lain !== '') {
      $('#gigi_lain').prop('checked', true);
      $('#gigi_lain_input').val(gigi.ket_lain).attr('disabled', false);
    }
    // end gigi

    // lidah
    var lidah = JSON.parse(data.lidah);
    if (lidah.tidak_ada_kelainan !== '') {
      $('#lidah_tidak_ada_kelainan').prop('checked', true)
    }
    if (lidah.kotor !== '') {
      $('#lidah_kotor').prop('checked', true)
    }
    if (lidah.gerakan_asimetris !== '') {
      $('#lidah_gerakan_asimetris').prop('checked', true)
    }
    if (lidah.lain !== '') {
      $('#lidah_lain').prop('checked', true);
      $('#lidah_lain_input').val(lidah.ket_lain).attr('disabled', false);
    }
    // end lidah

    // tenggorokan
    var teng = JSON.parse(data.tenggorokan);
    if (teng.gangguan_menelan !== '') {
      $('#teng_gangguan_menelan').prop('checked', true)
    }
    if (teng.sakit_menelan !== '') {
      $('#teng_sakit_menelan').prop('checked', true)
    }
    if (teng.lain !== '') {
      $('#teng_lain').prop('checked', true);
      $('#teng_lain_input').val(teng.ket_lain).attr('disabled', false);
    }
    // end tenggorokan

    // abdomen
    var abdomen = JSON.parse(data.abdomen);
    if (abdomen.asites !== '') {
      $('#abdomen_asites').prop('checked', true)
    }
    if (abdomen.tegang !== '') {
      $('#abdomen_tegang').prop('checked', true)
    }
    if (abdomen.supel !== '') {
      $('#abdomen_supel').prop('checked', true)
    }
    if (abdomen.lain !== '') {
      $('#abdomen_lain').prop('checked', true);
      $('#abdomen_lain_input').val(abdomen.ket_lain).attr('disabled', false);
    }
    // end abdomen

    // nafsu makan
    if (data.nafsu_makan === 'Tetap') {
      $('#nafsu_makan_tetap').prop('checked', true).change()
    }
    if (data.nafsu_makan === 'Naik') {
      $('#nafsu_makan_naik').prop('checked', true).change()
    }
    if (data.nafsu_makan === 'Turun') {
      $('#nafsu_makan_turun').prop('checked', true).change()
    }
    // end nafsu makan

    // mual
    if (data.mual === '0') {
      $('#mual_tidak').prop('checked', true).change()
    }
    if (data.mual === '1') {
      $('#mual_ya').prop('checked', true).change()
    }
    // end mual

    // muntah
    if (data.muntah === '0') {
      $('#muntah_tidak').prop('checked', true).change()
    }
    if (data.muntah === '1') {
      $('#muntah_ya').prop('checked', true).change()
    }
    // end muntah

    // kesulitan menelan
    if (data.kesulitan_menelan === '0') {
      $('#kesulitan_menelan_tidak').prop('checked', true).change()
    }
    if (data.kesulitan_menelan === '1') {
      $('#kesulitan_menelan_ya').prop('checked', true).change()
    }
    // end kesulitan menelan

    // eleminasi bab
    var bab = JSON.parse(data.eleminasi_bab);
    if (bab.normal !== '') {
      $('#bab_normal').prop('checked', true)
    }
    if (bab.konstipasi !== '') {
      $('#bab_konstipasi').prop('checked', true)
    }
    if (bab.melena !== '') {
      $('#bab_melena').prop('checked', true)
    }
    if (bab.inkontinensia_alvi !== '') {
      $('#bab_inkontinensia_alvi').prop('checked', true)
    }
    if (bab.colostomy !== '') {
      $('#bab_colostomy').prop('checked', true)
    }
    if (bab.diare !== '') {
      $('#bab_diare').prop('checked', true);
      $('#bab_diare_input').val(bab.ket_diare).attr('disabled', false);
    }
    // end eleminasi bab

    // eleminasi bab
    var bak = JSON.parse(data.eleminasi_bak);
    if (bak.normal !== '') {
      $('#bak_normal').prop('checked', true)
    }
    if (bak.hematuri !== '') {
      $('#bak_hematuri').prop('checked', true)
    }
    if (bak.nokturia !== '') {
      $('#bak_nokturia').prop('checked', true)
    }
    if (bak.inkontinensia_uri !== '') {
      $('#bak_inkontinensia_uri').prop('checked', true)
    }
    if (bak.urostomi !== '') {
      $('#bak_urostomi').prop('checked', true)
    }
    if (bak.urin_menetes !== '') {
      $('#bak_urin_menetes').prop('checked', true)
    }
    if (bak.kateter_warna !== '') {
      $('#bak_kateter_warna').prop('checked', true);
      $('#bak_kateter_warna_input').val(bak.ket_kateter_warna).attr('disabled', false);
    }
    if (bak.kandung_kemih !== '') {
      $('#bak_kandung_kemih').prop('checked', true)
    }
    if (bak.lain !== '') {
      $('#bak_lain').prop('checked', true);
      $('#bak_lain_input').val(bak.ket_lain).attr('disabled', false);
    }
    // end eleminasi bab

    // tulang
    var tulang = JSON.parse(data.tulang);
    if (tulang.fraktur_terbuka !== '') {
      $('#sm_tulang_fraktur_terbuka').prop('checked', true);
      $('#sm_tulang_fraktur_terbuka_lokasi').val(tulang.fraktur_terbuka_lokasi).attr('disabled', false);
    }
    if (tulang.fraktur_tertutup !== '') {
      $('#sm_tulang_fraktur_tertutup').prop('checked', true);
      $('#sm_tulang_fraktur_tertutup_lokasi').val(tulang.fraktur_tertutup_lokasi).attr('disabled', false);
    }
    if (tulang.amputasi !== '') {
      $('#sm_tulang_amputasi').prop('checked', true)
    }
    if (tulang.tumor_tulang !== '') {
      $('#sm_tulang_tumor_tulang').prop('checked', true)
    }
    if (tulang.nyeri_tulang !== '') {
      $('#sm_tulang_nyeri_tulang').prop('checked', true)
    }
    // end tulang

    // sendi
    var sendi = JSON.parse(data.sendi);
    if (sendi.dislokasi !== '') {
      $('#sm_sendi_dislokasi').prop('checked', true)
    }
    if (sendi.infeksi !== '') {
      $('#sm_sendi_infeksi').prop('checked', true)
    }
    if (sendi.nyeri !== '') {
      $('#sm_sendi_nyeri').prop('checked', true)
    }
    if (sendi.oedema !== '') {
      $('#sm_sendi_oedema').prop('checked', true)
    }
    if (sendi.lain !== '') {
      $('#sm_sendi_lain').prop('checked', true);
      $('#sm_sendi_lain_input').val(sendi.ket_lain).attr('disabled', false);
    }
    // end sendi

    // integumen warna
    var im = JSON.parse(data.integumen_warna);
    if (im.pucat !== '') {
      $('#si_warna_pucat').prop('checked', true)
    }
    if (im.sianosis !== '') {
      $('#si_warna_sianosis').prop('checked', true)
    }
    if (im.normal !== '') {
      $('#si_warna_normal').prop('checked', true)
    }
    if (im.lain !== '') {
      $('#si_warna_lain').prop('checked', true);
      $('#si_warna_lain_input').val(im.ket_lain).attr('disabled', false);
    }
    // end integumen warna

    // integumen turgor
    var it = JSON.parse(data.integumen_turgor);
    if (it.baik !== '') {
      $('#si_turgor_baik').prop('checked', true)
    }
    if (it.sedang !== '') {
      $('#si_turgor_sedang').prop('checked', true)
    }
    if (it.buruk !== '') {
      $('#si_turgor_buruk').prop('checked', true)
    }
    // end integumen turgor

    // integumen kulit
    var im = JSON.parse(data.integumen_kulit);
    if (im.normal !== '') {
      $('#si_kulit_normal').prop('checked', true)
    }
    if (im.kemerahan !== '') {
      $('#si_kulit_kemerahan').prop('checked', true)
    }
    if (im.lesi !== '') {
      $('#si_kulit_lesi').prop('checked', true)
    }
    if (im.luka !== '') {
      $('#si_kulit_luka').prop('checked', true)
    }
    if (im.memar !== '') {
      $('#si_kulit_memar').prop('checked', true)
    }
    if (im.petechie !== '') {
      $('#si_kulit_petechie').prop('checked', true)
    }
    if (im.bulae !== '') {
      $('#si_kulit_bulae').prop('checked', true)
    }
    if (im.lain !== '') {
      $('#si_kulit_lain').prop('checked', true);
      $('#si_kulit_lain_input').val(im.ket_lain).attr('disabled', false);
    }
    // end integumen kulit

    // penglihatan
    var penglihatan = JSON.parse(data.penglihatan);
    if (penglihatan.baik !== '') {
      $('#sin_penglihatan_baik').prop('checked', true)
    }
    if (penglihatan.buram !== '') {
      $('#sin_penglihatan_buram').prop('checked', true)
    }
    if (penglihatan.tidak_bisa_melihat !== '') {
      $('#sin_penglihatan_tidak_bisa_melihat').prop('checked', true)
    }
    if (penglihatan.pakai_alat_bantu !== '') {
      $('#sin_penglihatan_pakai_alat_bantu').prop('checked', true)
    }
    if (penglihatan.hypema !== '') {
      $('#sin_penglihatan_hypema').prop('checked', true)
    }
    // end penglihatan

    // penciuman
    var penciuman = JSON.parse(data.penciuman);
    if (penciuman.sekresi !== '') {
      $('#sin_penciuman_sekresi').prop('checked', true)
    }
    if (penciuman.polip !== '') {
      $('#sin_penciuman_polip').prop('checked', true)
    }
    if (penciuman.gangguan !== '') {
      $('#sin_penciuman_gangguan').prop('checked', true)
    }
    // end penciuman

    // pendengaran
    var pendengaran = JSON.parse(data.pendengaran);
    if (pendengaran.kurang_jelas !== '') {
      $('#sin_pendengaran_kurang_jelas').prop('checked', true)
    }
    if (pendengaran.baik !== '') {
      $('#sin_pendengaran_baik').prop('checked', true)
    }
    if (pendengaran.tidak_bisa_dengar !== '') {
      $('#sin_pendengaran_tidak_bisa_dengar').prop('checked', true)
    }
    if (pendengaran.pakai_alat_bantu !== '') {
      $('#sin_pendengaran_pakai_alat_bantu').prop('checked', true)
    }
    if (pendengaran.nyeri_telinga !== '') {
      $('#sin_pendengaran_nyeri_telinga').prop('checked', true)
    }
    // end pendengaran

    // pengecap
    var pengecap = JSON.parse(data.pengecap);
    if (pengecap.tidak_ada_kelainan !== '') {
      $('#sin_pengecap_tidak_ada_kelainan').prop('checked', true)
    }
    if (pengecap.gangguan_fungsi !== '') {
      $('#sin_pengecap_gangguan_fungsi').prop('checked', true)
    }
    if (pengecap.lain !== '') {
      $('#sin_pengecap_lain').prop('checked', true);
      $('#sin_pengecap_lain_input').val(pengecap.ket_lain).attr('disabled', false);
    }
    // end pengecap

    // persyarafan
    var syaraf = JSON.parse(data.persyarafan);
    if (syaraf.kesemutan !== '') {
      $('#sp_kesemutan').prop('checked', true)
    }
    if (syaraf.kelumpuhan !== '') {
      $('#sp_kelumpuhan').prop('checked', true);
      $('#sp_kelumpuhan_lokasi').val(syaraf.kelumpuhan_lokasi).attr('disabled', false);
    }
    if (syaraf.kejang !== '') {
      $('#sp_kejang').prop('checked', true)
    }
    if (syaraf.pusing !== '') {
      $('#sp_pusing').prop('checked', true)
    }
    if (syaraf.muntah !== '') {
      $('#sp_muntah').prop('checked', true)
    }
    if (syaraf.kaku_kuduk !== '') {
      $('#sp_kaku_kuduk').prop('checked', true)
    }
    if (syaraf.hemiparese !== '') {
      $('#sp_hemiparese').prop('checked', true)
    }
    if (syaraf.alasia !== '') {
      $('#sp_alasia').prop('checked', true)
    }
    if (syaraf.tremor !== '') {
      $('#sp_tremor').prop('checked', true)
    }
    if (syaraf.lain !== '') {
      $('#sp_lain').prop('checked', true);
      $('#sp_lain_input').val(syaraf.ket_lain).attr('disabled', false);
    }
    // end persyarafan

    // sistem reproduksi
    if (data.reproduksi_alat === 'Oedema') {
      $('#sr_alat_oedema').prop('checked', true).change()
    }
    if (data.reproduksi_alat === 'Oedema') {
      $('#sr_alat_varices').prop('checked', true).change()
    }
    if (data.reproduksi_alat === 'Oedema') {
      $('#sr_alat_hygiene').prop('checked', true).change()
    }

    if (data.reproduksi_alat === 'Hemoroid') {
      $('#sr_genital_hemoroid').prop('checked', true).change()
    }
    if (data.reproduksi_alat === 'Hipospadia') {
      $('#sr_genital_hipospadia').prop('checked', true).change()
    }
    if (data.reproduksi_alat === 'Masalah Prostat') {
      $('#sr_genital_masalah_prostat').prop('checked', true).change()
    }
    if (data.reproduksi_alat === 'Simetris') {
      $('#sr_genital_simetris').prop('checked', true).change()
    }
    if (data.reproduksi_alat === 'Asimetris') {
      $('#sr_genital_asimetris').prop('checked', true).change()
    }
    if (data.reproduksi_alat === 'Inflamasi') {
      $('#sr_genital_inflamasi').prop('checked', true).change()
    }
    if (data.reproduksi_alat === 'Nyeri') {
      $('#sr_genital_nyeri').prop('checked', true).change()
    }

    if (data.reproduksi_payudara === 'Massa') {
      $('#sr_payudara_massa').prop('checked', true).change()
    }
    if (data.reproduksi_payudara === 'Lesi') {
      $('#sr_payudara_lesi').prop('checked', true).change()
    }
    if (data.reproduksi_payudara === 'Lain') {
      $('#sr_payudara_lain').prop('checked', true).change()
    }
    $('#sr_payudara_lain_input').val(data.ket_reproduksi_payudara);
    // end sistem reproduksi

    // status psikologis
    var psikologis = JSON.parse(data.status_psikologis);
    if (psikologis.cemas !== '') {
      $('#sps_cemas').prop('checked', true)
    }
    if (psikologis.takut !== '') {
      $('#sps_takut').prop('checked', true)
    }
    if (psikologis.marah !== '') {
      $('#sps_marah').prop('checked', true)
    }
    if (psikologis.sedih !== '') {
      $('#sps_sedih').prop('checked', true)
    }
    if (psikologis.bunuh_diri !== '') {
      $('#sps_bunuh_diri').prop('checked', true)
    }
    if (psikologis.lain !== '') {
      $('#sps_lain').prop('checked', true);
      $('#sps_lain_input').val(psikologis.ket_lain).attr('disabled', false);
    }
    // end status psikologis

    // status mental
    var mental = JSON.parse(data.status_mental);
    if (mental.sadar !== '') {
      $('#smen_sadar').prop('checked', true)
    }
    if (mental.ada_masalah !== '') {
      $('#smen_ada_masalah').prop('checked', true);
      $('#smen_ada_masalah_input').val(mental.ket_ada_masalah).attr('disabled', false);
    }
    if (mental.perilaku_kekerasan !== '') {
      $('#smen_perilaku_kekerasan').prop('checked', true)
    }
    // end status mental

    // status keluarga
    if (data.status_keluarga === 'Serumah') {
      $('#kel_tinggal_serumah').prop('checked', true).change()
    }
    if (data.status_keluarga === 'Sendiri') {
      $('#kel_tinggal_sendiri').prop('checked', true).change()
    }
    if (data.status_keluarga === 'Lain') {
      $('#kel_tinggal_lain').prop('checked', true).change()
    }
    $('#kel_tinggal_lain_input').val(data.ket_status_keluarga);
    // end status keluarga

    if (data.status_hubungan_pasien === '0') {
      $('#hubungan_dengan_keluarga_tidak_baik').prop('checked', true).change()
    }
    if (data.status_hubungan_pasien === '1') {
      $('#hubungan_dengan_keluarga_baik').prop('checked', true).change()
    }

    // tempat tinggal
    if (data.tempat_tinggal === 'Serumah') {
      $('#tempat_tinggal_rumah').prop('checked', true).change()
    }
    if (data.tempat_tinggal === 'Apartemen') {
      $('#tempat_tinggal_apart').prop('checked', true).change()
    }
    if (data.tempat_tinggal === 'Panti') {
      $('#tempat_tinggal_panti').prop('checked', true).change()
    }
    if (data.tempat_tinggal === 'Lain') {
      $('#tempat_tinggal_lain').prop('checked', true).change()
    }
    $('#tempat_tinggal_lain_input').val(data.ket_tempat_tinggal);
    // end tempat tinggal

    // keyakinan
    if (data.keyakinan === '0') {
      $('#snk_keyakinan_tidak').prop('checked', true).change()
    }
    if (data.keyakinan === '1') {
      $('#snk_keyakinan_ya').prop('checked', true).change()
    }
    $('#snk_keyakinan_ya_input').val(data.ket_keyakinan);
    // end keyakinan

    // nilai_kepercayaan
    if (data.nilai_kepercayaan === '0') {
      $('#snk_nilai_kepercayaan_tidak').prop('checked', true).change()
    }
    if (data.nilai_kepercayaan === '1') {
      $('#snk_nilai_kepercayaan_ya').prop('checked', true).change()
    }
    $('#snk_nilai_kepercayaan_ya_input').val(data.ket_nilai_kepercayaan);
    // end nilai_kepercayaan

    $('#snk_kebiasaan_keagamaan').val(data.kebiasaan_keagamaan);

    // wajib ibadah
    if (data.wajib_ibadah === 'Baligh') {
      $('#wajib_ibadah_baligh').prop('checked', true).change()
    }
    if (data.wajib_ibadah === 'Belum Baligh') {
      $('#wajib_ibadah_belum').prop('checked', true).change()
    }
    if (data.wajib_ibadah === 'Halangan') {
      $('#wajib_ibadah_halangan').prop('checked', true).change()
    }
    $('#wajib_ibadah_halangan_input').val(data.ket_wajib_ibadah_halangan);
    // end wajib ibadah

    if (data.thaharoh === 'Berwudhu') {
      $('#thaharoh_berwudhu').prop('checked', true).change()
    }
    if (data.thaharoh === 'Tayamum') {
      $('#thaharoh_tayamum').prop('checked', true).change()
    }

    if (data.sholat === 'Berdiri') {
      $('#sholat_berdiri').prop('checked', true).change()
    }
    if (data.sholat === 'Duduk') {
      $('#sholat_duduk').prop('checked', true).change()
    }
    if (data.sholat === 'Berbaring') {
      $('#sholat_berbaring').prop('checked', true).change()
    }

    // nilai budaya
    if (data.nilai_budaya === 'Hukuman') {
      $('#nb_hukuman').prop('checked', true).change()
    }
    if (data.nilai_budaya === 'Ujian') {
      $('#nb_ujian').prop('checked', true).change()
    }
    if (data.nilai_budaya === 'Kesalahan') {
      $('#nb_kesalahan').prop('checked', true).change()
    }
    if (data.nilai_budaya === 'Takdir') {
      $('#nb_takdir').prop('checked', true).change()
    }
    if (data.nilai_budaya === 'Buatan Orang Lain') {
      $('#nb_buatan_orang').prop('checked', true).change()
    }
    if (data.nilai_budaya === 'Lain') {
      $('#nb_lain').prop('checked', true).change()
    }
    $('#nb_lain_input').val(data.ket_nilai_budaya);
    // end nilai budaya

    $('#nb_pola_aktivitas').val(data.budaya_pola_aktivitas);

    // pola komunikasi
    if (data.pola_komunikasi === 'Normal') {
      $('#pk_normal').prop('checked', true).change()
    }
    if (data.pola_komunikasi === 'Introvert') {
      $('#pk_introvert').prop('checked', true).change()
    }
    if (data.pola_komunikasi === 'Extrovert') {
      $('#pk_extrovert').prop('checked', true).change()
    }
    if (data.pola_komunikasi === 'Lain') {
      $('#pk_lain').prop('checked', true).change()
    }
    $('#pk_lain_input').val(data.ket_pola_komunikasi);
    // end pola komunikasi

    // pola makan
    if (data.pola_makan === 'Sehat') {
      $('#pm_sehat').prop('checked', true).change()
    }
    if (data.pola_makan === 'Tidak Sehat') {
      $('#pm_tidak_sehat').prop('checked', true).change()
    }
    if (data.makanan_pokok === 'Nasi') {
      $('#mp_nasi').prop('checked', true).change()
    }
    if (data.makanan_pokok === 'Selain Nasi') {
      $('#mp_selain').prop('checked', true).change()
    }
    $('#mp_selain_nasi_input').val(data.ket_makanan_pokok);
    // end pola makan

    // pantang makanan
    if (data.pantang_makanan === '0') {
      $('#pantang_makanan_tidak').prop('checked', true).change()
    }
    if (data.pantang_makanan === '1') {
      $('#pantang_makanan_ya').prop('checked', true).change()
    }
    $('#pantang_makanan_ya_input').val(data.ket_pantang_makanan);
    // end pantang makanan

    // konsumsi makanan luar
    if (data.konsumsi_makanan_luar === '0') {
      $('#konsumsi_makanan_luar_tidak').prop('checked', true).change()
    }
    if (data.konsumsi_makanan_luar === '1') {
      $('#konsumsi_makanan_luar_ya').prop('checked', true).change()
    }
    $('#konsumsi_makanan_luar_ya_input').val(data.ket_konsumsi_makanan_luar);
    // end konsumsi makanan luar

    // kepercayaan penyakit
    if (data.kepercayaan_penyakit === '0') {
      $('#kepercayaan_penyakit_tidak').prop('checked', true).change()
    }
    if (data.kepercayaan_penyakit === '1') {
      $('#kepercayaan_penyakit_ya').prop('checked', true).change()
    }
    $('#kepercayaan_penyakit_ya_input').val(data.ket_kepercayaan_penyakit);
    // end kepercayaan penyakit

    if (data.kewarganegaraan === 'WNI') {
      $('#kewarganegaraan_wni').prop('checked', true).change()
    }
    if (data.kewarganegaraan === 'WNA') {
      $('#kewarganegaraan_wna').prop('checked', true).change()
    }
    $('#suku_bangsa').val(data.suku_bangsa);

    if (data.bicara === 'Normal') {
      $('#bicara_normal').prop('checked', true).change()
    }
    if (data.bicara === 'Gangguan Bicara') {
      $('#bicara_gangguan').prop('checked', true).change()
    }
    $('#bicara_input').val(data.ket_bicara);

    if (data.perlu_penterjemah === '0') {
      $('#perlu_penterjemah_tidak').prop('checked', true).change()
    }
    if (data.perlu_penterjemah === '1') {
      $('#perlu_penterjemah_ya').prop('checked', true).change()
    }
    $('#perlu_penterjemah_input').val(data.perlu_penterjemah_bahasa);

    if (data.bahasa_isyarat === '0') {
      $('#bahasa_isyarat_tidak').prop('checked', true).change()
    }
    if (data.bahasa_isyarat === '1') {
      $('#bahasa_isyarat_ya').prop('checked', true).change()
    }

    if (data.pemahaman_penyakit === '0') {
      $('#pt_penyakit_perawatan_tidak').prop('checked', true).change()
    }
    if (data.pemahaman_penyakit === '1') {
      $('#pt_penyakit_perawatan_ya').prop('checked', true).change()
    }
    if (data.pemahaman_pengobatan === '0') {
      $('#pt_pengobatan_tidak').prop('checked', true).change()
    }
    if (data.pemahaman_pengobatan === '1') {
      $('#pt_pengobatan_ya').prop('checked', true).change()
    }
    if (data.pemahaman_nutrisi_diet === '0') {
      $('#pt_nutrisi_diet_tidak').prop('checked', true).change()
    }
    if (data.pemahaman_nutrisi_diet === '1') {
      $('#pt_nutrisi_diet_ya').prop('checked', true).change()
    }
    if (data.pemahaman_spiritual === '0') {
      $('#pt_spiritual_tidak').prop('checked', true).change()
    }
    if (data.pemahaman_spiritual === '1') {
      $('#pt_spiritual_ya').prop('checked', true).change()
    }
    if (data.pemahaman_peralatan_medis === '0') {
      $('#pt_peralatan_medis_tidak').prop('checked', true).change()
    }
    if (data.pemahaman_peralatan_medis === '1') {
      $('#pt_peralatan_medis_ya').prop('checked', true).change()
    }
    if (data.pemahaman_rehab_medik === '0') {
      $('#pt_rehab_medik_tidak').prop('checked', true).change()
    }
    if (data.pemahaman_rehab_medik === '1') {
      $('#pt_rehab_medik_ya').prop('checked', true).change()
    }
    if (data.pemahaman_manajemen_nyeri === '0') {
      $('#pt_manajemen_nyeri_tidak').prop('checked', true).change()
    }
    if (data.pemahaman_manajemen_nyeri === '1') {
      $('#pt_manajemen_nyeri_ya').prop('checked', true).change()
    }

    // hamabatan menerima edukasi
    var edukasi = JSON.parse(data.hambatan_menerima_edukasi);
    for (let i = 1; i <= 10; i++) {
      if (edukasi['hambatan_' + i] !== '') {
        $('#hambatan_edukasi_' + i).prop('checked', true)
      }
    }
    // hamabatan menerima edukasi

    // status skrining nutrisi
    if (data.sn_penurunan_bb == 1) {
      $('#sn_tidak').prop('checked', true);
      calcscore();
    } else if (data.sn_penurunan_bb == 2) {
      $('#sn_tidak_yakin').prop('checked', true);
      calcscore();
    } else if (data.sn_penurunan_bb == 3) {
      $('#sn_ya').prop('checked', true).change();
      if (data.sn_penurunan_bb_on == 1) {
        $('#sn_pbb_1').prop('checked', true);
        calcscore();
      } else if (data.sn_penurunan_bb_on == 2) {
        $('#sn_pbb_2').prop('checked', true);
        calcscore();
      } else if (data.sn_penurunan_bb_on == 3) {
        $('#sn_pbb_3').prop('checked', true);
        calcscore();
      } else if (data.sn_penurunan_bb_on == 4) {
        $('#sn_pbb_4').prop('checked', true);
        calcscore();
      } else if (data.sn_penurunan_bb_on == 5) {
        $('#sn_pbb_5').prop('checked', true);
        calcscore();
      }
    }

    if (data.sn_asupan_makan == 0) {
      $('#sn_asupan_makan_tidak').prop('checked', true);
      calcscore();
    } else if (data.sn_asupan_makan == 1) {
      $('#sn_asupan_makan_ya').prop('checked', true);
      calcscore();
    }
    // end skrining nutrisi

    if (data.nilai_fungsi_makan === '0') {
      $('#pkf_makan_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_makan === '5') {
      $('#pkf_makan_2').prop('checked', true).change()
    }
    if (data.nilai_fungsi_makan === '10') {
      $('#pkf_makan_3').prop('checked', true).change()
    }

    if (data.nilai_fungsi_mandi === '0') {
      $('#pkf_mandi_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_mandi === '5') {
      $('#pkf_mandi_2').prop('checked', true).change()
    }

    if (data.nilai_fungsi_personal === '0') {
      $('#pkf_personal_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_personal === '5') {
      $('#pkf_personal_2').prop('checked', true).change()
    }

    if (data.nilai_fungsi_berpakaian === '0') {
      $('#pkf_berpakaian_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_berpakaian === '5') {
      $('#pkf_berpakaian_2').prop('checked', true).change()
    }
    if (data.nilai_fungsi_berpakaian === '10') {
      $('#pkf_berpakaian_3').prop('checked', true).change()
    }

    if (data.nilai_fungsi_bab === '0') {
      $('#pkf_bab_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_bab === '5') {
      $('#pkf_bab_2').prop('checked', true).change()
    }
    if (data.nilai_fungsi_bab === '10') {
      $('#pkf_bab_3').prop('checked', true).change()
    }

    if (data.nilai_fungsi_bak === '0') {
      $('#pkf_bak_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_bak === '5') {
      $('#pkf_bak_2').prop('checked', true).change()
    }
    if (data.nilai_fungsi_bak === '10') {
      $('#pkf_bak_3').prop('checked', true).change()
    }

    if (data.nilai_fungsi_berpindah === '0') {
      $('#pkf_berpindah_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_berpindah === '5') {
      $('#pkf_berpindah_2').prop('checked', true).change()
    }
    if (data.nilai_fungsi_berpindah === '10') {
      $('#pkf_berpindah_3').prop('checked', true).change()
    }
    if (data.nilai_fungsi_berpindah === '15') {
      $('#pkf_berpindah_4').prop('checked', true).change()
    }

    if (data.nilai_fungsi_toiletting === '0') {
      $('#pkf_toiletting_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_toiletting === '5') {
      $('#pkf_toiletting_2').prop('checked', true).change()
    }
    if (data.nilai_fungsi_toiletting === '10') {
      $('#pkf_toiletting_3').prop('checked', true).change()
    }

    if (data.nilai_fungsi_mobilisasi === '0') {
      $('#pkf_mobilisasi_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_mobilisasi === '5') {
      $('#pkf_mobilisasi_2').prop('checked', true).change()
    }
    if (data.nilai_fungsi_mobilisasi === '10') {
      $('#pkf_mobilisasi_3').prop('checked', true).change()
    }
    if (data.nilai_fungsi_mobilisasi === '15') {
      $('#pkf_mobilisasi_4').prop('checked', true).change()
    }

    if (data.nilai_fungsi_naik_turun_tangga === '0') {
      $('#pkf_naikturuntangga_1').prop('checked', true).change()
    }
    if (data.nilai_fungsi_naik_turun_tangga === '5') {
      $('#pkf_naikturuntangga_2').prop('checked', true).change()
    }
    if (data.nilai_fungsi_naik_turun_tangga === '10') {
      $('#pkf_naikturuntangga_3').prop('checked', true).change()
    }

    if (data.nilai_tingkat_nyeri === 'Ringan') {
      $('#ptn_keterangan_ringan').prop('checked', true).change()
    }
    if (data.nilai_tingkat_nyeri === 'Sedang') {
      $('#ptn_keterangan_sedang').prop('checked', true).change()
    }
    if (data.nilai_tingkat_nyeri === 'Berat') {
      $('#ptn_keterangan_berat').prop('checked', true).change()
    }

    // nyeri hilang
    var nyeri_hilang = JSON.parse(data.nyeri_hilang);
    if (nyeri_hilang.minum_obat !== '') {
      $('#ptn_minum_obat').prop('checked', true)
    }
    if (nyeri_hilang.mendengarkan_musik !== '') {
      $('#ptn_mendengarkan_musik').prop('checked', true)
    }
    if (nyeri_hilang.istirahat !== '') {
      $('#ptn_istirahat').prop('checked', true)
    }
    if (nyeri_hilang.berubah_posisi !== '') {
      $('#ptn_berubah_posisi').prop('checked', true)
    }
    if (nyeri_hilang.lain !== '') {
      $('#ptn_lain').prop('checked', true);
      $('#ptn_lain_input').val(nyeri_hilang.ket_lain).attr('disabled', false);
    }
    // end nyeri hilang

    if (data.prjd_riwayat_jatuh === '25') {
      $('#prjd_riwayat_jatuh_ya').prop('checked', true).change()
    }
    if (data.prjd_diagnosis_sekunder === '15') {
      $('#prjd_diagnosis_sekunder_ya').prop('checked', true).change()
    }
    if (data.prjd_alat_bantu_jalan_1 === '0') {
      $('#alat_bantu_jalan_1').prop('checked', true);
      $('#alat_bantu_jalan_1_ya').prop('checked', true).attr('disabled', false).change()
    }
    if (data.prjd_alat_bantu_jalan_2 === '15') {
      $('#alat_bantu_jalan_2').prop('checked', true);
      $('#alat_bantu_jalan_2_ya').prop('checked', true).attr('disabled', false).change()
    }
    if (data.prjd_alat_bantu_jalan_3 === '30') {
      $('#alat_bantu_jalan_3').prop('checked', true);
      $('#alat_bantu_jalan_3_ya').prop('checked', true).attr('disabled', false).change()
    }

    if (data.prjd_terpasang_infus === '20') {
      $('#prjd_terpasang_infus_ya').prop('checked', true).change()
    }
    if (data.prjd_cara_berjalan_1 === '0') {
      $('#cara_berjalan_1').prop('checked', true);
      $('#cara_berjalan_1_ya').prop('checked', true).attr('disabled', false).change()
    }
    if (data.prjd_cara_berjalan_2 === '10') {
      $('#cara_berjalan_2').prop('checked', true);
      $('#cara_berjalan_2_ya').prop('checked', true).attr('disabled', false).change()
    }
    if (data.prjd_cara_berjalan_3 === '20') {
      $('#cara_berjalan_3').prop('checked', true);
      $('#cara_berjalan_3_ya').prop('checked', true).attr('disabled', false).change()
    }
    if (data.prjd_status_mental_1 === '0') {
      $('#status_mental_1').prop('checked', true);
      $('#status_mental_1_ya').prop('checked', true).attr('disabled', false).change()
    }
    if (data.prjd_status_mental_2 === '15') {
      $('#status_mental_2').prop('checked', true);
      $('#status_mental_2_ya').prop('checked', true).attr('disabled', false).change()
    }

    // penilaian resiko jatuh lansia
    // riwayat jatuh
    if (data.prjl_riwayat_jatuh === '6') {
      $('#prjl_riwayat_jatuh_ya').prop('checked', true).change()
    }
    if (data.prjl_riwayat_jatuh === '0') {
      $('#prjl_riwayat_jatuh_tidak').prop('checked', true).change()
    }
    if (data.prjl_riwayat_jatuh_opt === '6') {
      $('#prjl_riwayat_jatuh_opt_ya').prop('checked', true).change()
    }
    if (data.prjl_riwayat_jatuh_opt === '0') {
      $('#prjl_riwayat_jatuh_opt_tidak').prop('checked', true).change()
    }
    // riwayat jatuh

    // status mental
    if (data.prjl_status_mental === '14') {
      $('#prjl_status_mental_ya').prop('checked', true).change()
    }
    if (data.prjl_status_mental === '0') {
      $('#prjl_status_mental_tidak').prop('checked', true).change()
    }
    if (data.prjl_status_mental_opt_1 === '14') {
      $('#prjl_status_mental_opt_1_ya').prop('checked', true).change()
    }
    if (data.prjl_status_mental_opt_1 === '0') {
      $('#prjl_status_mental_opt_1_tidak').prop('checked', true).change()
    }
    if (data.prjl_status_mental_opt_2 === '14') {
      $('#prjl_status_mental_opt_2_ya').prop('checked', true).change()
    }
    if (data.prjl_status_mental_opt_2 === '0') {
      $('#prjl_status_mental_opt_2_tidak').prop('checked', true).change()
    }
    // status mental

    // penglihatan
    if (data.prjl_penglihatan === '1') {
      $('#prjl_penglihatan_ya').prop('checked', true).change()
    }
    if (data.prjl_penglihatan === '0') {
      $('#prjl_penglihatan_tidak').prop('checked', true).change()
    }
    if (data.prjl_penglihatan_opt_1 === '1') {
      $('#prjl_penglihatan_opt_1_ya').prop('checked', true).change()
    }
    if (data.prjl_penglihatan_opt_1 === '0') {
      $('#prjl_penglihatan_opt_1_tidak').prop('checked', true).change()
    }
    if (data.prjl_penglihatan_opt_2 === '1') {
      $('#prjl_penglihatan_opt_2_ya').prop('checked', true).change()
    }
    if (data.prjl_penglihatan_opt_2 === '0') {
      $('#prjl_penglihatan_opt_2_tidak').prop('checked', true).change()
    }
    // penglihatan

    // kebiasaan berkemih
    if (data.prjl_berkemih === '2') {
      $('#prjl_berkemih_ya').prop('checked', true).change()
    }
    if (data.prjl_berkemih === '0') {
      $('#prjl_berkemih_tidak').prop('checked', true).change()
    }
    // end kebiasaan berkemih

    // transfer
    if (data.prjl_transfer === '0') {
      $('#prjl_transfer_1').prop('checked', true).change()
    }
    if (data.prjl_transfer === '1') {
      $('#prjl_transfer_2').prop('checked', true).change()
    }
    if (data.prjl_transfer === '2') {
      $('#prjl_transfer_3').prop('checked', true).change()
    }
    if (data.prjl_transfer === '3') {
      $('#prjl_transfer_4').prop('checked', true).change()
    }
    // end transfer


    // mobilitas
    if (data.prjl_mobilitas === '0') {
      $('#prjl_mobilitas_1').prop('checked', true).change()
    }
    if (data.prjl_mobilitas === '1') {
      $('#prjl_mobilitas_2').prop('checked', true).change()
    }
    if (data.prjl_mobilitas === '2') {
      $('#prjl_mobilitas_3').prop('checked', true).change()
    }
    if (data.prjl_mobilitas === '3') {
      $('#prjl_mobilitas_4').prop('checked', true).change()
    }
    // end mobilitas
    // end penilaian resiko jatuh lansia


    // skrining pasien akhir kehidupan
    // var spak = JSON.parse(data.skrining_pasien_akhir_kehidupan);
    // for (let i = 1; i <= 5; i++) {
    //   if (spak['kriteria_' + i] !== '0') {
    //     $('#spak_' + i + '_ya').prop('checked', true)
    //   }
    // }
    // end skrining pasien akhir kehidupan


    // BARU DIBENERIN
    var spak = JSON.parse(data.skrining_pasien_akhir_kehidupan);
      // Mengonversi string JSON (data.skrining_pasien_akhir_kehidupan) menjadi objek JavaScript 
      // dan menyimpannya dalam variabel `spak`.

      for (let i = 1; i <= 5; i++) {
        // Melakukan iterasi melalui angka 1 hingga 5 (sesuai dengan kriteria yang mungkin ada).

        if (spak['kriteria_' + i] !== '0') {
          // Mengecek apakah nilai properti 'kriteria_1', 'kriteria_2', ..., 'kriteria_5' di dalam objek `spak` 
          // tidak sama dengan '0'.

          $('#spak_' + i + '_ya').prop('checked', true);
          // Jika kondisi terpenuhi, maka input checkbox dengan ID seperti '#spak_1_ya', '#spak_2_ya', ..., '#spak_5_ya'
          // diatur ke status "checked" (tercentang).
        }
      }






    // geriatri
    var geriatri = JSON.parse(data.pk_geriatri);
    if (geriatri.gangguan_penglihatan === '1') {
      $('#pk_geriatri_1_ya').prop('checked', true).change()
    }
    $('#pk_geriatri_1_input').val(geriatri.ket_gangguan_penglihatan);
    if (geriatri.gangguan_pendengaran === '1') {
      $('#pk_geriatri_2_ya').prop('checked', true).change()
    }
    $('#pk_geriatri_2_input').val(geriatri.ket_gangguan_pendengaran);

    if (geriatri.gangguan_berkemih === '1') {
      $('#pk_geriatri_3_ya').prop('checked', true).change()
    }
    if (geriatri.ket_gangguan_berkemih.inkontinensia !== '') {
      $('#pk_geriatri_inkontinensia').prop('checked', true)
    }
    if (geriatri.ket_gangguan_berkemih.disuria !== '') {
      $('#pk_geriatri_disuria').prop('checked', true)
    }
    if (geriatri.ket_gangguan_berkemih.oliguria !== '') {
      $('#pk_geriatri_oliguria').prop('checked', true)
    }
    if (geriatri.ket_gangguan_berkemih.anuria !== '') {
      $('#pk_geriatri_anuria').prop('checked', true)
    }

    if (geriatri.gangguan_daya_ingat === '1') {
      $('#pk_geriatri_4_ya').prop('checked', true).change()
    }
    $('#pk_geriatri_4_input').val(geriatri.ket_gangguan_daya_ingat);
    if (geriatri.gangguan_bicara === '1') {
      $('#pk_geriatri_5_ya').prop('checked', true).change()
    }
    $('#pk_geriatri_5_input').val(geriatri.ket_gangguan_bicara);
    // end geriatri

    // penyakit menular
    var penyakit_menular = JSON.parse(data.pk_penyakit_menular);
    if (penyakit_menular.penyakit_saat_ini === '0') {
      $('#pk_penyakit_menular_1_tidak').prop('checked', true).change()
    }
    if (penyakit_menular.penyakit_saat_ini === '1') {
      $('#pk_penyakit_menular_1_ya').prop('checked', true).change()
    }

    if (penyakit_menular.informasi_dari.dokter !== '') {
      $('#pk_pm_dokter').prop('checked', true)
    }
    if (penyakit_menular.informasi_dari.perawat !== '') {
      $('#pk_pm_perawat').prop('checked', true)
    }
    if (penyakit_menular.informasi_dari.keluarga !== '') {
      $('#pk_pm_keluarga').prop('checked', true)
    }
    if (penyakit_menular.informasi_dari.lain !== '') {
      $('#pk_pm_lain').prop('checked', true)
    }
    if (penyakit_menular.informasi_dari.ket_lain !== '') {
      $('#pk_pm_lain_input').val(penyakit_menular.informasi_dari.ket_lain).attr('disabled', false)
    }

    if (penyakit_menular.informasi_jangka_waktu === '0') {
      $('#pk_penyakit_menular_3_tidak').prop('checked', true).change()
    }
    if (penyakit_menular.informasi_jangka_waktu === '1') {
      $('#pk_penyakit_menular_3_ya').prop('checked', true).change()
    }
    $('#pk_penyakit_menular_3_input').val(penyakit_menular.ket_informasi_jangka_waktu);

    if (penyakit_menular.pemeriksaan_rutin === '0') {
      $('#pk_penyakit_menular_4_tidak').prop('checked', true).change()
    }
    if (penyakit_menular.pemeriksaan_rutin === '1') {
      $('#pk_penyakit_menular_4_ya').prop('checked', true).change()
    }
    $('#pk_penyakit_menular_4_input').val(penyakit_menular.ket_pemeriksaan_rutin);

    if (penyakit_menular.cara_penularan.airbone !== '') {
      $('#pk_pm_airbone').prop('checked', true)
    }
    if (penyakit_menular.cara_penularan.droplet !== '') {
      $('#pk_pm_droplet').prop('checked', true)
    }
    if (penyakit_menular.cara_penularan.kontak_langsung !== '') {
      $('#pk_pm_kontak_langsung').prop('checked', true)
    }
    if (penyakit_menular.cara_penularan.cairan_tubuh !== '') {
      $('#pk_pm_cairan_tubuh').prop('checked', true)
    }

    if (penyakit_menular.penyakit_penyerta === '0') {
      $('#pk_penyakit_menular_6_tidak').prop('checked', true).change()
    }
    if (penyakit_menular.penyakit_penyerta === '1') {
      $('#pk_penyakit_menular_6_ya').prop('checked', true).change()
    }
    $('#pk_penyakit_menular_6_input').val(penyakit_menular.ket_penyakit_penyerta);
    // end penyakit menular

    // penurunan daya tahan tubuh
    var pdtt = JSON.parse(data.pk_penurunan_daya_tahan);
    if (pdtt.penyakit_saat_ini === '0') {
      $('#pk_penyakit_pdtt_1_tidak').prop('checked', true).change()
    }
    if (pdtt.penyakit_saat_ini === '1') {
      $('#pk_penyakit_pdtt_1_ya').prop('checked', true).change()
    }

    if (pdtt.informasi_dari.dokter !== '') {
      $('#pk_pdtt_dokter').prop('checked', true)
    }
    if (pdtt.informasi_dari.perawat !== '') {
      $('#pk_pdtt_perawat').prop('checked', true)
    }
    if (pdtt.informasi_dari.keluarga !== '') {
      $('#pk_pdtt_keluarga').prop('checked', true)
    }
    if (pdtt.informasi_dari.lain !== '') {
      $('#pk_pdtt_lain').prop('checked', true)
    }
    if (pdtt.informasi_dari.ket_lain !== '') {
      $('#pk_pdtt_lain_input').val(pdtt.informasi_dari.ket_lain).attr('disabled', false)
    }

    if (pdtt.informasi_jangka_waktu === '0') {
      $('#pk_penyakit_pdtt_3_tidak').prop('checked', true).change()
    }
    if (pdtt.informasi_jangka_waktu === '1') {
      $('#pk_penyakit_pdtt_3_ya').prop('checked', true).change()
    }
    $('#pk_penyakit_pdtt_3_input').val(pdtt.ket_informasi_jangka_waktu);

    if (pdtt.pemeriksaan_rutin === '0') {
      $('#pk_penyakit_pdtt_4_tidak').prop('checked', true).change()
    }
    if (pdtt.pemeriksaan_rutin === '1') {
      $('#pk_penyakit_pdtt_4_ya').prop('checked', true).change()
    }
    $('#pk_penyakit_pdtt_4_input').val(pdtt.ket_pemeriksaan_rutin);

    if (pdtt.penyakit_penyerta === '0') {
      $('#pk_penyakit_pdtt_5_tidak').prop('checked', true).change()
    }
    if (pdtt.penyakit_penyerta === '1') {
      $('#pk_penyakit_pdtt_5_ya').prop('checked', true).change()
    }
    $('#pk_penyakit_pdtt_5_input').val(pdtt.ket_penyakit_penyerta);
    // end penurunan daya tahan tubuh

    // kesehatan jiwa
    var kj = JSON.parse(data.pk_kesehatan_jiwa);
    for (let i = 1; i <= 9; i++) {
      if (kj['ket_' + i] !== '0') {
        $('#pk_kesehatan_jiwa_' + i + '_ya').prop('checked', true)
      }
    }
    // end kesehatan jiwa

    // pasien kekerasan
    var kekerasan = JSON.parse(data.pk_pasien_kekerasan);
    for (let i = 1; i <= 6; i++) {
      if (kekerasan['ket_' + i] !== '0') {
        $('#pk_pasien_kekerasan_' + i + '_ya').prop('checked', true)
      }
      if (kekerasan['ket_' + i] !== '') {
        $('#pk_pasien_kekerasan_' + i).val(kekerasan['ket_' + i])
      }
    }
    // end pasien kekerasan

    // pasien ketergantungan
    var ketergantungan = JSON.parse(data.pk_pasien_ketergantungan);
    if (ketergantungan.obat !== '0') {
      $('#pk_pasien_ketergantungan_obat_ya').prop('checked', true).change()
    }
    if (ketergantungan.ket_obat !== '') {
      $('#pk_pasien_ketergantungan_obat_input').val(ketergantungan.ket_obat)
    }
    if (ketergantungan.lama_ketergantungan !== '') {
      $('#pk_pasien_lama_ketergantungan_obat_input').val(ketergantungan.lama_ketergantungan)
    }
    // end pasien ketergantungan


    // NEWS (DEWASA)
    for (let a = 1; a <= 8; a++) { 
        for (let b = 1; b <= 7; b++) { 
            if (data.sew_laju_respirasi === $('#skalanewst_' + a + '_' + b).val() && 
                data.sew_laju_respirasi === $('.news_respirasit_' + a + '_' + b).val()) {
                $('#skalanewst_' + a + '_' + b).prop('checked', true).change();
            }
            if (data.sew_saturasi === $('#skalanewst_' + a + '_' + b).val() && 
                data.sew_saturasi === $('.news_ppokt_' + a + '_' + b).val()) {
                $('#skalanewst_' + a + '_' + b).prop('checked', true).change();
            }
            if (data.sew_suplemen === $('#skalanewst_' + a + '_' + b).val() && 
                data.sew_suplemen === $('.news_skalat_' + a + '_' + b).val()) {
                $('#skalanewst_' + a + '_' + b).prop('checked', true).change();
            }
            if (data.sew_temperatur === $('#skalanewst_' + a + '_' + b).val() && 
                data.sew_temperatur === $('.news_skalat_' + a + '_' + b).val()) {
                $('#skalanewst_' + a + '_' + b).prop('checked', true).change();
            }
            if (data.sew_tds === $('#skalanewst_' + a + '_' + b).val() && 
                data.sew_tds === $('.news_tdst_' + a + '_' + b).val()) {
                $('#skalanewst_' + a + '_' + b).prop('checked', true).change();
            }
            if (data.sew_laju_jantung === $('#skalanewst_' + a + '_' + b).val() && 
                data.sew_laju_jantung === $('.news_nadiht_' + a + '_' + b).val()) {
                $('#skalanewst_' + a + '_' + b).prop('checked', true).change();
            }
            if (data.sew_kesadaran === $('#skalanewst_' + a + '_' + b).val() && 
                data.sew_kesadaran === $('.news_kesadaranyt_' + a + '_' + b).val()) {
                $('#skalanewst_' + a + '_' + b).prop('checked', true).change();
            }
            if (data.suhunewst === $('#skalanewst_' + a + '_' + b).val() && 
                data.suhunewst === $('.news_sihut_' + a + '_' + b).val()) {
                $('#skalanewst_' + a + '_' + b).prop('checked', true).change();
            }
        }
    }


    // masalah keperawatan
    var kep = JSON.parse(data.masalah_keperawatan);
    for (let i = 1; i <= 34; i++) {
      if (kep['ket_' + i] !== '') {
        $('#masalah_keperawatan_' + i).prop('checked', true)
      }
      if (kep.ket_lain !== '') {
        $('#masalah_keperawatan_lain_input').val(kep.ket_lain).attr('disabled', false)
      }
    }
    // end masalah keperawatan

    // perencanaan pulang
    var pp = JSON.parse(data.perencanaan_pulang);
    for (let i = 1; i <= 4; i++) {
      if (pp['planning_' + i] !== '0') {
        $('#discharge_planning_' + i + '_ya').prop('checked', true)
      }
      for (let j = 1; j <= 9; j++) {
        if (pp.kriteria['kriteria_' + j] !== '') {
          $('#kriteria_discharge_' + j).prop('checked', true)
        }
        if (pp.kriteria.kriteria_lain !== '') {
          $('#kriteria_discharge_lain_input').val(pp.kriteria.kriteria_lain).attr('disabled', false)
        }
      }
    }
    // end perencanaan pulang

    // $('#perawat').val(data.id_perawat);
    // $('#s2id_perawat a .select2c-chosen').html(data.perawat);
    
    // // digital signature
    // if (data.ttd_perawat !== null) {
    //   $('#ttd_perawat').hide();
    //   $('#ttd_perawat_verified').show();
    // }
    
    
    $('#tanggal_ttd_perawat').val((data.waktu_ttd_perawat !== null ?datetimefmysql(data.waktu_ttd_perawat) : '<?= date('d/m/Y H:i:s') ?>'));
    if (data.id_perawat !== null) {
      $('#perawat').select2c('readonly', false)
      $('#perawat').val(data.id_perawat)
      $('#s2id_perawat a .select2c-chosen').html(data.perawat)
    }

    if (data.ttd_perawat === '1') {
        $('#ttd_perawat').prop('checked', true)
        $('#ttd_perawat').hide()
        $('#ttd_perawat_verified').show()
    } else {
        $('#ttd_perawat').prop('checked', false)
        $('#ttd_perawat').show()
        $('#ttd_perawat_verified').hide()
    }


    
    // $('#verifikasi_dokter_dpjp').val(data.id_verifikasi_dokter_dpjp);
    // $('#s2id_verifikasi_dokter_dpjp a .select2c-chosen').html(data.verifikator_dpjp);
    
    // if (data.ttd_verifikasi_dokter_dpjp !== null) {
    //   $('#ttd_verifikasi_dokter_dpjp').hide();
    //   $('#ttd_verifikasi_dokter_dpjp_verified').show();
    // }
    
    
    
    
    $('#tanggal_verifikasi_dokter_dpjp').val((data.waktu_ttd_verifikasi_dokter_dpjp !== null ?datetimefmysql(data.waktu_ttd_verifikasi_dokter_dpjp) : '<?= date('d/m/Y H:i:s') ?>'));
    if (data.id_verifikasi_dokter_dpjp !== null) {
        $('#verifikasi_dokter_dpjp').select2c('readonly', false)
        $('#verifikasi_dokter_dpjp').val(data.id_verifikasi_dokter_dpjp)
        $('#s2id_verifikasi_dokter_dpjp a .select2c-chosen').html(data.verifikator_dpjp)
    }

    if (data.ttd_verifikasi_dokter_dpjp === '1') {
        $('#ttd_verifikasi_dokter_dpjp').prop('checked', true)
        $('#ttd_verifikasi_dokter_dpjp').hide()
        $('#ttd_verifikasi_dokter_dpjp_verified').show()
    } else {
        $('#ttd_verifikasi_dokter_dpjp').prop('checked', false)
        $('#ttd_verifikasi_dokter_dpjp').show()
        $('#ttd_verifikasi_dokter_dpjp_verified').hide()
    }



      
  }
    
  function showKajianMedis(data) {
    $('#id_kajian_medis').val(data.id);
    $('#waktu_kajian_medis').val((data.waktu_pengkajian !== null ?datetimefmysql(data.waktu_pengkajian) : '<?= date('d/m/Y H:i:s') ?>'));

    $('#keluhan_utama_medis').val(data.keluhan_utama);
    $('#rps_medis').val(data.riwayat_penyakit_sekarang);
    $('#rpt_medis').val(data.riwayat_penyakit_terdahulu);
    $('#pengobatan_medis').val(data.pengobatan);
    $('#riwayat_alergi').val(data.riwayat_alergi);

    var rpk = JSON.parse(data.riwayat_penyakit_keluarga);
    if (rpk.hasil === '1') {
      $('#rpk_medis_ya').prop('checked', true).change()
    }
    if (rpk.asma !== '') {
      $('#rpk_medis_asma').prop('checked', true)
    }
    if (rpk.dm !== '') {
      $('#rpk_medis_dm').prop('checked', true)
    }
    if (rpk.cardiovascular !== '') {
      $('#rpk_medis_cardiovascular').prop('checked', true)
    }
    if (rpk.kanker !== '') {
      $('#rpk_medis_kanker').prop('checked', true)
    }
    if (rpk.thalasemia !== '') {
      $('#rpk_medis_thalasemia').prop('checked', true)
    }
    if (rpk.lain !== '') {
      $('#rpk_medis_lain').prop('checked', true)
    }
    if (rpk.ket_lain !== '') {
      $('#rpk_medis_lain_input').val(rpk.ket_lain).attr('disabled', false)
    }

    $('#riwayat_field').summernote('code', data.riwayat);

    var sadar = JSON.parse(data.kesadaran);
    if (sadar.composmentis !== '') {
      $('#composmentis_medis').prop('checked', true)
    }
    if (sadar.apatis !== '') {
      $('#apatis_medis').prop('checked', true)
    }
    if (sadar.samnolen !== '') {
      $('#samnolen_medis').prop('checked', true)
    }
    if (sadar.sopor !== '') {
      $('#sopor_medis').prop('checked', true)
    }
    if (sadar.koma !== '') {
      $('#koma_medis').prop('checked', true)
    }

    if (data.pf_kepala === 'Normal') {
      $('#pf_kepala_tidak').prop('checked', true)
    }
    if (data.pf_kepala === 'Abnormal') {
      $('#pf_kepala_ya').prop('checked', true)
    }
    if (data.ket_pf_kepala !== null) {
      $('#ket_pf_kepala').val(data.ket_pf_kepala)
    }

    if (data.pf_mata === 'Normal') {
      $('#pf_mata_tidak').prop('checked', true)
    }
    if (data.pf_mata === 'Abnormal') {
      $('#pf_mata_ya').prop('checked', true)
    }
    if (data.ket_pf_mata !== null) {
      $('#ket_pf_mata').val(data.ket_pf_mata)
    }

    if (data.pf_hidung === 'Normal') {
      $('#pf_hidung_tidak').prop('checked', true)
    }
    if (data.pf_hidung === 'Abnormal') {
      $('#pf_hidung_ya').prop('checked', true)
    }
    if (data.ket_pf_hidung !== null) {
      $('#ket_pf_hidung').val(data.ket_pf_hidung)
    }

    if (data.pf_gigi_mulut === 'Normal') {
      $('#pf_gigi_mulut_tidak').prop('checked', true)
    }
    if (data.pf_gigi_mulut === 'Abnormal') {
      $('#pf_gigi_mulut_ya').prop('checked', true)
    }
    if (data.ket_pf_gigi_mulut !== null) {
      $('#ket_pf_gigi_mulut').val(data.ket_pf_gigi_mulut)
    }

    if (data.pf_tenggorokan === 'Normal') {
      $('#pf_tenggorokan_tidak').prop('checked', true)
    }
    if (data.pf_tenggorokan === 'Abnormal') {
      $('#pf_tenggorokan_ya').prop('checked', true)
    }
    if (data.ket_pf_tenggorokan !== null) {
      $('#ket_pf_tenggorokan').val(data.ket_pf_tenggorokan)
    }

    if (data.pf_telinga === 'Normal') {
      $('#pf_telinga_tidak').prop('checked', true)
    }
    if (data.pf_telinga === 'Abnormal') {
      $('#pf_telinga_ya').prop('checked', true)
    }
    if (data.ket_pf_telinga !== null) {
      $('#ket_pf_telinga').val(data.ket_pf_telinga)
    }

    if (data.pf_leher === 'Normal') {
      $('#pf_leher_tidak').prop('checked', true)
    }
    if (data.pf_leher === 'Abnormal') {
      $('#pf_leher_ya').prop('checked', true)
    }
    if (data.ket_pf_leher !== null) {
      $('#ket_pf_leher').val(data.ket_pf_leher)
    }

    if (data.pf_thorax === 'Normal') {
      $('#pf_thorax_tidak').prop('checked', true)
    }
    if (data.pf_thorax === 'Abnormal') {
      $('#pf_thorax_ya').prop('checked', true)
    }
    if (data.ket_pf_thorax !== null) {
      $('#ket_pf_thorax').val(data.ket_pf_thorax)
    }

    if (data.pf_jantung === 'Normal') {
      $('#pf_jantung_tidak').prop('checked', true)
    }
    if (data.pf_jantung === 'Abnormal') {
      $('#pf_jantung_ya').prop('checked', true)
    }
    if (data.ket_pf_jantung !== null) {
      $('#ket_pf_jantung').val(data.ket_pf_jantung)
    }

    if (data.pf_paru === 'Normal') {
      $('#pf_paru_tidak').prop('checked', true)
    }
    if (data.pf_paru === 'Abnormal') {
      $('#pf_paru_ya').prop('checked', true)
    }
    if (data.ket_pf_paru !== null) {
      $('#ket_pf_paru').val(data.ket_pf_paru)
    }

    if (data.pf_abdomen === 'Normal') {
      $('#pf_abdomen_tidak').prop('checked', true)
    }
    if (data.pf_abdomen === 'Abnormal') {
      $('#pf_abdomen_ya').prop('checked', true)
    }
    if (data.ket_pf_abdomen !== null) {
      $('#ket_pf_abdomen').val(data.ket_pf_abdomen)
    }

    if (data.pf_genitalia_anus === 'Normal') {
      $('#pf_genitalia_tidak').prop('checked', true)
    }
    if (data.pf_genitalia_anus === 'Abnormal') {
      $('#pf_genitalia_ya').prop('checked', true)
    }
    if (data.ket_pf_genitalia_anus !== null) {
      $('#ket_pf_genitalia').val(data.ket_pf_genitalia_anus)
    }

    if (data.pf_ekstermitas === 'Normal') {
      $('#pf_ekstermitas_tidak').prop('checked', true)
    }
    if (data.pf_ekstermitas === 'Abnormal') {
      $('#pf_ekstermitas_ya').prop('checked', true)
    }
    if (data.ket_pf_ekstermitas !== null) {
      $('#ket_pf_ekstermitas').val(data.ket_pf_ekstermitas)
    }

    if (data.pf_kulit === 'Normal') {
      $('#pf_kulit_tidak').prop('checked', true)
    }
    if (data.pf_kulit === 'Abnormal') {
      $('#pf_kulit_ya').prop('checked', true)
    }
    if (data.ket_pf_kulit !== null) {
      $('#ket_pf_kulit').val(data.ket_pf_kulit)
    }

    $('#hasil_laboratorium').summernote('code', data.hasil_laboratorium);
    $('#hasil_radiologi').summernote('code', data.hasil_radiologi);
    $('#hasil_penunjang_lain').summernote('code', data.hasil_penunjang_lain);
    $('#diagnosa_awal_medis').summernote('code', data.diagnosa_awal);

    $('#rencana_edukasi_medis').val(data.rencana_edukasi);
    $('#rencana_pemeriksaan_penunjang').val(data.rencana_pemeriksaan_penunjang);
    $('#rencana_terapi').val(data.rencana_terapi);
    $('#rencana_konsultasi').val(data.rencana_konsultasi);
    $('#perkiraan_lama_rawat').val(data.perkiraan_lama_rawat);
    $('#ditetapkan_berapa_hari').val(data.ditetapkan_berapa_hari);
    $('#tanggal_rencana_pulang').val((data.tanggal_rencana_pulang !== null ? datefmysql(data.tanggal_rencana_pulang) : ''));
    $('#alasan_belum_ditetapkan').val(data.alasan_belum_ditetapkan);

      
      
    $('#tanggal_ttd_dokter_dpjp').val((data.waktu_ttd_dokter_dpjp !== null ?datetimefmysql(data.waktu_ttd_dokter_dpjp) : '<?= date('d/m/Y H:i:s') ?>'));
    if (data.id_dokter_dpjp !== null) {
      $('#dokter_dpjp').select2c('readonly', false)
      $('#dokter_dpjp').val(data.id_dokter_dpjp)
      $('#s2id_dokter_dpjp a .select2c-chosen').html(data.dokter_dpjp)
    }

    if (data.ttd_dokter_dpjp === '1') {
        $('#ttd_dokter_dpjp').prop('checked', true)
        $('#ttd_dokter_dpjp').hide()
        $('#ttd_dokter_dpjp_verified').show()
    } else {
        $('#ttd_dokter_dpjp').prop('checked', false)
        $('#ttd_dokter_dpjp').show()
        $('#ttd_dokter_dpjp_verified').hide()
    }

      
    $('#tanggal_ttd_dokter_pengkajian').val((data.waktu_ttd_dokter_pengkajian !== null ?datetimefmysql(data.waktu_ttd_dokter_pengkajian) : '<?= date('d/m/Y H:i:s') ?>'));
    if (data.id_dokter_pengkajian !== null) {
      $('#dokter_pengkajian').select2c('readonly', false)
      $('#dokter_pengkajian').val(data.id_dokter_pengkajian)
      $('#s2id_dokter_pengkajian a .select2c-chosen').html(data.dokter_pengkajian)
    }

    if (data.ttd_dokter_pengkajian === '1') {
        $('#ttd_dokter_pengkajian').prop('checked', true)
        $('#ttd_dokter_pengkajian').hide()
        $('#ttd_dokter_pengkajian_verified').show()
    } else {
        $('#ttd_dokter_pengkajian').prop('checked', false)
        $('#ttd_dokter_pengkajian').show()
        $('#ttd_dokter_pengkajian_verified').hide()
    }

  }

  function konfirmasiSimpanPengkajianAwal() {
    var id_kajian_keperawatan = $('#id_kajian_keperawatan').val();
    if (id_kajian_keperawatan) {
      var text = 'Apakah anda yakin ingin mengupdate data ini ?';
      var btnTextConfirm = 'Update';
    } else {
      text = 'Apakah anda yakin ingin menyimpan data ini ?';
      btnTextConfirm = 'Simpan';
    }

    swal.fire({
      title: 'Konfirmasi ?',
      html: text,
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: '<i class="fas fa-save mr-1"></i>' + btnTextConfirm,
      cancelButtonText: '<i class="fas fa-time-circle mr-1"></i>Batal',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        simpanPengkajianAwal();
      }
    })
  }

  function simpanPengkajianAwal() {
    var riwayat = $('#riwayat_field').summernote('code');
    var hasil_lab = $('#hasil_laboratorium').summernote('code');
    var hasil_rad = $('#hasil_radiologi').summernote('code');
    var hasil_pen_lain = $('#hasil_penunjang_lain').summernote('code');
    var diag_awal = $('#diagnosa_awal_medis').summernote('code');

    $.ajax({
      type: 'POST',
      url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_pengkajian_awal_ranap") ?>',
      data: $('#form_pengkajian_awal').serialize() + '&riwayat=' + riwayat + '&hasil_lab=' + hasil_lab + '&hasil_rad=' + hasil_rad + '&hasil_pen_lain=' + hasil_pen_lain + '&diag_awal=' + diag_awal,
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

        $('#modal_pengkajian_awal_pasien_rawat_inaP').modal('hide');
        showListForm($('#id_pendaftaran').val(), $('#id_layanan_pendaftaran').val(), $('#id_pasien').val())
      },
      complete: function(data) {
        hideLoader();
      },
      error: function(e) {
        messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
      }
    });
  }


  function calcscore() {
    var score = 0;
    $("input[name='sn_penurunan_bb']:checked").each(function() {
      if ($(this).val() == '1') {
        score += parseInt(0);
      } else if ($(this).val() == '2') {
        score += parseInt(2);
      } else if ($(this).val() == '3') {
        $("input[name='sn_penurunan_bb_on']:checked").each(function() {
          if ($(this).val() == '1') {
            score += parseInt(1);
          } else if ($(this).val() == '2') {
            score += parseInt(2);
          } else if ($(this).val() == '3') {
            score += parseInt(3);
          } else if ($(this).val() == '4') {
            score += parseInt(4);
          } else if ($(this).val() == '5') {
            score += parseInt(2);
          }
        });
      }
    });

    $("input[name='sn_asupan_makan']:checked").each(function() {
      if ($(this).val() == '0') {
        score += parseInt(0);
      } else if ($(this).val() == '1') {
        score += parseInt(1);
      }
    });
    $("input[name=sn_total]").val(score);
  }

  function calcscorepjda() {
    var score = 0;
    $("input[name='prjd_riwayat_jatuh']:checked").each(function() {
      if ($(this).val() == '25') {
        score += parseInt(25);
      } else if ($(this).val() == '0') {
        score += parseInt(0);
      }
    });
    $("input[name='prjd_diagnosis_sekunder']:checked").each(function() {
      if ($(this).val() == '15') {
        score += parseInt(15);
      } else if ($(this).val() == '0') {
        score += parseInt(0);
      }
    });
    $("input[name='prjd_terpasang_infus']:checked").each(function() {
      if ($(this).val() == '20') {
        score += parseInt(20);
      } else if ($(this).val() == '0') {
        score += parseInt(0);
      }
    });
    $("input[name='alat_bantu_jalan_1_ya']:checked").each(function() {
      if ($(this).val() == '0') {
        score += parseInt(0);
      }
    });
    $("input[name='alat_bantu_jalan_2_ya']:checked").each(function() {
      if ($(this).val() == '15') {
        score += parseInt(15);
      }
    });
    $("input[name='alat_bantu_jalan_3_ya']:checked").each(function() {
      if ($(this).val() == '30') {
        score += parseInt(30);
      }
    });
    $("input[name='cara_berjalan_1_ya']:checked").each(function() {
      if ($(this).val() == '0') {
        score += parseInt(0);
      }
    });
    $("input[name='cara_berjalan_2_ya']:checked").each(function() {
      if ($(this).val() == '10') {
        score += parseInt(10);
      }
    });
    $("input[name='cara_berjalan_3_ya']:checked").each(function() {
      if ($(this).val() == '20') {
        score += parseInt(20);
      }
    });
    $("input[name='status_mental_1_ya']:checked").each(function() {
      if ($(this).val() == '0') {
        score += parseInt(0);
      }
    });
    $("input[name='status_mental_2_ya']:checked").each(function() {
      if ($(this).val() == '15') {
        score += parseInt(15);
      }
    });

    $("input[name='prjd_jumlah_skor']").val(score);
  }


  // // yang lama punya bang fais
  // function calcscoreprjl() {
  //   var score = 0;
  //   // $("input[name='prjl_riwayat_jatuh']:checked").each(function() {
  //   //   if ($(this).val() == '6') {
  //   //     score += parseInt(6);
  //   //   } else if ($(this).val() == '0') {
  //   //     score += parseInt(0);
  //   //   }
  //   // });

  //   // $("input[name='prjl_riwayat_jatuh_opt']:checked").each(function() {
  //   //   if ($(this).val() == '6') {
  //   //     score += parseInt(6);
  //   //   } else if ($(this).val() == '0') {
  //   //     score += parseInt(0);
  //   //   }
  //   // });

  //   // let score = 0;
  //   let isRiwayatJatuhSelected = false;

  //   // Cek untuk prjl_riwayat_jatuh
  //   $("input[name='prjl_riwayat_jatuh']:checked").each(function () {
  //     if ($(this).val() == '6' && !isRiwayatJatuhSelected) {
  //       score += 6; // Tambahkan hanya sekali
  //       isRiwayatJatuhSelected = true; // Tandai bahwa sudah dipilih
  //     }
  //   });

  //   // Cek untuk prjl_riwayat_jatuh_opt
  //   $("input[name='prjl_riwayat_jatuh_opt']:checked").each(function () {
  //     if ($(this).val() == '6' && !isRiwayatJatuhSelected) {
  //       score += 6; // Tambahkan hanya sekali
  //       isRiwayatJatuhSelected = true; // Tandai bahwa sudah dipilih
  //     }
  //   });

  //   // console.log("Total Score:", score);

  //   $("input[name='prjl_status_mental']:checked").each(function() {
  //     if ($(this).val() == '14') {
  //       if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else if ($("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14' && $("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else {
  //         score += parseInt(14);
  //       }
  //     } else {
  //       if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else if ($("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14' && $("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else {
  //         score += parseInt(0);
  //       }
  //     }
  //   });

  //   $("input[name='prjl_penglihatan']:checked").each(function() {
  //     if ($(this).val() == '1') {
  //       if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else if ($("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1' && $("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else {
  //         score += parseInt(1);
  //       }
  //     } else {
  //       if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else if ($("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1' && $("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else {
  //         score += parseInt(0);
  //       }
  //     }
  //   });

  //   $("input[name='prjl_berkemih']:checked").each(function() {
  //     if ($(this).val() == '2') {
  //       score += parseInt(2);
  //     } else if ($(this).val() == '0') {
  //       score += parseInt(0);
  //     }
  //   });

  //   var nilaiTransfer = $("input[name='prjl_transfer']:checked").val();
  //   var nilaiMobilitas = $("input[name='prjl_mobilitas']:checked").val();




  //   $("input[name='prjl_transfer']:checked").each(function() {
  //     if (nilaiTransfer == '0' && nilaiMobilitas == '0') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '1' && nilaiMobilitas == '0') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '2' && nilaiMobilitas == '0') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '3' && nilaiMobilitas == '0') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '0' && nilaiMobilitas == '1') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '1' && nilaiMobilitas == '1') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '2' && nilaiMobilitas == '1') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '3' && nilaiMobilitas == '1') {
  //       score += parseInt(7);
  //     } else if (nilaiTransfer == '0' && nilaiMobilitas == '2') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '1' && nilaiMobilitas == '2') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '2' && nilaiMobilitas == '2') {
  //       score += parseInt(7);
  //     } else if (nilaiTransfer == '3' && nilaiMobilitas == '2') {
  //       score += parseInt(7);
  //     } else if (nilaiTransfer == '0' && nilaiMobilitas == '3') {
  //       score += parseInt(0);
  //     } else if (nilaiTransfer == '1' && nilaiMobilitas == '3') {
  //       score += parseInt(7);
  //     } else if (nilaiTransfer == '2' && nilaiMobilitas == '3') {
  //       score += parseInt(7);
  //     } else if (nilaiTransfer == '3' && nilaiMobilitas == '3') {
  //       score += parseInt(7);
  //     }
  //   })


  //   // let score = 0;

  //   // Iterasi setiap checkbox yang dicentang
  //   // $("input[name='prjl_transfer']:checked").each(function () {
  //   //   let nilaiTransfer = $(this).val(); // Ambil nilai transfer
  //   //   let nilaiMobilitas = $("input[name='prjl_mobilitas']:checked").val(); // Ambil nilai mobilitas

  //   //   // Pastikan nilaiMobilitas tidak undefined
  //   //   nilaiMobilitas = nilaiMobilitas || '0';

  //   //   // Gunakan logika untuk menentukan skor
  //   //   if (nilaiTransfer == '3' && nilaiMobilitas == '1') {
  //   //     score += 7;
  //   //   } else if (nilaiTransfer == '2' && nilaiMobilitas == '2') {
  //   //     score += 7;
  //   //   } else if (nilaiTransfer == '3' && nilaiMobilitas == '2') {
  //   //     score += 7;
  //   //   } else if (nilaiTransfer == '1' && nilaiMobilitas == '3') {
  //   //     score += 7;
  //   //   } else if (nilaiTransfer == '2' && nilaiMobilitas == '3') {
  //   //     score += 7;
  //   //   } else if (nilaiTransfer == '3' && nilaiMobilitas == '3') {
  //   //     score += 7;
  //   //   } else {
  //   //     score += 0; // Kondisi lain skor tetap 0
  //   //   }
  //   // });

  //   // console.log("Total Score:", score);





  //   $('#prjl_jumlah').val(score);
  // }


  // // ini kode sudah benar
  // function calcscoreprjl() {
  //   var score = 0;
  //   let isRiwayatJatuhSelected = false;

  //   // Cek untuk prjl_riwayat_jatuh
  //   $("input[name='prjl_riwayat_jatuh']:checked").each(function () {
  //     if ($(this).val() == '6' && !isRiwayatJatuhSelected) {
  //       score += 6; // Tambahkan hanya sekali
  //       isRiwayatJatuhSelected = true; // Tandai bahwa sudah dipilih
  //     }
  //   });

  //   // Cek untuk prjl_riwayat_jatuh_opt
  //   $("input[name='prjl_riwayat_jatuh_opt']:checked").each(function () {
  //     if ($(this).val() == '6' && !isRiwayatJatuhSelected) {
  //       score += 6; // Tambahkan hanya sekali
  //       isRiwayatJatuhSelected = true; // Tandai bahwa sudah dipilih
  //     }
  //   });


  //   $("input[name='prjl_status_mental']:checked").each(function() {
  //     if ($(this).val() == '14') {
  //       if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else if ($("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14' && $("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else {
  //         score += parseInt(14);
  //       }
  //     } else {
  //       if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else if ($("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14' && $("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
  //         score += parseInt(14);
  //       } else {
  //         score += parseInt(0);
  //       }
  //     }
  //   });

  //   $("input[name='prjl_penglihatan']:checked").each(function() {
  //     if ($(this).val() == '1') {
  //       if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else if ($("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1' && $("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else {
  //         score += parseInt(1);
  //       }
  //     } else {
  //       if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else if ($("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1' && $("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
  //         score += parseInt(1);
  //       } else {
  //         score += parseInt(0);
  //       }
  //     }
  //   });

  //   $("input[name='prjl_berkemih']:checked").each(function() {
  //     if ($(this).val() == '2') {
  //       score += parseInt(2);
  //     } else if ($(this).val() == '0') {
  //       score += parseInt(0);
  //     }
  //   });

  //   $("input[name='prjl_transfer']:checked").each(function() {
  //     const value = $(this).val(); // Ambil nilai checkbox yang dipilih
  //     if (value === '0') {
  //       score += 0;
  //     } else if (value === '1') {
  //       score += 1;
  //     } else if (value === '2') {
  //       score += 2;
  //     } else if (value === '3') {
  //       score += 3;
  //     }
  //   });

  //   $("input[name='prjl_mobilitas']:checked").each(function() {
  //     const value = $(this).val(); // Ambil nilai checkbox yang dipilih
  //     if (value === '0') {
  //       score += 0;
  //     } else if (value === '1') {
  //       score += 1;
  //     } else if (value === '2') {
  //       score += 2;
  //     } else if (value === '3') {
  //       score += 3;
  //     }
  //   });
  //   $('#prjl_jumlah').val(score);
  // }


  // PAKEK YANG INI AJAH
  function calcscoreprjl() {
    let score = 0;

    // Fungsi umum untuk menambahkan nilai berdasarkan checkbox
    function addScoreByName(name, valueMap, preventDuplicate = false, selectedSet = new Set()) {
      const selectedValue = $(`input[name='${name}']:checked`).val();
      if (!preventDuplicate || !selectedSet.has(selectedValue)) {
        score += parseInt(valueMap[selectedValue] || 0);
        if (preventDuplicate) selectedSet.add(selectedValue); // Hindari duplikasi
      }
    }

    const uniqueValuesSet = new Set(); // Untuk mencegah duplikasi nilai

    // Riwayat jatuh (keduanya berbagi logika yang sama)
    addScoreByName("prjl_riwayat_jatuh", { "6": 6 }, true, uniqueValuesSet);
    addScoreByName("prjl_riwayat_jatuh_opt", { "6": 6 }, true, uniqueValuesSet);

    // Status mental (nilai hanya dihitung sekali meskipun ada beberapa input terkait)
    addScoreByName("prjl_status_mental", { "14": 14 }, true, uniqueValuesSet);
    addScoreByName("prjl_status_mental_opt_1", { "14": 14 }, true, uniqueValuesSet);
    addScoreByName("prjl_status_mental_opt_2", { "14": 14 }, true, uniqueValuesSet);

    // Penglihatan (nilai hanya dihitung sekali)
    addScoreByName("prjl_penglihatan", { "1": 1 }, true, uniqueValuesSet);
    addScoreByName("prjl_penglihatan_opt_1", { "1": 1 }, true, uniqueValuesSet);
    addScoreByName("prjl_penglihatan_opt_2", { "1": 1 }, true, uniqueValuesSet);

    // Berkemih
    addScoreByName("prjl_berkemih", { "2": 2, "0": 0 });

    // Transfer
    addScoreByName("prjl_transfer", { "0": 0, "1": 1, "2": 2, "3": 3 });

    // Mobilitas
    addScoreByName("prjl_mobilitas", { "0": 0, "1": 1, "2": 2, "3": 3 });

    // Masukkan skor ke input
    $('#prjl_jumlah').val(score);
  }

  function showHistoryLogs(id_layanan_pendaftaran) {
    $.ajax({
      type: 'GET',
      url: '<?= base_url("rawat_inap/api/rawat_inap/get_history_logs_pengkajian_awal_ranap") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
      cache: false,
      dataType: 'JSON',
      success: function(data) {
        $('#table_kajian_medis_ranap tbody').empty();
        $.each(data.kajian_medis_logs, function(i, v) {
          let html = /* html */ `
						<tr>
							<td>${i + 1}</td>
							<td class="nowrap">${(v.tanggal_ubah !== null ? v.tanggal_ubah : '')}</td>
							<td class="nowrap">${v.user}</td>
							<td>${v.keluhan_utama}</td>
							<td>${v.riwayat_penyakit_sekarang}</td>
							<td>${v.riwayat_penyakit_terdahulu}</td>
							<td>${v.pengobatan}</td>
							<td>${v.riwayat}</td>
							<td>${v.hasil_laboratorium}</td>
							<td>${v.hasil_radiologi}</td>
							<td>${v.hasil_penunjang_lain}</td>
							<td>${v.diagnosa_awal}</td>
							<td>${v.rencana_edukasi}</td>
							<td>${v.rencana_pemeriksaan_penunjang}</td>
							<td>${v.rencana_terapi}</td>
							<td>${v.rencana_konsultasi}</td>
						</tr>
					`;

          $('#table_kajian_medis_ranap tbody').append(html);
        });

        $('#modal_history_logs_ranap').modal('show');
      },
      error: function(e) {
        accessFailed(e.status);
      }
    });
  }


</script>