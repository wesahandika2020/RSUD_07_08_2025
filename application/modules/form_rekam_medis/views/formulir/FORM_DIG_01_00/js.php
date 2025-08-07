<script>
	// PPDRAD 
	function lihatFORM_DIG_01_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		getPermintaanPemeriksaanDiagnostik(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_DIG_01_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		getPermintaanPemeriksaanDiagnostik(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_DIG_01_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		getPermintaanPemeriksaanDiagnostik(layanan.id_pendaftaran, layanan.id, action);
	}

	function getPermintaanPemeriksaanDiagnostik(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalPermintaanPemeriksaanDiagnostik();

		$('#btn_simpan').hide();
		$('#action-ppd').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			// $('.permintaan-pemeriksaan-diagnostik').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			// $('.permintaan-pemeriksaan-diagnostik').hide();
		}
		tableListPermintaanPemeriksaanDiagnostik(id_pendaftaran, id_layanan_pendaftaran);
	}


	function tableListPermintaanPemeriksaanDiagnostik(id_pendaftaran, id_layanan_pendaftaran) {
        // $('#modal_permintaan_pemeriksaan_diagnostik').modal('show');

		$('#table-list-ppd tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_ppd').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-ppd, #dokter-pengirim-ppd');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/get_permintaan_pemeriksaan_diagnostik') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				
				console.log(data);

				resetModalPermintaanPemeriksaanDiagnostik();
				$('#modal-permintaan-pemeriksaan-diagnostik-title').html(`<b>FORM PERMINTAAN PEMERIKSAAN DIAGNOSTIK</b>`);
				$('#id-pendaftaran-ppd').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-ppd').val(id_layanan_pendaftaran);
				$('#id-pasien-ppd').val(data.pendaftaran_detail.pasien.id_pasien);

				$('#nama-pasien-ppd').text(data.pendaftaran_detail.pasien.nama);
				$('#no-rm-pasien-ppd').text(data.pendaftaran_detail.pasien.id_pasien);
				$('#jenis-kelamin-pasien-ppd').text(data.pendaftaran_detail.pasien.kelamin);

				let tanggalLahir = new Date(data.pendaftaran_detail.pasien.tanggal_lahir);
				let formattedDate = tanggalLahir.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
				$('#tgl-lahir-pasien-ppd').text(formattedDate);

				if (data.list_permintaan_pemeriksaan_diagnostik.length !== 0) {
					var numberData = 1;
						// let aksiButton = action;

						// JANGAN DI HAPUS INI UNTUK MEMUNCULKAN CETAK
						// $.each(data.list_permintaan_pemeriksaan_diagnostik, function(i, v) {
						// 	let btnEditPermintaanPemeriksaanDiagnostik = '';
						// 	let btnHapusPermintaanPemeriksaanDiagnostik = '';

						// 	if ($('#action-ppd').val() !== 'lihat') {
						// 		btnEditPermintaanPemeriksaanDiagnostik = `<button type="button" class="btn btn-success btn-xs" onclick="editPemeriksaanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
						// 		btnHapusPermintaanPemeriksaanDiagnostik = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusPemeriksaanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						// 	}

						// 	let html = /* html */ `
						// 		<tr>
						// 			<td class="center">${numberData++}</td>
						// 			<td class="center">${datefmysql(v.tanggal_ppd)}</td>
						// 			<td class="center">${v.nama_dokter_ppd}</td>
						// 			<td class="center">${v.nama_user}</td>
						// 			<td class="center">
						// 				<button type="button" class="btn btn-info btn-xs" onclick="cetakPemeriksaanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
						// 				${btnEditPermintaanPemeriksaanDiagnostik}
						// 				${btnHapusPermintaanPemeriksaanDiagnostik}
						// 			</td>
						// 		</tr>
						// 	`;
						// $('#table-list-ppd tbody').append(html)


						// JANGAN DI HAPUS INI HANYA MUNCULKAN EDIT DAN HAPUS
						$.each(data.list_permintaan_pemeriksaan_diagnostik, function(i, v) {
							let btnEditPermintaanPemeriksaanDiagnostik = '';
							let btnHapusPermintaanPemeriksaanDiagnostik = '';
							// let btnLihatPermintaanPemeriksaanDiagnostik = '';

							if ($('#action-ppd').val() !== 'lihat') {
								btnEditPermintaanPemeriksaanDiagnostik = `<button type="button" class="btn btn-success btn-xs" onclick="editPemeriksaanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
								btnHapusPermintaanPemeriksaanDiagnostik = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusPemeriksaanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
							}

							let html = /* html */ `
								<tr>
									<td class="center">${numberData++}</td>
									<td class="center">${datefmysql(v.tanggal_ppd)}</td>
									<td class="center">${v.nama_dokter_ppd}</td>
									<td class="center">${v.nama_user}</td>
									<td class="center">
										<button type="button" class="btn btn-primary btn-xxs" onclick="lihatPemeriksaanDiagnostik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-eye m-r-5"></i>Lihat</button>
										${btnEditPermintaanPemeriksaanDiagnostik}
										${btnHapusPermintaanPemeriksaanDiagnostik}
									</td>
								</tr>
							`;
						$('#table-list-ppd tbody').append(html)


					})
				}
				$('#modal_permintaan_pemeriksaan_diagnostik').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function hapusPemeriksaanDiagnostik(id_ppd, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("radiologi_log/api/radiologi_log/hapus_permintaan_pemeriksaan_diagnostik") ?>',
								data: {
									id: id_ppd
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListPermintaanPemeriksaanDiagnostik(id_pendaftaran, id_layanan_pendaftaran);

									} else {
										messageCustom(data.message, 'Error');
									}
								},
								complete: function(data) {
									hideLoader();
								},
								error: function(e) {
									messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
									// messageCustom('Terjadi Kesalahan : '+ e.statusText +' ('+e.status+')', 'Error');
								}
							});
						}
					}
				}
			}
		});
	}

	function editPemeriksaanDiagnostik(id_dpp, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_ppd').removeClass('hide').show();
		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/edit_permintaan_pemeriksaan_diagnostik') ?>/id/' + id_dpp + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// console.log(data);
				resetModalPermintaanPemeriksaanDiagnostik();
				$('#id-ppd').val(id_dpp);
				$('#id-pendaftaran-ppd').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-ppd').val(id_layanan_pendaftaran);
				$('#id-pasien-ppd').val(data.pendaftaran_detail.pasien.id_pasien);

				$('#nama-pasien-ppd').text(data.pendaftaran_detail.pasien.nama);
				$('#no-rm-pasien-ppd').text(data.pendaftaran_detail.pasien.id_pasien);
				$('#jenis-kelamin-pasien-ppd').text(data.pendaftaran_detail.pasien.kelamin);

				let tanggalLahir = new Date(data.pendaftaran_detail.pasien.tanggal_lahir);
				let formattedDate = tanggalLahir.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
				$('#tgl-lahir-pasien-ppd').text(formattedDate);

				if (data.pemeriksaan_diagnostik) {
					$('#id-ppd').val(data.pemeriksaan_diagnostik.id);

					$('#no-formulir-ppd').val(data.pemeriksaan_diagnostik.no_formulir_ppd);
					$('#kode-pengirim-ppd').val(data.pemeriksaan_diagnostik.kode_pengirim_ppd);
					$('#kode-konsultan-ppd').val(data.pemeriksaan_diagnostik.kode_konsultan_ppd);

					data.pemeriksaan_diagnostik.cito_ppd == '1' ? $('#cito-ppd').prop('checked', true) : $('#cito-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.biasa_ppd == '1' ? $('#biasa-ppd').prop('checked', true) : $('#biasa-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.hasil_ppd == '1' ? $('#hasil-ppd').prop('checked', true) : $('#hasil-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.hasil_yg_ppd == '1' ? $('#hasil-yg-ppd').prop('checked', true) : $('#hasil-yg-ppd').prop('checked', false); 
					
					$('#diagnose-ppd').val(data.pemeriksaan_diagnostik.diagnose_ppd);
					
					data.pemeriksaan_diagnostik.gasturoduodenoskopi_ppd == '1' ? $('#gasturoduodenoskopi-ppd').prop('checked', true) : $('#gasturoduodenoskopi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.endosonografi_ppd == '1' ? $('#endosonografi-ppd').prop('checked', true) : $('#endosonografi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.ercp_ppd == '1' ? $('#ercp-ppd').prop('checked', true) : $('#ercp-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.kolonoskopi_ppd == '1' ? $('#kolonoskopi-ppd').prop('checked', true) : $('#kolonoskopi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.polipektomi_ppd == '1' ? $('#polipektomi-ppd').prop('checked', true) : $('#polipektomi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.ligasi_ppd == '1' ? $('#ligasi-ppd').prop('checked', true) : $('#ligasi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.rektosigmoidoskopi_ppd == '1' ? $('#rektosigmoidoskopi-ppd').prop('checked', true) : $('#rektosigmoidoskopi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.sklero_ppd == '1' ? $('#sklero-ppd').prop('checked', true) : $('#sklero-ppd').prop('checked', false);   
								
					data.pemeriksaan_diagnostik.kepela_ppd == '1' ? $('#kepela-ppd').prop('checked', true) : $('#kepela-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.muskuloskeletel_ppd == '1' ? $('#muskuloskeletel-ppd').prop('checked', true) : $('#muskuloskeletel-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.wrist_ppd == '1' ? $('#wrist-ppd').prop('checked', true) : $('#wrist-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.guilding_ppd == '1' ? $('#guilding-ppd').prop('checked', true) : $('#guilding-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.thyroid_ppd == '1' ? $('#thyroid-ppd').prop('checked', true) : $('#thyroid-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.abdomen_ppd == '1' ? $('#abdomen-ppd').prop('checked', true) : $('#abdomen-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.knee_ppd == '1' ? $('#knee-ppd').prop('checked', true) : $('#knee-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.mammaei_ppd == '1' ? $('#mammaei-ppd').prop('checked', true) : $('#mammaei-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.jantungg_ppd == '1' ? $('#jantungg-ppd').prop('checked', true) : $('#jantungg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.calcaneus_ppd == '1' ? $('#calcaneus-ppd').prop('checked', true) : $('#calcaneus-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.whole_ppd == '1' ? $('#whole-ppd').prop('checked', true) : $('#whole-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.ginekologii_ppd == '1' ? $('#ginekologii-ppd').prop('checked', true) : $('#ginekologii-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.kepalai_ppd == '1' ? $('#kepalai-ppd').prop('checked', true) : $('#kepalai-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.appendix_ppd == '1' ? $('#appendix-ppd').prop('checked', true) : $('#appendix-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.extremitass_ppd == '1' ? $('#extremitass-ppd').prop('checked', true) : $('#extremitass-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.abdomenr_ppd == '1' ? $('#abdomenr-ppd').prop('checked', true) : $('#abdomenr-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.abdomen_atas_ppd == '1' ? $('#abdomen-atas-ppd').prop('checked', true) : $('#abdomen-atas-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.shoulder_ppd == '1' ? $('#shoulder-ppd').prop('checked', true) : $('#shoulder-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.hip_ppd == '1' ? $('#hip-ppd').prop('checked', true) : $('#hip-ppd').prop('checked', false); 
					
					data.pemeriksaan_diagnostik.vertebralis_ppd == '1' ? $('#vertebralis-ppd').prop('checked', true) : $('#vertebralis-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.mammaeo_ppd == '1' ? $('#mammaeo-ppd').prop('checked', true) : $('#mammaeo-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.kgb_ppd == '1' ? $('#kgb-ppd').prop('checked', true) : $('#kgb-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.tcd_ppd == '1' ? $('#tcd-ppd').prop('checked', true) : $('#tcd-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.heper_ppd == '1' ? $('#heper-ppd').prop('checked', true) : $('#heper-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.exxtremitas_ppd == '1' ? $('#exxtremitas-ppd').prop('checked', true) : $('#exxtremitas-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.sofft_ppd == '1' ? $('#sofft-ppd').prop('checked', true) : $('#sofft-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.ginjal_ppd == '1' ? $('#ginjal-ppd').prop('checked', true) : $('#ginjal-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.venaa_ppd == '1' ? $('#venaa-ppd').prop('checked', true) : $('#venaa-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.scrotum_ppd == '1' ? $('#scrotum-ppd').prop('checked', true) : $('#scrotum-ppd').prop('checked', false);  

					$('#usg3d-ppd').val(data.pemeriksaan_diagnostik.usg3d_ppd);

					data.pemeriksaan_diagnostik.faal_ppd == '1' ? $('#faal-ppd').prop('checked', true) : $('#faal-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.bronkoskopi_ppd == '1' ? $('#bronkoskopi-ppd').prop('checked', true) : $('#bronkoskopi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.bunksi_ppd == '1' ? $('#bunksi-ppd').prop('checked', true) : $('#bunksi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.testt_ppd == '1' ? $('#testt-ppd').prop('checked', true) : $('#testt-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.fallparu_ppd == '1' ? $('#fallparu-ppd').prop('checked', true) : $('#fallparu-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.bronkoskeopi_ppd == '1' ? $('#bronkoskeopi-ppd').prop('checked', true) : $('#bronkoskeopi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.pleura_ppd == '1' ? $('#pleura-ppd').prop('checked', true) : $('#pleura-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.bronkoskmopi_ppd == '1' ? $('#bronkoskmopi-ppd').prop('checked', true) : $('#bronkoskmopi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.gguidance_ppd == '1' ? $('#gguidance-ppd').prop('checked', true) : $('#gguidance-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.transthorakal_ppd == '1' ? $('#transthorakal-ppd').prop('checked', true) : $('#transthorakal-ppd').prop('checked', false);  

					data.pemeriksaan_diagnostik.eeg_ppd == '1' ? $('#eeg-ppd').prop('checked', true) : $('#eeg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.audiometri_ppd == '1' ? $('#audiometri-ppd').prop('checked', true) : $('#audiometri-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.treadmili_ppd == '1' ? $('#treadmili-ppd').prop('checked', true) : $('#treadmili-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.erchokardiografi_ppd == '1' ? $('#erchokardiografi-ppd').prop('checked', true) : $('#erchokardiografi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.emg_ppd == '1' ? $('#emg-ppd').prop('checked', true) : $('#emg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.eng_ppd == '1' ? $('#eng-ppd').prop('checked', true) : $('#eng-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.ekg_ppd == '1' ? $('#ekg-ppd').prop('checked', true) : $('#ekg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.ekchokardiografi_ppd == '1' ? $('#ekchokardiografi-ppd').prop('checked', true) : $('#ekchokardiografi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.impedans_ppd == '1' ? $('#impedans-ppd').prop('checked', true) : $('#impedans-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.hotelekg_ppd == '1' ? $('#hotelekg-ppd').prop('checked', true) : $('#hotelekg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.eecp_ppd == '1' ? $('#eecp-ppd').prop('checked', true) : $('#eecp-ppd').prop('checked', false);  
					// data.pemeriksaan_diagnostik.hotelekig_ppd == '1' ? $('#hotelekig-ppd').prop('checked', true) : $('#hotelekig-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.kathererisasi_ppd == '1' ? $('#kathererisasi-ppd').prop('checked', true) : $('#kathererisasi-ppd').prop('checked', false);  			

					$('#pukul-ppd').val(data.pemeriksaan_diagnostik.pukul_ppd);
					$('#tanggal-ppd').val(datefmysql(data.pemeriksaan_diagnostik.tanggal_ppd));
					$('#dokter-pengirim-ppd').val(data.pemeriksaan_diagnostik.dokter_pengirim_ppd);
					$('#s2id_dokter-pengirim-ppd a .select2c-chosen').html(data.pemeriksaan_diagnostik.nama_dokter);								
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


	function lihatPemeriksaanDiagnostik(id_dpp, id_pendaftaran, id_layanan_pendaftaran) {
		// $('#btn_simpan').removeClass('hide').show();   
		// $('#btn_simpan').hide(); // menyembuyikan btnupdate

		$.ajax({
			type: 'GET',
			url: '<?= base_url('radiologi_log/api/radiologi_log/edit_permintaan_pemeriksaan_diagnostik') ?>/id/' + id_dpp + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetModalPermintaanPemeriksaanDiagnostik();
				$('#id-ppd').val(id_dpp);
				$('#id-pendaftaran-ppd').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-ppd').val(id_layanan_pendaftaran);
				$('#id-pasien-ppd').val(data.pendaftaran_detail.pasien.id_pasien);

				$('#nama-pasien-ppd').text(data.pendaftaran_detail.pasien.nama);
				$('#no-rm-pasien-ppd').text(data.pendaftaran_detail.pasien.id_pasien);
				$('#jenis-kelamin-pasien-ppd').text(data.pendaftaran_detail.pasien.kelamin);

				let tanggalLahir = new Date(data.pendaftaran_detail.pasien.tanggal_lahir);
				let formattedDate = tanggalLahir.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
				$('#tgl-lahir-pasien-ppd').text(formattedDate);

				if (data.pemeriksaan_diagnostik) {
					$('#id-ppd').val(data.pemeriksaan_diagnostik.id);

					$('#no-formulir-ppd').val(data.pemeriksaan_diagnostik.no_formulir_ppd);
					$('#kode-pengirim-ppd').val(data.pemeriksaan_diagnostik.kode_pengirim_ppd);
					$('#kode-konsultan-ppd').val(data.pemeriksaan_diagnostik.kode_konsultan_ppd);

					data.pemeriksaan_diagnostik.cito_ppd == '1' ? $('#cito-ppd').prop('checked', true) : $('#cito-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.biasa_ppd == '1' ? $('#biasa-ppd').prop('checked', true) : $('#biasa-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.hasil_ppd == '1' ? $('#hasil-ppd').prop('checked', true) : $('#hasil-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.hasil_yg_ppd == '1' ? $('#hasil-yg-ppd').prop('checked', true) : $('#hasil-yg-ppd').prop('checked', false); 
					
					$('#diagnose-ppd').val(data.pemeriksaan_diagnostik.diagnose_ppd);
					
					data.pemeriksaan_diagnostik.gasturoduodenoskopi_ppd == '1' ? $('#gasturoduodenoskopi-ppd').prop('checked', true) : $('#gasturoduodenoskopi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.endosonografi_ppd == '1' ? $('#endosonografi-ppd').prop('checked', true) : $('#endosonografi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.ercp_ppd == '1' ? $('#ercp-ppd').prop('checked', true) : $('#ercp-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.kolonoskopi_ppd == '1' ? $('#kolonoskopi-ppd').prop('checked', true) : $('#kolonoskopi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.polipektomi_ppd == '1' ? $('#polipektomi-ppd').prop('checked', true) : $('#polipektomi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.ligasi_ppd == '1' ? $('#ligasi-ppd').prop('checked', true) : $('#ligasi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.rektosigmoidoskopi_ppd == '1' ? $('#rektosigmoidoskopi-ppd').prop('checked', true) : $('#rektosigmoidoskopi-ppd').prop('checked', false);     
					data.pemeriksaan_diagnostik.sklero_ppd == '1' ? $('#sklero-ppd').prop('checked', true) : $('#sklero-ppd').prop('checked', false);   
								
					data.pemeriksaan_diagnostik.kepela_ppd == '1' ? $('#kepela-ppd').prop('checked', true) : $('#kepela-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.muskuloskeletel_ppd == '1' ? $('#muskuloskeletel-ppd').prop('checked', true) : $('#muskuloskeletel-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.wrist_ppd == '1' ? $('#wrist-ppd').prop('checked', true) : $('#wrist-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.guilding_ppd == '1' ? $('#guilding-ppd').prop('checked', true) : $('#guilding-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.thyroid_ppd == '1' ? $('#thyroid-ppd').prop('checked', true) : $('#thyroid-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.abdomen_ppd == '1' ? $('#abdomen-ppd').prop('checked', true) : $('#abdomen-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.knee_ppd == '1' ? $('#knee-ppd').prop('checked', true) : $('#knee-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.mammaei_ppd == '1' ? $('#mammaei-ppd').prop('checked', true) : $('#mammaei-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.jantungg_ppd == '1' ? $('#jantungg-ppd').prop('checked', true) : $('#jantungg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.calcaneus_ppd == '1' ? $('#calcaneus-ppd').prop('checked', true) : $('#calcaneus-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.whole_ppd == '1' ? $('#whole-ppd').prop('checked', true) : $('#whole-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.ginekologii_ppd == '1' ? $('#ginekologii-ppd').prop('checked', true) : $('#ginekologii-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.kepalai_ppd == '1' ? $('#kepalai-ppd').prop('checked', true) : $('#kepalai-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.appendix_ppd == '1' ? $('#appendix-ppd').prop('checked', true) : $('#appendix-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.extremitass_ppd == '1' ? $('#extremitass-ppd').prop('checked', true) : $('#extremitass-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.abdomenr_ppd == '1' ? $('#abdomenr-ppd').prop('checked', true) : $('#abdomenr-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.abdomen_atas_ppd == '1' ? $('#abdomen-atas-ppd').prop('checked', true) : $('#abdomen-atas-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.shoulder_ppd == '1' ? $('#shoulder-ppd').prop('checked', true) : $('#shoulder-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.hip_ppd == '1' ? $('#hip-ppd').prop('checked', true) : $('#hip-ppd').prop('checked', false); 
					
					data.pemeriksaan_diagnostik.vertebralis_ppd == '1' ? $('#vertebralis-ppd').prop('checked', true) : $('#vertebralis-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.mammaeo_ppd == '1' ? $('#mammaeo-ppd').prop('checked', true) : $('#mammaeo-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.kgb_ppd == '1' ? $('#kgb-ppd').prop('checked', true) : $('#kgb-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.tcd_ppd == '1' ? $('#tcd-ppd').prop('checked', true) : $('#tcd-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.heper_ppd == '1' ? $('#heper-ppd').prop('checked', true) : $('#heper-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.exxtremitas_ppd == '1' ? $('#exxtremitas-ppd').prop('checked', true) : $('#exxtremitas-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.sofft_ppd == '1' ? $('#sofft-ppd').prop('checked', true) : $('#sofft-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.ginjal_ppd == '1' ? $('#ginjal-ppd').prop('checked', true) : $('#ginjal-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.venaa_ppd == '1' ? $('#venaa-ppd').prop('checked', true) : $('#venaa-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.scrotum_ppd == '1' ? $('#scrotum-ppd').prop('checked', true) : $('#scrotum-ppd').prop('checked', false);  

					$('#usg3d-ppd').val(data.pemeriksaan_diagnostik.usg3d_ppd);

					data.pemeriksaan_diagnostik.faal_ppd == '1' ? $('#faal-ppd').prop('checked', true) : $('#faal-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.bronkoskopi_ppd == '1' ? $('#bronkoskopi-ppd').prop('checked', true) : $('#bronkoskopi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.bunksi_ppd == '1' ? $('#bunksi-ppd').prop('checked', true) : $('#bunksi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.testt_ppd == '1' ? $('#testt-ppd').prop('checked', true) : $('#testt-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.fallparu_ppd == '1' ? $('#fallparu-ppd').prop('checked', true) : $('#fallparu-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.bronkoskeopi_ppd == '1' ? $('#bronkoskeopi-ppd').prop('checked', true) : $('#bronkoskeopi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.pleura_ppd == '1' ? $('#pleura-ppd').prop('checked', true) : $('#pleura-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.bronkoskmopi_ppd == '1' ? $('#bronkoskmopi-ppd').prop('checked', true) : $('#bronkoskmopi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.gguidance_ppd == '1' ? $('#gguidance-ppd').prop('checked', true) : $('#gguidance-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.transthorakal_ppd == '1' ? $('#transthorakal-ppd').prop('checked', true) : $('#transthorakal-ppd').prop('checked', false);  

					data.pemeriksaan_diagnostik.eeg_ppd == '1' ? $('#eeg-ppd').prop('checked', true) : $('#eeg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.audiometri_ppd == '1' ? $('#audiometri-ppd').prop('checked', true) : $('#audiometri-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.treadmili_ppd == '1' ? $('#treadmili-ppd').prop('checked', true) : $('#treadmili-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.erchokardiografi_ppd == '1' ? $('#erchokardiografi-ppd').prop('checked', true) : $('#erchokardiografi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.emg_ppd == '1' ? $('#emg-ppd').prop('checked', true) : $('#emg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.eng_ppd == '1' ? $('#eng-ppd').prop('checked', true) : $('#eng-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.ekg_ppd == '1' ? $('#ekg-ppd').prop('checked', true) : $('#ekg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.ekchokardiografi_ppd == '1' ? $('#ekchokardiografi-ppd').prop('checked', true) : $('#ekchokardiografi-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.impedans_ppd == '1' ? $('#impedans-ppd').prop('checked', true) : $('#impedans-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.hotelekg_ppd == '1' ? $('#hotelekg-ppd').prop('checked', true) : $('#hotelekg-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.eecp_ppd == '1' ? $('#eecp-ppd').prop('checked', true) : $('#eecp-ppd').prop('checked', false);  
					// data.pemeriksaan_diagnostik.hotelekig_ppd == '1' ? $('#hotelekig-ppd').prop('checked', true) : $('#hotelekig-ppd').prop('checked', false);  
					data.pemeriksaan_diagnostik.kathererisasi_ppd == '1' ? $('#kathererisasi-ppd').prop('checked', true) : $('#kathererisasi-ppd').prop('checked', false);  			

					$('#pukul-ppd').val(data.pemeriksaan_diagnostik.pukul_ppd);
					$('#tanggal-ppd').val(datefmysql(data.pemeriksaan_diagnostik.tanggal_ppd));
					$('#dokter-pengirim-ppd').val(data.pemeriksaan_diagnostik.dokter_pengirim_ppd);
					$('#s2id_dokter-pengirim-ppd a .select2c-chosen').html(data.pemeriksaan_diagnostik.nama_dokter);								
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

	// JANGAN DI HAPUS INI UNTUK MEMUNCULKAN CETAK
	// function cetakPemeriksaanDiagnostik(id_ppd, id_pendaftaran, id_layanan_pendaftaran) {
	// 	window.open('<?= base_url('radiologi_log/pemeriksaan_diagnostik/') ?>' + id_ppd + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Permintaan Pemeriksaan Diagnostik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	// }

	function resetModalPermintaanPemeriksaanDiagnostik() {
		$('#permintaan-pemeriksaan-diagnostik')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#dokter-pengirim-ppd').val('');
		$('#s2id_dokter-pengirim-ppd a .select2c-chosen').html('Silahkan Pilih..');
		$('#id-ppd').val('');
		$('#id-pendaftaran-ppd').val('');
		$('#id-layanan-pendaftaran-ppd').val('');
		$('#id-pasien-ppd').val('');
	}

</script>