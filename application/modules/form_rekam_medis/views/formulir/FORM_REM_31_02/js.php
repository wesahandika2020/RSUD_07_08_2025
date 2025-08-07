<script>

    // KODINGAN LAMA
    // function lihatFORM_REM_31_02(data) {
    //     let pasien = data.pasien;
    //     let layanan = data.layanan;
    //     let bed;

    //     if (layanan.bangsal_ic && layanan.no_bed_ic) {
    //         bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
    //     } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
    //         bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
    //     } else {
    //         bed = `${layanan.jenis_layanan}`;
    //     }
        
    //     let action  = 'lihat';
    //     window.open('<?= base_url('pemeriksaan_poli/cetak_pemberian_informasi/') ?>' + layanan.id,
    //                'Cetak Pemberian Informasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
				
    // }

    // function editFORM_REM_31_02(data) {
    //     let pasien = data.pasien;
    //     let layanan = data.layanan;
    //     let bed;

    //     if (layanan.bangsal_ic && layanan.no_bed_ic) {
    //         bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
    //     } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
    //         bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
    //     } else {
    //         bed = `${layanan.jenis_layanan}`;
    //     }
        
    //     let action  = 'edit';
	// 	let details = layanan.id + '#' + pasien.id_pasien + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + hitungUmur(pasien.tanggal_lahir) + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal' + '#' + layanan.id_pendaftaran;
    //     cetakPemberianInformasi(details,action);
    // }

    // function tambahFORM_REM_31_02(data) {
    //     let pasien = data.pasien;
    //     let layanan = data.layanan;
    //     let bed;

    //     if (layanan.bangsal_ic && layanan.no_bed_ic) {
    //         bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
    //     } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
    //         bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
    //     } else {
    //         bed = `${layanan.jenis_layanan}`;
    //     }
        
    //     let action  = 'tambah';
	// 	let details = layanan.id + '#' + pasien.id_pasien + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + hitungUmur(pasien.tanggal_lahir) + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal' + '#' + layanan.id_pendaftaran;
    //     cetakPemberianInformasi(details,action);
    // }


    // function cetakPemberianInformasi(details,action) {

    //     $('#btn_simpan').hide();
    //     var groupAccount = '<?= $this->session->userdata('account_group') ?>';
    //     var profesi = '<?= $this->session->userdata('profesinadis') ?>';
    //     if (groupAccount == 'Admin') {
    //         profesi = 'Perawat';
    //     }

    //     if (action !== 'lihat' ) {
    //         $('#btn_simpan').show();
    //     } else {
    //         $('#btn_simpan').hide();
    //     }

    //     let detail = details.split('#');

    //     $.ajax({
    //         type: 'GET',
    //         url: '<?= base_url('rekam_medis/api/rekam_medis/check_pemberian_informasi') ?>/id/' + detail[0],
    //         cache: false,
    //         dataType: 'JSON',
    //         beforeSend: function() {
    //             showLoader();
    //         },
    //         success: function(data) {
    //             // Set all values first
    //             resetModalPemberianInformasi();

    //             $('#modal-pemberian-informasi-title').html(
    //                 `<b>Form Pemberian Informasi</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
    //             );
    //             $('#id-pasien-pi').val(detail[1]);
    //             $('#id-pendaftaran-pi').val(detail[12]);
    //             $('#id-layanan-pendaftaran-pi').val(detail[0]);

    //             $('#nama-keluarga-pi').val(data.nama_keluarga);
    //             $('#id-dokter-pelaksana-tindakan-pi').val(data.id_dokter_pelaksana_tindakan);
    //             $('#s2id_dokter-pelaksana-tindakan-pi a .select2c-chosen').html(data.nama_dokter_pelaksana);
    //             $('#penerima-informasi-pi').val(data.penerima_informasi);
    //             $('#pemberi-informasi-pi').val(data.pemberi_informasi);
    //             $('#diagnosis-kerja-pi').val(data.diagnosis_kerja);
    //             $('#dasar-diagnosis-pi').val(data.dasar_diagnosis);
    //             $('#tindakan-kedokteran-pi').val(data.tindakan_kedokteran);
    //             $('#indikasi-tindakan-pi').val(data.indikasi_tindakan);
    //             $('#tata-cara-pi').val(data.tata_cara);
    //             $('#tujuan-pi').val(data.tujuan);
    //             $('#risiko-komplikasi-pi').val(data.risiko_komplikasi);
    //             $('#prognosis-pi').val(data.prognosis);
    //             $('#alternatif-resiko-pi').val(data.alternatif_resiko);
    //             $('#menyelamatkan-pasien-pi').val(data.menyelamatkan_pasien);
    //             $('#penggunaan-darah-pi').val(data.penggunaan_darah);
    //             $('#analgesia-pi').val(data.analgesia);

    //             if (data.is_pasien === '1') {
    //                 document.getElementById("is-pasien-pi-ya").checked = true;
    //                 // Disabled fields
    //                 $("#nama-keluarga-pi").prop("disabled", true);
    //                 $("#pemberi-informasi-pi").prop("disabled", true);
    //                 $("#penerima-informasi-pi").prop("disabled", true);
    //             } else if (data.is_pasien === '0') {
    //                 document.getElementById("is-pasien-pi-tidak").checked = true;
    //                 // Undisabled fields
    //                 $("#nama-keluarga-pi").prop("disabled", false);
    //                 $("#pemberi-informasi-pi").prop("disabled", false);
    //                 $("#penerima-informasi-pi").prop("disabled", false);
    //             }

    //             if (data.diagnosis_kerja_check === '1') {
    //                 document.getElementById("diagnosis-kerja-check-pi").checked = true;
    //             }

    //             if (data.dasar_diagnosis_check === '1') {
    //                 document.getElementById("dasar-diagnosis-check-pi").checked = true;
    //             }

    //             if (data.tindakan_kedokteran_check === '1') {
    //                 document.getElementById("tindakan-kedokteran-check-pi").checked = true;
    //             }

    //             if (data.indikasi_tindakan_check === '1') {
    //                 document.getElementById("indikasi-tindakan-check-pi").checked = true;
    //             }

    //             if (data.tata_cara_check === '1') {
    //                 document.getElementById("tata-cara-check-pi").checked = true;
    //             }

    //             if (data.tujuan_check === '1') {
    //                 document.getElementById("tujuan-check-pi").checked = true;
    //             }

    //             if (data.risiko_komplikasi_check === '1') {
    //                 document.getElementById("risiko-komplikasi-check-pi").checked = true;
    //             }

    //             if (data.prognosis_check === '1') {
    //                 document.getElementById("prognosis-check-pi").checked = true;
    //             }

    //             if (data.alternatif_resiko_check === '1') {
    //                 document.getElementById("alternatif-resiko-check-pi").checked = true;
    //             }

    //             if (data.menyelamatkan_pasien_check === '1') {
    //                 document.getElementById("menyelamatkan-pasien-check-pi").checked = true;
    //             }

    //             if (data.penggunaan_darah_check === '1') {
    //                 document.getElementById("penggunaan-darah-check-pi").checked = true;
    //             }

    //             if (data.analgesia_check === '1') {
    //                 document.getElementById("analgesia-check-pi").checked = true;
    //             }

    //             $('#modal-pemberian-informasi').modal('show');
    //         },
    //         complete: function() {
    //             hideLoader();
    //         },
    //         error: function(e) {
    //             accessFailed(e.status);
    //         }
    //     });
    // }

    // function resetModalPemberianInformasi() {
    //     $('#id-layanan-pendaftaran-pi').val('');
    //     $('#nama-keluarga-pi').val('');
    //     $('#id-dokter-pelaksana-tindakan-pi').val('');
    //     $('#pemberi-informasi-pi').val('');
    //     $('#penerima-informasi-pi').val('');
    //     $('#diagnosis-kerja-pi').val('');
    //     $('#dasar-diagnosis-pi').val('');
    //     $('#tindakan-kedokteran-pi').val('');
    //     $('#indikasi-tindakan-pi').val('');
    //     $('#tata-cara-pi').val('');
    //     $('#tujuan-pi').val('');
    //     $('#risiko-komplikasi-pi').val('');
    //     $('#prognosis-pi').val('');
    //     $('#alternatif-resiko-pi').val('');
    //     $('#menyelamatkan-pasien-pi').val('');
    //     $('#penggunaan-darah-pi').val('');
    //     $('#analgesia-pi').val('');
    //     $('#s2id_dokter-pelaksana-tindakan-pi a .select2c-chosen').html('Silahkan dipilih');

    //     // Undisabled fields
    //     $("#nama-keluarga-pi").prop("disabled", false);
    //     $("#pemberi-informasi-pi").prop("disabled", false);
    //     $("#penerima-keluarga-pi").prop("disabled", false);

    //     // Unchecked fields
    //     document.getElementById("is-pasien-pi-ya").checked = false;
    //     document.getElementById("is-pasien-pi-tidak").checked = false;
    //     document.getElementById("diagnosis-kerja-check-pi").checked = false;
    //     document.getElementById("dasar-diagnosis-check-pi").checked = false;
    //     document.getElementById("tindakan-kedokteran-check-pi").checked = false;
    //     document.getElementById("indikasi-tindakan-check-pi").checked = false;
    //     document.getElementById("tata-cara-check-pi").checked = false;
    //     document.getElementById("tujuan-check-pi").checked = false;
    //     document.getElementById("risiko-komplikasi-check-pi").checked = false;
    //     document.getElementById("prognosis-check-pi").checked = false;
    //     document.getElementById("alternatif-resiko-check-pi").checked = false;
    //     document.getElementById("menyelamatkan-pasien-check-pi").checked = false;
    //     document.getElementById("penggunaan-darah-check-pi").checked = false;
    //     document.getElementById("analgesia-check-pi").checked = false;
    // }



    // BATAS 


    // KODINGAN BARU 
    // PWHI
    function lihatFORM_REM_31_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		getPermintaanPemberianInformasi(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_REM_31_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		getPermintaanPemberianInformasi(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_REM_31_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		getPermintaanPemberianInformasi(layanan.id_pendaftaran, layanan.id, action);
	}

    function getPermintaanPemberianInformasi(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalPemberianInformasi();

		$('#btn_simpan').hide();
		$('#action-pi').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.form-pemberian-informasi').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.form-pemberian-informasi').hide();
		}
		tableListPermintaanPemberianInformasi(id_pendaftaran, id_layanan_pendaftaran);
	}

    function tableListPermintaanPemberianInformasi(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal-pemberian-informasi').modal('show');

		$('#table-list-pi tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_ip').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-jam-pi, #dokter-pelaksana-tindakan-pi');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_pemberian_informasi') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				
				// console.log(data);
				resetModalPemberianInformasi();
				$('#modal-pemberian-informasi-title').html(`<b>FORM PEMBERIAN INFORMASI</b>`);
				$('#id-pendaftaran-pi').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-pi').val(id_layanan_pendaftaran);
				$('#id-pasien-pi').val(data.pendaftaran_detail.pasien.id_pasien);          

				if (data.list_pemberian_informasi.length !== 0) {
					var numberData = 1;
						// let aksiButton = action;

						// JANGAN DI HAPUS INI UNTUK MEMUNCULKAN CETAK
						$.each(data.list_pemberian_informasi, function(i, v) {
							let btnEditPemberianInformasi = '';
							let btnHapusPemberianInformasi = '';

							if ($('#action-pi').val() !== 'lihat') {
								btnEditPemberianInformasi = `<button type="button" class="btn btn-success btn-xs" onclick="editPemberianInformasi(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
								btnHapusPemberianInformasi = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusPemberianInformasi(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
							}

							let html = /* html */ `
								<tr>
									<td class="center">${numberData++}</td>
                                    <td class="center">${v.tanggal_jam_pi ? datetimefmysql(v.tanggal_jam_pi) : '-'}</td>
                                    <td class="center">${v.nama_dokter_pi ? v.nama_dokter_pi : '-'}</td>
                                    <td class="center">${v.nama_user ? v.nama_user : '-'}</td>
									<td class="center">
										<button type="button" class="btn btn-info btn-xs" onclick="cetakPemberianInformasi(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
										${btnEditPemberianInformasi}
										${btnHapusPemberianInformasi}
									</td>
								</tr>
							`;
						$('#table-list-pi tbody').append(html)
					})
				}
				$('#modal-pemberian-informasi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

    function hapusPemberianInformasi(id_pi, id_pendaftaran, id_layanan_pendaftaran) {
		bootbox.dialog({
			message: "Anda yakin akan manghapus Data ini?",
			title: "Hapus Data",
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
								url: '<?= base_url("rekam_medis/api/rekam_medis/hapus_pemberian_informasi") ?>',
								data: {
									id: id_pi
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListPermintaanPemberianInformasi(id_pendaftaran, id_layanan_pendaftaran);

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

    function editPemberianInformasi(id_ip, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_ip').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/edit_pemberian_informasi') ?>/id/' + id_ip + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetModalPemberianInformasi();
                $('#id-pi').val(id_ip);
                $('#id-pendaftaran-pi').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-pi').val(id_layanan_pendaftaran);
                $('#id-pasien-pi').val(data.pendaftaran_detail.pasien.id_pasien);

                if (data.edit_pemberian_informasi) {
                    $('#id-pi').val(data.edit_pemberian_informasi.id);
                    $('#nama-keluarga-pi').val(data.edit_pemberian_informasi.nama_keluarga);
                    $('#id-dokter-pelaksana-tindakan-pi').val(data.edit_pemberian_informasi.id_dokter_pelaksana_tindakan);
                    $('#s2id_dokter-pelaksana-tindakan-pi a .select2c-chosen').html(data.edit_pemberian_informasi.nama_dokter_pelaksana);
                    $('#tanggal-jam-pi').val((data.edit_pemberian_informasi.tanggal_jam_pi !== null ? datetimefmysql(data.edit_pemberian_informasi.tanggal_jam_pi) : ''));
                    $('#penerima-informasi-pi').val(data.edit_pemberian_informasi.penerima_informasi);
                    $('#pemberi-informasi-pi').val(data.edit_pemberian_informasi.pemberi_informasi);
                    $('#diagnosis-kerja-pi').val(data.edit_pemberian_informasi.diagnosis_kerja);
                    $('#dasar-diagnosis-pi').val(data.edit_pemberian_informasi.dasar_diagnosis);
                    $('#tindakan-kedokteran-pi').val(data.edit_pemberian_informasi.tindakan_kedokteran);
                    $('#indikasi-tindakan-pi').val(data.edit_pemberian_informasi.indikasi_tindakan);
                    $('#tata-cara-pi').val(data.edit_pemberian_informasi.tata_cara);
                    $('#tujuan-pi').val(data.edit_pemberian_informasi.tujuan);
                    $('#risiko-komplikasi-pi').val(data.edit_pemberian_informasi.risiko_komplikasi);
                    $('#prognosis-pi').val(data.edit_pemberian_informasi.prognosis);
                    $('#alternatif-resiko-pi').val(data.edit_pemberian_informasi.alternatif_resiko);
                    $('#menyelamatkan-pasien-pi').val(data.edit_pemberian_informasi.menyelamatkan_pasien);
                    $('#penggunaan-darah-pi').val(data.edit_pemberian_informasi.penggunaan_darah);
                    $('#analgesia-pi').val(data.edit_pemberian_informasi.analgesia);

                    if (data.edit_pemberian_informasi.is_pasien === '1') {
                        document.getElementById("is-pasien-pi-ya").checked = true;
                        // Disabled fields
                        $("#nama-keluarga-pi").prop("disabled", true);
                        $("#pemberi-informasi-pi").prop("disabled", true);
                        $("#penerima-informasi-pi").prop("disabled", true);
                    } else if (data.edit_pemberian_informasi.is_pasien === '0') {
                        document.getElementById("is-pasien-pi-tidak").checked = true;
                        // Undisabled fields
                        $("#nama-keluarga-pi").prop("disabled", false);
                        $("#pemberi-informasi-pi").prop("disabled", false);
                        $("#penerima-informasi-pi").prop("disabled", false);
                    }

                    if (data.edit_pemberian_informasi.diagnosis_kerja_check === '1') {
                        document.getElementById("diagnosis-kerja-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.dasar_diagnosis_check === '1') {
                        document.getElementById("dasar-diagnosis-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.tindakan_kedokteran_check === '1') {
                        document.getElementById("tindakan-kedokteran-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.indikasi_tindakan_check === '1') {
                        document.getElementById("indikasi-tindakan-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.tata_cara_check === '1') {
                        document.getElementById("tata-cara-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.tujuan_check === '1') {
                        document.getElementById("tujuan-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.risiko_komplikasi_check === '1') {
                        document.getElementById("risiko-komplikasi-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.prognosis_check === '1') {
                        document.getElementById("prognosis-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.alternatif_resiko_check === '1') {
                        document.getElementById("alternatif-resiko-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.menyelamatkan_pasien_check === '1') {
                        document.getElementById("menyelamatkan-pasien-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.penggunaan_darah_check === '1') {
                        document.getElementById("penggunaan-darah-check-pi").checked = true;
                    }

                    if (data.edit_pemberian_informasi.analgesia_check === '1') {
                        document.getElementById("analgesia-check-pi").checked = true;
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

    function cetakPemberianInformasi(id_pi, id_pendaftaran, id_layanan_pendaftaran) {
        window.open('<?= base_url('rekam_medis/cetak_pemberian_informasi/') ?>' + id_pi + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Pemberian Informasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function resetModalPemberianInformasi() {
		$('#form-pemberian-informasi')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#dokter-pelaksana-tindakan-pi').val('');
		$('#s2id_dokter-pelaksana-tindakan-pi a .select2c-chosen').html('Silahkan Pilih..');

		$('#id-pi').val('');
		$('#id-pendaftaran-pi').val('');
		$('#id-layanan-pendaftaran-pi').val('');
		$('#id-pasien-pi').val('');
	}
	
</script>