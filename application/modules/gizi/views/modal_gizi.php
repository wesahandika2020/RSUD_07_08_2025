<!-- <style type="text/css"> tr, td { border-color: black; border: solid 1px; }</style> -->
<script>
	$(function() {
		$("#wizard-gizi").bwizard();
		$("#wizard-riwayat-gizi").bwizard();
		$("#wizard-form").bwizard();
		$("#ga-wizard-form-cppt").bwizard();

		$('#ga-petugas, #gd-petugas, #kg-petugas, #rga-petugas, #rgd-petugas, #rkg-petugas').select2c({
			ajax: {
				url: "<?= base_url('pelayanan/api/pelayanan/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: 22,
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
		$('#ga-tgl-masuk, #ga-tgl-skrining, #ga-tgl-monev-1, #ga-tgl-monev-2, #ga-tgl-monev-3, #ga-tgl-monev-4, #rga-tgl-masuk, #rga-tgl-skrining, #rga-tgl-monev-1, #rga-tgl-monev-2, #rga-tgl-monev-3, #rga-tgl-monev-4').datetimepicker({
            format: 'DD/MM/YYYY',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        });
		$('#ga-tgl-petugas, #gd-tgl-petugas, #kg-tgl-petugas, #rga-tgl-petugas, #rgd-tgl-petugas, #rkg-tgl-petugas').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        });
        $('#ga-dokter, #gd-dokter, #kg-dokter').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: 22,
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
	});

	function entriGizi(id_pendaftaran, id_layanan_pendaftaran, bed) {
		$('#wizard-gizi').bwizard('show', '0');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#ga-id-layanan-pendaftaran, #gd-id-layanan-pendaftaran, #kg-id-layanan-pendaftaran').val(id_layanan_pendaftaran);
				$('#ga-id-pendaftaran, #gd-id-pendaftaran, #kg-id-pendaftaran').val(id_pendaftaran);
				$('#ga-rwyt-bed, #gd-rwyt-bed, #kg-rwyt-bed').val(bed);
				$('#ga-pasien, #gd-pasien, #kg-pasien').val(data.pasien.no_rm);
				if (data.pasien !== null) {
					$('#ga-pasien-nama, #nama-pasien').text(data.pasien.nama);
					$('#ga-pasien-no-rm').text(data.pasien.no_rm);
					$('#ga-pasien-tanggal-lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
					$('#ga-pasien-jenis-kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
					$('#ga-dpjp').text(data.layanan.dokter);


					if(data.layanan.tindak_lanjut !== null){
						if(data.layanan.tindak_lanjut === 'Rawat Inap'){
							$.ajax({
								type: 'GET',
								url: '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_ranap") ?>/id_layanan/' + id_layanan_pendaftaran,
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {

									if(data.bangsal_ri !== null){

										let bed_ri = data.bangsal_ri;
										bangsal_bed = bed_ri + ' kelas ' + data.kelas_ri + ' ruang ' + data.ruang_ri + ' No. Bed ' + data.bed_ri;
										$('#ga-status-ruang-pasien').val(bangsal_bed);

									} else {

										$('#ga-status-ruang-pasien').val('Ruangan dan Bed Masih dalam status request');
									}
								},
								complete: function() {
									hideLoader();
								},
								error: function(e) {
									accessFailed(e.status);
								}
							})
						} else if(data.layanan.tindak_lanjut === 'Intensive Care'){
							$.ajax({
							type: 'GET',
							url: '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_icare") ?>/id_layanan/' + id_layanan_pendaftaran,
							cache: false,
							dataType: 'JSON',
							beforeSend: function() {
								showLoader();
							},
							success: function(data) {

								if(data.bangsal_ic !== null){

									let bed_ic = data.bangsal_ic;
									bangsal_bed = bed_ic + ' kelas ' + data.kelas_ic + ' ruang ' + data.ruang_ic + ' No. Bed ' + data.bed_ic;
									$('#ga-status-ruang-pasien').val(bangsal_bed);

								} else {

									$('#ga-status-ruang-pasien').val('Ruangan dan Bed Masih dalam status request');
								}

							},
							complete: function() {
								hideLoader();
							},
							error: function(e) {
								accessFailed(e.status);
							}
						})

						} else {

							$('#ga-status-ruang-pasien').val('Masih Di tempat');
						}

					} else {
						$('#ga-status-ruang-pasien').val('Masih Di tempat');
					}
				}

				$('#ga-bed').text(bed);

				$('#ga-ruang').val(bed);
				$('#ga-ruang1').text(bed);
				$('#ga-usia').val(hitungUmur(data.pasien.tanggal_lahir));
				$('#ga-usia1').text(hitungUmur(data.pasien.tanggal_lahir));

				resetGiziAnak();
				resetGiziDietetik();
				resetKonsultasiGizi();
				showGiziAnak(id_pendaftaran, id_layanan_pendaftaran, bed);
				showGiziDietetik(id_pendaftaran, id_layanan_pendaftaran);
				showKonsultasiGizi(id_pendaftaran, id_layanan_pendaftaran);

				$('#modal-gizi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})

	}

	function riwayatGizi(id_pendaftaran, id_layanan_pendaftaran, bed) {
		$('#wizard-riwayat-gizi').bwizard('show', '0');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#rga-id-layanan-pendaftaran, #rgd-id-layanan-pendaftaran, #rkg-id-layanan-pendaftaran').val(id_layanan_pendaftaran);
				$('#rga-id-pendaftaran, #rgd-id-pendaftaran, #rkg-id-pendaftaran').val(id_pendaftaran);
				$('#rga-rwyt-bed, #rgd-rwyt-bed, #rkg-rwyt-bed').val(bed);
				$('#rga-pasien, #rgd-pasien, #rkg-pasien').val(data.pasien.no_rm);
				if (data.pasien !== null) {
					$('#rga-pasien-nama, #nama-pasien').text(data.pasien.nama);
					$('#rga-pasien-no-rm').text(data.pasien.no_rm);
					$('#rga-pasien-tanggal-lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
					$('#rga-pasien-jenis-kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
					$('#rga-dpjp').text(data.layanan.dokter);


					if(data.layanan.tindak_lanjut !== null){
						if(data.layanan.tindak_lanjut === 'Rawat Inap'){
							$.ajax({
								type: 'GET',
								url: '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_ranap") ?>/id_layanan/' + id_layanan_pendaftaran,
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {

									if(data.bangsal_ri !== null){

										let bed_ri = data.bangsal_ri;
										bangsal_bed = bed_ri + ' kelas ' + data.kelas_ri + ' ruang ' + data.ruang_ri + ' No. Bed ' + data.bed_ri;
										$('#rga-status-ruang-pasien').val(bangsal_bed);

									} else {

										$('#rga-status-ruang-pasien').val('Ruangan dan Bed Masih dalam status request');
									}
								},
								complete: function() {
									hideLoader();
								},
								error: function(e) {
									accessFailed(e.status);
								}
							})
						} else if(data.layanan.tindak_lanjut === 'Intensive Care'){
							$.ajax({
							type: 'GET',
							url: '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_icare") ?>/id_layanan/' + id_layanan_pendaftaran,
							cache: false,
							dataType: 'JSON',
							beforeSend: function() {
								showLoader();
							},
							success: function(data) {

								if(data.bangsal_ic !== null){

									let bed_ic = data.bangsal_ic;
									bangsal_bed = bed_ic + ' kelas ' + data.kelas_ic + ' ruang ' + data.ruang_ic + ' No. Bed ' + data.bed_ic;
									$('#rga-status-ruang-pasien').val(bangsal_bed);

								} else {

									$('#rga-status-ruang-pasien').val('Ruangan dan Bed Masih dalam status request');
								}

							},
							complete: function() {
								hideLoader();
							},
							error: function(e) {
								accessFailed(e.status);
							}
						})

						} else {

							$('#rga-status-ruang-pasien').val('Masih Di tempat');
						}

					} else {
						$('#rga-status-ruang-pasien').val('Masih Di tempat');
					}
				}

				$('#rga-bed').text(bed);

				$('#rga-ruang').val(bed);
				$('#rga-ruang1').text(bed);
				$('#rga-usia').val(hitungUmur(data.pasien.tanggal_lahir));
				$('#rga-usia1').text(hitungUmur(data.pasien.tanggal_lahir));

				resetRiwayatGiziAnak();
				resetRiwayatGiziDietetik();
				resetRiwayatKonsultasiGizi();
				showRiwayatGiziAnak(id_layanan_pendaftaran, bed);
				showRiwayatGiziDietetik(id_layanan_pendaftaran);
				showRiwayatKonsultasiGizi(id_layanan_pendaftaran);

				$('#modal-riwayat-gizi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})

	}

	//  gizi anak
	function simpanGiziAnak() {
		if ($('#ga-tgl-masuk').val() === '') {
			syams_validation('#ga-tgl-masuk', 'Tanggal Masuk harus diisi.');
			return false;
		} else {
			syams_validation_remove('#ga-tgl-masuk');
		}
		if ($('#ga-tgl-skrining').val() === '') {
			syams_validation('#ga-tgl-skrining', 'Tanggal Skrining harus diisi.');
			return false;
		} else {
			syams_validation_remove('#ga-tgl-skrining');
		}
		if ($('#ga-tgl-petugas').val() === '') {
			syams_validation('#ga-tgl-petugas', 'Tanggal dan jam harus diisi.');
			return false;
		} else {
			syams_validation_remove('#ga-tgl-petugas');
		}
		if ($('#ga-petugas').val() === '') {
			syams_validation('#ga-petugas', 'Dietisien / Nutrisionist harus diisi.');
			// $('#ga-petugas').focus();
			return false;
		} else {
			syams_validation_remove('#ga-petugas');
		}
		if ($('#ga-dokter').val() === '') {
			syams_validation('#ga-dokter', 'Dokter harus diisi.');
			// $('#ga-dokter').focus();
			return false;
		} else {
			syams_validation_remove('#ga-dokter');
		}
		$.ajax({
			type: 'POST',
			url: '<?= base_url("gizi/api/gizi/simpan_gizi_anak") ?>',
			data: $('#form-gizi-anak').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// $('#modal-gizi').modal('hide');
				if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal-gizi').modal('hide');
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			},
		});
	}

	function showGiziAnak(id_pendaftaran, id_layanan_pendaftaran, bed) {
		$.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_gizi_anak") ?>/' + id_pendaftaran + '/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set values
				if(data.gizi != null){

					$('#btn-cetak-ga').prop('hidden', false);
					$('#ga-id').val(data.gizi.id_ga);
					$('#ga-ruang1').val(bed);
					$('#ga-tgl-masuk').val(datefmysql(data.gizi.ga_tgl_masuk));
					$('#ga-tgl-skrining').val(datefmysql(data.gizi.ga_tgl_skrining));
					// $('#ga_usia1').text((data.pasien.tanggal_lahir !== null ? hitungUmur(data.pasien.tanggal_lahir) : '-'));
					$('#ga-diagnosa-medis').val(data.gizi.ga_diagnosa_medis);
					$('#ga-bb').val(data.gizi.ga_bb);
					$('#ga-bbu').val(data.gizi.ga_bbu);
					$('#ga-kesan').val(data.gizi.ga_kesan);
					$('#ga-pb').val(data.gizi.ga_pb);
					$('#ga-pbu').val(data.gizi.ga_pbu);
					$('#ga-bbi').val(data.gizi.ga_bbi);
					$('#ga-bbpb').val(data.gizi.ga_bbpb);
					$('#ga-lla').val(data.gizi.ga_lla);
					$('#ga-ha').val(data.gizi.ga_ha);
					$('#ga-biokimia').val(data.gizi.ga_biokimia);
					$('#ga-klinis').val(data.gizi.ga_klinis);
					$('#ga-pola-makan').val(data.gizi.ga_pola_makan);
					$('#ga-problem').val(data.gizi.ga_problem);
					$('#ga-etiologi').val(data.gizi.ga_etiologi);
					$('#ga-gejala').val(data.gizi.ga_gejala);
					$('#ga-alergi-lainnya').val(data.gizi.ga_alergi_lainnya);
					$('#ga-preskripsi').val(data.gizi.ga_preskripsi);
					$('#ga-energi').val(data.gizi.ga_energi);
					$('#ga-lemak').val(data.gizi.ga_lemak);
					$('#ga-protein').val(data.gizi.ga_protein);
					$('#ga-karbohidrat').val(data.gizi.ga_karbohidrat);
					$('#ga-cairan').val(data.gizi.ga_cairan);
					$('#ga-route').val(data.gizi.ga_route);
					$('#ga-frekuensi').val(data.gizi.ga_frekuensi);
					$('#ga-monitoring').val(data.gizi.ga_monitoring);
					$('#ga-tgl-monev-1').val(datefmysql(data.gizi.ga_tgl_monev_1));
					$('#ga-tgl-monev-2').val(datefmysql(data.gizi.ga_tgl_monev_2));
					$('#ga-tgl-monev-3').val(datefmysql(data.gizi.ga_tgl_monev_3));
					$('#ga-tgl-monev-4').val(datefmysql(data.gizi.ga_tgl_monev_4));
					$('#ga-antropometri-1').val(data.gizi.ga_antropometri_1);
					$('#ga-antropometri-2').val(data.gizi.ga_antropometri_2);
					$('#ga-antropometri-3').val(data.gizi.ga_antropometri_3);
					$('#ga-antropometri-4').val(data.gizi.ga_antropometri_4);
					$('#ga-biokimia-1').val(data.gizi.ga_biokimia_1);
					$('#ga-biokimia-2').val(data.gizi.ga_biokimia_2);
					$('#ga-biokimia-3').val(data.gizi.ga_biokimia_3);
					$('#ga-biokimia-4').val(data.gizi.ga_biokimia_4);
					$('#ga-klinis-1').val(data.gizi.ga_klinis_1);
					$('#ga-klinis-2').val(data.gizi.ga_klinis_2);
					$('#ga-klinis-3').val(data.gizi.ga_klinis_3);
					$('#ga-klinis-4').val(data.gizi.ga_klinis_4);
					$('#ga-asupan-1').val(data.gizi.ga_asupan_1);
					$('#ga-asupan-2').val(data.gizi.ga_asupan_2);
					$('#ga-asupan-3').val(data.gizi.ga_asupan_3);
					$('#ga-asupan-4').val(data.gizi.ga_asupan_4);
					$('#ga-monitoring-lain').val(data.gizi.ga_monitoring_lain);
					$('#ga-monitoring-lain-1').val(data.gizi.ga_monitoring_lain_1);
					$('#ga-monitoring-lain-2').val(data.gizi.ga_monitoring_lain_2);
					$('#ga-monitoring-lain-3').val(data.gizi.ga_monitoring_lain_3);
					$('#ga-monitoring-lain-4').val(data.gizi.ga_monitoring_lain_4);
					$('#ga-tgl-petugas').val(datetimefmysql(data.gizi.ga_tgl_petugas));

					// value radio
					if (data.gizi.ga_risiko === '1') {
						document.getElementById("ga-risiko-rendah").checked = true;
					}
					if (data.gizi.ga_risiko === '2') {
						document.getElementById("ga-risiko-sedang").checked = true;
					}
					if (data.gizi.ga_risiko === '3') {
						document.getElementById("ga-risiko-tinggi").checked = true;
					}

					if (data.gizi.ga_telur === '1') {
						document.getElementById("ga-telur-ya").checked = true;
					}
					if (data.gizi.ga_telur === '2') {
						document.getElementById("ga-telur-tidak").checked = true;
					}

					if (data.gizi.ga_udang === '1') {
						document.getElementById("ga-udang-ya").checked = true;
					}
					if (data.gizi.ga_udang === '2') {
						document.getElementById("ga-udang-tidak").checked = true;
					}

					if (data.gizi.ga_sapi === '1') {
						document.getElementById("ga-sapi-ya").checked = true;
					}
					if (data.gizi.ga_sapi === '2') {
						document.getElementById("ga-sapi-tidak").checked = true;
					}

					if (data.gizi.ga_ikan === '1') {
						document.getElementById("ga-ikan-ya").checked = true;
					}
					if (data.gizi.ga_ikan === '2') {
						document.getElementById("ga-ikan-tidak").checked = true;
					}

					if (data.gizi.ga_kedelai === '1') {
						document.getElementById("ga-kedelai-ya").checked = true;
					}
					if (data.gizi.ga_kedelai === '2') {
						document.getElementById("ga-kedelai-tidak").checked = true;
					}

					if (data.gizi.ga_almond === '1') {
						document.getElementById("ga-almond-ya").checked = true;
					}
					if (data.gizi.ga_almond === '2') {
						document.getElementById("ga-almond-tidak").checked = true;
					}

					if (data.gizi.ga_gandum === '1') {
						document.getElementById("ga-gandum-ya").checked = true;
					}
					if (data.gizi.ga_gandum === '2') {
						document.getElementById("ga-gandum-tidak").checked = true;
					}

					if (data.gizi.ga_tindak === '1') {
						document.getElementById("ga-tindak-perlu").checked = true;
					}
					if (data.gizi.ga_tindak === '2') {
						document.getElementById("ga-tindak-tidak").checked = true;
					}

					if (data.gizi.ga_makanan === '1') {
						document.getElementById("ga-makanan-cair").checked = true;
					}
					if (data.gizi.ga_makanan === '2') {
						document.getElementById("ga-makanan-lunak").checked = true;
					}
					if (data.gizi.ga_makanan === '3') {
						document.getElementById("ga-makanan-saring").checked = true;
					}
					if (data.gizi.ga_makanan === '4') {
						document.getElementById("ga-makanan-biasa").checked = true;
					}

					if (data.gizi.ga_cara_makan === '1') {
						document.getElementById("ga-cara-makan-oral").checked = true;
					}
					if (data.gizi.ga_cara_makan === '2') {
						document.getElementById("ga-cara-makan-ngt").checked = true;
					}

					// petugas
					$('#ga-petugas').val(data.gizi.ga_petugas);
					$('#s2id_ga-petugas a .select2c-chosen').html(data.gizi.petugas);
					data.gizi.ga_ttd == '1' ? $('#ga-ttd').prop('checked', true) : $('#ga-ttd').prop('checked', false);
					$('#ga-dokter').val(data.gizi.ga_dokter);
					$('#s2id_ga-dokter a .select2c-chosen').html(data.gizi.dokter);
					data.gizi.ga_ttd_dokter == '1' ? $('#ga-ttd-dokter').prop('checked', true) : $('#ga-ttd-dokter').prop('checked', false);

					let html = '';
					html = /* html */ `
						<button type="button" class="btn btn-info mr-2" onclick="cetkaGiziAnak()"><span><i class="fas fa-fw fa-print mr-1"></i>Print</span></button>
					`;
					$('#ga-tombol').append(html);
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

	function resetGiziAnak() {
        $('#form-gizi-anak')[0].reset()
		$('#ga-id').val('')
        $('.checked').prop('checked', false);
		$('#ga-tombol').empty();
        $('#ga-petugas').val('')
        $('#s2id_ga-petugas a .select2c-chosen').html('')
        $('#ga-dokter').val('')
        $('#s2id_ga-dokter a .select2c-chosen').html('')
	}

	function cetkaGiziAnak() {
		
		let ga_id = $('#ga-id').val();
        let id_pendaftaran = $('#ga-id-pendaftaran').val();
        let id_layanan_pendaftaran = $('#ga-id-layanan-pendaftaran').val();
        let bed = $('#ga-ruang1').val();
		var dWidth = $(window).width();
		var dHeight = $(window).height();
		var x = screen.width / 2 - dWidth / 2;
		var y = screen.height / 2 - dHeight / 2;

		window.open('<?= base_url('gizi/cetak_diet_anak/') ?>' + ga_id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran + '/' + bed, 'Cetak Diet Anak', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
		
	}

	// gizi dietetik
	function simpanGiziDietetik() {
		
		if ($('#gd-tgl-petugas').val() === '') {
			syams_validation('#gd-tgl-petugas', 'Tanggal dan jam harus diisi.');
			return false;
		} else {
			syams_validation_remove('#gd-tgl-petugas');
		}
		if ($('#gd-petugas').val() === '') {
			syams_validation('#gd-petugas', 'Dietisien / Nutrisionist harus diisi.');
			// $('#gd-petugas').focus();
			return false;
		} else {
			syams_validation_remove('#gd-dokter');
		}
		if ($('#gd-dokter').val() === '') {
			syams_validation('#gd-dokter', 'Dokter harus diisi.');
			// $('#gd-dokter').focus();
			return false;
		} else {
			syams_validation_remove('#gd-dokter');
		}
		$.ajax({
			type: 'POST',
			url: '<?= base_url("gizi/api/gizi/simpan_gizi_dietetik") ?>',
			data: $('#form-gizi-dietetik').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// $('#modal-gizi').modal('hide');
				if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal-gizi').modal('hide');
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			},
		});
	}

	function showGiziDietetik(id_pendaftaran, id_layanan_pendaftaran) {
		$.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_gizi_dietetik") ?>/' + id_pendaftaran + '/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
				
                // Set values
				if(data.dietetik != null){

					$('#btn-cetak-gd').prop('hidden', false);

					$('#gd-id').val(data.dietetik.id_gd);
					$('#gd-medis').val(data.dietetik.gd_medis);
					$('#gd-alergi-lainnya').val(data.dietetik.gd_alergi_lainnya);
					$('#gd-bb').val(data.dietetik.gd_bb);
					$('#gd-lila').val(data.dietetik.gd_lila);
					$('#gd-tb').val(data.dietetik.gd_tb);
					$('#gd-tilut').val(data.dietetik.gd_tilut);
					$('#gd-imt').val(data.dietetik.gd_imt);
					$('#gd-status-gizi').val(data.dietetik.gd_status_gizi);
					$('#gd-penyakit-lainnya').val(data.dietetik.gd_penyakit_lainnya);
					$('#gd-preskripsi').val(data.dietetik.gd_preskripsi);
					$('#gd-energi').val(data.dietetik.gd_energi);
					$('#gd-lemak').val(data.dietetik.gd_lemak);
					$('#gd-protein').val(data.dietetik.gd_protein);
					$('#gd-karbohidrat').val(data.dietetik.gd_karbohidrat);
					$('#gd-cairan').val(data.dietetik.gd_cairan);
					$('#gd-route').val(data.dietetik.gd_route);
					$('#gd-frekuensi').val(data.dietetik.gd_frekuensi);
					$('#gd-laboratorium').val(data.dietetik.gd_laboratorium);
					$('#gd-klinis').val(data.dietetik.gd_klinis);
					$('#gd-problem').val(data.dietetik.gd_problem);
					$('#gd-etiologi').val(data.dietetik.gd_etiologi);
					$('#gd-gejala').val(data.dietetik.gd_gejala);
					$('#gd-monitoring').val(data.dietetik.gd_monitoring);

					// value radio
					if (data.dietetik.gd_risiko === '1') {
						document.getElementById("gd-risiko-ringan").checked = true;
					}
					if (data.dietetik.gd_risiko === '2') {
						document.getElementById("gd-risiko-sedang").checked = true;
					}
					if (data.dietetik.gd_risiko === '3') {
						document.getElementById("gd-risiko-tinggi").checked = true;
					}
					
					if (data.dietetik.gd_kondisi === '1') {
						document.getElementById("gd-kondisi-ya").checked = true;
					}
					if (data.dietetik.gd_kondisi === '2') {
						document.getElementById("gd-kondisi-tidak").checked = true;
					}
					
					if (data.dietetik.gd_alergi === '1') {
						document.getElementById("gd-alergi-telur").checked = true;
					}
					if (data.dietetik.gd_alergi === '2') {
						document.getElementById("gd-alergi-sapi").checked = true;
					}
					if (data.dietetik.gd_alergi === '3') {
						document.getElementById("gd-alergi-kacang").checked = true;
					}
					if (data.dietetik.gd_alergi === '4') {
						document.getElementById("gd-alergi-gandum").checked = true;
					}
					if (data.dietetik.gd_alergi === '5') {
						document.getElementById("gd-alergi-udang").checked = true;
					}
					if (data.dietetik.gd_alergi === '6') {
						document.getElementById("gd-alergi-ikan").checked = true;
					}
					if (data.dietetik.gd_alergi === '7') {
						document.getElementById("gd-alergi-almond").checked = true;
					}

					if (data.dietetik.gd_makanan === '1') {
						document.getElementById("gd-makanan-biasa").checked = true;
					}
					if (data.dietetik.gd_makanan === '2') {
						document.getElementById("gd-makanan-diet").checked = true;
					}

					if (data.dietetik.gd_asuhan === '1') {
						document.getElementById("gd-asuahn-perlu").checked = true;
					}
					if (data.dietetik.gd_asuhan === '2') {
						document.getElementById("gd-asuahn-tidak").checked = true;
					}

					if (data.dietetik.gd_kesulitan === '1') {
						document.getElementById("gd-kesulitan-ya").checked = true;
					}
					if (data.dietetik.gd_kesulitan === '2') {
						document.getElementById("gd-kesulitan-tidak").checked = true;
					}

					if (data.dietetik.gd_setengah === '1') {
						document.getElementById("gd-setengah-ya").checked = true;
					}
					if (data.dietetik.gd_setengah === '2') {
						document.getElementById("gd-setengah-tidak").checked = true;
					}

					if (data.dietetik.gd_tigaperempat === '1') {
						document.getElementById("gd-tigaperempat-ya").checked = true;
					}
					if (data.dietetik.gd_tigaperempat === '2') {
						document.getElementById("gd-tigaperempat-tidak").checked = true;
					}

					if (data.dietetik.gd_penurunan === '1') {
						document.getElementById("gd-penurunan-ya").checked = true;
					}
					if (data.dietetik.gd_penurunan === '2') {
						document.getElementById("gd-penurunan-tidak").checked = true;
					}

					if (data.dietetik.gd_perubahan === '1') {
						document.getElementById("gd-perubahan-ya").checked = true;
					}
					if (data.dietetik.gd_perubahan === '2') {
						document.getElementById("gd-perubahan-tidak").checked = true;
					}

					if (data.dietetik.gd_mual === '1') {
						document.getElementById("gd-mual-ya").checked = true;
					}
					if (data.dietetik.gd_mual === '2') {
						document.getElementById("gd-mual-tidak").checked = true;
					}

					if (data.dietetik.gd_muntah === '1') {
						document.getElementById("gd-muntah-ya").checked = true;
					}
					if (data.dietetik.gd_muntah === '2') {
						document.getElementById("gd-muntah-tidak").checked = true;
					}

					if (data.dietetik.gd_gangguan === '1') {
						document.getElementById("gd-gangguan-ya").checked = true;
					}
					if (data.dietetik.gd_gangguan === '2') {
						document.getElementById("gd-gangguan-tidak").checked = true;
					}

					if (data.dietetik.gd_perlu === '1') {
						document.getElementById("gd-perlu-ya").checked = true;
					}
					if (data.dietetik.gd_perlu === '2') {
						document.getElementById("gd-perlu-tidak").checked = true;
					}

					if (data.dietetik.gd_sering === '1') {
						document.getElementById("gd-sering-ya").checked = true;
					}
					if (data.dietetik.gd_sering === '2') {
						document.getElementById("gd-sering-tidak").checked = true;
					}

					if (data.dietetik.gd_masalah === '1') {
						document.getElementById("gd-masalah-ya").checked = true;
					}
					if (data.dietetik.gd_masalah === '2') {
						document.getElementById("gd-masalah-tidak").checked = true;
					}

					if (data.dietetik.gd_diare === '1') {
						document.getElementById("gd-diare-ya").checked = true;
					}
					if (data.dietetik.gd_diare === '2') {
						document.getElementById("gd-diare-tidak").checked = true;
					}

					if (data.dietetik.gd_konstipati === '1') {
						document.getElementById("gd-konstipati-ya").checked = true;
					}
					if (data.dietetik.gd_konstipati === '2') {
						document.getElementById("gd-konstipati-tidak").checked = true;
					}

					if (data.dietetik.gd_pendarahan === '1') {
						document.getElementById("gd-pendarahan-ya").checked = true;
					}
					if (data.dietetik.gd_pendarahan === '2') {
						document.getElementById("gd-pendarahan-tidak").checked = true;
					}

					if (data.dietetik.gd_bersendawa === '1') {
						document.getElementById("gd-bersendawa-ya").checked = true;
					}
					if (data.dietetik.gd_bersendawa === '2') {
						document.getElementById("gd-bersendawa-tidak").checked = true;
					}

					if (data.dietetik.gd_intoleransi === '1') {
						document.getElementById("gd-intoleransi-ya").checked = true;
					}
					if (data.dietetik.gd_intoleransi === '2') {
						document.getElementById("gd-intoleransi-tidak").checked = true;
					}

					if (data.dietetik.gd_diet === '1') {
						document.getElementById("gd-diet-ya").checked = true;
					}
					if (data.dietetik.gd_diet === '2') {
						document.getElementById("gd-diet-tidak").checked = true;
					}

					if (data.dietetik.gd_ngt === '1') {
						document.getElementById("gd-ngt-ya").checked = true;
					}
					if (data.dietetik.gd_ngt === '2') {
						document.getElementById("gd-ngt-tidak").checked = true;
					}

					if (data.dietetik.gd_lemah === '1') {
						document.getElementById("gd-lemah-ya").checked = true;
					}
					if (data.dietetik.gd_lemah === '2') {
						document.getElementById("gd-lemah-tidak").checked = true;
					}

					if (data.dietetik.gd_dirawat === '1') {
						document.getElementById("gd-dirawat-ya").checked = true;
					}
					if (data.dietetik.gd_dirawat === '2') {
						document.getElementById("gd-dirawat-tidak").checked = true;
					}
					
					if (data.dietetik.gd_tigakg === '1') {
						document.getElementById("gd-tigakg-ya").checked = true;
					}
					if (data.dietetik.gd_tigakg === '2') {
						document.getElementById("gd-tigakg-tidak").checked = true;
					}
					
					if (data.dietetik.gd_enamkg === '1') {
						document.getElementById("gd-enamkg-ya").checked = true;
					}
					if (data.dietetik.gd_enamkg === '2') {
						document.getElementById("gd-enamkg-tidak").checked = true;
					}
					
					if (data.dietetik.gd_penyakit === '1') {
						document.getElementById("gd-penyakit-keganasan").checked = true;
					}
					if (data.dietetik.gd_penyakit === '2') {
						document.getElementById("gd-penyakit-kronis").checked = true;
					}
					if (data.dietetik.gd_penyakit === '3') {
						document.getElementById("gd-penyakit-bakar").checked = true;
					}
					if (data.dietetik.gd_penyakit === '4') {
						document.getElementById("gd-penyakit-kepala").checked = true;
					}
					if (data.dietetik.gd_penyakit === '5') {
						document.getElementById("gd-penyakit-ginjal").checked = true;
					}
					
					if (data.dietetik.gd_jenis_makanan === '1') {
						document.getElementById("gd-makanan-cair").checked = true;
					}
					if (data.dietetik.gd_jenis_makanan === '2') {
						document.getElementById("gd-makanan-lunak").checked = true;
					}
					if (data.dietetik.gd_jenis_makanan === '3') {
						document.getElementById("gd-jenis-makanan-saring").checked = true;
					}
					if (data.dietetik.gd_jenis_makanan === '4') {
						document.getElementById("gd-jenis-makanan-biasa").checked = true;
					}
					
					if (data.dietetik.gd_cara_makan === '1') {
						document.getElementById("gd-cara-makan-oral").checked = true;
					}
					if (data.dietetik.gd_cara_makan === '2') {
						document.getElementById("gd-cara-makan-ngt").checked = true;
					}

					// petugas
					$('#gd-tgl-petugas').val(datetimefmysql(data.dietetik.gd_tgl_petugas));
					$('#gd-petugas').val(data.dietetik.gd_petugas);
					$('#s2id_gd-petugas a .select2c-chosen').html(data.dietetik.petugas);
					if (data.dietetik.gd_ttd === '1') {
						document.getElementById("gd-ttd").checked = true;
					}

					// dokter
					$('#gd-dokter').val(data.dietetik.gd_dokter);
					$('#s2id_gd-dokter a .select2c-chosen').html(data.dietetik.dokter);
					if (data.dietetik.gd_ttd_dokter === '1') {
						document.getElementById("gd-ttd-dokter").checked = true;
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

	function resetGiziDietetik() {
        $('#form-gizi-dietetik')[0].reset()
		$('#gd-id').val('');
        $('.checked').prop('checked', false)
        $('#gd-petugas').val('')
        $('#s2id_gd-petugas a .select2c-chosen').html('')
        $('#gd-dokter').val('')
        $('#s2id_gd-dokter a .select2c-chosen').html('')
	}

	function cetakDietetik() {
		
		let id_gd = $('#gd-id').val();
        let id_layanan_pendaftaran = $('#gd-id-layanan-pendaftaran').val();
        let id_pendaftaran = $('#gd-id-pendaftaran').val();
		var dWidth = $(window).width();
		var dHeight = $(window).height();
		var x = screen.width / 2 - dWidth / 2;
		var y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('gizi/cetak_dietetik/') ?>' + id_gd + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Dietetik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
		
	}

	// kosultasi gizi
	function simpanKonsultasiGizi() {
		
		if ($('#kg-tgl-petugas').val() === '') {
			syams_validation('#kg-tgl-petugas', 'Tanggal dan jam harus diisi.');
			return false;
		} else {
			syams_validation_remove('#kg-tgl-petugas');
		}
		if ($('#kg-petugas').val() === '') {
			syams_validation('#kg-petugas', 'Dietisien / Nutrisionist harus diisi.');
			// $('#kg-petugas').focus();
			return false;
		} else {
			syams_validation_remove('#kg-petugas');
		}
		if ($('#kg-dokter').val() === '') {
			syams_validation('#kg-dokter', 'Dokter harus diisi.');
			// $('#kg-dokter').focus();
			return false;
		} else {
			syams_validation_remove('#kg-dokter');
		}
		$.ajax({
			type: 'POST',
			url: '<?= base_url("gizi/api/gizi/simpan_konsultasi_gizi") ?>',
			data: $('#form-konsultasi-gizi').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal-gizi').modal('hide');
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			},
		});
	}

	function showKonsultasiGizi(id_pendaftaran, id_layanan_pendaftaran) {
		$.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_konsultasi_gizi") ?>/' + id_pendaftaran + '/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set values
				if(data.konsul != null){
					$('#kg-id').val(data.konsul.id_kg);
					$('#kg-bb').val(data.konsul.kg_bb);
					$('#kg-lla').val(data.konsul.kg_lla);
					$('#kg-pbb').val(data.konsul.kg_pbb);
					$('#kg-tb').val(data.konsul.kg_tb);
					$('#kg-imt').val(data.konsul.kg_imt);
					$('#kg-biokimia').val(data.konsul.kg_biokimia);
					$('#kg-klinis').val(data.konsul.kg_klinis);
					$('#kg-gizi').val(data.konsul.kg_gizi);
					$('#kg-personal').val(data.konsul.kg_personal);
					$('#kg-diagnosis').val(data.konsul.kg_diagnosis);
					$('#kg-tujuan').val(data.konsul.kg_tujuan);
					$('#kg-intervensi').val(data.konsul.kg_intervensi);
					$('#kg-konseling').val(data.konsul.kg_konseling);
					$('#kg-evaluasi').val(data.konsul.kg_evaluasi);


					// petugas
					$('#kg-tgl-petugas').val(datetimefmysql(data.konsul.kg_tgl_petugas));
					$('#kg-petugas').val(data.konsul.kg_petugas);
					$('#s2id_kg-petugas a .select2c-chosen').html(data.konsul.petugas);
					if (data.konsul.kg_ttd === '1') {
						document.getElementById("kg-ttd").checked = true;
					}
					$('#kg-dokter').val(data.konsul.kg_dokter);
					$('#s2id_kg-dokter a .select2c-chosen').html(data.konsul.dokter);
					if (data.konsul.kg_ttd === '1') {
						document.getElementById("kg-ttd-dokter").checked = true;
					}
					let html = '';
					html = /* html */ `
						<button type="button" class="btn btn-info mr-2" onclick="printKonsultasiGizi()"><span><i class="fas fa-fw fa-print mr-1"></i>Print</span></button>
					`;
					$('#kg-tombol').append(html);
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

	function resetKonsultasiGizi() {
        $('#form-konsultasi-gizi')[0].reset()
		$('#kg-id').val('');
        $('.checked').prop('checked', false);
        $('#kg-tombol').empty();
		$('#kg-petugas').val('');
        $('#s2id_kg-petugas a .select2c-chosen').html('')
		$('#kg-dokter').val('');
        $('#s2id_kg-dokter a .select2c-chosen').html('')
	}

	function printKonsultasiGizi() {
		let id_kg = $('#kg-id').val();
        let id_pendaftaran = $('#kg-id-pendaftaran').val();
        let id_layanan_pendaftaran = $('#kg-id-layanan-pendaftaran').val();

		var dWidth = $(window).width();
		var dHeight = $(window).height();
		var x = screen.width / 2 - dWidth / 2;
		var y = screen.height / 2 - dHeight / 2;
		window.open(
			'<?= base_url("gizi/cetak_konsultasi_gizi/") ?>' + id_kg + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Konsultasi Gizi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y
		);
	}


	// readonly gizi
	function showRiwayatGiziAnak(id_layanan_pendaftaran, bed) {
		$.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_gizi_anak") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set values
				if(data.gizi != null){
					$('#rga-id').val(data.gizi.id_ga);
					// $('#rga-ruang').val(bed);
					$('#rga-tgl-masuk').val(datefmysql(data.gizi.ga_tgl_masuk));
					$('#rga-tgl-skrining').val(datefmysql(data.gizi.ga_tgl_skrining));
					// $('#rga-usia').val(data.gizi.ga_usia);
					$('#rga-diagnosa-medis').val(data.gizi.ga_diagnosa_medis);
					$('#rga-bb').val(data.gizi.ga_bb);
					$('#rga-bbu').val(data.gizi.ga_bbu);
					$('#rga-kesan').val(data.gizi.ga_kesan);
					$('#rga-pb').val(data.gizi.ga_pb);
					$('#rga-pbu').val(data.gizi.ga_pbu);
					$('#rga-bbi').val(data.gizi.ga_bbi);
					$('#rga-bbpb').val(data.gizi.ga_bbpb);
					$('#rga-lla').val(data.gizi.ga_lla);
					$('#rga-ha').val(data.gizi.ga_ha);
					$('#rga-biokimia').val(data.gizi.ga_biokimia);
					$('#rga-klinis').val(data.gizi.ga_klinis);
					$('#rga-pola-makan').val(data.gizi.ga_pola_makan);
					$('#rga-problem').val(data.gizi.ga_problem);
					$('#rga-etiologi').val(data.gizi.ga_etiologi);
					$('#rga-gejala').val(data.gizi.ga_gejala);
					$('#rga-alergi-lainnya').val(data.gizi.ga_alergi_lainnya);
					$('#rga-preskripsi').val(data.gizi.ga_preskripsi);
					$('#rga-energi').val(data.gizi.ga_energi);
					$('#rga-lemak').val(data.gizi.ga_lemak);
					$('#rga-protein').val(data.gizi.ga_protein);
					$('#rga-karbohidrat').val(data.gizi.ga_karbohidrat);
					$('#rga-cairan').val(data.gizi.ga_cairan);
					$('#rga-route').val(data.gizi.ga_route);
					$('#rga-frekuensi').val(data.gizi.ga_frekuensi);
					$('#rga-monitoring').val(data.gizi.ga_monitoring);
					$('#rga-tgl-monev-1').val(datefmysql(data.gizi.ga_tgl_monev_1));
					$('#rga-tgl-monev-2').val(datefmysql(data.gizi.ga_tgl_monev_2));
					$('#rga-tgl-monev-3').val(datefmysql(data.gizi.ga_tgl_monev_3));
					$('#rga-tgl-monev-4').val(datefmysql(data.gizi.ga_tgl_monev_4));
					$('#rga-antropometri-1').val(data.gizi.ga_antropometri_1);
					$('#rga-antropometri-2').val(data.gizi.ga_antropometri_2);
					$('#rga-antropometri-3').val(data.gizi.ga_antropometri_3);
					$('#rga-antropometri-4').val(data.gizi.ga_antropometri_4);
					$('#rga-biokimia-1').val(data.gizi.ga_biokimia_1);
					$('#rga-biokimia-2').val(data.gizi.ga_biokimia_2);
					$('#rga-biokimia-3').val(data.gizi.ga_biokimia_3);
					$('#rga-biokimia-4').val(data.gizi.ga_biokimia_4);
					$('#rga-klinis-1').val(data.gizi.ga_klinis_1);
					$('#rga-klinis-2').val(data.gizi.ga_klinis_2);
					$('#rga-klinis-3').val(data.gizi.ga_klinis_3);
					$('#rga-klinis-4').val(data.gizi.ga_klinis_4);
					$('#rga-asupan-1').val(data.gizi.ga_asupan_1);
					$('#rga-asupan-2').val(data.gizi.ga_asupan_2);
					$('#rga-asupan-3').val(data.gizi.ga_asupan_3);
					$('#rga-asupan-4').val(data.gizi.ga_asupan_4);
					$('#rga-monitoring-lain').val(data.gizi.ga_monitoring_lain);
					$('#rga-monitoring-lain-1').val(data.gizi.ga_monitoring_lain_1);
					$('#rga-monitoring-lain-2').val(data.gizi.ga_monitoring_lain_2);
					$('#rga-monitoring-lain-3').val(data.gizi.ga_monitoring_lain_3);
					$('#rga-monitoring-lain-4').val(data.gizi.ga_monitoring_lain_4);
					$('#rga-tgl-petugas').val(datetimefmysql(data.gizi.ga_tgl_petugas));

					// value radio
					if (data.gizi.ga_risiko === '1') {
						document.getElementById("rga-risiko-rendah").checked = true;
					}
					if (data.gizi.ga_risiko === '2') {
						document.getElementById("rga-risiko-sedang").checked = true;
					}
					if (data.gizi.ga_risiko === '3') {
						document.getElementById("rga-risiko-tinggi").checked = true;
					}

					if (data.gizi.ga_telur === '1') {
						document.getElementById("rga-telur-ya").checked = true;
					}
					if (data.gizi.ga_telur === '2') {
						document.getElementById("rga-telur-tidak").checked = true;
					}

					if (data.gizi.ga_udang === '1') {
						document.getElementById("rga-udang-ya").checked = true;
					}
					if (data.gizi.ga_udang === '2') {
						document.getElementById("rga-udang-tidak").checked = true;
					}

					if (data.gizi.ga_sapi === '1') {
						document.getElementById("rga-sapi-ya").checked = true;
					}
					if (data.gizi.ga_sapi === '2') {
						document.getElementById("rga-sapi-tidak").checked = true;
					}

					if (data.gizi.ga_ikan === '1') {
						document.getElementById("rga-ikan-ya").checked = true;
					}
					if (data.gizi.ga_ikan === '2') {
						document.getElementById("rga-ikan-tidak").checked = true;
					}

					if (data.gizi.ga_kedelai === '1') {
						document.getElementById("rga-kedelai-ya").checked = true;
					}
					if (data.gizi.ga_kedelai === '2') {
						document.getElementById("rga-kedelai-tidak").checked = true;
					}

					if (data.gizi.ga_almond === '1') {
						document.getElementById("rga-almond-ya").checked = true;
					}
					if (data.gizi.ga_almond === '2') {
						document.getElementById("rga-almond-tidak").checked = true;
					}

					if (data.gizi.ga_gandum === '1') {
						document.getElementById("rga-gandum-ya").checked = true;
					}
					if (data.gizi.ga_gandum === '2') {
						document.getElementById("rga-gandum-tidak").checked = true;
					}

					if (data.gizi.ga_tindak === '1') {
						document.getElementById("rga-tindak-perlu").checked = true;
					}
					if (data.gizi.ga_tindak === '2') {
						document.getElementById("rga-tindak-tidak").checked = true;
					}

					if (data.gizi.ga_makanan === '1') {
						document.getElementById("rga-makanan-cair").checked = true;
					}
					if (data.gizi.ga_makanan === '2') {
						document.getElementById("rga-makanan-lunak").checked = true;
					}
					if (data.gizi.ga_makanan === '3') {
						document.getElementById("rga-makanan-saring").checked = true;
					}
					if (data.gizi.ga_makanan === '4') {
						document.getElementById("rga-makanan-biasa").checked = true;
					}

					if (data.gizi.ga_cara_makan === '1') {
						document.getElementById("rga-cara-makan-oral").checked = true;
					}
					if (data.gizi.ga_cara_makan === '2') {
						document.getElementById("rga-cara-makan-ngt").checked = true;
					}
					data.gizi.ga_ttd == '1' ? $('#rga-ttd').prop('checked', true) : $('#rga-ttd').prop('checked', false);

					// petugas
					$('#rga-petugas').val(data.gizi.ga_petugas);
					$('#s2id_rga-petugas a .select2c-chosen').html(data.gizi.petugas);
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

	function resetRiwayatGiziAnak() {
        $('#form-riwayat-gizi-anak')[0].reset()
		$('#rga-id').val('')
        $('.checked').prop('checked', false)
        $('#rga-petugas').val('')
        $('#s2id_rga-petugas a .select2c-chosen').html('')
	}

	function showRiwayatGiziDietetik(id_layanan_pendaftaran) {
		$.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_gizi_dietetik") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set values
				if(data.dietetik != null){
					$('#rgd-id').val(data.dietetik.id_gd);
					$('#rgd-medis').val(data.dietetik.gd_medis);
					$('#rgd-alergi-lainnya').val(data.dietetik.gd_alergi_lainnya);
					$('#rgd-bb').val(data.dietetik.gd_bb);
					$('#rgd-lila').val(data.dietetik.gd_lila);
					$('#rgd-tb').val(data.dietetik.gd_tb);
					$('#rgd-tilut').val(data.dietetik.gd_tilut);
					$('#rgd-imt').val(data.dietetik.gd_imt);
					$('#rgd-status-gizi').val(data.dietetik.gd_status_gizi);
					$('#rgd-penyakit-lainnya').val(data.dietetik.gd_penyakit_lainnya);
					$('#rgd-preskripsi').val(data.dietetik.gd_preskripsi);
					$('#rgd-energi').val(data.dietetik.gd_energi);
					$('#rgd-lemak').val(data.dietetik.gd_lemak);
					$('#rgd-protein').val(data.dietetik.gd_protein);
					$('#rgd-karbohidrat').val(data.dietetik.gd_karbohidrat);
					$('#rgd-cairan').val(data.dietetik.gd_cairan);
					$('#rgd-route').val(data.dietetik.gd_route);
					$('#rgd-frekuensi').val(data.dietetik.gd_frekuensi);
					$('#rgd-laboratorium').val(data.dietetik.gd_laboratorium);
					$('#rgd-klinis').val(data.dietetik.gd_klinis);
					$('#rgd-problem').val(data.dietetik.gd_problem);
					$('#rgd-etiologi').val(data.dietetik.gd_etiologi);
					$('#rgd-gejala').val(data.dietetik.gd_gejala);
					$('#rgd-monitoring').val(data.dietetik.gd_monitoring);

					// value radio
					if (data.dietetik.gd_risiko === '1') {
						document.getElementById("rgd-risiko-ringan").checked = true;
					}
					if (data.dietetik.gd_risiko === '2') {
						document.getElementById("rgd-risiko-sedang").checked = true;
					}
					if (data.dietetik.gd_risiko === '3') {
						document.getElementById("rgd-risiko-tinggi").checked = true;
					}
					
					if (data.dietetik.gd_kondisi === '1') {
						document.getElementById("rgd-kondisi-ya").checked = true;
					}
					if (data.dietetik.gd_kondisi === '2') {
						document.getElementById("rgd-kondisi-tidak").checked = true;
					}
					
					if (data.dietetik.gd_alergi === '1') {
						document.getElementById("rgd-alergi-telur").checked = true;
					}
					if (data.dietetik.gd_alergi === '2') {
						document.getElementById("rgd-alergi-sapi").checked = true;
					}
					if (data.dietetik.gd_alergi === '3') {
						document.getElementById("rgd-alergi-kacang").checked = true;
					}
					if (data.dietetik.gd_alergi === '4') {
						document.getElementById("rgd-alergi-gandum").checked = true;
					}
					if (data.dietetik.gd_alergi === '5') {
						document.getElementById("rgd-alergi-udang").checked = true;
					}
					if (data.dietetik.gd_alergi === '6') {
						document.getElementById("rgd-alergi-ikan").checked = true;
					}
					if (data.dietetik.gd_alergi === '7') {
						document.getElementById("rgd-alergi-almond").checked = true;
					}

					if (data.dietetik.gd_makanan === '1') {
						document.getElementById("rgd-makanan-biasa").checked = true;
					}
					if (data.dietetik.gd_makanan === '2') {
						document.getElementById("rgd-makanan-diet").checked = true;
					}

					if (data.dietetik.gd_asuhan === '1') {
						document.getElementById("rgd-asuahn-perlu").checked = true;
					}
					if (data.dietetik.gd_asuhan === '2') {
						document.getElementById("rgd-asuahn-tidak").checked = true;
					}

					if (data.dietetik.gd_kesulitan === '1') {
						document.getElementById("rgd-kesulitan-ya").checked = true;
					}
					if (data.dietetik.gd_kesulitan === '2') {
						document.getElementById("rgd-kesulitan-tidak").checked = true;
					}

					if (data.dietetik.gd_setengah === '1') {
						document.getElementById("rgd-setengah-ya").checked = true;
					}
					if (data.dietetik.gd_setengah === '2') {
						document.getElementById("rgd-setengah-tidak").checked = true;
					}

					if (data.dietetik.gd_tigaperempat === '1') {
						document.getElementById("rgd-tigaperempat-ya").checked = true;
					}
					if (data.dietetik.gd_tigaperempat === '2') {
						document.getElementById("rgd-tigaperempat-tidak").checked = true;
					}

					if (data.dietetik.gd_penurunan === '1') {
						document.getElementById("rgd-penurunan-ya").checked = true;
					}
					if (data.dietetik.gd_penurunan === '2') {
						document.getElementById("rgd-penurunan-tidak").checked = true;
					}

					if (data.dietetik.gd_perubahan === '1') {
						document.getElementById("rgd-perubahan-ya").checked = true;
					}
					if (data.dietetik.gd_perubahan === '2') {
						document.getElementById("rgd-perubahan-tidak").checked = true;
					}

					if (data.dietetik.gd_mual === '1') {
						document.getElementById("rgd-mual-ya").checked = true;
					}
					if (data.dietetik.gd_mual === '2') {
						document.getElementById("rgd-mual-tidak").checked = true;
					}

					if (data.dietetik.gd_muntah === '1') {
						document.getElementById("rgd-muntah-ya").checked = true;
					}
					if (data.dietetik.gd_muntah === '2') {
						document.getElementById("rgd-muntah-tidak").checked = true;
					}

					if (data.dietetik.gd_gangguan === '1') {
						document.getElementById("rgd-gangguan-ya").checked = true;
					}
					if (data.dietetik.gd_gangguan === '2') {
						document.getElementById("rgd-gangguan-tidak").checked = true;
					}

					if (data.dietetik.gd_perlu === '1') {
						document.getElementById("rgd-perlu-ya").checked = true;
					}
					if (data.dietetik.gd_perlu === '2') {
						document.getElementById("rgd-perlu-tidak").checked = true;
					}

					if (data.dietetik.gd_sering === '1') {
						document.getElementById("rgd-sering-ya").checked = true;
					}
					if (data.dietetik.gd_sering === '2') {
						document.getElementById("rgd-sering-tidak").checked = true;
					}

					if (data.dietetik.gd_masalah === '1') {
						document.getElementById("rgd-masalah-ya").checked = true;
					}
					if (data.dietetik.gd_masalah === '2') {
						document.getElementById("rgd-masalah-tidak").checked = true;
					}

					if (data.dietetik.gd_diare === '1') {
						document.getElementById("rgd-diare-ya").checked = true;
					}
					if (data.dietetik.gd_diare === '2') {
						document.getElementById("rgd-diare-tidak").checked = true;
					}

					if (data.dietetik.gd_konstipati === '1') {
						document.getElementById("rgd-konstipati-ya").checked = true;
					}
					if (data.dietetik.gd_konstipati === '2') {
						document.getElementById("rgd-konstipati-tidak").checked = true;
					}

					if (data.dietetik.gd_pendarahan === '1') {
						document.getElementById("rgd-pendarahan-ya").checked = true;
					}
					if (data.dietetik.gd_pendarahan === '2') {
						document.getElementById("rgd-pendarahan-tidak").checked = true;
					}

					if (data.dietetik.gd_bersendawa === '1') {
						document.getElementById("rgd-bersendawa-ya").checked = true;
					}
					if (data.dietetik.gd_bersendawa === '2') {
						document.getElementById("rgd-bersendawa-tidak").checked = true;
					}

					if (data.dietetik.gd_intoleransi === '1') {
						document.getElementById("rgd-intoleransi-ya").checked = true;
					}
					if (data.dietetik.gd_intoleransi === '2') {
						document.getElementById("rgd-intoleransi-tidak").checked = true;
					}

					if (data.dietetik.gd_diet === '1') {
						document.getElementById("rgd-diet-ya").checked = true;
					}
					if (data.dietetik.gd_diet === '2') {
						document.getElementById("rgd-diet-tidak").checked = true;
					}

					if (data.dietetik.gd_ngt === '1') {
						document.getElementById("rgd-ngt-ya").checked = true;
					}
					if (data.dietetik.gd_ngt === '2') {
						document.getElementById("rgd-ngt-tidak").checked = true;
					}

					if (data.dietetik.gd_lemah === '1') {
						document.getElementById("rgd-lemah-ya").checked = true;
					}
					if (data.dietetik.gd_lemah === '2') {
						document.getElementById("rgd-lemah-tidak").checked = true;
					}

					if (data.dietetik.gd_dirawat === '1') {
						document.getElementById("rgd-dirawat-ya").checked = true;
					}
					if (data.dietetik.gd_dirawat === '2') {
						document.getElementById("rgd-dirawat-tidak").checked = true;
					}
					
					if (data.dietetik.gd_tigakg === '1') {
						document.getElementById("rgd-tigakg-ya").checked = true;
					}
					if (data.dietetik.gd_tigakg === '2') {
						document.getElementById("rgd-tigakg-tidak").checked = true;
					}
					
					if (data.dietetik.gd_enamkg === '1') {
						document.getElementById("rgd-enamkg-ya").checked = true;
					}
					if (data.dietetik.gd_enamkg === '2') {
						document.getElementById("rgd-enamkg-tidak").checked = true;
					}
					
					if (data.dietetik.gd_penyakit === '1') {
						document.getElementById("rgd-penyakit-keganasan").checked = true;
					}
					if (data.dietetik.gd_penyakit === '2') {
						document.getElementById("rgd-penyakit-kronis").checked = true;
					}
					if (data.dietetik.gd_penyakit === '3') {
						document.getElementById("rgd-penyakit-bakar").checked = true;
					}
					if (data.dietetik.gd_penyakit === '4') {
						document.getElementById("rgd-penyakit-kepala").checked = true;
					}
					if (data.dietetik.gd_penyakit === '5') {
						document.getElementById("rgd-penyakit-ginjal").checked = true;
					}
					
					if (data.dietetik.gd_jenis_makanan === '1') {
						document.getElementById("rgd-makanan-cair").checked = true;
					}
					if (data.dietetik.gd_jenis_makanan === '2') {
						document.getElementById("rgd-makanan-lunak").checked = true;
					}
					if (data.dietetik.gd_jenis_makanan === '3') {
						document.getElementById("rgd-jenis-makanan-saring").checked = true;
					}
					if (data.dietetik.gd_jenis_makanan === '4') {
						document.getElementById("rgd-jenis-makanan-biasa").checked = true;
					}
					
					if (data.dietetik.gd_cara_makan === '1') {
						document.getElementById("rgd-cara-makan-oral").checked = true;
					}
					if (data.dietetik.gd_cara_makan === '2') {
						document.getElementById("rgd-cara-makan-ngt").checked = true;
					}

					// petugas
					$('#rgd-tgl-petugas').val(datetimefmysql(data.dietetik.gd_tgl_petugas));
					$('#rgd-petugas').val(data.dietetik.gd_petugas);
					$('#s2id_rgd-petugas a .select2c-chosen').html(data.dietetik.petugas);
					data.dietetik.gd_ttd == '1' ? $('#rgd-ttd').prop('checked', true) : $('#rgd-ttd').prop('checked', false);
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

	function resetRiwayatGiziDietetik() {
        $('#form-riwayat-gizi-dietetik')[0].reset()
		$('#rgd-id').val('');
        $('.checked').prop('checked', false)
        $('#rgd-petugas').val('')
        $('#s2id_rgd-petugas a .select2c-chosen').html('')
	}

	function showRiwayatKonsultasiGizi(id_layanan_pendaftaran) {
		$.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/get_konsultasi_gizi") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set values
				if(data.konsul != null){
					$('#rkg-id').val(data.konsul.id_kg);
					$('#rkg-bb').val(data.konsul.kg_bb);
					$('#rkg-lla').val(data.konsul.kg_lla);
					$('#rkg-pbb').val(data.konsul.kg_pbb);
					$('#rkg-tb').val(data.konsul.kg_tb);
					$('#rkg-imt').val(data.konsul.kg_imt);
					$('#rkg-biokimia').val(data.konsul.kg_biokimia);
					$('#rkg-klinis').val(data.konsul.kg_klinis);
					$('#rkg-gizi').val(data.konsul.kg_gizi);
					$('#rkg-personal').val(data.konsul.kg_personal);
					$('#rkg-diagnosis').val(data.konsul.kg_diagnosis);
					$('#rkg-tujuan').val(data.konsul.kg_tujuan);
					$('#rkg-intervensi').val(data.konsul.kg_intervensi);
					$('#rkg-konseling').val(data.konsul.kg_konseling);
					$('#rkg-evaluasi').val(data.konsul.kg_evaluasi);


					// petugas
					$('#rkg-tgl-petugas').val(datetimefmysql(data.konsul.kg_tgl_petugas));
					$('#rkg-petugas').val(data.konsul.kg_petugas);
					$('#s2id_rkg-petugas a .select2c-chosen').html(data.konsul.petugas);
					data.konsul.kg_ttd == '1' ? $('#rkg-ttd').prop('checked', true) : $('#rkg-ttd').prop('checked', false);
					let html = '';
					html = /* html */ `
						<button type="button" class="btn btn-info mr-2" onclick="printKonsultasiGizi()"><span><i class="fas fa-fw fa-print mr-1"></i>Print</span></button>
					`;
					$('#rkg-tombol').append(html);
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

	function resetRiwayatKonsultasiGizi() {
        $('#form-riwayat-konsultasi-gizi')[0].reset()
		$('#rkg-id').val('');
        $('.checked').prop('checked', false)
        $('#rkg-tombol').empty()
        $('#s2id_rkg-petugas a .select2c-chosen').html('')
	}

	// diagnosa
	function riwayatDiagnosisPasien() {
		$('#wizard-form').bwizard('show', '0');
		let id_pendaftaran = $('#ga-id-pendaftaran, #rga-id-pendaftaran').val();
		let id_layanan = $('#ga-id-layanan-pendaftaran, #rga-id-layanan-pendaftaran').val();
		let riwayat_bed = $('#ga-rwyt-bed, #rga-rwyt-bed').val();

		$.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

            	let pasien = data.pasien;
            	let umur = '';

				if (pasien.tanggal_lahir !== null) {
                        
                    umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';

                }

                $('#identitas-pasien-diagnosis').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

                if (data.diagnosa.length > 0) {
                    showDiagnosis(data.diagnosa);
                } else {
                    $('#ga-table-diagnosis tbody').empty();
                }

                $('#ga-modal-diagnosis').modal('show');
                $('#ga-modal-diagnosis-label').html('Riwayat Diagnosis Pasien');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {

            }
        });
	}

	function showDiagnosis(data) {
        $('#ga-table-diagnosis tbody').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let kodeDiagnosa = '';
                let diagnosa = '';
                if (v.diangnosa_manual == 1) {
                    diagnosa = `<input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}
                                <input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}`;
                } else {
                    diagnosa = `<input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}
                                <input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}`;
                    kodeDiagnosa = v.golongan_sebab_sakit.substr(0, 3);
                }
                
                let html = /* html */ `
                    <tr>
                        <td class="number-diag center">
                            <input type="hidden"> ${(++i)}
                            <input type="hidden"">
                        </td>
                        <td class="nowrap">
                            ${v.dokter}
                        </td>
                        
                        <td>
                            ${diagnosa}
                        </td>
                        <td>
                            ${(v.diagnosa_klinis == 1) ? 'Ya' : 'Tidak' }
                        </td>
                        <td>
                            ${(v.prioritas)}
                        </td>
                        <td>
                            ${(v.diagnosa_banding)}
                        </td>
                        <td>
                            ${(v.diagnosa_akhir == 1) ? 'Ya' : 'Tidak' }
                        </td>
                        <td>
                            ${(v.penyebab_kematian == 1) ? 'Ya' : 'Tidak' }
                        </td>
                    </tr>
                `;

                $('#ga-table-diagnosis tbody').append(html);
            });

        }
    }

    function riwayatCPPTPasien() {
		$('#ga-modal-cppt').modal('show');
		$('#ga-wizard-form-cppt').bwizard('show', '0');
		$('#ga-modal-cppt-label').html('Riwayat CPPT Pasien');
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		let id_layanan_pendaftaran = $('#ga-id-layanan-pendaftaran').val();
		let page = 1;
		let id_pendaftaran = $('#ga-id-pendaftaran').val();

		$('#cppt-waktu-search').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date(),
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#cppt-waktu-search').change(function() {
			riwayatCPPTPasien();
		});

		$('#cppt-img-calendar').click(function() {
			$('#cppt-waktu-search').datepicker('show')
		});
		
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {

				let pasien = data.pasien;
				let umur = '';

				if (pasien.tanggal_lahir !== null) {
						
					umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';

				}

				$('#identitas-pasien-cppt').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {

			}
		});
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_list_cppt") ?>/page/' + page + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran+ '/id_pendaftaran/' + id_pendaftaran,
			data: 'keyword=' + $('#cppt-keyword').val() + '&waktu=' + $('#cppt-waktu-search').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					riwayatCPPTPasien('', page - 1);
					return false;
				}

				$('#cppt-pagination').html(pagination2(data.jumlah, data.limit, data.page, 1));
				$('#cppt-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-cppt-gizi tbody').empty();
				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					var hasil = '<h5><b>SOAP</b></h5>'+ '<br>';
					if (v.subject !== '') {
						hasil += '<b>Subjective : </b><div class="justify">' + (v.subject !== null ? v.subject : '-') + '</div>';
					}
					if (v.objective !== '') {
						hasil += '<br> <b>Objective : </b><div class="justify">' + (v.objective !== null ? v.objective : '-') + '</div>';
					}
					if (v.assessment !== '') {
						hasil += '<br> <b>Assessment : </b><div class="justify">' + (v.assessment !== null ? v.assessment : '-') + '</div>';
					}
					if (v.plan !== '') {
						hasil += '<br> <b>Plan : </b><div class="justify">' + (v.plan !== null ? v.plan : '-') + '</div>' + '<br>';
					}

					hasil += '<br><h5><b>ADIME</b></h5>' + '<br>';

					if (v.ademi_assesment !== '') {
						hasil += ' <b>Assessment : </b><div class="justify">' + (v.ademi_assesment !== null ? v.ademi_assesment : '-') + '</div>';
					}
					if (v.ademi_diag !== '') {
						hasil += '<br> <b>Diagnosis : </b><div class="justify">' + (v.ademi_diag !== null ? v.ademi_diag : '-') + '</div>';
					}
					if (v.ademi_interv !== '') {
						hasil += '<br> <b>Intervention : </b><div class="justify">' + (v.ademi_interv !== null ? v.ademi_interv : '-') + '</div>';
					}
					if (v.ademi_monev !== '') {
						hasil += '<br> <b>Monitoring / Evaluation : </b><div class="justify">' + (v.ademi_monev !== null ? v.ademi_monev : '-') + '</div>' + '<br>';
					}

					hasil += '<br><h5><b>SBAR</b></h5>' + '<br>';

					if (v.sbar_situation !== '') {
						hasil += '<b>Situation : </b><div class="justify">' + (v.sbar_situation !== null ? v.sbar_situation : '-') + '</div>';
					}
					if (v.sbar_background !== '') {
						hasil += '<br> <b>Background : </b><div class="justify">' + (v.sbar_background !== null ? v.sbar_background : '-') + '</div>';
					}
					if (v.sbar_assesment !== '') {
						hasil += '<br> <b>Assessment : </b><div class="justify">' + (v.sbar_assesment !== null ? v.sbar_assesment : '-') + '</div>';
					}
					if (v.sbar_recommend !== '') {
						hasil += '<br> <b>Recommendation : </b><div class="justify">' + (v.sbar_recommend !== null ? v.sbar_recommend : '-') + '</div>' + '<br>';
					}

					var html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td class="center">${(v.waktu !== null ? datetimefmysql(v.waktu) : '-')}</td>
							<td class="center">${v.nadis}<br>(${v.profesi})</td>
							<td>${hasil}</td>
							<td>${v.instruksi_ppa}</td>
							<td class="center"></td>
						</tr>
					`;

					$('#table-cppt-gizi tbody').append(html);
				});
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed('Gagal mendapatkan data!');
			}
		});
	}

	function lihatHasilLAB() {
		let id_pendaftaran = $('#ga-id-pendaftaran').val();
		let id_layanan_pendaftaran = $('#ga-id-layanan-pendaftaran').val();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let pasien = '';
				pasien = data.pasien;
				if (pasien !== null) {

					let kelamin = '';
					if (pasien.kelamin == 'L') {
						kelamin = 'Laki - laki';
					} else if (pasien.kelamin == 'P') {
						kelamin = 'Perempuan';
					}

					let umur = '';
					if (pasien.tanggal_lahir !== null | pasien.tanggal_lahir !== '') {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
					}

					$('#no-rm-detail').text(pasien.id_pasien);
					$('#no-register-detail').text(pasien.no_register);
					$('#nama-detail').text(pasien.nama);
					$('#alamat-detail').text(pasien.alamat);
					$('#kelamin-detail').text(kelamin);
					$('#umur-detail').text(umur);
					$('#nama-pjwb-detail').text(pasien.nama_pjwb);
					$('#alamat-pjwb-detail').text(pasien.alamat_pjwb);
					$('#telp-pjwb-detail').text(pasien.telp_pjwb);
					$('#instansi-perujuk-detail').text(pasien.instansi_perujuk);
					$('#tenaga-medis-perujuk-detail').text(pasien.nadis_perujuk);
				}

				$('#modal-ga-lab').modal('show');

				ambilHasilLab(id_layanan_pendaftaran);

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function ambilHasilLab(id_layanan) {
		$('#hasil-pemeriksaan-laboratorium').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/ambil_hasil_lab") ?>/id_layanan/' + id_layanan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				if (data.length === 0) {

					let tipe = 'Error';
                    messageCustom('Data Laboratorium Belum Tersedia', tipe);
				}

				if(data !== null){

					let html = /* html */ `
									<div class="row mt-3" id="item-lab">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
												</div>
												<div class="widget-body">
													<table class="table table-hover table-striped table-sm color-table info-table">
														<thead>
															<tr>
																<th width="30%">Jenis Pemeriksaan</th>
																<th width="20%" class="center">Hasil</th>
																<th width="15%" class="center">Satuan</th>
																<th width="10%" class="center">Nilai Rujukan</th>
															</tr>
														</thead>
														<tbody>


								`; 

					$.each(data, function(i, value) {

						
						
						if(i === 0){

							html += /* html */ `
													<tr>
														<td class="v-center bold">${value.test_group !== null ? value.test_group : 'Hasil Lab Belum Tersedia atau Tersinkronisasi'}</td>
														<td class="v-center bold">${value.ono !== null ? value.ono : '-'}</td>
													</tr>
												`;
						}

						

						html += /* html */ `
										<tr>
											<td class="v-center">${value.nama_item !== null ? value.nama_item : '-'}</td>
											<td class="v-center center">${value.result_value !== null ? value.result_value : '-'}</td>
											<td class="v-center center">${value.unit !== null ? value.unit : '-'}</td>
											<td class="v-center center">${value.ref_range !== null ? value.ref_range : '-'}</td>
										</tr>
										
									`;
						
					})
							 
						html += /* html */ `
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>						
							`;

						$('#hasil-pemeriksaan-laboratorium').append(html);
						
				

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


</script>


<!-- end catatan perkembangan pasien terintegrasi -->

<!-- Modal -->
<input type="hidden" name="page_now" id="d-page-now">
<div class="modal fade" id="modal-gizi">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:95%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-form-gizi">Form Gizi</h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<!-- header -->
				<div class="row">
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="20%" class="bold">Nama Pasien</td>
									<td wdith="80%">: <span id="ga-pasien-nama"></span></td>
								</tr>
								<tr>
									<td class="bold">No. RM</td>
									<td>: <span id="ga-pasien-no-rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Tanggal Lahir</td>
									<td>: <span id="ga-pasien-tanggal-lahir"></span></td>
								</tr>
								<tr>
									<td class="bold">Jenis Kelamin</td>
									<td>: <span id="ga-pasien-jenis-kelamin"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
									<td wdith="70%">: <span id="ga-bed"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="30%" class="bold">Dokter Penanggung Jawab</td>
									<td wdith="70%">: <span id="ga-dpjp"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Diagnosis Pasien</td>
									<td wdith="70%">: <span><button type="button" title="Klik untuk melihat diagnosis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatDiagnosisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Diagnosis Pasien</button></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">CPPT</td>
									<td wdith="70%">: <span><button type="button" title="Klik untuk melihat CPPT pasien" class="btn btn-secondary btn-xxs" onclick="riwayatCPPTPasien()"><i class="fas fa-eye m-r-5"></i>Lihat CPPT Pasien</button></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Hasil Lab</td>
									<td wdith="70%">: <span><button type="button" title="Klik untuk melihat Hasil Lab pasien" class="btn btn-secondary btn-xxs" onclick="lihatHasilLAB()"><i class="fas fa-eye m-r-5"></i>Hasil Lab Pasien</button></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="widget-body">
							<!-- form dpmp -->
							<div id="wizard-gizi">
								<!-- Tab bwizard -->
								<ol>
									<li>Formulir Asuhan Gizi Anak</li>
									<li>Formulir Asuhan Gizi dan Dietetik</li>
									<li>Formulir Konsultasi Gizi</li>
								</ol>

								<!-- Data bwizard -->
								<!-- gizi anak -->
								<div>
									<?= form_open('', 'id=form-gizi-anak class=form-horizontal') ?>
									<div class="form-gizi-anak">
										<input type="hidden" name="id_layanan_pendaftaran" id="ga-id-layanan-pendaftaran">
										<input type="hidden" name="id_pendaftaran" id="ga-id-pendaftaran">
										<input type="hidden" name="riwayat_bed" id="ga-rwyt-bed">
										<input type="hidden" name="id_ga" id="ga-id">
										<input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
										<input type="hidden" name="id_pasien" id="ga-pasien">
										<div class="row">
											<div class="col-lg-12">
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="15%">Ruang/kelas</td>
															<td>
																<input type="hidden" name="ga_ruang" id="ga-ruang">
																<span id="ga-ruang1"></span>
															</td>
														</tr>
														<tr>
															<td width="15%">Tanggal Masuk</td>
															<td><input type="text" id="ga-tgl-masuk" name="ga_tgl_masuk" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy"></td>
														</tr>
														<tr>
															<td width="15%">Tanggal Skrining</td>
															<td><input type="text" id="ga-tgl-skrining" name="ga_tgl_skrining" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy"></td>
														</tr>
														<tr>
															<td width="15%">Usia</td>
															<td>
																<input type="hidden" name="ga_usia" id="ga-usia">
																<span id="ga-usia1"></span>
															</td>
														</tr>
														<tr>
															<td width="15%">diagnosa Medis</td>
															<td><input type="text" id="ga-diagnosa-medis" name="ga_diagnosa_medis" class="custom-form clear-input d-inline-block col-lg-3"></td>
														</tr>
														<tr>
															<td colspan="2"><b>Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Risiko rendah (Total skor 0)</td>
															<td><input type="radio" name="ga_risiko" id="ga-risiko-rendah" value="1"></td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Risiko sedang (Total skor 1 - 3)</td>
															<td><input type="radio" name="ga_risiko" id="ga-risiko-sedang" value="2"></td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Risiko berat (Total skor 4 - 5)</td>
															<td><input type="radio" name="ga_risiko" id="ga-risiko-tinggi" value="3"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="9"><b>ASESMEN GIZI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th colspan="9"><b>Antropometri</b></th>
														</tr>
														<tr>
															<td class="pl-3" width="10%">BB</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-bb" name="ga_bb" class="custom-form clear-input d-inline-block col-lg-2"> kg</td>
															<td width="10%">BB/U</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-bbu" name="ga_bbu" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="5%">kesan</td>
															<td width="1%">:</td>
															<td rowspan="4"><textarea name="ga_kesan" id="ga-kesan" class="form-control" rows="5"></textarea></td>
														</tr>
														<tr>
															<td class="pl-3" width="10%">PB atau TB</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-pb" name="ga_pb" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
															<td width="10%">PB/U atau TB/U/U</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-pbu" name="ga_pbu" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td colspan="2"></td>
														</tr>
														<tr>
															<td class="pl-3" width="10%">BBI</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-bbi" name="ga_bbi" class="custom-form clear-input d-inline-block col-lg-2"> kg</td>
															<td width="10%">BB/PB atau BB/TB</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-bbpb" name="ga_bbpb" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td colspan="2"></td>
														</tr>
														<tr>
															<td class="pl-3" width="5%">LLA</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-lla" name="ga_lla" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
															<td width="5%">HA</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-ha" name="ga_ha" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td colspan="2"></td>
														</tr>
														<tr>
															<th colspan="9"><b>Biokimia</b></th>
														</tr>
														<tr>
															<th colspan="9" class="text-center pl-3"><textarea name="ga_biokimia" id="ga-biokimia" class="custom-textarea" rows="4"></textarea></th>
														</tr>
														<tr>
															<th colspan="9"><b>Klinis / Fisik</b></th>
														</tr>
														<tr>
															<th colspan="9" class="text-center pl-3"><textarea name="ga_klinis" id="ga-klinis" class="custom-textarea" rows="4"></textarea></th>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped" style="margin-top: -17px;">
													<tbody>
														<tr>
															<th colspan="7"><b>Riwayat Gizi</b></th>
														</tr>
														<tr>
															<td class="pl-3"><b>Alergi Makan :</b></td>
															<td></td>
															<td><b>Ya</b></td>
															<td><b>Tidak</b></td>
															<td></td>
															<td><b>Ya</b></td>
															<td><b>Tidak</b></td>
														</tr>
														<tr>
															<td width="4%"></td>
															<td width="10%">Telur</td>
															<td width="2%"><input type="radio" name="ga_telur" id="ga-telur-ya" value="1"></td>
															<td width="10%"><input type="radio" name="ga_telur" id="ga-telur-tidak" value="2"></td>
															<td width="5%">Udang</td>
															<td width="2%"><input type="radio" name="ga_udang" id="ga-udang-ya" value="1"></td>
															<td width="10%"><input type="radio" name="ga_udang" id="ga-udang-tidak" value="2"></td>
														</tr>
														<tr>
															<td></td>
															<td>Susu sapi dan produk olahannya</td>
															<td><input type="radio" name="ga_sapi" id="ga-sapi-ya" value="1"></td>
															<td><input type="radio" name="ga_sapi" id="ga-sapi-tidak" value="2"></td>
															<td>Ikan</td>
															<td><input type="radio" name="ga_ikan" id="ga-ikan-ya" value="1"></td>
															<td><input type="radio" name="ga_ikan" id="ga-ikan-tidak" value="2"></td>
														</tr>
														<tr>
															<td></td>
															<td>Kacang kedelai/tanah</td>
															<td><input type="radio" name="ga_kedelai" id="ga-kedelai-ya" value="1"></td>
															<td><input type="radio" name="ga_kedelai" id="ga-kedelai-tidak" value="2"></td>
															<td>Hazelnut/almond</td>
															<td><input type="radio" name="ga_almond" id="ga-almond-ya" value="1"></td>
															<td><input type="radio" name="ga_almond" id="ga-almond-tidak" value="2"></td>
														</tr>
														<tr>
															<td></td>
															<td>Gluten/gandum</td>
															<td><input type="radio" name="ga_gandum" id="ga-gandum-ya" value="1"></td>
															<td><input type="radio" name="ga_gandum" id="ga-gandum-tidak" value="2"></td>
															<td>Lainnya </td>
															<td colspan="2"><input type="text" id="ga-alergi-lainnya" name="ga_alergi_lainnya" class="custom-form clear-input d-inline-block"></td>
														</tr>
														<tr>
															<td class="pl-3"><b>Pola Makan  :</b></td>
															<td colspan="6"> <textarea name="ga_pola_makan" id="ga-pola-makan" class="custom-textarea" rows="4"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped" style="margin-top: -17px;">
													<tbody>
														<tr>
															<th colspan="2"><b>Tindak Lanjut</b></th>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Perlu Asuhan Gizi Lanjut</td>
															<td><input type="radio" name="ga_tindak" id="ga-tindak-perlu" value="1"></td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Belum Perlu Asuhan Gizi Lanjut</td>
															<td><input type="radio" name="ga_tindak" id="ga-tindak-tidak" value="2"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th colspan="3" class="center bg-dark text-light"><b>DIAGNOSIS GIZI</b></th>
														</tr>
														<tr>
															<th class="center"><b>PROBLEM</b></th>
															<th class="center"><b>ETIOLOGI</b></th>
															<th class="center"><b>TANDA/GEJALA</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><textarea name="ga_problem" id="ga-problem" class="form-control" rows="10"></textarea></td>
															<td><textarea name="ga_etiologi" id="ga-etiologi" class="form-control" rows="10"></textarea></td>
															<td><textarea name="ga_gejala" id="ga-gejala" class="form-control" rows="10"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="6"><b>INTERVENSI GIZI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th colspan="6"><b>Preskripsi Diet : </b><input type="text" id="ga-preskripsi" name="ga_preskripsi" class="custom-form clear-input d-inline-block col-lg-3"></th>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Energi</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-energi" name="ga_energi" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Cair</td>
															<td width="1%">:</td>
															<td><input type="radio" name="ga_makanan" id="ga-makanan-cair" value="1"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Lemak</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-lemak" name="ga_lemak" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Lunak</td>
															<td width="1%">:</td>
															<td><input type="radio" name="ga_makanan" id="ga-makanan-lunak" value="2"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Protein</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-protein" name="ga_protein" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Saring</td>
															<td width="1%">:</td>
															<td><input type="radio" name="ga_makanan" id="ga-makanan-saring" value="3"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Karbohidrat</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-karbohidrat" name="ga_karbohidrat" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Biasa</td>
															<td width="1%">:</td>
															<td><input type="radio" name="ga_makanan" id="ga-makanan-biasa" value="4"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Cairan</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-cairan" name="ga_cairan" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Route Diet</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-route" name="ga_route" class="custom-form clear-input d-inline-block col-lg-6"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">Oral</td>
															<td width="1%">:</td>
															<td><input type="radio" name="ga_cara_makan" id="ga-cara-makan-oral" value="1"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">NGT</td>
															<td width="1%">:</td>
															<td><input type="radio" name="ga_cara_makan" id="ga-cara-makan-ngt" value="2"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">Frekuensi</td>
															<td width="1%">:</td>
															<td><input type="text" id="ga-frekuensi" name="ga_frekuensi" class="custom-form clear-input d-inline-block col-lg-6"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="center bg-dark text-light"><b>RENCANA MONITORING DAN EVALUASI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><textarea name="ga_monitoring" id="ga-monitoring" class="form-control" rows="10"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="5"><b>MONITORING DAN EVALUASI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th width="15%">Tanggal Monev</th>
															<td width="20%"><input type="text" id="ga-tgl-monev-1" name="ga_tgl_monev_1" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
															<td width="20%"><input type="text" id="ga-tgl-monev-2" name="ga_tgl_monev_2" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
															<td width="20%"><input type="text" id="ga-tgl-monev-3" name="ga_tgl_monev_3" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
															<td width="20%"><input type="text" id="ga-tgl-monev-4" name="ga_tgl_monev_4" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
														</tr>
														<tr>
															<th width="15%">Antropometri</th>
															<td width="20%"><textarea name="ga_antropometri_1" id="ga-antropometri-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_antropometri_2" id="ga-antropometri-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_antropometri_3" id="ga-antropometri-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_antropometri_4" id="ga-antropometri-4" class="form-control" rows="3"></textarea></td>
														</tr>
														<tr>
															<th width="15%">Biokimia</th>
															<td width="20%"><textarea name="ga_biokimia_1" id="ga-biokimia-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_biokimia_2" id="ga-biokimia-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_biokimia_3" id="ga-biokimia-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_biokimia_4" id="ga-biokimia-4" class="form-control" rows="3"></textarea></td>
														</tr>
														<tr>
															<th width="15%">Klinis / Fisik</th>
															<td width="20%"><textarea name="ga_klinis_1" id="ga-klinis-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_klinis_2" id="ga-klinis-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_klinis_3" id="ga-klinis-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_klinis_4" id="ga-klinis-4" class="form-control" rows="3"></textarea></td>
														</tr>
														<tr>
															<th width="15%">Asupan makan</th>
															<td width="20%"><textarea name="ga_asupan_1" id="ga-asupan-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_asupan_2" id="ga-asupan-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_asupan_3" id="ga-asupan-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_asupan_4" id="ga-asupan-4" class="form-control" rows="3"></textarea></td>
														</tr>
														<tr>
															<th width="15%"><input type="text" id="ga-monitoring-lain" name="ga_monitoring_lain" class="custom-form clear-input d-inline-block"></th>
															<td width="20%"><textarea name="ga_monitoring_lain_1" id="ga-monitoring-lain-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_monitoring_lain_2" id="ga-monitoring-lain-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_monitoring_lain_3" id="ga-monitoring-lain-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea name="ga_monitoring_lain_4" id="ga-monitoring-lain-4" class="form-control" rows="3"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="33%" class="center">
																Tanggal & Jam <input type="text" name="ga_tgl_petugas" id="ga-tgl-petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
															</td>
															<td width="33%">
															</td>
															<td width="33%" class="center"></td>
														</tr>
														<tr>
															<td class="center">Dietisien / Nutrisionist</td>
															<td></td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center"><input type="text" name="ga_petugas" id="ga-petugas" class="select2c-input ml-2"></td>
															<td class="center"><input type="text" name="ga_dokter" id="ga-dokter" class="select2c-input ml-2"></td>
															<td class="center"></td>

														</tr>
														<tr>
															<td class="center">Tanda Tangan</td>
															<td class="center">Tanda Tangan</td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center">
																<input type="checkbox" name="ga_ttd" id="ga-ttd" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
																<input type="checkbox" name="ga_ttd_dokter" id="ga-ttd-dokter" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
															</td>
														</tr>
													</tbody>
												</table>
												<div class="d-flex justify-content-end">
													<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
													<span id="ga-tombol"></span>
													<button type="button" class="btn btn-info" onclick="simpanGiziAnak()"><span><i class="fas fa-fw fa-save mr-1"></i>Simpan</span></button>
												</div>
											</div>
										</div>
									</div>
									<?= form_close() ?>
								</div>
								<!-- akhir gizi anak -->

								<!-- gizi dietik -->
								<div>
									<?= form_open('', 'id=form-gizi-dietetik class=form-horizontal') ?>
									<div class="form-gizi-dietetik">
										<input type="hidden" name="id_gd" id="gd-id">
										<input type="hidden" name="id_layanan_pendaftaran" id="gd-id-layanan-pendaftaran">
										<input type="hidden" name="id_pendaftaran" id="gd-id-pendaftaran">
										<input type="hidden" name="riwayat_bed" id="gd-rwyt-bed">
										<input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
										<input type="hidden" name="id_pasien" id="gd-pasien">
										<div class="row">
											<div class="col-lg-12">
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="20%">Diagnosa Medis : </td>
															<td><input type="text" id="gd-medis" name="gd_medis" class="custom-form clear-input d-inline-block col-lg-3"></td>
														</tr>
														<tr>
															<td colspan="2"><b>1. Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Risiko ringan (Nilai MST 0-1)</td>
															<td><input type="radio" name="gd_risiko" id="gd-risiko-ringan" value="1"></td>
														</tr>	
														<tr>
															<td width="20%" class="pl-4">Risiko sedang (Nilai MST ≥ 2-3)</td>
															<td><input type="radio" name="gd_risiko" id="gd-risiko-sedang" value="2"></td>
														</tr>	
														<tr>
															<td width="20%" class="pl-4">Risiko tinggi (Nilai MST 4-5)</td>
															<td><input type="radio" name="gd_risiko" id="gd-risiko-tinggi" value="3"></td>
														</tr>	
														<tr>
															<td colspan="2"><b>2. Mempunyai kondisi khusus :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Ya</td>
															<td><input type="radio" name="gd_kondisi" id="gd-kondisi-ya" value="1"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Tidak</td>
															<td><input type="radio" name="gd_kondisi" id="gd-kondisi-tidak" value="2"></td>
														</tr>
														<tr>
															<td colspan="2"><b>3. Alergi Makan :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Telur</td>
															<td><input type="radio" name="gd_alergi" id="gd-alergi-telur" value="1"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Susu sapi dan produk olahannya</td>
															<td><input type="radio" name="gd_alergi" id="gd-alergi-sapi" value="2"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Kacang kedelai/tanah</td>
															<td><input type="radio" name="gd_alergi" id="gd-alergi-kacang" value="3"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Gluten/gandum</td>
															<td><input type="radio" name="gd_alergi" id="gd-alergi-gandum" value="4"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Udang</td>
															<td><input type="radio" name="gd_alergi" id="gd-alergi-udang" value="5"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Ikan</td>
															<td><input type="radio" name="gd_alergi" id="gd-alergi-ikan" value="6"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Hazelnut/almond</td>
															<td><input type="radio" name="gd_alergi" id="gd-alergi-almond" value="7"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Lainnya </td>
															<td><input type="text" id="gd-alergi-lainnya" name="gd_alergi_lainnya" class="custom-form clear-input d-inline-block col-lg-3"></td>
														</tr>
														<tr>
															<td colspan="2"><b>4. Preskripsi diet :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Makanan biasa</td>
															<td><input type="radio" name="gd_makanan" id="gd-makanan-biasa" value="1"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Diet khusus</td>
															<td><input type="radio" name="gd_makanan" id="gd-makanan-diet" value="2"></td>
														</tr>
														<tr>
															<td colspan="2"><b>5. Tindak lanjut :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Pelu asuhan gizi (Lanjut ke asesmen gizi)</td>
															<td><input type="radio" name="gd_asuhan" id="gd-asuahn-perlu" value="1"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Belum perlu asuhan gizi</td>
															<td><input type="radio" name="gd_asuhan" id="gd-asuahn-tidak" value="2"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="9"><b>ASESMEN GIZI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th colspan="6"><b>Antropometri</b></th>
														</tr>
														<tr>
															<td width="15%" class="pl-3">BB</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-bb" name="gd_bb" class="custom-form clear-input d-inline-block col-lg-2"> kg</td>
															<td width="15%" class="pl-3">Bila BB tiak dapat ditimbang, LILA</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-lila" name="gd_lila" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">TB</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-tb" name="gd_tb" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
															<td width="15%" class="pl-3">Bila BB tiak dapat diukur, Tilut</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-tilut" name="gd_tilut" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
														</tr>
														<tr>
															<td class="pl-3">IMT</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-imt" name="gd_imt" class="custom-form clear-input d-inline-block col-lg-2"> kg/m²</td>
															<td colspan="3"></td>
														</tr>
														<tr>
															<td class="pl-3">Status gizi</td>
															<td width="1%">:</td>
															<td colspan="4">
																<input type="text" id="gd-status-gizi" name="gd_status_gizi" class="custom-form clear-input d-inline-block col-lg-3">
															</td>
														</tr>
														<tr>
															<th colspan="6"><b>Dalam 1 bulan terakhir</b></th>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">1. Kesulitan Makan</td>
															<td colspan="3">
																<input type="radio" name="gd_kesulitan" id="gd-kesulitan-ya" value="1"> Ya
																<input type="radio" name="gd_kesulitan" id="gd-kesulitan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="6">2. Makan lebih sedikit dari biasanya</td>
														</tr>
														<tr>
															<td class="pl-5" colspan="3">≺ 1/2 porsi dari biasanya </td>
															<td colspan="3">
																<input type="radio" name="gd_setengah" id="gd-setengah-ya" value="1"> Ya
																<input type="radio" name="gd_setengah" id="gd-setengah-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-5" colspan="3">1/2 - 3/4 porsi dari biasanya </td>
															<td colspan="3">
																<input type="radio" name="gd_tigaperempat" id="gd-tigaperempat-ya" value="1"> Ya
																<input type="radio" name="gd_tigaperempat" id="gd-tigaperempat-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">3. Penurunan nafsu makan yang mempengaruhi asupan</td>
															<td colspan="3">
																<input type="radio" name="gd_penurunan" id="gd-penurunan-ya" value="1"> Ya
																<input type="radio" name="gd_penurunan" id="gd-penurunan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">4. Perubahan rasa kecap</td>
															<td colspan="3">
																<input type="radio" name="gd_perubahan" id="gd-perubahan-ya" value="1"> Ya
																<input type="radio" name="gd_perubahan" id="gd-perubahan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">5. Mual</td>
															<td colspan="3">
																<input type="radio" name="gd_mual" id="gd-mual-ya" value="1"> Ya
																<input type="radio" name="gd_mual" id="gd-mual-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">6. Muntah</td>
															<td colspan="3">
																<input type="radio" name="gd_muntah" id="gd-muntah-ya" value="1"> Ya
																<input type="radio" name="gd_muntah" id="gd-muntah-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">7. Gangguan / kesulitan mengunyah dan atau menelan</td>
															<td colspan="3">
																<input type="radio" name="gd_gangguan" id="gd-gangguan-ya" value="1"> Ya
																<input type="radio" name="gd_gangguan" id="gd-gangguan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">8. Perlu bantuan saat makan / minum</td>
															<td colspan="3">
																<input type="radio" name="gd_perlu" id="gd-perlu-ya" value="1"> Ya
																<input type="radio" name="gd_perlu" id="gd-perlu-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">9. Sering kali melewatkan waktu makan</td>
															<td colspan="3">
																<input type="radio" name="gd_sering" id="gd-sering-ya" value="1"> Ya
																<input type="radio" name="gd_sering" id="gd-sering-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">10. Masalah dnegan gigi geligi</td>
															<td colspan="3">
																<input type="radio" name="gd_masalah" id="gd-masalah-ya" value="1"> Ya
																<input type="radio" name="gd_masalah" id="gd-masalah-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
															<td class="pl-3" colspan="3">11. Diare</td>
															<td colspan="3">
																<input type="radio" name="gd_diare" id="gd-diare-ya" value="1"> Ya
																<input type="radio" name="gd_diare" id="gd-diare-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">12. Konstipati</td>
															<td colspan="3">
																<input type="radio" name="gd_konstipati" id="gd-konstipati-ya" value="1"> Ya
																<input type="radio" name="gd_konstipati" id="gd-konstipati-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">13. Pendarahn</td>
															<td colspan="3">
																<input type="radio" name="gd_pendarahan" id="gd-pendarahan-ya" value="1"> Ya
																<input type="radio" name="gd_pendarahan" id="gd-pendarahan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">14. Banyak bersendawa</td>
															<td colspan="3">
																<input type="radio" name="gd_bersendawa" id="gd-bersendawa-ya" value="1"> Ya
																<input type="radio" name="gd_bersendawa" id="gd-bersendawa-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">15. Alergi makan / intoleransi terhadap makanan</td>
															<td colspan="3">
																<input type="radio" name="gd_intoleransi" id="gd-intoleransi-ya" value="1"> Ya
																<input type="radio" name="gd_intoleransi" id="gd-intoleransi-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">16. Menjalani diet tertentu</td>
															<td colspan="3">
																<input type="radio" name="gd_diet" id="gd-diet-ya" value="1"> Ya
																<input type="radio" name="gd_diet" id="gd-diet-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">17. Makan menggunakan NGT</td>
															<td colspan="3">
																<input type="radio" name="gd_ngt" id="gd-ngt-ya" value="1"> Ya
																<input type="radio" name="gd_ngt" id="gd-ngt-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">18. Merasa lemah / tidak bertenaga</td>
															<td colspan="3">
																<input type="radio" name="gd_lemah" id="gd-lemah-ya" value="1"> Ya
																<input type="radio" name="gd_lemah" id="gd-lemah-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">19. Dirawat di RS dalam jangka setahun terakhir</td>
															<td colspan="3">
																<input type="radio" name="gd_dirawat" id="gd-dirawat-ya" value="1"> Ya
																<input type="radio" name="gd_dirawat" id="gd-dirawat-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="6">20. Penurunan BB</td>
														</tr>
														<tr>
															<td class="pl-5" colspan="3">Lebih dari 3 kg dalam 1 bulan terakhir</td>
															<td colspan="3">
																<input type="radio" name="gd_tigakg" id="gd-tigakg-ya" value="1"> Ya
																<input type="radio" name="gd_tigakg" id="gd-tigakg-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-5" colspan="3">Lebih dari 6 kg dalam 1 bulan terakhir</td>
															<td colspan="3">
																<input type="radio" name="gd_enamkg" id="gd-enamkg-ya" value="1"> Ya
																<input type="radio" name="gd_enamkg" id="gd-enamkg-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="6">21. 
																<input type="radio" name="gd_penyakit" id="gd-penyakit-keganasan" value="1" class="ml-2"> Penyakit keganasan 
																<input type="radio" name="gd_penyakit" id="gd-penyakit-kronis" value="2" class="ml-3"> Infeksi kronis 
																<input type="radio" name="gd_penyakit" id="gd-penyakit-bakar" value="3" class="ml-3"> Luka bakar 
																<input type="radio" name="gd_penyakit" id="gd-penyakit-kepala" value="4" class="ml-3"> Cidera kepala 
																<input type="radio" name="gd_penyakit" id="gd-penyakit-ginjal" value="5" class="ml-3"> Gagal ginjal, DM, lainnya
																<input type="text" id="gd-penyakit-lainnya" name="gd_penyakit_lainnya" class="custom-form clear-input d-inline-block col-lg-3">
															</td>
														</tr>
														<tr>
															<td colspan="6" class="pl-3">22. Data penunjang lainnya / Laboratorium</td>
														</tr>
														<tr>
															<td colspan="6" class="text-center pl-5"><textarea name="gd_laboratorium" id="gd-laboratorium" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="6" class="pl-3">23. Klinis / Fisik</td>
														</tr>
														<tr>
															<td colspan="6" class="text-center pl-5"><textarea name="gd_klinis" id="gd-klinis" class="custom-textarea" rows="5"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th colspan="3" class="center bg-dark text-light"><b>DIAGNOSIS GIZI</b></th>
														</tr>
														<tr>
															<th class="center"><b>PROBLEM</b></th>
															<th class="center"><b>ETIOLOGI</b></th>
															<th class="center"><b>TANDA/GEJALA</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><textarea name="gd_problem" id="gd-problem" class="form-control" rows="10"></textarea></td>
															<td><textarea name="gd_etiologi" id="gd-etiologi" class="form-control" rows="10"></textarea></td>
															<td><textarea name="gd_gejala" id="gd-gejala" class="form-control" rows="10"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="6"><b>INTERVENSI GIZI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th colspan="6"><b>Preskripsi Diet : </b><input type="text" id="gd-preskripsi" name="gd_preskripsi" class="custom-form clear-input d-inline-block col-lg-3"></th>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Energi</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-energi" name="gd_energi" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Cair</td>
															<td width="1%">:</td>
															<td><input type="radio" name="gd_jenis_makanan" id="gd-makanan-cair" value="1"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Lemak</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-lemak" name="gd_lemak" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Lunak</td>
															<td width="1%">:</td>
															<td><input type="radio" name="gd_jenis_makanan" id="gd-makanan-lunak" value="2"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Protein</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-protein" name="gd_protein" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Saring</td>
															<td width="1%">:</td>
															<td><input type="radio" name="gd_jenis_makanan" id="gd-jenis-makanan-saring" value="3"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Karbohidrat</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-karbohidrat" name="gd_karbohidrat" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Biasa</td>
															<td width="1%">:</td>
															<td><input type="radio" name="gd_jenis_makanan" id="gd-jenis-makanan-biasa" value="4"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Cairan</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-cairan" name="gd_cairan" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Route Diet</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-route" name="gd_route" class="custom-form clear-input d-inline-block col-lg-6"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">Oral</td>
															<td width="1%">:</td>
															<td><input type="radio" name="gd_cara_makan" id="gd-cara-makan-oral" value="1"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">NGT</td>
															<td width="1%">:</td>
															<td><input type="radio" name="gd_cara_makan" id="gd-cara-makan-ngt" value="2"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">Frekuensi</td>
															<td width="1%">:</td>
															<td><input type="text" id="gd-frekuensi" name="gd_frekuensi" class="custom-form clear-input d-inline-block col-lg-6"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="center bg-dark text-light"><b>MONITORING DAN EVALUASI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><textarea name="gd_monitoring" id="gd-monitoring" class="form-control" rows="5"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="33%" class="center">
																Tanggal & Jam <input type="text" name="gd_tgl_petugas" id="gd-tgl-petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
															</td>
															<td width="33%">
															</td>
															<td width="33%" class="center"></td>
														</tr>
														<tr>
															<td class="center">Dietisien / Nutrisionist</td>
															<td class="center">Dokter</td>
															<td></td>
														</tr>
														<tr>
															<td class="center"><input type="text" name="gd_petugas" id="gd-petugas" class="select2c-input ml-2"></td>
															<td class="center"><input type="text" name="gd_dokter" id="gd-dokter" class="select2c-input ml-2"></td>
															<td></td>

														</tr>
														<tr>
															<td class="center">Tanda Tangan</td>
															<td class="center">Tanda Tangan</td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center">
																<input type="checkbox" name="gd_ttd" id="gd-ttd" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
																<input type="checkbox" name="gd_ttd_dokter" id="gd-ttd-dokter" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
															</td>
														</tr>
													</tbody>
												</table>
												<div class="d-flex justify-content-end">
													<button type="button" class="btn btn-secondary" onclick="cetakDietetik()" id="btn-cetak-gd"><i class="fas fa-print mr-1"></i>Print</button>
													<button type="button" class="btn btn-secondary mx-2" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
													<button type="button" class="btn btn-info" onclick="simpanGiziDietetik()"><span><i class="fas fa-fw fa-save mr-1"></i>Simpan</span></button>
												</div>
											</div>
										</div>
									</div>
									<?= form_close() ?>
								</div>
								<!-- akhir gizi dietik -->

								<!-- kosultasi gizi -->
								<div>
									<?= form_open('', 'id=form-konsultasi-gizi class=form-horizontal') ?>
									<div class="form-konsultasi-gizi">
										<input type="hidden" name="id_layanan_pendaftaran" id="kg-id-layanan-pendaftaran">
										<input type="hidden" name="id_pendaftaran" id="kg-id-pendaftaran">
										<input type="hidden" name="riwayat_bed" id="kg-rwyt-bed">
										<input type="hidden" name="id_kg" id="kg-id">
										<input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
										<input type="hidden" name="id_pasien" id="kg-pasien">
										<div class="row">
											<div class="col-lg-12">
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<th colspan="9"><b>Pengkajian Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">a. Antropometri</td>
														</tr>
														<tr>
															<td width="5%" class="pl-3">BB</td>
															<td width="1%">:</td>
															<td><input type="text" id="kg-bb" name="kg_bb" class="custom-form clear-input d-inline-block col-lg-3"> kg</td>
															<td width="5%" class="pl-3">LLA</td>
															<td width="1%">:</td>
															<td><input type="text" id="kg-lla" name="kg_lla" class="custom-form clear-input d-inline-block col-lg-3"> cm</td>
															<td width="10%" class="pl-3">Perubahan BB</td>
															<td width="1%">:</td>
															<td><input type="text" id="kg-pbb" name="kg_pbb" class="custom-form clear-input d-inline-block col-lg-10"></td>
														</tr>
														<tr>
															<td class="pl-3">TB</td>
															<td>:</td>
															<td><input type="text" id="kg-tb" name="kg_tb" class="custom-form clear-input d-inline-block col-lg-3"> cm</td>
															<td class="pl-3">IMT</td>
															<td>:</td>
															<td><input type="text" id="kg-imt" name="kg_imt" class="custom-form clear-input d-inline-block col-lg-3"> kg/m²</td>
															<td colspan="3"></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">b. Biokimia</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_biokimia" id="kg-biokimia" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">c. Fisik / Klinik</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_klinis" id="kg-klinis" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">d. Riwayat Gizi</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_gizi" id="kg-gizi" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">e. Riwayat Personal</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_personal" id="kg-personal" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<th colspan="9"><b>Diagnosis Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_diagnosis" id="kg-diagnosis" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<th colspan="9"><b>Intervensi Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">a. Tujuan</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_tujuan" id="kg-tujuan" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">b. Intervensi</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_intervensi" id="kg-intervensi" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">c. Konseling Giz / Edukasi</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_konseling" id="kg-konseling" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<th colspan="9"><b>Rencana Monitoring dan Evaluasi Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea name="kg_evaluasi" id="kg-evaluasi" class="custom-textarea" rows="5"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="33%" class="center">
																Tanggal & Jam <input type="text" name="kg_tgl_petugas" id="kg-tgl-petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
															</td>
															<td width="33%">
															</td>
															<td width="33%" class="center"></td>
														</tr>
														<tr>
															<td class="center">Dietisien / Nutrisionist</td>
															<td class="center">Dokter</td>
															<td class="center">Pasien</td>
														</tr>
														<tr>
															<td class="center"><input type="text" name="kg_petugas" id="kg-petugas" class="select2c-input ml-2"></td>
															<td class="center"><input type="text" name="kg_dokter" id="kg-dokter" class="select2c-input ml-2"></td>
															<td class="center"><span id="nama-pasien"></span></td>

														</tr>
														<tr>
															<td class="center">Tanda Tangan</td>
															<td class="center">Tanda Tangan</td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center">
																<input type="checkbox" name="kg_ttd" id="kg-ttd" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
																<input type="checkbox" name="kg_ttd_dokter" id="kg-ttd-dokter" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
															</td>
														</tr>
													</tbody>
												</table>
												<div class="d-flex justify-content-end">
													<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
													<span id="kg-tombol"></span>
													<button type="button" class="btn btn-info" onclick="simpanKonsultasiGizi()"><span><i class="fas fa-fw fa-save mr-1"></i>Simpan</span></button>
												</div>
											</div>
										</div>
									</div>
									<?= form_close() ?>
								</div>
								<!-- akhir kosultasi gizi -->

							</div>
						</div>
					</div>
				</div>
				<!-- end header -->
				
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>


<!-- Modal readonly -->
<input type="hidden" name="page_now" id="d-page-now">
<div class="modal fade" id="modal-riwayat-gizi">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:95%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-form-gizi">Riwayat Gizi</h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<!-- header -->
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="15%" class="bold">Nama Pasien</td>
									<td wdith="85%">: <span id="rga-pasien-nama"></span></td>
								</tr>
								<tr>
									<td class="bold">No. RM</td>
									<td>: <span id="rga-pasien-no-rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Tanggal Lahir</td>
									<td>: <span id="rga-pasien-tanggal-lahir"></span></td>
								</tr>
								<tr>
									<td class="bold">Jenis Kelamin</td>
									<td>: <span id="rga-pasien-jenis-kelamin"></span></td>
								</tr>
								<tr>
									<td class="bold">Ruang Rawat/Unit Kerja</td>
									<td >: <span id="rga-bed"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="widget-body">
							<!-- form dpmp -->
							<div id="wizard-riwayat-gizi">
								<!-- Tab bwizard -->
								<ol>
									<li>Formulir Asuhan Gizi Anak</li>
									<li>Formulir Asuhan Gizi dan Dietetik</li>
									<li>Formulir Konsultasi Gizi</li>
								</ol>

								<!-- Data bwizard -->
								<!-- gizi anak -->
								<div>
									<?= form_open('', 'id=form-riwayat-gizi-anak class=form-horizontal') ?>
									<div class="form-riwayat-gizi-anak">
										<input type="hidden" name="id_layanan_pendaftaran" id="rga-id-layanan-pendaftaran">
										<input type="hidden" name="id_pendaftaran" id="rga-id-pendaftaran">
										<input type="hidden" name="riwayat_bed" id="rga-rwyt-bed">
										<input type="hidden" name="id_ga" id="rga-id">
										<input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
										<input type="hidden" name="id_pasien" id="rga-pasien">
										<div class="row">
											<div class="col-lg-12">
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="15%">Ruang/kelas</td>
															<td>
																<input type="hidden" name="ga_ruang" id="rga-ruang">
																<span id="rga-ruang1"></span>
															</td>
														</tr>
														<tr>
															<td width="15%">Tanggal Masuk</td>
															<td><input disabled type="text" id="rga-tgl-masuk" name="ga_tgl_masuk" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy"></td>
														</tr>
														<tr>
															<td width="15%">Tanggal Skrining</td>
															<td><input disabled type="text" id="rga-tgl-skrining" name="ga_tgl_skrining" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy"></td>
														</tr>
														<tr>
															<td width="15%">Usia</td>
															<td>
																<input type="hidden" name="ga_usia" id="rga-usia">
																<span id="rga-usia1"></span>
															</td>
														</tr>
														<tr>
															<td width="15%">diagnosa Medis</td>
															<td><input disabled type="text" id="rga-diagnosa-medis" name="ga_diagnosa_medis" class="custom-form clear-input d-inline-block col-lg-3"></td>
														</tr>
														<tr>
															<td colspan="2"><b>Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Risiko rendah (Total skor 0)</td>
															<td><input disabled type="radio" name="ga_risiko" id="rga-risiko-rendah" value="1"></td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Risiko sedang (Total skor 1 - 3)</td>
															<td><input disabled type="radio" name="ga_risiko" id="rga-risiko-sedang" value="2"></td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Risiko berat (Total skor 4 - 5)</td>
															<td><input disabled type="radio" name="ga_risiko" id="rga-risiko-tinggi" value="3"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="9"><b>ASESMEN GIZI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th colspan="9"><b>Antropometri</b></th>
														</tr>
														<tr>
															<td class="pl-3" width="10%">BB</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-bb" name="ga_bb" class="custom-form clear-input d-inline-block col-lg-2"> kg</td>
															<td width="10%">BB/U</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-bbu" name="ga_bbu" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="5%">kesan</td>
															<td width="1%">:</td>
															<td rowspan="4"><textarea disabled name="ga_kesan" id="rga-kesan" class="form-control" rows="5"></textarea></td>
														</tr>
														<tr>
															<td class="pl-3" width="10%">PB atau TB</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-pb" name="ga_pb" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
															<td width="10%">PB/U atau TB/U/U</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-pbu" name="ga_pbu" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td colspan="2"></td>
														</tr>
														<tr>
															<td class="pl-3" width="10%">BBI</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-bbi" name="ga_bbi" class="custom-form clear-input d-inline-block col-lg-2"> kg</td>
															<td width="10%">BB/PB atau BB/TB</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-bbpb" name="ga_bbpb" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td colspan="2"></td>
														</tr>
														<tr>
															<td class="pl-3" width="5%">LLA</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-lla" name="ga_lla" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
															<td width="5%">HA</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-ha" name="ga_ha" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td colspan="2"></td>
														</tr>
														<tr>
															<th colspan="9"><b>Biokimia</b></th>
														</tr>
														<tr>
															<th colspan="9" class="text-center pl-3"><textarea disabled name="ga_biokimia" id="rga-biokimia" class="custom-textarea" rows="4"></textarea></th>
														</tr>
														<tr>
															<th colspan="9"><b>Klinis / Fisik</b></th>
														</tr>
														<tr>
															<th colspan="9" class="text-center pl-3"><textarea disabled name="ga_klinis" id="rga-klinis" class="custom-textarea" rows="4"></textarea></th>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped" style="margin-top: -17px;">
													<tbody>
														<tr>
															<th colspan="7"><b>Riwayat Gizi</b></th>
														</tr>
														<tr>
															<td class="pl-3"><b>Alergi Makan :</b></td>
															<td></td>
															<td><b>Ya</b></td>
															<td><b>Tidak</b></td>
															<td></td>
															<td><b>Ya</b></td>
															<td><b>Tidak</b></td>
														</tr>
														<tr>
															<td width="4%"></td>
															<td width="10%">Telur</td>
															<td width="2%"><input disabled type="radio" name="ga_telur" id="rga-telur-ya" value="1"></td>
															<td width="10%"><input disabled type="radio" name="ga_telur" id="rga-telur-tidak" value="2"></td>
															<td width="5%">Udang</td>
															<td width="2%"><input disabled type="radio" name="ga_udang" id="rga-udang-ya" value="1"></td>
															<td width="10%"><input disabled type="radio" name="ga_udang" id="rga-udang-tidak" value="2"></td>
														</tr>
														<tr>
															<td></td>
															<td>Susu sapi dan produk olahannya</td>
															<td><input disabled type="radio" name="ga_sapi" id="rga-sapi-ya" value="1"></td>
															<td><input disabled type="radio" name="ga_sapi" id="rga-sapi-tidak" value="2"></td>
															<td>Ikan</td>
															<td><input disabled type="radio" name="ga_ikan" id="rga-ikan-ya" value="1"></td>
															<td><input disabled type="radio" name="ga_ikan" id="rga-ikan-tidak" value="2"></td>
														</tr>
														<tr>
															<td></td>
															<td>Kacang kedelai/tanah</td>
															<td><input disabled type="radio" name="ga_kedelai" id="rga-kedelai-ya" value="1"></td>
															<td><input disabled type="radio" name="ga_kedelai" id="rga-kedelai-tidak" value="2"></td>
															<td>Hazelnut/almond</td>
															<td><input disabled type="radio" name="ga_almond" id="rga-almond-ya" value="1"></td>
															<td><input disabled type="radio" name="ga_almond" id="rga-almond-tidak" value="2"></td>
														</tr>
														<tr>
															<td></td>
															<td>Gluten/gandum</td>
															<td><input disabled type="radio" name="ga_gandum" id="rga-gandum-ya" value="1"></td>
															<td><input disabled type="radio" name="ga_gandum" id="rga-gandum-tidak" value="2"></td>
															<td>Lainnya </td>
															<td colspan="2"><input disabled type="text" id="rga-alergi-lainnya" name="ga_alergi_lainnya" class="custom-form clear-input d-inline-block"></td>
														</tr>
														<tr>
															<td class="pl-3"><b>Pola Makan  :</b></td>
															<td colspan="6"> <textarea disabled name="ga_pola_makan" id="rga-pola-makan" class="custom-textarea" rows="4"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped" style="margin-top: -17px;">
													<tbody>
														<tr>
															<th colspan="2"><b>Tindak Lanjut</b></th>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Perlu Asuhan Gizi Lanjut</td>
															<td><input disabled type="radio" name="ga_tindak" id="rga-tindak-perlu" value="1"></td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">Belum Perlu Asuhan Gizi Lanjut</td>
															<td><input disabled type="radio" name="ga_tindak" id="rga-tindak-tidak" value="2"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th colspan="3" class="center bg-dark text-light"><b>DIAGNOSIS GIZI</b></th>
														</tr>
														<tr>
															<th class="center"><b>PROBLEM</b></th>
															<th class="center"><b>ETIOLOGI</b></th>
															<th class="center"><b>TANDA/GEJALA</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><textarea disabled name="ga_problem" id="rga-problem" class="form-control" rows="10"></textarea></td>
															<td><textarea disabled name="ga_etiologi" id="rga-etiologi" class="form-control" rows="10"></textarea></td>
															<td><textarea disabled name="ga_gejala" id="rga-gejala" class="form-control" rows="10"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="6"><b>INTERVENSI GIZI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th colspan="6"><b>Preskripsi Diet : </b><input disabled type="text" id="rga-preskripsi" name="ga_preskripsi" class="custom-form clear-input d-inline-block col-lg-3"></th>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Energi</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-energi" name="ga_energi" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Cair</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="ga_makanan" id="rga-makanan-cair" value="1"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Lemak</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-lemak" name="ga_lemak" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Lunak</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="ga_makanan" id="rga-makanan-lunak" value="2"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Protein</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-protein" name="ga_protein" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Saring</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="ga_makanan" id="rga-makanan-saring" value="3"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Karbohidrat</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-karbohidrat" name="ga_karbohidrat" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Biasa</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="ga_makanan" id="rga-makanan-biasa" value="4"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Cairan</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-cairan" name="ga_cairan" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Route Diet</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-route" name="ga_route" class="custom-form clear-input d-inline-block col-lg-6"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">Oral</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="ga_cara_makan" id="rga-cara-makan-oral" value="1"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">NGT</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="ga_cara_makan" id="rga-cara-makan-ngt" value="2"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">Frekuensi</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rga-frekuensi" name="ga_frekuensi" class="custom-form clear-input d-inline-block col-lg-6"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="center bg-dark text-light"><b>RENCANA MONITORING DAN EVALUASI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><textarea disabled name="ga_monitoring" id="rga-monitoring" class="form-control" rows="10"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="5"><b>MONITORING DAN EVALUASI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th width="15%">Tanggal Monev</th>
															<td width="20%"><input disabled type="text" id="rga-tgl-monev-1" name="ga_tgl_monev_1" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
															<td width="20%"><input disabled type="text" id="rga-tgl-monev-2" name="ga_tgl_monev_2" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
															<td width="20%"><input disabled type="text" id="rga-tgl-monev-3" name="ga_tgl_monev_3" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
															<td width="20%"><input disabled type="text" id="rga-tgl-monev-4" name="ga_tgl_monev_4" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
														</tr>
														<tr>
															<th width="15%">Antropometri</th>
															<td width="20%"><textarea disabled name="ga_antropometri_1" id="rga-antropometri-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_antropometri_2" id="rga-antropometri-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_antropometri_3" id="rga-antropometri-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_antropometri_4" id="rga-antropometri-4" class="form-control" rows="3"></textarea></td>
														</tr>
														<tr>
															<th width="15%">Biokimia</th>
															<td width="20%"><textarea disabled name="ga_biokimia_1" id="rga-biokimia-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_biokimia_2" id="rga-biokimia-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_biokimia_3" id="rga-biokimia-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_biokimia_4" id="rga-biokimia-4" class="form-control" rows="3"></textarea></td>
														</tr>
														<tr>
															<th width="15%">Klinis / Fisik</th>
															<td width="20%"><textarea disabled name="ga_klinis_1" id="rga-klinis-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_klinis_2" id="rga-klinis-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_klinis_3" id="rga-klinis-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_klinis_4" id="rga-klinis-4" class="form-control" rows="3"></textarea></td>
														</tr>
														<tr>
															<th width="15%">Asupan makan</th>
															<td width="20%"><textarea disabled name="ga_asupan_1" id="rga-asupan-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_asupan_2" id="rga-asupan-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_asupan_3" id="rga-asupan-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_asupan_4" id="rga-asupan-4" class="form-control" rows="3"></textarea></td>
														</tr>
														<tr>
															<th width="15%"><input disabled type="text" id="rga-monitoring-lain" name="ga_monitoring_lain" class="custom-form clear-input d-inline-block"></th>
															<td width="20%"><textarea disabled name="ga_monitoring_lain_1" id="rga-monitoring-lain-1" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_monitoring_lain_2" id="rga-monitoring-lain-2" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_monitoring_lain_3" id="rga-monitoring-lain-3" class="form-control" rows="3"></textarea></td>
															<td width="20%"><textarea disabled name="ga_monitoring_lain_4" id="rga-monitoring-lain-4" class="form-control" rows="3"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="33%" class="center">
																Tanggal & Jam <input disabled type="text" name="ga_tgl_petugas" id="rga-tgl-petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
															</td>
															<td width="33%">
															</td>
															<td width="33%" class="center"></td>
														</tr>
														<tr>
															<td class="center">Dietisien / Nutrisionist</td>
															<td></td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center"><input disabled type="text" name="ga_petugas" id="rga-petugas" class="select2c-input ml-2"></td>
															<td></td>
															<td class="center"></td>

														</tr>
														<tr>
															<td class="center">Tanda Tangan</td>
															<td class="center"></td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center">
																<input disabled type="checkbox" name="ga_ttd" id="rga-ttd" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
															</td>
															<td class="center">
															</td>
														</tr>
													</tbody>
												</table>
												<div class="d-flex justify-content-end">
													<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
													<!-- <button type="button" class="btn btn-info" onclick="simpanGiziAnak()"><span><i class="fas fa-fw fa-save mr-1"></i>Simpan</span></button> -->
												</div>
											</div>
										</div>
									</div>
									<?= form_close() ?>
								</div>
								<!-- akhir gizi anak -->

								<!-- gizi dietik -->
								<div>
									<?= form_open('', 'id=form-riwayat-gizi-dietetik class=form-horizontal') ?>
									<div class="form-riwayat-gizi-dietetik">
										<input type="hidden" name="id_layanan_pendaftaran" id="rgd-id-layanan-pendaftaran">
										<input type="hidden" name="id_pendaftaran" id="rgd-id-pendaftaran">
										<input type="hidden" name="riwayat_bed" id="rgd-rwyt-bed">
										<input type="hidden" name="id_gd" id="rgd-id">
										<input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
										<input type="hidden" name="id_pasien" id="rgd-pasien">
										<div class="row">
											<div class="col-lg-12">
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="20%">Diagnosa Medis : </td>
															<td><input disabled type="text" id="rgd-medis" name="gd_medis" class="custom-form clear-input d-inline-block col-lg-3"></td>
														</tr>
														<tr>
															<td colspan="2"><b>1. Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Risiko ringan (Nilai MST 0-1)</td>
															<td><input disabled type="radio" name="gd_risiko" id="rgd-risiko-ringan" value="1"></td>
														</tr>	
														<tr>
															<td width="20%" class="pl-4">Risiko sedang (Nilai MST ≥ 2-3)</td>
															<td><input disabled type="radio" name="gd_risiko" id="rgd-risiko-sedang" value="2"></td>
														</tr>	
														<tr>
															<td width="20%" class="pl-4">Risiko tinggi (Nilai MST 4-5)</td>
															<td><input disabled type="radio" name="gd_risiko" id="rgd-risiko-tinggi" value="3"></td>
														</tr>	
														<tr>
															<td colspan="2"><b>2. Mempunyai kondisi khusus :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Ya</td>
															<td><input disabled type="radio" name="gd_kondisi" id="rgd-kondisi-ya" value="1"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Tidak</td>
															<td><input disabled type="radio" name="gd_kondisi" id="rgd-kondisi-tidak" value="2"></td>
														</tr>
														<tr>
															<td colspan="2"><b>3. Alergi Makan :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Telur</td>
															<td><input disabled type="radio" name="gd_alergi" id="rgd-alergi-telur" value="1"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Susu sapi dan produk olahannya</td>
															<td><input disabled type="radio" name="gd_alergi" id="rgd-alergi-sapi" value="2"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Kacang kedelai/tanah</td>
															<td><input disabled type="radio" name="gd_alergi" id="rgd-alergi-kacang" value="3"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Gluten/gandum</td>
															<td><input disabled type="radio" name="gd_alergi" id="rgd-alergi-gandum" value="4"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Udang</td>
															<td><input disabled type="radio" name="gd_alergi" id="rgd-alergi-udang" value="5"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Ikan</td>
															<td><input disabled type="radio" name="gd_alergi" id="rgd-alergi-ikan" value="6"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Hazelnut/almond</td>
															<td><input disabled type="radio" name="gd_alergi" id="rgd-alergi-almond" value="7"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Lainnya </td>
															<td><input disabled type="text" id="rgd-alergi-lainnya" name="gd_alergi_lainnya" class="custom-form clear-input d-inline-block col-lg-3"></td>
														</tr>
														<tr>
															<td colspan="2"><b>4. Preskripsi diet :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Makanan biasa</td>
															<td><input disabled type="radio" name="gd_makanan" id="rgd-makanan-biasa" value="1"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Diet khusus</td>
															<td><input disabled type="radio" name="gd_makanan" id="rgd-makanan-diet" value="2"></td>
														</tr>
														<tr>
															<td colspan="2"><b>5. Tindak lanjut :</b></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Pelu asuhan gizi (Lanjut ke asesmen gizi)</td>
															<td><input disabled type="radio" name="gd_asuhan" id="rgd-asuahn-perlu" value="1"></td>
														</tr>
														<tr>
															<td width="20%" class="pl-4">Belum perlu asuhan gizi</td>
															<td><input disabled type="radio" name="gd_asuhan" id="rgd-asuahn-tidak" value="2"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="9"><b>ASESMEN GIZI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th colspan="6"><b>Antropometri</b></th>
														</tr>
														<tr>
															<td width="15%" class="pl-3">BB</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-bb" name="gd_bb" class="custom-form clear-input d-inline-block col-lg-2"> kg</td>
															<td width="15%" class="pl-3">Bila BB tiak dapat ditimbang, LILA</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-lila" name="gd_lila" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
														</tr>
														<tr>
															<td width="15%" class="pl-3">TB</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-tb" name="gd_tb" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
															<td width="15%" class="pl-3">Bila BB tiak dapat diukur, Tilut</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-tilut" name="gd_tilut" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
														</tr>
														<tr>
															<td class="pl-3">IMT</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-imt" name="gd_imt" class="custom-form clear-input d-inline-block col-lg-2"> kg/m²</td>
															<td colspan="3"></td>
														</tr>
														<tr>
															<td class="pl-3">Status gizi</td>
															<td width="1%">:</td>
															<td colspan="4">
																<input disabled type="text" id="rgd-status-gizi" name="gd_status_gizi" class="custom-form clear-input d-inline-block col-lg-3">
															</td>
														</tr>
														<tr>
															<th colspan="6"><b>Dalam 1 bulan terakhir</b></th>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">1. Kesulitan Makan</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_kesulitan" id="rgd-kesulitan-ya" value="1"> Ya
																<input disabled type="radio" name="gd_kesulitan" id="rgd-kesulitan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="6">2. Makan lebih sedikit dari biasanya</td>
														</tr>
														<tr>
															<td class="pl-5" colspan="3">≺ 1/2 porsi dari biasanya </td>
															<td colspan="3">
																<input disabled type="radio" name="gd_setengah" id="rgd-setengah-ya" value="1"> Ya
																<input disabled type="radio" name="gd_setengah" id="rgd-setengah-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-5" colspan="3">1/2 - 3/4 porsi dari biasanya </td>
															<td colspan="3">
																<input disabled type="radio" name="gd_tigaperempat" id="rgd-tigaperempat-ya" value="1"> Ya
																<input disabled type="radio" name="gd_tigaperempat" id="rgd-tigaperempat-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">3. Penurunan nafsu makan yang mempengaruhi asupan</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_penurunan" id="rgd-penurunan-ya" value="1"> Ya
																<input disabled type="radio" name="gd_penurunan" id="rgd-penurunan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">4. Perubahan rasa kecap</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_perubahan" id="rgd-perubahan-ya" value="1"> Ya
																<input disabled type="radio" name="gd_perubahan" id="rgd-perubahan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">5. Mual</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_mual" id="rgd-mual-ya" value="1"> Ya
																<input disabled type="radio" name="gd_mual" id="rgd-mual-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">6. Muntah</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_muntah" id="rgd-muntah-ya" value="1"> Ya
																<input disabled type="radio" name="gd_muntah" id="rgd-muntah-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">7. Gangguan / kesulitan mengunyah dan atau menelan</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_gangguan" id="rgd-gangguan-ya" value="1"> Ya
																<input disabled type="radio" name="gd_gangguan" id="rgd-gangguan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">8. Perlu bantuan saat makan / minum</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_perlu" id="rgd-perlu-ya" value="1"> Ya
																<input disabled type="radio" name="gd_perlu" id="rgd-perlu-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">9. Sering kali melewatkan waktu makan</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_sering" id="rgd-sering-ya" value="1"> Ya
																<input disabled type="radio" name="gd_sering" id="rgd-sering-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="3">10. Masalah dnegan gigi geligi</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_masalah" id="rgd-masalah-ya" value="1"> Ya
																<input disabled type="radio" name="gd_masalah" id="rgd-masalah-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
															<td class="pl-3" colspan="3">11. Diare</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_diare" id="rgd-diare-ya" value="1"> Ya
																<input disabled type="radio" name="gd_diare" id="rgd-diare-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">12. Konstipati</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_konstipati" id="rgd-konstipati-ya" value="1"> Ya
																<input disabled type="radio" name="gd_konstipati" id="rgd-konstipati-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">13. Pendarahn</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_pendarahan" id="rgd-pendarahan-ya" value="1"> Ya
																<input disabled type="radio" name="gd_pendarahan" id="rgd-pendarahan-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">14. Banyak bersendawa</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_bersendawa" id="rgd-bersendawa-ya" value="1"> Ya
																<input disabled type="radio" name="gd_bersendawa" id="rgd-bersendawa-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">15. Alergi makan / intoleransi terhadap makanan</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_intoleransi" id="rgd-intoleransi-ya" value="1"> Ya
																<input disabled type="radio" name="gd_intoleransi" id="rgd-intoleransi-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">16. Menjalani diet tertentu</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_diet" id="rgd-diet-ya" value="1"> Ya
																<input disabled type="radio" name="gd_diet" id="rgd-diet-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">17. Makan menggunakan NGT</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_ngt" id="rgd-ngt-ya" value="1"> Ya
																<input disabled type="radio" name="gd_ngt" id="rgd-ngt-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">18. Merasa lemah / tidak bertenaga</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_lemah" id="rgd-lemah-ya" value="1"> Ya
																<input disabled type="radio" name="gd_lemah" id="rgd-lemah-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														</tr>
															<td class="pl-3" colspan="3">19. Dirawat di RS dalam jangka setahun terakhir</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_dirawat" id="rgd-dirawat-ya" value="1"> Ya
																<input disabled type="radio" name="gd_dirawat" id="rgd-dirawat-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="6">20. Penurunan BB</td>
														</tr>
														<tr>
															<td class="pl-5" colspan="3">Lebih dari 3 kg dalam 1 bulan terakhir</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_tigakg" id="rgd-tigakg-ya" value="1"> Ya
																<input disabled type="radio" name="gd_tigakg" id="rgd-tigakg-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-5" colspan="3">Lebih dari 6 kg dalam 1 bulan terakhir</td>
															<td colspan="3">
																<input disabled type="radio" name="gd_enamkg" id="rgd-enamkg-ya" value="1"> Ya
																<input disabled type="radio" name="gd_enamkg" id="rgd-enamkg-tidak" value="2" class="ml-3"> Tidak
															</td>
														</tr>
														<tr>
															<td class="pl-3" colspan="6">21. 
																<input disabled type="radio" name="gd_penyakit" id="rgd-penyakit-keganasan" value="1" class="ml-2"> Penyakit keganasan 
																<input disabled type="radio" name="gd_penyakit" id="rgd-penyakit-kronis" value="2" class="ml-3"> Infeksi kronis 
																<input disabled type="radio" name="gd_penyakit" id="rgd-penyakit-bakar" value="3" class="ml-3"> Luka bakar 
																<input disabled type="radio" name="gd_penyakit" id="rgd-penyakit-kepala" value="4" class="ml-3"> Cidera kepala 
																<input disabled type="radio" name="gd_penyakit" id="rgd-penyakit-ginjal" value="5" class="ml-3"> Gagal ginjal, DM, lainnya
																<input disabled type="text" id="rgd-penyakit-lainnya" name="gd_penyakit_lainnya" class="custom-form clear-input d-inline-block col-lg-3">
															</td>
														</tr>
														<tr>
															<td colspan="6" class="pl-3">22. Data penunjang lainnya / Laboratorium</td>
														</tr>
														<tr>
															<td colspan="6" class="text-center pl-5"><textarea disabled name="gd_laboratorium" id="rgd-laboratorium" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="6" class="pl-3">23. Klinis / Fisik</td>
														</tr>
														<tr>
															<td colspan="6" class="text-center pl-5"><textarea disabled name="gd_klinis" id="rgd-klinis" class="custom-textarea" rows="5"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th colspan="3" class="center bg-dark text-light"><b>DIAGNOSIS GIZI</b></th>
														</tr>
														<tr>
															<th class="center"><b>PROBLEM</b></th>
															<th class="center"><b>ETIOLOGI</b></th>
															<th class="center"><b>TANDA/GEJALA</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><textarea disabled name="gd_problem" id="rgd-problem" class="form-control" rows="10"></textarea></td>
															<td><textarea disabled name="gd_etiologi" id="rgd-etiologi" class="form-control" rows="10"></textarea></td>
															<td><textarea disabled name="gd_gejala" id="rgd-gejala" class="form-control" rows="10"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="text-center bg-dark text-light" colspan="6"><b>INTERVENSI GIZI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th colspan="6"><b>Preskripsi Diet : </b><input disabled type="text" id="rgd-preskripsi" name="gd_preskripsi" class="custom-form clear-input d-inline-block col-lg-3"></th>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Energi</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-energi" name="gd_energi" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Cair</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="gd_jenis_makanan" id="rgd-makanan-cair" value="1"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Lemak</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-lemak" name="gd_lemak" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Lunak</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="gd_jenis_makanan" id="rgd-makanan-lunak" value="2"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Protein</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-protein" name="gd_protein" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Saring</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="gd_jenis_makanan" id="rgd-jenis-makanan-saring" value="3"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Karbohidrat</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-karbohidrat" name="gd_karbohidrat" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Makanan Biasa</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="gd_jenis_makanan" id="rgd-jenis-makanan-biasa" value="4"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3">Cairan</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-cairan" name="gd_cairan" class="custom-form clear-input d-inline-block col-lg-6"></td>
															<td width="10%">Route Diet</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-route" name="gd_route" class="custom-form clear-input d-inline-block col-lg-6"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">Oral</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="gd_cara_makan" id="rgd-cara-makan-oral" value="1"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">NGT</td>
															<td width="1%">:</td>
															<td><input disabled type="radio" name="gd_cara_makan" id="rgd-cara-makan-ngt" value="2"></td>
														</tr>
														<tr>
															<td width="10%" class="pl-3"></td>
															<td width="1%"></td>
															<td></td>
															<td width="10%">Frekuensi</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rgd-frekuensi" name="gd_frekuensi" class="custom-form clear-input d-inline-block col-lg-6"></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<thead>
														<tr>
															<th class="center bg-dark text-light"><b>MONITORING DAN EVALUASI</b></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><textarea disabled name="gd_monitoring" id="rgd-monitoring" class="form-control" rows="5"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="33%" class="center">
																Tanggal & Jam <input disabled type="text" name="gd_tgl_petugas" id="rgd-tgl-petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
															</td>
															<td width="33%">
															</td>
															<td width="33%" class="center"></td>
														</tr>
														<tr>
															<td class="center">Dietisien / Nutrisionist</td>
															<td></td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center"><input disabled type="text" name="gd_petugas" id="rgd-petugas" class="select2c-input ml-2"></td>
															<td></td>
															<td class="center"></td>

														</tr>
														<tr>
															<td class="center">Tanda Tangan</td>
															<td class="center"></td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center">
																<input disabled type="checkbox" name="gd_ttd" id="rgd-ttd" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
															</td>
															<td class="center">
															</td>
														</tr>
													</tbody>
												</table>
												<div class="d-flex justify-content-end">
													<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
												</div>
											</div>
										</div>
									</div>
									<?= form_close() ?>
								</div>
								<!-- akhir gizi dietik -->

								<!-- kosultasi gizi -->
								<div>
									<?= form_open('', 'id=form-riwayat-konsultasi-gizi class=form-horizontal') ?>
									<div class="form-riwayat-konsultasi-gizi">
										<input type="hidden" name="id_layanan_pendaftaran" id="rkg-id-layanan-pendaftaran">
										<input type="hidden" name="id_pendaftaran" id="rkg-id-pendaftaran">
										<input type="hidden" name="riwayat_bed" id="rkg-rwyt-bed">
										<input type="hidden" name="id_kg" id="rkg-id">
										<input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
										<input type="hidden" name="id_pasien" id="rkg-pasien">
										<div class="row">
											<div class="col-lg-12">
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<th colspan="9"><b>Pengkajian Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">a. Antropometri</td>
														</tr>
														<tr>
															<td width="5%" class="pl-3">BB</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rkg-bb" name="kg_bb" class="custom-form clear-input d-inline-block col-lg-3"> kg</td>
															<td width="5%" class="pl-3">LLA</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rkg-lla" name="kg_lla" class="custom-form clear-input d-inline-block col-lg-3"> cm</td>
															<td width="10%" class="pl-3">Perubahan BB</td>
															<td width="1%">:</td>
															<td><input disabled type="text" id="rkg-pbb" name="kg_pbb" class="custom-form clear-input d-inline-block col-lg-10"></td>
														</tr>
														<tr>
															<td class="pl-3">TB</td>
															<td>:</td>
															<td><input disabled type="text" id="rkg-tb" name="kg_tb" class="custom-form clear-input d-inline-block col-lg-3"> cm</td>
															<td class="pl-3">IMT</td>
															<td>:</td>
															<td><input disabled type="text" id="rkg-imt" name="kg_imt" class="custom-form clear-input d-inline-block col-lg-3"> kg/m²</td>
															<td colspan="3"></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">b. Biokimia</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea disabled name="kg_biokimia" id="rkg-biokimia" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">c. Fisik / Klinik</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea disabled name="kg_klinis" id="rkg-klinis" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">d. Riwayat Gizi</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea disabled name="kg_gizi" id="rkg-gizi" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">e. Riwayat Personal</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea disabled name="kg_personal" id="rkg-personal" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<th colspan="9"><b>Diagnosis Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea disabled name="kg_diagnosis" id="rkg-diagnosis" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<th colspan="9"><b>Intervensi Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">a. Tujuan</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea disabled name="kg_tujuan" id="rkg-tujuan" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">b. Intervensi</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea disabled name="kg_intervensi" id="rkg-intervensi" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<td colspan="9" class="pl-3">c. Konseling Giz / Edukasi</td>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea disabled name="kg_konseling" id="rkg-konseling" class="custom-textarea" rows="5"></textarea></td>
														</tr>
														<tr>
															<th colspan="9"><b>Rencana Monitoring dan Evaluasi Gizi</b></th>
														</tr>
														<tr>
															<td colspan="9" class="text-center pl-5"><textarea disabled name="kg_evaluasi" id="rkg-evaluasi" class="custom-textarea" rows="5"></textarea></td>
														</tr>
													</tbody>
												</table>
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td width="33%" class="center">
																Tanggal & Jam <input disabled type="text" name="kg_tgl_petugas" id="rkg-tgl-petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
															</td>
															<td width="33%">
															</td>
															<td width="33%" class="center"></td>
														</tr>
														<tr>
															<td class="center">Dietisien / Nutrisionist</td>
															<td></td>
															<td class="center">Pasien</td>
														</tr>
														<tr>
															<td class="center"><input disabled type="text" name="kg_petugas" id="rkg-petugas" class="select2c-input ml-2"></td>
															<td></td>
															<td class="center"><span id="nama-pasien"></span></td>

														</tr>
														<tr>
															<td class="center">Tanda Tangan</td>
															<td class="center"></td>
															<td class="center"></td>
														</tr>
														<tr>
															<td class="center">
																<input disabled type="checkbox" name="kg_ttd" id="rkg-ttd" value="1" class="custom-form col-lg-1 mx-auto">
															</td>
															<td class="center">
															</td>
															<td class="center">
															</td>
														</tr>
													</tbody>
												</table>
												<div class="d-flex justify-content-end">
													<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
												</div>
											</div>
										</div>
									</div>
									<?= form_close() ?>
								</div>
								<!-- akhir kosultasi gizi -->

							</div>
						</div>
					</div>
				</div>
				<!-- end header -->
				
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>

<!-- Modal Diagnosis Pasien-->
<div id="ga-modal-diagnosis" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="ga-modal-diagnosis-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ga-modal-diagnosis-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Diagnosis</li>
                                </ol>

                                <!-- Data bwizard -->
                                
                                <!-- Form diagnosis -->
                                <div class="form-diagnosis">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <table class="table table-sm table-detail table-striped" width="100%">
                                                    <tr>
                                                        <td width="150px"><b>Pasien</b></td>
                                                        <td width="1px">:</td>
                                                        <td><span id="identitas-pasien-diagnosis"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="ga-table-diagnosis">
                                                <thead class="thead-theme">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Dokter</th>
                                                        <th>Diagnosis</th>
                                                        <th>Klinik</th>
                                                        <th>Prioritas</th>
                                                        <th>Diagnosis Banding</th>
                                                        <th>Diagnosis Akhir</th>
                                                        <th>Penyabab Kematian</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form diagnosis -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- End Modal Diagnosis Pasien -->

<!-- Modal CPPT Pasien-->
<div id="ga-modal-cppt" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="ga-modal-cppt-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ga-modal-cppt-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="ga-wizard-form-cppt">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>CPPT</li>
                                </ol>

                                <!-- Data bwizard -->
                                
                                <!-- Form CPPT -->
                                <div class="form-data-cppt">
									<div class="row">
										<div class="col-lg-6">
                                                <table class="table table-sm table-detail table-striped" width="100%">
                                                    <tr>
                                                        <td width="150px"><b>Pasien</b></td>
                                                        <td width="1px">:</td>
                                                        <td><span id="identitas-pasien-cppt"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
										<div class="col-lg-12">
											<div class="row mb-2">
												<div class="col d-flex justify-content-start">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text" id="cppt-img-calendar"><i class="fas fa-fw fa-calendar-alt"></i></span>
														</div>
														<input type="text" name="waktu_search" id="cppt-waktu-search" class="form-control col-lg-4" placeholder="Pencarian Tanggal">
													</div>
												</div>
												<div class="col d-flex justify-content-end">
													<div class="custom-search">
														<input type="text" class="search-query-white" onkeyup="riwayatCPPTPasien($('#ga-id-layanan-pendaftaran').val(), 1)" id="cppt-keyword" placeholder="Pencarian ...">
														<button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
													</div>
												</div>
											</div>
											
											<table class="table table-sm table-striped table-bordered color-table info-table" id="table-cppt-gizi">
												<thead>
													<tr>
														<th class="center v-center" width="5%">No.</th>
														<th class="center v-center" width="10%">Waktu</th>
														<th class="center v-center" width="15%">Professional Pemberi Asuhan</th>
														<th class="center v-center" width="25%">Hasil Assessmen Pasien Dan Pemberian Pelayanan<br><span><i><small>(Tulis dengan format SOAP/ADIME, disertai sasaran, beri paraf pada akhir catatan)</small></i></span></th>
														<th class="center v-center" width="25%">Instruksi PPA Termasuk Pasca Bedah/Prosedur<br><span><i><small>(Instruksi ditulis dengan rinci dan jelas)</small></i></span></th>
														<th class="center v-center" width="10%">Review Dan Verifikasi DPJP</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<div id="cppt-pagination" class="float-left"></div>
											<div id="cppt-summary" class="float-right text-sm"></div>
										</div>
									</div>
								</div>
                                <!-- End Form CPPT -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal CPPT Pasien -->

<!-- Modal Pemeriksaan -->
<!-- id = modal-detail-pemeriksaan -->
<div id="modal-ga-lab" class="modal fade">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hasil Pemeriksaan Laboratorium</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-user mr-1"></i>Data Pasien
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>No. RM</td>
                                                    <td>:</td>
                                                    <td><b><span id="no-rm-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>No. Register</td>
                                                    <td>:</td>
                                                    <td><b><span id="no-register-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><b><span id="nama-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><b><span id="alamat-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelamin</td>
                                                    <td>:</td>
                                                    <td><b><span id="kelamin-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Umur / Tgl. Lahir</td>
                                                    <td>:</td>
                                                    <td><b><span id="umur-detail"></span></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">Nama P. Jawab</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%"><b><span id="nama-pjwb-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat P. Jawab</td>
                                                    <td>:</td>
                                                    <td><b><span id="alaamt-pjwb-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Telp. P. Jawab</td>
                                                    <td>:</td>
                                                    <td><b><span id="telp-pjwb-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>Instansi Perujuk</td>
                                                    <td>:</td>
                                                    <td><b><span id="instansi-perujuk-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tenaga Medis Perujuk</td>
                                                    <td>:</td>
                                                    <td><b><span id="tenaga-medis-perujuk-detail"></span></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fas fa-list mr-1"></i>Hasil Laboratorium
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="box-well">
                                            <div id="hasil-pemeriksaan-laboratorium"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pemeriksaan -->
