<!-- // LHOPI -->
<script>

    $('#btn-expand-all-lhopi').click(function() {
        $('.multi-collapse').addClass('show');
    });

    $('#btn-collapse-all-lhopi').click(function() {
        $('.multi-collapse').removeClass('show');
    });

	$(function() {

		$('#tanggal-lhopi').datetimepicker({
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

		$('#tanggal-jam-rprdl')
			.datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) {
				if ($(i).attr('readonly')) {
					return false;
				}
			}
		});


		$('#btn_reset').on('click', function() {
			resetModalLembarHandOverPasien();
			resetModalRencanaPasienRujukanDariLuar();
		});

		// GABUNGAN NAMA DOKTER, PERAWAT, BIDAN JANGAN DI HAPUS
		$('#dpjp-lhopi, #mengoverkan-lhopi, #menerima-lhopi').select2c({
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

	})

	function lihatFORM_KEP_121_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		getLembarHandOverPasienIGD(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_KEP_121_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		getLembarHandOverPasienIGD(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_KEP_121_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		getLembarHandOverPasienIGD(layanan.id_pendaftaran, layanan.id, action);
	}

	function getLembarHandOverPasienIGD(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalLembarHandOverPasien();
		resetModalRencanaPasienRujukanDariLuar();

		$('#btn_simpan').hide();
		$('#action-lhopi').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.lembar-hand-over-pasien-igd').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.lembar-hand-over-pasien-igd').hide();
		}

		tableListLembarHandOverPasienIGD(id_pendaftaran, id_layanan_pendaftaran);
		tableListRencanaPasienRujukanDariLuar(id_pendaftaran, id_layanan_pendaftaran);
	}

	function tableListLembarHandOverPasienIGD(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_lembar_hand_over_pasien_igd').modal('show');

		$('#table-list-lhopi tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_lhopi').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-lhopi, #dpjp-lhopi, #mengoverkan-lhopi, #menerima-lhopi');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/get_lembar_hand_over_pasien_igd_rsudtng') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetModalLembarHandOverPasien();
				$('modal-lembar-hand-over-pasien-igd-title').html(`<b>FORM LEMBAR HAND OVER PASIEN IGD RSUD KOTA TANGERANG</b>`);

				$('#id-pendaftaran-lhopi').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-lhopi').val(id_layanan_pendaftaran);
				$('#id-pasien-lhopi').val(data.pendaftaran_detail.pasien.id_pasien);     
				$('#nama-pasien-lhopi').text(data.pendaftaran_detail.pasien.nama);
				$('#no-rm-pasien-lhopi').text(data.pendaftaran_detail.pasien.id_pasien);
				$('#jenis-kelamin-pasien-lhopi').text(data.pendaftaran_detail.pasien.kelamin);
                
				let tanggalLahir = new Date(data.pendaftaran_detail.pasien.tanggal_lahir);
				let formattedDate = tanggalLahir.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
				$('#tgl-lahir-pasien-lhopi').text(formattedDate);
                $('#namapasien-lhopi').text(data.pendaftaran_detail.pasien.nama);

				// if (data.list_lembar_hand_over_pasien_igd_rsudtng.length !== 0) {
				// 	var numberData = 1;
				// 		// let aksiButton = action;
				// 		$.each(data.list_lembar_hand_over_pasien_igd_rsudtng, function(i, v) {
				// 			let btnEditLembarHandOverPasienIgd = '';
				// 			let btnHapusLembarHandOverPasienIgd = '';

				// 			if ($('#action-lhopi').val() !== 'lihat') {
				// 				btnEditLembarHandOverPasienIgd = `<button type="button" class="btn btn-success btn-xs" onclick="editLembarHandOverPasienIgd(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
				// 				btnHapusLembarHandOverPasienIgd = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusLembarHandOverPasienIgd(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
				// 			}

				// 			let html = /* html */ `
				// 				<tr>
				// 					<td class="center">${numberData++}</td>
				// 					<td class="center">${datefmysql(v.tanggal_lhopi)}</td>
                //                     <td class="center">${v.shift_lhopi ? v.shift_lhopi : '-'}</td>    
                //                     <td class="center">${v.bed_lhopi ? v.bed_lhopi : '-'}</td>                                 
                //                     <td class="center">${data.pendaftaran_detail.pasien.nama}</td>                                 
                //                     <td class="center">${v.diagnosa_lhopi ? v.diagnosa_lhopi : '-'}</td>    
                //                     <td class="center">${v.rencana_tatalaksana_lhopi ? v.rencana_tatalaksana_lhopi : '-'}</td>    
                //                     <td class="center">${v.keterangan_lhopi ? v.keterangan_lhopi : '-'}</td>    
                //                     <td class="center">${v.mengoverkan ? v.mengoverkan : '-'}</td>    
                //                     <td class="center">${v.menerima ? v.menerima : '-'}</td>    
                //                     <td class="center">${v.nama_dokter_lhopi ? v.nama_dokter_lhopi : '-'}</td>    
				// 					<td class="center">${v.nama_user_h}</td>
				// 					<td class="center">
				// 						<button type="button" class="btn btn-primary btn-xxs" onclick="lihatLembarHandOverPasienIgd(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-eye m-r-5"></i>Lihat</button>
                //                         <div style="display: flex; gap: 10px;">
                //                             ${btnEditLembarHandOverPasienIgd}
                //                             ${btnHapusLembarHandOverPasienIgd}
                //                         </div>
                //                     </td>
				// 				</tr>
				// 			`;
				// 		$('#table-list-lhopi tbody').append(html)
				// 	})
				// }

				if (data.list_lembar_hand_over_pasien_igd_rsudtng.length !== 0) {
					var numberData = 1;
					$.each(data.list_lembar_hand_over_pasien_igd_rsudtng, function(i, v) {
						let btnEditLembarHandOverPasienIgd = '';
						let btnHapusLembarHandOverPasienIgd = '';

						if ($('#action-lhopi').val() !== 'lihat') {
							btnEditLembarHandOverPasienIgd = `<button type="button" class="btn btn-success btn-xs" onclick="editLembarHandOverPasienIgd(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusLembarHandOverPasienIgd = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusLembarHandOverPasienIgd(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${datefmysql(v.tanggal_lhopi)}</td>
								<td class="center">${v.shift_lhopi ? v.shift_lhopi : '-'}</td>    
								<td class="center">${v.bed_lhopi ? v.bed_lhopi : '-'}</td>                                 
								<td class="center">${data.pendaftaran_detail.pasien.nama}</td>                                 
								<td class="center">${v.diagnosa_lhopi ? v.diagnosa_lhopi : '-'}</td>    
								<td class="center">${v.rencana_tatalaksana_lhopi ? v.rencana_tatalaksana_lhopi : '-'}</td>    
								<td class="center">${v.keterangan_lhopi ? v.keterangan_lhopi : '-'}</td>    
								<td class="center">${v.mengoverkan ? v.mengoverkan : '-'}</td>    
								<td class="center">${v.menerima ? v.menerima : '-'}</td>    
								<td class="center">${v.nama_dokter_lhopi ? v.nama_dokter_lhopi : '-'}</td>    
								<td class="center">${v.nama_user_h}</td>
								<td class="center">
									<div style="display: flex; gap: 5px; justify-content: center;">
										<button type="button" class="btn btn-primary btn-xxs" onclick="lihatLembarHandOverPasienIgd(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-eye m-r-5"></i>Lihat</button>
										${btnEditLembarHandOverPasienIgd}
										${btnHapusLembarHandOverPasienIgd}
									</div>
								</td>
							</tr>
						`;
						$('#table-list-lhopi tbody').append(html)
					})
				}


				$('#modal_lembar_hand_over_pasien_igd').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function simpanLembarHandOverPasien() {

		if ($('#shift-lhopi').val() === null || $('#shift-lhopi').val() === '') {
			syams_validation('#shift-lhopi', 'Anda belum mengisi shift.!!!');
			return false;
		} else {
			syams_validation_remove('#shift-lhopi');
		}

		if ($('#dpjp-lhopi').val() === '') {
			syams_validation('#dpjp-lhopi', 'Dokter harus diisi.');
			return false;
		} else {
			syams_validation_remove('#dpjp-lhopi');
		}
		if ($('#mengoverkan-lhopi').val() === '') {
			syams_validation('#mengoverkan-lhopi', 'Yang Mengoverkan harus diisi.');
			return false;
		} else {
			syams_validation_remove('#mengoverkan-lhopi');
		}
		if ($('#menerima-lhopi').val() === '') {
			syams_validation('#menerima-lhopi', 'Yang Menerima harus diisi.');
			return false;
		} else {
			syams_validation_remove('#menerima-lhopi');
		}

		if ($('#tanggal-lhopi').val() === '') {
			syams_validation('#tanggal-lhopi', 'Tanggal Belum diisi.');
			return false;
		} else {
			syams_validation_remove('#tanggal-lhopi');
		}

		var id_pendaftaran = $('#id-pendaftaran-lhopi').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-lhopi').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("radiologi_log/api/radiologi_log/simpan_lembar_hand_over_pasien") ?>',
			data: $('#lembar-hand-over-pasien-igd').serialize(),
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

					tableListLembarHandOverPasienIGD(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-lhopi').val(), $('#id-layanan-pendaftaran-lhopi').val(), $('#id-pasien-lhopi').val());
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

	function hapusLembarHandOverPasienIgd(id_lhopi, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("radiologi_log/api/radiologi_log/hapus_lembar_hand_over_pasien_igd") ?>',
								data: {
									id: id_lhopi
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListLembarHandOverPasienIGD(id_pendaftaran, id_layanan_pendaftaran);

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

    function editLembarHandOverPasienIgd(id_ipohl, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_lhopi').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('radiologi_log/api/radiologi_log/edit_lembar_hand_over_pasien_igd') ?>/id/' + id_ipohl + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetModalLembarHandOverPasien();
                $('#id-lhopi').val(id_ipohl);
                $('#id-pendaftaran-lhopi').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-lhopi').val(id_layanan_pendaftaran);
                $('#id-pasien-lhopi').val(data.pendaftaran_detail.pasien.id_pasien);
                $('#namapasien-lhopi').val(data.pendaftaran_detail.pasien.nama);
                if (data.edit_lembar_hand) {
                    $('#id-lhopi').val(data.edit_lembar_hand.id);    
                    $('#shift-lhopi').val(data.edit_lembar_hand.shift_lhopi);
                    $('#bed-lhopi').val(data.edit_lembar_hand.bed_lhopi);
                    $('#diagnosa-lhopi').val(data.edit_lembar_hand.diagnosa_lhopi);
                    $('#rencana-tatalaksana-lhopi').val(data.edit_lembar_hand.rencana_tatalaksana_lhopi);
                    $('#keterangan-lhopi').val(data.edit_lembar_hand.keterangan_lhopi);
                    $('#tanggal-lhopi').val(datefmysql(data.edit_lembar_hand.tanggal_lhopi));
                    $('#dpjp-lhopi').val(data.edit_lembar_hand.dpjp_lhopi);
                    $('#s2id_dpjp-lhopi a .select2c-chosen').html(data.edit_lembar_hand.nama_dokter);	
                    $('#mengoverkan-lhopi').val(data.edit_lembar_hand.mengoverkan_lhopi);
                    $('#s2id_mengoverkan-lhopi a .select2c-chosen').html(data.edit_lembar_hand.nama_mengoverkan);
                    $('#menerima-lhopi').val(data.edit_lembar_hand.menerima_lhopi);
                    $('#s2id_menerima-lhopi a .select2c-chosen').html(data.edit_lembar_hand.nama_menerima);								
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

	function lihatLembarHandOverPasienIgd(id_ipohl, id_pendaftaran, id_layanan_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/edit_lembar_hand_over_pasien_igd') ?>/id/' + id_ipohl + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetModalLembarHandOverPasien();
				$('#id-lhopi').val(id_ipohl);
				$('#id-pendaftaran-lhopi').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-lhopi').val(id_layanan_pendaftaran);
				$('#id-pasien-lhopi').val(data.pendaftaran_detail.pasien.id_pasien);
				$('#namapasien-lhopi').val(data.pendaftaran_detail.pasien.nama);
				if (data.edit_lembar_hand) {
					$('#id-lhopi').val(data.edit_lembar_hand.id);    
					$('#shift-lhopi').val(data.edit_lembar_hand.shift_lhopi);
					$('#bed-lhopi').val(data.edit_lembar_hand.bed_lhopi);
					$('#diagnosa-lhopi').val(data.edit_lembar_hand.diagnosa_lhopi);
					$('#rencana-tatalaksana-lhopi').val(data.edit_lembar_hand.rencana_tatalaksana_lhopi);
					$('#keterangan-lhopi').val(data.edit_lembar_hand.keterangan_lhopi);
					$('#tanggal-lhopi').val(datefmysql(data.edit_lembar_hand.tanggal_lhopi));
					$('#dpjp-lhopi').val(data.edit_lembar_hand.dpjp_lhopi);
					$('#s2id_dpjp-lhopi a .select2c-chosen').html(data.edit_lembar_hand.nama_dokter);	
					$('#mengoverkan-lhopi').val(data.edit_lembar_hand.mengoverkan_lhopi);
					$('#s2id_mengoverkan-lhopi a .select2c-chosen').html(data.edit_lembar_hand.nama_mengoverkan);
					$('#menerima-lhopi').val(data.edit_lembar_hand.menerima_lhopi);
					$('#s2id_menerima-lhopi a .select2c-chosen').html(data.edit_lembar_hand.nama_menerima);								
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

	function resetModalLembarHandOverPasien() {
		$('#lembar-hand-over-pasien-igd')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#dpjp-lhopi').val('');
		$('#s2id_dpjp-lhopi a .select2c-chosen').html('Silahkan Pilih..');
		$('#mengoverkan-lhopi').val('');
		$('#s2id_mengoverkan-lhopi a .select2c-chosen').html('Silahkan Pilih..');
		$('#menerima-lhopi').val('');
		$('#s2id_menerima-lhopi a .select2c-chosen').html('Silahkan Pilih..');
		$('#id-lhopi').val('');
		$('#id-pendaftaran-lhopi').val('');
		$('#id-layanan-pendaftaran-lhopi').val('');
		$('#id-pasien-lhopi').val('');
	}





    function tableListRencanaPasienRujukanDariLuar(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_lembar_hand_over_pasien_igd').modal('show');

		$('#table-list-rprdl tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_rprdl').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-jam-rprdl');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/get_rencana_pasien_rujukan_dari_luar') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
		        resetModalRencanaPasienRujukanDariLuar();
				$('#id-pendaftaran-lhopi').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-lhopi').val(id_layanan_pendaftaran);
				$('#id-pasien-lhopi').val(data.pendaftaran_detail.pasien.id_pasien);
                $('#piyeetokihh-nama').text(data.pendaftaran_detail.pasien.nama);

				if (data.list_rencana_rujukan_pasien_dari_luar_rsudtng.length !== 0) {
					var numberData = 1;
					$.each(data.list_rencana_rujukan_pasien_dari_luar_rsudtng, function(i, v) {
						let btnEditRencanaRujukanPasienDariLuar = '';
						let btnHapusRencanaRujukanPasienDariLuar = '';

						if ($('#action-lhopi').val() !== 'lihat') {
							btnEditRencanaRujukanPasienDariLuar = `<button type="button" class="btn btn-success btn-xs" onclick="editRencanaRujukanPasienDariLuar(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusRencanaRujukanPasienDariLuar = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusRencanaRujukanPasienDariLuar(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.tanggal_jam_rprdl ? datetimefmysql(v.tanggal_jam_rprdl) : '-'}</td>
								<td class="center">${data.pendaftaran_detail.pasien.nama}</td>     
								<td class="center">${v.asalrujukan_rprdl ? v.asalrujukan_rprdl : '-'}</td>    
								<td class="center">${v.diagnosis_rprdl ? v.diagnosis_rprdl : '-'}</td>    
								<td class="center">${v.rencana_rprdl ? v.rencana_rprdl : '-'}</td>    
								<td class="center">${v.nama_user}</td>
								<td class="center">
									<div style="display: flex; gap: 5px; justify-content: center;">
										<button type="button" class="btn btn-primary btn-xxs" onclick="lihatRencanaRujukanPasienDariLuar(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-eye m-r-5"></i>Lihat</button>
										${btnEditRencanaRujukanPasienDariLuar}
										${btnHapusRencanaRujukanPasienDariLuar}
									</div>
								</td>
							</tr>
						`;
						$('#table-list-rprdl tbody').append(html)
					})
				}


				$('#modal_lembar_hand_over_pasien_igd').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function simpanRencanaPasienRujukanDariLuar() {
		if ($('#tanggal-jam-rprdl').val() === '') {
            syams_validation('#tanggal-jam-rprdl', 'Tanggal Jam Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-jam-rprdl');
        }

		var id_pendaftaran = $('#id-pendaftaran-lhopi').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-lhopi').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("radiologi_log/api/radiologi_log/simpan_rencana_pasien_rujukan_dari_luar") ?>',
			data: $('#lembar-hand-over-pasien-igd').serialize(),
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

					tableListRencanaPasienRujukanDariLuar(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-lhopi').val(), $('#id-layanan-pendaftaran-lhopi').val(), $('#id-pasien-lhopi').val());
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

    function hapusRencanaRujukanPasienDariLuar(id_lhopi, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("radiologi_log/api/radiologi_log/hapus_rencana_rujukan_pasien_dari_luar") ?>',
								data: {
									id: id_lhopi
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListRencanaPasienRujukanDariLuar(id_pendaftaran, id_layanan_pendaftaran);

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

    function editRencanaRujukanPasienDariLuar(id_rrpdr, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_rprdl').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('radiologi_log/api/radiologi_log/edit_rencana_rujukan_pasien_dari_luar') ?>/id/' + id_rrpdr + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetModalRencanaPasienRujukanDariLuar();
                $('#id-lhopi').val(id_rrpdr);
                $('#id-pendaftaran-lhopi').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-lhopi').val(id_layanan_pendaftaran);
                $('#id-pasien-lhopi').val(data.pendaftaran_detail.pasien.id_pasien);
                $('#piyeetokihh-nama').val(data.pendaftaran_detail.pasien.nama);
                if (data.edit_rencana_rujukan) {
                    $('#id-lhopi').val(data.edit_rencana_rujukan.id);
                    $('#tanggal-jam-rprdl').val((data.edit_rencana_rujukan.tanggal_jam_rprdl !== null ? datetimefmysql(data.edit_rencana_rujukan.tanggal_jam_rprdl) : ''));   
                    $('#asalrujukan-rprdl').val(data.edit_rencana_rujukan.asalrujukan_rprdl);
                    $('#diagnosis-rprdl').val(data.edit_rencana_rujukan.diagnosis_rprdl);
                    $('#rencana-rprdl').val(data.edit_rencana_rujukan.rencana_rprdl);
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

    function lihatRencanaRujukanPasienDariLuar(id_rrpdr, id_pendaftaran, id_layanan_pendaftaran) {

        $.ajax({
            type: 'GET',
            url: '<?= base_url('radiologi_log/api/radiologi_log/edit_rencana_rujukan_pasien_dari_luar') ?>/id/' + id_rrpdr + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetModalRencanaPasienRujukanDariLuar();
                $('#id-lhopi').val(id_rrpdr);
                $('#id-pendaftaran-lhopi').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-lhopi').val(id_layanan_pendaftaran);
                $('#id-pasien-lhopi').val(data.pendaftaran_detail.pasien.id_pasien);
                $('#piyeetokihh-nama').val(data.pendaftaran_detail.pasien.nama);
                if (data.edit_rencana_rujukan) {
                    $('#id-lhopi').val(data.edit_rencana_rujukan.id);
                    $('#tanggal-jam-rprdl').val((data.edit_rencana_rujukan.tanggal_jam_rprdl !== null ? datetimefmysql(data.edit_rencana_rujukan.tanggal_jam_rprdl) : ''));   
                    $('#asalrujukan-rprdl').val(data.edit_rencana_rujukan.asalrujukan_rprdl);
                    $('#diagnosis-rprdl').val(data.edit_rencana_rujukan.diagnosis_rprdl);
                    $('#rencana-rprdl').val(data.edit_rencana_rujukan.rencana_rprdl);
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

	function resetModalRencanaPasienRujukanDariLuar() {
		$('#lembar-hand-over-pasien-igd')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#id-lhopi').val('');
		$('#id-pendaftaran-lhopi').val('');
		$('#id-layanan-pendaftaran-lhopi').val('');
		$('#id-pasien-lhopi').val('');
	}

</script>

