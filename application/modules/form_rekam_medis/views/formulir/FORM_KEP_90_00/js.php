<script>
    $(function() {

        let currentDate = new Date();
        $('#lt_tanggal').datetimepicker({
            format: 'DD/MM/YYYY',
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

        // ini muncul TANGGAL 
        // $('#lt_waktu_mulai, #lt_waktu_selesai').datetimepicker({
        //     format: 'HH:mm',
        //     pickSecond: false,
        //     pick12HourFormat: false,
        //     // maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
        //     maxDate: new Date(),
        //     beforeShow: function(i) {
        //         if ($(i).attr('readonly')) {
        //             return false;
        //         }
        //     }
        // });

        // pkek yang ini ada PM DAN AM 
        // $('#lt_waktu_mulai, #lt_waktu_selesai').timepicker({
        //     format: 'HH:mm',
        //     pickSecond: false,
        //     pick12HourFormat: false,
        //     maxDate: new Date(),
        //     beforeShow: function(i) {
        //         if ($(i).attr('readonly')) {
        //             return false;
        //         }
        //     }
        // });

        // PAKEK YANG INI AJAH 
        $('#lt_waktu_mulai, #lt_waktu_selesai').timepicker({
            timeFormat: 'HH:mm',  // Menggunakan format 24 jam
            showMeridian: false,  // Nonaktifkan AM/PM
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });


        // Fungsi untuk menghitung selisih waktu
        function hitungSelisihWaktu() {
            var waktuMulai = $('#lt_waktu_mulai').val();
            var waktuSelesai = $('#lt_waktu_selesai').val();

            // Pastikan kedua input waktu tidak kosong
            if (waktuMulai !== '' && waktuSelesai !== '') {
                // Buat objek Date dengan format jam pada hari yang sama
                var mulaiDate = new Date('2022-01-01 ' + waktuMulai);
                var selesaiDate = new Date('2022-01-01 ' + waktuSelesai);

                // Hitung selisih waktu dalam milidetik
                var selisihMillis = selesaiDate - mulaiDate;

                // Konversi milidetik ke jam dan menit
                var selisihJam = Math.floor(selisihMillis / (1000 * 60 * 60));
                var selisihMenit = Math.floor((selisihMillis % (1000 * 60 * 60)) / (1000 * 60));

                // Set nilai lt_lama_waktu
                $('#lt_lama_waktu').val(selisihJam + ' jam ' + selisihMenit + ' menit');
            }
        }

        // Panggil fungsi saat nilai waktu mulai atau waktu selesai berubah
        $('#lt_waktu_mulai, #lt_waktu_selesai').on('change', hitungSelisihWaktu);

        // DOKTER
        $('#lt_dokter').select2c({
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

        // PERAWAT
        $('#lt_perawat').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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

        // BIDAN
        $('#lt_bidan').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: 15,
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


        function getNoBed(id_kamar) {
            $.ajax({
                type: 'GET',
                url: '<?= base_url("bed/api/bed/get_no_bed") ?>/' + id_kamar,
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data !== null) {
                        $('#no-bed').val(data.no_bed);
                    } else {
                        $('#no-bed').val('');
                    }

                    syams_validation_remove('#no-bed');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            });
        }

    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function resetFormLT() {
        $('#lt_id, #lt_id_layanan_pendaftaran, #lt_id_pendaftaran, #lt_id_pasien, #lt_id_bed, #lt_id_users, #lt_nama_pasien, #lt_no_rm, #lt_tanggal_lahir, #lt_jenis_kelamin, #alamat, #lt_bed, #lt_nama_tindakan, #lt_diagnosa_sebelum, #lt_diagnosa_sesudah, #lt_pa, #lt_komplikasi, #lt_pendarahan, #lt_tanggal, #lt_waktu_mulai, #lt_waktu_selesai, #lt_lama_waktu, #lt_laporan_tindakan, #lt_dokter, #lt_bidan, #lt_perawat').val('');

        $('#lt_paraf_dokter, #lt_paraf_bidan, #lt_paraf_perawat').prop('checked', false);

        $('#s2id_lt_dokter a .select2c-chosen, #s2id_lt_bidan a .select2c-chosen, #s2id_lt_perawat a .select2c-chosen').html('');
    }

    function tambahFORM_KEP_90_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormLT();
        entriLT(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_KEP_90_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormLT();
        entriLT(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_KEP_90_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormLT();
        entriLT(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriLT(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn-simpan').hide();
        $('#action_lap_tindakan').val(action);

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.laporan-tindakan').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.laporan-tindakan').hide();
		}

        tableListTindakan(id_pendaftaran, id_layanan_pendaftaran, bed, action);
    }

    function konfirmasiSimpanEntriLT() {
        if ($('#lt_tanggal').val() === '') {
            syams_validation('#lt_tanggal', 'Tanggal Wajib diisi!.');
            return false;
        } else {
            syams_validation_remove('#lt_tanggal');
        }
        if ($('#lt_waktu_mulai').val() === '') {
            syams_validation('#lt_waktu_mulai', 'Jam Mulai Wajib diisi!.');
            return false;
        } else {
            syams_validation_remove('#lt_waktu_mulai');
        }
        if ($('#lt_waktu_selesai').val() === '') {
            syams_validation('#lt_waktu_selesai', 'Jam Selesai Wajib diisi!.');
            return false;
        } else {
            syams_validation_remove('#lt_waktu_selesai');
        }

        var stop = false;
        if ($('#lt_nama_tindakan').val() === '') {
            syams_validation('#lt_nama_tindakan', 'Nama tindakan harus diisi!');
            stop = true;
        }

        if ($('#lt_dokter').val() === '') {
            syams_validation('#lt_dokter', 'Dokter harus diisi!');
            stop = true;
        }

        if ($('#lt_nama_tindakan').val() !== '' && $('#lt_dokter').val() !== '') {
            swal.fire({
                title: 'Simpan Entri Keperawatan',
                text: "Apakah anda yakin akan menyimpan DATA?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanEntriLT();
                }
            })
        }
    }

    // function simpanEntriLT() {
	// 	var id_layanan_pendaftaran = $('#lt_id_layanan_pendaftaran').val();
    //     var id_pendaftaran = $('#lt_id_pendaftaran').val();
    //     var bed = $('#lt_bed').val();

    //     $.ajax({
    //         type: 'POST',
    //         // url: '<!?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_LT") ?>',
    //         url: '<?= base_url("order_operasi/api/order_operasi/simpan_LT") ?>',
    //         data: $('#form_laporan_tindakan').serialize(),
    //         cache: false,
    //         dataType: 'JSON',
    //         beforeSend: function() {
    //             showLoader();
    //         },
    //         success: function(data) {
    //             if (data.respon !== null) {
    //                 if (data.respon.show !== null) {
    //                     $('#wizard_form_resume').bwizard('show', data.respon.show);
    //                     if (data.respon.add_show !== undefined) {
    //                         $('#wizard-resume-group').bwizard('show', data.respon.add_show);
    //                         if (data.respon.id !== undefined) {
    //                             $(data.respon.id).addClass('show');
    //                         }
    //                     } else {
    //                         if (data.respon.id !== undefined) {
    //                             $(data.respon.id).addClass('show');
    //                         }
    //                     }

    //                     if (data.respon.status === false) {
    //                         bootbox.dialog({
    //                             message: data.respon.message,
    //                             title: "Penyimpanan Data Gagal",
    //                             buttons: {
    //                                 batal: {
    //                                     label: '<i class=" fas fa-times-circle"></i> Close',
    //                                     className: "btn-danger",
    //                                     callback: function() {
    //                                     }
    //                                 }
    //                             }
    //                         });
    //                     }
    //                 }
    //             } else {
    //                 $('input[name=csrf_syam]').val(data.token);
    //                 if (data.status) {
    //                     messageAddSuccess();
    //                     resetFormLT();
    //                     tableListTindakan(id_pendaftaran, id_layanan_pendaftaran, bed);
    //                 } else {
    //                     messageAddFailed();
    //                 }
    //             }
    //         },
    //         complete: function() {
    //             hideLoader();
    //         },
    //         error: function(e) {
    //             messageAddFailed();
    //         }
    //     });
    // }

    function simpanEntriLT() {
        var id_layanan_pendaftaran = $('#lt_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#lt_id_pendaftaran').val();
        var bed = $('#lt_bed').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/order_operasi/simpan_LT") ?>',
            data: $('#form_laporan_tindakan').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token); // kalau CSRF ada

                if (data.status) {
                    messageAddSuccess();
                    resetFormLT();
                    tableListTindakan(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    bootbox.dialog({
                        message: data.message ?? 'Gagal menyimpan data',
                        title: "Penyimpanan Gagal",
                        buttons: {
                            batal: {
                                label: '<i class="fas fa-times-circle"></i> Close',
                                className: "btn-danger",
                                callback: function() {}
                            }
                        }
                    });
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(xhr, status, error) {
                messageAddFailed();
                console.error('AJAX Error:', error);
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

    function tableListTindakan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
		$('#table-list-lap-tindakan tbody').empty()
		$('#btn_update_lt').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#lt_nama_tindakan, #lt_dokter');

		$.ajax({
			type: 'GET',
			// url: '<!?= base_url("order_operasi/api/order_operasi/laporan_operasi") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			url: '<?= base_url("order_operasi/api/order_operasi/get_data_laporan_tindakan") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				// Set all values first
				resetFormLT();
                $('#lt_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#lt_id_pendaftaran').val(id_pendaftaran);
                $('#lt_id_bed, #lt_bed').val(bed).text(bed);
                if (data.pasien_tindakan !== null) {
                    $('#id_pasien, #lt_no_rm').val(data.pasien_tindakan.id_pasien).text(data.pasien_tindakan.id_pasien);
                    $('#lt_nama_pasien').text(data.pasien_tindakan.nama);
                    $('#lt_tanggal_lahir').text((data.pasien_tindakan.tanggal_lahir !== null ? datefmysql(data.pasien_tindakan.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien_tindakan.tanggal_lahir) + ')'));
                    $('#lt_jenis_kelamin').text((data.pasien_tindakan.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    if (data.pasien_tindakan.alergi !== null) {
                        $('#lt_riwayat_alergi').val(data.pasien_tindakan.alergi).attr('readonly', true)
                    };
                    $('#lt_alamat').text(data.pasien_tindakan.alamat);
                }
                $('.lt_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                let lt = data.lt;
				if (lt.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;

					$.each(lt, function(i, v) {
						let btnEditLapOperasi = '';
						let btnHapusLapOperasi = '';

						if (action !== 'lihat') {
							btnEditLapOperasi = `<button type="button" class="btn btn-success btn-xs" onclick="editLaporanTindakan(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusLapOperasi = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusLaporanTindakan(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}
						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${datefmysql(v.lt_tanggal)}</td>
								<td class="left">${v.lt_nama_tindakan}</td>
								<td class="left">${v.lt_diagnosa_sebelum ? v.lt_diagnosa_sebelum : '-'}</td>
								<td class="left">${v.lt_diagnosa_sesudah ? v.lt_diagnosa_sesudah : '-'}</td>
                                <td class="center">${v.nama_dokter}</td>
								<td class="center">
									<button type="button" class="btn btn-info btn-xs" onclick="cetakLaporanTindakan(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									${btnEditLapOperasi}
									${btnHapusLapOperasi}
								</td>
							</tr>
						`;

						$('#table-list-lap-tindakan tbody').append(html)
					})
				}

				$('#modal_LT').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

    function hapusLaporanTindakan(id_lap_tindakan, id_pendaftaran, id_layanan_pendaftaran) {
		bootbox.dialog({
			message: "Anda yakin akan manghapus Laporan Operasi ini?",
			title: "Hapus Laporan Operasi",
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
								url: '<?= base_url("order_operasi/api/order_operasi/hapus_laporan_tindakan") ?>',
								data: {
									id: id_lap_tindakan
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										resetFormLT();
                                        tableListTindakan(id_pendaftaran, id_layanan_pendaftaran);

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

	function editLaporanTindakan(id_tindakan, id_pendaftaran, id_layanan_pendaftaran, bed) {
		$('#btn_update_lt').removeClass('hide').show();
		$.ajax({
			type: 'GET',
			url: '<?= base_url('order_operasi/api/order_operasi/edit_laporan_tindakan') ?>/id_tindakan/' + id_tindakan + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

                $('#lt_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#lt_id_pendaftaran').val(id_pendaftaran);
                $('#lt_id_bed, #lt_bed').val(bed).text(bed);

                if (data.pasien_tindakan !== null) {
                    $('#id_pasien, #lt_no_rm').val(data.pasien_tindakan.id_pasien).text(data.pasien_tindakan.id_pasien);
                    $('#lt_nama_pasien').text(data.pasien_tindakan.nama);
                    $('#lt_tanggal_lahir').text((data.pasien_tindakan.tanggal_lahir !== null ? datefmysql(data.pasien_tindakan.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien_tindakan.tanggal_lahir) + ')'));
                    $('#lt_jenis_kelamin').text((data.pasien_tindakan.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

                    if (data.pasien_tindakan.alergi !== null) {
                        $('#lt_riwayat_alergi').val(data.pasien_tindakan.alergi).attr('readonly', true)
                    };
                    $('#lt_alamat').text(data.pasien_tindakan.alamat);
                }

                $('.lt_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // Laporan Tindakan
                let lt = data.lt;
                if (lt !== null) {
                    $('#lt_id').val(lt.id);

                    $('#lt_nama_tindakan').val(lt.lt_nama_tindakan);
                    $('#lt_diagnosa_sebelum').val(lt.lt_diagnosa_sebelum);
                    $('#lt_diagnosa_sesudah').val(lt.lt_diagnosa_sesudah);
                    $('#lt_pa').val(lt.lt_pa);
                    $('#lt_komplikasi').val(lt.lt_komplikasi);
                    $('#lt_pendarahan').val(lt.lt_pendarahan);

                    $('#lt_tanggal').val((lt.lt_tanggal !== null ? datefmysql(lt.lt_tanggal) : ''));

                    // Waktu awal dari objek lt
                    var waktuAwalMulai = lt.lt_waktu_mulai; // Misalnya, "14:00:00"
                    // Memotong string waktu
                    var waktuHasilMulai = waktuAwalMulai.split(':').slice(0, 2).join(':');
                    // Menetapkan nilai waktu yang diformat ke elemen dengan ID #lt_waktu_mulai
                    $('#lt_waktu_mulai').val(waktuHasilMulai);

                    // Waktu awal dari objek lt
                    var waktuAwalSelesai = lt.lt_waktu_selesai; // Misalnya, "14:00:00"
                    // Memotong string waktu
                    var waktuHasilSelesai = waktuAwalSelesai.split(':').slice(0, 2).join(':');
                    // Menetapkan nilai waktu yang diformat ke elemen dengan ID #lt_waktu_selesai
                    $('#lt_waktu_selesai').val(waktuHasilSelesai);


                    // $('#lt_waktu_mulai').val(lt.lt_waktu_mulai);
                    // $('#lt_waktu_selesai').val(lt.lt_waktu_selesai);
                    $('#lt_lama_waktu').val(lt.lt_lama_waktu);
                    $('#lt_laporan_tindakan').val(lt.lt_laporan_tindakan);

                    if (lt.lt_paraf_dokter == 1) {
                        $('#lt_paraf_dokter').prop('checked', true).change();
                    }
                    if (lt.lt_paraf_bidan == 1) {
                        $('#lt_paraf_bidan').prop('checked', true).change();
                    }
                    if (lt.lt_paraf_perawat == 1) {
                        $('#lt_paraf_perawat').prop('checked', true).change();
                    }

                    $('#lt_dokter').val(lt.lt_dokter);
                    $('#s2id_lt_dokter a .select2c-chosen').html(lt.nama_dokter);
                    $('#lt_bidan').val(lt.lt_bidan);
                    $('#s2id_lt_bidan a .select2c-chosen').html(lt.nama_bidan);
                    $('#lt_perawat').val(lt.lt_perawat);
                    $('#s2id_lt_perawat a .select2c-chosen').html(lt.nama_perawat);
                }

                $('#modal_LT').modal('show');
            },
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function cetakLaporanTindakan(id_lap_tindakan, id_pendaftaran, id_layanan_pendaftaran) {
		window.open('<?= base_url('order_operasi/laporan_tindakan/') ?>' + id_lap_tindakan + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Laporan Operasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);

	}


</script>