<!-- // RH -->
<script>
	function lihatFORM_RH_06_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';

		getRehabilitasMedikERM(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_RH_06_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';

		getRehabilitasMedikERM(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_RH_06_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';

		getRehabilitasMedikERM(layanan.id_pendaftaran, layanan.id, action);
	}

	function getRehabilitasMedikERM(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetModalRehabilitasMedik();

		$('#btn_simpan').hide();
		$('#action-rehabilitas').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.rehabilitas-medik').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.rehabilitas-medik').hide();
		}

		tableListRehabilitasMedik(id_pendaftaran, id_layanan_pendaftaran);
	}

	function tableListRehabilitasMedik(id_pendaftaran, id_layanan_pendaftaran) {

        // $('#modal_rehabilitas_medik').modal('show');
		$('#table-list-rehabilitas tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_rh').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggal-rehabilitas, #dokter-rehabilitas');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('order_operasi/api/order_operasi/get_rehabilitas_medik') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// console.log(data);
				resetModalRehabilitasMedik();
				$('#modal-rehabilitas-medik-title').html(`<b>FORMULIR RAWAT JALAN LAYANAN KEDOKTERAN FISIK DAN REHABILITASI MEDIK Assesment / Evaluasi (Re-Assesment)</b> |`);
				$('#id-pendaftaran-rehabilitas').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-rehabilitas').val(id_layanan_pendaftaran);
				$('#id-pasien-rehabilitas').val(data.pendaftaran_detail.pasien.id_pasien);

				$('#nama-pasien-rehabilitas').val(data.pendaftaran_detail.pasien.nama);
				$('#no-rm-pasien-rehabilitas').val(data.pendaftaran_detail.pasien.id_pasien);
				$('#register-rehabilitas').val(data.pendaftaran_detail.pasien.no_register);


				let tanggalLahir = new Date(data.pendaftaran_detail.pasien.tanggal_lahir);
				let formattedDate = tanggalLahir.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
				$('#tgl-lahir-pasien-rehabilitas').val(formattedDate);

				let tanggalLayanan = new Date(data.pendaftaran_detail.layanan.tanggal_layanan);
				let formattedDatte = tanggalLayanan.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
				$('#tgl-pelayanan-rehabilitas').val(formattedDatte);


				// Ambil data diagnosa
				// const diagnosa = data.diagnosa;

				// // Filter diagnosa utama dan sekunder
				// const diagnosaUtama = diagnosa.filter(item => item.prioritas === 'Utama');
				// const diagnosaSekunder = diagnosa.filter(item => item.prioritas === 'Sekunder');

				// // Format data nama_sebab_sakit untuk diagnosa utama
				// const diagnosaUtamaString = diagnosaUtama
				//   .map(item => item.nama_sebab_sakit || item.golongan_sebab_sakit_lain) // Gunakan nama_sebab_sakit jika ada, jika tidak gunakan golongan_sebab_sakit_lain
				//   .filter(text => text) // Hanya ambil yang tidak null atau kosong
				//   .join('<br>'); // Pisahkan dengan <br>

				// // Format data untuk diagnosa sekunder
				// const diagnosaSekunderString = diagnosaSekunder
				//   .map(item => item.nama_sebab_sakit || item.golongan_sebab_sakit_lain) // Sama seperti di atas
				//   .filter(text => text) // Hapus nilai null/kosong
				//   .join('<br>'); // Pisahkan dengan <br>

				// // Masukkan data ke dalam elemen sesuai ID
				// $('#diagnosis-medis-rehabilitas').html(diagnosaUtamaString); // Diagnosa utama
				// $('#diagnosis-fungsi-rehabilitas').html(diagnosaSekunderString); // Diagnosa sekunder



				$('#anamnesa-rehabilitas').text(data.anamnesa.keluhan_utama);
				$('#pmeriksaan-penunjang-rehabilitas').text(data.anamnesa.pemeriksaan_penunjang);
				// $('#tata-laksana-rehabilitas').text(data.tindakan.nama_layanan);


				// ================================================================================>
				// ✅ Solusi 1: Menampilkan Semua nama_layanan
				// Jika ingin menampilkan semua nama_layanan, gabungkan dengan .map() dan tampilkan sebagai teks:
				$('#tata-laksana-rehabilitas').text(
					data.tindakan.map(t => t.nama_layanan).filter(n => n).join(', ')
				);
				// 🔹 map(t => t.nama_layanan) → Mengambil semua nama_layanan.
				// 🔹 filter(n => n) → Menghapus nilai null agar tidak ikut ditampilkan.
				//  join(', ') → Menggabungkan hasil menjadi satu teks.
				// ================================================================================>



				// ================================================================================>
				// ✅ Solusi 2: Menampilkan nama_layanan Pertama Saja
				// Jika hanya ingin menampilkan satu nama_layanan pertama (index ke-0):
				// if (data.tindakan.length > 0) {
				// 	$('#tata-laksana-rehabilitas').text(data.tindakan[0].nama_layanan || '');
				// } else {
				// 	$('#tata-laksana-rehabilitas').text('-'); // Jika tidak ada data
				// }
				// 👉 Hasilnya jika ada data: AHF
				// 👉 Hasilnya jika kosong: -
				// ================================================================================>




				// Ambil data diagnosa
				const diagnosa = data.diagnosa;

				// Filter diagnosa utama dan sekunder
				const diagnosaUtama = diagnosa.filter(item => item.prioritas === 'Utama');
				const diagnosaSekunder = diagnosa.filter(item => item.prioritas === 'Sekunder');

				// Format data untuk diagnosa utama menjadi daftar HTML
				const diagnosaUtamaHTML = `<ul>` + diagnosaUtama
				.map(item => `<li>${item.nama_sebab_sakit || item.golongan_sebab_sakit_lain}</li>`) // Gunakan nama_sebab_sakit atau golongan_sebab_sakit_lain
				.join('') + `</ul>`; // Gabungkan ke dalam elemen <ul>

				// Format data untuk diagnosa sekunder menjadi daftar HTML
				const diagnosaSekunderHTML = `<ul>` + diagnosaSekunder
				.map(item => `<li>${item.nama_sebab_sakit || item.golongan_sebab_sakit_lain}</li>`) // Sama seperti di atas
				.join('') + `</ul>`; // Gabungkan ke dalam elemen <ul>

				// Masukkan data ke dalam elemen sesuai ID
				$('#diagnosis-medis-rehabilitas').html(diagnosaUtamaHTML); // Diagnosa utama
				$('#diagnosis-fungsi-rehabilitas').html(diagnosaSekunderHTML); // Diagnosa sekunder

				if (data.list_rehabilitas_medik.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;

					$.each(data.list_rehabilitas_medik, function(i, v) {
						let btnEditRehabilitas = '';
						let btnHapusRehabilitas = '';

						if ($('#action-rehabilitas').val() !== 'lihat') {
							btnEditRehabilitas = `<button type="button" class="btn btn-success btn-xs" onclick="editRehabilitasMedik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusRehabilitas = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusRehabilitasMedik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${datefmysql(v.tanggal_rehabilitas)}</td>
								<td class="center">${v.nama_dokter_rh}</td>
								<td class="center">${v.nama_user}</td>
								<td class="center">
									<button type="button" class="btn btn-info btn-xs" onclick="cetakRehabilitasMedik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									${btnEditRehabilitas}
									${btnHapusRehabilitas}
								</td>
							</tr>
						`;
						$('#table-list-rehabilitas tbody').append(html)
					})


					// PERCOBAAN AJAH HAPUS BOLEH GA DI HAPUS YA GA MASALAH 
					// $.each(data.list_rehabilitas_medik, function(i, v) {
					// 	let btnEditRehabilitas = '';
					// 	let btnHapusRehabilitas = '';

					// 	// Pastikan aksi hanya tersedia jika bukan dalam mode 'lihat'
					// 	if ($('#action-rehabilitas').val() !== 'lihat') {
					// 		btnEditRehabilitas = `
					// 			<button type="button" class="btn btn-success btn-xs" 
					// 				onclick="editRehabilitasMedik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})">
					// 				<i class="fas fa-edit mr-1"></i>Edit
					// 			</button>`;

					// 		btnHapusRehabilitas = `
					// 			<button type="button" class="btn btn-danger btn-xs" 
					// 				onclick="hapusRehabilitasMedik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${v.nama_user}')">
					// 				<i class="fas fa-trash-alt mr-1"></i>Hapus
					// 			</button>`;
					// 	}

					// 	// Template HTML untuk baris tabel
					// 	let html = /* html */ `
					// 		<tr>
					// 			<td class="center">${numberData++}</td>
					// 			<td class="center">${datefmysql(v.tanggal_rehabilitas)}</td>
					// 			<td class="center">${v.nama_dokter_rh}</td>
					// 			<td class="center">${v.nama_user}</td>
					// 			<td class="center">
					// 				<button type="button" class="btn btn-info btn-xs" 
					// 					onclick="cetakRehabilitasMedik(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})">
					// 					<i class="fas fa-print mr-1"></i>Print
					// 				</button>
					// 				${btnEditRehabilitas}
					// 				${btnHapusRehabilitas}
					// 			</td>
					// 		</tr>`;
						
					// 	// Append baris HTML ke tabel
					// 	$('#table-list-rehabilitas tbody').append(html);
					// });

				}

				$('#modal_rehabilitas_medik').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function hapusRehabilitasMedik(id_rehabilitas, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("order_operasi/api/order_operasi/hapus_rehabilitas_medik") ?>',
								data: {
									id: id_rehabilitas
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListRehabilitasMedik(id_pendaftaran, id_layanan_pendaftaran);

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

	function editRehabilitasMedik(id_medik, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_rh').removeClass('hide').show();
		$.ajax({
			type: 'GET',
			url: '<?= base_url('order_operasi/api/order_operasi/edit_rehabilitas_medik') ?>/id/' + id_medik + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// console.log(data);
				resetModalRehabilitasMedik();
				$('#id-rehabilitas').val(id_medik);
				$('#id-pendaftaran-rehabilitas').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-rehabilitas').val(id_layanan_pendaftaran);
				$('#id-pasien-rehabilitas').val(data.pendaftaran_detail.pasien.id_pasien);
				$('#nama-pasien-rehabilitas').val(data.pendaftaran_detail.pasien.nama);
				$('#no-rm-pasien-rehabilitas').val(data.pendaftaran_detail.pasien.id_pasien);

				let tanggalLahir = new Date(data.pendaftaran_detail.pasien.tanggal_lahir);
				let formattedDate = tanggalLahir.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
				$('#tgl-lahir-pasien-rehabilitas').val(formattedDate);

				let tanggalLayanan = new Date(data.pendaftaran_detail.layanan.tanggal_layanan);
				let formattedDatte = tanggalLayanan.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
				$('#tgl-pelayanan-rehabilitas').val(formattedDatte);

				if (data.rehabilitas_medik) {
					$('#id-rehabilitas').val(data.rehabilitas_medik.id);
					$('#anamnesa-rehabilitas').val(data.rehabilitas_medik.anamnesa_rehabilitas);
					$('#pemeriksaan-rehabilitas').val(data.rehabilitas_medik.pemeriksaan_rehabilitas);
					$('#diagnosis-medis-rehabilitas').val(data.rehabilitas_medik.diagnosis_medis_rehabilitas);
					$('#diagnosis-fungsi-rehabilitas').val(data.rehabilitas_medik.diagnosis_fungsi_rehabilitas);
					$('#pmeriksaan-penunjang-rehabilitas').val(data.rehabilitas_medik.pmeriksaan_penunjang_rehabilitas);
					$('#tata-laksana-rehabilitas').val(data.rehabilitas_medik.tata_laksana_rehabilitas);
					$('#rekomendasi-rehabilitas').val(data.rehabilitas_medik.rekomendasi_rehabilitas);
					$('#evaluasi-disabilitas').val(data.rehabilitas_medik.evaluasi_disabilitas);

					if (data.rehabilitas_medik.suspek_rehabilitas == 'Ya') {
						document.getElementById("suspek-rehabilitas-ya").checked = true;
					} else if (data.rehabilitas_medik.suspek_rehabilitas == 'Tidak') {
						document.getElementById("suspek-rehabilitas-tidak").checked = true;
					}

					$('#tanggal-rehabilitas').val(datefmysql(data.rehabilitas_medik.tanggal_rehabilitas));
					$('#dokter-rehabilitas').val(data.rehabilitas_medik.dokter_rehabilitas);
					$('#s2id_dokter-rehabilitas a .select2c-chosen').html(data.rehabilitas_medik.nama_dokter);								
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

	function cetakRehabilitasMedik(id_rehabilitas, id_pendaftaran, id_layanan_pendaftaran) {
		window.open('<?= base_url('order_operasi/rehabilitas_medik/') ?>' + id_rehabilitas + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Rehabilitasi Medik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function resetModalRehabilitasMedik() {
		$('#rehabilitas-medik')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#dokter-rehabilitas').val('');
		$('#s2id_dokter-rehabilitas a .select2c-chosen').html('Silahkan Pilih..');

		$('#id-rehabilitas').val('');
		$('#id-pendaftaran-rehabilitas').val('');
		$('#id-layanan-pendaftaran-rehabilitas').val('');
		$('#id-pasien-rehabilitas').val('');
	}

</script>