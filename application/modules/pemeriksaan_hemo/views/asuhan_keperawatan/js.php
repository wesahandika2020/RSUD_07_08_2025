<link rel="stylesheet" href="<?= resource_url() ?>assets/datetimepicker/css/bootstrap-datetimepicker.css">
<script src="<?= resource_url() ?>assets/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="<?= resource_url() ?>assets/datetimepicker/js/moment.js"></script>

<script>
	$(function() {
		$('#waktu-asuhan').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false
		});

		// checkbox pengkajian keperawatan lain-lain
		$('#ku-lain-lain-input').hide();
		$('#ku-lain-lain').click(function() {
			if ($(this).is(":checked")) {
				$('#ku-lain-lain-input').show();
				$('#ku-lain-lain-input').css('display', 'inline-block');
			} else {
				$('#ku-lain-lain-input').val('');
				$('#ku-lain-lain-input').hide();
			}
		});

		// checkbox riwayat penyakit dahulu lain-lain
		$('#rpd-lain-lain-input').hide();
		$('#rpd-lain-lain').click(function() {
			if ($(this).is(":checked")) {
				$('#rpd-lain-lain-input').show();
				$('#rpd-lain-lain-input').css('display', 'inline-block');
			} else {
				$('#rpd-lain-lain-input').val('');
				$('#rpd-lain-lain-input').hide();
			}
		});

		// checkbox riwayat penyakit keluarga lain-lain
		$('#rpk-lain-lain-input').hide();
		$('#rpk-lain-lain').click(function() {
			if ($(this).is(":checked")) {
				$('#rpk-lain-lain-input').show();
				$('#rpk-lain-lain-input').css('display', 'inline-block');
			} else {
				$('#rpk-lain-lain-input').val('');
				$('#rpk-lain-lain-input').hide();
			}
		});

		// radio kebiasaan merokok lain-lain
		$('#kebiasaan-merokok-tidak').attr('checked', true);
		$('#kebiasaan-merokok-ya-lain-lain').hide();
		$('input[name="kebiasaan_merokok"]').change(function() {
			if ($(this).val() == '1') {
				$('#kebiasaan-merokok-ya-lain-lain').show();
				$('#kebiasaan-merokok-ya-lain-lain').css('display', 'inline-block');
			} else {
				$('#kebiasaan-merokok-ya-lain-lain').val('');
				$('#kebiasaan-merokok-ya-lain-lain').hide();
			}
		});

		// radio kebiasaan narkoba lain-lain
		$('#kebiasaan-narkoba-ya-lain-lain').hide();
		$('input[name="kebiasaan_narkoba"]').change(function() {
			if ($(this).val() == '1') {
				$('#kebiasaan-narkoba-ya-lain-lain').show();
				$('#kebiasaan-narkoba-ya-lain-lain').css('display', 'inline-block');
			} else {
				$('#kebiasaan-narkoba-ya-lain-lain').val('');
				$('#kebiasaan-narkoba-ya-lain-lain').hide();
			}
		});

		// radio kebiasaan alkohol lain-lain
		$('#kebiasaan-alkohol-ya-lain-lain').hide();
		$('input[name="kebiasaan_alkohol"]').change(function() {
			if ($(this).val() == '1') {
				$('#kebiasaan-alkohol-ya-lain-lain').show();
				$('#kebiasaan-alkohol-ya-lain-lain').css('display', 'inline-block');
			} else {
				$('#kebiasaan-alkohol-ya-lain-lain').val('');
				$('#kebiasaan-alkohol-ya-lain-lain').hide();
			}
		});

		// radio alergi lain-lain
		$('#alergi-ya-lain-lain').hide();
		$('input[name="alergi"]').change(function() {
			if ($(this).val() == 'Ya') {
				$('#alergi-ya-lain-lain').show();
				$('#alergi-ya-lain-lain').css('display', 'inline-block');
			} else {
				$('#alergi-ya-lain-lain').val('');
				$('#alergi-ya-lain-lain').hide();
			}
		});

		// checkbox status psikologis lain-lain
		$('#sp-lain-lain-input').hide();
		$('#sp-lain-lain').click(function() {
			if ($(this).is(":checked")) {
				$('#sp-lain-lain-input').show();
				$('#sp-lain-lain-input').css('display', 'inline-block');
			} else {
				$('#sp-lain-lain-input').val('');
				$('#sp-lain-lain-input').hide();
			}
		});

		// radio wajib ibadah halangan lain
		$('#halangan-lain-input').hide();
		$('input[name="wajib_ibadah"]').change(function() {
			if ($(this).val() == 'Halangan Lain') {
				$('#halangan-lain-input').show();
				$('#halangan-lain-input').css('display', 'inline-block');
			} else {
				$('#halangan-lain-input').val('');
				$('#halangan-lain-input').hide();
			}
		});

		// checkbox kesadaran lain
		$('#kesadaran-lain-input').hide();
		$('#kesadaran-lain').click(function() {
			if ($(this).is(":checked")) {
				$('#kesadaran-lain-input').show();
				$('#kesadaran-lain-input').css('display', 'inline-block');
			} else {
				$('#kesadaran-lain-input').val('');
				$('#kesadaran-lain-input').hide();
			}
		});

		// radio skrining nutrisi on
		$('.sn-penurunan-bb-area').hide();
		$('input[name="sn_penurunan_bb"]').change(function() {
			if ($(this).val() == '3') {
				$('.sn-penurunan-bb-area').show();
			} else {
				$('input[name="sn_penurunan_bb_on"]').prop('checked', false);
				$('.sn-penurunan-bb-area').hide();
			}

		});

		// radio status fungsional
		$('#sf-perlu-bantuan-input').attr('disabled', true);
		$('#sf-ketergantungan-input').attr('disabled', true);
		$('input[name="status_fungsional"]').change(function() {
			if ($(this).val() == '2') {
				$('#sf-perlu-bantuan-input').attr('disabled', false);
				$('#sf-ketergantungan-input').attr('disabled', true);
			} else if ($(this).val() == '3') {
				$('#sf-perlu-bantuan-input').attr('disabled', true);
				$('#sf-ketergantungan-input').attr('disabled', false);
				$('#sf-ketergantungan-input').val('<?= date("H:i:s") ?>');
			} else {
				$('#sf-perlu-bantuan-input').attr('disabled', true);
				$('#sf-ketergantungan-input').attr('disabled', true);
				$('#sf-perlu-bantuan-input').val('');
				$('#sf-ketergantungan-input').val('');
			}
		});

		// checkbox diagnosa keperawatan lain-lain
		$('#diag-keperawatan-lain-input').hide();
		$('#diag-keperawatan-9').click(function() {
			if ($(this).is(":checked")) {
				$('#diag-keperawatan-lain-input').show();
				$('#diag-keperawatan-lain-input').css('display', 'inline-block');
			} else {
				$('#diag-keperawatan-lain-input').val('');
				$('#diag-keperawatan-lain-input').hide();
			}
		});

		// checkbox intervensi keperawatan av shunt
		$('#intervensi-keperawatan-av-shunt').hide();
		$('#intervensi-keperawatan-12').click(function() {
			if ($(this).is(":checked")) {
				$('#intervensi-keperawatan-av-shunt').show();
				$('#intervensi-keperawatan-av-shunt').css('display', 'inline-block');
			} else {
				$('#intervensi-keperawatan-av-shunt').val('');
				$('#intervensi-keperawatan-av-shunt').hide();
			}
		});

		// checkbox intervensi keperawatan lain-lain
		$('#invtervensi-keperawatan-lain-input').hide();
		$('#intervensi-keperawatan-14').click(function() {
			if ($(this).is(":checked")) {
				$('#invtervensi-keperawatan-lain-input').show();
				$('#invtervensi-keperawatan-lain-input').css('display', 'inline-block');
			} else {
				$('#invtervensi-keperawatan-lain-input').val('');
				$('#invtervensi-keperawatan-lain-input').hide();
			}
		});

		// checkbox intervensi antibiotik
		$('#inv-antibiotik-input').hide();
		$('#inv-pemberian-antibiotik').click(function() {
			if ($(this).is(":checked")) {
				$('#inv-antibiotik-input').show();
				$('#inv-antibiotik-input').css('display', 'inline-block');
			} else {
				$('#inv-antibiotik-input').val('');
				$('#inv-antibiotik-input').hide();
			}
		});

		// checkbox im time
		$('#im-time-input').attr('disabled', true);
		$('#im-qb').attr('disabled', true);
		$('#im-qd').attr('disabled', true);
		$('#im-uf-goal').attr('disabled', true);
		$('#im-time').click(function() {
			if ($(this).is(":checked")) {
				$('#im-time-input').attr('disabled', false);
				$('#im-qb').attr('disabled', false);
				$('#im-qd').attr('disabled', false);
				$('#im-uf-goal').attr('disabled', false);
			} else {
				$('#im-time-input').attr('disabled', true);
				$('#im-qb').attr('disabled', true);
				$('#im-qd').attr('disabled', true);
				$('#im-uf-goal').attr('disabled', true);
			}
		})

		// checkbox im profile hd
		$('#im-profile-hd-input').hide();
		$('#im-profile-hd').click(function() {
			if ($(this).is(":checked")) {
				$('#im-profile-hd-input').show();
				$('#im-profile-hd-input').css('display', 'inline-block');
			} else {
				$('#im-profile-hd-input').val('');
				$('#im-profile-hd-input').hide();
			}
		})

		// radio skrining nutrisi on
		$('#im-dialiser-input').attr('disabled', true);
		$('#im-dialiser-tcv-input').attr('disabled', true);
		$('input[name="im_dialiser"]').change(function() {
			if ($(this).val() == 'Reuse') {
				$('#im-dialiser-input').attr('disabled', false);
				$('#im-dialiser-tcv-input').attr('disabled', true);
			} else if ($(this).val() == 'TCV') {
				$('#im-dialiser-input').attr('disabled', true);
				$('#im-dialiser-tcv-input').attr('disabled', false);
			} else {
				$('#im-dialiser-input').attr('disabled', true);
				$('#im-dialiser-input').val('');
				$('#im-dialiser-tcv-input').attr('disabled', true);
				$('#im-dialiser-tcv-input').val('');
			}

		});

		// checkbox penyakit selama hd
		$('#ps-lain-lain-input').hide();
		$('#ps-lain-lain').click(function() {
			if ($(this).is(":checked")) {
				$('#ps-lain-lain-input').show();
				$('#ps-lain-lain-input').css('display', 'inline-block');
			} else {
				$('#ps-lain-lain-input').val('');
				$('#ps-lain-lain-input').hide();
			}
		})

		// hitung dosis heparin
		$('#heparin-dosis-awal, #heparin-dosis-sirkulasi, #heparin-dosis-maintenance').keyup(function() {
			var dosis_awal = parseInt($('#heparin-dosis-awal').val());
			var dosis_sirkulasi = parseInt($('#heparin-dosis-sirkulasi').val());
			var dosis_maintenance = parseInt($('#heparin-dosis-maintenance').val());

			var a = parseInt(dosis_awal) || 0;
			var b = parseInt(dosis_sirkulasi) || 0;
			var c = parseInt(dosis_maintenance) || 0;

			var total = a + b + c;
			$('#heparin-total').val(parseInt(total));
		});

		$('#tab-1, #tab-2, #tab-3').click(function() {
			$('.box-well').animate({
				scrollTop: 0
			}, '300');
		})

		$('#no-mesin, #dx-medis').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});
	});

	function resetFormAsuhanKeperawatan() {
		$('.clear-input, #id-asuhan-keperawatan').val('');
		$('#form-asuhan-keperawatan')[0].reset();
		// $('input').filter(':radio').prop('checked',false);
		// $('input').filter(':checkbox').prop('checked',false);
		$('#ku-lain-lain-input, #rpd-lain-lain-input, #rpk-lain-lain-input, #kebiasaan-merokok-ya-lain-lain, #kebiasaan-narkoba-ya-lain-lain').hide();
		$('#kebiasaan-alkohol-ya-lain-lain, #alergi-ya-lain-lain, #sp-lain-lain-input, #halangan-lain-input, #kesadaran-lain-input, .sn-penurunan-bb-area').hide();
		$('#diag-keperawatan-lain-input, #intervensi-keperawatan-av-shunt, #intervensi-keperawatan-lain-input, #inv-antibiotik-input').hide();
	}

	function entriAsuhanKeperawatan(id_pendaftaran, id_layanan_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pemeriksaan_hemo/api/pemeriksaan_hemo/get_detail_asuhan_keperawatan") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetFormAsuhanKeperawatan();
				$('#id-pendaftaran').val(id_pendaftaran);
				$('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);
				$('#hemodialisa-ke').val(data.hemodialisa_ke);
				$('#tbody-intra-hd').empty();
				tambahIntraHD();
				// date_time('waktu-asuhan', 'val');
				// time('sf-ketergantungan-input', 'val');
				// time('im-time-input', 'val');
				if (data.pasien !== null) {
					$('#pasien-no-rm').text(data.pasien.id_pasien);
					$('#pasien-nama').text(data.pasien.nama);

					var umur = '';
					if (data.pasien.tanggal_lahir !== null) {
						umur = datefmysql(data.pasien.tanggal_lahir) + ' (' + hitungUmur(data.pasien.tanggal_lahir) + ')';
					}
					$('#pasien-tanggal-lahir').text(umur);
					$('#pasien-agama').text(data.pasien.agama);
					$('#pasien-telp').text(data.pasien.telp);
					$('#pasien-nik').text(data.pasien.no_identitas);



					var alergi = (data.pasien.alergi !== '' ? data.pasien.alergi : null);
					if (alergi !== null) {
						$('#alergi-ya').prop('checked', true);
						$('#alergi-ya-lain-lain').show();
						$('#alergi-ya-lain-lain').addClass('d-inline-block');
						$('#alergi-ya-lain-lain').val(alergi);
					} else {
						$('#alergi-ya').prop('checked', false);
						$('#alergi-ya-lain-lain').hide();
						$('#alergi-ya-lain-lain').css('dsiplay', 'none');
						$('#alergi-ya-lain-lain').val('');
					}
				}

				if (data.diagnosa.length > 0) {
					var diagnosa = data.diagnosa[0];
					$('#dx-medis').val(diagnosa.golongan_sebab_sakit);
				}

				if (data.anamnesa.length > 0) {
					var anamnesa = data.anamnesa[0];
					$('#penyakit-sekarang').val(anamnesa.riwayat_penyakit_sekarang);
					$('#pf-td-sistolik').val(anamnesa.tensi_sistolik);
					$('#pf-td-diastolik').val(anamnesa.tensi_diastolik);
					$('#pf-nadi').val(anamnesa.nadi);
					$('#pf-pernafasan').val(anamnesa.nps);
					$('#pf-suhu').val(anamnesa.suhu);
				}


				

				$('#table-asuhan-keperawatan tbody').empty();
				if (data.asuhan_keperawatan.data.length > 0) {
					$.each(data.asuhan_keperawatan.data, function(i, v) {
						var html = /* html */ `
							<tr>
								<td class="center">${(v.waktu !== null ? datetimefmysql(v.waktu) : '')}</td>
								<td class="center">${v.no_mesin}</td>
								<td class="left">${v.dx_medis}</td>
								<td class="center">${v.hemodialisa_ke}</td>
								<td class="right aksi">
									<button type="button" class="btn btn-secondary btn-xs" onclick="cetakAsuhanKeperawatan(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									<button type="button" class="btn btn-secondary btn-xs" onclick="editAsuhanKeperawatan(${v.id}, this)"><i class="fas fa-edit mr-1"></i>Edit</button>
									<button type="button" class="btn btn-danger btn-xs" onclick="hapusAsuhanKeperawatan(${v.id}, this)"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
								</td>
							</tr>
						`;

						$('#table-asuhan-keperawatan tbody').append(html);
					});
				}

				$('#modal-asuhan-keperawatan').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function tambahIntraHD() {
		var i = $('.number-intra-hd').length;

		html = /* html */ `
			<tr id="tbody-intra-hd" class="number-intra-hd">
				<input type="hidden" name="id_tindakan_keperawatan[]" id="id-tindakan-keperawatan${i}">
				<th class="center v-center" width="10%">${(i == 0 ? '<input type="hidden" name="intra_jenis_observasi" value="Intra HD">Intra HD' : '')}</th>
				<td class="center v-center" widht="7%"><input type="text" name="intra_observasi_jam[]" id="intra-observasi-jam${i}" class="custom-form col-lg clear-input center" value="<?= date('H:i:s') ?>" placeholder="hh:ii:ss"></td>
				<td class="center v-center" widht="5%"><input type="text" name="intra_observasi_qb[]" id="intra-observasi-qb${i}" class="custom-form col-lg clear-input center"></td>
				<td class="center v-center" widht="5%"><input type="text" name="intra_observasi_ufr[]" id="intra-observasi-ufr${i}" class="custom-form col-lg clear-input center"></td>
				<td class="center v-center" widht="8%"><input type="text" name="intra_observasi_td[]" id="intra-observasi-td${i}" class="custom-form col-lg clear-input center"></td>
				<td class="center v-center" widht="5%"><input type="text" name="intra_observasi_n[]" id="intra-observasi-n${i}" class="custom-form col-lg clear-input center"></td>
				<td class="center v-center" widht="5%"><input type="text" name="intra_observasi_rr[]" id="intra-observasi-rr${i}" class="custom-form col-lg clear-input center"></td>
				<td class="center v-center" widht="5%"><input type="text" name="intra_observasi_suhu[]" id="intra-observasi-suhu${i}" class="custom-form col-lg clear-input center"></td>
				<td class="center v-center" widht="8%"><input type="text" name="intra_intake_nacl[]" id="intra-intake-nacl${i}" class="custom-form col-lg clear-input center" onblur="sumIntakeNacl()"></td>
				<td class="center v-center" widht="8%"><input type="text" name="intra_intake_dextrose[]" id="intra-intake-dextrose${i}" class="custom-form col-lg clear-input center" onblur="sumIntakeDextrose()"></td>
				<td class="center v-center" widht="8%"><input type="text" name="intra_intake_makan_minum[]" id="intra-intake-makan-minum${i}" class="custom-form col-lg clear-input center" onblur="sumIntakeMakanMinum()"></td>
				<td class="center v-center" widht="8%"><input type="text" name="intra_intake_lain_lain[]" id="intra-intake-lain-lain${i}" class="custom-form col-lg clear-input center" onblur="sumIntakeLainLain()"></td>
				<td class="center v-center" widht="8%"><input type="text" name="intra_output_uf_tercapai[]" id="intra-output-uf-tercapai${i}" class="custom-form col-lg clear-input center" onblur="sumOutputUFTercapai()"></td>
				<td class="center v-center" widht="8%"><input type="text" name="intra_output_lain_lain[]" id="intra-output-lain-lain${i}" class="custom-form col-lg clear-input center" onblur="sumOutputLainLain()"></td>
				<td class="center v-center" widht="15%"><input type="text" name="intra_keterangan_lain[]" id="intra-keterangan-lain${i}" class="custom-form col-lg clear-input"></td>
				<td class="center v-center" widht="8%"><input type="checkbox" name="intra_paraf[]" id="intra-paraf${i}" class="v-center" value="1" requeired></td>
				<td class="center v-center nowrap" widht="5%">
					${(i == 0 ? '<button type="button" class="btn btn-info btn-xs" onclick="tambahIntraHD()"><i class="fas fa-plus-circle"></i></button>' : '')}
					${(i != 0 ? '<button type="button" class="btn btn-danger btn-xs"  onclick="hapusIntraHD(this)"><i class="fas fa-trash-alt"></i></button>' : '')}
				</td>
			</tr>
		`;

		$('#tbody-intra-hd').append(html);
	}

	function sumIntakeNacl() {
		var numb = $('.number-intra-hd').length;
		var total = 0;

		for (var i = 0; i < numb; i++) {
			if (parseInt($('#intra-intake-nacl' + i).val()))
				total += parseInt($('#intra-intake-nacl' + i).val());
		}
		$('#post-intake-nacl').val(total);
		sumIntake();
	}

	function sumIntakeDextrose() {
		var numb = $('.number-intra-hd').length;
		var total = 0;

		for (var i = 0; i < numb; i++) {
			if (parseInt($('#intra-intake-dextrose' + i).val()))
				total += parseInt($('#intra-intake-dextrose' + i).val());
		}
		$('#post-intake-dextrose').val(total);
		sumIntake();
	}

	function sumIntakeMakanMinum() {
		var numb = $('.number-intra-hd').length;
		var total = 0;

		for (var i = 0; i < numb; i++) {
			if (parseInt($('#intra-intake-makan-minum' + i).val()))
				total += parseInt($('#intra-intake-makan-minum' + i).val());
		}
		$('#post-intake-makan-minum').val(total);
		sumIntake();
	}

	function sumIntakeLainLain() {
		var numb = $('.number-intra-hd').length;
		var total = 0;

		for (var i = 0; i < numb; i++) {
			if (parseInt($('#intra-intake-lain-lain' + i).val()))
				total += parseInt($('#intra-intake-lain-lain' + i).val());
		}
		$('#post-intake-lain-lain').val(total);
		sumIntake();
	}

	function sumOutputUFTercapai() {
		var numb = $('.number-intra-hd').length;
		var total = 0;

		for (var i = 0; i < numb; i++) {
			if (parseInt($('#intra-output-uf-tercapai' + i).val()))
				total = parseInt($('#intra-output-uf-tercapai' + i).val());
		}
		$('#post-output-uf-tercapai').val(total);
		sumOutput();
	}

	function sumOutputLainLain() {
		var numb = $('.number-intra-hd').length;
		var total = 0;

		for (var i = 0; i < numb; i++) {
			if (parseInt($('#intra-output-lain-lain' + i).val()))
				total += parseInt($('#intra-output-lain-lain' + i).val());
		}
		$('#post-output-lain-lain').val(total);
		sumOutput();
	}

	function sumIntake() {
		var a = parseFloat($('#post-intake-nacl').val()) || 0;
		var b = parseFloat($('#post-intake-dextrose').val()) || 0;
		var c = parseFloat($('#post-intake-makan-minum').val()) || 0;
		var d = parseFloat($('#post-intake-lain-lain').val()) || 0;

		var total = a + b + c + d;
		$('#jumlah-intake').val(total);
		sumBalance();
	}

	function sumOutput() {
		var a = parseFloat($('#post-output-uf-tercapai').val()) || 0;
		var b = parseFloat($('#post-output-lain-lain').val()) || 0;

		var total = a + b;
		$('#jumlah-output').val(total);
		sumBalance();
	}

	function sumBalance() {
		var a = parseFloat($('#jumlah-intake').val()) || 0;
		var b = parseFloat($('#jumlah-output').val()) || 0;

		var total = a - b;
		$('#balance').val(total);
	}

	function hapusIntraHD(el) {
		var element = el.parentNode.parentNode;
		element.parentNode.removeChild(element);

		var i = 0;
		for (var n = 0; n < $('.number-intra-hd').length; n++) {
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(0)').children('input').attr('id', 'intra-observasi-jam' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(1)').children('input').attr('id', 'intra-observasi-qb' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(2)').children('input').attr('id', 'intra-observasi-ufr' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(3)').children('input').attr('id', 'intra-observasi-td' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(4)').children('input').attr('id', 'intra-observasi-n' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(5)').children('input').attr('id', 'intra-observasi-rr' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(6)').children('input').attr('id', 'intra-observasi-suhu' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(7)').children('input').attr('id', 'intra-intake-nacl' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(8)').children('input').attr('id', 'intra-intake-dextrose' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(9)').children('input').attr('id', 'intra-intake-makan-minum' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(10)').children('input').attr('id', 'intra-intake-lain-lain' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(11)').children('input').attr('id', 'intra-output-uf-tercapai' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(12)').children('input').attr('id', 'intra-output-lain-lain' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(13)').children('input').attr('id', 'intra-keterangan-lain' + n);
			$('.number-intra-hd:eq(' + i + ')').children('td:eq(14)').children('input').attr('id', 'intra-paraf' + n);
			i++
		}

		sumIntakeNacl();
		sumIntakeDextrose();
		sumIntakeMakanMinum();
		sumIntakeLainLain();
		sumOutputUFTercapai();
		sumOutputLainLain();
	}

	function calcscore() {
		var score = 0;
		$("input[name='sn_penurunan_bb']:checked").each(function() {
			if ($(this).val() == '1') {
				score += parseInt(0);
			} else if ($(this).val() == '2') {
				score += parseInt(2);
			} else if ($(this).val() == '3') {
				$("input[name='sn_penurunan_bb_on']:checked").each(function() {
					if ($(this).val() == '1') {
						score += parseInt(1);
					} else if ($(this).val() == '2') {
						score += parseInt(2);
					} else if ($(this).val() == '3') {
						score += parseInt(3);
					} else if ($(this).val() == '4') {
						score += parseInt(4);
					} else if ($(this).val() == '5') {
						score += parseInt(2);
					}
				});
			}
		});

		$("input[name='sn_asupan_makan']:checked").each(function() {
			if ($(this).val() == '0') {
				score += parseInt(0);
			} else if ($(this).val() == '1') {
				score += parseInt(1);
			}
		});
		$("input[name=sn_total]").val(score);
	}



	function konfirmasiSimpanAsuhanKeperawatan() {
		var stop = false;
		if ($('#no-mesin').val() === '') {
			syams_validation('#no-mesin', 'No. Mesin harus diisi!');
			stop = true;
		}

		if ($('#dx-medis').val() === '') {
			syams_validation('#dx-medis', 'Dx. Medis harus diisi!');
			stop = true;
		}

		$('#modal-asuhan-keperawatan').animate({
			scrollTop: 0
		}, '300');
		
		if (stop) {
			return false;
		}

		if ($('input[name="pre_paraf"]').is(":not(:checked)")) {
			swalAlert('warning', 'Informasi', 'Harap melakukan paraf Pre HD');
			return false;
		}

		if ($('input[name="intra_paraf[]"]').is(":not(:checked)")) {
			swalAlert('warning', 'Informasi', 'Harap melakukan paraf Intra HD');
			return false;
		}

		if ($('input[name="post_paraf"]').is(":not(:checked)")) {
			swalAlert('warning', 'Informasi', 'Harap melakukan paraf Post HD');
			return false;
		}

		Swal.fire({
			title: 'Konfirmasi?',
			text: "Apakah anda yakin ingin menyimpan asuhan keperawatan HD ?",
			icon: 'question',
			showCancelButton: true,
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			confirmButtonColor: '#3085d6',
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanAsuhanKeperawatan();
			}
		})
	}

	function simpanAsuhanKeperawatan() {
		let update = '';
		if ($('#id-asuhan-keperawatan').val() !== '') {
			update = '/id_asuhan_keperawatan/' + $('#id-asuhan-keperawatan').val();
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("pemeriksaan_hemo/api/pemeriksaan_hemo/update_asuhan_keperawatan") ?>' + update,
			data: $('#form-asuhan-keperawatan').serialize() + '&id_layanan_pendaftaran=' + $('#id-layanan-pendaftaran').val(),
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

				$('#modal-asuhan-keperawatan').modal('hide');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Terjadi kesalahan, Gagal menyimpan asuhan keperawatan', 'Error');
			},
		});
	}

	function hapusAsuhanKeperawatan(id, obj) {
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
					url: '<?= base_url("pemeriksaan_hemo/api/pemeriksaan_hemo/delete_asuhan_keperawatan") ?>/' + id,
					cache: false,
					dataType: 'JSON',
					success: function(data) {
						if (data.status === false) {
							messageCustom('Gagal menghapus asuhan keperawatan', 'Error');
						} else {
							messageCustom('Berhasil menghapus asuhan keperawatan', 'Success');
						}

						removeListAsuhanKeperawatan(obj);
						resetFormAsuhanKeperawatan();
					},
					error: function(e) {
						messageCustom('Terjadi kesalahan sistem dalam menghapus data', 'Error');
					}
				});	
			} 
		})
	}

	function removeListAsuhanKeperawatan(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
	}
	
	function editAsuhanKeperawatan(id, obj) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pemeriksaan_hemo/api/pemeriksaan_hemo/get_asuhan_keperawatan_by_id") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				resetFormAsuhanKeperawatan();
				$('.box-well, #modal-asuhan-keperawatan').animate({
					scrollTop: 0
				}),

				$('#id-asuhan-keperawatan').val(data.id);
				$('#waktu-asuhan').val((data.waktu !== null ? datetimefmysql(data.waktu) : ''));
				$('#no-mesin').val(data.no_mesin);
				$('#dx-medis').val(data.dx_medis);
				$('#hemodialisa-ke').val(data.hemodialisa_ke);

				$('#penyakit-sekarang').val(data.riwayat_penyakit_sekarang);

				// start keluahan utama
				var keluhan_utama = JSON.parse(data.keluhan_utama);
				if (keluhan_utama.sesak_nafas !== '') { $('#ku-sesak-nafas').prop('checked', true) }
				if (keluhan_utama.mual !== '') { $('#ku-mual').prop('checked', true) }
				if (keluhan_utama.muntah !== '') { $('#ku-muntah').prop('checked', true) }
				if (keluhan_utama.gatal !== '') { $('#ku-gatal').prop('checked', true) }
				if (keluhan_utama.lain_lain !== '') { 
					$('#ku-lain-lain').prop('checked', true);  
					$('#ku-lain-lain-input').attr('value', keluhan_utama.ket_lain_lain).css('display', 'inline-block').show(); 
				}
				// end keluahan utama
				
				// start riwayat penyakit dahulu
				var riwayat_penyakit_dahulu = JSON.parse(data.riwayat_penyakit_dahulu);
				if (riwayat_penyakit_dahulu.asma !== '') { $('#rpd-asma').prop('checked', true) }
				if (riwayat_penyakit_dahulu.hipertensi !== '') { $('#rpd-hipertensi').prop('checked', true) }
				if (riwayat_penyakit_dahulu.jantung !== '') { $('#rpd-jantung').prop('checked', true) }
				if (riwayat_penyakit_dahulu.diabetes !== '') { $('#rpd-diabetes').prop('checked', true) }
				if (riwayat_penyakit_dahulu.lain_lain !== '') { 
					$('#rpd-lain-lain').prop('checked', true);  
					$('#rpd-lain-lain-input').attr('value', riwayat_penyakit_dahulu.ket_lain_lain).css('display', 'inline-block').show(); 
				}
				// end riwayat penyakit dahulu

				// start riwayat penyakit keluarga
				var riwayat_penyakit_keluarga = JSON.parse(data.riwayat_penyakit_keluarga);
				if (riwayat_penyakit_keluarga.asma !== '') { $('#rpk-asma').prop('checked', true) }
				if (riwayat_penyakit_keluarga.hipertensi !== '') { $('#rpk-hipertensi').prop('checked', true) }
				if (riwayat_penyakit_keluarga.jantung !== '') { $('#rpk-jantung').prop('checked', true) }
				if (riwayat_penyakit_keluarga.diabetes !== '') { $('#rpk-diabetes').prop('checked', true) }
				if (riwayat_penyakit_keluarga.lain_lain !== '') { 
					$('#rpk-lain-lain').prop('checked', true);  
					$('#rpk-lain-lain-input').attr('value', riwayat_penyakit_keluarga.ket_lain_lain).css('display', 'inline-block').show(); 
				}
				// end riwayat penyakit keluarga
				
				// start kebiasaan
				var kebiasaan = JSON.parse(data.kebiasaan);
				if (kebiasaan.merokok.hasil !== '0') { 
					$('#kebiasaan-merokok-ya').prop('checked', true); 
					$('#kebiasaan-merokok-ya-lain-lain').attr('value', kebiasaan.merokok.ket_hasil).css('display', 'inline-block').show(); 
				}
				if (kebiasaan.narkoba.hasil !== '0') { 
					$('#kebiasaan-narkoba-ya').prop('checked', true); 
					$('#kebiasaan-narkoba-ya-lain-lain').attr('value', kebiasaan.narkoba.ket_hasil).css('display', 'inline-block').show(); 
				}
				if (kebiasaan.alkohol.hasil !== '0') { 
					$('#kebiasaan-alkohol-ya').prop('checked', true); 
					$('#kebiasaan-alkohol-ya-lain-lain').attr('value', kebiasaan.alkohol.ket_hasil).css('display', 'inline-block').show(); 
				}
				// end kebiasaan
				
				// start alergi
				var alergi = JSON.parse(data.alergi);
				if (alergi.hasil == 'Tidak') { 
					$('#alergi-tidak').prop('checked', true); 
					$('#alergi-ya-lain-lain').val('').removeClass('d-inline-block').hide(); 
				}
				if (alergi.hasil == 'Tidak Tahu') { 
					$('#alergi-tidak-tahu').prop('checked', true); 
					$('#alergi-ya-lain-lain').val('').removeClass('d-inline-block').hide();
				}
				if (alergi.hasil == 'Ya') { 
					$('#alergi-ya').prop('checked', true); 
					$('#alergi-ya-lain-lain').attr('value', alergi.ket_hasil).show(); 
				}
				// end alergi
				
				// start hubungan pasien dengan keluarga
				if (data.hubungan_pasien_dengan_keluarga == 'Tidak Baik') { 
					$('#hubungan-keluarga-tidak').prop('checked', true) 
				} else {
					$('#hubungan-keluarga-baik').prop('checked', true) 
				}  
				// end hubungan pasien dengan keluarga

				// start status psikologis
				var status_psikologis = JSON.parse(data.status_psikologis);
				if (status_psikologis.tenang !== '') { $('#sp-tenang').prop('checked', true) }
				if (status_psikologis.cemas !== '') { $('#sp-cemas').prop('checked', true) }
				if (status_psikologis.takut !== '') { $('#sp-takut').prop('checked', true) }
				if (status_psikologis.marah !== '') { $('#sp-marah').prop('checked', true) }
				if (status_psikologis.sedih !== '') { $('#sp-sedih').prop('checked', true) }
				if (status_psikologis.bunuh_diri !== '') { $('#sp-bunuh-diri').prop('checked', true) }
				if (status_psikologis.lain_lain !== '') { 
					$('#sp-lain-lain').prop('checked', true);  
					$('#sp-lain-lain-input').attr('value', status_psikologis.ket_lain_lain).css('display', 'inline-block').show(); 
				}
				// end status psikologis

				$('#kebiasaan-keagamaan').val(data.kebiasaan_keagamaan);

				// start wajib ibadah
				if (data.wajib_ibadah === 'Baligh') { 
					$('#baligh').prop('checked', true) 
				} else if (data.wajib_ibadah === 'Belum Baligh') {
					$('#belum-baligh').prop('checked', true) 
				}  else if (data.wajib_ibadah === 'Halangan Lain') {
					$('#halangan-lain').prop('checked', true) 
					$('#halangan-lain-input').attr('value',data.halangan_lain).css('display', 'inline-block').show(); 
				}
				// end wajib ibadah

				// start thaharoh
				if (data.thaharoh === 'Berwudhu') { 
					$('#berwudhu').prop('checked', true) 
				} else if (data.thaharoh === 'Tayamum') {
					$('#tayamum').prop('checked', true) 
				}  
				// end thaharoh

				// start shalat
				if (data.shalat === 'Berdiri') { 
					$('#berdiri').prop('checked', true) 
				} else if (data.shalat === 'Duduk') {
					$('#duduk').prop('checked', true)  
				} else if (data.shalat === 'Berbaring') {
					$('#berbaring').prop('checked', true) 
				}  
				// end shalat

				// start kesadaran
				var kesadaran = JSON.parse(data.kesadaran);
				if (kesadaran.composmentis !== '') { $('#composmentis').prop('checked', true) }
				if (kesadaran.apatis !== '') { $('#apatis').prop('checked', true) }
				if (kesadaran.delirium !== '') { $('#delirium').prop('checked', true) }
				if (kesadaran.samnolen !== '') { $('#samnolen').prop('checked', true) }
				if (kesadaran.sopor !== '') { $('#sopor').prop('checked', true) }
				if (kesadaran.coma !== '') { $('#coma').prop('checked', true) }
				if (kesadaran.lain_lain !== '') { 
					$('#kesadaran-lain').prop('checked', true);  
					$('#kesadaran-lain-input').attr('value', kesadaran.ket_lain_lain).css('display', 'inline-block').show(); 
				}
				// end kesadaran

				var str_tensi = data.tensi;
				if (str_tensi !== null) {
					var tensi = str_tensi.split('/');
					$('#pf-td-sistolik').val(tensi[0]);
					$('#pf-td-diastolik').val(tensi[1]);
				}

				$('#pf-nadi').val(data.nadi);
				$('#pf-pernafasan').val(data.nafas);
				$('#pf-suhu').val(data.suhu);

				// start konjungtiva
				if (data.konjungtiva == '1') { 
					$('#konjungtiva-ya').prop('checked', true) 
				} else {
					$('#konjungtiva-tidak').prop('checked', true) 
				}  
				// end konjungtiva

				// start ekstermitas
				var ekstermitas = JSON.parse(data.ekstermitas);
				if (ekstermitas.tidak_edema !== '') { $('#tidak-edema').prop('checked', true) }
				if (ekstermitas.dehidrasi !== '') { $('#dehidrasi').prop('checked', true) }
				if (ekstermitas.edema !== '') { $('#edema').prop('checked', true) }
				if (ekstermitas.edema_anasarka !== '') { $('#edema-anasarka').prop('checked', true) }
				if (ekstermitas.pucat_dingin !== '') { $('#pucat-dingin').prop('checked', true) }
				// end ekstermitas

				$('#bb-pre-hd').val(data.bb_pre_hd);
				$('#bb-bbk').val(data.bb_bbk);
				$('#bb-post-hd-lalu').val(data.bb_post_hd_lalu);
				$('#bb-post-hd').val(data.bb_post_hd);

				// start akses vaskuler
				var akses_vaskuler = JSON.parse(data.akses_vaskuler);
				if (akses_vaskuler.av_fistula !== '') { $('#av-fistula').prop('checked', true) }
				if (akses_vaskuler.hd_kateter !== '') { $('#hd-kateter').prop('checked', true) }
				if (akses_vaskuler.subciavia !== '') { $('#subciavia').prop('checked', true) }
				if (akses_vaskuler.jugular !== '') { $('#jugular').prop('checked', true) }
				if (akses_vaskuler.femoral !== '') { $('#femoral').prop('checked', true) }

				// lokasi
				if (akses_vaskuler.lokasi.kanan !== '') { $('#lokasi-kanan').prop('checked', true) }
				if (akses_vaskuler.lokasi.kiri !== '') { $('#lokasi-kiri').prop('checked', true) }
				// end akses vaskuler

				// start penilaian tingkat nyeri
				if (data.penilaian_tingkat_nyeri === 'Tidak Nyeri') { 
					$('#measurement-scale-tidak').prop('checked', true) 
				} else if (data.penilaian_tingkat_nyeri === 'Nyeri Kronis') {
					$('#measurement-scale-kronis').prop('checked', true)  
				} else if (data.penilaian_tingkat_nyeri === 'Nyeri Akut') {
					$('#measurement-scale-akut').prop('checked', true) 
				}  

				$('#skala-nyeri').val(data.skala_nyeri);
				$('#skala-nyeri-lokasi').val(data.lokasi_skala_nyeri);
				$('#skala-nyeri-lokasi').val(data.lokasi_skala_nyeri);

				if (data.keterangan_tingkat_nyeri == '1') { 
					$('#ket-tingkat-myeri-ringan').prop('checked', true) 
				} else if (data.keterangan_tingkat_nyeri == '2') {
					$('#ket-tingkat-myeri-sedang').prop('checked', true) 
				} else if (data.keterangan_tingkat_nyeri == '3') {
					$('#ket-tingkat-myeri-berat').prop('checked', true) 	
				}
				// end penilaian tingkat nyeri

				// start status fungsional
				if (data.status_fungsional == 1) { 
					$('#sf-mandiri').prop('checked', true);
				} else if (data.status_fungsional == 2) {
					$('#sf-perlu-bantuan').prop('checked', true) 
					$('#sf-perlu-bantuan-input').val(data.sf_ket_perlu_bantuan).prop('disabled', false);
					$('#sf-ketergantungan-input').val('').prop('disabled', true); 
				}  else if (data.status_fungsional == 3) {
					$('#sf-ketergantungan').prop('checked', true) 
					$('#sf-ketergantungan-input').val(data.sf_ket_ketergantungan).prop('disabled', false);
					$('#sf-perlu-bantuan-input').val('').prop('disabled', true);
				}
				// end status fungsional

				// status skrining nutrisi
				if (data.sn_penurunan_berat_badan == 1) {
					$('#sn-tidak').prop('checked', true);
					calcscore();
				} else if (data.sn_penurunan_berat_badan == 2) {
					$('#sn-tidak-yakin').prop('checked', true);
					calcscore();
				} else if (data.sn_penurunan_berat_badan == 3) {
					$('#sn-ya').prop('checked', true).change();
					if (data.sn_penurunan_berat_badan_on == 1) {
						$('#sn-pbb-1').prop('checked', true);
						calcscore();
					} else if (data.sn_penurunan_berat_badan_on == 2) {
						$('#sn-pbb-2').prop('checked', true);
						calcscore(); 
					} else if (data.sn_penurunan_berat_badan_on == 3) {
						$('#sn-pbb-3').prop('checked', true);
						calcscore();
					} else if (data.sn_penurunan_berat_badan_on == 4) {
						$('#sn-pbb-4').prop('checked', true);
						calcscore();
					} else if (data.sn_penurunan_berat_badan_on == 5) {
						$('#sn-pbb-5').prop('checked', true);
						calcscore();
					}
				}

				if (data.sn_asupan_makan == 0) {
					$('#sn-asupan-makan-tidak').prop('checked', true);
					calcscore();
				} else if (data.sn_asupan_makan == 1) {
					$('#sn-asupan-makan-ya').prop('checked', true);
					calcscore();
				}
				// end skrining nutrisi

				// start skrining resiko cedera
				if (data.src_a == 1) {
					$('#src-a-ya').prop('checked', true);
				}
				if (data.src_b == 1) {
					$('#src-b-ya').prop('checked', true);
				}

				if (data.src_hasil == 1) {
					$('#src-hasil-1').prop('checked', true);
				} else if (data.src_hasil == 2) {
					$('#src-hasil-2').prop('checked', true);
				} else if (data.src_hasil == 3) {
					$('#src-hasil-3').prop('checked', true);
				}
				// end skrining resiko cedera

				$('#pemeriksaan-penunjang-input').val(data.pemeriksaan_penunjang);

				// start diagnosa keperawatan
				var diag = JSON.parse(data.diagnosa_keperawatan);
				if (diag.diag_keperawatan_1 !== '') { $('#diag-keperawatan-1').prop('checked', true) }
				if (diag.diag_keperawatan_2 !== '') { $('#diag-keperawatan-2').prop('checked', true) }
				if (diag.diag_keperawatan_3 !== '') { $('#diag-keperawatan-3').prop('checked', true) }
				if (diag.diag_keperawatan_4 !== '') { $('#diag-keperawatan-4').prop('checked', true) }
				if (diag.diag_keperawatan_5 !== '') { $('#diag-keperawatan-5').prop('checked', true) }
				if (diag.diag_keperawatan_6 !== '') { $('#diag-keperawatan-6').prop('checked', true) }
				if (diag.diag_keperawatan_7 !== '') { $('#diag-keperawatan-7').prop('checked', true) }
				if (diag.diag_keperawatan_8 !== '') { $('#diag-keperawatan-8').prop('checked', true) }
				if (diag.diag_keperawatan_9 !== '') {
					$('#diag-keperawatan-9').prop('checked', true);  
					$('#diag-keperawatan-lain-input').attr('value', diag.diag_keperawatan_lain).css('display', 'inline-block').show(); 
				}
				// end diagnosa keperawatan

				// start intervensi keperawatan
				var inv = JSON.parse(data.intervensi_keperawatan);
				if (inv.intervensi_keperawatan_1 !== '') { $('#intervensi-keperawatan-1').prop('checked', true) }
				if (inv.intervensi_keperawatan_2 !== '') { $('#intervensi-keperawatan-2').prop('checked', true) }
				if (inv.intervensi_keperawatan_3 !== '') { $('#intervensi-keperawatan-3').prop('checked', true) }
				if (inv.intervensi_keperawatan_4 !== '') { $('#intervensi-keperawatan-4').prop('checked', true) }
				if (inv.intervensi_keperawatan_5 !== '') { $('#intervensi-keperawatan-5').prop('checked', true) }
				if (inv.intervensi_keperawatan_6 !== '') { $('#intervensi-keperawatan-6').prop('checked', true) }
				if (inv.intervensi_keperawatan_7 !== '') { $('#intervensi-keperawatan-7').prop('checked', true) }
				if (inv.intervensi_keperawatan_8 !== '') { $('#intervensi-keperawatan-8').prop('checked', true) }
				if (inv.intervensi_keperawatan_9 !== '') { $('#intervensi-keperawatan-9').prop('checked', true) }
				if (inv.intervensi_keperawatan_10 !== '') { $('#intervensi-keperawatan-10').prop('checked', true) }
				if (inv.intervensi_keperawatan_11 !== '') { $('#intervensi-keperawatan-11').prop('checked', true) }
				if (inv.intervensi_keperawatan_12 !== '') { 
					$('#intervensi-keperawatan-12').prop('checked', true) 
					$('#intervensi-keperawatan-av-shunt').attr('value', inv.intervensi_keperawatan_av_shunt).css('display', 'inline-block').show(); 
				}
				if (inv.intervensi_keperawatan_13 !== '') { $('#intervensi-keperawatan-13').prop('checked', true) }
				if (inv.intervensi_keperawatan_14 !== '') { 
					$('#intervensi-keperawatan-14').prop('checked', true)
					$('#invtervensi-keperawatan-lain-input').attr('value', inv.intervensi_keperawatan_lain).css('display', 'inline-block').show(); 
				}
				// end intervensi keperawatan

				// start intervensi kolaborasi
				var inv_kolab = JSON.parse(data.intervensi_kolaborasi);
				if (inv_kolab.program_hd !== '') { $('#inv-program-hd').prop('checked', true) }
				if (inv_kolab.transfusi_darah !== '') { $('#inv-transfusi-darah').prop('checked', true) }
				if (inv_kolab.kolaborasi_diit !== '') { $('#inv-kolaborasi-diit').prop('checked', true) }
				if (inv_kolab.pemberian_ga_glueonas !== '') { $('#inv-pemberian-ca-glueonas').prop('checked', true) }
				if (inv_kolab.pemberian_antipiretik !== '') { $('#inv-pemberian-antipiretik').prop('checked', true) }
				if (inv_kolab.pemberian_analgetik !== '') { $('#inv-pemberian-analgetik').prop('checked', true) }
				if (inv_kolab.pemberian_erytropoetin !== '') { $('#inv-pemberian-erytropoetin').prop('checked', true) }
				if (inv_kolab.pemberian_preparat_besi !== '') { $('#inv-preparat-besi').prop('checked', true) }
				if (inv_kolab.obat_obat_emergensi !== '') { $('#inv-obat-obat-emergensi').prop('checked', true) }
				if (inv_kolab.pemberian_antibiotik !== '') { 
					$('#inv-pemberian-antibiotik').prop('checked', true)
					$('#inv-antibiotik-input').attr('value', inv_kolab.antibiotik).css('display', 'inline-block').show(); 
				}
				// end intervensi kolaborasi

				// start intruksi medik
				var im = JSON.parse(data.intruksi_medik);
				if (im.inisiasi !== '') { $('#im-inisiasi').prop('checked', true) }
				if (im.akut !== '') { $('#im-akut').prop('checked', true) }
				if (im.rutin !== '') { $('#im-rutin').prop('checked', true) }
				if (im.pre_op !== '') { $('#im-pre-op').prop('checked', true) }
				if (im.sled !== '') { $('#im-sled').prop('checked', true) }

				if (data.im_time !== null) {
					$('#im-time').prop('checked', true);
					$('#im-time-input').val(data.im_time).attr('disabled', false);
					$('#im-qb').val(data.im_qb).attr('disabled', false);
					$('#im-qd').val(data.im_qd).attr('disabled', false);
					$('#im-uf-goal').val(data.im_uf_goal).attr('disabled', false);
				} else {
					$('#im-time-input').val('').attr('disabled', true);
					$('#im-qb').val('').attr('disabled', true);
					$('#im-qd').val('').attr('disabled', true);
					$('#im-uf-goal').val('').attr('disabled', true);
				}

				if (data.im_profile_hd !== null) {
					$('#im-profile-hd').prop('checked', true);
					$('#im-profile-hd-input').val(data.im_profile_hd).css('display', 'inline-block').show();
				} else {
					$('#im-profile-hd').prop('checked', false);
					$('#im-profile-hd-input').val('').hide();
				}

				var dialisat = JSON.parse(data.im_dialisat);
				if (dialisat.bicarbonat !== '') { $('#dialisat-bicarbonat').prop('checked', true) }
				if (dialisat.condusctivity !== '') { $('#dialisat-condusctivity').prop('checked', true) }
				if (dialisat.temperatur !== '') { $('#dialisat-temperatur').prop('checked', true) }

				if (data.heparin == 1) {
					$('#heparin-free').prop('checked', true);					
				} else if (data.heparin == 2) {
					$('#heparin-reguler').prop('checked', true);					
				} else if (data.heparin == 3) {
					$('#heparin-minimal').prop('checked', true);					
				}
				// end intruksi medik

				$('#heparin-dosis-awal').val(data.heparin_dosis_awal);
				$('#heparin-dosis-sirkulasi').val(data.heparin_dosis_sirkulasi);
				$('#heparin-dosis-maintenance').val(data.heparin_dosis_maintenance);
				$('#heparin-total').val(data.heparin_dosis_total);

				// start im dialiser
				var dialiser = JSON.parse(data.im_dialiser);
				if (dialiser.dialiser == 'Baru') { 
					$('#im-dialiser-baru').prop('checked', true).change(); 
				} else if (dialiser.dialiser == 'Reuse') {
					$('#im-dialiser-reuse').prop('checked', true).change(); 
					$('#im-dialiser-input').val(dialiser.ket_dialiser_reuse);
				} else if (dialiser.dialiser == 'TCV') {
					$('#im-dialiser-tcv').prop('checked', true).change(); 
					$('#im-dialiser-tcv-input').val(dialiser.ket_dialiser_tcv);
				}

				if (data.im_dialiser_tipe == 'Low Flux') {
					$('#im-dialiser-tipe-low-flux').prop('checked', true);					
				} else if (data.im_dialiser_tipe == 'High Flux') {
					$('#im-dialiser-tipe-high-flux').prop('checked', true);					
				}
				// end im dialiser

				// start tindakan keperawatan
				showTindakanKeperawatan(data.pre_hd, data.intra_hd, data.post_hd);
				//end tindakan keperawatan

				// start penyakit selama hd
				var ps = JSON.parse(data.penyakit_selama_hd);
				if (ps.masalah_akses !== '') { $('#ps-masalah-akses').prop('checked', true) }
				if (ps.pendarahan !== '') { $('#ps-pendarahan').prop('checked', true) }
				if (ps.first_use_syndrom !== '') { $('#ps-use-syndrom').prop('checked', true) }
				if (ps.sakit_kepala !== '') { $('#ps-sakit-kepala').prop('checked', true) }
				if (ps.mual_muntah !== '') { $('#ps-mual-muntah').prop('checked', true) }
				if (ps.kram_otot !== '') { $('#ps-kram-otot').prop('checked', true) }
				if (ps.hiperkalemia !== '') { $('#ps-hiperkalemia').prop('checked', true) }
				if (ps.hipotensi !== '') { $('#ps-hipotensi').prop('checked', true) }
				if (ps.hipertensi !== '') { $('#ps-hipertensi').prop('checked', true) }
				if (ps.nyeri_dada !== '') { $('#ps-nyeri-dada').prop('checked', true) }
				if (ps.aritmia !== '') { $('#ps-aritmia').prop('checked', true) }
				if (ps.gatal_gatal !== '') { $('#ps-gatal-gatal').prop('checked', true) }
				if (ps.demam !== '') { $('#ps-demam').prop('checked', true) }
				if (ps.menggigil !== '') { $('#ps-menggigil').prop('checked', true) }
				if (ps.lain_lain !== '') { 
					$('#ps-lain-lain').prop('checked', true)
					$('#ps-lain-lain-input').attr('value', ps.ket_ain_lain).css('display', 'inline-block').show(); 
				}
				// end penyakit selama hd

				var evaluasi_keperawatan = JSON.parse(data.evaluasi_keperawatan);
				$('#ek-subject').val(evaluasi_keperawatan.subject);
				$('#ek-objective').val(evaluasi_keperawatan.objective);
				$('#ek-assessment').val(evaluasi_keperawatan.assessment);
				$('#ek-plan').val(evaluasi_keperawatan.plan);

				$('#dischart-planning').val(data.dischart_planning);

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function showTindakanKeperawatan(pre_hd, intra_hd, post_hd) {
		if (pre_hd !== null) {
			// pre hd
			$('input[name="pre_jenis_observasi"]').val('Pre HD');
			$('#pre-observasi-jam').val(pre_hd.observasi_jam);
			$('#pre-observasi-qb').val(pre_hd.observasi_qb);
			$('#pre-observasi-qd').val(pre_hd.observasi_qd);
			$('#pre-observasi-ufr').val(pre_hd.observasi_ufr);
			$('#pre-observasi-td').val(pre_hd.observasi_td);
			$('#pre-observasi-n').val(pre_hd.observasi_n);
			$('#pre-observasi-rr').val(pre_hd.observasi_rr);
			$('#pre-observasi-suhu').val(pre_hd.observasi_suhu);
			$('#pre-intake-nacl').val(pre_hd.intake_nacl);
			$('#pre-intake-dextrose').val(pre_hd.intake_dextrose);
			$('#pre-intake-makan-minum').val(pre_hd.intake_makan_minum);
			$('#pre-intake-lain-lain').val(pre_hd.intake_lain_lain);
			$('#pre-output-uf-tercapai').val(pre_hd.output_uf_tercapai);
			$('#pre-output-lain-lain').val(pre_hd.output_lain_lain);
			$('#pre-output-lain-lain').val(pre_hd.output_lain_lain);
	
			var ket_pre_hd = JSON.parse(pre_hd.keterangan_lain);
			$('#pre-keterangan-lain-subject').val(ket_pre_hd.subject);
			$('#pre-keterangan-lain-objective').val(ket_pre_hd.objective);
			$('#pre-keterangan-lain-assessment').val(ket_pre_hd.assessment);
			$('#pre-keterangan-lain-plan').val(ket_pre_hd.plan);
	
			if (pre_hd.paraf !== null) { $('#pre-paraf').prop('checked', true) }
			// end pre hd
		}

		if (intra_hd !== null) {
			$('#tbody-intra-hd').empty();
			$.each(intra_hd, function(i, v) {
				tambahIntraHD();
				
				// intra hd
				$('#id-tindakan-keperawatan' + i).val(v.id);
				$('input[name="intra_jenis_observasi"]').val('Intra HD');
				$('#intra-observasi-jam' + i).val(v.observasi_jam);
				$('#intra-observasi-jam' + i).val(v.observasi_jam);
				$('#intra-observasi-qb' + i).val(v.observasi_qb);
				$('#intra-observasi-qd' + i).val(v.observasi_qd);
				$('#intra-observasi-ufr' + i).val(v.observasi_ufr);
				$('#intra-observasi-td' + i).val(v.observasi_td);
				$('#intra-observasi-n' + i).val(v.observasi_n);
				$('#intra-observasi-rr' + i).val(v.observasi_rr);
				$('#intra-observasi-suhu' + i).val(v.observasi_suhu);
				$('#intra-intake-nacl' + i).val(v.intake_nacl);
				$('#intra-intake-dextrose' + i).val(v.intake_dextrose);
				$('#intra-intake-makan-minum' + i).val(v.intake_makan_minum);
				$('#intra-intake-lain-lain' + i).val(v.intake_lain_lain);
				$('#intra-output-uf-tercapai' + i).val(v.output_uf_tercapai);
				$('#intra-output-lain-lain' + i).val(v.output_lain_lain);
				$('#intra-output-lain-lain' + i).val(v.output_lain_lain);
				$('#intra-keterangan-lain' + i).val(v.keterangan_lain);
	
				if (v.paraf !== null) { $('#intra-paraf' + i).prop('checked', true) }
				// end intra hd
			});
		}
		

		if (post_hd !== null) {
			// post hd
			$('input[name="post_jenis_observasi"]').val('Post HD');
			$('#post-observasi-jam').val(post_hd.observasi_jam);
			$('#post-observasi-qb').val(post_hd.observasi_qb);
			$('#post-observasi-qd').val(post_hd.observasi_qd);
			$('#post-observasi-ufr').val(post_hd.observasi_ufr);
			$('#post-observasi-td').val(post_hd.observasi_td);
			$('#post-observasi-n').val(post_hd.observasi_n);
			$('#post-observasi-rr').val(post_hd.observasi_rr);
			$('#post-observasi-suhu').val(post_hd.observasi_suhu);
			$('#post-intake-nacl').val(post_hd.intake_nacl);
			$('#post-intake-dextrose').val(post_hd.intake_dextrose);
			$('#post-intake-makan-minum').val(post_hd.intake_makan_minum);
			$('#post-intake-lain-lain').val(post_hd.intake_lain_lain);
			$('#post-output-uf-tercapai').val(post_hd.output_uf_tercapai);
			$('#post-output-lain-lain').val(post_hd.output_lain_lain);
			$('#post-output-lain-lain').val(post_hd.output_lain_lain);
			$('#post-keterangan-lain').val(post_hd.keterangan_lain);
	
			if (post_hd.paraf !== null) { $('#post-paraf').prop('checked', true) }
			// post
	
			sumIntakeNacl();
			sumIntakeDextrose();
			sumIntakeMakanMinum();
			sumIntakeLainLain();
			sumOutputUFTercapai();
			sumOutputLainLain();
		}
	}

	function cetakAsuhanKeperawatan(id_asuhan_keperawatan, id_pendaftaran, id_layanan_pendaftaran) {
		window.open('<?= base_url() ?>pemeriksaan_hemo/printing_asuhan_keperawatan?id_asuhan_keperawatan=' + id_asuhan_keperawatan + '&id_pendaftaran=' + id_pendaftaran + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran, 'Cetak Asuhan Keperawatan Pasien Hemodialisa', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}
</script>