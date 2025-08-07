<script>
	var wWidth = $(window).width();
	var dWidth = wWidth * 1;
	var wHeight= $(window).height();
	var dHeight= wHeight * 1;
	var x = screen.width/2 - dWidth/2;
	var y = screen.height/2 - dHeight/2;

	$(function() {
		getListPenerimaan(1, '')

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})
		
		$('#btn-add').click(function() {
			reloadData()
			$('#modal-penerimaan-title').html('Form Penerimaan Barang Gudang Logistik')
			$('#modal-sub-penerimaan-title').html('')
			$('#modal-penerimaan').modal('show')
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function() {
			reloadData()
			getListPenerimaan(1, '')
		})
	})

	function reloadData() {

		<?php date_default_timezone_set('Asia/Jakarta'); ?>
		$('input[type=text], input[type=hidden], select, textarea').val('')
		$('#no-penerimaan').val('<?= $no_penerimaan ?>')
		$('#tanggal').val('<?= date("d/m/Y H:i") ?>')
		$('#jatuh-tempo').val('')
		$('#kategori-barang').val('10')
		$('#s2id_supplier-auto a .select2c-chosen').html('Pilih Supplier...')
		$('#s2id_barang-auto a .select2c-chosen').html('Pilih Barang...')
		$('#disc-rp, #disc-pr, #ppn, #materai').val('0')
		$('#tampilkan').val('Perfaktur')
		$('#table-penerimaan tbody').empty()
		$('#tanggal-awal').val('')
		$('#tanggal-akhir').val('<?= date("d/m/Y") ?>')
	}

	function getListPenerimaan(page, id) {
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("inventori_rt/api/inventori_rt/get_list_penerimaan") ?>/page/' + page + '/id/' + id,
			data: $('#form-search').serialize() + '&jenis_barang=Rumah Tangga',
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPenerimaan(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()

				$.each(data.data, function(i, v) {
					let grandTotal = ((v.ppn / 100) * parseFloat(v.total)) + parseFloat(v.total);
					let detail = v.id+'#'+v.status+'#'+v.id_pemesanan+'#'+v.no_faktur+'#'+datetimefmysql(v.tanggal)+'#'+v.id_supplier+'#'+v.supplier+'#'+datefmysql(v.tanggal_jatuh_tempo)+'#'+v.ppn+'#'+v.materai+'#'+v.diskon_persen+'#'+numberToCurrency(v.diskon_rupiah)+'#'+numberToCurrency(v.total)+'#'+v.id_kategori_barang+'#'+v.diterima_semua+'#'+v.no_penerimaan;
					let html = /* html */ `
						<tr>
							<td class="wrapper center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${v.status === '' ? '-' : v.status}</td>
							<td class="wrapper center">${((v.tanggal !== null) ? datetimefmysql(v.tanggal) : '')}</td>
							<td class="wrapper left">${v.no_penerimaan}</td>
							<td class="wrapper left">${v.no_faktur}</td>
							<td class="wrapper center">${datefmysql(v.tanggal_jatuh_tempo)}</td>
							<td class="wrapper left">${v.supplier}</td>
							<td class="wrapper right">${money_format(grandTotal)}</td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs" onclick="printPenerimaan('${v.id}')"><i class="fas fa-print"></i></button>
								<button type="button" class="btn btn-secondary btn-xs" onclick="editPenerimaan('${detail}')"><i class="fas fa-edit"></i></button>
								<button type="button" class="btn btn-secondary btn-xs" onclick="deletePenerimaan('${v.id}', ${data.page}, '${v.no_faktur + '#' + v.supplier}')"><i class="fas fa-trash-alt"></i></button>
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html)
				})

				$('#modal-search').modal('hide');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})
	}

	function paging(page, tab) {
		getListPenerimaan(page, '')
	}

	function printPenerimaan(id_penerimaan) {
		window.open('<?= base_url() ?>inventori_rt/printing_penerimaan/' + id_penerimaan, 'Cetak Penerimaan','width='+dWidth+', height='+dHeight+', left='+x+',top='+y)
	}

	function deletePenerimaan(id, page, string) {
		var str = string.split('#')
		swal.fire({
			title: 'Konfirmasi Hapus',
 			html: "<h5 style='color:red;font-family:Verdana;'><b><i>Anda yakin akan menghapus penerimaan dengan </i></b><br/>No. Faktur : <b>" + str[0] + "</b><br>Supplier/PBF : " + str[1] + " ?</h5>",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Hapus',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url("inventori_rt/api/inventori_rt/delete_penerimaan") ?>' + '/id/' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						let type = 'Error';
						if (data.status) {
							type = 'Success';
						}
						messageCustom(data.message, type)
						getListPenerimaan(1, '')
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menghapus data penerimaan', 'Error')
					},
				})
			}
		})
	}
</script>