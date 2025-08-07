<script>
	$(function(){
		resetForm();
		
		$('#code-tindakan').select2({
			ajax: {
				url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd_auto') ?>",
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
				var markup = '<b>' + data.kode_icdx_rinci + '</b> <br/>' + data.nama;
				return markup;
			},
			formatSelection: function(data) {
				$('#code-tindakan').val(data.id);
				return data.kode_icdx;
			}
		});
	});

	function getListDataTindakan(page, id, spesialisasi, id_konsul) {
		
		$('#page-tindakan').val(page);
		var id = $('#id-layanan-pendaftaran').val();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_list_tindakan") ?>/page/' + page + '/id_layanan_pendaftaran/' + id+ '/spesialisasi/' + spesialisasi+ '/id_konsul/' + id_konsul,	
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {				
				if ((page - 1) & (data.data.length === 0)) {
					getListDataTindakan(page - 1);
					return false;
				}

				$('#pagination-tindakan').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary-tindakan').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data-tindakan tbody').empty();

				$.each(data.data, function(i, v) {					
					let html = /* html */ `
						<tr class="">
							<td class="center v-center">${v.tanggal}</td>
							<td class="center v-center">${((v.tindakan))}</td>
							<td class="center v-center">${((v.kode_icdx !== null) ? v.kode_icdx : '')}</td>
							<td class="center v-center">${((v.kelas))}</td>
							<td class="center v-center">${((v.biaya))}</td>							
							<td class="center v-center">${((v.dokter))}</td>
							<td class="center v-center">${((v.coder !== null) ? v.coder : '')}</td>							
							<td class="center v-center"><button type="button" title="Klik untuk edit" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="codingTindakan(${((v.id))}, ${((v.id_pengkodean))})"><i class="fas fa-edit"></i></button></td>						
						</tr>
					`;

					$('#table-data-tindakan tbody').append(html);
				});

				$('.mypopover').popover({
					html: true,
					trigger: 'hover'
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

	window.onload = getListDataTindakan(1);

	function codingTindakan(id, id_pengkodean) {
		resetForm();
		$('#id-golongan-sebab-before').val(id_pengkodean);
		$('#id-tarif-tindakan-pasien').val(id);
		$('#modal-koding-tindakan').modal('show');
		
	}
	
	function resetForm() {
		$('#code-tindakan').val('');
		$('#id-tarif-tindakan-pasien').val('');
		$('#id-golongan-sebab-before-tindakan').val('');
		$('#id-layanan-pendaftaran-history-tindakan').val('');
		$('#id-unit-tindakan').val('');  
    }

	function simpanKodingTindakan() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/simpan_coding_tindakan") ?>/page/' + page,
			data: $('#form-koding-tindakan').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === true) {
					messageCustom(data.message, 'Success');
				} else {
					messageCustom(data.message, 'Error');
				}

				$('#modal-koding-tindakan').modal('hide');
				syams_ajax('<?= base_url("pengkodean_icd_x/page_tindakan") ?>', '#tab_tindakan');
				getListDataKunjunganPasien(1);
				getListLayananPasien(1, $('#id-pendaftaran').val());
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Koding Tindakan Gagal Dilakukan', 'Error');
			},
		});
	}
</script>
