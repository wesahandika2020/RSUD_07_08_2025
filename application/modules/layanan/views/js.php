<script>
	var tipedata = 'list';
	$(function() {
		getListLayanan(1);

		$('#bt_tambah_layanan').click(function() {
			$('#modal_layanan').modal('show');
			$('#modal_layanan_label').html('Form Tambah Layanan');
			$('#form_layanan')[0].reset();
			resetAllData();
		});

		$('#bt_reload_data').click(function() {
			resetAllData();
			getListLayanan(1);
		});

		$('#bt_search_data').click(function() {
			$('#modal_search').modal('show');
			$('#modal_search_label').html('Form Parameter Pencarian');
			$('#form_search')[0].reset();
			resetAllData();
		});

		// expand/collapse
		$('#bt_expand_all').click(function() {
			$('#table_layanan').treetable('expandAll');
		});

		$('#bt_collapse_all').click(function() {
			$('#table_layanan').treetable('collapseAll');
		});

		$('.form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		$('.form-control, .select2-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

		$('#jenis_pemeriksaan_auto').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/jenis_pemeriksaan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
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
				var markup = data.nama;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#jenis_pemeriksaan_auto_search').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/jenis_pemeriksaan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
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
				var markup = data.nama;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#layanan_auto').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/layanan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						id_jenis: $('#jenis_pemeriksaan_auto').val(),
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
				var markup = data.kode + ' ' + data.nama;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});
	});

	function resetAllData() {
		tipedata = 'list';
		$('#id, .select2-input, #id_parent, .form-control').val('');
		$('.select2-chosen').html('');
		syams_validation_remove('.form-control');
		syams_validation_remove('.select2-input');
		$('.edit_hide').show();
		getListLayanan(1);
	}

	function cariLayanan() {
		tipedata = 'search';
		getListLayanan(1);
	}

	function getListLayanan(p) {
		$('#page_now').val(p);
		$.ajax({
			type: 'GET',
			url: '<?= base_url('layanan/api/layanan/get_list_layanan'); ?>/page/' + p,
			data: 'tipedata=' + tipedata + '&' + $('#form_search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function(data) {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListLayanan(p - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table_layanan tbody').empty();
				if (tipedata === 'list') {
					$('#table_layanan').treetable('destroy');
					extractData(data);
				} else {
					showList(data);
				}

				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
				hideLoader();
			}
		});
	}

	function showList(data) {
		let html = '';
		$.each(data.data, function(i, v) {
			html = '<tr>' +
				'<td align="center">' + v.kode + '</td>' +
				'<td>' + v.nama + ((v.parent !== '') ? ', ' : '') + v.parent + ', <b> ' + v.jenis_pemeriksaan + ' </b></td>' +
				'<td></td>' +
				'<td></td>' +
				'<td>' + v.icd_ix + '</td>' +
				'<td align="right">' +
				'<button type="button" class="btn btn-secondary btn-xs" onclick="editLayanan(' + v.id + ', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button>' +
				'<button type="button" class="btn btn-secondary btn-xs" onclick="deleteLayanan(this, ' + v.id + ', ' + data.page + ')"><i class="fas fa-trash"></i> Hapus</button>' +
				'</td>' +
				'</tr>';
			$('#table_layanan tbody').append(html);
		});
	}

	function extractData(data) {
		var html = '';
		var branch = '';
		var parent = '';
		var root = '';

		$.each(data.data, function(i, v) {
			root = ((i + 1) + ((data.page - 1) * data.limit));
			branch = 'data-tt-id="' + root + '"';
			html = drawTable(v, branch, parent, data.page, 0);
			$('#table_layanan tbody').append(html);

			if (v.child !== null) {
				$.each(v.child, function(i2, v2) {
					branch = 'data-tt-id="' + root + '-' + i2 + '"';
					parent = 'data-tt-parent-id="' + root + '"';
					html = drawTable(v2, branch, parent, data.page, 20);
					$('#table_layanan tbody').append(html);

					if (v2.child !== null) {
						$.each(v2.child, function(i3, v3) {
							branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '"';
							parent = 'data-tt-parent-id="' + root + '-' + i2 + '"';
							html = drawTable(v3, branch, parent, data.page, 40);
							$('#table_layanan tbody').append(html);

							if (v3.child !== null) {
								$.each(v3.child, function(i4, v4) {
									i4++;
									branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
									parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '"';
									html = drawTable(v4, branch, parent, data.page, 60);
									$('#table_layanan tbody').append(html);

									if (v4.child !== null) {
										$.each(v4.child, function(i5, v5) {
											i5++;
											branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
											parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
											html = drawTable(v5, branch, parent, data.page, 80);
											$('#table_layanan tbody').append(html);

											if (v5.child !== null) {
												$.each(v5.child, function(i6, v6) {
													i6++;
													branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '"';
													parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
													html = drawTable(v6, branch, parent, data.page, 100);
													$('#table_layanan tbody').append(html);
												});
											}

										});
									}
								});
							}

						});
					}
				});
			}

			branch = '';
			parent = '';
		});

		$('#table_layanan').treetable({
			expandable: true
		});
	}

	function drawTable(v, branch, parent, page, indent) {
		let btn = '';
		let bold = '';

		if (v.kode !== '') {
			btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="editLayanan(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
				'<button type="button" class="btn btn-secondary btn-xs" onclick="deleteLayanan(this, ' + v.id + ', ' + page + ')"><i class="fas fa-trash"></i> Hapus</button> ';
		} else {
			bold = 'font-weight:bold;';
		}

		let html = '<tr ' + branch + ' ' + parent + '>' +
			'<td>' + v.kode + '</td>' +
			'<td><span style="' + bold + ' margin-left: ' + indent + 'px;">' + v.nama + '</span></td>' +
			'<td>' + (typeof v.test_group == 'undefined' ? '' : v.test_group) + '</td>' +
			'<td>' + (typeof v.test_code == 'undefined' ? '' : v.test_code) + '</td>' +
			'<td>' + v.icd_ix + '</td>' +
			'<td align="right">' + btn + '</td>' +
			'</tr>';
		return html;

	}

	function paging(page, tab) {
		getListLayanan(page);
	}

	function simpanDataLayanan() {
		let stop = false;

		if ($('#nama_layanan').val() === '') {
			syams_validation('#nama_layanan', 'Nama layanan harus diisi!');
			stop = true;
		}

		if (stop) {
			return false;
		}

		let update = '';
		if ($('#id').val() !== '') {
			update = '/id/' + $('#id').val();
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url('layanan/api/layanan/simpan_layanan') ?>' + update,
			data: $('#form_layanan').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if ($('#id').val() !== '') {
					messageEditSuccess();
					getListLayanan($('#page_now').val());
				} else {
					getListLayanan(1);
					messageAddSuccess();
				}

				$('#modal_layanan').modal('hide');
				resetAllData();
				hideLoader();
			},
			error: function(e) {
				if ($('#id').val() !== '') {
					messageEditFailed();
				} else {
					messageAddFailed();
				}

				hideLoader();
			}
		});
	}

	function editLayanan(id, p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('layanan/api/layanan/get_layanan') ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#id').val(data.data.id);
				$('#nama_layanan').val(data.data.nama);
				$('#test_code').val(data.data.test_code);
				$('#test_group').val(data.data.test_group);
				$('#icd_ix').val(data.data.icd_ix);

				$('.edit_hide').hide();
				$('#page_now').val(p);
				$('#modal_layanan').modal('show');
				$('#modal_layanan_label').html('Form Edit Layanan');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function deleteLayanan(obj, id, p) {
		bootbox.dialog({
			title: "Konfirmasi Hapus",
			message: "Apakah anda yakin ingin menghapus data ini ?",
			buttons: {
				cancel: {
					label: '<i class="fas fa-window-close"></i> Batal',
					className: 'btn-secondary'
				},
				confirm: {
					label: '<i class="fas fa-check"></i> Hapus',
					className: 'btn-danger',
					callback: function() {
						$.ajax({
							type: 'DELETE',
							url: '<?= base_url('layanan/api/layanan/delete_layanan') ?>/id/' + id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								removeMe(obj);
								messageDeleteSuccess();
								getListLayanan(p);
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

	function removeMe(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}
</script>