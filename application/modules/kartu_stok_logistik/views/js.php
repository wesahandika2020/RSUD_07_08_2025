<script>
	$(function() {
		getListDataKartuStok(1)
		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function() {
			resetForm()
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });
	})

	function resetForm() {
		getListDataKartuStok(1)
		$('#form-search')[0].reset()
		$('#tanggal-awal, #tanggal-akhir').val('<?php echo date('d/m/Y') ?>')
		$('#table-data tbody').html('<tr><td class="center" colspan="11"><i>Tidak ada data yang di tampilkan</i></td></tr>')
	}

	function getListDataKartuStok(page, id_stok) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('kartu_stok_logistik/api/kartu_stok_logistik/get_list_data_kartu_stok') ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
				$('#page-now').val(page)
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDataKartuStok(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()
				var sisa = 0;
				var total = 0;
				$.each(data.data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td>${v.nama_barang}</td>
							<td class="center">${datefmysql(v.tanggal)}</td>
							<td class="right">${roundToTwo(v.awal)}</td>
							<td class="right">${roundToTwo(v.masuk)}</td>
							<td class="right">${roundToTwo(v.keluar)}</td>
							<td class="right">${roundToTwo(v.sisa)}</td>
							<td class="left">${v.nama_kemasan}</td>
							<td class="right">${money_format(v.hpp)}</td>
							<td class="right">${money_format(parseFloat(v.hpp) * parseFloat(v.sisa))}</td>
						</tr>
					`;

					$('#table-data tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
				$('#modal-search').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function paging(page) {
		getListDataKartuStok(page)
	}
</script>