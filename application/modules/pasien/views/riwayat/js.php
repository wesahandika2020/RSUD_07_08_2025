<script>
	var numeroo = 1;
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	$(function() {
		$('#tabRiwayat a:last').click(function() {
			if ($('#id-pendaftaran-rm').val() !== '') {
				getDataKunjungan($('#id-pendaftaran-rm').val())
				$('#list-kunjungan li:first').addClass('active');
			}
		});
	});

	function showIdentitasIcarePasien(data) {

		let html = '';

		html += /* html */ `
            <div class="row mb-2">
                <div class="col-lg-12 ry_title">
                    <h3 class="title_section float-left">${data.jenis_pendaftaran}</h3>
                    <h5 class="float-right"><b>Tanggal ${data.tanggal_kunjungan}</b></h5>
                </div>
            </div>
        `;

		html += /* html */ `
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-no-border table-striped table-hover table-sm">
					<input type="hidden" id="jenis-rawat">
					<input type="hidden" id="id-pendaftaran">
					<input type="hidden" id="id-layanan-pendaftaran">
                        <tbody>
                            <tr>
                                <td width="30%"><b>No. Register</b></td>
                                <td><span>${data.no_register}</span></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Daftar</b></td>
                                <td><span>${datetimefmysql(data.tanggal_daftar)}</span></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Keluar</b></td>
                                <td><span>${datetimefmysql(data.tanggal_keluar)}</span></td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td><span>${data.status}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table table-no-border table-striped table-hover table-sm">
                        <tbody>
                            <tr>
                                <td width="35%"><b>Nama Pen. Jawab</b></td>
                                <td><span>${data.nama_pjwb}</span></td>
                            </tr>
                            <tr>
                                <td><b>Telp Pen. Jawab</b></td>
                                <td><span>${data.telp_pjwb}</span></td>
                            </tr>
                            <tr>
                                <td><b>Alamat Pen. Jawab</b></td>
                                <td><span>${data.alamat_pjwb}</span></td>
                            </tr>
                            <tr>
                                <td><b>Petugas Pendaftaran</b></td>
                                <td><span>${data.petugas_pendaftaran}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        `;

		$('#riwayat-area').append(html);

		$('#riwayat-area').append('<br><br><br>');

	}

	function showDataKunjunganIcare(data) {

		if(typeof data === 'object'){

			if (data && data[0] && 'id' in data[0]) {
			    
			    $.ajax({
					type: 'GET',
					url: '<?= base_url("rekam_medis/api/rekam_medis/get_riwayat_kunjungan_pasien") ?>/id/' + data[0].id,
					cache: false,
					data: '',
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {

						showIdentitasIcarePasien(data);
						if(typeof data.layanan[0] === 'object'){

							let x = data.layanan[0];
							showLayananKunjunganIcare(x)
						
						}

					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Akses data Gagal', 'Error');
					}
				})

			} else {

				messageCustom('Tidak Ada Data Icare', 'Success');

			}
		
		}

	}

	function showLayananKunjunganIcare(v) {

		let html = ''; 
	    let iframeUrl = '';

	    numeroo++;

	    // Inisialisasi HTML sebelum request AJAX
	    html = /* html */ `
	        <div class="row">
	            <div class="col-lg-12">
	    `;

	    $.ajax({
	        type: 'GET',
	        url: '<?= base_url("pasien/api/pasien/dataIcare") ?>/id/' + v.id,
	        cache: false,
	        dataType: 'JSON',
	        beforeSend: function() {
	            showLoader();
	        },
	        success: function(data) {

	        	if (data.metaData.code !== 400) {

                    // Ambil URL dari respons
		            iframeUrl = data.metaData.message;

		            // Tambahkan iframe setelah URL diterima
		            html += /* html */ `
		                <iframe src="${iframeUrl}" width="100%" height="600px" frameborder="0"></iframe>
		            `;

		            // Tutup div
		            html += /* html */ `
		                </div>
		            </div>
		            `;

		            // Masukkan HTML ke elemen yang diinginkan (misalnya '#riwayat-area')
		            $('#riwayat-area').append(html);

					    
				} else {

                    messageCustom(data.metaData.message, 'Success');

                }
	            
	        },
	        complete: function() {
	            hideLoader();
	        },
	        error: function(e) {
	            messageCustom('Akses data Gagal', 'Error');
	        }
	    });

	    return html;
	}


	function clearRiwayatAndKunjungan() {

		let noRm = '';

		if ($('#id-pasien').val() === undefined | $('#id-pasien').val() === '') {

			noRm = $('#id-x-pasien').val();
	    	
		} else {

	    	noRm = $('#id-pasien').val();
	    
	    }
	    
	    $('#tabRiwayat a:last').tab('show');
		$('#riwayat-area').empty();
		// Ubah ukuran riwayat-scroll menjadi col-lg-12 dan sembunyikan klik-hidden
	    $('#riwayat-scroll').removeClass('col-lg-10').addClass('col-lg-12');
	    $('#klik-hidden').hide();


		$.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_data_pasien") ?>/id/' + noRm,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if(data.pasien === null){

					messageCustom('Tidak Ada Data Icare', 'Success');

				} else {

					showDataPasien(data.pasien);
					// showDataIcareKunjungan(data.kunjungan); 00352511
					showDataKunjunganIcare(data.kunjungan);
					// showLayananKunjunganIcare(data);

				}

			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Gagal', 'Error');
			}
		});
	
	}

	function restoreKunjungan(noRm = null) {
		if(noRm !== null){
	    	riwayatPasien(noRm)
	    } else {
	    	riwayatRekamMedisPasien();
	    }

	    // Kembalikan ukuran riwayat-scroll menjadi col-lg-10 dan tampilkan kembali klik-hidden
	    $('#riwayat-scroll').removeClass('col-lg-12').addClass('col-lg-10');
	    $('#klik-hidden').show();
	
	}

	function riwayatPasien(no_rm) {
		$('#tabRiwayat a:last').tab('show');
		$('#riwayat-area').empty();
		$('#id-x-pasien').val('');

		$.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_data_pasien") ?>/id/' + no_rm,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				showDataPasien(data.pasien);
				showDataRiwayatKunjungan(data.kunjungan);
				$('#id-x-pasien').val(no_rm);

				$('#modal-riwayat').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Gagal', 'Error');
			}
		});
	}
	

	function riwayatRekamMedisPasien() {
		let no_rm = '';
		$('#tabRiwayat a:last').tab('show');
		$('#riwayat-area').empty();

		if($('#id-pasien').val() === ''){

			no_rm = $('#id-x-pasien').val();

		} else if ($('#id-pasien').val() === undefined) {

			no_rm = $('#id-x-pasien').val();
	    	
		} else {

	    	no_rm = $('#id-pasien').val();
	    
	    }

	    $.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_data_pasien") ?>/id/' + no_rm,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				showDataPasien(data.pasien);
				showDataRiwayatKunjungan(data.kunjungan);
				$('#modal-riwayat').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Gagal', 'Error');
			}
		});

	}

	function showDataPasien(pasien) {
		let kelamin = '';
		if (pasien.kelamin == 'L') {
			kelamin = 'Laki - laki';
		} else {
			kelamin = 'Perempuan';
		}

		if (pasien.tanggal_lahir !== null) {
			umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
		}

		$('#judul-riwayat').html('<b>' + pasien.id + '</b> ' + '-' + '</b> ' + pasien.nama + '</b> ' + '-' + '</b> ' + pasien.telp);
		$('#no-rm-rm-detail').html(pasien.id);
		$('#nama-rm-detail').html(pasien.nama);
		$('#alamat-rm-detail').html(pasien.alamat);
		$('#kelamin-rm-detail').html(kelamin);
		$('#umur-rm-detail').html(umur);

		pasien.is_alergi === 'Ya' ? $('#logo-pasien-alergi').show() : $('#logo-pasien-alergi').hide();
		pasien.is_died === 'Ya' ? $('#logo-pasien-meninggal').show() : $('#logo-pasien-meninggal').hide();
		pasien.is_hiv === 'Ya' ? $('#logo-pasien-hiv').show() : $('#logo-pasien-hiv').hide();
		pasien.is_gonorrhea === 'Ya' ? $('#logo-pasien-gonorrhea').show() : $('#logo-pasien-gonorrhea').hide();
		pasien.is_hepatitis === 'Ya' ? $('#logo-pasien-hepatitis').show() : $('#logo-pasien-hepatitis').hide();
		pasien.is_kusta === 'Ya' ? $('#logo-pasien-kusta').show() : $('#logo-pasien-kusta').hide();
		pasien.is_tbc === 'Ya' ? $('#logo-pasien-tbc').show() : $('#logo-pasien-tbc').hide();
		pasien.is_covid === 'Ya' ? $('#logo-pasien-covid').show() : $('#logo-pasien-covid').hide();
		pasien.is_potensi_komplain === 'Ya' ? $('#logo-pasien-komplain').show() : $('#logo-pasien-komplain').hide();
		pasien.is_pasien_pejabat === 'Ya' ? $('#logo-pasien-pejabat').show() : $('#logo-pasien-pejabat').hide();
		pasien.is_pemilik_rs === 'Ya' ? $('#logo-pasien-pemilik').show() : $('#logo-pasien-pemilik').hide();


		$('#tempat-lahir-rm-detail').html(pasien.tempat_lahir);
		$('#telp-rm-detail').html(pasien.telp);
		$('#no-identitas-rm-detail').html(pasien.no_identitas);

		$('#agama-rm-detail').html(pasien.agama);
		$('#golongan-darah-rm-detail').html(pasien.gol_darah);
		$('#pendidikan-rm-detail').html(pasien.pendidikan);
		$('#pekerjaan-rm-detail').html(pasien.pekerjaan);
		$('#status-kawin-rm-detail').html(pasien.status_kawin);

		$('#nama-ayah-rm-detail').html(pasien.nama_ayah);
		$('#nama-ibu-rm-detail').html(pasien.nama_ibu);

		$('#alergi-rm-detail').html(pasien.alergi);
	}

	function showDataRiwayatKunjungan(kunjungan) {
		$('#id-pendaftaran-rm').val('');
	    $('#list-kunjungan').empty();
		$.each(kunjungan, function(i, v) {
			if (i === 0) {
				$('#id-pendaftaran-rm').val(v.id);
			}

			let layanan = '';
			$.each(v.layanan, function(i, val) {
				let isLastIndex = false;
				if (i == (v.layanan.length - 1)) {
					isLastIndex = true;
				}
				layanan += `${val.ruang}${!isLastIndex ? ', ' : ''}`;
			})

			v.dpjp != null ? dpjp_nama = v.dpjp.nama : dpjp_nama = '';
			$('#list-kunjungan').append( /* html */ `
								<input type="hidden" id="id-pendaftaran-resume">
                <li class="li_side pointer" onclick="getDataKunjungan(${v.id}, this)">
                    <a style="font-size: 16pt; display: flex; flex-direction: column">
						${v.tanggal_kunjungan}
						<div style="font-weight: lighter; font-size: 12px">
							${dpjp_nama}(<span>${layanan}</span>)
						</div>
					</a>
                </li>    
            `);
		});
	}

	function getDataKunjungan(id_pendaftaran, obj) {
		numeroo = 1;
		$('.li_side').removeClass('active');
		$(obj).addClass('active');
		$('#tabRiwayat a:last').tab('show');
		$('#riwayat-area').empty();

		$.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_riwayat_kunjungan_pasien") ?>/id/' + id_pendaftaran,
			cache: false,
			data: '',
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#id-pendaftaran-resume').val(id_pendaftaran);
				showDataKunjungan(data);
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Gagal', 'Error');
			}
		})
	}

	function showDataKunjungan(data) {
		let html = '';

		html += /* html */ `
            <div class="row mb-2">
                <div class="col-lg-12 ry_title">
                    <h3 class="title_section float-left">${data.jenis_pendaftaran}</h3>
                    <h5 class="float-right"><b>Tanggal ${data.tanggal_kunjungan}</b></h5>
                </div>
            </div>
        `;

		html += /* html */ `
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-no-border table-striped table-hover table-sm">
					<input type="hidden" id="jenis-rawat">
					<input type="hidden" id="id-pendaftaran">
					<input type="hidden" id="id-layanan-pendaftaran">
                        <tbody>
                            <tr>
                                <td width="30%"><b>No. Register</b></td>
                                <td><span>${data.no_register}</span></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Daftar</b></td>
                                <td><span>${datetimefmysql(data.tanggal_daftar)}</span></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Keluar</b></td>
                                <td><span>${datetimefmysql(data.tanggal_keluar)}</span></td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td><span>${data.status}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table table-no-border table-striped table-hover table-sm">
                        <tbody>
                            <tr>
                                <td width="35%"><b>Nama Pen. Jawab</b></td>
                                <td><span>${data.nama_pjwb}</span></td>
                            </tr>
                            <tr>
                                <td><b>Telp Pen. Jawab</b></td>
                                <td><span>${data.telp_pjwb}</span></td>
                            </tr>
                            <tr>
                                <td><b>Alamat Pen. Jawab</b></td>
                                <td><span>${data.alamat_pjwb}</span></td>
                            </tr>
                            <tr>
                                <td><b>Petugas Pendaftaran</b></td>
                                <td><span>${data.petugas_pendaftaran}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        `;

		$('#riwayat-area').append(html);

		html = '';
		$.each(data.layanan, function(i, v) {
			$('#jenis-rawat').val(v.jenis_layanan);
			$('#riwayat-area').append(showLayananKunjungan(v));
		});

		$('#riwayat-area').append('<br><br><br>');
	}

	function showLayananKunjungan(v) {
		let html = '';

		if (v.jenis_layanan == 'Rawat Inap' || v.jenis_layanan == 'Intensive Care') {
			getSOAP = showRMSoapRanap(v.soap_ranap);
		} else {
			getSOAP = showRMSoap(v.anamnesa);
		}

		numeroo++;
		html = /* html */ `
            <ul class="list-group mb-3">
                <li class="list-group-item bg-theme text-white">
                    <i class="fas fa-hospital-alt m-r-5"></i><b>${v.jenis_layanan}</b>
                </li>
                <li class="list-group-item border-theme">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-striped table-hover table-sm">
                                <tbody>
                                    <tr>
                                        <td width="30%">Tanggal Masuk</td>
                                        <td><span>: ${datetimefmysql(v.tanggal_layanan)}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ruangan</td>
                                        <td><span>: ${v.ruang}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Dokter DPJP</td>
                                        <td><span>: ${v.dokter}</span></td>
                                    </tr>									
									<tr>
										<td>Cetak Resume Medis</td>
										<td><span>: <button type="button" class="btn btn-secondary btn-xxs" onclick="btnResumeMedis(${v.id}, '${v.jenis_layanan}')"><i class="fas fa-print m-r-5"></i>Resume Medis</button></span></td>
									</tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-striped table-hover table-sm">
                                <tbody>
                                    <tr>
                                        <td width="30%">Tanggal Keluar</td>
                                        <td><span>: ${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '')}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Cara Bayar</td>
                                        <td><span>: ${v.cara_bayar}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tindak Lanjut</td>
                                        <td><span>: ${v.tindak_lanjut}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        `;
		if(v.anamnesa !== null){
			html += /* html */ `
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="title">
                                <h6 class="text-error">Pemeriksaan Umum</h6>
                                ${showRMAnamnesa(v.anamnesa)}
                            </div>
                        </div>
                    </div>
        `;
		}

		html += /* html */ `
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="title">
                                <h6 class="text-error">Pemeriksaan SOAP</h6>
                                 ${getSOAP}
                            </div>
                        </div>
                    </div>
        `;


		html += /* html */ `
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="title">
                                <h6 class="text-error">Diagnosa</h6>
                                ${showRMDiagnosa(v.diagnosis)}
                            </div>
                        </div>
                    </div>
        `;


		html += /* html */ `
                    <div class="row">
                        <div class="col-lg-12">
        `;

		html += showRMTindakan(v.tindakan, numeroo);

		if (v.laboratorium.length > 0) {
			html += showRMLaboratorium(v.laboratorium, numeroo);
		}

		if (v.radiologi.length > 0) {
			html += showRMRadiologi(v.radiologi, numeroo);
		}

		if (v.fisioterapi.length > 0) {
			html += showRMFisioterapi(v.fisioterapi, numeroo);
		}

		if (v.obat.length > 0) {
			html += showRMObat(v.obat, numeroo);
		}

		if (v.operasi.length > 0) {
			html += showRMOperasi(v.operasi, numeroo);
		}

		html += /* html */ `
                        </div>
                    </div>
                </li>
            </ul>
        `;


		return html;
	}

	function showRMAnamnesa(data) {
		let html = '';
		let onclick = '';

		html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">Tanggal</th>
                        <th class="center" width="10%">Tensi Sistolik</th>
                        <th class="center" width="10%">Tensi Diastolik</th>
                        <th class="center" width="7%">Nadi</th>
                        <th class="center" width="7%">Suhu</th>
                        <th class="center" width="7%">Nafas</th>
                        <th class="center" width="7%">Tinggi Badan</th>
                        <th class="center" width="7%">Berat Badan</th>
                        <th class="left">Keluhan Utama</th>
                        <th class="left">Riwayat Penyakit Sekarang</th>
                        <th class="center aksi"></th>	
                    </tr>
                </thead>
                <tbody>
        `;

		$.each(data, function(i, v) {
			onclick = 'onclick="showRMDetailAnamnesa(' + v.id + ')"';
			html += /* html */ `
                <tr>
                    <td class="center">${++i}</td>
                    <td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
                    <td class="center">${((v.tensi_sistolik !== null) ? v.tensi_sistolik + ' mm/Hg' : '')}</td>
                    <td class="center">${((v.tensi_diastolik !== null) ? v.tensi_diastolik + ' mm/Hg' : '')}</td>
                    <td class="center">${((v.nadi !== null) ? v.nadi + ' Bpm' : '')}</td>
                    <td class="center">${((v.suhu !== null) ? v.suhu + ' &deg; C' : '')}</td>
                    <td class="center">${((v.nps !== null) ? v.nps + ' Bpm' : '')}</td>
                    <td class="center">${((v.tinggi_badan !== null) ? v.tinggi_badan + ' Cm' : '')}</td>
                    <td class="center">${((v.berat_badan !== null) ? v.berat_badan + ' Kg' : '')}</td>
                    <td>${v.keluhan_utama}</td>
                    <td>${v.riwayat_penyakit_sekarang}</td>
                    <td> 
                        <button title="Klik untuk melihat Anamnesa" ${onclick} class="btn btn-secondary btn-xs"><i class="fas fa-eye"></i></button>
                    </td>
                </tr>
            `;
		});

		if (data.length === 0) {
			html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
            `;
		}

		html += /* html */ `
                </tbody>
            </table>
        `;

		return html;
	}

	function showRMSoap(data) {
		let html = '';
		html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">Tanggal</th>
                        <th class="center" width="20%">SUBJECTIVE</th>
                        <th class="center" width="20%">OBJECTIVE Akhir</th>
                        <th class="center" width="20%">ASSESSMENT</th>
                        <th class="center nowrap" width="20%">PLAN</th>
                    </tr>
                </thead>
                <tbody>
        `;

		$.each(data, function(i, v) {
			if(v !== null){
				html += /* html */ `
                    <tr>
                        <td class="center">${++i}</td>
                        <td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
                        <td class="center">${((v.s_soap !== null) ? v.s_soap : '-')}</td>
						<td class="center">${((v.o_soap !== null) ? v.o_soap : '-')}</td>
						<td class="center">${((v.a_soap !== null) ? v.a_soap : '-')}</td>
						<td class="center">${((v.p_soap !== null) ? v.p_soap : '-')}</td>                       
                    </tr>
				`;
			}
			
		});

		if (data) {
			html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
		}

		html += /* html */ `
                </tbody>
            </table>
        `;

		return html;
	}

	function showRMSoapRanap(data) {
		let html = '';
		html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">Tanggal</th>
                        <th class="center" width="20%">SUBJECTIVE</th>
                        <th class="center" width="20%">OBJECTIVE Akhir</th>
                        <th class="center" width="20%">ASSESSMENT</th>
                        <th class="center nowrap" width="20%">PLAN</th>
                    </tr>
                </thead>
                <tbody>
        `;

		$.each(data, function(i, v) {
			html += /* html */ `
                    <tr>
                        <td class="center">${++i}</td>
                        <td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
                        <td class="center">${((v.subject !== null) ? v.subject : '-')}</td>
						<td class="center">${((v.objective !== null) ? v.objective : '-')}</td>
						<td class="center">${((v.assessment !== null) ? v.assessment : '-')}</td>
						<td class="center">${((v.plan !== null) ? v.plan : '-')}</td>                       
                    </tr>
            `;
		});

		if (data) {
			html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
		}

		html += /* html */ `
                </tbody>
            </table>
        `;

		return html;
	}

	function showRMDetailAnamnesa(id) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_detail_anamnesa") ?>/id/' + id,
			cache: false,
			data: '',
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#rm-keluhan-utama').val(data.keluhan_utama);
				$('#rm-riwayat-penyakit-keluarga').val(data.riwayat_penyakit_keluarga);
				$('#rm-riwayat-penyakit-sekarang').val(data.riwayat_penyakit_sekarang);
				$('#rm-anamnesa-sosial').val(data.anamnesa_sosial);
				$('#rm-riwayat-penyakit-dahulu').val(data.riwayat_penyakit_dahulu);

				$('#rm-keadaan-umum').val(data.keadaan_umum);
				$('#rm-kesadaran').val(data.kesadaran);
				$('#rm-gcs').val(data.gcs);
				// $('#rm-alergi').val(data.);

				$('#rm-tensi-sistolik').val(data.tensi_sistolik);
				$('#rm-tensi-diastolik').val(data.tensi_diastolik);
				$('#rm-suhu').val(data.suhu);
				$('#rm-nadi').val(data.nadi);
				$('#rm-rr').val(data.rr);
				$('#rm-tinggi-badan').val(data.tinggi_badan);
				$('#rm-berat-badan').val(data.berat_badan);

				$('#rm-kepala').val(data.kepala);
				$('#rm-thorax').val(data.thorax);
				$('#rm-cor').val(data.cor);
				$('#rm-genitalia').val(data.genitalia);
				$('#rm-pemeriksaan-penunjang').val(data.pemeriksaan_penunjang);
				$('#rm-status-mentalis').val(data.status_mentalis);
				$('#rm-status-gizi').val(data.status_gizi);
				$('#rm-hidung').val(data.hidung);
				$('#rm-mata').val(data.mata);
				$('#rm-usul-tindak-lanjut').val(data.usul_tindak_lanjut);

				$('#rm-leher').val(data.leher);
				$('#rm-pulmo').val(data.pulmo);
				$('#rm-abdomen').val(data.abdomen);
				$('#rm-ekstrimitas').val(data.ekstrimitas);
				$('#rm-prognosis').val(data.prognosis);
				$('#rm-lingkar-kepala').val(data.lingkar_kepala);
				$('#rm-telinga').val(data.telinga);
				$('#rm-tenggorok').val(data.tenggorok);
				$('#rm-kulit-kelamin').val(data.kulit_kelamin);

				if (data.pupil_dbn == 'dbn') {
					$('#rm-pupil').val(data.pupil_dbn);
				} else {
					$('#rm-pupil').val(
						((data.pupil_bentuk !== null) ? 'Bentuk=' + data.pupil_bentuk + '; ' : '') +
						((data.pupil_ukuran !== null) ? 'Ukuran=' + data.pupil_ukuran + '; ' : '') +
						((data.pupil_reflek_cahaya !== null) ? 'Reflek Cahaya=' + data.pupil_reflek_cahaya : '')
					);
				}

				if (data.nervi_cranialis_dbn == 'dbn') {
					$('#rm-nervi-cranialis').val(data.nervi_cranialis_dbn);
				} else {
					$('#rm-nervi-cranialis').val(data.nervi_cranialis_paresis);
				}

				$('#rm-reflek-fisiologi').val(
					((data.rf_kiri_atas !== null) ? 'Kiri Atas=' + data.rf_kiri_atas + '; ' : '') +
					((data.rf_kiri_bawah !== null) ? 'Kiri Bawah=' + data.rf_kiri_bawah + '; ' : '') +
					((data.rf_kanan_atas !== null) ? 'Kanan Atas=' + data.rf_kanan_atas + '; ' : '') +
					((data.rf_kanan_bawah !== null) ? 'Kanan Bawah=' + data.rf_kanan_bawah : '')
				);

				if (data.sensorik_dbn == 'dbn') {
					$('#rm-sensorik').val(data.sensorik_dbn);
				} else {
					$('#rm-sensorik').val(data.sensorik_lain);
				}

				$('#rm-pemeriksaan-khusus').val(data.pemeriksaan_khusus);

				if (data.trm_dbn == 'dbn') {
					$('#rm-trm').val(data.trm_dbn);
				} else {
					$('#rm-trm').val(
						((data.trm_kaku_kuduk !== null) ? 'Kaku Kuduk=' + data.trm_kaku_kuduk + '; ' : '') +
						((data.trm_laseque !== null) ? 'Laseque=' + data.trm_laseque + '; ' : '') +
						((data.trm_kerning !== null) ? 'Kerning=' + data.trm_kerning : '')
					);
				}

				$('#rm-motorik').val(
					((data.motorik_kiri_atas !== null) ? 'Kiri Atas=' + data.motorik_kiri_atas + '; ' : '') +
					((data.motorik_kiri_bawah !== null) ? 'Kiri Bawah=' + data.motorik_kiri_bawah + '; ' : '') +
					((data.motorik_kanan_atas !== null) ? 'Kanan Atas=' + data.motorik_kanan_atas + '; ' : '') +
					((data.motorik_kanan_bawah !== null) ? 'Kanan Bawah=' + data.motorik_kanan_bawah : '')
				);

				$('#rm-reflek-patologis').val(data.reflek_patologis);
				$('#rm-otonom').val(data.otonom);

				$('#rm-riwayat-kelahiran').val(data.riwayat_kelahiran);
				$('#rm-riwayat-nutrisi').val(data.riwayat_nutrisi);
				$('#rm-riwayat-imunisasi').val(data.riwayat_imunisasi);
				$('#rm-riwayat-tumbuh-kembang').val(data.riwayat_tumbuh_kembang);

				$('#modal-detail-anamnesa').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Gagal', 'Error');
			}
		})
	}

	function showRMDiagnosa(data) {
		let html = '';
		html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">Tanggal</th>
                        <th class="left" width="30%">Item</th>
                        <th class="center" width="10%">Diagnosa Akhir</th>
                        <th class="center" width="5%">Prioritas</th>
                        <th class="center nowrap" width="10%">Penyebab Kematian</th>
                        <th class="left" width="25%">Diagnosa Banding</th>
                    </tr>
                </thead>
                <tbody>
        `;

		$.each(data, function(i, v) {
			noUrut = ++i;
			waktuDiag = ((v.waktu !== null) ? datetimefmysql(v.waktu) : '');
			itemDiag = (v.item);
			diagAkhir = ((v.diagnosa_akhir !== '0') ? v.diagnosa_akhir = 'Ya' : 'Tidak');
			prioritasDiag = v.prioritas;
			penyebabKematian = ((v.penyebab_kematian !== 'on') ? v.penyebab_kematian = 'Ya' : 'Tidak');
			diagBanding = ((v.diagnosa_banding !== null) ? v.diagnosa_banding : '');

			if (v.log != '0') {
				noUrut = `<s> ${noUrut} </s>`
				waktuDiag = `<s> ${waktuDiag} </s>`
				itemDiag = `<s> ${itemDiag} </s>`
				diagAkhir = `<s> ${diagAkhir} </s>`
				prioritasDiag = `<s> ${prioritasDiag} </s>`
				penyebabKematian = `<s> ${penyebabKematian} </s>`
				diagBanding = `<s> ${diagBanding} </s>`
			}

			html += /* html */ `
                    <tr>
										<td class="center">${noUrut}</td>
                        <td class="center">${waktuDiag}</td>
                        <td class="left">${itemDiag}</td>
                        <td class="center">${diagAkhir}</td>
                        <td class="center">${prioritasDiag}</td>
                        <td class="center">${penyebabKematian}</td>
                        <td class="left">${diagBanding}</td>
                    </tr>
            `;
		});

		if (data.length === 0) {
			html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
		}

		html += /* html */ `
                </tbody>
            </table>
        `;

		return html;
	}

	function drawTopCollapse(title, num) {
		let html = /* html */ `
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="heading-${num}">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-${num}" aria-expanded="false" aria-controls="collapse-${num}">
                                ${title}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse-${num}" class="collapse" aria-labelledby="heading-${num}">
                        <div class="card-body">       
        `;

		return html;
	}

	function drawBottomCollapse(title, num) {
		let html = /* html */ `
                        </div>
                    </div>
                </div>
            </div>
        `;

		return html;
	}

	function showRMTindakan(data, num) {
		let html = drawTopCollapse('Tindakan', num);

		html += /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">Tanggal</th>
                        <th class="center" width="12%">Item</th>
                        <th class="center" width="12%">Operator</th>
                        <th class="center" width="7%">Jml</th>
                    </tr>
                </thead>
                <tbody>
        `;

		$.each(data, function(i, v) {
			html += /* html */ `
                    <tr>
                        <td class="center">${++i}</td>
                        <td class="center">${((v.tanggal !== null) ? datetimefmysql(v.tanggal) : '')}</td>
                        <td class="left">${((v.item !== null) ? v.item : '')}</td>
                        <td class="left">${((v.operator !== null) ? v.operator : '')}</td>
                        <td class="center">${((v.frekuensi !== null) ? v.frekuensi : '')}</td>
                    </tr>
            `;
		});

		if (data.length === 0) {
			html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
		}

		html += /* html */ `
                </tbody>
            </table>
        `;

		html += drawBottomCollapse();

		return html;
	}

	function showRMOperasi(data, num) {
		let html = drawTopCollapse('Operasi', num);
		html += /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">Waktu</th>
                        <th class="center" width="12%">Item</th>
                        <th class="center" width="12%">Operator</th>
                        <th class="center" width="12%">Anastesi</th>
                        <th class="center" width="7%">Jml</th>
                    </tr>
                </thead>
                <tbody>
        `;

		$.each(data, function(i, v) {
			html += /* html */ `
                    <tr>
                        <td class="center">${++i}</td>
                        <td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
                        <td class="left">${((v.item !== null) ? v.item : '')}</td>
                        <td class="left">${((v.operator !== null) ? v.operator : '')}</td>
                        <td class="left">${((v.operator_anesthesi !== null) ? v.operator_anesthesi : '')}</td>
                        <td class="center">${((v.frekuensi !== null) ? v.frekuensi : '')}</td>
                    </tr>
            `;
		});

		if (data.length === 0) {
			html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
		}

		html += /* html */ `
                </tbody>
            </table>
        `;

		html += drawBottomCollapse();

		return html;
	}

	function fillContentObat(data) {
		let detail = '';
		let onclick = '';
		let html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">No. Resep</th>
                        <th class="center" width="12%">Waktu Order</th>
                        <th class="center" width="12%">Waktu Penyerahan</th>
                        <th class="center" width="12%">Jenis</th>
                        <th class="center" width="12%">Detail</th>
                    </tr>
                </thead>
                <tbody>
        `;

		$.each(data, function(i, v) {
			let waktu_diserahkan = '';
			let is_log = 0;
			if (v.is_delete != 1) {
				waktu_diserahkan = (v.waktu_diserahkan !== null) ? datetimefmysql(v.waktu_diserahkan) : '-';
				is_log = 0
			} else {
				waktu_diserahkan = '<span class="badge badge-danger">Dibatalkan</span>';
				is_log = 1;
			}

			onclick = 'onclick="showRMDetailObat(' + v.id + ',' + is_log + ')"';
			html += /* html */ `
                    <tr>
                        <td class="center">${++i}</td>
                        <td class="center">${((v.id_resep !== null) ? v.id_resep : '-')}</td>
                        <td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '-')}</td>
                        <td class="center">${waktu_diserahkan}</td>
                        <td class="center">${((v.jenis !== null) ? v.jenis : '-')}</td>
                        <td class="center aksi">
                            <button title="Klik untuk melihat detail obat" ${onclick} class="btn btn-secondary btn-xs"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>
            `;
		});

		if (data.length === 0) {
			html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
		}

		html += /* html */ `
                </tbody>
            </table>
        `;

		return html;
	}

	function showRMObat(data, num) {
		var html = drawTopCollapse('Obat', 'Obat' + num);
		html += fillContentObat(data, 'obat');
		html += drawBottomCollapse();

		return html;
	}

	// function showRMDetailObat(id) {
	// 	$.ajax({
	// 		type: 'GET',
	// 		url: '<-?= base_url( "rekam_medis/api/rekam_medis/get_detail_obat" ) ?>/id/' + id,
	// 		cache: false,
	// 		dataType: 'JSON',
	// 		beforeSend: function () {
	// 			showLoader();
	// 		},
	// 		success: function (data) {
	// 			$('#table-obat-rm tbody').empty();
	// 			let html = '';
	// 			$.each(data, function (i, v) {
	// 				html = /* html */ `
	//                     <tr>
	//                         <td class="center">${++i}</td>
	//                         <td class="center">${v.r_no}</td>
	//                         <td class="center">${v.nama_barang}</td>
	//                         <td class="center">${v.kekuatan == '0' ? 1 : 1} ${v.jenis_dosis}</td>
	//                         <td class="center">${v.aturan_pakai !== '' ? v.aturan_pakai : '-'}</td>
	//                         <td class="center">${((v.keterangan !== '') ? v.keterangan : '-')}</td>
	//                         <td class="center">${v.qty}</td>
	//                     </tr>
	//                 `;

	// 				$('#table-obat-rm tbody').append(html);
	// 				$('#modal-riwayat-obat-rm').modal('show');
	// 			});
	// 		},
	// 		complete: function () {
	// 			hideLoader();
	// 		},
	// 		error: function (e) {
	// 			messageCustom('Akses data Gagal', 'Error');
	// 		}
	// 	})
	// }

	function showRMDetailObat(id, isLog) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_detail_obat") ?>/id/' + id + '/log/' + isLog,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#table-obat-rm tbody').empty();
				let html = '';
				$.each(data, function(i, v) {
					const isRacikan = (v.racik === '1') ? 'Racikan' : 'Non Racikan';
					let html = /*html*/ `
						<tr>
							<td rowspan="${v.list_obat.length}" style="vertical-align: middle">
								<div style="display: flex; flex-direction: column; align-items: center;">
									R ${v.r_no}
									<b>${isRacikan}</b>
								</div>
							</td>
							<td style="vertical-align: middle">${v.list_obat[0].nama_barang}</td>
							<td style="vertical-align: middle">${v.list_obat[0].dosis_obat}</td>
							<td style="vertical-align: middle">${v.list_obat[0].jumlah}</td>
							<td rowspan="${v.list_obat.length}" style="vertical-align: middle">${v.aturan_pakai}</td>
							<td rowspan="${v.list_obat.length}" style="vertical-align: middle">${((v.keterangan_resep !== null) ? v.keterangan_resep : '-')}</td>
							<td rowspan="${v.list_obat.length}" style="vertical-align: middle">${v.sediaan}</td>
						</tr>
					`;
					v.list_obat.splice(0, 1)
					$.each(v.list_obat, function(i, obat) {
						html += /*html*/ `
							<tr>
								<td>${obat.nama_barang}</td>
								<td>${obat.dosis_obat}</td>
								<td>${obat.jumlah}</td>
							</tr>
						`;
					})

					$('#table-obat-rm tbody').append(html);
					$('#modal-riwayat-obat-rm').modal('show');
				});
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Gagal', 'Error');
			}
		})
	}

	function cetakHasilLaboratorium(id_laboratorium) {
		window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium/' + id_laboratorium, 'Cetak Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function rekamMedisHasilLaboratorium(kode) {
		window.open('<?php echo base_url() ?>hasil_laboratorium/cetak_pdf_laboratorium/' + kode,
	        'Cetak PDF Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakHasilLaboratoriumPA(id_laboratorium) {
		window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium_pa/' + id_laboratorium, 'Cetak Hasil Laboratorium PA', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakHasilLaboratoriumMB(id_laboratorium) {
		window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium_mb/' + id_laboratorium, 'Cetak Hasil Laboratorium PA', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function fillContentPenunjang(data, jenis) {
		var onclick = '';
		var viewPacs = '';
		var html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">No. Periksa</th>
                        <th class="center" width="12%">Waktu Konfirm</th>
                        <th class="center" width="12%">Waktu Hasil</th>
                        <th class="center" width="12%">Dokter P. Jawab</th>
                        <th class="center" width="35%">Item Pemeriksaan</th>
                        <th class="center" width="6%">Detail</th>
                    </tr>
                </thead>
                <tbody>
        `;

		$.each(data, function(i, v) {

			if (jenis === 'laboratorium') {

				if (v.jenis_lab === 'Patologi Anatomi') {

					onclick = 'onclick="rekamMedisHasilLaboratorium(\'' + v.kode + '\')"';

				} else if (v.jenis_lab === 'Mikrobiologi') {

					onclick = 'onclick="rekamMedisHasilLaboratorium(\'' + v.kode + '\')"';

				} else {

					onclick = 'onclick="rekamMedisHasilLaboratorium(\'' + v.kode + '\')"';

				}
			} else if (jenis === 'radiologi') {

				onclick = 'onclick="showRMHasilRadiologi(' + v.id + ')"';

				viewPacs = '<button type="button" class="btn btn-secondary btn-xs" onclick="viewPacs(\'' + v.accessnumber + '\', ' + v.id_detail_r + ')"><i class="fas fa-history m-r-5"></i>PACS</button>';

			} else if (jenis === 'fisioterapi') {
				onclick = 'onclick="showRMHasilFisioterapi(' + v.id + ')"';
			} else {
				onclick = '';
			}

			html += /* html */ `
                    <tr>
                        <td class="center">${++i}</td>
                        <td class="center">${((v.kode !== null) ? v.kode : '-')}</td>
                        <td class="center">${((v.waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '-')}</td>
                        <td class="center">${((v.waktu_hasil !== null) ? datetimefmysql(v.waktu_hasil) : '-')}</td>
                        <td class="center">${v.dokter_pjwb}</td>
                        <td class="center">${v.detail}</td>
                        <td class="center aksi">
                        	${viewPacs}
                            <button title="Klik untuk melihat detail obat" ${onclick} class="btn btn-secondary btn-xs"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>
            `;

		})

		if (data.length === 0) {
			html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
		}

		html += /* html */ `
                </tbody>
            </table>
        `;

		return html;
	}

	function viewPacs(uid, xid) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/viewPacs") ?>',
			data: 'uid=' + uid + '&xid=' + xid,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				if (typeof data.metaData !== 'undefined') {

					if (data.metaData.code !== 200) {

						messageCustom(data.metaData.message, 'Error');

					} else {

						messageCustom(data.metaData.message, 'Success');
						showUrl(data.metaData.url);


					}

				}

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})

	}

	function showRMLaboratorium(data, num) {
		var html = drawTopCollapse('Laboratorium', 'Lab' + num);
		html += fillContentPenunjang(data, 'laboratorium');
		html += drawBottomCollapse();

		return html;
	}

	function showRMRadiologi(data, num) {
		var html = drawTopCollapse('Radiologi', 'Rad' + num);
		html += fillContentPenunjang(data, 'radiologi');
		html += drawBottomCollapse();

		return html;
	}

	function showRMFisioterapi(data, num) {
		var html = drawTopCollapse('Rehab. Medik', 'Fisio' + num);
		html += fillContentPenunjang(data, 'fisioterapi');
		html += drawBottomCollapse();

		return html;
	}

	function showRMHasilRadiologi(id) {
		window.open('<?php echo base_url() ?>hasil_radiologi/printing_hasil_radiologi/' + id, 'Cetak Hasil Radiologi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function showRMHasilFisioterapi(id) {
		window.open('<?php echo base_url() ?>hasil_fisioterapi/printing_hasil_fisioterapi/' + id, 'Cetak Hasil Fisioterapi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function showUrl(url) {
		window.open(url, '_blank');
	}


	function riwayatPasienSimrsLama() {
		// let noKtp   = $('#no-ktp-pasien').val();
		let noRm = $('#id-pasien').val();
		let nama = $('#nama-pasien').val();
		let umur = $('#tgl-lahir').val();


		// if (typeof noKtp === 'undefined') {
		//     swalAlert('warning', 'Validasi', 'NO KTP di SIMRS Lama Kosong.');
		// 	return false;
		// }

		$.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_data_pasien_sirms_lama") ?>/norm/' + noRm + '/nama/' + nama + '/umur/' + umur,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					window.open("http://192.168.77.103/billing/unit_pelayanan/rekamMedis.php?idPasien=" + data.id);
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Gagal', 'Error');
			}
		});
	}

	function btnResumeMedis(id_layanan_pendaftaran, jenis_layanan) {
		$('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);

		if (jenis_layanan == 'Rawat Inap') {
			cetakResumeMedisRawatInap($('#id-layanan-pendaftaran').val(), $('#id-pendaftaran-resume').val());
		} else if (jenis_layanan == 'Intensive Care') {
			cetakResumeMedisIntensivecare($('#id-layanan-pendaftaran').val(), $('#id-pendaftaran-resume').val());
		} else {
			cetakResumeMedisRawatJalan($('#id-layanan-pendaftaran').val(), $('#id-pendaftaran-resume').val());
		}
	}

	function cetakResumeMedisRawatInap(id, id_pendaftaran) {
		window.open('<?= base_url('pengkodean_icd_x/cetak_resume_medis_ranap/') ?>' + id + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakResumeMedisRawatJalan(id, id_pendaftaran) {
		window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + id + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakResumeMedisIntensivecare(id, id_pendaftaran) {
		window.open('<?= base_url('pengkodean_icd_x/cetak_resume_medis_intensive_care/') ?>' + id + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function tampilPacs() {

		swalAlert('warning', 201, 'Data Hasil Radiologi Belum tersedia');

	}
</script>