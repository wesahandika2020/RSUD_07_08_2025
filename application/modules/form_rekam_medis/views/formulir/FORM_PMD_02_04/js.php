<script>
	function lihatFORM_PMD_02_04(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';

		getLaporanOperasiERM(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_PMD_02_04(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';

		getLaporanOperasiERM(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_PMD_02_04(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';

		getLaporanOperasiERM(layanan.id_pendaftaran, layanan.id, action);
	}

	function getLaporanOperasiERM(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalLaporanOperasi();

		$('#btn_simpan').hide();
		$('#action-lap-operasi').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.laporan-operasi').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.laporan-operasi').hide();
		}

		tableListLapOperasi(id_pendaftaran, id_layanan_pendaftaran);
	}

	function tableListLapOperasi(id_pendaftaran, id_layanan_pendaftaran) {
		$('#table-list-lap-operasi tbody').empty()
		$('#btn_update_lp').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#diagnosa-pra-bedah, #diagnosa-pasca-bedah, #laporan-tanggal-operasi, #laporan-jam-mulai-operasi, #laporan-jam-selesai-operasi, #laporan-dokter-bedah-operasi');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('order_operasi/api/order_operasi/laporan_operasi') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				// Set all values first
				resetModalLaporanOperasi();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-laporan-operasi-title').html(`<b>Form Laporan Operasi</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`);
				$('#id-pendaftaran-lap-operasi').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-lap-operasi').val(id_layanan_pendaftaran);
				$('#id-pasien-lap-operasi').val(data.pendaftaran_detail.pasien.id_pasien);

				if (data.list_laporan_operasi.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;

					$.each(data.list_laporan_operasi, function(i, v) {
						let btnEditLapOperasi = '';
						let btnHapusLapOperasi = '';

						if ($('#action-lap-operasi').val() !== 'lihat') {
							btnEditLapOperasi = `<button type="button" class="btn btn-success btn-xs" onclick="editLaporanOperasi(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusLapOperasi = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusLaporanOperasi(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.tanggal_operasi} <br>(${v.mulai_waktu_operasi} - ${v.selesai_waktu_operasi})</td>
								<td class="center">${v.dokter_bedah}</td>
								<td class="center">${v.prosedur_operasi}</td>
								<td class="center">${v.golongan_operasi}</td>
								<td class="center">${v.nama_user}</td>
								<td class="center">
									<button type="button" class="btn btn-info btn-xs" onclick="cetakLaporanOperasi(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									${btnEditLapOperasi}
									${btnHapusLapOperasi}
								</td>
							</tr>
						`;

						$('#table-list-lap-operasi tbody').append(html)
					})
				}

				$('#modal_laporan_operasi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function hapusLaporanOperasi(id_lap_operasi, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("order_operasi/api/order_operasi/hapus_laporan_operasi") ?>',
								data: {
									id: id_lap_operasi
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListLapOperasi(id_pendaftaran, id_layanan_pendaftaran);

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

	function editLaporanOperasi(id_operasi, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_lp').removeClass('hide').show();
		$.ajax({
			type: 'GET',
			url: '<?= base_url('order_operasi/api/order_operasi/edit_laporan_operasi') ?>/id/' + id_operasi + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				console.log(data);

				// Set all values first
				resetModalLaporanOperasi();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#id-lap-operasi').val(id_operasi);
				$('#id-pendaftaran-lap-operasi').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-lap-operasi').val(id_layanan_pendaftaran);
				$('#id-pasien-lap-operasi').val(data.pendaftaran_detail.pasien.id_pasien);

				if (data.laporan_operasi) {
					$('#id-lap-operasi').val(data.laporan_operasi.id);
					$('#diagnosa-pra-bedah').val((data.laporan_operasi.diagnosa_pra_bedah = null ? "" : data.laporan_operasi.diagnosa_pra_bedah));
					$('#diagnosa-pasca-bedah').val(data.laporan_operasi.diagnosa_pasca_bedah);
					$('#prosedur-operasi').val(data.laporan_operasi.prosedur_operasi);
					$('#lainnya-operasi').val(data.laporan_operasi.pemeriksaan_specimen_lain);
					$('#komplikasi-operasi').val(data.laporan_operasi.komplikasi);
					$('#jumlah-darah-operasi').val(data.laporan_operasi.jumlah_darah_hilang);
					$('#jenis-jumlah-operasi').val(data.laporan_operasi.jenis_jumlah);
					$('#jaringan-eksisi-operasi').val(data.laporan_operasi.jaringan_eksisi);
					$('#laporan-tanggal-operasi').val(datefmysql(data.laporan_operasi.tanggal_operasi));

					$('#laporan-jam-mulai-operasi').val(data.laporan_operasi.mulai_waktu_operasi);
					$('#laporan-jam-selesai-operasi').val(data.laporan_operasi.selesai_waktu_operasi);
					$('#laporan-durasi-operasi').val(data.laporan_operasi.waktu_operasi);
					$('#asisten-operasi').val(data.laporan_operasi.id_asisten);
					$('#insumentator-operasi').val(data.laporan_operasi.id_instrumentator);
					$('#sirkuler-operasi').val(data.laporan_operasi.id_sirkuler);
					$('#laporan-catatan-operasi').val(data.laporan_operasi.catatan);

					$('#laporan-dokter-bedah-operasi').val(data.laporan_operasi.id_dokter_bedah);
					$('#s2id_laporan-dokter-bedah-operasi a .select2c-chosen').html(data.laporan_operasi.nama_dokter);

					$('#asisten-operasi').val(data.laporan_operasi.id_asisten);
					$('#s2id_asisten-operasi a .select2c-chosen').html(data.laporan_operasi.nama_dokter);

					$('#insumentator-operasi').val(data.laporan_operasi.id_instrumentator);
					$('#s2id_insumentator-operasi a .select2c-chosen').html(data.laporan_operasi.instrumentator);

					$('#sirkuler-operasi').val(data.laporan_operasi.id_sirkuler);
					$('#s2id_sirkuler-operasi a .select2c-chosen').html(data.laporan_operasi.sirkuler);


					if (data.laporan_operasi.pemeriksaan_specimen == 'Tidak') {
						document.getElementById("tidak-operasi").checked = true;
					} else if (data.laporan_operasi.pemeriksaan_specimen == 'PA') {
						document.getElementById("pa-operasi").checked = true;
					} else if (data.laporan_operasi.pemeriksaan_specimen == 'Kultur') {
						document.getElementById("kultur-operasi").checked = true;
					} else if (data.laporan_operasi.pemeriksaan_specimen == 'Sitologi') {
						document.getElementById("sitologi-operasi").checked = true;
					} else if (data.laporan_operasi.pemeriksaan_specimen == 'Lainnya') {
						document.getElementById("specimen-lainnya").checked = true;
					}

					if (data.laporan_operasi.golongan_operasi == 'Kecil') {
						document.getElementById("golongan-operasi-kecil").checked = true;
					} else if (data.laporan_operasi.golongan_operasi == 'Khusus') {
						document.getElementById("golongan-operasi-khusus").checked = true;
					} else if (data.laporan_operasi.golongan_operasi == 'Sedang') {
						document.getElementById("golongan-operasi-sedang").checked = true;
					} else if (data.laporan_operasi.golongan_operasi == 'Besar') {
						document.getElementById("golongan-operasi-besar").checked = true;
					}

					if (data.laporan_operasi.kategori_operasi == 'Cito') {
						document.getElementById("kategori-operasi-cito").checked = true;
					} else if (data.laporan_operasi.kategori_operasi == 'Elektif') {
						document.getElementById("kategori-operasi-elektif").checked = true;
					}

					if (data.laporan_operasi.transfusi == 'Ya') {
						document.getElementById("tranfusi-operasi-ya").checked = true;
					} else if (data.laporan_operasi.transfusi == 'Tidak') {
						document.getElementById("tranfusi-operasi-tidak").checked = true;
					}

					if (data.laporan_operasi.pemasangan_implan == 'Ya') {
						document.getElementById("pemasangan-implan-operasi-ya").checked = true;
					} else if (data.laporan_operasi.pemasangan_implan == 'Tidak') {
						document.getElementById("pemasangan-implan-operasi-tidak").checked = true;
					}

					if (data.laporan_operasi.jenis_anestesi == 'Regional') {
						document.getElementById("regional-operasi").checked = true;
					} else if (data.laporan_operasi.jenis_anestesi == 'General') {
						document.getElementById("general-operasi").checked = true;
					} else if (data.laporan_operasi.jenis_anestesi == 'Lokal') {
						document.getElementById("lokal-operasi").checked = true;
					}

					if (data.laporan_operasi.jenis_operasi == 'Bersih') {
						document.getElementById("bersih-operasi").checked = true;
					} else if (data.laporan_operasi.jenis_operasi == 'Bersih Terkontaminasi') {
						document.getElementById("bersih-kontra-operasi").checked = true;
					} else if (data.laporan_operasi.jenis_operasi == 'Kotor') {
						document.getElementById("kotor-operasi").checked = true;
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

	function cetakLaporanOperasi(id_lap_operasi, id_pendaftaran, id_layanan_pendaftaran) {

		window.open('<?= base_url('order_operasi/laporan_operasi/') ?>' + id_lap_operasi + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Laporan Operasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);

	}

	function resetModalLaporanOperasi() {
		$('#id-lap-operasi').val('');
		$('#id-pendaftaran-lap-operasi').val('');
		$('#id-layanan-pendaftaran-lap-operasi').val('');
		$('#id-pasien-lap-operasi').val('');

		$('#diagnosa-pra-bedah').val('');
		$('#diagnosa-pasca-bedah').val('');
		$('#prosedur-operasi').val('');
		$('#lainnya-operasi').val('');
		$('#komplikasi-operasi').val('');
		$('#jumlah-darah-operasi').val('');
		$('#jenis-jumlah-operasi').val('');
		$('#jaringan-eksisi-operasi').val('');
		$('#laporan-tanggal-operasi').val('');

		$('#laporan-jam-mulai-operasi').val('');
		$('#laporan-jam-selesai-operasi').val('');
		$('#laporan-durasi-operasi').val('');
		$('#asisten-operasi').val('');
		$('#insumentator-operasi').val('');
		$('#sirkuler-operasi').val('');
		$('#laporan-catatan-operasi').val('');

		$('#laporan-dokter-bedah-operasi').val('');
		$('#s2id_laporan-dokter-bedah-operasi a .select2c-chosen').html('Silahkan Pilih..');

		$('#asisten-operasi').val('')
		$('#s2id_asisten-operasi a .select2c-chosen').html('Silahkan Pilih..');

		$('#insumentator-operasi').val('');
		$('#s2id_insumentator-operasi a .select2c-chosen').html('Silahkan Pilih..');

		$('#sirkuler-operasi').val('');
		$('#s2id_sirkuler-operasi a .select2c-chosen').html('Silahkan Pilih..');

		document.getElementById("tidak-operasi").checked = true;
		document.getElementById("pa-operasi").checked = false;
		document.getElementById("kultur-operasi").checked = false;
		document.getElementById("sitologi-operasi").checked = false;
		document.getElementById("specimen-lainnya").checked = false;


		document.getElementById("golongan-operasi-kecil").checked = true;
		document.getElementById("golongan-operasi-khusus").checked = false;
		document.getElementById("golongan-operasi-sedang").checked = false;
		document.getElementById("golongan-operasi-besar").checked = false;

		document.getElementById("kategori-operasi-cito").checked = false;
		document.getElementById("kategori-operasi-elektif").checked = true;

		document.getElementById("tranfusi-operasi-ya").checked = false;
		document.getElementById("tranfusi-operasi-tidak").checked = true;

		document.getElementById("pemasangan-implan-operasi-ya").checked = false;
		document.getElementById("pemasangan-implan-operasi-tidak").checked = true;

		document.getElementById("regional-operasi").checked = false;
		document.getElementById("general-operasi").checked = true;
		document.getElementById("lokal-operasi").checked = false;

		document.getElementById("bersih-operasi").checked = true;
		document.getElementById("bersih-kontra-operasi").checked = false;
		document.getElementById("kotor-operasi").checked = false;
	}
	
</script>