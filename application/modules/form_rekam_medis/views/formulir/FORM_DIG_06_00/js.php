<!-- // QCPTD -->
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

        $('#perawatcathlab-cptdq, #perawatruangan-cptdq, #dpjptb-cptdq')
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
			resetModalCheklistPersiapanTindakanDiagnostik();
		});

	})

    function lihatFORM_DIG_06_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		entriCheklistPersiapanTindakanDiagnostik(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_DIG_06_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		entriCheklistPersiapanTindakanDiagnostik(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_DIG_06_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		entriCheklistPersiapanTindakanDiagnostik(layanan.id_pendaftaran, layanan.id, action);
	}

    function entriCheklistPersiapanTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalCheklistPersiapanTindakanDiagnostik();
		$('#btn_simpan').hide();
		$('#action-cptdq').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.form-cheklis-persiapan-tindakan-diagnostik').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.form-cheklis-persiapan-tindakan-diagnostik').hide();
		}
		tableListCheklistPersiapanTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran);
	}

    function tableListCheklistPersiapanTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_cheklis_persiapan_tindakan_diagnostik').modal('show');

		$('#table-list-cptdq tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_cptdq').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-cptdq');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/get_data_cheklist_persiapan_tindakan_diagnostik') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				
				console.log(data);
				resetModalCheklistPersiapanTindakanDiagnostik();
				$('#modal_cheklis_persiapan_tindakan_diagnostik_title').html(`<b>FORM CHECKLIST PERSIAPAN TINDAKAN DIAGNOSTIK INVASIF DAN INTERVENSI NON BEDAH</b>`);
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

				$('#ruangtb-cptdq').text(data.pendaftaran_detail.layanan.bangsal);


				if (data.list_checklist_persiapan_tindakan_diagnostik.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;
                    $.each(data.list_checklist_persiapan_tindakan_diagnostik, function(i, v) {
						let btnEditCpTDq = '';
						let btnHapusCpTDq = '';

						if ($('#action-cptdq').val() !== 'lihat') {
							btnEditCpTDq = `<button type="button" class="btn btn-success btn-xs" onclick="editCheklisPersiapanTindakanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusCpTDq = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusCheklisPersiapanTindakanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.tanggal_cptdq ? datefmysql(v.tanggal_cptdq) : '-'}</td>
								<td class="center">
                                    ${data.pendaftaran_detail?.pasien?.nama || ''}
                                </td>
                                <td class="center">${v.dokter ? v.dokter : '-'}</td>
                                <td class="center">${v.perawat_1 ? v.perawat_1 : '-'}</td>
                                <td class="center">${v.perawat_2 ? v.perawat_2 : '-'}</td>
								<td class="center">
									<button type="button" class="btn btn-info btn-xs" onclick="cetakCheklisPersiapanTindakanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									${btnEditCpTDq}
									${btnHapusCpTDq}
								</td>
							</tr>
						`;
						$('#table-list-cptdq tbody').append(html)
					})
				}

				$('#modal_cheklis_persiapan_tindakan_diagnostik').modal('show');
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

    function simpanCheklistPersiapanTindakanDiagnostik() {
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
			url: '<?= base_url("radiologi_log/api/radiologi_log/simpan_checklist_persiapan_tindakan_diagnostik") ?>',
			data: $('#form-cheklis-persiapan-tindakan-diagnostik').serialize(),
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
					tableListCheklistPersiapanTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran);
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

    function hapusCheklisPersiapanTindakanDiagnostik(id_cptdq, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("radiologi_log/api/radiologi_log/hapus_checklist_persiapan_tindakan_diagnostik") ?>',
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
										tableListCheklistPersiapanTindakanDiagnostik(id_pendaftaran, id_layanan_pendaftaran);

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

	function editCheklisPersiapanTindakanDiagnostik(id_qdtpc, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_cptdq').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('radiologi_log/api/radiologi_log/get_edit_checklist_persiapan_tindakan_diagnostik') ?>/id/' + id_qdtpc + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetModalCheklistPersiapanTindakanDiagnostik();
                $('#id-cptdq').val(id_qdtpc);
                $('#id-pendaftaran-cptdq').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-cptdq').val(id_layanan_pendaftaran);
                $('#id-pasien-cptdq').val(data.pendaftaran_detail.pasien.id_pasien);
                if (data.list_edit_checklist_persiapan_tindakan_diagnostik) {
                    $('#id-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.id);

					$('#tanggal-cptdq').val(datefmysql(data.list_edit_checklist_persiapan_tindakan_diagnostik.tanggal_cptdq));

					$('#dpjptb-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.dpjptb_cptdq);  
                    $('#s2id_dpjptb-cptdq a .select2c-chosen').html(data.list_edit_checklist_persiapan_tindakan_diagnostik.dokter);

                    $('#rencana-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.rencana_cptdq);
                    $('#diagnosa-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.diagnosa_cptdq);
                    $('#tb-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.tb_cptdq);
                    $('#bb-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.bb_cptdq);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.kesadaran_cptdq_1 === '1') { document.getElementById("kesadaran-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.kesadaran_cptdq_2 === '1') { document.getElementById("kesadaran-cptdq-2").checked = true; }
                    $('#kesadaran-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.kesadaran_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.puasa_cptdq_1 === '1') { document.getElementById("puasa-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.puasa_cptdq_2 === '1') { document.getElementById("puasa-cptdq-2").checked = true; }
                    $('#puasa-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.puasa_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.cukurdaerah_cptdq_1 === '1') { document.getElementById("cukurdaerah-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.cukurdaerah_cptdq_2 === '1') { document.getElementById("cukurdaerah-cptdq-2").checked = true; }
                    $('#cukurdaerah-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.cukurdaerah_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.cdaerahkanan_cptdq_1 === '1') { document.getElementById("cdaerahkanan-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.cdaerahkanan_cptdq_2 === '1') { document.getElementById("cdaerahkanan-cptdq-2").checked = true; }
                    $('#cdaerahkanan-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.cdaerahkanan_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.ivlineterpasang_cptdq_1 === '1') { document.getElementById("ivlineterpasang-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.ivlineterpasang_cptdq_2 === '1') { document.getElementById("ivlineterpasang-cptdq-2").checked = true; }
                    $('#ivlineterpasang-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.ivlineterpasang_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.gigipalsu_cptdq_1 === '1') { document.getElementById("gigipalsu-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.gigipalsu_cptdq_2 === '1') { document.getElementById("gigipalsu-cptdq-2").checked = true; }
                    $('#gigipalsu-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.gigipalsu_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.kontaklensa_cptdq_1 === '1') { document.getElementById("kontaklensa-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.kontaklensa_cptdq_2 === '1') { document.getElementById("kontaklensa-cptdq-2").checked = true; }
                    $('#kontaklensa-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.kontaklensa_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.perhiasan_cptdq_1 === '1') { document.getElementById("perhiasan-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.perhiasan_cptdq_2 === '1') { document.getElementById("perhiasan-cptdq-2").checked = true; }
                    $('#perhiasan-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.perhiasan_cptdq_3);


                    $('#alergiobat-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.alergiobat_cptdq);
                    $('#alergizat-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.alergizat_cptdq);
                    $('#alergimakanan-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.alergimakanan_cptdq);
					
					
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.riwayatpen_cptdq_1 === '1') { document.getElementById("riwayatpen-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.riwayatpen_cptdq_2 === '1') { document.getElementById("riwayatpen-cptdq-2").checked = true; }
                    $('#riwayatpen-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.riwayatpen_cptdq_3);

                    $('#obatpengen-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.obatpengen_cptdq);
                    $('#obatobatan-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.obatobatan_cptdq);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.pasienevektif_cptdq_1 === '1') { document.getElementById("pasienevektif-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.pasienevektif_cptdq_2 === '1') { document.getElementById("pasienevektif-cptdq-2").checked = true; }
                    $('#pasienevektif-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.pasienevektif_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.pasangkater_cptdq_1 === '1') { document.getElementById("pasangkater-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.pasangkater_cptdq_2 === '1') { document.getElementById("pasangkater-cptdq-2").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.pasangkater_cptdq_3 === '1') { document.getElementById("pasangkater-cptdq-3").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.pasangkater_cptdq_4 === '1') { document.getElementById("pasangkater-cptdq-4").checked = true; }
                    $('#pasangkater-cptdq-5').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.pasangkater_cptdq_5);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.suratijin_cptdq_1 === '1') { document.getElementById("suratijin-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.suratijin_cptdq_2 === '1') { document.getElementById("suratijin-cptdq-2").checked = true; }
                    $('#suratijin-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.suratijin_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.suratpermin_cptdq_1 === '1') { document.getElementById("suratpermin-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.suratpermin_cptdq_2 === '1') { document.getElementById("suratpermin-cptdq-2").checked = true; }
                    $('#suratpermin-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.suratpermin_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.surateduk_cptdq_1 === '1') { document.getElementById("surateduk-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.surateduk_cptdq_2 === '1') { document.getElementById("surateduk-cptdq-2").checked = true; }
                    $('#surateduk-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.surateduk_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.gelang_cptdq_1 === '1') { document.getElementById("gelang-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.gelang_cptdq_2 === '1') { document.getElementById("gelang-cptdq-2").checked = true; }
                    $('#gelang-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.gelang_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.statsu_cptdq_1 === '1') { document.getElementById("statsu-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.statsu_cptdq_2 === '1') { document.getElementById("statsu-cptdq-2").checked = true; }
                    $('#statsu-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.statsu_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.therapi_cptdq_1 === '1') { document.getElementById("therapi-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.therapi_cptdq_2 === '1') { document.getElementById("therapi-cptdq-2").checked = true; }
                    $('#therapi-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.therapi_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.surattulis_cptdq_1 === '1') { document.getElementById("surattulis-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.surattulis_cptdq_2 === '1') { document.getElementById("surattulis-cptdq-2").checked = true; }
                    $('#surattulis-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.surattulis_cptdq_3);

                    $('#darahrutin-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.darahrutin_cptdq);
                    $('#urcr-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.urcr_cptdq);
                    $('#app-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.app_cptdq);
                    $('#pt-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.pt_cptdq);
                    $('#inr-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.inr_cptdq);
                    $('#gds-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.gds_cptdq);
                    $('#trop-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.trop_cptdq);
                    $('#hbsag-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.hbsag_cptdq);
                    $('#elektrik-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.elektrik_cptdq);


					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.ekg_cptdq_1 === '1') { document.getElementById("ekg-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.ekg_cptdq_2 === '1') { document.getElementById("ekg-cptdq-2").checked = true; }
                    $('#ekg-cptdq-3').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.ekg_cptdq_3);

					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.xray_cptdq_1 === '1') { document.getElementById("xray-cptdq-1").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.xray_cptdq_2 === '1') { document.getElementById("xray-cptdq-2").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.xray_cptdq_3 === '1') { document.getElementById("xray-cptdq-3").checked = true; }
					if (data.list_edit_checklist_persiapan_tindakan_diagnostik.xray_cptdq_4 === '1') { document.getElementById("xray-cptdq-4").checked = true; }
                    $('#xray-cptdq-5').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.xray_cptdq_5);

					$('#perawatcathlab-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.perawatcathlab_cptdq);  
                    $('#s2id_perawatcathlab-cptdq a .select2c-chosen').html(data.list_edit_checklist_persiapan_tindakan_diagnostik.perawat_1);
					$('#perawatruangan-cptdq').val(data.list_edit_checklist_persiapan_tindakan_diagnostik.perawatruangan_cptdq);  
                    $('#s2id_perawatruangan-cptdq a .select2c-chosen').html(data.list_edit_checklist_persiapan_tindakan_diagnostik.perawat_2);
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

    function cetakCheklisPersiapanTindakanDiagnostik(id_cptdq, id_pendaftaran, id_layanan_pendaftaran) {
        window.open('<?= base_url('radiologi_log/cetak_checklist_persiapan_tindakan_diagnostik/') ?>' + id_cptdq + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Checklist Post Tindakan Diagnostik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function resetModalCheklistPersiapanTindakanDiagnostik() {
		$('#form-cheklis-persiapan-tindakan-diagnostik')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#id-cptdq').val('');
		$('#id-pendaftaran-cptdq').val('');
		$('#id-layanan-pendaftaran-cptdq').val('');
		$('#id-pasien-cptdq').val('');
		$('#dpjptb-cptdq').val('');
		$('#s2id_dpjptb-cptdq a .select2c-chosen').html('Silahkan Pilih..');
		$('#perawatcathlab-cptdq').val('');
		$('#s2id_perawatcathlab-cptdq a .select2c-chosen').html('Silahkan Pilih..');
		$('#perawatruangan-cptdq').val('');
		$('#s2id_perawatruangan-cptdq a .select2c-chosen').html('Silahkan Pilih..');
	}

</script>