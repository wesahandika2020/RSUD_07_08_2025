<!-- // AAKC -->
<script>
    $(function() {		
        $('#tanggal-aakc').datetimepicker({
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

        $('#signin-aakc, #timeout-aakc, #signout-aakc, #jamverifikasi-aakc, #jam1-aakc, #jam2-aakc, #jam3-aakc, #jam4-aakc, #jam5-aakc').on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false,
                defaultTime: 'current' // ⬅️ Ini penting!
            });
        });


        $('#dokteroperator1-aakc, #dokteroperator2-aakc, #dokteroperator3-aakc, #perawat-aakc')
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
			resetModalAsesmenAwalKepCathlab();
		});

	})

    function lihatFORM_DIG_05_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		entriAsesmenAwalKepCathlab(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_DIG_05_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		entriAsesmenAwalKepCathlab(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_DIG_05_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		entriAsesmenAwalKepCathlab(layanan.id_pendaftaran, layanan.id, action);
	}

    function entriAsesmenAwalKepCathlab(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalAsesmenAwalKepCathlab();
		$('#btn_simpan').hide();
		$('#action-aakc').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.form-keselamatan-pasien-indakan-intervensi-non-bedah').show();

			// Aktifkan semua input kalau bukan mode lihat
			$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah :input').prop('disabled', false);
			$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah textarea').prop('readonly', false);
			$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah select').prop('disabled', false).trigger('change.select2');

			// Aktifkan pointer select2
			$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah [id^="s2id_"]').css({
				'pointer-events': 'auto',
				'opacity': 1
			});
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.form-keselamatan-pasien-indakan-intervensi-non-bedah').hide();

			// Disable semua input (kecuali tombol close/modal dismiss)
			$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah :input')
				.not('[data-dismiss="modal"]')
				.prop('disabled', true);

			// Set readonly ke textarea
			$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah textarea').prop('readonly', true);

			// Disable select dan select2
			$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah select')
				.prop('disabled', true)
				.trigger('change.select2');

			// Nonaktifkan interaksi select2
			$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah [id^="s2id_"]').css({
				'pointer-events': 'none',
				'opacity': 0.6
			});
		}

		tableListAsesmenAwalKepCathlab(id_pendaftaran, id_layanan_pendaftaran);
	}

    function tableListAsesmenAwalKepCathlab(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah').modal('show');
		$('#table-list-aakc tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_aakc').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-aakc');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/get_data_asesmen_awal_keperawatan_cathlab') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				
				console.log(data);
				resetModalAsesmenAwalKepCathlab();
				$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah_title').html(`<b>FORM CEKLIST KESELAMATAN PASIEN TINDAKAN INTERVENSI NON BEDAH</b>`);
				$('#id-pendaftaran-aakc').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-aakc').val(id_layanan_pendaftaran);
				$('#id-pasien-aakc').val(data.pendaftaran_detail.pasien.id_pasien);   
				$('#nama-pasien-aakc').text(data.pendaftaran_detail.pasien.nama);
				$('#norm-aakc').text(data.pendaftaran_detail.pasien.no_rm);

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

                $('#tanggal-lahir-aakc').text(
                    `${data.pendaftaran_detail.pasien.tempat_lahir || '-'}, ${formatTanggalLahirUsia(data.pendaftaran_detail.pasien.tanggal_lahir)}`
                );

				$('#jenis-kelamin-aakc').text(data.pendaftaran_detail.pasien.kelamin);

                $('#ruang-aakc').text(
					data.pendaftaran_detail.layanan.bangsal + 
					' kelas ' + data.pendaftaran_detail.layanan.kelas + 
					' ruang ' + data.pendaftaran_detail.layanan.no_ruang + 
					' No. Bed ' + data.pendaftaran_detail.layanan.no_bed
				);

				$('#ruangan-aakc').text(data.pendaftaran_detail.layanan.bangsal);

				// JANGAN DI HAPUS INI BAGIAN PRINTYA
				// if (data.list_asesmen_awal_keperawatan_cathlab.length !== 0) {
				// 	var numberData = 1;
				// 	// let aksiButton = action;
                //     $.each(data.list_asesmen_awal_keperawatan_cathlab, function(i, v) {
				// 		let btnEditAaKc = '';
				// 		let btnHapusAaKc = '';

				// 		if ($('#action-aakc').val() !== 'lihat') {
				// 			btnEditAaKc = `<button type="button" class="btn btn-success btn-xs" onclick="editAsesmenAwalKepCathlab(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
				// 			btnHapusAaKc = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusAsesmenAwalKepCathlab(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
				// 		}

				// 		let html = /* html */ `
				// 			<tr>
				// 				<td class="center">${numberData++}</td>
				// 				<td class="center">${v.tanggal_aakc ? datefmysql(v.tanggal_aakc) : '-'}</td>
				// 				<td class="center">${data.pendaftaran_detail?.pasien?.nama || ''}</td>
                //                 <td class="center">${v.signin_aakc ? v.signin_aakc : '-'}</td>
                //                 <td class="center">${v.dokter_1 ? v.dokter_1 : '-'}</td>
                //                 <td class="center">${v.timeout_aakc ? v.timeout_aakc : '-'}</td>
                //                 <td class="center">${v.perawat ? v.perawat : '-'}</td>
                //                 <td class="center">${v.signout_aakc ? v.signout_aakc : '-'}</td>
                //                 <td class="center">${v.dokter_2 ? v.dokter_2 : '-'}</td>
				// 				<td class="center">
				// 					<button type="button" class="btn btn-info btn-xs" onclick="cetakAsesmenAwalKepCathlab(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
				// 					${btnEditAaKc}
				// 					${btnHapusAaKc}
				// 				</td>
				// 			</tr>
				// 		`;
				// 		$('#table-list-aakc tbody').append(html)
				// 	})
				// }

				if (data.list_asesmen_awal_keperawatan_cathlab.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;
                    $.each(data.list_asesmen_awal_keperawatan_cathlab, function(i, v) {
						let btnEditAaKc = '';
						let btnHapusAaKc = '';

						if ($('#action-aakc').val() !== 'lihat') {
							btnEditAaKc = `<button type="button" class="btn btn-success btn-xs" onclick="editAsesmenAwalKepCathlab(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusAaKc = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusAsesmenAwalKepCathlab(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.tanggal_aakc ? datefmysql(v.tanggal_aakc) : '-'}</td>
								<td class="center">${data.pendaftaran_detail?.pasien?.nama || ''}</td>
                                <td class="center">${v.signin_aakc ? v.signin_aakc : '-'}</td>
                                <td class="center">${v.dokter_1 ? v.dokter_1 : '-'}</td>
                                <td class="center">${v.timeout_aakc ? v.timeout_aakc : '-'}</td>
                                <td class="center">${v.perawat ? v.perawat : '-'}</td>
                                <td class="center">${v.signout_aakc ? v.signout_aakc : '-'}</td>
                                <td class="center">${v.dokter_2 ? v.dokter_2 : '-'}</td>
								<td class="center">
									<button type="button" class="btn btn-primary btn-xxs" onclick="lihatAsesmenAwalKepCathlab(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-eye m-r-5"></i>Lihat</button>
									${btnEditAaKc}
									${btnHapusAaKc}
								</td>
							</tr>
						`;
						$('#table-list-aakc tbody').append(html)
					})
				}

				$('#modal_cheklis_keselamatan_pasien_indakan_intervensi_non_bedah').modal('show');
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

    function simpanAsesmenAwalKepCathlab() {
		if ($('#tanggal-aakc').val() === '') {
            syams_validation('#tanggal-aakc', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-aakc');
        }

		var id_pendaftaran = $('#id-pendaftaran-aakc').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-aakc').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("radiologi_log/api/radiologi_log/simpan_asesmen_awal_keperawatan_cathlab") ?>',
			data: $('#form-keselamatan-pasien-indakan-intervensi-non-bedah').serialize(),
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
					tableListAsesmenAwalKepCathlab(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-aakc').val(), $('#id-layanan-pendaftaran-aakc').val(), $('#id-pasien-aakc').val());
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

    function hapusAsesmenAwalKepCathlab(id_aakc, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("radiologi_log/api/radiologi_log/hapus_asesmen_awal_keperawatan_cathlab") ?>',
								data: {
									id: id_aakc
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListAsesmenAwalKepCathlab(id_pendaftaran, id_layanan_pendaftaran);

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

	function editAsesmenAwalKepCathlab(id_ckaa, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_aakc').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('radiologi_log/api/radiologi_log/get_edit_asesmen_awal_keperawatan_cathlab') ?>/id/' + id_ckaa + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetModalAsesmenAwalKepCathlab();
                $('#id-aakc').val(id_ckaa);
                $('#id-pendaftaran-aakc').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-aakc').val(id_layanan_pendaftaran);
                $('#id-pasien-aakc').val(data.pendaftaran_detail.pasien.id_pasien);

                if (data.list_edit_asesmen_awal_keperawatan_cathlab) {
                    $('#id-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.id);
                    $('#nm-tindakan').val(data.list_edit_asesmen_awal_keperawatan_cathlab.nm_tindakan);
					$('#dokteroperator1-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dokteroperator1_aakc);  
                    $('#s2id_dokteroperator1-aakc a .select2c-chosen').html(data.list_edit_asesmen_awal_keperawatan_cathlab.nama_operator);
                    $('#signin-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.signin_aakc);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.identitas_aakc_1 === '1') { document.getElementById("identitas-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.identitas_aakc_2 === '1') { document.getElementById("identitas-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.lokasi_aakc_1 === '1') { document.getElementById("lokasi-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.lokasi_aakc_2 === '1') { document.getElementById("lokasi-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.prosedur_aakc_1 === '1') { document.getElementById("prosedur-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.prosedur_aakc_2 === '1') { document.getElementById("prosedur-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.surat_aakc_1 === '1') { document.getElementById("surat-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.surat_aakc_2 === '1') { document.getElementById("surat-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.tanda_aakc_1 === '1') { document.getElementById("tanda-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.tanda_aakc_2 === '1') { document.getElementById("tanda-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.mesin_aakc_1 === '1') { document.getElementById("mesin-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.mesin_aakc_2 === '1') { document.getElementById("mesin-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.monitor_aakc_1 === '1') { document.getElementById("monitor-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.monitor_aakc_2 === '1') { document.getElementById("monitor-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.apakah_aakc_1 === '1') { document.getElementById("apakah-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.apakah_aakc_2 === '1') { document.getElementById("apakah-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.asma_aakc_1 === '1') { document.getElementById("asma-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.asma_aakc_2 === '1') { document.getElementById("asma-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.kesulitan_aakc_1 === '1') { document.getElementById("kesulitan-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.kesulitan_aakc_2 === '1') { document.getElementById("kesulitan-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.darah_aakc_1 === '1') { document.getElementById("darah-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.darah_aakc_2 === '1') { document.getElementById("darah-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.akses_aakc_1 === '1') { document.getElementById("akses-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.akses_aakc_2 === '1') { document.getElementById("akses-aakc-2").checked = true; }

					$('#timeout-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.timeout_aakc);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.peran_aakc_1 === '1') { document.getElementById("peran-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.peran_aakc_2 === '1') { document.getElementById("peran-aakc-2").checked = true; }
					$('#nama-aakc-1').val(data.list_edit_asesmen_awal_keperawatan_cathlab.nama_aakc_1);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.nama_aakc_2 === '1') { document.getElementById("nama-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.nama_aakc_3 === '1') { document.getElementById("nama-aakc-3").checked = true; }
					$('#prosedure-aakc-1').val(data.list_edit_asesmen_awal_keperawatan_cathlab.prosedure_aakc_1);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.prosedure_aakc_2 === '1') { document.getElementById("prosedure-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.prosedure_aakc_3 === '1') { document.getElementById("prosedure-aakc-3").checked = true; }
					$('#lokassie-aakc-1').val(data.list_edit_asesmen_awal_keperawatan_cathlab.lokassie_aakc_1);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.lokassie_aakc_2 === '1') { document.getElementById("lokassie-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.lokassie_aakc_3 === '1') { document.getElementById("lokassie-aakc-3").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.antibiotik_aakc_1 === '1') { document.getElementById("antibiotik-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.antibiotik_aakc_2 === '1') { document.getElementById("antibiotik-aakc-2").checked = true; }
					$('#namaantib-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.namaantib_aakc);
					$('#dosies-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dosies_aakc);
					$('#reviiew-dokter').val(data.list_edit_asesmen_awal_keperawatan_cathlab.reviiew_dokter);
					$('#reviiew-anestesi').val(data.list_edit_asesmen_awal_keperawatan_cathlab.reviiew_anestesi);
					$('#reviiew-perawat').val(data.list_edit_asesmen_awal_keperawatan_cathlab.reviiew_perawat);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ctscan_aakc_1 === '1') { document.getElementById("ctscan-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ctscan_aakc_2 === '1') { document.getElementById("ctscan-aakc-2").checked = true; }

					$('#signout-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.signout_aakc);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.komunikasie_aakc_1 === '1') { document.getElementById("komunikasie-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.komunikasie_aakc_2 === '1') { document.getElementById("komunikasie-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.dicatat_aakc_1 === '1') { document.getElementById("dicatat-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.dicatat_aakc_2 === '1') { document.getElementById("dicatat-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.benar_aakc_1 === '1') { document.getElementById("benar-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.benar_aakc_2 === '1') { document.getElementById("benar-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.spesimen_aakc_1 === '1') { document.getElementById("spesimen-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.spesimen_aakc_2 === '1') { document.getElementById("spesimen-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.peralatan_aakc_1 === '1') { document.getElementById("peralatan-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.peralatan_aakc_2 === '1') { document.getElementById("peralatan-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.penyembuhan_aakc_1 === '1') { document.getElementById("penyembuhan-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.penyembuhan_aakc_2 === '1') { document.getElementById("penyembuhan-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ada_aakc_1 === '1') { document.getElementById("ada-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ada_aakc_2 === '1') { document.getElementById("ada-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.tdada_aakc_1 === '1') { document.getElementById("tdada-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ya_aakc_2 === '1') { document.getElementById("ya-aakc-2").checked = true; }
					$('#jelaskan-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jelaskan_aakc);
					$('#jamverifikasi-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jamverifikasi_aakc);
					$('#tanggal-aakc').val(datefmysql(data.list_edit_asesmen_awal_keperawatan_cathlab.tanggal_aakc));

					$('#dokteroperator2-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dokteroperator2_aakc);  
                    $('#s2id_dokteroperator2-aakc a .select2c-chosen').html(data.list_edit_asesmen_awal_keperawatan_cathlab.dokter_1);
					$('#perawat-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.perawat_aakc);  
                    $('#s2id_perawat-aakc a .select2c-chosen').html(data.list_edit_asesmen_awal_keperawatan_cathlab.perawat);
					$('#dokteroperator3-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dokteroperator3_aakc);  
                    $('#s2id_dokteroperator3-aakc a .select2c-chosen').html(data.list_edit_asesmen_awal_keperawatan_cathlab.dokter_2);




					if (data.list_edit_asesmen_awal_keperawatan_cathlab.akses_aakc_3 === '1') { document.getElementById("akses-aakc-3").checked = true; }

					$('#hb-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.hb_aakc);
					$('#urcr-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.urcr_aakc);
					$('#ht-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.ht_aakc);
					$('#hbsag-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.hbsag_aakc);
					$('#gds-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.gds_aakc);
					$('#ptaptt-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.ptaptt_aakc);
					$('#tropt-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.tropt_aakc);
					$('#elektrolit-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.elektrolit_aakc);

					$('#bb-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.bb_aakc);
					$('#tb-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.tb_aakc);

					$('#cpg-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.cpg_aakc);
					$('#jam1-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam1_aakc);
					$('#aspilet-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.aspilet_aakc);
					$('#jam2-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam2_aakc);
					$('#atorvastatin-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.atorvastatin_aakc);
					$('#jam3-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam3_aakc);
					$('#isdn-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.isdn_aakc);
					$('#jam4-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam4_aakc);
					$('#dll-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dll_aakc);
					$('#jam5-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam5_aakc);











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

	function lihatAsesmenAwalKepCathlab(id_ckaa, id_pendaftaran, id_layanan_pendaftaran) {
		// $('#btn_simpan').removeClass('hide').show();   
		// $('#btn_simpan').hide(); // menyembuyikan btnupdate
		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/get_edit_asesmen_awal_keperawatan_cathlab') ?>/id/' + id_ckaa + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetModalAsesmenAwalKepCathlab();
                $('#id-aakc').val(id_ckaa);
                $('#id-pendaftaran-aakc').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-aakc').val(id_layanan_pendaftaran);
                $('#id-pasien-aakc').val(data.pendaftaran_detail.pasien.id_pasien);
				if (data.list_edit_asesmen_awal_keperawatan_cathlab) {
					$('#id-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.id);

                    $('#nm-tindakan').val(data.list_edit_asesmen_awal_keperawatan_cathlab.nm_tindakan);
					$('#dokteroperator1-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dokteroperator1_aakc);  
                    $('#s2id_dokteroperator1-aakc a .select2c-chosen').html(data.list_edit_asesmen_awal_keperawatan_cathlab.nama_operator);

                    $('#signin-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.signin_aakc);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.identitas_aakc_1 === '1') { document.getElementById("identitas-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.identitas_aakc_2 === '1') { document.getElementById("identitas-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.lokasi_aakc_1 === '1') { document.getElementById("lokasi-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.lokasi_aakc_2 === '1') { document.getElementById("lokasi-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.prosedur_aakc_1 === '1') { document.getElementById("prosedur-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.prosedur_aakc_2 === '1') { document.getElementById("prosedur-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.surat_aakc_1 === '1') { document.getElementById("surat-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.surat_aakc_2 === '1') { document.getElementById("surat-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.tanda_aakc_1 === '1') { document.getElementById("tanda-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.tanda_aakc_2 === '1') { document.getElementById("tanda-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.mesin_aakc_1 === '1') { document.getElementById("mesin-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.mesin_aakc_2 === '1') { document.getElementById("mesin-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.monitor_aakc_1 === '1') { document.getElementById("monitor-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.monitor_aakc_2 === '1') { document.getElementById("monitor-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.apakah_aakc_1 === '1') { document.getElementById("apakah-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.apakah_aakc_2 === '1') { document.getElementById("apakah-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.asma_aakc_1 === '1') { document.getElementById("asma-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.asma_aakc_2 === '1') { document.getElementById("asma-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.kesulitan_aakc_1 === '1') { document.getElementById("kesulitan-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.kesulitan_aakc_2 === '1') { document.getElementById("kesulitan-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.darah_aakc_1 === '1') { document.getElementById("darah-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.darah_aakc_2 === '1') { document.getElementById("darah-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.akses_aakc_1 === '1') { document.getElementById("akses-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.akses_aakc_2 === '1') { document.getElementById("akses-aakc-2").checked = true; }

					$('#timeout-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.timeout_aakc);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.peran_aakc_1 === '1') { document.getElementById("peran-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.peran_aakc_2 === '1') { document.getElementById("peran-aakc-2").checked = true; }
					$('#nama-aakc-1').val(data.list_edit_asesmen_awal_keperawatan_cathlab.nama_aakc_1);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.nama_aakc_2 === '1') { document.getElementById("nama-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.nama_aakc_3 === '1') { document.getElementById("nama-aakc-3").checked = true; }
					$('#prosedure-aakc-1').val(data.list_edit_asesmen_awal_keperawatan_cathlab.prosedure_aakc_1);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.prosedure_aakc_2 === '1') { document.getElementById("prosedure-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.prosedure_aakc_3 === '1') { document.getElementById("prosedure-aakc-3").checked = true; }
					$('#lokassie-aakc-1').val(data.list_edit_asesmen_awal_keperawatan_cathlab.lokassie_aakc_1);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.lokassie_aakc_2 === '1') { document.getElementById("lokassie-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.lokassie_aakc_3 === '1') { document.getElementById("lokassie-aakc-3").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.antibiotik_aakc_1 === '1') { document.getElementById("antibiotik-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.antibiotik_aakc_2 === '1') { document.getElementById("antibiotik-aakc-2").checked = true; }
					$('#namaantib-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.namaantib_aakc);
					$('#dosies-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dosies_aakc);
					$('#reviiew-dokter').val(data.list_edit_asesmen_awal_keperawatan_cathlab.reviiew_dokter);
					$('#reviiew-anestesi').val(data.list_edit_asesmen_awal_keperawatan_cathlab.reviiew_anestesi);
					$('#reviiew-perawat').val(data.list_edit_asesmen_awal_keperawatan_cathlab.reviiew_perawat);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ctscan_aakc_1 === '1') { document.getElementById("ctscan-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ctscan_aakc_2 === '1') { document.getElementById("ctscan-aakc-2").checked = true; }

					$('#signout-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.signout_aakc);
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.komunikasie_aakc_1 === '1') { document.getElementById("komunikasie-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.komunikasie_aakc_2 === '1') { document.getElementById("komunikasie-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.dicatat_aakc_1 === '1') { document.getElementById("dicatat-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.dicatat_aakc_2 === '1') { document.getElementById("dicatat-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.benar_aakc_1 === '1') { document.getElementById("benar-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.benar_aakc_2 === '1') { document.getElementById("benar-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.spesimen_aakc_1 === '1') { document.getElementById("spesimen-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.spesimen_aakc_2 === '1') { document.getElementById("spesimen-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.peralatan_aakc_1 === '1') { document.getElementById("peralatan-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.peralatan_aakc_2 === '1') { document.getElementById("peralatan-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.penyembuhan_aakc_1 === '1') { document.getElementById("penyembuhan-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.penyembuhan_aakc_2 === '1') { document.getElementById("penyembuhan-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ada_aakc_1 === '1') { document.getElementById("ada-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ada_aakc_2 === '1') { document.getElementById("ada-aakc-2").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.tdada_aakc_1 === '1') { document.getElementById("tdada-aakc-1").checked = true; }
					if (data.list_edit_asesmen_awal_keperawatan_cathlab.ya_aakc_2 === '1') { document.getElementById("ya-aakc-2").checked = true; }
					$('#jelaskan-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jelaskan_aakc);
					$('#jamverifikasi-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jamverifikasi_aakc);
					$('#tanggal-aakc').val(datefmysql(data.list_edit_asesmen_awal_keperawatan_cathlab.tanggal_aakc));

					$('#dokteroperator2-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dokteroperator2_aakc);  
                    $('#s2id_dokteroperator2-aakc a .select2c-chosen').html(data.list_edit_asesmen_awal_keperawatan_cathlab.dokter_1);
					$('#perawat-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.perawat_aakc);  
                    $('#s2id_perawat-aakc a .select2c-chosen').html(data.list_edit_asesmen_awal_keperawatan_cathlab.perawat);
					$('#dokteroperator3-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dokteroperator3_aakc);  
                    $('#s2id_dokteroperator3-aakc a .select2c-chosen').html(data.list_edit_asesmen_awal_keperawatan_cathlab.dokter_2);		
					
					

					if (data.list_edit_asesmen_awal_keperawatan_cathlab.akses_aakc_3 === '1') { document.getElementById("akses-aakc-3").checked = true; }

					$('#hb-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.hb_aakc);
					$('#urcr-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.urcr_aakc);
					$('#ht-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.ht_aakc);
					$('#hbsag-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.hbsag_aakc);
					$('#gds-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.gds_aakc);
					$('#ptaptt-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.ptaptt_aakc);
					$('#tropt-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.tropt_aakc);
					$('#elektrolit-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.elektrolit_aakc);

					$('#bb-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.bb_aakc);
					$('#tb-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.tb_aakc);
					
					$('#cpg-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.cpg_aakc);
					$('#jam1-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam1_aakc);
					$('#aspilet-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.aspilet_aakc);
					$('#jam2-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam2_aakc);
					$('#atorvastatin-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.atorvastatin_aakc);
					$('#jam3-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam3_aakc);
					$('#isdn-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.isdn_aakc);
					$('#jam4-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam4_aakc);
					$('#dll-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.dll_aakc);
					$('#jam5-aakc').val(data.list_edit_asesmen_awal_keperawatan_cathlab.jam5_aakc);


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

	// JANGAN DI HAPUS INI UNTUK NGEPRIN NNTI KALAU DI BUTUHIN
    // function cetakAsesmenAwalKepCathlab(id_aakc, id_pendaftaran, id_layanan_pendaftaran) {
    //     window.open('<!?= base_url('radiologi_log/cetak_asesmen_awal_keperawatan_cathlab/') ?>' + id_aakc + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Asesmen Awal Keperawatan Cathlab', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    // }

    function resetModalAsesmenAwalKepCathlab() {
		$('#form-keselamatan-pasien-indakan-intervensi-non-bedah')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#id-aakc').val('');
		$('#id-pendaftaran-aakc').val('');
		$('#id-layanan-pendaftaran-aakc').val('');
		$('#id-pasien-aakc').val('');
		$('#dokteroperator1-aakc').val('');
		$('#s2id_dokteroperator1-aakc a .select2c-chosen').html('Silahkan Pilih..');
		$('#dokteroperator2-aakc').val('');
		$('#s2id_dokteroperator2-aakc a .select2c-chosen').html('Silahkan Pilih..');
		$('#dokteroperator3-aakc').val('');
		$('#s2id_dokteroperator3-aakc a .select2c-chosen').html('Silahkan Pilih..');
		$('#perawat-aakc').val('');
		$('#s2id_perawat-aakc a .select2c-chosen').html('Silahkan Pilih..');
	}

</script>