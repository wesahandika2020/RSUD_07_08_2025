<script>
    $(function() {

		$('#btn_reset_gd').on('click', function() {
			resetGd_formOnly();
		});

        let currentDate = new Date();
        $('#gd_tgl_petugas').datetimepicker({
            format: 'DD/MM/YYYY HH:MM',
            pickSecond: false,
            pick12HourFormat: false,
            // maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        // Nadis Gizi
        $('#gd_petugas').select2c({
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

        $('#gd_dokter').select2c({
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

    function resetGd() {
        $('#form_gizi_dietetik')[0].reset();
    }

	function resetGd_formOnly() {
		let action		   = $('#action_gd').val();
		let id_pasien 	   = $('#gd_id_pasien').val();
		let id_pendaftaran = $('#gd_id_pendaftaran').val();
		let id_layanan_pendaftaran = $('#gd_id_layanan_pendaftaran').val();
        $('#form_gizi_dietetik')[0].reset();
		$('#action_gd').val(action);
		$('#gd_id_pasien, #gd_no_rm').val(id_pasien).text(id_pasien);
		$('#gd_id_pendaftaran').val(id_pendaftaran);
		$('#gd_id_layanan_pendaftaran').val(id_layanan_pendaftaran);		
    }

    function tambahFORM_GZ_02_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetGd();
        entriGd(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_GZ_02_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetGd();
        entriGd(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_GZ_02_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        resetGd();
        entriGd(layanan.id_pendaftaran, layanan.id, bed, action);

    }

	function entriGd(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

		$('#btn_simpan_gd').hide();
		$('#action_gd').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan_gd').show();
		} else {
			$('#btn_simpan_gd').hide();
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
				resetGd();
				$('#action_gd').val(action);
				$('#gd_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
				$('#gd_id_pendaftaran').val(id_pendaftaran);
				if (data.pasien !== null) {
					$('#gd_id_pasien, #gd_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
					$('#gd_nama_pasien, #gd_nama_pasien_2').text(data.pasien.nama);
					$('#gd_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
					$('#gd_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
					$('#gd_alamat').text(data.pasien.alamat);
				}

				list_data_gizi_dietetik(id_pendaftaran, id_layanan_pendaftaran);
				$('#modal_gizi_dietetik').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

		}

    function list_data_gizi_dietetik(id_pendaftaran, id_layanan_pendaftaran) {
        $.ajax({
			type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_list_data_gizi_dietetik") ?>/id/' + id_pendaftaran ,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#table-dietetik tbody').empty()
				if (data.gd.length !== 0) {
					var numberData = 1;

					$.each(data.gd, function(i, v) {
						let btnEditGiziDietetik  = '';
						let btnHapusGiziDietetik = '';
						let btnCetakGiziDietetik = `<button type="button" class="btn btn-secondary btn-xs" onclick="cetakGiziDietetik(${v.id_gd})"><i class="fas fa-print mr-1"></i>Print</button>`;

						if ($('#action_gd').val() !== 'lihat') {
							btnEditGiziDietetik  = `<button type="button" class="btn btn-secondary btn-xs" onclick="editGiziDietetik(${v.id_gd})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusGiziDietetik = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusGiziDietetik(${v.id_gd}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}
									
						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.gd_tgl_petugas}</td>
								<td class="left">${v.gd_medis}</td>
								<td class="left">${v.dokter}</td>
								<td class="left">${v.petugas}</td>
								<td class="center">${v.created_at}</td>
								<td class="left">${v.users}</td>
								<td class="right">
									${btnCetakGiziDietetik}
									${btnEditGiziDietetik}
									${btnHapusGiziDietetik}
								</td>
							</tr>
						`;

						$('#table-dietetik tbody').append(html)
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

	function editGiziDietetik(id) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/get_gizi_dietetik_byid") ?>/id/' + id ,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetGd_formOnly();
				let gd = data;
				if(gd != null){
					$('#gd_id').val(gd.id_gd);
					$('#gd_medis').val(gd.gd_medis);
					$('#gd_alergi_lainnya').val(gd.gd_alergi_lainnya);
					$('#gd_bb').val(gd.gd_bb);
					$('#gd_lila').val(gd.gd_lila);
					$('#gd_tb').val(gd.gd_tb);
					$('#gd_tilut').val(gd.gd_tilut);
					$('#gd_imt').val(gd.gd_imt);
					$('#gd_status_gizi').val(gd.gd_status_gizi);
					$('#gd_penyakit_lainnya').val(gd.gd_penyakit_lainnya);
					$('#gd_preskripsi').val(gd.gd_preskripsi);
					$('#gd_energi').val(gd.gd_energi);
					$('#gd_lemak').val(gd.gd_lemak);
					$('#gd_protein').val(gd.gd_protein);
					$('#gd_karbohidrat').val(gd.gd_karbohidrat);
					$('#gd_cairan').val(gd.gd_cairan);
					$('#gd_route').val(gd.gd_route);
					$('#gd_frekuensi').val(gd.gd_frekuensi);
					$('#gd_laboratorium').val(gd.gd_laboratorium);
					$('#gd_klinis').val(gd.gd_klinis);
					$('#gd_problem').val(gd.gd_problem);
					$('#gd_etiologi').val(gd.gd_etiologi);
					$('#gd_gejala').val(gd.gd_gejala);
					$('#gd_monitoring').val(gd.gd_monitoring);

					// value radio
					if (gd.gd_risiko === '1') {
						document.getElementById("gd_risiko_ringan").checked = true;
					}
					if (gd.gd_risiko === '2') {
						document.getElementById("gd_risiko_sedang").checked = true;
					}
					if (gd.gd_risiko === '3') {
						document.getElementById("gd_risiko_tinggi").checked = true;
					}
					
					if (gd.gd_kondisi === '1') {
						document.getElementById("gd_kondisi_ya").checked = true;
					}
					if (gd.gd_kondisi === '2') {
						document.getElementById("gd_kondisi_tidak").checked = true;
					}
					
					if (gd.gd_alergi === '1') {
						document.getElementById("gd_alergi_telur").checked = true;
					}
					if (gd.gd_alergi === '2') {
						document.getElementById("gd_alergi_sapi").checked = true;
					}
					if (gd.gd_alergi === '3') {
						document.getElementById("gd_alergi_kacang").checked = true;
					}
					if (gd.gd_alergi === '4') {
						document.getElementById("gd_alergi_gandum").checked = true;
					}
					if (gd.gd_alergi === '5') {
						document.getElementById("gd_alergi_udang").checked = true;
					}
					if (gd.gd_alergi === '6') {
						document.getElementById("gd_alergi_ikan").checked = true;
					}
					if (gd.gd_alergi === '7') {
						document.getElementById("gd_alergi_almond").checked = true;
					}

					if (gd.gd_makanan === '1') {
						document.getElementById("gd_makanan_biasa").checked = true;
					}
					if (gd.gd_makanan === '2') {
						document.getElementById("gd_makanan_diet").checked = true;
					}

					if (gd.gd_asuhan === '1') {
						document.getElementById("gd_asuhan_perlu").checked = true;
					}
					if (gd.gd_asuhan !== null || gd.gd_asuhan === '2') {
						document.getElementById("gd_asuhan_tidak").checked = true;
					}

					if (gd.gd_kesulitan === '1') {
						document.getElementById("gd_kesulitan_ya").checked = true;
					}
					if (gd.gd_kesulitan === '2') {
						document.getElementById("gd_kesulitan_tidak").checked = true;
					}

					if (gd.gd_setengah === '1') {
						document.getElementById("gd_setengah_ya").checked = true;
					}
					if (gd.gd_setengah === '2') {
						document.getElementById("gd_setengah_tidak").checked = true;
					}

					if (gd.gd_tigaperempat === '1') {
						document.getElementById("gd_tigaperempat_ya").checked = true;
					}
					if (gd.gd_tigaperempat === '2') {
						document.getElementById("gd_tigaperempat_tidak").checked = true;
					}

					if (gd.gd_penurunan === '1') {
						document.getElementById("gd_penurunan_ya").checked = true;
					}
					if (gd.gd_penurunan === '2') {
						document.getElementById("gd_penurunan_tidak").checked = true;
					}

					if (gd.gd_perubahan === '1') {
						document.getElementById("gd_perubahan_ya").checked = true;
					}
					if (gd.gd_perubahan === '2') {
						document.getElementById("gd_perubahan_tidak").checked = true;
					}

					if (gd.gd_mual === '1') {
						document.getElementById("gd_mual_ya").checked = true;
					}
					if (gd.gd_mual === '2') {
						document.getElementById("gd_mual_tidak").checked = true;
					}

					if (gd.gd_muntah === '1') {
						document.getElementById("gd_muntah_ya").checked = true;
					}
					if (gd.gd_muntah === '2') {
						document.getElementById("gd_muntah_tidak").checked = true;
					}

					if (gd.gd_gangguan === '1') {
						document.getElementById("gd_gangguan_ya").checked = true;
					}
					if (gd.gd_gangguan === '2') {
						document.getElementById("gd_gangguan_tidak").checked = true;
					}

					if (gd.gd_perlu === '1') {
						document.getElementById("gd_perlu_ya").checked = true;
					}
					if (gd.gd_perlu === '2') {
						document.getElementById("gd_perlu_tidak").checked = true;
					}

					if (gd.gd_sering === '1') {
						document.getElementById("gd_sering_ya").checked = true;
					}
					if (gd.gd_sering === '2') {
						document.getElementById("gd_sering_tidak").checked = true;
					}

					if (gd.gd_masalah === '1') {
						document.getElementById("gd_masalah_ya").checked = true;
					}
					if (gd.gd_masalah === '2') {
						document.getElementById("gd_masalah_tidak").checked = true;
					}

					if (gd.gd_diare === '1') {
						document.getElementById("gd_diare_ya").checked = true;
					}
					if (gd.gd_diare === '2') {
						document.getElementById("gd_diare_tidak").checked = true;
					}

					if (gd.gd_konstipati === '1') {
						document.getElementById("gd_konstipati_ya").checked = true;
					}
					if (gd.gd_konstipati === '2') {
						document.getElementById("gd_konstipati_tidak").checked = true;
					}

					if (gd.gd_pendarahan === '1') {
						document.getElementById("gd_pendarahan_ya").checked = true;
					}
					if (gd.gd_pendarahan === '2') {
						document.getElementById("gd_pendarahan_tidak").checked = true;
					}

					if (gd.gd_bersendawa === '1') {
						document.getElementById("gd_bersendawa_ya").checked = true;
					}
					if (gd.gd_bersendawa === '2') {
						document.getElementById("gd_bersendawa_tidak").checked = true;
					}

					if (gd.gd_intoleransi === '1') {
						document.getElementById("gd_intoleransi_ya").checked = true;
					}
					if (gd.gd_intoleransi === '2') {
						document.getElementById("gd_intoleransi_tidak").checked = true;
					}

					if (gd.gd_diet === '1') {
						document.getElementById("gd_diet_ya").checked = true;
					}
					if (gd.gd_diet === '2') {
						document.getElementById("gd_diet_tidak").checked = true;
					}

					if (gd.gd_ngt === '1') {
						document.getElementById("gd_ngt_ya").checked = true;
					}
					if (gd.gd_ngt === '2') {
						document.getElementById("gd_ngt_tidak").checked = true;
					}

					if (gd.gd_lemah === '1') {
						document.getElementById("gd_lemah_ya").checked = true;
					}
					if (gd.gd_lemah === '2') {
						document.getElementById("gd_lemah_tidak").checked = true;
					}

					if (gd.gd_dirawat === '1') {
						document.getElementById("gd_dirawat_ya").checked = true;
					}
					if (gd.gd_dirawat === '2') {
						document.getElementById("gd_dirawat_tidak").checked = true;
					}
					
					if (gd.gd_tigakg === '1') {
						document.getElementById("gd_tigakg_ya").checked = true;
					}
					if (gd.gd_tigakg === '2') {
						document.getElementById("gd_tigakg_tidak").checked = true;
					}
					
					if (gd.gd_enamkg === '1') {
						document.getElementById("gd_enamkg_ya").checked = true;
					}
					if (gd.gd_enamkg === '2') {
						document.getElementById("gd_enamkg_tidak").checked = true;
					}
					
					if (gd.gd_penyakit === '1') {
						document.getElementById("gd_penyakit_keganasan").checked = true;
					}
					if (gd.gd_penyakit === '2') {
						document.getElementById("gd_penyakit_kronis").checked = true;
					}
					if (gd.gd_penyakit === '3') {
						document.getElementById("gd_penyakit_bakar").checked = true;
					}
					if (gd.gd_penyakit === '4') {
						document.getElementById("gd_penyakit_kepala").checked = true;
					}
					if (gd.gd_penyakit === '5') {
						document.getElementById("gd_penyakit_ginjal").checked = true;
					}
					
					if (gd.gd_jenis_makanan === '1') {
						document.getElementById("gd_makanan_cair").checked = true;
					}
					if (gd.gd_jenis_makanan === '2') {
						document.getElementById("gd_makanan_lunak").checked = true;
					}
					if (gd.gd_jenis_makanan === '3') {
						document.getElementById("gd_jenis_makanan_saring").checked = true;
					}
					if (gd.gd_jenis_makanan === '4') {
						document.getElementById("gd_jenis_makanan_biasa").checked = true;
					}
					
					if (gd.gd_cara_makan === '1') {
						document.getElementById("gd_cara_makan_oral").checked = true;
					}
					if (gd.gd_cara_makan === '2') {
						document.getElementById("gd_cara_makan_ngt").checked = true;
					}

					// petugas
					$('#gd_tgl_petugas').val(datetimefmysql(gd.gd_tgl_petugas));
					$('#gd_petugas').val(gd.gd_petugas);
					$('#s2id_gd_petugas a .select2c-chosen').html(gd.petugas);
					if (gd.gd_ttd === '1') {
						document.getElementById("gd_ttd").checked = true;
					}

					// dokter
					$('#gd_dokter').val(gd.gd_dokter);
					$('#s2id_gd_dokter a .select2c-chosen').html(gd.dokter);
					if (gd.gd_ttd_dokter === '1') {
						document.getElementById("gd_ttd_dokter").checked = true;
					}
				}

				$('#modal_gizi_dietetik').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

		}

    function konfirmasiSimpanEntriGd() {
        var stop = false;

        if ($('#gd_tgl_petugas').val() === '') {
            syams_validation('#gd_tgl_petugas', 'Tanggal harus diisi!');
            stop = true;
        }

        if ($('#gd_petugas').val() === '') {
            syams_validation('#gd_petugas', 'Dokter harus diisi!');
            stop = true;
        }

        if ($('#gd_dokter').val() === '') {
            syams_validation('#gd_dokter', 'Dokter harus diisi!');
            stop = true;
        }

		var text = '';
		var btnText = '';
		if ($('#gd_id').val() === '') {
			text 	= 'menyimpan';
			btnText = 'Simpan';
		} else {
			text 	= 'mengubah' ;
			btnText = 'Ubah' ;
		}

        if ($('#gd_tgl_petugas').val() !== '' && $('#gd_petugas').val() !== '' && $('#gd_dokter').val() !== '' ) {
            swal.fire({
                title: 'Simpan Entri Keperawatan',
                text: "Apakah anda yakin akan "+text+" Form Konsultasi Gizi?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>'+btnText,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanEntriGd();
                }
            })
        }
    }

    function simpanEntriGd() {

		var id_layanan_pendaftaran = $('#gd_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#gd_id_pendaftaran').val();
        var id_pasien = $('#gd_id_pasien').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url("gizi/api/gizi/simpan_gizi_dietetik") ?>',
            data: $('#form_gizi_dietetik').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal_gizi_dietetik').modal('hide');
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

    // function cetakKonsultasiGizi() {
	// 	let id_gd = $('#id_gd').val();
    //     let id_layanan_pendaftaran = $('#gd_id_layanan_pendaftaran').val();
    //     let id_pendaftaran = $('#gd_id_pendaftaran').val();
	// 	var dWidth = $(window).width();
	// 				var dHeight = $(window).height();
	// 				var x = screen.width / 2 - dWidth / 2;
	// 				var y = screen.height / 2 - dHeight / 2;
	// 	window.open(
	// 	'<?= base_url("gizi/cetak_konsultasi_gizi/") ?>' + id_layanan_pendaftaran, 'Cetak Konsultasi Gizi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	// }

	function cetakDietetik() {		
		let id_gd = $('#gd_id').val();
        let id_layanan_pendaftaran = $('#gd_id_layanan_pendaftaran').val();
        let id_pendaftaran = $('#gd_id_pendaftaran').val();
		var dWidth = $(window).width();
		var dHeight = $(window).height();
		var x = screen.width / 2 - dWidth / 2;
		var y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('gizi/cetak_dietetik/') ?>' + id_gd + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Dietetik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);	
	}

	function cetakGiziDietetik(id) {		
        let id_layanan_pendaftaran = $('#gd_id_layanan_pendaftaran').val();
        let id_pendaftaran = $('#gd_id_pendaftaran').val();
		var dWidth = $(window).width();
		var dHeight = $(window).height();
		var x = screen.width / 2 - dWidth / 2;
		var y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('gizi/cetak_dietetik/') ?>' + id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Dietetik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function hapusGiziDietetik(id, id_pendaftaran, id_layanan_pendaftaran) {
		bootbox.dialog({
			message: "Anda yakin akan manghapus data ini?",
			title: "Hapus Formulir Asuhan Gizi dan Destetik",
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
								url: '<?= base_url("gizi/api/gizi/hapus_gizi_dietetik") ?>',
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
										list_data_gizi_dietetik(id_pendaftaran, id_layanan_pendaftaran);
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