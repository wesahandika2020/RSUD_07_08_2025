<!-- // CPTDQ -->
<script>
    $(function() {		
        $('#tanggal-cptdq').datetimepicker({
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

        // $('#jampergelangan-cptdq, #jamsiku-cptdq, #jampci-cptdq, #jamkaki-cptdq, #jamkitekuk-cptdq, #jamaptt-cptdq')
		// .on('click', function() {
		// 	$(this).timepicker({
		// 		format: 'HH:mm',
		// 		showInputs: false,
		// 		showMeridian: false
		// 	});
		// })

        $('#jampergelangan-cptdq, #jamsiku-cptdq, #jampci-cptdq, #jamkaki-cptdq, #jamkitekuk-cptdq, #jamaptt-cptdq').on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false,
                defaultTime: 'current' // ⬅️ Ini penting!
            });
        });


        $('#perawatcathlab-cptdq, #perawatruangan-cptdq')
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
			resetModalCheklistPostTindakanDiagnostikQembar();
		});

	})

    function lihatFORM_DIG_06_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		entriCheklistPostTindakanDiagnostikQembar(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_DIG_06_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		entriCheklistPostTindakanDiagnostikQembar(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_DIG_06_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		entriCheklistPostTindakanDiagnostikQembar(layanan.id_pendaftaran, layanan.id, action);
	}

    function entriCheklistPostTindakanDiagnostikQembar(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalCheklistPostTindakanDiagnostikQembar();
		$('#btn_simpan').hide();
		$('#action-cptdq').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.form-checklist-post-tindakan-diagnostik-qembar').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.form-checklist-post-tindakan-diagnostik-qembar').hide();
		}
		tableListCheklistPostTindakanDiagnostikQembar(id_pendaftaran, id_layanan_pendaftaran);
	}

    function tableListCheklistPostTindakanDiagnostikQembar(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_checklist_post_tindakan_diagnostik_qembar').modal('show');

		$('#table-list-cptdq tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_cptdq').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-cptdq');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/get_data_cheklist_post_tindakan_diagnostik_qembar') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				
				console.log(data);
				resetModalCheklistPostTindakanDiagnostikQembar();
				$('#modal_checklist_post_tindakan_diagnostik_qembar_title').html(`<b>FORM CHECKLIST POST TINDAKAN DIAGNOSTIK</b>`);
				$('#id-pendaftaran-cptdq').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-cptdq').val(id_layanan_pendaftaran);
				$('#id-pasien-cptdq').val(data.pendaftaran_detail.pasien.id_pasien);   
				$('#nama-pasien-cptdq').text(data.pendaftaran_detail.pasien.nama);
				$('#norm-cptdq').text(data.pendaftaran_detail.pasien.no_rm);

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

                $('#tanggal-lahir-cptdq').text(
                    `${data.pendaftaran_detail.pasien.tempat_lahir || '-'}, ${formatTanggalLahirUsia(data.pendaftaran_detail.pasien.tanggal_lahir)}`
                );

				$('#jenis-kelamin-cptdq').text(data.pendaftaran_detail.pasien.kelamin);

                $('#ruang-cptdq').text(
					data.pendaftaran_detail.layanan.bangsal + 
					' kelas ' + data.pendaftaran_detail.layanan.kelas + 
					' ruang ' + data.pendaftaran_detail.layanan.no_ruang + 
					' No. Bed ' + data.pendaftaran_detail.layanan.no_bed
				);


				if (data.list_checklist_post_tindakan_diagnostik_qembar.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;
                    $.each(data.list_checklist_post_tindakan_diagnostik_qembar, function(i, v) {
						let btnEditCpTDq = '';
						let btnHapusCpTDq = '';

						if ($('#action-cptdq').val() !== 'lihat') {
							btnEditCpTDq = `<button type="button" class="btn btn-success btn-xs" onclick="editCheklisPostTindakanDiagnostikQembar(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusCpTDq = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusCheklisPostTindakanDiagnostikQembar(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.tanggal_cptdq ? datefmysql(v.tanggal_cptdq) : '-'}</td>
								<td class="center">
                                    ${data.pendaftaran_detail?.pasien?.nama || ''}
                                </td>
                                <td class="center">${v.perawat_1 ? v.perawat_1 : '-'}</td>
                                <td class="center">${v.perawat_2 ? v.perawat_2 : '-'}</td>
								<td class="center">
									<button type="button" class="btn btn-info btn-xs" onclick="cetakCheklisPostTindakanDiagnostikQembar(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									${btnEditCpTDq}
									${btnHapusCpTDq}
								</td>
							</tr>
						`;
						$('#table-list-cptdq tbody').append(html)
					})
				}

				$('#modal_checklist_post_tindakan_diagnostik_qembar').modal('show');
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

    function simpanCheklistPostTindakanDiagnostikQembar() {
		if ($('#tanggal-cptdq').val() === '') {
            syams_validation('#tanggal-cptdq', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-cptdq');
        }

		if ($('#perawatcathlab-cptdq').val() === '') {
            syams_validation('#perawatcathlab-cptdq', 'Perawat Cathlab Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#perawatcathlab-cptdq');
        }

		if ($('#perawatruangan-cptdq').val() === '') {
            syams_validation('#perawatruangan-cptdq', 'Perawat Ruangan Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#perawatruangan-cptdq');
        }

		var id_pendaftaran = $('#id-pendaftaran-cptdq').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-cptdq').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("radiologi_log/api/radiologi_log/simpan_checklist_post_tindakan_diagnostik_qembar") ?>',
			data: $('#form-checklist-post-tindakan-diagnostik-qembar').serialize(),
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
					tableListCheklistPostTindakanDiagnostikQembar(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-cptdq').val(), $('#id-layanan-pendaftaran-cptdq').val(), $('#id-pasien-cptdq').val());
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

    function hapusCheklisPostTindakanDiagnostikQembar(id_cptdq, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("radiologi_log/api/radiologi_log/hapus_checklist_post_tindakan_diagnostik_qembar") ?>',
								data: {
									id: id_cptdq
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListCheklistPostTindakanDiagnostikQembar(id_pendaftaran, id_layanan_pendaftaran);

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

	function editCheklisPostTindakanDiagnostikQembar(id_qdtpc, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_cptdq').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('radiologi_log/api/radiologi_log/get_edit_checklist_post_tindakan_diagnostik_qembar') ?>/id/' + id_qdtpc + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetModalCheklistPostTindakanDiagnostikQembar();
                $('#id-cptdq').val(id_qdtpc);
                $('#id-pendaftaran-cptdq').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-cptdq').val(id_layanan_pendaftaran);
                $('#id-pasien-cptdq').val(data.pendaftaran_detail.pasien.id_pasien);
                if (data.list_edit_checklist_post_tindakan_diagnostik_qembar) {
                    $('#id-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.id);
                    $('#td-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.td_cptdq);
                    $('#hr-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.hr_cptdq);
                    $('#rr-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.rr_cptdq);
                    $('#suhu-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.suhu_cptdq);

					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.radical_cptdq_1 === '1') { document.getElementById("radical-cptdq-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.radical_cptdq_2 === '1') { document.getElementById("radical-cptdq-2").checked = true; }
                    $('#radical-cptdq-3').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.radical_cptdq_3);

					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.hematom_cptdq_1 === '1') { document.getElementById("hematom-cptdq-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.hematom_cptdq_2 === '1') { document.getElementById("hematom-cptdq-2").checked = true; }
                    $('#hematom-cptdq-3').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.hematom_cptdq_3);

                    $('#jampergelangan-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.jampergelangan_cptdq);
                    $('#jamsiku-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.jamsiku_cptdq);
                    $('#jampci-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.jampci_cptdq);

					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.denyut_cptdq_1 === '1') { document.getElementById("denyut-cptdq-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.denyut_cptdq_2 === '1') { document.getElementById("denyut-cptdq-2").checked = true; }
                    $('#denyut-cptdq-3').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.denyut_cptdq_3);

					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.hemmattom_cptdq_1 === '1') { document.getElementById("hemmattom-cptdq-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.hemmattom_cptdq_2 === '1') { document.getElementById("hemmattom-cptdq-2").checked = true; }
                    $('#hemmattom-cptdq-3').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.hemmattom_cptdq_3);

                    $('#jamkaki-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.jamkaki_cptdq);
                    $('#jamkitekuk-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.jamkitekuk_cptdq);
                    $('#jamaptt-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.jamaptt_cptdq);

					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.hasil_cptdq_1 === '1') { document.getElementById("hasil-cptdq-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.hasil_cptdq_2 === '1') { document.getElementById("hasil-cptdq-2").checked = true; }
                    $('#hasil-cptdq-3').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.hasil_cptdq_3);

					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.cddvd_cptdq_1 === '1') { document.getElementById("cddvd-cptdq-1").checked = true; }
					if (data.list_edit_checklist_post_tindakan_diagnostik_qembar.cddvd_cptdq_2 === '1') { document.getElementById("cddvd-cptdq-2").checked = true; }
                    $('#cddvd-cptdq-3').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.cddvd_cptdq_3);

					$('#tanggal-cptdq').val(datefmysql(data.list_edit_checklist_post_tindakan_diagnostik_qembar.tanggal_cptdq));
					$('#perawatcathlab-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.perawatcathlab_cptdq);  
                    $('#s2id_perawatcathlab-cptdq a .select2c-chosen').html(data.list_edit_checklist_post_tindakan_diagnostik_qembar.perawat_1);
					$('#perawatruangan-cptdq').val(data.list_edit_checklist_post_tindakan_diagnostik_qembar.perawatruangan_cptdq);  
                    $('#s2id_perawatruangan-cptdq a .select2c-chosen').html(data.list_edit_checklist_post_tindakan_diagnostik_qembar.perawat_2);
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

    function cetakCheklisPostTindakanDiagnostikQembar(id_cptdq, id_pendaftaran, id_layanan_pendaftaran) {
        window.open('<?= base_url('radiologi_log/cetak_checklist_post_tindakan_diagnostik_qembar/') ?>' + id_cptdq + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Checklist Post Tindakan Diagnostik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function resetModalCheklistPostTindakanDiagnostikQembar() {
		$('#form-checklist-post-tindakan-diagnostik-qembar')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#id-cptdq').val('');
		$('#id-pendaftaran-cptdq').val('');
		$('#id-layanan-pendaftaran-cptdq').val('');
		$('#id-pasien-cptdq').val('');
		$('#perawatcathlab-cptdq').val('');
		$('#s2id_perawatcathlab-cptdq a .select2c-chosen').html('Silahkan Pilih..');
		$('#perawatruangan-cptdq').val('');
		$('#s2id_perawatruangan-cptdq a .select2c-chosen').html('Silahkan Pilih..');
	}

</script>