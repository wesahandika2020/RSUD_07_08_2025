<script>
	function lihatFORM_REM_10_01(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'lihat';
		// console.log(layanan.id_pendaftaran);
		window.open('<?= base_url('pemeriksaan_poli/cetak_surat_pengantar_rawat/') ?>' + layanan.id_pendaftaran, 'Cetak Surat Pengantar Rawat', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
		// cetakSuratPengantarRawat(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function editFORM_REM_10_01(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'edit';

		cetakSuratPengantarRawat(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function tambahFORM_REM_10_01(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'tambah';

		cetakSuratPengantarRawat(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function cetakSuratPengantarRawat(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
		$('#btn-simpan').hide();

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';

		if (action !== 'lihat') {
			$('#btn-simpan').show();
		} else {
			$('#btn-simpan').hide();
		}

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran +
				'/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(response) {
				resetSuratPengantarRawat();
				const pasien = response.pasien;
				const data = response.pengantar_rawat;

				// , <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>
				$('#modal-surat-pengantar-rawat-title-rm').html(`<b>Form Surat Pengantar Rawat</b> | No. RM: ${pasien.no_rm}, Nama: ${pasien.nama}`);
				$('#id-pendaftaran-spr-rm').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-spr-rm').val(id_layanan_pendaftaran);
				$('#id-pasien-spr-rm').val(pasien.no_rm);

				if (data !== null) {
					if (data.operasi_spr === '1') {
						document.getElementById("operasi-spr-rm").checked = true;
					}
					if (data.odc_spr === '1') {
						document.getElementById("odc-spr-rm").checked = true;
					}
					if (data.rawat_inap_spr === '1') {
						document.getElementById("rawat-inap-spr-rm").checked = true;
					}

					// BARU

					if (data.is_pasien_spr === '1') {
						document.getElementById("is-pasien-spr-1-rm").checked = true;
						// Disabled fields
						$("#nama-pasien-spr-rm").prop("disabled", true);
						$("#j-spr-1-rm").prop("disabled", true);
						$("#j-spr-2-rm").prop("disabled", true);
						$("#no-rm-spr-rm").prop("disabled", true);
						$("#umur-spr-rm").prop("disabled", true);
					} else if (data.is_pasien_spr === '0') {
						// document.getElementById("is-pasien-spr-2-rm").checked = true;
						// Undisabled fields
						$("#nama-pasien-spr-rm").prop("disabled", true);
						$("#j-spr-1-rm").prop("disabled", true);
						$("#j-spr-2-rm").prop("disabled", true);
						$("#no-rm-spr-rm").prop("disabled", true);
						$("#umur-spr-rm").prop("disabled", true);
					}
					if (data.j_spr == 'Laki-laki') {
						document.getElementById("j-spr-1-rm").checked = true;
					} else if (data.j_spr == 'Perempuan') {
						document.getElementById("j-spr-2-rm").checked = true;
					}

					$('#diagnosis-spr-rm').val(data.diagnosis_spr);
					if (data.infeksi_spr === '1') {
						document.getElementById("infeksi-spr-rm").checked = true;
					}
					if (data.non_infeksi_spr === '1') {
						document.getElementById("non-infeksi-spr-rm").checked = true;
					}
					$('#dokter-spr-rm').val(data.dokter_spr); -
					$('#s2id_dokter-spr-rm a .select2c-chosen').html(data.nama_dokter_1);
					$('#jto-spr-rm').val(data.jto_spr);
					$('#gto-spr-rm').val(data.gto_spr);
					if (data.cito_spr === '1') {
						document.getElementById("cito-spr-rm").checked = true;
					}
					if (data.tidak_cito_spr === '1') {
						document.getElementById("tidak-cito-spr-rm").checked = true;
					}
					if (data.icu_spr === '1') {
						document.getElementById("icu-spr-rm").checked = true;
					}
					if (data.hcu_spr === '1') {
						document.getElementById("hcu-spr-rm").checked = true;
					}
					if (data.pcu_spr === '1') {
						document.getElementById("pcu-spr-rm").checked = true;
					}
					if (data.nicu_spr === '1') {
						document.getElementById("nicu-spr-rm").checked = true;
					}
					if (data.vk_spr === '1') {
						document.getElementById("vk-spr-rm").checked = true;
					}
					if (data.perinatologi_spr === '1') {
						document.getElementById("perinatologi-spr-rm").checked = true;
					}
					if (data.ruang_perawatan_spr === '1') {
						document.getElementById("ruang-perawatan-spr-rm").checked = true;
					}
					$('#rp-spr-rm').val(data.rp_spr);
					if (data.isolasi_spr === '1') {
						document.getElementById("isolasi-spr-rm").checked = true;
					}
					if (data.lain_lain_spr === '1') {
						document.getElementById("lain-lain-spr-rm").checked = true;
					}
					$('#ll-spr-rm').val(data.ll_spr);
					$('#tanggal-dokter-spr-rm').val(data.tanggal_dokter_spr);
					$('#ttd-dokter-spr-rm').val(data.ttd_dokter_spr);
					$('#s2id_ttd-dokter-spr-rm a .select2c-chosen').html(data.nama_dokter_2);
					if (data.ceklis_dokter_spr === '1') {
						document.getElementById("ceklis-dokter-spr-rm").checked = true;
					}
					$('#catatan-pendaftaran-spr-rm').val(data.catatan_pendaftaran_spr);
					$('#tanggal-petugas-spr-rm').val(data.tanggal_petugas_spr);
					if (data.ceklis_petugas_spr === '1') {
						document.getElementById("ceklis-petugas-spr-rm").checked = true;
					}

					$('#id-petugas-pendaftaran-sprt').val(data.id_petugas_pendaftaran_spr);
					$('#s2id_id-petugas-pendaftaran-sprt a .select2c-chosen').html(data.nama_petugas_pendaftaran);
				}

				$('#modal_surat_pengantar_rawat_rm').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	$('#tanggal-dokter-spr-rm, #tanggal-petugas-spr-rm')
		.datetimepicker({
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

	$('#dokter-spr-rm, #ttd-dokter-spr-rm').select2c({
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
				var more = (page * 20) < data.total; // whether or not there are more results available
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
			$('#id-pemeriksa-skk').val(data.id);
			return data.nama;
		}
	});

	$('input[type=radio][name=is_pasien_spr]').change(function() {
		// Conditions
		if (this.value === '1') {
			// Set fields to empty string
			$('#nama-pasien-spr-rm').val('');
			document.getElementById("j-spr-1-rm").checked = true;
			document.getElementById("j-spr-2-rm").checked = true;
			$('#no-rm-spr-rm').val('');
			$('#umur-spr-rm').val('');

			// Disabled fields
			$("#nama-pasien-spr-rm").prop("disabled", true);
			$("#j-spr-1-rm").prop("disabled", true);
			$("#j-spr-2-rm").prop("disabled", true);
			$("#no-rm-spr-rm").prop("disabled", true);
			$("#umur-spr-rm").prop("disabled", true);
		} else if (this.value === '0') {
			// Undisabled fields
			$("#nama-pasien-spr-rm").prop("disabled", true);
			$("#j-spr-1-rm").prop("disabled", true);
			$("#j-spr-2-rm").prop("disabled", true);
			$("#no-rm-spr-rm").prop("disabled", true);
			$("#umur-spr-rm").prop("disabled", true);
		}
	});

	// PETUGAS PENDAFTARAN
	$('#id-petugas-pendaftaran-sprt').select2c({
		ajax: {
			url: "<?= base_url('form_rekam_medis/api/form_rekam_medis/saksi_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
					// jenis: 15,
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
			// var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
			var markup = data.nama;
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	});



	// ADA VALIDASI YANG DI TAMBAHKAN
	function simpanFormSuratPengantarRawatRm() {
		var stop = false;
		if ($('#tanggal-dokter-spr-rm').val() === '') {
			syams_validation('#tanggal-dokter-spr-rm', 'Kolom tanggal dokter belum diisi!');
			$('#tanggal-dokter-spr-rm').focus();

			// Inisialisasi bwizard sebelum memanggil metodenya
			$('#wizard_form_ranap').bwizard();

			$('#wizard_form_ranap').bwizard('show', '0');
			stop = true;
		} else {
			// Hapus pesan validasi jika tanggal sudah diisi
			syams_validation('#tanggal-dokter-spr-rm', '');
		}

		if ($('#tanggal-petugas-spr-rm').val() === '') {
			syams_validation('#tanggal-petugas-spr-rm', 'Kolom tanggal petugas belum diisi!');
			$('#tanggal-petugas-spr-rm').focus();

			// Inisialisasi bwizard sebelum memanggil metodenya
			$('#wizard_form_ranap').bwizard();

			$('#wizard_form_ranap').bwizard('show', '0');
			stop = true;
		} else {
			// Hapus pesan validasi jika tanggal sudah diisi
			syams_validation('#tanggal-petugas-spr-rm', '');
		}

		if ($('#ttd-dokter-spr-rm').val() === '') {
			syams_validation('#ttd-dokter-spr-rm', 'Kolom dokter belum dipilih!');

			// Inisialisasi bwizard sebelum memanggil metodenya
			$('#wizard_form_ranap').bwizard();

			$('#wizard_form_ranap').bwizard('show', '0');
			stop = true;
		} else {
			// Hapus pesan validasi jika dokter sudah dipilih
			syams_validation('#ttd-dokter-spr-rm', '');
		}


		if (stop) {
			return; // Berhenti jika ada kesalahan validasi
		}

		var id = $('#id-layanan-pendaftaran-spr-rm').val();
		var id_pendaftaran = $('#id-pendaftaran-spr-rm').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url('rekam_medis/api/rekam_medis/simpan_surat_pengantar_rawat/') ?>' + id_pendaftaran + '/' + id,
			data: $('#form_surat_keterangan_pengantar_rawat_rm').serialize(),
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

					$('#modal_surat_pengantar_rawat_rm').modal('hide');

					window.open('<?= base_url('pemeriksaan_poli/cetak_surat_pengantar_rawat/') ?>' + id_pendaftaran, 'Cetak Surat Pengantar Rawat', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
					showListForm($('#id-pendaftaran-spr-rm').val(), $('#id-layanan-pendaftaran-spr-rm').val(), $('#id-pasien-spr-rm').val());
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

	function resetSuratPengantarRawat() {
		$('#form_surat_keterangan_pengantar_rawat').val('');
		$('#id-layanan-pendaftaran-spr-rm').val('');
		$('#id-users').val('');
		$('#nama-pasien-spr-rm').val('');
		$('#no-rm-spr-rm').val('');
		$('#umur-spr-rm').val('');
		$('#diagnosis-spr-rm').val('');
		$('#dokter-spr-rm').val('');
		$('#jto-spr-rm').val('');
		$('#gto-spr-rm').val('');
		$('#rp-spr-rm').val('');
		$('#ll-spr-rm').val('');
		$('#tanggal-dokter-spr-rm').val('');
		$('#ttd-dokter-spr-rm').val('');
		$('#catatan-pendaftaran-spr-rm').val('');
		$('#tanggal-petugas-spr-rm').val('');
		$('#id-petugas-pendaftaran-sprt').val('');
		document.getElementById("operasi-spr-rm").checked = false;
		document.getElementById("odc-spr-rm").checked = false;
		document.getElementById("rawat-inap-spr-rm").checked = false;
		document.getElementById("j-spr-1-rm").checked = false;
		document.getElementById("j-spr-2-rm").checked = false;
		document.getElementById("infeksi-spr-rm").checked = false;
		document.getElementById("non-infeksi-spr-rm").checked = false;
		document.getElementById("cito-spr-rm").checked = false;
		document.getElementById("tidak-cito-spr-rm").checked = false;
		document.getElementById("icu-spr-rm").checked = false;
		document.getElementById("hcu-spr-rm").checked = false;
		document.getElementById("pcu-spr-rm").checked = false;
		document.getElementById("nicu-spr-rm").checked = false;
		document.getElementById("vk-spr-rm").checked = false;
		document.getElementById("perinatologi-spr-rm").checked = false;
		document.getElementById("ruang-perawatan-spr-rm").checked = false;
		document.getElementById("isolasi-spr-rm").checked = false;
		document.getElementById("lain-lain-spr-rm").checked = false;
		document.getElementById("ceklis-dokter-spr-rm").checked = false;
		document.getElementById("ceklis-petugas-spr-rm").checked = false;

		// $("#nama-pasien-spr-rm").prop("disabled", false);
		// $("#j-spr-1-rm").prop("disabled", false);
		// $("#j-spr-2-rm").prop("disabled", false);
		// $("#no-rm-spr-rm").prop("disabled", false);
		// $("#umur-spr-rm").prop("disabled", false);

		$("#nama-pasien-spr-rm").prop("disabled", true);
		$("#j-spr-1-rm").prop("disabled", true);
		$("#j-spr-2-rm").prop("disabled", true);
		$("#no-rm-spr-rm").prop("disabled", true);
		$("#umur-spr-rm").prop("disabled", true);
	}
</script>