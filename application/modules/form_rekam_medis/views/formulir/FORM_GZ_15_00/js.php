<script>
    $(function() {

        $('#btn_reset_kg').on('click', function() {
			resetKg_formOnly();
		});

        let currentDate = new Date();
        $('#kg_tgl_petugas').datetimepicker({
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
        $('#kg_petugas').select2c({
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
		$('#kg_dokter').select2c({
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

    function resetKg() {
        $('#form_konsultasi_gizi')[0].reset();
    }

    function resetKg_formOnly() {
		let action		   = $('#action_kg').val();
		let id_pasien 	   = $('#kg_id_pasien').val();
		let id_pendaftaran = $('#kg_id_pendaftaran').val();
		let id_layanan_pendaftaran = $('#kg_id_layanan_pendaftaran').val();
        $('#form_konsultasi_gizi')[0].reset();
		$('#action_kg').val(action);
		$('#kg_id_pasien').val(id_pasien).text(id_pasien);
		$('#kg_id_pendaftaran').val(id_pendaftaran);
		$('#kg_id_layanan_pendaftaran').val(id_layanan_pendaftaran);		
    }

    function tambahFORM_GZ_15_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetKg();
        entriKg(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_GZ_15_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetKg();
        entriKg(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_GZ_15_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetKg();
        entriKg(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriKg(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn_simpan_kg').hide();
        $('#btn_cetak_kg').empty();
        $('#action_kg').val(action);

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
			$('#btn_simpan_kg').show();
		} else {
			$('#btn_simpan_kg').hide();
		}

        $.ajax({
			type: 'GET',
            //url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
            url: '<?= base_url("gizi/api/gizi/get_data_layanan_pasien") ?>/id/' + id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				// Set all values first
				resetKg();                
				$('#action_kg').val(action);
                $('#kg_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#kg_id_pendaftaran').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#kg_id_pasien, #kg_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#kg_nama_pasien, #kg_nama_pasien_2').text(data.pasien.nama);
                    $('#kg_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#kg_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#kg_alamat').text(data.pasien.alamat);
                }

                list_data_gizi_konsultasi(id_pendaftaran, id_layanan_pendaftaran);
				$('#modal_konsultasi_gizi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

    }

    function list_data_gizi_konsultasi(id_pendaftaran, id_layanan_pendaftaran) {
        $.ajax({
			type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_list_data_gizi_konsultasi") ?>/id/' + id_pendaftaran ,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#table-konsultasi tbody').empty()
				if (data.kg.length !== 0) {
					var numberData = 1;

                    console.log(data); 
					$.each(data.kg, function(i, v) {
                        
						let btnEditGiziKonsultasi  = '';
						let btnHapusGiziKonsultasi = '';
						let btnCetakGiziKonsultasi = `<button type="button" class="btn btn-secondary btn-xs" onclick="cetakGiziKonsultasi(${v.id_kg})"><i class="fas fa-print mr-1"></i>Print</button>`;

						if ($('#action_kg').val() !== 'lihat') {
							btnEditGiziKonsultasi  = `<button type="button" class="btn btn-secondary btn-xs" onclick="editGiziKonsultasi(${v.id_kg})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusGiziKonsultasi = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusGiziKonsultasi(${v.id_kg}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}
									
						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.kg_tgl_petugas}</td>
								<td class="left">${v.dokter}</td>
								<td class="left">${v.petugas}</td>
								<td class="center">${v.created_at}</td>
								<td class="left">${v.users}</td>
								<td class="right">
									${btnCetakGiziKonsultasi}
									${btnEditGiziKonsultasi}
									${btnHapusGiziKonsultasi}
								</td>
							</tr>
						`;

						$('#table-konsultasi tbody').append(html)
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

    function editGiziKonsultasi(id) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/get_gizi_konsultasi_byid") ?>/id/' + id ,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetKg_formOnly();
				// Resep Kaca MAta
                let kg = data;

                if(kg != null){
					$('#kg_id').val(kg.id_kg);
					$('#kg_bb').val(kg.kg_bb);
					$('#kg_lla').val(kg.kg_lla);
					$('#kg_pbb').val(kg.kg_pbb);
					$('#kg_tb').val(kg.kg_tb);
					$('#kg_imt').val(kg.kg_imt);
					$('#kg_biokimia').val(kg.kg_biokimia);
					$('#kg_klinis').val(kg.kg_klinis);
					$('#kg_gizi').val(kg.kg_gizi);
					$('#kg_personal').val(kg.kg_personal);
					$('#kg_diagnosis').val(kg.kg_diagnosis);
					$('#kg_tujuan').val(kg.kg_tujuan);
					$('#kg_intervensi').val(kg.kg_intervensi);
					$('#kg_konseling').val(kg.kg_konseling);
					$('#kg_evaluasi').val(kg.kg_evaluasi);

					// petugas
					$('#kg_tgl_petugas').val(datetimefmysql(kg.kg_tgl_petugas));
					$('#kg_petugas').val(kg.kg_petugas);
					$('#s2id_kg_petugas a .select2c-chosen').html(kg.petugas);
					if (kg.kg_ttd === '1') {
						document.getElementById("kg_ttd").checked = true;
					}
					$('#kg_dokter').val(kg.kg_dokter);
					$('#s2id_kg_dokter a .select2c-chosen').html(kg.dokter);
					if (kg.kg_ttd_dokter === '1') {
						document.getElementById("kg_ttd_dokter").checked = true;
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

    function konfirmasiSimpanEntriKg() {
        var stop = false;

        if ($('#kg_tgl_petugas').val() === '') {
            syams_validation('#kg_tgl_petugas', 'Tanggal harus diisi!');
            stop = true;
        }

        if ($('#kg_petugas').val() === '') {
            syams_validation('#kg_petugas', 'Petugas harus diisi!');
            stop = true;
        }

        if ($('#kg_dokter').val() === '') {
            syams_validation('#kg_dokter', 'Dokter harus diisi!');
            stop = true;
        }

		if ($('#kg_evaluasi').val() === '') {
            syams_validation('#kg_evaluasi', ' Rencana Monitoring dan Evaluasi Gizi Wajib diisi !!!');
            return false;
        } else {
            syams_validation_remove('#kg_evaluasi');
        }

        var text = '';
		var btnText = '';
		if ($('#kg_id').val() === '') {
			text 	= 'menyimpan';
			btnText = 'Simpan';
		} else {
			text 	= 'mengubah' ;
			btnText = 'Ubah' ;
		}

        if ($('#kg_tgl_petugas').val() !== '' && $('#kg_petugas').val() !== '' && $('#kg_dokter').val() !== '') {
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
                    simpanEntriKg();
                }
            })
        }
    }

    function simpanEntriKg() {

		var id_layanan_pendaftaran = $('#kg_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#kg_id_pendaftaran').val();
        var id_pasien = $('#kg_id_pasien').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_kg") ?>',
            data: $('#form_konsultasi_gizi').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.respon !== null) {
                    if (data.respon.show !== null) {
                        $('#wizard_form_resume').bwizard('show', data.respon.show);
                        if (data.respon.add_show !== undefined) {
                            $('#wizard-resume-group').bwizard('show', data.respon.add_show);
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        } else {
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        }

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
                        $('#modal_konsultasi_gizi').modal('hide');
                        resetKg();
                        showListForm(id_pendaftaran, id_layanan_pendaftaran, id_pasien);
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
	// 	let id_kg = $('#kg_id').val();
    //     let id_pendaftaran = $('#kg_id_pendaftaran').val();
    //     let id_layanan_pendaftaran = $('#kg_id_layanan_pendaftaran').val();

	// 	var dWidth = $(window).width();
	// 				var dHeight = $(window).height();
	// 				var x = screen.width / 2 - dWidth / 2;
	// 				var y = screen.height / 2 - dHeight / 2;
	// 	window.open(
	// 	'<?= base_url("gizi/cetak_konsultasi_gizi/") ?>' + id_kg + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Konsultasi Gizi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	// }

    function cetakGiziKonsultasi(id) {		
        let id_pendaftaran = $('#kg_id_pendaftaran').val();
        let id_layanan_pendaftaran = $('#kg_id_layanan_pendaftaran').val();

		var dWidth = $(window).width();
        var dHeight = $(window).height();
        var x = screen.width / 2 - dWidth / 2;
        var y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url("gizi/cetak_konsultasi_gizi/") ?>' + id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Konsultasi Gizi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}


    function hapusGiziKonsultasi(id, id_pendaftaran, id_layanan_pendaftaran) {
		bootbox.dialog({
			message: "Anda yakin akan manghapus data ini?",
			title: "Hapus Formulir Konsultasi Gizi",
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
								url: '<?= base_url("gizi/api/gizi/hapus_gizi_konsultasi") ?>',
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
										list_data_gizi_konsultasi(id_pendaftaran, id_layanan_pendaftaran);
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