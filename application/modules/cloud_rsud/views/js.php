<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	var baseUrlcloud = '<?= base_url('cloud_rsud/api/cloud_rsud/') ?>';
	var account_group = "<?= $this->session->userdata('account_group') ?>";
	var unit = "<?= $this->session->userdata('unit') ?>";

	$(function() {
		$('#modal-upload-file-label').append('MODAL UPLOAD FILE DOKUMEN REKAM MEDIS PASIEN')

		$('#kode-file-lainnya').select2({
			ajax: {
				url: "<?= base_url('cloud_rsud/api/cloud_rsud/master_upload') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						list: $('#list-kode-file-lainnya').val(), //search term
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
				// var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				var markup = data.nama;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		})
	});

	function formatDate(dateString) {
		const dateObject = new Date(dateString);

		const formatNumber = (number) => (number < 10 ? `0${number}` : `${number}`);

		const day = formatNumber(dateObject.getDate());
		const month = formatNumber(dateObject.getMonth() + 1);
		const year = dateObject.getFullYear();

		return `${day}-${month}-${year}`;
	}

	function uploadFileRM(id_pendaftaran, id_layanan, id_pasien, for_casemix = null) {

		$('#file-tuberkulosis').removeClass('show');
		$('.data-upload-kosong').prop("hidden", true);
		$('#div-delete-sitb').empty()
		$('#id-cloud-sitb').val('')
		$('.upload-sitb').prop("hidden", false);

		$('#file_upload_fhl').val('')
		$('#kode-file-lainnya, #keterangan-fhl').val('');
		$('#s2id_kode-file-lainnya a .select2-chosen').html('');

		$.ajax({
			type: 'GET',
			url: baseUrlcloud + 'file_upload_pasien/id/' + id_pendaftaran + '/id_layanan/' + id_layanan + '/id_pasien/' + id_pasien + '/for_case/' + (for_casemix || ''),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (typeof data.metadata !== 'undefined' && data.metadata.code !== 200) {

					swalAlert('warning', data.metadata.code, data.metadata.message);

				} else {
					let pasien = data.pasien;
					let layanan = data.layanan;
					let umur = '';

					let timeTglMasuk = pasien.tanggal_daftar;
					let tanggal_daftar = timeTglMasuk.split(' ')[0];
					let nama_folder_file = tanggal_daftar + '_' + pasien.no_register;

					$('#nama-pasien-fhl').val(nama_folder_file);

					if (!['Admin', 'Rawat Jalan'].includes(account_group) && unit !== 'Paru' && data.file_sitb == null) {
						$('.data-upload-kosong').prop("hidden", false);
					}

					if (data.file_sitb !== null) {
						let sitb = data.file_sitb;

						$('#id-cloud-sitb').val(sitb.id_cloud);
						$('#download-sitb').click(function() {
							const imageUrl = `${sitb.file_location}`;
							const fileName = `${pasien.id_pasien} ${pasien.nama}_${sitb.nama_file}`;
							downloadImage(imageUrl, fileName);
						});
					}

					if (pasien.tanggal_lahir !== null) {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
					}

					let layananPasienAll = '';
					layananPasienAll = (layanan.layanan != null ? layanan.layanan : (layanan.bangsal != null ? layanan.bangsal : layanan.bangsal_ic)) + ' (' + layanan.jenis_layanan + ')';

					$('#ufrm-nama-pasien').html('<b>' + pasien.id_pasien + ' / ' + pasien.nama + '</b> / ' + umur)
					$('#ufrm-kelamin').html(pasien.kelamin == 'L' ? 'Laki-laki' : 'Perempuan')
					$('#ufrm-layanan').html(layananPasienAll)

					simpanUploadSITB(data);
					simpanUploadLain(data, for_casemix);
					$('#modal-upload-file').modal('show');
					// messageCustom('Lihat file upload rekam medis berhasil', 'Success');

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

	function resetUploadRM() {
		$('#btn-save-sitb').removeClass('btn-info');
		$('#btn-save-sitb').removeClass('btn-secondary');
	}

	function simpanUploadSITB(data) {

		let sitb = data.file_sitb;
		if (!['Admin', 'Rawat Jalan'].includes(account_group) && unit !== 'Paru') {
			$('#no-reg-sitb').prop("readonly", true);
			$('.file-upload-sitb, .btn-save-sitb').prop("hidden", true);
			$('#keterangan-sitb').prop("readonly", true);

			if (sitb == null) {
				$('.upload-sitb').prop("hidden", true);
			}
		}

		if ((account_group == 'Admin') && (sitb !== null)) {
			$('#div-delete-sitb').append('<button id="btn-delete-sitb" type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash mr-1"></i> Hapus</button>');
		}

		$('#id-pendaftaran-sitb').val(data.pasien.id);
		$('#id-layanan-sitb').val(data.layanan.id);
		$('#id-pasien-sitb').val(data.pasien.id_pasien);
		$('#id-user-sitb').val(<?= $this->session->userdata('id_translucent') ?>);
		$('#aplikasi-sitb').val('simrs');
		$('#kategori-sitb').val('sitb');
		$('#no-reg-sitb').val('');
		$('#file_upload_sitb').val('');
		$('#keterangan-sitb').val('');
		$('#created-at-sitb').val('');

		if (sitb == null) {
			$('#href-image-sitb').attr('href', '<?= resource_url() . 'images/avatars/upload.png' ?>');
			$('#image-sitb').attr('src', '<?= resource_url() . 'images/avatars/upload.png' ?>').parent().removeClass('el-overlay-1');
			$('#card-label-sitb').html('<b><i>TIDAK ADA FILE YANG DIUPLOAD</i></b>')

			$('#btn-save-sitb').html('<i class="fas fa-save mr-1"></i> Simpan').removeClass('btn-secondary').addClass('btn-info');
			btnType = 'simpan';
		} else {
			let url = sitb.file_location.replace('http://192.168.77.101/', 'https://cloudrsud.tangerangkota.go.id/');
			// $('#file_upload_sitb').val('');
			$('#no-reg-sitb').val(sitb.no_reg_sitb);
			$('#keterangan-sitb').val(sitb.keterangan == null ? '' : sitb.keterangan);
			$('#href-image-sitb').attr('href', url);
			$('#image-sitb').attr('src', url).parent().addClass('el-overlay-1');
			$('#card-label-sitb').html('<b>PETUGAS UPLOAD : ' + sitb.nama_petugas.toUpperCase() + '</b><br> Tanggal Upload : ' + sitb.created_at)

			$('#btn-save-sitb').html('<i class="fas fa-save mr-1"></i> Update').removeClass('btn-info').addClass('btn-secondary');
			btnType = 'update';
		}

		syams_validation_remove($('#no-reg-sitb, #file_upload_sitb'));

	}

	function simpanUploadLain(data, for_case) {

		let data_file = data.file_rm_lain;
		
		const kode_kategori_list = data_file.map(item => item.kode_kategori);
		// const in_list_kode = kode_kategori_list.join(', ');

		$('#list-kode-file-lainnya').val(kode_kategori_list)
		// console.log(in_list_kode);

		$('#id-pendaftaran-fhl').val(data.pasien.id);
		$('#id-layanan-fhl').val(data.layanan.id);
		$('#id-pasien-fhl').val(data.pasien.id_pasien);
		$('#id-user-fhl').val(<?= $this->session->userdata('id_translucent') ?>);
		// $('#aplikasi-fhl').val('simrs');
		// $('#kategori-fhl').val('sitb');
		// $('#no-reg-fhl').val('');
		$('#file_upload_fhl').val('');
		$('#keterangan-fhl').val('');
		$('#created-at-fhl').val('');

		$('#table-list-file-lain tbody').empty();

		if (data_file.length === 0) {
			let count_colspan = 6;
			if (for_case != null) {
				count_colspan = 7;
			}

			let html = /* html */ `
				<tr>
					<td colspan="${count_colspan}" style="color: white; background-color: grey;" class="center">Tdak ada file yang di upload</td>
				</tr>
			`;

			$('#table-list-file-lain tbody').append(html);
		} else {

			let number_no = 1;

			$.each(data_file, function(i, v) {
				let id_cloud = btoa(v.id_cloud);
				let id = btoa(v.id);

				$('.for-case').hide();
				let field_case = '';
				if (for_case != null) {
					$('.for-case').show();
					field_case = `<td class="center">${formatDate(v.tanggal_daftar)}<br>(Rawat ${v.jenis_rawat})</td>`;
				}

				let html = /* html */ `
					<tr>
						<td class="center">${number_no++}</td>
						${field_case}
						<td class="center">${v.nama_kategori}</td>
						<td class="center">${v.created_at}</td>
						<td class="center">${v.nama_petugas}</td>
						<td class="center">${v.keterangan != null ? v.keterangan : '-'}</td>
						<td class="right">
							<button type="button" onclick="printFileLain('${id_cloud}')" class="btn btn-info btn-circle btn-sm"><i class="fa fa-print"></i></button>
							<button type="button" onclick="hapusFileLain('${id}', '${v.nama_kategori}')" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash-alt"></i></button>
						</td>
					</tr>
				`;

				$('#table-list-file-lain tbody').append(html);
			})
		}

		// if (sitb == null) {
		// $('#href-image-sitb').attr('href', '<?= resource_url() . 'images/avatars/upload.png' ?>');
		// $('#image-sitb').attr('src', '<?= resource_url() . 'images/avatars/upload.png' ?>').parent().removeClass('el-overlay-1');
		// $('#card-label-sitb').html('<b><i>TIDAK ADA FILE YANG DIUPLOAD</i></b>')

		// $('#btn-save-sitb').html('<i class="fas fa-save mr-1"></i> Simpan').removeClass('btn-secondary').addClass('btn-info');
		// btnType = 'simpan';
		// } else {
		// $('#file_upload_sitb').val('');
		// $('#no-reg-sitb').val(sitb.no_reg_sitb);
		// $('#keterangan-sitb').val(sitb.keterangan == null ? '' : sitb.keterangan);
		// $('#href-image-sitb').attr('href', sitb.file_location);
		// $('#image-sitb').attr('src', sitb.file_location).parent().addClass('el-overlay-1');
		// $('#card-label-sitb').html('<b>PETUGAS UPLOAD : ' + sitb.nama_petugas.toUpperCase() + '</b><br> Tanggal Upload : ' + sitb.created_at)

		// $('#btn-save-sitb').html('<i class="fas fa-save mr-1"></i> Update').removeClass('btn-info').addClass('btn-secondary');
		// btnType = 'update';
		// }

		// syams_validation_remove($('#no-reg-sitb, #file_upload_sitb'));

	}


	$('#btn-save-sitb').click(function() {
		if ($('#no-reg-sitb').val() === '') {
			syams_validation('#no-reg-sitb', 'No. Registrasi SITB tidak boleh kosong');
			$('#no-reg-sitb').focus();
			return false;
		} else {
			syams_validation_remove($('#no-reg-sitb'));
		}

		var fileInput = $('#file_upload_sitb');
		var fileImage = fileInput.prop('files')[0];
		var formInputData = $('#form-upload-file').serialize();

		var messagePopUp, title, btnKonfirmSITB;

		if (btnType == 'simpan') {
			if (fileInput.val() === '') {
				syams_validation('#file_upload_sitb', 'File Upload tidak boleh kosong');
				fileInput.focus();
				return false;
			} else {
				syams_validation_remove(fileInput);
			}
			// Validasi ukuran file
			if (fileImage.size > 2000000) {
				fileInput.val('');
				messageCustom('File yang diunggah terlalu besar! | Maksimal gambar 2 MB', 'Error');
				return;
			}
			messagePopUp = "Anda yakin akan menyimpan file data SITB?";
			title = "Simpan Upload Data SITB";
			btnKonfirmSITB = '<i class="fas fa-fw fa-check-circle"></i> Simpan';
		} else {
			messagePopUp = "Anda yakin akan menyimpan perubahan file data SITB?";
			title = "Update Upload Data SITB";
			btnKonfirmSITB = '<i class="fas fa-fw fa-check-circle"></i> Update';
		}

		bootbox.dialog({
			message: messagePopUp,
			title: title,
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: btnKonfirmSITB,
					className: "btn-info",
					callback: function() {


						// Proses upload file ke server
						var formData = new FormData();
						formData.append('file_upload_sitb', fileImage);

						// Menambahkan data form input ke formData
						$.each(formInputData.split('&'), function(index, field) {
							var [key, value] = field.split('=');
							formData.append(key, decodeURIComponent(value.replace(/\+/g, ' ')));
						});

						$.ajax({
							type: 'POST',
							url: baseUrlcloud + 'upload_file_sitb/action/' + btnType,
							data: formData,
							cache: false,
							contentType: false,
							processData: false,
							dataType: 'JSON',
							beforeSend: function() {
								showLoader();
							},
							success: function(data) {
								if (data.metadata.success !== true) {
									swalAlert('warning', data.metadata.code, data.metadata.message);
								} else {
									uploadFileRM($('#id-pendaftaran-sitb').val(), $('#id-layanan-sitb').val(), $('#id-pasien-sitb').val());
									messageEditSuccess();
									// swalAlert('success', data.metadata.code, data.metadata.message);
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
				}
			}
		});

	});

	$('#div-delete-sitb').click(function() {
		let id_cloud_sitb = $('#id-cloud-sitb').val();

		if (id_cloud_sitb === '') {
			swalAlert('warning', 'ERROR', 'Data File SITB tidak ada.');
			return false;
		}

		bootbox.dialog({
			message: "<b>Anda yakin ingin menghapus file data SITB? Data yang dihapus tidak dapat dikembalikan!<b>",
			title: "Hapus Data SITB",
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-trash"></i> Hapus',
					className: "btn-danger",
					callback: function() {

						$.ajax({
							type: 'DELETE',
							url: baseUrlcloud + 'deleted_file_sitb/id/' + id_cloud_sitb,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								messageDeleteSuccess();
								uploadFileRM($('#id-pendaftaran-sitb').val(), $('#id-layanan-sitb').val(), $('#id-pasien-sitb').val());
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	});

	function downloadImage(url_file, filename) {
		$.ajax({
			type: 'POST',
			url: baseUrlcloud + 'download_image',
			data: {
				url: url_file,
				filename: filename
			},
			// cache: false,
			// contentType: false,
			// processData: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				messageCustom('Gambar berhasil di unduh.', 'Success');
				deletePatch(data.patch, filename);
				// swalAlert('success', data.metadata.code, data.metadata.message);
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Gambar gagal di unduh, silahkan coba lagi.', 'Error');
			}
		});
	}

	function deletePatch(patch, filename) {
		const a = document.createElement('a');
		a.href = patch;
		a.download = filename;
		document.body.appendChild(a);
		a.click();
		document.body.removeChild(a);

		$.ajax({
			type: 'POST',
			url: baseUrlcloud + 'delete_patch',
			data: {
				filename: filename
			},

			beforeSend: function() {
				showLoader();
			},
		});

	}


	$('#btn-save-fhl').click(function() {
		if ($('#kode-file-lainnya').val() === '') {
			syams_validation('#kode-file-lainnya', 'Jenis File tidak boleh kosong');
			$('#kode-file-lainnya').focus();
			return false;
		} else {
			syams_validation_remove($('#kode-file-lainnya'));
		}

		if ($('#file_upload_fhl').val() === '') {
			syams_validation('#file_upload_fhl', 'File Upload tidak boleh kosong');
			$('#file_upload_fhl').focus();
			return false;
		} else {
			syams_validation_remove($('#file_upload_fhl'));
		}

		var fileInput = $('#file_upload_fhl');
		var fileImage = fileInput.prop('files')[0];
		var formInputData = $('#form-hasil-lainnya').serialize();

		var messagePopUp, title, btnKonfirmSITB;

		if (fileInput.val() === '') {
			syams_validation('#file_upload_fhl', 'File Upload lain tidak boleh kosong');
			fileInput.focus();
			return false;
		} else {
			syams_validation_remove(fileInput);
		}
		// Validasi ukuran file
		if (fileImage.size > 5000000) {
			fileInput.val('');
			messageCustom('File yang diunggah terlalu besar! | Maksimal gambar 5 MB', 'Error');
			return;
		}
		messagePopUp = "Anda yakin akan menyimpan file upload?";
		title = "Simpan File Upload";
		btnKonfirmSITB = '<i class="fas fa-fw fa-check-circle"></i> Simpan';

		bootbox.dialog({
			message: messagePopUp,
			title: title,
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: btnKonfirmSITB,
					className: "btn-info",
					callback: function() {


						// Proses upload file ke server
						var formData = new FormData();
						formData.append('file_upload_fhl', fileImage);

						// Menambahkan data form input ke formData
						$.each(formInputData.split('&'), function(index, field) {
							var [key, value] = field.split('=');
							formData.append(key, decodeURIComponent(value.replace(/\+/g, ' ')));
						});

						$.ajax({
							type: 'POST',
							url: baseUrlcloud + 'upload_file_lain',
							data: formData,
							cache: false,
							contentType: false,
							processData: false,
							dataType: 'JSON',
							beforeSend: function() {
								showLoader();
							},
							success: function(data) {
								if (data.metadata.success !== true) {
									swalAlert('warning', data.metadata.code, data.metadata.message);
								} else {
									uploadFileRM($('#id-pendaftaran-sitb').val(), $('#id-layanan-sitb').val(), $('#id-pasien-sitb').val());
									messageEditSuccess();
									// swalAlert('success', data.metadata.code, data.metadata.message);
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
				}
			}
		});

	});

	$('#btn-delete-file-lain').click(function() {
		let id_cloud_sitb = $('#id-cloud-sitb').val();

		if (id_cloud_sitb === '') {
			swalAlert('warning', 'ERROR', 'Data File SITB tidak ada.');
			return false;
		}

		bootbox.dialog({
			message: "<b>Anda yakin ingin menghapus file data SITB? Data yang dihapus tidak dapat dikembalikan!<b>",
			title: "Hapus Data SITB",
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-trash"></i> Hapus',
					className: "btn-danger",
					callback: function() {

						$.ajax({
							type: 'DELETE',
							url: baseUrlcloud + 'deleted_file_sitb/id/' + id_cloud_sitb,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								messageDeleteSuccess();
								uploadFileRM($('#id-pendaftaran-sitb').val(), $('#id-layanan-sitb').val(), $('#id-pasien-sitb').val());
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	});

	function printFileLain(id_cloud) {
		// alert(atob(id_cloud))
		window.open('<?= base_url('cloud_rsud/print_file_lain/') ?>' + id_cloud, 'Cetak Catatan Perkembangan Pasien Terintegrasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function hapusFileLain(id_cloud, nama_file) {
		bootbox.dialog({
			message: `<b>Anda yakin ingin menghapus file ${nama_file}? Data yang dihapus tidak dapat dikembalikan!<b>`,
			title: `Hapus Data File ${nama_file}`,
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-trash"></i> Hapus',
					className: "btn-danger",
					callback: function() {

						$.ajax({
							type: 'DELETE',
							url: baseUrlcloud + 'deleted_file_lain/id/' + id_cloud,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								messageDeleteSuccess();
								uploadFileRM($('#id-pendaftaran-sitb').val(), $('#id-layanan-sitb').val(), $('#id-pasien-sitb').val());
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
</script>