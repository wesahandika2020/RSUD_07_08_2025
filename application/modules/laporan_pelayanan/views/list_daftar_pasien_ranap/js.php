<script>
	$(function() {
		var jenis_penjamin = '';
		getListDaftarPasienRawatInap(1)
		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#bangsal').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/bangsal_auto') ?>",
				dataType: 'JSON',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available
		
					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function(data){
				var markup = data.nama + '<br>' + data.kode;
				return markup;
			}, 
			formatSelection: function(data){
				return data.nama;
			}
		})

		$('.penjamin-group').hide()
		$('#cara-bayar').change(function(){
			jenis_penjamin = $(this).val()
			$('#penjamin').val('')
			$('#s2id_penjamin a .select2-chosen').html('Pilih Penjamin...')
			if($(this).val() !== 'Tunai'){
				$('.penjamin-group').show()
			}else{
				$('.penjamin-group').hide()
			}
		})

		$('#penjamin').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
				dataType: 'JSON',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: jenis_penjamin,
						page: page, // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available
		
					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function(data){
				var markup = data.nama;
				return markup;
			}, 
			formatSelection: function(data){
				return data.nama;
			}
		})

		$('#btn-reload').click(function() {
			$('#form-search')[0].reset()
			$('.penjamin-group').hide()
			$('#s2id_bangsal a .select2-chosen').html('Pilih Barang...')
			$('#s2id_penjamin a .select2-chosen').html('Pilih Penjamin...')
			$('#status').val('Masih Dirawat')
		})

		$('#btn-export').click(function() {
			location.href = '<?php echo base_url('laporan_pelayanan/export_daftar_pasien_rawat_inap') ?>?' + $('#form-search').serialize()
		})
	})

	function getListDaftarPasienRawatInap(page) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('laporan_pelayanan/api/laporan_pelayanan/get_list_daftar_pasien_rawat_inap') ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
				$('#page').val(page)
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListDaftarPasienRawatInap(page - 1)
					return false;
				};

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				let detail = '';
				let bed = '';
				$.each(data.data, function(i, v) {
					if (v.cara_bayar === 'Tunai') {
						cara_bayar = v.cara_bayar;
					} else {
						cara_bayar = v.cara_bayar+' ('+v.penjamin+')';
					}
					
					detail = '<table>'+
								'<tr><td><b>No. Register</b>&nbsp;</td><td>'+v.no_register+'</td></tr>'+
								'<tr><td><b>Cara Bayar</b>&nbsp;</td><td>'+cara_bayar+'</td></tr>'+
							'</table>';
					bed = v.bangsal+' Kelas '+v.kelas+' Ruang '+v.no_ruang+' No. Bed '+v.no_bed;
					let html = /* html */ `
						<tr>
							<td class="wrapper center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${v.no_rm}</td>
							<td class="left">${v.pasien}</td>
							<td class="wrapper center">${datetimefmysql(v.waktu_masuk)}</td>
							<td class="wrapper center">${(v.waktu_keluar !== null ? datetimefmysql(v.waktu_keluar) : '-')}</td>
							<td class="left">${v.alamat}</td>
							<td class="wrapper left">${bed}</td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="left" data-title="Detail" data-content="${detail}"><i class="fas fa-eye mr-1"></i></button>
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html)
				})
				$('.mypopover').popover({
					html: true,
					trigger: 'hover',
					sanitize: false,
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
		getListDaftarPasienRawatInap(page)
	}
</script>