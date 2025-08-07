<script>
	$(function() {
		getListReturPenjualan(1)
		
		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('#btn-add').click(function() {
			reloadData()
			$('#modal-retur-penjualan').modal('show')
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('.form-control, .custom-form').keyup(function(){
            if($(this).val() !== ''){
                syams_validation_remove(this)
            }
		})
		
		$('.select2c-input, .select2-input, .custom-form').change(function(){
            if($(this).val() !== ''){
                syams_validation_remove(this)
            }
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
                return data.nama+' '+data.kekuatan+' '+data.satuan_kekuatan;
            }
		})

		$('#btn-reload').click(function() {
			reloadData()
			getListReturPenjualan(1)
		})

		$('#no-nota-auto').select2c({
            ajax: {
                url: "<?= base_url('pelayanan/api/pelayanan_auto/nomor_penjualan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page // page number
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
                $('#id-penjualan').val(data.id_penjualan)
                $('#jenis').val(data.jenis)
                $('#id-layanan-pendaftaran').val(data.id_layanan_pendaftaran)
                $('#id-pasien').val(data.no_rm)
                $('#reimburse').val(data.reimburse)
                getDataPenjualan(data.id)
                return data.nama;
            }
        })
	})

	function getDataPenjualan(id) {
		$.ajax({
            type : 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_detail_penjualan") ?>/id/'+id,
            cache: false,
            dataType : 'JSON',
            success: function(data) {
                $('#table-list tbody').empty()
                $.each(data, function (i, v) {
                    var str = '<tr class="rows">'+
                        '<td align="center">'+(i+1)+'</td>'+
                        '<td>'+v.nama_barang+' <input type="hidden" name="id_barang[]" id="id_barang'+i+'" class="id_barang" value="'+v.id_barang+'" /> <input type="hidden" name="id_kemasan_barang[]" id="id_kemasan_barang'+i+'" class="id_kemasan_barang" value="'+v.id_kemasan_barang+'" /></td>'+
                        '<td align="center" id="jual'+i+'">'+v.keluar+'</td>'+
                        '<td align="left">'+v.kemasan_barang+'</td>'+
                        '<td><input type="text" name="jumlah[]" id="jumlah'+i+'" onblur="hitungTotal()" class="jumlah custom-form center" value="'+v.keluar+'" /></td>'+
                        '<td align="center">'+datefmysql(v.ed)+' <input type="hidden" name="ed[]" id="ed'+i+'" class="ed" value="'+v.ed+'" /></td>'+
                        '<td align="right" id="harga'+i+'">'+money_format(v.harga_jual)+'</td>'+
                        '<td align="right" id="subtotal'+i+'">'+money_format(Math.ceil(v.harga_jual * v.keluar))+'</td>'+
                        '<td align="center"><input type="hidden" name="harga_jual[]" id="harga_jual'+i+'" class="harga_jual" value="'+v.id_barang+'" /><button type="button" class="btn btn-secondary btn-xs" onclick="removeMe(this)"><i class="fas fa-trash-alt"></i></button></td>'+
                        '</tr>';
                    $('#table-list tbody').append(str)
                })
                hitungTotal()
            },
            error: function(e){
                accessFailed(e.status)
            }
        })
	}

	function hitungTotal() {
        var jml = $('.rows').length-1;
        var ttl = 0;
        for (i = 0; i <= jml; i++) {
            var jual     = parseFloat($('#jual'+i).html())
            var jumlah   = parseFloat($('#jumlah'+i).val())
            if (jual < jumlah) {
                swalAlert('warning', 'Validasi', 'Jumlah yang di retur tidak boleh melebihi jumlah penjualan !') 
                $('#jumlah'+i).val(jual)
                return false;
            }
            var hrg_jual = parseFloat(currencyToNumber($('#harga'+i).html()))
            $('#harga_jual'+i).val(hrg_jual)
            var subtotal = jumlah*hrg_jual;
            $('#subtotal'+i).html(money_format(subtotal))
            ttl = ttl + subtotal;
        }
        $('#total-retur').html(money_format(ttl))
        $('#total').val(ttl)
    }

	function removeMe(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
        var jumlah = $('.rows').length;
        var col = 0;
        for (i = 0; i <= (jumlah-1); i++) {
            $('.rows:eq('+col+')').children('td:eq(0)').html(i+1);
            $('.rows:eq('+col+')').children('td:eq(2)').attr('id','jual'+i);
            $('.rows:eq('+col+')').children('td:eq(4)').children('.jumlah').attr('id','jumlah'+i);
            $('.rows:eq('+col+')').children('td:eq(6)').attr('id','harga'+i);
            $('.rows:eq('+col+')').children('td:eq(7)').attr('id','subtotal'+i);
            $('.rows:eq('+col+')').children('td:eq(8)').children('.harga_jual').attr('id','harga_jual'+i);
            col++;
        }
        hitungTotal();
    }

	function reloadData() {
		$('input[type=text], input[type=hidden], select, textarea').val('')
		$('#table-list tbody').empty()
		syams_validation_remove('.select2-input')
		syams_validation_remove('.custom-form')
	}

	function getListReturPenjualan(page) {
		$('#page').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("retur_penjualan/api/retur_penjualan/get_list_retur_penjualan") ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListReturPenjualan(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()
				
				var no  = '';
                var num = 1;
				$.each(data.data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="center">${((no !== v.id)?(num):'')}</td>
							<td class="center">${((no !== v.id)?datefmysql(v.tanggal):'')}</td>
							<td>${((no !== v.id)?v.no_rm:'')}</td>
							<td>${((no !== v.id)?v.nama_pasien:'')}</td>
							<td class="center">${((no !== v.id)?v.jenis_layanan:'')}</td>
							<td>${v.nama_barang}</td>
							<td class="center">${v.qty}</td>
							<td class="left">${v.kemasan}</td>
							<td class="right">${money_format(v.harga_jual)}</td>
                            <td class="right">${money_format(v.harga_jual * v.qty)}</td>
							<td class="right wrapper">
								<button type="button" class="btn btn-secondary btn-xs" onclick="deleteReturPenjualan(${v.id}, ${data.page})"><i class="fa fa-trash-alt"></i></button>
							</td>
						</tr>
					`;
					if (no !== v.id) {
						num++;
					}
					no = v.id;
					$('#table-data tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
				$('#modal-search').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})
	}

	function paging (page) {
		getListReturPenjualan(page)
	}

	function simpanReturPenjualan()
	{
		let jml = $('.rows').length;
		if (jml === 0) {
			swalAlert('warning', 'Validasi', 'Kemasan Barang harus diisi minimal 1 data!');
			return false;
		}

		swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Apakah anda yakin akan menyimpan data retur penjualan ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url('retur_penjualan/api/retur_penjualan/simpan_retur_penjualan') ?>',
					data: $('#form-retur-penjualan').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageAddSuccess()
							getListReturPenjualan(1);
							$('#modal-retur-penjualan').modal('hide')
						} else {
							messageAddFailed()
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menyimpan retur penjualan', 'Error')
					}
				})
			}
		})
	}

	function deleteReturPenjualan(id, page) {
		swal.fire({
			title: 'Konfirmasi Hapus',
			html: "Apakah anda yakin akan menghapus data retur penjualan ini ?",
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
					url: '<?php echo base_url('retur_penjualan/api/retur_penjualan/delete_retur_penjualan') ?>/id/' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageDeleteSuccess()
							getListReturPenjualan(page);
						} else {
							messageDeleteFailed()
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menghapus retur penjualan', 'Error')
					}
				})
			}
		})
	}
</script>