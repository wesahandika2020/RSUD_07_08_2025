<script>
    $(function() {

		$('#btn_reset_ga').on('click', function() {
			resetGa_formOnly();
		});
		
		// let currentDate = new Date();
		$('#ga_tgl_masuk, #ga_tgl_skrining, #ga_tgl_monev_1, #ga_tgl_monev_2, #ga_tgl_monev_3, #ga_tgl_monev_4').datetimepicker({
            format: 'DD/MM/YYYY',
            pickSecond: false,
            pick12HourFormat: false,
			// maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        });
		$('#ga_tgl_petugas').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
			// maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        });

        // Nadis Gizi
        $('#ga_petugas').select2c({
			ajax: {
				url: "<?= base_url('pelayanan/api/pelayanan/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: 22,
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
		
		// dokter
		$('#ga_dokter').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: 22,
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

    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function resetGa() {
        $('#form_gizi_anak')[0].reset();
    }

	function resetGa_formOnly() {
		let action		   = $('#action_ga').val();
		let id_pasien 	   = $('#ga_id_pasien').val();
		let id_pendaftaran = $('#ga_id_pendaftaran').val();
		let id_layanan_pendaftaran = $('#ga_id_layanan_pendaftaran').val();
        $('#form_gizi_anak')[0].reset();
		$('#action_ga').val(action);
		$('#ga_id_pasien').val(id_pasien).text(id_pasien);
		$('#ga_id_pendaftaran').val(id_pendaftaran);
		$('#ga_id_layanan_pendaftaran').val(id_layanan_pendaftaran);		
    }

    function tambahFORM_GZ_03_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetGa();
        entriGa(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_GZ_03_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetGa();
        entriGa(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_GZ_03_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetGa();
        entriGa(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriGa(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn_simpan_ga').hide();
        $('#btn_cetak_ga').hide();
        $('#action_ga').val(action);

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
			$('#btn_simpan_ga').show();
		} else {
			$('#btn_simpan_ga').hide();
		}

        if (action !== 'tambah') {
			$('#btn_cetak_ga').show();
		} else {
			$('#btn_cetak_ga').hide();
		}

        $.ajax({
			type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_data_layanan_pasien") ?>/id/' + id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				// Set all values first
				resetGa();
				$('#action_ga').val(action);
                $('#ga_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#ga_id_pendaftaran').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#ga_id_pasien, #ga_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#ga_nama_pasien, #ga_nama_pasien_2').text(data.pasien.nama);
                    $('#ga_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#ga_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#ga_alamat').text(data.pasien.alamat);
                }

				list_data_gizi_anak(id_pendaftaran, id_layanan_pendaftaran, bed);
                

				$('#modal_gizi_anak').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
    }

	function list_data_gizi_anak(id_pendaftaran, id_layanan_pendaftaran, bed){
		$.ajax({
			type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_list_data_gizi_anak") ?>/id/' + id_pendaftaran ,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#table-gizianak tbody').empty()
				if (data.ga.length !== 0) {
					var numberData = 1;

					$.each(data.ga, function(i, v) {
						let btnEditGiziAnak  = '';
						let btnHapusGiziAnak = '';
						let btnCetakGiziAnak = `<button type="button" class="btn btn-secondary btn-xs" onclick="cetakGiziAnakById(${v.id_ga}, '${bed}')"><i class="fas fa-print mr-1"></i>Print</button>`;

						if ($('#action_ga').val() !== 'lihat') {
							btnEditGiziAnak  = `<button type="button" class="btn btn-secondary btn-xs" onclick="editGiziAnak(${v.id_ga}, '${bed}')"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusGiziAnak = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusGiziAnak(${v.id_ga}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}
									
						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.ga_tgl_petugas}</td>
								<td class="left">${v.ga_diagnosa_medis}</td>
								<td class="left">${v.dokter}</td>
								<td class="left">${v.petugas}</td>
								<td class="center">${v.created_at}</td>
								<td class="left">${v.users}</td>
								<td class="right">
									${btnCetakGiziAnak}
									${btnEditGiziAnak}
									${btnHapusGiziAnak}
								</td>
							</tr>
						`;

						$('#table-gizianak tbody').append(html)
					})
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

	function editGiziAnak(id, bed) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/get_gizi_anak_byid") ?>/id/' + id ,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetGa_formOnly();
                let ga = data;
				if(ga != null){
					$('#ga_id').val(ga.id_ga);
					$('#ga_ruang').val(bed);
					$('#ga_ruang1').html(bed).val(bed);
					$('#ga_tgl_masuk').val(datefmysql(ga.ga_tgl_masuk));
					$('#ga_tgl_skrining').val(datefmysql(ga.ga_tgl_skrining));
					$('#ga_usia1').text((ga.tanggal_lahir_pasien !== null ? hitungUmur(ga.tanggal_lahir_pasien) : '-'));
					$('#ga_diagnosa_medis').val(ga.ga_diagnosa_medis);
					$('#ga_bb').val(ga.ga_bb);
					$('#ga_bbu').val(ga.ga_bbu);
					$('#ga_kesan').val(ga.ga_kesan);
					$('#ga_pb').val(ga.ga_pb);
					$('#ga_pbu').val(ga.ga_pbu);
					$('#ga_bbi').val(ga.ga_bbi);
					$('#ga_bbpb').val(ga.ga_bbpb);
					$('#ga_lla').val(ga.ga_lla);
					$('#ga_ha').val(ga.ga_ha);
					$('#ga_biokimia').val(ga.ga_biokimia);
					$('#ga_klinis').val(ga.ga_klinis);
					$('#ga_pola_makan').val(ga.ga_pola_makan);
					$('#ga_problem').val(ga.ga_problem);
					$('#ga_etiologi').val(ga.ga_etiologi);
					$('#ga_gejala').val(ga.ga_gejala);
					$('#ga_alergi_lainnya').val(ga.ga_alergi_lainnya);
					$('#ga_preskripsi').val(ga.ga_preskripsi);
					$('#ga_energi').val(ga.ga_energi);
					$('#ga_lemak').val(ga.ga_lemak);
					$('#ga_protein').val(ga.ga_protein);
					$('#ga_karbohidrat').val(ga.ga_karbohidrat);
					$('#ga_cairan').val(ga.ga_cairan);
					$('#ga_route').val(ga.ga_route);
					$('#ga_frekuensi').val(ga.ga_frekuensi);
					$('#ga_monitoring').val(ga.ga_monitoring);
					$('#ga_tgl_monev_1').val(datefmysql(ga.ga_tgl_monev_1));
					$('#ga_tgl_monev_2').val(datefmysql(ga.ga_tgl_monev_2));
					$('#ga_tgl_monev_3').val(datefmysql(ga.ga_tgl_monev_3));
					$('#ga_tgl_monev_4').val(datefmysql(ga.ga_tgl_monev_4));
					$('#ga_antropometri_1').val(ga.ga_antropometri_1);
					$('#ga_antropometri_2').val(ga.ga_antropometri_2);
					$('#ga_antropometri_3').val(ga.ga_antropometri_3);
					$('#ga_antropometri_4').val(ga.ga_antropometri_4);
					$('#ga_biokimia_1').val(ga.ga_biokimia_1);
					$('#ga_biokimia_2').val(ga.ga_biokimia_2);
					$('#ga_biokimia_3').val(ga.ga_biokimia_3);
					$('#ga_biokimia_4').val(ga.ga_biokimia_4);
					$('#ga_klinis_1').val(ga.ga_klinis_1);
					$('#ga_klinis_2').val(ga.ga_klinis_2);
					$('#ga_klinis_3').val(ga.ga_klinis_3);
					$('#ga_klinis_4').val(ga.ga_klinis_4);
					$('#ga_asupan_1').val(ga.ga_asupan_1);
					$('#ga_asupan_2').val(ga.ga_asupan_2);
					$('#ga_asupan_3').val(ga.ga_asupan_3);
					$('#ga_asupan_4').val(ga.ga_asupan_4);
					$('#ga_monitoring_lain').val(ga.ga_monitoring_lain);
					$('#ga_monitoring_lain_1').val(ga.ga_monitoring_lain_1);
					$('#ga_monitoring_lain_2').val(ga.ga_monitoring_lain_2);
					$('#ga_monitoring_lain_3').val(ga.ga_monitoring_lain_3);
					$('#ga_monitoring_lain_4').val(ga.ga_monitoring_lain_4);
					$('#ga_tgl_petugas').val(datetimefmysql(ga.ga_tgl_petugas));

					// value radio
					if (ga.ga_risiko === '1') {
						document.getElementById("ga_risiko_rendah").checked = true;
					}
					if (ga.ga_risiko === '2') {
						document.getElementById("ga_risiko_sedang").checked = true;
					}
					if (ga.ga_risiko === '3') {
						document.getElementById("ga_risiko_tinggi").checked = true;
					}

					if (ga.ga_telur === '1') {
						document.getElementById("ga_telur_ya").checked = true;
					}
					if (ga.ga_telur === '2') {
						document.getElementById("ga_telur_tidak").checked = true;
					}

					if (ga.ga_udang === '1') {
						document.getElementById("ga_udang_ya").checked = true;
					}
					if (ga.ga_udang === '2') {
						document.getElementById("ga_udang_tidak").checked = true;
					}

					if (ga.ga_sapi === '1') {
						document.getElementById("ga_sapi_ya").checked = true;
					}
					if (ga.ga_sapi === '2') {
						document.getElementById("ga_sapi_tidak").checked = true;
					}

					if (ga.ga_ikan === '1') {
						document.getElementById("ga_ikan_ya").checked = true;
					}
					if (ga.ga_ikan === '2') {
						document.getElementById("ga_ikan_tidak").checked = true;
					}

					if (ga.ga_kedelai === '1') {
						document.getElementById("ga_kedelai_ya").checked = true;
					}
					if (ga.ga_kedelai === '2') {
						document.getElementById("ga_kedelai_tidak").checked = true;
					}

					if (ga.ga_almond === '1') {
						document.getElementById("ga_almond_ya").checked = true;
					}
					if (ga.ga_almond === '2') {
						document.getElementById("ga_almond_tidak").checked = true;
					}

					if (ga.ga_gandum === '1') {
						document.getElementById("ga_gandum_ya").checked = true;
					}
					if (ga.ga_gandum === '2') {
						document.getElementById("ga_gandum_tidak").checked = true;
					}

					if (ga.ga_tindak === '1') {
						document.getElementById("ga_tindak_perlu").checked = true;
					}
					if (ga.ga_tindak === '2') {
						document.getElementById("ga_tindak_tidak").checked = true;
					}

					if (ga.ga_makanan === '1') {
						document.getElementById("ga_makanan_cair").checked = true;
					}
					if (ga.ga_makanan === '2') {
						document.getElementById("ga_makanan_lunak").checked = true;
					}
					if (ga.ga_makanan === '3') {
						document.getElementById("ga_makanan_saring").checked = true;
					}
					if (ga.ga_makanan === '4') {
						document.getElementById("ga_makanan_biasa").checked = true;
					}

					if (ga.ga_cara_makan === '1') {
						document.getElementById("ga_cara_makan_oral").checked = true;
					}
					if (ga.ga_cara_makan === '2') {
						document.getElementById("ga_cara_makan_ngt").checked = true;
					}

					// petugas
					$('#ga_petugas').val(ga.ga_petugas);
					$('#s2id_ga_petugas a .select2c-chosen').html(ga.petugas);
					ga.ga_ttd == '1' ? $('#ga_ttd').prop('checked', true) : $('#ga_ttd').prop('checked', false);
					// dokter
					$('#ga_dokter').val(ga.ga_dokter);
					$('#s2id_ga_dokter a .select2c-chosen').html(ga.dokter);
					ga.ga_ttd_dokter == '1' ? $('#ga_ttd_dokter').prop('checked', true) : $('#ga_ttd_dokter').prop('checked', false);
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

    function konfirmasiSimpanEntriGa() {

		if ($('#ga_tgl_masuk').val() === '') {
			syams_validation('#ga_tgl_masuk', 'Tanggal Masuk harus diisi.');
			return false;
		} else {
			syams_validation_remove('#ga_tgl_masuk');
		}
		if ($('#ga_tgl_skrining').val() === '') {
			syams_validation('#ga_tgl_skrining', 'Tanggal Skrining harus diisi.');
			return false;
		} else {
			syams_validation_remove('#ga_tgl_skrining');
		}
		if ($('#ga_tgl_petugas').val() === '') {
			syams_validation('#ga_tgl_petugas', 'Tanggal dan jam harus diisi.');
			return false;
		} else {
			syams_validation_remove('#ga_tgl_petugas');
		}
		if ($('#ga_petugas').val() === '') {
			syams_validation('#ga_petugas', 'Dietisien / Nutrisionist harus diisi.');
			// $('#ga_petugas').focus();
			return false;
		} else {
			syams_validation_remove('#ga_petugas');
		}

		var text = '';
		var btnText = '';
		if ($('#ga_id').val() === '') {
			text 	= 'menyimpan';
			btnText = 'Simpan';
		} else {
			text 	= 'mengubah' ;
			btnText = 'Ubah' ;
		}

        if ($('#ga_tgl_petugas').val() !== '' && $('#ga_petugas').val() !== '') {
            swal.fire({
                title: 'Simpan Entri Keperawatan',
                text: "Apakah anda yakin akan "+text+" Formulir Asuhan Gizi Anak?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>'+btnText,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanEntriGa();
                }
            })
        }
    }

    function simpanEntriGa() {		

		var id_layanan_pendaftaran = $('#ga_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#ga_id_pendaftaran').val();
        var id_pasien = $('#ga_id_pasien').val();		

        $.ajax({
            type: 'POST',
            url: '<?= base_url("gizi/api/gizi/simpan_gizi_anak") ?>',
            data: $('#form_gizi_anak').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal_gizi_anak').modal('hide');
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

	function cetakGiziAnak() {		
		let ga_id = $('#ga_id').val();
        let id_pendaftaran = $('#ga_id_pendaftaran').val();
        let id_layanan_pendaftaran = $('#ga_id_layanan_pendaftaran').val();
        let bed = $('#ga_ruang1').val();
		var dWidth = $(window).width();
		var dHeight = $(window).height();
		var x = screen.width / 2 - dWidth / 2;
		var y = screen.height / 2 - dHeight / 2;
		console.log(bed);
		window.open('<?= base_url('gizi/cetak_diet_anak/') ?>' + ga_id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran + '/' + bed, 'Cetak Diet Anak', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);		
	}

	function cetakGiziAnakById(id, bed) {		
        let id_pendaftaran = $('#ga_id_pendaftaran').val();
        let id_layanan_pendaftaran = $('#ga_id_layanan_pendaftaran').val();
		var dWidth = $(window).width();
		var dHeight = $(window).height();
		var x = screen.width / 2 - dWidth / 2;
		var y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('gizi/cetak_diet_anak/') ?>' + id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran + '/' + bed, 'Cetak Diet Anak', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);		
	}

	function hapusGiziAnak(id, id_pendaftaran, id_layanan_pendaftaran, bed) {
		bootbox.dialog({
			message: "Anda yakin akan manghapus data ini?",
			title: "Hapus Formulir Asuhan Gizi Anak",
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {
					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-trash"></i> Hapus',
					className: "btn-danger",
					callback: function(result) {
						if (result) {
							$.ajax({
								type: 'POST',
								url: '<?= base_url("gizi/api/gizi/hapus_gizi_anak") ?>',
								data: {
									id: id
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										list_data_gizi_anak(id_pendaftaran, id_layanan_pendaftaran, bed);
									} else {
										messageCustom(data.message, 'Error');
									}
								},
								complete: function(data) {
									hideLoader();
								},
								error: function(e) {
									messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
								}
							});
						}
					}
				}
			}
		});
	}

</script>