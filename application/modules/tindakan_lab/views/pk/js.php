<script>
	var tipedata = 'list';
	$(function() {
		getListTindLabPK(1);

		$('#bt_tambah_layanan').click(function() {
			$('#modal_labpk').modal('show');
			$('#modal_labpk_label').html('Form Tambah Tindakan Laboratorium Patalogi Klinik');
			$('#form_layanan')[0].reset();
			resetAllData();
		});

		$('#bt_reload_data').click(function() {
			resetAllData();
			getListTindLabPK(1);
		});

		$('#bt_search_data').click(function() {
			$('#modal_search').modal('show');
			$('#modal_search_label').html('Form Parameter Pencarian');
			$('#form_search')[0].reset();
			resetAllData();
		});

		// expand/collapse
		$('#bt_expand_all').click(function() {
			$('#table_tindpk').treetable('expandAll');
		});

		$('#bt_collapse_all').click(function() {
			$('#table_tindpk').treetable('collapseAll');
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
		getListTindLabPK(1);
	}

	// function cariLayanan() {
	// 	tipedata = 'search';
	// 	getListTindLabPK(1);
	// }

	function getListTindLabPK(p) {
		$('#page_now').val(p);
		$.ajax({
			type: 'GET',
			url: '<?= base_url('tindakan_lab/api/tindakan_lab_pk/get_list_tindlabpk'); ?>/page/' + p,
			data: 'tipedata=' + tipedata + '&' + $('#form_search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function(data) {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListTindLabPK(p - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table_tindpk tbody').empty();
				if (tipedata === 'list') {
					$('#table_tindpk').treetable('destroy');
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
				'<td>' + v.icd_ix + '</td>' +
				'<td align="right">' +
				'</td>' +
				'</tr>';
			$('#table_tindpk tbody').append(html);
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
			$('#table_tindpk tbody').append(html);

			if (v.child !== null) {
				$.each(v.child, function(i2, v2) {
					branch = 'data-tt-id="' + root + '-' + i2 + '"';
					parent = 'data-tt-parent-id="' + root + '"';
					html = drawTable(v2, branch, parent, data.page, 20);
					$('#table_tindpk tbody').append(html);

					if (v2.child !== null) {
						$.each(v2.child, function(i3, v3) {
							branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '"';
							parent = 'data-tt-parent-id="' + root + '-' + i2 + '"';
							html = drawTable(v3, branch, parent, data.page, 40);
							$('#table_tindpk tbody').append(html);

							if (v3.child !== null) {
								$.each(v3.child, function(i4, v4) {
									i4++;
									branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
									parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '"';
									html = drawTable(v4, branch, parent, data.page, 60);
									$('#table_tindpk tbody').append(html);

									if (v4.child !== null) {
										$.each(v4.child, function(i5, v5) {
											i5++;
											branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
											parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '"';
											html = drawTable(v5, branch, parent, data.page, 80);
											$('#table_tindpk tbody').append(html);
										
											if (v5.child !== null) {
												$.each(v5.child, function(i6, v6) {
													i6++;
													branch = 'data-tt-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '-' + i6 + '"';
													parent = 'data-tt-parent-id="' + root + '-' + i2 + '-' + i3 + '-' + i4 + '-' + i5 + '"';
													html = drawTable(v6, branch, parent, data.page, 100);
													$('#table_tindpk tbody').append(html);
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

		$('#table_tindpk').treetable({
			expandable: true
		});
	}

	//Tombol Input
	function drawTable(v, branch, parent, page, indent) {
		let btn = '';
		let bold = '';

		if (v.kode !== '') {
			//alert (v.id);
			//btn = '<button type="button" class="btn btn-secondary btn-xs" onclick=editTindLabPK"(' + v.id + ', ' + page + ')"><i class="fas fa-edit"></i></button> ';
			btn = '<button type="button" class="btn btn-secondary btn-xs" onclick=getListNilaiLabPKDetail(' + v.id + ',1)><i class="fas fa-edit"></i></button> ';
		} else {
			bold = 'font-weight:bold;';
		}

		let html = '<tr ' + branch + ' ' + parent + '>' +
			'<td>' + v.kode + '</td>' +
			'<td><span style="' + bold + ' margin-left: ' + indent + 'px;">' + v.nama + '</span></td>' +
			'<td>' + v.icd_ix + '</td>' +
			'<td align="right">' + btn + '</td>' +
			'</tr>';
		return html;

	}

	function paging(page, tab) {
		getListTindLabPK(page);
	}

	function simpanDataTindLabPK() {
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
			url: '<?= base_url('tindakan_lab/api/tindakan_lab_pk/simpan_tindlabpk') ?>' + update,
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
					getListTindLabPK($('#page_now').val());
				} else {
					getListTindLabPK(1);
					messageAddSuccess();
				}

				$('#modal_labpk').modal('hide');
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

	function editTindLabPK(id, p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('tindakan_lab/api/tindakan_lab_pk/get_nilailab') ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#id_lay').val(data.data.id_lay);
				$('#tindakan').val(data.data.nama);
				$('#id_nilai').val(data.data.id_nilai);	
				$('#satuan').val(data.data.id_satuan);
				$('#metode').val(data.data.metode);
				$('#kategori').val(data.data.kategori);
				$('#nilai_awal').val(data.data.nilai_awal);
				$('#simbol').val(data.data.simbol);
				$('#nilai_akhir').val(data.data.nilai_akhir);

				//$('.edit_hide').hide();
				$('#page_now').val(p);
				$('#modal_labpk_input').modal('show');
				$('#modal_labpk_input_label').html('Form Input Nilai Laboratorium Patalogi Klinik');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	// NILAI LAB PK

	function getListNilaiLabPK(p) {
		$('#page_now').val(p);
		$.ajax({
			type: 'GET',
			url: '<?= base_url('tindakan_lab/api/tindakan_lab_pk/get_list_nilailabpk'); ?>/page/' + p,
			data: 'tipedata=' + tipedata + '&' + $('#form_search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function(data) {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListNilaiLabPK(p - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				// $('#table_tindpk tbody').empty();
				// if (tipedata === 'list') {
				// 	$('#table_tindpk').treetable('destroy');
				// 	extractData(data);
				// } else {
				// 	showList(data);
				// }

				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
				hideLoader();
			}
		});
	}

	function simpanNilaiLabPK() {
		let stop = false;

		// if ($('#nama_layanan').val() === '') {
		// 	syams_validation('#nama_layanan', 'Nama layanan harus diisi!');
		// 	stop = true;
		// }

		if (stop) {
			return false;
		}

		let update = '';
		if ($('#id').val() !== '') {
			update = '/id/' + $('#id').val();
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url('tindakan_lab/api/tindakan_lab_pk/simpan_nilailabpk') ?>' + update,
			data: $('#form_nilaipk').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if ($('#id').val() !== '') {
					messageEditSuccess();
					getListNilaiLabPK($('#page_now').val());
				} else {
					getListNilaiLabPK(1);
					messageAddSuccess();
				}

				//$('#modal_labpk').modal('hide');
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

	function getListNilaiLabPKDetail(id,p) {
		alert (id);
        $('#page_now').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('tindakan_lab/api/tindakan_lab_pk/get_list_nilailabpk_detail') ?>/page/' + p + '/jenis/NilaiLabPKDetail',
            cache: false,
            data: $('#form_search').serialize() + '&id_lay=' +  id, //$('#id_lay').val(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListNilaiLabPKDetail(id,p - 1);
                    return false;
                }

				
                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table_nilaipk tbody').empty();
                let html = '';
				//let id_satuan ='',


                $.each(data.data, function(i, v) {
					$('#id_lay').val(v.id_lay);
					$('#id_nilai').val(v.id_nilai);
					$('#tindakan').val(v.nama_tindakan);

					if (v.id_satuan  !== null){ id_satuan_data=v.id_satuan; }     else { id_satuan_data=''; }
					if (v.metode     !== null){ metode_data=v.metode; }           else { metode_data=''; }
					if (v.kategori   !== null){ kategori_data=v.kategori; }       else { kategori_data=''; }
					if (v.nilai_awal !== null){ nilai_awal_data=v.nilai_awal; }   else { nilai_awal_data=''; }
					if (v.simbol     !== null){ simbol_data=v.simbol; }           else { simbol_data=''; }
					if (v.nilai_akhir!== null){ nilai_akhir_data=v.nilai_akhir; } else { nilai_akhir_data=''; }

                    let html = '<tr>' +
                        '<td style="text-align:center">' + id_satuan_data + '</td>' +
                        '<td style="text-align:center">' + metode_data + '</td>' +
                        '<td style="text-align:center">' + kategori_data + '</td>' +
                        '<td style="text-align:center">' + nilai_awal_data + '</td>' +
                        '<td style="text-align:center">' + simbol_data + '</td>' +
                        '<td style="text-align:center">' + nilai_akhir_data + '</td>' +
						'<td style="display:none;">' + v.id_nilai + '</td>' +
                        '<td align="right">' +
                       '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-cog"></i></button> ' +
                    '</div>' +
                    '</td>' +
                    '</tr>';
                    $('#table_nilaipk tbody').append(html);
                });

				$('#page_now').val(p);
				$('#modal_labpk_input').modal('show');
				$('#modal_labpk_input_label').html('Form Input Nilai Laboratorium Patalogi Klinik');

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }
</script>