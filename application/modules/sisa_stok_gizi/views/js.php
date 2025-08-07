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
		getListSisaStok(1)
	
		$('#btn-search').click(function () {
			reloadData()
			$('#modal-search').modal('show')
		})

		// Format Tanggal
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#barang-search').select2({
            ajax: {
                url: "<?= base_url('laporan_inventori_gizi/api/laporan_inventori_gizi/barang_pembelian') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenissppb: $('#kategori-barang-search').val()
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
                return data.nama+' '+(data.kekuatan !== null ? data.kekuatan: '')+' '+(data.satuan_kekuatan !== null ? data.satuan_kekuatan: '');
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
			getListSisaStok(1)
		})

		$('#periode-laporan').change(function() {
			if ($('#periode-laporan').val() == 'Bulanan') {
				$('.bulanan, #bulan, #tahun').show();
				$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
			}
			if ($('#periode-laporan').val() == 'Rentang Waktu') {
				$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show();
				$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide();
			}
			if ($('#periode-laporan').val() == 'Harian') {
				$('.harian, #tanggal-harian').show();
				$('.bulanan, .rentang-waktu').hide();
			}
		});

		$('#btn-export').click(function() {
			window.open('<?= base_url('sisa_stok_gizi/export_sisa_stok_gizi?') ?>' + $('#form-search').serialize());
		});
	})

	function reloadData() {
		$('.form-control, .select2-input, input[type=text], input[type=hidden]').val('')
		$('#unit-search').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')

		$('#periode-laporan').val('Bulanan')
		$('#bulan').val('<?= date('m') ?>')
		$('#tahun').val('<?= date('Y') ?>')
		$('.bulanan, #tahun, #bulan').show()
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('')
		$('#golongan, #jenis, #kategori').val('')
		$('.harian, #tanggal-harian, .rentang-waktu').hide()
	}

	function getListSisaStok(page) {
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("sisa_stok_gizi/api/sisa_stok_gizi/get_list_sisa_stok") ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListSisaStok(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()
				
				$.each(data.data, function(i, v) {
					console.log(v);
					
					// let jml_harga = (v.sisa !== '-') ? money_format(parseFloat(v.sisa) * parseFloat(v.harga_satuan)) : '-';  (${v.sisanoned} non ed - ${v.sisaed} ed)
					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="left">${v.nama_barang}</td>
							<td  class="center">${v.awal}</td>
							<td  class="center">${v.masuk}</td>
							<td  class="center">${v.keluar}</td>
							<td  class="center">${v.sisa}</td>
							<td  class="center">${money_format(v.hpp)}</td>
							<td  class="center">${money_format(parseFloat(v.hpp) * parseFloat(v.sisa))}</td>
							<td class="center">${v.unit}</td>
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
		getListSisaStok(page)
	}
</script>
