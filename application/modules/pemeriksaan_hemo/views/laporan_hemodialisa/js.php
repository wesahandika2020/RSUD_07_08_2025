<script>
	$(function() {
		// $('#waktu-laporan').datetimepicker({
		// 	format: 'DD/MM/YYYY HH:mm',
		// 	pickSecond: false,
		// 	pick12HourFormat: false
		// });

		// checkbox program hd lain-lain
		$('#dilakukan-program-lain-input').attr('disabled', true);
		$('#dilakukan-program-lain').change(function() {
			if ($(this).is(":checked")) {
				$('#dilakukan-program-lain-input').attr('disabled', false);
			} else {
				$('#dilakukan-program-lain-input').val('');
				$('#dilakukan-program-lain-input').attr('disabled', true);
			}
		});

		// checkbox akses sirkulasi lain-lain
		$('#askses-sirkulasi-catheter-input').attr('disabled', true);
		$('#askses-sirkulasi-catheter').change(function() {
			if ($(this).is(":checked")) {
				$('#askses-sirkulasi-catheter-input').attr('disabled', false);
			} else {
				$('#askses-sirkulasi-catheter-input').val('');
				$('#askses-sirkulasi-catheter-input').attr('disabled', true);
			}
		});

		// select2 dokter
		$('#dokter-jaga').select2c({
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
				return data.nama;
			}
		});

		$('#perawat-hd, #perawat-ruangan').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: 18,
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
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#waktu-awal, #waktu-akhir').datetimepicker({
			format: 'HH:mm',
			pickDate: false,
			pickSeconds: false,
			pick12HourFormat: false,
		});
	})

	function resetLaporanHemodialisa() {
		$('.clear-input, #id-laporan-hd').val('');
		$('#form-laporan-hd')[0].reset();
		$('#dokter-jaga').val('');
		$('#s2id_dokter-jaga a .select2c-chosen').html('Pilih dokter jaga');
		$('#perawat-hd').val('');
		$('#s2id_perawat-hd a .select2c-chosen').html('Pilih perawat HD');
		$('#perawat-ruangan').val('');
		$('#s2id_perawat-ruangan a .select2c-chosen').html('Pilih perawat ruangan');
	}

	function entriLaporanHemodialisa(id_pendaftaran, id_layanan_pendaftaran, id_rawat_inap) {
		resetLaporanHemodialisa();

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pemeriksaan_hemo/api/pemeriksaan_hemo/get_detail_laporan_hd") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#id-pendaftaran-laporan-hd').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-laporan-hd').val(id_layanan_pendaftaran);
				$('#id-rawat-inap-laporan-hd').val(id_rawat_inap);

				$('#pasien-laporan-no-rm').text(data.pasien.id_pasien);
				$('#pasien-laporan-nama').text(data.pasien.nama);
				$('#pasien-laporan-tanggal-lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : ''));
				$('#pasien-laporan-kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

				// $('#bangsal').val(data.layanan.bangsal);
				// $('#id-bangsal').val(data.layanan.id_bangsal);
				$('#cara-bayar').text((data.layanan.cara_bayar !== 'Tunai' ? data.layanan.cara_bayar + ' (' + data.layanan.penjamin + ')' : data.layanan.cara_bayar));

				$('#dokter-jaga').val(data.layanan.id_dokter);
				$('#s2id_dokter-jaga a .select2c-chosen').html(data.layanan.dokter);
				$('#modal-laporan-hemodialisa').modal('show');

				$('#table-laporan-hd tbody').empty();
				if (data.laporan_hd.length > 0) {
					$.each(data.laporan_hd, function(i, v) {
						var html = /* html */ `
							<tr>
								<td class="center nowrap">${(v.waktu !== null ? datetimefmysql(v.waktu) : '-')}</td>
								<td>${v.keluhan_utama}</td>
								<td class="center">${v.tensi_sistolik} / ${v.tensi_diastolik} mmHg</td>
								<td class="center">${v.suhu} &#8451;</td>
								<td class="center">${v.nadi} x/mnt</td>
								<td class="center">${v.respirasi} x/mnt</td>
								<td class="center">${(v.ventilator !== null ? '&#10003;' : '-')}</td>
								<td class="aksi right">
									<button type="button" class="btn btn-secondary btn-xs" onclick="cetakLaporanHD(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									<button type="button" class="btn btn-secondary btn-xs" onclick="editLaporanHD(${v.id}, this)"><i class="fas fa-edit mr-1"></i>Edit</button>
									<button type="button" class="btn btn-danger btn-xs" onclick="hapusLaporanHD(${v.id}, this)"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
								</td>
							</tr>
						`;

						$('#table-laporan-hd tbody').append(html);
					})
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

	function konfirmasiSimpanLaporanHD() {
		var stop = false;
		if ($('#dokter-jaga').val() === '') {
			syams_validation('#dokter-jaga', 'Dokter jaga harus diisi!');
			stop = true;
		}

		// if ($('#perawat-hd').val() === '') {
		// 	syams_validation('#perawat-hd', 'Perawat HD harus diisi!');
		// 	stop = true;
		// }

		$('#modal-laporan-hemodialisa').animate({
			scrollTop: 0
		}, '300');

		if (stop) {
			return false;
		}

		Swal.fire({
			title: 'Konfirmasi?',
			text: "Apakah anda yakin ingin menyimpan laporan Hemodialisa ?",
			icon: 'question',
			showCancelButton: true,
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			confirmButtonColor: '#3085d6',
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanLaporanHD();
			}
		})
	}

	function simpanLaporanHD() {
		let update = '';
		if ($('#id-laporan-hd').val() !== '') {
			update = '/id_laporan_hd/' + $('#id-laporan-hd').val();
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("pemeriksaan_hemo/api/pemeriksaan_hemo/update_laporan_hd") ?>' + update,
			data: $('#form-laporan-hd').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === false) {
					messageCustom(data.message, 'Error');
				} else {
					messageCustom(data.message, 'Success');
				}

				$('#modal-laporan-hemodialisa').modal('hide');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Terjadi kesalahan, Gagal menyimpan laporan hemodialisa', 'Error');
			},
		});
	}

	function hapusLaporanHD(id, obj) {
		swal.fire({
			title: 'Konfirmasi Hapus',
			html: "Apakah anda yakin ingin menghapus data ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-trash-alt mr-1"></i>Ya, Hapus',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url("pemeriksaan_hemo/api/pemeriksaan_hemo/delete_laporan_hd") ?>/' + id,
					cache: false,
					dataType: 'JSON',
					success: function(data) {
						if (data.status === false) {
							messageCustom('Gagal menghapus laporan HD', 'Error');
						} else {
							messageCustom('Berhasil menghapus laporan HD', 'Success');
						}

						removeListLphapusLaporanHD(obj);
						resetFormLphapusLaporanHD();
					},
					error: function(e) {
						messageCustom('Terjadi kesalahan sistem dalam menghapus data', 'Error');
					}
				});
			}
		})
	}

	function removeListLphapusLaporanHD(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}

	function editLaporanHD(id, obj) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pemeriksaan_hemo/api/pemeriksaan_hemo/get_laporan_hd_by_id") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				resetLaporanHemodialisa();
				$('#id-laporan-hd').val(data.id);
				$('#id-layanan-pendaftaran-laporan-hd').val(data.id_layanan_pendaftaran);
				// $('#id-rawat-inap-laporan-hd').val(data.id_rawat_inap);
				$('#dokter-jaga').val(data.id_dokter);
				$('#s2id_dokter-jaga a .select2c-chosen').html(data.dokter_jaga);
				$('#perawat-hd').val(data.id_perawat_hd);
				$('#s2id_perawat-hd a .select2c-chosen').html(data.perawat_hd);
				$('#perawat-ruangan').val(data.id_perawat_ruangan);
				$('#s2id_perawat-ruangan a .select2c-chosen').html(data.perawat_ruangan);
				$('#ranap-asal-hd').val(data.ranap_asal_hd);


				$('#waktu-laporan').val((data.waktu !== null ? datetimefmysql(data.waktu) : '<?= date('d/m/Y H:i:s') ?>'));
				// $('#bangsal').val(data.ruang_rawat);
				// $('#id-bangsal').val(data.id_ruang_rawat);

				$('#waktu-awal').val(data.waktu_awal);
				$('#waktu-akhir').val(data.waktu_akhir);

				var program = JSON.parse(data.program);
				if (program.hd !== '') {
					$('#dilakukan-program-hd').prop('checked', true)
				}
				if (program.sleed !== '') {
					$('#dilakukan-program-sleed').prop('checked', true)
				}
				if (program.hfr !== '') {
					$('#dilakukan-program-hfr').prop('checked', true)
				}
				if (program.hdf !== '') {
					$('#dilakukan-program-hdf').prop('checked', true)
				}
				if (program.lain !== '') {
					$('#dilakukan-program-lain').prop('checked', true)
				}
				if (program.lain !== '') {
					$('#dilakukan-program-lain-input').val(program.ket_lain)
				}
				if (program.dengan !== '') {
					$('#dengan').val(program.dengan)
				}

				$('#waktu-dialisis').val(data.waktu_dialisis);
				$('#quick-blood').val(data.quick_blood);
				$('#quick-dialysat').val(data.quick_dialysat);
				$('#profilling-uf').val(data.profilling_uf);
				$('#profilling-na').val(data.profilling_na);
				$('#profilling-lain').val(data.profilling_lain);
				$('#uf-goal').val(data.uf_goal);

				var akses_sirkulasi = JSON.parse(data.akses_sirkulasi);
				if (akses_sirkulasi.cimino !== '') {
					$('#akses-sirkulasi-cimino').prop('checked', true)
				}
				if (akses_sirkulasi.femoral !== '') {
					$('#akses-sirkulasi-femoral').prop('checked', true)
				}
				if (akses_sirkulasi.catheter !== '') {
					$('#akses-sirkulasi-catheter').prop('checked', true)
				}
				if (akses_sirkulasi.catheter !== '') {
					$('#akses-sirkulasi-catheter-input').val(akses_sirkulasi.ket_catheter)
				}

				// Pre HD
				$('#keluhan-utama-laporan').val(data.keluhan_utama);
				$('#keadaan-umum-laporan').val(data.keadaan_umum);
				$('#kesadaran-laporan').val(data.kesadaran);
				$('#gcs-e').val(data.gcs_e);
				$('#gcs-m').val(data.gcs_m);
				$('#gcs-v').val(data.gcs_v);
				$('#tensi-s-laporan').val(data.tensi_sistolik);
				$('#tensi-d-laporan').val(data.tensi_diastolik);
				$('#suhu-laporan').val(data.suhu);
				$('#nadi-laporan').val(data.nadi);
				$('#respirasi-laporan').val(data.respirasi);
				if (data.ventilator !== null) {
					$('#ventilator').prop('checked', true)
				}
				$('#on-hd').val(data.on_hd);

				// Post HD
				$('#waktu-dialisis-post-hd').val(data.waktu_dialisis_post_hd);
				$('#transfusi').val(data.transfusi);
				$('#terapi-cairan').val(data.terapi_cairan);
				$('#asupan-cairan').val(data.asupan_cairan);
				$('#hasil-lain').val(data.hasil_lain);
				$('#uf-goal-post-hd').val(data.uf_goal_post_hd);
				$('#uf-goal-lain').val(data.uf_goal_lain);
				$('#uf-goal-jumlah').val(data.uf_goal_jumlah);

				$('#jumlah-hasil').val(data.jumlah);
				$('#balance-hasil').val(data.balance);

				$('#keterangan-lain-laporan').val(data.keterangan_lain);
				$('#keterangan-lain-laporan').val(data.keterangan_lain);

				if (data.ket_darah_lab == 1) {
					$('#darah-lab-diambil').prop('checked', true);
				} else if (data.ket_darah_lab == 0) {
					$('#darah-lab-tidak-diambil').prop('checked', true);
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function cetakLaporanHD(id_laporan_hd, id_pendaftaran, id_layanan_pendaftaran) {
		window.open('<?= base_url() ?>pemeriksaan_hemo/printing_laporan_hemodialisa?id_laporan_hd=' + id_laporan_hd + '&id_pendaftaran=' + id_pendaftaran + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran, 'Cetak Laporan Hemodialisa', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}
</script>