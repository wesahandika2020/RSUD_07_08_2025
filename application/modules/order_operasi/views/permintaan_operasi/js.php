<script>
	$(function() {
		getListJadwalOperasi(1)
		
		$('#btn-search1').click(function() {
			$('#modal-search1').modal('show')
		})

		$('#btn-reload1').click(function() {
			resetDataJadwalOperasi()
			getListJadwalOperasi(1)
		})

		$('#pasien-search').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
                $('#alamat').val(data.alamat)
                return data.id + ' ' + data.nama;
            }
        })

		$('#operator-search').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = '<b>'+data.nama+'</b> <br/>'+data.spesialisasi;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
		})
		
		$('#tindakan-search').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/layanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: 'Pelayanan Pembedahan',
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){                
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
		})

		$('#ruang-operasi-search').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/kamar_operasi_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
		})
		
		$('#ruang-operasi').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/kamar_operasi_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        })

		$('.form-control, .select2-input').change(function(){
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.form-control').keyup(function(){
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('#date-awal, #date-akhir').datetimepicker({
            format: 'DD/MM/YYYY HH:mm'
        }).on('changeDate', function() {
            $(this).datetimepicker('hide');
        })
	})

	function resetDataJadwalOperasi() {
		$('input[type="text"], input[type="hidden"], select, textarea').val('')
		$('s2id_ruang-operasi a .select2-chosen').html('Pilih Ruang Operasi')
	}

	function getListJadwalOperasi(page) {
		$('#page-now1').val(page)
		$('#modal-search1').modal('hide')
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_operasi/api/order_operasi/get_list_jadwal_operasi") ?>/page/' + page,
			data: $('#form-search1').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
                    getListJadwalOperasi(page - 1)
                    return false;
                };
                
                $('#pagination1').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary1').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				
				$('#table-data1 tbody').empty()
				$.each(data.data, function(i, v) {
					let button = '';
					let background = '';
					let status = v.status;
					if (v.status === 'Request') {
						status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>' + v.status + '</em>';
					}
					if (v.status === 'Canceled') {
						background = 'style="background-color:#E46A76;color:#FFFFFF"';
						button = 'disabled';
					}
					if (v.status === 'Confirmed') {
						status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';
						background = '';
						// button = 'disabled';
					}
					let klasifikasi = '';
					if (v.klasifikasi === 'Standard') { klasifikasi = 'Sedang' }
					if (v.klasifikasi === 'Minor') { klasifikasi = 'Kecil' }
					if (v.klasifikasi === 'Mayor') { klasifikasi = 'Besar' }
					if (v.klasifikasi === 'Khusus') { klasifikasi = 'Khusus' }
					
					let id_ruang_operasi = (v.id_ruang_operasi !== null ? v.id_ruang_operasi : '')
					let ruang_operasi = (v.ruang_operasi !== '' ? v.ruang_operasi : 'Pilih Ruang Operasi')

					let detail = v.id+'#'+v.id_pasien+'#'+v.nama_pasien+'#'+v.operasi+'#'+v.ruang_operasi+'#'+v.klasifikasi+'#'+datetimefmysql(v.mulai)+'#'+datetimefmysql(v.selesai)+'#'+hitungUmur(v.tanggal_lahir)+'#'+v.timing+'#'+v.kelamin+'#'+v.status+'#'+id_ruang_operasi+'#'+ruang_operasi+'#'+v.keterangan+'#'+v.penjamin+'#'+v.agama+'#'+v.telp;

					let disable_viewonly = '';
            		let accountGroup = "<?= $this->session->userdata('account_group') ?>"

					if ((accountGroup === 'Komite Keperawatan') ){ //READ ONLY
                        disable_viewonly = 'disabled';
                    } else {
                        disable_viewonly = '';
					}
					
					disabled_co  = '';
					title_tombol = '' 
					if((v.tindak_lanjut_pengirim == 'Atas Izin Dokter') || (v.tindak_lanjut_pengirim == 'Batal') || (v.tindak_lanjut_pengirim == 'Batal Berkunjung') || (v.tindak_lanjut_pengirim == 'Batal Konsul')
						|| (v.tindak_lanjut_pengirim == 'Melarikan Diri') || (v.tindak_lanjut_pengirim == 'Pulang') || (v.tindak_lanjut_pengirim == 'Pulang APS') || (v.tindak_lanjut_pengirim == 'RS Lain')){
							if(accountGroup != 'Admin'){
								disabled_co = 'disabled';
								title_tombol = 'title="Tidak bisa konfirmasi, pasien sudah di CO oleh pengirim"' ;
							}
					}	

					let btnAction = /* html */ `
						<button type="button" ${disabled_co} ${title_tombol} class="btn btn-secondary btn-xs" title="Klik untuk konfirmasi" ${button} ${disable_viewonly} onclick="aktivitasOperasi('${detail}')"><i class="fas fa-arrow-circle-right"></i></button>
					`;

					if (v.id_perioperatif === null && v.status === 'Request') {
						btnAction = /* html */ `
							<button type="button" ${disabled_co} ${title_tombol} class="btn btn-secondary btn-xs" title="Klik untuk mengisi form perioperatif terlebih dahulu" onclick="entriFormPerioperatif(${v.id}, ${data.page})"><i class="fas fa-pencil-alt"></i></button>
							<button type="button" ${disabled_co} ${title_tombol} class="btn btn-secondary btn-xs" title="Klik untuk batal" ${button} onclick="batalJadwalOperasi(${v.id}, ${data.page})"><i class="fas fa-times"></i></button>
						`;
					}

					let html = /* html */ `
						<tr ${background}>
							<td class="center wrapper">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${v.id}</td>
							<td class="wrapper">${(v.waktu !== null ? datetimefmysql(v.waktu) : '-')}</td>
							<td class="wrapper">${v.ruang_operasi}</td>
							<td class="wrapper">${v.id_pasien}</td>
							<td class="wrapper">${v.nama_pasien}</td>
							<td class="wrapper">${v.jenis_layanan}</td>
							<td class="wrapper">${(v.tindak_lanjut_pengirim != null ? v.tindak_lanjut_pengirim : '' )}</td>
							<td class="wrapper">${v.operasi}</td>
							<td class="wrapper center">${status}</td>
							<td class="wrapper right">
								${btnAction}
							</td>
						</tr>
					`;
					$('#table-data1 tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		})
	}

	function batalJadwalOperasi(id) {
		swal.fire({
			title: 'Konfirmasi Pembatalan',
			html: "<b>Dengan pembatalan maka data pemeriksaan & tindakan di operasi akan ikut terhapus</b><br/>Anda yakin membatalkan operasi ini?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url('order_operasi/api/order_operasi/pembatalan_order_operasi') ?>',
					data: 'id=' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success')
							getListJadwalOperasi($('#page-now1').val())
						} else {
							messageCustom(data.message, 'Info')
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan pembatalan order operasi', 'Error')
					}
				})
			}
		})
	}

	function aktivitasOperasi(data) {
		let val = data.split('#')
		$('#id-jadwal-operasi1').val(val[0])
		$('#no-rm-ops-detail').html(val[1])
		$('#nama-ops-detail').html(val[2])
		$('#agama-ops-detail').html(val[16])
		$('#kelamin-ops-detail').html(val[10])
		$('#umur-ops-detail').html(val[8])
		$('#telp-ops-detail').html(val[17])
		$('#nama-operasi-ops-detail').html(val[3])
		$('#klasifikasi-operasi-ops-detail').html(val[5])
		$('#timing-operasi-ops-detail').html(val[9])
		$('#cara-bayar-ops-detail').html(val[15])

 		$('#status-permintaan').val((val[11] == 'Request' ? '' : val[11]))
		$('#ruang-operasi').val(val[12])
		$('#s2id_ruang-operasi a .select2-chosen').html(val[13])
		$('#date-awal').val(val[6])
		$('#date-akhir').val(val[7])
		$('#bobot-operasi').val(val[5])
		$('#alasan-dibatalkan-operasi').val(val[14])

		$('#modal-konfirm-operasi1').modal('show')
	}

	function konfirmasiJadwalOperasi() {
		syams_validation_remove('.form-control')
		syams_validation_remove('.select2-input')
		if ($('#status-permintaan').val() === '') {
			syams_validation('#status-permintaan', 'Status permintaan harus dipilih!'); return false;
		}
		if (($('#status-permintaan').val() === 'Canceled') && ($('#alasan-dibatalkan-operasi').val() === '')) {
			syams_validation('#alasan-dibatalkan-operasi', 'Alasan pembatalan tidak boleh kosong!'); return false;
		}
		if ($('#status-permintaan').val() === 'Confirmed') {
			if ($('#ruang-operasi').val() === '') {
				syams_validation('#ruang-operasi', 'Ruang operasi harus dipilih!'); return false;
			}
			if ($('#date-awal').val() === '' || $('#date-awal').val() === '-') {
				syams_validation('#date-awal', 'Waktu mulai harus dipilih!'); return false;
			}
			if ($('#date-akhir').val() === '' || $('#date-akhir').val() === '-') {
				syams_validation('#date-akhir', 'Waktu selesai harus dipilih!'); return false;
			}
			if ($('#bobot-operasi').val() === '') {
				syams_validation('#bobot-operasi', 'Bobot harus dipilih!'); return false;
			}
		}

		swal.fire({
			title: 'Konfirmasi Permintaan',
			html: "Anda yakin ingin menyimpan data konfirmasi jadwal operasi ini?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url('order_operasi/api/order_operasi/simpan_konfirmasi_jadwal_operasi') ?>',
					data: $('#form-konfirm-operasi1').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success')
							getListJadwalOperasi($('#page-now1').val())
							$('#modal-konfirm-operasi1').modal('hide')
						} else {
							messageCustom(data.message, 'Info')
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan pembatalan order operasi', 'Error')
					}
				})
			}
		})
	}


</script>