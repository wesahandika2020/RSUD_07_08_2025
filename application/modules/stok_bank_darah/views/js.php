<style>
	#table-data tbody tr td {
		font-size: 11px;
	}
	#parent {
		height: 350px;
		overflow-y: auto;
    }
    #table-data {
        width: 100% !important;
    }
</style>
<script src="<?= base_url('resources/assets/js/jqueryTableHeadFixer.js') ?>"></script>
<script>
	$(function () {
		getListStok(1, '')
		$('#btn-search').click(function () {
			reloadData()
			$('#modal-search').modal('show')
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
        })

		$('#barang-search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenissppb: 7,
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
                return data.nama+' '+data.kekuatan+' '+data.satuan_kekuatan;
            }
		})
		
		$('#unit-search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
                dataType: 'json',
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
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
		})
		
		$('#btn-reload').click(function() {
			reloadData()
			getListStok(1, '')
		})
	})

	function reloadData() {
		$('.form-control, .select2-input, input[type=text], input[type=hidden]').val('')
		$('#unit-search').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		$('#tanggal-awal').val('<?= date('01/m/Y') ?>')
		$('#tanggal-akhir').val('<?= date('d/m/Y') ?>')
	}

	function getListStok(page, id) {
		let accountGroup = '<?php echo $this->session->userdata('account_group') ?>';
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("stok_bank_darah/api/stok_bank_darah/get_list_stok") ?>/page/' + page + '/id/' + id,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListStok(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()
				$.each(data.data, function(i, v) {
					let jml_harga = (v.sisa !== '-') ? money_format(parseFloat(v.sisa) * parseFloat(v.harga_satuan)) : '-';
					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td>${v.nama_barang}</td>
							<td class="center">${datefmysql(v.ed)}</td>
							<td class="transaksi">${v.transaksi} ${v.keterangan}</td>
							<td class="center">${datetimefmysql(v.waktu)}</td>
							<td class="right">${v.awal}</td>
							<td class="right">${v.masuk}</td>
							<td class="right">${v.keluar}</td>
							<td class="right">${v.sisa}</td>
							<td class="right">${money_format(v.harga_satuan * 1)}</td>
							<td class="right">${jml_harga}</td>
							<td class="right"><i>${v.account}</i></td>
							${accountGroup === 'Admin' ? '<td></td>' : ''}
						</tr>
					`;

					$('#table-data tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
				$('#table-data').tableHeadFixer({'head' : true, 'left' : 2})
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})
	}

	function paging(page) {
		getListStok(page, '')
	}
</script>