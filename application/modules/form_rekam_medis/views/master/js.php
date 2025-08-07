<script>
	var tipedata = 'list';
	$(function() {
		getListFormulirRM(1);

		$('#bt_tambah_form').click(function() {
			$('#modal_form_rm').modal('show');
			$('#modal_form_rm_label').html('Form Tambah Layanan');
			$('#form_rekam_medis_pasien')[0].reset();
			resetAllData();
		});

		$('#bt_reload_data').click(function() {
			resetAllData();
			getListFormulirRM(1);
		});

		$('#bt_search_formulir').click(function() {
			$('#modal_search_formulir').modal('show');
			$('#modal_search_formulir_label').html('Form Parameter Pencarian');
			// $('#form_search_formulir')[0].reset();
			resetAllData();
		});

		// expand/collapse
		$('#bt_expand_all').click(function() {
			$('#table_form_rekam_medis').treetable('expandAll');
		});

		$('#bt_collapse_all').click(function() {
			$('#table_form_rekam_medis').treetable('collapseAll');
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


		$('#jenis_formulir_auto').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/jenis_formulir_auto') ?>",
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

		$('#jenis_formulir_search').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/jenis_formulir_auto') ?>",
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


		$('#form_auto').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/form_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						id_jenis_formulir: $('#jenis_formulir_auto').val(),
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
				var markup = data.kode_formulir + ' ' + data.nama;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
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

		$('#tgl-search').change(function() {
			let id_pendaftaran = $('#tgl-search').val();
			$('#id_pendaftaran_search').val(id_pendaftaran);
		})


	});



	function getListFormulirRM(p) {
		$('#page_now').val(p);
		$.ajax({

			type: 'GET',
			url: '<?= base_url('form_rekam_medis/api/master_form_rekam_medis/get_list_form_rekam_medis'); ?>/page/' + p,
			data: 'tipedata=' + tipedata + '&' + $('#form_search_formulir').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function(data) {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListFormulirRM(p - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table_form_rekam_medis tbody').empty();
				if (tipedata === 'list') {
					$('#table_form_rekam_medis').treetable('destroy');
					extractDataForm(data);
				} else {
					showListForm(data);
				}

				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
				hideLoader();
			}
		});
	}

	function showListForm(data) {

		let html = '';
		$.each(data.data, function(i, v) {
			html = '<tr>' +
				'<td align="center">' + v.id + '</td>' +
				'<td>' + v.nama + ((v.parent !== '') ? ', ' : '') + v.parent + ', <b> ' + v.jenis_formulir + ' </b></td>' +
				'<td>' + v.id_jenis_formulir + '</td>' + //kategori_formulir
				// '<td></td>' +
				// '<td></td>' +
				'<td align="right">' +
				'<button type="button" class="btn btn-secondary btn-xs" onclick="getDataFormulir(' + v.id + ', ' + v.id_jenis_formulir + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button>' +
				'<button type="button" class="btn btn-secondary btn-xs" onclick="deleteFormulir(this, ' + v.id + ', ' + data.page + ')"><i class="fas fa-trash"></i> Hapus</button>' +
				'</td>' +
				'</tr>';
			$('#table_form_rekam_medis tbody').append(html);
		});
	}

	function extractDataForm(data) {
		var html = '';
		var branch = '';
		var parent = '';
		var root = '';

		$.each(data.data, function(i, v) {
			root = ((i + 1) + ((data.page - 1) * data.limit));
			branch = 'data-tt-id="' + root + '"';
			html = drawTable(v, branch, parent, data.page, 0);
			$('#table_form_rekam_medis tbody').append(html);

			if (v.child !== null) {
				$.each(v.child, function(i2, v2) {
					branch = 'data-tt-id="' + root + '-' + i2 + '"';
					parent = 'data-tt-parent-id="' + root + '"';
					html = drawTable(v2, branch, parent, data.page, 20);
					$('#table_form_rekam_medis tbody').append(html);

					if (v2.child !== null) {
						$.each(v2.child, function(i3, v3) {
							branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '"';
							parent = 'data-tt-parent-id="' + root + '-' + i2 + '"';
							html = drawTable(v3, branch, parent, data.page, 40);
							$('#table_form_rekam_medis tbody').append(html);

							if (v3.child !== null) {
								$.each(v3.child, function(i4, v4) {
									i4++;
									branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
									parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '"';
									html = drawTable(v4, branch, parent, data.page, 60);
									$('#table_form_rekam_medis tbody').append(html);

									if (v4.child !== null) {
										$.each(v4.child, function(i5, v5) {
											i5++;
											branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
											parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
											html = drawTable(v5, branch, parent, data.page, 80);
											$('#table_form_rekam_medis tbody').append(html);

											if (v5.child !== null) {
												$.each(v5.child, function(i6, v6) {
													i6++;
													branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '"';
													parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
													html = drawTable(v6, branch, parent, data.page, 100);
													$('#table_form_rekam_medis tbody').append(html);
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

		$('#table_form_rekam_medis').treetable({
			expandable: true
		});
	}

	function drawTable(v, branch, parent, page, indent) {

		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		let idAccountGroup = "<?= $this->session->userdata('id_account_group') ?>";
		let groupAction = '';

		let btn = '';
		let bold = '';
		let status = '';



		if (v.kode_formulir !== '') {
			btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="editDataFormulir(' + v.id + ', ' + v.id_jenis_formulir + ', ' + page + ')"><i class="fas fa-edit"></i> Edit</button>';

			// btn = '<button type="button" class="btn btn-secondary btn-xs" onclick="getDataFormulir(' + v.id + ', ' + v.id_jenis_formulir + ', ' + page + ')"><i class="fas fa-eye""></i> View</button> ';
			if (idAccountGroup == '1') {
				btn += '<button type="button" class="btn btn-secondary btn-xs" onclick="deleteFormulir(this, ' + v.id + ', ' + page + ')"><i class="fas fa-trash"></i> Hapus</button> ';
				status = `<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" id="${v.id}" onclick="updateStatusForm(${v.id}, ${v.is_active})" ${(v.is_active == 1 ? 'checked' : '')}>
                    <label class="custom-control-label" for="${v.id}">${(v.is_active == 1 ? '<h5><span class="label label-success" style="padding: 4px;">Aktif</span></h5>' : '<h5><span class="label label-danger" style="padding: 4px;">Tidak Aktif</span></h5>')}</label>
                  </div>`;
			}

		} else {
			bold = 'font-weight:bold;';
		}

		let html = '<tr ' + branch + ' ' + parent + '>' +
			'<td>' + v.kode_formulir + '</td>' +
			'<td><span style="' + bold + ' margin-left: ' + indent + 'px;">' + v.nama + '</span></td>' +
			'<td>' + (typeof v.no_formulir == 'undefined' ? '' : v.no_formulir) + '</td>' +
			'<td>' + (typeof v.kategori_formulir == 'undefined' ? '' : v.kategori_formulir) + '</td>' +
			'<td>' + status + '</td>' +
			'<td align="right">' + btn + '</td>' +
			'</tr>';
		return html;

	}

	function resetAllData() {
		tipedata = 'list';
		$('#id, .select2-input, #id_parent, .form-control').val('');
		$('.select2-chosen').html('');
		syams_validation_remove('.form-control');
		syams_validation_remove('.select2-input');
		getListFormulirRM(1);
	}

	function paging(page, tab) {
		getListFormulirRM(page);
	}

	function updateStatusForm(id, status) {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('form_rekam_medis/api/master_form_rekam_medis/update_status') ?>',
			data: 'id=' + id + '&status=' + status,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status !== false) {
					getListFormulirRM($('#page_now').val());
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

	function simpanDataFormulir() {
		let stop = false;

		if ($('#nama_formulir').val() === '') {
			syams_validation('#nama_formulir', 'Nama Formulir harus diisi!');
			stop = true;
		}

		if ($('#table_name_formulir').val() === '') {
			syams_validation('#table_name_formulir', 'Nama Table Formulir harus diisi!');
			stop = true;
		}

		if ($('#no_formulir').val() === '') {
			syams_validation('#no_formulir', 'No. Formulir harus diisi!');
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
			url: '<?= base_url('form_rekam_medis/api/master_form_rekam_medis/simpan_formulir') ?>' + update,
			data: $('#form_rekam_medis_pasien').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if ($('#id').val() !== '') {
					messageEditSuccess();
					getListFormulirRM($('#page_now').val());
				} else {
					getListFormulirRM(1);
					messageAddSuccess();
				}

				$('#modal_form_rm').modal('hide');
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

	function deleteFormulir(obj, id, p) {
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
							url: '<?= base_url('form_rekam_medis/api/master_form_rekam_medis/delete_formulir') ?>/id/' + id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								removeMe(obj);
								messageDeleteSuccess();
								getListFormulirRM(p);
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

	function cariFormulir() {
		let stop = false;

		if ($('#id_pendaftaran_search').val() === '') {
			syams_validation('#tgl-search', 'Pilih Tanggal Kunjungan!');
			stop = true;
		}

		if (stop) {
			return false;
		}

		let id_pendaftaran = $('#id_pendaftaran_search').val();

		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('form_rekam_medis/api/master_form_rekam_medis/list_layanan_pendaftran') ?>/id_pendaftaran/' + id_pendaftaran,
			// data: 'id_barang=' + id_barang + '&ed=' + ed,
			cache: false,
			dataType: 'JSON',
			beforeSend: function(data) {
				showLoader();
			},
			success: function(data) {
				$('#modal_search_formulir').hide();
				$('.modal-backdrop').hide();

				$.each(data.hasil['igd'], function(i, v) {
					$('#id_laypen_igd').val(v.id_layanan_pendaftaran);
				});

				$.each(data.hasil['ranap'], function(i, v) {
					$('#id_laypen_ranap').val(v.nama_unit);
				});
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
				hideLoader();
			},
		});


	}

	function getDataFormulir(id, id_jenis_formulir, p) {

		let cekData = false;

		if (id_jenis_formulir == '1') { //pengkajian awal
			cekData = true;
		} else if (id_jenis_formulir == '2') { //cppt
			cekData = true;
		}

		if (cekData) {
			swalCustom('info', 'Belum Tersedia', 'Saat ini formulir sedang proses pembutan.');
		}
	}

	function editDataFormulir(id, id_jenis_formulir, p) {

		$('#modal_form_rm').modal('show');
		$('#modal_form_rm_label').html('Edit Master Form Layanan');
		$('#form_rekam_medis_pasien')[0].reset();

		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('form_rekam_medis/api/master_form_rekam_medis/show_data_formulir') ?>',
			data: 'id=' + id + '&id_jenis_formulir=' + id_jenis_formulir,
			cache: false,
			dataType: 'JSON',
			beforeSend: function(data) {
				showLoader();
			},
			success: function(data) {

				$('#id, .select2-input, #id_parent, .form-control').val('');
				$('.select2-chosen').html('');

				$('#id').val(data.formulir.id);

				if (data.formulir.id_parent != null) {
					$('#form_auto').val(data.formulir.id_parent);
					$('#s2id_form_auto a .select2-chosen').html(data.formulir.form_parent);
				} else {
					$('#form_auto').val('');
					$('#s2id_form_auto a .select2-chosen').html('');
				}

				$('#jenis_formulir_auto').val(data.formulir.id_jenis_formulir);
				$('#s2id_jenis_formulir_auto a .select2-chosen').html(data.formulir.jenis_formulir);
				$('#nama_formulir').val(data.formulir.nama);
				$('#no_formulir').val(data.formulir.no_formulir);
				$('#kategori_formulir').val(data.formulir.kategori_formulir != null ? data.formulir.kategori_formulir : '');
				$('#table_name_formulir').val(data.formulir.table_name);

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
				hideLoader();
			},
		});
	}
</script>