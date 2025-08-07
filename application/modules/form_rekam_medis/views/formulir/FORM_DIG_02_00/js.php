<!-- // PPPDJ -->
<script>
    $(function() {		
        $('#tanggal-pppdj').datetimepicker({
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

        // $('#jam-pppdj')
		// .on('click', function() {
		// 	$(this).timepicker({
		// 		format: 'HH:mm',
		// 		showInputs: false,
		// 		showMeridian: false
		// 	});
		// })

        $('#dokter-pemeriksa-pppdj')
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
			resetModalPppDiagnostikJantung();
		});

	})

    function lihatFORM_DIG_02_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		entriPPPDiagnostikJAntung(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_DIG_02_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		entriPPPDiagnostikJAntung(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_DIG_02_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		entriPPPDiagnostikJAntung(layanan.id_pendaftaran, layanan.id, action);
	}

    function entriPPPDiagnostikJAntung(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalPppDiagnostikJantung();
		$('#btn_simpan').hide();
		$('#action-pppdj').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.form-ppp-diagnostik-jantung').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.form-ppp-diagnostik-jantung').hide();
		}
		tableListPppDiagnostikJantung(id_pendaftaran, id_layanan_pendaftaran);
	}

    function tableListPppDiagnostikJantung(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_ppp_diagnostik_jantung').modal('show');

		$('#table-list-pppdj tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_pppdj').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-pppdj');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/get_data_ppp_diagnostik_jantung') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				
				console.log(data);
				resetModalPppDiagnostikJantung();
				$('#modal-ppp-diagnostik-jantung-title').html(`<b>FORM FORMULIR PERMINTAAN PEMERIKSAAN PENUNJANG DIAGNOSTIK JANTUNG</b>`);
				$('#id-pendaftaran-pppdj').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-pppdj').val(id_layanan_pendaftaran);
				$('#id-pasien-pppdj').val(data.pendaftaran_detail.pasien.id_pasien);   
				$('#namapasien-pppdj').text(data.pendaftaran_detail.pasien.nama); // Pastikan data ini tersedia
				// $('#usia-pppdj').text(data.pendaftaran_detail.pasien.usia); // Pastikan data ini tersedia
				$('#jeniskelamin-pppdj').text(data.pendaftaran_detail.pasien.kelamin); // Pastikan data ini tersedia
				$('#norm-pppdj').text(data.pendaftaran_detail.pasien.no_rm); // Pastikan data ini tersedia
				$('#ruang-pppdj').text(data.pendaftaran_detail.layanan.bangsal); // Pastikan data ini tersedia

				let tglLahirStrg = data.pendaftaran_detail.pasien.tanggal_lahir;
				if (tglLahirStrg) {
				let [day, month, year] = tglLahirStrg.includes('/')
					? tglLahirStrg.split('/').map(Number)
					: tglLahirStrg.split('-').reverse().map(Number); // fallback kalau formatnya yyyy-mm-dd

				let birthDate = new Date(year, month - 1, day);
				let today = new Date();

				let years = today.getFullYear() - birthDate.getFullYear();
				let months = today.getMonth() - birthDate.getMonth();
				let days = today.getDate() - birthDate.getDate();

				if (days < 0) {
					months--;
					days += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
				}

				if (months < 0) {
					years--;
					months += 12;
				}

				$('#usia-pppdj').text(`${years} tahun ${months} bulan ${days} hari`);
				}

				if (data.list_ppp_diagnostik_jantung.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;
                    $.each(data.list_ppp_diagnostik_jantung, function(i, v) {
						let btnEditPppdj = '';
						let btnHapusPppdj = '';

						if ($('#action-pppdj').val() !== 'lihat') {
							btnEditPppdj = `<button type="button" class="btn btn-success btn-xs" onclick="editPppDiagnostikJanTung(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusPppdj = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusPppDiagnostikJanTung(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.tanggal_pppdj ? datefmysql(v.tanggal_pppdj) : '-'}</td>
								<td class="center">
									${data.pendaftaran_detail?.pasien?.nama || ''}
								</td>

                                <td class="center">${v.dokter_pemeriksa ? v.dokter_pemeriksa : '-'}</td>
								<td class="center">
									<button type="button" class="btn btn-info btn-xs" onclick="cetakPppDiagnostikJanTung(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									${btnEditPppdj}
									${btnHapusPppdj}
								</td>
							</tr>
						`;
						$('#table-list-pppdj tbody').append(html)
					})
				}

				$('#modal_ppp_diagnostik_jantung').modal('show');
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

    function simpanPppDiagnostikJantung() {
		if ($('#tanggal-pppdj').val() === '') {
            syams_validation('#tanggal-pppdj', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-pppdj');
        }

		if ($('#dokter-pemeriksa-pppdj').val() === '') {
            syams_validation('#dokter-pemeriksa-pppdj', 'Dokter Pemeriksa Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-pemeriksa-pppdj');
        }

		var id_pendaftaran = $('#id-pendaftaran-pppdj').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-pppdj').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("radiologi_log/api/radiologi_log/simpan_ppp_diagnostik_jantung") ?>',
			data: $('#form-ppp-diagnostik-jantung').serialize(),
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
					tableListPppDiagnostikJantung(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-pppdj').val(), $('#id-layanan-pendaftaran-pppdj').val(), $('#id-pasien-pppdj').val());
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

    function hapusPppDiagnostikJanTung(id_pppdj, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("radiologi_log/api/radiologi_log/hapus_ppp_diagnostik_jantung") ?>',
								data: {
									id: id_pppdj
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListPppDiagnostikJantung(id_pendaftaran, id_layanan_pendaftaran);

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

	function editPppDiagnostikJanTung(id_jdppp, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_pppdj').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('radiologi_log/api/radiologi_log/get_edit_ppp_diagnostik_jantung') ?>/id/' + id_jdppp + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetModalPppDiagnostikJantung();
                $('#id-pppdj').val(id_jdppp);
                $('#id-pendaftaran-pppdj').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-pppdj').val(id_layanan_pendaftaran);
                $('#id-pasien-pppdj').val(data.pendaftaran_detail.pasien.id_pasien);
                if (data.list_edit_ppp_diagnostik_jantung) {
                    $('#id-pppdj').val(data.list_edit_ppp_diagnostik_jantung.id);
					if (data.list_edit_ppp_diagnostik_jantung.ekg_pppdj === '1') { document.getElementById("ekg-pppdj").checked = true; }
					if (data.list_edit_ppp_diagnostik_jantung.ekokardiorafi_pppdj === '1') { document.getElementById("ekokardiorafi-pppdj").checked = true; }
					if (data.list_edit_ppp_diagnostik_jantung.carotis_pppdj === '1') { document.getElementById("carotis-pppdj").checked = true; }
					if (data.list_edit_ppp_diagnostik_jantung.tradmil_pppdj === '1') { document.getElementById("tradmil-pppdj").checked = true; }
                    $('#lain-pppdj').val(data.list_edit_ppp_diagnostik_jantung.lain_pppdj);
					$('#diagnosa-pppdj').val(data.list_edit_ppp_diagnostik_jantung.diagnosa_pppdj);
					$('#tanggal-pppdj').val(datefmysql(data.list_edit_ppp_diagnostik_jantung.tanggal_pppdj));
					$('#dokter-pemeriksa-pppdj').val(data.list_edit_ppp_diagnostik_jantung.dokter_pemeriksa_pppdj);  
                    $('#s2id_dokter-pemeriksa-pppdj a .select2c-chosen').html(data.list_edit_ppp_diagnostik_jantung.dokter_pemeriksa);
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

    function cetakPppDiagnostikJanTung(id_pppdj, id_pendaftaran, id_layanan_pendaftaran) {
        window.open('<?= base_url('radiologi_log/cetak_ppp_diagnostik_jantung/') ?>' + id_pppdj + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Formulir Permintaan Pemeriksaan Penunjang Diagnostik Jantung', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function resetModalPppDiagnostikJantung() {
		$('#form-ppp-diagnostik-jantung')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#id-pppdj').val('');
		$('#id-pendaftaran-pppdj').val('');
		$('#id-layanan-pendaftaran-pppdj').val('');
		$('#id-pasien-pppdj').val('');
		$('#dokter-pemeriksa-pppdj').val('');
		$('#s2id_dokter-pemeriksa-pppdj a .select2c-chosen').html('Silahkan Pilih..');
	}

</script>