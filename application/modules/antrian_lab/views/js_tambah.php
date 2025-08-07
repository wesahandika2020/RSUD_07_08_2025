<script>

	$(function() {	
		// isNoRm = $('#no-rm').is(':checked');
		// $('#modal-tambah-antrian-lab').modal('show');
		// $('#modal-tambah-antrian-lab-label').html('Form Tambah Antrian Laboratorium');
		$('#jenis-tombol').val('antrian');	
		$('#btn-cek-data-numpad').attr('style', 'font-size: 20px; background-color: #1981CD;');		
		$('#btn-process-numpad').attr('style', 'font-size: 20px; background-color: #1981CD;');		
		$('#form-header').removeClass('bg-success');		
		$('#form-header').addClass('bg-info');		
		setTimeout(function() {
			$('#no-rm').click().prop('checked', false).click()
		}, 500)
		

		$('#btn-antrian').on('click', function() {
			$('#modal-tambah-antrian-lab').modal('show');
			$('#modal-tambah-antrian-lab-label').html('Form Tambah Antrian Laboratorium');
			$('#jenis-tombol').val('antrian');	
			$('#btn-cek-data-numpad').attr('style', 'font-size: 20px; background-color: #1981CD;');		
			$('#btn-process-numpad').attr('style', 'font-size: 20px; background-color: #1981CD;');		
			$('#form-header').removeClass('bg-success');		
			$('#form-header').addClass('bg-info');		
			setTimeout(function() {
				$('#no-rm').click().prop('checked', false).click()
			}, 500)
		})

		$('#btn-hasil').on('click', function() {
			$('#modal-tambah-antrian-lab').modal('show');
			$('#modal-tambah-antrian-lab-label').html('Form Ambil Hasil Laboratorium');
			$('#jenis-tombol').val('hasil');
			$('#btn-cek-data-numpad').attr('style', 'font-size: 20px; background-color: #00C292;');		
			$('#btn-process-numpad').attr('style', 'font-size: 20px; background-color: #00C292;');	
			$('#form-header').removeClass('bg-info');			
			$('#form-header').addClass('bg-success');		
			setTimeout(function() {
				$('#no-rm').click();	
			}, 500)
		})
	
		$('#no-identitas').on('click keypress', function(e) {
			const target = $(e.target)
			if ((e.which === 13 && target.is('#no-identitas'))) {
				btnCekIdentitas('scan');
				
				if (e.which === 13 && target.is('#no-identitas')) {
					$('#no-identitas').val('').focus();
				}
				
			}
			
		})
		
        $('#btn-cek-data-numpad').on('click', function() {
			btnCekIdentitas();
		})

		$('#modal-tambah-antrian-lab').on('hidden.bs.modal', function() {
			// exitFullScreenBookingModal()
			resetField()
		})

        $('.checkbox-identitas').on('change', function() {		
			const noIdentitas = $('#no-identitas').val('')
			noIdentitas.ForceNumericOnly().val('')
			$('#norm').val('').parent().parent().addClass('hide')
			$('#nama-pasien').val('').parent().parent().addClass('hide')
			$('#kelamin').val('').parent().parent().addClass('hide')
			$('#tgl-lahir-pasien').val('').parent().parent().addClass('hide')
			$('#alamat').val('').parent().parent().addClass('hide')

			$('#btn-cek-data-numpad, #warning-alert-pasien').show()			

			$('#btn-process-numpad').hide()
			$('#btn-reset-user-input-numpad').hide()

			
			if ($(this).attr('id') === 'no-rm' && $(this).is(':checked')) {
				$('#jenis-identitas').val('no_rm')
				noIdentitas.prop('disabled', false).attr('maxlength', 8);

				var inputElement = $('#no-identitas');
    			inputElement.focus();

				// $('#no-identitas').focus();
				$('#no-rm').prop('checked', true);
				$('#nik').prop('checked', false);
			} else if ($(this).attr('id') === 'nik' && $(this).is(':checked')) {
				$('#jenis-identitas').val('nik')
				noIdentitas.prop('disabled', false).attr('maxlength', 16)
				$('#no-rm').prop('checked', false);
				$('#nik').prop('checked', true);
			} else {
				$('#jenis-identitas').val('')
				noIdentitas.prop('disabled', true).removeAttr('maxlength')
				$('#no-rm').prop('checked', false);
				$('#nik').prop('checked', false);
			}
			// $('#no-identitas').focus();
		})

		$('#btn-process-numpad').on('click', function() {
			if($('#jenis-tombol').val() == 'antrian' ){
				btn_proses_tambah();
			} else if($('#jenis-tombol').val() == 'hasil' ){
				btn_proses_hasil();
			} else {
				swalAlert('error', 'Proses gagal', 'Lakukan refresh untuk melanjutkan, atau hubungi IT untuk perbaikan.');
			}

		})

		$('#btn-reset-user-input-numpad').on('click', function() {
			resetField(true)
			$('#no-rm').click().prop('checked', false).click()
		})

		numpad();
        
    })

	function btn_proses_tambah(){
		if (($('#norm').val() === '') && ($('#no-identitas').val() === '')) {
			syams_validation($('#no-identitas'), 'No identitas tidak boleh kosong')
			return
		} else {
			syams_validation_remove($('#no-identitas'))
		}

		$.ajax({
			type: 'GET',
			url: '<?= base_url("antrian_lab/api/antrian_lab/get_antrian_lab_order") ?>',
			data: 'jenis_identitas=' + $('#jenis-identitas').val() +'&norm=' + $('#norm').val() +'&layanan=',
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				if (data.jml_unit == 1) {
					if(data.data_unit[0].id_antrian !== null){
						cetakAntrianLab(data.data_unit[0].id_antrian,0);
					} else {								
						konfirmasiTambahAntrianLab(data.data_unit[0], data.data_order);
					}
					
				} else if (data.jml_unit >= 2) {
					$('#modal-list-poli').modal('show')
					$('#modal-list-poli-label').html('List Asal Poliklinik Order Pasien')
					$('#table-list-poli tbody').empty()

					let html = ''
					$.each(data.data_unit, function(i, v) {

						let btnCetak = '';
						let btnBuat = '';

						if(v.id_antrian !== null){
							btnCetak = `<button type="button" class="btn btn-primary" onclick="cetakAntrianLab('`+v.id_antrian+`',0)"> <i class="fas fa-save mr-1"></i> Cetak Antrian</button>`;
						} else {								
							btnBuat = `<button type="button" class="btn btn-info" onclick="getDetailAntrianLab('`+$('#jenis-identitas').val()+`','`+$('#norm').val()+`',${v.id_unit_layanan})"> <i class="fas fa-plus-circle mr-1"></i> Buat Antrian</button>`;
						}

						html += `<tr>
							<td class="center">${i + 1}</td>
							<td class="center">${v.nama_poli}</td>
							<td>${v.nama_dokter}</td>
							<td class="center" style="text-transform: capitalize;">${v.cito !== null ? v.cito : 'Tidak' }</td>
							<td class="center" style="text-transform: capitalize;">${v.prioritas !== null ? v.prioritas : 'Tidak' }</td>
							<td class="center">${v.penjamin !== null ? v.penjamin : '-' }</td>
							<td class="center">${v.nomor_antrian !== null ? v.nomor_antrian : '-' }</td>
							<td>									
								`+ btnBuat + btnCetak +`
							</td>
						</tr>`
					})
					$('#table-list-poli tbody').append(html)
				} else {
					swalAlert('info', 'Tidak Ada Order', 'Anda tidak memiliki Order Laboratorium pada hari ini');
				}
				
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
	}

	function btn_proses_hasil(){
		if (($('#norm').val() === '') && ($('#no-identitas').val() === '')) {
			syams_validation($('#no-identitas'), 'No identitas tidak boleh kosong')
			return
		} else {
			syams_validation_remove($('#no-identitas'))
		}

		$.ajax({
			type: 'GET',
			url: '<?= base_url("antrian_lab/api/antrian_lab/get_antrian_lab_tiket") ?>',
			data: 'jenis_identitas=' + $('#jenis-identitas').val() +'&norm=' + $('#norm').val() +'&layanan=',
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				if (data.jumlah == 1) {		
					tambahAntrianLabHasil(data.data[0].id);		

				} else if (data.jumlah >= 2) {
					$('#modal-list-hasil').modal('show')
					$('#modal-list-hasil-label').html('List Hasil Laboratorium')
					$('#table-list-hasil tbody').empty()

					let html = ''
					$.each(data.data, function(i, v) {

						let btnCetak = '';
						let btnBuat = '';
						if(v.id_antrian_hasil !== null){
							btnCetak = `<button type="button" class="btn btn-primary" onclick="cetakAntrianLab('`+v.id_antrian_hasil+`',0)"> <i class="fas fa-save mr-1"></i> Cetak Antrian</button>`;
						} else {								
							btnBuat = `<button type="button" class="btn btn-info" onclick="tambahAntrianLabHasil('`+v.id+`')"> <i class="fas fa-plus-circle mr-1"></i> Buat Antrian</button>`;
						}

						html += `<tr>
							<td class="center">${i + 1}</td>
							<td class="center">${v.tanggal_kunjungan}</td>
							<td class="center">${v.nomor_antrian}</td>
							<td class="center">${v.tanggal_keluar}</td>
							<td class="center">									
								`+ btnBuat + btnCetak +`
							</td>
						</tr>`
					})
					$('#table-list-hasil tbody').append(html)
				} else {
					swalAlert('info', 'Tidak Ada Hasil', 'Anda tidak memiliki Hasil Antrian Laboratorium');
				}
				
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

	function btnCekIdentitas($type) {
		$('#label-btn-process').append('');

		if (($('#norm').val() === '') && ($('#no-identitas').val() === '')) {
			syams_validation($('#no-identitas'), 'No identitas tidak boleh kosong')
			return
		} else {
			syams_validation_remove($('#no-identitas'))
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("antrian_lab/api/antrian_lab/indentitas") ?>',
			data: $('#form-tambah-antrian-lab').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				detail_alamat = '';
				if ((data.data.no_rumah !== '') && (data.data.no_rumah !== null)) { detail_alamat = detail_alamat + ' NO.' + data.data.no_rumah;}
				if ((data.data.no_rt !== '')    && (data.data.no_rt !== null))    { detail_alamat = detail_alamat + ' RT.' + data.data.no_rt;}
				if ((data.data.no_rw !== '')    && (data.data.no_rw !== null))    { detail_alamat = detail_alamat + ' RW.' + data.data.no_rw;}
				if ((data.data.nama_kel !== '') && (data.data.nama_kel !== null)) { detail_alamat = detail_alamat + ', '   + data.data.nama_kel;}
				if ((data.data.nama_kec !== '') && (data.data.nama_kec !== null)) { detail_alamat = detail_alamat + ', '   + data.data.nama_kec;}
				if ((data.data.nama_kab !== '') && (data.data.nama_kab !== null)) { detail_alamat = detail_alamat + ', '   + data.data.nama_kab;}
				if ((data.data.nama_prop !== '')&& (data.data.nama_prop !== null)){ detail_alamat = detail_alamat + ', '   + data.data.nama_prop;}
				if ((data.data.kode_pos !== '') && (data.data.kode_pos !== null)) { detail_alamat = detail_alamat + ', '   + data.data.kode_pos;}

				$('#norm').val(data.data.id).parent().parent().removeClass('hide')
				$('#nama-pasien').val(data.data.nama).parent().parent().removeClass('hide')
				$('#kelamin').val(data.data.kelamin=='L'? 'Laki-Laki' : 'Perempuan' ).parent().parent().removeClass('hide')
				$('#tgl-lahir-pasien').val(data.data.tanggal_lahir).parent().parent().removeClass('hide')
				$('#alamat').val(data.data.alamat+detail_alamat).parent().parent().removeClass('hide')

				$('#btn-cek-data-numpad, #warning-alert-pasien').hide()
				$('#btn-process-numpad').show()
				$('#btn-reset-user-input-numpad').show()				
				
				$('#label-btn-process').html('');
				if($('#jenis-tombol').val() == 'antrian' ){
					$('#label-btn-process').html('<i class="fas fa-plus"></i>&nbsp; Tambah Antrian');
				} else if($('#jenis-tombol').val() == 'hasil' ){
					$('#label-btn-process').html('<i class="fas fa-file"></i>&nbsp; Ambil Hasil');
				}

				if($type == 'scan'){
					if($('#jenis-tombol').val() == 'antrian' ){
						btn_proses_tambah();
					} else if($('#jenis-tombol').val() == 'hasil' ){
						btn_proses_hasil();
					}
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
	}

	function resetField(isUserReset = false) {
		
		$('#norm').val('').parent().parent().addClass('hide')
		$('#nama-pasien').val('').parent().parent().addClass('hide')
		$('#kelamin').val('').parent().parent().addClass('hide')
		$('#tgl-lahir-pasien').val('').parent().parent().addClass('hide')
		$('#alamat').val('').parent().parent().addClass('hide')

		$('#btn-cek-data-numpad, #warning-alert-pasien').show()
		$('#btn-process-numpad').hide()
		$('#btn-reset-user-input-numpad').hide()	
		
		// $('#no-rm').click().prop('checked', false)

		if (!isUserReset) {			
			$('#modal-tambah-antrian-lab').modal('hide');
			$('#modal-list-poli').modal('hide')
			$('#modal-list-hasil').modal('hide')
		}
	}

	function numpad() {
		let currentActiveInput;
		const setActiveInputField = input => currentActiveInput = input;
		let isNoRm = false;
		let isNik = false;

		$('.btn-numpad').on('click', function(e) {
			const target = $(e.target);
			const $this = $(this);
			isNoRm = $('#no-rm').is(':checked');
			isNik = $('#nik').is(':checked');
			setTimeout(() => $this.blur(), 200)
			
			if (currentActiveInput && $this.val() !== 'clear' && $this.val() !== 'backspace') {
				const value = $this.val();
				const currentValue = currentActiveInput.val();
				if ((isNoRm && currentValue.length < 8) || (isNik && currentValue.length < 16)) {
					currentActiveInput.val(currentValue + value);
				}
			}

			if ($this.val() === 'clear') {
				resetField(true);
				const currentValue = currentActiveInput.val();
				currentActiveInput.val(currentValue.slice(0, -1));
				if(currentValue.length < 2){
					$('#no-identitas').focus();
				}
			}
		})

		$('#no-identitas').on('focus', function() {
			const $this = $(this);
			setActiveInputField($this);
		})
	}

	function getDetailAntrianLab(jenis_identitas, norm, id_unit_layanan){
		$.ajax({
			type: 'GET',
			url: '<?= base_url("antrian_lab/api/antrian_lab/get_antrian_lab_order") ?>',
			data: 'jenis_identitas=' + jenis_identitas +'&norm=' + norm +'&layanan=' + id_unit_layanan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {		
				konfirmasiTambahAntrianLab(data.data_unit[0], data.data_order);				
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
	}

	function konfirmasiTambahAntrianLab(data_unit, data_order)
	{
		let isCito 		 = false;
		let isPrioritas  = false;
		let id_poli		 = data_unit.id_unit_layanan;
		let nama_poli    = data_unit.nama_poli;
		let id_pasien    = data_unit.id_pasien;
		let id_penjamin    = data_unit.id_penjamin;
		let id_lay_pend  = '';
		let id_order_lab = '';
		let kode 	 	 = '';
		let pesan		 = ''; 
		
		if(nama_poli == null){
			pesan = 'Apakah pengirim anda adalah <b>Pendaftaran</b>?';
		} else {
			pesan = 'Apakah poli pengirim Anda adalah <b>'+nama_poli+'</b>?';
		}

		$.each(data_order, function(i, v) {	
			v.cito=='ya' 	   ? isCito 		= true : '' ;
			v.prioritas=='ya'  ? isPrioritas = true : '' ;
			id_lay_pend == ''  ? id_lay_pend= '{'+v.id_layanan_pendaftaran : id_lay_pend += ','+v.id_layanan_pendaftaran ;
			id_order_lab == '' ? id_order_lab= '{'+v.id : id_order_lab += ','+v.id ;
		});
		id_lay_pend == '' ? ''  : id_lay_pend += '}' ;		
		id_order_lab == '' ? '' : id_order_lab += '}' ;		
		
		if(isCito == true){
			kode   = 'C';
			pesan += '<br>Dengan Status <b>CITO</b>';
		} else if(isPrioritas == true){
			kode   = 'D';
			pesan += '<br>Dengan Status <b>PRIORITAS</b>';
		} else if(id_poli == '44' || id_poli == '55' || id_poli == '45'){ //44 MCU - 55 Stunting - 45 Cemara
			kode = 'B';
		} else if(id_penjamin == '9'){ //Tunai
			kode = 'B';
		} else {
			kode = 'A';
		}

		tambahAntrianLab(kode, isCito, isPrioritas, id_poli, id_lay_pend, id_order_lab,id_pasien);
		/*swal.fire({
            title: 'Antrian Laboratorium',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> Ya',
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
				tambahAntrianLab(kode, isCito, isPrioritas, id_poli, id_lay_pend, id_order_lab,id_pasien);
			}
        });	*/	
	}

	function tambahAntrianLab(kode, isCito, isPrioritas, id_poli, id_lay_pend, id_order_lab,id_pasien)
	{
		$.ajax({
			type: 'POST',
            url: '<?= base_url('antrian_lab/api/antrian_lab/simpan_antrianlab') ?>',
			data: 'kode=' + kode +'&isCito=' + isCito +'&isPrioritas=' + isPrioritas +'&id_poli=' + id_poli+'&id_lay_pend=' + id_lay_pend+'&id_order_lab=' + id_order_lab+'&id_pasien=' + id_pasien,
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader();
			},
			success: function (data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status) {
					cetakAntrianLab(data.id, 0);
					// resetField();
					messageCustom('Berhasil menambah Antrian Laboratorium', 'Success');
				} else {
					messageCustom('Gagal menambah Antrian Laboratorium', 'Error');
				}
			},
			complete: function () {
				hideLoader();
			},
			error: function (e) {
				messageEditFailed();
			}
		});
	}

	function tambahAntrianLabHasil(id_antrian)
	{
		$.ajax({
			type: 'POST',
            url: '<?= base_url('antrian_lab/api/antrian_lab/simpan_antrianlab_hasil') ?>',
			data: 'id_antrian=' + id_antrian ,
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader();
			},
			success: function (data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status) {
					cetakAntrianLab(data.id, 0);
					messageCustom('Berhasil menambah Antrian Hasil Laboratorium', 'Success');
				} else {
					messageCustom('Gagal menambah Antrian Hasil Laboratorium', 'Error');
				}
			},
			complete: function () {
				hideLoader();
			},
			error: function (e) {
				messageEditFailed();
			}
		});
	}

	
    

</script>