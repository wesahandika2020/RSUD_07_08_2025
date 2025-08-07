<link rel="stylesheet" type="text/css"
        href="<?php echo resource_url() ?>assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo resource_url() ?>assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
<script src="<?php echo resource_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo resource_url() ?>assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script>
	$(function() {
		getListDataSuratKontrol()

		$('#btn_add').click(function() {
			resetDataKontrol()
			$('#modal_surat_kontrol').modal('show')
			$('#modal_surat_kontrol_label').html('Pembuatan Surat Kontrol/SPRI')
		})

		$('#btn_reload').click(function() {
			resetDataKontrol()
			getListDataSuratKontrol()
		})

		$('#btn_search').click(function() {
			$('#modal_search').modal('show')
		})

		$('#rencana_kontrol').change(function() {
			$('#no_kartu_kontrol').val('')
			if ($(this).val() === '1') {
				$('[name="jenis_pelayanan"], #jenis_pelayanan_kontrol').val('1')
				$('.no_label').text('No. Kartu :')
			} else if ($(this).val() === '2') {
				$('[name="jenis_pelayanan"], #jenis_pelayanan_kontrol').val('2')
				$('.no_label').text('No. SEP :')
			}
		})

		$('#btn_search_data').click(function() {
			var rencana = $('#rencana_kontrol').val()
			var no = $('#no_kartu_kontrol').val()
			if (no === '') {
				syams_validation('#no_kartu_kontrol', 'Masukkan nomor terlebih dahulu.')
				return false
			}

			$('[name="nomor"]').val(no)
			if (rencana === '2') {
				getDataRencanaKontrol(no)
			} else if (rencana === '1') {
				getDataPesertaKontrol(no)
			}
		})

		$('.clear').keyup(function () {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.clear').change(function () {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#tgl_rencana').datepicker({
            format: 'dd/mm/yyyy',
			startDate: new Date(),
        }).on('changeDate', function() {
            $(this).datepicker('hide')
        })

		$('#tanggal_awal, #tanggal_akhir').datepicker({
            format: 'dd/mm/yyyy',
			endDate: new Date(),
        }).on('changeDate', function() {
            $(this).datepicker('hide')
        })
	})

	function resetDataKontrol()
	{
		$('#form_search')[0].reset()
		$('#no_kartu_kontrol').val('')
		$('#tanggal_awal, #tanggal_akhir').val('<?php echo date('d/m/Y') ?>')
		$('[name="jenis_pelayanan"], #jenis_pelayanan_kontrol').val('2')
		$('.form_search_kontrol').show()
		$('.data_sep, .data_asal_rujukan, .data_peserta, .box_kontrol').hide()
	}

	function getDataRencanaKontrol(no_sep) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM.'get_data_rencana_kontrol_by_no_sep') ?>',
			data: 'no_sep='+no_sep,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
			},
			success: function(data) {
				if (data.metaData.code === '200') {
					if (data.response !== null) {
						$('.form_search_kontrol').hide()
						$('.box_kontrol').show()
						$('.data_sep, .data_asal_rujukan, .data_peserta').show()

						var data = data.response
						$('.text_nosep').text(data.noSep)
						$('.text_tglsep').text(datefmysql(data.tglSep))
						$('.text_jenpel').text(data.jnsPelayanan)
						$('.text_poli').text(data.poli)
						$('.text_diagnosa').text(data.diagnosa)

						$('.text_norujukan').text(data.provPerujuk.noRujukan)
						$('.text_tglrujukan').text(datefmysql(data.tglSep) + ' s/d ' +datefmysql(data.provPerujuk.tglRujukan))
						$('.text_tglrujukan').text(datefmysql(data.tglSep) + ' s/d ' +datefmysql(data.provPerujuk.tglRujukan))
						$('.text_faskesasalrujukan').text(data.provPerujuk.nmProviderPerujuk + ' (' + data.provPerujuk.kdProviderPerujuk + ')')
						
						$('.text_nokartupeserta').text(data.peserta.noKartu)
						$('.text_namapeserta').text(data.peserta.nama)
						$('.text_tgllahirpeserta').text(data.peserta.tglLahir)
						$('.text_kelaminpeserta').text((data.peserta.kelamin === 'L' ? 'Laki-laki' : 'Perempuan'))
						$('.text_kelaspeserta').text(data.peserta.hakKelas)
						$('.text_ppkpeserta').text(data.provUmum.nmProvider + ' (' + data.provUmum.kdProvider + ')')
					} else {
						$('.data_sep, .data_asal_rujukan, .data_peserta').hide()
						swalAlert('warning', 'Informasi', data.metaData.message)
					}
				} else {
					swalAlert('warning', 'Informasi', data.metaData.message)
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {

			}
		})
	}

	function getDataPesertaKontrol(no_kartu)
	{
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM.'get_peserta') ?>',
			data: 'nokartu='+no_kartu,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
			},
			success: function(data) {
				if (data.metaData.code === '200') {
					if (data.response !== null) {
						$('.form_search_kontrol').hide()
						$('.box_kontrol').show()
						$('.data_peserta').show()
						
						var data = data.response
						$('.text_nokartupeserta').text(data.peserta.noKartu)
						$('.text_namapeserta').text(data.peserta.nama)
						$('.text_tgllahirpeserta').text(data.peserta.tglLahir)
						$('.text_kelaminpeserta').text((data.peserta.kelamin === 'L' ? 'Laki-laki' : 'Perempuan'))
						$('.text_kelaspeserta').text(data.peserta.hakKelas.kode)
						$('.text_ppkpeserta').text((data.peserta.provUmum.nmProvider !== null ? data.peserta.provUmum.nmProvider : '') + (data.peserta.provUmum.kdProvider !== null ? ' (' + data.peserta.provUmum.kdProvider + ')' : ''))
					} else {
						$('.data_peserta').hide()
						swalAlert('warning', 'Informasi', data.metaData.message)
					}
				} else {
					swalAlert('warning', 'Informasi', data.metaData.message)
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {

			}
		})
	}

	function chooseSpesialistik()
	{
		var jenis_kontrol = $('[name="jenis_pelayanan"]').val()
		var tgl_kontrol = $('#tgl_rencana').val()
		var nomor = $('[name="nomor"]').val()

		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM.'get_spesialistik_kontrol') ?>',
			data: 'jenis_kontrol='+jenis_kontrol+'&nomor='+nomor+'&tgl_kontrol='+tgl_kontrol,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
			},
			success: function(data) {
				if (data.metaData.code === "200") {
					if (data.response !== null) {
						$('#table_list_spesialistik_kontrol tbody').empty()
						$.each(data.response.list, function(i, v) {
							var html = `
								<tr>
									<td class="center">${++i}</td>
									<td class="left">
										<button type="button" class="btn btn-secondary btn-xs" onclick="getDataDokterKontrol('${v.kodePoli}', '${v.namaPoli}', '${tgl_kontrol}', '${jenis_kontrol}', '${v.kapasitas}', '${v.jmlRencanaKontroldanRujukan}', '${v.persentase}')">${v.namaPoli}</button>
									</td>
									<td class="center">${v.kapasitas}</td>
									<td class="center">${v.jmlRencanaKontroldanRujukan}</td>
									<td class="center">${v.persentase}%</td>
								</tr>
							`;

							$('#table_list_spesialistik_kontrol tbody').append(html)
						})

						$('#modal_spesialistik').modal('show')
					} else {
						swalAlert('warning', 'Informasi', 'Gagal mendapatkan data, Silahkan coba kembali.')
					}
				} else {
					swalAlert('warning', 'Informasi', data.metaData.message)
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {

			}
		})
	}

	function getDataDokterKontrol(kode_poli, nama_poli, tgl_kontrol, jenis_kontrol, kapasitas, jml_rencana_kontrol, persentase) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM.'get_dokter_kontrol') ?>',
			data: 'jenis_kontrol='+jenis_kontrol+'&kode_poli='+kode_poli+'&tgl_kontrol='+tgl_kontrol,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
			},
			success: function(data) {
				if (data.metaData.code === "200") {
					if (data.response !== null) {
						$('#table_list_dokter_kontrol tbody').empty()
						$.each(data.response.list, function(j, x) {
							var html = `
								<tr>
									<td class="center">${++j}</td>
									<td class="left">${x.namaDokter}</td>
									<td class="center">${x.jadwalPraktek}</td>
									<td class="center">${x.kapasitas}</td>
									<td class="center">
										<button type="button" class="btn btn-success btn-xs" onclick="fillDataKontrol('${kode_poli}', '${nama_poli}', '${tgl_kontrol}', '${jenis_kontrol}', '${kapasitas}', '${jml_rencana_kontrol}', '${persentase}', '${x.kodeDokter}', '${x.namaDokter}')"><i class="fas fa-check-circle"></i></button>
									</td>
								</tr>
							`;

							$('#table_list_dokter_kontrol tbody').append(html)
						})

						$('#modal_dokter_kontrol').modal('show')
					} else {
						swalAlert('warning', 'Informasi', 'Gagal mendapatkan data, Silahkan coba kembali.')
					}
				} else {
					swalAlert('warning', 'Informasi', data.metaData.message)
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {

			}
		})
	}

	function fillDataKontrol(kode_poli, nama_poli, tgl_kontrol, jenis_kontrol, kapasitas, jml_rencana_kontrol, persentase, kode_dokter, nama_dokter) {
		$('#txtkdpoli').val(kode_poli)
		$('#spesialis_kontrol').val(kode_poli + ' - ' + nama_poli)
		$('#tgl_kontrol').val(date2mysql(tgl_kontrol))
		$('#txtjumlahrujukan').val(jml_rencana_kontrol)
		$('#txtprosentase').val(persentase)
		$('#txtkddpjp').val(kode_dokter)
		$('#dpjp_kontrol').val(nama_dokter)

		$('#modal_dokter_kontrol, #modal_spesialistik').modal('hide')
	}

	function konfirmasiSuratKontrol(tipe) {
		var jml_rencana_kontrol = parseInt($('#txtjumlahrujukan').val()) + 1
		var persentase = $('#txtprosentase').val()

		Swal.fire({
            title: 'Anda Yakin ?',
            text: "Pasien merupakan pasien urutan ke "+jml_rencana_kontrol+" dengan kapasitas terisi telah "+persentase+"% dari total kapasitas pada poli spesialistik tersebut, Apakah lanjut simpan dan tidak pilih hari lain?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: '<i class="fas fa-window-close"></i> Tidak',
            confirmButtonText: '<i class="fas fa-check-circle"></i> Ya'
        }).then((result) => {
            if (result.value) {
				simpanSuratKontrol(tipe)
            }
        })
	}

	function simpanSuratKontrol(tipe) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url(URL_VCLAIM.'update_surat_kontrol') ?>',
			data: $('#form_surat_kontrol').serialize() + '&tipe=' + tipe,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.metaData.code === "200") {
					getListDataSuratKontrol()
					$('#modal_surat_kontrol').modal('hide')
					swalAlert('success', 'Surat Kontrol', 'Berhasil membuat surat kontrol')
				} else {
					swalAlert('warning', 'Informasi', data.metaData.message)
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {

			}
		})
	}

	function getListDataSuratKontrol()
	{
		$.ajax({
            type: 'GET',
            url: '<?php echo base_url(URL_VCLAIM."get_list_surat_kontrol") ?>',
			data: $('#form_search').serialize(),
            cache: false,
			async: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
				if (data.metaData.code === "200") {
					if (data.response !== null) {
						var jnsKontrol = '';
						$('#table_data').DataTable().destroy();
						$('#table_data tbody').empty();
						$.each(data.response.list, function(i, v) {
							if (v.jnsKontrol === '1') {
								jnsKontrol = 'Inap';
							} else {
								jnsKontrol = 'Kontrol';
							}
							var html = `
									<tr>
										<td class="center">${++i}</td>
										<td class="center">${v.noSuratKontrol}</td>
										<td class="left">${jnsKontrol}</td>
										<td class="center">${datefmysql(v.tglRencanaKontrol)}</td>
										<td class="center">${datefmysql(v.tglTerbitKontrol)}</td>
										<td class="center">${(v.noSepAsalKontrol !== null ? v.noSepAsalKontrol : '-')}</td>
										<td class="left">${v.namaPoliAsal}</td>
										<td class="left">${v.namaPoliTujuan}</td>
										<td class="left">${v.namaDokter}</td>
										<td class="center">${v.noKartu}</td>
										<td class="left">${v.nama}</td>
										<td class="right nowrap">
											<button type="button" class="btn btn-secondary btn-xs waves-effect" onclick="cetakSuratKontrol('${v.noSuratKontrol}')"><i class="fas fa-print"></i></button>
											<button type="button" class="btn btn-secondary btn-xs waves-effect" onclick="updateSuratKontrol('${v.noSuratKontrol}')"><i class="fas fa-eye"></i></button>
											<button type="button" class="btn btn-secondary btn-xs waves-effect" onclick="hapusSuratKontrol('${v.noSuratKontrol}')"><i class="fas fa-trash-alt"></i></button>
										</td>
									</tr>
							`;
							$('#table_data tbody').append(html);
						});
						$('#table_data').DataTable();
					}
				} else {
					$('#table_data tbody').empty();
					$('#table_data').DataTable().destroy();
					swalAlert('info', 'Surat Kontrol', data.metaData.message)
				}
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
	}

	function hapusSuratKontrol(no_surat_kontrol) {
		Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Pasien dengan No. Surat Kontrol : "+no_surat_kontrol+" akan dihapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: '<i class="fas fa-window-close"></i> Tidak',
            confirmButtonText: '<i class="fas fa-check-circle"></i> Ya'
        }).then((result) => {
            if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?php echo base_url(URL_VCLAIM.'delete_surat_kontrol') ?>',
					data: 'no_surat_kontrol='+no_surat_kontrol,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.metaData.code === "200") {
							getListDataSuratKontrol()
							swalAlert('success', 'Surat Kontrol', data.metaData.message)
						} else {
							swalAlert('warning', 'Informasi', data.metaData.message)
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						swalAlert('error', 'Error', e.status)
					}
				})
            }
        })
	}

	function updateSuratKontrol(no_surat_kontrol) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM.'get_surat_kontrol_by_no_surat') ?>',
			data: 'no_surat=' + no_surat_kontrol,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
			},
			success: function(data) {
				if (data.metaData.code === "200") {
					if (data.response !== null) {
						$('.form_search_kontrol').hide()
						$('.data_sep, .data_asal_rujukan, .data_peserta').hide()
						if (data.response.jnsKontrol === '1') {
							$('.data_peserta').show()
							$('[name="nomor"]').val(data.response.sep.peserta.noKartu);
						} else if (data.response.jnsKontrol === '2') {
							$('[name="nomor"]').val(data.response.sep.noSep);
							$('.data_sep, .data_asal_rujukan, .data_peserta').show()
						}
						$('.box_kontrol').show()
						$('[name="jenis_pelayanan"]').val(data.response.jnsKontrol);
						$('#no_surat_kontrol').val(data.response.noSuratKontrol);
						
						$('.text_nosep').text(data.response.sep.noSep)
						$('.text_tglsep').text(datefmysql(data.response.sep.tglSep))
						$('.text_jenpel').text(data.response.sep.jnsPelayanan)
						$('.text_poli').text(data.response.sep.poli)
						$('.text_diagnosa').text(data.response.sep.diagnosa)

						$('.text_norujukan').text(data.response.sep.provPerujuk.noRujukan)
						$('.text_tglrujukan').text(datefmysql(data.response.sep.tglSep) + ' s/d ' +datefmysql(data.response.sep.provPerujuk.tglRujukan))
						$('.text_tglrujukan').text(datefmysql(data.response.sep.tglSep) + ' s/d ' +datefmysql(data.response.sep.provPerujuk.tglRujukan))
						$('.text_faskesasalrujukan').text(data.response.sep.provPerujuk.nmProviderPerujuk + ' (' + data.response.sep.provPerujuk.kdProviderPerujuk + ')')
						
						$('.text_nokartupeserta').text(data.response.sep.peserta.noKartu)
						$('.text_namapeserta').text(data.response.sep.peserta.nama)
						$('.text_tgllahirpeserta').text(data.response.sep.peserta.tglLahir)
						$('.text_kelaminpeserta').text((data.response.sep.peserta.kelamin === 'L' ? 'Laki-laki' : 'Perempuan'))
						$('.text_kelaspeserta').text(data.response.sep.peserta.hakKelas)
						$('.text_ppkpeserta').text(data.response.sep.provUmum.nmProvider + ' (' + data.response.sep.provUmum.kdProvider + ')')

						$('#tgl_rencana').val(data.response.tglRencanaKontrol !== null ? datefmysql(data.response.tglRencanaKontrol) : '<?php echo date('d/m/Y') ?>')
						$('#jenis_pelayanan_kontrol').val(data.response.jnsKontrol)

						$('#modal_surat_kontrol').modal('show')
						$('#modal_surat_kontrol_label').html('Perbarui Surat Kontrol/SPRI')
					} else {
						swalAlert('warning', 'Informasi', 'Gagal mendapatkan data, Silahkan coba kembali.')
					}
				} else {
					swalAlert('warning', 'Informasi', data.metaData.message)
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {

			}
		})
	}

	function cetakSuratKontrol(no_surat) {
		window.open('<?= base_url(URL_VCLAIM_PRINT) ?>surat_kontrol_bpjs/' + no_surat, 'Cetak Surat Kontrol ', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}
</script>