<!-- // CPTD -->
<script>
    $(function() {		
        $('#tanggal-cptd').datetimepicker({
			format: 'DD/MM/YYYY',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) {
				if ($(i).attr('readonly')) {
					return false;
				}
			}
		});

        $('#jampergelangan-cptd, #jamsiku-cptd, #jampci-cptd, #jamkaki-cptd, #jamkitekuk-cptd, #jamaptt-cptd')
		.on('click', function() {
			$(this).timepicker({
				format: 'HH:mm',
				showInputs: false,
				showMeridian: false
			});
		})

        // $('#jampergelangan-cptd, #jamsiku-cptd, #jampci-cptd, #jamkaki-cptd, #jamkitekuk-cptd, #jamaptt-cptd').on('click', function() {
        //     $(this).timepicker({
        //         format: 'HH:mm',
        //         showInputs: false,
        //         showMeridian: false,
        //         defaultTime: 'current' // ⬅️ Ini penting!
        //     });
        // });


        $('#perawatcathlab-cptd, #perawatruangan-cptd')
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

		$('#btn_reset').on('click', function() {
			resetModalCheklistPostTindakanDiagnostik();
		});

	})

    function lihatFORM_DIG_03_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		entriCheklistPostTindakanDiagnostik(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_DIG_03_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		entriCheklistPostTindakanDiagnostik(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_DIG_03_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		entriCheklistPostTindakanDiagnostik(layanan.id_pendaftaran, layanan.id, action);
	}

    function entriCheklistPostTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalCheklistPostTindakanDiagnostik();
		$('#btn_simpan').hide();
		$('#action-cptd').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.form-checklist-post-tindakan-diagnostik').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.form-checklist-post-tindakan-diagnostik').hide();
		}
		tableListCheklistPostTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran);
	}

    function tableListCheklistPostTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_checklist_post_tindakan_diagnostik').modal('show');

		$('#table-list-cptd tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_cptd').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-cptd');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/get_data_cheklist_post_tindakan_diagnostik') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				
				console.log(data);
				resetModalCheklistPostTindakanDiagnostik();
				$('#modal_checklist_post_tindakan_diagnostik_title').html(`<b>FORM CHECKLIST POST TINDAKAN DIAGNOSTIK INVASIF DAN INTERVENSI NON BEDAH</b>`);
				$('#id-pendaftaran-cptd').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-cptd').val(id_layanan_pendaftaran);
				$('#id-pasien-cptd').val(data.pendaftaran_detail.pasien.id_pasien);   
				$('#nama-pasien-cptd').text(data.pendaftaran_detail.pasien.nama);
				$('#norm-cptd').text(data.pendaftaran_detail.pasien.no_rm);

                // MUNCULKAN TANGGAL BULAN TAHUN HARI 
                function formatTanggalLahirUsia(tanggal) {
                    if (!tanggal) return '-';

                    const lahir = new Date(tanggal);
                    const today = new Date();

                    // Format DD/MM/YYYY
                    const formatted = lahir.toLocaleDateString('id-ID');

                    // Hitung usia
                    let tahun = today.getFullYear() - lahir.getFullYear();
                    let bulan = today.getMonth() - lahir.getMonth();
                    let hari = today.getDate() - lahir.getDate();

                    if (hari < 0) {
                        bulan--;
                        hari += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
                    }

                    if (bulan < 0) {
                        tahun--;
                        bulan += 12;
                    }

                    return `${formatted} (${tahun} Tahun ${bulan} Bulan ${hari} Hari)`;
                }

                $('#tanggal-lahir-cptd').text(
                    `${data.pendaftaran_detail.pasien.tempat_lahir || '-'}, ${formatTanggalLahirUsia(data.pendaftaran_detail.pasien.tanggal_lahir)}`
                );

				$('#jenis-kelamin-cptd').text(data.pendaftaran_detail.pasien.kelamin);

                $('#ruang-cptd').text(
					data.pendaftaran_detail.layanan.bangsal + 
					' kelas ' + data.pendaftaran_detail.layanan.kelas + 
					' ruang ' + data.pendaftaran_detail.layanan.no_ruang + 
					' No. Bed ' + data.pendaftaran_detail.layanan.no_bed
				);


				if (data.list_checklist_post_tindakan_diagnostik.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;
                    $.each(data.list_checklist_post_tindakan_diagnostik, function(i, v) {
						let btnEditCpTD = '';
						let btnHapusCpTD = '';

						if ($('#action-cptd').val() !== 'lihat') {
							btnEditCpTD = `<button type="button" class="btn btn-success btn-xs" onclick="editCheklisPostTindakanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusCpTD = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusCheklisPostTindakanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.tanggal_cptd ? datefmysql(v.tanggal_cptd) : '-'}</td>
								<td class="center">
                                    ${data.pendaftaran_detail?.pasien?.nama || ''}
                                </td>
                                <td class="center">${v.perawat_1 ? v.perawat_1 : '-'}</td>
                                <td class="center">${v.perawat_2 ? v.perawat_2 : '-'}</td>
								<td class="center">
									<button type="button" class="btn btn-info btn-xs" onclick="cetakCheklisPostTindakanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									${btnEditCpTD}
									${btnHapusCpTD}
								</td>
							</tr>
						`;
						$('#table-list-cptd tbody').append(html)
					})
				}

				$('#modal_checklist_post_tindakan_diagnostik').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

	}
    // <td class="center">${v.nama_user ? v.nama_user : '-'}</td>

    function simpanCheklistPostTindakanDiagnostik() {
		if ($('#tanggal-cptd').val() === '') {
            syams_validation('#tanggal-cptd', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-cptd');
        }

		if ($('#perawatcathlab-cptd').val() === '') {
            syams_validation('#perawatcathlab-cptd', 'Perawat Cathlab Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#perawatcathlab-cptd');
        }

		if ($('#perawatruangan-cptd').val() === '') {
            syams_validation('#perawatruangan-cptd', 'Perawat Ruangan Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#perawatruangan-cptd');
        }

		var id_pendaftaran = $('#id-pendaftaran-cptd').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-cptd').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("radiologi_log/api/radiologi_log/simpan_checklist_post_tindakan_diagnostik") ?>',
			data: $('#form-checklist-post-tindakan-diagnostik').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;
					tableListCheklistPostTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-cptd').val(), $('#id-layanan-pendaftaran-cptd').val(), $('#id-pasien-cptd').val());
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				// messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
				messageCustom('Terjadi Kesalahan : '+ e.statusText +' ('+e.status+')', 'Error');
			}
		});
	}

    function hapusCheklisPostTindakanDiagnostik(id_cptd, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("radiologi_log/api/radiologi_log/hapus_checklist_post_tindakan_diagnostik") ?>',
								data: {
									id: id_cptd
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListCheklistPostTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran);

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

	function editCheklisPostTindakanDiagnostik(id_dtpc, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_cptd').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('radiologi_log/api/radiologi_log/get_edit_checklist_post_tindakan_diagnostik') ?>/id/' + id_dtpc + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetModalCheklistPostTindakanDiagnostik();
                $('#id-cptd').val(id_dtpc);
                $('#id-pendaftaran-cptd').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-cptd').val(id_layanan_pendaftaran);
                $('#id-pasien-cptd').val(data.pendaftaran_detail.pasien.id_pasien);
                if (data.list_edit_checklist_post_tindakan_diagnostik) {
                    $('#id-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.id);
                    $('#td-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.td_cptd);
                    $('#hr-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.hr_cptd);
                    $('#rr-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.rr_cptd);
                    $('#suhu-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.suhu_cptd);

					if (data.list_edit_checklist_post_tindakan_diagnostik.radical_cptd_1 === '1') { document.getElementById("radical-cptd-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik.radical_cptd_2 === '1') { document.getElementById("radical-cptd-2").checked = true; }
                    $('#radical-cptd-3').val(data.list_edit_checklist_post_tindakan_diagnostik.radical_cptd_3);

					if (data.list_edit_checklist_post_tindakan_diagnostik.hematom_cptd_1 === '1') { document.getElementById("hematom-cptd-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik.hematom_cptd_2 === '1') { document.getElementById("hematom-cptd-2").checked = true; }
                    $('#hematom-cptd-3').val(data.list_edit_checklist_post_tindakan_diagnostik.hematom_cptd_3);

                    $('#jampergelangan-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.jampergelangan_cptd);
                    $('#jamsiku-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.jamsiku_cptd);
                    $('#jampci-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.jampci_cptd);

					if (data.list_edit_checklist_post_tindakan_diagnostik.denyut_cptd_1 === '1') { document.getElementById("denyut-cptd-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik.denyut_cptd_2 === '1') { document.getElementById("denyut-cptd-2").checked = true; }
                    $('#denyut-cptd-3').val(data.list_edit_checklist_post_tindakan_diagnostik.denyut_cptd_3);

					if (data.list_edit_checklist_post_tindakan_diagnostik.hemmattom_cptd_1 === '1') { document.getElementById("hemmattom-cptd-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik.hemmattom_cptd_2 === '1') { document.getElementById("hemmattom-cptd-2").checked = true; }
                    $('#hemmattom-cptd-3').val(data.list_edit_checklist_post_tindakan_diagnostik.hemmattom_cptd_3);

                    $('#jamkaki-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.jamkaki_cptd);
                    $('#jamkitekuk-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.jamkitekuk_cptd);
                    $('#jamaptt-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.jamaptt_cptd);

					if (data.list_edit_checklist_post_tindakan_diagnostik.hasil_cptd_1 === '1') { document.getElementById("hasil-cptd-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik.hasil_cptd_2 === '1') { document.getElementById("hasil-cptd-2").checked = true; }
                    $('#hasil-cptd-3').val(data.list_edit_checklist_post_tindakan_diagnostik.hasil_cptd_3);

					if (data.list_edit_checklist_post_tindakan_diagnostik.cddvd_cptd_1 === '1') { document.getElementById("cddvd-cptd-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik.cddvd_cptd_2 === '1') { document.getElementById("cddvd-cptd-2").checked = true; }
                    $('#cddvd-cptd-3').val(data.list_edit_checklist_post_tindakan_diagnostik.cddvd_cptd_3);

					$('#tanggal-cptd').val(datefmysql(data.list_edit_checklist_post_tindakan_diagnostik.tanggal_cptd));
					$('#perawatcathlab-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.perawatcathlab_cptd);  
                    $('#s2id_perawatcathlab-cptd a .select2c-chosen').html(data.list_edit_checklist_post_tindakan_diagnostik.perawat_1);
					$('#perawatruangan-cptd').val(data.list_edit_checklist_post_tindakan_diagnostik.perawatruangan_cptd);  
                    $('#s2id_perawatruangan-cptd a .select2c-chosen').html(data.list_edit_checklist_post_tindakan_diagnostik.perawat_2);
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

    function cetakCheklisPostTindakanDiagnostik(id_cptd, id_pendaftaran, id_layanan_pendaftaran) {
        window.open('<?= base_url('radiologi_log/cetak_checklist_post_tindakan_diagnostik/') ?>' + id_cptd + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Checklist Post Tindakan Diagnostik Invasif dan Intervensi Non Bedah', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function resetModalCheklistPostTindakanDiagnostik() {
		$('#form-checklist-post-tindakan-diagnostik')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#id-cptd').val('');
		$('#id-pendaftaran-cptd').val('');
		$('#id-layanan-pendaftaran-cptd').val('');
		$('#id-pasien-cptd').val('');
		$('#perawatcathlab-cptd').val('');
		$('#s2id_perawatcathlab-cptd a .select2c-chosen').html('Silahkan Pilih..');
		$('#perawatruangan-cptd').val('');
		$('#s2id_perawatruangan-cptd a .select2c-chosen').html('Silahkan Pilih..');
	}

</script>