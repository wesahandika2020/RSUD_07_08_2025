<!-- catatan perkembangan pasien terintegrasi -->
<script>
	function historyCPPT(id, id_layanan_pendaftaran) {
		$('#table-history-edit-cppt tbody').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_history_edit_cppt") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$.each(data, function(i, v) {


					let no = ((i + 1) + ((data.page - 1) * data.limit));
					var hasil = '';

					if (v.subject !== '' || v.objective !== '' || v.assessment !== '' || v.plan !== '') {
						hasil += '<h5><b>SOAP</b></h5>';
					}
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

					if (v.ademi_assesment !== '' || v.ademi_diag !== '' || v.ademi_interv !== '' || v.ademi_monev !== '') {
						hasil += '<h5><b>ADIME</b></h5>';
					}
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

					if (v.sbar_situation !== '' || v.sbar_background !== '' || v.sbar_assesment !== '' || v.sbar_recommend !== '') {
						hasil += '<h5><b>SBAR</b></h5>';
					}
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

					var btnVerifikasiTBAK = '';
					if (v.konsul_via_telp == 1 && v.waktu_penerima_tbak == null) {
						btnVerifikasiTBAK = '<button ' + disablEdit + ' type="button" class="btn btn-warning btn-xs" onclick="verifTBAK(' + v.id + ', ' + v.id_nadis + ', \'' + v.nadis + '\', \'' + v.waktu + '\')"><i class="fas fa-fw fas fa-lock-open mr-1"></i>Verif TBAK</button>';

					} else if (v.konsul_via_telp == 1 && v.waktu_penerima_tbak != null) {
						btnVerifikasiTBAK = '<button ' + disablEdit + ' type="button" class="btn btn-success btn-xs" onclick="verifiedTBAK(' + v.id + ')"><i class="fas fa-fw fas fa-lock mr-1"></i>Verified TBAK</button>';

					}

					waktu_cppt = `${(v.created_date_log !== null ? datetimefmysql(v.created_date_log) : '-')}`;
					nadis_profesi = `${v.nadis}<br>(${v.profesi})`;
					btn_disabled = '';
					instruksi_ppa = `${v.instruksi_ppa}`;

					var html = /* html */ `
						<tr>
							<th class="center" width="5%">${++i}</th>
							<th class="center" width="10%">${waktu_cppt}</th>
							<th class="center" width="15%">${nadis_profesi}</th>
							<th width="25%">${hasil}</th>
							<th width="25%">${instruksi_ppa}</th>
							<th class="center" width="10%">${v.user_log}</th>
						</tr>
					`;
					$('#table-history-edit-cppt tbody').append(html);
				})

				$('#modal_history_edit_cppt').modal('show');
			},
			error: function(e) {
				accessFailed('Terjadi Kesalahan | Gagal mengambil data');
			}
		});
	}

	$(function() {
		$("#wizard_cppt").bwizard();
		$('#c_waktu_cppt').attr('readonly', false);

		$('#c_waktu_cppt').datetimepicker({
			format: 'DD/MM/YYYY HH:mm'
		}).on('changeDate', function() {
			$(this).datetimepicker('hide');
		})

		$('#c_instruksi_cppt_field').summernote({
			height: 280,
			focus: true,
			toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontname', ['fontname']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']]
			],
			callbacks: {
				onPaste: function(e) {
					var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

					e.preventDefault();

					// Firefox fix
					setTimeout(function() {
						document.execCommand('insertText', false, bufferText);
					}, 10);
				}
			}
		});

		$('#c_waktu_search').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date(),
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#c_waktu_search').change(function() {
			getListCPPT($('#c_id_pendaftaran').val(), $('#c_id_layanan_pendaftaran').val(), 1);
		});

		$('#c_img_calendar').click(function() {
			$('#c_waktu_search').datepicker('show')
		});

		$('#btn_print_cppt').click(function() {
			printCPPT($('#c_id_pendaftaran').val(), $('#c_id_layanan_pendaftaran').val(), 1);
		});
	});

	function printCPPT(id_pendaftaran, id_layanan_pendaftaran) {
		window.open('<?= base_url('pelayanan/printing_cppt/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Catatan Perkembangan Pasien Terintegrasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function resetFormCPPT() {
		$('#wizard_cppt').bwizard('show', '0');
		$('#c_id_cppt, #c_subject, #c_objective, #c_plan, #c-ademi-asses, #c-ademi-diag, #c-ademi-interv, #c-ademi-monev, #c-sbar-situation, #c-sbar-background, #c-sbar-asses, #c-sbar-recommend').val('');
		$('#c_ttd_nadis').prop('checked', false);
		$('#c_instruksi_cppt_field').summernote('code', '');
		// $('#s2id_c_nadis a .select2c-chosen').html('Pilih Pemberi Pelayanan');
		//$('#form_cppt')[0].reset();

		$('#c_konsul_via_telp').prop('checked', false).attr('disabled', false);

		// $('#c_profesi').attr('readonly', false);
		// $('#c_nadis').select2c('readonly', false);

		$('#c_ttd_nadis').show();
		$('#c_ttd_nadis_verified').hide();


	}

	function entriCPPT(id_pendaftaran, id_layanan_pendaftaran, bed, konsul) {
		resetFormCPPT();
		
		let id_translucent 		= "<?= $this->session->userdata('id_translucent') ?>";	
		let nama 				= "<?= $this->session->userdata('nama') ?>";	
		let id_profesi_nadis 	= "<?= $this->session->userdata('id_profesi_nadis') ?>";	
		let profesi_nadis 		= "<?= $this->session->userdata('profesi_nadis') ?>";	
		$('#c_nadis').val(id_translucent);	
		$('#c_nadis_nama').val(nama);	
		$('#c_profesi').val(id_profesi_nadis);	
		$('#c_profesi_nama').val(profesi_nadis);	
		$('#c_konsul').val(konsul);

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran + '/tipe/cppt',
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#c_id_pendaftaran').val(id_pendaftaran);
				$('#c_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
				if (data.pasien !== null) {
					$('#c_pasien_nama').text(data.pasien.nama);
					$('#c_pasien_no_rm').text(data.pasien.no_rm);
					$('#c_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
					$('#c_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
					$('#c_dokter_dpjp').text(data.layanan.dokter);
					$('#c_id_dokter_dpjp').val(data.layanan.id_dokter);
					$('#c_id_pegawai_dpjp').val(data.layanan.id_pegawai);
				}

				$('#c_bed').text(bed);

				getListCPPT(id_pendaftaran, id_layanan_pendaftaran, 1);

				$('#modal_cppt').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})

	}

	function simpanCPPT() {
		if ($('#c_profesi').val() === '') {
			$('#modal_cppt').animate({
				scrollTop: 0
			}, '100');
			$('#wizard_cppt').bwizard('show', '0');
			syams_validation('#c_profesi_nama', 'Profesi tidak boleh kosong, hubungi IT untuk mengupdate data anda. ');
			return false;
		}

		if ($('#c_nadis').val() === '') {
			$('#modal_cppt').animate({
				scrollTop: 0
			}, '100');
			$('#wizard_cppt').bwizard('show', '0');
			syams_validation('#c_nadis_nama', 'Pilih pemberi pelayanan!');
			$("#c_nadis").select2c("open");
			return false;
		}

		var instruksi = $('#c_instruksi_cppt_field').summernote('code');
		if (instruksi === '') {
			$('#wizard_cppt').bwizard('show', '0');
			swalAlert('warning', 'Validasi Simpan', 'Silahkan isi instruksi PPA!');
			return false;
		}

		if ($('#c_ttd_nadis').is(":visible")) {
			if ($('#c_ttd_nadis').is(":not(:checked)")) {
				$('#wizard_cppt').bwizard('show', '0');
				swalAlert('warning', 'Validasi Simpan', 'Silahkan paraf terlebih dahulu!');
				return false;
			}
		}

		var id_cppt = $('#c_id_cppt').val();
		var pesan = 'Apakah anda yakin menyimpan data CPPT ini ?';
		var confirm_button = 'Simpan';
		if (id_cppt !== '') {
			pesan = 'Apakah anda yakin mengubah data CPPT ini ?';
			confirm_button = 'Update';
		}

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
					url: '<?= base_url("pelayanan/api/pelayanan/simpan_cppt") ?>',
					data: $('#form_cppt').serialize() + '&instruksi=' + encodeURIComponent(instruksi),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.message, 'Error');
						} else {
							$('#wizard_cppt').bwizard('show', '1');
							messageCustom(data.message, 'Success');
							resetFormCPPT();
							getListCPPT($('#c_id_pendaftaran').val(), data.id_layanan_pendaftaran, 1);
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

	function clearValidate(e) {
		if (e.value !== '') {
			syams_validation_remove(e);
		}
	}

	function getListCPPT(id_pendaftaran, id_layanan_pendaftaran, page) {
		$('#c_page_now').val(page);
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_list_cppt") ?>/page/' + page + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran + '/id_pendaftaran/' + id_pendaftaran,
			data: 'keyword=' + $('#c_keyword').val() + '&waktu=' + $('#c_waktu_search').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					// getListCPPT('', '', page - 1);
					return false;
				}

				$('#c_pagination').html(pagination2(data.jumlah, data.limit, data.page, 1));
				$('#c_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table_cppt tbody').empty();
				$.each(data.data, function(i, v) {

					if (v.id_layanan_pendaftaran == id_layanan_pendaftaran) {
						disablEdit = '';
						if ( (v.konsul==null ? '' : v.konsul) == $('#c_konsul').val()) {
							disablEdit = '';
						} else {
							disablEdit = 'disabled';
						}
						
						// if (v.tindak_lanjut == null) {
						//	disablEdit = '';
						//} else {
						//	if (v.tindak_lanjut === 'cco sementara' || v.konsul == $('#c_konsul').val()) {
						//		disablEdit = '';
						//	} else {
						//		disablEdit = 'disabled';
						//	}
						//}
					} else {
						if (accountGroup === 'Admin') {
							disablEdit = '';
						} else {
							// disablEdit = 'disabled';
							disablEdit = ''; // akses verif di bukakan untuk semua layanan
						}
					}

					if (v.log != '0') {
						disablEdit = `disabled`;
					}

					let no = ((i + 1) + ((data.page - 1) * data.limit));
					var hasil = '';

					if (v.subject !== '' || v.objective !== '' || v.assessment !== '' || v.plan !== '') {
						hasil += '<h5><b>SOAP</b></h5>';
					}
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

					if (v.ademi_assesment !== '' || v.ademi_diag !== '' || v.ademi_interv !== '' || v.ademi_monev !== '') {
						hasil += '<h5><b>ADIME</b></h5>';
					}
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

					if (v.sbar_situation !== '' || v.sbar_background !== '' || v.sbar_assesment !== '' || v.sbar_recommend !== '') {
						hasil += '<h5><b>SBAR</b></h5>';
					}	
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

					
					let profesi_nadis   = '<?= $this->session->userdata('profesi_nadis') ?>';
					let account_group   = '<?= $this->session->userdata('account_group') ?>';
					let id_tenaga_medis = '<?= $this->session->userdata('id_tenaga_medis') ?>';

					var btnVerifikasiDPJP 		= '';
					var nama_dokter_dpjp_dpjp 	= '';					
					var btnVerifikasiTBAK 		= '';
					var nama_dokter_dpjp_tbak 	= '';				
					var btnVerifikasiRaber 		= '';
					var nama_dokter_dpjp_raber  = '';
					
					if(v.id_profesi == '10'){	//Dokter Spesialis
						if (v.waktu_verif_raber !== null) {
							nama_dokter_dpjp_raber = `Telah dikonfirmasi oleh DPJP<br>(${v.waktu_verif_raber})` ;
							btnVerifikasiRaber = '<button type="button" class="btn btn-success btn-xs"><i class="fas fa-fw fas fa-lock mr-1"></i>Confrimed RABER</button>';
						} else {
							if($('#c_id_dokter_dpjp').val() == id_tenaga_medis ){	// DPJP = User Login
								btnVerifikasiRaber = '<button type="button" class="btn btn-info btn-xs" onclick="verifRABER('+v.id+', '+v.id_layanan_pendaftaran+')" ><i class="fas fa-fw fas fa-lock-open mr-1"></i>Confrim RABER</button>';
							} else {
								btnVerifikasiRaber = '<button disabled type="button" class="btn btn-info btn-xs" onclick="verifRABER('+v.id+', '+v.id_layanan_pendaftaran+')" title="Hanya DPJP yang bisa mengkonfirmasi"><i class="fas fa-fw fas fa-lock-open mr-1"></i>Confrim RABER</button>';
							}
						}
					}
					
					// if(v.id_profesi !== '10'){	//Dokter Spesialis
						//START DPJP
						if (v.waktu_verif_dpjp == null) {
							if (profesi_nadis == 'Dokter Spesialis' || profesi_nadis == 'Dokter Umum' || account_group == 'Admin IT' || account_group == 'Admin') {
								btnVerifikasiDPJP = '<button ' + disablEdit + ' type="button" class="btn btn-warning btn-xs" onclick="verifDPJP(' + v.id + ', ' + v.id_nadis + ', \'' + v.nadis + '\', \'' + v.waktu + '\')"><i class="fas fa-fw fas fa-lock-open mr-1"></i>Verif DPJP</button>';
							}
						} else if (v.waktu_verif_dpjp != null) {
							btnVerifikasiDPJP = '<button ' + disablEdit + ' type="button" class="btn btn-success btn-xs" onclick="verifiedDPJP(' + v.id + ')"><i class="fas fa-fw fas fa-lock mr-1"></i>Verified DPJP</button>';
						}
						
						if (v.dokter_dpjp !== null) {
							nama_dokter_dpjp_dpjp = `${(v.dokter_dpjp)} ${(v.waktu_verif_dpjp !== null ? `<br>(${v.waktu_verif_dpjp})` : '-')} 
													 ${(v.durasi_dpjp == 'lebih' ? `<br> <b style="color:red">Verifikasi DPJP > 24 jam</b>` : '-')} ` ;
						}
						//END DPJP

						//START TBAK
						if (v.konsul_via_telp == 1 && v.waktu_penerima_tbak == null) {
							if (profesi_nadis == 'Dokter Spesialis' || profesi_nadis == 'Dokter Umum' || account_group == 'Admin IT' || account_group == 'Admin') {
								btnVerifikasiTBAK = '<button ' + disablEdit + ' type="button" class="btn btn-warning btn-xs" onclick="verifTBAK(' + v.id + ', ' + v.id_nadis + ', \'' + v.nadis + '\', \'' + v.waktu + '\')"><i class="fas fa-fw fas fa-lock-open mr-1"></i>Verif TBAK</button>';
							}
						} else if (v.konsul_via_telp == 1 && v.waktu_penerima_tbak != null) {
							btnVerifikasiTBAK = '<button ' + disablEdit + ' type="button" class="btn btn-success btn-xs" onclick="verifiedTBAK(' + v.id + ')"><i class="fas fa-fw fas fa-lock mr-1"></i>Verified TBAK</button>';
						}

						if (v.konsul_via_telp == 1 && v.dokter_dpjp_tbak !== null ) {							
							nama_dokter_dpjp_tbak = `${(v.dokter_dpjp_tbak)} <br>${v.waktu_pemberi_tbak} <br> <i>(Konsul Via Telpon)</i>` ;	
						}
						//END TBAK
					// }

					if($('#c_id_pegawai_dpjp').val() == v.id_nadis ){
						btnVerifikasiRaber = '';
						btnVerifikasiDPJP  = '';
						btnVerifikasiTBAK  = '';
					}
					
					waktu_cppt = `${(v.waktu !== null ? datetimefmysql(v.waktu) : '-')}`;
					nadis_profesi = `${v.nadis}<br>(${v.profesi})`;
					btn_disabled = '';
					instruksi_ppa = `${v.instruksi_ppa}`;
					waktu_pemberi_tbak = `${(v.waktu_pemberi_tbak !== null ? datetimefmysql(v.waktu_pemberi_tbak) : '-')}`;
					
						    if (v.konsul == 'VK'){	ruangan = `${v.ruangan} -> VK`;
					} else 	if (v.konsul == 'OK'){	ruangan = `${v.ruangan} -> OK`;	
					} else 	if (v.ruangan == 'Poliklinik'){	ruangan = `${v.ruangan} ${v.nama_unit}`;	
					} else { ruangan = `${v.ruangan}` }
					
					if (v.log != '0') {
						no = `<s> ${no} </s>`
						ruangan = `<s> ${ruangan} </s>`
						waktu_cppt = `<s> ${waktu_cppt} </s>`
						nadis_profesi = `<s> ${nadis_profesi} </s>`
						btn_disabled = `disabled`;
						hasil = `<s> ${hasil} </s>`
						instruksi_ppa = `<s> ${instruksi_ppa} </s>`
						nama_dokter_dpjp_dpjp = `<s> ${nama_dokter_dpjp_dpjp} </s>`
						nama_dokter_dpjp_tbak = `<s> ${nama_dokter_dpjp_tbak} </s>`
					}

					let nama_verifikasi = '';
					nama_verifikasi += nama_dokter_dpjp_dpjp;
					nama_verifikasi += nama_verifikasi=='' ? nama_dokter_dpjp_tbak : '<br><br>' + nama_dokter_dpjp_tbak ;
					nama_verifikasi += nama_verifikasi=='' ? nama_dokter_dpjp_raber : '<br><br>' + nama_dokter_dpjp_raber ;
					
					
					var html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td class="center">${ruangan}</td>
							<td class="center">${waktu_cppt}</td>
							<td class="center">${waktu_pemberi_tbak}</td>
							<td class="center">${nadis_profesi}</td>
							<td>${hasil}</td>
							<td>${instruksi_ppa}</td>
							<td class="center">${nama_verifikasi}</td>
							<td class="left aksi">
								${btnVerifikasiDPJP} ${btnVerifikasiTBAK} ${btnVerifikasiRaber} <br><br>
								<button type="button" ${btn_disabled} class="btn btn-secondary btn-xs" onclick="editCPPT(${v.id}, ${v.id_layanan_pendaftaran})"><i class="fas fa-fw fa-edit mr-1"></i>Edit</button>	
									${`<button type="button" ${btn_disabled} class="btn btn-secondary btn-xs" onclick="hapusCPPT(`+v.id+', '+v.id_layanan_pendaftaran+`)"><i class="fas fa-fw fa-trash-alt mr-1"></i>Hapus</button>`}
									${v.history_edit != null ? `<p><button type="button" ${btn_disabled} class="btn btn-secondary btn-xs" onclick="historyCPPT(`+v.id+', '+v.id_layanan_pendaftaran+`)"><i class="fas fa-eye mr-1"></i>History Edit</button></p>` : ''}
							</td>
						</tr>
					`;

					$('#table_cppt tbody').append(html);
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

	function paging2(page) {
		getListCPPT($('#c_id_pendaftaran').val(), $('#c_id_layanan_pendaftaran').val(), page);
	}

	function verifRABER(id, id_layanan_pendaftaran) {
		swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda yakin akan memverifikasi Rawat Bersama ?',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'GET',
					url: '<?= base_url("pelayanan/api/pelayanan/get_verif_raber") ?>/id/' + id,
					cache: false,
					dataType: 'JSON',
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.message, 'Error');
						} else {
							messageCustom(data.message, 'Success');
							resetFormCPPT();
							getListCPPT($('#c_id_pendaftaran').val(), id_layanan_pendaftaran, 1);
						}
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menghapus data')
					}
				})
			}
		});
	}
	
	function hapusCPPT(id, id_layanan_pendaftaran) {
		swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda yakin menghapus data CPPT ini ?',
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
					url: '<?= base_url("pelayanan/api/pelayanan/hapus_cppt/") ?>' + id,
					cache: false,
					dataType: 'JSON',
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.message, 'Error');
						} else {
							messageCustom(data.message, 'Success');
							resetFormCPPT();
							getListCPPT($('#c_id_pendaftaran').val(), id_layanan_pendaftaran, 1);
						}
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menghapus data')
					}
				})
			}
		});
	}

	function editCPPT(id, id_layanan_pendaftaran) {
		resetFormCPPT();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_cppt") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#wizard_cppt').bwizard('show', '0');
				
				$('#c_profesi').val(data.id_profesi);	
				$('#c_profesi_nama').val(data.profesi);	
				$('#c_nadis').val(data.id_nadis);	
				$('#c_nadis_nama').val(data.nadis);
				
				$('#c_id_cppt').val(data.id);
				$('#c_id_layanan_pendaftaran').val(data.id_layanan_pendaftaran);
				$('#c_waktu_cppt').val(datetimefmysql(data.waktu));
				// $('#c_profesi').val(data.id_profesi).attr('readonly', true);
				$('#c_nadis').val(data.id_nadis);
				// if (data.id_nadis !== null) {
				// 	$('#c_nadis').select2c('readonly', true)
				// }
				$('#s2id_c_nadis a .select2c-chosen').html(data.nadis);
				if (data.ttd_nadis !== null) {
					$('#c_ttd_nadis').hide();
					$('#c_ttd_nadis_verified').show();
					$('#c_ttd_nadis_old').val(data.ttd_nadis);
				}

				if (data.konsul_via_telp == 1) {
					$('#c_konsul_via_telp').prop('checked', true).attr('disabled', true);
				} else if (data.konsul_via_telp == 0) {
					$('#c_konsul_via_telp').prop('checked', false).attr('disabled', true);
				}

				$('#c_subject').val(data.subject);
				$('#c_objective').val(data.objective);
				$('#c_assessment').val(data.assessment);
				$('#c_plan').val(data.plan);
				$('#c-ademi-asses').val(data.ademi_assesment);
				$('#c-ademi-diag').val(data.ademi_diag);
				$('#c-ademi-interv').val(data.ademi_interv);
				$('#c-ademi-monev').val(data.ademi_monev);
				$('#c-sbar-situation').val(data.sbar_situation);
				$('#c-sbar-background').val(data.sbar_background);
				$('#c-sbar-asses').val(data.sbar_assesment);
				$('#c-sbar-recommend').val(data.sbar_recommend);
				$('#c_instruksi_cppt_field').summernote('code', data.instruksi_ppa);
			},
			error: function(e) {
				accessFailed('Terjadi Kesalahan | Gagal mengambil data');
			}
		});
	}
</script>


<!-- end catatan perkembangan pasien terintegrasi -->

<!-- Modal -->
<input type="hidden" name="page_now" id="c_page_now">
<div class="modal fade" id="modal_cppt">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:95%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_pengkajian_awal">FORM CPPT</h5>
					<h6 class="modal-title text-muted"><small>(Catatan Perkembangan Pasien Terintegrasi)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_cppt class=form-horizontal') ?>
				<input type="hidden" name="id_cppt" id="c_id_cppt">
				<input type="hidden" name="id_layanan_pendaftaran" id="c_id_layanan_pendaftaran">
				<input type="hidden" name="id_pendaftaran" id="c_id_pendaftaran">
				<input type="hidden" name="konsul" id="c_konsul">
				<!-- header -->
				<div class="row">
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="20%" class="bold">Nama Pasien</td>
									<td wdith="80%">: <span id="c_pasien_nama"></span></td>
								</tr>
								<tr>
									<td class="bold">No. RM</td>
									<td>: <span id="c_pasien_no_rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Tanggal Lahir</td>
									<td>: <span id="c_pasien_tanggal_lahir"></span></td>
								</tr>
								<tr>
									<td class="bold">Jenis Kelamin</td>
									<td>: <span id="c_pasien_jenis_kelamin"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
									<td wdith="70%">: <span id="c_bed"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Dokter DPJP</td>
									<td wdith="70%">: <span id="c_dokter_dpjp"></span></td><input type="hidden" id="c_id_dokter_dpjp"><input type="hidden" id="c_id_pegawai_dpjp">
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="widget-body">
							<!-- form cppt -->
							<div id="wizard_cppt">
								<!-- Tab bwizard -->
								<ol>
									<li>Entri CPPT</li>
									<li>Data CPPT</li>
								</ol>

								<!-- Data bwizard -->
								<div class="form_entri_cppt">
									<div class="row">
										<div class="col-lg-12">
											<table class="table table-sm table-striped">
												<tr>
													<td width="20%" class="bold">Tanggal dan Jam</td>
													<td wdith="80%"><input type="text" name="waktu_cppt" id="c_waktu_cppt" class="custom-form col-lg-3 readonly" value="<?= date('d/m/Y H:i') ?>"></td>
												</tr>
												<tr>
													<td class="bold">Profesional Pemberi Asuhan</td>
													<td><input type="text" readonly class="custom-form col-lg-3" name="profesi_nama" id="c_profesi_nama"></td>	
													<td><input type="hidden" name="profesi" id="c_profesi"></td>
												</tr>
												<tr>
													<td class="bold">Pemberi Pelayanan</td>
													<td><input type="text" readonly class="custom-form col-lg-3" name="nadis_nama" id="c_nadis_nama"></td>
													<td><input type="hidden" name="nadis" id="c_nadis"></td>
												</tr>
												<tr>
													<td class="bold">Paraf</td>
													<td>
														<input type="checkbox" name="ttd_nadis" id="c_ttd_nadis" class="custom-form" style="width:20px" value="1" class="mr-1">
														<input type="hidden" name="ttd_nadis_old" id="c_ttd_nadis_old">
														<?= digitalSignature('c_ttd_nadis_verified') ?>
													</td>
												</tr>
												<tr>
													<td class="bold">Konsul Via Telpon</td>
													<td>
														<input type="checkbox" name="konsul_via_telp" id="c_konsul_via_telp" class="custom-form" style="width:20px" value="1" class="mr-1">
														<input type="hidden" name="konsul_via_telp_old" id="c_konsul_via_telp_old_old">
													</td>
												</tr>
											</table>
											<div class="box-well shadow">
												<table class="table table-sm table-no-border table-striped" style="margin-top: -15px">
													<br>
													<tr>
														<td class="bold" colspan="2">
															<span>
																<h4><b>SOAP</b></h4>
															</span>
														</td>
													</tr>
													<tr>
														<td width="50%">
															<span class="bold">SUBJECTIVE</span><br>
															<span class="text-muted"><i><small>Statement about relevant patient behavior or status</small></i></span>
														</td>
														<td wdith="50%">
															<span class="bold">OBJECTIVE</span><br>
															<span class="text-muted"><i><small>Measurable, quantifiable, and observable data</small></i></span>
														</td>
													</tr>
													<tr>
														<td style="padding-left:0"><textarea name="subject" id="c_subject" rows="4" class="form-control" placeholder="Subjective"></textarea></td>
														<td style="padding-right:0"><textarea name="objective" id="c_objective" rows="4" class="form-control" placeholder="Objective"></textarea></td>
													</tr>
													<tr>
														<td>
															<span class="bold">ASSESSMENT</span><br>
															<span class="text-muted"><i><small>Interpret the meaning of "S" and "O"</small></i></span>
														</td>
														<td>
															<span class="bold">PLAN</span><br>
															<span class="text-muted"><i><small>Anticipated frequency and duration, course of the treatment for next session, recommendations and any changes</small></i></span>
														</td>
													</tr>
													<tr>
														<td style="padding-left:0"><textarea name="assessment" id="c_assessment" rows="4" class="form-control" placeholder="Assessment"></textarea></td>
														<td style="padding-right:0"><textarea name="plan" id="c_plan" rows="4" class="form-control" placeholder="Plan"></textarea></td>
													</tr>
												</table>
												<table class="table table-sm table-no-border table-striped" style="margin-top: -15px">
													<br>
													<tr>
														<td class="bold" colspan="2">
															<span>
																<h4><b>ADIME</b></h4>
															</span>
														</td>
													</tr>
													<tr>
														<td width="50%">
															<span class="bold">ASSESMENT</span><br>
															<span class="text-muted"><i><small>This step involves collecting data pertinent to the patient, including nutrition-related History, anthropometric Measurements, biochemical data, nutrition-focused physical findings, client history and comparative standards</small></i></span>
														</td>
														<td wdith="50%">
															<span class="bold">DIAGNOSIS</span><br>
															<span class="text-muted"><i><small>Based on the assessment data collected, a nutrition problem may be diagnosed. Causes and contributing factors are identified</small></i></span>
														</td>
													</tr>
													<tr>
														<td style="padding-left:0"><textarea name="ademi_assesment" id="c-ademi-asses" rows="4" class="form-control" placeholder="Assessment"></textarea></td>
														<td style="padding-right:0"><textarea name="ademi_diag" id="c-ademi-diag" rows="4" class="form-control" placeholder="Diagnosis"></textarea></td>
													</tr>
													<tr>
														<td>
															<span class="bold">INTERVENTION</span><br>
															<span class="text-muted"><i><small>Based on the nutrition diagnosis, problems are addressed that aid in alleviation of the diagnosis’ signs and symptoms. Activities are constructed to enable the patient to work towards objectives set for them by themselves and their nutrition professional</small></i></span>
														</td>
														<td>
															<span class="bold">MONITORING / EVALUATION</span><br>
															<span class="text-muted"><i><small>Progress made on goals and/or expected outcomes is tracked to ensure that nutrition problems are being addressed; adjustments in the Intervention step are made according to progress</small></i></span>
														</td>
													</tr>
													<tr>
														<td style="padding-left:0"><textarea name="ademi_interv" id="c-ademi-interv" rows="4" class="form-control" placeholder="Intervention"></textarea></td>
														<td style="padding-right:0"><textarea name="ademi_monev" id="c-ademi-monev" rows="4" class="form-control" placeholder="Monitoring / Evaluation"></textarea></td>
													</tr>
												</table>
												<table class="table table-sm table-no-border table-striped" style="margin-top: -15px">
													<br>
													<tr>
														<td class="bold" colspan="2">
															<span>
																<h4><b>SBAR</b></h4>
															</span>
														</td>
													</tr>
													<tr>
														<td width="50%">
															<span class="bold">SITUATION</span><br>
															<span class="text-muted"><i><small>a concise statement of the problem</small></i></span>
														</td>
														<td wdith="50%">
															<span class="bold">BACKGROUND</span><br>
															<span class="text-muted"><i><small>pertinent and brief information related to the situation</small></i></span>
														</td>
													</tr>
													<tr>
														<td style="padding-left:0"><textarea name="sbar_situation" id="c-sbar-situation" rows="4" class="form-control" placeholder="Situation"></textarea></td>
														<td style="padding-right:0"><textarea name="sbar_background" id="c-sbar-background" rows="4" class="form-control" placeholder="Background"></textarea></td>
													</tr>
													<tr>
														<td>
															<span class="bold">ASSESMENT</span><br>
															<span class="text-muted"><i><small>analysis and considerations of options — what you found/think</small></i></span>
														</td>
														<td>
															<span class="bold">RECOMMENDATION</span><br>
															<span class="text-muted"><i><small>action requested/recommended — what you want</small></i></span>
														</td>
													</tr>
													<tr>
														<td style="padding-left:0"><textarea name="sbar_assesment" id="c-sbar-asses" rows="4" class="form-control" placeholder="Assessment"></textarea></td>
														<td style="padding-right:0"><textarea name="sbar_recommend" id="c-sbar-recommend" rows="4" class="form-control" placeholder="Recommendation"></textarea></td>
													</tr>
												</table>
												<table class="table table-sm table-no-border table-striped" style="margin-top: -15px">
													<br>
													<tr>
														<td class="bold" colspan="2">
															<span>Instruksi PPA Termasuk Pasca Bedah/Prosedur</span>
															<br><span class="text-muted"><i><small>(Instruksi ditulis dengan rinci dan jelas)</small></i></span>
														</td>
													</tr>
													<tr>
														<td colspan="2" style="padding:4.8px 0">
															<div id="c_instruksi_cppt_field"></div>
														</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="form_data_cppt">
									<div class="row">
										<div class="col-lg-12">
											<div class="row mb-2">
												<div class="col d-flex justify-content-start">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text" id="c_img_calendar"><i class="fas fa-fw fa-calendar-alt"></i></span>
														</div>
														<input type="text" name="waktu_search" id="c_waktu_search" class="form-control col-lg-4" placeholder="Pencarian Tanggal">
													</div>
												</div>
												<div class="col d-flex justify-content-end">
													<div class="button">
														<button type="button" id="btn_print_cppt" class="btn btn-info mr-2"><span id="btn_print_cppt"><i class="fas fa-fw fa-print mr-1"></i>Print CPPT</span></button>
													</div>
													<div class="custom-search">
														<input type="text" class="search-query-white" onkeyup="getListCPPT($('#c_id_pendaftaran').val(),$('#c_id_layanan_pendaftaran').val(), 1)" id="c_keyword" placeholder="Pencarian ...">
														<button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
													</div>
												</div>
											</div>
											<table class="table table-sm table-striped table-bordered color-table info-table" id="table_cppt">
												<thead>
													<tr>
														<th class="center v-center" width="5%">No.</th>
														<th class="center v-center" width="5%">Ruangan</th>
														<th class="center v-center" width="5%">Waktu</th>
														<th class="center v-center" width="5%">Waktu Pemberi TBAK</th>
														<th class="center v-center" width="15%">Professional Pemberi Asuhan</th>
														<th class="center v-center" width="25%">Hasil Assessmen Pasien Dan Pemberian Pelayanan<br><span><i><small>(Tulis dengan format SOAP/ADIME, disertai sasaran, beri paraf pada akhir catatan)</small></i></span></th>
														<th class="center v-center" width="25%">Instruksi PPA Termasuk Pasca Bedah/Prosedur<br><span><i><small>(Instruksi ditulis dengan rinci dan jelas)</small></i></span></th>
														<th class="center v-center" width="10%">Review Dan Verifikasi DPJP</th>
														<th class="center v-center" width="10%"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<div id="c_pagination" class="float-left"></div>
											<div id="c_summary" class="float-right text-sm"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end header -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanCPPT()"><span id="btn_cppt"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {

		$('#c_nadis_tbak').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: $('#c_profesi').val(),
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

		$('#c_dokter_dpjp_tbak').select2c({
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
				$('#c_ttd_dokter_dpjp_tbak').prop('checked', false);
				return data.nama;
			}
		});

		$('#c_waktu_pemberi_tbak, #c_waktu_pemberi_verif_dpjp').datetimepicker({
			format: 'DD/MM/YYYY HH:mm:ss',
			pickSecond: true,
			pick12HourFormat: false,
			maxDate: new Date(),
		});

		$('#c_dokter_verif_dpjp').select2c({
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
				$('#c_ttd_dokter_verif_dpjp').prop('checked', false);
				return data.nama;
			}
		});		
	})

	function verifTBAK(id, id_nadis, nadis, waktu) {
		resetVerifTBAK();
		$('#c_id_cppt_tbak').val(id);
		$('#c_waktu_penerima_tbak').val((waktu !== null ? datetimefmysql(waktu) : '')).attr('readonly', true);
		$('#c_nadis_tbak').val(id_nadis);
		$('#s2id_c_nadis_tbak a .select2c-chosen').html(nadis);
		$('#c_ttd_nadis_tbak').prop('checked', true);
		$('#modal_verifikasi_tbak').modal('show');
	}

	function resetVerifTBAK() {
		$('#c_waktu_pemberi_tbak').val('');
		$('#s2id_c_nadis_tbak a .select2c-chosen').html('');

		let session_nama 			= "<?= $this->session->userdata('nama') ?>";
		let session_id_tenaga_medis = "<?= $this->session->userdata('id_tenaga_medis') ?>";
		if(session_id_tenaga_medis === ''){
			$('#c_dokter_dpjp_tbak').val('');		
			$('#s2id_c_dokter_dpjp_tbak a .select2c-chosen').html('');
			$('#c_ttd_dokter_dpjp_tbak').prop('checked', false);
		} else {
			$('#c_dokter_dpjp_tbak').val(session_id_tenaga_medis);		
			$('#s2id_c_dokter_dpjp_tbak a .select2c-chosen').html(session_nama);
			$('#c_ttd_dokter_dpjp_tbak').prop('checked', true);
		}
	}

	function verifDPJP(id, id_nadis, nadis, waktu) {
		resetVerifDPJP();
		$('#c_id_cppt_dpjp').val(id);
		$('#modal_verifikasi_dpjp').modal('show');
	}

	function resetVerifDPJP() {
		$('#c_waktu_pemberi_verif_dpjp').val('');

		let session_nama 			= "<?= $this->session->userdata('nama') ?>";
		let session_id_tenaga_medis = "<?= $this->session->userdata('id_tenaga_medis') ?>";
		if(session_id_tenaga_medis === ''){
			$('#c_dokter_verif_dpjp').val('');		
			$('#s2id_c_dokter_verif_dpjp a .select2c-chosen').html('');
			$('#c_ttd_dokter_verif_dpjp').prop('checked', false);
		} else {
			$('#c_dokter_verif_dpjp').val(session_id_tenaga_medis);		
			$('#s2id_c_dokter_verif_dpjp a .select2c-chosen').html(session_nama);
			$('#c_ttd_dokter_verif_dpjp').prop('checked', true);
		}
	}


	function updateVerifTBAK() {
		var stop = false;
		if ($('#c_waktu_penerima_tbak').val() === '') {
			syams_validation('#c_waktu_penerima_tbak', 'Kolom waktu penerima harus diisi!');
			stop = true;
		}
		if ($('#c_waktu_pemberi_tbak').val() === '') {
			syams_validation('#c_waktu_pemberi_tbak', 'Kolom waktu pemberi harus diisi!');
			stop = true;
		}
		if ($('#c_nadis_tbak').val() === '') {
			syams_validation('#c_nadis_tbak', 'Kolom nama harus dipilih!');
			stop = true;
		}
		if ($('#c_dokter_dpjp_tbak').val() === '') {
			syams_validation('#c_dokter_dpjp_tbak', 'Kolom nama harus dipilih!');
			stop = true;
		}

		if (stop) {
			return false;
		}

		if ($('#c_ttd_nadis_tbak').is(":not(:checked)")) {
			swalAlert('warning', 'Signature Validation', 'Harap penerima informasi<br> tanda tangan terlebih dahulu');
			return false;
		}

		if ($('#c_ttd_dokter_dpjp_tbak').is(":not(:checked)")) {
			swalAlert('warning', 'Signature Validation', 'Harap pemberi informasi<br> tanda tangan terlebih dahulu');
			return false;
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("pelayanan/api/pelayanan/verifikasi_tbak") ?>',
			data: $('#form_verif_tbak').serialize(),
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status === false) {
					messageCustom(data.message, 'Error');
				} else {
					resetVerifTBAK();
					getListCPPT($('#c_id_pendaftaran').val(), $('#c_id_layanan_pendaftaran').val(), $('#c_page_now').val());

					messageCustom(data.message, 'Success');
					$('#modal_verifikasi_tbak').modal('hide');
				}
			},
			error: function(e) {
				messageCustom('Gagal melakukan verifikasi TBAK', 'Error');
			}
		})
	}

	function verifiedTBAK(id) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_cppt_verified") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status !== false) {
					$('#c_waktu_penerima_tbak_detail').text((data.data.waktu_penerima_tbak !== null ? datetimefmysql(data.data.waktu_penerima_tbak) : '-'));
					$('#c_waktu_pemberi_tbak_detail').text((data.data.waktu_pemberi_tbak !== null ? datetimefmysql(data.data.waktu_pemberi_tbak) : '-'));
					$('#c_nadis_tbak_detail').text(data.data.nadis_tbak);
					$('#c_dokter_dpjp_tbak_detail').text(data.data.dokter_dpjp_tbak);
					if (data.data.ttd_nadis_tbak == 1) {
						$('#c_ttd_nadis_tbak_detail').show()
					} else {
						$('#c_ttd_nadis_tbak_detail').hide()
					}
					if (data.data.ttd_dokter_dpjp_tbak == 1) {
						$('#c_ttd_dokter_dpjp_tbak_detail').show()
					} else {
						$('#c_ttd_dokter_dpjp_tbak_detail').hide()
					}

					$('#modal_verified_tbak').modal('show');
				}
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function verifiedDPJP(id) {
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		
			$.ajax({
				type: 'GET',
				url: '<?= base_url("pelayanan/api/pelayanan/get_cppt_verified_dpjp") ?>/id/' + id,
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					if (data.status !== false) {
						if (accountGroup === 'Admin') {
							$('#c_id_cppt_dpjp').val(id);
							$('#c_waktu_pemberi_verif_dpjp').val(datetimefmysql(data.data.waktu_verif_dpjp));
							$('#c_dokter_verif_dpjp').val(data.data.id_dokter_dpjp);		
							$('#s2id_c_dokter_verif_dpjp a .select2c-chosen').html(data.data.dokter_dpjp);
							$('#c_ttd_dokter_verif_dpjp').prop('checked', true);

							$('#modal_verifikasi_dpjp').modal('show');

						} else {
							$('#c_waktu_pemberi_verif_dpjp_detail').text(data.data.waktu_verif_dpjp);
							$('#c_dokter_verif_dpjp_detail').text(data.data.dokter_dpjp);
							if (data.data.ttd_dokter_dpjp == 1) {
								$('#c_ttd_dokter_dpjp_detail').show()
							} else {
								$('#c_ttd_dokter_dpjp_detail').hide()
							}
							
							$('#modal_verified_dpjp').modal('show');						
						}
					}
				},
				error: function(e) {
					accessFailed(e.status);
				}
			})
	}
	
	function updateVerifDPJP() {
		var stop = false;
		
		if ($('#c_waktu_pemberi_verif_dpjp').val() === '') {
			syams_validation('#c_waktu_pemberi_verif_dpjp', 'Kolom waktu pemberi harus diisi!');
			stop = true;
		}
		if ($('#c_dokter_verif_dpjp').val() === '') {
			syams_validation('#c_dokter_verif_dpjp', 'Kolom nama harus dipilih!');
			stop = true;
		}
		if ($('#c_ttd_dokter_verif_dpjp').val() === '') {
			syams_validation('#c_ttd_dokter_verif_dpjp', 'Kolom paraf harus dipilih!');
			stop = true;
		}

		if (stop) {
			return false;
		}

		if ($('#c_ttd_dokter_verif_dpjp').is(":not(:checked)")) {
			swalAlert('warning', 'Signature Validation', 'Harap pemberi informasi<br> tanda tangan terlebih dahulu');
			return false;
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("pelayanan/api/pelayanan/verifikasi_dpjp") ?>',
			data: $('#form_verif_dpjp').serialize(),
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status === false) {
					messageCustom(data.message, 'Error');
				} else {
					resetVerifDPJP();
					getListCPPT($('#c_id_pendaftaran').val(), $('#c_id_layanan_pendaftaran').val(), $('#c_page_now').val());

					messageCustom(data.message, 'Success');
					$('#modal_verifikasi_dpjp').modal('hide');
				}
			},
			error: function(e) {
				messageCustom('Gagal melakukan verifikasi DPJP', 'Error');
			}
		})
	}

</script>

<!-- Modal Verifikasi TBAK-->
<div class="modal fade" id="modal_verifikasi_tbak">
	<div class="modal-dialog" style="max-width:58%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title" id="modal_verifikasi_tbak"><b>Verifikasi CPPT Metode TBAK</b></h5>
					<h6 class="modal-title text-muted"><small>(Konfirmasi Sudah dilakukan TBAK dengan Benar)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_verif_tbak class=form-horizontal') ?>
				<input type="hidden" name="id" id="c_id_cppt_tbak">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td class="center bold" colspan="4">Penerima Informasi / Pesan</td>
									<td class="center bold" colspan="4">Pemberi Informasi / Pesan</td>
								</tr>
								<tr>
									<td width="10%" class="bold">Waktu</td>
									<td width="1%" class="bold">:</td>
									<td width="34%"><input type="text" name="waktu_penerima_tbak" id="c_waktu_penerima_tbak" class="custom-form col-lg-6" onchange="clearValidate(this)"></td>
									<td width="5%"></td>
									<td width="5%"></td>
									<td width="10%" class="bold">Waktu</td>
									<td width="1%" class="bold">:</td>
									<td width="34%"><input type="text" name="waktu_pemberi_tbak" id="c_waktu_pemberi_tbak" class="custom-form col-lg-6" onchange="clearValidate(this)"></td>
								</tr>
								<tr>
									<td class="bold">Nama</td>
									<td class="bold">:</td>
									<td><input type="text" name="nadis_tbak" id="c_nadis_tbak" class="select2c-input"></td>
									<td></td>
									<td></td>
									<td class="bold">Nama</td>
									<td class="bold">:</td>
									<td><input type="text" name="dokter_dpjp_tbak" id="c_dokter_dpjp_tbak" class="select2c-input"></td>
								</tr>
								<tr>
									<td class="bold">Paraf</td>
									<td class="bold">:</td>
									<td><input type="checkbox" name="ttd_nadis_tbak" id="c_ttd_nadis_tbak" value="1" class="custom-form" style="width:20px"></td>
									<td></td>
									<td></td>
									<td class="bold">Paraf</td>
									<td class="bold">:</td>
									<td><input type="checkbox" name="ttd_dokter_dpjp_tbak" id="c_ttd_dokter_dpjp_tbak" value="1" class="custom-form" style="width:20px"></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="updateVerifTBAK()"><i class="fas fa-fw fa-lock mr-1"></i>Verifikasi</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Verified TBAK-->
<div class="modal fade" id="modal_verified_tbak">
	<div class="modal-dialog" style="max-width:58%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title" id="modal_verified_tbak"><b>Verified CPPT Metode TBAK</b></h5>
					<h6 class="modal-title text-muted"><small>(Sudah dilakukan TBAK dengan Benar)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td class="center bold" colspan="4">Penerima Informasi / Pesan</td>
									<td class="center bold" colspan="4">Pemberi Informasi / Pesan</td>
								</tr>
								<tr>
									<td width="10%" class="bold">Waktu</td>
									<td width="1%" class="bold">:</td>
									<td width="34%"><span id="c_waktu_penerima_tbak_detail"></span></td>
									<td width="5%"></td>
									<td width="5%"></td>
									<td width="10%" class="bold">Waktu</td>
									<td width="1%" class="bold">:</td>
									<td width="34%"><span id="c_waktu_pemberi_tbak_detail"></span></td>
								</tr>
								<tr>
									<td class="bold">Nama</td>
									<td class="bold">:</td>
									<td><span id="c_nadis_tbak_detail"></span></td>
									<td></td>
									<td></td>
									<td class="bold">Nama</td>
									<td class="bold">:</td>
									<td><span id="c_dokter_dpjp_tbak_detail"></span></td>
								</tr>
								<tr>
									<td class="bold">Paraf</td>
									<td class="bold">:</td>
									<td><?= digitalSignature('c_ttd_nadis_tbak_detail', 50) ?></td>
									<td></td>
									<td></td>
									<td class="bold">Paraf</td>
									<td class="bold">:</td>
									<td><?= digitalSignature('c_ttd_dokter_dpjp_tbak_detail', 50) ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Verified TBAK-->
<div class="modal fade" id="modal_history_edit_cppt">
	<div class="modal-dialog" style="max-width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title" id="modal_verified_tbak"><b>History Edit CPPT Metode TBAK</b></h5>
					<!-- <h6 class="modal-title text-muted"><small>(Sudah dilakukan TBAK dengan Benar)</small></h6> -->
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-hover table-striped table-sm color-table info-table" style="margin-bottom: 0;">
								<thead>
									<tr>
										<th class="center v-center" width="5%">No.</th>
										<th class="center v-center" width="10%">Waktu edit</th>
										<th class="center v-center" width="15%">Professional Pemberi Asuhan</th>
										<th class="center v-center" width="25%">Hasil Assessmen Pasien Dan Pemberian Pelayanan<br><span><i><small>(Tulis dengan format SOAP/ADIME, disertai sasaran, beri paraf pada akhir catatan)</small></i></span></th>
										<th class="center v-center" width="25%">Instruksi PPA Termasuk Pasca Bedah/Prosedur<br><span><i><small>(Instruksi ditulis dengan rinci dan jelas)</small></i></span></th>
										<th class="center v-center" width="10%">Petugas</th>
									</tr>
								</thead>
							</table>
							<div id="soap-history-scroll" style="max-height: 350px; overflow-y: auto;">
								<table class="table table-striped table-hover table-sm" cellpadding="0" cellspacing="0" id="table-history-edit-cppt">
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Verifikasi DPJP-->
<div class="modal fade" id="modal_verifikasi_dpjp">
	<div class="modal-dialog" style="max-width:58%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title" id="modal_verifikasi_dpjp"><b>Verifikasi CPPT Metode DPJP</b></h5>
					<h6 class="modal-title text-muted"><small>(Konfirmasi Sudah dilakukan dengan Benar)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_verif_dpjp class=form-horizontal') ?>
				<input type="hidden" name="id" id="c_id_cppt_dpjp">

				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="10%" class="bold">Waktu</td>
									<td width="1%" class="bold">:</td>
									<td width="34%"><input type="text" name="waktu_pemberi_verif_dpjp" id="c_waktu_pemberi_verif_dpjp" class="custom-form col-lg-6" ></td>
								</tr>
								<tr>
									<td class="bold">Nama</td>	
									<td class="bold">:</td>
									<td><input type="text" name="dokter_verif_dpjp" id="c_dokter_verif_dpjp" class="select2c-input"></td>
								</tr>
								<tr>
									<td class="bold">Paraf</td>
									<td class="bold">:</td>
									<td><input type="checkbox" name="ttd_dokter_verif_dpjp" id="c_ttd_dokter_verif_dpjp" value="1" class="custom-form" style="width:20px"></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="updateVerifDPJP()"><i class="fas fa-fw fa-lock mr-1"></i>Verifikasi</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_verified_dpjp">
	<div class="modal-dialog" style="max-width:58%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title" id="modal_verified_dpjp"><b>Verifikasi CPPT Metode DPJP</b></h5>
					<h6 class="modal-title text-muted"><small>(Konfirmasi Sudah dilakukan dengan Benar)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_verif_dpjp class=form-horizontal') ?>
				<input type="hidden" name="id" id="c_id_cppt_dpjp">

				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="10%" class="bold">Waktu</td>
									<td width="1%" class="bold">:</td>									
									<td><span id="c_waktu_pemberi_verif_dpjp_detail"></span></td>
								</tr>
								<tr>
									<td class="bold">Nama</td>	
									<td class="bold">:</td>			
									<td><span id="c_dokter_verif_dpjp_detail"></span></td>
								</tr>
								<tr>
									<td class="bold">Paraf</td>
									<td class="bold">:</td>
									<td><?= digitalSignature('c_ttd_dokter_dpjp_detail', 50) ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
			</div>
		</div>
	</div>
</div>