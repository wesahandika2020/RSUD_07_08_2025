<script>
	$(function() {
		getListWaktuPemberianObat(1);

		$('#bt_tambah_waktu_pemberian_obat').click(function() {
			resetAll();
			$('#modal_waktu_pemberian_obat').modal('show');
			$('#modal_waktu_pemberian_obat_label').html('Form Tambah Waktu Pemberian Obat');
		});

		$('#bt_reload_data').click(function() {
			resetAll();
			getListWaktuPemberianObat(1);
		});

		$('.form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});
	});

	function resetAll() {
		$('#id, .form-control, #pencarian_waktu_pemberian_obat').val('');
		$('#is-waktu-pemberian').prop('checked', false);
		syams_validation_remove('.form-control');
	}

	function getListWaktuPemberianObat(p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('waktu_pemberian_obat/api/waktu_pemberian_obat/get_list_waktu_pemberian_obat') ?>/page/' + p,
			data: 'keyword=' + $('#pencarian_waktu_pemberian_obat').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListWaktuPemberianObat(p - 1);
					return false;
				}

				$('#waktu_pemberian_obat_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#waktu_pemberian_obat_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table_waktu_pemberian_obat tbody').empty();

				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let html = '<tr>' +
						'<td align="center">' + no + '</td>' +
						'<td>' + v.kode + '</td>' +
						'<td>' + v.timing + '</td>' +
						'<td>' + v.keterangan + '</td>' +
						'<td align="right">' +
						'<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editWaktuPemberianObat(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit</button> ' +
						'<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteWaktuPemberianObat(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Delete</button> ' +
						'</td>' +
						'</tr>';
					$('#table_waktu_pemberian_obat tbody').append(html);
				});
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function paging(p) {
		getListWaktuPemberianObat(p);
	}


	function simpanDataWaktuPemberianObat() {
		let stop = false;

		if (stop) {
			return false;
		}

		let update = '';
		if ($('#id').val() !== '') {
			update = '/id/' + $('#id').val();
		}

		let isWkatuPemberian = $('#is-waktu-pemberian').is(':checked') ? 1 : 0;

		$.ajax({
			type: 'POST',
			url: '<?= base_url('waktu_pemberian_obat/api/waktu_pemberian_obat/simpan_waktu_pemberian_obat') ?>' + update,
			data: $('#form_waktu_pemberian_obat').serialize() + '&is_waktu_pemberian=' +  isWkatuPemberian,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status == false) {
					$('input[name=csrf_syam]').val(data.token);
				} else {
					$('input[name=csrf_syam]').val(data.token);
					if ($('#id').val() !== '') {
						messageEditSuccess();
						getListWaktuPemberianObat($('#page_now_waktu_pemberian_obat').val());
					} else {
						messageAddSuccess();
						getListWaktuPemberianObat(1);
					}

					$('#modal_waktu_pemberian_obat').modal('hide');
					resetAll();
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}

		});
	}

	function editWaktuPemberianObat(id, p) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('waktu_pemberian_obat/api/waktu_pemberian_obat/get_waktu_pemberian_obat') ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				console.log(data)
				$('#id').val(data.data.id);
				$('#kode').val(data.data.kode);
				$('#waktu-pemberian').val(data.data.timing);
				$('#keterangan').val(data.data.keterangan);
				$('#is-waktu-pemberian').prop('checked', data.data.is_waktu_pemberian === '1')

				$('#page_now_waktu_pemberian_obat').val(p);
				$('#modal_waktu_pemberian_obat').modal('show');
				$('#modal_waktu_pemberian_obat_label').html('Form Edit Waktu Pemberian Obat');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

	}

	function deleteWaktuPemberianObat(id, p) {
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
							url: '<?= base_url('waktu_pemberian_obat/api/waktu_pemberian_obat/delete_waktu_pemberian_obat') ?>/id/' + id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								messageDeleteSuccess();
								getListWaktuPemberianObat(p);
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
