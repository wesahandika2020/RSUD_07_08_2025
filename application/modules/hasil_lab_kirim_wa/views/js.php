<style>
	.table-freeze {
		height: 80vh;
		margin: 2rem 0;
		overflow: auto;
		scroll-snap-type: both mandatory;
		/* white-space: nowrap; */
	}

	.table-freeze .table {
		margin: 0;
		overflow: unset;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
	}

	/* th,
	td {
		padding: 1rem 2.5rem;
		text-align: left;
	} */

	thead th,
	.freeze-top th {
		/* border-bottom: 1px solid #ccc; */
		font-weight: 600;
		top: 0;
		z-index: 1;
	}

	th.tp {
		background-color: #fff;
		z-index: 2;
	}

	tbody th {
		left: 0;
		text-align: left;
	}

	tbody th,
	th.tp {
		border-right: 1px solid #ccc;
	}

	tr {
		padding: 0;
	}

	td {
		color: #555;
		vertical-align: top;
	}

	/* tbody tr:nth-child(odd) th {
		background-color: #fff;
	}

	thead th,
	tbody tr:nth-child(even) th,
	tr:nth-child(even) td {
		background-color: #f4f4f4;
	} */

	thead th,
	tbody th {
		position: sticky;
		-webkit-position: sticky;
	}

	@media screen and (max-width: 680px) {
		.table-freeze {
			height: 70vh
		}
	}

	@media screen and (max-width: 480px) {
		.table-freeze {
			height: 60vh
		}
	}

	/* #table-data tbody tr td {
		font-size: 11px;
	} */
	#parent {
		height: 500px;
		overflow-y: auto;
		overflow-x: 0;
	}

	/* #table-lap-mutasi-obat {
        width: 100% !important;
    } */
