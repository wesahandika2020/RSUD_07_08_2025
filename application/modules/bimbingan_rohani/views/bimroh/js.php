<script>
	$(function() {
		$('#wizard2').bwizard()
		getListDataBimroh(1)

        $('.form-control, .custom-form .select2-input, .select2c-input').change(function(){
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#btn-search2').click(function() {
			$('#modal-search2').modal('show')
		})
		
		$('#btn-reload2').click(function() {
			resetDataBimroh()
			getListDataBimroh(1)
		})

		// select filter layanan
		$('#layanan').change(function() {
		getListDataBimroh(1);
        });

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('.timepicker').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            defaultTime: false,
            showInputs: false,
            disableFocus: true
        });


		$('.form-control, .custom-form').keyup(function(){
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})
	})

	function resetDataBimroh() {
        $('input[type=text], input[type=hidden], select, textarea').val('')
        $('a .select2c-chosen').html('')
        $('#tanggal-awal2, #tanggal-akhir2').val('<?= date('d/m/Y') ?>')
		$('#ttd_keluarga').prop('checked', true).attr('disabled', false);
		$('#ttd_petugaspendamping').prop('checked', true).attr('disabled', false);
	}

	function getListDataBimroh(page) {
    	$('#page-now2').val(page)
		$('#modal-search2').modal('hide')
        
		$.ajax({
			type: 'GET',
			url: '<?= base_url("bimbingan_rohani/api/bimbingan_rohani/get_list_data_bimroh") ?>/page/' + page,
			data: $('#form-search2').serialize() + '&layanan=' + $('#layanan').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
                    getListDataBimroh(page - 1)
                    return false;
                };

                $('#pagination2').html(pagination(data.jumlah, data.limit, data.page, 2))
				$('#summary2').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				
				$('#table-data2 tbody').empty()
				$.each(data.data, function(i, v) {
					let status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Belum</em>';

					// let detail = v.waktu_konfirmasi+'#'+v.id_pasien+'#'+v.no_register+'#'+v.nama+'#'+umur+'#'+v.kelamin+'#'+v.id_pendaftaran+'#'+v.id_pemulasaran_jenazah+'#'+v.waktu_meninggal+'#'+v.agama+'#'+v.alamat+'#'+v.petugas_ipj+'#'+v.nip_petugas_ipj+'#'+v.kelamin_petugas_ipj+'#'+v.id+'#'+ kondisi_pasien +'#'+ terapi +'#'+v.tanggal_daftar+'#'+ ruangan_talqin +'#'+v.is_ttd_keluarga_pasien+'#'+v.ttd_petugas;

					let html = /* html */ `
						<tr>
                        <td class="center wrapper">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${(v.waktu_konfirmasi !== null ? datetimefmysql(v.waktu_konfirmasi) : '-')}</td>
							<td class="wrapper center">${v.bed}</td>
							<td class="wrapper center">${v.id_pasien}</td>
							<td class="wrapper center">${v.nama}</td>
							<td class="wrapper center">${v.nama_perawat}</td>
							<td class="wrapper center">${v.jenis}</td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs" onclick="cetakFormBimroh(${v.id},${v.id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>

							</td>
						</tr>
					`;
					$('#table-data2 tbody').append(html)
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

	function konfirmasiSimpanTalqin() {
        swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Anda yakin ingin menyimpan data bimbingan rohani/talqin ini?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
                simpanPelayananBimroh()
			}
		})
    }

	function simpanPelayananBimroh() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("bimbingan_rohani/api/bimbingan_rohani/simpan_pelayanan_bimroh") ?>',
            data: $('#form-pelayanan-bimroh').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function () {
                showLoader()
            },
            success: function (data) {
                if (data.status) {
                    messageCustom('Berhasil menyimpan data pelayanan bimbingan rohani (Talqin)', 'Success')
                    getListDataBimroh($('#page-now2').val())
                    $('#modal-pelayanan-bimroh').modal('hide')
                } else {
                    messageCustom(data.message, 'Error')
                }
            },
            complete: function () {
                hideLoader()
            },
            error: function (e) {
                messageCustom('Terjadi Kesalahan Sistem, Gagal melakukan Penyimpanan Data Bimbingan Rohani', 'Error')
            }
        })
    }

	function cetakFormBimroh(id, id_layanan_pendaftaran) {
        $('#modal_cetak_form_bimroh').modal('show');
        $('#modal_cetak_form_bimroh_label').html('Cetak Form Bimbingan Rohani');

		$('#btn_form_bimroh_baru').click(function() {
            cetakFormBimrohPasienBaru(id, id_layanan_pendaftaran);
        });

        $('#btn_form_bimroh_khusus').click(function() {
            cetakFormBimrohKhusus(id, id_layanan_pendaftaran);
        });

       
    }	

	function cetakFormBimrohPasienBaru(id, id_layanan_pendaftaran) { 
		$.ajax({
            type: 'GET',
            url: '<?= base_url('bimbingan_rohani/api/bimbingan_rohani/form_bimroh_pasien_baru') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran + '/Jenis/PB',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
				// Set all values first
				// resetPemberianInformasiKepadaPasien();

                $('#id-layanan-pendaftaran-bimroh-baru').val(id_layanan_pendaftaran);	 
				$('#modal-form-bimroh-pasien-baru-title').html(`<b>Form Pendampingan Spiritual Pasien Baru</b> | No. RM: ${data.id_pasien}, Nama: ${data.nama_pasien}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telepon}</b></i>`);
                $('#nama-pasien-baru').val(data.nama_pasien);
                $('#tanggal-lahir-pasien-baru').val(datefmysql(data.tanggal_lahir));
				$('#jenis-kelamin-pasien-baru').val((data.jenis_kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
				$('#agama-pasien-baru').val(data.agama);
				$('#alamat-pasien-baru').val(data.alamat_pasien);
                $('#kondisi-pasien-baru').val(data.kondisi_pasien);
				$('#diagnosa-pasien-baru').val(data.diagnosa_spiritual);
				$('#terapi-pasien-baru').val(data.terapi_tindak_lanjut);
											
                $('#modal_form_bimroh_pasien_baru').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

	function cetakFormBimrohKhusus(id, id_layanan_pendaftaran) { 
		$.ajax({
            type: 'GET',
			url: '<?= base_url('bimbingan_rohani/api/bimbingan_rohani/form_bimroh_pasien_khusus') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
			
            success: function(data) {
				// Set all values first
				// resetPemberianInformasiKepadaPasien();
                $('#id-layanan-pendaftaran-bimroh-khusus').val(id_layanan_pendaftaran);	 
				$('#modal-form-bimroh-pasien-khusus-title').html(`<b>Form Pendampingan Spiritual Pasien Khusus</b> | No. RM: ${data.id_pasien}, Nama: ${data.nama_pasien}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telepon}</b></i>`);
                $('#nama-pasien-khusus').val(data.nama_pasien);
				$('#tanggal-lahir-pasien-khusus').val(datefmysql(data.tanggal_lahir));
				$('#jenis-kelamin-pasien-khusus').val((data.jenis_kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
				$('#agama-pasien-khusus').val(data.agama);
				$('#alamat-pasien-khusus').val(data.alamat_pasien);
                $('#kondisi-pasien-khusus').val(data.kondisi_pasien);
				$('#diagnosa-pasien-khusus').val(data.diagnosa_spiritual);
				$('#terapi-pasien-khusus').val(data.terapi_tindak_lanjut);
											
                $('#modal_form_bimroh_pasien_khusus').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

	function simpanFormBimrohPasienBaru() {
		var id = $('#id-layanan-pendaftaran-bimroh-baru').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("bimbingan_rohani/api/bimbingan_rohani/simpan_bimroh_pasien_baru") ?>',
			data: $('#form-bimroh-pasien-baru').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					$('#modal_form_bimroh_pasien_baru').modal('hide');

					window.open('<?= base_url('bimbingan_rohani/cetak_form_bimroh_pasien_baru/') ?>' + id, 'Cetak Formulir Pendampingan Spiritual Pasien Baru', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			}
		});
	}

	function simpanFormBimrohPasienKhusus() {
		var id = $('#id-layanan-pendaftaran-bimroh-khusus').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("bimbingan_rohani/api/bimbingan_rohani/simpan_bimroh_pasien_khusus") ?>',
			data: $('#form-bimroh-pasien-khusus').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					$('#modal_form_bimroh_pasien_khusus').modal('hide');

					window.open('<?= base_url('bimbingan_rohani/cetak_form_bimroh_pasien_khusus/') ?>' + id, 'Cetak Formulir Pendampingan Spiritual Pasien Dengan Permintaan Khusus', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			}
		});
	}



</script>