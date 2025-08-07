<script>
	const userData = '<?= $this->session->userdata('nama') ?>';
	$(function() {
		if(userData === 'APM Pendaftaran Loket'){
			setTimeout(() => {
				window.open('<?= base_url('booking_poliklinik/antrian_loket') ?>', 'Antrian Loket')
			}, 200);
		}
		
		$('#btn-booking').on('click', function() {
			$('#modal-tambah-booking').modal('show')
			$('#modal-tambah-booking-label').html('Form Entri Booking Poliklinik')
			setTimeout(function() {
				$('#bpjs').click()
				$('#no-rm').click()
				// $('#btn-booking').focus()
			}, 150)
		})

		// inputBooking()

		$('#btn-checkin-cari, #input-kode').on('click keypress', function(e) {
			const target = $(e.target)
			if ((e.which === 13 && target.is('#input-kode')) || (e.type === 'click' && target.is('#btn-checkin-cari'))) {
				getKodeBookingPasien()

				if (e.which === 13 && target.is('#input-kode')) {
					$('#input-kode').val('').focus();
				}
			}
		})

		$('#btn-checkin').click(function() {
			let accountGroup = "<?= $this->session->userdata('account_group') ?>";
			let account = "<?= $this->session->userdata('account') ?>";
			
			if ((accountGroup === 'Admin') || (accountGroup === 'Admin Rekam Medis') || (accountGroup === 'Pendaftaran') || (accountGroup === 'APM RAJAL ADMIN') || (accountGroup === 'Pendaftaran IGD') || (accountGroup === 'Admin') ) {
				$('#modal-checkin-pasien').modal('show')
				setTimeout(() => $('#input-kode').focus(), 200);
				$('#table-checkin-pasien tbody').empty()
				$('#label-data-pasien').html('Data Pasien : <b></b>')
			} else {
			 	swalCustom('warning', 'APM ini tidak bisa Check In', 'Check In hanya bisa dilakukan di APM Pendaftaran (Depan) atau Petugas Loket');
			}
		})

		$('#btn-antrian-loket').on('click', function (){
			const today = new Date();
			const yyyy = today.getFullYear();
			const mm = String(today.getMonth() + 1).padStart(2, '0');
			const dd = String(today.getDate()).padStart(2, '0');
			const localDate = `${yyyy}-${mm}-${dd}`;
			cekAntrianBPJS('Antrian APM', 'Tidak', localDate) // Loket I
		})

		$('#btn-informasi').on('click', function (){
			const today = new Date();
			const yyyy = today.getFullYear();
			const mm = String(today.getMonth() + 1).padStart(2, '0');
			const dd = String(today.getDate()).padStart(2, '0');
			const localDate = `${yyyy}-${mm}-${dd}`;
			cekAntrianBPJS('Informasi', 'Tidak', localDate) // Loket D
		})

		$('#btn-buka-antrian-loket').on('click', function (){
			// var windowFeatures = 'width=' + screen.availWidth + ',height=' + screen.availHeight + ',left=0,top=0,resizable=yes,scrollbars=yes,status=yes';

			const popupWindow = window.open('<?= base_url('booking_poliklinik/antrian_loket') ?>', 'Antrian Loket')

			// window.addEventListener('message', (event) => {
			// 	if (event.data === 'taskCompleteAndClose') {
			// 		if (popupWindow) {  
			// 		popupWindow.close();
			// 		}
			// 		popupWindow = null;
			// 	}
			// }, false);
		})

		$('#btn-reset-user-input, #btn-reset-user-input-numpad').on('click', function() {
			resetField(true)
		})

		// $('#no-tanggal-lahir').datepicker({
		// 	format: 'dd/mm/yyyy',
		// }).on('changeDate', function() {
		// 	$(this).datepicker('hide')
		// })

		$('input:checkbox').on('click', function() {
			const box = $(this)
			if (box.is(':checked')) {
				const group = 'input:checkbox[name=\'' + box.attr('name') + '\']'
				$(group).prop('checked', false)
				box.prop('checked', true)
			} else {
				box.prop('checked', false)
			}
		})

		$('#disabilitas').on('change', function() {
			if ($(this).is(':checked')) {
				$('#hamkom').val($('#hamkom option:first').val()).parent().parent().removeClass('hide')
			} else {
				$('#hamkom').val($('#hamkom option:first').val()).parent().parent().addClass('hide')
				$('#hamkom-lainnya').val('').parent().parent().addClass('hide')
			}
		})

		$('#hamkom').on('change', function() {
			if ($(this).val() === 'Lain - lain') {
				$('#hamkom-lainnya').val('').parent().parent().removeClass('hide')
			} else {
				$('#hamkom-lainnya').val('').parent().parent().addClass('hide')
			}
		})
		
		$('#etnis').on('change', function() {
			if ($(this).val() === '17') {
				$('#etnis-lainnya').val('').parent().parent().removeClass('hide')
			} else {
				$('#etnis-lainnya').val('').parent().parent().addClass('hide')
			}
		})

		$('.checkbox-penjamin').on('change', function() {
			$('#no-bpjs').parent().parent().addClass('hide')
			$('#penjamin-lainnya').parent().parent().addClass('hide')
			$('#nama-pasien').val('').parent().parent().addClass('hide')
			$('#tgl-lahir-pasien').val('').parent().parent().addClass('hide')
			$('#telp').val('').parent().parent().addClass('hide')
			$('#etnis').val('').parent().parent().addClass('hide')
			$('#no-identitas').prop('disabled', true).removeAttr('maxlength').val('')
			$('#btn-cek-data, #btn-cek-data-numpad, #warning-alert-pasien').show()
			$('#btn-process, #btn-process-numpad').hide()
			$('#btn-reset-user-input, #btn-reset-user-input-numpad').hide()
			// $('#no-tanggal-lahir').prop("disabled", true).val('');
			$('#disabilitas').prop('checked', false).parent().parent().parent().addClass('hide')
			$('#is-kontrol-rawat-inap').prop('checked', false).parent().parent().parent().addClass('hide')
			$('#imp-rawat-inap').addClass('hide')
			$('#hamkom').val('').parent().parent().addClass('hide')
			$('#hamkom-lainnya').val('').parent().parent().addClass('hide')

			$('#disabilitas').prop('disabled', true).prop('checked', false)
			$('#is-kontrol-rawat-inap').prop('disabled', true).prop('checked', false)
			$('#hamkom').val($('#hamkom option:first').val()).parent().parent().addClass('hide')
			$('#hamkom-lainnya').val('').parent().parent().addClass('hide')

			if ($(this).attr('id') === 'tunai' && $(this).is(':checked')) {
				$('#penjamin').val('tunai')
				$('.checkbox-identitas').prop('disabled', false).prop('checked', false)
			} else if ($(this).attr('id') === 'bpjs' && $(this).is(':checked')) {
				$('#penjamin').val('bpjs')
				$('.checkbox-identitas').prop('disabled', false).prop('checked', false)
			} else if ($(this).attr('id') === 'lainnya' && $(this).is(':checked')) {
				$('#penjamin').val('lainnya')
				$('#penjamin-lainnya').parent().parent().removeClass('hide')
				$('.checkbox-identitas').prop('disabled', false).prop('checked', false)
			} else {
				$('#penjamin').val('')
				$('.checkbox-identitas').prop('disabled', true).prop('checked', false)
			}
		})

		$('.checkbox-identitas').on('change', function() {
			$('#no-bpjs').val('').parent().parent().addClass('hide')
			const noIdentitas = $('#no-identitas').val('')
			// const tglLahir = $('#no-tanggal-lahir').val('');
			noIdentitas.ForceNumericOnly().val('')
			$('#nama-pasien').val('').parent().parent().addClass('hide')
			$('#tgl-lahir-pasien').val('').parent().parent().addClass('hide')
			$('#telp').val('').parent().parent().addClass('hide')
			$('#etnis').val('').parent().parent().addClass('hide')
			$('#btn-cek-data, #btn-cek-data-numpad, #warning-alert-pasien').show()
			$('#btn-process, #btn-process-numpad').hide()
			$('#btn-reset-user-input, #btn-reset-user-input-numpad').hide()
			$('#disabilitas').prop('checked', false).parent().parent().parent().addClass('hide')
			$('#imp-rawat-inap').addClass('hide')
			$('#is-kontrol-rawat-inap').prop('checked', false).parent().parent().parent().addClass('hide')
			$('#hamkom').val('').parent().parent().addClass('hide')
			$('#hamkom-lainnya').val('').parent().parent().addClass('hide')

			if ($(this).is(':checked')) {
				$('#disabilitas').prop('disabled', false)
				$('#imp-rawat-inap').addClass('hide')
				$('#is-kontrol-rawat-inap').prop('disabled', false)
			} else {
				$('#disabilitas').prop('disabled', true).prop('checked', false)
				$('#imp-rawat-inap').addClass('hide')
				$('#is-kontrol-rawat-inap').prop('disabled', true).prop('checked', false)
				$('#hamkom').val($('#hamkom option:first').val()).parent().parent().addClass('hide')
				$('#hamkom-lainnya').val('').parent().parent().addClass('hide')
			}

			if ($(this).attr('id') === 'no-rm' && $(this).is(':checked')) {
				$('#jenis-identitas').val('no_rm')
				noIdentitas.prop('disabled', false).attr('maxlength', 8)
				$('#no-identitas').focus();
				// tglLahir.prop("disabled", false).val('');
			} else if ($(this).attr('id') === 'nik' && $(this).is(':checked')) {
				$('#jenis-identitas').val('nik')
				noIdentitas.prop('disabled', false).attr('maxlength', 16)
				// tglLahir.prop("disabled", false);
			} else {
				$('#jenis-identitas').val('')
				noIdentitas.prop('disabled', true).removeAttr('maxlength')
				// tglLahir.prop("disabled", true);
			}
		})

		$('#tanggal-booking, #tanggal-kontrol-baru, #tanggal-kontrol-edit').bind('keyup', function(event) {
			const key = event.keyCode || event.charCode
			if (key == 8 || key == 46) {
				return false
			}
			const strokes = $(this).val().length

			if (strokes === 2 || strokes === 5) {
				let thisVal = $(this).val()
				thisVal += '/'
				$(this).val(thisVal)
			}
			if (strokes >= 3 && strokes < 5) {
				const thisVal = $(this).val()
				if (thisVal.charAt(2) != '/') {
					const txt1 = thisVal.slice(0, 2) + '/' + thisVal.slice(2)
					$(this).val(txt1)
				}
			}
			if (strokes >= 6) {
				const thisVal = $(this).val()
				if (thisVal.charAt(5) != '/') {
					var txt2 = thisVal.slice(0, 5) + '/' + thisVal.slice(5)
					$(this).val(txt2)
				}
			}
		})

		// $('#no-tanggal-lahir').bind('keyup', function(event) {
		// 	const key = event.keyCode || event.charCode;
		// 	if (key == 8 || key == 46) return false;
		// 	const strokes = $(this).val().length;
		//
		// 	if (strokes === 2 || strokes === 5) {
		// 		let thisVal = $(this).val();
		// 		thisVal += '/';
		// 		$(this).val(thisVal);
		// 	}
		// 	if (strokes >= 3 && strokes < 5) {
		// 		const thisVal = $(this).val();
		// 		if (thisVal.charAt(2) != '/') {
		// 			const txt1 = thisVal.slice(0, 2) + "/" + thisVal.slice(2);
		// 			$(this).val(txt1);
		// 		}
		// 	}
		// 	if (strokes >= 6) {
		// 		const thisVal = $(this).val();
		// 		if (thisVal.charAt(5) != '/') {
		// 			var txt2 = thisVal.slice(0, 5) + "/" + thisVal.slice(5);
		// 			$(this).val(txt2);
		// 		}
		// 	}
		// });

		$('#btn-cek-data, #btn-cek-data-numpad').on('click', function() {
			if ($('#no-identitas').val() === '') {
				syams_validation($('#no-identitas'), 'No identitas tidak boleh kosong')
				return
			} else {
				syams_validation_remove($('#no-identitas'))
			}

			$.ajax({
				type: 'POST',
				url: '<?= base_url("booking_poliklinik/api/booking_poliklinik/indentitas") ?>',
				data: $('#form-tambah-booking').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					$('#nama-pasien').val(data.data.nama).parent().parent().removeClass('hide')
					$('#tgl-lahir-pasien').val(data.data.tanggal_lahir).parent().parent().removeClass('hide')
					$('#telp').val(data.data.telp).parent().parent().removeClass('hide')
					if(data.data.id_etnis === null && $('#bpjs').is(':checked')){
						$('#etnis').val(data.data.etnis).parent().parent().removeClass('hide')
					}
					$('#disabilitas').prop('checked', data.data.disabilitas !== '0').parent().parent().parent().removeClass('hide')
					if (data.data.hamkom !== null && data.data.hamkom !== '') {
						$('#hamkom').val(data.data.hamkom).parent().parent().removeClass('hide')
					}
					if (data.data.hamkom === 'Lain - lain') {
						$('#hamkom-lainnya').val(data.data.hamkom_lainnya).parent().parent().removeClass('hide')
					}

					if ($('#bpjs').is(':checked')) {
						if (data.data.no_polish.trim() !== '') {
							$('#no-bpjs').val(data.data.no_polish).prop('disabled', true).prop('readonly', true).parent().parent().removeClass('hide')
						} else {
							$('#no-bpjs').val('').prop('disabled', false).prop('readonly', false).parent().parent().removeClass('hide')
						}
					}

					// append list etnis ke elemet select etnis
					data.list_etnis?.forEach(function(item) {
						$('#etnis').append(`<option value="${item.id}">${item.nama}</option>`)
					})

					if(data.data.id_etnis !== null && $('#bpjs').is(':checked')){
						$('#etnis').val(data.data.id_etnis)

						if(data.data.id_etnis === 17){
							$('#etnis-lainnya').val(data.data.etnis_lainnya)
						}
					}

					$('#btn-cek-data, #btn-cek-data-numpad, #warning-alert-pasien').hide()
					$('#btn-process, #btn-process-numpad').show()
					$('#btn-reset-user-input, #btn-reset-user-input-numpad').show()
					$('#imp-rawat-inap').removeClass('hide')
					$('#is-kontrol-rawat-inap').parent().parent().parent().removeClass('hide')

					messageCustom(data.message, 'Success')
				},
				complete: function() {
					hideLoader()
				},
				error: function(e) {
					if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status !== 500) {
						swalAlert('warning', 'Warning!', e.responseJSON.message)
						return
					}

					if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status === 500) {
						swalAlert('error', 'Error!', e.responseJSON.message)
					}

					accessFailed(e.status)
				},
			})
		})

		$('#modal-tambah-booking').on('hidden.bs.modal', function() {
			// exitFullScreenBookingModal()
			resetField()
		})

		$('#btn-process, #btn-cek-rujukan, #btn-process-numpad').on('click', function() {
			if ($('#no-identitas').val() === '') {
				syams_validation($('#no-identitas'), 'No identitas tidak boleh kosong')
				return
			} else {
				syams_validation_remove($('#no-identitas'))
			}

			if ($('#bpjs').is(':checked') && $('#etnis').val() === '') {
				syams_validation($('#etnis'), 'Etnis tidak boleh kosong')
				return
			} else {
				syams_validation_remove($('#etnis'))
			}

			if ($('#etnis').val() === 17 && $('#etnis-lainnya').val() === '') {
				syams_validation($('#etnis-lainnya'), 'Etnis tidak boleh kosong')
				return
			} else {
				syams_validation_remove($('#etnis-lainnya'))
			}

			// if ($('#telp').val() === '') {
			// 	syams_validation($('#telp'), 'No Hp tidak boleh kosong')
			// 	return
			// } else {
			// 	syams_validation_remove($('#no-identitas'))
			// }

			// const regexNoHp = /^(\+62|62|0)8[1-9][0-9]{6,10}$/gm;
			// if(!regexNoHp.test($('#telp').val())){
			// 	syams_validation('#telp', 'Format No Telepon tidak valid');
			// 	$('#telp').focus();
			// 	return false;
			// }

			if ($('#lainnya').is(":checked") && $('#penjamin-lainnya').val() === null) {
				syams_validation($('#penjamin-lainnya'), 'Penjamin lainnya harus diisi jika memilih lainnya!')
				return
			} else {
				$('#penjamin-lainnya').focus();
				syams_validation_remove($('#penjamin-lainnya'))
			}

			// if ($('#no-tanggal-lahir').val() === '') {
			// 	syams_validation($('#no-tanggal-lahir'), 'Tanggal lahir harus diisi');
			// 	return;
			// } else {
			// 	syams_validation_remove($('#no-tanggal-lahir'))
			// }
			//
			// if (!validasiTanggal($('#no-tanggal-lahir'))) return;

			// if ($('#disabilitas').is(':checked') && !$('#hamkom').val()) {
			// 	syams_validation($('#hamkom'), 'Hambatan harus diisi')
			// 	return
			// } else {
			// 	syams_validation_remove($('#hamkom'))
			// }

			$.ajax({
				type: 'POST',
				url: '<?= base_url("booking_poliklinik/api/booking_poliklinik/check_identitas") ?>',
				data: $('#form-tambah-booking').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {

					let dataBooking = {}

					if ($('#data-booking').val() !== '') {
						dataBooking = JSON.parse($('#data-booking').val())
					}

					$('#tanggal-booking').val('<?= date('d/m/Y') ?>')

					const newDataBooking = {
						...dataBooking,
						umur_pasien: parseInt(data.data.umur_pasien),
						disabilitas: parseInt(data.data.disabilitas),
						is_bpjs: $('#bpjs').is(':checked'),
						nik: data.data.no_identitas,
						no_hp: data.data.telp,
						no_rm: data.data.id,
						tanggal_lahir: data.data.tanggal_lahir,
						is_kontrol_pasca_ranap: data.is_kontrol_rawat_inap ? 1 : 0,
						penjamin_lainnya: $('#penjamin-lainnya').val(),
					}

					if ($('#bpjs').is(':checked')) {
						if (data.data.no_polis !== '') {
							newDataBooking.no_kartu = data.data.no_polish
							$('#no-bpjs').val(data.data.no_polish).prop('disabled', true).prop('readonly', true).parent().parent().removeClass('hide')
						} else {
							$('#no-bpjs').val('').prop('disabled', false).prop('readonly', false).parent().parent().removeClass('hide')
						}

						if (data.is_rs == 1) {
							newDataBooking.jenis_kunjungan = 4
						}

						$('#data-booking').val(JSON.stringify(newDataBooking))

						if (data.list_rujukan === null) {
							$('#btn-cek-rujukan').removeClass('hide')
							$('#btn-cek-data, #btn-cek-data-numpad, #warning-alert-pasien').addClass('hide')

							return
						}

						$('#no-bpjs2').val(data.data.no_polish)

						if (data.is_kontrol_rawat_inap) {
							checkSPRI(data.data.id, data.data.no_polish);
							return;
						}

						if (data.list_rujukan.length <= 1) {
							pilihRujukan(data.list_rujukan[0].noKunjungan, data.data.id, data.list_rujukan[0])
							return
						}

						$('#modal-list-rujukan').modal('show')
						$('#modal-list-rujukan-label').html('List Rujukan Pasien')
						$('#table-list-rujukan tbody').empty()

						let html = ''
						$.each(data.list_rujukan, function(index, value) {
							html += `<tr>
								<td>${index + 1}</td>
								<td>${value.noKunjungan}</td>
								<td>${value.poliRujukan.nama}</td>
								<td>
									<button type="button" class="btn btn-info waves-effect btn-pilih-rujukan" data="${value.noKunjungan}">Pilih</button>
								</td>
							</tr>`
						})
						$('#table-list-rujukan tbody').append(html)

						handlePilihRujukan(data.list_rujukan, data.data.id)
					} else {
						$('#data-booking').val(JSON.stringify(newDataBooking))

						$('#modal-input-manual-pasien-umum').modal('show')
						$('#modal-input-manual-pasien-umum-label').html('Form Input Data Booking')

						$('#tanggal-booking').datepicker({
							format: 'dd/mm/yyyy',
							beforeShowDay: function(date) {
								const year = date.toLocaleString('default', {
									year: 'numeric',
								})
								const month = date.toLocaleString('default', {
									month: '2-digit',
								})
								const day = date.toLocaleString('default', {
									day: '2-digit',
								})
								const ymd = year + '-' + month + '-' + day

								if (!data.jadwal_dokter.includes(getWaktuPendaftaranForDatePicker())) {
									data.jadwal_dokter.push(getWaktuPendaftaranForDatePicker())
								}

								if ($.inArray(ymd, data.jadwal_dokter) !== -1) {
									return {
										enabled: true,
									}
								} else {
									return {
										enabled: false,
									}
								}
							},
							daysOfWeekDisabled: [0],
						}).on('changeDate', function() {
							$(this).datepicker('hide')

							$('#dokter').html('<option>Pilih Dokter</option>')
						})

					}

					messageCustom(data.message, 'Success')
				},
				complete: function() {
					hideLoader()
				},
				error: function(e) {
					if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status !== 500) {
						swalAlert('warning', 'Warning!', e.responseJSON.message)
						return
					}

					if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status === 500) {
						swalAlert('error', 'Error!', e.responseJSON.message)
					}

					accessFailed(e.status)
				},
			})
		})

		$('#layanan_auto, #poli-tujuan-edit').select2({
			width: '100%',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function(data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function(data) {
				var kode = ''
				if (data.kode !== '') {
					kode = '<b>' + data.kode + '</b> - '
				}
				var markup = kode + data.nama
				return markup
			},
			formatSelection: function(data) {
				$('#kode-poli').val(data.kode_bpjs)

				if (!validasiTanggal($('#tanggal-booking'))) {
					return data.nama
				}

				getDokterSpesialis(data.id, $('#tanggal-booking').val(), $('#dokter'))
				return data.nama
			},
		})

		$('#poli-tujuan-edit').select2({
			width: '100%',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function(data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function(data) {
				var kode = ''
				if (data.kode !== '') {
					kode = '<b>' + data.kode + '</b> - '
				}
				var markup = kode + data.nama
				return markup
			},
			formatSelection: function(data) {
				$('#kode-poli').val(data.kode_bpjs)

				if (!validasiTanggal($('#tanggal-kontrol-edit'))) {
					return data.nama
				}

				getDokterSpesialis(data.id, $('#tanggal-kontrol-edit').val(), $('#dokter-input-kontrol-edit'))
				return data.nama
			},
		})

		$('#poli-asal-edit').select2({
			width: '100%',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function(data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function(data) {
				var kode = ''
				if (data.kode !== '') {
					kode = '<b>' + data.kode + '</b> - '
				}
				var markup = kode + data.nama
				return markup
			},
			formatSelection: function(data) {
				$('#kode-poli').val(data.kode_bpjs)
				return data.nama
			},
		})

		$('#btn-data-salah').on('click', function() {
			swalAlert('info', 'INGFO', 'Silahkan menuju Admin untuk melakukan perubahan data yang salah')
		})

		$('#simpan-input-manual-booking').on('click', function() {

			let usia
			let kebutuhan = 'Tidak'
			let tanggalBooking = date2mysql($('#tanggal-booking').val())

			const dataBooking = JSON.parse($('#data-booking').val())

			if (dataBooking.umur_pasien >= 60) {
				usia = 'Prioritas'
			} else if (dataBooking.is_bpjs || dataBooking.penjamin_lainnya) {
				usia = 'BPJS'
			} else {
				usia = 'Tunai'
			}

			if (dataBooking.disabilitas === 1) {
				kebutuhan = 'Ya'
			}

			cekAntrianBPJS(usia, kebutuhan, tanggalBooking)
		})

		$('#btn-data-benar').on('click', function() {

			if ($('#dokter-input-kontrol').val() === '') {
				syams_validation($('#dokter-input-kontrol'), 'Dokter wajib dipilih sebelum konfirmasi data benar')
				return false
			} else {
				syams_validation_remove($('#dokter-input-kontrol'))
			}

			dataBenar(date2mysql($('#tanggal-kontrol').val()));
		})

		$('#btn-data-benar-spri').on('click', function() {
			if ($('#dokter-input-kontrol-spri').val() === '') {
				syams_validation($('#dokter-input-kontrol-spri'), 'Dokter wajib dipilih sebelum konfirmasi data benar')
				return false
			} else {
				syams_validation_remove($('#dokter-input-kontrol-spri'))
			}

			dataBenar(date2mysql($('#tanggal-kontrol-spri').val()));
		})

		$('#simpan-input-kontrol-baru').on('click', function() {

			if ($('#dokter-input-kontrol-baru').val() === '') {
				syams_validation($('#dokter-input-kontrol-baru'), 'Dokter wajib dipilih sebelum konfirmasi data benar')
				return false
			} else {
				syams_validation_remove($('#dokter-input-kontrol-baru'))
			}

			dataBenar(date2mysql($('#tanggal-kontrol-baru').val()))
			// getTanggalKontrol(date2mysql($('#tanggal-kontrol-baru').val()))
		})

		$('#simpan-edit-kontrol').on('click', function() {

			if ($('#dokter-input-kontrol-edit').val() === '') {
				syams_validation($('#dokter-input-kontrol-edit'), 'Dokter wajib dipilih sebelum konfirmasi data benar')
				return false
			} else {
				syams_validation_remove($('#dokter-input-kontrol-edit'))
			}

			dataBenar(date2mysql($('#tanggal-kontrol-edit').val()), true)
		})

		$('#dokter, #dokter-input-kontrol, #dokter-input-kontrol-spri, #dokter-input-kontrol-baru, #dokter-input-kontrol-edit').on('change', function() {
			const value = JSON.parse($(this).val())
			let dataBooking = {}

			if ($('#data-booking').val() !== '') {
				dataBooking = JSON.parse($('#data-booking').val())
			}

			const newDataBooking = {
				...dataBooking,
				id_jadwal_dokter: value.id,
				id_dokter: value.id_dokter,
				id_poli: value.id_poli,
				kode_bpjs_dokter: value.kode_bpjs_dokter,
				kode_bpjs_poli: value.kode_bpjs_poli,
				nama_dokter: value.nama_dokter,
			}
			$('#data-booking').val(JSON.stringify(newDataBooking))
		})

		$('#dokter-input-kontrol-edit').on('change', function() {
			const value = JSON.parse($(this).val())

			checkJmlPasienBooking(date2mysql($('#tanggal-kontrol-edit').val()), $('#poli-tujuan-edit').val(), value.id_dokter)
		})

		numpad()
	})

	function handlePilihRujukan(listRujukan, noRm) {
		$('.btn-pilih-rujukan').on('click', function() {
			const noRujukan = $(this).attr('data')
			const rujukan = listRujukan.find((v) => v.noKunjungan === noRujukan)

			pilihRujukan(noRujukan, noRm, rujukan)
		})
	}

	function pilihRujukan(noRujukan, noRm, rujukan) {
		if (rujukan.peserta.statusPeserta.keterangan !== 'AKTIF') {
			swal.fire({
				title: 'Gagal',
				html: rujukan.peserta.statusPeserta.keterangan,
				icon: 'error',
				buttonsStyling: true,
				confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ok',
				allowOutsideClick: false,
			})
			return false
		}
		let dataBooking = {}

		if ($('#data-booking').val() !== '') {
			dataBooking = JSON.parse($('#data-booking').val())
		}

		const newDataBooking = {
			...dataBooking,
			no_ref: noRujukan,
			kadaluarsa_rujukan: rujukan.tanggalKadaluarsaRujukan,
			asal_faskes: rujukan.provPerujuk?.nama,
			kode_bpjs_poli_rujukan: rujukan.poliRujukan?.kode,
		}

		$('#data-booking').val(JSON.stringify(newDataBooking))

		$.ajax({
			type: 'POST',
			url: '<?= base_url("booking_poliklinik/api/booking_poliklinik/pilih_rujukan") ?>',
			data: {
				no_bpjs: $('#no-bpjs2').val(),
				no_rujukuan: noRujukan,
				no_rm: noRm,
				kode_poli: rujukan.poliRujukan.kode,
				tgl_kadaluarsa_rujukan: rujukan.tanggalKadaluarsaRujukan,
			},
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				messageCustom(data.message, 'Success')

				let dataBooking = {}

				if ($('#data-booking').val() !== '') {
					dataBooking = JSON.parse($('#data-booking').val())
				}

				let newDataBooking = {}

				if (data.rujukan_awal === 1) {

					$('#modal-input-kontrol-baru').modal('show')
					$('#modal-input-kontrol-baru-label').html('Form Input Kontrol Baru')

					$('#poli-tujuan-baru').val(rujukan.poliRujukan.nama)
					$('#code-bpjs-poli').val(rujukan.poliRujukan.kode)
					$('#tanggal-kontrol-baru').val('<?= date("d/m/Y") ?>')

					$('#tanggal-kontrol-baru').datepicker({
						format: 'dd/mm/yyyy',
						beforeShowDay: function(date) {
							const year = date.toLocaleString('default', {
								year: 'numeric',
							})
							const month = date.toLocaleString('default', {
								month: '2-digit',
							})
							const day = date.toLocaleString('default', {
								day: '2-digit',
							})
							const ymd = year + '-' + month + '-' + day

							if (!data.jadwal_dokter.includes(getWaktuPendaftaranForDatePicker())) {
								data.jadwal_dokter.push(getWaktuPendaftaranForDatePicker())
							}

							if ($.inArray(ymd, data.jadwal_dokter) !== -1) {
								return {
									enabled: true,
								}
							} else {
								return {
									enabled: false,
								}
							}
						},
						daysOfWeekDisabled: [0],
					}).on('changeDate', function() {
						$(this).datepicker('hide')

						if (!validasiTanggal($(this))) {
							return
						}
						getDokterSpesialis(rujukan.poliRujukan.kode, $(this).val(), $('#dokter-input-kontrol-baru'))
					})

					let html = ''
					if (data.list_dokter.length > 1) {
						html = `<option value=''>-- Pilih Dokter --</option>`
					}

					let dataDokter = {}

					if (data.list_dokter.length > 0 && data.list_dokter.length < 2) {
						let dataBooking = {}

						if ($('#data-booking').val() !== '') {
							dataBooking = JSON.parse($('#data-booking').val())
						}

						dataDokter = {
							id_jadwal_dokter: data.list_dokter[0].id,
							id_dokter: data.list_dokter[0].id_dokter,
							id_poli: data.list_dokter[0].id_poli,
							kode_bpjs_dokter: data.list_dokter[0].kode_bpjs_dokter,
							kode_bpjs_poli: data.list_dokter[0].kode_bpjs_poli,
							nama_dokter: data.list_dokter[0].nama_dokter,
						}
					}

					$.each(data.list_dokter, function(i, v) {
						html += `<option value='${JSON.stringify(v)}' ${parseInt(v.kuota) - parseInt(v.jml_kunjung) <= 0 
							? 'disabled'
							: ''}> ${v.shift_poli} - ${v.nama_dokter} - ${v.nama_poli}  ( ${v.jml_kunjung} / ${v.kuota} )</option>`
					})

					$('#dokter-input-kontrol-baru').html(html)

					newDataBooking = {
						...dataBooking,
						...dataDokter,
						rujukan_awal: data.rujukan_awal,
						kode_poli_rujukan: rujukan.poliRujukan.kode,
					}

					if (newDataBooking.jenis_kunjungan !== 4) {
						newDataBooking.jenis_kunjungan = 1
					}

					$('#data-booking').val(JSON.stringify(newDataBooking))
				} else {
					newDataBooking = {
						...dataBooking,
						rujukan_awal: data.rujukan_awal,
						kode_poli_rujukan: rujukan.poliRujukan.kode,
					}

					if (newDataBooking.jenis_kunjungan !== 4) {
						newDataBooking.jenis_kunjungan = 3
					}

					if (data.skd.length <= 1) {
						$('#data-booking').val(JSON.stringify(newDataBooking))
						pilihSKD(data.skd[0], data, rujukan)
						return
					}

					$('#table-list-skd tbody').empty()
					$('#modal-list-skd').modal('show')
					$('#modal-list-skd-label').html('List Surat Keterangan Kontrol')

					let html = ''
					const userAccount = '<?= $this->session->userdata('account_group') ?>'

					$.each(data.skd, function(index, value) {
						let button = ''
						let status = ''
						if ((value.is_expired == 1 || value.is_batal == 1) && (userAccount === 'Admin' || userAccount === 'Pendaftaran')) {
							button = `<button type="button" class="btn btn-outline-danger waves-effect btn-edit-skd" data='${JSON.stringify(value)}'>Edit</button>`
						} else if (value.is_expired != 1 && value.is_booking == 1 && value.is_can_apm == 1 && value.is_batal != 1) {
							button = `<button type="button" class="btn btn-secondary waves-effect" onclick="handleCetakAntrian(${value.id_antrian})"><i class="fas fa-print mr-1"></i>Cetak</button>`
						} else if (value.is_expired != 1 && value.is_booking != 1 && value.is_can_apm == 1 && value.is_batal != 1) {
							button = `<button type="button" class="btn btn-info waves-effect btn-pilih-skd" data='${JSON.stringify(value)}'>Pilih</button>`
						} else if (value.is_expired == 1 && (userAccount === 'Admin' || userAccount === 'Pendaftaran')) {
							button = `<button type="button" class="btn btn-danger waves-effect btn-alert-edit-skd">Edit</button>`
						} else {
							button = '-'
						}

						if (value.is_expired == 1) {
							status = '<span class="badge badge-danger" style="padding: .3rem;font-size: inherit;">Kadaluarsa</span>'
						} else if (value.is_expired != 1 && value.is_booking != 1 && value.is_can_apm == 1 && value.is_batal != 1) {
							status = '<span class="badge badge-success" style="padding: .3rem;font-size: inherit;">Aktif</span>'
						} else if (value.is_booking == 1 && value.is_can_apm == 1 && value.is_batal != 1) {
							status = '<span class="badge badge-warning" style="padding: .3rem;font-size: inherit;">Booking</span>'
						} else if (value.is_can_apm != 1) {
							status = `<span class="badge badge-info" style="padding: .3rem;font-size: inherit;">Booking ${value.lokasi_data ? value.lokasi_data.toUpperCase() : 'Selain APM'}</span>`
						} else if (value.is_batal == 1) {
							status = `<span class="badge badge-danger" style="padding: .3rem;font-size: inherit;">Batal</span>`
						}

						html += `<tr>
								<td>${index + 1}</td>
								<td>${value.poli_tujuan}</td>
								<td>${value.nama_dokter !== null ? value.nama_dokter : '-'}</td>
								<td>${datefmysql(value.tanggal)}</td>
								<td>${status}</td>
								<td>${button}</td>
							</tr>`
					})
					$('#table-list-skd tbody').append(html)

					$('.btn-edit-skd').on('click', function() {
						const data = JSON.parse($(this).attr('data'))

						let dataBooking = {}

						if ($('#data-booking').val() !== '') {
							dataBooking = JSON.parse($('#data-booking').val())
						}

						const newDataBooking = {
							...dataBooking,
							id_skd: data.id,
							id_poli_asal: data.id_spesialisasi_asal,
							tanggal_periksa: data.tanggal,
						}

						$('#data-booking').val(JSON.stringify(newDataBooking))

						handleDataSalahAdmin(data)
					})

					$('.btn-alert-edit-skd').on('click', function() {
						swalAlert('info', 'Info!', 'Silahkan menuju admin atau ns untuk melakukan edit data!')
					})

					handlePilihSuratKontrolDokter(data, rujukan)
				}

				$('#data-booking').val(JSON.stringify(newDataBooking))
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined) {
					swalAlert('warning', 'Warning!', e.responseJSON.message)
					return
				}
				accessFailed(e.status)
			},
		})
	}

	function handlePilihSuratKontrolDokter(data, rujukan) {
		$('.btn-pilih-skd').on('click', function() {
			const skd = JSON.parse($(this).attr('data'))

			// swal.fire({
			// 	title: 'Konfirmasi Pilhan',
			// 	html: 'Apakah anda yakin memilih Surat Kontrol ini?',
			// 	icon: 'question',
			// 	showCancelButton: true,
			// 	buttonsStyling: true,
			// 	confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			// 	cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			// 	reverseButtons: true,
			// 	allowOutsideClick: false,
			// }).then((result) => {
			// 	if (!result.value) {
			// 		return
			// 	}

			pilihSKD(skd, data, rujukan)
			// })
		})
	}

	function pilihSKD(skd, data, rujukan = false) {
		if (skd.is_booking == 1) {
			handleCetakAntrian(skd.id_antrian)
			resetField()
			return
		}

		let kodePoliRujukan = null;
		if (rujukan) {
			kodePoliRujukan = rujukan.poliRujukan.kode;
		}

		let dataBooking = {}

		if ($('#data-booking').val() !== '') {
			dataBooking = JSON.parse($('#data-booking').val())
		}

		let newDataBooking = {}

		$('#tanggal-kontrol').val(datefmysql(skd.tanggal))
		$('#poli-asal').val(skd.poli_asal)
		$('#poli-tujuan').val(skd.poli_tujuan)

		let html = ''
		let newNewDataBooking = {}
		$('#dokter-input-kontrol').prop('disabled', false)

		if (skd.id_dokter_tujuan !== null && skd.dokter_tujuan !== null) {
			newNewDataBooking = {
				id_jadwal_dokter: skd.dokter_tujuan.id,
				id_dokter: skd.dokter_tujuan.id_dokter,
				id_poli: skd.dokter_tujuan.id_poli,
				kode_bpjs_dokter: skd.dokter_tujuan.kode_bpjs_dokter,
				kode_bpjs_poli: skd.dokter_tujuan.kode_bpjs_poli,
				nama_dokter: skd.dokter_tujuan.nama_dokter,
				time_end: skd.dokter_tujuan.time_end,
				time_start: skd.dokter_tujuan.time_start,
			}

			html += `<option value='${JSON.stringify(
				skd.dokter_tujuan)}' selected><b>${skd.dokter_tujuan.nama_dokter}</b> - <small>${skd.dokter_tujuan.nama_poli} ( ${skd.dokter_tujuan.jml_kunjung} / ${skd.dokter_tujuan.kuota} )</small></option>`
			$('#dokter-input-kontrol').prop('disabled', true)
		} else {
			if (skd.list_dokter.length > 1) {
				html += '<option value="">Pilih Dokter</option>'
			}
			if (skd.list_dokter.length > 0 && skd.list_dokter.length < 2) {
				newNewDataBooking = {
					id_jadwal_dokter: skd.list_dokter[0].id,
					id_dokter: skd.list_dokter[0].id_dokter,
					id_poli: skd.list_dokter[0].id_poli,
					kode_bpjs_dokter: skd.list_dokter[0].kode_bpjs_dokter,
					kode_bpjs_poli: skd.list_dokter[0].kode_bpjs_poli,
					nama_dokter: skd.list_dokter[0].nama_dokter,
				}
			}
			$.each(skd.list_dokter, function(i, v) {
				html += `<option value='${JSON.stringify(v)}'<b> ${v.nama_dokter} </b> - <small> ${v.nama_poli}  ( ${v.jml_kunjung} / ${v.kuota} )</small></option>`
			})
		}

		$('#dokter-input-kontrol').html(html)

		newDataBooking = {
			...dataBooking,
			...newNewDataBooking,
			rujukan_awal: data.rujukan_awal,
			no_sep_asal: data.rujukan[0].noSep,
			id_skd: skd.id,
			id_poli_asal: skd.id_spesialisasi_asal,
			tanggal_periksa: skd.tanggal,
			kode_poli_rujukan: kodePoliRujukan,
			no_rujukan_skk: skd.no_rujukan_skk,
		}

		$('#btn-data-salah-admin').on('click', function() {
			handleDataSalahAdmin(skd)
		})

		$('#data-booking').val(JSON.stringify(newDataBooking))

		if (skd.id_dokter_tujuan !== null && skd.dokter_tujuan !== null) {
			const date = new Date(skd.tanggal)
			const bulan = [
				'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
				'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
			]
			const tanggal = date.getDate() + ' ' + bulan[date.getMonth()] + ' ' + date.getFullYear()

			swal.fire({
				title: 'Konfirmasi Pilihan',
				html: `Apakah anda yakin memilih Surat Kontrol ini? <br> Tanggal Kontrol: <b>${tanggal}</b> <br> Klinik Tujuan: <b>${skd.poli_tujuan}, ${skd.dokter_tujuan.shift_poli} ${skd.dokter_tujuan.time_start.split(':').slice(0, 2).join(":")} - ${skd.dokter_tujuan.time_end.split(':').slice(0, 2).join(":")}</b> <br> Dokter Tujuan: <b>${skd.dokter_tujuan.nama_dokter}</b>`,
				icon: 'info',
				showCancelButton: true,
				buttonsStyling: true,
				confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
				cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
				reverseButtons: true,
				allowOutsideClick: false,
			}).then((result) => {
				if (!result.value) {
					return
				}

				dataBenar(skd.tanggal)
			})
		} else {
			$('#modal-input-kontrol').modal('show')
			$('#modal-input-kontrol-label').html('Form Input Kontrol')
		}
	}

	function updateSKD(usia, kebutuhan, tanggalBooking) {
		const dataBooking = JSON.parse($('#data-booking').val())
		$.ajax({
			type: 'PUT',
			url: '<?= base_url("booking_poliklinik/api/booking_poliklinik/update_skd") ?>',
			data: {
				id: dataBooking.id_skd,
				tanggal_kontrol: date2mysql($('#tanggal-kontrol-edit, #tanggal-kontrol-baru').val()),
				poli_tujuan: $('#poli-tujuan-edit').val(),
				id_dokter_tujuan: dataBooking.id_dokter,
			},
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (!data.status) {
					return
				}
				cekAntrianBPJS(usia, kebutuhan, tanggalBooking)
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined) {
					swalAlert('warning', 'Warning!', e.responseJSON.message)
					return
				}
				accessFailed(e.status)
			},
		})
	}

	function handleDataSalahAdmin(skd) {
		$('#tanggal-kontrol-edit').datepicker({
			format: 'dd/mm/yyyy',
			beforeShowDay: function(date) {
				const year = date.toLocaleString('default', {
					year: 'numeric',
				})
				const month = date.toLocaleString('default', {
					month: '2-digit',
				})
				const day = date.toLocaleString('default', {
					day: '2-digit',
				})
				const ymd = year + '-' + month + '-' + day

				if (!skd.jadwal_dokter.includes(getWaktuPendaftaranForDatePicker())) {
					skd.jadwal_dokter.push(getWaktuPendaftaranForDatePicker())
				}

				if ($.inArray(ymd, skd.jadwal_dokter) !== -1) {
					return {
						enabled: true,
					}
				} else {
					return {
						enabled: false,
					}
				}
			},
			daysOfWeekDisabled: [0],
		}).on('changeDate', function() {
			$(this).datepicker('hide')

			$('#dokter-input-kontrol-edit').html('<option>Pilih Dokter</option>')
		})

		$('#modal-input-kontrol-edit').modal('show')
		$('#modal-input-kontrol-edit-label').html('Form Edit Input Kontrol')

		$('#tanggal-kontrol-edit').val(datefmysql(skd.tanggal))
		$('#s2id_poli-asal-edit a .select2-chosen').html(skd.poli_asal)
		$('#poli-asal-edit').val(skd.id_spesialisasi)
		$('#s2id_poli-tujuan-edit a .select2-chosen').html(skd.poli_tujuan)
		$('#poli-tujuan-edit').val(skd.id_spesialisasi_asal)

		let html = ''

		if (skd.list_dokter === undefined) {
			html += '<option value="' + skd.list_dokter.id_dokter + '"><b>' + skd.list_dokter.nama_dokter + '</b> - <small>' + skd.list_dokter.nama_poli + ' (' + skd.list_dokter.jml_kunjung + '/' +
				skd.list_dokter.kuota + ')</small></option>'
		} else {
			if (skd.list_dokter.length > 1) {
				html += '<option value="">Pilih Dokter</option>'
			} else {
				let dataBooking = {}

				if ($('#data-booking').val() !== '') {
					dataBooking = JSON.parse($('#data-booking').val())
				}

				const newDataBooking = {
					...dataBooking,
					id_jadwal_dokter: skd.list_dokter[0].id,
					id_dokter: skd.list_dokter[0].id_dokter,
					id_poli: skd.list_dokter[0].id_poli,
					kode_bpjs_dokter: skd.list_dokter[0].kode_bpjs_dokter,
					kode_bpjs_poli: skd.list_dokter[0].kode_bpjs_poli,
					nama_dokter: skd.list_dokter[0].nama_dokter,
				}
				$('#data-booking').val(JSON.stringify(newDataBooking))
			}
			$.each(skd.list_dokter, function(i, v) {
				html += `<option value='${JSON.stringify(v)}'><b>${v.nama_dokter}</b> - <small>${v.nama_poli} (${v.jml_kunjung}/${v.kuota})</small></option>`
			})
		}

		let dataBooking = {}

		if ($('#data-booking').val() !== '') {
			dataBooking = JSON.parse($('#data-booking').val())
		}

		let newDataBooking = {
			...dataBooking,
			id_poli_asal: skd.id_spesialisasi_asal,
		}

		$('#data-booking').val(JSON.stringify(newDataBooking))

		$('#dokter-input-kontrol-edit').html(html)

		checkJmlPasienBooking(skd.tanggal, skd.id_spesialisasi, skd.id_dokter_tujuan)
	}

	function checkJmlPasienBooking(tanggal, id_poli, id_dokter) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("booking_poliklinik/api/booking_poliklinik/check_jumlah_pasien_booking") ?>',
			data: {
				tanggal,
				id_poli,
				id_dokter,
			},
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (!data.status) {
					return
				}
				$('#jml-pasien-booking').html(data.pasien_booking)
				$('#jml-pasien-booking-pending').html(data.pasien_booking_pending)
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined) {
					swalAlert('warning', 'Warning!', e.responseJSON.message)
					return
				}
				accessFailed(e.status)
			},
		})
	}

	function getWaktuPendaftaranForDatePicker() {
		if (new Date().toLocaleDateString('id-ID', {
				weekday: 'long',
			}) === 'Jumat' &&
			new Date().toLocaleTimeString('default', {
				hour12: false,
				hour: '2-digit',
				minute: '2-digit',
			}) > '17:00') {
			const date = new Date()
			date.setDate(date.getDate() + 1)
			const year = date.toLocaleString('default', {
				year: 'numeric',
			})
			const month = date.toLocaleString('default', {
				month: '2-digit',
			})
			const day = date.toLocaleString('default', {
				day: '2-digit',
			})
			return year + '-' + month + '-' + day
		} else if (new Date().toLocaleTimeString('default', {
				hour12: false,
				hour: '2-digit',
				minute: '2-digit',
			}) > '17:00') {
			const date = new Date()
			date.setDate(date.getDate() + 1)
			const year = date.toLocaleString('default', {
				year: 'numeric',
			})
			const month = date.toLocaleString('default', {
				month: '2-digit',
			})
			const day = date.toLocaleString('default', {
				day: '2-digit',
			})
			return year + '-' + month + '-' + day
		} else {
			const date = new Date()
			const year = date.toLocaleString('default', {
				year: 'numeric',
			})
			const month = date.toLocaleString('default', {
				month: '2-digit',
			})
			const day = date.toLocaleString('default', {
				day: '2-digit',
			})
			return year + '-' + month + '-' + day
		}
	}

	function getDokterSpesialis(id_spesialisasi = null, tanggal = null, element_dokter) {
		$.ajax({
			url: '<?= base_url('booking_poliklinik/api/booking_poliklinik/get_dokter_spesialisasi') ?>',
			data: {
				id_spesialisasi,
				tanggal_booking: tanggal,
			},
			type: 'GET',
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				let html = ''

				if (data.length === undefined) {
					html += '<option value="' + data.id_dokter + '"><b>' + data.nama_dokter + '</b> - <small>' + data.nama_poli + ' (' + data.jml_kunjung + '/' + data.kuota + ')</small></option>'
				} else {
					if (data.length > 1) {
						html += '<option value="">Pilih Dokter</option>'
					} else {
						let dataBooking = {}

						if ($('#data-booking').val() !== '') {
							dataBooking = JSON.parse($('#data-booking').val())
						}

						const newDataBooking = {
							...dataBooking,
							id_jadwal_dokter: data[0].id,
							id_dokter: data[0].id_dokter,
							id_poli: data[0].id_poli,
							kode_bpjs_dokter: data[0].kode_bpjs_dokter,
							kode_bpjs_poli: data[0].kode_bpjs_poli,
							nama_dokter: data[0].nama_dokter,
						}
						$('#data-booking').val(JSON.stringify(newDataBooking))
					}
					$.each(data, function(i, v) {
						html += `<option value='${JSON.stringify(v)}' ${parseInt(v.kuota) - parseInt(v.jml_kunjung) === 0 ? 'disabled' : ''}> ${v.shift_poli} - ${v.nama_dokter} ( ${v.jml_kunjung} / ${v.kuota} )</option>`
					})
				}

				element_dokter.html(html)
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})
	}

	function validasiTanggal(element) {
		const tanggalLahir = element.val()

		if (!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(tanggalLahir)) {
			syams_validation(element, 'Format tanggal salah. Contoh format: tanggal/bulan/tahun = 26/02/1990')
			return false
		} else {
			syams_validation_remove(element)
		}

		if (tanggalLahir.length < 10) {
			syams_validation(element, 'Tanggal lahir tidak lengkap. Contoh format: tanggal/bulan/tahun = 26/02/1990')
			return false
		} else {
			syams_validation_remove(element)
		}

		const split = tanggalLahir.split('/')

		if (split.length < 3) {
			syams_validation(element, 'Tanggal lahir tidak lengkap. Contoh format: tanggal/bulan/tahun = 26/02/1990')
			return false
		} else {
			syams_validation_remove(element)
		}

		const tanggal = parseInt(split[0])
		const bulan = parseInt(split[1])
		const tahun = parseInt(split[2])

		if (tahun < 1000 || tahun > 3000) {
			syams_validation(element, 'Tahun tidak boleh kurang dari 1000 dan lebih dari 3000')
			return false
		} else {
			syams_validation_remove(element)
		}

		if (bulan <= 0 || bulan > 12) {
			syams_validation(element, 'Bulan tidak boleh kurang atau sama dengan 0 dan lebih dari 12')
			return false
		} else {
			syams_validation_remove(element)
		}

		const panjangBulan = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

		// Tahun kabisat
		if (tahun % 400 === 0 || (tahun % 100 !== 0 && tahun % 4 === 0)) {
			panjangBulan[1] = 29
		}

		if (tanggal <= 0 || tanggal > panjangBulan[bulan - 1]) {
			syams_validation(element, 'Tanggal tidak boleh kurang dari atau sama dengan 0 dan lebih dari 30, 31, 28 atau 29 di tahun kabisat')
			return false
		} else {
			syams_validation_remove(element)
		}

		return true
	}

	jQuery.fn.ForceNumericOnly = function() {
		return this.each(function() {
			$(this).keydown(function(e) {
				let key = e.charCode || e.keyCode || 0
				const ctrl = e.ctrlKey ? e.ctrlKey : ((key === 17))
				return (
					key === 8 ||
					key === 46 ||
					key === 9 ||
					key === 13 ||
					key === 110 ||
					(ctrl && 86) ||
					(ctrl && 67) ||
					(key >= 35 && key <= 40) ||
					(key >= 48 && key <= 57) ||
					(key >= 96 && key <= 105))
			})
		})
	}

	function cekAntrianBPJS(usia, kebutuhan, tanggal_periksa) {

		$.ajax({
			url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/cek_antrian_bpjs') ?>/usia/' + usia + '/kebutuhan/' + kebutuhan + '/tanggal_periksa/' + tanggal_periksa,
			type: 'GET',
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				let dataBooking = $('#data-booking').val();
				dataBooking = dataBooking !== '' ? JSON.parse(dataBooking) : {};
				const newDataBooking = {
					...dataBooking,
					...data.metaData.response,
					tanggal_periksa,
				}
				tambahAntrianBPJS(newDataBooking)

			},
			error: function(e) {
				accessFailed(e.status)
			},
		})

	}

	function tambahAntrianBPJS(data) {

		let antrian = data.urutan
		let hitung = (antrian * 120000) - 120000

		let waktuFull = data.tanggal_periksa + ' ' + '07' + ':' + '30' + ':' + '00'
		let konvWaktu = new Date(waktuFull).getTime()
		let hitungWaktu = konvWaktu + hitung

		konfirmasiTambahAntrian({
			...data,
			estimasi_antrian: hitungWaktu,
		})

	}

	function konfirmasiTambahAntrian(data) {
		$.ajax({
			type: 'POST',
			url: '<?= base_url('booking_poliklinik/api/booking_poliklinik/tambah_antrian') ?>',
			data,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(ress) {
				if (ress.is_print) {
					handleCetakAntrian(ress.id_antrian)
					Swal.fire({
						icon: 'success',
						title: 'Sukses!',
						html: "Silahkan ambiil bukti Booking anda",
						timer: 3000
					}).then((result) => {
						resetField()
						setTimeout(() => window.location.reload(), 100)
					})
					return
				}
				messageCustom(ress.message, 'Success')
				if(data.huruf_antrean !== 'I' && data.huruf_antrean !== 'D'){
					handleCetakAntrian(ress.id_antrian, ress.usia)
				}else{
					autoCheckIn(ress.id_antrian, ress.kode_booking);
				}
				Swal.fire({
					icon: 'success',
					title: 'Sukses!',
					html: "Silahkan ambiil bukti Booking anda",
					timer: 3000
				}).then((result) => {
					resetField()
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				if (typeof e.responseJSON !== 'undefined' && e.status !== 500) {
					swalAlert('warning', 'Warning!', e.responseJSON.message)
				}
				if (typeof e.responseJSON !== 'undefined' && e.status === 500) {
					swalAlert('error', 'Error', e.responseJSON.message)
				}
				accessFailed(e.status)
			},
		})

	}

	function checkSPRI(no_rm, no_polish) {
		$.ajax({
			url: '<?= base_url('booking_poliklinik/api/booking_poliklinik/check_spri') ?>',
			data: {
				no_rm,
				no_polish
			},
			type: 'GET',
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				const dataBooking = JSON.parse($('#data-booking').val())

				const newDataBooking = {
					...dataBooking,
					id_skd: data.skk.id,
					rujukan_awal: 1,
					id_dokter: data.skk.id_dokter_tujuan,
					id_poli: data.skk.id_spesialisasi,
					kode_bpjs_poli: data.skk.kode_bpjs_poli,
					kode_poli_rujukan: data.skk.kode_bpjs_poli,
					tanggal_periksa: data.skk.tanggal,
					jenis_kunjungan: 3,
					no_ref: data.no_ref
				}

				let newNewDataBooking = {}

				if (data.skk.jadwal_dokter !== null) {
					let usia
					let kebutuhan = 'Tidak'
					let tanggalBooking = data.skk.tanggal


					if (dataBooking.umur_pasien >= 60) {
						usia = 'Prioritas'
					} else if (dataBooking.is_bpjs) {
						usia = 'BPJS'
					} else {
						usia = 'Tunai'
					}

					if (dataBooking.disabilitas === 1) {
						kebutuhan = 'Ya'
					}

					newNewDataBooking = {
						...newDataBooking,
						id_jadwal_dokter: data.skk.jadwal_dokter.id,
						kode_bpjs_dokter: data.skk.jadwal_dokter.kode_bpjs_dokter,
						nama_dokter: data.skk.jadwal_dokter.nama_dokter,
					}


					cekAntrianBPJS(usia, kebutuhan, tanggalBooking)
				} else {
					newNewDataBooking = {
						...newDataBooking,
					}
					const elmDokter = $('#dokter-input-kontrol-spri')
					elmDokter.empty()
					$('#tanggal-kontrol-spri').val(datefmysql(data.skk.tanggal))
					$('#poli-tujuan-spri').val(data.skk.nama_poli)
					$('#modal-input-kontrol-spri-label').html('Input Kontrol SPRI')

					let html = '';
					if (data.skk.list_dokter.length > 1) {
						html += '<option value="">Pilih Dokter</option>'
					} else {
						let dataBooking = {}

						if ($('#data-booking').val() !== '') {
							dataBooking = JSON.parse($('#data-booking').val())
						}

						const newDataBooking = {
							...dataBooking,
							id_jadwal_dokter: data.skk.list_dokter[0].id,
							id_dokter: data.skk.list_dokter[0].id_dokter,
							id_poli: data.skk.list_dokter[0].id_poli,
							kode_bpjs_dokter: data.skk.list_dokter[0].kode_bpjs_dokter,
							kode_bpjs_poli: data.skk.list_dokter[0].kode_bpjs_poli,
							nama_dokter: data.skk.list_dokter[0].nama_dokter,
						}
						$('#data-booking').val(JSON.stringify(newDataBooking))
					}
					$.each(data.skk.list_dokter, function(i, v) {
						html += `<option value='${JSON.stringify(v)}' ${parseInt(v.kuota) - parseInt(v.jml_kunjung) === 0
								? 'disabled'
								: ''}><b> ${v.nama_dokter} </b> - <small> ${v.nama_poli}  ( ${v.jml_kunjung} / ${v.kuota} )</small></option>`
					})

					elmDokter.html(html);

					$('#modal-input-kontrol-spri').modal('show')
				}

				$('#data-booking').val(JSON.stringify(newNewDataBooking))
			},
			error: function(e) {
				if (typeof e.responseJSON !== 'undefined' && e.status !== 500) {
					swalAlert('warning', 'Warning!', e.responseJSON.message)
					return;
				}
				if (typeof e.responseJSON !== 'undefined' && e.status === 500) {
					swalAlert('error', 'Error', e.responseJSON.message)
					return;
				}
				accessFailed(e.status)
			},
		})
	}

	function getKodeBookingPasien() {

		$('#table-checkin-pasien tbody').empty()
		$('#label-data-pasien').html('Data Pasien : <b></b>')

		if ($('#input-kode').val() === '') {
			syams_validation('#input-kode', 'Silakan masukkan Kode Booking terlebih dahulu')
			$('#input-kode').focus()
			return false
		}

		const regex = /^(19|20)\d{2}(0[1-9]|1[012])(0[1-9]|[12]\d|3[01])[ABCH][0-9]{3}$/;
		if (regex.test($('#input-kode').val()) === false) {
			syams_validation('#input-kode', 'Format Kode Booking tidak sesuai')
			$('#input-kode').focus()
			return false
		} else {
			syams_validation_remove('#input-kode')
		}

		$.ajax({
			url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/list_booking_pasien') ?>',
			data: {
				input_kode: $('#input-kode').val()
			},
			type: 'GET',
			cache: false,
			dataType: 'JSON',
			success: function(data) {

				let checkIn = ''
				let cetakSEP = ''

				if (data !== 'Nodata') {

					if (data.no_rm !== null && data.no_rm !== '') {

						$('#label-data-pasien').html('Data Pasien : <b>' + data.no_rm + '/' + data.nik + '/' + data.nama + '/' + datefmysql(data.tgllahir) + '/' + data.alamat + '</b>')

						if (data.status === 'Booking') {

							checkIn = '<button type="button" class="btn btn-info btn-xxs" onclick="checkInPasien(' + data.id + ')"><i class="fas fa-sign m-r-5"></i>Check In</button>'
							cetakSEP = ''

							checkInPasien(data.id)

						} else if (data.status === 'Check In') {

							if (data.nosep !== null && data.nosep !== '') {

								if (data.id_pendaftaran !== null && data.id_pendaftaran !== '') {

									checkIn = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakKunjungan(' + data.id_pendaftaran + ')"><i class="fa fa-print"></i> Bukti Kunjungan</button>'

									cetakSEP = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakSEP(\'' + data.nosep + '\')"><i class="fa fa-print"></i>SEP</button>'

								} else {

									checkIn = '<button type="button" class="btn btn-secondary btn-xxs" onclick="daftarKunjungan(' + data.id + ', \'' + data.nosep + '\')"><i class="fa fa-print"></i> Daftar</button>'
									cetakSEP = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakSEP(\'' + data.nosep + '\')"><i class="fa fa-print"></i>SEP</button>'

								}

							} else {

								if (data.status_jkn === 'JKN') {

									checkIn = '<button type="button" class="btn btn-info btn-xxs" onclick="checkInPasien(' + data.id +
										')"><i class="fas fa-sign m-r-5"></i>Check In</button><button type="button" class="btn btn-secondary btn-xxs" onclick="cetakKunjungan(' + data.id_pendaftaran +
										')"><i class="fa fa-print"></i> Bukti Kunjungan</button>'
									cetakSEP = ''

								} else {

									checkIn = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakKunjungan(' + data.id_pendaftaran + ')"><i class="fa fa-print"></i> Bukti Kunjungan</button>'
									cetakSEP = ''

								}

							}

						} else {

							checkIn = ''
							cetakSEP = ''

						}

						if (data.status === 'Check In' || data.status === 'Batal') {
							let html = '<tr>' +
								'<td class="left">' + data.kode_booking + '</td>' +
								'<td class="left">' + data.nama + '</td>' +
								'<td class="left">' + data.poli + '</td>' +
								'<td class="left">' + data.pegawai + '</td>' +
								'<td class="left">' + ((data.no_sk !== null) ? data.no_sk : '') + '</td>' +
								'<td class="left">' + ((data.nosep !== null) ? data.nosep : '') + '</td>' +
								'<td class="left">' + ((data.id_pendaftaran !== null) ? 'Daftar' : '') + '</td>' +
								'<td class="left">' + ((data.tanggal_kunjungan !== null) ? datefmysql(data.tanggal_kunjungan) : '') + '</td>' +
								'<td class="left">' + ((data.status !== null) ? data.status : '') + '</td>' +
								'<td class="right" style="display:flex;float:right">' +
								checkIn +
								cetakSEP +
								'</td>' +
								'</tr>'

							$('#table-checkin-pasien tbody').append(html)
						}

					} else {

						messageCustom('No RM Tidak Ada, Silakan Ke Loket Pendaftaran', 'Error')

					}

				} else {

					messageCustom('Tidak ada Jadwal Konsul untuk Kode Booking tersebut pada hari ini', 'Error')

				}

			},
			error: function(e) {
				accessFailed(e.status)
			},
		})

	}

	function getTanggalKontrol(tanggal = null) {
		const dataBooking = JSON.parse($('#data-booking').val());

		if(!['IRM', 'HDL'].includes(dataBooking.kode_poli_rujukan)){
			$.ajax({
				url: '<?= base_url('pelayanan/api/pelayanan/cek_tanggal_kontrol') ?>',
				data: 'id_pasien=' + dataBooking.no_rm + '&tgl_rencana=' + tanggal,
				type: 'GET',
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					
					if (!data.status) {
						swalAlert('info', 'Gagal Simpan Booking', 'Pasien sudah melakukan <b>'+data.message+'</b> pada tanggal <b>' + data.data.tanggal_kunjungan + '</b> ke <b>Poli '+ data.data.nama_poli+'</b>. Silahkan pilih tanggal lain (minimal 8 hari dari kunjungan sebelumnya) !');
					} else {
						dataBenar(tanggal);
					}
				},
				error: function(e) {
					accessFailed(e.status);
				}
			});
		}else{
			dataBenar(tanggal);
		}
    }

	function dataBenar(tanggal = null, isUpdateSkd = false) {
		console.log(isUpdateSkd)
		const dataBooking = JSON.parse($('#data-booking').val());

		if (dataBooking.id_poli === '25') {
			swal.fire({
				title: 'Apakah Pasien Mendapatkan Surat Perintah Operasi Katarak?',
				html: `<div style="text-align: left;">
							<ol>
								<li>Tekan <b>YA</b> jika anda mendapatkan surat perintah operasi katarak</li>
								<li>Tekan <b>TIDAK</b> jika tidak mendapatkan surat perintah operasi</li>
							</ol>
					</div>`,
				icon: 'question',
				showCancelButton: true,
				buttonsStyling: true,
				confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
				cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Tidak',
				reverseButtons: true,
				allowOutsideClick: false,
			}).then((result) => {
				let is_pasien_katarak = !result.value ? 0 : 1;

				const newDataBooking = {
					...dataBooking,
					is_pasien_katarak,
				}

				$('#data-booking').val(JSON.stringify(newDataBooking))

				setTimeout(() => {
					let usia
					let kebutuhan = 'Tidak'
					let tanggalBooking = tanggal

					const dataBooking = JSON.parse($('#data-booking').val())

					if (dataBooking.umur_pasien >= 60) {
						usia = 'Prioritas'
					} else if (dataBooking.is_bpjs) {
						usia = 'BPJS'
					} else {
						usia = 'Tunai'
					}

					if (dataBooking.disabilitas === 1) {
						kebutuhan = 'Ya'
					}

					isUpdateSkd ? updateSKD(usia, kebutuhan, tanggalBooking) : cekAntrianBPJS(usia, kebutuhan, tanggalBooking)
				}, 50)
			});
		} else {
			let usia
			let kebutuhan = 'Tidak'
			let tanggalBooking = tanggal;

			const dataBooking = JSON.parse($('#data-booking').val())

			if (dataBooking.umur_pasien >= 60) {
				usia = 'Prioritas'
			} else if (dataBooking.is_bpjs) {
				usia = 'BPJS'
			} else {
				usia = 'Tunai'
			}

			if (dataBooking.disabilitas === 1) {
				kebutuhan = 'Ya'
			}

			isUpdateSkd ? updateSKD(usia, kebutuhan, tanggalBooking) : cekAntrianBPJS(usia, kebutuhan, tanggalBooking)
		}
	}

	function checkInPasien(id, statusrm = null) {

		let pesan = 'Check In Pasien';
		let confirm_button = 'Check In';
		// $('#input-kode').focus()

		// window.location.reload()

		if (statusrm !== null) {
			console.log('STAUTS RM = NULL')

			$.ajax({
				type: 'GET',
				url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/checkin_pasien") ?>',
				data: 'id_booking=' + id + '&statusrm=' + statusrm,
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {

					if (typeof data.metaData !== 'undefined') {

						if (data.metaData.code === 201 | data.metaData.code === '201') {

							swalAlert('warning', data.metaData.code, data.metaData.message);
							$('#pasien-text').html(data.metaData.p_text);
							console.log('STAUTS RM = OK && CODE 201')
							// const today = new Date();
							// const yyyy = today.getFullYear();
							// const mm = String(today.getMonth() + 1).padStart(2, '0');
							// const dd = String(today.getDate()).padStart(2, '0');
							// const localDate = `${yyyy}-${mm}-${dd}`;
							// cekAntrianBPJS('Antrian APM', 'Tidak', localDate) // Loket I

						} else if (data.metaData.code === 202) {

							messageCustom(data.metaData.konfirm, 'Success');
							konfirmasiDataWA(id, data.metaData.message);
							$('#pasien-text').html(data.metaData.p_text);
							// getKodeBookingPasien();

							console.log('STAUTS RM = NULL && CODE 202')

						} else {

							messageCustom(data.metaData.message, 'Success');
							$('#pasien-text').html(data.metaData.p_text);
							// getKodeBookingPasien();

							console.log('STAUTS RM = NULL && HARUSNYA LANGSUNG PRINT')

							Swal.fire({
								icon: 'success',
								title: 'Sukses!',
								html: "Silahkan ambiil bukti kunjungan anda",
								timer: 3000
							}).then((result) => {
								resetField()
								setTimeout(() => window.location.reload(), 100)
							})

						}



					}

					$.get('<?= base_url("booking_poliklinik/api/booking_poliklinik/get_data_printing/") ?>' + id, function(data) {
						if (data !== null && data.id_pendaftaran !== null) {
							cetakKunjungan(data.id_pendaftaran)
						}

						// if (data !== null && data.nosep !== null) {
						// 	cetakSEP(data.nosep)
						// }

						if (data !== null) {
							setTimeout(() => window.location.reload(), 100)
						}
					})

					$('#modal-checkin-pasien').modal('hide');

				},
				complete: function() {
					hideLoader();
				},
				error: function(e) {
					messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
				}
			})

		} else {

			console.log('STAUTS RM = OK')

			// swal.fire({
			// 	title: 'Konfirmasi',
			// 	html: pesan,
			// 	icon: 'question',
			// 	showCancelButton: true,
			// 	confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
			// 	cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			// 	reverseButtons: true,
			// 	allowOutsideClick: false
			// }).then((result) => {
			// 	if (result.value) {
			$.ajax({
				type: 'GET',
				url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/checkin_pasien") ?>',
				data: 'id_booking=' + id + '&statusrm=' + statusrm,
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {

					if (typeof data.metaData !== 'undefined') {

						if (data.metaData.code === 201 | data.metaData.code === '201') {

							swalAlert('warning', data.metaData.code, data.metaData.message);
							$('#pasien-text').html(data.metaData.p_text);
							console.log('STAUTS RM = OK && CODE 201')
							// const today = new Date();
							// const yyyy = today.getFullYear();
							// const mm = String(today.getMonth() + 1).padStart(2, '0');
							// const dd = String(today.getDate()).padStart(2, '0');
							// const localDate = `${yyyy}-${mm}-${dd}`;
							// cekAntrianBPJS('Antrian APM', 'Tidak', localDate) // Loket I

						} else if (data.metaData.code === 202) {

							messageCustom(data.metaData.konfirm, 'Success');
							konfirmasiDataWA(id, data.metaData.message, data.metaData.statusrm);
							$('#pasien-text').html(data.metaData.p_text);
							// getKodeBookingPasien();
							console.log('STAUTS RM = OK && CODE 202')

						} else {

							messageCustom(data.metaData.message, 'Success');
							$('#pasien-text').html(data.metaData.p_text);
							// getKodeBookingPasien();
							console.log('STAUTS RM = OK && HARUSNYA LANGSUNG PRINT')

						}



					}

					$.get('<?= base_url("booking_poliklinik/api/booking_poliklinik/get_data_printing/") ?>' + id, function(data) {
						if (data !== null && data.id_pendaftaran !== null) {
							cetakKunjungan(data.id_pendaftaran)
						}

						// if (data !== null && data.nosep !== null) {
						// 	cetakSEP(data.nosep)
						// }
					})

					$('#modal-checkin-pasien').modal('hide');

				},
				complete: function() {
					hideLoader();
				},
				error: function(e) {
					messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
				}
			})
			// }
			// });

		}

	}

	function konfirmasiDataWA(id, data, statusrm) {

		let pesan = '';

		if (typeof data.statusrm !== 'undefined') {

			pesan = '<table style="width: 100%"><tr><td class="left" style="font-size: 25px"><b>No. RM</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.id !== null) ? data.message.id : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>NIK</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.no_identitas !== null) ? data.message.no_identitas : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Nama</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.nama !== null) ? data.message.nama : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Tanggal Lahir</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.tanggal_lahir !== null) ? datefmysql(data.message.tanggal_lahir) : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Alamat</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.alamat !== null) ? data.message.alamat : '') + '</b></td></tr>';

		} else {

			pesan = '<table style="width: 100%"><tr><td class="left" style="font-size: 25px"><b>No. RM</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.id !== null) ? data.id : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>NIK</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.no_identitas !== null) ? data.no_identitas : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Nama</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.nama !== null) ? data.nama : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Tanggal Lahir</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.tanggal_lahir !== null) ? datefmysql(data.tanggal_lahir) : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Alamat</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.alamat !== null) ? data.alamat : '') + '</b></td></tr>';

		}

		let confirm_button = 'Benar';
		let controlButton = 'Salah';


		swal.fire({
			title: 'Apakah Data Anda di bawah ini Sudah Benar?',
			html: pesan,
			icon: 'question',
			showCancelButton: true,
			showDenyButton: true,
			showCloseButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
			cancelButtonText: '<i class="fas fa-save"></i> ' + controlButton,
			reverseButtons: true,
			allowOutsideClick: false,
			customClass: {
				popup: 'custom-swal-popup'
			}
		}).then((result) => {

			if (result.value === true) {

				checkInPasien(id, 1);

			}

			if (result.dismiss === 'cancel') {


				if (typeof data.statusrm !== 'undefined') {

					if (data.statusrm === 2) {

						checkInPasien(id, 2);

					} else {

						messageCustom('Silakan ke Loket Pendaftaran untuk Registrasi', 'Error');

					}

				} else {

					messageCustom('Silakan ke Loket Pendaftaran untuk Registrasi', 'Error');

				}

			}

			if (result.dismiss === 'close') {

				swal.close();

			}

		});

	}

	function daftarKunjungan(id, nosep) {

		let pesan = 'Pendaftaran Pasien'
		let confirm_button = 'Daftar'

		swal.fire({
			title: 'Konfirmasi',
			html: pesan,
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false,
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/simpan_pendaftaran") ?>',
					data: 'id=' + id + '&nosep=' + nosep,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {

						if (typeof data.metaData !== 'undefined') {

							if (data.metaData.code === 201 | data.metaData.code === '201') {

								swalAlert('warning', data.metaData.code, data.metaData.message)

							} else {

								messageCustom(data.metaData.message, 'Success')
								getKodeBookingPasien()

							}

						}

					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
					},
				})
			}
		})

	}

	function cetakKunjungan(id) {
		const user = '<?= $this->session->userdata('nama') ?>';
		const accountGroup = '<?= $this->session->userdata('account_group') ?>';

		if (user !== 'HARUN' && user !== 'DJUWITA APRIANI' && user !== 'Adni Marta Senjaya Ramdhani' && user !== 'CORRY R. HANIFAH' && user !== 'Singgih Nugroho' && accountGroup !== 'Pendaftaran IGD' && accountGroup !== 'Admin' && user !== 'APM NS' && accountGroup !== 'Pendaftaran' && accountGroup !== 'Admin Rekam Medis' && user !== 'APM Pendaftaran 3' && user !== 'APM Pendaftaran 5' && user !== 'APM Pendaftaran 6') {
			$.get("<?= base_url() ?>booking_poliklinik/api/booking_poliklinik/direct_print_bukti_kunjungan_poli/" + id, function(data, status) {
				console.log(status)
			})
		} else {
			var dWidth = $(window).width()
			var dHeight = $(window).height()
			var x = screen.width / 2 - dWidth / 2
			var y = screen.height / 2 - dHeight / 2

			window.open('<?= base_url('pendaftaran_poli/cetak_bukti_kunjungan_poli/') ?>' + id, 'Cetak Bukti Kunjungan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y)
		}
	}

	function cetakSEP(nosep) {
		if (nosep === null || nosep === '') {
			swalCustom('warning', 'Cetak SEP', 'No. SEP Tidak ada, Silahkan buat sep terlebih dahulu')
		} else {
			var dWidth = $(window).width()
			var dHeight = $(window).height()
			var x = screen.width / 2 - dWidth / 2
			var y = screen.height / 2 - dHeight / 2
			window.open('<?= base_url('antrian_bpjs/antrian_bpjs/') ?>nota_sep/' + nosep, 'Cetak Nota SEP Ver. 2.0', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y)
		}

		window.location.reload()
	}

	function resetField(isUserReset = false) {
		$('#penjamin-lainnya').parent().parent().addClass('hide')
		$('#data-booking, #tanggal-booking, #layanan_auto, #dokter, #jenis-identitas, #penjamin, #penjamin-lainnya, #tanggal-kontrol, #tanggal-kontrol-spri, #poli-asal, #poli-tujuan, #poli-tujuan-spri, #tanggal-kontrol-baru, #tanggal-kontrol-edit, #poli-asal-edit, #poli-tujuan-edit').
		val('')
		if (!isUserReset) {
			$('#modal-tambah-booking, #modal-input-manual-pasien-umum, #modal-input-kontrol, #modal-input-kontrol-baru, #modal-input-kontrol-edit, #modal-list-skd, #modal-list-rujukan').modal('hide')
		}
		$('#tunai').click().prop('checked', false)
		$('#bpjs').click().prop('checked', false)

		$('#s2id_layanan_auto a .select2-chosen, #s2id_poli-asal-edit a .select2-chosen, #s2id_poli-tujuan-edit a .select2-chosen').html('')
		$('#dokter, #dokter-input-kontrol, #dokter-input-kontrol-spri, #dokter-input-kontrol-baru, #dokter-input-kontrol-edit').html('<option value="">Pilih Dokter</option>')
	}

	function handleCetakAntrian(id) {
		const user = '<?= $this->session->userdata('nama') ?>';
		const accountGroup = '<?= $this->session->userdata('account_group') ?>';

		if (user !== 'HARUN' && user !== 'DJUWITA APRIANI' && user !== 'Adni Marta Senjaya Ramdhani' && user !== 'CORRY R. HANIFAH' && user !== 'Singgih Nugroho' && accountGroup !== 'Pendaftaran IGD' && accountGroup !== 'Admin' && user !== 'APM NS' && accountGroup !== 'Pendaftaran' && accountGroup !== 'Admin Rekam Medis' && user !== 'APM Pendaftaran 3' && user !== 'APM Pendaftaran 5' && user !== 'APM Pendaftaran 6') {
			$.get("<?= base_url() ?>booking_poliklinik/api/booking_poliklinik/direct_print_bukti_booking/" + id, function(data, status) {
				console.log(status)
			})
		} else {
			const dWidth = $(window).width()
			const dHeight = $(window).height()
			const x = screen.width / 2 - dWidth / 2
			const y = screen.height / 2 - dHeight / 2

			window.open('<?= base_url() ?>booking_poliklinik/cetak_bukti_boooking/' + id, 'Cetak Bukti Booking', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y)
		}
	}

	function numpad() {
		let currentActiveInput;
		const inputKode = $('#input-kode');
		let defaultValue = inputKode.val();

		const setActiveInputField = input => currentActiveInput = input;
		let isNoRm = false;
		let isNik = false;
		let isBpjs = false;
		let isCheckIn = false;

		$('.btn-numpad-booking, .btn-numpad-checkin').on('click', function(e) {
			const target = $(e.target);
			const $this = $(this);
			isNoRm = $('#no-rm').is(':checked');
			isNik = $('#nik').is(':checked');
			setTimeout(() => $this.blur(), 200)

			if (target.is('.btn-numpad-checkin')) {
				if (currentActiveInput && $this.val() !== 'clear' && $this.val() !== 'backspace') {
					const value = $this.val();
					const currentValue = currentActiveInput.val();
					currentActiveInput.val(currentValue + value);
				}


				if ($this.val() === 'clear') {
					const currentValue = currentActiveInput.val();
					currentActiveInput.val(currentValue.slice(0, -1));
				}
			}

			if (target.is('.btn-numpad-booking')) {
				if (currentActiveInput && $this.val() !== 'clear' && $this.val() !== 'backspace') {
					const value = $this.val();
					const currentValue = currentActiveInput.val();
					if ((isNoRm && currentValue.length < 8) || (isNik && currentValue.length < 16) || (isBpjs && currentValue.length < 13) || isCheckIn) {
						currentActiveInput.val(currentValue + value);
					}
				}

				if ($this.val() === 'clear') {
					const currentValue = currentActiveInput.val();
					currentActiveInput.val(currentValue.slice(0, -1));
				}
			}
		})

		$('#no-identitas, #no-bpjs, #input-kode').on('focus', function() {
			const $this = $(this);

			if ($this.attr('id') === 'no-bpjs') {
				isNoRm = false;
				isNik = false;
				isBpjs = true;
			}
			if ($this.attr('id') === 'input-kode') {
				isCheckIn = true;
			}
			setActiveInputField($this);
		})
	}

	// function inputBooking() {
	//   let firstCharEntered = false;
	//   let defaultValue = $('#input-kode').val();
	//
	//   $('#input-kode').on('input', function(event) {
	//     const additionalChars = $(this).val().slice(defaultValue.length)
	//     const allowedFirstChars = ['A', 'B', 'C', 'H']
	//     const isFirstCharEntered = allowedFirstChars.includes(additionalChars)
	//
	//     if (!firstCharEntered) {
	//       if (allowedFirstChars.includes(additionalChars)) {
	//         firstCharEntered = true
	//       } else {
	//         $(this).val(defaultValue);
	//         return;
	//       }
	//     }
	//
	//     if (!isFirstCharEntered && !$(this).val().split('').some(char => allowedFirstChars.includes(char))) {
	//       firstCharEntered = false
	//     }
	//
	//     let value = $(this).val();
	//
	//     if (value.length <= 8) {
	//       $(this).val(defaultValue);
	//       return;
	//     }
	//
	//     console.log('asdasd')
	//   });
	// }

	function autoCheckIn(id, kode_booking) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/lakukan_checkin") ?>',
            data: 'id=' + id + '&kode_booking=' + kode_booking,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (typeof data.metaData !== 'undefined') {
                    if (data.metaData.code !== 200) {
                        swalAlert('warning', data.metaData.code, data.metaData.message);
                    } else {
                        messageCustom('Check In Berhasil', 'Success');
                        const dWidth = $(window).width()
						const dHeight = $(window).height()
						const x = screen.width / 2 - dWidth / 2
						const y = screen.height / 2 - dHeight / 2

						window.open('<?= base_url() ?>antrian_bpjs/cetak_antrian/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y)
                    }
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
</script>

<style>
	.custom-swal-popup {
		width: 70% !important;
	}
</style>