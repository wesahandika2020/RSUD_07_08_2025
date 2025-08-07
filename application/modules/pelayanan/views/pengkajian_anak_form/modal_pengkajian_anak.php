<!-- // PAPA -->
<script>	
	$(function() {
		$("#wizard_form_ranap_anak").bwizard();
		$('#waktu_kajian_perawat_anak, #waktu_kajian_medis_anak, #tanggal_ttd_dokter_dpjp_anak, #tanggal_ttd_dokter_pengkajian_anak').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#tanggal_pemeriksaan_rad_anak, #tanggal_pemeriksaan_lab_anak').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        }); 

		$('#tanggal_verifikasi_dokter_dpjp_anak, #tanggal_ttd_perawat_anak').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false
		});
		
		$('#btn_expand_all_anak').click(function() {
			$('.collapse').addClass('show');
		});

		$('#btn_collapse_all_anak').click(function() {
			$('.collapse').removeClass('show');
		});	
		
		//Data Kesehatan Pasien		
		$('#informasi_dari_lain_anak').click(function() {
			if ($(this).is(":checked")) { $('#informasi_dari_lain_anak_inputt').prop('disabled', false); } else { $('#informasi_dari_lain_anak_inputt').val(''); $('#informasi_dari_lain_anak_inputt').prop('disabled', true); }
		});

		$('#faktor_pencetus_lain_anak').click(function() {
			if ($(this).is(":checked")) { $('#faktor_pencetus_lain_input_anak').prop('disabled', false); } else { $('#faktor_pencetus_lain_input_anak').val(''); $('#faktor_pencetus_lain_input_anak').prop('disabled', true); }
		});

		$('#rpt_lain_anak').click(function() {
			if ($(this).is(":checked")) { $('#rpt_lain_anak_input').prop('disabled', false); } else { $('#rpt_lain_anak_input').val(''); $('#rpt_lain_anak_input').prop('disabled', true); }
		});

		$('#rpk_lain_anak').click(function() {
			if ($(this).is(":checked")) { $('#rpk_lain_anak_input').prop('disabled', false); } else { $('#rpk_lain_anak_input').val(''); $('#rpk_lain_anak_input').prop('disabled', true); }
		});

		$('input[name="rpk_medis_anak"]').change(function() {
			if ($(this).val() == '1') {
				$('#rpk_medis_anak_asma, #rpk_medis_anak_dm, #rpk_medis_anak_cardiovascular, #rpk_medis_anak_kanker, #rpk_medis_anak_thalasemia, #rpk_medis_anak_lain').prop('disabled', false);
			} else {
				$('#rpk_medis_anak_asma, #rpk_medis_anak_dm, #rpk_medis_anak_cardiovascular, #rpk_medis_anak_kanker, #rpk_medis_anak_thalasemia, #rpk_medis_anak_lain').prop('disabled', true);
				$('#rpk_medis_anak_lain_input').val('');
			}
		});
		
		$('input[name="pernah_dirawat_anak"]').change(function() {
			if ($(this).val() == '1') {
				$('#pernah_dirawat_anak_kapan').prop('disabled', false);
				$('#pernah_dirawat_anak_dimana').prop('disabled', false);
			} else {
				$('#pernah_dirawat_anak_kapan').prop('disabled', true);
				$('#pernah_dirawat_anak_dimana').prop('disabled', true);
				$('#pernah_dirawat_anak_kapan').val('');
				$('#pernah_dirawat_anak_dimana').val('');
			}
		});

		//Riwayat Imunisasi
		$('#riwayat_imunisasi_anak_tidak_lengkap').click(function() {
			if ($(this).is(":checked")) { $('#riwayat_imunisasi_anak_lain').prop('disabled', false); } else { $('#riwayat_imunisasi_anak_lain').val(''); $('#riwayat_imunisasi_anak_lain').prop('disabled', true); }
		});

		//Status Fungsional
		// $('input[name="ketergantungan_total_anak"]').change(function() {
		// 	if ($(this).val() == '1') {
		// 		$('#ketergantungan_total_anak_input').prop('disabled', false);
		// 	} else {
		// 		$('#ketergantungan_total_anak_input').prop('disabled', true);
		// 		$('#ketergantungan_total_anak_input').val('');
		// 	}
		// });

		$('[name="ketergantungan_total_anak"]').on('change', function() {
            if ($(this).attr('id') === 'ketergantungan_total_anak_ya' && $(this).is(':checked')) {
                $('#ketergantungan_total_anak_input').prop('disabled', false);
            } else {
                $('#ketergantungan_total_anak_input').prop('disabled', true);
            }
        })





		// $('input[name="perlu_bantuan_anak"]').change(function() {
		// 	if ($(this).val() == '1') {
		// 		$('#perlu_bantuan_anak_input').prop('disabled', false);
		// 	} else {
		// 		$('#perlu_bantuan_anak_input').prop('disabled', true);
		// 		$('#perlu_bantuan_anak_input').val('');
		// 	}
		// });



		$('[name="perlu_bantuan_anak"]').on('change', function() {
            if ($(this).attr('id') === 'perlu_bantuan_anak_ya' && $(this).is(':checked')) {
                $('#perlu_bantuan_anak_input').prop('disabled', false);
            } else {
                $('#perlu_bantuan_anak_input').prop('disabled', true);
            }
        })





		//Psikososial 
		$('#sps_lain_anak').click(function() {
			if ($(this).is(":checked")) { $('#sps_lain_input_anak').prop('disabled', false); } else { $('#sps_lain_input_anak').val(''); $('#sps_lain_input_anak').prop('disabled', true); }
		});
		
		// $('input[name="tempat_tinggal_anak"]').change(function() {
		// 	if ($(this).val() == 'Lain') {
		// 		$('#tempat_tinggal_anak_lain_input').prop('disabled', false);
		// 	} else {
		// 		$('#tempat_tinggal_anak_lain_input').prop('disabled', true);
		// 		$('#tempat_tinggal_anak_lain_input').val('');
		// 	}
		// });

		$('[name="tempat_tinggal_anak"]').on('change', function() {
            if ($(this).attr('id') === 'tempat_tinggal_anak_lain' && $(this).is(':checked')) {
                $('#tempat_tinggal_anak_lain_inputi').prop('disabled', false);
            } else {
                $('#tempat_tinggal_anak_lain_inputi').prop('disabled', true);
            }
        })

		// $('input[name="cara_bayar_anak"]').change(function() {
		// 	if ($(this).val() == 'Lain') {
		// 		$('#cara_bayar_anak_lain_input').prop('disabled', false);
		// 	} else {
		// 		$('#cara_bayar_anak_lain_input').prop('disabled', true);
		// 		$('#cara_bayar_anak_lain_input').val('');
		// 	}
		// });

		// WH
		// radio
		$('[name="cara_bayar_anak"]').on('change', function() {
            if ($(this).attr('id') === 'cara_bayar_anak_asuransi' && $(this).is(':checked')) {
                $('#cara_bayar_anak_asuransi_input').prop('disabled', false);
            } else {
                $('#cara_bayar_anak_asuransi_input').prop('disabled', true);
            }
        })

		// checkbox
		$('#cara_bayar_anak_lain').click(function() {
            if ($(this).is(":checked")) {
                $('#cara_bayar_anak_lain_input').prop('disabled', false);
            } else {
                $('#cara_bayar_anak_lain_input').val('');
                $('#cara_bayar_anak_lain_input').prop('disabled', true);
            }
        });


		// radio
		$('[name="wajib_ibadah_anak"]').on('change', function() {
            if ($(this).attr('id') === 'wajib_ibadah_anak_halangan' && $(this).is(':checked')) {
                $('#wajib_ibadah_anak_halangan_input').prop('disabled', false);
            } else {
                $('#wajib_ibadah_anak_halangan_input').prop('disabled', true);
            }
        })

		$('input[name="agama_anak"]').change(function() {
			if ($(this).val() == 'Lain') {
				$('#agama_anak_lain_input').prop('disabled', false);
			} else {
				$('#agama_anak_lain_input').prop('disabled', true);
				$('#agama_anak_lain_input').val('');
			}
		});
	
		//Identifikasi Kebutuhan Komunikasi
		// $('input[name="bicara_anak"]').change(function() {
		// 	if ($(this).val() == '1') {
		// 		$('#bicara_input_anak').prop('disabled', false);
		// 	} else {
		// 		$('#bicara_input_anak').prop('disabled', true);
		// 		$('#bicara_input_anak').val('');
		// 	}
		// });

		// radio
		$('[name="bicara_anak"]').on('change', function() {
            if ($(this).attr('id') === 'bicara_anak_gangguan' && $(this).is(':checked')) {
                $('#bicara_input_anak').prop('disabled', false);
            } else {
                $('#bicara_input_anak').prop('disabled', true);
            }
        })


		// $('input[name="perlu_penterjemah_anak"]').change(function() {
		// 	if ($(this).val() == '1') {
		// 		$('#perlu_penterjemah_anak_input').prop('disabled', false);
		// 	} else {
		// 		$('#perlu_penterjemah_anak_input').prop('disabled', true);
		// 		$('#perlu_penterjemah_anak_input').val('');
		// 	}
		// });

		// radio
		$('[name="perlu_penterjemah_anak"]').on('change', function() {
            if ($(this).attr('id') === 'perlu_penterjemah_anak_ya' && $(this).is(':checked')) {
                $('#perlu_penterjemah_anak_input').prop('disabled', false);
            } else {
                $('#perlu_penterjemah_anak_input').prop('disabled', true);
            }
        })

		// Pemeriksaan Fisik 	
		// $('input[name="gangguan_neurologis"]').change(function() {
		// 	if ($(this).val() == '1') {
		// 		$('#gangguan_neurologis_input').prop('disabled', false);
		// 	} else {
		// 		$('#gangguan_neurologis_input').prop('disabled', true);
		// 		$('#gangguan_neurologis_input').val('');
		// 	}
		// });

		$('[name="gangguan_neurologis"]').on('change', function() {
            if ($(this).attr('id') === 'gangguan_neurologis_ya' && $(this).is(':checked')) {
                $('#gangguan_neurologis_input').prop('disabled', false);
            } else {
                $('#gangguan_neurologis_input').prop('disabled', true);
            }
        })



		// $('input[name="bentuk_dada_anak"]').change(function() {
		// 	if ($(this).val() == '0') {
		// 		$('#bentuk_dada_anak_input').prop('disabled', false);
		// 	} else {
		// 		$('#bentuk_dada_anak_input').prop('disabled', true);
		// 		$('#bentuk_dada_anak_input').val('');
		// 	}
		// });

		// $('input[name="pola_nafas_anak"]').change(function() {
		// 	if ($(this).val() == '0') {
		// 		$('#pola_nafas_anak_input').prop('disabled', false);
		// 	} else {
		// 		$('#pola_nafas_anak_input').prop('disabled', true);
		// 		$('#pola_nafas_anak_input').val('');
		// 	}
		// });

		// $('input[name="suara_nafas_anak"]').change(function() {
		// 	if ($(this).val() == '0') {
		// 		$('#suara_nafas_anak_input').prop('disabled', false);
		// 	} else {
		// 		$('#suara_nafas_anak_input').prop('disabled', true);
		// 		$('#suara_nafas_anak_input').val('');
		// 	}
		// });

		// wh
		$('[name="bentuk_dada_anak"]').on('change', function() {
            if ($(this).attr('id') === 'bentuk_dada_anak_tidak_normal' && $(this).is(':checked')) {
                $('#bentuk_dada_anak_input').prop('disabled', false);
            } else {
                $('#bentuk_dada_anak_input').prop('disabled', true);
            }
        })

		$('[name="pola_nafas_anak"]').on('change', function() {
            if ($(this).attr('id') === 'pola_nafas_anak_tidak_normal' && $(this).is(':checked')) {
                $('#pola_nafas_anak_input').prop('disabled', false);
            } else {
                $('#pola_nafas_anak_input').prop('disabled', true);
            }
        })

		$('[name="suara_nafas_anak"]').on('change', function() {
            if ($(this).attr('id') === 'suara_nafas_anak_tidak_normal' && $(this).is(':checked')) {
                $('#suara_nafas_anak_input').prop('disabled', false);
            } else {
                $('#suara_nafas_anak_input').prop('disabled', true);
            }
        })





		// WH
		$('[name="alat_bantu_nafas_anak"]').on('change', function() {
            if ($(this).attr('id') === 'alat_bantu_nafas_anak_kanul' && $(this).is(':checked')) {
                $('#alat_bantu_nafas_anak_kanul_input').prop('disabled', false);
            } else {
                $('#alat_bantu_nafas_anak_kanul_input').prop('disabled', true);
            }
        })

		$('#alat_bantu_nafas_anak_ventilator').click(function() {
            if ($(this).is(":checked")) {
                $('#alat_bantu_nafas_anak_ventilator_input').prop('disabled', false);
            } else {
                $('#alat_bantu_nafas_anak_ventilator_input').val('');
                $('#alat_bantu_nafas_anak_ventilator_input').prop('disabled', true);
            }
        });

		// checkbox
		$('#ptn_lain_anak').click(function() {
            if ($(this).is(":checked")) {
                $('#ptn_lain_input_anak').prop('disabled', false);
            } else {
                $('#ptn_lain_input_anak').val('');
                $('#ptn_lain_input_anak').prop('disabled', true);
            }
        });

		$('#mulut_lainnya').click(function() {
			if ($(this).is(":checked")) { 
				$('#mulut_lainnya_input').prop('disabled', false);
			} else { 
				$('#mulut_lainnya_input').val(''); 
				$('#mulut_lainnya_input').prop('disabled', true); 
			}
		});

		// $('input[name="muntah_anak"]').change(function() {
		// 	if ($(this).val() == '1') {
		// 		$('#muntah_anak_lainnya').prop('disabled', false);
		// 	} else {
		// 		$('#muntah_anak_lainnya').prop('disabled', true);
		// 		$('#muntah_anak_lainnya').val('');
		// 	}
		// });

		$('[name="muntah_anak"]').on('change', function() {
            if ($(this).attr('id') === 'muntah_anak_ya' && $(this).is(':checked')) {
                $('#muntah_anak_lainnya').prop('disabled', false);
            } else {
                $('#muntah_anak_lainnya').prop('disabled', true);
            }
        })



		$('#pengeluaran_stomata').click(function() {
			if ($(this).is(":checked")) { $('#pengeluaran_stomata_lokasi').prop('disabled', false); } else { $('#pengeluaran_stomata_lokasi').val(''); $('#pengeluaran_stomata_lokasi').prop('disabled', true); }
		});

		// $('input[name="kelainan_bak"]').change(function() {
		// 	if ($(this).val() == '1') {
		// 		$('#kelainan_bak_lainnya').prop('disabled', false);
		// 	} else {
		// 		$('#kelainan_bak_lainnya').prop('disabled', true);
		// 		$('#kelainan_bak_lainnya').val('');
		// 	}
		// });


		$('[name="kelainan_bak"]').on('change', function() {
            if ($(this).attr('id') === 'kelainan_bak_ada' && $(this).is(':checked')) {
                $('#kelainan_bak_lainnya').prop('disabled', false);
            } else {
                $('#kelainan_bak_lainnya').prop('disabled', true);
            }
        })


		// wh
		$('#normal-anak-6').click(function() {
            if ($(this).is(":checked")) {
                $('#konsistensi_bab').prop('disabled', false);
            } else {
                $('#konsistensi_bab').val('');
                $('#konsistensi_bab').prop('disabled', true);
            }
        });






		// $('input[name="kelainan_tulang_anak"]').change(function() {
		// 	if ($(this).val() == '1') {
		// 		$('#kelainan_tulang_anak_lainnya').prop('disabled', false);
		// 	} else {
		// 		$('#kelainan_tulang_anak_lainnya').prop('disabled', true);
		// 		$('#kelainan_tulang_anak_lainnya').val('');
		// 	}
		// });


		$('[name="kelainan_tulang_anak"]').on('change', function() {
            if ($(this).attr('id') === 'kelainan_tulang_anak_ya' && $(this).is(':checked')) {
                $('#kelainan_tulang_anak_lainnya').prop('disabled', false);
            } else {
                $('#kelainan_tulang_anak_lainnya').prop('disabled', true);
            }
        })



		// $('input[name="genetalia_anak"]').change(function() {
		// 	if ($(this).val() == '0') {
		// 		$('#genetalia_anak_lainnya').prop('disabled', false);
		// 	} else {
		// 		$('#genetalia_anak_lainnya').prop('disabled', true);
		// 		$('#genetalia_anak_lainnya').val('');
		// 	}
		// });


		$('[name="genetalia_anak"]').on('change', function() {
            if ($(this).attr('id') === 'genetalia_anak_kelainan' && $(this).is(':checked')) {
                $('#genetalia_anak_lainnya').prop('disabled', false);
            } else {
                $('#genetalia_anak_lainnya').prop('disabled', true);
            }
        })



		//Populasi Khusus
		//A. Penyakit Menular
		$('#pk_pm_lain_anak').click(function() {
			if ($(this).is(":checked")) { $('#pk_pm_lain_anak_input').prop('disabled', false); } else { $('#pk_pm_lain_anak_input').val(''); $('#pk_pm_lain_anak_input').prop('disabled', true); }
		});
		
		
		$('input[name="pk_penyakit_menular_3_anak"]').change(function() {
			if ($(this).val() == '1') {
				$('#pk_penyakit_menular_3_anak_input').prop('disabled', false);
			} else {
				$('#pk_penyakit_menular_3_anak_input').prop('disabled', true);
				$('#pk_penyakit_menular_3_anak_input').val('');
			}
		});

		$('input[name="pk_penyakit_menular_4_anak"]').change(function() {
			if ($(this).val() == '1') {
				$('#pk_penyakit_menular_4_anak_input').prop('disabled', false);
			} else {
				$('#pk_penyakit_menular_4_anak_input').prop('disabled', true);
				$('#pk_penyakit_menular_4_anak_input').val('');
			}
		});

		$('input[name="pk_penyakit_menular_6_anak"]').change(function() {
			if ($(this).val() == '1') {
				$('#pk_penyakit_menular_6_anak_input').prop('disabled', false);
			} else {
				$('#pk_penyakit_menular_6_anak_input').prop('disabled', true);
				$('#pk_penyakit_menular_6_anak_input').val('');
			}
		});
		
		//Penyakit Penurunan Daya Tahan Tubuh

		$('#pk_pdtt_lain_anak').click(function() {
			if ($(this).is(":checked")) { $('#pk_pdtt_lain_anak_input').prop('disabled', false); } else { $('#pk_pdtt_lain_anak_input').val(''); $('#pk_pdtt_lain_anak_input').prop('disabled', true); }
		});
		
		$('input[name="pk_penyakit_pdtt_3_anak"]').change(function() {
			if ($(this).val() == '1') {
				$('#pk_penyakit_pdtt_3_anak_input').prop('disabled', false);
			} else {
				$('#pk_penyakit_pdtt_3_anak_input').prop('disabled', true);
				$('#pk_penyakit_pdtt_3_anak_input').val('');
			}
		});

		$('input[name="pk_penyakit_menular_3_anak"]').change(function() {
			if ($(this).val() == '1') {
				$('#pk_penyakit_menular_3_anak_input').prop('disabled', false);
			} else {
				$('#pk_penyakit_menular_3_anak_input').prop('disabled', true);
				$('#pk_penyakit_menular_3_anak_input').val('');
			}
		});

		$('input[name="pk_penyakit_pdtt_4_anak"]').change(function() {
			if ($(this).val() == '1') {
				$('#pk_penyakit_pdtt_4_anak_input').prop('disabled', false);
			} else {
				$('#pk_penyakit_pdtt_4_anak_input').prop('disabled', true);
				$('#pk_penyakit_pdtt_4_anak_input').val('');
			}
		});

		$('input[name="pk_penyakit_pdtt_5_anak"]').change(function() {
			if ($(this).val() == '1') {
				$('#pk_penyakit_pdtt_5_anak_input').prop('disabled', false);
			} else {
				$('#pk_penyakit_pdtt_5_anak_input').prop('disabled', true);
				$('#pk_penyakit_pdtt_5_anak_input').val('');
			}
		});

		// WH
		$('[name="pk_pasien_kekerasan_1_anak"]').on('change', function() {
            if ($(this).attr('id') === 'pk_pasien_kekerasan_1_anak_ya' && $(this).is(':checked')) {
                $('#pk_pasien_kekerasan_2_anak').prop('disabled', false);
            } else {
                $('#pk_pasien_kekerasan_2_anak').prop('disabled', true);
            }

            if ($(this).attr('id') === 'pk_pasien_kekerasan_1_anak_ya' && $(this).is(':checked')) {
                $('#pk_pasien_kekerasan_3_anak').prop('disabled', false);
            } else {
                $('#pk_pasien_kekerasan_3_anak').prop('disabled', true);
            }

            if ($(this).attr('id') === 'pk_pasien_kekerasan_1_anak_ya' && $(this).is(':checked')) {
                $('#pk_pasien_kekerasan_4_anak').prop('disabled', false);
            } else {
                $('#pk_pasien_kekerasan_4_anak').prop('disabled', true);
            }

            if ($(this).attr('id') === 'pk_pasien_kekerasan_1_anak_ya' && $(this).is(':checked')) {
                $('#pk_pasien_kekerasan_5_anak').prop('disabled', false);
            } else {
                $('#pk_pasien_kekerasan_5_anak').prop('disabled', true);
            }
        })


		// WH
		$('[name="pk_pasien_ketergantungan_obat_anak"]').on('change', function() {
            if ($(this).attr('id') === 'pk_pasien_ketergantungan_obat_anak_ya' && $(this).is(
                    ':checked')) {
                $('#pk_pasien_ketergantungan_obat_input_anak').prop('disabled', false);
            } else {
                $('#pk_pasien_ketergantungan_obat_input_anak').prop('disabled', true);
            }
            if ($(this).attr('id') === 'pk_pasien_ketergantungan_obat_anak_ya' && $(this).is(
                    ':checked')) {
                $('#pk_pasien_lama_ketergantungan_obat_input_anak').prop('disabled', false);
            } else {
                $('#pk_pasien_lama_ketergantungan_obat_input_anak').prop('disabled', true);
            }
        })

		// Masalah Keperawatan 
		$('#masalah_keperawatan_30_anak').click(function() {
			if ($(this).is(":checked")) { $('#masalah_keperawatan_lain_input_anak').prop('disabled', false); } else { $('#masalah_keperawatan_lain_input_anak').val(''); $('#masalah_keperawatan_lain_input_anak').prop('disabled', true); }
		});

		// Perencanaan Pulang 

		$('#kriteria_discharge_9_anak').click(function() {
			if ($(this).is(":checked")) { $('#kriteria_discharge_lain_input_anak').prop('disabled', false); } else { $('#kriteria_discharge_lain_input_anak').val(''); $('#kriteria_discharge_lain_input_anak').prop('disabled', true); }
		});
		
		//Nama Perawat		
		$('#perawat_anak').select2c({
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
		
		//Nama dokter
		$('#verifikasi_dokter_dpjp_anak, #dokter_dpjp_anak, #dokter_pengkajian_anak').select2c({
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
		
		$('.skala').change(function() {
			hitungSkalaEarly();
		});	

		function hitungSkalaEarly() {
			var total = 0;
			// looping vertical
			for (let i = 1; i <= 17; i++) {
				// looping horizontal
				var sub_total = 0
				for (let j = 1; j <= 17; j++) {
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
				$('#total_skala_sew_anak_1').prop('checked', true);
			} else if (total >= 1 && total <= 4) {
				$('#total_skala_sew_anak_2').prop('checked', true);
			} else if (total >= 5 && total <= 6) {
				$('#total_skala_sew_anak_3').prop('checked', true);
			} else if (total >= 7) {
				$('#total_skala_sew_anak_4').prop('checked', true);
			}
		}
		

		// PENGKAJIAN MEDIS
		$('#riwayat_field_anak, #hasil_laboratorium_anak, #hasil_radiologi_anak, #hasil_penunjang_lain_anak, #diagnosa_awal_medis_anak').summernote({
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

		$("#tanggal_rencana_pulang_anak").datepicker({
            format: 'dd/mm/yyyy',
            // endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

		// Skrining Nyeri Pasien Anak
		// Wajah
		$('#ekspresi_wajah_anak_1').click(function() {
			if ($(this).is(":checked")) { 
				$('#ekspresi_wajah_anak_1_ya').prop('disabled', false); 
				$('#ekspresi_wajah_anak_1_ya').prop('checked', true).change(); 
			} else { 
				$('#ekspresi_wajah_anak_1_ya').prop('checked', false).change();; 
				$('#ekspresi_wajah_anak_1_ya').prop('disabled', true); 
			}
		});
		$('#ekspresi_wajah_anak_2').click(function() {
			if ($(this).is(":checked")) { 
				$('#ekspresi_wajah_anak_2_ya').prop('disabled', false); 
				$('#ekspresi_wajah_anak_2_ya').prop('checked', true).change(); 
			} else { 
				$('#ekspresi_wajah_anak_2_ya').prop('checked', false).change();; 
				$('#ekspresi_wajah_anak_2_ya').prop('disabled', true); 
			}
		});
		$('#ekspresi_wajah_anak_3').click(function() {
			if ($(this).is(":checked")) { 
				$('#ekspresi_wajah_anak_3_ya').prop('disabled', false); 
				$('#ekspresi_wajah_anak_3_ya').prop('checked', true).change(); 
			} else { 
				$('#ekspresi_wajah_anak_3_ya').prop('checked', false).change();; 
				$('#ekspresi_wajah_anak_3_ya').prop('disabled', true); 
			}
		});

		//Kaki
		$('#kaki_anak_1').click(function() {
			if ($(this).is(":checked")) { 
				$('#kaki_anak_1_ya').prop('disabled', false); 
				$('#kaki_anak_1_ya').prop('checked', true).change(); 
			} else { 
				$('#kaki_anak_1_ya').prop('checked', false).change();; 
				$('#kaki_anak_1_ya').prop('disabled', true); 
			}
		});
		$('#kaki_anak_2').click(function() {
			if ($(this).is(":checked")) { 
				$('#kaki_anak_2_ya').prop('disabled', false); 
				$('#kaki_anak_2_ya').prop('checked', true).change(); 
			} else { 
				$('#kaki_anak_2_ya').prop('checked', false).change();; 
				$('#kaki_anak_2_ya').prop('disabled', true); 
			}
		});
		$('#kaki_anak_3').click(function() {
			if ($(this).is(":checked")) { 
				$('#kaki_anak_3_ya').prop('disabled', false); 
				$('#kaki_anak_3_ya').prop('checked', true).change(); 
			} else { 
				$('#kaki_anak_3_ya').prop('checked', false).change();; 
				$('#kaki_anak_3_ya').prop('disabled', true); 
			}
		});

		//Aktivitas
		$('#aktifitas_anak_1').click(function() {
			if ($(this).is(":checked")) { 
				$('#aktifitas_anak_1_ya').prop('disabled', false); 
				$('#aktifitas_anak_1_ya').prop('checked', true).change(); 
			} else { 
				$('#aktifitas_anak_1_ya').prop('checked', false).change();; 
				$('#aktifitas_anak_1_ya').prop('disabled', true); 
			}
		});
		$('#aktifitas_anak_2').click(function() {
			if ($(this).is(":checked")) { 
				$('#aktifitas_anak_2_ya').prop('disabled', false); 
				$('#aktifitas_anak_2_ya').prop('checked', true).change(); 
			} else { 
				$('#aktifitas_anak_2_ya').prop('checked', false).change();; 
				$('#aktifitas_anak_2_ya').prop('disabled', true); 
			}
		});
		$('#aktifitas_anak_3').click(function() {
			if ($(this).is(":checked")) { 
				$('#aktifitas_anak_3_ya').prop('disabled', false); 
				$('#aktifitas_anak_3_ya').prop('checked', true).change(); 
			} else { 
				$('#aktifitas_anak_3_ya').prop('checked', false).change();; 
				$('#aktifitas_anak_3_ya').prop('disabled', true); 
			}
		});

		//Menangis
		$('#ekspresi_menangis_anak_1').click(function() {
			if ($(this).is(":checked")) { 
				$('#ekspresi_menangis_anak_1_ya').prop('disabled', false); 
				$('#ekspresi_menangis_anak_1_ya').prop('checked', true).change(); 
			} else { 
				$('#ekspresi_menangis_anak_1_ya').prop('checked', false).change();; 
				$('#ekspresi_menangis_anak_1_ya').prop('disabled', true); 
			}
		});
		$('#ekspresi_menangis_anak_2').click(function() {
			if ($(this).is(":checked")) { 
				$('#ekspresi_menangis_anak_2_ya').prop('disabled', false); 
				$('#ekspresi_menangis_anak_2_ya').prop('checked', true).change(); 
			} else { 
				$('#ekspresi_menangis_anak_2_ya').prop('checked', false).change();; 
				$('#ekspresi_menangis_anak_2_ya').prop('disabled', true); 
			}
		});
		$('#ekspresi_menangis_anak_3').click(function() {
			if ($(this).is(":checked")) { 
				$('#ekspresi_menangis_anak_3_ya').prop('disabled', false); 
				$('#ekspresi_menangis_anak_3_ya').prop('checked', true).change(); 
			} else { 
				$('#ekspresi_menangis_anak_3_ya').prop('checked', false).change();; 
				$('#ekspresi_menangis_anak_3_ya').prop('disabled', true); 
			}
		});

		//Bicara /Suara
		$('#cara_biacara_anak_1').click(function() {
			if ($(this).is(":checked")) { 
				$('#cara_biacara_anak_1_ya').prop('disabled', false); 
				$('#cara_biacara_anak_1_ya').prop('checked', true).change(); 
			} else { 
				$('#cara_biacara_anak_1_ya').prop('checked', false).change();; 
				$('#cara_biacara_anak_1_ya').prop('disabled', true); 
			}
		});
		$('#cara_bicara_anak_2').click(function() {
			if ($(this).is(":checked")) { 
				$('#cara_bicara_anak_2_ya').prop('disabled', false); 
				$('#cara_bicara_anak_2_ya').prop('checked', true).change(); 
			} else { 
				$('#cara_bicara_anak_2_ya').prop('checked', false).change();; 
				$('#cara_bicara_anak_2_ya').prop('disabled', true); 
			}
		});
		$('#cara_bicara_anak_3').click(function() {
			if ($(this).is(":checked")) { 
				$('#cara_bicara_anak_3_ya').prop('disabled', false); 
				$('#cara_bicara_anak_3_ya').prop('checked', true).change(); 
			} else { 
				$('#cara_bicara_anak_3_ya').prop('checked', false).change();; 
				$('#cara_bicara_anak_3_ya').prop('disabled', true); 
			}
		});
	})


	function calcscoresna() {
		var score = 0;
		//wajah
		$("input[name='ekspresi_wajah_anak_1_ya']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});
		$("input[name='ekspresi_wajah_anak_2_ya']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});
		$("input[name='ekspresi_wajah_anak_3_ya']:checked").each(function() {
			if ($(this).val() == '3') {
				score += parseInt(3);
			}
		});

		//kaki
		$("input[name='kaki_anak_1_ya']:checked").each(function() {
			if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});
		$("input[name='kaki_anak_2_ya']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});
		$("input[name='kaki_anak_3_ya']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});

		//aktivitas
		$("input[name='aktifitas_anak_1_ya']:checked").each(function() {
			if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});
		$("input[name='aktifitas_anak_2_ya']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});
		$("input[name='aktifitas_anak_3_ya']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});

		//menangis
		$("input[name='ekspresi_menangis_anak_1_ya']:checked").each(function() {
			if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});
		$("input[name='ekspresi_menangis_anak_2_ya']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});
		$("input[name='ekspresi_menangis_anak_3_ya']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});
		
		//Bicara/Suara
		$("input[name='cara_biacara_anak_1_ya']:checked").each(function() {
			if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});
		$("input[name='cara_bicara_anak_2_ya']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});
		$("input[name='cara_bicara_anak_3_ya']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		})

		$("input[name='skrining_jumlah_skor']").val(score); calcscoresna
	}
	
	//PENILAIAN RESIKO JATUH ANAK
	function calcscoreprja() {
		var score = 0;
		//wajah
		$("input[name='prja_riwayat_jatuh_anak_3_tahun']:checked").each(function() {
			if ($(this).val() == '4') {
				score += parseInt(4);
			}
		});
		$("input[name='prja_riwayat_jatuh_anak_7_tahun']:checked").each(function() {
			if ($(this).val() == '3') {
				score += parseInt(3);
			}
		});
		$("input[name='prja_riwayat_jatuh_anak_13_tahun']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});
		$("input[name='prja_riwayat_jatuh_anak_lebih_13']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});

		//Jenis Kelamin
		$("input[name='prja_jk_laki']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});
		$("input[name='prja_jk_perempuan']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});

		// Diagnosa
		$("input[name='prja_diagnosis_neurologi']:checked").each(function() {
			if ($(this).val() == '4') {
				score += parseInt(4);
			}
		});
		$("input[name='prja_diagnosis_respirator']:checked").each(function() {
			if ($(this).val() == '3') {
				score += parseInt(3);
			}
		});
		$("input[name='prja_diagnosis_perilaku']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});
		$("input[name='prja_diagnosis_lain']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});

		//Gangguan Kognitif
		$("input[name='prja_gk_keterbatasan']:checked").each(function() {
			if ($(this).val() == '3') {
				score += parseInt(3);
			}
		});
		$("input[name='prja_gk_pelupa']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});
		$("input[name='prja_gk_daya_pikir']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});

		//Faktor Lingkungan
		$("input[name='prja_riwayat_jatuh_bayi']:checked").each(function() {
			if ($(this).val() == '4') {
				score += parseInt(4);
			}
		});
		$("input[name='prja_alat_bantu_pasien']:checked").each(function() {
			if ($(this).val() == '3') {
				score += parseInt(3);
			}
		});
		$("input[name='prja_psaien_tempat_tidur']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});
		$("input[name='prja_area_pasien']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});

		//Respon terhadap pembedahan
		$("input[name='prja_24_jam']:checked").each(function() {
			if ($(this).val() == '3') {
				score += parseInt(3);
			}
		});
		$("input[name='prja_48_jam']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});
		$("input[name='prja_lebih_48_jam']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});

		//Penggunaan Obat
		$("input[name='prja_pengguanaan_obat_bersama']:checked").each(function() {
			if ($(this).val() == '3') {
				score += parseInt(3);
			}
		});
		$("input[name='prja_penggunaan_salah_satu_obat']:checked").each(function() {
			if ($(this).val() == '2') {
				score += parseInt(2);
			}
		});
		$("input[name='prja_tanpa_obat']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});
		

		$("input[name='prja_nilai_total']").val(score); calcscoreprja
	}

	function calcscoresgizi() {
		var score = 0;
		$("input[name='sgizi_gizi_buruk']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			} else if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});

		$("input[name='sgizi_penurunan_bb']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			} else if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});

		$("input[name='sgizi_dua_kondisi']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			} else if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});

		$("input[name='sgizi_malnutrisi']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(1);
			} else if ($(this).val() == '0') {
				score += parseInt(0);
			}
		});
		$('#sgizi_jumlah').val(score);
	}

	// GCS
    $('.gcsm').on('keyup', function() {
        let sum = 0
        $('.gcsm').each(function() {
            sum += Number($(this).val());
        });
        $('#gcsm-total').val(sum);
    })
	
	function resetFormPengkajianAwalAnak() {
		$('#form_pengkajian_awal_anak')[0].reset();
		$('#id_kajian_keperawatan_anak, #id_kajian_medis_anak').val('');
		// $('input').filter(':radio').prop('checked',false);
		// $('input').filter(':checkbox').prop('checked',false);
		$('#agama_islam_anak, #agama_kristen_anak, #agama_hindu_anak, #agama_buddha_anak, #agama_katholik_anak, #agama_lain_anak, #agama_lain_anak').prop('disabled', true);
		$('#cara_masuk_irj_anak, #cara_masuk_igd_anak, #cara_masuk_lain_anak').prop('disabled', true);

		$('.disabled').attr('disabled', true);

		$('#s2id_perawat_anak a .select2c-chosen').html('Pilih Perawat');
		$('#s2id_verifikasi_dokter_dpjp_anak a .select2c-chosen').html('Pilih Verifikator Dokter DPJP');
		
		$('#s2id_dokter_dpjp_anak a .select2c-chosen').html('Pilih Dokter DPJP');
		$('#s2id_dokter_pengkajian_anak a .select2c-chosen').html('Pilih Dokter Pengkajian');

		$('#tanggal_ttd_perawat_anak').val('<?= date('d/m/Y H:i') ?>');

		$('#riwayat_field_anak').summernote('code', '');
		$('#hasil_laboratorium_anak').summernote('code', '');
		$('#hasil_radiologi_anak').summernote('code', '');
		$('#hasil_penunjang_lain_anak').summernote('code', '');
		$('#diagnosa_awal_medis_anak').summernote('code', '');

		// signature
		$('#ttd_perawat_anak').show();
		$('#ttd_verifikasi_dokter_dpjp_anak').show();
		$('#ttd_perawat_verified_anak').hide();
		$('#ttd_verifikasi_dokter_dpjp_verified_anak').hide();

		$('#ttd_dokter_dpjp_anak').show();
		$('#ttd_dokter_dpjp_verified_anak').hide();
		$('#ttd_dokter_pengkajian_anak').show();
		$('#ttd_dokter_pengkajian_verified_anak').hide();

		$('#waktu_kajian_perawat_anak, #waktu_kajian_medis_anak, #tanggal_ttd_perawat_anak, #tanggal_verifikasi_dokter_dpjp_anak, #tanggal_ttd_dokter_dpjp_anak, #tanggal_ttd_dokter_pengkajian_anak').attr('disabled', false);
		// $('#waktu_kajian_perawat_old, #waktu_kajian_medis_old, #tanggal_ttd_perawat_old, #tanggal_verifikasi_dokter_dpjp_old, #tanggal_ttd_dokter_dpjp_old, #tanggal_ttd_dokter_pengkajian_old').val('');

		$('#perawat_anak, #verifikasi_dokter_dpjp_anak, #dokter_dpjp_anak, #dokter_pengkajian_anak').select2c('readonly', false);
	}

	function entriPengkajianAnak(id_pendaftaran, id_layanan_pendaftaran, bed) {
		$('#wizard_form_ranap_anak').bwizard('show', '0');	
		$.ajax({
			type: 'GET',
			url: '<?= base_url("rawat_inap/api/rawat_inap/get_data_pengkajian_awal_anak") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				resetFormPengkajianAwalAnak();
	
				$('#id_layanan_pendaftaran_anak').val(id_layanan_pendaftaran);
				$('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
				
				if (data.pasien !== null) {
					$('#id_pasien_anak').val(data.pasien.id_pasien);				
					$('#nama_anak').text(data.pasien.nama);
					$('#norm_anak').text(data.pasien.no_rm);
					$('#ttl_anak').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + ( ' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
					$('#jk_anak').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

					if (data.pasien.agama == 'Islam') {
						$('#agama_islam_anak').prop('checked', true).attr('disabled', false);
					} else if (data.pasien.agama == 'Kristen') {
						$('#agama_kristen_anak').prop('checked', true).attr('disabled', false);
					} else if (data.pasien.agama == 'Hindu') {
						$('#agama_hindu_anak').prop('checked', true).attr('disabled', false);
					} else if (data.pasien.agama == 'Buddha') {
						$('#agama_buddha_anak').prop('checked', true).attr('disabled', false);
					} else if (data.pasien.agama == 'Katholik') {
						$('#agama_katholik_anak').prop('checked', true).attr('disabled', false);
					} else if (data.pasien.agama == 'Konghucu') {
						$('#agama_lain_anak').prop('checked', true).attr('disabled', false);
						$('#agama_lain_input_anak').val(data.pasien.agama).attr('disabled', false);
					} else if (data.pasien.agama == 'Lain-lain') {
						$('#agama_lain_anak').prop('checked', true).attr('disabled', false);
						syams_validation('#agama_lain_input_anak', 'Masukkan agama lain').attr('disabled', false);
					}						

					if (data.pasien.alergi !== null) { $('#riwayat_alergi').val(data.pasien.alergi).attr('readonly', true) };
				}
			
				if (data.layanan !== null) {
					$('#waktu_masuk_anak').val((data.layanan.waktu_konfirmasi_ranap !== null ? datetimefmysql(data.layanan.waktu_konfirmasi_ranap) : '<?= date('d/m/Y H:i:s') ?>'));
					if (data.layanan.before !== null) {
						if (data.layanan.before.jenis_layanan == 'Poliklinik') { $('#cara_masuk_irj_anak').prop('checked', true).attr('disabled', false) }
						if (data.layanan.before.jenis_layanan == 'IGD') { $('#cara_masuk_igd_anak').prop('checked', true).attr('disabled', false) }
						if (data.layanan.before.jenis_layanan == 'Hemodialisa') { $('#cara_masuk_lain_anak').prop('checked', true).attr('disabled', false) }
						if (data.layanan.before.jenis_layanan == 'Hemodialisa') { $('#cara_masuk_lain_input_anak').val(data.layanan.before.jenis_layanan) }
					}
				}	
				
				$('#desclaimer_history_anak').html('');
				$('#btn_history_logs_anak').hide();
				if (data.kajian_perawat_anak !== null) {
					if (data.kajian_perawat_anak.update_date !== null) {
						$('#desclaimer_history_anak').html('*) Ada Perubahan Data');
						$('#btn_history_logs_anak').show();
						$('#btn_history_logs_anak').attr('onclick', 'showHistoryLogsAnak('+id_layanan_pendaftaran+')');	
					}

					showKajianPerawatAnak(data.kajian_perawat_anak);
					var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
					if (profesi == 'Dokter Umum' | profesi == 'Dokter Spesialis' | profesi == 'Bidan' | profesi == 'Perawat' | profesi == 'Fisioterapis' | profesi == 'Nutrisionis') {
						$('#btn_simpan').show();
					} else {
						$('#btn_simpan').hide();
					}

				}	
				
				if (data.kajian_medis_anak !== null) {
					showKajianMedisAnak(data.kajian_medis_anak);
				}

				$('#anak_bed').text(bed);

				$('.logo-pasien-alergi').hide();
				if (data.profil !== null) {
                        // status profil pasien
					if (data.profil.is_alergi == 'Ya') {
						$('.logo-pasien-alergi').show();
					}
				}

				$('#modal_pengkajian_anak').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	
	function showKajianPerawatAnak(data) {
		$('#id_kajian_keperawatan_anak').val(data.id);
		$('#waktu_kajian_perawat_anak').val((data.waktu_pengkajian_anak !== null ? datetimefmysql(data.waktu_pengkajian_anak) : ''));
		// $('#waktu_kajian_perawat_old').val((data.waktu_pengkajian !== null ? datetimefmysql(data.waktu_pengkajian) : ''));
		
		// cara_tiba_diruangan
		if (data.cara_tiba_diruangan_anak === 'Jalan') { $('#cara_tiba_diruangan_anak_jalan').prop('checked', true).change() }
		if (data.cara_tiba_diruangan_anak === 'Brankar') { $('#cara_tiba_diruangan_anak_brankar').prop('checked', true).change() }
		if (data.cara_tiba_diruangan_anak === 'Kursi Roda') { $('#cara_tiba_diruangan_anak_kursi_roda').prop('checked', true).change() }
		// end cara_tiba_diruangan
		

		//Data Kesehatan Pasien 
		// informasi diperoleh dari
		var informasi = JSON.parse(data.informasi_dari_anak);
		if (informasi.pasien !== '') { $('#informasi_dari_pasien_anak').prop('checked', true) }
		if (informasi.keluarga !== '') { $('#informasi_dari_keluarga_anak').prop('checked', true) }
		if (informasi.lain !== '') { 
			$('#informasi_dari_lain_anak').prop('checked', true);  
			$('#informasi_dari_lain_anak_inputt').val(informasi.ket_lain).attr('disabled', false);
			// $('#informasi_dari_lain_anak_input').val(informasi.ket_lain);
		}
		
		// end informasi diperoleh dari	
		
		$('#keluhan_utama_pengkajian_awal_anak').val(data.keluhan_utama_anak);
		$('#mulai_timbul_keluhan_anak').val(data.timbul_keluhan_anak);
		$('#lama_keluhan_anak').val(data.lama_keluhan_anak);

		// faktor pencetus
		var faktor_pencetus = JSON.parse(data.faktor_pencetus_anak);
		if (faktor_pencetus.infeksi !== '') { $('#faktor_pencetus_infeksi_anak').prop('checked', true) }
		if (faktor_pencetus.lain !== '') { 
			$('#faktor_pencetus_lain_anak').prop('checked', true);  
			$('#faktor_pencetus_lain_input_anak').val(faktor_pencetus.ket_lain).attr('disabled', false);
		}
		// end faktor pencetus

		// sifat keluhan
		if (data.sifat_keluhan_anak === 'Akut') { $('#sifat_keluhan_anak_akut').prop('checked', true).change() }
		if (data.sifat_keluhan_anak === 'Kronik') { $('#sifat_keluhan_anak_kronik').prop('checked', true).change() }
		// end sifat keluhan

		$('#riwayat_penyakit_sekarang_anak').val(data.riwayat_penyakit_sekarang_anak);

		// riwayat penyakit terdahulu
		var rpt = JSON.parse(data.riwayat_penyakit_terdahulu);
		if (rpt.asma !== '') { $('#rpt_asma_anak').prop('checked', true) }
		if (rpt.hipertensi !== '') { $('#rpt_hipertensi_anak').prop('checked', true) }
		if (rpt.jantung !== '') { $('#rpt_jantung_anak').prop('checked', true) }
		if (rpt.diabetes !== '') { $('#rpt_diabetes_anak').prop('checked', true) }
		if (rpt.hepatitis !== '') { $('#rpt_hepatitis_anak').prop('checked', true) }
		if (rpt.lain !== '') { 
			$('#rpt_lain_anak').prop('checked', true);  
			$('#rpt_lain_anak_input').val(rpt.ket_lain).attr('disabled', false);
		}
		// end riwayat penyakit terdahulu
		
		// riwayat penyakit keluarga
		var rpk = JSON.parse(data.riwayat_penyakit_keluarga);
		if (rpk.asma !== '') { $('#rpk_asma_anak').prop('checked', true) }
		if (rpk.hipertensi !== '') { $('#rpk_hipertensi_anak').prop('checked', true) }
		if (rpk.jantung !== '') { $('#rpk_jantung_anak').prop('checked', true) }
		if (rpk.diabetes !== '') { $('#rpk_diabetes_anak').prop('checked', true) }
		if (rpk.hepatitis !== '') { $('#rpk_hepatitis_anak').prop('checked', true) }
		if (rpk.lain !== '') { 
			$('#rpk_lain_anak').prop('checked', true);  
			$('#rpk_lain_anak_input').val(rpk.ket_lain).attr('disabled', false);
		}
		// end riwayat penyakit keluarga
		
		// pernah dirawat
		var pernah_dirawat = JSON.parse(data.pernah_dirawat_anak);
		if (pernah_dirawat.dirawat === '0') { $('#pernah_dirawat_anak_tidak').prop('checked', true).change() }
		if (pernah_dirawat.dirawat === '1') { $('#pernah_dirawat_anak_ya').prop('checked', true).change() }
		$('#pernah_dirawat_anak_kapan').val(pernah_dirawat.kapan);
		$('#pernah_dirawat_anak_dimana').val(pernah_dirawat.dimana);
		// end pernah dirawat

		//Obat dari luar 
		if (data.obat_dari_luar_anak === '1') { $('#obat_luar_anak_ya').prop('checked', true).change() }
		if (data.obat_dari_luar_anak === '0') { $('#obat_luar_anak_tidak').prop('checked', true).change() }
		//end obat dari luar 

		// Riwayat Alergi Pasien
		// alergi
		if (data.alergi_anak === '0') { $('#alergi_anak_tidak').prop('checked', true).change() }
		if (data.alergi_anak === '1') { $('#alergi_anak_ya').prop('checked', true).change() }
		if (data.alergi_anak === '2') { $('#alergi_anak_tidak_tahu').prop('checked', true).change() }
		$('#alergi_obat_anak').val(data.alergi_obat_anak);
		$('#alergi_obat_anak_reaksi').val(data.alergi_obat_reaksi_anak);
		$('#alergi_makanan_anak').val(data.alergi_makanan_anak);
		$('#alergi_makanan_anak_reaksi').val(data.alergi_makanan_reaksi_anak);
		// end alergi

		// Riwayat Kelahiran
		$('#usia_kehamilan_anak').val(data.usia_kehamilan);
		$('#berat_badan_anak').val(data.berat_badan_lahir);
		$('#panjang_badan_lahir_anak').val(data.panjang_badan_lahir);

		if (data.riwayat_kelahiran_anak === 'Spontan') { $('#riwayat_kelahiran_anak_spontan').prop('checked', true).change() }
		if (data.riwayat_kelahiran_anak === 'Operasi') { $('#riwayat_kelahiran_anak_operasi').prop('checked', true).change() }
		if (data.riwayat_kelahiran_anak === 'Cukup Bulan') { $('#riwayat_kelahiran_anak_cukup_bulan').prop('checked', true).change() }
		if (data.riwayat_kelahiran_anak === 'Kurang Bulan') { $('#riwayat_kelahiran_anak_kurang_bulan').prop('checked', true).change() }

		if (data.menangis === '1') { $('#menangis_anak_ya').prop('checked', true).change() }
		if (data.menangis === '0') { $('#menangis_anak_tidak').prop('checked', true).change() }

		if (data.riwayat_kuning === '1') { $('#riwayat_kuning_anak_ya').prop('checked', true).change() }
		if (data.riwayat_kuning === '0') { $('#riwayat_kuning_anak_tidak').prop('checked', true).change() }

		// Riwayat Imunisasi Dasar
		var riwayat_imunisasi = JSON.parse(data.riwayat_imunisasi);
		if (riwayat_imunisasi.lengkap !== '') { $('#riwayat_imunisasi_anak_lengkap').prop('checked', true) }
		if (riwayat_imunisasi.tidak_pernah !== '') { $('#riwayat_imunisasi_anak_tidak_pernah').prop('checked', true) }
		if (riwayat_imunisasi.tidak_lengkap !== '') { 
			$('#riwayat_imunisasi_anak_tidak_lengkap').prop('checked', true);  
			$('#riwayat_imunisasi_anak_lain').val(riwayat_imunisasi.imunisasi_lain).attr('disabled', false);
		}

		// Status Fungsional		
		if (data.stts_fungsional_mandiri === '1') { $('#status_fungsional_mandiri_anak_ya').prop('checked', true).change() }
		if (data.stts_fungsional_mandiri === '0') { $('#status_fungsional_mandiri_anak_tidak').prop('checked', true).change() }
		
		if (data.stts_fungsional_ketergantungan === '0') { $('#ketergantungan_total_anak_tidak').prop('checked', true).change() }
		if (data.stts_fungsional_ketergantungan === '1') { $('#ketergantungan_total_anak_ya').prop('checked', true).change() }
		// $('#ketergantungan_total_anak_ya').val(data.stts_fungsional_ketergantungan);
		$('#ketergantungan_total_anak_input').val(data.stts_fungsional_ket_ketergantungan);

		if (data.stts_fungsional_perlu_bantuan === '0') { $('#perlu_bantuan_anak_tidak').prop('checked', true).change() }
		if (data.stts_fungsional_perlu_bantuan === '1') { $('#perlu_bantuan_anak_ya').prop('checked', true).change() }
		// $('#perlu_bantuan_anak_ya').val(data.stts_fungsional_perlu_bantuan);
		$('#perlu_bantuan_anak_input').val(data.stts_fungsional_ket_perlu_bantuan);

		// Riwayat Tumbuh Kembang
		$('#rtk_asi_anak').val(data.asi_anak);
		$('#rtk_susu_formula_anak').val(data.susu_formula);
		$('#rtk_tengkurep_anak').val(data.tengkurap);
		$('#rtk_tumbuh_gigi_anak').val(data.tumbuh_gigi);
		$('#rtk_bicara_anak').val(data.rtk_bicara);
		$('#rtk_duduk_anak').val(data.rtk_duduk);
		$('#rtk_berdiri_anak').val(data.rtk_berdiri);
		$('#rtk_berjalan_anak').val(data.rtk_berjalan);

		//Psikososial
		//Status Psikologi
		var status_psikologi_anak = JSON.parse(data.status_psikologi_anak);
		if (status_psikologi_anak.cemas !== '') { $('#sps_cemas_anak').prop('checked', true) }
		if (status_psikologi_anak.takut !== '') { $('#sps_takut_anak').prop('checked', true) }
		if (status_psikologi_anak.marah !== '') { $('#sps_marah_anak').prop('checked', true) }
		if (status_psikologi_anak.sedih !== '') { $('#sps_sedih_anak').prop('checked', true) }
		if (status_psikologi_anak.bunuh_diri !== '') { $('#sps_bunuh_diri_anak').prop('checked', true) }
		if (status_psikologi_anak.lain !== '') { 
			$('#sps_lain_anak').prop('checked', true);  
			$('#sps_lain_input_anak').val(status_psikologi_anak.ket_lain).attr('disabled', false);
		}

		if (data.hubungan_dengan_orang_tua === '1') { $('#hubungan_dengan_orang_tua_anak_baik').prop('checked', true).change() }
		if (data.hubungan_dengan_orang_tua === '0') { $('#hubungan_dengan_orang_tua_anak_tidak_baik').prop('checked', true).change() }
		
		if (data.tempat_tinggal_anak === 'Rumah') { $('#tempat_tinggal_anak_rumah').prop('checked', true).change() }
		if (data.tempat_tinggal_anak === 'Apartemen') { $('#tempat_tinggal_anak_apart').prop('checked', true).change() }
		if (data.tempat_tinggal_anak === 'Panti') { $('#tempat_tinggal_anak_panti').prop('checked', true).change() }

		if (data.tempat_tinggal_anak === 'Lain') { $('#tempat_tinggal_anak_lain').prop('checked', true).change() }

		// $('#tempat_tinggal_anak_lain').val(data.tempat_tinggal_anak);
		$('#tempat_tinggal_anak_lain_inputi').val(data.ket_tempat_tinggal_anak);

		$('#pekerjaan_ayah').val(data.pekerjaan_ayah);
		$('#pekerjaan_ibu').val(data.pekerjaan_ibu);

		if (data.cara_bayar === 'Sendiri') { $('#cara_bayar_anak_biaya_sendiri').prop('checked', true).change() }
		if (data.cara_bayar === 'BPJS') { $('#cara_bayar_anak_bpjs').prop('checked', true).change() }
		if (data.cara_bayar === 'Asuransi') { $('#cara_bayar_anak_asuransi').prop('checked', true).change() }
		$('#cara_bayar_anak_asuransi_input').val(data.ket_cara_bayar_lain);
		if (data.cara_bayar_anak_t === 'Lain') { $('#cara_bayar_anak_lain').prop('checked', true).change() }
		$('#cara_bayar_anak_lain_input').val(data.ket_cara_bayar_lain);


		// $('#cara_bayar_anak_asuransi').val(data.cara_bayar);
		
		

		// $('#cara_bayar_anak_lain').val(data.cara_bayar);
		// if (data.cara_bayar_anak_t !== null) {$('#cara_bayar_anak_lain').prop('checked', true).change()}

		// if (data.cara_bayar !== null) {$('#cara_bayar_anak_lain ').prop('checked', true) }
		

		if (data.agama_anak === 'Islam') { $('#agama_anak_islam').prop('checked', true).change() }
		if (data.agama_anak === 'Kristen') { $('#agama_anak_kristen').prop('checked', true).change() }
		if (data.agama_anak === 'Hindu') { $('#agama_anak_hindu').prop('checked', true).change() }
		if (data.agama_anak === 'Katholik') { $('#agama_anak_katholik').prop('checked', true).change() }
		if (data.agama_anak === 'Budha') { $('#agama_anak_budha').prop('checked', true).change() }

		if (data.agama_anak === 'Lain') { $('#agama_anak_lain').prop('checked', true).change() }

		// $('#agama_anak_lain').val(data.agama_anak);
		$('#agama_anak_lain_input').val(data.ket_agama_lain_anak);

		$('#kegiatan_keagamaan_anak').val(data.kegiatan_agama_dilakukan);
		$('#kegiatan_spiritual_perawatan_anak').val(data.kegiatan_spiritual_dilakukan);

		if (data.wajib_ibadah_anak === 'Baligh') { $('#wajib_ibadah_anak_baligh').prop('checked', true).change() }
		if (data.wajib_ibadah_anak === 'Belum Baligh') { $('#wajib_ibadah_anak_belum').prop('checked', true).change() }
		if (data.wajib_ibadah_anak === 'Halangan') { $('#wajib_ibadah_anak_halangan').prop('checked', true).change() }
		$('#wajib_ibadah_anak_halangan_input').val(data.ket_wajib_ibadah_halangan_anak);

		if (data.thaharoh_anak === 'Berwudhu') { $('#thaharoh_anak_berwudhu').prop('checked', true).change() }
		if (data.thaharoh_anak === 'Tayamum') { $('#thaharoh_anak_tayamum').prop('checked', true).change() }
		
		if (data.sholat_anak === 'Berdiri') { $('#sholat_anak_berdiri').prop('checked', true).change() }
		if (data.sholat_anak === 'Duduk') { $('#sholat_anak_duduk').prop('checked', true).change() }
		if (data.sholat_anak === 'Berbaring') { $('#sholat_anak_berbaring').prop('checked', true).change() }

		// Identifikasi Kebutuhan Komunikasi
		if (data.kewarganegaraan_anak === 'WNI') { $('#kewarganegaraan_anak_wni').prop('checked', true).change() }
		if (data.kewarganegaraan_anak === 'WNA') { $('#kewarganegaraan_anak_wna').prop('checked', true).change() }

		if (data.pemahaman_penyakit === '1') { $('#pt_penyakit_perawatan_anak_ya').prop('checked', true).change() }
		if (data.pemahaman_penyakit === '0') { $('#pt_penyakit_perawatan_anak_tidak').prop('checked', true).change() }

		$('#suku_bangsa_anak').val(data.suku_bangsa);

		if (data.pemahaman_pengobatan === '1') { $('#pt_pengobatan_anak_ya').prop('checked', true).change() }
		if (data.pemahaman_pengobatan === '0') { $('#pt_pengobatan_anak_tidak').prop('checked', true).change() }

		if (data.bicara_anak === '1') { $('#bicara_anak_normal').prop('checked', true).change() }
		if (data.bicara_anak === '0') { $('#bicara_anak_gangguan').prop('checked', true).change() }
		// $('#bicara_anak_gangguan').val(data.bicara_anak);
		$('#bicara_input_anak').val(data.ket_bicara_anak);

		if (data.perlu_penterjemah === '1') { $('#perlu_penterjemah_anak_ya').prop('checked', true).change() }
		if (data.perlu_penterjemah === '0') { $('#perlu_penterjemah_anak_tidak').prop('checked', true).change() }
		// $('#perlu_penterjemah_anak_tidak').val(data.perlu_penterjemah);
		$('#perlu_penterjemah_anak_input').val(data.ket_penterjemah);

		if (data.bahasa_isyarat === '1') { $('#bahasa_isyarat_anak_ya').prop('checked', true).change() }
		if (data.bahasa_isyarat === '0') { $('#bahasa_isyarat_anak_tidak').prop('checked', true).change() }

		
		if (data.hanbatan_belajar_w === '1') { $('#hanbatan-belajar-w-ya').prop('checked', true).change() }
		if (data.hanbatan_belajar_w === '0') { $('#hanbatan-belajar-w-tidak').prop('checked', true).change() }

		$('#pendidikan_anak').val(data.pendidikan_anak);
		$('#h-menerima-edikasi-w').val(data.h_menerima_edikasi_w); 

		if (data.pemahaman_nutrisi_diet === '1') { $('#pt_nutrisi_diet_anak_ya').prop('checked', true).change() }
		if (data.pemahaman_nutrisi_diet === '0') { $('#pt_nutrisi_diet_anak_tidak').prop('checked', true).change() }

		if (data.pemahaman_spiritual === '1') { $('#pt_spiritual_anak_ya').prop('checked', true).change() }
		if (data.pemahaman_spiritual === '0') { $('#pt_spiritual_anak_tidak').prop('checked', true).change() }

		if (data.pemahaman_peralatan_medis === '1') { $('#pt_peralatan_medis_anak_ya').prop('checked', true).change() }
		if (data.pemahaman_peralatan_medis === '0') { $('#pt_peralatan_medis_anak_tidak').prop('checked', true).change() }

		if (data.pemahaman_rehab_medik === '1') { $('#pt_rehab_medik_anak_ya').prop('checked', true).change() }
		if (data.pemahaman_rehab_medik === '0') { $('#pt_rehab_medik_anak_tidak').prop('checked', true).change() }

		if (data.pemahaman_manajemen_nyeri === '1') { $('#pt_manajemen_nyeri_anak_ya').prop('checked', true).change() }
		if (data.pemahaman_manajemen_nyeri === '0') { $('#pt_manajemen_nyeri_anak_tidak').prop('checked', true).change() }

		// Pemeriksaan Fisik
		// kesadaran
		var kesadaran = JSON.parse(data.kesadaran);
		if (kesadaran.composmentis !== '') { $('#composmentis_anak').prop('checked', true) }
		if (kesadaran.apatis !== '') { $('#apatis_anak').prop('checked', true) }
		if (kesadaran.samnolen !== '') { $('#samnolen_anak').prop('checked', true) }
		if (kesadaran.sopor !== '') { $('#sopor_anak').prop('checked', true) }
		if (kesadaran.koma !== '') { $('#koma_anak').prop('checked', true) }
	
		// GCS
		$('#gcs_e_anak').val(kesadaran.gcs_e);
		$('#gcs_m_anak').val(kesadaran.gcs_m);
		$('#gcs_v_anak').val(kesadaran.gcs_v);
		$('#gcsm-total').val(kesadaran.gcsm_total);
		// end kesadaran  di gabungin dari awal x wh

		$('#pa_tensi_sis_anak').val(data.tensi_sistolik_awal);
		$('#pa_tensi_dis_anak').val(data.tensi_diastolik_awal);
		$('#pa_nadi_anak').val(data.nadi_awal);
		$('#pa_suhu_anak').val(data.suhu_awal);
		$('#pa_nafas_anak').val(data.nafas_awal_anak);
		$('#berat_badan_awal').val(data.berat_badan_awal);
		$('#tinggi_awal_anak').val(data.tinggi_badan_anak);
		$('#lingkar_kepala_anak').val(data.lingkar_kepala_anak);
		$('#lingkar_dada_anak').val(data.lingkar_dada_anak);
		$('#lingkar_perut_anak').val(data.lingkar_perut_anak);

		if (data.gangguan_neurologis === '0') { $('#gangguan_neurologis_tidak').prop('checked', true).change() }
		if (data.gangguan_neurologis === '1') { $('#gangguan_neurologis_ya').prop('checked', true).change() }
		// $('#gangguan_neurologis_ya').val(data.gangguan_neurologis);
		$('#gangguan_neurologis_input').val(data.ket_gangguan_neurologis);

		//Sistem Pernafasan
		if (data.irama_nafas === 'Reguler') { $('#irama_nafas_anak_reguler').prop('checked', true).change() }
		if (data.irama_nafas === 'Irreguler') { $('#irama_nafas_anak_irreguler').prop('checked', true).change() }

		if (data.retraksi_dada === '1') { $('#retraksi_dada_anak_ya').prop('checked', true).change() }
		if (data.retraksi_dada === '0') { $('#retraksi_dada_anak_tidak').prop('checked', true).change() }

		if (data.bentuk_dada === '1') { $('#bentuk_dada_anak_normal').prop('checked', true).change() }
		if (data.bentuk_dada === '0') { $('#bentuk_dada_anak_tidak_normal').prop('checked', true).change() }
		// $('#bentuk_dada_anak_normal').val(data.bentuk_dada);
		$('#bentuk_dada_anak_input').val(data.ket_bentuk_dada);

		if (data.pola_nafas === '0') { $('#pola_nafas_anak_tidak_normal').prop('checked', true).change() }
		if (data.pola_nafas === '1') { $('#pola_nafas_anak_normal').prop('checked', true).change() }
		// $('#pola_nafas_anak_normal').val(data.pola_nafas);
		$('#pola_nafas_anak_input').val(data.ket_pola_nafas);

		if (data.suara_nafas === '0') { $('#suara_nafas_anak_tidak_normal').prop('checked', true).change() }
		if (data.suara_nafas === '1') { $('#suara_nafas_anak_normal').prop('checked', true).change() }
		// $('#suara_nafas_anak_normal').val(data.suara_nafas);
		$('#suara_nafas_anak_input').val(data.ket_suara_nafas);

		if (data.nafas_cuping_hidung === '1') { $('#nafas_cuping_hidung_ya').prop('checked', true).change() }
		if (data.nafas_cuping_hidung === '0') { $('#nafas_cuping_hidung_tidak').prop('checked', true).change() }

		if (data.sianosis_nafas === '1') { $('#sianosis_nafas_anak_ya').prop('checked', true).change() }
		if (data.sianosis_nafas === '0') { $('#sianosis_nafas_anak_tidak').prop('checked', true).change() }

		if (data.alat_bantu_nafas === 'Spontan') { $('#alat_bantu_nafas_anak_spontan').prop('checked', true).change() }
		if (data.alat_bantu_nafas === 'Kanul') { $('#alat_bantu_nafas_anak_kanul').prop('checked', true).change() }
		$('#alat_bantu_nafas_anak_kanul_input').val(data.ket_kanul);
		if (data.alat_bantu_nafas_anak_t === 'Ventilator') { $('#alat_bantu_nafas_anak_ventilator').prop('checked', true).change() }
		$('#alat_bantu_nafas_anak_ventilator_input').val(data.ket_ventilator);

	
		//Sirkulasi
		if (data.sirkulasi_sianosis === '1') { $('#sirkualsi_sianosis_ya').prop('checked', true).change() }
		if (data.sirkulasi_sianosis === '0') { $('#sirkualsi_sianosis_tidak').prop('checked', true).change() }

		if (data.sirkulasi_pucat === '1') { $('#pucat_anak_ya').prop('checked', true).change() }
		if (data.sirkulasi_pucat === '0') { $('#pucat_anak_tidak').prop('checked', true).change() }

		// if (data.intensitas_nadi === 'Kuat') { $('#intensitas_nadi_anak_kuat').prop('checked', true).change() }
		// if (data.intensitas_nadi === 'Lemah') { $('#intensitas_nadi_anak_lemah').prop('checked', true).change() }
		// if (data.intensitas_nadi === 'Bounding') { $('#itensitas_nadi_anak_bounding').prop('checked', true).change() }

		var intensitas_nadi = JSON.parse(data.intensitas_nadi);
		if (intensitas_nadi.Kuat !== '') { $('#intensitas_nadi_anak_kuat').prop('checked', true) }
		if (intensitas_nadi.Lemah !== '') { $('#intensitas_nadi_anak_lemah').prop('checked', true) }
		if (intensitas_nadi.Bounding !== '') { $('#itensitas_nadi_anak_bounding').prop('checked', true) }
		
		// if (data.intensitas_nadi !== null) { $('#intensitas_nadi_anak_kuat').prop('checked', true) }
		// if (data.intensitas_nadi !== null) { $('#intensitas_nadi_anak_lemah').prop('checked', true) }
		// if (data.intensitas_nadi !== null) { $('#itensitas_nadi_anak_bounding').prop('checked', true) }

		// const intensitas_nadi = JSON.parse(data.intensitas_nadi); 
        // if (data.Kuat !== null) { $('#intensitas_nadi_anak_kuat').prop('checked', true) }
		// if (data.Lemah !== null) { $('#intensitas_nadi_anak_lemah').prop('checked', true) }
		// if (data.Bounding !== null) { $('#itensitas_nadi_anak_bounding').prop('checked', true) }

		if (data.irama_nadi === 'Reguler') { $('#irama_nadi_anak_reguler').prop('checked', true).change() }
		if (data.irama_nadi === 'Irreguler') { $('#irama_nadi_anak_irreguler').prop('checked', true).change() }

		if (data.sirkulasi_edema === '1') { $('#edema_anak_ya').prop('checked', true).change() }
		if (data.sirkulasi_edema === '0') { $('#edema_anak_tidak').prop('checked', true).change() }

		if (data.sirkulasi_akral === 'Hangat') { $('#akral_anak_hangat').prop('checked', true).change() }
		if (data.sirkulasi_akral === 'Dingin') { $('#akral_anak_dingin').prop('checked', true).change() }

		if (data.sirkulasi_crt === 'Kurang dari 3') { $('#crt_anak_ya').prop('checked', true).change() }
		if (data.sirkulasi_crt === 'Lebih dari 3') { $('#crt_anak_tidak').prop('checked', true).change() }

		if (data.nafas_cuping_hidung === '1') { $('#clubing_finger_anak_ya').prop('checked', true).change() }
		if (data.nafas_cuping_hidung === '0') { $('#clubing_finger_anak_tidak').prop('checked', true).change() }

		//Gastrointestinal
		var gastro_mulut = JSON.parse(data.gastro_mulut);
		if (gastro_mulut.mukosa_lembab !== '') { $('#mukosa_lembab_anak').prop('checked', true) }
		if (gastro_mulut.mukosa_kering !== '') { $('#mukosa_kering_anak').prop('checked', true) }
		if (gastro_mulut.stomatitis !== '') { $('#stomatitis_anak').prop('checked', true) }
		if (gastro_mulut.labio !== '') { $('#labio_anak').prop('checked', true) }
		if (gastro_mulut.pendarahan_gusi !== '') { $('#pendarahan_gusi_anak').prop('checked', true) }
		if (gastro_mulut.mulut_lainnya !== '') { $('#mulut_lainnya').prop('checked', true);  
			$('#mulut_lainnya_input').val(gastro_mulut.ket_gastro_mulut).attr('disabled', false);
		// if (gastro_mulut.ket_gastro_mulut !== null) {$('#mulut_lainnya_input').val(gastro_mulut.ket_gastro_mulut);}
		}

		// const gastro_mulut = JSON.parse(data.gastro_mulut); 
		// if (gastro_mulut.mukosa_lembab_anak !== null) { $('#mukosa_lembab_anak').prop('checked', true) }
		// if (gastro_mulut.mukosa_kering_anak !== null) { $('#mukosa_kering_anak').prop('checked', true) }
		// if (gastro_mulut.stomatitis_anak !== null) { $('#stomatitis_anak').prop('checked', true) }
		// if (gastro_mulut.labio_anak !== null) { $('#labio_anak').prop('checked', true) }
		// if (gastro_mulut.pendarahan_gusi_anak !== null) { $('#pendarahan_gusi_anak').prop('checked', true) }
		// if (gastro_mulut.mulut_lainnya !== null) { $('#mulut_lainnya').prop('checked', true) }
		// if (gastro_mulut.mulut_lainnya_input !== null) {$('#mulut_lainnya_input').val(gastro_mulut.mulut_lainnya_input);}

		if (data.gastro_muntah === '0') { $('#muntah_anak_tidak').prop('checked', true).change() }
		if (data.gastro_muntah === '1') { $('#muntah_anak_ya').prop('checked', true).change() }
		// $('#muntah_anak_ya').val(data.gastro_muntah);
		$('#muntah_anak_lainnya').val(data.ket_gastro_muntah);

		if (data.gastro_mual === '1') { $('#mual_anak_ya').prop('checked', true).change() }
		if (data.gastro_mual === '0') { $('#mual_anak_tidak').prop('checked', true).change() }

		if (data.gastro_ascites === '1') { $('#ascites_anak_ya').prop('checked', true).change() }
		if (data.gastro_ascites === '0') { $('#ascites_anak_tidak').prop('checked', true).change() }

		if (data.gastro_nyeri_ulu_hati === '1') { $('#nyeri_ulu_hati_anak_ya').prop('checked', true).change() }
		if (data.gastro_nyeri_ulu_hati === '0') { $('#nyeri_ulu_hati_anak_tidak').prop('checked', true).change() }

		$('#peristaltik_usus_anak').val(data.gastro_peristaltik);
		//Eliminasi - BAB
		var bab_pengeluaran = JSON.parse(data.bab_pengeluaran);
		if (bab_pengeluaran.anus !== '') { $('#pengeluaran_anus').prop('checked', true) }
		if (bab_pengeluaran.stomata !== '') { $('#pengeluaran_stomata').prop('checked', true)		
			$('#pengeluaran_stomata_lokasi').val(bab_pengeluaran.lainnya).attr('disabled', false);
			// $('#pengeluaran_stomata_lokasi').val(bab_pengeluaran.ket_pengeluaran);
		}	
		
		// const bab_pengeluaran = JSON.parse(data.bab_pengeluaran); 
		// if (bab_pengeluaran.pengeluaran_anus !== null) { $('#pengeluaran_anus').prop('checked', true) }
		// if (bab_pengeluaran.pengeluaran_stomata !== null) { $('#pengeluaran_stomata').prop('checked', true) }
		// if (bab_pengeluaran.pengeluaran_stomata_lokasi !== null) {$('#pengeluaran_stomata_lokasi').val(bab_pengeluaran.pengeluaran_stomata_lokasi);}

		$('#frekuensi_bab').val(data.bab_frekuensi);

		$('#konsistensi-anak').val(data.konsistensi_anak);




		// const normal_anak = JSON.parse if (data.normal_anak);                
		// if (normal_anak.normal_anak_1 !== null) {$('#normal-anak-1').prop('checked', true)}
		// if (normal_anak.normal_anak_2 !== null) {$('#normal-anak-2').prop('checked', true)}
		// if (normal_anak.normal_anak_3 !== null) {$('#normal-anak-3').prop('checked', true)}
		// if (normal_anak.normal_anak_4 !== null) {$('#normal-anak-4').prop('checked', true)}
		// if (normal_anak.normal_anak_5 !== null) {$('#normal-anak-5').prop('checked', true)}
		// if (normal_anak.normal_anak_6 !== null) {$('#normal-anak-6').prop('checked', true)}




		// INI CONTOH YANG BENAR KETIKA JIKA DATA BENTUKNYA NULL GABUNG KE JZON PARSE
		if (data.normal_anak = null) {   
			const normal_anak = JSON.parse(data.normal_anak)  
			if (normal_anak.normal_anak_1 !== null) {$('#normal-anak-1').prop('checked', true)}
			if (normal_anak.normal_anak_2 !== null) {$('#normal-anak-2').prop('checked', true)}
			if (normal_anak.normal_anak_3 !== null) {$('#normal-anak-3').prop('checked', true)}
			if (normal_anak.normal_anak_4 !== null) {$('#normal-anak-4').prop('checked', true)}
			if (normal_anak.normal_anak_5 !== null) {$('#normal-anak-5').prop('checked', true)}
			if (normal_anak.normal_anak_6 !== null) {$('#normal-anak-6').prop('checked', true)}
		}

		$('#konsistensi_bab').val(data.bab_konsistensi);



		// PAKEK YANG INI JUGA BISAAA
		// if (data.normal_anak !== null) {
		// 	const normal_anak = JSON.parse(data.normal_anak);

		// 	if (normal_anak.normal_anak_1 !== null) {
		// 		$('#normal-anak-1').prop('checked', true);
		// 	}
		// 	if (normal_anak.normal_anak_2 !== null) {
		// 		$('#normal-anak-2').prop('checked', true);
		// 	}
		// 	if (normal_anak.normal_anak_3 !== null) {
		// 		$('#normal-anak-3').prop('checked', true);
		// 	}
		// 	if (normal_anak.normal_anak_4 !== null) {
		// 		$('#normal-anak-4').prop('checked', true);
		// 	}
		// 	if (normal_anak.normal_anak_5 !== null) {
		// 		$('#normal-anak-5').prop('checked', true);
		// 	}
		// 	if (normal_anak.normal_anak_6 !== null) {
		// 		$('#normal-anak-6').prop('checked', true);
		// 	}
		// }












	

		//Eliminasi - BAK
		var bak_pengeluaran = JSON.parse(data.bak_pengeluaran);
		if (bak_pengeluaran.spontan !== '') { $('#pengeluaran_spontan_bak').prop('checked', true) }
		if (bak_pengeluaran.kateter_urine !== '') { $('#krakter_urine_bak').prop('checked', true)}
		if (bak_pengeluaran.cystostomy !== '') { $('#pengeluaran_cystostomy').prop('checked', true)}		

		if (data.bak_kelainan === '0') { $('#kelainan_bak_tidak').prop('checked', true).change() }
		if (data.bak_kelainan === '1') { $('#kelainan_bak_ada').prop('checked', true).change() }
		// $('#kelainan_bak_ada').val(data.bak_kelainan);
		$('#kelainan_bak_lainnya').val(data.bak_ket_kelainan);

		//Sistem Integumen
		var integumen_warna_kulit = JSON.parse(data.integumen_warna_kulit);
		if (integumen_warna_kulit.pucat !== '') { $('#si_warna_pucat_anak').prop('checked', true) }
		if (integumen_warna_kulit.kuning !== '') { $('#si_warna_kuniing_anak').prop('checked', true)}
		if (integumen_warna_kulit.normal !== '') { $('#si_warna_normal_anak').prop('checked', true)}
		if (integumen_warna_kulit.mootled !== '') { $('#si_warna_kulit_mootled').prop('checked', true)}

		if (data.integumen_kelainan === '1') { $('#kelainan_sistem_integumen_ya').prop('checked', true).change() }
		if (data.integumen_kelainan === '0') { $('#kelainan_sistem_integumen_tidak').prop('checked', true).change() }

		if (data.integumen_resiko_dubitus === '1') { $('#resiko_dekubitus_anak_ya').prop('checked', true).change() }
		if (data.integumen_resiko_dubitus === '0') { $('#resiko_dekubitus_anak_tidak').prop('checked', true).change() }

		if (data.integumen_luka === '1') { $('#luka_anak_ya').prop('checked', true).change() }
		if (data.integumen_luka === '0') { $('#luka_anak_tidak').prop('checked', true).change() }

		//Muskoskeletal
		if (data.kelainan_tulang === '0') { $('#kelainan_tulang_anak_tidak').prop('checked', true).change() }
		if (data.kelainan_tulang === '1') { $('#kelainan_tulang_anak_ya').prop('checked', true).change() }
		// $('#kelainan_tulang_anak_ya').val(data.kelainan_tulang);
		$('#kelainan_tulang_anak_lainnya').val(data.ket_kelainan_tulang);

		if (data.gerakan_anak === 'Bebas') { $('#gerakan_anak_beas').prop('checked', true).change() }
		if (data.gerakan_anak === 'Terbatas') { $('#gerakan_anak_terbatas').prop('checked', true).change() }

		if (data.gentalia_anak === '0') { $('#genetalia_anak_kelainan').prop('checked', true).change() }
		if (data.gentalia_anak === '1') { $('#genetalia_anak_normal').prop('checked', true).change() }
		// $('#genetalia_anak_kelainan').val(data.gentalia_anak);
		$('#genetalia_anak_lainnya').val(data.ket_gentalia_anak);

		//Skrining Nyeri

		if (data.nilai_tingkat_nyeri === 'Tidak Nyeri') { $('#ptn_keterangan_anak_tidak_nyeri').prop('checked', true).change() }
		if (data.nilai_tingkat_nyeri === 'Ringan') { $('#ptn_keterangan_anak_ringan').prop('checked', true).change() }
		if (data.nilai_tingkat_nyeri === 'Sedang') { $('#ptn_keterangan_anak_sedang').prop('checked', true).change() }
		if (data.nilai_tingkat_nyeri === 'Berat') { $('#ptn_keterangan_anak_berat').prop('checked', true).change() }

		// nyeri hilang
		var nyeri_hilang = JSON.parse(data.nyeri_hilang);
		if (nyeri_hilang.minum_obat !== '') { $('#ptn_minum_obat_anak').prop('checked', true) }
		if (nyeri_hilang.mendengarkan_musik !== '') { $('#ptn_mendengarkan_musik_anak').prop('checked', true) }
		if (nyeri_hilang.istirahat !== '') { $('#ptn_istirahat_anak').prop('checked', true) }
		if (nyeri_hilang.berubah_posisi !== '') { $('#ptn_berubah_posisi_anak').prop('checked', true) }
		if (nyeri_hilang.lain !== '') { 
			$('#ptn_lain_anak').prop('checked', true);  
			$('#ptn_lain_input_anak').val(nyeri_hilang.ket_lain).attr('disabled', false);
		}
		// end nyeri hilang

		$('#lokasi_nyeri_anak').val(data.lokasi_nyeri);
		$('#durasi_nyeri_anak').val(data.durasi_nyeri);
		$('#frekuensi_nyeri_anak').val(data.frekuensi_nyeri);

		//wajah
		if (data.sn_wajah_1 === '1') { 
			$('#ekspresi_wajah_anak_1').prop('checked', true); 
			$('#ekspresi_wajah_anak_1_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_wajah_2 === '2') { 
			$('#ekspresi_wajah_anak_2').prop('checked', true); 
			$('#ekspresi_wajah_anak_2_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_wajah_3 === '3') { 
			$('#ekspresi_wajah_anak_3').prop('checked', true); 
			$('#ekspresi_wajah_anak_3_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Kaki 
		if (data.sn_kaki_1 === '0') { 
			$('#kaki_anak_1').prop('checked', true); 
			$('#kaki_anak_1_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_kaki_2 === '1') { 
			$('#kaki_anak_2').prop('checked', true); 
			$('#kaki_anak_2_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_kaki_3 === '2') { 
			$('#kaki_anak_3').prop('checked', true); 
			$('#kaki_anak_3_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Aktivitas
		if (data.sn_aktivitas_1 === '0') { 
			$('#aktifitas_anak_1').prop('checked', true); 
			$('#aktifitas_anak_1_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_aktivitas_2 === '1') { 
			$('#aktifitas_anak_2').prop('checked', true); 
			$('#aktifitas_anak_2_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_aktivitas_3 === '2') { 
			$('#aktifitas_anak_3').prop('checked', true); 
			$('#aktifitas_anak_3_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Menangis
		if (data.sn_menangis_1 === '0') { 
			$('#ekspresi_menangis_anak_1').prop('checked', true); 
			$('#ekspresi_menangis_anak_1_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_menangis_2 === '1') { 
			$('#ekspresi_menangis_anak_2').prop('checked', true); 
			$('#ekspresi_menangis_anak_2_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_menangis_3 === '2') { 
			$('#ekspresi_menangis_anak_3').prop('checked', true); 
			$('#ekspresi_menangis_anak_3_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Bicara
		if (data.sn_bicara_1 === '0') { 
			$('#cara_biacara_anak_1').prop('checked', true); 
			$('#cara_biacara_anak_1_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_bicara_2 === '1') { 
			$('#cara_bicara_anak_2').prop('checked', true); 
			$('#ekspresi_menangis_anak_2_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.sn_bicara_3 === '2') { 
			$('#cara_bicara_anak_3').prop('checked', true); 
			$('#cara_bicara_anak_3_ya').prop('checked', true).attr('disabled', false).change() 
		}

		$('#skrining_jumlah_skor').val(data.sn_nilai_total);

		//Penilaian Resiko Jatuh
		//Umur
		if (data.prja_umur_1 === '4') { 
			$('#prja_riwayat_jatuh_anak_3_tahun_ya').prop('checked', true); 
			$('#prja_riwayat_jatuh_anak_3_tahun_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_umur_2 === '3') { 
			$('#prja_riwayat_jatuh_anak_7_tahun_ya').prop('checked', true); 
			$('#prja_riwayat_jatuh_anak_7_tahun_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_umur_3 === '2') { 
			$('#prja_riwayat_jatuh_anak_13_tahun_ya').prop('checked', true); 
			$('#prja_riwayat_jatuh_anak_13_tahun_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_umur_4 === '1') { 
			$('#prja_riwayat_jatuh_anak_lebih_13_ya').prop('checked', true); 
			$('#prja_riwayat_jatuh_anak_lebih_13_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Jenis Kelamin
		if (data.prja_jk_1 === '2') { 
			$('#prja_jk_laki_ya').prop('checked', true); 
			$('#prja_jk_laki_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_jk_2 === '1') { 
			$('#prja_jk_perempuan_ya').prop('checked', true); 
			$('#prja_jk_perempuan_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Diagnosis
		if (data.prja_diagnosis_1 === '4') { 
			$('#prja_diagnosis_neurologi_ya').prop('checked', true); 
			$('#prja_diagnosis_neurologi_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_diagnosis_2 === '3') { 
			$('#prja_diagnosis_respirator_ya').prop('checked', true); 
			$('#prja_diagnosis_respirator_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_diagnosis_3 === '2') { 
			$('#prja_diagnosis_perilaku_ya').prop('checked', true); 
			$('#prja_diagnosis_perilaku_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_diagnosis_4 === '1') { 
			$('#prja_diagnosis_lain_ya').prop('checked', true); 
			$('#prja_diagnosis_lain_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Gangguan Kognitif
		if (data.prja_kognitif_1 === '3') { 
			$('#prja_gk_keterbatasan_ya').prop('checked', true); 
			$('#prja_gk_keterbatasan_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_kognitif_2 === '2') { 
			$('#prja_gk_pelupa_ya').prop('checked', true); 
			$('#prja_gk_pelupa_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_kognitif_3 === '1') { 
			$('#prja_gk_daya_pikir_ya').prop('checked', true); 
			$('#prja_gk_daya_pikir_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Faktor Lingkungan
		if (data.prja_lingkungan_1 === '4') { 
			$('#prja_riwayat_jatuh_bayi_ya').prop('checked', true); 
			$('#prja_riwayat_jatuh_bayi_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_lingkungan_2 === '3') { 
			$('#prja_alat_bantu_pasien_ya').prop('checked', true); 
			$('#prja_alat_bantu_pasien_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_lingkungan_3 === '2') { 
			$('#prja_psaien_tempat_tidur_ya').prop('checked', true); 
			$('#prja_psaien_tempat_tidur_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_lingkungan_4 === '1') { 
			$('#prja_area_pasien_ya').prop('checked', true); 
			$('#prja_area_pasien_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Respon Terhadap Perbedaan		
		if (data.prja_respon_1 === '3') { 
			$('#prja_24_jam_ya').prop('checked', true); 
			$('#prja_24_jam_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_respon_2 === '2') { 
			$('#prja_48_jam_ya').prop('checked', true); 
			$('#prja_48_jam_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_respon_3 === '1') { 
			$('#prja_lebih_48_jam_ya').prop('checked', true); 
			$('#prja_lebih_48_jam_ya').prop('checked', true).attr('disabled', false).change() 
		}

		//Penggunaan Obat-obatan
		if (data.prja_obat_1 === '3') { 
			$('#prja_pengguanaan_obat_bersama_ya').prop('checked', true); 
			$('#prja_pengguanaan_obat_bersama_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_obat_2 === '2') { 
			$('#prja_penggunaan_salah_satu_obat_ya').prop('checked', true); 
			$('#prja_penggunaan_salah_satu_obat_ya').prop('checked', true).attr('disabled', false).change() 
		}
		if (data.prja_obat_3 === '1') { 
			$('#prja_tanpa_obat_ya').prop('checked', true); 
			$('#prja_tanpa_obat_ya').prop('checked', true).attr('disabled', false).change() 
		}

		$('#prja_nilai_total').val(data.prja_nilai_total);
		
		//Skrining Gizi 
		if (data.sg_nilai_1 === '1') { $('#sgizi_gizi_buruk_ya').prop('checked', true).change() }
		if (data.sg_nilai_1 === '0') { $('#sgizi_gizi_buruk_tidak').prop('checked', true).change() }

		if (data.sg_nilai_2 === '1') { $('#sgizi_penurunan_bb_ya').prop('checked', true).change() }
		if (data.sg_nilai_2 === '0') { $('#sgizi_penurunan_bb_tidak').prop('checked', true).change() }

		if (data.sg_nilai_3 === '1') { $('#sgizi_dua_kondisi_ya').prop('checked', true).change() }
		if (data.sg_nilai_3 === '0') { $('#sgizi_dua_kondisi_tidak').prop('checked', true).change() }

		if (data.sg_nilai_4 === '1') { $('#sgizi_malnutrisi_ya').prop('checked', true).change() }
		if (data.sg_nilai_4 === '0') { $('#sgizi_malnutrisi_tidak').prop('checked', true).change() }

		$('#sg_nilai_total').val(data.sgizi_jumlah);
		
		//Skrining gizi-daftar penyakit atau keadaan beresiko
		var daftar_penyakit_malnutrisi = JSON.parse(data.daftar_penyakit_malnutrisi);
		if (daftar_penyakit_malnutrisi.diare_persisten !== '') { $('#penyakit_diare').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.prematuris !== '') { $('#penyakit_prematuris').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.penyakit_jantung_bawaan !== '') { $('#penyakit_jantung_bawaan').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.kelainan_bawaan !== '') { $('#penyakit_kelainan_bawaan').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.wajah_dismorfik !== '') { $('#penyakit_wajah_aneh').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.penyakit_akut_berat !== '') { $('#penyakit_akut_berat').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.ginjal !== '') { $('#penyakit_ginjal_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.infeksi_hiv !== '') { $('#penyakit_hiv_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.kanker !== '') { $('#penyakit_kanker_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.penyakit_hati_kronik !== '') { $('#penyakit_hati_kronik_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.penyakit_ginjal_kronik !== '') { $('#penyakit_ginjal_kronik_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.terdapat_stoma !== '') { $('#penyakit_stoma_usus_halus').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.trauma !== '') { $('#penyakit_trauma_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.kontipasi_berulang !== '') { $('#penyakit_kontipasi_berulang_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.gagal_tumbuh !== '') { $('#penyakit_gagal_tumbuh_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.penyakit_metabolik !== '') { $('#penyakit_metabolik_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.retardasi_metabolik !== '') { $('#penyakit_retardasi_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.keterlambatan_perkembangan !== '') { $('#penyakit_keterlambatan_kembang_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.luka_bakar !== '') { $('#penyakit_luka_bakar_anak').prop('checked', true) }
		if (daftar_penyakit_malnutrisi.rencana_operasi !== '') { $('#penyakit_obesitas_anak').prop('checked', true) }

		// Skririning Pasien Akhir
		if (data.integumen_luka === '1') { $('#spak_1_anak_ya').prop('checked', true).change() }
		if (data.integumen_luka === '0') { $('#spak_1_anak_tidak').prop('checked', true).change() }

		if (data.integumen_luka === '1') { $('#spak_2_anak_ya').prop('checked', true).change() }
		if (data.integumen_luka === '0') { $('#spak_2_anak_tidak').prop('checked', true).change() }

		if (data.integumen_luka === '1') { $('#spak_3_anak_ya').prop('checked', true).change() }
		if (data.integumen_luka === '0') { $('#spak_3_anak_tidak').prop('checked', true).change() }

		if (data.integumen_luka === '1') { $('#spak_4_anak_ya').prop('checked', true).change() }
		if (data.integumen_luka === '0') { $('#spak_4_anak_tidak').prop('checked', true).change() }

		if (data.integumen_luka === '1') { $('#spak_5_anak_ya').prop('checked', true).change() }
		if (data.integumen_luka === '0') { $('#spak_5_anak_tidak').prop('checked', true).change() }

		// Populasi Khusus 
		// penyakit menular
		var penyakit_menular = JSON.parse(data.pk_penyakit_menular);
		if (penyakit_menular.penyakit_saat_ini === '0') { $('#pk_penyakit_menular_1_anak_tidak').prop('checked', true).change() }
		if (penyakit_menular.penyakit_saat_ini === '1') { $('#pk_penyakit_menular_1_anak_ya').prop('checked', true).change() }

		if (penyakit_menular.informasi_dari.dokter !== '') { $('#pk_pm_dokter_anak').prop('checked', true) }
		if (penyakit_menular.informasi_dari.perawat !== '') { $('#pk_pm_perawat_anak').prop('checked', true) }
		if (penyakit_menular.informasi_dari.keluarga !== '') { $('#pk_pm_keluarga_anak').prop('checked', true) }
		if (penyakit_menular.informasi_dari.lain !== '') { $('#pk_pm_lain_anak').prop('checked', true) }
		if (penyakit_menular.informasi_dari.ket_lain !== '') { $('#pk_pm_lain_anak_input').val(penyakit_menular.informasi_dari.ket_lain).attr('disabled', false) }

		if (penyakit_menular.informasi_jangka_waktu === '0') { $('#pk_penyakit_menular_3_anak_tidak').prop('checked', true).change() }
		if (penyakit_menular.informasi_jangka_waktu === '1') { $('#pk_penyakit_menular_3_anak_ya').prop('checked', true).change() }
		$('#pk_penyakit_menular_3_anak_input').val(penyakit_menular.ket_informasi_jangka_waktu);
	
		if (penyakit_menular.pemeriksaan_rutin === '0') { $('#pk_penyakit_menular_4_anak_tidak').prop('checked', true).change() }
		if (penyakit_menular.pemeriksaan_rutin === '1') { $('#pk_penyakit_menular_4_anak_ya').prop('checked', true).change() }
		$('#pk_penyakit_menular_4_anak_input').val(penyakit_menular.ket_pemeriksaan_rutin);
		
		if (penyakit_menular.cara_penularan.airbone !== '') { $('#pk_pm_airbone_anak').prop('checked', true) }
		if (penyakit_menular.cara_penularan.droplet !== '') { $('#pk_pm_droplet_anak').prop('checked', true) }
		if (penyakit_menular.cara_penularan.kontak_langsung !== '') { $('#pk_pm_kontak_langsung_anak').prop('checked', true) }
		if (penyakit_menular.cara_penularan.cairan_tubuh !== '') { $('#pk_pm_cairan_tubuh_anak').prop('checked', true) }

		if (penyakit_menular.penyakit_penyerta === '0') { $('#pk_penyakit_menular_6_anak_tidak').prop('checked', true).change() }
		if (penyakit_menular.penyakit_penyerta === '1') { $('#pk_penyakit_menular_6_anak_ya').prop('checked', true).change() }
		$('#pk_penyakit_menular_6_anak_input').val(penyakit_menular.ket_penyakit_penyerta);
		// end penyakit menular

		// penurunan daya tahan tubuh
		var pk_penurunan_daya_tahan = JSON.parse(data.pk_penurunan_daya_tahan);
		if (pk_penurunan_daya_tahan.penyakit_saat_ini === '0') { $('#pk_penyakit_pdtt_1_anak_tidak').prop('checked', true).change() }
		if (pk_penurunan_daya_tahan.penyakit_saat_ini === '1') { $('#pk_penyakit_pdtt_1_anak_ya').prop('checked', true).change() }

		if (pk_penurunan_daya_tahan.informasi_dari.dokter !== '') { $('#pk_pdtt_dokter_anak').prop('checked', true) }
		if (pk_penurunan_daya_tahan.informasi_dari.perawat !== '') { $('#pk_pdtt_perawat_anak').prop('checked', true) }
		if (pk_penurunan_daya_tahan.informasi_dari.keluarga !== '') { $('#pk_pdtt_keluarga_anak').prop('checked', true) }
		if (pk_penurunan_daya_tahan.informasi_dari.lain !== '') { $('#pk_pdtt_lain_anak').prop('checked', true) }
		if (pk_penurunan_daya_tahan.informasi_dari.ket_lain !== '') { $('#pk_pdtt_lain_anak_input').val(pk_penurunan_daya_tahan.informasi_dari.ket_lain).attr('disabled', false) }

		if (pk_penurunan_daya_tahan.informasi_jangka_waktu === '0') { $('#pk_penyakit_pdtt_3_anak_tidak').prop('checked', true).change() }
		if (pk_penurunan_daya_tahan.informasi_jangka_waktu === '1') { $('#pk_penyakit_pdtt_3_anak_ya').prop('checked', true).change() }
		$('#pk_penyakit_pdtt_3_anak_input').val(pk_penurunan_daya_tahan.ket_informasi_jangka_waktu);
	
		if (pk_penurunan_daya_tahan.pemeriksaan_rutin === '0') { $('#pk_penyakit_pdtt_4_anak_tidak').prop('checked', true).change() }
		if (pk_penurunan_daya_tahan.pemeriksaan_rutin === '1') { $('#pk_penyakit_pdtt_4_anak_ya').prop('checked', true).change() }
		$('#pk_penyakit_pdtt_4_anak_input').val(pk_penurunan_daya_tahan.ket_pemeriksaan_rutin);
		
		if (pk_penurunan_daya_tahan.penyakit_penyerta === '0') { $('#pk_penyakit_pdtt_5_anak_tidak').prop('checked', true).change() }
		if (pk_penurunan_daya_tahan.penyakit_penyerta === '1') { $('#pk_penyakit_pdtt_5_anak_ya').prop('checked', true).change() }
		$('#pk_penyakit_pdtt_5_anak_input').val(pk_penurunan_daya_tahan.ket_penyakit_penyerta);
		// end penurunan daya tahan tubuh

		// kesehatan jiwa
		var pk_kesehatan_jiwa = JSON.parse(data.pk_kesehatan_jiwa);
		if (pk_kesehatan_jiwa.ket_1 === '0') { $('#pk_kesehatan_jiwa_1_anak_tidak').prop('checked', true).change() }
		if (pk_kesehatan_jiwa.ket_1 === '1') { $('#pk_kesehatan_jiwa_1_anak_ya').prop('checked', true).change() }

		if (pk_kesehatan_jiwa.ket_2 === '0') { $('#pk_kesehatan_jiwa_2_anak_tidak').prop('checked', true).change() }
		if (pk_kesehatan_jiwa.ket_2 === '1') { $('#pk_kesehatan_jiwa_2_anak_ya').prop('checked', true).change() }

		if (pk_kesehatan_jiwa.ket_3 === '0') { $('#pk_kesehatan_jiwa_3_anak_tidak').prop('checked', true).change() }
		if (pk_kesehatan_jiwa.ket_3 === '1') { $('#pk_kesehatan_jiwa_3_anak_ya').prop('checked', true).change() }

		if (pk_kesehatan_jiwa.ket_4 === '0') { $('#pk_kesehatan_jiwa_4_anak_tidak').prop('checked', true).change() }
		if (pk_kesehatan_jiwa.ket_4 === '1') { $('#pk_kesehatan_jiwa_4_anak_ya').prop('checked', true).change() }

		if (pk_kesehatan_jiwa.ket_5 === '0') { $('#pk_kesehatan_jiwa_5_anak_tidak').prop('checked', true).change() }
		if (pk_kesehatan_jiwa.ket_5 === '1') { $('#pk_kesehatan_jiwa_5_anak_ya').prop('checked', true).change() }

		if (pk_kesehatan_jiwa.ket_6 === '0') { $('#pk_kesehatan_jiwa_6_anak_tidak').prop('checked', true).change() }
		if (pk_kesehatan_jiwa.ket_6 === '1') { $('#pk_kesehatan_jiwa_6_anak_ya').prop('checked', true).change() }

		if (pk_kesehatan_jiwa.ket_7 === '0') { $('#pk_kesehatan_jiwa_7_anak_tidak').prop('checked', true).change() }
		if (pk_kesehatan_jiwa.ket_7 === '1') { $('#pk_kesehatan_jiwa_7_anak_ya').prop('checked', true).change() }

		if (pk_kesehatan_jiwa.ket_8 === '0') { $('#pk_kesehatan_jiwa_8_anak_tidak').prop('checked', true).change() }
		if (pk_kesehatan_jiwa.ket_8 === '1') { $('#pk_kesehatan_jiwa_8_anak_ya').prop('checked', true).change() }

		if (pk_kesehatan_jiwa.ket_9 === '0') { $('#pk_kesehatan_jiwa_9_anak_tidak').prop('checked', true).change() }
		if (pk_kesehatan_jiwa.ket_9 === '1') { $('#pk_kesehatan_jiwa_9_anak_ya').prop('checked', true).change() }
		// end kesehatan jiwa

		//Pasien Kekerasan
		var pk_pasien_kekerasan = JSON.parse(data.pk_pasien_kekerasan);
		if (pk_pasien_kekerasan.ket_1 === '0') { $('#pk_pasien_kekerasan_1_anak_tidak').prop('checked', true).change() }
		if (pk_pasien_kekerasan.ket_1 === '1') { $('#pk_pasien_kekerasan_1_anak_ya').prop('checked', true).change() }

		$('#pk_pasien_kekerasan_2_anak').val(pk_pasien_kekerasan.ket_2);
		$('#pk_pasien_kekerasan_3_anak').val(pk_pasien_kekerasan.ket_3);
		$('#pk_pasien_kekerasan_4_anak').val(pk_pasien_kekerasan.ket_4);
		$('#pk_pasien_kekerasan_5_anak').val(pk_pasien_kekerasan.ket_5);
		

		if (pk_pasien_kekerasan.ket_6 === '0') { $('#pk_pasien_kekerasan_6_anak_tidak').prop('checked', true).change() }
		if (pk_pasien_kekerasan.ket_6 === '1') { $('#pk_pasien_kekerasan_6_anak_ya').prop('checked', true).change() }
		//End pasien kekerasan

		//Pasien diduga menggunakan obat 
		var pk_pasien_ketergantungan = JSON.parse(data.pk_pasien_ketergantungan);
		if (pk_pasien_ketergantungan.obat === '0') { $('#pk_pasien_ketergantungan_obat_anak_tidak').prop('checked', true).change() }
		if (pk_pasien_ketergantungan.obat === '1') { $('#pk_pasien_ketergantungan_obat_anak_ya').prop('checked', true).change() }
		$('#pk_pasien_ketergantungan_obat_input_anak').val(pk_pasien_ketergantungan.ket_obat);
		$('#pk_pasien_lama_ketergantungan_obat_input_anak').val(pk_pasien_ketergantungan.lama_ketergantungan);


		//Skala Early
		for (let a = 1; a <= 17; a++) {
			for (let b = 1; b <= 7; b++) {
				if (data.sew_suhu === $('.sew_suhu_' + a + '_' + b).val()) {
					$('.sew_suhu_' + a + '_' + b).prop('checked', true).change()
				}

				if (data.sew_pernafasan === $('.sew_pernafasan_' + a + '_' + b).val()) {
					$('.sew_pernafasan_' + a + '_' + b).prop('checked', true).change()
				}

				if (data.sew_kondisi_pernafasan === $('.sew_kondisi_pernafasan_' + a + '_' + b).val()) {
					$('.sew_kondisi_pernafasan_' + a + '_' + b).prop('checked', true).change()
				}

				if (data.sew_alat_bantu === $('#skala_' + a + '_' + b).val() && data.sew_alat_bantu === $('.sew_alat_bantu_' + a + '_' + b).val()) {
					$('#skala_' + a + '_' + b).prop('checked', true).change()
				}

				if (data.sew_saturasi === $('#skala_' + a + '_' + b).val() && data.sew_saturasi === $('.sew_saturasi_' + a + '_' + b).val()) {
					$('#skala_' + a + '_' + b).prop('checked', true).change()
				}

				if (data.sew_nadi === $('#skala_' + a + '_' + b).val() && data.sew_nadi === $('.sew_nadi_' + a + '_' + b).val()) {
					$('#skala_' + a + '_' + b).prop('checked', true).change()
				}

				if (data.sew_warna_kulit === $('#skala_' + a + '_' + b).val() && data.sew_warna_kulit === $('.sew_warna_kulit_' + a + '_' + b).val()) {
					$('#skala_' + a + '_' + b).prop('checked', true).change()
				}

				if (data.sew_tds === $('#skala_' + a + '_' + b).val() && data.sew_tds === $('.sew_tds_' + a + '_' + b).val()) {
					$('#skala_' + a + '_' + b).prop('checked', true).change()
				}

				if (data.sew_kesadaran === $('#skala_' + a + '_' + b).val() && data.sew_kesadaran === $('.sew_kesadaran_' + a + '_' + b).val()) {
					$('#skala_' + a + '_' + b).prop('checked', true).change()
				}
			}
		}

		// if (skala_early.putih !== '') { $('#total_skala_sews_anak_1').prop('checked', true) }
		// if (skala_early.hijau !== '') { $('#total_skala_sews_anak_2').prop('checked', true) }
		// if (skala_early.kuning !== '') { $('#total_skala_sews_anak_3').prop('checked', true) }
		// if (skala_early.merah !== '') { $('#total_skala_sews_anak_4').prop('checked', true) }

		//Data Penunjang 
		$('#tanggal_pemeriksaan_lab_anak').val(data.penunjang_lab !== null ? datefmysql(data.penunjang_lab) : '');
		$('#tanggal_pemeriksaan_rad_anak').val(data.penunjang_rad !== null ? datefmysql(data.penunjang_rad) : '');
		$('#hasiil_pemeriksaan_labo_anak').val(data.hasil_lab);
		$('#hasil_pemeriksaan_rad_anak').val(data.hsail_rad);
		$('#penunjang_lain_anak').val(data.penunjang_lainnya);

		// masalah keperawatan
		var masalah_keperawatan = JSON.parse(data.masalah_keperawatan);
		if (masalah_keperawatan.ket_1 !== '') { $('#masalah_keperawatan_1_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_2 !== '') { $('#masalah_keperawatan_2_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_3 !== '') { $('#masalah_keperawatan_3_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_4 !== '') { $('#masalah_keperawatan_4_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_5 !== '') { $('#masalah_keperawatan_5_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_6 !== '') { $('#masalah_keperawatan_6_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_7 !== '') { $('#masalah_keperawatan_7_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_8 !== '') { $('#masalah_keperawatan_8_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_9 !== '') { $('#masalah_keperawatan_9_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_10 !== '') { $('#masalah_keperawatan_10_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_11 !== '') { $('#masalah_keperawatan_11_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_12 !== '') { $('#masalah_keperawatan_12_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_13 !== '') { $('#masalah_keperawatan_13_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_14 !== '') { $('#masalah_keperawatan_14_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_15 !== '') { $('#masalah_keperawatan_15_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_16 !== '') { $('#masalah_keperawatan_16_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_17 !== '') { $('#masalah_keperawatan_17_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_18 !== '') { $('#masalah_keperawatan_18_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_19 !== '') { $('#masalah_keperawatan_19_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_20 !== '') { $('#masalah_keperawatan_20_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_21 !== '') { $('#masalah_keperawatan_21_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_22 !== '') { $('#masalah_keperawatan_22_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_23 !== '') { $('#masalah_keperawatan_23_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_24 !== '') { $('#masalah_keperawatan_24_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_25 !== '') { $('#masalah_keperawatan_25_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_26 !== '') { $('#masalah_keperawatan_26_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_27 !== '') { $('#masalah_keperawatan_27_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_28 !== '') { $('#masalah_keperawatan_28_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_29 !== '') { $('#masalah_keperawatan_29_anak').prop('checked', true) }
		// if (masalah_keperawatan.ket_30 !== '') { $('#masalah_keperawatan_30_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_31 !== '') { $('#masalah_keperawatan_31_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_32 !== '') { $('#masalah_keperawatan_32_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_33 !== '') { $('#masalah_keperawatan_33_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_34 !== '') { $('#masalah_keperawatan_34_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_30 !== '') { $('#masalah_keperawatan_30_anak').prop('checked', true) }
		if (masalah_keperawatan.ket_lain !== '') { $('#masalah_keperawatan_lain_input_anak').val(masalah_keperawatan.ket_lain).attr('disabled', false) }

		// perencanaan pulang
		var perencanaan_pulang = JSON.parse(data.perencanaan_pulang);
		if (perencanaan_pulang.planning_1 === '0') { $('#discharge_planning_1_anak_tidak').prop('checked', true).change() }
		if (perencanaan_pulang.planning_1 === '1') { $('#discharge_planning_1_anak_ya').prop('checked', true).change() }

		if (perencanaan_pulang.planning_2 === '0') { $('#discharge_planning_2_anak_tidak').prop('checked', true).change() }
		if (perencanaan_pulang.planning_2 === '1') { $('#discharge_planning_2_anak_ya').prop('checked', true).change() }
		
		if (perencanaan_pulang.planning_3 === '0') { $('#discharge_planning_3_anak_tidak').prop('checked', true).change() }
		if (perencanaan_pulang.planning_3 === '1') { $('#discharge_planning_3_anak_ya').prop('checked', true).change() }

		if (perencanaan_pulang.planning_4 === '0') { $('#discharge_planning_4_anak_tidak').prop('checked', true).change() }
		if (perencanaan_pulang.planning_4 === '1') { $('#discharge_planning_4_anak_ya').prop('checked', true).change() }

		
		if (perencanaan_pulang.kriteria.kriteria_1 !== '') { $('#kriteria_discharge_1_anak').prop('checked', true) }
		if (perencanaan_pulang.kriteria.kriteria_2 !== '') { $('#kriteria_discharge_2_anak').prop('checked', true) }
		if (perencanaan_pulang.kriteria.kriteria_3 !== '') { $('#kriteria_discharge_3_anak').prop('checked', true) }
		if (perencanaan_pulang.kriteria.kriteria_4 !== '') { $('#kriteria_discharge_4_anak').prop('checked', true) }
		if (perencanaan_pulang.kriteria.kriteria_5 !== '') { $('#kriteria_discharge_5_anak').prop('checked', true) }
		if (perencanaan_pulang.kriteria.kriteria_6 !== '') { $('#kriteria_discharge_6_anak').prop('checked', true) }
		if (perencanaan_pulang.kriteria.kriteria_7 !== '') { $('#kriteria_discharge_7_anak').prop('checked', true) }
		if (perencanaan_pulang.kriteria.kriteria_8 !== '') { $('#kriteria_discharge_8_anak').prop('checked', true) }
		if (perencanaan_pulang.kriteria.kriteria_9 !== '') { $('#kriteria_discharge_9_anak').prop('checked', true) }
		if (perencanaan_pulang.kriteria.kriteria_lain !== '') { $('#kriteria_discharge_lain_input_anak').val(perencanaan_pulang.kriteria.kriteria_lain).attr('disabled', false) }
		// end perencanaan pulang

		// $('#tanggal_ttd_perawat_anak').val((data.waktu_ttd_perawat !== null ? datetimefmysql(data.waktu_ttd_perawat) : ''));
		// $('#tanggal_ttd_perawat_old').val((data.waktu_ttd_perawat !== null ? datetimefmysql(data.waktu_ttd_perawat) : ''));
	
		if (data.waktu_ttd_perawat !== null) {
			$('#tanggal_ttd_perawat_anak').val((data.waktu_ttd_perawat !== null ? datetimefmysql(data.waktu_ttd_perawat)  : ''));
			// $('#tanggal_verifikasi_dokter_dpjp_anak').attr('disabled', true);
		}
		
		$('#perawat_anak').val(data.id_perawat);
		if (data.id_perawat !== null) { $('#perawat_anak').select2c('readonly', true) }
		$('#s2id_perawat_anak a .select2c-chosen').html(data.perawat);
		
		// digital signature
		if (data.ttd_perawat !== null) { 
			$('#ttd_perawat_anak').hide();
			$('#ttd_perawat_verified_anak').show(); 
		}

		if (data.waktu_ttd_verifikasi_dokter_dpjp !== null) {
			$('#tanggal_verifikasi_dokter_dpjp_anak').val((data.waktu_ttd_verifikasi_dokter_dpjp !== null ? datetimefmysql(data.waktu_ttd_verifikasi_dokter_dpjp)  : ''));
			// $('#tanggal_verifikasi_dokter_dpjp_anak').attr('disabled', true);
		}
		// $('#tanggal_verifikasi_dokter_dpjp_old').val((data.waktu_ttd_verifikasi_dokter_dpjp !== null ? datetimefmysql(data.waktu_ttd_verifikasi_dokter_dpjp) : ''));
		$('#verifikasi_dokter_dpjp_anak').val(data.id_verifikasi_dokter_dpjp);
		if (data.id_verifikasi_dokter_dpjp !== null) { $('#verifikasi_dokter_dpjp_anak').select2c('readonly', true) }
		$('#s2id_verifikasi_dokter_dpjp_anak a .select2c-chosen').html(data.verifikator_dpjp);

		if (data.ttd_verifikasi_dokter_dpjp !== null) { 
			$('#ttd_verifikasi_dokter_dpjp_anak').hide();
			$('#ttd_verifikasi_dokter_dpjp_verified_anak').show(); 
		}

	}

	function showKajianMedisAnak(data) {
		$('#id_kajian_medis_anak').val(data.id);
		$('#waktu_kajian_medis_anak').val((data.waktu_pengkajian !== null ? datetimefmysql(data.waktu_pengkajian) : '')).attr('disabled');
		// $('#waktu_kajian_medis_old').val((data.waktu_pengkajian !== null ? datetimefmysql(data.waktu_pengkajian) : ''));

		$('#keluhan_utama_medis_anak ').val(data.keluhan_utama);
		$('#rps_medis_anak ').val(data.riwayat_penyakit_sekarang);
		$('#rpt_medis_anak ').val(data.riwayat_penyakit_terdahulu);
		$('#pengobatan_medis_anak ').val(data.pengobatan);
		$('#riwayat_alergi_anak ').val(data.riwayat_alergi);
		var rpk = JSON.parse(data.riwayat_penyakit_keluarga);
		if (rpk.hasil === '1') { $('#rpk_medis_anak_ya').prop('checked', true).change() }
		if (rpk.asma !== '') { $('#rpk_medis_anak_asma').prop('checked', true) }
		if (rpk.dm !== '') { $('#rpk_medis_anak_dm').prop('checked', true) }
		if (rpk.cardiovascular !== '') { $('#rpk_medis_anak_cardiovascular').prop('checked', true) }
		if (rpk.kanker !== '') { $('#rpk_medis_anak_kanker').prop('checked', true) }
		if (rpk.thalasemia !== '') { $('#rpk_medis_anak_thalasemia').prop('checked', true) }
		if (rpk.lain !== '') { $('#rpk_medis_anak_lain').prop('checked', true) }
		if (rpk.ket_lain !== '') { $('#rpk_medis_anak_lain_input').val(rpk.ket_lain).attr('disabled', false) }

		$('#riwayat_field').summernote('code', data.riwayat);

		var sadar = JSON.parse(data.kesadaran);
		if (sadar.composmentis !== '') { $('#composmentis_medis_anak').prop('checked', true) }
		if (sadar.apatis !== '') { $('#apatis_medis_anak').prop('checked', true) }
		if (sadar.samnolen !== '') { $('#samnolen_medis_anak').prop('checked', true) }
		if (sadar.sopor !== '') { $('#sopor_medis_anak').prop('checked', true) }
		if (sadar.koma !== '') { $('#koma_medis_anak').prop('checked', true) }
		
		if (data.pf_kepala === 'Normal') { $('#pf_kepala_anak_tidak').prop('checked', true) }
		if (data.pf_kepala === 'Abnormal') { $('#pf_kepala_anak_ya').prop('checked', true) }
		if (data.ket_pf_kepala !== null) { $('#ket_pf_kepala_anak').val(data.ket_pf_kepala) }
		
		if (data.pf_mata === 'Normal') { $('#pf_mata_anak_tidak').prop('checked', true) }
		if (data.pf_mata === 'Abnormal') { $('#pf_mata_anak_ya').prop('checked', true) }
		if (data.ket_pf_mata !== null) { $('#ket_pf_mata_anak').val(data.ket_pf_mata) }
		
		if (data.pf_hidung === 'Normal') { $('#pf_hidung_anak_tidak').prop('checked', true) }
		if (data.pf_hidung === 'Abnormal') { $('#pf_hidung_anak_ya').prop('checked', true) }
		if (data.ket_pf_hidung !== null) { $('#ket_pf_hidung_anak').val(data.ket_pf_hidung) }
		
		if (data.pf_gigi_mulut === 'Normal') { $('#pf_gigi_mulut_anak_tidak').prop('checked', true) }
		if (data.pf_gigi_mulut === 'Abnormal') { $('#pf_gigi_mulut_anak_ya').prop('checked', true) }
		if (data.ket_pf_gigi_mulut !== null) { $('#ket_pf_gigi_mulut_anak').val(data.ket_pf_gigi_mulut) }
		
		if (data.pf_tenggorokan === 'Normal') { $('#pf_tenggorokan_anak_tidak').prop('checked', true) }
		if (data.pf_tenggorokan === 'Abnormal') { $('#pf_tenggorokan_anak_ya').prop('checked', true) }
		if (data.ket_pf_tenggorokan !== null) { $('#ket_pf_tenggorokan_anak').val(data.ket_pf_tenggorokan) }
		
		if (data.pf_telinga === 'Normal') { $('#pf_telinga_anak_tidak').prop('checked', true) }
		if (data.pf_telinga === 'Abnormal') { $('#pf_telinga_anak_ya').prop('checked', true) }
		if (data.ket_pf_telinga !== null) { $('#ket_pf_telinga_anak').val(data.ket_pf_telinga) }
		
		if (data.pf_leher === 'Normal') { $('#pf_leher_anak_tidak').prop('checked', true) }
		if (data.pf_leher === 'Abnormal') { $('#pf_leher_anak_ya').prop('checked', true) }
		if (data.ket_pf_leher !== null) { $('#ket_pf_leher_anak').val(data.ket_pf_leher) }
		
		if (data.pf_thorax === 'Normal') { $('#pf_thorax_anak_tidak').prop('checked', true) }
		if (data.pf_thorax === 'Abnormal') { $('#pf_thorax_anak_ya').prop('checked', true) }
		if (data.ket_pf_thorax !== null) { $('#ket_pf_thorax_anak').val(data.ket_pf_thorax) }
		
		if (data.pf_jantung === 'Normal') { $('#pf_jantung_anak_tidak').prop('checked', true) }
		if (data.pf_jantung === 'Abnormal') { $('#pf_jantung_anak_ya').prop('checked', true) }
		if (data.ket_pf_jantung !== null) { $('#ket_pf_jantung_anak').val(data.ket_pf_jantung) }
		
		if (data.pf_paru === 'Normal') { $('#pf_paru_anak_tidak').prop('checked', true) }
		if (data.pf_paru === 'Abnormal') { $('#pf_paru_anak_ya').prop('checked', true) }
		if (data.ket_pf_paru !== null) { $('#ket_pf_paru_anak').val(data.ket_pf_paru) }
		
		if (data.pf_abdomen === 'Normal') { $('#pf_abdomen_anak_tidak').prop('checked', true) }
		if (data.pf_abdomen === 'Abnormal') { $('#pf_abdomen_anak_ya').prop('checked', true) }
		if (data.ket_pf_abdomen !== null) { $('#ket_pf_abdomen_anak').val(data.ket_pf_abdomen) }
		
		if (data.pf_genitalia_anus === 'Normal') { $('#pf_genitalia_anak_tidak').prop('checked', true) }
		if (data.pf_genitalia_anus === 'Abnormal') { $('#pf_genitalia_anak_ya').prop('checked', true) }
		if (data.anak_ket_pf_genitalia_anus !== null) { $('#ket_pf_genitalia_anak').val(data.ket_pf_genitalia_anus) }
		
		if (data.pf_ekstermitas === 'Normal') { $('#pf_ekstermitas_anak_tidak').prop('checked', true) }
		if (data.pf_ekstermitas === 'Abnormal') { $('#pf_ekstermitas_anak_ya').prop('checked', true) }
		if (data.ket_pf_ekstermitas !== null) { $('#ket_pf_ekstermitas_anak').val(data.ket_pf_ekstermitas) }
		
		if (data.pf_kulit === 'Normal') { $('#pf_kulit_anak_tidak').prop('checked', true) }
		if (data.pf_kulit === 'Abnormal') { $('#pf_kulit_anak_ya').prop('checked', true) }
		if (data.ket_pf_kulit !== null) { $('#ket_pf_kulit_anak').val(data.ket_pf_kulit) }

		$('#hasil_laboratorium_anak').summernote('code', data.hasil_laboratorium);
		$('#hasil_radiologi_anak').summernote('code', data.hasil_radiologi);
		$('#hasil_penunjang_lain_anak').summernote('code', data.hasil_penunjang_lain);
		$('#diagnosa_awal_medis_anak').summernote('code', data.diagnosa_awal);
		$('#riwayat_field_anak ').summernote('code', data.riwayat_pasien);

		$('#rencana_edukasi_medis_anak').val(data.rencana_edukasi);
		$('#rencana_pemeriksaan_penunjang_anak').val(data.rencana_pemeriksaan_penunjang);
		$('#rencana_terapi_anak').val(data.rencana_terapi);
		$('#rencana_konsultasi_anak').val(data.rencana_konsultasi);
		$('#perkiraan_lama_rawat_anak').val(data.perkiraan_lama_rawat);
		$('#ditetapkan_berapa_hari_anak').val(data.ditetapkan_berapa_hari);
		$('#tanggal_rencana_pulang_anak').val((data.tanggal_rencana_pulang !== null ? datefmysql(data.tanggal_rencana_pulang) : ''));
		$('#alasan_belum_ditetapkan_anak').val(data.alasan_belum_ditetapkan);

		if (data.sbd_anak !== null) {$('#sbd-anak ').prop('checked', true) }

		if (data.waktu_ttd_dokter_dpjp !== null) {
			$('#tanggal_ttd_dokter_dpjp_anak').val((data.waktu_ttd_dokter_dpjp !== null ? datetimefmysql(data.waktu_ttd_dokter_dpjp) : ''))
			// $('#tanggal_ttd_dokter_dpjp_anak').attr('disabled', true);
		}
		// $('#tanggal_ttd_dokter_dpjp_old').val((data.waktu_ttd_dokter_dpjp !== null ? datetimefmysql(data.waktu_ttd_dokter_dpjp) : ''));
		$('#dokter_dpjp_anak').val(data.id_dokter_dpjp);
		if (data.id_dokter_dpjp !== null) { $('#dokter_dpjp_anak').select2c('readonly', true) }
		$('#s2id_dokter_dpjp_anak a .select2c-chosen').html(data.dokter_dpjp);
		
		// digital signature
		if (data.ttd_dokter_dpjp !== null) { 
			$('#ttd_dokter_dpjp_anak').hide();
			$('#ttd_dokter_dpjp_verified_anak').show(); 
		}

		if (data.waktu_ttd_dokter_pengkajian !== null) {
			$('#tanggal_ttd_dokter_pengkajian_anak').val((data.waktu_ttd_dokter_pengkajian !== null ? datetimefmysql(data.waktu_ttd_dokter_pengkajian) : ''))
			// $('#tanggal_ttd_dokter_pengkajian_anak').attr('disabled', true);
		}
		// $('#tanggal_ttd_dokter_pengkajian_old').val((data.waktu_ttd_dokter_pengkajian !== null ? datetimefmysql(data.waktu_ttd_dokter_pengkajian) : ''));
		$('#dokter_pengkajian_anak').val(data.id_dokter_pengkajian);
		if (data.id_dokter_pengkajian !== null) { $('#dokter_pengkajian_anak').select2c('readonly', true) }
		$('#s2id_dokter_pengkajian_anak a .select2c-chosen').html(data.dokter_pengkajian);

		if (data.ttd_dokter_pengkajian !== null) { 
			$('#ttd_dokter_pengkajian_anak').hide();
			$('#ttd_dokter_pengkajian_verified_anak').show(); 
		}
	}

	function showHistoryLogsAnak(id_layanan_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("rawat_inap/api/rawat_inap/get_history_logs_pengkajian_awal_anak") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#table_kajian_medis_anak tbody').empty();
				$.each(data.kajian_medis_logs_anak, function (i, v) {
					let html = /* html */ `
						<tr>
							<td>${i + 1}</td>
							<td class="nowrap">${(v.tanggal_ubah_anak !== null ? v.tanggal_ubah_anak : '')}</td>
							<td class="nowrap">${v.user}</td>
							<td>${v.keluhan_utama}</td>
							<td>${v.riwayat_penyakit_sekarang}</td>
							<td>${v.riwayat_penyakit_terdahulu}</td>
							<td>${v.pengobatan}</td>
							<td>${v.riwayat_pasien}</td>
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

					$('#table_kajian_medis_anak tbody').append(html);
				});

				$('#modal_history_logs_anak').modal('show');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}


	function konfirmasiSimpanPengkajianAwalAnak() {
		// console.log($('#form_pengkajian_awal_anak').serialize());

		var stop = false;
		if ($('#waktu_kajian_perawat_anak').val() === '') {
			syams_validation('#waktu_kajian_perawat_anak', 'Kolom waktu pengkajian harus diisi!');
			$('#wizard_form_ranap_anak').bwizard('show', '0');
			stop = true;
		}

		if ($('#tanggal_ttd_perawat_anak').val() === '') {
			syams_validation('#tanggal_ttd_perawat_anak', 'Kolom waktu verifikasi perawat harus diisi!');
			$('#tanggal_ttd_perawat_anak').focus();
			$('#wizard_form_ranap_anak').bwizard('show', '0');
			stop = true;
		}

		if ($('#perawat_anak').val() === '') {
			syams_validation('#perawat_anak', 'Kolom perawat harus dipilih!');
			$('#wizard_form_ranap_anak').bwizard('show', '0');
			stop = true;
		}
		
		if (stop) {
			return false;
		}

		if($('#ttd_perawat_anak').is(":visible")){
			if($('#ttd_perawat_anak').is(":not(:checked)")){
				swalAlert('warning', 'Signature Validation', 'Harap Perawat tanda tangan terlebih dahulu');
				$('#wizard_form_ranap_anak').bwizard('show', '0');
				return false;
			}
		}
		
		var id_kajian_keperawatan_anak = $('#id_kajian_keperawatan_anak').val();
		if (id_kajian_keperawatan_anak) {
			var text = 'Apakah anda yakin ingin mengupdate data ini ?';
			var btnTextConfirmAnak = 'Update';
		} else {
			text = 'Apakah anda yakin ingin menyimpan data ini ?';
			btnTextConfirmAnak = 'Simpan';
		}

		swal.fire({
			title: 'Konfirmasi ?',
			html: text,
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>' + btnTextConfirmAnak,
			cancelButtonText: '<i class="fas fa-time-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanPengkajianAwalAnak();
			}
		})
	}	

	function simpanPengkajianAwalAnak() {

		var id_layanan_pendaftaran_anak = 	$('#id_layanan_pendaftaran_anak').val(); 
		var riwayat_anak = $('#riwayat_field_anak').summernote('code');
		var hasil_lab_anak = $('#hasil_laboratorium_anak').summernote('code');
		var hasil_rad_anak = $('#hasil_radiologi_anak').summernote('code');
		var hasil_pen_lain_anak = $('#hasil_penunjang_lain_anak').summernote('code');
		var diag_awal_anak = $('#diagnosa_awal_medis_anak').summernote('code');

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_pengkajian_awal_anak") ?>',
			data: $('#form_pengkajian_awal_anak').serialize() + '&id_layanan_pendaftaran_anak=' + id_layanan_pendaftaran_anak +'&riwayat_anak=' + riwayat_anak + '&hasil_lab_anak=' + hasil_lab_anak + '&hasil_rad_anak=' + hasil_rad_anak + '&hasil_pen_lain_anak=' + hasil_pen_lain_anak + '&diag_awal_anak=' + diag_awal_anak,
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

				$('#modal_pengkajian_anak').modal('hide');
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

<!-- Modal -->
<!-- Rawat Inap -->
<div class="modal fade" id="modal_pengkajian_anak" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_pengkajian_anak">FORM PENGKAJIAN AWAL PASIEN ANAK</h5>
					<h6 class="modal-title text-muted"><small>(Dilengkapi dalam waktu 24 jam pertama pasien masuk ruang rawat inap)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_pengkajian_awal_anak class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran_anak">
					<input type="hidden" name="id_pasien" id="id_pasien_anak">
					<input type="hidden" name="id_kajian_keperawatan_anak" id="id_kajian_keperawatan_anak">
					<input type="hidden" name="id_kajian_medis_anak" id="id_kajian_medis_anak">
					<!-- header -->
					<div class="row">
						<div class="col-lg-6">
							<div class="table-responsive">
								<table class="table table-sm table-striped">
									<tr>
										<td width="20%" class="bold">Nama Pasien</td>
										<td wdith="80%">: <span id="nama_anak"></span></td>
									</tr>
									<tr>
										<td class="bold">No. RM</td>
										<td>: <span id="norm_anak"></span></td>
									</tr>
									<tr>
										<td class="bold">Tanggal Lahir</td>
										<td>: <span id="ttl_anak"></span></td>
									</tr>
									<tr>
										<td class="bold">Jenis Kelamin</td>
										<td>: <span id="jk_anak"></span></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="table-responsive">
								<table class="table table-sm table-striped">
									<tr>
										<td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
										<td wdith="70%">: <span id="anak_bed"></span></td>
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
								<!-- form pengkajian awal ranap -->
								<div id="wizard_form_ranap_anak">
									<!-- Tab bwizard -->
									<ol>
										<li>Pengkajian Keperawatan <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li>
										<li>Pengkajian Medis <i class="bold"><small>(Diisi Oleh Dokter)</small></i></li>
									</ol>

									<!-- Data bwizard -->
									<!-- Data Pengkajian Perawat-->
									<div class="form-data-pengkajian-perawat-anak">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td colspan="3">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" id="btn_expand_all_anak"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
													<button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="btn_collapse_all_anak"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
													<span id="desclaimer_history_anak" style="color:red; font-style:italic;"></span><button class="btn btn-success btn-xs mr-1 float-left" type="button" id="btn_history_logs_anak"><i class="fas fa-fw fa-history mr-1"></i>Show History Logs</button>
												</td>
											</tr>
											<tr>
												<td width="20%" class="bold">Tanggal / Jam Masuk</td>
												<td wdith="1%" class="bold">:</td>
												<td width="79%"><input type="text" name="waktu_masuk_anak" id="waktu_masuk_anak" class="custom-form clear-input col-lg-2" readonly></td>
											</tr>
											<tr>
												<td class="bold">Tanggal / Jam Pengkajian</td>
												<td class="bold">:</td>
												<td>
													<input type="text" name="waktu_pengkajian_anak" id="waktu_kajian_perawat_anak" class="custom-form clear-input col-lg-2" value="<?= date('d/m/Y H:i') ?>">
													<!-- <input type="hidden" name="waktu_pengkajian" id="waktu_kajian_perawat_old"> -->
												</td>
											</tr>
											<tr>
												<td class="bold">Agama</td>
												<td class="bold">:</td>
												<td>
													<input type="checkbox" name="agama_islam_anak" id="agama_islam_anak" value="1" class="mr-1" disabled>Islam
													<input type="checkbox" name="agama_kristen_anak" id="agama_kristen_anak" value="1" class="mr-1 ml-2" disabled>Kristen
													<input type="checkbox" name="agama_hindu_anak" id="agama_hindu_anak" value="1" class="mr-1 ml-2" disabled>Hindu
													<input type="checkbox" name="agama_katholik_anak" id="agama_katholik_anak" value="1" class="mr-1 ml-2" disabled>Katholik
													<input type="checkbox" name="agama_buddha_anak" id="agama_buddha_anak" value="1" class="mr-1 ml-2" disabled>Buddha
													<input type="checkbox" name="agama_lain_anak" id="agama_lain_anak" value="1" class="mr-1 ml-2" disabled>
													<input type="text" name="agama_lain_input_anak" id="agama_lain_input_anak" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Masukkan agama lain" disabled>
												</td>
											</tr>											
											<tr>
												<td class="bold">Cara Masuk RS</td>
												<td class="bold">:</td>
												<td>
													<input type="checkbox" name="cara_masuk_irj_anak" id="cara_masuk_irj_anak" value="1" class="mr-1" disabled>IRJ
													<input type="checkbox" name="cara_masuk_igd_anak" id="cara_masuk_igd_anak" value="1" class="mr-1 ml-2" disabled>IGD
													<input type="checkbox" name="cara_masuk_lain_anak" id="cara_masuk_lain_anak" value="1" class="mr-1 ml-2" disabled>Lain-lain
													<input type="text" name="cara_masuk_lain_input_anak" id="cara_masuk_lain_input_anak" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Masukkan cara masuk RS" disabled>
												</td>
											</tr>
											<tr>
												<td class="bold">Tiba Diruangan Rawat dengan Cara</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="cara_tiba_diruangan_anak" id="cara_tiba_diruangan_anak_jalan" value="Jalan" class="mr-1">Jalan
													<input type="radio" name="cara_tiba_diruangan_anak" id="cara_tiba_diruangan_anak_brankar" value="Brankar" class="mr-1 ml-2">Brankar
													<input type="radio" name="cara_tiba_diruangan_anak" id="cara_tiba_diruangan_anak_kursi_roda" value="Kursi Roda" class="mr-1 ml-2">Kursi Roda
												</td>
											</tr>
										</table>

										<!-- Row Data Kesehatan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kesehatan-pasien-anak"><i class="fas fa-expand mr-1"></i>Expand</button>DATA KESEHATAN PASIEN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-kesehatan-pasien-anak">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Informasi Diperoleh dari</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="checkbox" name="informasi_dari_pasien_anak" id="informasi_dari_pasien_anak" value="1" class="mr-1">Pasien
														<input type="checkbox" name="informasi_dari_keluarga_anak" id="informasi_dari_keluarga_anak" value="1" class="mr-1 ml-2">Keluarga
														<input type="checkbox" name="informasi_dari_lain_anak" id="informasi_dari_lain_anak" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="informasi_dari_lain_anak_input" id="informasi_dari_lain_anak_inputt" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan informasi lain" disabled>
													</td>
												</tr>
												<tr>
													<td class="bold">Keluhan Utama</td>
													<td class="bold">:</td>
													<td><input type="text" name="keluhan_utama_anak" id="keluhan_utama_pengkajian_awal_anak" class="custom-form clear-input col-lg-6" placeholder="Masukkan keluhan utama"></td>
												</tr>
												<tr>
													<td class="bold">Mulai Timbul Keluhan</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="mulai_timbul_keluhan_anak" id="mulai_timbul_keluhan_anak" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukkan mulai timbul keluhan">
														<span class="bold ml-2">Lama Keluhan : </span><input type="text" name="lama_keluhan_anak" id="lama_keluhan_anak" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukkan lama keluhan">
													</td>
												</tr>
												<tr>
													<td class="bold">Faktor Pencetus</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="faktor_pencetus_infeksi_anak" id="faktor_pencetus_infeksi_anak" value="1" class="mr-1">Infeksi
														<input type="checkbox" name="faktor_pencetus_lain_anak" id="faktor_pencetus_lain_anak" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="faktor_pencetus_lain_input_anak" id="faktor_pencetus_lain_input_anak" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan faktor pencetus lain" disabled>
													</td>
												</tr>
												<tr>
													<td class="bold">Sifat Keluhan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="sifat_keluhan_anak" id="sifat_keluhan_anak_akut" value="Akut" class="mr-1">Akut
														<input type="radio" name="sifat_keluhan_anak" id="sifat_keluhan_anak_kronik" value="Kronik" class="mr-1 ml-2">Kronik
													</td>
												</tr>
												<tr><td colspan="3"></td></tr>
												<tr>
													<td class="bold">Riwayat Penyakit Sekarang</td>
													<td class="bold">:</td>
													<td><input type="text" name="riwayat_penyakit_sekarang_anak" id="riwayat_penyakit_sekarang_anak" class="custom-form clear-input col-lg-6" placeholder="Masukkan riwayat penyakit sekarang"></td>
												</tr>
												<tr>
													<td class="bold">Riwayat Penyakit Terdahulu</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="rpt_asma_anak" id="rpt_asma_anak" value="1" class="mr-1">Asma
														<input type="checkbox" name="rpt_hipertensi_anak" id="rpt_hipertensi_anak" value="1" class="mr-1 ml-2">Hipertensi
														<input type="checkbox" name="rpt_jantung_anak" id="rpt_jantung_anak" value="1" class="mr-1 ml-2">Jantung
														<input type="checkbox" name="rpt_diabetes_anak" id="rpt_diabetes_anak" value="1" class="mr-1 ml-2">Diabetes
														<input type="checkbox" name="rpt_hepatitis_anak" id="rpt_hepatitis_anak" value="1" class="mr-1 ml-2">Hepatitis
														<input type="checkbox" name="rpt_lain_anak" id="rpt_lain_anak" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="rpt_lain_anak_input" id="rpt_lain_anak_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat penyakit terdahulu lain" disabled>
													</td>
												</tr>
												<tr>
													<td class="bold">Riwayat Penyakit Keluarga</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="rpk_asma_anak" id="rpk_asma_anak" value="1" class="mr-1">Asma
														<input type="checkbox" name="rpk_hipertensi_anak" id="rpk_hipertensi_anak" value="1" class="mr-1 ml-2">Hipertensi
														<input type="checkbox" name="rpk_jantung_anak" id="rpk_jantung_anak" value="1" class="mr-1 ml-2">Jantung
														<input type="checkbox" name="rpk_diabetes_anak" id="rpk_diabetes_anak" value="1" class="mr-1 ml-2">Diabetes
														<input type="checkbox" name="rpk_hepatitis_anak" id="rpk_hepatitis_anak" value="1" class="mr-1 ml-2">Hepatitis
														<input type="checkbox" name="rpk_lain_anak" id="rpk_lain_anak" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="rpk_lain_anak_input" id="rpk_lain_anak_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat penyakit keluarga lain" disabled>
													</td>
												</tr>
												<tr>
													<td class="bold">Pernah Dirawat</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="pernah_dirawat_anak" id="pernah_dirawat_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pernah_dirawat_anak" id="pernah_dirawat_anak_ya" value="1" class="mr-1 ml-2">Ya, Kapan
														<input type="text" name="pernah_dirawat_anak_kapan" id="pernah_dirawat_anak_kapan" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan kapan pernah dirawat" disabled>
														<span class="ml-2 mr-1">Dimana</span><input type="text" name="pernah_dirawat_anak_dimana" id="pernah_dirawat_anak_dimana" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan pernah dirawat dimana" disabled >
													</td>
												</tr>												
												<tr>
													<td class="bold">Membawa Obat dari Luar</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="obat_luar_anak" id="obat_luar_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="obat_luar_anak" id="obat_luar_anak_ya" value="1" class="mr-1 ml-2">Ya <i>(Jika ya, lapor farmasi untuk rekonsiliasi obat)</i>
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Riwayat Alergi -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-alergi"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT ALERGI
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-riwayat-alergi">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Alergi</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="alergi_anak" id="alergi_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="alergi_anak" id="alergi_anak_tidak_tahu" value="2" class="mr-1 ml-2">Tidak Tahu
														<input type="radio" name="alergi_anak" id="alergi_anak_ya" value="1" class="mr-1 ml-2">Ya, Bila Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Alergi Obat</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="alergi_obat_anak" id="alergi_obat_anak" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan alergi obat">
														<input type="text" name="alergi_obat_anak_reaksi" id="alergi_obat_anak_reaksi" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Reaksi alergi obat">
													</td>
												</tr>
												<tr>
													<td class="bold">Alergi Makanan</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="alergi_makanan_anak" id="alergi_makanan_anak" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan alergi makanan">
														<input type="text" name="alergi_makanan_anak_reaksi" id="alergi_makanan_anak_reaksi" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Reaksi alergi makanan">
													</td>
												</tr>
												<tr>
													<td colspan="3" class="bold"><i>(Bila ada alergi segera pasang gelang merah dan tulis nama obat/makanan)</i></td>
												</tr>
											</table>
										</div>

										<!-- Row Data Riwayat Kelahiran -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-kehamilan-anak"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT KELAHIRAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-riwayat-kehamilan-anak">
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Usia Kehamilan</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<div class="input-group">
															<input type="text" name="usia_kehamilan_anak" id="usia_kehamilan_anak" class="custom-form clear-input d-inline-block col-lg-2"  onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Minggu</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="bold">Berat Badan Lahir</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="berat_badan_anak" id="berat_badan_anak" class="custom-form clear-input d-inline-block col-lg-2" placeholder="BB" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">gr</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="bold">Panjang Badan Lahir</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="panjang_badan_lahir_anak" id="panjang_badan_lahir_anak" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Pb" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Cm</span>
															</div>
														</div>
													</td>
												</tr>																						
												<tr>
													<td class="bold">Persalinan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="riwayat_kelahiran_anak" id="riwayat_kelahiran_anak_spontan" value="Spontan" class="mr-1">Spontan
														<input type="radio" name="riwayat_kelahiran_anak" id="riwayat_kelahiran_anak_operasi" value="Operasi" class="mr-1 ml-2">SC
														<input type="radio" name="riwayat_kelahiran_anak" id="riwayat_kelahiran_anak_cukup_bulan" value="Cukup Bulan" class="mr-1 ml-2">Forcep
														<input type="radio" name="riwayat_kelahiran_anak" id="riwayat_kelahiran_anak_kurang_bulan" value="Kurang Bulan" class="mr-1 ml-2">Vakum Ekstraksi
													</td>
												</tr>
												<tr>
													<td class="bold">Menangis</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="menangis_anak" id="menangis_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="menangis_anak" id="menangis_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Riwayat Kuning</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="riwayat_kuning_anak" id="riwayat_kuning_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="riwayat_kuning_anak" id="riwayat_kuning_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												
											</table>
										</div>

										<!-- Riwayat Imunisasi Dasar-->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-imunisasi"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT IMUNISASI DASAR
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-riwayat-imunisasi">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">										
												<tr>
													<td class="bold">Riwayat Imunisasi</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="riwayat_imunisasi_anak_lengkap" id="riwayat_imunisasi_anak_lengkap" value="1" class="mr-1">Lengkap : BCG, DPT, Hepatitis B, Polio, Campak
														<input type="checkbox" name="riwayat_imunisasi_anak_tidak_pernah" id="riwayat_imunisasi_anak_tidak_pernah" value="1" class="mr-1 ml-2">Tidak Pernah															
														<input type="checkbox" name="riwayat_imunisasi_anak_tidak_lengkap" id="riwayat_imunisasi_anak_tidak_lengkap" value="1" class="mr-1 ml-2">Tidak Lengkap
														<input type="text" name="riwayat_imunisasi_anak_lain" id="riwayat_imunisasi_anak_lain" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat imunisasi lain" disabled>
													</td>
												</tr>																					
											</table>
										</div>

										<!-- Status Fungsional -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-status-fungsional"><i class="fas fa-expand mr-1"></i>Expand</button>STATUS FUNGSIONAL
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-status-fungsional">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
												<td width="20%" class="bold">Mandiri</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="status_fungsional_mandiri_anak" id="status_fungsional_mandiri_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="status_fungsional_mandiri_anak" id="status_fungsional_mandiri_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
												<td width="20%" class="bold">Ketergantungan Total</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="ketergantungan_total_anak" id="ketergantungan_total_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="ketergantungan_total_anak" id="ketergantungan_total_anak_ya" value="1" class="mr-1 ml-2">Ya, dilaporkan ke dokter pukul
														<input type="text" name="ketergantungan_total_anak_input" id="ketergantungan_total_anak_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="waktu" disabled>
													</td>
												</tr>
												<tr>
												<td width="20%" class="bold">Perlu Bantuan</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="perlu_bantuan_anak" id="perlu_bantuan_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="perlu_bantuan_anak" id="perlu_bantuan_anak_ya" value="1" class="mr-1 ml-2">Ya, Sebutkan
														<input type="text" name="perlu_bantuan_anak_input" id="perlu_bantuan_anak_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Sebutkan" disabled>
													</td>
												</tr>												
											</table>
										</div>

										<!-- Row Data Riwayat Tumbuh Kembang  -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-tumbuh-kembang-anak"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT TUMBUH KEMBANG (Diisi pada pasien usia dibawah 3 Tahun)
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-riwayat-tumbuh-kembang-anak">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>												
													<td width="10%" class="bold">Asi Sampai Umur</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<div class="input-group">
															<input type="text" name="rtk_asi_anak" id="rtk_asi_anak" class="custom-form clear-input d-inline-block col-lg-2"  onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Bln/Thn</span>
															</div>
														</div>
													</td>
													<td width="10%" class="bold">Bicara, Usia</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<div class="input-group">
															<input type="text" name="rtk_bicara_anak" id="rtk_bicara_anak" class="custom-form clear-input d-inline-block col-lg-2"  onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Bln</span>
															</div>
														</div>
													</td>
												</tr>												
												<tr>												
													<td width="10%" class="bold">Susu Formulai Sampai</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<div class="input-group">
															<input type="text" name="rtk_susu_formula_anak" id="rtk_susu_formula_anak" class="custom-form clear-input d-inline-block col-lg-2"  onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Bln/Thn</span>
															</div>
														</div>
													</td>
													<td width="10%" class="bold">Duduk, usia</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<div class="input-group">
															<input type="text" name="rtk_duduk_anak" id="rtk_duduk_anak" class="custom-form clear-input d-inline-block col-lg-2"  onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Bln</span>
															</div>
														</div>
													</td>
												</tr>	
												<tr>												
													<td width="10%" class="bold">Tengkurap, usia</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<div class="input-group">
															<input type="text" name="rtk_tengkurep_anak" id="rtk_tengkurep_anak" class="custom-form clear-input d-inline-block col-lg-2"  onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Bln</span>
															</div>
														</div>
													</td>
													<td width="10%" class="bold">Berdiri, Usia</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<div class="input-group">
															<input type="text" name="rtk_berdiri_anak" id="rtk_berdiri_anak" class="custom-form clear-input d-inline-block col-lg-2"  onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Bln</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>												
													<td width="10%" class="bold">Tumbuh Gigi, usia</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<div class="input-group">
															<input type="text" name="rtk_tumbuh_gigi_anak" id="rtk_tumbuh_gigi_anak" class="custom-form clear-input d-inline-block col-lg-2"  onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Bln</span>
															</div>
														</div>
													</td>
													<td width="10%" class="bold">Berjalan, Usia</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<div class="input-group">
															<input type="text" name="rtk_berjalan_anak" id="rtk_berjalan_anak" class="custom-form clear-input d-inline-block col-lg-2"  onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Bln</span>
															</div>
														</div>
													</td>
												</tr>													
											</table>
										</div>

										<!-- Row Data Psikososial, Ekonomi, Dan Spriritual -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-psikososial-ekonomi-spiritual-anak"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT PSIKOSOSIAL, EKONOMI DAN SPIRITUAL
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-psikososial-ekonomi-spiritual-anak">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Status Psikologis</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="checkbox" name="sps_cemas_anak" id="sps_cemas_anak" value="1" class="mr-1">Cemas
														<input type="checkbox" name="sps_takut_anak" id="sps_takut_anak" value="1" class="mr-1 ml-2">Takut
														<input type="checkbox" name="sps_marah_anak" id="sps_marah_anak" value="1" class="mr-1 ml-2">Marah
														<input type="checkbox" name="sps_sedih_anak" id="sps_sedih_anak" value="1" class="mr-1 ml-2">Sedih
														<input type="checkbox" name="sps_bunuh_diri_anak" id="sps_bunuh_diri_anak" value="1" class="mr-1 ml-2">Kecendrungan Bunuh Diri
														<input type="checkbox" name="sps_lain_anak" id="sps_lain_anak" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sps_lain_input_anak" id="sps_lain_input_anak" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain" disabled>
													</td>
												</tr>												
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Status Sosial</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Hubungan Pasien Dengan Anggota Keluarga</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="hubungan_dengan_orang_tua_anak" id="hubungan_dengan_orang_tua_anak_baik" value="1" class="mr-1">Baik
														<input type="radio" name="hubungan_dengan_orang_tua_anak" id="hubungan_dengan_orang_tua_anak_tidak_baik" value="0" class="mr-1 ml-2">Tidak Baik
														
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Tempat Tinggal</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="tempat_tinggal_anak" id="tempat_tinggal_anak_rumah" value="Rumah" class="mr-1" >Rumah
														<input type="radio" name="tempat_tinggal_anak" id="tempat_tinggal_anak_apart" value="Apartemen" class="mr-1 ml-2">Apartemen
														<input type="radio" name="tempat_tinggal_anak" id="tempat_tinggal_anak_panti" value="Panti" class="mr-1 ml-2">Panti
														<input type="radio" name="tempat_tinggal_anak" id="tempat_tinggal_anak_lain" value="Lain" class="mr-1 ml-2">Lainnya
														<input type="text" name="tempat_tinggal_anak_lain_input" id="tempat_tinggal_anak_lain_inputi" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan tempat tinggal lain" disabled>
													</td>
												</tr>										
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Status Ekonomi dan Sosial</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Pekerjaan Ayah</span></td>
													<td wdith="1%">:</td>
													<td width="79%"><input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="custom-form clear-input col-lg-3" placeholder="Masukkan pekerjaan"></td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Pekerjaan Ibu</span></td>
													<td wdith="1%">:</td>
													<td width="79%"><input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="custom-form clear-input col-lg-3" placeholder="Masukkan pekerjaan"></td>
												</tr>
												<tr>
													<td><span class="ml-4">cara Bayar</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="cara_bayar_anak" id="cara_bayar_anak_biaya_sendiri" value="Sendiri" class="mr-1" >Biaya Sendiri
														<input type="radio" name="cara_bayar_anak" id="cara_bayar_anak_bpjs" value="BPJS" class="mr-1 ml-2">BPJS
														<input type="radio" name="cara_bayar_anak" id="cara_bayar_anak_asuransi" value="Asuransi" class="mr-1 ml-2">Asuransi
														<input type="text" name="cara_bayar_anak_asuransi_input" id="cara_bayar_anak_asuransi_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukan Asuransi Pembayayaran">
														<input type="checkbox" name="cara_bayar_anak_t" id="cara_bayar_anak_lain" value="Lain" class="mr-1 ml-2">Lainnya
														<input type="text" name="cara_bayar_anak_lain_input" id="cara_bayar_anak_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukan cara Bayar Lainnya" disabled>
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Status Spiritual</td>
												</tr>
												<tr>
													<td><span class="ml-4">Agama</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="agama_anak" id="agama_anak_islam" value="Islam" class="mr-1" >Islam
														<input type="radio" name="agama_anak" id="agama_anak_kristen" value="Kristen" class="mr-1 ml-2">Kristen
														<input type="radio" name="agama_anak" id="agama_anak_hindu" value="Hindu" class="mr-1 ml-2">Hindu
														<input type="radio" name="agama_anak" id="agama_anak_katholik" value="Katholik" class="mr-1 ml-2">Katholik
														<input type="radio" name="agama_anak" id="agama_anak_budha" value="Budha" class="mr-1 ml-2">Budha
														<input type="radio" name="agama_anak" id="agama_anak_lain" value="Lain" class="mr-1 ml-2">Lainnya
														<input type="text" name="agama_anak_lain_input" id="agama_anak_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukan Agama Lainnya" disabled>
													</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Kegiatan Keagamaan yang biasa dilakukan</span></td>
													<td wdith="1%">:</td>
													<td width="79%"><input type="text" name="kegiatan_keagamaan_anak" id="kegiatan_keagamaan_anak" class="custom-form clear-input col-lg-3" placeholder="Masukkan Kegiatan"></td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Kegiatan Spiritual yang dibutuhkan selama perawatan</span></td>
													<td wdith="1%">:</td>
													<td width="79%"><input type="text" name="kegiatan_spiritual_perawatan_anak" id="kegiatan_spiritual_perawatan_anak" class="custom-form clear-input col-lg-3" placeholder="Masukkan Kegaiatan"></td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Pengkajian Spiritual</td>
												</tr>

												<tr>
													<td width="20%"><span class="ml-4">Kemampuan beribadah (khusus muslim)</span></td>
													<td wdith="1%"></td>
													<td width="79%"></td>
												</tr>


												<tr>
													<td width="20%"><span class="ml-4">Wajib Ibadah</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="wajib_ibadah_anak" id="wajib_ibadah_anak_baligh" value="Baligh" class="mr-1" >Baligh
														<input type="radio" name="wajib_ibadah_anak" id="wajib_ibadah_anak_belum" value="Belum Baligh" class="mr-1 ml-2">Belum Baligh
														<input type="radio" name="wajib_ibadah_anak" id="wajib_ibadah_anak_halangan" value="Halangan" class="mr-1 ml-2">Halangan Lain
														<input type="text" name="wajib_ibadah_anak_halangan_input" id="wajib_ibadah_anak_halangan_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan halangan lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Thaharoh</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="thaharoh_anak" id="thaharoh_anak_berwudhu" value="Berwudhu" class="mr-1" >Berwudhu
														<input type="radio" name="thaharoh_anak" id="thaharoh_anak_tayamum" value="Tayamum" class="mr-1 ml-2">Tayamum
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Sholat</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="sholat_anak" id="sholat_anak_berdiri" value="Berdiri" class="mr-1" >Berdiri
														<input type="radio" name="sholat_anak" id="sholat_anak_duduk" value="Duduk" class="mr-1 ml-2">Duduk
														<input type="radio" name="sholat_anak" id="sholat_anak_berbaring" value="Berbaring" class="mr-1 ml-2">Berbaring
													</td>
												</tr>
											</table>
										</div>

											<!-- Row Data Identifikasi Kebutuhan Komunikasi, Edukasi -->
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kebutuhan-komunikasi-edukasi-anak"><i class="fas fa-expand mr-1"></i>Expand</button>IDENTIFIKASI KEBUTUHAN KOMUNIKASI, BELAJAR/EDUKASI
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-kebutuhan-komunikasi-edukasi-anak">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="15%" class="bold">Kewarganegaraan</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<input type="radio" name="kewarganegaraan_anak" id="kewarganegaraan_anak_wni" value="WNI" class="mr-1" >WNI
														<input type="radio" name="kewarganegaraan_anak" id="kewarganegaraan_anak_wna" value="WNA" class="mr-1 ml-2">WNA
													</td>
													<td></td>
													<td width="30%">Pemahaman tentang penyakit dan perawatan</td>
													<td width="1%"></td>
													<td width="19%">
														<input type="radio" name="pt_penyakit_perawatan_anak" id="pt_penyakit_perawatan_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pt_penyakit_perawatan_anak" id="pt_penyakit_perawatan_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Suku Bangsa</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="suku_bangsa_anak" id="suku_bangsa_anak" class="custom-form clear-input" placeholder="Masukkan suku bangsa">
													</td>
													<td></td>
													<td>Pemahaman tentang pengobatan</td>
													<td></td>
													<td>
														<input type="radio" name="pt_pengobatan_anak" id="pt_pengobatan_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pt_pengobatan_anak" id="pt_pengobatan_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Bicara</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="bicara_anak" id="bicara_anak_normal" value="1" class="mr-1" >Normal
														<input type="radio" name="bicara_anak" id="bicara_anak_gangguan" value="0" class="mr-1 ml-2">Gangguan Bicara, Jelaskan
														<input type="text" name="bicara_input_anak" id="bicara_input_anak" class="custom-form clear-input d-inline-block col-lg-5 disabled" placeholder="Jelaskan" disabled>
													</td>
													<td></td>
													<td>Pemahaman tentang nutrisi diet/gizi</td>
													<td></td>
													<td>
														<input type="radio" name="pt_nutrisi_diet_anak" id="pt_nutrisi_diet_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pt_nutrisi_diet_anak" id="pt_nutrisi_diet_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Perlu Penterjemah</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="perlu_penterjemah_anak" id="perlu_penterjemah_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="perlu_penterjemah_anak" id="perlu_penterjemah_anak_ya" value="1" class="mr-1 ml-2">Ya, Bahasa
														<input type="text" name="perlu_penterjemah_anak_input" id="perlu_penterjemah_anak_input" class="custom-form clear-input d-inline-block col-lg-5 disabled" placeholder="Masukkan Bahasa" disabled>
													</td>
													<td></td>
													<td>Pemahaman tentang spiritual</td>
													<td></td>
													<td>
														<input type="radio" name="pt_spiritual_anak" id="pt_spiritual_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pt_spiritual_anak" id="pt_spiritual_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Bahasa Isyarat</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="bahasa_isyarat_anak" id="bahasa_isyarat_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="bahasa_isyarat_anak" id="bahasa_isyarat_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
													<td></td>
													<td>Pemahaman tentang peralatan medis</td>
													<td></td>
													<td>
														<input type="radio" name="pt_peralatan_medis_anak" id="pt_peralatan_medis_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pt_peralatan_medis_anak" id="pt_peralatan_medis_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>




												<tr>
													<td class="bold">Hambatan belajar</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="hanbatan_belajar_w" id="hanbatan-belajar-w-tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="hanbatan_belajar_w" id="hanbatan-belajar-w-ya" value="1" class="mr-1 ml-2">Ya
													</td>
													<td></td>
													<td>Pemahaman tentang rehab medik</td>
													<td></td>
													<td>
														<input type="radio" name="pt_rehab_medik_anak" id="pt_rehab_medik_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pt_rehab_medik_anak" id="pt_rehab_medik_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>





												<tr>												
													<td class="bold">Pendidikan</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="pendidikan_anak" id="pendidikan_anak" class="custom-form clear-input" placeholder="Masukkan Pendidikan Anak">
													</td>
													<td></td>
													<td>Pemahaman tentang manajemen nyeri</td>
													<td></td>
													<td>
														<input type="radio" name="pt_manajemen_nyeri_anak" id="pt_manajemen_nyeri_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pt_manajemen_nyeri_anak" id="pt_manajemen_nyeri_anak_ya" value="1" class="mr-1 ml-2">Ya
													</td>													
												</tr>



												<tr>												
													<td class="bold"></td>
													<td class="bold"></td>
													<td></td>
													<td></td>
													<td><b>Hambatan menerima edukasi</b> 
													&nbsp;&nbsp;<input type="text" name="h_menerima_edikasi_w" id="h-menerima-edikasi-w" class="custom-form clear-input d-inline-block col-lg-7" placeholder="..............">
													</td>
													<!-- <td></td>
													<td></td>													 -->
												</tr>
											
											</table>
										</div>

										<!-- Row Pemeriksaan Fisik dan Tanda Vital -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemeriksaan-fisik-anak"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-pemeriksaan-fisik-anak">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Kesadaran</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<input type="checkbox" name="composmentis_anak" id="composmentis_anak" value="1" class="mr-1">Composmentis
														<input type="checkbox" name="apatis_anak" id="apatis_anak" value="1" class="mr-1 ml-2">Apatis
														<input type="checkbox" name="samnolen_anak" id="samnolen_anak" value="1" class="mr-1 ml-2">Samnolen
														<input type="checkbox" name="sopor_anak" id="sopor_anak" value="1" class="mr-1 ml-2">Sopor
														<input type="checkbox" name="koma_anak" id="koma_anak" value="1" class="mr-1 ml-2">Koma
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
															E <input type="text" name="gcs_e_anak" id="gcs_e_anak" class="custom-form clear-input d-inline-block col-lg-1 gcsm" placeholder="" onkeypress="return hanyaAngka(event)">
															M <input typevent="text" name="gcs_m_anak" id="gcs_m_anak" class="custom-form clear-input d-inline-block col-lg-1 gcsm" placeholder="" onkeypress="return hanyaAngka(event)">
															V <input type="text" name="gcs_v_anak" id="gcs_v_anak" class="custom-form clear-input d-inline-block col-lg-1 gcsm" placeholder="" onkeypress="return hanyaAngka(event)">
															Total : <input type="text" name="gcsm_total" id="gcsm-total"class="custom-form clear-input d-inline-block col-lg-1 ml-3"placeholder="0">
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
															<input type="text" name="tensi_sis_anak" id="pa_tensi_sis_anak" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
															<span>/</span>
															<input type="text" name="tensi_dis_anak" id="pa_tensi_dis_anak" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Diastolik" onkeypress="return hanyaAngka(event)">
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
															<input type="text" name="suhu_pa_anak" id="pa_suhu_anak" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Suhu" onkeypress="return hanyaAngka(event)">
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
															<input type="text" name="nadi_pa_anak" id="pa_nadi_anak" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">x/mnt</span>
															</div>
														</div>
													</td>
													<td></td>
													<td class="bold">Pernafasan</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="nafas_pa_anak" id="pa_nafas_anak" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Nafas" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">x/mnt</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="bold">Berat Badan</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="berat_badan_awal" id="berat_badan_awal" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Berat Badan" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Kg</span>
															</div>
														</div>
													</td>
													<td></td>
													<td class="bold">Tinggi Badan</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="tinggi_awal_anak" id="tinggi_awal_anak" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Tinggi Badan" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">cm</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="bold">Lingkar Kepala</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="lingkar_kepala_anak" id="lingkar_kepala_anak" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Lingkar Kepala" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Cm</span>
															</div>
														</div>
													</td>
													<td></td>
													<td class="bold">Lingkar Dada</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="lingkar_dada_anak" id="lingkar_dada_anak" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Lingkar Dada" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Cm</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td width="20%" class="bold">Lingkar Perut</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">											
														<div class="input-group">
															<input type="text" name="lingkar_perut_anak" id="lingkar_perut_anak" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Lingkar Perut" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Cm</span>
															</div>
														</div>
													</td>
													<td></td>
												</tr>												
											</table>
											<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="20%" class="bold">Gangguan Neurologis</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="gangguan_neurologis" id="gangguan_neurologis_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="gangguan_neurologis" id="gangguan_neurologis_ya" value="1" class="mr-1 ml-2">Ada, Sebutkan
														<input type="text" name="gangguan_neurologis_input" id="gangguan_neurologis_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="lainnya....." disabled>
													</td>
												</tr>		
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Pernafasan</td>
												</tr>
												<tr>
													<td><span class="ml-4">Irama Nafas</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="irama_nafas_anak" id="irama_nafas_anak_reguler" value="Reguler" class="mr-1" >Reguler
														<input type="radio" name="irama_nafas_anak" id="irama_nafas_anak_irreguler" value="Irreguler" class="mr-1 ml-2">Irreguler
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Retraksi Dada</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="retraksi_dada_anak" id="retraksi_dada_anak_ya" value="1" class="mr-1" >Ada
														<input type="radio" name="retraksi_dada_anak" id="retraksi_dada_anak_tidak" value="0" class="mr-1 ml-2">Tidak Ada
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Bentuk Dada</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="bentuk_dada_anak" id="bentuk_dada_anak_normal" value="1" class="mr-1" >Normal
														<input type="radio" name="bentuk_dada_anak" id="bentuk_dada_anak_tidak_normal" value="0" class="mr-1 ml-2">Tidak normal, sebutkan
														<input type="text" name="bentuk_dada_anak_input" id="bentuk_dada_anak_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Sebutkan" disabled>
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pola Nafas</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="pola_nafas_anak" id="pola_nafas_anak_normal" value="1" class="mr-1" >Normal
														<input type="radio" name="pola_nafas_anak" id="pola_nafas_anak_tidak_normal" value="0" class="mr-1 ml-2">Tidak normal, sebutkan
														<input type="text" name="pola_nafas_anak_input" id="pola_nafas_anak_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Sebutkan" disabled>
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Suara Nafas</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="suara_nafas_anak" id="suara_nafas_anak_normal" value="1" class="mr-1" >Normal
														<input type="radio" name="suara_nafas_anak" id="suara_nafas_anak_tidak_normal" value="0" class="mr-1 ml-2">Tidak normal, sebutkan
														<input type="text" name="suara_nafas_anak_input" id="suara_nafas_anak_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Sebutkan" disabled>
													</td>
												</tr>												
												<tr>
													<td><span class="ml-4">Nafas Cuping Hidung</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="nafas_cuping_hidung" id="nafas_cuping_hidung_ya" value="1" class="mr-1" >Ada
														<input type="radio" name="nafas_cuping_hidung" id="nafas_cuping_hidung_tidak" value="0" class="mr-1 ml-2">Tidak Ada
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Sianosis</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="sianosis_nafas_anak" id="sianosis_nafas_anak_ya" value="1" class="mr-1" >Ada
														<input type="radio" name="sianosis_nafas_anak" id="sianosis_nafas_anak_tidak" value="0" class="mr-1 ml-2">Tidak Ada
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Alat Bantu Nafas</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="alat_bantu_nafas_anak" id="alat_bantu_nafas_anak_spontan" value="Spontan" class="mr-1" >Spontan
														<input type="radio" name="alat_bantu_nafas_anak" id="alat_bantu_nafas_anak_kanul" value="Kanul" class="mr-1 ml-2">Kanul/ RB Mask/ NRB Mask (lingkari yang sesuai) O2
														<input type="text" name="alat_bantu_nafas_anak_kanul_input" id="alat_bantu_nafas_anak_kanul_input" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Sebutkan" disabled> L/mnt
														<input type="checkbox" name="alat_bantu_nafas_anak_ventilator" id="alat_bantu_nafas_anak_ventilator" value="Ventilator" class="mr-1 ml-2">Ventilator, setting
														<input type="text" name="alat_bantu_nafas_anak_ventilator_input" id="alat_bantu_nafas_anak_ventilator_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												
												
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sirkulasi</td>
												</tr>
												<tr>
													<td><span class="ml-4">Sianosis</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="sirkualsi_sianosis" id="sirkualsi_sianosis_ya" value="1" class="mr-1">Ada
														<input type="radio" name="sirkualsi_sianosis" id="sirkualsi_sianosis_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pucat</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="pucat_anak" id="pucat_anak_ya" value="1" class="mr-1">Ada
														<input type="radio" name="pucat_anak" id="pucat_anak_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Intensitas Nadi</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="intensitas_nadi_anak_kuat" id="intensitas_nadi_anak_kuat" value="Kuat" class="mr-1">Kuat
														<input type="checkbox" name="intensitas_nadi_anak_lemah" id="intensitas_nadi_anak_lemah" value="Lemah" class="mr-1 ml-2">Lemah
														<input type="checkbox" name="itensitas_nadi_anak_bounding" id="itensitas_nadi_anak_bounding" value="Bounding" class="mr-1 ml-2">Bounding
														</td>
												</tr>
												<tr>
													<td><span class="ml-4">Irama Nadi</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="irama_nadi_anak" id="irama_nadi_anak_reguler" value="Reguler" class="mr-1">Reguler
														<input type="radio" name="irama_nadi_anak" id="irama_nadi_anak_irreguler" value="Irreguler" class="mr-1 ml-2" >Irreguler
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Edema</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="edema_anak" id="edema_anak_ya" value="1" class="mr-1">Ada
														<input type="radio" name="edema_anak" id="edema_anak_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Akral</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="akral_anak" id="akral_anak_hangat" value="Hangat" class="mr-1">Hangat
														<input type="radio" name="akral_anak" id="akral_anak_dingin" value="Dingin" class="mr-1 ml-2" >Dingin
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">CRT</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="crt_anak" id="crt_anak_ya" value="Kurang dari 3" class="mr-1"> Kurang dari 3 Detik
														<input type="radio" name="crt_anak" id="crt_anak_tidak" value="Lebih dari 3" class="mr-1 ml-2" >Lebih dari 3 Detik
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Clubbing Finger</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="clubing_finger_anak" id="clubing_finger_anak_ya" value="1" class="mr-1">Ada
														<input type="radio" name="clubing_finger_anak" id="clubing_finger_anak_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Gastrointestinal</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Mulut</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="mukosa_lembab_anak" id="mukosa_lembab_anak" value="1" class="mr-1">Mukosa Lembab
														<input type="checkbox" name="mukosa_kering_anak" id="mukosa_kering_anak" value="1" class="mr-1 ml-2">Mukosa Kering
														<input type="checkbox" name="stomatitis_anak" id="stomatitis_anak" value="1" class="mr-1 ml-2">Stomatitis
														<input type="checkbox" name="labio_anak" id="labio_anak" value="1" class="mr-1 ml-2">Labio/Palatoschizis
														<input type="checkbox" name="pendarahan_gusi_anak" id="pendarahan_gusi_anak" value="1" class="mr-1 ml-2">Pendarahan Gusi
														<input type="checkbox" name="mulut_lainnya" id="mulut_lainnya" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="mulut_lainnya_input" id="mulut_lainnya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain" disabled>								
													</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4"></span>Muntah</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="muntah_anak" id="muntah_anak_tidak" value="0" class="mr-1">Tidak
														<input type="radio" name="muntah_anak" id="muntah_anak_ya" value="1" class="mr-1 ml-2">Ya
														<input type="text" name="muntah_anak_lainnya" id="muntah_anak_lainnya" class="custom-form clear-input d-inline-block col-lg-3 ml-2" disabled>
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Mual</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="mual_anak" id="mual_anak_ya" value="1" class="mr-1">Ada
														<input type="radio" name="mual_anak" id="mual_anak_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Nyeri Ulu Hati</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="nyeri_ulu_hati_anak" id="nyeri_ulu_hati_anak_ya" value="1" class="mr-1">Ada
														<input type="radio" name="nyeri_ulu_hati_anak" id="nyeri_ulu_hati_anak_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Ascites</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="ascites_anak" id="ascites_anak_ya" value="1" class="mr-1">Ada
														<input type="radio" name="ascites_anak" id="ascites_anak_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Peristaltik Usus</span></td>
													<td >:</td>
													<td>
														<div class="input-group">
															<input type="text" name="peristaltik_usus_anak" id="peristaltik_usus_anak" class="custom-form clear-input d-inline-block col-lg-2" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">x/mnt</span>
															</div>
														</div>
													</td>
												</tr>												
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Eliminasi</td>
												</tr>
												<tr>
													<td colspan="3" class="bold">BAB</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4"></span>Pengeluaran</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="pengeluaran_anus" id="pengeluaran_anus" value="Anus" class="mr-1">Anus
														<input type="checkbox" name="pengeluaran_stomata" id="pengeluaran_stomata" value="Stomata" class="mr-1 ml-2">Stoma, Sebutkan
														<input type="text" name="pengeluaran_stomata_lokasi" id="pengeluaran_stomata_lokasi" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" disabled>
													</td>
												</tr>









												
												<tr>
													<td><span class="ml-4">Frekuensi</span></td>
													<td >:</td>
													<td>
														<div class="input-group">
															<input type="text" name="frekuensi_bab" id="frekuensi_bab" class="custom-form clear-input d-inline-block col-lg-2 ml-2">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
															Konsistensi : &nbsp; &nbsp;<input type="text" name="konsistensi_anak" id="konsistensi-anak" class="custom-form clear-input d-inline-block col-lg-2">															
														</div>
													</td>
												</tr>	







												<tr>
													<td><span class="ml-4">Karakteristik feses</span></td>
													<td >:</td>
													<td>
														<div class="input-group">
															<input type="checkbox" name="normal_anak_1" id="normal-anak-1" value="1" class="mr-1">Normal
															<input type="checkbox" name="normal_anak_2" id="normal-anak-2" value="2" class="mr-1 ml-2">Cair
															<input type="checkbox" name="normal_anak_3" id="normal-anak-3" value="3" class="mr-1 ml-2">Hijau
															<input type="checkbox" name="normal_anak_4" id="normal-anak-4" value="4" class="mr-1 ml-2">Dempul
															<input type="checkbox" name="normal_anak_5" id="normal-anak-5" value="5" class="mr-1 ml-2">Terdapat darah
															<input type="checkbox" name="normal_anak_6" id="normal-anak-6" value="6" class="mr-1 ml-2">Lain - lain
															&nbsp; &nbsp;&nbsp;
															<input type="text" name="konsistensi_bab" id="konsistensi_bab" class="custom-form clear-input d-inline-block col-lg-2" disabled>																	
														</div>
													</td>
												</tr>







												<tr>
													<td colspan="3" class="bold">BAK</td>
												</tr>	
												<tr>
													<td width="20%"><span class="ml-4">Pengeluaran</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="pengeluaran_spontan_bak" id="pengeluaran_spontan_bak" value="1" class="mr-1">Spontan
														<input type="checkbox" name="krakter_urine_bak" id="krakter_urine_bak" value="1" class="mr-1 ml-2">Kateter Urine
														<input type="checkbox" name="pengeluaran_cystostomy" id="pengeluaran_cystostomy" value="1" class="mr-1 ml-2">Cystostomy
													</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4"></span>Kelainan</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="kelainan_bak" id="kelainan_bak_tidak" value="0" class="mr-1">Tidak
														<input type="radio" name="kelainan_bak" id="kelainan_bak_ada" value="1" class="mr-1 ml-2">Ada, sebutkan
														<input type="text" name="kelainan_bak_lainnya" id="kelainan_bak_lainnya" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Sebutkan kelainan" disabled>
													</td>
												</tr>																						
											</table>										
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Integumen</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Warna Kulit</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="si_warna_pucat_anak" id="si_warna_pucat_anak" value="1" class="mr-1">Pucat
														<input type="checkbox" name="si_warna_kuniing_anak" id="si_warna_kuniing_anak" value="1" class="mr-1 ml-2">Kuning
														<input type="checkbox" name="si_warna_normal_anak" id="si_warna_normal_anak" value="1" class="mr-1 ml-2">Normal
														<input type="checkbox" name="si_warna_kulit_mootled" id="si_warna_kulit_mootled" value="1" class="mr-1 ml-2">Mottled
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Kelainan</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="kelainan_sistem_integumen" id="kelainan_sistem_integumen_ya" value="1" class="mr-1">Ada
														<input type="radio" name="kelainan_sistem_integumen" id="kelainan_sistem_integumen_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Resiko Dekubitus</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="resiko_dekubitus_anak" id="resiko_dekubitus_anak_ya" value="1" class="mr-1">Ada
														<input type="radio" name="resiko_dekubitus_anak" id="resiko_dekubitus_anak_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Luka</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="luka_anak" id="luka_anak_ya" value="1" class="mr-1">Ada
														<input type="radio" name="luka_anak" id="luka_anak_tidak" value="0" class="mr-1 ml-2" >Tidak
													</td>
												</tr>
												<tr>
													<td colspan="3" class="bold">Muskoskeletal</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4"></span>Kelainan Tulang</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="kelainan_tulang_anak" id="kelainan_tulang_anak_tidak" value="0" class="mr-1">Tidak
														<input type="radio" name="kelainan_tulang_anak" id="kelainan_tulang_anak_ya" value="1" class="mr-1 ml-2">Ada, sebutkan
														<input type="text" name="kelainan_tulang_anak_lainnya" id="kelainan_tulang_anak_lainnya" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Sebutkan kelainan" disabled>
													</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Gerakan Anak</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="gerakan_anak" id="gerakan_anak_beas" value="Bebas" class="mr-1">Bebas
														<input type="radio" name="gerakan_anak" id="gerakan_anak_terbatas" value="Terbatas" class="mr-1 ml-2">Terbatas
													</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4"></span>Genetalia</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="genetalia_anak" id="genetalia_anak_normal" value="1" class="mr-1">Normal
														<input type="radio" name="genetalia_anak" id="genetalia_anak_kelainan" value="0" class="mr-1 ml-2">Kelainan, sebutkan
														<input type="text" name="genetalia_anak_lainnya" id="genetalia_anak_lainnya" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Sebutkan kelainan" disabled>
													</td>
												</tr>																
											</table>											
										</div>	
										
										<!-- Row Data Skrining Nyeri -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-tingkat-nyeri-dan-resiko-jatuh-anak"><i class="fas fa-expand mr-1"></i>Expand</button>SKRINING NYERI</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-penilaian-tingkat-nyeri-dan-resiko-jatuh-anak">
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
																<input type="radio" name="ptn_keterangan_anak" id="ptn_keterangan_anak_tidak_nyeri" value="Tidak Nyeri" class="mr-1">Tidak Nyeri 0
																<input type="radio" name="ptn_keterangan_anak" id="ptn_keterangan_anak_ringan" value="Ringan" class="mr-1">Ringan : 1 - 3 
																<input type="radio" name="ptn_keterangan_anak" id="ptn_keterangan_anak_sedang" value="Sedang" class="mr-1">Sedang : 4 - 6 
																<input type="radio" name="ptn_keterangan_anak" id="ptn_keterangan_anak_berat" value="Berat" class="mr-1">Berat : 7 - 10
															</td>
														</tr>
														<tr>
															<td class="bold">Nyeri Hilang, Bila</td>
															<td class="bold">:</td>
															<td>
																<input type="checkbox" name="ptn_minum_obat_anak" id="ptn_minum_obat_anak" value="1" class="mr-1">Minum Obat
																<input type="checkbox" name="ptn_mendengarkan_musik_anak" id="ptn_mendengarkan_musik_anak" value="1" class="mr-1 ml-2">Mendengarkan Musik
																<input type="checkbox" name="ptn_istirahat_anak" id="ptn_istirahat_anak" value="1" class="mr-1 ml-2">Istirahat
															</td>
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td>
																<input type="checkbox" name="ptn_berubah_posisi_anak" id="ptn_berubah_posisi_anak" value="1" class="mr-1">Berubah Posisi / Tidur
																<input type="checkbox" name="ptn_lain_anak" id="ptn_lain_anak" value="1" class="mr-1 ml-2">Lain-lain
																<input type="text" name="ptn_lain_input_anak" id="ptn_lain_input_anak" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain - lain">
															</td>
														</tr>
														<tr>
															<td class="bold">Lokasi Nyeri</td>
															<td class="bold">:</td>
															<td>
																<div class="input-group">
																	<input type="text" name="lokasi_nyeri_anak" id="lokasi_nyeri_anak" class="custom-form clear-input d-inline-block col-lg-2">
																</div>
															</td>
														</tr>
														<tr>
															<td class="bold">Durasi Nyeri</td>
															<td class="bold">:</td>
															<td>
																<div class="input-group">
																	<input type="text" name="durasi_nyeri_anak" id="durasi_nyeri_anak" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
																	<div class="input-group-append">
																		<span class="input-group-custom">x/mnt</span>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td class="bold">Frekuensi</td>
															<td class="bold">:</td>
															<td>
																<div class="input-group">
																	<input type="text" name="frekuensi_nyeri_anak" id="frekuensi_nyeri_anak" class="custom-form clear-input d-inline-block col-lg-2">
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class="col-lg-6">
													<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
														<tr>
															<td colspan="3" class="bold center">Untuk Anak Usia Kurang dari 3 Tahun <i> FLACC Behavioral Pain Assessment Scale</i></td>
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
																<td colspan="3">Wajah</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="ekspresi_wajah_anak_1" id="ekspresi_wajah_anak_1" value="1" class="mr-1">Tidak ada ekspresi tertentu atau senyum</td>
																<td><input type="radio" name="ekspresi_wajah_anak_1_ya" id="ekspresi_wajah_anak_1_ya" value="1" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">1</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="ekspresi_wajah_anak_2" id="ekspresi_wajah_anak_2" value="1" class="mr-1">Sesekali meringis/mengerutkan kening, menarik diri, tidak tertarik</td>
																<td><input type="radio" name="ekspresi_wajah_anak_2_ya" id="ekspresi_wajah_anak_2_ya" value="2" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">2</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="ekspresi_wajah_anak_3" id="ekspresi_wajah_anak_3" value="1" class="mr-1">Sering sampai konstan mengerutkan kening, rahang terkatup, dagu gemeteran</td>
																<td><input type="radio" name="ekspresi_wajah_anak_3_ya" id="ekspresi_wajah_anak_3_ya" value="3" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">3</td>
															</tr>
															<tr>
																<td colspan="3">Kaki</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="kaki_anak_1" id="kaki_anak_1" value="1" class="mr-1">Posisi kaki normal atau santai</td>
																<td><input type="radio" name="kaki_anak_1_ya" id="kaki_anak_1_ya" value="0" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="kaki_anak_2" id="kaki_anak_2" value="1" class="mr-1">Cemas, gelisah, tegang</td>
																<td><input type="radio" name="kaki_anak_2_ya" id="kaki_anak_2_ya" value="1" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">1</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="kaki_anak_3" id="kaki_anak_3" value="1" class="mr-1">Menendang atau menarik kaki</td>
																<td><input type="radio" name="kaki_anak_3_ya" id="kaki_anak_3_ya" value="2" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">2</td>
															</tr>		
															<tr>
																<td colspan="3">Aktifitas</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="aktifitas_anak_1" id="aktifitas_anak_1" value="1" class="mr-1">Berbaring tenang, posisi normal, bergerak dengan mudah </td>
																<td><input type="radio" name="aktifitas_anak_1_ya" id="aktifitas_anak_1_ya" value="0" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="aktifitas_anak_2" id="aktifitas_anak_2" value="1" class="mr-1">Menggeliat, mondar-mandir, tegang</td>
																<td><input type="radio" name="aktifitas_anak_2_ya" id="aktifitas_anak_2_ya" value="1" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">1</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="aktifitas_anak_3" id="aktifitas_anak_3" value="1" class="mr-1">Melengkung, kaku, menyentak </td>
																<td><input type="radio" name="aktifitas_anak_3_ya" id="aktifitas_anak_3_ya" value="2" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">2</td>
															</tr>	
															<tr>
																<td colspan="3">Menangis</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="ekspresi_menangis_anak_1" id="ekspresi_menangis_anak_1" value="1" class="mr-1">Tidak ada teriakan (terjaga/tidur)</td>
																<td><input type="radio" name="ekspresi_menangis_anak_1_ya" id="ekspresi_menangis_anak_1_ya" value="0" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="ekspresi_menangis_anak_2" id="ekspresi_menangis_anak_2" value="1" class="mr-1">Mengerang, merintih, sekali mengeluh</td>
																<td><input type="radio" name="ekspresi_menangis_anak_2_ya" id="ekspresi_menangis_anak_2_ya" value="1" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">1</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="ekspresi_menangis_anak_3" id="ekspresi_menangis_anak_3" value="1" class="mr-1">Menangis terus, teriak, sering mengeluh</td>
																<td><input type="radio" name="ekspresi_menangis_anak_3_ya" id="ekspresi_menangis_anak_3_ya" value="2" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">2</td>
															</tr>	
															<tr>
																<td colspan="3">Bicara/ Suara</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="cara_biacara_anak_1" id="cara_biacara_anak_1" value="1" class="mr-1">Puas, senang, santai</td>
																<td><input type="radio" name="cara_biacara_anak_1_ya" id="cara_biacara_anak_1_ya" value="0" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="cara_bicara_anak_2" id="cara_bicara_anak_2" value="1" class="mr-1">Sesekali diyakinkan dengan sentuhan, pelukan, diajak berbicara atau dialihkan</td>
																<td><input type="radio" name="cara_bicara_anak_2_ya" id="cara_bicara_anak_2_ya" value="1" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">1</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="cara_bicara_anak_3" id="cara_bicara_anak_3" value="1" class="mr-1">Sulit untuk dihibur atau dibuat nyaman</td>
																<td><input type="radio" name="cara_bicara_anak_3_ya" id="cara_bicara_anak_3_ya" value="2" class="mr-1" disabled onchange="calcscoresna()">Ya</td>
																<td class="center">2</td>
															</tr>	
															<tr>
																<td colspan="2" class="bold">JUMLAH SKOR</td>
																<td class="center"><input type="number" min="0" name="skrining_jumlah_skor" id="skrining_jumlah_skor" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
															</tr>																										
														</tbody>
													</table>													
												</div>
											</div>
										</div>

										<!-- Row Data Penilaian Resiko Jatuh-->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-resiko-jatuh-anak"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN RESIKO JATUH</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-penilaian-resiko-jatuh-anak">
											<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
												<thead>
													<tr>
														<th class="center" width="5%"><b>No.</b></th>
														<th class="center" width="20%"><b>Parameter</b></th>
														<th class="center" width="45%"><b>Kriteria</b></th>
														<th class="center" width="15"><b>Jawaban (Pilih)</b></th>
														<th class="center" width="5%"><b>Skore</b></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th rowspan="4" class="center v-center">1.</th>
														<td rowspan="4">Umur</td>
														<td>Dibawah 3 Tahun</td>
														<td class="center">
															<input type="checkbox" name="prja_riwayat_jatuh_anak_3_tahun" id="prja_riwayat_jatuh_anak_3_tahun_ya" value="4" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">4</td>
													</tr>
													<tr>
														<td>3 - 7 tahun</td>
														<td class="center">
															<input type="checkbox" name="prja_riwayat_jatuh_anak_7_tahun" id="prja_riwayat_jatuh_anak_7_tahun_ya" value="3" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">3</td>
													</tr>
													<tr>
														<td>7 - 13 Tahun</td>
														<td class="center">
															<input type="checkbox" name="prja_riwayat_jatuh_anak_13_tahun" id="prja_riwayat_jatuh_anak_13_tahun_ya" value="2" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">2</td>
													</tr>
													<tr>
														<td>Lebih dari 13 Tahun</td>
														<td class="center">
															<input type="checkbox" name="prja_riwayat_jatuh_anak_lebih_13" id="prja_riwayat_jatuh_anak_lebih_13_ya" value="1" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">1</td>
													</tr>
													<tr>
														<th rowspan="2" class="center v-center">2.</th>
														<td rowspan="2">Jenis Kelamin</td>
														<td>Laki - laki</td>
														<td class="center">
															<input type="checkbox" name="prja_jk_laki" id="prja_jk_laki_ya" value="2" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">2</td>
													</tr>
													<tr>
														<td>Perempuan</td>
														<td class="center">
															<input type="checkbox" name="prja_jk_perempuan" id="prja_jk_perempuan_ya" value="1" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">1</td>
													</tr>
													<tr>
														<th rowspan="4" class="center v-center">3.</th>
														<td rowspan="4">Diagnosis</td>
														<td>Kelainan Neurologi</td>
														<td class="center">
															<input type="checkbox" name="prja_diagnosis_neurologi" id="prja_diagnosis_neurologi_ya" value="4" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">4</td>
													</tr>
													<tr>
														<td>Respiratori, dehidrasi, anemia, anoreksia,syncope</td>
														<td class="center">
															<input type="checkbox" name="prja_diagnosis_respirator" id="prja_diagnosis_respirator_ya" value="3" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">3</td>
													</tr>
													<tr>
														<td>Perilaku</td>
														<td class="center">
															<input type="checkbox" name="prja_diagnosis_perilaku" id="prja_diagnosis_perilaku_ya" value="2" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">2</td>
													</tr>
													<tr>
														<td>Lain-lain  </td>
														<td class="center">
															<input type="checkbox" name="prja_diagnosis_lain" id="prja_diagnosis_lain_ya" value="1" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">1</td>
													</tr>
													<tr>
														<th rowspan="4" class="center v-center">4.</th>
														<td rowspan="4">Gangguan Kognitif</td>														
													<tr>
														<td>Keterbatasan daya pikir</td>
														<td class="center">
															<input type="checkbox" name="prja_gk_keterbatasan" id="prja_gk_keterbatasan_ya" value="3" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">3</td>
													</tr>
													<tr>
														<td>Pelupa, berkurangnya orientasi sekitar</td>
														<td class="center">
															<input type="checkbox" name="prja_gk_pelupa" id="prja_gk_pelupa_ya" value="2" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">2</td>
													</tr>
													<tr>
														<td>Dapat menggunakan daya pikir tanpa hambatan</td>
														<td class="center">
															<input type="checkbox" name="prja_gk_daya_pikir" id="prja_gk_daya_pikir_ya" value="1" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">1</td>
													</tr>
													<tr>
														<th rowspan="4" class="center v-center">5.</th>
														<td rowspan="4">Faktor Lingkungan</td>
														<td>Riwayat Jatuh atau bayi/balita yang di tempatkan di tempat tidur</td>
														<td class="center">
															<input type="checkbox" name="prja_riwayat_jatuh_bayi" id="prja_riwayat_jatuh_bayi_ya" value="4" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">4</td>
													</tr>
													<tr>
														<td>Pasien menggunakan alat bantu atau bayi/balita dalam ayunan</td>
														<td class="center">
															<input type="checkbox" name="prja_alat_bantu_pasien" id="prja_alat_bantu_pasien_ya" value="3" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">3</td>
													</tr>
													<tr>
														<td>Pasien di tempat tidur standar</td>
														<td class="center">
															<input type="checkbox" name="prja_psaien_tempat_tidur" id="prja_psaien_tempat_tidur_ya" value="2" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">2</td>
													</tr>
													<tr>
														<td>Area pasien rawat jalan</td>
														<td class="center">
															<input type="checkbox" name="prja_area_pasien" id="prja_area_pasien_ya" value="1" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">1</td>
													</tr>
													<tr>
														<th rowspan="4" class="center v-center">6.</th>
														<td rowspan="4">Respon terhadap pembedahan, sedasi dan anestesi</td>														
													<tr>
														<td>Dalam 24 Jam</td>
														<td class="center">
															<input type="checkbox" name="prja_24_jam" id="prja_24_jam_ya" value="3" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">3</td>
													</tr>
													<tr>
														<td>Dalam 48 Jam</td>
														<td class="center">
															<input type="checkbox" name="prja_48_jam" id="prja_48_jam_ya" value="2" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">2</td>
													</tr>
													<tr>
														<td>Lebih dari 48 jam/tidak ada respon</td>
														<td class="center">
															<input type="checkbox" name="prja_lebih_48_jam" id="prja_lebih_48_jam_ya" value="1" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">1</td>
													</tr>
													<tr>
														<th rowspan="4" class="center v-center">7.</th>
														<td rowspan="4">Penggunaan obat-obatan</td>														
													<tr>
														<td>Penggunaan bersamaan sedative barbiturate, anti depresan, diurectic, narkotika</td>
														<td class="center">
															<input type="checkbox" name="prja_pengguanaan_obat_bersama" id="prja_pengguanaan_obat_bersama_ya" value="3" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">3</td>
													</tr>
													<tr>
														<td>Salah satu dari obat diatas</td>
														<td class="center">
															<input type="checkbox" name="prja_penggunaan_salah_satu_obat" id="prja_penggunaan_salah_satu_obat_ya" value="2" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">2</td>
													</tr>
													<tr>
														<td>Obat-obatan lainnya/tanpa obat</td>
														<td class="center">
															<input type="checkbox" name="prja_tanpa_obat" id="prja_tanpa_obat_ya" value="1" class="mr-1" onchange="calcscoreprja()">Ya
														</td>
														<td class="center">1</td>
													</tr>	
													<tr>
														<td colspan="3" class="bold center">TOTAL</td>
														<td><input type="number" name="prja_nilai_total" id="prja_nilai_total" class="custom-form clear-input center" placeholder="Jumlah" readonly></td>
														<td></td>
													</tr>																																												
													<tr>
													<td colspan="2">
															<span class="bold">Resiko Rendah : 7 - 11 &nbsp;&nbsp;&nbsp;  Resiko Tinggi : ≥ 12</span><br>
															<!-- <span class="ml-3">7 - 11 = </span><br>
															<span class="ml-3">Lebih dari 12 :  Resiko Tinggi</span><br> -->
														</td>
														<!-- <td colspan="5">
															<span class="bold">Keterangan : </span><br>
															<span class="ml-3">7 - 11 = Resiko Rendah</span><br>
															<span class="ml-3">Lebih dari 12 : ≥ Resiko Tinggi</span><br>
														</td> -->
													</tr>
													
												</tbody>
											</table>
										</div>

										<!-- Row Data Skrining Gizi) -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skrining-gizi"><i class="fas fa-expand mr-1"></i>Expand</button>SKRINING GIZI</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-skrining-gizi">
											<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
												<thead>
													<tr>
														<th class="center" width="5%"><b>No.</b></th>
														<th class="center" width="45%"><b>Pertanyaan</b></th>
														<th class="center" width="15%"><b>Jawaban (Pilih)</b></th>
														<th class="center" width="15%"><b>Keterangan Nilai</b></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th rowspan="2" class="center v-center">1.</th>
														<td rowspan="2" class="v-center">Apakah pasien memiliki status nutrisi kurang atau buruk secara klinis? (anak kurus/sangat kurus, mata cekung, wajah tampak "tua", edema, rambut tipis dan jarang, otot lengan dan paha tipis, iga gambang, perut kempes, bokong tipis dan kisut)</td>
														<td class="center">
															<input type="radio" name="sgizi_gizi_buruk" id="sgizi_gizi_buruk_ya" value="1" class="mr-1" onchange="calcscoresgizi()">Ya
															<input type="radio" name="sgizi_gizi_buruk" id="sgizi_gizi_buruk_tidak" value="0" class="mr-1 ml-3"  onchange="calcscoresgizi()">Tidak
														</td>
														<td rowspan="2">Ya, memiliki skor = 1</td>
													</tr>
													<tr></tr>
													<tr>
														<th rowspan="2" class="center v-center">2.</th>
														<td rowspan="2" class="v-center">Apakah terdapat penurunan berat badan selama 1 bulan terakhir? atau untuk bayi < dari 1 tahun berat badan tidak naik selama 3 bulan terakhir ? 
															<br><i> Jika pasien menjawab tidak tahu, dianggap jawaban "Ya" </i></td>
														<td class="center">
															<input type="radio" name="sgizi_penurunan_bb" id="sgizi_penurunan_bb_ya" value="1" class="mr-1" onchange="calcscoresgizi()">Ya
															<input type="radio" name="sgizi_penurunan_bb" id="sgizi_penurunan_bb_tidak" value="0" class="mr-1 ml-3"  onchange="calcscoresgizi()">Tidak
														</td>
														<td rowspan="2">Ya, memiliki skor = 1</td>
													</tr>
													<tr></tr>
													<tr>
														<th rowspan="2" class="center v-center">3.</th>
														<td rowspan="2" class="v-center">Apakah terdapat SALAH SATU dari kondisi berikut ?
															<br>(-) Diare Profuse (lebih dari 5x/sehari) dan atau muntah (lebih dari 3x/hari)
															<br>(-) Asupan makan berkurang selama 1 minggu terakhir 
														</td>
														<td class="center">
															<input type="radio" name="sgizi_dua_kondisi" id="sgizi_dua_kondisi_ya" value="1" class="mr-1" onchange="calcscoresgizi()">Ya
															<input type="radio" name="sgizi_dua_kondisi" id="sgizi_dua_kondisi_tidak" value="0" class="mr-1 ml-3"  onchange="calcscoresgizi()">Tidak
														</td>
														<td rowspan="2">Ya, memiliki skor = 1</td>
													</tr>
													<tr></tr>
													<tr>
														<th rowspan="2" class="center v-center">4.</th>
														<td rowspan="2" class="v-center">Apakah terdapat penyakit dasar atau keadaan yang mengakibatkan pasien beresiko mengalami malnutrisi (lihat tabel dibawah ini -+) </td>
														<td class="center">
															<input type="radio" name="sgizi_malnutrisi" id="sgizi_malnutrisi_ya" value="1" class="mr-1" onchange="calcscoresgizi()">Ya
															<input type="radio" name="sgizi_malnutrisi" id="sgizi_malnutrisi_tidak" value="0" class="mr-1 ml-3"  onchange="calcscoresgizi()">Tidak
														</td>
														<td rowspan="2">Ya, memiliki skor = 1</td>
													</tr>
													<tr></tr>
													<tr>
														<td colspan="2" class="bold center">TOTAL</td>
														<td><input type="number" name="sgizi_jumlah" id="sgizi_jumlah" class="custom-form clear-input center" placeholder="Jumlah" readonly></td>
														<td></td>
													</tr>
													<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
														<thead>
															<tr>
																<th class="center" widht="100%" colspan="4"><b>Daftar Penyakit atau Keadaan yang Beresiko Mengakibatkan Malnutrisi</b></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th class="center" width="25%"></th>
																<th class="center" width="25%"></th>
																<th class="center" width="25%"></th>
																<th class="center" width="25%"></th>
															</tr>
															<tr>
																<td>
																	<input type="checkbox" name="penyakit_diare" id="penyakit_diare" value="1" class="mr-1">Diare persisten (Lebih dari 2 Minggu) <br>
																	<input type="checkbox" name="penyakit_prematuris" id="penyakit_prematuris" value="1" class="mr-1">Prematuris <br>
																	<input type="checkbox" name="penyakit_jantung_bawaan" id="penyakit_jantung_bawaan" value="1" class="mr-1">Penyakit Jantung Bawaan <br>
																	<input type="checkbox" name="penyakit_kelainan_bawaan" id="penyakit_kelainan_bawaan" value="1" class="mr-1">Kelainan bawaan 1 atau lebih (Celah bibir & langit-langit, atresia ani, dll) <br>
																	<input type="checkbox" name="penyakit_wajah_aneh" id="penyakit_wajah_aneh" value="1" class="mr-1">Wajah dismorfik (aneh) <br>
																</td>															
																<td>
																	<input type="checkbox" name="penyakit_akut_berat" id="penyakit_akut_berat" value="1" class="mr-1">Penyakit Akut Berat <br>
																	<br> (-) Paru : Penumonia, Asma , dll
																	<br> (-) Hati : Hepatitis, dll 
																	<br>
																	<input type="checkbox" name="penyakit_ginjal_anak" id="penyakit_ginjal_anak" value="1" class="mr-1">Ginjal : GGA, GNA, dll <br>
																	<input type="checkbox" name="penyakit_hiv_anak" id="penyakit_hiv_anak" value="1" class="mr-1">Infeksi HIV <br>
																	<input type="checkbox" name="penyakit_kanker_anak" id="penyakit_kanker_anak" value="1" class="mr-1">Kanker <br>
																	<input type="checkbox" name="penyakit_hati_kronik_anak" id="penyakit_hati_kronik_anak" value="1" class="mr-1">Penyakit Hati Kronik <br>																
																</td>
																<td>
																	<input type="checkbox" name="penyakit_ginjal_kronik_anak" id="penyakit_ginjal_kronik_anak" value="1" class="mr-1">Penyakit ginjal kronik, penyakit paru kronik<br>
																	<input type="checkbox" name="penyakit_stoma_usus_halus" id="penyakit_stoma_usus_halus" value="1" class="mr-1">Terdapat stoma usus halus <br>
																	<input type="checkbox" name="penyakit_trauma_anak" id="penyakit_trauma_anak" value="1" class="mr-1">Trauma <br>
																	<input type="checkbox" name="penyakit_kontipasi_berulang_anak" id="penyakit_kontipasi_berulang_anak" value="1" class="mr-1">Kontipasi berulang <br>
																	<input type="checkbox" name="penyakit_gagal_tumbuh_anak" id="penyakit_gagal_tumbuh_anak" value="1" class="mr-1">Gagal Tumbuh (ukuranpendek&mungil) <br>
																</td>
																<td>
																	<input type="checkbox" name="penyakit_metabolik_anak" id="penyakit_metabolik_anak" value="1" class="mr-1">Penyakit metabolik<br>
																	<input type="checkbox" name="penyakit_retardasi_anak" id="penyakit_retardasi_anak" value="1" class="mr-1">Retardasi metabolik <br>
																	<input type="checkbox" name="penyakit_keterlambatan_kembang_anak" id="penyakit_keterlambatan_kembang_anak" value="1" class="mr-1">Keterlambatan Perkembangan <br>
																	<input type="checkbox" name="penyakit_luka_bakar_anak" id="penyakit_luka_bakar_anak" value="1" class="mr-1">Luka Bakar <br>
																	<input type="checkbox" name="penyakit_obesitas_anak" id="penyakit_obesitas_anak" value="1" class="mr-1">Rencana operasi mayor obesitas <br>
																</td>
															</tr>
															<tr>
																<th class="center" widht="100%" colspan="4"><b><i>Skor : 0-3 (berisiko rendah malnutrisi)
																	<br> 
																	Skor : 1-3 (berisiko sedang malnutrisi)
																	<br>
																	Jika Skor : 4-5, (beriso tinggi malnutrisi), lapor ke dokter pemeriksa dan disarankan untuk dirujuk ke Poliklinik Gizi
																</i></b></th>
															</tr>
														</tbody>
													</table>																									
												</tbody>
											</table>
										</div>

										<!-- Row Data Skrining Pasien Akhir Kedidupan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skrining-pasien-akhir-kehidupan-anak"><i class="fas fa-expand mr-1"></i>Expand</button>SKRINING PASIEN AKHIR KEHIDUPAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-skrining-pasien-akhir-kehidupan-anak">
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
														<td class="center"><input type="radio" name="spak_1_anak" id="spak_1_anak_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_1_anak" id="spak_1_anak_tidak" value="0" ></td>
													</tr>
													<tr>
														<td class="center">2.</td>
														<td>Pasien mengalami gagal nafas</td>
														<td class="center"><input type="radio" name="spak_2_anak" id="spak_2_anak_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_2_anak" id="spak_2_anak_tidak" value="0" ></td>
													</tr>
													<tr>
														<td class="center">3.</td>
														<td>Pasien mengalami sepsis</td>
														<td class="center"><input type="radio" name="spak_3_anak" id="spak_3_anak_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_3_anak" id="spak_3_anak_tidak" value="0" ></td>
													</tr>
													<tr>
														<td class="center">4.</td>
														<td>Pasien mengalami gagal organ multiple</td>
														<td class="center"><input type="radio" name="spak_4_anak" id="spak_4_anak_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_4_anak" id="spak_4_anak_tidak" value="0" ></td>
													</tr>
													<tr>
														<td class="center">5.</td>
														<td>Pasien dengan karsinoma stadium 4</td>
														<td class="center"><input type="radio" name="spak_5_anak" id="spak_5_anak_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_5_anak" id="spak_5_anak_tidak" value="0" ></td>
													</tr>
													<tr>
														<td colspan="4"><b><i>Bila mana pasien memenuhi setidaknya tiga dari kondisi tersebut, maka dilakukan pelayanan pasien akhir kehidupan</b></i></td>
													</tr>													
												</tbody>
											</table>								
										</div>

										<!-- Row Data Populasi Khusus (Isi Sesuai Kebutuhan Pasien) -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-populasi-khusus-anak"><i class="fas fa-expand mr-1"></i>Expand</button>POPULASI KHUSUS (ISI SESUAI KEBUTUHAN PASIEN)
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-populasi-khusus-anak">
											<table class="table table-sm table-striped" style="margin-top: -15px">												
												<tr>
													<td><b>A.</b></td>
													<td><b>Penyakit Menular</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>1. Pasien mengetahui penyakit saat ini</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_1_anak" id="pk_penyakit_menular_1_anak_ya" value="1" class="mr-1">Tahu
														<input type="radio" name="pk_penyakit_menular_1_anak" id="pk_penyakit_menular_1_anak_tidak" value="0" class="mr-1 ml-4" >Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>2. Sumber informasi tentang penyakit diperoleh dari</td>
													<td>
														<input type="checkbox" name="pk_pm_dokter_anak" id="pk_pm_dokter_anak" value="1" class="mr-1">Dokter
														<input type="checkbox" name="pk_pm_perawat_anak" id="pk_pm_perawat_anak" value="1" class="mr-1 ml-2">Perawat
														<input type="checkbox" name="pk_pm_keluarga_anak" id="pk_pm_keluarga_anak" value="1" class="mr-1 ml-2">Keluarga
														<input type="checkbox" name="pk_pm_lain_anak" id="pk_pm_lain_anak" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="pk_pm_lain_anak_input" id="pk_pm_lain_anak_input" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain-lain" disabled>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>3. Menerima informasi jangka waktu pengobatan</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_3_anak" id="pk_penyakit_menular_3_anak_ya" value="1" class="mr-1">Ya
														<input type="text" name="pk_penyakit_menular_3_anak_input" id="pk_penyakit_menular_3_anak_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="Minggu/Bulan/Tahun" disabled>
														<input type="radio" name="pk_penyakit_menular_3_anak" id="pk_penyakit_menular_3_anak_tidak" value="0" class="mr-1 ml-4" >Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>4. Melakukan pemeriksaan rutin</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_4_anak" id="pk_penyakit_menular_4_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_penyakit_menular_4_anak" id="pk_penyakit_menular_4_anak_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_menular_4_anak_input" id="pk_penyakit_menular_4_anak_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" disabled>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>5. Cara Penularan</td>
													<td>
														<input type="checkbox" name="pk_pm_airbone_anak" id="pk_pm_airbone_anak" value="1" class="mr-1">Airbone
														<input type="checkbox" name="pk_pm_droplet_anak" id="pk_pm_droplet_anak" value="1" class="mr-1 ml-2">Droplet
														<input type="checkbox" name="pk_pm_kontak_langsung_anak" id="pk_pm_kontak_langsung_anak" value="1" class="mr-1 ml-2">Kontak Langsung
														<input type="checkbox" name="pk_pm_cairan_tubuh_anak" id="pk_pm_cairan_tubuh_anak" value="1" class="mr-1 ml-2">Cairan Tubuh
													</td>
												</tr>
												<tr>
													<td></td>
													<td>6. Penyakit Penyerta</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_6_anak" id="pk_penyakit_menular_6_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_penyakit_menular_6_anak" id="pk_penyakit_menular_6_anak_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_menular_6_anak_input" id="pk_penyakit_menular_6_anak_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" disabled>
													</td> 
												</tr>
												<tr>
													<td><b>B.</b></td>
													<td><b>Penyakit Penurunan Daya Tahan Tubuh</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>1. Pasien mengetahui penyakit saat ini</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_1_anak" id="pk_penyakit_pdtt_1_anak_ya" value="1" class="mr-1">Tahu
														<input type="radio" name="pk_penyakit_pdtt_1_anak" id="pk_penyakit_pdtt_1_anak_tidak" value="0" class="mr-1 ml-4" >Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>2. Sumber informasi tentang penyakit diperoleh dari</td>
													<td>
														<input type="checkbox" name="pk_pdtt_dokter_anak" id="pk_pdtt_dokter_anak" value="1" class="mr-1">Dokter
														<input type="checkbox" name="pk_pdtt_perawat_anak" id="pk_pdtt_perawat_anak" value="1" class="mr-1 ml-2">Perawat
														<input type="checkbox" name="pk_pdtt_keluarga_anak" id="pk_pdtt_keluarga_anak" value="1" class="mr-1 ml-2">Keluarga
														<input type="checkbox" name="pk_pdtt_lain_anak" id="pk_pdtt_lain_anak" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="pk_pdtt_lain_anak_input" id="pk_pdtt_lain_anak_input" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain-lain" disabled>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>3. Menerima informasi jangka waktu pengobatan</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_3_anak" id="pk_penyakit_pdtt_3_anak_ya" value="1" class="mr-1">Ya
														<input type="text" name="pk_penyakit_pdtt_3_anak_input" id="pk_penyakit_pdtt_3_anak_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="Minggu/Bulan/Tahun" disabled>
														<input type="radio" name="pk_penyakit_pdtt_3_anak" id="pk_penyakit_pdtt_3_anak_tidak" value="0" class="mr-1 ml-4" >Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>4. Melakukan pemeriksaan rutin</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_4_anak" id="pk_penyakit_pdtt_4_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_penyakit_pdtt_4_anak" id="pk_penyakit_pdtt_4_anak_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_pdtt_4_anak_input" id="pk_penyakit_pdtt_4_anak_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" disabled>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>5. Penyakit Penyerta</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_5_anak" id="pk_penyakit_pdtt_5_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_penyakit_pdtt_5_anak" id="pk_penyakit_pdtt_5_anak_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_pdtt_5_anak_input" id="pk_penyakit_pdtt_5_anak_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" disabled>
													</td>
												</tr>
												<tr>
													<td><b>C.</b></td>
													<td><b>Kesehatan Jiwa</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>Pernah mengalami gangguan jiwa sebelumnya</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_1_anak" id="pk_kesehatan_jiwa_1_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_kesehatan_jiwa_1_anak" id="pk_kesehatan_jiwa_1_anak_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Riwayat pengobatan sebelumnya</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_2_anak" id="pk_kesehatan_jiwa_2_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_kesehatan_jiwa_2_anak" id="pk_kesehatan_jiwa_2_anak_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Adakah anggota keluarga yang mengalami gangguan jiwa serupa</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_3_anak" id="pk_kesehatan_jiwa_3_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_kesehatan_jiwa_3_anak" id="pk_kesehatan_jiwa_3_anak_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah pasien bisa merawat dirinya sendiri</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_4_anak" id="pk_kesehatan_jiwa_4_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_kesehatan_jiwa_4_anak" id="pk_kesehatan_jiwa_4_anak_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah pasien dapat berkomunikasi dengan baik</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_5_anak" id="pk_kesehatan_jiwa_5_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_kesehatan_jiwa_5_anak" id="pk_kesehatan_jiwa_5_anak_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah bicara pasien dapat dipahami oleh perawat / dokter</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_6_anak" id="pk_kesehatan_jiwa_6_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_kesehatan_jiwa_6_anak" id="pk_kesehatan_jiwa_6_anak_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Adakah resiko mencederai diri sendiri</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_7_anak" id="pk_kesehatan_jiwa_7_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_kesehatan_jiwa_7_anak" id="pk_kesehatan_jiwa_7_anak_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Adakah resiko mencederai orang lain</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_8_anak" id="pk_kesehatan_jiwa_8_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_kesehatan_jiwa_8_anak" id="pk_kesehatan_jiwa_8_anak_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah pasien dapat memahami instruksi dokter atau perawat dengan baik</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_9_anak" id="pk_kesehatan_jiwa_9_anak_tidak" value="0" class="mr-1" >Tidak
														<input type="radio" name="pk_kesehatan_jiwa_9_anak" id="pk_kesehatan_jiwa_9_anak_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td><b>D.</b></td>
													<td><b>Pasien Yang Mengalami Kekerasan / Penganiayaan</b></td>
													<td></td>
												</tr>

												<tr>
													<td></td>
													<td>Apakah anda mengalami kekerasan / penganiayaan</td>
													<td>
														<input type="radio" name="pk_pasien_kekerasan_1_anak" id="pk_pasien_kekerasan_1_anak_ya" value="1" class="mr-1">Ya
														<input type="radio" name="pk_pasien_kekerasan_1_anak" id="pk_pasien_kekerasan_1_anak_tidak" value="0" checked class="mr-1 ml-4">Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Jenis Kekerasan / Penganiayaan Yang dialami</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_2_anak" id="pk_pasien_kekerasan_2_anak" class="custom-form clear-input d-inline-block col-lg-8" placeholder="jelaskan"disabled>
														<!-- <input type="text" name="pk_pasien_kekerasan_2_kebidanan"id="pk-pasien-kekerasan-2-kebidanan"class="custom-form clear-input d-inline-block col-lg-8"placeholder="jelaskan" disabled> -->
													</td>
												</tr>

												<tr>
													<td></td>
													<td>Sudah berapa lama mengalami kekerasan / penganiayaan</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_3_anak" id="pk_pasien_kekerasan_3_anak" class="custom-form clear-input d-inline-block col-lg-8" placeholder="jelaskan"disabled>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Seberapa sering anda mengalami kekerasan / penganiayaan</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_4_anak" id="pk_pasien_kekerasan_4_anak" class="custom-form clear-input d-inline-block col-lg-8" placeholder="jelaskan"disabled>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Siapa yang melakukan kekerasan / penganiayaan</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_5_anak" id="pk_pasien_kekerasan_5_anak" class="custom-form clear-input d-inline-block col-lg-8" placeholder="jelaskan"disabled>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah korban memerlukan pendampingan</td>
													<td>
														<input type="radio" name="pk_pasien_kekerasan_6_anak" id="pk_pasien_kekerasan_6_anak_ya" value="1" class="mr-1">Ya
														<input type="radio" name="pk_pasien_kekerasan_6_anak" id="pk_pasien_kekerasan_6_anak_tidak" value="0"  class="mr-1 ml-4">Tidak
													</td>
												</tr>
												<tr>
													<td><b>E.</b></td>
													<td><b>Pasien Diduga Ketergantungan Obat dan Alkohol</b></td>
													<td>
														<input type="radio" name="pk_pasien_ketergantungan_obat_anak" id="pk_pasien_ketergantungan_obat_anak_ya" value="1" class="mr-1">Ya
														<input type="radio" name="pk_pasien_ketergantungan_obat_anak" id="pk_pasien_ketergantungan_obat_anak_tidak" value="0"  class="mr-1 ml-4">Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														Jika Ya, Sebutkan<input type="text" name="pk_pasien_ketergantungan_obat_input_anak" id="pk_pasien_ketergantungan_obat_input_anak" class="custom-form clear-input d-inline-block col-lg-6 ml-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														Lama Ketergantungan<input type="text" name="pk_pasien_lama_ketergantungan_obat_input_anak" id="pk_pasien_lama_ketergantungan_obat_input_anak" class="custom-form clear-input d-inline-block col-lg-6 ml-4 disabled" placeholder="Lama Ketergantungan">
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Skala Early Warning System (News) -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skala-early-warning-system-anak"><i class="fas fa-expand mr-1"></i>Expand</button>SKALA EARLY WARNING SYSTEM (EWS)
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-skala-early-warning-system-anak">
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
																</tr>
															</thead>
															<tbody>
																<!-- Desclaimer -->
																<!-- Nilai value setelah dash itu ada lah urut sesuai parameter nya... yang dipakai adalah nilai awal nya -->
																<tr>
																	<td class="center">1.</td>
																	<td>Suhu</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="suhu_anak_sew" id="skala_1_1" value="2_1" class="mr-1 skala sew_suhu_1_1">≤35</td>
																	<td class="center"><input type="radio" name="suhu_anak_sew" id="skala_1_2" value="1_2" class="mr-1 skala sew_suhu_1_2">≤35.1-36</td>
																	<td class="center"><input type="radio" name="suhu_anak_sew" id="skala_1_3" value="0_3" class="mr-1 skala sew_suhu_1_3">≤36.1-38</td>
																	<td class="center"><input type="radio" name="suhu_anak_sew" id="skala_1_4" value="1_4" class="mr-1 skala sew_suhu_1_4">≤38.1-38.5</td>
																	<td class="center"><input type="radio" name="suhu_anak_sew" id="skala_1_5" value="2_5" class="mr-1 skala sew_suhu_1_5">≥38.5</td>
																	<td class="center"></td>
																</tr>
																<tr>															
																	<th rowspan="5" class="center v-center">2</th>																											
																	<td>Pernafasan Usia 1-12 Bulan</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_2_1" value="3_1" class="mr-1 skala sew_pernafasan_2_1">≤20</td>
																	<td class="center">
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_2_2" value="1_2" class="mr-1 skala sew_pernafasan_2_2">20-29</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_2_3" value="0_3" class="mr-1 skala sew_pernafasan_2_3">30-40</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_2_4" value="1_4" class="mr-1 skala sew_pernafasan_2_4">41-50</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_2_5" value="2_5" class="mr-1 skala sew_pernafasan_2_5">51-60</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_2_6" value="3_6" class="mr-1 skala sew_pernafasan_2_6">≥60</td>
																</tr>
																<tr>																	
																	<td>Pernafasan Usia 13-36 Bulan</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_3_1" value="3_1" class="mr-1 skala sew_pernafasan_3_1">≤20</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_3_2" value="0_2" class="mr-1 skala sew_pernafasan_3_2">20-30</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_3_3" value="1_3" class="mr-1 skala sew_pernafasan_3_3">31-50</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_3_4" value="2_4" class="mr-1 skala sew_pernafasan_3_4">51-60</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_3_5" value="3_5" class="mr-1 skala sew_pernafasan_3_5">≥60</td>
																</tr>
																<tr>
																	<td>Pernafasan Usia 4-6 Tahun</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_4_1" value="3_1" class="mr-1 skala sew_pernafasan_4_1">≤20</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_4_2" value="0_2" class="mr-1 skala sew_pernafasan_4_2">20-30</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_4_3" value="1_3" class="mr-1 skala sew_pernafasan_4_3">31-50</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_4_4" value="2_4" class="mr-1 skala sew_pernafasan_4_4">51-60</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_4_5" value="3_5" class="mr-1 skala sew_pernafasan_4_5">≥60</td>
																</tr>
																<tr>
																	<td>Pernafasan Usia 7-12 Tahun</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_5_1" value="3_1" class="mr-1 skala sew_pernafasan_5_1">≤10</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_5_2" value="0_2" class="mr-1 skala sew_pernafasan_5_2">10-20</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_5_3" value="1_3" class="mr-1 skala sew_pernafasan_5_3">21-30</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_5_4" value="2_4" class="mr-1 skala sew_pernafasan_5_4">31-40</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_5_5" value="3_5" class="mr-1 skala sew_pernafasan_5_5">≥40</td>
																</tr>
																<tr>
																	<td>Pernafasan Usia 13-18 Tahun</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_6_1" value="3_1" class="mr-1 skala sew_pernafasan_6_1">≤10</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_6_2" value="0_2" class="mr-1 skala sew_pernafasa_6_2">10-20</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_6_3" value="1_3" class="mr-1 skala sew_pernafasan_6_3">21-30</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_6_4" value="2_4" class="mr-1 skala sew_pernafasan_6_4">31-40</td>
																	<td class="center"><input type="radio" name="pernafasan_anak_sew" id="skala_6_5" value="3_5" class="mr-1 skala sew_pernafasan_6_5">≥40</td>
																</tr>
																<tr>
																	<td class="center">3.</td>
																	<td>Kondisi Pernafasan</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="kondisi_pernafasan_anak_sew" id="skala_7_1" value="0_1" class="mr-1 skala sew_kondisi_pernafasan_7_1">Tidak retraksi</td>
																	<td class="center"><input type="radio" name="kondisi_pernafasan_anak_sew" id="skala_7_2" value="1_2" class="mr-1 skala sew_kondisi_pernafasan_7_2">Otot Bantu Nafas</td>
																	<td class="center"><input type="radio" name="kondisi_pernafasan_anak_sew" id="skala_7_3" value="2_3" class="mr-1 skala sew_kondisi_pernafasan_7_3">Retraksi</td>
																	<td class="center"><input type="radio" name="kondisi_pernafasan_anak_sew" id="skala_7_4" value="3_4" class="mr-1 skala sew_kondisi_pernafasan_7_4">Merintih</td>
																</tr>
																<tr>
																	<td class="center">4.</td>
																	<td>Alat Bantu O2</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="alat_bantu_anak_sew" id="skala_8_1" value="0_1" class="mr-1 skala sew_alat_bantu_8_1">No</td>
																	<td class="center"><input type="radio" name="alat_bantu_anak_sew" id="skala_8_2" value="1_2" class="mr-1 skala sew_alat_bantu_8_2">≥3L/menit</td>
																	<td class="center"><input type="radio" name="alat_bantu_anak_sew" id="skala_8_3" value="2_3" class="mr-1 skala sew_alat_bantu_8_3">≥6L/menit</td>
																	<td class="center"><input type="radio" name="alat_bantu_anak_sew" id="skala_8_4" value="3_4" class="mr-1 skala sew_alat_bantu_8_4">≥8L/menit</td>
																</tr>
																<tr>
																	<td class="center">5.</td>
																	<td>Saturasi O2</td>
																	<td class="center"><input type="radio" name="saturasi_anak_sew" id="skala_9_1" value="3_1" class="mr-1 skala sew_saturasi_9_1">≤85</td>
																	<td class="center"><input type="radio" name="saturasi_anak_sew" id="skala_9_2" value="2_2" class="mr-1 skala sew_saturasi_9_2">86-89</td>
																	<td class="center"><input type="radio" name="saturasi_anak_sew" id="skala_9_3" value="1_3" class="mr-1 skala sew_saturasi_9_3">90-93</td>
																	<td class="center"><input type="radio" name="saturasi_anak_sew" id="skala_9_4" value="0_4" class="mr-1 skala sew_saturasi_9_4">≥94</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																</tr>															
																<tr>
																	<th rowspan="5" class="center v-center">6</th>																											
																	<td>Nadi Usia 1-12 Bulan</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_10_1" value="3_1" class="mr-1 skala sew_nadi_10_1">≤90</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_10_2" value="2_2" class="mr-1 skala sew_nadi_10_2">90-99</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_10_3" value="1_3" class="mr-1 skala sew_nadi_10_3">100-109</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_10_4" value="0_4" class="mr-1 skala sew_nadi_10_4">110-160</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_10_5" value="1_5" class="mr-1 skala sew_nadi_10_5">161-170</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_10_6" value="2_6" class="mr-1 skala sew_nadi_10_6">171-190</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_10_7" value="3_7" class="mr-1 skala sew_nadi_10_7">≥190</td>
																</tr>
																<tr>
																	<td>Nadi Usia 13-36 Bulan</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_11_1" value="3_1" class="mr-1 skala sew_nadi_11_1">≤70</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_11_2" value="2_2" class="mr-1 skala sew_nadi_11_2">70-79</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_11_3" value="1_3" class="mr-1 skala sew_nadi_11_3">80-89</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_11_4" value="0_4" class="mr-1 skala sew_nadi_11_4">90-140</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_11_5" value="1_5" class="mr-1 skala sew_nadi_11_5">141-160</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_11_6" value="2_6" class="mr-1 skala sew_nadi_11_6">161-170</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_11_7" value="3_7" class="mr-1 skala sew_nadi_11_7">≥170</td>
																</tr>
																<tr>
																	<td>Nadi Usia 4-6 tahun</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_12_1" value="3_1" class="mr-1 skala sew_nadi_12_1">≤60</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_12_2" value="2_2" class="mr-1 skala sew_nadi_12_2">70-79</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_12_3" value="1_3" class="mr-1 skala sew_nadi_12_3">80-89</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_12_4" value="0_4" class="mr-1 skala sew_nadi_12_4">80-120</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_12_5" value="1_5" class="mr-1 skala sew_nadi_12_5">121-140</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_12_6" value="2_6" class="mr-1 skala sew_nadi_12_6">141-160</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_12_7" value="3_7" class="mr-1 skala sew_nadi_12_7">≥160</td>
																</tr>
																<tr>
																	<td>Nadi Usia 7-12 Tahun</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_13_1" value="3_1" class="mr-1 skala sew_nadi_13_1">≤60</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_13_2" value="2_2" class="mr-1 skala sew_nadi_13_2">60-69</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_13_3" value="1_3" class="mr-1 skala sew_nadi_13_3">70-79</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_13_4" value="0_4" class="mr-1 skala sew_nadi_13_4">55-100</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_13_5" value="1_5" class="mr-1 skala sew_nadi_13_5">101-120</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_13_6" value="2_6" class="mr-1 skala sew_nadi_13_6">121-140</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_13_7" value="3_7" class="mr-1 skala sew_nadi_13_7">≥140</td>
																</tr>
																<tr>
																	<td>Nadi Usia 13-18 Tahun</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_14_1" value="3_1" class="mr-1 skala sew_nadi_14_1">≤60</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_14_2" value="2_2" class="mr-1 skala sew_nadi_14_2">60-69</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_14_3" value="1_3" class="mr-1 skala sew_nadi_14_3">70-79</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_14_4" value="0_4" class="mr-1 skala sew_nadi_14_4">55-100</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_14_5" value="1_5" class="mr-1 skala sew_nadi_14_5">101-120</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_14_6" value="2_6" class="mr-1 skala sew_nadi_14_6">121-140</td>
																	<td class="center"><input type="radio" name="nadi_anak_sew" id="skala_14_7" value="3_7" class="mr-1 skala sew_nadi_14_7">≥140</td>
																</tr>
																<tr>
																	<td class="center">7.</td>
																	<td>Warna Kulit</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="warna_kulit_anak_sew" id="skala_15_1" value="0_1" class="mr-1 skala sew_warna_kulit_15_1">Tidak sianosis/CRT < 2 S</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="warna_kulit_anak_sew" id="skala_15_2" value="2_2" class="mr-1 skala sew_warna_kulit_15_2">Tampak sianotik/CRT > 2 S</td>
																	<td class="center"><input type="radio" name="warna_kulit_anak_sew" id="skala_15_3" value="3_3" class="mr-1 skala sew_warna_kulit_15_3">Sianotik dan motled / CRT ≥ 5 S</td>
																</tr>
																<tr>
																	<td class="center">8.</td>
																	<td>TDS</td>
																	<td class="center"><input type="radio" name="tds_anak_sew" id="skala_16_1" value="3_1" class="mr-1 skala sew_tds_16_1">≤80</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="tds_anak_sew" id="skala_16_2" value="1_1" class="mr-1 skala sew_tds_16_2">80-89</td>
																	<td class="center"><input type="radio" name="tds_anak_sew" id="skala_16_3" value="0_3" class="mr-1 skala sew_tds_16_3">90-119</td>
																	<td class="center"><input type="radio" name="tds_anak_sew" id="skala_16_4" value="1_4" class="mr-1 skala sew_tds_16_4">120-129</td>
																	<td class="center"><input type="radio" name="tds_anak_sew" id="skala_16_5" value="2_5" class="mr-1 skala sew_tds_16_5">130-139</td>
																	<td class="center"><input type="radio" name="tds_anak_sew" id="skala_16_6" value="3_6" class="mr-1 skala sew_tds_16_6">≥140</td>
																</tr>
																<tr>
																	<td class="center">9.</td>
																	<td>Kesadaran</td>
																	<td class="center"><input type="radio" name="kesadaran_anak_sew" id="skala_17_1" value="3_1" class="mr-1 skala sew_kesadaran_17_1">P/U</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="kesadaran_anak_sew" id="skala_17_2" value="1_2" class="mr-1 skala sew_kesadaran_17_2">V</td>
																	<td class="center"><input type="radio" name="kesadaran_anak_sew" id="skala_17_3" value="0_3" class="mr-1 skala sew_kesadaran_17_3">A</td>
																	<td class="center"><input type="radio" name="kesadaran_anak_sew" id="skala_17_4" value="1_4" class="mr-1 skala sew_kesadaran_17_4">V</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="kesadaran_anak_sew" id="skala_17_5" value="3_5" class="mr-1 skala sew_kesadaran_17_5">P/U</td>
																</tr>
																<tr><td colspan="10"></td></tr>
																<tr>
																	<td colspan="2"><b>TOTAL</b></td>
																	<td colspan="8">
																		<input type="radio" name="total_skala_sew_anak" id="total_skala_sew_anak_1" class="mr-1" value="Putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih (0)</b>
																		<input type="radio" name="total_skala_sew_anak" id="total_skala_sew_anak_2" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>
																		<input type="radio" name="total_skala_sew_anak" id="total_skala_sew_anak_3" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (5-6)</b>
																		<input type="radio" name="total_skala_sew_anak" id="total_skala_sew_anak_4" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah (≥7/1 Parameter Blue Kriteria)</b>
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

										<!-- DAta Penunjang-->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penunjang-pengkajian-anak"><i class="fas fa-expand mr-1"></i>Expand</button>DATA PENUNJANG
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse" id="data-penunjang-pengkajian-anak">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">																								
												<tr>
													<td class="bold">A. Pemeriksaan Laboratorium, tanggal :												
												
														<input type="text" name="tanggal_pemeriksaan_lab_anak" id="tanggal_pemeriksaan_lab_anak" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukan Tanggal Pemeriksaan">
														<span class="bold ml-2">Hasil : </span><input type="text" name="hasiil_pemeriksaan_labo_anak" id="hasiil_pemeriksaan_labo_anak" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukan Hasil Pemeriksaan">
													</td>
												</tr>
												<tr>
													<td class="bold">B. Pemeriksaan Radiologi, tanggal :												
												
														<input type="text" name="tanggal_pemeriksaan_rad_anak" id="tanggal_pemeriksaan_rad_anak" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukan Tanggal Pemeriksaan">
														<span class="bold ml-2">Hasil : </span><input type="text" name="hasil_pemeriksaan_rad_anak" id="hasil_pemeriksaan_rad_anak" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukan Hasil Pemeriksaan">
													</td>
												</tr>
												<tr>
													<td class="bold">C. Lain-lain :												
													<input type="text" name="penunjang_lain_anak" id="penunjang_lain_anak" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukan Pemeriksaan Lainnya">
												</tr>
											</table>
										</div>

										<!-- Row Data Masalah Keperawatan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-masalah-keperawatan-anak"><i class="fas fa-expand mr-1"></i>Expand</button>MASALAH KEPERAWATAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-masalah-keperawatan-anak">
											<table class="table table-sm table-striped" style="margin-top: -15px">
												<tr>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_1_anak" id="masalah_keperawatan_1_anak" class="mr-1" value="1">Bersihan Jalan Nafas Tidak Efektif</td>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_2_anak" id="masalah_keperawatan_2_anak" class="mr-1" value="1">Diare</td>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_3_anak" id="masalah_keperawatan_3_anak" class="mr-1" value="1">Ansietas</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_4_anak" id="masalah_keperawatan_4_anak" class="mr-1" value="1">Pola Nafas Tidak Efektif</td>
													<td><input type="checkbox" name="masalah_keperawatan_5_anak" id="masalah_keperawatan_5_anak" class="mr-1" value="1">Intoleransi Aktivitas</td>
													<td><input type="checkbox" name="masalah_keperawatan_6_anak" id="masalah_keperawatan_6_anak" class="mr-1" value="1">Berduka</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_7_anak" id="masalah_keperawatan_7_anak" class="mr-1" value="1">Gangguan Pertukaran Gas</td>
													<td><input type="checkbox" name="masalah_keperawatan_8_anak" id="masalah_keperawatan_8_anak" class="mr-1" value="1">Gangguan Mobilitas Fisik</td>
													<td><input type="checkbox" name="masalah_keperawatan_9_anak" id="masalah_keperawatan_9_anak" class="mr-1" value="1">Gangguan Interaksi Sosial</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_10_anak" id="masalah_keperawatan_10_anak" class="mr-1" value="1">Gangguan Ventilasi Spontan</td>
													<td><input type="checkbox" name="masalah_keperawatan_11_anak" id="masalah_keperawatan_11_anak" class="mr-1" value="1">Penurunan Kapasitas Adaptif Intrakranial</td>
													<td><input type="checkbox" name="masalah_keperawatan_12_anak" id="masalah_keperawatan_12_anak" class="mr-1" value="1">Risiko Cedera</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_13_anak" id="masalah_keperawatan_13_anak" class="mr-1" value="1">Penurunan Curah Jantung</td>
													<td><input type="checkbox" name="masalah_keperawatan_14_anak" id="masalah_keperawatan_14_anak" class="mr-1" value="1">Nyeri Akut</td>
													<td><input type="checkbox" name="masalah_keperawatan_15_anak" id="masalah_keperawatan_15_anak" class="mr-1" value="1">Risiko Aspirasi</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_16_anak" id="masalah_keperawatan_16_anak" class="mr-1" value="1">Perfusi Perifer Tidak Efektif</td>
													<td><input type="checkbox" name="masalah_keperawatan_17_anak" id="masalah_keperawatan_17_anak" class="mr-1" value="1">Nyeri Kronis</td>
													<td><input type="checkbox" name="masalah_keperawatan_18_anak" id="masalah_keperawatan_18_anak" class="mr-1" value="1">Risiko Perdarahan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_19_anak" id="masalah_keperawatan_19_anak" class="mr-1" value="1">Nausea</td>
													<td><input type="checkbox" name="masalah_keperawatan_20_anak" id="masalah_keperawatan_20_anak" class="mr-1" value="1">Nyeri Melahirkan</td>
													<td><input type="checkbox" name="masalah_keperawatan_21_anak" id="masalah_keperawatan_21_anak" class="mr-1" value="1">Risiko Syok</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_22_anak" id="masalah_keperawatan_22_anak" class="mr-1" value="1">Defisit Nutrisi</td>
													<td><input type="checkbox" name="masalah_keperawatan_23_anak" id="masalah_keperawatan_23_anak" class="mr-1" value="1">Defisit Perawatan Diri</td>
													<td><input type="checkbox" name="masalah_keperawatan_24_anak" id="masalah_keperawatan_24_anak" class="mr-1" value="1">Risiko Jatuh</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_25_anak" id="masalah_keperawatan_25_anak" class="mr-1" value="1">Hipervolemia</td>
													<td><input type="checkbox" name="masalah_keperawatan_26_anak" id="masalah_keperawatan_26_anak" class="mr-1" value="1">Hipertermia</td>
													<td><input type="checkbox" name="masalah_keperawatan_27_anak" id="masalah_keperawatan_27_anak" class="mr-1" value="1">Risiko Luka Tekan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_28_anak" id="masalah_keperawatan_28_anak" class="mr-1" value="1">Hipovolemia</td>
													<td><input type="checkbox" name="masalah_keperawatan_29_anak" id="masalah_keperawatan_29_anak" class="mr-1" value="1">Hipertermi</td>
													<td>
														<input type="checkbox" name="masalah_keperawatan_30_anak" id="masalah_keperawatan_30_anak" class="mr-1" value="1">Lain-lain
														<input type="text" name="masalah_keperawatan_lain_input_anak" id="masalah_keperawatan_lain_input_anak" class="custom-form clear-input d-inline-block col-lg-6 disabled" placeholder="Masukkan lain - lain" disabled>
													</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_31_anak" id="masalah_keperawatan_31_anak" class="mr-1" value="1">Iktekrik Neonatus</td>
													<td><input type="checkbox" name="masalah_keperawatan_32_anak" id="masalah_keperawatan_32_anak" class="mr-1" value="1">Ketegangan Peran Pemberi Asuhan</td>
													<td></td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_33_anak" id="masalah_keperawatan_33_anak" class="mr-1" value="1">Menyusui tidak efektif</td>
													<td><input type="checkbox" name="masalah_keperawatan_34_anak" id="masalah_keperawatan_34_anak" class="mr-1" value="1">Resiko Gangguan Integritas Kulit / Jaringan</td>
													<td></td>
												</tr>
											</table>
										</div>

										<!-- Row Data Perencanaan Pulang -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-perencanaan-pulang-anak"><i class="fas fa-expand mr-1"></i>Expand</button>PERENCANAAN PULANG / DISCHARGE PLANNING
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-perencanaan-pulang-anak">
											<table class="table table-sm table-striped" style="margin-top: -15px">
												<tr>
													<td width="50%"><b>Kriteria Discharge Planning :</b></td>
													<td width="50%"></td>
												</tr>
												<tr>
													<td>1. Umur > 65 Tahun</td>
													<td>
														<input type="radio" name="discharge_planning_1_anak" id="discharge_planning_1_anak_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_1_anak" id="discharge_planning_1_anak_tidak" class="mr-1 ml-2" value="0" >Tidak
													</td>
												</tr>
												<tr>
													<td>2. Keterbatasan Mobilitas</td>
													<td>
														<input type="radio" name="discharge_planning_2_anak" id="discharge_planning_2_anak_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_2_anak" id="discharge_planning_2_anak_tidak" class="mr-1 ml-2" value="0" >Tidak
													</td>
												</tr>
												<tr>
													<td>3. Perawatan / Pengobatan Lanjutan</td>
													<td>
														<input type="radio" name="discharge_planning_3_anak" id="discharge_planning_3_anak_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_3_anak" id="discharge_planning_3_anak_tidak" class="mr-1 ml-2" value="0" >Tidak
													</td>
												</tr>
												<tr>
													<td>4. Bantuan Untuk Melanjutkan Aktifitas Sehari-hari</td>
													<td>
														<input type="radio" name="discharge_planning_4_anak" id="discharge_planning_4_anak_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_4_anak" id="discharge_planning_4_anak_tidak" class="mr-1 ml-2" value="0" >Tidak
													</td>
												</tr>
												<tr>
													<td colspan="2">Bila salah satu jawaban "Ya" dari kriteria perencanaan pulang diatas, maka akan dilanjutkan dengan perencanaan pulang sebagai berikut :</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_1_anak" id="kriteria_discharge_1_anak" class="mr-1" value="1">Perawatan Diri (Mandi, BAB, BAK)</td>
													<td><input type="checkbox" name="kriteria_discharge_2_anak" id="kriteria_discharge_2_anak" class="mr-1" value="1">Bantuan Medis / Perawatan di rumah (Homecare)</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_3_anak" id="kriteria_discharge_3_anak" class="mr-1" value="1">Pemantauan Pemberian Obat</td>
													<td><input type="checkbox" name="kriteria_discharge_4_anak" id="kriteria_discharge_4_anak" class="mr-1" value="1">Latihan Fisik Lanjutan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_5_anak" id="kriteria_discharge_5_anak" class="mr-1" value="1">Pendampingan Tenaga Khusus Dirumah</td>
													<td><input type="checkbox" name="kriteria_discharge_6_anak" id="kriteria_discharge_6_anak" class="mr-1" value="1">Pemantauan Diet</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_7_anak" id="kriteria_discharge_7_anak" class="mr-1" value="1">Bantuan Untuk Melakukan Aktifitas Fisik</td>
													<td><input type="checkbox" name="kriteria_discharge_8_anak" id="kriteria_discharge_8_anak" class="mr-1" value="1">Perawatan Luka</td>
												</tr>
												<tr>
													<td>(Kursi Roda, Alat Bantu Jalan)</td>
													<td>
														<input type="checkbox" name="kriteria_discharge_9_anak" id="kriteria_discharge_9_anak" class="mr-1" value="1">Lain-lain
														<input type="text" name="kriteria_discharge_lain_input_anak" id="kriteria_discharge_lain_input_anak" class="custom-form clear-input d-inline-block col-lg-6 disabled" placeholder="Masukkan lain - lain" disabled>
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
													Tanggal & Jam <input type="text" name="tanggal_ttd_perawat_anak" id="tanggal_ttd_perawat_anak" class="custom-form clear-input d-inline-block col-lg-5 ml-2" value="<?= date('d/m/Y H:i') ?>">
													<!-- <input type="hidden" name="tanggal_ttd_perawat" id="tanggal_ttd_perawat_old"> -->
												</td>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_verifikasi_dokter_dpjp_anak" id="tanggal_verifikasi_dokter_dpjp_anak" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
													<!-- <input type="hidden" name="tanggal_verifikasi_dokter_dpjp" id="tanggal_verifikasi_dokter_dpjp_old"> -->
												</td>
											</tr>
											<tr>
												<td>Perawat <input type="text" name="perawat_anak" id="perawat_anak" class="select2c-input ml-2"></td>
												<td>Verifikasi DPJP <input type="text" name="verifikasi_dokter_dpjp_anak" id="verifikasi_dokter_dpjp_anak" class="select2c-input ml-2"></td>
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
													<input type="checkbox" name="ttd_perawat_anak" id="ttd_perawat_anak" value="1" class="custom-form col-lg-1 mx-auto">
													<?= digitalSignature('ttd_perawat_verified_anak') ?>
												</td>
												<td class="center">
													<input type="checkbox" name="ttd_verifikasi_dokter_dpjp_anak" id="ttd_verifikasi_dokter_dpjp_anak" value="1" class="custom-form col-lg-1 mx-auto">
													<?= digitalSignature('ttd_verifikasi_dokter_dpjp_verified_anak') ?>
												</td>
											</tr>
										</table>
									</div>
									
									<!-- Data Pengkajian Dokter-->
									<div class="form-data-pengkajian-dokter">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="20%" class="bold">Waktu Pengkajian</td>
												<td width="1%" class="bold">:</td>
												<td width="79%">
													<input type="text" name="waktu_kajian_medis_anak" id="waktu_kajian_medis_anak" class="custom-form clear-input col-lg-2" value="<?= date('d/m/Y H:i') ?>">
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
													<textarea name="keluhan_utama_medis_anak" id="keluhan_utama_medis_anak" rows="4" class="form-control clear-input" placeholder="Keluhan Utama"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Penyakit Sekarang</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rps_medis_anak" id="rps_medis_anak" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Sekarang"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Penyakit Terdahulu</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rpt_medis_anak" id="rpt_medis_anak" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Terdahulu"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Pengobatan</td>
												<td class="bold">:</td>
												<td>
													<textarea name="pengobatan_medis_anak" id="pengobatan_medis_anak" rows="4" class="form-control clear-input" placeholder="Pengobatan"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Alergi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="riwayat_alergi_anak" id="riwayat_alergi_anak" rows="4" class="form-control clear-input" placeholder="Riwayat Alergi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Penyakit Keluarga</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="rpk_medis_anak" id="rpk_medis_anak_tidak" value="0" class="mr-1" checked>Tidak
													<input type="radio" name="rpk_medis_anak" id="rpk_medis_anak_ya" value="1" class="mr-1 ml-2">Ya, 
													<input type="checkbox" name="rpk_medis_anak_asma" id="rpk_medis_anak_asma" value="1" class="mr-1 ml-4" disabled>Asma
													<input type="checkbox" name="rpk_medis_anak_dm" id="rpk_medis_anak_dm" value="1" class="mr-1 ml-2" disabled>DM
													<input type="checkbox" name="rpk_medis_anak_cardiovascular" id="rpk_medis_anak_cardiovascular" value="1" class="mr-1 ml-2" disabled>Cardiovascular
													<input type="checkbox" name="rpk_medis_anak_kanker" id="rpk_medis_anak_kanker" value="1" class="mr-1 ml-2" disabled>kanker
													<input type="checkbox" name="rpk_medis_anak_thalasemia" id="rpk_medis_anak_thalasemia" value="1" class="mr-1 ml-2" disabled>Thalasemia
													<input type="checkbox" name="rpk_medis_anak" id="rpk_medis_anak_lain" value="1" class="mr-1 ml-2" disabled>lain
													<input type="text" name="rpk_medis_anak_lain_input" id="rpk_medis_anak_lain_input" class="custom-form clear-input col-lg-4 d-inline-block mr-2" placeholder="Masukkan lain - lain">
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="3">Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan :</td>
											</tr>
											<tr>
												<td colspan="3"><i>(termasuk riwayat perkawinan, obstetri, imunisasi tumbuh kembang)</i></td>
											</tr>
											<tr>
												<td colspan="3"><div id="riwayat_field_anak"></div></td>
											</tr>
											<tr>
												<td class="bold td-dark" colspan="3">PEMERIKSAAN FISIK</td>
											</tr>
											<tr>
												<td class="bold">Kesadaran</td>
												<td class="bold">:</td>
												<td>
													<input type="checkbox" name="composmentis_medis_anak" id="composmentis_medis_anak" value="1" class="mr-1">Composmentis
													<input type="checkbox" name="apatis_medis_anak" id="apatis_medis_anak" value="1" class="mr-1 ml-2">Apatis
													<input type="checkbox" name="samnolen_medis_anak" id="samnolen_medis_anak" value="1" class="mr-1 ml-2">Samnolen
													<input type="checkbox" name="sopor_medis_anak" id="sopor_medis_anak" value="1" class="mr-1 ml-2">Sopor
													<input type="checkbox" name="koma_medis_anak" id="koma_medis_anak" value="1" class="mr-1 ml-2">Koma
												</td>
											</tr>
											<tr>
												<td class="bold">Kepala</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_kepala_anak" id="pf_kepala_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_kepala_anak" id="pf_kepala_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_kepala_anak" id="ket_pf_kepala_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Mata</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_mata_anak" id="pf_mata_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_mata_anak" id="pf_mata_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_mata_anak" id="ket_pf_mata_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Hidung</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_hidung_anak" id="pf_hidung_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_hidung_anak" id="pf_hidung_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_hidung_anak" id="ket_pf_hidung_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Gigi dan Mulut</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_gigi_mulut_anak" id="pf_gigi_mulut_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_gigi_mulut_anak" id="pf_gigi_mulut_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_gigi_mulut_anak" id="ket_pf_gigi_mulut_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Tenggorokan</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_tenggorokan_anak" id="pf_tenggorokan_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_tenggorokan_anak" id="pf_tenggorokan_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_tenggorokan_anak" id="ket_pf_tenggorokan_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Telinga</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_telinga_anak" id="pf_telinga_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_telinga_anak" id="pf_telinga_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_telinga_anak" id="ket_pf_telinga_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Leher</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_leher_anak" id="pf_leher_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_leher_anak" id="pf_leher_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_leher_anak" id="ket_pf_leher_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Thorax</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_thorax_anak" id="pf_thorax_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_thorax_anak" id="pf_thorax_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_thorax_anak" id="ket_pf_thorax_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Jantung</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_jantung_anak" id="pf_jantung_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_jantung_anak" id="pf_jantung_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_jantung_anak" id="ket_pf_jantung_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Paru</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_paru_anak" id="pf_paru_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_paru_anak" id="pf_paru_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_paru_anak" id="ket_pf_paru_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Abdomen</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_abdomen_anak" id="pf_abdomen_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_abdomen_anak" id="pf_abdomen_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_abdomen_anak" id="ket_pf_abdomen_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Genitalia dan Anus</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_genitalia_anak" id="pf_genitalia_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_genitalia_anak" id="pf_genitalia_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_genitalia_anak" id="ket_pf_genitalia_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Ekstermitas</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_ekstermitas_anak" id="pf_ekstermitas_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_ekstermitas_anak" id="pf_ekstermitas_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_ekstermitas_anak" id="ket_pf_ekstermitas_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Kulit</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_kulit_anak" id="pf_kulit_anak_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_kulit_anak" id="pf_kulit_anak_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_kulit_anak" id="ket_pf_kulit_anak" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="bold td-dark">HASIL PEMERIKSAAN PENUNJANG</td>
											</tr>
											<tr>
												<td class="bold">Laboratorium</td>
												<td class="bold">:</td>
												<td><div id="hasil_laboratorium_anak"></div></td>
											</tr>
											<tr>
												<td class="bold">Radiologi</td>
												<td class="bold">:</td>
												<td><div id="hasil_radiologi_anak"></div></td>
											</tr>
											<tr>
												<td class="bold">Penunjang Lain</td>
												<td class="bold">:</td>
												<td><div id="hasil_penunjang_lain_anak"></div></td>
											</tr>
											<tr>
												<td colspan="3" class="bold td-dark">DIAGNOSA AWAL</td>
											</tr>
											<tr>
												<td colspan="3"><div id="diagnosa_awal_medis_anak"></div></td>
											</tr>
											<tr>
												<td colspan="3" class="bold td-dark">TATA LAKSANA</td>
											</tr>
											<tr>
												<td class="bold">1. Rencana Edukasi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_edukasi_medis_anak" id="rencana_edukasi_medis_anak" rows="4" class="form-control clear-input" placeholder="Rencana Edukasi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">2. Rencana Pemeriksaan Penunjang</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_pemeriksaan_penunjang_anak" id="rencana_pemeriksaan_penunjang_anak" rows="4" class="form-control clear-input" placeholder="Rencana Pemeriksaan Penunjang"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">3. Rencana Terapi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_terapi_anak" id="rencana_terapi_anak" rows="4" class="form-control clear-input" placeholder="Rencana Terapi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">4. Rencana Konsultasi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_konsultasi_anak" id="rencana_konsultasi_anak" rows="4" class="form-control clear-input" placeholder="Rencana Konsultasi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">5. Rencana Pulang <i><small>Discharge Planning</small></i></td>
												<td class="bold">:</td>
												<td>													
													<b>Perkiraan Lama Rawat : </b><input type="text" name="perkiraan_lama_rawat_anak" id="perkiraan_lama_rawat_anak" class="custom-form col-lg-4 d-inline-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="checkbox" name="sbd_anak" id="sbd-anak" value="1" class="mr-1">
													<b class="ml-1">Sudah Bisa Ditetapkan : </b><input type="text" name="ditetapkan_berapa_hari_anak" id="ditetapkan_berapa_hari_anak" class="custom-form col-lg-2 d-inline-block">&nbsp;Hari
												</td>
											</tr>
											<tr>
												<td class="bold"></td>
												<td class="bold"></td>
												<td>
													<b>Belum Bisa Ditetapkan Karena : </b><input type="text" name="alasan_belum_ditetapkan_anak" id="alasan_belum_ditetapkan_anak" class="custom-form col-lg-4 d-inline-block">
													<b class="ml-5">Rencana Tanggal Pulang : </b><input type="text" name="tanggal_rencana_pulang_anak" id="tanggal_rencana_pulang_anak" class="custom-form col-lg-2 d-inline-block">
												</td>
											</tr>
										</table>
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="2" class="center td-dark"></td>
											</tr>
											<tr>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_ttd_dokter_dpjp_anak" id="tanggal_ttd_dokter_dpjp_anak" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
													<!-- <input type="hidden" name="tanggal_ttd_dokter_dpjp" id="tanggal_ttd_dokter_dpjp_old"> -->
												</td>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_ttd_dokter_pengkajian_anak" id="tanggal_ttd_dokter_pengkajian_anak" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
													<!-- <input type="hidden" name="tanggal_ttd_dokter_pengkajian" id="tanggal_ttd_dokter_pengkajian_old"> -->
												</td>
											</tr>
											<tr>
												<td>DPJP <input type="text" name="dokter_dpjp_anak" id="dokter_dpjp_anak" class="select2c-input ml-2"></td>
												<td>Dokter Pengkajian <input type="text" name="dokter_pengkajian_anak" id="dokter_pengkajian_anak" class="select2c-input ml-2"></td>
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
														<input type="checkbox" name="ttd_dokter_dpjp_anak" id="ttd_dokter_dpjp_anak" value="1" class="custom-form col-lg-1 mx-auto">
														<?= digitalSignature('ttd_dokter_dpjp_verified_anak') ?>
													</div>
												</td>
												<td>
													<div class="center">
														<input type="checkbox" name="ttd_dokter_pengkajian_anak" id="ttd_dokter_pengkajian_anak" value="1" class="custom-form col-lg-1 mx-auto">
														<?= digitalSignature('ttd_dokter_pengkajian_verified_anak') ?>
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
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpanPengkajianAwalAnak()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal Log History -->
<div class="modal fade" id="modal_history_logs_anak" tabindex="-1">
	<div class="modal-dialog" style="max-width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">History Logs Pengkajian Awal Pasien Anak</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<h6><b>Kajian Medis <i>(Dokter)</i></b></h6>
						<div class="table-responsive">
							<table class="table table-striped table-sm table-hover color-table info-table" id="table_kajian_medis_anak">
								<thead>
									<tr>
										<th class="nowrap">No.</th>
										<th class="nowrap">Tgl Ubah</th>
										<th class="nowrap">User</th>
										<th class="nowrap">Keluhan Utama</th>
										<th class="nowrap">Riwayat Penyakit Sekarang</th>
										<th class="nowrap">Riwayat Penyakit Terdahulu</th>
										<th class="nowrap">Pengobatan</th>
										<th class="nowrap">Riwayat Pasien</th>
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
