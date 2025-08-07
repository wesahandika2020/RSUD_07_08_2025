<script>
	var dWidth = $(window).width();
    var dHeight= $(window).height();
    var x = screen.width/2 - dWidth/2;
    var y = screen.height/2 - dHeight/2;

    $(function () {
    	getListDataHasilFisioterapi(1);
		$('#btn-print-hasil').css('display', 'none')

		$('#btn-search').click(function() {
			$('#modal-search').modal('show');
		})

		$('#btn-reload').click(function() {
			resetAllData();
			getListDataHasilFisioterapi(1);
		});

		$('#dokter-auto').select2({
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
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#hasil-field').summernote({
			height: 200,
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


		$('.form-control').keyup(function(){
            if($(this).val() !== ''){
                syams_validation_remove(this);
            }
        });

        $('.select2-input').change(function(){
            if($(this).val() !== ''){
                syams_validation_remove(this);
            }
        });

    })

    function getListDataHasilFisioterapi(page) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_fisioterapi/api/hasil_fisioterapi/get_list_hasil_fisioterapi") ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDataHasilFisioterapi(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				$.each(data.data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center nowrap">${v.kode}</td>
							<td class="nowrap">${((v.waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '')}</td>
							<td>${v.id_pasien}</td>
							<td class="nowrap">${v.nama}</td>
							<td class="nowrap">${v.dokter_penanggung_jawab}</td>
							<td class="nowrap">${v.jenis_layanan} ${v.layanan}</td>
							<td class="nowrap">${((v.waktu_hasil !== null) ? datetimefmysql(v.waktu_hasil) : '')}</td>
							<td class="right aksi">
								<button type="button" title="Entri Hasil Pemeriksaan Fisioterapi" class="btn btn-secondary btn-xs" onclick="detailPemeriksaan(${v.id_pendaftaran}, ${v.id_layanan_pendaftaran}, ${v.id})"><i class="fas fa-edit mr-1"></i>Entri Hasil</button>
							</td>
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

	function paging(page) {
		getListDataHasilFisioterapi(page);
	}

	function resetAllData() {
		location.reload();
	}

	function detailPemeriksaan(id_pendaftaran, id_layanan_pendaftaran, id_fisioterapi) {
		$('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);
		getRequestFisioterapi(id_fisioterapi);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let pasien = '';
				pasien = data.pasien;
				if (pasien !== null) {

					let kelamin = '';
					if (pasien.kelamin == 'L') {
						kelamin = 'Laki - laki';
					} else if (pasien.kelamin == 'P') {
						kelamin = 'Perempuan';
					}

					let umur = '';
					if (pasien.tanggal_lahir !== null | pasien.tanggal_lahir !== '') {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
					}

					$('#no-rm-detail').text(pasien.id_pasien);
					$('#no-register-detail').text(pasien.no_register);
					$('#nama-detail').text(pasien.nama);
					$('#alamat-detail').text(pasien.alamat);
					$('#kelamin-detail').text(kelamin);
					$('#umur-detail').text(umur);
					$('#nama-pjwb-detail').text(pasien.nama_pjwb);
					$('#alamat-pjwb-detail').text(pasien.alamat_pjwb);
					$('#telp-pjwb-detail').text(pasien.telp_pjwb);
					$('#instansi-perujuk-detail').text(pasien.instansi_perujuk);
					$('#tenaga-medis-perujuk-detail').text(pasien.nadis_perujuk);
				}

				let layanan = '';

				layanan = data.layanan;
				if (layanan !== null) {
					let kelasTindakan = layanan.kelas;
					let jenisTindakan = layanan.jenis_layanan;
					if (jenisTindakan !== 'Rawat Inap') {
						jenisTindakan = 'Rawat Jalan';
						kelasTindakan = '<?= $kelas_tindakan ?>';
					}
				}


				$('#modal-detail-pemeriksaan').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function getRequestFisioterapi(id_fisioterapi) {
		$('#hasil-pemeriksaan-fisioterapi').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_fisioterapi/api/hasil_fisioterapi/get_permintaan_pemeriksaan_fisioterapi") ?>/id/' + id_fisioterapi,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data !== null) {
					$('#id-fisioterapi').val(data.id);
					$('#no-fisioterapi-detail').text(data.kode);

					let number = 0;
					$.each(data.detail, function(i, value) {
						let html = /* html */ `
							<div class="row mt-3">
								<div class="col-md-12">
									<div class="widget">
										<div class="widget-header">
											<div class="title">
												<h6><i class="fas fa-angle-right mr-1"></i><b>${i}</b></h6>
											</div>
										</div>
										<div class="widget-body">
											<table class="table table-hover table-striped table-sm color-table info-table">
												<thead>
													<tr>
														<th width="20%">Jenis Pemeriksaan</th>
														<th width="30%">Hasil</th>
														<th width="15%"></th>
													</tr>
												</thead>
						`;

						$.each(value, function(j, x) {
							if (x.hasil !== '' && x.hasil !== null) {
								$('#btn-print-hasil').css('display', '');
							}

							html += /* html */ `
								<tbody>
									<tr>
										<td>${x.layanan_fisio}</td>
										<td>${x.hasil}</td>
										<td class="aksi right">
											<button type="button" class="btn btn-secondary btn-xs" onclick="editHasilFisioterapi(${x.id}, ${x.id_root})"><i class="fa fa-edit mr-1"></i>Edit Hasil</button>
											<button type="button" class="btn btn-secondary btn-xs" onclick="hapusItemFisioterapi(this, ${x.id})"><i class="fa fa-trash-alt mr-1"></i>Hapus Item</button>
										</td>
									</tr>
								</tbody>
							`;
						});

						html += /* html */ `
											</table>
										</div>
									</div>
								</div>
							</div>						
						`;


						$('#hasil-pemeriksaan-fisioterapi').append(html);
						number++;
					});
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function cetakPemeriksaan(id_fisioterapi) {
		window.open('<?php echo base_url() ?>hasil_fisioterapi/printing_pemeriksaan_fisioterapi/' + id_fisioterapi, 'Cetak List Pemeriksaan Fisioterapi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakHasilFisioterapi() {
		let id_fisioterapi = $('#id-fisioterapi').val();
		window.open('<?php echo base_url() ?>hasil_fisioterapi/printing_hasil_fisioterapi/' + id_fisioterapi, 'Cetak Hasil Fisioterapi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function editHasilFisioterapi(id_detail_fisioterapi, id_layanan) {
		resetHasil();
		$('#id-detail-fisioterapi').val(id_detail_fisioterapi);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_detail_fisioterapi") ?>/id/' + id_detail_fisioterapi,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#layanan-edit').text(data.layanan_fisio);
				$('#hasil-field').summernote('code', data.hasil);

				$('#modal-hasil-fisioterapi').modal('show');
			}
		});
		
	}

	function resetHasil() {
		$('.hasil-input, #id-detail-fisioterapi, #id-layanan-fisioterapi').val('');
		$('#hasil-field').summernote('code', '');
		$('#layanan-edit').text('');
	}

	function konfirmasiSimpanHasil() {
		Swal.fire({
			title: 'Konfirmasi Simpan Hasil',
			html: "Apakah anda yakin ingin mengentrikan <br> data hasil rehabilitasi medik ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanHasil();
			}
		})
	}

	function simpanHasil() {
		let hasil = $('#hasil-field').summernote('code');

		$.ajax({
			type: 'POST',
			url: '<?= base_url("hasil_fisioterapi/api/hasil_fisioterapi/simpan_hasil_fisioterapi") ?>',
			data: $('#form-hasil-fisioterapi').serialize() + "&hasil=" + hasil + "&id_fisioterapi=" + $('#id-fisioterapi').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === false) {
					messageAddFailed();
				} else {
					messageAddSuccess();
				}

				getRequestFisioterapi($('#id-fisioterapi').val());
				getListDataHasilFisioterapi(1);
				$('#modal-hasil-fisioterapi').modal('hide');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', e.status, e.statusText);
			},
		});
	}

	function hapusItemFisioterapi(object, id) {
		swal.fire({
			title: 'Konfirmasi Hapus',
			html: "Apakah anda yakin ingin akan menghapus item pemeriksaan fisioterapi ? <br> Menghapus item pemeriksaan akan mengubah billing yang sudah tercatat",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url("hasil_fisioterapi/api/hasil_fisioterapi/hapus_pemeriksaan_fisioterapi_detail") ?>/' + id,
					cache: false,
					dataType: 'JSON',
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.message, 'Info');
						} else {
							removeMe(object);
							messageCustom(data.message, 'Success');
						}
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan saat hapus item pemeriksaan fisioterapi', 'Error');
					}
				});
			}
		})
	}

	function removeMe(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}
</script>