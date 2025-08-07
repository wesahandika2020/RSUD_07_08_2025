<script>
	function getListDataSoapier(page) {
		$('#page-soapier').val(page);
		var id = $('#id-layanan-pendaftaran').val();
		
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Pengkodean_icd_x/get_list_soap") ?>/page/' + page + '/id_layanan_pendaftaran/' + id,			
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-search').modal('hide');

				if ((page - 1) & (data.data.length === 0)) {
					getListDataSoapier(page - 1);
					return false;
				}

				$('#pagination-soapier').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary-soapier').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data-soapier tbody').empty();

				$.each(data.data, function(i, v) {					
					let html = /* html */ `
						<tr class="">
							<td class="center v-center">${v.waktu}</td>
							<td class="center v-center">${((v.nama_dokter))}</td>
							<td class="center v-center">${((v.subject))}</td>
							<td class="center v-center">${((v.objective))}</td>
							<td class="center v-center">${((v.assessment))}</td>
							<td class="center v-center">${((v.plan))}</td>
						</tr>
					`;

					$('#table-data-soapier tbody').append(html);
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

	window.onload = getListDataSoapier(1);
</script>
