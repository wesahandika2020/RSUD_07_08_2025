<script>
	$(function() {
		$("#wizard-form-icare").bwizard();
		$("#wizard_form_pengkajian_awal_igd_ranap").bwizard();
		$('#waktu_kajian_perawat, #waktu_kajian_medis, #tanggal_ttd_perawat, #tanggal_verifikasi_dokter_dpjp,  #tanggal_ttd_dokter_dpjp, #tanggal_ttd_dokter_pengkajian').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#btn-expand-icare-all').click(function() {
			$('.collapse').addClass('show');
		});

		$('#btn-icare-collapse-all').click(function() {
			$('.collapse').removeClass('show');
		});

		$('#informasi_dari_lain').click(function() {
			if ($(this).is(":checked")) { $('#informasi_dari_lain_input').prop('disabled', false); } else { $('#informasi_dari_lain_input').val(''); $('#informasi_dari_lain_input').prop('disabled', true); }
		});

		$('#faktor_pencetus_lain').click(function() {
			if ($(this).is(":checked")) { $('#faktor_pencetus_lain_input').prop('disabled', false); } else { $('#faktor_pencetus_lain_input').val(''); $('#faktor_pencetus_lain_input').prop('disabled', true); }
		});

		$('#rpt_lain').click(function() {
			if ($(this).is(":checked")) { $('#rpt_lain_input').prop('disabled', false); } else { $('#rpt_lain_input').val(''); $('#rpt_lain_input').prop('disabled', true); }
		});

		$('#rpk_lain').click(function() {
			if ($(this).is(":checked")) { $('#rpk_lain_input').prop('disabled', false); } else { $('#rpk_lain_input').val(''); $('#rpk_lain_input').prop('disabled', true); }
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
			if ($(this).is(":checked")) { $('#bs_lain_input').prop('disabled', false); } else { $('#bs_lain_input').val(''); $('#bs_lain_input').prop('disabled', true); }
		});

		$('#wk_lain').click(function() {
			if ($(this).is(":checked")) { $('#wk_lain_input').prop('disabled', false); } else { $('#wk_lain_input').val(''); $('#wk_lain_input').prop('disabled', true); }
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
			if ($(this).is(":checked")) { $('#s_edema_input').prop('disabled', false); } else { $('#s_edema_input').val(''); $('#s_edema_input').prop('disabled', true); }
		});
		
		$('#pulsasi_lain').click(function() {
			if ($(this).is(":checked")) { $('#pulsasi_lain_input').prop('disabled', false); } else { $('#pulsasi_lain_input').val(''); $('#pulsasi_lain_input').prop('disabled', true); }
		});

		$('#mulut_lain').click(function() {
			if ($(this).is(":checked")) { $('#mulut_lain_input').prop('disabled', false); } else { $('#mulut_lain_input').val(''); $('#mulut_lain_input').prop('disabled', true); }
		});

		$('#gigi_lain').click(function() {
			if ($(this).is(":checked")) { $('#gigi_lain_input').prop('disabled', false); } else { $('#gigi_lain_input').val(''); $('#gigi_lain_input').prop('disabled', true); }
		});

		$('#lidah_lain').click(function() {
			if ($(this).is(":checked")) { $('#lidah_lain_input').prop('disabled', false); } else { $('#lidah_lain_input').val(''); $('#lidah_lain_input').prop('disabled', true); }
		});

		$('#teng_lain').click(function() {
			if ($(this).is(":checked")) { $('#teng_lain_input').prop('disabled', false); } else { $('#teng_lain_input').val(''); $('#teng_lain_input').prop('disabled', true); }
		});

		$('#abdomen_lain').click(function() {
			if ($(this).is(":checked")) { $('#abdomen_lain_input').prop('disabled', false); } else { $('#abdomen_lain_input').val(''); $('#abdomen_lain_input').prop('disabled', true); }
		});

		$('#bab_diare').click(function() {
			if ($(this).is(":checked")) { $('#bab_diare_input').prop('disabled', false); } else { $('#bab_diare_input').val(''); $('#bab_diare_input').prop('disabled', true); }
		});

		$('#bak_kateter_warna').click(function() {
			if ($(this).is(":checked")) { $('#bak_kateter_warna_input').prop('disabled', false); } else { $('#bak_kateter_warna_input').val(''); $('#bak_kateter_warna_input').prop('disabled', true); }
		});

		$('#bak_lain').click(function() {
			if ($(this).is(":checked")) { $('#bak_lain_input').prop('disabled', false); } else { $('#bak_lain_input').val(''); $('#bak_lain_input').prop('disabled', true); }
		});

		$('#sm_tulang_fraktur_terbuka').click(function() {
			if ($(this).is(":checked")) { $('#sm_tulang_fraktur_terbuka_lokasi').prop('disabled', false); } else { $('#sm_tulang_fraktur_terbuka_lokasi').val(''); $('#sm_tulang_fraktur_terbuka_lokasi').prop('disabled', true); }
		});

		$('#sm_tulang_fraktur_tertutup').click(function() {
			if ($(this).is(":checked")) { $('#sm_tulang_fraktur_tertutup_lokasi').prop('disabled', false); } else { $('#sm_tulang_fraktur_tertutup_lokasi').val(''); $('#sm_tulang_fraktur_tertutup_lokasi').prop('disabled', true); }
		});

		$('#sm_sendi_lain').click(function() {
			if ($(this).is(":checked")) { $('#sm_sendi_lain_input').prop('disabled', false); } else { $('#sm_sendi_lain_input').val(''); $('#sm_sendi_lain_input').prop('disabled', true); }
		});

		$('#si_warna_lain').click(function() {
			if ($(this).is(":checked")) { $('#si_warna_lain_input').prop('disabled', false); } else { $('#si_warna_lain_input').val(''); $('#si_warna_lain_input').prop('disabled', true); }
		});

		$('#si_kulit_lain').click(function() {
			if ($(this).is(":checked")) { $('#si_kulit_lain_input').prop('disabled', false); } else { $('#si_kulit_lain_input').val(''); $('#si_kulit_lain_input').prop('disabled', true); }
		});

		$('#sin_pengecap_lain').click(function() {
			if ($(this).is(":checked")) { $('#sin_pengecap_lain_input').prop('disabled', false); } else { $('#sin_pengecap_lain_input').val(''); $('#sin_pengecap_lain_input').prop('disabled', true); }
		});

		$('#sp_kelumpuhan').click(function() {
			if ($(this).is(":checked")) { $('#sp_kelumpuhan_lokasi').prop('disabled', false); } else { $('#sp_kelumpuhan_lokasi').val(''); $('#sp_kelumpuhan_lokasi').prop('disabled', true); }
		});
		
		$('#sp_lain').click(function() {
			if ($(this).is(":checked")) { $('#sp_lain_input').prop('disabled', false); } else { $('#sp_lain_input').val(''); $('#sp_lain_input').prop('disabled', true); }
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
			if ($(this).is(":checked")) { $('#sps_lain_input').prop('disabled', false); } else { $('#sps_lain_input').val(''); $('#sps_lain_input').prop('disabled', true); }
		});

		$('#smen_ada_masalah').click(function() {
			if ($(this).is(":checked")) { $('#smen_ada_masalah_input').prop('disabled', false); } else { $('#smen_ada_masalah_input').val(''); $('#smen_ada_masalah_input').prop('disabled', true); }
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
			if ($(this).is(":checked")) { $('#nb_lain_input').prop('disabled', false); } else { $('#nb_lain_input').val(''); $('#nb_lain_input').prop('disabled', true); }
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
			if ($(this).is(":checked")) { $('#ptn_lain_input').prop('disabled', false); } else { $('#ptn_lain_input').val(''); $('#ptn_lain_input').prop('disabled', true); }
		});

		$('input[name="prjl_riwayat_jatuh"]').change(function() {
			if ($(this).val() == '0') {
				$('input[name="prjl_riwayat_jatuh_opt"]').prop('disabled', false);
			} else {
				$('#prjl_riwayat_jatuh_opt_tidak').prop('checked', true).change();
				$('input[name="prjl_riwayat_jatuh_opt"]').prop('disabled', true);
			}
		});

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
			if ($(this).is(":checked")) { $('#pk_pm_lain_input').prop('disabled', false); } else { $('#pk_pm_lain_input').val(''); $('#pk_pm_lain_input').prop('disabled', true); }
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
			if ($(this).is(":checked")) { $('#pk_pdtt_lain_input').prop('disabled', false); } else { $('#pk_pdtt_lain_input').val(''); $('#pk_pdtt_lain_input').prop('disabled', true); }
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

		$('input[name="wajib_ibadah"]').change(function() {
			if ($(this).val() == 'Halangan') {
				$('#wajib_ibadah_halangan_input').prop('disabled', false);
			} else {
				$('#wajib_ibadah_halangan_input').prop('disabled', true);
				$('#wajib_ibadah_halangan_input').val('');
			}
		});

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
			if ($(this).is(":checked")) { $('#masalah_keperawatan_lain_input').prop('disabled', false); } else { $('#masalah_keperawatan_lain_input').val(''); $('#masalah_keperawatan_lain_input').prop('disabled', true); }
		});

		$('#kriteria_discharge_9').click(function() {
			if ($(this).is(":checked")) { $('#kriteria_discharge_lain_input').prop('disabled', false); } else { $('#kriteria_discharge_lain_input').val(''); $('#kriteria_discharge_lain_input').prop('disabled', true); }
		});

		$('#perawat').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: 18,
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
		
		$('#verifikasi_dokter_dpjp, #dokter_dpjp, #dokter_pengkajian').select2c({
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
		
		// $('#signAreaDPJP').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:false});
		// $('#signAreaPerawat').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:false});

		// rumus hitung skala early warning system
		$('.skala').change(function() {
			hitungSkalaEarly();
		});	

		$('input[name="rpk_medis"]').change(function() {
			if ($(this).val() == '1') {
				$('#rpk_medis_asma, #rpk_medis_dm, #rpk_medis_cardiovascular, #rpk_medis_kanker, #rpk_medis_thalasemia, #rpk_medis_lain').prop('disabled', false);
			} else {
				$('#rpk_medis_asma, #rpk_medis_dm, #rpk_medis_cardiovascular, #rpk_medis_kanker, #rpk_medis_thalasemia, #rpk_medis_lain').prop('disabled', true);
				$('#rpk_medis_lain_input').val('');
			}
		});

		$('#rpk_medis_lain').click(function() {
			if ($(this).is(":checked")) { $('#rpk_medis_lain_input').prop('disabled', false); } else { $('#rpk_medis_lain_input').val(''); $('#rpk_medis_lain_input').prop('disabled', true); }
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

	function hitungSkalaEarly() {
		var total = 0;
		// looping vertical
		for (let i = 1; i <= 7; i++) {
			// looping horizontal
			var sub_total = 0
			for (let j = 1; j <= 7; j++) {
				var value = 0;
				if ($('#skala_' + i + '_' + j).is(':checked')) { 
					var getNilai = $('#skala_' + i + '_' + j).val();
					value = getNilai.split('_', 1);
					if (value[0] === 'bk') {
						value = 8;
					}
				}

				sub_total = sub_total + parseInt(value);
			}
			
			total = total + parseInt(sub_total);
		}

		if (total == 0) {
			$('#total_skala_1').prop('checked', true);
		} else if (total >= 1 && total <= 4) {
			$('#total_skala_2').prop('checked', true);
		} else if (total >= 5 && total <= 6) {
			$('#total_skala_3').prop('checked', true);
		} else if (total >= 7) {
			$('#total_skala_4').prop('checked', true);
		}
	}

	function resetFormPengkajianAwalInCare() {
		$('#form-pengkajian-awal-icare')[0].reset();
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

		$('#tanggal_ttd_perawat').val('<?= date('d/m/Y H:i') ?>');

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
		// $('#waktu_kajian_perawat_old, #waktu_kajian_medis_old, #tanggal_ttd_perawat_old, #tanggal_verifikasi_dokter_dpjp_old, #tanggal_ttd_dokter_dpjp_old, #tanggal_ttd_dokter_pengkajian_old').val('');

		$('#perawat, #verifikasi_dokter_dpjp, #dokter_dpjp, #dokter_pengkajian').select2c('readonly', false);
	}

	function entriPengkajianAwalInCare(id_pendaftaran, id_layanan_pendaftaran, bed) {
		$('#wizard-form-icare').bwizard('show', '0');	
		$.ajax({
			type: 'GET',
			url: '<?= base_url("intensive_care/api/intensive_care/get_data_pengkajian_awal_icare") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				resetFormPengkajianAwalInCare();
				$('#id_pendaftaran').val(id_pendaftaran);
				$('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
				if (data.pasien !== null) {
					$('#id_pasien').val(data.pasien.id_pasien);
					$('#pa_pasien_nama').text(data.pasien.nama);
					$('#pa_pasien_no_rm').text(data.pasien.no_rm);
					$('#pa_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + ( ' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
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

					if (data.pasien.alergi !== null) { $('#riwayat_alergi').val(data.pasien.alergi).attr('readonly', true) };
				}
				
				if (data.profil !== null) {
					$('#pa_tinggi_badan').val((data.profil.tinggi_badan != null ? data.profil.tinggi_badan : ''));
					$('#pa_berat_badan').val(data.profil.berat_badan != null ? data.profil.berat_badan : '');
				}
				
				if (data.layanan !== null) {
					$('#waktu_masuk_icare').val((data.layanan.waktu_konfirmasi_icare !== null ? datetimefmysql(data.layanan.waktu_konfirmasi_icare) : '<?= date('d/m/Y H:i:s') ?>'));
					if (data.layanan.before !== null) {
						if (data.layanan.before.jenis_layanan == 'Poliklinik') { $('#cara_masuk_irj').prop('checked', true).attr('disabled', false) }
						if (data.layanan.before.jenis_layanan == 'IGD') { $('#cara_masuk_igd').prop('checked', true).attr('disabled', false) }
						if (data.layanan.before.jenis_layanan == 'Hemodialisa') { $('#cara_masuk_lain').prop('checked', true).attr('disabled', false) }
						if (data.layanan.before.jenis_layanan == 'Hemodialisa') { $('#cara_masuk_lain_input').val(data.layanan.before.jenis_layanan) }
					}

					$('#cara_bayar_pasien').val((data.layanan.cara_bayar === 'Tunai' ? data.layanan.cara_bayar : data.layanan.cara_bayar + ' (' + data.layanan.penjamin + ')'));
				}

				$('#desclaimer-history-icare').html('');
				$('#btn-icare-history-logs').hide();
				if (data.kajian_perawat !== null) {
					if (data.kajian_perawat.updated_date !== null) {
						$('#desclaimer-history-icare').html('*) Ada Perubahan Data');
						$('#btn-icare-history-logs').show();
						$('#btn-icare-history-logs').attr('onclick', 'showHistoryLogs('+id_layanan_pendaftaran+')');	
					}

					showKajianPerawat(data.kajian_perawat);
					var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
					if (profesi == 'Dokter Umum' | profesi == 'Dokter Spesialis' | profesi == 'Bidan' | profesi == 'Perawat' | profesi == 'Fisioterapis' | profesi == 'Nutrisionis') {
						$('#btn-simpan-icare').show();
					} else {
						$('#btn-simpan-icare').hide();
					}
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

				$('#modal-pengkajian-awal-icare').modal('show');
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
		if (data.cara_tiba_diruangan === 'Jalan') { $('#cara_tiba_diruangan_jalan').prop('checked', true).change() }
		if (data.cara_tiba_diruangan === 'Brankar') { $('#cara_tiba_diruangan_brankar').prop('checked', true).change() }
		if (data.cara_tiba_diruangan === 'Kursi Roda') { $('#cara_tiba_diruangan_kursi_roda').prop('checked', true).change() }
		// end cara_tiba_diruangan
		
		// informasi diperoleh dari
		var informasi = JSON.parse(data.informasi_dari);
		if (informasi.pasien !== '') { $('#informasi_dari_pasien').prop('checked', true) }
		if (informasi.keluarga !== '') { $('#informasi_dari_keluarga').prop('checked', true) }
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
		if (faktor_pencetus.infeksi !== '') { $('#faktor_pencetus_infeksi').prop('checked', true) }
		if (faktor_pencetus.lain !== '') { 
			$('#faktor_pencetus_lain').prop('checked', true);  
			$('#faktor_pencetus_lain_input').val(faktor_pencetus.ket_lain).attr('disabled', false);
		}
		// end faktor pencetus
		
		// sifat keluhan
		if (data.sifat_keluhan === 'Akut') { $('#sifat_keluhan_akut').prop('checked', true).change() }
		if (data.sifat_keluhan === 'Kronik') { $('#sifat_keluhan_kronik').prop('checked', true).change() }
		// end sifat keluhan
		
		$('#riwayat_penyakit_sekarang_pengkajian_awal').val(data.rps);
		
		// riwayat penyakit terdahulu
		var rpt = JSON.parse(data.rpd);
		if (rpt.asma !== '') { $('#rpt_asma').prop('checked', true) }
		if (rpt.hipertensi !== '') { $('#rpt_hipertensi').prop('checked', true) }
		if (rpt.jantung !== '') { $('#rpt_jantung').prop('checked', true) }
		if (rpt.diabetes !== '') { $('#rpt_diabetes').prop('checked', true) }
		if (rpt.hepatitis !== '') { $('#rpt_hepatitis').prop('checked', true) }
		if (rpt.lain !== '') { 
			$('#rpt_lain').prop('checked', true);  
			$('#rpt_lain_input').val(rpt.ket_lain).attr('disabled', false);
		}
		// end riwayat penyakit terdahulu
		
		// riwayat penyakit keluarga
		var rpk = JSON.parse(data.rpk);
		if (rpk.asma !== '') { $('#rpk_asma').prop('checked', true) }
		if (rpk.hipertensi !== '') { $('#rpk_hipertensi').prop('checked', true) }
		if (rpk.jantung !== '') { $('#rpk_jantung').prop('checked', true) }
		if (rpk.diabetes !== '') { $('#rpk_diabetes').prop('checked', true) }
		if (rpk.hepatitis !== '') { $('#rpk_hepatitis').prop('checked', true) }
		if (rpk.lain !== '') { 
			$('#rpk_lain').prop('checked', true);  
			$('#rpk_lain_input').val(rpk.ket_lain).attr('disabled', false);
		}
		// end riwayat penyakit keluarga
		
		// pernah dirawat
		var pernah_dirawat = JSON.parse(data.pernah_dirawat);
		if (pernah_dirawat.dirawat === '0') { $('#pernah_dirawat_tidak').prop('checked', true).change() }
		if (pernah_dirawat.dirawat === '1') { $('#pernah_dirawat_ya').prop('checked', true).change() }
		$('#pernah_dirawat_kapan').val(pernah_dirawat.kapan);
		$('#pernah_dirawat_dimana').val(pernah_dirawat.dimana);
		// end pernah dirawat
		
		// kebiasaan
		var kebiasaan = JSON.parse(data.kebiasaan);
		if (kebiasaan.merokok === '0') { $('#kebiasaan_merokok_tidak').prop('checked', true).change() }
		if (kebiasaan.merokok === '1') { $('#kebiasaan_merokok_ya').prop('checked', true).change() }
		if (kebiasaan.ket_merokok !== '') { $('#kebiasaan_merokok_input').val(kebiasaan.ket_merokok).attr('disabled', false) }
		if (kebiasaan.alkohol === '0') { $('#kebiasaan_alkohol_tidak').prop('checked', true).change() }
		if (kebiasaan.alkohol === '1') { $('#kebiasaan_alkohol_ya').prop('checked', true).change() }
		if (kebiasaan.ket_alkohol !== '') { $('#kebiasaan_alkohol_input').val(kebiasaan.ket_alkohol).attr('disabled', false) }
		if (kebiasaan.narkoba === '0') { $('#kebiasaan_narkoba_tidak').prop('checked', true).change() }
		if (kebiasaan.narkoba === '1') { $('#kebiasaan_narkoba_ya').prop('checked', true).change() }
		if (kebiasaan.olahraga === '0') { $('#kebiasaan_olahraga_tidak').prop('checked', true).change() }
		if (kebiasaan.olahraga === '1') { $('#kebiasaan_olahraga_ya').prop('checked', true).change() }
		// end kebiasaan

		// riwayat operasi
		var riwayat_operasi = JSON.parse(data.riwayat_operasi);
		if (riwayat_operasi.operasi === '0') { $('riwayat_operasi_tidak').prop('checked', true).change() }
		if (riwayat_operasi.operasi === '1') { $('#riwayat_operasi_ya').prop('checked', true).change() }
		$('#riwayat_operasi_kapan').val(riwayat_operasi.kapan);
		$('#riwayat_operasi_dimana').val(riwayat_operasi.dimana);
		// end riwayat operasi

		// obat dari luar
		if (data.obat_dari_luar === '0') { $('#obat_luar_tidak').prop('checked', true).change() }
		if (data.obat_dari_luar === '1') { $('#obat_luar_ya').prop('checked', true).change() }
		// end obat dari luar

		// alergi
		if (data.alergi === '0') { $('#alergi_tidak').prop('checked', true).change() }
		if (data.alergi === '1') { $('#alergi_ya').prop('checked', true).change() }
		if (data.alergi === '2') { $('#alergi_tidak_tahu').prop('checked', true).change() }
		$('#alergi_obat').val(data.alergi_obat);
		$('#alergi_obat_reaksi').val(data.alergi_obat_reaksi);
		$('#alergi_makanan').val(data.alergi_makanan);
		$('#alergi_makanan_reaksi').val(data.alergi_makanan_reaksi);
		// end alergi

		// keadaan hamil
		if (data.keadaan_hamil === '0') { $('#hamil_tidak').prop('checked', true).change() }
		if (data.keadaan_hamil === '1') { $('#hamil_ya').prop('checked', true).change() }
		// end keadaan hamil
		
		// sedang menyusui
		if (data.sedang_menyusui === '0') { $('#menyusui_tidak').prop('checked', true).change() }
		if (data.sedang_menyusui === '1') { $('#menyusui_ya').prop('checked', true).change() }
		// end sedang menyusui
		
		// riwayat kelahiran
		if (data.riwayat_kelahiran === 'Spontan') { $('#riwayat_kelahiran_spontan').prop('checked', true).change() }
		if (data.riwayat_kelahiran === 'Operasi') { $('#riwayat_kelahiran_operasi').prop('checked', true).change() }
		if (data.riwayat_kelahiran === 'Cukup Bulan') { $('#riwayat_kelahiran_cukup_bulan').prop('checked', true).change() }
		if (data.riwayat_kelahiran === 'Kurang Bulan') { $('#riwayat_kelahiran_kurang_bulan').prop('checked', true).change() }
		// end riwayat kelahiran

		// kesadaran
		var kesadaran = JSON.parse(data.kesadaran);
		if (kesadaran.composmentis !== '') { $('#composmentis').prop('checked', true) }
		if (kesadaran.apatis !== '') { $('#apatis').prop('checked', true) }
		if (kesadaran.samnolen !== '') { $('#samnolen').prop('checked', true) }
		if (kesadaran.sopor !== '') { $('#sopor').prop('checked', true) }
		if (kesadaran.koma !== '') { $('#koma').prop('checked', true) }
		$('#gcs_e').val(kesadaran.gcs_e);
		$('#gcs_m').val(kesadaran.gcs_m);
		$('#gcs_v').val(kesadaran.gcs_v);
		// end kesadaran
		
		$('#pa_tensi_sis').val(data.tensi_sistolik_awal);
		$('#pa_tensi_dis').val(data.tensi_diastolik_awal);
		$('#pa_nadi').val(data.nadi_awal);
		$('#pa_suhu').val(data.suhu_awal);
		$('#pa_nafas').val(data.nafas_awal);

		// suara nafas
		var snf = JSON.parse(data.suara_nafas);
		if (snf.vesikuler !== '') { $('#sf_vesikuler').prop('checked', true) }
		if (snf.wheezing !== '') { $('#sf_wheezing').prop('checked', true) }
		if (snf.ronchi !== '') { $('#sf_ronchi').prop('checked', true) }
		if (snf.dispnoe !== '') { $('#sf_dispnoe').prop('checked', true) }
		if (snf.stidor !== '') { $('#sf_stridor').prop('checked', true) }
		// end suara nafas
		
		// pola nafas
		var pnf = JSON.parse(data.pola_nafas);
		if (pnf.normal !== '') { $('#pn_normal').prop('checked', true) }
		if (pnf.bradipnea !== '') { $('#pn_bradipnea').prop('checked', true) }
		if (pnf.tachipnea !== '') { $('#pn_tachipnea').prop('checked', true) }
		// end pola nafas
		
		// jenis pernafasan
		var jp = JSON.parse(data.jenis_pernafasan);
		if (jp.dada !== '') { $('#jp_dada').prop('checked', true) }
		if (jp.perut !== '') { $('#jp_perut').prop('checked', true) }
		if (jp.cuping_hidung !== '') { $('#jp_cuping_hidung').prop('checked', true) }
		// end jenis pernafasan

		if (data.otot_bantu_nafas === '0') { $('#otot_bantu_nafas_tidak').prop('checked', true).change() }
		if (data.otot_bantu_nafas === '1') { $('#otot_bantu_nafas_ya').prop('checked', true).change() }
		if (data.irama_nafas === '0') { $('#irama_nafas_tidak').prop('checked', true).change() }
		if (data.irama_nafas === '1') { $('#irama_nafas_ya').prop('checked', true).change() }
		if (data.batuk_sekresi === '0') { $('#batuk_sekresi_tidak').prop('checked', true).change() }
		if (data.batuk_sekresi === '1') { $('#batuk_sekresi_ya').prop('checked', true).change() }
		
		var batuk_sekresi = JSON.parse(data.ket_batuk_sekresi);
		if (batuk_sekresi.produktif !== '') { $('#bs_produktif').prop('checked', true) }
		if (batuk_sekresi.non_produktif !== '') { $('#bs_non_produktif').prop('checked', true) }
		if (batuk_sekresi.hemaptoe !== '') { $('#bs_hemaptoe').prop('checked', true) }
		if (batuk_sekresi.lain !== '') { 
			$('#bs_lain').prop('checked', true);  
			$('#bs_lain_input').val(batuk_sekresi.ket_lain).attr('disabled', false);
		}

		// warna kulit
		var wk = JSON.parse(data.warna_kulit);
		if (wk.normal !== '') { $('#wk_normal').prop('checked', true) }
		if (wk.kemerahan !== '') { $('#wk_kemerahan').prop('checked', true) }
		if (wk.sianosis !== '') { $('#wk_sianosis').prop('checked', true) }
		if (wk.pucat !== '') { $('#wk_pucat').prop('checked', true) }
		if (wk.lain !== '') { 
			$('#wk_lain').prop('checked', true);  
			$('#wk_lain_input').val(wk.ket_lain).attr('disabled', false);
		}
		// end warna kulit

		if (data.nyeri_dada === '0') { $('#nyeri_dada_tidak').prop('checked', true).change() }
		if (data.nyeri_dada === '1') { $('#nyeri_dada_ya').prop('checked', true).change() }
		$('#nyeri_dada_input').val(data.ket_nyeri_dada);
		
		if (data.denyut_nadi === '0') { $('#denyut_nadi_tidak').prop('checked', true).change() }
		if (data.denyut_nadi === '1') { $('#denyut_nadi_ya').prop('checked', true).change() }

		// sirkulasi
		var sirkulasi = JSON.parse(data.sirkulasi);
		if (sirkulasi.akral_hangat !== '') { $('#s_akral_hangat').prop('checked', true) }
		if (sirkulasi.akral_dingin !== '') { $('#s_akral_dingin').prop('checked', true) }
		if (sirkulasi.rasa_bebas !== '') { $('#s_rasa_bebas').prop('checked', true) }
		if (sirkulasi.palpitasi !== '') { $('#s_palpitasi').prop('checked', true) }
		if (sirkulasi.edema !== '') { 
			$('#s_edema').prop('checked', true);  
			$('#s_edema_input').val(sirkulasi.ket_edema).attr('disabled', false);
		}
		// end sirkulasi

		// pulsasi
		var pulsasi = JSON.parse(data.pulsasi);
		if (pulsasi.kuat !== '') { $('#pulsasi_kuat').prop('checked', true) }
		if (pulsasi.lemah !== '') { $('#pulsasi_lemah').prop('checked', true) }
		if (pulsasi.lain !== '') { 
			$('#pulsasi_lain').prop('checked', true);  
			$('#pulsasi_lain_input').val(pulsasi.ket_lain).attr('disabled', false);
		}
		// end pulsasi

		// mulut
		var mulut = JSON.parse(data.mulut);
		if (mulut.tidak_ada_kelainan !== '') { $('#mulut_tidak_ada_kelainan').prop('checked', true) }
		if (mulut.simetris !== '') { $('#mulut_simetris').prop('checked', true) }
		if (mulut.asimetris !== '') { $('#mulut_asimetris').prop('checked', true) }
		if (mulut.mukosa !== '') { $('#mulut_mukosa').prop('checked', true) }
		if (mulut.bibir_pucat !== '') { $('#mulut_bibir_pucat').prop('checked', true) }
		if (mulut.lain !== '') { 
			$('#mulut_lain').prop('checked', true);  
			$('#mulut_lain_input').val(mulut.ket_lain).attr('disabled', false);
		}
		// end mulut

		// gigi
		var gigi = JSON.parse(data.gigi);
		if (gigi.tidak_ada_kelainan !== '') { $('#gigi_tidak_ada_kelainan').prop('checked', true) }
		if (gigi.caries !== '') { $('#gigi_caries').prop('checked', true) }
		if (gigi.goyang !== '') { $('#gigi_goyang').prop('checked', true) }
		if (gigi.palsu !== '') { $('#gigi_palsu').prop('checked', true) }
		if (gigi.lain !== '') { 
			$('#gigi_lain').prop('checked', true);  
			$('#gigi_lain_input').val(gigi.ket_lain).attr('disabled', false);
		}
		// end gigi

		// lidah
		var lidah = JSON.parse(data.lidah);
		if (lidah.tidak_ada_kelainan !== '') { $('#lidah_tidak_ada_kelainan').prop('checked', true) }
		if (lidah.kotor !== '') { $('#lidah_kotor').prop('checked', true) }
		if (lidah.gerakan_asimetris !== '') { $('#lidah_gerakan_asimetris').prop('checked', true) }
		if (lidah.lain !== '') { 
			$('#lidah_lain').prop('checked', true);  
			$('#lidah_lain_input').val(lidah.ket_lain).attr('disabled', false);
		}
		// end lidah

		// tenggorokan
		var teng = JSON.parse(data.tenggorokan);
		if (teng.gangguan_menelan !== '') { $('#teng_gangguan_menelan').prop('checked', true) }
		if (teng.sakit_menelan !== '') { $('#teng_sakit_menelan').prop('checked', true) }
		if (teng.lain !== '') { 
			$('#teng_lain').prop('checked', true);  
			$('#teng_lain_input').val(teng.ket_lain).attr('disabled', false);
		}
		// end tenggorokan
		
		// abdomen
		var abdomen = JSON.parse(data.abdomen);
		if (abdomen.asites !== '') { $('#abdomen_asites').prop('checked', true) }
		if (abdomen.tegang !== '') { $('#abdomen_tegang').prop('checked', true) }
		if (abdomen.supel !== '') { $('#abdomen_supel').prop('checked', true) }
		if (abdomen.lain !== '') { 
			$('#abdomen_lain').prop('checked', true);  
			$('#abdomen_lain_input').val(abdomen.ket_lain).attr('disabled', false);
		}
		// end abdomen

		// nafsu makan
		if (data.nafsu_makan === 'Tetap') { $('#nafsu_makan_tetap').prop('checked', true).change() }
		if (data.nafsu_makan === 'Naik') { $('#nafsu_makan_naik').prop('checked', true).change() }
		if (data.nafsu_makan === 'Turun') { $('#nafsu_makan_turun').prop('checked', true).change() }
		// end nafsu makan
		
		// mual
		if (data.mual === '0') { $('#mual_tidak').prop('checked', true).change() }
		if (data.mual === '1') { $('#mual_ya').prop('checked', true).change() }
		// end mual

		// muntah
		if (data.muntah === '0') { $('#muntah_tidak').prop('checked', true).change() }
		if (data.muntah === '1') { $('#muntah_ya').prop('checked', true).change() }
		// end muntah

		// kesulitan menelan
		if (data.kesulitan_menelan === '0') { $('#kesulitan_menelan_tidak').prop('checked', true).change() }
		if (data.kesulitan_menelan === '1') { $('#kesulitan_menelan_ya').prop('checked', true).change() }
		// end kesulitan menelan

		// eleminasi bab
		var bab = JSON.parse(data.eleminasi_bab);
		if (bab.normal !== '') { $('#bab_normal').prop('checked', true) }
		if (bab.konstipasi !== '') { $('#bab_konstipasi').prop('checked', true) }
		if (bab.melena !== '') { $('#bab_melena').prop('checked', true) }
		if (bab.inkontinensia_alvi !== '') { $('#bab_inkontinensia_alvi').prop('checked', true) }
		if (bab.colostomy !== '') { $('#bab_colostomy').prop('checked', true) }
		if (bab.diare !== '') { 
			$('#bab_diare').prop('checked', true);  
			$('#bab_diare_input').val(bab.ket_diare).attr('disabled', false);
		}
		// end eleminasi bab

		// eleminasi bab
		var bak = JSON.parse(data.eleminasi_bak);
		if (bak.normal !== '') { $('#bak_normal').prop('checked', true) }
		if (bak.hematuri !== '') { $('#bak_hematuri').prop('checked', true) }
		if (bak.nokturia !== '') { $('#bak_nokturia').prop('checked', true) }
		if (bak.inkontinensia_uri !== '') { $('#bak_inkontinensia_uri').prop('checked', true) }
		if (bak.urostomi !== '') { $('#bak_urostomi').prop('checked', true) }
		if (bak.urin_menetes !== '') { $('#bak_urin_menetes').prop('checked', true) }
		if (bak.kateter_warna !== '') { 
			$('#bak_kateter_warna').prop('checked', true);  
			$('#bak_kateter_warna_input').val(bak.ket_kateter_warna).attr('disabled', false);
		}
		if (bak.kandung_kemih !== '') { $('#bak_kandung_kemih').prop('checked', true) }
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
		if (tulang.amputasi !== '') { $('#sm_tulang_amputasi').prop('checked', true) }
		if (tulang.tumor_tulang !== '') { $('#sm_tulang_tumor_tulang').prop('checked', true) }
		if (tulang.nyeri_tulang !== '') { $('#sm_tulang_nyeri_tulang').prop('checked', true) }
		// end tulang

		// sendi
		var sendi = JSON.parse(data.sendi);
		if (sendi.dislokasi !== '') { $('#sm_sendi_dislokasi').prop('checked', true) }
		if (sendi.infeksi !== '') { $('#sm_sendi_infeksi').prop('checked', true) }
		if (sendi.nyeri !== '') { $('#sm_sendi_nyeri').prop('checked', true) }
		if (sendi.oedema !== '') { $('#sm_sendi_oedema').prop('checked', true) }
		if (sendi.lain !== '') { 
			$('#sm_sendi_lain').prop('checked', true);  
			$('#sm_sendi_lain_input').val(sendi.ket_lain).attr('disabled', false);
		}
		// end sendi

		// integumen warna
		var im = JSON.parse(data.integumen_warna);
		if (im.pucat !== '') { $('#si_warna_pucat').prop('checked', true) }
		if (im.sianosis !== '') { $('#si_warna_sianosis').prop('checked', true) }
		if (im.normal !== '') { $('#si_warna_normal').prop('checked', true) }
		if (im.lain !== '') { 
			$('#si_warna_lain').prop('checked', true);  
			$('#si_warna_lain_input').val(im.ket_lain).attr('disabled', false);
		}
		// end integumen warna

		// integumen turgor
		var it = JSON.parse(data.integumen_turgor);
		if (it.baik !== '') { $('#si_turgor_baik').prop('checked', true) }
		if (it.sedang !== '') { $('#si_turgor_sedang').prop('checked', true) }
		if (it.buruk !== '') { $('#si_turgor_buruk').prop('checked', true) }
		// end integumen turgor

		// integumen kulit
		var im = JSON.parse(data.integumen_kulit);
		if (im.normal !== '') { $('#si_kulit_normal').prop('checked', true) }
		if (im.kemerahan !== '') { $('#si_kulit_kemerahan').prop('checked', true) }
		if (im.lesi !== '') { $('#si_kulit_lesi').prop('checked', true) }
		if (im.luka !== '') { $('#si_kulit_luka').prop('checked', true) }
		if (im.memar !== '') { $('#si_kulit_memar').prop('checked', true) }
		if (im.petechie !== '') { $('#si_kulit_petechie').prop('checked', true) }
		if (im.bulae !== '') { $('#si_kulit_bulae').prop('checked', true) }
		if (im.lain !== '') { 
			$('#si_kulit_lain').prop('checked', true);  
			$('#si_kulit_lain_input').val(im.ket_lain).attr('disabled', false);
		}
		// end integumen kulit

		// penglihatan
		var penglihatan = JSON.parse(data.penglihatan);
		if (penglihatan.baik !== '') { $('#sin_penglihatan_baik').prop('checked', true) }
		if (penglihatan.buram !== '') { $('#sin_penglihatan_buram').prop('checked', true) }
		if (penglihatan.tidak_bisa_melihat !== '') { $('#sin_penglihatan_tidak_bisa_melihat').prop('checked', true) }
		if (penglihatan.pakai_alat_bantu !== '') { $('#sin_penglihatan_pakai_alat_bantu').prop('checked', true) }
		if (penglihatan.hypema !== '') { $('#sin_penglihatan_hypema').prop('checked', true) }
		// end penglihatan

		// penciuman
		var penciuman = JSON.parse(data.penciuman);
		if (penciuman.sekresi !== '') { $('#sin_penciuman_sekresi').prop('checked', true) }
		if (penciuman.polip !== '') { $('#sin_penciuman_polip').prop('checked', true) }
		if (penciuman.gangguan !== '') { $('#sin_penciuman_gangguan').prop('checked', true) }
		// end penciuman

		// pendengaran
		var pendengaran = JSON.parse(data.pendengaran);
		if (pendengaran.kurang_jelas !== '') { $('#sin_pendengaran_kurang_jelas').prop('checked', true) }
		if (pendengaran.baik !== '') { $('#sin_pendengaran_baik').prop('checked', true) }
		if (pendengaran.tidak_bisa_dengar !== '') { $('#sin_pendengaran_tidak_bisa_dengar').prop('checked', true) }
		if (pendengaran.pakai_alat_bantu !== '') { $('#sin_pendengaran_pakai_alat_bantu').prop('checked', true) }
		if (pendengaran.nyeri_telinga !== '') { $('#sin_pendengaran_nyeri_telinga').prop('checked', true) }
		// end pendengaran

		// pengecap
		var pengecap = JSON.parse(data.pengecap);
		if (pengecap.tidak_ada_kelainan !== '') { $('#sin_pengecap_tidak_ada_kelainan').prop('checked', true) }
		if (pengecap.gangguan_fungsi !== '') { $('#sin_pengecap_gangguan_fungsi').prop('checked', true) }
		if (pengecap.lain !== '') { 
			$('#sin_pengecap_lain').prop('checked', true);  
			$('#sin_pengecap_lain_input').val(pengecap.ket_lain).attr('disabled', false);
		}
		// end pengecap

		// persyarafan
		var syaraf = JSON.parse(data.persyarafan);
		if (syaraf.kesemutan !== '') { $('#sp_kesemutan').prop('checked', true) }
		if (syaraf.kelumpuhan !== '') { 
			$('#sp_kelumpuhan').prop('checked', true);  
			$('#sp_kelumpuhan_lokasi').val(syaraf.kelumpuhan_lokasi).attr('disabled', false);
		}
		if (syaraf.kejang !== '') { $('#sp_kejang').prop('checked', true) }
		if (syaraf.pusing !== '') { $('#sp_pusing').prop('checked', true) }
		if (syaraf.muntah !== '') { $('#sp_muntah').prop('checked', true) }
		if (syaraf.kaku_kuduk !== '') { $('#sp_kaku_kuduk').prop('checked', true) }
		if (syaraf.hemiparese !== '') { $('#sp_hemiparese').prop('checked', true) }
		if (syaraf.alasia !== '') { $('#sp_alasia').prop('checked', true) }
		if (syaraf.tremor !== '') { $('#sp_tremor').prop('checked', true) }
		if (syaraf.lain !== '') { 
			$('#sp_lain').prop('checked', true);  
			$('#sp_lain_input').val(syaraf.ket_lain).attr('disabled', false);
		}
		// end persyarafan

		// sistem reproduksi
		if (data.reproduksi_alat === 'Oedema') { $('#sr_alat_oedema').prop('checked', true).change() }
		if (data.reproduksi_alat === 'Oedema') { $('#sr_alat_varices').prop('checked', true).change() }
		if (data.reproduksi_alat === 'Oedema') { $('#sr_alat_hygiene').prop('checked', true).change() }
		
		if (data.reproduksi_genital === 'Hemoroid') { $('#sr_genital_hemoroid').prop('checked', true).change() }
		if (data.reproduksi_genital === 'Hipospadia') { $('#sr_genital_hipospadia').prop('checked', true).change() }
		if (data.reproduksi_genital === 'Masalah Prostat') { $('#sr_genital_masalah_prostat').prop('checked', true).change() }
		if (data.reproduksi_genital === 'Simetris') { $('#sr_genital_simetris').prop('checked', true).change() }
		if (data.reproduksi_genital === 'Asimetris') { $('#sr_genital_asimetris').prop('checked', true).change() }
		if (data.reproduksi_genital === 'Inflamasi') { $('#sr_genital_inflamasi').prop('checked', true).change() }
		if (data.reproduksi_genital === 'Nyeri') { $('#sr_genital_nyeri').prop('checked', true).change() }
		
		if (data.reproduksi_payudara === 'Massa') { $('#sr_payudara_massa').prop('checked', true).change() }
		if (data.reproduksi_payudara === 'Lesi') { $('#sr_payudara_lesi').prop('checked', true).change() }
		if (data.reproduksi_payudara === 'Lain') { $('#sr_payudara_lain').prop('checked', true).change() }
		$('#sr_payudara_lain_input').val(data.ket_reproduksi_payudara);
		// end sistem reproduksi
		
		// status psikologis
		var psikologis = JSON.parse(data.status_psikologis);
		if (psikologis.cemas !== '') { $('#sps_cemas').prop('checked', true) }
		if (psikologis.takut !== '') { $('#sps_takut').prop('checked', true) }
		if (psikologis.marah !== '') { $('#sps_marah').prop('checked', true) }
		if (psikologis.sedih !== '') { $('#sps_sedih').prop('checked', true) }
		if (psikologis.bunuh_diri !== '') { $('#sps_bunuh_diri').prop('checked', true) }
		if (psikologis.lain !== '') { 
			$('#sps_lain').prop('checked', true);  
			$('#sps_lain_input').val(psikologis.ket_lain).attr('disabled', false);
		}
		// end status psikologis

		// status mental
		var mental = JSON.parse(data.status_mental);
		if (mental.sadar !== '') { $('#smen_sadar').prop('checked', true) }
		if (mental.ada_masalah !== '') { 
			$('#smen_ada_masalah').prop('checked', true);  
			$('#smen_ada_masalah_input').val(mental.ket_ada_masalah).attr('disabled', false);
		}
		if (mental.perilaku_kekerasan !== '') { $('#smen_perilaku_kekerasan').prop('checked', true) }
		// end status mental

		// status keluarga
		if (data.status_keluarga === 'Serumah') { $('#kel_tinggal_serumah').prop('checked', true).change() }
		if (data.status_keluarga === 'Sendiri') { $('#kel_tinggal_sendiri').prop('checked', true).change() }
		if (data.status_keluarga === 'Lain') { $('#kel_tinggal_lain').prop('checked', true).change() }
		$('#kel_tinggal_lain_input').val(data.ket_status_keluarga);
		// end status keluarga
		
		if (data.status_hubungan_pasien === '0') { $('#hubungan_dengan_keluarga_tidak_baik').prop('checked', true).change() }
		if (data.status_hubungan_pasien === '1') { $('#hubungan_dengan_keluarga_baik').prop('checked', true).change() }

		// tempat tinggal
		if (data.tempat_tinggal === 'Serumah') { $('#tempat_tinggal_rumah').prop('checked', true).change() }
		if (data.tempat_tinggal === 'Apartemen') { $('#tempat_tinggal_apart').prop('checked', true).change() }
		if (data.tempat_tinggal === 'Panti') { $('#tempat_tinggal_panti').prop('checked', true).change() }
		if (data.tempat_tinggal === 'Lain') { $('#tempat_tinggal_lain').prop('checked', true).change() }
		$('#tempat_tinggal_lain_input').val(data.ket_tempat_tinggal);
		// end tempat tinggal
		
		// keyakinan
		if (data.keyakinan === '0') { $('#snk_keyakinan_tidak').prop('checked', true).change() }
		if (data.keyakinan === '1') { $('#snk_keyakinan_ya').prop('checked', true).change() }
		$('#snk_keyakinan_ya_input').val(data.ket_keyakinan);
		// end keyakinan

		// nilai_kepercayaan
		if (data.nilai_kepercayaan === '0') { $('#snk_nilai_kepercayaan_tidak').prop('checked', true).change() }
		if (data.nilai_kepercayaan === '1') { $('#snk_nilai_kepercayaan_ya').prop('checked', true).change() }
		$('#snk_nilai_kepercayaan_ya_input').val(data.ket_nilai_kepercayaan);
		// end nilai_kepercayaan
		
		$('#snk_kebiasaan_keagamaan').val(data.kebiasaan_keagamaan);
		
		// wajib ibadah
		if (data.wajib_ibadah === 'Baligh') { $('#wajib_ibadah_baligh').prop('checked', true).change() }
		if (data.wajib_ibadah === 'Belum Baligh') { $('#wajib_ibadah_belum').prop('checked', true).change() }
		if (data.wajib_ibadah === 'Halangan') { $('#wajib_ibadah_halangan').prop('checked', true).change() }
		$('#wajib_ibadah_halangan_input').val(data.ket_wajib_ibadah_halangan);
		// end wajib ibadah
		
		if (data.thaharoh === 'Berwudhu') { $('#thaharoh_berwudhu').prop('checked', true).change() }
		if (data.thaharoh === 'Tayamum') { $('#thaharoh_tayamum').prop('checked', true).change() }
		
		if (data.sholat === 'Berdiri') { $('#sholat_berdiri').prop('checked', true).change() }
		if (data.sholat === 'Duduk') { $('#sholat_duduk').prop('checked', true).change() }
		if (data.sholat === 'Berbaring') { $('#sholat_berbaring').prop('checked', true).change() }
		
		// nilai budaya
		if (data.nilai_budaya === 'Hukuman') { $('#nb_hukuman').prop('checked', true).change() }
		if (data.nilai_budaya === 'Ujian') { $('#nb_ujian').prop('checked', true).change() }
		if (data.nilai_budaya === 'Kesalahan') { $('#nb_kesalahan').prop('checked', true).change() }
		if (data.nilai_budaya === 'Takdir') { $('#nb_takdir').prop('checked', true).change() }
		if (data.nilai_budaya === 'Buatan Orang Lain') { $('#nb_buatan_orang').prop('checked', true).change() }
		if (data.nilai_budaya === 'Lain') { $('#nb_lain').prop('checked', true).change() }
		$('#nb_lain_input').val(data.ket_nilai_budaya);
		// end nilai budaya
		
		$('#nb_pola_aktivitas').val(data.budaya_pola_aktivitas);
		
		// pola komunikasi
		if (data.pola_komunikasi === 'Normal') { $('#pk_normal').prop('checked', true).change() }
		if (data.pola_komunikasi === 'Introvert') { $('#pk_introvert').prop('checked', true).change() }
		if (data.pola_komunikasi === 'Extrovert') { $('#pk_extrovert').prop('checked', true).change() }
		if (data.pola_komunikasi === 'Lain') { $('#pk_lain').prop('checked', true).change() }
		$('#pk_lain_input').val(data.ket_pola_komunikasi);
		// end pola komunikasi

		// pola makan
		if (data.pola_makan === 'Sehat') { $('#pm_sehat').prop('checked', true).change() }
		if (data.pola_makan === 'Tidak Sehat') { $('#pm_tidak_sehat').prop('checked', true).change() }
		if (data.makanan_pokok === 'Nasi') { $('#mp_nasi').prop('checked', true).change() }
		if (data.makanan_pokok === 'Selain Nasi') { $('#mp_selain').prop('checked', true).change() }
		$('#mp_selain_nasi_input').val(data.ket_makanan_pokok);
		// end pola makan
		
		// pantang makanan
		if (data.pantang_makanan === '0') { $('#pantang_makanan_tidak').prop('checked', true).change() }
		if (data.pantang_makanan === '1') { $('#pantang_makanan_ya').prop('checked', true).change() }
		$('#pantang_makanan_ya_input').val(data.ket_pantang_makanan);
		// end pantang makanan

		// konsumsi makanan luar
		if (data.konsumsi_makanan_luar === '0') { $('#konsumsi_makanan_luar_tidak').prop('checked', true).change() }
		if (data.konsumsi_makanan_luar === '1') { $('#konsumsi_makanan_luar_ya').prop('checked', true).change() }
		$('#konsumsi_makanan_luar_ya_input').val(data.ket_konsumsi_makanan_luar);
		// end konsumsi makanan luar

		// kepercayaan penyakit
		if (data.kepercayaan_penyakit === '0') { $('#kepercayaan_penyakit_tidak').prop('checked', true).change() }
		if (data.kepercayaan_penyakit === '1') { $('#kepercayaan_penyakit_ya').prop('checked', true).change() }
		$('#kepercayaan_penyakit_ya_input').val(data.ket_kepercayaan_penyakit);
		// end kepercayaan penyakit
		
		if (data.kewarganegaraan === 'WNI') { $('#kewarganegaraan_wni').prop('checked', true).change() }
		if (data.kewarganegaraan === 'WNA') { $('#kewarganegaraan_wna').prop('checked', true).change() }
		$('#suku_bangsa').val(data.suku_bangsa);
		
		if (data.bicara === 'Normal') { $('#bicara_normal').prop('checked', true).change() }
		if (data.bicara === 'Gangguan Bicara') { $('#bicara_gangguan').prop('checked', true).change() }
		$('#bicara_input').val(data.ket_bicara);
		
		if (data.perlu_penterjemah === '0') { $('#perlu_penterjemah_tidak').prop('checked', true).change() }
		if (data.perlu_penterjemah === '1') { $('#perlu_penterjemah_ya').prop('checked', true).change() }
		$('#perlu_penterjemah_input').val(data.perlu_penterjemah_bahasa);
		
		if (data.bahasa_isyarat === '0') { $('#bahasa_isyarat_tidak').prop('checked', true).change() }
		if (data.bahasa_isyarat === '1') { $('#bahasa_isyarat_ya').prop('checked', true).change() }
		
		if (data.pemahaman_penyakit === '0') { $('#pt_penyakit_perawatan_tidak').prop('checked', true).change() }
		if (data.pemahaman_penyakit === '1') { $('#pt_penyakit_perawatan_ya').prop('checked', true).change() }
		if (data.pemahaman_pengobatan === '0') { $('#pt_pengobatan_tidak').prop('checked', true).change() }
		if (data.pemahaman_pengobatan === '1') { $('#pt_pengobatan_ya').prop('checked', true).change() }
		if (data.pemahaman_nutrisi_diet === '0') { $('#pt_nutrisi_diet_tidak').prop('checked', true).change() }
		if (data.pemahaman_nutrisi_diet === '1') { $('#pt_nutrisi_diet_ya').prop('checked', true).change() }
		if (data.pemahaman_spiritual === '0') { $('#pt_spiritual_tidak').prop('checked', true).change() }
		if (data.pemahaman_spiritual === '1') { $('#pt_spiritual_ya').prop('checked', true).change() }
		if (data.pemahaman_peralatan_medis === '0') { $('#pt_peralatan_medis_tidak').prop('checked', true).change() }
		if (data.pemahaman_peralatan_medis === '1') { $('#pt_peralatan_medis_ya').prop('checked', true).change() }
		if (data.pemahaman_rehab_medik === '0') { $('#pt_rehab_medik_tidak').prop('checked', true).change() }
		if (data.pemahaman_rehab_medik === '1') { $('#pt_rehab_medik_ya').prop('checked', true).change() }
		if (data.pemahaman_manajemen_nyeri === '0') { $('#pt_manajemen_nyeri_tidak').prop('checked', true).change() }
		if (data.pemahaman_manajemen_nyeri === '1') { $('#pt_manajemen_nyeri_ya').prop('checked', true).change() }
		
		// hamabatan menerima edukasi
		var edukasi = JSON.parse(data.hambatan_menerima_edukasi);
		for (let i = 1; i <= 10; i++) {
			if (edukasi['hambatan_' +  i] !== '') { $('#hambatan_edukasi_' + i).prop('checked', true) }
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

		if (data.nilai_fungsi_makan === '0') { $('#pkf_makan_1').prop('checked', true).change() }
		if (data.nilai_fungsi_makan === '5') { $('#pkf_makan_2').prop('checked', true).change() }
		if (data.nilai_fungsi_makan === '10') { $('#pkf_makan_3').prop('checked', true).change() }
		
		if (data.nilai_fungsi_mandi === '0') { $('#pkf_mandi_1').prop('checked', true).change() }
		if (data.nilai_fungsi_mandi === '5') { $('#pkf_mandi_2').prop('checked', true).change() }
		
		if (data.nilai_fungsi_personal === '0') { $('#pkf_personal_1').prop('checked', true).change() }
		if (data.nilai_fungsi_personal === '5') { $('#pkf_personal_2').prop('checked', true).change() }
		
		if (data.nilai_fungsi_berpakaian === '0') { $('#pkf_berpakaian_1').prop('checked', true).change() }
		if (data.nilai_fungsi_berpakaian === '5') { $('#pkf_berpakaian_2').prop('checked', true).change() }
		if (data.nilai_fungsi_berpakaian === '10') { $('#pkf_berpakaian_3').prop('checked', true).change() }
		
		if (data.nilai_fungsi_bab === '0') { $('#pkf_bab_1').prop('checked', true).change() }
		if (data.nilai_fungsi_bab === '5') { $('#pkf_bab_2').prop('checked', true).change() }
		if (data.nilai_fungsi_bab === '10') { $('#pkf_bab_3').prop('checked', true).change() }
		
		if (data.nilai_fungsi_bak === '0') { $('#pkf_bak_1').prop('checked', true).change() }
		if (data.nilai_fungsi_bak === '5') { $('#pkf_bak_2').prop('checked', true).change() }
		if (data.nilai_fungsi_bak === '10') { $('#pkf_bak_3').prop('checked', true).change() }
		
		if (data.nilai_fungsi_berpindah === '0') { $('#pkf_berpindah_1').prop('checked', true).change() }
		if (data.nilai_fungsi_berpindah === '5') { $('#pkf_berpindah_2').prop('checked', true).change() }
		if (data.nilai_fungsi_berpindah === '10') { $('#pkf_berpindah_3').prop('checked', true).change() }
		if (data.nilai_fungsi_berpindah === '15') { $('#pkf_berpindah_4').prop('checked', true).change() }
		
		if (data.nilai_fungsi_toiletting === '0') { $('#pkf_toiletting_1').prop('checked', true).change() }
		if (data.nilai_fungsi_toiletting === '5') { $('#pkf_toiletting_2').prop('checked', true).change() }
		if (data.nilai_fungsi_toiletting === '10') { $('#pkf_toiletting_3').prop('checked', true).change() }
		
		if (data.nilai_fungsi_mobilisasi === '0') { $('#pkf_mobilisasi_1').prop('checked', true).change() }
		if (data.nilai_fungsi_mobilisasi === '5') { $('#pkf_mobilisasi_2').prop('checked', true).change() }
		if (data.nilai_fungsi_mobilisasi === '10') { $('#pkf_mobilisasi_3').prop('checked', true).change() }
		if (data.nilai_fungsi_mobilisasi === '15') { $('#pkf_mobilisasi_4').prop('checked', true).change() }
		
		if (data.nilai_fungsi_naik_turun_tangga === '0') { $('#pkf_naikturuntangga_1').prop('checked', true).change() }
		if (data.nilai_fungsi_naik_turun_tangga === '5') { $('#pkf_naikturuntangga_2').prop('checked', true).change() }
		if (data.nilai_fungsi_naik_turun_tangga === '10') { $('#pkf_naikturuntangga_3').prop('checked', true).change() }
		
		if (data.nilai_tingkat_nyeri === 'Ringan') { $('#ptn_keterangan_ringan').prop('checked', true).change() }
		if (data.nilai_tingkat_nyeri === 'Sedang') { $('#ptn_keterangan_sedang').prop('checked', true).change() }
		if (data.nilai_tingkat_nyeri === 'Berat') { $('#ptn_keterangan_berat').prop('checked', true).change() }

		// nyeri hilang
		var nyeri_hilang = JSON.parse(data.nyeri_hilang);
		if (nyeri_hilang.minum_obat !== '') { $('#ptn_minum_obat').prop('checked', true) }
		if (nyeri_hilang.mendengarkan_musik !== '') { $('#ptn_mendengarkan_musik').prop('checked', true) }
		if (nyeri_hilang.istirahat !== '') { $('#ptn_istirahat').prop('checked', true) }
		if (nyeri_hilang.berubah_posisi !== '') { $('#ptn_berubah_posisi').prop('checked', true) }
		if (nyeri_hilang.lain !== '') { 
			$('#ptn_lain').prop('checked', true);  
			$('#ptn_lain_input').val(nyeri_hilang.ket_lain).attr('disabled', false);
		}
		// end nyeri hilang

		if (data.prjd_riwayat_jatuh === '25') { $('#prjd_riwayat_jatuh_ya').prop('checked', true).change() }
		if (data.prjd_diagnosis_sekunder === '15') { $('#prjd_diagnosis_sekunder_ya').prop('checked', true).change() }
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

		if (data.prjd_terpasang_infus === '20') { $('#prjd_terpasang_infus_ya').prop('checked', true).change() }
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
		if (data.prjl_riwayat_jatuh === '6') { $('#prjl_riwayat_jatuh_ya').prop('checked', true).change() }
		if (data.prjl_riwayat_jatuh === '0') { $('#prjl_riwayat_jatuh_tidak').prop('checked', true).change() }
		if (data.prjl_riwayat_jatuh_opt === '6') { $('#prjl_riwayat_jatuh_opt_ya').prop('checked', true).change() }
		if (data.prjl_riwayat_jatuh_opt === '0') { $('#prjl_riwayat_jatuh_opt_tidak').prop('checked', true).change() }
			// riwayat jatuh
			
			// status mental
		if (data.prjl_status_mental === '14') { $('#prjl_status_mental_ya').prop('checked', true).change() }
		if (data.prjl_status_mental === '0') { $('#prjl_status_mental_tidak').prop('checked', true).change() }
		if (data.prjl_status_mental_opt_1 === '14') { $('#prjl_status_mental_opt_1_ya').prop('checked', true).change() }
		if (data.prjl_status_mental_opt_1 === '0') { $('#prjl_status_mental_opt_1_tidak').prop('checked', true).change() }
		if (data.prjl_status_mental_opt_2 === '14') { $('#prjl_status_mental_opt_2_ya').prop('checked', true).change() }
		if (data.prjl_status_mental_opt_2 === '0') { $('#prjl_status_mental_opt_2_tidak').prop('checked', true).change() }
			// status mental
			
			// penglihatan
		if (data.prjl_penglihatan === '1') { $('#prjl_penglihatan_ya').prop('checked', true).change() }
		if (data.prjl_penglihatan === '0') { $('#prjl_penglihatan_tidak').prop('checked', true).change() }
		if (data.prjl_penglihatan_opt_1 === '1') { $('#prjl_penglihatan_opt_1_ya').prop('checked', true).change() }
		if (data.prjl_penglihatan_opt_1 === '0') { $('#prjl_penglihatan_opt_1_tidak').prop('checked', true).change() }
		if (data.prjl_penglihatan_opt_2 === '1') { $('#prjl_penglihatan_opt_2_ya').prop('checked', true).change() }
		if (data.prjl_penglihatan_opt_2 === '0') { $('#prjl_penglihatan_opt_2_tidak').prop('checked', true).change() }
			// penglihatan
		
			// kebiasaan berkemih
		if (data.prjl_berkemih === '2') { $('#prjl_berkemih_ya').prop('checked', true).change() }
		if (data.prjl_berkemih === '0') { $('#prjl_berkemih_tidak').prop('checked', true).change() }
			// end kebiasaan berkemih

			// transfer
		if (data.prjl_transfer === '0') { $('#prjl_transfer_1').prop('checked', true).change() }
		if (data.prjl_transfer === '1') { $('#prjl_transfer_2').prop('checked', true).change() }
		if (data.prjl_transfer === '2') { $('#prjl_transfer_3').prop('checked', true).change() }
		if (data.prjl_transfer === '3') { $('#prjl_transfer_4').prop('checked', true).change() }
			// end transfer

			// mobilitas
		if (data.prjl_mobilitas === '0') { $('#prjl_mobilitas_1').prop('checked', true).change() }
		if (data.prjl_mobilitas === '1') { $('#prjl_mobilitas_2').prop('checked', true).change() }
		if (data.prjl_mobilitas === '2') { $('#prjl_mobilitas_3').prop('checked', true).change() }
		if (data.prjl_mobilitas === '3') { $('#prjl_mobilitas_4').prop('checked', true).change() }
			// end mobilitas
		// end penilaian resiko jatuh lansia

		// skrining pasien akhir kehidupan
		var spak = JSON.parse(data.skrining_pasien_akhir_kehidupan);
		for (let i = 1; i <= 5; i++) {
			if (spak['kriteria_' +  i] !== '0') { $('#spak_' + i + '_ya').prop('checked', true) }
		}
		// end skrining pasien akhir kehidupan

		// geriatri
		var geriatri = JSON.parse(data.pk_geriatri);
		if (geriatri.gangguan_penglihatan === '1') { $('#pk_geriatri_1_ya').prop('checked', true).change() }
		$('#pk_geriatri_1_input').val(geriatri.ket_gangguan_penglihatan);
		if (geriatri.gangguan_pendengaran === '1') { $('#pk_geriatri_2_ya').prop('checked', true).change() }
		$('#pk_geriatri_2_input').val(geriatri.ket_gangguan_pendengaran);
		
		if (geriatri.gangguan_berkemih === '1') { $('#pk_geriatri_3_ya').prop('checked', true).change() }
		if (geriatri.ket_gangguan_berkemih.inkontinensia !== '') { $('#pk_geriatri_inkontinensia').prop('checked', true) }
		if (geriatri.ket_gangguan_berkemih.disuria !== '') { $('#pk_geriatri_disuria').prop('checked', true) }
		if (geriatri.ket_gangguan_berkemih.oliguria !== '') { $('#pk_geriatri_oliguria').prop('checked', true) }
		if (geriatri.ket_gangguan_berkemih.anuria !== '') { $('#pk_geriatri_anuria').prop('checked', true) }

		if (geriatri.gangguan_daya_ingat === '1') { $('#pk_geriatri_4_ya').prop('checked', true).change() }
		$('#pk_geriatri_4_input').val(geriatri.ket_gangguan_daya_ingat);
		if (geriatri.gangguan_bicara === '1') { $('#pk_geriatri_5_ya').prop('checked', true).change() }
		$('#pk_geriatri_5_input').val(geriatri.ket_gangguan_bicara);
		// end geriatri

		// penyakit menular
		var penyakit_menular = JSON.parse(data.pk_penyakit_menular);
		if (penyakit_menular.penyakit_saat_ini === '0') { $('#pk_penyakit_menular_1_tidak').prop('checked', true).change() }
		if (penyakit_menular.penyakit_saat_ini === '1') { $('#pk_penyakit_menular_1_ya').prop('checked', true).change() }

		if (penyakit_menular.informasi_dari.dokter !== '') { $('#pk_pm_dokter').prop('checked', true) }
		if (penyakit_menular.informasi_dari.perawat !== '') { $('#pk_pm_perawat').prop('checked', true) }
		if (penyakit_menular.informasi_dari.keluarga !== '') { $('#pk_pm_keluarga').prop('checked', true) }
		if (penyakit_menular.informasi_dari.lain !== '') { $('#pk_pm_lain').prop('checked', true) }
		if (penyakit_menular.informasi_dari.ket_lain !== '') { $('#pk_pm_lain_input').val(penyakit_menular.informasi_dari.ket_lain).attr('disabled', false) }

		if (penyakit_menular.informasi_jangka_waktu === '0') { $('#pk_penyakit_menular_3_tidak').prop('checked', true).change() }
		if (penyakit_menular.informasi_jangka_waktu === '1') { $('#pk_penyakit_menular_3_ya').prop('checked', true).change() }
		$('#pk_penyakit_menular_3_input').val(penyakit_menular.ket_informasi_jangka_waktu);
	
		if (penyakit_menular.pemeriksaan_rutin === '0') { $('#pk_penyakit_menular_4_tidak').prop('checked', true).change() }
		if (penyakit_menular.pemeriksaan_rutin === '1') { $('#pk_penyakit_menular_4_ya').prop('checked', true).change() }
		$('#pk_penyakit_menular_4_input').val(penyakit_menular.ket_pemeriksaan_rutin);
		
		if (penyakit_menular.cara_penularan.airbone !== '') { $('#pk_pm_airbone').prop('checked', true) }
		if (penyakit_menular.cara_penularan.droplet !== '') { $('#pk_pm_droplet').prop('checked', true) }
		if (penyakit_menular.cara_penularan.kontak_langsung !== '') { $('#pk_pm_kontak_langsung').prop('checked', true) }
		if (penyakit_menular.cara_penularan.cairan_tubuh !== '') { $('#pk_pm_cairan_tubuh').prop('checked', true) }

		if (penyakit_menular.penyakit_penyerta === '0') { $('#pk_penyakit_menular_6_tidak').prop('checked', true).change() }
		if (penyakit_menular.penyakit_penyerta === '1') { $('#pk_penyakit_menular_6_ya').prop('checked', true).change() }
		$('#pk_penyakit_menular_6_input').val(penyakit_menular.ket_penyakit_penyerta);
		// end penyakit menular
		
		// penurunan daya tahan tubuh
		var pdtt = JSON.parse(data.pk_penurunan_daya_tahan);
		if (pdtt.penyakit_saat_ini === '0') { $('#pk_penyakit_pdtt_1_tidak').prop('checked', true).change() }
		if (pdtt.penyakit_saat_ini === '1') { $('#pk_penyakit_pdtt_1_ya').prop('checked', true).change() }

		if (pdtt.informasi_dari.dokter !== '') { $('#pk_pdtt_dokter').prop('checked', true) }
		if (pdtt.informasi_dari.perawat !== '') { $('#pk_pdtt_perawat').prop('checked', true) }
		if (pdtt.informasi_dari.keluarga !== '') { $('#pk_pdtt_keluarga').prop('checked', true) }
		if (pdtt.informasi_dari.lain !== '') { $('#pk_pdtt_lain').prop('checked', true) }
		if (pdtt.informasi_dari.ket_lain !== '') { $('#pk_pdtt_lain_input').val(pdtt.informasi_dari.ket_lain).attr('disabled', false) }

		if (pdtt.informasi_jangka_waktu === '0') { $('#pk_penyakit_pdtt_3_tidak').prop('checked', true).change() }
		if (pdtt.informasi_jangka_waktu === '1') { $('#pk_penyakit_pdtt_3_ya').prop('checked', true).change() }
		$('#pk_penyakit_pdtt_3_input').val(pdtt.ket_informasi_jangka_waktu);
	
		if (pdtt.pemeriksaan_rutin === '0') { $('#pk_penyakit_pdtt_4_tidak').prop('checked', true).change() }
		if (pdtt.pemeriksaan_rutin === '1') { $('#pk_penyakit_pdtt_4_ya').prop('checked', true).change() }
		$('#pk_penyakit_pdtt_4_input').val(pdtt.ket_pemeriksaan_rutin);
		
		if (pdtt.penyakit_penyerta === '0') { $('#pk_penyakit_pdtt_5_tidak').prop('checked', true).change() }
		if (pdtt.penyakit_penyerta === '1') { $('#pk_penyakit_pdtt_5_ya').prop('checked', true).change() }
		$('#pk_penyakit_pdtt_5_input').val(pdtt.ket_penyakit_penyerta);
		// end penurunan daya tahan tubuh

		// kesehatan jiwa
		var kj = JSON.parse(data.pk_kesehatan_jiwa);
		for (let i = 1; i <= 9; i++) {
			if (kj['ket_' +  i] !== '0') { $('#pk_kesehatan_jiwa_' + i + '_ya').prop('checked', true) }
		}
		// end kesehatan jiwa

		// pasien kekerasan
		var kekerasan = JSON.parse(data.pk_pasien_kekerasan);
		for (let i = 1; i <= 6; i++) {
			if (kekerasan['ket_' +  i] !== '0') { $('#pk_pasien_kekerasan_' + i + '_ya').prop('checked', true) }
			if (kekerasan['ket_' +  i] !== '') { $('#pk_pasien_kekerasan_' + i).val(kekerasan['ket_' + i]) }
		}
		// end pasien kekerasan
		
		// pasien ketergantungan
		var ketergantungan = JSON.parse(data.pk_pasien_ketergantungan);
		if (ketergantungan.obat !== '0') { $('#pk_pasien_ketergantungan_obat_ya').prop('checked', true).change() }
		if (ketergantungan.ket_obat !== '') { $('#pk_pasien_ketergantungan_obat_input').val(ketergantungan.ket_obat) }
		if (ketergantungan.lama_ketergantungan !== '') { $('#pk_pasien_lama_ketergantungan_obat_input').val(ketergantungan.lama_ketergantungan) }
		// end pasien ketergantungan

		// skala early warning system 
		var skala_early = [data.sew_laju_respirasi, data.sew_saturasi, data.sew_suplemen, data.sew_temperatur, data.sew_tds, data.sew_laju_jantung, data.sew_kesadaran];
		for (let i = 0; i <= skala_early.length; i++) {
			for (let j = 1; j <= 8; j++) {
				var z = i + 1;
 				if (skala_early[i] === $('#skala_' + z + '_' + j).val()) { $('#skala_' + z + '_' + j ).prop('checked', true).change() }
			}
			
		}
		// end skala early warning system 

		// masalah keperawatan
		var kep = JSON.parse(data.masalah_keperawatan);
		for (let i = 1; i <= 34; i++) {
			if (kep['ket_' +  i] !== '') { $('#masalah_keperawatan_' + i).prop('checked', true) }
			if (kep.ket_lain !== '') { $('#masalah_keperawatan_lain_input').val(kep.ket_lain).attr('disabled', false) }
		}
		// end masalah keperawatan
		
		// perencanaan pulang
		var pp = JSON.parse(data.perencanaan_pulang);
		for (let i = 1; i <= 4; i++) {
			if (pp['planning_' +  i] !== '0') { $('#discharge_planning_' + i + '_ya').prop('checked', true) }
			for (let j = 1; j <= 9; j++) {
				if (pp.kriteria['kriteria_' +  j] !== '') { $('#kriteria_discharge_' + j).prop('checked', true) }
				if (pp.kriteria.kriteria_lain !== '') { $('#kriteria_discharge_lain_input').val(pp.kriteria.kriteria_lain).attr('disabled', false) }
			}
		}
		// end perencanaan pulang

		$('#tanggal_ttd_perawat').val((data.waktu_ttd_perawat !== null ? datetimefmysql(data.waktu_ttd_perawat) : '')).attr('disabled', true);
		// $('#tanggal_ttd_perawat_old').val((data.waktu_ttd_perawat !== null ? datetimefmysql(data.waktu_ttd_perawat) : ''));
		$('#perawat').val(data.id_perawat);
		if (data.id_perawat !== null) { $('#perawat').select2c('readonly', true) }
		$('#s2id_perawat a .select2c-chosen').html(data.perawat);
		
		// digital signature
		if (data.ttd_perawat !== null) { 
			$('#ttd_perawat').hide();
			$('#ttd_perawat_verified').show(); 
		}

		if (data.waktu_ttd_verifikasi_dokter_dpjp !== null) {
			$('#tanggal_verifikasi_dokter_dpjp').val((data.waktu_ttd_verifikasi_dokter_dpjp !== null ? datetimefmysql(data.waktu_ttd_verifikasi_dokter_dpjp)  : ''));
			$('#tanggal_verifikasi_dokter_dpjp').attr('disabled', true);
		}
		// $('#tanggal_verifikasi_dokter_dpjp_old').val((data.waktu_ttd_verifikasi_dokter_dpjp !== null ? datetimefmysql(data.waktu_ttd_verifikasi_dokter_dpjp) : ''));
		$('#verifikasi_dokter_dpjp').val(data.id_verifikasi_dokter_dpjp);
		if (data.id_verifikasi_dokter_dpjp !== null) { $('#verifikasi_dokter_dpjp').select2c('readonly', true) }
		$('#s2id_verifikasi_dokter_dpjp a .select2c-chosen').html(data.verifikator_dpjp);

		if (data.ttd_verifikasi_dokter_dpjp !== null) { 
			$('#ttd_verifikasi_dokter_dpjp').hide();
			$('#ttd_verifikasi_dokter_dpjp_verified').show(); 
		}
		
	}

	function showKajianMedis(data) {
		$('#id_kajian_medis').val(data.id);
		$('#waktu_kajian_medis').val((data.waktu_pengkajian !== null ? datetimefmysql(data.waktu_pengkajian) : '')).attr('disabled');
		// $('#waktu_kajian_medis_old').val((data.waktu_pengkajian !== null ? datetimefmysql(data.waktu_pengkajian) : ''));

		$('#keluhan_utama_medis').val(data.keluhan_utama);
		$('#rps_medis').val(data.riwayat_penyakit_sekarang);
		$('#rpt_medis').val(data.riwayat_penyakit_terdahulu);
		$('#pengobatan_medis').val(data.pengobatan);

		var rpk = JSON.parse(data.riwayat_penyakit_keluarga);
		if (rpk.hasil === '1') { $('#rpk_medis_ya').prop('checked', true).change() }
		if (rpk.asma !== '') { $('#rpk_medis_asma').prop('checked', true) }
		if (rpk.dm !== '') { $('#rpk_medis_dm').prop('checked', true) }
		if (rpk.cardiovascular !== '') { $('#rpk_medis_cardiovascular').prop('checked', true) }
		if (rpk.kanker !== '') { $('#rpk_medis_kanker').prop('checked', true) }
		if (rpk.thalasemia !== '') { $('#rpk_medis_thalasemia').prop('checked', true) }
		if (rpk.lain !== '') { $('#rpk_medis_lain').prop('checked', true) }
		if (rpk.ket_lain !== '') { $('#rpk_medis_lain_input').val(rpk.ket_lain).attr('disabled', false) }

		$('#riwayat_field').summernote('code', data.riwayat);

		var sadar = JSON.parse(data.kesadaran);
		if (sadar.composmentis !== '') { $('#composmentis_medis').prop('checked', true) }
		if (sadar.apatis !== '') { $('#apatis_medis').prop('checked', true) }
		if (sadar.samnolen !== '') { $('#samnolen_medis').prop('checked', true) }
		if (sadar.sopor !== '') { $('#sopor_medis').prop('checked', true) }
		if (sadar.koma !== '') { $('#koma_medis').prop('checked', true) }
		
		if (data.pf_kepala === 'Normal') { $('#pf_kepala_tidak').prop('checked', true) }
		if (data.pf_kepala === 'Abnormal') { $('#pf_kepala_ya').prop('checked', true) }
		if (data.ket_pf_kepala !== null) { $('#ket_pf_kepala').val(data.ket_pf_kepala) }
		
		if (data.pf_mata === 'Normal') { $('#pf_mata_tidak').prop('checked', true) }
		if (data.pf_mata === 'Abnormal') { $('#pf_mata_ya').prop('checked', true) }
		if (data.ket_pf_mata !== null) { $('#ket_pf_mata').val(data.ket_pf_mata) }
		
		if (data.pf_hidung === 'Normal') { $('#pf_hidung_tidak').prop('checked', true) }
		if (data.pf_hidung === 'Abnormal') { $('#pf_hidung_ya').prop('checked', true) }
		if (data.ket_pf_hidung !== null) { $('#ket_pf_hidung').val(data.ket_pf_hidung) }
		
		if (data.pf_gigi_mulut === 'Normal') { $('#pf_gigi_mulut_tidak').prop('checked', true) }
		if (data.pf_gigi_mulut === 'Abnormal') { $('#pf_gigi_mulut_ya').prop('checked', true) }
		if (data.ket_pf_gigi_mulut !== null) { $('#ket_pf_gigi_mulut').val(data.ket_pf_gigi_mulut) }
		
		if (data.pf_tenggorokan === 'Normal') { $('#pf_tenggorokan_tidak').prop('checked', true) }
		if (data.pf_tenggorokan === 'Abnormal') { $('#pf_tenggorokan_ya').prop('checked', true) }
		if (data.ket_pf_tenggorokan !== null) { $('#ket_pf_tenggorokan').val(data.ket_pf_tenggorokan) }
		
		if (data.pf_telinga === 'Normal') { $('#pf_telinga_tidak').prop('checked', true) }
		if (data.pf_telinga === 'Abnormal') { $('#pf_telinga_ya').prop('checked', true) }
		if (data.ket_pf_telinga !== null) { $('#ket_pf_telinga').val(data.ket_pf_telinga) }
		
		if (data.pf_leher === 'Normal') { $('#pf_leher_tidak').prop('checked', true) }
		if (data.pf_leher === 'Abnormal') { $('#pf_leher_ya').prop('checked', true) }
		if (data.ket_pf_leher !== null) { $('#ket_pf_leher').val(data.ket_pf_leher) }
		
		if (data.pf_thorax === 'Normal') { $('#pf_thorax_tidak').prop('checked', true) }
		if (data.pf_thorax === 'Abnormal') { $('#pf_thorax_ya').prop('checked', true) }
		if (data.ket_pf_thorax !== null) { $('#ket_pf_thorax').val(data.ket_pf_thorax) }
		
		if (data.pf_jantung === 'Normal') { $('#pf_jantung_tidak').prop('checked', true) }
		if (data.pf_jantung === 'Abnormal') { $('#pf_jantung_ya').prop('checked', true) }
		if (data.ket_pf_jantung !== null) { $('#ket_pf_jantung').val(data.ket_pf_jantung) }
		
		if (data.pf_paru === 'Normal') { $('#pf_paru_tidak').prop('checked', true) }
		if (data.pf_paru === 'Abnormal') { $('#pf_paru_ya').prop('checked', true) }
		if (data.ket_pf_paru !== null) { $('#ket_pf_paru').val(data.ket_pf_paru) }
		
		if (data.pf_abdomen === 'Normal') { $('#pf_abdomen_tidak').prop('checked', true) }
		if (data.pf_abdomen === 'Abnormal') { $('#pf_abdomen_ya').prop('checked', true) }
		if (data.ket_pf_abdomen !== null) { $('#ket_pf_abdomen').val(data.ket_pf_abdomen) }
		
		if (data.pf_genitalia_anus === 'Normal') { $('#pf_genitalia_tidak').prop('checked', true) }
		if (data.pf_genitalia_anus === 'Abnormal') { $('#pf_genitalia_ya').prop('checked', true) }
		if (data.ket_pf_genitalia_anus !== null) { $('#ket_pf_genitalia').val(data.ket_pf_genitalia_anus) }
		
		if (data.pf_ekstermitas === 'Normal') { $('#pf_ekstermitas_tidak').prop('checked', true) }
		if (data.pf_ekstermitas === 'Abnormal') { $('#pf_ekstermitas_ya').prop('checked', true) }
		if (data.ket_pf_ekstermitas !== null) { $('#ket_pf_ekstermitas').val(data.ket_pf_ekstermitas) }
		
		if (data.pf_kulit === 'Normal') { $('#pf_kulit_tidak').prop('checked', true) }
		if (data.pf_kulit === 'Abnormal') { $('#pf_kulit_ya').prop('checked', true) }
		if (data.ket_pf_kulit !== null) { $('#ket_pf_kulit').val(data.ket_pf_kulit) }

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

		if (data.waktu_ttd_dokter_dpjp !== null) {
			$('#tanggal_ttd_dokter_dpjp').val((data.waktu_ttd_dokter_dpjp !== null ? datetimefmysql(data.waktu_ttd_dokter_dpjp) : ''))
			$('#tanggal_ttd_dokter_dpjp').attr('disabled', true);
		}
		// $('#tanggal_ttd_dokter_dpjp_old').val((data.waktu_ttd_dokter_dpjp !== null ? datetimefmysql(data.waktu_ttd_dokter_dpjp) : ''));
		$('#dokter_dpjp').val(data.id_dokter_dpjp);
		if (data.id_dokter_dpjp !== null) { $('#dokter_dpjp').select2c('readonly', true) }
		$('#s2id_dokter_dpjp a .select2c-chosen').html(data.dokter_dpjp);
		
		// digital signature
		if (data.ttd_dokter_dpjp !== null) { 
			$('#ttd_dokter_dpjp').hide();
			$('#ttd_dokter_dpjp_verified').show(); 
		}

		if (data.waktu_ttd_dokter_pengkajian !== null) {
			$('#tanggal_ttd_dokter_pengkajian').val((data.waktu_ttd_dokter_pengkajian !== null ? datetimefmysql(data.waktu_ttd_dokter_pengkajian) : ''))
			$('#tanggal_ttd_dokter_pengkajian').attr('disabled', true);
		}
		// $('#tanggal_ttd_dokter_pengkajian_old').val((data.waktu_ttd_dokter_pengkajian !== null ? datetimefmysql(data.waktu_ttd_dokter_pengkajian) : ''));
		$('#dokter_pengkajian').val(data.id_dokter_pengkajian);
		if (data.id_dokter_pengkajian !== null) { $('#dokter_pengkajian').select2c('readonly', true) }
		$('#s2id_dokter_pengkajian a .select2c-chosen').html(data.dokter_pengkajian);

		if (data.ttd_dokter_pengkajian !== null) { 
			$('#ttd_dokter_pengkajian').hide();
			$('#ttd_dokter_pengkajian_verified').show(); 
		}
	}

	function konfirmasiSimpanPengkajianAwal() {
		var stop = false;
		if ($('#waktu_kajian_perawat').val() === '') {
			syams_validation('#waktu_kajian_perawat', 'Kolom waktu pengkajian harus diisi!');
			$('#wizard-form-icare').bwizard('show', '0');
			stop = true;
		}

		if ($('#tanggal_ttd_perawat').val() === '') {
			syams_validation('#tanggal_ttd_perawat', 'Kolom waktu verifikasi perawat harus diisi!');
			$('#tanggal_ttd_perawat').focus();
			$('#wizard-form-icare').bwizard('show', '0');
			stop = true;
		}

		if ($('#perawat').val() === '') {
			syams_validation('#perawat', 'Kolom perawat harus dipilih!');
			$('#wizard-form-icare').bwizard('show', '0');
			stop = true;
		}
		
		if (stop) {
			return false;
		}

		if($('#ttd_perawat').is(":visible")){
			if($('#ttd_perawat').is(":not(:checked)")){
				swalAlert('warning', 'Signature Validation', 'Harap Perawat tanda tangan terlebih dahulu');
				$('#wizard-form-icare').bwizard('show', '0');
				return false;
			}
		}
		
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
			url: '<?= base_url("intensive_care/api/intensive_care/simpan_pengkajian_awal_icare") ?>',
			data: $('#form-pengkajian-awal-icare').serialize() + '&riwayat=' + riwayat + '&hasil_lab=' + hasil_lab + '&hasil_rad=' + hasil_rad + '&hasil_pen_lain=' + hasil_pen_lain + '&diag_awal=' + diag_awal,
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

				$('#modal-pengkajian-awal-icare').modal('hide');
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

	function calcscorepjd() {
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

	function calcscoreprjl() {
		var score = 0;
		$("input[name='prjl_riwayat_jatuh']:checked").each(function() {
			if ($(this).val() == '6') {
				score += parseInt(6);
			} else if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});

		$("input[name='prjl_riwayat_jatuh_opt']:checked").each(function() {
			if ($(this).val() == '6') {
				score += parseInt(6);
			} else if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});

		$("input[name='prjl_status_mental']:checked").each(function() {
			if ($(this).val() == '14') {
				if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14') {
					score += parseInt(14);
				} else if ($("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
					score += parseInt(14);
				} else if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14' && $("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
					score += parseInt(14);
				} else {
					score += parseInt(14);
				}
			} else {
				if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14') {
					score += parseInt(14);
				} else if ($("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
					score += parseInt(14);
				} else if ($("input[name='prjl_status_mental_opt_1']:checked").val() == '14' && $("input[name='prjl_status_mental_opt_2']:checked").val() == '14') {
					score += parseInt(14);
				} else {
					score += parseInt(0);
				}
			}
		});

		$("input[name='prjl_penglihatan']:checked").each(function() {
			if ($(this).val() == '1') {
				if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1') {
					score += parseInt(1);
				} else if ($("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
					score += parseInt(1);
				} else if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1' && $("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
					score += parseInt(1);
				} else {
					score += parseInt(1);
				}
			} else {
				if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1') {
					score += parseInt(1);
				} else if ($("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
					score += parseInt(1);
				} else if ($("input[name='prjl_penglihatan_opt_1']:checked").val() == '1' && $("input[name='prjl_penglihatan_opt_2']:checked").val() == '1') {
					score += parseInt(1);
				} else {
					score += parseInt(0);
				}
			}
		});

		$("input[name='prjl_berkemih']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			} else if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});

		var nilaiTransfer = $("input[name='prjl_transfer']:checked").val();
		var nilaiMobilitas = $("input[name='prjl_mobilitas']:checked").val();

		$("input[name='prjl_transfer']:checked").each(function() {
			if (nilaiTransfer == '0' && nilaiMobilitas == '0') {
				score += parseInt(0);
			} else if (nilaiTransfer == '1' && nilaiMobilitas == '0') {
				score += parseInt(0);
			} else if (nilaiTransfer == '2' && nilaiMobilitas == '0') {
				score += parseInt(0);
			} else if (nilaiTransfer == '3' && nilaiMobilitas == '0') {
				score += parseInt(0);
			} else if (nilaiTransfer == '0' && nilaiMobilitas == '1') {
				score += parseInt(0);
			} else if (nilaiTransfer == '1' && nilaiMobilitas == '1') {
				score += parseInt(0);
			} else if (nilaiTransfer == '2' && nilaiMobilitas == '1') {
				score += parseInt(0);
			} else if (nilaiTransfer == '3' && nilaiMobilitas == '1') {
				score += parseInt(7);
			} else if (nilaiTransfer == '0' && nilaiMobilitas == '2') {
				score += parseInt(0);
			} else if (nilaiTransfer == '1' && nilaiMobilitas == '2') {
				score += parseInt(0);
			} else if (nilaiTransfer == '2' && nilaiMobilitas == '2') {
				score += parseInt(7);
			} else if (nilaiTransfer == '3' && nilaiMobilitas == '2') {
				score += parseInt(7);
			} else if (nilaiTransfer == '0' && nilaiMobilitas == '3') {
				score += parseInt(0);
			} else if (nilaiTransfer == '1' && nilaiMobilitas == '3') {
				score += parseInt(7);
			} else if (nilaiTransfer == '2' && nilaiMobilitas == '3') {
				score += parseInt(7);
			} else if (nilaiTransfer == '3' && nilaiMobilitas == '3') {
				score += parseInt(7);
			}
		})

		$('#prjl_jumlah').val(score);
	}

	function showHistoryLogs(id_layanan_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("intensive_care/api/intensive_care/get_history_logs_pengkajian_awal_icare") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#table_kajian_medis tbody').empty();
				$.each(data.kajian_medis_logs, function (i, v) {
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

					$('#table_kajian_medis tbody').append(html);
				});

				$('#modal_history_logs').modal('show');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function riwayatPengkajianMedisIGD() {       
        let id_pendaftaran = $('#id_pendaftaran').val();
		let id_lay_pend    = $('#id_layanan_pendaftaran').val();
		let id_pasien      = $('#id_pasien').val();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("rawat_inap/api/rawat_inap/get_data_pengkajian_medis_igd") ?>/id/'+id_pasien+'/id_pendaftaran/'+id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
				showDataPasienPengkajianMedisIGD(data.pasien);
				
                if(data.kajian_medis !==null){					
					showDataPengkajianMedisIGD(data.kajian_medis);				
                	showDataPengkajianKeperawatanIGD(data.kajian_keperawatan);
					$('#modal-pengkajian-medis-igd').modal('show');
				} else {
					messageCustom('Pengkajian Awal IGD Belum Diisi', 'Info');
				}
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Pengkajian Awal IGD Tidak Tersedia', 'Info');
            }
        });
    }

	function showDataPasienPengkajianMedisIGD(pasien) {
		$('#pmigd-pasien-nama').html(pasien.nama);
		$('#pmigd-pasien-no-rm').html(pasien.id);
		$('#pmigd-pasien-tanggal-lahir').text((pasien.tanggal_lahir !== null ? datefmysql(pasien.tanggal_lahir) : '-') + ( ' (' + hitungUmur(pasien.tanggal_lahir) + ')'));
		$('#pmigd-pasien-jenis-kelamin').text((pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
		
		$('#ppigd-psikologis-mental-status-pekerjaan').html(pasien.pekerjaan);
		$('#ppigd-psikologis-mental-status-carabayar').html(pasien.penjamin);
	}

	function showDataPengkajianMedisIGD(kajian_medis) {
		$('#pmigd-dokter-igd').html(kajian_medis.dokter_igd);
		$('#pmigd-dokter-dpjp').html(kajian_medis.verifikasi_dpjp);
        $('#pmigd-waktu').html(kajian_medis.waktu);
		$('#pmigd-keluhan-utama').html(kajian_medis.keluhan_utama);
		$('#pmigd-penyakit-skr').html(kajian_medis.riwayat_penyakit_sekarang);

		// Start Riwayat Penyakit Dahulu		
			var rpt_dl = '';
			var rptdl = JSON.parse(kajian_medis.riwayat_penyakit_dahulu);
			if (rptdl.asma === '1') 			{ if(rpt_dl==='') {rpt_dl='Asma'} 				else {rpt_dl=rpt_dl+' & Asma'} } 
			if (rptdl.diabetes_miletus === '1')	{ if(rpt_dl==='') {rpt_dl='Diabetes Miletus'} 	else {rpt_dl=rpt_dl+' & Diabetes Miletus'} }  
			if (rptdl.cardiovascular === '1') 	{ if(rpt_dl==='') {rpt_dl='Cardiovascular'} 	else {rpt_dl=rpt_dl+' & Cardiovascular'} }
			if (rptdl.kanker === '1') 			{ if(rpt_dl==='') {rpt_dl='Kanker'} 			else {rpt_dl=rpt_dl+' & Kanker'} }   
			if (rptdl.thalasemia === '1') 		{ if(rpt_dl==='') {rpt_dl='Thalasemia'}			else {rpt_dl=rpt_dl+' & Thalasemia'} } 
			if (rptdl.lain === '1')				{ if(rpt_dl==='') {rpt_dl=rptdl.ket_lain} 		else {rpt_dl=rpt_dl+' & Lain-lain: '+rptdl.ket_lain} } 
			$('#pmigd-penyakit-dulu').html(rpt_dl);
		// End Riwayat Penyakit Dahulu

		// Start Riwayat Penyakit Keluarga
			var rpk_kl = '';
			var rpkkl = JSON.parse(kajian_medis.riwayat_penyakit_keluarga);
			if (rpkkl.asma === '1') 			{ if(rpk_kl==='') {rpk_kl='Asma'} 				else {rpk_kl=rpk_kl+' & Asma'} } 
			if (rpkkl.diabetes_miletus === '1')	{ if(rpk_kl==='') {rpk_kl='Diabetes Miletus'} 	else {rpk_kl=rpk_kl+' & Diabetes Miletus'} }  
			if (rpkkl.cardiovascular === '1') 	{ if(rpk_kl==='') {rpk_kl='Cardiovascular'} 	else {rpk_kl=rpk_kl+' & Cardiovascular'} }
			if (rpkkl.kanker === '1') 			{ if(rpk_kl==='') {rpk_kl='Kanker'} 			else {rpk_kl=rpk_kl+' & Kanker'} }   
			if (rpkkl.thalasemia === '1') 		{ if(rpk_kl==='') {rpk_kl='Thalasemia'}			else {rpk_kl=rpk_kl+' & Thalasemia'} } 
			if (rpkkl.lain === '1')				{ if(rpk_kl==='') {rpk_kl=rpkkl.ket_lain} 		else {rpk_kl=rpk_kl+' & Lain-lain: '+rpkkl.ket_lain} } 
			$('#pmigd-penyakit-keluarga').html(rpk_kl);
		// End Riwayat Penyakit Keluarga
		
		$('#pmigd-riwayat').html(kajian_medis.riwayat_detail);

		// Start Alergi
			if (kajian_medis.alergi === '0')		{ $('#pmigd-alergi').html('Tidak'); 				$('#pmigd-kreaksi-alergi').html('Tidak'); } 
			if (kajian_medis.alergi === '1')		{ $('#pmigd-alergi').html(kajian_medis.ket_alergi);	$('#pmigd-kreaksi-alergi').html(kajian_medis.ket_reaksi_alergi); } 
		// End Alergi


		// START -------- PENGKAJIAN NYERI -------- 
			// Start Neonatus
				var neo = JSON.parse(kajian_medis.neonatus);

				// Start menangis
					if(neo.menangis === '0')		{ $('#pmigd-neonatus-menangis').html('0. Tidak Menangis');}
					else if(neo.menangis === '1')	{ $('#pmigd-neonatus-menangis').html('1. Merintih');}
					else if(neo.menangis === '2')	{ $('#pmigd-neonatus-menangis').html('2. Menagis Terus');}
				// End menangis

				// Start spo
					if(neo.spo === '0')			{ $('#pmigd-neonatus-spo').html('0. Normal');}
					else if(neo.spo === '1')	{ $('#pmigd-neonatus-spo').html('1. F2O2 < 30%');}
					else if(neo.spo === '2')	{ $('#pmigd-neonatus-spo').html('2. F2O2 < 30%');}
				// End spo

				// Start vital
					if(neo.vital === '0')		{ $('#pmigd-neonatus-vital').html('0. HR dan TD dalam batas normal');}
					else if(neo.vital === '1')	{ $('#pmigd-neonatus-vital').html('1. < 20%');}
					else if(neo.vital === '2')	{ $('#pmigd-neonatus-vital').html('2. > 20%');}
				// End vital

				// Start wajah
					if(neo.wajah === '0')		{ $('#pmigd-neonatus-wajah').html('0. Biasa');}
					else if(neo.wajah === '1')	{ $('#pmigd-neonatus-wajah').html('1. Meringis');}
					else if(neo.wajah === '2')	{ $('#pmigd-neonatus-wajah').html('2. Meringis / Mendengkur');}
				// End wajah

				// Start tidur
					if(neo.tidur === '0')		{ $('#pmigd-neonatus-tidur').html('0. Normal');}
					else if(neo.tidur === '1')	{ $('#pmigd-neonatus-tidur').html('1. Sering Terbangun');}
					else if(neo.tidur === '2')	{ $('#pmigd-neonatus-tidur').html('2. Tidak Ada Tidur');}
				// End tidur

				if (neo.total !== '') 		{ $('#pmigd-neonatus-total').html(neo.total); }
			// End Neonatus

			$('#pmigd-ket-nyeri').html(kajian_medis.ket_nyeri);

			// Start Nyeri Hilang	
				var ny_h = '';
				var nyh = JSON.parse(kajian_medis.ket_nyeri_hilang);
				if (nyh.minum_obat === '1') 		{ if(ny_h==='') {ny_h='Minum Obat'} 		else {ny_h=ny_h+' & Minum Obat'} } 
				if (nyh.mendengarkan_musik === '1')	{ if(ny_h==='') {ny_h='Mendengarkan Musik'} else {ny_h=ny_h+' & Mendengarkan Musik'} }  
				if (nyh.istirahat === '1') 			{ if(ny_h==='') {ny_h='Istirahat'} 			else {ny_h=ny_h+' & Istirahat'} }
				if (nyh.berubah_posisi === '1') 	{ if(ny_h==='') {ny_h='Berubah Posisi'} 	else {ny_h=ny_h+' & Berubah Posisi'} }
				if (nyh.lain === '1')				{ if(ny_h==='') {ny_h=nyh.ket_lain} 		else {ny_h=ny_h+' & Lain-lain: '+nyh.ket_lain} } 
				$('#pmigd-ket-nyeri-hilang').html(ny_h);
			// End Nyeri Hilang


			// Start Anak FLACC Wajah
				if(kajian_medis.flacc_wajah === '1')		{ $('#pmigd-flacc-wajah').html('1. Tidak ada ekspresi tertentu atau senyum');}
				else if(kajian_medis.flacc_wajah === '2')	{ $('#pmigd-flacc-wajah').html('2. Sesekali meringis / mengerutkan kening, menarik diri tidak tertarik');}
				else if(kajian_medis.flacc_wajah === '3')	{ $('#pmigd-flacc-wajah').html('3. Sering sampai konstan mengerutkan kening, rahang terkatup, dagu gemetaran');}
			// End Anak FLACC Wajah

			// Start Anak FLACC Kaki
				if(kajian_medis.flacc_kaki === '0')			{ $('#pmigd-flacc-kaki').html('0. Posisi kaki normal atau santai');}
				else if(kajian_medis.flacc_kaki === '1')	{ $('#pmigd-flacc-kaki').html('1. Cemas, gelisah, tegang');}
				else if(kajian_medis.flacc_kaki === '2')	{ $('#pmigd-flacc-kaki').html('2. Menendang atau menarik kaki');}
			// End Anak FLACC Kaki

			// Start Anak FLACC aktifitas
				if(kajian_medis.flacc_aktifitas === '0')		{ $('#pmigd-flacc-aktifitas').html('0. Berbaring tenang, posisi normal, bergerak dengan mudah');}
				else if(kajian_medis.flacc_aktifitas === '1')	{ $('#pmigd-flacc-aktifitas').html('1. Menggeliat, modar-mandir, tegang');}
				else if(kajian_medis.flacc_aktifitas === '2')	{ $('#pmigd-flacc-aktifitas').html('2. Melengkung, kaku, menyentak');}
			// End Anak FLACC aktifitas
				
			// Start Anak FLACC menangis
				if(kajian_medis.flacc_menangis === '0')			{ $('#pmigd-flacc-menangis').html('0. Tidak ada teriakan (terjaga / tidur)');}
				else if(kajian_medis.flacc_menangis === '1')	{ $('#pmigd-flacc-menangis').html('1. Mengerang, merintih sesekali mengeluh');}
				else if(kajian_medis.flacc_menangis === '2')	{ $('#pmigd-flacc-menangis').html('2. Menangis terus teriak, sering mengeluh');}
			// End Anak FLACC menangis
			
			// Start Anak FLACC bicara
				if(kajian_medis.flacc_bicara === '0')		{ $('#pmigd-flacc-bicara').html('0. Puas, senang, santai');}
				else if(kajian_medis.flacc_bicara === '1')	{ $('#pmigd-flacc-bicara').html('1. Sesekali diyakinkan dengan sentuhan, pelukan, diajak');}
				else if(kajian_medis.flacc_bicara === '2')	{ $('#pmigd-flacc-bicara').html('2. Sulit untuk dihibur atau di buat nyaman');}
			// End Anak FLACC bicara

			$('#pmigd-flacc-total').html(kajian_medis.flacc_total);
		// END -------- PENGKAJIAN NYERI -------- 


		// START -------- PEMERIKSAAN FISIK -------- 
			$('#pmigd-fisik-kepala').html(kajian_medis.fisik_kepala);
			$('#pmigd-fisik-mata').html(kajian_medis.fisik_mata);
			$('#pmigd-fisik-mulut').html(kajian_medis.fisik_mulut);
			$('#pmigd-fisik-leher').html(kajian_medis.fisik_leher);
			$('#pmigd-fisik-thoraks-cor').html(kajian_medis.fisik_thoraks_cor);
			$('#pmigd-fisik-thoraks-pulmo').html(kajian_medis.fisik_thoraks_pulmo);
			$('#pmigd-fisik-abdomen').html(kajian_medis.fisik_abdomen);
			$('#pmigd-fisik-ekstermitas').html(kajian_medis.fisik_ekstermitas);
			$('#pmigd-fisik-kulit-kelamin').html(kajian_medis.fisik_kulit_kelamin);
			$('#pmigd-fisik-diagnosa-awal').html(kajian_medis.diagnosa_awal);
			$('#pmigd-fisik-diagnosa-banding').html(kajian_medis.diagnosa_banding);

			$('#pmigd-fisik-status-lokalis').html(kajian_medis.fisik_status_lokalis);

			if (kajian_medis.fisik_note_anathomi !== '') {
				$('.drawpad').hide()
				$('#fisik_img_anathomi_igd').show()
				$('#fisik_img_anathomi_igd').attr('src', kajian_medis.fisik_note_anathomi)
				$('#drawpad_input').val(kajian_medis.fisik_note_anathomi)
			} else {
				$('#fisik_img_anathomi_igd').hide()
				$('#fisik_img_anathomi_igd').attr('src', '')
			}
		// END -------- PEMERIKSAAN FISIK -------- 


		// START -------- PEMERIKSAAN PENUNJANG -------- 
			// Start Lab
				var p_lab = '';
				var plab = JSON.parse(kajian_medis.penunjang_lab);
				if (plab.dpl === '1') 			{ if(p_lab==='') {p_lab='DPL'} 				else {p_lab=p_lab+' & DPL'} } 
				if (plab.agd === '1') 			{ if(p_lab==='') {p_lab='AGD'} 				else {p_lab=p_lab+' & AGD'} } 
				if (plab.elektrolit === '1') 	{ if(p_lab==='') {p_lab='Elektrolit'} 		else {p_lab=p_lab+' & Elektrolit'} } 
				if (plab.urin === '1')			{ if(p_lab==='') {p_lab='Urin'} 			else {p_lab=p_lab+' & Urin'} }  
				if (plab.ck === '1') 			{ if(p_lab==='') {p_lab='CK/CKMB'} 			else {p_lab=p_lab+' & CK/CKMB'} }
				if (plab.gds === '1') 			{ if(p_lab==='') {p_lab='GDS'} 				else {p_lab=p_lab+' & GDS'} }   
				if (plab.ureum === '1') 		{ if(p_lab==='') {p_lab='Ureum Creatinin'}	else {p_lab=p_lab+' & Ureum Creatinin'} } 
				if (plab.lain === '1')			{ if(p_lab==='') {p_lab=plab.ket_lain} 		else {p_lab=p_lab+' & Lain-lain: '+plab.ket_lain} } 
				$('#pmigd-penunjang-lab').html(p_lab);
			// End Lab
		
			// Start X-Ray
				var p_xray = '';
				var pxray = JSON.parse(kajian_medis.penunjang_xray);
				if (pxray.tidak_ada === '1')	{ if(p_xray==='') {p_xray='Tidak Ada'} 			else {p_xray=p_xray+' & Tidak Ada'} }  
				if (pxray.thorax === '1') 		{ if(p_xray==='') {p_xray='Thorax'} 			else {p_xray=p_xray+' & Thorax'} }
				if (pxray.abdomen === '1') 		{ if(p_xray==='') {p_xray='Abdomen 3 Posisi'} 	else {p_xray=p_xray+' & Abdomen 3 Posisi'} }   
				if (pxray.ctscan === '1') 		{ if(p_xray==='') {p_xray='CT Scan'}			else {p_xray=p_xray+' & CT Scan'} } 
				if (pxray.lain === '1')			{ if(p_xray==='') {p_xray=pxray.ket_lain} 		else {p_xray=p_xray+' & Lain-lain: '+pxray.ket_lain} } 
				$('#pmigd-penunjang-xray').html(p_xray);
			// End X-Ray

			// Start EKG
				var peky = JSON.parse(kajian_medis.penunjang_ekg);
				if (peky.ekg === '0')		{ $('#pmigd-penunjang-ekg').html('Tidak'); } 
				if (peky.ekg === '1')		{ $('#pmigd-penunjang-ekg').html(peky.ket_ekg); } 
			// End EKG
		// END -------- PEMERIKSAAN PENUNJANG -------- 


		// START -------- TERAPI / TINDAKAN / INSTRUKSI LAIN --------
			$('#field_terapi_tindakan_igd').html(kajian_medis.terapi_tindakan);
		// END -------- TERAPI / TINDAKAN / INSTRUKSI LAIN --------

		
		// START -------- STATUS AKHIR PASIEN --------
			
			$('#pmigd-status-akhir-ruang').html(kajian_medis.bangsal);

			// Start dipulangkan
				if (kajian_medis.kontrol === '0')		{ $('#pmigd-status-akhir-dipulangkan').html('Tidak Perlu Kontrol'); } 
				if (kajian_medis.kontrol === '1')		{ $('#pmigd-status-akhir-dipulangkan').html('Kontrol di '+kajian_medis.ket_kontrol); } 
			// End dipulangkan

			$('#pmigd-status-akhir-dirujuk').html(kajian_medis.dirujuk_ke);
			$('#pmigd-status-akhir-alasanrujuk').html(kajian_medis.alasan_rujuk);
			$('#pmigd-status-akhir-pulangpaksa').html(kajian_medis.alasan_pulang_paksa );

			// Start meninggal
				if (kajian_medis.meninggal === '0')		{ $('#pmigd-status-akhir-meninggal').html('Tidak'); } 
				if (kajian_medis.meninggal === '1')		{ $('#pmigd-status-akhir-meninggal').html('Meninggal'); } 
			// End meninggal

			$('#pmigd-status-akhir-kondisipasien').html(kajian_medis.kondisi_saat_pulang);


			// Start kesadaran
				var sa_sadar = '';
				var sasadar = JSON.parse(kajian_medis.kesadaran);
				if (sasadar.cm === '1')			{ if(sa_sadar==='') {sa_sadar='CM'} 		else {sa_sadar=sa_sadar+' & CM'} }  
				if (sasadar.apatis === '1') 	{ if(sa_sadar==='') {sa_sadar='Apatis'} 	else {sa_sadar=sa_sadar+' & Apatis'} }   
				if (sasadar.delirium === '1') 	{ if(sa_sadar==='') {sa_sadar='Delirium'}	else {sa_sadar=sa_sadar+' & Delirium'} } 
				if (sasadar.sopor === '1') 		{ if(sa_sadar==='') {sa_sadar='Sopor'}		else {sa_sadar=sa_sadar+' & Sopor'} } 
				if (sasadar.koma === '1') 		{ if(sa_sadar==='') {sa_sadar='Koma'}		else {sa_sadar=sa_sadar+' & Koma'} } 
				$('#pmigd-status-akhir-kesadaran').html(sa_sadar);
			// End kesadaran

			// Start Jenis Kebutuhan Layanan
			var sa_keblay = '';
				var sakeblay = JSON.parse(kajian_medis.kebutuhan_layanan);
				if (sakeblay.preventif === '1')		{ if(sa_keblay==='') {sa_keblay='Preventif'} 		else {sa_keblay=sa_keblay+' & Preventif'} }  
				if (sakeblay.kuratif === '1') 		{ if(sa_keblay==='') {sa_keblay='Kuratif'} 			else {sa_keblay=sa_keblay+' & Kuratif'} }   
				if (sakeblay.paliatif === '1') 		{ if(sa_keblay==='') {sa_keblay='Paliatif'}			else {sa_keblay=sa_keblay+' & Paliatif'} } 
				if (sakeblay.rehabilitatif === '1') { if(sa_keblay==='') {sa_keblay='Rehabilitatif'}	else {sa_keblay=sa_keblay+' & Rehabilitatif'} }
				$('#pmigd-status-jenis-kebutuhan-layanan').html(sa_keblay);
			// End Jenis Kebutuhan Layanan


			// Start GCS
				var sa_gcs = '';
				if (kajian_medis.gcs_e !== '') { if(sa_gcs==='') {sa_gcs='E='+kajian_medis.gcs_e} else {sa_gcs=sa_gcs+' & E='+kajian_medis.gcs_e} }  
				if (kajian_medis.gcs_m !== '') { if(sa_gcs==='') {sa_gcs='M='+kajian_medis.gcs_m} else {sa_gcs=sa_gcs+' & M='+kajian_medis.gcs_m} }   
				if (kajian_medis.gcs_v !== '') { if(sa_gcs==='') {sa_gcs='V='+kajian_medis.gcs_v} else {sa_gcs=sa_gcs+' & V='+kajian_medis.gcs_v} } 
				$('#pmigd-status-akhir-gcs').html(sa_gcs);
			// End GCS
			
			// $('#pmigd-status-akhir-gcs').html('E='+kajian_medis.gcs_e+' M='+kajian_medis.gcs_m+' V='+kajian_medis.gcs_v);
			$('#pmigd-status-akhir-catatan').html(kajian_medis.catatan_khusus);

		// END -------- STATUS AKHIR PASIEN --------


		
    }


	function showDataPengkajianKeperawatanIGD(kajian_keperawatan) {
		$('#ppigd-dokter-igd').html(kajian_keperawatan.perawat);
		$('#ppigd-dokter-dpjp').html(kajian_keperawatan.verifikasi_dpjp);

		// Start Informasi Diperoleh dari
			var ppigd_info = '';
			var ppigdinfo = JSON.parse(kajian_keperawatan.informasi_dari);
			if (ppigdinfo.pasien === '1')	{ if(ppigd_info==='') {ppigd_info='Pasien'} 			else {ppigd_info=ppigd_info+' & Pasien'} }  
			if (ppigdinfo.keluarga === '1') { if(ppigd_info==='') {ppigd_info='Keluarga'} 			else {ppigd_info=ppigd_info+' & Keluarga'} }   
			if (ppigdinfo.lain === '1') 	{ if(ppigd_info==='') {ppigd_info=ppigdinfo.ket_lain} 	else {ppigd_info=ppigd_info+' & Lain-lain: '+ppigdinfo.ket_lain} } 
			$('#ppigd-informasi-dari').html(ppigd_info);
		// End Informasi Diperoleh dari

		// Start Cara Masuk
			var ppigd_cmsk = '';
			var ppigdcmsk = JSON.parse(kajian_keperawatan.cara_masuk);
			if (ppigdcmsk.tanpa_bantuan === '1')	{ if(ppigd_cmsk==='') {ppigd_cmsk='Jalan tanpa bantuan'} 	else {ppigd_cmsk=ppigd_cmsk+' & Jalan tanpa bantuan'} }  
			if (ppigdcmsk.dengan_bantuan === '1') 	{ if(ppigd_cmsk==='') {ppigd_cmsk='Jalan dengan bantuan'} 	else {ppigd_cmsk=ppigd_cmsk+' & Jalan dengan bantuan'} }   
			if (ppigdcmsk.kursi_roda === '1')		{ if(ppigd_cmsk==='') {ppigd_cmsk='Kursi Roda'} 			else {ppigd_cmsk=ppigd_cmsk+' & Kursi Roda'} }  
			if (ppigdcmsk.brankar === '1') 			{ if(ppigd_cmsk==='') {ppigd_cmsk='Brankar'} 				else {ppigd_cmsk=ppigd_cmsk+' & Brankar'} }   
			$('#ppigd-cara-masuk').html(ppigd_cmsk);
		// End Cara Masuk


		$('#ppigd-keluhan-utama').html(kajian_keperawatan.keluhan_utama);
		$('#ppigd-riwayat-penyakit-sekarang').html(kajian_keperawatan.riwayat_penyakit_sekarang);

		// Start Riwayat Penyakit Terdahulu
			var ppigd_rpt = '';
			var ppigdrpt = JSON.parse(kajian_keperawatan.riwayat_penyakit_terdahulu);
			if (ppigdrpt.asma === '1')			{ if(ppigd_rpt==='') {ppigd_rpt='Asma'} 			else {ppigd_rpt=ppigd_rpt+' & Asma'} }  
			if (ppigdrpt.hipertensi === '1') 	{ if(ppigd_rpt==='') {ppigd_rpt='Hipertensi'} 		else {ppigd_rpt=ppigd_rpt+' & Hipertensi'} }   
			if (ppigdrpt.jantung === '1')		{ if(ppigd_rpt==='') {ppigd_rpt='Jantung'} 			else {ppigd_rpt=ppigd_rpt+' & Jantung'} }  
			if (ppigdrpt.diabetes === '1') 		{ if(ppigd_rpt==='') {ppigd_rpt='Diabetes'} 		else {ppigd_rpt=ppigd_rpt+' & Diabetes'} }   
			if (ppigdrpt.hepatitis === '1')		{ if(ppigd_rpt==='') {ppigd_rpt='Hepatitis'} 			else {ppigd_rpt=ppigd_rpt+' & Hepatitis'} }  
			if (ppigdrpt.lain === '1') 			{ if(ppigd_rpt==='') {ppigd_rpt=ppigdrpt.ket_lain} 	else {ppigd_rpt=ppigd_rpt+' & Lain-lain: '+ppigdrpt.ket_lain} } 
			$('#ppigd-riwayat-penyakit-terdahulu').html(ppigd_rpt);
		// End Riwayat Penyakit Terdahulu

		// Start Riwayat Penyakit Keluarga
			var ppigd_rpk = '';
			var ppigdrpk = JSON.parse(kajian_keperawatan.riwayat_penyakit_keluarga);
			if (ppigdrpk.asma === '1')			{ if(ppigd_rpk==='') {ppigd_rpk='Asma'} 			else {ppigd_rpk=ppigd_rpk+' & Asma'} }  
			if (ppigdrpk.hipertensi === '1') 	{ if(ppigd_rpk==='') {ppigd_rpk='Hipertensi'} 		else {ppigd_rpk=ppigd_rpk+' & Hipertensi'} }   
			if (ppigdrpk.jantung === '1')		{ if(ppigd_rpk==='') {ppigd_rpk='Jantung'} 			else {ppigd_rpk=ppigd_rpk+' & Jantung'} }  
			if (ppigdrpk.diabetes === '1') 		{ if(ppigd_rpk==='') {ppigd_rpk='Diabetes'} 		else {ppigd_rpk=ppigd_rpk+' & Diabetes'} }   
			if (ppigdrpk.hepatitis === '1')		{ if(ppigd_rpk==='') {ppigd_rpk='Hepatitis'} 		else {ppigd_rpk=ppigd_rpk+' & Hepatitis'} }  
			if (ppigdrpk.lain === '1') 			{ if(ppigd_rpk==='') {ppigd_rpk=ppigdrpk.ket_lain} 	else {ppigd_rpk=ppigd_rpk+' & Lain-lain: '+ppigdrpk.ket_lain} } 
			$('#ppigd-riwayat-penyakit-keluarga').html(ppigd_rpk);
		// End Riwayat Penyakit Terdahulu

		// START -------- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL --------

			// Start Kesadaran
				var ppigd_ksd = '';
				var ppigdksd = JSON.parse(kajian_keperawatan.kesadaran);
				if (ppigdksd.composmentis === '1')	{ if(ppigd_ksd==='') {ppigd_ksd='Composmentis '} 	else {ppigd_ksd=ppigd_ksd+' & Composmentis '} }  
				if (ppigdksd.apatis === '1') 		{ if(ppigd_ksd==='') {ppigd_ksd='Apatis'} 			else {ppigd_ksd=ppigd_ksd+' & Apatis '} }   
				if (ppigdksd.samnolen === '1')		{ if(ppigd_ksd==='') {ppigd_ksd='Samnolen'} 		else {ppigd_ksd=ppigd_ksd+' & Samnolen'} }  
				if (ppigdksd.sopor === '1') 		{ if(ppigd_ksd==='') {ppigd_ksd='Sopor'} 			else {ppigd_ksd=ppigd_ksd+' & Sopor'} }   
				if (ppigdksd.koma === '1') 			{ if(ppigd_ksd==='') {ppigd_ksd='Koma'} 			else {ppigd_ksd=ppigd_ksd+' & Koma'} }   
				$('#ppigd-fisikvital-kesadaran').html(ppigd_ksd);
			// End Kesadaran

			$('#ppigd-fisikvital-tensi').html(kajian_keperawatan.tensi_sistolik+'/'+kajian_keperawatan.tensi_diastolik+' mmHg');
			$('#ppigd-fisikvital-nadi').html(kajian_keperawatan.nadi+' x/mnt');
			
			$('#ppigd-fisikvital-gcs').html('E='+kajian_keperawatan.gcs_e+' M='+kajian_keperawatan.gcs_m+' V='+kajian_keperawatan.gcs_v);			
			$('#ppigd-fisikvital-suhu').html(kajian_keperawatan.suhu+' ℃');			
			$('#ppigd-fisikvital-nafas').html(kajian_keperawatan.nafas+' x/mnt');

		// END -------- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL --------


		// START -------- PSIKOSOSIAL, EKONOMI --------		
			// Start psikologis
				var sp_psi = '';
				var sppsi = JSON.parse(kajian_keperawatan.status_psikologis);
				if (sppsi.cemas === '1')		{ if(sp_psi==='') {sp_psi='Cemas'} 						else {sp_psi=sp_psi+' & Cemas'} }  
				if (sppsi.takut === '1') 		{ if(sp_psi==='') {sp_psi='Takut'} 						else {sp_psi=sp_psi+' & Takut'} }   
				if (sppsi.marah === '1') 		{ if(sp_psi==='') {sp_psi='Marah'}						else {sp_psi=sp_psi+' & Marah'} } 
				if (sppsi.sedih === '1') 		{ if(sp_psi==='') {sp_psi='Sedih'}						else {sp_psi=sp_psi+' & Sedih'} } 
				if (sppsi.bunuh_diri === '1') 	{ if(sp_psi==='') {sp_psi='Kecendrungan Bunuh Diri'}	else {sp_psi=sp_psi+' & Kecendrungan Bunuh Diri'} } 				
				if (sppsi.lain === '1')			{ if(sp_psi==='') {sp_psi=sppsi.ket_lain} 				else {sp_psi=sp_psi+' & Lain-lain: '+sppsi.ket_lain} } 
				$('#ppigd-psikologis-mental-status-psikologis').html(sp_psi);
			// End psikologis

			// Start mental
				var sp_men = '';
				var spmen = JSON.parse(kajian_keperawatan.status_mental);
				if (spmen.sadar === '1')				{ if(sp_men==='') {sp_men='Sadar dan Orientasi Baik'} 							else {sp_men=sp_men+' & Sadar dan Orientasi Baik'} } 			
				if (spmen.ada_masalah === '1')			{ if(sp_men==='') {sp_men=spmen.ket_ada_masalah} 								else {sp_men=sp_men+' & Ada Masalah Perilaku ('+spmen.ket_ada_masalah+')'} } 
				if (spmen.perilaku_kekerasan === '1') 	{ if(sp_men==='') {sp_men='Perilaku Kekerasan yang dialami pasien sebelumnya'}	else {sp_men=sp_men+' & Perilaku Kekerasan yang dialami pasien sebelumnya'} } 	
				$('#ppigd-psikologis-mental-status-mental').html(sp_men);
			// End mental
		// END -------- PSIKOSOSIAL, EKONOMI --------


		// START -------- PENILAIAN RESIKO JATUH --------		
			// Start RESIKO JATUH ANAK

				// Start UMUR
					$('#ppigd-jatuhanak-umur-skor').html(kajian_keperawatan.prja_umur);
						 if(kajian_keperawatan.prja_umur === '4')	{ $('#ppigd-jatuhanak-umur-kriteria').html('Dibawah 3 Tahun	4') }
					else if(kajian_keperawatan.prja_umur === '3')	{ $('#ppigd-jatuhanak-umur-kriteria').html('3 - 7 Tahun	3') }
					else if(kajian_keperawatan.prja_umur === '2')	{ $('#ppigd-jatuhanak-umur-kriteria').html('7 - 13 Tahun 2') }
					else if(kajian_keperawatan.prja_umur === '1')	{ $('#ppigd-jatuhanak-umur-kriteria').html('> 13 Tahun') }
				// End UMUR

				// Start KELAMIN
					$('#ppigd-jatuhanak-kelamin-skor').html(kajian_keperawatan.prja_jenis_kelamin);
						 if(kajian_keperawatan.prja_jenis_kelamin === '2')	{ $('#ppigd-jatuhanak-kelamin-kriteria').html('Laki - Laki') }
					else if(kajian_keperawatan.prja_jenis_kelamin === '1')	{ $('#ppigd-jatuhanak-kelamin-kriteria').html('Perempuan') }
				// End KELAMIN

				// Start DIAGNOSA
					$('#ppigd-jatuhanak-diag-skor').html(kajian_keperawatan.prja_diagnosis);
						 if(kajian_keperawatan.prja_diagnosis === '4')	{ $('#ppigd-jatuhanak-diag-kriteria').html('Kelainan Neurologi') }
					else if(kajian_keperawatan.prja_diagnosis === '3')	{ $('#ppigd-jatuhanak-diag-kriteria').html('Respiratori, Dehidrasi, Anemia, Anoreksia, Syncope') }
					else if(kajian_keperawatan.prja_diagnosis === '2')	{ $('#ppigd-jatuhanak-diag-kriteria').html('Perilaku') }
					else if(kajian_keperawatan.prja_diagnosis === '1')	{ $('#ppigd-jatuhanak-diag-kriteria').html('Lain - lain') }
				// End DIAGNOSA

				// Start Gangguan Kognitif
				$('#ppigd-jatuhanak-ggkog-skor').html(kajian_keperawatan.prja_gangguan_kognitif);
						 if(kajian_keperawatan.prja_gangguan_kognitif === '3')	{ $('#ppigd-jatuhanak-ggkog-kriteria').html('Keterbatasan Daya Pikir') }
					else if(kajian_keperawatan.prja_gangguan_kognitif === '2')	{ $('#ppigd-jatuhanak-ggkog-kriteria').html('Pelupa, berkurangnya orientasi sekitar') }
					else if(kajian_keperawatan.prja_gangguan_kognitif === '1')	{ $('#ppigd-jatuhanak-ggkog-kriteria').html('Dapat menggunakan daya pikir tanpa hambatan') }
				// End Gangguan Kognitif

				// Start Faktor Lingkungan
					$('#ppigd-jatuhanak-fling-skor').html(kajian_keperawatan.prja_faktor_lingkungan);
						 if(kajian_keperawatan.prja_faktor_lingkungan === '4')	{ $('#ppigd-jatuhanak-fling-kriteria').html('Riwayat Jatuh atau Bayi/Balita yang Ditempatkan Ditempat tidur') }
					else if(kajian_keperawatan.prja_faktor_lingkungan === '3')	{ $('#ppigd-jatuhanak-fling-kriteria').html('Pasien Menggunakan Alat Bantu atau Bayi/Balita dalam Ayunan') }
					else if(kajian_keperawatan.prja_faktor_lingkungan === '2')	{ $('#ppigd-jatuhanak-fling-kriteria').html('Pasien di Tempat Tidur Standar') }
					else if(kajian_keperawatan.prja_faktor_lingkungan === '1')	{ $('#ppigd-jatuhanak-fling-kriteria').html('Area Pasien Rawat Jalan') }
				// End Faktor Lingkungan

				// Start Respon Terhadap Pembedahan, Sedasi dan Anastesi
				$('#ppigd-jatuhanak-bedah-skor').html(kajian_keperawatan.prja_respon_pembedahan);
						 if(kajian_keperawatan.prja_respon_pembedahan === '3')	{ $('#ppigd-jatuhanak-bedah-kriteria').html('Dalam 24 Jam') }
					else if(kajian_keperawatan.prja_respon_pembedahan === '2')	{ $('#ppigd-jatuhanak-bedah-kriteria').html('Dalam 48 Jam') }
					else if(kajian_keperawatan.prja_respon_pembedahan === '1')	{ $('#ppigd-jatuhanak-bedah-kriteria').html('Lebih dari 48 Jam / Tidak Ada Respon') }
				// End Respon Terhadap Pembedahan, Sedasi dan Anastesi

				// Start Penggunaan Obat - obatan
				$('#ppigd-jatuhanak-obat-skor').html(kajian_keperawatan.prja_penggunaan_obat);
						 if(kajian_keperawatan.prja_penggunaan_obat === '3')	{ $('#ppigd-jatuhanak-obat-kriteria').html('Penggunaan Bersamaan Sedative Barbiturate, Anti Depresan, Diuretic Narkotik') }
					else if(kajian_keperawatan.prja_penggunaan_obat === '2')	{ $('#ppigd-jatuhanak-obat-kriteria').html('Salah Satu Dari Obat Diatas') }
					else if(kajian_keperawatan.prja_penggunaan_obat === '1')	{ $('#ppigd-jatuhanak-obat-kriteria').html('Obat - obatan lainnya / Tanpa Obat') }
				// End Penggunaan Obat - obatan

				$('#ppigd-jatuhanak-jmlskor').html(kajian_keperawatan.prja_total);

			// End RESIKO JATUH ANAK


			// Start RESIKO JATUH DEWASA

				// Start Riwayat jatuh dalam waktu 3 bulan sebab apapun
					$('#ppigd-jatuhdewasa-riwayatjatuh-skor').html(kajian_keperawatan.prjd_riwayat_jatuh);
						 if(kajian_keperawatan.prjd_riwayat_jatuh === '0')	{ $('#ppigd-jatuhdewasa-riwayatjatuh-nilai').html('Tidak') }
					else if(kajian_keperawatan.prjd_riwayat_jatuh === '25')	{ $('#ppigd-jatuhdewasa-riwayatjatuh-nilai').html('Ya') }
				// End Riwayat jatuh dalam waktu 3 bulan sebab apapun

				// Start Diagnosis Sekunder (≥ Diagnosis Medis)
				$('#ppigd-jatuhdewasa-diagsek-skor').html(kajian_keperawatan.prjd_diagnosis_sekunder);
						 if(kajian_keperawatan.prjd_diagnosis_sekunder === '0')		{ $('#ppigd-jatuhdewasa-diagsek-nilai').html('Tidak') }
					else if(kajian_keperawatan.prjd_diagnosis_sekunder === '15')	{ $('#ppigd-jatuhdewasa-diagsek-nilai').html('Ya') }
				// End Diagnosis Sekunder (≥ Diagnosis Medis)

				// Start Alat Bantu Jalan
					// Tidak Ada / Kursi Roda									
						if(kajian_keperawatan.prjd_alat_bantu_jalan_1 === '0')	{ 
							$('#ppigd-jatuhdewasa-alatbantu-tidak-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-alatbantu-tidak-skor').html(kajian_keperawatan.prjd_alat_bantu_jalan_1);
						}	else { 
							$('#ppigd-jatuhdewasa-alatbantu-tidak-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-alatbantu-tidak-skor').html('-');
						}

					// Kruk / Tongkat / Walker				
						if(kajian_keperawatan.prjd_alat_bantu_jalan_2 === '15')	{ 
							$('#ppigd-jatuhdewasa-alatbantu-kruk-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-alatbantu-kruk-skor').html(kajian_keperawatan.prjd_alat_bantu_jalan_2);
						}	else { 
							$('#ppigd-jatuhdewasa-alatbantu-kruk-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-alatbantu-kruk-skor').html('-');
						}


					// Berpegangan pada benda-benda disekitar / Furniture
						if(kajian_keperawatan.prjd_alat_bantu_jalan_3 === '30')	{ 
							$('#ppigd-jatuhdewasa-alatbantu-pegangan-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-alatbantu-pegangan-skor').html(kajian_keperawatan.prjd_alat_bantu_jalan_3);
						}	else { 
							$('#ppigd-jatuhdewasa-alatbantu-pegangan-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-alatbantu-pegangan-skor').html('-');
						}
				// End Alat Bantu Jalan

				// Start Terpasang Infus / Heparin Lock
				$('#ppigd-jatuhdewasa-infus-skor').html(kajian_keperawatan.prjd_terpasang_infus);
						 if(kajian_keperawatan.prjd_terpasang_infus === '0')	{ $('#ppigd-jatuhdewasa-infus-nilai').html('Tidak') }
					else if(kajian_keperawatan.prjd_terpasang_infus === '20')	{ $('#ppigd-jatuhdewasa-infus-nilai').html('Ya') }
				// End Terpasang Infus / Heparin Lock


				// Start Cara Berjalan atau Berpindah
					// Normal / Bedrest / Imobilisasi							
					if(kajian_keperawatan.prjd_cara_berjalan_1 === '0')	{ 
							$('#ppigd-jatuhdewasa-carajln-normal-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-carajln-normal-skor').html(kajian_keperawatan.prjd_cara_berjalan_1);
						}	else { 
							$('#ppigd-jatuhdewasa-carajln-normal-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-carajln-normal-skor').html('-');
						}

					// Lemah			
						if(kajian_keperawatan.prjd_cara_berjalan_2 === '10')	{ 
							$('#ppigd-jatuhdewasa-carajln-lemah-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-carajln-lemah-skor').html(kajian_keperawatan.prjd_cara_berjalan_2);
						}	else { 
							$('#ppigd-jatuhdewasa-carajln-lemah-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-carajln-lemah-skor').html('-');
						}

					// Terganggu
						if(kajian_keperawatan.prjd_cara_berjalan_3 === '20')	{ 
							$('#ppigd-jatuhdewasa-carajln-terganggu-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-carajln-terganggu-skor').html(kajian_keperawatan.prjd_cara_berjalan_3);
						}	else { 
							$('#ppigd-jatuhdewasa-carajln-terganggu-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-carajln-terganggu-skor').html('-');
						}
				// End Cara Berjalan atau Berpindah

				// Start Mental
					// Sadar Akan Kemampuan Diri Sendiri			
						if(kajian_keperawatan.prjd_status_mental_1 === '0')	{ 
							$('#ppigd-jatuhdewasa-mental-sadar-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-mental-sadar-skor').html(kajian_keperawatan.prjd_status_mental_1);
						}	else { 
							$('#ppigd-jatuhdewasa-mental-sadar-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-mental-sadar-skor').html('-');
						}

					// Sering Lupa akan Keterbatasan Yang dimiliki
						if(kajian_keperawatan.prjd_status_mental_2 === '15')	{ 
							$('#ppigd-jatuhdewasa-mental-lupa-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-mental-lupa-skor').html(kajian_keperawatan.prjd_status_mental_2);
						}	else { 
							$('#ppigd-jatuhdewasa-mental-lupa-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-mental-lupa-skor').html('-');
						}
				// End Cara Berjalan atau Berpindah

				$('#ppigd-jatuhdewasa-jmlskor').html(kajian_keperawatan.prjd_total);
			// End RESIKO JATUH DEWASA

		// END -------- PENILAIAN RESIKO JATUH --------


		// START -------- PENILAIAN RESIKO JATUH LANSIA (Usia > 60 th) --------

			// Riwayat Jatuh
			if (kajian_keperawatan.prjl_riwayat_jatuh === '6')		{ $('#ppigd-resikojatuh-riwayatjatuh1').html('Ya') }  else { $('#ppigd-resikojatuh-riwayatjatuh1').html('Tidak') } 
			if (kajian_keperawatan.prjl_riwayat_jatuh_opt === '6')	{ $('#ppigd-resikojatuh-riwayatjatuh2').html('Ya') }  else { $('#ppigd-resikojatuh-riwayatjatuh2').html('Tidak') } 

			// Status Mental
			if (kajian_keperawatan.prjl_status_mental === '14')			{ $('#ppigd-resikojatuh-mental1').html('Ya') }  else { $('#ppigd-resikojatuh-mental1').html('Tidak') } 
			if (kajian_keperawatan.prjl_status_mental_opt_1 === '14')	{ $('#ppigd-resikojatuh-mental2').html('Ya') }  else { $('#ppigd-resikojatuh-mental2').html('Tidak') } 
			if (kajian_keperawatan.prjl_status_mental_opt_2 === '14')	{ $('#ppigd-resikojatuh-mental3').html('Ya') }  else { $('#ppigd-resikojatuh-mental3').html('Tidak') } 

			// Penglihatan
			if (kajian_keperawatan.prjl_penglihatan === '1')			{ $('#ppigd-resikojatuh-penglihatan1').html('Ya') }  else { $('#ppigd-resikojatuh-penglihatan1').html('Tidak') } 
			if (kajian_keperawatan.prjl_penglihatan_opt_1 === '1')		{ $('#ppigd-resikojatuh-penglihatan2').html('Ya') }  else { $('#ppigd-resikojatuh-penglihatan2').html('Tidak') } 
			if (kajian_keperawatan.prjl_penglihatan_opt_2 === '1')		{ $('#ppigd-resikojatuh-penglihatan3').html('Ya') }  else { $('#ppigd-resikojatuh-penglihatan3').html('Tidak') } 
			
			// Kebiasaan Berkemih
			if (kajian_keperawatan.prjl_berkemih === '2')		{ $('#ppigd-resikojatuh-berkemih').html('Ya') }  else { $('#ppigd-resikojatuh-berkemih').html('Tidak') } 

			// Transfer dari tempat tidur kekurasi dan kembali lagi ketempat tidur
			if (kajian_keperawatan.prjl_transfer === '0')	{ $('#ppigd-resikojatuh-transfer1').html('0. Ya') }  else { $('#ppigd-resikojatuh-transfer1').html('0. Tidak') } 
			if (kajian_keperawatan.prjl_transfer === '1')	{ $('#ppigd-resikojatuh-transfer2').html('1. Ya') }  else { $('#ppigd-resikojatuh-transfer2').html('1. Tidak') } 
			if (kajian_keperawatan.prjl_transfer === '2')	{ $('#ppigd-resikojatuh-transfer3').html('2. Ya') }  else { $('#ppigd-resikojatuh-transfer3').html('2. Tidak') } 
			if (kajian_keperawatan.prjl_transfer === '3')	{ $('#ppigd-resikojatuh-transfer4').html('3. Ya') }  else { $('#ppigd-resikojatuh-transfer4').html('3. Tidak') } 
			
			// Mobilitas
			if (kajian_keperawatan.prjl_mobilitas === '0')	{ $('#ppigd-resikojatuh-mobilitas1').html('0. Ya') }  else { $('#ppigd-resikojatuh-mobilitas1').html('0. Tidak') } 
			if (kajian_keperawatan.prjl_mobilitas === '1')	{ $('#ppigd-resikojatuh-mobilitas2').html('1. Ya') }  else { $('#ppigd-resikojatuh-mobilitas2').html('1. Tidak') } 
			if (kajian_keperawatan.prjl_mobilitas === '2')	{ $('#ppigd-resikojatuh-mobilitas3').html('2. Ya') }  else { $('#ppigd-resikojatuh-mobilitas3').html('2. Tidak') } 
			if (kajian_keperawatan.prjl_mobilitas === '3')	{ $('#ppigd-resikojatuh-mobilitas4').html('3. Ya') }  else { $('#ppigd-resikojatuh-mobilitas4').html('3. Tidak') } 
			
			// Total
			$('#ppigd-resikojatuh-total').html(kajian_keperawatan.prjl_total);

		// END -------- PENILAIAN RESIKO JATUH LANSIA (Usia > 60 th) --------


		// START -------- PENILAIAN TINGKAT NYERI --------

			$('#ppigd-nyeri-sekala').html(kajian_keperawatan.skala_nyeri);
			$('#ppigd-nyeri-frekuensi').html(kajian_keperawatan.frekuensi_nyeri);
			$('#ppigd-nyeri-lama').html(kajian_keperawatan.lama_nyeri);
			$('#ppigd-nyeri-keperawatan').html(kajian_keperawatan.kualitas_nyeri);
			$('#ppigd-nyeri-pemberat').html(kajian_keperawatan.faktor_memperberat_nyeri);
			$('#ppigd-nyeri-pengurang').html(kajian_keperawatan.faktor_mengurangi_nyeri);
						
		// END -------- PENILAIAN TINGKAT NYERI --------

		// START -------- SKALA EARLY WARNING SYSTEM (EWS) --------
			// START Laju Respirasi /Menit 
				let ews_laju1 = '6-8';
				let ews_laju2 = '9-11';
				let ews_laju3 = '12-20';
				let ews_laju4 = '21-24';
				let ews_laju5 = '25-34';
				let ews_laju6 = '≤5 / ≥35';
				$('#ppigd-ews-laju-1').html(ews_laju1);
				$('#ppigd-ews-laju-2').html(ews_laju2); 
				$('#ppigd-ews-laju-3').html(ews_laju3);  
				$('#ppigd-ews-laju-4').html(ews_laju4);  
				$('#ppigd-ews-laju-5').html(ews_laju5); 
				$('#ppigd-ews-laju-6').html(ews_laju6); 
					if (kajian_keperawatan.sew_laju_respirasi === '3_1')	{ $('#ppigd-ews-laju-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju1+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === '1_2')	{ $('#ppigd-ews-laju-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju2+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === '0_3')	{ $('#ppigd-ews-laju-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju3+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === '2_4')	{ $('#ppigd-ews-laju-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju4+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === '3_5')	{ $('#ppigd-ews-laju-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju5+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === 'bk_6')	{ $('#ppigd-ews-laju-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju6+'</b></i>') } ;
			// END Laju Respirasi /Menit 
			
			// START Saturasi O₂ (%
				let ews_saturasi1 = '≤91';
				let ews_saturasi2 = '92-93';
				let ews_saturasi3 = '94-95';
				let ews_saturasi4 = '≥96';
				$('#ppigd-ews-saturasi-1').html(ews_saturasi1);
				$('#ppigd-ews-saturasi-2').html(ews_saturasi2); 
				$('#ppigd-ews-saturasi-3').html(ews_saturasi3);  
				$('#ppigd-ews-saturasi-4').html(ews_saturasi4);  
					 if (kajian_keperawatan.sew_saturasi === '3_1')	{ $('#ppigd-ews-saturasi-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_saturasi1+'</b></i>') }
				else if (kajian_keperawatan.sew_saturasi === '2_2')	{ $('#ppigd-ews-saturasi-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_saturasi2+'</b></i>') } 	 
				else if (kajian_keperawatan.sew_saturasi === '1_3')	{ $('#ppigd-ews-saturasi-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_saturasi3+'</b></i>') }	 
				else if (kajian_keperawatan.sew_saturasi === '0_4')	{ $('#ppigd-ews-saturasi-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_saturasi4+'</b></i>') };				
			// END Saturasi O₂ (%


			// START Suplemen O₂ (%)
				$('#ppigd-ews-suplemen-1').html('Ya');
				$('#ppigd-ews-suplemen-2').html('Tidak'); 
					 if (kajian_keperawatan.sew_suplemen === '2_1')	{ $('#ppigd-ews-suplemen-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  Ya</b></i>') }	 
				else if (kajian_keperawatan.sew_suplemen === '0_2')	{ $('#ppigd-ews-suplemen-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  Tidak</b></i>') } ;
			// END Suplemen O₂ (%)

			// START Temperatur (°C)
				let ews_temperatur1 = '≤35';
				let ews_temperatur2 = '35.1-36';
				let ews_temperatur3 = '36.1-38';
				let ews_temperatur4 = '38.1-39';
				let ews_temperatur5 = '≥39';
				$('#ppigd-ews-temperatur-1').html(ews_temperatur1);
				$('#ppigd-ews-temperatur-2').html(ews_temperatur2); 
				$('#ppigd-ews-temperatur-3').html(ews_temperatur3);  
				$('#ppigd-ews-temperatur-4').html(ews_temperatur4);  
				$('#ppigd-ews-temperatur-5').html(ews_temperatur5);
					 if (kajian_keperawatan.sew_temperatur === '3_1')	{ $('#ppigd-ews-temperatur-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur1+'</b></i>') }
				else if (kajian_keperawatan.sew_temperatur === '1_2')	{ $('#ppigd-ews-temperatur-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur2+'</b></i>') } 	 
				else if (kajian_keperawatan.sew_temperatur === '0_3')	{ $('#ppigd-ews-temperatur-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur3+'</b></i>') }	 
				else if (kajian_keperawatan.sew_temperatur === '1_4')	{ $('#ppigd-ews-temperatur-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur4+'</b></i>') }
				else if (kajian_keperawatan.sew_temperatur === '2_5')	{ $('#ppigd-ews-temperatur-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur5+'</b></i>') };				
			// END Temperatur (°C)

			// STAR TDS (mmHg)
				let ews_tds1 = '71-90';
				let ews_tds2 = '91-100';
				let ews_tds3 = '101-110';
				let ews_tds4 = '111-180';
				let ews_tds5 = '181-220';
				let ews_tds6 = '≥221';
				let ews_tds7 = '≤70';
				$('#ppigd-ews-tds-1').html(ews_tds1);
				$('#ppigd-ews-tds-2').html(ews_tds2); 
				$('#ppigd-ews-tds-3').html(ews_tds3);  
				$('#ppigd-ews-tds-4').html(ews_tds4);  
				$('#ppigd-ews-tds-5').html(ews_tds5);  
				$('#ppigd-ews-tds-6').html(ews_tds6);  
				$('#ppigd-ews-tds-7').html(ews_tds7);  
					 if (kajian_keperawatan.sew_tds === '3_1')	{ $('#ppigd-ews-tds-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds1+'</b></i>') }
				else if (kajian_keperawatan.sew_tds === '2_2')	{ $('#ppigd-ews-tds-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds2+'</b></i>') } 	 
				else if (kajian_keperawatan.sew_tds === '1_3')	{ $('#ppigd-ews-tds-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds3+'</b></i>') }	 
				else if (kajian_keperawatan.sew_tds === '0_4')	{ $('#ppigd-ews-tds-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds4+'</b></i>') }
				else if (kajian_keperawatan.sew_tds === '1_5')	{ $('#ppigd-ews-tds-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds5+'</b></i>') }	 
				else if (kajian_keperawatan.sew_tds === '3_6')	{ $('#ppigd-ews-tds-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds6+'</b></i>') }
				else if (kajian_keperawatan.sew_tds === 'bk_7')	{ $('#ppigd-ews-tds-7').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds7+'</b></i>') };				
			// END TDS (mmHg)

			// STAR Laju Jantung /Menit
				let ews_jantung1 = '41-50';
				let ews_jantung2 = '51-90';
				let ews_jantung3 = '91-110';
				let ews_jantung4 = '111-130';
				let ews_jantung5 = '131-140';
				let ews_jantung6 = '≤40 / ≥140';
				$('#ppigd-ews-jantung-1').html(ews_jantung1);
				$('#ppigd-ews-jantung-2').html(ews_jantung2);
				$('#ppigd-ews-jantung-3').html(ews_jantung3);
				$('#ppigd-ews-jantung-4').html(ews_jantung4);
				$('#ppigd-ews-jantung-5').html(ews_jantung5);
				$('#ppigd-ews-jantung-6').html(ews_jantung6);
					 if (kajian_keperawatan.sew_laju_jantung === '1_2') { $('#ppigd-ews-jantung-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung1+'</b></i>') }
				else if (kajian_keperawatan.sew_laju_jantung === '0_2') { $('#ppigd-ews-jantung-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung2+'</b></i>') }
				else if (kajian_keperawatan.sew_laju_jantung === '1_3') { $('#ppigd-ews-jantung-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung3+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_jantung === '2_4') { $('#ppigd-ews-jantung-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung4+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_jantung === '3_5') { $('#ppigd-ews-jantung-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung5+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_jantung === 'bk_8'){ $('#ppigd-ews-jantung-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung6+'</b></i>') } ;			
			// END Laju Jantung /Menit

			// STAR Kesadaran
				let ews_kesadaran1 = 'A';
				let ews_kesadaran2 = 'V & P';
				let ews_kesadaran3 = 'U';
				$('#ppigd-ews-kesadaran-1').html(ews_kesadaran1);
				$('#ppigd-ews-kesadaran-2').html(ews_kesadaran2);
				$('#ppigd-ews-kesadaran-3').html(ews_kesadaran3);
					 if (kajian_keperawatan.sew_kesadaran === '0_1')  { $('#ppigd-ews-kesadaran-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_kesadaran1+'</b></i>') }
				else if (kajian_keperawatan.sew_kesadaran === '3_2')  { $('#ppigd-ews-kesadaran-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_kesadaran2+'</b></i>') }
				else if (kajian_keperawatan.sew_kesadaran === 'bk_9') { $('#ppigd-ews-kesadaran-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_kesadaran3+'</b></i>') };
			// END Kesadaran

			// STAR Total
				let ews_total1 = '<i class="fas fa-fw fa-square" style="color: white"></i><b>Putih (0)</b>';
				let ews_total2 = '<i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>';
				let ews_total3 = '<i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (5-6)</b>';
				let ews_total4 = '<i class="fas fa-fw fa-square" style="color: red"></i><b>Merah (≥7/1 Parameter Blue Kriteria)</b>';
				$('#ppigd-ews-total-1').html(ews_total1);
				$('#ppigd-ews-total-2').html(ews_total2);
				$('#ppigd-ews-total-3').html(ews_total3);
				$('#ppigd-ews-total-4').html(ews_total4);
					 if (kajian_keperawatan.sew_total === 'Putih')  { $('#ppigd-ews-total-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_total1+'</b></i>') }
				else if (kajian_keperawatan.sew_total === 'Hijau')  { $('#ppigd-ews-total-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_total2+'</b></i>') }
				else if (kajian_keperawatan.sew_total === 'Kuning') { $('#ppigd-ews-total-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_total3+'</b></i>') }
				else if (kajian_keperawatan.sew_total === 'Merah')  { $('#ppigd-ews-total-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_total4+'</b></i>') };
			// END  Total
		// END -------- SKALA EARLY WARNING SYSTEM (EWS) --------

		// STAR -------- SKALA EARLY WARNING SYSTEM (EWS) PEWS --------

			// STAR Suhu
				let pews_suhu1 = '< 35';
				let pews_suhu2 = '35.1-36';
				let pews_suhu3 = '36.1-38';
				let pews_suhu4 = '38.1-38.5';
				let pews_suhu5 = '> 38.5';
				$('#ppigd-pews-suhu-1').html(pews_suhu1);
				$('#ppigd-pews-suhu-2').html(pews_suhu2);
				$('#ppigd-pews-suhu-3').html(pews_suhu3);
				$('#ppigd-pews-suhu-4').html(pews_suhu4);
				$('#ppigd-pews-suhu-5').html(pews_suhu5);
					 if (kajian_keperawatan.pews_suhu === '2_1') { $('#ppigd-pews-suhu-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu1+'</b></i>') }
				else if (kajian_keperawatan.pews_suhu === '1_2') { $('#ppigd-pews-suhu-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu2+'</b></i>') }
				else if (kajian_keperawatan.pews_suhu === '0_3') { $('#ppigd-pews-suhu-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu3+'</b></i>') }
				else if (kajian_keperawatan.pews_suhu === '1_4') { $('#ppigd-pews-suhu-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu4+'</b></i>') }
				else if (kajian_keperawatan.pews_suhu === '2_5') { $('#ppigd-pews-suhu-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu5+'</b></i>') } ;
			// END  Suhu

			// STAR Pernafasan
				// Pernafasan < 28 Hari (A)
					let pews_pernafasan1a = '< 20';
					let pews_pernafasan2a = '30-39';
					let pews_pernafasan3a = '40-60';
					let pews_pernafasan4a = '> 60';
					$('#ppigd-pews-pernafasan-1a').html(pews_pernafasan1a);
					$('#ppigd-pews-pernafasan-2a').html(pews_pernafasan2a);
					$('#ppigd-pews-pernafasan-3a').html(pews_pernafasan3a);
					$('#ppigd-pews-pernafasan-4a').html(pews_pernafasan4a);
						 if (kajian_keperawatan.pews_pernafasan === '3_1') { $('#ppigd-pews-pernafasan-1a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1a+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_2') { $('#ppigd-pews-pernafasan-2a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2a+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_3') { $('#ppigd-pews-pernafasan-3a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3a+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_4') { $('#ppigd-pews-pernafasan-4a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4a+'</b></i>') };

				// Pernafasan 1-12 Bulan (B)
					let pews_pernafasan1b = '≤ 20';
					let pews_pernafasan2b = '20-29';
					let pews_pernafasan3b = '30-40';
					let pews_pernafasan4b = '41-50';
					let pews_pernafasan5b = '51-60';
					let pews_pernafasan6b = '≥ 60';
					$('#ppigd-pews-pernafasan-1b').html(pews_pernafasan1b);
					$('#ppigd-pews-pernafasan-2b').html(pews_pernafasan2b);
					$('#ppigd-pews-pernafasan-3b').html(pews_pernafasan3b);
					$('#ppigd-pews-pernafasan-4b').html(pews_pernafasan4b);
					$('#ppigd-pews-pernafasan-5b').html(pews_pernafasan5b);
					$('#ppigd-pews-pernafasan-6b').html(pews_pernafasan6b);
						 if (kajian_keperawatan.pews_pernafasan === '3_5') { $('#ppigd-pews-pernafasan-1b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_6') { $('#ppigd-pews-pernafasan-2b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_7') { $('#ppigd-pews-pernafasan-3b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_8') { $('#ppigd-pews-pernafasan-4b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_9') { $('#ppigd-pews-pernafasan-5b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_10') { $('#ppigd-pews-pernafasan-6b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan6b+'</b></i>') };

				// Pernafasan 13-36 Bulan (C)
					let pews_pernafasan1c = '< 20<';
					let pews_pernafasan2c = '20-30';
					let pews_pernafasan3c = '31-50';
					let pews_pernafasan4c = '51-60';
					let pews_pernafasan5c = '> 60<';
					$('#ppigd-pews-pernafasan-1c').html(pews_pernafasan1c);
					$('#ppigd-pews-pernafasan-2c').html(pews_pernafasan2c);
					$('#ppigd-pews-pernafasan-3c').html(pews_pernafasan3c);
					$('#ppigd-pews-pernafasan-4c').html(pews_pernafasan4c);
					$('#ppigd-pews-pernafasan-5c').html(pews_pernafasan5c);
						 if (kajian_keperawatan.pews_pernafasan === '3_11') { $('#ppigd-pews-pernafasan-1c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1c+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_12') { $('#ppigd-pews-pernafasan-2c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2c+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_13') { $('#ppigd-pews-pernafasan-3c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3c+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_14') { $('#ppigd-pews-pernafasan-4c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4c+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_15') { $('#ppigd-pews-pernafasan-5c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5c+'</b></i>') };

				// Pernafasan 4-6 Tahun (D)
					let pews_pernafasan1d = '< 20';
					let pews_pernafasan2d = '20-30';
					let pews_pernafasan3d = '31-50';
					let pews_pernafasan4d = '51-60';
					let pews_pernafasan5d = '> 60';
					$('#ppigd-pews-pernafasan-1d').html(pews_pernafasan1d);
					$('#ppigd-pews-pernafasan-2d').html(pews_pernafasan2d);
					$('#ppigd-pews-pernafasan-3d').html(pews_pernafasan3d);
					$('#ppigd-pews-pernafasan-4d').html(pews_pernafasan4d);
					$('#ppigd-pews-pernafasan-5d').html(pews_pernafasan5d);
						 if (kajian_keperawatan.pews_pernafasan === '3_16') { $('#ppigd-pews-pernafasan-1d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1d+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_17') { $('#ppigd-pews-pernafasan-2d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2d+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_18') { $('#ppigd-pews-pernafasan-3d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3d+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_19') { $('#ppigd-pews-pernafasan-4d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4d+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_20') { $('#ppigd-pews-pernafasan-5d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5d+'</b></i>') };

				// Pernafasan 7-12 Tahun (E)
					let pews_pernafasan1e = '< 10';
					let pews_pernafasan2e = '10-20';
					let pews_pernafasan3e = '21-30';
					let pews_pernafasan4e = '31-40';
					let pews_pernafasan5e = '> 40';
					$('#ppigd-pews-pernafasan-1e').html(pews_pernafasan1e);
					$('#ppigd-pews-pernafasan-2e').html(pews_pernafasan2e);
					$('#ppigd-pews-pernafasan-3e').html(pews_pernafasan3e);
					$('#ppigd-pews-pernafasan-4e').html(pews_pernafasan4e);
					$('#ppigd-pews-pernafasan-5e').html(pews_pernafasan5e);
						 if (kajian_keperawatan.pews_pernafasan === '3_21') { $('#ppigd-pews-pernafasan-1e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1e+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_22') { $('#ppigd-pews-pernafasan-2e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2e+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_23') { $('#ppigd-pews-pernafasan-3e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3e+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_24') { $('#ppigd-pews-pernafasan-4e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4e+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_25') { $('#ppigd-pews-pernafasan-5e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5e+'</b></i>') };


				// Pernafasan 13-18 Tahun (F)
					let pews_pernafasan1f = '< 10';
					let pews_pernafasan2f = '10-20';
					let pews_pernafasan3f = '21-30';
					let pews_pernafasan4f = '31-40';
					let pews_pernafasan5f = '> 40';
					$('#ppigd-pews-pernafasan-1f').html(pews_pernafasan1f);
					$('#ppigd-pews-pernafasan-2f').html(pews_pernafasan2f);
					$('#ppigd-pews-pernafasan-3f').html(pews_pernafasan3f);
					$('#ppigd-pews-pernafasan-4f').html(pews_pernafasan4f);
					$('#ppigd-pews-pernafasan-5f').html(pews_pernafasan5f);
						 if (kajian_keperawatan.pews_pernafasan === '3_26') { $('#ppigd-pews-pernafasan-1f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1f+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_27') { $('#ppigd-pews-pernafasan-2f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2f+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_28') { $('#ppigd-pews-pernafasan-3f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3f+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_29') { $('#ppigd-pews-pernafasan-4f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4f+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_30') { $('#ppigd-pews-pernafasan-5f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5f+'</b></i>') };

				// Pernafasan SUB
					let pews_subpernafasan1 = 'Tidak Retraksi';
					let pews_subpernafasan2 = 'Otot Bantu Nafas';
					let pews_subpernafasan3 = 'Retraksi';
					let pews_subpernafasan4 = 'Merintih';
					$('#ppigd-pews-subpernafasan-1').html(pews_subpernafasan1);
					$('#ppigd-pews-subpernafasan-2').html(pews_subpernafasan2);
					$('#ppigd-pews-subpernafasan-3').html(pews_subpernafasan3);
					$('#ppigd-pews-subpernafasan-4').html(pews_subpernafasan4);
						 if (kajian_keperawatan.pews_subpernafasan === '0_1') { $('#ppigd-pews-subpernafasan-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_subpernafasan1+'</b></i>') }
					else if (kajian_keperawatan.pews_subpernafasan === '1_2') { $('#ppigd-pews-subpernafasan-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_subpernafasan2+'</b></i>') }
					else if (kajian_keperawatan.pews_subpernafasan === '2_3') { $('#ppigd-pews-subpernafasan-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_subpernafasan3+'</b></i>') }
					else if (kajian_keperawatan.pews_subpernafasan === '3_4') { $('#ppigd-pews-subpernafasan-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_subpernafasan4+'</b></i>') };

			// END Pernafasan

			// START Alat Bantu O₂
				let pews_alat_bantu1 = 'No';
				let pews_alat_bantu2 = '> 3L /Menit';
				let pews_alat_bantu3 = '> 6L /Menit';
				let pews_alat_bantu4 = '> 8L /Menit';
				$('#ppigd-pews-alat_bantu-1').html(pews_alat_bantu1);
				$('#ppigd-pews-alat_bantu-2').html(pews_alat_bantu2);
				$('#ppigd-pews-alat_bantu-3').html(pews_alat_bantu3);
				$('#ppigd-pews-alat_bantu-4').html(pews_alat_bantu4);
					 if (kajian_keperawatan.pews_alat_bantu === '0_1') { $('#ppigd-pews-alat_bantu-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_alat_bantu1+'</b></i>') }
				else if (kajian_keperawatan.pews_alat_bantu === '1_2') { $('#ppigd-pews-alat_bantu-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_alat_bantu2+'</b></i>') }
				else if (kajian_keperawatan.pews_alat_bantu === '2_3') { $('#ppigd-pews-alat_bantu-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_alat_bantu3+'</b></i>') }
				else if (kajian_keperawatan.pews_alat_bantu === '3_4') { $('#ppigd-pews-alat_bantu-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_alat_bantu4+'</b></i>') };
			// END Alat Bantu O₂
			
			// START Saturasi O₂
				let pews_saturasi1 = '≤ 85';
				let pews_saturasi2 = '86-89';
				let pews_saturasi3 = '90-93';
				let pews_saturasi4 = '≥ 94';
				$('#ppigd-pews-saturasi-1').html(pews_saturasi1);
				$('#ppigd-pews-saturasi-2').html(pews_saturasi2);
				$('#ppigd-pews-saturasi-3').html(pews_saturasi3);
				$('#ppigd-pews-saturasi-4').html(pews_saturasi4);
					 if (kajian_keperawatan.pews_saturasi === '3_1') { $('#ppigd-pews-saturasi-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_saturasi1+'</b></i>') }
				else if (kajian_keperawatan.pews_saturasi === '2_2') { $('#ppigd-pews-saturasi-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_saturasi2+'</b></i>') }
				else if (kajian_keperawatan.pews_saturasi === '1_3') { $('#ppigd-pews-saturasi-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_saturasi3+'</b></i>') }
				else if (kajian_keperawatan.pews_saturasi === '0_4') { $('#ppigd-pews-saturasi-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_saturasi4+'</b></i>') };
			// END Saturasi O₂

			// START Nadi 
				//Nadi < 28 Hari (A)
					let pews_nadi1a = '< 80';
					let pews_nadi2a = '81-90';
					let pews_nadi3a = '91-99';
					let pews_nadi4a = '100-180';
					let pews_nadi5a = '181-190';
					let pews_nadi6a = '≥ 200';
					$('#ppigd-pews-nadi-1a').html(pews_nadi1a);
					$('#ppigd-pews-nadi-2a').html(pews_nadi2a);
					$('#ppigd-pews-nadi-3a').html(pews_nadi3a);
					$('#ppigd-pews-nadi-4a').html(pews_nadi4a);
					$('#ppigd-pews-nadi-5a').html(pews_nadi5a);
					$('#ppigd-pews-nadi-6a').html(pews_nadi6a);
						 if (kajian_keperawatan.pews_nadi === '3_1') { $('#ppigd-pews-nadi-1a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_2') { $('#ppigd-pews-nadi-2a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_3') { $('#ppigd-pews-nadi-3a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_4') { $('#ppigd-pews-nadi-4a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_5') { $('#ppigd-pews-nadi-5a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_6') { $('#ppigd-pews-nadi-6a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6a+'</b></i>') };

				//Nadi 1-12 Bulan (B)
					let pews_nadi1b = '< 90';
					let pews_nadi2b = '90-99';
					let pews_nadi3b = '100-109';
					let pews_nadi4b = '110-160';
					let pews_nadi5b = '161-170';
					let pews_nadi6b = '171-190';
					let pews_nadi7b = '≥ 190';
					$('#ppigd-pews-nadi-1b').html(pews_nadi1b);
					$('#ppigd-pews-nadi-2b').html(pews_nadi2b);
					$('#ppigd-pews-nadi-3b').html(pews_nadi3b);
					$('#ppigd-pews-nadi-4b').html(pews_nadi4b);
					$('#ppigd-pews-nadi-5b').html(pews_nadi5b);
					$('#ppigd-pews-nadi-6b').html(pews_nadi6b);
					$('#ppigd-pews-nadi-7b').html(pews_nadi7b);
						 if (kajian_keperawatan.pews_nadi === '3_7') { $('#ppigd-pews-nadi-1b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_8') { $('#ppigd-pews-nadi-2b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_9') { $('#ppigd-pews-nadi-3b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_10') { $('#ppigd-pews-nadi-4b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_11') { $('#ppigd-pews-nadi-5b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_12') { $('#ppigd-pews-nadi-6b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_13') { $('#ppigd-pews-nadi-7b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7b+'</b></i>') };

				//Nadi 13-36 Bulan (C)
					let pews_nadi1c = '≤ 70';
					let pews_nadi2c = '70-79';
					let pews_nadi3c = '80-89';
					let pews_nadi4c = '90-140';
					let pews_nadi5c = '141-160';
					let pews_nadi6c = '161-170';
					let pews_nadi7c = '> 170';
					$('#ppigd-pews-nadi-1c').html(pews_nadi1c);
					$('#ppigd-pews-nadi-2c').html(pews_nadi2c);
					$('#ppigd-pews-nadi-3c').html(pews_nadi3c);
					$('#ppigd-pews-nadi-4c').html(pews_nadi4c);
					$('#ppigd-pews-nadi-5c').html(pews_nadi5c);
					$('#ppigd-pews-nadi-6c').html(pews_nadi6c);
					$('#ppigd-pews-nadi-7c').html(pews_nadi7c);
						 if (kajian_keperawatan.pews_nadi === '3_14') { $('#ppigd-pews-nadi-1c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_15') { $('#ppigd-pews-nadi-2c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_16') { $('#ppigd-pews-nadi-3c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_17') { $('#ppigd-pews-nadi-4c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_18') { $('#ppigd-pews-nadi-5c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_19') { $('#ppigd-pews-nadi-6c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_20') { $('#ppigd-pews-nadi-7c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7c+'</b></i>') };

				//Nadi 4-6 Tahun (D)
					let pews_nadi1d = '< 60';
					let pews_nadi2d = '70-79';
					let pews_nadi3d = '80-89';
					let pews_nadi4d = '80-120';
					let pews_nadi5d = '121-140';
					let pews_nadi6d = '141-160';
					let pews_nadi7d = '> 160';
					$('#ppigd-pews-nadi-1d').html(pews_nadi1d);
					$('#ppigd-pews-nadi-2d').html(pews_nadi2d);
					$('#ppigd-pews-nadi-3d').html(pews_nadi3d);
					$('#ppigd-pews-nadi-4d').html(pews_nadi4d);
					$('#ppigd-pews-nadi-5d').html(pews_nadi5d);
					$('#ppigd-pews-nadi-6d').html(pews_nadi6d);
					$('#ppigd-pews-nadi-7d').html(pews_nadi7d);
						 if (kajian_keperawatan.pews_nadi === '3_21') { $('#ppigd-pews-nadi-1d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_22') { $('#ppigd-pews-nadi-2d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_23') { $('#ppigd-pews-nadi-3d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_24') { $('#ppigd-pews-nadi-4d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_25') { $('#ppigd-pews-nadi-5d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_26') { $('#ppigd-pews-nadi-6d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_27') { $('#ppigd-pews-nadi-7d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7d+'</b></i>') };

				//Nadi 7-12 Tahun (E)
					let pews_nadi1e = '< 60';
					let pews_nadi2e = '60-69';
					let pews_nadi3e = '70-79';
					let pews_nadi4e = '55-100';
					let pews_nadi5e = '101-120';
					let pews_nadi6e = '121-140';
					let pews_nadi7e = '> 140';
					$('#ppigd-pews-nadi-1e').html(pews_nadi1e);
					$('#ppigd-pews-nadi-2e').html(pews_nadi2e);
					$('#ppigd-pews-nadi-3e').html(pews_nadi3e);
					$('#ppigd-pews-nadi-4e').html(pews_nadi4e);
					$('#ppigd-pews-nadi-5e').html(pews_nadi5e);
					$('#ppigd-pews-nadi-6e').html(pews_nadi6e);
					$('#ppigd-pews-nadi-7e').html(pews_nadi7e);
						 if (kajian_keperawatan.pews_nadi === '3_28') { $('#ppigd-pews-nadi-1e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_29') { $('#ppigd-pews-nadi-2e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_30') { $('#ppigd-pews-nadi-3e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_31') { $('#ppigd-pews-nadi-4e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_32') { $('#ppigd-pews-nadi-5e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_33') { $('#ppigd-pews-nadi-6e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_34') { $('#ppigd-pews-nadi-7e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7e+'</b></i>') };

				//Nadi 13-18 Tahun (F)
					let pews_nadi1f = '< 60';
					let pews_nadi2f = '60-69';
					let pews_nadi3f = '70-79';
					let pews_nadi4f = '55-100';
					let pews_nadi5f = '101-120';
					let pews_nadi6f = '121-140';
					let pews_nadi7f = '> 140';
					$('#ppigd-pews-nadi-1f').html(pews_nadi1f);
					$('#ppigd-pews-nadi-2f').html(pews_nadi2f);
					$('#ppigd-pews-nadi-3f').html(pews_nadi3f);
					$('#ppigd-pews-nadi-4f').html(pews_nadi4f);
					$('#ppigd-pews-nadi-5f').html(pews_nadi5f);
					$('#ppigd-pews-nadi-6f').html(pews_nadi6f);
					$('#ppigd-pews-nadi-7f').html(pews_nadi7f);
						 if (kajian_keperawatan.pews_nadi === '3_35') { $('#ppigd-pews-nadi-1f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_36') { $('#ppigd-pews-nadi-2f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_37') { $('#ppigd-pews-nadi-3f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_38') { $('#ppigd-pews-nadi-4f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_39') { $('#ppigd-pews-nadi-5f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_40') { $('#ppigd-pews-nadi-6f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_41') { $('#ppigd-pews-nadi-7f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7f+'</b></i>') };
			// END Nadi

			// START Warna Kulit
				let pews_kulit1 = 'Tidak Sianosis /CRT < 2 S';
				let pews_kulit2 = 'Tampak Sianotik /CRT > 2 S';
				let pews_kulit3 = 'Sianotik dan Motled /CRT > 5 S';
				$('#ppigd-pews-kulit-1').html(pews_kulit1);
				$('#ppigd-pews-kulit-2').html(pews_kulit2);
				$('#ppigd-pews-kulit-3').html(pews_kulit3);
					 if (kajian_keperawatan.pews_warna_kulit === '0_1') { $('#ppigd-pews-kulit-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kulit1+'</b></i>') }
				else if (kajian_keperawatan.pews_warna_kulit === '2_2') { $('#ppigd-pews-kulit-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kulit2+'</b></i>') }
				else if (kajian_keperawatan.pews_warna_kulit === '3_3') { $('#ppigd-pews-kulit-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kulit3+'</b></i>') };			
			// END Warna Kulit

			// START TDS
				let pews_tds1 = '≤ 80';
				let pews_tds2 = '80-89';
				let pews_tds3 = '90-119';
				let pews_tds4 = '120-129';
				let pews_tds5 = '130-139';
				let pews_tds6 = '> 140';
				$('#ppigd-pews-tds-1').html(pews_tds1);
				$('#ppigd-pews-tds-2').html(pews_tds2);
				$('#ppigd-pews-tds-3').html(pews_tds3);
				$('#ppigd-pews-tds-4').html(pews_tds4);
				$('#ppigd-pews-tds-5').html(pews_tds5);
				$('#ppigd-pews-tds-6').html(pews_tds6);
					if (kajian_keperawatan.pews_tds === '3_1') { $('#ppigd-pews-tds-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds1+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '1_2') { $('#ppigd-pews-tds-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds2+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '0_3') { $('#ppigd-pews-tds-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds3+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '1_4') { $('#ppigd-pews-tds-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds4+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '2_5') { $('#ppigd-pews-tds-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds5+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '3_6') { $('#ppigd-pews-tds-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds6+'</b></i>') };
			// END TDS

			// START  Kesadaran
				let pews_kesadaran1 = 'P/U';
				let pews_kesadaran2 = 'V';
				let pews_kesadaran3 = 'A';
				let pews_kesadaran4 = 'V';
				let pews_kesadaran5 = 'P/U';
				$('#ppigd-pews-kesadaran-1').html(pews_kesadaran1);
				$('#ppigd-pews-kesadaran-2').html(pews_kesadaran2);
				$('#ppigd-pews-kesadaran-3').html(pews_kesadaran3);
				$('#ppigd-pews-kesadaran-4').html(pews_kesadaran4);
				$('#ppigd-pews-kesadaran-5').html(pews_kesadaran5);
					 if (kajian_keperawatan.pews_kesadaran === '3_1') { $('#ppigd-pews-kesadaran-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran1+'</b></i>') }
				else if (kajian_keperawatan.pews_kesadaran === '1_2') { $('#ppigd-pews-kesadaran-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran2+'</b></i>') }
				else if (kajian_keperawatan.pews_kesadaran === '0_3') { $('#ppigd-pews-kesadaran-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran3+'</b></i>') }
				else if (kajian_keperawatan.pews_kesadaran === '1_4') { $('#ppigd-pews-kesadaran-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran4+'</b></i>') }
				else if (kajian_keperawatan.pews_kesadaran === '3_5') { $('#ppigd-pews-kesadaran-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran5+'</b></i>') };
			// END Kesadaran

			// START TOTAL
				let pews_total1 = '<i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (0-2)</b>';
				let pews_total2 = '<i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (3-4)</b>';
				let pews_total3 = '<i class="fas fa-fw fa-square" style="color: red"></i><b>Merah (≥5/3 Pada salah satu parameter)</b>';
				$('#ppigd-pews-total-1').html(pews_total1);
				$('#ppigd-pews-total-2').html(pews_total2);
				$('#ppigd-pews-total-3').html(pews_total3);
					 if (kajian_keperawatan.pews_total === 'Hijau')  { $('#ppigd-pews-total-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_total1+'</b></i>') }
				else if (kajian_keperawatan.pews_total === 'Kuning') { $('#ppigd-pews-total-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_total2+'</b></i>') }
				else if (kajian_keperawatan.pews_total === 'Merah')  { $('#ppigd-pews-total-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_total3+'</b></i>') };
			// END TOTAL
		// END -------- SKALA EARLY WARNING SYSTEM (EWS) PEWS --------


		// START -------- PENGKAJIAN SPIRITUAL --------
			$('#ppigd-spiritual-kegiatan').html(kajian_keperawatan.kegiatan_keagamaan);
			// wajib ibadah
					if(kajian_keperawatan.wajib_ibadah === 'Baligh')		{ $('#ppigd-spiritual-ibadah').html('Baligh') }
				else if(kajian_keperawatan.wajib_ibadah === 'Belum Baligh')	{ $('#ppigd-spiritual-ibadah').html('Belum Baligh') }
				else if(kajian_keperawatan.wajib_ibadah === 'Halangan')		{ $('#ppigd-spiritual-ibadah').html('Halangan Lain : '+kajian_keperawatan.ket_halangan) };
			// Thaharoh
					 if(kajian_keperawatan.thaharoh === 'Berwudhu')		{ $('#ppigd-spiritual-thaharoh').html('Berwudhu') }
				else if(kajian_keperawatan.thaharoh === 'Tayamum')		{ $('#ppigd-spiritual-thaharoh').html('Tayamum') };
			// Sholat
					 if(kajian_keperawatan.sholat === 'Berdiri')		{ $('#ppigd-spiritual-sholat').html('Berdiri') }
				else if(kajian_keperawatan.sholat === 'Duduk')			{ $('#ppigd-spiritual-sholat').html('Duduk') }
				else if(kajian_keperawatan.sholat === 'Berbaring')		{ $('#ppigd-spiritual-sholat').html('Berbaring') };		
		// END -------- PENGKAJIAN SPIRITUAL --------


		// START -------- STATUS NUTRISI DAN STATUS FUNGSIONAL --------
			// Adakah Penurunan Berat Badan
				var pnbb = JSON.parse(kajian_keperawatan.status_nutrisi);
				if (pnbb.penurunan_bb === '0')		{ $('#ppigd-nutrisi-penurunanbb').html('Tidak'); } 
				if (pnbb.penurunan_bb === '1')		{ $('#ppigd-nutrisi-penurunanbb').html('Ya '+pnbb.ket_penurunan_bb+' Kg'); } 

			//STATUS FUNGSIONAL
				var st_fung = '';
				var fungsional = JSON.parse(kajian_keperawatan.status_fungsional);
				if (fungsional.mandiri === '1')				{ if(st_fung==='') {st_fung='Mandiri'} 					else {st_fung=st_fung+' & Mandiri '} } 			
				if (fungsional.perlu_bantuan === '1') 		{ if(st_fung==='') {st_fung='Perlu Bantuan'}			else {st_fung=st_fung+' & Perlu Bantuan'} } 
				if (fungsional.ketergantungan === '1')		{ if(st_fung==='') {st_fung='Ketergantungan total, dilaporkan ke dokter pukul '+fungsional.ket_ketergantungan} 	else {st_fung=st_fung+' & Ketergantungan total, dilaporkan ke dokter pukul '+fungsional.ket_ketergantungan} } 	
				$('#ppigd-nutrisi-fungsional').html(st_fung);
				
		// END -------- STATUS NUTRISI DAN STATUS FUNGSIONAL --------

	
		// START -------- MASALAH KEPERAWATAN --------
			let keperawatan_1 = 'Bersihan Jalan Nafas Tidak Efektif';
			let keperawatan_2 = 'Diare';
			let keperawatan_3 = 'Ansietas';
			let keperawatan_4 = 'Pola Nafas Tidak Efektif';
			let keperawatan_5 = 'Intoleransi Aktivitas';
			let keperawatan_6 = 'Berduka';
			let keperawatan_7 = 'Gangguan Pertukaran Gas';
			let keperawatan_8 = 'Gangguan Mobilitas Fisik';
			let keperawatan_9 = 'Gangguan Interaksi Sosial';
			let keperawatan_10 = 'Gangguan Ventilasi Spontan';
			let keperawatan_11 = 'Penurunan Kapasitas Adaptif Intrakranial';
			let keperawatan_12 = 'Risiko Cedera';
			let keperawatan_13 = 'Penurunan Curah Jantung';
			let keperawatan_14 = 'Nyeri Akut';
			let keperawatan_15 = 'Risiko Aspirasi';
			let keperawatan_16 = 'Perfusi Perifer Tidak Efektif';
			let keperawatan_17 = 'Nyeri Kronis';
			let keperawatan_18 = 'Risiko Pendarahan';
			let keperawatan_19 = 'Nausea';
			let keperawatan_20 = 'Nyeri Melahirkan';
			let keperawatan_21 = 'Risiko Syok';
			let keperawatan_22 = 'Defisit Nutrisi';
			let keperawatan_23 = 'Defisit Perawatan Diri';
			let keperawatan_24 = 'Risiko Jatuh';
			let keperawatan_25 = 'Hipervolemia';
			let keperawatan_26 = 'Hipertermia';
			let keperawatan_27 = 'Risiko Luka Tekan';
			let keperawatan_28 = 'Hipovolemia';
			let keperawatan_29 = 'Hipertermi';
			let keperawatan_30 = 'Lain-lain';
			let keperawatan_31 = 'Ketidakstabilan Kadar Glukosa Darah';
			let keperawatan_32 = 'Ketegangan Peran Pemberi Asuhan';
			let keperawatan_33 = 'Gangguan Eliminasi Urin';
			let keperawatan_34 = 'Resiko Gangguan Integritas Kulit / Jaringan';

			var keper = JSON.parse(kajian_keperawatan.masalah_keperawatan);
			if (keper.ket_1 === '1')  { $('#ppigd-keperawatan-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_1+'</b></i>') }  else {$('#ppigd-keperawatan-1').html(keperawatan_1)} ; 
			if (keper.ket_2 === '1')  { $('#ppigd-keperawatan-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_2+'</b></i>') }  else {$('#ppigd-keperawatan-2').html(keperawatan_2)} ; 
			if (keper.ket_3 === '1')  { $('#ppigd-keperawatan-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_3+'</b></i>') }  else {$('#ppigd-keperawatan-3').html(keperawatan_3)} ; 
			if (keper.ket_4 === '1')  { $('#ppigd-keperawatan-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_4+'</b></i>') }  else {$('#ppigd-keperawatan-4').html(keperawatan_4)} ; 
			if (keper.ket_5 === '1')  { $('#ppigd-keperawatan-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_5+'</b></i>') }  else {$('#ppigd-keperawatan-5').html(keperawatan_5)} ; 
			if (keper.ket_6 === '1')  { $('#ppigd-keperawatan-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_6+'</b></i>') }  else {$('#ppigd-keperawatan-6').html(keperawatan_6)} ; 
			if (keper.ket_7 === '1')  { $('#ppigd-keperawatan-7').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_7+'</b></i>') }  else {$('#ppigd-keperawatan-7').html(keperawatan_7)} ; 
			if (keper.ket_8 === '1')  { $('#ppigd-keperawatan-8').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_8+'</b></i>') }  else {$('#ppigd-keperawatan-8').html(keperawatan_8)} ; 
			if (keper.ket_9 === '1')  { $('#ppigd-keperawatan-9').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_9+'</b></i>') }  else {$('#ppigd-keperawatan-9').html(keperawatan_9)} ; 
			if (keper.ket_10 === '1') { $('#ppigd-keperawatan-10').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_10+'</b></i>') } else {$('#ppigd-keperawatan-10').html(keperawatan_10)} ; 
			if (keper.ket_11 === '1') { $('#ppigd-keperawatan-11').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_11+'</b></i>') } else {$('#ppigd-keperawatan-11').html(keperawatan_11)} ; 
			if (keper.ket_12 === '1') { $('#ppigd-keperawatan-12').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_12+'</b></i>') } else {$('#ppigd-keperawatan-12').html(keperawatan_12)} ; 
			if (keper.ket_13 === '1') { $('#ppigd-keperawatan-13').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_13+'</b></i>') } else {$('#ppigd-keperawatan-13').html(keperawatan_13)} ; 
			if (keper.ket_14 === '1') { $('#ppigd-keperawatan-14').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_14+'</b></i>') } else {$('#ppigd-keperawatan-14').html(keperawatan_14)} ; 
			if (keper.ket_15 === '1') { $('#ppigd-keperawatan-15').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_15+'</b></i>') } else {$('#ppigd-keperawatan-15').html(keperawatan_15)} ; 
			if (keper.ket_16 === '1') { $('#ppigd-keperawatan-16').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_16+'</b></i>') } else {$('#ppigd-keperawatan-16').html(keperawatan_16)} ; 
			if (keper.ket_17 === '1') { $('#ppigd-keperawatan-17').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_17+'</b></i>') } else {$('#ppigd-keperawatan-17').html(keperawatan_17)} ; 
			if (keper.ket_18 === '1') { $('#ppigd-keperawatan-18').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_18+'</b></i>') } else {$('#ppigd-keperawatan-18').html(keperawatan_18)} ; 
			if (keper.ket_19 === '1') { $('#ppigd-keperawatan-19').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_19+'</b></i>') } else {$('#ppigd-keperawatan-19').html(keperawatan_19)} ; 
			if (keper.ket_20 === '1') { $('#ppigd-keperawatan-20').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_20+'</b></i>') } else {$('#ppigd-keperawatan-20').html(keperawatan_20)} ; 
			if (keper.ket_21 === '1') { $('#ppigd-keperawatan-21').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_21+'</b></i>') } else {$('#ppigd-keperawatan-21').html(keperawatan_21)} ; 
			if (keper.ket_22 === '1') { $('#ppigd-keperawatan-22').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_22+'</b></i>') } else {$('#ppigd-keperawatan-22').html(keperawatan_22)} ; 
			if (keper.ket_23 === '1') { $('#ppigd-keperawatan-23').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_23+'</b></i>') } else {$('#ppigd-keperawatan-23').html(keperawatan_23)} ; 
			if (keper.ket_24 === '1') { $('#ppigd-keperawatan-24').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_24+'</b></i>') } else {$('#ppigd-keperawatan-24').html(keperawatan_24)} ; 
			if (keper.ket_25 === '1') { $('#ppigd-keperawatan-25').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_25+'</b></i>') } else {$('#ppigd-keperawatan-25').html(keperawatan_25)} ; 
			if (keper.ket_26 === '1') { $('#ppigd-keperawatan-26').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_26+'</b></i>') } else {$('#ppigd-keperawatan-26').html(keperawatan_26)} ; 
			if (keper.ket_27 === '1') { $('#ppigd-keperawatan-27').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_27+'</b></i>') } else {$('#ppigd-keperawatan-27').html(keperawatan_27)} ; 
			if (keper.ket_28 === '1') { $('#ppigd-keperawatan-28').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_28+'</b></i>') } else {$('#ppigd-keperawatan-28').html(keperawatan_28)} ; 
			if (keper.ket_29 === '1') { $('#ppigd-keperawatan-29').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_29+'</b></i>') } else {$('#ppigd-keperawatan-29').html(keperawatan_29)} ; 
			if (keper.ket_30 === '1') { $('#ppigd-keperawatan-30').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> Lain-lain ('+keper.ket_lain+')</b></i>') } else {$('#ppigd-keperawatan-30').html(keperawatan_30)} ; 
			if (keper.ket_31 === '1') { $('#ppigd-keperawatan-31').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_31+'</b></i>') } else {$('#ppigd-keperawatan-31').html(keperawatan_31)} ; 
			if (keper.ket_32 === '1') { $('#ppigd-keperawatan-32').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_32+'</b></i>') } else {$('#ppigd-keperawatan-32').html(keperawatan_32)} ; 
			if (keper.ket_33 === '1') { $('#ppigd-keperawatan-33').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_33+'</b></i>') } else {$('#ppigd-keperawatan-33').html(keperawatan_33)} ; 
			if (keper.ket_34 === '1') { $('#ppigd-keperawatan-34').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_34+'</b></i>') } else {$('#ppigd-keperawatan-34').html(keperawatan_34)} ;				
		// END -------- MASALAH KEPERAWATAN -------- 
	}
</script>

<!-- Modal -->
<!-- Intensive Care -->
<div class="modal fade" id="modal-pengkajian-awal-icare" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-pengkajian-awal-icare">FORM PENGKAJIAN AWAL PASIEN INTENSIVE CARE</h5>
					<h6 class="modal-title text-muted"><small>(Dilengkapi dalam waktu 24 jam pertama pasien masuk ruang intensive care)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-pengkajian-awal-icare class="form-horizontal"') ?>
					<input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
					<input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran">
					<input type="hidden" name="id_pasien" id="id_pasien">
					<input type="hidden" name="id_kajian_keperawatan" id="id_kajian_keperawatan">
					<input type="hidden" name="id_kajian_medis" id="id_kajian_medis">
					<!-- header -->
					<div class="row">
						<div class="col-lg-6">
							<div class="table-responsive">
								<table class="table table-sm table-striped">
									<tr>
										<td width="20%" class="bold">Nama Pasien</td>
										<td wdith="80%">: <span id="pa_pasien_nama"></span></td>
									</tr>
									<tr>
										<td class="bold">No. RM</td>
										<td>: <span id="pa_pasien_no_rm"></span></td>
									</tr>
									<tr>
										<td class="bold">Tanggal Lahir</td>
										<td>: <span id="pa_pasien_tanggal_lahir"></span></td>
									</tr>
									<tr>
										<td class="bold">Jenis Kelamin</td>
										<td>: <span id="pa_pasien_jenis_kelamin"></span></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="table-responsive">
								<table class="table table-sm table-striped">
									<tr>
										<td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
										<td wdith="70%">: <span id="pa_bed"></span></td>
									</tr>
									<tr>
										<td width="30%" class="bold">Pengkajian Awal IGD</td>
										<td>: 
											<button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatPengkajianMedisIGD()"><i class="fas fa-eye m-r-5"></i>Pengkajian Medis dan Keperawatan IGD</button>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<div class="logo-pasien-alergi">
												<img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="logo-pasien-alergi" class="img-thumbnail rounded" width="20%">
												<!-- logo pasien alergi -->
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<!-- end header -->

					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">
								<!-- form pengkajian awal icare -->
								<div id="wizard-form-icare">
									<!-- Tab bwizard -->
									<ol>
										<li>Pengkajian Keperawatan <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li>
										<li>Pengkajian Medis <i class="bold"><small>(Diisi Oleh Dokter)</small></i></li>
									</ol>

									<!-- Data bwizard -->
									<!-- Data Pengkajian Perawat-->
									<div class="form-icare-data-pengkajian-perawat">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td colspan="3">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" id="btn-expand-icare-all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
													<button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="btn-icare-collapse-all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
													<span id="desclaimer-history-icare" style="color:red; font-style:italic;"></span><button class="btn btn-success btn-xs mr-1 float-left" type="button" id="btn-icare-history-logs"><i class="fas fa-fw fa-history mr-1"></i>Show History Logs</button>
												</td>
											</tr>
											<tr>
												<td width="20%" class="bold">Tanggal / Jam Masuk</td>
												<td wdith="1%" class="bold">:</td>
												<td width="79%"><input type="text" name="waktu_masuk" id="waktu_masuk_icare" class="custom-form clear-input col-lg-2" readonly></td>
											</tr>
											<tr>
												<td class="bold">Tanggal / Jam Pengkajian</td>
												<td class="bold">:</td>
												<td>
													<input type="text" name="waktu_pengkajian" id="waktu_kajian_perawat" class="custom-form clear-input col-lg-2" value="<?= date('d/m/Y H:i') ?>">
													<!-- <input type="hidden" name="waktu_pengkajian" id="waktu_kajian_perawat_old"> -->
												</td>
											</tr>
											<tr>
												<td class="bold">Agama</td>
												<td class="bold">:</td>
												<td>
													<input type="checkbox" name="agama_islam" id="agama_islam" value="1" class="mr-1" disabled>Islam
													<input type="checkbox" name="agama_kristen" id="agama_kristen" value="1" class="mr-1 ml-2" disabled>Kristen
													<input type="checkbox" name="agama_hindu" id="agama_hindu" value="1" class="mr-1 ml-2" disabled>Hindu
													<input type="checkbox" name="agama_katholik" id="agama_katholik" value="1" class="mr-1 ml-2" disabled>Katholik
													<input type="checkbox" name="agama_buddha" id="agama_buddha" value="1" class="mr-1 ml-2" disabled>Buddha
													<input type="checkbox" name="agama_lain" id="agama_lain" value="1" class="mr-1 ml-2" disabled>
													<input type="text" name="agama_lain_input" id="agama_lain_input" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Masukkan agama lain" disabled>
												</td>
											</tr>
											<tr>
												<td class="bold">Pendidikan</td>
												<td class="bold">:</td>
												<td><input type="text" name="pendidikan" id="pendidikan_pasien" class="custom-form clear-input col-lg-3" placeholder="Masukkan pendidikan" readonly></td>
											</tr>
											<tr>
												<td class="bold">Cara Masuk RS</td>
												<td class="bold">:</td>
												<td>
													<input type="checkbox" name="cara_masuk_irj" id="cara_masuk_irj" value="1" class="mr-1" disabled>IRJ
													<input type="checkbox" name="cara_masuk_igd" id="cara_masuk_igd" value="1" class="mr-1 ml-2" disabled>IGD
													<input type="checkbox" name="cara_masuk_lain" id="cara_masuk_lain" value="1" class="mr-1 ml-2" disabled>Lain-lain
													<input type="text" name="cara_masuk_lain_input" id="cara_masuk_lain_input" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Masukkan cara masuk RS" disabled>
												</td>
											</tr>
											<tr>
												<td class="bold">Tiba Diruangan Rawat dengan Cara</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="cara_tiba_diruangan" id="cara_tiba_diruangan_jalan" value="Jalan" class="mr-1">Jalan
													<input type="radio" name="cara_tiba_diruangan" id="cara_tiba_diruangan_brankar" value="Brankar" class="mr-1 ml-2">Brankar
													<input type="radio" name="cara_tiba_diruangan" id="cara_tiba_diruangan_kursi_roda" value="Kursi Roda" class="mr-1 ml-2">Kursi Roda
												</td>
											</tr>
										</table>

										<!-- Row Data Kesehatan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kesehatan-pasien-icare"><i class="fas fa-expand mr-1"></i>Expand</button>DATA KESEHATAN PASIEN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-kesehatan-pasien-icare">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Informasi Diperoleh dari</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="checkbox" name="informasi_dari_pasien" id="informasi_dari_pasien" value="1" class="mr-1">Pasien
														<input type="checkbox" name="informasi_dari_keluarga" id="informasi_dari_keluarga" value="1" class="mr-1 ml-2">Keluarga
														<input type="checkbox" name="informasi_dari_lain" id="informasi_dari_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="informasi_dari_lain_input" id="informasi_dari_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan informasi lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Keluhan Utama</td>
													<td class="bold">:</td>
													<td><input type="text" name="keluhan_utama" id="keluhan_utama_pengkajian_awal" class="custom-form clear-input col-lg-6" placeholder="Masukkan keluhan utama"></td>
												</tr>
												<tr>
													<td class="bold">Mulai Timbul Keluhan</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="mulai_timbul_keluhan" id="mulai_timbul_keluhan" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukkan mulai timbul keluhan">
														<span class="bold ml-2">Lama Keluhan : </span><input type="text" name="lama_keluhan" id="lama_keluhan" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukkan lama keluhan">
													</td>
												</tr>
												<tr>
													<td class="bold">Faktor Pencetus</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="faktor_pencetus_infeksi" id="faktor_pencetus_infeksi" value="1" class="mr-1">Infeksi
														<input type="checkbox" name="faktor_pencetus_lain" id="faktor_pencetus_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="faktor_pencetus_lain_input" id="faktor_pencetus_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan faktor pencetus lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Sifat Keluhan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="sifat_keluhan" id="sifat_keluhan_akut" value="Akut" class="mr-1">Akut
														<input type="radio" name="sifat_keluhan" id="sifat_keluhan_kronik" value="Kronik" class="mr-1 ml-2">Kronik
													</td>
												</tr>
												<tr><td colspan="3"></td></tr>
												<tr>
													<td class="bold">Riwayat Penyakit Sekarang</td>
													<td class="bold">:</td>
													<td><input type="text" name="riwayat_penyakit_sekarang" id="riwayat_penyakit_sekarang_pengkajian_awal" class="custom-form clear-input col-lg-6" placeholder="Masukkan riwayat penyakit sekarang"></td>
												</tr>
												<tr>
													<td class="bold">Riwayat Penyakit Terdahulu</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="rpt_asma" id="rpt_asma" value="1" class="mr-1">Asma
														<input type="checkbox" name="rpt_hipertensi" id="rpt_hipertensi" value="1" class="mr-1 ml-2">Hipertensi
														<input type="checkbox" name="rpt_jantung" id="rpt_jantung" value="1" class="mr-1 ml-2">Jantung
														<input type="checkbox" name="rpt_diabetes" id="rpt_diabetes" value="1" class="mr-1 ml-2">Diabetes
														<input type="checkbox" name="rpt_hepatitis" id="rpt_hepatitis" value="1" class="mr-1 ml-2">Hepatitis
														<input type="checkbox" name="rpt_lain" id="rpt_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="rpt_lain_input" id="rpt_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat penyakit terdahulu lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Riwayat Penyakit Keluarga</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="rpk_asma" id="rpk_asma" value="1" class="mr-1">Asma
														<input type="checkbox" name="rpk_hipertensi" id="rpk_hipertensi" value="1" class="mr-1 ml-2">Hipertensi
														<input type="checkbox" name="rpk_jantung" id="rpk_jantung" value="1" class="mr-1 ml-2">Jantung
														<input type="checkbox" name="rpk_diabetes" id="rpk_diabetes" value="1" class="mr-1 ml-2">Diabetes
														<input type="checkbox" name="rpk_hepatitis" id="rpk_hepatitis" value="1" class="mr-1 ml-2">Hepatitis
														<input type="checkbox" name="rpk_lain" id="rpk_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="rpk_lain_input" id="rpk_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat penyakit keluarga lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Pernah Dirawat</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="pernah_dirawat" id="pernah_dirawat_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pernah_dirawat" id="pernah_dirawat_ya" value="1" class="mr-1 ml-2">Ya, Kapan
														<input type="text" name="pernah_dirawat_kapan" id="pernah_dirawat_kapan" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan kapan pernah dirawat">
														<span class="ml-2 mr-1">Dimana</span><input type="text" name="pernah_dirawat_dimana" id="pernah_dirawat_dimana" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan pernah dirawat dimana">
													</td>
												</tr>
												<tr>
													<td class="bold">Kebiasaan</td>
													<td class="bold">:</td>
													<td>
														<span class="bold mr-1">Merokok :</span>
														<input type="radio" name="kebiasaan_merokok" id="kebiasaan_merokok_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kebiasaan_merokok" id="kebiasaan_merokok_ya" value="1" class="mr-1 ml-2">Ya,
														<input type="text" name="kebiasaan_merokok_input" id="kebiasaan_merokok_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Batang/hari">
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<span class="bold mr-1">Alkohol :</span>
														<input type="radio" name="kebiasaan_alkohol" id="kebiasaan_alkohol_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kebiasaan_alkohol" id="kebiasaan_alkohol_ya" value="1" class="mr-1 ml-2">Ya,
														<input type="text" name="kebiasaan_alkohol_input" id="kebiasaan_alkohol_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Gelas/hari">
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<span class="bold mr-1">Obat Tidur / Narkoba :</span>
														<input type="radio" name="kebiasaan_narkoba" id="kebiasaan_narkoba_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kebiasaan_narkoba" id="kebiasaan_narkoba_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<span class="bold mr-1">Olahraga :</span>
														<input type="radio" name="kebiasaan_olahraga" id="kebiasaan_olahraga_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kebiasaan_olahraga" id="kebiasaan_olahraga_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Riwayat Operasi</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="riwayat_operasi" id="riwayat_operasi_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="riwayat_operasi" id="riwayat_operasi_ya" value="1" class="mr-1 ml-2">Ya, Kapan
														<input type="text" name="riwayat_operasi_kapan" id="riwayat_operasi_kapan" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan kapan pernah dioperasi">
														<span class="ml-2 mr-1">Dimana</span><input type="text" name="riwayat_operasi_dimana" id="riwayat_operasi_dimana" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan pernah dioperasi dimana">
													</td>
												</tr>
												<tr>
													<td class="bold">Membawa Obat dari Luar</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="obat_luar" id="obat_luar_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="obat_luar" id="obat_luar_ya" value="1" class="mr-1 ml-2">Ya <i>(Jika ya, lapor farmasi untuk rekonsiliasi obat)</i>
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Riwayat Alergi -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-alergi-icare"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT ALERGI
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-riwayat-alergi-icare">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Alergi</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="alergi" id="alergi_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="alergi" id="alergi_tidak_tahu" value="2" class="mr-1 ml-2">Tidak Tahu
														<input type="radio" name="alergi" id="alergi_ya" value="1" class="mr-1 ml-2">Ya, Bila Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Alergi Obat</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="alergi_obat" id="alergi_obat" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan alergi obat">
														<input type="text" name="alergi_obat_reaksi" id="alergi_obat_reaksi" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Reaksi alergi obat">
													</td>
												</tr>
												<tr>
													<td class="bold">Alergi Makanan</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="alergi_makanan" id="alergi_makanan" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan alergi makanan">
														<input type="text" name="alergi_makanan_reaksi" id="alergi_makanan_reaksi" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Reaksi alergi makanan">
													</td>
												</tr>
												<tr>
													<td colspan="3" class="bold"><i>(Bila ada alergi segera pasang gelang merah dan tulis nama obat/makanan)</i></td>
												</tr>
											</table>
										</div>

										<!-- Row Data Riwayat Kehamilan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-kehamilan-icare"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT KEHAMILAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-riwayat-kehamilan-icare">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Apakah Dalam Keadaan Hamil</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="hamil" id="hamil_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="hamil" id="hamil_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Apakah sedang Menyusui</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="menyusui" id="menyusui_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="menyusui" id="menyusui_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Riwayat Kelahiraan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="riwayat_kelahiran" id="riwayat_kelahiran_spontan" value="Spontan" class="mr-1">Spontan
														<input type="radio" name="riwayat_kelahiran" id="riwayat_kelahiran_operasi" value="Operasi" class="mr-1 ml-2">Operasi
														<input type="radio" name="riwayat_kelahiran" id="riwayat_kelahiran_cukup_bulan" value="Cukup Bulan" class="mr-1 ml-2">Cukup Bulan
														<input type="radio" name="riwayat_kelahiran" id="riwayat_kelahiran_kurang_bulan" value="Kurang Bulan" class="mr-1 ml-2">Kurang Bulan
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Riwayat Kehamilan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-vital-sign-icare"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-vital-sign-icare">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Kesadaran</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<input type="checkbox" name="composmentis" id="composmentis" value="1" class="mr-1">Composmentis
														<input type="checkbox" name="apatis" id="apatis" value="1" class="mr-1 ml-2">Apatis
														<input type="checkbox" name="samnolen" id="samnolen" value="1" class="mr-1 ml-2">Samnolen
														<input type="checkbox" name="sopor" id="sopor" value="1" class="mr-1 ml-2">Sopor
														<input type="checkbox" name="koma" id="koma" value="1" class="mr-1 ml-2">Koma
													</td>
													<td></td>
													<td width="15%"></td>
													<td width="1%"></td>
													<td width="39%"></td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														<span class="bold">GCS : 
															E <input type="text" name="gcs_e" id="gcs_e" class="custom-form clear-input d-inline-block col-lg-1" placeholder="" onkeypress="return hanyaAngka(event)">
															M <input typevent="text" name="gcs_m" id="gcs_m" class="custom-form clear-input d-inline-block col-lg-1" placeholder="" onkeypress="return hanyaAngka(event)">
															V <input type="teventxt" name="gcs_v" id="gcs_v" class="custom-form clear-input d-inline-block col-lg-1" placeholder="" onkeypress="return hanyaAngka(event)">
														</span>
													</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td class="bold">Tekanan Darah</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="tensi_sis" id="pa_tensi_sis" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
															<span>/</span>
															<input type="text" name="tensi_dis" id="pa_tensi_dis" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Diastolik" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">mmHg</span>
															</div>
														</div>
													</td>
													<td></td>
													<td class="bold">Suhu</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="suhu_pa" id="pa_suhu" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Suhu" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">&#8451;</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="bold">Frekuensi Nadi</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="nadi_pa" id="pa_nadi" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">x/mnt</span>
															</div>
														</div>
													</td>
													<td></td>
													<td class="bold">Frekuensi Nafas</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="nafas_pa" id="pa_nafas" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Nafas" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">x/mnt</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="bold">Tinggi Badan</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="tinggi_badan" id="pa_tinggi_badan" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Tinggi Badan" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Cm</span>
															</div>
														</div>
													</td>
													<td></td>
													<td class="bold">Berat Badan</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="berat_badan" id="pa_berat_badan" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Berat Badan" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Kg</span>
															</div>
														</div>
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Pernafasan</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Suara Nafas</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="sf_vesikuler" id="sf_vesikuler" value="1" class="mr-1">Vesikuler
														<input type="checkbox" name="sf_wheezing" id="sf_wheezing" value="1" class="mr-1 ml-2">Wheezing
														<input type="checkbox" name="sf_ronchi" id="sf_ronchi" value="1" class="mr-1 ml-2">Ronchi
														<input type="checkbox" name="sf_dispnoe" id="sf_dispnoe" value="1" class="mr-1 ml-2">Dispnoe
														<input type="checkbox" name="sf_stridor" id="sf_stridor" value="1" class="mr-1 ml-2">Stridor
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pola Nafas</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="pn_normal" id="pn_normal" value="1" class="mr-1">Normal
														<input type="checkbox" name="pn_bradipnea" id="pn_bradipnea" value="1" class="mr-1 ml-2">Bradipnea
														<input type="checkbox" name="pn_tachipnea" id="pn_tachipnea" value="1" class="mr-1 ml-2">Tachipnea
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Jenis Pernafasan</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="jp_dada" id="jp_dada" value="1" class="mr-1">Pernafasan Dada
														<input type="checkbox" name="jp_perut" id="jp_perut" value="1" class="mr-1 ml-2">Pernafasan Perut
														<input type="checkbox" name="jp_cuping_hidung" id="jp_cuping_hidung" value="1" class="mr-1 ml-2">Cuping Hidung
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Otot Bantu Nafas</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="otot_bantu_nafas" id="otot_bantu_nafas_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="otot_bantu_nafas" id="otot_bantu_nafas_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr><td colspan="3"></td></tr>
												<tr>
													<td><span class="ml-4">Irama Nafas</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="irama_nafas" id="irama_nafas_ya" value="1" class="mr-1" checked>Teratur
														<input type="radio" name="irama_nafas" id="irama_nafas_tidak" value="0" class="mr-1 ml-2">Tidak Teratur
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Batuk dan Sekresi</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="batuk_sekresi" id="batuk_sekresi_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="batuk_sekresi" id="batuk_sekresi_ya" value="1" class="mr-1 ml-2">Ya
														<span class="ml-5">: </span><input type="checkbox" name="bs_produktif" id="bs_produktif" value="1" class="mr-1">Produktif
														<input type="checkbox" name="bs_non_produktif" id="bs_non_produktif" value="1" class="mr-1 ml-2">Non Produktif
														<input type="checkbox" name="bs_hemaptoe" id="bs_hemaptoe" value="1" class="mr-1 ml-2">Hemaptoe
														<input type="checkbox" name="bs_lain" id="bs_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="bs_lain_input" id="bs_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Kardio-vaskuler</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Warna Kulit</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="wk_normal" id="wk_normal" value="1" class="mr-1">Normal
														<input type="checkbox" name="wk_kemerahan" id="wk_kemerahan" value="1" class="mr-1 ml-2">Kemerahan
														<input type="checkbox" name="wk_sianosis" id="wk_sianosis" value="1" class="mr-1 ml-2">Sianosis
														<input type="checkbox" name="wk_pucat" id="wk_pucat" value="1" class="mr-1 ml-2">Pucat
														<input type="checkbox" name="wk_lain" id="wk_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="wk_lain_input" id="wk_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Nyeri Dada</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="nyeri_dada" id="nyeri_dada_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="nyeri_dada" id="nyeri_dada_ya" value="1" class="mr-1 ml-2">Ya,
														<input type="text" name="nyeri_dada_input" id="nyeri_dada_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Denyut Nadi</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="denyut_nadi" id="denyut_nadi_ya" value="1" class="mr-1" checked>Teratur
														<input type="radio" name="denyut_nadi" id="denyut_nadi_tidak" value="0" class="mr-1 ml-2">Tidak Teratur
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Sirkulasi</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="s_akral_hangat" id="s_akral_hangat" value="1" class="mr-1">Akral Hangat
														<input type="checkbox" name="s_akral_dingin" id="s_akral_dingin" value="1" class="mr-1 ml-2">Akral Dingin
														<input type="checkbox" name="s_rasa_bebas" id="s_rasa_bebas" value="1" class="mr-1 ml-2">Rasa Kebas
														<input type="checkbox" name="s_palpitasi" id="s_palpitasi" value="1" class="mr-1 ml-2">Palpitasi
														<input type="checkbox" name="s_edema" id="s_edema" value="1" class="mr-1 ml-2">Edema, Lokasi
														<input type="text" name="s_edema_input" id="s_edema_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lokasi">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pulsasi</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="pulsasi_kuat" id="pulsasi_kuat" value="1" class="mr-1">Kuat
														<input type="checkbox" name="pulsasi_lemah" id="pulsasi_lemah" value="1" class="mr-1 ml-2">Lemah
														<input type="checkbox" name="pulsasi_lain" id="pulsasi_lain" value="1" class="mr-1 ml-2">Lain - lain
														<input type="text" name="pulsasi_lain_input" id="pulsasi_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain-lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Pencernaan</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Mulut</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="mulut_tidak_ada_kelainan" id="mulut_tidak_ada_kelainan" value="1" class="mr-1">Tidak Ada Kelainan
														<input type="checkbox" name="mulut_simetris" id="mulut_simetris" value="1" class="mr-1 ml-2">Simetris
														<input type="checkbox" name="mulut_asimetris" id="mulut_asimetris" value="1" class="mr-1 ml-2">Asimetris
														<input type="checkbox" name="mulut_mukosa" id="mulut_mukosa" value="1" class="mr-1 ml-2">Mukosa Mulut Kering
														<input type="checkbox" name="mulut_bibir_pucat" id="mulut_bibir_pucat" value="1" class="mr-1 ml-2">Bibir Pucat
														<input type="checkbox" name="mulut_lain" id="mulut_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="mulut_lain_input" id="mulut_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Gigi</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="gigi_tidak_ada_kelainan" id="gigi_tidak_ada_kelainan" value="1" class="mr-1">Tidak Ada Kelainan
														<input type="checkbox" name="gigi_caries" id="gigi_caries" value="1" class="mr-1 ml-2">Caries
														<input type="checkbox" name="gigi_goyang" id="gigi_goyang" value="1" class="mr-1 ml-2">Goyang
														<input type="checkbox" name="gigi_palsu" id="gigi_palsu" value="1" class="mr-1 ml-2">Gigi Palsu
														<input type="checkbox" name="gigi_lain" id="gigi_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="gigi_lain_input" id="gigi_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Lidah</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="lidah_tidak_ada_kelainan" id="lidah_tidak_ada_kelainan" value="1" class="mr-1">Tidak Ada Kelainan
														<input type="checkbox" name="lidah_kotor" id="lidah_kotor" value="1" class="mr-1 ml-2">Kotor
														<input type="checkbox" name="lidah_gerakan_asimetris" id="lidah_gerakan_asimetris" value="1" class="mr-1 ml-2">Gerakan Asimetris
														<input type="checkbox" name="lidah_lain" id="lidah_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="lidah_lain_input" id="lidah_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Tenggorokan</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="teng_gangguan_menelan" id="teng_gangguan_menelan" value="1" class="mr-1">Gangguan Menelan
														<input type="checkbox" name="teng_sakit_menelan" id="teng_sakit_menelan" value="1" class="mr-1 ml-2">Sakit Menelan
														<input type="checkbox" name="teng_lain" id="teng_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="teng_lain_input" id="teng_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Abdomen</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="abdomen_asites" id="abdomen_asites" value="1" class="mr-1">Asites
														<input type="checkbox" name="abdomen_tegang" id="abdomen_tegang" value="1" class="mr-1 ml-2">Tegang
														<input type="checkbox" name="abdomen_supel" id="abdomen_supel" value="1" class="mr-1 ml-2">Supel
														<input type="checkbox" name="abdomen_lain" id="abdomen_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="abdomen_lain_input" id="abdomen_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Nafsu Makan</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="nafsu_makan" id="nafsu_makan_tetap" value="Tetap" class="mr-1">Tetap
														<input type="radio" name="nafsu_makan" id="nafsu_makan_naik" value="Naik" class="mr-1 ml-2">Naik
														<input type="radio" name="nafsu_makan" id="nafsu_makan_turun" value="Turun" class="mr-1 ml-2">Turun
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Mual</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="mual" id="mual_ya" value="1" class="mr-1">Ada
														<input type="radio" name="mual" id="mual_tidak" value="0" class="mr-1 ml-2" checked>Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Muntah</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="muntah" id="muntah_ya" value="1" class="mr-1">Ada
														<input type="radio" name="muntah" id="muntah_tidak" value="0" class="mr-1 ml-2" checked>Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Kesulitan Menelan</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="kesulitan_menelan" id="kesulitan_menelan_ya" value="1" class="mr-1">Ada
														<input type="radio" name="kesulitan_menelan" id="kesulitan_menelan_tidak" value="0" class="mr-1 ml-2" checked>Tidak
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Eliminasi</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">BAB</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<div class="input-group v-center">
															<input type="checkbox" name="bab_normal" id="bab_normal" value="1" class="mr-1">Normal
															<input type="checkbox" name="bab_konstipasi" id="bab_konstipasi" value="1" class="mr-1 ml-2">Konstipasi
															<input type="checkbox" name="bab_melena" id="bab_melena" value="1" class="mr-1 ml-2">Melena
															<input type="checkbox" name="bab_inkontinensia_alvi" id="bab_inkontinensia_alvi" value="1" class="mr-1 ml-2">Inkontinensia Alvi
															<input type="checkbox" name="bab_colostomy" id="bab_colostomy" value="1" class="mr-1 ml-2">Colostomy
															<input type="checkbox" name="bab_diare" id="bab_diare" value="1" class="mr-1 ml-2">Diare
															<input type="text" name="bab_diare_input" id="bab_diare_input" class="custom-form clear-input col-lg-2 ml-2 disabled" placeholder="Masukkan diare" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">x/hr</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">BAK</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="bak_normal" id="bak_normal" value="1" class="mr-1">Normal
														<input type="checkbox" name="bak_hematuri" id="bak_hematuri" value="1" class="mr-1 ml-2">Hematuri
														<input type="checkbox" name="bak_nokturia" id="bak_nokturia" value="1" class="mr-1 ml-2">Nokturia
														<input type="checkbox" name="bak_inkontinensia_uri" id="bak_inkontinensia_uri" value="1" class="mr-1 ml-2">Inkontinensia Uri
														<input type="checkbox" name="bak_urostomi" id="bak_urostomi" value="1" class="mr-1 ml-2">Urostomi
														<input type="checkbox" name="bak_urin_menetes" id="bak_urin_menetes" value="1" class="mr-1 ml-2">Urin Menetes
														<input type="checkbox" name="bak_kateter_warna" id="bak_kateter_warna" value="1" class="mr-1 ml-2">Kateter Warna
														<input type="text" name="bak_kateter_warna_input" id="bak_kateter_warna_input" class="custom-form clear-input d-inline-block col-lg-3 disabled" placeholder="Masukkan kateter warna">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4"></span></td>
													<td></td>
													<td>
														<input type="checkbox" name="bak_kandung_kemih" id="bak_kandung_kemih" value="1" class="mr-1">Distensi Kandung Kemih
														<input type="checkbox" name="bak_lain" id="bak_lain" value="1" class="mr-1 ml-2">Lain - lain
														<input type="text" name="bak_lain_input" id="bak_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Muskuloskeletal</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Tulang</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="sm_tulang_fraktur_terbuka" id="sm_tulang_fraktur_terbuka" value="1" class="mr-1">Fraktur Terbuka, lokasi
														<input type="text" name="sm_tulang_fraktur_terbuka_lokasi" id="sm_tulang_fraktur_terbuka_lokasi" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lokasi fraktur terbuka">
														<input type="checkbox" name="sm_tulang_fraktur_tertutup" id="sm_tulang_fraktur_tertutup" value="1" class="mr-1 ml-5">Fraktur Tertutup, lokasi
														<input type="text" name="sm_tulang_fraktur_tertutup_lokasi" id="sm_tulang_fraktur_tertutup_lokasi" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lokasi fraktur tertutup">

													</td>
												</tr>
												<tr>
													<td><span class="ml-4"></span></td>
													<td></td>
													<td>
														<input type="checkbox" name="sm_tulang_amputasi" id="sm_tulang_amputasi" value="1" class="mr-1">Amputasi
														<input type="checkbox" name="sm_tulang_tumor_tulang" id="sm_tulang_tumor_tulang" value="1" class="mr-1 ml-2">Tumor Tulang
														<input type="checkbox" name="sm_tulang_nyeri_tulang" id="sm_tulang_nyeri_tulang" value="1" class="mr-1 ml-2">Nyeri Tulang
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Sendi</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="sm_sendi_dislokasi" id="sm_sendi_dislokasi" value="1" class="mr-1">Dislokasi
														<input type="checkbox" name="sm_sendi_infeksi" id="sm_sendi_infeksi" value="1" class="mr-1 ml-2">Infeksi
														<input type="checkbox" name="sm_sendi_nyeri" id="sm_sendi_nyeri" value="1" class="mr-1 ml-2">Nyeri
														<input type="checkbox" name="sm_sendi_oedema" id="sm_sendi_oedema" value="1" class="mr-1 ml-2">Oedema
														<input type="checkbox" name="sm_sendi_lain" id="sm_sendi_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sm_sendi_lain_input" id="sm_sendi_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Integumen</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Warna</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="si_warna_pucat" id="si_warna_pucat" value="1" class="mr-1">Pucat
														<input type="checkbox" name="si_warna_sianosis" id="si_warna_sianosis" value="1" class="mr-1 ml-2">Sianosis
														<input type="checkbox" name="si_warna_normal" id="si_warna_normal" value="1" class="mr-1 ml-2">Normal
														<input type="checkbox" name="si_warna_lain" id="si_warna_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="si_warna_lain_input" id="si_warna_lain_input" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lain - lain">

													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Turgor</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="si_turgor_baik" id="si_turgor_baik" value="1" class="mr-1">Baik
														<input type="checkbox" name="si_turgor_sedang" id="si_turgor_sedang" value="1" class="mr-1 ml-2">Sedang
														<input type="checkbox" name="si_turgor_buruk" id="si_turgor_buruk" value="1" class="mr-1 ml-2">Buruk
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Kulit</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="si_kulit_normal" id="si_kulit_normal" value="1" class="mr-1">Normal
														<input type="checkbox" name="si_kulit_kemerahan" id="si_kulit_kemerahan" value="1" class="mr-1 ml-2">Kemerahan
														<input type="checkbox" name="si_kulit_lesi" id="si_kulit_lesi" value="1" class="mr-1 ml-2">Lesi
														<input type="checkbox" name="si_kulit_luka" id="si_kulit_luka" value="1" class="mr-1 ml-2">Luka
														<input type="checkbox" name="si_kulit_memar" id="si_kulit_memar" value="1" class="mr-1 ml-2">Memar
														<input type="checkbox" name="si_kulit_petechie" id="si_kulit_petechie" value="1" class="mr-1 ml-2">Petechie
														<input type="checkbox" name="si_kulit_bulae" id="si_kulit_bulae" value="1" class="mr-1 ml-2">Bulae
														<input type="checkbox" name="si_kulit_lain" id="si_kulit_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="si_kulit_lain_input" id="si_kulit_lain_input" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Indera</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Penglihatan</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="sin_penglihatan_baik" id="sin_penglihatan_baik" value="1" class="mr-1">Baik
														<input type="checkbox" name="sin_penglihatan_buram" id="sin_penglihatan_buram" value="1" class="mr-1 ml-2">Buram
														<input type="checkbox" name="sin_penglihatan_tidak_bisa_melihat" id="sin_penglihatan_tidak_bisa_melihat" value="1" class="mr-1 ml-2">Tidak Bisa Melihat
														<input type="checkbox" name="sin_penglihatan_pakai_alat_bantu" id="sin_penglihatan_pakai_alat_bantu" value="1" class="mr-1 ml-2">Pakai Alat Bantu
														<input type="checkbox" name="sin_penglihatan_hypema" id="sin_penglihatan_hypema" value="1" class="mr-1 ml-2">Hypema
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Penciuman</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="sin_penciuman_sekresi" id="sin_penciuman_sekresi" value="1" class="mr-1">Sekresi
														<input type="checkbox" name="sin_penciuman_polip" id="sin_penciuman_polip" value="1" class="mr-1 ml-2">Polip
														<input type="checkbox" name="sin_penciuman_gangguan" id="sin_penciuman_gangguan" value="1" class="mr-1 ml-2">Gangguan Fungsi Penciuman
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pendengaran</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="sin_pendengaran_kurang_jelas" id="sin_pendengaran_kurang_jelas" value="1" class="mr-1">Kurang Jelas
														<input type="checkbox" name="sin_pendengaran_baik" id="sin_pendengaran_baik" value="1" class="mr-1 ml-2">Baik
														<input type="checkbox" name="sin_pendengaran_tidak_bisa_dengar" id="sin_pendengaran_tidak_bisa_dengar" value="1" class="mr-1 ml-2">Tidak Bisa Mendengar
														<input type="checkbox" name="sin_pendengaran_pakai_alat_bantu" id="sin_pendengaran_pakai_alat_bantu" value="1" class="mr-1 ml-2">Pakai Alat Bantu
														<input type="checkbox" name="sin_pendengaran_nyeri_telinga" id="sin_pendengaran_nyeri_telinga" value="1" class="mr-1 ml-2">Nyeri Telinga
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pengecap</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="sin_pengecap_tidak_ada_kelainan" id="sin_pengecap_tidak_ada_kelainan" value="1" class="mr-1">Tidak Ada Kelainan
														<input type="checkbox" name="sin_pengecap_gangguan_fungsi" id="sin_pengecap_gangguan_fungsi" value="1" class="mr-1 ml-2">Gangguan Fungsi
														<input type="checkbox" name="sin_pengecap_lain" id="sin_pengecap_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sin_pengecap_lain_input" id="sin_pengecap_lain_input" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Persyaratan</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4"></span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="sp_kesemutan" id="sp_kesemutan" value="1" class="mr-1">Kesemutan
														<input type="checkbox" name="sp_kelumpuhan" id="sp_kelumpuhan" value="1" class="mr-1 ml-2">Kelumpuhan
														<input type="text" name="sp_kelumpuhan_lokasi" id="sp_kelumpuhan_lokasi" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lokasi kelumpuhan">
														<input type="checkbox" name="sp_kejang" id="sp_kejang" value="1" class="mr-1 ml-2">Kejang
													</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														<input type="checkbox" name="sp_pusing" id="sp_pusing" value="1" class="mr-1">Pusing
														<input type="checkbox" name="sp_muntah" id="sp_muntah" value="1" class="mr-1 ml-2">Muntah Proyektil
														<input type="checkbox" name="sp_kaku_kuduk" id="sp_kaku_kuduk" value="1" class="mr-1 ml-2">Kaku Kuduk
														<input type="checkbox" name="sp_hemiparese" id="sp_hemiparese" value="1" class="mr-1 ml-2">Hemiparese
														<input type="checkbox" name="sp_alasia" id="sp_alasia" value="1" class="mr-1 ml-2">Alasia
														<input type="checkbox" name="sp_tremor" id="sp_tremor" value="1" class="mr-1 ml-2">Tremor
														<input type="checkbox" name="sp_lain" id="sp_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sp_lain_input" id="sp_lain_input" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Reproduksi</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Alat</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="sr_alat" id="sr_alat_oedema" value="Oedema" class="mr-1">Oedema
														<input type="radio" name="sr_alat" id="sr_alat_varices" value="Varices" class="mr-1 ml-2">Varices
														<input type="radio" name="sr_alat" id="sr_alat_hygiene" value="Hygiene" class="mr-1 ml-2">Hygiene(Bersih/Kotor)*
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Genital</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="sr_genital" id="sr_genital_hemoroid" value="Hemoroid" class="mr-1">Hemoroid
														<input type="radio" name="sr_genital" id="sr_genital_hipospadia" value="Hipospadia" class="mr-1 ml-2">Hipospadia
														<input type="radio" name="sr_genital" id="sr_genital_masalah_prostat" value="Masalah Prostat" class="mr-1 ml-2">Masalah Prostat
														<input type="radio" name="sr_genital" id="sr_genital_simetris" value="Simetris" class="mr-1 ml-2">Simetris
														<input type="radio" name="sr_genital" id="sr_genital_asimetris" value="Asimetris" class="mr-1 ml-2">Asimetris
														<input type="radio" name="sr_genital" id="sr_genital_inflamasi" value="Inflamasi" class="mr-1 ml-2">Inflamasi
														<input type="radio" name="sr_genital" id="sr_genital_nyeri" value="Nyeri" class="mr-1 ml-2">Nyeri
													</td>
												</tr>
												<tr>
													<td><span class="ml-4"></span>Payudara</td>
													<td>:</td>
													<td>
														<input type="radio" name="sr_payudara" id="sr_payudara_massa" value="Massa" class="mr-1">Massa
														<input type="radio" name="sr_payudara" id="sr_payudara_lesi" value="Lesi" class="mr-1 ml-2">Lesi/Lecet
														<input type="radio" name="sr_payudara" id="sr_payudara_lain" value="Lain" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sr_payudara_lain_input" id="sr_payudara_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>

										</div>
										
										<!-- Row Data Psikososial, Ekonomi, Dan Spriritual -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-psikososial-ekonomi-spiritual"><i class="fas fa-expand mr-1"></i>Expand</button>PSIKOSOSIAL, EKONOMI DAN SPIRITUAL
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-psikososial-ekonomi-spiritual">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Status Psikologis</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="checkbox" name="sps_cemas" id="sps_cemas" value="1" class="mr-1">Cemas
														<input type="checkbox" name="sps_takut" id="sps_takut" value="1" class="mr-1 ml-2">Takut
														<input type="checkbox" name="sps_marah" id="sps_marah" value="1" class="mr-1 ml-2">Marah
														<input type="checkbox" name="sps_sedih" id="sps_sedih" value="1" class="mr-1 ml-2">Sedih
														<input type="checkbox" name="sps_bunuh_diri" id="sps_bunuh_diri" value="1" class="mr-1 ml-2">Kecendrungan Bunuh Diri
														<input type="checkbox" name="sps_lain" id="sps_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sps_lain_input" id="sps_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Status Mental</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="smen_sadar" id="smen_sadar" value="1" class="mr-1">Sadar dan Orientasi Baik
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<input type="checkbox" name="smen_ada_masalah" id="smen_ada_masalah" value="1" class="mr-1">Ada Masalah Perilaku, Sebutkan
														<input type="text" name="smen_ada_masalah_input" id="smen_ada_masalah_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<input type="checkbox" name="smen_perilaku_kekerasan" id="smen_perilaku_kekerasan" value="1" class="mr-1">Perilaku Kekerasan yang dialami pasien sebelumnya
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Kebutuhan Sosial</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Status Pernikahan</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="status_pernikahan" id="sper_menikah" value="1" class="mr-1">Menikah
														<input type="radio" name="status_pernikahan" id="sper_belum_menikah" value="1" class="mr-1 ml-2">Belum Menikah
														<input type="radio" name="status_pernikahan" id="sper_duda" value="1" class="mr-1 ml-2">Duda
														<input type="radio" name="status_pernikahan" id="sper_janda" value="1" class="mr-1 ml-2">Janda
														<input type="radio" name="status_pernikahan" id="sper_cerai_mati" value="1" class="mr-1 ml-2">Cerai Mati
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Keluarga</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="kel_tinggal" id="kel_tinggal_serumah" value="Serumah" class="mr-1" checked>Tinggal Serumah
														<input type="radio" name="kel_tinggal" id="kel_tinggal_sendiri" value="Sendiri" class="mr-1 ml-2">Tinggal Sendiri
														<input type="radio" name="kel_tinggal" id="kel_tinggal_lain" value="Lain" class="mr-1 ml-2">Lain-lain
														<input type="text" name="kel_tinggal_lain_input" id="kel_tinggal_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr><td colspan="3"></td></tr>
												<tr>
													<td><span class="ml-4">Hubungan Pasien dengan Keluarga</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="hubungan_dengan_keluarga" id="hubungan_dengan_keluarga_baik" value="1" class="mr-1" checked>Baik
														<input type="radio" name="hubungan_dengan_keluarga" id="hubungan_dengan_keluarga_tidak_baik" value="0" class="mr-1 ml-2">Tidak Baik
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Tempat Tingal</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="tempat_tinggal" id="tempat_tinggal_rumah" value="Rumah" class="mr-1" checked>Rumah
														<input type="radio" name="tempat_tinggal" id="tempat_tinggal_apart" value="Apartemen" class="mr-1 ml-2">Apartemen
														<input type="radio" name="tempat_tinggal" id="tempat_tinggal_panti" value="Panti" class="mr-1 ml-2">Panti
														<input type="radio" name="tempat_tinggal" id="tempat_tinggal_lain" value="Lain" class="mr-1 ml-2">Lainnya
														<input type="text" name="tempat_tinggal_lain_input" id="tempat_tinggal_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan tempat tinggal lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Status Ekonomi dan Sosial</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Pekerjaan</span></td>
													<td wdith="1%">:</td>
													<td width="79%"><input type="text" name="pekerjaan" id="pekerjaan_pasien" class="custom-form clear-input col-lg-3" placeholder="Masukkan pekerjaan" readonly></td>
												</tr>
												<tr>
													<td><span class="ml-4">Cara Bayar</span></td>
													<td>:</td>
													<td>
														<input type="text" name="cara_bayar" id="cara_bayar_pasien" class="custom-form clear-input col-lg-3" placeholder="Masukkan cara bayar" readonly>
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Status Nilai - Nilai Kepercayaan</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Keyakinan</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="snk_keyakinan" id="snk_keyakinan_tidak" value="0" class="mr-1" checked>Tidak Ada
														<input type="radio" name="snk_keyakinan" id="snk_keyakinan_ya" value="1" class="mr-1 ml-2">Ada, Sebutkan
														<input type="text" name="snk_keyakinan_ya_input" id="snk_keyakinan_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Nilai - Nilai Kepercayaan</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="snk_nilai_kepercayaan" id="snk_nilai_kepercayaan_tidak" value="0" class="mr-1" checked>Tidak Ada
														<input type="radio" name="snk_nilai_kepercayaan" id="snk_nilai_kepercayaan_ya" value="1" class="mr-1 ml-2">Ada, Sebutkan
														<input type="text" name="snk_nilai_kepercayaan_ya_input" id="snk_nilai_kepercayaan_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Kegiatan Keagamaan</span></td>
													<td>:</td>
													<td>
														<input type="text" name="snk_kebiasaan_keagamaan" id="snk_kebiasaan_keagamaan" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Masukkan kegiatan keagamaan yang biasa dilakukan">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Pengkajian Spiritual</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Wajib Ibadah</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="wajib_ibadah" id="wajib_ibadah_baligh" value="Baligh" class="mr-1" checked>Baligh
														<input type="radio" name="wajib_ibadah" id="wajib_ibadah_belum" value="Belum Baligh" class="mr-1 ml-2">Belum Baligh
														<input type="radio" name="wajib_ibadah" id="wajib_ibadah_halangan" value="Halangan" class="mr-1 ml-2">Halangan Lain
														<input type="text" name="wajib_ibadah_halangan_input" id="wajib_ibadah_halangan_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan halangan lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Thaharoh</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="thaharoh" id="thaharoh_berwudhu" value="Berwudhu" class="mr-1" checked>Berwudhu
														<input type="radio" name="thaharoh" id="thaharoh_tayamum" value="Tayamum" class="mr-1 ml-2">Tayamum
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Sholat</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="sholat" id="sholat_berdiri" value="Berdiri" class="mr-1" checked>Berdiri
														<input type="radio" name="sholat" id="sholat_duduk" value="Duduk" class="mr-1 ml-2">Duduk
														<input type="radio" name="sholat" id="sholat_berbaring" value="Berbaring" class="mr-1 ml-2">Berbaring
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Budaya -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-budaya"><i class="fas fa-expand mr-1"></i>Expand</button>BUDAYA
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-budaya">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td colspan="3" class="bold">Nilai Budaya Yang dimiliki Terkait Dengan Penyebab Penyakit/Masalah Kesehatan adalah :</td>
												</tr>
												<tr>
													<td colspan="3">
														<input type="radio" name="nilai_budaya" id="nb_hukuman" value="Hukuman" class="mr-1">Hukuman
														<input type="radio" name="nilai_budaya" id="nb_ujian" value="Ujian" class="mr-1 ml-2">Ujian
														<input type="radio" name="nilai_budaya" id="nb_kesalahan" value="Kesalahan" class="mr-1 ml-2">Kesalahan
														<input type="radio" name="nilai_budaya" id="nb_takdir" value="Takdir" class="mr-1 ml-2">Takdir
														<input type="radio" name="nilai_budaya" id="nb_buatan_orang" value="Buatan Orang Lain" class="mr-1 ml-2">Buatan Orang Lain
														<input type="radio" name="nilai_budaya" id="nb_lain" value="Lain" class="mr-1 ml-2">Lain-lain
														<input type="text" name="nb_lain_input" id="nb_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td colspan="3" class="bold">Kebiasaan Pasien Saat Sakit (Pola Aktivitas dan Istirahat) : 
													<input type="text" name="budaya_pola_aktivitas" id="nb_pola_aktivitas" class="custom-form clear-input d-inline-block col-lg-5" placeholder="Masukkan Pola Aktivitas dan Istirahat"></td>
												</tr>
												<tr>
													<td width="20%" class="bold">Pola Komunikasi</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="pola_komunikasi" id="pk_normal" value="Normal" class="mr-1" checked>Normal
														<input type="radio" name="pola_komunikasi" id="pk_introvert" value="Introvert" class="mr-1 ml-2">Introvert
														<input type="radio" name="pola_komunikasi" id="pk_extrovert" value="Extrovert" class="mr-1 ml-2">Extrovert
														<input type="radio" name="pola_komunikasi" id="pk_lain" value="Lain" class="mr-1 ml-2">Lain-lain
														<input type="text" name="pk_lain_input" id="pk_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Pola Makan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="pola_makan" id="pm_sehat" value="Sehat" class="mr-1" checked>Sehat
														<input type="radio" name="pola_makan" id="pm_tidak_sehat" value="Tidak Sehat" class="mr-1 ml-2">Tidak Sehat
														<span class="ml-5 bold">Makanan Pokok : </span>
														<input type="radio" name="makanan_pokok" id="mp_nasi" value="Nasi" class="mr-1 ml-2" checked>Nasi
														<input type="radio" name="makanan_pokok" id="mp_selain" value="Selain Nasi" class="mr-1 ml-2">Selain Nasi
														<input type="text" name="mp_selain_nasi_input" id="mp_selain_nasi_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan makanan pokok selain nasi">
													</td>
												</tr>
												<tr>
													<td class="bold">Pantang Makanan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="pantang_makanan" id="pantang_makanan_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pantang_makanan" id="pantang_makanan_ya" value="1" class="mr-1 ml-2">Ya, Sebutkan
														<input type="text" name="pantang_makanan_ya_input" id="pantang_makanan_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td class="bold">Konsumsi Makanan dari Luar</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="konsumsi_makanan_luar" id="konsumsi_makanan_luar_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="konsumsi_makanan_luar" id="konsumsi_makanan_luar_ya" value="1" class="mr-1 ml-2">Ya, Sebutkan
														<input type="text" name="konsumsi_makanan_luar_ya_input" id="konsumsi_makanan_luar_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td colspan="3" class="bold">Mempunyai pengaruh kepercayaan yang di anut terhadap penyakit :</td>
												</tr>
												<tr>
													<td colspan="3">
														<input type="radio" name="kepercayaan_penyakit" id="kepercayaan_penyakit_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kepercayaan_penyakit" id="kepercayaan_penyakit_ya" value="1" class="mr-1 ml-2">Ya 
														<input type="text" name="kepercayaan_penyakit_ya_input" id="kepercayaan_penyakit_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Identifikasi Kebutuhan Komunikasi, Edukasi -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kebutuhan-komunikasi-edukasi"><i class="fas fa-expand mr-1"></i>Expand</button>IDENTIFIKASI KEBUTUHAN KOMUNIKASI, BELAJAR/EDUKASI
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-kebutuhan-komunikasi-edukasi">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="15%" class="bold">Kewarganegaraan</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<input type="radio" name="kewarganegaraan" id="kewarganegaraan_wni" value="WNI" class="mr-1" checked>WNI
														<input type="radio" name="kewarganegaraan" id="kewarganegaraan_wna" value="WNA" class="mr-1 ml-2">WNA
													</td>
													<td></td>
													<td width="30%">Pemahaman tetang penyakit dan perawatan</td>
													<td width="1%"></td>
													<td width="19%">
														<input type="radio" name="pt_penyakit_perawatan" id="pt_penyakit_perawatan_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_penyakit_perawatan" id="pt_penyakit_perawatan_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Suku Bangsa</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="suku_bangsa" id="suku_bangsa" class="custom-form clear-input" placeholder="Masukkan suku bangsa">
													</td>
													<td></td>
													<td>Pemahaman tentang pengobatan</td>
													<td></td>
													<td>
														<input type="radio" name="pt_pengobatan" id="pt_pengobatan_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_pengobatan" id="pt_pengobatan_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Bicara</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="bicara" id="bicara_normal" value="Normal" class="mr-1" checked>Normal
														<input type="radio" name="bicara" id="bicara_gangguan" value="Gangguan Bicara" class="mr-1 ml-2">Gangguan Bicara, Jelaskan
														<input type="text" name="bicara_input" id="bicara_input" class="custom-form clear-input d-inline-block col-lg-5 disabled" placeholder="Jelaskan">
													</td>
													<td></td>
													<td>Pemahaman tentang nutrisi diet/gizi</td>
													<td></td>
													<td>
														<input type="radio" name="pt_nutrisi_diet" id="pt_nutrisi_diet_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_nutrisi_diet" id="pt_nutrisi_diet_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Perlu Penterjemah</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="perlu_penterjemah" id="perlu_penterjemah_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="perlu_penterjemah" id="perlu_penterjemah_ya" value="1" class="mr-1 ml-2">Ya, Bahasa
														<input type="text" name="perlu_penterjemah_input" id="perlu_penterjemah_input" class="custom-form clear-input d-inline-block col-lg-5 disabled" placeholder="Masukkan Bahasa">
													</td>
													<td></td>
													<td>Pemahaman tentang spiritual</td>
													<td></td>
													<td>
														<input type="radio" name="pt_spiritual" id="pt_spiritual_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_spiritual" id="pt_spiritual_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Bahasa Isyarat</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="bahasa_isyarat" id="bahasa_isyarat_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="bahasa_isyarat" id="bahasa_isyarat_ya" value="1" class="mr-1 ml-2">Ya
													</td>
													<td></td>
													<td>Pemahaman tentang peralatan medis</td>
													<td></td>
													<td>
														<input type="radio" name="pt_peralatan_medis" id="pt_peralatan_medis_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_peralatan_medis" id="pt_peralatan_medis_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td></td>
													<td></td>
													<td>Pemahaman tentang rehab medik</td>
													<td></td>
													<td>
														<input type="radio" name="pt_rehab_medik" id="pt_rehab_medik_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_rehab_medik" id="pt_rehab_medik_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td></td>
													<td></td>
													<td>Pemahaman tentang manajemen nyeri</td>
													<td></td>
													<td>
														<input type="radio" name="pt_manajemen_nyeri" id="pt_manajemen_nyeri_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_manajemen_nyeri" id="pt_manajemen_nyeri_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Hambatan Untuk Menerima Edukasi -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-hambatan-menerima-edukasi"><i class="fas fa-expand mr-1"></i>Expand</button>HAMBATAN UNTUK MENERIMA EDUKASI
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-hambatan-menerima-edukasi">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="50%"><input type="checkbox" name="hambatan_edukasi_1" id="hambatan_edukasi_1" value="1" class="mr-1">Tidak Ada</td>
													<td width="50%"><input type="checkbox" name="hambatan_edukasi_6" id="hambatan_edukasi_6" value="1" class="mr-1">Ada Gangguan Pendengaran</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="hambatan_edukasi_2" id="hambatan_edukasi_2" value="1" class="mr-1">Ada Gangguan Emosi</td>
													<td><input type="checkbox" name="hambatan_edukasi_7" id="hambatan_edukasi_7" value="1" class="mr-1">Buta Huruf</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="hambatan_edukasi_3" id="hambatan_edukasi_3" value="1" class="mr-1">Ada Keterbatasan Dalam Hal Budaya/Spiritual/Agama</td>
													<td><input type="checkbox" name="hambatan_edukasi_8" id="hambatan_edukasi_8" value="1" class="mr-1">Ada Gangguan Kognitif</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="hambatan_edukasi_4" id="hambatan_edukasi_4" value="1" class="mr-1">Ada Gangguan Penglihatan</td>
													<td><input type="checkbox" name="hambatan_edukasi_9" id="hambatan_edukasi_9" value="1" class="mr-1">Keterbatasan Motivasi</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="hambatan_edukasi_5" id="hambatan_edukasi_5" value="1" class="mr-1">Ada Gangguan Fisik</td>
													<td><input type="checkbox" name="hambatan_edukasi_10" id="hambatan_edukasi_10" value="1" class="mr-1">Ada Keterbatasan Dalam Berbahasa</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Skrining Nutrisi -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skrining-nutrisi"><i class="fas fa-expand mr-1"></i>Expand</button>SKRINING NUTRISI <i>(Mainutrition Screening Tool Modifikasi)</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-skrining-nutrisi">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td class="center bold">Indikator Penilaian Nutrisi</td>
													<td class="center bold">Penilaian</td>
												</tr>
												<tr>
													<td colspan="2" class="bold">Apakah pasien mengalami penurunan berat badan yang tidak direncanakan / tidak disengaja dalam 6 bulan terakhir</td>
												</tr>
												<tr>
													<td width="90%"><input type="radio" name="sn_penurunan_bb" id="sn_tidak" class="mr-1" value="1" onchange="calcscore()" checked>Tidak</td>
													<td>Skor 0</td>
												</tr>
												<tr>
													<td><input type="radio" name="sn_penurunan_bb" id="sn_tidak_yakin" class="mr-1" value="2" onchange="calcscore()">Tidak Yakin</td>
													<td>Skor 2</td>
												</tr>
												<tr>
													<td><input type="radio" name="sn_penurunan_bb" id="sn_ya" class="mr-1" value="3" onchange="calcscore()">Ya, ada penurunan BB sebanyak</td>
													<td></td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_1" class="mr-1" value="1" onchange="calcscore()">1 - 5 Kg</td>
													<td>Skor 1</td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_2" class="mr-1" value="2" onchange="calcscore()">6 - 10 Kg</td>
													<td>Skor 2</td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_3" class="mr-1" value="3" onchange="calcscore()">11 - 15 Kg</td>
													<td>Skor 3</td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_4" class="mr-1" value="4" onchange="calcscore()">> 15 Kg</td>
													<td>Skor 4</td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_5" class="mr-1" value="5" onchange="calcscore()">Tidak tahu berapa Kg penurunannya</td>
													<td>Skor 2</td>
												</tr>
												<tr style="border-bottom: 1px solid black;">
													<td></td><td></td>
												</tr>
												<tr>
													<td colspan="2" class="bold">Apakah asupan makan pasien berkurang karena penurunan nafsu makan (atau karena kesulitan menerima makanan) ?</td>
												</tr>
												<tr>
													<td><input type="radio" name="sn_asupan_makan" id="sn_asupan_makan_tidak" class="mr-1" value="0" onchange="calcscore()" checked>Tidak</td>
													<td>Skor 0</td>
												</tr>
												<tr>
													<td><input type="radio" name="sn_asupan_makan" id="sn_asupan_makan_ya" class="mr-1" value="1" onchange="calcscore()">Ya</td>
													<td>Skor 1</td>
												</tr>
												<tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
													<td><b>Total Skor Skrining MST (Mainutrition Screening Tool)</b></td>
													<td><input type="number" name="sn_total" id="sn-total" class="custom-form" value="0" readonly></td>
												</tr>
												<tr>
													<td colspan="2">Jika skor ≥ 2 : pasien mengalami resiko gizi kurang, (dilaporkan ke dokter jaga ruangan / DPJP untuk konfirmasi ke dietisin)</td>
												</tr>
												<tr>
													<td colspan="2">Jika skor < 2 dengan jenis penyakit tertentu, (dilaporkan ke dokter jaga ruangan / DPJP untuk konfirmasi ke dietisin)</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Penilaian Kemampuan Fungsional -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-kemampuan-fungsional"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN KEMAMPUAN FUNGSIONAL <i>(Indeks Barthel)</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-penilaian-kemampuan-fungsional">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="90%" class="bold center">Aktifitas Yang Dinilai</td>
													<td width="10%" class="bold center">Nilai</td>
												</tr>
												<tr>
													<td>
														<span class="bold">Makan</span><br>
														<input type="radio" name="pkf_makan" id="pkf_makan_1" value="0" class="mr-1 calc_pkf">0 : Tidak Mampu<br>
														<input type="radio" name="pkf_makan" id="pkf_makan_2" value="5" class="mr-1 calc_pkf">5 : Dibantu (makan dipotong-potong dahulu)<br>
														<input type="radio" name="pkf_makan" id="pkf_makan_3" value="10" class="mr-1 calc_pkf">10 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_makan" id="nilai_pkf_makan" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_0" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Mandi</span><br>
														<input type="radio" name="pkf_mandi" id="pkf_mandi_1" value="0" class="mr-1 calc_pkf">0 : Dibantu<br>
														<input type="radio" name="pkf_mandi" id="pkf_mandi_2" value="5" class="mr-1 calc_pkf">5 : Mandiri (menggunakan shower)<br>
													</td>
													<td><input type="number" name="nilai_pkf_mandi" id="nilai_pkf_mandi" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_1" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Personal Hygiene (Cuci Muka, Menyisir Rambut, Bercukur Jenggot, Gosok Gigi)</span><br>
														<input type="radio" name="pkf_personal" id="pkf_personal_1" value="0" class="mr-1 calc_pkf">0 : Dibantu<br>
														<input type="radio" name="pkf_personal" id="pkf_personal_2" value="5" class="mr-1 calc_pkf">5 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_personal" id="nilai_pkf_personal" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_2" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Berpakaian (Termasuk Mengenakan Sepatu)</span><br>
														<input type="radio" name="pkf_berpakaian" id="pkf_berpakaian_1" value="0" class="mr-1 calc_pkf">0 : Dibantu Seluruhnya<br>
														<input type="radio" name="pkf_berpakaian" id="pkf_berpakaian_2" value="5" class="mr-1 calc_pkf">5 : Dibantu Sebagian<br>
														<input type="radio" name="pkf_berpakaian" id="pkf_berpakaian_3" value="10" class="mr-1 calc_pkf">10 : Mandiri (Termasuk Mengancing Baju, Memakai Tali Sepatu dan Resleting)<br>
													</td>
													<td><input type="number" name="nilai_pkf_berpakaian" id="nilai_pkf_berpakaian" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_3" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Buang Air Besar (BAB)</span><br>
														<input type="radio" name="pkf_bab" id="pkf_bab_1" value="0" class="mr-1 calc_pkf">0 : Tidak Dapat Mengontrol (perlu diberikan enema)<br>
														<input type="radio" name="pkf_bab" id="pkf_bab_2" value="5" class="mr-1 calc_pkf">5 : Kadang Mengalami Kecelakaan<br>
														<input type="radio" name="pkf_bab" id="pkf_bab_3" value="10" class="mr-1 calc_pkf">10 : Mampu Mengontrol BAB<br>
													</td>
													<td><input type="number" name="nilai_pkf_bab" id="nilai_pkf_bab" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_4" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Buar Air Kecil (BAK)</span><br>
														<input type="radio" name="pkf_bak" id="pkf_bak_1" value="0" class="mr-1 calc_pkf">0 : Tidak Dapat Mengontrol BAK dan Menggunakan Kateter<br>
														<input type="radio" name="pkf_bak" id="pkf_bak_2" value="5" class="mr-1 calc_pkf">5 : Kadang Mengalami Kecelakaan<br>
														<input type="radio" name="pkf_bak" id="pkf_bak_3" value="10" class="mr-1 calc_pkf">10 : Mampu Mengontrol BAK<br>
													</td>
													<td><input type="number" name="nilai_pkf_bak" id="nilai_pkf_bak" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_5" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Berpindah (Dari Tempat Tidur ke Kursi dan Sebaliknya)</span><br>
														<input type="radio" name="pkf_berpindah" id="pkf_berpindah_1" value="0" class="mr-1 calc_pkf">0 : Tidak Ada Keseimbangan Untuk Duduk<br>
														<input type="radio" name="pkf_berpindah" id="pkf_berpindah_2" value="5" class="mr-1 calc_pkf">5 : Dibantu Satu atau Dua Orang dan Bisa Duduk<br>
														<input type="radio" name="pkf_berpindah" id="pkf_berpindah_3" value="10" class="mr-1 calc_pkf">10 : Dibantu (Lisan atau Fisik)<br>
														<input type="radio" name="pkf_berpindah" id="pkf_berpindah_4" value="15" class="mr-1 calc_pkf">15 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_berpindah" id="nilai_pkf_berpindah" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_6" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Toiletting (Masuk Keluar Toilet Sendiri)</span><br>
														<input type="radio" name="pkf_toiletting" id="pkf_toiletting_1" value="0" class="mr-1 calc_pkf">0 : Dibantu Seluruhnya<br>
														<input type="radio" name="pkf_toiletting" id="pkf_toiletting_2" value="5" class="mr-1 calc_pkf">5 : Dibantu Sebagian<br>
														<input type="radio" name="pkf_toiletting" id="pkf_toiletting_3" value="10" class="mr-1 calc_pkf">10 : Mandiri (melepas atau memakai pakaian, menyiram WC, membersihkan organ kelamin)<br>
													</td>
													<td><input type="number" name="nilai_pkf_toiletting" id="nilai_pkf_toiletting" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_7" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Mobilisasi (Berjalan di Permukaan Datar)</span><br>
														<input type="radio" name="pkf_mobilisasi" id="pkf_mobilisasi_1" value="0" class="mr-1 calc_pkf">0 : Tidak Dapat Berjalan<br>
														<input type="radio" name="pkf_mobilisasi" id="pkf_mobilisasi_2" value="5" class="mr-1 calc_pkf">5 : Menggunakan Kursi Roda<br>
														<input type="radio" name="pkf_mobilisasi" id="pkf_mobilisasi_3" value="10" class="mr-1 calc_pkf">10 : Berjalan dengan Bantuan Satu Orang<br>
														<input type="radio" name="pkf_mobilisasi" id="pkf_mobilisasi_4" value="15" class="mr-1 calc_pkf">15 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_mobilisasi" id="nilai_pkf_mobilisasi" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_8" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Naik dan Turun Tangga</span><br>
														<input type="radio" name="pkf_naikturuntangga" id="pkf_naikturuntangga_1" value="0" class="mr-1 calc_pkf">0 : Tidak Mampu<br>
														<input type="radio" name="pkf_naikturuntangga" id="pkf_naikturuntangga_2" value="5" class="mr-1 calc_pkf">5 : Dibantu Menggunakan Tongkat<br>
														<input type="radio" name="pkf_naikturuntangga" id="pkf_naikturuntangga_3" value="10" class="mr-1 calc_pkf">10 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_naikturuntangga" id="nilai_pkf_naikturuntangga" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_9" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td colspan="2"></td>
												</tr>
												<tr>
													<td class="bold">JUMLAH SKOR</td>
													<td><input type="number" name="total_nilai_pkf" id="total_nilai_pkf" class="custom-form center clear-input" min="0" value="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr><td colspan="2"></td></tr>
												<tr>
													<td colspan="2">
														<span class="bold">Keterangan :</span><br>
														<span class="ml-4">0 - 20 : Ketergantungan Penuh</span><br>
														<span class="ml-4">21 - 62 : Ketergantungan Berat</span><br>
														<span class="ml-4">62 - 90 : Ketergantungan Sedang</span><br>
														<span class="ml-4">91 - 99 : Ketergantungan Ringan</span><br>
														<span class="ml-4">100 : Mandiri</span>
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Penilaian Tingkat Nyeri dan Resiko Jatuh Dewasa -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-tingkat-nyeri-dan-resiko-jatuh-dewasa"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN TINGKAT NYERI DAN RESIKO JATUH DEWASA</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-penilaian-tingkat-nyeri-dan-resiko-jatuh-dewasa">
											<div class="row">
												<div class="col-lg-6">
													<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
														<tr>
															<td colspan="3" class="bold center">Penilaian Tingkat Nyeri</td>
														</tr>
														<tr>
															<td colspan="3"><img src="<?= resource_url() ?>images/attributes/pain-measurement-scale-hd.png" alt="Pain Measurement Scale" class="img-fluid mx-auto d-block rounded shadow"></td>
														</tr>
														<tr><td colspan="3"></td></tr>
														<tr><td colspan="3"></td></tr>
														<tr>
															<td width="20%" class="bold">Keterangan</td>
															<td width="1%" class="bold">:</td>
															<td width="69%">
																<input type="radio" name="ptn_keterangan" id="ptn_keterangan_ringan" value="Ringan" class="mr-1">Ringan : 1 - 3 
																<input type="radio" name="ptn_keterangan" id="ptn_keterangan_sedang" value="Sedang" class="mr-1">Sedang : 4 - 6 
																<input type="radio" name="ptn_keterangan" id="ptn_keterangan_berat" value="Berat" class="mr-1">Berat : 7 - 10
															</td>
														</tr>
														<tr>
															<td class="bold">Nyeri Hilang, Bila</td>
															<td class="bold">:</td>
															<td>
																<input type="checkbox" name="ptn_minum_obat" id="ptn_minum_obat" value="1" class="mr-1">Minum Obat
																<input type="checkbox" name="ptn_mendengarkan_musik" id="ptn_mendengarkan_musik" value="1" class="mr-1 ml-2">Mendengarkan Musik
																<input type="checkbox" name="ptn_istirahat" id="ptn_istirahat" value="1" class="mr-1 ml-2">Istirahat
															</td>
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td>
																<input type="checkbox" name="ptn_berubah_posisi" id="ptn_berubah_posisi" value="1" class="mr-1">Berubah Posisi / Tidur
																<input type="checkbox" name="ptn_lain" id="ptn_lain" value="1" class="mr-1 ml-2">Lain-lain
																<input type="text" name="ptn_lain_input" id="ptn_lain_input" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain - lain">
															</td>
														</tr>
													</table>
												</div>
												<div class="col-lg-6">
													<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
														<tr>
															<td colspan="3" class="bold center">Penilaian Resiko Jatuh Dewasa</td>
														</tr>
													</table>
													<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
														<thead>
															<tr>
																<th width="60%" class="center"><b>Parameter</b></th>
																<th width="20%" class="center"><b>Nilai</b></th>
																<th width="20%" class="center"><b>Skor</b></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td rowspan="2">Riwayat jatuh dalam waktu 3 bulan sebab apapun</td>
																<td><input type="radio" name="prjd_riwayat_jatuh" id="prjd_riwayat_jatuh_ya" value="25" class="mr-1" onchange="calcscorepjd()">Ya</td>
																<td class="center">25</td>
															</tr>
															<tr>
																<td><input type="radio" name="prjd_riwayat_jatuh" id="prjd_riwayat_jatuh_tidak" value="0" class="mr-1" onchange="calcscorepjd()" checked>Tidak</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td rowspan="2">Diagnosis Sekunder (≥ Diagnosis Medis)</td>
																<td><input type="radio" name="prjd_diagnosis_sekunder" id="prjd_diagnosis_sekunder_ya" value="15" class="mr-1" onchange="calcscorepjd()">Ya</td>
																<td class="center">15</td>
															</tr>
															<tr>
																<td><input type="radio" name="prjd_diagnosis_sekunder" id="prjd_diagnosis_sekunder_tidak" value="0" class="mr-1" onchange="calcscorepjd()" checked>Tidak</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td colspan="3">Alat Bantu Jalan</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="alat_bantu_jalan_1" id="alat_bantu_jalan_1" value="1" class="mr-1">Tidak Ada / Kursi Roda</td>
																<td><input type="radio" name="alat_bantu_jalan_1_ya" id="alat_bantu_jalan_1_ya" value="0" class="mr-1 disabled" onchange="calcscorepjd()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="alat_bantu_jalan_2" id="alat_bantu_jalan_2" value="1" class="mr-1">Kruk / Tongkat / Walker</td>
																<td><input type="radio" name="alat_bantu_jalan_2_ya" id="alat_bantu_jalan_2_ya" value="15" class="mr-1 disabled" onchange="calcscorepjd()">Ya</td>
																<td class="center">15</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="alat_bantu_jalan_3" id="alat_bantu_jalan_3" value="1" class="mr-1">Berpegangan pada benda-benda disekitar / Furniture</td>
																<td><input type="radio" name="alat_bantu_jalan_3_ya" id="alat_bantu_jalan_3_ya" value="30" class="mr-1 disabled" onchange="calcscorepjd()">Ya</td>
																<td class="center">30</td>
															</tr>
															<tr>
																<td rowspan="2">Terpasang Infus / Heparin Lock</td>
																<td><input type="radio" name="prjd_terpasang_infus" id="prjd_terpasang_infus_ya" value="20" class="mr-1" onchange="calcscorepjd()">Ya</td>
																<td class="center">20</td>
															</tr>
															<tr>
																<td><input type="radio" name="prjd_terpasang_infus" id="prjd_terpasang_infus_tidak" value="0" class="mr-1" onchange="calcscorepjd()" checked>Tidak</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td colspan="3">Cara Berjalan atau Berpindah</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="cara_berjalan_1" id="cara_berjalan_1" value="1" class="mr-1">Normal / Bedrest / Imobilisasi</td>
																<td><input type="radio" name="cara_berjalan_1_ya" id="cara_berjalan_1_ya" value="0" class="mr-1 disabled" onchange="calcscorepjd()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="cara_berjalan_2" id="cara_berjalan_2" value="1" class="mr-1">Lemah</td>
																<td><input type="radio" name="cara_berjalan_2_ya" id="cara_berjalan_2_ya" value="10" class="mr-1 disabled" onchange="calcscorepjd()">Ya</td>
																<td class="center">10</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="cara_berjalan_3" id="cara_berjalan_3" value="1" class="mr-1">Terganggu</td>
																<td><input type="radio" name="cara_berjalan_3_ya" id="cara_berjalan_3_ya" value="20" class="mr-1 disabled" onchange="calcscorepjd()">Ya</td>
																<td class="center">20</td>
															</tr>
															<tr>
																<td colspan="3">Status Mental</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="status_mental_1" id="status_mental_1" value="1" class="mr-1">Sadar Akan Kemampuan Diri Sendiri</td>
																<td><input type="radio" name="status_mental_1_ya" id="status_mental_1_ya" value="0" class="mr-1 disabled" onchange="calcscorepjd()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="status_mental_2" id="status_mental_2" value="1" class="mr-1">Sering Lupa akan Keterbatasan Yang dimiliki</td>
																<td><input type="radio" name="status_mental_2_ya" id="status_mental_2_ya" value="15" class="mr-1 disabled" onchange="calcscorepjd()">Ya</td>
																<td class="center">15</td>
															</tr>
															<tr>
																<td colspan="2" class="bold">JUMLAH SKOR</td>
																<td class="center"><input type="number" min="0" name="prjd_jumlah_skor" id="prjd_jumlah_skor" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
															</tr>
														</tbody>
													</table>
													<table class="table table-no-border table-sm table-striped" style="margin-top:15px">
														<tr>
															<td>
																<span class="bold">Keterangan</span><br>
																<span class="ml-3">Tidak Beresiko : 0 - 24</span><br>
																<span class="ml-3">Resiko Rendah : 25 - 50</span><br>
																<span class="ml-3">Resiko Tinggi : ≥ 51</span>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</div>

										<!-- Row Data Penilaian Resiko Jatuh Lansia (Usia > 60 th) -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-resiko-jatuh-lansia"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN RESIKO JATUH LANSIA <i>(Usia > 60 th)</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-penilaian-resiko-jatuh-lansia">
											<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
												<thead>
													<tr>
														<th class="center" width="5%"><b>No.</b></th>
														<th class="center" width="20%"><b>Parameter</b></th>
														<th class="center" width="45%"><b>Skrining</b></th>
														<th class="center" width="15"><b>Jawaban (Pilih)</b></th>
														<th class="center" width="15%"><b>Keterangan Nilai</b></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th rowspan="2" class="center v-center">1.</th>
														<td rowspan="2">Riwayat Jatuh</td>
														<td>Apakah pasien datang ke RS karena jatuh ?</td>
														<td class="center">
															<input type="radio" name="prjl_riwayat_jatuh" id="prjl_riwayat_jatuh_ya" value="6" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_riwayat_jatuh" id="prjl_riwayat_jatuh_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
														<td rowspan="2">Salah satu jawabannya = 6</td>
													</tr>
													<tr>
														<td>Jika Tidak, Apakah pasien mengalami jatuh dalam 2 bulan terakhir ini ?</td>
														<td class="center">
															<input type="radio" name="prjl_riwayat_jatuh_opt" id="prjl_riwayat_jatuh_opt_ya" value="6" class="mr-1" disabled onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_riwayat_jatuh_opt" id="prjl_riwayat_jatuh_opt_tidak" value="0" class="mr-1 ml-3" disabled checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<th rowspan="3" class="center v-center">2.</th>
														<td rowspan="3">Status Mental</td>
														<td>Apakah pasien delirium ? (Tidak dapat membuat keputusan, pola pikir tidak terorganisir, gangguan daya ingat)</td>
														<td class="center">
															<input type="radio" name="prjl_status_mental" id="prjl_status_mental_ya" value="14" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_status_mental" id="prjl_status_mental_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
														<td rowspan="3">Salah satu jawabannya = 14</td>
													</tr>
													<tr>
														<td>Apakah pasien disorientasi ? (Salah menyebutkan waktu, tempat atau orang)</td>
														<td class="center">
															<input type="radio" name="prjl_status_mental_opt_1" id="prjl_status_mental_opt_1_ya" value="14" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_status_mental_opt_1" id="prjl_status_mental_opt_1_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<td>Apakah pasien mengalami agitasi ? (Ketakutan, gelisah dan cemas)</td>
														<td class="center">
															<input type="radio" name="prjl_status_mental_opt_2" id="prjl_status_mental_opt_2_ya" value="14" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_status_mental_opt_2" id="prjl_status_mental_opt_2_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<th rowspan="3" class="center v-center">3.</th>
														<td rowspan="3">Penglihatan</td>
														<td>Apakah pasien memakai kacamata ?</td>
														<td class="center">
															<input type="radio" name="prjl_penglihatan" id="prjl_penglihatan_ya" value="1" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_penglihatan" id="prjl_penglihatan_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
														<td rowspan="3">Salah satu jawabannya = 1</td>
													</tr>
													<tr>
														<td>Apakah pasien mengeluh adanya penglihatan buram ?</td>
														<td class="center">
															<input type="radio" name="prjl_penglihatan_opt_1" id="prjl_penglihatan_opt_1_ya" value="1" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_penglihatan_opt_1" id="prjl_penglihatan_opt_1_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<td>Apakah pasien mempunyai galukoma ? Katarak / degenarasi makula</td>
														<td class="center">
															<input type="radio" name="prjl_penglihatan_opt_2" id="prjl_penglihatan_opt_2_ya" value="1" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_penglihatan_opt_2" id="prjl_penglihatan_opt_2_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<th class="center v-center">4.</th>
														<td>Kebiasaan Berkemih</td>
														<td>Apakah terdapat perubahan perilaku berkemih ? (Frekuensi, urgensi, inkontinensia, nokturia)</td>
														<td class="center">
															<input type="radio" name="prjl_berkemih" id="prjl_berkemih_ya" value="2" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_berkemih" id="prjl_berkemih_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
														<td>Salah satu jawabannya = 2</td>
													</tr>
													<tr>
														<th rowspan="4" class="center v-center">5.</th>
														<td rowspan="4">Transfer dari tempat tidur kekurasi dan kembali lagi ketempat tidur</td>
														<td>Mandiri (Boleh memakai alat bantu jalan)</td>
														<td class="center">
															<input type="radio" name="prjl_transfer" id="prjl_transfer_1" value="0" class="mr-1" checked onchange="calcscoreprjl()">0
														</td>
														<td rowspan="8">Jumlah nilai transfer dan mobilitas jika nilai total 0 - 3 = 0, nilai total 4 - 6 = 7</td>
													</tr>
													<tr>
														<td>Memerlukan sedikit bantuan (1 orang) / dalam pengawasan</td>
														<td class="center">
															<input type="radio" name="prjl_transfer" id="prjl_transfer_2" value="1" class="mr-1" onchange="calcscoreprjl()">1
														</td>
													</tr>
													<tr>
														<td>Memerlukan bantuan yang nyata (2 orang)</td>
														<td class="center">
															<input type="radio" name="prjl_transfer" id="prjl_transfer_3" value="2" class="mr-1" onchange="calcscoreprjl()">2
														</td>
													</tr>
													<tr>
														<td>Tidak dapat duduk dengan seimbang, perlu bantuan total</td>
														<td class="center">
															<input type="radio" name="prjl_transfer" id="prjl_transfer_4" value="3" class="mr-1" onchange="calcscoreprjl()">3
														</td>
													</tr>
													<tr>
														<th rowspan="4" class="center v-center">6.</th>
														<td rowspan="4">Mobilitas</td>
														<td>Mandiri (Boleh memakai alat bantu jalan)</td>
														<td class="center">
															<input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_1" value="0" class="mr-1" checked onchange="calcscoreprjl()">0
														</td>
													</tr>
													<tr>
														<td>Berjalan dengan bantuan 1 orang (verbal / fisik)</td>
														<td class="center">
															<input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_2" value="1" class="mr-1" onchange="calcscoreprjl()">1
														</td>
													</tr>
													<tr>
														<td>Menggunakan kursi roda</td>
														<td class="center">
															<input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_3" value="2" class="mr-1" onchange="calcscoreprjl()">2
														</td>
													</tr>
													<tr>
														<td>Imobilisasi</td>
														<td class="center">
															<input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_4" value="3" class="mr-1" onchange="calcscoreprjl()">3
														</td>
													</tr>
													<tr>
														<td colspan="3" class="bold center">TOTAL</td>
														<td><input type="number" name="prjl_jumlah" id="prjl_jumlah" class="custom-form clear-input center" placeholder="Jumlah" readonly></td>
														<td></td>
													</tr>
													<tr>
														<td colspan="5">
															<span class="bold">Keterangan : </span><br>
															<span class="ml-3">0 - 5 = Resiko Rendah</span><br>
															<span class="ml-3">6 - 16 = Resiko Sedang</span><br>
															<span class="ml-3">17 - 30 = Resiko Tinggi</span><br>
														</td>
													</tr>
												</tbody>
											</table>
										</div>

										<!-- Row Data Skrining Pasien Akhir Kedidupan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skrining-pasien-akhir-kehidupan"><i class="fas fa-expand mr-1"></i>Expand</button>SKRINING PASIEN AKHIR KEHIDUPAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-skrining-pasien-akhir-kehidupan">
											<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
												<thead>
													<tr>
														<th width="5%" class="center"><b>No.</b></th>
														<th width="75%" class="center"><b>Kriteria</b></th>
														<th width="10%" class="center"><b>Ya</b></th>
														<th width="10%" class="center"><b>Tidak</b></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="center">1.</td>
														<td>Usia lebih dari 80 tahun</td>
														<td class="center"><input type="radio" name="spak_1" id="spak_1_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_1" id="spak_1_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td class="center">2.</td>
														<td>Pasien mengalami gagal nafas</td>
														<td class="center"><input type="radio" name="spak_2" id="spak_2_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_2" id="spak_2_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td class="center">3.</td>
														<td>Pasien mengalami sepsis</td>
														<td class="center"><input type="radio" name="spak_3" id="spak_3_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_3" id="spak_3_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td class="center">4.</td>
														<td>Pasien mengalami gagal organ multiple</td>
														<td class="center"><input type="radio" name="spak_4" id="spak_4_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_4" id="spak_4_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td class="center">5.</td>
														<td>Pasien dengan karsinoma stadium 4</td>
														<td class="center"><input type="radio" name="spak_5" id="spak_5_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_5" id="spak_5_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td colspan="4">Bila mana pasien memenuhi setidaknya tiga dari kondisi tersebut, maka dilakukan pelayanan pasien akhir kehidupan</td>
													</tr>
												</tbody>
											</table>
										</div>

										<!-- Row Data Populasi Khusus (Isi Sesuai Kebutuhan Pasien) -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-populasi-khusus"><i class="fas fa-expand mr-1"></i>Expand</button>POPULASI KHUSUS (ISI SESUAI KEBUTUHAN PASIEN)
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-populasi-khusus">
											<table class="table table-sm table-striped" style="margin-top: -15px">
												<tr>
													<td width="2%"><b>A.</b></td>
													<td width="55%"><b>Geriatri</b></td>
													<td width="43%"></td>
												</tr>
												<tr>
													<td></td>
													<td>1. Gangguan Penglihatan</td>
													<td>
														<input type="radio" name="pk_geriatri_1" id="pk_geriatri_1_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_1" id="pk_geriatri_1_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_geriatri_1_input" id="pk_geriatri_1_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>2. Gangguan Pendengaran</td>
													<td>
														<input type="radio" name="pk_geriatri_2" id="pk_geriatri_2_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_2" id="pk_geriatri_2_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_geriatri_2_input" id="pk_geriatri_2_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>3. Gangguan Berkemih</td>
													<td>
														<input type="radio" name="pk_geriatri_3" id="pk_geriatri_3_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_3" id="pk_geriatri_3_ya" value="1" class="mr-1 ml-4">Ya
														<input type="checkbox" name="pk_geriatri_inkontinensia" id="pk_geriatri_inkontinensia" value="1" class="mr-1 ml-2 disabled">Inkontinensia
														<input type="checkbox" name="pk_geriatri_disuria" id="pk_geriatri_disuria" value="1" class="mr-1 ml-2 disabled">Disuria
														<input type="checkbox" name="pk_geriatri_oliguria" id="pk_geriatri_oliguria" value="1" class="mr-1 ml-2 disabled">Oliguria
														<input type="checkbox" name="pk_geriatri_anuria" id="pk_geriatri_anuria" value="1" class="mr-1 ml-2 disabled">Anuria
													</td>
												</tr>
												<tr>
													<td></td>
													<td>4. Gangguan Daya Ingat</td>
													<td>
														<input type="radio" name="pk_geriatri_4" id="pk_geriatri_4_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_4" id="pk_geriatri_4_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_geriatri_4_input" id="pk_geriatri_4_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>5. Gangguan Bicara</td>
													<td>
														<input type="radio" name="pk_geriatri_5" id="pk_geriatri_5_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_5" id="pk_geriatri_5_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_geriatri_5_input" id="pk_geriatri_5_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td><b>B.</b></td>
													<td><b>Penyakit Menular</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>1. Pasien mengetahui penyakit saat ini</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_1" id="pk_penyakit_menular_1_ya" value="1" class="mr-1">Tahu
														<input type="radio" name="pk_penyakit_menular_1" id="pk_penyakit_menular_1_tidak" value="0" class="mr-1 ml-4" checked>Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>2. Sumber informasi tentang penyakit diperoleh dari</td>
													<td>
														<input type="checkbox" name="pk_pm_dokter" id="pk_pm_dokter" value="1" class="mr-1">Dokter
														<input type="checkbox" name="pk_pm_perawat" id="pk_pm_perawat" value="1" class="mr-1 ml-2">Perawat
														<input type="checkbox" name="pk_pm_keluarga" id="pk_pm_keluarga" value="1" class="mr-1 ml-2">Keluarga
														<input type="checkbox" name="pk_pm_lain" id="pk_pm_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="pk_pm_lain_input" id="pk_pm_lain_input" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain-lain">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>3. Menerima informasi jangka waktu pengobatan</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_3" id="pk_penyakit_menular_3_ya" value="1" class="mr-1">Ya
														<input type="text" name="pk_penyakit_menular_3_input" id="pk_penyakit_menular_3_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="Minggu/Bulan/Tahun">
														<input type="radio" name="pk_penyakit_menular_3" id="pk_penyakit_menular_3_tidak" value="0" class="mr-1 ml-4" checked>Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>4. Melakukan pemeriksaan rutin</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_4" id="pk_penyakit_menular_4_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_penyakit_menular_4" id="pk_penyakit_menular_4_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_menular_4_input" id="pk_penyakit_menular_4_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>5. Cara Penularan</td>
													<td>
														<input type="checkbox" name="pk_pm_airbone" id="pk_pm_airbone" value="1" class="mr-1">Airbone
														<input type="checkbox" name="pk_pm_droplet" id="pk_pm_droplet" value="1" class="mr-1 ml-2">Perawat
														<input type="checkbox" name="pk_pm_kontak_langsung" id="pk_pm_kontak_langsung" value="1" class="mr-1 ml-2">Kontak Langsung
														<input type="checkbox" name="pk_pm_cairan_tubuh" id="pk_pm_cairan_tubuh" value="1" class="mr-1 ml-2">Cairan Tubuh
													</td>
												</tr>
												<tr>
													<td></td>
													<td>6. Penyakit Penyerta</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_6" id="pk_penyakit_menular_6_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_penyakit_menular_6" id="pk_penyakit_menular_6_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_menular_6_input" id="pk_penyakit_menular_6_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td><b>C.</b></td>
													<td><b>Penyakit Penurunan Daya Tahan Tubuh</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>1. Pasien mengetahui penyakit saat ini</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_1" id="pk_penyakit_pdtt_1_ya" value="1" class="mr-1">Tahu
														<input type="radio" name="pk_penyakit_pdtt_1" id="pk_penyakit_pdtt_1_tidak" value="0" class="mr-1 ml-4" checked>Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>2. Sumber informasi tentang penyakit diperoleh dari</td>
													<td>
														<input type="checkbox" name="pk_pdtt_dokter" id="pk_pdtt_dokter" value="1" class="mr-1">Dokter
														<input type="checkbox" name="pk_pdtt_perawat" id="pk_pdtt_perawat" value="1" class="mr-1 ml-2">Perawat
														<input type="checkbox" name="pk_pdtt_keluarga" id="pk_pdtt_keluarga" value="1" class="mr-1 ml-2">Keluarga
														<input type="checkbox" name="pk_pdtt_lain" id="pk_pdtt_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="pk_pdtt_lain_input" id="pk_pdtt_lain_input" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain-lain">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>3. Menerima informasi jangka waktu pengobatan</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_3" id="pk_penyakit_pdtt_3_ya" value="1" class="mr-1">Ya
														<input type="text" name="pk_penyakit_pdtt_3_input" id="pk_penyakit_pdtt_3_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="Minggu/Bulan/Tahun">
														<input type="radio" name="pk_penyakit_pdtt_3" id="pk_penyakit_pdtt_3_tidak" value="0" class="mr-1 ml-4" checked>Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>4. Melakukan pemeriksaan rutin</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_4" id="pk_penyakit_pdtt_4_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_penyakit_pdtt_4" id="pk_penyakit_pdtt_4_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_pdtt_4_input" id="pk_penyakit_pdtt_4_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>6. Penyakit Penyerta</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_5" id="pk_penyakit_pdtt_5_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_penyakit_pdtt_5" id="pk_penyakit_pdtt_5_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_pdtt_5_input" id="pk_penyakit_pdtt_5_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td><b>D.</b></td>
													<td><b>Kesehatan Jiwa</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>Pernah mengalami gangguan jiwa sebelumnya</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_1" id="pk_kesehatan_jiwa_1_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_1" id="pk_kesehatan_jiwa_1_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Riwayat pengobatan sebelumnya</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_2" id="pk_kesehatan_jiwa_2_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_2" id="pk_kesehatan_jiwa_2_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Adakah anggota keluarga yang mengalami gangguan jiwa serupa</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_3" id="pk_kesehatan_jiwa_3_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_3" id="pk_kesehatan_jiwa_3_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah pasien bisa merawat dirinya sendiri</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_4" id="pk_kesehatan_jiwa_4_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_4" id="pk_kesehatan_jiwa_4_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah pasien dapat berkomunikasi dengan baik</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_5" id="pk_kesehatan_jiwa_5_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_5" id="pk_kesehatan_jiwa_5_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah bicara pasien dapat dipahami oleh perawat / dokter</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_6" id="pk_kesehatan_jiwa_6_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_6" id="pk_kesehatan_jiwa_6_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Adakah resiko mencederai diri sendiri</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_7" id="pk_kesehatan_jiwa_7_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_7" id="pk_kesehatan_jiwa_7_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Adakah resiko mencederai orang lain</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_8" id="pk_kesehatan_jiwa_8_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_8" id="pk_kesehatan_jiwa_8_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah pasien dapat memahami instruksi dokter atau perawat dengan baik</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_9" id="pk_kesehatan_jiwa_9_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_9" id="pk_kesehatan_jiwa_9_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td><b>E.</b></td>
													<td><b>Pasien Yang Mengalami Kekerasan / Penganiayaan</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah anda mengalami kekerasan / penganiayaan</td>
													<td>
														<input type="radio" name="pk_pasien_kekerasan_1" id="pk_pasien_kekerasan_1_ya" value="1" class="mr-1">Ya
														<input type="radio" name="pk_pasien_kekerasan_1" id="pk_pasien_kekerasan_1_tidak" value="0" checked class="mr-1 ml-4">Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Jenis Kekerasan / Penganiayaan Yang dialami</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_2" id="pk_pasien_kekerasan_2" class="custom-form clear-input d-inline-block col-lg-8" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Sudah berapa lama mengalami kekerasan / penganiayaan</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_3" id="pk_pasien_kekerasan_3" class="custom-form clear-input d-inline-block col-lg-8" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Seberapa sering anda mengalami kekerasan / penganiayaan</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_4" id="pk_pasien_kekerasan_4" class="custom-form clear-input d-inline-block col-lg-8" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Siapa yang melakukan kekerasan / penganiayaan</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_5" id="pk_pasien_kekerasan_5" class="custom-form clear-input d-inline-block col-lg-8" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah korban memerlukan pendampingan</td>
													<td>
														<input type="radio" name="pk_pasien_kekerasan_6" id="pk_pasien_kekerasan_6_ya" value="1" class="mr-1">Ya
														<input type="radio" name="pk_pasien_kekerasan_6" id="pk_pasien_kekerasan_6_tidak" value="0" checked class="mr-1 ml-4">Tidak
													</td>
												</tr>
												<tr>
													<td><b>F.</b></td>
													<td><b>Pasien Diduga Ketergantungan Obat dan Alkohol</b></td>
													<td>
														<input type="radio" name="pk_pasien_ketergantungan_obat" id="pk_pasien_ketergantungan_obat_ya" value="1" class="mr-1">Ya
														<input type="radio" name="pk_pasien_ketergantungan_obat" id="pk_pasien_ketergantungan_obat_tidak" value="0" checked class="mr-1 ml-4">Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														Jika Ya, Sebutkan<input type="text" name="pk_pasien_ketergantungan_obat_input" id="pk_pasien_ketergantungan_obat_input" class="custom-form clear-input d-inline-block col-lg-6 ml-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														Lama Ketergantungan<input type="text" name="pk_pasien_lama_ketergantungan_obat_input" id="pk_pasien_lama_ketergantungan_obat_input" class="custom-form clear-input d-inline-block col-lg-6 ml-4 disabled" placeholder="Lama Ketergantungan">
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Skala Early Warning System (News) -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skala-early-warning-system"><i class="fas fa-expand mr-1"></i>Expand</button>SKALA EARLY WARNING SYSTEM (NEWS)
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-skala-early-warning-system">
											<table class="table table-sm" style="margin-top: -15px">
												<tr>
													<td width="75%">
														<table class="table table-sm table-striped table-bordered">
															<thead>
																<tr>
																	<th width="5%" class="center"><b>No.</b></th>
																	<th width="15%"><b>Parameter Fisiologis</b></th>
																	<th width="10%" class="center"><b>3</b></th>
																	<th width="10%" class="center"><b>2</b></th>
																	<th width="10%" class="center"><b>1</b></th>
																	<th width="10%" class="center"><b>0</b></th>
																	<th width="10%" class="center"><b>1</b></th>
																	<th width="10%" class="center"><b>2</b></th>
																	<th width="10%" class="center"><b>3</b></th>
																	<th width="10%" class="center"><b>Blue Kriteria</b></th>
																</tr>
															</thead>
															<tbody>
																<!-- Desclaimer -->
																<!-- Nilai value setelah dash itu ada lah urut sesuai parameter nya... yang dipakai adalah nilai awal nya -->
																<tr>
																	<td class="center">1.</td>
																	<td>Laju Respirasi /Menit</td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_1" value="3_1" class="mr-1 skala">6-8</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_2" value="1_2" class="mr-1 skala">9-11</td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_3" value="0_3" class="mr-1 skala">12-20</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_4" value="2_4" class="mr-1 skala">21-24</td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_5" value="3_5" class="mr-1 skala">25-34</td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_6" value="bk_6" class="mr-1 skala">≤5 / ≥35</td>
																</tr>
																<tr>
																	<td class="center">2.</td>
																	<td>Saturasi O₂ (%)</td>
																	<td class="center"><input type="radio" name="saturasi" id="skala_2_1" value="3_1" class="mr-1 skala">≤91</td>
																	<td class="center"><input type="radio" name="saturasi" id="skala_2_2" value="2_2" class="mr-1 skala">92-93</td>
																	<td class="center"><input type="radio" name="saturasi" id="skala_2_3" value="1_3" class="mr-1 skala">94-95</td>
																	<td class="center"><input type="radio" name="saturasi" id="skala_2_4" value="0_4" class="mr-1 skala">≥96</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																</tr>
																<tr>
																	<td class="center">3.</td>
																	<td>Suplemen O₂ (%)</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="suplemen" id="skala_3_1" value="2_1" class="mr-1 skala">Ya</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="suplemen" id="skala_3_2" value="0_2" class="mr-1 skala">Tidak</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																</tr>
																<tr>
																	<td class="center">4.</td>
																	<td>Temperatur (°C)</td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_1" value="3_1" class="mr-1 skala">≤35</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_2" value="1_2" class="mr-1 skala">35.1-36</td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_3" value="0_3" class="mr-1 skala">36.1-38</td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_4" value="1_4" class="mr-1 skala">38.1-39</td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_5" value="2_5" class="mr-1 skala">≥39</td>
																	<td class="center"></td>
																	<td class="center"></td>
																</tr>
																<tr>
																	<td class="center">5.</td>
																	<td>TDS (mmHg)</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_1" value="3_1" class="mr-1 skala">71-90</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_2" value="2_2" class="mr-1 skala">91-100</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_3" value="1_3" class="mr-1 skala">101-110</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_4" value="0_4" class="mr-1 skala">111-180</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_5" value="1_5" class="mr-1 skala">181-220</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_6" value="3_6" class="mr-1 skala">≥221</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_7" value="bk_7" class="mr-1 skala">≤70</td>
																</tr>
																<tr>
																	<td class="center">6.</td>
																	<td>Laju Jantung /Menit</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_1" value="1_2" class="mr-1 skala">41-50</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_2" value="0_2" class="mr-1 skala">51-90</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_3" value="1_3" class="mr-1 skala">91-110</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_4" value="2_4" class="mr-1 skala">111-130</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_5" value="3_5" class="mr-1 skala">131-140</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_6" value="bk_8" class="mr-1 skala">≤40 / ≥140</td>
																</tr>
																<tr>
																	<td class="center">7.</td>
																	<td>Kesadaran</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="kesadaran" id="skala_7_1" value="0_1" class="mr-1 skala">A</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="kesadaran" id="skala_7_2" value="3_2" class="mr-1 skala">V & P</td>
																	<td class="center"><input type="radio" name="kesadaran" id="skala_7_3" value="bk_9" class="mr-1 skala">U</td>
																</tr>
																<tr><td colspan="10"></td></tr>
																<tr>
																	<td colspan="2"><b>TOTAL</b></td>
																	<td colspan="8">
																		<input type="radio" name="total_skala" id="total_skala_1" class="mr-1" value="Putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih (0)</b>
																		<input type="radio" name="total_skala" id="total_skala_2" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>
																		<input type="radio" name="total_skala" id="total_skala_3" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (5-6)</b>
																		<input type="radio" name="total_skala" id="total_skala_4" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah (≥7/1 Parameter Blue Kriteria)</b>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
													<td width="25%" style="vertical-align: top !important;">
														<span class="bold">Keterangan :</span><br>
														<span>A = Alert (Sadar Penuh)</span><br>
														<span>V = Verbal (Respon dengan Rangsang Suara) Somnolen, Dapat Ditenangkan</span><br>
														<span>P = Pain (Respon dengan Rangsang Nyeri) Letargi, Gelisah, Penurunan Respon Nyeri</span><br>
														<span>U = Unrespon</span>
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Masalah Keperawatan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-masalah-keperawatan"><i class="fas fa-expand mr-1"></i>Expand</button>MASALAH KEPERAWATAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-masalah-keperawatan">
											<table class="table table-sm table-striped" style="margin-top: -15px">
												<tr>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_1" id="masalah_keperawatan_1" class="mr-1" value="1">Bersihan Jalan Nafas Tidak Efektif</td>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_2" id="masalah_keperawatan_2" class="mr-1" value="1">Diare</td>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_3" id="masalah_keperawatan_3" class="mr-1" value="1">Ansietas</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_4" id="masalah_keperawatan_4" class="mr-1" value="1">Pola Nafas Tidak Efektif</td>
													<td><input type="checkbox" name="masalah_keperawatan_5" id="masalah_keperawatan_5" class="mr-1" value="1">Intoleransi Aktivitas</td>
													<td><input type="checkbox" name="masalah_keperawatan_6" id="masalah_keperawatan_6" class="mr-1" value="1">Berduka</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_7" id="masalah_keperawatan_7" class="mr-1" value="1">Gangguan Pertukaran Gas</td>
													<td><input type="checkbox" name="masalah_keperawatan_8" id="masalah_keperawatan_8" class="mr-1" value="1">Gangguan Mobilitas Fisik</td>
													<td><input type="checkbox" name="masalah_keperawatan_9" id="masalah_keperawatan_9" class="mr-1" value="1">Gangguan Interaksi Sosial</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_10" id="masalah_keperawatan_10" class="mr-1" value="1">Gangguan Ventilasi Spontan</td>
													<td><input type="checkbox" name="masalah_keperawatan_11" id="masalah_keperawatan_11" class="mr-1" value="1">Penurunan Kapasitas Adaptif Intrakranial</td>
													<td><input type="checkbox" name="masalah_keperawatan_12" id="masalah_keperawatan_12" class="mr-1" value="1">Risiko Cedera</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_13" id="masalah_keperawatan_13" class="mr-1" value="1">Penurunan Curah Jantung</td>
													<td><input type="checkbox" name="masalah_keperawatan_14" id="masalah_keperawatan_14" class="mr-1" value="1">Nyeri Akut</td>
													<td><input type="checkbox" name="masalah_keperawatan_15" id="masalah_keperawatan_15" class="mr-1" value="1">Risiko Aspirasi</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_16" id="masalah_keperawatan_16" class="mr-1" value="1">Perfusi Perifer Tidak Efektif</td>
													<td><input type="checkbox" name="masalah_keperawatan_17" id="masalah_keperawatan_17" class="mr-1" value="1">Nyeri Kronis</td>
													<td><input type="checkbox" name="masalah_keperawatan_18" id="masalah_keperawatan_18" class="mr-1" value="1">Risiko Pendarahan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_19" id="masalah_keperawatan_19" class="mr-1" value="1">Nausea</td>
													<td><input type="checkbox" name="masalah_keperawatan_20" id="masalah_keperawatan_20" class="mr-1" value="1">Nyeri Melahirkan</td>
													<td><input type="checkbox" name="masalah_keperawatan_21" id="masalah_keperawatan_21" class="mr-1" value="1">Risiko Syok</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_22" id="masalah_keperawatan_22" class="mr-1" value="1">Defisit Nutrisi</td>
													<td><input type="checkbox" name="masalah_keperawatan_23" id="masalah_keperawatan_23" class="mr-1" value="1">Defisit Perawatan Diri</td>
													<td><input type="checkbox" name="masalah_keperawatan_24" id="masalah_keperawatan_24" class="mr-1" value="1">Risiko Jatuh</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_25" id="masalah_keperawatan_25" class="mr-1" value="1">Hipervolemia</td>
													<td><input type="checkbox" name="masalah_keperawatan_26" id="masalah_keperawatan_26" class="mr-1" value="1">Hipertermia</td>
													<td><input type="checkbox" name="masalah_keperawatan_27" id="masalah_keperawatan_27" class="mr-1" value="1">Risiko Luka Tekan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_28" id="masalah_keperawatan_28" class="mr-1" value="1">Hipovolemia</td>
													<td><input type="checkbox" name="masalah_keperawatan_29" id="masalah_keperawatan_29" class="mr-1" value="1">Hipertermi</td>
													<td>
														<input type="checkbox" name="masalah_keperawatan_30" id="masalah_keperawatan_30" class="mr-1" value="1">Lain-lain
														<input type="text" name="masalah_keperawatan_lain_input" id="masalah_keperawatan_lain_input" class="custom-form clear-input d-inline-block col-lg-6 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_31" id="masalah_keperawatan_31" class="mr-1" value="1">Ketidakstabilan Kadar Glukosa Darah</td>
													<td><input type="checkbox" name="masalah_keperawatan_32" id="masalah_keperawatan_32" class="mr-1" value="1">Ketegangan Peran Pemberi Asuhan</td>
													<td></td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_33" id="masalah_keperawatan_33" class="mr-1" value="1">Gangguan Eliminasi Urin</td>
													<td><input type="checkbox" name="masalah_keperawatan_34" id="masalah_keperawatan_34" class="mr-1" value="1">Resiko Gangguan Integritas Kulit / Jaringan</td>
													<td></td>
												</tr>
											</table>
										</div>

										<!-- Row Data Perencanaan Pulang -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-perencanaan-pulang"><i class="fas fa-expand mr-1"></i>Expand</button>PERENCANAAN PULANG / DISCHARGE PLANNING
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-perencanaan-pulang">
											<table class="table table-sm table-striped" style="margin-top: -15px">
												<tr>
													<td width="50%"><b>Kriteria Discharge Planning :</b></td>
													<td width="50%"></td>
												</tr>
												<tr>
													<td>1. Umur > 65 Tahun</td>
													<td>
														<input type="radio" name="discharge_planning_1" id="discharge_planning_1_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_1" id="discharge_planning_1_tidak" class="mr-1 ml-2" value="0" checked>Tidak
													</td>
												</tr>
												<tr>
													<td>2. Keterbatasan Mobilitas</td>
													<td>
														<input type="radio" name="discharge_planning_2" id="discharge_planning_2_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_2" id="discharge_planning_2_tidak" class="mr-1 ml-2" value="0" checked>Tidak
													</td>
												</tr>
												<tr>
													<td>3. Perawatan / Pengobatan Lanjutan</td>
													<td>
														<input type="radio" name="discharge_planning_3" id="discharge_planning_3_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_3" id="discharge_planning_3_tidak" class="mr-1 ml-2" value="0" checked>Tidak
													</td>
												</tr>
												<tr>
													<td>4. Bantuan Untuk Melanjutkan Aktifitas Sehari-hari</td>
													<td>
														<input type="radio" name="discharge_planning_4" id="discharge_planning_4_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_4" id="discharge_planning_4_tidak" class="mr-1 ml-2" value="0" checked>Tidak
													</td>
												</tr>
												<tr>
													<td colspan="2">Bila salah satu jawaban "Ya" dari kriteria perencanaan pulang diatas, maka akan dilanjutkan dengan perencanaan pulang sebagai berikut :</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_1" id="kriteria_discharge_1" class="mr-1" value="1">Perawatan Diri (Mandi, BAB, BAK)</td>
													<td><input type="checkbox" name="kriteria_discharge_2" id="kriteria_discharge_2" class="mr-1" value="1">Bantuan Medis / Perawatan Diruamh (Homescare)</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_3" id="kriteria_discharge_3" class="mr-1" value="1">Pemantauan Pemberian Obat</td>
													<td><input type="checkbox" name="kriteria_discharge_4" id="kriteria_discharge_4" class="mr-1" value="1">Latihan Fisik Lanjutan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_5" id="kriteria_discharge_5" class="mr-1" value="1">Pendampingan Tenaga Khusus Dirumah</td>
													<td><input type="checkbox" name="kriteria_discharge_6" id="kriteria_discharge_6" class="mr-1" value="1">Pemantauan Diet</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_7" id="kriteria_discharge_7" class="mr-1" value="1">Bantuan Untuk Melakukan Aktifitas Fisik</td>
													<td><input type="checkbox" name="kriteria_discharge_8" id="kriteria_discharge_8" class="mr-1" value="1">Perawatan Luka</td>
												</tr>
												<tr>
													<td>(Kursi Roda, Alat Bantu Jalan)</td>
													<td>
														<input type="checkbox" name="kriteria_discharge_9" id="kriteria_discharge_9" class="mr-1" value="1">Lain-lain
														<input type="text" name="kriteria_discharge_lain_input" id="kriteria_discharge_lain_input" class="custom-form clear-input d-inline-block col-lg-6 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
										</div>

										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="2" class="center td-dark"></td>
											</tr>
											<tr>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_ttd_perawat" id="tanggal_ttd_perawat" class="custom-form clear-input d-inline-block col-lg-5 ml-2" value="<?= date('d/m/Y H:i') ?>">
													<!-- <input type="hidden" name="tanggal_ttd_perawat" id="tanggal_ttd_perawat_old"> -->
												</td>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_verifikasi_dokter_dpjp" id="tanggal_verifikasi_dokter_dpjp" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
													<!-- <input type="hidden" name="tanggal_verifikasi_dokter_dpjp" id="tanggal_verifikasi_dokter_dpjp_old"> -->
												</td>
											</tr>
											<tr>
												<td>Perawat <input type="text" name="perawat" id="perawat" class="select2c-input ml-2"></td>
												<td>Verifikasi DPJP <input type="text" name="verifikasi_dokter_dpjp" id="verifikasi_dokter_dpjp" class="select2c-input ml-2"></td>
											</tr>
											<tr>
												<td class="center">
													Tanda Tangan	
												</td>
												<td class="center">
													Verifikasi DPJP
												</td>
											</tr>
											<tr>
												<td class="center">
													<input type="checkbox" name="ttd_perawat" id="ttd_perawat" value="1" class="custom-form col-lg-1 mx-auto">
													<?= digitalSignature('ttd_perawat_verified') ?>
												</td>
												<td class="center">
													<input type="checkbox" name="ttd_verifikasi_dokter_dpjp" id="ttd_verifikasi_dokter_dpjp" value="1" class="custom-form col-lg-1 mx-auto">
													<?= digitalSignature('ttd_verifikasi_dokter_dpjp_verified') ?>
												</td>
											</tr>
										</table>
									</div>
									
									<!-- Data Pengkajian Dokter-->
									<div class="form-icare-data-pengkajian-dokter">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="20%" class="bold">Waktu Pengkajian</td>
												<td width="1%" class="bold">:</td>
												<td width="79%">
													<input type="text" name="waktu_kajian_medis" id="waktu_kajian_medis" class="custom-form clear-input col-lg-2" value="<?= date('d/m/Y H:i') ?>">
													<!-- <input type="hidden" name="waktu_kajian_medis" id="waktu_kajian_medis_old"> -->
												</td>
											</tr>
											<tr>
												<td colspan="3" class="td-dark"><b>ANAMNESIS</b></td>
											</tr>
											<tr>
												<td class="bold">Keluhan Utama</td>
												<td class="bold">:</td>
												<td>
													<textarea name="keluhan_utama_medis" id="keluhan_utama_medis" rows="4" class="form-control clear-input" placeholder="Keluhan Utama"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Penyakit Sekarang</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rps_medis" id="rps_medis" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Sekarang"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Penyakit Terdahulu</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rpt_medis" id="rpt_medis" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Terdahulu"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Pengobatan</td>
												<td class="bold">:</td>
												<td>
													<textarea name="pengobatan_medis" id="pengobatan_medis" rows="4" class="form-control clear-input" placeholder="Pengobatan"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Alergi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="riwayat_alergi" id="riwayat_alergi" rows="4" class="form-control clear-input" placeholder="Riwayat Alergi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Penyakit Keluarga</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="rpk_medis" id="rpk_medis_tidak" value="0" class="mr-1" checked>Tidak
													<input type="radio" name="rpk_medis" id="rpk_medis_ya" value="1" class="mr-1 ml-2">Ya, 
													<input type="checkbox" name="rpk_medis_asma" id="rpk_medis_asma" value="1" class="mr-1 ml-4 disabled">Asma
													<input type="checkbox" name="rpk_medis_dm" id="rpk_medis_dm" value="1" class="mr-1 ml-2 disabled">DM
													<input type="checkbox" name="rpk_medis_cardiovascular" id="rpk_medis_cardiovascular" value="1" class="mr-1 ml-2 disabled">Cardiovascular
													<input type="checkbox" name="rpk_medis_kanker" id="rpk_medis_kanker" value="1" class="mr-1 ml-2 disabled">kanker
													<input type="checkbox" name="rpk_medis_thalasemia" id="rpk_medis_thalasemia" value="1" class="mr-1 ml-2 disabled">Thalasemia
													<input type="checkbox" name="rpk_medis_lain" id="rpk_medis_lain" value="1" class="mr-1 ml-2 disabled">lain
													<input type="text" name="rpk_medis_lain_input" id="rpk_medis_lain_input" class="custom-form clear-input col-lg-4 d-inline-block mr-2 disabled" placeholder="Masukkan lain - lain">
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="3">Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan :</td>
											</tr>
											<tr>
												<td colspan="3"><i>(termasuk riwayat perkawinan, obstetri, imunisasi tumbuh kembang)</i></td>
											</tr>
											<tr>
												<td colspan="3"><div id="riwayat_field"></div></td>
											</tr>
											<tr>
												<td class="bold td-dark" colspan="3">PEMERIKSAAN FISIK</td>
											</tr>
											<tr>
												<td class="bold">Kesadaran</td>
												<td class="bold">:</td>
												<td>
													<input type="checkbox" name="composmentis_medis" id="composmentis_medis" value="1" class="mr-1">Composmentis
													<input type="checkbox" name="apatis_medis" id="apatis_medis" value="1" class="mr-1 ml-2">Apatis
													<input type="checkbox" name="samnolen_medis" id="samnolen_medis" value="1" class="mr-1 ml-2">Samnolen
													<input type="checkbox" name="sopor_medis" id="sopor_medis" value="1" class="mr-1 ml-2">Sopor
													<input type="checkbox" name="koma_medis" id="koma_medis" value="1" class="mr-1 ml-2">Koma
												</td>
											</tr>
											<tr>
												<td class="bold">Kepala</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_kepala" id="pf_kepala_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_kepala" id="pf_kepala_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_kepala" id="ket_pf_kepala" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Mata</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_mata" id="pf_mata_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_mata" id="pf_mata_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_mata" id="ket_pf_mata" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Hidung</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_hidung" id="pf_hidung_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_hidung" id="pf_hidung_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_hidung" id="ket_pf_hidung" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Gigi dan Mulut</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_gigi_mulut" id="pf_gigi_mulut_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_gigi_mulut" id="pf_gigi_mulut_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_gigi_mulut" id="ket_pf_gigi_mulut" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Tenggorokan</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_tenggorokan" id="pf_tenggorokan_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_tenggorokan" id="pf_tenggorokan_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_tenggorokan" id="ket_pf_tenggorokan" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Telinga</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_telinga" id="pf_telinga_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_telinga" id="pf_telinga_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_telinga" id="ket_pf_telinga" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Leher</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_leher" id="pf_leher_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_leher" id="pf_leher_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_leher" id="ket_pf_leher" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Thorax</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_thorax" id="pf_thorax_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_thorax" id="pf_thorax_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_thorax" id="ket_pf_thorax" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Jantung</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_jantung" id="pf_jantung_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_jantung" id="pf_jantung_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_jantung" id="ket_pf_jantung" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Paru</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_paru" id="pf_paru_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_paru" id="pf_paru_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_paru" id="ket_pf_paru" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Abdomen</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_abdomen" id="pf_abdomen_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_abdomen" id="pf_abdomen_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_abdomen" id="ket_pf_abdomen" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Genitalia</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_genitalia" id="pf_genitalia_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_genitalia" id="pf_genitalia_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_genitalia" id="ket_pf_genitalia" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Ekstermitas</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_ekstermitas" id="pf_ekstermitas_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_ekstermitas" id="pf_ekstermitas_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_ekstermitas" id="ket_pf_ekstermitas" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Kulit</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_kulit" id="pf_kulit_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_kulit" id="pf_kulit_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_kulit" id="ket_pf_kulit" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="bold td-dark">HASIL PEMERIKSAAN PENUNJANG</td>
											</tr>
											<tr>
												<td class="bold">Laboratorium</td>
												<td class="bold">:</td>
												<td><div id="hasil_laboratorium"></div></td>
											</tr>
											<tr>
												<td class="bold">Radiologi</td>
												<td class="bold">:</td>
												<td><div id="hasil_radiologi"></div></td>
											</tr>
											<tr>
												<td class="bold">Penunjang Lain</td>
												<td class="bold">:</td>
												<td><div id="hasil_penunjang_lain"></div></td>
											</tr>
											<tr>
												<td colspan="3" class="bold td-dark">DIAGNOSA AWAL</td>
											</tr>
											<tr>
												<td colspan="3"><div id="diagnosa_awal_medis"></div></td>
											</tr>
											<tr>
												<td colspan="3" class="bold td-dark">TATA LAKSANA</td>
											</tr>
											<tr>
												<td class="bold">1. Rencana Edukasi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_edukasi_medis" id="rencana_edukasi_medis" rows="4" class="form-control clear-input" placeholder="Rencana Edukasi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">2. Rencana Pemeriksaan Penunjang</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_pemeriksaan_penunjang" id="rencana_pemeriksaan_penunjang" rows="4" class="form-control clear-input" placeholder="Rencana Pemeriksaan Penunjang"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">3. Rencana Terapi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_terapi" id="rencana_terapi" rows="4" class="form-control clear-input" placeholder="Rencana Terapi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">4. Rencana Konsultasi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_konsultasi" id="rencana_konsultasi" rows="4" class="form-control clear-input" placeholder="Rencana Konsultasi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">5. Rencana Pulang <i><small>Discharge Planning</small></i></td>
												<td class="bold">:</td>
												<td>
													<b>Perkiraan Lama Rawat : </b><input type="text" name="perkiraan_lama_rawat" id="perkiraan_lama_rawat" class="custom-form col-lg-4 d-inline-block">
													<b class="ml-5">Sudah Bisa Ditetapkan : </b><input type="text" name="ditetapkan_berapa_hari" id="ditetapkan_berapa_hari" class="custom-form col-lg-2 d-inline-block">&nbsp;Hari
												</td>
											</tr>
											<tr>
												<td class="bold"></td>
												<td class="bold"></td>
												<td>
													<b>Belum Bisa Ditetapkan Karena : </b><input type="text" name="alasan_belum_ditetapkan" id="alasan_belum_ditetapkan" class="custom-form col-lg-4 d-inline-block">
													<b class="ml-5">Rencana Tanggal Pulang : </b><input type="text" name="tanggal_rencana_pulang" id="tanggal_rencana_pulang" class="custom-form col-lg-2 d-inline-block">
												</td>
											</tr>
										</table>
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="2" class="center td-dark"></td>
											</tr>
											<tr>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_ttd_dokter_dpjp" id="tanggal_ttd_dokter_dpjp" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
													<!-- <input type="hidden" name="tanggal_ttd_dokter_dpjp" id="tanggal_ttd_dokter_dpjp_old"> -->
												</td>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_ttd_dokter_pengkajian" id="tanggal_ttd_dokter_pengkajian" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
													<!-- <input type="hidden" name="tanggal_ttd_dokter_pengkajian" id="tanggal_ttd_dokter_pengkajian_old"> -->
												</td>
											</tr>
											<tr>
												<td>DPJP <input type="text" name="dokter_dpjp" id="dokter_dpjp" class="select2c-input ml-2"></td>
												<td>Dokter Pengkajian <input type="text" name="dokter_pengkajian" id="dokter_pengkajian" class="select2c-input ml-2"></td>
											</tr>
											<tr>
												<td class="center">
													Tanda Tangan DPJP	
												</td>
												<td class="center">
													Tanda Tangan Dokter Yang Melakukan Pengkajian
												</td>
											</tr>
											<tr>
												<td>
													<div class="center">
														<input type="checkbox" name="ttd_dokter_dpjp" id="ttd_dokter_dpjp" value="1" class="custom-form col-lg-1 mx-auto">
														<?= digitalSignature('ttd_dokter_dpjp_verified') ?>
													</div>
												</td>
												<td>
													<div class="center">
														<input type="checkbox" name="ttd_dokter_pengkajian" id="ttd_dokter_pengkajian" value="1" class="custom-form col-lg-1 mx-auto">
														<?= digitalSignature('ttd_dokter_pengkajian_verified') ?>
													</div>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end content -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpanPengkajianAwal()" id="btn-simpan-icare"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal Log History -->
<div class="modal fade" id="modal_history_logs" tabindex="-1">
	<div class="modal-dialog" style="max-width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">History Logs Pengkajian Awal Pasien Intensive Care</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<h6><b>Kajian Medis <i>(Dokter)</i></b></h6>
						<div class="table-responsive">
							<table class="table table-striped table-sm table-hover color-table info-table" id="table_kajian_medis">
								<thead>
									<tr>
										<th class="nowrap">No.</th>
										<th class="nowrap">Tgl Ubah</th>
										<th class="nowrap">User</th>
										<th class="nowrap">Keluhan Utama</th>
										<th class="nowrap">Riwayat Penyakit Sekarang</th>
										<th class="nowrap">Riwayat Penyakit Terdahulu</th>
										<th class="nowrap">Pengobatan</th>
										<th class="nowrap">Riwayat Pekerjaan</th>
										<th class="nowrap">Hasil Lab</th>
										<th class="nowrap">Hasil Rad</th>
										<th class="nowrap">Hasil Pen. Lain</th>
										<th class="nowrap">Diagnosa Awal</th>
										<th class="nowrap">Rencana Edukasi</th>
										<th class="nowrap">Rencana Pemeriksaan Penunjang</th>
										<th class="nowrap">Rencana Terapi</th>
										<th class="nowrap">Rencana Konsultasi</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Log History -->