</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var accountGroup = "<?= $this->session->userdata('account_group') ?>";

	$(function() {	
		$('#jenis-tanggal').val('keluar');
		$('#akun-akses').val('0');
		$('#akun-id-unit').val('0')
		$('#akun-id-unit').val("<?= $this->session->userdata('id_unit') ?>");
		
		getListHasilLabWa(1);

		$('#jenis-laboratorium').change(function() {
			getListHasilLabWa(1);
		});

		$('#btn-reload').click(function() {
			resetAllData();
			getListHasilLabWa(1);
		});

		$('#btn-search').click(function() {
			$('#modal-search').modal('show');
		});

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#jenis-rawat').empty();
		$('#jenis-pendaftaran').empty();

		// IGD
		if(($('#akun-id-unit').val() == '260') ){ 
			$('#akun-akses').val('1');
			$('#jenis-rawat').append('<option value="Jalan">Rawat Jalan</option>');
			$('#jenis-pendaftaran').append('<option value="IGD">IGD</option>');
			$('#jenis-pendaftaran').append('<option value="Poliklinik">Poliklinik</option>');

		// RANAP
		} else if(($('#akun-id-unit').val() == '237') || ($('#akun-id-unit').val() == '238') || ($('#akun-id-unit').val() == '239') || ($('#akun-id-unit').val() == '240') || ($('#akun-id-unit').val() == '241')
				|| ($('#akun-id-unit').val() == '242') || ($('#akun-id-unit').val() == '243') || ($('#akun-id-unit').val() == '297') || ($('#akun-id-unit').val() == '300') || ($('#akun-id-unit').val() == '309')
				|| ($('#akun-id-unit').val() == '310') || ($('#akun-id-unit').val() == '311') || ($('#akun-id-unit').val() == '312') || ($('#akun-id-unit').val() == '324') || ($('#akun-id-unit').val() == '351') ){ // RANAP
			$('#akun-akses').val('1');
			$('#jenis-rawat').append('<option value="Inap">Rawat Inap</option>');
			$('#jenis-pendaftaran').append('<option value="IGD">IGD</option>');
			$('#jenis-pendaftaran').append('<option value="Poliklinik">Poliklinik</option>');

		// ICARE
		} else if(($('#akun-id-unit').val() == '252') || ($('#akun-id-unit').val() == '254') || ($('#akun-id-unit').val() == '255') || ($('#akun-id-unit').val() == '256') 
				|| ($('#akun-id-unit').val() == '257') || ($('#akun-id-unit').val() == '258') || ($('#akun-id-unit').val() == '307')  ){ 
			$('#akun-akses').val('1');
			$('#jenis-rawat').append('<option value="Jalan">Rawat Jalan</option>');
			$('#jenis-rawat').append('<option value="Inap">Rawat Inap</option>');
			$('#jenis-pendaftaran').append('<option value="Hemodialisa">Hemodialisa</option>');
			$('#jenis-pendaftaran').append('<option value="Laboratorium">Laboratorium</option>');
			$('#jenis-pendaftaran').append('<option value="Radiologi">Radiologi</option>');

		// LAB
		} else if(($('#akun-id-unit').val() == '292') || ($('#akun-id-unit').val() == '293') || ($('#akun-id-unit').val() == '298') ){ 
			$('#akun-akses').val('1');
			$('#jenis-rawat').append('<option value="">- Semua -</option>');
			$('#jenis-rawat').append('<option value="Jalan">Rawat Jalan</option>');
			$('#jenis-rawat').append('<option value="Inap">Rawat Inap</option>');
			$('#jenis-pendaftaran').append('<option value="">- Semua - </option>');
			$('#jenis-pendaftaran').append('<option value="Hemodialisa">Hemodialisa</option>');
			$('#jenis-pendaftaran').append('<option value="IGD">IGD</option>');
			$('#jenis-pendaftaran').append('<option value="Laboratorium">Laboratorium</option>');
			$('#jenis-pendaftaran').append('<option value="Poliklinik">Poliklinik</option>');
			$('#jenis-pendaftaran').append('<option value="Radiologi">Radiologi</option>');

		// ADMIN
		} else if(($('#akun-id-unit').val() == '296')){ 
			$('#akun-akses').val('1');
			$('#jenis-rawat').append('<option value="">- Semua -</option>');
			$('#jenis-rawat').append('<option value="Jalan">Rawat Jalan</option>');
			$('#jenis-rawat').append('<option value="Inap">Rawat Inap</option>');
			$('#jenis-pendaftaran').append('<option value="">- Semua - </option>');
			$('#jenis-pendaftaran').append('<option value="Hemodialisa">Hemodialisa</option>');
			$('#jenis-pendaftaran').append('<option value="IGD">IGD</option>');
			$('#jenis-pendaftaran').append('<option value="Laboratorium">Laboratorium</option>');
			$('#jenis-pendaftaran').append('<option value="Poliklinik">Poliklinik</option>');
			$('#jenis-pendaftaran').append('<option value="Radiologi">Radiologi</option>');
		}

		
	});

	function paging(page) {
		getListHasilLabWa(page);
	}	

    function resetAllData() {
		let filter = $('#jenis-laboratorium').val();
		$('#id, .form-control, #pencarian, #dokter-ranap, #dokter-pjwb-auto, #dokter-pjwb').val('');
		$('#tanggal-awal, #tanggal-akhir').val('<?= date("d/m/Y") ?>');
		$('#s2id_dokter-ranap a .select2-chosen').html('Pilih Dokter');
		$('.select2c-input').val('');
		$('.select2c-chosen').html('');
		$('#jenis-laboratorium').val(filter);
	}

	function getStatus(sts, jumlah = 0){

		if(sts == 'Berhasil'){
			status = `<span class="m-r-5">
						<i class="fas fa-fw fa-check m-r-1 text-success" style="margin-bottom: 10px;"></i>
						<span class="text-dark">Berhasil` +(jumlah <=0 ? `` : ` ke `+jumlah) +`</span>
					</span>`;
		} else if (sts == 'Gagal'){
			status =`<span class="m-r-5">
						<i class="fas fa-fw fa-times m-r-1 text-danger" style="margin-bottom: 10px;"></i>
						<span class="text-dark">Gagal</span>
					</span>`;
		} else if (sts == 'Ubah'){
			status =`<span class="m-r-5">
						<i class="fas fa-fw fas fa-redo m-r-1 text-danger" style="margin-bottom: 10px;"></i>
						<span class="text-dark">Silahkan Kirim Ulang</span>
					</span>`;
		} else if (sts == 'CekFile'){
			status =`<span class="m-r-5 blinker">
						<i class="fas fa-fw fa-spinner fa-spin m-r-1" style="margin-bottom: 10px; color: blue;"></i>
						<span class="text-dark">Cek File PDF</span>
					</span>`;
		} else {
			status =`<span class="m-r-5 blinker">
						<i class="fas fa-fw fa-spinner fa-spin m-r-1 text-primary" style="margin-bottom: 10px;"></i>
						<span class="text-dark">Belum dikirim</span>
					</span>`;
		}
		return status;
	}

	function getListHasilLabWa(page) {
		page <= 0 ? page=1 : page=page;
		$('#page-now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/get_list_hasil_lab") ?>/page/' + page,
			data: $('#form-search').serialize() ,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListHasilLabWa(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let no_telp = ((v.telp !== '') ? v.telp : '');
					let email   = (v.email != null && v.email.trim() !== '' ? v.email : '<i class="blinker" style="color: red;">Email belum diinput</i>');
                    let onclik_no_telp = `onclick="editNoTelp('${v.id}', '${v.id_pasien}', '${no_telp}')" style="text-decoration: underline"`;

					let kirimWa    	 = ``;
					let responWA     = ``;

					responWA = `<table>
									<tr><td colspan=2><b>- PENGIRIM -</b></td></tr>
									<tr><td>User &nbsp;</td> 		<td> : ` + (v.nama_user !== null ? v.nama_user : '-') + `</td></tr>
									<tr><td>Waktu Kirim &nbsp;</td> <td> : ` + (v.waktu_kirim !== null ? v.waktu_kirim : '-') + `</td></tr>
									<tr><td colspan=2><b>- RESPON WA -</b></td></tr>
									<tr><td>Status &nbsp;</td>      <td> : ` + (v.status !== null ? v.status : '-') + `</td></tr>
									<tr><td>Respon &nbsp;</td>      <td> : ` + (v.respon !== null ? v.respon : '-') + `</td></tr>
									<tr><td>Waktu Respon &nbsp;</td> <td> : ` + (v.waktu_respon !== null ? v.waktu_respon : '-') + `</td></tr>
								</table>`;				
					
					let btnCekFile 	  = getStatus('CekFile') +'<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs m-r-5" onclick="cekFile(\'' + v.id + '\')" title="Cek File PDF" style="z-index: 0; color: blue; border: solid 1px blue;"><i class="fas fa-search" style="width: 12px; height: 12px;"></i></button>';
					let btnKirimWa    = getStatus(v.status, v.jml_wa_berhasil) +`<button type="button" class="btn btn-secondary btn-xs mypopover m-r-5" onclick="konfirmasiKirimHasilLabWa('${v.id}','${v.status}')" data-container="body" data-toggle="popover" data-placement="left" style="z-index: 0; z-index: 0;color: #009c75;border: solid 1px #009c75;" data-content="` + responWA + `"><i class="fab fa-whatsapp" style="width: 12px; height: 12px;"></i></button>`;
					let btnKirimUlang = `<button type="button" class="btn btn-primary btn-xs m-r-5" onclick="konfirmasiKirimUlangLabWa('${v.id}')" title="Kirim Ulang" style="z-index: 0;"><i class="fas fa-redo" style="width: 12px; height: 12px;"></i></button>`;
					let btnKirimEmail = getStatus(v.status_email, v.jml_email_berhasil) +`<button type="button" class="btn btn-secondary btn-xs m-r-5" onclick="konfirmasiKirimHasilLabEmail('${v.id}','${v.email}')" title="Kirim Email" style=" color: red; border: solid 1px red;" style="z-index: 0;"><i class="far fa-envelope" style="width: 12px; height: 12px;"></i></button>`;
					
										
						// let nama_file = '';
						// $.each(v.data_layanan, function(i_f, v_f) {
						// 	nama_file == '' ? nama_file = v_f.kode : nama_file = nama_file+','+v_f.kode;							
						// });
											
						
					if(!v.orderComplate){
						btnOption  = '<b><i style="color: red;">Order Lab belum selesai semua</i></b>';
					} else {
						if(v.fileComplate){
							btnOption =  btnKirimWa  + (accountGroup == 'Admin' ? btnKirimUlang : '') + `<br>` + btnKirimEmail ;
						} else{
							if(v.status== 'Berhasil'){
								let notif = '<b><i style="color: red;">Hasil sudah terkirim namun<br>ada hasil baru. Silahkan minta IT<br>untuk konfirmasi kirim ulang</i></b>';
								btnOption = accountGroup == 'Admin' ? notif + btnKirimUlang  : notif;
							} else {
								btnOption = btnCekFile;
							}
						}
					}


					$('#akun-akses').val() == 1 ? btnOption = btnOption : btnOption='';
					// (v.tanggal_keluar != null) ? btnOption=kirimWa + btnCekFile  : btnOption='';
					// $.each(v.data_layanan, function(key2, value2) {
					// 	if((v.jenis_pendaftaran == 'Poliklinik') && (value2.is_cito == '1')){
					// 		btnOption = kirimWa + btnCekFile
					// 	}
					// });

					// if(v.orderComplate == false ){
					// 	kirimWa    = '';
					// 	btnCekFile = '';
					// 	btnOption  = '<b><i style="color: red;">Order Lab belum selesai semua</i></b>';
					// }

					// <td style="background-color: #d8eef9;"><span class="pointer" ${onclik_no_telp} title="Klik untuk mengedit no telp"><b> ${no_telp} </b></span></td>

					let kunjungan  = "No Register: <b>" + v.no_register+"</b>"+
									 "<br>Daftar: "+(v.tanggal_daftar !== null ? datetimefmysql(v.tanggal_daftar) : '-') + 
								     "<br>Pulang:"+(v.tanggal_keluar !== null ? datetimefmysql(v.tanggal_keluar) : '-');
					let pasien     = '<b>'+v.id_pasien + '<br>' + v.nama+'</b>';	
					let data_kirim = no_telp + '<br>' + email;	

					let jenis_pendaftaran = v.jenis_pendaftaran=='Poliklinik' ? v.keterangan.replace(/Poliklinik/g, "").trim() : v.jenis_pendaftaran ;
					let layanan	   = 'Rawat ' + (v.jenis_rawat !== '' ? v.jenis_rawat : '') + '<br>' + (jenis_pendaftaran !== '' ? 'Pendaftaran: '+jenis_pendaftaran :'');
					
					// ;


					// if(jenis_pendaftaran !== 'Rawat Inap'){
					// 	layanan = layanan + '<br>' + (jenis_pendaftaran !== '' ? jenis_pendaftaran :'');
					// }
					
					let html = /* html */ `
						<tr>
							<td style="background-color: #d8eef9;" class="center">${no}</td>
							<td style="background-color: #d8eef9;" class="nowrap">${kunjungan}</td>
							<td style="background-color: #d8eef9;">${pasien}</td>
                        	<td style="background-color: #d8eef9;" class="nowrap">${data_kirim}</td>
							<td style="background-color: #d8eef9;" class="nowrap">${layanan}</td>
					`;
					
					$.each(v.data_layanan, function(key, value) {
						let jenis_lab = '';
						if(value.jenis == 'Patologi Klinik'){ jenis_lab = 'PK'}
						else if(value.jenis == 'Patologi Anatomi'){ jenis_lab = 'PA'}
						else if(value.jenis == 'Mikrobiologi'){ jenis_lab = 'MB'}
						else if(value.jenis == 'Bank Darah'){ jenis_lab = 'BD'}
						else {jenis_lab = ''}

						let is_exist = ``;
						let kirim  	 = ``;

						if(value.is_exist  == '1'){
							is_exist = `<button type="button" class="btn btn-xxs m-r-0" style="padding-left: 0px;"onclick="cetakHasilPDF('`+value.id_pasien+`','`+value.kode+`')"> <i class="fas fa-fw fa-check m-l-5" title="File siap dikirim."></i></button>` ;						
						} else {
							is_exist = `<i class="fas fa-fw fa-clock m-l-5" style="color: red;" title="Cek File untuk melihat ketersediaan, jika belum ada hubungi LIS!"></i>`;				
						}

						if((value.is_exist  == '1') && (v.status!='Berhasil') && (value.status_hasil !='Batal')){	
							kirim 	 = `<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="${value.id_labdt_wa}" onclick="updateKirimFile(${v.id}, ${value.id_lab_wa}, ${value.id_labdt_wa}, ${value.is_kirim})" ${(value.is_kirim == 1 ? 'checked' : '')}>
											<label class="custom-control-label" for="${value.id_labdt_wa}" style="margin-bottom: 0px;">${(value.is_kirim == '1' ? '<h5><span class="label label-success">Ya</span></h5>' 
																																						: '<h5><span class="label label-danger" style="padding-left: 3px; padding-right: 3px;">Tidak</span></h5>')}</label>
										</div>`;			
						} else {
							kirim 	 = `<div>
											<label style="margin-bottom: 0px;">${(value.is_kirim == '1' ? 
												'<h5 title="Tidak bisa ubah, file belum tersedia."><span class="label label-success">Ya</span></h5>' 
												: '<h5 title="Tidak bisa ubah, file belum tersedia."><span class="label label-danger" style="padding-left: 3px; padding-right: 3px;">Tidak</span></h5>')}</label>
										</div>`;
						}						

						let status_order = value.status == 'konfirm' ?  value.status : '<i style="color: red;">'+value.status+'</i>' ;
						let status_hasil = value.status_hasil == 'Batal' ? '<i style="color: red;"> - '+value.status_hasil+'</i>' : '' ;
						if(v.data_layanan.length == 1){
							html += `<td style="background-color: #d8eef9;"><b>(${key+1})</b> ${jenis_lab} - ${status_order} ${status_hasil} ${((value.is_cito == '1') ? ' <b>CITO</b>' :'' )}</td>
									 <td style="background-color: #d8eef9;">${((value.waktu_konfirm !== null) ? datetimefmysql(value.waktu_konfirm) : '-') }</td>									 
									 <td style="background-color: #d8eef9;">${value.kode !== null ? value.kode + is_exist : '-'}</td>
									 <td style="background-color: #d8eef9;">${kirim}</td>
									 <td style="background-color: #d8eef9;">${value.item}</td>
									 <td style="background-color: #d8eef9;text-align: right;" class="nowrap">${btnOption}</td>`;
						} else {
							if(key == 0 ){
								html += `<td style="background-color: #d8eef9;"><b>(${key+1})</b> ${jenis_lab} - ${status_order} ${status_hasil} ${((value.is_cito == '1') ? ' <b>CITO</b>' :'' )}</td>
									 	 <td style="background-color: #d8eef9;">${((value.waktu_konfirm !== null) ? datetimefmysql(value.waktu_konfirm) : '-' )}</td>
										 <td style="background-color: #d8eef9;">${value.kode !== null ? value.kode + is_exist : '-'}</td>
										 <td style="background-color: #d8eef9;">${kirim}</td>
										 <td style="background-color: #d8eef9;">${value.item}</td>
										 <td style="background-color: #d8eef9;text-align: right;" class="nowrap">${btnOption}</td>`;

							} else {
								html += `<tr>
											<td colspan=5"></td>
											<td><b>(${key+1})</b> ${jenis_lab} - ${status_order} ${status_hasil} ${((value.is_cito == '1') ? ' <b>CITO</b>' :'' )}</td>
									 		<td>${((value.waktu_konfirm !== null) ? datetimefmysql(value.waktu_konfirm) : '-')	 }</td>
											<td>${value.kode !== null ? value.kode + is_exist : '-'}</td>
											<td>${kirim}</td>
											<td>${value.item}</td>
											<td></td>
										</tr>`;
							}
						}						
                    });
					html +=	` </tr> `;

					$('#table-data tbody').append(html);
					
				});

				$('.mypopover').popover({
					html: true,
					trigger: 'hover',
					sanitize: false,
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

	function updateKirimFile(id_pendaftaran, id_lab_wa, id_labdt_wa, is_kirim) {

		if(is_kirim == '0'){
			$.ajax({
				type : 'GET',   
				url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/get_file_terpilih")  ?>/id_pendaftaran/' + id_pendaftaran ,
				cache: false,
				dataType : 'json',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {  
					if(data.jumlah >= 4){
						swalAlert('warning', 'File terpilih lebih dari 4 !', 'Silahkan non aktifkan yang tidak diperlukan dan ulangi memilih !');
						getListHasilLabWa($('#page-now').val());
					} else {
						$.ajax({
							type: 'POST',
							url: '<?php echo site_url('hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/update_kirim_file') ?>',
							data: 'id_lab_wa=' + id_lab_wa + '&id_labdt_wa=' + id_labdt_wa + '&is_kirim=' + is_kirim,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status !== false) {
									getListHasilLabWa($('#page-now').val());
									messageCustom(data.message, 'Success');
								} else {
									messageCustom(data.message, 'Error');
								}
							},
							error: function(e) {
								messageCustom('error', 'Error', 'Sistem Error');
							}
						})
					}					
				},
				complete: function() {
					hideLoader();
				},
				error: function(e){
					messageCustom('Gagal Ambil Data File Terpilih '+e, 'Error');
				}
			});    
		} else {
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/update_kirim_file') ?>',
				data: 'id_lab_wa=' + id_lab_wa + '&id_labdt_wa=' + id_labdt_wa + '&is_kirim=' + is_kirim,
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					if (data.status !== false) {
						getListHasilLabWa($('#page-now').val());
						messageCustom(data.message, 'Success');
					} else {
						messageCustom(data.message, 'Error');
					}
				},
				error: function(e) {
					messageCustom('error', 'Error', 'Sistem Error');
				}
			})
		}	
    }

	function konfirmasiKirimHasilLabWa(id_pendaftaran,status) {
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/get_file_terpilih")  ?>/id_pendaftaran/' + id_pendaftaran ,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {  				
				if(data.jumlah <= 0){
						swalAlert('warning', 'Pilih file minimal 1', 'Silahkan aktifkan file yang diperlukan !');
						getListHasilLabWa($('#page-now').val());
				} else {
					if(status == 'Berhasil' && accountGroup !== 'Admin' ){
						swalAlert('info', 'Info', 'Hasil lab sudah terkirim, gagal kirim ulang! Silahkan minta IT untuk konfirmasi kirim ulang');
					} else {
						let kode = '';
						$.each(data.data, function(i, v) {
							kode +='<br> - '+v.kode;					
						});

						Swal.fire({
							title: 'Konfirmasi file yang akan dikirim via WA',
							html: "Apakah anda yakin ingin mengirim file dengan kode terpilih berikut ?"+kode,
							icon: 'question',
							showCancelButton: true,
							confirmButtonText: '<i class="fas fa-save mr-1"></i>Kirim',
							cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
							reverseButtons: true
						}).then((result) => {
							if (result.value) {
								kirimHasilLabWa(id_pendaftaran);
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

	function kirimHasilLabWa(id_pendaftaran) { 
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("whatsapp/api/whatsapp/kirim_hasil_lab_merge")  ?>/id_pendaftaran/' + id_pendaftaran ,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {  
				if(data.status){
					responHasilLabWa(id_pendaftaran, data.status, data.message);
					messageCustom('Kirim hasil lab via Wa, Berhasil! ', 'Success');
				}else {
					responHasilLabWa(id_pendaftaran, 'false', data.message);
					messageCustom('Kirim hasil lab via Wa, Gagal! ' + data.message, 'Error');
				}
			},
			complete: function() {
				// hideLoader();
			},
			error: function(e){
				messageCustom('Gagal Kirim Hasil Lab '+e, 'Error');
			}
		});    
	}

	function konfirmasiKirimUlangLabWa(id_pendaftaran) {
		Swal.fire({
			title: 'Konfirmasi Kirim Ulang Hasil Lab WA',
			html: "Apakah anda yakin ingin mengirim ulang Hasil Lab ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Tidak',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				kirimUlangLabWa(id_pendaftaran);
			}
		})  		
	}	

	function kirimUlangLabWa(id_pendaftaran) { 
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/kirim_ulang_lab_wa")  ?>/id_pendaftaran/' + id_pendaftaran ,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {  
				if(data.status){
					messageCustom('Kirim Ulang hasil lab via Wa, Berhasil! ', 'Success');
				}else {
					messageCustom('Kirim Ulang hasil lab via Wa, Gagal! ' , 'Error');
				}
				getListHasilLabWa($('#page-now').val());
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal Kirim Ulang Hasil Lab '+e, 'Error');
			}
		});    
	}

	function responHasilLabWa(id_pendaftaran, status, respon) {
		$.ajax({
			type : 'GET',
			url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/respon_kirim_lab_wa")  ?>/id_pendaftaran/' + id_pendaftaran + '/status/' + status + '/respon/' + respon ,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				// showLoader();
			},
			success: function(data) {
				// data.status ? messageCustom('Kirim hasil lab via Wa, Berhasil !', 'Success') : messageCustom('Kirim hasil lab via Wa, Gagal !', 'Error');
				getListHasilLabWa($('#page-now').val());
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal Kirim Hasil Lab '+e, 'Error');
			}
		});    
	}

	function editNoTelp(id, id_pasien, no_telp) {
        bootbox.dialog({
            title : 'Edit No Telp Pasien',
            message: ` <div class="row">
							<div class="col-lg-12">
								<form class="horizontal" id="form-edit-no-telp">
									<div class="form-group">
										<label>No Telp (WA Aktif)</label>
										<input type="text" name="waktu" id="no-telp-input-edit" onkeypress="return hanyaAngka(event)" value="${no_telp}" class="form-control">
									</div>
								</form>
							</div>
						</div> `,

            buttons: {
                success: {
                    label: '<i class="fas fa-save mr-2"></i>Simpan',
                    className: 'btn-info',
                    callback: function() {
                        let telpInputEdit = $('#no-telp-input-edit').val();
                        simpanNoTelp(id, id_pasien, telpInputEdit);
                    }
                }
            }
        });

        $('#form-edit-no-telp').submit(function() {
            let telpInputEdits = $('#no-telp-input-edit').val();
            simpanNoTelp(id, id_pasien, telpInputEdits);
            $('.bootbox').modal('hide');
            return false;
        });
    }

	function simpanNoTelp(id, id_pasien, telp) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/update_notlp") ?>',
            data: 'id=' + id + '&id_pasien=' + id_pasien + '&telp=' + telp,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    getListHasilLabWa($('#page-now').val());
                    messageEditSuccess();
                } else {
                    messageEditFailed();
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
	
	function cekFile(id_pendaftaran) 
	{
        $.ajax({
            type: 'GET',
            url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/get_hasil_lab") ?>/id/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if(data.status){
                    messageEditSuccess();
					getListHasilLabWa($('#page-now').val());
                } else {
                    messageEditFailed();
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }
	
	function cetakHasilPDF(id_pasien, kode) {
		var ono = $('#no-ono').val();
		window.open('<?php echo base_url() ?>hasil_laboratorium/cetak_pdf_laboratorium/' + kode,
			'Cetak PDF Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);			
		// window.open('http://10.10.10.11/rsud/'+id_pasien+'_'+kode+'.pdf');			
	}


	function konfirmasiKirimHasilLabEmail(id_pendaftaran, email) {
		console.log(email);
		if(email == 'null'){
			swalAlert('warning', 'Email Kosong', 'Silahkan isi email pasien terlebih dahulu !');
		} else if(email.trim() == '' ){
			swalAlert('warning', 'Email Kosong', 'Silahkan isi email pasien terlebih dahulu !');
		} else {
			$.ajax({
				type : 'GET',   
				url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/get_file_terpilih")  ?>/id_pendaftaran/' + id_pendaftaran ,
				cache: false,
				dataType : 'json',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {  				
					if(data.jumlah <= 0){
							swalAlert('warning', 'Pilih file minimal 1', 'Silahkan aktifkan file yang diperlukan !');
							getListHasilLabWa($('#page-now').val());
					} else {
						let kode = '';
						$.each(data.data, function(i, v) {
							kode +='<br> - '+v.kode;					
						});

						Swal.fire({
							title: 'Konfirmasi kirim melalui Email',
							html: "Apakah anda yakin ingin mengirim file dengan kode terpilih berikut ?"+kode,
							icon: 'question',
							showCancelButton: true,
							confirmButtonText: '<i class="fas fa-save mr-1"></i>Kirim',
							cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
							reverseButtons: true
						}).then((result) => {
							if (result.value) {
								kirimHasilLabEmail(id_pendaftaran);
							}
						})				
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
	}	

	function kirimHasilLabEmail(id_pendaftaran) { 
		$.ajax({
			type : 'GET',   
			url: '<?= base_url("email/api/email/kirim_email_lab")  ?>/id_pendaftaran/' + id_pendaftaran ,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				 
				if(data.status){
					responHasilEmail(id_pendaftaran, data.status, data.message);
					messageCustom('Kirim hasil lab via Email, Berhasil! ', 'Success');
				}else {
					responHasilEmail(id_pendaftaran, 'false', data.message);
					messageCustom('Kirim hasil lab via Email, Gagal! ' + data.message, 'Error');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal Kirim Hasil Lab '+e, 'Error');
			}
		});    
	}

	function responHasilEmail(id_pendaftaran, status, respon) {
		$.ajax({
			type : 'GET',
			url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/respon_kirim_lab_email")  ?>/id_pendaftaran/' + id_pendaftaran + '/status_email/' + status + '/respon/' + respon ,
			cache: false,
			dataType : 'json',
			beforeSend: function() {
			},
			success: function(data) {
				// data.status ? messageCustom('Kirim hasil lab via Wa, Berhasil !', 'Success') : messageCustom('Kirim hasil lab via Wa, Gagal !', 'Error');
				getListHasilLabWa($('#page-now').val());
			},
			complete: function() {
				hideLoader();
			},
			error: function(e){
				messageCustom('Gagal Kirim Hasil Lab '+e, 'Error');
			}
		});    
	}
	
</script>
