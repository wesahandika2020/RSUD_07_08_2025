<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var accountGroup = "<?= $this->session->userdata('account_group') ?>";	
	var id_translucent = "<?= $this->session->userdata('id_translucent') ?>";	
    var baseUrlMcuOnline = '<?= base_url('hasil_mcu_kirim_online/api/hasil_mcu_kirim_online') ?>';	
	let jenisFileMcu   = <?= json_encode($jenis_file_mcu); ?>;


	$(function() {	
        getListHasilMcu(1);

        $('#btn-reload').click(function() {
			resetAllData();
			getListHasilMcu(1);
		});

        $('#btn-search').click(function() {
			$('#modal-search').modal('show');
		});

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#togglePassphrase').on('click', function () {
			let input = $('#passphrase');
			let icon = $(this).find('i');

			if (input.attr('type') === 'password') {
				input.attr('type', 'text');
				icon.removeClass('fa-eye').addClass('fa-eye-slash');
			} else {
				input.attr('type', 'password');
				icon.removeClass('fa-eye-slash').addClass('fa-eye');
			}
		});

    });

    function paging(page) {
		getListHasilMcu(page);
	}	

	function getJenisFile(jenis){
		return jenisFileMcu[jenis];
	}

    function resetAllData() {
		syams_validation_remove('.validasi-input');
		$('#id, .form-control, #pencarian').val('');
		$('#tanggal-awal, #tanggal-akhir').val('<?= date("d/m/Y") ?>');
		$('.select2c-input').val('');
		$('.select2c-chosen').html('');
		$('#jenis-tanggal').val('keluar');
		
	}
	
	function getListHasilMcu(page) {
		page <= 0 ? page=1 : page=page;
		$('#page-now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/get_list_mcu") ?>/page/' + page,
			data: $('#form-search').serialize() ,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListHasilMcu(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				$.each(data.data, function(i, v) {
					let no  		 = ((i + 1) + ((data.page - 1) * data.limit));
					let email        = (v.email != null && v.email.trim() !== '' ? v.email : '<i class="blinker" style="color: red;">Email belum diinput</i>');
                    let btnPilihFile = `<button type="button" class="btn waves-effect waves-light btn-info btn-xs m-r-5" onclick="pilihFile('${JSON.stringify(v).replace(/"/g, '&quot;')}')" title="Pilih File yang akan dikirim"><i class="fas fa-upload"></i> Pilih File</button>`;
					let status_email = '';

					if(v.status_email== 'Belum'){
						status_email = '<i class="blinker" style="color: red;"><i class="fas fa-fw fa-spinner fa-spin m-r-5 text-danger" style="margin-bottom: 10px;"></i>Belum</i>';
					} else if(v.status_email == 'Gagal'){
						status_email = '<label style="margin-bottom: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-danger">Gagal</span></h5></label>';	
					} else if(v.status_email == 'Berhasil'){
						status_email = '<label style="margin-bottom: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-success">Berhasil</span></h5></label> (Ke 	: ' +(v.jml_email_berhasil ?? 0 )+')';	
					} else if(v.status_email == 'Ubah'){
						status_email = '<label style="margin-bottom: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-primary">Kirim Ulang</span></h5></label>';
					} else {
						status_email = '<label style="margin-bottom: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-primary">'+v.status_email+'</span></h5></label>';
					}

					$.each(v.data_detail, function(key, val) {
						status_email += '<br>- ' + val.nama_file +' : '+ (val.is_kirim == '1' ? '<i class="fas fa-fw fa-check m-l-5" title="File dikirim"></i>' : '<i class="fas fa-fw fa-times m-l-5" title="File dikirim"></i>');
					});

					let kirim_ulang  = '';
					if((accountGroup == 'Admin') && (v.status_email =='Berhasil') ){
						kirim_ulang  ='<button type="button" class="btn btn-primary btn-xs m-r-5" onclick="konfirmasiKirimUlang('+v.id_hasil_mcu+')" title="Kirim Ulang" style="z-index: 0;"><i class="fas fa-redo" style="width: 12px; height: 12px;"></i></button>'
					} else {
						kirim_ulang  ='';
					}

					let html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td>${v.no_register}</td>
							<td>Masuk RS  : ${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '-')} <br>
								Layanan   : ${((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '-')} <br>
								Kaluar RS : ${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '-')}
							</td>	
							<td>${v.id_pasien}<br>
								${v.nama}<br>
								${email}
							</td>
							<td>${((v.penjamin !== null) ? v.penjamin : '-')}</td>
							<td>${((v.dokter !== null) ? v.dokter : '-')}</td>
							<td>${((v.diagnosa !== null) ? v.diagnosa : '-')}</td>
							<td>${((v.status_terlayani !== null) ? v.status_terlayani : '-')}</td>
							<td>${((v.tindak_lanjut !== null) ? v.tindak_lanjut : '-')}</td>
							<td>${status_email}</td>
							<td class="right">${btnPilihFile}${kirim_ulang}</td>
                        </tr>
					`;
					$('#table-data tbody').append(html);					
				});
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

    function pilihFile(parameter) {

        let data = JSON.parse(parameter);
        
        $('#id-pendaftaran-detail').val(data.id);
        $('#id-layanan-pendaftaran-detail').val(data.id_layanan_pendaftran);
        $('#id-hasil-mcu-detail').val(data.id_hasil_mcu);

		let tindakLanjut = ['Batal', 'Batal Berkunjung', null, undefined];
		let statusPulang = !tindakLanjut.includes(data.tindak_lanjut) ? '1' : '0';
		$('#status-pulang-detail').val(statusPulang);

        $('#id-pasien-detail').html(data.id_pasien + ' / ' + data.no_register);
        $('#nama-pasien-detail').html(data.nama);	
        $('#umur-detail').html(hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')');
		$('#email-detail').html(data.email !== null ? data.email : '<i class="blinker" style="color: red;">Email belum diinput</i>');
		
		kunjungan = '';
		kunjungan += 'Tgl Masuk RS : '+(data.tanggal_daftar ? datetimefmysql(data.tanggal_daftar) : '-')+'<br>';
		kunjungan += '&nbsp;&nbsp;Tgl Layanan &nbsp;&nbsp;&nbsp;: '+(data.tanggal_layanan ? datetimefmysql(data.tanggal_layanan) + ' (MCU)' : '-')+'<br>';		
		kunjungan += '&nbsp;&nbsp;Tgl Keluar RS : '+(data.tanggal_keluar ? datetimefmysql(data.tanggal_keluar) + ' ('+data.tindak_lanjut+')' : '-');
        $('#kunjungan-detail').html(kunjungan);
		$('#dokter-detail').html(data.dokter);
        $('#penjamin-detail').html(data.penjamin !== null ? data.penjamin : '');
        $('#diagnosa-detail').html(data.diagnosa);
				
		getDataKirimEmail(data.id);

        if(data.id_hasil_mcu == null){			
			$('#table-file-kirim tbody').empty();
			addDataHasilMcu(data);
		} else {
			$('#modal-pilih-file').modal('show');
			reloadFileKirim();
		}        
    }

	function getDataKirimEmail(id_pendaftaran) {
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/get_data_kirim_email") ?>/id/' + id_pendaftaran,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {  
				if(data.status){
					$('#jml-email-berhasil-detail').html('');
					if(data.status_email== 'Belum'){
						$('#status-email-detail').html('<i class="blinker" style="color: red;">Belum</i>');
					} else if(data.status_email == 'Gagal'){
						$('#status-email-detail').html('<label style="margin-bottom: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-danger">Gagal</span></h5></label>&nbsp;&nbsp' + data.respon_email);	
					} else if(data.status_email == 'Berhasil'){
						$('#status-email-detail').html('<label style="margin-bottom: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-success">Berhasil</span></h5></label>');	
						$('#jml-email-berhasil-detail').html('&nbsp;&nbsp;(Dikirim sebanyak : '+ (data.jml_email_berhasil ?? 0 )+' kali)');		
					} else if(data.status_email == 'Ubah'){
						$('#status-email-detail').html('<label style="margin-bottom: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-primary">Kirim Ulang</span></h5></label>');
					} else {
						$('#status-email-detail').html('<label style="margin-bottom: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-primary">'+data.status_email+'</span></h5></label>');
					}
					
					
					$('#pengirim-email-detail').html(data.pegawai);
					$('#waktu-email-detail').html(data.created_email !== null ? ' ('+data.created_email+')' : '');
				} else {
					messageCustom('Gagal! ' , 'Error gagal dapat data kirim email');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal '+e, 'Error');
			}
		});    
	}

    function addDataHasilMcu(d) {
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/add_data_hasil_mcu") ?>/id/' + d.id + '/id_pasien/' + d.id_pasien,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {  
				if(data.status){
					messageCustom('Berhasil! ', 'Success');
                    $('#id-hasil-mcu-detail').val(data.id_hasil_mcu);
                    $('#modal-pilih-file').modal('show');
					getListHasilMcu($('#page-now').val())
				}else {
					messageCustom('Gagal! ' , 'Error');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal '+e, 'Error');
			}
		});    
	}

	function tambahForm(jenis_file, nama_file, id_pegawai) {
				
		if(id_translucent != id_pegawai && id_translucent != '1460'){
			swalAlert('info', 'Info', 'Anda tidak memiliki akses untuk menandatangani file ini !');
			return false;
		} else {
			$.ajax({
				type : 'GET',   
				url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/get_mcu_detail") ?>/jenis_file/' + jenis_file,
				data: $('#form-pilih-file-kirim-mcu').serialize(),
				cache: false,
				dataType : 'JSON',		
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {  
					if(data.status == false){	// Data belum ada						
						
						$('#tglform-passphrase').val('');
						$('#nama-file-mcu').html('');		
						$('#passphrase').val('');			
						$('#cek-passphrase').html('');	
						$('#dokter-passphrase').html('');			
						$('#nik-passphrase').html('');				

						if(jenis_file==''){
							$('#passphrase').val('');			
							$('#dokter-passphrase').html('');			
							$('#nik-passphrase').html('');			
							messageCustom('Pilih Jenis File terlebih dahulu !' , 'Info');

						} else if(jenis_file=='lab'){
							Swal.fire({
							title: 'Konfirmasi Tambah File',
							html: "Apakah anda yakin ingin upload file <br>"+nama_file+"?",
							icon: 'question',
							showCancelButton: true,
							confirmButtonText: '<i class="fas fa-save mr-1"></i>Ya',
							cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Tidak',	
							reverseButtons: true
							}).then((result) => {
								if (result.value) {
									tambahFile(jenis_file, nama_file)
								}
							}) 

						} else {		
							if(data.nik_dokter !== null && data.nik_dokter !== ''){
								id_pendaftaran = $('#id-pendaftaran-detail').val();
								id_layanan_pendaftaran = $('#id-layanan-pendaftaran-detail').val();
								$('#tglform-passphrase').val(data.tgl_form);		
								$('#jenisform-passphrase').val(jenis_file);		
								$('#namaform-passphrase').val(nama_file);	
								$('#nama-file-mcu').html(nama_file);		
								$('#dokter-passphrase').html(data.nama_dokter);			
								$('#nik-passphrase').html(data.nik_dokter);		
								nik = $('#nik-passphrase').text().trim();
								$('#btn-passphrase').html(`<button type="button" class="btn btn-info btn-xxs m-l-5" onclick="cekAkunEsign('${nik}')" style="margin-bottom: 5px;"><i class="fas fa-id-card m-r-5"></i> Cek</button>`);	
								$('#btn-file').html(`<button type="button" class="btn btn-info btn-xxs m-l-5" onclick="lihatFile('${id_pendaftaran}','${id_layanan_pendaftaran}','${jenis_file}','${nama_file}')"><i class="fas fa-file-alt m-r-5"></i> Lihat File</button>`);	
								$('#modal-pass-esign').modal('show');	
								
							} else {							
								dokter = data.nama_dokter !== null ? data.nama_dokter : '';
								swalAlert('info', 'Info', 'Form <b>'+ nama_file +'</b> belum di isi, atau NIK dokter <b>'+ dokter +'</b> tidak ada');
							}				
							
						}

					} else {
						messageCustom('File sudah terupload, silahkan hapus terlebih dahulu. Lalu upload kembali!' , 'Info');
					}
				},
				complete: function() {
					hideLoader();
				},
				error: function(e){
					messageCustom('Gagal '+e, 'Error');
				}
			}); 
		}
	}

	function cekPassphrase() {
		if ($('#passphrase').val() === '') {
			syams_validation('#passphrase', 'Passphrase harus diisi !')
			return false;
		};

		$('#passphrase-detail').val('');
		$('#passphrase-detail').val($('#passphrase').val());

		$('#modal-pass-esign').modal('hide');
		
		tambahFile($('#jenisform-passphrase').val(),$('#namaform-passphrase').val())
	}

	function tambahFile(jenis_file, nama_file) {
		passphrase = $('#passphrase').val();
		tglform    = $('#tglform-passphrase').val();
		nik        = $('#nik-passphrase').html().trim();
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/tambah_file") ?>/jenis_file/' + jenis_file + '/nik/' + nik+ '/tglform/' + tglform,
			data: $('#form-pilih-file-kirim-mcu').serialize(),
			cache: false,
			dataType : 'JSON',		
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {  
				if(data.status){
					// Simpan data ke sessionStorage
					sessionStorage.setItem('yt-remote-session-name', JSON.stringify({
						data: "Desktop",
						creation: Date.now()
					}));
					
					messageCustom('Berhasil melakukan eSign '+nama_file+' ! ', 'Success');
					getListHasilMcu($('#page-now').val())	
					reloadFileKirim()
				}else {				
					messageCustomResponError('Gagal melakukan eSign ', data);
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal '+e, 'Error');
			}
		});    
	}

	function reloadFileKirim() {
		$.ajax({
			type: 'GET',	
			url: `${baseUrlMcuOnline}/get_all_file`,			
			data: $('#form-pilih-file-kirim-mcu').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#table-file-kirim tbody').empty();
				$.each(data.data, function(i, v) {
					let no = (i + 1);
					// let jenis_file = getJenisFile(v.jenis_file);
					// let is_ready   = v.is_ready == '1' 
					// 				? `<button type="button" class="btn btn-success waves-effect" onclick="fileReady('${v.lokasi_file}')" style="padding-top: 0px; padding-bottom: 0px; padding-left: 6px; padding-right: 6px;">
					// 						<i class="fas fa-check"></i> Ya, lihat file</button>`
					// 				: `<button type="button" class="btn btn-primary waves-effect" onclick="fileNotReady('${v.id}','${v.lokasi_file}')" style="padding-top: 0px; padding-bottom: 0px; padding-left: 6px; padding-right: 6px;">
					// 						<i class="fas fa-redo"></i> Tidak, cek ketersediaan</button>`;
					
					let esign_file = '';
					if((v.id_mcu_kirim  !== null ) && (v.status_email !='Berhasil') ){
						if(v.is_ready == '1') {
							esign_file = `<button type="button" class="btn btn-success waves-effect" onclick="fileReady('${v.lokasi_file}')" title="Klik, untuk melihat file yang sudah di tandatangani" style="padding-top: 0px; padding-bottom: 0px; padding-left: 6px; padding-right: 6px;">
											<i class="fas fa-eye"></i> Selesai</button>`;
						} else {
							esign_file = `<button type="button" class="btn btn-primary waves-effect" onclick="fileNotReady('${v.id}','${v.lokasi_file}')" title="Klik, untuk megecek ketersediaan file" style="padding-top: 0px; padding-bottom: 0px; padding-left: 6px; padding-right: 6px;">
											<i class="fas fa-redo"></i> Proses</button>`;
						}
					} else {
						if(v.is_file_esign == '1') {
							esign_file =  `<button type="button" class="btn btn-secondary waves-effect" onclick="tambahForm('${v.jenis_form}','${v.nama_file}','${v.id_pegawai}')" title="Klik, untuk menandatangani File" style="padding-top: 0px; padding-bottom: 0px; padding-left: 6px; padding-right: 6px;">
												<i class="blinker"> <i class="fas fa-spinner  m-r-5 "></i> Belum</i></button>`;
						} else {
							esign_file = `<button type="button" class="btn btn-primary waves-effect" onclick="tambahForm('${v.jenis_form}','${v.nama_file}','${v.id_pegawai}')" title="Klik, untuk megecek ketersediaan file" style="padding-top: 0px; padding-bottom: 0px; padding-left: 6px; padding-right: 6px;">
											<i class="fas fa-upload"></i> Upload</button>`;					
						}
					} 

					let kirim = '';
					if((v.id_mcu_kirim  !== null ) && (v.is_ready  == '1') && (v.status_email !='Berhasil') ){
						kirim 	 = `<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" id="${v.id}" onclick="updateKirimFile(${v.id}, ${v.id_mcu_kirim}, ${v.is_kirim})" ${(v.is_kirim == 1 ? 'checked' : '')}>
										<label class="custom-control-label" for="${v.id}" style="margin-bottom: 0px;">${(v.is_kirim == '1' ? '<h5><span class="label label-success">Ya</span></h5>' 
																																		   : '<h5><span class="label label-danger" style="padding-left: 3px; padding-right: 3px;">Tidak</span></h5>')}</label>
									</div>`;			
					} else {
						kirim 	 = `<div>	
										<label style="margin-bottom: 0px;">${(v.is_kirim == '1' ? 
											'<h5 title="Tidak bisa ubah, tekan tombol "Proses" untuk mengecek keterseidan file !"><span class="label label-success">Ya</span></h5>' 
										  : '<h5 title="Tidak bisa ubah, tekan tombol "Proses" untuk mengecek keterseidan file !."><span class="label label-danger" style="padding-left: 3px; padding-right: 3px;">Tidak</span></h5>')}</label>
									</div>`;
					}					
						
					let tindakan_lab = v.jenis_file == 'lab' ? `<button type="button" class="btn btn-secondary btn-xxs m-l-5" onclick="getTindakanLab('${v.id_file}')"><i class="fas fa-eye m-r-5"></i>Tindakan</button>` : ``;
					
					let btn_hapus = ``;
					if(v.status_email =='Berhasil') {
						btn_hapus = `<button type="button" class="btn btn-secondary btn-xxs" disabled title="Sudah terkirim, tidak bisa hapus file!"><i class="fas fa-trash-alt"></i></button>`;
					} else {
						btn_hapus = `<button type="button" class="btn btn-secondary btn-xxs" onclick="KonfirmasiHapusFile('${v.id}')" title="Hapus file."><i class="fas fa-trash-alt"></i></button>`;

					}
					
									// <td class="left">${is_ready}</td>
					let html = `<tr>
									<td class="center">${no}</td>
									<td class="left">${v.nama_file}</td>
									<td class="left">${v.tgl_form && v.tgl_form !== 'null' ? v.tgl_form : '-'}</td>
									<td class="left">${v.kode_file ? v.kode_file + tindakan_lab : '-'}</td>
									<td class="left">${v.nama_dokter ? v.nama_dokter : '-'}</td>
									<td class="left">${esign_file}</td>
									<td class="left">${kirim}</td>
									<td class="left">${v.pegawai_file !== null  ? v.pegawai_file : '-'}</td>
									<td class="left">${((v.created_at !== null) ? datetimefmysql(v.created_at) : '-')}</td>
									<td class="right">${btn_hapus}</td>
								</tr>`;
					$('#table-file-kirim tbody').append(html);					
				});
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}
	function KonfirmasiHapusFile(id){
		Swal.fire({
			title: 'Konfirmasi Hapus File',
			html: "Apakah anda yakin ingin menghapus file ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-trash-alt mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Tidak',	
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				hapusFile(id)
			}
		})
	}

	function hapusFile(id){
		$.ajax({
			type: 'DELETE',
            // url: baseUrlMcuOnline + '/get_list_file_kirim/id/' + id,			
			url: `${baseUrlMcuOnline}/hapus_file/id/${id}`,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				messageDeleteSuccess();
				reloadFileKirim();
			},
			error: function(e) {
				messageDeleteFailed();
			}
		});
	}

	function getTindakanLab(id){
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/tindakan_lab") ?>/id/'+ id,
			cache: false,
			dataType : 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {  				
				swalAlert('', 'Tindakan Laboratorium', data.tindakan_lab);
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal '+e, 'Error');
			}
		});    
	}

	function fileReady(lokasi_file) {

		let url = lokasi_file;
		// url = url.replace("https://10.10.10.11", "https://labrsud.tangerangkota.go.id");

		window.open(url, 'Cetak PDF', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);			
		// window.open('<?php echo base_url() ?>hasil_laboratorium/cetak_pdf_laboratorium/' + kode,
		// 	'Cetak PDF Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);			
	}

	function fileNotReady(id,lokasi_file){
		let lokasifile = btoa(lokasi_file);
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/cek_file") ?>/lokasi_file/' + lokasifile + '/id/' + id,
			cache: false,
			dataType : 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {  
				if(data.status){
					messageCustom('File tersedia! ', 'Success');

					reloadFileKirim();
				}else {
					messageCustomResponError('File belum tersedia! ', data);
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal '+e, 'Error');
			}
		});    
	}

	function showModal(mainMessage, errorCode, errorText) {
		$('#customModalMessage').text(mainMessage);
		$('#errorCode').text(errorCode);
		$('#errorText').text(errorText);
		$('#customModal').css('display', 'flex');
		$('#errorDetail').addClass('hidden');
	}

	function closeModal() {
    	$('#customModal').hide();
	}

	function toggleDetail() {
		$('#errorDetail').toggleClass('hidden');
	}

	function messageCustomResponError(message, extra = {}) {
		if (extra.status === false) {
			showModal( message, extra.code || '-', extra.message || '-' );
			return;
		}

		toastr.error(message, 'Error', {
			toastClass: "toast",
			containerId: "toast-container",
			showMethod: "fadeIn",
			hideMethod: "fadeOut",
			showEasing: "swing",
			newestOnTop: false,
			progressBar: true,
			closeButton: true,
			timeOut: "1500",
			positionClass: "toast-bottom-right"
		});
	}

	function updateKirimFile(id,id_mcu_kirim,is_kirim) {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/update_kirim_file') ?>',
			data: 'id=' + id + '&id_mcu_kirim=' + id_mcu_kirim + '&is_kirim=' + is_kirim,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status !== false) {
					messageCustom(data.message, 'Success');
					reloadFileKirim();
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			error: function(e) {
				messageCustom('error', 'Error', 'Sistem Error');
			}
		})
	}

	function konfirmasiKirimEmail() {
		id_pendaftaran = $('#id-pendaftaran-detail').val();
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/get_file_terpilih")  ?>/id_pendaftaran/' +  id_pendaftaran,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {  				
				if(data.jumlah <= 0){
						swalAlert('warning', 'Pilih file minimal 1', 'Silahkan aktifkan file yang diperlukan !');
						reloadFileKirim();
				} else {
					if(data.data.status_email == 'Berhasil' && accountGroup !== 'Admin' ){
						swalAlert('info', 'Info', 'Hasil MCU sudah terkirim, gagal kirim ulang! Silahkan minta IT untuk konfirmasi kirim ulang');
					} else {
						Swal.fire({
							title: 'Konfirmasi file yang akan dikirim via Email',
							html: "Apakah anda yakin ingin mengirim file dengan Jenis File ?<br>"+ data.data.jenis_file,
							icon: 'question',
							showCancelButton: true,
							confirmButtonText: '<i class="fas fa-save mr-1"></i>Kirim',
							cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
							reverseButtons: true
						}).then((result) => {
							if (result.value) {
								kirimHasilMcuEmail(id_pendaftaran);
							}
						})
					}					
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal Ambil Data File Terpilih '+e, 'Error');
			}
		});    		
	}	

	function kirimHasilMcuEmail(id_pendaftaran) { 
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("email/api/email/kirim_email_mcu")  ?>/id_pendaftaran/' + id_pendaftaran ,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				 
				if(data.status){
					responHasilEmail(id_pendaftaran, data.status, data.message);
					messageCustom('Kirim hasil MCU via Email, Berhasil! ', 'Success');
				}else {
					responHasilEmail(id_pendaftaran, 'false', data.message);
					messageCustom('Kirim hasil MCU via Email, Gagal! ' + data.message, 'Error');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal Kirim Hasil MCU '+e, 'Error');
			}
		});    
	}

	function responHasilEmail(id_pendaftaran, status, message) {
		$.ajax({
			type : 'GET',
			url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/respon_email")  ?>/id_pendaftaran/' + id_pendaftaran + '/status/' + status + '/message/' + message ,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				// showLoader();
			},
			success: function(data) {
				getListHasilMcu($('#page-now').val());
				$('#modal-pilih-file').modal('hide');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal Kirim Respon Hasil MCU '+e, 'Error');
			}
		});    
	}

	function konfirmasiKirimUlang(id_hasil_mcu) {
		Swal.fire({
			title: 'Konfirmasi Kirim Ulang',
			html: "Apakah anda yakin ingin mengirim ulang hasil MCU?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Tidak',	
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				kirimUlang(id_hasil_mcu)
			}
		})
	}

	function kirimUlang(id_hasil_mcu) {
		$.ajax({
			type : 'GET',					
			url: `${baseUrlMcuOnline}/kirim_ulang/id_hasil_mcu/${id_hasil_mcu}`,
			// url: '<?= base_url("hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/kirim_ulang")  ?>/id_hasil_mcu/' + id_hasil_mcu ,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				getListHasilMcu($('#page-now').val());
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal Kirim Ulang '+e, 'Error');
			}
		});    
	}

	function cekAkunEsign(nik) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("esign/api/esign/get_status_user_nik") ?>/nik/' + encodeURIComponent(nik),
			cache: false,
			dataType: 'json',
			beforeSend: function () {
				showLoader();
			},
			success: function (data) {
				if (data.status) {
					let ket = '';
					let statusMap = {
						'ISSUE'		: 'Pengguna memiliki Sertifikat Elektronik aktif dan bisa melakukan tanda tangan elektronik',
						'EXPIRED'	: 'Masa berlaku Sertifikat Elektronik pengguna telah berakhir',
						'RENEW'		: 'Sertifikat Elektronik milik pengguna sedang dalam proses pembaruan',
						'WAITING_FOR_VERIFICATION': 'Sertifikat Elektronik milik pengguna sedang dalam verifikasi',
						'NEW'		: 'Pengguna memiliki Sertifikat Elektronik namun belum melakukan aktivasi',
						'NO_CERTIFICATE': 'Pengguna sudah terdaftar namun belum memiliki Sertifikat Elektronik',
						'NOT_REGISTERED': 'Pengguna belum terdaftar dan belum memiliki Sertifikat Elektronik',
						'SUSPEND'	: 'Pengguna terdaftar namun dalam kondisi suspend',
						'REVOKE'	: 'Sertifikat Elektronik pengguna sudah dicabut'
					};
					ket = statusMap[data.response.status] || '-';
					$('#cek-passphrase').html(`${data.response.status} : ${ket}`);
				} else {
					let errorData = {
						status: data.status,
						message: data.response,
						code: ''
					};
					messageCustomResponError('Gagal Cek Status User', errorData);
				}
			},
			error: function (xhr, status, error) {
				let errorMsg = `Gagal Cek Akun: ${xhr.status} ${xhr.statusText}`;
				messageCustom(errorMsg, 'Error');
			},
			complete: function () {
				hideLoader();
			}
		});
	}

	
	function lihatFile(id_pendaftaran,id_layanan_pendaftaran,jenis_file,nama_file) {
		let id = '';
		let nama_function = '';
		
		// 2. Surat Keterangan Pengujian Kesehatan
		if(jenis_file == 'ket_uji_sehat'){
			nama_function = 'cetak_form_skpk'; 
		
		// 3. Surat Keterangan Sehat
		} else if(jenis_file == 'ket_sehat'){	
			nama_function = 'cetak_ket_sehat'; 
		
		// 4. Surat Keterangan Bebas Narkoba
		} else if(jenis_file == 'ket_bebas_narkoba'){	
			nama_function = 'cetak_surat_narkoba'; 
			
		// 5. Resume Medis Pasien
		} else if(jenis_file == 'resum_medis'){	
			nama_function = 'cetak_resum_medis_pasien'; 
		
		// 6. Surat Keterangan Kesehatan Jiwa Tipe 1
		} else if(jenis_file == 'ket_kesehatan_jiwa1'){	
			nama_function = 'cetak_ket_jiwa1'; 
		
		// 7. Surat Keterangan Kesehatan Jiwa Tipe 2
		} else if(jenis_file == 'ket_kesehatan_jiwa2'){	
			nama_function = 'cetak_ket_jiwa2'; 
		
		// 8. Surat Keterangan Kesehatan Jiwa Tipe 3
		} else if(jenis_file == 'ket_kesehatan_jiwa3'){	
			nama_function = 'cetak_ket_jiwa3'; 
		
		// 9. Sertifikat Kelaikan Bekerja
		} else if(jenis_file == 'kelaikan_berkerja'){
			nama_function = 'cetak_kelaikan_bekerja'; 
		
		// 10. Laporan Pemeriksaan Kesehatan
		} else if(jenis_file == 'pemeriksaaan_kesehatan'){
			nama_function = 'cetak_form_lpk'; 	
		
		// 11. Surat Keterangan Medis
		} else if(jenis_file == 'ket_medis'){
			nama_function = 'cetak_form_skm'; 	
		
		// 12. Surat Keterangan Disabilitas
		} else if(jenis_file == 'ket_disabilitas'){
			nama_function = 'cetak_disabilitas'; 	
		
		// 13. Surat Keterangan Tidak Disabilitas
		} else if(jenis_file == 'ket_tidak_disabilitas'){
			nama_function = 'cetak_tidak_disabilitas'; 
		
		// 14. Hasil Pemeriksaan Dokter Okupasi
		} else if(jenis_file == 'hasil_okupasi'){
			nama_function = 'cetak_pemeriksaan_okupasi'; 
		}

		jenis_file == 'ket_uji_sehat' ? id = id_pendaftaran : id = id_layanan_pendaftaran;

		if(nama_function != '' ){
			window.open('<?php echo base_url() ?>hasil_mcu_kirim_online/'+nama_function+'/' + id , nama_file, 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);	
		} else {
			swalAlert('info', 'Info', 'File <b>'+ nama_file +'</b> tidak dapat dilihat, hubungi IT !');
		}
			
	}

	
</script>

