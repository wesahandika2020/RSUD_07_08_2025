<script>
	$(function() {
		getListDataExpertise(1);
		$('#editor').summernote({
			height: 300, //set editable area's height
			focus: true, //set focus editable area after Initialize summernote 
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

		$('#btn-tambah').click(function() {
			resetAllData();
			$('#modal-expertise-title').html('Form Tambah Expertise');
			$('#modal-expertise').modal('show');
		});

		$('#dokter-auto').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'JSON',
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

		$('#layanan-auto').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/layanan_auto') ?>",
				dataType: 'JSON',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: 'Pelayanan Radiologi',
						page: page // page number
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
				var markup = data.kode + ' ' + data.nama + '<br/>' + data.parent;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama + ' ' + data.parent;
			}
		});

		$('.select2-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		$('.form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		$('#btn-reload').click(function() {
			resetAllData();
			getListDataExpertise(1);
		});
	});

	function resetAllData() {
		$('#id, .form-control, #pencarian, .select2-input').val('');
		$('.select2-chosen').html('');
		$('#editor').summernote('code', '');
		syams_validation_remove('.form-control');
		syams_validation_remove('.select2-input');
	}

	function getListDataExpertise(page) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("expertise/api/expertise/get_list_data_expertise") ?>/page/' + page,
			data: 'pencarian=' + $('#pencarian').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDataExpertise(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td>${v.layanan}</td>
							<td>${v.dokter}</td>
							<td>${v.keterangan}</td>
							<td class="center aksi">
								<button type="button" class="btn btn-secondary btn-xs" onclick="showExpertise(${v.id})"><i class="fas fa-eye mr-1"></i>Lihat Expertise</button>
							</td>
							<td class="right aksi">
								<button type="button" class="btn btn-success btn-xs" onclick="editExpertise(${v.id}, ${data.page})"><i class="fas fa-edit mr-1"></i>Edit</button>
								<button type="button" class="btn btn-danger btn-xs" onclick="deleteExpertise(${v.id}, ${data.page})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
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
		getListDataExpertise(page);
	}

	function konfirmasiDataExpertise() {
		let stop = false;

		if ($('#layanan-auto').val() === '') {
			syams_validation('#layanan-auto', 'Silahkan pilih layanan terlebih dahulu.');
			stop = true;
		}

		if (stop) {
			return false;
		}

		swal.fire({
			title: 'Konfirmasi',
			text: "Apakah anda yakin ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanDataExpertise();
			} 
		})
	}

	function simpanDataExpertise() {
		let expertise = $('#editor').summernote('code');
		let update = '';
		if ($('#id').val() !== '') {
			update = '/id/' + $('#id').val();
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("expertise/api/expertise/simpan_data_expertise") ?>' + update,
			data: $('#form-expertise').serialize() + '&expertise=' + expertise,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-expertise').modal('hide');
				if (data.status === false) {
					messageCustom(data.message, 'Info');
					return false;
				}	

				if ($('#id').val() !== '') {
					messageEditSuccess();
				} else {
					messageAddSuccess();
				}

				getListDataExpertise(1);
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', e.status, e.statusText);
			},
		});
	}

	function showExpertise(id) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("expertise/api/expertise/get_expertise_by_id") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#isi').html(data.data.expertise);
				$('#modal-detail').modal('show');
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function editExpertise(id, page) {
		resetAllData();
		$('#page-now').val(page);
		$('#modal-expertise-title').html('Form Edit Expertise');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("expertise/api/expertise/get_expertise_by_id") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#id').val(data.data.id);
				$('#editor').summernote('code', data.data.expertise);
				$('#layanan-auto').val(data.data.id_layanan);
				$('#s2id_layanan-auto a .select2-chosen').html(data.data.layanan);
				$('#dokter-auto').val(data.data.id_dokter);
				$('#s2id_dokter-auto a .select2-chosen').html(data.data.dokter);
				$('#keterangan').val(data.data.keterangan);

				$('#modal-expertise').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function deleteExpertise(id, page) {
		swal.fire({
			title: 'Konfirmasi',
			text: "Apakah anda yakin ingin menghapus data ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url("expertise/api/expertise/delete_data_expertise") ?>/id/' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						messageDeleteSuccess();
						getListDataExpertise(page);
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageDeleteFailed();
					},
				});
			} 
		})
	}
</script>