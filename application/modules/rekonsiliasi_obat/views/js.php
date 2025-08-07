<script>
	// var tipedata = 'list';
	$(function() {

		resetAllDataFormRM();
		ambilDataPasien(1);

		$('#bt_search').click(function() {
			$('#modal_search').modal('show');
			$('#modal_search_label').html('Form Parameter Pencarian');
		});

		$('#bt_reload_data').click(function() {
			resetAllDataFormRM();
			ambilDataPasien(1);
		});

		$(document).on('change', '[id^="lanjutan-tidak"]', function() {
		    if ($(this).data('changing')) return;

		    // Tandai bahwa perubahan sedang terjadi
		    $(this).data('changing', true);

		    var isChecked = $(this).prop('checked');
		    
		    var index = $(this).attr('id').split('-')[2];

		    if(isChecked){
		    	
				$('#lanjutan-iya-'+index).prop('checked', false).change();
			
			} else {
		    
		        $('#lanjutan-iya-'+index).prop('checked', true).change();
		    
		    }

		    $(this).data('changing', false);
		    
		});

		$(document).on('change', '[id^="lanjutan-iya"]', function() {

		    if ($(this).data('changing')) return;

		    // Tandai bahwa perubahan sedang terjadi
		    $(this).data('changing', true);

		    var isChecked = $(this).prop('checked');
		    
		    var index = $(this).attr('id').split('-')[2];

		    if(isChecked){
		    	
				$('#lanjutan-tidak-'+index).prop('checked', false).change();
			
			} else {
		    
		        $('#lanjutan-tidak-'+index).prop('checked', true).change();
		    
		    }

		    $(this).data('changing', false);
		});

		$('#apoteker').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: 13,
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama+'<br/><i>'+data.spesialisasi+'</i>';
                return markup;
            },
            formatSelection: function(data){
                return data.nama;
            }
		});

		$('#tgl-rekon-awal, #tgl-rekon-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

		$('#tambah-resep').click(function() {

			let i = '';
			let cekLength = $('#htg-length').val();

			if(cekLength === '0'){

				i = 0;

			} else {

				i = cekLength;

			}

			let html = '';

			<?php date_default_timezone_set('Asia/Jakarta'); ?>

			html = `<tr><input type="hidden" name="jml_rekon" value="${i}">
						<input type="hidden" name="id_layanan_pendaftaran${i}" value="${$('#id-layanan-rekon').val()}">
						<input type="hidden" name="status_resep${i}" value="1">
						<td class="center"><input type="text" name="tanggal_resep_lain${i}" id="tgl-resep-lain-${i}" class="form-control" value="<?= date('d/m/Y') ?>" placeholder="Tanggal Resep"></td>
						<td class="left"><input type="text" name="obat_lain${i}" id="obat-lain-${i}" class="form-control"></td>
						<td class="center"><input type="text" name="dosis_lain${i}" id="dosis-lain-${i}" class="form-control"></td>
						<td class="left"><input type="text" name="nama_user${i}" id="nama-user-${i}" class="form-control"></td>
						<td class="center"><input type="text" name="berapa_lama${i}" id="berapa-lama-${i}" class="form-control"></td>
						<td class="center"><input type="text" name="alasan_minum${i}" id="alasan-minum-${i}" class="form-control"></td>
						<td class="center"><input type="checkbox" name="lanjutan${i}" id="lanjutan-iya-${i}" value="iya" class="mr-1"></td>
						<td class="center"><input type="checkbox" name="lanjutan${i}" id="lanjutan-tidak-${i}" value="tidak" class="mr-1"></td>
						<td align="right"><button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button></td>
					</tr>`;

			$('#table-resep-pasien tbody').append(html);

			$('#tgl-resep-lain-' + i).datepicker({
                format: 'dd/mm/yyyy',
                endDate: new Date(),
            }).on('changeDate', function() {
                $(this).datepicker('hide')
            });

			i = parseInt(i) + 1;

			$('#htg-length').val(parseInt(i));
            
        });

		$('#tgl-rekon-awal, #tgl-rekon-akhir').change(function() {

			let idDaftarRekon = $('#id-pendaftaran-rekon').val();
			let idLayananRekon = $('#id-layanan-rekon').val();
			let rmRekon = $('#rm-rekon').val();

			tampilRekon(idDaftarRekon, idLayananRekon, rmRekon);
            
        });

		$('#alergi-iya').click(function() {
            if ($(this).is(':checked')) {
                $('#alergi-tidak').prop('checked', false).change()
                $('#table-riwayat-alergi').show();
                $('#btn-tambah-riwayat').show();
                $('#tabel-alergi').show();
                $('#keterangan-alergi').show();
                tabelRiwayatAlergi($('#id-pendaftaran-rekon').val());
            } else {

                $('#alergi-tidak').prop('checked', true).change()
                $('#table-riwayat-alergi').hide();
                $('#btn-tambah-riwayat').hide();
                $('#tabel-alergi').hide();
                $('#keterangan-alergi').hide();
            }
        });

        $('#alergi-tidak').click(function() {
            if ($(this).is(':checked')) {
                $('#alergi-iya').prop('checked', false).change()
                $('#table-riwayat-alergi').hide();
                $('#btn-tambah-riwayat').hide();
                $('#tabel-alergi').hide();
                $('#keterangan-alergi').hide();
            } else {
                $('#alergi-iya').prop('checked', true).change()
                $('#table-riwayat-alergi').show();
                $('#btn-tambah-riwayat').show();
                $('#tabel-alergi').show();
                $('#keterangan-alergi').show();
            }
        });

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
				let umur = '';
				if (data.tanggal_lahir !== null) {
					umur = hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')';
				}
				$('#identitas-pasien-formulir').html(data.id + ' / ' + data.nama + ' / ' + umur);

				$.getJSON('<?= base_url('form_rekam_medis/api/master_form_rekam_medis/tgl_kunjungan') ?>?idpasien=' + data.id, function(data) {
					$('#tgl-search').val('');
					$('#id_pendaftaran_search').val('');

					if (data === null) {
						$('#tgl-search').append("<option value=''>Pilih Tanggal...</option>")
					} else {
						$.each(data, function(index, value) {
							$('#tgl-search').append("<option value='" + value.id + "'>" + value.tanggal + " - " + value.jenis_pendaftaran + "</option>").change()
						})
					}
				})

				$('#id_pasien_search').val(data.id);
				return data.id + ' ' + data.nama;
			}
		})

	});

	function resetAllDataFormRM() {
		$('#jenis-rawat, #id_pasien_search, #tgl-rekon-akhir, tgl-rekon-awal, #tgl-search, #pasien-search, .select2-input, .form-control').val('');
		$('#tgl-search').empty();
		$('.select2-chosen').html('Pilih Pasien...');
		ambilDataPasien(1);
	}

	function resetTampilRekon(){

		$('#table-riwayat-alergi').hide();
        $('#btn-tambah-riwayat').hide();
        $('#tabel-alergi').hide();
        $('#keterangan-alergi').hide();
        $('#alergi-tidak').prop('checked', false).change();
        $('#alergi-iya').prop('checked', false).change();
        $('#s2id_apoteker a .select2c-chosen').html('');
		$('#apoteker, #alergi-obat, #reaksi-alergi').val('');
		$('#table-riwayat-alergi tbody').empty();
		$('#table-resep-pasien tbody').empty();
		$('#cetak-rekonsiliasi').empty();
		
	}

	function paging(page) {
		
		ambilDataPasien(page);
	
	}

	function cariRekon() {
		$('#modal_search').modal('hide');
		$('#modal_search_label').empty();
		ambilDataPasien(1);
	}

	function ambilDataPasien(p) {
		$('#page-now').val(p);
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekonsiliasi_obat/api/rekonsiliasi_obat/data_kunjungan'); ?>/page/' + p,
			data: 'keyword=' + $('#keyword-search').val() + '&' + $('#form_search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function(data) {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					ambilDataPasien(p - 1);
					return false;
				}

				$('#pagination-rekon').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary-rekon').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-rekonsiliasi-obat tbody').empty();

				$.each(data.data, function(i, v) {
					$(document).ready(function() {
						// Tambahkan event listener untuk mengubah status ketika tombol diklik
						$('#btn-expand-form-all' + v.id).click(function() {
							// Toggle class "active" pada ikon berdasarkan aria-expanded
							const isExpanded = $(this).attr('aria-expanded') === 'true';
							$('#expand-icon' + v.id).toggleClass('active', isExpanded);

							// Ubah teks tombol berdasarkan aria-expanded
							$(this).html(`<i class="fas fa-fw ${isExpanded ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded ? 'Expand All' : 'Collapse All'}`);
							$(this).toggleClass('btn-danger', !isExpanded);
							$(this).toggleClass('btn-info', isExpanded);

							history.replaceState({}, document.title, window.location.pathname);
						});
					});
					
					let btnExpand = '<a type="button" data-toggle="collapse" href="#show' + v.id + '" class="btn btn-info btn-xs" aria-expanded="false" id="btn-expand-form-all' + v.id + '"><i id="expand-icon' + v.id + '" class="fas fa-fw fa-expand mr-1"></i>Expand All </a>';
					let btnListForm = '<a type="button" href="javascript:void(0)" onclick="tampilRekon(' + v.id + ', ' + v.layanan[0].id + ', \'' + v.id_pasien + '\')" class="btn btn-xs btn-outline-info"><i class="fas fa-fw fa-list m-r-5"></i>Form Rekonsiliasi</a>';

					let rekonsiliasi_detail = '('+v.rekonsiliasi_obat+'/'+v.layanan.length+')';
					let html = /* html */ `
					<tbody>
						<tr>
							<td style="font-weight:bold;" class="text-center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td style="font-weight:bold;" class="text-center">${v.id_pasien}</td>
				            <td style="font-weight:bold;">${v.nama}</td>
				            <td style="font-weight:bold;" class="text-center">${datetimefmysql(v.tanggal_daftar)}</td>
				            <td style="font-weight:bold;" class="text-center">${v.jenis_pendaftaran}</td>
				            <td style="font-weight:bold;" class="text-center">${v.penjamin}</td>
				            <td style="font-weight:bold;" class="text-center">${v.jenis_pasien}</td>
				            <td style="font-weight:bold;" class="text-center">${rekonsiliasi_detail}</td>
				            <td colspan="1"></td>
							<td class="wrapper right">
							${((v.layanan.length > 1) ? btnExpand : btnListForm)}
							</td>
						</tr>
						${'<tr style="font-size: xx-small;" id="show' + v.id + '" class="collapse">'}
							<td colspan="2" style="background-color: white; class="center"></td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Tanggal Layanan</td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Jenis Layanan</td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Cara Bayar</td>
							<td style="background-color: powderblue; font-weight:bold;" class="left">Nama Dokter</td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Status Terlayani</td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Status Keluar</td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Rekonsiliasi</td>
							<td style="background-color: powderblue; font-weight:bold;" class="right"></td>
						</tr>
					`;

					let noo = 1;
					$.each(v.layanan, function(key, val) {

						if (val.is_rekonsiliasi_obat == '1') {
							rekonsiliasi_detail = '<i class="fas fa-check-circle"></i>';
						} else {
							rekonsiliasi_detail = '-';
						}
						
						if (val.status_terlayani === 'Belum') {
							status = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
						} else if (val.status_terlayani === 'Batal') {
							status = '<h5 style="margin-bottom: 0;"><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
						} else {
							status = '<h5 style="margin-bottom: 0;"><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
						}

						html += `
						${'<tr id="show' + v.id + '" class="collapse">'}
							<td colspan="2" style="background-color: white; class="center"></td>
							<td class="center">${val.tanggal_layanan}</td>
							<td class="center">${val.jenis_layanan +((val.ruangan !== '') ? ' ('+val.ruangan+')' : '') }</td>
							<td class="center">${val.cara_bayar}</td>
							<td class="left">${val.nama_dokter}</td>
							<td class="center">${status}</td>
							<td class="center">${((val.status_keluar !== null) ? val.status_keluar : '-')}</td>
							<td class="center">${rekonsiliasi_detail}</td>
							<td class="right"><a type="button" href="javascript:void(0)" onclick="tampilRekon('${val.id_pendaftaran}', '${val.id}', '${val.no_rm}')" class="btn btn-xs btn-outline-success"><i class="fas fa-fw fa-list m-r-5"></i>Form Rekonsiliasi</a></td>
						</tr>`;
					});

					html += `
					</tbody>
					`;

					$('#table-rekonsiliasi-obat').append(html)
				})

				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
				hideLoader();
			}
		});
	}

	function tabelRiwayatAlergi(id) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekonsiliasi_obat/api/rekonsiliasi_obat/riwayat_alergi'); ?>',
			data: 'id=' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				$('#table-riwayat-alergi tbody').empty();

				let no = '';

				$.each(data, function(i, v) {

					no = i + 1;

					html = /* html */ `
			            <tr>
			            	<td class="no-alergi" align="center">${no}</td>
			                <td align="left">
			                	${v.alergi_obat}
			                </td>
			                <td align="center">
			                	${v.kriteria_alergi}
			                </td>
			                <td align="left">
			                	${v.reaksi_alergi}
			                </td>
			                <td align="right">
			                	<button type="button" class="btn btn-secondary btn-xs" onclick="hapusRiwayatAlergi(this, ${v.id})"><i class="fas fa-trash-alt"></i></button>
                			</td>    
			            </tr>
			        `;
			        $('#table-riwayat-alergi tbody').append(html);

			    });

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				// accessFailed(e.status);
			},
		});

	}

	function hapusRiwayatAlergi(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("rekonsiliasi_obat/api/rekonsiliasi_obat/hapus_riwayat_alergi") ?>',
                            data: 'id=' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Riwayat Alergi ', data.message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    function hapusRekonDetail(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("rekonsiliasi_obat/api/rekonsiliasi_obat/hapus_rekonsiliasi") ?>',
                            data: 'id=' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Rekonsiliasi obat ', data.message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

	function tampilRekon(id_pendaftaran, id_layanan, no_rm) {
		resetTampilRekon();
		page = $('#page-now').val();

		$('#id-pendaftaran-rekon').val(id_pendaftaran);
		$('#id-layanan-rekon').val(id_layanan);
		$('#rm-rekon').val(no_rm);

		let groupAccount = "<?= $this->session->userdata('account_group') ?>";
		var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
		
		const dataParams = {
			id_pendaftaran: id_pendaftaran,
			id_layanan: id_layanan,
			no_rm: no_rm,
			tgl_rekon_awal: $('#tgl-rekon-awal').val(),
			tgl_rekon_akhir: $('#tgl-rekon-akhir').val()
		}

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekonsiliasi_obat/api/rekonsiliasi_obat/rekon_form'); ?>',
			data: dataParams,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				let cetak = `<button type="button" class="btn btn-primary waves-effect" onclick="cetakRekonsiliasi(${id_pendaftaran}, ${id_layanan})"><i class="fas fa-print"></i> Cetak</button>`;

				$('#cetak-rekonsiliasi').append(cetak);

				let pasien = data.pasien;
				let layanan = data.layanan;
				let umur = '';

				if (pasien.tanggal_lahir !== null) {
					umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
				}

				let tempatLayanan = (layanan.layanan !== null ? layanan.layanan : layanan.bangsal + layanan.bangsal_ic);

				$('#modal-nama-pasien').html('<b>' + pasien.id_pasien + ' / ' + pasien.nama + '</b> / ' + umur);
				$('#modal-kelamin').html(pasien.kelamin == 'L' ? 'Laki-laki' : 'Perempuan');
				$('#modal-layanan').html(layanan.tanggal_layanan + ' <b>/ ' + tempatLayanan + '</b>');
				$('#modal-dokter').html(layanan.dokter);

				if(typeof data.pernah_alergi !== undefined && data.pernah_alergi !== null){

					if(data.pernah_alergi.pernah_alergi === 'Pernah'){

						if (data.pernah_alergi.pernah_alergi === 'Pernah') {$('#alergi-iya').prop('checked', true).change()}
						$('#table-riwayat-alergi').show();
		                $('#btn-tambah-riwayat').show();
		                $('#tabel-alergi').show();
		                $('#keterangan-alergi').show();
		                tabelRiwayatAlergi(id_pendaftaran);

					} else {
                	
                		if (data.pernah_alergi.pernah_alergi === 'Tidak') {$('#alergi-tidak').prop('checked', true).change()}

                	}

				}

				if(typeof data.apoteker !== undefined && data.apoteker !== null){

					let apoteker = data.apoteker;

					$('#s2id_apoteker a .select2c-chosen').html(apoteker.nama);
					$('#apoteker').val(apoteker.id_apoteker);

				}

				if(typeof data.resep !== undefined){

					var hitungArray = [];

					let html = '';

					let tglResep = '';

					let namaLengkap = '';

					let kekuatan = '';

					let namaUser = '';

					$.each(data.resep, function(i, v) {

						hitungArray.push(i);

						if(data.resep[i].status_resep === '1'){

							tglResep = `<input type="text" name="tanggal_resep_lain${i}" id="tgl-resep-lain-${i}" class="form-control" value="${datefmysql(data.resep[i].tanggal_resep)}" placeholder="Tanggal Resep">`;
							namaLengkap = `<input type="text" name="obat_lain${i}" id="obat-lain-${i}" value="${data.resep[i].nama_lengkap !== null ? data.resep[i].nama_lengkap : ''}" class="form-control">`;
							kekuatan = `<input type="text" name="dosis_lain${i}" id="dosis-lain-${i}" value="${data.resep[i].kekuatan !== null ? data.resep[i].kekuatan : ''}" class="form-control">`;
							namaUser = `<input type="text" name="nama_user${i}" id="nama-user-${i}" value="${data.resep[i].nama_user !== null ? data.resep[i].nama_user : ''}" class="form-control">`;

						} else {

							tglResep = datetime2date(data.resep[i].tanggal_resep);
							namaLengkap = data.resep[i].nama_lengkap;
							kekuatan = `${data.resep[i].kekuatan !== null ? data.resep[i].kekuatan : ''}`+ ` ` + `${data.resep[i].nama !== null ? data.resep[i].nama : ''}`;
							namaUser = data.resep[i].nama_user;

						}

						html = `
						<tr><input type="hidden" name="jml_rekon" value="${i}"><input type="hidden" name="id_resep_detail${i}" value="${data.resep[i].id}">
							<input type="hidden" name="id_resep${i}" value="${data.resep[i].id_resep}">
							<input type="hidden" name="id_layanan_pendaftaran${i}" value="${data.resep[i].id_layanan}">
							<input type="hidden" name="status_resep${i}" value="${data.resep[i].status_resep}">
							<td class="center">${tglResep}</td>
							<td class="left">${namaLengkap}</td>
							<td class="center">${kekuatan}</td>
							<td class="left">${namaUser}</td>
							<td class="center"><input type="text" name="berapa_lama${i}" id="berapa-lama-${i}" value="${data.resep[i].lama_pakai !== null ? data.resep[i].lama_pakai : ''}" class="form-control"></td>
							<td class="center"><input type="text" name="alasan_minum${i}" id="alasan-minum-${i}" value="${data.resep[i].alasan_minum !== null ? data.resep[i].alasan_minum : ''}" class="form-control"></td>
							<td class="center"><input type="checkbox" name="lanjutan${i}" id="lanjutan-iya-${i}" value="iya" class="mr-1"></td>
							<td class="center"><input type="checkbox" name="lanjutan${i}" id="lanjutan-tidak-${i}" value="tidak" class="mr-1"></</td>
							<td align="right">
			                	<button type="button" class="btn btn-secondary btn-xs" onclick="hapusRekonDetail(this, ${data.resep[i].id_rekon})"><i class="fas fa-trash-alt"></i></button>
                			</td>  
						</tr>
								`;

						$('#table-resep-pasien tbody').append(html);

						$('#tgl-resep-lain-' + i).datepicker({
			                format: 'dd/mm/yyyy',
			                endDate: new Date(),
			            }).on('changeDate', function() {
			                $(this).datepicker('hide')
			            });

						if (data.resep[i].lanjutan === 'iya') {$('#lanjutan-iya-'+i).prop('checked', true).change()}
                    	if (data.resep[i].lanjutan === 'tidak') {$('#lanjutan-tidak-'+i).prop('checked', true).change()}

					})

					let xArray = hitungArray.length;

					$('#htg-length').val(xArray);

				}

				$('#modal-rekonsiliasi').modal('show');
				$('#modal-rekonsiliasi-label').html('Form Rekonsiliasi Obat');

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});

	}

	function konfirmasiRekonsiliasi() {
        bootbox.dialog({
            message: "Anda yakin ingin mengubah data ini?",
            title: 'Konfirmasi Simpan',
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close mr-2"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {
                       
                    }
                },
                konfirmasi: {
                    label: '<i class="fas fa-check-circle mr-2"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        simpanRekonsiliasi();
                    }
                }
            }
        });
    }

	function simpanRekonsiliasi() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("rekonsiliasi_obat/api/rekonsiliasi_obat/simpan_rekonsiliasi") ?>',
            data: $('#form-rekonsiliasi').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

            	if (typeof data.metaData !== 'undefined') {

            		if (data.metaData.code !== 200) {

                    	messageCustom(data.metaData.message, 'Error');

                    	if(data.metaData.param === 'obat'){

                        	syams_validation('#obat-lain-' + data.metaData.x, data.metaData.message);

                        } else {

                        	syams_validation_remove($('#obat-lain-' + data.metaData.x));

                        }

                        if(data.metaData.param === 'dosis'){

                        	syams_validation('#dosis-lain-' + data.metaData.x, data.metaData.message);

                        } else {

                        	syams_validation_remove($('#dosis-lain-' + data.metaData.x));

                        }


                    } else {

                    	let dataParam = parseInt(data.metaData.param);

                    	let param = parseInt(data.metaData.param)+1;

                    	let hitungParam = parseInt(param)-parseInt(data.metaData.x);

                    	for(let z=hitungParam;z <= dataParam; z++){

                    		syams_validation_remove($('#obat-lain-' + z));
                    		syams_validation_remove($('#dosis-lain-' + z));

                    	}

                        let idPendaftaranRekon = $('#id-pendaftaran-rekon').val();
						let idLayananRekon = $('#id-layanan-rekon').val();
						let rmRekon = $('#rm-rekon').val();

						tampilRekon(idPendaftaranRekon, idLayananRekon, rmRekon);

                    }

                }
					
                
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                
            }
        });
    }

    function tambahRiwayat() {

    	if ($('#alergi-obat').val() === '') {
            syams_validation('#alergi-obat', 'Obat yang menimbulkan alergi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#alergi-obat');
        }

        if ($('#kriteria-alergi').val() === '') {
            syams_validation('#kriteria-alergi', 'Kriteria alergi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#kriteria-alergi');
        }

        if ($('#reaksi-alergi').val() === '') {
            syams_validation('#reaksi-alergi', 'Reaksi alergi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#reaksi-alergi');
        }

        let html = '';
        let noAlergi = $('.no-alergi').length;
        let kriteria = $("#kriteria-alergi option:selected").text();
        let idKriteria = $('#kriteria-alergi').val();
        let alergiObat = $('#alergi-obat').val();
        let reaksiAlergi = $('#reaksi-alergi').val();
        let idPendaftaranRekon = $('#id-pendaftaran-rekon').val();

        html = /* html */ `
            <tr>
            	<td class="no-alergi" align="center"><input type="hidden" name="id_pendaftaran[]" value="${idPendaftaranRekon}">${++noAlergi}</td>
                <td align="left"><input type="hidden" name="no_length" value="${noAlergi}">
                	<input type="hidden" name="alergi_obat[]" value="${alergiObat}">${alergiObat}
                </td>
                <td align="center">
                	<input type="hidden" name="kriteria_alergi[]" value="${idKriteria}">${kriteria}
                </td>
                <td align="left">
                	<input type="hidden" name="reaksi_alergi[]" value="${reaksiAlergi}">${reaksiAlergi}
                </td>
                <td align="right">
                	<button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#table-riwayat-alergi tbody').append(html);

    }

    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function cetakRekonsiliasi(id_pendaftaran, id_layanan) {
        window.open('<?= base_url() ?>rekonsiliasi_obat/cetak_rekonsiliasi?id=' + id_pendaftaran + '&id_layanan=' + id_layanan + $('#form-rekonsiliasi').serialize(), 'Cetak Rekonsiliasi Obat',
            'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

</script>