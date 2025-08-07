<script>
	$(function() {
		$("#wizard-dpmp-2").bwizard();
		$("#wizard-diet").bwizard();

		$('#dpmp_waktu').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            // maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

		$('#dpmp_nadis').select2c({
			ajax: {
				url: "<?= base_url('pelayanan/api/pelayanan/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: $('#dpmp_profesi').val(),
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

		$('#dc_item').select2c({
			ajax: {
				url: "<?= base_url('gizi/api/gizi/item_diet') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: $('#dc_diet').val(),
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
				var markup = '<b>' + data.nama + '</b>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#ds_item').select2c({
			ajax: {
				url: "<?= base_url('gizi/api/gizi/item_diet') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: $('#ds_diet').val(),
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
				var markup = '<b>' + data.nama + '</b>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#dc_jam_1, #dc_jam_2, #dc_jam_3, #dc_jam_4, #dc_jam_5, #dc_jam_6, #dc_jam_7, #dc_jam_8, #ds_jam_1, #ds_jam_2, #ds_jam_3, #ds_jam_4, #ds_jam_5, #ds_jam_6, #ds_jam_7, #ds_jam_8').datetimepicker({
			format: 'HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            // maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

		// print
        $('#btn-etiket-2').click(function() {
            $('#modal-cetak-etiket-2').modal('show');
            // $('#form-cetak-etiket')[0].reset();
        });

        $('#tanggal_awal_2, #tanggal_akhir_2').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date(),
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#jam_cetak_2').datetimepicker({
			format: 'HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            // maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

	})

    function entriDPMP2(id_pendaftaran, id_layanan_pendaftaran, bed) {
        resetAll();
		$('#table_dpmp_2 tbody').empty();
        $('#wizard-dpmp-2').bwizard('show', '1');
        $('#wizard-diet').bwizard('show', '0');

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran + '/tipe/dpmp',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#dpmp_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#dpmp_id_pendaftaran').val(id_pendaftaran);
                $('#dpmp_riwayat_bed').val(bed);
                if (data.pasien !== null) {
					$('#id-pasien').val(data.pasien.no_rm);
                    $('#dpmp_nama_pasien').text(data.pasien.nama);
                    $('#dpmp_no_rm').text(data.pasien.no_rm);
                    $('#dpmp_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#dpmp_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#dpmp_dpjp').text(data.layanan.dokter);

					if (data.layanan.tindak_lanjut !== null) {
						let url;
						if (data.layanan.tindak_lanjut === 'Rawat Inap') {
							url = '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_ranap") ?>/id_layanan/' + id_layanan_pendaftaran;
						} else if (data.layanan.tindak_lanjut === 'Intensive Care') {
							url = '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_icare") ?>/id_layanan/' + id_layanan_pendaftaran;
						} else {
							$('#dpmp_status_ruang').val('Masih Di tempat');
							$('#dpmp_status_ruang').text('Masih Di tempat');
							return;
						}

						$.ajax({
							type: 'GET',
							url: url,
							cache: false,
							dataType: 'JSON',
							beforeSend: function() {
								showLoader();
							},
							success: function(response) {
								let bed_info = '';
								if (data.layanan.tindak_lanjut === 'Rawat Inap' && response.bangsal_ri !== null) {
									bed_info = response.bangsal_ri + ' kelas ' + response.kelas_ri + ' ruang ' + response.ruang_ri + ' No. Bed ' + response.bed_ri;
								} else if (data.layanan.tindak_lanjut === 'Intensive Care' && response.bangsal_ic !== null) {
									bed_info = response.bangsal_ic + ' kelas ' + response.kelas_ic + ' ruang ' + response.ruang_ic + ' No. Bed ' + response.bed_ic;
								} else {
									bed_info = 'Ruangan dan Bed Masih dalam status request';
								}
								$('#dpmp_status_ruang').val(bed_info);
							},
							complete: function() {
								hideLoader();
							},
							error: function(e) {
								accessFailed(e.status);
							}
						});
					} else {
						$('#dpmp_status_ruang').val('Masih Di tempat');
					}
                }

                $('#dpmp_bed').text(bed);
                getListDPMP2(id_layanan_pendaftaran, 1);
                $('#modal-dpmp-2').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })

    }

	function resetDpmp() {
		$('#dpmp_waktu, #dpmp_profesi, #dpmp_nadis, #dpmp_ttd_nadis_old, #dpmp_mp, #dpmp_sp, #dpmp_ms, #dpmp_ss, #dpmp_mm, #dpmp_sm, #dpmp_ket, #dpmp_pd').val('');
		$('#s2id_dpmp_nadis a .select2c-chosen').html('Pilih Pemberi Pelayanan');
		$('#dpmp_ttd_nadis').prop('checked', false);
		$('#dpmp_ttd_nadis_verified').hide();

	}

	function resetDm(){
		$('#dm_jd_mp, #dm_bm_mp, #dm_jd_sp, #dm_bm_sp, #dm_jd_ms, #dm_bm_ms, #dm_jd_ss, #dm_bm_ss, #dm_jd_mm, #dm_bm_mm, #dm_jd_sm, #dm_bm_sm').val('');
		$('#dm_biasa, #dm_p, #dm_rs, #dm_cr, #dm_rg, #dm_sd, #dm_dm, #dm_rk, #dm_tk, #dm_dh, #dm_rl, #dm_tktp, #dm_dj, #dm_rp, #dm_ts, #dm_dl, #dm_rpn').prop('checked', false);
	}

	function resetDc() {
		$('#dc_diet, #dc_item, #dc_jam_1, #dc_jam_2, #dc_jam_3, #dc_jam_4, #dc_jam_5, #dc_jam_6, #dc_jam_7, #dc_jam_8, #dc_keterangan, #dc_gram, #dc_mp, #dc_ms, #dc_mm, #dc_sp, #dc_ss, #dc_sm').val('');
	}

	function resetDs() {
		$('#ds_biasa, #ds_p, #ds_rs, #ds_cr, #ds_rg, #ds_sd, #ds_dm, #ds_rk, #ds_tk, #ds_dh, #ds_rl, #ds_tktp, #ds_dj, #ds_rp, #ds_ts, #ds_dl, #ds_rpn').prop('checked', false);
		$('#ds_jd_mp, #ds_bm_mp, #ds_jd_sp, #ds_bm_sp, #ds_jd_ms, #ds_bm_ms, #ds_jd_ss, #ds_bm_ss, #ds_jd_mm, #ds_bm_mm, #ds_jd_sm, #ds_bm_sm, #ds_diet, #ds_item, #ds_jam_1, #ds_jam_2, #ds_jam_3, #ds_jam_4, #ds_jam_5, #ds_jam_6, #ds_jam_7, #ds_jam_8, #ds_keterangan, #ds_gram, #ds_mp, #ds_ms, #ds_mm, #ds_sp, #ds_ss, #ds_sm').val('');
	}

	function resetAll(){
		resetDpmp();
		resetDm();
		resetDc();
		resetDs();
		clearValidate(this);

		$('[disabled]').removeAttr('disabled');
		$('.form-diet-makan').prop('hidden', true);
		$('.form-diet-cair').prop('hidden', true);
		$('.form-diet-sharing').prop('hidden', true);
		$('#dpmp_nadis').select2c('readonly', false);
		$('#dpmp_ttd_nadis').show();
		$('#dpmp_pd_text').text('').prop('hidden', true);

	}

	function pilihDiet(data) {
		resetDm();
		resetDc();
		resetDs();
		
		if (data === '1') {
			$('.form-diet-makan').prop('hidden', false);
			$('.form-diet-cair').prop('hidden', true);
			$('.form-diet-sharing').prop('hidden', true);
			$('#wizard-diet').bwizard('show', '0');
		} else if (data === '2') {
			$('.form-diet-makan').prop('hidden', true);
			$('.form-diet-cair').prop('hidden', false);
			$('.form-diet-sharing').prop('hidden', true);
			$('#wizard-diet').bwizard('show', '1');
		} else {
			$('.form-diet-makan').prop('hidden', true);
			$('.form-diet-cair').prop('hidden', true);
			$('.form-diet-sharing').prop('hidden', false);
			$('#wizard-diet').bwizard('show', '2');
		}

		clearValidate(this);
	}

	function simpanDPMP2() {

		// Validation
		if ($('#dpmp_waktu').val() === '') {
			$('#wizard-dpmp-2').bwizard('show', '0');
			syams_validation('#dpmp_waktu', 'Silakan Tentukan Tanggal DPMP terlebih dahulu');
			return false;
		}

		if ($('#dpmp_profesi').val() === '' || $('#dpmp_profesi').val() === null) {
			$('#wizard-dpmp-2').bwizard('show', '0');
			syams_validation('#dpmp_profesi', 'Pilih profesi dahulu!');
			return false;
		}

		if ($('#dpmp_nadis').val() === '') {
			$('#wizard-dpmp-2').bwizard('show', '0');
			syams_validation('#dpmp_nadis', 'Pilih pemberi pelayanan!');
			$("#dpmp_nadis").select2c("open");
			return false;
		}

		if ($('#dpmp_ttd_nadis').is(":visible") && !$('#dpmp_ttd_nadis').is(":checked")) {
			$('#wizard-dpmp-2').bwizard('show', '0');
			swalAlert('warning', 'Validasi Simpan', 'Silahkan paraf terlebih dahulu!');
			return false;
		}

		if ($('#dpmp_pd').val() === '' || $('#dpmp_pd').val() === null) {
			$('#wizard-dpmp-2').bwizard('show', '0');
			syams_validation('#dpmp_pd', 'Pilihan Diet tidak boleh kosong!');
			return false;
		}

		var id_dpmp = $('#id_dpmp').val();
		var id_layanan_pendaftaran = $('#dpmp_id_layanan_pendaftaran').val();
		var pesan = id_dpmp !== '' ? 'Apakah anda yakin mengubah data DPMP ini ?' : 'Apakah anda yakin menyimpan data DPMP ini ?';
		var confirm_button = id_dpmp !== '' ? 'Update' : 'Simpan';

		swal.fire({
			title: 'Konfirmasi',
			html: pesan,
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				// Combine serialized data from multiple forms
				// var formData = $('#form-dpmp-2').serialize();
				// formData += '&' + $('#form-diet-makan').serialize();
				// formData += '&' + $('#form-diet-cair').serialize();
				// formData += '&' + $('#form-diet-sharing').serialize();

				$.ajax({
					type: 'POST',
					url: '<?= base_url("gizi/api/gizi/simpan_dpmp_2") ?>',
					data: $('#form-dpmp-2').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.pesan, 'Error');
						} else {
							$('#wizard-dpmp-2').bwizard('show', '1');
							messageCustom(data.pesan, 'Success');
							getListDPMP2(id_layanan_pendaftaran, 1);
						}
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data');
					}
				});
			}
		});
	}

	function clearValidate(e) {
		if (e.value !== '') {
			syams_validation_remove(e);
		}
	}

	function getListDPMP2(id_layanan_pendaftaran, page) {
		resetAll();
		$('#table_dpmp_2 tbody').empty();
		$('#wizard-dpmp-2').bwizard('show', '1');

		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/get_list_dpmp_2") ?>/page/' + page + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			data: 'keyword=' + $('#dpmp_keyword').val() + '&waktu=' + $('#dpmp_waktu_search').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				
				if ((page - 1) & (data.data.length === 0)) {
					getListDPMP2('', page - 1);
					return false;
				}

				$('#dpmp-pagination').html(pagination2(data.jumlah, data.limit, data.page, 1));
				$('#dpmp-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$.each(data.data, function(i, v){

					let no = (i + 1) + ((data.page - 1) * data.limit);

					let jenisDiet = '';
					if (v.dpmp_pd === '1') {
						jenisDiet = 'Diet Makan';
					} else if (v.dpmp_pd === '2') {
						jenisDiet = 'Diet Cair';
					} else {
						jenisDiet = 'Diet Sharing';
					}

					let hasil = '';

					// jenis diet makan
					let jenisDietMakan = [
						(v.dm_jd_mp !== null ? v.dm_jd_mp : ''),
						(v.dm_jd_sp !== null ? v.dm_jd_sp : ''),
						(v.dm_jd_ms !== null ? v.dm_jd_ms : ''),
						(v.dm_jd_ss !== null ? v.dm_jd_ss : ''),
						(v.dm_jd_mm !== null ? v.dm_jd_mm : ''),
						(v.dm_jd_sm !== null ? v.dm_jd_sm : '')
					];
					if (jenisDietMakan.length > 0 && jenisDietMakan.some(item => item !== '')) {
						let newBtkMkn = [...new Set(jenisDietMakan)];
						hasil += newBtkMkn.filter(item => item !== '').join(', ') + '<br>';
					}

					let bentuk_makanan = [
						(v.dm_bm_mp !== null ? v.dm_bm_mp : ''),
						(v.dm_bm_sp !== null ? v.dm_bm_sp : ''),
						(v.dm_bm_ms !== null ? v.dm_bm_ms : ''),
						(v.dm_bm_ss !== null ? v.dm_bm_ss : ''),
						(v.dm_bm_mm !== null ? v.dm_bm_mm : ''),
						(v.dm_bm_sm !== null ? v.dm_bm_sm : '')
					];
					if (bentuk_makanan.length > 0 && bentuk_makanan.some(item => item !== '')) {
						let newBtkMkn = [...new Set(bentuk_makanan)];
						hasil += newBtkMkn.filter(item => item !== '').join(', ') + '';
					}

					// diet cair
					let diet_cair = [
						(v.dc_mp_kode !== null ? v.dc_mp_kode : ''),
						(v.dc_ms_kode !== null ? v.dc_ms_kode : ''),
						(v.dc_mm_kode !== null ? v.dc_mm_kode : ''),
						(v.dc_ss_kode !== null ? v.dc_ss_kode : ''),
						(v.dc_sp_kode !== null ? v.dc_sp_kode : ''),
						(v.dc_sm_kode !== null ? v.dc_sm_kode : '')
					];

					let keterangan_diet_cair = v.dc_keterangan !== null ? v.dc_keterangan : '';

					let gram = v.dc_gram !== null ? v.dc_gram : '';

					let jam_pemberian = [
						(v.dc_jam_1 !== null ? v.dc_jam_1.split(':')[0] : ''),
						(v.dc_jam_2 !== null ? v.dc_jam_2.split(':')[0] : ''),
						(v.dc_jam_3 !== null ? v.dc_jam_3.split(':')[0] : ''),
						(v.dc_jam_4 !== null ? v.dc_jam_4.split(':')[0] : ''),
						(v.dc_jam_5 !== null ? v.dc_jam_5.split(':')[0] : ''),
						(v.dc_jam_6 !== null ? v.dc_jam_6.split(':')[0] : ''),
						(v.dc_jam_7 !== null ? v.dc_jam_7.split(':')[0] : ''),
						(v.dc_jam_8 !== null ? v.dc_jam_8.split(':')[0] : '')
					];

					let getJamP = '';
					if (jam_pemberian.some(jam => jam !== '')) {
						getJamP = 'JAM : ' + jam_pemberian.filter(jam => jam !== '').join(', ') + ' WIB';
					}

					if (Array.isArray(diet_cair) && diet_cair.length > 0 && diet_cair.join('') !== '') {
						let newDietCair = [...new Set(diet_cair.filter(kode => kode !== ''))];
						hasil += newDietCair.join(', ') + '<br>' + keterangan_diet_cair + ' ' + gram + ' Gr ' + '<br>' + getJamP;
					}

					// diet sharing
					let jenisDietSharing = [
						(v.ds_jd_mp !== null ? v.ds_jd_mp : ''),
						(v.ds_jd_sp !== null ? v.ds_jd_sp : ''),
						(v.ds_jd_ms !== null ? v.ds_jd_ms : ''),
						(v.ds_jd_ss !== null ? v.ds_jd_ss : ''),
						(v.ds_jd_mm !== null ? v.ds_jd_mm : ''),
						(v.ds_jd_sm !== null ? v.ds_jd_sm : '')
					];
					if (jenisDietSharing.length > 0 && jenisDietSharing.some(item => item !== '')) {
						let newBtkMkn = [...new Set(jenisDietSharing)];
						hasil += 'Diet Makan :'  + '<br>' + newBtkMkn.filter(item => item !== '').join(', ') + '<br>';
					}

					let bentuk_makanan_sharing = [
						(v.ds_bm_mp !== null ? v.ds_bm_mp : ''),
						(v.ds_bm_sp !== null ? v.ds_bm_sp : ''),
						(v.ds_bm_ms !== null ? v.ds_bm_ms : ''),
						(v.ds_bm_ss !== null ? v.ds_bm_ss : ''),
						(v.ds_bm_mm !== null ? v.ds_bm_mm : ''),
						(v.ds_bm_sm !== null ? v.ds_bm_sm : '')
					];
					if (bentuk_makanan_sharing.length > 0 && bentuk_makanan_sharing.some(item => item !== '')) {
						let newBtkMkn = [...new Set(bentuk_makanan_sharing)];
						hasil += newBtkMkn.filter(item => item !== '').join(', ') + '<br>';
					}

					let diet_cair_sharing = [
						(v.ds_mp_kode !== null ? v.ds_mp_kode : ''),
						(v.ds_ms_kode !== null ? v.ds_ms_kode : ''),
						(v.ds_mm_kode !== null ? v.ds_mm_kode : ''),
						(v.ds_ss_kode !== null ? v.ds_ss_kode : ''),
						(v.ds_sp_kode !== null ? v.ds_sp_kode : ''),
						(v.ds_sm_kode !== null ? v.ds_sm_kode : '')
					];

					let keterangan_diet_cair_sharing = v.ds_keterangan !== null ? v.ds_keterangan : '';

					let gram_sharing = v.ds_gram !== null ? v.ds_gram : '';

					// let jam_pemberian_sharing = [
					// 	(v.ds_jam_1 !== null ? v.ds_jam_1.split(':')[0] : ''),
					// 	(v.ds_jam_2 !== null ? v.ds_jam_2.split(':')[0] : ''),
					// 	(v.ds_jam_3 !== null ? v.ds_jam_3.split(':')[0] : ''),
					// 	(v.ds_jam_4 !== null ? v.ds_jam_4.split(':')[0] : ''),
					// 	(v.ds_jam_5 !== null ? v.ds_jam_5.split(':')[0] : ''),
					// 	(v.ds_jam_6 !== null ? v.ds_jam_6.split(':')[0] : ''),
					// 	(v.ds_jam_7 !== null ? v.ds_jam_7.split(':')[0] : ''),
					// 	(v.ds_jam_8 !== null ? v.ds_jam_8.split(':')[0] : '')
					// ];

					// let getJamSharing = '';
					// if (jam_pemberian_sharing.some(jam => jam !== '')) {
					// 	getJamSharing = 'JAM : ' + jam_pemberian_sharing.filter(jam => jam !== '').join(', ') + ' WIB';
					// }

					if (Array.isArray(diet_cair_sharing) && diet_cair_sharing.length > 0 && diet_cair_sharing.join('') !== '') {
						let newDietCair = [...new Set(diet_cair_sharing.filter(kode => kode !== ''))];
						hasil += 'Diet Cair :' + '<br>' +  newDietCair.join(', ') + '<br>' + keterangan_diet_cair_sharing + ' ' + gram_sharing + ' Gr ' + '<br>';
					}

					let cek = '';
					let button_cek = '';
					if (v.ceklist !== null){
						cek = '<td class="center">Selesai</td>';
						button_cek = '<button type="button" class="btn btn-secondary btn-xxs" onclick="batalCeklist2(' + v.id + ', ' + id_layanan_pendaftaran + ')"><i class="fas fa-sign m-r-5"></i>Batal Cek</button>';
					} else {
						cek = '<td class="center">Belum</td>';
						button_cek = '<button type="button" class="btn btn-secondary btn-xxs" onclick="doCeklist2(' + v.id + ', ' + id_layanan_pendaftaran + ')"><i class="fas fa-sign m-r-5"></i>Cek</button>';
					}

					let html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td class="center">${v.dpmp_waktu !== null ? datetimefmysql(v.dpmp_waktu) : '-'}</td>
							<td class="center">${v.nama_nadis}<br>(${v.nama_profesi})</td>
							<td class="center">${jenisDiet}</td>
							<td class="center">${hasil}</td>
							<td class="center">${v.dpmp_mp !== null ? v.dpmp_mp : '-'}</td>
							<td class="center">${v.dpmp_sp !== null ? v.dpmp_sp : '-'}</td>
							<td class="center">${v.dpmp_ms !== null ? v.dpmp_ms : '-'}</td>
							<td class="center">${v.dpmp_ss !== null ? v.dpmp_ss : '-'}</td>
							<td class="center">${v.dpmp_mm !== null ? v.dpmp_mm : '-'}</td>
							<td class="center">${v.dpmp_sm !== null ? v.dpmp_sm : '-'}</td>
							${cek}
							<td class="center">
								<input type="checkbox" name="dpmp_print" class="dpmp_print" value="${v.id}" ${v.dpmp_print === '1' ? 'checked' : ''}>
							</td>
							<td class="right aksi">
								${button_cek}
								<button type="button" class="btn btn-secondary btn-xxs" onclick="detailDPMP2(${v.id}, ${v.id_layanan_pendaftaran})">
									<i class="fas fa-eye m-r-5"></i>Lihat DPMP
								</button>
								<button type="button" class="btn btn-secondary btn-xs" onclick="editDPMP2(${v.id})">
									<i class="fas fa-fw fa-edit mr-1"></i>Edit
								</button>
								${accountGroup === 'Admin' ? `
									<button type="button" class="btn btn-secondary btn-xs" onclick="hapusDPMP2(${v.id}, ${id_layanan_pendaftaran})">
										<i class="fas fa-fw fa-trash-alt mr-1"></i>Hapus
									</button>` : ''}
							</td>
						</tr>
					`;

					$('#table_dpmp_2 tbody').append(html);
				})

				$('.dpmp_print').on('click', function(){
					$.ajax({
						type: 'POST',
						url: '<?= base_url("gizi/api/gizi/simpan_print_dpmp_2/") ?>' + $(this).val(),
						data: {
							id : $(this).val(),
							checked : $(this).is(':checked') ? 1 : 0
						},
						cache: false,
						dataType: 'JSON',
						beforeSend: function() {
							showLoader();
						},
						success: function(data) {
							if (data.status === false) {
								messageCustom(data.pesan, 'Error');
							} else {
								$('#wizard-dpmp-2').bwizard('show', '1');
								messageCustom(data.pesan, 'Success');
								resetAll();
								getListDPMP2(id_layanan_pendaftaran, 1);
							}
						},
						complete: function() {
							hideLoader();
						},
						error: function(e) {
							messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
						}
					})
				})

				
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed('Gagal mendapatkan data!');
			}
		});
	}

	function paging2(page) {
		getListDPMP2($('#id_layanan_pendaftaran').val(), page);
	}

	function doCeklist2(id, id_layanan_pendaftaran) {

		let pesan = 'Apakah anda Sudah Menyelesaikan DPMP ini ?';
		let confirm_button = 'Simpan';
		

		swal.fire({
			title: 'Konfirmasi',
			html: pesan,
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("gizi/api/gizi/simpan_ceklist_2") ?>',
					data: 'id=' + id + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.pesan, 'Error');
						} else {
							$('#wizard-dpmp').bwizard('show', '1');
							messageCustom('Ceklist Selesai', 'Success');
							getListDPMP2(id_layanan_pendaftaran, 1);
						}
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
					}
				})
			}
		});
	}

	function batalCeklist2(id, id_layanan_pendaftaran) {

		let pesan = 'Apakah Anda ingin Membatalkan Ceklist ini ?';
		let confirm_button = 'Simpan';
		

		swal.fire({
			title: 'Konfirmasi',
			html: pesan,
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("gizi/api/gizi/batal_ceklist_2") ?>',
					data: 'id=' + id + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.pesan, 'Error');
						} else {
							$('#wizard-dpmp').bwizard('show', '1');
							messageCustom('Batal Ceklist Berhasil', 'Success');
							getListDataDPMP2(id_layanan_pendaftaran, 1);
						}
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
					}
				})
			}
		});
	}

	function detailDPMP2(id, id_layanan_pendaftaran) {
		resetAll();
		$('#wizard-dpmp-2').bwizard('show', '0');
		$('#wizard-diet').bwizard('show', '0');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/ambil_data_dpmp_2") ?>/id/' + id + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				
				if(data !== null){
					let dpmp = data.dpmp;
					$('input[type="checkbox"]').attr('disabled', true);

					// dpmp
					$('#dpmp_waktu').val(dpmp.dpmp_waktu !== null ? datetimefmysql(dpmp.dpmp_waktu) : '').attr('disabled', true);
					$('#dpmp_profesi').val(dpmp.dpmp_profesi).attr('disabled', true);
					$('#dpmp_nadis').select2c('readonly', true);
					$('#s2id_dpmp_nadis a .select2c-chosen').html(dpmp.nama_nadis);
					if (dpmp.ttd_nadis !== null) {
						$('#dpmp_ttd_nadis').hide();
						$('#dpmp_ttd_nadis_verified').show();
						$('#dpmp_ttd_nadis_old').val(dpmp.ttd_nadis);
					}
					$('#dpmp_status_ruang').val(dpmp.dpmp_status_ruang).attr('disabled', true);
					$('#dpmp_mp').val(dpmp.dpmp_mp).attr('disabled', true);
					$('#dpmp_sp').val(dpmp.dpmp_sp).attr('disabled', true);
					$('#dpmp_ms').val(dpmp.dpmp_ms).attr('disabled', true);
					$('#dpmp_ss').val(dpmp.dpmp_ss).attr('disabled', true);
					$('#dpmp_mm').val(dpmp.dpmp_mm).attr('disabled', true);
					$('#dpmp_sm').val(dpmp.dpmp_sm).attr('disabled', true);
					$('#dpmp_ket').val(dpmp.dpmp_ket).attr('disabled', true);
					$('#dpmp_pd').val(dpmp.dpmp_pd).attr('disabled', true);
					
					// diet makan
					if (dpmp.dpmp_pd ==='1') {
						$('.form-diet-makan').prop('hidden', false);
						$('.form-diet-cair').prop('hidden', true);
						$('.form-diet-sharing').prop('hidden', true);
						$('#wizard-diet').bwizard('show', '0');
						
						if (dpmp.dm_biasa !== null) {
							$('#dm_biasa').prop('checked', true);
						}
						if (dpmp.dm_p !== null) {
							$('#dm_p').prop('checked', true);
						}
						if (dpmp.dm_rs !== null) {
							$('#dm_rs').prop('checked', true);
						}
						if (dpmp.dm_cr !== null) {
							$('#dm_cr').prop('checked', true);
						}
						if (dpmp.dm_rg !== null) {
							$('#dm_rg').prop('checked', true);
						}
						if (dpmp.dm_sd !== null) {
							$('#dm_sd').prop('checked', true);
						}
						if (dpmp.dm_dm !== null) {
							$('#dm_dm').prop('checked', true);
						}
						if (dpmp.dm_rk !== null) {
							$('#dm_rk').prop('checked', true);
						}
						if (dpmp.dm_tk !== null) {
							$('#dm_tk').prop('checked', true);
						}
						if (dpmp.dm_dh !== null) {
							$('#dm_dh').prop('checked', true);
						}
						if (dpmp.dm_rl !== null) {
							$('#dm_rl').prop('checked', true);
						}
						if (dpmp.dm_tktp !== null) {
							$('#dm_tktp').prop('checked', true);
						}
						if (dpmp.dm_dj !== null) {
							$('#dm_dj').prop('checked', true);
						}
						if (dpmp.dm_rp !== null) {
							$('#dm_rp').prop('checked', true);
						}
						if (dpmp.dm_ts !== null) {
							$('#dm_ts').prop('checked', true);
						}
						if (dpmp.dm_dl !== null) {
							$('#dm_dl').prop('checked', true);
						}
						if (dpmp.dm_rpn !== null) {
							$('#dm_rpn').prop('checked', true);
						}

						$('#dm_jd_mp').val(dpmp.dm_jd_mp).attr('disabled', true);
						$('#dm_jd_sp').val(dpmp.dm_jd_sp).attr('disabled', true);
						$('#dm_jd_ms').val(dpmp.dm_jd_ms).attr('disabled', true);
						$('#dm_jd_ss').val(dpmp.dm_jd_ss).attr('disabled', true);
						$('#dm_jd_mm').val(dpmp.dm_jd_mm).attr('disabled', true);
						$('#dm_jd_sm').val(dpmp.dm_jd_sm).attr('disabled', true);
						
						$('#dm_bm_mp').val(dpmp.dm_bm_mp).attr('disabled', true);
						$('#dm_bm_sp').val(dpmp.dm_bm_sp).attr('disabled', true);
						$('#dm_bm_ms').val(dpmp.dm_bm_ms).attr('disabled', true);
						$('#dm_bm_ss').val(dpmp.dm_bm_ss).attr('disabled', true);
						$('#dm_bm_mm').val(dpmp.dm_bm_mm).attr('disabled', true);
						$('#dm_bm_sm').val(dpmp.dm_bm_sm).attr('disabled', true);

					}

					// diet cair
					if (dpmp.dpmp_pd === '2') {
						$('.form-diet-makan').prop('hidden', true);
						$('.form-diet-cair').prop('hidden', false);
						$('.form-diet-sharing').prop('hidden', true);
						$('#wizard-diet').bwizard('show', '1');

						$('#dc_diet').val(dpmp.dc_diet).attr('disabled', true);
						$('#dc_item').select2c('readonly', true);
						$('#s2id_dc_item a .select2c-chosen').html(dpmp.dc_nama_item);
						$('#dc_jam_1').val(dpmp.dc_jam_1).attr('disabled', true);
						$('#dc_jam_2').val(dpmp.dc_jam_2).attr('disabled', true);
						$('#dc_jam_3').val(dpmp.dc_jam_3).attr('disabled', true);
						$('#dc_jam_4').val(dpmp.dc_jam_4).attr('disabled', true);
						$('#dc_jam_5').val(dpmp.dc_jam_5).attr('disabled', true);
						$('#dc_jam_6').val(dpmp.dc_jam_6).attr('disabled', true);
						$('#dc_jam_7').val(dpmp.dc_jam_7).attr('disabled', true);
						$('#dc_jam_8').val(dpmp.dc_jam_8).attr('disabled', true);
						$('#dc_keterangan').val(dpmp.dc_keterangan).attr('disabled', true);
						$('#dc_gram').val(dpmp.dc_gram).attr('disabled', true);
						$('#dc_mp').val(dpmp.dc_mp).attr('disabled', true);
						$('#dc_ms').val(dpmp.dc_ms).attr('disabled', true);
						$('#dc_mm').val(dpmp.dc_mm).attr('disabled', true);
						$('#dc_sp').val(dpmp.dc_sp).attr('disabled', true);
						$('#dc_sm').val(dpmp.dc_sm).attr('disabled', true);
					}

					// diet sharing
					if (dpmp.dpmp_pd === '3') {
						$('.form-diet-makan').prop('hidden', true);
						$('.form-diet-cair').prop('hidden', true);
						$('.form-diet-sharing').prop('hidden', false);
						$('#wizard-diet').bwizard('show', '2');
						
						if (dpmp.ds_biasa !== null) {
							$('#ds_biasa').prop('checked', true);
						}
						if (dpmp.ds_p !== null) {
							$('#ds_p').prop('checked', true);
						}
						if (dpmp.ds_rs !== null) {
							$('#ds_rs').prop('checked', true);
						}
						if (dpmp.ds_cr !== null) {
							$('#ds_cr').prop('checked', true);
						}
						if (dpmp.ds_rg !== null) {
							$('#ds_rg').prop('checked', true);
						}
						if (dpmp.ds_sd !== null) {
							$('#ds_sd').prop('checked', true);
						}
						if (dpmp.ds_dm !== null) {
							$('#ds_dm').prop('checked', true);
						}
						if (dpmp.ds_rk !== null) {
							$('#ds_rk').prop('checked', true);
						}
						if (dpmp.ds_tk !== null) {
							$('#ds_tk').prop('checked', true);
						}
						if (dpmp.ds_dh !== null) {
							$('#ds_dh').prop('checked', true);
						}
						if (dpmp.ds_rl !== null) {
							$('#ds_rl').prop('checked', true);
						}
						if (dpmp.ds_tktp !== null) {
							$('#ds_tktp').prop('checked', true);
						}
						if (dpmp.ds_dj !== null) {
							$('#ds_dj').prop('checked', true);
						}
						if (dpmp.ds_rp !== null) {
							$('#ds_rp').prop('checked', true);
						}
						if (dpmp.ds_ts !== null) {
							$('#ds_ts').prop('checked', true);
						}
						if (dpmp.ds_dl !== null) {
							$('#ds_dl').prop('checked', true);
						}
						if (dpmp.ds_rpn !== null) {
							$('#ds_rpn').prop('checked', true);
						}

						$('#ds_jd_mp').val(dpmp.ds_jd_mp).attr('disabled', true);
						$('#ds_jd_sp').val(dpmp.ds_jd_sp).attr('disabled', true);
						$('#ds_jd_ms').val(dpmp.ds_jd_ms).attr('disabled', true);
						$('#ds_jd_ss').val(dpmp.ds_jd_ss).attr('disabled', true);
						$('#ds_jd_mm').val(dpmp.ds_jd_mm).attr('disabled', true);
						$('#ds_jd_sm').val(dpmp.ds_jd_sm).attr('disabled', true);
						
						$('#ds_bm_mp').val(dpmp.ds_bm_mp).attr('disabled', true);
						$('#ds_bm_sp').val(dpmp.ds_bm_sp).attr('disabled', true);
						$('#ds_bm_ms').val(dpmp.ds_bm_ms).attr('disabled', true);
						$('#ds_bm_ss').val(dpmp.ds_bm_ss).attr('disabled', true);
						$('#ds_bm_mm').val(dpmp.ds_bm_mm).attr('disabled', true);
						$('#ds_bm_sm').val(dpmp.ds_bm_sm).attr('disabled', true);

						$('#ds_diet').val(dpmp.ds_diet).attr('disabled', true);
						$('#ds_item').select2c('readonly', true);
						$('#s2id_ds_item a .select2c-chosen').html(dpmp.ds_nama_item);
						$('#ds_jam_1').val(dpmp.ds_jam_1).attr('disabled', true);
						$('#ds_jam_2').val(dpmp.ds_jam_2).attr('disabled', true);
						$('#ds_jam_3').val(dpmp.ds_jam_3).attr('disabled', true);
						$('#ds_jam_4').val(dpmp.ds_jam_4).attr('disabled', true);
						$('#ds_jam_5').val(dpmp.ds_jam_5).attr('disabled', true);
						$('#ds_jam_6').val(dpmp.ds_jam_6).attr('disabled', true);
						$('#ds_jam_7').val(dpmp.ds_jam_7).attr('disabled', true);
						$('#ds_jam_8').val(dpmp.ds_jam_8).attr('disabled', true);
						$('#ds_keterangan').val(dpmp.ds_keterangan).attr('disabled', true);
						$('#ds_gram').val(dpmp.ds_gram).attr('disabled', true);
						$('#ds_mp').val(dpmp.ds_mp).attr('disabled', true);
						$('#ds_ms').val(dpmp.ds_ms).attr('disabled', true);
						$('#ds_mm').val(dpmp.ds_mm).attr('disabled', true);
						$('#ds_sp').val(dpmp.ds_sp).attr('disabled', true);
						$('#ds_sm').val(dpmp.ds_sm).attr('disabled', true);
					}

                }
			},
			error: function(e) {
				accessFailed('Terjadi Kesalahan | Gagal mengambil data');
			}
		});
		
	}

	function hapusDPMP2(id, id_layanan_pendaftaran) {
		swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda yakin menghapus data DPMP ini ?',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-check-circle mr-1"></i>Ya, Hapus',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url("gizi/api/gizi/hapus_dpmp_2/") ?>' + id,
					cache: false,
					dataType: 'JSON',
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.message, 'Error');
						} else {
							messageCustom(data.message, 'Success');
							getListDPMP2(id_layanan_pendaftaran, 1);
						}
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menghapus data')
					}
				})
			}
		});
	}

    function editDPMP2(id) {
		resetAll();
		$('#wizard-dpmp-2').bwizard('show', '0');
        $.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/ambil_data_dpmp_2") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {				
				if(data !== null){
					let dpmp = data.dpmp;

					// dpmp
					$('#id_dpmp').val(dpmp.id);
					$('#dpmp_waktu').val(dpmp.dpmp_waktu !== null ? datetimefmysql(dpmp.dpmp_waktu) : '');
					$('#dpmp_profesi').val(dpmp.dpmp_profesi);
					$('#dpmp_nadis').val(dpmp.dpmp_nadis).select2c('readonly', false);
					$('#s2id_dpmp_nadis a .select2c-chosen').html(dpmp.nama_nadis);
					if (dpmp.ttd_nadis !== null) {
						$('#dpmp_ttd_nadis').hide();
						$('#dpmp_ttd_nadis_verified').show();
						$('#dpmp_ttd_nadis_old').val(dpmp.ttd_nadis);
					}
					$('#dpmp_status_ruang').val(dpmp.dpmp_status_ruang);
					$('#dpmp_mp').val(dpmp.dpmp_mp);
					$('#dpmp_sp').val(dpmp.dpmp_sp);
					$('#dpmp_ms').val(dpmp.dpmp_ms);
					$('#dpmp_ss').val(dpmp.dpmp_ss);
					$('#dpmp_mm').val(dpmp.dpmp_mm);
					$('#dpmp_sm').val(dpmp.dpmp_sm);
					$('#dpmp_ket').val(dpmp.dpmp_ket);
					$('#dpmp_pd').val(dpmp.dpmp_pd).hide();
					
					var dpmpTextMap = {
						'1': 'Diet Makan',
						'2': 'Diet Cair',
						'3': 'Diet Sharing'
					};
					var text_dpmp = dpmpTextMap[dpmp.dpmp_pd];
					if (text_dpmp) {
						$('#dpmp_pd_text').text(text_dpmp).prop('hidden', false);
					}

					// diet makan
					if (dpmp.dpmp_pd ==='1') {
						$('.form-diet-makan').prop('hidden', false);
						$('.form-diet-cair').prop('hidden', true);
						$('.form-diet-sharing').prop('hidden', true);
						$('#wizard-diet').bwizard('show', '0');

						$('#id_dm').val(dpmp.id_dm);						
						if (dpmp.dm_biasa !== null) {
							$('#dm_biasa').prop('checked', true);
						}
						if (dpmp.dm_p !== null) {
							$('#dm_p').prop('checked', true);
						}
						if (dpmp.dm_rs !== null) {
							$('#dm_rs').prop('checked', true);
						}
						if (dpmp.dm_cr !== null) {
							$('#dm_cr').prop('checked', true);
						}
						if (dpmp.dm_rg !== null) {
							$('#dm_rg').prop('checked', true);
						}
						if (dpmp.dm_sd !== null) {
							$('#dm_sd').prop('checked', true);
						}
						if (dpmp.dm_dm !== null) {
							$('#dm_dm').prop('checked', true);
						}
						if (dpmp.dm_rk !== null) {
							$('#dm_rk').prop('checked', true);
						}
						if (dpmp.dm_tk !== null) {
							$('#dm_tk').prop('checked', true);
						}
						if (dpmp.dm_dh !== null) {
							$('#dm_dh').prop('checked', true);
						}
						if (dpmp.dm_rl !== null) {
							$('#dm_rl').prop('checked', true);
						}
						if (dpmp.dm_tktp !== null) {
							$('#dm_tktp').prop('checked', true);
						}
						if (dpmp.dm_dj !== null) {
							$('#dm_dj').prop('checked', true);
						}
						if (dpmp.dm_rp !== null) {
							$('#dm_rp').prop('checked', true);
						}
						if (dpmp.dm_ts !== null) {
							$('#dm_ts').prop('checked', true);
						}
						if (dpmp.dm_dl !== null) {
							$('#dm_dl').prop('checked', true);
						}
						if (dpmp.dm_rpn !== null) {
							$('#dm_rpn').prop('checked', true);
						}

						$('#dm_jd_mp').val(dpmp.dm_jd_mp);
						$('#dm_jd_sp').val(dpmp.dm_jd_sp);
						$('#dm_jd_ms').val(dpmp.dm_jd_ms);
						$('#dm_jd_ss').val(dpmp.dm_jd_ss);
						$('#dm_jd_mm').val(dpmp.dm_jd_mm);
						$('#dm_jd_sm').val(dpmp.dm_jd_sm);
						
						$('#dm_bm_mp').val(dpmp.dm_bm_mp);
						$('#dm_bm_sp').val(dpmp.dm_bm_sp);
						$('#dm_bm_ms').val(dpmp.dm_bm_ms);
						$('#dm_bm_ss').val(dpmp.dm_bm_ss);
						$('#dm_bm_mm').val(dpmp.dm_bm_mm);
						$('#dm_bm_sm').val(dpmp.dm_bm_sm);

					}

					// diet cair
					if (dpmp.dpmp_pd === '2') {
						$('.form-diet-makan').prop('hidden', true);
						$('.form-diet-cair').prop('hidden', false);
						$('.form-diet-sharing').prop('hidden', true);
						$('#wizard-diet').bwizard('show', '1');

						$('#id_dc').val(dpmp.id_dc);
						$('#dc_diet').val(dpmp.dc_diet);
						$('#dc_item').val(dpmp.dc_item).select2c('readonly', false);
						$('#s2id_dc_item a .select2c-chosen').html(dpmp.dc_nama_item);
						$('#dc_jam_1').val(dpmp.dc_jam_1);
						$('#dc_jam_2').val(dpmp.dc_jam_2);
						$('#dc_jam_3').val(dpmp.dc_jam_3);
						$('#dc_jam_4').val(dpmp.dc_jam_4);
						$('#dc_jam_5').val(dpmp.dc_jam_5);
						$('#dc_jam_6').val(dpmp.dc_jam_6);
						$('#dc_jam_7').val(dpmp.dc_jam_7);
						$('#dc_jam_8').val(dpmp.dc_jam_8);
						$('#dc_keterangan').val(dpmp.dc_keterangan);
						$('#dc_gram').val(dpmp.dc_gram);
						$('#dc_mp').val(dpmp.dc_mp);
						$('#dc_ms').val(dpmp.dc_ms);
						$('#dc_mm').val(dpmp.dc_mm);
						$('#dc_sp').val(dpmp.dc_sp);
						$('#dc_sm').val(dpmp.dc_sm);
					}

					// diet sharing
					if (dpmp.dpmp_pd === '3') {
						
						$('.form-diet-makan').prop('hidden', true);
						$('.form-diet-cair').prop('hidden', true);
						$('.form-diet-sharing').prop('hidden', false);
						$('#wizard-diet').bwizard('show', '2');
						
						$('#id_ds').val(dpmp.id_ds);
						if (dpmp.ds_biasa !== null) {
							$('#ds_biasa').prop('checked', true);
						}
						if (dpmp.ds_p !== null) {
							$('#ds_p').prop('checked', true);
						}
						if (dpmp.ds_rs !== null) {
							$('#ds_rs').prop('checked', true);
						}
						if (dpmp.ds_cr !== null) {
							$('#ds_cr').prop('checked', true);
						}
						if (dpmp.ds_rg !== null) {
							$('#ds_rg').prop('checked', true);
						}
						if (dpmp.ds_sd !== null) {
							$('#ds_sd').prop('checked', true);
						}
						if (dpmp.ds_dm !== null) {
							$('#ds_dm').prop('checked', true);
						}
						if (dpmp.ds_rk !== null) {
							$('#ds_rk').prop('checked', true);
						}
						if (dpmp.ds_tk !== null) {
							$('#ds_tk').prop('checked', true);
						}
						if (dpmp.ds_dh !== null) {
							$('#ds_dh').prop('checked', true);
						}
						if (dpmp.ds_rl !== null) {
							$('#ds_rl').prop('checked', true);
						}
						if (dpmp.ds_tktp !== null) {
							$('#ds_tktp').prop('checked', true);
						}
						if (dpmp.ds_dj !== null) {
							$('#ds_dj').prop('checked', true);
						}
						if (dpmp.ds_rp !== null) {
							$('#ds_rp').prop('checked', true);
						}
						if (dpmp.ds_ts !== null) {
							$('#ds_ts').prop('checked', true);
						}
						if (dpmp.ds_dl !== null) {
							$('#ds_dl').prop('checked', true);
						}
						if (dpmp.ds_rpn !== null) {
							$('#ds_rpn').prop('checked', true);
						}

						$('#ds_jd_mp').val(dpmp.ds_jd_mp);
						$('#ds_jd_sp').val(dpmp.ds_jd_sp);
						$('#ds_jd_ms').val(dpmp.ds_jd_ms);
						$('#ds_jd_ss').val(dpmp.ds_jd_ss);
						$('#ds_jd_mm').val(dpmp.ds_jd_mm);
						$('#ds_jd_sm').val(dpmp.ds_jd_sm);
						
						$('#ds_bm_mp').val(dpmp.ds_bm_mp);
						$('#ds_bm_sp').val(dpmp.ds_bm_sp);
						$('#ds_bm_ms').val(dpmp.ds_bm_ms);
						$('#ds_bm_ss').val(dpmp.ds_bm_ss);
						$('#ds_bm_mm').val(dpmp.ds_bm_mm);
						$('#ds_bm_sm').val(dpmp.ds_bm_sm);

						$('#ds_diet').val(dpmp.ds_diet);
						$('#ds_item').val(dpmp.ds_item).select2c('readonly', false);
						$('#s2id_ds_item a .select2c-chosen').html(dpmp.ds_nama_item);
						$('#ds_jam_1').val(dpmp.ds_jam_1);
						$('#ds_jam_2').val(dpmp.ds_jam_2);
						$('#ds_jam_3').val(dpmp.ds_jam_3);
						$('#ds_jam_4').val(dpmp.ds_jam_4);
						$('#ds_jam_5').val(dpmp.ds_jam_5);
						$('#ds_jam_6').val(dpmp.ds_jam_6);
						$('#ds_jam_7').val(dpmp.ds_jam_7);
						$('#ds_jam_8').val(dpmp.ds_jam_8);
						$('#ds_keterangan').val(dpmp.ds_keterangan);
						$('#ds_gram').val(dpmp.ds_gram);
						$('#ds_mp').val(dpmp.ds_mp);
						$('#ds_ms').val(dpmp.ds_ms);
						$('#ds_mm').val(dpmp.ds_mm);
						$('#ds_sp').val(dpmp.ds_sp);
						$('#ds_sm').val(dpmp.ds_sm);
					}

                }
            },
            error: function(e) {
                accessFailed('Terjadi Kesalahan | Gagal mengambil data');
            }
        });

    }

	function cetakEtiket2() {

		if ($('#diet_cetak_2').val() === '') {
            $('#modal-cetak-etiket-2').animate({
                scrollTop: 0
            }, '100');
            syams_validation('#diet_cetak_2', 'Silakan Pilih Tipe Diet Terlebih Dahulu!');
            return false;
        }

        if (($('#diet_cetak_2').val() === 'Diet Makan' || $('#diet_cetak_2').val() === 'Diet Sharing') && $('#jam_cetak_2').val() === '')  {

        	$('#modal-cetak-etiket-2').animate({
                scrollTop: 0
            }, '100');
            syams_validation('#jam_cetak_2', 'Silakan Tentukan Waktu Makan Terlebih Dahulu!');
            return false;
        }
        
        bootbox.dialog({
            message: "Anda yakin akan mencetak Etiket",
            title: "Cetak Riwayat Kunjungan",
            buttons: {
                batal: {
                    label: '<i class="fas fa-fw fa-window-close"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-fw fa-check-circle"></i> Cetak',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'GET',
                            url: '<?= base_url("gizi/api/gizi/cetak_etiket_2") ?>',
                            data: $('#form-cetak-etiket-2').serialize(),
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {

								let tanggal_awal_2 = '';
								let tanggal_akhir_2 = '';
								let no_rm_2 = '';
								let nama_2 = '';
								let diet_cetak_2 = '';
								let jam_cetak_2 = '';
								let ruangan_diet_2 = '';

                            	tanggal_awal_2 = data.tanggal_awal_2;
                            	tanggal_akhir_2 = data.tanggal_akhir_2;
                            	no_rm_2 = data.no_rm_2;
                            	nama_2 = data.nama_2;
                            	diet_cetak_2 = data.diet_cetak_2;
                            	jam_cetak_2 = data.jam_cetak_2;
								ruangan_diet_2 = data.ruangan_diet_2;

                                window.open("<?php echo base_url('gizi/gizi/cetak_etiket_2') ?>?tanggal_awal_2=" + tanggal_awal_2 + "&tanggal_akhir_2=" + tanggal_akhir_2 + "&no_rm_2=" + no_rm_2 + "&nama_2=" + nama_2 + "&diet_cetak_2=" + diet_cetak_2 + "&jam_cetak_2=" + jam_cetak_2 + "&ruangan_diet_2=" + ruangan_diet_2, "Cetak Etiket",'width='+dWidth+', height='+dHeight+', left='+x+',top='+y);
                            },
                            error: function(e) {
                                messageEditFailed();
                            }
                        });
                    }
                }
            }
        });
    }


</script>

<!-- modal DPMP -->
<div class="modal fade" id="modal-dpmp-2">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:95%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-pengkajian-awal">FORM DPMP</h5>
					<h6 class="modal-title text-muted"><small>(Daftar Permintaan Makanan Pasien)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>			
            <input type="hidden" name="id_pasien" id="id-pasien">
			<div class="modal-body">
				<!-- header -->
				<div class="row">
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="20%" class="bold">Nama Pasien</td>
									<td>: <span id="dpmp_nama_pasien"></span></td>
								</tr>
								<tr>
									<td width="20%" class="bold">No. RM</td>
									<td>: <span id="dpmp_no_rm"></span></td>
								</tr>
								<tr>
									<td width="20%" class="bold">Tanggal Lahir</td>
									<td>: <span id="dpmp_tanggal_lahir"></span></td>
								</tr>
								<tr>
									<td width="20%" class="bold">Jenis Kelamin</td>
									<td>: <span id="dpmp_jenis_kelamin"></span></td>
								</tr>
								<tr>
									<td width="20%" class="bold">Ruang Rawat/Unit Kerja</td>
									<td>: <span id="dpmp_bed"></span></td>
								</tr>
							</table>
						</div>
					</div>
                    <div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="30%" class="bold">Dokter Penanggung Jawab</td>
									<td>: <span id="dpmp_dpjp"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Diagnosis Pasien</td>
									<td>: <span><button type="button" title="Klik untuk melihat diagnosis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatDiagnosisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Diagnosis Pasien</button></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">CPPT</td>
									<td>: <span><button type="button" title="Klik untuk melihat CPPT pasien" class="btn btn-secondary btn-xxs" onclick="riwayatCPPTPasien()"><i class="fas fa-eye m-r-5"></i>Lihat CPPT Pasien</button></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Hasil Lab</td>
									<td>: <span><button type="button" title="Klik untuk melihat CPPT pasien" class="btn btn-secondary btn-xxs" onclick="lihatHasilLAB()"><i class="fas fa-eye m-r-5"></i>Hasil Lab Pasien</button></span></td>
								</tr>
								<tr>
									<td><b>Riwayat Rekam Medis <i>(Baru)</i></b></td>
									<td>: 
										<button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button>
									</td>
								</tr>
							</table>
						</div>
					</div>
                </div>
                <!-- content -->
                <div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<!-- form dpmp -->
							<div id="wizard-dpmp-2">
								<!-- Tab bwizard -->
								<ol>
									<li>Entri DPMP</li>
									<li>Data DPMP</li>
								</ol>

								<!-- Data bwizard -->
								<div class="form-entri-dpmp">
									<?= form_open('', 'id=form-dpmp-2 class=form-horizontal') ?>
									<div class="row">
										<div class="col-lg-6">
											<input type="hidden" name="id_dpmp" id="id_dpmp">
											<input type="hidden" name="id_dm" id="id_dm">
											<input type="hidden" name="id_dc" id="id_dc">
											<input type="hidden" name="id_ds" id="id_ds">
											<input type="hidden" name="id_layanan_pendaftaran" id="dpmp_id_layanan_pendaftaran">
											<input type="hidden" name="id_pendaftaran" id="dpmp_id_pendaftaran">
											<input type="hidden" name="riwayat_bed" id="dpmp_riwayat_bed">
											<div class="box-well shadow">
												<table class="table table-sm table-striped">
													<tr>
														<td width="30%" class="bold">Tanggal dan Jam</td>
														<td><input type="text" name="dpmp_waktu" id="dpmp_waktu" class="custom-form clear-input d-inline-block col-lg-6" onclick="clearValidate(this)"></td>
													</tr>
													<tr>
														<td class="bold">Profesional Pemberi Asuhan</td>
														<td><?= form_dropdown('dpmp_profesi', $profesi, array(), 'id=dpmp_profesi class="custom-form col-lg-6" onchange="clearValidate(this)"') ?></td>
													</tr>
													<tr>
														<td class="bold">Pemberi Pelayanan</td>
														<td><input type="text" name="dpmp_nadis" class="select2c-input" id="dpmp_nadis" onchange="clearValidate(this)"></td>
													</tr>
													<tr>
														<td class="bold">Paraf</td>
														<td>
															<input type="checkbox" name="dpmp_ttd_nadis" id="dpmp_ttd_nadis" class="custom-form col-lg-6" style="width:20px" value="1" class="mr-1">
															<input type="hidden" name="dpmp_ttd_nadis_old" id="dpmp_ttd_nadis_old">
															<?= digitalSignature('dpmp_ttd_nadis_verified') ?>
														</td>
													</tr>
													<tr>
														<td class="bold">Status Ruang Pasien</td>
														<td><input type="text" name="dpmp_status_ruang" class="custom-form col-lg-6" id="dpmp_status_ruang" readonly ="readonly"></td>
													</tr>
													<tr>
														<td colspan="2" class="bold">Makan Pasien</td>
													</tr>
													<tr>
														<td class="bold">MP</td>
														<td><?= form_dropdown('dpmp_mp', $mkn_pasien, array(), 'id=dpmp_mp class="custom-form col-lg-6"') ?></td>
													</tr>
													<tr>
														<td  class="bold">SP</td>
														<td><?= form_dropdown('dpmp_sp', $mkn_pasien, array(), 'id=dpmp_sp class="custom-form col-lg-6"') ?></td>
													</tr>
													<tr>
														<td  class="bold">MS</td>
														<td><?= form_dropdown('dpmp_ms', $mkn_pasien, array(), 'id=dpmp_ms class="custom-form col-lg-6"') ?></td>
													</tr>
													<tr>
														<td class="bold">SS</td>
														<td><?= form_dropdown('dpmp_ss', $mkn_pasien, array(), 'id=dpmp_ss class="custom-form col-lg-6"') ?></td>
													</tr>
													<tr>
														<td class="bold">MM</td>
														<td><?= form_dropdown('dpmp_mm', $mkn_pasien, array(), 'id=dpmp_mm class="custom-form col-lg-6"') ?></td>
													</tr>
													<tr>
														<td class="bold">SM</td>
														<td><?= form_dropdown('dpmp_sm', $mkn_pasien, array(), 'id=dpmp_sm class="custom-form col-lg-6"') ?></td>
													</tr>
													<tr>
														<td class="bold">Keterangan</td>
														<td><input type="text" name="dpmp_ket" id="dpmp_ket" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Keterangan Makan Pasien..."></td>
													</tr>
													<tr>
														<td class="bold">Pilihan Diet</td>
														<td>
															<?= form_dropdown('dpmp_pd', $pilih_diet, array(), 'id=dpmp_pd class="custom-form col-lg-6" onchange="pilihDiet(this.value)"') ?>
															<span hidden id="dpmp_pd_text"></span>
														</td>
													</tr>
													<tr>
														<td colspan="2">
															<button type="button" class="btn btn-info mr-1" onclick="resetAll()"><span id="btn-bersih-form"><i class="fas fa-fw fa-undo-alt mr-1"></i>Bersihkan Form</span></button>
															<!-- <button type="button" class="btn btn-info" onclick="panggilForm()"><span id="btn-panggil-form"><i class="fas fa-fw fa-save mr-1"></i>Panggil Form</span></button> -->
														</td>
													</tr>
												</table>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="box-well shadow">
												<div class="widget-body">
													<div id="wizard-diet">
														<ol>
															<li>DIET MAKAN</li>
															<li>DIET CAIR</li>
															<li>DIET SHARING</li>
														</ol>
														<!-- diet makan -->
														<div class="form-diet-makan" hidden>
															<table class="table table-sm table-no-border table-striped">
																<tr>
																	<td class="bold" colspan="3">Tipe Diet</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="dm_biasa" id="dm_biasa" value="1" class="mr-1">Biasa</td>
																	<td class="bold"><input type="checkbox" name="dm_p" id="dm_p" value="1" class="mr-1">Puasa</td>
																	<td class="bold"><input type="checkbox" name="dm_rs" id="dm_rs" value="1" class="mr-1">Rendah Serat</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="dm_cr" id="dm_cr" value="1" class="mr-1">Cair</td>
																	<td class="bold"><input type="checkbox" name="dm_rg" id="dm_rg" value="1" class="mr-1">Rendah Garam</td>
																	<td class="bold"><input type="checkbox" name="dm_sd" id="dm_sd" value="1" class="mr-1">Sode</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="dm_dm" id="dm_dm" value="1" class="mr-1">Diabetes Melitus</td>
																	<td class="bold"><input type="checkbox" name="dm_rk" id="dm_rk" value="1" class="mr-1">Rendah Kalium</td>
																	<td class="bold"><input type="checkbox" name="dm_tk" id="dm_tk" value="1" class="mr-1">Tinggi Kalium</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="dm_dh" id="dm_dh" value="1" class="mr-1">Diet Hati</td>
																	<td class="bold"><input type="checkbox" name="dm_rl" id="dm_rl" value="1" class="mr-1">Rendah Lemak</td>
																	<td class="bold"><input type="checkbox" name="dm_tktp" id="dm_tktp" value="1" class="mr-1">Tinggi Kalori Tinggi Protein</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="dm_dj" id="dm_dj" value="1" class="mr-1">Diet Jantung</td>
																	<td class="bold"><input type="checkbox" name="dm_rp" id="dm_rp" value="1" class="mr-1">Rendah Protein</td>
																	<td class="bold"><input type="checkbox" name="dm_ts" id="dm_ts" value="1" class="mr-1">Tinggi Serat</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="dm_dl" id="dm_dl" value="1" class="mr-1">Diet Lambung</td>
																	<td class="bold"><input type="checkbox" name="dm_rpn" id="dm_rpn" value="1" class="mr-1">Rendah Purin</td>
																	<td></td>
																</tr>
															</table>
															<table class="table table-sm table-no-border table-striped">
																<tr>
																	<td class="bold" colspan="2">Jenis Diet</td>
																	<td class="bold" colspan="2">Bentuk Makan</td>
																</tr>
																<tr>
																	<td class="bold" width="5%">MP</td>
																	<td width="45%"><?= form_dropdown('dm_jd_mp', $jns_diet, array(), 'id=dm_jd_mp class="custom-form col-lg-7"') ?></td>
																	<td class="bold" width="5%">MP</td>
																	<td width="45%"><?= form_dropdown('dm_bm_mp', $btk_mkn, array(), 'id=dm_bm_mp class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">SP</td>
																	<td><?= form_dropdown('dm_jd_sp', $jns_diet, array(), 'id=dm_jd_sp class="custom-form col-lg-7"') ?></td>
																	<td class="bold">SP</td>
																	<td><?= form_dropdown('dm_bm_sp', $btk_mkn, array(), 'id=dm_bm_sp class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">MS</td>
																	<td><?= form_dropdown('dm_jd_ms', $jns_diet, array(), 'id=dm_jd_ms class="custom-form col-lg-7"') ?></td>
																	<td class="bold">MS</td>
																	<td><?= form_dropdown('dm_bm_ms', $btk_mkn, array(), 'id=dm_bm_ms class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">SS</td>
																	<td><?= form_dropdown('dm_jd_ss', $jns_diet, array(), 'id=dm_jd_ss class="custom-form col-lg-7"') ?></td>
																	<td class="bold">SS</td>
																	<td><?= form_dropdown('dm_bm_ss', $btk_mkn, array(), 'id=dm_bm_ss class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">MM</td>
																	<td><?= form_dropdown('dm_jd_mm', $jns_diet, array(), 'id=dm_jd_mm class="custom-form col-lg-7"') ?></td>
																	<td class="bold">MM</td>
																	<td><?= form_dropdown('dm_bm_mm', $btk_mkn, array(), 'id=dm_bm_mm class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">SM</td>
																	<td><?= form_dropdown('dm_jd_sm', $jns_diet, array(), 'id=dm_jd_sm class="custom-form col-lg-7"') ?></td>
																	<td class="bold">SM</td>
																	<td><?= form_dropdown('dm_bm_sm', $btk_mkn, array(), 'id=dm_bm_sm class="custom-form col-lg-7"') ?></td>
																</tr>
															</table>
														</div>
														<!-- diet cair -->
														<div class="form-diet-cair" hidden>
															<table class="table table-sm table-no-border table-striped">
																<tr>
																	<td class="bold" width="20%">Tipe Diet</td>
																	<td class="bold" width="1%">:</td>
																	<td colspan="5"><?= form_dropdown('dc_diet', $dpmp_diet, array(), 'id=dc_diet class="custom-form col-lg-6" onchange="clearValidate(this)"') ?></td>
																</tr>
																<tr>
																	<td class="bold">Item Diet</td>
																	<td class="bold">:</td>
																	<td colspan="5"><input type="text" name="dc_item" id="dc_item" class="select2c-input clear-input d-inline-block" onchange="clearValidate(this)"></td>
																</tr>
																<tr>
																	<td class="bold">Jam Pemberian</td>
																	<td class="bold">:</td>
																	<td width="10%"><input type="text" name="dc_jam_1" id="dc_jam_1" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td width="10%"><input type="text" name="dc_jam_2" id="dc_jam_2" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td width="10%"><input type="text" name="dc_jam_3" id="dc_jam_3" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td width="10%"><input type="text" name="dc_jam_4" id="dc_jam_4" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td></td>
																</tr>
																<tr>
																	<td class="bold"></td>
																	<td class="bold"></td>
																	<td><input type="text" name="dc_jam_5" id="dc_jam_5" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td><input type="text" name="dc_jam_6" id="dc_jam_6" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td><input type="text" name="dc_jam_7" id="dc_jam_7" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td><input type="text" name="dc_jam_8" id="dc_jam_8" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td></td>
																</tr>
																<tr>
																	<td class="bold">Keterangan</td>
																	<td class="bold">:</td>
																	<td colspan="4"><input type="text" name="dc_keterangan" id="dc_keterangan" class="custom-form clear-input d-inline-block col-lg-12" placeholder="Keterangan Diet..."></td>
																	<td><input type="number" name="dc_gram" id="dc_gram" class="custom-form clear-input d-inline-block col-lg-3 mr-1"> Gr</td>
																</tr>
																<tr>
																	<td class="bold">Jenis Diet</td>
																	<td class="bold">:</td>
																	<td colspan="5">
																		<table class="table table-sm table-no-border">
																			<tr>
																				<td class="bold">MP</td>
																				<td class="bold"><?= form_dropdown('dc_mp', $kode_diet, array(), 'id=dc_mp class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																				<td class="bold">MS</td>
																				<td class="bold"><?= form_dropdown('dc_ms', $kode_diet, array(), 'id=dc_ms class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																			</tr>
																			<tr>
																				<td class="bold">MM</td>
																				<td class="bold"><?= form_dropdown('dc_mm', $kode_diet, array(), 'id=dc_mm class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																				<td class="bold">SP</td>
																				<td class="bold"><?= form_dropdown('dc_sp', $kode_diet, array(), 'id=dc_sp class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																			</tr>
																			<tr>
																				<td class="bold">SS</td>
																				<td class="bold"><?= form_dropdown('dc_ss', $kode_diet, array(), 'id=dc_ss class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																				<td class="bold">SM</td>
																				<td class="bold"><?= form_dropdown('dc_sm', $kode_diet, array(), 'id=dc_sm class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</div>
														<!-- diet sharing -->
														<div class="form-diet-sharing" hidden>
															<table class="table table-sm table-no-border table-striped">
																<tr>
																	<td class="bold" colspan="3">Tipe Diet Makan</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="ds_biasa" id="ds_biasa" value="1" class="mr-1">Biasa</td>
																	<td class="bold"><input type="checkbox" name="ds_p" id="ds_p" value="1" class="mr-1">Puasa</td>
																	<td class="bold"><input type="checkbox" name="ds_rs" id="ds_rs" value="1" class="mr-1">Rendah Serat</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="ds_cr" id="ds_cr" value="1" class="mr-1">Cair</td>
																	<td class="bold"><input type="checkbox" name="ds_rg" id="ds_rg" value="1" class="mr-1">Rendah Garam</td>
																	<td class="bold"><input type="checkbox" name="ds_sd" id="ds_sd" value="1" class="mr-1">Sode</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="ds_dm" id="ds_dm" value="1" class="mr-1">Diabetes Melitus</td>
																	<td class="bold"><input type="checkbox" name="ds_rk" id="ds_rk" value="1" class="mr-1">Rendah Kalium</td>
																	<td class="bold"><input type="checkbox" name="ds_tk" id="ds_tk" value="1" class="mr-1">Tinggi Kalium</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="ds_dh" id="ds_dh" value="1" class="mr-1">Diet Hati</td>
																	<td class="bold"><input type="checkbox" name="ds_rl" id="ds_rl" value="1" class="mr-1">Rendah Lemak</td>
																	<td class="bold"><input type="checkbox" name="ds_tktp" id="ds_tktp" value="1" class="mr-1">Tinggi Kalori Tinggi Protein</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="ds_dj" id="ds_dj" value="1" class="mr-1">Diet Jantung</td>
																	<td class="bold"><input type="checkbox" name="ds_rp" id="ds_rp" value="1" class="mr-1">Rendah Protein</td>
																	<td class="bold"><input type="checkbox" name="ds_ts" id="ds_ts" value="1" class="mr-1">Tinggi Serat</td>
																</tr>
																<tr>
																	<td class="bold"><input type="checkbox" name="ds_dl" id="ds_dl" value="1" class="mr-1">Diet Lambung</td>
																	<td class="bold"><input type="checkbox" name="ds_rpn" id="ds_rpn" value="1" class="mr-1">Rendah Purin</td>
																	<td></td>
																</tr>
															</table>
															<table class="table table-sm table-no-border table-striped">
																<tr>
																	<td class="bold" colspan="2">Jenis Diet Makan</td>
																	<td class="bold" colspan="2">Bentuk Makan</td>
																</tr>
																<tr>
																	<td class="bold" width="5%">MP</td>
																	<td width="45%"><?= form_dropdown('ds_jd_mp', $jns_diet, array(), 'id=ds_jd_mp class="custom-form col-lg-7"') ?></td>
																	<td class="bold" width="5%">MP</td>
																	<td width="45%"><?= form_dropdown('ds_bm_mp', $btk_mkn, array(), 'id=ds_bm_mp class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">SP</td>
																	<td><?= form_dropdown('ds_jd_sp', $jns_diet, array(), 'id=ds_jd_sp class="custom-form col-lg-7"') ?></td>
																	<td class="bold">SP</td>
																	<td><?= form_dropdown('ds_bm_sp', $btk_mkn, array(), 'id=ds_bm_sp class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">MS</td>
																	<td><?= form_dropdown('ds_jd_ms', $jns_diet, array(), 'id=ds_jd_ms class="custom-form col-lg-7"') ?></td>
																	<td class="bold">MS</td>
																	<td><?= form_dropdown('ds_bm_ms', $btk_mkn, array(), 'id=ds_bm_ms class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">SS</td>
																	<td><?= form_dropdown('ds_jd_ss', $jns_diet, array(), 'id=ds_jd_ss class="custom-form col-lg-7"') ?></td>
																	<td class="bold">SS</td>
																	<td><?= form_dropdown('ds_bm_ss', $btk_mkn, array(), 'id=ds_bm_ss class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">MM</td>
																	<td><?= form_dropdown('ds_jd_mm', $jns_diet, array(), 'id=ds_jd_mm class="custom-form col-lg-7"') ?></td>
																	<td class="bold">MM</td>
																	<td><?= form_dropdown('ds_bm_mm', $btk_mkn, array(), 'id=ds_bm_mm class="custom-form col-lg-7"') ?></td>
																</tr>
																<tr>
																	<td class="bold">SM</td>
																	<td><?= form_dropdown('ds_jd_sm', $jns_diet, array(), 'id=ds_jd_sm class="custom-form col-lg-7"') ?></td>
																	<td class="bold">SM</td>
																	<td><?= form_dropdown('ds_bm_sm', $btk_mkn, array(), 'id=ds_bm_sm class="custom-form col-lg-7"') ?></td>
																</tr>
															</table>
															<table class="table table-sm table-no-border table-striped">
																<tr>
																	<td class="bold" width="20%">Tipe Diet Cair</td>
																	<td class="bold" width="1%">:</td>
																	<td colspan="5"><?= form_dropdown('ds_diet', $dpmp_diet, array(), 'id=ds_diet class="custom-form col-lg-6" onchange="clearValidate(this)"') ?></td>
																</tr>
																<tr>
																	<td class="bold">Item Diet</td>
																	<td class="bold">:</td>
																	<td colspan="5"><input type="text" name="ds_item" id="ds_item" class="select2c-input clear-input d-inline-block" onchange="clearValidate(this)"></td>
																</tr>
																<tr>
																	<td class="bold">Jam Pemberian</td>
																	<td class="bold">:</td>
																	<td width="10%"><input type="text" name="ds_jam_1" id="ds_jam_1" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td width="10%"><input type="text" name="ds_jam_2" id="ds_jam_2" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td width="10%"><input type="text" name="ds_jam_3" id="ds_jam_3" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td width="10%"><input type="text" name="ds_jam_4" id="ds_jam_4" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td></td>
																</tr>
																<tr>
																	<td class="bold"></td>
																	<td class="bold"></td>
																	<td><input type="text" name="ds_jam_5" id="ds_jam_5" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td><input type="text" name="ds_jam_6" id="ds_jam_6" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td><input type="text" name="ds_jam_7" id="ds_jam_7" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td><input type="text" name="ds_jam_8" id="ds_jam_8" class="custom-form clear-input d-inline-block col-lg-12"></td>
																	<td></td>
																</tr>
																<tr>
																	<td class="bold">Keterangan</td>
																	<td class="bold">:</td>
																	<td colspan="4"><input type="text" name="ds_keterangan" id="ds_keterangan" class="custom-form clear-input d-inline-block col-lg-12" placeholder="Keterangan Diet..."></td>
																	<td><input type="number" name="ds_gram" id="ds_gram" class="custom-form clear-input d-inline-block col-lg-3 mr-1"> Gr</td>
																</tr>
																<tr>
																	<td class="bold">Jenis Diet Cair</td>
																	<td class="bold">:</td>
																	<td colspan="5">
																		<table class="table table-sm table-no-border">
																			<tr>
																				<td class="bold">MP</td>
																				<td class="bold"><?= form_dropdown('ds_mp', $kode_diet, array(), 'id=ds_mp class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																				<td class="bold">MS</td>
																				<td class="bold"><?= form_dropdown('ds_ms', $kode_diet, array(), 'id=ds_ms class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																			</tr>
																			<tr>
																				<td class="bold">MM</td>
																				<td class="bold"><?= form_dropdown('ds_mm', $kode_diet, array(), 'id=ds_mm class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																				<td class="bold">SP</td>
																				<td class="bold"><?= form_dropdown('ds_sp', $kode_diet, array(), 'id=ds_sp class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																			</tr>
																			<tr>
																				<td class="bold">SS</td>
																				<td class="bold"><?= form_dropdown('ds_ss', $kode_diet, array(), 'id=ds_ss class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																				<td class="bold">SM</td>
																				<td class="bold"><?= form_dropdown('ds_sm', $kode_diet, array(), 'id=ds_sm class="custom-form col-lg-12" onchange="clearValidate(this)"') ?></td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</div>
													</div>
												</div>
											</div>	
										</div>
									</div>
									<?= form_close() ?>
								</div>
								<div class="form-data-dpmp">
									<div class="row">
										<div class="col-lg-12">
											<div class="row mb-2">
												<div class="col d-flex justify-content-start">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text" id="d-img-calendar"><i class="fas fa-fw fa-calendar-alt"></i></span>
														</div>
														<input type="text" name="waktu_search" id="dpmp_waktu_search" class="form-control col-lg-4" placeholder="Pencarian Tanggal">
													</div>
												</div>
												<div class="col d-flex justify-content-end">
													<div class="custom-search">
														<input type="text" class="search-query-white" onkeyup="getListDPMP2($('#dpmp_id_layanan_pendaftaran').val(), 1)" id="dpmp_keyword" placeholder="Pencarian ...">
														<button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
													</div>
												</div>
											</div>
											<table class="table table-sm table-striped table-bordered color-table info-table" id="table_dpmp_2">
												<thead>
													<tr>
														<th class="center v-center" width="1%">No.</th>
														<th class="center v-center" width="15%">Waktu</th>
														<th class="center v-center" width="15%">Professional Pemberi Asuhan</th>
														<th class="center v-center" width="10%">Jenis Diet</th>
														<th class="center v-center" width="20%">Diet</th>
														<th class="center v-center" width="3%">MP</th>
														<th class="center v-center" width="3%">SP</th>
														<th class="center v-center" width="3%">MS</th>
														<th class="center v-center" width="3%">SS</th>
														<th class="center v-center" width="3%">MM</th>
														<th class="center v-center" width="3%">SM</th>
														<th class="center v-center" width="3%">Cek</th>
														<th class="center v-center" width="3%">Print</th>
														<th class="center v-center" width="15%"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<div id="dpmp-pagination" class="float-left"></div>
											<div id="dpmp-summary" class="float-right text-sm"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
			</div>
			<div class="modal-footer" id="dpmp_footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanDPMP2()"><span id="btn-dpmp"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Cetak Etiket New -->
<div id="modal-cetak-etiket-2" class="modal fade" role="dialog" aria-labelledby="modal-cetak-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-cetak-label">Form Cetak Etiket</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-cetak-etiket-2 role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label class="col-3 col-form-label">Tanggal</label>
					<div class="col-4">
						<input type="text" name="tanggal_awal_2" id="tanggal_awal_2" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
					<div class="col-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-4">
						<input type="text" name="tanggal_akhir_2" id="tanggal_akhir_2" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no_rm_search" class="col-3 col-form-label">No. RM</label>
					<div class="col">
						<input type="text" name="no_rm_2" id="no_rm_2" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="nama_search" class="col-3 col-form-label">Nama</label>
					<div class="col">
						<input type="text" name="nama_2" id="nama_2" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="diet_cetak" class="col-3 col-form-label">Diet</label>
					<div class="col">
						<?= form_dropdown('diet_cetak_2', $diet, array(), 'id=diet_cetak_2 class="form-control" onchange="clearValidate(this)"') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="jam_pemberian" class="col-3 col-form-label">Jam Pemberian</label>
					<div class="col">
						<input type="text" name="jam_cetak_2" id="jam_cetak_2" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
                        <label for="ruangan_diet" class="col-3 col-form-label">Ruangan</label>
                        <div class="col">
                            <?= form_dropdown('ruangan_diet_2', $ruangan_diet, array(), 'id=ruangan_diet_2 class="form-control" onchange="clearValidate(this)"') ?>
                        </div>
                    </div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="cetakEtiket2()"><i class="fas fa-print"></i> Cetak</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Cetak Etiket New -->