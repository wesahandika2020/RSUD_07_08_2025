<!-- // FLISUB -->
<script>
    $(function() {

		$('#ctk_btn_expand_all').click(function() {
            $('.multi-collapse').addClass('show');
        });


        $('#ctk_btn_collapse_all').click(function() {
            $('.multi-collapse').removeClass('show');
        }); 

		$('#btn_reset_fli').on('click', function() {
			resetFli();
		});
		
		// let currentDate = new Date();
		$('#fli_tanggal, #fli_tanggal_insiden').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
			// maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        });
		$('#fli_tanggal_pelapor, #fli_tanggal_penerima').datetimepicker({
            format: 'DD/MM/YYYY',
            pickSecond: false,
            pick12HourFormat: false,
			// maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        });

		// NAMA PERAWAT
		$('#fli_pelapor, #fli_penerima').select2c({
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
		
		// dokter
		// $('#ga_dokter').select2c({
		// 	ajax: {
		// 		url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
		// 		dataType: 'json',
		// 		quietMillis: 100,
		// 		allowClear: true,
		// 		data: function(term, page) { // page is the one-based page number tracked by Select2
		// 			return {
		// 				q: term, //search term
		// 				page: page, // page number
		// 				jenis: 22,
		// 			};
		// 		},
		// 		results: function(data, page) {
		// 			var more = (page * 20) < data.total; // whether or not there are more results available

		// 			// notice we return the value of more so Select2 knows if more results can be loaded
		// 			return {
		// 				results: data.data,
		// 				more: more
		// 			};
		// 		}
		// 	},
		// 	formatResult: function(data) {
		// 		var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
		// 		return markup;
		// 	},
		// 	formatSelection: function(data) {
		// 		return data.nama;
		// 	}
		// });		
		
		$('#fli_lapor').change(function() {
			if ($(this).val() === "5") {
				$('#fli_lapor_keterangan').prop('disabled', false);
			} else {
				$('#fli_lapor_keterangan').val('').prop('disabled', true);
			}
		});

		$('#fli_terjadi').change(function() {
			if ($(this).val() === "2") {
				$('#fli_terjadi_keterangan').prop('disabled', false);
			} else {
				$('#fli_terjadi_keterangan').val('').prop('disabled', true);
			}
		});

		$('#fli_menyangkut').change(function() {
			if ($(this).val() === "4") {
				$('#fli_menyangkut_keterangan').prop('disabled', false);
			} else {
				$('#fli_menyangkut_keterangan').val('').prop('disabled', true);
			}
		});

		$('#fli_tindakan_tim').click(function() {
            if ($(this).is(':checked')) {
                $('#fli_tindakan_tim_keterangan').prop('disabled', false)
            } else {
                $('#fli_tindakan_tim_keterangan').val('').prop('disabled', true)
            }
        });

		$('#fli_tindakan_petugas_lainnya').click(function() {
            if ($(this).is(':checked')) {
                $('#fli_tindakan_petugas_lainnya_keterangan').prop('disabled', false)
            } else {
                $('#fli_tindakan_petugas_lainnya_keterangan').val('').prop('disabled', true)
            }
        });

		$('#fli_kejadian_1').click(function() {
            if ($(this).is(':checked')) {
                $('#fli_keterangan_kejadian').prop('disabled', false)
            } else {
                $('#fli_keterangan_kejadian').val('').prop('disabled', true)
            }
        });

		$('#fli_kejadian_2').click(function() {
            if ($(this).is(':checked')) {
                $('#fli_keterangan_kejadian').val('').prop('disabled', true)
            } else {
                $('#fli_keterangan_kejadian').prop('disabled', false)
            }
        });

    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

	function resetFli() {
		let action		   = $('#action_fli').val();
		let id_pasien 	   = $('#id_pasien_fli').val();
		let id_pendaftaran = $('#fmmp_id_pendaftaran').val();
		let id_layanan_pendaftaran = $('#fmmp_id_layanan_pendaftaran').val();

        $('#form_fli')[0].reset();
		$('#action_fli').val(action);
		$('#fmmp_id_pasien').val(id_pasien).text(id_pasien);
		$('#fmmp_id_pendaftaran').val(id_pendaftaran);
		$('#fmmp_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
		$('#fli_petugas_a').val('');
		$('#s2id_fli_petugas_a a .select2c-chosen').empty();
		$('#fli_petugas_b').val('');
		$('#s2id_fli_petugas_b a .select2c-chosen').empty();

		// $('#dfli_id_a').val('');
        // $('#form_edit_fli_a')[0].reset();
		// $('#action_dfli_a').val(action);
		// $('#dfmmp_id_pasien_a').val(id_pasien).text(id_pasien);
		// $('#dfmmp_id_pendaftaran_a').val(id_pendaftaran);
		// $('#dfmmp_id_layanan_pendaftaran_a').val(id_layanan_pendaftaran);
		// $('#dfli_petugas_a').val('');
		// $('#s2id_dfli_petugas_a a .select2c-chosen').empty();
		
    }

    function tambahFORM_KEP_08_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFli();
        entriFli(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_KEP_08_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFli();
        entriFli(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_KEP_08_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFli();
        entriFli(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriFli(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn_simpan_fli').hide();
        $('#btn_cetak_fli').hide();
        $('#action_fli').val(action);

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
			$('#btn_simpan_fli').show();
		} else {
			$('#btn_simpan_fli').hide();
		}

        if (action !== 'tambah') {
			$('#btn_cetak_fli').show();
		} else {
			$('#btn_cetak_fli').hide();
		}

        $.ajax({
			type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				let pasien = data.pasien;
				let layanan = data.layanan;
				let tempatLayanan = (layanan.layanan !== null ? layanan.layanan : layanan.bangsal + layanan.bangsal_ic);
				
				// Set all values first
				resetFli();
				$('#action_fli').val(action);
                $('#id_layanan_pendaftaran_fli').val(id_layanan_pendaftaran);
                $('#id_pendaftaran_fli').val(id_pendaftaran);
                $('#fli_tempat_layanan').text(tempatLayanan);
                $('#fli_ruangan').val(tempatLayanan);
                if (pasien !== null) {
                    $('#id_pasien_fli, #fli_no_rm').val(pasien.id_pasien).text(pasien.id_pasien);
                    $('#fli_nama_pasien').text(pasien.nama);
                    $('#fli_nama').val(pasien.nama);
                    $('#fli_tanggal_lahir').text((pasien.tanggal_lahir !== null ? datefmysql(pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(pasien.tanggal_lahir) + ')'));
                    $('#fli_umur').val(hitungUmur(pasien.tanggal_lahir));
                    $('#fli_jenis_kelamin').text((pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#fli_alamat').text(pasien.alamat);
					if (pasien.kelamin === 'L') {
						$('#fli_jenis_kelamin_1').prop('checked', true);
					} else {
						$('#fli_jenis_kelamin_2').prop('checked', true);
					}
                    $('#fli_tanggal').val(datetimefmysql(layanan.tanggal_layanan));
                }

				list_data_fli(id_pendaftaran, id_layanan_pendaftaran, action);

				$('#modal_fli').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
    }

	function list_data_fli(id_pendaftaran, id_layanan_pendaftaran, action) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/get_fli/") ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				let f = data.fli;
				console.log(f);

				if (f !== null) {
					$('#id_fli').val(f.id);
					$('#fli_biaya').val(f.fli_biaya);
					$('#fli_tanggal_insiden').val(datetimefmysql(f.fli_tanggal_insiden));
					$('#fli_insiden').val(f.fli_insiden);
					$('#fli_kronologi').val(f.fli_kronologi).text(f.fli_kronologi);
					$('#fli_jenis_insiden').val(f.fli_jenis_insiden);

					// Atur nilai awal untuk fli_lapor
					$('#fli_lapor').val(f.fli_lapor);
					if ($('#fli_lapor').val() === "5") {
						$('#fli_lapor_keterangan').prop('disabled', false).val(f.fli_lapor_keterangan);
					}

					// Atur nilai awal untuk fli_terjadi
					$('#fli_terjadi').val(f.fli_terjadi);
					if ($('#fli_terjadi').val() === "2") {
						$('#fli_terjadi_keterangan').prop('disabled', false).val(f.fli_terjadi_keterangan);
					}

					// Atur nilai awal untuk fli_menyangkut
					$('#fli_menyangkut').val(f.fli_menyangkut);
					if ($('#fli_menyangkut').val() === "4") {
						$('#fli_menyangkut_keterangan').prop('disabled', false).val(f.fli_menyangkut_keterangan);
					}

					$('#fli_tempat').val(f.fli_tempat);
					if (f.fli_penyakit_dalam === '1') {$('#fli_penyakit_dalam').prop('checked', true).change()}
					if (f.fli_penyakit_anak === '1') {$('#fli_penyakit_anak').prop('checked', true).change()}
					if (f.fli_penyakit_bedah === '1') {$('#fli_penyakit_bedah').prop('checked', true).change()}
					if (f.fli_penyakit_obstetri === '1') {$('#fli_penyakit_obstetri').prop('checked', true).change()}
					if (f.fli_penyakit_tht === '1') {$('#fli_penyakit_tht').prop('checked', true).change()}
					if (f.fli_penyakit_mata === '1') {$('#fli_penyakit_mata').prop('checked', true).change()}
					if (f.fli_penyakit_syaraf === '1') {$('#fli_penyakit_syaraf').prop('checked', true).change()}
					if (f.fli_penyakit_anastesi === '1') {$('#fli_penyakit_anastesi').prop('checked', true).change()}
					if (f.fli_penyakit_kulit === '1') {$('#fli_penyakit_kulit').prop('checked', true).change()}
					if (f.fli_penyakit_jantung === '1') {$('#fli_penyakit_jantung').prop('checked', true).change()}
					if (f.fli_penyakit_paru === '1') {$('#fli_penyakit_paru').prop('checked', true).change()}
					if (f.fli_penyakit_jiwa === '1') {$('#fli_penyakit_jiwa').prop('checked', true).change()}
					$('#fli_penyakit_keterangan').val(f.fli_penyakit_keterangan);
					$('#fli_unit').val(f.fli_unit);
					$('#fli_akibat').val(f.fli_akibat);
					$('#fli_tindakan').val(f.fli_tindakan);

					// Atur nilai awal untuk fli_tindakan_tim
					if (f.fli_tindakan_tim === '1') {
						$('#fli_tindakan_tim').prop('checked', true).change();
						$('#fli_tindakan_tim_keterangan').prop('disabled', false).val(f.fli_tindakan_tim_keterangan);
					}

					if (f.fli_tindakan_dokter === '1') {$('#fli_tindakan_dokter').prop('checked', true).change()}
					if (f.fli_tindakan_perawat === '1') {$('#fli_tindakan_perawat').prop('checked', true).change()}

					// Atur nilai awal untuk fli_tindakan_petugas_lainnya
					if (f.fli_tindakan_petugas_lainnya === '1') {
						$('#fli_tindakan_petugas_lainnya').prop('checked', true).change();
						$('#fli_tindakan_petugas_lainnya_keterangan').prop('disabled', false).val(f.fli_tindakan_petugas_lainnya_keterangan);
					}

					if (f.fli_kejadian === '1') {
						$('#fli_kejadian_1').prop('checked', true);
						$('#fli_keterangan_kejadian').prop('disabled', false).val(f.fli_keterangan_kejadian);;
					} else {
						$('#fli_kejadian_2').prop('checked', true);
					}

					$('#fli_grading').val(f.fli_grading);

					// pelapor
					$('#fli_tanggal_pelapor').val(datefmysql(f.fli_tanggal_pelapor));
					$('#fli_pelapor').val(f.fli_pelapor);
					$('#s2id_fli_pelapor a .select2c-chosen').html(f.nama_nadis_pelapor);
					if (f.fli_ttd_pelapor === '1') {
						document.getElementById("fli_ttd_pelapor").checked = true;
					}

					// penerima
					$('#fli_tanggal_penerima').val(datefmysql(f.fli_tanggal_penerima));
					$('#fli_penerima').val(f.fli_penerima);
					$('#s2id_fli_penerima a .select2c-chosen').html(f.nama_nadis_penerima);
					if (f.fli_ttd_penerima === '1') {
						document.getElementById("fli_ttd_penerima").checked = true;
					}

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

	function konfirmasiSimpanFLi() {

		if ($('#fli_tanggal_insiden').val() === '') {
			syams_validation('#fli_tanggal_insiden', 'Tanggal harus diisi.');
			// $('#fli_tanggal_insiden').focus();
			return false;
		} else {
			syams_validation_remove('#fli_tanggal_insiden');
		}

		if ($('#fli_pelapor').val() === '') {
			syams_validation('#fli_pelapor', 'Pembuat Laporan harus diisi.');
			return false;
		} else {
			syams_validation_remove('#fli_pelapor');
		}

		if ($('#fli_penerima').val() === '') {
			syams_validation('#fli_penerima', 'Penerima Laporan harus diisi.');
			return false;
		} else {
			syams_validation_remove('#fli_penerima');
		}
		
		let text = '';
		let btnText = '';

		if ($('#id_fli').length > 0 && $('#id_fli').val() === '') {
			text = 'menyimpan';
			btnText = 'Simpan';
		} else {
			text = 'mengubah';
			btnText = 'Ubah';
		}

		if ($('#fli_tanggal_insiden').val() !== '') {
			Swal.fire({
				title: `${btnText} Form`,
				text: `Apakah anda yakin akan ${text} Formulir Manajer Pelayanan Pasien?`,
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: `<i class="fas fa-fw fa-save mr-1"></i>${btnText}`,
				cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {
					simpanEntriFli();
				}
			}) ;
		} else {
			Swal.fire({
				title: 'Tidak Ada Data!',
				text: 'Silakan tambahkan data sebelum menyimpan.',
				icon: 'warning',
				confirmButtonText: 'OK'
			});
		}
	}

    function simpanEntriFli() {

		var id_layanan_pendaftaran = $('#id_layanan_pendaftaran_fli').val();
        var id_pendaftaran = $('#id_pendaftaran_fli').val();
        var id_pasien = $('#id_pasien_fli').val();		

        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_fli") ?>',
            data: $('#form_fli').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal_fli').modal('hide');
					showListForm(id_pendaftaran, id_layanan_pendaftaran, id_pasien);
				} else {
					messageCustom(data.message, 'Error');
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

    function cekDateTime(id, form) {
        // ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan

        re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
        if (form != '') {

            if (regs = form.match(re)) {
                // nilai hari antara 1 s.d 31
                if (regs[1] < 1 || regs[1] > 31) {
                    alert("Nilai tidak valid untuk hari: " + regs[1]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai bulan antara 1 s.d 12
                if (regs[2] < 1 || regs[2] > 12) {
                    alert("Nilai tidak valid untuk bulan: " + regs[2]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai tahun antara 2000 s.d sekarang
                if (regs[3] < ((new Date()).getFullYear()) - 1 || regs[3] > ((new Date()).getFullYear()) + 1) {
                    alert("Nilai tidak valid untuk tahun: " + regs[3] + " - harus antara " + (((new Date()).getFullYear()) -
                        1) + " dan " + (((new Date()).getFullYear()) + 1));
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }

            } else {

                syams_validation(id, 'Format Tanggal tidak sesuai');
                return false;

            }
        }

    }

</script>