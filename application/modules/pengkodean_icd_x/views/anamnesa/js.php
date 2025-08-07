<script>
	function getListDataAnamnesa(page) {		
		$('#page-anamnesa').val(page);
		var id = $('#id-pendaftaran').val();		
		
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_list_layanan_pasien") ?>/page/' + page + '/id_pendaftaran/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDataAnamnesa(page - 1);
					return false;
				}

				$('#pagination-anamnesa').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary-anamnesa').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data-anamnesa tbody').empty();


				$.each(data.data, function(i, v) {					

					let html = /* html */ `
						<tr class="">
							<td class="center v-center">${v.tanggal_layanan}</td>
							<td class="center v-center">${((v.nama_dokter))}</td>
						</tr>
					`;

					$('#table-data-anamnesa tbody').append(html);
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

	window.onload = getListDataAnamnesa(1);
</script>
